<?php

/**
 * @package		 propel.generator.model
 */
class EventQuery extends BaseEventQuery {

	public function upcomingOrOngoing() {
		return $this->upcoming()->_or()->filterByDateEnd(date('Y-m-d'), Criteria::GREATER_EQUAL);
	}

	public function upcoming() {
		return $this->filterByDateStart(date('Y-m-d'), Criteria::GREATER_EQUAL);
	}

	public function common() {
		return $this->filterBySchoolClassId(null, Criteria::ISNULL)->_or()->filterByIsCommon(true);
	}

	public function displayedInClass($oClass, $bExcludePushed = false) {
		$this->addCond('has_no_class', EventPeer::SCHOOL_CLASS_ID, null, Criteria::ISNULL);
		$this->addCond('is_common', EventPeer::IS_COMMON, true);
		$this->combine(array('has_no_class', 'is_common'), Criteria::LOGICAL_AND, 'is_pushed_to_classes');
		$this->addCond('is_of_class', EventPeer::SCHOOL_CLASS_ID, $oClass->getLinkedClassIds(), Criteria::IN);
		if($bExcludePushed) {
			$this->combine(array('is_of_class'), Criteria::LOGICAL_OR);
		} else {
			$this->combine(array('is_pushed_to_classes', 'is_of_class'), Criteria::LOGICAL_OR);
		}
		return $this;
	}

	public function fromYear($iYear) {
		$this->addCond('betweenStart', 'YEAR(DATE_START)', $iYear, Criteria::LESS_EQUAL);
		$this->addCond('betweenEnd', 'YEAR(DATE_END)', $iYear, Criteria::GREATER_EQUAL);
		$this->combine(array('betweenStart', 'betweenEnd'), 'and');
		$this->_or()->addUsingOperator('YEAR(DATE_START)', $iYear, Criteria::EQUAL, false)->_or()->addUsingOperator('YEAR(DATE_END)', $iYear, Criteria::EQUAL, false);
		return $this;
	}

	public function past($sDate = null) {
		$sDateToday = date('Y-m-d');
		$oDateStart = $this->getNewCriterion(EventPeer::DATE_START, $sDateToday, Criteria::LESS_THAN);
		$oDateEnd = $this->getNewCriterion(EventPeer::DATE_END, $sDateToday, Criteria::LESS_THAN);
		// if this date is given then restrict selection to date range
		// @todo consider this to be the updated at instead of the event date?
		if($sDate !== null) {
			$oDateStart->addAnd($this->getNewCriterion(EventPeer::DATE_START, $sDate, Criteria::GREATER_THAN));
			$oDateEnd->addAnd($this->getNewCriterion(EventPeer::DATE_END, $sDate, Criteria::GREATER_THAN));
		}
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
		}
		if(isset($aData['year'])) {
			$this->add('YEAR(DATE_START)', $aData['year']);
		}
		if(isset($aData['month'])) {
			$this->add('MONTH(DATE_START)', $aData['month']);
		}
		if(isset($aData['day'])) {
			$this->add('DAY(DATE_START)', $aData['day']);
		}
		if(isset($aData['slug'])) {
			$this->add(EventPeer::SLUG, $aData['slug']);
		}
		return $this;
	}

	public function orderByRand() {
		return $this->addAscendingOrderByColumn('RAND()');
	}

	public function excludeExternallyManaged($bIsNull = true) {
		if($bIsNull) {
			return $this->excludeClassEvents();
		}
		return $this;
	}

	public function excludeClassEvents($bAlsoExcludePushedToCommonFromClasses = false) {
		if($bAlsoExcludePushedToCommonFromClasses) {
			return $this->filterBySchoolClassId(null, Criteria::ISNULL);
		}
		return $this->common();
	}
	
	public function filterByHasImages() {
		return $this->joinEventDocument(null, Criteria::LEFT_JOIN)->useQuery('EventDocument')->filterByEventId(null, Criteria::ISNOTNULL)->endUse()->distinct();
	}
	
	public function filterByHasReview() {
		return $this->filterByBodyReview(null, Criteria::ISNOTNULL);
	}

	public function filterbyHasImagesOrReview() {
		return $this->filterByHasImages()->_or()->filterByHasReview();
	}

	public static function findYearsByEventTypeId($iEventType = null) {
		$oQuery = FrontendEventQuery::create()->distinct()->withColumn('YEAR(events.DateStart)', 'Year');
		if(is_numeric($iEventType)) {
			$oQuery->filterByEventTypeId($iEventType);
		}
		return $oQuery->orderBy('Year')->select(array('Year'))->find()->toArray();
	}
}

