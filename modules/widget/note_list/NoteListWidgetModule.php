<?php
/**
 * @package modules.widget
 */
class NoteListWidgetModule extends WidgetModule {

	private $oListWidget;
	public $oDelegateProxy;
	
	public function __construct() {
		$this->oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, "Note", "id", "asc");
		$this->oListWidget->setDelegate($this->oDelegateProxy);
	}
	
	public function doWidget() {
		$aTagAttributes = array('class' => 'note_list');
		$oListTag = new TagWriter('table', $aTagAttributes);
		$this->oListWidget->setListTag($oListTag);
		return $this->oListWidget->doWidget();
	}
	
	public function getColumnIdentifiers() {
		return array('id', 'date_start_formatted', 'date_end_formatted', 'body_truncated', 'note_type_name', 'delete');
	}
	
	public function getMetadataForColumn($sColumnIdentifier) {
	  $aResult = array();
		switch($sColumnIdentifier) {
			case 'date_start_formatted':
				$aResult['heading'] = StringPeer::getString('wns.note.date');
				$aResult['sortable'] = true;
				break;			
			case 'date_end_formatted':
				$aResult['heading'] = StringPeer::getString('wns.note.date_to');
				$aResult['sortable'] = true;
				break;
			case 'body_truncated':
				$aResult['heading'] = StringPeer::getString('wns.note.body');
				break;
			case 'note_type_name':
				$aResult['heading'] = StringPeer::getString('wns.note.type');
				break;
			case 'delete':
				$aResult['heading'] = ' ';
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_ICON;
				$aResult['field_name'] = 'trash';
				break;
		}
		return $aResult;
	}
	
	public function typeHasNotes($iNoteTypeId) {
		return NotesQuery::create()->filterByNoteTypeId($iNoteTypeId)->count() > 0;
	}

	
	public function getFilterTypeForColumn($sColumnIdentifier) {
		if($sColumnIdentifier === 'note_type_id') {
			return CriteriaListWidgetDelegate::FILTER_TYPE_IS;
		}
		return null;
	}

}