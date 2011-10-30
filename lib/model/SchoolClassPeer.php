<?php


/**
 * @package		 propel.generator.model
 */
class SchoolClassPeer extends BaseSchoolClassPeer {

	public static function addSearchToCriteria($sSearch, $oCriteria) {
		$oSearchCriterion = $oCriteria->getNewCriterion(SchoolClassPeer::NAME, "%$sSearch%", Criteria::LIKE);
		$oSearchCriterion->addOr($oCriteria->getNewCriterion(SchoolClassPeer::YEAR, "%$sSearch%", Criteria::LIKE));
		$oCriteria->add($oSearchCriterion);
	}
	
	public static function getClassesStatistics() {
	  $aResult = array();
	  foreach(ClassTypePeer::getClassTypes() as $oClassType) {
	    if($oClassType->countSchoolClasss() === 0) {
	      continue;
	    }
	    $aResult[$oClassType->getName()] = $oClassType->countSchoolClasss();
	  }
	  return $aResult;
	}
	
	public static function countActiveSchoolUnitsBySchool($oSchool = null, $iClassTypeId = null) {
		return self::doCount(self::getSchoolUnitsBySchoolCriteria($oSchool, $iClassTypeId));
	}
	
	public static function getSchoolUnitsBySchool($oSchool = null, $iClassTypeId = null) {
		$oCriteria = self::getSchoolUnitsBySchoolCriteria($oSchool, $iClassTypeId);
		$oCriteria->addAscendingOrderByColumn(SchoolClassPeer::UNIT_NAME);
		return self::doSelect($oCriteria);
	}
	
	public static function excludeClassTypeCriteria($oCriteria) {
    $mExcludeClassTypes = Settings::getSetting("school_settings", 'exclude_class_types', null);
    if($mExcludeClassTypes !== null) {
		  $ExcludeClassTypes = is_array($mExcludeClassTypes) ? $mExcludeClassTypes : array($mExcludeClassTypes);
		  $oCriteria->add(SchoolClassPeer::CLASS_TYPE_ID, $ExcludeClassTypes, Criteria::NOT_IN);
		}
	}
	
	public static function getSchoolUnitsBySchoolCriteria($oSchool = null, $iClassTypeId = null) {
		if($oSchool === null) {
			$oSchool = SchoolPeer::getSchool();
		}
		if($oSchool === null) {
			throw new Exception(__METHOD__.' valid school object required. Please check ***REMOVED*** configuration or ***REMOVED***Sync');
		}
		$oCriteria = new Criteria();
    $oCriteria->setDistinct();
    self::excludeClassTypeCriteria($oCriteria);
		$oCriteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, Criteria::INNER_JOIN);
		$oCriteria->addJoin(SchoolClassPeer::ID, ClassStudentPeer::SCHOOL_CLASS_ID, Criteria::INNER_JOIN);
		$oCriteria->add(SchoolClassPeer::YEAR, $oSchool->getCurrentYear());
		$oCriteria->add(SchoolClassPeer::SCHOOL_ID, $oSchool->getId());
		if($iClassTypeId) {
			$oCriteria->add(SchoolClassPeer::CLASS_TYPE_ID, $iClassTypeId);
		}
		$oCriteria->addGroupByColumn(SchoolClassPeer::UNIT_NAME);
		return $oCriteria;
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
				if($oClassTeacher->getSchoolClassId() === $mObject->getId()) {
					return true;
				}
			}
		}
		return false;
	}
}

