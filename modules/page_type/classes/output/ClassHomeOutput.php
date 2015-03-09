<?php

class ClassHomeOutput extends ClassOutput {
	public function __construct(NavigationItem $oNavigationItem, ClassesPageTypeModule $oPageType) {
		parent::__construct($oNavigationItem, $oPageType);
	}

	public function renderContent() {
		$this->oClass = $this->oNavigationItem->getClass();
		if(!$this->oClass) {
			return null;
		}
		// render content depending on display_type
		switch($this->oPageType->config()) {
			case 'full': return $this->renderContentWithSubjects();
			default: return $this->renderContentDefault();
		}
	}

	private function renderContentDefault() {
		$oTemplate = $this->oPageType->constructTemplate('detail.home_content.default');
		$this->renderClassInfo($oTemplate);
		$this->renderSchedules($oTemplate);
		$this->renderClassNews($oTemplate);
		$this->renderDocumentsAndLinks($oTemplate);
		return $oTemplate;
	}

	private function renderContentWithSubjects() {
		$oTemplate = $this->oPageType->constructTemplate('detail.home_content.subjects');
		$this->renderClassInfo($oTemplate);
		$this->renderSchedules($oTemplate);
		$this->renderClassNews($oTemplate);
		$this->renderSubjectsAndTeachers($oTemplate);
		return $oTemplate;
	}

	public function renderContext() {
		$oTemplate = $this->oPageType->constructTemplate('detail.home_context');
		$this->renderRecentReport($oTemplate);
		$this->renderUpcomingEvents($oTemplate, 10);
		return $oTemplate;
	}

	private function renderClassInfo($oTemplate) {
		// Students count info
		$oTemplate->replaceIdentifier('count_students', $this->oClass->countStudentsByUnitName());

		// Class portrait
		$oPortrait = $this->oClass->getDocumentRelatedByClassPortraitId();
		$sLabel = '';

		if(!$oPortrait) {
			$oPortrait = DocumentQuery::create()->filterByName('klassenbild_platzhalter')->findOne();
			if(Session::getSession()->isAuthenticated() && Session::getSession()->getUser()->getIsBackendLoginEnabled()) {
				$sLabel = '(Bitte eigenes Klassenfoto hochladen)';
			}
		} else {
			$sLabel = 'Klassenfoto '.$this->oClass->getUnitName();
		}
		if($oPortrait) {
			$oImageTag = TagWriter::quickTag('img', array('src' => $oPortrait->getDisplayUrl(array('max_width' => 500))));
			$oTemplate->replaceIdentifier('class_portrait', $oImageTag);
		}
		$oTemplate->replaceIdentifier('class_portrait_label', $sLabel);

		// Main class teachers
		foreach($this->oClass->getTeachersByUnitName(true) as $i => $oClassTeacher) {
			$oTeacher = $oClassTeacher->getTeamMember();
			$oTeacherLink = TagWriter::quickTag('a', array('href' => LinkUtil::link($oTeacher->getLink($this->oTeacherPage)), 'title' => StringPeer::getString('team_member.link_to'). ' '. $oTeacher->getFullName()), $oTeacher->getFullName());
			$oTemplate->replaceIdentifierMultiple('class_teacher', $oTeacherLink);
		}
	}

	private function renderSchedules($oTemplate) {
		if($oSchedule = $this->oClass->getDocumentRelatedByClassScheduleId()) {
			$oTemplate->replaceIdentifier('schedule', TagWriter::quickTag('a', array('href' => $oSchedule->getDisplayUrl(), 'class' => 'pdf', 'rel' => 'document', 'title' => StringPeer::getString('class_detail.schedule_download')), StringPeer::getString('class_detail.schedule')));
		}
		if($oScheduleExtra = $this->oClass->getDocumentRelatedByWeekScheduleId()) {
			$oTemplate->replaceIdentifier('schedule_extra', TagWriter::quickTag('a', array('href' => $oScheduleExtra->getDisplayUrl(), 'class' => 'pdf', 'rel' => 'document', 'title' => StringPeer::getString('class_detail.schedule_extra_download')), StringPeer::getString('class_detail.schedule_extra')));
		}
	}

	private function renderClassNews($oTemplate) {
		$oNews = FrontendNewsQuery::create()->current()->filterBySchoolClass($this->oClass)->orderByDateStart('desc')->findOne();
		$oNewsTemplate = $this->oPageType->constructTemplate('news_detail');
		if($oNews) {
			$oNewsTemplate->replaceIdentifier('headline', $oNews->getHeadline());
			$sContent = is_resource($oNews->getBody()) ? stream_get_contents($oNews->getBody()) : '';
			$oNewsTemplate->replaceIdentifier('content', RichtextUtil::parseStorageForFrontendOutput($sContent));
			$oNewsTemplate->replaceIdentifier('date', LocaleUtil::localizeDate($oNews->getDateStart()));
			$oNewsTemplate->replaceIdentifier('author_name', $oNews->getUserRelatedByUpdatedBy()->getFullName());
		} else {
			$oNewsTemplate->replaceIdentifier('headline', 'Willkommen');
			$oNewsTemplate->replaceIdentifier('content', TagWriter::quickTag('p', array(), 'Some text bla bla'));
		}
		$oTemplate->replaceIdentifier('news', $oNewsTemplate);
	}

	private function renderSubjectsAndTeachers($oTemplate) {
		$oTemplate->replaceIdentifier('teacher_and_subjects_title', StringPeer::getString('class_detail.heading.subjects_and_teachers'));
		$oRowPrototype = $this->oPageType->constructTemplate('subject_class_item');
		foreach($this->oClass->getSubjectClasses() as $oClass) {
			$oRowTemplate = clone $oRowPrototype;
			$oRowTemplate->replaceIdentifier('class_name', $oClass->getName());
			$oRowTemplate->replaceIdentifier('subject_name', $oClass->getSubjectName());
			$oRowTemplate->replaceIdentifier('detail_link_subject', LinkUtil::link(array_merge($this->oNavigationItem->getLink(), array('faecher', $oClass->getSlug()))));
			foreach($oClass->getClassTeachersOrdered() as $i => $oClassTeacher) {
				if($i === 0) {
					$oTeacher = $oClassTeacher->getTeamMember();
					$oRowTemplate->replaceIdentifier('detail_link_teacher', LinkUtil::link(array_merge($this->oTeacherPage->getFullPathArray(), array($oTeacher->getSlug()))));
					$oRowTemplate->replaceIdentifier('teacher_name', $oTeacher->getFullName());
				}
			}
			$aHasContents[$oClass->getId()]['text'] = $oClass->latestUpdatedNews();
			$aHasContents[$oClass->getId()]['events'] = $oClass->latestUpdatedEvent();
			$aHasContents[$oClass->getId()]['documents'] = $oClass->latestUpdatedDocument();
			$aHasContents[$oClass->getId()]['links'] = $oClass->latestUpdatedLink();
			$sMaxUpdated = max($aHasContents[$oClass->getId()]);
			$oRowTemplate->replaceIdentifier('has_content', $sMaxUpdated == null ? "-" : LocaleUtil::localizeDate($sMaxUpdated));
			$oTemplate->replaceIdentifierMultiple('teacher_and_subject', $oRowTemplate);
		}
	}

	private function renderTeachersAndSubjects($oTemplate) {
		$oTemplate->replaceIdentifier('teacher_and_subjects_title', StringPeer::getString('class_detail.heading.teachers_and_subjects'));
		$oQuery = ClassTeacherQuery::create()->filterByUnitFromClass($this->oClass, false)->useTeamMemberQuery()->orderByLastName()->orderByFirstName()->endUse();
		$oRowPrototype = $this->oPageType->constructTemplate('teacher_and_subject');

		foreach($oQuery->find() as $oClassTeacher) {
			$oTeacher = $oClassTeacher->getTeamMember();
			$oRowTemplate = clone $oRowPrototype;
			$oRowTemplate->replaceIdentifier('detail_link_teacher', LinkUtil::link($oTeacher->getLink($this->oTeacherPage)));
			$oRowTemplate->replaceIdentifier('teacher_name', $oTeacher->getFullName());
			$oRowTemplate->replaceIdentifier('subject_name', $oClassTeacher->getFunctionName());
			$oRowTemplate->replaceIdentifier('detail_link_subject', '#');
			$oTemplate->replaceIdentifierMultiple('teacher_and_subject', $oRowTemplate);
		}
	}

	private function renderRecentReport($oTemplate) {
		$oEvent = FrontendEventQuery::create()->filterBySchoolClass($this->oClass)->joinEventDocument()->orderByUpdatedAt(Criteria::DESC)->findOne();
		if($oEvent === null) {
			return;
		}
		$oImage = $oEvent->getFirstImage()->getDocument();
		if(!$oImage) {
			return;
		}
		$oTemplate->replaceIdentifier('detail_link', LinkUtil::link($this->getClassEventLink($oEvent)));
		$oTemplate->replaceIdentifier('detail_link_title', $oEvent->getTitle());
		$oTemplate->replaceIdentifier('recent_report_image', TagWriter::quickTag('img', array('src' => $oImage->getDisplayUrl(array('max_width' => 300)), 'alt' => $oImage->getDescription(), 'title' => $oEvent->getTitle())));
	}

	private function getClassEventLink($oEvent) {
		return array_merge($this->oNavigationItem->getLink(), explode('-', $oEvent->getDateStart('Y-n-j')), array($oEvent->getSlug()));
	}

	private function renderUpcomingEvents($oTemplate, $iCount = 10) {
		$aEvents = FrontendEventQuery::create()->filterBySchoolClass($this->oClass)->upcomingOrOngoing()->orderByUpdatedAt()->limit($iCount)->find();
		$oTemplate->replaceIdentifier('events_overview', EventsFrontendModule::renderOverviewList($aEvents));
	}

	private function renderDocumentsAndLinks($oTemplate) {
		// Display documents if available
		$aDocuments = $this->oClass->getClassDocuments();
		if(count($aDocuments) > 0) {
			$oTemplate->replaceIdentifier('documents_title', StringPeer::getString('class_detail.heading.documents'));
			$oDocPrototype = $this->oPageType->constructTemplate('document');
			foreach($aDocuments as $oClassDocument) {
				$oDocument = $oClassDocument->getDocument();
				$oDocTemplate = clone $oDocPrototype;
				$oDocTemplate->replaceIdentifier('link', $oDocument->getDisplayUrl());
				$oDocTemplate->replaceIdentifier('title', "Dokument anschauen / runterladen");
				$oDocTemplate->replaceIdentifier('name', $oDocument->getName());
				$oTemplate->replaceIdentifierMultiple('documents', $oDocTemplate);
			}
		}
		// Display links if available
		$aLinks = $this->oClass->getClassLinks();
		if(count($aLinks) > 0) {
			$oTemplate->replaceIdentifier('links_title', StringPeer::getString('class_detail.heading.links'));
			$oLinkPrototype = $this->oPageType->constructTemplate('link');
			foreach($aLinks as $oClassLink) {
				$oLink = $oClassLink->getLink();
				$oLinkTemplate = clone $oLinkPrototype;
				$oLinkTemplate->replaceIdentifier('link', $oLink->getUrl());
				$oLinkTemplate->replaceIdentifier('title', "Link öffnen");
				$oLinkTemplate->replaceIdentifier('name', $oLink->getName());
				$oTemplate->replaceIdentifierMultiple('links', $oLinkTemplate);
			}
		}
	}


}
