<?php

/**
 * @package    propel.generator.model
 */
class ClassTeacher extends BaseClassTeacher {
  
  public function getFunctionName() {
    return str_replace('*', '', parent::getFunctionName());
  }
}

