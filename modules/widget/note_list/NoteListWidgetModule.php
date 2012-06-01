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
		return array('id', 'date_start_formatted', 'date_end_formatted', 'body_truncated', 'note_type_name', 'has_image', 'is_inactive', 'delete');
	}
	
	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array('is_sortable' => true);
		switch($sColumnIdentifier) {
			case 'date_start_formatted':
				$aResult['heading'] = StringPeer::getString('wns.note.date');
				break;			
			case 'date_end_formatted':
				$aResult['heading'] = StringPeer::getString('wns.note.date_to');
				$aResult['is_sortable'] = false;
				break;
			case 'body_truncated':
				$aResult['heading'] = StringPeer::getString('wns.note.body');
				break;
			case 'note_type_name':
				$aResult['heading'] = StringPeer::getString('wns.note.type');
				$aResult['is_sortable'] = false;
				break;
			case 'has_image':
				$aResult['heading'] = StringPeer::getString('wns.note.has_image');
				break;
				$aResult['is_sortable'] = false;
			case 'is_inactive':
				$aResult['heading'] = StringPeer::getString('wns.note.is_inactive');
				break;
			case 'delete':
				$aResult['heading'] = ' ';
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_ICON;
				$aResult['field_name'] = 'trash';
				$aResult['is_sortable'] = false;
				break;
		}
		return $aResult;
	}
	
	public function getTypeHasNotes($iNoteTypeId) {
		return NoteQuery::create()->filterByNoteTypeId($iNoteTypeId)->count() > 0;
	}
	
	public function getNoteTypeName() {
		$oNoteType = NoteTypeQuery::create()->findPk($this->oDelegateProxy->getNoteTypeId());
		if($oNoteType) {
			return $oNoteType->getName();
		}
		if($this->oDelegateProxy->getNoteTypeId() === CriteriaListWidgetDelegate::SELECT_WITHOUT) {
			return StringPeer::getString('wns.notes.without_note_type');
		}
		return $this->oDelegateProxy->getNoteTypeId();
	}
	
	public function getDatabaseColumnForColumn($sColumnIdentifier) {
		if($sColumnIdentifier === 'date_start_formatted') {
			return NotePeer::DATE_START;
		}			
		if($sColumnIdentifier === 'body_truncated') {
			return NotePeer::BODY;
		}		
		if($sColumnIdentifier === 'has_image') {
			return NotePeer::IMAGE_ID;
		}
		return null;
	}

	public function getFilterTypeForColumn($sColumnIdentifier) {
		if($sColumnIdentifier === 'note_type_id') {
			return CriteriaListWidgetDelegate::FILTER_TYPE_IS;
		}
		return null;
	}
}