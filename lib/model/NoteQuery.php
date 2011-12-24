<?php

/**
 * @package    propel.generator.model
 */
class NoteQuery extends BaseNoteQuery {
	
	public function filterByDate() {
		$sDateToday = date('Y-m-d');
		$oDateStart = $this->getNewCriterion(NotePeer::DATE_START, $sDateToday, Criteria::LESS_EQUAL);
		$oDateEnd = $this->getNewCriterion(NotePeer::DATE_END, null, Criteria::ISNULL);
		$oDateEnd->addOr($this->getNewCriterion(NotePeer::DATE_END, $sDateToday, Criteria::GREATER_EQUAL));
		$oDateStart->addAnd($oDateEnd);
		$this->add($oDateStart);
		return $this;
	}
}

