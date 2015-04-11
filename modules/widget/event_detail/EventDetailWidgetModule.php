<?php
/**
 * @package modules.widget
 */
class EventDetailWidgetModule extends PersistentWidgetModule {

	private $iEventId = null;
	private $aUnsavedDocuments = array();

	public function __construct($sSessionKey = null) {
		parent::__construct($sSessionKey);

		// Set / create document category for the event images to be saved in
		$sEventDocumentCategory = Settings::getSetting('externally_managed_categories', 'event_images', "Event Images");
		$iEventDocumentCategoryId = DocumentCategoryQuery::create()->select('Id')->findOneByName($sEventDocumentCategory);
		if($iEventDocumentCategoryId === null) {
			$oDocumentCategory = new DocumentCategory();
			$oDocumentCategory->setName($sEventDocumentCategory)->setIsExternallyManaged(true)->save();
			$iEventDocumentCategoryId = $oDocumentCategory->getId();
		}
		$this->setSetting('events_document_category_id', $iEventDocumentCategoryId);

		$oRichtext = WidgetModule::getWidget('rich_text', null, null, 'events');
		// in order to include event related css to richtext editor, connect the event related page by configuring the custom page propery "page identifier"
		$oPage = PageQuery::create()->findOneByIdentifier(SchoolPeer::PAGE_IDENTIFIER_EVENTS);
		if(!$oPage) {
			$oPage = PageQuery::create()->findOneByTreeLeft(1);
		}
		$oRichtext->setTemplate($oPage->getTemplate());
		$this->setSetting('richtext_session', $oRichtext->getSessionKey());
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
		if($aResult['DateStart'] === $aResult['DateEnd']) {
			$aResult['DateEnd'] = null;
		}
		$aResult['CreatedInfo'] = Util::formatCreatedInfo($oEvent);
		$aResult['UpdatedInfo'] = Util::formatUpdatedInfo($oEvent);
		$oEventType = EventTypeQuery::create()->findPk($oEvent->getEventTypeId() ? $oEvent->getEventTypeId() : 1);
		$aResult['AnlassTyp'] = $oEventType ? $oEventType->getName() : '';
		$sBody = '';
		if(is_resource($oEvent->getBody())) {
			$sBody = RichtextUtil::parseStorageForBackendOutput(stream_get_contents($oEvent->getBody()))->render();
		}
		$aResult['Body'] = $sBody;
		unset($aResult['BodyShort']);
		$aResult['BodyReview'] = is_resource($oEvent->getBodyReview()) ? stream_get_contents($oEvent->getBodyReview()) : '';
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

	private function validate($aData, $oEvent) {
		$oFlash = Flash::getFlash();
		$oFlash->setArrayToCheck($aData);
		$oFlash->checkForValue('title', 'title_required');
		if($aData['is_active']) {
			$oFlash->checkForValue('body', 'is_active_body_required');
			if($aData['date_start'] == null) {
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

	public function saveData($aData) {
		if($this->iEventId === null) {
			$oEvent = new Event();
		} else {
			$oEvent = EventQuery::create()->findPk($this->iEventId);
		}

		ArrayUtil::trimStringsInArray($aData);
		$oEvent->setIsActive($aData['is_active']);
		$oEvent->setSchoolClassId($aData['school_class_id'] != null ? $aData['school_class_id'] : null);
		$mEventTypeId = $aData['event_type_id'];

		// Make sure "Class Events" type id is stored, if it is a class event
		// Discuss removing of this type since it's confusing and since class events should be handled indespendently of other events (exception request id)
		if($oEvent->getSchoolClassId()) {
			$iClassEventTypeId = SchoolSiteConfig::getClassEventTypeId();
			if($mEventTypeId !== $iClassEventTypeId) {
				$mEventTypeId = $iClassEventTypeId;
			}
		}
		$oEvent->setEventTypeId($mEventTypeId);
		$oEvent->setTitle($aData['title']);
		$oEvent->setLocationInfo($aData['location_info']);
		$oEvent->setTimeDetails($aData['time_details']);
		if(isset($aData['is_common'])) {
			$oEvent->setIsCommon($aData['is_common']);
		}
		$oEvent->setIsActive($aData['is_active']);
		$oEvent->setDateStart($aData['date_start']);
		$oEvent->setDateEnd($aData['date_end'] == null ? null : $aData['date_end']);
		if($oEvent->getDateEnd() !== null && $oEvent->getDateEnd() < $oEvent->getDateStart()) {
			$oEvent->setDateEnd(null);
		}
		$this->validate($aData, $oEvent);

		// track page, document and link references and hande preview and review text
		$oRichtextUtil = new RichtextUtil();
		$oRichtextUtil->setTrackReferences($oEvent);

		$oEvent->setBodyAsTag($oRichtextUtil->getTagParser($aData['body']));

		$sReview = $oRichtextUtil->parseInputFromEditor($aData['body_review']);
		if(trim($sReview) == '') {
			$sReview = null;
		}
		$oEvent->setBodyReview($sReview);
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