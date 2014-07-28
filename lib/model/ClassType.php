<?php

/**
 * @package		 propel.generator.model
 */
class ClassType extends BaseClassType {

	public function setOriginalName($sNewName) {
		$this->setSlug(StringUtil::normalize(str_replace('-', '', $sNewName), '-', '-'));
		return parent::setOriginalName($sNewName);
	}

	public function getName() {
		return $this->getOriginalName();
	}

	private function getClassCount($bCurrentYear=true) {
		$oCriteria = new Criteria();
		$oCriteria->add(SchoolClassPeer::YEAR, SchoolPeer::getCurrentYear(), $bCurrentYear ? Criteria::EQUAL : Criteria::NOT_EQUAL);
		return $this->countSchoolClasss($oCriteria);
	}

}

