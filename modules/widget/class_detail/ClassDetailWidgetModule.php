<?php
/**
 * @package modules.widget
 */
class ClassDetailWidgetModule extends PersistentWidgetModule {

	private $iSchoolClassId = null;
	
	public function __construct($sWidgetId) {
		parent::__construct($sWidgetId);
    // config section 'school_settings' :'externally_managed_categories'
		$this->setSetting('class_portrait_category_id', SchoolPeer::getCategoryConfig('class_portraits'));
		$this->setSetting('class_schedule_category_id', SchoolPeer::getCategoryConfig('class_schedules'));
		$this->setSetting('week_plan_category_id', SchoolPeer::getCategoryConfig('class_weekplans'));
		$this->setSetting('link_category_id', SchoolPeer::getCategoryConfig('class_links'));
	}
	
	public function setSchoolClassId($iSchoolClassId) {
		$this->iSchoolClassId = $iSchoolClassId;
	}
	
	public function schoolClassData() {
		$oSchoolClass = SchoolClassPeer::retrieveByPK($this->iSchoolClassId);
		if($oSchoolClass === null) {
			return array();
		}
		$aResult = $oSchoolClass->toArray(BasePeer::TYPE_PHPNAME, false);
    $aResult['ClassTypeName'] = $oSchoolClass->getClassType()->getName();
    $aResult['ClassTeacher'] = $oSchoolClass->getClassTeacherNames();
    $aResult['YearPeriod'] = $oSchoolClass->getYearPeriod();
    $aResult['ClassPageUrl'] = LinkUtil::link(MyClassesWidgetModule::getClassPageLink($oSchoolClass->getId()), 'FrontendManager');
		return $aResult;
	}
	
	public function removeEvent($iEventId) {
		$oSchoolClass = SchoolClassPeer::retrieveByPK($this->iSchoolClassId);
		if($oSchoolClass->isClassEvent($iEventId)) {
			$oEvent = EventPeer::retrieveByPK($iEventId);
			if($oEvent) {
				return $oEvent->delete();
			}
		}
		return false;
	}
	
	public function removeLink($iLinkId) {
		$oSchoolClass = SchoolClassPeer::retrieveByPK($this->iSchoolClassId);
		if($oSchoolClass->isClassLink($iLinkId)) {
			$oLink = LinkPeer::retrieveByPK($iLinkId);
			if($oLink) {
				return $oLink->delete();
			}
		}
		return false;
	}
	
	public function addClassLink($iLinkId) {
	  if(ClassLinkPeer::retrieveByPK($this->iSchoolClassId, $iLinkId)) {
	    return;
	  }
		$oClassLink = new ClassLink();
		$oClassLink->setSchoolClassId($this->iSchoolClassId);
		$oClassLink->setLinkId($iLinkId);
		return $oClassLink->save();
	}
	
	public function listEvents() {
		$aResult = array();
		$oSchoolClass = SchoolClassPeer::retrieveByPK($this->iSchoolClassId);
		foreach($oSchoolClass->getEvents() as $oEvent) {
			$aResult[$oEvent->getId()]['Date'] = $oEvent->getDateStart('d.m.Y');
			$aResult[$oEvent->getId()]['Title'] = $oEvent->getTitle();
		}
		return $aResult;
	}
	
	public function listLinks() {
		$oSchoolClass = SchoolClassPeer::retrieveByPK($this->iSchoolClassId);
		$oCriteria = new Criteria();
		$oCriteria->addAscendingOrderByColumn(LinkPeer::NAME);
		$aResult = array();
		foreach($oSchoolClass->getClassLinksJoinLink($oCriteria, null, Criteria::INNER_JOIN) as $oClassLink) {
			$aResult[$oClassLink->getLinkId()]['Name'] = $oClassLink->getLink()->getName();
			$aResult[$oClassLink->getLinkId()]['Url'] = StringUtil::truncate($oClassLink->getLink()->getUrl(), 40);
		}
		return $aResult;
	}
	
	public function saveData($aSchoolClassData) {
		$oSchoolClass = SchoolClassPeer::retrieveByPK($this->iSchoolClassId);
		$oSchoolClass->setClassPortraitId($aSchoolClassData['class_portrait_id']);
		$oSchoolClass->setClassScheduleId($aSchoolClassData['class_schedule_id']);
		$oSchoolClass->setWeekScheduleId($aSchoolClassData['week_schedule_id']);
		return $oSchoolClass->save();
	}
}