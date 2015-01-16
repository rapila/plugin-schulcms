<?php
class EventsPageTypeModule extends PageTypeModule {
	public function __construct(Page $oPage = null, NavigationItem $oNavigationItem = null) {
		parent::__construct($oPage, $oNavigationItem);
	}
	
	public function display(Template $oTemplate, $bIsPreview = false) {
		$oNavigationItem = $this->oNavigationItem;

		if($oNavigationItem instanceof VirtualNavigationItem && $oNavigationItem->getType() === EventFilterModule::ITEM_EVENT) {
			$oEvent = FrontendEventQuery::create()->filterByNavigationItem($oNavigationItem)->findOne();
			if($oEvent) {
				return $this->displayDetail($oEvent, $oTemplate);
			}
		}
		return $this->displayCalendar($oTemplate);
	}
	
	private function displayDetail(Event $oEvent, Template $oTemplate) {
		EventsFrontendModule::$EVENT = $oEvent;
		$oFrontendModule = new EventsFrontendModule(array());
		$oTemplate->replaceIdentifierMultiple('container', $oFrontendModule->renderDetail(), 'content');
	}

	private function displayCalendar(Template $oTemplate) {
		$oResourceIncluder = ResourceIncluder::defaultIncluder();
		$oResourceIncluder->startDependencies();
		$oResourceIncluder->startDependencies();
		$oResourceIncluder->addResource('Wok.js');
		$oResourceIncluder->addResource('ajax.js');
		$oResourceIncluder->addResourceEndingDependency('app.js');
		$oResourceIncluder->addResourceEndingDependency('events.js');
		$oResourceIncluder->addResource(LinkUtil::link(array('event_export', '{year}', $this->oPage->getId()), 'FileManager'), ResourceIncluder::RESOURCE_TYPE_LINK, null, array('type' => 'application/json', 'template' => 'source_link', 'source' => '/eventData'));
		$oTemplate->replaceIdentifierMultiple('container', $this->constructTemplate('content/filter'), 'content');
		$oTemplate->replaceIdentifierMultiple('container', $this->constructTemplate('content/calendar-content'), 'content');
	}
}