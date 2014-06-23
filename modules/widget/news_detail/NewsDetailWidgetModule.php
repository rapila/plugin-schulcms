<?php
class NewsDetailWidgetModule extends PersistentWidgetModule {
	public function __construct($sSessionKey = null) {
		parent::__construct($sSessionKey);
	}
	
	public function getElementType() {
		return "form";
	}
	
	public function loadData() {
		
	}
	
	public function saveData($aData) {
		
	}
}