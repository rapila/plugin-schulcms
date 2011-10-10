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
			$sDateToday = date('Y-m-d');
			$oDateStart = $this->getNewCriterion(EventPeer::DATE_START, $sDateToday, Criteria::GREATER_EQUAL);
			$oDateEnd = $this->getNewCriterion(EventPeer::DATE_END, null, Criteria::ISNULL);
			$oDateEnd->addOr($this->getNewCriterion(EventPeer::DATE_END, $sDateToday, Criteria::GREATER_EQUAL));
			$oDateStart->addAnd($oDateEnd);
			$this->add($oDateStart);
			return $this;
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
		$this->addJoin(EventPeer::ID, EventDocumentPeer::EVENT_ID, Criteria::LEFT_JOIN);
		$oOrCriteria = $this->getNewCriterion(EventDocumentPeer::DOCUMENT_ID, NULL, Criteria::ISNOTNULL);
		$oOrCriteria->addOr($this->getNewCriterion(EventPeer::BODY_REVIEW, null, Criteria::ISNOTNULL));
		$this->add($oOrCriteria);
		return $this;
	}
}

