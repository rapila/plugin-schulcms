<?php
class TeamMembersPageTypeModule extends PageTypeModule {
	private $aFunctionGroupIds;
	private static $SCHOOLSITES;

	public function __construct(Page $oPage = null, NavigationItem $oNavigationItem = null) {
		parent::__construct($oPage, $oNavigationItem);
		if(Settings::getSetting("frontend", "protect_email_addresses", false)) {
			ResourceIncluder::defaultIncluder()->addResource('e-mail-defuscate.js');
		}
		$this->oClassPage = PageQuery::create()->active()->filterByPageType('classes')->findOne();
		$this->aFunctionGroupIds = explode(',', $this->oPage->getPagePropertyValue('team_members:function_group_ids', ''));
		$this->bRequiresFilter = is_array($this->aFunctionGroupIds) && count($this->aFunctionGroupIds) > 1;
	}

	public function display(Template $oTemplate, $bIsPreview = false) {
		$oCache = new Cache('team-members/'.Session::language().'/'.$this->oNavigationItem->getId(), 'full_page');
		if($oCache->entryExists() && !$oCache->isOlderThan($this->oPage) && !$oCache->isOlderThan($this->listQuery(false))) {
			$oInnerTemplate = $oCache->getContentsAsVariable();
		} else {
			$oInnerTemplate = $this->displayUncached($bIsPreview);
			$oCache->setContents($oInnerTemplate);
		}
		$oTemplate->replaceIdentifier('container', $oInnerTemplate, 'content');
		$oTemplate->replaceIdentifier('container_filled_types', 'team_members', 'content');
	}

	public function displayUncached($bIsPreview = false) {
		if($this->oNavigationItem instanceof TeamMemberNavigationItem){
			$this->oTeamMember = $this->oNavigationItem->getTeamMember();
			return $this->renderDetail();
		}
		if(SchoolSiteQuery::currentSchoolSite()->isPortalSite()) {
			return $this->renderPortalList();
		}
		return $this->renderList();
	}

	private function renderPortalList() {
		$oListTemplate = $this->constructTemplate('list_portal');
		$oItemPrototype = $this->constructTemplate('list_portal_item');
		if(!$oListTemplate->hasIdentifier('filters')) {
			$this->bRequiresFilter = false;
		}
		$aFunctionGroups = array();
		foreach($this->listQuery(false)->find() as $oTeamMember) {
			$aMainSchoolInfo = $this->getMainSchool($oTeamMember);
			if(!is_array($aMainSchoolInfo)) {
				continue;
			}
			list($oSchool, $oFunction) = $aMainSchoolInfo;
			$oSchoolSite = SchoolSiteQuery::siteBySchool($oSchool);
			if(!$oSchoolSite) {
				ErrorHandler::handleException(new Exception("No school site found for school with id "+$oSchool->getId()), true);
				continue;
			}
			//prepare function group filter
			if($this->bRequiresFilter && !isset($aFunctionGroups[$oFunction->getSchoolFunction()->getFunctionGroup()->getSlug()])) {
				$aFunctionGroups[$oFunction->getSchoolFunction()->getFunctionGroup()->getSlug()] = $oFunction->getSchoolFunction()->getFunctionGroup()->getName();
			}
			$oItemTemplate = clone $oItemPrototype;
			$oItemTemplate->replaceIdentifier('first_function_name', $oFunction->getSchoolFunction()->getTitle());
			$sUrl = WettingenSettingQuery::url($oSchoolSite);
			$oItemTemplate->replaceIdentifier('school_site', $oSchool->getSchoolUnit());
			$oItemTemplate->replaceIdentifier('school_site_link', $sUrl);
			$oItemTemplate->replaceIdentifier('detail_link', $sUrl.'get_file/team_member/'.$oTeamMember->getOriginalId());
			$oItemTemplate->replaceIdentifier('name', $oTeamMember->getFullNameInverted());
			$oItemTemplate->replaceIdentifier('id', $oTeamMember->getId());
			$oItemTemplate->replaceIdentifier('function_group_key', $oFunction->getSchoolFunction()->getFunctionGroup()->getSlug());
			$oListTemplate->replaceIdentifierMultiple('items', $oItemTemplate);
		}
		$this->renderFilter($oListTemplate, $aFunctionGroups);
		return $oListTemplate;
	}

	private function renderList() {
		$oListTemplate = $this->constructTemplate('list');
		$oListTemplate->replaceIdentifier('team_member_news', $this->includeTeamMemberNews());
		if(!$oListTemplate->hasIdentifier('filters')) {
			$this->bRequiresFilter = false;
		}
		$oListTemplate->replaceIdentifier('title', FrontendManager::$CURRENT_NAVIGATION_ITEM->getTitle());
		$oItemPrototype = $this->constructTemplate('list_item');
		$aFunctionGroups = array();
		foreach($this->listQuery()->find() as $oTeamMember) {
			$oItemTemplate = clone $oItemPrototype;
			$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($oTeamMember->getLink($this->oPage)));
			$oItemTemplate->replaceIdentifier('name', $oTeamMember->getFullNameInverted());
			$oItemTemplate->replaceIdentifier('id', $oTeamMember->getId());
			$oItemTemplate->replaceIdentifier('email', TagWriter::getEmailLinkWriter($oTeamMember->getEmailG()), null, Template::NO_HTML_ESCAPE);
			$oItemTemplate->replaceIdentifier('detail_link_title', StringPeer::getString('wns.team_member.link_title_prefix').$oTeamMember->getFullName());
			$sMainSchoolFunction = $oTeamMember->getFirstTeamMemberFunctionName(false);
			if($sMainSchoolFunction) {
				$oItemTemplate->replaceIdentifier('first_function_name', $sMainSchoolFunction->getTitle());
				$oItemTemplate->replaceIdentifier('function_group_key', $sMainSchoolFunction->getFunctionGroup()->getSlug());
				//prepare function group filter
				if($this->bRequiresFilter && !isset($aFunctionGroups[$sMainSchoolFunction->getFunctionGroup()->getSlug()])) {
					$aFunctionGroups[$sMainSchoolFunction->getFunctionGroup()->getSlug()] = $sMainSchoolFunction->getFunctionGroup()->getName();
				}
			}
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
		$this->renderFilter($oListTemplate, $aFunctionGroups);
		return $oListTemplate;
	}

	private function getMainSchool($oTeamMember) {
		foreach($oTeamMember->getTeamMemberFunctionsJoinSchoolFunction(TeamMember::getTeamMemberFunctionsCriteria()) as $oFunction) {
			$oSchool = $oFunction->getSchoolFunction()->getSchool();
			if($oSchool) {
				return array($oSchool, $oFunction);
			}
		}
		return null;
	}

	private function renderFilter($oTemplate, $aFunctionGroups) {
		// Implement function group filter if it's included in the template and options are given
		if($oTemplate->hasIdentifier('filters') && count($aFunctionGroups) > 1) {
			$oOptionPrototype = $this->constructTemplate('filter_option');
			$oItemTemplate = clone $oOptionPrototype;
			$oItemTemplate->replaceIdentifier('id', '');
			$oItemTemplate->replaceIdentifier('name', StringPeer::getString('team_member.filter.function_group.default'));
			$oTemplate->replaceIdentifierMultiple('filters', $oItemTemplate, null, Template::NO_NEWLINE|Template::NO_NEW_CONTEXT);

			foreach($aFunctionGroups as $sKey => $sName) {
				$oItemTemplate = clone $oOptionPrototype;
				$oItemTemplate->replaceIdentifier('id', $sKey);
				$oItemTemplate->replaceIdentifier('name', $sName);
				$oTemplate->replaceIdentifierMultiple('filters', $oItemTemplate, null, Template::NO_NEWLINE|Template::NO_NEW_CONTEXT);
			}
		}
	}

	private function renderDetail() {
		if(!$this->oTeamMember) {
			return null;
		}
		$oDetailTemplate = $this->constructTemplate('detail');
		$oDetailTemplate->replaceIdentifier('title', FrontendManager::$CURRENT_NAVIGATION_ITEM->getTitle());
		$oDetailTemplate->replaceIdentifier('full_name_inverted', $this->oTeamMember->getFullName());
		$oDetailTemplate->replaceIdentifier('fallback_url', LinkUtil::link($this->oPage->getLink()));

		if($this->oTeamMember->getProfession() != null) {
			$oDetailTemplate->replaceIdentifier('profession', $this->oTeamMember->getProfession());
		}
		$oDetailTemplate->replaceIdentifier('email', $this->renderEmail(), null, Template::NO_HTML_ESCAPE);
		$this->renderFunctions($oDetailTemplate);
		$this->renderClasses($oDetailTemplate);
		$this->renderPortrait($oDetailTemplate);

		return $oDetailTemplate;
	}

	private function renderFunctions($oTemplate) {
		$aTeamMemberFunctions = $this->oTeamMember->getTeamMemberFunctions();
		if(count($aTeamMemberFunctions) > 0) {
			foreach($aTeamMemberFunctions as $oTeamMemberFunction) {
				$oItemTemplate = $this->constructTemplate('function_item');
				$oItemTemplate->replaceIdentifier('function_name', $oTeamMemberFunction->getSchoolFunction()->getTitle());
				$oTemplate->replaceIdentifierMultiple('functions', $oItemTemplate, null, Template::NO_NEW_CONTEXT);
			}
		}
	}

	private function renderClasses($oTemplate) {
		$aSchoolClasses = $this->oTeamMember->getClassTeacherClasses(true);
		if(count($aSchoolClasses) > 0) {
			$oItemPrototype = $this->constructTemplate('class_item');
			$bChange = null;
			foreach($aSchoolClasses as $oSchoolClass) {
				if($oSchoolClass->getIsClassTeacher() !== $bChange) {
					$bChange = $oSchoolClass->getIsClassTeacher();
					if($oSchoolClass->getIsClassTeacher()) {
						$oTemplate->replaceIdentifier('class_teacher', $this->oTeamMember->getClassTeacherTitle(). ' von: ');
					}
				}
				$oItemTemplate = clone $oItemPrototype;
				if($this->oClassPage) {
					$oItemTemplate->replaceIdentifier('class_link', TagWriter::quickTag('a', array('href'=> LinkUtil::link(array_merge($this->oClassPage->getFullPathArray(), array($oSchoolClass->getSchoolClass()->getSlug())))), $oSchoolClass->getSchoolClass()->getFullClassName()));
				}
				$oTemplate->replaceIdentifierMultiple('klassenlehrer_info', $oItemTemplate, null, Template::NO_NEW_CONTEXT);
			}
		}
	}

	private function renderPortrait($oTemplate) {
		$oPortrait = $this->oTeamMember->getDocument();
		if($oPortrait) {
			$oTemplate->replaceIdentifier('portrait_display_url', $oPortrait->getDisplayUrl(array('max_width' => 194)));
			$oTemplate->replaceIdentifier('portrait_alt', "Portrait von ". $this->oTeamMember->getFullName());
		}
	}

	private function renderEmail() {
		$sLinkText = $this->oTeamMember->getEmailG();
		if($sLinkText === null) {
			return;
		}
		if(Settings::getSetting("frontend", "protect_email_addresses", false)) {
			$sLinkText = str_replace("@", " [at] ", $sLinkText);
		}
		return TagWriter::getEmailLinkWriter($this->oTeamMember->getEmailG(), $sLinkText);
	}

	private function renderContext($oTemplate) {
		$oContextTemplate = $this->constructTemplate('detail_context');
		$oContextTemplate->replaceIdentifier('email_link', $this->renderEmail());
		$oTemplate->replaceIdentifier('container', $oContextTemplate, 'context');
		$oTemplate->replaceIdentifier('container_filled_types', 'team_members', 'context');
	}

	public function listQuery($bExcludeInactive = true) {
		$oQuery = TeamMemberQuery::create();
		if($bExcludeInactive) {
			$oQuery->excludeInactive();
		}
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
