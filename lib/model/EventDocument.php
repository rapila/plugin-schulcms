<?php

/**
 * @package    propel.generator.model
 */
class EventDocument extends BaseEventDocument {

	public function delete(PropelPDO $oConnection = null) {
		if($this->getDocument()) {
			$this->getDocument()->delete();
		}
		return parent::delete($oConnection);
	}
}

