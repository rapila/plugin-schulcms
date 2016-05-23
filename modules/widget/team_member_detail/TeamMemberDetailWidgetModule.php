<?php
/**
 * @package modules.widget
 */
class TeamMemberDetailWidgetModule extends PersistentWidgetModule {

	private $iTeamMemberId = null;

	public function __construct($sWidgetId) {
		parent::__construct($sWidgetId);

		// Set / create document category for the portraits to be saved with
		$sPortraitCategory = Settings::getSetting('externally_managed_categories', 'team_member_portrait', "Team Member Portrait");
		$iPortraitCategoryId = DocumentCategoryQuery::create()->select('Id')->findOneByName($sPortraitCategory);
		if($iPortraitCategoryId === null) {
			$oDocumentCategory = new DocumentCategory();
			$oDocumentCategory->setName($sPortraitCategory)->setIsExternallyManaged(true)->save();
			$iPortraitCategoryId = $oDocumentCategory->getId();
		}
		$this->setSetting('portrait_category_id', $iPortraitCategoryId);
	}

	public function setTeamMemberId($iTeamMemberId) {
		$this->iTeamMemberId = $iTeamMemberId;
	}

	public function teamMemberData() {
		$oTeamMember = TeamMemberQuery::create()->findPk($this->iTeamMemberId);
		if($oTeamMember === null) {
			return array();
		}
		$aResult = $oTeamMember->toArray(BasePeer::TYPE_PHPNAME, false);
		$aResult['DateOfBirthFormatted'] = $oTeamMember->getDateOfBirthFormatted();
		$aResult['EmployedSinceFormatted'] = $oTeamMember->getEmployedSinceFormatted();
		$aResult['UpdatedInfo'] = Util::formatUpdatedInfo($oTeamMember);
		if($oTeamMember->getUserRelatedByUserId()) {
			$aResult['EmailP'] = $oTeamMember->getUserRelatedByUserId()->getEmail();
		}
    $aResult['ClassTeacherInfo'] = $oTeamMember->getClassNames();
		return $aResult;
	}

	public function inviteUser() {
		$oTeamMember = TeamMemberQuery::create()->findPk($this->iTeamMemberId);
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
		$oEmail = new EMail(StringPeer::getString('team_member.admin_invite'), $oTemplate);
		try {
			$oEmail->addRecipient($sEmail);
		} catch(Exception $e) {
			throw new LocalizedException('team_member.invite_email.error_message');
		}
		$oEmail->send();
	}

	public function saveData($aTeamMemberData) {
		$oTeamMember = TeamMemberQuery::create()->findPk($this->iTeamMemberId);
		if($aTeamMemberData['portrait_id'] == null && $oTeamMember->getDocument()) {
			$oTeamMember->getDocument()->delete();
		}
		$oTeamMember->setPortraitId($aTeamMemberData['portrait_id']);
		return $oTeamMember->save();
	}
}
