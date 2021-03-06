<?php


/**
 * Base static class for performing query and update operations on the 'school_classes' table.
 *
 *
 *
 * @package propel.generator.model.om
 */
abstract class BaseSchoolClassPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'rapila';

    /** the table name for this class */
    const TABLE_NAME = 'school_classes';

    /** the related Propel class for this table */
    const OM_CLASS = 'SchoolClass';

    /** the related TableMap class for this table */
    const TM_CLASS = 'SchoolClassTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 23;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 23;

    /** the column name for the id field */
    const ID = 'school_classes.id';

    /** the column name for the original_id field */
    const ORIGINAL_ID = 'school_classes.original_id';

    /** the column name for the ancestor_class_id field */
    const ANCESTOR_CLASS_ID = 'school_classes.ancestor_class_id';

    /** the column name for the name field */
    const NAME = 'school_classes.name';

    /** the column name for the unit_name field */
    const UNIT_NAME = 'school_classes.unit_name';

    /** the column name for the slug field */
    const SLUG = 'school_classes.slug';

    /** the column name for the year field */
    const YEAR = 'school_classes.year';

    /** the column name for the level field */
    const LEVEL = 'school_classes.level';

    /** the column name for the room_number field */
    const ROOM_NUMBER = 'school_classes.room_number';

    /** the column name for the teaching_unit field */
    const TEACHING_UNIT = 'school_classes.teaching_unit';

    /** the column name for the student_count field */
    const STUDENT_COUNT = 'school_classes.student_count';

    /** the column name for the class_portrait_id field */
    const CLASS_PORTRAIT_ID = 'school_classes.class_portrait_id';

    /** the column name for the subject_id field */
    const SUBJECT_ID = 'school_classes.subject_id';

    /** the column name for the class_type field */
    const CLASS_TYPE = 'school_classes.class_type';

    /** the column name for the class_schedule_id field */
    const CLASS_SCHEDULE_ID = 'school_classes.class_schedule_id';

    /** the column name for the week_schedule_id field */
    const WEEK_SCHEDULE_ID = 'school_classes.week_schedule_id';

    /** the column name for the school_building_id field */
    const SCHOOL_BUILDING_ID = 'school_classes.school_building_id';

    /** the column name for the school_id field */
    const SCHOOL_ID = 'school_classes.school_id';

    /** the column name for the is_regular_class field */
    const IS_REGULAR_CLASS = 'school_classes.is_regular_class';

    /** the column name for the created_at field */
    const CREATED_AT = 'school_classes.created_at';

    /** the column name for the updated_at field */
    const UPDATED_AT = 'school_classes.updated_at';

    /** the column name for the created_by field */
    const CREATED_BY = 'school_classes.created_by';

    /** the column name for the updated_by field */
    const UPDATED_BY = 'school_classes.updated_by';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of SchoolClass objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array SchoolClass[]
     */
    public static $instances = array();


    // denyable behavior
    private static $IGNORE_RIGHTS = false;
    private static $RIGHTS_USER = false;

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. SchoolClassPeer::$fieldNames[SchoolClassPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'OriginalId', 'AncestorClassId', 'Name', 'UnitName', 'Slug', 'Year', 'Level', 'RoomNumber', 'TeachingUnit', 'StudentCount', 'ClassPortraitId', 'SubjectId', 'ClassType', 'ClassScheduleId', 'WeekScheduleId', 'SchoolBuildingId', 'SchoolId', 'IsRegularClass', 'CreatedAt', 'UpdatedAt', 'CreatedBy', 'UpdatedBy', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'originalId', 'ancestorClassId', 'name', 'unitName', 'slug', 'year', 'level', 'roomNumber', 'teachingUnit', 'studentCount', 'classPortraitId', 'subjectId', 'classType', 'classScheduleId', 'weekScheduleId', 'schoolBuildingId', 'schoolId', 'isRegularClass', 'createdAt', 'updatedAt', 'createdBy', 'updatedBy', ),
        BasePeer::TYPE_COLNAME => array (SchoolClassPeer::ID, SchoolClassPeer::ORIGINAL_ID, SchoolClassPeer::ANCESTOR_CLASS_ID, SchoolClassPeer::NAME, SchoolClassPeer::UNIT_NAME, SchoolClassPeer::SLUG, SchoolClassPeer::YEAR, SchoolClassPeer::LEVEL, SchoolClassPeer::ROOM_NUMBER, SchoolClassPeer::TEACHING_UNIT, SchoolClassPeer::STUDENT_COUNT, SchoolClassPeer::CLASS_PORTRAIT_ID, SchoolClassPeer::SUBJECT_ID, SchoolClassPeer::CLASS_TYPE, SchoolClassPeer::CLASS_SCHEDULE_ID, SchoolClassPeer::WEEK_SCHEDULE_ID, SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolClassPeer::SCHOOL_ID, SchoolClassPeer::IS_REGULAR_CLASS, SchoolClassPeer::CREATED_AT, SchoolClassPeer::UPDATED_AT, SchoolClassPeer::CREATED_BY, SchoolClassPeer::UPDATED_BY, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'ORIGINAL_ID', 'ANCESTOR_CLASS_ID', 'NAME', 'UNIT_NAME', 'SLUG', 'YEAR', 'LEVEL', 'ROOM_NUMBER', 'TEACHING_UNIT', 'STUDENT_COUNT', 'CLASS_PORTRAIT_ID', 'SUBJECT_ID', 'CLASS_TYPE', 'CLASS_SCHEDULE_ID', 'WEEK_SCHEDULE_ID', 'SCHOOL_BUILDING_ID', 'SCHOOL_ID', 'IS_REGULAR_CLASS', 'CREATED_AT', 'UPDATED_AT', 'CREATED_BY', 'UPDATED_BY', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'original_id', 'ancestor_class_id', 'name', 'unit_name', 'slug', 'year', 'level', 'room_number', 'teaching_unit', 'student_count', 'class_portrait_id', 'subject_id', 'class_type', 'class_schedule_id', 'week_schedule_id', 'school_building_id', 'school_id', 'is_regular_class', 'created_at', 'updated_at', 'created_by', 'updated_by', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. SchoolClassPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'OriginalId' => 1, 'AncestorClassId' => 2, 'Name' => 3, 'UnitName' => 4, 'Slug' => 5, 'Year' => 6, 'Level' => 7, 'RoomNumber' => 8, 'TeachingUnit' => 9, 'StudentCount' => 10, 'ClassPortraitId' => 11, 'SubjectId' => 12, 'ClassType' => 13, 'ClassScheduleId' => 14, 'WeekScheduleId' => 15, 'SchoolBuildingId' => 16, 'SchoolId' => 17, 'IsRegularClass' => 18, 'CreatedAt' => 19, 'UpdatedAt' => 20, 'CreatedBy' => 21, 'UpdatedBy' => 22, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'originalId' => 1, 'ancestorClassId' => 2, 'name' => 3, 'unitName' => 4, 'slug' => 5, 'year' => 6, 'level' => 7, 'roomNumber' => 8, 'teachingUnit' => 9, 'studentCount' => 10, 'classPortraitId' => 11, 'subjectId' => 12, 'classType' => 13, 'classScheduleId' => 14, 'weekScheduleId' => 15, 'schoolBuildingId' => 16, 'schoolId' => 17, 'isRegularClass' => 18, 'createdAt' => 19, 'updatedAt' => 20, 'createdBy' => 21, 'updatedBy' => 22, ),
        BasePeer::TYPE_COLNAME => array (SchoolClassPeer::ID => 0, SchoolClassPeer::ORIGINAL_ID => 1, SchoolClassPeer::ANCESTOR_CLASS_ID => 2, SchoolClassPeer::NAME => 3, SchoolClassPeer::UNIT_NAME => 4, SchoolClassPeer::SLUG => 5, SchoolClassPeer::YEAR => 6, SchoolClassPeer::LEVEL => 7, SchoolClassPeer::ROOM_NUMBER => 8, SchoolClassPeer::TEACHING_UNIT => 9, SchoolClassPeer::STUDENT_COUNT => 10, SchoolClassPeer::CLASS_PORTRAIT_ID => 11, SchoolClassPeer::SUBJECT_ID => 12, SchoolClassPeer::CLASS_TYPE => 13, SchoolClassPeer::CLASS_SCHEDULE_ID => 14, SchoolClassPeer::WEEK_SCHEDULE_ID => 15, SchoolClassPeer::SCHOOL_BUILDING_ID => 16, SchoolClassPeer::SCHOOL_ID => 17, SchoolClassPeer::IS_REGULAR_CLASS => 18, SchoolClassPeer::CREATED_AT => 19, SchoolClassPeer::UPDATED_AT => 20, SchoolClassPeer::CREATED_BY => 21, SchoolClassPeer::UPDATED_BY => 22, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'ORIGINAL_ID' => 1, 'ANCESTOR_CLASS_ID' => 2, 'NAME' => 3, 'UNIT_NAME' => 4, 'SLUG' => 5, 'YEAR' => 6, 'LEVEL' => 7, 'ROOM_NUMBER' => 8, 'TEACHING_UNIT' => 9, 'STUDENT_COUNT' => 10, 'CLASS_PORTRAIT_ID' => 11, 'SUBJECT_ID' => 12, 'CLASS_TYPE' => 13, 'CLASS_SCHEDULE_ID' => 14, 'WEEK_SCHEDULE_ID' => 15, 'SCHOOL_BUILDING_ID' => 16, 'SCHOOL_ID' => 17, 'IS_REGULAR_CLASS' => 18, 'CREATED_AT' => 19, 'UPDATED_AT' => 20, 'CREATED_BY' => 21, 'UPDATED_BY' => 22, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'original_id' => 1, 'ancestor_class_id' => 2, 'name' => 3, 'unit_name' => 4, 'slug' => 5, 'year' => 6, 'level' => 7, 'room_number' => 8, 'teaching_unit' => 9, 'student_count' => 10, 'class_portrait_id' => 11, 'subject_id' => 12, 'class_type' => 13, 'class_schedule_id' => 14, 'week_schedule_id' => 15, 'school_building_id' => 16, 'school_id' => 17, 'is_regular_class' => 18, 'created_at' => 19, 'updated_at' => 20, 'created_by' => 21, 'updated_by' => 22, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = SchoolClassPeer::getFieldNames($toType);
        $key = isset(SchoolClassPeer::$fieldKeys[$fromType][$name]) ? SchoolClassPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(SchoolClassPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, SchoolClassPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return SchoolClassPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. SchoolClassPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(SchoolClassPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(SchoolClassPeer::ID);
            $criteria->addSelectColumn(SchoolClassPeer::ORIGINAL_ID);
            $criteria->addSelectColumn(SchoolClassPeer::ANCESTOR_CLASS_ID);
            $criteria->addSelectColumn(SchoolClassPeer::NAME);
            $criteria->addSelectColumn(SchoolClassPeer::UNIT_NAME);
            $criteria->addSelectColumn(SchoolClassPeer::SLUG);
            $criteria->addSelectColumn(SchoolClassPeer::YEAR);
            $criteria->addSelectColumn(SchoolClassPeer::LEVEL);
            $criteria->addSelectColumn(SchoolClassPeer::ROOM_NUMBER);
            $criteria->addSelectColumn(SchoolClassPeer::TEACHING_UNIT);
            $criteria->addSelectColumn(SchoolClassPeer::STUDENT_COUNT);
            $criteria->addSelectColumn(SchoolClassPeer::CLASS_PORTRAIT_ID);
            $criteria->addSelectColumn(SchoolClassPeer::SUBJECT_ID);
            $criteria->addSelectColumn(SchoolClassPeer::CLASS_TYPE);
            $criteria->addSelectColumn(SchoolClassPeer::CLASS_SCHEDULE_ID);
            $criteria->addSelectColumn(SchoolClassPeer::WEEK_SCHEDULE_ID);
            $criteria->addSelectColumn(SchoolClassPeer::SCHOOL_BUILDING_ID);
            $criteria->addSelectColumn(SchoolClassPeer::SCHOOL_ID);
            $criteria->addSelectColumn(SchoolClassPeer::IS_REGULAR_CLASS);
            $criteria->addSelectColumn(SchoolClassPeer::CREATED_AT);
            $criteria->addSelectColumn(SchoolClassPeer::UPDATED_AT);
            $criteria->addSelectColumn(SchoolClassPeer::CREATED_BY);
            $criteria->addSelectColumn(SchoolClassPeer::UPDATED_BY);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.original_id');
            $criteria->addSelectColumn($alias . '.ancestor_class_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.unit_name');
            $criteria->addSelectColumn($alias . '.slug');
            $criteria->addSelectColumn($alias . '.year');
            $criteria->addSelectColumn($alias . '.level');
            $criteria->addSelectColumn($alias . '.room_number');
            $criteria->addSelectColumn($alias . '.teaching_unit');
            $criteria->addSelectColumn($alias . '.student_count');
            $criteria->addSelectColumn($alias . '.class_portrait_id');
            $criteria->addSelectColumn($alias . '.subject_id');
            $criteria->addSelectColumn($alias . '.class_type');
            $criteria->addSelectColumn($alias . '.class_schedule_id');
            $criteria->addSelectColumn($alias . '.week_schedule_id');
            $criteria->addSelectColumn($alias . '.school_building_id');
            $criteria->addSelectColumn($alias . '.school_id');
            $criteria->addSelectColumn($alias . '.is_regular_class');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
            $criteria->addSelectColumn($alias . '.created_by');
            $criteria->addSelectColumn($alias . '.updated_by');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return SchoolClass
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = SchoolClassPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return SchoolClassPeer::populateObjects(SchoolClassPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            SchoolClassPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param SchoolClass $obj A SchoolClass object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            SchoolClassPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A SchoolClass object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof SchoolClass) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or SchoolClass object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(SchoolClassPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return SchoolClass Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(SchoolClassPeer::$instances[$key])) {
                return SchoolClassPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references) {
        foreach (SchoolClassPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        SchoolClassPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to school_classes
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in ClassStudentPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ClassStudentPeer::clearInstancePool();
        // Invalidate objects in ClassTeacherPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ClassTeacherPeer::clearInstancePool();
        // Invalidate objects in SchoolClassSubjectClassesPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        SchoolClassSubjectClassesPeer::clearInstancePool();
        // Invalidate objects in SchoolClassSubjectClassesPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        SchoolClassSubjectClassesPeer::clearInstancePool();
        // Invalidate objects in SchoolClassPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        SchoolClassPeer::clearInstancePool();
        // Invalidate objects in SchoolClassUnitOriginalIDPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        SchoolClassUnitOriginalIDPeer::clearInstancePool();
        // Invalidate objects in ClassLinkPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ClassLinkPeer::clearInstancePool();
        // Invalidate objects in ClassDocumentPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ClassDocumentPeer::clearInstancePool();
        // Invalidate objects in EventPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        EventPeer::clearInstancePool();
        // Invalidate objects in NewsPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        NewsPeer::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = SchoolClassPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = SchoolClassPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SchoolClassPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (SchoolClass object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = SchoolClassPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = SchoolClassPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + SchoolClassPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SchoolClassPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            SchoolClassPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related DocumentRelatedByClassPortraitId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinDocumentRelatedByClassPortraitId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Subject table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSubject(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related DocumentRelatedByClassScheduleId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinDocumentRelatedByClassScheduleId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::CLASS_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related DocumentRelatedByWeekScheduleId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinDocumentRelatedByWeekScheduleId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::WEEK_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related SchoolBuilding table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSchoolBuilding(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related School table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSchool(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related UserRelatedByCreatedBy table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related UserRelatedByUpdatedBy table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinUserRelatedByUpdatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with their Document objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinDocumentRelatedByClassPortraitId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol = SchoolClassPeer::NUM_HYDRATE_COLUMNS;
        DocumentPeer::addSelectColumns($criteria);

        $criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = DocumentPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = DocumentPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    DocumentPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SchoolClass) to $obj2 (Document)
                $obj2->addSchoolClassRelatedByClassPortraitId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with their Subject objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSubject(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol = SchoolClassPeer::NUM_HYDRATE_COLUMNS;
        SubjectPeer::addSelectColumns($criteria);

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SubjectPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SubjectPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SubjectPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SubjectPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SchoolClass) to $obj2 (Subject)
                $obj2->addSchoolClass($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with their Document objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinDocumentRelatedByClassScheduleId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol = SchoolClassPeer::NUM_HYDRATE_COLUMNS;
        DocumentPeer::addSelectColumns($criteria);

        $criteria->addJoin(SchoolClassPeer::CLASS_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = DocumentPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = DocumentPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    DocumentPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SchoolClass) to $obj2 (Document)
                $obj2->addSchoolClassRelatedByClassScheduleId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with their Document objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinDocumentRelatedByWeekScheduleId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol = SchoolClassPeer::NUM_HYDRATE_COLUMNS;
        DocumentPeer::addSelectColumns($criteria);

        $criteria->addJoin(SchoolClassPeer::WEEK_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = DocumentPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = DocumentPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    DocumentPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SchoolClass) to $obj2 (Document)
                $obj2->addSchoolClassRelatedByWeekScheduleId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with their SchoolBuilding objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSchoolBuilding(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol = SchoolClassPeer::NUM_HYDRATE_COLUMNS;
        SchoolBuildingPeer::addSelectColumns($criteria);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SchoolBuildingPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SchoolBuildingPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SchoolBuildingPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SchoolBuildingPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SchoolClass) to $obj2 (SchoolBuilding)
                $obj2->addSchoolClass($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with their School objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSchool(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol = SchoolClassPeer::NUM_HYDRATE_COLUMNS;
        SchoolPeer::addSelectColumns($criteria);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SchoolPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SchoolPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SchoolPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SchoolPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SchoolClass) to $obj2 (School)
                $obj2->addSchoolClass($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with their User objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinUserRelatedByCreatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol = SchoolClassPeer::NUM_HYDRATE_COLUMNS;
        UserPeer::addSelectColumns($criteria);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = UserPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = UserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    UserPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SchoolClass) to $obj2 (User)
                $obj2->addSchoolClassRelatedByCreatedBy($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with their User objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinUserRelatedByUpdatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol = SchoolClassPeer::NUM_HYDRATE_COLUMNS;
        UserPeer::addSelectColumns($criteria);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = UserPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = UserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    UserPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SchoolClass) to $obj2 (User)
                $obj2->addSchoolClassRelatedByUpdatedBy($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CLASS_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::WEEK_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of SchoolClass objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        SubjectPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SubjectPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        SchoolBuildingPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SchoolBuildingPeer::NUM_HYDRATE_COLUMNS;

        SchoolPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + SchoolPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + UserPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + UserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CLASS_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::WEEK_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Document rows

            $key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = DocumentPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = DocumentPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    DocumentPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj2 (Document)
                $obj2->addSchoolClassRelatedByClassPortraitId($obj1);
            } // if joined row not null

            // Add objects for joined Subject rows

            $key3 = SubjectPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = SubjectPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = SubjectPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SubjectPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj3 (Subject)
                $obj3->addSchoolClass($obj1);
            } // if joined row not null

            // Add objects for joined Document rows

            $key4 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = DocumentPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = DocumentPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    DocumentPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj4 (Document)
                $obj4->addSchoolClassRelatedByClassScheduleId($obj1);
            } // if joined row not null

            // Add objects for joined Document rows

            $key5 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = DocumentPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = DocumentPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    DocumentPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj5 (Document)
                $obj5->addSchoolClassRelatedByWeekScheduleId($obj1);
            } // if joined row not null

            // Add objects for joined SchoolBuilding rows

            $key6 = SchoolBuildingPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = SchoolBuildingPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = SchoolBuildingPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SchoolBuildingPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj6 (SchoolBuilding)
                $obj6->addSchoolClass($obj1);
            } // if joined row not null

            // Add objects for joined School rows

            $key7 = SchoolPeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = SchoolPeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = SchoolPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    SchoolPeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj7 (School)
                $obj7->addSchoolClass($obj1);
            } // if joined row not null

            // Add objects for joined User rows

            $key8 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol8);
            if ($key8 !== null) {
                $obj8 = UserPeer::getInstanceFromPool($key8);
                if (!$obj8) {

                    $cls = UserPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    UserPeer::addInstanceToPool($obj8, $key8);
                } // if obj8 loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj8 (User)
                $obj8->addSchoolClassRelatedByCreatedBy($obj1);
            } // if joined row not null

            // Add objects for joined User rows

            $key9 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol9);
            if ($key9 !== null) {
                $obj9 = UserPeer::getInstanceFromPool($key9);
                if (!$obj9) {

                    $cls = UserPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    UserPeer::addInstanceToPool($obj9, $key9);
                } // if obj9 loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj9 (User)
                $obj9->addSchoolClassRelatedByUpdatedBy($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related SchoolClassRelatedByAncestorClassId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSchoolClassRelatedByAncestorClassId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CLASS_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::WEEK_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related DocumentRelatedByClassPortraitId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptDocumentRelatedByClassPortraitId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Subject table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSubject(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CLASS_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::WEEK_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related DocumentRelatedByClassScheduleId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptDocumentRelatedByClassScheduleId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related DocumentRelatedByWeekScheduleId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptDocumentRelatedByWeekScheduleId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related SchoolBuilding table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSchoolBuilding(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CLASS_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::WEEK_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related School table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSchool(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CLASS_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::WEEK_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related UserRelatedByCreatedBy table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CLASS_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::WEEK_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related UserRelatedByUpdatedBy table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptUserRelatedByUpdatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CLASS_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::WEEK_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with all related objects except SchoolClassRelatedByAncestorClassId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSchoolClassRelatedByAncestorClassId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        SubjectPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SubjectPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        SchoolBuildingPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SchoolBuildingPeer::NUM_HYDRATE_COLUMNS;

        SchoolPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + SchoolPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + UserPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + UserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CLASS_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::WEEK_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Document rows

                $key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = DocumentPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = DocumentPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    DocumentPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj2 (Document)
                $obj2->addSchoolClassRelatedByClassPortraitId($obj1);

            } // if joined row is not null

                // Add objects for joined Subject rows

                $key3 = SubjectPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SubjectPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = SubjectPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SubjectPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj3 (Subject)
                $obj3->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined Document rows

                $key4 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = DocumentPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = DocumentPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    DocumentPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj4 (Document)
                $obj4->addSchoolClassRelatedByClassScheduleId($obj1);

            } // if joined row is not null

                // Add objects for joined Document rows

                $key5 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = DocumentPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = DocumentPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    DocumentPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj5 (Document)
                $obj5->addSchoolClassRelatedByWeekScheduleId($obj1);

            } // if joined row is not null

                // Add objects for joined SchoolBuilding rows

                $key6 = SchoolBuildingPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = SchoolBuildingPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = SchoolBuildingPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SchoolBuildingPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj6 (SchoolBuilding)
                $obj6->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined School rows

                $key7 = SchoolPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = SchoolPeer::getInstanceFromPool($key7);
                    if (!$obj7) {

                        $cls = SchoolPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    SchoolPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj7 (School)
                $obj7->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key8 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = UserPeer::getInstanceFromPool($key8);
                    if (!$obj8) {

                        $cls = UserPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    UserPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj8 (User)
                $obj8->addSchoolClassRelatedByCreatedBy($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key9 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = UserPeer::getInstanceFromPool($key9);
                    if (!$obj9) {

                        $cls = UserPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    UserPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj9 (User)
                $obj9->addSchoolClassRelatedByUpdatedBy($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with all related objects except DocumentRelatedByClassPortraitId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptDocumentRelatedByClassPortraitId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

        SubjectPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SubjectPeer::NUM_HYDRATE_COLUMNS;

        SchoolBuildingPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SchoolBuildingPeer::NUM_HYDRATE_COLUMNS;

        SchoolPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SchoolPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + UserPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + UserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Subject rows

                $key2 = SubjectPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SubjectPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = SubjectPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SubjectPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj2 (Subject)
                $obj2->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined SchoolBuilding rows

                $key3 = SchoolBuildingPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SchoolBuildingPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = SchoolBuildingPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SchoolBuildingPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj3 (SchoolBuilding)
                $obj3->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined School rows

                $key4 = SchoolPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SchoolPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = SchoolPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SchoolPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj4 (School)
                $obj4->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key5 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = UserPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = UserPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    UserPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj5 (User)
                $obj5->addSchoolClassRelatedByCreatedBy($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key6 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = UserPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = UserPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    UserPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj6 (User)
                $obj6->addSchoolClassRelatedByUpdatedBy($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with all related objects except Subject.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSubject(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        SchoolBuildingPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SchoolBuildingPeer::NUM_HYDRATE_COLUMNS;

        SchoolPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SchoolPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + UserPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + UserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CLASS_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::WEEK_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Document rows

                $key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = DocumentPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = DocumentPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    DocumentPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj2 (Document)
                $obj2->addSchoolClassRelatedByClassPortraitId($obj1);

            } // if joined row is not null

                // Add objects for joined Document rows

                $key3 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = DocumentPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = DocumentPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    DocumentPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj3 (Document)
                $obj3->addSchoolClassRelatedByClassScheduleId($obj1);

            } // if joined row is not null

                // Add objects for joined Document rows

                $key4 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = DocumentPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = DocumentPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    DocumentPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj4 (Document)
                $obj4->addSchoolClassRelatedByWeekScheduleId($obj1);

            } // if joined row is not null

                // Add objects for joined SchoolBuilding rows

                $key5 = SchoolBuildingPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SchoolBuildingPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = SchoolBuildingPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SchoolBuildingPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj5 (SchoolBuilding)
                $obj5->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined School rows

                $key6 = SchoolPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = SchoolPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = SchoolPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SchoolPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj6 (School)
                $obj6->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key7 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = UserPeer::getInstanceFromPool($key7);
                    if (!$obj7) {

                        $cls = UserPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    UserPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj7 (User)
                $obj7->addSchoolClassRelatedByCreatedBy($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key8 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = UserPeer::getInstanceFromPool($key8);
                    if (!$obj8) {

                        $cls = UserPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    UserPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj8 (User)
                $obj8->addSchoolClassRelatedByUpdatedBy($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with all related objects except DocumentRelatedByClassScheduleId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptDocumentRelatedByClassScheduleId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

        SubjectPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SubjectPeer::NUM_HYDRATE_COLUMNS;

        SchoolBuildingPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SchoolBuildingPeer::NUM_HYDRATE_COLUMNS;

        SchoolPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SchoolPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + UserPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + UserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Subject rows

                $key2 = SubjectPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SubjectPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = SubjectPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SubjectPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj2 (Subject)
                $obj2->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined SchoolBuilding rows

                $key3 = SchoolBuildingPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SchoolBuildingPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = SchoolBuildingPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SchoolBuildingPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj3 (SchoolBuilding)
                $obj3->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined School rows

                $key4 = SchoolPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SchoolPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = SchoolPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SchoolPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj4 (School)
                $obj4->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key5 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = UserPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = UserPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    UserPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj5 (User)
                $obj5->addSchoolClassRelatedByCreatedBy($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key6 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = UserPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = UserPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    UserPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj6 (User)
                $obj6->addSchoolClassRelatedByUpdatedBy($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with all related objects except DocumentRelatedByWeekScheduleId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptDocumentRelatedByWeekScheduleId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

        SubjectPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SubjectPeer::NUM_HYDRATE_COLUMNS;

        SchoolBuildingPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SchoolBuildingPeer::NUM_HYDRATE_COLUMNS;

        SchoolPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SchoolPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + UserPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + UserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Subject rows

                $key2 = SubjectPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SubjectPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = SubjectPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SubjectPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj2 (Subject)
                $obj2->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined SchoolBuilding rows

                $key3 = SchoolBuildingPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SchoolBuildingPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = SchoolBuildingPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SchoolBuildingPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj3 (SchoolBuilding)
                $obj3->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined School rows

                $key4 = SchoolPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SchoolPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = SchoolPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SchoolPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj4 (School)
                $obj4->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key5 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = UserPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = UserPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    UserPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj5 (User)
                $obj5->addSchoolClassRelatedByCreatedBy($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key6 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = UserPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = UserPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    UserPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj6 (User)
                $obj6->addSchoolClassRelatedByUpdatedBy($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with all related objects except SchoolBuilding.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSchoolBuilding(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        SubjectPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SubjectPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        SchoolPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SchoolPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + UserPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + UserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CLASS_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::WEEK_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Document rows

                $key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = DocumentPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = DocumentPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    DocumentPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj2 (Document)
                $obj2->addSchoolClassRelatedByClassPortraitId($obj1);

            } // if joined row is not null

                // Add objects for joined Subject rows

                $key3 = SubjectPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SubjectPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = SubjectPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SubjectPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj3 (Subject)
                $obj3->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined Document rows

                $key4 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = DocumentPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = DocumentPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    DocumentPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj4 (Document)
                $obj4->addSchoolClassRelatedByClassScheduleId($obj1);

            } // if joined row is not null

                // Add objects for joined Document rows

                $key5 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = DocumentPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = DocumentPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    DocumentPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj5 (Document)
                $obj5->addSchoolClassRelatedByWeekScheduleId($obj1);

            } // if joined row is not null

                // Add objects for joined School rows

                $key6 = SchoolPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = SchoolPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = SchoolPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SchoolPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj6 (School)
                $obj6->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key7 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = UserPeer::getInstanceFromPool($key7);
                    if (!$obj7) {

                        $cls = UserPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    UserPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj7 (User)
                $obj7->addSchoolClassRelatedByCreatedBy($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key8 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = UserPeer::getInstanceFromPool($key8);
                    if (!$obj8) {

                        $cls = UserPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    UserPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj8 (User)
                $obj8->addSchoolClassRelatedByUpdatedBy($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with all related objects except School.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSchool(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        SubjectPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SubjectPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        SchoolBuildingPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SchoolBuildingPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + UserPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + UserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CLASS_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::WEEK_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::UPDATED_BY, UserPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Document rows

                $key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = DocumentPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = DocumentPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    DocumentPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj2 (Document)
                $obj2->addSchoolClassRelatedByClassPortraitId($obj1);

            } // if joined row is not null

                // Add objects for joined Subject rows

                $key3 = SubjectPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SubjectPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = SubjectPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SubjectPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj3 (Subject)
                $obj3->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined Document rows

                $key4 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = DocumentPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = DocumentPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    DocumentPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj4 (Document)
                $obj4->addSchoolClassRelatedByClassScheduleId($obj1);

            } // if joined row is not null

                // Add objects for joined Document rows

                $key5 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = DocumentPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = DocumentPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    DocumentPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj5 (Document)
                $obj5->addSchoolClassRelatedByWeekScheduleId($obj1);

            } // if joined row is not null

                // Add objects for joined SchoolBuilding rows

                $key6 = SchoolBuildingPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = SchoolBuildingPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = SchoolBuildingPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SchoolBuildingPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj6 (SchoolBuilding)
                $obj6->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key7 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = UserPeer::getInstanceFromPool($key7);
                    if (!$obj7) {

                        $cls = UserPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    UserPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj7 (User)
                $obj7->addSchoolClassRelatedByCreatedBy($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key8 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = UserPeer::getInstanceFromPool($key8);
                    if (!$obj8) {

                        $cls = UserPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    UserPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj8 (User)
                $obj8->addSchoolClassRelatedByUpdatedBy($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with all related objects except UserRelatedByCreatedBy.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptUserRelatedByCreatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        SubjectPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SubjectPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        SchoolBuildingPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SchoolBuildingPeer::NUM_HYDRATE_COLUMNS;

        SchoolPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + SchoolPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CLASS_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::WEEK_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Document rows

                $key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = DocumentPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = DocumentPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    DocumentPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj2 (Document)
                $obj2->addSchoolClassRelatedByClassPortraitId($obj1);

            } // if joined row is not null

                // Add objects for joined Subject rows

                $key3 = SubjectPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SubjectPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = SubjectPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SubjectPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj3 (Subject)
                $obj3->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined Document rows

                $key4 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = DocumentPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = DocumentPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    DocumentPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj4 (Document)
                $obj4->addSchoolClassRelatedByClassScheduleId($obj1);

            } // if joined row is not null

                // Add objects for joined Document rows

                $key5 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = DocumentPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = DocumentPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    DocumentPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj5 (Document)
                $obj5->addSchoolClassRelatedByWeekScheduleId($obj1);

            } // if joined row is not null

                // Add objects for joined SchoolBuilding rows

                $key6 = SchoolBuildingPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = SchoolBuildingPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = SchoolBuildingPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SchoolBuildingPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj6 (SchoolBuilding)
                $obj6->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined School rows

                $key7 = SchoolPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = SchoolPeer::getInstanceFromPool($key7);
                    if (!$obj7) {

                        $cls = SchoolPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    SchoolPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj7 (School)
                $obj7->addSchoolClass($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClass objects pre-filled with all related objects except UserRelatedByUpdatedBy.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClass objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptUserRelatedByUpdatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);
        }

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        SubjectPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SubjectPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        DocumentPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + DocumentPeer::NUM_HYDRATE_COLUMNS;

        SchoolBuildingPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SchoolBuildingPeer::NUM_HYDRATE_COLUMNS;

        SchoolPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + SchoolPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SUBJECT_ID, SubjectPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::CLASS_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::WEEK_SCHEDULE_ID, DocumentPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_BUILDING_ID, SchoolBuildingPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassPeer::SCHOOL_ID, SchoolPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SchoolClassPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Document rows

                $key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = DocumentPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = DocumentPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    DocumentPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj2 (Document)
                $obj2->addSchoolClassRelatedByClassPortraitId($obj1);

            } // if joined row is not null

                // Add objects for joined Subject rows

                $key3 = SubjectPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SubjectPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = SubjectPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SubjectPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj3 (Subject)
                $obj3->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined Document rows

                $key4 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = DocumentPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = DocumentPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    DocumentPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj4 (Document)
                $obj4->addSchoolClassRelatedByClassScheduleId($obj1);

            } // if joined row is not null

                // Add objects for joined Document rows

                $key5 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = DocumentPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = DocumentPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    DocumentPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj5 (Document)
                $obj5->addSchoolClassRelatedByWeekScheduleId($obj1);

            } // if joined row is not null

                // Add objects for joined SchoolBuilding rows

                $key6 = SchoolBuildingPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = SchoolBuildingPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = SchoolBuildingPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SchoolBuildingPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj6 (SchoolBuilding)
                $obj6->addSchoolClass($obj1);

            } // if joined row is not null

                // Add objects for joined School rows

                $key7 = SchoolPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = SchoolPeer::getInstanceFromPool($key7);
                    if (!$obj7) {

                        $cls = SchoolPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    SchoolPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SchoolClass) to the collection in $obj7 (School)
                $obj7->addSchoolClass($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(SchoolClassPeer::DATABASE_NAME)->getTable(SchoolClassPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseSchoolClassPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseSchoolClassPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \SchoolClassTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        return SchoolClassPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a SchoolClass or Criteria object.
     *
     * @param      mixed $values Criteria or SchoolClass object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from SchoolClass object
        }

        if ($criteria->containsKey(SchoolClassPeer::ID) && $criteria->keyContainsValue(SchoolClassPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SchoolClassPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a SchoolClass or Criteria object.
     *
     * @param      mixed $values Criteria or SchoolClass object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(SchoolClassPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(SchoolClassPeer::ID);
            $value = $criteria->remove(SchoolClassPeer::ID);
            if ($value) {
                $selectCriteria->add(SchoolClassPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(SchoolClassPeer::TABLE_NAME);
            }

        } else { // $values is SchoolClass object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the school_classes table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += SchoolClassPeer::doOnDeleteCascade(new Criteria(SchoolClassPeer::DATABASE_NAME), $con);
            SchoolClassPeer::doOnDeleteSetNull(new Criteria(SchoolClassPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(SchoolClassPeer::TABLE_NAME, $con, SchoolClassPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SchoolClassPeer::clearInstancePool();
            SchoolClassPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a SchoolClass or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or SchoolClass object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof SchoolClass) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SchoolClassPeer::DATABASE_NAME);
            $criteria->add(SchoolClassPeer::ID, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(SchoolClassPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += SchoolClassPeer::doOnDeleteCascade($c, $con);

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            SchoolClassPeer::doOnDeleteSetNull($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                SchoolClassPeer::clearInstancePool();
            } elseif ($values instanceof SchoolClass) { // it's a model object
                SchoolClassPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    SchoolClassPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            SchoolClassPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * This is a method for emulating ON DELETE CASCADE for DBs that don't support this
     * feature (like MySQL or SQLite).
     *
     * This method is not very speedy because it must perform a query first to get
     * the implicated records and then perform the deletes by calling those Peer classes.
     *
     * This method should be used within a transaction if possible.
     *
     * @param      Criteria $criteria
     * @param      PropelPDO $con
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con)
    {
        // initialize var to track total num of affected rows
        $affectedRows = 0;

        // first find the objects that are implicated by the $criteria
        $objects = SchoolClassPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related ClassStudent objects
            $criteria = new Criteria(ClassStudentPeer::DATABASE_NAME);

            $criteria->add(ClassStudentPeer::SCHOOL_CLASS_ID, $obj->getId());
            $affectedRows += ClassStudentPeer::doDelete($criteria, $con);

            // delete related ClassTeacher objects
            $criteria = new Criteria(ClassTeacherPeer::DATABASE_NAME);

            $criteria->add(ClassTeacherPeer::SCHOOL_CLASS_ID, $obj->getId());
            $affectedRows += ClassTeacherPeer::doDelete($criteria, $con);

            // delete related SchoolClassSubjectClasses objects
            $criteria = new Criteria(SchoolClassSubjectClassesPeer::DATABASE_NAME);

            $criteria->add(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, $obj->getId());
            $affectedRows += SchoolClassSubjectClassesPeer::doDelete($criteria, $con);

            // delete related SchoolClassSubjectClasses objects
            $criteria = new Criteria(SchoolClassSubjectClassesPeer::DATABASE_NAME);

            $criteria->add(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, $obj->getId());
            $affectedRows += SchoolClassSubjectClassesPeer::doDelete($criteria, $con);

            // delete related SchoolClassUnitOriginalID objects
            $criteria = new Criteria(SchoolClassUnitOriginalIDPeer::DATABASE_NAME);

            $criteria->add(SchoolClassUnitOriginalIDPeer::SCHOOL_CLASS_ID, $obj->getId());
            $affectedRows += SchoolClassUnitOriginalIDPeer::doDelete($criteria, $con);

            // delete related ClassLink objects
            $criteria = new Criteria(ClassLinkPeer::DATABASE_NAME);

            $criteria->add(ClassLinkPeer::SCHOOL_CLASS_ID, $obj->getId());
            $affectedRows += ClassLinkPeer::doDelete($criteria, $con);

            // delete related ClassDocument objects
            $criteria = new Criteria(ClassDocumentPeer::DATABASE_NAME);

            $criteria->add(ClassDocumentPeer::SCHOOL_CLASS_ID, $obj->getId());
            $affectedRows += ClassDocumentPeer::doDelete($criteria, $con);

            // delete related Event objects
            $criteria = new Criteria(EventPeer::DATABASE_NAME);

            $criteria->add(EventPeer::SCHOOL_CLASS_ID, $obj->getId());
            $affectedRows += EventPeer::doDelete($criteria, $con);

            // delete related News objects
            $criteria = new Criteria(NewsPeer::DATABASE_NAME);

            $criteria->add(NewsPeer::SCHOOL_CLASS_ID, $obj->getId());
            $affectedRows += NewsPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * This is a method for emulating ON DELETE SET NULL DBs that don't support this
     * feature (like MySQL or SQLite).
     *
     * This method is not very speedy because it must perform a query first to get
     * the implicated records and then perform the deletes by calling those Peer classes.
     *
     * This method should be used within a transaction if possible.
     *
     * @param      Criteria $criteria
     * @param      PropelPDO $con
     * @return void
     */
    protected static function doOnDeleteSetNull(Criteria $criteria, PropelPDO $con)
    {

        // first find the objects that are implicated by the $criteria
        $objects = SchoolClassPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {

            // set fkey col in related SchoolClass rows to null
            $selectCriteria = new Criteria(SchoolClassPeer::DATABASE_NAME);
            $updateValues = new Criteria(SchoolClassPeer::DATABASE_NAME);
            $selectCriteria->add(SchoolClassPeer::ANCESTOR_CLASS_ID, $obj->getId());
            $updateValues->add(SchoolClassPeer::ANCESTOR_CLASS_ID, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

        }
    }

    /**
     * Validates all modified columns of given SchoolClass object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param SchoolClass $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(SchoolClassPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(SchoolClassPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(SchoolClassPeer::DATABASE_NAME, SchoolClassPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return SchoolClass
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = SchoolClassPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(SchoolClassPeer::DATABASE_NAME);
        $criteria->add(SchoolClassPeer::ID, $pk);

        $v = SchoolClassPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return SchoolClass[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(SchoolClassPeer::DATABASE_NAME);
            $criteria->add(SchoolClassPeer::ID, $pks, Criteria::IN);
            $objs = SchoolClassPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

    // denyable behavior
    public static function ignoreRights($bIgnore = true) {
        self::$IGNORE_RIGHTS = $bIgnore;
    }
    public static function isIgnoringRights() {
        return self::$IGNORE_RIGHTS || PHP_SAPI === "cli";
    }
    public static function setRightsUser($oUser = false) {
        self::$RIGHTS_USER = $oUser;
    }
    public static function getRightsUser($oUser = false) {
        if($oUser === false) {
            $oUser = self::$RIGHTS_USER;
        }
        if($oUser === false) {
            $oUser = Session::getSession()->getUser();
        }
        return $oUser;
    }
    public static function mayOperateOn($oUser, $mObject, $sOperation) {
        if($oUser === null) {
            return false;
        }
        if($oUser->getIsAdmin()) {
            return true;
        }
        return $oUser->hasRole("school_classes");
    }
    public static function mayOperateOnOwn($oUser, $mObject, $sOperation) {
        return $oUser->hasRole("school_classes-own");
    }

} // BaseSchoolClassPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseSchoolClassPeer::buildTableMap();

