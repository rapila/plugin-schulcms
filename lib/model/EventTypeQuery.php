<?php

/**
 * @package    propel.generator.model
 */
class EventTypeQuery extends BaseEventTypeQuery {

	public function excludeExternallyManaged() {
		return $this->filterByIsExternallyManaged(false);
	}
}

