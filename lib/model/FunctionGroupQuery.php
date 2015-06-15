<?php

/**
 * @package    propel.generator.model
 */
class FunctionGroupQuery extends BaseFunctionGroupQuery {

	public function filterByValue($mValue) {
		if(is_array($mValue) || is_numeric($mValue)) {
			$this->filterById($mValue);
		} else {
			$this->filterBySlug($mValue);
		}
		return $this;
	}
}

