<?php

class SubjectOutput extends ClassOutput {

	public function __construct(NavigationItem $oNavigationItem, ClassesPageTypeModule $oPageType) {
		parent::__construct($oNavigationItem, $oPageType);
	}

	public function renderContent() {
		$oSubject = SubjectQuery::create()->findPk($this->oNavigationItem->getSubjectId());
		if(!$oSubject) {
			return null;
		}
		$oTemplate = $this->oPageType->constructTemplate('subject_class_list');
		$oTemplate->replaceIdentifier('title', $this->oNavigationItem->getTitle());
		$oClassPrototype = $this->oPageType->constructTemplate('subject_class_item');

		// Render a list of only the navigation items that set bShowInList to true (have classes in the current year)
		foreach($this->oNavigationItem->getChildren(null, false, true) as $oNavigationItem) {
			if(!$oNavigationItem->getShowInList()) {
				continue;
			}
			$oTemplate->replaceIdentifierMultiple('items', $this->renderItem($oNavigationItem, $oNavigationItem->getClass(), clone $oClassPrototype));
		}
		return $oTemplate;
	}

	public function renderContext() {
		// do nothing, handle context in each subject class
	}

	private function renderItem($oNavigationItem, $oClass, $oItemTemplate) {
		// add more identifiers for flexibility if necessary
		$oItemTemplate->replaceIdentifier('id', $oClass->getId());
		$oItemTemplate->replaceIdentifier('name', $oClass->getSubjectClassName(true));
		
		$sLink = $oClass->getLink();
		if($sLink) {
			$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($sLink));
		}
		$oItemTemplate->replaceIdentifier('detail_link_title', TranslationPeer::getString('class.view_detail').' '.$oClass->getUnitName());

		$oItemTemplate->replaceIdentifier('count_students', $oClass->countStudentsByUnitName());

		// get related class teacher links, in case there are 3 class teachers, to be just ;=)
		$aClassTeachers = $oClass->getTeachersByUnitName(true, 1);
		foreach($aClassTeachers as $i => $oTeacher) {
			$oLink = TagWriter::quickTag('a', array('title' => $oTeacher->getTeamMember()->getFullName(), 'href' => LinkUtil::link($oTeacher->getTeamMember()->getLink($this->oTeacherPage))), $oTeacher->getTeamMember()->getFullNameShort());
			$oItemTemplate->replaceIdentifierMultiple('class_teacher_links', $oLink);
		}
		return $oItemTemplate;
	}
}
