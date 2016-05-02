<?php

/**
 * @package    propel.generator.model
 */
class Subject extends BaseSubject
{
	private static $SUBJECT_PAGE;

	public function setName($sName) {
		$this->setSlug(StringUtil::normalizePath($sName));
		return parent::setName($sName);
	}

	public function getSchoolClasses() {
		return $this->getSchoolClassesQuery()->find();
	}

	public function countSchoolClasses() {
		return $this->getSchoolClassesQuery()->count();
	}

	private function getSchoolClassesQuery() {
		return SchoolClassQuery::create()->filterBySubjectId($this->getId())->hasStudents();
	}
}
