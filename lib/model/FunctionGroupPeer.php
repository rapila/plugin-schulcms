<?php



/**
 * @package    propel.generator.model
 */
class FunctionGroupPeer extends BaseFunctionGroupPeer {
  	
	public static function getFunctionGroupIdsForTeamlist() {
		return array_merge(self::getFunctionGroupIdsForTeachers(), self::getFunctionGroupIdsForOthers());
	}
	
	public static function getFunctionGroupIdsForTeachers() {
		return SchoolPeer::getActiveFunctionGroupIds('teachers');
	}
	
	public static function getFunctionGroupIdsForOthers() {
		return SchoolPeer::getActiveFunctionGroupIds('others');
	}
	
  public static function getActiveFunctionGroups($aIds = null) {
		$aIds = $aIds !== null ? $aIds : self::getFunctionGroupIdsForTeamlist();
    $oCriteria = new myCriteria();
    $oCriteria->setDistinct();
    $oCriteria->add(self::ID, $aIds, Criteria::IN);
    $oCriteria->addJoin(self::ID, SchoolFunctionPeer::FUNCTION_GROUP_ID, Criteria::INNER_JOIN);
    $oCriteria->addJoin(SchoolFunctionPeer::ID, TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, Criteria::INNER_JOIN);
    $oCriteria->addOrderByField(self::ID, array(7, 2, 1, 6));  
    return self::doSelect($oCriteria);
  }
}

