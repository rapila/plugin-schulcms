<?php
class EventFrontendConfigWidgetModule extends FrontendConfigWidgetModule { 

	public function getDisplayModes() {
	  $aResult = array();
	  $aEventTypes = EventTypeQuery::create()->orderByName()->find();
		if(count($aEventTypes) > 0) {
			$aResult['event_types'] = array();
			foreach($aEventTypes as $oEventType) {
				$aResult['event_types'][$oEventType->getId()] = $oEventType->getName();
			}
		}
		$aResult['display_modes'] = array();
	  foreach(EventsFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
	    $aResult['display_modes'][$sDisplayMode] = StringPeer::getString('display_mode.'.$sDisplayMode, null, $sDisplayMode);
	  }
		$aResult['event_limits'] = array('' => StringPeer::getString('wns.events.display_all'));
	  foreach(range(1,4) as $iCount) {
	    $aResult['event_limits'][$iCount] = $iCount;
	  }
		return $aResult;
	}
	
	public function allEvents($iEventTypeId = null, $bIsArchive = false) {
		$oQuery = EventQuery::create()->filterBySchoolClassId(null, Criteria::ISNULL);
		if(is_numeric($iEventTypeId)) {
			$oQuery->filterByEventTypeId($iEventTypeId);
		}
		if(!$bIsArchive) {
			$oQuery->filterByDateRangePreview()->orderByDateStart();
		} else {
			$oQuery->filterByDateRangeReview()->orderByDateStart(Criteria::DESC);
		}
		$aResult = array();
		foreach($oQuery->orderByTitle()->find() as $oEvent) {
			$aResult[$oEvent->getId()] = $oEvent->getDateStart('Ymd').'. '.$oEvent->getTitle();
		}
		return $aResult;
	}
}