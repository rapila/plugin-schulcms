<?php

/**
 * @package    propel.generator.model
 */
class ClassTeacherQuery extends BaseClassTeacherQuery {
	public function orderByLastName() {
		$this->joinTeamMember();
		$this->addAscendingOrderByColumn(TeamMemberPeer::LAST_NAME);
		return $this;
	}

} // ClassTeacherQuery
