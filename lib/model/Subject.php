<?php

/**
 * @package    propel.generator.model
 */
class Subject extends BaseSubject
{
	public function setName($sName) {
		$this->setSlug(StringUtil::normalize(str_replace('-', '', $sName), '-', '-'));
		return parent::setName($sName);
	}
}
