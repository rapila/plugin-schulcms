<?php
/**
 * @package navigation
 */
class ClassNavigationItem extends VirtualNavigationItem {
	private $bIsFolder;

	public function __construct($sName, $sPageName, SchoolClass $oSchoolClass = null, $sMode, $sTitle = null, $bIsFolder = false) {
		$oData = new stdClass();
		$oData->schoolClass = $oSchoolClass;
		$oData->mode = $sMode;
		if($sTitle === null) {
			$sTitle = "Klasse ".$oSchoolClass->getUnitName().$sPageName;
		}
		$this->bIsFolder = $bIsFolder;
		parent::__construct(get_class(), $sPageName, $sTitle, $sLinkText, $aData);
	}

	public static function create($sName, $sPageName, SchoolClass $oSchoolClass = null, $sMode, $sTitle = null, $bIsFolder = false) {
		return new ClassNavigationItem($sName, $sPageName, $oSchoolClass, $sMode, $sTitle, $bIsFolder);
	}

	public function setEvent(Event $oEvent) {
		$this->getData()->event = $oEvent;
		return $this;
	}

	public function setIndexed($bIsIndexed) {
		$this->bIsIndexed = $bIsIndexed;
		return $this;
	}

	public function getEvent() {
		return $this->getData()->event;
	}

	public function getMode() {
		return $this->getData()->mode;
	}

	public function getSchoolClass() {
		return $this->getData()->schoolClass;
	}

	public function isFolder() {
		return $this->bIsFolder;
	}
}
