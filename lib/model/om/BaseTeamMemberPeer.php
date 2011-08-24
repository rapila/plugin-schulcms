<?php


/**
 * Base static class for performing query and update operations on the 'team_members' table.
 *
 * 
 *
 * @package    propel.generator.model.om
 */
abstract class BaseTeamMemberPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'rapila';

	/** the table name for this class */
	const TABLE_NAME = 'team_members';

	/** the related Propel class for this table */
	const OM_CLASS = 'TeamMember';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'model.TeamMember';

	/** the related TableMap class for this table */
	const TM_CLASS = 'TeamMemberTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 18;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'team_members.ID';

	/** the column name for the ORIGINAL_ID field */
	const ORIGINAL_ID = 'team_members.ORIGINAL_ID';

	/** the column name for the LAST_NAME field */
	const LAST_NAME = 'team_members.LAST_NAME';

	/** the column name for the FIRST_NAME field */
	const FIRST_NAME = 'team_members.FIRST_NAME';

	/** the column name for the SLUG field */
	const SLUG = 'team_members.SLUG';

	/** the column name for the GENDER_ID field */
	const GENDER_ID = 'team_members.GENDER_ID';

	/** the column name for the EMPLOYED_SINCE field */
	const EMPLOYED_SINCE = 'team_members.EMPLOYED_SINCE';

	/** the column name for the DATE_OF_BIRTH field */
	const DATE_OF_BIRTH = 'team_members.DATE_OF_BIRTH';

	/** the column name for the PROFESSION field */
	const PROFESSION = 'team_members.PROFESSION';

	/** the column name for the EMAIL_G field */
	const EMAIL_G = 'team_members.EMAIL_G';

	/** the column name for the PORTRAIT_ID field */
	const PORTRAIT_ID = 'team_members.PORTRAIT_ID';

	/** the column name for the USER_ID field */
	const USER_ID = 'team_members.USER_ID';

	/** the column name for the IS_DELETED field */
	const IS_DELETED = 'team_members.IS_DELETED';

	/** the column name for the IS_NEWLY_UPDATED field */
	const IS_NEWLY_UPDATED = 'team_members.IS_NEWLY_UPDATED';

	/** the column name for the CREATED_AT field */
	const CREATED_AT = 'team_members.CREATED_AT';

	/** the column name for the UPDATED_AT field */
	const UPDATED_AT = 'team_members.UPDATED_AT';

	/** the column name for the CREATED_BY field */
	const CREATED_BY = 'team_members.CREATED_BY';

	/** the column name for the UPDATED_BY field */
	const UPDATED_BY = 'team_members.UPDATED_BY';

	/**
	 * An identiy map to hold any loaded instances of TeamMember objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array TeamMember[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'OriginalId', 'LastName', 'FirstName', 'Slug', 'GenderId', 'EmployedSince', 'DateOfBirth', 'Profession', 'EmailG', 'PortraitId', 'UserId', 'IsDeleted', 'IsNewlyUpdated', 'CreatedAt', 'UpdatedAt', 'CreatedBy', 'UpdatedBy', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'originalId', 'lastName', 'firstName', 'slug', 'genderId', 'employedSince', 'dateOfBirth', 'profession', 'emailG', 'portraitId', 'userId', 'isDeleted', 'isNewlyUpdated', 'createdAt', 'updatedAt', 'createdBy', 'updatedBy', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::ORIGINAL_ID, self::LAST_NAME, self::FIRST_NAME, self::SLUG, self::GENDER_ID, self::EMPLOYED_SINCE, self::DATE_OF_BIRTH, self::PROFESSION, self::EMAIL_G, self::PORTRAIT_ID, self::USER_ID, self::IS_DELETED, self::IS_NEWLY_UPDATED, self::CREATED_AT, self::UPDATED_AT, self::CREATED_BY, self::UPDATED_BY, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'ORIGINAL_ID', 'LAST_NAME', 'FIRST_NAME', 'SLUG', 'GENDER_ID', 'EMPLOYED_SINCE', 'DATE_OF_BIRTH', 'PROFESSION', 'EMAIL_G', 'PORTRAIT_ID', 'USER_ID', 'IS_DELETED', 'IS_NEWLY_UPDATED', 'CREATED_AT', 'UPDATED_AT', 'CREATED_BY', 'UPDATED_BY', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'original_id', 'last_name', 'first_name', 'slug', 'gender_id', 'employed_since', 'date_of_birth', 'profession', 'email_g', 'portrait_id', 'user_id', 'is_deleted', 'is_newly_updated', 'created_at', 'updated_at', 'created_by', 'updated_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'OriginalId' => 1, 'LastName' => 2, 'FirstName' => 3, 'Slug' => 4, 'GenderId' => 5, 'EmployedSince' => 6, 'DateOfBirth' => 7, 'Profession' => 8, 'EmailG' => 9, 'PortraitId' => 10, 'UserId' => 11, 'IsDeleted' => 12, 'IsNewlyUpdated' => 13, 'CreatedAt' => 14, 'UpdatedAt' => 15, 'CreatedBy' => 16, 'UpdatedBy' => 17, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'originalId' => 1, 'lastName' => 2, 'firstName' => 3, 'slug' => 4, 'genderId' => 5, 'employedSince' => 6, 'dateOfBirth' => 7, 'profession' => 8, 'emailG' => 9, 'portraitId' => 10, 'userId' => 11, 'isDeleted' => 12, 'isNewlyUpdated' => 13, 'createdAt' => 14, 'updatedAt' => 15, 'createdBy' => 16, 'updatedBy' => 17, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::ORIGINAL_ID => 1, self::LAST_NAME => 2, self::FIRST_NAME => 3, self::SLUG => 4, self::GENDER_ID => 5, self::EMPLOYED_SINCE => 6, self::DATE_OF_BIRTH => 7, self::PROFESSION => 8, self::EMAIL_G => 9, self::PORTRAIT_ID => 10, self::USER_ID => 11, self::IS_DELETED => 12, self::IS_NEWLY_UPDATED => 13, self::CREATED_AT => 14, self::UPDATED_AT => 15, self::CREATED_BY => 16, self::UPDATED_BY => 17, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'ORIGINAL_ID' => 1, 'LAST_NAME' => 2, 'FIRST_NAME' => 3, 'SLUG' => 4, 'GENDER_ID' => 5, 'EMPLOYED_SINCE' => 6, 'DATE_OF_BIRTH' => 7, 'PROFESSION' => 8, 'EMAIL_G' => 9, 'PORTRAIT_ID' => 10, 'USER_ID' => 11, 'IS_DELETED' => 12, 'IS_NEWLY_UPDATED' => 13, 'CREATED_AT' => 14, 'UPDATED_AT' => 15, 'CREATED_BY' => 16, 'UPDATED_BY' => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'original_id' => 1, 'last_name' => 2, 'first_name' => 3, 'slug' => 4, 'gender_id' => 5, 'employed_since' => 6, 'date_of_birth' => 7, 'profession' => 8, 'email_g' => 9, 'portrait_id' => 10, 'user_id' => 11, 'is_deleted' => 12, 'is_newly_updated' => 13, 'created_at' => 14, 'updated_at' => 15, 'created_by' => 16, 'updated_by' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
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
	 * @param      string $column The column name for current table. (i.e. TeamMemberPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(TeamMemberPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(TeamMemberPeer::ID);
			$criteria->addSelectColumn(TeamMemberPeer::ORIGINAL_ID);
			$criteria->addSelectColumn(TeamMemberPeer::LAST_NAME);
			$criteria->addSelectColumn(TeamMemberPeer::FIRST_NAME);
			$criteria->addSelectColumn(TeamMemberPeer::SLUG);
			$criteria->addSelectColumn(TeamMemberPeer::GENDER_ID);
			$criteria->addSelectColumn(TeamMemberPeer::EMPLOYED_SINCE);
			$criteria->addSelectColumn(TeamMemberPeer::DATE_OF_BIRTH);
			$criteria->addSelectColumn(TeamMemberPeer::PROFESSION);
			$criteria->addSelectColumn(TeamMemberPeer::EMAIL_G);
			$criteria->addSelectColumn(TeamMemberPeer::PORTRAIT_ID);
			$criteria->addSelectColumn(TeamMemberPeer::USER_ID);
			$criteria->addSelectColumn(TeamMemberPeer::IS_DELETED);
			$criteria->addSelectColumn(TeamMemberPeer::IS_NEWLY_UPDATED);
			$criteria->addSelectColumn(TeamMemberPeer::CREATED_AT);
			$criteria->addSelectColumn(TeamMemberPeer::UPDATED_AT);
			$criteria->addSelectColumn(TeamMemberPeer::CREATED_BY);
			$criteria->addSelectColumn(TeamMemberPeer::UPDATED_BY);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.ORIGINAL_ID');
			$criteria->addSelectColumn($alias . '.LAST_NAME');
			$criteria->addSelectColumn($alias . '.FIRST_NAME');
			$criteria->addSelectColumn($alias . '.SLUG');
			$criteria->addSelectColumn($alias . '.GENDER_ID');
			$criteria->addSelectColumn($alias . '.EMPLOYED_SINCE');
			$criteria->addSelectColumn($alias . '.DATE_OF_BIRTH');
			$criteria->addSelectColumn($alias . '.PROFESSION');
			$criteria->addSelectColumn($alias . '.EMAIL_G');
			$criteria->addSelectColumn($alias . '.PORTRAIT_ID');
			$criteria->addSelectColumn($alias . '.USER_ID');
			$criteria->addSelectColumn($alias . '.IS_DELETED');
			$criteria->addSelectColumn($alias . '.IS_NEWLY_UPDATED');
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
		$criteria->setPrimaryTableName(TeamMemberPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			TeamMemberPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     TeamMember
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = TeamMemberPeer::doSelect($critcopy, $con);
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
		return TeamMemberPeer::populateObjects(TeamMemberPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			TeamMemberPeer::addSelectColumns($criteria);
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
	 * @param      TeamMember $value A TeamMember object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(TeamMember $obj, $key = null)
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
	 * @param      mixed $value A TeamMember object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof TeamMember) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or TeamMember object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     TeamMember Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to team_members
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
		// Invalidate objects in TeamMemberFunctionPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		TeamMemberFunctionPeer::clearInstancePool();
		// Invalidate objects in ClassTeacherPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		ClassTeacherPeer::clearInstancePool();
		// Invalidate objects in ServiceMemberPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		ServiceMemberPeer::clearInstancePool();
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
		$cls = TeamMemberPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = TeamMemberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = TeamMemberPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				TeamMemberPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (TeamMember object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = TeamMemberPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = TeamMemberPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + TeamMemberPeer::NUM_COLUMNS;
		} else {
			$cls = TeamMemberPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			TeamMemberPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the number of rows matching criteria, joining the related Document table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinDocument(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(TeamMemberPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			TeamMemberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(TeamMemberPeer::PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related UserRelatedByUserId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinUserRelatedByUserId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(TeamMemberPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			TeamMemberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(TeamMemberPeer::USER_ID, UserPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(TeamMemberPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			TeamMemberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(TeamMemberPeer::CREATED_BY, UserPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(TeamMemberPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			TeamMemberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(TeamMemberPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

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
	 * Selects a collection of TeamMember objects pre-filled with their Document objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of TeamMember objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinDocument(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		TeamMemberPeer::addSelectColumns($criteria);
		$startcol = (TeamMemberPeer::NUM_COLUMNS - TeamMemberPeer::NUM_LAZY_LOAD_COLUMNS);
		DocumentPeer::addSelectColumns($criteria);

		$criteria->addJoin(TeamMemberPeer::PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = TeamMemberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = TeamMemberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = TeamMemberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				TeamMemberPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (TeamMember) to $obj2 (Document)
				$obj2->addTeamMember($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of TeamMember objects pre-filled with their User objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of TeamMember objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUserRelatedByUserId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		TeamMemberPeer::addSelectColumns($criteria);
		$startcol = (TeamMemberPeer::NUM_COLUMNS - TeamMemberPeer::NUM_LAZY_LOAD_COLUMNS);
		UserPeer::addSelectColumns($criteria);

		$criteria->addJoin(TeamMemberPeer::USER_ID, UserPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = TeamMemberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = TeamMemberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = TeamMemberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				TeamMemberPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (TeamMember) to $obj2 (User)
				$obj2->addTeamMemberRelatedByUserId($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of TeamMember objects pre-filled with their User objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of TeamMember objects.
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

		TeamMemberPeer::addSelectColumns($criteria);
		$startcol = (TeamMemberPeer::NUM_COLUMNS - TeamMemberPeer::NUM_LAZY_LOAD_COLUMNS);
		UserPeer::addSelectColumns($criteria);

		$criteria->addJoin(TeamMemberPeer::CREATED_BY, UserPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = TeamMemberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = TeamMemberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = TeamMemberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				TeamMemberPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (TeamMember) to $obj2 (User)
				$obj2->addTeamMemberRelatedByCreatedBy($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of TeamMember objects pre-filled with their User objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of TeamMember objects.
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

		TeamMemberPeer::addSelectColumns($criteria);
		$startcol = (TeamMemberPeer::NUM_COLUMNS - TeamMemberPeer::NUM_LAZY_LOAD_COLUMNS);
		UserPeer::addSelectColumns($criteria);

		$criteria->addJoin(TeamMemberPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = TeamMemberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = TeamMemberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = TeamMemberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				TeamMemberPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (TeamMember) to $obj2 (User)
				$obj2->addTeamMemberRelatedByUpdatedBy($obj1);

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
		$criteria->setPrimaryTableName(TeamMemberPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			TeamMemberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(TeamMemberPeer::PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

		$criteria->addJoin(TeamMemberPeer::USER_ID, UserPeer::ID, $join_behavior);

		$criteria->addJoin(TeamMemberPeer::CREATED_BY, UserPeer::ID, $join_behavior);

		$criteria->addJoin(TeamMemberPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

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
	 * Selects a collection of TeamMember objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of TeamMember objects.
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

		TeamMemberPeer::addSelectColumns($criteria);
		$startcol2 = (TeamMemberPeer::NUM_COLUMNS - TeamMemberPeer::NUM_LAZY_LOAD_COLUMNS);

		DocumentPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (DocumentPeer::NUM_COLUMNS - DocumentPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(TeamMemberPeer::PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

		$criteria->addJoin(TeamMemberPeer::USER_ID, UserPeer::ID, $join_behavior);

		$criteria->addJoin(TeamMemberPeer::CREATED_BY, UserPeer::ID, $join_behavior);

		$criteria->addJoin(TeamMemberPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = TeamMemberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = TeamMemberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = TeamMemberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				TeamMemberPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (TeamMember) to the collection in $obj2 (Document)
				$obj2->addTeamMember($obj1);
			} // if joined row not null

			// Add objects for joined User rows

			$key3 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = UserPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = UserPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					UserPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (TeamMember) to the collection in $obj3 (User)
				$obj3->addTeamMemberRelatedByUserId($obj1);
			} // if joined row not null

			// Add objects for joined User rows

			$key4 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = UserPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = UserPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					UserPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (TeamMember) to the collection in $obj4 (User)
				$obj4->addTeamMemberRelatedByCreatedBy($obj1);
			} // if joined row not null

			// Add objects for joined User rows

			$key5 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = UserPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = UserPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					UserPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (TeamMember) to the collection in $obj5 (User)
				$obj5->addTeamMemberRelatedByUpdatedBy($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Document table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptDocument(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(TeamMemberPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			TeamMemberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(TeamMemberPeer::USER_ID, UserPeer::ID, $join_behavior);

		$criteria->addJoin(TeamMemberPeer::CREATED_BY, UserPeer::ID, $join_behavior);

		$criteria->addJoin(TeamMemberPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related UserRelatedByUserId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptUserRelatedByUserId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(TeamMemberPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			TeamMemberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(TeamMemberPeer::PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(TeamMemberPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			TeamMemberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(TeamMemberPeer::PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(TeamMemberPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			TeamMemberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(TeamMemberPeer::PORTRAIT_ID, DocumentPeer::ID, $join_behavior);

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
	 * Selects a collection of TeamMember objects pre-filled with all related objects except Document.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of TeamMember objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptDocument(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		TeamMemberPeer::addSelectColumns($criteria);
		$startcol2 = (TeamMemberPeer::NUM_COLUMNS - TeamMemberPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(TeamMemberPeer::USER_ID, UserPeer::ID, $join_behavior);

		$criteria->addJoin(TeamMemberPeer::CREATED_BY, UserPeer::ID, $join_behavior);

		$criteria->addJoin(TeamMemberPeer::UPDATED_BY, UserPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = TeamMemberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = TeamMemberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = TeamMemberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				TeamMemberPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined User rows

				$key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = UserPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = UserPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					UserPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (TeamMember) to the collection in $obj2 (User)
				$obj2->addTeamMemberRelatedByUserId($obj1);

			} // if joined row is not null

				// Add objects for joined User rows

				$key3 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = UserPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = UserPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					UserPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (TeamMember) to the collection in $obj3 (User)
				$obj3->addTeamMemberRelatedByCreatedBy($obj1);

			} // if joined row is not null

				// Add objects for joined User rows

				$key4 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = UserPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = UserPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					UserPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (TeamMember) to the collection in $obj4 (User)
				$obj4->addTeamMemberRelatedByUpdatedBy($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of TeamMember objects pre-filled with all related objects except UserRelatedByUserId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of TeamMember objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptUserRelatedByUserId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		TeamMemberPeer::addSelectColumns($criteria);
		$startcol2 = (TeamMemberPeer::NUM_COLUMNS - TeamMemberPeer::NUM_LAZY_LOAD_COLUMNS);

		DocumentPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (DocumentPeer::NUM_COLUMNS - DocumentPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(TeamMemberPeer::PORTRAIT_ID, DocumentPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = TeamMemberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = TeamMemberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = TeamMemberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				TeamMemberPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (TeamMember) to the collection in $obj2 (Document)
				$obj2->addTeamMember($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of TeamMember objects pre-filled with all related objects except UserRelatedByCreatedBy.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of TeamMember objects.
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

		TeamMemberPeer::addSelectColumns($criteria);
		$startcol2 = (TeamMemberPeer::NUM_COLUMNS - TeamMemberPeer::NUM_LAZY_LOAD_COLUMNS);

		DocumentPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (DocumentPeer::NUM_COLUMNS - DocumentPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(TeamMemberPeer::PORTRAIT_ID, DocumentPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = TeamMemberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = TeamMemberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = TeamMemberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				TeamMemberPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (TeamMember) to the collection in $obj2 (Document)
				$obj2->addTeamMember($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of TeamMember objects pre-filled with all related objects except UserRelatedByUpdatedBy.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of TeamMember objects.
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

		TeamMemberPeer::addSelectColumns($criteria);
		$startcol2 = (TeamMemberPeer::NUM_COLUMNS - TeamMemberPeer::NUM_LAZY_LOAD_COLUMNS);

		DocumentPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (DocumentPeer::NUM_COLUMNS - DocumentPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(TeamMemberPeer::PORTRAIT_ID, DocumentPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = TeamMemberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = TeamMemberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = TeamMemberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				TeamMemberPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (TeamMember) to the collection in $obj2 (Document)
				$obj2->addTeamMember($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseTeamMemberPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseTeamMemberPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new TeamMemberTableMap());
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
		return $withPrefix ? TeamMemberPeer::CLASS_DEFAULT : TeamMemberPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a TeamMember or Criteria object.
	 *
	 * @param      mixed $values Criteria or TeamMember object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from TeamMember object
		}

		if ($criteria->containsKey(TeamMemberPeer::ID) && $criteria->keyContainsValue(TeamMemberPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.TeamMemberPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a TeamMember or Criteria object.
	 *
	 * @param      mixed $values Criteria or TeamMember object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(TeamMemberPeer::ID);
			$value = $criteria->remove(TeamMemberPeer::ID);
			if ($value) {
				$selectCriteria->add(TeamMemberPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(TeamMemberPeer::TABLE_NAME);
			}

		} else { // $values is TeamMember object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the team_members table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += TeamMemberPeer::doOnDeleteCascade(new Criteria(TeamMemberPeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(TeamMemberPeer::TABLE_NAME, $con, TeamMemberPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			TeamMemberPeer::clearInstancePool();
			TeamMemberPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a TeamMember or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or TeamMember object or primary key or array of primary keys
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
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof TeamMember) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TeamMemberPeer::ID, (array) $values, Criteria::IN);
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
			$affectedRows += TeamMemberPeer::doOnDeleteCascade($c, $con);
			
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			if ($values instanceof Criteria) {
				TeamMemberPeer::clearInstancePool();
			} elseif ($values instanceof TeamMember) { // it's a model object
				TeamMemberPeer::removeInstanceFromPool($values);
			} else { // it's a primary key, or an array of pks
				foreach ((array) $values as $singleval) {
					TeamMemberPeer::removeInstanceFromPool($singleval);
				}
			}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			TeamMemberPeer::clearRelatedInstancePool();
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
		$objects = TeamMemberPeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {


			// delete related TeamMemberFunction objects
			$criteria = new Criteria(TeamMemberFunctionPeer::DATABASE_NAME);
			
			$criteria->add(TeamMemberFunctionPeer::TEAM_MEMBER_ID, $obj->getId());
			$affectedRows += TeamMemberFunctionPeer::doDelete($criteria, $con);

			// delete related ClassTeacher objects
			$criteria = new Criteria(ClassTeacherPeer::DATABASE_NAME);
			
			$criteria->add(ClassTeacherPeer::TEAM_MEMBER_ID, $obj->getId());
			$affectedRows += ClassTeacherPeer::doDelete($criteria, $con);

			// delete related ServiceMember objects
			$criteria = new Criteria(ServiceMemberPeer::DATABASE_NAME);
			
			$criteria->add(ServiceMemberPeer::TEAM_MEMBER_ID, $obj->getId());
			$affectedRows += ServiceMemberPeer::doDelete($criteria, $con);
		}
		return $affectedRows;
	}

	/**
	 * Validates all modified columns of given TeamMember object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      TeamMember $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(TeamMember $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TeamMemberPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TeamMemberPeer::TABLE_NAME);

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

		return BasePeer::doValidate(TeamMemberPeer::DATABASE_NAME, TeamMemberPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     TeamMember
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = TeamMemberPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(TeamMemberPeer::DATABASE_NAME);
		$criteria->add(TeamMemberPeer::ID, $pk);

		$v = TeamMemberPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(TeamMemberPeer::DATABASE_NAME);
			$criteria->add(TeamMemberPeer::ID, $pks, Criteria::IN);
			$objs = TeamMemberPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseTeamMemberPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseTeamMemberPeer::buildTableMap();

