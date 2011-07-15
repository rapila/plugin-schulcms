<?php


/**
 * Skeleton subclass for performing query and update operations on the 'classes_students' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.model
 */
class ClassStudentQuery extends BaseClassStudentQuery {
	public function orderByFirstName() {
		$this->joinStudent();
		$this->addAscendingOrderByColumn(StudentPeer::FIRST_NAME);
		return $this;
	}
} // ClassStudentQuery
