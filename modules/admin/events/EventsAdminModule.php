<?php
/**
 * @package modules.admin
 */
class EventsAdminModule extends AdminModule {
	private $oListWidget;

	public function __construct() {
		$this->oListWidget = new EventListWidgetModule();
		$this->oListWidget->addPaging();
		$iRequestedId = Manager::peekNextPathItem();
		if($iRequestedId !== null && is_numeric($iRequestedId)) {
			$this->oListWidget->setSetting('initial_detail_id', $iRequestedId);
		}
		$this->oSidebarWidget = new ListWidgetModule();
		$this->oSidebarWidget->setListTag(new TagWriter('ul'));
		$this->oSidebarWidget->setDelegate(new CriteriaListWidgetDelegate($this, 'EventType', 'name'));
		if(isset($_REQUEST['event_type_id'])) {
			$this->oListWidget->oDelegateProxy->setEventTypeId($_REQUEST['event_type_id']);
		}
		$this->oSidebarWidget->setSetting('initial_selection', array('event_type_id' => $this->oListWidget->oDelegateProxy->getEventTypeId()));
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
				$aResult['heading'] = TranslationPeer::getString('wns.events.sidebar_heading');
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
							'name' => TranslationPeer::getString('wns.sidebar.select_all'),
							'magic_column' => 'all'));
		}
		return array();
	}

	public function getCriteria() {
		return EventTypeQuery::create()->filterByIsExternallyManaged(false);
	}

	public function usedWidgets() {
		return array($this->oListWidget, $this->oSidebarWidget);
	}
}
