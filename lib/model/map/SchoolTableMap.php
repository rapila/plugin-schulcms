<?php



/**
 * This class defines the structure of the 'schools' table.
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
class SchoolTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.SchoolTableMap';

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
		$this->setName('schools');
		$this->setPhpName('School');
		$this->setClassname('School');
		$this->setPackage('model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('ORIGINAL_ID', 'OriginalId', 'VARCHAR', true, 50, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 80, null);
		$this->addColumn('SCHOOL_UNIT', 'SchoolUnit', 'VARCHAR', false, 80, null);
		$this->addColumn('ADDRESS', 'Address', 'VARCHAR', false, 255, null);
		$this->addColumn('ZIP_CODE', 'ZipCode', 'VARCHAR', false, 5, null);
		$this->addColumn('CITY', 'City', 'VARCHAR', false, 255, null);
		$this->addColumn('PHONE_SCHULLEITUNG', 'PhoneSchulleitung', 'VARCHAR', false, 14, null);
		$this->addColumn('PHONE_LEHRERZIMMER', 'PhoneLehrerzimmer', 'VARCHAR', false, 14, null);
		$this->addColumn('CURRENT_YEAR', 'CurrentYear', 'SMALLINT', false, null, null);
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
    $this->addRelation('UserRelatedByCreatedBy', 'User', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
    $this->addRelation('UserRelatedByUpdatedBy', 'User', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
    $this->addRelation('SchoolFunction', 'SchoolFunction', RelationMap::ONE_TO_MANY, array('id' => 'school_id', ), 'CASCADE', null);
    $this->addRelation('SchoolClass', 'SchoolClass', RelationMap::ONE_TO_MANY, array('id' => 'school_id', ), 'CASCADE', null);
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

} // SchoolTableMap
