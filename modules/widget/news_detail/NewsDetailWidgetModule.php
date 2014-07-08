<?php
class NewsDetailWidgetModule extends PersistentWidgetModule {

	private $iNewsId = null;

	public function __construct($sSessionKey = null) {
		parent::__construct($sSessionKey);
	}

	public function getElementType() {
		return "form";
	}

	public function loadData() {
		$oNews = NewsQuery::create()->findPk($this->iNewsId);
		if($oNews === null) {
			return null;
		}

		$aResult = $oNews->toArray(BasePeer::TYPE_PHPNAME, false);
		$aResult['DateStart'] = $oNews->getDateStart('d.m.Y');
		$aResult['DateEnd'] = $oNews->getDateEnd('d.m.Y');
    $sBody = '';
		if(is_resource($oNews->getBody())) {
			$sBody = RichtextUtil::parseStorageForBackendOutput(stream_get_contents($oNews->getBody()))->render();
		}
		$aResult['Body'] = $sBody;
		unset($aResult['BodyShort']);
		return $aResult;
	}

	public function saveData($aData) {
		$oNews = NewsQuery::create()->findPk($this->iNewsId);
		if($oNews === null) {
			$oNews = new News();
		}
		$oNews->fromArray($aData, BasePeer::TYPE_FIELDNAME);
		$oNews->save();
	}

	public function setNewsId($iNewsId) {
		$this->iNewsId = $iNewsId;
	}
}