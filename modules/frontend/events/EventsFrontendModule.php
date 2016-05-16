<?php
/**
 * @package modules.frontend
 */

class EventsFrontendModule extends DynamicFrontendModule {

	public static $DISPLAY_MODES = array('list', 'list_context', 'recent_report', 'recent_reports');

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
			case 'recent_reports': return $this->renderRecentReports();
		}
		return '';
	}

	public function renderContextList() {
		$oQuery = $this->baseQuery()->upcomingOrOngoing()->orderByDateStart();
		if($this->iLimit) {
			$oQuery->limit($this->iLimit);
		}
		return TagWriter::quickTag('div', array('class' => 'calendar-overview'), self::renderOverviewList($oQuery->find(), 100, StringPeer::getString('school.no_future_events_available', null, null)));
	}

	public static function renderOverviewList($aEvents, $iTruncate = 50, $sNoEventMessage = null) {
		$oTemplate = static::template('overview_list');
		$oTemplate->replaceIdentifierCallback('item', function($oIdentifier) use (&$oTemplate, &$aEvents, &$iTruncate, &$sNoEventMessage) {
			$sLanguage = 'de_CH';
			if($oIdentifier->hasParameter('locale')) {
				$sLanguage = $oIdentifier->getParameter('locale');
			}
			$oItemPrototype = static::template('overview_item');
			$oDatePrototype = static::template('date');
			$oEventPage =	PageQuery::create()->filterByPageType('events')->findOne();

			foreach($aEvents as $oEvent) {
				$oItemTemplate = clone $oItemPrototype;
				$oDateTemplate = clone $oDatePrototype;
				$oDateTemplate->replaceIdentifier('date_day', strftime("%d",$oEvent->getDateStart('U')));
				$sMonthName = LocaleUtil::localizeDate($oEvent->getDateStartTimeStamp(), $sLanguage, 'b');
				$oDateTemplate->replaceIdentifier('date_month', $sMonthName);
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
		});
		return $oTemplate;
	}

	private function renderRecentReport() {
		$oEvent = $this->pastQuery(true)->filterByHasImages()->findOne();
		if($oEvent === null) {
			return;
		}
		// $oTemplate = $this->constructTemplate('report_short');
		return self::recentReport($oEvent);
	}

	private function renderRecentReports() {
		$aEvents = $this->pastQuery()->filterByHasImages()->orderByDateStart(Criteria::DESC)->find();
		if(count($aEvents) === 0) {
			return;
		}
		$oTemplate = new Template(TemplateIdentifier::constructIdentifier('reports'), null, true);
		foreach($aEvents as $oEvent) {
			$oTemplate->replaceIdentifierMultiple('reports', self::recentReport($oEvent));
		}

		return $oTemplate;
	}

	public static function recentReport($oEvent, $sTitle = null) {
		if($oEvent === null) {
			return;
		}
		$oImage = $oEvent->getFirstImage()->getDocument();
		if(!$oImage) {
			return;
		}
		$iMaxWidth = 300;
		$oTemplate = static::template('recent_report');
		$oTemplate->replaceIdentifier('title', $sTitle);
		$oTemplate->replaceIdentifier('detail_link', LinkUtil::link($oEvent->getLink()));
		$oTemplate->replaceIdentifier('detail_link_title', $oEvent->getTitle());
		$oTemplate->replaceIdentifierCallback('recent_report_intro', function($oIdentifier) use ($oEvent) {
			$iLength = 160;
			if($oIdentifier->hasParameter('length')) {
				$iLength = $oIdentifier->getParameter('length');
			}
			return $oEvent->getBodyShortTruncated($iLength);
		});
		$oTemplate->replaceIdentifierCallback('recent_report_image', function($oIdentifier) use ($oEvent, $oImage, $iMaxWidth) {
			$iMax = $iMaxWidth;
			if($oIdentifier->hasParameter('max_width')) {
				$iMax = $oIdentifier->getParameter('max_width');
			}
			return TagWriter::quickTag('img', array('src' => $oImage->getDisplayUrl(array('max_width' => $iMax)), 'alt' => $oImage->getDescription(), 'class' => $oIdentifier->getParameter('class'), 'title' => $oEvent->getTitle()));
		});
		return $oTemplate;
	}

	private function pastQuery($bLimitAge = false) {
		$oQuery = $this->baseQuery();
		if($bLimitAge) {
			$sDate = date('Y-m-d', time() - (Settings::getSetting('schulcms', 'event_is_recent_report_day_count', 60) * 24 * 60 * 60));
			// FIXME: Do we still need this?
			$oQuery->filterByUpdatedAt($sDate, Criteria::GREATER_EQUAL);
			$oQuery->past($sDate);
		} else {
			$oQuery->past();
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
