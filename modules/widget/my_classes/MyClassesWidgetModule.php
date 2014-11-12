<?php

class MyClassesWidgetModule extends PersistentWidgetModule {

	private $oTeamMember;

	public function __construct() {
		$oUser = Session::getSession()->getUser();
		if($oUser) {
			$this->oTeamMember = TeamMemberQuery::create()->filterByUserId($oUser->getId())->findOne();
		}
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
		foreach($oQuery->find() as $oClassTeacher) {
			$aClassInfo = array();
			$aClassInfo['Name'] = $oClassTeacher->getSchoolClass()->getName();
			$aClassInfo['Year'] = $oClassTeacher->getSchoolClass()->getYear();
			$aClassInfo['IsCurrent'] = $oClassTeacher->getSchoolClass()->IsCurrent();
			$aClassInfo['ClassType'] = $oClassTeacher->getSchoolClass()->getClassType();
			$aClassInfo['Id'] = $oClassTeacher->getSchoolClassId();
			$aClassInfo['Amount'] = $oClassTeacher->getSchoolClass()->getCountStudents();
			$aClassInfo['Events'] = $oClassTeacher->getSchoolClass()->countEvents();
			$aClassInfo['News'] = $oClassTeacher->getSchoolClass()->countNews();
			$aClassInfo['Documents'] = ' ('.$oClassTeacher->getSchoolClass()->countClassDocuments().')';
			$aClassInfo['Links'] = $oClassTeacher->getSchoolClass()->countClassLinks();
			$aClassInfo['ClassSchedule'] = $oClassTeacher->getSchoolClass()->getHasClassSchedule();
			$aClassInfo['WeekSchedule'] = $oClassTeacher->getSchoolClass()->getHasWeekSchedule();
			$aClassInfo['ClassPortrait'] = $oClassTeacher->getSchoolClass()->getHasClassPortrait();

			$aClassInfo['ClassLink'] = LinkUtil::link($oClassTeacher->getSchoolClass()->getLink($oClassesPage), 'FrontendManager');
			$aResult[] = $aClassInfo;
		}
		return $aResult;
	}
}