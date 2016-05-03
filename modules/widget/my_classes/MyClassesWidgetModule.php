<?php

class MyClassesWidgetModule extends PersistentWidgetModule {

	private $oTeamMember;

	public function __construct() {
		$oUser = Session::getSession()->getUser();
		if($oUser) {
			$this->oTeamMember = TeamMemberQuery::create()->filterByUserId($oUser->getId())->findOne();
		}
	}

	public function teacherName() {
		return $this->oTeamMember->getFullName();
	}

	public function listClasses($bHideSubjectClasses = false, $bHideOldClasses = true) {
		$aResult = array();
		if(!$this->oTeamMember) {
			return $aResult;
		}
		$oQuery = ClassTeacherQuery::create()->filterByTeamMemberId($this->oTeamMember->getId());

		// Use school class query from now on
		$oQuery = $oQuery->useSchoolClassQuery();

		$oQuery->orderByYear(Criteria::DESC)->orderByUnitName();
		if($bHideSubjectClasses) {
			$oQuery->excludeSubjectClasses();
		}
		if($bHideOldClasses) {
			$oQuery->filterBySchoolYear();
		}
		// End use
		$oQuery = $oQuery->endUse();

		// For legacy subjects (no subject classes)
		if($bHideSubjectClasses) {
			$oQuery->filterByIsClassTeacher(true);
		}

		foreach($oQuery->find() as $i => $oClassTeacher) {
			$oClass = $oClassTeacher->getSchoolClass();
			$aClassInfo = array();
			$aClassInfo['Name'] = $oClass->getClassName();
			$aClassInfo['Year'] = $oClass->getYear();
			$aClassInfo['IsCurrent'] = $oClass->IsCurrent();
			$aClassInfo['ClassType'] = $oClass->getClassType();
			$aClassInfo['Id'] = $oClassTeacher->getSchoolClassId();
			$aClassInfo['Amount'] = $oClass->getCountStudents();
			$aClassInfo['Events'] = $oClass->countEvents();
			$aClassInfo['News'] = $oClass->countNews();
			$aClassInfo['Documents'] = $oClass->countClassDocuments();
			$aClassInfo['Links'] = $oClass->countClassLinks();
			$aClassInfo['ClassSchedule'] = $oClass->getHasClassSchedule();
			$aClassInfo['WeekSchedule'] = $oClass->getHasWeekSchedule();
			$aClassInfo['ClassPortrait'] = $oClass->getHasClassPortrait();

			$aClassInfo['ClassLink'] = LinkUtil::link($oClass->getLink(), 'FrontendManager');
			$aResult[$i] = $aClassInfo;
		}
		return $aResult;
	}
}