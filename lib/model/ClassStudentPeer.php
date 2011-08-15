<?php


/**
 * @package		 propel.generator.model
 */
class ClassStudentPeer extends BaseClassStudentPeer {

	public static function countStudents($sUnitName = null) {
		$oCriteria = new Criteria();
		$oCriteria->setDistinct();
		$oCriteria->addJoin(self::SCHOOL_CLASS_ID, SchoolClassPeer::ID, Criteria::INNER_JOIN);
		if($sUnitName !== null) {
			$oCriteria->add(SchoolClassPeer::UNIT_NAME, $sUnitName);
		}
		$oCriteria->add(SchoolClassPeer::YEAR, SchoolPeer::getSchool()->getCurrentYear());
		return self::doCount($oCriteria);
		
	}
}

