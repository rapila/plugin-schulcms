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
}

