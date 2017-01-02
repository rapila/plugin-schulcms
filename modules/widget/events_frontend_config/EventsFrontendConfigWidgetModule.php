<?php
class EventsFrontendConfigWidgetModule extends FrontendConfigWidgetModule {

	public function getDisplayModes() {
		$aResult = array();

		// Display modes
		$aResult['display_modes'] = array();
		foreach(EventsFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
			$aResult['display_modes'][$sDisplayMode] = TranslationPeer::getString('display_mode.'.$sDisplayMode, null, $sDisplayMode);
		}

		// Event types
		$aEventTypes = EventTypeQuery::create()->filterByIsExternallyManaged(false)->orderByName()->find();
		$aResult['event_types'] = array();
		if(count($aEventTypes) > 0) {
			foreach($aEventTypes as $oEventType) {
				$aResult['event_types'][$oEventType->getId()] = $oEventType->getName();
			}
		}

		// Display list limit
		$aResult['event_limits'] = array('' => TranslationPeer::getString('wns.events.display_all'));
		foreach(range(1,5) as $iCount) {
			$aResult['event_limits'][$iCount] = $iCount;
			$aResult['event_limits'][10] = 10;
		}
		return $aResult;
	}

	public function allEvents($iEventTypeId = null, $iLimit = null, $bIsArchive = false) {
		$oQuery = FrontendEventQuery::create()->excludeClassEvents();
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
