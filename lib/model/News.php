<?php

/**
 * @package    propel.generator.model
 */
class News extends BaseNews {

	private static $NEWS_TYPES = array();

	public function setBodyAsTag($oTag) {
		if($oTag instanceof TagParser) {
			$oTag = $oTag->getTag();
		}
		$sBodyShort = $oTag->extractFirstElement();
		$this->setBodyShort($sBodyShort);
		$this->setBody($oTag->__toString());
	}

	public function getDateStartFormatted($sFormat = 'd.m.Y') {
		return $this->getDateStart($sFormat);
	}

	public function getDateEndFormatted($sFormat = 'd.m.Y') {
		return $this->getDateEnd($sFormat);
	}

	public function getHasImage() {
		return $this->getImageId() !== null;
	}

	public function getNewsTypeName() {
		if($this->getNewsTypeId() === null) {
			return null;
		}
		if(!isset(self::$NEWS_TYPES[$this->getNewsTypeId()])) {
			self::$NEWS_TYPES[$this->getNewsTypeId()] = $this->getNewsType();
		}
		return self::$NEWS_TYPES[$this->getNewsTypeId()]->getName();
	}

	public function getBodyTruncated($iLength = 70) {
		$sText = '';
		if(is_resource($this->getBody())) {
			$sText = RichtextUtil::parseStorageForBackendOutput(stream_get_contents($this->getBody()))->render();
			$sText = strip_tags($sText);
		}
		if($iLength) {
			return StringUtil::truncate($sText, $iLength);
		}
		return $sText;
	}

}
