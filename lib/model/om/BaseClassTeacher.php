<?php


/**
 * Base class that represents a row from the 'class_teachers' table.
 *
 * 
 *
 * @package    propel.generator.model.om
 */
abstract class BaseClassTeacher extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ClassTeacherPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ClassTeacherPeer
	 */
	protected static $peer;

	/**
	 * The value for the school_class_id field.
	 * @var        int
	 */
	protected $school_class_id;

	/**
	 * The value for the team_member_id field.
	 * @var        int
	 */
	protected $team_member_id;

	/**
	 * The value for the function_name field.
	 * @var        string
	 */
	protected $function_name;

	/**
	 * The value for the sort_order field.
	 * @var        int
	 */
	protected $sort_order;

	/**
	 * The value for the is_class_teacher field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $is_class_teacher;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * The value for the updated_at field.
	 * @var        string
	 */
	protected $updated_at;

	/**
	 * The value for the created_by field.
	 * @var        int
	 */
	protected $created_by;

	/**
	 * The value for the updated_by field.
	 * @var        int
	 */
	protected $updated_by;

	/**
	 * @var        SchoolClass
	 */
	protected $aSchoolClass;

	/**
	 * @var        TeamMember
	 */
	protected $aTeamMember;

	/**
	 * @var        User
	 */
	protected $aUserRelatedByCreatedBy;

	/**
	 * @var        User
	 */
	protected $aUserRelatedByUpdatedBy;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->is_class_teacher = false;
	}

	/**
	 * Initializes internal state of BaseClassTeacher object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [school_class_id] column value.
	 * 
	 * @return     int
	 */
	public function getSchoolClassId()
	{
		return $this->school_class_id;
	}

	/**
	 * Get the [team_member_id] column value.
	 * 
	 * @return     int
	 */
	public function getTeamMemberId()
	{
		return $this->team_member_id;
	}

	/**
	 * Get the [function_name] column value.
	 * 
	 * @return     string
	 */
	public function getFunctionName()
	{
		return $this->function_name;
	}

	/**
	 * Get the [sort_order] column value.
	 * 
	 * @return     int
	 */
	public function getSortOrder()
	{
		return $this->sort_order;
	}

	/**
	 * Get the [is_class_teacher] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsClassTeacher()
	{
		return $this->is_class_teacher;
	}

	/**
	 * Get the [optionally formatted] temporal [created_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}


		if ($this->created_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [updated_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->updated_at === null) {
			return null;
		}


		if ($this->updated_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->updated_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [created_by] column value.
	 * 
	 * @return     int
	 */
	public function getCreatedBy()
	{
		return $this->created_by;
	}

	/**
	 * Get the [updated_by] column value.
	 * 
	 * @return     int
	 */
	public function getUpdatedBy()
	{
		return $this->updated_by;
	}

	/**
	 * Set the value of [school_class_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ClassTeacher The current object (for fluent API support)
	 */
	public function setSchoolClassId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->school_class_id !== $v) {
			$this->school_class_id = $v;
			$this->modifiedColumns[] = ClassTeacherPeer::SCHOOL_CLASS_ID;
		}

		if ($this->aSchoolClass !== null && $this->aSchoolClass->getId() !== $v) {
			$this->aSchoolClass = null;
		}

		return $this;
	} // setSchoolClassId()

	/**
	 * Set the value of [team_member_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ClassTeacher The current object (for fluent API support)
	 */
	public function setTeamMemberId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->team_member_id !== $v) {
			$this->team_member_id = $v;
			$this->modifiedColumns[] = ClassTeacherPeer::TEAM_MEMBER_ID;
		}

		if ($this->aTeamMember !== null && $this->aTeamMember->getId() !== $v) {
			$this->aTeamMember = null;
		}

		return $this;
	} // setTeamMemberId()

	/**
	 * Set the value of [function_name] column.
	 * 
	 * @param      string $v new value
	 * @return     ClassTeacher The current object (for fluent API support)
	 */
	public function setFunctionName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->function_name !== $v) {
			$this->function_name = $v;
			$this->modifiedColumns[] = ClassTeacherPeer::FUNCTION_NAME;
		}

		return $this;
	} // setFunctionName()

	/**
	 * Set the value of [sort_order] column.
	 * 
	 * @param      int $v new value
	 * @return     ClassTeacher The current object (for fluent API support)
	 */
	public function setSortOrder($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->sort_order !== $v) {
			$this->sort_order = $v;
			$this->modifiedColumns[] = ClassTeacherPeer::SORT_ORDER;
		}

		return $this;
	} // setSortOrder()

	/**
	 * Sets the value of the [is_class_teacher] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     ClassTeacher The current object (for fluent API support)
	 */
	public function setIsClassTeacher($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->is_class_teacher !== $v) {
			$this->is_class_teacher = $v;
			$this->modifiedColumns[] = ClassTeacherPeer::IS_CLASS_TEACHER;
		}

		return $this;
	} // setIsClassTeacher()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     ClassTeacher The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->created_at !== null || $dt !== null) {
			$currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->created_at = $newDateAsString;
				$this->modifiedColumns[] = ClassTeacherPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     ClassTeacher The current object (for fluent API support)
	 */
	public function setUpdatedAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->updated_at !== null || $dt !== null) {
			$currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->updated_at = $newDateAsString;
				$this->modifiedColumns[] = ClassTeacherPeer::UPDATED_AT;
			}
		} // if either are not null

		return $this;
	} // setUpdatedAt()

	/**
	 * Set the value of [created_by] column.
	 * 
	 * @param      int $v new value
	 * @return     ClassTeacher The current object (for fluent API support)
	 */
	public function setCreatedBy($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ClassTeacherPeer::CREATED_BY;
		}

		if ($this->aUserRelatedByCreatedBy !== null && $this->aUserRelatedByCreatedBy->getId() !== $v) {
			$this->aUserRelatedByCreatedBy = null;
		}

		return $this;
	} // setCreatedBy()

	/**
	 * Set the value of [updated_by] column.
	 * 
	 * @param      int $v new value
	 * @return     ClassTeacher The current object (for fluent API support)
	 */
	public function setUpdatedBy($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = ClassTeacherPeer::UPDATED_BY;
		}

		if ($this->aUserRelatedByUpdatedBy !== null && $this->aUserRelatedByUpdatedBy->getId() !== $v) {
			$this->aUserRelatedByUpdatedBy = null;
		}

		return $this;
	} // setUpdatedBy()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->is_class_teacher !== false) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->school_class_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->team_member_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->function_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->sort_order = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->is_class_teacher = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->created_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->updated_at = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->created_by = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->updated_by = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 9; // 9 = ClassTeacherPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating ClassTeacher object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aSchoolClass !== null && $this->school_class_id !== $this->aSchoolClass->getId()) {
			$this->aSchoolClass = null;
		}
		if ($this->aTeamMember !== null && $this->team_member_id !== $this->aTeamMember->getId()) {
			$this->aTeamMember = null;
		}
		if ($this->aUserRelatedByCreatedBy !== null && $this->created_by !== $this->aUserRelatedByCreatedBy->getId()) {
			$this->aUserRelatedByCreatedBy = null;
		}
		if ($this->aUserRelatedByUpdatedBy !== null && $this->updated_by !== $this->aUserRelatedByUpdatedBy->getId()) {
			$this->aUserRelatedByUpdatedBy = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ClassTeacherPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ClassTeacherPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSchoolClass = null;
			$this->aTeamMember = null;
			$this->aUserRelatedByCreatedBy = null;
			$this->aUserRelatedByUpdatedBy = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ClassTeacherPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = ClassTeacherQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// denyable behavior
			if(!(ClassTeacherPeer::isIgnoringRights() || $this->mayOperate("delete"))) {
				throw new PropelException(new NotPermittedException("delete.by_role", array("role_key" => "class_teachers")));
			}

			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ClassTeacherPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// denyable behavior
				if(!(ClassTeacherPeer::isIgnoringRights() || $this->mayOperate("insert"))) {
					throw new PropelException(new NotPermittedException("insert.by_role", array("role_key" => "class_teachers")));
				}

				// extended_timestampable behavior
				if (!$this->isColumnModified(ClassTeacherPeer::CREATED_AT)) {
					$this->setCreatedAt(time());
				}
				if (!$this->isColumnModified(ClassTeacherPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
				// attributable behavior
				
				if(Session::getSession()->isAuthenticated()) {
					if (!$this->isColumnModified(ClassTeacherPeer::CREATED_BY)) {
						$this->setCreatedBy(Session::getSession()->getUser()->getId());
					}
					if (!$this->isColumnModified(ClassTeacherPeer::UPDATED_BY)) {
						$this->setUpdatedBy(Session::getSession()->getUser()->getId());
					}
				}

			} else {
				$ret = $ret && $this->preUpdate($con);
				// denyable behavior
				if(!(ClassTeacherPeer::isIgnoringRights() || $this->mayOperate("update"))) {
					throw new PropelException(new NotPermittedException("update.by_role", array("role_key" => "class_teachers")));
				}

				// extended_timestampable behavior
				if ($this->isModified() && !$this->isColumnModified(ClassTeacherPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
				// attributable behavior
				
				if(Session::getSession()->isAuthenticated()) {
					if ($this->isModified() && !$this->isColumnModified(ClassTeacherPeer::UPDATED_BY)) {
						$this->setUpdatedBy(Session::getSession()->getUser()->getId());
					}
				}
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				ClassTeacherPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aSchoolClass !== null) {
				if ($this->aSchoolClass->isModified() || $this->aSchoolClass->isNew()) {
					$affectedRows += $this->aSchoolClass->save($con);
				}
				$this->setSchoolClass($this->aSchoolClass);
			}

			if ($this->aTeamMember !== null) {
				if ($this->aTeamMember->isModified() || $this->aTeamMember->isNew()) {
					$affectedRows += $this->aTeamMember->save($con);
				}
				$this->setTeamMember($this->aTeamMember);
			}

			if ($this->aUserRelatedByCreatedBy !== null) {
				if ($this->aUserRelatedByCreatedBy->isModified() || $this->aUserRelatedByCreatedBy->isNew()) {
					$affectedRows += $this->aUserRelatedByCreatedBy->save($con);
				}
				$this->setUserRelatedByCreatedBy($this->aUserRelatedByCreatedBy);
			}

			if ($this->aUserRelatedByUpdatedBy !== null) {
				if ($this->aUserRelatedByUpdatedBy->isModified() || $this->aUserRelatedByUpdatedBy->isNew()) {
					$affectedRows += $this->aUserRelatedByUpdatedBy->save($con);
				}
				$this->setUserRelatedByUpdatedBy($this->aUserRelatedByUpdatedBy);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setNew(false);
				} else {
					$affectedRows += ClassTeacherPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aSchoolClass !== null) {
				if (!$this->aSchoolClass->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSchoolClass->getValidationFailures());
				}
			}

			if ($this->aTeamMember !== null) {
				if (!$this->aTeamMember->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTeamMember->getValidationFailures());
				}
			}

			if ($this->aUserRelatedByCreatedBy !== null) {
				if (!$this->aUserRelatedByCreatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUserRelatedByCreatedBy->getValidationFailures());
				}
			}

			if ($this->aUserRelatedByUpdatedBy !== null) {
				if (!$this->aUserRelatedByUpdatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUserRelatedByUpdatedBy->getValidationFailures());
				}
			}


			if (($retval = ClassTeacherPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ClassTeacherPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getSchoolClassId();
				break;
			case 1:
				return $this->getTeamMemberId();
				break;
			case 2:
				return $this->getFunctionName();
				break;
			case 3:
				return $this->getSortOrder();
				break;
			case 4:
				return $this->getIsClassTeacher();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getUpdatedAt();
				break;
			case 7:
				return $this->getCreatedBy();
				break;
			case 8:
				return $this->getUpdatedBy();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['ClassTeacher'][serialize($this->getPrimaryKey())])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['ClassTeacher'][serialize($this->getPrimaryKey())] = true;
		$keys = ClassTeacherPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getSchoolClassId(),
			$keys[1] => $this->getTeamMemberId(),
			$keys[2] => $this->getFunctionName(),
			$keys[3] => $this->getSortOrder(),
			$keys[4] => $this->getIsClassTeacher(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getCreatedBy(),
			$keys[8] => $this->getUpdatedBy(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aSchoolClass) {
				$result['SchoolClass'] = $this->aSchoolClass->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aTeamMember) {
				$result['TeamMember'] = $this->aTeamMember->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUserRelatedByCreatedBy) {
				$result['UserRelatedByCreatedBy'] = $this->aUserRelatedByCreatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUserRelatedByUpdatedBy) {
				$result['UserRelatedByUpdatedBy'] = $this->aUserRelatedByUpdatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ClassTeacherPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setSchoolClassId($value);
				break;
			case 1:
				$this->setTeamMemberId($value);
				break;
			case 2:
				$this->setFunctionName($value);
				break;
			case 3:
				$this->setSortOrder($value);
				break;
			case 4:
				$this->setIsClassTeacher($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
				break;
			case 7:
				$this->setCreatedBy($value);
				break;
			case 8:
				$this->setUpdatedBy($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ClassTeacherPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setSchoolClassId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTeamMemberId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFunctionName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSortOrder($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIsClassTeacher($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedBy($arr[$keys[8]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ClassTeacherPeer::DATABASE_NAME);

		if ($this->isColumnModified(ClassTeacherPeer::SCHOOL_CLASS_ID)) $criteria->add(ClassTeacherPeer::SCHOOL_CLASS_ID, $this->school_class_id);
		if ($this->isColumnModified(ClassTeacherPeer::TEAM_MEMBER_ID)) $criteria->add(ClassTeacherPeer::TEAM_MEMBER_ID, $this->team_member_id);
		if ($this->isColumnModified(ClassTeacherPeer::FUNCTION_NAME)) $criteria->add(ClassTeacherPeer::FUNCTION_NAME, $this->function_name);
		if ($this->isColumnModified(ClassTeacherPeer::SORT_ORDER)) $criteria->add(ClassTeacherPeer::SORT_ORDER, $this->sort_order);
		if ($this->isColumnModified(ClassTeacherPeer::IS_CLASS_TEACHER)) $criteria->add(ClassTeacherPeer::IS_CLASS_TEACHER, $this->is_class_teacher);
		if ($this->isColumnModified(ClassTeacherPeer::CREATED_AT)) $criteria->add(ClassTeacherPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ClassTeacherPeer::UPDATED_AT)) $criteria->add(ClassTeacherPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ClassTeacherPeer::CREATED_BY)) $criteria->add(ClassTeacherPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ClassTeacherPeer::UPDATED_BY)) $criteria->add(ClassTeacherPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ClassTeacherPeer::DATABASE_NAME);
		$criteria->add(ClassTeacherPeer::SCHOOL_CLASS_ID, $this->school_class_id);
		$criteria->add(ClassTeacherPeer::TEAM_MEMBER_ID, $this->team_member_id);
		$criteria->add(ClassTeacherPeer::FUNCTION_NAME, $this->function_name);

		return $criteria;
	}

	/**
	 * Returns the composite primary key for this object.
	 * The array elements will be in same order as specified in XML.
	 * @return     array
	 */
	public function getPrimaryKey()
	{
		$pks = array();
		$pks[0] = $this->getSchoolClassId();
		$pks[1] = $this->getTeamMemberId();
		$pks[2] = $this->getFunctionName();

		return $pks;
	}

	/**
	 * Set the [composite] primary key.
	 *
	 * @param      array $keys The elements of the composite key (order must match the order in XML file).
	 * @return     void
	 */
	public function setPrimaryKey($keys)
	{
		$this->setSchoolClassId($keys[0]);
		$this->setTeamMemberId($keys[1]);
		$this->setFunctionName($keys[2]);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return (null === $this->getSchoolClassId()) && (null === $this->getTeamMemberId()) && (null === $this->getFunctionName());
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of ClassTeacher (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setSchoolClassId($this->getSchoolClassId());
		$copyObj->setTeamMemberId($this->getTeamMemberId());
		$copyObj->setFunctionName($this->getFunctionName());
		$copyObj->setSortOrder($this->getSortOrder());
		$copyObj->setIsClassTeacher($this->getIsClassTeacher());
		$copyObj->setCreatedAt($this->getCreatedAt());
		$copyObj->setUpdatedAt($this->getUpdatedAt());
		$copyObj->setCreatedBy($this->getCreatedBy());
		$copyObj->setUpdatedBy($this->getUpdatedBy());
		if ($makeNew) {
			$copyObj->setNew(true);
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     ClassTeacher Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     ClassTeacherPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ClassTeacherPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a SchoolClass object.
	 *
	 * @param      SchoolClass $v
	 * @return     ClassTeacher The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSchoolClass(SchoolClass $v = null)
	{
		if ($v === null) {
			$this->setSchoolClassId(NULL);
		} else {
			$this->setSchoolClassId($v->getId());
		}

		$this->aSchoolClass = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SchoolClass object, it will not be re-added.
		if ($v !== null) {
			$v->addClassTeacher($this);
		}

		return $this;
	}


	/**
	 * Get the associated SchoolClass object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SchoolClass The associated SchoolClass object.
	 * @throws     PropelException
	 */
	public function getSchoolClass(PropelPDO $con = null)
	{
		if ($this->aSchoolClass === null && ($this->school_class_id !== null)) {
			$this->aSchoolClass = SchoolClassQuery::create()->findPk($this->school_class_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aSchoolClass->addClassTeachers($this);
			 */
		}
		return $this->aSchoolClass;
	}

	/**
	 * Declares an association between this object and a TeamMember object.
	 *
	 * @param      TeamMember $v
	 * @return     ClassTeacher The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setTeamMember(TeamMember $v = null)
	{
		if ($v === null) {
			$this->setTeamMemberId(NULL);
		} else {
			$this->setTeamMemberId($v->getId());
		}

		$this->aTeamMember = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the TeamMember object, it will not be re-added.
		if ($v !== null) {
			$v->addClassTeacher($this);
		}

		return $this;
	}


	/**
	 * Get the associated TeamMember object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     TeamMember The associated TeamMember object.
	 * @throws     PropelException
	 */
	public function getTeamMember(PropelPDO $con = null)
	{
		if ($this->aTeamMember === null && ($this->team_member_id !== null)) {
			$this->aTeamMember = TeamMemberQuery::create()->findPk($this->team_member_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aTeamMember->addClassTeachers($this);
			 */
		}
		return $this->aTeamMember;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     ClassTeacher The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUserRelatedByCreatedBy(User $v = null)
	{
		if ($v === null) {
			$this->setCreatedBy(NULL);
		} else {
			$this->setCreatedBy($v->getId());
		}

		$this->aUserRelatedByCreatedBy = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the User object, it will not be re-added.
		if ($v !== null) {
			$v->addClassTeacherRelatedByCreatedBy($this);
		}

		return $this;
	}


	/**
	 * Get the associated User object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     User The associated User object.
	 * @throws     PropelException
	 */
	public function getUserRelatedByCreatedBy(PropelPDO $con = null)
	{
		if ($this->aUserRelatedByCreatedBy === null && ($this->created_by !== null)) {
			$this->aUserRelatedByCreatedBy = UserQuery::create()->findPk($this->created_by, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUserRelatedByCreatedBy->addClassTeachersRelatedByCreatedBy($this);
			 */
		}
		return $this->aUserRelatedByCreatedBy;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     ClassTeacher The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUserRelatedByUpdatedBy(User $v = null)
	{
		if ($v === null) {
			$this->setUpdatedBy(NULL);
		} else {
			$this->setUpdatedBy($v->getId());
		}

		$this->aUserRelatedByUpdatedBy = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the User object, it will not be re-added.
		if ($v !== null) {
			$v->addClassTeacherRelatedByUpdatedBy($this);
		}

		return $this;
	}


	/**
	 * Get the associated User object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     User The associated User object.
	 * @throws     PropelException
	 */
	public function getUserRelatedByUpdatedBy(PropelPDO $con = null)
	{
		if ($this->aUserRelatedByUpdatedBy === null && ($this->updated_by !== null)) {
			$this->aUserRelatedByUpdatedBy = UserQuery::create()->findPk($this->updated_by, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUserRelatedByUpdatedBy->addClassTeachersRelatedByUpdatedBy($this);
			 */
		}
		return $this->aUserRelatedByUpdatedBy;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->school_class_id = null;
		$this->team_member_id = null;
		$this->function_name = null;
		$this->sort_order = null;
		$this->is_class_teacher = null;
		$this->created_at = null;
		$this->updated_at = null;
		$this->created_by = null;
		$this->updated_by = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

		$this->aSchoolClass = null;
		$this->aTeamMember = null;
		$this->aUserRelatedByCreatedBy = null;
		$this->aUserRelatedByUpdatedBy = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(ClassTeacherPeer::DEFAULT_STRING_FORMAT);
	}

	// denyable behavior
	public function mayOperate($sOperation, $oUser = false) {
		if($oUser === false) {
			$oUser = Session::getSession()->getUser();
		}
		if($oUser && ($this->isNew() || $this->getCreatedBy() === $oUser->getId()) && ClassTeacherPeer::mayOperateOnOwn($oUser, $this, $sOperation)) {
			return true;
		}
		return ClassTeacherPeer::mayOperateOn($oUser, $this, $sOperation);
	}
	public function mayBeInserted($oUser = false) {
		return $this->mayOperate($oUser, "insert");
	}
	public function mayBeUpdated($oUser = false) {
		return $this->mayOperate($oUser, "update");
	}
	public function mayBeDeleted($oUser = false) {
		return $this->mayOperate($oUser, "delete");
	}

	// extended_timestampable behavior
	
	/**
	 * Mark the current object so that the update date doesn't get updated during next save
	 *
	 * @return     ClassTeacher The current object (for fluent API support)
	 */
	public function keepUpdateDateUnchanged()
	{
		$this->modifiedColumns[] = ClassTeacherPeer::UPDATED_AT;
		return $this;
	}
	
	/**
	 * @return created_at as int (timestamp)
	 */
	public function getCreatedAtTimestamp()
	{
		return (int)$this->getCreatedAt('U');
	}
	
	/**
	 * @return created_at formatted to the current locale
	 */
	public function getCreatedAtFormatted($sLanguageId = null, $sFormatString = 'x')
	{
		if($this->created_at === null) {
			return null;
		}
		return LocaleUtil::localizeDate($this->created_at, $sLanguageId, $sFormatString);
	}
	
	/**
	 * @return updated_at as int (timestamp)
	 */
	public function getUpdatedAtTimestamp()
	{
		return (int)$this->getUpdatedAt('U');
	}
	
	/**
	 * @return updated_at formatted to the current locale
	 */
	public function getUpdatedAtFormatted($sLanguageId = null, $sFormatString = 'x')
	{
		if($this->updated_at === null) {
			return null;
		}
		return LocaleUtil::localizeDate($this->updated_at, $sLanguageId, $sFormatString);
	}

	// attributable behavior
	
	/**
	 * Mark the current object so that the updated user doesn't get updated during next save
	 *
	 * @return     ClassTeacher The current object (for fluent API support)
	 */
	public function keepUpdateUserUnchanged()
	{
		$this->modifiedColumns[] = ClassTeacherPeer::UPDATED_BY;
		return $this;
	}

} // BaseClassTeacher
