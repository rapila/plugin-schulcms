<?php

/**
 * @package    propel.generator.model
 */
class ClassTeacherPeer extends BaseClassTeacherPeer {
	
	public static function getClassTeachersByUnitName($sUnitName, $iLimit = null, $bIsClassTeacher=null) {
		$oCriteria = new Criteria();
		$oCriteria->setDistinct();
		if($bIsClassTeacher) {
			$oCriteria->add(self::IS_CLASS_TEACHER, $bIsClassTeacher);
		}
		$oCriteria->addJoin(self::TEAM_MEMBER_ID, TeamMemberPeer::ID, Criteria::INNER_JOIN);
		$oCriteria->addJoin(self::SCHOOL_CLASS_ID, SchoolClassPeer::ID, Criteria::INNER_JOIN);
		if($sUnitName !== null) {
			$oCriteria->add(SchoolClassPeer::UNIT_NAME, $sUnitName);
		}
		$oCriteria->add(SchoolClassPeer::YEAR, SchoolPeer::getSchool()->getCurrentYear());
		$oCriteria->addDescendingOrderByColumn(self::IS_CLASS_TEACHER);
		$oCriteria->addAscendingOrderByColumn(self::SORT_ORDER);
		$oCriteria->addAscendingOrderByColumn(TeamMemberPeer::LAST_NAME);
		$oCriteria->addAscendingOrderByColumn(TeamMemberPeer::FIRST_NAME);
		if($iLimit !== null) {
			$oCriteria->setLimit($iLimit);
		}
		return self::doSelect($oCriteria);
	}
}

