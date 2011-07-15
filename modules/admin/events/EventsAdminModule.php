<?php
/**
 * @package modules.admin
 */
class EventsAdminModule extends AdminModule {
	private $oListWidget;
	
	public function __construct() {
		$this->oListWidget = new EventListWidgetModule();
		if(isset($_REQUEST['event_type_id'])) {
			$this->oListWidget->oDelegateProxy->setEventTypeId($_REQUEST['event_type_id']);
		}
		$this->addResourceParameter(ResourceIncluder::RESOURCE_TYPE_JS, 'event_type_id', $this->oListWidget->oDelegateProxy->getEventTypeId());

		$this->oSidebarWidget = new ListWidgetModule();
		$this->oSidebarWidget->setListTag(new TagWriter('ul'));
		$this->oSidebarWidget->setDelegate(new CriteriaListWidgetDelegate($this, 'EventType', 'name'));
	}
	
	public function mainContent() {
		return $this->oListWidget->doWidget();
	}
	public function sidebarContent() {
		return $this->oSidebarWidget->doWidget();
	}
	
	public function getColumnIdentifiers() {
		return array('event_type_id', 'name', 'magic_column');
	}
	
	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array();
		switch($sColumnIdentifier) {
			case 'event_type_id':
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_DATA;
				$aResult['field_name'] = 'id';
				break;
			case 'name':
				$aResult['heading'] = StringPeer::getString('wns.events.sidebar_heading');
				break;
			case 'magic_column':
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_CLASSNAME;
				$aResult['has_data'] = false;
				break;
		}
		return $aResult;
	}
	
	public function getCustomListElements() {
		if(EventTypePeer::doCount(new Criteria()) > 0) {
			return array(
				array('event_type_id' => CriteriaListWidgetDelegate::SELECT_ALL,
							'name' => StringPeer::getString('wns.sidebar.select_all'),
							'magic_column' => 'all'));
		}
		return array();
	}

	public function usedWidgets() {
		return array($this->oListWidget, $this->oSidebarWidget);
	}
}
