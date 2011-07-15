<?php
/**
* @package modules.widget
*/
class TeamMemberInputWidgetModule extends WidgetModule {
		
  public function allTeamMembers() {
		$aTeamMembers = TeamMemberPeer::getTeamMembersByFunctionId();
		$aResult = array();
		foreach($aTeamMembers as $oTeamMember) {
      $aResult[$oTeamMember->getId()] = $oTeamMember->getFullNameInverted();
		}
		return $aResult;
	}
	
	public function getElementType() {
		return 'select';
	}
}