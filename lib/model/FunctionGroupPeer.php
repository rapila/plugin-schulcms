<?php



/**
 * @package    propel.generator.model
 */
class FunctionGroupPeer extends BaseFunctionGroupPeer {
  
	// These reference function group ids
	private static $ACTIVE_TEACHER_GROUPS = array(1,2);
	private static $ACTIVE_OTHERS_GROUPS = array(6,7);
	
	// ATTENTION: addOrderByField is ordered separately, manually
	public static function getFunctionGroupsTeamlist() {
		return array_merge(self::$ACTIVE_TEACHER_GROUPS, self::$ACTIVE_OTHERS_GROUPS);
	}
	
	public static function getTeacherFunctionGroupIds() {
		return self::$ACTIVE_TEACHER_GROUPS;
	}
	
	public static function getOtherFunctionGroupIds() {
		return self::$ACTIVE_OTHERS_GROUPS;
	}
	
  public static function getActiveFunctionGroups($aIds = null) {
		$aIds = $aIds !== null ? $aIds : self::getFunctionGroupsTeamlist();
    $oCriteria = new myCriteria();
    $oCriteria->setDistinct();
    $oCriteria->add(self::ID, $aIds, Criteria::IN);
    $oCriteria->addJoin(self::ID, SchoolFunctionPeer::FUNCTION_GROUP_ID, Criteria::INNER_JOIN);
    $oCriteria->addJoin(SchoolFunctionPeer::ID, TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, Criteria::INNER_JOIN);
    $oCriteria->addOrderByField(self::ID, array(7, 2, 1, 6));  
    return self::doSelect($oCriteria);
  }
}

