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
		if(is_numeric($mFunctionGroup)) {
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
	* Excludes all team members that don’t have any function other than being teachers and are not currently assigned a class
	*/
	public function excludeInactive() {
		$this->setDistinct();
		
		$this->addJoin(TeamMemberPeer::ID, TeamMemberFunctionPeer::TEAM_MEMBER_ID, Criteria::LEFT_JOIN);
		$this->addJoin(TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, SchoolFunctionPeer::ID, Criteria::INNER_JOIN);
		$sTeacherCrit = $this->getNewCriterion(SchoolFunctionPeer::FUNCTION_GROUP_ID, FunctionGroupPeer::getTeacherFunctionGroupIds(), Criteria::IN);
		$sOtherCrit = $this->getNewCriterion(SchoolFunctionPeer::FUNCTION_GROUP_ID, FunctionGroupPeer::getOtherFunctionGroupIds(), self::IN);
		$this->addJoin(TeamMemberPeer::ID, ClassTeacherPeer::TEAM_MEMBER_ID, Criteria::LEFT_JOIN);
		$sTeacherCrit->addAnd($this->getNewCriterion(ClassTeacherPeer::TEAM_MEMBER_ID, null, self::ISNOTNULL));
		
		$sTeacherCrit->addOr($sOtherCrit);
		$this->addAnd($sTeacherCrit);
		
		return $this;
	}
	
	public function filterByHasPortrait() {
		return $this->add(TeamMemberPeer::PORTRAIT_ID, null, Criteria::ISNOTNULL);
	}
}

