<?php
class EventFilterModule extends FilterModule {
	
	const EVENT_TYPE_SEPARATOR = '-';
	
	const ITEM_EVENT_YEAR = 'event_year';
	const ITEM_EVENT_MONTH = 'event_month';
	const ITEM_EVENT_DAY = 'event_day';
	const ITEM_EVENT = 'event_normalized_title';
	
	const EVENT_REQUEST_KEY = 'event_detail';

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
				$oNavigationItem->addChild(new VirtualNavigationItem(self::ITEM_EVENT_YEAR, $iYear, $iYear, null, array_merge($aData, array('year' => $iYear))));
			}
		} else if($oNavigationItem instanceof VirtualNavigationItem
		          && $oNavigationItem->getType() === self::ITEM_EVENT_YEAR) {
			$aData = $oNavigationItem->getData();
			foreach(self::selectNames($aData, 'MONTH(DATE_START)') as $iMonth) {
				$oNavigationItem->addChild(new VirtualNavigationItem(self::ITEM_EVENT_MONTH, $iMonth, $iMonth, null, array_merge($aData, array('month' => $iMonth))));
			}
		} else if($oNavigationItem instanceof VirtualNavigationItem
		          && $oNavigationItem->getType() === self::ITEM_EVENT_MONTH) {
			$aData = $oNavigationItem->getData();
			foreach(self::selectNames($aData, 'DAY(DATE_START)') as $iDay) {
				$oNavigationItem->addChild(new VirtualNavigationItem(self::ITEM_EVENT_DAY, $iDay, $iDay, null, array_merge($aData, array('day' => $iDay))));
			}
		} else if($oNavigationItem instanceof VirtualNavigationItem
		          && $oNavigationItem->getType() === self::ITEM_EVENT_DAY) {
			$aData = $oNavigationItem->getData();
			foreach(self::selectNames($aData, array(EventPeer::TITLE_NORMALIZED, EventPeer::TITLE)) as $oNames) {
				$oNavigationItem->addChild(new VirtualNavigationItem(self::ITEM_EVENT, $oNames->TITLE_NORMALIZED, $oNames->TITLE, null, array_merge($aData, array('title_normalized' => $oNames->TITLE_NORMALIZED))));
			}
		}
	}

	public function onPageHasBeenSet($oPage, $bIsNotFound, $oNavigationItem) {
		if($oNavigationItem instanceof VirtualNavigationItem && in_array($oNavigationItem->getType(), array(self::ITEM_EVENT_YEAR, self::ITEM_EVENT_MONTH, self::ITEM_EVENT_DAY, self::ITEM_EVENT))) {
			if(self::selectNames($oNavigationItem->getData()) === 1) {
				$_REQUEST[self::EVENT_REQUEST_KEY] = self::selectNames($oNavigationItem->getData(), EventPeer::ID);
			}
		}
	}
	
	private static function selectNames($aData, $sColumn = null) {
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
		if(isset($aData['title_normalized'])) {
			$oQuery->add(EventPeer::TITLE_NORMALIZED, $aData['title_normalized']);
		}
		if(is_string($sColumn)) {
			$oQuery->clearSelectColumns()->addSelectColumn($sColumn);
			return EventPeer::doSelectStmt($oQuery)->fetchAll(PDO::FETCH_COLUMN);
		} else if(is_array($sColumn)) {
			$oQuery->clearSelectColumns();
			foreach($sColumn as $sColumnName) {
				$oQuery->addSelectColumn($sColumnName);
			}
			return EventPeer::doSelectStmt($oQuery)->fetchAll(PDO::FETCH_CLASS);
		}
		return $oQuery->count();
	}
}