<?php
/**
 * @package modules.widget
 */
class ClassesFeVisiblesInputWidgetModule extends WidgetModule {

	private $bDisplayFeVisiblesOnly;

	public function __construct($sDefaultSelection = true) {
		parent::__construct();
		$this->bDisplayFeVisiblesOnly = $sDefaultSelection;
	}

	public function getElementType() {
		return new TagWriter('input', array('type' => 'checkbox', 'name' => 'fe_visibles_only', 'checked' => ($this->bDisplayFeVisiblesOnly ? 'checked' : '')));
	}
}