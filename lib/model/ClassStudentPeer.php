<?php


/**
 * @package		 propel.generator.model
 */
class ClassStudentPeer extends BaseClassStudentPeer {

	public static function countStudentsByUnitName($sUnitName = null) {
		return self::doCount(self::getStudentsByUnitNameCritieria($sUnitName));
	}
	
	private static function getStudentsByUnitNameCritieria($sUnitName) {
		$oCriteria = new Criteria();
		$oCriteria->setDistinct();
		$oCriteria->addJoin(self::SCHOOL_CLASS_ID, SchoolClassPeer::ID, Criteria::INNER_JOIN);
		if($sUnitName !== null) {
			$oCriteria->add(SchoolClassPeer::UNIT_NAME, $sUnitName);
		} else {
		  SchoolClassPeer::excludeClassTypeCriteria($oCriteria);
		}
		return $oCriteria->add(SchoolClassPeer::YEAR, SchoolPeer::getSchool()->getCurrentYear());
	}
	
	public static function getStudentsByUnitName() {
		return self::doSelect(self::getStudentsByUnitNameCritieria($sUnitName));
	}
}

