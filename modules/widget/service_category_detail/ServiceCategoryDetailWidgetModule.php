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
		$oServiceCategory = ServiceCategoryQuery::create()->findPk($this->iCategoryId);
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
			$oCategory = ServiceCategoryQuery::create()->findPk($this->iCategoryId);
		}
		$oCategory->setName($aServiceCategoryData['name']);
    $this->validate($aServiceCategoryData);
		if(!Flash::noErrors()) {
			throw new ValidationException();
		}
		$oCategory->save();
		
		$oResult = new stdClass();
		$oResult->id = $oCategory->getId();
		if($this->iCategoryId === null) {
			$oResult->inserted = true;
		} else {
			$oResult->updated = true;
		}
		$this->iCategoryId = $oResult->id;
		return $oResult;
	}
}