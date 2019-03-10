<?php

require_once MAIN_DIR.'/'.DIRNAME_PLUGINS.'/schulcms/lib/vendor/autoload.php';

class EventCalendarFileModule extends FileModule {
	private $oQuery = null;
	private $oDateQuery = null;
	private $oClass = null;

	public function __construct($aRequestPath = null, $oClass = null) {
		parent::__construct($aRequestPath);
		$this->oQuery = FrontendEventQuery::create();
		if(isset($_REQUEST['class'])) {
			$oClass = SchoolClassQuery::create()->findPk($_REQUEST['class']);
		}
		if($oClass) {
			$this->oClass = $oClass;
			$this->oQuery->displayedInClass($oClass, isset($_REQUEST['local']));
		} else if(!isset($_REQUEST['global'])) {
			$this->oQuery->excludeClassEvents(isset($_REQUEST['local']));
		}
		$oAYearAgo = new DateTime();
		$oAYearAgo->sub(new DateInterval('P1Y'));
		$this->oQuery->filterByDateEnd($oAYearAgo, Criteria::GREATER_THAN);
		if(class_exists('SchoolDate') && !isset($_REQUEST['local'])) {
			$this->oDateQuery = SchoolDateQuery::create();
			$this->oDateQuery->filterByDateEnd($oAYearAgo, Criteria::GREATER_THAN);
		}
		header("Content-Type: application/calendar; charset=".Settings::getSetting('encoding', 'db', 'utf-8'));
	}

	public function renderFile() {
		$sKey = 'event-calendar/'.md5(serialize($this->oQuery)).'/'.Session::language();
		$oCache = new Cache($sKey, 'events');
		$iTimestamp = $this->oQuery->findMostRecentUpdate(true);
		if($this->oDateQuery) {
			$iTimestamp = max($iTimestamp, $this->oDateQuery->findMostRecentUpdate(true));
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
		$oCalendar = new \Eluceo\iCal\Component\Calendar(LinkUtil::getHostName());
		if($this->oClass) {
			$oCalendar->setName($this->oClass->getFullClassNameWithYear(true));
		} else if(class_exists('SchoolSiteQuery')) {
			$oCalendar->setName(SchoolSiteQuery::currentSchoolSite()->getName());
		} else {
			$oCalendar->setName(Settings::getSetting('domain_holder', 'name', 'Events').' – '.Event::getEventPage()->getPageTitle());
		}
		foreach($this->oQuery->find() as $oEvent) {
			$oCalendarEvent = new \Eluceo\iCal\Component\Event();
			$oCalendarEvent
			  ->setDtStart($oEvent->getDateStart(null))
			  ->setDtEnd($oEvent->getDateEnd(null))
			  ->setNoTime(true)
			  ->setUniqueId('event-'.$oEvent->getId())
			  ->setUrl(LinkUtil::absoluteLink(LinkUtil::link($oEvent->getLink(), 'FrontendManager'), null, 'auto'));
			$sTitle = $oEvent->getFullTitle();
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