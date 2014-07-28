<?php

/**
 * @package    propel.generator.model
 */
class FunctionGroup extends BaseFunctionGroup {

	public function setOriginalName($sNewName) {
		$this->setSlug(StringUtil::normalize(str_replace('-', '', $sNewName), '-', '-'));
		return parent::setOriginalName($sNewName);
	}
}

