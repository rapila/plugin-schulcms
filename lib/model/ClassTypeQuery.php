<?php
/**
 * @package    propel.generator.model
 */
class ClassTypeQuery extends BaseClassTypeQuery {
	
	public function filterByHasClassesWithStudents($bOnlyWithClassesAndStudents = true) {
		if($bOnlyWithClassesAndStudents === false) return $this;
		$this->addJoin(ClassTypePeer::ID, SchoolClassPeer::CLASS_TYPE_ID, Criteria::INNER_JOIN);
		$this->addJoin(SchoolClassPeer::ID, ClassStudentPeer::SCHOOL_CLASS_ID, Criteria::INNER_JOIN);
		return $this;
	}
}

