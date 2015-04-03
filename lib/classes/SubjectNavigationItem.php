<?php
/**
 * @package navigation
 */
class SubjectNavigationItem extends VirtualNavigationItem {
	private $bIsFolder;
	private $bIsVisible;

	public function __construct($sName, $sLinkText, Subject $oSubject = null, $sMode, $sTitle = null, $bIsFolder = false, $bIsVisible = true) {
		$oData = new stdClass();
		$oData->subject = $oSubject;
		$oData->mode = $sMode;
		if($sTitle === null) {
			$sTitle = $sLinkText;
		}
		$this->bIsFolder = $bIsFolder;
		$this->bIsVisible = $bIsVisible;
		parent::__construct(get_class(), $sName, $sTitle, $sLinkText, $oData);
	}

	public function isVisible() {
		return $this->bIsVisible;
	}

	public static function create($sName, $sLinkText, Subject $oSubject = null, $sMode, $sTitle = null, $bIsFolder = false) {
		return new SubjectNavigationItem($sName, $sLinkText, $oSubject, $sMode, $sTitle, $bIsFolder);
	}

	public function setIndexed($bIsIndexed) {
		$this->bIsIndexed = $bIsIndexed;
		return $this;
	}

	public function setVisible($bIsVisible) {
		$this->bIsVisible = $bIsVisible;
		return $this;
	}

	public function getMode() {
		return $this->getData()->mode;
	}

	public function getSubject() {
		return $this->getData()->subject;
	}

	public function isFolder() {
		return $this->bIsFolder;
	}
}
