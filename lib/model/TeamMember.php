<?php
/**
 * @package		 propel.generator.model
 */
class TeamMember extends BaseTeamMember {
	
	public static $TEAMLIST_GROUPS = array();
	
	public function getFullNameInverted() {
		return $this->getLastName().', '.$this->getFirstName();
	}
	
	public function getFullName() {
		return $this->getFirstName().' '.$this->getLastName();
	}
	
	public function getFullNameShort() {
		return substr($this->getFirstName(),0,1).'. '.$this->getLastName();
	}
	
	public function isTeacher() {
		return $this->countClassTeachers(ClassTeacherQuery::create()->joinWith('SchoolClass', Criteria::INNER_JOIN)) > 0;
	}
	
	/**
	* getIsClassTeacherClasses()
	* @param boolean $bGroupByUnitName, default=false
	* for the team_member list we only want to display the teaching units and not the classes
	* @return PropelCollection|array ClassTeacher[] List of ClassTeacher objects
	*/
	public function getIsClassTeacherClasses($bGroupByUnitName = false) {
		$oQuery = ClassTeacherQuery::create()->filterByIsClassTeacher(true);
		if($bGroupByUnitName) {
			$oQuery->joinSchoolClass()->useQuery('SchoolClass')->groupByUnitName()->endUse();
		}
		return $this->getClassTeachersJoinSchoolClass($oQuery);
	}

	public function getClassTeachersJoinSchoolClass($oQuery = null, $oCon = null, $sJoinBehavior = Criteria::INNER_JOIN, $bIncludeOldClasses = false) {
		if(!$oQuery) {
			$oQuery = ClassTeacherQuery::create();
		}
		if(!$bIncludeOldClasses) {
			$oQuery->joinSchoolClass()->useQuery('SchoolClass')->filterByYear(SchoolPeer::getCurrentYear())->endUse();
		}
		return parent::getClassTeachersJoinSchoolClass($oQuery, $oCon, $sJoinBehavior);
	}
	
	public function getClassTeachersJoinSchoolClassesForPermissions($bIncludeOldClasses) {
		return self::getClassTeachersJoinSchoolClass(null, null, Criteria::INNER_JOIN, $bIncludeOldClasses);
	}
		
	/**
	* getClassTeacherClasses()
	* @param boolean $bGroupByUnitName, default=false
	* for the team_member detail we only want to display the teaching units and not the classes
	* @return PropelCollection|array ClassTeacher[] List of ClassTeacher objects
	*/
	public function getClassTeacherClasses($bGroupByUnitName = false) {
	  $oQuery = ClassTeacherQuery::create();
		$oQuery->orderByIsClassTeacher(Criteria::DESC);
		if($bGroupByUnitName) {
			$oQuery->joinSchoolClass()->useQuery('SchoolClass')->includeClassTypesIfConfigured()->groupByUnitName()->orderByName()->endUse();
		} else {
			$oQuery->joinSchoolClass()->useQuery('SchoolClass')->orderByName()->endUse();
		}
		return $this->getClassTeachersJoinSchoolClass($oQuery);
	} 
	
	public function getClassNames() {
		$aResult = array();
		foreach($this->getIsClassTeacherClasses() as $oClassTeacher) {
			if($oClassTeacher->getSchoolClass()) {
				$aResult[] = $oClassTeacher->getSchoolClass()->getName();
			}
		}
		return implode(', ', $aResult);
	}
	
	public function getDateOfBirthFormatted() {
		if($this->date_of_birth != null) {
			return LocaleUtil::localizeDate($this->date_of_birth);
		}
	}
	
	public function getAgeAndDateOfBirth() {
		if($this->date_of_birth != null) {
			return $this->getAge().' / '.LocaleUtil::localizeDate($this->date_of_birth);
		}
	}
	
	public function getEmployedSinceFormatted() {
		if($this->employed_since != null) {
			return LocaleUtil::localizeDate($this->employed_since);
		}
	}
	
	public function getAgePhp() {
		if($this->date_of_birth != null) {
			list($iYear,$iMonth,$iDay) = explode("-",$this->getDateOfBirth('Y-m-d'));
			$iYearDiff	= date("Y") - $iYear;
			$iMonthDiff = date("m") - $iMonth;
			$iDayDiff		= date("d") - $iDay;
			if ($iDayDiff < 0 || $iMonthDiff < 0)
				$iYearDiff--;
			return $iYearDiff;		
		}
	}
	
	public function getAge() {
		if($this->date_of_birth != null) {
			list($iYear,$sDayMonth) = explode("-",$this->getDateOfBirth('Y-md'));
			$iYearDiff	= date("Y") - $iYear;
			if (date("md") < $sDayMonth) {
				$iYearDiff--;
			}
			return $iYearDiff;		
		}
	}
	
	public function getHasPortrait() {
		return $this->getPortraitId() != null;
	}
	
	public function getClassTeacherTitle() {
		if($this->getGenderId() === 'f') {
			return StringPeer::getString('wns.class.class_teacher_female');
		}
		return StringPeer::getString('wns.class.class_teacher_male');
	}
	
	public function getFirstTeamMemberFunctionName() {
		$oCriteria = new Criteria();
		$oCriteria->add(SchoolFunctionPeer::FUNCTION_GROUP_ID, FunctionGroupPeer::getFunctionGroupIdsForTeamlist(), Criteria::IN);
		$oCriteria->addDescendingOrderByColumn(TeamMemberFunctionPeer::IS_MAIN_FUNCTION);
		$oCriteria->addAscendingOrderByColumn(SchoolFunctionPeer::TITLE);
		$oCriteria->setLimit(1);
		foreach($this->getTeamMemberFunctionsJoinSchoolFunction($oCriteria) as $oFunction) {
			return $oFunction->getSchoolFunction()->getTitle();
		}
		return null;
	}
	
	public function getGenderKeyFromId() {
		if($this->getGenderId() === 'f') {
			return 'female';
		}
		return 'male';
	}
	
	public function getIsActiveTeamMember() {
		if(self::$TEAMLIST_GROUPS == null) {
			self::$TEAMLIST_GROUPS = FunctionGroupPeer::getFunctionGroupIdsForTeamlist();
		}
		foreach($this->getTeamMemberFunctionsJoinSchoolFunction() as $oFunction) {
			if(in_array($oFunction->getSchoolFunction()->getFunctionGroupId(), self::$TEAMLIST_GROUPS)) {
				return true;
			}
		}
		return false;
	}
	
	public function getTeamMemberFunctionsJoinSchoolFunction($oCriteria = null, $oConn = null, $oJoinBehaviour = Criteria::INNER_JOIN) {
		return parent::getTeamMemberFunctionsJoinSchoolFunction($oCriteria, $oConn, $oJoinBehaviour);
	}
	
	public function delete(PropelPDO $con = null) {
		if($this->getUserRelatedByUserId()) {
			$this->getUserRelatedByUserId()->delete();
		}
		parent::delete($con);
	}
	
	public function getTeamMemberLink($oTeamMemberPage = null) {
		if($oTeamMemberPage === null) {
			$oTeamMemberPage = PageQuery::create()->filterByIdentifier(SchoolPeer::getPageIdentifier(SchoolPeer::PAGE_IDENTIFIER_TEAM));
		}
		return array_merge($oTeamMemberPage->getFullPathArray(), array($this->getSlug()));
	}

}

