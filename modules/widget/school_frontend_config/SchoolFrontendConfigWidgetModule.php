<?php
class SchoolFrontendConfigWidgetModule extends FrontendConfigWidgetModule {
	public function getDisplayModes() {
		$aResult = array();
		foreach(SchoolFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
			$aResult[$sDisplayMode] = TranslationPeer::getString('school.display_mode.'.$sDisplayMode, null, $sDisplayMode);
		}
		return $aResult;
	}
}
