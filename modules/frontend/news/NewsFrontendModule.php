<?php
/**
 * @package modules.frontend
 */

class NewsFrontendModule extends DynamicFrontendModule {

	public static $DISPLAY_MODES = array('current_note');

	const MODE_SELECT_KEY = 'display_mode';

	public function renderFrontend() {
		$aOptions = $this->widgetData();
		if(!isset($aOptions[self::MODE_SELECT_KEY])) {
			return null;
		}
		switch($aOptions[self::MODE_SELECT_KEY]) {
			case 'current_note': return $this->renderCurrentNews(@$aOptions['news_type_id'], @$aOptions['limit']);
			default:
				return null;
		}
	}

	public function renderCurrentNews($iNewsTypeId=null, $iLimit=null) {
		$oQuery = NewsQuery::create()->filterByIsInactive(false);
		if($iNewsTypeId !== null) {
			$oQuery->filterByNewsTypeId($iNewsTypeId);
		}
		$oQuery->filterByDate()->orderByDate();
		if($iLimit) {
			$oQuery->limit($iLimit);
		}

		foreach($oQuery->find() as $oNews) {
			if($oNews && is_resource($oNews->getBody())) {
				$oTemplate = $this->constructTemplate('news');
				if($oNewsType = $oNews->getNewsType()){
					$oTemplate->replaceIdentifier('news_type_name', $oNewsType->getName());
				}
				$sContent = stream_get_contents($oNews->getBody());
				if($sContent != '') {
					$oTemplate->replaceIdentifier('content', RichtextUtil::parseStorageForFrontendOutput($sContent));
				}
				return $oTemplate;
			}
		}
		return null;
	}
}
