<?php
require_once PLUGINS_DIR.'/schulcms/modules/page_type/team_members/TeamMemberNavigationItem.php';

class TeamMembersFilterModule extends FilterModule {

	public function onNavigationItemChildrenRequested($oNavigationItem) {
		if($oNavigationItem instanceof PageNavigationItem && $oNavigationItem->getMe()->getPageType() === 'team_members') {
			$oPageType = PageTypeModule::getModuleInstance($oNavigationItem->getMe()->getPageType(), $oNavigationItem->getMe(), $oNavigationItem);
			foreach($oPageType->listQuery()->select(array('Slug', 'FirstName', 'LastName'))->find() as $aData) {
				$oNavigationItem->addChild(new TeamMemberNavigationItem($aData['Slug'], $aData['LastName'].', '.$aData['FirstName']));
			}
		}
	}

	public function onPageHasBeenSet($oCurrentPage, $bIsNotFound, $oNavigationItem) {
		if(!($oNavigationItem instanceof TeamMemberNavigationItem)) {
			return;
		}
	}

}