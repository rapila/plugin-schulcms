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
class ServiceTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.ServiceTableMap';

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
		$this->setName('services');
		$this->setPhpName('Service');
		$this->setClassname('Service');
		$this->setPackage('model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 80, null);
		$this->addColumn('SLUG', 'Slug', 'VARCHAR', false, 80, null);
		$this->addColumn('TEASER', 'Teaser', 'VARCHAR', false, 255, null);
		$this->addColumn('ADDRESS', 'Address', 'VARCHAR', false, 255, null);
		$this->addColumn('OPENING_HOURS', 'OpeningHours', 'VARCHAR', false, 255, null);
		$this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 20, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 255, null);
		$this->addColumn('WEBSITE', 'Website', 'VARCHAR', false, 255, null);
		$this->addColumn('BODY', 'Body', 'BLOB', false, null, null);
		$this->addColumn('IS_ACTIVE', 'IsActive', 'BOOLEAN', false, 1, false);
		$this->addForeignKey('LOGO_ID', 'LogoId', 'INTEGER', 'documents', 'ID', false, null, null);
		$this->addForeignKey('SERVICE_CATEGORY_ID', 'ServiceCategoryId', 'INTEGER', 'service_categories', 'ID', false, null, null);
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
    $this->addRelation('Document', 'Document', RelationMap::MANY_TO_ONE, array('logo_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('ServiceCategory', 'ServiceCategory', RelationMap::MANY_TO_ONE, array('service_category_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('UserRelatedByCreatedBy', 'User', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
    $this->addRelation('UserRelatedByUpdatedBy', 'User', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
    $this->addRelation('Event', 'Event', RelationMap::ONE_TO_MANY, array('id' => 'service_id', ), 'CASCADE', null);
    $this->addRelation('ServiceMember', 'ServiceMember', RelationMap::ONE_TO_MANY, array('id' => 'service_id', ), 'CASCADE', null);
    $this->addRelation('ServiceDocument', 'ServiceDocument', RelationMap::ONE_TO_MANY, array('id' => 'service_id', ), 'CASCADE', null);
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

} // ServiceTableMap
