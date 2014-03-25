<?php
class PersonParser extends SAXParser {
	
	private static $MAPPING = array(
		'Name' => 'last_name',
		'Vorname' => 'first_name',
		'Geburtsdatum' => 'birth_date',
		'Geschlecht' => 'gender_id',
		'EmailG' => 'email_g',
		'EmailP' => 'email_p'
	);
	
	protected static $URL = 'https://***REMOVED***.***REMOVED***.ch/webservice/websiteobjects/get_personInfo.asp';

	protected function gotElement($sElementName, $aAttributes) {
		if(isset(self::$MAPPING[$sElementName])) {
			$this->expectCharacters();
		}
	}

	protected function endedElement($sElementName) {
		if(isset(self::$MAPPING[$sElementName])) {
			$sText = trim($this->collectCharacters());
			if($sText) {
				$this->mResult[self::$MAPPING[$sElementName]] = $sText;
			}
		}
	}
}
