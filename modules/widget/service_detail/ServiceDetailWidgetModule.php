<?php
/**
 * @package modules.widget
 */
class ServiceDetailWidgetModule extends PersistentWidgetModule {
	private $iServiceId = null;
	private $aUnsavedDocuments = array();

	public function __construct($sWidgetId) {
		parent::__construct($sWidgetId);
    // config section 'school_settings' :'externally_managed_document_categories'
		// all documents and logo are stored here
		$iServiceDocumentCategoryId = SchoolPeer::getDocumentCategoryConfig('service_documents');
		if(DocumentCategoryQuery::create()->filterById($iServiceDocumentCategoryId)->count() === 0) {
			throw new Exception('Config error: school_settings > externally_managed_document_categories > service_documents');
		}
		$oRichtext = WidgetModule::getWidget('rich_text', null, null, SchoolPeer::PAGE_IDENTIFIER_SERVICES);

		// include styles that are used in dedicated template
		$oServicePage = PagePeer::getPageByIdentifier('services');
		if($oServicePage) {
			$oRichtext->setTemplate($oServicePage->getTemplate());
		}
		$this->setSetting('richtext_session', $oRichtext->getSessionKey());
		$this->setSetting('service_file_category_id', $iServiceDocumentCategoryId);
	}

	public function setServiceId($iServiceId) {
		$this->iServiceId = $iServiceId;
	}

	public function serviceData() {
		$oService = ServiceQuery::create()->findPk($this->iServiceId);
		if($oService === null) {
			return array();
		}
		$aResult = $oService->toArray(BasePeer::TYPE_PHPNAME, false);
		$aResult['CreatedInfo'] = Util::formatCreatedInfo($oService);
		$aResult['UpdatedInfo'] = Util::formatUpdatedInfo($oService);
		$aResult['team_members'] = array();
		$oCriteria = new Criteria();
		$oCriteria->addAscendingOrderByColumn(ServiceMemberPeer::SORT);
		foreach($oService->getServiceMembers($oCriteria) as $oServiceMember) {
			$aResult["team_members"][$oServiceMember->getTeamMemberId()] = $oServiceMember->getFunctionName();
		}
		$sBody = '';
		if(is_resource($oService->getBody())) {
			$sBody = RichtextUtil::parseStorageForBackendOutput(stream_get_contents($oService->getBody()))->render();
		}
		$aResult['Body'] = $sBody;
		unset($aResult['BodyShort']);
		return $aResult;
	}

	public function allDocuments() {
	  $aDocuments = ServiceDocumentQuery::create()->filterByServiceId($this->iServiceId)->joinDocument()->orderBySort()->find();
	  $aResult = array();
	  foreach($aDocuments as $oServiceDocument) {
	    $aResult[] = $this->rowData($oServiceDocument->getDocument());
	  }
	  return $aResult;
	}

	public function rowData($oDocument) {
		return array( 'Name' => $oDocument->getName(),
		 							'Extension' => $oDocument->getDocumentType()->getExtension(),
								  'Id' => $oDocument->getId(),
								  'DisplayUrl' => $oDocument->getDisplayUrl()
								);
	}

	public function getSingleDocument($iDocumentId) {
		$oDokument = DocumentQuery::create()->findPk($iDocumentId);
		if($oDokument) {
			return $this->rowData($oDokument);
		}
		return null;
	}

	public function deleteDocument($iDocumentId) {
		$oDocument = DocumentQuery::create()->findPk($iDocumentId);
		if($oDocument && ServiceDocumentQuery::create()->filterByDocument($oDocument)->filterByServiceId($this->iServiceId)->findOne()) {
			return $oDocument->delete();
		}
	}

	public function reorderDocuments($aDocumentIds) {
		foreach($aDocumentIds as $iCount => $iDocumentId) {
			$oDocument = ServiceDocumentQuery::create()->findPk(array($this->iServiceId, $iDocumentId));
			$oDocument->setSort($iCount+1);
			$oDocument->save();
		}
	}

	public function addServiceDocument($iDocumentId) {
	  if($this->iServiceId === null) {
	    $this->aUnsavedDocuments[] = $iDocumentId;
	    return;
	  }
	  if(ServiceDocumentQuery::create()->findPk(array($this->iServiceId, $iDocumentId))) {
	    return;
	  }
	  $oServiceDocument = new ServiceDocument();
	  $oServiceDocument->setServiceId($this->iServiceId);
	  $oServiceDocument->setDocumentId($iDocumentId);
	  $oServiceDocument->setSort(ServiceDocumentQuery::create()->filterByServiceId($this->iServiceId)->count() + 1);
	  return $oServiceDocument->save();
	}

	private function validate($aData) {
		$oFlash = Flash::getFlash();
		$oFlash->setArrayToCheck($aData);
		$oFlash->checkForValue('name', 'name_required');
		if($aData['email'] != null) {
			$oFlash->checkForEmail('email', 'valid_email');
		}
		if($aData['is_active'] && $aData['body'] == null) {
			$oFlash->addMessage("is_active_body_required");
		}
		$aSetTeamMemberIds = array();
		if(isset($aData['team_member_id'])) {
			$aTeamMemberIds = is_array($aData['team_member_id']) ? $aData['team_member_id'] : array($aData['team_member_id']);
			foreach($aTeamMemberIds as $iTeamMemberId) {
				if(!$iTeamMemberId) {
					continue;
				}
				if(isset($aSetTeamMemberIds[$iTeamMemberId])) {
					continue;
				}
				$aSetTeamMemberIds[$iTeamMemberId] = true;
			}
		}
		$oFlash->finishReporting();
	}

	public function saveData($aData) {
		if($this->iServiceId === null) {
			$oService = new Service();
		} else {
			$oService = ServiceQuery::create()->findPk($this->iServiceId);
		}
		ArrayUtil::trimStringsInArray($aData);
		$oService->setName($aData['name']);
		$oService->setAddress($aData['address']);
		$oService->setOpeningHours($aData['opening_hours']);
		$oService->setEmail($aData['email']);
		$oService->setPhone($aData['phone']);
		$oService->setWebsite($aData['website']);
		$oService->setIsActive($aData['is_active']);
		$oService->setLogoId($aData['logo_id']);
		$oService->setServiceCategoryId($aData['service_category_id'] ? $aData['service_category_id'] : null);

		$oRichtextUtil = new RichtextUtil();
		$oService->setBody($oRichtextUtil->getTagParser($aData['body_text']));
		$oRichtextUtil->setTrackReferences($oService);

		if(!$oService->isNew()) {
			ServiceMemberQuery::create()->filterByService($oService)->find()->delete();
		} else {
		  foreach($this->aUnsavedDocuments as $i => $iDocumentId) {
			  $oServiceDocument = new ServiceDocument();
			  $oServiceDocument->setServiceId($this->iServiceId);
			  $oServiceDocument->setDocumentId($iDocumentId);
			  $oServiceDocument->setSort($i+1);
			  $oService->addServiceDocument($oServiceDocument);
		  }
		}

		if(isset($aData['team_member_id'])) {
			$aServiceMembers = array();
			foreach($aData['team_member_id'] as $iCounter => $iTeamMemberId) {
				if(!$iTeamMemberId) {
					continue;
				}
				if(isset($aServiceMembers[$iCounter])) {
					$oServiceMember = $aServiceMembers[$iCounter];
					$oServiceMember->setFunctionName($aData['function_name'][$iCounter]);
					$oServiceMember->setSort($iCounter+1);
				} else {
					$oServiceMember = new ServiceMember();
					$oServiceMember->setTeamMemberId($iTeamMemberId);
					$oServiceMember->setFunctionName($aData['function_name'][$iCounter]);
					$oServiceMember->setSort($iCounter+1);
					$aServiceMembers[$iCounter] = $oServiceMember;
					$oService->addServiceMember($oServiceMember);
				}
			}
		}
		$this->validate($aData);
		if(!Flash::noErrors()) {
			throw new ValidationException();
		}
		$oService->save();
		return $oService->getId();
	}
}