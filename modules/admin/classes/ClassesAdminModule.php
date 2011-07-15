<?php
/**
 * @package modules.admin
 */
class ClassesAdminModule extends AdminModule {
	private $oListWidget;
	private $oSidebarWidget;
	
	public function __construct() {
		$this->oListWidget = new ClassListWidgetModule();
		if(isset($_REQUEST['class_type_id'])) {
			$this->oListWidget->oDelegateProxy->setClassTypeName($_REQUEST['class_type_id']);
		}
		$this->addResourceParameter(ResourceIncluder::RESOURCE_TYPE_JS, 'class_type_id', $this->oListWidget->oDelegateProxy->getClassTypeName());
		$this->oSidebarWidget = new ListWidgetModule();
		$this->oSidebarWidget->setListTag(new TagWriter('ul'));
		$this->oSidebarWidget->setDelegate(new CriteriaListWidgetDelegate($this, 'ClassType', 'name'));
	}
	
	public function mainContent() {
		return $this->oListWidget->doWidget();
	}
	
	public function sidebarContent() {
    return $this->oSidebarWidget->doWidget();
	}
	
	public function getColumnIdentifiers() {
		return array('class_type_id', 'name', 'magic_column');
	}
	
	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array();
		switch($sColumnIdentifier) {
			case 'class_type_id':
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_DATA;
				$aResult['field_name'] = 'id';
				break;
			case 'name':
				$aResult['heading'] = StringPeer::getString('wns.classes.sidebar_heading');
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
			array('class_type_id' => CriteriaListWidgetDelegate::SELECT_ALL,
						'name' => StringPeer::getString('wns.sidebar.select_all'),
						'magic_column' => 'all')
						);
	}
	
	public function usedWidgets() {
		return array($this->oListWidget, $this->oSidebarWidget);
	}
}
