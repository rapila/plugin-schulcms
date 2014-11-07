<?php
/**
* @package modules.widget
*/
class EventTypesInputWidgetModule extends WidgetModule {

	private $aEventTypes = array();

	public function __construct() {
		$this->aEventTypes = EventTypeQuery::create()->orderById()->select(array('Id', 'Name'))->find()->toKeyValue('Id', 'Name');
		$iCount = count($this->aEventTypes);
		if($iCount === 1) {
			reset($this->aEventTypes);
			$this->setSetting('initial_selection', (string) key($this->aEventTypes));
		}
	}

	public function allEventTypes() {
		return $this->aEventTypes;
	}

	public function getElementType() {
		return 'select';
	}
}