<?php

class ClassEventListWidgetModule extends EventListWidgetModule {
	public $iSchoolClassId;

	public function getCriteria() {
		return EventQuery::create()->filterBySchoolClassId($this->iSchoolClassId);
	}

	public function getColumnIdentifiers() {
		$aResult = parent::getColumnIdentifiers();
		$aResult = array_diff($aResult, array('teaser_truncated', 'is_class_event', 'is_common'));
		return $aResult;
	}

	public function allowSort($sSortColumn) {
		return true;
	}
}