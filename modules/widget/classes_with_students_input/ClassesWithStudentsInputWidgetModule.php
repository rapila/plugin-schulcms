<?php
/**
 * @package modules.widget
 */
class ClassesWithStudentsInputWidgetModule extends WidgetModule {
	
	private $bShowWithStudentsOnly;
	
	public function __construct($sSessionKey, $sDefaultSelection = true) {
		parent::__construct($sSessionKey);
		$this->bShowWithStudentsOnly = $sDefaultSelection;
	}
	
	public function getElementType() {
		return new TagWriter('input', array('type' => 'checkbox', 'name' => 'with_students_only', 'checked' => ($this->bShowWithStudentsOnly ? 'checked' : '')));
	}
}