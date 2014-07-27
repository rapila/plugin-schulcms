<?php
/**
* @package modules.widget
*/
class ClassesInputWidgetModule extends WidgetModule {

  public function listClasses($bWithStudentsOnly = false) {
		$aResult = array();
		$oQuery = SchoolClassQuery::create()->joinClassType(null, Criteria::INNER_JOIN)->orderByName();
		if($bWithStudentsOnly) {
			$oQuery->filterByHasStudents();
		}
		foreach($oQuery->select(array('Id', 'Name', 'ClassType.Name'))->find() as $i => $aClass) {
			$aResult[] = array('key' => $aClass['Id'], 'value' => $aClass['ClassType.Name']. ' '. $aClass['Name']);
		}
		return $aResult;
	}

	public function getElementType() {
		return 'select';
	}
}