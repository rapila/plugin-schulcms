<?php
class TeamMemberEditWidgetModule extends PersistentWidgetModule {
	private $oFrontendModule;
	private $sDisplayMode;
	private $aFunctionGroupIds;
	
	public function __construct($sSessionKey, $oFrontendModule) {
		parent::__construct($sSessionKey);
		$this->oFrontendModule = $oFrontendModule;
		$aData = $this->oFrontendModule->widgetData();
		$this->sDisplayMode = $aData[TeamMembersFrontendModule::MODE_SELECT_KEY];
		$this->aFunctionGroupIds = @$aData[TeamMembersFrontendModule::GROUPS_SELECT_KEY];
	}
	
	public function getDisplayMode() {
		return $this->sDisplayMode;
	}
	
	public function getFunctionGroupIds() {
		return $this->aFunctionGroupIds;
	}

	public function allTeamMembers($aFunctionGroupIds = null) {
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
		$aResult = array();
		foreach(FunctionGroupQuery::create()->orderByName()->filterbyId(FunctionGroupPeer::getFunctionGroupIdsForTeamlist(), Criteria::IN)->find() as $oFunctionGroup) {
			$aResult[$oFunctionGroup->getId()] = $oFunctionGroup->getName();
		}
		return $aResult;
	}
	
	public function saveData($mData) {
		return $this->oFrontendModule->widgetSave($mData);
	}
}