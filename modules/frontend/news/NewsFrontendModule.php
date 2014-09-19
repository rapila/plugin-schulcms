<?php
/**
 * @package modules.frontend
 */

class NewsFrontendModule extends DynamicFrontendModule {

	public static $DISPLAY_MODES = array('current_news', 'current_news_short', 'news_home_list', 'news_carousel');

	const MODE_SELECT_KEY = 'display_mode';

	public function renderFrontend() {
		$aOptions = $this->widgetData();
		if(!isset($aOptions[self::MODE_SELECT_KEY])) {
			return null;
		}
		$aNewsTypes = @$aOptions['news_type'];
		$iLimit = @$aOptions['limit'];

		switch($aOptions[self::MODE_SELECT_KEY]) {
			case 'current_news': return $this->renderCurrentNews($aNewsTypes, $iLimit);
			case 'current_news_short': return $this->renderCurrentNews($aNewsTypes, $iLimit, true);
			case 'news_home_list': return $this->renderMainNews($aNewsTypes, $iLimit, true);
			case 'news_carousel': return $this->renderNewsCarousel($aNewsTypes, $iLimit);
			default:
				return null;
		}
	}

	public function renderCurrentNews($iNewsTypeId = null, $iLimit = null, $bShort = false) {
		$oTemplate = $this->constructTemplate('list');
		$oItemPrototype = $this->constructTemplate($bShort ? 'short' : 'full');
		foreach($this->query($iNewsTypeId, $iLimit)->find() as $oNews) {
			$oTemplate->replaceIdentifierMultiple('item', $this->renderItem($oNews, clone $oItemPrototype, $bShort));
		}
		return $oTemplate;
	}

	public function renderMainNews($iNewsTypeId = null, $iLimit = null) {
		$oTemplate = $this->constructTemplate('list');
		$oItemPrototype = $this->constructTemplate('short');
		foreach($this->query($iNewsTypeId, $iLimit)->find() as $i => $oNews) {
			if($i === 0) {
				$oItemTemplate = $this->renderItem($oNews, $this->constructTemplate('full'), false);
				$oItemTemplate->replaceIdentifier('footer', $oNews->getUserRelatedByCreatedBy()->getFullName() . ' ' . LocaleUtil::localizeDate($oNews->getUpdatedAt()));
				$oTemplate->replaceIdentifierMultiple('item', $oItemTemplate);
			} else {
				$oTemplate->replaceIdentifierMultiple('item', $this->renderItem($oNews, clone $oItemPrototype));
			}
		}
		return $oTemplate;
	}

	public function renderNewsCarousel($iNewsTypeId = null, $iLimit = null) {
		// load carousel js
		$oTemplate = $this->constructTemplate('list');
		$oItemPrototype = $this->constructTemplate('truncated');
		foreach($this->query($iNewsTypeId, $iLimit)->find() as $i => $oNews) {
			$oTemplate->replaceIdentifierMultiple('item', $this->renderItem($oNews, clone $oItemPrototype));
		}
		return $oTemplate;
	}

	private function query($iNewsTypeId, $iLimit) {
		$oQuery = FrontendNewsQuery::create()->current()->orderByDateStart();
		if($iNewsTypeId !== null) {
			$oQuery->filterByNewsTypeId($iNewsTypeId);
		}
		if($iLimit) {
			$oQuery->limit($iLimit);
		}
		return $oQuery;
	}

	private function renderItem($oNews, $oItemTemplate, $bShort = true) {
		$sContent = '';
		if($bShort && is_resource($oNews->getBodyShort())) {
			$sContent = stream_get_contents($oNews->getBodyShort());
		} else if (is_resource($oNews->getBody())) {
			$sContent = stream_get_contents($oNews->getBody());
		}
		$oItemTemplate->replaceIdentifier('headline', $oNews->getHeadline());
		$oItemTemplate->replaceIdentifier('content', RichtextUtil::parseStorageForFrontendOutput($sContent));
		$oItemTemplate->replaceIdentifier('date_start', LocaleUtil::localizeDate($oNews->getDateStart()));
		return $oItemTemplate;
	}
}
