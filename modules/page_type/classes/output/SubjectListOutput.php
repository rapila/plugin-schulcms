<?php

class SubjectListOutput extends ClassOutput {

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
		$oItemTemplate->replaceIdentifier('count_classes', $oSubject->countSchoolClasses());
		$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($this->oPage->getFullPathArray(array($oSubject->getSlug()))));

		// foreach($oSubject->getSchoolClasses() as $i => $oClass) {
		// 	$oItemTemplate->replaceIdentifierMultiple('items', $this->renderClassItem($oClass));
		// 	foreach($oClass->getClassTeachersOrdered() as $i => $oClassTeacher) {
		// 		if($i === 0) {
		// 			$oItemTemplate->replaceIdentifierMultiple('teachers', TagWriter::quickTag('a', array('href' => LinkUtil::link($oClassTeacher->getTeamMember()->getLink($this->oTeacherPage))), $oClassTeacher->getTeamMember()->getFullName()));
		// 		}
		// 	}
		// }
		return $oItemTemplate;
	}

	private function renderClassItem($oClass) {
		$oItemTemplate = clone $this->oClassItemPrototype;
		// add more identifiers for flexibility if necessary
		$oItemTemplate->replaceIdentifier('id', $oClass->getId());
		$oItemTemplate->replaceIdentifier('name', $oClass->getUnitName());
		$oItemTemplate->replaceIdentifier('class_type', $oClass->getClassType());
		$oItemTemplate->replaceIdentifier('class_type_key', StringUtil::normalizeToASCII($oClass->getClassType()));
		$oItemTemplate->replaceIdentifier('year', $oClass->getYearPeriod());
		$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($oClass->getLink($this->oPage)));
		$oItemTemplate->replaceIdentifier('detail_link_title', StringPeer::getString('class.view_detail').' '.$oClass->getUnitName());
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


	public function renderContext() {
	}
}
