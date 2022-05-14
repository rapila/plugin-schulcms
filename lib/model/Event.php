<?php

/**
 * @package		 propel.generator.model
 */
class Event extends BaseEvent {

	private static $EVENTPAGE = false;

	public function setTitle($sTitle) {
		$sPrefix = $this->getSchoolClass() ? $this->getSchoolClass()->getClassName().' ' : '';
		$sNameNormalized = StringUtil::normalizePath("$sPrefix$sTitle");
		$sSlug = $this->getSlug();
		$iCount = 0;
		// Keep current slug if possible
		if(!$sSlug) {
			$sSlug = $sNameNormalized;
			// No need to start at zero if we’re already using the normalized name in the first round
			$iCount++;
		}
		// This is even more strict than the unique index: slug and date have to be unique (not slug, date and class). However, since the class name is part of the title, this will yield the same outcome in most cases
		while(EventQuery::create()->filterBySlug($sSlug)->_if(!$this->isNew())->filterById($this->getId(), Criteria::NOT_EQUAL)->_endIf()->filterByDateStart($this->getDateStart(null))->count() > 0) {
			$sSlug = $sNameNormalized;
			if($iCount) {
				$sSlug = "$sSlug-$iCount";
			}
			$iCount++;
		}
		$this->setSlug($sSlug);
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
		return TranslationPeer::getString('wns.event.description', null, null, array('title' => $this->getTitle()));
	}

	public function getIsClassEvent() {
		return $this->getSchoolClassId() !== null;
	}

	public function getFullTitle() {
		if($this->getIsClassEvent()) {
			return $this->getSchoolClass()->getClassName().': '.$this->getTitle();
		}
		return $this->getTitle();
	}

	public function getBodyShortTruncated($iLength = 40) {
		// refactor to use body short when implemented
		$sContent = $this->getTeaser();
		if($sContent) {
			RichtextUtil::parseStorageForFrontendOutput($sContent);
			$sContent = html_entity_decode(strip_tags($sContent));
			return StringUtil::truncate($sContent, $iLength);
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

	public function isToday() {
		$sToday = date('Ymd');
		if($this->getDateStart('Ymd') === $sToday) {
			return true;
		}
		return $this->getDateEnd() != null && ($this->getDateStart('Ymd') < $sToday && $this->getDateEnd('Ymd') > $sToday);
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
		if($oEventPage === null || $oEventPage->getPageType() !== 'events') {
			$oEventPage = self::getEventPage();
			if(!$oEventPage) {
				throw new Exception("Error: Your current event page requires a page with type “events”");
			}
		}
		$aDateStart = explode('-', $this->getDateStart('Y-n-j'));
		return array_merge($oEventPage->getFullPathArray(), array_merge($aDateStart, array($this->getSlug())));
	}

	public static function getEventPage() {
		if(self::$EVENTPAGE === false) {
			self::$EVENTPAGE = PageQuery::create()->filterByPageType('events')->findOne();
		}
		return self::$EVENTPAGE;
	}

	public function getAdminLink() {
		return array('events', $this->getId());
	}

	public function delete(PropelPDO $oConnection = null) {
		EventDocumentQuery::create()->filterByEventId($this->getId())->delete();
		return parent::delete($oConnection);
	}

	public function getRssAttributes($bForReview = false) {
		$mOldLinkingSetting = RichtextUtil::$USE_ABSOLUTE_LINKS;
		RichtextUtil::$USE_ABSOLUTE_LINKS = LinkUtil::isSSL();

		$aResult = array();
		$aResult['title'] = $this->getFullTitle();
		$aLink = array();
		$aLink = $this->getLink();
		$aResult['link'] = LinkUtil::absoluteLink(LinkUtil::link($aLink, 'FrontendManager'), null, 'auto');
		if($bForReview) {
			$sBody = null;
			if($this->hasBericht() && is_resource($this->getBodyReview())) {
				$sBody = RichtextUtil::parseStorageForFrontendOutput(stream_get_contents($this->getBodyReview()));
			}
			if($sBody === null && is_resource($this->getBody())) {
				$sBody = RichtextUtil::parseStorageForFrontendOutput(stream_get_contents($this->getBody()));
			} else {
				$sBody = $this->getTeaser();
			}
			$aEventDocuments = $this->getEventDocumentsOrdered();
			foreach($aEventDocuments as $oEventDocument) {
				$oDocument = $oEventDocument->getDocument();
				if(!$oDocument || !$oDocument->isImage()) {
					continue;
				}
				$mDescription = '';
				if($oDocument->getDescription() != null) {
					$mDescription = $oDocument->getDescription();
				} elseif(Settings::getSetting('schulcms', 'gallery_display_image_name', true)) {
					$mDescription = $oDocument->getName();
				}
				$sBody .= '<img src="'.$oDocument->getDisplayUrl(array('max_width' => 400)).'" alt="'.$mDescription.'" /><br />';
			}
			$aResult['description'] = $sBody;
		} else {
			$aResult['description'] = $this->getTeaser();
		}
		if($this->getUserRelatedByCreatedBy()) {
			$aResult['author'] = $this->getUserRelatedByCreatedBy()->getEmail().' ('.$this->getUserRelatedByCreatedBy()->getFullName().')';
		}
		$aResult['guid'] = array('isPermaLink' => 'true', '__content' => $aResult['link']);
		$aResult['pubDate'] = date(DATE_RSS, (int)$this->getDateStartTimeStamp());
		if($this->getEventType()) {
			$aResult['category'] = $this->getEventType()->getName();
		}

		RichtextUtil::$USE_ABSOLUTE_LINKS = $mOldLinkingSetting;
		return $aResult;
	}

	public function getClassName() {
		if($this->getSchoolClass()) {
			return $this->getSchoolClass()->getClassName();
		}
	}

	public function getDateStartTimeStamp() {
		return (int)$this->getDateStart('U');
	}

	public function save(PropelPDO $con = null) {
		if($this->getDateEnd() === null) {
			$this->setDateEnd($this->getDateStart());
		}
		return parent::save($con);
	}

}
