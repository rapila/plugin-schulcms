<?php

/**
 * @package    propel.generator.model
 */
class SchoolFunctionQuery extends BaseSchoolFunctionQuery {

	public function filterByNonTeachingFunctionGroups() {
		return $this->filterByFunctionGroupIdAndSchoolId(SchoolPeer::getActiveFunctionGroupIds('team_members_others'));
	}

	public function filterByFunctionGroupIdAndSchoolId($mFunctionGroupIds, $iSchoolId = null) {
		$this->filterByFunctionGroupId($mFunctionGroupIds);
		$this->filterBySchoolId($iSchoolId === null ? SchoolPeer::getSchoolId() : $iSchoolId);
		$this->joinFunctionGroup()->joinTeamMemberFunction();
		return $this;
	}
}

