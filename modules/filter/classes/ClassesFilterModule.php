<?php
require_once PLUGINS_DIR.'/schulcms/modules/page_type/classes/ClassNavigationItem.php';

class ClassesFilterModule extends FilterModule {

	public function onNavigationItemChildrenRequested($oNavigationItem) {
		if($oNavigationItem instanceof PageNavigationItem && $oNavigationItem->getMe()->getPageType() === 'classes') {
			$oQuery = SchoolClassQuery::create()->filterByClassTypeYearAndSchool(null)->filterBySubjectId(null, Criteria::ISNULL)->select('Slug');
			foreach($oQuery->find() as $sSlug) {
				$oClass = SchoolClassQuery::create()->filterBySlug($sSlug)->findOne();
				$oNavItem = new ClassNavigationItem($sSlug, $oClass->getFullClassName().' Home', null, 'root', $oClass->getUnitName(), true, false);
				$oNavigationItem->addChild($oNavItem);
			}
		}
		if(!($oNavigationItem instanceof ClassNavigationItem)) {
			return;
		}
		$aMode = explode('_', $oNavigationItem->getMode());

		// Render all years of current class
		if($aMode[0] === 'root') {
			$oPageType = PageTypeModule::getModuleInstance('classes', $oNavigationItem->getParent()->getMe(), $oNavigationItem);
			$sDisplayType = $oPageType->config();
			$sSlug = $oNavigationItem->getName();
			$oCriteria = SchoolClassQuery::create()->filterByClassTypeYearAndSchool()->filterBySlug($sSlug)->filterByHasStudents()->orderByYear(Criteria::DESC);
			foreach($oCriteria->find() as $oClass) {
				$oNavigationItem->addChild(new ClassNavigationItem($oClass->getYear(), 'Klasse '.$oClass->getUnitName().' Home', $oClass, 'home_'.$sDisplayType, $oClass->getFullClassName()));
			}
		} else if($aMode[0] === 'home') {
			// Render specific class year subpage items
			$this->renderClassNavigationItems($oNavigationItem, $aMode[1]);
		} else if($oNavigationItem->getMode() === 'anlaesse') {
			// Render related events
			$this->renderEventNavigationItems($oNavigationItem);
		} else if($oNavigationItem->getMode() === 'faecher') {
			// Render related subjects
			$this->renderSubjectNavigationItems($oNavigationItem);
		}
	}

	private function renderClassNavigationItems($oNavigationItem, $sHomeMode) {
		$oClass = $oNavigationItem->getClass();
		// always display as navigation items
		$oNavigationItem->addChild(ClassNavigationItem::create('anlaesse', 'Anlässe', $oClass, SchoolClass::CLASS_EVENTS_IDENTIFIER));
		$oNavigationItem->addChild(ClassNavigationItem::create('feed', 'RSS-Feed', $oClass, 'feed')->setIndexed(false));
		// only display if display_mode is "full"
		if($sHomeMode === 'full') {
			$oNavigationItem->addChild(ClassNavigationItem::create('faecher', 'Fächer', $oClass, SchoolClass::CLASS_SUBJECTS_IDENTIFIER));
			$oNavigationItem->addChild(ClassNavigationItem::create('dokumente', 'Dokumente', $oClass, SchoolClass::CLASS_DOCUMENTS_IDENTIFIER));
			$oNavigationItem->addChild(ClassNavigationItem::create('links', 'Links', $oClass, SchoolClass::CLASS_LINKS_IDENTIFIER));
		}
	}

	private function renderEventNavigationItems($oNavigationItem) {
		$oClass = $oNavigationItem->getClass();
		foreach(FrontendEventQuery::create()->filterBySchoolClass($oClass)->find() as $oEvent) {
			$oNavigationItem->addChild(ClassNavigationItem::create($oEvent->getSlug(), $oEvent->getTitle(), $oClass, 'event')->setEvent($oEvent)->setVisible(false));
		}
	}

	private function renderSubjectNavigationItems($oNavigationItem) {
		// refactor to improve performance, check url, etc
		foreach($oNavigationItem->getClass()->getSubjectClasses() as $oClass) {
			$oNavigationItem->addChild(ClassNavigationItem::create($oClass->getSlug(), $oClass->getName(), $oClass, 'faecher')->setEvent($oEvent)->setVisible(false));
		}
	}

	public function onPageHasBeenSet($oCurrentPage, $bIsNotFound, $oNavigationItem) {
		if($bIsNotFound || !($oNavigationItem instanceof ClassNavigationItem) || $oNavigationItem->getMode() === 'root') {
			return;
		}
		$oClass = $oNavigationItem->getClass();
		// Add the feed
		if($oNavigationItem->getMode() === 'feed') {
			$oQuery = FrontendEventQuery::create()->filterBySchoolClass($oClass);
			$oFeed = new EventsFileModule(null, $oNavigationItem, $oQuery);
			$oFeed->renderFile();exit;
		}
		// Link to the feed
		$oHomeNavigationItem = $oNavigationItem;
		while(!StringUtil::startsWith($oHomeNavigationItem->getMode(), 'home_')) {
			$oHomeNavigationItem = $oHomeNavigationItem->getParent();
		}
		$oFeedItem = $oHomeNavigationItem->namedChild('feed');

		ResourceIncluder::defaultIncluder()->addCustomResource(array('template' => 'feed', 'location' => LinkUtil::link($oFeedItem->getLink())));
	}

	public function onLinkOperationCheck($sOperation, $oOnObject, $oUser, $aContainer) {
		$bIsAllowed = &$aContainer[0];
		if($bIsAllowed) {
			return;
		}
		if($oOnObject->getLinkCategoryId() !== SchoolSiteConfig::getClassLinkCategoryId()) {
			return;
		}

		if($sOperation === 'insert') {
			$bIsAllowed = true;
			return;
		}
		$oClassLink = $oOnObject->getClassLinks();
		if(!count($oClassLink)) {
			return;
		}
		$bIsAllowed = $oClassLink[0]->mayOperate($sOperation, $oUser);
	}
}