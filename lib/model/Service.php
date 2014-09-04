<?php

/**
 * @package		 propel.generator.model
 */
class Service extends BaseService {

	public function setName($sName) {
		$this->setSlug(StringUtil::normalize(str_replace('-', '', $sName), '-', '-'));
		return parent::setName($sName);
	}

	/**
	* Sets the body short text. When given a TagParser or an HtmlTag instance, this method will use the first paragraph tag found to construct the synopsis (short text).
	* @param string|TagParser|HtmlTag $mText
	*/
	public function setBody($mText) {
		if($mText instanceof TagParser) {
			$mText = $mText->getTag();
		}
		if($mText instanceof HtmlTag) {
			$oTextShort = null;
			foreach($mText->getChildren() as $oChild) {
				if($oChild instanceof HtmlTag && strtolower($oChild->getName()) === 'p') {
					$oTextShort = $oChild;
					break;
				}
			}
			$mText = $mText->__toString();
			if($oTextShort) {
				$this->setBodyShort($oTextShort->__toString());
			} else {
				$this->setBodyShort($mText);
			}
		}
		parent::setBody($mText);
	}

	// public function getTeaser() {
	// 	if(is_resource($this->getBodyShort())) {
	// 		return stream_get_contents($this->getBodyShort());
	// 	}
	// 	return null;
	// }

	public function getTeamCount() {
		return $this->countServiceMembers();
	}

	public function getDocumentCount() {
		return $this->countServiceDocuments();
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
		if($oServicePage !== null) {
			return array_merge($oServicePage->getFullPathArray(), array($this->getSlug()));
		}
		return null;
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

	public function delete(PropelPDO $oConnection = null) {
		$oImage = $this->getDocument();
		if($oImage) {
			$oImage->delete();
		}
		ServiceDocumentQuery::create()->filterByServiceId($this->getId())->delete();
		return parent::delete($oConnection);
	}



}

