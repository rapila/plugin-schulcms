<?php
class ClassesFrontendConfigWidgetModule extends FrontendConfigWidgetModule {
	public function allClasses($iClassTypeId = null) {
		$aResult = array();
		foreach(SchoolClassQuery::create()->filterByClassTypeIdYearAndSchool($iClassTypeId)->orderByName()->find() as $oSchoolClass) {
			$aResult[$oSchoolClass->getId()] = $oSchoolClass->getClassTypeName().' '.$oSchoolClass->getUnitName();
		}
		return $aResult;
	}
	
	public function getDisplayModes() {
	  $aResult = array();
	  foreach(ClassesFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
	    $aResult[$sDisplayMode] = StringPeer::getString('classes.display_mode.'.$sDisplayMode, null, $sDisplayMode);
	  }
	  $aClassTypes = ClassTypeQuery::create()->filterByHasClassesWithStudents()->orderByName()->find();
		if(count($aClassTypes) > 0) {
			foreach($aClassTypes as $oClassType) {
				$aResult[$oClassType->getId()] = $oClassType->getName();
			}
		}		
		return $aResult;
	}
}