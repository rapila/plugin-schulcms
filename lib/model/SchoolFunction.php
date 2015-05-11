<?php

/**
 * @package    propel.generator.model
 */
class SchoolFunction extends BaseSchoolFunction {

	public function getFunctionGroupName() {
		if($this->getFunctionGroup()) {
			return $this->getFunctionGroup()->getName();
		}
	}

}

