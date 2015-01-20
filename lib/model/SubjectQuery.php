<?php

/**
 * @package    propel.generator.model
 */
class SubjectQuery extends BaseSubjectQuery
{

	public function filterByHasClasses($bHasClasses = true) {
		if($bHasClasses) {
			$this->useSchoolClassQuery(null, Criteria::INNER_JOIN)->hasTeachers()->orderByName()->endUse();
		}
		return $this;
	}
}
