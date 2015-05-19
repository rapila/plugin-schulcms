<?php
class NewsFrontendConfigWidgetModule extends FrontendConfigWidgetModule {
	public function __construct($sSessionKey, $oFrontendModule) {
		parent::__construct($sSessionKey, $oFrontendModule);
	}

	public function options() {
		$aData['display_options'] = $this->getDisplayOptions();
		$aData['news_type_options'] = NewsTypeInputWidgetModule::getNewsTypes();
		$aData['limit_options'] = array(1 => 1, 3 => 3, 5 => 5, 10 => 10, "__all" => "Alle");
		return $aData;
	}

	public function listNews($aData) {
		$oNewsQuery = FrontendNewsQuery::create();
		if($aData['news_type'] !== null) {
			$oNewsQuery->filterByNewsTypeId($aData['news_type']);
		}
		if($aData['limit']) {
			$oNewsQuery->limit($aData['limit']);
		}
		if($aData['display_mode'] ==='list_without_first') {
			$oNewsQuery->offset(1);
		}
		return WidgetJsonFileModule::jsonBaseObjects($oNewsQuery->current()->find(), array('id', 'headline'));
	}

	private function getDisplayOptions() {
		$aResult = array();
		foreach(NewsFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
			$aResult[$sDisplayMode] = StringPeer::getString('news.display_mode.'.$sDisplayMode, null, $sDisplayMode);
		}
		return $aResult;
	}
}
