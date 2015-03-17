<?php
/**
 * @package navigation
 */
class SubjectNavigationItem extends VirtualNavigationItem {

	private $bIsFolder;
	private $bIsVisible;

	public function __construct($sName, $sLinkText, $iId, $bIsFolder = false) {
		$oData = new stdClass();
		$oData->id = $iId;
		$this->bIsFolder = $bIsFolder;
		parent::__construct(get_class(), $sName, $iId, $sLinkText, $oData);
	}

	public static function create($sName, $sLinkText, $iId, $bIsFolder = false) {
		return new SubjectNavigationItem($sName, $sLinkText, $iId, $bIsFolder);
	}

	public function setVisible($bIsVisible) {
		$this->bIsVisible = $bIsVisible;
		return $this;
	}

	public function getId() {
		$this->getData()->id;
	}

	public function isVisible() {
		return $this->bIsVisible;
	}

	public function isFolder() {
		return $this->bIsFolder;
	}
}
