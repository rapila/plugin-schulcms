<?php


/**
 * @package    propel.generator.model
 */
class ClassStudentPeer extends BaseClassStudentPeer {

  public static function countStudents($sClassType = null) {
    $oCriteria = new Criteria();
    $oCriteria->setDistinct();
    return self::doCount($oCriteria);
  }
}

