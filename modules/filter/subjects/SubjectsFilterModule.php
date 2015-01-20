<?php
require_once PLUGINS_DIR.'/schulcms/modules/page_type/subjects/classes/SubjectNavigationItem.php';

class SubjectsFilterModule extends FilterModule {

	public function onNavigationItemChildrenRequested($oNavigationItem) {
		if($oNavigationItem instanceof PageNavigationItem && $oNavigationItem->getMe()->getPageType() === 'subjects') {

			foreach(SubjectQuery::create()->filterByHasClasses()->distinct()->select(array('Slug', 'Name', 'ShortName'))->find() as $aData) {
				$oNavigationItem->addChild(new SubjectNavigationItem($aData['Slug'], $aData['Name'], null, 'root', null, false, false));
			}
		}
		if(!($oNavigationItem instanceof SubjectNavigationItem)) {
			return;
		}
		// handle classes
	}

	public function onPageHasBeenSet($oCurrentPage, $bIsNotFound, $oNavigationItem) {
		if($bIsNotFound || !($oNavigationItem instanceof SubjectNavigationItem)) {
			return;
		}
	}
}