<?php
require_once PLUGINS_DIR.'/schulcms/modules/page_type/team_members/TeamMemberNavigationItem.php';

class TeamMembersFilterModule extends FilterModule {

	public function onNavigationItemChildrenRequested($oNavigationItem) {
		if($oNavigationItem instanceof PageNavigationItem && $oNavigationItem->getMe()->getPageType() === 'team_members') {
			$oQuery = TeamMembersPageTypeModule::listQuery($oNavigationItem->getMe()->getPagePropertyValue('team_members:function_group_ids', null));
			foreach($oQuery->select('Slug', 'FirstName', 'LastName')->find() as $aData) {
				$oNavItem = new TeamMemberNavigationItem($sSlug, $aData['LastName'].', '.$aData['FirstName']);
				$oNavigationItem->addChild($oNavItem);
			}
		}
	}

	public function onPageHasBeenSet($oCurrentPage, $bIsNotFound, $oNavigationItem) {
		if(!($oNavigationItem instanceof TeamMemberNavigationItem)) {
			return;
		}
	}

}