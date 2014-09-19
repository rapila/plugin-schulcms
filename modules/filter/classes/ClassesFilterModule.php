<?php
class ClassesFilterModule extends FilterModule {
	public function onNavigationItemChildrenRequested($oNavigationItem) {
		if($oNavigationItem instanceof PageNavigationItem && $oNavigationItem->getMe()->getPageType() === 'classes') {

			$oCriteria = SchoolClassQuery::create()->distinct();
			$oCriteria->clearSelectColumns()->addSelectColumn(SchoolClassPeer::SLUG);
			$oCriteria->filterByHasStudents()->orderByUnitName(Criteria::ASC);

			foreach(SchoolClassPeer::doSelectStmt($oCriteria)->fetchAll(PDO::FETCH_COLUMN) as $sSlug) {
				$oClass = SchoolClassQuery::create()->filterBySlug($sSlug)->findOne();
				$oNavItem = new ClassNavigationItem($sSlug, 'Klasse '.$oClass->getUnitName().' Home', null, 'root', $oClass->getUnitName(), true);
				$oNavigationItem->addChild($oNavItem);
			}
		}
		if(!($oNavigationItem instanceof ClassNavigationItem)) {
			return;
		}
		if($oNavigationItem->getMode() === 'root') {
			$sSlug = $oNavigationItem->getName();
			$oCriteria = SchoolClassQuery::create()->filterBySlug($sSlug)->filterByHasStudents()->orderByYear(Criteria::DESC);
			foreach($oCriteria->find() as $oClass) {
				$oNavigationItem->addChild(new ClassNavigationItem($oClass->getYear(), 'Home', $oClass, 'home'));
			}
		} else if($oNavigationItem->getMode() === 'home') {
			$oClass = $oNavigationItem->getClass();
			$oNavigationItem->addChild(ClassNavigationItem::create('anlaesse', 'Anlässe', $oClass, 'events'));
			$oNavigationItem->addChild(ClassNavigationItem::create('faecher', 'Fächer', $oClass, 'subjects'));
			$oNavigationItem->addChild(ClassNavigationItem::create('dokumente', 'Dokumente', $oClass, 'documents'));
			$oNavigationItem->addChild(ClassNavigationItem::create('links', 'Links', $oClass, 'links'));
			$oNavigationItem->addChild(ClassNavigationItem::create('feed', 'RSS-Feed', $oClass, 'feed')->setIndexed(false));
		} else if($oNavigationItem->getMode() === 'events') {
			$oClass = $oNavigationItem->getClass();
			foreach(FrontendEventQuery::create()->filterBySchoolClass($oClass)->find() as $oEvent) {
				$oNavigationItem->addChild(ClassNavigationItem::create($oEvent->getSlug(), $oEvent->getTitle(), $oClass, 'event')->setEvent($oEvent));
			}
		}
	}

	public function onPageHasBeenSet($oCurrentPage, $bIsNotFound, $oNavigationItem) {
		if($bIsNotFound || !($oNavigationItem instanceof ClassNavigationItem) || $oNavigationItem->getMode() === 'root') {
			return;
		}
		$oClass = $oNavigationItem->getClass();
		// Add the feed
		if($oNavigationItem->getMode() === 'feed') {
			$oQuery = FrontendEventQuery::create()->filterBySchoolClass($oClass);
			$oFeed = new EventsFileModule(null, $oNavigationItem, $oQuery);
			$oFeed->renderFile();exit;
		}
		// Link to the feed
		$oHomeNavigationItem = $oNavigationItem;
		while($oNavigationItem->getMode() !== 'home') {
			$oHomeNavigationItem = $oHomeNavigationItem->getParent();
		}
		$oFeedItem = $oHomeNavigationItem->namedChild('feed');

		ResourceIncluder::defaultIncluder()->addCustomResource(array('template' => 'feed', 'location' => LinkUtil::link($oFeedItem->getLink())));
	}

	public function onLinkOperationCheck($sOperation, $oOnObject, $oUser, $aContainer) {
		$bIsAllowed = &$aContainer[0];
		if($bIsAllowed) {
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