<?php
require_once PLUGINS_DIR.'/schulcms/modules/page_type/team_members/TeamMemberNavigationItem.php';

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
		foreach(self::listQuery($this->aFunctionGroupIds)->find() as $oTeamMember) {
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
			$oListTemplate->replaceIdentifierMultiple('items', $oItemTemplate);
		}
		$oTemplate->replaceIdentifier('container', $oListTemplate, 'content');
		$oTemplate->replaceIdentifier('container_filled_types', 'team_members', 'content');
	}

	private function renderDetail($oTemplate) {
		if(!$this->oTeamMember) {
			return null;
		}
		$oDetailTemplate = $this->constructTemplate('detail');
		$oDetailTemplate->replaceIdentifier('full_name_inverted', $this->oTeamMember->getFullName());
		if($oPortrait = $this->oTeamMember->getDocument()) {
			$oDetailTemplate->replaceIdentifier('portrait_display_url', $oPortrait->getDisplayUrl(array('max_width' => 194)));
			$oDetailTemplate->replaceIdentifier('portrait_alt', "Portrait von ". $this->oTeamMember->getFullName());
		}
		if($this->oTeamMember->getProfession() != null) {
			$oDetailTemplate->replaceIdentifier('profession', $this->oTeamMember->getProfession());
		}
		//Add is_class_teacher classes with links
		$aSchoolClasses = $this->oTeamMember->getClassTeacherClasses(true);
		if(count($aSchoolClasses) > 0) {
			$bIsClassTeacher = null;
			foreach($aSchoolClasses as $oSchoolClass) {
				if($oSchoolClass->getIsClassTeacher() !== $bIsClassTeacher) {
					$bIsClassTeacher = $oSchoolClass->getIsClassTeacher();
					if($oSchoolClass->getIsClassTeacher()) {
						$oDetailTemplate->replaceIdentifier('class_teacher', $this->oTeamMember->getClassTeacherTitle(). ' von: ');
					}
				}
				$oItemTemplate = $this->constructTemplate('class_item');
				$oItemTemplate->replaceIdentifier('class_link', TagWriter::quickTag('a', array('href'=> LinkUtil::link($oSchoolClass->getLink())), $oSchoolClass->getSchoolClass()->getFullClassName()));
				$oDetailTemplate->replaceIdentifierMultiple('klassenlehrer_info', $oItemTemplate, null, Template::NO_NEW_CONTEXT);
			}
		}
		//Add functions
		$aTeamMemberFunctions = $this->oTeamMember->getTeamMemberFunctions();
		if(count($aTeamMemberFunctions) > 0) {
			foreach($aTeamMemberFunctions as $oTeamMemberFunction) {
				$oItemTemplate = $this->constructTemplate('function_item');
				$oItemTemplate->replaceIdentifier('function_name', $oTeamMemberFunction->getSchoolFunction()->getTitle());
				$oDetailTemplate->replaceIdentifierMultiple('functions', $oItemTemplate, null, Template::NO_NEW_CONTEXT);
			}
		}
		$oTemplate->replaceIdentifier('container', $oDetailTemplate, 'content');
		$oTemplate->replaceIdentifier('container_filled_types', 'team_members', 'content');
	}

	private static function listQuery($aFunctionGroupIds) {
		$oQuery = TeamMemberQuery::create()->excludeInactive();
		if($aFunctionGroupIds !== null) {
			$oQuery->filterByTeamMemberFunctionGroup($aFunctionGroupIds);
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