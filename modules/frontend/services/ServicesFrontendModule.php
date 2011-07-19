<?php
/**
 * @package modules.frontend
 */

class ServicesFrontendModule extends DynamicFrontendModule implements WidgetBasedFrontendModule {
	
	public static $DISPLAY_MODES = array('service_liste', 'service_detail', 'random_service_teaser');
	public static $SERVICE;
	public $iExcludeInternalCategoryId;
	
	const DETAIL_IDENTIFIER = 'id';
	const MODE_SELECT_KEY = 'display_mode';
	
	public static function acceptedRequestParams() {
		return array(self::DETAIL_IDENTIFIER);
	}
	
	public function renderFrontend() { 
		$this->iExcludeInternalCategoryId = Settings::getSetting("school_settings", 'internally_used_service_category', null);

		// always show detail of requested or random team member
		$aOptions = @unserialize($this->getData());
		if(self::$SERVICE === null) {
			if(isset($_REQUEST[self::DETAIL_IDENTIFIER])) {
				self::$SERVICE = ServicePeer::retrieveByPK($_REQUEST[self::DETAIL_IDENTIFIER]);
			} else if( $aOptions[self::MODE_SELECT_KEY] === 'service_detail' 
					&& isset($aOptions['service_id']) 
					&& is_numeric($aOptions['service_id'])) 
			{
				self::$SERVICE = ServicePeer::retrieveByPK($aOptions['service_id']);
			}
		}
		if(self::$SERVICE) {
			if($this->oLanguageObject->getContentObject()->getContainerName() == 'context') {
				return $this->renderDetailContext();
			}
			return $this->renderDetail();
		}
		if(isset($aOptions[self::MODE_SELECT_KEY])) {
			switch($aOptions[self::MODE_SELECT_KEY]) {
				case 'service_detail' : return $this->renderDetail();
				case 'random_service_teaser' : return $this->renderTeaserDetail();
				default: return $this->renderList($aOptions[self::MODE_SELECT_KEY]);
			}
		}
	}
	
	private function renderlist($iCategory) {
		$oQuery = ServiceQuery::create();
		if(is_numeric($iCategory)) {
			$oQuery->filterByServiceCategoryId((int) $iCategory);
		} else {
			if($this->iExcludeInternalCategoryId) {
				$oQuery->filterByServiceCategoryId($this->iExcludeInternalCategoryId, Criteria::NOT_EQUAL);
			}
		}
		$aServices = $oQuery->orderByName()->find();
		$oTemplate = $this->constructTemplate('list');
		$oPage = FrontendManager::$CURRENT_PAGE;
		$sOddEven = 'odd';
		foreach($aServices as $oService) {
			$oItemTemplate = $this->constructTemplate('list_item');
			$oItemTemplate->replaceIdentifier('oddeven', $sOddEven = $sOddEven === 'even' ? 'odd' : 'even');
			$aDetailLink = array_merge($oPage->getFullPathArray(), array(self::DETAIL_IDENTIFIER, $oService->getId()));
			$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($aDetailLink));
			$oItemTemplate->replaceIdentifier('detail_link_text', $oService->getName());
			$oItemTemplate->replaceIdentifier('detail_link_title', 'Details von '.$oService->getName());			
			$oItemTemplate->replaceIdentifier('phone', $oService->getPhone());
			$oItemTemplate->replaceIdentifier('teaser', StringUtil::truncate($oService->getTeaser(),60));
			$oItemTemplate->replaceIdentifier('website', $oService->getWebsiteWithProtocol());
			$oTemplate->replaceIdentifierMultiple('list_item', $oItemTemplate);
		}
		return $oTemplate;
	}
	
	public function getService() {
		return self::$SERVICE;
	}
	
	public function renderDetail() {
		if(self::$SERVICE === null) {
			return;
		}
		$oPage = FrontendManager::$CURRENT_PAGE;
		$oTemplate = $this->constructTemplate('detail');
		if(self::$SERVICE->getDocument()) {
			$oTemplate->replaceIdentifier('logo', TagWriter::quickTag('img', array('src' => self::$SERVICE->getDocument()->getDisplayUrl(array('max_width' => 120)), 'class' => 'service_logo')));
		}
		$oTemplate->replaceIdentifier('teaser', self::$SERVICE->getTeaser());
		if(is_resource(self::$SERVICE->getBody())) {
			$oTemplate->replaceIdentifier('body', RichtextUtil::parseStorageForFrontendOutput(stream_get_contents(self::$SERVICE->getBody())));
		}
		$oTemplate->replaceIdentifier('list_link', $oPage->getFullPathArray());
		return $oTemplate;
	}
	
	public function renderDetailContext() {
		$oTemplate = $this->constructTemplate('detail_context');
		$oTemplate->replaceIdentifier('name', self::$SERVICE->getName());
		if(self::$SERVICE->getAddress() != null)
			$oTemplate->replaceIdentifier('address', nl2br(self::$SERVICE->getAddress()), null, Template::NO_HTML_ESCAPE);
		if(self::$SERVICE->getOpeningHours() != null) {
			$aOpeningHours = self::$SERVICE->getOpeningHoursFormatted();
			$iCount = count($aOpeningHours);
			foreach(self::$SERVICE->getOpeningHoursFormatted() as $i => $mNewLine) {
				if(is_array($mNewLine)) {
					foreach($mNewLine as $mPart) {
						$oTemplate->replaceIdentifierMultiple('opening_hours', $mPart, null, Template::NO_NEW_CONTEXT); 
					} 
				} else {
					$oTemplate->replaceIdentifierMultiple('opening_hours', $mNewLine);	
				}
				if($i < ($iCount-1)) {
					$oTemplate->replaceIdentifierMultiple('opening_hours', TagWriter::quickTag('br'), null, Template::NO_NEW_CONTEXT);	
				}
			}
		}
		$sLabelMitarbeiter = 'Mitarbeiter';
		$bIsFemale = true;
		$i = 0;
		
		// team_members
		foreach(self::$SERVICE->getServiceMembers() as $i => $oServiceMember) {
			$i++;
			if($oServiceMember->getTeamMember()) {
				$sName = $oServiceMember->getTeamMember()->getFullName();				
				if($oServiceMember->getFunctionName()) {
					$bIsFemale = $oServiceMember->getTeamMember()->getGenderId() === 'f';
					$sName .= ', '. $oServiceMember->getFunctionName();
					$oTeamMember = TagWriter::quickTag('div', array(), $sName);
					$oTemplate->replaceIdentifierMultiple('team_member', $oTeamMember, null, Template::NO_NEW_CONTEXT);
				}
			}
		}
		
		if($i === 1 && $bIsFemale) {
			$sLabelMitarbeiter = $sLabelMitarbeiter.'in';
		}
		$oTemplate->replaceIdentifier('label_mitarbeiter', $sLabelMitarbeiter);
		if(self::$SERVICE->getPhone() != null)
			$oTemplate->replaceIdentifier('phone', self::$SERVICE->getPhone());
		if(self::$SERVICE->getEmail() != null)
			$oTemplate->replaceIdentifier('email', TagWriter::quickTag('a', array('href' => 'mailto:'.self::$SERVICE->getEmail()), self::$SERVICE->getEmail()));
		if(self::$SERVICE->getWebsite() != null)
			$oTemplate->replaceIdentifier('website', TagWriter::quickTag('a', array('href' => self::$SERVICE->getWebsiteWithProtocol()), self::$SERVICE->getWebsite()));
			
    foreach(self::$SERVICE->getServiceDocuments() as $oServiceDocument) {
			if($oServiceDocument->getDocument()) {
        // $oTemplate->replaceIdentifierMultiple('service_documents', TagWriter::quickTag(), null, Template::NO_NEW_CONTEXT); 
			}
		}

		return $oTemplate;
	}
	
	public function renderTeaserDetail() {
		$oService = ServiceQuery::create()->filterByIsActive(true)->filterByServiceCategoryId($this->iExcludeInternalCategoryId, Criteria::NOT_EQUAL)->filterByTeaser(null, Criteria::ISNOTNULL)->orderByRand()->findOne();
		if($oService) {
			$oServicesPage = PageQuery::create()->filterByIdentifier('services')->filterByIsInactive(false)->findOne();
			if($oServicesPage === null) {
				return;
			}
			$oTemplate = $this->constructTemplate('teaser_context_detail');
			$oTemplate->replaceIdentifier('detail_link', LinkUtil::link(array_merge($oServicesPage->getFullPathArray(), array(self::DETAIL_IDENTIFIER, $oService->getId()))));
			$oTemplate->replaceIdentifier('name', $oService->getName());
			$oTemplate->replaceIdentifier('teaser', $oService->getTeaser());
			$oTemplate->replaceIdentifier('goto_title', "mehr zu Details des Angebots ".$oService->getName());
			$oTemplate->replaceIdentifier('read_more_text', "mehr lesen…");
			return $oTemplate;
		}
	}
	
	public function widgetData() {
		$aOptions = @unserialize($this->getData()); 
		return $aOptions;
	}
	
	public function widgetSave($mData) {
		$this->oLanguageObject->setData(serialize($mData));
		return $this->oLanguageObject->save();
	}
	
	public function getWidget() {
		$aOptions = @unserialize($this->getData()); 
		$oWidget = new ServiceEditWidgetModule(null, $this);
		$oWidget->setDisplayMode($aOptions);
		return $oWidget;
	}

}
