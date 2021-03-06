<?php


/**
 * Base static class for performing query and update operations on the 'school_class_subject_classes' table.
 *
 *
 *
 * @package propel.generator.model.om
 */
abstract class BaseSchoolClassSubjectClassesPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'rapila';

    /** the table name for this class */
    const TABLE_NAME = 'school_class_subject_classes';

    /** the related Propel class for this table */
    const OM_CLASS = 'SchoolClassSubjectClasses';

    /** the related TableMap class for this table */
    const TM_CLASS = 'SchoolClassSubjectClassesTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 7;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 7;

    /** the column name for the school_class_id field */
    const SCHOOL_CLASS_ID = 'school_class_subject_classes.school_class_id';

    /** the column name for the subject_class_id field */
    const SUBJECT_CLASS_ID = 'school_class_subject_classes.subject_class_id';

    /** the column name for the student_count field */
    const STUDENT_COUNT = 'school_class_subject_classes.student_count';

    /** the column name for the created_at field */
    const CREATED_AT = 'school_class_subject_classes.created_at';

    /** the column name for the updated_at field */
    const UPDATED_AT = 'school_class_subject_classes.updated_at';

    /** the column name for the created_by field */
    const CREATED_BY = 'school_class_subject_classes.created_by';

    /** the column name for the updated_by field */
    const UPDATED_BY = 'school_class_subject_classes.updated_by';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of SchoolClassSubjectClasses objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array SchoolClassSubjectClasses[]
     */
    public static $instances = array();


    // denyable behavior
    private static $IGNORE_RIGHTS = false;
    private static $RIGHTS_USER = false;

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. SchoolClassSubjectClassesPeer::$fieldNames[SchoolClassSubjectClassesPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('SchoolClassId', 'SubjectClassId', 'StudentCount', 'CreatedAt', 'UpdatedAt', 'CreatedBy', 'UpdatedBy', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('schoolClassId', 'subjectClassId', 'studentCount', 'createdAt', 'updatedAt', 'createdBy', 'updatedBy', ),
        BasePeer::TYPE_COLNAME => array (SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, SchoolClassSubjectClassesPeer::STUDENT_COUNT, SchoolClassSubjectClassesPeer::CREATED_AT, SchoolClassSubjectClassesPeer::UPDATED_AT, SchoolClassSubjectClassesPeer::CREATED_BY, SchoolClassSubjectClassesPeer::UPDATED_BY, ),
        BasePeer::TYPE_RAW_COLNAME => array ('SCHOOL_CLASS_ID', 'SUBJECT_CLASS_ID', 'STUDENT_COUNT', 'CREATED_AT', 'UPDATED_AT', 'CREATED_BY', 'UPDATED_BY', ),
        BasePeer::TYPE_FIELDNAME => array ('school_class_id', 'subject_class_id', 'student_count', 'created_at', 'updated_at', 'created_by', 'updated_by', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. SchoolClassSubjectClassesPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('SchoolClassId' => 0, 'SubjectClassId' => 1, 'StudentCount' => 2, 'CreatedAt' => 3, 'UpdatedAt' => 4, 'CreatedBy' => 5, 'UpdatedBy' => 6, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('schoolClassId' => 0, 'subjectClassId' => 1, 'studentCount' => 2, 'createdAt' => 3, 'updatedAt' => 4, 'createdBy' => 5, 'updatedBy' => 6, ),
        BasePeer::TYPE_COLNAME => array (SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID => 0, SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID => 1, SchoolClassSubjectClassesPeer::STUDENT_COUNT => 2, SchoolClassSubjectClassesPeer::CREATED_AT => 3, SchoolClassSubjectClassesPeer::UPDATED_AT => 4, SchoolClassSubjectClassesPeer::CREATED_BY => 5, SchoolClassSubjectClassesPeer::UPDATED_BY => 6, ),
        BasePeer::TYPE_RAW_COLNAME => array ('SCHOOL_CLASS_ID' => 0, 'SUBJECT_CLASS_ID' => 1, 'STUDENT_COUNT' => 2, 'CREATED_AT' => 3, 'UPDATED_AT' => 4, 'CREATED_BY' => 5, 'UPDATED_BY' => 6, ),
        BasePeer::TYPE_FIELDNAME => array ('school_class_id' => 0, 'subject_class_id' => 1, 'student_count' => 2, 'created_at' => 3, 'updated_at' => 4, 'created_by' => 5, 'updated_by' => 6, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
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
        $toNames = SchoolClassSubjectClassesPeer::getFieldNames($toType);
        $key = isset(SchoolClassSubjectClassesPeer::$fieldKeys[$fromType][$name]) ? SchoolClassSubjectClassesPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(SchoolClassSubjectClassesPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, SchoolClassSubjectClassesPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return SchoolClassSubjectClassesPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. SchoolClassSubjectClassesPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(SchoolClassSubjectClassesPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID);
            $criteria->addSelectColumn(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID);
            $criteria->addSelectColumn(SchoolClassSubjectClassesPeer::STUDENT_COUNT);
            $criteria->addSelectColumn(SchoolClassSubjectClassesPeer::CREATED_AT);
            $criteria->addSelectColumn(SchoolClassSubjectClassesPeer::UPDATED_AT);
            $criteria->addSelectColumn(SchoolClassSubjectClassesPeer::CREATED_BY);
            $criteria->addSelectColumn(SchoolClassSubjectClassesPeer::UPDATED_BY);
        } else {
            $criteria->addSelectColumn($alias . '.school_class_id');
            $criteria->addSelectColumn($alias . '.subject_class_id');
            $criteria->addSelectColumn($alias . '.student_count');
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
        $criteria->setPrimaryTableName(SchoolClassSubjectClassesPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return SchoolClassSubjectClasses
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = SchoolClassSubjectClassesPeer::doSelect($critcopy, $con);
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
        return SchoolClassSubjectClassesPeer::populateObjects(SchoolClassSubjectClassesPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);

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
     * @param SchoolClassSubjectClasses $obj A SchoolClassSubjectClasses object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = serialize(array((string) $obj->getSchoolClassId(), (string) $obj->getSubjectClassId()));
            } // if key === null
            SchoolClassSubjectClassesPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A SchoolClassSubjectClasses object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof SchoolClassSubjectClasses) {
                $key = serialize(array((string) $value->getSchoolClassId(), (string) $value->getSubjectClassId()));
            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or SchoolClassSubjectClasses object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(SchoolClassSubjectClassesPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return SchoolClassSubjectClasses Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(SchoolClassSubjectClassesPeer::$instances[$key])) {
                return SchoolClassSubjectClassesPeer::$instances[$key];
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
        foreach (SchoolClassSubjectClassesPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        SchoolClassSubjectClassesPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to school_class_subject_classes
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
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
        if ($row[$startcol] === null && $row[$startcol + 1] === null) {
            return null;
        }

        return serialize(array((string) $row[$startcol], (string) $row[$startcol + 1]));
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

        return array((int) $row[$startcol], (int) $row[$startcol + 1]);
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
        $cls = SchoolClassSubjectClassesPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = SchoolClassSubjectClassesPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = SchoolClassSubjectClassesPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SchoolClassSubjectClassesPeer::addInstanceToPool($obj, $key);
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
     * @return array (SchoolClassSubjectClasses object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = SchoolClassSubjectClassesPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = SchoolClassSubjectClassesPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + SchoolClassSubjectClassesPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SchoolClassSubjectClassesPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            SchoolClassSubjectClassesPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related SchoolClassRelatedBySchoolClassId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSchoolClassRelatedBySchoolClassId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassSubjectClassesPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SchoolClassRelatedBySubjectClassId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSchoolClassRelatedBySubjectClassId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassSubjectClassesPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(SchoolClassSubjectClassesPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassSubjectClassesPeer::CREATED_BY, UserPeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(SchoolClassSubjectClassesPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassSubjectClassesPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

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
     * Selects a collection of SchoolClassSubjectClasses objects pre-filled with their SchoolClass objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClassSubjectClasses objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSchoolClassRelatedBySchoolClassId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);
        }

        SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        $startcol = SchoolClassSubjectClassesPeer::NUM_HYDRATE_COLUMNS;
        SchoolClassPeer::addSelectColumns($criteria);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassSubjectClassesPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassSubjectClassesPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SchoolClassSubjectClassesPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassSubjectClassesPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SchoolClassPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SchoolClassPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SchoolClassPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SchoolClassSubjectClasses) to $obj2 (SchoolClass)
                $obj2->addSchoolClassSubjectClassesRelatedBySchoolClassId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClassSubjectClasses objects pre-filled with their SchoolClass objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClassSubjectClasses objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSchoolClassRelatedBySubjectClassId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);
        }

        SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        $startcol = SchoolClassSubjectClassesPeer::NUM_HYDRATE_COLUMNS;
        SchoolClassPeer::addSelectColumns($criteria);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassSubjectClassesPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassSubjectClassesPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SchoolClassSubjectClassesPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassSubjectClassesPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SchoolClassPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SchoolClassPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SchoolClassPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SchoolClassSubjectClasses) to $obj2 (SchoolClass)
                $obj2->addSchoolClassSubjectClassesRelatedBySubjectClassId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClassSubjectClasses objects pre-filled with their User objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClassSubjectClasses objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinUserRelatedByCreatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);
        }

        SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        $startcol = SchoolClassSubjectClassesPeer::NUM_HYDRATE_COLUMNS;
        UserPeer::addSelectColumns($criteria);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassSubjectClassesPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassSubjectClassesPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SchoolClassSubjectClassesPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassSubjectClassesPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (SchoolClassSubjectClasses) to $obj2 (User)
                $obj2->addSchoolClassSubjectClassesRelatedByCreatedBy($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClassSubjectClasses objects pre-filled with their User objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClassSubjectClasses objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinUserRelatedByUpdatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);
        }

        SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        $startcol = SchoolClassSubjectClassesPeer::NUM_HYDRATE_COLUMNS;
        UserPeer::addSelectColumns($criteria);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassSubjectClassesPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassSubjectClassesPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SchoolClassSubjectClassesPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassSubjectClassesPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (SchoolClassSubjectClasses) to $obj2 (User)
                $obj2->addSchoolClassSubjectClassesRelatedByUpdatedBy($obj1);

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
        $criteria->setPrimaryTableName(SchoolClassSubjectClassesPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

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
     * Selects a collection of SchoolClassSubjectClasses objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClassSubjectClasses objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);
        }

        SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        $startcol2 = SchoolClassSubjectClassesPeer::NUM_HYDRATE_COLUMNS;

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SchoolClassPeer::NUM_HYDRATE_COLUMNS;

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SchoolClassPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + UserPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + UserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassSubjectClassesPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassSubjectClassesPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SchoolClassSubjectClassesPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassSubjectClassesPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined SchoolClass rows

            $key2 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = SchoolClassPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SchoolClassPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SchoolClassPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (SchoolClassSubjectClasses) to the collection in $obj2 (SchoolClass)
                $obj2->addSchoolClassSubjectClassesRelatedBySchoolClassId($obj1);
            } // if joined row not null

            // Add objects for joined SchoolClass rows

            $key3 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = SchoolClassPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = SchoolClassPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SchoolClassPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (SchoolClassSubjectClasses) to the collection in $obj3 (SchoolClass)
                $obj3->addSchoolClassSubjectClassesRelatedBySubjectClassId($obj1);
            } // if joined row not null

            // Add objects for joined User rows

            $key4 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = UserPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = UserPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    UserPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (SchoolClassSubjectClasses) to the collection in $obj4 (User)
                $obj4->addSchoolClassSubjectClassesRelatedByCreatedBy($obj1);
            } // if joined row not null

            // Add objects for joined User rows

            $key5 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = UserPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = UserPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    UserPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (SchoolClassSubjectClasses) to the collection in $obj5 (User)
                $obj5->addSchoolClassSubjectClassesRelatedByUpdatedBy($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related SchoolClassRelatedBySchoolClassId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSchoolClassRelatedBySchoolClassId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassSubjectClassesPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassSubjectClassesPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SchoolClassRelatedBySubjectClassId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSchoolClassRelatedBySubjectClassId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SchoolClassSubjectClassesPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassSubjectClassesPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(SchoolClassSubjectClassesPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(SchoolClassSubjectClassesPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

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
     * Selects a collection of SchoolClassSubjectClasses objects pre-filled with all related objects except SchoolClassRelatedBySchoolClassId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClassSubjectClasses objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSchoolClassRelatedBySchoolClassId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);
        }

        SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        $startcol2 = SchoolClassSubjectClassesPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + UserPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + UserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SchoolClassSubjectClassesPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::UPDATED_BY, UserPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassSubjectClassesPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassSubjectClassesPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SchoolClassSubjectClassesPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassSubjectClassesPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined User rows

                $key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = UserPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = UserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    UserPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SchoolClassSubjectClasses) to the collection in $obj2 (User)
                $obj2->addSchoolClassSubjectClassesRelatedByCreatedBy($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key3 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = UserPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = UserPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    UserPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SchoolClassSubjectClasses) to the collection in $obj3 (User)
                $obj3->addSchoolClassSubjectClassesRelatedByUpdatedBy($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClassSubjectClasses objects pre-filled with all related objects except SchoolClassRelatedBySubjectClassId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClassSubjectClasses objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSchoolClassRelatedBySubjectClassId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);
        }

        SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        $startcol2 = SchoolClassSubjectClassesPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + UserPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + UserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SchoolClassSubjectClassesPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::UPDATED_BY, UserPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassSubjectClassesPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassSubjectClassesPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SchoolClassSubjectClassesPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassSubjectClassesPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined User rows

                $key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = UserPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = UserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    UserPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SchoolClassSubjectClasses) to the collection in $obj2 (User)
                $obj2->addSchoolClassSubjectClassesRelatedByCreatedBy($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key3 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = UserPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = UserPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    UserPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SchoolClassSubjectClasses) to the collection in $obj3 (User)
                $obj3->addSchoolClassSubjectClassesRelatedByUpdatedBy($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClassSubjectClasses objects pre-filled with all related objects except UserRelatedByCreatedBy.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClassSubjectClasses objects.
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
            $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);
        }

        SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        $startcol2 = SchoolClassSubjectClassesPeer::NUM_HYDRATE_COLUMNS;

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SchoolClassPeer::NUM_HYDRATE_COLUMNS;

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SchoolClassPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, SchoolClassPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassSubjectClassesPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassSubjectClassesPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SchoolClassSubjectClassesPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassSubjectClassesPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined SchoolClass rows

                $key2 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SchoolClassPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = SchoolClassPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SchoolClassPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SchoolClassSubjectClasses) to the collection in $obj2 (SchoolClass)
                $obj2->addSchoolClassSubjectClassesRelatedBySchoolClassId($obj1);

            } // if joined row is not null

                // Add objects for joined SchoolClass rows

                $key3 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SchoolClassPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = SchoolClassPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SchoolClassPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SchoolClassSubjectClasses) to the collection in $obj3 (SchoolClass)
                $obj3->addSchoolClassSubjectClassesRelatedBySubjectClassId($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SchoolClassSubjectClasses objects pre-filled with all related objects except UserRelatedByUpdatedBy.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SchoolClassSubjectClasses objects.
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
            $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);
        }

        SchoolClassSubjectClassesPeer::addSelectColumns($criteria);
        $startcol2 = SchoolClassSubjectClassesPeer::NUM_HYDRATE_COLUMNS;

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SchoolClassPeer::NUM_HYDRATE_COLUMNS;

        SchoolClassPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SchoolClassPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

        $criteria->addJoin(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, SchoolClassPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SchoolClassSubjectClassesPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SchoolClassSubjectClassesPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SchoolClassSubjectClassesPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SchoolClassSubjectClassesPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined SchoolClass rows

                $key2 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SchoolClassPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = SchoolClassPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SchoolClassPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SchoolClassSubjectClasses) to the collection in $obj2 (SchoolClass)
                $obj2->addSchoolClassSubjectClassesRelatedBySchoolClassId($obj1);

            } // if joined row is not null

                // Add objects for joined SchoolClass rows

                $key3 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SchoolClassPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = SchoolClassPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SchoolClassPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SchoolClassSubjectClasses) to the collection in $obj3 (SchoolClass)
                $obj3->addSchoolClassSubjectClassesRelatedBySubjectClassId($obj1);

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
        return Propel::getDatabaseMap(SchoolClassSubjectClassesPeer::DATABASE_NAME)->getTable(SchoolClassSubjectClassesPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseSchoolClassSubjectClassesPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseSchoolClassSubjectClassesPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \SchoolClassSubjectClassesTableMap());
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
        return SchoolClassSubjectClassesPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a SchoolClassSubjectClasses or Criteria object.
     *
     * @param      mixed $values Criteria or SchoolClassSubjectClasses object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from SchoolClassSubjectClasses object
        }


        // Set the correct dbName
        $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a SchoolClassSubjectClasses or Criteria object.
     *
     * @param      mixed $values Criteria or SchoolClassSubjectClasses object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(SchoolClassSubjectClassesPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID);
            $value = $criteria->remove(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID);
            if ($value) {
                $selectCriteria->add(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(SchoolClassSubjectClassesPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID);
            $value = $criteria->remove(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID);
            if ($value) {
                $selectCriteria->add(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(SchoolClassSubjectClassesPeer::TABLE_NAME);
            }

        } else { // $values is SchoolClassSubjectClasses object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the school_class_subject_classes table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(SchoolClassSubjectClassesPeer::TABLE_NAME, $con, SchoolClassSubjectClassesPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SchoolClassSubjectClassesPeer::clearInstancePool();
            SchoolClassSubjectClassesPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a SchoolClassSubjectClasses or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or SchoolClassSubjectClasses object or primary key or array of primary keys
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
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            SchoolClassSubjectClassesPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof SchoolClassSubjectClasses) { // it's a model object
            // invalidate the cache for this single object
            SchoolClassSubjectClassesPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SchoolClassSubjectClassesPeer::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, $value[1]));
                $criteria->addOr($criterion);
                // we can invalidate the cache for this single PK
                SchoolClassSubjectClassesPeer::removeInstanceFromPool($value);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(SchoolClassSubjectClassesPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            SchoolClassSubjectClassesPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given SchoolClassSubjectClasses object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param SchoolClassSubjectClasses $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(SchoolClassSubjectClassesPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(SchoolClassSubjectClassesPeer::TABLE_NAME);

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

        return BasePeer::doValidate(SchoolClassSubjectClassesPeer::DATABASE_NAME, SchoolClassSubjectClassesPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve object using using composite pkey values.
     * @param   int $school_class_id
     * @param   int $subject_class_id
     * @param      PropelPDO $con
     * @return SchoolClassSubjectClasses
     */
    public static function retrieveByPK($school_class_id, $subject_class_id, PropelPDO $con = null) {
        $_instancePoolKey = serialize(array((string) $school_class_id, (string) $subject_class_id));
         if (null !== ($obj = SchoolClassSubjectClassesPeer::getInstanceFromPool($_instancePoolKey))) {
             return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $criteria = new Criteria(SchoolClassSubjectClassesPeer::DATABASE_NAME);
        $criteria->add(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, $school_class_id);
        $criteria->add(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, $subject_class_id);
        $v = SchoolClassSubjectClassesPeer::doSelect($criteria, $con);

        return !empty($v) ? $v[0] : null;
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
        return $oUser->hasRole("school_class_subject_classes");
    }
    public static function mayOperateOnOwn($oUser, $mObject, $sOperation) {
        return $oUser->hasRole("school_class_subject_classes-own");
    }

} // BaseSchoolClassSubjectClassesPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseSchoolClassSubjectClassesPeer::buildTableMap();

