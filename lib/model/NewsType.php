<?php

/**
 * @package    propel.generator.model
 */
class NewsType extends BaseNewsType
{
	// these configurations should be community specific and defined independently of this generic class
	const NAME_JOBS = "Offene Stellen";
	const NAME_MAIN_HOME = "Schul-News";
	const NAME_SIDEBAR_HOME = "Sidebar-News";

	public static function createDefaultTypesIfNotExist() {
		if(NewsTypeQuery::create()->count() > 1) {
			return;
		}
		$oRC = new ReflectionClass(__CLASS__);
		foreach($oRC->getConstants() as $sKey => $sName) {
			if(StringUtil::startsWith($sKey, 'NAME_')
			&& NewsTypeQuery::create()->filterByName($sName)->select('Name')->findOne() === null) {
				$oNewsType = new NewsType();
				$oNewsType->setName($sName);
				$oNewsType->save();
			}
		}
	}
}
