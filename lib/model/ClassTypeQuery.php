<?php
/**
 * @package    propel.generator.model
 */
class ClassTypeQuery extends BaseClassTypeQuery {
	
	public function filterByHasClassesWithStudents($bOnlyWithClassesAndStudents = true) {
		if($bOnlyWithClassesAndStudents === false) {
			return $this;
		}
		$this->joinSchoolClass(null, Criteria::INNER_JOIN)->useQuery('SchoolClass')->joinClassStudent()->endUse();
		return $this;
	}
}

