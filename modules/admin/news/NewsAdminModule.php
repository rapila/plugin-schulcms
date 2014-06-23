<?php
class NewsAdminModule extends AdminModule {
	private $oMainWidget;

	private $oSidebarWidget;

	public function __construct() {
		$this->oSidebarWidget = WidgetModule::getWidget('WIDGET_TYPE=list');
		$this->oMainWidget = WidgetModule::getWidget('WIDGET_TYPE=list');

	}

	public function mainContent() {
		return $this->oMainWidget->doWidget();
	}

	public function sidebarContent() {
		return $this->oSidebarWidget->doWidget();
	}

	public function usedWidgets() {
		return array($this->oSidebarWidget, $this->oMainWidget);
	}
}