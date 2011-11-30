<?php


/**
 * @package		 propel.generator.model
 */
class EventPeer extends BaseEventPeer {
	
	public static function addSearchToCriteria($sSearch, $oCriteria) {
		$oSearchCriterion = $oCriteria->getNewCriterion(self::TITLE, "%$sSearch%", Criteria::LIKE);
		$oSearchCriterion->addOr($oCriteria->getNewCriterion(self::TEASER, "%$sSearch%", Criteria::LIKE));
		$oCriteria->add($oSearchCriterion);
	}
	
	public static function getYears($iEventType = null) {
		$oCriteria = new Criteria();
		$oCriteria->clearSelectColumns()->clearOrderByColumns()->clearGroupByColumns();
		$oCriteria->setDistinct();
		if(is_numeric($iEventType)) {
			$oCriteria->add(self::EVENT_TYPE_ID, $iEventType);
		}
		$oCriteria->addSelectColumn('YEAR(' . self::DATE_START . ') AS Year');
		$oCriteria->addAscendingOrderByColumn('year');
		$aYears = array();
		foreach(self::doSelectStmt($oCriteria)->fetchAll(PDO::FETCH_CLASS) as $aParams) {
			$aYears[] = $aParams->Year;
		}
		return $aYears;
	}
	
	public static function mayOperateOn($oUser, $mObject, $sOperation) {
		// allow all users with module rights
		if(parent::mayOperateOn($oUser, $mObject, $sOperation)) {
			return true;
		}
		if($oUser === null) {
			return false;
		}
		// allow all users that are team members and class teachers to handle their own events
		$aTeamMembers = $oUser->getTeamMembersRelatedByUserId();
		if(isset($aTeamMembers[0])) {
			foreach($aTeamMembers[0]->getClassTeachersJoinSchoolClassesForPermissions(true) as $oClassTeacher) {
				if($oClassTeacher->getSchoolClass()->getId() === $mObject->getSchoolClassId()) {
					return true;
				}
			}

			// allow all users that are team members and service members to handle their own events
			foreach($aTeamMembers[0]->getServiceMembers() as $oServiceMember) {
				if($oServiceMember->getServiceId() === $mObject->getServiceId()) {
					if(ServicePeer::mayOperateOn($oUser, $mObject->getService(), $sOperation)) {
						return true;
					}
				}
			}
		}
		return false;
	}
}
