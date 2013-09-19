<?php


/**
 * Base class that represents a row from the 'schools' table.
 *
 *
 *
 * @package    propel.generator.model.om
 */
abstract class BaseSchool extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'SchoolPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SchoolPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the original_id field.
     * @var        string
     */
    protected $original_id;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the school_unit field.
     * @var        string
     */
    protected $school_unit;

    /**
     * The value for the address field.
     * @var        string
     */
    protected $address;

    /**
     * The value for the zip_code field.
     * @var        string
     */
    protected $zip_code;

    /**
     * The value for the city field.
     * @var        string
     */
    protected $city;

    /**
     * The value for the phone_schulleitung field.
     * @var        string
     */
    protected $phone_schulleitung;

    /**
     * The value for the phone_lehrerzimmer field.
     * @var        string
     */
    protected $phone_lehrerzimmer;

    /**
     * The value for the current_year field.
     * @var        int
     */
    protected $current_year;

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
     * @var        User
     */
    protected $aUserRelatedByCreatedBy;

    /**
     * @var        User
     */
    protected $aUserRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|SchoolFunction[] Collection to store aggregation of SchoolFunction objects.
     */
    protected $collSchoolFunctions;
    protected $collSchoolFunctionsPartial;

    /**
     * @var        PropelObjectCollection|SchoolClass[] Collection to store aggregation of SchoolClass objects.
     */
    protected $collSchoolClasss;
    protected $collSchoolClasssPartial;

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
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $schoolFunctionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $schoolClasssScheduledForDeletion = null;

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [original_id] column value.
     *
     * @return string
     */
    public function getOriginalId()
    {
        return $this->original_id;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [school_unit] column value.
     *
     * @return string
     */
    public function getSchoolUnit()
    {
        return $this->school_unit;
    }

    /**
     * Get the [address] column value.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get the [zip_code] column value.
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zip_code;
    }

    /**
     * Get the [city] column value.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get the [phone_schulleitung] column value.
     *
     * @return string
     */
    public function getPhoneSchulleitung()
    {
        return $this->phone_schulleitung;
    }

    /**
     * Get the [phone_lehrerzimmer] column value.
     *
     * @return string
     */
    public function getPhoneLehrerzimmer()
    {
        return $this->phone_lehrerzimmer;
    }

    /**
     * Get the [current_year] column value.
     *
     * @return int
     */
    public function getCurrentYear()
    {
        return $this->current_year;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->created_at === null) {
            return null;
        }

        if ($this->created_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->created_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->updated_at === null) {
            return null;
        }

        if ($this->updated_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->updated_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [created_by] column value.
     *
     * @return int
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Get the [updated_by] column value.
     *
     * @return int
     */
    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return School The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = SchoolPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [original_id] column.
     *
     * @param string $v new value
     * @return School The current object (for fluent API support)
     */
    public function setOriginalId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->original_id !== $v) {
            $this->original_id = $v;
            $this->modifiedColumns[] = SchoolPeer::ORIGINAL_ID;
        }


        return $this;
    } // setOriginalId()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return School The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = SchoolPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [school_unit] column.
     *
     * @param string $v new value
     * @return School The current object (for fluent API support)
     */
    public function setSchoolUnit($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->school_unit !== $v) {
            $this->school_unit = $v;
            $this->modifiedColumns[] = SchoolPeer::SCHOOL_UNIT;
        }


        return $this;
    } // setSchoolUnit()

    /**
     * Set the value of [address] column.
     *
     * @param string $v new value
     * @return School The current object (for fluent API support)
     */
    public function setAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address !== $v) {
            $this->address = $v;
            $this->modifiedColumns[] = SchoolPeer::ADDRESS;
        }


        return $this;
    } // setAddress()

    /**
     * Set the value of [zip_code] column.
     *
     * @param string $v new value
     * @return School The current object (for fluent API support)
     */
    public function setZipCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->zip_code !== $v) {
            $this->zip_code = $v;
            $this->modifiedColumns[] = SchoolPeer::ZIP_CODE;
        }


        return $this;
    } // setZipCode()

    /**
     * Set the value of [city] column.
     *
     * @param string $v new value
     * @return School The current object (for fluent API support)
     */
    public function setCity($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->city !== $v) {
            $this->city = $v;
            $this->modifiedColumns[] = SchoolPeer::CITY;
        }


        return $this;
    } // setCity()

    /**
     * Set the value of [phone_schulleitung] column.
     *
     * @param string $v new value
     * @return School The current object (for fluent API support)
     */
    public function setPhoneSchulleitung($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->phone_schulleitung !== $v) {
            $this->phone_schulleitung = $v;
            $this->modifiedColumns[] = SchoolPeer::PHONE_SCHULLEITUNG;
        }


        return $this;
    } // setPhoneSchulleitung()

    /**
     * Set the value of [phone_lehrerzimmer] column.
     *
     * @param string $v new value
     * @return School The current object (for fluent API support)
     */
    public function setPhoneLehrerzimmer($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->phone_lehrerzimmer !== $v) {
            $this->phone_lehrerzimmer = $v;
            $this->modifiedColumns[] = SchoolPeer::PHONE_LEHRERZIMMER;
        }


        return $this;
    } // setPhoneLehrerzimmer()

    /**
     * Set the value of [current_year] column.
     *
     * @param int $v new value
     * @return School The current object (for fluent API support)
     */
    public function setCurrentYear($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->current_year !== $v) {
            $this->current_year = $v;
            $this->modifiedColumns[] = SchoolPeer::CURRENT_YEAR;
        }


        return $this;
    } // setCurrentYear()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return School The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = SchoolPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return School The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = SchoolPeer::UPDATED_AT;
            }
        } // if either are not null


        return $this;
    } // setUpdatedAt()

    /**
     * Set the value of [created_by] column.
     *
     * @param int $v new value
     * @return School The current object (for fluent API support)
     */
    public function setCreatedBy($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->created_by !== $v) {
            $this->created_by = $v;
            $this->modifiedColumns[] = SchoolPeer::CREATED_BY;
        }

        if ($this->aUserRelatedByCreatedBy !== null && $this->aUserRelatedByCreatedBy->getId() !== $v) {
            $this->aUserRelatedByCreatedBy = null;
        }


        return $this;
    } // setCreatedBy()

    /**
     * Set the value of [updated_by] column.
     *
     * @param int $v new value
     * @return School The current object (for fluent API support)
     */
    public function setUpdatedBy($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->updated_by !== $v) {
            $this->updated_by = $v;
            $this->modifiedColumns[] = SchoolPeer::UPDATED_BY;
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
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return true
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
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->original_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->school_unit = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->address = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->zip_code = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->city = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->phone_schulleitung = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->phone_lehrerzimmer = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->current_year = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->created_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->updated_at = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->created_by = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->updated_by = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 14; // 14 = SchoolPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating School object", $e);
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
     * @throws PropelException
     */
    public function ensureConsistency()
    {

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
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
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
            $con = Propel::getConnection(SchoolPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SchoolPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUserRelatedByCreatedBy = null;
            $this->aUserRelatedByUpdatedBy = null;
            $this->collSchoolFunctions = null;

            $this->collSchoolClasss = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(SchoolPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SchoolQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // denyable behavior
            if(!(SchoolPeer::isIgnoringRights() || $this->mayOperate("delete"))) {
                throw new PropelException(new NotPermittedException("delete.by_role", array("role_key" => "schools")));
            }

            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
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
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(SchoolPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // denyable behavior
                if(!(SchoolPeer::isIgnoringRights() || $this->mayOperate("insert"))) {
                    throw new PropelException(new NotPermittedException("insert.by_role", array("role_key" => "schools")));
                }

                // extended_timestampable behavior
                if (!$this->isColumnModified(SchoolPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SchoolPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
                // attributable behavior

                if(Session::getSession()->isAuthenticated()) {
                    if (!$this->isColumnModified(SchoolPeer::CREATED_BY)) {
                        $this->setCreatedBy(Session::getSession()->getUser()->getId());
                    }
                    if (!$this->isColumnModified(SchoolPeer::UPDATED_BY)) {
                        $this->setUpdatedBy(Session::getSession()->getUser()->getId());
                    }
                }

            } else {
                $ret = $ret && $this->preUpdate($con);
                // denyable behavior
                if(!(SchoolPeer::isIgnoringRights() || $this->mayOperate("update"))) {
                    throw new PropelException(new NotPermittedException("update.by_role", array("role_key" => "schools")));
                }

                // extended_timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SchoolPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
                // attributable behavior

                if(Session::getSession()->isAuthenticated()) {
                    if ($this->isModified() && !$this->isColumnModified(SchoolPeer::UPDATED_BY)) {
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
                SchoolPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
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
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
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

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->schoolFunctionsScheduledForDeletion !== null) {
                if (!$this->schoolFunctionsScheduledForDeletion->isEmpty()) {
                    foreach ($this->schoolFunctionsScheduledForDeletion as $schoolFunction) {
                        // need to save related object because we set the relation to null
                        $schoolFunction->save($con);
                    }
                    $this->schoolFunctionsScheduledForDeletion = null;
                }
            }

            if ($this->collSchoolFunctions !== null) {
                foreach ($this->collSchoolFunctions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->schoolClasssScheduledForDeletion !== null) {
                if (!$this->schoolClasssScheduledForDeletion->isEmpty()) {
                    foreach ($this->schoolClasssScheduledForDeletion as $schoolClass) {
                        // need to save related object because we set the relation to null
                        $schoolClass->save($con);
                    }
                    $this->schoolClasssScheduledForDeletion = null;
                }
            }

            if ($this->collSchoolClasss !== null) {
                foreach ($this->collSchoolClasss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = SchoolPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SchoolPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SchoolPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(SchoolPeer::ORIGINAL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`original_id`';
        }
        if ($this->isColumnModified(SchoolPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(SchoolPeer::SCHOOL_UNIT)) {
            $modifiedColumns[':p' . $index++]  = '`school_unit`';
        }
        if ($this->isColumnModified(SchoolPeer::ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`address`';
        }
        if ($this->isColumnModified(SchoolPeer::ZIP_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`zip_code`';
        }
        if ($this->isColumnModified(SchoolPeer::CITY)) {
            $modifiedColumns[':p' . $index++]  = '`city`';
        }
        if ($this->isColumnModified(SchoolPeer::PHONE_SCHULLEITUNG)) {
            $modifiedColumns[':p' . $index++]  = '`phone_schulleitung`';
        }
        if ($this->isColumnModified(SchoolPeer::PHONE_LEHRERZIMMER)) {
            $modifiedColumns[':p' . $index++]  = '`phone_lehrerzimmer`';
        }
        if ($this->isColumnModified(SchoolPeer::CURRENT_YEAR)) {
            $modifiedColumns[':p' . $index++]  = '`current_year`';
        }
        if ($this->isColumnModified(SchoolPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(SchoolPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }
        if ($this->isColumnModified(SchoolPeer::CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`created_by`';
        }
        if ($this->isColumnModified(SchoolPeer::UPDATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`updated_by`';
        }

        $sql = sprintf(
            'INSERT INTO `schools` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`original_id`':
                        $stmt->bindValue($identifier, $this->original_id, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`school_unit`':
                        $stmt->bindValue($identifier, $this->school_unit, PDO::PARAM_STR);
                        break;
                    case '`address`':
                        $stmt->bindValue($identifier, $this->address, PDO::PARAM_STR);
                        break;
                    case '`zip_code`':
                        $stmt->bindValue($identifier, $this->zip_code, PDO::PARAM_STR);
                        break;
                    case '`city`':
                        $stmt->bindValue($identifier, $this->city, PDO::PARAM_STR);
                        break;
                    case '`phone_schulleitung`':
                        $stmt->bindValue($identifier, $this->phone_schulleitung, PDO::PARAM_STR);
                        break;
                    case '`phone_lehrerzimmer`':
                        $stmt->bindValue($identifier, $this->phone_lehrerzimmer, PDO::PARAM_STR);
                        break;
                    case '`current_year`':
                        $stmt->bindValue($identifier, $this->current_year, PDO::PARAM_INT);
                        break;
                    case '`created_at`':
                        $stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case '`updated_at`':
                        $stmt->bindValue($identifier, $this->updated_at, PDO::PARAM_STR);
                        break;
                    case '`created_by`':
                        $stmt->bindValue($identifier, $this->created_by, PDO::PARAM_INT);
                        break;
                    case '`updated_by`':
                        $stmt->bindValue($identifier, $this->updated_by, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
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
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
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


            if (($retval = SchoolPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSchoolFunctions !== null) {
                    foreach ($this->collSchoolFunctions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSchoolClasss !== null) {
                    foreach ($this->collSchoolClasss as $referrerFK) {
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
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = SchoolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getOriginalId();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getSchoolUnit();
                break;
            case 4:
                return $this->getAddress();
                break;
            case 5:
                return $this->getZipCode();
                break;
            case 6:
                return $this->getCity();
                break;
            case 7:
                return $this->getPhoneSchulleitung();
                break;
            case 8:
                return $this->getPhoneLehrerzimmer();
                break;
            case 9:
                return $this->getCurrentYear();
                break;
            case 10:
                return $this->getCreatedAt();
                break;
            case 11:
                return $this->getUpdatedAt();
                break;
            case 12:
                return $this->getCreatedBy();
                break;
            case 13:
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
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['School'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['School'][$this->getPrimaryKey()] = true;
        $keys = SchoolPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getOriginalId(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getSchoolUnit(),
            $keys[4] => $this->getAddress(),
            $keys[5] => $this->getZipCode(),
            $keys[6] => $this->getCity(),
            $keys[7] => $this->getPhoneSchulleitung(),
            $keys[8] => $this->getPhoneLehrerzimmer(),
            $keys[9] => $this->getCurrentYear(),
            $keys[10] => $this->getCreatedAt(),
            $keys[11] => $this->getUpdatedAt(),
            $keys[12] => $this->getCreatedBy(),
            $keys[13] => $this->getUpdatedBy(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aUserRelatedByCreatedBy) {
                $result['UserRelatedByCreatedBy'] = $this->aUserRelatedByCreatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUserRelatedByUpdatedBy) {
                $result['UserRelatedByUpdatedBy'] = $this->aUserRelatedByUpdatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSchoolFunctions) {
                $result['SchoolFunctions'] = $this->collSchoolFunctions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSchoolClasss) {
                $result['SchoolClasss'] = $this->collSchoolClasss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = SchoolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setOriginalId($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setSchoolUnit($value);
                break;
            case 4:
                $this->setAddress($value);
                break;
            case 5:
                $this->setZipCode($value);
                break;
            case 6:
                $this->setCity($value);
                break;
            case 7:
                $this->setPhoneSchulleitung($value);
                break;
            case 8:
                $this->setPhoneLehrerzimmer($value);
                break;
            case 9:
                $this->setCurrentYear($value);
                break;
            case 10:
                $this->setCreatedAt($value);
                break;
            case 11:
                $this->setUpdatedAt($value);
                break;
            case 12:
                $this->setCreatedBy($value);
                break;
            case 13:
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
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = SchoolPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setOriginalId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSchoolUnit($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setAddress($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setZipCode($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCity($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPhoneSchulleitung($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setPhoneLehrerzimmer($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCurrentYear($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCreatedAt($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setUpdatedAt($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setCreatedBy($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setUpdatedBy($arr[$keys[13]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SchoolPeer::DATABASE_NAME);

        if ($this->isColumnModified(SchoolPeer::ID)) $criteria->add(SchoolPeer::ID, $this->id);
        if ($this->isColumnModified(SchoolPeer::ORIGINAL_ID)) $criteria->add(SchoolPeer::ORIGINAL_ID, $this->original_id);
        if ($this->isColumnModified(SchoolPeer::NAME)) $criteria->add(SchoolPeer::NAME, $this->name);
        if ($this->isColumnModified(SchoolPeer::SCHOOL_UNIT)) $criteria->add(SchoolPeer::SCHOOL_UNIT, $this->school_unit);
        if ($this->isColumnModified(SchoolPeer::ADDRESS)) $criteria->add(SchoolPeer::ADDRESS, $this->address);
        if ($this->isColumnModified(SchoolPeer::ZIP_CODE)) $criteria->add(SchoolPeer::ZIP_CODE, $this->zip_code);
        if ($this->isColumnModified(SchoolPeer::CITY)) $criteria->add(SchoolPeer::CITY, $this->city);
        if ($this->isColumnModified(SchoolPeer::PHONE_SCHULLEITUNG)) $criteria->add(SchoolPeer::PHONE_SCHULLEITUNG, $this->phone_schulleitung);
        if ($this->isColumnModified(SchoolPeer::PHONE_LEHRERZIMMER)) $criteria->add(SchoolPeer::PHONE_LEHRERZIMMER, $this->phone_lehrerzimmer);
        if ($this->isColumnModified(SchoolPeer::CURRENT_YEAR)) $criteria->add(SchoolPeer::CURRENT_YEAR, $this->current_year);
        if ($this->isColumnModified(SchoolPeer::CREATED_AT)) $criteria->add(SchoolPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(SchoolPeer::UPDATED_AT)) $criteria->add(SchoolPeer::UPDATED_AT, $this->updated_at);
        if ($this->isColumnModified(SchoolPeer::CREATED_BY)) $criteria->add(SchoolPeer::CREATED_BY, $this->created_by);
        if ($this->isColumnModified(SchoolPeer::UPDATED_BY)) $criteria->add(SchoolPeer::UPDATED_BY, $this->updated_by);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(SchoolPeer::DATABASE_NAME);
        $criteria->add(SchoolPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
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
     * @param object $copyObj An object of School (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setOriginalId($this->getOriginalId());
        $copyObj->setName($this->getName());
        $copyObj->setSchoolUnit($this->getSchoolUnit());
        $copyObj->setAddress($this->getAddress());
        $copyObj->setZipCode($this->getZipCode());
        $copyObj->setCity($this->getCity());
        $copyObj->setPhoneSchulleitung($this->getPhoneSchulleitung());
        $copyObj->setPhoneLehrerzimmer($this->getPhoneLehrerzimmer());
        $copyObj->setCurrentYear($this->getCurrentYear());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        $copyObj->setCreatedBy($this->getCreatedBy());
        $copyObj->setUpdatedBy($this->getUpdatedBy());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getSchoolFunctions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSchoolFunction($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSchoolClasss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSchoolClass($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
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
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return School Clone of current object.
     * @throws PropelException
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
     * @return SchoolPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SchoolPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param             User $v
     * @return School The current object (for fluent API support)
     * @throws PropelException
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
            $v->addSchoolRelatedByCreatedBy($this);
        }


        return $this;
    }


    /**
     * Get the associated User object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return User The associated User object.
     * @throws PropelException
     */
    public function getUserRelatedByCreatedBy(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aUserRelatedByCreatedBy === null && ($this->created_by !== null) && $doQuery) {
            $this->aUserRelatedByCreatedBy = UserQuery::create()->findPk($this->created_by, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUserRelatedByCreatedBy->addSchoolsRelatedByCreatedBy($this);
             */
        }

        return $this->aUserRelatedByCreatedBy;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param             User $v
     * @return School The current object (for fluent API support)
     * @throws PropelException
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
            $v->addSchoolRelatedByUpdatedBy($this);
        }


        return $this;
    }


    /**
     * Get the associated User object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return User The associated User object.
     * @throws PropelException
     */
    public function getUserRelatedByUpdatedBy(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aUserRelatedByUpdatedBy === null && ($this->updated_by !== null) && $doQuery) {
            $this->aUserRelatedByUpdatedBy = UserQuery::create()->findPk($this->updated_by, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUserRelatedByUpdatedBy->addSchoolsRelatedByUpdatedBy($this);
             */
        }

        return $this->aUserRelatedByUpdatedBy;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('SchoolFunction' == $relationName) {
            $this->initSchoolFunctions();
        }
        if ('SchoolClass' == $relationName) {
            $this->initSchoolClasss();
        }
    }

    /**
     * Clears out the collSchoolFunctions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return School The current object (for fluent API support)
     * @see        addSchoolFunctions()
     */
    public function clearSchoolFunctions()
    {
        $this->collSchoolFunctions = null; // important to set this to null since that means it is uninitialized
        $this->collSchoolFunctionsPartial = null;

        return $this;
    }

    /**
     * reset is the collSchoolFunctions collection loaded partially
     *
     * @return void
     */
    public function resetPartialSchoolFunctions($v = true)
    {
        $this->collSchoolFunctionsPartial = $v;
    }

    /**
     * Initializes the collSchoolFunctions collection.
     *
     * By default this just sets the collSchoolFunctions collection to an empty array (like clearcollSchoolFunctions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSchoolFunctions($overrideExisting = true)
    {
        if (null !== $this->collSchoolFunctions && !$overrideExisting) {
            return;
        }
        $this->collSchoolFunctions = new PropelObjectCollection();
        $this->collSchoolFunctions->setModel('SchoolFunction');
    }

    /**
     * Gets an array of SchoolFunction objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this School is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SchoolFunction[] List of SchoolFunction objects
     * @throws PropelException
     */
    public function getSchoolFunctions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSchoolFunctionsPartial && !$this->isNew();
        if (null === $this->collSchoolFunctions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSchoolFunctions) {
                // return empty collection
                $this->initSchoolFunctions();
            } else {
                $collSchoolFunctions = SchoolFunctionQuery::create(null, $criteria)
                    ->filterBySchool($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSchoolFunctionsPartial && count($collSchoolFunctions)) {
                      $this->initSchoolFunctions(false);

                      foreach($collSchoolFunctions as $obj) {
                        if (false == $this->collSchoolFunctions->contains($obj)) {
                          $this->collSchoolFunctions->append($obj);
                        }
                      }

                      $this->collSchoolFunctionsPartial = true;
                    }

                    $collSchoolFunctions->getInternalIterator()->rewind();
                    return $collSchoolFunctions;
                }

                if($partial && $this->collSchoolFunctions) {
                    foreach($this->collSchoolFunctions as $obj) {
                        if($obj->isNew()) {
                            $collSchoolFunctions[] = $obj;
                        }
                    }
                }

                $this->collSchoolFunctions = $collSchoolFunctions;
                $this->collSchoolFunctionsPartial = false;
            }
        }

        return $this->collSchoolFunctions;
    }

    /**
     * Sets a collection of SchoolFunction objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $schoolFunctions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return School The current object (for fluent API support)
     */
    public function setSchoolFunctions(PropelCollection $schoolFunctions, PropelPDO $con = null)
    {
        $schoolFunctionsToDelete = $this->getSchoolFunctions(new Criteria(), $con)->diff($schoolFunctions);

        $this->schoolFunctionsScheduledForDeletion = unserialize(serialize($schoolFunctionsToDelete));

        foreach ($schoolFunctionsToDelete as $schoolFunctionRemoved) {
            $schoolFunctionRemoved->setSchool(null);
        }

        $this->collSchoolFunctions = null;
        foreach ($schoolFunctions as $schoolFunction) {
            $this->addSchoolFunction($schoolFunction);
        }

        $this->collSchoolFunctions = $schoolFunctions;
        $this->collSchoolFunctionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SchoolFunction objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SchoolFunction objects.
     * @throws PropelException
     */
    public function countSchoolFunctions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSchoolFunctionsPartial && !$this->isNew();
        if (null === $this->collSchoolFunctions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSchoolFunctions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSchoolFunctions());
            }
            $query = SchoolFunctionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySchool($this)
                ->count($con);
        }

        return count($this->collSchoolFunctions);
    }

    /**
     * Method called to associate a SchoolFunction object to this object
     * through the SchoolFunction foreign key attribute.
     *
     * @param    SchoolFunction $l SchoolFunction
     * @return School The current object (for fluent API support)
     */
    public function addSchoolFunction(SchoolFunction $l)
    {
        if ($this->collSchoolFunctions === null) {
            $this->initSchoolFunctions();
            $this->collSchoolFunctionsPartial = true;
        }
        if (!in_array($l, $this->collSchoolFunctions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSchoolFunction($l);
        }

        return $this;
    }

    /**
     * @param	SchoolFunction $schoolFunction The schoolFunction object to add.
     */
    protected function doAddSchoolFunction($schoolFunction)
    {
        $this->collSchoolFunctions[]= $schoolFunction;
        $schoolFunction->setSchool($this);
    }

    /**
     * @param	SchoolFunction $schoolFunction The schoolFunction object to remove.
     * @return School The current object (for fluent API support)
     */
    public function removeSchoolFunction($schoolFunction)
    {
        if ($this->getSchoolFunctions()->contains($schoolFunction)) {
            $this->collSchoolFunctions->remove($this->collSchoolFunctions->search($schoolFunction));
            if (null === $this->schoolFunctionsScheduledForDeletion) {
                $this->schoolFunctionsScheduledForDeletion = clone $this->collSchoolFunctions;
                $this->schoolFunctionsScheduledForDeletion->clear();
            }
            $this->schoolFunctionsScheduledForDeletion[]= $schoolFunction;
            $schoolFunction->setSchool(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this School is new, it will return
     * an empty collection; or if this School has previously
     * been saved, it will retrieve related SchoolFunctions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in School.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SchoolFunction[] List of SchoolFunction objects
     */
    public function getSchoolFunctionsJoinFunctionGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SchoolFunctionQuery::create(null, $criteria);
        $query->joinWith('FunctionGroup', $join_behavior);

        return $this->getSchoolFunctions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this School is new, it will return
     * an empty collection; or if this School has previously
     * been saved, it will retrieve related SchoolFunctions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in School.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SchoolFunction[] List of SchoolFunction objects
     */
    public function getSchoolFunctionsJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SchoolFunctionQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByCreatedBy', $join_behavior);

        return $this->getSchoolFunctions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this School is new, it will return
     * an empty collection; or if this School has previously
     * been saved, it will retrieve related SchoolFunctions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in School.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SchoolFunction[] List of SchoolFunction objects
     */
    public function getSchoolFunctionsJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SchoolFunctionQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

        return $this->getSchoolFunctions($query, $con);
    }

    /**
     * Clears out the collSchoolClasss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return School The current object (for fluent API support)
     * @see        addSchoolClasss()
     */
    public function clearSchoolClasss()
    {
        $this->collSchoolClasss = null; // important to set this to null since that means it is uninitialized
        $this->collSchoolClasssPartial = null;

        return $this;
    }

    /**
     * reset is the collSchoolClasss collection loaded partially
     *
     * @return void
     */
    public function resetPartialSchoolClasss($v = true)
    {
        $this->collSchoolClasssPartial = $v;
    }

    /**
     * Initializes the collSchoolClasss collection.
     *
     * By default this just sets the collSchoolClasss collection to an empty array (like clearcollSchoolClasss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSchoolClasss($overrideExisting = true)
    {
        if (null !== $this->collSchoolClasss && !$overrideExisting) {
            return;
        }
        $this->collSchoolClasss = new PropelObjectCollection();
        $this->collSchoolClasss->setModel('SchoolClass');
    }

    /**
     * Gets an array of SchoolClass objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this School is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SchoolClass[] List of SchoolClass objects
     * @throws PropelException
     */
    public function getSchoolClasss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSchoolClasssPartial && !$this->isNew();
        if (null === $this->collSchoolClasss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSchoolClasss) {
                // return empty collection
                $this->initSchoolClasss();
            } else {
                $collSchoolClasss = SchoolClassQuery::create(null, $criteria)
                    ->filterBySchool($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSchoolClasssPartial && count($collSchoolClasss)) {
                      $this->initSchoolClasss(false);

                      foreach($collSchoolClasss as $obj) {
                        if (false == $this->collSchoolClasss->contains($obj)) {
                          $this->collSchoolClasss->append($obj);
                        }
                      }

                      $this->collSchoolClasssPartial = true;
                    }

                    $collSchoolClasss->getInternalIterator()->rewind();
                    return $collSchoolClasss;
                }

                if($partial && $this->collSchoolClasss) {
                    foreach($this->collSchoolClasss as $obj) {
                        if($obj->isNew()) {
                            $collSchoolClasss[] = $obj;
                        }
                    }
                }

                $this->collSchoolClasss = $collSchoolClasss;
                $this->collSchoolClasssPartial = false;
            }
        }

        return $this->collSchoolClasss;
    }

    /**
     * Sets a collection of SchoolClass objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $schoolClasss A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return School The current object (for fluent API support)
     */
    public function setSchoolClasss(PropelCollection $schoolClasss, PropelPDO $con = null)
    {
        $schoolClasssToDelete = $this->getSchoolClasss(new Criteria(), $con)->diff($schoolClasss);

        $this->schoolClasssScheduledForDeletion = unserialize(serialize($schoolClasssToDelete));

        foreach ($schoolClasssToDelete as $schoolClassRemoved) {
            $schoolClassRemoved->setSchool(null);
        }

        $this->collSchoolClasss = null;
        foreach ($schoolClasss as $schoolClass) {
            $this->addSchoolClass($schoolClass);
        }

        $this->collSchoolClasss = $schoolClasss;
        $this->collSchoolClasssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SchoolClass objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SchoolClass objects.
     * @throws PropelException
     */
    public function countSchoolClasss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSchoolClasssPartial && !$this->isNew();
        if (null === $this->collSchoolClasss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSchoolClasss) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSchoolClasss());
            }
            $query = SchoolClassQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySchool($this)
                ->count($con);
        }

        return count($this->collSchoolClasss);
    }

    /**
     * Method called to associate a SchoolClass object to this object
     * through the SchoolClass foreign key attribute.
     *
     * @param    SchoolClass $l SchoolClass
     * @return School The current object (for fluent API support)
     */
    public function addSchoolClass(SchoolClass $l)
    {
        if ($this->collSchoolClasss === null) {
            $this->initSchoolClasss();
            $this->collSchoolClasssPartial = true;
        }
        if (!in_array($l, $this->collSchoolClasss->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSchoolClass($l);
        }

        return $this;
    }

    /**
     * @param	SchoolClass $schoolClass The schoolClass object to add.
     */
    protected function doAddSchoolClass($schoolClass)
    {
        $this->collSchoolClasss[]= $schoolClass;
        $schoolClass->setSchool($this);
    }

    /**
     * @param	SchoolClass $schoolClass The schoolClass object to remove.
     * @return School The current object (for fluent API support)
     */
    public function removeSchoolClass($schoolClass)
    {
        if ($this->getSchoolClasss()->contains($schoolClass)) {
            $this->collSchoolClasss->remove($this->collSchoolClasss->search($schoolClass));
            if (null === $this->schoolClasssScheduledForDeletion) {
                $this->schoolClasssScheduledForDeletion = clone $this->collSchoolClasss;
                $this->schoolClasssScheduledForDeletion->clear();
            }
            $this->schoolClasssScheduledForDeletion[]= $schoolClass;
            $schoolClass->setSchool(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this School is new, it will return
     * an empty collection; or if this School has previously
     * been saved, it will retrieve related SchoolClasss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in School.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SchoolClass[] List of SchoolClass objects
     */
    public function getSchoolClasssJoinDocumentRelatedByClassPortraitId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SchoolClassQuery::create(null, $criteria);
        $query->joinWith('DocumentRelatedByClassPortraitId', $join_behavior);

        return $this->getSchoolClasss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this School is new, it will return
     * an empty collection; or if this School has previously
     * been saved, it will retrieve related SchoolClasss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in School.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SchoolClass[] List of SchoolClass objects
     */
    public function getSchoolClasssJoinClassType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SchoolClassQuery::create(null, $criteria);
        $query->joinWith('ClassType', $join_behavior);

        return $this->getSchoolClasss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this School is new, it will return
     * an empty collection; or if this School has previously
     * been saved, it will retrieve related SchoolClasss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in School.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SchoolClass[] List of SchoolClass objects
     */
    public function getSchoolClasssJoinDocumentRelatedByClassScheduleId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SchoolClassQuery::create(null, $criteria);
        $query->joinWith('DocumentRelatedByClassScheduleId', $join_behavior);

        return $this->getSchoolClasss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this School is new, it will return
     * an empty collection; or if this School has previously
     * been saved, it will retrieve related SchoolClasss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in School.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SchoolClass[] List of SchoolClass objects
     */
    public function getSchoolClasssJoinDocumentRelatedByWeekScheduleId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SchoolClassQuery::create(null, $criteria);
        $query->joinWith('DocumentRelatedByWeekScheduleId', $join_behavior);

        return $this->getSchoolClasss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this School is new, it will return
     * an empty collection; or if this School has previously
     * been saved, it will retrieve related SchoolClasss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in School.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SchoolClass[] List of SchoolClass objects
     */
    public function getSchoolClasssJoinSchoolBuilding($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SchoolClassQuery::create(null, $criteria);
        $query->joinWith('SchoolBuilding', $join_behavior);

        return $this->getSchoolClasss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this School is new, it will return
     * an empty collection; or if this School has previously
     * been saved, it will retrieve related SchoolClasss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in School.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SchoolClass[] List of SchoolClass objects
     */
    public function getSchoolClasssJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SchoolClassQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByCreatedBy', $join_behavior);

        return $this->getSchoolClasss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this School is new, it will return
     * an empty collection; or if this School has previously
     * been saved, it will retrieve related SchoolClasss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in School.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SchoolClass[] List of SchoolClass objects
     */
    public function getSchoolClasssJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SchoolClassQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

        return $this->getSchoolClasss($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->original_id = null;
        $this->name = null;
        $this->school_unit = null;
        $this->address = null;
        $this->zip_code = null;
        $this->city = null;
        $this->phone_schulleitung = null;
        $this->phone_lehrerzimmer = null;
        $this->current_year = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->created_by = null;
        $this->updated_by = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
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
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collSchoolFunctions) {
                foreach ($this->collSchoolFunctions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSchoolClasss) {
                foreach ($this->collSchoolClasss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aUserRelatedByCreatedBy instanceof Persistent) {
              $this->aUserRelatedByCreatedBy->clearAllReferences($deep);
            }
            if ($this->aUserRelatedByUpdatedBy instanceof Persistent) {
              $this->aUserRelatedByUpdatedBy->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collSchoolFunctions instanceof PropelCollection) {
            $this->collSchoolFunctions->clearIterator();
        }
        $this->collSchoolFunctions = null;
        if ($this->collSchoolClasss instanceof PropelCollection) {
            $this->collSchoolClasss->clearIterator();
        }
        $this->collSchoolClasss = null;
        $this->aUserRelatedByCreatedBy = null;
        $this->aUserRelatedByUpdatedBy = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SchoolPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

    // denyable behavior
    public function mayOperate($sOperation, $oUser = false) {
        if($oUser === false) {
            $oUser = Session::getSession()->getUser();
        }
        $bIsAllowed = false;
        if($oUser && ($this->isNew() || $this->getCreatedBy() === $oUser->getId()) && SchoolPeer::mayOperateOnOwn($oUser, $this, $sOperation)) {
            $bIsAllowed = true;
        } else if(SchoolPeer::mayOperateOn($oUser, $this, $sOperation)) {
            $bIsAllowed = true;
        }
        FilterModule::getFilters()->handleSchoolOperationCheck($sOperation, $this, $oUser, array(&$bIsAllowed));
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
     * @return     School The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = SchoolPeer::UPDATED_AT;

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
     * @return     School The current object (for fluent API support)
     */
    public function keepUpdateUserUnchanged()
    {
        $this->modifiedColumns[] = SchoolPeer::UPDATED_BY;
        return $this;
    }

}
