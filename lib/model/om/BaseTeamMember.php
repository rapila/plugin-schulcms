<?php


/**
 * Base class that represents a row from the 'team_members' table.
 *
 * 
 *
 * @package    propel.generator.model.om
 */
abstract class BaseTeamMember extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'TeamMemberPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        TeamMemberPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the original_id field.
	 * @var        int
	 */
	protected $original_id;

	/**
	 * The value for the last_name field.
	 * @var        string
	 */
	protected $last_name;

	/**
	 * The value for the first_name field.
	 * @var        string
	 */
	protected $first_name;

	/**
	 * The value for the slug field.
	 * @var        string
	 */
	protected $slug;

	/**
	 * The value for the gender_id field.
	 * @var        string
	 */
	protected $gender_id;

	/**
	 * The value for the employed_since field.
	 * @var        string
	 */
	protected $employed_since;

	/**
	 * The value for the date_of_birth field.
	 * @var        string
	 */
	protected $date_of_birth;

	/**
	 * The value for the profession field.
	 * @var        string
	 */
	protected $profession;

	/**
	 * The value for the email_g field.
	 * @var        string
	 */
	protected $email_g;

	/**
	 * The value for the portrait_id field.
	 * @var        int
	 */
	protected $portrait_id;

	/**
	 * The value for the user_id field.
	 * @var        int
	 */
	protected $user_id;

	/**
	 * The value for the is_deleted field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $is_deleted;

	/**
	 * The value for the is_newly_updated field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $is_newly_updated;

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
	 * @var        Document
	 */
	protected $aDocument;

	/**
	 * @var        User
	 */
	protected $aUserRelatedByUserId;

	/**
	 * @var        User
	 */
	protected $aUserRelatedByCreatedBy;

	/**
	 * @var        User
	 */
	protected $aUserRelatedByUpdatedBy;

	/**
	 * @var        array TeamMemberFunction[] Collection to store aggregation of TeamMemberFunction objects.
	 */
	protected $collTeamMemberFunctions;

	/**
	 * @var        array ClassTeacher[] Collection to store aggregation of ClassTeacher objects.
	 */
	protected $collClassTeachers;

	/**
	 * @var        array ServiceMember[] Collection to store aggregation of ServiceMember objects.
	 */
	protected $collServiceMembers;

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
		$this->is_deleted = false;
		$this->is_newly_updated = false;
	}

	/**
	 * Initializes internal state of BaseTeamMember object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [original_id] column value.
	 * 
	 * @return     int
	 */
	public function getOriginalId()
	{
		return $this->original_id;
	}

	/**
	 * Get the [last_name] column value.
	 * 
	 * @return     string
	 */
	public function getLastName()
	{
		return $this->last_name;
	}

	/**
	 * Get the [first_name] column value.
	 * 
	 * @return     string
	 */
	public function getFirstName()
	{
		return $this->first_name;
	}

	/**
	 * Get the [slug] column value.
	 * 
	 * @return     string
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * Get the [gender_id] column value.
	 * 
	 * @return     string
	 */
	public function getGenderId()
	{
		return $this->gender_id;
	}

	/**
	 * Get the [optionally formatted] temporal [employed_since] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getEmployedSince($format = '%x')
	{
		if ($this->employed_since === null) {
			return null;
		}


		if ($this->employed_since === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->employed_since);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->employed_since, true), $x);
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
	 * Get the [optionally formatted] temporal [date_of_birth] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDateOfBirth($format = '%x')
	{
		if ($this->date_of_birth === null) {
			return null;
		}


		if ($this->date_of_birth === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->date_of_birth);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date_of_birth, true), $x);
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
	 * Get the [profession] column value.
	 * 
	 * @return     string
	 */
	public function getProfession()
	{
		return $this->profession;
	}

	/**
	 * Get the [email_g] column value.
	 * 
	 * @return     string
	 */
	public function getEmailG()
	{
		return $this->email_g;
	}

	/**
	 * Get the [portrait_id] column value.
	 * 
	 * @return     int
	 */
	public function getPortraitId()
	{
		return $this->portrait_id;
	}

	/**
	 * Get the [user_id] column value.
	 * 
	 * @return     int
	 */
	public function getUserId()
	{
		return $this->user_id;
	}

	/**
	 * Get the [is_deleted] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsDeleted()
	{
		return $this->is_deleted;
	}

	/**
	 * Get the [is_newly_updated] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsNewlyUpdated()
	{
		return $this->is_newly_updated;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TeamMemberPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [original_id] column.
	 * 
	 * @param      int $v new value
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setOriginalId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->original_id !== $v) {
			$this->original_id = $v;
			$this->modifiedColumns[] = TeamMemberPeer::ORIGINAL_ID;
		}

		return $this;
	} // setOriginalId()

	/**
	 * Set the value of [last_name] column.
	 * 
	 * @param      string $v new value
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setLastName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->last_name !== $v) {
			$this->last_name = $v;
			$this->modifiedColumns[] = TeamMemberPeer::LAST_NAME;
		}

		return $this;
	} // setLastName()

	/**
	 * Set the value of [first_name] column.
	 * 
	 * @param      string $v new value
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setFirstName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->first_name !== $v) {
			$this->first_name = $v;
			$this->modifiedColumns[] = TeamMemberPeer::FIRST_NAME;
		}

		return $this;
	} // setFirstName()

	/**
	 * Set the value of [slug] column.
	 * 
	 * @param      string $v new value
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setSlug($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = TeamMemberPeer::SLUG;
		}

		return $this;
	} // setSlug()

	/**
	 * Set the value of [gender_id] column.
	 * 
	 * @param      string $v new value
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setGenderId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->gender_id !== $v) {
			$this->gender_id = $v;
			$this->modifiedColumns[] = TeamMemberPeer::GENDER_ID;
		}

		return $this;
	} // setGenderId()

	/**
	 * Sets the value of [employed_since] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setEmployedSince($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->employed_since !== null || $dt !== null) {
			$currentDateAsString = ($this->employed_since !== null && $tmpDt = new DateTime($this->employed_since)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->employed_since = $newDateAsString;
				$this->modifiedColumns[] = TeamMemberPeer::EMPLOYED_SINCE;
			}
		} // if either are not null

		return $this;
	} // setEmployedSince()

	/**
	 * Sets the value of [date_of_birth] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setDateOfBirth($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->date_of_birth !== null || $dt !== null) {
			$currentDateAsString = ($this->date_of_birth !== null && $tmpDt = new DateTime($this->date_of_birth)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->date_of_birth = $newDateAsString;
				$this->modifiedColumns[] = TeamMemberPeer::DATE_OF_BIRTH;
			}
		} // if either are not null

		return $this;
	} // setDateOfBirth()

	/**
	 * Set the value of [profession] column.
	 * 
	 * @param      string $v new value
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setProfession($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->profession !== $v) {
			$this->profession = $v;
			$this->modifiedColumns[] = TeamMemberPeer::PROFESSION;
		}

		return $this;
	} // setProfession()

	/**
	 * Set the value of [email_g] column.
	 * 
	 * @param      string $v new value
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setEmailG($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email_g !== $v) {
			$this->email_g = $v;
			$this->modifiedColumns[] = TeamMemberPeer::EMAIL_G;
		}

		return $this;
	} // setEmailG()

	/**
	 * Set the value of [portrait_id] column.
	 * 
	 * @param      int $v new value
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setPortraitId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->portrait_id !== $v) {
			$this->portrait_id = $v;
			$this->modifiedColumns[] = TeamMemberPeer::PORTRAIT_ID;
		}

		if ($this->aDocument !== null && $this->aDocument->getId() !== $v) {
			$this->aDocument = null;
		}

		return $this;
	} // setPortraitId()

	/**
	 * Set the value of [user_id] column.
	 * 
	 * @param      int $v new value
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setUserId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = TeamMemberPeer::USER_ID;
		}

		if ($this->aUserRelatedByUserId !== null && $this->aUserRelatedByUserId->getId() !== $v) {
			$this->aUserRelatedByUserId = null;
		}

		return $this;
	} // setUserId()

	/**
	 * Sets the value of the [is_deleted] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setIsDeleted($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->is_deleted !== $v) {
			$this->is_deleted = $v;
			$this->modifiedColumns[] = TeamMemberPeer::IS_DELETED;
		}

		return $this;
	} // setIsDeleted()

	/**
	 * Sets the value of the [is_newly_updated] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setIsNewlyUpdated($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->is_newly_updated !== $v) {
			$this->is_newly_updated = $v;
			$this->modifiedColumns[] = TeamMemberPeer::IS_NEWLY_UPDATED;
		}

		return $this;
	} // setIsNewlyUpdated()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->created_at !== null || $dt !== null) {
			$currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->created_at = $newDateAsString;
				$this->modifiedColumns[] = TeamMemberPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setUpdatedAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->updated_at !== null || $dt !== null) {
			$currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->updated_at = $newDateAsString;
				$this->modifiedColumns[] = TeamMemberPeer::UPDATED_AT;
			}
		} // if either are not null

		return $this;
	} // setUpdatedAt()

	/**
	 * Set the value of [created_by] column.
	 * 
	 * @param      int $v new value
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setCreatedBy($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = TeamMemberPeer::CREATED_BY;
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
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function setUpdatedBy($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = TeamMemberPeer::UPDATED_BY;
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
			if ($this->is_deleted !== false) {
				return false;
			}

			if ($this->is_newly_updated !== false) {
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

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->original_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->last_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->first_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->slug = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->gender_id = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->employed_since = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->date_of_birth = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->profession = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->email_g = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->portrait_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->user_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->is_deleted = ($row[$startcol + 12] !== null) ? (boolean) $row[$startcol + 12] : null;
			$this->is_newly_updated = ($row[$startcol + 13] !== null) ? (boolean) $row[$startcol + 13] : null;
			$this->created_at = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->updated_at = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->created_by = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
			$this->updated_by = ($row[$startcol + 17] !== null) ? (int) $row[$startcol + 17] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 18; // 18 = TeamMemberPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating TeamMember object", $e);
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

		if ($this->aDocument !== null && $this->portrait_id !== $this->aDocument->getId()) {
			$this->aDocument = null;
		}
		if ($this->aUserRelatedByUserId !== null && $this->user_id !== $this->aUserRelatedByUserId->getId()) {
			$this->aUserRelatedByUserId = null;
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
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = TeamMemberPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aDocument = null;
			$this->aUserRelatedByUserId = null;
			$this->aUserRelatedByCreatedBy = null;
			$this->aUserRelatedByUpdatedBy = null;
			$this->collTeamMemberFunctions = null;

			$this->collClassTeachers = null;

			$this->collServiceMembers = null;

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
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = TeamMemberQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// denyable behavior
			if(!(TeamMemberPeer::isIgnoringRights() || $this->mayOperate("delete"))) {
				throw new PropelException(new NotPermittedException("delete.by_role", array("role_key" => "team_members")));
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
			$con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// denyable behavior
				if(!(TeamMemberPeer::isIgnoringRights() || $this->mayOperate("insert"))) {
					throw new PropelException(new NotPermittedException("insert.by_role", array("role_key" => "team_members")));
				}

				// extended_timestampable behavior
				if (!$this->isColumnModified(TeamMemberPeer::CREATED_AT)) {
					$this->setCreatedAt(time());
				}
				if (!$this->isColumnModified(TeamMemberPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
				// attributable behavior
				
				if(Session::getSession()->isAuthenticated()) {
					if (!$this->isColumnModified(TeamMemberPeer::CREATED_BY)) {
						$this->setCreatedBy(Session::getSession()->getUser()->getId());
					}
					if (!$this->isColumnModified(TeamMemberPeer::UPDATED_BY)) {
						$this->setUpdatedBy(Session::getSession()->getUser()->getId());
					}
				}

			} else {
				$ret = $ret && $this->preUpdate($con);
				// denyable behavior
				if(!(TeamMemberPeer::isIgnoringRights() || $this->mayOperate("update"))) {
					throw new PropelException(new NotPermittedException("update.by_role", array("role_key" => "team_members")));
				}

				// extended_timestampable behavior
				if ($this->isModified() && !$this->isColumnModified(TeamMemberPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
				// attributable behavior
				
				if(Session::getSession()->isAuthenticated()) {
					if ($this->isModified() && !$this->isColumnModified(TeamMemberPeer::UPDATED_BY)) {
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
				TeamMemberPeer::addInstanceToPool($this);
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

			if ($this->aDocument !== null) {
				if ($this->aDocument->isModified() || $this->aDocument->isNew()) {
					$affectedRows += $this->aDocument->save($con);
				}
				$this->setDocument($this->aDocument);
			}

			if ($this->aUserRelatedByUserId !== null) {
				if ($this->aUserRelatedByUserId->isModified() || $this->aUserRelatedByUserId->isNew()) {
					$affectedRows += $this->aUserRelatedByUserId->save($con);
				}
				$this->setUserRelatedByUserId($this->aUserRelatedByUserId);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = TeamMemberPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(TeamMemberPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.TeamMemberPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += TeamMemberPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collTeamMemberFunctions !== null) {
				foreach ($this->collTeamMemberFunctions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClassTeachers !== null) {
				foreach ($this->collClassTeachers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collServiceMembers !== null) {
				foreach ($this->collServiceMembers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
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

			if ($this->aDocument !== null) {
				if (!$this->aDocument->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDocument->getValidationFailures());
				}
			}

			if ($this->aUserRelatedByUserId !== null) {
				if (!$this->aUserRelatedByUserId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUserRelatedByUserId->getValidationFailures());
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


			if (($retval = TeamMemberPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collTeamMemberFunctions !== null) {
					foreach ($this->collTeamMemberFunctions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClassTeachers !== null) {
					foreach ($this->collClassTeachers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collServiceMembers !== null) {
					foreach ($this->collServiceMembers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = TeamMemberPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getId();
				break;
			case 1:
				return $this->getOriginalId();
				break;
			case 2:
				return $this->getLastName();
				break;
			case 3:
				return $this->getFirstName();
				break;
			case 4:
				return $this->getSlug();
				break;
			case 5:
				return $this->getGenderId();
				break;
			case 6:
				return $this->getEmployedSince();
				break;
			case 7:
				return $this->getDateOfBirth();
				break;
			case 8:
				return $this->getProfession();
				break;
			case 9:
				return $this->getEmailG();
				break;
			case 10:
				return $this->getPortraitId();
				break;
			case 11:
				return $this->getUserId();
				break;
			case 12:
				return $this->getIsDeleted();
				break;
			case 13:
				return $this->getIsNewlyUpdated();
				break;
			case 14:
				return $this->getCreatedAt();
				break;
			case 15:
				return $this->getUpdatedAt();
				break;
			case 16:
				return $this->getCreatedBy();
				break;
			case 17:
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
		if (isset($alreadyDumpedObjects['TeamMember'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['TeamMember'][$this->getPrimaryKey()] = true;
		$keys = TeamMemberPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getOriginalId(),
			$keys[2] => $this->getLastName(),
			$keys[3] => $this->getFirstName(),
			$keys[4] => $this->getSlug(),
			$keys[5] => $this->getGenderId(),
			$keys[6] => $this->getEmployedSince(),
			$keys[7] => $this->getDateOfBirth(),
			$keys[8] => $this->getProfession(),
			$keys[9] => $this->getEmailG(),
			$keys[10] => $this->getPortraitId(),
			$keys[11] => $this->getUserId(),
			$keys[12] => $this->getIsDeleted(),
			$keys[13] => $this->getIsNewlyUpdated(),
			$keys[14] => $this->getCreatedAt(),
			$keys[15] => $this->getUpdatedAt(),
			$keys[16] => $this->getCreatedBy(),
			$keys[17] => $this->getUpdatedBy(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aDocument) {
				$result['Document'] = $this->aDocument->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUserRelatedByUserId) {
				$result['UserRelatedByUserId'] = $this->aUserRelatedByUserId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUserRelatedByCreatedBy) {
				$result['UserRelatedByCreatedBy'] = $this->aUserRelatedByCreatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUserRelatedByUpdatedBy) {
				$result['UserRelatedByUpdatedBy'] = $this->aUserRelatedByUpdatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collTeamMemberFunctions) {
				$result['TeamMemberFunctions'] = $this->collTeamMemberFunctions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collClassTeachers) {
				$result['ClassTeachers'] = $this->collClassTeachers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collServiceMembers) {
				$result['ServiceMembers'] = $this->collServiceMembers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = TeamMemberPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setId($value);
				break;
			case 1:
				$this->setOriginalId($value);
				break;
			case 2:
				$this->setLastName($value);
				break;
			case 3:
				$this->setFirstName($value);
				break;
			case 4:
				$this->setSlug($value);
				break;
			case 5:
				$this->setGenderId($value);
				break;
			case 6:
				$this->setEmployedSince($value);
				break;
			case 7:
				$this->setDateOfBirth($value);
				break;
			case 8:
				$this->setProfession($value);
				break;
			case 9:
				$this->setEmailG($value);
				break;
			case 10:
				$this->setPortraitId($value);
				break;
			case 11:
				$this->setUserId($value);
				break;
			case 12:
				$this->setIsDeleted($value);
				break;
			case 13:
				$this->setIsNewlyUpdated($value);
				break;
			case 14:
				$this->setCreatedAt($value);
				break;
			case 15:
				$this->setUpdatedAt($value);
				break;
			case 16:
				$this->setCreatedBy($value);
				break;
			case 17:
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
		$keys = TeamMemberPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setOriginalId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLastName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFirstName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSlug($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setGenderId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEmployedSince($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDateOfBirth($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setProfession($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEmailG($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPortraitId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUserId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setIsDeleted($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setIsNewlyUpdated($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCreatedAt($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUpdatedAt($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCreatedBy($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setUpdatedBy($arr[$keys[17]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(TeamMemberPeer::DATABASE_NAME);

		if ($this->isColumnModified(TeamMemberPeer::ID)) $criteria->add(TeamMemberPeer::ID, $this->id);
		if ($this->isColumnModified(TeamMemberPeer::ORIGINAL_ID)) $criteria->add(TeamMemberPeer::ORIGINAL_ID, $this->original_id);
		if ($this->isColumnModified(TeamMemberPeer::LAST_NAME)) $criteria->add(TeamMemberPeer::LAST_NAME, $this->last_name);
		if ($this->isColumnModified(TeamMemberPeer::FIRST_NAME)) $criteria->add(TeamMemberPeer::FIRST_NAME, $this->first_name);
		if ($this->isColumnModified(TeamMemberPeer::SLUG)) $criteria->add(TeamMemberPeer::SLUG, $this->slug);
		if ($this->isColumnModified(TeamMemberPeer::GENDER_ID)) $criteria->add(TeamMemberPeer::GENDER_ID, $this->gender_id);
		if ($this->isColumnModified(TeamMemberPeer::EMPLOYED_SINCE)) $criteria->add(TeamMemberPeer::EMPLOYED_SINCE, $this->employed_since);
		if ($this->isColumnModified(TeamMemberPeer::DATE_OF_BIRTH)) $criteria->add(TeamMemberPeer::DATE_OF_BIRTH, $this->date_of_birth);
		if ($this->isColumnModified(TeamMemberPeer::PROFESSION)) $criteria->add(TeamMemberPeer::PROFESSION, $this->profession);
		if ($this->isColumnModified(TeamMemberPeer::EMAIL_G)) $criteria->add(TeamMemberPeer::EMAIL_G, $this->email_g);
		if ($this->isColumnModified(TeamMemberPeer::PORTRAIT_ID)) $criteria->add(TeamMemberPeer::PORTRAIT_ID, $this->portrait_id);
		if ($this->isColumnModified(TeamMemberPeer::USER_ID)) $criteria->add(TeamMemberPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(TeamMemberPeer::IS_DELETED)) $criteria->add(TeamMemberPeer::IS_DELETED, $this->is_deleted);
		if ($this->isColumnModified(TeamMemberPeer::IS_NEWLY_UPDATED)) $criteria->add(TeamMemberPeer::IS_NEWLY_UPDATED, $this->is_newly_updated);
		if ($this->isColumnModified(TeamMemberPeer::CREATED_AT)) $criteria->add(TeamMemberPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(TeamMemberPeer::UPDATED_AT)) $criteria->add(TeamMemberPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(TeamMemberPeer::CREATED_BY)) $criteria->add(TeamMemberPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(TeamMemberPeer::UPDATED_BY)) $criteria->add(TeamMemberPeer::UPDATED_BY, $this->updated_by);

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
		$criteria = new Criteria(TeamMemberPeer::DATABASE_NAME);
		$criteria->add(TeamMemberPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of TeamMember (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setOriginalId($this->getOriginalId());
		$copyObj->setLastName($this->getLastName());
		$copyObj->setFirstName($this->getFirstName());
		$copyObj->setSlug($this->getSlug());
		$copyObj->setGenderId($this->getGenderId());
		$copyObj->setEmployedSince($this->getEmployedSince());
		$copyObj->setDateOfBirth($this->getDateOfBirth());
		$copyObj->setProfession($this->getProfession());
		$copyObj->setEmailG($this->getEmailG());
		$copyObj->setPortraitId($this->getPortraitId());
		$copyObj->setUserId($this->getUserId());
		$copyObj->setIsDeleted($this->getIsDeleted());
		$copyObj->setIsNewlyUpdated($this->getIsNewlyUpdated());
		$copyObj->setCreatedAt($this->getCreatedAt());
		$copyObj->setUpdatedAt($this->getUpdatedAt());
		$copyObj->setCreatedBy($this->getCreatedBy());
		$copyObj->setUpdatedBy($this->getUpdatedBy());

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getTeamMemberFunctions() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addTeamMemberFunction($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClassTeachers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClassTeacher($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getServiceMembers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addServiceMember($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     TeamMember Clone of current object.
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
	 * @return     TeamMemberPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new TeamMemberPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Document object.
	 *
	 * @param      Document $v
	 * @return     TeamMember The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setDocument(Document $v = null)
	{
		if ($v === null) {
			$this->setPortraitId(NULL);
		} else {
			$this->setPortraitId($v->getId());
		}

		$this->aDocument = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Document object, it will not be re-added.
		if ($v !== null) {
			$v->addTeamMember($this);
		}

		return $this;
	}


	/**
	 * Get the associated Document object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Document The associated Document object.
	 * @throws     PropelException
	 */
	public function getDocument(PropelPDO $con = null)
	{
		if ($this->aDocument === null && ($this->portrait_id !== null)) {
			$this->aDocument = DocumentQuery::create()->findPk($this->portrait_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aDocument->addTeamMembers($this);
			 */
		}
		return $this->aDocument;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     TeamMember The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUserRelatedByUserId(User $v = null)
	{
		if ($v === null) {
			$this->setUserId(NULL);
		} else {
			$this->setUserId($v->getId());
		}

		$this->aUserRelatedByUserId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the User object, it will not be re-added.
		if ($v !== null) {
			$v->addTeamMemberRelatedByUserId($this);
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
	public function getUserRelatedByUserId(PropelPDO $con = null)
	{
		if ($this->aUserRelatedByUserId === null && ($this->user_id !== null)) {
			$this->aUserRelatedByUserId = UserQuery::create()->findPk($this->user_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUserRelatedByUserId->addTeamMembersRelatedByUserId($this);
			 */
		}
		return $this->aUserRelatedByUserId;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     TeamMember The current object (for fluent API support)
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
			$v->addTeamMemberRelatedByCreatedBy($this);
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
				$this->aUserRelatedByCreatedBy->addTeamMembersRelatedByCreatedBy($this);
			 */
		}
		return $this->aUserRelatedByCreatedBy;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     TeamMember The current object (for fluent API support)
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
			$v->addTeamMemberRelatedByUpdatedBy($this);
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
				$this->aUserRelatedByUpdatedBy->addTeamMembersRelatedByUpdatedBy($this);
			 */
		}
		return $this->aUserRelatedByUpdatedBy;
	}


	/**
	 * Initializes a collection based on the name of a relation.
	 * Avoids crafting an 'init[$relationName]s' method name
	 * that wouldn't work when StandardEnglishPluralizer is used.
	 *
	 * @param      string $relationName The name of the relation to initialize
	 * @return     void
	 */
	public function initRelation($relationName)
	{
		if ('TeamMemberFunction' == $relationName) {
			return $this->initTeamMemberFunctions();
		}
		if ('ClassTeacher' == $relationName) {
			return $this->initClassTeachers();
		}
		if ('ServiceMember' == $relationName) {
			return $this->initServiceMembers();
		}
	}

	/**
	 * Clears out the collTeamMemberFunctions collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addTeamMemberFunctions()
	 */
	public function clearTeamMemberFunctions()
	{
		$this->collTeamMemberFunctions = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collTeamMemberFunctions collection.
	 *
	 * By default this just sets the collTeamMemberFunctions collection to an empty array (like clearcollTeamMemberFunctions());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initTeamMemberFunctions($overrideExisting = true)
	{
		if (null !== $this->collTeamMemberFunctions && !$overrideExisting) {
			return;
		}
		$this->collTeamMemberFunctions = new PropelObjectCollection();
		$this->collTeamMemberFunctions->setModel('TeamMemberFunction');
	}

	/**
	 * Gets an array of TeamMemberFunction objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this TeamMember is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array TeamMemberFunction[] List of TeamMemberFunction objects
	 * @throws     PropelException
	 */
	public function getTeamMemberFunctions($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collTeamMemberFunctions || null !== $criteria) {
			if ($this->isNew() && null === $this->collTeamMemberFunctions) {
				// return empty collection
				$this->initTeamMemberFunctions();
			} else {
				$collTeamMemberFunctions = TeamMemberFunctionQuery::create(null, $criteria)
					->filterByTeamMember($this)
					->find($con);
				if (null !== $criteria) {
					return $collTeamMemberFunctions;
				}
				$this->collTeamMemberFunctions = $collTeamMemberFunctions;
			}
		}
		return $this->collTeamMemberFunctions;
	}

	/**
	 * Returns the number of related TeamMemberFunction objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related TeamMemberFunction objects.
	 * @throws     PropelException
	 */
	public function countTeamMemberFunctions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collTeamMemberFunctions || null !== $criteria) {
			if ($this->isNew() && null === $this->collTeamMemberFunctions) {
				return 0;
			} else {
				$query = TeamMemberFunctionQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByTeamMember($this)
					->count($con);
			}
		} else {
			return count($this->collTeamMemberFunctions);
		}
	}

	/**
	 * Method called to associate a TeamMemberFunction object to this object
	 * through the TeamMemberFunction foreign key attribute.
	 *
	 * @param      TeamMemberFunction $l TeamMemberFunction
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function addTeamMemberFunction(TeamMemberFunction $l)
	{
		if ($this->collTeamMemberFunctions === null) {
			$this->initTeamMemberFunctions();
		}
		if (!$this->collTeamMemberFunctions->contains($l)) { // only add it if the **same** object is not already associated
			$this->collTeamMemberFunctions[]= $l;
			$l->setTeamMember($this);
		}

		return $this;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this TeamMember is new, it will return
	 * an empty collection; or if this TeamMember has previously
	 * been saved, it will retrieve related TeamMemberFunctions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in TeamMember.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array TeamMemberFunction[] List of TeamMemberFunction objects
	 */
	public function getTeamMemberFunctionsJoinSchoolFunction($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TeamMemberFunctionQuery::create(null, $criteria);
		$query->joinWith('SchoolFunction', $join_behavior);

		return $this->getTeamMemberFunctions($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this TeamMember is new, it will return
	 * an empty collection; or if this TeamMember has previously
	 * been saved, it will retrieve related TeamMemberFunctions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in TeamMember.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array TeamMemberFunction[] List of TeamMemberFunction objects
	 */
	public function getTeamMemberFunctionsJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TeamMemberFunctionQuery::create(null, $criteria);
		$query->joinWith('UserRelatedByCreatedBy', $join_behavior);

		return $this->getTeamMemberFunctions($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this TeamMember is new, it will return
	 * an empty collection; or if this TeamMember has previously
	 * been saved, it will retrieve related TeamMemberFunctions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in TeamMember.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array TeamMemberFunction[] List of TeamMemberFunction objects
	 */
	public function getTeamMemberFunctionsJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TeamMemberFunctionQuery::create(null, $criteria);
		$query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

		return $this->getTeamMemberFunctions($query, $con);
	}

	/**
	 * Clears out the collClassTeachers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClassTeachers()
	 */
	public function clearClassTeachers()
	{
		$this->collClassTeachers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClassTeachers collection.
	 *
	 * By default this just sets the collClassTeachers collection to an empty array (like clearcollClassTeachers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initClassTeachers($overrideExisting = true)
	{
		if (null !== $this->collClassTeachers && !$overrideExisting) {
			return;
		}
		$this->collClassTeachers = new PropelObjectCollection();
		$this->collClassTeachers->setModel('ClassTeacher');
	}

	/**
	 * Gets an array of ClassTeacher objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this TeamMember is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ClassTeacher[] List of ClassTeacher objects
	 * @throws     PropelException
	 */
	public function getClassTeachers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collClassTeachers || null !== $criteria) {
			if ($this->isNew() && null === $this->collClassTeachers) {
				// return empty collection
				$this->initClassTeachers();
			} else {
				$collClassTeachers = ClassTeacherQuery::create(null, $criteria)
					->filterByTeamMember($this)
					->find($con);
				if (null !== $criteria) {
					return $collClassTeachers;
				}
				$this->collClassTeachers = $collClassTeachers;
			}
		}
		return $this->collClassTeachers;
	}

	/**
	 * Returns the number of related ClassTeacher objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClassTeacher objects.
	 * @throws     PropelException
	 */
	public function countClassTeachers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collClassTeachers || null !== $criteria) {
			if ($this->isNew() && null === $this->collClassTeachers) {
				return 0;
			} else {
				$query = ClassTeacherQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByTeamMember($this)
					->count($con);
			}
		} else {
			return count($this->collClassTeachers);
		}
	}

	/**
	 * Method called to associate a ClassTeacher object to this object
	 * through the ClassTeacher foreign key attribute.
	 *
	 * @param      ClassTeacher $l ClassTeacher
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function addClassTeacher(ClassTeacher $l)
	{
		if ($this->collClassTeachers === null) {
			$this->initClassTeachers();
		}
		if (!$this->collClassTeachers->contains($l)) { // only add it if the **same** object is not already associated
			$this->collClassTeachers[]= $l;
			$l->setTeamMember($this);
		}

		return $this;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this TeamMember is new, it will return
	 * an empty collection; or if this TeamMember has previously
	 * been saved, it will retrieve related ClassTeachers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in TeamMember.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ClassTeacher[] List of ClassTeacher objects
	 */
	public function getClassTeachersJoinSchoolClass($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ClassTeacherQuery::create(null, $criteria);
		$query->joinWith('SchoolClass', $join_behavior);

		return $this->getClassTeachers($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this TeamMember is new, it will return
	 * an empty collection; or if this TeamMember has previously
	 * been saved, it will retrieve related ClassTeachers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in TeamMember.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ClassTeacher[] List of ClassTeacher objects
	 */
	public function getClassTeachersJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ClassTeacherQuery::create(null, $criteria);
		$query->joinWith('UserRelatedByCreatedBy', $join_behavior);

		return $this->getClassTeachers($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this TeamMember is new, it will return
	 * an empty collection; or if this TeamMember has previously
	 * been saved, it will retrieve related ClassTeachers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in TeamMember.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ClassTeacher[] List of ClassTeacher objects
	 */
	public function getClassTeachersJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ClassTeacherQuery::create(null, $criteria);
		$query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

		return $this->getClassTeachers($query, $con);
	}

	/**
	 * Clears out the collServiceMembers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addServiceMembers()
	 */
	public function clearServiceMembers()
	{
		$this->collServiceMembers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collServiceMembers collection.
	 *
	 * By default this just sets the collServiceMembers collection to an empty array (like clearcollServiceMembers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initServiceMembers($overrideExisting = true)
	{
		if (null !== $this->collServiceMembers && !$overrideExisting) {
			return;
		}
		$this->collServiceMembers = new PropelObjectCollection();
		$this->collServiceMembers->setModel('ServiceMember');
	}

	/**
	 * Gets an array of ServiceMember objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this TeamMember is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ServiceMember[] List of ServiceMember objects
	 * @throws     PropelException
	 */
	public function getServiceMembers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collServiceMembers || null !== $criteria) {
			if ($this->isNew() && null === $this->collServiceMembers) {
				// return empty collection
				$this->initServiceMembers();
			} else {
				$collServiceMembers = ServiceMemberQuery::create(null, $criteria)
					->filterByTeamMember($this)
					->find($con);
				if (null !== $criteria) {
					return $collServiceMembers;
				}
				$this->collServiceMembers = $collServiceMembers;
			}
		}
		return $this->collServiceMembers;
	}

	/**
	 * Returns the number of related ServiceMember objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ServiceMember objects.
	 * @throws     PropelException
	 */
	public function countServiceMembers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collServiceMembers || null !== $criteria) {
			if ($this->isNew() && null === $this->collServiceMembers) {
				return 0;
			} else {
				$query = ServiceMemberQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByTeamMember($this)
					->count($con);
			}
		} else {
			return count($this->collServiceMembers);
		}
	}

	/**
	 * Method called to associate a ServiceMember object to this object
	 * through the ServiceMember foreign key attribute.
	 *
	 * @param      ServiceMember $l ServiceMember
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function addServiceMember(ServiceMember $l)
	{
		if ($this->collServiceMembers === null) {
			$this->initServiceMembers();
		}
		if (!$this->collServiceMembers->contains($l)) { // only add it if the **same** object is not already associated
			$this->collServiceMembers[]= $l;
			$l->setTeamMember($this);
		}

		return $this;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this TeamMember is new, it will return
	 * an empty collection; or if this TeamMember has previously
	 * been saved, it will retrieve related ServiceMembers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in TeamMember.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ServiceMember[] List of ServiceMember objects
	 */
	public function getServiceMembersJoinService($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ServiceMemberQuery::create(null, $criteria);
		$query->joinWith('Service', $join_behavior);

		return $this->getServiceMembers($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this TeamMember is new, it will return
	 * an empty collection; or if this TeamMember has previously
	 * been saved, it will retrieve related ServiceMembers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in TeamMember.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ServiceMember[] List of ServiceMember objects
	 */
	public function getServiceMembersJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ServiceMemberQuery::create(null, $criteria);
		$query->joinWith('UserRelatedByCreatedBy', $join_behavior);

		return $this->getServiceMembers($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this TeamMember is new, it will return
	 * an empty collection; or if this TeamMember has previously
	 * been saved, it will retrieve related ServiceMembers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in TeamMember.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ServiceMember[] List of ServiceMember objects
	 */
	public function getServiceMembersJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ServiceMemberQuery::create(null, $criteria);
		$query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

		return $this->getServiceMembers($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->original_id = null;
		$this->last_name = null;
		$this->first_name = null;
		$this->slug = null;
		$this->gender_id = null;
		$this->employed_since = null;
		$this->date_of_birth = null;
		$this->profession = null;
		$this->email_g = null;
		$this->portrait_id = null;
		$this->user_id = null;
		$this->is_deleted = null;
		$this->is_newly_updated = null;
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
			if ($this->collTeamMemberFunctions) {
				foreach ($this->collTeamMemberFunctions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClassTeachers) {
				foreach ($this->collClassTeachers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collServiceMembers) {
				foreach ($this->collServiceMembers as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collTeamMemberFunctions instanceof PropelCollection) {
			$this->collTeamMemberFunctions->clearIterator();
		}
		$this->collTeamMemberFunctions = null;
		if ($this->collClassTeachers instanceof PropelCollection) {
			$this->collClassTeachers->clearIterator();
		}
		$this->collClassTeachers = null;
		if ($this->collServiceMembers instanceof PropelCollection) {
			$this->collServiceMembers->clearIterator();
		}
		$this->collServiceMembers = null;
		$this->aDocument = null;
		$this->aUserRelatedByUserId = null;
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
		return (string) $this->exportTo(TeamMemberPeer::DEFAULT_STRING_FORMAT);
	}

	// denyable behavior
	public function mayOperate($sOperation, $oUser = false) {
		if($oUser === false) {
			$oUser = Session::getSession()->getUser();
		}
		if($oUser && ($this->isNew() || $this->getCreatedBy() === $oUser->getId()) && TeamMemberPeer::mayOperateOnOwn($oUser, $this, $sOperation)) {
			return true;
		}
		if(TeamMemberPeer::mayOperateOn($oUser, $this, $sOperation)) {
			return true;
		}
		$bIsAllowed = false;
		FilterModule::getFilters()->handleOperationIsDenied($sOperation, $this, $oUser, array(&$bIsAllowed));
		return $bIsAllowed;
	}
	public function mayBeInserted($oUser = false) {
		return $this->mayOperate("insert", $oUser);
	}
	public function mayBeUpdated($oUser = false) {
		return $this->mayOperate("update", $oUser);
	}
	public function mayBeDeleted($oUser = false) {
		return $this->mayOperate("delete", $oUser);
	}

	// extended_timestampable behavior
	
	/**
	 * Mark the current object so that the update date doesn't get updated during next save
	 *
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function keepUpdateDateUnchanged()
	{
		$this->modifiedColumns[] = TeamMemberPeer::UPDATED_AT;
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
	 * @return     TeamMember The current object (for fluent API support)
	 */
	public function keepUpdateUserUnchanged()
	{
		$this->modifiedColumns[] = TeamMemberPeer::UPDATED_BY;
		return $this;
	}

} // BaseTeamMember
