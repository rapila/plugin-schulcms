<?php

/**
 * @package model
 * @subpackage rapila-plugin-journal
 */	
class FrontendEventQuery extends EventQuery {
	
	public static function create($sModelAlias = null, $oCriteria = null) {
		if ($oCriteria instanceof FrontendEventQuery) {
			return $oCriteria;
		}
		$oQuery = new FrontendEventQuery();
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

