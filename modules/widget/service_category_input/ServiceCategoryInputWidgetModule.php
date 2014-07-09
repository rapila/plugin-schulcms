<?php
/**
 * @package modules.widget
 */
class ServiceCategoryInputWidgetModule extends WidgetModule {
	
	public function listCategories() {
		$aResult = ServiceCategoryQuery::create()->orderByName()->select(array('Id', 'Name'))->find()->toKeyValue('Id', 'Name');
		return WidgetJsonFileModule::jsonOrderedObject(ServiceCategoryQuery::create()->orderByName()->select(array('Id', 'Name'))->find()->toKeyValue('Id', 'Name'));
	}
}