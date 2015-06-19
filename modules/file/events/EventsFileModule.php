<?php
class EventsFileModule extends FileModule {

	private $oQuery = null;
	private $oClass = null;

	public function __construct($aRequestPath = null, $oQuery = null) {
		parent::__construct($aRequestPath);
		$oClass = null;
		if($oQuery instanceof ClassNavigationItem) {
			$oClass = $oQuery->getClass();
			$oQuery = null;
		}
		if(isset($_REQUEST['class'])) {
			$oClass = SchoolClassQuery::create()->findPk($_REQUEST['class']);
		}
		if(!$oQuery) {
			$oQuery = FrontendEventQuery::create();
		}
		$this->oQuery = $oQuery;
		if($oClass) {
			$this->oClass = $oClass;
			$this->oQuery->displayedInClass($oClass, isset($_REQUEST['local']));
		} else if(!isset($_REQUEST['global'])) {
			$this->oQuery->excludeClassEvents(isset($_REQUEST['local']));
		}
		$this->oQuery->filterbyHasImagesOrReview()->orderByDateStart(Criteria::DESC);
		
		header("Content-Type: application/rss+xml;charset=".Settings::getSetting('encoding', 'db', 'utf-8'));
		header("Cache-Control: Private", true);
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
		// Make sure links contain the correct protocol
		RichtextUtil::$USE_ABSOLUTE_LINKS = LinkUtil::isSSL();

		$oDocument = new DOMDocument();
		$oRoot = $oDocument->createElement("rss");
		$oRoot->setAttribute('version', "2.0");
		$oDocument->appendChild($oRoot);
		$oChannel = $oDocument->createElement("channel");
		if($this->oClass) {
			$sTitle = $this->oClass->getFullClassNameWithYear(true);
		} else {
			$sTitle = SchoolSiteQuery::currentSchoolSite()->getName();
		}
		self::addSimpleAttribute($oDocument, $oChannel, 'title', $sTitle);
		self::addSimpleAttribute($oDocument, $oChannel, 'description', PageQuery::create()->filterByPageType('events')->findOne()->getDescription());
		self::addSimpleAttribute($oDocument, $oChannel, 'link', LinkUtil::absoluteLink(LinkUtil::link(PageQuery::create()->filterByPageType('events')->findOne()->getLink(), 'FrontendManager'), null, 'auto'));
		self::addSimpleAttribute($oDocument, $oChannel, 'language', Session::language());
		self::addSimpleAttribute($oDocument, $oChannel, 'ttl', "15");
		$oRoot->appendChild($oChannel);

		$aEvents = $this->oQuery->find();

		foreach($aEvents as $oEvent) {
			$oItem = $oDocument->createElement('item');
			foreach($oEvent->getRssAttributes(true) as $sAttributeName => $mAttributeValue) {
				if(is_array($mAttributeValue)) {
					if(ArrayUtil::arrayIsAssociative($mAttributeValue)) {
						//Add one elements with attributes
						$oAttribute = $oDocument->createElement($sAttributeName);
						foreach($mAttributeValue as $sSubAttributeName => $sSubAttributeValue) {
							if($sSubAttributeName === '__content') {
								$oAttribute->appendChild($oDocument->createTextNode($sSubAttributeValue));
							} else {
								$oAttribute->setAttribute($sSubAttributeName, $sSubAttributeValue);
							}
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
