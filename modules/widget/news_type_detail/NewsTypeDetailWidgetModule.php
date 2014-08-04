<?php
class NewsTypeDetailWidgetModule extends PersistentWidgetModule {

	private $iNewsTypeId = null;

	public function setNewsTypeId($iNewsTypeId) {
		$this->iNewsTypeId = $iNewsTypeId;
	}

	private function validate($aData) {
		$oFlash = Flash::getFlash();
		$oFlash->setArrayToCheck($aData);
		$oFlash->checkForValue('name', 'name_required');
		$oFlash->finishReporting();
	}

	public function loadData() {
		$oNewsType = NewsTypeQuery::create()->findPk($this->iNewsTypeId);
		$aResult = $oNewsType->toArray(BasePeer::TYPE_PHPNAME, false);
		$aResult['CreatedInfo'] = Util::formatCreatedInfo($oNewsType);
		$aResult['UpdatedInfo'] = Util::formatUpdatedInfo($oNewsType);
		ErrorHandler::log('RES', $aResult);
		return $aResult;
	}

	public function saveData($aData) {
		if($this->iNewsTypeId === null) {
			$oNewsType = new NewsType();
		} else {
			$oNewsType = NewsTypeQuery::create()->findPk($this->iNewsTypeId);
		}
		$oNewsType->setName($aData['name']);
		$oNewsType->setIsExternallyManaged($aData['is_externally_managed']);
    $this->validate($aData);
		if(!Flash::noErrors()) {
			throw new ValidationException();
		}
		$aResult = new StdClass();
		if($this->iNewsTypeId === null) {
			$aResult->inserted = true;
		} else {
			$aResult->updated = true;
		}
		$oNewsType->save();
		$aResult->id = $this->iNewsTypeId = $oNewsType->getId();
		return $aResult;
	}
}