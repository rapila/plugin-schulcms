<?php
/**
 * @package modules.widget
 */
class TeamMemberDetailWidgetModule extends PersistentWidgetModule {

	private $iTeamMemberId = null;

	public function __construct($sWidgetId) {
		parent::__construct($sWidgetId);
		$iTeamMemberPortraitCategory = SchoolPeer::getDocumentCategoryConfig('team_member_portraits');
		if(DocumentCategoryQuery::create()->filterById($iTeamMemberPortraitCategory)->count() === 0) {
			throw new Exception("Error: school_settings config: externally_managed_document_categories > team_member_portraits ($iTeamMemberPortraitCategory) does not exist");
		}
		$this->setSetting('portrait_category_id', $iTeamMemberPortraitCategory);
	}
	
	public function setTeamMemberId($iTeamMemberId) {
		$this->iTeamMemberId = $iTeamMemberId;
	}
	
	public function teamMemberData() {
		$oTeamMember = TeamMemberPeer::retrieveByPK($this->iTeamMemberId);
		if($oTeamMember === null) {
			return array();
		}
		$aResult = $oTeamMember->toArray(BasePeer::TYPE_PHPNAME, false);
		$aResult['DateOfBirthFormatted'] = $oTeamMember->getDateOfBirthFormatted();
		$aResult['EmployedSinceFormatted'] = $oTeamMember->getEmployedSinceFormatted();
		if($oTeamMember->getUserRelatedByUserId()) {
			$aResult['EmailP'] = $oTeamMember->getUserRelatedByUserId()->getEmail();
		}
    $aResult['ClassTeacherInfo'] = $oTeamMember->getClassNames();
		return $aResult;
	}
	
	public function inviteUser() {
		$oTeamMember = TeamMemberPeer::retrieveByPK($this->iTeamMemberId);
		$oUser = $oTeamMember->getUserRelatedByUserId();
		$sEmail = $oUser->getEmail();
		$sPassword = PasswordHash::generatePassword();
		$oUser->setPassword($sPassword);
		$oUser->save();
		$oTemplate = $this->constructTemplate('e_mail_invite');
		$oTemplate->replaceIdentifier('first_name', $oTeamMember->getFirstName());
		$oTemplate->replaceIdentifier('last_name', $oTeamMember->getLastName());
		$oTemplate->replaceIdentifier('password', $sPassword);
		$oTemplate->replaceIdentifier('username', $oUser->getUsername());
		$oEmail = new EMail("Einladung ***REMOVED***-Website", $oTemplate);
		try {
			// $oEmail->addRecipient($sEmail);
			$oEmail->addRecipient('jm@rapi.la');
		} catch(Exception $e) {
			throw new LocalizedException('team_member.invite_email.error_message');
		}
		$oEmail->send();
	}
	
	public function saveData($aTeamMemberData) {
		$oTeamMember = TeamMemberPeer::retrieveByPK($this->iTeamMemberId);
		$oTeamMember->setPortraitId($aTeamMemberData['portrait_id']);
		return $oTeamMember->save();
	}
}