<?php
/**
 * @package modules.admin
 */
class TeamMembersAdminModule extends AdminModule {
	private $oListWidget;

	public function __construct() {
		$this->oListWidget = new TeamMemberListWidgetModule();
		$this->oListWidget->addPaging();
		if(isset($_REQUEST['function_group_id'])) {
			$this->oListWidget->oDelegateProxy->setFunctionGroupId($_REQUEST['function_group_id']);
		}
		$this->oSidebarWidget = new ListWidgetModule();
		$this->oSidebarWidget->setListTag(new TagWriter('ul'));
		$this->oSidebarWidget->setDelegate(new CriteriaListWidgetDelegate($this, 'FunctionGroup', 'name'));
		$this->oSidebarWidget->setSetting('initial_selection', array('function_group_id' => $this->oListWidget->oDelegateProxy->getFunctionGroupId()));
	}

	public function mainContent() {
		return $this->oListWidget->doWidget();
	}

	public function sidebarContent() {
    return $this->oSidebarWidget->doWidget();
	}

	public function getColumnIdentifiers() {
		return array('function_group_id', 'name', 'magic_column');
	}

	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array();
		switch($sColumnIdentifier) {
			case 'function_group_id':
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_DATA;
				$aResult['field_name'] = 'id';
				break;
			case 'name':
				$aResult['heading'] = TranslationPeer::getString('wns.team_members.sidebar_heading');
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
			array('function_group_id' => CriteriaListWidgetDelegate::SELECT_ALL,
						'name' => TranslationPeer::getString('wns.sidebar.select_all'),
						'magic_column' => 'all')
						);
	}

	public function usedWidgets() {
		return array($this->oListWidget, $this->oSidebarWidget);
	}

}
