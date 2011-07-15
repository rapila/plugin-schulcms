<?php
class TeamMemberEditWidgetModule extends PersistentWidgetModule {
	private $oFrontendModule;
	private $sDisplayMode;
	
	public function __construct($sSessionKey, $oFrontendModule) {
		parent::__construct($sSessionKey);
		$this->oFrontendModule = $oFrontendModule;
		$this->sDisplayMode = $this->oFrontendModule->widgetData();
	}
	
	public function setDisplayMode($sDisplayMode) {
		$this->sDisplayMode = $sDisplayMode;
	}

	public function getDisplayMode() {
		return $this->sDisplayMode;
	}
	
	public function allTeamMembers($iFunctionGroupId = null) {
		$oTeamMemberQuery = TeamMemberQuery::create()->excludeInactive();
		if($iFunctionGroupId !== null) {
			$oTeamMemberQuery->filterByTeamMemberFunctionGroup($iFunctionGroupId);
		}
		return WidgetJsonFileModule::jsonBaseObjects($oTeamMemberQuery->orderByLastName()->orderByFirstName()->find(), array('id', 'full_name_inverted'));
	}
	
	public function getDisplayModes() {
	  $aResult = array();
		foreach(FunctionGroupPeer::getActiveFunctionGroups() as $oFunctionGroup) {
	    $aResult[$oFunctionGroup->getId()] = $oFunctionGroup->getName();
		}
	  foreach(TeamMembersFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
	    $aResult[$sDisplayMode] = StringPeer::getString('display_mode.'.$sDisplayMode, null, $sDisplayMode);
	  }
		$aFunctionGroups = FunctionGroupPeer::getActiveFunctionGroups();
		return $aResult;
	}
	
	public function saveData($mData) {
		return $this->oFrontendModule->widgetSave($mData);
	}
}