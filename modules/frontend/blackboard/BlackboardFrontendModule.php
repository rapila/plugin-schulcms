<?php
/**
 * @package modules.frontend
 */

class BlackboardFrontendModule extends DynamicFrontendModule {
	
	public static $DISPLAY_MODES = array('event_report_or_note', 'event_note_or_report', 'event_report', 'note');
	
	const MODE_SELECT_KEY = 'display_mode';
	
	public function renderFrontend() {
		$aOptions = $this->widgetData();
		if(!isset($aOptions[self::MODE_SELECT_KEY])) {
			return null;
		}
		switch($aOptions[self::MODE_SELECT_KEY]) {
			case 'event_report_or_note': return $this->renderEventReportOrNote();
			case 'event_note_or_report': return $this->renderNoteOrEventReport();
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
	
	public function renderNoteOrEventReport() {
		// handle note if exist
		$oNote = $this->renderNote();
		if($oNote !== null) {
			return $oNote;
		}
		// handle event report
		return $this->renderEventReport();
	}
	
	public function renderNote() {
		$oQuery = NoteQuery::create()->filterByIsInactive(false)->filterByDate()->orderByDateStart();
		$oNote = $oQuery->findOne();
		if($oNote && is_resource($oNote->getBody())) {
			$sContent = stream_get_contents($oNote->getBody());
			if($sContent != '') {
				return RichtextUtil::parseStorageForFrontendOutput($sContent);			
			}
		}
		return null;
	}
	
	public function renderEventReport() {
		// display event if has recent report or images
		$iRecentDaysBack = Settings::getSetting('school_settings', 'event_is_recent_day_count', 30);
		$sDate = date('Y-m-d', time() - ($iRecentDaysBack * 24 * 60 * 60));
		$oQuery = EventQuery::create()->filterByDateRangeReview()->filterbyHasImagesOrReview()->filterBySchoolClassId(null, Criteria::ISNULL)->filterByUpdatedAt($sDate, Criteria::GREATER_EQUAL);
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
	
	public function renderBackend() {
		$oTemplate = $this->constructTemplate('config');
		$aOptions = array();
		foreach(BlackboardFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
			$aOptions[$sDisplayMode] = StringPeer::getString('display_mode.'.$sDisplayMode, null, $sDisplayMode);
		}
		$oTemplate->replaceIdentifier('options', TagWriter::optionsFromArray($aOptions, null, null, null));
		return $oTemplate;
	}

}
