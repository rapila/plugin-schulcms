<?php
/**
 * @package modules.frontend
 */

class ClassesFrontendModule extends DynamicFrontendModule implements WidgetBasedFrontendModule {
	
	public static $DISPLAY_MODES = array('klassen_liste', 'klassen_with_detail', 'klassen_kontext_detail', 'klassen_main_detail');
	public static $EVENT;
	public static $CLASS;
	public $oTeamPage;
	
	const MODE_SELECT_KEY = 'display_mode';
	const DETAIL_IDENTIFIER_EVENT = 'anlass';
	const CACHE_KEY = 'classes_list_';
	
	public static function acceptedRequestParams() {
		return array(self::DETAIL_IDENTIFIER_EVENT);
	}
	
	public function renderFrontend() {
		$this->oTeamPage = PagePeer::getPageByIdentifier(SchoolPeer::getPageIdentifier('team'));
		$aOptions = @unserialize($this->getData());
		if(!isset($aOptions[self::MODE_SELECT_KEY])) {
			return null;
		}
		if(isset($_REQUEST[SchoolClassFilterModule::CLASSES_REQUEST_KEY]) || $aOptions[self::MODE_SELECT_KEY] === 'klassen_kontext_detail') {
			if($aOptions[self::MODE_SELECT_KEY] === 'klassen_kontext_detail') {
				return $this->renderKlassenKontext();	
			}
			return $this->renderKlassenDetail();
		}
		if(is_numeric($aOptions[self::MODE_SELECT_KEY])) {
			return $this->renderKlassenliste($aOptions[self::MODE_SELECT_KEY]);
		}
		return $this->renderKlassenliste();
	}

	private function renderKlassenliste($iClassTypeId = null) {
    $oCache = new Cache(self::CACHE_KEY.Session::language().'_'. ($iClassTypeId !== null ? $iClassTypeId.'_' : ""), DIRNAME_PRELOAD);  
    if($oCache->cacheFileExists()) {
      return $oCache->getContentsAsVariable();
    }

		$oPage = FrontendManager::$CURRENT_PAGE;
		$aClasses = SchoolClassPeer::getSchoolUnitsBySchool(null, $iClassTypeId);
		$sOddEven = 'odd';
		$oTemplate = $this->constructTemplate('list');
		foreach($aClasses as $oClass) {
			$oItemTemplate = $this->constructTemplate('list_item');
			$oItemTemplate->replaceIdentifier('oddeven', $sOddEven = $sOddEven === 'even' ? 'odd' : 'even');
			$oItemTemplate->replaceIdentifier('name', $oClass->getUnitName());
			$aClassTeachers = $oClass->getClassTeachersOrdered();
			foreach($aClassTeachers as $i => $oClassTeacher) {
				$oItemTemplate->replaceIdentifierMultiple('class_teacher_links', TagWriter::quickTag('a', array('title' => StringPeer::getString('wns.team_member.view_detail').$oClassTeacher->getTeamMember()->getFullName(), 'href' => LinkUtil::link(array_merge($this->oTeamPage->getFullPathArray(), array($oClassTeacher->getTeamMember()->getSlug())))), $oClassTeacher->getTeamMember()->getFullNameShort()));
				if($i < count($aClassTeachers)-1) {
					$oItemTemplate->replaceIdentifierMultiple('class_teacher_links', ', ');
				}
			}
			$oItemTemplate->replaceIdentifier('class_type', $oClass->getClassTypeName());
			$oItemTemplate->replaceIdentifier('count_students', $oClass->countClassStudents());
			$oItemTemplate->replaceIdentifier('year', $oClass->getYearPeriod());
			$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($oClass->getClassLink($oPage)));
			$oItemTemplate->replaceIdentifier('detail_title', StringPeer::getString('wns.class.view_detail').$oClass->getUnitName());
			if($oClass->getDocumentRelatedByClassScheduleId()) {
				$oItemTemplate->replaceIdentifier('stundenplan', TagWriter::quickTag('a', array('href' => $oClass->getDocumentRelatedByClassScheduleId()->getDisplayUrl(), 'class' => "stundenplan", 'title' => StringPeer::getString('wns.download_stundenplan')), ' '));
			} else {
				$oItemTemplate->replaceIdentifier('stundenplan', '-');
			}
			$oTemplate->replaceIdentifierMultiple('list_item', $oItemTemplate);
		}
		$oCache->setContents($oTemplate);
		return $oTemplate;
	}
	
	public function renderKlassenDetail() {
		if(isset($_REQUEST[self::DETAIL_IDENTIFIER_EVENT])) {
			self::$EVENT = EventPeer::retrieveByPK($_REQUEST[self::DETAIL_IDENTIFIER_EVENT]);
			if(self::$EVENT) {
				return $this->renderClassEvent();
			}
		}
		if(!isset($_REQUEST[SchoolClassFilterModule::CLASSES_REQUEST_KEY])) {
			return null;
		}
		$aClasses = SchoolClassQuery::create()->filterById($_REQUEST[SchoolClassFilterModule::CLASSES_REQUEST_KEY])->find();
		$aClassIds = array();
		foreach($aClasses as $oClass) {
			$aClassIds[] = $oClass->getId();
		}
		$oProtraitDummyId = 46;
		$oTemplate = $this->constructTemplate('detail');
		// portrait
		foreach($aClasses as $oClass) {
			$oPortrait = $oClass->getDocumentRelatedByClassPortraitId();
			if($oPortrait) {
				$oTemplate->replaceIdentifierMultiple('portrait_display_url', $oPortrait->getDisplayUrl(array('max_width' => 670)));
				$oTemplate->replaceIdentifierMultiple('portrait_alt', "Portrait von ". $aClasses[0]->getUnitName());
			}
		}
		$oPage = FrontendManager::$CURRENT_PAGE;
		$oTemplate->replaceIdentifier('list_link', LinkUtil::link($oPage->getFullPathArray()));
		// students
		$aClassStudents = ClassStudentQuery::create()->filterBySchoolClassId($aClassIds)->orderByFirstName()->find();
		if(count($aClassStudents) > 0) {
			if(Settings::getSetting('school_settings', 'display_student_names', true)) {
				foreach($aClassStudents as $i => $oClassStudent) {
					$aStudents[] = $oClassStudent->getStudent()->getFirstName();
				}
				$oTemplate->replaceIdentifier('students_names', implode(', ', $aStudents));
			}
			$oTemplate->replaceIdentifier('students_count', count($aClassStudents));
		}
		// teachers
		$aClassTeachers = ClassTeacherQuery::create()->filterBySchoolClassId($aClassIds)->filterByIsClassTeacher(true)->orderBySortOrder()->orderByLastName()->groupByTeamMemberId()->find();
		$iClassTeacherCount = count($aClassTeachers);
		foreach($aClassTeachers as $i => $oClassTeacher) {
			if($i === 0) {
				if($iClassTeacherCount > 1) {
					$oTemplate->replaceIdentifier('label_class_teacher', StringPeer::getString('wns.class.class_teachers'));
				} else {
					$oTemplate->replaceIdentifier('label_class_teacher',	StringPeer::getString('wns.class.class_teacher'.($oClassTeacher->getTeamMember()->getGenderId() === 'f' ? '_female': '_male')));
				}
			}
			$aTeacherLink = array_merge($this->oTeamPage->getFullPathArray(), array($oClassTeacher->getTeamMember()->getSlug()));
			$oClassTeacherLink = TagWriter::quickTag('a', array('href' => LinkUtil::link($aTeacherLink)), $oClassTeacher->getTeamMember()->getFullName());
			$oTemplate->replaceIdentifierMultiple('name_class_teacher', $oClassTeacherLink.($i < ($iClassTeacherCount-1) ? ', ': ''), null, Template::NO_HTML_ESCAPE);
		}

		// other teachers
		$aOtherTeachers = ClassTeacherQuery::create()->filterBySchoolClassId($aClassIds)->filterByIsClassTeacher(false)->orderBySortOrder()->orderByLastName()->groupByTeamMemberId()->find();
		$iOtherTeachers = count($aOtherTeachers);
		foreach($aOtherTeachers as $i => $oOtherTeacher) {
			if($i === 0) {
				$oTemplate->replaceIdentifier('label_other_teacher', StringPeer::getString('wns.class.other_teachers'));
			}
			if($oOtherTeacher->getTeamMember()->getFullName()) {
				$aTeacherLink = array_merge($this->oTeamPage->getFullPathArray(), array($oOtherTeacher->getTeamMember()->getSlug()));
				$oOtherTeacherLink = TagWriter::quickTag('a', array('href' => LinkUtil::link($aTeacherLink)), $oOtherTeacher->getTeamMember()->getFullName());
				$sComma = $i < ($iOtherTeachers-1) ? ', ' : '';

				$oTemplate->replaceIdentifierMultiple('name_other_teacher', '<span class="function">'.$oOtherTeacher->getFunctionName().'</span> '.$oOtherTeacherLink.$sComma, null, Template::NO_HTML_ESCAPE);
			}
		}
		return $oTemplate;
	}
	
	public function renderClassEvent() {		
		$oEventTemplate = $this->constructTemplate('class_event_detail');
		$oEventTemplate->replaceIdentifier('title', self::$EVENT->getTitle());
		$oEventTemplate->replaceIdentifier('date_from_to', self::$EVENT->getDateFromTo());
		if(self::$EVENT->isPreview() === false && self::$EVENT->getBodyReview() !== null) {
			$sBody = RichtextUtil::parseStorageForFrontendOutput(stream_get_contents(self::$EVENT->getBodyReview()));
		} elseif(self::$EVENT->getBodyPreview() !== null) {
			$sBody = RichtextUtil::parseStorageForFrontendOutput(stream_get_contents(self::$EVENT->getBodyPreview()));
		} else {
			$sBody = self::$EVENT->getTeaser();
		}
		$oEventTemplate->replaceIdentifier('body', $sBody);
		
		$oGalleryTemplate = new Template('lists/gallery');
		$oGalleryItemTemplatePrototype = new Template('lists/gallery_item');
		foreach(self::$EVENT->getEventDocumentsOrdered() as $oEventDocument) {
			if(!$oEventDocument->getDocument()) {
				continue;
			}
			$oGalleryItemTemplate = clone $oGalleryItemTemplatePrototype;
			$oGalleryItemTemplate->replaceIdentifier('event_id', self::$EVENT->getId());
			$oEventDocument->getDocument()->renderListItem($oGalleryItemTemplate);
			$oGalleryTemplate->replaceIdentifierMultiple("items", $oGalleryItemTemplate);
		}
		$oEventTemplate->replaceIdentifier('gallery', $oGalleryTemplate);
		return $oEventTemplate;
	}
	
	public function renderKlassenKontext($bShowRandomKontext = false) {
		if(!isset($_REQUEST[SchoolClassFilterModule::CLASSES_REQUEST_KEY])) {
			return null;
		}
		$aClasses = SchoolClassQuery::create()->filterById($_REQUEST[SchoolClassFilterModule::CLASSES_REQUEST_KEY])->find();
		if(count($aClasses) === 0) {
			return null;
		}
		$aClassIds = array();
		foreach($aClasses as $oClass) {
			$aClassIds[] = $oClass->getId();
		}
		$oTemplate = $this->constructTemplate('detail_context');
		// main class attributes

		if($aClasses[0]->getDocumentRelatedByClassScheduleId()) {
			$oTemplate->replaceIdentifier('stundenplan', TagWriter::quickTag('a', array('href' => $aClasses[0]->getDocumentRelatedByClassScheduleId()->getDisplayUrl(), 'class' => "stundenplan", 'title' => StringPeer::getString('wns.download_stundenplan')), ' '));
		}
		if($aClasses[0]->getDocumentRelatedByWeekScheduleId()) {
			$oTemplate->replaceIdentifier('weekplan', TagWriter::quickTag('a', array('href' => $aClasses[0]->getDocumentRelatedByClassScheduleId()->getDisplayUrl(), 'class' => "stundenplan", 'title' => StringPeer::getString('wns.download_stundenplan')), ' '));
		}
		if($aClasses[0]->getRoomNumber()) {
			$oTemplate->replaceIdentifier('room_number', $aClasses[0]->getRoomNumber());
		}
		// events
		$aEvents = EventQuery::create()->filterBySchoolClassId($aClassIds)->find();
		$bRequiresBackToLink = false;
		if(count($aEvents) > 0) {
			$oEventTempl = $this->constructTemplate('events');
			$oEventTempl->replaceIdentifier('event_title', 'Anlässe');
			$aClassLinkParams = FrontendManager::$CURRENT_NAVIGATION_ITEM->getLink();
			foreach($aEvents as $i => $oEvent) {
				$oEventTemplate = $this->constructTemplate('event_teaser');
				if(self::$EVENT && self::$EVENT->getId() === $oEvent->getId()) {
					$oEventTemplate->replaceIdentifier('class_active', 'active');
					$bRequiresBackToLink = true;
				}
				$oEventTemplate->replaceIdentifier('datum', $oEvent->getDateFromTo());
				$oEventTemplate->replaceIdentifier('title', $oEvent->getTitle());
				$aLinkParams = array_merge($aClassLinkParams, array(self::DETAIL_IDENTIFIER_EVENT, $oEvent->getId()));
				$oEventTemplate->replaceIdentifier('event_detail_link', LinkUtil::link($aLinkParams));
				$oEventTempl->replaceIdentifierMultiple('events', $oEventTemplate);
			}
			$oTemplate->replaceIdentifier('event_section', $oEventTempl);
		}
		
		if($bRequiresBackToLink) {
			$oTemplate->replaceIdentifier('class_name', TagWriter::quickTag('a', array('href' => LinkUtil::link($aClassLinkParams)), $aClasses[0]->getFullClassName()));
		} else {
			$oTemplate->replaceIdentifier('class_name', $aClasses[0]->getFullClassName());
		}
		
		// links
		$aLinks = ClassLinkQuery::create()->joinLink()->filterBySchoolClassId($aClassIds)->find();
		if(count($aLinks) > 0) {
			$oLinksTempl = $this->constructTemplate('links');
			$oLinksTempl->replaceIdentifier('link_title', 'Links');
			foreach($aLinks as $i => $oClassLink) {
				$oLinksTempl->replaceIdentifierMultiple('link_items', TagWriter::quickTag('a', array('href' => $oClassLink->getLink()->getUrl()), $oClassLink->getLink()->getName()));
			}
			$oTemplate->replaceIdentifier('link_section', $oLinksTempl);
		}
		return $oTemplate;
	}
	
	public function widgetData() {
		$aOptions = @unserialize($this->getData()); 
		return $aOptions[self::MODE_SELECT_KEY];
	}
	
	public function widgetSave($mData) {
		$this->oLanguageObject->setData(serialize(array(self::MODE_SELECT_KEY => $mData)));
		return $this->oLanguageObject->save();
	}
	
	public function getWidget() {
		$aOptions = @unserialize($this->getData()); 
		$oWidget = new ClassesEditWidgetModule(null, $this);
		$oWidget->setDisplayMode($aOptions[self::MODE_SELECT_KEY]);
		return $oWidget;
	}

}
