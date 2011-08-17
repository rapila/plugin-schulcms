<?php

/**
 * @package    propel.generator.model
 */
class ClassTeacherPeer extends BaseClassTeacherPeer {
	
	public static function getClassTeachers($sUnitName, $bIsClassTeacher=true) {
		$oCriteria = new Criteria();
		$oCriteria->setDistinct();
		if($bIsClassTeacher) {
			$oCriteria->add(self::IS_CLASS_TEACHER, true);
		}
		$oCriteria->addJoin(self::SCHOOL_CLASS_ID, SchoolClassPeer::ID, Criteria::INNER_JOIN);
		if($sUnitName !== null) {
			$oCriteria->add(SchoolClassPeer::UNIT_NAME, $sUnitName);
		}
		$oCriteria->add(SchoolClassPeer::YEAR, SchoolPeer::getSchool()->getCurrentYear());
		return self::doSelect($oCriteria);
	}

}

