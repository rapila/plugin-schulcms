<?php
class TeamMembersFilterModule extends FilterModule {

	public function onNavigationItemChildrenRequested($oNavigationItem) {
		if(!($oNavigationItem instanceof PageNavigationItem && $oNavigationItem->getType() === 'team_members')) {
			return;
		}
		$oPageType = PageTypeModule::getModuleInstance($oNavigationItem->getMe()->getPageType(), $oNavigationItem->getMe(), $oNavigationItem);
		foreach($oPageType->listQuery()->select(array('Slug', 'FirstName', 'LastName'))->find() as $aData) {
			$oNavigationItem->addChild(new TeamMemberNavigationItem($aData['Slug'], $aData['LastName'].', '.$aData['FirstName']));
		}
	}

	public function onNavigationItemChildrenCacheDetectOutdated($oNavigationItem, $oCache, $aContainer) {
		if(!($oNavigationItem instanceof PageNavigationItem && $oNavigationItem->getType() === 'team_members')) {
			return;
		}
		$bIsOutdated = &$aContainer[0];
		if($bIsOutdated) {
			return;
		}
		$oPageType = PageTypeModule::getModuleInstance($oNavigationItem->getMe()->getPageType(), $oNavigationItem->getMe(), $oNavigationItem);
		$bIsOutdated = $oCache->isOlderThan($oPageType->listQuery());
	}

	public function onPageHasBeenSet($oCurrentPage, $bIsNotFound, $oNavigationItem) {
		// do nothing
	}

}