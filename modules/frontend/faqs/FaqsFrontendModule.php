<?php
class FaqsFrontendModule extends FrontendModule {

	public $sFaqLanguageId = null;
	public $iSchoolSiteId = null;
	public $oPage;

	public static $DISPLAY_MODES = array('eltern-abc');

	const MODE_SELECT_KEY = 'display_mode';

	public function renderFrontend() {
		$this->oPage = FrontendManager::$CURRENT_PAGE;
		$aOptions = @unserialize($this->getData());
		if(!isset($aOptions[self::MODE_SELECT_KEY])) {
			return null;
		}
		switch($aOptions[self::MODE_SELECT_KEY]) {
			case 'eltern-abc': return $this->renderElternABC();
			default:
				return null;
		}
	}

	private function listQuery() {
		$oQuery = FrontendFAQQuery::create()->distinct()->filterByLanguage($this->sFaqLanguageId)->filterByIsAspirantInfo(true);
		if($this->iSchoolSiteId) {
			$oQuery->joinSchoolSite()->filterBySchoolSiteIdIncludingSiteType($this->iSchoolSiteId)->filterLocal($this->iSchoolSiteId);
		} else {
			$oQuery->filterBySchoolSiteId(null, Criteria::ISNULL);
		}
		return $oQuery;
	}

	public function renderElternABC() {
		$oTemplate = $this->constructTemplate('overview');
		$oItemPrototype = $this->constructTemplate('item');
		$aFaqs = $this->listQuery()->orderByRelevance()->orderByTitle()->find();
		$sFirstLetter=null;
		foreach($aFaqs as $oFaq) {
			$sFirst = strtoupper(substr($oFaq->getTitle(), 0, 1));
			$oItemTemplate = clone $oItemPrototype;
			if($sFirstLetter != $sFirst) {
				$sFirstLetter = $sFirst;
				$sLink = LinkUtil::Link($this->oPage->getLink())."#".$sFirstLetter;
				$oTemplate->replaceIdentifierMultiple('anchor_link', TagWriter::quickTag('a', array('href' => $sLink), $sFirstLetter));
				$oItemTemplate->replaceIdentifier('anchor', TagWriter::quickTag('span', array('id' => $sFirstLetter), $sFirstLetter));
			}

			$oItemTemplate->replaceIdentifier('title', $oFaq->getTitle());
			$oItemTemplate->replaceIdentifier('content', RichtextUtil::parseStorageForFrontendOutput($oFaq->getContent()));
			$oTemplate->replaceIdentifierMultiple('item', $oItemTemplate);
		}
		return $oTemplate;
	}
}