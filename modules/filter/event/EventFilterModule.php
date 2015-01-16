<?php
class EventFilterModule extends FilterModule {

	const ITEM_EVENT_YEAR = 'event_year';
	const ITEM_EVENT_MONTH = 'event_month';
	const ITEM_EVENT_DAY = 'event_day';
	const ITEM_EVENT = 'event_normalized_title';

	const EVENT_REQUEST_KEY = 'event_detail';
	const NAV_TITLE_PREFIX = "Alle ";
	const EVENT_FEED_ITEM = 'event-feed';
	const EVENT_ICS_ITEM = 'event-ics';

	public function onNavigationItemChildrenRequested(NavigationItem $oNavigationItem) {
		$sType = $oNavigationItem->getType();
		if($oNavigationItem instanceof PageNavigationItem) {
			// Events page
			if($sType === 'events') {
				$aYears = self::selectNames(array(), 'YEAR(DATE_START)');
				foreach($aYears as $iYear) {
					if($iYear != null) {
						$oNavigationItem->addChild(new HiddenVirtualFolderNavigationItem(self::ITEM_EVENT_YEAR, $iYear, self::NAV_TITLE_PREFIX.$iYear, null, array('year' => $iYear)));
					}
				}
				// Events RSS feed
				$oFeedItem = new HiddenVirtualNavigationItem(self::EVENT_FEED_ITEM, 'feed', StringPeer::getString('wns.events.feed', null, 'Feed').' '.$oNavigationItem->getLinkText());
				$oFeedItem->bIsIndexed = false; //Don’t index the feed item or else you’ll be exit()-ed before finishing the index
				$oNavigationItem->addChild($oFeedItem);
				// Events ics feed
				$oFeedItem = new HiddenVirtualNavigationItem(self::EVENT_FEED_ITEM, 'ics', StringPeer::getString('wns.events.feed', null, 'Calendar-Feed').' '.$oNavigationItem->getLinkText());
				$oFeedItem->bIsIndexed = false; //Don’t index the feed item or else you’ll be exit()-ed before finishing the index
				$oNavigationItem->addChild($oFeedItem);
			}
		} // Events year
			else if($oNavigationItem instanceof VirtualNavigationItem && $sType === self::ITEM_EVENT_YEAR) {
			$aData = $oNavigationItem->getData();
			foreach(self::selectNames($aData, 'MONTH(DATE_START)') as $iMonth) {
				$oNavigationItem->addChild(new HiddenVirtualFolderNavigationItem(self::ITEM_EVENT_MONTH, $iMonth, $iMonth, null, array_merge($aData, array('month' => $iMonth))));
			}
		} // Events month
			else if($oNavigationItem instanceof VirtualNavigationItem && $sType === self::ITEM_EVENT_MONTH) {
			$aData = $oNavigationItem->getData();
			foreach(self::selectNames($aData, 'DAY(DATE_START)') as $iDay) {
				$oNavigationItem->addChild(new HiddenVirtualFolderNavigationItem(self::ITEM_EVENT_DAY, $iDay, $iDay, null, array_merge($aData, array('day' => $iDay))));
			}
		} // Events day
			else if($oNavigationItem instanceof VirtualNavigationItem && $sType === self::ITEM_EVENT_DAY) {
			$aData = $oNavigationItem->getData();
			foreach(self::selectNames($aData, array(EventPeer::SLUG, EventPeer::TITLE)) as $oNames) {
				$oNavigationItem->addChild(new HiddenVirtualNavigationItem(self::ITEM_EVENT, $oNames->slug, $oNames->title, null, array_merge($aData, array('slug' => $oNames->slug))));
			}
		}
	}

	public function onPageHasBeenSet($oPage, $bIsNotFound, $oNavigationItem) {
		$sType = $oPage->getPageType();
		if($sType !== 'events') {
			//Not a valid event page — return
			return;
		}
		if($oNavigationItem instanceof VirtualNavigationItem) {
			if($oNavigationItem->getType() === self::EVENT_FEED_ITEM) {
				$oFeed = new EventsFileModule(null, $oNavigationItem, EventQuery::create()->filterBySchoolClassId(null));
				$oFeed->renderFile();exit;
			} else {
				if(self::selectNames($oNavigationItem->getData()) === 1) {
					$aId = self::selectNames($oNavigationItem->getData(), EventPeer::ID);
					$_REQUEST[self::EVENT_REQUEST_KEY] = (int) $aId[0];
				}
			}
		}
		$this->handleNewsFeed($oPage);
	}

	public function handleNewsFeed($oPage) {
		$aLink = array_merge($oPage->getLink(), array('feed'));
		ResourceIncluder::defaultIncluder()->addCustomResource(array('template' => 'feed', 'title' => 'Alle Anlässe', 'location' => LinkUtil::link($aLink)));
		foreach(EventTypeQuery::create()->find() as $oEventType) {
			ResourceIncluder::defaultIncluder()->addCustomResource(array('template' => 'feed', 'title' => $oEventType->getName(), 'location' => LinkUtil::link($aLink)."?event_type={$oEventType->getId()}"));
		}
	}

	private static function selectNames($aData, $sColumn = null) {
		$oQuery = FrontendEventQuery::create()->distinct()->filterByNavigationItem($aData);
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