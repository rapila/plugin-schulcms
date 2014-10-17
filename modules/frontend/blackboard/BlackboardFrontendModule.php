<?php
/**
 * @package modules.frontend
 */

class BlackboardFrontendModule extends DynamicFrontendModule {

	private $iBlackboardNoteTypeId = null;
	public static $DISPLAY_MODES = array('event_report_or_note', 'event_report', 'note');

	const MODE_SELECT_KEY = 'display_mode';

	public function renderFrontend() {
		$this->iBlackboardNoteTypeId = Settings::getSetting("schulcms", 'blackboard_news_type_id', null);

		$aOptions = $this->widgetData();
		if(!isset($aOptions[self::MODE_SELECT_KEY])) {
			return null;
		}
		switch($aOptions[self::MODE_SELECT_KEY]) {
			case 'event_report_or_note': return $this->renderEventReportOrNote();
			case 'event_report': return $this->renderEventReport();
			case 'note': return $this->renderNote();
			default:
				return null;
		}
	}

	public function renderEventReportOrNote() {
		// handle report if exist
		$oReport = $this->renderEventReport();
		if($oReport !== null) {
			return $oReport;
		}
		// handle notes
		return $this->renderNote();
	}

	public function renderEventReport() {
		// display event if has recent report or images
		$iRecentDaysBack = Settings::getSetting('schulcms', 'event_is_recent_day_count', 60);
		$sDate = date('Y-m-d', time() - ($iRecentDaysBack * 24 * 60 * 60));
		$oQuery = FrontendEventQuery::create()->past()->filterbyHasImagesOrReview()->excludeClassEvents()->filterByUpdatedAt($sDate, Criteria::GREATER_EQUAL);
		$oEvent = $oQuery->orderByUpdatedAt(Criteria::DESC)->findOne();

		if($oEvent === null) {
			return;
		}
		// message string key
		$sMessageKey = '';
		if($oEvent->hasReviewText()) {
			$sMessageKey .= 'review';
		}
		// event type id
		$iEventTypeId = $oEvent->getEventTypeId() == null ? 1 : $oEvent->getEventTypeId();
		$oPage = PagePeer::getPageByIdentifier(SchoolPeer::getPageIdentifier(SchoolPeer::PAGE_IDENTIFIER_EVENTS.'-'.$iEventTypeId));
		$oEventLink = LinkUtil::link($oEvent->getEventPageLink($oPage));
		$oTemplate = $this->constructTemplate('report');
		if($oEvent->hasImages()) {
			if($sMessageKey === 'review') {
				$sMessageKey .= '_and_';
			}
			$sMessageKey .= 'images';
			$oImage = $oEvent->getFirstImage()->getDocument();
			$oImageTag = TagWriter::quickTag('img', array('class' => 'blackboard_image', 'src' => $oImage->getDisplayUrl(array('max_width' => 195)), 'alt' => $oImage->getDescription(), 'title' => $oEvent->getTitle()));

			$oTemplate->replaceIdentifier('image', TagWriter::quickTag('a', array('href' => $oEventLink, 'title' => $oEvent->getTitle()), $oImageTag));
		}
		$oTemplate->replaceIdentifier('event_link', $oEventLink);
		$oTemplate->replaceIdentifier('event_title', $oEvent->getTitle());
		$oTemplate->replaceIdentifier('event_report_prefix', StringPeer::getString('blackboard_review_prefix.'.$sMessageKey).' ');
		$oTemplate->replaceIdentifier('event_date', LocaleUtil::localizeDate($oEvent->getDateStart()));

		return $oTemplate;
	}

	public function renderNote() {
		if($this->iBlackboardNoteTypeId === null) {
			return null;
		}
		$oQuery = NoteQuery::create()->filterByNoteTypeId($this->iBlackboardNoteTypeId)->filterByIsInactive(false)->filterByDate()->orderByDateStart();
		$oNote = $oQuery->findOne();
		$oTemplate = $this->constructTemplate('note');
		if($oNote) {
			if(is_resource($oNote->getBody())) {
				$sContent = stream_get_contents($oNote->getBody());
				if($sContent != '') {
					$oTemplate->replaceIdentifier('contents', RichtextUtil::parseStorageForFrontendOutput($sContent));
				}
			}
			if($oImage = $oNote->getDocument()) {
				$oTemplate->replaceIdentifier('image', TagWriter::quickTag('img', array('class' => 'blackboard_image', 'src' => $oImage->getDisplayUrl(array('max_width' => 195)), 'alt' => $oImage->getDescription())));
			}
			return $oTemplate;
		}
		return null;
	}

	public function renderBackend() {
		$oTemplate = $this->constructTemplate('config');
		$aOptions = array();
		foreach(BlackboardFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
			if($sDisplayMode !== 'event_report' &&
				(Settings::getSetting("schulcms", 'blackboard_news_type_id', null) === null)) {
				continue;
			}
			$aOptions[$sDisplayMode] = StringPeer::getString('display_mode.'.$sDisplayMode, null, $sDisplayMode);
		}
		$oTemplate->replaceIdentifier('options', TagWriter::optionsFromArray($aOptions, null, null, null));
		return $oTemplate;
	}

}
