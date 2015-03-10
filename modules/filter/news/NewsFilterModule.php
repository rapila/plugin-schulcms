<?php
require_once PLUGINS_DIR.'/schulcms/modules/page_type/news/NewsNavigationItem.php';

class NewsFilterModule extends FilterModule {
	public function onNavigationItemChildrenRequested($oNavigationItem) {
		if($oNavigationItem instanceof PageNavigationItem && $oNavigationItem->getMe()->getPageType() === 'news') {
			$oPageType = PageTypeModule::getModuleInstance($oNavigationItem->getMe()->getPageType(), $oNavigationItem->getMe(), $oNavigationItem);
			foreach($oPageType->listQuery()->select(array('Id', 'Headline'))->find() as $aData) {
				$oNavigationItem->addChild(NewsNavigationItem::create($aData['Id'], $aData['Headline']));
			}
		}
	}

	public function onPageHasBeenSet($oCurrentPage, $bIsNotFound, $oNavigationItem) {
		if(!($oNavigationItem instanceof NewsNavigationItem)) {
			return;
		}
		$oNavigationItem->news = NewsQuery::create()->findPk($oNavigationItem->getName());
	}
}