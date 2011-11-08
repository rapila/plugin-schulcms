<?php

class MyClassesWidgetModule extends PersistentWidgetModule {
	
	private $oTeamMember;
	
	public function __construct() {
		$oUser = Session::getSession()->getUser();
		if($oUser) {
			$this->oTeamMember = TeamMemberQuery::create()->filterByUserId($oUser->getId())->findOne();
		}
	}
	
	public function listClasses($aSettings) {
		$aResult = array();
		if(!$this->oTeamMember) {
			return $aResult;
		}
		$oQuery = ClassTeacherQuery::create()->joinSchoolClass()->useSchoolClassQuery()->orderByYear(Criteria::DESC)->orderByUnitName()->endUse()->filterByTeamMemberId($this->oTeamMember->getId());
		$oClassesPage = PageQuery::create()->filterByIdentifier(SchoolPeer::PAGE_IDENTIFIER_CLASSES)->findOne();
		
		$oQuery->filterByIsClassTeacher(true);
		foreach($oQuery->find() as $oClassTeacher) {
			$aClassInfo = array();
			$aClassInfo['Name']		 = $oClassTeacher->getSchoolClass()->getName();
			$aClassInfo['Year']		 = $oClassTeacher->getSchoolClass()->getYear();
			$aClassInfo['IsCurrent']	= $oClassTeacher->getSchoolClass()->IsCurrent();
			$aClassInfo['Type']		 = $oClassTeacher->getSchoolClass()->getClassType()->getName();
			$aClassInfo['Id']			 = $oClassTeacher->getSchoolClassId();
			$aClassInfo['Amount']	 = $oClassTeacher->getSchoolClass()->getCountStudents();
			$aClassInfo['Events']	 = $oClassTeacher->getSchoolClass()->countEvents();
			$aClassInfo['Links']	= $oClassTeacher->getSchoolClass()->countClassLinks();
			$aClassInfo['ClassSchedule']	= $oClassTeacher->getSchoolClass()->getHasClassSchedule();
			$aClassInfo['WeekSchedule']	 = $oClassTeacher->getSchoolClass()->getHasWeekSchedule();
			$aClassInfo['ClassPortrait']	= $oClassTeacher->getSchoolClass()->getHasClassPortrait();
			
			$aClassInfo['ClassLink']	= LinkUtil::link($oClassTeacher->getSchoolClass()->getClassLink($oClassesPage), 'FrontendManager');
			$aResult[] = $aClassInfo;
		}
		return $aResult;
	}
}