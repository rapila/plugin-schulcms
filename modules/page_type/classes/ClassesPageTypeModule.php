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
		if($this->oNavigationItem instanceof ClassNavigationItem) {
			$this->oClass = $this->oNavigationItem->getClass();
		}
	}

	public abstract function renderContent();
	public function renderContext() {}

	public function cacheIsOutdated($oCache) {
		return true;
	}

	protected function getClass() {
		return $this->oNavigationItem->getClass();
	}
}

foreach(ResourceFinder::create()->addPath(DIRNAME_MODULES, 'page_type', 'classes', 'output')->addFilePath()->baseFirst()->find() as $sOutputPath) {
	require_once($sOutputPath);
}

class ClassesPageTypeModule extends DefaultPageTypeModule {

	protected $sDisplayType;
	protected $sClassType;
	protected $bIncludeAddress;

	public function __construct(Page $oPage = null, NavigationItem $oNavigationItem = null) {
		parent::__construct($oPage, $oNavigationItem);
		$this->sDisplayType = $this->oPage->getPagePropertyValue('classes:display_type');
		$this->sClassType = $this->oPage->getPagePropertyValue('classes:class_type');
		$this->bIncludeAddress = BooleanParser::booleanForString($this->oPage->getPagePropertyValue('classes:include_address'));
	}

	public function display(Template $oTemplate, $bIsPreview = false) {
		$sMode = 'list';
		if($this->sClassType === 'subject') {
			$sMode = 'subject_list';
		}

		if($this->oNavigationItem instanceof ClassNavigationItem || $this->oNavigationItem instanceof SubjectNavigationItem) {
			$sMode = $this->oNavigationItem->getMode();
		}
		// Caching?
		if(!$this->oNavigationItem instanceof ClassNavigationItem && StringUtil::startsWith($sMode, 'subject')) {
			$sClassName = StringUtil::camelize($sMode, true).'Output';
		} else {
			$sClassName = 'Class'.StringUtil::camelize($sMode, true).'Output';
		}
		// $sClassName = 'ClassListBySubjectsOutput';
		$oOutput = new $sClassName($this->oNavigationItem, $this, $oTemplate);

		$oCache = new Cache('class_detail/'.$this->oNavigationItem->getId(), 'full_page', $bIsPreview ? CachingStrategy::fromConfig('off') : null);
		if($oCache->entryExists() && !$oOutput->cacheIsOutdated($oCache)) {
			list($mContent, $mContext) = $oCache->getContentsAsVariable();
		} else {
			$mContent = $oOutput->renderContent();
			$mContext = $oOutput->renderContext();
			$oCache->setContents(array($mContent, $mContext));
		}

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

	public function saveClassesPageConfiguration($aData) {
		$this->sDisplayType = $aData['display_type'];
		$this->sClassType = $aData['class_type'];
		$this->bIncludeAddress= $aData['include_address'];
		$this->oPage->updatePageProperty('classes:display_type', $this->sDisplayType);
		$this->oPage->updatePageProperty('classes:class_type', $this->sClassType);
		$this->oPage->updatePageProperty('classes:include_address', BooleanParser::stringForBoolean($this->bIncludeAddress));
	}

	public function listDisplayTypes() {
		$aOptions = array();
		foreach(array('default' , 'full', 'location') as $sKey) {
			$aOptions[$sKey] = TranslationPeer::getString('classes.display_type.'.$sKey);
		}
		asort($aOptions);
		return WidgetJsonFileModule::jsonOrderedObject($aOptions);
	}

	public function listClassTypes() {
		$aOptions = array();
		foreach(array('standard' , 'subject') as $sKey) {
			$aOptions[$sKey] = TranslationPeer::getString('classes.class_type.'.$sKey);
		}
		asort($aOptions);
		return WidgetJsonFileModule::jsonOrderedObject($aOptions);
	}

	public function config() {
		$aResult['display_type'] = $this->getDisplayType();
		$aResult['class_type'] = $this->getClassType();
		$aResult['include_address'] = $this->includesAddress();
		return $aResult;
	}

	public function getPage() {
		return $this->oPage;
	}

	public function getDisplayType() {
		return $this->sDisplayType ? $this->sDisplayType : 'default';
	}

	public function getClassType() {
		return $this->sClassType ? $this->sClassType : 'standard';
	}

	public function includesAddress() {
		return $this->bIncludeAddress || false;
	}


}
