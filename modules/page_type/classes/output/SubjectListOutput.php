<?php

class SubjectListOutput extends ClassOutput {

	public function __construct(NavigationItem $oNavigationItem, ClassesPageTypeModule $oPageType) {
		parent::__construct($oNavigationItem, $oPageType);
	}

	public function renderContent() {
		$oTemplate = $this->oPageType->constructTemplate('subject_list', true);
		$oTemplate->replaceIdentifier('title', $this->oNavigationItem->getTitle());
		$oItemPrototype = $this->oPageType->constructTemplate('subject_list_item', true);
		$aSubjectToCategoryMapping = $this->subjectCategoryMapping();
		$aSubjects = SubjectQuery::create()->filterByHasClasses()->distinct()->find();
		$aUsedCategories = array();
		foreach($aSubjects as $oSubject) {
			// get all infos that are independent of teaching unit
			$oTemplate->replaceIdentifierMultiple('items', $this->renderItem($oSubject, clone $oItemPrototype, $aSubjectToCategoryMapping, $aUsedCategories));
		}
		$aUsedCategories = array_unique($aUsedCategories);
		sort($aUsedCategories, SORT_LOCALE_STRING);
		foreach($aUsedCategories as $sUsedCategory) {
			$oFilterTemplate = $this->oPageType->constructTemplate('filter_option');
			$oFilterTemplate->replaceIdentifier('id', $sUsedCategory);
			$oFilterTemplate->replaceIdentifier('name', $sUsedCategory);
			$oTemplate->replaceIdentifierMultiple('filters', $oFilterTemplate, null, Template::NO_NEW_CONTEXT);
		}
		return $oTemplate;
	}

	private function renderItem($oSubject, $oItemTemplate, &$aSubjectToCategoryMapping, &$aUsedCategories) {
		$sName = $oSubject->getName();
		if(!isset($aSubjectToCategoryMapping[$sName])) {
			$aSubjectToCategoryMapping[$sName] = array();
		}
		$aCategories = $aSubjectToCategoryMapping[$sName];
		$aUsedCategories = array_merge($aUsedCategories, $aCategories);
		// add more identifiers for flexibility if necessary
		$oItemTemplate->replaceIdentifier('name', $sName);
		$oItemTemplate->replaceIdentifier('short_name', $oSubject->getShortName());
		$oItemTemplate->replaceIdentifier('count_classes', $oSubject->countSchoolClasses());
		$oItemTemplate->replaceIdentifier('categories',  json_encode($aCategories));
		$oItemTemplate->replaceIdentifier('id',  $oSubject->getId());
		$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($this->oPage->getFullPathArray(array($oSubject->getSlug()))));

		return $oItemTemplate;
	}

	private function subjectCategoryMapping() {
		$aCategories = Settings::getSetting('subject-groups', null, array(), 'schulcms');
		$aSubjectToCategoryMapping = array();
		foreach($aCategories as $sCategoryName => $aCategoryMapping) {
			foreach($aCategoryMapping as $sSubjectName) {
				if(!isset($aSubjectToCategoryMapping[$sSubjectName])) {
					$aSubjectToCategoryMapping[$sSubjectName] = array();
				}
				$aSubjectToCategoryMapping[$sSubjectName][] = $sCategoryName;
			}
		}
		return $aSubjectToCategoryMapping;
	}

	public function renderContext() {
	}
}
