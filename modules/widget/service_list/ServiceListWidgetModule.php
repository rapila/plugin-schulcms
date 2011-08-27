<?php
/**
 * @package modules.widget
 */
class ServiceListWidgetModule extends WidgetModule {

	private $oListWidget;
	public $oDelegateProxy;
	
	public function __construct() {
		$this->oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, "Service", "name", "asc");
		$this->oListWidget->setDelegate($this->oDelegateProxy);
	}
	
	public function doWidget() {
		$aTagAttributes = array('class' => 'service_list');
		$oListTag = new TagWriter('table', $aTagAttributes);
		$this->oListWidget->setListTag($oListTag);
		return $this->oListWidget->doWidget();
	}
	
	public function getColumnIdentifiers() {
		return array('id', 'name', 'phone', 'service_category_name', 'website', 'team_count', 'is_active', 'delete');
	}
	
	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array('is_sortable' => true);
		switch($sColumnIdentifier) {
			case 'name':
				$aResult['heading'] = StringPeer::getString('wns.name');
				break;
			case 'phone':
				$aResult['heading'] = StringPeer::getString('wns.phone');
				break;
			case 'service_category_name':
				$aResult['heading'] = StringPeer::getString('wns.service_category.short');
				break;
			case 'website':
				$aResult['heading'] = StringPeer::getString('wns.service.website');
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_URL;
				break;
			case 'team_count':
				$aResult['heading'] = StringPeer::getString('wns.service.team_count');
				break;
			case 'is_active':
				$aResult['heading'] = StringPeer::getString('wns.is_active');
				break;
			case 'delete':
				$aResult['heading'] = ' ';
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_ICON;
				$aResult['field_name'] = 'trash';
				break;
		}
		return $aResult;
	}

	public function getFilterTypeForColumn($sColumnIdentifier) {
		if($sColumnIdentifier === 'service_category_id') {
			return CriteriaListWidgetDelegate::FILTER_TYPE_IS;
		}
		return null;
	}
	
	public function getDatabaseColumnForColumn($sColumnIdentifier) {
		if($sColumnIdentifier === 'service_category_name') {
			return ServicePeer::SERVICE_CATEGORY_ID;
		}
		return null;
	}
	
  public function toggleIsActive($aRowData) {
		$oService = ServicePeer::retrieveByPK($aRowData['id']);
		if($oService) {
			$oService->setIsActive(!$oService->getIsActive());
			return $oService->save();
		}
		return false;
	}
	
	public function getServiceCategoryName() {
		if($this->oDelegateProxy->getServiceCategoryId() !== CriteriaListWidgetDelegate::SELECT_ALL) {
			$oServiceCategory = ServiceCategoryPeer::retrieveByPK($this->oDelegateProxy->getServiceCategoryId());
			if($oServiceCategory !== null) {
				return $oServiceCategory->getName();
			}
		}
		return $this->oDelegateProxy->getServiceCategoryId();
	}

	public function getCriteria() {
		$oCriteria = new Criteria();
		$oCriteria->setDistinct();
		$oCriteria->addJoin(ServicePeer::ID, ServiceMemberPeer::SERVICE_ID, Criteria::LEFT_JOIN);
		return $oCriteria;
	}
}