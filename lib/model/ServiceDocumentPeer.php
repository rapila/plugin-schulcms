<?php

/**
 * @package    propel.generator.model
 */
class ServiceDocumentPeer extends BaseServiceDocumentPeer {
	
	public static function countDocumentsByServiceId($iServiceId) {
		$oCriteria = new Criteria();
		$oCriteria->add(self::SERVICE_ID, $iServiceId);
		return self::doCount($oCriteria);
	}
}

