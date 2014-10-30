<?php
class SchoolSiteExportFileModule extends FileModule {

	public function __construct($aRequestPath) {
		parent::__construct($aRequestPath);
	}

	public function renderFile() {
		try {
			header('Content-Type: application/json;charset=utf-8');
			$aResult = $this->getSchoolSiteInfo();
			print json_encode($aResult);
		} catch (Exception $ex) {
			LinkUtil::sendHTTPStatusCode(404, 'Not Found');
			ErrorHandler::handleException($ex);
		}
	}

	private function getSchoolSiteInfo() {
		$aResult = array();
	}

}