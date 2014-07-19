<?php
/**
 * @package modules.frontend
 */

class EventsFrontendModule extends DynamicFrontendModule {

	public static $DISPLAY_MODES = array('list', 'list_with_reports', 'list_reports', 'list_archive', 'detail_context', 'recent_event_report_teaser');

	public static $EVENT;
	public $iEventTypeId;

	const DETAIL_IDENTIFIER = 'id';
	const SESSION_BACK_TO_LIST_LINK = 'back_to_list_link';
	const MODE_SELECT_KEY = 'display_mode';
	const MODE_EVENT_TYPE_ID = 'event_type_id';
	const MODE_EVENT_LIMIT = 'event_limit';

	public function renderFrontend() {
		$aOptions = @unserialize($this->getData());

		$this->iEventTypeId = $aOptions[self::MODE_EVENT_TYPE_ID];
		if(self::$EVENT === null && isset($_REQUEST[EventFilterModule::EVENT_REQUEST_KEY])) {
			self::$EVENT = EventQuery::create()->findPk($_REQUEST[EventFilterModule::EVENT_REQUEST_KEY]);
		}
		if(self::$EVENT) {
			return $this->renderDetail();
		}
		$this->iLimit = is_numeric($aOptions[self::MODE_EVENT_LIMIT]) && ($aOptions[self::MODE_EVENT_LIMIT] != '0') ? $aOptions[self::MODE_EVENT_LIMIT] : null;
		switch($aOptions[self::MODE_SELECT_KEY]) {
			case 'list': return $this->renderUpcomingList();
			case 'list_reports': return $this->renderReportList();
			case 'list_with_reports': return $this->renderListWithReports();
			case 'list_archive': return $this->renderArchiveList(true);
			case 'recent_event_report_teaser': return $this->renderRecentEventReportTeaser();
		}
		return '';
	}

 /** renderRecentEventReportTeaser()
	*
	* Description:
	* Display teaser event recently updated with report or images gallery
	* @return $oTemplate / null
	*/
	private function renderRecentEventReportTeaser() {
		$oQuery = $this->pastQuery(true);
		$oEvent = $oQuery->orderByUpdatedAt(Criteria::DESC)->findOne();
		if($oEvent === null) {
			return;
		}
		$oTemplate = $this->constructTemplate('recent_report_teaser');
		$sEventLink = LinkUtil::link($oEvent->getEventPageLink());
		$oTemplate->replaceIdentifier('detail_link', $sEventLink);
		$oTemplate->replaceIdentifier('detail_link_title', 'Zu den Details');
		$oTemplate->replaceIdentifier('event_title', $oEvent->getTitle());
		$oTemplate->replaceIdentifier('date_start', $oEvent->getDateStart('j.m.Y'));

		$sMessageKey = '';
		if($oEvent->hasBericht()) {
			$sMessageKey = 'review';
		}

		// Display first image in teaser
		if($oEvent->hasImages()) {
			if($sMessageKey === 'review') {
				$sMessageKey = $sMessageKey . '_and_';
			}
			$sMessageKey = $sMessageKey . 'images';
			$oImage = $oEvent->getFirstImage()->getDocument();
			$oImageTag = TagWriter::quickTag('img', array('src' => $oImage->getDisplayUrl(array('max_width' => 194)), 'alt' => $oImage->getDescription(), 'title' => $oEvent->getTitle()));
			$oTemplate->replaceIdentifier('image', TagWriter::quickTag('a', array('class' => 'recent_event_image_link', 'href' => $sEventLink, 'title' => $oEvent->getTitle()), $oImageTag));
		}
		$oTemplate->replaceIdentifier('event_report_prefix', StringPeer::getString('event_review_prefix.'.$sMessageKey).' ');
		return $oTemplate;
	}

	private function pastQuery($bLimitAge = false) {
		if($bLimitAge) {
			$sDate = date('Y-m-d', time() - (Settings::getSetting('school_settings', 'event_is_recent_report_day_count', 60) * 24 * 60 * 60));
			$oQuery = $this->baseQuery()->filterByUpdatedAt($sDate, Criteria::GREATER_EQUAL);
			$oQuery->past($sDate);
		}
		return $oQuery;
	}

	private function baseQuery() {
		$oQuery = FrontendEventQuery::create()->excludeClassEvents();
		if($this->iLimit) {
			$oQuery->limit($this->iLimit);
		}
		if($this->iEventTypeId !== null) {
			$oQuery->filterByEventTypeId($this->iEventTypeId);
		}
		return $oQuery;
	}

	private function reportQuery() {
		return $this->baseQuery()->filterbyHasImagesOrReview()->distinct()->orderByDateStart('desc');
	}

	private function renderUpcomingList() {
		return $this->renderList($this->baseQuery()->orderByDateStart());
	}

	private function renderReportList() {
		return $this->renderList($this->reportQuery(), 'list_report');
	}

	private function renderArchiveList() {
		return $this->renderList($this->reportQuery()->orderByUpdatedAt(Criteria::DESC), 'list_report');
	}

	private function renderListWithReports() {
		return $this->renderList($this->baseQuery()->orderByDateStart(), null, true);
	}

	private function renderList($oEventQuery, $sMainTemplateName = null, $bFillUpWithReports = false) {
		$bIsAktuelleListe = false;
		// Get link page if current page is not a event page
		// Event page can be only “events”. Optionally in the future “events-archive” (or maybe events-[event_type_id])
		$oPage = FrontendManager::$CURRENT_PAGE;
		$bIsEventPage = StringUtil::startsWith($oPage->getIdentifier(), SchoolPeer::PAGE_IDENTIFIER_EVENTS);
		if(!$bIsEventPage) {
			$oPage = PagePeer::getPageByIdentifier(SchoolPeer::getPageIdentifier(SchoolPeer::PAGE_IDENTIFIER_EVENTS));
			$oEventQuery->upcomingOrOngoing()->filterByIgnoreOnFrontpage(false);
			Session::getSession()->setAttribute(self::SESSION_BACK_TO_LIST_LINK, null);
		} else {
			$oNavigationItem = FrontendManager::$CURRENT_NAVIGATION_ITEM;
			if($oNavigationItem instanceof PageNavigationItem) {
				$bIsAktuelleListe = true;
				$oEventQuery->upcomingOrOngoing();
			} else {
				$oEventQuery->filterByNavigationItem($oNavigationItem);
			}
			Session::getSession()->setAttribute(self::SESSION_BACK_TO_LIST_LINK, $oNavigationItem->getLink());
		}

		// Create template depending on container
		$bIsSidebar = $this->oLanguageObject->getContentObject()->getContainerName() === 'context';
		if($bIsSidebar) {
			$oTemplate = $this->constructTemplate('list_context');
			$oTemplate->replaceIdentifier('event_page_link', LinkUtil::link($oPage->getLink()));
			$oItemTempl = $this->constructTemplate('list_item_context');
		} else {
			$oTemplate = $this->constructTemplate($sMainTemplateName ? $sMainTemplateName : 'list');
			$oItemTempl = $this->constructTemplate('list_item');
		}

		$aEvents = $oEventQuery->find();

		$iCount = count($aEvents);
		$oNoEntryTemplate = null;
		if($iCount === 0) {
			$oNoEntryTemplate = $this->constructTemplate($bIsSidebar ? 'no_entries_context' : 'no_entries');
			$oNoEntryTemplate->replaceIdentifier('no_entries_text', StringPeer::getString('wns.event.no_entries'));
			$oTemplate->replaceIdentifier('no_events_info', ' hide');
			$oTemplate->replaceIdentifier('list_item', $oNoEntryTemplate);
			if(!$bFillUpWithReports) {
				return $oTemplate;
			}
		}

		// Add event entries
		LocaleUtil::setLocaleToLanguageId(Session::language(), LC_TIME);
		$oDatePrototype = $this->constructTemplate('date');
		foreach($aEvents as $oEvent) {
			$oTemplate->replaceIdentifierMultiple('list_item', $this->renderEvent($oEvent, clone $oItemTempl, clone $oDatePrototype, $oPage));
		}

		// Display info depending on context - archive hints or icon information
		if(!$bFillUpWithReports || $iCount >= $this->iLimit) {
			if($bIsAktuelleListe) {
				$this->renderArchiveInfo($oTemplate, $oPage);
			} else {
				$oTemplate->replaceIdentifier('display_icon_info', $this->constructTemplate('display_icon_info'));
			}
			return $oTemplate;
		}
		$aReports = array();
		if($bFillUpWithReports) {
			$aReports = $this->reportQuery($this->iLimit - $iCount)->find();
			if(count($aReports) === 0) {
				return $oTemplate;
			}
		}
		$oWrapperTemplate = $this->constructTemplate('list_with_reports_wrapper');
		$oWrapperTemplate->replaceIdentifier('event_list', $oTemplate);
		$oReportsTemplate = $this->constructTemplate('list_reports');
		$oReportsTemplate->replaceIdentifier('heading_reports', StringPeer::getString('event.heading_report_list'));
		foreach($aReports as $i => $oEvent) {
			$oReportsTemplate->replaceIdentifierMultiple('list_item', $this->renderEvent($oEvent, clone $oItemTempl, clone $oDatePrototype, $oPage));
		}
		$oWrapperTemplate->replaceIdentifier('report_list', $oReportsTemplate);
		return $oWrapperTemplate;
	}

	private function renderEvent($oEvent, $oItemTemplate, $oDateTemplate, $oPage) {
		$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($oEvent->getEventPageLink($oPage)));
		$oItemTemplate->replaceIdentifier('detail_link_text', $oEvent->getTitle());
		$oItemTemplate->replaceIdentifier('detail_link_title', 'Details von '.$oEvent->getTitle());
		$oItemTemplate->replaceIdentifier('has_images_class', $oEvent->hasImages() ? ' has_images' : '');
		$oItemTemplate->replaceIdentifier('has_images_title', $oEvent->hasImages() ?  ' title="'.StringPeer::getString('event.has_images').'"' : '', null, Template::NO_HTML_ESCAPE);
		$oItemTemplate->replaceIdentifier('has_bericht_class', $oEvent->hasBericht() ? ' has_bericht' : '');
		$oItemTemplate->replaceIdentifier('has_bericht_title', $oEvent->hasImages() ? ' title="'.StringPeer::getString('event.has_bericht').'"' : '', null, Template::NO_HTML_ESCAPE);
		$oItemTemplate->replaceIdentifier('teaser', StringUtil::truncate($oEvent->getTeaser(), 80));

		// Add date square
		$oDateTemplate->replaceIdentifier('date_day', strftime("%d",$oEvent->getDateStart('U')));
		$oDateTemplate->replaceIdentifier('class_passed', $oEvent->isReview() ? ' passed' : '');
		$oDateTemplate->replaceIdentifier('date_month', strftime("%b",$oEvent->getDateStart('U')));
		$oItemTemplate->replaceIdentifier('date_from_to', $oDateTemplate);
		return $oItemTemplate;
	}

	private function renderArchiveInfo($oTemplate, $oPage) {
		$aYears = FrontendEventQuery::findYearsByEventTypeId($this->iEventTypeId);
		$iCountYears = count($aYears);
		if($iCountYears > 0) {
			$oTemplate->replaceIdentifier('report_and_images_teaser_message', StringPeer::getString('report_and_images_teaser_message'));
			foreach($aYears as $i => $sYear) {
				$oLink = TagWriter::quickTag('a', array('rel' => 'internal', 'href' => LinkUtil::link($oPage->getFullPathArray(array($sYear)))), 'Alle '.$sYear);
				$oTemplate->replaceIdentifierMultiple('year_link', $oLink, null, Template::NO_NEW_CONTEXT);
				if($i < ($iCountYears-1)) {
					$oTemplate->replaceIdentifierMultiple('year_link', ', ', null, Template::NO_NEW_CONTEXT);
				}
			}
		}
	}

	public function renderDetail() {
		if($this->oLanguageObject->getContentObject()->getContainerName() === 'context') {
			return $this->renderDetailContext();
		}
		$oTemplate = $this->constructTemplate('detail');

		// Display body depending on context
		$sBody = null;
		if (self::$EVENT->hasBericht()) {
			$sReviewContent = stream_get_contents(self::$EVENT->getBodyReview());
			if($sReviewContent != '') {
				$sBody = RichtextUtil::parseStorageForFrontendOutput($sReviewContent);
			}
		}

		// If there is no body review (bericht), get body preview
		if ($sBody === null && self::$EVENT->getBodyPreview()) {
			$sContent = stream_get_contents(self::$EVENT->getBodyPreview());
			if($sContent != '') {
				$sBody = RichtextUtil::parseStorageForFrontendOutput($sContent);
			}
		}

		// Fallback: if is not preview and no body is given, display teaser instead of body
		if(!self::$EVENT->isPreview() && $sBody === null) {
			$sBody = self::$EVENT->getTeaser();
		} else if($sBody == null) {
  		$oTemplate->replaceIdentifier('teaser', self::$EVENT->getTeaser());
		}

		$oTemplate->replaceIdentifier('title', self::$EVENT->getTitle());
		$oTemplate->replaceIdentifier('body', $sBody, null, Template::NO_HTML_ESCAPE);
		if(self::$EVENT->getDateEnd() == null) {
			$oTemplate->replaceIdentifier('date_info', self::$EVENT->getWeekdayName().', '.self::$EVENT->getDatumWithMonthName());
		} else {
			$oTemplate->replaceIdentifier('date_info', self::$EVENT->getDateFromTo());
		}

		// Add service link if event is related to service
		if(self::$EVENT->getServiceId() !== null) {
			if($oService = self::$EVENT->getService()) {
				$oTemplate->replaceIdentifier('service_link', TagWriter::quickTag('a', array('href' => LinkUtil::link($oService->getServiceLink()) , 'class' => 'event_service_link', 'title' => StringPeer::getString('wns.link.to_service_detail')), $oService->getName()));
			}
		}



		// Back to list link
		if($oTemplate->hasIdentifier('back_to_list_link')) {
			$aBackToListLink = Session::getSession()->getAttribute(self::SESSION_BACK_TO_LIST_LINK);
			if(!is_array($aBackToListLink)) {
				$aBackToListLink = FrontendManager::$CURRENT_PAGE->getFullPathArray();
			}
			$oTemplate->replaceIdentifier('back_to_list_link', LinkUtil::link($aBackToListLink));
		}

		// Display image gallery
		self::renderGallery(self::$EVENT, $oTemplate);
		return $oTemplate;
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
		$oTemplateProtoType->replaceIdentifier('thumbnail_size', 140);
		$oTemplateProtoType->replaceIdentifier('full_size', 1000);
		foreach($aEventDocuments as $oEventDocument) {
			if(!$oEventDocument->getDocument()) {
				continue;
			}
			if($oEventDocument->getDocument()->isImage()) {
  			$oDocumentTemplate = clone $oTemplateProtoType;
  			$oDocumentTemplate->replaceIdentifier('event_id', $oEvent->getId());
				$mDescription = null;
				if($oEventDocument->getDocument()->getDescription() != null) {
					$mDescription = $oEventDocument->getDocument()->getDescription();
				} elseif(Settings::getSetting('school_settings', 'gallery_display_image_name', true)) {
					$mDescription = $oEventDocument->getDocument()->getName();
				}
  			$oDocumentTemplate->replaceIdentifier('description', $mDescription);
			} else {
			  $oDocumentTemplate = new Template('lists/document_list_item');
			}
  		$oEventDocument->getDocument()->renderListItem($oDocumentTemplate);
			$oGalleryTemplate->replaceIdentifierMultiple("items", $oDocumentTemplate);
		}
		$oDetailTemplate->replaceIdentifier('gallery', $oGalleryTemplate);
	}

	public function renderDetailContext() {
		// Don't display event info like location etc if event is past or none are given
		if(self::$EVENT === null || self::$EVENT->isReview()
			|| (self::$EVENT->getTimeDetails() == null && self::$EVENT->getLocationInfo() == null)) {
			return null;
		}

		$oTemplate = $this->constructTemplate('detail_context');
		if(self::$EVENT->getDateEnd() == null) {
			$oTemplate->replaceIdentifier('date_info', self::$EVENT->getWeekdayName().', '.self::$EVENT->getDatumWithMonthName());
		} else {
			$oTemplate->replaceIdentifier('date_info', self::$EVENT->getDateFromTo());
		}

		// Display TODAY info if event is happening today
		if(self::$EVENT->getDateStart('Ymd') === date('Ymd')) {
			$oTemplate->replaceIdentifier('today', StringPeer::getString('wns.event.today'));
		}
		$oTemplate->replaceIdentifier('location_info', self::$EVENT->getLocationInfo() == null ? null : self::$EVENT->getLocationInfo());
		$oTemplate->replaceIdentifier('time_details', self::$EVENT->getTimeDetails() == null ? null : self::$EVENT->getTimeDetails());

		return $oTemplate;
	}

	public function renderClassEvent() {
		if(self::$EVENT !== null && isset($_REQUEST[self::DETAIL_IDENTIFIER])) {
			return null;
		}
		$oEvent = FrontendEventQuery::create()->filterBySchoolClassId(null, Criteria::ISNOTNULL)->upcomingOrOngoing()->orderByDateStart(Criteria::DESC)->findOne();
		if($oEvent === null) {
			return null;
		}
		$oClassPage = PagePeer::getPageByIdentifier(SchoolPeer::getPageIdentifier('classes'));
		$aClassLinkParams = array_merge($oClassPage->getFullPathArray(), array(ClassesFrontendModule::DETAIL_IDENTIFIER, $oEvent->getSchoolClassId()));
		$aLinkParams = array_merge($aClassLinkParams, array(ClassesFrontendModule::DETAIL_IDENTIFIER_EVENT, $oEvent->getId()));
		$sClassLink = TagWriter::quickTag('a', array('class' => 'event_teaser_classlink', 'href' => LinkUtil::link($aLinkParams)), StringPeer::getString('wns.class.school_class').' '.$oEvent->getSchoolClass()->getName());
		return $this->renderDetailTeaser($oEvent, $sClassLink);
	}

	public function renderDetailTeaser($oEvent, $sClassLink) {
		$oPage = PageQuery::create()->filterByIdentifier(SchoolPeer::getPageIdentifier(SchoolPeer::PAGE_IDENTIFIER_EVENTS));
		$oTemplate = $this->constructTemplate('teaser');
		$oTemplate->replaceIdentifier('title', $oEvent->getTitle());
		$oTemplate->replaceIdentifier('date', $oEvent->getDateFromTo());
		if($sClassLink) {
			$oTemplate->replaceIdentifier('class_link', $sClassLink);
		}
		$oTemplate->replaceIdentifier('teaser', $oEvent->getTeaser());
		$oTemplate->replaceIdentifier('detail_link', LinkUtil::link($oEvent->getEventPageLink($oPage)));
		$oTemplate->replaceIdentifier('detail_link_title', StringPeer::getString('wns.event.goto_detail').$oEvent->getTitle());
		return $oTemplate;
	}

	public function getSaveData($mData) {
		$mData['event_limit'] = $mData['event_limit'] === '' ? null : $mData['event_limit'];
		return parent::getSaveData($mData);
	}
}
