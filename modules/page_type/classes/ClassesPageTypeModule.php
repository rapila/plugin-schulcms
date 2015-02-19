<?php

abstract class ClassOutput {
	protected $oNavigationItem;
	protected $oPageType;
	protected $oPage;
	protected $oTeacherPage;
	protected $oClass;

	public function __construct(NavigationItem $oNavigationItem, ClassesPageTypeModule $oPageType) {
		$this->oNavigationItem = $oNavigationItem;
		$this->oPageType = $oPageType;
		$this->oPage = FrontendManager::$CURRENT_PAGE;
		// change this to get by page_type “teachers”?
		$this->oTeacherPage = PagePeer::getPageByIdentifier(SchoolPeer::getPageIdentifier('teachers'));
		if(!$this->oTeacherPage) {
			throw new Exception('No page with identifier `teachers` found');
		}
	}

	public abstract function renderContent();
	public abstract function renderContext();
}

foreach(ResourceFinder::create()->addPath(DIRNAME_MODULES, 'page_type', 'classes', 'output')->addFilePath()->baseFirst()->find() as $sOutputPath) {
	require_once($sOutputPath);
}

require_once __DIR__.'/ClassNavigationItem.php';


class ClassesPageTypeModule extends DefaultPageTypeModule {
	public function __construct(Page $oPage = null, NavigationItem $oNavigationItem = null) {
		parent::__construct($oPage, $oNavigationItem);
	}

	public function display(Template $oTemplate, $bIsPreview = false, $sMode = null) {
		$sMode = $sMode ? $sMode : 'list';

		if($this->oNavigationItem instanceof ClassNavigationItem) {
			$sMode = $this->oNavigationItem->getMode();
		}
		// Caching?
		$sClassName = 'Class'.StringUtil::camelize($sMode, true).'Output';
		$oOutput = new $sClassName($this->oNavigationItem, $this);

		$mContent = $oOutput->renderContent();
		$mContext = $oOutput->renderContext();

		if($mContent) {
			$oTemplate->replaceIdentifier('container', $mContent, 'content');
			$oTemplate->replaceIdentifier('container_filled_types', 'classes', 'content');
		}
		if($mContext) {
			$oTemplate->replaceIdentifier('container', $mContext, 'context');
			$oTemplate->replaceIdentifier('container_filled_types', 'classes', 'context');
		}

		parent::display($oTemplate, $bIsPreview);
	}

	public function constructTemplate($sTemplateName = null, $bForceGlobalTemplatesDir = true) {
		return new Template($sTemplateName, array(DIRNAME_MODULES, self::getType(), self::moduleName(), 'templates'));
	}

}
