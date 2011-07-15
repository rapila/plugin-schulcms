<?php

/**
 * @package    propel.generator.model
 */
class ServiceCategory extends BaseServiceCategory {

  public function getLinkToServices() {
		$aArray = array();
		$iCount = $this->countServices();
		if($iCount == 0) {
			$aArray[] = StringPeer::getString('wns.none');
		} else if($iCount === 1) {
			$aArray[] = $iCount.' '.StringPeer::getString('wns.service');
		} else {
			$aArray[] = $iCount.' '.StringPeer::getString('wns.services');
		}
		$aArray[] = LinkUtil::link(array('services'), 'AdminManager', array('service_category_id' => $this->getId()));
		return $aArray;
	}
	
	public function setName($sName) {
		$this->setNameNormalized(StringUtil::normalize($sName));
		return parent::setName($sName);
	}
}

