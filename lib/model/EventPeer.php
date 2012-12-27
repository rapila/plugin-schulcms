<?php


/**
 * @package		 propel.generator.model
 */
class EventPeer extends BaseEventPeer {
	
	public static function addSearchToCriteria($sSearch, $oCriteria) {
		$oSearchCriterion = $oCriteria->getNewCriterion(self::TITLE, "%$sSearch%", Criteria::LIKE);
		$oSearchCriterion->addOr($oCriteria->getNewCriterion(self::TEASER, "%$sSearch%", Criteria::LIKE));
		$oSearchCriterion->addOr($oCriteria->getNewCriterion(self::BODY_PREVIEW, "%$sSearch%", Criteria::LIKE));
		$oSearchCriterion->addOr($oCriteria->getNewCriterion(self::BODY_REVIEW, "%$sSearch%", Criteria::LIKE));
		$oCriteria->add($oSearchCriterion);
	}
	
	/**
	* @deprecated use EventQuery::findYearsByEventTypeId();
	*/
	public static function getYears($iEventType = null) {
		$oQuery = FrontendEventQuery::create()->distinct()->withColumn('YEAR(' . self::DATE_START . ')', 'Year');
		if(is_numeric($iEventType)) {
			$oQuery->filterByEventTypeId($iEventType);
		}
		return $oQuery->orderBy('Year')->select(array('Year'))->find()->toArray();
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
