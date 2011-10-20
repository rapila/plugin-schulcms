<?php
class BlackboardFrontendConfigWidgetModule extends EditWidgetModule { 

	public function getDisplayModes() {
		$aResult = array();
	  foreach(BlackboardFrontendModule::$DISPLAY_MODES as $sDisplayMode) {
	    $aResult[$sDisplayMode] = StringPeer::getString('display_mode.'.$sDisplayMode, null, $sDisplayMode);
	  }
		return $aResult;
	}
}