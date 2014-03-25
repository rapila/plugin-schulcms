<?php
class LehrerParser extends SAXParser {
	protected static $URL = 'https://***REMOVED***.***REMOVED***.ch/webservice/websiteobjects/get_lehrerInfo.asp';

	protected function gotElement($sElementName, $aAttributes) {
		if($sElementName === 'AngestelltSeit') {
			$this->expectCharacters();
		}		
	}

	protected function endedElement($sElementName) {
		if($sElementName === 'AngestelltSeit') {
			$this->mResult['employed_since'] = $this->collectCharacters();
		}
	}
}
