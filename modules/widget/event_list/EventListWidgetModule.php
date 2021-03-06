<?php
/**
 * @package modules.widget
 */
class EventListWidgetModule extends SpecializedListWidgetModule {

	public $oDelegateProxy;
	public $iEventTypeId;
	public $iSchoolClassId = null;

	protected function createListWidget() {
		$oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, "Event", "date_start", "desc");
		$oListWidget->setDelegate($this->oDelegateProxy);
		return $oListWidget;
	}

	public function setEventTypeId($iEventTypeId) {
	  $this->iEventTypeId = $iEventTypeId;
	}

	public function getEventTypeId() {
	  return $this->iEventTypeId;
	}

	public function getColumnIdentifiers() {
		return array('id', 'title', 'body_short_truncated', 'date_start_formatted', 'is_active', 'is_common', 'class_name', 'has_bericht', 'has_images', 'delete');
	}

	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array('is_sortable' => true);
		switch($sColumnIdentifier) {
			case 'title':
				$aResult['heading'] = TranslationPeer::getString('wns.event.title');
				break;
			case 'body_short_truncated':
				$aResult['heading'] = TranslationPeer::getString('wns.event.body_short');
				break;
			case 'date_start_formatted':
				$aResult['heading'] = TranslationPeer::getString('wns.event.date_start');
				break;
			case 'is_common':
				$aResult['heading'] = TranslationPeer::getString('wns.event.is_common_list');
				break;
			case 'is_active':
				$aResult['heading'] = TranslationPeer::getString('wns.event.is_online');
				break;
			case 'class_name':
				$aResult['heading'] = TranslationPeer::getString('wns.event.is_class_event');
				break;
			case 'has_images':
				$aResult['heading'] = TranslationPeer::getString('event.images');
				$aResult['is_sortable'] = false;
				break;
			case 'has_bericht':
				$aResult['heading'] = TranslationPeer::getString('event.bericht');
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
		if($sColumnIdentifier === 'date_start_formatted') {
			return EventPeer::DATE_START;
		}
		if($sColumnIdentifier === 'body_short_truncated') {
			return EventPeer::BODY_SHORT;
		}
		if($sColumnIdentifier === 'class_name') {
			return EventPeer::SCHOOL_CLASS_ID;
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

	public function getEventTypeHasEvents($iEventTypeId) {
		return EventQuery::create()->filterByEventTypeId($iEventTypeId)->count() > 0;
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
	public function getCriteria() {
    return EventQuery::create()->excludeExternallyManaged();
	}
}
