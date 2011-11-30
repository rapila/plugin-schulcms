<?php

/**
 * @package    propel.generator.model
 */
class ClassTeacherPeer extends BaseClassTeacherPeer {
	
	public static function mayOperateOn($oUser, $mObject, $sOperation) {
		return SchoolClassPeer::mayOperateOn($oUser, $mObject->getSchoolClass(), $sOperation);
	}

}

