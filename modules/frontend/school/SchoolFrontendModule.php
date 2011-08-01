<?php
/**
 * @package modules.frontend
 */

class SchoolFrontendModule extends DynamicFrontendModule implements WidgetBasedFrontendModule {
	
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
			array(StringPeer::getString('statistics_key_classes', null, 'Klassen') => SchoolClassPeer::countActiveSchoolUnitsBySchool()), 
			array(StringPeer::getString('statistics_key_students', null, 'SchülerInnen') => ClassStudentPeer::countStudents()), 
			array(StringPeer::getString('statistics_key_teachers', null, 'Lehrpersonen') => TeamMemberPeer::countLehrpersonen()),
			array(StringPeer::getString('statistics_key_others', null, 'Andere Mitarbeiter') => TeamMemberPeer::countNonTeachingPersonel())
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
	
	public function widgetData() {
		$aOptions = @unserialize($this->getData()); 
		return $aOptions[self::MODE_SELECT_KEY];
	}
	
	public function widgetSave($mData) {
		$this->oLanguageObject->setData(serialize(array(self::MODE_SELECT_KEY => $mData)));
		return $this->oLanguageObject->save();
	}
	
	public function getWidget() {
		$aOptions = @unserialize($this->getData()); 
		$oWidget = new SchoolEditWidgetModule(null, $this);
		$oWidget->setDisplayMode($aOptions[self::MODE_SELECT_KEY]);
		return $oWidget;
	}

}
