<?php
/**
* @package modules.widget
*/
class TeamMemberInputWidgetModule extends WidgetModule {
		
  public function allTeamMembers() {
		$aResult = array();
		foreach(TeamMemberQuery::create()->filterByFunctionId()->find() as $oTeamMember) {
      $aResult[$oTeamMember->getId()] = $oTeamMember->getFullNameInverted();
		}
		return $aResult;
	}
	
	public function getElementType() {
		return 'select';
	}
}