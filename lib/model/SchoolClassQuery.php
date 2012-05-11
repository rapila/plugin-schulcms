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
		$this->filterBySchool($oSchool)->distinct()->orderByName()->includeClassTypesIfConfigured()->filterByYear($iYear);
		if($iClassTypeId) {
			$this->filterByClassTypeId($iClassTypeId);
		}
		$this->groupByUnitName()->joinClassStudent();
		return $this;
	}

}

