<?php
/**
 * @package modules.widget
 */
class ActiveTeamMemberInputWidgetModule extends WidgetModule {
	
	private $bShowActiveMembersOnly;
	
	public function __construct($sSessionKey, $sDefaultSelection = true) {
		parent::__construct($sSessionKey);
		$this->bShowActiveMembersOnly = $sDefaultSelection;
	}
	
	public function getElementType() {
		return new TagWriter('input', array('type' => 'checkbox', 'name' => 'with_functions_only', 'checked' => ($this->bShowActiveMembersOnly ? 'checked' : '')));
	}
}