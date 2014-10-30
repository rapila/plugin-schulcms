<?php

/**
 * @package		 propel.generator.model
 */
class TeamMemberQuery extends BaseTeamMemberQuery {

	private $oPrevCrit;

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
	* - team_members with classes
	* - other team_members, any other function group s.a. admin, services, teacher without defined class relationships
	*/
	public function excludeInactive() {
		$this->setDistinct();
		$this->addJoin(TeamMemberPeer::ID, TeamMemberFunctionPeer::TEAM_MEMBER_ID, Criteria::LEFT_JOIN);
		$this->addJoin(TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, SchoolFunctionPeer::ID, Criteria::INNER_JOIN);
		$this->addJoin(TeamMemberPeer::ID, ClassTeacherPeer::TEAM_MEMBER_ID, Criteria::LEFT_JOIN);
		$this->addJoin(ClassTeacherPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, Criteria::LEFT_JOIN);

		// get team_members that require active classes
		if(count(FunctionGroupPeer::getFunctionGroupIdsForTeamMembersWithClasses())) {
			$oTeacherWithClassesCrit = $this->getNewCriterion(SchoolFunctionPeer::FUNCTION_GROUP_ID, FunctionGroupPeer::getFunctionGroupIdsForTeamMembersWithClasses(), Criteria::IN);
			$oTeacherWithClassesCrit->addAnd($this->getNewCriterion(SchoolClassPeer::YEAR, SchoolPeer::getCurrentYear()));
			$oTeacherWithClassesCrit->addAnd($this->getNewCriterion(ClassTeacherPeer::TEAM_MEMBER_ID, null, self::ISNOTNULL));
			$this->addToFunctionGroupCriterion($oTeacherWithClassesCrit);
		}

		// get other team_members
		if(count(FunctionGroupPeer::getFunctionGroupIdsForOtherTeamMembers())) {
			$oOtherCrit = $this->getNewCriterion(SchoolFunctionPeer::FUNCTION_GROUP_ID, FunctionGroupPeer::getFunctionGroupIdsForOtherTeamMembers(), Criteria::IN);
			$this->addToFunctionGroupCriterion($oOtherCrit);
		}
		if($this->oPrevCrit) {
			$this->addAnd($this->oPrevCrit);
			$this->oPrevCrit = null;
		}
		return $this;
	}

	private function addToFunctionGroupCriterion(Criterion $oCriterion) {
		if($this->oPrevCrit === null) {
			$this->oPrevCrit = $oCriterion;
		} else {
			$this->oPrevCrit->addOr($oCriterion);
		}
	}

	public function filterByHasPortrait() {
		return $this->filterByPortraitId(null, Criteria::ISNOTNULL);
	}

	public function filterByFunctionId($iFunctionId = null) {
		if($iFunctionId !== null) {
			$this->joinTeamMemberFunction()->useQuery('TeamMemberFunction')->filterBySchoolFunctionId($iFunctionId)->endUse();
		}
		return $this;
	}

}

