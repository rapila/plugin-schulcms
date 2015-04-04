<?php
class EventsPageTypeModule extends PageTypeModule {
	public function __construct(Page $oPage = null, NavigationItem $oNavigationItem = null) {
		parent::__construct($oPage, $oNavigationItem);
	}

	public function display(Template $oTemplate, $bIsPreview = false) {
		$oNavigationItem = $this->oNavigationItem;

		if($oNavigationItem instanceof VirtualNavigationItem && $oNavigationItem->getType() === EventsFilterModule::ITEM_EVENT) {
			$oEvent = FrontendEventQuery::create()->filterByNavigationItem($oNavigationItem)->findOne();
			if($oEvent) {
				return $this->displayDetail($oEvent, $oTemplate);
			}
		}
		return $this->displayCalendar($oTemplate);
	}

	private function displayDetail(Event $oEvent, Template $oTemplate) {
		EventsFrontendModule::$EVENT = $oEvent;
		// pass referrer to detail for return to event list/class home or class event list?
		$oFrontendModule = new EventsFrontendModule(array());
		$oTemplate->replaceIdentifierMultiple('container', $oFrontendModule->renderDetail(), 'content');
	}

	private function displayCalendar(Template $oTemplate) {
		$oResourceIncluder = ResourceIncluder::namedIncluder('additional_js');
		$oResourceIncluder->addResource('events.js');
		$oResourceIncluder->addResource(LinkUtil::link(array('event_export', '{year}', $this->oPage->getId()), 'FileManager'), ResourceIncluder::RESOURCE_TYPE_LINK, null, array('type' => 'application/json', 'template' => 'source_link', 'source' => '/eventData'));
		$oDownload = $this->constructTemplate('content/downloads');
		$oDownload->replaceIdentifier('download_ical', LinkUtil::link($this->oNavigationItem->namedChild('calendar.ics', null, false, true)->getLink()));
		$oDownload->replaceIdentifier('subscribe_rss', LinkUtil::link($this->oNavigationItem->namedChild('feed', null, false, true)->getLink()));
		$oDownload->replaceIdentifier('subscribe_ical', LinkUtil::absoluteLink(LinkUtil::link($this->oNavigationItem->namedChild('calendar.ics', null, false, true)->getLink()), null, 'webcal://'));
		$oTemplate->replaceIdentifierMultiple('container', $oDownload, 'content');
		$oTemplate->replaceIdentifierMultiple('container', $this->constructTemplate('content/filter'), 'content');
		$oTemplate->replaceIdentifierMultiple('container', $this->constructTemplate('content/calendar-content'), 'content');
	}
}