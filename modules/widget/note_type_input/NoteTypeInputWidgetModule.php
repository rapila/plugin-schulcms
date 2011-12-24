<?php
/**
 * @package modules.widget
 */
class NoteTypeInputWidgetModule extends WidgetModule {
	
	public function getNoteTypes() {
		return WidgetJsonFileModule::jsonBaseObjects(NoteTypeQuery::create()->orderByName()->find(), array('id', 'name'));
	}
}