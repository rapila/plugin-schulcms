<?php

/**
 * @package		 propel.generator.model
 */
class SchoolClass extends BaseSchoolClass {

	private static $CLASS_PAGE = false;
	private static $SUBJECT_CLASS_PAGE = false;

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
		if(!$this->getSubject()) {
			return $this->getName();
		}
		if($bFrontend) {
			// Don’t prepend subject name if already contained in name
			if(strpos($this->getSubject()->getName(), $this->getName()) !== false) {
				return $this->getName();
			}
			return $this->getSubject()->getName(). ' '	. $this->getName();
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
		if($this->getClassType() === "Kindergarten" || $this->getClassType() === "Musikschule") {
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

	/**
	* Gets the correct link to this class.
	* @param $oClassesPage Page Pass in the regular class page for caching. @deprecated
	* @return the link or null if there is no page for this class to appear on.
	*/
	public function getLink($oClassesPage = false) {
		if($this->isSubjectClass()) {
			return $this->getSubjectClassLink();
		}
		return $this->getNonSubjectClassLink($oClassesPage);
	}

	private function getLinkToPage($oClassesPage) {
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

	/**
	* @deprecated for public use, use getLink instead.
	*/
	public function getSubjectClassLink() {
		if(self::$SUBJECT_CLASS_PAGE === false) {
			$oQuery = PageQuery::create()->active()
				->filterByPageType('classes')
				->filterByPagePropertyValue('classes:class_type', 'subject');
			self::$SUBJECT_CLASS_PAGE = $oQuery->findOne();
		}
		if($this->countClassTeachers() === 0) {
			// Ignore subject classes without teachers, as there won’t be navigation items for these
			return null;
		}
		return $this->getLinkToPage(self::$SUBJECT_CLASS_PAGE);
	}

	private function getNonSubjectClassLink($oClassesPage = false) {
		if($oClassesPage === false) {
			if(self::$CLASS_PAGE === false) {
				$oQuery = PageQuery::create()->active()
					->filterByPageType('classes')
					->filterByPagePropertyValue('classes:class_type', 'standard');
				self::$CLASS_PAGE = $oQuery->findOne();
			}
			$oClassesPage = self::$CLASS_PAGE;
		}
		if(SchoolClassQuery::create()->distinct()->filterByDisplayConditionForNonSubjectClasses(null, null)->filterById($this->getId())->count() !== 1) {
			// This is a class that won’t be displayed by the page. Don’t return a link.
			return null;
		}
		return $this->getLinkToPage($oClassesPage);
	}

	public function getLinkToClassSchedule() {
		if($this->getDocumentRelatedByClassScheduleId()) {
			return array("✓", $this->getDocumentRelatedByClassScheduleId()->getDisplayUrl());
		} else {
			return null;
		}
	}

	public function countStudentsByUnitName() {
		return SchoolClassQuery::create()->filterByUnitFromClass($this)->studentCount();
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
		$iCount = max($this->countClassStudents(), $this->getStudentCount());
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

	public function getSuccessorClass() {
		$oQuery = SchoolClassQuery::create();
		if($this->isSubjectClass()) {
			$oQuery->filterByDisplayCondition(false, null);
		} else {
			$oQuery->filterByDisplayConditionForNonSubjectClasses(null, null);
		}
		return $oQuery->findOneByAncestorClassId($this->getId());
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
