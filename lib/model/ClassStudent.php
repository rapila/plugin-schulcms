<?php


/**
 * @package    propel.generator.model
 */
class ClassStudent extends BaseClassStudent {

  public function getFunctionName() {
    return str_replace('*', '', parent::getFunctionName());
  }
}

