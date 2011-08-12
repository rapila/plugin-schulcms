<?php

/**
 * @package		 propel.generator.model
 */
class SchoolPeer extends BaseSchoolPeer {
	
	const PAGE_IDENTIFIER_CLASSES = 'classes';
	private static $EXTERNALLY_MANAGED_DOCUMENT_CATEGORIES = null;
	private static $EXTERNALLY_MANAGED_LINK_CATEGORIES = null;
	private static $PAGE_IDENTIFIERS = null;
	private static $SCHOOL = null;
	private static $ACTIVE_FUNCTION_GROUPS = null;
	
	public static function getPeriodFromYear($sYear) {
		return $sYear.'-'.(substr($sYear + 1, 2));
	}
	
	public static function getDocumentCategoryConfig($sKey) { 
		if(!is_array(self::$EXTERNALLY_MANAGED_DOCUMENT_CATEGORIES)) {
			self::$EXTERNALLY_MANAGED_DOCUMENT_CATEGORIES = Settings::getSetting('school_settings', 'externally_managed_document_categories', array());
		}
		if(isset(self::$EXTERNALLY_MANAGED_DOCUMENT_CATEGORIES[$sKey])) {
			return self::$EXTERNALLY_MANAGED_DOCUMENT_CATEGORIES[$sKey];
		}
		throw new Exception(__METHOD__.': Please check your externally externally_managed_document_categories in config section school_settings');
	}	
	
	public static function getLinkCategoryConfig($sKey) { 
		if(!is_array(self::$EXTERNALLY_MANAGED_LINK_CATEGORIES)) {
			self::$EXTERNALLY_MANAGED_LINK_CATEGORIES = Settings::getSetting('school_settings', 'externally_managed_link_categories', array());
		}
		if(isset(self::$EXTERNALLY_MANAGED_LINK_CATEGORIES[$sKey])) {
			return self::$EXTERNALLY_MANAGED_LINK_CATEGORIES[$sKey];
		}
		throw new Exception(__METHOD__.': Please check your externally externally_managed_link_categories in config section school_settings');
	}
	
	public static function getPageIdentifier($sKey) {
		if(!is_array(self::$PAGE_IDENTIFIERS)) {
			self::$PAGE_IDENTIFIERS = Settings::getSetting('school_settings', 'page_identifiers', array());
		}
		if(isset(self::$PAGE_IDENTIFIERS[$sKey])) {
			return self::$PAGE_IDENTIFIERS[$sKey];
		}
		throw new Exception(__METHOD__.': Please check your page_identifiers in config section school_settings > page_identifiers');
	}
	
	public static function getActiveFunctionGroupIds($sKey) {
		if(!is_array(self::$ACTIVE_FUNCTION_GROUPS)) {
			self::$ACTIVE_FUNCTION_GROUPS = Settings::getSetting('school_settings', 'active_function_groups', array());
		}
		if(isset(self::$ACTIVE_FUNCTION_GROUPS[$sKey])) {
			return self::$ACTIVE_FUNCTION_GROUPS[$sKey];
		}
		throw new Exception(__METHOD__.': Please check your page_identifiers in config section active_function_groups teachers/others');
	}
	
	public static function getSchool() {
		if(self::$SCHOOL === null) {
			self::$SCHOOL = SchoolQuery::create()->filterByOriginalId(self::getSchoolId())->findOne();
		}
		return self::$SCHOOL;
	}
	
	public static function getCurrentYear() {
		if(self::getSchool()) {
			return self::$SCHOOL->getCurrentYear();
		}
	}

	public static function getSchoolId() {
		$iSchoolId = Settings::getSetting("school_settings", '***REMOVED***_school_id', null);
		if($iSchoolId) {
			return $iSchoolId;
		}
		throw new LocalizedException('configuration.error.school_id_required', array('config_file_path' => 'site/config/config.yml > school_settings'));
	}
}
