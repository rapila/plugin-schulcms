<?php
class NewsPageTypeModule extends PageTypeModule {

	private $aNewsTypes;
	private $bRequiresFilter = true;

	public function __construct(Page $oPage = null, NavigationItem $oNavigationItem = null) {
		parent::__construct($oPage, $oNavigationItem);
		$this->aNewsTypes = explode(',', $this->oPage->getPagePropertyValue('news:news_types', ''));
	}

	public function display(Template $oTemplate, $bIsPreview = false) {
		if($this->oNavigationItem instanceof NewsNavigationItem){
			$this->oNews = $this->oNavigationItem->getNews();
			$this->renderDetail($oTemplate);
		}
		$this->renderList($oTemplate);
	}

	private function renderList($oTemplate) {
		$oListTemplate = $this->constructTemplate('list');
		$oItemPrototype = $this->constructTemplate('list_item');
		if(!$oListTemplate->hasIdentifier('filters')) {
			$this->bRequiresFilter = false;
		}

		$aTypes = array();
		$oListTemplate->replaceIdentifier('title', FrontendManager::$CURRENT_NAVIGATION_ITEM->getTitle());
		$aNews = $this->listQuery()->find();
		foreach($aNews as $oNews) {
			if($this->bRequiresFilter && !isset($aTypes[$oNews->getNewsTypeId()])) {
				$aTypes[$oNews->getNewsTypeId()] = $oNews->getNewsType()->getName();
			}
			$oItemTemplate = clone $oItemPrototype;
			$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($oNews->getLink($this->oPage)));
			$oItemTemplate->replaceIdentifier('headline', $oNews->getHeadline());
			$oItemTemplate->replaceIdentifier('news_type', $oNews->getNewsTypeName());
			$oItemTemplate->replaceIdentifier('type_id', $oNews->getNewsTypeId());
			$oItemTemplate->replaceIdentifier('id', $oNews->getId());
			$oItemTemplate->replaceIdentifier('date', $oNews->getDateStartFormatted());
			$oListTemplate->replaceIdentifierMultiple('items', $oItemTemplate);
		}
		if(count($aNews) === 0) {
			$oItemTemplate = clone $oItemPrototype;
			$oItemTemplate->replaceIdentifier('date', StringPeer::getString('news.no_entries_available'));
			$oListTemplate->replaceIdentifier('items', $oItemTemplate);
		}
		$this->renderFilter($oListTemplate, $aTypes);
		$oTemplate->replaceIdentifier('container', $oListTemplate, 'content');
		$oTemplate->replaceIdentifier('container_filled_types', 'news', 'content');
	}

	private function renderFilter($oTemplate, $aTypes) {
		// Implement function group filter if it's included in the template and options are given
		if($this->bRequiresFilter && count($aTypes) > 1) {
			$oOptionPrototype = $this->constructTemplate('filter_option');
			$oItemTemplate = clone $oOptionPrototype;
			$oItemTemplate->replaceIdentifier('id', '');
			$oItemTemplate->replaceIdentifier('name', StringPeer::getString('news.filter.type.default'));
			$oTemplate->replaceIdentifierMultiple('filters', $oItemTemplate, null, Template::NO_NEWLINE|Template::NO_NEW_CONTEXT);

			foreach($aTypes as $sKey => $sName) {
				$oItemTemplate = clone $oOptionPrototype;
				$oItemTemplate->replaceIdentifier('id', $sKey);
				$oItemTemplate->replaceIdentifier('name', $sName);
				$oTemplate->replaceIdentifierMultiple('filters', $oItemTemplate, null, Template::NO_NEWLINE|Template::NO_NEW_CONTEXT);
			}
		}
	}

	private function renderDetail($oTemplate) {
		if(!$this->oNews) {
			return null;
		}
		$oDetailTemplate = $this->constructTemplate('detail');
		$oDetailTemplate->replaceIdentifier('title', FrontendManager::$CURRENT_NAVIGATION_ITEM->getTitle());
		$oDetailTemplate->replaceIdentifier('headline', $this->oNews->getHeadline());
		$sContent = is_resource($this->oNews->getBody()) ? stream_get_contents($this->oNews->getBody()) : '';
		$oDetailTemplate->replaceIdentifier('content', RichtextUtil::parseStorageForFrontendOutput($sContent));
		$oDetailTemplate->replaceIdentifier('date', $this->oNews->getDateStartFormatted());
		$oDetailTemplate->replaceIdentifier('author', $this->oNews->getUserRelatedByUpdatedBy()->getFullName());
		$oDetailTemplate->replaceIdentifier('news_type', $this->oNews->getNewsTypeName());
		$oDetailTemplate->replaceIdentifier('fallback_url', LinkUtil::link($this->oPage->getLink()));

		$oTemplate->replaceIdentifier('container', $oDetailTemplate, 'content');
		$oTemplate->replaceIdentifier('container_filled_types', 'news', 'content');
	}

	public function listQuery() {
		$oQuery = FrontendNewsQuery::create()->current();
		if($this->aNewsTypes !== null) {
			$oQuery->filterByNewsTypeId($this->aNewsTypes);
		}
		$oQuery->orderByDateStart('desc')->orderByHeadline();
		return $oQuery;
	}

	public function listNewsTypes() {
		return WidgetJsonFileModule::jsonOrderedObject(NewsTypeQuery::create()->filterByIsExternallyManaged(false)->orderByName()->select(array('Id', 'Name'))->find()->toKeyValue('Id', 'Name'));
	}

	public function saveNewsPageConfiguration($aData) {
		$this->aNewsTypes = $aData['news_types'];
		$this->oPage->updatePageProperty('news:news_types', implode(',', array_filter($this->aNewsTypes)));
	}

	public function config() {
		return $this->aNewsTypes;
	}
}

