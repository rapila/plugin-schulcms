<?php
class EventsFileModule extends FileModule {
	
	private $oEventPage = null;
	private $oNavigationItem = null;
	private $aClassesIds = null;
	
	public function __construct($oPage, $aClassIds = null, $oNavigationItem = null) {
		if($oNavigationItem !== null) {
			$this->oNavigationItem = $oNavigationItem;
		} else {
			$this->oEventPage = $oPage;
		}
		if($aClassIds !== null) {
			$this->aClassesIds = $aClassIds;
		}		
		header("Content-Type: application/rss+xml;charset=".Settings::getSetting('encoding', 'db', 'utf-8'));
		RichtextUtil::$USE_ABSOLUTE_LINKS = true;
	}
	
	public function renderFile() {
		$oDocument = new DOMDocument();
		$oRoot = $oDocument->createElement("rss");
		$oRoot->setAttribute('version', "2.0");
		$oDocument->appendChild($oRoot);
		$oChannel = $oDocument->createElement("channel");
		if($this->oEventPage) {
			self::addSimpleAttribute($oDocument, $oChannel, 'title', $this->oEventPage->getPageTitle());
			self::addSimpleAttribute($oDocument, $oChannel, 'description', $this->oEventPage->getDescription());
			$aLink = $this->oEventPage->getLink();
		} else {
			self::addSimpleAttribute($oDocument, $oChannel, 'title', 'Anlässe Klasse '. $this->oNavigationItem->getData());
			self::addSimpleAttribute($oDocument, $oChannel, 'description', 'Anlässe Klasse '. $this->oNavigationItem->getData());
			$aLink = $this->oNavigationItem->getLink();
		}
		self::addSimpleAttribute($oDocument, $oChannel, 'link', LinkUtil::absoluteLink(LinkUtil::link($aLink, 'FrontendManager')));
		self::addSimpleAttribute($oDocument, $oChannel, 'language', Session::language());
		self::addSimpleAttribute($oDocument, $oChannel, 'ttl', "15");
		$oRoot->appendChild($oChannel);
		
		// get upcoming events
		// update past events with recent bericht and/or images
		$iPeriod = 14;
		$sDateAhead = mktime(0, 0, 0, date("m"), date("d")+$iPeriod, date("y"));
		$oQuery = EventQuery::create()->filterByDateRangePreview()->filterByDateStart($sDateAhead, Criteria::LESS_EQUAL);
		
		// get events related to classes or others
		if($this->aClassesIds !== null) {
			$oQuery->filterBySchoolClassId($this->aClassesIds);
		} else {
			$oQuery->filterBySchoolClassId(null, Criteria::ISNULL);
		}
		$aEvents = $oQuery->filterByIsActive(true)->find();

		foreach($aEvents as $oEvent) {
			$oItem = $oDocument->createElement('item');
			foreach(self::getRssAttributes($oEvent) as $sAttributeName => $mAttributeValue) {
				if(is_array($mAttributeValue)) {
					if(ArrayUtil::arrayIsAssociative($mAttributeValue)) {
						//Add one elements with attributes
						$oAttribute = $oDocument->createElement($sAttributeName);
						foreach($mAttributeValue as $sSubAttributeName => $sSubAttributeValue) {
							$oAttribute->setAttribute($sSubAttributeName, $sSubAttributeValue);
						}
						$oChannel->appendChild($oAttribute);
					} else {
						//Add multiple elements with the same name
						foreach($mAttributeValue as $sSubAttributeValue) {
							self::addSimpleAttribute($oDocument, $oItem, $sAttributeName, $sSubAttributeValue);
						}
					}
				} else {
					self::addSimpleAttribute($oDocument, $oItem, $sAttributeName, $mAttributeValue);
				}
			}
			$oChannel->appendChild($oItem);
		}
		print $oDocument->saveXML();
	}
	
	public static function getRssAttributes($oEvent, $bForReview = false) {
		$aResult = array();
		$aResult['title'] = $oEvent->getTitle();
		$aLink = array();
		if($this->oNavigationItem) {
			$aLink = array_merge($this->oNavigationItem->getLink(), array(ClassesFrontendModule::DETAIL_IDENTIFIER_EVENT, $oEvent->getId()));
		} else {
			$aLink = $oEvent->getEventPageLink($this->oEventPage);
		}
		$aResult['link'] = LinkUtil::absoluteLink(LinkUtil::link($aLink), 'FrontendManager');
		if($bForReview) {
			// if there is a bericht, display bericht hier
			// show images also <image>
		} else {
			$aResult['description'] = RichtextUtil::parseStorageForFrontendOutput($this->getText())->render();
		}
		$aResult['author'] = $this->getUserRelatedByCreatedBy()->getEmail().' ('.$this->getUserRelatedByCreatedBy()->getFullName().')';
		$aResult['guid'] = $aResult['link'];
		$aResult['pubDate'] = date(DATE_RSS, (int)$this->getUpdatedAtTimestamp());
		$aResult['category'] = $oEvent->getEventType()->getName();
		return $aResult;
	}

	private static function addSimpleAttribute($oDocument, $oChannel, $sAttributeName, $sAttributeValue, $sNamespace = null) {
		if($sNamespace === 'http://www.itunes.com/dtds/podcast-1.0.dtd') {
			$sAttributeName = "itunes:$sAttributeName";
		}
		$oAttribute = $oDocument->createElement($sAttributeName);
		$oAttribute->appendChild($oDocument->createTextNode($sAttributeValue));
		$oChannel->appendChild($oAttribute);
		return $oAttribute;
	}
}
