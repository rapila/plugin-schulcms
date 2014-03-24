<?php

/**
 * @package    propel.generator.model
 */
class NoteQuery extends BaseNoteQuery {
	
	public function filterByDate() {
		$sDateToday = date('Y-m-d');
		$this->filterByDateStart($sDateToday, Criteria::LESS_EQUAL)->_and()->filterByDateEnd($sDateToday, Criteria::GREATER_EQUAL)->_or()->filterByDateEnd(null, Criteria::ISNULL);
		return $this;
	}
	
	public function publishedOnly() {
		return $this->filterByIsInactive(false);
	}
	
	public function orderByDate() {
		return $this->orderByDateStart();
	}
}

