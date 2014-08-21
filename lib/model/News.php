<?php

/**
 * @package    propel.generator.model
 */
class News extends BaseNews {

	private static $NEWS_TYPES = array();

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
