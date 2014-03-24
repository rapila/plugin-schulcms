<?php
class NotesFrontendConfigWidgetModule extends FrontendConfigWidgetModule {
	public function __construct($sSessionKey, $oFrontendModule) {
		parent::__construct($sSessionKey, $oFrontendModule);
	}
	
	public function updatePreview($oPreviewData) {
		return TagWriter::quickTag()->render();
	}
	
	public function options() {
		$aData['display_options'] = $this->getDisplayOptions();
		$aData['note_type_options'] = $this->getNoteTypeOptions();
		$aData['limit_options'] = array(1 => 1, 2 => 3, 5 => 5, 10 => 10, "__all" => "Alle");
		return $aData;
	}

	public function listNotes($aData) {
		$oNoteQuery = NoteQuery::create()->publishedOnly();
		if($aData['note_type'] !== null) {
			$oNoteQuery->filterByNoteTypeId($aData['note_type']);
		}
		if($aData['limit']) {
			$oNoteQuery->limit($aData['limit']);
		}
		return WidgetJsonFileModule::jsonBaseObjects($oNoteQuery->orderByDate()->find(), array('id', 'body_truncated'));
	}	
	
	private function getDisplayOptions() {
		$aResult = array();
		foreach(NotesFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
			$aResult[$sDisplayMode] = StringPeer::getString('display_mode.'.$sDisplayMode, null, $sDisplayMode);
		}
		return $aResult;
	}

	private function getNoteTypeOptions() {
		$aResult = array();
		return NoteTypeQuery::create()->orderByName()->find()->toKeyValue('Id', 'Name');
	}
}