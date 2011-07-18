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
