<?php


/**
 * Base class that represents a query for the 'service_members' table.
 *
 *
 *
 * @method ServiceMemberQuery orderByServiceId($order = Criteria::ASC) Order by the service_id column
 * @method ServiceMemberQuery orderByFunctionName($order = Criteria::ASC) Order by the function_name column
 * @method ServiceMemberQuery orderByTeamMemberId($order = Criteria::ASC) Order by the team_member_id column
 * @method ServiceMemberQuery orderBySort($order = Criteria::ASC) Order by the sort column
 * @method ServiceMemberQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ServiceMemberQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method ServiceMemberQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method ServiceMemberQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method ServiceMemberQuery groupByServiceId() Group by the service_id column
 * @method ServiceMemberQuery groupByFunctionName() Group by the function_name column
 * @method ServiceMemberQuery groupByTeamMemberId() Group by the team_member_id column
 * @method ServiceMemberQuery groupBySort() Group by the sort column
 * @method ServiceMemberQuery groupByCreatedAt() Group by the created_at column
 * @method ServiceMemberQuery groupByUpdatedAt() Group by the updated_at column
 * @method ServiceMemberQuery groupByCreatedBy() Group by the created_by column
 * @method ServiceMemberQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method ServiceMemberQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ServiceMemberQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ServiceMemberQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ServiceMemberQuery leftJoinService($relationAlias = null) Adds a LEFT JOIN clause to the query using the Service relation
 * @method ServiceMemberQuery rightJoinService($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Service relation
 * @method ServiceMemberQuery innerJoinService($relationAlias = null) Adds a INNER JOIN clause to the query using the Service relation
 *
 * @method ServiceMemberQuery leftJoinTeamMember($relationAlias = null) Adds a LEFT JOIN clause to the query using the TeamMember relation
 * @method ServiceMemberQuery rightJoinTeamMember($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TeamMember relation
 * @method ServiceMemberQuery innerJoinTeamMember($relationAlias = null) Adds a INNER JOIN clause to the query using the TeamMember relation
 *
 * @method ServiceMemberQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method ServiceMemberQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method ServiceMemberQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method ServiceMemberQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method ServiceMemberQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method ServiceMemberQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method ServiceMember findOne(PropelPDO $con = null) Return the first ServiceMember matching the query
 * @method ServiceMember findOneOrCreate(PropelPDO $con = null) Return the first ServiceMember matching the query, or a new ServiceMember object populated from the query conditions when no match is found
 *
 * @method ServiceMember findOneByServiceId(int $service_id) Return the first ServiceMember filtered by the service_id column
 * @method ServiceMember findOneByFunctionName(string $function_name) Return the first ServiceMember filtered by the function_name column
 * @method ServiceMember findOneByTeamMemberId(int $team_member_id) Return the first ServiceMember filtered by the team_member_id column
 * @method ServiceMember findOneBySort(int $sort) Return the first ServiceMember filtered by the sort column
 * @method ServiceMember findOneByCreatedAt(string $created_at) Return the first ServiceMember filtered by the created_at column
 * @method ServiceMember findOneByUpdatedAt(string $updated_at) Return the first ServiceMember filtered by the updated_at column
 * @method ServiceMember findOneByCreatedBy(int $created_by) Return the first ServiceMember filtered by the created_by column
 * @method ServiceMember findOneByUpdatedBy(int $updated_by) Return the first ServiceMember filtered by the updated_by column
 *
 * @method array findByServiceId(int $service_id) Return ServiceMember objects filtered by the service_id column
 * @method array findByFunctionName(string $function_name) Return ServiceMember objects filtered by the function_name column
 * @method array findByTeamMemberId(int $team_member_id) Return ServiceMember objects filtered by the team_member_id column
 * @method array findBySort(int $sort) Return ServiceMember objects filtered by the sort column
 * @method array findByCreatedAt(string $created_at) Return ServiceMember objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ServiceMember objects filtered by the updated_at column
 * @method array findByCreatedBy(int $created_by) Return ServiceMember objects filtered by the created_by column
 * @method array findByUpdatedBy(int $updated_by) Return ServiceMember objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseServiceMemberQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseServiceMemberQuery object.
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
            $modelName = 'ServiceMember';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ServiceMemberQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ServiceMemberQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ServiceMemberQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ServiceMemberQuery) {
            return $criteria;
        }
        $query = new ServiceMemberQuery(null, null, $modelAlias);

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
                         A Primary key composition: [$service_id, $team_member_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ServiceMember|ServiceMember[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ServiceMemberPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ServiceMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ServiceMember A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `service_id`, `function_name`, `team_member_id`, `sort`, `created_at`, `updated_at`, `created_by`, `updated_by` FROM `service_members` WHERE `service_id` = :p0 AND `team_member_id` = :p1';
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
            $obj = new ServiceMember();
            $obj->hydrate($row);
            ServiceMemberPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ServiceMember|ServiceMember[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ServiceMember[]|mixed the list of results, formatted by the current formatter
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
     * @return ServiceMemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ServiceMemberPeer::SERVICE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ServiceMemberPeer::TEAM_MEMBER_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ServiceMemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ServiceMemberPeer::SERVICE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ServiceMemberPeer::TEAM_MEMBER_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the service_id column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceId(1234); // WHERE service_id = 1234
     * $query->filterByServiceId(array(12, 34)); // WHERE service_id IN (12, 34)
     * $query->filterByServiceId(array('min' => 12)); // WHERE service_id >= 12
     * $query->filterByServiceId(array('max' => 12)); // WHERE service_id <= 12
     * </code>
     *
     * @see       filterByService()
     *
     * @param     mixed $serviceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceMemberQuery The current query, for fluid interface
     */
    public function filterByServiceId($serviceId = null, $comparison = null)
    {
        if (is_array($serviceId)) {
            $useMinMax = false;
            if (isset($serviceId['min'])) {
                $this->addUsingAlias(ServiceMemberPeer::SERVICE_ID, $serviceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($serviceId['max'])) {
                $this->addUsingAlias(ServiceMemberPeer::SERVICE_ID, $serviceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServiceMemberPeer::SERVICE_ID, $serviceId, $comparison);
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
     * @return ServiceMemberQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ServiceMemberPeer::FUNCTION_NAME, $functionName, $comparison);
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
     * @return ServiceMemberQuery The current query, for fluid interface
     */
    public function filterByTeamMemberId($teamMemberId = null, $comparison = null)
    {
        if (is_array($teamMemberId)) {
            $useMinMax = false;
            if (isset($teamMemberId['min'])) {
                $this->addUsingAlias(ServiceMemberPeer::TEAM_MEMBER_ID, $teamMemberId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($teamMemberId['max'])) {
                $this->addUsingAlias(ServiceMemberPeer::TEAM_MEMBER_ID, $teamMemberId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServiceMemberPeer::TEAM_MEMBER_ID, $teamMemberId, $comparison);
    }

    /**
     * Filter the query on the sort column
     *
     * Example usage:
     * <code>
     * $query->filterBySort(1234); // WHERE sort = 1234
     * $query->filterBySort(array(12, 34)); // WHERE sort IN (12, 34)
     * $query->filterBySort(array('min' => 12)); // WHERE sort >= 12
     * $query->filterBySort(array('max' => 12)); // WHERE sort <= 12
     * </code>
     *
     * @param     mixed $sort The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceMemberQuery The current query, for fluid interface
     */
    public function filterBySort($sort = null, $comparison = null)
    {
        if (is_array($sort)) {
            $useMinMax = false;
            if (isset($sort['min'])) {
                $this->addUsingAlias(ServiceMemberPeer::SORT, $sort['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sort['max'])) {
                $this->addUsingAlias(ServiceMemberPeer::SORT, $sort['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServiceMemberPeer::SORT, $sort, $comparison);
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
     * @return ServiceMemberQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ServiceMemberPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ServiceMemberPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServiceMemberPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ServiceMemberQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ServiceMemberPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ServiceMemberPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServiceMemberPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return ServiceMemberQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(ServiceMemberPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(ServiceMemberPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServiceMemberPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return ServiceMemberQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(ServiceMemberPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(ServiceMemberPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServiceMemberPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related Service object
     *
     * @param   Service|PropelObjectCollection $service The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ServiceMemberQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByService($service, $comparison = null)
    {
        if ($service instanceof Service) {
            return $this
                ->addUsingAlias(ServiceMemberPeer::SERVICE_ID, $service->getId(), $comparison);
        } elseif ($service instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ServiceMemberPeer::SERVICE_ID, $service->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByService() only accepts arguments of type Service or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Service relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ServiceMemberQuery The current query, for fluid interface
     */
    public function joinService($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Service');

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
            $this->addJoinObject($join, 'Service');
        }

        return $this;
    }

    /**
     * Use the Service relation Service object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ServiceQuery A secondary query class using the current class as primary query
     */
    public function useServiceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinService($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Service', 'ServiceQuery');
    }

    /**
     * Filter the query by a related TeamMember object
     *
     * @param   TeamMember|PropelObjectCollection $teamMember The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ServiceMemberQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTeamMember($teamMember, $comparison = null)
    {
        if ($teamMember instanceof TeamMember) {
            return $this
                ->addUsingAlias(ServiceMemberPeer::TEAM_MEMBER_ID, $teamMember->getId(), $comparison);
        } elseif ($teamMember instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ServiceMemberPeer::TEAM_MEMBER_ID, $teamMember->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ServiceMemberQuery The current query, for fluid interface
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
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ServiceMemberQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByCreatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ServiceMemberPeer::CREATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ServiceMemberPeer::CREATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ServiceMemberQuery The current query, for fluid interface
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
     * @return                 ServiceMemberQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ServiceMemberPeer::UPDATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ServiceMemberPeer::UPDATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ServiceMemberQuery The current query, for fluid interface
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
     * @param   ServiceMember $serviceMember Object to remove from the list of results
     *
     * @return ServiceMemberQuery The current query, for fluid interface
     */
    public function prune($serviceMember = null)
    {
        if ($serviceMember) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ServiceMemberPeer::SERVICE_ID), $serviceMember->getServiceId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ServiceMemberPeer::TEAM_MEMBER_ID), $serviceMember->getTeamMemberId(), Criteria::NOT_EQUAL);
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
     * @return     ServiceMemberQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ServiceMemberPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ServiceMemberQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ServiceMemberPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ServiceMemberQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ServiceMemberPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ServiceMemberQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ServiceMemberPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ServiceMemberQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ServiceMemberPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ServiceMemberQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ServiceMemberPeer::CREATED_AT);
    }
    // extended_keyable behavior

    public function filterByPKArray($pkArray) {
        return $this->filterByPrimaryKey($pkArray);
    }

    public function filterByPKString($pkString) {
        return $this->filterByPrimaryKey(explode("_", $pkString));
    }

}
