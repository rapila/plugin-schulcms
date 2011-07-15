<?php
/**
* @package modules.widget
*/
class ClassesInputWidgetModule extends WidgetModule {
		
  public function getClasses() {
		$aClasses = SchoolClassQuery::create()->filterByHasStudents()->orderByName()->find();
		$aResult = array();
		foreach($aClasses as $oClass) {
			$sClassType = $oClass->getClassType() ? $oClass->getClassType()->getName() : '?';
      $aResult[$oClass->getId()] = $sClassType.' '.$oClass->getName();
		}
		return $aResult;
	}
	
	public function getElementType() {
		return 'select';
	}
}