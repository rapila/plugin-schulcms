<?php


/**
 * @package		 propel.generator.model
 */
class ClassStudentPeer extends BaseClassStudentPeer {

	public static function countStudents($sClassType = null) {
		$oCriteria = new Criteria();
		$oCriteria->addJoin(self::SCHOOL_CLASS_ID, SchoolClassPeer::ID, Criteria::INNER_JOIN);
		$oCriteria->add(SchoolClassPeer::YEAR, SchoolPeer::getSchool()->getCurrentYear());
		$oCriteria->setDistinct();
		return self::doCount($oCriteria);
	}
}

