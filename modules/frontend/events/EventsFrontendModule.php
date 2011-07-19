<?php
/**
 * @package modules.frontend
 */

class EventsFrontendModule extends DynamicFrontendModule implements WidgetBasedFrontendModule {
	
	public static $DISPLAY_MODES = array(	'detail_automatic', 
																			 	'detail_teaser',
																			 	'next_class_event');

	public static $EVENT;
	
	const DETAIL_IDENTIFIER = 'id';
	const MODE_SELECT_KEY = 'display_mode';
	
	public static function acceptedRequestParams() {
		return array(self::DETAIL_IDENTIFIER);
	}
	
	public function renderFrontend() { 
		// always show detail of requested or random team member
		if(self::$EVENT === null && isset($_REQUEST[self::DETAIL_IDENTIFIER])) {
			self::$EVENT = EventPeer::retrieveByPK($_REQUEST[self::DETAIL_IDENTIFIER]);
			if(self::$EVENT) {
				return $this->renderDetail();
			}
		}
		$aOptions = @unserialize($this->getData());
		if(isset($aOptions[self::MODE_SELECT_KEY])) {
			$aParams = explode('-', $aOptions[self::MODE_SELECT_KEY]);
			if(is_numeric($aParams[0])) {
				return $this->renderList((int) $aParams[0], isset($aParams[1]) ? $aParams[1] === 'archive' : false);
			}
			switch($aOptions[self::MODE_SELECT_KEY]) {
				case 'detail_automatic' : return $this->renderDetail();
				case 'detail_teaser' : return $this->renderDetailTeaser();
				case 'next_class_event' : return $this->renderClassEvent();
				default: return $this->renderList(EventPeer::EVENT_TYPE_DEFAULT);
			}
		}
	}
	
	private function renderList($iEventTypeId=null, $bIsArchive = false) {
		$oEventQuery = EventQuery::create()->filterByIsActive(true)->filterBySchoolClassId(null, Criteria::ISNULL);
		if($iEventTypeId !== null) {
			$oEventQuery->filterByEventTypeId($iEventTypeId);
		}

		$oTemplate = $this->constructTemplate('list');
		
		// archive, requires link to aktuell, parent of current archive page
		if($bIsArchive === false) {
			$oEventQuery->filterByDateRangePreview()->orderByDateStart();
			$iCountArchiveEntries = EventQuery::create()->filterByIsActive(true)->filterBySchoolClassId(null, Criteria::ISNULL)->filterByDateRangeReview()->count();
			if($iCountArchiveEntries > 0) {
				$oArchivePage = PageQuery::create()->filterByTreeLeft(FrontendManager::$CURRENT_PAGE->getTreeLeft(), Criteria::GREATER_THAN)->filterByTreeRight(FrontendManager::$CURRENT_PAGE->getTreeRight(), Criteria::LESS_THAN)->filterByName('archiv')->findOne();
				$oTemplate->replaceIdentifier('archive_aktuell_link', TagWriter::quickTag('a', array('href' => LinkUtil::link($oArchivePage->getFullPathArray())), 'Archiv'));
			}
		} else {
			// aktuell page, requires link to archive, child of current page
			$oEventQuery->filterByDateRangeReview()->orderByDateStart(Criteria::DESC);
			$iCountAktuellEntries = EventQuery::create()->filterByIsActive(true)->filterBySchoolClassId(null, Criteria::ISNULL)->filterByDateRangePreview()->count();
			if($iCountAktuellEntries > 0) {
				$oAktuellPage = FrontendManager::$CURRENT_PAGE->getParent();
				$oTemplate->replaceIdentifier('archive_aktuell_link', TagWriter::quickTag('a', array('href' => LinkUtil::link($oAktuellPage->getFullPathArray())), 'Aktuell'));
			}
		}
		
		$oPage = FrontendManager::$CURRENT_PAGE;
		$sOddEven = 'odd';
		LocaleUtil::setLocaleToLanguageId(Session::language(), LC_TIME);
		
		$oItem = $this->constructTemplate('list_item');
		$oDate = $this->constructTemplate('date');
		$aEvents = $oEventQuery->find();
		if(count($aEvents) === 0) {
			$oItemTemplate = $this->constructTemplate('no_entries');
			$oItemTemplate->replaceIdentifier('no_entries_text', StringPeer::getString('wns.event.no_entries'.($bIsArchive ? '_archive' : '')));
			$oTemplate->replaceIdentifier('list_item', $oItemTemplate);
			return $oTemplate;
		}
		foreach($oEventQuery->find() as $oEvent) {
			$oItemTemplate = clone $oItem;
			$oItemTemplate->replaceIdentifier('oddeven', $sOddEven = $sOddEven === 'even' ? 'odd' : 'even');
			$aDetailLink = array_merge($oPage->getFullPathArray(), array(self::DETAIL_IDENTIFIER, $oEvent->getId()));
			$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($aDetailLink));
			$oItemTemplate->replaceIdentifier('detail_link_text', $oEvent->getTitle());
			$oItemTemplate->replaceIdentifier('detail_link_title', 'Details von '.$oEvent->getTitle());			
			$oItemTemplate->replaceIdentifier('teaser', $oEvent->getTeaser());
			
			$oDateTemplate = clone $oDate;
			$oDateTemplate->replaceIdentifier('date_day', strftime("%d",$oEvent->getDateStart('U')));
			$oDateTemplate->replaceIdentifier('date_month', strftime("%b",$oEvent->getDateStart('U')));
			$oItemTemplate->replaceIdentifier('date_from_to', $oDateTemplate);
			$oTemplate->replaceIdentifierMultiple('list_item', $oItemTemplate);
		}
		return $oTemplate;
	}
	
	private function renderArchivlist($iEventTypeId=null) {
		$oEventQuery = EventQuery::create()->filterByIsActive()->filterByDateRangeReview()->orderByDateStart(Criteria::DESC);
		if($iEventTypeId !== null) {
			$oEventQuery->filterByEventTypeId($iEventTypeId);
		}
	}

	public function getEvent() {
		return self::$EVENT;
	}
	
	public function renderDetail() {
		if($this->oLanguageObject->getContentObject()->getContainerName() === 'context') {
			return $this->renderDetailContext();
		}
		$oPage = FrontendManager::$CURRENT_PAGE;
		$oTemplate = $this->constructTemplate('detail');
		$bIsPreview = self::$EVENT->getLastDate() < date('d.m.Y');
		$sBody = null;
		if (!$bIsPreview && self::$EVENT->getBodyReview()) {
			$sBody = RichtextUtil::parseStorageForFrontendOutput(stream_get_contents(self::$EVENT->getBodyReview()));
		} else if (self::$EVENT->getBodyPreview()) {
			$sBody = RichtextUtil::parseStorageForFrontendOutput(stream_get_contents(self::$EVENT->getBodyPreview()));
		}
		if ($sBody === null) {
			$sBody = self::$EVENT->getTeaser();
		}

		$oTemplate->replaceIdentifier('body', $sBody);
		if($bIsPreview) {
			if(self::$EVENT->getLocationInfo())	 {
				$oTemplate->replaceIdentifier('location_info', self::$EVENT->getLocationInfo());
			}
			if(self::$EVENT->getTimeDetails())	{
				$oTemplate->replaceIdentifier('time_details', self::$EVENT->getTimeDetails());
			}
		}
		$oTemplate->replaceIdentifier('list_link', LinkUtil::link($oPage->getFullPathArray()));
		$oTemplate->replaceIdentifier('title', self::$EVENT->getTitle());
		$oTemplate->replaceIdentifier('date', self::$EVENT->getDateFromTo());
		$oTemplate->replaceIdentifier('teaser', self::$EVENT->getTeaser());
		
		$oGalleryTemplate = new Template('lists/gallery');
		$oGalleryItemTemplatePrototype = new Template('lists/gallery_item');
		$sMaxSize = 800;
		foreach(self::$EVENT->getEventDocumentsOrdered() as $oEventDocument) {
			if(!$oEventDocument->getDocument()) {
				continue;
			}
			$oGalleryItemTemplate = clone $oGalleryItemTemplatePrototype;
			$oGalleryItemTemplate->replaceIdentifier('event_id', self::$EVENT->getId());
			$oEventDocument->getDocument()->renderListItem($oGalleryItemTemplate, array('max_height' => $sMaxSize, 'max_width' => $sMaxSize));
			$oGalleryTemplate->replaceIdentifierMultiple("items", $oGalleryItemTemplate);
		}
		$oTemplate->replaceIdentifier('gallery', $oGalleryTemplate);
		return $oTemplate;
	}
	
	public function renderDetailContext() {
		
	}
	
	public function renderDetailTeaser($oEvent = null, $sClassLink = null) {
		if($oEvent === null) {
			$oEvent = EventQuery::create()->filterByShowOnFrontpage(true)->filterByDateRangePreview()->orderByRand()->findOne();
		}
		if($oEvent === null) {
			return null;
		}
		$sPageIdentifier = SchoolPeer::getPageIdentifier($oEvent->getEventTypeId() === 2 ? 'projects' : 'events');
		$oEventPage = PagePeer::getPageByIdentifier($sPageIdentifier);
		$oTemplate = $this->constructTemplate('teaser');
		$oTemplate->replaceIdentifier('title', $oEvent->getTitle());
		$oTemplate->replaceIdentifier('date', $oEvent->getDateFromTo());
		if($sClassLink) {
			$oTemplate->replaceIdentifier('class_link', $sClassLink);
		}
		$oTemplate->replaceIdentifier('teaser_truncated', $oEvent->getTeaser());
		$oTemplate->replaceIdentifier('detail_link', LinkUtil::link(array_merge($oEventPage->getFullPathArray(), array(self::DETAIL_IDENTIFIER, $oEvent->getId()))));
		$oTemplate->replaceIdentifier('detail_link_title', StringPeer::getString('wns.event.goto_detail').$oEvent->getTitle());
		return $oTemplate;
	}
	
	public function renderClassEvent() {
		if(self::$EVENT !== null && isset($_REQUEST[self::DETAIL_IDENTIFIER])) {
			return;
		}
		$oEvent = EventQuery::create()->filterBySchoolClassId(null, Criteria::ISNOTNULL)->filterByDateRangePreview()->orderByDateStart(Criteria::DESC)->findOne();
		if($oEvent) {
			$oClassPage = PagePeer::getPageByIdentifier(Settings::getSetting('school_settings', 'page_identifiers_classes', 'something'));
			$aClassLinkParams = array_merge($oClassPage->getFullPathArray(), array(ClassesFrontendModule::DETAIL_IDENTIFIER, $oEvent->getSchoolClassId()));
			$aLinkParams = array_merge($aClassLinkParams, array(ClassesFrontendModule::DETAIL_IDENTIFIER_EVENT, $oEvent->getId()));
			$sClassLink = TagWriter::quickTag('a', array('class' => 'event_teaser_classlink', 'href' => LinkUtil::link($aLinkParams)), StringPeer::getString('wns.class.school_class').' '.$oEvent->getSchoolClass()->getName());
			return $this->renderDetailTeaser($oEvent, $sClassLink);
		}
	}
	
	public function widgetData() {
		$aOptions = @unserialize($this->getData()); 
		return $aOptions[self::MODE_SELECT_KEY];
	}
	
	public function widgetSave($mData) {
		$this->oLanguageObject->setData(serialize($mData));
		return $this->oLanguageObject->save();
	}
	
	public function getWidget() {
		$aOptions = @unserialize($this->getData()); 
		$oWidget = new EventEditWidgetModule(null, $this);
		$oWidget->setDisplayMode($aOptions[self::MODE_SELECT_KEY]);
		return $oWidget;
	}

}
