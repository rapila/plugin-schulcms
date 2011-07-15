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
class EventTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.EventTableMap';

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
		$this->setName('events');
		$this->setPhpName('Event');
		$this->setClassname('Event');
		$this->setPackage('model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', false, 255, null);
		$this->addColumn('TEASER', 'Teaser', 'VARCHAR', false, 514, null);
		$this->addColumn('BODY_PREVIEW', 'BodyPreview', 'BLOB', false, null, null);
		$this->addColumn('BODY_REVIEW', 'BodyReview', 'BLOB', false, null, null);
		$this->addColumn('LOCATION_INFO', 'LocationInfo', 'VARCHAR', false, 255, null);
		$this->addColumn('DATE_START', 'DateStart', 'DATE', true, null, null);
		$this->addColumn('DATE_END', 'DateEnd', 'DATE', false, null, null);
		$this->addColumn('TIME_DETAILS', 'TimeDetails', 'VARCHAR', false, 255, null);
		$this->addColumn('IS_ACTIVE', 'IsActive', 'BOOLEAN', false, 1, false);
		$this->addColumn('SHOW_ON_FRONTPAGE', 'ShowOnFrontpage', 'BOOLEAN', false, 1, false);
		$this->addForeignKey('EVENT_TYPE_ID', 'EventTypeId', 'INTEGER', 'event_types', 'ID', false, null, null);
		$this->addForeignKey('SERVICE_ID', 'ServiceId', 'INTEGER', 'services', 'ID', false, null, null);
		$this->addForeignKey('SCHOOL_CLASS_ID', 'SchoolClassId', 'INTEGER', 'school_classes', 'ID', false, null, null);
		$this->addForeignKey('GALLERY_ID', 'GalleryId', 'INTEGER', 'document_categories', 'ID', false, null, null);
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
    $this->addRelation('EventType', 'EventType', RelationMap::MANY_TO_ONE, array('event_type_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('Service', 'Service', RelationMap::MANY_TO_ONE, array('service_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('SchoolClass', 'SchoolClass', RelationMap::MANY_TO_ONE, array('school_class_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('DocumentCategory', 'DocumentCategory', RelationMap::MANY_TO_ONE, array('gallery_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('UserRelatedByCreatedBy', 'User', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
    $this->addRelation('UserRelatedByUpdatedBy', 'User', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
    $this->addRelation('EventDocument', 'EventDocument', RelationMap::ONE_TO_MANY, array('id' => 'event_id', ), 'CASCADE', null);
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
			'extended_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
			'attributable' => array('create_column' => 'created_by', 'update_column' => 'updated_by', ),
		);
	} // getBehaviors()

} // EventTableMap
