<?php
class ClassesEditWidgetModule extends PersistentWidgetModule {
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
	
	public function allClasses() {
		$oCriteria = new Criteria;
		$oCriteria->clearSelectColumns()->addSelectColumn(SchoolClassPeer::ID)->addSelectColumn(SchoolClassPeer::NAME);
    $oCriteria->addAscendingOrderByColumn(SchoolClassPeer::NAME);
		return SchoolClassPeer::doSelectStmt($oCriteria)->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getDisplayModes() {
	  $aResult = array();
	  foreach(ClassesFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
	    $aResult[$sDisplayMode] = StringPeer::getString('display_mode.'.$sDisplayMode, null, $sDisplayMode);
	  }
		return $aResult;
	}
	
	public function saveData($mData) {
		return $this->oFrontendModule->widgetSave($mData);
	}
}