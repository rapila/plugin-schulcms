<?php
class LehrerZuKlasseParser extends SAXParser {
	protected static $URL = 'https://***REMOVED***.***REMOVED***.ch/webservice/websiteobjects/get_lezuklInfo.asp';

	protected function gotElement($sElementName, $aAttributes) {
		if($sElementName === 'IstKlassenlehrer') $this->expectCharacters();
		if($sElementName === 'Funktion') $this->expectCharacters();
		if($sElementName === 'Position') $this->expectCharacters();
		if($sElementName === 'lehrer_id') $this->expectCharacters();
	}

	protected function endedElement($sElementName) {
		if($sElementName === 'IstKlassenlehrer') $this->mResult['is_class_teacher'] = $this->collectCharacters();
		if($sElementName === 'Funktion') $this->mResult['function_name'] = $this->collectCharacters();
		if($sElementName === 'Position') $this->mResult['sort_order'] = $this->collectCharacters();
		if($sElementName === 'lehrer_id') $this->mResult['teacher_id'] = $this->collectCharacters();
	}
}
