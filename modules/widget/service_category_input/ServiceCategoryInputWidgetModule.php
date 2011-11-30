<?php
/**
 * @package modules.widget
 */
class ServiceCategoryInputWidgetModule extends WidgetModule {
	
	public function getCategories() {
		return WidgetJsonFileModule::jsonBaseObjects(ServiceCategoryQuery::create()->orderByName()->find(), array('id', 'name'));
	}
}