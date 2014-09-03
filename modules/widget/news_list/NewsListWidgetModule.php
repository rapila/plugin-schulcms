<?php
class NewsListWidgetModule extends SpecializedListWidgetModule {

	protected $oListWidget;
	public $oDelegateProxy;

	protected function createListWidget() {
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, 'News', 'date_start_formatted', 'desc');
		$oListWidget = new ListWidgetModule();
		$oListWidget->setDelegate($this->oDelegateProxy);
		return $oListWidget;
	}

	public function doWidget() {
		return $this->oListWidget->doWidget('news_list');
	}

	public function getColumnIdentifiers() {
		return array('id', 'date_start_formatted', 'date_end_formatted', 'headline', 'body_truncated', 'is_active', 'delete');
	}

	public function getDatabaseColumnForColumn($sColumnIdentifier) {
		if($sColumnIdentifier === 'date_start_formatted') {
			return NewsPeer::DATE_START;
		}
		if($sColumnIdentifier === 'body_truncated') {
			return NewsPeer::BODY;
		}
		return null;
	}

	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array('is_sortable' => true);
		switch($sColumnIdentifier) {
			case 'date_start_formatted':
				$aResult['heading'] = StringPeer::getString('wns.news.date');
				break;
			case 'date_end_formatted':
				$aResult['heading'] = StringPeer::getString('wns.news.date_to');
				$aResult['is_sortable'] = false;
				break;
			case 'headline':
				$aResult['heading'] = StringPeer::getString('wns.news.headline');
				break;
			case 'body_truncated':
				$aResult['heading'] = StringPeer::getString('wns.news.body_truncated');
				$aResult['is_sortable'] = false;
				break;
			case 'is_active':
				$aResult['heading'] = StringPeer::getString('wns.news.is_active');
				break;
			case 'delete':
				$aResult['heading'] = ' ';
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_ICON;
				$aResult['field_name'] = 'trash';
				$aResult['is_sortable'] = false;
				break;
		}
		return $aResult;
	}

	public function getFilterTypeForColumn($sColumnIdentifier) {
		if($sColumnIdentifier === 'news_type_id') {
			return CriteriaListWidgetDelegate::FILTER_TYPE_IS;
		}
		return null;
	}

	public function getTypeHasNews($iNewsTypeId) {
		return NewsQuery::create()->filterByNewsTypeId($iNewsTypeId)->count() > 0;
	}

	public function getNewsTypeName() {
		$oNewsType = NewsTypeQuery::create()->findPk($this->oDelegateProxy->getNewsTypeId());
		if($oNewsType) {
			return $oNewsType->getName();
		}
		if($this->oDelegateProxy->getNewsTypeId() === CriteriaListWidgetDelegate::SELECT_WITHOUT) {
			return StringPeer::getString('wns.news.without_news_type');
		}
		return $this->oDelegateProxy->getNewsTypeId();
	}

	public function getCriteria() {
		return NewsQuery::create()->excludeExternallyManaged();
	}
}