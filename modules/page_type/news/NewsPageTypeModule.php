<?php
require_once PLUGINS_DIR.'/schulcms/modules/page_type/news/NewsNavigationItem.php';

class NewsPageTypeModule extends PageTypeModule {

	private $aNewsTypes;

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

		foreach($this->listQuery()->find() as $oNews) {
			$oItemTemplate = clone $oItemPrototype;
			$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($oNews->getLink($this->oPage)));
			$oItemTemplate->replaceIdentifier('headline', $oNews->getHeadline());
			$oItemTemplate->replaceIdentifier('news_type', $oNews->getNewsTypeName());
			$oItemTemplate->replaceIdentifier('date', $oNews->getDateStartFormatted());
			$oListTemplate->replaceIdentifierMultiple('items', $oItemTemplate);
		}
		$oTemplate->replaceIdentifier('container', $oListTemplate, 'content');
		$oTemplate->replaceIdentifier('container_filled_types', 'news', 'content');
	}

	private function renderDetail($oTemplate) {
		if(!$this->oNews) {
			return null;
		}
		$oDetailTemplate = $this->constructTemplate('detail');
		$oDetailTemplate->replaceIdentifier('headline', $this->oNews->getHeadline());
		$sContent = is_resource($this->oNews->getBody()) ? stream_get_contents($this->oNews->getBody()) : '';
		$oDetailTemplate->replaceIdentifier('content', RichtextUtil::parseStorageForFrontendOutput($sContent));
		$oDetailTemplate->replaceIdentifier('date', $this->oNews->getDateStartFormatted());
		$oDetailTemplate->replaceIdentifier('author', $this->oNews->getUserRelatedByUpdatedBy()->getFullName());
		$oDetailTemplate->replaceIdentifier('news_type', $this->oNews->getNewsTypeName());

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

