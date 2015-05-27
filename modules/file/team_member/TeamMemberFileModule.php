<?php
class TeamMemberFileModule extends FileModule {
	public function __construct($aRequestPath) {
		parent::__construct($aRequestPath);
	}

	public function renderFile() {
		$oTeamMember = TeamMemberQuery::create()->filterByOriginalId(Manager::usePath())->findOne();
		$oSchoolFunction = null;
		$sFunctionGroupName = null;
		if($oTeamMember) {
			$oSchoolFunction = $oTeamMember->getFirstTeamMemberFunctionName(false);
			$sFunctionGroupName = $oSchoolFunction->getFunctionGroupName();
		}
		// Switch target page name or identifier
		switch($sFunctionGroupName) {
			case('Sekretariate'): $sPageName = 'sekretariat'; break;
			case('Fachlehrpersonen'):
			case('Lehrpersonen'):
			case('Fachpersonen'): $sPageName = 'lehrpersonen'; break;
			case('Schulleitung'): $sPageName = 'schulleitung'; break;
			case('Hauswartung'): $sPageName = 'hauswartung'; break;
			default: $sPageName = 'ueber-uns';
		}
		// Redirect any teaching person to their profile
		if($oTeamMember && $sPageName === 'lehrpersonen') {
			$oTargetPage = PageQuery::create()->filterByPageType('team_member')->findOne();
			if($oTargetPage) {
				self::redirectToTarget($oTeamMember->getLink($oTargetPage));
			}
		}
		// Redirect main functions to the related page
		if($oTeamMember && $sPageName !== null) {
			$oTargetPage = PageQuery::create()->filterByNameOrIdentifier($sPageName)->findOne();
			if($oTargetPage) {
				self::redirectToTarget($oTargetPage);
			}
		}
		// Redirect to home page
		$oRootPage = PageQuery::create()->findRoot();
		self::redirectToTarget($oRootPage->getLink());
	}

	private static function redirectToTarget($aParams) {
		LinkUtil::redirectToManager($aParams, 'FrontendManager');
	}
}
