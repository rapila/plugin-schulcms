<?php



/**
 * This class defines the structure of the 'services' table.
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
class ServiceTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'model.map.ServiceTableMap';

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
        $this->setName('services');
        $this->setPhpName('Service');
        $this->setClassname('Service');
        $this->setPackage('model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 80, null);
        $this->addColumn('slug', 'Slug', 'VARCHAR', false, 80, null);
        $this->addColumn('teaser', 'Teaser', 'VARCHAR', false, 255, null);
        $this->addColumn('address', 'Address', 'VARCHAR', false, 255, null);
        $this->addColumn('opening_hours', 'OpeningHours', 'VARCHAR', false, 255, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 20, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 255, null);
        $this->addColumn('website', 'Website', 'VARCHAR', false, 255, null);
        $this->addColumn('body', 'Body', 'BLOB', false, null, null);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', false, 1, false);
        $this->addForeignKey('logo_id', 'LogoId', 'INTEGER', 'documents', 'id', false, null, null);
        $this->addForeignKey('service_category_id', 'ServiceCategoryId', 'INTEGER', 'service_categories', 'id', false, null, null);
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
        $this->addRelation('Document', 'Document', RelationMap::MANY_TO_ONE, array('logo_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('ServiceCategory', 'ServiceCategory', RelationMap::MANY_TO_ONE, array('service_category_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('UserRelatedByCreatedBy', 'User', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('UserRelatedByUpdatedBy', 'User', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('Event', 'Event', RelationMap::ONE_TO_MANY, array('id' => 'service_id', ), 'CASCADE', null, 'Events');
        $this->addRelation('ServiceMember', 'ServiceMember', RelationMap::ONE_TO_MANY, array('id' => 'service_id', ), 'CASCADE', null, 'ServiceMembers');
        $this->addRelation('ServiceDocument', 'ServiceDocument', RelationMap::ONE_TO_MANY, array('id' => 'service_id', ), 'CASCADE', null, 'ServiceDocuments');
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
  'mode' => '',
  'role_key' => 'services',
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
            'extended_keyable' =>  array (
  'key_separator' => '_',
),
        );
    } // getBehaviors()

} // ServiceTableMap
