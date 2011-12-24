<?php
/**
 * @package modules.widget
 */
class NoteDetailWidgetModule extends PersistentWidgetModule {
	private $iNoteId = null;
	private $aUnsavedDocuments = array();
	
	public function __construct($sWidgetId) {
		parent::__construct($sWidgetId);
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
		$aResult = array();
		$aResult['DateStart'] = $oNote->getDateStart('d.m.Y');
		$aResult['DateEnd'] = $oNote->getDateEnd('d.m.Y');
		$aResult['CreatedInfo'] = Util::formatCreatedInfo($oNote);
		$aResult['UpdatedInfo'] = Util::formatUpdatedInfo($oNote);
    $sBody = '';
		if(is_resource($oNote->getBody())) {
			$sBody = RichtextUtil::parseStorageForBackendOutput(stream_get_contents($oNote->getBody()))->render();
		}
		$aResult['NoteBody'] = $sBody;
		return $aResult;
	}
	
	private function validate($aNoteData) {
		$oFlash = Flash::getFlash();
		$oFlash->setArrayToCheck($aNoteData);
		$oFlash->checkForValue('body', 'body_required');
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
		$this->validate($aNoteData);
		$oNote->setNoteTypeId($aNoteData['note_type_id'] == null ? null : $aNoteData['note_type_id']);
		$oNote->setBody(RichtextUtil::parseInputFromEditorForStorage($aNoteData['body']));
		if(!Flash::noErrors()) {
			throw new ValidationException();
		}
		$oNote->save();
		return $oNote->getId();
	}
}