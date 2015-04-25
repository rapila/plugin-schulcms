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
		self::includeCalendar($oTemplate, $this->oPage);
	}

	public static function includeCalendar($oTemplate, $oEventPage, $iClassId = null) {
		$oResourceIncluder = ResourceIncluder::namedIncluder('additional_js');
		$aPageLink = $oEventPage->getFullPathArray();
		$oResourceIncluder->addResource('events.js');
		$oResourceIncluder->addResource(LinkUtil::link(array('event_export', '{year}', $oEventPage->getId()), 'FileManager'), ResourceIncluder::RESOURCE_TYPE_LINK, null, array('type' => 'application/json', 'template' => 'source_link', 'source' => '/eventData'));
		$oDownload = static::template('content/downloads');
		$oDownload->replaceIdentifier('download_ical', LinkUtil::link(array_merge($aPageLink, array('calendar.ics'))));
		$oDownload->replaceIdentifier('subscribe_rss', LinkUtil::link(array_merge($aPageLink, array('feed'))));
		$oDownload->replaceIdentifier('subscribe_ical', LinkUtil::absoluteLink(LinkUtil::link(array_merge($aPageLink, array('calendar.ics'))), null, 'webcal://'));
		$oTemplate->replaceIdentifierMultiple('container', $oDownload, 'content');
		$oFilterTemplate = static::template('content/filter');
		$oFilterTemplate->replaceIdentifier('class_id', $iClassId === null ? 'common_only' : $iClassId);
		$oTemplate->replaceIdentifierMultiple('container', $oFilterTemplate, 'content');
		$oTemplate->replaceIdentifierMultiple('container', static::template('content/calendar-content'), 'content');
	}
}