<?php
/**
 * @package modules.admin
 */
class NotesAdminModule extends AdminModule {
	private $oListWidget;
	
	public function __construct() {
		$this->oListWidget = new NoteListWidgetModule();
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
