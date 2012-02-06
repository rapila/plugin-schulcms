<?php

/**
 * @package    propel.generator.model
 */
class ServiceDocument extends BaseServiceDocument {

	public function delete(PropelPDO $oConnection = null) {
		if($this->getDocument()) {
			$this->getDocument()->delete();
		}
		return parent::delete($oConnection);
	}

}

