<?php



/**
 * @package    propel.generator.model
 */
class FunctionGroupPeer extends BaseFunctionGroupPeer {

	public static function getFunctionGroupIdsForTeamlist() {
		return array_merge(self::getFunctionGroupIdsForTeachers(), self::getFunctionGroupIdsForTeachersRequireClasses(), self::getFunctionGroupIdsForOthers());
	}
	
	public static function getFunctionGroupIdsForTeachers() {
		return SchoolPeer::getActiveFunctionGroupIds('teachers');
	}

	public static function getFunctionGroupIdsForTeachersRequireClasses() {
		return SchoolPeer::getActiveFunctionGroupIds('teachers_require_classes');
	}
	
	public static function getFunctionGroupIdsForOthers() {
		return SchoolPeer::getActiveFunctionGroupIds('others');
	}
}

