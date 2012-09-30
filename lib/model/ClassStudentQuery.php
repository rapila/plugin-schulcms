<?php


/**
 * @package    propel.generator.model
 */
class ClassStudentQuery extends BaseClassStudentQuery {
	
	public function orderByFirstName() {
		$this->joinStudent()->useQuery('Student')->orderByFirstName()->endUse();
		return $this;
	}
	
	public function filterByUnitFromClass($oClass) {
	  $this->distinct();
		$this->joinSchoolClass()->useQuery('SchoolClass')->filterByYear($oClass->getYear())->filterByUnitName($oClass->getUnitName())->endUse();
    return $this;
	}
	
	public function filterBySchoolYear($iYear = null) {
	  $iYear = $iYear === null ? SchoolPeer::getSchool()->getCurrentYear() : $iYear;
	  $this->distinct()->groupByStudentId();
    $this->joinSchoolClass()->useQuery('SchoolClass')->filterByYear($iYear)->includeClassTypesIfConfigured()->endUse();
    return $this;
	}
}
