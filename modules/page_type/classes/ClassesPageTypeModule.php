<?php

abstract class ClassOutput {
	protected $oNavigationItem;
	protected $oPageType;

	public function __construct(NavigationItem $oNavigationItem, ClassPageTypeModule $oPageType) {
		$this->oNavigationItem = $oNavigationItem;
		$this->oPageType = $oPageType;
	}

	public abstract function renderContent();
	public abstract function renderContext();
}

require_once __DIR__.'/output/ClassDocumentsOutput.php';
require_once __DIR__.'/output/ClassEventsOutput.php';
require_once __DIR__.'/output/ClassHomeOutput.php';
require_once __DIR__.'/output/ClassLinksOutput.php';
require_once __DIR__.'/output/ClassNewsOutput.php';
require_once __DIR__.'/output/ClassListOutput.php';
require_once __DIR__.'/output/ClassNewsOutput.php';
require_once __DIR__.'/output/ClassSubjectsOutput.php';

require_once __DIR__.'/ClassNavigationItem.php';

class ClassesPageTypeModule extends DefaultPageTypeModule {
	public function __construct(Page $oPage = null, NavigationItem $oNavigationItem = null) {
		parent::__construct($oPage, $oNavigationItem);
	}

	public function display(Template $oTemplate, $bIsPreview = false) {
		$sMode = 'list';

		if($oNavigationItem instanceof ClassNavigationItem) {
			$sMode = $oNavigationItem->getMode();
		}

		$sClassName = 'Class'.ucfirst($sMode).'Output';
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

	public function constructTemplate($sTemplateName = null, $bForceGlobalTemplatesDir = false) {
		parent::constructTemplate($sTemplateName, $bForceGlobalTemplatesDir);
	}
}
