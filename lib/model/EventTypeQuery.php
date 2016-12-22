<?php

/**
 * @package    propel.generator.model
 */
class EventTypeQuery extends BaseEventTypeQuery {

	public function excludeExternallyManaged() {
		return $this->filterByIsExternallyManaged(false);
	}

	public function hasActiveEvents() {
		return $this->useEventQuery(null, Criteria::INNER_JOIN)->filterByIsActive(true)->endUse()->distinct();
	}
}

