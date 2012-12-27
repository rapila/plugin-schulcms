<?php

/**
 * @package		 propel.generator.model
 */
class EventQuery extends BaseEventQuery {
	
	public function upcomingOrOngoing() {
		return $this->upcoming()->_and()->filterByDateEnd(null, Criteria::ISNULL)->_or()->filterByDateEnd(date('Y-m-d'), Criteria::GREATER_EQUAL);
	}
	
	public function upcoming() {
		return $this->filterByDateStart(date('Y-m-d'), Criteria::GREATER_EQUAL);
	}
		
	public function past($sDate = null) {
		$sDateToday = date('Y-m-d');
		$oDateStart = $this->getNewCriterion(EventPeer::DATE_START, $sDateToday, Criteria::LESS_THAN);
		$oDateEnd = $this->getNewCriterion(EventPeer::DATE_END, null, Criteria::ISNULL);
		$oDateEndOr = $this->getNewCriterion(EventPeer::DATE_END, $sDateToday, Criteria::LESS_THAN);
		// if this date is given then restrict selection to date range
		// @todo consider this to be the updated at instead of the event date?
		if($sDate !== null) {
			$oDateStart->addAnd($this->getNewCriterion(EventPeer::DATE_START, $sDate, Criteria::GREATER_THAN));
			$oDateEndOr->addAnd($this->getNewCriterion(EventPeer::DATE_END, $sDate, Criteria::GREATER_THAN));
		}
		$oDateEnd->addOr($oDateEndOr);
		$oDateStart->addAnd($oDateEnd);
		$this->add($oDateStart);
		return $this;
	}
	
	public function filterByNavigationItem($oNavigationItem = null) {
		if($oNavigationItem === null) {
			$oNavigationItem = FrontendManager::$CURRENT_NAVIGATION_ITEM;
		}
		$aData = array();
		if(is_array($oNavigationItem)) {
			$aData = $oNavigationItem;
		} else if($oNavigationItem instanceof VirtualNavigationItem) {
			$aData = $oNavigationItem->getData();
		} else {
			$iIdentifier = $oNavigationItem->getIdentifier();
			$iIdentifier = explode(EventFilterModule::EVENT_TYPE_SEPARATOR, $iIdentifier);
			if(isset($iIdentifier[1])) {
				$iIdentifier = $iIdentifier[1];
				$aData['event_type'] = $iIdentifier;
			}
		}
		$oQuery = $this->filterByEventTypeId($aData['event_type']);
		if(isset($aData['year'])) {
			$this->add('YEAR(DATE_START)', $aData['year']);
		} else {
			return $this->upcomingOrOngoing();
		}
		if(isset($aData['month'])) {
			$this->add('MONTH(DATE_START)', $aData['month']);
		}
		if(isset($aData['day'])) {
			$this->add('DAY(DATE_START)', $aData['day']);
		}
		if(isset($aData['title_normalized'])) {
			$this->add(EventPeer::TITLE_NORMALIZED, $aData['title_normalized']);
		}
		return $this;
	}
	
	public function orderByRand() {
		return $this->addAscendingOrderByColumn('RAND()');
	}
	
	public function excludeExternallyManaged($bIsNull = true) {
		if($bIsNull) {
			return $this->filterBySchoolClassId(null, Criteria::ISNULL);
		}
		return $this;
	}
	
	public function filterbyHasImagesOrReview() {
		return $this->joinEventDocument()->_or()->filterByBodyReview(null, Criteria::ISNOTNULL);
	}
	
	public static function findYearsByEventTypeId($iEventType = null) {
		$oQuery = FrontendEventQuery::create()->distinct()->withColumn('YEAR(events.DateStart)', 'Year');
		if(is_numeric($iEventType)) {
			$oQuery->filterByEventTypeId($iEventType);
		}
		return $oQuery->orderBy('Year')->select(array('Year'))->find()->toArray();
	}
}

