<?php
class FunktionParser extends SAXParser {
	protected static $URL = 'http://***REMOVED***.***REMOVED***.ch/websiteobjects/get_funktionInfo.asp';

	protected function gotElement($sElementName, $aAttributes) {
		if($sElementName === 'Bezeichnung') {
			$this->expectCharacters();
		}		
		if($sElementName === 'person_id') {
			$this->expectCharacters();
		}		
		if($sElementName === 'Funktionsgruppe') {
			$this->expectCharacters();
		}		
	}

	protected function endedElement($sElementName) {
		if($sElementName === 'Bezeichnung') {
			$this->mResult['title'] = $this->collectCharacters();
		}
		if($sElementName === 'person_id') {
			$this->mResult['person_id'] = $this->collectCharacters();
		}
		if($sElementName === 'Funktionsgruppe') {
			$this->mResult['function_group_name'] = $this->collectCharacters();
		}
	}
}
