<?php
/**
 * @package modules.widget
 */
class ServiceCategoryDetailWidgetModule extends PersistentWidgetModule {

	private $iCategoryId = null;
	
	public function setServiceCategoryId($iCategoryId) {
		$this->iCategoryId = $iCategoryId;
	}
	
	public function serviceCategoryData() {
		$oServiceCategory = ServiceCategoryPeer::retrieveByPK($this->iCategoryId);
		$aResult = $oServiceCategory->toArray(BasePeer::TYPE_PHPNAME, false);
		$aResult['CreatedInfo'] = Util::formatCreatedInfo($oServiceCategory);
		$aResult['UpdatedInfo'] = Util::formatUpdatedInfo($oServiceCategory);
    return $aResult;
	}

	private function validate($aServiceCategoryData) {
		$oFlash = Flash::getFlash();
		$oFlash->setArrayToCheck($aServiceCategoryData);
		$oFlash->checkForValue('name', 'name_required');
		$oFlash->finishReporting();
	}
	
	public function saveData($aServiceCategoryData) {
		if($this->iCategoryId === null) {
			$oCategory = new ServiceCategoryData();
		} else {
			$oCategory = ServiceCategoryPeer::retrieveByPK($this->iCategoryId);
		}
		$oCategory->setName($aServiceCategoryData['name']);
    $this->validate($aServiceCategoryData);
		if(!Flash::noErrors()) {
			throw new ValidationException();
		}
		return $oCategory->save();
	}
}