<?php
/**
 * @package modules.frontend
 */

class NewsFrontendModule extends DynamicFrontendModule {

	public static $DISPLAY_MODES = array('current_news', 'current_news_teaser');

	const MODE_SELECT_KEY = 'display_mode';

	public function renderFrontend() {
		$aOptions = $this->widgetData();
		if(!isset($aOptions[self::MODE_SELECT_KEY])) {
			return null;
		}
		// Util::dumpAll($aNewsTypeIds);
		switch($aOptions[self::MODE_SELECT_KEY]) {
			case 'current_news': return $this->renderCurrentNews(@$aOptions['news_type'], @$aOptions['limit']);
			case 'current_news_teaser': return $this->renderCurrentNews(@$aOptions['news_type'], @$aOptions['limit'], true);
			default:
				return null;
		}
	}

	public function renderCurrentNews($iNewsTypeId=null, $iLimit=null, $bTeaserOnly = false) {
		$sContainerName = $this->oLanguageObject->getContentObject()->getContainerName();

		$oQuery = FrontendNewsQuery::create()->current()->orderByDateStart();
		if($iNewsTypeId !== null) {
			$oQuery->filterByNewsTypeId($iNewsTypeId);
		}
		if($iLimit) {
			$oQuery->limit($iLimit);
		}
		$oNewsPrototype = $this->constructTemplate($bTeaserOnly? 'news_short' : 'news');
		foreach($oQuery->find() as $oNews) {
			if($oNews && is_resource($oNews->getBody())) {
				$oTemplate = clone $oNewsPrototype;
				$sContent = stream_get_contents($oNews->getBody());
				if($sContent != '') {
					$oTemplate->replaceIdentifier('headline', $oNews->getHeadline());
					$sContent = RichtextUtil::parseStorageForFrontendOutput($sContent);
					if($bTeaserOnly) {
						$sContent = strip_tags($sContent);
					}
					$oTemplate->replaceIdentifier('content', $sContent);
				}
				return $oTemplate;
			}
		}
		return null;
	}
}
