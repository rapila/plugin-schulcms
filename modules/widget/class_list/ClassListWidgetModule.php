<?php
/**
 * @package modules.widget
 */
class ClassListWidgetModule extends SpecializedListWidgetModule {

	public $oDelegateProxy;
	public $oClassesFeVisiblesInputFilter;
	public $oSchoolYearInputFilter;
	public $bDisplayFeVisiblesOnly;

	protected function createListWidget() {
		$oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, "SchoolClass", "name", "asc");
		$oListWidget->setDelegate($this->oDelegateProxy);
		$this->oClassesFeVisiblesInputFilter = WidgetModule::getWidget('classes_fe_visibles_input', null, true);
		$this->oDelegateProxy->setIsFeVisible(true);
		$this->oDelegateProxy->setYearPeriod(SchoolPeer::getCurrentYear());
		$this->oSchoolYearInputFilter = WidgetModule::getWidget('year_input', null, $this->oDelegateProxy->getYearPeriod());
		return $oListWidget;
	}

	public function getColumnIdentifiers() {
		return array('id', 'class_name', 'year_period', 'level', 'is_fe_visible', 'class_teacher_names', 'has_class_portrait', 'has_class_schedule', 'count_events');
	}

	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array('is_sortable' => true);
		switch($sColumnIdentifier) {
			case 'class_name':
				$aResult['heading'] = TranslationPeer::getString('wns.class.name');
				break;
			case 'year_period':
				$aResult['heading'] = '';
				$aResult['heading_filter'] = array('year_input', $this->oSchoolYearInputFilter->getSessionKey());
				$aResult['is_sortable'] = false;
				break;
			case 'level':
				$aResult['heading'] = TranslationPeer::getString('wns.class.level');
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_NUMERIC;
				break;
			case 'is_fe_visible':
				$aResult['heading'] = TranslationPeer::getString('wns.class.is_fe_visible');
				$aResult['heading_filter'] = array('classes_fe_visibles_input', $this->oClassesFeVisiblesInputFilter->getSessionKey());
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_NUMERIC;
				$aResult['is_sortable'] = false;
				break;
			case 'class_teacher_names':
				$aResult['heading'] = TranslationPeer::getString('wns.class.class_teacher');
				$aResult['is_sortable'] = false;
				break;
			case 'room_number':
				$aResult['heading'] = TranslationPeer::getString('wns.class.room_number');
				break;
			case 'has_class_portrait':
				$aResult['heading'] = TranslationPeer::getString('wns.class.has_portrait');
				$aResult['is_sortable'] = false;
				break;
			case 'has_class_schedule':
				$aResult['heading'] = TranslationPeer::getString('wns.class.has_class_schedule');
				$aResult['is_sortable'] = false;
				break;
			case 'count_events':
				$aResult['heading'] = TranslationPeer::getString('wns.class.events');
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_NUMERIC;
				$aResult['is_sortable'] = false;
				break;
			case 'count_links':
				$aResult['heading'] = TranslationPeer::getString('wns.class.links');
				$aResult['is_sortable'] = false;
				break;
		}
		return $aResult;
	}

	public function getDatabaseColumnForColumn($sColumnIdentifier) {
		if($sColumnIdentifier === 'year_period') {
			return SchoolClassPeer::YEAR;
		}
		if($sColumnIdentifier === 'class_type_name') {
			return SchoolClassPeer::CLASS_TYPE;
		}
		if($sColumnIdentifier === 'class_name') {
			return SchoolClassPeer::NAME;
		}
		if($sColumnIdentifier === 'has_class_portrait') {
			return SchoolClassPeer::CLASS_PORTRAIT_ID;
		}
		if($sColumnIdentifier === 'teaching_unit_name') {
			return SchoolClassPeer::TEACHING_UNIT;
		}
		if($sColumnIdentifier === 'has_class_schedule') {
			return SchoolClassPeer::CLASS_SCHEDULE_ID;
		}
		if($sColumnIdentifier === 'class_teacher_name') {
			return TeamMemberPeer::LAST_NAME;
		}
		return null;
	}

	public function getFilterTypeForColumn($sColumnIdentifier) {
		if($sColumnIdentifier === 'class_type') {
			return CriteriaListWidgetDelegate::FILTER_TYPE_IS;
		}
		if($sColumnIdentifier === 'year_period') {
			return CriteriaListWidgetDelegate::FILTER_TYPE_IS;
		}
		return null;
	}

	public function setIsFeVisible($bDisplayFeVisiblesOnly) {
		$this->bDisplayFeVisiblesOnly = $bDisplayFeVisiblesOnly;
	}

	public function getIsFeVisible() {
		return $this->bDisplayFeVisiblesOnly ? "Ja" : "Nein";
	}

	public function getClassTypeName() {
		if($this->oDelegateProxy->getClassType() === CriteriaListWidgetDelegate::SELECT_ALL) {
			return null;
		}
		return $this->oDelegateProxy->getClassType();
	}

	public static function listQuery() {
		return SchoolClassQuery::create()->distinct()->hasTeachers();
	}

	public function getCriteria() {
		$oQuery = static::listQuery();
		if($this->bDisplayFeVisiblesOnly) {
			$oQuery->joinClassStudent()->hasTeachers(true);
		}
		return $oQuery;
	}
}
