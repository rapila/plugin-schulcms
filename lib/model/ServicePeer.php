<?php

/**
 * @package    propel.generator.model
 */
class ServicePeer extends BaseServicePeer {

	public static function addSearchToCriteria($sSearch, $oCriteria) {
		$oSearchCriterion = $oCriteria->getNewCriterion(self::NAME, "%$sSearch%", Criteria::LIKE);
		$oSearchCriterion->addOr($oCriteria->getNewCriterion(self::TEASER, "%$sSearch%", Criteria::LIKE));
		$oSearchCriterion->addOr($oCriteria->getNewCriterion(self::ADDRESS, "%$sSearch%", Criteria::LIKE));
		$oCriteria->add($oSearchCriterion);
	}
	
	public static function mayOperateOn($oUser, $mObject, $sOperation) {
		// allow all users with module rights
		if(parent::mayOperateOn($oUser, $mObject, $sOperation)) {
			return true;
		}
		if($oUser === null) {
			return false;
		}
		// allow all users that are team members and employee of Service
		// meaning services have to be created by users with admin rights and can then be delegated to service member
		$aTeamMembers = $oUser->getTeamMembersRelatedByUserId();
		if(isset($aTeamMembers[0])) {
			foreach($aTeamMembers[0]->getServiceMembers() as $oServiceMember) {
				if($oServiceMember->getServiceId() === $mObject->getId()) {
					return true;
				}
			}
		}
		return false;
	}
}
