<?php
/**
 * @package modules.widget
 */
class NewsTypeInputWidgetModule extends WidgetModule {

	public function listNewsTypes($bIncludeExternallyManaged = false) {
		return self::getNewsTypes($bIncludeExternallyManaged);
	}

	public static function getNewsTypes($bIncludeExternallyManaged = false) {
		$oQuery = NewsTypeQuery::create()->orderByName();
		if(!$bIncludeExternallyManaged ||
			Settings::getSetting('admin', 'hide_externally_managed_link_categories', true)) {
			$oQuery->filterByIsExternallyManaged(false);
		}
		return WidgetJsonFileModule::jsonOrderedObject($oQuery->select(array('Id', 'Name'))->find()->toKeyValue('Id', 'Name'));
	}

}