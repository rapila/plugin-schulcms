<?php
/**
* @package modules.widget
*/
class EventTypesInputWidgetModule extends WidgetModule {
		
  public function allEventTypes() {
		$aEventTypes = EventTypeQuery::create()->orderById()->find();
		$aResult = array();
		foreach($aEventTypes as $oEventType) {
      $aResult[$oEventType->getId()] = $oEventType->getName();
		}
		return $aResult;
	}
	
	public function getElementType() {
		return 'select';
	}
}