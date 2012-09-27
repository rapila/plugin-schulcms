<?php
class ClassesFrontendConfigWidgetModule extends FrontendConfigWidgetModule {
	public function allClasses($iClassTypeId = null) {
		return SchoolClassQuery::create()->filterByClassTypeIdYearAndSchool($iClassTypeId)->orderByName()->find()->toKeyValue('Id', 'Name');
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