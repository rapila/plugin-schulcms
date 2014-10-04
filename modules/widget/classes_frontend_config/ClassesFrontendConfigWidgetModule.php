<?php
class ClassesFrontendConfigWidgetModule extends FrontendConfigWidgetModule {
	public function allClasses($iClassType = null) {
		$aResult = array();
		foreach(SchoolClassQuery::create()->filterByClassTypeYearAndSchool($iClassType)->orderByName()->find() as $oSchoolClass) {
			$aResult[$oSchoolClass->getId()] = $oSchoolClass->getFullClassName();
		}
		return $aResult;
	}

	public function getDisplayModes() {
	  $aResult = array();
	  foreach(ClassesFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
	    $aResult[$sDisplayMode] = StringPeer::getString('classes.display_mode.'.$sDisplayMode, null, $sDisplayMode);
	  }
	  $aClassTypes = SchoolClassQuery::create()->filterByHasClassesWithStudents()->distinct()->orderByClassType()->select(array('ClassType'))->find();
		if(count($aClassTypes) > 0) {
			foreach($aClassTypes as $oClassType) {
				$aResult[$oClassType->getId()] = $oClassType->getName();
			}
		}
		return $aResult;
	}
}