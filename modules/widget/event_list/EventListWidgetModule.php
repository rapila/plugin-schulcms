<?php
/**
 * @package modules.widget
 */
class EventListWidgetModule extends SpecializedListWidgetModule {

	public $oDelegateProxy;
	public $oBooleanInputFilter;
	public $iEventTypeId;
	public $bShowClassEvent;
	public $iSchoolClassId = null;

	protected function createListWidget() {
		$oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, "Event", "date_start", "desc");
		$this->oDelegateProxy->setIsClassEvent(true);
		$oListWidget->setDelegate($this->oDelegateProxy);
		$this->oBooleanInputFilter = WidgetModule::getWidget('boolean_input', null, true);
		return $oListWidget;
	}

	public function setEventTypeId($iEventTypeId) {
	  $this->iEventTypeId = $iEventTypeId;
	}

	public function getEventTypeId() {
	  return $this->iEventTypeId;
	}

	public function getColumnIdentifiers() {
		return array('id', 'title', 'body_truncated', 'date_start_formatted', 'is_class_event', 'is_active', 'is_common', 'has_bericht', 'has_images', 'delete');
	}

	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array('is_sortable' => true);
		switch($sColumnIdentifier) {
			case 'title':
				$aResult['heading'] = StringPeer::getString('wns.event.title');
				break;
			case 'body_truncated':
				$aResult['heading'] = StringPeer::getString('wns.event.body_short');
				break;
			case 'date_start_formatted':
				$aResult['heading'] = StringPeer::getString('wns.event.date_start');
				break;
			case 'is_class_event':
        $aResult['heading'] = StringPeer::getString('wns.events.general');
				$aResult['heading_filter'] = array('boolean_input', $this->oBooleanInputFilter->getSessionKey());
				$aResult['is_sortable'] = false;
				break;
			case 'is_common':
				$aResult['heading'] = StringPeer::getString('wns.event.is_common_list');
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
		if($sColumnIdentifier === 'body_truncated') {
			return EventPeer::BODY;
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
		$oService = EventQuery::create()->findPk($aRowData['id']);
		if($oService) {
			$oService->setIsActive(!$oService->getIsActive());
			return $oService->save();
		}
		return false;
	}

  public function toggleIsCommon($aRowData) {
		$oEvent = EventQuery::create()->findPk($aRowData['id']);
		if($oEvent && $oEvent->getIsActive()) {
			$oEvent->setIsCommon(!$oEvent->getIsCommon());
			return $oEvent->save();
		}
		return false;
	}

	public function getEventTypeName() {
		if($this->oDelegateProxy->getEventTypeId() !== CriteriaListWidgetDelegate::SELECT_ALL) {
			$oEventType = EventTypeQuery::create()->findPk($this->oDelegateProxy->getEventTypeId());
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
    $oQuery = EventQuery::create();
		if(!$this->bShowClassEvent) {
			$oQuery->excludeExternallyManaged();
		}
		return $oQuery;
	}
}
