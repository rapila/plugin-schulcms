<?php
class SchoolClassFilterModule extends FilterModule {
	
	const CLASS_ITEM_TYPE = 'class';
	const CLASS_ARCHIVE_ITEM_TYPE = 'class_with_year';
	const CLASSES_REQUEST_KEY = 'classes';
	
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
			}
		} else if($oNavigationItem instanceof VirtualNavigationItem && $oNavigationItem->getType() === self::CLASS_ITEM_TYPE) {
			$sSlug = $oNavigationItem->getName();
			$oClass = SchoolClassQuery::create()->filterBySlug($sSlug)->findOne();
			
			$oCriteria = SchoolClassQuery::create()->distinct();
			$oCriteria->clearSelectColumns()->addSelectColumn(SchoolClassPeer::YEAR);
			$oCriteria->filterByIsCurrent(false)->filterByHasStudents()->orderByYear(Criteria::ASC);
			
			foreach(SchoolClassPeer::doSelectStmt($oCriteria)->fetchAll(PDO::FETCH_COLUMN) as $iYear) {
				$oNavItem = new HiddenVirtualNavigationItem(self::CLASS_ARCHIVE_ITEM_TYPE, $iYear, "{$oClass->getUnitName()} ($iYear)", null, array($sSlug, $iYear));
				$oNavigationItem->addChild($oNavItem);
			}
		}
	}
	
	public function onPageHasBeenSet($oPage, $bIsNotFound, $oNavigationItem) {
		$oQuery = null;
		if($oNavigationItem instanceof VirtualNavigationItem && $oNavigationItem->getType() === self::CLASS_ITEM_TYPE) {
			$sSlug = $oNavigationItem->getName();
			$oQuery = SchoolClassQuery::create()->filterByIsCurrent(true)->filterByHasStudents()->filterBySlug($sSlug);
		} else if($oNavigationItem instanceof VirtualNavigationItem && $oNavigationItem->getType() === self::CLASS_ARCHIVE_ITEM_TYPE) {
			list($sSlug, $iYear) = $oNavigationItem->getData();
			$oQuery = SchoolClassQuery::create()->filterByHasStudents()->filterBySlug($sSlug)->filterByYear($iYear);
		}
		if($oQuery !== null) {
			$oQuery->clearSelectColumns()->addSelectColumn(SchoolClassPeer::ID);
			$_REQUEST[self::CLASSES_REQUEST_KEY] = SchoolClassPeer::doSelectStmt($oQuery)->fetchAll(PDO::FETCH_COLUMN);
		}
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
}