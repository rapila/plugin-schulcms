<?php

/**
 * @package		 propel.generator.model
 */
class Event extends BaseEvent {

	private static $EVENTPAGE = null;

	public function setTitle($sTitle) {
		$sNameNormalized = StringUtil::normalizePath($sTitle);
		$this->setSlug($sNameNormalized);
		return parent::setTitle($sTitle);
	}

	public function setBodyAsTag($oTag) {
		if($oTag instanceof TagParser) {
			$oTag = $oTag->getTag();
		}
		$sBodyShort = $oTag->extractFirstElement();
		$this->setBodyShort($sBodyShort);
		$this->setBody($oTag->__toString());
	}

	public function getTeaser() {
		if(is_resource($this->getBodyShort())) {
			return stream_get_contents($this->getBodyShort());
		}
		return null;
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

	public function getBodyTruncated() {
		// refactor to use body short when implemented
		$sContent = null;
		if($this->getBody() != null) {
			$sContent = stream_get_contents($this->getBody());
			return StringUtil::truncate(strip_tags($sContent), 40);
		}
		return null;
	}

	public function isPreview() {
		if($this->getDateEnd() !== null) {
			return $this->getDateEnd('Ymd') >= date('Ymd');
		}
		return $this->getDateStart('Ymd') >= date('Ymd');
	}

	public function isMultiDay() {
		return $this->getDateEnd() > $this->getDateStart();
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

	public function getDateStartFormatted() {
		return LocaleUtil::localizeDate($this->getDateStart());
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

	public function getLink($oEventPage = null) {
		if($oEventPage === null) {
			if(!self::$EVENTPAGE) {
				self::$EVENTPAGE = PageQuery::create()->filterByPageType('events')->findOne();
				if(!self::$EVENTPAGE) {
					throw new Exception("Error: Your current event page requires a page with type “events”");
				}
			}
			$oEventPage = self::$EVENTPAGE;
		}
		$aDateStart = explode('-', $this->getDateStart('Y-n-j'));
		return array_merge($oEventPage->getFullPathArray(), array_merge($aDateStart, array($this->getSlug())));
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
			$aLink = $this->getLink();
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