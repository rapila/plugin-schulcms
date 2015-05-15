<?php
class EventsFileModule extends FileModule {

	private $oQuery = null;

	public function __construct($aRequestPath = null, $oQuery = null) {
		parent::__construct($aRequestPath);
		if($oQuery instanceof ClassNavigationItem) {
			$this->oQuery = FrontendEventQuery::create()->filterBySchoolClassId($oQuery->getClass()->getId());
		} elseif($oQuery) {
			$this->oQuery = $oQuery;
		} else {
			$this->oQuery = FrontendEventQuery::create()->excludeClassEvents();
		}
		$this->oQuery->upcomingOrOngoing()->filterByIsActive(true);
		// header("Content-Type: application/rss+xml;charset=".Settings::getSetting('encoding', 'db', 'utf-8'));
		header("Cache-Control: Private", true);
		RichtextUtil::$USE_ABSOLUTE_LINKS = true;
	}

	public function renderFile() {
		$sKey = 'event-feed/'.md5(serialize($this->oQuery)).'/'.Session::language();
		$oCache = new Cache($sKey, 'events');
		if($oCache->entryExists() && !$oCache->isOlderThan($this->oQuery)) {
			LinkUtil::sendCacheControlHeaders($this->oQuery);
			$oCache->passContents(true);
			return;
		}
		$sResult = $this->getFeed();
		$oCache->setContents($sResult);
		LinkUtil::sendCacheControlHeaders($this->oQuery);
		print $sResult;
	}

	private function getFeed() {
		$oDocument = new DOMDocument();
		$oRoot = $oDocument->createElement("rss");
		$oRoot->setAttribute('version', "2.0");
		$oDocument->appendChild($oRoot);
		$oChannel = $oDocument->createElement("channel");
		self::addSimpleAttribute($oDocument, $oChannel, 'title', PageQuery::create()->filterByPageType('events')->findOne()->getPageTitle());
		self::addSimpleAttribute($oDocument, $oChannel, 'description', PageQuery::create()->filterByPageType('events')->findOne()->getDescription());
		self::addSimpleAttribute($oDocument, $oChannel, 'link', LinkUtil::absoluteLink(LinkUtil::link(PageQuery::create()->filterByPageType('events')->findOne()->getLink(), 'FrontendManager')));
		self::addSimpleAttribute($oDocument, $oChannel, 'language', Session::language());
		self::addSimpleAttribute($oDocument, $oChannel, 'ttl', "15");
		$oRoot->appendChild($oChannel);

		$aEvents = $this->oQuery->find();

		foreach($aEvents as $oEvent) {
			$oItem = $oDocument->createElement('item');
			foreach($oEvent->getRssAttributes(false) as $sAttributeName => $mAttributeValue) {
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
		return $oDocument->saveXML();
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
