<?php
class EventEditWidgetModule extends EditWidgetModule { 

	public function getDisplayModes() {
	  $aResult = array();
	  $aEventTypes = EventTypeQuery::create()->orderByName()->find();
		if(count($aEventTypes) > 0) {
			foreach($aEventTypes as $oEventType) {
				$aResult[$oEventType->getId()] = $oEventType->getName();
				$aResult[$oEventType->getId().'-archive'] = $oEventType->getName(). ' Archiv';
			}
		}
	  foreach(EventsFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
	    $aResult[$sDisplayMode] = StringPeer::getString('display_mode.'.$sDisplayMode, null, $sDisplayMode);
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