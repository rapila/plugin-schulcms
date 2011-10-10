<?php
/**
 * @package modules.frontend
 */

class BlackboardFrontendModule extends DynamicFrontendModule implements WidgetBasedFrontendModule {
	
	public static $DISPLAY_MODES = array('event_report_or_note', 'event_report', 'note');
	
	const MODE_SELECT_KEY = 'display_mode';
	
	public function renderFrontend() {
		$aOptions = @unserialize($this->getData());
		if(!isset($aOptions[self::MODE_SELECT_KEY])) {
			return null;
		}
		switch($aOptions[self::MODE_SELECT_KEY]) {
			case 'event_report_or_note': return $this->renderEventReportOrNote();
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
	
	public function renderNote() {
		$oQuery = NoteQuery::create()->filterByDate()->orderByDateStart();
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
		$iDaysBack = 30;
		$sDate = date('Y-m-d', time() - ($iDaysBack * 24 * 60 * 60));
		$oQuery = EventQuery::create()->filterByDateRangeReview()->filterbyHasImagesOrReview()->filterBySchoolClassId(null, Criteria::ISNULL)->filterByUpdatedAt($sDate, Criteria::GREATER_EQUAL);
		$oEvent = $oQuery->orderByUpdatedAt(Criteria::DESC)->findOne();
		if($oEvent === null) {
			return;
		}
		$sMessageKey = '';
		if($oEvent->hasReviewText()) {
			$sMessageKey .= 'review';
		}
		if($oEvent->hasImages()) {
			if($sMessageKey === 'review') {
				$sMessageKey .= '_and_';
			}
			$sMessageKey .= 'images';
		}		
		$iEventTypeId = $oEvent->getEventTypeId() == null ? 1 : $oEvent->getEventTypeId();
		$oPage = PagePeer::getPageByIdentifier(SchoolPeer::getPageIdentifier(SchoolPeer::PAGE_IDENTIFIER_EVENTS.'-'.$iEventTypeId));
		$oTemplate = $this->constructTemplate('report');
		$oTemplate->replaceIdentifier('event_link', LinkUtil::link($oEvent->getEventPageLink($oPage)));
		$oTemplate->replaceIdentifier('event_title', $oEvent->getTitle());
		$oTemplate->replaceIdentifier('event_report_prefix', StringPeer::getString('blackboard_review_prefix.'.$sMessageKey).' ');
		return $oTemplate;
	}
	
	public function widgetData() {
		$aOptions = @unserialize($this->getData()); 
		return $aOptions[self::MODE_SELECT_KEY];
	}
	
	public function widgetSave($mData) {
		$this->oLanguageObject->setData(serialize($mData));
		return $this->oLanguageObject->save();
	}
	
	public function getWidget() {
		$aOptions = @unserialize($this->getData()); 
		$oWidget = new BlackboardEditWidgetModule(null, $this);
		$oWidget->setDisplayMode($aOptions[self::MODE_SELECT_KEY]);
		return $oWidget;
	}

}
