<?php
/**
 * @package modules.frontend
 */

class SchoolFrontendModule extends FrontendModule {
	
	public static $DISPLAY_MODES = array('schul_statistik');
	
	const MODE_SELECT_KEY = 'display_mode';
	
	public function renderFrontend() {
		$aOptions = @unserialize($this->getData());
		if(!isset($aOptions[self::MODE_SELECT_KEY])) {
			return null;
		}
		switch($aOptions[self::MODE_SELECT_KEY]) {
			case 'schul_statistik': return $this->renderSchulStatistik();
			default:
				return null;
		}
	}

	public function renderSchulStatistik() {
		$oTemplate = $this->constructTemplate('statistics');
		$aResult = array_merge(
			array(StringPeer::getString('statistics_key_classes', null, 'Klassen') => SchoolClassQuery::create()->filterByClassTypeIdYearAndSchool()->count()), 
			array(StringPeer::getString('statistics_key_students', null, 'SchülerInnen') => ClassStudentQuery::create()->filterBySchoolYear()->count()), 
			array(StringPeer::getString('statistics_key_teachers', null, 'Lehrpersonen') => ClassTeacherQuery::create()->filterByYear(SchoolPeer::getCurrentYear())->count()),
			array(StringPeer::getString('statistics_key_others', null, 'Andere Mitarbeiter') => SchoolFunctionQuery::create()->filterByNonTeachingFunctionGroups()->count())
			);
		foreach($aResult as $sName => $iCount) {
			if($iCount === 0) {
				continue;
			}
			$oItem = $this->constructTemplate('statistics_item');
			$oItem->replaceIdentifier('name', $sName);
			$oItem->replaceIdentifier('count', $iCount);
			$oTemplate->replaceIdentifierMultiple('statistics_item', $oItem);		
		}
		return $oTemplate;	
	}
}
