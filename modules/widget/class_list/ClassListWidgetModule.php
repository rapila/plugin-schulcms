<?php
/**
 * @package modules.widget
 */
class ClassListWidgetModule extends WidgetModule {

	private $oListWidget;
	public $oDelegateProxy;
	public $oClassesWithStudentsInputFilter;
	public $bShowWithStudentsOnly;
	
	public function __construct() {
		$this->oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, "SchoolClass", "name", "asc");
		$this->oListWidget->setDelegate($this->oDelegateProxy);
		$this->oClassesWithStudentsInputFilter = WidgetModule::getWidget('classes_with_students_input', null, true);
		$this->oDelegateProxy->setCountStudents(true);
	}
	
	public function doWidget() {
		$aTagAttributes = array('class' => 'class_list');
		$oListTag = new TagWriter('table', $aTagAttributes);
		$this->oListWidget->setListTag($oListTag);
		return $this->oListWidget->doWidget();
	}
	
	public function getColumnIdentifiers() {
		return array('id', 'name', 'class_type_id', 'year_period', 'level', 'count_students', 'class_teacher_names', 'room_number', 'has_class_portrait', 'link_to_class_schedule', 'count_events', 'count_links');
	}
	
	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array('is_sortable' => true);
		switch($sColumnIdentifier) {
			case 'name':
				$aResult['heading'] = StringPeer::getString('wns.class.name');
				break;
			case 'class_type_id':
				$aResult['heading'] = StringPeer::getString('wns.class.type');
        $aResult['field_name'] = 'class_type_name';
				break;
			case 'year_period':
				$aResult['heading'] = StringPeer::getString('wns.class.year_period');
				break;
			case 'level':
				$aResult['heading'] = StringPeer::getString('wns.class.level');
				break;
			case 'count_students':
				$aResult['heading'] = StringPeer::getString('wns.class.with_students');
				$aResult['heading_filter'] = array('classes_with_students_input', $this->oClassesWithStudentsInputFilter->getSessionKey());
				$aResult['is_sortable'] = false;
				break;			
			case 'class_teacher_names':
				$aResult['heading'] = StringPeer::getString('wns.class.class_teacher');
				break;
			case 'room_number':
				$aResult['heading'] = StringPeer::getString('wns.class.room_number');
				break;
			case 'has_class_portrait':
				$aResult['heading'] = StringPeer::getString('wns.class.has_portrait');
				$aResult['is_sortable'] = false;
				break;
			case 'link_to_class_schedule':
				$aResult['heading'] = StringPeer::getString('wns.class.has_class_schedule');
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_URL;
				$aResult['is_sortable'] = false;
				break;
			case 'count_events':
				$aResult['heading'] = StringPeer::getString('wns.class.events_short');
				$aResult['is_sortable'] = false;
				break;				
			case 'count_links':
				$aResult['heading'] = StringPeer::getString('wns.class.links');
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
			return SchoolClassPeer::CLASS_TYPE_ID;
		}
		if($sColumnIdentifier === 'has_class_portrait') {
			return SchoolClassPeer::CLASS_PORTRAIT_ID;
		}		
		if($sColumnIdentifier === 'class_teacher_name') {
			return TeamMemberPeer::LAST_NAME;
		}
		return null;
	}
	
	public function getFilterTypeForColumn($sColumnIdentifier) {
    if($sColumnIdentifier === 'class_type_id') {
			return CriteriaListWidgetDelegate::FILTER_TYPE_IS;
		}
		return null;
	}
	
	public function setCountStudents($bShowWithStudentsOnly) {
	  $this->bShowWithStudentsOnly = $bShowWithStudentsOnly;
	}
	
	public function getClassTypeName() {
		if($this->oDelegateProxy->getClassTypeId() === CriteriaListWidgetDelegate::SELECT_ALL) {
		  return null;
		}
		$oClassType = ClassTypePeer::retrieveByPK($this->oDelegateProxy->getClassTypeId());
		return $oClassType->getName();
	}

	public function getCriteria() {
		$oCriteria = new Criteria();
		$oCriteria->setDistinct();
		$oCriteria->addJoin(SchoolClassPeer::ID, ClassTeacherPeer::SCHOOL_CLASS_ID, Criteria::LEFT_JOIN);
		if($this->bShowWithStudentsOnly) {
		  $oCriteria->addJoin(SchoolClassPeer::ID, ClassStudentPeer::SCHOOL_CLASS_ID, Criteria::INNER_JOIN);
		}
		return $oCriteria;
	}
}