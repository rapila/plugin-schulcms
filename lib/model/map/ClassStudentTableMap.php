<?php



/**
 * This class defines the structure of the 'class_students' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.model.map
 */
class ClassStudentTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.ClassStudentTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName('class_students');
		$this->setPhpName('ClassStudent');
		$this->setClassname('ClassStudent');
		$this->setPackage('model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('SCHOOL_CLASS_ID', 'SchoolClassId', 'INTEGER' , 'school_classes', 'ID', true, null, null);
		$this->addColumn('FUNCTION_NAME', 'FunctionName', 'VARCHAR', false, 80, null);
		$this->addForeignPrimaryKey('STUDENT_ID', 'StudentId', 'INTEGER' , 'students', 'ID', true, null, null);
		$this->addColumn('IS_NEWLY_UPDATED', 'IsNewlyUpdated', 'BOOLEAN', false, 1, false);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		$this->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'users', 'ID', false, null, null);
		$this->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'users', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('SchoolClass', 'SchoolClass', RelationMap::MANY_TO_ONE, array('school_class_id' => 'id', ), 'CASCADE', null);
		$this->addRelation('Student', 'Student', RelationMap::MANY_TO_ONE, array('student_id' => 'id', ), 'CASCADE', null);
		$this->addRelation('UserRelatedByCreatedBy', 'User', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
		$this->addRelation('UserRelatedByUpdatedBy', 'User', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
	} // buildRelations()

	/**
	 *
	 * Gets the list of behaviors registered for this table
	 *
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'denyable' => array('mode' => 'by_role', 'role_key' => '', 'owner_allowed' => '', ),
			'extended_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
			'attributable' => array('create_column' => 'created_by', 'update_column' => 'updated_by', ),
		);
	} // getBehaviors()

} // ClassStudentTableMap
