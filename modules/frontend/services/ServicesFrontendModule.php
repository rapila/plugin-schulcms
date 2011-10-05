<?php
/**
 * @package modules.frontend
 */

class ServicesFrontendModule extends DynamicFrontendModule implements WidgetBasedFrontendModule {
	
	public static $DISPLAY_MODES = array('service_liste', 'service_detail', 'service_intern_detail', 'service_teaser', 'team_member_portraits');
	public static $SERVICE;
	public $aServiceCategoryIds;
	public $iExcludeInternalCategoryId;
	
	const DETAIL_IDENTIFIER = 'id';
	const MODE_SELECT_KEY = 'display_mode';
	const SERVICE_CATEGORY_IDS = "service_category_id";
	const SERVICE_ID = "service_id";

	public function __construct($oLanguageObject = null, $aPath = null, $iId = 1) {
		$this->iExcludeInternalCategoryId = Settings::getSetting("school_settings", 'internally_used_service_category', null);
		parent::__construct($oLanguageObject, $aPath, $iId);
	}
	
	public function renderFrontend() { 
		$aOptions = @unserialize($this->getData());
		$this->aServiceCategoryIds = @$aOptions[self::SERVICE_CATEGORY_IDS];
		$iServiceId = @$aOptions['service_id'];
		if($iServiceId) {
			self::$SERVICE = ServicePeer::retrieveByPK($iServiceId);
		}

		switch($aOptions[self::MODE_SELECT_KEY]) {
			case 'service_detail' : return $this->renderDetail();
			case 'service_intern_detail' : return $this->renderDetail(true);
			case 'service_teaser' : return $this->renderTeaserDetail();
			case 'team_member_portraits' : return $this->renderTeamMemberPortraits();
			default: return $this->renderList();
		}
		return '';
	}
	
	// renderList
	private function renderList() {
		if(self::$SERVICE) {
			return $this->renderDetail();
		}
		$aServices = $this->listQuery()->find();
		$oTemplate = $this->constructTemplate('list');
		$oPage = FrontendManager::$CURRENT_PAGE;
		$sOddEven = 'odd';
		foreach($aServices as $oService) {
			$oItemTemplate = $this->constructTemplate('list_item');
			$oItemTemplate->replaceIdentifier('oddeven', $sOddEven = $sOddEven === 'even' ? 'odd' : 'even');
			$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($oService->getServiceLink($oPage)));
			$oItemTemplate->replaceIdentifier('detail_link_text', $oService->getName());
			$oItemTemplate->replaceIdentifier('detail_link_title', 'Details von '.$oService->getName());			
			$oItemTemplate->replaceIdentifier('phone', $oService->getPhone());
			$oItemTemplate->replaceIdentifier('teaser', $oService->getTeaser());
			$oItemTemplate->replaceIdentifier('website', $oService->getWebsiteWithProtocol());
			$oTemplate->replaceIdentifierMultiple('list_item', $oItemTemplate);
		}
		return $oTemplate;
	}
	
	public function renderDetail($isIntern=false) {
		if(self::$SERVICE === null) {
			return;
		}
		if($this->oLanguageObject->getContentObject()->getContainerName() == 'context') {
			return $this->renderDetailContext();
		}
		$oPage = FrontendManager::$CURRENT_PAGE;
		$oTemplate = $this->constructTemplate($isIntern === true ? 'detail_intern' : 'detail');
		if(self::$SERVICE->getDocument()) {
			$oTemplate->replaceIdentifier('logo', TagWriter::quickTag('img', array('src' => self::$SERVICE->getDocument()->getDisplayUrl(array('max_width' => 120)), 'class' => 'service_logo')));
		}
		$oTemplate->replaceIdentifier('teaser', self::$SERVICE->getTeaser());
		if(is_resource(self::$SERVICE->getBody())) {
			$oTemplate->replaceIdentifier('body', RichtextUtil::parseStorageForFrontendOutput(stream_get_contents(self::$SERVICE->getBody())));
		}
		$oTemplate->replaceIdentifier('list_link', $oPage->getFullPathArray());
		$oPortraitTemplate = $this->constructTemplate('portraits');
		$this->setPortraits($oPortraitTemplate);
		$oTemplate->replaceIdentifier('portraits', $oPortraitTemplate);
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
					$oTemplate->replaceIdentifierMultiple('opening_hours', $mNewLine, null, Template::NO_NEW_CONTEXT);	
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
		$oCriteria = new Criteria();
		$oCriteria->addAscendingOrderByColumn(ServiceMemberPeer::SORT);
		foreach(self::$SERVICE->getServiceMembers($oCriteria) as $i => $oServiceMember) {
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
			$oTemplate->replaceIdentifier('email', TagWriter::quickTag('a', array('href' => 'mailto:'.self::$SERVICE->getEmail()), StringUtil::truncate(self::$SERVICE->getEmail(), 30)));
		if(self::$SERVICE->getWebsite() != null)
			$oTemplate->replaceIdentifier('website', TagWriter::quickTag('a', array('href' => self::$SERVICE->getWebsiteWithProtocol()), StringUtil::truncate(self::$SERVICE->getWebsite(), 30)));
			
    foreach(self::$SERVICE->getServiceDocuments() as $oServiceDocument) {
			if($oServiceDocument->getDocument()) {
        $oTemplate->replaceIdentifierMultiple('service_document', TagWriter::quickTag('a', array('href' => $oServiceDocument->getDocument()->getDisplayUrl(), 'title' => $oServiceDocument->getDocument()->getDescription(),'class' => $oServiceDocument->getDocument()->getExtension()), $oServiceDocument->getDocument()->getName()), null, Template::NO_NEW_CONTEXT); 
			}
		}

		return $oTemplate;
	}
	
	public function renderTeaserDetail($iServiceId = null) { 
		if(self::$SERVICE === null) {
			self::$SERVICE =  ServiceQuery::create()->filterByIsActive(true)->filterByServiceCategoryId($this->iExcludeInternalCategoryId, Criteria::NOT_EQUAL)->filterByTeaser(null, Criteria::ISNOTNULL)->orderByRand()->findOne();
		}
		if(self::$SERVICE !== null) {
			$oTemplate = $this->constructTemplate('teaser_aktuell_detail');
			$oTemplate->replaceIdentifier('detail_link', LinkUtil::link(self::$SERVICE->getServiceLink()));
			$oTemplate->replaceIdentifier('name', self::$SERVICE->getName());
			$oTemplate->replaceIdentifier('teaser', self::$SERVICE->getTeaser());
			$oTemplate->replaceIdentifier('goto_title', "mehr zu Details des Angebots ".self::$SERVICE->getName());
			$oTemplate->replaceIdentifier('read_more_text', StringPeer::getString('text.read_more'));
			return $oTemplate;
		}
		return;
	}
	
	private function renderTeamMemberPortraits() {
		if(self::$SERVICE === null) {
			return;
		}
		$oTemplate = $this->constructTemplate('portraits');
		$this->setPortraits($oTemplate);
		return $oTemplate;
	}
	
	private function setPortraits($oTemplate, $iWidth = 150) {
		$oCriteria = new Criteria();
		$oCriteria->addJoin(ServiceMemberPeer::TEAM_MEMBER_ID, TeamMemberPeer::ID, Criteria::INNER_JOIN);
		$oCriteria->add(TeamMemberPeer::PORTRAIT_ID, null, Criteria::ISNOTNULL);
		$oCriteria->addAscendingOrderByColumn(ServiceMemberPeer::SORT);
		foreach(self::$SERVICE->getServiceMembers($oCriteria) as $oServiceMember) {
			if($oServiceMember->getTeamMember()->getDocument()) {
				$oPortraitTemplate = $this->constructTemplate('portrait_item');
				$oPortraitTemplate->replaceIdentifier('portrait_width', $iWidth);
				$oPortraitTemplate->replaceIdentifier('name', $oServiceMember->getTeamMember()->getFullName());
				$oPortraitTemplate->replaceIdentifier('image', TagWriter::quickTag('img', array('src' => $oServiceMember->getTeamMember()->getDocument()->getDisplayUrl(array('max_width' => $iWidth)), 'alt' => 'Portrait von '.$oServiceMember->getTeamMember()->getFullName())));
				$oTemplate->replaceIdentifierMultiple('portrait', $oPortraitTemplate);
			}
		}
	}
	
	public function listQuery() {
		$oQuery = ServiceQuery::create()->filterByIsActive(true)->orderByName();
		if($this->aServiceCategoryIds) {
			$oQuery->filterByServiceCategoryIds($this->aServiceCategoryIds);
		} else {
			if($this->iExcludeInternalCategoryId) {
				$oQuery->filterByServiceCategoryId($this->iExcludeInternalCategoryId, Criteria::NOT_EQUAL);
			}
		}
		return $oQuery;
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
		$oWidget = new ServiceEditWidgetModule(null, $this);
		return $oWidget;
	}

}
