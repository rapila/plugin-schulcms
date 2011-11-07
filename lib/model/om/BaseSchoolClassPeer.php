<?php


/**
 * Base static class for performing query and update operations on the 'school_classes' table.
 *
 * 
 *
 * @package    propel.generator.model.om
 */
abstract class BaseSchoolClassPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'rapila';

	/** the table name for this class */
	const TABLE_NAME = 'school_classes';

	/** the related Propel class for this table */
	const OM_CLASS = 'SchoolClass';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'model.SchoolClass';

	/** the related TableMap class for this table */
	const TM_CLASS = 'SchoolClassTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 19;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 19;

	/** the column name for the ID field */
	const ID = 'school_classes.ID';

	/** the column name for the ORIGINAL_ID field */
	const ORIGINAL_ID = 'school_classes.ORIGINAL_ID';

	/** the column name for the NAME field */
	const NAME = 'school_classes.NAME';

	/** the column name for the UNIT_NAME field */
	const UNIT_NAME = 'school_classes.UNIT_NAME';

	/** the column name for the SLUG field */
	const SLUG = 'school_classes.SLUG';

	/** the column name for the YEAR field */
	const YEAR = 'school_classes.YEAR';

	/** the column name for the LEVEL field */
	const LEVEL = 'school_classes.LEVEL';

	/** the column name for the ROOM_NUMBER field */
	const ROOM_NUMBER = 'school_classes.ROOM_NUMBER';

	/** the column name for the TEACHING_UNIT field */
	const TEACHING_UNIT = 'school_classes.TEACHING_UNIT';

	/** the column name for the CLASS_PORTRAIT_ID field */
	const CLASS_PORTRAIT_ID = 'school_classes.CLASS_PORTRAIT_ID';

	/** the column name for the CLASS_TYPE_ID field */
	const CLASS_TYPE_ID = 'school_classes.CLASS_TYPE_ID';

	/** the column name for the CLASS_SCHEDULE_ID field */
	const CLASS_SCHEDULE_ID = 'school_classes.CLASS_SCHEDULE_ID';

	/** the column name for the WEEK_SCHEDULE_ID field */
	const WEEK_SCHEDULE_ID = 'school_classes.WEEK_SCHEDULE_ID';

	/** the column name for the SCHOOL_BUILDING_ID field */
	const SCHOOL_BUILDING_ID = 'school_classes.SCHOOL_BUILDING_ID';

	/** the column name for the SCHOOL_ID field */
	const SCHOOL_ID = 'school_classes.SCHOOL_ID';

	/** the column name for the CREATED_AT field */
	const CREATED_AT = 'school_classes.CREATED_AT';

	/** the column name for the UPDATED_AT field */
	const UPDATED_AT = 'school_classes.UPDATED_AT';

	/** the column name for the CREATED_BY field */
	const CREATED_BY = 'school_classes.CREATED_BY';

	/** the column name for the UPDATED_BY field */
	const UPDATED_BY = 'school_classes.UPDATED_BY';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of SchoolClass objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array SchoolClass[]
	 */
	public static $instances = array();


	// denyable behavior
	private static $IGNORE_RIGHTS = false;
	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'OriginalId', 'Name', 'UnitName', 'Slug', 'Year', 'Level', 'RoomNumber', 'TeachingUnit', 'ClassPortraitId', 'ClassTypeId', 'ClassScheduleId', 'WeekScheduleId', 'SchoolBuildingId', 'SchoolId', 'CreatedAt', 'UpdatedAt', 'CreatedBy', 'UpdatedBy', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'originalId', 'name', 'unitName', 'slug', 'year', 'level', 'roomNumber', 'teachingUnit', 'classPortraitId', 'classTypeId', 'classScheduleId', 'weekScheduleId', 'schoolBuildingId', 'schoolId', 'createdAt', 'updatedAt', 'createdBy', 'updatedBy', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::ORIGINAL_ID, self::NAME, self::UNIT_NAME, self::SLUG, self::YEAR, self::LEVEL, self::ROOM_NUMBER, self::TEACHING_UNIT, self::CLASS_PORTRAIT_ID, self::CLASS_TYPE_ID, self::CLASS_SCHEDULE_ID, self::WEEK_SCHEDULE_ID, self::SCHOOL_BUILDING_ID, self::SCHOOL_ID, self::CREATED_AT, self::UPDATED_AT, self::CREATED_BY, self::UPDATED_BY, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'ORIGINAL_ID', 'NAME', 'UNIT_NAME', 'SLUG', 'YEAR', 'LEVEL', 'ROOM_NUMBER', 'TEACHING_UNIT', 'CLASS_PORTRAIT_ID', 'CLASS_TYPE_ID', 'CLASS_SCHEDULE_ID', 'WEEK_SCHEDULE_ID', 'SCHOOL_BUILDING_ID', 'SCHOOL_ID', 'CREATED_AT', 'UPDATED_AT', 'CREATED_BY', 'UPDATED_BY', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'original_id', 'name', 'unit_name', 'slug', 'year', 'level', 'room_number', 'teaching_unit', 'class_portrait_id', 'class_type_id', 'class_schedule_id', 'week_schedule_id', 'school_building_id', 'school_id', 'created_at', 'updated_at', 'created_by', 'updated_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'OriginalId' => 1, 'Name' => 2, 'UnitName' => 3, 'Slug' => 4, 'Year' => 5, 'Level' => 6, 'RoomNumber' => 7, 'TeachingUnit' => 8, 'ClassPortraitId' => 9, 'ClassTypeId' => 10, 'ClassScheduleId' => 11, 'WeekScheduleId' => 12, 'SchoolBuildingId' => 13, 'SchoolId' => 14, 'CreatedAt' => 15, 'UpdatedAt' => 16, 'CreatedBy' => 17, 'UpdatedBy' => 18, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'originalId' => 1, 'name' => 2, 'unitName' => 3, 'slug' => 4, 'year' => 5, 'level' => 6, 'roomNumber' => 7, 'teachingUnit' => 8, 'classPortraitId' => 9, 'classTypeId' => 10, 'classScheduleId' => 11, 'weekScheduleId' => 12, 'schoolBuildingId' => 13, 'schoolId' => 14, 'createdAt' => 15, 'updatedAt' => 16, 'createdBy' => 17, 'updatedBy' => 18, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::ORIGINAL_ID => 1, self::NAME => 2, self::UNIT_NAME => 3, self::SLUG => 4, self::YEAR => 5, self::LEVEL => 6, self::ROOM_NUMBER => 7, self::TEACHING_UNIT => 8, self::CLASS_PORTRAIT_ID => 9, self::CLASS_TYPE_ID => 10, self::CLASS_SCHEDULE_ID => 11, self::WEEK_SCHEDULE_ID => 12, self::SCHOOL_BUILDING_ID => 13, self::SCHOOL_ID => 14, self::CREATED_AT => 15, self::UPDATED_AT => 16, self::CREATED_BY => 17, self::UPDATED_BY => 18, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'ORIGINAL_ID' => 1, 'NAME' => 2, 'UNIT_NAME' => 3, 'SLUG' => 4, 'YEAR' => 5, 'LEVEL' => 6, 'ROOM_NUMBER' => 7, 'TEACHING_UNIT' => 8, 'CLASS_PORTRAIT_ID' => 9, 'CLASS_TYPE_ID' => 10, 'CLASS_SCHEDULE_ID' => 11, 'WEEK_SCHEDULE_ID' => 12, 'SCHOOL_BUILDING_ID' => 13, 'SCHOOL_ID' => 14, 'CREATED_AT' => 15, 'UPDATED_AT' => 16, 'CREATED_BY' => 17, 'UPDATED_BY' => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'original_id' => 1, 'name' => 2, 'unit_name' => 3, 'slug' => 4, 'year' => 5, 'level' => 6, 'room_number' => 7, 'teaching_unit' => 8, 'class_portrait_id' => 9, 'class_type_id' => 10, 'class_schedule_id' => 11, 'week_schedule_id' => 12, 'school_building_id' => 13, 'school_id' => 14, 'created_at' => 15, 'updated_at' => 16, 'created_by' => 17, 'updated_by' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
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
	 * @return     string
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
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(SchoolClassPeer::ID);
			$criteria->addSelectColumn(SchoolClassPeer::ORIGINAL_ID);
			$criteria->addSelectColumn(SchoolClassPeer::NAME);
			$criteria->addSelectColumn(SchoolClassPeer::UNIT_NAME);
			$criteria->addSelectColumn(SchoolClassPeer::SLUG);
			$criteria->addSelectColumn(SchoolClassPeer::YEAR);
			$criteria->addSelectColumn(SchoolClassPeer::LEVEL);
			$criteria->addSelectColumn(SchoolClassPeer::ROOM_NUMBER);
			$criteria->addSelectColumn(SchoolClassPeer::TEACHING_UNIT);
			$criteria->addSelectColumn(SchoolClassPeer::CLASS_PORTRAIT_ID);
			$criteria->addSelectColumn(SchoolClassPeer::CLASS_TYPE_ID);
			$criteria->addSelectColumn(SchoolClassPeer::CLASS_SCHEDULE_ID);
			$criteria->addSelectColumn(SchoolClassPeer::WEEK_SCHEDULE_ID);
			$criteria->addSelectColumn(SchoolClassPeer::SCHOOL_BUILDING_ID);
			$criteria->addSelectColumn(SchoolClassPeer::SCHOOL_ID);
			$criteria->addSelectColumn(SchoolClassPeer::CREATED_AT);
			$criteria->addSelectColumn(SchoolClassPeer::UPDATED_AT);
			$criteria->addSelectColumn(SchoolClassPeer::CREATED_BY);
			$criteria->addSelectColumn(SchoolClassPeer::UPDATED_BY);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.ORIGINAL_ID');
			$criteria->addSelectColumn($alias . '.NAME');
			$criteria->addSelectColumn($alias . '.UNIT_NAME');
			$criteria->addSelectColumn($alias . '.SLUG');
			$criteria->addSelectColumn($alias . '.YEAR');
			$criteria->addSelectColumn($alias . '.LEVEL');
			$criteria->addSelectColumn($alias . '.ROOM_NUMBER');
			$criteria->addSelectColumn($alias . '.TEACHING_UNIT');
			$criteria->addSelectColumn($alias . '.CLASS_PORTRAIT_ID');
			$criteria->addSelectColumn($alias . '.CLASS_TYPE_ID');
			$criteria->addSelectColumn($alias . '.CLASS_SCHEDULE_ID');
			$criteria->addSelectColumn($alias . '.WEEK_SCHEDULE_ID');
			$criteria->addSelectColumn($alias . '.SCHOOL_BUILDING_ID');
			$criteria->addSelectColumn($alias . '.SCHOOL_ID');
			$criteria->addSelectColumn($alias . '.CREATED_AT');
			$criteria->addSelectColumn($alias . '.UPDATED_AT');
			$criteria->addSelectColumn($alias . '.CREATED_BY');
			$criteria->addSelectColumn($alias . '.UPDATED_BY');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
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
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

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
	 * @return     SchoolClass
	 * @throws     PropelException Any exceptions caught during processing will be
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
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return SchoolClassPeer::populateObjects(SchoolClassPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
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
		$criteria->setDbName(self::DATABASE_NAME);

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
	 * @param      SchoolClass $value A SchoolClass object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool($obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
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

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     SchoolClass Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
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
		// Invalidate objects in ClassLinkPeer instance pool,
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		ClassLinkPeer::clearInstancePool();
		// Invalidate objects in ClassTeacherPeer instance pool,
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		ClassTeacherPeer::clearInstancePool();
		// Invalidate objects in EventPeer instance pool,
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		EventPeer::clearInstancePool();
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
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
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = SchoolClassPeer::getOMClass(false);
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
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (SchoolClass object, last column rank)
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
	 * @return     int Number of matching rows.
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
		$criteria->setDbName(self::DATABASE_NAME);

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
	 * Returns the number of rows matching criteria, joining the related ClassType table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinClassType(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
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
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
	 * @return     int Number of matching rows.
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
		$criteria->setDbName(self::DATABASE_NAME);

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
	 * @return     int Number of matching rows.
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
		$criteria->setDbName(self::DATABASE_NAME);

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
	 * @return     int Number of matching rows.
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
		$criteria->setDbName(self::DATABASE_NAME);

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
	 * @return     int Number of matching rows.
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
		$criteria->setDbName(self::DATABASE_NAME);

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
	 * @return     int Number of matching rows.
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
		$criteria->setDbName(self::DATABASE_NAME);

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
	 * @return     int Number of matching rows.
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
		$criteria->setDbName(self::DATABASE_NAME);

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
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinDocumentRelatedByClassPortraitId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
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

				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DocumentPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = DocumentPeer::getOMClass(false);

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
	 * Selects a collection of SchoolClass objects pre-filled with their ClassType objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinClassType(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SchoolClassPeer::addSelectColumns($criteria);
		$startcol = SchoolClassPeer::NUM_HYDRATE_COLUMNS;
		ClassTypePeer::addSelectColumns($criteria);

		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SchoolClassPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ClassTypePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ClassTypePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ClassTypePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ClassTypePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SchoolClass) to $obj2 (ClassType)
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
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinDocumentRelatedByClassScheduleId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
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

				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DocumentPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = DocumentPeer::getOMClass(false);

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
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinDocumentRelatedByWeekScheduleId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
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

				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DocumentPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = DocumentPeer::getOMClass(false);

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
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSchoolBuilding(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
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

				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = SchoolBuildingPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SchoolBuildingPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = SchoolBuildingPeer::getOMClass(false);

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
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSchool(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
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

				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = SchoolPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SchoolPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = SchoolPeer::getOMClass(false);

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
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUserRelatedByCreatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
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

				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = UserPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = UserPeer::getOMClass(false);

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
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUserRelatedByUpdatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
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

				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = UserPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = UserPeer::getOMClass(false);

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
	 * @return     int Number of matching rows.
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
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SchoolClassPeer::addSelectColumns($criteria);
		$startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

		DocumentPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + DocumentPeer::NUM_HYDRATE_COLUMNS;

		ClassTypePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + ClassTypePeer::NUM_HYDRATE_COLUMNS;

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

		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Document rows

			$key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = DocumentPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = DocumentPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DocumentPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (SchoolClass) to the collection in $obj2 (Document)
				$obj2->addSchoolClassRelatedByClassPortraitId($obj1);
			} // if joined row not null

			// Add objects for joined ClassType rows

			$key3 = ClassTypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = ClassTypePeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = ClassTypePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClassTypePeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (SchoolClass) to the collection in $obj3 (ClassType)
				$obj3->addSchoolClass($obj1);
			} // if joined row not null

			// Add objects for joined Document rows

			$key4 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = DocumentPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = DocumentPeer::getOMClass(false);

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

					$cls = DocumentPeer::getOMClass(false);

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

					$cls = SchoolBuildingPeer::getOMClass(false);

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

					$cls = SchoolPeer::getOMClass(false);

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

					$cls = UserPeer::getOMClass(false);

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

					$cls = UserPeer::getOMClass(false);

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
	 * Returns the number of rows matching criteria, joining the related DocumentRelatedByClassPortraitId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
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
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ClassType table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptClassType(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
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
		$criteria->setDbName(self::DATABASE_NAME);

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
	 * @return     int Number of matching rows.
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
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
	 * @return     int Number of matching rows.
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
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
	 * @return     int Number of matching rows.
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
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
	 * @return     int Number of matching rows.
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
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
	 * @return     int Number of matching rows.
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
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
	 * @return     int Number of matching rows.
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
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
	 * Selects a collection of SchoolClass objects pre-filled with all related objects except DocumentRelatedByClassPortraitId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptDocumentRelatedByClassPortraitId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SchoolClassPeer::addSelectColumns($criteria);
		$startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

		ClassTypePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + ClassTypePeer::NUM_HYDRATE_COLUMNS;

		SchoolBuildingPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + SchoolBuildingPeer::NUM_HYDRATE_COLUMNS;

		SchoolPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + SchoolPeer::NUM_HYDRATE_COLUMNS;

		UserPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + UserPeer::NUM_HYDRATE_COLUMNS;

		UserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + UserPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ClassType rows

				$key2 = ClassTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ClassTypePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ClassTypePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ClassTypePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SchoolClass) to the collection in $obj2 (ClassType)
				$obj2->addSchoolClass($obj1);

			} // if joined row is not null

				// Add objects for joined SchoolBuilding rows

				$key3 = SchoolBuildingPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SchoolBuildingPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = SchoolBuildingPeer::getOMClass(false);

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
	
						$cls = SchoolPeer::getOMClass(false);

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
	
						$cls = UserPeer::getOMClass(false);

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
	
						$cls = UserPeer::getOMClass(false);

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
	 * Selects a collection of SchoolClass objects pre-filled with all related objects except ClassType.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptClassType(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
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
				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Document rows

				$key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DocumentPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = DocumentPeer::getOMClass(false);

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
	
						$cls = DocumentPeer::getOMClass(false);

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
	
						$cls = DocumentPeer::getOMClass(false);

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
	
						$cls = SchoolBuildingPeer::getOMClass(false);

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
	
						$cls = SchoolPeer::getOMClass(false);

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
	
						$cls = UserPeer::getOMClass(false);

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
	
						$cls = UserPeer::getOMClass(false);

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
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptDocumentRelatedByClassScheduleId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SchoolClassPeer::addSelectColumns($criteria);
		$startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

		ClassTypePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + ClassTypePeer::NUM_HYDRATE_COLUMNS;

		SchoolBuildingPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + SchoolBuildingPeer::NUM_HYDRATE_COLUMNS;

		SchoolPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + SchoolPeer::NUM_HYDRATE_COLUMNS;

		UserPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + UserPeer::NUM_HYDRATE_COLUMNS;

		UserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + UserPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ClassType rows

				$key2 = ClassTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ClassTypePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ClassTypePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ClassTypePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SchoolClass) to the collection in $obj2 (ClassType)
				$obj2->addSchoolClass($obj1);

			} // if joined row is not null

				// Add objects for joined SchoolBuilding rows

				$key3 = SchoolBuildingPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SchoolBuildingPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = SchoolBuildingPeer::getOMClass(false);

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
	
						$cls = SchoolPeer::getOMClass(false);

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
	
						$cls = UserPeer::getOMClass(false);

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
	
						$cls = UserPeer::getOMClass(false);

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
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptDocumentRelatedByWeekScheduleId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SchoolClassPeer::addSelectColumns($criteria);
		$startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

		ClassTypePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + ClassTypePeer::NUM_HYDRATE_COLUMNS;

		SchoolBuildingPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + SchoolBuildingPeer::NUM_HYDRATE_COLUMNS;

		SchoolPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + SchoolPeer::NUM_HYDRATE_COLUMNS;

		UserPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + UserPeer::NUM_HYDRATE_COLUMNS;

		UserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + UserPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ClassType rows

				$key2 = ClassTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ClassTypePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ClassTypePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ClassTypePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SchoolClass) to the collection in $obj2 (ClassType)
				$obj2->addSchoolClass($obj1);

			} // if joined row is not null

				// Add objects for joined SchoolBuilding rows

				$key3 = SchoolBuildingPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SchoolBuildingPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = SchoolBuildingPeer::getOMClass(false);

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
	
						$cls = SchoolPeer::getOMClass(false);

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
	
						$cls = UserPeer::getOMClass(false);

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
	
						$cls = UserPeer::getOMClass(false);

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
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSchoolBuilding(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SchoolClassPeer::addSelectColumns($criteria);
		$startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

		DocumentPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + DocumentPeer::NUM_HYDRATE_COLUMNS;

		ClassTypePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + ClassTypePeer::NUM_HYDRATE_COLUMNS;

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

		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Document rows

				$key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DocumentPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = DocumentPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DocumentPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SchoolClass) to the collection in $obj2 (Document)
				$obj2->addSchoolClassRelatedByClassPortraitId($obj1);

			} // if joined row is not null

				// Add objects for joined ClassType rows

				$key3 = ClassTypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClassTypePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ClassTypePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClassTypePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SchoolClass) to the collection in $obj3 (ClassType)
				$obj3->addSchoolClass($obj1);

			} // if joined row is not null

				// Add objects for joined Document rows

				$key4 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = DocumentPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = DocumentPeer::getOMClass(false);

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
	
						$cls = DocumentPeer::getOMClass(false);

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
	
						$cls = SchoolPeer::getOMClass(false);

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
	
						$cls = UserPeer::getOMClass(false);

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
	
						$cls = UserPeer::getOMClass(false);

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
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSchool(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SchoolClassPeer::addSelectColumns($criteria);
		$startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

		DocumentPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + DocumentPeer::NUM_HYDRATE_COLUMNS;

		ClassTypePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + ClassTypePeer::NUM_HYDRATE_COLUMNS;

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

		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Document rows

				$key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DocumentPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = DocumentPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DocumentPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SchoolClass) to the collection in $obj2 (Document)
				$obj2->addSchoolClassRelatedByClassPortraitId($obj1);

			} // if joined row is not null

				// Add objects for joined ClassType rows

				$key3 = ClassTypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClassTypePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ClassTypePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClassTypePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SchoolClass) to the collection in $obj3 (ClassType)
				$obj3->addSchoolClass($obj1);

			} // if joined row is not null

				// Add objects for joined Document rows

				$key4 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = DocumentPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = DocumentPeer::getOMClass(false);

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
	
						$cls = DocumentPeer::getOMClass(false);

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
	
						$cls = SchoolBuildingPeer::getOMClass(false);

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
	
						$cls = UserPeer::getOMClass(false);

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
	
						$cls = UserPeer::getOMClass(false);

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
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptUserRelatedByCreatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SchoolClassPeer::addSelectColumns($criteria);
		$startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

		DocumentPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + DocumentPeer::NUM_HYDRATE_COLUMNS;

		ClassTypePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + ClassTypePeer::NUM_HYDRATE_COLUMNS;

		DocumentPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + DocumentPeer::NUM_HYDRATE_COLUMNS;

		DocumentPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + DocumentPeer::NUM_HYDRATE_COLUMNS;

		SchoolBuildingPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + SchoolBuildingPeer::NUM_HYDRATE_COLUMNS;

		SchoolPeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + SchoolPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Document rows

				$key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DocumentPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = DocumentPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DocumentPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SchoolClass) to the collection in $obj2 (Document)
				$obj2->addSchoolClassRelatedByClassPortraitId($obj1);

			} // if joined row is not null

				// Add objects for joined ClassType rows

				$key3 = ClassTypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClassTypePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ClassTypePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClassTypePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SchoolClass) to the collection in $obj3 (ClassType)
				$obj3->addSchoolClass($obj1);

			} // if joined row is not null

				// Add objects for joined Document rows

				$key4 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = DocumentPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = DocumentPeer::getOMClass(false);

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
	
						$cls = DocumentPeer::getOMClass(false);

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
	
						$cls = SchoolBuildingPeer::getOMClass(false);

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
	
						$cls = SchoolPeer::getOMClass(false);

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
	 * @return     array Array of SchoolClass objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptUserRelatedByUpdatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SchoolClassPeer::addSelectColumns($criteria);
		$startcol2 = SchoolClassPeer::NUM_HYDRATE_COLUMNS;

		DocumentPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + DocumentPeer::NUM_HYDRATE_COLUMNS;

		ClassTypePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + ClassTypePeer::NUM_HYDRATE_COLUMNS;

		DocumentPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + DocumentPeer::NUM_HYDRATE_COLUMNS;

		DocumentPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + DocumentPeer::NUM_HYDRATE_COLUMNS;

		SchoolBuildingPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + SchoolBuildingPeer::NUM_HYDRATE_COLUMNS;

		SchoolPeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + SchoolPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(SchoolClassPeer::CLASS_PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

		$criteria->addJoin(SchoolClassPeer::CLASS_TYPE_ID, ClassTypePeer::ID, $join_behavior);

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
				$cls = SchoolClassPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SchoolClassPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Document rows

				$key2 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DocumentPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = DocumentPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DocumentPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SchoolClass) to the collection in $obj2 (Document)
				$obj2->addSchoolClassRelatedByClassPortraitId($obj1);

			} // if joined row is not null

				// Add objects for joined ClassType rows

				$key3 = ClassTypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClassTypePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ClassTypePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClassTypePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SchoolClass) to the collection in $obj3 (ClassType)
				$obj3->addSchoolClass($obj1);

			} // if joined row is not null

				// Add objects for joined Document rows

				$key4 = DocumentPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = DocumentPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = DocumentPeer::getOMClass(false);

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
	
						$cls = DocumentPeer::getOMClass(false);

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
	
						$cls = SchoolBuildingPeer::getOMClass(false);

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
	
						$cls = SchoolPeer::getOMClass(false);

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
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseSchoolClassPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseSchoolClassPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new SchoolClassTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? SchoolClassPeer::CLASS_DEFAULT : SchoolClassPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a SchoolClass or Criteria object.
	 *
	 * @param      mixed $values Criteria or SchoolClass object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
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
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
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
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

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
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the school_classes table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
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
			$affectedRows += BasePeer::doDeleteAll(SchoolClassPeer::TABLE_NAME, $con, SchoolClassPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			SchoolClassPeer::clearInstancePool();
			SchoolClassPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
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
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
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
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SchoolClassPeer::ID, (array) $values, Criteria::IN);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			// cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
			$c = clone $criteria;
			$affectedRows += SchoolClassPeer::doOnDeleteCascade($c, $con);
			
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
		} catch (PropelException $e) {
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
	 * @return     int The number of affected rows (if supported by underlying database driver).
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

			// delete related ClassLink objects
			$criteria = new Criteria(ClassLinkPeer::DATABASE_NAME);
			
			$criteria->add(ClassLinkPeer::SCHOOL_CLASS_ID, $obj->getId());
			$affectedRows += ClassLinkPeer::doDelete($criteria, $con);

			// delete related ClassTeacher objects
			$criteria = new Criteria(ClassTeacherPeer::DATABASE_NAME);
			
			$criteria->add(ClassTeacherPeer::SCHOOL_CLASS_ID, $obj->getId());
			$affectedRows += ClassTeacherPeer::doDelete($criteria, $con);

			// delete related Event objects
			$criteria = new Criteria(EventPeer::DATABASE_NAME);
			
			$criteria->add(EventPeer::SCHOOL_CLASS_ID, $obj->getId());
			$affectedRows += EventPeer::doDelete($criteria, $con);
		}
		return $affectedRows;
	}

	/**
	 * Validates all modified columns of given SchoolClass object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      SchoolClass $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
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
				if ($tableMap->containsColumn($colName)) {
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
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     SchoolClass
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
	 * @throws     PropelException Any exceptions caught during processing will be
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

