<?php

/**
 * @package		 propel.generator.model
 */
class SchoolPeer extends BaseSchoolPeer {

	private static $EXTERNALLY_MANAGED_CATEGORIES = null;
	private static $SCHOOL = null;
	
	public static function getCategoryConfig($sKey) { 
		if(!is_array(self::$EXTERNALLY_MANAGED_CATEGORIES)) {
			self::$EXTERNALLY_MANAGED_CATEGORIES = Settings::getSetting('school_settings', 'externally_managed_categories', array());
		}
		if(isset(self::$EXTERNALLY_MANAGED_CATEGORIES[$sKey])) {
			return self::$EXTERNALLY_MANAGED_CATEGORIES[$sKey];
		}
		throw new Exception(__METHOD__.': Please check your externally externally_managed_categories in config section school_settings');
	}
	
	public static function getSchool() {
		if(self::$SCHOOL === null) {
			self::$SCHOOL = SchoolQuery::create()->filterByOriginalId(self::getSchoolId())->findOne();
		}
		return self::$SCHOOL;
	}
	
	public static function getSchoolId() {
		$iSchoolId = Settings::getSetting("school_settings", '***REMOVED***_school_id', null);
		if($iSchoolId) {
			return $iSchoolId;
		}
		throw new LocalizedException('configuration.error.school_id_required', array('config_file_path' => 'site/config/config.yml > school_settings'));
	}
}
