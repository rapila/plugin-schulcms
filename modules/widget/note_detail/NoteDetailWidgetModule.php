<?php
/**
 * @package modules.widget
 */
class NoteDetailWidgetModule extends PersistentWidgetModule {
	private $iNoteId = null;
	private $aUnsavedDocuments = array();
	
	public function __construct($sWidgetId) {
		parent::__construct($sWidgetId);
		$iNoteImagesCategory = SchoolPeer::getDocumentCategoryConfig('note_images');
		if(DocumentCategoryQuery::create()->filterById($iNoteImagesCategory)->count() === 0) {
			throw new Exception('Config error: school_settings > externally_managed_document_categories > note_images');
		}
		$this->setSetting('note_image_category_id', $iNoteImagesCategory);
		$mBlackboardNoteTypeId = Settings::getSetting("school_settings", 'blackboard_note_type_id', null);
		$this->setSetting('blackboard_note_type_id', $mBlackboardNoteTypeId !== null ? (string) $mBlackboardNoteTypeId : null);
		$oRichtext = WidgetModule::getWidget('rich_text', null, null, 'notes');
		$oRichtext->setTemplate(PagePeer::getRootPage()->getTemplate());
		$this->setSetting('richtext_session', $oRichtext->getSessionKey());
	}
	
	public function setNoteId($iNoteId) {
		$this->iNoteId = $iNoteId;
	}
	
	public function noteData() {
		$oNote = NotePeer::retrieveByPK($this->iNoteId);
		if($oNote === null) {
			return array();
		}
		$aResult = $oNote->toArray(BasePeer::TYPE_PHPNAME, false);
		$aResult['DateStart'] = $oNote->getDateStart('d.m.Y');
		$aResult['DateEnd'] = $oNote->getDateEnd('d.m.Y');
		$aResult['CreatedInfo'] = Util::formatCreatedInfo($oNote);
		$aResult['UpdatedInfo'] = Util::formatUpdatedInfo($oNote);
    $sBody = '';
		if(is_resource($oNote->getBody())) {
			$sBody = RichtextUtil::parseStorageForBackendOutput(stream_get_contents($oNote->getBody()))->render();
		}
		$aResult['Body'] = $sBody;
		return $aResult;
	}
	
	private function validate($aNoteData, $oNote) {
		$oFlash = Flash::getFlash();
		$oFlash->setArrayToCheck($aNoteData);
		$oFlash->checkForValue('body', 'note.body_required');
		$oFlash->checkForValue('note_type_id', 'note_type_required');
		$oFlash->finishReporting();
	}

	public function saveData($aNoteData) {
		if($this->iNoteId === null) {
			$oNote = new Note();
		} else {
		  $oNote = NotePeer::retrieveByPK($this->iNoteId);
		}
		$sDateStart = $aNoteData['date_start'];
		if($sDateStart == '') {
			$sDateStart = date('Y-m-d');
		}
		$oNote->setDateStart($sDateStart);
		$oNote->setDateEnd($aNoteData['date_end']);
		$oNote->setNoteTypeId($aNoteData['note_type_id'] == null ? null : $aNoteData['note_type_id']);
		$oNote->setIsInactive($aNoteData['is_inactive']);
		$oNote->setBody(RichtextUtil::parseInputFromEditorForStorage($aNoteData['body']));
		$oNote->setImageId($aNoteData['image_id']);
		if($aNoteData['image_id'] == null && $oNote->getDocument()) {
			$oNote->getDocument()->delete();
		}
		$this->validate($aNoteData, $oNote);
		if(!Flash::noErrors()) {
			throw new ValidationException();
		}
		$oNote->save();
		return $oNote->getId();
	}
}