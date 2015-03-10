<?php

/**
 * @package    propel.generator.model
 */
class News extends BaseNews {

	private static $NEWS_PAGE;

	public function setBodyAsTag($oTag) {
		if($oTag instanceof TagParser) {
			$oTag = $oTag->getTag();
		}
		$sBodyShort = $oTag->extractFirstElement();
		$this->setBodyShort($sBodyShort);
		$this->setBody($oTag->__toString());
	}

	public function getDateStartFormatted() {
		return LocaleUtil::localizeDate($this->getDateStart());
	}

	public function getDateEndFormatted() {
		return LocaleUtil::localizeDate($this->getDateEnd());
	}

	public function getHasImage() {
		return $this->getImageId() !== null;
	}

	public function getNewsTypeName() {
		if($this->getNewsType() === null) {
			return null;
		}
		return $this->getNewsType()->getName();
	}

	public function getBodyTruncated($iLength = 70) {
		return self::truncateBlob($this->getBody(), $iLength);
	}

	public function getBodyShortTruncated($iLength = 80) {
		return self::truncateBlob($this->getBodyShort(), $iLength);
	}

	private static function truncateBlob($oBlob, $iLength) {
		$sText = '';
		if(is_resource($oBlob)) {
			$sText = RichtextUtil::parseStorageForBackendOutput(stream_get_contents($oBlob))->render();
			$sText = strip_tags($sText);
		}
		if($iLength) {
			return StringUtil::truncate($sText, $iLength);
		}
	}

	public function renderItem($oTemplate) {
		$oTemplate->replaceIdentifier("id", $this->getId());
		$oTemplate->replaceIdentifier("headline", $this->getHeadline());
		$oTemplate->replaceIdentifier('content', RichtextUtil::parseStorageForFrontendOutput(is_resource($this->getBody()) ? stream_get_contents($this->getBody()) : ''));
	}

	public function getLink($oNewsPage = null) {
		if($oNewsPage === null && self::$NEWS_PAGE === null) {
			self::$NEWS_PAGE = PageQuery::create()->filterByPageType('news')->findOne();
		} elseif($oNewsPage) {
			self::$NEWS_PAGE = $oNewsPage;
		}
		if(!self::$NEWS_PAGE) {
			return null;
		}
		$aParams = array($this->getId());
		return array_merge(self::$NEWS_PAGE->getFullPathArray(), $aParams);
	}



}
