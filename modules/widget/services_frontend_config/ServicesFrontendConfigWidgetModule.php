<?php
class ServicesFrontendConfigWidgetModule extends FrontendConfigWidgetModule { 
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
