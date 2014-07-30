<?php

class ClassLinkListWidgetModule extends LinkListWidgetModule {
	public $iSchoolClassId;

	public function getCriteria() {
		return LinkQuery::create()->useClassLinkQuery()->filterBySchoolClassId($this->iSchoolClassId)->endUse();
	}

	public function getColumnIdentifiers() {
		$aResult = parent::getColumnIdentifiers();
		$aResult = array_diff($aResult, array('category_name', 'has_tags'));
		return $aResult;
	}

	public function allowSort($sSortColumn) {
		return true;
	}

}