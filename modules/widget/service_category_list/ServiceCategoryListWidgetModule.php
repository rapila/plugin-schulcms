<?php
/**
 * @package modules.widget
 */
class ServiceCategoryListWidgetModule extends WidgetModule {

	private $oListWidget;
	public $oDelegateProxy;
	
	public function __construct() {
		$this->oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, "ServiceCategory", "name", "asc");
		$this->oListWidget->setDelegate($this->oDelegateProxy);
	}
	
	public function doWidget() {
		$aTagAttributes = array('class' => 'service_category_list');
		$oListTag = new TagWriter('table', $aTagAttributes);
		$this->oListWidget->setListTag($oListTag);
		return $this->oListWidget->doWidget();
	}
	
	public function getColumnIdentifiers() {
		return array('id', 'name', 'link_to_services');
	}
	
	public function getMetadataForColumn($sColumnIdentifier) {
	  $aResult = array();
		switch($sColumnIdentifier) {
			case 'name':
				$aResult['heading'] = StringPeer::getString('wns.name');
				$aResult['sortable'] = true;
				break;
			case 'link_to_services':
				$aResult['heading'] = StringPeer::getString('wns.service_category.services');
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_URL;
				break;
			case 'delete':
				$aResult['heading'] = ' ';
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_ICON;
				$aResult['field_name'] = 'trash';
				break;
		}
		return $aResult;
	}

	public function getCriteria() {
		$oCriteria = new Criteria();
		$oCriteria->setDistinct();
		$oCriteria->addJoin(ServiceCategoryPeer::ID, ServicePeer::SERVICE_CATEGORY_ID, Criteria::LEFT_JOIN);
		return $oCriteria;
	}
}