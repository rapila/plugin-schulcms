<?php
/**
 * @package modules.widget
 */
class NewsTypeInputWidgetModule extends WidgetModule {
	
	public function getNewsTypes() {
		return WidgetJsonFileModule::jsonBaseObjects(NewsTypeQuery::create()->orderByName()->find(), array('id', 'name'));
	}
	
	public function listNewsTypes() {
		$oQuery = NewsTypeQuery::create()->orderByName();
		if(Settings::getSetting('admin', 'hide_externally_managed_link_categories', true)) {
			$oQuery->filterByIsExternallyManaged(false);
		}
		return $oQuery->select(array('Id', 'Name'))->find()->toKeyValue('Id', 'Name');
	}
	
}