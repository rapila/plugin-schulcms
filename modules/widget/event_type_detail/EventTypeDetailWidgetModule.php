<?php
class EventTypeDetailWidgetModule extends PersistentWidgetModule {

	private $iEventTypeId = null;

	public function setEventTypeId($iEventTypeId) {
		$this->iEventTypeId = $iEventTypeId;
	}

	public function loadData() {
		$oEventType = EventTypeQuery::create()->findPk($this->iEventTypeId);
		$aResult = $oEventType->toArray();
		$aResult['CreatedInfo'] = Util::formatCreatedInfo($oEventType);
		$aResult['UpdatedInfo'] = Util::formatUpdatedInfo($oEventType);
		return $aResult;
	}

	private function validate($aEventTypeData) {
		$oFlash = Flash::getFlash();
		$oFlash->setArrayToCheck($aEventTypeData);
		$oFlash->checkForValue('name', 'name_required');
		$oFlash->finishReporting();
	}

	public function saveData($aEventTypeData) {
		if($this->iEventTypeId === null) {
			$oEventType = new EventType();
		} else {
			$oEventType = EventTypeQuery::create()->findPk($this->iEventTypeId);
		}
		$this->validate($aEventTypeData);
		if(!Flash::noErrors()) {
			throw new ValidationException();
		}
		$oEventType->setName($aEventTypeData['name']);
		$oEventType->setIsExternallyManaged($aEventTypeData['is_externally_managed']);
		$oEventType->save();

		$oResult = new stdClass();
		if($this->iEventTypeId === null) {
			$oResult->inserted = true;
		} else {
			$oResult->updated = true;
		}
		$oResult->id = $this->iEventTypeId = $oEventType->getId();
		return $oResult;
	}

}