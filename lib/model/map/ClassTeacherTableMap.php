<?php



/**
 * This class defines the structure of the 'class_teachers' table.
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
class ClassTeacherTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'model.map.ClassTeacherTableMap';

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
        $this->setName('class_teachers');
        $this->setPhpName('ClassTeacher');
        $this->setClassname('ClassTeacher');
        $this->setPackage('model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('school_class_id', 'SchoolClassId', 'INTEGER' , 'school_classes', 'id', true, null, null);
        $this->addForeignPrimaryKey('team_member_id', 'TeamMemberId', 'INTEGER' , 'team_members', 'id', true, null, null);
        $this->addPrimaryKey('function_name', 'FunctionName', 'VARCHAR', true, 80, null);
        $this->addColumn('sort_order', 'SortOrder', 'INTEGER', false, null, null);
        $this->addColumn('is_class_teacher', 'IsClassTeacher', 'BOOLEAN', false, 1, false);
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
        $this->addRelation('SchoolClass', 'SchoolClass', RelationMap::MANY_TO_ONE, array('school_class_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('TeamMember', 'TeamMember', RelationMap::MANY_TO_ONE, array('team_member_id' => 'id', ), 'CASCADE', null);
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
            'denyable' =>  array (
  'mode' => 'by_role',
  'role_key' => '',
  'owner_allowed' => '',
),
            'extended_timestampable' =>  array (
  'create_column' => 'created_at',
  'update_column' => 'updated_at',
  'disable_updated_at' => 'false',
),
            'attributable' =>  array (
  'create_column' => 'created_by',
  'update_column' => 'updated_by',
),
        );
    } // getBehaviors()

} // ClassTeacherTableMap
