<?php



/**
 * This class defines the structure of the 'subjects' table.
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
class SubjectTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'model.map.SubjectTableMap';

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
        $this->setName('subjects');
        $this->setPhpName('Subject');
        $this->setClassname('Subject');
        $this->setPackage('model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('original_id', 'OriginalId', 'INTEGER', false, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 80, null);
        $this->addColumn('short_name', 'ShortName', 'VARCHAR', false, 40, null);
        $this->addColumn('slug', 'Slug', 'VARCHAR', false, 80, null);
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
        $this->addRelation('UserRelatedByCreatedBy', 'User', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('UserRelatedByUpdatedBy', 'User', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('SchoolClass', 'SchoolClass', RelationMap::ONE_TO_MANY, array('id' => 'subject_id', ), 'SET NULL', null, 'SchoolClasss');
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

} // SubjectTableMap
