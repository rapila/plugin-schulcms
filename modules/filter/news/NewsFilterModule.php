<?php
class NewsFilterModule extends FilterModule {
	public function onNavigationItemChildrenRequested($oNavigationItem) {
		if(!($oNavigationItem instanceof PageNavigationItem && $oNavigationItem->getType() === 'news')) {
			return;
		}
		foreach(self::query()->select(array('Id', 'Headline'))->find() as $aData) {
			$oNavigationItem->addChild(NewsNavigationItem::create($aData['Id'], $aData['Headline']));
		}
	}

	public static function query() {
		return FrontendNewsQuery::create()->current()->excludeExternallyManaged();
	}

	public function onNavigationItemChildrenCacheDetectOutdated($oNavigationItem, $oCache, $aContainer) {
		if(!($oNavigationItem instanceof PageNavigationItem && $oNavigationItem->getType() === 'news')) {
			return;
		}
		$bIsOutdated = &$aContainer[0];
		if($bIsOutdated) {
			return;
		}
		$bIsOutdated = $oCache->isOlderThan(self::query());
	}

	public function onPageHasBeenSet($oCurrentPage, $bIsNotFound, $oNavigationItem) {
		if(!($oNavigationItem instanceof NewsNavigationItem)) {
			return;
		}
		$oNavigationItem->news = NewsQuery::create()->findPk($oNavigationItem->getName());
	}
}