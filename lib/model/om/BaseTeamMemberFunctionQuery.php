<?php


/**
 * Base class that represents a query for the 'team_member_functions' table.
 *
 *
 *
 * @method TeamMemberFunctionQuery orderByTeamMemberId($order = Criteria::ASC) Order by the team_member_id column
 * @method TeamMemberFunctionQuery orderBySchoolFunctionId($order = Criteria::ASC) Order by the school_function_id column
 * @method TeamMemberFunctionQuery orderByIsMainFunction($order = Criteria::ASC) Order by the is_main_function column
 * @method TeamMemberFunctionQuery orderByIsNewlyUpdated($order = Criteria::ASC) Order by the is_newly_updated column
 * @method TeamMemberFunctionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method TeamMemberFunctionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method TeamMemberFunctionQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method TeamMemberFunctionQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method TeamMemberFunctionQuery groupByTeamMemberId() Group by the team_member_id column
 * @method TeamMemberFunctionQuery groupBySchoolFunctionId() Group by the school_function_id column
 * @method TeamMemberFunctionQuery groupByIsMainFunction() Group by the is_main_function column
 * @method TeamMemberFunctionQuery groupByIsNewlyUpdated() Group by the is_newly_updated column
 * @method TeamMemberFunctionQuery groupByCreatedAt() Group by the created_at column
 * @method TeamMemberFunctionQuery groupByUpdatedAt() Group by the updated_at column
 * @method TeamMemberFunctionQuery groupByCreatedBy() Group by the created_by column
 * @method TeamMemberFunctionQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method TeamMemberFunctionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TeamMemberFunctionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TeamMemberFunctionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TeamMemberFunctionQuery leftJoinTeamMember($relationAlias = null) Adds a LEFT JOIN clause to the query using the TeamMember relation
 * @method TeamMemberFunctionQuery rightJoinTeamMember($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TeamMember relation
 * @method TeamMemberFunctionQuery innerJoinTeamMember($relationAlias = null) Adds a INNER JOIN clause to the query using the TeamMember relation
 *
 * @method TeamMemberFunctionQuery leftJoinSchoolFunction($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchoolFunction relation
 * @method TeamMemberFunctionQuery rightJoinSchoolFunction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchoolFunction relation
 * @method TeamMemberFunctionQuery innerJoinSchoolFunction($relationAlias = null) Adds a INNER JOIN clause to the query using the SchoolFunction relation
 *
 * @method TeamMemberFunctionQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method TeamMemberFunctionQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method TeamMemberFunctionQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method TeamMemberFunctionQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method TeamMemberFunctionQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method TeamMemberFunctionQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method TeamMemberFunction findOne(PropelPDO $con = null) Return the first TeamMemberFunction matching the query
 * @method TeamMemberFunction findOneOrCreate(PropelPDO $con = null) Return the first TeamMemberFunction matching the query, or a new TeamMemberFunction object populated from the query conditions when no match is found
 *
 * @method TeamMemberFunction findOneByTeamMemberId(int $team_member_id) Return the first TeamMemberFunction filtered by the team_member_id column
 * @method TeamMemberFunction findOneBySchoolFunctionId(int $school_function_id) Return the first TeamMemberFunction filtered by the school_function_id column
 * @method TeamMemberFunction findOneByIsMainFunction(boolean $is_main_function) Return the first TeamMemberFunction filtered by the is_main_function column
 * @method TeamMemberFunction findOneByIsNewlyUpdated(boolean $is_newly_updated) Return the first TeamMemberFunction filtered by the is_newly_updated column
 * @method TeamMemberFunction findOneByCreatedAt(string $created_at) Return the first TeamMemberFunction filtered by the created_at column
 * @method TeamMemberFunction findOneByUpdatedAt(string $updated_at) Return the first TeamMemberFunction filtered by the updated_at column
 * @method TeamMemberFunction findOneByCreatedBy(int $created_by) Return the first TeamMemberFunction filtered by the created_by column
 * @method TeamMemberFunction findOneByUpdatedBy(int $updated_by) Return the first TeamMemberFunction filtered by the updated_by column
 *
 * @method array findByTeamMemberId(int $team_member_id) Return TeamMemberFunction objects filtered by the team_member_id column
 * @method array findBySchoolFunctionId(int $school_function_id) Return TeamMemberFunction objects filtered by the school_function_id column
 * @method array findByIsMainFunction(boolean $is_main_function) Return TeamMemberFunction objects filtered by the is_main_function column
 * @method array findByIsNewlyUpdated(boolean $is_newly_updated) Return TeamMemberFunction objects filtered by the is_newly_updated column
 * @method array findByCreatedAt(string $created_at) Return TeamMemberFunction objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return TeamMemberFunction objects filtered by the updated_at column
 * @method array findByCreatedBy(int $created_by) Return TeamMemberFunction objects filtered by the created_by column
 * @method array findByUpdatedBy(int $updated_by) Return TeamMemberFunction objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseTeamMemberFunctionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTeamMemberFunctionQuery object.
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
            $modelName = 'TeamMemberFunction';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TeamMemberFunctionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TeamMemberFunctionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TeamMemberFunctionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TeamMemberFunctionQuery) {
            return $criteria;
        }
        $query = new TeamMemberFunctionQuery(null, null, $modelAlias);

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
                         A Primary key composition: [$team_member_id, $school_function_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   TeamMemberFunction|TeamMemberFunction[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TeamMemberFunctionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TeamMemberFunctionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TeamMemberFunction A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `team_member_id`, `school_function_id`, `is_main_function`, `is_newly_updated`, `created_at`, `updated_at`, `created_by`, `updated_by` FROM `team_member_functions` WHERE `team_member_id` = :p0 AND `school_function_id` = :p1';
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
            $obj = new TeamMemberFunction();
            $obj->hydrate($row);
            TeamMemberFunctionPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return TeamMemberFunction|TeamMemberFunction[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TeamMemberFunction[]|mixed the list of results, formatted by the current formatter
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
     * @return TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(TeamMemberFunctionPeer::TEAM_MEMBER_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(TeamMemberFunctionPeer::TEAM_MEMBER_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the team_member_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTeamMemberId(1234); // WHERE team_member_id = 1234
     * $query->filterByTeamMemberId(array(12, 34)); // WHERE team_member_id IN (12, 34)
     * $query->filterByTeamMemberId(array('min' => 12)); // WHERE team_member_id >= 12
     * $query->filterByTeamMemberId(array('max' => 12)); // WHERE team_member_id <= 12
     * </code>
     *
     * @see       filterByTeamMember()
     *
     * @param     mixed $teamMemberId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function filterByTeamMemberId($teamMemberId = null, $comparison = null)
    {
        if (is_array($teamMemberId)) {
            $useMinMax = false;
            if (isset($teamMemberId['min'])) {
                $this->addUsingAlias(TeamMemberFunctionPeer::TEAM_MEMBER_ID, $teamMemberId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($teamMemberId['max'])) {
                $this->addUsingAlias(TeamMemberFunctionPeer::TEAM_MEMBER_ID, $teamMemberId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamMemberFunctionPeer::TEAM_MEMBER_ID, $teamMemberId, $comparison);
    }

    /**
     * Filter the query on the school_function_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySchoolFunctionId(1234); // WHERE school_function_id = 1234
     * $query->filterBySchoolFunctionId(array(12, 34)); // WHERE school_function_id IN (12, 34)
     * $query->filterBySchoolFunctionId(array('min' => 12)); // WHERE school_function_id >= 12
     * $query->filterBySchoolFunctionId(array('max' => 12)); // WHERE school_function_id <= 12
     * </code>
     *
     * @see       filterBySchoolFunction()
     *
     * @param     mixed $schoolFunctionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function filterBySchoolFunctionId($schoolFunctionId = null, $comparison = null)
    {
        if (is_array($schoolFunctionId)) {
            $useMinMax = false;
            if (isset($schoolFunctionId['min'])) {
                $this->addUsingAlias(TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, $schoolFunctionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($schoolFunctionId['max'])) {
                $this->addUsingAlias(TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, $schoolFunctionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, $schoolFunctionId, $comparison);
    }

    /**
     * Filter the query on the is_main_function column
     *
     * Example usage:
     * <code>
     * $query->filterByIsMainFunction(true); // WHERE is_main_function = true
     * $query->filterByIsMainFunction('yes'); // WHERE is_main_function = true
     * </code>
     *
     * @param     boolean|string $isMainFunction The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function filterByIsMainFunction($isMainFunction = null, $comparison = null)
    {
        if (is_string($isMainFunction)) {
            $isMainFunction = in_array(strtolower($isMainFunction), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TeamMemberFunctionPeer::IS_MAIN_FUNCTION, $isMainFunction, $comparison);
    }

    /**
     * Filter the query on the is_newly_updated column
     *
     * Example usage:
     * <code>
     * $query->filterByIsNewlyUpdated(true); // WHERE is_newly_updated = true
     * $query->filterByIsNewlyUpdated('yes'); // WHERE is_newly_updated = true
     * </code>
     *
     * @param     boolean|string $isNewlyUpdated The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function filterByIsNewlyUpdated($isNewlyUpdated = null, $comparison = null)
    {
        if (is_string($isNewlyUpdated)) {
            $isNewlyUpdated = in_array(strtolower($isNewlyUpdated), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TeamMemberFunctionPeer::IS_NEWLY_UPDATED, $isNewlyUpdated, $comparison);
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
     * @return TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TeamMemberFunctionPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TeamMemberFunctionPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamMemberFunctionPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TeamMemberFunctionPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TeamMemberFunctionPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamMemberFunctionPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(TeamMemberFunctionPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(TeamMemberFunctionPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamMemberFunctionPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(TeamMemberFunctionPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(TeamMemberFunctionPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamMemberFunctionPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related TeamMember object
     *
     * @param   TeamMember|PropelObjectCollection $teamMember The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TeamMemberFunctionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTeamMember($teamMember, $comparison = null)
    {
        if ($teamMember instanceof TeamMember) {
            return $this
                ->addUsingAlias(TeamMemberFunctionPeer::TEAM_MEMBER_ID, $teamMember->getId(), $comparison);
        } elseif ($teamMember instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TeamMemberFunctionPeer::TEAM_MEMBER_ID, $teamMember->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTeamMember() only accepts arguments of type TeamMember or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TeamMember relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function joinTeamMember($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TeamMember');

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
            $this->addJoinObject($join, 'TeamMember');
        }

        return $this;
    }

    /**
     * Use the TeamMember relation TeamMember object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TeamMemberQuery A secondary query class using the current class as primary query
     */
    public function useTeamMemberQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTeamMember($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TeamMember', 'TeamMemberQuery');
    }

    /**
     * Filter the query by a related SchoolFunction object
     *
     * @param   SchoolFunction|PropelObjectCollection $schoolFunction The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TeamMemberFunctionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySchoolFunction($schoolFunction, $comparison = null)
    {
        if ($schoolFunction instanceof SchoolFunction) {
            return $this
                ->addUsingAlias(TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, $schoolFunction->getId(), $comparison);
        } elseif ($schoolFunction instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, $schoolFunction->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySchoolFunction() only accepts arguments of type SchoolFunction or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SchoolFunction relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function joinSchoolFunction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SchoolFunction');

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
            $this->addJoinObject($join, 'SchoolFunction');
        }

        return $this;
    }

    /**
     * Use the SchoolFunction relation SchoolFunction object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SchoolFunctionQuery A secondary query class using the current class as primary query
     */
    public function useSchoolFunctionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSchoolFunction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SchoolFunction', 'SchoolFunctionQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TeamMemberFunctionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByCreatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(TeamMemberFunctionPeer::CREATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TeamMemberFunctionPeer::CREATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return TeamMemberFunctionQuery The current query, for fluid interface
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
     * @return                 TeamMemberFunctionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(TeamMemberFunctionPeer::UPDATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TeamMemberFunctionPeer::UPDATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return TeamMemberFunctionQuery The current query, for fluid interface
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
     * @param   TeamMemberFunction $teamMemberFunction Object to remove from the list of results
     *
     * @return TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function prune($teamMemberFunction = null)
    {
        if ($teamMemberFunction) {
            $this->addCond('pruneCond0', $this->getAliasedColName(TeamMemberFunctionPeer::TEAM_MEMBER_ID), $teamMemberFunction->getTeamMemberId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID), $teamMemberFunction->getSchoolFunctionId(), Criteria::NOT_EQUAL);
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
     * @return     TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(TeamMemberFunctionPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(TeamMemberFunctionPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(TeamMemberFunctionPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(TeamMemberFunctionPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(TeamMemberFunctionPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     TeamMemberFunctionQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(TeamMemberFunctionPeer::CREATED_AT);
    }
    public function findMostRecentUpdate() {
        $oQuery = clone $this;
        $sDate = $oQuery->lastUpdatedFirst()->select("UpdatedAt")->findOne();
        return new DateTime($sDate);
    }

    // extended_keyable behavior

    public function filterByPKArray($pkArray) {
        return $this->filterByPrimaryKey($pkArray);
    }

    public function filterByPKString($pkString) {
        return $this->filterByPrimaryKey(explode("_", $pkString));
    }

}
