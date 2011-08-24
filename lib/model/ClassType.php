<?php

/**
 * @package		 propel.generator.model
 */
class ClassType extends BaseClassType {

	public function setOriginalName($sNewName) {
		$this->setNameNormalized(StringUtil::normalize($sNewName));
		return parent::setOriginalName($sNewName);
	}
	
	public function getName() {
		return $this->getOriginalName();
	}
	
	public function getClassCountCurrentYear() {
		return $this->getClassCount();
	}

	public function getClassCountOtherYears() {
		return $this->getClassCount(false);
	}
	
	private function getClassCount($bCurrentYear=true) {
		$oCriteria = new Criteria();
		$oCriteria->add(SchoolClassPeer::YEAR, SchoolPeer::getCurrentYear(), $bCurrentYear ? Criteria::EQUAL : Criteria::NOT_EQUAL);
		return parent::countSchoolClasss($oCriteria);
	}

}

