<?php

class ClassListOutput extends ClassOutput {

	public function __construct(NavigationItem $oNavigationItem, ClassesPageTypeModule $oPageType) {
		parent::__construct($oNavigationItem, $oPageType);
	}

	public function cacheIsOutdated($oCache) {
		return $oCache->isOlderThan($this->oPage) || $oCache->isOlderThan($this->listQuery());
	}

	public function renderContent() {
		$aClassTypes = null;
		$oTemplate = $this->oPageType->constructTemplate('list', true);
		$oTemplate->replaceIdentifier('title', FrontendManager::$CURRENT_NAVIGATION_ITEM->getTitle());
		$oItemPrototype = $this->oPageType->constructTemplate('list_item', true);

		$aClasses = self::listQuery($aClassTypes)->orderByUnitName()->find();

		// Prepare class type filter
		$aClassTypes = array();

		// Render classes
		foreach($aClasses as $oClass) {
			if(!in_array($oClass->getClassType(), $aClassTypes)) {
				$aClassTypes[] = $oClass->getClassType();
			}
			$oTemplate->replaceIdentifierMultiple('items', $this->renderItem($oClass, clone $oItemPrototype));
		}

		// Implement class type filter
		if($oTemplate->hasIdentifier('filters') && count($aClassTypes) > 1) {
			$oOptionPrototype = $this->oPageType->constructTemplate('filter_option', true);
			$oItemTemplate = clone $oOptionPrototype;
			$oItemTemplate->replaceIdentifier('id', '');
			$oItemTemplate->replaceIdentifier('name', StringPeer::getString('classes.filter.class_type.default'));
			$oTemplate->replaceIdentifierMultiple('filters', $oItemTemplate, null, Template::NO_NEWLINE|Template::NO_NEW_CONTEXT);

			foreach($aClassTypes as $sClassType) {
				$oItemTemplate = clone $oOptionPrototype;
				$oItemTemplate->replaceIdentifier('id', StringUtil::normalizeToASCII($sClassType));
				$oItemTemplate->replaceIdentifier('name', $sClassType);
				$oTemplate->replaceIdentifierMultiple('filters', $oItemTemplate, null, Template::NO_NEWLINE|Template::NO_NEW_CONTEXT);
			}
		}
		return $oTemplate;
	}

	private function renderItem($oClass, $oItemTemplate) {
		// add more identifiers for flexibility if necessary
		$oItemTemplate->replaceIdentifier('id', $oClass->getId());
		$oItemTemplate->replaceIdentifier('name', $oClass->getUnitName());
		$oItemTemplate->replaceIdentifier('class_type', $oClass->getClassType());
		$oItemTemplate->replaceIdentifier('class_type_key', StringUtil::normalizeToASCII($oClass->getClassType()));
		$oItemTemplate->replaceIdentifier('year', $oClass->getYearPeriod());
		$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($oClass->getLink($this->oPage)));
		$oItemTemplate->replaceIdentifier('detail_link_title', StringPeer::getString('class.view_detail').' '.$oClass->getUnitName(). ' '.$oClass->getYear());
		$oItemTemplate->replaceIdentifier('count_students', $oClass->countStudentsByUnitName());

		// get related class teacher links, in case there are 3 class teachers, to be just ;=)
		$iLimit = 3;
		$aClassTeachers = $oClass->getTeachersByUnitName(true, $iLimit+1);
		$iCountTeachers = count($aClassTeachers);
		$iCountMax = $iCountTeachers < $iLimit ? $iCountTeachers : $iLimit;
		foreach($aClassTeachers as $i => $oTeacher) {
			if($i < $iLimit) {
				$sFunctionAddon = $oTeacher->getIsClassTeacher() ? $oTeacher->getTeamMember()->getClassTeacherTitle() : $oTeacher->getFunctionName(true);
				if($sFunctionAddon != ''){
					$sFunctionAddon = ', '. $sFunctionAddon;
				}
				$oItemTemplate->replaceIdentifierMultiple('class_teacher_links', TagWriter::quickTag('a', array('title' => $oTeacher->getTeamMember()->getFullName().$sFunctionAddon, 'href' => LinkUtil::link(array_merge($this->oTeacherPage->getFullPathArray(), array($oTeacher->getTeamMember()->getSlug())))), $oTeacher->getTeamMember()->getFullNameShort()), null, Template::NO_NEWLINE);
				if($i < $iCountMax-1) {
					$oItemTemplate->replaceIdentifierMultiple('class_teacher_links', ', ', null, Template::NO_NEWLINE);
				}
			}
		}
		if($iCountTeachers > $iLimit) {
			$oItemTemplate->replaceIdentifierMultiple('class_teacher_links', ' '.StringPeer::getString('class.and_others_teachers'));
		}
		return $oItemTemplate;
	}

	public static function listQuery($aClassTypes = null, $mYear = true) {
		return SchoolClassQuery::create()->filterByClassTypeAndYear($aClassTypes, $mYear)->filterBySubjectId(null, Criteria::ISNULL)->hasTeachers(true);
	}

	public function renderContext() {
	}
}
