<?php
class NewsAdminModule extends AdminModule {

	private $oListWidget;
	private $oSidebarWidget;
	private $oInputWidget;

	public function __construct() {
		$this->oListWidget = new NewsListWidgetModule();
		$this->oListWidget->addPaging();
		NewsType::createDefaultTypesIfNotExist();
		$this->oSidebarWidget = new ListWidgetModule();
		$this->oSidebarWidget->setListTag(new TagWriter('ul'));
		$this->oSidebarWidget->setDelegate(new CriteriaListWidgetDelegate($this, 'NewsType', 'name'));
		$this->oSidebarWidget->setSetting('initial_selection', array('news_type_id' => $this->oListWidget->oDelegateProxy->getNewsTypeId()));
		$this->oInputWidget = new SidebarInputWidgetModule();
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

	public function getCustomListElements() {
		if(NewsTypeQuery::create()->filterByIsExternallyManaged(false)->count() > 0) {
			return array(
				array('news_type_id' => CriteriaListWidgetDelegate::SELECT_ALL,
							'name' => StringPeer::getString('wns.sidebar.select_all'),
							'magic_column' => 'all'),
				array('news_type_id' => CriteriaListWidgetDelegate::SELECT_WITHOUT,
							'name' => StringPeer::getString('wns.news.without_type'),
							'magic_column' => 'without'));
		}
		return array();
	}

	public function getCriteria() {
		return NewsTypeQuery::create()->filterByIsExternallyManaged(false);
	}

	public function usedWidgets() {
		return array($this->oSidebarWidget, $this->oListWidget, $this->oInputWidget);
	}
}