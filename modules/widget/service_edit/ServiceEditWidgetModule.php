<?php
class ServiceEditWidgetModule extends PersistentWidgetModule { 
	private $oFrontendModule;
	private $aDisplayModes;
	
	public function __construct($sSessionKey, $oFrontendModule) {
		parent::__construct($sSessionKey);
		$this->oFrontendModule = $oFrontendModule;
		$this->aDisplayModes = $this->oFrontendModule->widgetData();
	}
	
	public function setDisplayMode($aDisplayMode) {
		$this->aDisplayModes = $aDisplayMode;
	}

	public function getDisplayMode($sKey=null) {
		if($sKey === null) {
		  if(!is_array($this->aDisplayModes)) {
		    return array();
		  }
			return $this->aDisplayModes;
		}
		if(isset($this->aDisplayModes[$sKey])) {
			return $this->aDisplayModes[$sKey];
		}
		return null;
	}

	public function getDisplayModes() {
		$aResult = array();
		foreach(ServicesFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
			$aResult[$sDisplayMode] = StringPeer::getString('display_mode.'.$sDisplayMode, null, $sDisplayMode);
		}
		$aServiceCategories = ServiceCategoryPeer::getAllSorted();
		if(count($aServiceCategories) > 0) {
			foreach($aServiceCategories as $oCategory) {
				$aResult[$oCategory->getId()] = StringPeer::getString('wns.service_category.short'). ': '.$oCategory->getName();
			}
		}
		return $aResult;
	}
	
	public function allServices($mServiceCategory = null) {
		return $this->getServices($mServiceCategory);
	}
	
	public function getServices($mServiceCategory = null) {
		$oCriteria = new Criteria;
		$oCriteria->clearSelectColumns()->addSelectColumn(ServicePeer::ID)->addSelectColumn(ServicePeer::NAME);
		if($mServiceCategory !== null) {
		  $oCriteria->add(ServicePeer::SERVICE_CATEGORY_ID, $mServiceCategory);
		}
		$oCriteria->addAscendingOrderByColumn(ServicePeer::NAME);
		return ServicePeer::doSelectStmt($oCriteria)->fetchAll(PDO::FETCH_ASSOC);
	}

	public function saveData($mData) {
		return $this->oFrontendModule->widgetSave($mData);
	}
	
	public function getElementType() {
		return 'form';
	}
	
}
