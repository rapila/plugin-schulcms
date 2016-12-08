<?php

/**
 * @package    propel.generator.model
 */
class SubjectQuery extends BaseSubjectQuery
{

	public function filterByHasClasses($bHasClasses = true, $iYear = true) {
		if($bHasClasses) {
			$this->useSchoolClassQuery(null, Criteria::INNER_JOIN)->filterByDisplayCondition(false, $iYear)->filterBySubjectId(null, Criteria::ISNOTNULL)->hasTeachers()->orderByName()->endUse();
		}
		return $this;
	}
}
