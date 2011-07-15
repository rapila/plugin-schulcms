<?php
/**
 * @package modules.widget
 */
class ServiceCategoryInputWidgetModule extends WidgetModule {
	
	public function getCategories() {
		return WidgetJsonFileModule::jsonBaseObjects(ServiceCategoryPeer::getAllSorted(), array('id', 'name'));
	}
}