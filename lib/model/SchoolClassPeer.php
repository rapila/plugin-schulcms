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
	
	public static function countActiveSchoolClassesBySchoolId($iSchoolId) {
		return self::doCount(self::getSchoolUnitsBySchoolIdCriteria($iSchoolId));
	}
	
	public static function getSchoolUnitsBySchoolId($iSchoolId = null) {
		$oCriteria = self::getSchoolUnitsBySchoolIdCriteria($iSchoolId);
		$oCriteria->addAscendingOrderByColumn(SchoolClassPeer::UNIT_NAME);
		return self::doSelect($oCriteria);
	}
	
	public static function getSchoolUnitsBySchoolIdCriteria($iSchoolId = null) {
		$iSchoolId = $iSchoolId === null ? SchoolPeer::getSchoolId() : $iSchoolId;
		$oSchool = SchoolQuery::create()->filterByOriginalId($iSchoolId)->findOne();
		$oCriteria = new Criteria();
		if($oSchool === null) {
			return $oCriteria;
		}
		$oCriteria->setDistinct();
		$oCriteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, Criteria::INNER_JOIN);
		$oCriteria->addJoin(SchoolClassPeer::ID, ClassStudentPeer::SCHOOL_CLASS_ID, Criteria::INNER_JOIN);
		$oCriteria->add(SchoolClassPeer::YEAR, $oSchool->getCurrentYear());
		$oCriteria->add(SchoolClassPeer::SCHOOL_ID, $oSchool->getId());
		$oCriteria->addGroupByColumn(SchoolClassPeer::UNIT_NAME);
		return $oCriteria;
	}

}

