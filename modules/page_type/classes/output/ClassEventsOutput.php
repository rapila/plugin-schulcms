<?php

class ClassEventsOutput extends ClassOutput {
	private $oTemplate;

	public function __construct(NavigationItem $oNavigationItem, ClassesPageTypeModule $oPageType, Template $oTemplate) {
		parent::__construct($oNavigationItem, $oPageType);
		$this->oTemplate = $oTemplate;
	}

	public function renderContent() {
		$oPage = PageQuery::create()->filterByPageType('events')->findOne();
		EventsPageTypeModule::includeCalendar($this->oTemplate, $oPage, $this->getClass()->getId());
		$this->oTemplate->replaceIdentifier('container_filled_types', 'classes', 'content');
	}
}