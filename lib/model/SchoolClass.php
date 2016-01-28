<?php

/**
 * @package		 propel.generator.model
 */
class SchoolClass extends BaseSchoolClass {

	private static $CLASS_PAGE;
	private static $SUBJECT_CLASS_PAGE;

	public function getClassTeachersOrdered($bIsClassTeacher = true) {
		$oCriteria = new Criteria();
		$oCriteria->add(ClassTeacherPeer::IS_CLASS_TEACHER, $bIsClassTeacher);
		$oCriteria->addAscendingOrderByColumn(ClassTeacherPeer::SORT_ORDER);
		$oCriteria->addAscendingOrderByColumn(TeamMemberPeer::LAST_NAME);
		return $this->getClassTeachersJoinTeamMember($oCriteria);
	}

	public function getClassName() {
		if($this->getSubject()) {
			return $this->getSubjectClassName(false);
		}
		return $this->getUnitName();
	}

	public function getClassNameWithYear($bOmitCurrentYear = false) {
		return $this->getClassName() . ($bOmitCurrentYear && $this->isCurrent() ? '' : ' ('.$this->getYear().')');
	}

	public function getFullClassNameWithYear($bOmitCurrentYear = false) {
		return $this->getFullClassName() . ($bOmitCurrentYear && $this->isCurrent() ? '' : ' ('.$this->getYear().')');
	}

	public function getSubjectClassName($bFrontend = true) {
		if($bFrontend) {
			$this->getSubject()->getName(). ' '	. $this->getName();
		}
		return $this->getName(). ' ('.$this->getSubject()->getName().')';
	}
	
	public function isSubjectClass() {
		return $this->getSubject() !== null;
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
		if($this->getClassType() === "Kindergarten") {
			return $this->getUnitName();
		}
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
		if($oClassesPage === null) {
			if(self::$CLASS_PAGE === null) {
				self::$CLASS_PAGE = PageQuery::create()->filterByPageType('classes')->findOne();
			}
			$oClassesPage = self::$CLASS_PAGE;
		}
		if(!$oClassesPage) {
			return null;
		}
		$aParams = array();
		if($this->getSubjectId() != null) {
			array_push($aParams, $this->getSubject()->getSlug());
		}
		array_push($aParams, $this->getSlug());
		if(!$this->isCurrent()) {
			array_push($aParams, $this->getYear());
		}
		return array_merge($oClassesPage->getFullPathArray(), $aParams);
	}

	public function getSubjectClassLink() {
		if(self::$SUBJECT_CLASS_PAGE === null) {
			self::$SUBJECT_CLASS_PAGE = PageQuery::create()->filterByPageType('classes')->filterByIdentifier('subjects')->findOne();
		}
		return $this->getLink(self::$SUBJECT_CLASS_PAGE);
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

	public function getIsFeVisible() {
		$iStudents = $this->countClassStudents();
		$iClassTeachers = $this->getCountTeachers(true);
		return $iStudents. 'S / '.$iClassTeachers.'KL '. (($iStudents > 0 && $iClassTeachers > 0) ? '✓' : '-');
	}

	public function getCountStudents() {
		$iCount = $this->countClassStudents();
		if($iCount === 0) {
			return '-';
		}
		return $iCount;
	}

	public function getCountTeachers($bClassTeachersOnly = false) {
		return ClassTeacherQuery::create()->filterByUnitFromClass($this, $bClassTeachersOnly)->count();
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

	public function getCountDocuments() {
		$iCount = $this->countClassDocuments();
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

	public function getClassLinksOrdered() {
		return LinkQuery::create()->useClassLinkQuery()->filterBySchoolClassId($this->getId())->endUse()->orderBySort()->find();
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
		$this->setSlug(StringUtil::normalizePath($sName));
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

	public function getLinkedClassIds() {
		$aIds = array();
		// Search forwards
		$iId = $this->getId();
		while($iId != null) {
			$aIds[] = $iId;
			$iId = SchoolClassQuery::create()->filterByAncestorClassId($iId)->select('Id')->findOne();
		}
		// Search backwards
		$iId = $this->getId();
		while($iId != null) {
			$aIds[] = $iId;
			$iId = SchoolClassQuery::create()->filterById($iId)->select('AncestorClassId')->findOne();
		}
		return array_unique($aIds, SORT_NUMERIC);
	}

	public function latestUpdatedLink($bObject = false) {
		$oQuery = LinkQuery::create()->useClassLinkQuery()->filterBySchoolClassId($this->getId())->endUse()->orderByUpdatedAt('desc');
		if($bObject) {
			return $oQuery->findOne();
		}
		return $oQuery->select('UpdatedAt')->findOne();
	}

	public function latestUpdatedDocument($bObject = false) {
		$oQuery = DocumentQuery::create()->useClassDocumentQuery()->filterBySchoolClassId($this->getId())->endUse()->orderByUpdatedAt('desc');
		if($bObject) {
			return $oQuery->findOne();
		}
		return $oQuery->select('UpdatedAt')->findOne();
	}

	public function latestUpdatedEvent($bObject = false) {
		$oQuery = EventQuery::create()->filterBySchoolClassId($this->getId())->orderByUpdatedAt('desc');
		if($bObject) {
			return $oQuery->findOne();
		}
		return $oQuery->select('UpdatedAt')->findOne();
	}

	public function latestUpdatedNews($bObject = false) {
		$oQuery = NewsQuery::create()->filterBySchoolClassId($this->getId())->orderByUpdatedAt('desc');
		if($bObject) {
			return $oQuery->findOne();
		}
		return $oQuery->select('UpdatedAt')->findOne();
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
