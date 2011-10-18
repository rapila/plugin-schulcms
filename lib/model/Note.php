<?php

/**
 * @package    propel.generator.model
 */
class Note extends BaseNote {

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
}
