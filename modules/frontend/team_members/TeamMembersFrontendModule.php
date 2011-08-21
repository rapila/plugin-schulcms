<?php
/**
 * @package modules.frontend
 */

class TeamMembersFrontendModule extends DynamicFrontendModule implements WidgetBasedFrontendModule {
	
	public static $DISPLAY_MODES = array('team_liste', 'team_mitglied_detail');
	public static $TEAM_MEMBER;
	public $aFunctionGroupIds;
	public $oClassPage;
	
	const MODE_SELECT_KEY = 'display_mode';
	const GROUPS_SELECT_KEY = 'function_groups';
	const PORTRAIT_DUMMY_ID = 7;
	const IDENTIFIER_REQUEST_KEY = 'name';
	const CACHE_KEY = 'team_member_list_';

	public function __construct($oLanguageObject = null, $aPath = null, $iId = 1) {
		parent::__construct($oLanguageObject, $aPath, $iId);
		$this->oClassPage = PagePeer::getPageByIdentifier(SchoolPeer::getPageIdentifier('classes'));
	}

	public function renderFrontend() { 
		$aOptions = @unserialize($this->getData());
		$this->aFunctionGroupIds = @$aOptions[self::GROUPS_SELECT_KEY];

		switch($aOptions[self::MODE_SELECT_KEY]) {
			case 'team_mitglied_detail' : return $this->renderDetail();
			default: return $this->renderTeamliste();
		}
	}
	
	private function renderTeamliste() {
    // $oCache = new Cache(self::CACHE_KEY.Session::language().'_'. ($this->iFunctionGroupId !== null ? $this->iFunctionGroupId.'_' : ""), DIRNAME_PRELOAD);  
    // if($oCache->cacheFileExists()) {
    //   return $oCache->getContentsAsVariable();
    // }
		
		// get current navigation item and link array for detail
		$oPage = FrontendManager::$CURRENT_PAGE;
		
		$oTemplate = $this->constructTemplate('list');
		$oTeamMemberQuery = TeamMemberQuery::create()->excludeInactive();
		if($this->aFunctionGroupIds !== null) {
			$oTeamMemberQuery->filterByTeamMemberFunctionGroup($this->aFunctionGroupIds);
		}

		$aTeamMembers = $oTeamMemberQuery->orderByLastName()->orderByFirstName()->find();
		$sOddEven = 'odd';
		foreach($aTeamMembers as $oTeamMember) {
			$oItemTemplate = $this->constructTemplate('list_item');
			$oItemTemplate->replaceIdentifier('oddeven', $sOddEven = $sOddEven === 'even' ? 'odd' : 'even');
			if(Util::equals(self::$TEAM_MEMBER, $oTeamMember)) {
				$oItemTemplate->replaceIdentifier('is_active_class', ' active');
				$oItemTemplate->replaceIdentifier('show_active', '➜');
			}
			$oItemTemplate->replaceIdentifier('detail_link_name', TagWriter::quickTag('a', array('href' => LinkUtil::link($oTeamMember->getTeamMemberLink($oPage))),$oTeamMember->getFullNameInverted()));
			$oItemTemplate->replaceIdentifier('detail_link_title', StringPeer::getString('wns.team_member.link_title_prefix').$oTeamMember->getFullName());
			$oItemTemplate->replaceIdentifier('first_function_name', $oTeamMember->getFirstTeamMemberFunctionName());

			$aClassTeachers = $oTeamMember->getIsClassTeacherClasses(true);
			if(count($aClassTeachers) > 0) {
				foreach($aClassTeachers as $i => $oClassTeacher) {
					if($i > 0) {
						$oItemTemplate->replaceIdentifierMultiple('school_class', ', ');
					}
					$aLink = $oClassTeacher->getSchoolClass()->getClassLink($this->oClassPage);
					$oItemTemplate->replaceIdentifierMultiple('school_class', TagWriter::quickTag('a', array('title' => StringPeer::getString('wns.class.link_title_prefix').$oClassTeacher->getSchoolClass()->getName(), 'href' => LinkUtil::link($aLink)), $oClassTeacher->getSchoolClass()->getName()));
				}
			} else {
				$oItemTemplate->replaceIdentifier('school_class', '-');
			}
			
			$oItemTemplate->replaceIdentifier('profession', $oTeamMember->getProfession());
			$oTemplate->replaceIdentifierMultiple('list_item', $oItemTemplate);
		}
		// $oCache->setContents($oTemplate);
    return $oTemplate;
	}
	
	public function renderDetail() {
		if(!self::$TEAM_MEMBER) {
			return null;
		}
		$oTemplate = $this->constructTemplate('detail');
		$oPortrait = self::$TEAM_MEMBER->getDocument();
		if($oPortrait) {
			$oTemplate->replaceIdentifier('portrait_display_url', $oPortrait->getDisplayUrl(array('max_width' => 194)));
			$oTemplate->replaceIdentifier('portrait_alt', "Portrait von ". self::$TEAM_MEMBER->getFullName());
		}
		$oTemplate->replaceIdentifier('full_name_inverted', self::$TEAM_MEMBER->getFullName());
		if(self::$TEAM_MEMBER->getProfession() != null) {
			$oTemplate->replaceIdentifier('profession', self::$TEAM_MEMBER->getProfession());
		}
		$aSchoolClasses = self::$TEAM_MEMBER->getClassTeacherClasses(true);
		if(count($aSchoolClasses) > 0) {
			$bChange = null;
			foreach($aSchoolClasses as $oSchoolClass) {
				if($oSchoolClass->getIsClassTeacher() !== $bChange) {
					$bChange = $oSchoolClass->getIsClassTeacher();
					if($oSchoolClass->getIsClassTeacher()) {
						$oTemplate->replaceIdentifier('class_teacher', self::$TEAM_MEMBER->getClassTeacherTitle(). ' von: ');
					} 
				}
				$oItemTemplate = $this->constructTemplate('class_item');
				$oItemTemplate->replaceIdentifier('class_link', TagWriter::quickTag('a', array('href'=> LinkUtil::link(array_merge($this->oClassPage->getFullPathArray(), array($oSchoolClass->getSchoolClass()->getSlug())))), $oSchoolClass->getSchoolClass()->getFullClassName()));
				$oTemplate->replaceIdentifierMultiple('klassenlehrer_info', $oItemTemplate, null, Template::NO_NEW_CONTEXT);
			}
		}
		$aTeamMemberFunctions = self::$TEAM_MEMBER->getTeamMemberFunctions();
		if(count($aTeamMemberFunctions) > 0) {
			foreach($aTeamMemberFunctions as $oTeamMemberFunction) {
				$oItemTemplate = $this->constructTemplate('function_item');
				$oItemTemplate->replaceIdentifier('function_name', $oTeamMemberFunction->getSchoolFunction()->getTitle());
				$oTemplate->replaceIdentifierMultiple('functions', $oItemTemplate, null, Template::NO_NEW_CONTEXT);
			}
		}
		return $oTemplate;
	}

	public function widgetData() {
		$aOptions = @unserialize($this->getData()); 
		return $aOptions;
	}
	
	public function widgetSave($mData) {
		$this->oLanguageObject->setData(serialize($mData));
		return $this->oLanguageObject->save();
	}
	
	public function getWidget() {
		$oWidget = new TeamMemberEditWidgetModule(null, $this);
		return $oWidget;
	}
}
