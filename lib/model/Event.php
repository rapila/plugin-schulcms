<?php

/**
 * @package		 propel.generator.model
 */
class Event extends BaseEvent {

	private static $EVENT_PAGES = array();
	
	public function setTitle($sTitle) {
		$this->setTitleNormalized(StringUtil::normalize(str_replace('-', '', $sTitle), '-', '-'));
		return parent::setTitle($sTitle);
	}
	
	/**
	* for reference tracking only
	*/
	public function getDescription() {
		return StringPeer::getString('wns.event.description', null, null, array('title' => $this->getTitle()));
	}

	public function getIsClassEvent() {
		return $this->getSchoolClassId() !== null;
	}
	
	public function getIsServiceEvent() {
		return $this->getServiceId() !== null;
	}

	public function getTeaserTruncated() {
		return StringUtil::truncate($this->getTeaser(), 40);
	}
	
	public function isPreview() {
		if($this->getDateEnd() !== null) {
			return $this->getDateEnd('Ymd') >= date('Ymd');
		}
		return $this->getDateStart('Ymd') >= date('Ymd');
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
	
	public function getWeekdayName() {
		return LocaleUtil::getDayNameByWeekDay($this->getDateStart('w'));
	}

	public function getDatumWithMonthName() {
		if($this->getDateStart() != null) {
			return $this->getDateStart('j').'. '.LocaleUtil::getMonthNameByMonthId($this->getDateStart('n')).' '.$this->getDateStart('Y');
		}
	}
	
	public function getLastDate($sFormat = 'd.m.Y') {
		if($this->getDateEnd()) {
			return $this->getDateEnd($sFormat);
		}
		return $this->getDateStart($sFormat);
	}
	
	public function getDateStartFormatted($sFormat = 'Y.m.d') {
		return $this->getDateStart($sFormat);
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
	
	public function isReview() {
		return $this->getLastDate('Ymd') < date('Ymd');
	}
	
	public function hasImages() {
		return $this->countEventDocuments() > 0;
	}
	
	public function getHasImages() {
		return $this->hasImages();
	}
	
	public function hasReviewText() {
		return $this->getBodyReview() !== null;
	}
	
	public function hasBericht() {
		return $this->isReview() && $this->hasReviewText();
	}
	
	public function getHasBericht() {
		return $this->hasBericht();
	}

	public function getEventDocumentsOrdered() {
		$oCriteria = EventDocumentQuery::create()->orderBySort();
		$oCriteria->joinDocument()->useQuery(DocumentPeer::OM_CLASS)->filterByDocumentKind('image');
		return $this->getEventDocuments($oCriteria);
	}
	
	public function getFirstImage() {
		$oCriteria = EventDocumentQuery::create()->filterByEventId($this->getId())->orderBySort();
		$oCriteria->joinDocument()->useQuery(DocumentPeer::OM_CLASS)->filterByDocumentKind('image');
		return $oCriteria->findOne();
	}
	
	public function getEventPageLink($oEventPage = null) { 
		if($oEventPage === null) {
			if(!isset(self::$EVENT_PAGES[$this->getEventTypeId()])) {
				$EVENT_PAGES[$this->getEventTypeId()] = PagePeer::getPageByIdentifier(SchoolPeer::getPageIdentifier(SchoolPeer::PAGE_IDENTIFIER_EVENTS).'-'.$this->getEventTypeId());
			}
			$oEventPage = $EVENT_PAGES[$this->getEventTypeId()];
		}
		$aDateStart = explode('-', $this->getDateStart('Y-n-j'));
		return array_merge($oEventPage->getFullPathArray(), array_merge($aDateStart, array($this->getTitleNormalized())));
	}
	
	public function getAdminLink() {
		return array('events', $this->getId());
	}
	
	public function delete(PropelPDO $oConnection = null) {
		EventDocumentQuery::create()->filterByEventId($this->getId())->delete();
		return parent::delete($oConnection);
	}
	
	public function getRssAttributes($bForReview = false, $oBaseNavigationItem = null) {
		$aResult = array();
		$aResult['title'] = $this->getTitle();
		$aLink = array();
		if($oBaseNavigationItem) {
			$aLink = array_merge($oBaseNavigationItem->getLink(), array(ClassesFrontendModule::DETAIL_IDENTIFIER_EVENT, $this->getId()));
		} else {
			$aLink = $this->getEventPageLink();
		}
		$aResult['link'] = LinkUtil::absoluteLink(LinkUtil::link($aLink), 'FrontendManager');
		if($bForReview) {
			// if there is a bericht, display bericht hier
			// show images also <image>
		} else {
			$aResult['description'] = $this->getTeaser();
		}
		$aResult['author'] = $this->getUserRelatedByCreatedBy()->getEmail().' ('.$this->getUserRelatedByCreatedBy()->getFullName().')';
		$aResult['guid'] = $aResult['link'];
		$aResult['pubDate'] = date(DATE_RSS, (int)$this->getDateStartTimeStamp());
		$aResult['category'] = $this->getEventType()->getName();
		return $aResult;
	}
	
	public function getDateStartTimeStamp() {
		return (int)$this->getDateStart('U');
		// why not return $this->date_start;
	}
	
	

}