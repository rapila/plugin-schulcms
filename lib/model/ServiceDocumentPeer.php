	<?php

/**
 * @package    propel.generator.model
 */
class ServiceDocumentPeer extends BaseServiceDocumentPeer {

	public static function mayOperateOn($oUser, $mObject, $sOperation) {
		if($mObject->getService()) {
			return $mObject->getService()->mayOperate($sOperation, $oUser);
		}
		$mObject->mayOperate($sOperation, $oUser);
	}

}

