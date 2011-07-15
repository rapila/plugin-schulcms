<?php

class MyClassesWidgetModule extends PersistentWidgetModule {
  
  private $oTeamMember;
  const PAGE_NAME_CLASSES = 'klassen';
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
      $aClassInfo['Name']    = $oClassTeacher->getSchoolClass()->getName();
      $aClassInfo['Type']    = $oClassTeacher->getSchoolClass()->getClassType()->getName();
      $aClassInfo['Id']      = $oClassTeacher->getSchoolClassId();
      $aClassInfo['Amount']  = $oClassTeacher->getSchoolClass()->getCountStudents();
      $aClassInfo['Events']  = $oClassTeacher->getSchoolClass()->countEvents();
      $aClassInfo['Links']  = $oClassTeacher->getSchoolClass()->countClassLinks();
      $aClassInfo['ClassSchedule']  = $oClassTeacher->getSchoolClass()->getHasClassSchedule();
      $aClassInfo['WeekSchedule']  = $oClassTeacher->getSchoolClass()->getHasWeekSchedule();
      $aClassInfo['ClassPortrait']  = $oClassTeacher->getSchoolClass()->getHasClassPortrait();
      $aClassInfo['ClassLink']  = LinkUtil::link(self::getClassPageLink($oClassTeacher->getSchoolClass()->getId()), 'FrontendManager');
      $aResult[] = $aClassInfo;
    }
		return $aResult;
	}
	
	public static function getClassPageLink($iClassId = null) {
	  if(self::$CLASS_PAGE === null) {
	    self::$CLASS_PAGE = PageQuery::create()->filterByName(self::PAGE_NAME_CLASSES)->findOne();
	  }
	  if($iClassId !== null) {
	    return array_merge(self::$CLASS_PAGE->getFullPathArray(), array(ClassesFrontendModule::DETAIL_IDENTIFIER, $iClassId));
	  }
	  return self::$CLASS_PAGE->getFullPathArray();
	}
}