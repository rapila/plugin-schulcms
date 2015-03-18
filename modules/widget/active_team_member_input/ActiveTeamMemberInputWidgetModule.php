<?php
/**
 * @package modules.widget
 */
class ActiveTeamMemberInputWidgetModule extends WidgetModule {

	private $bShowActiveMembersOnly;

	public function __construct($bDefaultSelection = true) {
		parent::__construct();
		$this->bShowActiveMembersOnly = $bDefaultSelection;
	}

	public function getElementType() {
		return new TagWriter('input', array('type' => 'checkbox', 'name' => 'with_functions_only', 'checked' => ($this->bShowActiveMembersOnly ? 'checked' : '')));
	}
}