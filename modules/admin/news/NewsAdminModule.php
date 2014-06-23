<?php
class NewsAdminModule extends AdminModule {

	private $oListWidget;
	private $oSidebarWidget;

	public function __construct() {
		$this->oListWidget = new NewsListWidgetModule();

		$this->oSidebarWidget = new ListWidgetModule();
		$this->oSidebarWidget->setListTag(new TagWriter('ul'));
		$this->oSidebarWidget->setDelegate(new CriteriaListWidgetDelegate($this, 'NewsType', 'name'));
		$this->oSidebarWidget->setSetting('initial_selection', array('news_type_id' => $this->oListWidget->oDelegateProxy->getNoteTypeId()));
	}

	public function mainContent() {
		return $this->oListWidget->doWidget();
	}

	public function sidebarContent() {
		return $this->oSidebarWidget->doWidget();
	}

	public function getColumnIdentifiers() {
		return array('news_type_id', 'name', 'magic_column');
	}

	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array();
		switch($sColumnIdentifier) {
		case 'news_type_id':
			$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_DATA;
			$aResult['field_name'] = 'id';
			break;
		case 'name':
			$aResult['heading'] = StringPeer::getSTring('wns.news.sidebar.heading');
			break;
		case 'magic_column':
			$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_CLASSNAME;
			$aResult['has_data'] = false;
			break;
		}
		return $aResult;
	}

	public function usedWidgets() {
		return array($this->oSidebarWidget, $this->oListWidget);
	}
}