<?php

/**
 * @package    propel.generator.model
 */
class ServiceDocumentPeer extends BaseServiceDocumentPeer {

	public static function mayOperateOn($oUser, $mObject, $sOperation) {
		return $mObject->getService()->mayOperate($sOperation, $oUser);
	}

}

