<?php

class ClassDocumentListWidgetModule extends DocumentListWidgetModule {
	public $iSchoolClassId;

	public function getCriteria() {
		return DocumentQuery::create()->joinDocumentType(null, Criteria::LEFT_JOIN)->joinDocumentData()->useClassDocumentQuery()->filterBySchoolClassId($this->iSchoolClassId)->endUse();
	}

	public function getColumnIdentifiers() {
		$aResult = parent::getColumnIdentifiers();
		$aResult = array_diff($aResult, array('document_kind', 'has_tags', 'category_name', 'is_protected', 'sort'));
		return $aResult;
	}

	public function allowSort($sSortColumn) {
		return true;
	}
}