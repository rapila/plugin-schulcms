<?php
/**
 * @package modules.widget
 */
class TeamMemberListWidgetModule extends SpecializedListWidgetModule {

	public $oDelegateProxy;
	private $oIsActiveTeamMemberInputFilter;
	private $bIsActiveTeamMember;
	private $iFunctionGroupId;

	protected function createListWidget() {
		$oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, "TeamMember", "full_name_inverted", "asc");
		$oListWidget->setDelegate($this->oDelegateProxy);
		$bTeachersOnly = false;
		$this->oIsActiveTeamMemberInputFilter = WidgetModule::getWidget('active_team_member_input', null, $bTeachersOnly);
		$this->oDelegateProxy->setIsActiveTeamMember($bTeachersOnly);
		$this->iFunctionGroupId = CriteriaListWidgetDelegate::SELECT_ALL;
		return $oListWidget;
	}

	public function getColumnIdentifiers() {
		return array('id', 'full_name_inverted', 'is_active_team_member', 'class_names', 'profession', 'has_portrait', 'age_and_date_of_birth');
	}

	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array('is_sortable' => true);
		switch($sColumnIdentifier) {
			case 'full_name_inverted':
				$aResult['heading'] = TranslationPeer::getString('wns.name');
				break;
			case 'profession':
				$aResult['heading'] = TranslationPeer::getString('wns.team_member.profession');
				break;
			case 'is_active_team_member':
        $aResult['heading'] = TranslationPeer::getString('wns.team_member.is_active');
				$aResult['heading_filter'] = array('active_team_member_input', $this->oIsActiveTeamMemberInputFilter->getSessionKey());
				$aResult['is_sortable'] = false;
				break;
			case 'class_names':
				$aResult['heading'] = TranslationPeer::getString('wns.team_member.classes');
				$aResult['is_sortable'] = false;
				break;
			case 'has_portrait':
				$aResult['heading'] = TranslationPeer::getString('wns.team_member.has_portrait');
				$aResult['is_sortable'] = false;
				break;
			case 'employed_since_formatted':
				$aResult['heading'] = TranslationPeer::getString('wns.team_member.employed_since');
				break;
			case 'age_and_date_of_birth':
				$aResult['heading'] = TranslationPeer::getString('wns.team_member.age_and_date_of_birth');
				break;
		}
		return $aResult;
	}

	public function getDatabaseColumnForColumn($sColumnIdentifier) {
		if($sColumnIdentifier === 'full_name_inverted') {
			return TeamMemberPeer::LAST_NAME;
		}
		if($sColumnIdentifier === 'age_and_date_of_birth') {
			return TeamMemberPeer::DATE_OF_BIRTH;
		}
		if($sColumnIdentifier === 'employed_since_formatted') {
			return TeamMemberPeer::EMPLOYED_SINCE;
		}
		return null;
	}

	public function setIsActiveTeamMember($bIsActiveTeamMember) {
	  $this->bIsActiveTeamMember = $bIsActiveTeamMember;
	}

	public function getFunctionGroupId() {
	  return $this->iFunctionGroupId;
	}

	public function setFunctionGroupId($iFunctionGroupId) {
	  $this->iFunctionGroupId = $iFunctionGroupId;
	}

	public function getFunctionGroupName() {
		if($this->iFunctionGroupId !== CriteriaListWidgetDelegate::SELECT_ALL) {
			$oFunctionGroup = FunctionGroupQuery::create()->findPk($this->iFunctionGroupId);
			if($oFunctionGroup) {
				return $oFunctionGroup->getName();
			}
		}
		return $this->iFunctionGroupId;
	}

	public function getCriteria() {
		$oCriteria = TeamMemberQuery::create();
		if($this->bIsActiveTeamMember) {
			$oCriteria->excludeInactive();
		}
		if($this->iFunctionGroupId !== CriteriaListWidgetDelegate::SELECT_ALL) {
			$oCriteria->filterByTeamMemberFunctionGroup($this->iFunctionGroupId);
		}
		return $oCriteria;
	}
}
