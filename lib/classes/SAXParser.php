<?php

require_once('HTTP/Request2.php');

abstract class SAXParser {
	private $rParser;
	private $sParameters;
	private $sCurrentCharacterData;
	
	protected static $CACHED_RESULTS = array();
	
	protected $mResult;
	
	protected static $URL;
	
	public function __construct($aParameters = array(), $sCharset = 'utf-8') {
		ksort($aParameters);
		$this->sParameters = LinkUtil::prepareLinkParameters($aParameters);
		
		$this->sCurrentCharacterData = null;
		$this->rParser = xml_parser_create($sCharset);
		$this->setOption(XML_OPTION_CASE_FOLDING, 0);
		xml_set_object($this->rParser, $this);
		xml_set_element_handler($this->rParser, 'handleElement', 'handleElementEnd');
		xml_set_character_data_handler($this->rParser, 'handleCharacters');
		$this->mResult = null;
	}
	
	private function setOption($iOption, $mValue) {
		xml_parser_set_option($this->rParser, $iOption, $mValue);
	}
	
	public function parse() {
		if(!isset(static::$CACHED_RESULTS[$this->sParameters])) {
			$this->prepare();
			xml_parse($this->rParser, $this->getUrlContents(), true);
			static::$CACHED_RESULTS[$this->sParameters] = $this->mResult;
		}
		return static::$CACHED_RESULTS[$this->sParameters];
	}
	
	public function handleElement($rParser, $sElementName, $aAttributes) {
		$this->gotElement($sElementName, $aAttributes);
	}
	
	public function handleElementEnd($rParser, $sElementName) {
		$this->endedElement($sElementName);
	}
	
	public function handleCharacters($rParser, $sCharacters) {
		if($this->sCurrentCharacterData !== null) {
			$this->sCurrentCharacterData .= $sCharacters;
		}
		$this->characters($sCharacters);
	}
	
	protected function expectCharacters() {
		$this->sCurrentCharacterData = '';
	}
	
	protected function collectCharacters() {
		$sResult = $this->sCurrentCharacterData;
		$this->sCurrentCharacterData = null;
		return $sResult;
	}
	
	protected abstract function gotElement($sElementName, $aAttributes);
	protected abstract function endedElement($sElementName);
	
	protected function characters($sCharacters) {
		// Do nothing
	}
	
	protected function prepare() {
		$this->mResult = array();
	}
	
	private function getUrlContents() {
		$sUrl = static::$URL.$this->sParameters;
		$oRequest = new HTTP_Request2($sUrl, HTTP_Request2::METHOD_GET);
		$oRequest->setAdapter('HTTP_Request2_Adapter_Curl');
		$oResponse = $oRequest->send();
		return $oResponse->getBody();
	}
}