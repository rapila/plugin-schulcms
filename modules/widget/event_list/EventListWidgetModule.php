<?php
/**
 * @package modules.widget
 */
class EventListWidgetModule extends WidgetModule {

	private $oListWidget;
	public $oDelegateProxy;
	public $oBooleanInputFilter;
	public $iEventTypeId;
	public $bShowClassEvent;
	
	public function __construct() {
		$this->oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, "Event", "Title", "asc");
		$this->oListWidget->setDelegate($this->oDelegateProxy);
		$this->oBooleanInputFilter = WidgetModule::getWidget('boolean_input', null, true);
		$this->oDelegateProxy->setIsClassEvent(true);
	}
	
	public function setEventTypeId($iEventTypeId) {
	  $this->iEventTypeId = $iEventTypeId;
	}
	
	public function getEventTypeId() {
	  return $this->iEventTypeId;
	}
	
	public function doWidget() {
		$aTagAttributes = array('class' => 'event_list');
		$oListTag = new TagWriter('table', $aTagAttributes);
		$this->oListWidget->setListTag($oListTag);
		return $this->oListWidget->doWidget();
	}
	
	public function getColumnIdentifiers() {
		return array('id', 'title', 'teaser_truncated', 'date_start_formatted', 'is_class_event', 'is_service_event', 'is_active', 'ignore_on_frontpage', 'has_bericht', 'has_images', 'delete');
	}
	
	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array('is_sortable' => true);
		switch($sColumnIdentifier) {
			case 'title':
				$aResult['heading'] = StringPeer::getString('wns.event.title');
				break;
			case 'teaser_truncated':
				$aResult['heading'] = StringPeer::getString('wns.event.teaser');
				break;
			case 'date_start_formatted':
				$aResult['heading'] = StringPeer::getString('wns.event.date_start');
				break;
			case 'is_class_event':
        $aResult['heading'] = StringPeer::getString('wns.events.general');
				$aResult['heading_filter'] = array('boolean_input', $this->oBooleanInputFilter->getSessionKey());
				$aResult['is_sortable'] = false;
				break;			
			case 'ignore_on_frontpage':
				$aResult['heading'] = StringPeer::getString('wns.event.ignore_on_frontpage');
				break;
			case 'is_service_event':
				$aResult['heading'] = StringPeer::getString('wns.event.is_service_event');
				break;
			case 'is_active':
				$aResult['heading'] = StringPeer::getString('wns.event.is_online');
				break;
			case 'has_images':
				$aResult['heading'] = StringPeer::getString('event.images');
				$aResult['is_sortable'] = false;
				break;
			case 'has_bericht':
				$aResult['heading'] = StringPeer::getString('event.bericht');
				$aResult['is_sortable'] = false;
				break;
			case 'delete':
				$aResult['heading'] = ' ';
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_ICON;
				$aResult['field_name'] = 'trash';
				break;
		}
		return $aResult;
	}

	public function getDatabaseColumnForColumn($sColumnIdentifier) {
		if($sColumnIdentifier === 'is_class_event') {
			return EventPeer::SCHOOL_CLASS_ID;
		}    
		if($sColumnIdentifier === 'date_start_formatted') {
			return EventPeer::DATE_START;
		}    
		if($sColumnIdentifier === 'teaser_truncated') {
			return EventPeer::TEASER;
		}    
    if($sColumnIdentifier === 'is_service_event') {
			return EventPeer::SERVICE_ID;
		}    
		return null;
	}
	
	public function getFilterTypeForColumn($sColumnIdentifier) {
		if($sColumnIdentifier === 'event_type_id') {
			return CriteriaListWidgetDelegate::FILTER_TYPE_IS;
		}
		return null;
	}
	
  public function toggleIsActive($aRowData) {
		$oService = EventPeer::retrieveByPK($aRowData['id']);
		if($oService) {
			$oService->setIsActive(!$oService->getIsActive());
			return $oService->save();
		}
		return false;
	}
	
  public function toggleIgnoreOnFrontpage($aRowData) {
		$oEvent = EventPeer::retrieveByPK($aRowData['id']);
		if($oEvent && $oEvent->getIsActive()) {
			$oEvent->setIgnoreOnFrontpage(!$oEvent->getIgnoreOnFrontpage());
			return $oEvent->save();
		}
		return false;
	}
	
	public function getEventTypeName() {
		if($this->oDelegateProxy->getEventTypeId() !== CriteriaListWidgetDelegate::SELECT_ALL) {
			$oEventType = EventTypePeer::retrieveByPK($this->oDelegateProxy->getEventTypeId());
			if($oEventType) {
				return $oEventType->getName();
			}
		}
		return $this->oDelegateProxy->getEventTypeId();
	}
	
	public function setIsClassEvent($bShowClassEvent) {
	  $this->bShowClassEvent = !$bShowClassEvent;
	}
	
	public function getCriteria() {
    return EventQuery::create()->excludeExternallyManaged(!$this->bShowClassEvent);
	}
}