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

	private function displayCalendar(Template $oTemplate) {
		self::includeCalendar($oTemplate, $this->oPage);
	}
	
	public static function getFeedLinks($oEventPage, $oClass = null) {
		$oResult = new stdClass();
		$aPageLink = $oEventPage->getFullPathArray();
		$aArgs = array();
		if($oClass) {
			$aArgs['class'] = $oClass->getId();
		}
		$oResult->download_ical = LinkUtil::link(array_merge($aPageLink, array('calendar.ics')), null, $aArgs);
		$oResult->subscribe_rss = LinkUtil::link(array_merge($aPageLink, array('feed')), null, $aArgs);
		$oResult->subscribe_ical = LinkUtil::absoluteLink(LinkUtil::link(array_merge($aPageLink, array('calendar.ics')), null, $aArgs), null, 'webcal://');
		return $oResult;
	}

	public static function includeCalendar($oTemplate, $oEventPage, $oClass = null) {
		$oResourceIncluder = ResourceIncluder::namedIncluder('additional_js');
		$oResourceIncluder->addResource('events.js');
		$oResourceIncluder->addResource(LinkUtil::link(array('event_export', '{year}', $oEventPage->getId()), 'FileManager'), ResourceIncluder::RESOURCE_TYPE_LINK, null, array('type' => 'application/json', 'template' => 'source_link', 'source' => '/eventData'));
		$oDownload = static::template('content/downloads');
		$oFeedLinks = self::getFeedLinks($oEventPage, $oClass);
		$oDownload->replaceIdentifier('download_ical', $oFeedLinks->download_ical);
		$oDownload->replaceIdentifier('subscribe_rss', $oFeedLinks->subscribe_rss);
		$oDownload->replaceIdentifier('subscribe_ical', $oFeedLinks->subscribe_ical);
		$oTemplate->replaceIdentifierMultiple('container', $oDownload, 'content');
		$oFilterTemplate = static::template('content/filter');
		foreach(EventTypeQuery::create()->excludeExternallyManaged()->hasActiveEvents()->find() as $oEventType) {
			$oTypeTemplate = static::template('content/event_type');
			$oTypeTemplate->replaceIdentifier('id', $oEventType->getId());
			$oTypeTemplate->replaceIdentifier('name', $oEventType->getName());
			$oFilterTemplate->replaceIdentifierMultiple('event_types', $oTypeTemplate);
		}
		$oFilterTemplate->replaceIdentifier('class_id', $oClass === null ? 'common_only' : implode('|', $oClass->getLinkedClassIds()));
		$oTemplate->replaceIdentifierMultiple('container', $oFilterTemplate, 'content');
		$oTemplate->replaceIdentifierMultiple('container', static::template('content/calendar-content'), 'content');
	}

	private function displayDetail(Event $oEvent, Template $oMainTemplate) {
		$oTemplate = $this->constructTemplate('content/detail');
		$oTemplate->replaceIdentifier('title', $oEvent->getTitle());
		$sBody = null;
		if($oEvent->hasBericht()) {
			$sBody = self::getContentForFrontend($oEvent->getBodyReview());
		}
		if($sBody === null) {
			$sBody = self::getContentForFrontend($oEvent->getBody());
		}
		$oTemplate->replaceIdentifier('body', $sBody, null, Template::NO_HTML_ESCAPE);

		if($oEvent->getDateEnd() === $oEvent->getDateStart()) {
			$oTemplate->replaceIdentifier('date_info', $oEvent->getWeekdayName().', '.$oEvent->getDatumWithMonthName());
		} else {
			$oTemplate->replaceIdentifier('date_info', $oEvent->getDateFromTo());
		}
		if($oEvent->getDateStart('Ymd') === date('Ymd')) {
			$oTemplate->replaceIdentifier('today', StringPeer::getString('wns.event.today'));
		}
		if($oEvent->getLocationInfo() != null) {
			$oTemplate->replaceIdentifier('location_info', $oEvent->getLocationInfo());
		}
		$sClassLink = null;
		if($oClass = $oEvent->getSchoolClass()) {
			$sClassLink = LinkUtil::link($oClass->getLink());
			$oTemplate->replaceIdentifier('class_link', TagWriter::quickTag('a', array('href' => $sClassLink), $oClass->getFullClassName()));
		}
		if($oEvent->getTimeDetails() != null) {
			$oTemplate->replaceIdentifier('time_details', $oEvent->getTimeDetails());
		}
		$oTemplate->replaceIdentifier('fallback_url', $sClassLink ? $sClassLink : LinkUtil::link($this->oPage->getLink()));

		// Display image gallery
		self::renderGallery($oEvent, $oTemplate);
		$oMainTemplate->replaceIdentifier('container', $oTemplate, 'content');
	}

 /**
	* static method to be used in both event detail as class_events or service_events detail
	* since they always look the same
	*/
	public static function renderGallery($oEvent, &$oDetailTemplate) {
		$aEventDocuments = $oEvent->getEventDocumentsOrdered();
		$iCount = 0;
		$oGalleryTemplate = new Template('lists/gallery');
		$oTemplateProtoType = new Template('lists/gallery_item');
		foreach($aEventDocuments as $oEventDocument) {
			$oDocument = $oEventDocument->getDocument();
			if(!$oDocument || !$oDocument->isImage()) {
				continue;
			}
			$iCount++;
			$oDocumentTemplate = clone $oTemplateProtoType;
			$oDocumentTemplate->replaceIdentifier('event_id', $oEvent->getId());
			$mDescription = null;
			if($oDocument->getDescription() != null) {
				$mDescription = $oDocument->getDescription();
			} elseif(Settings::getSetting('schulcms', 'gallery_display_image_name', true)) {
				$mDescription = $oDocument->getName();
			}
			$oDocumentTemplate->replaceIdentifier('description', $mDescription);
			$oDocument->renderListItem($oDocumentTemplate);
			$oGalleryTemplate->replaceIdentifierMultiple("items", $oDocumentTemplate);
		}
		if($iCount > 0) {
			$oDetailTemplate->replaceIdentifier('gallery', $oGalleryTemplate);
		}
	}

	public static function getContentForFrontend($oBlob, $bStripTags = false, $iTruncate = null) {
		if(!is_resource($oBlob)) {
			return '';
		}
		$sContent = RichtextUtil::parseStorageForFrontendOutput(stream_get_contents($oBlob));
		if($bStripTags || $iTruncate) {
			$sContent = html_entity_decode(strip_tags($sContent));
			if($iTruncate) {
				$sContent = StringUtil::truncate($sContent, $iTruncate);
			}
		}
		return $sContent;
	}

}