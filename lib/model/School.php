<?php

/**
 * @package    propel.generator.model
 */
class School extends BaseSchool {
	public function isSingleClassSchool() {
		return $this->countSchoolClasss(SchoolClassQuery::create()->filterByIsCurrent()) === 1;
	}
}

