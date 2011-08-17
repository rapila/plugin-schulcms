<?php

/**
 * @package    propel.generator.model
 */
class FunctionGroup extends BaseFunctionGroup {

	public function setOriginalName($sNewName) {
		$this->setNameNormalized(StringUtil::normalize($sNewName));
		return parent::setOriginalName($sNewName);
	}
}

