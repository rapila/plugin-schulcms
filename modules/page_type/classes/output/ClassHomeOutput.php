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
		switch($this->oPageType->getDisplayType()) {
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

		// Display ancestor class link
		if($this->oClass->getAncestorClassId() != null) {
			$oAncestorClass = SchoolClassQuery::create()->findPk($this->oClass->getAncestorClassId());
			if($oAncestorClass) {
				$oLink = TagWriter::quickTag('a', array('href' => LinkUtil::link($oAncestorClass->getLink($this->oPageType->getPage()))), $oAncestorClass->getClassNameWithYear());
				$oTemplate->replaceIdentifier('ancestor_class_link', $oLink);
			}
		}
		// Display successor class link
		if(!$this->oClass->isCurrent()) {
			$oSuccessorClass = SchoolClassQuery::create()->findOneByAncestorClassId($this->oClass->getId());
			if($oSuccessorClass) {
				$oLink = TagWriter::quickTag('a', array('href' => LinkUtil::link($oSuccessorClass->getLink())), $oSuccessorClass->getClassNameWithYear());
				$oTemplate->replaceIdentifier('successor_class_link', $oLink);
			}
		}

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
			if($i > 0) {
				$oTemplate->replaceIdentifierMultiple('class_teacher', '<br />', null, Template::NO_HTML_ESCAPE);
			}
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
		$oTemplate->replaceIdentifier('subject_teasers_title', StringPeer::getString('class_detail.heading.subjects_and_teachers'));
		$oRowPrototype = $this->oPageType->constructTemplate('class_subject_teaser_item');
		foreach($this->oClass->getSubjectClasses() as $oClass) {
			$oRowTemplate = clone $oRowPrototype;
			$oRowTemplate->replaceIdentifier('class_name', $oClass->getName());
			$oRowTemplate->replaceIdentifier('subject_name', $oClass->getSubjectName());
			$oRowTemplate->replaceIdentifier('detail_link_subject', LinkUtil::link($oClass->getSubjectClassLink()));
			foreach($oClass->getClassTeachersOrdered() as $i => $oClassTeacher) {
				if($i === 0) {
					$oTeacher = $oClassTeacher->getTeamMember();
					$oRowTemplate->replaceIdentifier('detail_link_teacher', LinkUtil::link(array_merge($this->oTeacherPage->getFullPathArray(), array($oTeacher->getSlug()))));
					$oRowTemplate->replaceIdentifier('teacher_name', $oTeacher->getFullName());
				}
			}
			$oRowTemplate->replaceIdentifier('count_news', $oClass->countNews());
			$oRowTemplate->replaceIdentifier('count_events', $oClass->getCountEvents());
			$oRowTemplate->replaceIdentifier('count_documents', $oClass->getCountDocuments());
			$oRowTemplate->replaceIdentifier('count_links', $oClass->getCountLinks());

			$aHasContents[$oClass->getId()]['text'] = $oClass->latestUpdatedNews();
			$aHasContents[$oClass->getId()]['events'] = $oClass->latestUpdatedEvent();
			$aHasContents[$oClass->getId()]['documents'] = $oClass->latestUpdatedDocument();
			$aHasContents[$oClass->getId()]['links'] = $oClass->latestUpdatedLink();
			$sMaxUpdated = max($aHasContents[$oClass->getId()]);
			$oRowTemplate->replaceIdentifier('has_content', $sMaxUpdated == null ? "-" : LocaleUtil::localizeDate($sMaxUpdated));
			$oTemplate->replaceIdentifierMultiple('subject_teasers', $oRowTemplate);
		}
	}

	private function renderRecentReport($oTemplate) {
		$oEvent = FrontendEventQuery::create()->past()->filterBySchoolClass($this->oClass)->joinEventDocument()->orderByUpdatedAt(Criteria::DESC)->findOne();
		if($oEvent === null) {
			return;
		}
		$oImage = $oEvent->getFirstImage()->getDocument();
		if(!$oImage) {
			return;
		}
		$oTemplate->replaceIdentifier('detail_link', LinkUtil::link($oEvent->getLink()));
		$oTemplate->replaceIdentifier('detail_link_title', $oEvent->getTitle());
		$oTemplate->replaceIdentifier('recent_report_image', TagWriter::quickTag('img', array('src' => $oImage->getDisplayUrl(array('max_width' => 300)), 'alt' => $oImage->getDescription(), 'title' => $oEvent->getTitle())));
	}

	private function renderUpcomingEvents($oTemplate, $iCount = 10) {
		$aEvents = FrontendEventQuery::create()->filterBySchoolClass($this->oClass)->upcomingOrOngoing()->orderByUpdatedAt()->limit($iCount)->find();
		$oTemplate->replaceIdentifier('events_overview', EventsFrontendModule::renderOverviewList($aEvents, 100, StringPeer::getString('class.no_future_events_available')));
	}

	private function renderDocumentsAndLinks($oTemplate) {
		// Display documents if available
		$aDocuments = $this->oClass->getClassDocuments();
		$aLinks = $this->oClass->getClassLinksOrdered();
		$iDocumentCount = count($aDocuments);
		$iLinkCount = count($aLinks);
		$iContainerClass = $iLinkCount === 0 || $iDocumentCount === 0 ? ' single_container' : '';

		if($iDocumentCount > 0) {
			$oTemplate->replaceIdentifier('documents_title', StringPeer::getString('class_detail.heading.documents'));
			$oTemplate->replaceIdentifier('single_container_class', $iContainerClass);
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
		if($iLinkCount > 0) {
			$oTemplate->replaceIdentifier('links_title', StringPeer::getString('class_detail.heading.links'));
			$oTemplate->replaceIdentifier('single_container_class', $iContainerClass);
			$oLinkPrototype = $this->oPageType->constructTemplate('link');
			foreach($aLinks as $oLink) {
				$oLinkTemplate = clone $oLinkPrototype;
				$oLinkTemplate->replaceIdentifier('link', $oLink->getUrl());
				$oLinkTemplate->replaceIdentifier('title', "Link öffnen");
				$oLinkTemplate->replaceIdentifier('name', $oLink->getName());
				$oTemplate->replaceIdentifierMultiple('links', $oLinkTemplate);
			}
		}
	}


}
