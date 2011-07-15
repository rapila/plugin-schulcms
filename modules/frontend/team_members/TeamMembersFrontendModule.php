<?php
/**
 * @package modules.frontend
 */

class TeamMembersFrontendModule extends DynamicFrontendModule implements WidgetBasedFrontendModule {
	
	public static $DISPLAY_MODES = array('team_liste', 'team_mitglied_detail');
	public static $TEAM_MEMBER;
	public $iFunctionGroupId;
	public $oClassPage;
	
	const MODE_SELECT_KEY = 'display_mode';
	const DETAIL_IDENTIFIER = 'id';
	const PORTRAIT_DUMMY_ID = 7;
	
	public static function acceptedRequestParams() {
		return array(self::DETAIL_IDENTIFIER);
	}
	
	public function renderFrontend() { 
		$this->oClassPage = PagePeer::getPageByIdentifier('klassen');

		// always show detail of requested or random team member
		if(self::$TEAM_MEMBER === null && isset($_REQUEST[self::DETAIL_IDENTIFIER])) {
			self::$TEAM_MEMBER = TeamMemberPeer::retrieveByPK($_REQUEST[self::DETAIL_IDENTIFIER]);
		}

		$aOptions = @unserialize($this->getData());
		if(isset($aOptions[self::MODE_SELECT_KEY])) {
			$this->iFunctionGroupId = is_numeric($aOptions[self::MODE_SELECT_KEY]) ? $aOptions[self::MODE_SELECT_KEY] : null;

			switch($aOptions[self::MODE_SELECT_KEY]) {
				case 'team_mitglied_detail' : return $this->renderDetail();
				default: return $this->renderTeamliste($aOptions[self::MODE_SELECT_KEY]);
			}
		}
	}
	
	private function renderTeamliste() {
		// get current navigation item and link array for detail
		$oPage = FrontendManager::$CURRENT_NAVIGATION_ITEM;
		$aLinkParams = $oPage instanceof VirtualNavigationItem ? array_merge($oPage->getParent()->getMe()->getFullPathArray(), array($oPage->getName())) : $oPage->getMe()->getFullPathArray();
		
		$oTemplate = $this->constructTemplate('list');
		$oTeamMemberQuery = TeamMemberQuery::create()->excludeInactive();
		if($this->iFunctionGroupId !== null) {
			$oTeamMemberQuery->filterByTeamMemberFunctionGroup($this->iFunctionGroupId);
		}
    // Util::dumpAll($oTeamMemberQuery->orderByLastName()->orderByFirstName()->toString());
		$aTeamMembers = $oTeamMemberQuery->orderByLastName()->orderByFirstName()->find();
		$sOddEven = 'odd';
		foreach($aTeamMembers as $oTeamMember) {
			$oItemTemplate = $this->constructTemplate('list_item');
			$oItemTemplate->replaceIdentifier('oddeven', $sOddEven = $sOddEven === 'even' ? 'odd' : 'even');
			if(Util::equals(self::$TEAM_MEMBER, $oTeamMember)) {
				$oItemTemplate->replaceIdentifier('is_active_class', ' active');
				$oItemTemplate->replaceIdentifier('show_active', '➜');
			}
			$oItemTemplate->replaceIdentifier('detail_link_name', TagWriter::quickTag('a', array('href' => LinkUtil::link(array_merge($aLinkParams, array(self::DETAIL_IDENTIFIER, $oTeamMember->getId())))),$oTeamMember->getFullNameInverted()));
			$oItemTemplate->replaceIdentifier('detail_link_title', StringPeer::getString('wns.team_member.link_title_prefix').$oTeamMember->getFullName());
			$oItemTemplate->replaceIdentifier('first_function_name', $oTeamMember->getFirstTeamMemberFunctionName());
			$aClassTeachers = $oTeamMember->getIsClassTeacherClasses();
			if(count($aClassTeachers) > 0) {
				foreach($aClassTeachers as $i => $oClassTeacher) {
					$aLink = array_merge($this->oClassPage->getFullPathArray(), array(ClassesFrontendModule::DETAIL_IDENTIFIER, $oClassTeacher->getSchoolClassId()));
					$sComma = $i > 0 ? ', ' : '';
					$oItemTemplate->replaceIdentifierMultiple('school_class', TagWriter::quickTag('a', array('title' => StringPeer::getString('wns.class.link_title_prefix').$oClassTeacher->getSchoolClass()->getName(), 'href' => LinkUtil::link($aLink)), $sComma . $oClassTeacher->getSchoolClass()->getName()));
				}
			} else {
				$oItemTemplate->replaceIdentifier('school_class', '-');
			}
			
			$oItemTemplate->replaceIdentifier('profession', $oTeamMember->getProfession());
			$oTemplate->replaceIdentifierMultiple('list_item', $oItemTemplate);
		}
		return $oTemplate;
	}
	
	public function renderDetail() {
		if(self::$TEAM_MEMBER) {
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
			$aSchoolClasses = self::$TEAM_MEMBER->getClassTeacherClasses();
      // Util::dumpAll($aSchoolClasses);
		  if(count($aSchoolClasses) > 0) {
  			$bChange = null;
		    foreach($aSchoolClasses as $oSchoolClass) {
		      if($oSchoolClass->getIsClassTeacher() !== $bChange) {
						// var_dump('klassenteacher '.($oSchoolClass->getIsClassTeacher() ? 'ja' : 'nein').' '.$oSchoolClass->getFunctionName());
						$bChange = $oSchoolClass->getIsClassTeacher();
						if($oSchoolClass->getIsClassTeacher()) {
	  					$oTemplate->replaceIdentifier('class_teacher', self::$TEAM_MEMBER->getClassTeacherTitle(). ' von: ');
						} else {
  						// $oTemplate->replaceIdentifier('class_teacher', $oSchoolClass->getFunctionName());
						}
					}
		      $oItemTemplate = $this->constructTemplate('class_item');
  				$oItemTemplate->replaceIdentifier('class_link', TagWriter::quickTag('a', array('href'=> LinkUtil::link(array_merge($this->oClassPage->getFullPathArray(), array(ClassesFrontendModule::DETAIL_IDENTIFIER, $oSchoolClass->getSchoolClass()->getId())))), $oSchoolClass->getSchoolClass()->getFullClassName()));
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
	}
	
 /**
	* use in SchoolFilter for title
	*/
	public function getTeamMember() {
		return self::$TEAM_MEMBER;
	}
	
	public function widgetData() {
		$aOptions = @unserialize($this->getData()); 
		return $aOptions[self::MODE_SELECT_KEY];
	}
	
	public function widgetSave($mData) {
		$this->oLanguageObject->setData(serialize(array(self::MODE_SELECT_KEY => $mData)));
		return $this->oLanguageObject->save();
	}
	
	public function getWidget() {
		$aOptions = @unserialize($this->getData()); 
		$oWidget = new TeamMemberEditWidgetModule(null, $this);
		$oWidget->setDisplayMode($aOptions[self::MODE_SELECT_KEY]);
		return $oWidget;
	}
}
