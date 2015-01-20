<?php

class ClassSubjectsOutput extends ClassOutput {

	public function __construct(NavigationItem $oNavigationItem, ClassesPageTypeModule $oPageType) {
		parent::__construct($oNavigationItem, $oPageType);
	}

	public function renderContent() {
		$oTemplate = $this->oPageType->constructTemplate('subject_list', true);
		$oItemPrototype = $this->oPageType->constructTemplate('subject_list_item', true);
		$aSubjects = SubjectQuery::create()->filterByHasClasses()->distinct()->find();
		foreach($aSubjects as $oSubject) {
			// get all infos that are independent of teaching unit
			$oTemplate->replaceIdentifierMultiple('items', $this->renderItem($oSubject, clone $oItemPrototype));
		}
		return $oTemplate;
	}

	private function renderItem($oSubject, $oItemTemplate) {
		// add more identifiers for flexibility if necessary
		$oItemTemplate->replaceIdentifier('name', $oSubject->getName());
		$oItemTemplate->replaceIdentifier('short_name', $oSubject->getShortName());
		foreach($oSubject->getSchoolClasses() as $i => $oClass) {
			$oItemTemplate->replaceIdentifierMultiple('classes', TagWriter::quickTag('a', array('href' => "#"), $oClass->getClassName()));
			foreach($oClass->getClassTeachersOrdered() as $i => $oClassTeacher) {
				if($i === 0) {
					$oItemTemplate->replaceIdentifierMultiple('teachers', TagWriter::quickTag('a', array('href' => '#'), $oClassTeacher->getTeamMember()->getFullName()));
				}
			}
		}
		return $oItemTemplate;
	}

	public function renderContext() {
	}
}
