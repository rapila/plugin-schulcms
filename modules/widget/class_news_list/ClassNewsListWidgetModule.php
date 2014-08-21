<?php
class ClassNewsListWidgetModule extends NewsListWidgetModule {
	public $iSchoolClassId;

	public function getCriteria() {
		return NewsQuery::create()->useClassNewsQuery()->filterBySchoolClassId($this->iSchoolClassId)->endUse();
	}
}