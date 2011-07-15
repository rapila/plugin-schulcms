<?php


/**
 * Base class that represents a query for the 'service_categories' table.
 *
 * 
 *
 * @method     ServiceCategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ServiceCategoryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ServiceCategoryQuery orderByNameNormalized($order = Criteria::ASC) Order by the name_normalized column
 * @method     ServiceCategoryQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ServiceCategoryQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ServiceCategoryQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     ServiceCategoryQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     ServiceCategoryQuery groupById() Group by the id column
 * @method     ServiceCategoryQuery groupByName() Group by the name column
 * @method     ServiceCategoryQuery groupByNameNormalized() Group by the name_normalized column
 * @method     ServiceCategoryQuery groupByCreatedAt() Group by the created_at column
 * @method     ServiceCategoryQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ServiceCategoryQuery groupByCreatedBy() Group by the created_by column
 * @method     ServiceCategoryQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     ServiceCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ServiceCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ServiceCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ServiceCategoryQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     ServiceCategoryQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     ServiceCategoryQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method     ServiceCategoryQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     ServiceCategoryQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     ServiceCategoryQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method     ServiceCategoryQuery leftJoinService($relationAlias = null) Adds a LEFT JOIN clause to the query using the Service relation
 * @method     ServiceCategoryQuery rightJoinService($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Service relation
 * @method     ServiceCategoryQuery innerJoinService($relationAlias = null) Adds a INNER JOIN clause to the query using the Service relation
 *
 * @method     ServiceCategory findOne(PropelPDO $con = null) Return the first ServiceCategory matching the query
 * @method     ServiceCategory findOneOrCreate(PropelPDO $con = null) Return the first ServiceCategory matching the query, or a new ServiceCategory object populated from the query conditions when no match is found
 *
 * @method     ServiceCategory findOneById(int $id) Return the first ServiceCategory filtered by the id column
 * @method     ServiceCategory findOneByName(string $name) Return the first ServiceCategory filtered by the name column
 * @method     ServiceCategory findOneByNameNormalized(string $name_normalized) Return the first ServiceCategory filtered by the name_normalized column
 * @method     ServiceCategory findOneByCreatedAt(string $created_at) Return the first ServiceCategory filtered by the created_at column
 * @method     ServiceCategory findOneByUpdatedAt(string $updated_at) Return the first ServiceCategory filtered by the updated_at column
 * @method     ServiceCategory findOneByCreatedBy(int $created_by) Return the first ServiceCategory filtered by the created_by column
 * @method     ServiceCategory findOneByUpdatedBy(int $updated_by) Return the first ServiceCategory filtered by the updated_by column
 *
 * @method     array findById(int $id) Return ServiceCategory objects filtered by the id column
 * @method     array findByName(string $name) Return ServiceCategory objects filtered by the name column
 * @method     array findByNameNormalized(string $name_normalized) Return ServiceCategory objects filtered by the name_normalized column
 * @method     array findByCreatedAt(string $created_at) Return ServiceCategory objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return ServiceCategory objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return ServiceCategory objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return ServiceCategory objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseServiceCategoryQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseServiceCategoryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'rapila', $modelName = 'ServiceCategory', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ServiceCategoryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ServiceCategoryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ServiceCategoryQuery) {
			return $criteria;
		}
		$query = new ServiceCategoryQuery();
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
	 * @return    ServiceCategory|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ServiceCategoryPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ServiceCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ServiceCategoryPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ServiceCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ServiceCategoryPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ServiceCategoryQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ServiceCategoryPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ServiceCategoryQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ServiceCategoryPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the name_normalized column
	 * 
	 * @param     string $nameNormalized The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ServiceCategoryQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ServiceCategoryPeer::NAME_NORMALIZED, $nameNormalized, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ServiceCategoryQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(ServiceCategoryPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(ServiceCategoryPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ServiceCategoryPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ServiceCategoryQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(ServiceCategoryPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(ServiceCategoryPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ServiceCategoryPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the created_by column
	 * 
	 * @param     int|array $createdBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ServiceCategoryQuery The current query, for fluid interface
	 */
	public function filterByCreatedBy($createdBy = null, $comparison = null)
	{
		if (is_array($createdBy)) {
			$useMinMax = false;
			if (isset($createdBy['min'])) {
				$this->addUsingAlias(ServiceCategoryPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdBy['max'])) {
				$this->addUsingAlias(ServiceCategoryPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ServiceCategoryPeer::CREATED_BY, $createdBy, $comparison);
	}

	/**
	 * Filter the query on the updated_by column
	 * 
	 * @param     int|array $updatedBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ServiceCategoryQuery The current query, for fluid interface
	 */
	public function filterByUpdatedBy($updatedBy = null, $comparison = null)
	{
		if (is_array($updatedBy)) {
			$useMinMax = false;
			if (isset($updatedBy['min'])) {
				$this->addUsingAlias(ServiceCategoryPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedBy['max'])) {
				$this->addUsingAlias(ServiceCategoryPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ServiceCategoryPeer::UPDATED_BY, $updatedBy, $comparison);
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ServiceCategoryQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByCreatedBy($user, $comparison = null)
	{
		return $this
			->addUsingAlias(ServiceCategoryPeer::CREATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByCreatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ServiceCategoryQuery The current query, for fluid interface
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
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ServiceCategoryQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
	{
		return $this
			->addUsingAlias(ServiceCategoryPeer::UPDATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByUpdatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ServiceCategoryQuery The current query, for fluid interface
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
	 * Filter the query by a related Service object
	 *
	 * @param     Service $service  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ServiceCategoryQuery The current query, for fluid interface
	 */
	public function filterByService($service, $comparison = null)
	{
		return $this
			->addUsingAlias(ServiceCategoryPeer::ID, $service->getServiceCategoryId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Service relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ServiceCategoryQuery The current query, for fluid interface
	 */
	public function joinService($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
		if($relationAlias) {
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
	 * @return    ServiceQuery A secondary query class using the current class as primary query
	 */
	public function useServiceQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinService($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Service', 'ServiceQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ServiceCategory $serviceCategory Object to remove from the list of results
	 *
	 * @return    ServiceCategoryQuery The current query, for fluid interface
	 */
	public function prune($serviceCategory = null)
	{
		if ($serviceCategory) {
			$this->addUsingAlias(ServiceCategoryPeer::ID, $serviceCategory->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// extended_timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     ServiceCategoryQuery The current query, for fluid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(ServiceCategoryPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     ServiceCategoryQuery The current query, for fluid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(ServiceCategoryPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     ServiceCategoryQuery The current query, for fluid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(ServiceCategoryPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     ServiceCategoryQuery The current query, for fluid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(ServiceCategoryPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     ServiceCategoryQuery The current query, for fluid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(ServiceCategoryPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     ServiceCategoryQuery The current query, for fluid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(ServiceCategoryPeer::CREATED_AT);
	}

} // BaseServiceCategoryQuery
