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
	
	public function includeClassTypesIfConfigured() {
		$mIncludeClassTypes = Settings::getSetting("school_settings", 'include_class_types', null);
		if($mIncludeClassTypes !== null) {
			$mIncludeClassTypes = is_array($mIncludeClassTypes) ? $mIncludeClassTypes : array($mIncludeClassTypes);
			$this->filterByClassTypeId($mIncludeClassTypes, Criteria::IN);
		}
		return $this;
	}
	
	public function filterByClassTypeIdYearAndSchool($iClassTypeId = null, $iYear = null, $oSchool = null) {
		if($oSchool === null) $oSchool = SchoolPeer::getSchool();
		if($oSchool === null) {
			throw new Exception(__METHOD__.' valid school object required. Please check ***REMOVED*** configuration or ***REMOVED***Sync');
		}
		$iYear = $iYear === null ? $oSchool->getCurrentYear() : $iYear;
		// Limiting the result by $this->filterBySchool($oSchool)->distinct() can't be used since some schools operate with multiple school_ids
		// Should be no problem since generally only the data are synced that are related to preconfigured school_ids
		$this->orderByName()->includeClassTypesIfConfigured()->filterByYear($iYear);
		if($iClassTypeId) {
			$this->filterByClassTypeId($iClassTypeId);
		}
		$this->groupByUnitName()->joinClassStudent();
		return $this;
	}

}

