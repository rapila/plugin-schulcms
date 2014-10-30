<?php
/**
 * @package navigation
 */
class TeamMemberNavigationItem extends VirtualNavigationItem {
	private $bIsFolder;
	private $bIsVisible;

	public function __construct($sName, $sLinkText, $sTitle = null, $bIsFolder = false, $bIsVisible = false) {
		$oData = new stdClass();
		$oData->slug = $sName;
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

	public function isFolder() {
		return $this->bIsFolder;
	}

	public static function create($sName, $sLinkText, $sTitle = null, $bIsFolder = false) {
		return new TeamMemberNavigationItem($sName, $sLinkText, $sTitle, $bIsFolder);
	}

	public function setIndexed($bIsIndexed) {
		$this->bIsIndexed = $bIsIndexed;
		return $this;
	}

	public function getTeamMember() {
		return TeamMemberQuery::create()->filterBySlug($this->getData()->slug)->findOne();
	}
}
