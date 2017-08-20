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
     * @return void
     * @throws PropelException
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
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('original_id', 'OriginalId', 'INTEGER', false, null, null);
        $this->addForeignKey('ancestor_class_id', 'AncestorClassId', 'INTEGER', 'school_classes', 'id', false, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 180, null);
        $this->addColumn('unit_name', 'UnitName', 'VARCHAR', false, 180, null);
        $this->addColumn('slug', 'Slug', 'VARCHAR', false, 180, null);
        $this->addColumn('year', 'Year', 'SMALLINT', true, null, null);
        $this->addColumn('level', 'Level', 'TINYINT', false, null, null);
        $this->addColumn('room_number', 'RoomNumber', 'VARCHAR', false, 5, null);
        $this->addColumn('teaching_unit', 'TeachingUnit', 'VARCHAR', false, 80, null);
        $this->addColumn('student_count', 'StudentCount', 'TINYINT', false, null, null);
        $this->addForeignKey('class_portrait_id', 'ClassPortraitId', 'INTEGER', 'documents', 'id', false, null, null);
        $this->addForeignKey('subject_id', 'SubjectId', 'INTEGER', 'subjects', 'id', false, null, null);
        $this->addColumn('class_type', 'ClassType', 'VARCHAR', false, 80, null);
        $this->addForeignKey('class_schedule_id', 'ClassScheduleId', 'INTEGER', 'documents', 'id', false, null, null);
        $this->addForeignKey('week_schedule_id', 'WeekScheduleId', 'INTEGER', 'documents', 'id', false, null, null);
        $this->addForeignKey('school_building_id', 'SchoolBuildingId', 'INTEGER', 'school_buildings', 'id', false, null, null);
        $this->addForeignKey('school_id', 'SchoolId', 'INTEGER', 'schools', 'id', false, null, null);
        $this->addColumn('is_regular_class', 'IsRegularClass', 'BOOLEAN', false, 1, false);
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
        $this->addRelation('SchoolClassRelatedByAncestorClassId', 'SchoolClass', RelationMap::MANY_TO_ONE, array('ancestor_class_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('DocumentRelatedByClassPortraitId', 'Document', RelationMap::MANY_TO_ONE, array('class_portrait_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('Subject', 'Subject', RelationMap::MANY_TO_ONE, array('subject_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('DocumentRelatedByClassScheduleId', 'Document', RelationMap::MANY_TO_ONE, array('class_schedule_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('DocumentRelatedByWeekScheduleId', 'Document', RelationMap::MANY_TO_ONE, array('week_schedule_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('SchoolBuilding', 'SchoolBuilding', RelationMap::MANY_TO_ONE, array('school_building_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('School', 'School', RelationMap::MANY_TO_ONE, array('school_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('UserRelatedByCreatedBy', 'User', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('UserRelatedByUpdatedBy', 'User', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('ClassStudent', 'ClassStudent', RelationMap::ONE_TO_MANY, array('id' => 'school_class_id', ), 'CASCADE', null, 'ClassStudents');
        $this->addRelation('ClassTeacher', 'ClassTeacher', RelationMap::ONE_TO_MANY, array('id' => 'school_class_id', ), 'CASCADE', null, 'ClassTeachers');
        $this->addRelation('SchoolClassSubjectClassesRelatedBySchoolClassId', 'SchoolClassSubjectClasses', RelationMap::ONE_TO_MANY, array('id' => 'school_class_id', ), 'CASCADE', null, 'SchoolClassSubjectClassessRelatedBySchoolClassId');
        $this->addRelation('SchoolClassSubjectClassesRelatedBySubjectClassId', 'SchoolClassSubjectClasses', RelationMap::ONE_TO_MANY, array('id' => 'subject_class_id', ), 'CASCADE', null, 'SchoolClassSubjectClassessRelatedBySubjectClassId');
        $this->addRelation('SchoolClassRelatedById', 'SchoolClass', RelationMap::ONE_TO_MANY, array('id' => 'ancestor_class_id', ), 'SET NULL', null, 'SchoolClasssRelatedById');
        $this->addRelation('SchoolClassUnitOriginalID', 'SchoolClassUnitOriginalID', RelationMap::ONE_TO_MANY, array('id' => 'school_class_id', ), 'CASCADE', null, 'SchoolClassUnitOriginalIDs');
        $this->addRelation('ClassLink', 'ClassLink', RelationMap::ONE_TO_MANY, array('id' => 'school_class_id', ), 'CASCADE', null, 'ClassLinks');
        $this->addRelation('ClassDocument', 'ClassDocument', RelationMap::ONE_TO_MANY, array('id' => 'school_class_id', ), 'CASCADE', null, 'ClassDocuments');
        $this->addRelation('Event', 'Event', RelationMap::ONE_TO_MANY, array('id' => 'school_class_id', ), 'CASCADE', null, 'Events');
        $this->addRelation('News', 'News', RelationMap::ONE_TO_MANY, array('id' => 'school_class_id', ), 'CASCADE', null, 'Newss');
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

} // SchoolClassTableMap
