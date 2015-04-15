<?php

class ClassSubjectsOutput extends ClassOutput {
	public function __construct(NavigationItem $oNavigationItem, ClassesPageTypeModule $oPageType) {
		parent::__construct($oNavigationItem, $oPageType);
	}

	public function renderContent() {
		$this->oClass = $this->oNavigationItem->getClass();
		if(!$this->oClass) {
			return null;
		}
		$oTemplate = $this->oPageType->constructTemplate('subject_classes');
		$this->renderSubjects($oTemplate);
		return $oTemplate;
	}

	public function renderContext() {
		// do nothing, handle context in each subject class
	}

	private function renderSubjects($oTemplate) {
		$oTemplate->replaceIdentifier('title', "Fächerübersicht");

		$oItemPrototype = $this->oPageType->constructTemplate('class_subject_class_item');
		foreach($this->oClass->getSubjectClasses() as $oClass) {
			$oItemTemplate = clone $oItemPrototype;
			$oItemTemplate->replaceIdentifier('class_name', $oClass->getName());
			$oItemTemplate->replaceIdentifier('subject_name', $oClass->getSubjectName());
			$oItemTemplate->replaceIdentifier('detail_link_subject', LinkUtil::link($this->oNavigationItem->getLink())."#");
			foreach($oClass->getClassTeachersOrdered() as $i => $oClassTeacher) {
				if($i === 0) {
					$oTeacher = $oClassTeacher->getTeamMember();
					$oItemTemplate->replaceIdentifier('detail_link_teacher', LinkUtil::link(array_merge($this->oTeacherPage->getFullPathArray(), array($oTeacher->getSlug()))));
					$oItemTemplate->replaceIdentifier('teacher_name', $oTeacher->getFullName());
				}
			}
			$oItemTemplate->replaceIdentifier('news', $oClass->latestUpdatedNews());
			$oItemTemplate->replaceIdentifier('events', $oClass->latestUpdatedEvent());
			$oItemTemplate->replaceIdentifier('documents', $oClass->latestUpdatedDocument());
			$oItemTemplate->replaceIdentifier('links', $oClass->latestUpdatedLink());
			$oTemplate->replaceIdentifierMultiple('subject_class', $oItemTemplate);
		}
	}

}