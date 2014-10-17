<?php


/**
 * @package		 propel.generator.model
 */
class SchoolClassQuery extends BaseSchoolClassQuery {

	public function filterByIsCurrent($bCurrent = true) {
		return $this->filterByYear(SchoolPeer::getCurrentYear(), $bCurrent ? Criteria::EQUAL : Criteria::NOT_EQUAL);
	}

	public function filterByHasStudents() {
		$this->addJoin(SchoolClassPeer::ID, ClassStudentPeer::SCHOOL_CLASS_ID, Criteria::INNER_JOIN);
		return $this->distinct();
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

	public function filterByClassTypeYearAndSchool($sClassType = null, $iYear = null, $oSchool = null) {
		if($oSchool === null) $oSchool = SchoolPeer::getSchool();
		if($oSchool === null) {
			throw new Exception(__METHOD__.' valid school object required. Please check configuration or Sync');
		}
		$iYear = $iYear === null ? $oSchool->getCurrentYear() : $iYear;
		// Limiting the result by $this->filterBySchool($oSchool)->distinct() can't be used since some schools operate with multiple school_ids
		// Should be no problem since generally only the data are synced that are related to preconfigured school_ids
		$this->orderByName()->includeClassTypesIfConfigured()->filterByYear($iYear);
		if($sClassType) {
			$this->filterByClassType($sClassType);
		}
		$this->groupByUnitName()->joinClassStudent();
		return $this;
	}

}

