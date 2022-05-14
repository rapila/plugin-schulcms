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

	private function createOccurrence(DateTimeInterface $oDateStart, DateTimeInterface $oDateEnd) : \Eluceo\iCal\Domain\ValueObject\Occurrence {
		if(!$oDateEnd || $oDateEnd->getTimestamp() === $oDateStart->getTimestamp()) {
			return new \Eluceo\iCal\Domain\ValueObject\SingleDay(
				new \Eluceo\iCal\Domain\ValueObject\Date($oDateStart)
			);
		}
		return new \Eluceo\iCal\Domain\ValueObject\MultiDay(
			new \Eluceo\iCal\Domain\ValueObject\Date($oDateStart),
			new \Eluceo\iCal\Domain\ValueObject\Date($oDateEnd)
		);
	}

	private function getFeed() : string {
		$sDomain = Settings::getSetting('domain_holder', 'domain', 'example.com');

		$aCalendarEvents = [];

		foreach($this->oQuery->find() as $oEvent) {
			$oCalendarEvent = new \Eluceo\iCal\Domain\Entity\Event(
				new \Eluceo\iCal\Domain\ValueObject\UniqueIdentifier("$sDomain-event-{$oEvent->getId()}")
			);
			$oCalendarEvent
				->setSummary($oEvent->getFullTitle())
				->setDescription($oEvent->getBodyShortTruncated(500))
			  ->setOccurrence($this->createOccurrence($oEvent->getDateStart(null), $oEvent->getDateEnd(null)))
			  ->setUrl(
					new \Eluceo\iCal\Domain\ValueObject\Uri(
						LinkUtil::absoluteLink(LinkUtil::link($oEvent->getLink(), 'FrontendManager'), null, 'auto')
					)
				);
			$aCalendarEvents[] = $oCalendarEvent;
		}

		if($this->oDateQuery) {
			foreach($this->oDateQuery->find() as $oDate) {
				$oCalendarEvent = new \Eluceo\iCal\Domain\Entity\Event(
					new \Eluceo\iCal\Domain\ValueObject\UniqueIdentifier("$sDomain-date-{$oDate->getId()}")
				);
				$oCalendarEvent
					->setSummary($oDate->getName())
					->setOccurrence($this->createOccurrence($oDate->getDateStart(null), $oDate->getDateEnd(null)));
				$aCalendarEvents[] = $oCalendarEvent;
			}
		}


		$oCalendar = new \Eluceo\iCal\Domain\Entity\Calendar($aCalendarEvents);

		$sName = Settings::getSetting('domain_holder', 'name', 'Events').' – '.Event::getEventPage()->getPageTitle();
		if($this->oClass) {
			$sName = $this->oClass->getFullClassNameWithYear(true);
		} else if(class_exists('SchoolSiteQuery')) {
			$sName = SchoolSiteQuery::currentSchoolSite()->getName();
		}

		$aComponentFactory = new Eluceo\iCal\Presentation\Factory\CalendarFactory();

		return $aComponentFactory
			->createCalendar($oCalendar)
			->withProperty(new \Eluceo\iCal\Presentation\Component\Property(
					'X-WR-CALNAME',
					new \Eluceo\iCal\Presentation\Component\Property\Value\TextValue($sName)
				))
			->__toString();
	}
}
