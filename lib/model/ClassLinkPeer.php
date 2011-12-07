<?php

/**
 * @package    propel.generator.model
 */
class ClassLinkPeer extends BaseClassLinkPeer {
	
	public static function mayOperateOn($oUser, $mObject, $sOperation) {
		return $mObject->getSchoolClass()->mayOperate($sOperation, $oUser);
	}
}

