<?php
class EventExportFileModule extends FileModule {
	public function __construct($aRequestPath) {
		parent::__construct($aRequestPath);
	}

	public function renderFile() {
		try {
			header('Content-Type: application/json;charset=utf-8');
			$aResult = $this->getEvents();
			print json_encode($aResult);
		} catch (Exception $ex) {
			LinkUtil::sendHTTPStatusCode(404, 'Not Found');
			ErrorHandler::handleException($ex);
		}
	}

	private function getEvents() {
		$iYear = Manager::usePath();
		if(!$iYear) {
			throw new UserError("wettingen.event_export.no_year_given");
		}
		$iPageId = Manager::usePath();
		if(!$iPageId) {
			throw new UserError("wettingen.event_export.no_page_given");
		}
		$oDateQuery = SchoolDateQuery::create();
		$oEventQuery = EventQuery::create();
		$iTimestamp = max($oDateQuery->findMostRecentUpdate(), $oEventQuery->findMostRecentUpdate());
		LinkUtil::sendCacheControlHeaders($iTimestamp);
		$aResult = array();
		foreach($oDateQuery->fromYear($iYear)->find() as $oDate) {
			$aResult["date-{$oDate->getId()}"] = array(
				'id' => $oDate->getId(),
				'name' => $oDate->getName(),
				'date_start' => $oDate->getDateStart('Y-m-d'),
				'date_end' => $oDate->getDateEnd('Y-m-d'),
				'type' => $oDate->getType()
			);
		}
		foreach($oEventQuery->fromYear($iYear)->find() as $oEvent) {
			$aResult["event-{$oEvent->getId()}"] = array(
				'id' => $oEvent->getId(),
				'name' => $oEvent->getTitle(),
				'slug' => $oEvent->getSlug(),
				'link' => LinkUtil::link($oEvent->getEventPageLink()),
				'date_start' => $oEvent->getDateStart('Y-m-d'),
				'date_end' => $oEvent->getDateEnd('Y-m-d'),
				'type' => $oEvent->getEventTypeId()
			);
		}
		return $aResult;
	}
}