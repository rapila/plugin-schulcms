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

	public function getLink($oSubjectPage = null) {
		if($oSubjectPage === null && self::$SUBJECT_PAGE === null) {
			self::$SUBJECT_PAGE = PageQuery::create()->filterByPageType('classes')->findOne();
		} elseif($oSubjectPage) {
			self::$SUBJECT_PAGE = $oSubjectPage;
		}
		if(!self::$SUBJECT_PAGE) {
			return null;
		}
		$aParams = array($this->getSlug());
		return array_merge(self::$SUBJECT_PAGE->getFullPathArray(), $aParams);
	}

	public function getSchoolClasses() {
		return $this->getSchoolClassesQuery()->find();
	}

	public function countSchoolClasses() {
		return $this->getSchoolClassesQuery()->count();
	}

	private function getSchoolClassesQuery() {
		return SchoolClassQuery::create()->filterBySubjectId($this->getId())->hasTeachers();
	}
}
