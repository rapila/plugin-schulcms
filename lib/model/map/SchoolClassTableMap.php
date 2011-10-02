<?php



/**
 * This class defines the structure of the 'school_classes' table.
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
class SchoolClassTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.SchoolClassTableMap';

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
		$this->setName('school_classes');
		$this->setPhpName('SchoolClass');
		$this->setClassname('SchoolClass');
		$this->setPackage('model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('ORIGINAL_ID', 'OriginalId', 'INTEGER', false, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 80, null);
		$this->addColumn('UNIT_NAME', 'UnitName', 'VARCHAR', false, 80, null);
		$this->addColumn('SLUG', 'Slug', 'VARCHAR', false, 80, null);
		$this->addColumn('YEAR', 'Year', 'SMALLINT', true, null, null);
		$this->addColumn('LEVEL', 'Level', 'TINYINT', false, null, null);
		$this->addColumn('ROOM_NUMBER', 'RoomNumber', 'VARCHAR', false, 5, null);
		$this->addColumn('TEACHING_UNIT', 'TeachingUnit', 'VARCHAR', false, 80, null);
		$this->addForeignKey('CLASS_PORTRAIT_ID', 'ClassPortraitId', 'INTEGER', 'documents', 'ID', false, null, null);
		$this->addForeignKey('CLASS_TYPE_ID', 'ClassTypeId', 'TINYINT', 'class_types', 'ID', false, null, null);
		$this->addForeignKey('CLASS_SCHEDULE_ID', 'ClassScheduleId', 'INTEGER', 'documents', 'ID', false, null, null);
		$this->addForeignKey('WEEK_SCHEDULE_ID', 'WeekScheduleId', 'INTEGER', 'documents', 'ID', false, null, null);
		$this->addForeignKey('SCHOOL_BUILDING_ID', 'SchoolBuildingId', 'INTEGER', 'school_buildings', 'ID', false, null, null);
		$this->addForeignKey('SCHOOL_ID', 'SchoolId', 'INTEGER', 'schools', 'ID', false, null, null);
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
		$this->addRelation('DocumentRelatedByClassPortraitId', 'Document', RelationMap::MANY_TO_ONE, array('class_portrait_id' => 'id', ), 'SET NULL', null);
		$this->addRelation('ClassType', 'ClassType', RelationMap::MANY_TO_ONE, array('class_type_id' => 'id', ), 'SET NULL', null);
		$this->addRelation('DocumentRelatedByClassScheduleId', 'Document', RelationMap::MANY_TO_ONE, array('class_schedule_id' => 'id', ), 'SET NULL', null);
		$this->addRelation('DocumentRelatedByWeekScheduleId', 'Document', RelationMap::MANY_TO_ONE, array('week_schedule_id' => 'id', ), 'SET NULL', null);
		$this->addRelation('SchoolBuilding', 'SchoolBuilding', RelationMap::MANY_TO_ONE, array('school_building_id' => 'id', ), 'SET NULL', null);
		$this->addRelation('School', 'School', RelationMap::MANY_TO_ONE, array('school_id' => 'id', ), 'CASCADE', null);
		$this->addRelation('UserRelatedByCreatedBy', 'User', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
		$this->addRelation('UserRelatedByUpdatedBy', 'User', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
		$this->addRelation('ClassStudent', 'ClassStudent', RelationMap::ONE_TO_MANY, array('id' => 'school_class_id', ), 'CASCADE', null, 'ClassStudents');
		$this->addRelation('ClassLink', 'ClassLink', RelationMap::ONE_TO_MANY, array('id' => 'school_class_id', ), 'CASCADE', null, 'ClassLinks');
		$this->addRelation('ClassTeacher', 'ClassTeacher', RelationMap::ONE_TO_MANY, array('id' => 'school_class_id', ), 'CASCADE', null, 'ClassTeachers');
		$this->addRelation('Event', 'Event', RelationMap::ONE_TO_MANY, array('id' => 'school_class_id', ), 'CASCADE', null, 'Events');
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

} // SchoolClassTableMap
