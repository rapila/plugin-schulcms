<?php

/**
 * @package    propel.generator.model
 */
class ClassTeacher extends BaseClassTeacher {
  
  public function getFunctionName($bDisplayClassTeacher=false) {
		if($bDisplayClassTeacher && $this->isClassTeacher()) {
			return '';
		}
    return str_replace('*', '', parent::getFunctionName());
  }
}

