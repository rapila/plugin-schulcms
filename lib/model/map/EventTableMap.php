<?php



/**
 * This class defines the structure of the 'events' table.
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
class EventTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'model.map.EventTableMap';

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
        $this->setName('events');
        $this->setPhpName('Event');
        $this->setClassname('Event');
        $this->setPackage('model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('slug', 'Slug', 'VARCHAR', false, 255, null);
        $this->addColumn('body', 'Body', 'BLOB', false, null, null);
        $this->addColumn('body_short', 'BodyShort', 'BLOB', false, null, null);
        $this->addColumn('body_review', 'BodyReview', 'BLOB', false, null, null);
        $this->addColumn('location_info', 'LocationInfo', 'VARCHAR', false, 255, null);
        $this->addColumn('date_start', 'DateStart', 'DATE', true, null, null);
        $this->addColumn('date_end', 'DateEnd', 'DATE', true, null, null);
        $this->addColumn('time_details', 'TimeDetails', 'VARCHAR', false, 255, null);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', false, 1, false);
        $this->addColumn('is_common', 'IsCommon', 'BOOLEAN', false, 1, false);
        $this->addForeignKey('event_type_id', 'EventTypeId', 'INTEGER', 'event_types', 'id', false, null, null);
        $this->addForeignKey('school_class_id', 'SchoolClassId', 'INTEGER', 'school_classes', 'id', false, null, null);
        $this->addForeignKey('gallery_id', 'GalleryId', 'INTEGER', 'document_categories', 'id', false, null, null);
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
        $this->addRelation('EventType', 'EventType', RelationMap::MANY_TO_ONE, array('event_type_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('SchoolClass', 'SchoolClass', RelationMap::MANY_TO_ONE, array('school_class_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('DocumentCategory', 'DocumentCategory', RelationMap::MANY_TO_ONE, array('gallery_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('UserRelatedByCreatedBy', 'User', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('UserRelatedByUpdatedBy', 'User', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('EventDocument', 'EventDocument', RelationMap::ONE_TO_MANY, array('id' => 'event_id', ), 'CASCADE', null, 'EventDocuments');
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
  'role_key' => 'events',
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

} // EventTableMap
