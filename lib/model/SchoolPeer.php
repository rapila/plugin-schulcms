<?php

/**
 * @package		 propel.generator.model
 */
class SchoolPeer extends BaseSchoolPeer {

	const PAGE_IDENTIFIER_TEAM = 'team';
	const PAGE_IDENTIFIER_EVENTS = 'events';

	private static $PAGE_IDENTIFIERS = null;
	private static $SCHOOL = null;
	private static $ACTIVE_FUNCTION_GROUPS = null;

	public static function getPeriodFromYear($sYear) {
		return $sYear.'-'.(substr($sYear + 1, 2));
	}

	public static function getPageIdentifier($sKey) {
		if(!is_array(self::$PAGE_IDENTIFIERS)) {
			self::$PAGE_IDENTIFIERS = Settings::getSetting('schulcms', 'page_identifiers', array());
		}
		if(isset(self::$PAGE_IDENTIFIERS[$sKey])) {
			return self::$PAGE_IDENTIFIERS[$sKey];
		}
		return $sKey;
	}

	public static function getActiveFunctionGroupIds($sKey) {
		if(!is_array(self::$ACTIVE_FUNCTION_GROUPS)) {
			self::$ACTIVE_FUNCTION_GROUPS = Settings::getSetting('schulcms', 'active_function_groups', array());
		}
		if(isset(self::$ACTIVE_FUNCTION_GROUPS[$sKey])) {
			return self::$ACTIVE_FUNCTION_GROUPS[$sKey];
		}
		throw new Exception(__METHOD__.': Please check your config parameter "'.$sKey.'" section active_function_groups');
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
		$iSchoolId = Settings::getSetting("schulcms", 'main_school_id', null);
		if($iSchoolId) {
			return $iSchoolId;
		}
		// throw new LocalizedException('configuration.error.school_id_required', array('config_file_path' => 'site/config/config.yml > schulcms'));
	}
}
