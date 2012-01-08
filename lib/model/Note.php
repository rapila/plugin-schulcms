<?php

/**
 * @package    propel.generator.model
 */
class Note extends BaseNote {
	
	private static $NOTE_TYPES = array();

	public function getDateStartFormatted($sFormat = 'Y.m.d') {
		return $this->getDateStart($sFormat);
	}

	public function getDateEndFormatted($sFormat = 'Y.m.d') {
		return $this->getDateEnd($sFormat);
	}
	
	public function getBodyTruncated() {
		$sText = '';
		if(is_resource($this->getBody())) {
			$sText = RichtextUtil::parseStorageForBackendOutput(stream_get_contents($this->getBody()))->render();
			$sText = strip_tags($sText);
 		}
		return $sText;
	}
	
	public function getHasImage() {
		return $this->getImageId() !== null;
	}
	
	public function getNoteTypeName() {
		if($this->getNoteTypeId() === null) {
			return null;
		}
		if(!isset(self::$NOTE_TYPES[$this->getNoteTypeId()])) {
			self::$NOTE_TYPES[$this->getNoteTypeId()] = $this->getNoteType();
		}
		return self::$NOTE_TYPES[$this->getNoteTypeId()]->getName();
	}
}
