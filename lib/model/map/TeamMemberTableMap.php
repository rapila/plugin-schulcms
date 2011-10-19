<?php



/**
 * This class defines the structure of the 'team_members' table.
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
class TeamMemberTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.TeamMemberTableMap';

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
		$this->setName('team_members');
		$this->setPhpName('TeamMember');
		$this->setClassname('TeamMember');
		$this->setPackage('model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('ORIGINAL_ID', 'OriginalId', 'INTEGER', false, null, null);
		$this->addColumn('LAST_NAME', 'LastName', 'VARCHAR', false, 40, null);
		$this->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', false, 40, null);
		$this->addColumn('SLUG', 'Slug', 'VARCHAR', false, 80, null);
		$this->addColumn('GENDER_ID', 'GenderId', 'CHAR', false, 1, null);
		$this->addColumn('EMPLOYED_SINCE', 'EmployedSince', 'DATE', false, null, null);
		$this->addColumn('DATE_OF_BIRTH', 'DateOfBirth', 'DATE', false, null, null);
		$this->addColumn('PROFESSION', 'Profession', 'VARCHAR', false, 255, null);
		$this->addColumn('EMAIL_G', 'EmailG', 'VARCHAR', false, 255, null);
		$this->addForeignKey('PORTRAIT_ID', 'PortraitId', 'INTEGER', 'documents', 'ID', false, null, null);
		$this->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'users', 'ID', false, null, null);
		$this->addColumn('IS_DELETED', 'IsDeleted', 'BOOLEAN', false, 1, false);
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
		$this->addRelation('Document', 'Document', RelationMap::MANY_TO_ONE, array('portrait_id' => 'id', ), 'SET NULL', null);
		$this->addRelation('UserRelatedByUserId', 'User', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'SET NULL', null);
		$this->addRelation('UserRelatedByCreatedBy', 'User', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
		$this->addRelation('UserRelatedByUpdatedBy', 'User', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
		$this->addRelation('TeamMemberFunction', 'TeamMemberFunction', RelationMap::ONE_TO_MANY, array('id' => 'team_member_id', ), 'CASCADE', null, 'TeamMemberFunctions');
		$this->addRelation('ClassTeacher', 'ClassTeacher', RelationMap::ONE_TO_MANY, array('id' => 'team_member_id', ), 'CASCADE', null, 'ClassTeachers');
		$this->addRelation('ServiceMember', 'ServiceMember', RelationMap::ONE_TO_MANY, array('id' => 'team_member_id', ), 'CASCADE', null, 'ServiceMembers');
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

} // TeamMemberTableMap
