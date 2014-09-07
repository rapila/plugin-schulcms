<?php
class NewsDetailWidgetModule extends PersistentWidgetModule {

	private $iNewsId = null;

	public function __construct($sSessionKey = null) {
		parent::__construct($sSessionKey);

		$oRichtext = WidgetModule::getWidget('rich_text', null, null, 'news');
		$oRootPage = PageQuery::create()->findOneByTreeLeft(1);
		if($oRootPage) {
			$oRichtext->setTemplate($oRootPage->getTemplate());
		}
		$this->setSetting('richtext_session', $oRichtext->getSessionKey());
	}

	public function setNewsId($iNewsId) {
		$this->iNewsId = $iNewsId;
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
		$oNews->setIsActive($aData['is_active']);
		$oNews->setDateStart($aData['date_start'] == null ? date('Y-m-d') : $aData['date_start']);
		$oNews->setDateEnd($aData['date_end'] == null ? null : $aData['date_end']);
		$oNews->setNewsTypeId($aData['news_type_id']);
		$oNews->setHeadline($aData['headline']);

		$oRichtextUtil = new RichtextUtil();
		$oRichtextUtil->setTrackReferences($oNews);
		$oNews->setBodyAsTag($oRichtextUtil->getTagParser($aData['body']));

		$this->validate($aData, $oNews);
		if(!Flash::noErrors()) {
			throw new ValidationException();
		}
		$oNews->save();
		return $oNews->getId();
	}

	private function validate($aData, $oNews) {
		$oFlash = Flash::getFlash();
		$oFlash->setArrayToCheck($aData);
		$oFlash->checkForValue('headline', 'headline_required');
		$oFlash->checkForValue('news_type_id', 'news_type_required');
		if($aData['is_active']) {
			$oFlash->checkForValue('body', 'is_active_body_required');
		}
		$oFlash->finishReporting();
	}
}
