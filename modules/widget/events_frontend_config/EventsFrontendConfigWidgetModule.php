<?php
class EventsFrontendConfigWidgetModule extends FrontendConfigWidgetModule { 

	public function getDisplayModes() {
		$aResult = array();
		
		// Display modes
		$aResult['display_modes'] = array();
		foreach(EventsFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
			$aResult['display_modes'][$sDisplayMode] = StringPeer::getString('display_mode.'.$sDisplayMode, null, $sDisplayMode);
		}
	
		// Event types
		$aEventTypes = EventTypeQuery::create()->orderByName()->find();
		if(count($aEventTypes) > 0) {
			$aResult['event_types'] = array();
			foreach($aEventTypes as $oEventType) {
				$aResult['event_types'][$oEventType->getId()] = $oEventType->getName();
			}
		}
		
		// Display list limit
		$aResult['event_limits'] = array('' => StringPeer::getString('wns.events.display_all'));
		foreach(range(1,4) as $iCount) {
			$aResult['event_limits'][$iCount] = $iCount;
		}
		return $aResult;
	}
	
	public function allEvents($iEventTypeId = null, $iLimit = null, $bIsArchive = false) {
		$oQuery = EventQuery::create()->filterBySchoolClassId(null, Criteria::ISNULL);
		if(is_numeric($iEventTypeId)) {
			$oQuery->filterByEventTypeId($iEventTypeId);
		}
		if(!$bIsArchive) {
			$oQuery->upcomingOrOngoing()->orderByDateStart();
		} else {
			$oQuery->past()->orderByDateStart(Criteria::DESC);
		}
		if($iLimit !== null) {
			$oQuery->limit($iLimit);
		}
		$aResult = array();
		foreach($oQuery->orderByTitle()->find() as $oEvent) {
			$aResult[$oEvent->getId()] = $oEvent->getDateStart('Ymd').' '.$oEvent->getTitle();
		}
		return $aResult;
	}
}