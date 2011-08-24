<?php
class ClassTypesWidgetModule extends PersistentWidgetModule {
	public function __construct($sSessionKey = null) {
		parent::__construct($sSessionKey);
		$oListWidget = WidgetModule::getWidget('list', null, new CriteriaListWidgetDelegate($this, 'ClassType'));
		$oListWidget->sStringPrefix = 'class_types';
		$this->setSetting('list_widget_session', $oListWidget->getSessionKey());
	}
	
	public function getColumnIdentifiers() {
		return array('id', 'name', 'class_count_current_year', 'class_count_other_years');
	}
}