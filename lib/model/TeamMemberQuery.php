<?php

/**
 * @package		 propel.generator.model
 */
class TeamMemberQuery extends BaseTeamMemberQuery {
		
	public function orderByRand() {
		return $this->addAscendingOrderByColumn(' RAND()');;
	}
	
	public function filterByTeamMemberFunctionGroup($mFunctionGroup) {
		$this->setDistinct();
		
		$this->addJoin(TeamMemberPeer::ID, TeamMemberFunctionPeer::TEAM_MEMBER_ID, Criteria::LEFT_JOIN);
		$this->addJoin(TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, SchoolFunctionPeer::ID, Criteria::INNER_JOIN);
		if(is_array($mFunctionGroup)) {
			$this->addAnd(SchoolFunctionPeer::FUNCTION_GROUP_ID, $mFunctionGroup, Criteria::IN);
		} else if(is_numeric($mFunctionGroup)) {
			$this->addAnd(SchoolFunctionPeer::FUNCTION_GROUP_ID, $mFunctionGroup);
		} else {
			$this->addJoin(SchoolFunctionPeer::FUNCTION_GROUP_ID, FunctionGroupPeer::ID, Criteria::INNER_JOIN);
			if($mFunctionGroup != null) {
  			$this->addAnd(FunctionGroupPeer::NAME_NORMALIZED, $mFunctionGroup);
			}
		}
		return $this;
	}
	
	/**
	* Excludes all team members that are not part of the configured active_function_groups
	* they can be 
	* - teachers
	* - teachers_require_classes, that require active class relationship
	* - others, any other function group not related to teaching
	*/
	public function excludeInactive() {
		$this->setDistinct();
		$this->addJoin(TeamMemberPeer::ID, TeamMemberFunctionPeer::TEAM_MEMBER_ID, Criteria::LEFT_JOIN);
		$this->addJoin(TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, SchoolFunctionPeer::ID, Criteria::INNER_JOIN);
		$this->addJoin(TeamMemberPeer::ID, ClassTeacherPeer::TEAM_MEMBER_ID, Criteria::LEFT_JOIN);
		$this->addJoin(ClassTeacherPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, Criteria::LEFT_JOIN);

		// get teachers that require active classes
		if(count(FunctionGroupPeer::getFunctionGroupIdsForTeachersRequireClasses())) {
			$oTeacherWithClassesCrit = $this->getNewCriterion(SchoolFunctionPeer::FUNCTION_GROUP_ID, FunctionGroupPeer::getFunctionGroupIdsForTeachersRequireClasses(), Criteria::IN);
			$oTeacherWithClassesCrit->addAnd($this->getNewCriterion(SchoolClassPeer::YEAR, SchoolPeer::getCurrentYear()));
			$oTeacherWithClassesCrit->addAnd($this->getNewCriterion(ClassTeacherPeer::TEAM_MEMBER_ID, null, self::ISNOTNULL));
		}
		
		// get other teachers
		if(count(FunctionGroupPeer::getFunctionGroupIdsForTeachers())) {
			$oTeacherCrit = $this->getNewCriterion(SchoolFunctionPeer::FUNCTION_GROUP_ID, FunctionGroupPeer::getFunctionGroupIdsForTeachers(), Criteria::IN);
			$oTeacherCrit->addAnd($this->getNewCriterion(SchoolClassPeer::YEAR, SchoolPeer::getCurrentYear()));
			if($oTeacherWithClassesCrit) {
				$oTeacherWithClassesCrit->addOr($oTeacherCrit);
				$this->addAnd($oTeacherWithClassesCrit);
			}
		}

		// get other team_members
		if(count(FunctionGroupPeer::getFunctionGroupIdsForOthers())) {
			$oOtherCrit = $this->getNewCriterion(SchoolFunctionPeer::FUNCTION_GROUP_ID, FunctionGroupPeer::getFunctionGroupIdsForOthers(), Criteria::IN);
			if($oTeacherWithClassesCrit) {
				$oTeacherWithClassesCrit->addOr($oOtherCrit);
			} elseif($oTeacherCrit) {
				$oTeacherCrit->addOr($oOtherCrit);
				$this->addAnd($oTeacherCrit);
			} else {
				$this->addAnd($oOtherCrit);
			}
		}		
		return $this;
	}
	
	public function filterByHasPortrait() {
		return $this->add(TeamMemberPeer::PORTRAIT_ID, null, Criteria::ISNOTNULL);
	}
}

