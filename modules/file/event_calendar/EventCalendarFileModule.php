<?php

require_once MAIN_DIR.'/'.DIRNAME_PLUGINS.'/schulcms/lib/vendor/autoload.php';

class EventCalendarFileModule extends FileModule {
	private $oQuery = null;
	private $oDateQuery = null;
	private $iClassId = null;

	public function __construct($aRequestPath = null, $iClassId = null) {
		parent::__construct($aRequestPath);
		$this->iClassId = $iClassId;
		$this->oQuery = FrontendEventQuery::create()->filterByIsActive(true)->excludeClassEvents();
		if($iClassId !== null) {
			$this->oQuery->_or()->filterByClassId($iClassId);
		}
		$oAYearAgo = new DateTime();
		$oAYearAgo->sub(new DateInterval('P1Y'));
		$this->oQuery->filterByDateEnd($oAYearAgo, Criteria::GREATER_THAN);
		if(class_exists('SchoolDate')) {
			$this->oDateQuery = SchoolDateQuery::create();
		}
		header("Content-Type: application/calendar; charset=".Settings::getSetting('encoding', 'db', 'utf-8'));
	}

	public function renderFile() {
		$sKey = 'event-calendar/'.md5(serialize($this->oQuery)).'/'.Session::language();
		$oCache = new Cache($sKey, 'events');
		$iTimestamp = $this->oQuery->findMostRecentUpdate();
		if($this->oDateQuery) {
			$iTimestamp = max($iTimestamp, $this->oDateQuery->findMostRecentUpdate());
		}
		if($oCache->entryExists() && !$oCache->isOlderThan($iTimestamp)) {
			$oCache->sendCacheControlHeaders($iTimestamp);
			$oCache->passContents(true);
			return;
		}
		$sResult = $this->getFeed();
		$oCache->setContents($sResult);
		$oCache->sendCacheControlHeaders($iTimestamp);
		print $sResult;
	}

	private function getFeed() {
		$oCalendar = new \Eluceo\iCal\Component\Calendar(Settings::getSetting('domain_holder', 'domain', 'example.com'));
		foreach($this->oQuery->find() as $oEvent) {
			$oCalendarEvent = new \Eluceo\iCal\Component\Event();
			$oCalendarEvent
			  ->setDtStart($oEvent->getDateStart(null))
			  ->setDtEnd($oEvent->getDateEnd(null))
			  ->setNoTime(true)
			  ->setUniqueId('event-'.$oEvent->getId())
			  ->setUrl(LinkUtil::absoluteLink(LinkUtil::link($oEvent->getLink(), 'FrontendManager'), null, 'auto'));
			$sTitle = $oEvent->getTitle();
			if($oEvent->getIsClassEvent()) {
				$sTitle = $oEvent->getSchoolClass()->getClassName().': '.$sTitle;
			}
			$oCalendarEvent->setSummary($sTitle);
			$oCalendar->addComponent($oCalendarEvent);
		}
		if($this->oDateQuery) {
			foreach($this->oDateQuery->find() as $oDate) {
				$oCalendarEvent = new \Eluceo\iCal\Component\Event();
				$oCalendarEvent
				  ->setDtStart($oDate->getDateStart(null))
				  ->setDtEnd($oDate->getDateEnd(null))
				  ->setUniqueId('date-'.$oDate->getId())
				  ->setNoTime(true)
				  ->setSummary($oDate->getName());
				$oCalendar->addComponent($oCalendarEvent);
			}
		}
		return $oCalendar->render();
	}
	
}