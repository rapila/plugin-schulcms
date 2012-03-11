<?php
class SchoolClassFilterModule extends FilterModule {
	
	const CLASS_ITEM_TYPE = 'class';
	const CLASS_ARCHIVE_ITEM_TYPE = 'class_with_year';
	const CLASSES_REQUEST_KEY = 'classes';
	const EVENT_FEED_ITEM = 'event-feed';
	
	public function onNavigationItemChildrenRequested($oNavigationItem) {
		$aSubpagesIdentifier = Settings::getSetting('school_settings', 'subpages_classes_identifiers', array());
		
		if($oNavigationItem instanceof PageNavigationItem && 
			($oNavigationItem->getIdentifier() === 'classes' || in_array($oNavigationItem->getIdentifier(), $aSubpagesIdentifier))) {
			$oCriteria = SchoolClassQuery::create()->distinct();
			$oCriteria->clearSelectColumns()->addSelectColumn(SchoolClassPeer::SLUG);
			$oCriteria->filterByHasStudents()->orderByUnitName(Criteria::ASC);
			
			foreach(SchoolClassPeer::doSelectStmt($oCriteria)->fetchAll(PDO::FETCH_COLUMN) as $sSlug) {
				$oClass = SchoolClassQuery::create()->filterBySlug($sSlug)->findOne();
				$oNavItem = new HiddenVirtualNavigationItem(self::CLASS_ITEM_TYPE, $sSlug, $oClass->getUnitName(), null, null);
				$oNavigationItem->addChild($oNavItem);
				
				$oFeedItem = new HiddenVirtualNavigationItem(self::EVENT_FEED_ITEM, 'feed', StringPeer::getString('wns.school_class.feed', null, 'feed'), null, $sSlug);
				$oFeedItem->bIsIndexed = false; //Don’t index the feed item or else you’ll be exit()-ed before finishing the index
				$oNavItem->addChild($oFeedItem);
			}
		} 
		else if($oNavigationItem instanceof VirtualNavigationItem && $oNavigationItem->getType() === self::CLASS_ITEM_TYPE) {
			$sSlug = $oNavigationItem->getName();
			$oClass = SchoolClassQuery::create()->filterBySlug($sSlug)->findOne();
			
			$oCriteria = SchoolClassQuery::create()->distinct();
			$oCriteria->clearSelectColumns()->addSelectColumn(SchoolClassPeer::YEAR);
			$oCriteria->filterByIsCurrent(false)->filterBySlug($sSlug)->filterByHasStudents()->orderByYear(Criteria::ASC);
			
			foreach(SchoolClassPeer::doSelectStmt($oCriteria)->fetchAll(PDO::FETCH_COLUMN) as $iYear) {
				$oNavItem = new HiddenVirtualNavigationItem(self::CLASS_ARCHIVE_ITEM_TYPE, $iYear, "{$oClass->getUnitName()} ($iYear)", null, array($sSlug, $iYear));
				$oNavigationItem->addChild($oNavItem);
			}
		}
	}
	
	public function onPageHasBeenSet($oPage, $bIsNotFound, $oNavigationItem) {
		$oQuery = null;
		if($oNavigationItem instanceof VirtualNavigationItem && ($oNavigationItem->getType() === self::CLASS_ITEM_TYPE || $oNavigationItem->getType() === self::EVENT_FEED_ITEM)) {
			$sSlug = $oNavigationItem->getType() === self::CLASS_ITEM_TYPE ? $oNavigationItem->getName() : $oNavigationItem->getData();
			$oQuery = SchoolClassQuery::create()->filterByIsCurrent(true)->filterByHasStudents()->filterBySlug($sSlug);
		} 
		else if($oNavigationItem instanceof VirtualNavigationItem && $oNavigationItem->getType() === self::CLASS_ARCHIVE_ITEM_TYPE) {
			list($sSlug, $iYear) = $oNavigationItem->getData();
			$oQuery = SchoolClassQuery::create()->filterByYear($iYear)->filterByHasStudents()->filterBySlug($sSlug);
		}
		if($oQuery !== null) {
			$oQuery->clearSelectColumns()->addSelectColumn(SchoolClassPeer::ID);
			$_REQUEST[self::CLASSES_REQUEST_KEY] = SchoolClassPeer::doSelectStmt($oQuery)->fetchAll(PDO::FETCH_COLUMN);
  		$this->handleNewsFeed($oPage, $_REQUEST[self::CLASSES_REQUEST_KEY], $oNavigationItem);
		}
	}
	
	public function handleNewsFeed($oPage, $aClassIds, $oNavigationItem) {	
		if($oNavigationItem->getType() === self::EVENT_FEED_ITEM) {
	    $oFeed = new EventsFileModule(null, $oNavigationItem, EventQuery::create()->filterBySchoolClassId($aClassIds));
	    $oFeed->renderFile();exit;
			$aLink = $oNavigationItem->getLink();
		} else {
			$aLink = array_merge($oNavigationItem->getLink(), array('feed'));
		}
		//Add the feed include
    ResourceIncluder::defaultIncluder()->addCustomResource(array('template' => 'feed', 'location' => LinkUtil::link($aLink)));
	}
	
	public function onPageNotFoundDetectionComplete($bIsNotFound, $oPage, $oNavigationItem, $aNotFound) {
		if($bIsNotFound) {
			return;
		}
		if($oNavigationItem instanceof VirtualNavigationItem && $oNavigationItem->getType() === self::CLASS_ITEM_TYPE) {
			if(count($_REQUEST[self::CLASSES_REQUEST_KEY]) === 0) {
				$bIsNotFoundMutable = &$aNotFound[0];
				//No current class exists (history only)
				$bIsNotFoundMutable = true;
			}
		}
	}
	
	public function onOperationIsDenied($sOperation, $oOnObject, $oUser, $aContainer) {
		$bIsAllowed = &$aContainer[0];
		if(!($oOnObject instanceof Link)) {
			return;
		}
		if($oOnObject->getLinkCategoryId() !== SchoolPeer::getLinkCategoryConfig('school_class_links')) {
			return;
		}
		
		if($sOperation === 'insert') {
			$bIsAllowed = true;
			return;
		}
		$oClassLink = $oOnObject->getClassLinks();
		if(!count($oClassLink)) {
			return;
		}
		$bIsAllowed = $oClassLink[0]->mayOperate($sOperation, $oUser);
	}
}