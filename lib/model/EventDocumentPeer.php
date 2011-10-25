<?php

/**
 * @package    propel.generator.model
 */
class EventDocumentPeer extends BaseEventDocumentPeer {
	
	// check permissions of the parent event
	public static function mayOperateOn($oUser, $mObject, $sOperation) {
		return EventPeer::mayOperateOn($oUser, $mObject->getEvent(), $sOperation);
	}
}

