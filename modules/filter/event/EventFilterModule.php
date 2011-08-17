<?php
class EventFilterModule extends FilterModule {
	
	const EVENT_TYPE_SEPARATOR = '-';
	
	const ITEM_EVENT_YEAR = 'event_year';
	const ITEM_EVENT_MONTH = 'event_month';
	const ITEM_EVENT_DAY = 'event_day';
	const ITEM_EVENT = 'event_normalized_title';

	public function onNavigationItemChildrenRequested(NavigationItem $oNavigationItem) {
		$mIdentifier = $oNavigationItem->getIdentifier();
		if($mIdentifier !== null) {
			$mIdentifier = explode(self::EVENT_TYPE_SEPARATOR, $mIdentifier);
		}
		if($oNavigationItem instanceof PageNavigationItem
		   && isset($mIdentifier[1])
		   && $mIdentifier[0] === SchoolPeer::getPageIdentifier(SchoolPeer::PAGE_IDENTIFIER_EVENTS)) {
			$aData = array('event_type' => $mIdentifier[1]);
			foreach(self::selectNames($aData, 'YEAR(DATE_START)') as $iYear) {
				$oNavigationItem->addChild(new VirtualNavigationItem(self::ITEM_EVENT_YEAR, $iYear, $iYear, null, $aData));
			}
		} else if($oNavigationItem instanceof VirtualNavigationItem
		          && $oNavigationItem->getType() === self::ITEM_EVENT_YEAR) {
			$aData = $oNavigationItem->getData();
			$aData['year'] = $oNavigationItem->getName();
			foreach(self::selectNames($aData, 'MONTH(DATE_START)') as $iMonth) {
				$oNavigationItem->addChild(new VirtualNavigationItem(self::ITEM_EVENT_MONTH, $iMonth, $iMonth, null, $aData));
			}
		} else if($oNavigationItem instanceof VirtualNavigationItem
		          && $oNavigationItem->getType() === self::ITEM_EVENT_MONTH) {
			$aData = $oNavigationItem->getData();
			$aData['month'] = $oNavigationItem->getName();
			foreach(self::selectNames($aData, 'DAY(DATE_START)') as $iDay) {
				$oNavigationItem->addChild(new VirtualNavigationItem(self::ITEM_EVENT_DAY, $iDay, $iDay, null, $aData));
			}
		} else if($oNavigationItem instanceof VirtualNavigationItem
		          && $oNavigationItem->getType() === self::ITEM_EVENT) {
			$aData = $oNavigationItem->getName();
			foreach(self::selectNames($aData, EventPeer::TITLE_NORMALIZED)) {
				
			}
		}
	}

	public function onPageHasBeenSet($oPage, $bIsNotFound, $oNavigationItem) {
	}
	
	private static function selectNames(&$aData, $sColumn) {
		$oQuery = EventQuery::create()->distinct()->filterByEventTypeId($aData['event_type']);
		if(isset($aData['year'])) {
			$oQuery->add('YEAR(DATE_START)', $aData['year']);
		}
		if(isset($aData['month'])) {
			$oQuery->add('MONTH(DATE_START)', $aData['month']);
		}
		if(isset($aData['day'])) {
			$oQuery->add('DAY(DATE_START)', $aData['day']);
		}
		$oQuery->clearSelectColumns()->addSelectColumn($sColumn);
		return EventPeer::doSelectStmt($oQuery)->fetchAll(PDO::FETCH_COLUMN);
	}
}