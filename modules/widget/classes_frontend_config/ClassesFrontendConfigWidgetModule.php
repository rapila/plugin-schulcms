<?php
class ClassesFrontendConfigWidgetModule extends PersistentWidgetModule {
	private $oFrontendModule;
	private $sDisplayMode;
	
	public function __construct($sSessionKey, $oFrontendModule) {
		parent::__construct($sSessionKey);
		$this->oFrontendModule = $oFrontendModule;
		$this->sDisplayMode = $this->oFrontendModule->widgetData();
	}
	
	public function setDisplayMode($sDisplayMode) {
		$this->sDisplayMode = $sDisplayMode;
	}

	public function getDisplayMode() {
		return $this->sDisplayMode;
	}
	
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