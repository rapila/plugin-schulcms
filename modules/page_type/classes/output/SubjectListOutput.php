<?php

class SubjectListOutput extends ClassOutput {

	public function __construct(NavigationItem $oNavigationItem, ClassesPageTypeModule $oPageType) {
		parent::__construct($oNavigationItem, $oPageType);
	}

	public function renderContent() {
		$oTemplate = $this->oPageType->constructTemplate('subject_list', true);
		$oTemplate->replaceIdentifier('title', $this->oNavigationItem->getTitle());
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
		$oItemTemplate->replaceIdentifier('count_classes', $oSubject->countSchoolClasses());
		$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($this->oPage->getFullPathArray(array($oSubject->getSlug()))));

		return $oItemTemplate;
	}

	public function renderContext() {
	}
}
