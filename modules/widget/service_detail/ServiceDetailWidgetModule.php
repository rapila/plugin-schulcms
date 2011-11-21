<?php
/**
 * @package modules.widget
 */
class ServiceDetailWidgetModule extends PersistentWidgetModule {
	private $iServiceId = null;

	public function __construct($sWidgetId) {
		parent::__construct($sWidgetId);
    // config section 'school_settings' :'externally_managed_document_categories'
		// all documents and logo are stored here
		$iServiceDocumentCategoryId = SchoolPeer::getDocumentCategoryConfig('service_documents');
		if(DocumentCategoryQuery::create()->filterById($iServiceDocumentCategoryId)->count() === 0) {
			throw new Exception('Config error: school_settings > externally_managed_document_categories > service_documents');
		}
		$oRichtext = WidgetModule::getWidget('rich_text', null, null, SchoolPeer::PAGE_IDENTIFIER_SERVICES);
		$oRichtext->setTemplate(PagePeer::getPageByIdentifier('services')->getTemplate());
		$this->setSetting('richtext_session', $oRichtext->getSessionKey());
		$this->setSetting('service_file_category_id', $iServiceDocumentCategoryId);
	}
	
	public function setServiceId($iServiceId) {
		$this->iServiceId = $iServiceId;
	}
	
	public function serviceData() {
		$oService = ServicePeer::retrieveByPK($this->iServiceId);
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
		$oDokument = DocumentPeer::retrieveByPK($iDocumentId);
		if($oDokument) {
			return $this->rowData($oDokument);
		}
		return null;
	}
	
	public function deleteDocument($iDocumentId) {
		$oDocument = DocumentPeer::retrieveByPK($iDocumentId);
		if($oDocument && ServiceDocumentQuery::create()->filterByDocument($oDocument)->filterByServiceId($this->iServiceId)->findOne()) {
			return $oDocument->delete();
		}
	}
	
	public function reorderDocuments($aDocumentIds) {
		foreach($aDocumentIds as $iCount => $iDocumentId) {
			$oDocument = ServiceDocumentPeer::retrieveByPK($this->iServiceId, $iDocumentId);
			$oDocument->setSort($iCount+1);
			$oDocument->save();
		}
	}

	public function addServiceDocument($iDocumentId) {
	  if($this->iServiceId === null) {
	    $this->aUnsavedDocuments[] = $iDocumentId;
	    return;
	  }
	  if(ServiceDocumentPeer::retrieveByPK($this->iServiceId, $iDocumentId)) {
	    return;
	  }
	  $oServiceDocument = new ServiceDocument();
	  $oServiceDocument->setServiceId($this->iServiceId);
	  $oServiceDocument->setDocumentId($iDocumentId);
	  $oServiceDocument->setSort(ServiceDocumentPeer::countDocumentsByServiceId($this->iServiceId) + 1);
	  return $oServiceDocument->save();
	}
	
	private function validate($aServiceData) {
		$oFlash = Flash::getFlash();
		$oFlash->setArrayToCheck($aServiceData);
		$oFlash->checkForValue('name', 'name_required');
		if($aServiceData['email'] != null) {
			$oFlash->checkForEmail('email', 'valid_email');
		}
		if($aServiceData['is_active'] && $aServiceData['teaser'] == null) {
			$oFlash->addMessage("is_activ_teaser_required");
		}
		$aSetTeamMemberIds = array();
		if(isset($aServiceData['team_member_id'])) {
			$aTeamMemberIds = is_array($aServiceData['team_member_id']) ? $aServiceData['team_member_id'] : array($aServiceData['team_member_id']);
			foreach($aTeamMemberIds as $iTeamMemberId) {
				if(!$iTeamMemberId) {
					continue;
				}
				if(isset($aSetTeamMemberIds[$iTeamMemberId])) {
					$oFlash->addMessage('duplicate_team_member');
					break;
				}
				$aSetTeamMemberIds[$iTeamMemberId] = true;
			}
		}
		$oFlash->finishReporting();
	}

	public function saveData($aServiceData) {
		if($this->iServiceId === null) {
			$oService = new Service();
		} else {
			$oService = ServicePeer::retrieveByPK($this->iServiceId);
		}
		ArrayUtil::trimStringsInArray($aServiceData);
		$oService->setName($aServiceData['name']);
		$oService->setTeaser($aServiceData['teaser']);
		$oService->setAddress($aServiceData['address']);
		$oService->setWebsite($aServiceData['website']);
		$oService->setLogoId($aServiceData['logo_id']);
		$oService->setOpeningHours($aServiceData['opening_hours']);
		$oService->setPhone($aServiceData['phone']);
		$oService->setEmail($aServiceData['email']);
		$oService->setServiceCategoryId($aServiceData['service_category_id'] ? $aServiceData['service_category_id'] : null);
		
		$oRichtextUtil = new RichtextUtil();
		$oRichtextUtil->setTrackReferences($oService);
		$oService->setBody($oRichtextUtil->parseInputFromEditor($aServiceData['body_text']));
		
		if(!$oService->isNew()) {
			ServiceMemberQuery::create()->filterByService($oService)->find()->delete();
		}
		if(isset($aServiceData['team_member_id'])) {
			$aServiceMembers = array();
			foreach($aServiceData['team_member_id'] as $iCounter => $iTeamMemberId) {
				if(!$iTeamMemberId) {
					continue;
				}
				if(isset($aServiceMembers[$iCounter])) {
					$oServiceMember = $aServiceMembers[$iCounter];
					$oServiceMember->setFunctionName($aServiceData['function_name'][$iCounter]);
					$oServiceMember->setSort($iCounter+1);
				} else {
					$oServiceMember = new ServiceMember();
					$oServiceMember->setTeamMemberId($iTeamMemberId);
					$oServiceMember->setFunctionName($aServiceData['function_name'][$iCounter]);
					$oServiceMember->setSort($iCounter+1);
					$aServiceMembers[$iCounter] = $oServiceMember;
					$oService->addServiceMember($oServiceMember);
				}
			}
		}
		$this->validate($aServiceData);
		if(!Flash::noErrors()) {
			throw new ValidationException();
		}
		$oService->setIsActive($aServiceData['is_active']);
		return $oService->save();
	}
}