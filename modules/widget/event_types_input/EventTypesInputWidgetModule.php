<?php
/**
* @package modules.widget
*/
class EventTypesInputWidgetModule extends WidgetModule {

	private $aEventTypes = array();
	
	public function __construct() {
		$this->aEventTypes = EventTypeQuery::create()->orderById()->find();
		if(count($this->aEventTypes) === 1) {
			$this->setSetting('initial_selection', (string) $this->aEventTypes[0]->getId());
		}
	}

	public function allEventTypes() {
		$aResult = array();
		foreach($this->aEventTypes as $oEventType) {
			$aResult[$oEventType->getId()] = $oEventType->getName();
		}
		return $aResult;
	}

	public function getElementType() {
		return 'select';
	}
}