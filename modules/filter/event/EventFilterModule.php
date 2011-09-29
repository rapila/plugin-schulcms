<?php
class EventFilterModule extends FilterModule {
	
	const EVENT_TYPE_SEPARATOR = '-';
	
	const ITEM_EVENT_YEAR = 'event_year';
	const ITEM_EVENT_MONTH = 'event_month';
	const ITEM_EVENT_DAY = 'event_day';
	const ITEM_EVENT = 'event_normalized_title';
	
	const EVENT_REQUEST_KEY = 'event_detail';
	const NAV_TITLE = "Alle ";

	public function onNavigationItemChildrenRequested(NavigationItem $oNavigationItem) {
		///@todo this only works if the page events is always displaying a specific event_type_id, is showing a subpage of events
		$mIdentifier = $oNavigationItem->getIdentifier();
		if($mIdentifier === null) {
			return;
		}
		$mIdentifier = explode(self::EVENT_TYPE_SEPARATOR, $mIdentifier);
		if($mIdentifier[0] !== SchoolPeer::PAGE_IDENTIFIER_EVENTS) {
			return;
		}
		if($oNavigationItem instanceof PageNavigationItem) {
			$aYears = array();
			if(isset($mIdentifier[1])) {
				$aData = array('event_type' => $mIdentifier[1]);
				$aYears = self::selectNames($aData, 'YEAR(DATE_START)');
				foreach($aYears as $iYear) {
					$oNavigationItem->addChild(new VirtualNavigationItem(self::ITEM_EVENT_YEAR, $iYear, self::NAV_TITLE.$iYear, null, array_merge($aData, array('year' => $iYear))));
				}
				$aAllYears = EventPeer::getYears($mIdentifier[1]);
				foreach(array_diff($aAllYears, $aYears) as $iYear) {
					$aData['event_type'] = $mIdentifier[1];
					$oNavigationItem->addChild(new VirtualNavigationItem(self::ITEM_EVENT_YEAR, $iYear, self::NAV_TITLE.$iYear, null, array_merge($aData, array('year' => $iYear))));
				} else {
					/// what needs to be done here
				}
			}
		} else if($oNavigationItem instanceof VirtualNavigationItem && $oNavigationItem->getType() === self::ITEM_EVENT_YEAR) {
			$aData = $oNavigationItem->getData();
			foreach(self::selectNames($aData, 'MONTH(DATE_START)') as $iMonth) {
				$oNavigationItem->addChild(new VirtualNavigationItem(self::ITEM_EVENT_MONTH, $iMonth, $iMonth, null, array_merge($aData, array('month' => $iMonth))));
			}
		} else if($oNavigationItem instanceof VirtualNavigationItem && $oNavigationItem->getType() === self::ITEM_EVENT_MONTH) {
			$aData = $oNavigationItem->getData();
			foreach(self::selectNames($aData, 'DAY(DATE_START)') as $iDay) {
				$oNavigationItem->addChild(new VirtualNavigationItem(self::ITEM_EVENT_DAY, $iDay, $iDay, null, array_merge($aData, array('day' => $iDay))));
			}
		} else if($oNavigationItem instanceof VirtualNavigationItem && $oNavigationItem->getType() === self::ITEM_EVENT_DAY) {
			$aData = $oNavigationItem->getData();
			foreach(self::selectNames($aData, array(EventPeer::TITLE_NORMALIZED, EventPeer::TITLE)) as $oNames) {
				$oNavigationItem->addChild(new VirtualNavigationItem(self::ITEM_EVENT, $oNames->TITLE_NORMALIZED, $oNames->TITLE, null, array_merge($aData, array('title_normalized' => $oNames->TITLE_NORMALIZED))));
			}
		}
	}

	public function onPageHasBeenSet($oPage, $bIsNotFound, $oNavigationItem) {
		if($oNavigationItem instanceof VirtualNavigationItem && in_array($oNavigationItem->getType(), array(self::ITEM_EVENT_YEAR, self::ITEM_EVENT_MONTH, self::ITEM_EVENT_DAY, self::ITEM_EVENT))) {
			if(self::selectNames($oNavigationItem->getData()) === 1) {
				$aId = self::selectNames($oNavigationItem->getData(), EventPeer::ID);
				$_REQUEST[self::EVENT_REQUEST_KEY] = (int) $aId[0];
			}
		}
	}
	
	private static function selectNames($aData, $sColumn = null) {
		$oQuery = EventQuery::create()->distinct()->filterByNavigationItem($aData);
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