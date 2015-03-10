<?php
/**
 * @package navigation
 */
class NewsNavigationItem extends HiddenVirtualNavigationItem {

	public function __construct($sName, $sHeadline, $oNews = null) {
		$oData = new stdClass();
		$oData->news = $oNews;
		parent::__construct(get_class(), $sName, $sHeadline, null, $oData);
	}

	public static function create($sName, $sHeadLine, $oNews = null) {
		return new NewsNavigationItem($sName, $sHeadLine, $oNews);
	}

	public function getNews() {
		if($this->getData()->news === null) {
			return NewsQuery::create()->findPk($this->getName());
		}
		return $this->getData()->news;
	}
}
