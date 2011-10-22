<?php
class ClassesFrontendConfigWidgetModule extends FrontendConfigWidgetModule {
	public function allClasses($iClassTypeId = null) {
		$oCriteria = new Criteria;
		$oCriteria->clearSelectColumns()->addSelectColumn(SchoolClassPeer::ID)->addSelectColumn(SchoolClassPeer::NAME);
		if($iClassTypeId) {
			$oCriteria->add(SchoolClassPeer::CLASS_TYPE_ID, $iClassTypeId);
		}
    $oCriteria->addAscendingOrderByColumn(SchoolClassPeer::NAME);
		return SchoolClassPeer::doSelectStmt($oCriteria)->fetchAll(PDO::FETCH_ASSOC);
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