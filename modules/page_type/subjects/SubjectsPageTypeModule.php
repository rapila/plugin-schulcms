<?php
require_once __DIR__.'/classes/SubjectNavigationItem.php';

class SubjectsPageTypeModule extends ClassesPageTypeModule {
	public function __construct(Page $oPage = null, NavigationItem $oNavigationItem = null) {
		$this->sMode =
		parent::__construct($oPage, $oNavigationItem);
	}

	public function display(Template $oTemplate, $bIsPreview = false) {
		parent::display($oTemplate, $bIsPreview, 'list_by_subjects');
	}
}