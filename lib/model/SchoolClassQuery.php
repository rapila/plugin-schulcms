<?php


/**
 * @package propel.generator.model
 */
class SchoolClassQuery extends BaseSchoolClassQuery {

	public function filterByIsCurrent($bCurrent = true) {
		return $this->filterByYear(SchoolPeer::getCurrentYear(), $bCurrent ? Criteria::EQUAL : Criteria::NOT_EQUAL);
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

	/**
	* @todo should be reconsidered
	*				School classes should only be synced according to "white lists" and displayed if they have students
	*/
	public function includeClassTypesIfConfigured() {
		$mIncludeClassTypes = Settings::getSetting("schulcms", 'include_class_types', null);
		if($mIncludeClassTypes !== null) {
			$mIncludeClassTypes = is_array($mIncludeClassTypes) ? $mIncludeClassTypes : array($mIncludeClassTypes);
			$this->filterByClassType($mIncludeClassTypes, Criteria::IN);
		}
		return $this;
	}

	public function excludeSubjectClasses() {
		return $this->filterBySubjectId(null, Criteria::ISNULL);
	}

	public function filterByClassTypeAndYear($sClassType = null, $mYear = true) {
		$this->filterBySchoolClassType($sClassType);
		$this->filterBySchoolYear($mYear);
		if($mYear === null) {
			// don't groupByUnitName, because then only the oldest one is shown, I guess?
			$this->joinClassStudent();
		} else {
			$this->groupByUnitName()->joinClassStudent();
		}
		return $this;
	}

	public function filterBySchoolClassType($sClassType = null) {
		$this->includeClassTypesIfConfigured();
		if($sClassType) {
			$this->filterByClassType($sClassType);
		}
		return $this;
	}

	public function filterBySchoolYear($mYear = true) {
		if($mYear === true) {
			$oSchool = SchoolPeer::getSchool();
			if($oSchool === null) {
				throw new Exception(__METHOD__.' valid school object required. Please check configuration or Sync');
			}
			$mYear = $oSchool->getCurrentYear();
		}
		if(is_int($mYear)) {
			return $this->filterByYear($mYear);
		}
	}

}

