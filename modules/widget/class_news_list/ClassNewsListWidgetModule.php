<?php
class ClassNewsListWidgetModule extends NewsListWidgetModule {
	public $iSchoolClassId;

	public function getCriteria() {
		return NewsQuery::create()->useClassNewsQuery()->filterBySchoolClassId($this->iSchoolClassId)->endUse();
	}

	public function getColumnIdentifiers() {
		$aResult = parent::getColumnIdentifiers();
		$aResult = array_diff($aResult, array('news_type_name'));
		return $aResult;
	}
}