<?php
/**
 * @package modules.widget
 */
class ClassDetailWidgetModule extends PersistentWidgetModule {

	private $iSchoolClassId = null;
	private $oEventListWidget = null;
	private $oLinkListWidget = null;

	public function __construct($sWidgetId) {
		parent::__construct($sWidgetId);
    // config section 'school_settings'
		$iClassPortraitCategory = SchoolPeer::getDocumentCategoryConfig('school_class_portraits');
		if(DocumentCategoryQuery::create()->filterById($iClassPortraitCategory)->count() === 0) {
			throw new Exception('Config error: school_settings > externally_managed_document_categories > school_class_portraits');
		}
		$this->setSetting('class_portrait_category_id', $iClassPortraitCategory);

		$iClassScheduleCategory = SchoolPeer::getDocumentCategoryConfig('school_class_schedules');
		if(DocumentCategoryQuery::create()->filterById($iClassScheduleCategory)->count() === 0) {
			throw new Exception('Config error: school_settings > externally_managed_document_categories > school_class_schedules');
		}
		$this->setSetting('class_schedule_category_id', $iClassScheduleCategory);

		$iClassWeekplanCategory = SchoolPeer::getDocumentCategoryConfig('school_class_weekplans');
		if(DocumentCategoryQuery::create()->filterById($iClassWeekplanCategory)->count() === 0) {
			throw new Exception('Config error: school_settings > externally_managed_document_categories > school_class_weekplans');
		}
		$this->setSetting('week_plan_category_id', $iClassWeekplanCategory);

		$iSchoolLinkCategory = SchoolPeer::getLinkCategoryConfig('school_class_links');
		if(LinkCategoryQuery::create()->filterById($iSchoolLinkCategory)->count() === 0) {
			throw new Exception('Config error: school_settings > externally_managed_link_categories > school_class_links');
		}
		$this->setSetting('link_category_id', $iSchoolLinkCategory);

		$iSchoolDocumentCategory = SchoolPeer::getDocumentCategoryConfig('school_class_documents');
		if(DocumentCategoryQuery::create()->filterById($iSchoolDocumentCategory)->count() === 0) {
			throw new Exception('Config error: school_settings > externally_managed_document_categories > school_class_documents');
		}
		$this->setSetting('class_document_category_id', $iSchoolDocumentCategory);

		$this->oEventListWidget = new EventListWidgetModule();
		$this->oEventListWidget->bSimpleMode = true;
		$this->setSetting('event_list_session', $this->oEventListWidget->getSessionKey());
		$this->oLinkListWidget = new ClassLinkListWidgetModule();
		$this->setSetting('link_list_session', $this->oLinkListWidget->getSessionKey());
	}

	public function setSchoolClassId($iSchoolClassId) {
		$this->iSchoolClassId = $iSchoolClassId;
		$this->oEventListWidget->iSchoolClassId = $iSchoolClassId;
		$this->oLinkListWidget->setSchoolClassId($iSchoolClassId);
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
		$aResult['CountEvents'] = $oSchoolClass->countEvents();
		$aResult['CountDocuments'] = $oSchoolClass->countClassDocuments();
		$aResult['CountLinks'] = $oSchoolClass->countClassLinks();
		$aResult['ClassPageUrl'] = LinkUtil::link($oSchoolClass->getClassLink(), 'FrontendManager');
		return $aResult;
	}

	public function removeEvent($iEventId) {
		$oSchoolClass = SchoolClassQuery::create()->findPk($this->iSchoolClassId);
		if($oSchoolClass->isClassEvent($iEventId)) {
			$oEvent = EventQuery::create()->findPk($iEventId);
			if($oEvent) {
				return $oEvent->delete();
			}
		}
		return false;
	}

	public function removeLink($iLinkId) {
		$oSchoolClass = SchoolClassQuery::create()->findPk($this->iSchoolClassId);
		if($oSchoolClass->isClassLink($iLinkId)) {
			$oLink = LinkQuery::create()->findPk($iLinkId);
			if($oLink) {
				return $oLink->delete();
			}
		}
		return false;
	}

	public function removeDocument($iDocumentId) {
		$oSchoolClass = SchoolClassQuery::create()->findPk($this->iSchoolClassId);
		if($oSchoolClass->isClassDocument($iDocumentId)) {
			$oDocument = DocumentQuery::create()->findPk($iDocumentId);
			if($oDocument) {
				return $oDocument->delete();
			}
		}
		return false;
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

	public function listEvents() {
		$aResult = array();
		$oSchoolClass = SchoolClassQuery::create()->findPk($this->iSchoolClassId);
		foreach($oSchoolClass->getEvents() as $oEvent) {
			$aResult[$oEvent->getId()]['Date'] = $oEvent->getDateStart('d.m.Y');
			$aResult[$oEvent->getId()]['Title'] = $oEvent->getTitle();
			$aResult[$oEvent->getId()]['IsActive'] = $oEvent->getIsActive();
			$aResult[$oEvent->getId()]['HasBericht'] = $oEvent->getHasBericht();
			$aResult[$oEvent->getId()]['HasImages'] = $oEvent->getHasImages();
		}
		return $aResult;
	}

	public function listDocuments() {
		$aResult = array();
		$oSchoolClass = SchoolClassQuery::create()->findPk($this->iSchoolClassId);
		$oQuery = DocumentQuery::create()->orderByName();
		foreach($oSchoolClass->getClassDocumentsJoinDocument($oQuery, null, Criteria::INNER_JOIN) as $oClassDocument) {
			$aResult[$oClassDocument->getDocumentId()]['Name'] = $oClassDocument->getDocument()->getName();
			$aResult[$oClassDocument->getDocumentId()]['Extension'] = $oClassDocument->getDocument()->getExtension();
		}
		return $aResult;
	}

	public function listLinks() {
		$oSchoolClass = SchoolClassQuery::create()->findPk($this->iSchoolClassId);
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
		$oSchoolClass = SchoolClassQuery::create()->findPk($this->iSchoolClassId);
		$oSchoolClass->setClassPortraitId($aSchoolClassData['class_portrait_id']);
		$oSchoolClass->setClassScheduleId($aSchoolClassData['class_schedule_id']);
		$oSchoolClass->setWeekScheduleId($aSchoolClassData['week_schedule_id']);
		return $oSchoolClass->save();
	}

}