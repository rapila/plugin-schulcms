<?php


/**
 * @package    propel.generator.model
 */
class SchoolClassQuery extends BaseSchoolClassQuery {
	public function filterByIsCurrent($bCurrent = true) {
		return $this->filterByYear(SchoolPeer::getSchool()->getCurrentYear(), $bCurrent ? Criteria::EQUAL : Criteria::NOT_EQUAL);
	}

	public function filterByHasStudents() {
		$this->addJoin(SchoolClassPeer::ID, ClassStudentPeer::SCHOOL_CLASS_ID, Criteria::INNER_JOIN);
		return $this->distinct();
	}
}

