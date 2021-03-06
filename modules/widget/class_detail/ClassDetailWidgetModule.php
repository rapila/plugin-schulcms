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

		// Set externally managed categories or types to save related data
		$this->setSetting('class_portrait_category_id', SchoolSiteConfig::getClassPortraitDocumentCategoryId());
		$this->setSetting('class_schedule_category_id', SchoolSiteConfig::getClassScheduleDocumentCategoryId());
		$this->setSetting('class_document_category_id', SchoolSiteConfig::getClassDocumentCategoryId());
		$this->setSetting('class_link_category_id', SchoolSiteConfig::getClassLinkCategoryId());
		$this->setSetting('class_event_type_id', SchoolSiteConfig::getClassEventTypeId());
		$this->setSetting('class_news_type_id', SchoolSiteConfig::getClassNewsTypeId());

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
		$aResult['ClassTeacher'] = $oSchoolClass->getClassTeacherNames();
		if($oDocument = $oSchoolClass->getDocumentRelatedByWeekScheduleId()) {
			$aResult['OptionalDocumentName'] = $oDocument->getName();
		}
		$aResult['YearPeriod'] = $oSchoolClass->getYearPeriod();
		$aResult['NewsCountInfo'] = $this->getNewsCountInfo($oSchoolClass);
		$aResult['CountEvents'] = $oSchoolClass->countEvents();
		$aResult['CountStudents'] = $oSchoolClass->countStudentsByUnitName();
		$aResult['CountDocuments'] = $oSchoolClass->countClassDocuments();
		$aResult['CountLinks'] = $oSchoolClass->countClassLinks();
		self::ensureDocumentExists($aResult, 'ClassPortraitId');
		self::ensureDocumentExists($aResult, 'ClassScheduleId');
		self::ensureDocumentExists($aResult, 'WeekScheduleId');
		$oPredecessorClass = $oSchoolClass->getAncestorClass();
		if($oPredecessorClass) {
			$aResult['Predecessor'] = array('id' => $oPredecessorClass->getId(), 'name' => $oPredecessorClass->getClassNameWithYear());
		}
		$oSuccessorClass = $oSchoolClass->getSuccessorClass();
		if($oSuccessorClass) {
			$aResult['Successor'] = array('id' => $oSuccessorClass->getId(), 'name' => $oSuccessorClass->getClassNameWithYear());
		}
		$aResult['ClassPageUrl'] = LinkUtil::link($oSchoolClass->getLink(), 'FrontendManager');
		return $aResult;
	}

	private static function ensureDocumentExists(&$aResult, $sIdKey) {
		if(DocumentQuery::create()->filterById($aResult[$sIdKey])->count() < 1) {
			$aResult[$sIdKey] = null;
		}
	}

	public function getNewsCountInfo($mSchoolClass) {
		$oSchoolClass = $mSchoolClass;
		if(!is_object($mSchoolClass)){
			$oSchoolClass = SchoolClassQuery::create()->findPk($mSchoolClass);
		}
		if($oSchoolClass) {
			$sInfo = $oSchoolClass->countNews();
			if($sHeadLine = $oSchoolClass->getCurrentNewsHeadline()) {
				$sInfo .= ' / '.TranslationPeer::getString('school_class.current_news_shown', null, 'Default', array('headline' => $oSchoolClass->getCurrentNewsHeadline()));
			}
			return $sInfo;
		}
	}

	public function migrateData($bForce = false) {
		$oSchoolClass = SchoolClassQuery::create()->findPk($this->iSchoolClassId);
		if(!$oSchoolClass) {
			throw new Exception('School class does not exist');
		}
		$oPredecessorClass = $oSchoolClass->getAncestorClass();
		if(!$oPredecessorClass) {
			throw new LocalizedException('school_class.no_predecessor');
		}

		// Migrate portrait
		if(($bForce || !$oSchoolClass->getHasClassPortrait()) && $oPredecessorClass->getHasClassPortrait()) {
			$oClassPortrait = $oPredecessorClass->getDocumentRelatedByClassPortraitId()->copy();
			$oClassPortrait->save();
			$oSchoolClass->setClassPortraitId($oClassPortrait->getId());
		}

		// Migrate schedules
		if(($bForce || !$oSchoolClass->getHasClassSchedule()) && $oPredecessorClass->getHasClassSchedule()) {
			$oClassSchedule = $oPredecessorClass->getDocumentRelatedByClassScheduleId()->copy();
			$oClassSchedule->save();
			$oSchoolClass->setClassScheduleId($oClassSchedule->getId());
		}
		if(($bForce || !$oSchoolClass->getHasWeekSchedule()) && $oPredecessorClass->getHasWeekSchedule()) {
			$oWeekSchedule = $oPredecessorClass->getDocumentRelatedByWeekScheduleId()->copy();
			$oWeekSchedule->save();
			$oSchoolClass->setWeekScheduleId($oWeekSchedule->getId());
		}

		// Migrate documents
		foreach($oPredecessorClass->getClassDocuments() as $oClassDocument) {
			$oDocument = $oClassDocument->getDocument();
			if(!$oDocument) {
				continue;
			}
			$oDocument = $oDocument->copy();
			$oDocument->save();
			$oClassDocument = new ClassDocument();
			$oClassDocument->setSchoolClass($oSchoolClass);
			$oClassDocument->setDocument($oDocument);
			$oClassDocument->save();
		}

		// Migrate links
		foreach($oPredecessorClass->getClassLinks() as $oClassLink) {
			$oLink = $oClassLink->getLink();
			if(!$oLink) {
				continue;
			}
			$oLink = $oLink->copy();
			$oLink->save();
			$oClassLink = new ClassLink();
			$oClassLink->setSchoolClass($oSchoolClass);
			$oClassLink->setLink($oLink);
			$oClassLink->save();
		}

		return $oSchoolClass->save();
	}

	public function countEvents($iSchoolClassId) {
		return EventQuery::create()->filterBySchoolClassId($iSchoolClassId)->count();
	}

	public function countDocuments($iSchoolClassId) {
		return ClassDocumentQuery::create()->filterBySchoolClassId($iSchoolClassId)->count();
	}

	public function countLinks($iSchoolClassId) {
		return ClassLinkQuery::create()->filterBySchoolClassId($iSchoolClassId)->count();
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

	public function saveData($aData) {
		$oSchoolClass = SchoolClassQuery::create()->findPk($this->iSchoolClassId);
		if($aData['class_portrait_id'] == null && $oSchoolClass->getHasClassPortrait()) {
			$oSchoolClass->getDocumentRelatedByClassPortraitId()->delete();
		}
		$oSchoolClass->setClassPortraitId($aData['class_portrait_id']);
		if($aData['class_schedule_id'] == null && $oSchoolClass->getHasClassSchedule()) {
			$oSchoolClass->getDocumentRelatedByClassScheduleId()->delete();
		}
		$oSchoolClass->setClassScheduleId($aData['class_schedule_id']);
		if($aData['week_schedule_id'] == null && $oSchoolClass->getHasWeekSchedule()) {
			$oSchoolClass->getDocumentRelatedByWeekScheduleId()->delete();
		}
		$oSchoolClass->setWeekScheduleId($aData['week_schedule_id']);
		if($aData['force_update']) {
			$oSchoolClass->setUpdatedAt(time());
		}
		return $oSchoolClass->save();
	}

}
