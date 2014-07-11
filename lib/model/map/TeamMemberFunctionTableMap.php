<?php



/**
 * This class defines the structure of the 'team_member_functions' table.
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
class TeamMemberFunctionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'model.map.TeamMemberFunctionTableMap';

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
        $this->setName('team_member_functions');
        $this->setPhpName('TeamMemberFunction');
        $this->setClassname('TeamMemberFunction');
        $this->setPackage('model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('team_member_id', 'TeamMemberId', 'INTEGER' , 'team_members', 'id', true, null, null);
        $this->addForeignPrimaryKey('school_function_id', 'SchoolFunctionId', 'INTEGER' , 'school_functions', 'id', true, null, null);
        $this->addColumn('is_main_function', 'IsMainFunction', 'BOOLEAN', false, 1, false);
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
        $this->addRelation('TeamMember', 'TeamMember', RelationMap::MANY_TO_ONE, array('team_member_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('SchoolFunction', 'SchoolFunction', RelationMap::MANY_TO_ONE, array('school_function_id' => 'id', ), 'CASCADE', null);
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

} // TeamMemberFunctionTableMap
