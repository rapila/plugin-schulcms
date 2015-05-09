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
	}

	public function display(Template $oTemplate, $bIsPreview = false) {
		if($this->oNavigationItem instanceof TeamMemberNavigationItem){
			$this->oTeamMember = $this->oNavigationItem->getTeamMember();
			$this->renderDetail($oTemplate);
		}
		$oSchoolSite = SchoolSiteQuery::currentSchoolSite();
		if($oSchoolSite->isPortalSite()) {
			return $this->renderPortalList($oTemplate);
		}
		$this->renderList($oTemplate);
	}

	private function renderPortalList($oTemplate) {
		$oListTemplate = $this->constructTemplate('list_portal');
		$oItemPrototype = $this->constructTemplate('list_portal_item');
		foreach($this->listQuery(false)->find() as $oTeamMember) {
			$aFunctionInfo = $this->getMainSchoolFunctionInfo($oTeamMember);
			if(!is_array($aFunctionInfo)) {
				continue;
			}
			$oItemTemplate = clone $oItemPrototype;
			$oItemTemplate->replaceIdentifier('first_function_name', $aFunctionInfo['function_name']);
			$sUrl = WettingenSettingQuery::getUrlByDomainName('domain');
			$oItemTemplate->replaceIdentifier('school_site', TagWriter::quickTag('a', array('href' => $sUrl), $aFunctionInfo['school_unit']));
			$oItemTemplate->replaceIdentifier('detail_link', LinkUtil::link($oTeamMember->getLink($this->oPage)));
			$oItemTemplate->replaceIdentifier('name', $oTeamMember->getFullNameInverted());
			$oItemTemplate->replaceIdentifier('detail_link_title', 'Title');
			$oListTemplate->replaceIdentifierMultiple('items', $oItemTemplate);
		}
		$oTemplate->replaceIdentifier('container', $oListTemplate, 'content');
		$oTemplate->replaceIdentifier('container_filled_types', 'team_members', 'content');
	}

	private function getMainSchoolFunctionInfo($oTeamMember) {
		$aSchools = array();
		foreach($oTeamMember->getTeamMemberFunctionsJoinSchoolFunction(TeamMember::getTeamMemberFunctionsCriteria()) as $oFunction) {
			$oSchool = $oFunction->getSchoolFunction()->getSchool();
			if($oSchool && !isset($aSchools[$oSchool->getOriginalId()])) {
				$aSchools[$oSchool->getOriginalId()]['school_unit'] = $oSchool->getSchoolUnit();
				$aSchools[$oSchool->getOriginalId()]['domain'] = self::getDomainBySchoolUnit($oSchool->getSchoolUnit());
				$aSchools[$oSchool->getOriginalId()]['function_name'] = $oFunction->getSchoolFunction()->getTitle();
			}
			if(count($aSchools) > 0) {
				return reset($aSchools);
			}
			return null;
		}
	}

	private static function getDomainBySchoolUnit($sSchoolUnit) {
		switch($sSchoolUnit) {
			case "Kindergarten" : $sDomain = 'kindergarten'; break;
			case "Primarschule Altenburg" : 	$sDomain = 'primarschule-altenburg'; break;
			case "Primarschule Dorf" :				$sDomain = 'primarschule-dorf'; break;
			case "Primarschule Margeläcker" : $sDomain = 'primarschule-margelaecker'; break;
			case "Primarschule Zehntenhof" :	$sDomain = 'primarschule-zehntenhof'; break;
			case "Bezirksschule" : $sDomain = 'bezirksschule'; break;
			case "Realschule Wettingen" : $sDomain = 'sereal'; break;
			case "Sekundarschule Wettingen" : $sDomain = 'sereal'; break;
			case "Heilpädagogische Schule" : $sDomain = 'heilpaedagogische-schule'; break;
			case "Musikschule" : $sDomain = 'musikschule'; break;
			case "Rathaus" : $sDomain = 'portal'; break;
			default : $sDomain = null;
		}
		return $sDomain;
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
		if($this->oTeamMember->getProfession() != null) {
			$oDetailTemplate->replaceIdentifier('profession', $this->oTeamMember->getProfession());
		}
		$oDetailTemplate->replaceIdentifier('email', $this->renderEmail(), null, Template::NO_HTML_ESCAPE);
		$this->renderFunctions($oDetailTemplate);
		$this->renderClasses($oDetailTemplate);
		$this->renderPortrait($oDetailTemplate);

		$oTemplate->replaceIdentifier('container', $oDetailTemplate, 'content');
		$oTemplate->replaceIdentifier('container_filled_types', 'team_members', 'content');
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
				$oItemTemplate->replaceIdentifier('class_link', TagWriter::quickTag('a', array('href'=> LinkUtil::link(array_merge($this->oClassPage->getFullPathArray(), array($oSchoolClass->getSchoolClass()->getSlug())))), $oSchoolClass->getSchoolClass()->getFullClassName()));
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
