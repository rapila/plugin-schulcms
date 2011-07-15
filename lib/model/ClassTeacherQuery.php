<?php



/**
 * Skeleton subclass for performing query and update operations on the 'class_teachers' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.model
 */
class ClassTeacherQuery extends BaseClassTeacherQuery {
	public function orderByLastName() {
		$this->joinTeamMember();
		$this->addAscendingOrderByColumn(TeamMemberPeer::LAST_NAME);
		return $this;
	}

} // ClassTeacherQuery
