<?php

/**
 * @package    propel.generator.model
 */
class NewsPeer extends BaseNewsPeer
{
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
		}
		return false;
	}

}
