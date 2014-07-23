<?php


/**
 * Base class that represents a row from the 'school_classes' table.
 *
 *
 *
 * @package    propel.generator.model.om
 */
abstract class BaseSchoolClass extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'SchoolClassPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SchoolClassPeer
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
     * The value for the original_id field.
     * @var        int
     */
    protected $original_id;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the unit_name field.
     * @var        string
     */
    protected $unit_name;

    /**
     * The value for the slug field.
     * @var        string
     */
    protected $slug;

    /**
     * The value for the year field.
     * @var        int
     */
    protected $year;

    /**
     * The value for the level field.
     * @var        int
     */
    protected $level;

    /**
     * The value for the room_number field.
     * @var        string
     */
    protected $room_number;

    /**
     * The value for the teaching_unit field.
     * @var        string
     */
    protected $teaching_unit;

    /**
     * The value for the student_count field.
     * @var        int
     */
    protected $student_count;

    /**
     * The value for the class_portrait_id field.
     * @var        int
     */
    protected $class_portrait_id;

    /**
     * The value for the subject_id field.
     * @var        int
     */
    protected $subject_id;

    /**
     * The value for the class_type_id field.
     * @var        int
     */
    protected $class_type_id;

    /**
     * The value for the class_schedule_id field.
     * @var        int
     */
    protected $class_schedule_id;

    /**
     * The value for the week_schedule_id field.
     * @var        int
     */
    protected $week_schedule_id;

    /**
     * The value for the school_building_id field.
     * @var        int
     */
    protected $school_building_id;

    /**
     * The value for the school_id field.
     * @var        int
     */
    protected $school_id;

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
    protected $aDocumentRelatedByClassPortraitId;

    /**
     * @var        Subject
     */
    protected $aSubject;

    /**
     * @var        ClassType
     */
    protected $aClassType;

    /**
     * @var        Document
     */
    protected $aDocumentRelatedByClassScheduleId;

    /**
     * @var        Document
     */
    protected $aDocumentRelatedByWeekScheduleId;

    /**
     * @var        SchoolBuilding
     */
    protected $aSchoolBuilding;

    /**
     * @var        School
     */
    protected $aSchool;

    /**
     * @var        User
     */
    protected $aUserRelatedByCreatedBy;

    /**
     * @var        User
     */
    protected $aUserRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|SchoolClassSubjectClasses[] Collection to store aggregation of SchoolClassSubjectClasses objects.
     */
    protected $collSchoolClassSubjectClassessRelatedBySchoolClassId;
    protected $collSchoolClassSubjectClassessRelatedBySchoolClassIdPartial;

    /**
     * @var        PropelObjectCollection|SchoolClassSubjectClasses[] Collection to store aggregation of SchoolClassSubjectClasses objects.
     */
    protected $collSchoolClassSubjectClassessRelatedBySubjectClassId;
    protected $collSchoolClassSubjectClassessRelatedBySubjectClassIdPartial;

    /**
     * @var        PropelObjectCollection|ClassStudent[] Collection to store aggregation of ClassStudent objects.
     */
    protected $collClassStudents;
    protected $collClassStudentsPartial;

    /**
     * @var        PropelObjectCollection|ClassLink[] Collection to store aggregation of ClassLink objects.
     */
    protected $collClassLinks;
    protected $collClassLinksPartial;

    /**
     * @var        PropelObjectCollection|ClassDocument[] Collection to store aggregation of ClassDocument objects.
     */
    protected $collClassDocuments;
    protected $collClassDocumentsPartial;

    /**
     * @var        PropelObjectCollection|ClassTeacher[] Collection to store aggregation of ClassTeacher objects.
     */
    protected $collClassTeachers;
    protected $collClassTeachersPartial;

    /**
     * @var        PropelObjectCollection|Event[] Collection to store aggregation of Event objects.
     */
    protected $collEvents;
    protected $collEventsPartial;

    /**
     * @var        PropelObjectCollection|News[] Collection to store aggregation of News objects.
     */
    protected $collNewss;
    protected $collNewssPartial;

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
    protected $schoolClassSubjectClassessRelatedBySchoolClassIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $schoolClassSubjectClassessRelatedBySubjectClassIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $classStudentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $classLinksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $classDocumentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $classTeachersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $eventsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $newssScheduledForDeletion = null;

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
     * @return int
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
     * Get the [unit_name] column value.
     *
     * @return string
     */
    public function getUnitName()
    {

        return $this->unit_name;
    }

    /**
     * Get the [slug] column value.
     *
     * @return string
     */
    public function getSlug()
    {

        return $this->slug;
    }

    /**
     * Get the [year] column value.
     *
     * @return int
     */
    public function getYear()
    {

        return $this->year;
    }

    /**
     * Get the [level] column value.
     * Jahrgang
     * @return int
     */
    public function getLevel()
    {

        return $this->level;
    }

    /**
     * Get the [room_number] column value.
     *
     * @return string
     */
    public function getRoomNumber()
    {

        return $this->room_number;
    }

    /**
     * Get the [teaching_unit] column value.
     *
     * @return string
     */
    public function getTeachingUnit()
    {

        return $this->teaching_unit;
    }

    /**
     * Get the [student_count] column value.
     *
     * @return int
     */
    public function getStudentCount()
    {

        return $this->student_count;
    }

    /**
     * Get the [class_portrait_id] column value.
     *
     * @return int
     */
    public function getClassPortraitId()
    {

        return $this->class_portrait_id;
    }

    /**
     * Get the [subject_id] column value.
     *
     * @return int
     */
    public function getSubjectId()
    {

        return $this->subject_id;
    }

    /**
     * Get the [class_type_id] column value.
     *
     * @return int
     */
    public function getClassTypeId()
    {

        return $this->class_type_id;
    }

    /**
     * Get the [class_schedule_id] column value.
     *
     * @return int
     */
    public function getClassScheduleId()
    {

        return $this->class_schedule_id;
    }

    /**
     * Get the [week_schedule_id] column value.
     *
     * @return int
     */
    public function getWeekScheduleId()
    {

        return $this->week_schedule_id;
    }

    /**
     * Get the [school_building_id] column value.
     *
     * @return int
     */
    public function getSchoolBuildingId()
    {

        return $this->school_building_id;
    }

    /**
     * Get the [school_id] column value.
     *
     * @return int
     */
    public function getSchoolId()
    {

        return $this->school_id;
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
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = SchoolClassPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [original_id] column.
     *
     * @param  int $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setOriginalId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->original_id !== $v) {
            $this->original_id = $v;
            $this->modifiedColumns[] = SchoolClassPeer::ORIGINAL_ID;
        }


        return $this;
    } // setOriginalId()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = SchoolClassPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [unit_name] column.
     *
     * @param  string $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setUnitName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->unit_name !== $v) {
            $this->unit_name = $v;
            $this->modifiedColumns[] = SchoolClassPeer::UNIT_NAME;
        }


        return $this;
    } // setUnitName()

    /**
     * Set the value of [slug] column.
     *
     * @param  string $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setSlug($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->slug !== $v) {
            $this->slug = $v;
            $this->modifiedColumns[] = SchoolClassPeer::SLUG;
        }


        return $this;
    } // setSlug()

    /**
     * Set the value of [year] column.
     *
     * @param  int $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setYear($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->year !== $v) {
            $this->year = $v;
            $this->modifiedColumns[] = SchoolClassPeer::YEAR;
        }


        return $this;
    } // setYear()

    /**
     * Set the value of [level] column.
     * Jahrgang
     * @param  int $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setLevel($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->level !== $v) {
            $this->level = $v;
            $this->modifiedColumns[] = SchoolClassPeer::LEVEL;
        }


        return $this;
    } // setLevel()

    /**
     * Set the value of [room_number] column.
     *
     * @param  string $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setRoomNumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->room_number !== $v) {
            $this->room_number = $v;
            $this->modifiedColumns[] = SchoolClassPeer::ROOM_NUMBER;
        }


        return $this;
    } // setRoomNumber()

    /**
     * Set the value of [teaching_unit] column.
     *
     * @param  string $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setTeachingUnit($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->teaching_unit !== $v) {
            $this->teaching_unit = $v;
            $this->modifiedColumns[] = SchoolClassPeer::TEACHING_UNIT;
        }


        return $this;
    } // setTeachingUnit()

    /**
     * Set the value of [student_count] column.
     *
     * @param  int $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setStudentCount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->student_count !== $v) {
            $this->student_count = $v;
            $this->modifiedColumns[] = SchoolClassPeer::STUDENT_COUNT;
        }


        return $this;
    } // setStudentCount()

    /**
     * Set the value of [class_portrait_id] column.
     *
     * @param  int $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setClassPortraitId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->class_portrait_id !== $v) {
            $this->class_portrait_id = $v;
            $this->modifiedColumns[] = SchoolClassPeer::CLASS_PORTRAIT_ID;
        }

        if ($this->aDocumentRelatedByClassPortraitId !== null && $this->aDocumentRelatedByClassPortraitId->getId() !== $v) {
            $this->aDocumentRelatedByClassPortraitId = null;
        }


        return $this;
    } // setClassPortraitId()

    /**
     * Set the value of [subject_id] column.
     *
     * @param  int $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setSubjectId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->subject_id !== $v) {
            $this->subject_id = $v;
            $this->modifiedColumns[] = SchoolClassPeer::SUBJECT_ID;
        }

        if ($this->aSubject !== null && $this->aSubject->getId() !== $v) {
            $this->aSubject = null;
        }


        return $this;
    } // setSubjectId()

    /**
     * Set the value of [class_type_id] column.
     *
     * @param  int $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setClassTypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->class_type_id !== $v) {
            $this->class_type_id = $v;
            $this->modifiedColumns[] = SchoolClassPeer::CLASS_TYPE_ID;
        }

        if ($this->aClassType !== null && $this->aClassType->getId() !== $v) {
            $this->aClassType = null;
        }


        return $this;
    } // setClassTypeId()

    /**
     * Set the value of [class_schedule_id] column.
     *
     * @param  int $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setClassScheduleId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->class_schedule_id !== $v) {
            $this->class_schedule_id = $v;
            $this->modifiedColumns[] = SchoolClassPeer::CLASS_SCHEDULE_ID;
        }

        if ($this->aDocumentRelatedByClassScheduleId !== null && $this->aDocumentRelatedByClassScheduleId->getId() !== $v) {
            $this->aDocumentRelatedByClassScheduleId = null;
        }


        return $this;
    } // setClassScheduleId()

    /**
     * Set the value of [week_schedule_id] column.
     *
     * @param  int $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setWeekScheduleId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->week_schedule_id !== $v) {
            $this->week_schedule_id = $v;
            $this->modifiedColumns[] = SchoolClassPeer::WEEK_SCHEDULE_ID;
        }

        if ($this->aDocumentRelatedByWeekScheduleId !== null && $this->aDocumentRelatedByWeekScheduleId->getId() !== $v) {
            $this->aDocumentRelatedByWeekScheduleId = null;
        }


        return $this;
    } // setWeekScheduleId()

    /**
     * Set the value of [school_building_id] column.
     *
     * @param  int $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setSchoolBuildingId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->school_building_id !== $v) {
            $this->school_building_id = $v;
            $this->modifiedColumns[] = SchoolClassPeer::SCHOOL_BUILDING_ID;
        }

        if ($this->aSchoolBuilding !== null && $this->aSchoolBuilding->getId() !== $v) {
            $this->aSchoolBuilding = null;
        }


        return $this;
    } // setSchoolBuildingId()

    /**
     * Set the value of [school_id] column.
     *
     * @param  int $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setSchoolId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->school_id !== $v) {
            $this->school_id = $v;
            $this->modifiedColumns[] = SchoolClassPeer::SCHOOL_ID;
        }

        if ($this->aSchool !== null && $this->aSchool->getId() !== $v) {
            $this->aSchool = null;
        }


        return $this;
    } // setSchoolId()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = SchoolClassPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = SchoolClassPeer::UPDATED_AT;
            }
        } // if either are not null


        return $this;
    } // setUpdatedAt()

    /**
     * Set the value of [created_by] column.
     *
     * @param  int $v new value
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setCreatedBy($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->created_by !== $v) {
            $this->created_by = $v;
            $this->modifiedColumns[] = SchoolClassPeer::CREATED_BY;
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
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setUpdatedBy($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->updated_by !== $v) {
            $this->updated_by = $v;
            $this->modifiedColumns[] = SchoolClassPeer::UPDATED_BY;
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
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->original_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->unit_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->slug = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->year = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->level = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->room_number = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->teaching_unit = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->student_count = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->class_portrait_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->subject_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->class_type_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->class_schedule_id = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
            $this->week_schedule_id = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->school_building_id = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->school_id = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
            $this->created_at = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->updated_at = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->created_by = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
            $this->updated_by = ($row[$startcol + 20] !== null) ? (int) $row[$startcol + 20] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 21; // 21 = SchoolClassPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating SchoolClass object", $e);
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

        if ($this->aDocumentRelatedByClassPortraitId !== null && $this->class_portrait_id !== $this->aDocumentRelatedByClassPortraitId->getId()) {
            $this->aDocumentRelatedByClassPortraitId = null;
        }
        if ($this->aSubject !== null && $this->subject_id !== $this->aSubject->getId()) {
            $this->aSubject = null;
        }
        if ($this->aClassType !== null && $this->class_type_id !== $this->aClassType->getId()) {
            $this->aClassType = null;
        }
        if ($this->aDocumentRelatedByClassScheduleId !== null && $this->class_schedule_id !== $this->aDocumentRelatedByClassScheduleId->getId()) {
            $this->aDocumentRelatedByClassScheduleId = null;
        }
        if ($this->aDocumentRelatedByWeekScheduleId !== null && $this->week_schedule_id !== $this->aDocumentRelatedByWeekScheduleId->getId()) {
            $this->aDocumentRelatedByWeekScheduleId = null;
        }
        if ($this->aSchoolBuilding !== null && $this->school_building_id !== $this->aSchoolBuilding->getId()) {
            $this->aSchoolBuilding = null;
        }
        if ($this->aSchool !== null && $this->school_id !== $this->aSchool->getId()) {
            $this->aSchool = null;
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
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SchoolClassPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aDocumentRelatedByClassPortraitId = null;
            $this->aSubject = null;
            $this->aClassType = null;
            $this->aDocumentRelatedByClassScheduleId = null;
            $this->aDocumentRelatedByWeekScheduleId = null;
            $this->aSchoolBuilding = null;
            $this->aSchool = null;
            $this->aUserRelatedByCreatedBy = null;
            $this->aUserRelatedByUpdatedBy = null;
            $this->collSchoolClassSubjectClassessRelatedBySchoolClassId = null;

            $this->collSchoolClassSubjectClassessRelatedBySubjectClassId = null;

            $this->collClassStudents = null;

            $this->collClassLinks = null;

            $this->collClassDocuments = null;

            $this->collClassTeachers = null;

            $this->collEvents = null;

            $this->collNewss = null;

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
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SchoolClassQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // denyable behavior
            if(!(SchoolClassPeer::isIgnoringRights() || $this->mayOperate("delete"))) {
                throw new PropelException(new NotPermittedException("delete.by_role", array("role_key" => "school_classes")));
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
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // extended_timestampable behavior
                if (!$this->isColumnModified(SchoolClassPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SchoolClassPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
                // attributable behavior

                if(Session::getSession()->isAuthenticated()) {
                    if (!$this->isColumnModified(SchoolClassPeer::CREATED_BY)) {
                        $this->setCreatedBy(Session::getSession()->getUser()->getId());
                    }
                    if (!$this->isColumnModified(SchoolClassPeer::UPDATED_BY)) {
                        $this->setUpdatedBy(Session::getSession()->getUser()->getId());
                    }
                }

                // denyable behavior
                if(!(SchoolClassPeer::isIgnoringRights() || $this->mayOperate("insert"))) {
                    throw new PropelException(new NotPermittedException("insert.by_role", array("role_key" => "school_classes")));
                }

            } else {
                $ret = $ret && $this->preUpdate($con);
                // extended_timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SchoolClassPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
                // attributable behavior

                if(Session::getSession()->isAuthenticated()) {
                    if ($this->isModified() && !$this->isColumnModified(SchoolClassPeer::UPDATED_BY)) {
                        $this->setUpdatedBy(Session::getSession()->getUser()->getId());
                    }
                }
                // denyable behavior
                if(!(SchoolClassPeer::isIgnoringRights() || $this->mayOperate("update"))) {
                    throw new PropelException(new NotPermittedException("update.by_role", array("role_key" => "school_classes")));
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
                SchoolClassPeer::addInstanceToPool($this);
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

            if ($this->aDocumentRelatedByClassPortraitId !== null) {
                if ($this->aDocumentRelatedByClassPortraitId->isModified() || $this->aDocumentRelatedByClassPortraitId->isNew()) {
                    $affectedRows += $this->aDocumentRelatedByClassPortraitId->save($con);
                }
                $this->setDocumentRelatedByClassPortraitId($this->aDocumentRelatedByClassPortraitId);
            }

            if ($this->aSubject !== null) {
                if ($this->aSubject->isModified() || $this->aSubject->isNew()) {
                    $affectedRows += $this->aSubject->save($con);
                }
                $this->setSubject($this->aSubject);
            }

            if ($this->aClassType !== null) {
                if ($this->aClassType->isModified() || $this->aClassType->isNew()) {
                    $affectedRows += $this->aClassType->save($con);
                }
                $this->setClassType($this->aClassType);
            }

            if ($this->aDocumentRelatedByClassScheduleId !== null) {
                if ($this->aDocumentRelatedByClassScheduleId->isModified() || $this->aDocumentRelatedByClassScheduleId->isNew()) {
                    $affectedRows += $this->aDocumentRelatedByClassScheduleId->save($con);
                }
                $this->setDocumentRelatedByClassScheduleId($this->aDocumentRelatedByClassScheduleId);
            }

            if ($this->aDocumentRelatedByWeekScheduleId !== null) {
                if ($this->aDocumentRelatedByWeekScheduleId->isModified() || $this->aDocumentRelatedByWeekScheduleId->isNew()) {
                    $affectedRows += $this->aDocumentRelatedByWeekScheduleId->save($con);
                }
                $this->setDocumentRelatedByWeekScheduleId($this->aDocumentRelatedByWeekScheduleId);
            }

            if ($this->aSchoolBuilding !== null) {
                if ($this->aSchoolBuilding->isModified() || $this->aSchoolBuilding->isNew()) {
                    $affectedRows += $this->aSchoolBuilding->save($con);
                }
                $this->setSchoolBuilding($this->aSchoolBuilding);
            }

            if ($this->aSchool !== null) {
                if ($this->aSchool->isModified() || $this->aSchool->isNew()) {
                    $affectedRows += $this->aSchool->save($con);
                }
                $this->setSchool($this->aSchool);
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
                $this->resetModified();
            }

            if ($this->schoolClassSubjectClassessRelatedBySchoolClassIdScheduledForDeletion !== null) {
                if (!$this->schoolClassSubjectClassessRelatedBySchoolClassIdScheduledForDeletion->isEmpty()) {
                    SchoolClassSubjectClassesQuery::create()
                        ->filterByPrimaryKeys($this->schoolClassSubjectClassessRelatedBySchoolClassIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->schoolClassSubjectClassessRelatedBySchoolClassIdScheduledForDeletion = null;
                }
            }

            if ($this->collSchoolClassSubjectClassessRelatedBySchoolClassId !== null) {
                foreach ($this->collSchoolClassSubjectClassessRelatedBySchoolClassId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->schoolClassSubjectClassessRelatedBySubjectClassIdScheduledForDeletion !== null) {
                if (!$this->schoolClassSubjectClassessRelatedBySubjectClassIdScheduledForDeletion->isEmpty()) {
                    SchoolClassSubjectClassesQuery::create()
                        ->filterByPrimaryKeys($this->schoolClassSubjectClassessRelatedBySubjectClassIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->schoolClassSubjectClassessRelatedBySubjectClassIdScheduledForDeletion = null;
                }
            }

            if ($this->collSchoolClassSubjectClassessRelatedBySubjectClassId !== null) {
                foreach ($this->collSchoolClassSubjectClassessRelatedBySubjectClassId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->classStudentsScheduledForDeletion !== null) {
                if (!$this->classStudentsScheduledForDeletion->isEmpty()) {
                    ClassStudentQuery::create()
                        ->filterByPrimaryKeys($this->classStudentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->classStudentsScheduledForDeletion = null;
                }
            }

            if ($this->collClassStudents !== null) {
                foreach ($this->collClassStudents as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->classLinksScheduledForDeletion !== null) {
                if (!$this->classLinksScheduledForDeletion->isEmpty()) {
                    ClassLinkQuery::create()
                        ->filterByPrimaryKeys($this->classLinksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->classLinksScheduledForDeletion = null;
                }
            }

            if ($this->collClassLinks !== null) {
                foreach ($this->collClassLinks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->classDocumentsScheduledForDeletion !== null) {
                if (!$this->classDocumentsScheduledForDeletion->isEmpty()) {
                    ClassDocumentQuery::create()
                        ->filterByPrimaryKeys($this->classDocumentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->classDocumentsScheduledForDeletion = null;
                }
            }

            if ($this->collClassDocuments !== null) {
                foreach ($this->collClassDocuments as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->classTeachersScheduledForDeletion !== null) {
                if (!$this->classTeachersScheduledForDeletion->isEmpty()) {
                    ClassTeacherQuery::create()
                        ->filterByPrimaryKeys($this->classTeachersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->classTeachersScheduledForDeletion = null;
                }
            }

            if ($this->collClassTeachers !== null) {
                foreach ($this->collClassTeachers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->eventsScheduledForDeletion !== null) {
                if (!$this->eventsScheduledForDeletion->isEmpty()) {
                    EventQuery::create()
                        ->filterByPrimaryKeys($this->eventsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->eventsScheduledForDeletion = null;
                }
            }

            if ($this->collEvents !== null) {
                foreach ($this->collEvents as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->newssScheduledForDeletion !== null) {
                if (!$this->newssScheduledForDeletion->isEmpty()) {
                    NewsQuery::create()
                        ->filterByPrimaryKeys($this->newssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->newssScheduledForDeletion = null;
                }
            }

            if ($this->collNewss !== null) {
                foreach ($this->collNewss as $referrerFK) {
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

        $this->modifiedColumns[] = SchoolClassPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SchoolClassPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SchoolClassPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(SchoolClassPeer::ORIGINAL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`original_id`';
        }
        if ($this->isColumnModified(SchoolClassPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(SchoolClassPeer::UNIT_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`unit_name`';
        }
        if ($this->isColumnModified(SchoolClassPeer::SLUG)) {
            $modifiedColumns[':p' . $index++]  = '`slug`';
        }
        if ($this->isColumnModified(SchoolClassPeer::YEAR)) {
            $modifiedColumns[':p' . $index++]  = '`year`';
        }
        if ($this->isColumnModified(SchoolClassPeer::LEVEL)) {
            $modifiedColumns[':p' . $index++]  = '`level`';
        }
        if ($this->isColumnModified(SchoolClassPeer::ROOM_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = '`room_number`';
        }
        if ($this->isColumnModified(SchoolClassPeer::TEACHING_UNIT)) {
            $modifiedColumns[':p' . $index++]  = '`teaching_unit`';
        }
        if ($this->isColumnModified(SchoolClassPeer::STUDENT_COUNT)) {
            $modifiedColumns[':p' . $index++]  = '`student_count`';
        }
        if ($this->isColumnModified(SchoolClassPeer::CLASS_PORTRAIT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`class_portrait_id`';
        }
        if ($this->isColumnModified(SchoolClassPeer::SUBJECT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`subject_id`';
        }
        if ($this->isColumnModified(SchoolClassPeer::CLASS_TYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`class_type_id`';
        }
        if ($this->isColumnModified(SchoolClassPeer::CLASS_SCHEDULE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`class_schedule_id`';
        }
        if ($this->isColumnModified(SchoolClassPeer::WEEK_SCHEDULE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`week_schedule_id`';
        }
        if ($this->isColumnModified(SchoolClassPeer::SCHOOL_BUILDING_ID)) {
            $modifiedColumns[':p' . $index++]  = '`school_building_id`';
        }
        if ($this->isColumnModified(SchoolClassPeer::SCHOOL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`school_id`';
        }
        if ($this->isColumnModified(SchoolClassPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(SchoolClassPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }
        if ($this->isColumnModified(SchoolClassPeer::CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`created_by`';
        }
        if ($this->isColumnModified(SchoolClassPeer::UPDATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`updated_by`';
        }

        $sql = sprintf(
            'INSERT INTO `school_classes` (%s) VALUES (%s)',
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
                        $stmt->bindValue($identifier, $this->original_id, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`unit_name`':
                        $stmt->bindValue($identifier, $this->unit_name, PDO::PARAM_STR);
                        break;
                    case '`slug`':
                        $stmt->bindValue($identifier, $this->slug, PDO::PARAM_STR);
                        break;
                    case '`year`':
                        $stmt->bindValue($identifier, $this->year, PDO::PARAM_INT);
                        break;
                    case '`level`':
                        $stmt->bindValue($identifier, $this->level, PDO::PARAM_INT);
                        break;
                    case '`room_number`':
                        $stmt->bindValue($identifier, $this->room_number, PDO::PARAM_STR);
                        break;
                    case '`teaching_unit`':
                        $stmt->bindValue($identifier, $this->teaching_unit, PDO::PARAM_STR);
                        break;
                    case '`student_count`':
                        $stmt->bindValue($identifier, $this->student_count, PDO::PARAM_INT);
                        break;
                    case '`class_portrait_id`':
                        $stmt->bindValue($identifier, $this->class_portrait_id, PDO::PARAM_INT);
                        break;
                    case '`subject_id`':
                        $stmt->bindValue($identifier, $this->subject_id, PDO::PARAM_INT);
                        break;
                    case '`class_type_id`':
                        $stmt->bindValue($identifier, $this->class_type_id, PDO::PARAM_INT);
                        break;
                    case '`class_schedule_id`':
                        $stmt->bindValue($identifier, $this->class_schedule_id, PDO::PARAM_INT);
                        break;
                    case '`week_schedule_id`':
                        $stmt->bindValue($identifier, $this->week_schedule_id, PDO::PARAM_INT);
                        break;
                    case '`school_building_id`':
                        $stmt->bindValue($identifier, $this->school_building_id, PDO::PARAM_INT);
                        break;
                    case '`school_id`':
                        $stmt->bindValue($identifier, $this->school_id, PDO::PARAM_INT);
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

            if ($this->aDocumentRelatedByClassPortraitId !== null) {
                if (!$this->aDocumentRelatedByClassPortraitId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aDocumentRelatedByClassPortraitId->getValidationFailures());
                }
            }

            if ($this->aSubject !== null) {
                if (!$this->aSubject->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSubject->getValidationFailures());
                }
            }

            if ($this->aClassType !== null) {
                if (!$this->aClassType->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aClassType->getValidationFailures());
                }
            }

            if ($this->aDocumentRelatedByClassScheduleId !== null) {
                if (!$this->aDocumentRelatedByClassScheduleId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aDocumentRelatedByClassScheduleId->getValidationFailures());
                }
            }

            if ($this->aDocumentRelatedByWeekScheduleId !== null) {
                if (!$this->aDocumentRelatedByWeekScheduleId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aDocumentRelatedByWeekScheduleId->getValidationFailures());
                }
            }

            if ($this->aSchoolBuilding !== null) {
                if (!$this->aSchoolBuilding->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSchoolBuilding->getValidationFailures());
                }
            }

            if ($this->aSchool !== null) {
                if (!$this->aSchool->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSchool->getValidationFailures());
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


            if (($retval = SchoolClassPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSchoolClassSubjectClassessRelatedBySchoolClassId !== null) {
                    foreach ($this->collSchoolClassSubjectClassessRelatedBySchoolClassId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSchoolClassSubjectClassessRelatedBySubjectClassId !== null) {
                    foreach ($this->collSchoolClassSubjectClassessRelatedBySubjectClassId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collClassStudents !== null) {
                    foreach ($this->collClassStudents as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collClassLinks !== null) {
                    foreach ($this->collClassLinks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collClassDocuments !== null) {
                    foreach ($this->collClassDocuments as $referrerFK) {
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

                if ($this->collEvents !== null) {
                    foreach ($this->collEvents as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collNewss !== null) {
                    foreach ($this->collNewss as $referrerFK) {
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
        $pos = SchoolClassPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getUnitName();
                break;
            case 4:
                return $this->getSlug();
                break;
            case 5:
                return $this->getYear();
                break;
            case 6:
                return $this->getLevel();
                break;
            case 7:
                return $this->getRoomNumber();
                break;
            case 8:
                return $this->getTeachingUnit();
                break;
            case 9:
                return $this->getStudentCount();
                break;
            case 10:
                return $this->getClassPortraitId();
                break;
            case 11:
                return $this->getSubjectId();
                break;
            case 12:
                return $this->getClassTypeId();
                break;
            case 13:
                return $this->getClassScheduleId();
                break;
            case 14:
                return $this->getWeekScheduleId();
                break;
            case 15:
                return $this->getSchoolBuildingId();
                break;
            case 16:
                return $this->getSchoolId();
                break;
            case 17:
                return $this->getCreatedAt();
                break;
            case 18:
                return $this->getUpdatedAt();
                break;
            case 19:
                return $this->getCreatedBy();
                break;
            case 20:
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
        if (isset($alreadyDumpedObjects['SchoolClass'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SchoolClass'][$this->getPrimaryKey()] = true;
        $keys = SchoolClassPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getOriginalId(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getUnitName(),
            $keys[4] => $this->getSlug(),
            $keys[5] => $this->getYear(),
            $keys[6] => $this->getLevel(),
            $keys[7] => $this->getRoomNumber(),
            $keys[8] => $this->getTeachingUnit(),
            $keys[9] => $this->getStudentCount(),
            $keys[10] => $this->getClassPortraitId(),
            $keys[11] => $this->getSubjectId(),
            $keys[12] => $this->getClassTypeId(),
            $keys[13] => $this->getClassScheduleId(),
            $keys[14] => $this->getWeekScheduleId(),
            $keys[15] => $this->getSchoolBuildingId(),
            $keys[16] => $this->getSchoolId(),
            $keys[17] => $this->getCreatedAt(),
            $keys[18] => $this->getUpdatedAt(),
            $keys[19] => $this->getCreatedBy(),
            $keys[20] => $this->getUpdatedBy(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aDocumentRelatedByClassPortraitId) {
                $result['DocumentRelatedByClassPortraitId'] = $this->aDocumentRelatedByClassPortraitId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSubject) {
                $result['Subject'] = $this->aSubject->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aClassType) {
                $result['ClassType'] = $this->aClassType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aDocumentRelatedByClassScheduleId) {
                $result['DocumentRelatedByClassScheduleId'] = $this->aDocumentRelatedByClassScheduleId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aDocumentRelatedByWeekScheduleId) {
                $result['DocumentRelatedByWeekScheduleId'] = $this->aDocumentRelatedByWeekScheduleId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSchoolBuilding) {
                $result['SchoolBuilding'] = $this->aSchoolBuilding->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSchool) {
                $result['School'] = $this->aSchool->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUserRelatedByCreatedBy) {
                $result['UserRelatedByCreatedBy'] = $this->aUserRelatedByCreatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUserRelatedByUpdatedBy) {
                $result['UserRelatedByUpdatedBy'] = $this->aUserRelatedByUpdatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSchoolClassSubjectClassessRelatedBySchoolClassId) {
                $result['SchoolClassSubjectClassessRelatedBySchoolClassId'] = $this->collSchoolClassSubjectClassessRelatedBySchoolClassId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSchoolClassSubjectClassessRelatedBySubjectClassId) {
                $result['SchoolClassSubjectClassessRelatedBySubjectClassId'] = $this->collSchoolClassSubjectClassessRelatedBySubjectClassId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collClassStudents) {
                $result['ClassStudents'] = $this->collClassStudents->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collClassLinks) {
                $result['ClassLinks'] = $this->collClassLinks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collClassDocuments) {
                $result['ClassDocuments'] = $this->collClassDocuments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collClassTeachers) {
                $result['ClassTeachers'] = $this->collClassTeachers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEvents) {
                $result['Events'] = $this->collEvents->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNewss) {
                $result['Newss'] = $this->collNewss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = SchoolClassPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setUnitName($value);
                break;
            case 4:
                $this->setSlug($value);
                break;
            case 5:
                $this->setYear($value);
                break;
            case 6:
                $this->setLevel($value);
                break;
            case 7:
                $this->setRoomNumber($value);
                break;
            case 8:
                $this->setTeachingUnit($value);
                break;
            case 9:
                $this->setStudentCount($value);
                break;
            case 10:
                $this->setClassPortraitId($value);
                break;
            case 11:
                $this->setSubjectId($value);
                break;
            case 12:
                $this->setClassTypeId($value);
                break;
            case 13:
                $this->setClassScheduleId($value);
                break;
            case 14:
                $this->setWeekScheduleId($value);
                break;
            case 15:
                $this->setSchoolBuildingId($value);
                break;
            case 16:
                $this->setSchoolId($value);
                break;
            case 17:
                $this->setCreatedAt($value);
                break;
            case 18:
                $this->setUpdatedAt($value);
                break;
            case 19:
                $this->setCreatedBy($value);
                break;
            case 20:
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
        $keys = SchoolClassPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setOriginalId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setUnitName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setSlug($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setYear($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLevel($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setRoomNumber($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setTeachingUnit($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setStudentCount($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setClassPortraitId($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setSubjectId($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setClassTypeId($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setClassScheduleId($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setWeekScheduleId($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setSchoolBuildingId($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setSchoolId($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setCreatedAt($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setUpdatedAt($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setCreatedBy($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setUpdatedBy($arr[$keys[20]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SchoolClassPeer::DATABASE_NAME);

        if ($this->isColumnModified(SchoolClassPeer::ID)) $criteria->add(SchoolClassPeer::ID, $this->id);
        if ($this->isColumnModified(SchoolClassPeer::ORIGINAL_ID)) $criteria->add(SchoolClassPeer::ORIGINAL_ID, $this->original_id);
        if ($this->isColumnModified(SchoolClassPeer::NAME)) $criteria->add(SchoolClassPeer::NAME, $this->name);
        if ($this->isColumnModified(SchoolClassPeer::UNIT_NAME)) $criteria->add(SchoolClassPeer::UNIT_NAME, $this->unit_name);
        if ($this->isColumnModified(SchoolClassPeer::SLUG)) $criteria->add(SchoolClassPeer::SLUG, $this->slug);
        if ($this->isColumnModified(SchoolClassPeer::YEAR)) $criteria->add(SchoolClassPeer::YEAR, $this->year);
        if ($this->isColumnModified(SchoolClassPeer::LEVEL)) $criteria->add(SchoolClassPeer::LEVEL, $this->level);
        if ($this->isColumnModified(SchoolClassPeer::ROOM_NUMBER)) $criteria->add(SchoolClassPeer::ROOM_NUMBER, $this->room_number);
        if ($this->isColumnModified(SchoolClassPeer::TEACHING_UNIT)) $criteria->add(SchoolClassPeer::TEACHING_UNIT, $this->teaching_unit);
        if ($this->isColumnModified(SchoolClassPeer::STUDENT_COUNT)) $criteria->add(SchoolClassPeer::STUDENT_COUNT, $this->student_count);
        if ($this->isColumnModified(SchoolClassPeer::CLASS_PORTRAIT_ID)) $criteria->add(SchoolClassPeer::CLASS_PORTRAIT_ID, $this->class_portrait_id);
        if ($this->isColumnModified(SchoolClassPeer::SUBJECT_ID)) $criteria->add(SchoolClassPeer::SUBJECT_ID, $this->subject_id);
        if ($this->isColumnModified(SchoolClassPeer::CLASS_TYPE_ID)) $criteria->add(SchoolClassPeer::CLASS_TYPE_ID, $this->class_type_id);
        if ($this->isColumnModified(SchoolClassPeer::CLASS_SCHEDULE_ID)) $criteria->add(SchoolClassPeer::CLASS_SCHEDULE_ID, $this->class_schedule_id);
        if ($this->isColumnModified(SchoolClassPeer::WEEK_SCHEDULE_ID)) $criteria->add(SchoolClassPeer::WEEK_SCHEDULE_ID, $this->week_schedule_id);
        if ($this->isColumnModified(SchoolClassPeer::SCHOOL_BUILDING_ID)) $criteria->add(SchoolClassPeer::SCHOOL_BUILDING_ID, $this->school_building_id);
        if ($this->isColumnModified(SchoolClassPeer::SCHOOL_ID)) $criteria->add(SchoolClassPeer::SCHOOL_ID, $this->school_id);
        if ($this->isColumnModified(SchoolClassPeer::CREATED_AT)) $criteria->add(SchoolClassPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(SchoolClassPeer::UPDATED_AT)) $criteria->add(SchoolClassPeer::UPDATED_AT, $this->updated_at);
        if ($this->isColumnModified(SchoolClassPeer::CREATED_BY)) $criteria->add(SchoolClassPeer::CREATED_BY, $this->created_by);
        if ($this->isColumnModified(SchoolClassPeer::UPDATED_BY)) $criteria->add(SchoolClassPeer::UPDATED_BY, $this->updated_by);

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
        $criteria = new Criteria(SchoolClassPeer::DATABASE_NAME);
        $criteria->add(SchoolClassPeer::ID, $this->id);

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
     * @param object $copyObj An object of SchoolClass (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setOriginalId($this->getOriginalId());
        $copyObj->setName($this->getName());
        $copyObj->setUnitName($this->getUnitName());
        $copyObj->setSlug($this->getSlug());
        $copyObj->setYear($this->getYear());
        $copyObj->setLevel($this->getLevel());
        $copyObj->setRoomNumber($this->getRoomNumber());
        $copyObj->setTeachingUnit($this->getTeachingUnit());
        $copyObj->setStudentCount($this->getStudentCount());
        $copyObj->setClassPortraitId($this->getClassPortraitId());
        $copyObj->setSubjectId($this->getSubjectId());
        $copyObj->setClassTypeId($this->getClassTypeId());
        $copyObj->setClassScheduleId($this->getClassScheduleId());
        $copyObj->setWeekScheduleId($this->getWeekScheduleId());
        $copyObj->setSchoolBuildingId($this->getSchoolBuildingId());
        $copyObj->setSchoolId($this->getSchoolId());
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

            foreach ($this->getSchoolClassSubjectClassessRelatedBySchoolClassId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSchoolClassSubjectClassesRelatedBySchoolClassId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSchoolClassSubjectClassessRelatedBySubjectClassId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSchoolClassSubjectClassesRelatedBySubjectClassId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getClassStudents() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClassStudent($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getClassLinks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClassLink($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getClassDocuments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClassDocument($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getClassTeachers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClassTeacher($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEvents() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEvent($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNewss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNews($relObj->copy($deepCopy));
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
     * @return SchoolClass Clone of current object.
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
     * @return SchoolClassPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SchoolClassPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Document object.
     *
     * @param                  Document $v
     * @return SchoolClass The current object (for fluent API support)
     * @throws PropelException
     */
    public function setDocumentRelatedByClassPortraitId(Document $v = null)
    {
        if ($v === null) {
            $this->setClassPortraitId(NULL);
        } else {
            $this->setClassPortraitId($v->getId());
        }

        $this->aDocumentRelatedByClassPortraitId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Document object, it will not be re-added.
        if ($v !== null) {
            $v->addSchoolClassRelatedByClassPortraitId($this);
        }


        return $this;
    }


    /**
     * Get the associated Document object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Document The associated Document object.
     * @throws PropelException
     */
    public function getDocumentRelatedByClassPortraitId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aDocumentRelatedByClassPortraitId === null && ($this->class_portrait_id !== null) && $doQuery) {
            $this->aDocumentRelatedByClassPortraitId = DocumentQuery::create()->findPk($this->class_portrait_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDocumentRelatedByClassPortraitId->addSchoolClasssRelatedByClassPortraitId($this);
             */
        }

        return $this->aDocumentRelatedByClassPortraitId;
    }

    /**
     * Declares an association between this object and a Subject object.
     *
     * @param                  Subject $v
     * @return SchoolClass The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSubject(Subject $v = null)
    {
        if ($v === null) {
            $this->setSubjectId(NULL);
        } else {
            $this->setSubjectId($v->getId());
        }

        $this->aSubject = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Subject object, it will not be re-added.
        if ($v !== null) {
            $v->addSchoolClass($this);
        }


        return $this;
    }


    /**
     * Get the associated Subject object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Subject The associated Subject object.
     * @throws PropelException
     */
    public function getSubject(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSubject === null && ($this->subject_id !== null) && $doQuery) {
            $this->aSubject = SubjectQuery::create()->findPk($this->subject_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSubject->addSchoolClasss($this);
             */
        }

        return $this->aSubject;
    }

    /**
     * Declares an association between this object and a ClassType object.
     *
     * @param                  ClassType $v
     * @return SchoolClass The current object (for fluent API support)
     * @throws PropelException
     */
    public function setClassType(ClassType $v = null)
    {
        if ($v === null) {
            $this->setClassTypeId(NULL);
        } else {
            $this->setClassTypeId($v->getId());
        }

        $this->aClassType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ClassType object, it will not be re-added.
        if ($v !== null) {
            $v->addSchoolClass($this);
        }


        return $this;
    }


    /**
     * Get the associated ClassType object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ClassType The associated ClassType object.
     * @throws PropelException
     */
    public function getClassType(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aClassType === null && ($this->class_type_id !== null) && $doQuery) {
            $this->aClassType = ClassTypeQuery::create()->findPk($this->class_type_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aClassType->addSchoolClasss($this);
             */
        }

        return $this->aClassType;
    }

    /**
     * Declares an association between this object and a Document object.
     *
     * @param                  Document $v
     * @return SchoolClass The current object (for fluent API support)
     * @throws PropelException
     */
    public function setDocumentRelatedByClassScheduleId(Document $v = null)
    {
        if ($v === null) {
            $this->setClassScheduleId(NULL);
        } else {
            $this->setClassScheduleId($v->getId());
        }

        $this->aDocumentRelatedByClassScheduleId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Document object, it will not be re-added.
        if ($v !== null) {
            $v->addSchoolClassRelatedByClassScheduleId($this);
        }


        return $this;
    }


    /**
     * Get the associated Document object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Document The associated Document object.
     * @throws PropelException
     */
    public function getDocumentRelatedByClassScheduleId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aDocumentRelatedByClassScheduleId === null && ($this->class_schedule_id !== null) && $doQuery) {
            $this->aDocumentRelatedByClassScheduleId = DocumentQuery::create()->findPk($this->class_schedule_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDocumentRelatedByClassScheduleId->addSchoolClasssRelatedByClassScheduleId($this);
             */
        }

        return $this->aDocumentRelatedByClassScheduleId;
    }

    /**
     * Declares an association between this object and a Document object.
     *
     * @param                  Document $v
     * @return SchoolClass The current object (for fluent API support)
     * @throws PropelException
     */
    public function setDocumentRelatedByWeekScheduleId(Document $v = null)
    {
        if ($v === null) {
            $this->setWeekScheduleId(NULL);
        } else {
            $this->setWeekScheduleId($v->getId());
        }

        $this->aDocumentRelatedByWeekScheduleId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Document object, it will not be re-added.
        if ($v !== null) {
            $v->addSchoolClassRelatedByWeekScheduleId($this);
        }


        return $this;
    }


    /**
     * Get the associated Document object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Document The associated Document object.
     * @throws PropelException
     */
    public function getDocumentRelatedByWeekScheduleId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aDocumentRelatedByWeekScheduleId === null && ($this->week_schedule_id !== null) && $doQuery) {
            $this->aDocumentRelatedByWeekScheduleId = DocumentQuery::create()->findPk($this->week_schedule_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDocumentRelatedByWeekScheduleId->addSchoolClasssRelatedByWeekScheduleId($this);
             */
        }

        return $this->aDocumentRelatedByWeekScheduleId;
    }

    /**
     * Declares an association between this object and a SchoolBuilding object.
     *
     * @param                  SchoolBuilding $v
     * @return SchoolClass The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSchoolBuilding(SchoolBuilding $v = null)
    {
        if ($v === null) {
            $this->setSchoolBuildingId(NULL);
        } else {
            $this->setSchoolBuildingId($v->getId());
        }

        $this->aSchoolBuilding = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SchoolBuilding object, it will not be re-added.
        if ($v !== null) {
            $v->addSchoolClass($this);
        }


        return $this;
    }


    /**
     * Get the associated SchoolBuilding object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SchoolBuilding The associated SchoolBuilding object.
     * @throws PropelException
     */
    public function getSchoolBuilding(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSchoolBuilding === null && ($this->school_building_id !== null) && $doQuery) {
            $this->aSchoolBuilding = SchoolBuildingQuery::create()->findPk($this->school_building_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSchoolBuilding->addSchoolClasss($this);
             */
        }

        return $this->aSchoolBuilding;
    }

    /**
     * Declares an association between this object and a School object.
     *
     * @param                  School $v
     * @return SchoolClass The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSchool(School $v = null)
    {
        if ($v === null) {
            $this->setSchoolId(NULL);
        } else {
            $this->setSchoolId($v->getId());
        }

        $this->aSchool = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the School object, it will not be re-added.
        if ($v !== null) {
            $v->addSchoolClass($this);
        }


        return $this;
    }


    /**
     * Get the associated School object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return School The associated School object.
     * @throws PropelException
     */
    public function getSchool(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSchool === null && ($this->school_id !== null) && $doQuery) {
            $this->aSchool = SchoolQuery::create()->findPk($this->school_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSchool->addSchoolClasss($this);
             */
        }

        return $this->aSchool;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return SchoolClass The current object (for fluent API support)
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
            $v->addSchoolClassRelatedByCreatedBy($this);
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
                $this->aUserRelatedByCreatedBy->addSchoolClasssRelatedByCreatedBy($this);
             */
        }

        return $this->aUserRelatedByCreatedBy;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return SchoolClass The current object (for fluent API support)
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
            $v->addSchoolClassRelatedByUpdatedBy($this);
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
                $this->aUserRelatedByUpdatedBy->addSchoolClasssRelatedByUpdatedBy($this);
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
        if ('SchoolClassSubjectClassesRelatedBySchoolClassId' == $relationName) {
            $this->initSchoolClassSubjectClassessRelatedBySchoolClassId();
        }
        if ('SchoolClassSubjectClassesRelatedBySubjectClassId' == $relationName) {
            $this->initSchoolClassSubjectClassessRelatedBySubjectClassId();
        }
        if ('ClassStudent' == $relationName) {
            $this->initClassStudents();
        }
        if ('ClassLink' == $relationName) {
            $this->initClassLinks();
        }
        if ('ClassDocument' == $relationName) {
            $this->initClassDocuments();
        }
        if ('ClassTeacher' == $relationName) {
            $this->initClassTeachers();
        }
        if ('Event' == $relationName) {
            $this->initEvents();
        }
        if ('News' == $relationName) {
            $this->initNewss();
        }
    }

    /**
     * Clears out the collSchoolClassSubjectClassessRelatedBySchoolClassId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SchoolClass The current object (for fluent API support)
     * @see        addSchoolClassSubjectClassessRelatedBySchoolClassId()
     */
    public function clearSchoolClassSubjectClassessRelatedBySchoolClassId()
    {
        $this->collSchoolClassSubjectClassessRelatedBySchoolClassId = null; // important to set this to null since that means it is uninitialized
        $this->collSchoolClassSubjectClassessRelatedBySchoolClassIdPartial = null;

        return $this;
    }

    /**
     * reset is the collSchoolClassSubjectClassessRelatedBySchoolClassId collection loaded partially
     *
     * @return void
     */
    public function resetPartialSchoolClassSubjectClassessRelatedBySchoolClassId($v = true)
    {
        $this->collSchoolClassSubjectClassessRelatedBySchoolClassIdPartial = $v;
    }

    /**
     * Initializes the collSchoolClassSubjectClassessRelatedBySchoolClassId collection.
     *
     * By default this just sets the collSchoolClassSubjectClassessRelatedBySchoolClassId collection to an empty array (like clearcollSchoolClassSubjectClassessRelatedBySchoolClassId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSchoolClassSubjectClassessRelatedBySchoolClassId($overrideExisting = true)
    {
        if (null !== $this->collSchoolClassSubjectClassessRelatedBySchoolClassId && !$overrideExisting) {
            return;
        }
        $this->collSchoolClassSubjectClassessRelatedBySchoolClassId = new PropelObjectCollection();
        $this->collSchoolClassSubjectClassessRelatedBySchoolClassId->setModel('SchoolClassSubjectClasses');
    }

    /**
     * Gets an array of SchoolClassSubjectClasses objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SchoolClass is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SchoolClassSubjectClasses[] List of SchoolClassSubjectClasses objects
     * @throws PropelException
     */
    public function getSchoolClassSubjectClassessRelatedBySchoolClassId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSchoolClassSubjectClassessRelatedBySchoolClassIdPartial && !$this->isNew();
        if (null === $this->collSchoolClassSubjectClassessRelatedBySchoolClassId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSchoolClassSubjectClassessRelatedBySchoolClassId) {
                // return empty collection
                $this->initSchoolClassSubjectClassessRelatedBySchoolClassId();
            } else {
                $collSchoolClassSubjectClassessRelatedBySchoolClassId = SchoolClassSubjectClassesQuery::create(null, $criteria)
                    ->filterBySchoolClassRelatedBySchoolClassId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSchoolClassSubjectClassessRelatedBySchoolClassIdPartial && count($collSchoolClassSubjectClassessRelatedBySchoolClassId)) {
                      $this->initSchoolClassSubjectClassessRelatedBySchoolClassId(false);

                      foreach ($collSchoolClassSubjectClassessRelatedBySchoolClassId as $obj) {
                        if (false == $this->collSchoolClassSubjectClassessRelatedBySchoolClassId->contains($obj)) {
                          $this->collSchoolClassSubjectClassessRelatedBySchoolClassId->append($obj);
                        }
                      }

                      $this->collSchoolClassSubjectClassessRelatedBySchoolClassIdPartial = true;
                    }

                    $collSchoolClassSubjectClassessRelatedBySchoolClassId->getInternalIterator()->rewind();

                    return $collSchoolClassSubjectClassessRelatedBySchoolClassId;
                }

                if ($partial && $this->collSchoolClassSubjectClassessRelatedBySchoolClassId) {
                    foreach ($this->collSchoolClassSubjectClassessRelatedBySchoolClassId as $obj) {
                        if ($obj->isNew()) {
                            $collSchoolClassSubjectClassessRelatedBySchoolClassId[] = $obj;
                        }
                    }
                }

                $this->collSchoolClassSubjectClassessRelatedBySchoolClassId = $collSchoolClassSubjectClassessRelatedBySchoolClassId;
                $this->collSchoolClassSubjectClassessRelatedBySchoolClassIdPartial = false;
            }
        }

        return $this->collSchoolClassSubjectClassessRelatedBySchoolClassId;
    }

    /**
     * Sets a collection of SchoolClassSubjectClassesRelatedBySchoolClassId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $schoolClassSubjectClassessRelatedBySchoolClassId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setSchoolClassSubjectClassessRelatedBySchoolClassId(PropelCollection $schoolClassSubjectClassessRelatedBySchoolClassId, PropelPDO $con = null)
    {
        $schoolClassSubjectClassessRelatedBySchoolClassIdToDelete = $this->getSchoolClassSubjectClassessRelatedBySchoolClassId(new Criteria(), $con)->diff($schoolClassSubjectClassessRelatedBySchoolClassId);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->schoolClassSubjectClassessRelatedBySchoolClassIdScheduledForDeletion = clone $schoolClassSubjectClassessRelatedBySchoolClassIdToDelete;

        foreach ($schoolClassSubjectClassessRelatedBySchoolClassIdToDelete as $schoolClassSubjectClassesRelatedBySchoolClassIdRemoved) {
            $schoolClassSubjectClassesRelatedBySchoolClassIdRemoved->setSchoolClassRelatedBySchoolClassId(null);
        }

        $this->collSchoolClassSubjectClassessRelatedBySchoolClassId = null;
        foreach ($schoolClassSubjectClassessRelatedBySchoolClassId as $schoolClassSubjectClassesRelatedBySchoolClassId) {
            $this->addSchoolClassSubjectClassesRelatedBySchoolClassId($schoolClassSubjectClassesRelatedBySchoolClassId);
        }

        $this->collSchoolClassSubjectClassessRelatedBySchoolClassId = $schoolClassSubjectClassessRelatedBySchoolClassId;
        $this->collSchoolClassSubjectClassessRelatedBySchoolClassIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SchoolClassSubjectClasses objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SchoolClassSubjectClasses objects.
     * @throws PropelException
     */
    public function countSchoolClassSubjectClassessRelatedBySchoolClassId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSchoolClassSubjectClassessRelatedBySchoolClassIdPartial && !$this->isNew();
        if (null === $this->collSchoolClassSubjectClassessRelatedBySchoolClassId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSchoolClassSubjectClassessRelatedBySchoolClassId) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSchoolClassSubjectClassessRelatedBySchoolClassId());
            }
            $query = SchoolClassSubjectClassesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySchoolClassRelatedBySchoolClassId($this)
                ->count($con);
        }

        return count($this->collSchoolClassSubjectClassessRelatedBySchoolClassId);
    }

    /**
     * Method called to associate a SchoolClassSubjectClasses object to this object
     * through the SchoolClassSubjectClasses foreign key attribute.
     *
     * @param    SchoolClassSubjectClasses $l SchoolClassSubjectClasses
     * @return SchoolClass The current object (for fluent API support)
     */
    public function addSchoolClassSubjectClassesRelatedBySchoolClassId(SchoolClassSubjectClasses $l)
    {
        if ($this->collSchoolClassSubjectClassessRelatedBySchoolClassId === null) {
            $this->initSchoolClassSubjectClassessRelatedBySchoolClassId();
            $this->collSchoolClassSubjectClassessRelatedBySchoolClassIdPartial = true;
        }

        if (!in_array($l, $this->collSchoolClassSubjectClassessRelatedBySchoolClassId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSchoolClassSubjectClassesRelatedBySchoolClassId($l);

            if ($this->schoolClassSubjectClassessRelatedBySchoolClassIdScheduledForDeletion and $this->schoolClassSubjectClassessRelatedBySchoolClassIdScheduledForDeletion->contains($l)) {
                $this->schoolClassSubjectClassessRelatedBySchoolClassIdScheduledForDeletion->remove($this->schoolClassSubjectClassessRelatedBySchoolClassIdScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	SchoolClassSubjectClassesRelatedBySchoolClassId $schoolClassSubjectClassesRelatedBySchoolClassId The schoolClassSubjectClassesRelatedBySchoolClassId object to add.
     */
    protected function doAddSchoolClassSubjectClassesRelatedBySchoolClassId($schoolClassSubjectClassesRelatedBySchoolClassId)
    {
        $this->collSchoolClassSubjectClassessRelatedBySchoolClassId[]= $schoolClassSubjectClassesRelatedBySchoolClassId;
        $schoolClassSubjectClassesRelatedBySchoolClassId->setSchoolClassRelatedBySchoolClassId($this);
    }

    /**
     * @param	SchoolClassSubjectClassesRelatedBySchoolClassId $schoolClassSubjectClassesRelatedBySchoolClassId The schoolClassSubjectClassesRelatedBySchoolClassId object to remove.
     * @return SchoolClass The current object (for fluent API support)
     */
    public function removeSchoolClassSubjectClassesRelatedBySchoolClassId($schoolClassSubjectClassesRelatedBySchoolClassId)
    {
        if ($this->getSchoolClassSubjectClassessRelatedBySchoolClassId()->contains($schoolClassSubjectClassesRelatedBySchoolClassId)) {
            $this->collSchoolClassSubjectClassessRelatedBySchoolClassId->remove($this->collSchoolClassSubjectClassessRelatedBySchoolClassId->search($schoolClassSubjectClassesRelatedBySchoolClassId));
            if (null === $this->schoolClassSubjectClassessRelatedBySchoolClassIdScheduledForDeletion) {
                $this->schoolClassSubjectClassessRelatedBySchoolClassIdScheduledForDeletion = clone $this->collSchoolClassSubjectClassessRelatedBySchoolClassId;
                $this->schoolClassSubjectClassessRelatedBySchoolClassIdScheduledForDeletion->clear();
            }
            $this->schoolClassSubjectClassessRelatedBySchoolClassIdScheduledForDeletion[]= clone $schoolClassSubjectClassesRelatedBySchoolClassId;
            $schoolClassSubjectClassesRelatedBySchoolClassId->setSchoolClassRelatedBySchoolClassId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related SchoolClassSubjectClassessRelatedBySchoolClassId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SchoolClassSubjectClasses[] List of SchoolClassSubjectClasses objects
     */
    public function getSchoolClassSubjectClassessRelatedBySchoolClassIdJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SchoolClassSubjectClassesQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByCreatedBy', $join_behavior);

        return $this->getSchoolClassSubjectClassessRelatedBySchoolClassId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related SchoolClassSubjectClassessRelatedBySchoolClassId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SchoolClassSubjectClasses[] List of SchoolClassSubjectClasses objects
     */
    public function getSchoolClassSubjectClassessRelatedBySchoolClassIdJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SchoolClassSubjectClassesQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

        return $this->getSchoolClassSubjectClassessRelatedBySchoolClassId($query, $con);
    }

    /**
     * Clears out the collSchoolClassSubjectClassessRelatedBySubjectClassId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SchoolClass The current object (for fluent API support)
     * @see        addSchoolClassSubjectClassessRelatedBySubjectClassId()
     */
    public function clearSchoolClassSubjectClassessRelatedBySubjectClassId()
    {
        $this->collSchoolClassSubjectClassessRelatedBySubjectClassId = null; // important to set this to null since that means it is uninitialized
        $this->collSchoolClassSubjectClassessRelatedBySubjectClassIdPartial = null;

        return $this;
    }

    /**
     * reset is the collSchoolClassSubjectClassessRelatedBySubjectClassId collection loaded partially
     *
     * @return void
     */
    public function resetPartialSchoolClassSubjectClassessRelatedBySubjectClassId($v = true)
    {
        $this->collSchoolClassSubjectClassessRelatedBySubjectClassIdPartial = $v;
    }

    /**
     * Initializes the collSchoolClassSubjectClassessRelatedBySubjectClassId collection.
     *
     * By default this just sets the collSchoolClassSubjectClassessRelatedBySubjectClassId collection to an empty array (like clearcollSchoolClassSubjectClassessRelatedBySubjectClassId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSchoolClassSubjectClassessRelatedBySubjectClassId($overrideExisting = true)
    {
        if (null !== $this->collSchoolClassSubjectClassessRelatedBySubjectClassId && !$overrideExisting) {
            return;
        }
        $this->collSchoolClassSubjectClassessRelatedBySubjectClassId = new PropelObjectCollection();
        $this->collSchoolClassSubjectClassessRelatedBySubjectClassId->setModel('SchoolClassSubjectClasses');
    }

    /**
     * Gets an array of SchoolClassSubjectClasses objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SchoolClass is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SchoolClassSubjectClasses[] List of SchoolClassSubjectClasses objects
     * @throws PropelException
     */
    public function getSchoolClassSubjectClassessRelatedBySubjectClassId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSchoolClassSubjectClassessRelatedBySubjectClassIdPartial && !$this->isNew();
        if (null === $this->collSchoolClassSubjectClassessRelatedBySubjectClassId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSchoolClassSubjectClassessRelatedBySubjectClassId) {
                // return empty collection
                $this->initSchoolClassSubjectClassessRelatedBySubjectClassId();
            } else {
                $collSchoolClassSubjectClassessRelatedBySubjectClassId = SchoolClassSubjectClassesQuery::create(null, $criteria)
                    ->filterBySchoolClassRelatedBySubjectClassId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSchoolClassSubjectClassessRelatedBySubjectClassIdPartial && count($collSchoolClassSubjectClassessRelatedBySubjectClassId)) {
                      $this->initSchoolClassSubjectClassessRelatedBySubjectClassId(false);

                      foreach ($collSchoolClassSubjectClassessRelatedBySubjectClassId as $obj) {
                        if (false == $this->collSchoolClassSubjectClassessRelatedBySubjectClassId->contains($obj)) {
                          $this->collSchoolClassSubjectClassessRelatedBySubjectClassId->append($obj);
                        }
                      }

                      $this->collSchoolClassSubjectClassessRelatedBySubjectClassIdPartial = true;
                    }

                    $collSchoolClassSubjectClassessRelatedBySubjectClassId->getInternalIterator()->rewind();

                    return $collSchoolClassSubjectClassessRelatedBySubjectClassId;
                }

                if ($partial && $this->collSchoolClassSubjectClassessRelatedBySubjectClassId) {
                    foreach ($this->collSchoolClassSubjectClassessRelatedBySubjectClassId as $obj) {
                        if ($obj->isNew()) {
                            $collSchoolClassSubjectClassessRelatedBySubjectClassId[] = $obj;
                        }
                    }
                }

                $this->collSchoolClassSubjectClassessRelatedBySubjectClassId = $collSchoolClassSubjectClassessRelatedBySubjectClassId;
                $this->collSchoolClassSubjectClassessRelatedBySubjectClassIdPartial = false;
            }
        }

        return $this->collSchoolClassSubjectClassessRelatedBySubjectClassId;
    }

    /**
     * Sets a collection of SchoolClassSubjectClassesRelatedBySubjectClassId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $schoolClassSubjectClassessRelatedBySubjectClassId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setSchoolClassSubjectClassessRelatedBySubjectClassId(PropelCollection $schoolClassSubjectClassessRelatedBySubjectClassId, PropelPDO $con = null)
    {
        $schoolClassSubjectClassessRelatedBySubjectClassIdToDelete = $this->getSchoolClassSubjectClassessRelatedBySubjectClassId(new Criteria(), $con)->diff($schoolClassSubjectClassessRelatedBySubjectClassId);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->schoolClassSubjectClassessRelatedBySubjectClassIdScheduledForDeletion = clone $schoolClassSubjectClassessRelatedBySubjectClassIdToDelete;

        foreach ($schoolClassSubjectClassessRelatedBySubjectClassIdToDelete as $schoolClassSubjectClassesRelatedBySubjectClassIdRemoved) {
            $schoolClassSubjectClassesRelatedBySubjectClassIdRemoved->setSchoolClassRelatedBySubjectClassId(null);
        }

        $this->collSchoolClassSubjectClassessRelatedBySubjectClassId = null;
        foreach ($schoolClassSubjectClassessRelatedBySubjectClassId as $schoolClassSubjectClassesRelatedBySubjectClassId) {
            $this->addSchoolClassSubjectClassesRelatedBySubjectClassId($schoolClassSubjectClassesRelatedBySubjectClassId);
        }

        $this->collSchoolClassSubjectClassessRelatedBySubjectClassId = $schoolClassSubjectClassessRelatedBySubjectClassId;
        $this->collSchoolClassSubjectClassessRelatedBySubjectClassIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SchoolClassSubjectClasses objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SchoolClassSubjectClasses objects.
     * @throws PropelException
     */
    public function countSchoolClassSubjectClassessRelatedBySubjectClassId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSchoolClassSubjectClassessRelatedBySubjectClassIdPartial && !$this->isNew();
        if (null === $this->collSchoolClassSubjectClassessRelatedBySubjectClassId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSchoolClassSubjectClassessRelatedBySubjectClassId) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSchoolClassSubjectClassessRelatedBySubjectClassId());
            }
            $query = SchoolClassSubjectClassesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySchoolClassRelatedBySubjectClassId($this)
                ->count($con);
        }

        return count($this->collSchoolClassSubjectClassessRelatedBySubjectClassId);
    }

    /**
     * Method called to associate a SchoolClassSubjectClasses object to this object
     * through the SchoolClassSubjectClasses foreign key attribute.
     *
     * @param    SchoolClassSubjectClasses $l SchoolClassSubjectClasses
     * @return SchoolClass The current object (for fluent API support)
     */
    public function addSchoolClassSubjectClassesRelatedBySubjectClassId(SchoolClassSubjectClasses $l)
    {
        if ($this->collSchoolClassSubjectClassessRelatedBySubjectClassId === null) {
            $this->initSchoolClassSubjectClassessRelatedBySubjectClassId();
            $this->collSchoolClassSubjectClassessRelatedBySubjectClassIdPartial = true;
        }

        if (!in_array($l, $this->collSchoolClassSubjectClassessRelatedBySubjectClassId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSchoolClassSubjectClassesRelatedBySubjectClassId($l);

            if ($this->schoolClassSubjectClassessRelatedBySubjectClassIdScheduledForDeletion and $this->schoolClassSubjectClassessRelatedBySubjectClassIdScheduledForDeletion->contains($l)) {
                $this->schoolClassSubjectClassessRelatedBySubjectClassIdScheduledForDeletion->remove($this->schoolClassSubjectClassessRelatedBySubjectClassIdScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	SchoolClassSubjectClassesRelatedBySubjectClassId $schoolClassSubjectClassesRelatedBySubjectClassId The schoolClassSubjectClassesRelatedBySubjectClassId object to add.
     */
    protected function doAddSchoolClassSubjectClassesRelatedBySubjectClassId($schoolClassSubjectClassesRelatedBySubjectClassId)
    {
        $this->collSchoolClassSubjectClassessRelatedBySubjectClassId[]= $schoolClassSubjectClassesRelatedBySubjectClassId;
        $schoolClassSubjectClassesRelatedBySubjectClassId->setSchoolClassRelatedBySubjectClassId($this);
    }

    /**
     * @param	SchoolClassSubjectClassesRelatedBySubjectClassId $schoolClassSubjectClassesRelatedBySubjectClassId The schoolClassSubjectClassesRelatedBySubjectClassId object to remove.
     * @return SchoolClass The current object (for fluent API support)
     */
    public function removeSchoolClassSubjectClassesRelatedBySubjectClassId($schoolClassSubjectClassesRelatedBySubjectClassId)
    {
        if ($this->getSchoolClassSubjectClassessRelatedBySubjectClassId()->contains($schoolClassSubjectClassesRelatedBySubjectClassId)) {
            $this->collSchoolClassSubjectClassessRelatedBySubjectClassId->remove($this->collSchoolClassSubjectClassessRelatedBySubjectClassId->search($schoolClassSubjectClassesRelatedBySubjectClassId));
            if (null === $this->schoolClassSubjectClassessRelatedBySubjectClassIdScheduledForDeletion) {
                $this->schoolClassSubjectClassessRelatedBySubjectClassIdScheduledForDeletion = clone $this->collSchoolClassSubjectClassessRelatedBySubjectClassId;
                $this->schoolClassSubjectClassessRelatedBySubjectClassIdScheduledForDeletion->clear();
            }
            $this->schoolClassSubjectClassessRelatedBySubjectClassIdScheduledForDeletion[]= clone $schoolClassSubjectClassesRelatedBySubjectClassId;
            $schoolClassSubjectClassesRelatedBySubjectClassId->setSchoolClassRelatedBySubjectClassId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related SchoolClassSubjectClassessRelatedBySubjectClassId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SchoolClassSubjectClasses[] List of SchoolClassSubjectClasses objects
     */
    public function getSchoolClassSubjectClassessRelatedBySubjectClassIdJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SchoolClassSubjectClassesQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByCreatedBy', $join_behavior);

        return $this->getSchoolClassSubjectClassessRelatedBySubjectClassId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related SchoolClassSubjectClassessRelatedBySubjectClassId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SchoolClassSubjectClasses[] List of SchoolClassSubjectClasses objects
     */
    public function getSchoolClassSubjectClassessRelatedBySubjectClassIdJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SchoolClassSubjectClassesQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

        return $this->getSchoolClassSubjectClassessRelatedBySubjectClassId($query, $con);
    }

    /**
     * Clears out the collClassStudents collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SchoolClass The current object (for fluent API support)
     * @see        addClassStudents()
     */
    public function clearClassStudents()
    {
        $this->collClassStudents = null; // important to set this to null since that means it is uninitialized
        $this->collClassStudentsPartial = null;

        return $this;
    }

    /**
     * reset is the collClassStudents collection loaded partially
     *
     * @return void
     */
    public function resetPartialClassStudents($v = true)
    {
        $this->collClassStudentsPartial = $v;
    }

    /**
     * Initializes the collClassStudents collection.
     *
     * By default this just sets the collClassStudents collection to an empty array (like clearcollClassStudents());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClassStudents($overrideExisting = true)
    {
        if (null !== $this->collClassStudents && !$overrideExisting) {
            return;
        }
        $this->collClassStudents = new PropelObjectCollection();
        $this->collClassStudents->setModel('ClassStudent');
    }

    /**
     * Gets an array of ClassStudent objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SchoolClass is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ClassStudent[] List of ClassStudent objects
     * @throws PropelException
     */
    public function getClassStudents($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collClassStudentsPartial && !$this->isNew();
        if (null === $this->collClassStudents || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClassStudents) {
                // return empty collection
                $this->initClassStudents();
            } else {
                $collClassStudents = ClassStudentQuery::create(null, $criteria)
                    ->filterBySchoolClass($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collClassStudentsPartial && count($collClassStudents)) {
                      $this->initClassStudents(false);

                      foreach ($collClassStudents as $obj) {
                        if (false == $this->collClassStudents->contains($obj)) {
                          $this->collClassStudents->append($obj);
                        }
                      }

                      $this->collClassStudentsPartial = true;
                    }

                    $collClassStudents->getInternalIterator()->rewind();

                    return $collClassStudents;
                }

                if ($partial && $this->collClassStudents) {
                    foreach ($this->collClassStudents as $obj) {
                        if ($obj->isNew()) {
                            $collClassStudents[] = $obj;
                        }
                    }
                }

                $this->collClassStudents = $collClassStudents;
                $this->collClassStudentsPartial = false;
            }
        }

        return $this->collClassStudents;
    }

    /**
     * Sets a collection of ClassStudent objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $classStudents A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setClassStudents(PropelCollection $classStudents, PropelPDO $con = null)
    {
        $classStudentsToDelete = $this->getClassStudents(new Criteria(), $con)->diff($classStudents);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->classStudentsScheduledForDeletion = clone $classStudentsToDelete;

        foreach ($classStudentsToDelete as $classStudentRemoved) {
            $classStudentRemoved->setSchoolClass(null);
        }

        $this->collClassStudents = null;
        foreach ($classStudents as $classStudent) {
            $this->addClassStudent($classStudent);
        }

        $this->collClassStudents = $classStudents;
        $this->collClassStudentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ClassStudent objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ClassStudent objects.
     * @throws PropelException
     */
    public function countClassStudents(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collClassStudentsPartial && !$this->isNew();
        if (null === $this->collClassStudents || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClassStudents) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getClassStudents());
            }
            $query = ClassStudentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySchoolClass($this)
                ->count($con);
        }

        return count($this->collClassStudents);
    }

    /**
     * Method called to associate a ClassStudent object to this object
     * through the ClassStudent foreign key attribute.
     *
     * @param    ClassStudent $l ClassStudent
     * @return SchoolClass The current object (for fluent API support)
     */
    public function addClassStudent(ClassStudent $l)
    {
        if ($this->collClassStudents === null) {
            $this->initClassStudents();
            $this->collClassStudentsPartial = true;
        }

        if (!in_array($l, $this->collClassStudents->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddClassStudent($l);

            if ($this->classStudentsScheduledForDeletion and $this->classStudentsScheduledForDeletion->contains($l)) {
                $this->classStudentsScheduledForDeletion->remove($this->classStudentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	ClassStudent $classStudent The classStudent object to add.
     */
    protected function doAddClassStudent($classStudent)
    {
        $this->collClassStudents[]= $classStudent;
        $classStudent->setSchoolClass($this);
    }

    /**
     * @param	ClassStudent $classStudent The classStudent object to remove.
     * @return SchoolClass The current object (for fluent API support)
     */
    public function removeClassStudent($classStudent)
    {
        if ($this->getClassStudents()->contains($classStudent)) {
            $this->collClassStudents->remove($this->collClassStudents->search($classStudent));
            if (null === $this->classStudentsScheduledForDeletion) {
                $this->classStudentsScheduledForDeletion = clone $this->collClassStudents;
                $this->classStudentsScheduledForDeletion->clear();
            }
            $this->classStudentsScheduledForDeletion[]= clone $classStudent;
            $classStudent->setSchoolClass(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related ClassStudents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClassStudent[] List of ClassStudent objects
     */
    public function getClassStudentsJoinStudent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClassStudentQuery::create(null, $criteria);
        $query->joinWith('Student', $join_behavior);

        return $this->getClassStudents($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related ClassStudents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClassStudent[] List of ClassStudent objects
     */
    public function getClassStudentsJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClassStudentQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByCreatedBy', $join_behavior);

        return $this->getClassStudents($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related ClassStudents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClassStudent[] List of ClassStudent objects
     */
    public function getClassStudentsJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClassStudentQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

        return $this->getClassStudents($query, $con);
    }

    /**
     * Clears out the collClassLinks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SchoolClass The current object (for fluent API support)
     * @see        addClassLinks()
     */
    public function clearClassLinks()
    {
        $this->collClassLinks = null; // important to set this to null since that means it is uninitialized
        $this->collClassLinksPartial = null;

        return $this;
    }

    /**
     * reset is the collClassLinks collection loaded partially
     *
     * @return void
     */
    public function resetPartialClassLinks($v = true)
    {
        $this->collClassLinksPartial = $v;
    }

    /**
     * Initializes the collClassLinks collection.
     *
     * By default this just sets the collClassLinks collection to an empty array (like clearcollClassLinks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClassLinks($overrideExisting = true)
    {
        if (null !== $this->collClassLinks && !$overrideExisting) {
            return;
        }
        $this->collClassLinks = new PropelObjectCollection();
        $this->collClassLinks->setModel('ClassLink');
    }

    /**
     * Gets an array of ClassLink objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SchoolClass is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ClassLink[] List of ClassLink objects
     * @throws PropelException
     */
    public function getClassLinks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collClassLinksPartial && !$this->isNew();
        if (null === $this->collClassLinks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClassLinks) {
                // return empty collection
                $this->initClassLinks();
            } else {
                $collClassLinks = ClassLinkQuery::create(null, $criteria)
                    ->filterBySchoolClass($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collClassLinksPartial && count($collClassLinks)) {
                      $this->initClassLinks(false);

                      foreach ($collClassLinks as $obj) {
                        if (false == $this->collClassLinks->contains($obj)) {
                          $this->collClassLinks->append($obj);
                        }
                      }

                      $this->collClassLinksPartial = true;
                    }

                    $collClassLinks->getInternalIterator()->rewind();

                    return $collClassLinks;
                }

                if ($partial && $this->collClassLinks) {
                    foreach ($this->collClassLinks as $obj) {
                        if ($obj->isNew()) {
                            $collClassLinks[] = $obj;
                        }
                    }
                }

                $this->collClassLinks = $collClassLinks;
                $this->collClassLinksPartial = false;
            }
        }

        return $this->collClassLinks;
    }

    /**
     * Sets a collection of ClassLink objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $classLinks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setClassLinks(PropelCollection $classLinks, PropelPDO $con = null)
    {
        $classLinksToDelete = $this->getClassLinks(new Criteria(), $con)->diff($classLinks);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->classLinksScheduledForDeletion = clone $classLinksToDelete;

        foreach ($classLinksToDelete as $classLinkRemoved) {
            $classLinkRemoved->setSchoolClass(null);
        }

        $this->collClassLinks = null;
        foreach ($classLinks as $classLink) {
            $this->addClassLink($classLink);
        }

        $this->collClassLinks = $classLinks;
        $this->collClassLinksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ClassLink objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ClassLink objects.
     * @throws PropelException
     */
    public function countClassLinks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collClassLinksPartial && !$this->isNew();
        if (null === $this->collClassLinks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClassLinks) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getClassLinks());
            }
            $query = ClassLinkQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySchoolClass($this)
                ->count($con);
        }

        return count($this->collClassLinks);
    }

    /**
     * Method called to associate a ClassLink object to this object
     * through the ClassLink foreign key attribute.
     *
     * @param    ClassLink $l ClassLink
     * @return SchoolClass The current object (for fluent API support)
     */
    public function addClassLink(ClassLink $l)
    {
        if ($this->collClassLinks === null) {
            $this->initClassLinks();
            $this->collClassLinksPartial = true;
        }

        if (!in_array($l, $this->collClassLinks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddClassLink($l);

            if ($this->classLinksScheduledForDeletion and $this->classLinksScheduledForDeletion->contains($l)) {
                $this->classLinksScheduledForDeletion->remove($this->classLinksScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	ClassLink $classLink The classLink object to add.
     */
    protected function doAddClassLink($classLink)
    {
        $this->collClassLinks[]= $classLink;
        $classLink->setSchoolClass($this);
    }

    /**
     * @param	ClassLink $classLink The classLink object to remove.
     * @return SchoolClass The current object (for fluent API support)
     */
    public function removeClassLink($classLink)
    {
        if ($this->getClassLinks()->contains($classLink)) {
            $this->collClassLinks->remove($this->collClassLinks->search($classLink));
            if (null === $this->classLinksScheduledForDeletion) {
                $this->classLinksScheduledForDeletion = clone $this->collClassLinks;
                $this->classLinksScheduledForDeletion->clear();
            }
            $this->classLinksScheduledForDeletion[]= clone $classLink;
            $classLink->setSchoolClass(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related ClassLinks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClassLink[] List of ClassLink objects
     */
    public function getClassLinksJoinLink($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClassLinkQuery::create(null, $criteria);
        $query->joinWith('Link', $join_behavior);

        return $this->getClassLinks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related ClassLinks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClassLink[] List of ClassLink objects
     */
    public function getClassLinksJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClassLinkQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByCreatedBy', $join_behavior);

        return $this->getClassLinks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related ClassLinks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClassLink[] List of ClassLink objects
     */
    public function getClassLinksJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClassLinkQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

        return $this->getClassLinks($query, $con);
    }

    /**
     * Clears out the collClassDocuments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SchoolClass The current object (for fluent API support)
     * @see        addClassDocuments()
     */
    public function clearClassDocuments()
    {
        $this->collClassDocuments = null; // important to set this to null since that means it is uninitialized
        $this->collClassDocumentsPartial = null;

        return $this;
    }

    /**
     * reset is the collClassDocuments collection loaded partially
     *
     * @return void
     */
    public function resetPartialClassDocuments($v = true)
    {
        $this->collClassDocumentsPartial = $v;
    }

    /**
     * Initializes the collClassDocuments collection.
     *
     * By default this just sets the collClassDocuments collection to an empty array (like clearcollClassDocuments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClassDocuments($overrideExisting = true)
    {
        if (null !== $this->collClassDocuments && !$overrideExisting) {
            return;
        }
        $this->collClassDocuments = new PropelObjectCollection();
        $this->collClassDocuments->setModel('ClassDocument');
    }

    /**
     * Gets an array of ClassDocument objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SchoolClass is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ClassDocument[] List of ClassDocument objects
     * @throws PropelException
     */
    public function getClassDocuments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collClassDocumentsPartial && !$this->isNew();
        if (null === $this->collClassDocuments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClassDocuments) {
                // return empty collection
                $this->initClassDocuments();
            } else {
                $collClassDocuments = ClassDocumentQuery::create(null, $criteria)
                    ->filterBySchoolClass($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collClassDocumentsPartial && count($collClassDocuments)) {
                      $this->initClassDocuments(false);

                      foreach ($collClassDocuments as $obj) {
                        if (false == $this->collClassDocuments->contains($obj)) {
                          $this->collClassDocuments->append($obj);
                        }
                      }

                      $this->collClassDocumentsPartial = true;
                    }

                    $collClassDocuments->getInternalIterator()->rewind();

                    return $collClassDocuments;
                }

                if ($partial && $this->collClassDocuments) {
                    foreach ($this->collClassDocuments as $obj) {
                        if ($obj->isNew()) {
                            $collClassDocuments[] = $obj;
                        }
                    }
                }

                $this->collClassDocuments = $collClassDocuments;
                $this->collClassDocumentsPartial = false;
            }
        }

        return $this->collClassDocuments;
    }

    /**
     * Sets a collection of ClassDocument objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $classDocuments A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setClassDocuments(PropelCollection $classDocuments, PropelPDO $con = null)
    {
        $classDocumentsToDelete = $this->getClassDocuments(new Criteria(), $con)->diff($classDocuments);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->classDocumentsScheduledForDeletion = clone $classDocumentsToDelete;

        foreach ($classDocumentsToDelete as $classDocumentRemoved) {
            $classDocumentRemoved->setSchoolClass(null);
        }

        $this->collClassDocuments = null;
        foreach ($classDocuments as $classDocument) {
            $this->addClassDocument($classDocument);
        }

        $this->collClassDocuments = $classDocuments;
        $this->collClassDocumentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ClassDocument objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ClassDocument objects.
     * @throws PropelException
     */
    public function countClassDocuments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collClassDocumentsPartial && !$this->isNew();
        if (null === $this->collClassDocuments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClassDocuments) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getClassDocuments());
            }
            $query = ClassDocumentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySchoolClass($this)
                ->count($con);
        }

        return count($this->collClassDocuments);
    }

    /**
     * Method called to associate a ClassDocument object to this object
     * through the ClassDocument foreign key attribute.
     *
     * @param    ClassDocument $l ClassDocument
     * @return SchoolClass The current object (for fluent API support)
     */
    public function addClassDocument(ClassDocument $l)
    {
        if ($this->collClassDocuments === null) {
            $this->initClassDocuments();
            $this->collClassDocumentsPartial = true;
        }

        if (!in_array($l, $this->collClassDocuments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddClassDocument($l);

            if ($this->classDocumentsScheduledForDeletion and $this->classDocumentsScheduledForDeletion->contains($l)) {
                $this->classDocumentsScheduledForDeletion->remove($this->classDocumentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	ClassDocument $classDocument The classDocument object to add.
     */
    protected function doAddClassDocument($classDocument)
    {
        $this->collClassDocuments[]= $classDocument;
        $classDocument->setSchoolClass($this);
    }

    /**
     * @param	ClassDocument $classDocument The classDocument object to remove.
     * @return SchoolClass The current object (for fluent API support)
     */
    public function removeClassDocument($classDocument)
    {
        if ($this->getClassDocuments()->contains($classDocument)) {
            $this->collClassDocuments->remove($this->collClassDocuments->search($classDocument));
            if (null === $this->classDocumentsScheduledForDeletion) {
                $this->classDocumentsScheduledForDeletion = clone $this->collClassDocuments;
                $this->classDocumentsScheduledForDeletion->clear();
            }
            $this->classDocumentsScheduledForDeletion[]= clone $classDocument;
            $classDocument->setSchoolClass(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related ClassDocuments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClassDocument[] List of ClassDocument objects
     */
    public function getClassDocumentsJoinDocument($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClassDocumentQuery::create(null, $criteria);
        $query->joinWith('Document', $join_behavior);

        return $this->getClassDocuments($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related ClassDocuments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClassDocument[] List of ClassDocument objects
     */
    public function getClassDocumentsJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClassDocumentQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByCreatedBy', $join_behavior);

        return $this->getClassDocuments($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related ClassDocuments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClassDocument[] List of ClassDocument objects
     */
    public function getClassDocumentsJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClassDocumentQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

        return $this->getClassDocuments($query, $con);
    }

    /**
     * Clears out the collClassTeachers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SchoolClass The current object (for fluent API support)
     * @see        addClassTeachers()
     */
    public function clearClassTeachers()
    {
        $this->collClassTeachers = null; // important to set this to null since that means it is uninitialized
        $this->collClassTeachersPartial = null;

        return $this;
    }

    /**
     * reset is the collClassTeachers collection loaded partially
     *
     * @return void
     */
    public function resetPartialClassTeachers($v = true)
    {
        $this->collClassTeachersPartial = $v;
    }

    /**
     * Initializes the collClassTeachers collection.
     *
     * By default this just sets the collClassTeachers collection to an empty array (like clearcollClassTeachers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
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
     * If this SchoolClass is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ClassTeacher[] List of ClassTeacher objects
     * @throws PropelException
     */
    public function getClassTeachers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collClassTeachersPartial && !$this->isNew();
        if (null === $this->collClassTeachers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClassTeachers) {
                // return empty collection
                $this->initClassTeachers();
            } else {
                $collClassTeachers = ClassTeacherQuery::create(null, $criteria)
                    ->filterBySchoolClass($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collClassTeachersPartial && count($collClassTeachers)) {
                      $this->initClassTeachers(false);

                      foreach ($collClassTeachers as $obj) {
                        if (false == $this->collClassTeachers->contains($obj)) {
                          $this->collClassTeachers->append($obj);
                        }
                      }

                      $this->collClassTeachersPartial = true;
                    }

                    $collClassTeachers->getInternalIterator()->rewind();

                    return $collClassTeachers;
                }

                if ($partial && $this->collClassTeachers) {
                    foreach ($this->collClassTeachers as $obj) {
                        if ($obj->isNew()) {
                            $collClassTeachers[] = $obj;
                        }
                    }
                }

                $this->collClassTeachers = $collClassTeachers;
                $this->collClassTeachersPartial = false;
            }
        }

        return $this->collClassTeachers;
    }

    /**
     * Sets a collection of ClassTeacher objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $classTeachers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setClassTeachers(PropelCollection $classTeachers, PropelPDO $con = null)
    {
        $classTeachersToDelete = $this->getClassTeachers(new Criteria(), $con)->diff($classTeachers);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->classTeachersScheduledForDeletion = clone $classTeachersToDelete;

        foreach ($classTeachersToDelete as $classTeacherRemoved) {
            $classTeacherRemoved->setSchoolClass(null);
        }

        $this->collClassTeachers = null;
        foreach ($classTeachers as $classTeacher) {
            $this->addClassTeacher($classTeacher);
        }

        $this->collClassTeachers = $classTeachers;
        $this->collClassTeachersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ClassTeacher objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ClassTeacher objects.
     * @throws PropelException
     */
    public function countClassTeachers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collClassTeachersPartial && !$this->isNew();
        if (null === $this->collClassTeachers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClassTeachers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getClassTeachers());
            }
            $query = ClassTeacherQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySchoolClass($this)
                ->count($con);
        }

        return count($this->collClassTeachers);
    }

    /**
     * Method called to associate a ClassTeacher object to this object
     * through the ClassTeacher foreign key attribute.
     *
     * @param    ClassTeacher $l ClassTeacher
     * @return SchoolClass The current object (for fluent API support)
     */
    public function addClassTeacher(ClassTeacher $l)
    {
        if ($this->collClassTeachers === null) {
            $this->initClassTeachers();
            $this->collClassTeachersPartial = true;
        }

        if (!in_array($l, $this->collClassTeachers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddClassTeacher($l);

            if ($this->classTeachersScheduledForDeletion and $this->classTeachersScheduledForDeletion->contains($l)) {
                $this->classTeachersScheduledForDeletion->remove($this->classTeachersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	ClassTeacher $classTeacher The classTeacher object to add.
     */
    protected function doAddClassTeacher($classTeacher)
    {
        $this->collClassTeachers[]= $classTeacher;
        $classTeacher->setSchoolClass($this);
    }

    /**
     * @param	ClassTeacher $classTeacher The classTeacher object to remove.
     * @return SchoolClass The current object (for fluent API support)
     */
    public function removeClassTeacher($classTeacher)
    {
        if ($this->getClassTeachers()->contains($classTeacher)) {
            $this->collClassTeachers->remove($this->collClassTeachers->search($classTeacher));
            if (null === $this->classTeachersScheduledForDeletion) {
                $this->classTeachersScheduledForDeletion = clone $this->collClassTeachers;
                $this->classTeachersScheduledForDeletion->clear();
            }
            $this->classTeachersScheduledForDeletion[]= clone $classTeacher;
            $classTeacher->setSchoolClass(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related ClassTeachers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClassTeacher[] List of ClassTeacher objects
     */
    public function getClassTeachersJoinTeamMember($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClassTeacherQuery::create(null, $criteria);
        $query->joinWith('TeamMember', $join_behavior);

        return $this->getClassTeachers($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related ClassTeachers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClassTeacher[] List of ClassTeacher objects
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
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related ClassTeachers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClassTeacher[] List of ClassTeacher objects
     */
    public function getClassTeachersJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClassTeacherQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

        return $this->getClassTeachers($query, $con);
    }

    /**
     * Clears out the collEvents collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SchoolClass The current object (for fluent API support)
     * @see        addEvents()
     */
    public function clearEvents()
    {
        $this->collEvents = null; // important to set this to null since that means it is uninitialized
        $this->collEventsPartial = null;

        return $this;
    }

    /**
     * reset is the collEvents collection loaded partially
     *
     * @return void
     */
    public function resetPartialEvents($v = true)
    {
        $this->collEventsPartial = $v;
    }

    /**
     * Initializes the collEvents collection.
     *
     * By default this just sets the collEvents collection to an empty array (like clearcollEvents());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
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
     * If this SchoolClass is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Event[] List of Event objects
     * @throws PropelException
     */
    public function getEvents($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collEventsPartial && !$this->isNew();
        if (null === $this->collEvents || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEvents) {
                // return empty collection
                $this->initEvents();
            } else {
                $collEvents = EventQuery::create(null, $criteria)
                    ->filterBySchoolClass($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collEventsPartial && count($collEvents)) {
                      $this->initEvents(false);

                      foreach ($collEvents as $obj) {
                        if (false == $this->collEvents->contains($obj)) {
                          $this->collEvents->append($obj);
                        }
                      }

                      $this->collEventsPartial = true;
                    }

                    $collEvents->getInternalIterator()->rewind();

                    return $collEvents;
                }

                if ($partial && $this->collEvents) {
                    foreach ($this->collEvents as $obj) {
                        if ($obj->isNew()) {
                            $collEvents[] = $obj;
                        }
                    }
                }

                $this->collEvents = $collEvents;
                $this->collEventsPartial = false;
            }
        }

        return $this->collEvents;
    }

    /**
     * Sets a collection of Event objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $events A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setEvents(PropelCollection $events, PropelPDO $con = null)
    {
        $eventsToDelete = $this->getEvents(new Criteria(), $con)->diff($events);


        $this->eventsScheduledForDeletion = $eventsToDelete;

        foreach ($eventsToDelete as $eventRemoved) {
            $eventRemoved->setSchoolClass(null);
        }

        $this->collEvents = null;
        foreach ($events as $event) {
            $this->addEvent($event);
        }

        $this->collEvents = $events;
        $this->collEventsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Event objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Event objects.
     * @throws PropelException
     */
    public function countEvents(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collEventsPartial && !$this->isNew();
        if (null === $this->collEvents || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEvents) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEvents());
            }
            $query = EventQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySchoolClass($this)
                ->count($con);
        }

        return count($this->collEvents);
    }

    /**
     * Method called to associate a Event object to this object
     * through the Event foreign key attribute.
     *
     * @param    Event $l Event
     * @return SchoolClass The current object (for fluent API support)
     */
    public function addEvent(Event $l)
    {
        if ($this->collEvents === null) {
            $this->initEvents();
            $this->collEventsPartial = true;
        }

        if (!in_array($l, $this->collEvents->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddEvent($l);

            if ($this->eventsScheduledForDeletion and $this->eventsScheduledForDeletion->contains($l)) {
                $this->eventsScheduledForDeletion->remove($this->eventsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Event $event The event object to add.
     */
    protected function doAddEvent($event)
    {
        $this->collEvents[]= $event;
        $event->setSchoolClass($this);
    }

    /**
     * @param	Event $event The event object to remove.
     * @return SchoolClass The current object (for fluent API support)
     */
    public function removeEvent($event)
    {
        if ($this->getEvents()->contains($event)) {
            $this->collEvents->remove($this->collEvents->search($event));
            if (null === $this->eventsScheduledForDeletion) {
                $this->eventsScheduledForDeletion = clone $this->collEvents;
                $this->eventsScheduledForDeletion->clear();
            }
            $this->eventsScheduledForDeletion[]= $event;
            $event->setSchoolClass(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related Events from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Event[] List of Event objects
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
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related Events from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Event[] List of Event objects
     */
    public function getEventsJoinService($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EventQuery::create(null, $criteria);
        $query->joinWith('Service', $join_behavior);

        return $this->getEvents($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related Events from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Event[] List of Event objects
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
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related Events from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Event[] List of Event objects
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
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related Events from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Event[] List of Event objects
     */
    public function getEventsJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EventQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

        return $this->getEvents($query, $con);
    }

    /**
     * Clears out the collNewss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SchoolClass The current object (for fluent API support)
     * @see        addNewss()
     */
    public function clearNewss()
    {
        $this->collNewss = null; // important to set this to null since that means it is uninitialized
        $this->collNewssPartial = null;

        return $this;
    }

    /**
     * reset is the collNewss collection loaded partially
     *
     * @return void
     */
    public function resetPartialNewss($v = true)
    {
        $this->collNewssPartial = $v;
    }

    /**
     * Initializes the collNewss collection.
     *
     * By default this just sets the collNewss collection to an empty array (like clearcollNewss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNewss($overrideExisting = true)
    {
        if (null !== $this->collNewss && !$overrideExisting) {
            return;
        }
        $this->collNewss = new PropelObjectCollection();
        $this->collNewss->setModel('News');
    }

    /**
     * Gets an array of News objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SchoolClass is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|News[] List of News objects
     * @throws PropelException
     */
    public function getNewss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collNewssPartial && !$this->isNew();
        if (null === $this->collNewss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNewss) {
                // return empty collection
                $this->initNewss();
            } else {
                $collNewss = NewsQuery::create(null, $criteria)
                    ->filterBySchoolClass($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collNewssPartial && count($collNewss)) {
                      $this->initNewss(false);

                      foreach ($collNewss as $obj) {
                        if (false == $this->collNewss->contains($obj)) {
                          $this->collNewss->append($obj);
                        }
                      }

                      $this->collNewssPartial = true;
                    }

                    $collNewss->getInternalIterator()->rewind();

                    return $collNewss;
                }

                if ($partial && $this->collNewss) {
                    foreach ($this->collNewss as $obj) {
                        if ($obj->isNew()) {
                            $collNewss[] = $obj;
                        }
                    }
                }

                $this->collNewss = $collNewss;
                $this->collNewssPartial = false;
            }
        }

        return $this->collNewss;
    }

    /**
     * Sets a collection of News objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $newss A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SchoolClass The current object (for fluent API support)
     */
    public function setNewss(PropelCollection $newss, PropelPDO $con = null)
    {
        $newssToDelete = $this->getNewss(new Criteria(), $con)->diff($newss);


        $this->newssScheduledForDeletion = $newssToDelete;

        foreach ($newssToDelete as $newsRemoved) {
            $newsRemoved->setSchoolClass(null);
        }

        $this->collNewss = null;
        foreach ($newss as $news) {
            $this->addNews($news);
        }

        $this->collNewss = $newss;
        $this->collNewssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related News objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related News objects.
     * @throws PropelException
     */
    public function countNewss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collNewssPartial && !$this->isNew();
        if (null === $this->collNewss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNewss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getNewss());
            }
            $query = NewsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySchoolClass($this)
                ->count($con);
        }

        return count($this->collNewss);
    }

    /**
     * Method called to associate a News object to this object
     * through the News foreign key attribute.
     *
     * @param    News $l News
     * @return SchoolClass The current object (for fluent API support)
     */
    public function addNews(News $l)
    {
        if ($this->collNewss === null) {
            $this->initNewss();
            $this->collNewssPartial = true;
        }

        if (!in_array($l, $this->collNewss->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddNews($l);

            if ($this->newssScheduledForDeletion and $this->newssScheduledForDeletion->contains($l)) {
                $this->newssScheduledForDeletion->remove($this->newssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	News $news The news object to add.
     */
    protected function doAddNews($news)
    {
        $this->collNewss[]= $news;
        $news->setSchoolClass($this);
    }

    /**
     * @param	News $news The news object to remove.
     * @return SchoolClass The current object (for fluent API support)
     */
    public function removeNews($news)
    {
        if ($this->getNewss()->contains($news)) {
            $this->collNewss->remove($this->collNewss->search($news));
            if (null === $this->newssScheduledForDeletion) {
                $this->newssScheduledForDeletion = clone $this->collNewss;
                $this->newssScheduledForDeletion->clear();
            }
            $this->newssScheduledForDeletion[]= $news;
            $news->setSchoolClass(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related Newss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|News[] List of News objects
     */
    public function getNewssJoinNewsType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NewsQuery::create(null, $criteria);
        $query->joinWith('NewsType', $join_behavior);

        return $this->getNewss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related Newss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|News[] List of News objects
     */
    public function getNewssJoinDocument($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NewsQuery::create(null, $criteria);
        $query->joinWith('Document', $join_behavior);

        return $this->getNewss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related Newss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|News[] List of News objects
     */
    public function getNewssJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NewsQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByCreatedBy', $join_behavior);

        return $this->getNewss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SchoolClass is new, it will return
     * an empty collection; or if this SchoolClass has previously
     * been saved, it will retrieve related Newss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SchoolClass.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|News[] List of News objects
     */
    public function getNewssJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NewsQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

        return $this->getNewss($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->original_id = null;
        $this->name = null;
        $this->unit_name = null;
        $this->slug = null;
        $this->year = null;
        $this->level = null;
        $this->room_number = null;
        $this->teaching_unit = null;
        $this->student_count = null;
        $this->class_portrait_id = null;
        $this->subject_id = null;
        $this->class_type_id = null;
        $this->class_schedule_id = null;
        $this->week_schedule_id = null;
        $this->school_building_id = null;
        $this->school_id = null;
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
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collSchoolClassSubjectClassessRelatedBySchoolClassId) {
                foreach ($this->collSchoolClassSubjectClassessRelatedBySchoolClassId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSchoolClassSubjectClassessRelatedBySubjectClassId) {
                foreach ($this->collSchoolClassSubjectClassessRelatedBySubjectClassId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collClassStudents) {
                foreach ($this->collClassStudents as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collClassLinks) {
                foreach ($this->collClassLinks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collClassDocuments) {
                foreach ($this->collClassDocuments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collClassTeachers) {
                foreach ($this->collClassTeachers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEvents) {
                foreach ($this->collEvents as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNewss) {
                foreach ($this->collNewss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aDocumentRelatedByClassPortraitId instanceof Persistent) {
              $this->aDocumentRelatedByClassPortraitId->clearAllReferences($deep);
            }
            if ($this->aSubject instanceof Persistent) {
              $this->aSubject->clearAllReferences($deep);
            }
            if ($this->aClassType instanceof Persistent) {
              $this->aClassType->clearAllReferences($deep);
            }
            if ($this->aDocumentRelatedByClassScheduleId instanceof Persistent) {
              $this->aDocumentRelatedByClassScheduleId->clearAllReferences($deep);
            }
            if ($this->aDocumentRelatedByWeekScheduleId instanceof Persistent) {
              $this->aDocumentRelatedByWeekScheduleId->clearAllReferences($deep);
            }
            if ($this->aSchoolBuilding instanceof Persistent) {
              $this->aSchoolBuilding->clearAllReferences($deep);
            }
            if ($this->aSchool instanceof Persistent) {
              $this->aSchool->clearAllReferences($deep);
            }
            if ($this->aUserRelatedByCreatedBy instanceof Persistent) {
              $this->aUserRelatedByCreatedBy->clearAllReferences($deep);
            }
            if ($this->aUserRelatedByUpdatedBy instanceof Persistent) {
              $this->aUserRelatedByUpdatedBy->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collSchoolClassSubjectClassessRelatedBySchoolClassId instanceof PropelCollection) {
            $this->collSchoolClassSubjectClassessRelatedBySchoolClassId->clearIterator();
        }
        $this->collSchoolClassSubjectClassessRelatedBySchoolClassId = null;
        if ($this->collSchoolClassSubjectClassessRelatedBySubjectClassId instanceof PropelCollection) {
            $this->collSchoolClassSubjectClassessRelatedBySubjectClassId->clearIterator();
        }
        $this->collSchoolClassSubjectClassessRelatedBySubjectClassId = null;
        if ($this->collClassStudents instanceof PropelCollection) {
            $this->collClassStudents->clearIterator();
        }
        $this->collClassStudents = null;
        if ($this->collClassLinks instanceof PropelCollection) {
            $this->collClassLinks->clearIterator();
        }
        $this->collClassLinks = null;
        if ($this->collClassDocuments instanceof PropelCollection) {
            $this->collClassDocuments->clearIterator();
        }
        $this->collClassDocuments = null;
        if ($this->collClassTeachers instanceof PropelCollection) {
            $this->collClassTeachers->clearIterator();
        }
        $this->collClassTeachers = null;
        if ($this->collEvents instanceof PropelCollection) {
            $this->collEvents->clearIterator();
        }
        $this->collEvents = null;
        if ($this->collNewss instanceof PropelCollection) {
            $this->collNewss->clearIterator();
        }
        $this->collNewss = null;
        $this->aDocumentRelatedByClassPortraitId = null;
        $this->aSubject = null;
        $this->aClassType = null;
        $this->aDocumentRelatedByClassScheduleId = null;
        $this->aDocumentRelatedByWeekScheduleId = null;
        $this->aSchoolBuilding = null;
        $this->aSchool = null;
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
        return (string) $this->exportTo(SchoolClassPeer::DEFAULT_STRING_FORMAT);
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

    // extended_timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     SchoolClass The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = SchoolClassPeer::UPDATED_AT;

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
     * @return     SchoolClass The current object (for fluent API support)
     */
    public function keepUpdateUserUnchanged()
    {
        $this->modifiedColumns[] = SchoolClassPeer::UPDATED_BY;
        return $this;
    }

    // denyable behavior
    public function mayOperate($sOperation, $oUser = false) {
        if($oUser === false) {
            $oUser = Session::getSession()->getUser();
        }
        $bIsAllowed = false;
        if($oUser && ($this->isNew() || $this->getCreatedBy() === $oUser->getId()) && SchoolClassPeer::mayOperateOnOwn($oUser, $this, $sOperation)) {
            $bIsAllowed = true;
        } else if(SchoolClassPeer::mayOperateOn($oUser, $this, $sOperation)) {
            $bIsAllowed = true;
        }
        FilterModule::getFilters()->handleSchoolClassOperationCheck($sOperation, $this, $oUser, array(&$bIsAllowed));
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
