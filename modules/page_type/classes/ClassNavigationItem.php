<?php
/**
 * @package navigation
 */
class ClassNavigationItem extends VirtualNavigationItem {

	public function __construct($sName, $sTitle, $sLinkText = null, SchoolClass $oSchoolClass, $sMode) {
		$oData = new stdClass();
		$oData->schoolClass = $oSchoolClass;
		$oData->mode = $sMode;
		parent::__construct(get_class(), $sName, $sTitle, $sLinkText, $aData);
	}

	public function getMode() {
		return $this->getData()->mode;
	}

	public function getSchoolClass() {
		return $this->getData()->schoolClass;
	}
}
