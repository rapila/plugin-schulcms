<?php

/**
 * @package    propel.generator.model
 */
class ClassTeacherQuery extends BaseClassTeacherQuery {
	
	public function orderByLastName() {
		$this->joinTeamMember();
		$this->addAscendingOrderByColumn(TeamMemberPeer::LAST_NAME);
		return $this;
	}
	
	public function filterByUnitFromClass($oClass, $bIsClassTeacherOnly = false) {
	  $this->distinct();
		$this->joinSchoolClass()->useQuery('SchoolClass')->filterByYear($oClass->getYear())->filterByUnitName($oClass->getUnitName())->endUse();
		if($bIsClassTeacherOnly) {
		  $this->groupByTeamMemberId()->filterByIsClassTeacher(true);
		}
		$this->orderByIsClassTeacher(Criteria::DESC)->orderBySortOrder();
		$this->joinTeamMember()->useQuery('TeamMember')->orderByLastName()->orderByFirstName();
    return $this;
	}	
	
	public function filterByYear($iYear = null) {
	  $iYear = $iYear === null ? SchoolPeer::getSchool()->getCurrentYear() : $iYear;
		$this->distinct()->groupByTeamMemberId();
		return $this->joinTeamMember()->joinSchoolClass()->useQuery('SchoolClass')->filterByYear($iYear)->endUse();
	}
}

