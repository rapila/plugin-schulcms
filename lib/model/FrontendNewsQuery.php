<?php

/**
 * @package model
 * @subpackage rapila-plugin-journal
 */
class FrontendNewsQuery extends NewsQuery {

	public static function create($sModelAlias = null, $oCriteria = null) {
		if ($oCriteria instanceof FrontendNewsQuery) {
			return $oCriteria;
		}
		$oQuery = new FrontendNewsQuery();
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
