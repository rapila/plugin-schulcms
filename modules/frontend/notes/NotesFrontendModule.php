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
			case 'current_note': return $this->renderCurrentNote(@$aOptions['note_type_id']);
			default:
				return null;
		}
	}

	public function renderCurrentNote($iNoteTypeId = null) {
		$oQuery = NoteQuery::create()->filterByIsInactive(false);
		if($iNoteTypeId !== null) {
			$oQuery->filterByNoteTypeId($iNoteTypeId);
		}
		$oQuery->filterByDate()->orderByDateStart();
		$oNote = $oQuery->findOne();
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
		return null;
	}
	
	public function renderBackend() {
		$oTemplate = $this->constructTemplate('config');
		$aOptions = array();
		foreach(self::$DISPLAY_MODES as $sDisplayMode) {
			$aOptions[$sDisplayMode] = StringPeer::getString('notes.display_option.'.$sDisplayMode, null, StringUtil::makeReadableName($sDisplayMode));
		}
		$oTemplate->replaceIdentifier('display_options', TagWriter::optionsFromArray($aOptions, null, null, null));
		$oTemplate->replaceIdentifier('type_options', TagWriter::optionsFromObjects(NoteTypeQuery::create()->orderByName()->find(), 'getId', 'getName', null, array('' => StringPeer::getString('wns.notes.all_note_types'))));
		return $oTemplate;
	}
}
