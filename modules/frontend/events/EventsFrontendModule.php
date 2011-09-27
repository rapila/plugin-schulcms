<?php
/**
 * @package modules.frontend
 */

class EventsFrontendModule extends DynamicFrontendModule implements WidgetBasedFrontendModule {
	
	public static $DISPLAY_MODES = array('list', 'detail_context');

	public static $EVENT;
	
	const DETAIL_IDENTIFIER = 'id';
	const MODE_SELECT_KEY = 'display_mode';
	const MODE_EVENT_TYPE_ID = 'event_type_id';
	const MODE_EVENT_LIMIT = 'event_limit';
	
	public function renderFrontend() { 
		$aOptions = @unserialize($this->getData());

		if(self::$EVENT === null && isset($_REQUEST[EventFilterModule::EVENT_REQUEST_KEY])) {
			self::$EVENT = EventPeer::retrieveByPK($_REQUEST[EventFilterModule::EVENT_REQUEST_KEY]);
			if(self::$EVENT) {
				return $this->renderDetail();
			}
		}

		if($aOptions[self::MODE_SELECT_KEY] === 'list') {
			return $this->renderList($aOptions[self::MODE_EVENT_TYPE_ID], $aOptions[self::MODE_EVENT_LIMIT]);
		}
		return '';
	}
	
	private function renderList($iEventTypeId=null, $iLimit=null) {
		$oEventQuery = EventQuery::create();
		if($this->oLanguageObject->getContentObject()->getContainerName() !== 'context') {
			$oEventQuery = EventQuery::create()->filterByIsActive(true)->filterBySchoolClassId(null, Criteria::ISNULL)->filterByNavigationItem();
			$oPage = FrontendManager::$CURRENT_PAGE;
			$oTemplate = $this->constructTemplate('list');
			$oItemTempl = $this->constructTemplate('list_item');
		} else {
			$oEventQuery = EventQuery::create()->filterByIsActive(true)->filterBySchoolClassId(null, Criteria::ISNULL)->filterByDateRangePreview();
			if($iEventTypeId !== null) {
				$oEventQuery->filterByEventTypeId($iEventTypeId);
			}
			$oPage = PagePeer::getPageByIdentifier(SchoolPeer::getPageIdentifier(SchoolPeer::PAGE_IDENTIFIER_EVENTS.'-'.$iEventTypeId));
			$oTemplate = $this->constructTemplate('list_context');
			$oItemTempl = $this->constructTemplate('list_item_context');
		}
		$oEventQuery->orderByDateStart();

		if($iLimit !== null) {
			$oEventQuery->limit($iLimit);
		}
		
		$sOddEven = 'odd';
		LocaleUtil::setLocaleToLanguageId(Session::language(), LC_TIME);
		
		$oDate = $this->constructTemplate('date');
		$aEvents = $oEventQuery->find();
		if(count($aEvents) === 0) {
			$oItemTemplate = $this->constructTemplate('no_entries');
			$oItemTemplate->replaceIdentifier('no_entries_text', StringPeer::getString('wns.event.no_entries'));
			$oTemplate->replaceIdentifier('list_item', $oItemTemplate);
			return $oTemplate;
		}
		foreach($oEventQuery->find() as $oEvent) {
			$oItemTemplate = clone $oItemTempl;
			$oItemTemplate->replaceIdentifier('oddeven', $sOddEven = $sOddEven === 'even' ? 'odd' : 'even');
			$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($oEvent->getEventPageLink($oPage)));
			$oItemTemplate->replaceIdentifier('detail_link_text', $oEvent->getTitle());
			$oItemTemplate->replaceIdentifier('detail_link_title', 'Details von '.$oEvent->getTitle());		
			$oItemTemplate->replaceIdentifier('has_images_class', $oEvent->hasImages() ? ' has_images' : '');
			$oItemTemplate->replaceIdentifier('has_images_title', $oEvent->hasImages() ?  ' title="'.StringPeer::getString('event.has_images').'"' : '', null, Template::NO_HTML_ESCAPE);
			$oItemTemplate->replaceIdentifier('has_bericht_class', $oEvent->hasBericht() ? ' has_bericht' : '');
			$oItemTemplate->replaceIdentifier('has_bericht_title', $oEvent->hasImages() ? ' title="'.StringPeer::getString('event.has_bericht').'"' : '', null, Template::NO_HTML_ESCAPE);
			$oItemTemplate->replaceIdentifier('teaser', $oEvent->getTeaser());
			
			$oDateTemplate = clone $oDate;
			$oDateTemplate->replaceIdentifier('date_day', strftime("%d",$oEvent->getDateStart('U')));
			$oDateTemplate->replaceIdentifier('class_passed', $oEvent->isReview() ? ' passed' : '');
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
		
		$sBody = null;
		if (self::$EVENT->hasBericht()) {
			$sReviewContent = stream_get_contents(self::$EVENT->getBodyReview());
			if($sReviewContent != '') {
				$sBody = RichtextUtil::parseStorageForFrontendOutput($sReviewContent);			
			}
		} 
		if ($sBody === null && self::$EVENT->getBodyPreview()) {
			$sContent = stream_get_contents(self::$EVENT->getBodyPreview());
			if($sContent != '') {
				$sBody = RichtextUtil::parseStorageForFrontendOutput($sContent);
			}
		}
		if ($sBody == null) {
			$sBody = self::$EVENT->getTeaser();
		}

		$oTemplate->replaceIdentifier('body', $sBody);
		if(self::$EVENT->isPreview()) {
			if(self::$EVENT->getLocationInfo())	 {
				$oTemplate->replaceIdentifier('location_info', self::$EVENT->getLocationInfo());
			}
      $oTemplate->replaceIdentifier('time_details', self::$EVENT->getTimeDetails());
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
		$oPage = PagePeer::getPageByIdentifier($sPageIdentifier);
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
	
	public function renderClassEvent() {
		if(self::$EVENT !== null && isset($_REQUEST[self::DETAIL_IDENTIFIER])) {
			return;
		}
		$oEvent = EventQuery::create()->filterBySchoolClassId(null, Criteria::ISNOTNULL)->filterByDateRangePreview()->orderByDateStart(Criteria::DESC)->findOne();
		if($oEvent) {
			$oClassPage = PagePeer::getPageByIdentifier(SchoolPeer::getPageIdentifier('classes'));
			$aClassLinkParams = array_merge($oClassPage->getFullPathArray(), array(ClassesFrontendModule::DETAIL_IDENTIFIER, $oEvent->getSchoolClassId()));
			$aLinkParams = array_merge($aClassLinkParams, array(ClassesFrontendModule::DETAIL_IDENTIFIER_EVENT, $oEvent->getId()));
			$sClassLink = TagWriter::quickTag('a', array('class' => 'event_teaser_classlink', 'href' => LinkUtil::link($aLinkParams)), StringPeer::getString('wns.class.school_class').' '.$oEvent->getSchoolClass()->getName());
			return $this->renderDetailTeaser($oEvent, $sClassLink);
		}
	}
	
	public function widgetData() {
		$aOptions = @unserialize($this->getData()); 
		return $aOptions;
	}
	
	public function widgetSave($mData) {
		$mData['event_limit'] = $mData['event_limit'] === '' ? null : $mData['event_limit']; 
		$this->oLanguageObject->setData(serialize($mData));
		return $this->oLanguageObject->save();
	}
	
	public function getWidget() {
		$aOptions = @unserialize($this->getData()); 
		$oWidget = new EventEditWidgetModule(null, $this);
		$oWidget->setDisplayMode($aOptions);
		return $oWidget;
	}

}
