<?php
class TeamMembersPageTypeModule extends PageTypeModule {
	private $aFunctionGroupIds;

	public function __construct(Page $oPage = null, NavigationItem $oNavigationItem = null) {
		parent::__construct($oPage, $oNavigationItem);
		if(Settings::getSetting("frontend", "protect_email_addresses", false)) {
			ResourceIncluder::defaultIncluder()->addResource('e-mail-defuscate.js');
		}
		$this->oClassPage = PageQuery::create()->active()->filterByPageType('classes')->findOne();
		$this->aFunctionGroupIds = explode(',', $this->oPage->getPagePropertyValue('team_members:function_group_ids', ''));
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
		$oListTemplate->replaceIdentifier('team_member_news', $this->includeTeamMemberNews());
		$oItemPrototype = $this->constructTemplate('list_item');
		foreach($this->listQuery()->find() as $oTeamMember) {
			$oItemTemplate = clone $oItemPrototype;
			$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($oTeamMember->getLink($this->oPage)));
			$oItemTemplate->replaceIdentifier('name', $oTeamMember->getFullNameInverted());
			$oItemTemplate->replaceIdentifier('email', TagWriter::getEmailLinkWriter($oTeamMember->getEmailG()), null, Template::NO_HTML_ESCAPE);
			$oItemTemplate->replaceIdentifier('detail_link_title', StringPeer::getString('wns.team_member.link_title_prefix').$oTeamMember->getFullName());
			$oItemTemplate->replaceIdentifier('first_function_name', $oTeamMember->getFirstTeamMemberFunctionName());

			$aClassTeachers = $oTeamMember->getIsClassTeacherClasses(true);
			if(count($aClassTeachers) > 0) {
				foreach($aClassTeachers as $i => $oClassTeacher) {
					if($i > 0) {
						$oItemTemplate->replaceIdentifierMultiple('school_class', ', ', null, Template::NO_NEWLINE);
					}
					$aLink = $oClassTeacher->getSchoolClass()->getLink($this->oClassPage);
					if($aLink === null) {
						$oLink = $oClassTeacher->getSchoolClass()->getName();
					} else {
						$oLink = TagWriter::quickTag('a', array('title' => StringPeer::getString('wns.class.link_title_prefix').$oClassTeacher->getSchoolClass()->getName(), 'href' => LinkUtil::link($aLink)), $oClassTeacher->getSchoolClass()->getName());
					}
					// display only class links with active classes
					$oItemTemplate->replaceIdentifierMultiple('school_class', $oLink, null, Template::NO_NEWLINE);
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
		$aClassTeachers = $this->oTeamMember->getClassTeacherClasses(true);
		if(count($aClassTeachers) > 0) {
			$bIsClassTeacher = null;
			foreach($aClassTeachers as $oClassTeacher) {
				if($oClassTeacher->getIsClassTeacher() !== $bIsClassTeacher) {
					$bIsClassTeacher = $oClassTeacher->getIsClassTeacher();
					if($oClassTeacher->getIsClassTeacher()) {
						$oDetailTemplate->replaceIdentifier('class_teacher', $this->oTeamMember->getClassTeacherTitle(). ' von: ');
					}
				}
				$oItemTemplate = $this->constructTemplate('class_item');
				$oItemTemplate->replaceIdentifier('class_link', TagWriter::quickTag('a', array('href'=> LinkUtil::link($oClassTeacher->getSchoolClass()->getLink())), $oClassTeacher->getSchoolClass()->getFullClassName()));
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

		$oContextTemplate = $this->constructTemplate('detail_context');
		if($this->oTeamMember->getEmailG()) {
			$oContextTemplate->replaceIdentifier('email_link', TagWriter::getEmailLinkWriter($this->oTeamMember->getEmailG(), "E-Mail senden"), null, Template::NO_HTML_ESCAPE);
		}

		$oTemplate->replaceIdentifier('container', $oDetailTemplate, 'content');
		$oTemplate->replaceIdentifier('container_filled_types', 'team_members', 'content');
		$oTemplate->replaceIdentifier('container', $oContextTemplate, 'context');
		$oTemplate->replaceIdentifier('container_filled_types', 'team_members', 'context');
	}

	public function listQuery() {
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
		$this->oPage->updatePageProperty('team_members:function_group_ids', implode(',', array_filter($this->aFunctionGroupIds)));
	}

	public function config() {
		return $this->aFunctionGroupIds;
	}

	private function includeTeamMemberNews() {
		$oNews = FrontendNewsQuery::create()->findLatestByNewsTypeName(NewsType::NAME_TEAM_MEMBERS);
		if($oNews) {
			$oTemplate = $this->constructTemplate('news');
			$oNews->renderItem($oTemplate);
			return $oTemplate;
		}
	}
}
