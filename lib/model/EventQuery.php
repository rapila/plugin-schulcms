<?php

/**
 * @package		 propel.generator.model
 */
class EventQuery extends BaseEventQuery {
	
	public function filterByDateRangePreview() {
		$sDateToday = date('Y-m-d');
		$oDateStart = $this->getNewCriterion(EventPeer::DATE_START, $sDateToday, Criteria::GREATER_EQUAL);
		$oDateEnd = $this->getNewCriterion(EventPeer::DATE_END, null, Criteria::ISNULL);
		$oDateEnd->addOr($this->getNewCriterion(EventPeer::DATE_END, $sDateToday, Criteria::GREATER_EQUAL));
		$oDateStart->addAnd($oDateEnd);
		$this->add($oDateStart);
		return $this;
	}	
	
	public function filterByDateRangeReview() {
		$sDateToday = date('Y-m-d');
		$oDateStart = $this->getNewCriterion(EventPeer::DATE_START, $sDateToday, Criteria::LESS_THAN);
		$oDateEnd = $this->getNewCriterion(EventPeer::DATE_END, null, Criteria::ISNULL);
		$oDateEnd->addOr($this->getNewCriterion(EventPeer::DATE_END, $sDateToday, Criteria::LESS_THAN));
		$oDateStart->addAnd($oDateEnd);
		$this->add($oDateStart);
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
}

