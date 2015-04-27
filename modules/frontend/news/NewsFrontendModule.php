<?php
/**
 * @package modules.frontend
 */

class NewsFrontendModule extends DynamicFrontendModule {

	public static $DISPLAY_MODES = array(
		'detail',
		'list_short',
		'list_title',
		'list_full',
		'list_without_first',
		'carousel'
	);

	public $sDisplayMode;
	const MODE_SELECT_KEY = 'display_mode';

	public function renderFrontend() {
		$aOptions = $this->widgetData();
		$this->sDisplayMode = @$aOptions[self::MODE_SELECT_KEY];

		$aNewsTypes = @$aOptions['news_type'];
		$iLimit = @$aOptions['limit'];
		switch($this->sDisplayMode) {
			case 'list_full': return $this->renderCurrentList($aNewsTypes, $iLimit);
			case 'list_short': return $this->renderCurrentList($aNewsTypes, $iLimit, 'short');
			case 'list_title': return $this->renderCurrentList($aNewsTypes, $iLimit, 'title');
			case 'list_without_first': return $this->renderCurrentListWithoutFirst($aNewsTypes, $iLimit);
			case 'carousel': return $this->renderCurrentList($aNewsTypes, $iLimit);
			case 'detail': return $this->renderDetail($aNewsTypes);
			default:
				return null;
		}
	}

	public function renderDetail($aNewsTypes) {
		$oItemTemplate = static::template('detail');
		return self::renderItem($this->query($aNewsTypes, 1)->findOne(), $oItemTemplate, 'full');
	}

	public function renderNewsSidebar($aNewsTypes, $iLimit) {
		$oItemTemplate = static::template('item_short');
		return self::renderList($this->query($aNewsTypes, $iLimit)->find(), $oItemTemplate, $iLimit);
	}

	public function renderMainNews($aNews, $iLimit) {
		$oItemTemplate = static::template('item_full');
		return self::renderList($this->query($aNewsTypes, $iLimit)->find(), $oItemTemplate, $iLimit);
	}

	public function renderCurrentListWithoutFirst($aNewsTypes, $iLimit = null) {
		$oItemTemplate = static::template('item_title');
		return self::renderList($this->query($aNewsTypes, $iLimit)->offset(1)->find(), $oItemTemplate, $iLimit);
	}

	public function renderCurrentList($aNewsTypes, $iLimit = null, $sContentType = 'short') {
		$oItemTemplate = static::template('item_'.$sContentType);
		return self::renderList($this->query($aNewsTypes, $iLimit)->find(), $oItemTemplate, $sContentType);
	}

	public static function renderList($aNews, $oItemTemplate, $sContentType = null) {
		$oTemplate = static::template('list');
		foreach($aNews as $oNews) {
			$oTemplate->replaceIdentifierMultiple('item', self::renderItem($oNews, clone $oItemTemplate, $sContentType));
		}
		return $oTemplate;
	}

	private function query($aNewsTypes, $iLimit) {
		$oQuery = FrontendNewsQuery::create()->current()->orderByDateStart('desc');
		if($aNewsTypes !== null) {
			$oQuery->filterByNewsTypeId($aNewsTypes);
		}
		if($iLimit) {
			$oQuery->limit($iLimit);
		}
		return $oQuery;
	}

	public static function renderItem($oNews, $oItemTemplate, $sContentType) {
		$sBody = '';
		if($sContentType === 'short' && is_resource($oNews->getBodyShort())) {
			$sBody = stream_get_contents($oNews->getBodyShort());
			$sBody = strip_tags($sBody);
		} else if ($sContentType = 'full' && is_resource($oNews->getBody())) {
			$sBody = stream_get_contents($oNews->getBody());
		}
		$oItemTemplate->replaceIdentifier('headline', $oNews->getHeadline());
		$oItemTemplate->replaceIdentifier('date', LocaleUtil::localizeDate($oNews->getDateStart()));
		if($sContentType !== 'title') {
			$oItemTemplate->replaceIdentifier('content', RichtextUtil::parseStorageForFrontendOutput($sBody));
			$oItemTemplate->replaceIdentifier('name', $oNews->getUserRelatedByCreatedBy()->getFullName());
		}
		return $oItemTemplate;
	}
}
