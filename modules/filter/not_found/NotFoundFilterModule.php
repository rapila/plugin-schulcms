<?php
class NotFoundFilterModule extends FilterModule {
 /**
	* onPageNotFound()
	*/
	public function onPageNotFound() {
		$sRequestPath = $_REQUEST['path'];

		// load redirects.yml located for example in site/config/redirects.yml or common plugins config dir
		require_once("spyc/Spyc.php");
		$oRedirectMapping = Spyc::YAMLLoad(ResourceFinder::findResource(array(DIRNAME_CONFIG, 'redirects.yml')));
		foreach($oRedirectMapping as $sRequested => $sRedirected) {
			if(self::stringExists($sRequested, $sRequestPath)) {
				LinkUtil::redirect(LinkUtil::link(explode('/', $sRedirected), 'FrontendManager'));
			}
		}
	}

	private static function stringExists($sNameToCheck, $sRequestPath) {
		return strpos($sRequestPath, $sNameToCheck) !== false;
	}
}