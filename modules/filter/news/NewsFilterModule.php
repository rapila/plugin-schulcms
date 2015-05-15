<?php
class NewsFilterModule extends FilterModule {
	public function onNavigationItemChildrenRequested($oNavigationItem) {
		if(!($oNavigationItem instanceof PageNavigationItem && $oNavigationItem->getType() === 'news')) {
			return;
		}
		$oPageType = PageTypeModule::getModuleInstance($oNavigationItem->getMe()->getPageType(), $oNavigationItem->getMe(), $oNavigationItem);
		foreach($oPageType->listQuery()->select(array('Id', 'Headline'))->find() as $aData) {
			$oNavigationItem->addChild(NewsNavigationItem::create($aData['Id'], $aData['Headline']));
		}
	}

	public function onNavigationItemChildrenCacheDetectOutdated($oNavigationItem, $oCache, $aContainer) {
		if(!($oNavigationItem instanceof PageNavigationItem && $oNavigationItem->getType() === 'services')) {
			return;
		}
		$bIsOutdated = &$aContainer[0];
		if($bIsOutdated) {
			return;
		}
		$bIsOutdated = $oCache->isOlderThan($oPageType->listQuery());
	}

	public function onPageHasBeenSet($oCurrentPage, $bIsNotFound, $oNavigationItem) {
		if(!($oNavigationItem instanceof NewsNavigationItem)) {
			return;
		}
		$oNavigationItem->news = NewsQuery::create()->findPk($oNavigationItem->getName());
	}
}