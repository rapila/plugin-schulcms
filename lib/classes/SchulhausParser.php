<?php
class SchulhausParser extends SAXParser {
	protected static $URL = 'http://***REMOVED***.***REMOVED***.ch/websiteobjects/get_schulhausInfo.asp';

	protected function gotElement($sElementName, $aAttributes) {
		if($sElementName === 'Bezeichnung') {
			$this->expectCharacters();
		}
		if($sElementName === 'Schuleinheit') {
			$this->expectCharacters();
		}
		if($sElementName === 'Schuljahr') {
			$this->expectCharacters();
		}
		if($sElementName === 'Strasse') {
			$this->expectCharacters();
		}
		if($sElementName === 'PLZ') {
			$this->expectCharacters();
		}
		if($sElementName === 'Ort') {
			$this->expectCharacters();
		}
		if($sElementName === 'Klasse') {
			if(!isset($this->mResult['classes'])) {
				$this->mResult['classes'] = array();
			}
			$this->mResult['classes'][] = $aAttributes['klasseID'];
		}
		if($sElementName === 'Funktion') {
			if(!isset($this->mResult['functions'])) {
				$this->mResult['functions'] = array();
			}
			$this->mResult['functions'][] = $aAttributes['funkID'];
		}
	}

	protected function endedElement($sElementName) {
		if($sElementName === 'Bezeichnung') 	{ $this->mResult['name'] = $this->collectCharacters(); }
		if($sElementName === 'Schuleinheit') 	{ $this->mResult['school_unit'] = $this->collectCharacters();}
		if($sElementName === 'Schuljahr') 		{ $this->mResult['year'] = $this->collectCharacters(); }
		if($sElementName === 'Strasse') 			{	$this->mResult['address'] = $this->collectCharacters(); }
		if($sElementName === 'PLZ') 					{ $this->mResult['zip_code'] = $this->collectCharacters(); }
		if($sElementName === 'Ort') 					{	$this->mResult['city'] = $this->collectCharacters(); }
	}
}
