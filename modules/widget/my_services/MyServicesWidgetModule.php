<?php

class MyServicesWidgetModule extends PersistentWidgetModule {

	private $oTeamMember;

	public function __construct() {
		$oUser = Session::getSession()->getUser();
		if($oUser) {
			$this->oTeamMember = TeamMemberQuery::create()->filterByUserId($oUser->getId())->findOne();
		}
	}

	public function listServices($aSettings) {
		$aResult = array();
		if(!$this->oTeamMember) {
			return $aResult;
		}
		$oQuery = ServiceMemberQuery::create()->joinService()->useServiceQuery()->orderByName()->endUse()->filterByTeamMemberId($this->oTeamMember->getId());
		$oServicesPage = PageQuery::create()->filterByPageType('services')->findOne();

		foreach($oQuery->find() as $oServiceMember) {
			$aServiceInfo = array();
			$oService = $oServiceMember->getService();
			$aServiceInfo['Id'] = $oServiceMember->getServiceId();
			$aServiceInfo['Name'] = $oService->getName();
			$aServiceInfo['CountDocuments']	= $oService->countServiceDocuments();
			$aServiceInfo['CountMembers']	= $oService->countServiceMembers();
			$aServiceInfo['HasLogo'] = $oService->getLogoId() != null;
			$aServiceInfo['Category']	= $oService->getServiceCategory()->getName();
			$aServiceInfo['ServiceLink'] = LinkUtil::link($oService->getLink($oServicesPage), 'FrontendManager');
			$aResult[] = $aServiceInfo;
		}
		return $aResult;
	}
}