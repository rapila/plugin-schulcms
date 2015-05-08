<?php
class EventsPageTypeModule extends PageTypeModule {
	const SESSION_BACK_TO_LIST_LINK = 'back_to_list_link';

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
		$oTemplate->replaceIdentifier('location_info', $oEvent->getLocationInfo());
		$oTemplate->replaceIdentifier('time_details', $oEvent->getTimeDetails());

		// Back to list link
		/**
		 * @todo replace by js history back link or include referrer
		*/
		if($oTemplate->hasIdentifier('back_to_list_link')) {
			if($oSchoolClass = $oEvent->getSchoolClass()) {
				$aBackToListLink = array_merge($oSchoolClass->getLink(), array('aktuell'));
				$sLinkText = StringPeer::getString('class_event.back_to_class_link'). ' ' . $oSchoolClass->getUnitName();
			} else {
				$aBackToListLink = Session::getSession()->getAttribute(self::SESSION_BACK_TO_LIST_LINK);
				if(!is_array($aBackToListLink)) {
					$aBackToListLink = FrontendManager::$CURRENT_PAGE->getFullPathArray();
					$sLinkText = StringPeer::getString('event.back_to_list_link');
				}
			}
			$oTemplate->replaceIdentifier('link_text', $sLinkText);
			$oTemplate->replaceIdentifier('back_to_list_link', LinkUtil::link($aBackToListLink));
		}

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
		if(empty($aEventDocuments)) {
			return;
		}
		$oGalleryTemplate = new Template('lists/gallery');
		$oTemplateProtoType = new Template('lists/gallery_item');
		foreach($aEventDocuments as $oEventDocument) {
			$oDocument = $oEventDocument->getDocument();
			if(!$oDocument || !$oDocument->isImage()) {
				continue;
			}
			$oDocumentTemplate = clone $oTemplateProtoType;
			$oDocumentTemplate->replaceIdentifier('event_id', $oEvent->getId());
			// $oImage = $oDocument->getImage();
			// if($oImage && $oImage->getOriginalHeight()) {
			// 	$bIsHorizontal = $oImage->getOriginalWidth() > $oImage->getOriginalHeight();
			// 	$oDocumentTemplate->replaceIdentifier('max_size_param', $bIsHorizontal ? 'max_height' : 'max_width');
			// }
			$oDocumentTemplate->replaceIdentifier('max_size_param', 'max_height');

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
		$oDetailTemplate->replaceIdentifier('gallery', $oGalleryTemplate);
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