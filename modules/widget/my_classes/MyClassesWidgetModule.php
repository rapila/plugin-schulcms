<?php

class MyClassesWidgetModule extends PersistentWidgetModule {
	
	private $oTeamMember;
	private static $CLASS_PAGE;
	
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
		$oQuery = ClassTeacherQuery::create()->joinSchoolClass()->filterByTeamMemberId($this->oTeamMember->getId());
		foreach($oQuery->filterByIsClassTeacher(true)->find() as $oClassTeacher) {
			$aClassInfo = array();
			$aClassInfo['Name']		 = $oClassTeacher->getSchoolClass()->getName();
			$aClassInfo['Type']		 = $oClassTeacher->getSchoolClass()->getClassType()->getName();
			$aClassInfo['Id']			 = $oClassTeacher->getSchoolClassId();
			$aClassInfo['Amount']	 = $oClassTeacher->getSchoolClass()->getCountStudents();
			$aClassInfo['Events']	 = $oClassTeacher->getSchoolClass()->countEvents();
			$aClassInfo['Links']	= $oClassTeacher->getSchoolClass()->countClassLinks();
			$aClassInfo['ClassSchedule']	= $oClassTeacher->getSchoolClass()->getHasClassSchedule();
			$aClassInfo['WeekSchedule']	 = $oClassTeacher->getSchoolClass()->getHasWeekSchedule();
			$aClassInfo['ClassPortrait']	= $oClassTeacher->getSchoolClass()->getHasClassPortrait();
			
			$aClassInfo['ClassLink']	= LinkUtil::link(self::getClassPageLink($oClassTeacher->getSchoolClass()), 'FrontendManager');
			$aResult[] = $aClassInfo;
		}
		return $aResult;
	}
	
	public static function getClassPageLink($oClass = null) {
		$sPageIdentifier = SchoolPeer::getPageIdentifier('classes');
		if(self::$CLASS_PAGE === null) {
			self::$CLASS_PAGE = PageQuery::create()->filterByIdentifier($sPageIdentifier)->findOne();
		}
		if(self::$CLASS_PAGE === null) {
			throw new Exception(__METHOD__.' There is no page with the identifier: '.$sPageIdentifier);
		}
		if($oClass instanceof SchoolClass) {
			return array_merge(self::$CLASS_PAGE->getFullPathArray(), array($oClass->getSlug()));
		}
		return self::$CLASS_PAGE->getFullPathArray();
	}
}