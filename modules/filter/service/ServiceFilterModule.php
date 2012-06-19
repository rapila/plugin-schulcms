<?php
class ServiceFilterModule extends FilterModule {
	
	const SERVICE_ITEM_TYPE = 'service_item';
	const SERVICE_REQUEST_KEY = 'services';
	const SERVICE_ID_SEPARATOR = '-';
	
	public function onNavigationItemChildrenRequested(NavigationItem $oNavigationItem) {
		if(!($oNavigationItem instanceof PageNavigationItem 
		   && (StringUtil::startsWith($oNavigationItem->getIdentifier(), self::SERVICE_REQUEST_KEY.self::SERVICE_ID_SEPARATOR) || $oNavigationItem->getIdentifier() === self::SERVICE_REQUEST_KEY))) {
			return;
		}
		self::handleOnChildrenRequested($oNavigationItem);
	}
	
	public static function handleOnChildrenRequested($oNavigationItem) {
		$oObject = LanguageObjectQuery::create()->filterByLanguageId(Session::language())->joinContentObject()->useQuery('ContentObject')->filterByPageId($oNavigationItem->getMe()->getId())->filterByContainerName('content')->filterByObjectType('services')->endUse()->findOne();
		if(!$oObject) {
			return;
		}
		
		$oModule = new ServicesFrontendModule($oObject);
		$aOptions = $oModule->widgetData();
		$oModule->aServiceCategoryIds = @$aOptions[ServicesFrontendModule::SERVICE_CATEGORY_IDS];
		$oCriteria = $oModule->listQuery();
		$oCriteria->clearSelectColumns()->addSelectColumn(ServicePeer::SLUG)->addSelectColumn(ServicePeer::NAME);
		
		foreach(ServicePeer::doSelectStmt($oCriteria)->fetchAll(PDO::FETCH_CLASS) as $aParams) {
			$oNavItem = new HiddenVirtualNavigationItem(self::SERVICE_ITEM_TYPE, $aParams->SLUG, $aParams->NAME, null, null);
			$oNavigationItem->addChild($oNavItem);
		}
	}

	public function onPageHasBeenSet($oPage, $bIsNotFound, $oNavigationItem) {
		if($bIsNotFound || !($oNavigationItem instanceof VirtualNavigationItem) || $oNavigationItem->getType() !== self::SERVICE_ITEM_TYPE) {
				return;
		}
		if($oNavigationItem instanceof VirtualNavigationItem && $oNavigationItem->getType() === self::SERVICE_ITEM_TYPE) {
			$_REQUEST[self::SERVICE_REQUEST_KEY] = $oNavigationItem->getName();
			ServicesFrontendModule::$SERVICE = ServiceQuery::create()->filterBySlug($oNavigationItem->getName())->findOne();
		}
	}	
	
	public function onDocumentOperationCheck($sOperation, $oOnObject, $oUser, $aContainer) {
		$bIsAllowed = &$aContainer[0];
		if($bIsAllowed) {
			return;
		}
		if($oOnObject->getDocumentCategoryId() !== SchoolPeer::getDocumentCategoryConfig('service_documents')) {
			return;
		}
		
		if($sOperation === 'insert') {
			$bIsAllowed = true;
			return;
		}
		$oServiceDocument = $oOnObject->getServiceDocuments();
		if(!count($oServiceDocument)) {
			return;
		}
		$bIsAllowed = $oServiceDocument[0]->mayOperate($sOperation, $oUser);
	}
}