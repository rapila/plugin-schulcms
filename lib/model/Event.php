<?php

/**
 * @package		 propel.generator.model
 */
class Event extends BaseEvent {

	public function setTitle($sTitle) {
		$this->setTitleNormalized(StringUtil::normalize(str_replace('-', '', $sTitle), '-', '-'));
		return parent::setTitle($sTitle);
	}

	public function getIsClassEvent() {
		return $this->getSchoolClassId() !== null;
	}
	
	public function getIsServiceEvent() {
		return $this->getServiceId() !== null;
	}

	public function getTeaserTruncated() {
		return StringUtil::truncate($this->getTeaser(), 60);
	}
	
	public function isPreview() {
	  if($this->getDateEnd() !== null) {
	    return $this->getDateEnd('dmY') >= date('dmY');
	  }
	  return $this->getDateStart('dmY') >= date('dmY');
	}
	
	public function getDateFromTo($sFormat = 'd.m.Y') {
		$aResult = array();
		if($this->getDateEnd() === null) {
			return $this->getDateStart($sFormat);
		}
		if($this->getDateEnd('Y') !== $this->getDateStart('Y')) {
			return $this->getDateStart($sFormat).' bis '.$this->getDateEnd($sFormat);
		}
		if($this->getDateEnd('m') !== $this->getDateStart('m')) {
			return $this->getDateStart('d.m.').' bis '.$this->getDateEnd($sFormat);
		}
		return $this->getDateStart('d.').' bis '.$this->getDateEnd($sFormat);
	}
	
	public function getLastDate($sFormat = 'd.m.Y') {
		if($this->getDateEnd()) {
			return $this->getDateEnd($sFormat);
		}
		return $this->getDateStart($sFormat);
	}
	
	public function getDateStartTimeStamp() {
		return $this->date_start;
	}

	public function isEventDocument($iDocumentId) {
		$iDocumentId = (int) $iDocumentId;
		foreach($this->getEventDocuments() as $oEventDocument) {
			if($oEventDocument->getDocumentId() === $iDocumentId) {
				return true;
			}
		}
		return false;
	}
	
	public function getEventDocumentsOrdered() {
	  $oCriteria = new Criteria();
	  $oCriteria->addAscendingOrderByColumn(EventDocumentPeer::SORT);
	  return $this->getEventDocuments($oCriteria);
	}

}

