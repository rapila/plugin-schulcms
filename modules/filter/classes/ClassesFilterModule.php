<?php
class ClassesFilterModule extends FilterModule {

	const CLASS_EVENTS_IDENTIFIER = 'events';
	const CLASS_LOCATION_IDENTIFIER = 'location';
	const CLASS_MATERIALS_IDENTIFIER = 'materials';

	public function onNavigationItemChildrenRequested($oNavigationItem) {
		if($oNavigationItem instanceof PageNavigationItem && $oNavigationItem->getType() === 'classes') {
			$oPageType = PageTypeModule::getModuleInstance('classes', $oNavigationItem->getMe(), $oNavigationItem);
			$aOptions = $oPageType->config();
			$sDisplayType = isset($aOptions['display_type']) ? $aOptions['display_type'] : null;
			$sClassType = isset($aOptions['class_type']) ? $aOptions['class_type'] : null;

			// Render subjects or school classes
			if($sClassType === 'subject') {
				$oQuery = SubjectQuery::create()->filterByHasClasses(true, null)->select(array('Id', 'Slug', 'Name'));
				foreach($oQuery->find() as $aData) {
					$oNavigationItem->addChild(SubjectNavigationItem::create($aData['Slug'], $aData['Name'], $aData['Id'], $sClassType));
				}
			} else {
				$aClasses = ClassListOutput::listQuery(null, null)->find();
				$this->renderClassNavigationItems($oNavigationItem, $aClasses, $sDisplayType);
			}
		} // Render subject class navigation items
		else if($oNavigationItem instanceof SubjectNavigationItem) {
			$oSubject = SubjectQuery::create()->findPk($oNavigationItem->getSubjectId());

			$oJoin = new Join();
			$oJoin->setJoinType(Criteria::LEFT_JOIN);
			$oJoin->addExplicitCondition('school_classes', 'slug', null, 'school_classes', 'slug', 'max_year_class');
			// Filter out all but the latest year (per slug)
			$oJoin->addCondition('year', 'year', Criteria::LESS_THAN);
			$oQuery = SchoolClassQuery::create()
				->filterByDisplayCondition(false, null)
				->filterBySubjectId($oSubject->getId())
				->addJoinObject($oJoin)
				->where('max_year_class.id IS NULL')
				->groupBySlug();

			$aSchoolClasses = $oQuery->find();
			\FilterModule::getFilters()->handleSubjectClassesFoundForNavigationItem($oNavigationItem, $oQuery, array(&$aSchoolClasses));
			$this->renderClassNavigationItems($oNavigationItem, $aSchoolClasses, $oNavigationItem->getMode(), SchoolPeer::getCurrentYear());
		}

		if(!($oNavigationItem instanceof ClassNavigationItem)) {
			return;
		}
		// Render all years of current class
		if($oNavigationItem->getMode() === 'root') {
			$sSlug = $oNavigationItem->getName();
			$oCriteria = SchoolClassQuery::create()->hasStudents()->filterBySlug($sSlug)->orderByYear(Criteria::DESC);
			foreach($oCriteria->find() as $oClass) {
				$sName = $oClass->getFullClassName(true);
				$oClassItem = new ClassNavigationItem($oClass->getYear(), $oClass->getFullClassName().' Home', $oClass, 'home', $oNavigationItem->getDisplayType(), $sName);
				$oClassItem->setVisible($oClass->isCurrent());
				$oNavigationItem->addChild($oClassItem);
			}
		} else if($oNavigationItem->getMode() === 'home') {
			// Render specific class year subpage items
			$this->renderClassPageItems($oNavigationItem);
		}
	}

	public function onNavigationItemChildrenCacheDetectOutdated($oNavigationItem, $oCache, $aContainer) {
		$bIsOutdated = &$aContainer[0];
		if($bIsOutdated) {
			return;
		}
		if($oNavigationItem instanceof PageNavigationItem && $oNavigationItem->getType() === 'classes') {
			$oPage = $oNavigationItem->getMe();
			$bIsOutdated = $oCache->isOlderThan(PagePropertyQuery::create()->filterByPage($oPage));
			if($bIsOutdated) {
				return;
			}
			$oPageType = PageTypeModule::getModuleInstance('classes', $oPage, $oNavigationItem);
			$aOptions = $oPageType->config();
			$sClassType = isset($aOptions['class_type']) ? $aOptions['class_type'] : null;

			// Subjects or school classes
			if($sClassType === 'subject') {
				$oQuery = SubjectQuery::create()->filterByHasClasses();
			} else {
				$oQuery = ClassListOutput::listQuery(null, null);
			}
			$bIsOutdated = $oCache->isOlderThan($oQuery);
		} // Subject class navigation items
		else if($oNavigationItem instanceof SubjectNavigationItem) {
			$bIsOutdated = $oCache->isOlderThan(SchoolClassQuery::create()->filterBySubjectId($oNavigationItem->getSubjectId()));
		}

		if(!($oNavigationItem instanceof ClassNavigationItem)) {
			return;
		}

		// Find parent page navigation item (to base updated_at on page and page properties’ modification date)
		$oPageNavItem = $oNavigationItem;
		do {
			$oPageNavItem = $oPageNavItem->getParent();
		} while(!($oPageNavItem instanceof PageNavigationItem));
		$oPage = $oPageNavItem->getMe();
		$bIsOutdated = $oCache->isOlderThan(PagePropertyQuery::create()->filterByPage($oPage));
		if($bIsOutdated) {
			return;
		}

		// Check if classes in year have changed
		if($oNavigationItem->getMode() === 'root') {
			$sSlug = $oNavigationItem->getName();
			$bIsOutdated = $oCache->isOlderThan(SchoolClassQuery::create()->hasStudents()->filterBySlug($sSlug));
		}
	}

	private function renderClassNavigationItems($oNavigationItem, $aClasses, $sDisplayType, $iShowInListIfYear = false) {
		foreach($aClasses as $oClass) {
			$bShowInList = $iShowInListIfYear && $iShowInListIfYear === $oClass->getYear();
			$oNavItem = new ClassNavigationItem($oClass->getSlug(), $oClass->getFullClassName(), $oClass, 'root', $sDisplayType, null, true, false);
			$oNavItem->setShowInList($bShowInList);
			$oNavigationItem->addChild($oNavItem);
		}
	}

	private function renderClassPageItems($oNavigationItem) {
		$oClass = $oNavigationItem->getClass();
		$oNavigationItem->addChild(ClassNavigationItem::create('aktuell', 'Kalender', $oClass, self::CLASS_EVENTS_IDENTIFIER, null, "Veranstaltungen, Ferien & Feiertage"));
		// only display if display_mode is "full"
		if($oNavigationItem->getDisplayType() === 'full') {
			$oNavigationItem->addChild(ClassNavigationItem::create('materialien', 'Materialien', $oClass, self::CLASS_MATERIALS_IDENTIFIER, null, 'Dokumente & Links'));
		}
		if($oNavigationItem->getDisplayType() === 'location') {
			$oNavigationItem->addChild(ClassNavigationItem::create('standort', 'Standort', $oClass, self::CLASS_LOCATION_IDENTIFIER, null, 'Adresse & Lageplan')->setVisible(true));
		}
	}

	public function onPageHasBeenSet($oCurrentPage, $bIsNotFound, $oNavigationItem) {
		if($bIsNotFound || !($oNavigationItem instanceof ClassNavigationItem)) {
			return;
		}
		$this->addFeedResources($oNavigationItem);
	}

	private function addFeedResources(ClassNavigationItem $oNavigationItem) {
		if($oNavigationItem->getMode() === 'root') {
			// Only render starting with home
			return;
		}

		$oClass = $oNavigationItem->getClass();
		$oEventPage = PageQuery::create()->filterByPageType('events')->findOne();
		$oFeedLinks = EventsPageTypeModule::getFeedLinks($oEventPage, $oClass);

		ResourceIncluder::defaultIncluder()->addCustomResource(array('template' => 'feed', 'location' => $oFeedLinks->subscribe_rss, 'title' => TranslationPeer::getString('appointments.subscribe.rss')));
		ResourceIncluder::defaultIncluder()->addCustomResource(array('template' => 'ical', 'location' => $oFeedLinks->download_ical, 'title' => TranslationPeer::getString('appointments.subscribe.ical')));
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
