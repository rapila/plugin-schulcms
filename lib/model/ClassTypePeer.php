<?php


/**
 * @package    propel.generator.model
 */
class ClassTypePeer extends BaseClassTypePeer {

  public static function getClassTypes() {
    $oCriteria = new Criteria();
    $oCriteria->addJoin(ClassTypePeer::ID, SchoolClassPeer::CLASS_TYPE_ID, Criteria::INNER_JOIN);
    $oCriteria->addJoin(SchoolClassPeer::ID, ClassStudentPeer::SCHOOL_CLASS_ID, Criteria::INNER_JOIN);
    $oCriteria->addAscendingOrderByColumn(self::NAME);
    return self::doSelect($oCriteria);
  }
	

}
