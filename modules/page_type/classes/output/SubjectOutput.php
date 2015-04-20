<?php

class SubjectOutput extends ClassOutput {

	public function __construct(NavigationItem $oNavigationItem, ClassesPageTypeModule $oPageType) {
		parent::__construct($oNavigationItem, $oPageType);
	}

	public function renderContent() {
		$oSubject = SubjectQuery::create()->findPk($this->oNavigationItem->getId());
		if(!$oSubject) {
			return null;
		}
		$oTemplate = $this->oPageType->constructTemplate('subject_class_list');
		$oClassPrototype = $this->oPageType->constructTemplate('subject_class_item');
		foreach($oSubject->getSchoolClasses() as $oClass) {
			$oTemplate->replaceIdentifierMultiple('items', $this->renderItem($oClass, clone $oClassPrototype));
		}
		return $oTemplate;
	}

	public function renderContext() {
		// do nothing, handle context in each subject class
	}

	private function renderItem($oClass, $oItemTemplate) {
		// add more identifiers for flexibility if necessary
		$oItemTemplate->replaceIdentifier('id', $oClass->getId());
		$oItemTemplate->replaceIdentifier('name', $oClass->getSubjectClassName(true));
		$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link(array_merge($this->oNavigationItem->getLink(),array($oClass->getSlug()))));
		$oItemTemplate->replaceIdentifier('detail_link_title', StringPeer::getString('class.view_detail').' '.$oClass->getUnitName());
		$oItemTemplate->replaceIdentifier('count_students', $oClass->countStudentsByUnitName());

		// get related class teacher links, in case there are 3 class teachers, to be just ;=)
		$aClassTeachers = $oClass->getTeachersByUnitName(true, 1);
		foreach($aClassTeachers as $i => $oTeacher) {
			$oLink = TagWriter::quickTag('a', array('title' => $oTeacher->getTeamMember()->getFullName(), 'href' => LinkUtil::link(array_merge($this->oTeacherPage->getFullPathArray(), array($oTeacher->getTeamMember()->getSlug())))), $oTeacher->getTeamMember()->getFullNameShort());
			$oItemTemplate->replaceIdentifierMultiple('class_teacher_links', $oLink);
		}
		return $oItemTemplate;
	}
}