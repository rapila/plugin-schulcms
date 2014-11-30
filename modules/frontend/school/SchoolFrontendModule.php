<?php
/**
 * @package modules.frontend
 */

class SchoolFrontendModule extends FrontendModule {

	public static $DISPLAY_MODES = array('info_about_us', 'info_contact', 'info_office', 'info_management', 'signature_management', 'signature_office', 'signature_maintenance', 'schul_statistik');

	const MODE_SELECT_KEY = 'display_mode';

	public function renderFrontend() {
		$aOptions = @unserialize($this->getData());
		if(!isset($aOptions[self::MODE_SELECT_KEY])) {
			return null;
		}
		switch($aOptions[self::MODE_SELECT_KEY]) {
			case 'schul_statistik': return $this->renderSchulStatistik();
			case 'info_about_us': return $this->renderInfoAboutUs();
			case 'info_contact': return $this->renderInfoContact();
			case 'info_office': return $this->renderInfoOffice();
			case 'signature_management': return $this->renderSignatureManagement();
			case 'signature_office': return $this->renderSignatureOffice();
			case 'signature_maintenance': return $this->renderSignatureMaintenance();
			default:
				return null;
		}
	}
	/**
	* renderSchulStatistik()
	* override this content for single school sites
	* • add template with the same path into the site directory site/modules/frontend/school/templates/statistics.tmpl
	* • replace strings by static string added in lang dir in site or by using the strings admin module
	*/
	public function renderSchulStatistik() {
		$oTemplate = $this->constructTemplate('statistics');
		$iStudentCount = ClassStudentQuery::create()->filterBySchoolYear()->count();
		if($iStudentCount != null) {
			$oTemplate->replaceIdentifier('students_info', StringPeer::getString('statistics.students_count_info', null, null, array('count' => $iStudentCount)));
		}
		$iClassesCount = SchoolClassQuery::create()->filterByClassTypeYearAndSchool()->count();
		if($iClassesCount != null) {
			$oTemplate->replaceIdentifier('classes_info', StringPeer::getString('statistics.classes_count_info', null, null, array('count' => $iClassesCount)));
		}
		$iTeachersCount = ClassTeacherQuery::create()->filterByYear(SchoolPeer::getCurrentYear())->count();
		if($iTeachersCount != null) {
			$oTemplate->replaceIdentifier('teachers_info', StringPeer::getString('statistics.teachers_count_info', null, null, array('count' => $iTeachersCount)));
		}
		$iOtherTeamCount = SchoolFunctionQuery::create()->filterByNonTeachingFunctionGroups()->count();
		if($iOtherTeamCount != null) {
			$oTemplate->replaceIdentifier('other_team_info', StringPeer::getString('statistics.other_team_count_info', null, null, array('count' => $iOtherTeamCount)));
		}
		return $oTemplate;
	}

	public function renderInfoAboutUs() {
		$oTemplate = $this->constructTemplate('about_us_context');
		$oSchoolSite = SchoolSiteQuery::currentSchoolSite();
		$oImage = DocumentQuery::create()->filterByName('schulhaus_ueber_uns')->findOne();
		if($oImage) {
			$oImageTag = TagWriter::quickTag('img', array('src' => $oImage->getDisplayUrl(array('max_width' => 400)), 'alt' => $oSchoolSite ? $oSchoolSite->getName() : "Bild Schule"));
			$oTemplate->replaceIdentifier('image', $oImageTag);
		}
		if($oSchoolSite) {
			$oTemplate->replaceIdentifier('school_name', $oSchoolSite->getName());
			$oTemplate->replaceIdentifier('address', implode('<br />', $oSchoolSite->getAddressInfoArray()), null, Template::NO_HTML_ESCAPE);
		}
		return $oTemplate;
	}

	public function renderInfoOffice() {
		$oTemplate = $this->constructTemplate('about_us_context');
		$oSchoolSite = SchoolSiteQuery::currentSchoolSite();
		$oImage = DocumentQuery::create()->filterByName('schulhaus_ueber_uns')->findOne();
		if($oImage) {
			$oImageTag = TagWriter::quickTag('img', array('src' => $oImage->getDisplayUrl(array('max_width' => 400)), 'alt' => $oSchoolSite ? $oSchoolSite->getName() : "Bild Schule"));
			$oTemplate->replaceIdentifier('image', $oImageTag);
		}
		if($oSchoolSite) {
			$oTemplate->replaceIdentifier('school_name', $oSchoolSite->getName());
			$oTemplate->replaceIdentifier('address', implode('<br />', $oSchoolSite->getAddressInfoArray()), null, Template::NO_HTML_ESCAPE);
		}
		return $oTemplate;
	}

	public function renderInfoManagement() {
		$oTemplate = $this->constructTemplate('about_us_context');
		$oSchoolSite = SchoolSiteQuery::currentSchoolSite();
		$oImage = DocumentQuery::create()->filterByName('schulhaus_ueber_uns')->findOne();
		if($oImage) {
			$oImageTag = TagWriter::quickTag('img', array('src' => $oImage->getDisplayUrl(array('max_width' => 400)), 'alt' => $oSchoolSite ? $oSchoolSite->getName() : "Bild Schule"));
			$oTemplate->replaceIdentifier('image', $oImageTag);
		}
		if($oSchoolSite) {
			$oTemplate->replaceIdentifier('school_name', $oSchoolSite->getName());
			$oTemplate->replaceIdentifier('address', implode('<br />', $oSchoolSite->getAddressInfoArray()), null, Template::NO_HTML_ESCAPE);
		}
		return $oTemplate;
	}

	public function renderSignatureOffice() {
		$oTemplate = $this->constructTemplate('signature');
		$aPersons = self::getTeamMembersByFunctionGroupName('Sekretariate');
		Util::dumpAll($aPersons);
		$bPlural = count($aPersons) > 1;
		// add signature like "Ihr Schulleiter, etc Ihre SchulleiterInnen" ?
		$this->renderSignature($aPersons, $oTemplate);
		return $oTemplate;
	}

	public function renderSignatureManagement() {
		$oTemplate = $this->constructTemplate('signature');
		$aPersons = self::getTeamMembersByFunctionGroupName('Schulleitung');
		$bPlural = count($aPersons) > 1;
		// add signature like "Ihr Schulleiter, etc Ihre SchulleiterInnen" ?
		$this->renderSignature($aPersons, $oTemplate);
		return $oTemplate;
	}

	public function renderSignatureMaintenance() {
		$oTemplate = $this->constructTemplate('signature');
		$aPersons = self::getTeamMembersByFunctionGroupName('Hauswartung');
		$bPlural = count($aPersons) > 1;
		// add signature like "Ihr Hauswart(e)" ?
		$this->renderSignature($aPersons, $oTemplate);
		return $oTemplate;
	}

	private static function getTeamMembersByFunctionGroupName($sName) {
		$oFunctionGroup = FunctionGroupQuery::create()->filterByName($sName)->findOne();
		if($oFunctionGroup) {
			return TeamMemberQuery::create()->filterByTeamMemberFunctionGroup($oFunctionGroup)->find();
		}
		return array();
	}

	private function renderSignature($aTeamMembers, $oTemplate) {
		if(count($aTeamMembers) === 0) {
			return;
		}
		$sMaxWidth = '200';
		$oPortraitPrototype = $this->constructTemplate('signature_portrait');
		foreach($aTeamMembers as $oTeamMember) {
			$oPortraitTemplate = clone $oPortraitPrototype;
			$oPortraitTemplate->replaceIdentifier('name', $oTeamMember->getFullName());
			if($oImage = $oTeamMember->getDocument()) {
				$oImage = TagWriter::quickTag('img', array('src' => $oImage->getDisplayUrl(array('max_width' => $iWidth)), 'alt' => 'Portrait von '.$oTeamMember->getFullName()));
				$oPortraitTemplate->replaceIdentifier('image', $oImage);
			}
			$oTemplate->replaceIdentifierMultiple('portraits', $oPortraitTemplate);
		}
	}

	public function renderInfoContact() {
		$oTemplate = $this->constructTemplate('contact_context');
		return $oTemplate;
	}
}
