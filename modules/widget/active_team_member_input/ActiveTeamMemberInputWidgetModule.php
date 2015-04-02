<?php
/**
 * @package modules.widget
 */
class ActiveTeamMemberInputWidgetModule extends WidgetModule {

	private $bShowActiveMembersOnly;

	public function __construct($sSession = null, $bDefaultSelection = false) {
		$this->bShowActiveMembersOnly = $bDefaultSelection;
		parent::__construct($sSession);
	}

	public function getElementType() {
		return new TagWriter('input', array('type' => 'checkbox', 'name' => 'with_functions_only', 'checked' => ($this->bShowActiveMembersOnly ? 'checked' : '')));
	}
}