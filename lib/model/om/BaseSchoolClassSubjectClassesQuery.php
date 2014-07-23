<?php


/**
 * Base class that represents a query for the 'school_class_subject_classes' table.
 *
 *
 *
 * @method SchoolClassSubjectClassesQuery orderBySchoolClassId($order = Criteria::ASC) Order by the school_class_id column
 * @method SchoolClassSubjectClassesQuery orderBySubjectClassId($order = Criteria::ASC) Order by the subject_class_id column
 * @method SchoolClassSubjectClassesQuery orderByStudentCount($order = Criteria::ASC) Order by the student_count column
 * @method SchoolClassSubjectClassesQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method SchoolClassSubjectClassesQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method SchoolClassSubjectClassesQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method SchoolClassSubjectClassesQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method SchoolClassSubjectClassesQuery groupBySchoolClassId() Group by the school_class_id column
 * @method SchoolClassSubjectClassesQuery groupBySubjectClassId() Group by the subject_class_id column
 * @method SchoolClassSubjectClassesQuery groupByStudentCount() Group by the student_count column
 * @method SchoolClassSubjectClassesQuery groupByCreatedAt() Group by the created_at column
 * @method SchoolClassSubjectClassesQuery groupByUpdatedAt() Group by the updated_at column
 * @method SchoolClassSubjectClassesQuery groupByCreatedBy() Group by the created_by column
 * @method SchoolClassSubjectClassesQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method SchoolClassSubjectClassesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SchoolClassSubjectClassesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SchoolClassSubjectClassesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SchoolClassSubjectClassesQuery leftJoinSchoolClassRelatedBySchoolClassId($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchoolClassRelatedBySchoolClassId relation
 * @method SchoolClassSubjectClassesQuery rightJoinSchoolClassRelatedBySchoolClassId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchoolClassRelatedBySchoolClassId relation
 * @method SchoolClassSubjectClassesQuery innerJoinSchoolClassRelatedBySchoolClassId($relationAlias = null) Adds a INNER JOIN clause to the query using the SchoolClassRelatedBySchoolClassId relation
 *
 * @method SchoolClassSubjectClassesQuery leftJoinSchoolClassRelatedBySubjectClassId($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchoolClassRelatedBySubjectClassId relation
 * @method SchoolClassSubjectClassesQuery rightJoinSchoolClassRelatedBySubjectClassId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchoolClassRelatedBySubjectClassId relation
 * @method SchoolClassSubjectClassesQuery innerJoinSchoolClassRelatedBySubjectClassId($relationAlias = null) Adds a INNER JOIN clause to the query using the SchoolClassRelatedBySubjectClassId relation
 *
 * @method SchoolClassSubjectClassesQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method SchoolClassSubjectClassesQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method SchoolClassSubjectClassesQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method SchoolClassSubjectClassesQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method SchoolClassSubjectClassesQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method SchoolClassSubjectClassesQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method SchoolClassSubjectClasses findOne(PropelPDO $con = null) Return the first SchoolClassSubjectClasses matching the query
 * @method SchoolClassSubjectClasses findOneOrCreate(PropelPDO $con = null) Return the first SchoolClassSubjectClasses matching the query, or a new SchoolClassSubjectClasses object populated from the query conditions when no match is found
 *
 * @method SchoolClassSubjectClasses findOneBySchoolClassId(int $school_class_id) Return the first SchoolClassSubjectClasses filtered by the school_class_id column
 * @method SchoolClassSubjectClasses findOneBySubjectClassId(int $subject_class_id) Return the first SchoolClassSubjectClasses filtered by the subject_class_id column
 * @method SchoolClassSubjectClasses findOneByStudentCount(int $student_count) Return the first SchoolClassSubjectClasses filtered by the student_count column
 * @method SchoolClassSubjectClasses findOneByCreatedAt(string $created_at) Return the first SchoolClassSubjectClasses filtered by the created_at column
 * @method SchoolClassSubjectClasses findOneByUpdatedAt(string $updated_at) Return the first SchoolClassSubjectClasses filtered by the updated_at column
 * @method SchoolClassSubjectClasses findOneByCreatedBy(int $created_by) Return the first SchoolClassSubjectClasses filtered by the created_by column
 * @method SchoolClassSubjectClasses findOneByUpdatedBy(int $updated_by) Return the first SchoolClassSubjectClasses filtered by the updated_by column
 *
 * @method array findBySchoolClassId(int $school_class_id) Return SchoolClassSubjectClasses objects filtered by the school_class_id column
 * @method array findBySubjectClassId(int $subject_class_id) Return SchoolClassSubjectClasses objects filtered by the subject_class_id column
 * @method array findByStudentCount(int $student_count) Return SchoolClassSubjectClasses objects filtered by the student_count column
 * @method array findByCreatedAt(string $created_at) Return SchoolClassSubjectClasses objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return SchoolClassSubjectClasses objects filtered by the updated_at column
 * @method array findByCreatedBy(int $created_by) Return SchoolClassSubjectClasses objects filtered by the created_by column
 * @method array findByUpdatedBy(int $updated_by) Return SchoolClassSubjectClasses objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseSchoolClassSubjectClassesQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSchoolClassSubjectClassesQuery object.
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
            $modelName = 'SchoolClassSubjectClasses';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SchoolClassSubjectClassesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SchoolClassSubjectClassesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SchoolClassSubjectClassesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SchoolClassSubjectClassesQuery) {
            return $criteria;
        }
        $query = new SchoolClassSubjectClassesQuery(null, null, $modelAlias);

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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$school_class_id, $subject_class_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   SchoolClassSubjectClasses|SchoolClassSubjectClasses[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SchoolClassSubjectClassesPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SchoolClassSubjectClassesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 SchoolClassSubjectClasses A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `school_class_id`, `subject_class_id`, `student_count`, `created_at`, `updated_at`, `created_by`, `updated_by` FROM `school_class_subject_classes` WHERE `school_class_id` = :p0 AND `subject_class_id` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new SchoolClassSubjectClasses();
            $obj->hydrate($row);
            SchoolClassSubjectClassesPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return SchoolClassSubjectClasses|SchoolClassSubjectClasses[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|SchoolClassSubjectClasses[]|mixed the list of results, formatted by the current formatter
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
     * @return SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the school_class_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySchoolClassId(1234); // WHERE school_class_id = 1234
     * $query->filterBySchoolClassId(array(12, 34)); // WHERE school_class_id IN (12, 34)
     * $query->filterBySchoolClassId(array('min' => 12)); // WHERE school_class_id >= 12
     * $query->filterBySchoolClassId(array('max' => 12)); // WHERE school_class_id <= 12
     * </code>
     *
     * @see       filterBySchoolClassRelatedBySchoolClassId()
     *
     * @param     mixed $schoolClassId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function filterBySchoolClassId($schoolClassId = null, $comparison = null)
    {
        if (is_array($schoolClassId)) {
            $useMinMax = false;
            if (isset($schoolClassId['min'])) {
                $this->addUsingAlias(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, $schoolClassId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($schoolClassId['max'])) {
                $this->addUsingAlias(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, $schoolClassId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, $schoolClassId, $comparison);
    }

    /**
     * Filter the query on the subject_class_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySubjectClassId(1234); // WHERE subject_class_id = 1234
     * $query->filterBySubjectClassId(array(12, 34)); // WHERE subject_class_id IN (12, 34)
     * $query->filterBySubjectClassId(array('min' => 12)); // WHERE subject_class_id >= 12
     * $query->filterBySubjectClassId(array('max' => 12)); // WHERE subject_class_id <= 12
     * </code>
     *
     * @see       filterBySchoolClassRelatedBySubjectClassId()
     *
     * @param     mixed $subjectClassId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function filterBySubjectClassId($subjectClassId = null, $comparison = null)
    {
        if (is_array($subjectClassId)) {
            $useMinMax = false;
            if (isset($subjectClassId['min'])) {
                $this->addUsingAlias(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, $subjectClassId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($subjectClassId['max'])) {
                $this->addUsingAlias(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, $subjectClassId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, $subjectClassId, $comparison);
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
     * @return SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function filterByStudentCount($studentCount = null, $comparison = null)
    {
        if (is_array($studentCount)) {
            $useMinMax = false;
            if (isset($studentCount['min'])) {
                $this->addUsingAlias(SchoolClassSubjectClassesPeer::STUDENT_COUNT, $studentCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($studentCount['max'])) {
                $this->addUsingAlias(SchoolClassSubjectClassesPeer::STUDENT_COUNT, $studentCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassSubjectClassesPeer::STUDENT_COUNT, $studentCount, $comparison);
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
     * @return SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SchoolClassSubjectClassesPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SchoolClassSubjectClassesPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassSubjectClassesPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SchoolClassSubjectClassesPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SchoolClassSubjectClassesPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassSubjectClassesPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(SchoolClassSubjectClassesPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(SchoolClassSubjectClassesPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassSubjectClassesPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(SchoolClassSubjectClassesPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(SchoolClassSubjectClassesPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolClassSubjectClassesPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related SchoolClass object
     *
     * @param   SchoolClass|PropelObjectCollection $schoolClass The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassSubjectClassesQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySchoolClassRelatedBySchoolClassId($schoolClass, $comparison = null)
    {
        if ($schoolClass instanceof SchoolClass) {
            return $this
                ->addUsingAlias(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, $schoolClass->getId(), $comparison);
        } elseif ($schoolClass instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID, $schoolClass->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySchoolClassRelatedBySchoolClassId() only accepts arguments of type SchoolClass or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SchoolClassRelatedBySchoolClassId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function joinSchoolClassRelatedBySchoolClassId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SchoolClassRelatedBySchoolClassId');

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
            $this->addJoinObject($join, 'SchoolClassRelatedBySchoolClassId');
        }

        return $this;
    }

    /**
     * Use the SchoolClassRelatedBySchoolClassId relation SchoolClass object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SchoolClassQuery A secondary query class using the current class as primary query
     */
    public function useSchoolClassRelatedBySchoolClassIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSchoolClassRelatedBySchoolClassId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SchoolClassRelatedBySchoolClassId', 'SchoolClassQuery');
    }

    /**
     * Filter the query by a related SchoolClass object
     *
     * @param   SchoolClass|PropelObjectCollection $schoolClass The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassSubjectClassesQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySchoolClassRelatedBySubjectClassId($schoolClass, $comparison = null)
    {
        if ($schoolClass instanceof SchoolClass) {
            return $this
                ->addUsingAlias(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, $schoolClass->getId(), $comparison);
        } elseif ($schoolClass instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID, $schoolClass->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySchoolClassRelatedBySubjectClassId() only accepts arguments of type SchoolClass or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SchoolClassRelatedBySubjectClassId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function joinSchoolClassRelatedBySubjectClassId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SchoolClassRelatedBySubjectClassId');

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
            $this->addJoinObject($join, 'SchoolClassRelatedBySubjectClassId');
        }

        return $this;
    }

    /**
     * Use the SchoolClassRelatedBySubjectClassId relation SchoolClass object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SchoolClassQuery A secondary query class using the current class as primary query
     */
    public function useSchoolClassRelatedBySubjectClassIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSchoolClassRelatedBySubjectClassId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SchoolClassRelatedBySubjectClassId', 'SchoolClassQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolClassSubjectClassesQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByCreatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(SchoolClassSubjectClassesPeer::CREATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchoolClassSubjectClassesPeer::CREATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return SchoolClassSubjectClassesQuery The current query, for fluid interface
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
     * @return                 SchoolClassSubjectClassesQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(SchoolClassSubjectClassesPeer::UPDATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchoolClassSubjectClassesPeer::UPDATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return SchoolClassSubjectClassesQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   SchoolClassSubjectClasses $schoolClassSubjectClasses Object to remove from the list of results
     *
     * @return SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function prune($schoolClassSubjectClasses = null)
    {
        if ($schoolClassSubjectClasses) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SchoolClassSubjectClassesPeer::SCHOOL_CLASS_ID), $schoolClassSubjectClasses->getSchoolClassId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SchoolClassSubjectClassesPeer::SUBJECT_CLASS_ID), $schoolClassSubjectClasses->getSubjectClassId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    // extended_timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SchoolClassSubjectClassesPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SchoolClassSubjectClassesPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SchoolClassSubjectClassesPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SchoolClassSubjectClassesPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SchoolClassSubjectClassesPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     SchoolClassSubjectClassesQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SchoolClassSubjectClassesPeer::CREATED_AT);
    }
    // extended_keyable behavior

    public function filterByPKArray($pkArray) {
        return $this->filterByPrimaryKey($pkArray);
    }

    public function filterByPKString($pkString) {
        return $this->filterByPrimaryKey(explode("_", $pkString));
    }

}
