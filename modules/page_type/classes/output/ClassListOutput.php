<?php

class ClassListOutput extends ClassOutput {

	public function __construct(NavigationItem $oNavigationItem, ClassesPageTypeModule $oPageType) {
		parent::__construct($oNavigationItem, $oPageType);
	}

	public function renderContent() {
		$aClassTypes = null;
		$oTemplate = $this->oPageType->constructTemplate('list', true);
		$oItemPrototype = $this->oPageType->constructTemplate('list_item', true);
		$aClasses = SchoolClassQuery::create()->filterByClassTypeIdYearAndSchool($aClassTypes)->find();
		foreach($aClasses as $oClass) {
			// get all infos that are independent of teaching unit
			$oTemplate->replaceIdentifierMultiple('items', $this->renderItem($oClass, clone $oItemPrototype));
		}
		return $oTemplate;
	}

	private function renderItem($oClass, $oItemTemplate) {
		// add more identifiers for flexibility if necessary
		$oItemTemplate->replaceIdentifier('name', $oClass->getUnitName());
		$oItemTemplate->replaceIdentifier('class_type', $oClass->getClassTypeName());
		$oItemTemplate->replaceIdentifier('year', $oClass->getYearPeriod());
		$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($oClass->getClassLink($this->oPage)));
		$oItemTemplate->replaceIdentifier('detail_link_title', StringPeer::getString('wns.class.view_detail').$oClass->getUnitName());
		$oItemTemplate->replaceIdentifier('count_students', $oClass->countStudentsByUnitName());

		// get related class teacher links, in case there are 3 class teachers, to be just ;=)
		$iLimit = 2;
		$aClassTeachers = $oClass->getTeachersByUnitName(true, $iLimit+1);
		$iCountTeachers = count($aClassTeachers);
		ErrorHandler::log('$iCountTeachers', $iCountTeachers);
		$iCountMax = $iCountTeachers < $iLimit ? $iCountTeachers : $iLimit;
		foreach($aClassTeachers as $i => $oTeacher) {
			if($i < $iLimit) {
				$sFunctionAddon = $oTeacher->getIsClassTeacher() ? $oTeacher->getTeamMember()->getClassTeacherTitle() : $oTeacher->getFunctionName(true);
				if($sFunctionAddon != ''){
				  $sFunctionAddon = ', '. $sFunctionAddon;
				}
				$oItemTemplate->replaceIdentifierMultiple('class_teacher_links', TagWriter::quickTag('a', array('title' => $oTeacher->getTeamMember()->getFullName().$sFunctionAddon, 'href' => LinkUtil::link(array_merge($this->oTeamPage->getFullPathArray(), array($oTeacher->getTeamMember()->getSlug())))), $oTeacher->getTeamMember()->getFullNameShort()), null, Template::NO_NEWLINE);
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

	public function renderContext() {
	}
}