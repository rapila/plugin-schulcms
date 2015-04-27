<?php
/**
 * @package modules.frontend
 */

class EventsFrontendModule extends DynamicFrontendModule {

	public static $DISPLAY_MODES = array('list_context', 'recent_report');

	public static $EVENT;
	public $iEventTypeId;
	private $bIsSidebar;
	private $oEventPage;

	const DETAIL_IDENTIFIER = 'id';
	const MODE_SELECT_KEY = 'display_mode';
	const MODE_EVENT_TYPE_ID = 'event_type_id';
	const MODE_EVENT_LIMIT = 'event_limit';

	public function renderFrontend() {
		$aOptions = @unserialize($this->getData());

		$this->iEventTypeId = $aOptions[self::MODE_EVENT_TYPE_ID];
		$this->oEventPage = PageQuery::create()->filterByPageType('events')->findOne();
		$this->iLimit = is_numeric($aOptions[self::MODE_EVENT_LIMIT]) && ($aOptions[self::MODE_EVENT_LIMIT] != '0') ? $aOptions[self::MODE_EVENT_LIMIT] : null;
		switch($aOptions[self::MODE_SELECT_KEY]) {
			case 'list': return $this->renderContextList();
			case 'list_context': return $this->renderContextList();
			case 'recent_report': return $this->renderRecentReport();
		}
		return '';
	}

	public function renderContextList() {
		$oQuery = $this->baseQuery()->orderByDateStart();
		if($this->iLimit) {
			$oQuery->limit($this->iLimit);
		}
		return TagWriter::quickTag('div', array('class' => 'calendar-overview'), self::renderOverviewList($oQuery->find(), 100, String::getString('school.no_future_events_available', null, null)));
	}

	public static function renderOverviewList($aEvents, $iTruncate = 100, $sNoEventMessage = null) {
		$oTemplate = static::template('overview_list');
		$oItemPrototype = static::template('overview_item');
		$oDatePrototype = static::template('date');
		$oEventPage =	PageQuery::create()->filterByPageType('events')->findOne();
		foreach($aEvents as $oEvent) {
			$oItemTemplate = clone $oItemPrototype;

			$oDateTemplate = clone $oDatePrototype;
			$oDateTemplate->replaceIdentifier('date_day', strftime("%d",$oEvent->getDateStart('U')));
			$oDateTemplate->replaceIdentifier('date_month', strftime("%b",$oEvent->getDateStart('U')));
			$oItemTemplate->replaceIdentifier('date_item', $oDateTemplate);
			$oItemTemplate->replaceIdentifier('title', $oEvent->getTitle());
			$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($oEvent->getLink($oEventPage)));
			$oItemTemplate->replaceIdentifier('description', EventsPageTypeModule::getContentForFrontend($oEvent->getBodyShort(), true, $iTruncate));
			if($oEvent->isToday()) {
				$oItemTemplate->replaceIdentifier('class_today', ' today');
				$oItemTemplate->replaceIdentifier('today', StringPeer::getString('wns.event.today'));
			}
			$oTemplate->replaceIdentifierMultiple('item', $oItemTemplate);
		}
		if(count($aEvents) === 0 && $sNoEventMessage) {
			$oTemplate->replaceIdentifier('item', TagWriter::quickTag('p', array(), $sNoEventMessage));
		}
		return $oTemplate;
	}

	private function renderRecentReport() {
		$oEvent = $this->pastQuery(true)->joinEventDocument()->orderByUpdatedAt(Criteria::DESC)->findOne();
		if($oEvent === null) {
			return;
		}
		// $oTemplate = $this->constructTemplate('report_short');
		return self::recentReport($oEvent);
	}

	public static function recentReport($oEvent, $oTemplate = null, $iMaxWidth = 300) {
		if($oEvent === null) {
			return;
		}
		$oImage = $oEvent->getFirstImage()->getDocument();
		if(!$oImage) {
			return;
		}
		$oTemplate = $oTemplate === null ? static::template('recent_report') : $oTemplate;
		$oTemplate->replaceIdentifier('detail_link', LinkUtil::link($oEvent->getLink()));
		$oTemplate->replaceIdentifier('detail_link_title', $oEvent->getTitle());
		$oTemplate->replaceIdentifier('recent_report_image', TagWriter::quickTag('img', array('src' => $oImage->getDisplayUrl(array('max_width' => $iMaxWidth)), 'alt' => $oImage->getDescription(), 'title' => $oEvent->getTitle())));
		return $oTemplate;
	}

	private function pastQuery($bLimitAge = false) {
		if($bLimitAge) {
			$sDate = date('Y-m-d', time() - (Settings::getSetting('schulcms', 'event_is_recent_report_day_count', 60) * 24 * 60 * 60));
			$oQuery = $this->baseQuery()->filterByUpdatedAt($sDate, Criteria::GREATER_EQUAL);
			$oQuery->past($sDate);
		}
		return $oQuery;
	}

	private function baseQuery() {
		$oQuery = self::commonQuery();
		if($this->iLimit) {
			$oQuery->limit($this->iLimit);
		}
		if($this->iEventTypeId !== null) {
			$oQuery->filterByEventTypeId($this->iEventTypeId);
		}
		return $oQuery;
	}

	public static function commonQuery() {
		return FrontendEventQuery::create()->excludeClassEvents();
	}

	public function getSaveData($mData) {
		$mData['event_limit'] = $mData['event_limit'] === '' ? null : $mData['event_limit'];
		return parent::getSaveData($mData);
	}
}
