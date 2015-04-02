<?php
/**
 * @package modules.admin
 */
class ClassesAdminModule extends AdminModule implements ListWidgetDelegate {
	private $oListWidget;
	private $oSidebarWidget;

	public function __construct() {
		$this->oListWidget = new ClassListWidgetModule();
		$this->oListWidget->addPaging();
		if(isset($_REQUEST['class_type'])) {
			$this->oListWidget->oDelegateProxy->setClassType($_REQUEST['class_type']);
		}
		$this->oSidebarWidget = new ListWidgetModule();
		$this->oSidebarWidget->setListTag(new TagWriter('ul'));
		$this->oSidebarWidget->setDelegate($this);
		$this->oSidebarWidget->setSetting('initial_selection', array('class_type' => $this->oListWidget->oDelegateProxy->getClassType()));
	}

	public function mainContent() {
		return $this->oListWidget->doWidget();
	}

	public function sidebarContent() {
    return $this->oSidebarWidget->doWidget();
	}

	public function getColumnIdentifiers() {
		return array('class_type', 'name', 'magic_column');
	}

	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array();
		switch($sColumnIdentifier) {
			case 'class_type':
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

	public static function getCustomListElements() {
		return array(
			array('class_type' => CriteriaListWidgetDelegate::SELECT_ALL,
						'name' => StringPeer::getString('wns.sidebar.select_all'),
						'magic_column' => 'all')
						);
	}

	public function getListContents($iRowStart = 0, $iRowCount = null) {
		$aResult = array();
		foreach(ClassListWidgetModule::listQuery()->select(array('ClassType'))->distinct()->orderByClassType()->find() as $aClassType) {
			$aResult[] = array('class_type' => $aClassType, 'name' => $aClassType);
		}
		if($iRowCount === null) {
			$iRowCount = count($aResult);
		}
		$aResult = array_merge(self::getCustomListElements(), $aResult);
		return $aResult;
	}

	public function numberOfRows() {
		return count($this->getListContents());
	}

	public function usedWidgets() {
		return array($this->oListWidget, $this->oSidebarWidget);
	}
}
