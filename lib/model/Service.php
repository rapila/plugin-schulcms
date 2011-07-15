<?php

/**
 * @package		 propel.generator.model
 */
class Service extends BaseService {
	
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
}

