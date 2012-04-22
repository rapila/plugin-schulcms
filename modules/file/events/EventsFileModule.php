<?php
class EventsFileModule extends FileModule {
	
	private $oBaseNavigationItem = null;
	private $oQuery = null;
	
	public function __construct($aRequestPath = null, $oNavigationItem = null, $oQuery = null) {
		parent::__construct($aRequestPath);
		if($oNavigationItem !== null) {
			$this->oBaseNavigationItem = $oNavigationItem->getParent();
		} else {
			$this->oEventPage = $oPage;
		}
		if($oQuery) {
			$this->oQuery = $oQuery;
		} else {
			$this->oQuery = EventQuery::create()->filterBySchoolClassId(null, Criteria::ISNULL);
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
		self::addSimpleAttribute($oDocument, $oChannel, 'title', $this->oBaseNavigationItem->getTitle());
		self::addSimpleAttribute($oDocument, $oChannel, 'description', $this->oBaseNavigationItem->getDescription());
		self::addSimpleAttribute($oDocument, $oChannel, 'link', LinkUtil::absoluteLink(LinkUtil::link($this->oBaseNavigationItem->getLink(), 'FrontendManager')));
		self::addSimpleAttribute($oDocument, $oChannel, 'language', Session::language());
		self::addSimpleAttribute($oDocument, $oChannel, 'ttl', "15");
		$oRoot->appendChild($oChannel);
		
		// get upcoming events, show only period
		// FIXME periods for school_class and normal event the same
		// FIXME add events with reports and images, update
		
		$iPeriod = 14;
		$sDateAhead = mktime(0, 0, 0, date("m"), date("d")+$iPeriod, date("y"));
		
		// get events related to classes or others
		$oQuery = $this->oQuery->filterByDateRangePreview()->filterByDateStart($sDateAhead, Criteria::LESS_EQUAL)->filterByIsActive(true);
		$aEvents = $oQuery->find();

		foreach($aEvents as $oEvent) {
			$oItem = $oDocument->createElement('item');
			foreach($oEvent->getRssAttributes(false, $this->oBaseNavigationItem) as $sAttributeName => $mAttributeValue) {
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
