<?php



/**
 * This class defines the structure of the 'school_functions' table.
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
class SchoolFunctionTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.SchoolFunctionTableMap';

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
		$this->setName('school_functions');
		$this->setPhpName('SchoolFunction');
		$this->setClassname('SchoolFunction');
		$this->setPackage('model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('ORIGINAL_ID', 'OriginalId', 'INTEGER', true, null, null);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', false, 255, null);
		$this->addForeignKey('FUNCTION_GROUP_ID', 'FunctionGroupId', 'INTEGER', 'function_groups', 'ID', false, null, null);
		$this->addForeignKey('SCHOOL_ID', 'SchoolId', 'INTEGER', 'schools', 'ID', false, null, null);
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
		$this->addRelation('FunctionGroup', 'FunctionGroup', RelationMap::MANY_TO_ONE, array('function_group_id' => 'id', ), 'SET NULL', null);
		$this->addRelation('School', 'School', RelationMap::MANY_TO_ONE, array('school_id' => 'id', ), 'CASCADE', null);
		$this->addRelation('UserRelatedByCreatedBy', 'User', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
		$this->addRelation('UserRelatedByUpdatedBy', 'User', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
		$this->addRelation('TeamMemberFunction', 'TeamMemberFunction', RelationMap::ONE_TO_MANY, array('id' => 'school_function_id', ), 'CASCADE', null, 'TeamMemberFunctions');
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

} // SchoolFunctionTableMap
