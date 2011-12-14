<?php

/**
 * @package		 propel.generator.model
 */
class ClassTeacher extends BaseClassTeacher {
	
	public function getFunctionName($bStripStar = false) {
		if($bStripStar) {
			return str_replace('*', '', parent::getFunctionName());
		}
		return parent::getFunctionName();
	}
}

