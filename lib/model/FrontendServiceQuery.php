<?php

/**
 * @package model
 * @subpackage rapila-plugin-schulcms
 */
class FrontendServiceQuery extends ServiceQuery {

	public static function create($sModelAlias = null, $oCriteria = null) {
		if ($oCriteria instanceof FrontendServiceQuery) {
			return $oCriteria;
		}
		$oQuery = new FrontendServiceQuery();
		if (null !== $sModelAlias) {
			$oQuery->setModelAlias($sModelAlias);
		}
		if ($oCriteria instanceof Criteria) {
			$oQuery->mergeWith($oCriteria);
		}
		$oQuery->filterByIsActive(true);
		return $oQuery;
	}
}
