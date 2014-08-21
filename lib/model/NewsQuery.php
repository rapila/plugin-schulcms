<?php

/**
 * @package    propel.generator.model
 */
class NewsQuery extends BaseNewsQuery
{
	public function excludeExternallyManaged() {
		return $this->useNewsTypeQuery()->filterByIsExternallyManaged(false)->_or()->filterByIsExternallyManaged(null, Criteria::ISNULL)->endUse();
	}
}
