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
     * @return void
     * @throws PropelException
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
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('original_id', 'OriginalId', 'INTEGER', false, null, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', false, 40, null);
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', false, 40, null);
        $this->addColumn('slug', 'Slug', 'VARCHAR', false, 80, null);
        $this->addColumn('gender_id', 'GenderId', 'CHAR', false, 1, null);
        $this->addColumn('employed_since', 'EmployedSince', 'DATE', false, null, null);
        $this->addColumn('date_of_birth', 'DateOfBirth', 'DATE', false, null, null);
        $this->addColumn('profession', 'Profession', 'VARCHAR', false, 255, null);
        $this->addColumn('email_g', 'EmailG', 'VARCHAR', false, 255, null);
        $this->addForeignKey('portrait_id', 'PortraitId', 'INTEGER', 'documents', 'id', false, null, null);
        $this->addForeignKey('user_id', 'UserId', 'INTEGER', 'users', 'id', false, null, null);
        $this->addColumn('is_deleted', 'IsDeleted', 'BOOLEAN', false, 1, false);
        $this->addColumn('is_newly_updated', 'IsNewlyUpdated', 'BOOLEAN', false, 1, false);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addForeignKey('created_by', 'CreatedBy', 'INTEGER', 'users', 'id', false, null, null);
        $this->addForeignKey('updated_by', 'UpdatedBy', 'INTEGER', 'users', 'id', false, null, null);
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
            'extended_timestampable' =>  array (
  'create_column' => 'created_at',
  'update_column' => 'updated_at',
  'disable_updated_at' => 'false',
),
            'attributable' =>  array (
  'create_column' => 'created_by',
  'update_column' => 'updated_by',
),
            'denyable' =>  array (
  'mode' => 'by_role',
  'role_key' => '',
  'owner_allowed' => '',
),
            'extended_keyable' =>  array (
  'key_separator' => '_',
),
        );
    } // getBehaviors()

} // TeamMemberTableMap
