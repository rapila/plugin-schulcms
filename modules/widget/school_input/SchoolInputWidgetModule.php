<?php

class SchoolInputWidgetModule extends PersistentWidgetModule {

	public function __construct($sWidgetId) {
		parent::__construct($sWidgetId);
	}

	public function listSchools($bUseOriginalId = false) {
		$sId = $bUseOriginalId ? 'OriginalId' : 'Id';
		$oQuery = SchoolQuery::create()->orderByName();
		return WidgetJsonFileModule::jsonOrderedObject($oQuery->select(array($sId, 'Name'))->find()->toKeyValue($sId, 'Name'));
	}
}
