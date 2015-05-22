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
				$aClasses = ClassListOutput::listQuery(null, null)->find();
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
			$oCriteria = SchoolClassQuery::create()->hasStudents()->filterBySlug($sSlug)->orderByYear(Criteria::DESC);
			foreach($oCriteria->find() as $oClass) {
				$sName = $oClass->isCurrent() ? $oClass->getFullClassName() : $oClass->getFullClassNameWithYear();
				$oClassItem = new ClassNavigationItem($oClass->getYear(), $oClass->getFullClassName().' Home', $oClass, 'home', $oNavigationItem->getDisplayType(), $sName);
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
			$oNavItem = new ClassNavigationItem($oClass->getSlug(), $oClass->getFullClassName(), null, 'root', $sDisplayType, null, true, false);
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
		$aArgs = array('class' => $oClass->getId());

		// TODO: Link to RSS feed (in anlässe or as a file module) and pass the class id so it uses class news and class events
		$aRSSFeedLink = array();
		ResourceIncluder::defaultIncluder()->addCustomResource(array('template' => 'feed', 'location' => LinkUtil::link($aRSSFeedLink, 'FrontendManager', $aArgs), 'title' => StringPeer::getString('appointments.subscribe.rss')));
		// TODO: Link to ical feed in anlässe and pass class id
		$aCalendarFeedLink = array();
		ResourceIncluder::defaultIncluder()->addCustomResource(array('template' => 'ical', 'location' => LinkUtil::link($aCalendarFeedLink, 'FrontendManager', $aArgs), 'title' => StringPeer::getString('appointments.subscribe.rss')));
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