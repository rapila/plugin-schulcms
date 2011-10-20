<?php
class ServiceFrontendConfigWidgetModule extends PersistentWidgetModule { 
	private $oFrontendModule;
	private $sDisplayMode;
	private $aServiceCategoryIds;
	private $iServiceId;
	
	public function __construct($sSessionKey, $oFrontendModule) {
		parent::__construct($sSessionKey);
		$this->oFrontendModule = $oFrontendModule;
		$aData = $this->oFrontendModule->widgetData();
		$this->sDisplayMode = $aData[ServicesFrontendModule::MODE_SELECT_KEY];
		$this->aServiceCategoryIds = @$aData[ServicesFrontendModule::SERVICE_CATEGORY_IDS];
		$this->iServiceId = @$aData[ServicesFrontendModule::SERVICE_ID];
	}
	
	public function getDisplayMode() {
		return $this->sDisplayMode;
	}
	
	public function getServiceCategoryIds() {
		return $this->aServiceCategoryIds;
	}
	
	public function getServiceId() {
		return $this->iServiceId;
	}
	
	public function displayModes() {
		$aResult = array();
		foreach(ServicesFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
			$aResult[$sDisplayMode] = StringPeer::getString('display_mode.'.$sDisplayMode, null, $sDisplayMode);
		}
		return $aResult;
	}

	public function serviceCategories() {
		$aResult = array();
		foreach(ServiceCategoryQuery::create()->orderByName()->find() as $oServiceCategory) {
			$aResult[$oServiceCategory->getId()] = $oServiceCategory->getName();
		}
		return $aResult;
	}

	public function allServices($aServiceCategoryIds = null) {
		$oQuery = ServiceQuery::create()->filterByIsActive(true);
		if($aServiceCategoryIds !== null) {
			$oQuery->filterByServiceCategoryIds($aServiceCategoryIds);
		}
		foreach($oQuery->orderByName()->find() as $oService) {
			$sPrefix = $this->oFrontendModule->iExcludeInternalCategoryId === $oService->getServiceCategoryId() ? 'INTERN: ' : '';
			$aResult[$oService->getId()] = $sPrefix.$oService->getName();
		}
		return $aResult;
	}
}
