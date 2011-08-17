<?php
class TeamMemberFilterModule extends FilterModule {
	
	const TEAM_MEMBER_ITEM_TYPE = 'team_member';
	const TEAM_REQUEST_KEY = 'team';
	const TEAM_FUNCTION_GROUP_ID_SEPARATOR = '-';
	
	public function onNavigationItemChildrenRequested(NavigationItem $oNavigationItem) {
		$sPattern = '/^'.self::TEAM_REQUEST_KEY.'('.self::TEAM_FUNCTION_GROUP_ID_SEPARATOR.'\d+)?$/';
		if(!($oNavigationItem instanceof PageNavigationItem 
			&& preg_match($sPattern, $oNavigationItem->getIdentifier()) > 0)) {
			return;
		}
		$oCriteria = TeamMemberQuery::create()->distinct();
		$oCriteria->clearSelectColumns()->addSelectColumn(TeamMemberPeer::SLUG)->addSelectColumn(TeamMemberPeer::LAST_NAME)->addSelectColumn(TeamMemberPeer::FIRST_NAME);
		$oCriteria->excludeInactive()->orderBySlug();	
		$aIds = explode(self::TEAM_FUNCTION_GROUP_ID_SEPARATOR, $oNavigationItem->getIdentifier());
		if(count($aIds) === 2) {
			$oCriteria->filterByTeamMemberFunctionGroup((int) $aIds[1]);
		}
		foreach(TeamMemberPeer::doSelectStmt($oCriteria)->fetchAll(PDO::FETCH_CLASS) as $aParams) {
			$oNavItem = new HiddenVirtualNavigationItem(self::TEAM_MEMBER_ITEM_TYPE, $aParams->SLUG, $aParams->LAST_NAME.' '.$aParams->FIRST_NAME , null, null);
			$oNavigationItem->addChild($oNavItem);
		}
	}

	public function onPageHasBeenSet($oPage, $bIsNotFound, $oNavigationItem) {
		if($bIsNotFound || !($oNavigationItem instanceof VirtualNavigationItem) || $oNavigationItem->getType() !== self::TEAM_MEMBER_ITEM_TYPE) {
				return;
		}
		if($oNavigationItem instanceof VirtualNavigationItem && $oNavigationItem->getType() === self::TEAM_MEMBER_ITEM_TYPE) {
			$aParams = $oNavigationItem->getName();
			TeamMembersFrontendModule::$TEAM_MEMBER = TeamMemberQuery::create()->filterBySlug($aParams)->findOne();
		}
	}	
}