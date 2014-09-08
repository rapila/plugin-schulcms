<?php
/**
 * @package modules.widget
 */
class ClassDetailWidgetModule extends PersistentWidgetModule {

	private $iSchoolClassId = null;
	private $oNewsListWidget = null;
	private $oEventListWidget = null;
	private $oLinkListWidget = null;
	private $oDocumentListWidget = null;

	public function __construct($sWidgetId) {
		parent::__construct($sWidgetId);
    // config section 'school_settings'
		$iClassPortraitCategoryId = SchoolPeer::getDocumentCategoryConfig('school_class_portraits');
		if(DocumentCategoryQuery::create()->findPk($iClassPortraitCategoryId) === null) {
			throw new Exception('Config error: school_settings > externally_managed_document_categories > school_class_portraits');
		}
		$this->setSetting('class_portrait_category_id', $iClassPortraitCategoryId);

		$iClassScheduleCategoryId = SchoolPeer::getDocumentCategoryConfig('school_class_schedules');
		if(DocumentCategoryQuery::create()->findPk($iClassScheduleCategoryId) === null) {
			throw new Exception('Config error: school_settings > externally_managed_document_categories > school_class_schedules');
		}
		$this->setSetting('class_schedule_category_id', $iClassScheduleCategoryId);

		$iClassWeekplanCategory = SchoolPeer::getDocumentCategoryConfig('school_class_weekplans');
		if(DocumentCategoryQuery::create()->findPk($iClassWeekplanCategory) === null) {
			throw new Exception('Config error: school_settings > externally_managed_document_categories > school_class_weekplans');
		}
		$this->setSetting('week_plan_category_id', $iClassWeekplanCategory);

		$iClassLinkCategoryId = SchoolPeer::getLinkCategoryConfig('school_class_links');
		if(LinkCategoryQuery::create()->findPk($iClassLinkCategoryId) === null) {
			throw new Exception('Config error: school_settings > externally_managed_link_categories > school_class_links');
		}
		$this->setSetting('class_link_category_id', $iClassLinkCategoryId);

		$iClassEventTypeId = Settings::getSetting('school_settings', 'class_default_event_type_id', 1);
		if(EventTypeQuery::create()->findPk($iClassEventTypeId) === null) {
			throw new Exception('Config error: school_settings > class_default_event_type_id');
		}
		$this->setSetting('class_event_type_id', $iClassEventTypeId);

		$iClassDocumentCategoryId = SchoolPeer::getDocumentCategoryConfig('school_class_documents');
		if(DocumentCategoryQuery::create()->findPk($iClassDocumentCategoryId) === null) {
			throw new Exception('Config error: school_settings > externally_managed_document_categories > school_class_documents');
		}
		$this->setSetting('class_document_category_id', $iClassDocumentCategoryId);

		$iClassNewsTypeId = SchoolPeer::getNewsTypeConfig('school_class_news_type_id');
		if(NewsTypeQuery::create()->findPk($iClassNewsTypeId) === null) {
			throw new Exception('Config error: school_settings > externally_managed_news_types > school_class_news_type');
		}
		$this->setSetting('class_news_type_id', $iClassNewsTypeId);

		$this->oNewsListWidget = new ClassNewsListWidgetModule();
		$this->setSetting('news_list_session', $this->oNewsListWidget->getSessionKey());

		$this->oEventListWidget = new ClassEventListWidgetModule();
		$this->setSetting('event_list_session', $this->oEventListWidget->getSessionKey());

		$this->oLinkListWidget = new ClassLinkListWidgetModule();
		$this->setSetting('link_list_session', $this->oLinkListWidget->getSessionKey());

		$this->oDocumentListWidget = new ClassDocumentListWidgetModule();
		$this->setSetting('document_list_session', $this->oDocumentListWidget->getSessionKey());
	}

	public function setSchoolClassId($iSchoolClassId) {
		$this->iSchoolClassId = $iSchoolClassId;
		$this->oNewsListWidget->iSchoolClassId = $iSchoolClassId;
		$this->oEventListWidget->iSchoolClassId = $iSchoolClassId;
		$this->oLinkListWidget->iSchoolClassId = $iSchoolClassId;
		$this->oDocumentListWidget->iSchoolClassId = $iSchoolClassId;
	}

	public function schoolClassData() {
		$oSchoolClass = SchoolClassQuery::create()->findPk($this->iSchoolClassId);
		if($oSchoolClass === null) {
			return array();
		}
		$aResult = $oSchoolClass->toArray(BasePeer::TYPE_PHPNAME, false);
		$aResult['ClassTypeName'] = $oSchoolClass->getClassType()->getName();
		$aResult['ClassTeacher'] = $oSchoolClass->getClassTeacherNames();
		$aResult['YearPeriod'] = $oSchoolClass->getYearPeriod();
		$aResult['CountNews'] = $oSchoolClass->countNews();
		$aResult['CountEvents'] = $oSchoolClass->countEvents();
		$aResult['CountStudents'] = $oSchoolClass->countStudentsByUnitName();
		$aResult['CountDocuments'] = $oSchoolClass->countClassDocuments();
		$aResult['CountLinks'] = $oSchoolClass->countClassLinks();
		$aResult['ClassPageUrl'] = LinkUtil::link($oSchoolClass->getClassLink(), 'FrontendManager');
		return $aResult;
	}

	public function addClassLink($iLinkId = null) {
	  if(ClassLinkQuery::create()->findPk(array($this->iSchoolClassId, $iLinkId))) {
	    return;
	  }
		ClassLinkPeer::ignoreRights(true);
		$oClassLink = new ClassLink();
		$oClassLink->setSchoolClassId($this->iSchoolClassId);
		$oClassLink->setLinkId($iLinkId);
		return $oClassLink->save();
	}

	public function addClassDocument($iDocumentId = null) {
	  if(ClassDocumentQuery::create()->findPk(array($this->iSchoolClassId, $iDocumentId))) {
	    return;
	  }
		ClassDocumentPeer::ignoreRights(true);
		$oClassDocument = new ClassDocument();
		$oClassDocument->setSchoolClassId($this->iSchoolClassId);
		$oClassDocument->setDocumentId($iDocumentId);
		return $oClassDocument->save();
	}

	public function saveData($aSchoolClassData) {
		$oSchoolClass = SchoolClassQuery::create()->findPk($this->iSchoolClassId);
		if($aSchoolClassData['class_portrait_id'] == null && $oSchoolClass->getDocumentRelatedByClassPortraitId()) {
			$oSchoolClass->getDocumentRelatedByClassPortraitId()->delete();
		}
		$oSchoolClass->setClassPortraitId($aSchoolClassData['class_portrait_id']);
		if($aSchoolClassData['class_schedule_id'] == null && $oSchoolClass->getDocumentRelatedByClassScheduleId()) {
			$oSchoolClass->getDocumentRelatedByClassScheduleId()->delete();
		}
		$oSchoolClass->setClassScheduleId($aSchoolClassData['class_schedule_id']);
		if($aSchoolClassData['week_schedule_id'] == null && $oSchoolClass->getDocumentRelatedByWeekScheduleId()) {
			$oSchoolClass->getDocumentRelatedByWeekScheduleId()->delete();
		}
		$oSchoolClass->setWeekScheduleId($aSchoolClassData['week_schedule_id']);
		return $oSchoolClass->save();
	}

}