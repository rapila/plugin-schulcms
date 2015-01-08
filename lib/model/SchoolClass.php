<?php

/**
 * @package		 propel.generator.model
 */
class SchoolClass extends BaseSchoolClass {

	private static $CLASS_PAGE;

	const CLASS_EVENTS_IDENTIFIER = 'events';
	const CLASS_LINKS_IDENTIFIER = 'links';
	const CLASS_DOCUMENTS_IDENTIFIER = 'documents';
	const CLASS_SUBJECTS_IDENTIFIER = 'subjects';
	const CLASS_LOCATION_IDENTIFIER = 'location';

	public function getClassTeachersOrdered($bIsClassTeacher = true) {
		$oCriteria = new Criteria();
		$oCriteria->add(ClassTeacherPeer::IS_CLASS_TEACHER, $bIsClassTeacher);
		$oCriteria->addAscendingOrderByColumn(ClassTeacherPeer::SORT_ORDER);
		$oCriteria->addAscendingOrderByColumn(TeamMemberPeer::LAST_NAME);
		return $this->getClassTeachersJoinTeamMember($oCriteria);
	}

	public function getClassName() {
		if($this->getSubject()) {
			return $this->getName(). ' ('.$this->getSubject()->getName().')';
		}
		return $this->getName();
	}

	public function hasClassTeachers($bIsClassTeacher = true) {
		return count($this->getClassTeachersOrdered($bIsClassTeacher)) > 0;
	}

	public function getClassTeacherNames($bIsClassTeacher = true) {
		$aResult = array();
		foreach($this->getClassTeachersOrdered($bIsClassTeacher) as $oClassTeacher) {
			$aResult[] = $oClassTeacher->getTeamMember()->getFullNameShort();
		}
		return implode(', ', $aResult);
	}

	/**
	* @deprecated use string getClassType()
	*/
	public function getClassTypeName() {
		return $this->getClassType();
	}

	public function getFullClassName() {
		return $this->getClassType().' '.$this->getUnitName();
	}

	public function getHasClassPortrait() {
		return $this->getDocumentRelatedByClassPortraitId() != null;
	}

	public function getHasClassSchedule() {
		return $this->getDocumentRelatedByClassScheduleId() != null;
	}

	public function getHasWeekSchedule() {
		return $this->getDocumentRelatedByWeekScheduleId() != null;
	}

	public function getYearPeriod() {
		return SchoolPeer::getPeriodFromYear($this->getYear());
	}

	public function getLink($oClassesPage = null) {
		if($oClassesPage === null && self::$CLASS_PAGE === null) {
			self::$CLASS_PAGE = PageQuery::create()->filterByPageType('classes')->findOne();
		} else {
			self::$CLASS_PAGE = $oClassesPage;
		}
		$aParams = array($this->getSlug());
		if(!$this->isCurrent()) {
			array_push($aParams, $this->getYear());
		}
		return array_merge(self::$CLASS_PAGE->getFullPathArray(), $aParams);
	}

	public function getLinkToClassSchedule() {
		if($this->getDocumentRelatedByClassScheduleId()) {
			return array("✓", $this->getDocumentRelatedByClassScheduleId()->getDisplayUrl());
		} else {
			return null;
		}
	}

	public function countStudentsByUnitName() {
		return ClassStudentQuery::create()->filterByUnitFromClass($this)->count();
	}

	public function getStudentsByUnitName() {
		return ClassStudentQuery::create()->filterByUnitFromClass($this)->find();
	}

	public function countTeachersByUnitName($bClassTeachersOnly = false) {
		return ClassTeacherQuery::create()->filterByUnitFromClass($this)->count();
	}

	public function getTeachersByUnitName($bClassTeachersOnly = false, $iLimit=null) {
		$oQuery = ClassTeacherQuery::create()->filterByUnitFromClass($this, $bClassTeachersOnly);
		if($iLimit !== null) {
			$oQuery->limit($iLimit);
		}
		return $oQuery->find();
	}

	public function getCountStudents() {
		$iCount = $this->countClassStudents();
		if($iCount === 0) {
			return '-';
		}
		return $iCount;
	}

	public function getCountEvents() {
		$iCount = $this->countEvents();
		if($iCount === 0) {
			return '-';
		}
		return $iCount;
	}

	public function getCountLinks() {
		$iCount = $this->countClassLinks();
		if($iCount === 0) {
			return '-';
		}
		return $iCount;
	}

	public function countNews() {
		return $this->countNewss();
	}

	public function getCurrentNewsHeadline() {
		$sHeadline = FrontendNewsQuery::create()->current()->filterBySchoolClassId($this->getId())->select('Headline')->orderByDateStart('desc')->findOne();
		if($sHeadline) {
			return $sHeadline;
		}
		return 'Standard';
	}

	public function isClassEvent($iEventId) {
		$iEventId = (int) $iEventId;
		foreach($this->getEvents() as $oEvent) {
			if($oEvent->getId() === $iEventId) {
				return true;
			}
		}
		return false;
	}

	public function isClassDocument($iDocumentId) {
		$iDocumentId = (int) $iDocumentId;
		foreach($this->getDocuments() as $oDocument) {
			if($oDocument->getId() === $iDocumentId) {
				return true;
			}
		}
		return false;
	}

	public function isCurrent() {
		return $this->getYear() === SchoolPeer::getCurrentYear();
	}

	public function isClassLink($iLinkId) {
		$iLinkId = (int) $iLinkId;
		foreach($this->getClassLinks() as $oClassLink) {
			if($oClassLink->getLinkId() === $iLinkId) {
				return true;
			}
		}
		return false;
	}

	public function getSubjectClasses() {
		return SchoolClassQuery::create()->useSchoolClassSubjectClassesRelatedBySubjectClassIdQuery()->filterBySchoolClassRelatedBySchoolClassId($this)->endUse()->orderByName()->find();
	}

	public function getSubjects() {
		return SubjectQuery::create()->useSchoolClassQuery()->useSchoolClassSubjectClassesRelatedBySubjectClassIdQuery()->filterBySchoolClassRelatedBySchoolClassId($this)->endUse()->endUse()->orderByName()->find();
	}

	public function getSubjectName() {
		if($this->getSubject()) {
			return $this->getSubject()->getName();
		}
		return null;
	}

	public function setUnitName($sName) {
		$this->setSlug(StringUtil::normalize(str_replace('-', '', $sName), '-', '-'));
		return parent::setUnitName($sName);
	}

	public function getTeachingUnitName($bTruncate = 15) {
		if($bTruncate !== null) {
			return StringUtil::truncate($this->getTeachingUnit(), $bTruncate);
		}
		return $this->getTeachingUnit();
	}

	public function getAncestorClass() {
		return $this->getSchoolClassRelatedByAncestorClassId();
	}

	public function preDelete(PropelPDO $con = null) {
		parent::preDelete($con);
		if($oDocument = $this->getDocumentRelatedByClassPortraitId()) {
			$oDocument->delete();
		}
		if($oDocument = $this->getDocumentRelatedByClassScheduleId()) {
			$oDocument->delete();
		}
		if($oDocument = $this->getDocumentRelatedByWeekScheduleId()) {
			$oDocument->delete();
		}
		return true;
	}
}