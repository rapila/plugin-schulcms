<?php
/**
 * @package modules.widget
 */
class TeamMemberListWidgetModule extends WidgetModule {

	private $oListWidget;
	public $oDelegateProxy;
	private $oIsActiveTeamMemberInputFilter;
	private $bIsActiveTeamMember;
	private $iFunctionGroupId;
	
	
	public function __construct() {
		$this->oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, "TeamMember", "full_name_inverted", "asc");
		$this->oListWidget->setDelegate($this->oDelegateProxy);
		$this->oIsActiveTeamMemberInputFilter = WidgetModule::getWidget('active_team_member_input', null, true);
		$this->oDelegateProxy->setIsActiveTeamMember(true);
		$this->iFunctionGroupId = CriteriaListWidgetDelegate::SELECT_ALL;
	}

	public function doWidget() {
		$aTagAttributes = array('class' => 'team_member_list');
		$oListTag = new TagWriter('table', $aTagAttributes);
		$this->oListWidget->setListTag($oListTag);
		return $this->oListWidget->doWidget();
	}
	
	public function getColumnIdentifiers() {
		return array('id', 'full_name_inverted', 'is_active_team_member', 'class_names', 'profession', 'has_portrait', 'age_and_date_of_birth');
	}
	
	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array('is_sortable' => true);
		switch($sColumnIdentifier) {
			case 'full_name_inverted':
				$aResult['heading'] = StringPeer::getString('wns.name');
				break;
			case 'profession':
				$aResult['heading'] = StringPeer::getString('wns.team_member.profession');
				break;
			case 'is_active_team_member':
        $aResult['heading'] = StringPeer::getString('wns.team_member.is_active');
				$aResult['heading_filter'] = array('active_team_member_input', $this->oIsActiveTeamMemberInputFilter->getSessionKey());
				$aResult['is_sortable'] = false;
				break;			
			case 'class_names':
				$aResult['heading'] = StringPeer::getString('wns.team_member.classes');
				$aResult['is_sortable'] = false;
				break;
			case 'has_portrait':
				$aResult['heading'] = StringPeer::getString('wns.team_member.has_portrait');
				$aResult['is_sortable'] = false;
				break;
			case 'employed_since_formatted':
				$aResult['heading'] = StringPeer::getString('wns.team_member.employed_since');
				break;
			case 'age_and_date_of_birth':
				$aResult['heading'] = StringPeer::getString('wns.team_member.age_and_date_of_birth');
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
			$oFunctionGroup = FunctionGroupPeer::retrieveByPK($this->iFunctionGroupId);
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