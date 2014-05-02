<?php


/**
 * Base class that represents a row from the 'events' table.
 *
 *
 *
 * @package    propel.generator.model.om
 */
abstract class BaseEvent extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'EventPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        EventPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the title field.
     * @var        string
     */
    protected $title;

    /**
     * The value for the title_normalized field.
     * @var        string
     */
    protected $title_normalized;

    /**
     * The value for the teaser field.
     * @var        string
     */
    protected $teaser;

    /**
     * The value for the body_preview field.
     * @var        resource
     */
    protected $body_preview;

    /**
     * The value for the body_review field.
     * @var        resource
     */
    protected $body_review;

    /**
     * The value for the location_info field.
     * @var        string
     */
    protected $location_info;

    /**
     * The value for the date_start field.
     * @var        string
     */
    protected $date_start;

    /**
     * The value for the date_end field.
     * @var        string
     */
    protected $date_end;

    /**
     * The value for the time_details field.
     * @var        string
     */
    protected $time_details;

    /**
     * The value for the is_active field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_active;

    /**
     * The value for the ignore_on_frontpage field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $ignore_on_frontpage;

    /**
     * The value for the event_type_id field.
     * @var        int
     */
    protected $event_type_id;

    /**
     * The value for the service_id field.
     * @var        int
     */
    protected $service_id;

    /**
     * The value for the school_class_id field.
     * @var        int
     */
    protected $school_class_id;

    /**
     * The value for the gallery_id field.
     * @var        int
     */
    protected $gallery_id;

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
     * @var        EventType
     */
    protected $aEventType;

    /**
     * @var        Service
     */
    protected $aService;

    /**
     * @var        SchoolClass
     */
    protected $aSchoolClass;

    /**
     * @var        DocumentCategory
     */
    protected $aDocumentCategory;

    /**
     * @var        User
     */
    protected $aUserRelatedByCreatedBy;

    /**
     * @var        User
     */
    protected $aUserRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|EventDocument[] Collection to store aggregation of EventDocument objects.
     */
    protected $collEventDocuments;
    protected $collEventDocumentsPartial;

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
    protected $eventDocumentsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_active = false;
        $this->ignore_on_frontpage = false;
    }

    /**
     * Initializes internal state of BaseEvent object.
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
     * @return int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {

        return $this->title;
    }

    /**
     * Get the [title_normalized] column value.
     *
     * @return string
     */
    public function getTitleNormalized()
    {

        return $this->title_normalized;
    }

    /**
     * Get the [teaser] column value.
     *
     * @return string
     */
    public function getTeaser()
    {

        return $this->teaser;
    }

    /**
     * Get the [body_preview] column value.
     *
     * @return resource
     */
    public function getBodyPreview()
    {

        return $this->body_preview;
    }

    /**
     * Get the [body_review] column value.
     *
     * @return resource
     */
    public function getBodyReview()
    {

        return $this->body_review;
    }

    /**
     * Get the [location_info] column value.
     *
     * @return string
     */
    public function getLocationInfo()
    {

        return $this->location_info;
    }

    /**
     * Get the [optionally formatted] temporal [date_start] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateStart($format = '%x')
    {
        if ($this->date_start === null) {
            return null;
        }

        if ($this->date_start === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->date_start);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date_start, true), $x);
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
     * Get the [optionally formatted] temporal [date_end] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateEnd($format = '%x')
    {
        if ($this->date_end === null) {
            return null;
        }

        if ($this->date_end === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->date_end);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date_end, true), $x);
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
     * Get the [time_details] column value.
     *
     * @return string
     */
    public function getTimeDetails()
    {

        return $this->time_details;
    }

    /**
     * Get the [is_active] column value.
     *
     * @return boolean
     */
    public function getIsActive()
    {

        return $this->is_active;
    }

    /**
     * Get the [ignore_on_frontpage] column value.
     *
     * @return boolean
     */
    public function getIgnoreOnFrontpage()
    {

        return $this->ignore_on_frontpage;
    }

    /**
     * Get the [event_type_id] column value.
     *
     * @return int
     */
    public function getEventTypeId()
    {

        return $this->event_type_id;
    }

    /**
     * Get the [service_id] column value.
     *
     * @return int
     */
    public function getServiceId()
    {

        return $this->service_id;
    }

    /**
     * Get the [school_class_id] column value.
     *
     * @return int
     */
    public function getSchoolClassId()
    {

        return $this->school_class_id;
    }

    /**
     * Get the [gallery_id] column value.
     *
     * @return int
     */
    public function getGalleryId()
    {

        return $this->gallery_id;
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
     * @param  int $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = EventPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [title] column.
     *
     * @param  string $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[] = EventPeer::TITLE;
        }


        return $this;
    } // setTitle()

    /**
     * Set the value of [title_normalized] column.
     *
     * @param  string $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setTitleNormalized($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title_normalized !== $v) {
            $this->title_normalized = $v;
            $this->modifiedColumns[] = EventPeer::TITLE_NORMALIZED;
        }


        return $this;
    } // setTitleNormalized()

    /**
     * Set the value of [teaser] column.
     *
     * @param  string $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setTeaser($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->teaser !== $v) {
            $this->teaser = $v;
            $this->modifiedColumns[] = EventPeer::TEASER;
        }


        return $this;
    } // setTeaser()

    /**
     * Set the value of [body_preview] column.
     *
     * @param  resource $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setBodyPreview($v)
    {
        // Because BLOB columns are streams in PDO we have to assume that they are
        // always modified when a new value is passed in.  For example, the contents
        // of the stream itself may have changed externally.
        if (!is_resource($v) && $v !== null) {
            $this->body_preview = fopen('php://memory', 'r+');
            fwrite($this->body_preview, $v);
            rewind($this->body_preview);
        } else { // it's already a stream
            $this->body_preview = $v;
        }
        $this->modifiedColumns[] = EventPeer::BODY_PREVIEW;


        return $this;
    } // setBodyPreview()

    /**
     * Set the value of [body_review] column.
     *
     * @param  resource $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setBodyReview($v)
    {
        // Because BLOB columns are streams in PDO we have to assume that they are
        // always modified when a new value is passed in.  For example, the contents
        // of the stream itself may have changed externally.
        if (!is_resource($v) && $v !== null) {
            $this->body_review = fopen('php://memory', 'r+');
            fwrite($this->body_review, $v);
            rewind($this->body_review);
        } else { // it's already a stream
            $this->body_review = $v;
        }
        $this->modifiedColumns[] = EventPeer::BODY_REVIEW;


        return $this;
    } // setBodyReview()

    /**
     * Set the value of [location_info] column.
     *
     * @param  string $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setLocationInfo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->location_info !== $v) {
            $this->location_info = $v;
            $this->modifiedColumns[] = EventPeer::LOCATION_INFO;
        }


        return $this;
    } // setLocationInfo()

    /**
     * Sets the value of [date_start] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Event The current object (for fluent API support)
     */
    public function setDateStart($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_start !== null || $dt !== null) {
            $currentDateAsString = ($this->date_start !== null && $tmpDt = new DateTime($this->date_start)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->date_start = $newDateAsString;
                $this->modifiedColumns[] = EventPeer::DATE_START;
            }
        } // if either are not null


        return $this;
    } // setDateStart()

    /**
     * Sets the value of [date_end] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Event The current object (for fluent API support)
     */
    public function setDateEnd($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_end !== null || $dt !== null) {
            $currentDateAsString = ($this->date_end !== null && $tmpDt = new DateTime($this->date_end)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->date_end = $newDateAsString;
                $this->modifiedColumns[] = EventPeer::DATE_END;
            }
        } // if either are not null


        return $this;
    } // setDateEnd()

    /**
     * Set the value of [time_details] column.
     *
     * @param  string $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setTimeDetails($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->time_details !== $v) {
            $this->time_details = $v;
            $this->modifiedColumns[] = EventPeer::TIME_DETAILS;
        }


        return $this;
    } // setTimeDetails()

    /**
     * Sets the value of the [is_active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Event The current object (for fluent API support)
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
            $this->modifiedColumns[] = EventPeer::IS_ACTIVE;
        }


        return $this;
    } // setIsActive()

    /**
     * Sets the value of the [ignore_on_frontpage] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Event The current object (for fluent API support)
     */
    public function setIgnoreOnFrontpage($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->ignore_on_frontpage !== $v) {
            $this->ignore_on_frontpage = $v;
            $this->modifiedColumns[] = EventPeer::IGNORE_ON_FRONTPAGE;
        }


        return $this;
    } // setIgnoreOnFrontpage()

    /**
     * Set the value of [event_type_id] column.
     *
     * @param  int $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setEventTypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->event_type_id !== $v) {
            $this->event_type_id = $v;
            $this->modifiedColumns[] = EventPeer::EVENT_TYPE_ID;
        }

        if ($this->aEventType !== null && $this->aEventType->getId() !== $v) {
            $this->aEventType = null;
        }


        return $this;
    } // setEventTypeId()

    /**
     * Set the value of [service_id] column.
     *
     * @param  int $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setServiceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->service_id !== $v) {
            $this->service_id = $v;
            $this->modifiedColumns[] = EventPeer::SERVICE_ID;
        }

        if ($this->aService !== null && $this->aService->getId() !== $v) {
            $this->aService = null;
        }


        return $this;
    } // setServiceId()

    /**
     * Set the value of [school_class_id] column.
     *
     * @param  int $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setSchoolClassId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->school_class_id !== $v) {
            $this->school_class_id = $v;
            $this->modifiedColumns[] = EventPeer::SCHOOL_CLASS_ID;
        }

        if ($this->aSchoolClass !== null && $this->aSchoolClass->getId() !== $v) {
            $this->aSchoolClass = null;
        }


        return $this;
    } // setSchoolClassId()

    /**
     * Set the value of [gallery_id] column.
     *
     * @param  int $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setGalleryId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->gallery_id !== $v) {
            $this->gallery_id = $v;
            $this->modifiedColumns[] = EventPeer::GALLERY_ID;
        }

        if ($this->aDocumentCategory !== null && $this->aDocumentCategory->getId() !== $v) {
            $this->aDocumentCategory = null;
        }


        return $this;
    } // setGalleryId()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Event The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = EventPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Event The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = EventPeer::UPDATED_AT;
            }
        } // if either are not null


        return $this;
    } // setUpdatedAt()

    /**
     * Set the value of [created_by] column.
     *
     * @param  int $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setCreatedBy($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->created_by !== $v) {
            $this->created_by = $v;
            $this->modifiedColumns[] = EventPeer::CREATED_BY;
        }

        if ($this->aUserRelatedByCreatedBy !== null && $this->aUserRelatedByCreatedBy->getId() !== $v) {
            $this->aUserRelatedByCreatedBy = null;
        }


        return $this;
    } // setCreatedBy()

    /**
     * Set the value of [updated_by] column.
     *
     * @param  int $v new value
     * @return Event The current object (for fluent API support)
     */
    public function setUpdatedBy($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->updated_by !== $v) {
            $this->updated_by = $v;
            $this->modifiedColumns[] = EventPeer::UPDATED_BY;
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
            if ($this->is_active !== false) {
                return false;
            }

            if ($this->ignore_on_frontpage !== false) {
                return false;
            }

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
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->title = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->title_normalized = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->teaser = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            if ($row[$startcol + 4] !== null) {
                $this->body_preview = fopen('php://memory', 'r+');
                fwrite($this->body_preview, $row[$startcol + 4]);
                rewind($this->body_preview);
            } else {
                $this->body_preview = null;
            }
            if ($row[$startcol + 5] !== null) {
                $this->body_review = fopen('php://memory', 'r+');
                fwrite($this->body_review, $row[$startcol + 5]);
                rewind($this->body_review);
            } else {
                $this->body_review = null;
            }
            $this->location_info = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->date_start = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->date_end = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->time_details = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->is_active = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
            $this->ignore_on_frontpage = ($row[$startcol + 11] !== null) ? (boolean) $row[$startcol + 11] : null;
            $this->event_type_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->service_id = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
            $this->school_class_id = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->gallery_id = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->created_at = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->updated_at = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->created_by = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
            $this->updated_by = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 20; // 20 = EventPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Event object", $e);
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

        if ($this->aEventType !== null && $this->event_type_id !== $this->aEventType->getId()) {
            $this->aEventType = null;
        }
        if ($this->aService !== null && $this->service_id !== $this->aService->getId()) {
            $this->aService = null;
        }
        if ($this->aSchoolClass !== null && $this->school_class_id !== $this->aSchoolClass->getId()) {
            $this->aSchoolClass = null;
        }
        if ($this->aDocumentCategory !== null && $this->gallery_id !== $this->aDocumentCategory->getId()) {
            $this->aDocumentCategory = null;
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
            $con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = EventPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aEventType = null;
            $this->aService = null;
            $this->aSchoolClass = null;
            $this->aDocumentCategory = null;
            $this->aUserRelatedByCreatedBy = null;
            $this->aUserRelatedByUpdatedBy = null;
            $this->collEventDocuments = null;

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
            $con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = EventQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // denyable behavior
            if(!(EventPeer::isIgnoringRights() || $this->mayOperate("delete"))) {
                throw new PropelException(new NotPermittedException("delete.by_role", array("role_key" => "events")));
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
            $con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // denyable behavior
                if(!(EventPeer::isIgnoringRights() || $this->mayOperate("insert"))) {
                    throw new PropelException(new NotPermittedException("insert.by_role", array("role_key" => "events")));
                }

                // extended_timestampable behavior
                if (!$this->isColumnModified(EventPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(EventPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
                // attributable behavior

                if(Session::getSession()->isAuthenticated()) {
                    if (!$this->isColumnModified(EventPeer::CREATED_BY)) {
                        $this->setCreatedBy(Session::getSession()->getUser()->getId());
                    }
                    if (!$this->isColumnModified(EventPeer::UPDATED_BY)) {
                        $this->setUpdatedBy(Session::getSession()->getUser()->getId());
                    }
                }

            } else {
                $ret = $ret && $this->preUpdate($con);
                // denyable behavior
                if(!(EventPeer::isIgnoringRights() || $this->mayOperate("update"))) {
                    throw new PropelException(new NotPermittedException("update.by_role", array("role_key" => "events")));
                }

                // extended_timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(EventPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
                // attributable behavior

                if(Session::getSession()->isAuthenticated()) {
                    if ($this->isModified() && !$this->isColumnModified(EventPeer::UPDATED_BY)) {
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
                EventPeer::addInstanceToPool($this);
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
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aEventType !== null) {
                if ($this->aEventType->isModified() || $this->aEventType->isNew()) {
                    $affectedRows += $this->aEventType->save($con);
                }
                $this->setEventType($this->aEventType);
            }

            if ($this->aService !== null) {
                if ($this->aService->isModified() || $this->aService->isNew()) {
                    $affectedRows += $this->aService->save($con);
                }
                $this->setService($this->aService);
            }

            if ($this->aSchoolClass !== null) {
                if ($this->aSchoolClass->isModified() || $this->aSchoolClass->isNew()) {
                    $affectedRows += $this->aSchoolClass->save($con);
                }
                $this->setSchoolClass($this->aSchoolClass);
            }

            if ($this->aDocumentCategory !== null) {
                if ($this->aDocumentCategory->isModified() || $this->aDocumentCategory->isNew()) {
                    $affectedRows += $this->aDocumentCategory->save($con);
                }
                $this->setDocumentCategory($this->aDocumentCategory);
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

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                // Rewind the body_preview LOB column, since PDO does not rewind after inserting value.
                if ($this->body_preview !== null && is_resource($this->body_preview)) {
                    rewind($this->body_preview);
                }

                // Rewind the body_review LOB column, since PDO does not rewind after inserting value.
                if ($this->body_review !== null && is_resource($this->body_review)) {
                    rewind($this->body_review);
                }

                $this->resetModified();
            }

            if ($this->eventDocumentsScheduledForDeletion !== null) {
                if (!$this->eventDocumentsScheduledForDeletion->isEmpty()) {
                    EventDocumentQuery::create()
                        ->filterByPrimaryKeys($this->eventDocumentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->eventDocumentsScheduledForDeletion = null;
                }
            }

            if ($this->collEventDocuments !== null) {
                foreach ($this->collEventDocuments as $referrerFK) {
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

        $this->modifiedColumns[] = EventPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EventPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EventPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(EventPeer::TITLE)) {
            $modifiedColumns[':p' . $index++]  = '`title`';
        }
        if ($this->isColumnModified(EventPeer::TITLE_NORMALIZED)) {
            $modifiedColumns[':p' . $index++]  = '`title_normalized`';
        }
        if ($this->isColumnModified(EventPeer::TEASER)) {
            $modifiedColumns[':p' . $index++]  = '`teaser`';
        }
        if ($this->isColumnModified(EventPeer::BODY_PREVIEW)) {
            $modifiedColumns[':p' . $index++]  = '`body_preview`';
        }
        if ($this->isColumnModified(EventPeer::BODY_REVIEW)) {
            $modifiedColumns[':p' . $index++]  = '`body_review`';
        }
        if ($this->isColumnModified(EventPeer::LOCATION_INFO)) {
            $modifiedColumns[':p' . $index++]  = '`location_info`';
        }
        if ($this->isColumnModified(EventPeer::DATE_START)) {
            $modifiedColumns[':p' . $index++]  = '`date_start`';
        }
        if ($this->isColumnModified(EventPeer::DATE_END)) {
            $modifiedColumns[':p' . $index++]  = '`date_end`';
        }
        if ($this->isColumnModified(EventPeer::TIME_DETAILS)) {
            $modifiedColumns[':p' . $index++]  = '`time_details`';
        }
        if ($this->isColumnModified(EventPeer::IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = '`is_active`';
        }
        if ($this->isColumnModified(EventPeer::IGNORE_ON_FRONTPAGE)) {
            $modifiedColumns[':p' . $index++]  = '`ignore_on_frontpage`';
        }
        if ($this->isColumnModified(EventPeer::EVENT_TYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`event_type_id`';
        }
        if ($this->isColumnModified(EventPeer::SERVICE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`service_id`';
        }
        if ($this->isColumnModified(EventPeer::SCHOOL_CLASS_ID)) {
            $modifiedColumns[':p' . $index++]  = '`school_class_id`';
        }
        if ($this->isColumnModified(EventPeer::GALLERY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`gallery_id`';
        }
        if ($this->isColumnModified(EventPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(EventPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }
        if ($this->isColumnModified(EventPeer::CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`created_by`';
        }
        if ($this->isColumnModified(EventPeer::UPDATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`updated_by`';
        }

        $sql = sprintf(
            'INSERT INTO `events` (%s) VALUES (%s)',
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
                    case '`title`':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case '`title_normalized`':
                        $stmt->bindValue($identifier, $this->title_normalized, PDO::PARAM_STR);
                        break;
                    case '`teaser`':
                        $stmt->bindValue($identifier, $this->teaser, PDO::PARAM_STR);
                        break;
                    case '`body_preview`':
                        if (is_resource($this->body_preview)) {
                            rewind($this->body_preview);
                        }
                        $stmt->bindValue($identifier, $this->body_preview, PDO::PARAM_LOB);
                        break;
                    case '`body_review`':
                        if (is_resource($this->body_review)) {
                            rewind($this->body_review);
                        }
                        $stmt->bindValue($identifier, $this->body_review, PDO::PARAM_LOB);
                        break;
                    case '`location_info`':
                        $stmt->bindValue($identifier, $this->location_info, PDO::PARAM_STR);
                        break;
                    case '`date_start`':
                        $stmt->bindValue($identifier, $this->date_start, PDO::PARAM_STR);
                        break;
                    case '`date_end`':
                        $stmt->bindValue($identifier, $this->date_end, PDO::PARAM_STR);
                        break;
                    case '`time_details`':
                        $stmt->bindValue($identifier, $this->time_details, PDO::PARAM_STR);
                        break;
                    case '`is_active`':
                        $stmt->bindValue($identifier, (int) $this->is_active, PDO::PARAM_INT);
                        break;
                    case '`ignore_on_frontpage`':
                        $stmt->bindValue($identifier, (int) $this->ignore_on_frontpage, PDO::PARAM_INT);
                        break;
                    case '`event_type_id`':
                        $stmt->bindValue($identifier, $this->event_type_id, PDO::PARAM_INT);
                        break;
                    case '`service_id`':
                        $stmt->bindValue($identifier, $this->service_id, PDO::PARAM_INT);
                        break;
                    case '`school_class_id`':
                        $stmt->bindValue($identifier, $this->school_class_id, PDO::PARAM_INT);
                        break;
                    case '`gallery_id`':
                        $stmt->bindValue($identifier, $this->gallery_id, PDO::PARAM_INT);
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
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aEventType !== null) {
                if (!$this->aEventType->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aEventType->getValidationFailures());
                }
            }

            if ($this->aService !== null) {
                if (!$this->aService->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aService->getValidationFailures());
                }
            }

            if ($this->aSchoolClass !== null) {
                if (!$this->aSchoolClass->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSchoolClass->getValidationFailures());
                }
            }

            if ($this->aDocumentCategory !== null) {
                if (!$this->aDocumentCategory->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aDocumentCategory->getValidationFailures());
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


            if (($retval = EventPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collEventDocuments !== null) {
                    foreach ($this->collEventDocuments as $referrerFK) {
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
        $pos = EventPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getTitle();
                break;
            case 2:
                return $this->getTitleNormalized();
                break;
            case 3:
                return $this->getTeaser();
                break;
            case 4:
                return $this->getBodyPreview();
                break;
            case 5:
                return $this->getBodyReview();
                break;
            case 6:
                return $this->getLocationInfo();
                break;
            case 7:
                return $this->getDateStart();
                break;
            case 8:
                return $this->getDateEnd();
                break;
            case 9:
                return $this->getTimeDetails();
                break;
            case 10:
                return $this->getIsActive();
                break;
            case 11:
                return $this->getIgnoreOnFrontpage();
                break;
            case 12:
                return $this->getEventTypeId();
                break;
            case 13:
                return $this->getServiceId();
                break;
            case 14:
                return $this->getSchoolClassId();
                break;
            case 15:
                return $this->getGalleryId();
                break;
            case 16:
                return $this->getCreatedAt();
                break;
            case 17:
                return $this->getUpdatedAt();
                break;
            case 18:
                return $this->getCreatedBy();
                break;
            case 19:
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
        if (isset($alreadyDumpedObjects['Event'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Event'][$this->getPrimaryKey()] = true;
        $keys = EventPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getTitle(),
            $keys[2] => $this->getTitleNormalized(),
            $keys[3] => $this->getTeaser(),
            $keys[4] => $this->getBodyPreview(),
            $keys[5] => $this->getBodyReview(),
            $keys[6] => $this->getLocationInfo(),
            $keys[7] => $this->getDateStart(),
            $keys[8] => $this->getDateEnd(),
            $keys[9] => $this->getTimeDetails(),
            $keys[10] => $this->getIsActive(),
            $keys[11] => $this->getIgnoreOnFrontpage(),
            $keys[12] => $this->getEventTypeId(),
            $keys[13] => $this->getServiceId(),
            $keys[14] => $this->getSchoolClassId(),
            $keys[15] => $this->getGalleryId(),
            $keys[16] => $this->getCreatedAt(),
            $keys[17] => $this->getUpdatedAt(),
            $keys[18] => $this->getCreatedBy(),
            $keys[19] => $this->getUpdatedBy(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aEventType) {
                $result['EventType'] = $this->aEventType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aService) {
                $result['Service'] = $this->aService->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSchoolClass) {
                $result['SchoolClass'] = $this->aSchoolClass->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aDocumentCategory) {
                $result['DocumentCategory'] = $this->aDocumentCategory->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUserRelatedByCreatedBy) {
                $result['UserRelatedByCreatedBy'] = $this->aUserRelatedByCreatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUserRelatedByUpdatedBy) {
                $result['UserRelatedByUpdatedBy'] = $this->aUserRelatedByUpdatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collEventDocuments) {
                $result['EventDocuments'] = $this->collEventDocuments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = EventPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setTitle($value);
                break;
            case 2:
                $this->setTitleNormalized($value);
                break;
            case 3:
                $this->setTeaser($value);
                break;
            case 4:
                $this->setBodyPreview($value);
                break;
            case 5:
                $this->setBodyReview($value);
                break;
            case 6:
                $this->setLocationInfo($value);
                break;
            case 7:
                $this->setDateStart($value);
                break;
            case 8:
                $this->setDateEnd($value);
                break;
            case 9:
                $this->setTimeDetails($value);
                break;
            case 10:
                $this->setIsActive($value);
                break;
            case 11:
                $this->setIgnoreOnFrontpage($value);
                break;
            case 12:
                $this->setEventTypeId($value);
                break;
            case 13:
                $this->setServiceId($value);
                break;
            case 14:
                $this->setSchoolClassId($value);
                break;
            case 15:
                $this->setGalleryId($value);
                break;
            case 16:
                $this->setCreatedAt($value);
                break;
            case 17:
                $this->setUpdatedAt($value);
                break;
            case 18:
                $this->setCreatedBy($value);
                break;
            case 19:
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
        $keys = EventPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setTitle($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTitleNormalized($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setTeaser($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setBodyPreview($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setBodyReview($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLocationInfo($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDateStart($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setDateEnd($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setTimeDetails($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setIsActive($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setIgnoreOnFrontpage($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setEventTypeId($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setServiceId($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setSchoolClassId($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setGalleryId($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setCreatedAt($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setUpdatedAt($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setCreatedBy($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setUpdatedBy($arr[$keys[19]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EventPeer::DATABASE_NAME);

        if ($this->isColumnModified(EventPeer::ID)) $criteria->add(EventPeer::ID, $this->id);
        if ($this->isColumnModified(EventPeer::TITLE)) $criteria->add(EventPeer::TITLE, $this->title);
        if ($this->isColumnModified(EventPeer::TITLE_NORMALIZED)) $criteria->add(EventPeer::TITLE_NORMALIZED, $this->title_normalized);
        if ($this->isColumnModified(EventPeer::TEASER)) $criteria->add(EventPeer::TEASER, $this->teaser);
        if ($this->isColumnModified(EventPeer::BODY_PREVIEW)) $criteria->add(EventPeer::BODY_PREVIEW, $this->body_preview);
        if ($this->isColumnModified(EventPeer::BODY_REVIEW)) $criteria->add(EventPeer::BODY_REVIEW, $this->body_review);
        if ($this->isColumnModified(EventPeer::LOCATION_INFO)) $criteria->add(EventPeer::LOCATION_INFO, $this->location_info);
        if ($this->isColumnModified(EventPeer::DATE_START)) $criteria->add(EventPeer::DATE_START, $this->date_start);
        if ($this->isColumnModified(EventPeer::DATE_END)) $criteria->add(EventPeer::DATE_END, $this->date_end);
        if ($this->isColumnModified(EventPeer::TIME_DETAILS)) $criteria->add(EventPeer::TIME_DETAILS, $this->time_details);
        if ($this->isColumnModified(EventPeer::IS_ACTIVE)) $criteria->add(EventPeer::IS_ACTIVE, $this->is_active);
        if ($this->isColumnModified(EventPeer::IGNORE_ON_FRONTPAGE)) $criteria->add(EventPeer::IGNORE_ON_FRONTPAGE, $this->ignore_on_frontpage);
        if ($this->isColumnModified(EventPeer::EVENT_TYPE_ID)) $criteria->add(EventPeer::EVENT_TYPE_ID, $this->event_type_id);
        if ($this->isColumnModified(EventPeer::SERVICE_ID)) $criteria->add(EventPeer::SERVICE_ID, $this->service_id);
        if ($this->isColumnModified(EventPeer::SCHOOL_CLASS_ID)) $criteria->add(EventPeer::SCHOOL_CLASS_ID, $this->school_class_id);
        if ($this->isColumnModified(EventPeer::GALLERY_ID)) $criteria->add(EventPeer::GALLERY_ID, $this->gallery_id);
        if ($this->isColumnModified(EventPeer::CREATED_AT)) $criteria->add(EventPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(EventPeer::UPDATED_AT)) $criteria->add(EventPeer::UPDATED_AT, $this->updated_at);
        if ($this->isColumnModified(EventPeer::CREATED_BY)) $criteria->add(EventPeer::CREATED_BY, $this->created_by);
        if ($this->isColumnModified(EventPeer::UPDATED_BY)) $criteria->add(EventPeer::UPDATED_BY, $this->updated_by);

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
        $criteria = new Criteria(EventPeer::DATABASE_NAME);
        $criteria->add(EventPeer::ID, $this->id);

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
     * @param object $copyObj An object of Event (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTitle($this->getTitle());
        $copyObj->setTitleNormalized($this->getTitleNormalized());
        $copyObj->setTeaser($this->getTeaser());
        $copyObj->setBodyPreview($this->getBodyPreview());
        $copyObj->setBodyReview($this->getBodyReview());
        $copyObj->setLocationInfo($this->getLocationInfo());
        $copyObj->setDateStart($this->getDateStart());
        $copyObj->setDateEnd($this->getDateEnd());
        $copyObj->setTimeDetails($this->getTimeDetails());
        $copyObj->setIsActive($this->getIsActive());
        $copyObj->setIgnoreOnFrontpage($this->getIgnoreOnFrontpage());
        $copyObj->setEventTypeId($this->getEventTypeId());
        $copyObj->setServiceId($this->getServiceId());
        $copyObj->setSchoolClassId($this->getSchoolClassId());
        $copyObj->setGalleryId($this->getGalleryId());
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

            foreach ($this->getEventDocuments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEventDocument($relObj->copy($deepCopy));
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
     * @return Event Clone of current object.
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
     * @return EventPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new EventPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a EventType object.
     *
     * @param                  EventType $v
     * @return Event The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEventType(EventType $v = null)
    {
        if ($v === null) {
            $this->setEventTypeId(NULL);
        } else {
            $this->setEventTypeId($v->getId());
        }

        $this->aEventType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the EventType object, it will not be re-added.
        if ($v !== null) {
            $v->addEvent($this);
        }


        return $this;
    }


    /**
     * Get the associated EventType object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return EventType The associated EventType object.
     * @throws PropelException
     */
    public function getEventType(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aEventType === null && ($this->event_type_id !== null) && $doQuery) {
            $this->aEventType = EventTypeQuery::create()->findPk($this->event_type_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEventType->addEvents($this);
             */
        }

        return $this->aEventType;
    }

    /**
     * Declares an association between this object and a Service object.
     *
     * @param                  Service $v
     * @return Event The current object (for fluent API support)
     * @throws PropelException
     */
    public function setService(Service $v = null)
    {
        if ($v === null) {
            $this->setServiceId(NULL);
        } else {
            $this->setServiceId($v->getId());
        }

        $this->aService = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Service object, it will not be re-added.
        if ($v !== null) {
            $v->addEvent($this);
        }


        return $this;
    }


    /**
     * Get the associated Service object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Service The associated Service object.
     * @throws PropelException
     */
    public function getService(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aService === null && ($this->service_id !== null) && $doQuery) {
            $this->aService = ServiceQuery::create()->findPk($this->service_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aService->addEvents($this);
             */
        }

        return $this->aService;
    }

    /**
     * Declares an association between this object and a SchoolClass object.
     *
     * @param                  SchoolClass $v
     * @return Event The current object (for fluent API support)
     * @throws PropelException
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
            $v->addEvent($this);
        }


        return $this;
    }


    /**
     * Get the associated SchoolClass object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SchoolClass The associated SchoolClass object.
     * @throws PropelException
     */
    public function getSchoolClass(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSchoolClass === null && ($this->school_class_id !== null) && $doQuery) {
            $this->aSchoolClass = SchoolClassQuery::create()->findPk($this->school_class_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSchoolClass->addEvents($this);
             */
        }

        return $this->aSchoolClass;
    }

    /**
     * Declares an association between this object and a DocumentCategory object.
     *
     * @param                  DocumentCategory $v
     * @return Event The current object (for fluent API support)
     * @throws PropelException
     */
    public function setDocumentCategory(DocumentCategory $v = null)
    {
        if ($v === null) {
            $this->setGalleryId(NULL);
        } else {
            $this->setGalleryId($v->getId());
        }

        $this->aDocumentCategory = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the DocumentCategory object, it will not be re-added.
        if ($v !== null) {
            $v->addEvent($this);
        }


        return $this;
    }


    /**
     * Get the associated DocumentCategory object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return DocumentCategory The associated DocumentCategory object.
     * @throws PropelException
     */
    public function getDocumentCategory(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aDocumentCategory === null && ($this->gallery_id !== null) && $doQuery) {
            $this->aDocumentCategory = DocumentCategoryQuery::create()->findPk($this->gallery_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDocumentCategory->addEvents($this);
             */
        }

        return $this->aDocumentCategory;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return Event The current object (for fluent API support)
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
            $v->addEventRelatedByCreatedBy($this);
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
                $this->aUserRelatedByCreatedBy->addEventsRelatedByCreatedBy($this);
             */
        }

        return $this->aUserRelatedByCreatedBy;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return Event The current object (for fluent API support)
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
            $v->addEventRelatedByUpdatedBy($this);
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
                $this->aUserRelatedByUpdatedBy->addEventsRelatedByUpdatedBy($this);
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
        if ('EventDocument' == $relationName) {
            $this->initEventDocuments();
        }
    }

    /**
     * Clears out the collEventDocuments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Event The current object (for fluent API support)
     * @see        addEventDocuments()
     */
    public function clearEventDocuments()
    {
        $this->collEventDocuments = null; // important to set this to null since that means it is uninitialized
        $this->collEventDocumentsPartial = null;

        return $this;
    }

    /**
     * reset is the collEventDocuments collection loaded partially
     *
     * @return void
     */
    public function resetPartialEventDocuments($v = true)
    {
        $this->collEventDocumentsPartial = $v;
    }

    /**
     * Initializes the collEventDocuments collection.
     *
     * By default this just sets the collEventDocuments collection to an empty array (like clearcollEventDocuments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEventDocuments($overrideExisting = true)
    {
        if (null !== $this->collEventDocuments && !$overrideExisting) {
            return;
        }
        $this->collEventDocuments = new PropelObjectCollection();
        $this->collEventDocuments->setModel('EventDocument');
    }

    /**
     * Gets an array of EventDocument objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Event is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|EventDocument[] List of EventDocument objects
     * @throws PropelException
     */
    public function getEventDocuments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collEventDocumentsPartial && !$this->isNew();
        if (null === $this->collEventDocuments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEventDocuments) {
                // return empty collection
                $this->initEventDocuments();
            } else {
                $collEventDocuments = EventDocumentQuery::create(null, $criteria)
                    ->filterByEvent($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collEventDocumentsPartial && count($collEventDocuments)) {
                      $this->initEventDocuments(false);

                      foreach ($collEventDocuments as $obj) {
                        if (false == $this->collEventDocuments->contains($obj)) {
                          $this->collEventDocuments->append($obj);
                        }
                      }

                      $this->collEventDocumentsPartial = true;
                    }

                    $collEventDocuments->getInternalIterator()->rewind();

                    return $collEventDocuments;
                }

                if ($partial && $this->collEventDocuments) {
                    foreach ($this->collEventDocuments as $obj) {
                        if ($obj->isNew()) {
                            $collEventDocuments[] = $obj;
                        }
                    }
                }

                $this->collEventDocuments = $collEventDocuments;
                $this->collEventDocumentsPartial = false;
            }
        }

        return $this->collEventDocuments;
    }

    /**
     * Sets a collection of EventDocument objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $eventDocuments A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Event The current object (for fluent API support)
     */
    public function setEventDocuments(PropelCollection $eventDocuments, PropelPDO $con = null)
    {
        $eventDocumentsToDelete = $this->getEventDocuments(new Criteria(), $con)->diff($eventDocuments);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->eventDocumentsScheduledForDeletion = clone $eventDocumentsToDelete;

        foreach ($eventDocumentsToDelete as $eventDocumentRemoved) {
            $eventDocumentRemoved->setEvent(null);
        }

        $this->collEventDocuments = null;
        foreach ($eventDocuments as $eventDocument) {
            $this->addEventDocument($eventDocument);
        }

        $this->collEventDocuments = $eventDocuments;
        $this->collEventDocumentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EventDocument objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related EventDocument objects.
     * @throws PropelException
     */
    public function countEventDocuments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collEventDocumentsPartial && !$this->isNew();
        if (null === $this->collEventDocuments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEventDocuments) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEventDocuments());
            }
            $query = EventDocumentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEvent($this)
                ->count($con);
        }

        return count($this->collEventDocuments);
    }

    /**
     * Method called to associate a EventDocument object to this object
     * through the EventDocument foreign key attribute.
     *
     * @param    EventDocument $l EventDocument
     * @return Event The current object (for fluent API support)
     */
    public function addEventDocument(EventDocument $l)
    {
        if ($this->collEventDocuments === null) {
            $this->initEventDocuments();
            $this->collEventDocumentsPartial = true;
        }

        if (!in_array($l, $this->collEventDocuments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddEventDocument($l);

            if ($this->eventDocumentsScheduledForDeletion and $this->eventDocumentsScheduledForDeletion->contains($l)) {
                $this->eventDocumentsScheduledForDeletion->remove($this->eventDocumentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	EventDocument $eventDocument The eventDocument object to add.
     */
    protected function doAddEventDocument($eventDocument)
    {
        $this->collEventDocuments[]= $eventDocument;
        $eventDocument->setEvent($this);
    }

    /**
     * @param	EventDocument $eventDocument The eventDocument object to remove.
     * @return Event The current object (for fluent API support)
     */
    public function removeEventDocument($eventDocument)
    {
        if ($this->getEventDocuments()->contains($eventDocument)) {
            $this->collEventDocuments->remove($this->collEventDocuments->search($eventDocument));
            if (null === $this->eventDocumentsScheduledForDeletion) {
                $this->eventDocumentsScheduledForDeletion = clone $this->collEventDocuments;
                $this->eventDocumentsScheduledForDeletion->clear();
            }
            $this->eventDocumentsScheduledForDeletion[]= clone $eventDocument;
            $eventDocument->setEvent(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Event is new, it will return
     * an empty collection; or if this Event has previously
     * been saved, it will retrieve related EventDocuments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Event.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|EventDocument[] List of EventDocument objects
     */
    public function getEventDocumentsJoinDocument($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EventDocumentQuery::create(null, $criteria);
        $query->joinWith('Document', $join_behavior);

        return $this->getEventDocuments($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Event is new, it will return
     * an empty collection; or if this Event has previously
     * been saved, it will retrieve related EventDocuments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Event.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|EventDocument[] List of EventDocument objects
     */
    public function getEventDocumentsJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EventDocumentQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByCreatedBy', $join_behavior);

        return $this->getEventDocuments($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Event is new, it will return
     * an empty collection; or if this Event has previously
     * been saved, it will retrieve related EventDocuments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Event.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|EventDocument[] List of EventDocument objects
     */
    public function getEventDocumentsJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EventDocumentQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

        return $this->getEventDocuments($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->title = null;
        $this->title_normalized = null;
        $this->teaser = null;
        $this->body_preview = null;
        $this->body_review = null;
        $this->location_info = null;
        $this->date_start = null;
        $this->date_end = null;
        $this->time_details = null;
        $this->is_active = null;
        $this->ignore_on_frontpage = null;
        $this->event_type_id = null;
        $this->service_id = null;
        $this->school_class_id = null;
        $this->gallery_id = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->created_by = null;
        $this->updated_by = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
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
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collEventDocuments) {
                foreach ($this->collEventDocuments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aEventType instanceof Persistent) {
              $this->aEventType->clearAllReferences($deep);
            }
            if ($this->aService instanceof Persistent) {
              $this->aService->clearAllReferences($deep);
            }
            if ($this->aSchoolClass instanceof Persistent) {
              $this->aSchoolClass->clearAllReferences($deep);
            }
            if ($this->aDocumentCategory instanceof Persistent) {
              $this->aDocumentCategory->clearAllReferences($deep);
            }
            if ($this->aUserRelatedByCreatedBy instanceof Persistent) {
              $this->aUserRelatedByCreatedBy->clearAllReferences($deep);
            }
            if ($this->aUserRelatedByUpdatedBy instanceof Persistent) {
              $this->aUserRelatedByUpdatedBy->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collEventDocuments instanceof PropelCollection) {
            $this->collEventDocuments->clearIterator();
        }
        $this->collEventDocuments = null;
        $this->aEventType = null;
        $this->aService = null;
        $this->aSchoolClass = null;
        $this->aDocumentCategory = null;
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
        return (string) $this->exportTo(EventPeer::DEFAULT_STRING_FORMAT);
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
        if($oUser && ($this->isNew() || $this->getCreatedBy() === $oUser->getId()) && EventPeer::mayOperateOnOwn($oUser, $this, $sOperation)) {
            $bIsAllowed = true;
        } else if(EventPeer::mayOperateOn($oUser, $this, $sOperation)) {
            $bIsAllowed = true;
        }
        FilterModule::getFilters()->handleEventOperationCheck($sOperation, $this, $oUser, array(&$bIsAllowed));
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
     * @return     Event The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = EventPeer::UPDATED_AT;

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
     * @return     Event The current object (for fluent API support)
     */
    public function keepUpdateUserUnchanged()
    {
        $this->modifiedColumns[] = EventPeer::UPDATED_BY;
        return $this;
    }

    // extended_keyable behavior

    /**
     * @return the primary key as an array (even for non-composite keys)
     */
    public function getPKArray()
    {
        return array($this->getPrimaryKey());
    }

    /**
     * @return the composite primary key as a string, separated by _
     */
    public function getPKString()
    {
        return implode("", $this->getPKArray());
    }

}
