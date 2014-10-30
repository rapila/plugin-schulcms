<?php

class SchoolSiteConfig {

	private static function findOrCreateEntryByName($sIdentifier, $sModel, $sDefaultName) {
		$sName = Settings::getSetting('externally_managed_categories', $sIdentifier, $sDefaultName);
		$sMethod = $sModel.'Query';
		$oObject = $sMethod::create()->findOneByName($sName);
		if($oObject) {
			return $oObject;
		}
		$oObject= new $sModel();
		$oObject->setName($sName)->setIsExternallyManaged(true)->save();
		return $oObject;
	}

	public static function getClassEventTypeId() {
		return self::findOrCreateEntryByName('class_event_type', 'EventType', 'Class Events')->getId();
	}

	public static function getClassNewsTypeId() {
		return self::findOrCreateEntryByName('class_news_type', 'NewsType', 'Class News')->getId();
	}

	public static function getClassPortraitDocumentCategoryId() {
		return self::findOrCreateEntryByName('class_portrait_document_category', 'DocumentCategory', 'Class Portraits')->getId();
	}

	public static function getClassScheduleDocumentCategoryId() {
		return self::findOrCreateEntryByName('class_schedule_document_category', 'DocumentCategory', 'Class Schedules')->getId();
	}

	public static function getClassDocumentCategoryId() {
	 	return self::findOrCreateEntryByName('class_document_category', 'DocumentCategory', 'Class Documents')->getId();
	}

	public static function getClassLinkCategoryId() {
		return self::findOrCreateEntryByName('class_link_category', 'DocumentCategory', 'Class Links')->getId();
	}

	public static function getServiceDocumentCategoryId() {
		return self::findOrCreateEntryByName('service_document_category', 'DocumentCategory', 'Service Documents')->getId();
	}
}