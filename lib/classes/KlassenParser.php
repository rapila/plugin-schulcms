<?php
class KlassenParser extends SAXParser {
	protected static $URL = 'http://***REMOVED***.***REMOVED***.ch/websiteobjects/get_klasseInfo.asp';

	protected function gotElement($sElementName, $aAttributes) {
		if($sElementName === 'Jahrgang') {
			$this->expectCharacters();
		}
		if($sElementName === 'Bezeichnung') {
			$this->expectCharacters();
		}
		if($sElementName === 'Zimmernummer') {
			$this->expectCharacters();
		}
		if($sElementName === 'Klassentyp') {
			$this->expectCharacters();
		}
		if($sElementName === 'Unterrichtseinheit') {
			$this->expectCharacters();
		}
		if($sElementName === 'Lezukl') {
			if(!isset($this->mResult['teacher_to_classes'])) {
				$this->mResult['teacher_to_classes'] = array();
			}
			$this->mResult['teacher_to_classes'][] = $aAttributes['lezukl_id'];
		}
		if($sElementName === 'person_id') {
			if(!isset($this->mResult['persons_to_classes'])) {
				$this->mResult['persons_to_classes'] = array();
			}
			$this->mResult['persons_to_classes'][] = $aAttributes['person_id'];
		}
	}

	protected function endedElement($sElementName) {
		if($sElementName === 'Jahrgang') {
			$this->mResult['level'] = $this->collectCharacters();
		}
		if($sElementName === 'Bezeichnung') {
			$this->mResult['name'] = $this->collectCharacters();
		}
		if($sElementName === 'Zimmernummer') {
			$this->mResult['room_number'] = $this->collectCharacters();
		}
		if($sElementName === 'Klassentyp') {
			$this->mResult['klassentyp'] = $this->collectCharacters();
		}
		if($sElementName === 'Unterrichtseinheit') {
			$this->mResult['teaching_unit'] = $this->collectCharacters();
		}
	}
}
