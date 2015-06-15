<?php
class TeamMembersFrontendConfigWidgetModule extends FrontendConfigWidgetModule {
	public function listTeamMembers($aFunctionGroupIds = null) {
		$oTeamMemberQuery = TeamMemberQuery::create()->excludeInactive();
		if($aFunctionGroupIds !== null) {
			$oTeamMemberQuery->filterByTeamMemberFunctionGroup($aFunctionGroupIds);
		}
		return WidgetJsonFileModule::jsonBaseObjects($oTeamMemberQuery->orderByLastName()->orderByFirstName()->find(), array('id', 'full_name_inverted'));
	}

	public function displayModes() {
		$aResult = array();
		foreach(TeamMembersFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
			$aResult[$sDisplayMode] = StringPeer::getString('display_mode.'.$sDisplayMode, null, $sDisplayMode);
		}
		return $aResult;
	}

	public function functionGroups() {
		return FunctionGroupQuery::create()->orderByName()->filterbyId(FunctionGroupPeer::getFunctionGroupIdsForTeamlist(), Criteria::IN)->select(array('Id', 'Name'))->find()->toKeyValue('Id', 'Name');
	}

}