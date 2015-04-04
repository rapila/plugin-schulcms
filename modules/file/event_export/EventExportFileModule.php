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
			throw new UserError("schulcms.event_export.no_year_given");
		}
		$iPageId = Manager::usePath();
		if(!$iPageId) {
			throw new UserError("schulcms.event_export.no_page_given");
		}
		$oPage = PageQuery::create()->findPk($iPageId);
		$oEventQuery = FrontendEventQuery::create();
		$oDateQuery = null;
		if(class_exists('SchoolDate')) {
			$oDateQuery = SchoolDateQuery::create();
		}
		$iTimestamp = $oEventQuery->findMostRecentUpdate();
		if($oDateQuery !== null) {
			$iTimestamp = max($iTimestamp, $oDateQuery);
		}
		$iTimestamp = $oEventQuery->findMostRecentUpdate();
		LinkUtil::sendCacheControlHeaders($iTimestamp);
		$aResult = array();
		if($oDateQuery !== null) {
			foreach($oDateQuery->fromYear($iYear)->find() as $oDate) {
				$aResult["date-{$oDate->getId()}"] = array(
					'id' => $oDate->getId(),
					'name' => $oDate->getName(),
					'date_start' => $oDate->getDateStart('Y-m-d'),
					'date_end' => $oDate->getDateEnd('Y-m-d'),
					'type' => $oDate->getType(),
					'kind' => 'date'
				);
			}
		}
		foreach($oEventQuery->fromYear($iYear)->find() as $oEvent) {
			$aResult["event-{$oEvent->getId()}"] = array(
				'id' => $oEvent->getId(),
				'name' => $oEvent->getTitle(),
				'description' => EventsFrontendModule::getContentForFrontend($oEvent->getBody(), true),
				'slug' => $oEvent->getSlug(),
				'link' => LinkUtil::link($oEvent->getLink($oPage), 'FrontendManager'),
				'date_start' => $oEvent->getDateStart('Y-m-d'),
				'date_end' => $oEvent->getDateEnd('Y-m-d'),
				'type' => $oEvent->getEventTypeId(),
				'has_bericht' => $oEvent->hasBericht(),
				'has_images' => $oEvent->hasImages(),
				'type' => $oEvent->getEventTypeId(),
				'kind' => 'event'
			);
		}
		return $aResult;
	}
}