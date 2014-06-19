<?php

class ClassLinkListWidgetModule extends LinkListWidgetModule {
	
	public function setSchoolClassId($sSchoolClassId) {
		$this->sCriteria = LinkQuery::create()->useClassLinkQuery()->filterBySchoolClassId($sSchoolClassId)->endUse();
	}
}