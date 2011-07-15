<?php
/**
 * @package modules.admin
 */
class ServiceCategoriesAdminModule extends AdminModule {
	private $oListWidget;
	
	public function __construct() {
		$this->oListWidget = new ServiceCategoryListWidgetModule();
	}
	
	public function mainContent() {
		return $this->oListWidget->doWidget();
	}
	
	public function sidebarContent() {
	}
	
	public function usedWidgets() {
		return array($this->oListWidget);
	}
}
