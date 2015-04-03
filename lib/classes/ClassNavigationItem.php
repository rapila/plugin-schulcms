<?php
/**
 * @package navigation
 */
class ClassNavigationItem extends VirtualNavigationItem {
	private $bIsFolder;
	private $bIsVisible;

	public function __construct($sName, $sLinkText, SchoolClass $oSchoolClass = null, $sMode, $sDisplayType = null, $sTitle = null, $bIsFolder = false, $bIsVisible = true) {
		$oData = new stdClass();
		$oData->schoolClass = $oSchoolClass;
		$oData->mode = $sMode;
		$oData->display_type = $sDisplayType;
		if($sTitle === null) {
			$sTitle = "Klasse ".$oSchoolClass->getUnitName().' '.$sLinkText;
		}
		$this->bIsFolder = $bIsFolder;
		$this->bIsVisible = $bIsVisible;
		parent::__construct(get_class(), $sName, $sTitle, $sLinkText, $oData);
	}

	public static function create($sName, $sLinkText, SchoolClass $oSchoolClass = null, $sMode, $sDisplayType = 'default') {
		return new ClassNavigationItem($sName, $sLinkText, $oSchoolClass, $sMode, $sDisplayType);
	}

	public function getMode() {
		return $this->getData()->mode;
	}

	public function getDisplayType() {
		return $this->getData()->display_type;
	}

	public function getClass() {
		return $this->getData()->schoolClass;
	}

	public function isFolder() {
		return $this->bIsFolder;
	}

	public function setIndexed($bIsIndexed) {
		$this->bIsIndexed = $bIsIndexed;
		return $this;
	}

	public function isVisible() {
		return $this->bIsVisible;
	}

	public function setVisible($bIsVisible) {
		$this->bIsVisible = $bIsVisible;
		return $this;
	}
}
