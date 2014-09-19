<?php
class ClassesFilterModule extends FilterModule {


	public function onFillPageAttributes($oCurrentPage, $oTemplate) {

	}

	public function onNavigationItemChildrenRequested($oNavigationItem) {

		if($oNavigationItem instanceof PageNavigationItem &&
			($oNavigationItem->getIdentifier() === 'classes' || in_array($oNavigationItem->getIdentifier(), $aSubpagesIdentifier))) {
			$oCriteria = SchoolClassQuery::create()->distinct();
			$oCriteria->clearSelectColumns()->addSelectColumn(SchoolClassPeer::SLUG);
			$oCriteria->filterByHasStudents()->orderByUnitName(Criteria::ASC);

			foreach(SchoolClassPeer::doSelectStmt($oCriteria)->fetchAll(PDO::FETCH_COLUMN) as $sSlug) {
				$oClass = SchoolClassQuery::create()->filterBySlug($sSlug)->findOne();
				$oNavItem = new HiddenVirtualNavigationItem(self::CLASS_ITEM_TYPE, $sSlug, $oClass->getUnitName(), null, null);
				$oNavigationItem->addChild($oNavItem);

				$oFeedItem = new HiddenVirtualNavigationItem(self::EVENT_FEED_ITEM, 'feed', StringPeer::getString('wns.school_class.feed', null, 'Feed'), null, $sSlug);
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

	public function onPageHasBeenSet($oCurrentPage, $bIsNotFound, $oCurrentNavigationItem) {

	}

	public function onPageNotFound() {

	}

}