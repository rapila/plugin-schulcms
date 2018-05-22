<?php


/**
 * @package propel.generator.model
 */
class SchoolClassQuery extends BaseSchoolClassQuery {

	public function filterByIsCurrent($bCurrent = true) {
		return $this->filterBySchoolYear(true, $bCurrent);
	}

	public function hasStudents() {
		return $this->filterByStudentCount(0, Criteria::NOT_EQUAL);
	}

	public function hasTeachers($bClassTeachersOnly = false) {
		if(!$bClassTeachersOnly) {
			return $this->joinClassTeacher();
		}
		return $this->useClassTeacherQuery()->filterByIsClassTeacher(true)->endUse();
	}

	public function filterByUnitFromClass($oClass) {
		return $this->filterByYear($oClass->getYear())->filterByUnitName($oClass->getUnitName());
	}

	public function studentCount() {
		return $this->select('students')->withColumn('SUM(student_count)', 'students')->findOne();
	}

	/**
	* @todo should be reconsidered
	*				School classes should only be synced according to "white lists" and displayed if they have students
	*/
	public function includeClassTypesIfConfigured($bIncludeSubjectClasses = false) {
		$mIncludeClassTypes = Settings::getSetting("schulcms", 'include_class_types', null);
		if($mIncludeClassTypes !== null) {
			$mIncludeClassTypes = is_array($mIncludeClassTypes) ? $mIncludeClassTypes : array($mIncludeClassTypes);
			$this->filterByClassType($mIncludeClassTypes, Criteria::IN);
			if($bIncludeSubjectClasses) {
				// The subject classes’ type does not appear in the whitelist so we add a separate condition.
				$this->_or()->filterBySubjectId(null, Criteria::ISNOTNULL);
			}
		}
		return $this;
	}

	public function excludeSubjectClasses() {
		return $this->filterBySubjectId(null, Criteria::ISNULL);
	}

	public function filterByDisplayConditionForNonSubjectClasses($aClassTypes = null, $mYear = true) {
		return $this->filterByDisplayCondition($aClassTypes, $mYear)->filterBySubjectId(null, Criteria::ISNULL);
	}

	public function filterByDisplayCondition($aClassTypes = null, $mYear = true) {
		$this->filterByClassTypeAndYear($aClassTypes, $mYear);

		$oSchool = SchoolPeer::getSchool();
		if($mYear === true || $mYear === $oSchool->getCurrentYear()) {
			// If we select non-current years, we ignore missing class teachers (they may have left the school and are not synchronized anymore)
			$this->hasTeachers(true);
		}
		return $this;
	}

	public function filterByClassTypeAndYear($sClassType = null, $mYear = true) {
		$this->filterBySchoolClassType($sClassType);
		$this->filterBySchoolYear($mYear);
		if($mYear !== null) {
			// Don't groupByUnitName if we’re selecting all years, because then only the oldest one is shown, I guess?
			$this->groupByUnitName();
		}
		$this->hasStudents();
		return $this;
	}

	public function filterBySchoolClassType($sClassType = null) {
		if($sClassType !== false) {
			$this->includeClassTypesIfConfigured();
		}
		if($sClassType) {
			$this->filterByClassType($sClassType);
		}
		return $this;
	}

	public function filterBySchoolYear($mYear = true, $bIsEqual = true) {
		if($mYear === true) {
			$mYear = SchoolPeer::getCurrentYear();
		}
		if(is_int($mYear)) {
			$this->filterByYear($mYear, $bIsEqual ? Criteria::EQUAL : Criteria::NOT_EQUAL);
		}

		return $this;
	}

}

