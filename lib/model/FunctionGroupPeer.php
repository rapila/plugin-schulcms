<?php



/**
 * @package    propel.generator.model
 */
class FunctionGroupPeer extends BaseFunctionGroupPeer {

	public static function getFunctionGroupIdsForTeamlist() {
		return array_merge(self::getFunctionGroupIdsForTeamMembersWithClasses(), self::getFunctionGroupIdsForOtherTeamMembers());
	}

	public static function getFunctionGroupIdsForTeamMembersWithClasses() {
		return SchoolPeer::getActiveFunctionGroupIds('team_members_with_classes');
	}
	
	public static function getFunctionGroupIdsForOtherTeamMembers() {
		return SchoolPeer::getActiveFunctionGroupIds('team_members_others');
	}
}

