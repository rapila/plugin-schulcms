<?php
/**
 * @package navigation
 */
class ClassNavigationItem extends VirtualNavigationItem {
	private $bIsFolder;
	private $bIsVisible;
	private $oClass = null;
	private $iClassId = null;

	public function __construct($sName, $sLinkText, SchoolClass $oSchoolClass = null, $sMode, $sDisplayType = null, $sTitle = null, $bIsFolder = false, $bIsVisible = true) {
		$this->oClass = $oSchoolClass;
		if($this->oClass !== null) {
			$this->iClassId = $this->oClass->getId();
		}
		$oData = new stdClass();
		$oData->mode = $sMode;
		$oData->display_type = $sDisplayType;
		if($sTitle === null) {
			if($oSchoolClass) {
				$sTitle = $oSchoolClass->getFullClassName().': '.$sLinkText;
			} else {
				$sTitle = $sLinkText;
			}
		}
		$this->bIsFolder = $bIsFolder;
		$this->bIsVisible = $bIsVisible;
		parent::__construct(get_class(), $sName, $sTitle, $sLinkText, $oData);
	}

	public static function create($sName, $sLinkText, SchoolClass $oSchoolClass = null, $sMode, $sDisplayType = 'default', $sTitle = null) {
		return new ClassNavigationItem($sName, $sLinkText, $oSchoolClass, $sMode, $sDisplayType, $sTitle);
	}

	public function getMode() {
		return $this->getData()->mode;
	}

	public function getDisplayType() {
		return $this->getData()->display_type;
	}

	public function getClass() {
		if($this->oClass === null && $this->iClassId !== null) {
			$this->oClass = SchoolClassQuery::create()->findPk($this->iClassId);
		}
		return $this->oClass;
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

	public function __sleep() {
		$this->oClass = null;
		return parent::__sleep();
	}
}
