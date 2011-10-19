<?php


/**
 * Base class that represents a row from the 'services' table.
 *
 * 
 *
 * @package    propel.generator.model.om
 */
abstract class BaseService extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ServicePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ServicePeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the slug field.
	 * @var        string
	 */
	protected $slug;

	/**
	 * The value for the teaser field.
	 * @var        string
	 */
	protected $teaser;

	/**
	 * The value for the address field.
	 * @var        string
	 */
	protected $address;

	/**
	 * The value for the opening_hours field.
	 * @var        string
	 */
	protected $opening_hours;

	/**
	 * The value for the phone field.
	 * @var        string
	 */
	protected $phone;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the website field.
	 * @var        string
	 */
	protected $website;

	/**
	 * The value for the body field.
	 * @var        resource
	 */
	protected $body;

	/**
	 * The value for the is_active field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $is_active;

	/**
	 * The value for the logo_id field.
	 * @var        int
	 */
	protected $logo_id;

	/**
	 * The value for the service_category_id field.
	 * @var        int
	 */
	protected $service_category_id;

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
	 * @var        ServiceCategory
	 */
	protected $aServiceCategory;

	/**
	 * @var        User
	 */
	protected $aUserRelatedByCreatedBy;

	/**
	 * @var        User
	 */
	protected $aUserRelatedByUpdatedBy;

	/**
	 * @var        array Event[] Collection to store aggregation of Event objects.
	 */
	protected $collEvents;

	/**
	 * @var        array ServiceMember[] Collection to store aggregation of ServiceMember objects.
	 */
	protected $collServiceMembers;

	/**
	 * @var        array ServiceDocument[] Collection to store aggregation of ServiceDocument objects.
	 */
	protected $collServiceDocuments;

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
		$this->is_active = false;
	}

	/**
	 * Initializes internal state of BaseService object.
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
	 * Get the [name] column value.
	 * 
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
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
	 * Get the [teaser] column value.
	 * 
	 * @return     string
	 */
	public function getTeaser()
	{
		return $this->teaser;
	}

	/**
	 * Get the [address] column value.
	 * 
	 * @return     string
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * Get the [opening_hours] column value.
	 * 
	 * @return     string
	 */
	public function getOpeningHours()
	{
		return $this->opening_hours;
	}

	/**
	 * Get the [phone] column value.
	 * 
	 * @return     string
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [website] column value.
	 * 
	 * @return     string
	 */
	public function getWebsite()
	{
		return $this->website;
	}

	/**
	 * Get the [body] column value.
	 * 
	 * @return     resource
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * Get the [is_active] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsActive()
	{
		return $this->is_active;
	}

	/**
	 * Get the [logo_id] column value.
	 * 
	 * @return     int
	 */
	public function getLogoId()
	{
		return $this->logo_id;
	}

	/**
	 * Get the [service_category_id] column value.
	 * 
	 * @return     int
	 */
	public function getServiceCategoryId()
	{
		return $this->service_category_id;
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
	 * @return     Service The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ServicePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     Service The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = ServicePeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [slug] column.
	 * 
	 * @param      string $v new value
	 * @return     Service The current object (for fluent API support)
	 */
	public function setSlug($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = ServicePeer::SLUG;
		}

		return $this;
	} // setSlug()

	/**
	 * Set the value of [teaser] column.
	 * 
	 * @param      string $v new value
	 * @return     Service The current object (for fluent API support)
	 */
	public function setTeaser($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->teaser !== $v) {
			$this->teaser = $v;
			$this->modifiedColumns[] = ServicePeer::TEASER;
		}

		return $this;
	} // setTeaser()

	/**
	 * Set the value of [address] column.
	 * 
	 * @param      string $v new value
	 * @return     Service The current object (for fluent API support)
	 */
	public function setAddress($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[] = ServicePeer::ADDRESS;
		}

		return $this;
	} // setAddress()

	/**
	 * Set the value of [opening_hours] column.
	 * 
	 * @param      string $v new value
	 * @return     Service The current object (for fluent API support)
	 */
	public function setOpeningHours($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->opening_hours !== $v) {
			$this->opening_hours = $v;
			$this->modifiedColumns[] = ServicePeer::OPENING_HOURS;
		}

		return $this;
	} // setOpeningHours()

	/**
	 * Set the value of [phone] column.
	 * 
	 * @param      string $v new value
	 * @return     Service The current object (for fluent API support)
	 */
	public function setPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = ServicePeer::PHONE;
		}

		return $this;
	} // setPhone()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Service The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ServicePeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [website] column.
	 * 
	 * @param      string $v new value
	 * @return     Service The current object (for fluent API support)
	 */
	public function setWebsite($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->website !== $v) {
			$this->website = $v;
			$this->modifiedColumns[] = ServicePeer::WEBSITE;
		}

		return $this;
	} // setWebsite()

	/**
	 * Set the value of [body] column.
	 * 
	 * @param      resource $v new value
	 * @return     Service The current object (for fluent API support)
	 */
	public function setBody($v)
	{
		// Because BLOB columns are streams in PDO we have to assume that they are
		// always modified when a new value is passed in.  For example, the contents
		// of the stream itself may have changed externally.
		if (!is_resource($v) && $v !== null) {
			$this->body = fopen('php://memory', 'r+');
			fwrite($this->body, $v);
			rewind($this->body);
		} else { // it's already a stream
			$this->body = $v;
		}
		$this->modifiedColumns[] = ServicePeer::BODY;

		return $this;
	} // setBody()

	/**
	 * Sets the value of the [is_active] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Service The current object (for fluent API support)
	 */
	public function setIsActive($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->is_active !== $v) {
			$this->is_active = $v;
			$this->modifiedColumns[] = ServicePeer::IS_ACTIVE;
		}

		return $this;
	} // setIsActive()

	/**
	 * Set the value of [logo_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Service The current object (for fluent API support)
	 */
	public function setLogoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->logo_id !== $v) {
			$this->logo_id = $v;
			$this->modifiedColumns[] = ServicePeer::LOGO_ID;
		}

		if ($this->aDocument !== null && $this->aDocument->getId() !== $v) {
			$this->aDocument = null;
		}

		return $this;
	} // setLogoId()

	/**
	 * Set the value of [service_category_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Service The current object (for fluent API support)
	 */
	public function setServiceCategoryId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->service_category_id !== $v) {
			$this->service_category_id = $v;
			$this->modifiedColumns[] = ServicePeer::SERVICE_CATEGORY_ID;
		}

		if ($this->aServiceCategory !== null && $this->aServiceCategory->getId() !== $v) {
			$this->aServiceCategory = null;
		}

		return $this;
	} // setServiceCategoryId()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Service The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->created_at !== null || $dt !== null) {
			$currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->created_at = $newDateAsString;
				$this->modifiedColumns[] = ServicePeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Service The current object (for fluent API support)
	 */
	public function setUpdatedAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->updated_at !== null || $dt !== null) {
			$currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->updated_at = $newDateAsString;
				$this->modifiedColumns[] = ServicePeer::UPDATED_AT;
			}
		} // if either are not null

		return $this;
	} // setUpdatedAt()

	/**
	 * Set the value of [created_by] column.
	 * 
	 * @param      int $v new value
	 * @return     Service The current object (for fluent API support)
	 */
	public function setCreatedBy($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ServicePeer::CREATED_BY;
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
	 * @return     Service The current object (for fluent API support)
	 */
	public function setUpdatedBy($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = ServicePeer::UPDATED_BY;
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
			if ($this->is_active !== false) {
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
			$this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->slug = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->teaser = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->address = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->opening_hours = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->phone = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->email = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->website = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			if ($row[$startcol + 9] !== null) {
				$this->body = fopen('php://memory', 'r+');
				fwrite($this->body, $row[$startcol + 9]);
				rewind($this->body);
			} else {
				$this->body = null;
			}
			$this->is_active = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
			$this->logo_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->service_category_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->created_at = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->updated_at = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->created_by = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
			$this->updated_by = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 17; // 17 = ServicePeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Service object", $e);
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

		if ($this->aDocument !== null && $this->logo_id !== $this->aDocument->getId()) {
			$this->aDocument = null;
		}
		if ($this->aServiceCategory !== null && $this->service_category_id !== $this->aServiceCategory->getId()) {
			$this->aServiceCategory = null;
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
			$con = Propel::getConnection(ServicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ServicePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aDocument = null;
			$this->aServiceCategory = null;
			$this->aUserRelatedByCreatedBy = null;
			$this->aUserRelatedByUpdatedBy = null;
			$this->collEvents = null;

			$this->collServiceMembers = null;

			$this->collServiceDocuments = null;

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
			$con = Propel::getConnection(ServicePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = ServiceQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// denyable behavior
			if(!(ServicePeer::isIgnoringRights() || $this->mayOperate("delete"))) {
				throw new PropelException(new NotPermittedException("delete.by_role", array("role_key" => "services")));
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
			$con = Propel::getConnection(ServicePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// denyable behavior
				if(!(ServicePeer::isIgnoringRights() || $this->mayOperate("insert"))) {
					throw new PropelException(new NotPermittedException("insert.by_role", array("role_key" => "services")));
				}

				// extended_timestampable behavior
				if (!$this->isColumnModified(ServicePeer::CREATED_AT)) {
					$this->setCreatedAt(time());
				}
				if (!$this->isColumnModified(ServicePeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
				// attributable behavior
				
				if(Session::getSession()->isAuthenticated()) {
					if (!$this->isColumnModified(ServicePeer::CREATED_BY)) {
						$this->setCreatedBy(Session::getSession()->getUser()->getId());
					}
					if (!$this->isColumnModified(ServicePeer::UPDATED_BY)) {
						$this->setUpdatedBy(Session::getSession()->getUser()->getId());
					}
				}

			} else {
				$ret = $ret && $this->preUpdate($con);
				// denyable behavior
				if(!(ServicePeer::isIgnoringRights() || $this->mayOperate("update"))) {
					throw new PropelException(new NotPermittedException("update.by_role", array("role_key" => "services")));
				}

				// extended_timestampable behavior
				if ($this->isModified() && !$this->isColumnModified(ServicePeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
				// attributable behavior
				
				if(Session::getSession()->isAuthenticated()) {
					if ($this->isModified() && !$this->isColumnModified(ServicePeer::UPDATED_BY)) {
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
				ServicePeer::addInstanceToPool($this);
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

			if ($this->aServiceCategory !== null) {
				if ($this->aServiceCategory->isModified() || $this->aServiceCategory->isNew()) {
					$affectedRows += $this->aServiceCategory->save($con);
				}
				$this->setServiceCategory($this->aServiceCategory);
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
				$this->modifiedColumns[] = ServicePeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(ServicePeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.ServicePeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += ServicePeer::doUpdate($this, $con);
				}

				// Rewind the body LOB column, since PDO does not rewind after inserting value.
				if ($this->body !== null && is_resource($this->body)) {
					rewind($this->body);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collEvents !== null) {
				foreach ($this->collEvents as $referrerFK) {
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

			if ($this->collServiceDocuments !== null) {
				foreach ($this->collServiceDocuments as $referrerFK) {
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

			if ($this->aServiceCategory !== null) {
				if (!$this->aServiceCategory->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aServiceCategory->getValidationFailures());
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


			if (($retval = ServicePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEvents !== null) {
					foreach ($this->collEvents as $referrerFK) {
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

				if ($this->collServiceDocuments !== null) {
					foreach ($this->collServiceDocuments as $referrerFK) {
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
		$pos = ServicePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getName();
				break;
			case 2:
				return $this->getSlug();
				break;
			case 3:
				return $this->getTeaser();
				break;
			case 4:
				return $this->getAddress();
				break;
			case 5:
				return $this->getOpeningHours();
				break;
			case 6:
				return $this->getPhone();
				break;
			case 7:
				return $this->getEmail();
				break;
			case 8:
				return $this->getWebsite();
				break;
			case 9:
				return $this->getBody();
				break;
			case 10:
				return $this->getIsActive();
				break;
			case 11:
				return $this->getLogoId();
				break;
			case 12:
				return $this->getServiceCategoryId();
				break;
			case 13:
				return $this->getCreatedAt();
				break;
			case 14:
				return $this->getUpdatedAt();
				break;
			case 15:
				return $this->getCreatedBy();
				break;
			case 16:
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
		if (isset($alreadyDumpedObjects['Service'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Service'][$this->getPrimaryKey()] = true;
		$keys = ServicePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getSlug(),
			$keys[3] => $this->getTeaser(),
			$keys[4] => $this->getAddress(),
			$keys[5] => $this->getOpeningHours(),
			$keys[6] => $this->getPhone(),
			$keys[7] => $this->getEmail(),
			$keys[8] => $this->getWebsite(),
			$keys[9] => $this->getBody(),
			$keys[10] => $this->getIsActive(),
			$keys[11] => $this->getLogoId(),
			$keys[12] => $this->getServiceCategoryId(),
			$keys[13] => $this->getCreatedAt(),
			$keys[14] => $this->getUpdatedAt(),
			$keys[15] => $this->getCreatedBy(),
			$keys[16] => $this->getUpdatedBy(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aDocument) {
				$result['Document'] = $this->aDocument->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aServiceCategory) {
				$result['ServiceCategory'] = $this->aServiceCategory->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUserRelatedByCreatedBy) {
				$result['UserRelatedByCreatedBy'] = $this->aUserRelatedByCreatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUserRelatedByUpdatedBy) {
				$result['UserRelatedByUpdatedBy'] = $this->aUserRelatedByUpdatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collEvents) {
				$result['Events'] = $this->collEvents->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collServiceMembers) {
				$result['ServiceMembers'] = $this->collServiceMembers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collServiceDocuments) {
				$result['ServiceDocuments'] = $this->collServiceDocuments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = ServicePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setName($value);
				break;
			case 2:
				$this->setSlug($value);
				break;
			case 3:
				$this->setTeaser($value);
				break;
			case 4:
				$this->setAddress($value);
				break;
			case 5:
				$this->setOpeningHours($value);
				break;
			case 6:
				$this->setPhone($value);
				break;
			case 7:
				$this->setEmail($value);
				break;
			case 8:
				$this->setWebsite($value);
				break;
			case 9:
				$this->setBody($value);
				break;
			case 10:
				$this->setIsActive($value);
				break;
			case 11:
				$this->setLogoId($value);
				break;
			case 12:
				$this->setServiceCategoryId($value);
				break;
			case 13:
				$this->setCreatedAt($value);
				break;
			case 14:
				$this->setUpdatedAt($value);
				break;
			case 15:
				$this->setCreatedBy($value);
				break;
			case 16:
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
		$keys = ServicePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSlug($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTeaser($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAddress($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOpeningHours($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPhone($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEmail($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setWebsite($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setBody($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setIsActive($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setLogoId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setServiceCategoryId($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCreatedAt($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUpdatedAt($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCreatedBy($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUpdatedBy($arr[$keys[16]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ServicePeer::DATABASE_NAME);

		if ($this->isColumnModified(ServicePeer::ID)) $criteria->add(ServicePeer::ID, $this->id);
		if ($this->isColumnModified(ServicePeer::NAME)) $criteria->add(ServicePeer::NAME, $this->name);
		if ($this->isColumnModified(ServicePeer::SLUG)) $criteria->add(ServicePeer::SLUG, $this->slug);
		if ($this->isColumnModified(ServicePeer::TEASER)) $criteria->add(ServicePeer::TEASER, $this->teaser);
		if ($this->isColumnModified(ServicePeer::ADDRESS)) $criteria->add(ServicePeer::ADDRESS, $this->address);
		if ($this->isColumnModified(ServicePeer::OPENING_HOURS)) $criteria->add(ServicePeer::OPENING_HOURS, $this->opening_hours);
		if ($this->isColumnModified(ServicePeer::PHONE)) $criteria->add(ServicePeer::PHONE, $this->phone);
		if ($this->isColumnModified(ServicePeer::EMAIL)) $criteria->add(ServicePeer::EMAIL, $this->email);
		if ($this->isColumnModified(ServicePeer::WEBSITE)) $criteria->add(ServicePeer::WEBSITE, $this->website);
		if ($this->isColumnModified(ServicePeer::BODY)) $criteria->add(ServicePeer::BODY, $this->body);
		if ($this->isColumnModified(ServicePeer::IS_ACTIVE)) $criteria->add(ServicePeer::IS_ACTIVE, $this->is_active);
		if ($this->isColumnModified(ServicePeer::LOGO_ID)) $criteria->add(ServicePeer::LOGO_ID, $this->logo_id);
		if ($this->isColumnModified(ServicePeer::SERVICE_CATEGORY_ID)) $criteria->add(ServicePeer::SERVICE_CATEGORY_ID, $this->service_category_id);
		if ($this->isColumnModified(ServicePeer::CREATED_AT)) $criteria->add(ServicePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ServicePeer::UPDATED_AT)) $criteria->add(ServicePeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ServicePeer::CREATED_BY)) $criteria->add(ServicePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ServicePeer::UPDATED_BY)) $criteria->add(ServicePeer::UPDATED_BY, $this->updated_by);

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
		$criteria = new Criteria(ServicePeer::DATABASE_NAME);
		$criteria->add(ServicePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Service (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setName($this->getName());
		$copyObj->setSlug($this->getSlug());
		$copyObj->setTeaser($this->getTeaser());
		$copyObj->setAddress($this->getAddress());
		$copyObj->setOpeningHours($this->getOpeningHours());
		$copyObj->setPhone($this->getPhone());
		$copyObj->setEmail($this->getEmail());
		$copyObj->setWebsite($this->getWebsite());
		$copyObj->setBody($this->getBody());
		$copyObj->setIsActive($this->getIsActive());
		$copyObj->setLogoId($this->getLogoId());
		$copyObj->setServiceCategoryId($this->getServiceCategoryId());
		$copyObj->setCreatedAt($this->getCreatedAt());
		$copyObj->setUpdatedAt($this->getUpdatedAt());
		$copyObj->setCreatedBy($this->getCreatedBy());
		$copyObj->setUpdatedBy($this->getUpdatedBy());

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getEvents() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addEvent($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getServiceMembers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addServiceMember($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getServiceDocuments() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addServiceDocument($relObj->copy($deepCopy));
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
	 * @return     Service Clone of current object.
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
	 * @return     ServicePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ServicePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Document object.
	 *
	 * @param      Document $v
	 * @return     Service The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setDocument(Document $v = null)
	{
		if ($v === null) {
			$this->setLogoId(NULL);
		} else {
			$this->setLogoId($v->getId());
		}

		$this->aDocument = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Document object, it will not be re-added.
		if ($v !== null) {
			$v->addService($this);
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
		if ($this->aDocument === null && ($this->logo_id !== null)) {
			$this->aDocument = DocumentQuery::create()->findPk($this->logo_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aDocument->addServices($this);
			 */
		}
		return $this->aDocument;
	}

	/**
	 * Declares an association between this object and a ServiceCategory object.
	 *
	 * @param      ServiceCategory $v
	 * @return     Service The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setServiceCategory(ServiceCategory $v = null)
	{
		if ($v === null) {
			$this->setServiceCategoryId(NULL);
		} else {
			$this->setServiceCategoryId($v->getId());
		}

		$this->aServiceCategory = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ServiceCategory object, it will not be re-added.
		if ($v !== null) {
			$v->addService($this);
		}

		return $this;
	}


	/**
	 * Get the associated ServiceCategory object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ServiceCategory The associated ServiceCategory object.
	 * @throws     PropelException
	 */
	public function getServiceCategory(PropelPDO $con = null)
	{
		if ($this->aServiceCategory === null && ($this->service_category_id !== null)) {
			$this->aServiceCategory = ServiceCategoryQuery::create()->findPk($this->service_category_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aServiceCategory->addServices($this);
			 */
		}
		return $this->aServiceCategory;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     Service The current object (for fluent API support)
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
			$v->addServiceRelatedByCreatedBy($this);
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
				$this->aUserRelatedByCreatedBy->addServicesRelatedByCreatedBy($this);
			 */
		}
		return $this->aUserRelatedByCreatedBy;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     Service The current object (for fluent API support)
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
			$v->addServiceRelatedByUpdatedBy($this);
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
				$this->aUserRelatedByUpdatedBy->addServicesRelatedByUpdatedBy($this);
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
		if ('Event' == $relationName) {
			return $this->initEvents();
		}
		if ('ServiceMember' == $relationName) {
			return $this->initServiceMembers();
		}
		if ('ServiceDocument' == $relationName) {
			return $this->initServiceDocuments();
		}
	}

	/**
	 * Clears out the collEvents collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addEvents()
	 */
	public function clearEvents()
	{
		$this->collEvents = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collEvents collection.
	 *
	 * By default this just sets the collEvents collection to an empty array (like clearcollEvents());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initEvents($overrideExisting = true)
	{
		if (null !== $this->collEvents && !$overrideExisting) {
			return;
		}
		$this->collEvents = new PropelObjectCollection();
		$this->collEvents->setModel('Event');
	}

	/**
	 * Gets an array of Event objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Service is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Event[] List of Event objects
	 * @throws     PropelException
	 */
	public function getEvents($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collEvents || null !== $criteria) {
			if ($this->isNew() && null === $this->collEvents) {
				// return empty collection
				$this->initEvents();
			} else {
				$collEvents = EventQuery::create(null, $criteria)
					->filterByService($this)
					->find($con);
				if (null !== $criteria) {
					return $collEvents;
				}
				$this->collEvents = $collEvents;
			}
		}
		return $this->collEvents;
	}

	/**
	 * Returns the number of related Event objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Event objects.
	 * @throws     PropelException
	 */
	public function countEvents(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collEvents || null !== $criteria) {
			if ($this->isNew() && null === $this->collEvents) {
				return 0;
			} else {
				$query = EventQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByService($this)
					->count($con);
			}
		} else {
			return count($this->collEvents);
		}
	}

	/**
	 * Method called to associate a Event object to this object
	 * through the Event foreign key attribute.
	 *
	 * @param      Event $l Event
	 * @return     Service The current object (for fluent API support)
	 */
	public function addEvent(Event $l)
	{
		if ($this->collEvents === null) {
			$this->initEvents();
		}
		if (!$this->collEvents->contains($l)) { // only add it if the **same** object is not already associated
			$this->collEvents[]= $l;
			$l->setService($this);
		}

		return $this;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Service is new, it will return
	 * an empty collection; or if this Service has previously
	 * been saved, it will retrieve related Events from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Service.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Event[] List of Event objects
	 */
	public function getEventsJoinEventType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = EventQuery::create(null, $criteria);
		$query->joinWith('EventType', $join_behavior);

		return $this->getEvents($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Service is new, it will return
	 * an empty collection; or if this Service has previously
	 * been saved, it will retrieve related Events from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Service.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Event[] List of Event objects
	 */
	public function getEventsJoinSchoolClass($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = EventQuery::create(null, $criteria);
		$query->joinWith('SchoolClass', $join_behavior);

		return $this->getEvents($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Service is new, it will return
	 * an empty collection; or if this Service has previously
	 * been saved, it will retrieve related Events from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Service.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Event[] List of Event objects
	 */
	public function getEventsJoinDocumentCategory($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = EventQuery::create(null, $criteria);
		$query->joinWith('DocumentCategory', $join_behavior);

		return $this->getEvents($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Service is new, it will return
	 * an empty collection; or if this Service has previously
	 * been saved, it will retrieve related Events from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Service.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Event[] List of Event objects
	 */
	public function getEventsJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = EventQuery::create(null, $criteria);
		$query->joinWith('UserRelatedByCreatedBy', $join_behavior);

		return $this->getEvents($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Service is new, it will return
	 * an empty collection; or if this Service has previously
	 * been saved, it will retrieve related Events from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Service.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Event[] List of Event objects
	 */
	public function getEventsJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = EventQuery::create(null, $criteria);
		$query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

		return $this->getEvents($query, $con);
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
	 * If this Service is new, it will return
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
					->filterByService($this)
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
					->filterByService($this)
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
	 * @return     Service The current object (for fluent API support)
	 */
	public function addServiceMember(ServiceMember $l)
	{
		if ($this->collServiceMembers === null) {
			$this->initServiceMembers();
		}
		if (!$this->collServiceMembers->contains($l)) { // only add it if the **same** object is not already associated
			$this->collServiceMembers[]= $l;
			$l->setService($this);
		}

		return $this;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Service is new, it will return
	 * an empty collection; or if this Service has previously
	 * been saved, it will retrieve related ServiceMembers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Service.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ServiceMember[] List of ServiceMember objects
	 */
	public function getServiceMembersJoinTeamMember($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ServiceMemberQuery::create(null, $criteria);
		$query->joinWith('TeamMember', $join_behavior);

		return $this->getServiceMembers($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Service is new, it will return
	 * an empty collection; or if this Service has previously
	 * been saved, it will retrieve related ServiceMembers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Service.
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
	 * Otherwise if this Service is new, it will return
	 * an empty collection; or if this Service has previously
	 * been saved, it will retrieve related ServiceMembers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Service.
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
	 * Clears out the collServiceDocuments collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addServiceDocuments()
	 */
	public function clearServiceDocuments()
	{
		$this->collServiceDocuments = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collServiceDocuments collection.
	 *
	 * By default this just sets the collServiceDocuments collection to an empty array (like clearcollServiceDocuments());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initServiceDocuments($overrideExisting = true)
	{
		if (null !== $this->collServiceDocuments && !$overrideExisting) {
			return;
		}
		$this->collServiceDocuments = new PropelObjectCollection();
		$this->collServiceDocuments->setModel('ServiceDocument');
	}

	/**
	 * Gets an array of ServiceDocument objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Service is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ServiceDocument[] List of ServiceDocument objects
	 * @throws     PropelException
	 */
	public function getServiceDocuments($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collServiceDocuments || null !== $criteria) {
			if ($this->isNew() && null === $this->collServiceDocuments) {
				// return empty collection
				$this->initServiceDocuments();
			} else {
				$collServiceDocuments = ServiceDocumentQuery::create(null, $criteria)
					->filterByService($this)
					->find($con);
				if (null !== $criteria) {
					return $collServiceDocuments;
				}
				$this->collServiceDocuments = $collServiceDocuments;
			}
		}
		return $this->collServiceDocuments;
	}

	/**
	 * Returns the number of related ServiceDocument objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ServiceDocument objects.
	 * @throws     PropelException
	 */
	public function countServiceDocuments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collServiceDocuments || null !== $criteria) {
			if ($this->isNew() && null === $this->collServiceDocuments) {
				return 0;
			} else {
				$query = ServiceDocumentQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByService($this)
					->count($con);
			}
		} else {
			return count($this->collServiceDocuments);
		}
	}

	/**
	 * Method called to associate a ServiceDocument object to this object
	 * through the ServiceDocument foreign key attribute.
	 *
	 * @param      ServiceDocument $l ServiceDocument
	 * @return     Service The current object (for fluent API support)
	 */
	public function addServiceDocument(ServiceDocument $l)
	{
		if ($this->collServiceDocuments === null) {
			$this->initServiceDocuments();
		}
		if (!$this->collServiceDocuments->contains($l)) { // only add it if the **same** object is not already associated
			$this->collServiceDocuments[]= $l;
			$l->setService($this);
		}

		return $this;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Service is new, it will return
	 * an empty collection; or if this Service has previously
	 * been saved, it will retrieve related ServiceDocuments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Service.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ServiceDocument[] List of ServiceDocument objects
	 */
	public function getServiceDocumentsJoinDocument($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ServiceDocumentQuery::create(null, $criteria);
		$query->joinWith('Document', $join_behavior);

		return $this->getServiceDocuments($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Service is new, it will return
	 * an empty collection; or if this Service has previously
	 * been saved, it will retrieve related ServiceDocuments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Service.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ServiceDocument[] List of ServiceDocument objects
	 */
	public function getServiceDocumentsJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ServiceDocumentQuery::create(null, $criteria);
		$query->joinWith('UserRelatedByCreatedBy', $join_behavior);

		return $this->getServiceDocuments($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Service is new, it will return
	 * an empty collection; or if this Service has previously
	 * been saved, it will retrieve related ServiceDocuments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Service.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ServiceDocument[] List of ServiceDocument objects
	 */
	public function getServiceDocumentsJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ServiceDocumentQuery::create(null, $criteria);
		$query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

		return $this->getServiceDocuments($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->name = null;
		$this->slug = null;
		$this->teaser = null;
		$this->address = null;
		$this->opening_hours = null;
		$this->phone = null;
		$this->email = null;
		$this->website = null;
		$this->body = null;
		$this->is_active = null;
		$this->logo_id = null;
		$this->service_category_id = null;
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
			if ($this->collEvents) {
				foreach ($this->collEvents as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collServiceMembers) {
				foreach ($this->collServiceMembers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collServiceDocuments) {
				foreach ($this->collServiceDocuments as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collEvents instanceof PropelCollection) {
			$this->collEvents->clearIterator();
		}
		$this->collEvents = null;
		if ($this->collServiceMembers instanceof PropelCollection) {
			$this->collServiceMembers->clearIterator();
		}
		$this->collServiceMembers = null;
		if ($this->collServiceDocuments instanceof PropelCollection) {
			$this->collServiceDocuments->clearIterator();
		}
		$this->collServiceDocuments = null;
		$this->aDocument = null;
		$this->aServiceCategory = null;
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
		return (string) $this->exportTo(ServicePeer::DEFAULT_STRING_FORMAT);
	}

	// denyable behavior
	public function mayOperate($sOperation, $oUser = false) {
		if($oUser === false) {
			$oUser = Session::getSession()->getUser();
		}
		if($oUser && ($this->isNew() || $this->getCreatedBy() === $oUser->getId()) && ServicePeer::mayOperateOnOwn($oUser, $this, $sOperation)) {
			return true;
		}
		return ServicePeer::mayOperateOn($oUser, $this, $sOperation);
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
	 * @return     Service The current object (for fluent API support)
	 */
	public function keepUpdateDateUnchanged()
	{
		$this->modifiedColumns[] = ServicePeer::UPDATED_AT;
		return $this;
	}
	
	/**
	 * @return created_at as int (timestamp)
	 */
	public function getCreatedAtTimestamp()
	{
		return $this->getCreatedAt('U');
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
		return $this->getUpdatedAt('U');
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
	 * @return     Service The current object (for fluent API support)
	 */
	public function keepUpdateUserUnchanged()
	{
		$this->modifiedColumns[] = ServicePeer::UPDATED_BY;
		return $this;
	}

} // BaseService
