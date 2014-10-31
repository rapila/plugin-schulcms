<?php


/**
 * Base class that represents a query for the 'school_classes' table.
 *
 *
 *
 * @method SchoolClassQuery orderById($order = Criteria::ASC) Order by the id column
 * @method SchoolClassQuery orderByOriginalId($order = Criteria::ASC) Order by the original_id column
 * @method SchoolClassQuery orderByAncestorClassId($order = Criteria::ASC) Order by the ancestor_class_id column
 * @method SchoolClassQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method SchoolClassQuery orderByUnitName($order = Criteria::ASC) Order by the unit_name column
 * @method SchoolClassQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 * @method SchoolClassQuery orderByYear($order = Criteria::ASC) Order by the year column
 * @method SchoolClassQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method SchoolClassQuery orderByRoomNumber($order = Criteria::ASC) Order by the room_number column
 * @method SchoolClassQuery orderByTeachingUnit($order = Criteria::ASC) Order by the teaching_unit column
 * @method SchoolClassQuery orderByStudentCount($order = Criteria::ASC) Order by the student_count column
 * @method SchoolClassQuery orderByClassPortraitId($order = Criteria::ASC) Order by the class_portrait_id column
 * @method SchoolClassQuery orderBySubjectId($order = Criteria::ASC) Order by the subject_id column
 * @method SchoolClassQuery orderByClassType($order = Criteria::ASC) Order by the class_type column
 * @method SchoolClassQuery orderByClassScheduleId($order = Criteria::ASC) Order by the class_schedule_id column
 * @method SchoolClassQuery orderByWeekScheduleId($order = Criteria::ASC) Order by the week_schedule_id column
 * @method SchoolClassQuery orderBySchoolBuildingId($order = Criteria::ASC) Order by the school_building_id column
 * @method SchoolClassQuery orderBySchoolId($order = Criteria::ASC) Order by the school_id column
 * @method SchoolClassQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method SchoolClassQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method SchoolClassQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method SchoolClassQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method SchoolClassQuery groupById() Group by the id column
 * @method SchoolClassQuery groupByOriginalId() Group by the original_id column
 * @method SchoolClassQuery groupByAncestorClassId() Group by the ancestor_class_id column
 * @method SchoolClassQuery groupByName() Group by the name column
 * @method SchoolClassQuery groupByUnitName() Group by the unit_name column
 * @method SchoolClassQuery groupBySlug() Group by the slug column
 * @method SchoolClassQuery groupByYear() Group by the year column
 * @method SchoolClassQuery groupByLevel() Group by the level column
 * @method SchoolClassQuery groupByRoomNumber() Group by the room_number column
 * @method SchoolClassQuery groupByTeachingUnit() Group by the teaching_unit column
 * @method SchoolClassQuery groupByStudentCount() Group by the student_count column
 * @method SchoolClassQuery groupByClassPortraitId() Group by the class_portrait_id column
 * @method SchoolClassQuery groupBySubjectId() Group by the subject_id column
 * @method SchoolClassQuery groupByClassType() Group by the class_type column
 * @method SchoolClassQuery groupByClassScheduleId() Group by the class_schedule_id column
 * @method SchoolClassQuery groupByWeekScheduleId() Group by the week_schedule_id column
 * @method SchoolClassQuery groupBySchoolBuildingId() Group by the school_building_id column
 * @method SchoolClassQuery groupBySchoolId() Group by the school_id column
 * @method SchoolClassQuery groupByCreatedAt() Group by the created_at column
 * @method SchoolClassQuery groupByUpdatedAt() Group by the updated_at column
 * @method SchoolClassQuery groupByCreatedBy() Group by the created_by column
 * @method SchoolClassQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method SchoolClassQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SchoolClassQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SchoolClassQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SchoolClassQuery leftJoinSchoolClassRelatedByAncestorClassId($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchoolClassRelatedByAncestorClassId relation
 * @method SchoolClassQuery rightJoinSchoolClassRelatedByAncestorClassId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchoolClassRelatedByAncestorClassId relation
 * @method SchoolClassQuery innerJoinSchoolClassRelatedByAncestorClassId($relationAlias = null) Adds a INNER JOIN clause to the query using the SchoolClassRelatedByAncestorClassId relation
 *
 * @method SchoolClassQuery leftJoinDocumentRelatedByClassPortraitId($relationAlias = null) Adds a LEFT JOIN clause to the query using the DocumentRelatedByClassPortraitId relation
 * @method SchoolClassQuery rightJoinDocumentRelatedByClassPortraitId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DocumentRelatedByClassPortraitId relation
 * @method SchoolClassQuery innerJoinDocumentRelatedByClassPortraitId($relationAlias = null) Adds a INNER JOIN clause to the query using the DocumentRelatedByClassPortraitId relation
 *
 * @method SchoolClassQuery leftJoinSubject($relationAlias = null) Adds a LEFT JOIN clause to the query using the Subject relation
 * @method SchoolClassQuery rightJoinSubject($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Subject relation
 * @method SchoolClassQuery innerJoinSubject($relationAlias = null) Adds a INNER JOIN clause to the query using the Subject relation
 *
 * @method SchoolClassQuery leftJoinDocumentRelatedByClassScheduleId($relationAlias = null) Adds a LEFT JOIN clause to the query using the DocumentRelatedByClassScheduleId relation
 * @method SchoolClassQuery rightJoinDocumentRelatedByClassScheduleId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DocumentRelatedByClassScheduleId relation
 * @method SchoolClassQuery innerJoinDocumentRelatedByClassScheduleId($relationAlias = null) Adds a INNER JOIN clause to the query using the DocumentRelatedByClassScheduleId relation
 *
 * @method SchoolClassQuery leftJoinDocumentRelatedByWeekScheduleId($relationAlias = null) Adds a LEFT JOIN clause to the query using the DocumentRelatedByWeekScheduleId relation
 * @method SchoolClassQuery rightJoinDocumentRelatedByWeekScheduleId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DocumentRelatedByWeekScheduleId relation
 * @method SchoolClassQuery innerJoinDocumentRelatedByWeekScheduleId($relationAlias = null) Adds a INNER JOIN clause to the query using the DocumentRelatedByWeekScheduleId relation
 *
 * @method SchoolClassQuery leftJoinSchoolBuilding($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchoolBuilding relation
 * @method SchoolClassQuery rightJoinSchoolBuilding($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchoolBuilding relation
 * @method SchoolClassQuery innerJoinSchoolBuilding($relationAlias = null) Adds a INNER JOIN clause to the query using the SchoolBuilding relation
 *
 * @method SchoolClassQuery leftJoinSchool($relationAlias = null) Adds a LEFT JOIN clause to the query using the School relation
 * @method SchoolClassQuery rightJoinSchool($relationAlias = null) Adds a RIGHT JOIN clause to the query using the School relation
 * @method SchoolClassQuery innerJoinSchool($relationAlias = null) Adds a INNER JOIN clause to the query using the School relation
 *
 * @method SchoolClassQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method SchoolClassQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method SchoolClassQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method SchoolClassQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method SchoolClassQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method SchoolClassQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method SchoolClassQuery leftJoinSchoolClassRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchoolClassRelatedById relation
 * @method SchoolClassQuery rightJoinSchoolClassRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchoolClassRelatedById relation
 * @method SchoolClassQuery innerJoinSchoolClassRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the SchoolClassRelatedById relation
 *
 * @method SchoolClassQuery leftJoinSchoolClassSubjectClassesRelatedBySchoolClassId($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchoolClassSubjectClassesRelatedBySchoolClassId relation
 * @method SchoolClassQuery rightJoinSchoolClassSubjectClassesRelatedBySchoolClassId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchoolClassSubjectClassesRelatedBySchoolClassId relation
 * @method SchoolClassQuery innerJoinSchoolClassSubjectClassesRelatedBySchoolClassId($relationAlias = null) Adds a INNER JOIN clause to the query using the SchoolClassSubjectClassesRelatedBySchoolClassId relation
 *
 * @method SchoolClassQuery leftJoinSchoolClassSubjectClassesRelatedBySubjectClassId($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchoolClassSubjectClassesRelatedBySubjectClassId relation
 * @method SchoolClassQuery rightJoinSchoolClassSubjectClassesRelatedBySubjectClassId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchoolClassSubjectClassesRelatedBySubjectClassId relation
 * @method SchoolClassQuery innerJoinSchoolClassSubjectClassesRelatedBySubjectClassId($relationAlias = null) Adds a INNER JOIN clause to the query using the SchoolClassSubjectClassesRelatedBySubjectClassId relation
 *
 * @method SchoolClassQuery leftJoinClassStudent($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClassStudent relation
 * @method SchoolClassQuery rightJoinClassStudent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClassStudent relation
 * @method SchoolClassQuery innerJoinClassStudent($relationAlias = null) Adds a INNER JOIN clause to the query using the ClassStudent relation
 *
 * @method SchoolClassQuery leftJoinClassLink($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClassLink relation
 * @method SchoolClassQuery rightJoinClassLink($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClassLink relation
 * @method SchoolClassQuery innerJoinClassLink($relationAlias = null) Adds a INNER JOIN clause to the query using the ClassLink relation
 *
 * @method SchoolClassQuery leftJoinClassDocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClassDocument relation
 * @method SchoolClassQuery rightJoinClassDocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClassDocument relation
 * @method SchoolClassQuery innerJoinClassDocument($relationAlias = null) Adds a INNER JOIN clause to the query using the ClassDocument relation
 *
 * @method SchoolClassQuery leftJoinClassTeacher($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClassTeacher relation
 * @method SchoolClassQuery rightJoinClassTeacher($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClassTeacher relation
 * @method SchoolClassQuery innerJoinClassTeacher($relationAlias = null) Adds a INNER JOIN clause to the query using the ClassTeacher relation
 *
 * @method SchoolClassQuery leftJoinEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Event relation
 * @method SchoolClassQuery rightJoinEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Event relation
 * @method SchoolClassQuery innerJoinEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the Event relation
 *
 * @method SchoolClassQuery leftJoinNews($relationAlias = null) Adds a LEFT JOIN clause to the query using the News relation
 * @method SchoolClassQuery rightJoinNews($relationAlias = null) Adds a RIGHT JOIN clause to the query using the News relation
 * @method SchoolClassQuery innerJoinNews($relationAlias = null) Adds a INNER JOIN clause to the query using the News relation
 *
 * @method SchoolClass findOne(PropelPDO $con = null) Return the first SchoolClass matching the query
 * @method SchoolClass findOneOrCreate(PropelPDO $con = null) Return the first SchoolClass matching the query, or a new SchoolClass object populated from the query conditions when no match is found
 *
 * @method SchoolClass findOneByOriginalId(int $original_id) Return the first SchoolClass filtered by the original_id column
 * @method SchoolClass findOneByAncestorClassId(int $ancestor_class_id) Return the first SchoolClass filtered by the ancestor_class_id column
 * @method SchoolClass findOneByName(string $name) Return the first SchoolClass filtered by the name column
 * @method SchoolClass findOneByUnitName(string $unit_name) Return the first SchoolClass filtered by the unit_name column
 * @method SchoolClass findOneBySlug(string $slug) Return the first SchoolClass filtered by the slug column
 * @method SchoolClass findOneByYear(int $year) Return the first SchoolClass filtered by the year column
 * @method SchoolClass findOneByLevel(int $level) Return the first SchoolClass filtered by the level column
 * @method SchoolClass findOneByRoomNumber(string $room_number) Return the first SchoolClass filtered by the room_number column
 * @method SchoolClass findOneByTeachingUnit(string $teaching_unit) Return the first SchoolClass filtered by the teaching_unit column
 * @method SchoolClass findOneByStudentCount(int $student_count) Return the first SchoolClass filtered by the student_count column
 * @method SchoolClass findOneByClassPortraitId(int $class_portrait_id) Return the first SchoolClass filtered by the class_portrait_id column
 * @method SchoolClass findOneBySubjectId(int $subject_id) Return the first SchoolClass filtered by the subject_id column
 * @method SchoolClass findOneByClassType(string $class_type) Return the first SchoolClass filtered by the class_type column
 * @method SchoolClass findOneByClassScheduleId(int $class_schedule_id) Return the first SchoolClass filtered by the class_schedule_id column
 * @method SchoolClass findOneByWeekScheduleId(int $week_schedule_id) Return the first SchoolClass filtered by the week_schedule_id column
 * @method SchoolClass findOneBySchoolBuildingId(int $school_building_id) Return the first SchoolClass filtered by the school_building_id column
 * @method SchoolClass findOneBySchoolId(int $school_id) Return the first SchoolClass filtered by the school_id column
 * @method SchoolClass findOneByCreatedAt(string $created_at) Return the first SchoolClass filtered by the created_at column
 * @method SchoolClass findOneByUpdatedAt(string $updated_at) Return the first SchoolClass filtered by the updated_at column
 * @method SchoolClass findOneByCreatedBy(int $created_by) Return the first SchoolClass filtered by the created_by column
 * @method SchoolClass findOneByUpdatedBy(int $updated_by) Return the first SchoolClass filtered by the updated_by column
 *
 * @method array findById(int $id) Return SchoolClass objects filtered by the id column
 * @method array findByOriginalId(int $original_id) Return SchoolClass objects filtered by the original_id column
 * @method array findByAncestorClassId(int $ancestor_class_id) Return SchoolClass objects filtered by the ancestor_class_id column
 * @method array findByName(string $name) Return SchoolClass objects filtered by the name column
 * @method array findByUnitName(string $unit_name) Return SchoolClass objects filtered by the unit_name column
 * @method array findBySlug(string $slug) Return SchoolClass objects filtered by the slug column
 * @method array findByYear(int $year) Return SchoolClass objects filtered by the year column
 * @method array findByLevel(int $level) Return SchoolClass objects filtered by the level column
 * @method array findByRoomNumber(string $room_number) Return SchoolClass objects filtered by the room_number column
 * @method array findByTeachingUnit(string $teaching_unit) Return SchoolClass objects filtered by the teaching_unit column
 * @method array findByStudentCount(int $student_count) Return SchoolClass objects filtered by the student_count column
 * @method array findByClassPortraitId(int $class_portrait_id) Return SchoolClass objects filtered by the class_portrait_id column
 * @method array findBySubjectId(int $subject_id) Return SchoolClass objects filtered by the subject_id column
 * @method array findByClassType(string $class_type) Return SchoolClass objects filtered by the class_type column
 * @method array findByClassScheduleId(int $class_schedule_id) Return SchoolClass objects filtered by the class_schedule_id column
 * @method array findByWeekScheduleId(int $week_schedule_id) Return SchoolClass objects filtered by the week_schedule_id column
 * @method array findBySchoolBuildingId(int $school_building_id) Return SchoolClass objects filtered by the school_building_id column
 * @method array findBySchoolId(int $school_id) Return SchoolClass objects filtered by the school_id column
 * @method array findByCreatedAt(string $created_at) Return SchoolClass objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return SchoolClass objects filtered by the updated_at column
 * @method array findByCreatedBy(int $created_by) Return SchoolClass objects filtered by the created_by column
 * @method array findByUpdatedBy(int $updated_by) Return SchoolClass objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseSchoolClassQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSchoolClassQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'rapila';
        }
        if (null === $modelName) {
            $modelName = 'SchoolClass';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SchoolClassQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SchoolClassQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SchoolClassQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SchoolClassQuery) {
            return $criteria;
        }
        $query = new SchoolClassQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   SchoolClass|SchoolClass[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SchoolClassPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SchoolClassPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 SchoolClass A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 SchoolClass A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `original_id`, `ancestor_class_id`, `name`, `unit_name`, `slug`, `year`, `level`, `room_number`, `teaching_unit`, `student_count`, `class_portrait_id`, `subject_id`, `class_type`, `class_schedule_id`, `week_schedule_id`, `school_building_id`, `school_id`, `created_at`, `updated_at`, `created_by`, `updated_by` FROM `school_classes` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new SchoolClass();
            $obj->hydrate($row);
            SchoolClassPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return SchoolClass|SchoolClass[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|SchoolClass[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SchoolClassPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SchoolClassPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SchoolClassPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SchoolClassPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the original_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOriginalId(1234); // WHERE original_id = 1234
     * $query->filterByOriginalId(array(12, 34)); // WHERE original_id IN (12, 34)
     * $query->filterByOriginalId(array('min' => 12)); // WHERE original_id >= 12
     * $query->filterByOriginalId(array('max' => 12)); // WHERE original_id <= 12
     * </code>
     *
     * @param     mixed $originalId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByOriginalId($originalId = null, $comparison = null)
    {
        if (is_array($originalId)) {
            $useMinMax = false;
            if (isset($originalId['min'])) {
                $this->addUsingAlias(SchoolClassPeer::ORIGINAL_ID, $originalId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($originalId['max'])) {
                $this->addUsingAlias(SchoolClassPeer::ORIGINAL_ID, $originalId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::ORIGINAL_ID, $originalId, $comparison);
    }

    /**
     * Filter the query on the ancestor_class_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAncestorClassId(1234); // WHERE ancestor_class_id = 1234
     * $query->filterByAncestorClassId(array(12, 34)); // WHERE ancestor_class_id IN (12, 34)
     * $query->filterByAncestorClassId(array('min' => 12)); // WHERE ancestor_class_id >= 12
     * $query->filterByAncestorClassId(array('max' => 12)); // WHERE ancestor_class_id <= 12
     * </code>
     *
     * @see       filterBySchoolClassRelatedByAncestorClassId()
     *
     * @param     mixed $ancestorClassId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByAncestorClassId($ancestorClassId = null, $comparison = null)
    {
        if (is_array($ancestorClassId)) {
            $useMinMax = false;
            if (isset($ancestorClassId['min'])) {
                $this->addUsingAlias(SchoolClassPeer::ANCESTOR_CLASS_ID, $ancestorClassId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ancestorClassId['max'])) {
                $this->addUsingAlias(SchoolClassPeer::ANCESTOR_CLASS_ID, $ancestorClassId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::ANCESTOR_CLASS_ID, $ancestorClassId, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the unit_name column
     *
     * Example usage:
     * <code>
     * $query->filterByUnitName('fooValue');   // WHERE unit_name = 'fooValue'
     * $query->filterByUnitName('%fooValue%'); // WHERE unit_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $unitName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByUnitName($unitName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unitName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $unitName)) {
                $unitName = str_replace('*', '%', $unitName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::UNIT_NAME, $unitName, $comparison);
    }

    /**
     * Filter the query on the slug column
     *
     * Example usage:
     * <code>
     * $query->filterBySlug('fooValue');   // WHERE slug = 'fooValue'
     * $query->filterBySlug('%fooValue%'); // WHERE slug LIKE '%fooValue%'
     * </code>
     *
     * @param     string $slug The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterBySlug($slug = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slug)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $slug)) {
                $slug = str_replace('*', '%', $slug);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::SLUG, $slug, $comparison);
    }

    /**
     * Filter the query on the year column
     *
     * Example usage:
     * <code>
     * $query->filterByYear(1234); // WHERE year = 1234
     * $query->filterByYear(array(12, 34)); // WHERE year IN (12, 34)
     * $query->filterByYear(array('min' => 12)); // WHERE year >= 12
     * $query->filterByYear(array('max' => 12)); // WHERE year <= 12
     * </code>
     *
     * @param     mixed $year The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByYear($year = null, $comparison = null)
    {
        if (is_array($year)) {
            $useMinMax = false;
            if (isset($year['min'])) {
                $this->addUsingAlias(SchoolClassPeer::YEAR, $year['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($year['max'])) {
                $this->addUsingAlias(SchoolClassPeer::YEAR, $year['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::YEAR, $year, $comparison);
    }

    /**
     * Filter the query on the level column
     *
     * Example usage:
     * <code>
     * $query->filterByLevel(1234); // WHERE level = 1234
     * $query->filterByLevel(array(12, 34)); // WHERE level IN (12, 34)
     * $query->filterByLevel(array('min' => 12)); // WHERE level >= 12
     * $query->filterByLevel(array('max' => 12)); // WHERE level <= 12
     * </code>
     *
     * @param     mixed $level The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(SchoolClassPeer::LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(SchoolClassPeer::LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::LEVEL, $level, $comparison);
    }

    /**
     * Filter the query on the room_number column
     *
     * Example usage:
     * <code>
     * $query->filterByRoomNumber('fooValue');   // WHERE room_number = 'fooValue'
     * $query->filterByRoomNumber('%fooValue%'); // WHERE room_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $roomNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByRoomNumber($roomNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($roomNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $roomNumber)) {
                $roomNumber = str_replace('*', '%', $roomNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::ROOM_NUMBER, $roomNumber, $comparison);
    }

    /**
     * Filter the query on the teaching_unit column
     *
     * Example usage:
     * <code>
     * $query->filterByTeachingUnit('fooValue');   // WHERE teaching_unit = 'fooValue'
     * $query->filterByTeachingUnit('%fooValue%'); // WHERE teaching_unit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $teachingUnit The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByTeachingUnit($teachingUnit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($teachingUnit)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $teachingUnit)) {
                $teachingUnit = str_replace('*', '%', $teachingUnit);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::TEACHING_UNIT, $teachingUnit, $comparison);
    }

    /**
     * Filter the query on the student_count column
     *
     * Example usage:
     * <code>
     * $query->filterByStudentCount(1234); // WHERE student_count = 1234
     * $query->filterByStudentCount(array(12, 34)); // WHERE student_count IN (12, 34)
     * $query->filterByStudentCount(array('min' => 12)); // WHERE student_count >= 12
     * $query->filterByStudentCount(array('max' => 12)); // WHERE student_count <= 12
     * </code>
     *
     * @param     mixed $studentCount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByStudentCount($studentCount = null, $comparison = null)
    {
        if (is_array($studentCount)) {
            $useMinMax = false;
            if (isset($studentCount['min'])) {
                $this->addUsingAlias(SchoolClassPeer::STUDENT_COUNT, $studentCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($studentCount['max'])) {
                $this->addUsingAlias(SchoolClassPeer::STUDENT_COUNT, $studentCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::STUDENT_COUNT, $studentCount, $comparison);
    }

    /**
     * Filter the query on the class_portrait_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClassPortraitId(1234); // WHERE class_portrait_id = 1234
     * $query->filterByClassPortraitId(array(12, 34)); // WHERE class_portrait_id IN (12, 34)
     * $query->filterByClassPortraitId(array('min' => 12)); // WHERE class_portrait_id >= 12
     * $query->filterByClassPortraitId(array('max' => 12)); // WHERE class_portrait_id <= 12
     * </code>
     *
     * @see       filterByDocumentRelatedByClassPortraitId()
     *
     * @param     mixed $classPortraitId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByClassPortraitId($classPortraitId = null, $comparison = null)
    {
        if (is_array($classPortraitId)) {
            $useMinMax = false;
            if (isset($classPortraitId['min'])) {
                $this->addUsingAlias(SchoolClassPeer::CLASS_PORTRAIT_ID, $classPortraitId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($classPortraitId['max'])) {
                $this->addUsingAlias(SchoolClassPeer::CLASS_PORTRAIT_ID, $classPortraitId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::CLASS_PORTRAIT_ID, $classPortraitId, $comparison);
    }

    /**
     * Filter the query on the subject_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySubjectId(1234); // WHERE subject_id = 1234
     * $query->filterBySubjectId(array(12, 34)); // WHERE subject_id IN (12, 34)
     * $query->filterBySubjectId(array('min' => 12)); // WHERE subject_id >= 12
     * $query->filterBySubjectId(array('max' => 12)); // WHERE subject_id <= 12
     * </code>
     *
     * @see       filterBySubject()
     *
     * @param     mixed $subjectId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterBySubjectId($subjectId = null, $comparison = null)
    {
        if (is_array($subjectId)) {
            $useMinMax = false;
            if (isset($subjectId['min'])) {
                $this->addUsingAlias(SchoolClassPeer::SUBJECT_ID, $subjectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($subjectId['max'])) {
                $this->addUsingAlias(SchoolClassPeer::SUBJECT_ID, $subjectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::SUBJECT_ID, $subjectId, $comparison);
    }

    /**
     * Filter the query on the class_type column
     *
     * Example usage:
     * <code>
     * $query->filterByClassType('fooValue');   // WHERE class_type = 'fooValue'
     * $query->filterByClassType('%fooValue%'); // WHERE class_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $classType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByClassType($classType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($classType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $classType)) {
                $classType = str_replace('*', '%', $classType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::CLASS_TYPE, $classType, $comparison);
    }

    /**
     * Filter the query on the class_schedule_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClassScheduleId(1234); // WHERE class_schedule_id = 1234
     * $query->filterByClassScheduleId(array(12, 34)); // WHERE class_schedule_id IN (12, 34)
     * $query->filterByClassScheduleId(array('min' => 12)); // WHERE class_schedule_id >= 12
     * $query->filterByClassScheduleId(array('max' => 12)); // WHERE class_schedule_id <= 12
     * </code>
     *
     * @see       filterByDocumentRelatedByClassScheduleId()
     *
     * @param     mixed $classScheduleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByClassScheduleId($classScheduleId = null, $comparison = null)
    {
        if (is_array($classScheduleId)) {
            $useMinMax = false;
            if (isset($classScheduleId['min'])) {
                $this->addUsingAlias(SchoolClassPeer::CLASS_SCHEDULE_ID, $classScheduleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($classScheduleId['max'])) {
                $this->addUsingAlias(SchoolClassPeer::CLASS_SCHEDULE_ID, $classScheduleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::CLASS_SCHEDULE_ID, $classScheduleId, $comparison);
    }

    /**
     * Filter the query on the week_schedule_id column
     *
     * Example usage:
     * <code>
     * $query->filterByWeekScheduleId(1234); // WHERE week_schedule_id = 1234
     * $query->filterByWeekScheduleId(array(12, 34)); // WHERE week_schedule_id IN (12, 34)
     * $query->filterByWeekScheduleId(array('min' => 12)); // WHERE week_schedule_id >= 12
     * $query->filterByWeekScheduleId(array('max' => 12)); // WHERE week_schedule_id <= 12
     * </code>
     *
     * @see       filterByDocumentRelatedByWeekScheduleId()
     *
     * @param     mixed $weekScheduleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByWeekScheduleId($weekScheduleId = null, $comparison = null)
    {
        if (is_array($weekScheduleId)) {
            $useMinMax = false;
            if (isset($weekScheduleId['min'])) {
                $this->addUsingAlias(SchoolClassPeer::WEEK_SCHEDULE_ID, $weekScheduleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weekScheduleId['max'])) {
                $this->addUsingAlias(SchoolClassPeer::WEEK_SCHEDULE_ID, $weekScheduleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::WEEK_SCHEDULE_ID, $weekScheduleId, $comparison);
    }

    /**
     * Filter the query on the school_building_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySchoolBuildingId(1234); // WHERE school_building_id = 1234
     * $query->filterBySchoolBuildingId(array(12, 34)); // WHERE school_building_id IN (12, 34)
     * $query->filterBySchoolBuildingId(array('min' => 12)); // WHERE school_building_id >= 12
     * $query->filterBySchoolBuildingId(array('max' => 12)); // WHERE school_building_id <= 12
     * </code>
     *
     * @see       filterBySchoolBuilding()
     *
     * @param     mixed $schoolBuildingId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterBySchoolBuildingId($schoolBuildingId = null, $comparison = null)
    {
        if (is_array($schoolBuildingId)) {
            $useMinMax = false;
            if (isset($schoolBuildingId['min'])) {
                $this->addUsingAlias(SchoolClassPeer::SCHOOL_BUILDING_ID, $schoolBuildingId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($schoolBuildingId['max'])) {
                $this->addUsingAlias(SchoolClassPeer::SCHOOL_BUILDING_ID, $schoolBuildingId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::SCHOOL_BUILDING_ID, $schoolBuildingId, $comparison);
    }

    /**
     * Filter the query on the school_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySchoolId(1234); // WHERE school_id = 1234
     * $query->filterBySchoolId(array(12, 34)); // WHERE school_id IN (12, 34)
     * $query->filterBySchoolId(array('min' => 12)); // WHERE school_id >= 12
     * $query->filterBySchoolId(array('max' => 12)); // WHERE school_id <= 12
     * </code>
     *
     * @see       filterBySchool()
     *
     * @param     mixed $schoolId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterBySchoolId($schoolId = null, $comparison = null)
    {
        if (is_array($schoolId)) {
            $useMinMax = false;
            if (isset($schoolId['min'])) {
                $this->addUsingAlias(SchoolClassPeer::SCHOOL_ID, $schoolId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($schoolId['max'])) {
                $this->addUsingAlias(SchoolClassPeer::SCHOOL_ID, $schoolId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::SCHOOL_ID, $schoolId, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SchoolClassPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SchoolClassPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SchoolClassPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SchoolClassPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedBy(1234); // WHERE created_by = 1234
     * $query->filterByCreatedBy(array(12, 34)); // WHERE created_by IN (12, 34)
     * $query->filterByCreatedBy(array('min' => 12)); // WHERE created_by >= 12
     * $query->filterByCreatedBy(array('max' => 12)); // WHERE created_by <= 12
     * </code>
     *
     * @see       filterByUserRelatedByCreatedBy()
     *
     * @param     mixed $createdBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(SchoolClassPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(SchoolClassPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::CREATED_BY, $createdBy, $comparison);
    }

    /**
     * Filter the query on the updated_by column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedBy(1234); // WHERE updated_by = 1234
     * $query->filterByUpdatedBy(array(12, 34)); // WHERE updated_by IN (12, 34)
     * $query->filterByUpdatedBy(array('min' => 12)); // WHERE updated_by >= 12
     * $query->filterByUpdatedBy(array('max' => 12)); // WHERE updated_by <= 12
     * </code>
     *
     * @see       filterByUserRelatedByUpdatedBy()
     *
     * @param     mixed $updatedBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(SchoolClassPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(SchoolClassPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related SchoolClass object
     *
     * @param   SchoolClass|PropelObjectCollection $schoolClass The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySchoolClassRelatedByAncestorClassId($schoolClass, $comparison = null)
    {
        if ($schoolClass instanceof SchoolClass) {
            return $this
                ->addUsingAlias(SchoolClassPeer::ANCESTOR_CLASS_ID, $schoolClass->getId(), $comparison);
        } elseif ($schoolClass instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchoolClassPeer::ANCESTOR_CLASS_ID, $schoolClass->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySchoolClassRelatedByAncestorClassId() only accepts arguments of type SchoolClass or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SchoolClassRelatedByAncestorClassId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinSchoolClassRelatedByAncestorClassId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SchoolClassRelatedByAncestorClassId');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SchoolClassRelatedByAncestorClassId');
        }

        return $this;
    }

    /**
     * Use the SchoolClassRelatedByAncestorClassId relation SchoolClass object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SchoolClassQuery A secondary query class using the current class as primary query
     */
    public function useSchoolClassRelatedByAncestorClassIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSchoolClassRelatedByAncestorClassId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SchoolClassRelatedByAncestorClassId', 'SchoolClassQuery');
    }

    /**
     * Filter the query by a related Document object
     *
     * @param   Document|PropelObjectCollection $document The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDocumentRelatedByClassPortraitId($document, $comparison = null)
    {
        if ($document instanceof Document) {
            return $this
                ->addUsingAlias(SchoolClassPeer::CLASS_PORTRAIT_ID, $document->getId(), $comparison);
        } elseif ($document instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchoolClassPeer::CLASS_PORTRAIT_ID, $document->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByDocumentRelatedByClassPortraitId() only accepts arguments of type Document or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DocumentRelatedByClassPortraitId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinDocumentRelatedByClassPortraitId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DocumentRelatedByClassPortraitId');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'DocumentRelatedByClassPortraitId');
        }

        return $this;
    }

    /**
     * Use the DocumentRelatedByClassPortraitId relation Document object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DocumentQuery A secondary query class using the current class as primary query
     */
    public function useDocumentRelatedByClassPortraitIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDocumentRelatedByClassPortraitId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DocumentRelatedByClassPortraitId', 'DocumentQuery');
    }

    /**
     * Filter the query by a related Subject object
     *
     * @param   Subject|PropelObjectCollection $subject The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySubject($subject, $comparison = null)
    {
        if ($subject instanceof Subject) {
            return $this
                ->addUsingAlias(SchoolClassPeer::SUBJECT_ID, $subject->getId(), $comparison);
        } elseif ($subject instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchoolClassPeer::SUBJECT_ID, $subject->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySubject() only accepts arguments of type Subject or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Subject relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinSubject($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Subject');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Subject');
        }

        return $this;
    }

    /**
     * Use the Subject relation Subject object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SubjectQuery A secondary query class using the current class as primary query
     */
    public function useSubjectQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSubject($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Subject', 'SubjectQuery');
    }

    /**
     * Filter the query by a related Document object
     *
     * @param   Document|PropelObjectCollection $document The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDocumentRelatedByClassScheduleId($document, $comparison = null)
    {
        if ($document instanceof Document) {
            return $this
                ->addUsingAlias(SchoolClassPeer::CLASS_SCHEDULE_ID, $document->getId(), $comparison);
        } elseif ($document instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchoolClassPeer::CLASS_SCHEDULE_ID, $document->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByDocumentRelatedByClassScheduleId() only accepts arguments of type Document or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DocumentRelatedByClassScheduleId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinDocumentRelatedByClassScheduleId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DocumentRelatedByClassScheduleId');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'DocumentRelatedByClassScheduleId');
        }

        return $this;
    }

    /**
     * Use the DocumentRelatedByClassScheduleId relation Document object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DocumentQuery A secondary query class using the current class as primary query
     */
    public function useDocumentRelatedByClassScheduleIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDocumentRelatedByClassScheduleId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DocumentRelatedByClassScheduleId', 'DocumentQuery');
    }

    /**
     * Filter the query by a related Document object
     *
     * @param   Document|PropelObjectCollection $document The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDocumentRelatedByWeekScheduleId($document, $comparison = null)
    {
        if ($document instanceof Document) {
            return $this
                ->addUsingAlias(SchoolClassPeer::WEEK_SCHEDULE_ID, $document->getId(), $comparison);
        } elseif ($document instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchoolClassPeer::WEEK_SCHEDULE_ID, $document->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByDocumentRelatedByWeekScheduleId() only accepts arguments of type Document or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DocumentRelatedByWeekScheduleId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinDocumentRelatedByWeekScheduleId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DocumentRelatedByWeekScheduleId');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'DocumentRelatedByWeekScheduleId');
        }

        return $this;
    }

    /**
     * Use the DocumentRelatedByWeekScheduleId relation Document object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DocumentQuery A secondary query class using the current class as primary query
     */
    public function useDocumentRelatedByWeekScheduleIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDocumentRelatedByWeekScheduleId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DocumentRelatedByWeekScheduleId', 'DocumentQuery');
    }

    /**
     * Filter the query by a related SchoolBuilding object
     *
     * @param   SchoolBuilding|PropelObjectCollection $schoolBuilding The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySchoolBuilding($schoolBuilding, $comparison = null)
    {
        if ($schoolBuilding instanceof SchoolBuilding) {
            return $this
                ->addUsingAlias(SchoolClassPeer::SCHOOL_BUILDING_ID, $schoolBuilding->getId(), $comparison);
        } elseif ($schoolBuilding instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchoolClassPeer::SCHOOL_BUILDING_ID, $schoolBuilding->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySchoolBuilding() only accepts arguments of type SchoolBuilding or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SchoolBuilding relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinSchoolBuilding($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SchoolBuilding');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SchoolBuilding');
        }

        return $this;
    }

    /**
     * Use the SchoolBuilding relation SchoolBuilding object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SchoolBuildingQuery A secondary query class using the current class as primary query
     */
    public function useSchoolBuildingQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSchoolBuilding($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SchoolBuilding', 'SchoolBuildingQuery');
    }

    /**
     * Filter the query by a related School object
     *
     * @param   School|PropelObjectCollection $school The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySchool($school, $comparison = null)
    {
        if ($school instanceof School) {
            return $this
                ->addUsingAlias(SchoolClassPeer::SCHOOL_ID, $school->getId(), $comparison);
        } elseif ($school instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchoolClassPeer::SCHOOL_ID, $school->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySchool() only accepts arguments of type School or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the School relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinSchool($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('School');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'School');
        }

        return $this;
    }

    /**
     * Use the School relation School object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SchoolQuery A secondary query class using the current class as primary query
     */
    public function useSchoolQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSchool($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'School', 'SchoolQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByCreatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(SchoolClassPeer::CREATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchoolClassPeer::CREATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUserRelatedByCreatedBy() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UserRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinUserRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UserRelatedByCreatedBy');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'UserRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the UserRelatedByCreatedBy relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserQuery A secondary query class using the current class as primary query
     */
    public function useUserRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUserRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UserRelatedByCreatedBy', 'UserQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(SchoolClassPeer::UPDATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchoolClassPeer::UPDATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUserRelatedByUpdatedBy() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UserRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinUserRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UserRelatedByUpdatedBy');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'UserRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the UserRelatedByUpdatedBy relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserQuery A secondary query class using the current class as primary query
     */
    public function useUserRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUserRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UserRelatedByUpdatedBy', 'UserQuery');
    }

    /**
     * Filter the query by a related SchoolClass object
     *
     * @param   SchoolClass|PropelObjectCollection $schoolClass  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySchoolClassRelatedById($schoolClass, $comparison = null)
    {
        if ($schoolClass instanceof SchoolClass) {
            return $this
                ->addUsingAlias(SchoolClassPeer::ID, $schoolClass->getAncestorClassId(), $comparison);
        } elseif ($schoolClass instanceof PropelObjectCollection) {
            return $this
                ->useSchoolClassRelatedByIdQuery()
                ->filterByPrimaryKeys($schoolClass->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySchoolClassRelatedById() only accepts arguments of type SchoolClass or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SchoolClassRelatedById relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinSchoolClassRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SchoolClassRelatedById');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SchoolClassRelatedById');
        }

        return $this;
    }

    /**
     * Use the SchoolClassRelatedById relation SchoolClass object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SchoolClassQuery A secondary query class using the current class as primary query
     */
    public function useSchoolClassRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSchoolClassRelatedById($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SchoolClassRelatedById', 'SchoolClassQuery');
    }

    /**
     * Filter the query by a related SchoolClassSubjectClasses object
     *
     * @param   SchoolClassSubjectClasses|PropelObjectCollection $schoolClassSubjectClasses  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySchoolClassSubjectClassesRelatedBySchoolClassId($schoolClassSubjectClasses, $comparison = null)
    {
        if ($schoolClassSubjectClasses instanceof SchoolClassSubjectClasses) {
            return $this
                ->addUsingAlias(SchoolClassPeer::ID, $schoolClassSubjectClasses->getSchoolClassId(), $comparison);
        } elseif ($schoolClassSubjectClasses instanceof PropelObjectCollection) {
            return $this
                ->useSchoolClassSubjectClassesRelatedBySchoolClassIdQuery()
                ->filterByPrimaryKeys($schoolClassSubjectClasses->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySchoolClassSubjectClassesRelatedBySchoolClassId() only accepts arguments of type SchoolClassSubjectClasses or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SchoolClassSubjectClassesRelatedBySchoolClassId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinSchoolClassSubjectClassesRelatedBySchoolClassId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SchoolClassSubjectClassesRelatedBySchoolClassId');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SchoolClassSubjectClassesRelatedBySchoolClassId');
        }

        return $this;
    }

    /**
     * Use the SchoolClassSubjectClassesRelatedBySchoolClassId relation SchoolClassSubjectClasses object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SchoolClassSubjectClassesQuery A secondary query class using the current class as primary query
     */
    public function useSchoolClassSubjectClassesRelatedBySchoolClassIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSchoolClassSubjectClassesRelatedBySchoolClassId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SchoolClassSubjectClassesRelatedBySchoolClassId', 'SchoolClassSubjectClassesQuery');
    }

    /**
     * Filter the query by a related SchoolClassSubjectClasses object
     *
     * @param   SchoolClassSubjectClasses|PropelObjectCollection $schoolClassSubjectClasses  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySchoolClassSubjectClassesRelatedBySubjectClassId($schoolClassSubjectClasses, $comparison = null)
    {
        if ($schoolClassSubjectClasses instanceof SchoolClassSubjectClasses) {
            return $this
                ->addUsingAlias(SchoolClassPeer::ID, $schoolClassSubjectClasses->getSubjectClassId(), $comparison);
        } elseif ($schoolClassSubjectClasses instanceof PropelObjectCollection) {
            return $this
                ->useSchoolClassSubjectClassesRelatedBySubjectClassIdQuery()
                ->filterByPrimaryKeys($schoolClassSubjectClasses->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySchoolClassSubjectClassesRelatedBySubjectClassId() only accepts arguments of type SchoolClassSubjectClasses or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SchoolClassSubjectClassesRelatedBySubjectClassId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinSchoolClassSubjectClassesRelatedBySubjectClassId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SchoolClassSubjectClassesRelatedBySubjectClassId');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SchoolClassSubjectClassesRelatedBySubjectClassId');
        }

        return $this;
    }

    /**
     * Use the SchoolClassSubjectClassesRelatedBySubjectClassId relation SchoolClassSubjectClasses object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SchoolClassSubjectClassesQuery A secondary query class using the current class as primary query
     */
    public function useSchoolClassSubjectClassesRelatedBySubjectClassIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSchoolClassSubjectClassesRelatedBySubjectClassId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SchoolClassSubjectClassesRelatedBySubjectClassId', 'SchoolClassSubjectClassesQuery');
    }

    /**
     * Filter the query by a related ClassStudent object
     *
     * @param   ClassStudent|PropelObjectCollection $classStudent  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClassStudent($classStudent, $comparison = null)
    {
        if ($classStudent instanceof ClassStudent) {
            return $this
                ->addUsingAlias(SchoolClassPeer::ID, $classStudent->getSchoolClassId(), $comparison);
        } elseif ($classStudent instanceof PropelObjectCollection) {
            return $this
                ->useClassStudentQuery()
                ->filterByPrimaryKeys($classStudent->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClassStudent() only accepts arguments of type ClassStudent or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ClassStudent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinClassStudent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ClassStudent');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ClassStudent');
        }

        return $this;
    }

    /**
     * Use the ClassStudent relation ClassStudent object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClassStudentQuery A secondary query class using the current class as primary query
     */
    public function useClassStudentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClassStudent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ClassStudent', 'ClassStudentQuery');
    }

    /**
     * Filter the query by a related ClassLink object
     *
     * @param   ClassLink|PropelObjectCollection $classLink  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClassLink($classLink, $comparison = null)
    {
        if ($classLink instanceof ClassLink) {
            return $this
                ->addUsingAlias(SchoolClassPeer::ID, $classLink->getSchoolClassId(), $comparison);
        } elseif ($classLink instanceof PropelObjectCollection) {
            return $this
                ->useClassLinkQuery()
                ->filterByPrimaryKeys($classLink->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClassLink() only accepts arguments of type ClassLink or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ClassLink relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinClassLink($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ClassLink');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ClassLink');
        }

        return $this;
    }

    /**
     * Use the ClassLink relation ClassLink object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClassLinkQuery A secondary query class using the current class as primary query
     */
    public function useClassLinkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClassLink($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ClassLink', 'ClassLinkQuery');
    }

    /**
     * Filter the query by a related ClassDocument object
     *
     * @param   ClassDocument|PropelObjectCollection $classDocument  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClassDocument($classDocument, $comparison = null)
    {
        if ($classDocument instanceof ClassDocument) {
            return $this
                ->addUsingAlias(SchoolClassPeer::ID, $classDocument->getSchoolClassId(), $comparison);
        } elseif ($classDocument instanceof PropelObjectCollection) {
            return $this
                ->useClassDocumentQuery()
                ->filterByPrimaryKeys($classDocument->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClassDocument() only accepts arguments of type ClassDocument or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ClassDocument relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinClassDocument($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ClassDocument');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ClassDocument');
        }

        return $this;
    }

    /**
     * Use the ClassDocument relation ClassDocument object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClassDocumentQuery A secondary query class using the current class as primary query
     */
    public function useClassDocumentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClassDocument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ClassDocument', 'ClassDocumentQuery');
    }

    /**
     * Filter the query by a related ClassTeacher object
     *
     * @param   ClassTeacher|PropelObjectCollection $classTeacher  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClassTeacher($classTeacher, $comparison = null)
    {
        if ($classTeacher instanceof ClassTeacher) {
            return $this
                ->addUsingAlias(SchoolClassPeer::ID, $classTeacher->getSchoolClassId(), $comparison);
        } elseif ($classTeacher instanceof PropelObjectCollection) {
            return $this
                ->useClassTeacherQuery()
                ->filterByPrimaryKeys($classTeacher->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClassTeacher() only accepts arguments of type ClassTeacher or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ClassTeacher relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinClassTeacher($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ClassTeacher');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ClassTeacher');
        }

        return $this;
    }

    /**
     * Use the ClassTeacher relation ClassTeacher object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClassTeacherQuery A secondary query class using the current class as primary query
     */
    public function useClassTeacherQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClassTeacher($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ClassTeacher', 'ClassTeacherQuery');
    }

    /**
     * Filter the query by a related Event object
     *
     * @param   Event|PropelObjectCollection $event  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEvent($event, $comparison = null)
    {
        if ($event instanceof Event) {
            return $this
                ->addUsingAlias(SchoolClassPeer::ID, $event->getSchoolClassId(), $comparison);
        } elseif ($event instanceof PropelObjectCollection) {
            return $this
                ->useEventQuery()
                ->filterByPrimaryKeys($event->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEvent() only accepts arguments of type Event or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Event relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinEvent($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Event');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Event');
        }

        return $this;
    }

    /**
     * Use the Event relation Event object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EventQuery A secondary query class using the current class as primary query
     */
    public function useEventQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEvent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Event', 'EventQuery');
    }

    /**
     * Filter the query by a related News object
     *
     * @param   News|PropelObjectCollection $news  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByNews($news, $comparison = null)
    {
        if ($news instanceof News) {
            return $this
                ->addUsingAlias(SchoolClassPeer::ID, $news->getSchoolClassId(), $comparison);
        } elseif ($news instanceof PropelObjectCollection) {
            return $this
                ->useNewsQuery()
                ->filterByPrimaryKeys($news->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNews() only accepts arguments of type News or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the News relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function joinNews($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('News');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'News');
        }

        return $this;
    }

    /**
     * Use the News relation News object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   NewsQuery A secondary query class using the current class as primary query
     */
    public function useNewsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinNews($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'News', 'NewsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SchoolClass $schoolClass Object to remove from the list of results
     *
     * @return SchoolClassQuery The current query, for fluid interface
     */
    public function prune($schoolClass = null)
    {
        if ($schoolClass) {
            $this->addUsingAlias(SchoolClassPeer::ID, $schoolClass->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // extended_timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     SchoolClassQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SchoolClassPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     SchoolClassQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SchoolClassPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     SchoolClassQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SchoolClassPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     SchoolClassQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SchoolClassPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     SchoolClassQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SchoolClassPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     SchoolClassQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SchoolClassPeer::CREATED_AT);
    }
    public function findMostRecentUpdate($bAsTimestamp = false) {
        $oQuery = clone $this;
        $sDate = $oQuery->lastUpdatedFirst()->select("UpdatedAt")->findOne();
        if($sDate === null) {
            return null;
        }
        $oDate = new DateTime($sDate);
        if($bAsTimestamp) {
            return $oDate->getTimestamp();
        }
        return $oDate;
    }

    // extended_keyable behavior

    public function filterByPKArray($pkArray) {
            return $this->filterByPrimaryKey($pkArray[0]);
    }

    public function filterByPKString($pkString) {
        return $this->filterByPrimaryKey($pkString);
    }

}
