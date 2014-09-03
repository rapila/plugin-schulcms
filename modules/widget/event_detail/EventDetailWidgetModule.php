<?php
/**
 * @package modules.widget
 */
class EventDetailWidgetModule extends PersistentWidgetModule {
	private $iEventId = null;
	private $aUnsavedDocuments = array();

	public function __construct($sWidgetId) {
		parent::__construct($sWidgetId);

    // config section 'school_settings' :'externally_managed_document_categories'
		$iEventDocumentCategory = SchoolPeer::getDocumentCategoryConfig('event_documents');
		if(DocumentCategoryQuery::create()->filterById($iEventDocumentCategory)->count() === 0) {
			throw new Exception('Config error: school_settings > externally_managed_document_categories > event_documents');
		}
		$oRichtext = WidgetModule::getWidget('rich_text', null, null, 'events');
		// in order to include event related css to richtext editor, connect the event related page by configuring the custom page propery "page identifier"
		$oEventPage = PagePeer::getPageByIdentifier(SchoolPeer::PAGE_IDENTIFIER_EVENTS);
		if($oEventPage) {
			$oRichtext->setTemplate($oEventPage->getTemplate());
		}
		$this->setSetting('richtext_session', $oRichtext->getSessionKey());
		$this->setSetting('events_document_category_id', $iEventDocumentCategory);
	}

	public function setEventId($iEventId) {
		$this->iEventId = $iEventId;
	}

	public function allDocuments($iThumbnailSize = 180) {
	  $aDocuments = EventDocumentQuery::create()->filterByEventId($this->iEventId)->joinDocument()->orderBySort()->find();
	  $aResult = array();
	  foreach($aDocuments as $oEventDocument) {
	    $aResult[] = $this->rowData($oEventDocument->getDocument(), $iThumbnailSize);
	  }
	  return $aResult;
	}

	public function rowData($oDocument, $iThumbnailSize = 180) {
		return array( 'Name' => $oDocument->getName(),
								  'Id' => $oDocument->getId(),
								  'Preview' => $oDocument->getPreview($iThumbnailSize)
								);
	}

	public function getSingleDocument($iDocumentId, $iThumbnailSize) {
		$oDokument = DocumentQuery::create()->findPk($iDocumentId);
		if($oDokument) {
			return $this->rowData($oDokument, $iThumbnailSize);
		}
		return null;
	}

	public function deleteDocument($iDocumentId) {
		$oDocument = DocumentQuery::create()->findPk($iDocumentId);
		if($oDocument && EventDocumentQuery::create()->filterByDocument($oDocument)->filterByEventId($this->iEventId)->findOne()) {
			return $oDocument->delete();
		}
	}

	public function reorderDocuments($aDocumentIds) {
		foreach($aDocumentIds as $iCount => $iDocumentId) {
			$oDocument = EventDocumentQuery::create()->findPk(array($this->iEventId, $iDocumentId));
			$oDocument->setSort($iCount+1);
			$oDocument->save();
		}
	}

	public function eventData() {
		$oEvent = EventQuery::create()->findPk($this->iEventId);
		if($oEvent === null) {
			return array();
		}
		$aResult = $oEvent->toArray(BasePeer::TYPE_PHPNAME, false);
		$aResult['DateStart'] = $oEvent->getDateStart('d.m.Y');
		$aResult['DateEnd'] = $oEvent->getDateEnd('d.m.Y');
		$aResult['CreatedInfo'] = Util::formatCreatedInfo($oEvent);
		$aResult['UpdatedInfo'] = Util::formatUpdatedInfo($oEvent);
		$oEventType = EventTypeQuery::create()->findPk($oEvent->getEventTypeId() ? $oEvent->getEventTypeId() : 1);
		$aResult['AnlassTyp'] = $oEventType ? $oEventType->getName() : '';
    $sBodyPreview = '';
		if(is_resource($oEvent->getBodyPreview())) {
			$sBodyPreview = RichtextUtil::parseStorageForBackendOutput(stream_get_contents($oEvent->getBodyPreview()))->render();
		}
		$aResult['BodyPreview'] = $sBodyPreview;
    $sBodyReview = '';
		if(is_resource($oEvent->getBodyReview())) {
			$sBodyReview = RichtextUtil::parseStorageForBackendOutput(stream_get_contents($oEvent->getBodyReview()))->render();
		}
		$aResult['BodyReview'] = $sBodyReview;
		return $aResult;
	}

	public function addEventDocument($iDocumentId) {
	  if($this->iEventId === null) {
	    $this->aUnsavedDocuments[] = $iDocumentId;
	    return;
	  }
	  if(EventDocumentQuery::create()->findPk(array($this->iEventId, $iDocumentId))) {
	    return;
	  }
	  $oEventDocument = new EventDocument();
	  $oEventDocument->setEventId($this->iEventId);
	  $oEventDocument->setDocumentId($iDocumentId);
	  return $oEventDocument->save();
	}

	private function validate($aEventData, $oEvent) {
		$oFlash = Flash::getFlash();
		$oFlash->setArrayToCheck($aEventData);
		$oFlash->checkForValue('title', 'title_required');
		if($aEventData['is_active']) {
			$oFlash->checkForValue('body_preview', 'is_active_body_required');
			if($aEventData['date_start'] == null) {
			  $oFlash->addMessage("date_start_required");
			}
		}

		if($oExistingEvent = EventQuery::create()->filterBySlug($oEvent->getSlug())->findOne()) {
		  if($oExistingEvent !== $oEvent
		    && $oExistingEvent->getEventTypeId() === $oEvent->getEventTypeId()
		    && $oExistingEvent->getDateStart('Y-m-d') === $oEvent->getDateStart('Y-m-d')) {
		    $oFlash->addMessage("same_identity_not_permitted");
		  }
		}
		$oFlash->finishReporting();
	}

	public function saveData($aEventData) {
		if($this->iEventId === null) {
			$oEvent = new Event();
		} else {
		  $oEvent = EventQuery::create()->findPk($this->iEventId);
		}
		ArrayUtil::trimStringsInArray($aEventData);
		$oEvent->setIsActive($aEventData['is_active']);
		$oEvent->setEventTypeId($aEventData['event_type_id']);
		$oEvent->setTitle($aEventData['title']);
		$oEvent->setTeaser($aEventData['teaser']);
		$oEvent->setLocationInfo($aEventData['location_info']);
		$oEvent->setTimeDetails($aEventData['time_details']);
		if(isset($aEventData['ignore_on_frontpage'])) {
			$oEvent->setIgnoreOnFrontpage($aEventData['ignore_on_frontpage']);
		}
		$oEvent->setIsActive($aEventData['is_active']);
		$oEvent->setDateStart($aEventData['date_start']);
		$oEvent->setDateEnd($aEventData['date_end'] == null ? null : $aEventData['date_end']);
		$oEvent->setSchoolClassId($aEventData['school_class_id'] != null ? $aEventData['school_class_id'] : null);
		if($oEvent->getDateEnd() !== null && $oEvent->getDateEnd() < $oEvent->getDateStart()) {
			$oEvent->setDateEnd(null);
		}
		$this->validate($aEventData, $oEvent);

		// track page, document and link references and hande preview and review text
		$oRichtextUtil = new RichtextUtil();
		$sPreview = $oRichtextUtil->parseInputFromEditor($aEventData['body_preview']);
		if(trim($sPreview) == '') {
		  $sPreview = null;
		}
		$oEvent->setBodyPreview($sPreview);
		$sReview = $oRichtextUtil->parseInputFromEditor($aEventData['body_review']);
		if(trim($sReview) == '') {
			$sReview = null;
		}
		$oEvent->setBodyReview($sReview);
		$oRichtextUtil->setTrackReferences($oEvent);
		if(!Flash::noErrors()) {
			throw new ValidationException();
		}
		if($oEvent->isNew()) {
		  foreach($this->aUnsavedDocuments as $iDocumentId) {
    	  $oEventDocument = new EventDocument();
    	  $oEventDocument->setDocumentId($iDocumentId);
		    $oEvent->addEventDocument($oEventDocument);
		  }
		}
		$oEvent->save();
		return $oEvent->getId();
	}
}