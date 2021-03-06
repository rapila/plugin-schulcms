<?php

class ClassEventListWidgetModule extends EventListWidgetModule {
	public $iSchoolClassId;

	public function getCriteria() {
		return EventQuery::create()->filterBySchoolClassId($this->iSchoolClassId);
	}

	public function getColumnIdentifiers() {
		$aResult = parent::getColumnIdentifiers();
		$aResult = array_diff($aResult, array('body_short_truncated', 'class_name'));
		return $aResult;
	}

	public function allowSort($sSortColumn) {
		return true;
	}
}