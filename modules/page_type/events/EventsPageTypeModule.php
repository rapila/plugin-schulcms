<?php
class EventsPageTypeModule extends PageTypeModule {
	public function __construct(Page $oPage = null, NavigationItem $oNavigationItem = null) {
		parent::__construct($oPage, $oNavigationItem);
	}

	public function display(Template $oTemplate, $bIsPreview = false) {
		$oResourceIncluder = ResourceIncluder::defaultIncluder();
		$oResourceIncluder->startDependencies();
		$oResourceIncluder->startDependencies();
		$oResourceIncluder->addResource('Wok.js');
		$oResourceIncluder->addResourceEndingDependency('app.js');
		$oResourceIncluder->addResourceEndingDependency('events.js');
		$oResourceIncluder->addResource(LinkUtil::link(array('event_export', '{year}', $oPage->getId()), 'FileManager'), ResourceIncluder::RESOURCE_TYPE_LINK, null, array('type' => 'application/json', 'template' => 'source_link', 'source' => '/eventData'));
		$oTemplate->replaceIdentifierMultiple('container', $this->constructTemplate('content/filter'), 'content');
		$oTemplate->replaceIdentifierMultiple('container', $this->constructTemplate('content/calendar-content'), 'content');
	}
}