<?php


/**
 * Base class that represents a query for the 'class_students' table.
 *
 * 
 *
 * @method     ClassStudentQuery orderBySchoolClassId($order = Criteria::ASC) Order by the school_class_id column
 * @method     ClassStudentQuery orderByFunctionName($order = Criteria::ASC) Order by the function_name column
 * @method     ClassStudentQuery orderByStudentId($order = Criteria::ASC) Order by the student_id column
 * @method     ClassStudentQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ClassStudentQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ClassStudentQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     ClassStudentQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     ClassStudentQuery groupBySchoolClassId() Group by the school_class_id column
 * @method     ClassStudentQuery groupByFunctionName() Group by the function_name column
 * @method     ClassStudentQuery groupByStudentId() Group by the student_id column
 * @method     ClassStudentQuery groupByCreatedAt() Group by the created_at column
 * @method     ClassStudentQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ClassStudentQuery groupByCreatedBy() Group by the created_by column
 * @method     ClassStudentQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     ClassStudentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClassStudentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClassStudentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClassStudentQuery leftJoinSchoolClass($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchoolClass relation
 * @method     ClassStudentQuery rightJoinSchoolClass($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchoolClass relation
 * @method     ClassStudentQuery innerJoinSchoolClass($relationAlias = null) Adds a INNER JOIN clause to the query using the SchoolClass relation
 *
 * @method     ClassStudentQuery leftJoinStudent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Student relation
 * @method     ClassStudentQuery rightJoinStudent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Student relation
 * @method     ClassStudentQuery innerJoinStudent($relationAlias = null) Adds a INNER JOIN clause to the query using the Student relation
 *
 * @method     ClassStudentQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     ClassStudentQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     ClassStudentQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method     ClassStudentQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     ClassStudentQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     ClassStudentQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method     ClassStudent findOne(PropelPDO $con = null) Return the first ClassStudent matching the query
 * @method     ClassStudent findOneOrCreate(PropelPDO $con = null) Return the first ClassStudent matching the query, or a new ClassStudent object populated from the query conditions when no match is found
 *
 * @method     ClassStudent findOneBySchoolClassId(int $school_class_id) Return the first ClassStudent filtered by the school_class_id column
 * @method     ClassStudent findOneByFunctionName(string $function_name) Return the first ClassStudent filtered by the function_name column
 * @method     ClassStudent findOneByStudentId(int $student_id) Return the first ClassStudent filtered by the student_id column
 * @method     ClassStudent findOneByCreatedAt(string $created_at) Return the first ClassStudent filtered by the created_at column
 * @method     ClassStudent findOneByUpdatedAt(string $updated_at) Return the first ClassStudent filtered by the updated_at column
 * @method     ClassStudent findOneByCreatedBy(int $created_by) Return the first ClassStudent filtered by the created_by column
 * @method     ClassStudent findOneByUpdatedBy(int $updated_by) Return the first ClassStudent filtered by the updated_by column
 *
 * @method     array findBySchoolClassId(int $school_class_id) Return ClassStudent objects filtered by the school_class_id column
 * @method     array findByFunctionName(string $function_name) Return ClassStudent objects filtered by the function_name column
 * @method     array findByStudentId(int $student_id) Return ClassStudent objects filtered by the student_id column
 * @method     array findByCreatedAt(string $created_at) Return ClassStudent objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return ClassStudent objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return ClassStudent objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return ClassStudent objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseClassStudentQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseClassStudentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'rapila', $modelName = 'ClassStudent', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClassStudentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return    ClassStudentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClassStudentQuery) {
            return $criteria;
        }
        $query = new ClassStudentQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }
        return $query;
    }

    /**
     * Find object by primary key
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     * @param     array[$school_class_id, $student_id] $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return    ClassStudent|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ((null !== ($obj = ClassStudentPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
            // the object is alredy in the instance pool
            return $obj;
        } else {
            // the object has not been requested yet, or the formatter is not an object formatter
            $criteria = $this->isKeepQuery() ? clone $this : $this;
            $stmt = $criteria
                ->filterByPrimaryKey($key)
                ->getSelectStatement($con);
            return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
        }
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        return $this
            ->filterByPrimaryKeys($keys)
            ->find($con);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return    ClassStudentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ClassStudentPeer::SCHOOL_CLASS_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ClassStudentPeer::STUDENT_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return    ClassStudentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ClassStudentPeer::SCHOOL_CLASS_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ClassStudentPeer::STUDENT_ID, $key[1], Criteria::EQUAL);
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
     * $query->filterBySchoolClassId(array('min' => 12)); // WHERE school_class_id > 12
     * </code>
     *
     * @see       filterBySchoolClass()
     *
     * @param     mixed $schoolClassId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    ClassStudentQuery The current query, for fluid interface
     */
    public function filterBySchoolClassId($schoolClassId = null, $comparison = null)
    {
        if (is_array($schoolClassId) && null === $comparison) {
            $comparison = Criteria::IN;
        }
        return $this->addUsingAlias(ClassStudentPeer::SCHOOL_CLASS_ID, $schoolClassId, $comparison);
    }

    /**
     * Filter the query on the function_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFunctionName('fooValue');   // WHERE function_name = 'fooValue'
     * $query->filterByFunctionName('%fooValue%'); // WHERE function_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $functionName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    ClassStudentQuery The current query, for fluid interface
     */
    public function filterByFunctionName($functionName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($functionName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $functionName)) {
                $functionName = str_replace('*', '%', $functionName);
                $comparison = Criteria::LIKE;
            }
        }
        return $this->addUsingAlias(ClassStudentPeer::FUNCTION_NAME, $functionName, $comparison);
    }

    /**
     * Filter the query on the student_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStudentId(1234); // WHERE student_id = 1234
     * $query->filterByStudentId(array(12, 34)); // WHERE student_id IN (12, 34)
     * $query->filterByStudentId(array('min' => 12)); // WHERE student_id > 12
     * </code>
     *
     * @see       filterByStudent()
     *
     * @param     mixed $studentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    ClassStudentQuery The current query, for fluid interface
     */
    public function filterByStudentId($studentId = null, $comparison = null)
    {
        if (is_array($studentId) && null === $comparison) {
            $comparison = Criteria::IN;
        }
        return $this->addUsingAlias(ClassStudentPeer::STUDENT_ID, $studentId, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
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
     * @return    ClassStudentQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ClassStudentPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ClassStudentPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }
        return $this->addUsingAlias(ClassStudentPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
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
     * @return    ClassStudentQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ClassStudentPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ClassStudentPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }
        return $this->addUsingAlias(ClassStudentPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedBy(1234); // WHERE created_by = 1234
     * $query->filterByCreatedBy(array(12, 34)); // WHERE created_by IN (12, 34)
     * $query->filterByCreatedBy(array('min' => 12)); // WHERE created_by > 12
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
     * @return    ClassStudentQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(ClassStudentPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(ClassStudentPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }
        return $this->addUsingAlias(ClassStudentPeer::CREATED_BY, $createdBy, $comparison);
    }

    /**
     * Filter the query on the updated_by column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedBy(1234); // WHERE updated_by = 1234
     * $query->filterByUpdatedBy(array(12, 34)); // WHERE updated_by IN (12, 34)
     * $query->filterByUpdatedBy(array('min' => 12)); // WHERE updated_by > 12
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
     * @return    ClassStudentQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(ClassStudentPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(ClassStudentPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }
        return $this->addUsingAlias(ClassStudentPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related SchoolClass object
     *
     * @param     SchoolClass|PropelCollection $schoolClass The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    ClassStudentQuery The current query, for fluid interface
     */
    public function filterBySchoolClass($schoolClass, $comparison = null)
    {
        if ($schoolClass instanceof SchoolClass) {
            return $this
                ->addUsingAlias(ClassStudentPeer::SCHOOL_CLASS_ID, $schoolClass->getId(), $comparison);
        } elseif ($schoolClass instanceof PropelCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
            return $this
                ->addUsingAlias(ClassStudentPeer::SCHOOL_CLASS_ID, $schoolClass->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySchoolClass() only accepts arguments of type SchoolClass or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SchoolClass relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return    ClassStudentQuery The current query, for fluid interface
     */
    public function joinSchoolClass($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SchoolClass');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SchoolClass');
        }

        return $this;
    }

    /**
     * Use the SchoolClass relation SchoolClass object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return    SchoolClassQuery A secondary query class using the current class as primary query
     */
    public function useSchoolClassQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSchoolClass($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SchoolClass', 'SchoolClassQuery');
    }

    /**
     * Filter the query by a related Student object
     *
     * @param     Student|PropelCollection $student The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    ClassStudentQuery The current query, for fluid interface
     */
    public function filterByStudent($student, $comparison = null)
    {
        if ($student instanceof Student) {
            return $this
                ->addUsingAlias(ClassStudentPeer::STUDENT_ID, $student->getId(), $comparison);
        } elseif ($student instanceof PropelCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
            return $this
                ->addUsingAlias(ClassStudentPeer::STUDENT_ID, $student->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByStudent() only accepts arguments of type Student or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Student relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return    ClassStudentQuery The current query, for fluid interface
     */
    public function joinStudent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Student');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Student');
        }

        return $this;
    }

    /**
     * Use the Student relation Student object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return    StudentQuery A secondary query class using the current class as primary query
     */
    public function useStudentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStudent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Student', 'StudentQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param     User|PropelCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    ClassStudentQuery The current query, for fluid interface
     */
    public function filterByUserRelatedByCreatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ClassStudentPeer::CREATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
            return $this
                ->addUsingAlias(ClassStudentPeer::CREATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return    ClassStudentQuery The current query, for fluid interface
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
        if($relationAlias) {
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
     * @return    UserQuery A secondary query class using the current class as primary query
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
     * @param     User|PropelCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    ClassStudentQuery The current query, for fluid interface
     */
    public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ClassStudentPeer::UPDATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
            return $this
                ->addUsingAlias(ClassStudentPeer::UPDATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return    ClassStudentQuery The current query, for fluid interface
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
        if($relationAlias) {
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
     * @return    UserQuery A secondary query class using the current class as primary query
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
     * @param     ClassStudent $classStudent Object to remove from the list of results
     *
     * @return    ClassStudentQuery The current query, for fluid interface
     */
    public function prune($classStudent = null)
    {
        if ($classStudent) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ClassStudentPeer::SCHOOL_CLASS_ID), $classStudent->getSchoolClassId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ClassStudentPeer::STUDENT_ID), $classStudent->getStudentId(), Criteria::NOT_EQUAL);
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
	 * @return     ClassStudentQuery The current query, for fluid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(ClassStudentPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     ClassStudentQuery The current query, for fluid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(ClassStudentPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     ClassStudentQuery The current query, for fluid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(ClassStudentPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     ClassStudentQuery The current query, for fluid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(ClassStudentPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     ClassStudentQuery The current query, for fluid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(ClassStudentPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     ClassStudentQuery The current query, for fluid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(ClassStudentPeer::CREATED_AT);
	}

} // BaseClassStudentQuery