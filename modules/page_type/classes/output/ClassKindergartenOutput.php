<?php

class ClassKindergartenOutput extends ClassOutput {
	public function __construct(NavigationItem $oNavigationItem, ClassesPageTypeModule $oPageType) {
		parent::__construct($oNavigationItem, $oPageType);
	}

	public function renderContent() {
		$oTemplate = $this->oPageType->constructTemplate('detail.kindergarten_content');
		$this->oClass = $this->oNavigationItem->getClass();
		if(!$this->oClass) {
			return null;
		}
		$this->renderClassInfo($oTemplate);
		$this->renderSchedules($oTemplate);
		$this->renderClassNews($oTemplate);
		$this->renderDocumentsAndLinks($oTemplate);
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
			$oTemplate->replaceIdentifier('schedule_extra', TagWriter::quickTag('a', array('href' => $oSchedule->getDisplayUrl(), 'class' => 'pdf', 'rel' => 'document', 'title' => StringPeer::getString('class_detail.schedule_extra_download')), StringPeer::getString('class_detail.schedule_extra')));
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

	private function renderDocumentsAndLinks($oTemplate) {
		// Display documents if available
		$aDocuments = $this->oClass->getClassDocuments();
		if(count($aDocuments) > 0) {
			$oTemplate->replaceIdentifier('documents_title', StringPeer::getString('class_detail.heading.documents'));
			$oDocPrototype = $this->oPageType->constructTemplate('document');
			foreach($aDocuments as $oClassDocument) {
				$oDocument = $oClassDocument->getDocument();
				$oDocTemplate = clone $oDocPrototype;
				$oDocTemplate->replaceIdentifier('href', $oDocument->getDisplayUrl());
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
				$oLinkTemplate->replaceIdentifier('href', $oLink->getUrl());
				$oLinkTemplate->replaceIdentifier('title', "Link öffnen");
				$oLinkTemplate->replaceIdentifier('name', $oLink->getName());
				$oTemplate->replaceIdentifierMultiple('links', $oLinkTemplate);
			}
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
		$oItemPrototype = $this->oPageType->constructTemplate('event_teaser');
		$oDatePrototype = $this->oPageType->constructTemplate('date');

		$oQuery = FrontendEventQuery::create()->filterBySchoolClass($this->oClass)->upcomingOrOngoing()->orderByUpdatedAt()->limit($iCount);
		foreach($oQuery->find() as $oEvent) {
			$oItemTemplate = clone $oItemPrototype;
			$oDate = clone $oDatePrototype;
			$oDate->replaceIdentifier('date_day', strftime("%d",$oEvent->getDateStart('U')));
			$oDate->replaceIdentifier('date_month', strftime("%b",$oEvent->getDateStart('U')));
			$oItemTemplate->replaceIdentifier('date_item', $oDate);
			$oItemTemplate->replaceIdentifier('title', $oEvent->getTitle());
			$oItemTemplate->replaceIdentifier('description', RichtextUtil::parseStorageForFrontendOutput($oEvent->getBodyShort()));
			$oTemplate->replaceIdentifierMultiple('event_items', $oItemTemplate);
		}
	}

}