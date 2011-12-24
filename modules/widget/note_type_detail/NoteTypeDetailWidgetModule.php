<?php
/**
 * @package modules.widget
 */
class NoteTypeDetailWidgetModule extends PersistentWidgetModule {

	private $iNoteTypeId = null;
	
	public function setNoteTypeId($iNoteTypeId) {
		$this->iNoteTypeId = $iNoteTypeId;
	}
	
	public function getNoteTypeData() {
		$oNoteType = NoteTypePeer::retrieveByPK($this->iNoteTypeId);
		$aResult = $oNoteType->toArray();
		$aResult['CreatedInfo'] = Util::formatCreatedInfo($oNoteType);
		$aResult['UpdatedInfo'] = Util::formatUpdatedInfo($oNoteType);
    return $aResult;
	}

	private function validate($aNoteTypeData) {
		$oFlash = Flash::getFlash();
		$oFlash->setArrayToCheck($aNoteTypeData);
		$oFlash->checkForValue('name', 'name_required');
		$oFlash->finishReporting();
	}
	
	public function saveData($aNoteTypeData) {
		if($this->iNoteTypeId === null) {
			$oNoteType = new NoteType();
		} else {
			$oNoteType = NoteTypePeer::retrieveByPK($this->iNoteTypeId);
		}
		$oNoteType->setName($aNoteTypeData['name']);
    $this->validate($aNoteTypeData);
		if(!Flash::noErrors()) {
			throw new ValidationException();
		}
		return $oNoteType->save();
	}
}