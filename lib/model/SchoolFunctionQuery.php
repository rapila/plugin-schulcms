<?php

/**
 * @package    propel.generator.model
 */
class SchoolFunctionQuery extends BaseSchoolFunctionQuery {

	public function filterByNonTeachingFunctionGroups() {
		$this->filterByFunctionGroupId(SchoolPeer::getActiveFunctionGroupIds('team_members_others'))->joinFunctionGroup()->joinTeamMemberFunction();
		return $this;
	}

	public function filterByFunctionGroupNameAndSchoolId($sName, $iSchoolId = null) {
		$this->useFunctionGroupQuery()->filterByName($sName)->endUse();
		if($iSchoolId) {
			$this->filterBySchoolId($iSchoolId);
		}
		return $this;
	}
}

