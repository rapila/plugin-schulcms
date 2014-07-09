<?php
/**
* @package modules.widget
*/
class TeamMemberInputWidgetModule extends WidgetModule {
		
  public function allTeamMembers($bOrderByFirstName = true) {
		$aResult = array();
		$oQuery = TeamMemberQuery::create()->filterByFunctionId();
		if($bOrderByFirstName) {
			$oQuery->orderByFirstName()->orderByLastName();
		} else {
			$oQuery->orderByLastName()->orderByFirstName();
		}
		foreach($oQuery->find() as $i => $oTeamMember) {
			$aResult[$i]['key'] = $oTeamMember->getId();
			$aResult[$i]['value'] = $oTeamMember->getFullName();
		}
		return $aResult;
	}
	
	public function getElementType() {
		return 'select';
	}
}