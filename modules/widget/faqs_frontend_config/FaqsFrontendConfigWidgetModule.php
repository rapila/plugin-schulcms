<?php
class FaqsFrontendConfigWidgetModule extends FrontendConfigWidgetModule {

	public function displayModes() {
		$aResult = array();
		foreach(FaqsFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
			$aResult[$sDisplayMode] = TranslationPeer::getString('display_mode.'.$sDisplayMode, null, $sDisplayMode);
		}
		return $aResult;
	}
}
