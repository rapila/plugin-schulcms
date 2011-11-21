<?php

/**
 * @package		 propel.generator.model
 */
class Service extends BaseService {

	public function setName($sName) {
		$this->setSlug(StringUtil::normalize(str_replace('-', '', $sName), '-', '-'));
		return parent::setName($sName);
	}
	
	public function getTeamCount() {
		return $this->countServiceMembers();
	}

	public function getOpeningHoursFormatted($sSeparator = ':') {
		$aLines = explode("\n", $this->getOpeningHours());
		$aResult = array();
		foreach($aLines as $i => $sLine) {
			$aLine = explode($sSeparator, $sLine);
 			if(count($aLine) === 2) {
				$aResult[$i][0]	= TagWriter::quickTag('span', array('class' => 'schedule'), trim($aLine[0]));
				$aResult[$i][1] = trim($aLine[1]);
			} else {
				$aResult[$i] = trim($sLine);
			}
		}
		return $aResult;
	}
	
	public function getWebsiteWithProtocol() {
	  if($this->getWebsite() == null) {
	    return null;
	  }
	  if(strpos($this->getWebsite(), '://')) {
	    return $this->getWebsite();
	  }
	  return 'http://'.$this->getWebsite();
	}
	
	public function getServiceLink($oServicePage = null) {
		if($oServicePage === null) {
			$oServicePage = PagePeer::getPageByIdentifier(SchoolPeer::getPageIdentifier(SchoolPeer::PAGE_IDENTIFIER_SERVICES));
		}
		return array_merge($oServicePage->getFullPathArray(), array($this->getSlug()));
	}
	
	public function getServiceCategoryName() {
		if($this->getServiceCategory()) {
			return $this->getServiceCategory()->getName();
		}
		return null;
	}
	
 /**
	* for reference tracking only
	*/
	public function getDescription() {
		return StringPeer::getString('wns.service.description', null, null, array('name' => $this->getName()));
	}
	
	public function getAdminLink() {
		return array('services', $this->getId());
	}



}

