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

	public function listClasses($bOnlyMainClasses = true) {
		$aResult = array();
		if(!$this->oTeamMember) {
			return $aResult;
		}
		$oQuery = ClassTeacherQuery::create()->joinSchoolClass()->useSchoolClassQuery()->orderByYear(Criteria::DESC)->orderByUnitName()->endUse()->filterByTeamMemberId($this->oTeamMember->getId());
		$oClassesPage = PageQuery::create()->filterByPageType('classes')->findOne();
		if($bOnlyMainClasses) {
			$oQuery->filterByIsClassTeacher(true);
		}
		foreach($oQuery->find() as $i => $oClassTeacher) {
			$oClass = $oClassTeacher->getSchoolClass();
			$aClassInfo = array();
			$aClassInfo['Name'] = $oClass->getName();
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

			$aClassInfo['ClassLink'] = LinkUtil::link($oClass->getLink($oClassesPage), 'FrontendManager');
			$aResult[$i] = $aClassInfo;
		}
		return $aResult;
	}
}