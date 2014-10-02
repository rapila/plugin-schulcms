<?php

class ClassHomeOutput extends ClassOutput {
	public function __construct(NavigationItem $oNavigationItem, ClassesPageTypeModule $oPageType) {
		parent::__construct($oNavigationItem, $oPageType);
	}

	public function renderContent() {
		$oTemplate = $this->oPageType->constructTemplate('detail.home_content');
		$oClass = $this->oNavigationItem->getClass();
		if(!$oClass) {
			return null;
		}
		$oTemplate->replaceIdentifier('count_students', $oClass->countStudentsByUnitName());
		foreach($oClass->getClassTeachersOrdered() as $oClassTeacher) {
			$oTeacher = $oClassTeacher->getTeamMember();
			$oTeacherLink = TagWriter::quickTag('a', array('href' => LinkUtil::link($oTeacher->getLink($this->oTeacherPage)), 'title' => StringPeer::getString('team_member.link_to'). ' '. $oTeacher->getFullName()), $oTeacher->getFullName());
			$oTemplate->replaceIdentifierMultiple('class_teachers', $oTeacherLink);
		}
		if($oSchedule = $oClass->getDocumentRelatedByClassScheduleId()) {
			$oTemplate->replaceIdentifier('schedule', TagWriter::quickTag('a', array('href' => $oSchedule->getDisplayUrl(), 'class' => 'pdf', 'rel' => 'document', 'title' => StringPeer::getString('class_detail.schedule_download')), StringPeer::getString('class_detail.schedule')));
		}
		if($oScheduleExtra = $oClass->getDocumentRelatedByWeekScheduleId()) {
			$oTemplate->replaceIdentifier('schedule_extra', TagWriter::quickTag('a', array('href' => $oSchedule->getDisplayUrl(), 'class' => 'pdf', 'rel' => 'document', 'title' => StringPeer::getString('class_detail.schedule_extra_download')), StringPeer::getString('class_detail.schedule_extra')));
		}

		$oNews = FrontendNewsQuery::create()->current()->filterBySchoolClassId($oClass->getId())->findOne();
		$oNewsTemplate = $this->oPageType->constructTemplate('news_detail');
		if($oNews) {
			$oNewsTemplate->replaceIdentifier('headline', $oNews->getHeadline());
			$sContent = '';
			if(is_resource($oNews->getBody())) {
				$sContent = stream_get_contents($oNews->getBody());
			}
			$oNewsTemplate->replaceIdentifier('content', RichtextUtil::parseStorageForFrontendOutput($sContent));
			$oNewsTemplate->replaceIdentifier('date', LocaleUtil::localizeDate($oNews->getDateStart()));
			$oNewsTemplate->replaceIdentifier('author_name', $oNews->getUserRelatedByUpdatedBy()->getFullName());
		} else {
			$oNewsTemplate->replaceIdentifier('headline', 'Willkommen');
			$oNewsTemplate->replaceIdentifier('content', TagWriter::quickTag('p', array(), 'Some text bla bla'));
		}

		$oRowPrototype = $this->oPageType->constructTemplate('teacher_and_subject');
		$oCriteria = new Criteria();
		$oCriteria->addAscendingOrderByColumn(TeamMemberPeer::LAST_NAME);

		$oQuery = ClassTeacherQuery::create()->filterByUnitFromClass($oClass, false)->useTeamMemberQuery()->orderByLastName()->orderByFirstName()->endUse();

		foreach($oQuery->find() as $oClassTeacher) {
			$oTeacher = $oClassTeacher->getTeamMember();
			$oRowTemplate = clone $oRowPrototype;
			if(is_object($oTeacher)) {
				ErrorHandler::log('teammember', $oTeacher->getFullName());
			} else {
				Util::dumpAll('teammember no object', $oTeacher);
			}
			$oRowTemplate->replaceIdentifier('detail_link_teacher', LinkUtil::link($oTeacher->getLink($this->oTeacherPage)));
			$oRowTemplate->replaceIdentifier('teacher_name', $oTeacher->getFullName());
			$oRowTemplate->replaceIdentifier('detail_link_subject', '#');
			$oRowTemplate->replaceIdentifier('subject_name', 'Fachname');
			$oTemplate->replaceIdentifierMultiple('teacher_and_subject', $oRowTemplate);
		}
		return $oTemplate;
	}

	public function renderContext() {
		$oTemplate = $this->oPageType->constructTemplate('detail.home_context');
		return $oTemplate;
	}
}