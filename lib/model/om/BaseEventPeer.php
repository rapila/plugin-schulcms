<?php


/**
 * Base static class for performing query and update operations on the 'events' table.
 *
 * 
 *
 * @package    propel.generator.model.om
 */
abstract class BaseEventPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'rapila';

	/** the table name for this class */
	const TABLE_NAME = 'events';

	/** the related Propel class for this table */
	const OM_CLASS = 'Event';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'model.Event';

	/** the related TableMap class for this table */
	const TM_CLASS = 'EventTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 19;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'events.ID';

	/** the column name for the TITLE field */
	const TITLE = 'events.TITLE';

	/** the column name for the TEASER field */
	const TEASER = 'events.TEASER';

	/** the column name for the BODY_PREVIEW field */
	const BODY_PREVIEW = 'events.BODY_PREVIEW';

	/** the column name for the BODY_REVIEW field */
	const BODY_REVIEW = 'events.BODY_REVIEW';

	/** the column name for the LOCATION_INFO field */
	const LOCATION_INFO = 'events.LOCATION_INFO';

	/** the column name for the DATE_START field */
	const DATE_START = 'events.DATE_START';

	/** the column name for the DATE_END field */
	const DATE_END = 'events.DATE_END';

	/** the column name for the TIME_DETAILS field */
	const TIME_DETAILS = 'events.TIME_DETAILS';

	/** the column name for the IS_ACTIVE field */
	const IS_ACTIVE = 'events.IS_ACTIVE';

	/** the column name for the SHOW_ON_FRONTPAGE field */
	const SHOW_ON_FRONTPAGE = 'events.SHOW_ON_FRONTPAGE';

	/** the column name for the EVENT_TYPE_ID field */
	const EVENT_TYPE_ID = 'events.EVENT_TYPE_ID';

	/** the column name for the SERVICE_ID field */
	const SERVICE_ID = 'events.SERVICE_ID';

	/** the column name for the SCHOOL_CLASS_ID field */
	const SCHOOL_CLASS_ID = 'events.SCHOOL_CLASS_ID';

	/** the column name for the GALLERY_ID field */
	const GALLERY_ID = 'events.GALLERY_ID';

	/** the column name for the CREATED_AT field */
	const CREATED_AT = 'events.CREATED_AT';

	/** the column name for the UPDATED_AT field */
	const UPDATED_AT = 'events.UPDATED_AT';

	/** the column name for the CREATED_BY field */
	const CREATED_BY = 'events.CREATED_BY';

	/** the column name for the UPDATED_BY field */
	const UPDATED_BY = 'events.UPDATED_BY';

	/**
	 * An identiy map to hold any loaded instances of Event objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Event[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Title', 'Teaser', 'BodyPreview', 'BodyReview', 'LocationInfo', 'DateStart', 'DateEnd', 'TimeDetails', 'IsActive', 'ShowOnFrontpage', 'EventTypeId', 'ServiceId', 'SchoolClassId', 'GalleryId', 'CreatedAt', 'UpdatedAt', 'CreatedBy', 'UpdatedBy', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'title', 'teaser', 'bodyPreview', 'bodyReview', 'locationInfo', 'dateStart', 'dateEnd', 'timeDetails', 'isActive', 'showOnFrontpage', 'eventTypeId', 'serviceId', 'schoolClassId', 'galleryId', 'createdAt', 'updatedAt', 'createdBy', 'updatedBy', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::TITLE, self::TEASER, self::BODY_PREVIEW, self::BODY_REVIEW, self::LOCATION_INFO, self::DATE_START, self::DATE_END, self::TIME_DETAILS, self::IS_ACTIVE, self::SHOW_ON_FRONTPAGE, self::EVENT_TYPE_ID, self::SERVICE_ID, self::SCHOOL_CLASS_ID, self::GALLERY_ID, self::CREATED_AT, self::UPDATED_AT, self::CREATED_BY, self::UPDATED_BY, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'TITLE', 'TEASER', 'BODY_PREVIEW', 'BODY_REVIEW', 'LOCATION_INFO', 'DATE_START', 'DATE_END', 'TIME_DETAILS', 'IS_ACTIVE', 'SHOW_ON_FRONTPAGE', 'EVENT_TYPE_ID', 'SERVICE_ID', 'SCHOOL_CLASS_ID', 'GALLERY_ID', 'CREATED_AT', 'UPDATED_AT', 'CREATED_BY', 'UPDATED_BY', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'title', 'teaser', 'body_preview', 'body_review', 'location_info', 'date_start', 'date_end', 'time_details', 'is_active', 'show_on_frontpage', 'event_type_id', 'service_id', 'school_class_id', 'gallery_id', 'created_at', 'updated_at', 'created_by', 'updated_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Title' => 1, 'Teaser' => 2, 'BodyPreview' => 3, 'BodyReview' => 4, 'LocationInfo' => 5, 'DateStart' => 6, 'DateEnd' => 7, 'TimeDetails' => 8, 'IsActive' => 9, 'ShowOnFrontpage' => 10, 'EventTypeId' => 11, 'ServiceId' => 12, 'SchoolClassId' => 13, 'GalleryId' => 14, 'CreatedAt' => 15, 'UpdatedAt' => 16, 'CreatedBy' => 17, 'UpdatedBy' => 18, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'title' => 1, 'teaser' => 2, 'bodyPreview' => 3, 'bodyReview' => 4, 'locationInfo' => 5, 'dateStart' => 6, 'dateEnd' => 7, 'timeDetails' => 8, 'isActive' => 9, 'showOnFrontpage' => 10, 'eventTypeId' => 11, 'serviceId' => 12, 'schoolClassId' => 13, 'galleryId' => 14, 'createdAt' => 15, 'updatedAt' => 16, 'createdBy' => 17, 'updatedBy' => 18, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::TITLE => 1, self::TEASER => 2, self::BODY_PREVIEW => 3, self::BODY_REVIEW => 4, self::LOCATION_INFO => 5, self::DATE_START => 6, self::DATE_END => 7, self::TIME_DETAILS => 8, self::IS_ACTIVE => 9, self::SHOW_ON_FRONTPAGE => 10, self::EVENT_TYPE_ID => 11, self::SERVICE_ID => 12, self::SCHOOL_CLASS_ID => 13, self::GALLERY_ID => 14, self::CREATED_AT => 15, self::UPDATED_AT => 16, self::CREATED_BY => 17, self::UPDATED_BY => 18, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'TITLE' => 1, 'TEASER' => 2, 'BODY_PREVIEW' => 3, 'BODY_REVIEW' => 4, 'LOCATION_INFO' => 5, 'DATE_START' => 6, 'DATE_END' => 7, 'TIME_DETAILS' => 8, 'IS_ACTIVE' => 9, 'SHOW_ON_FRONTPAGE' => 10, 'EVENT_TYPE_ID' => 11, 'SERVICE_ID' => 12, 'SCHOOL_CLASS_ID' => 13, 'GALLERY_ID' => 14, 'CREATED_AT' => 15, 'UPDATED_AT' => 16, 'CREATED_BY' => 17, 'UPDATED_BY' => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'title' => 1, 'teaser' => 2, 'body_preview' => 3, 'body_review' => 4, 'location_info' => 5, 'date_start' => 6, 'date_end' => 7, 'time_details' => 8, 'is_active' => 9, 'show_on_frontpage' => 10, 'event_type_id' => 11, 'service_id' => 12, 'school_class_id' => 13, 'gallery_id' => 14, 'created_at' => 15, 'updated_at' => 16, 'created_by' => 17, 'updated_by' => 18, ),
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
	 * @param      string $column The column name for current table. (i.e. EventPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(EventPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(EventPeer::ID);
			$criteria->addSelectColumn(EventPeer::TITLE);
			$criteria->addSelectColumn(EventPeer::TEASER);
			$criteria->addSelectColumn(EventPeer::BODY_PREVIEW);
			$criteria->addSelectColumn(EventPeer::BODY_REVIEW);
			$criteria->addSelectColumn(EventPeer::LOCATION_INFO);
			$criteria->addSelectColumn(EventPeer::DATE_START);
			$criteria->addSelectColumn(EventPeer::DATE_END);
			$criteria->addSelectColumn(EventPeer::TIME_DETAILS);
			$criteria->addSelectColumn(EventPeer::IS_ACTIVE);
			$criteria->addSelectColumn(EventPeer::SHOW_ON_FRONTPAGE);
			$criteria->addSelectColumn(EventPeer::EVENT_TYPE_ID);
			$criteria->addSelectColumn(EventPeer::SERVICE_ID);
			$criteria->addSelectColumn(EventPeer::SCHOOL_CLASS_ID);
			$criteria->addSelectColumn(EventPeer::GALLERY_ID);
			$criteria->addSelectColumn(EventPeer::CREATED_AT);
			$criteria->addSelectColumn(EventPeer::UPDATED_AT);
			$criteria->addSelectColumn(EventPeer::CREATED_BY);
			$criteria->addSelectColumn(EventPeer::UPDATED_BY);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.TITLE');
			$criteria->addSelectColumn($alias . '.TEASER');
			$criteria->addSelectColumn($alias . '.BODY_PREVIEW');
			$criteria->addSelectColumn($alias . '.BODY_REVIEW');
			$criteria->addSelectColumn($alias . '.LOCATION_INFO');
			$criteria->addSelectColumn($alias . '.DATE_START');
			$criteria->addSelectColumn($alias . '.DATE_END');
			$criteria->addSelectColumn($alias . '.TIME_DETAILS');
			$criteria->addSelectColumn($alias . '.IS_ACTIVE');
			$criteria->addSelectColumn($alias . '.SHOW_ON_FRONTPAGE');
			$criteria->addSelectColumn($alias . '.EVENT_TYPE_ID');
			$criteria->addSelectColumn($alias . '.SERVICE_ID');
			$criteria->addSelectColumn($alias . '.SCHOOL_CLASS_ID');
			$criteria->addSelectColumn($alias . '.GALLERY_ID');
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
		$criteria->setPrimaryTableName(EventPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EventPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     Event
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = EventPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return EventPeer::populateObjects(EventPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			EventPeer::addSelectColumns($criteria);
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
	 * @param      Event $value A Event object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(Event $obj, $key = null)
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
	 * @param      mixed $value A Event object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Event) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Event object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Event Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to events
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
		// Invalidate objects in EventDocumentPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		EventDocumentPeer::clearInstancePool();
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
		$cls = EventPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = EventPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = EventPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				EventPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (Event object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = EventPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = EventPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + EventPeer::NUM_COLUMNS;
		} else {
			$cls = EventPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			EventPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the number of rows matching criteria, joining the related EventType table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinEventType(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(EventPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EventPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Service table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinService(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(EventPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EventPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(EventPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related SchoolClass table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinSchoolClass(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(EventPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EventPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(EventPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related DocumentCategory table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinDocumentCategory(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(EventPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EventPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(EventPeer::GALLERY_ID, DocumentCategoryPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(EventPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EventPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(EventPeer::CREATED_BY, UserPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(EventPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EventPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(EventPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

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
	 * Selects a collection of Event objects pre-filled with their EventType objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Event objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinEventType(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		EventPeer::addSelectColumns($criteria);
		$startcol = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS);
		EventTypePeer::addSelectColumns($criteria);

		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EventPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EventPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = EventPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				EventPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = EventTypePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = EventTypePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = EventTypePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					EventTypePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Event) to $obj2 (EventType)
				$obj2->addEvent($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Event objects pre-filled with their Service objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Event objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinService(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		EventPeer::addSelectColumns($criteria);
		$startcol = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS);
		ServicePeer::addSelectColumns($criteria);

		$criteria->addJoin(EventPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EventPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EventPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = EventPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				EventPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ServicePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ServicePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ServicePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ServicePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Event) to $obj2 (Service)
				$obj2->addEvent($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Event objects pre-filled with their SchoolClass objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Event objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSchoolClass(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		EventPeer::addSelectColumns($criteria);
		$startcol = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS);
		SchoolClassPeer::addSelectColumns($criteria);

		$criteria->addJoin(EventPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EventPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EventPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = EventPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				EventPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SchoolClassPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = SchoolClassPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					SchoolClassPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Event) to $obj2 (SchoolClass)
				$obj2->addEvent($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Event objects pre-filled with their DocumentCategory objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Event objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinDocumentCategory(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		EventPeer::addSelectColumns($criteria);
		$startcol = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS);
		DocumentCategoryPeer::addSelectColumns($criteria);

		$criteria->addJoin(EventPeer::GALLERY_ID, DocumentCategoryPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EventPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EventPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = EventPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				EventPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = DocumentCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DocumentCategoryPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = DocumentCategoryPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DocumentCategoryPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Event) to $obj2 (DocumentCategory)
				$obj2->addEvent($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Event objects pre-filled with their User objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Event objects.
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

		EventPeer::addSelectColumns($criteria);
		$startcol = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS);
		UserPeer::addSelectColumns($criteria);

		$criteria->addJoin(EventPeer::CREATED_BY, UserPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EventPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EventPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = EventPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				EventPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Event) to $obj2 (User)
				$obj2->addEventRelatedByCreatedBy($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Event objects pre-filled with their User objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Event objects.
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

		EventPeer::addSelectColumns($criteria);
		$startcol = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS);
		UserPeer::addSelectColumns($criteria);

		$criteria->addJoin(EventPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EventPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EventPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = EventPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				EventPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Event) to $obj2 (User)
				$obj2->addEventRelatedByUpdatedBy($obj1);

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
		$criteria->setPrimaryTableName(EventPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EventPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::GALLERY_ID, DocumentCategoryPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::CREATED_BY, UserPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

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
	 * Selects a collection of Event objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Event objects.
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

		EventPeer::addSelectColumns($criteria);
		$startcol2 = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS);

		EventTypePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (EventTypePeer::NUM_COLUMNS - EventTypePeer::NUM_LAZY_LOAD_COLUMNS);

		ServicePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ServicePeer::NUM_COLUMNS - ServicePeer::NUM_LAZY_LOAD_COLUMNS);

		SchoolClassPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (SchoolClassPeer::NUM_COLUMNS - SchoolClassPeer::NUM_LAZY_LOAD_COLUMNS);

		DocumentCategoryPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (DocumentCategoryPeer::NUM_COLUMNS - DocumentCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::GALLERY_ID, DocumentCategoryPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::CREATED_BY, UserPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EventPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EventPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = EventPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				EventPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined EventType rows

			$key2 = EventTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = EventTypePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = EventTypePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EventTypePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (Event) to the collection in $obj2 (EventType)
				$obj2->addEvent($obj1);
			} // if joined row not null

			// Add objects for joined Service rows

			$key3 = ServicePeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = ServicePeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = ServicePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ServicePeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (Event) to the collection in $obj3 (Service)
				$obj3->addEvent($obj1);
			} // if joined row not null

			// Add objects for joined SchoolClass rows

			$key4 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = SchoolClassPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = SchoolClassPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					SchoolClassPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (Event) to the collection in $obj4 (SchoolClass)
				$obj4->addEvent($obj1);
			} // if joined row not null

			// Add objects for joined DocumentCategory rows

			$key5 = DocumentCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = DocumentCategoryPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = DocumentCategoryPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					DocumentCategoryPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (Event) to the collection in $obj5 (DocumentCategory)
				$obj5->addEvent($obj1);
			} // if joined row not null

			// Add objects for joined User rows

			$key6 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
			if ($key6 !== null) {
				$obj6 = UserPeer::getInstanceFromPool($key6);
				if (!$obj6) {

					$cls = UserPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					UserPeer::addInstanceToPool($obj6, $key6);
				} // if obj6 loaded

				// Add the $obj1 (Event) to the collection in $obj6 (User)
				$obj6->addEventRelatedByCreatedBy($obj1);
			} // if joined row not null

			// Add objects for joined User rows

			$key7 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol7);
			if ($key7 !== null) {
				$obj7 = UserPeer::getInstanceFromPool($key7);
				if (!$obj7) {

					$cls = UserPeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					UserPeer::addInstanceToPool($obj7, $key7);
				} // if obj7 loaded

				// Add the $obj1 (Event) to the collection in $obj7 (User)
				$obj7->addEventRelatedByUpdatedBy($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related EventType table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptEventType(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(EventPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EventPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(EventPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::GALLERY_ID, DocumentCategoryPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::CREATED_BY, UserPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Service table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptService(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(EventPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EventPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::GALLERY_ID, DocumentCategoryPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::CREATED_BY, UserPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related SchoolClass table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSchoolClass(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(EventPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EventPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::GALLERY_ID, DocumentCategoryPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::CREATED_BY, UserPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related DocumentCategory table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptDocumentCategory(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(EventPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EventPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::CREATED_BY, UserPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(EventPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EventPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::GALLERY_ID, DocumentCategoryPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(EventPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EventPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::GALLERY_ID, DocumentCategoryPeer::ID, $join_behavior);

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
	 * Selects a collection of Event objects pre-filled with all related objects except EventType.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Event objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptEventType(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		EventPeer::addSelectColumns($criteria);
		$startcol2 = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS);

		ServicePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ServicePeer::NUM_COLUMNS - ServicePeer::NUM_LAZY_LOAD_COLUMNS);

		SchoolClassPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (SchoolClassPeer::NUM_COLUMNS - SchoolClassPeer::NUM_LAZY_LOAD_COLUMNS);

		DocumentCategoryPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (DocumentCategoryPeer::NUM_COLUMNS - DocumentCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(EventPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::GALLERY_ID, DocumentCategoryPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::CREATED_BY, UserPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::UPDATED_BY, UserPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EventPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EventPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = EventPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				EventPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Service rows

				$key2 = ServicePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ServicePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ServicePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ServicePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Event) to the collection in $obj2 (Service)
				$obj2->addEvent($obj1);

			} // if joined row is not null

				// Add objects for joined SchoolClass rows

				$key3 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SchoolClassPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = SchoolClassPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SchoolClassPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Event) to the collection in $obj3 (SchoolClass)
				$obj3->addEvent($obj1);

			} // if joined row is not null

				// Add objects for joined DocumentCategory rows

				$key4 = DocumentCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = DocumentCategoryPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = DocumentCategoryPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					DocumentCategoryPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Event) to the collection in $obj4 (DocumentCategory)
				$obj4->addEvent($obj1);

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

				// Add the $obj1 (Event) to the collection in $obj5 (User)
				$obj5->addEventRelatedByCreatedBy($obj1);

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

				// Add the $obj1 (Event) to the collection in $obj6 (User)
				$obj6->addEventRelatedByUpdatedBy($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Event objects pre-filled with all related objects except Service.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Event objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptService(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		EventPeer::addSelectColumns($criteria);
		$startcol2 = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS);

		EventTypePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (EventTypePeer::NUM_COLUMNS - EventTypePeer::NUM_LAZY_LOAD_COLUMNS);

		SchoolClassPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (SchoolClassPeer::NUM_COLUMNS - SchoolClassPeer::NUM_LAZY_LOAD_COLUMNS);

		DocumentCategoryPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (DocumentCategoryPeer::NUM_COLUMNS - DocumentCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::GALLERY_ID, DocumentCategoryPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::CREATED_BY, UserPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::UPDATED_BY, UserPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EventPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EventPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = EventPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				EventPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined EventType rows

				$key2 = EventTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EventTypePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = EventTypePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EventTypePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Event) to the collection in $obj2 (EventType)
				$obj2->addEvent($obj1);

			} // if joined row is not null

				// Add objects for joined SchoolClass rows

				$key3 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SchoolClassPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = SchoolClassPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SchoolClassPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Event) to the collection in $obj3 (SchoolClass)
				$obj3->addEvent($obj1);

			} // if joined row is not null

				// Add objects for joined DocumentCategory rows

				$key4 = DocumentCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = DocumentCategoryPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = DocumentCategoryPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					DocumentCategoryPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Event) to the collection in $obj4 (DocumentCategory)
				$obj4->addEvent($obj1);

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

				// Add the $obj1 (Event) to the collection in $obj5 (User)
				$obj5->addEventRelatedByCreatedBy($obj1);

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

				// Add the $obj1 (Event) to the collection in $obj6 (User)
				$obj6->addEventRelatedByUpdatedBy($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Event objects pre-filled with all related objects except SchoolClass.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Event objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSchoolClass(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		EventPeer::addSelectColumns($criteria);
		$startcol2 = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS);

		EventTypePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (EventTypePeer::NUM_COLUMNS - EventTypePeer::NUM_LAZY_LOAD_COLUMNS);

		ServicePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ServicePeer::NUM_COLUMNS - ServicePeer::NUM_LAZY_LOAD_COLUMNS);

		DocumentCategoryPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (DocumentCategoryPeer::NUM_COLUMNS - DocumentCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::GALLERY_ID, DocumentCategoryPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::CREATED_BY, UserPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::UPDATED_BY, UserPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EventPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EventPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = EventPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				EventPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined EventType rows

				$key2 = EventTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EventTypePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = EventTypePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EventTypePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Event) to the collection in $obj2 (EventType)
				$obj2->addEvent($obj1);

			} // if joined row is not null

				// Add objects for joined Service rows

				$key3 = ServicePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ServicePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ServicePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ServicePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Event) to the collection in $obj3 (Service)
				$obj3->addEvent($obj1);

			} // if joined row is not null

				// Add objects for joined DocumentCategory rows

				$key4 = DocumentCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = DocumentCategoryPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = DocumentCategoryPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					DocumentCategoryPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Event) to the collection in $obj4 (DocumentCategory)
				$obj4->addEvent($obj1);

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

				// Add the $obj1 (Event) to the collection in $obj5 (User)
				$obj5->addEventRelatedByCreatedBy($obj1);

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

				// Add the $obj1 (Event) to the collection in $obj6 (User)
				$obj6->addEventRelatedByUpdatedBy($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Event objects pre-filled with all related objects except DocumentCategory.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Event objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptDocumentCategory(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		EventPeer::addSelectColumns($criteria);
		$startcol2 = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS);

		EventTypePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (EventTypePeer::NUM_COLUMNS - EventTypePeer::NUM_LAZY_LOAD_COLUMNS);

		ServicePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ServicePeer::NUM_COLUMNS - ServicePeer::NUM_LAZY_LOAD_COLUMNS);

		SchoolClassPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (SchoolClassPeer::NUM_COLUMNS - SchoolClassPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::CREATED_BY, UserPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::UPDATED_BY, UserPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EventPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EventPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = EventPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				EventPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined EventType rows

				$key2 = EventTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EventTypePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = EventTypePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EventTypePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Event) to the collection in $obj2 (EventType)
				$obj2->addEvent($obj1);

			} // if joined row is not null

				// Add objects for joined Service rows

				$key3 = ServicePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ServicePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ServicePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ServicePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Event) to the collection in $obj3 (Service)
				$obj3->addEvent($obj1);

			} // if joined row is not null

				// Add objects for joined SchoolClass rows

				$key4 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = SchoolClassPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = SchoolClassPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					SchoolClassPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Event) to the collection in $obj4 (SchoolClass)
				$obj4->addEvent($obj1);

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

				// Add the $obj1 (Event) to the collection in $obj5 (User)
				$obj5->addEventRelatedByCreatedBy($obj1);

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

				// Add the $obj1 (Event) to the collection in $obj6 (User)
				$obj6->addEventRelatedByUpdatedBy($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Event objects pre-filled with all related objects except UserRelatedByCreatedBy.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Event objects.
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

		EventPeer::addSelectColumns($criteria);
		$startcol2 = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS);

		EventTypePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (EventTypePeer::NUM_COLUMNS - EventTypePeer::NUM_LAZY_LOAD_COLUMNS);

		ServicePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ServicePeer::NUM_COLUMNS - ServicePeer::NUM_LAZY_LOAD_COLUMNS);

		SchoolClassPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (SchoolClassPeer::NUM_COLUMNS - SchoolClassPeer::NUM_LAZY_LOAD_COLUMNS);

		DocumentCategoryPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (DocumentCategoryPeer::NUM_COLUMNS - DocumentCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::GALLERY_ID, DocumentCategoryPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EventPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EventPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = EventPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				EventPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined EventType rows

				$key2 = EventTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EventTypePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = EventTypePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EventTypePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Event) to the collection in $obj2 (EventType)
				$obj2->addEvent($obj1);

			} // if joined row is not null

				// Add objects for joined Service rows

				$key3 = ServicePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ServicePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ServicePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ServicePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Event) to the collection in $obj3 (Service)
				$obj3->addEvent($obj1);

			} // if joined row is not null

				// Add objects for joined SchoolClass rows

				$key4 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = SchoolClassPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = SchoolClassPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					SchoolClassPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Event) to the collection in $obj4 (SchoolClass)
				$obj4->addEvent($obj1);

			} // if joined row is not null

				// Add objects for joined DocumentCategory rows

				$key5 = DocumentCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = DocumentCategoryPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = DocumentCategoryPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					DocumentCategoryPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Event) to the collection in $obj5 (DocumentCategory)
				$obj5->addEvent($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Event objects pre-filled with all related objects except UserRelatedByUpdatedBy.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Event objects.
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

		EventPeer::addSelectColumns($criteria);
		$startcol2 = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS);

		EventTypePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (EventTypePeer::NUM_COLUMNS - EventTypePeer::NUM_LAZY_LOAD_COLUMNS);

		ServicePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ServicePeer::NUM_COLUMNS - ServicePeer::NUM_LAZY_LOAD_COLUMNS);

		SchoolClassPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (SchoolClassPeer::NUM_COLUMNS - SchoolClassPeer::NUM_LAZY_LOAD_COLUMNS);

		DocumentCategoryPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (DocumentCategoryPeer::NUM_COLUMNS - DocumentCategoryPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::SCHOOL_CLASS_ID, SchoolClassPeer::ID, $join_behavior);

		$criteria->addJoin(EventPeer::GALLERY_ID, DocumentCategoryPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = EventPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = EventPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = EventPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				EventPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined EventType rows

				$key2 = EventTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EventTypePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = EventTypePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EventTypePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Event) to the collection in $obj2 (EventType)
				$obj2->addEvent($obj1);

			} // if joined row is not null

				// Add objects for joined Service rows

				$key3 = ServicePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ServicePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ServicePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ServicePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Event) to the collection in $obj3 (Service)
				$obj3->addEvent($obj1);

			} // if joined row is not null

				// Add objects for joined SchoolClass rows

				$key4 = SchoolClassPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = SchoolClassPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = SchoolClassPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					SchoolClassPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Event) to the collection in $obj4 (SchoolClass)
				$obj4->addEvent($obj1);

			} // if joined row is not null

				// Add objects for joined DocumentCategory rows

				$key5 = DocumentCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = DocumentCategoryPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = DocumentCategoryPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					DocumentCategoryPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Event) to the collection in $obj5 (DocumentCategory)
				$obj5->addEvent($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseEventPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseEventPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new EventTableMap());
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
		return $withPrefix ? EventPeer::CLASS_DEFAULT : EventPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a Event or Criteria object.
	 *
	 * @param      mixed $values Criteria or Event object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Event object
		}

		if ($criteria->containsKey(EventPeer::ID) && $criteria->keyContainsValue(EventPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.EventPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a Event or Criteria object.
	 *
	 * @param      mixed $values Criteria or Event object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(EventPeer::ID);
			$value = $criteria->remove(EventPeer::ID);
			if ($value) {
				$selectCriteria->add(EventPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(EventPeer::TABLE_NAME);
			}

		} else { // $values is Event object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the events table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += EventPeer::doOnDeleteCascade(new Criteria(EventPeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(EventPeer::TABLE_NAME, $con, EventPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			EventPeer::clearInstancePool();
			EventPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Event or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Event object or primary key or array of primary keys
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
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Event) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EventPeer::ID, (array) $values, Criteria::IN);
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
			$affectedRows += EventPeer::doOnDeleteCascade($c, $con);
			
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			if ($values instanceof Criteria) {
				EventPeer::clearInstancePool();
			} elseif ($values instanceof Event) { // it's a model object
				EventPeer::removeInstanceFromPool($values);
			} else { // it's a primary key, or an array of pks
				foreach ((array) $values as $singleval) {
					EventPeer::removeInstanceFromPool($singleval);
				}
			}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			EventPeer::clearRelatedInstancePool();
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
		$objects = EventPeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {


			// delete related EventDocument objects
			$criteria = new Criteria(EventDocumentPeer::DATABASE_NAME);
			
			$criteria->add(EventDocumentPeer::EVENT_ID, $obj->getId());
			$affectedRows += EventDocumentPeer::doDelete($criteria, $con);
		}
		return $affectedRows;
	}

	/**
	 * Validates all modified columns of given Event object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Event $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(Event $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EventPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EventPeer::TABLE_NAME);

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

		return BasePeer::doValidate(EventPeer::DATABASE_NAME, EventPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Event
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = EventPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(EventPeer::DATABASE_NAME);
		$criteria->add(EventPeer::ID, $pk);

		$v = EventPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(EventPeer::DATABASE_NAME);
			$criteria->add(EventPeer::ID, $pks, Criteria::IN);
			$objs = EventPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseEventPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseEventPeer::buildTableMap();

