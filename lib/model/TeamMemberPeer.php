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
	
	public static function getInactiveDatabaseTeachers() {
		$oCriteria = new Criteria();
		$oCriteria->addJoin(TeamMemberPeer::ID, ClassTeacherPeer::TEAM_MEMBER_ID, Criteria::LEFT_JOIN);
		$oCriteria->add(ClassTeacherPeer::SCHOOL_CLASS_ID, null, Criteria::ISNULL);
		return TeamMemberPeer::doSelect($oCriteria);
	}
}

