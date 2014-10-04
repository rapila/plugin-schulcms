<?php
/**
* @package modules.widget
*/
class ClassesInputWidgetModule extends WidgetModule {

  public function listClasses($bWithStudentsOnly = false) {
		$aResult = array();
		$oQuery = SchoolClassQuery::create()->orderByName();
		if($bWithStudentsOnly) {
			$oQuery->filterByHasStudents();
		}
		foreach($oQuery->select(array('Id', 'Name', 'ClassType'))->find() as $i => $aClass) {
			$aResult[] = array('key' => $aClass['Id'], 'value' => $aClass['ClassType']. ' '. $aClass['Name']);
		}
		return $aResult;
	}

	public function getElementType() {
		return 'select';
	}
}