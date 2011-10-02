<?php


/**
 * Base class that represents a query for the 'class_types' table.
 *
 * 
 *
 * @method     ClassTypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClassTypeQuery orderByOriginalName($order = Criteria::ASC) Order by the original_name column
 * @method     ClassTypeQuery orderByNameNormalized($order = Criteria::ASC) Order by the name_normalized column
 * @method     ClassTypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ClassTypeQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ClassTypeQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ClassTypeQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     ClassTypeQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     ClassTypeQuery groupById() Group by the id column
 * @method     ClassTypeQuery groupByOriginalName() Group by the original_name column
 * @method     ClassTypeQuery groupByNameNormalized() Group by the name_normalized column
 * @method     ClassTypeQuery groupByName() Group by the name column
 * @method     ClassTypeQuery groupByCreatedAt() Group by the created_at column
 * @method     ClassTypeQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ClassTypeQuery groupByCreatedBy() Group by the created_by column
 * @method     ClassTypeQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     ClassTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClassTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClassTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClassTypeQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     ClassTypeQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     ClassTypeQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method     ClassTypeQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     ClassTypeQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     ClassTypeQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method     ClassTypeQuery leftJoinSchoolClass($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchoolClass relation
 * @method     ClassTypeQuery rightJoinSchoolClass($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchoolClass relation
 * @method     ClassTypeQuery innerJoinSchoolClass($relationAlias = null) Adds a INNER JOIN clause to the query using the SchoolClass relation
 *
 * @method     ClassType findOne(PropelPDO $con = null) Return the first ClassType matching the query
 * @method     ClassType findOneOrCreate(PropelPDO $con = null) Return the first ClassType matching the query, or a new ClassType object populated from the query conditions when no match is found
 *
 * @method     ClassType findOneById(int $id) Return the first ClassType filtered by the id column
 * @method     ClassType findOneByOriginalName(string $original_name) Return the first ClassType filtered by the original_name column
 * @method     ClassType findOneByNameNormalized(string $name_normalized) Return the first ClassType filtered by the name_normalized column
 * @method     ClassType findOneByName(string $name) Return the first ClassType filtered by the name column
 * @method     ClassType findOneByCreatedAt(string $created_at) Return the first ClassType filtered by the created_at column
 * @method     ClassType findOneByUpdatedAt(string $updated_at) Return the first ClassType filtered by the updated_at column
 * @method     ClassType findOneByCreatedBy(int $created_by) Return the first ClassType filtered by the created_by column
 * @method     ClassType findOneByUpdatedBy(int $updated_by) Return the first ClassType filtered by the updated_by column
 *
 * @method     array findById(int $id) Return ClassType objects filtered by the id column
 * @method     array findByOriginalName(string $original_name) Return ClassType objects filtered by the original_name column
 * @method     array findByNameNormalized(string $name_normalized) Return ClassType objects filtered by the name_normalized column
 * @method     array findByName(string $name) Return ClassType objects filtered by the name column
 * @method     array findByCreatedAt(string $created_at) Return ClassType objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return ClassType objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return ClassType objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return ClassType objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseClassTypeQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseClassTypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'rapila', $modelName = 'ClassType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClassTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return    ClassTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClassTypeQuery) {
            return $criteria;
        }
        $query = new ClassTypeQuery();
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
     * Use instance pooling to avoid a database query if the object exists
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return    ClassType|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ((null !== ($obj = ClassTypePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
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
     * @return    ClassTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        return $this->addUsingAlias(ClassTypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return    ClassTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        return $this->addUsingAlias(ClassTypePeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    ClassTypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }
        return $this->addUsingAlias(ClassTypePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the original_name column
     *
     * Example usage:
     * <code>
     * $query->filterByOriginalName('fooValue');   // WHERE original_name = 'fooValue'
     * $query->filterByOriginalName('%fooValue%'); // WHERE original_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $originalName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    ClassTypeQuery The current query, for fluid interface
     */
    public function filterByOriginalName($originalName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($originalName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $originalName)) {
                $originalName = str_replace('*', '%', $originalName);
                $comparison = Criteria::LIKE;
            }
        }
        return $this->addUsingAlias(ClassTypePeer::ORIGINAL_NAME, $originalName, $comparison);
    }

    /**
     * Filter the query on the name_normalized column
     *
     * Example usage:
     * <code>
     * $query->filterByNameNormalized('fooValue');   // WHERE name_normalized = 'fooValue'
     * $query->filterByNameNormalized('%fooValue%'); // WHERE name_normalized LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nameNormalized The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    ClassTypeQuery The current query, for fluid interface
     */
    public function filterByNameNormalized($nameNormalized = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameNormalized)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nameNormalized)) {
                $nameNormalized = str_replace('*', '%', $nameNormalized);
                $comparison = Criteria::LIKE;
            }
        }
        return $this->addUsingAlias(ClassTypePeer::NAME_NORMALIZED, $nameNormalized, $comparison);
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
     * @return    ClassTypeQuery The current query, for fluid interface
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
        return $this->addUsingAlias(ClassTypePeer::NAME, $name, $comparison);
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
     * @return    ClassTypeQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ClassTypePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ClassTypePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }
        return $this->addUsingAlias(ClassTypePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return    ClassTypeQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ClassTypePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ClassTypePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }
        return $this->addUsingAlias(ClassTypePeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return    ClassTypeQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(ClassTypePeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(ClassTypePeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }
        return $this->addUsingAlias(ClassTypePeer::CREATED_BY, $createdBy, $comparison);
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
     * @return    ClassTypeQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(ClassTypePeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(ClassTypePeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }
        return $this->addUsingAlias(ClassTypePeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param     User|PropelCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    ClassTypeQuery The current query, for fluid interface
     */
    public function filterByUserRelatedByCreatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ClassTypePeer::CREATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
            return $this
                ->addUsingAlias(ClassTypePeer::CREATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return    ClassTypeQuery The current query, for fluid interface
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
     * @return    ClassTypeQuery The current query, for fluid interface
     */
    public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ClassTypePeer::UPDATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
            return $this
                ->addUsingAlias(ClassTypePeer::UPDATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return    ClassTypeQuery The current query, for fluid interface
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
     * Filter the query by a related SchoolClass object
     *
     * @param     SchoolClass $schoolClass  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    ClassTypeQuery The current query, for fluid interface
     */
    public function filterBySchoolClass($schoolClass, $comparison = null)
    {
        if ($schoolClass instanceof SchoolClass) {
            return $this
                ->addUsingAlias(ClassTypePeer::ID, $schoolClass->getClassTypeId(), $comparison);
        } elseif ($schoolClass instanceof PropelCollection) {
            return $this
                ->useSchoolClassQuery()
                ->filterByPrimaryKeys($schoolClass->getPrimaryKeys())
                ->endUse();
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
     * @return    ClassTypeQuery The current query, for fluid interface
     */
    public function joinSchoolClass($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useSchoolClassQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSchoolClass($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SchoolClass', 'SchoolClassQuery');
    }

    /**
     * Exclude object from result
     *
     * @param     ClassType $classType Object to remove from the list of results
     *
     * @return    ClassTypeQuery The current query, for fluid interface
     */
    public function prune($classType = null)
    {
        if ($classType) {
            $this->addUsingAlias(ClassTypePeer::ID, $classType->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

	// extended_timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     ClassTypeQuery The current query, for fluid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(ClassTypePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     ClassTypeQuery The current query, for fluid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(ClassTypePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     ClassTypeQuery The current query, for fluid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(ClassTypePeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     ClassTypeQuery The current query, for fluid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(ClassTypePeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     ClassTypeQuery The current query, for fluid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(ClassTypePeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     ClassTypeQuery The current query, for fluid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(ClassTypePeer::CREATED_AT);
	}

} // BaseClassTypeQuery