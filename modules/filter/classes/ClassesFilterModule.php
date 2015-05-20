<?php
class ClassesFilterModule extends FilterModule {

	const CLASS_EVENTS_IDENTIFIER = 'events';
	const CLASS_LOCATION_IDENTIFIER = 'location';
	const CLASS_MATERIALS_IDENTIFIER = 'materials';

	public function onNavigationItemChildrenRequested($oNavigationItem) {
		if($oNavigationItem instanceof PageNavigationItem && $oNavigationItem->getMe()->getPageType() === 'classes') {
			$oPageType = PageTypeModule::getModuleInstance('classes', $oNavigationItem->getMe(), $oNavigationItem);
			$aOptions = $oPageType->config();
			$sDisplayType = @$aOptions['display_type'];
			$sClassType = @$aOptions['class_type'];

			//Render subjects or school classes
			if($sClassType === 'subject') {
				$oQuery = SubjectQuery::create()->filterByHasClasses()->select(array('Id', 'Slug', 'Name'));
				foreach($oQuery->find() as $aData) {
					$oNavigationItem->addChild(SubjectNavigationItem::create($aData['Slug'], $aData['Name'], $aData['Id'], $sClassType));
				}
			} else {
				$aClasses = SchoolClassQuery::create()->groupByUnitName()->hasStudents()->excludeSubjectClasses()->find();
				$this->renderClassNavigationItems($oNavigationItem, $aClasses, $sDisplayType);
			}
		}

		// Render subject class navigation items
		if($oNavigationItem instanceof SubjectNavigationItem) {
			$oSubject = SubjectQuery::create()->findPk($oNavigationItem->getId());
			$this->renderClassNavigationItems($oNavigationItem, $oSubject->getSchoolClasses(), $oNavigationItem->getMode());
		}

		if(!($oNavigationItem instanceof ClassNavigationItem)) {
			return;
		}

		// Render all years of current class
		if($oNavigationItem->getMode() === 'root') {
			$sSlug = $oNavigationItem->getName();
			$oCriteria = SchoolClassQuery::create()->filterBySlug($sSlug)->hasStudents()->orderByYear(Criteria::DESC);
			foreach($oCriteria->find() as $oClass) {
				$sName = $oClass->isCurrent() ? $oClass->getFullClassName() : $oClass->getFullClassNameWithYear();
				$oClassItem = new ClassNavigationItem($oClass->getYear(), $sName, $oClass, 'home', $oNavigationItem->getDisplayType(), $oClass->getFullClassName());
				$oClassItem->setVisible($oClass->isCurrent());
				$oNavigationItem->addChild($oClassItem);
			}
		} else if($oNavigationItem->getMode() === 'home') {
			// Render specific class year subpage items
			$this->renderClassPageItems($oNavigationItem);
		}
	}

	private function renderClassNavigationItems($oNavigationItem, $aClasses, $sDisplayType) {
		foreach($aClasses as $oClass) {
			$oNavItem = new ClassNavigationItem($oClass->getSlug(), $oClass->getFullClassName().' Home', null, 'root', $sDisplayType, $oClass->getFullClassName(), true, false);
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
			$oNavigationItem->addChild(ClassNavigationItem::create('standort', 'Standort', $oClass, self::CLASS_LOCATION_IDENTIFIER, null, 'Adresse & Lageplan'));
		}
		$oNavigationItem->addChild(ClassNavigationItem::create('feed', 'RSS-Feed', $oClass, 'feed')->setIndexed(false));
	}

	private function renderEventNavigationItems($oNavigationItem) {
		$oClass = $oNavigationItem->getClass();
		foreach(FrontendEventQuery::create()->filterBySchoolClass($oClass)->find() as $oEvent) {
			$oNavigationItem->addChild(ClassNavigationItem::create($oEvent->getSlug(), $oEvent->getTitle(), $oClass, 'event')->setEvent($oEvent)->setVisible(false));
		}
	}

	private function renderSubjectNavigationItems($oNavigationItem) {
		// refactor to improve performance, check url, etc
		foreach($oNavigationItem->getClass()->getSubjectClasses() as $oSubject) {
			$oNavigationItem->addChild(SubjectNavigationItem::create($oSubject->getSlug(), $oSubject->getName(), $oSubject->getId(), false)->setVisible(false));
		}
	}

	public function onPageHasBeenSet($oCurrentPage, $bIsNotFound, $oNavigationItem) {
		if($bIsNotFound || !($oNavigationItem instanceof ClassNavigationItem)) {
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
		while(!StringUtil::startsWith($oHomeNavigationItem->getMode(), 'home')) {
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