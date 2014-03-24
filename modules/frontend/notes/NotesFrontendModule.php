<?php
/**
 * @package modules.frontend
 */

class NotesFrontendModule extends DynamicFrontendModule {
	
	public static $DISPLAY_MODES = array('current_note');
	
	const MODE_SELECT_KEY = 'display_mode';
	
	public function renderFrontend() {
		$aOptions = $this->widgetData();
		if(!isset($aOptions[self::MODE_SELECT_KEY])) {
			return null;
		}
		switch($aOptions[self::MODE_SELECT_KEY]) {
			case 'current_note': return $this->renderCurrentNote(@$aOptions['note_type_id'], @$aOptions['limit']);
			default:
				return null;
		}
	}

	public function renderCurrentNote($iNoteTypeId=null, $iLimit=null) {
		$oQuery = NoteQuery::create()->filterByIsInactive(false);
		if($iNoteTypeId !== null) {
			$oQuery->filterByNoteTypeId($iNoteTypeId);
		}
		$oQuery->filterByDate()->orderByDate();
		if($iLimit) {
			$oQuery->limit($iLimit);
		}

		foreach($oQuery->find() as $oNote) {
			if($oNote && is_resource($oNote->getBody())) {
				$oTemplate = $this->constructTemplate('note');
				if($oNoteType = $oNote->getNoteType()){
					$oTemplate->replaceIdentifier('note_type_name', $oNoteType->getName());
				}
				$sContent = stream_get_contents($oNote->getBody());
				if($sContent != '') {
					$oTemplate->replaceIdentifier('content', RichtextUtil::parseStorageForFrontendOutput($sContent));
				}
				return $oTemplate;
			}
		}
		return null;
	}
}
