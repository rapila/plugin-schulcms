<?php
/**
 * @package		 propel.generator.model
 */
class TeamMemberPeer extends BaseTeamMemberPeer {
  
  const TEACHERS_USER_GROUP_NAME = 'teachers';

	public static function addSearchToCriteria($sSearch, $oCriteria) {
		$oSearchCriterion = $oCriteria->getNewCriterion(TeamMemberPeer::FIRST_NAME, 'CONCAT(' . TeamMemberPeer::FIRST_NAME . '," ",' . TeamMemberPeer::LAST_NAME.') LIKE ("%' . $sSearch. '%")', Criteria::CUSTOM);
		$oSearchCriterion->addOr($oCriteria->getNewCriterion(TeamMemberPeer::PROFESSION, "%$sSearch%", Criteria::LIKE));
		$oCriteria->add($oSearchCriterion);
	}

	public static function getTeamMembersByFunctionId($iFunctionId = null) {
		$oCriteria = self::getFrontendBaseCriteria($iFunctionId);
		$oCriteria->add(self::LAST_NAME, null, Criteria::ISNOTNULL);
		$oCriteria->addAscendingOrderByColumn(self::LAST_NAME);
		return self::doSelect($oCriteria);
	}
	
	public static function getFrontendBaseCriteria($iFunctionId = null) {
	  $oCriteria = new Criteria();
		if($iFunctionId !== null) {
			$oCriteria->addJoin(self::ID, TeamMemberFunctionPeer::TEAM_MEMBER_ID, Criteria::INNER_JOIN);
			$oCriteria->add(TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, $iFunctionId);
		}
		return $oCriteria;
	}
	
	public static function getRandomMember($iFunctionId = null) {
		$oCriteria = self::getFrontendBaseCriteria($iFunctionId);
		$oCriteria->addAscendingOrderByColumn(' RAND()');
		return self::doSelectOne($oCriteria);
	}
	
	public static function countLehrpersonen($iYear = null) {
	  $oCriteria = new Criteria();
	  $oCriteria->setDistinct();
	  $oCriteria->addJoin(self::ID, ClassTeacherPeer::TEAM_MEMBER_ID, Criteria::INNER_JOIN);
	  $oCriteria->addJoin(ClassTeacherPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, Criteria::INNER_JOIN);
	  $oCriteria->add(SchoolClassPeer::YEAR, $iYear);
	  return self::doCount($oCriteria);
	}
	
	public static function countTeamMembersByFunctionGroupIds($mFuntionGroups) {
		$aFunctionGroups = is_array($mFuntionGroups) ? $mFuntionGroups : array($mFuntionGroups);
		$oCriteria = new Criteria();
	  $oCriteria->setDistinct();
	  $oCriteria->addJoin(self::ID, TeamMemberFunctionPeer::TEAM_MEMBER_ID, Criteria::INNER_JOIN);
	  $oCriteria->addJoin(TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, SchoolFunctionPeer::ID, Criteria::INNER_JOIN);
	  $oCriteria->addJoin(SchoolFunctionPeer::SCHOOL_ID, SchoolPeer::getSchoolId());
		$oCriteria->add(SchoolFunctionPeer::FUNCTION_GROUP_ID, $aFunctionGroups, Criteria::IN);
		return self::doCount($oCriteria);
	}
	
	public static function countNonTeachingPersonel() {
		return self::countTeamMembersByFunctionGroupIds(SchoolPeer::getActiveFunctionGroupIds('others'));
	}
	
	public static function getInactiveDatabaseTeachers() {
		$oCriteria = new Criteria();
		$oCriteria->addJoin(TeamMemberPeer::ID, ClassTeacherPeer::TEAM_MEMBER_ID, Criteria::LEFT_JOIN);
		$oCriteria->add(ClassTeacherPeer::SCHOOL_CLASS_ID, null, Criteria::ISNULL);
		return TeamMemberPeer::doSelect($oCriteria);
	}
	
	public static function getTeachersByUnitName($sUnitName, $bIsClassTeacher=true, $iLimit = null) {
		$oCriteria = new Criteria();
		$oCriteria->setDistinct();
		$oCriteria->addJoin(self::ID, ClassTeacherPeer::TEAM_MEMBER_ID, Criteria::INNER_JOIN);
		$oCriteria->addJoin(ClassTeacherPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, Criteria::INNER_JOIN);
		if($bIsClassTeacher) {
			$oCriteria->add(ClassTeacherPeer::IS_CLASS_TEACHER, true);
		}
		if($sUnitName !== null) {
			$oCriteria->add(SchoolClassPeer::UNIT_NAME, $sUnitName);
		}
		if($iLimit) {
			$oCriteria->setLimit($iLimit);
		}
		$oCriteria->add(SchoolClassPeer::YEAR, SchoolPeer::getSchool()->getCurrentYear());
		$oCriteria->addDescendingOrderByColumn(ClassTeacherPeer::IS_CLASS_TEACHER);
		$oCriteria->addAscendingOrderByColumn(ClassTeacherPeer::SORT_ORDER);
		$oCriteria->addAscendingOrderByColumn(self::LAST_NAME);
		
		return self::doSelect($oCriteria);
	}
}

