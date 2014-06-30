<?php
class NewsListWidgetModule extends WidgetModule {

	private $oListWidget;
	public $oDelegateProxy;

	public function __construct() {
		$this->oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, 'News', 'date_start', 'desc');
		$this->oListWidget->setDelegate($this->oDelegateProxy);
	}

	public function doWidget() {
		return $this->oListWidget->doWidget('news_list');
	}

	public function getColumnIdentifiers() {
		return array('id', 'date_start_formatted', 'date_end_formatted', 'headline', 'news_type_name', 'has_image', 'is_inactive', 'delete');
	}

	public function getDatabaseColumnForColumn($aColumnIdentifier) {
		if($sColumnIdentifier === 'date_start_formatted') {
			return NewsPeer::DATE_START;
		}
		if($sColumnIdentifier === 'has_image') {
			return NewsPeer::IMAGE_ID;
		}
		return null;
	}

	public function getMetadataForColumn($aColumnIdentifier) {
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
				$aResult['heading'] = StringPeer::getString('wns.news.body');
				break;
			case 'news_type_name':
				$aResult['heading'] = StringPeer::getString('wns.news.type');
				$aResult['is_sortable'] = false;
				break;
			case 'has_image':
				$aResult['heading'] = StringPeer::getString('wns.news.has_image');
				break;
				$aResult['is_sortable'] = false;
			case 'is_inactive':
				$aResult['heading'] = StringPeer::getString('wns.news.is_inactive');
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

}