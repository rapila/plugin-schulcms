<?php
class TeamMembersPageTypeModule extends PageTypeModule {
	private $aFunctionGroupIds;

	public function __construct(Page $oPage = null, NavigationItem $oNavigationItem = null) {
		parent::__construct($oPage, $oNavigationItem);
		$this->oClassPage = PageQuery::create()->active()->filterByPageType('classes')->findOne();
		$this->aFunctionGroupIds = $this->oPage->getPagePropertyValue('team_members:function_group_ids', null);
	}

	public function display(Template $oTemplate, $bIsPreview = false) {
		if($this->oNavigationItem instanceof TeamMemberNavigationItem){
			$this->oTeamMember = $this->oNavigationItem->getTeamMember();
			$this->renderDetail($oTemplate);
		}
		$this->renderList($oTemplate);
	}

	private function renderList($oTemplate) {
		$oListTemplate = $this->constructTemplate('list');
		$oItemPrototype = $this->constructTemplate('list_item');
		foreach($this->listQuery()->find() as $oTeamMember) {
			$oItemTemplate = clone $oItemPrototype;
			$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($oTeamMember->getLink($this->oPage)));
			$oItemTemplate->replaceIdentifier('name', $oTeamMember->getFullNameInverted());
			$oItemTemplate->replaceIdentifier('detail_link_title', StringPeer::getString('wns.team_member.link_title_prefix').$oTeamMember->getFullName());
			$oItemTemplate->replaceIdentifier('first_function_name', $oTeamMember->getFirstTeamMemberFunctionName());

			$aClassTeachers = $oTeamMember->getIsClassTeacherClasses(true);
			if(count($aClassTeachers) > 0) {
				foreach($aClassTeachers as $i => $oClassTeacher) {
					if($i > 0) {
						$oItemTemplate->replaceIdentifierMultiple('school_class', ', ', null, Template::NO_NEWLINE);
					}
					$aLink = $oClassTeacher->getSchoolClass()->getLink($this->oClassPage);
					$oItemTemplate->replaceIdentifierMultiple('school_class', TagWriter::quickTag('a', array('title' => StringPeer::getString('wns.class.link_title_prefix').$oClassTeacher->getSchoolClass()->getName(), 'href' => LinkUtil::link($aLink)), $oClassTeacher->getSchoolClass()->getName()), null, Template::NO_NEWLINE);
				}
			} else {
				$oItemTemplate->replaceIdentifier('school_class', '-');
			}

			$oItemTemplate->replaceIdentifier('profession', $oTeamMember->getProfession());
			$oTemplate->replaceIdentifierMultiple('list_item', $oItemTemplate);
		}
		$oTemplate->replaceIdentifier('container', $oListTemplate, 'content');
		$oTemplate->replaceIdentifier('container_filled_types', 'faqs', 'content');
	}

	private function renderDetail($oTemplate) {

	}

	private function listQuery() {
		$oQuery = TeamMemberQuery::create()->excludeInactive();
		if($this->aFunctionGroupIds !== null) {
			$oQuery->filterByTeamMemberFunctionGroup($this->aFunctionGroupIds);
		}
		$oQuery->orderByLastName()->orderByFirstName();
		return $oQuery;
	}

	public function listFunctionGroups() {
		return WidgetJsonFileModule::jsonOrderedObject(FunctionGroupQuery::create()->orderByName()->select(array('Id', 'Name'))->find()->toKeyValue('Id', 'Name'));
	}

	public function saveTeamMembersPageConfiguration($aData) {
		$this->aFunctionGroupIds = $aData['function_group_ids'];
		$this->oPage->updatePageProperty('team_members:function_group_ids', $this->aFunctionGroupIds);
	}

	public function config() {
		return $this->aFunctionGroupIds;
	}
}