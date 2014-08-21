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
		$aResult['CreatedInfo'] = Util::formatCreatedInfo($oNews);
		$aResult['UpdatedInfo'] = Util::formatUpdatedInfo($oNews);

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
		$oNews->setIsInactive($aData['is_inactive']);
		$oNews->setDateStart($aData['date_start'] == null ? date('Y-m-d') : $aData['date_start']);
		$oNews->setDateEnd($aData['date_end'] == null ? null : $aData['date_end']);
		$oNews->setNewsTypeId($aData['news_type_id']);
		$oNews->setHeadline($aData['headline']);
		$oNews->setBody(RichtextUtil::parseInputFromEditorForStorage($aData['body']));
		$oNews->save();
		return $oNews->getId();
	}

	public function setNewsId($iNewsId) {
		$this->iNewsId = $iNewsId;
	}
}