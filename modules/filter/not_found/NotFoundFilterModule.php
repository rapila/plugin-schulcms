<?php
class NotFoundFilterModule extends FilterModule {
	 /**
	  * onPageNotFound()
	  * store request info and not specified redirects in order to improve migration quality
	  */
	  public function onPageNotFound() {
	    $sRequestPath = $_REQUEST['path'];
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

	  private static function getNearestPageLink($sPageName=null) {
	    if($sPageName !== null) {
	      $oPage = PageQuery::create()->findRoot()->getPageOfName($sPageName);
	      if($oPage) {
	        return $oPage->getLink();
	      }
	    }
	    return PageQuery::create()->findRoot()->getLink();
	  }
	}
}