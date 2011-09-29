<?php
class TeamMemberFilterModule extends FilterModule {
	
	const TEAM_MEMBER_ITEM_TYPE = 'team_member';
	const TEAM_REQUEST_KEY = 'team';
	const TEAM_FUNCTION_GROUP_ID_SEPARATOR = '-';
	
	public function onNavigationItemChildrenRequested(NavigationItem $oNavigationItem) {
		if(!($oNavigationItem instanceof PageNavigationItem 
		   && (StringUtil::startsWith($oNavigationItem->getIdentifier(), self::TEAM_REQUEST_KEY.self::TEAM_FUNCTION_GROUP_ID_SEPARATOR) || $oNavigationItem->getIdentifier() === self::TEAM_REQUEST_KEY))) {
			return;
		}
		
		$oObject = LanguageObjectQuery::create()->filterByLanguageId(Session::language())->joinContentObject()->useQuery('ContentObject')->filterByPageId($oNavigationItem->getMe()->getId())->filterByContainerName('content')->filterByObjectType('team_members')->endUse()->findOne();
		if(!$oObject) {
			return;
		}
		$oModule = new TeamMembersFrontendModule($oObject);
		$aOptions = $oModule->widgetData();
		$oModule->aFunctionGroupIds = @$aOptions[TeamMembersFrontendModule::GROUPS_SELECT_KEY];
		$oCriteria = $oModule->listQuery();
		$oCriteria->clearSelectColumns()
			->addSelectColumn(TeamMemberPeer::SLUG)
			->addSelectColumn(TeamMemberPeer::LAST_NAME)
			->addSelectColumn(TeamMemberPeer::FIRST_NAME);
		
		foreach(TeamMemberPeer::doSelectStmt($oCriteria)->fetchAll(PDO::FETCH_CLASS) as $aParams) {
			$oNavItem = new HiddenVirtualNavigationItem(self::TEAM_MEMBER_ITEM_TYPE, $aParams->SLUG, $aParams->LAST_NAME.', '.$aParams->FIRST_NAME, null, null);
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