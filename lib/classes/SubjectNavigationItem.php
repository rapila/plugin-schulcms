<?php
/**
 * @package navigation
 */
class SubjectNavigationItem extends VirtualNavigationItem {
	private $bIsFolder;
	private $bIsVisible;

	public function __construct($sName, $sLinkText, $iId, $sMode, $bIsVisible = true) {
		$oData = new stdClass();
		$oData->id = $iId;
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

	public static function create($sName, $sLinkText, $iId, $sMode, $bIsFolder = false) {
		return new SubjectNavigationItem($sName, $sLinkText, $iId, $sMode, $bIsFolder);
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

	public function getId() {
		return $this->getData()->id;
	}

	public function isFolder() {
		return $this->bIsFolder;
	}
}
