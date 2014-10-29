<?php
/**
 * @package modules.frontend
 */

class ClassesFrontendModule extends DynamicFrontendModule {

	public static $DISPLAY_MODES = array('klassen_liste', 'klassen_with_detail', 'klassen_kontext_detail', 'klassen_main_detail');
	public static $EVENT;
	public static $CLASS;
	public $oTeacherPage;

	const MODE_SELECT_KEY = 'display_mode';
	const DETAIL_IDENTIFIER_EVENT = 'anlass';
	const CACHE_KEY = 'classes_list_';

	public static function acceptedRequestParams() {
		return array(self::DETAIL_IDENTIFIER_EVENT);
	}

	public function renderFrontend() {
		// any need for this frontend module? ClassPageTypeModule has replaced all this.
		throw new Exception("the usage of ClassesFrontendModule is deprecated. Use the new ClassPageType to configure your school class pages");

		$this->oTeacherPage = PagePeer::getPageByIdentifier(SchoolPeer::getPageIdentifier('teachers'));
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
		return $this->renderKlassenliste(is_numeric($aOptions[self::MODE_SELECT_KEY]) ? $aOptions[self::MODE_SELECT_KEY] : null);
	}

	private function renderKlassenliste($iClassTypeId = null) {
		$oPage = FrontendManager::$CURRENT_PAGE;
		$aClasses = SchoolClassQuery::create()->filterByClassTypeYearAndSchool($iClassTypeId)->find();
		$oTemplate = $this->constructTemplate('list');
		$bShowClassTeachersOnly = Settings::getSetting('schulcms', 'show_class_teachers_only_in_class_list', true);
		$oTemplate->replaceIdentifier('header_col_teachers', StringPeer::getString('wns.col_header_teachers.'.($bShowClassTeachersOnly ? 'class_teachers' : 'teachers')));
		foreach($aClasses as $i => $oClass) {
			$oItemTemplate = $this->constructTemplate('list_item');
			// get all infos that are independent of teaching unit
			$oItemTemplate->replaceIdentifier('name', $oClass->getUnitName());
			$oItemTemplate->replaceIdentifier('class_type', $oClass->getClassType());
			$oItemTemplate->replaceIdentifier('year', $oClass->getYearPeriod());
			$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($oClass->getLink($oPage)));
			$oItemTemplate->replaceIdentifier('detail_title', StringPeer::getString('wns.class.view_detail').$oClass->getUnitName());
			if($oClass->getDocumentRelatedByClassScheduleId()) {
				$oItemTemplate->replaceIdentifier('stundenplan', TagWriter::quickTag('a', array('href' => $oClass->getDocumentRelatedByClassScheduleId()->getDisplayUrl(), 'class' => "stundenplan", 'title' => StringPeer::getString('wns.download_stundenplan')), ' '));
			} else {
				$oItemTemplate->replaceIdentifier('stundenplan', '-');
			}
			// get infos related to teaching unit, all classes concerned
			$oItemTemplate->replaceIdentifier('count_students', $oClass->countStudentsByUnitName());
			$iLimit = 2;
			// get one more in case there are 3 class teachers, to be just ;=)
			$aClassTeachers = $oClass->getTeachersByUnitName(true, $iLimit+1);
			$iCountTeachers = count($aClassTeachers);
			$iCountMax = $iCountTeachers < $iLimit ? $iCountTeachers : $iLimit;
			$iPreviousTeamMemberId = null;
			foreach($aClassTeachers as $i => $oClassTeacher) {
			  if($i < $iLimit) {
    				$sFunctionAddon = $oClassTeacher->getIsClassTeacher() ? $oClassTeacher->getTeamMember()->getClassTeacherTitle() : $oClassTeacher->getFunctionName(true);
    				if($sFunctionAddon != ''){
    				  $sFunctionAddon = ', '. $sFunctionAddon;
    				}
    				$oItemTemplate->replaceIdentifierMultiple('class_teacher_links', TagWriter::quickTag('a', array('title' => $oClassTeacher->getTeamMember()->getFullName().$sFunctionAddon, 'href' => LinkUtil::link(array_merge($this->oTeacherPage->getFullPathArray(), array($oClassTeacher->getTeamMember()->getSlug())))), $oClassTeacher->getTeamMember()->getFullNameShort()), null, Template::NO_NEWLINE);
    				if($i < $iCountMax-1) {
    					$oItemTemplate->replaceIdentifierMultiple('class_teacher_links', ', ', null, Template::NO_NEWLINE);
    				}
			  }
			  $iPreviousTeamMemberId = $oClassTeacher->getTeamMemberId();
			}
			if(count($aClassTeachers) > $iLimit) {
				$oItemTemplate->replaceIdentifierMultiple('class_teacher_links', ' '.StringPeer::getString('wns.word.and_others'));
			}
			$oTemplate->replaceIdentifierMultiple('list_item', $oItemTemplate);
		}
		return $oTemplate;
	}

	public function renderKlassenDetail() {
		if(isset($_REQUEST[self::DETAIL_IDENTIFIER_EVENT])) {
			self::$EVENT = EventQuery::create()->findPk($_REQUEST[self::DETAIL_IDENTIFIER_EVENT]);
			if(self::$EVENT) {
				return $this->renderClassEvent();
			}
		}
		if(!isset($_REQUEST[SchoolClassFilterModule::CLASSES_REQUEST_KEY])) {
			return null;
		}
		$aClassIds = $_REQUEST[SchoolClassFilterModule::CLASSES_REQUEST_KEY];
		$aClasses = SchoolClassQuery::create()->filterById($aClassIds)->find();
		if(count($aClasses) === 0) {
		  return null;
		}
		$oTemplate = $this->constructTemplate('detail');

		// portrait
		foreach($aClasses as $i => $oClass) {
			$oPortrait = $oClass->getDocumentRelatedByClassPortraitId();
			if($oPortrait) {
				$oTemplate->replaceIdentifierMultiple('portrait_display_url', $oPortrait->getDisplayUrl(array('max_width' => 668)));
				$oTemplate->replaceIdentifierMultiple('portrait_alt', "Portrait von ". $aClasses[0]->getUnitName());
			}
		}
		$oTemplate->replaceIdentifier('list_link', LinkUtil::link(FrontendManager::$CURRENT_PAGE->getFullPathArray()));
		$oTemplate->replaceIdentifier('unit_name', $aClasses[0]->getUnitName());
		$oTemplate->replaceIdentifier('full_unit_name', $aClasses[0]->getFullClassName());

		// students
		$iCountStudents = $aClasses[0]->countStudentsByUnitName();
		if($iCountStudents > 0) {
			if(Settings::getSetting('schulcms', 'display_student_names', true)) {
				foreach($aClasses[0]->getStudentsByUnitName() as $i => $oClassStudent) {
					$aStudents[] = $oClassStudent->getStudent()->getFirstName();
				}
				$oTemplate->replaceIdentifier('students_names', implode(', ', $aStudents));
			}
			$oTemplate->replaceIdentifier('count_students', $iCountStudents);
		}

		// teachers
		$oTemplate->replaceIdentifier('label_class_teacher', StringPeer::getString('wns.class.class_teachers'));
		$oClassTeacherTempl = $this->constructTemplate('class_teacher');
		foreach(self::getClassTeachersOrdered($aClasses[0]->getTeachersByUnitName()) as $iTeamMemberId => $aParams) {
			$oTeacherLink = TagWriter::quickTag('a', array('href' => LinkUtil::link($aParams['team_member']->getLink($this->oTeacherPage))), $aParams['team_member']->getFullName());
			$oClassTeacherTemplate = clone $oClassTeacherTempl;
			$oClassTeacherTemplate->replaceIdentifier('class_teacher_name', $oTeacherLink);
			$sKlassenlehrerin = $aParams['is_class_teacher'] ? $aParams['team_member']->getClassTeacherTitle().', ': '';
			$oClassTeacherTemplate->replaceIdentifier('class_teacher_functions', $sKlassenlehrerin.implode(' und ', $aParams['functions']));
			$oTemplate->replaceIdentifierMultiple('class_teachers', $oClassTeacherTemplate);
		}

		return $oTemplate;
	}

	private static function getClassTeachersOrdered($aClassTeachers) {
		$aClassTeachersSet = array();
		foreach($aClassTeachers as $oClassTeacher) {
			if(!isset($aClassTeachersSet[$oClassTeacher->getTeamMemberId()])) {
				$aClassTeachersSet[$oClassTeacher->getTeamMemberId()]['team_member'] = $oClassTeacher->getTeamMember();
				$aClassTeachersSet[$oClassTeacher->getTeamMemberId()]['is_class_teacher'] = $oClassTeacher->getIsClassTeacher();
				$aClassTeachersSet[$oClassTeacher->getTeamMemberId()]['functions'][] = $oClassTeacher->getFunctionName(true);
			} else {
				if(!in_array($oClassTeacher->getFunctionName(true), $aClassTeachersSet[$oClassTeacher->getTeamMemberId()]['functions'])) {
					$aClassTeachersSet[$oClassTeacher->getTeamMemberId()]['functions'][] = $oClassTeacher->getFunctionName(true);
				}
			}
		}
		return $aClassTeachersSet;
	}

	public function renderClassEvent() {
		$oTemplate = $this->constructTemplate('class_event_detail');
		$oTemplate->replaceIdentifier('title', self::$EVENT->getTitle());
		$oTemplate->replaceIdentifier('date_from_to', self::$EVENT->getDateFromTo());

		$sBody = null;
		if (self::$EVENT->hasBericht()) {
			$sReviewContent = stream_get_contents(self::$EVENT->getBodyReview());
			if($sReviewContent != '') {
				$sBody = RichtextUtil::parseStorageForFrontendOutput($sReviewContent);
			}
		}
		if ($sBody === null && self::$EVENT->getBody()) {
			$sContent = stream_get_contents(self::$EVENT->getBody());
			if($sContent != '') {
				$sBody = RichtextUtil::parseStorageForFrontendOutput($sContent);
			}
		}
		$oTemplate->replaceIdentifier('body', $sBody);

		EventsFrontendModule::renderGallery(self::$EVENT, $oTemplate);
		return $oTemplate;
	}

	public function renderKlassenKontext($bShowRandomKontext = false) {
		if(!isset($_REQUEST[SchoolClassFilterModule::CLASSES_REQUEST_KEY])) {
			return null;
		}
		$aClassIds = $_REQUEST[SchoolClassFilterModule::CLASSES_REQUEST_KEY];
		$aClasses = SchoolClassQuery::create()->filterById($aClassIds)->find();
		if(count($aClasses) === 0) {
			return null;
		}
		$oTemplate = $this->constructTemplate('detail_context');
		// main class attributes

		if($oStundenplan = $aClasses[0]->getDocumentRelatedByClassScheduleId()) {
			$oTemplate->replaceIdentifier('stundenplan', TagWriter::quickTag('a', array('href' => $oStundenplan->getDisplayUrl(), 'class' => 'stundenplan', 'title' => StringPeer::getString('wns.download_stundenplan')), ' '));
		}
		if($oWochenplan = $aClasses[0]->getDocumentRelatedByWeekScheduleId()) {
			$oTemplate->replaceIdentifier('weekplan', TagWriter::quickTag('a', array('href' => $oWochenplan->getDisplayUrl(), 'class' => 'stundenplan', 'title' => StringPeer::getString('wns.download_wochenplan')), ' '));
		}
		if($aClasses[0]->getRoomNumber()) {
			$oTemplate->replaceIdentifier('room_number', $aClasses[0]->getRoomNumber());
		}
		$oTemplate->replaceIdentifier('count_students', $aClasses[0]->countStudentsByUnitName());
		// events
		$aPreviewEvents = FrontendEventQuery::create()->upcomingOrOngoing()->filterBySchoolClassId($aClassIds)->orderByDateStart()->find();
		$aReview = FrontendEventQuery::create()->past()->filterBySchoolClassId($aClassIds)->orderByDateStart(Criteria::DESC)->find();
		$aAllEvents = array_merge($aPreviewEvents->getData(), $aReview->getData());
		$bRequiresBackToLink = false;
		$oDateTmpl = $this->constructTemplate('date');
		if(count($aAllEvents) > 0) {
			$oEventTempl = $this->constructTemplate('list_events');
			$aClassLinkParams = FrontendManager::$CURRENT_NAVIGATION_ITEM->getLink();
			foreach($aAllEvents as $i => $oEvent) {
				$oEventTemplate = $this->constructTemplate('list_event_item');
				if(self::$EVENT && self::$EVENT->getId() === $oEvent->getId()) {
					$oEventTemplate->replaceIdentifier('class_active', 'active');
					$bRequiresBackToLink = true;
				}
				$oDateTemplate = clone $oDateTmpl;
				$oDateTemplate->replaceIdentifier('date_day', strftime("%d",$oEvent->getDateStart('U')));
				$oDateTemplate->replaceIdentifier('class_passed', $oEvent->isReview() ? ' passed' : '');
				$oDateTemplate->replaceIdentifier('date_month', strftime("%b",$oEvent->getDateStart('U')));
				$oEventTemplate->replaceIdentifier('date_from_to', $oDateTemplate);
				if($oEvent->isMultiDay()) {
					$oEventTemplate->replaceIdentifier('date_from_to_addon', $oEvent->getDateFromTo());
				}
				$oTemplate->replaceIdentifierMultiple('list_item', $oEventTemplate);
				$oEventTemplate->replaceIdentifier('detail_link_text', $oEvent->getTitle());
				$aLinkParams = array_merge($aClassLinkParams, array(self::DETAIL_IDENTIFIER_EVENT, $oEvent->getId()));
				$oEventTemplate->replaceIdentifier('detail_link', LinkUtil::link($aLinkParams));
				$oEventTemplate->replaceIdentifier('detail_link_title', $oEvent->getTeaser());

				$oEventTempl->replaceIdentifierMultiple('list_item', $oEventTemplate);
			}
			$oTemplate->replaceIdentifier('event_section', $oEventTempl);
		}

		if($bRequiresBackToLink) {
			$oTemplate->replaceIdentifier('unit_name', TagWriter::quickTag('a', array('title' => StringPeer::getString('wns.class.go_to_home'),'class' => 'class_home', 'href' => LinkUtil::link($aClassLinkParams)), 'Klasse '.$aClasses[0]->getUnitName()));
			$oTemplate->replaceIdentifier('full_unit_name', TagWriter::quickTag('a', array('href' => LinkUtil::link($aClassLinkParams)), $aClasses[0]->getFullClassName()));
		} else {
			$oTemplate->replaceIdentifier('full_unit_name', $aClasses[0]->getFullClassName());
			$oTemplate->replaceIdentifier('unit_name', 'Klasse '.$aClasses[0]->getUnitName());
		}

		// links
		$aLinks = ClassLinkQuery::create()->joinLink()->filterBySchoolClassId($aClassIds)->find();
		if(count($aLinks) > 0) {
			$oLinksTempl = $this->constructTemplate('links');
			$oLinksTempl->replaceIdentifier('link_title', 'Links');
			foreach($aLinks as $i => $oClassLink) {
				$oLinksTempl->replaceIdentifierMultiple('link_items', TagWriter::quickTag('a', array('title' => $oClassLink->getLink()->getDescription(),'href' => $oClassLink->getLink()->getUrl()), $oClassLink->getLink()->getName()));
			}
			$oTemplate->replaceIdentifier('link_section', $oLinksTempl);
		}
		return $oTemplate;
	}
}
