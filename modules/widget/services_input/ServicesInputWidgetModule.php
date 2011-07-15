<?php
/**
* @package modules.widget
*/
class ServicesInputWidgetModule extends WidgetModule {
		
  public function allServices() {
		$aServices = ServiceQuery::create()->filterByIsActive(true)->orderByName()->find();
		$aResult = array();
		foreach($aServices as $oService) {
      $aResult[$oService->getId()] = $oService->getName();
		}
		return $aResult;
	}
	
	public function getElementType() {
		return 'select';
	}
}