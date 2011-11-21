<?php
/**
 * @package modules.admin
 */
class ServicesAdminModule extends AdminModule {
  
	private $oListWidget;
	private $oSidebarWidget;
	
	public function __construct() {
		$this->oListWidget = new ServiceListWidgetModule();
		$iRequestedId = Manager::peekNextPathItem();
		if($iRequestedId !== null && is_numeric($iRequestedId)) {
			$this->oListWidget->setSetting('initial_detail_id', $iRequestedId);
		}

		$this->oSidebarWidget = new ListWidgetModule();
		$this->oSidebarWidget->setListTag(new TagWriter('ul'));
		$this->oSidebarWidget->setDelegate(new CriteriaListWidgetDelegate($this, 'ServiceCategory', 'name'));
		if(isset($_REQUEST['service_category_id'])) {
			$this->oListWidget->oDelegateProxy->setServiceCategoryId($_REQUEST['service_category_id']);
		}
    $this->oSidebarWidget->setSetting('initial_selection', array('service_category_id' => $this->oListWidget->oDelegateProxy->getServiceCategoryId()));
	}
	
	public function mainContent() {
		return $this->oListWidget->doWidget();
	}
	
	public function sidebarContent() {
	  return $this->oSidebarWidget->doWidget();
	}
	
  public function getColumnIdentifiers() {
		return array('service_category_id', 'name', 'magic_column');
	}
	
	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array();
		switch($sColumnIdentifier) {
			case 'service_category_id':
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_DATA;
				$aResult['field_name'] = 'id';
				break;
			case 'name':
				$aResult['heading'] = StringPeer::getString('wns.service_category.sidebar_heading');
				break;
			case 'magic_column':
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_CLASSNAME;
				$aResult['has_data'] = false;
				break;
		}
		return $aResult;
	}
	
	public function getCustomListElements() {
		return array(
			array('service_category_id' => CriteriaListWidgetDelegate::SELECT_ALL,
						'name' => StringPeer::getString('wns.sidebar.select_all'),
						'magic_column' => 'all'),
			array('service_category_id' => CriteriaListWidgetDelegate::SELECT_WITHOUT,
						'name' => StringPeer::getString('wns.services.select_without_title'),
						'magic_column' => 'all')
						);
	}
	
	public function usedWidgets() {
		return array($this->oListWidget, $this->oSidebarWidget);
	}
}
