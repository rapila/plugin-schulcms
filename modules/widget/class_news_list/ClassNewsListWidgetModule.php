<?php
class ClassNewsListWidgetModule extends NewsListWidgetModule {
	public $iSchoolClassId;

	public function getColumnIdentifiers() {
		$aResult = parent::getColumnIdentifiers();
		$aResult = array_diff($aResult, array('body_truncated'));
		return $aResult;
	}

	public function getCriteria() {
		return NewsQuery::create()->filterBySchoolClassId($this->iSchoolClassId);
	}
}