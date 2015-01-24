<?php
class FaqExportFileModule extends FileModule {

	private $iSchoolSiteId;
	private $sLanguageId;
	public function __construct($aRequestPath) {
		parent::__construct($aRequestPath);
		$this->iSchoolSiteId = @$_REQUEST['school_site_id'];
		$this->sLanguageId = @$_REQUEST['language_id'];
		header("Content-Type: application/json;charset=utf-8");
	}

	public function renderFile() {
		$aResult = array();
		foreach($this->listQuery()->find() as $oFAQ) {
			$aResult[$oFAQ->getId()] = $oFAQ->toArray();
			$aResult[$oFAQ->getId()]['tag'] = $oFAQ->getTagNames(false);
			$aResult[$oFAQ->getId()]['type'] = $oFAQ->getSchoolSiteTypeIds();
		}
		print json_encode($aResult);
	}

	private function listQuery() {
		$oQuery = FrontendFAQQuery::create()->filterByLanguage($this->sLanguageId)->distinct();
		if($this->iSchoolSiteId) {
			$oQuery->joinSchoolSite()->filterBySchoolSiteIdIncludingSiteType($this->iSchoolSiteId)->filterLocal($this->iSchoolSiteId);
		} else {
			$oQuery->filterBySchoolSiteId(null, Criteria::ISNULL);
		}
		return $oQuery;
	}
}