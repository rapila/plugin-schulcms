<?php

/**
 * @package    propel.generator.model
 */
class Subject extends BaseSubject
{
	private static $SUBJECT_PAGE;

	public function setName($sName) {
		$this->setSlug(StringUtil::normalize(str_replace('-', '', $sName), '-', '-'));
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
		return SchoolClassQuery::create()->filterBySubjectId($this->getId())->hasTeachers()->find();
	}
}
