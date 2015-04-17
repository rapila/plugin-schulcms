<?php
/**
* @package modules.widget
*/
class EventTypesInputWidgetModule extends WidgetModule {

	private $aEventTypes = array();

	public function __construct() {
		$this->aEventTypes = $this->getEventTypes();
		$this->setSetting('available_type_coount', count($this->aEventTypes));
		if(count($this->aEventTypes) === 1) {
			reset($this->aEventTypes);
			$this->setSetting('initial_selection', (string) key($this->aEventTypes));
		}
	}

	private function getEventTypes($bExcludeExternallyManaged = false) {
		$oQuery = EventTypeQuery::create();
		if($bExcludeExternallyManaged) {
			$this->excludeExternallyManaged();
		}
		return $oQuery->orderById()->select(array('Id', 'Name'))->find()->toKeyValue('Id', 'Name');
	}

	public function allEventTypes() {
		return $this->aEventTypes;
	}

	public function getElementType() {
		return 'select';
	}
}