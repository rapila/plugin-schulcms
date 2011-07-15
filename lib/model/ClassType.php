<?php

/**
 * @package    propel.generator.model
 */
class ClassType extends BaseClassType {

	public function setOriginalName($sNewName) {
		$this->setNameNormalized(StringUtil::normalize($sNewName));
		return parent::setOriginalName($sNewName);
	}
	
	public function getName() {
	  return $this->getOriginalName();
	}
	
  // public function countSchoolClasss(Criteria $oCriteria = null, $bDistinct = true, PropelPDO $oConn = null) {
  //     // $oQuery = ClassTypeQuery::create()->joinSchoolClass(null, Criteria::INNER_JOIN)->joinClassStudent();
  //   $oCriteria = new Criteria();
  //     $oCriteria->addJoin(ClassTypePeer::ID, SchoolClassPeer::CLASS_TYPE_ID, Criteria::INNER_JOIN);
  //     $oCriteria->addJoin(SchoolClassPeer::ID, ClassStudentPeer::SCHOOL_CLASS_ID, Criteria::INNER_JOIN);
  //   return parent::countSchoolClasss($oCriteria, $bDistinct, $oConn);
  // }

}

