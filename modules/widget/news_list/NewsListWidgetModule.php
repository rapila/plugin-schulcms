<?php
class NewsListWidgetModule extends WidgetModule {
	private $oCriteriaListWidgetDelegate;
	
	private $oListWidget;
	
	public function __construct() {
		$this->oCriteriaListWidgetDelegate = new CriteriaListWidgetDelegate($this, 'News');
		$this->oListWidget = WidgetModule::getWidget('list', null, $this->oCriteriaListWidgetDelegate);
	}
	
	public function doWidget() {
		return $this->oListWidget->doWidget('news_list');
	}
	
	public function getColumnIdentifiers() {
		return array();
	}
	
	public function getCriteria() {
		$oCriteria = new Criteria();
		return $oCriteria;
	}
	
	public function getDatabaseColumnForColumn($aColumnIdentifier) {
		
	}
	
	public function getMetadataForColumn($aColumnIdentifier) {
		
	}
}