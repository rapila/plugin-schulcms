<?php

/**
 * @package    propel.generator.model
 */
class NewsQuery extends BaseNewsQuery
{
	public function excludeExternallyManaged() {
		return $this->useNewsTypeQuery()->filterByIsExternallyManaged(false)->_or()->filterByIsExternallyManaged(null, Criteria::ISNULL)->endUse();
	}

	public function current() {
		$sDateToday = date('Y-m-d');
		$this->filterByDateStart($sDateToday, Criteria::LESS_EQUAL)->_and()->filterByDateEnd($sDateToday, Criteria::GREATER_EQUAL)->_or()->filterByDateEnd(null, Criteria::ISNULL);
		return $this;
	}
}
