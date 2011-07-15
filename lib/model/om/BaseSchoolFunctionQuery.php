<?php


/**
 * Base class that represents a query for the 'school_functions' table.
 *
 * 
 *
 * @method     SchoolFunctionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SchoolFunctionQuery orderByOriginalId($order = Criteria::ASC) Order by the original_id column
 * @method     SchoolFunctionQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     SchoolFunctionQuery orderByFunctionGroupId($order = Criteria::ASC) Order by the function_group_id column
 * @method     SchoolFunctionQuery orderBySchoolId($order = Criteria::ASC) Order by the school_id column
 * @method     SchoolFunctionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     SchoolFunctionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     SchoolFunctionQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     SchoolFunctionQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     SchoolFunctionQuery groupById() Group by the id column
 * @method     SchoolFunctionQuery groupByOriginalId() Group by the original_id column
 * @method     SchoolFunctionQuery groupByTitle() Group by the title column
 * @method     SchoolFunctionQuery groupByFunctionGroupId() Group by the function_group_id column
 * @method     SchoolFunctionQuery groupBySchoolId() Group by the school_id column
 * @method     SchoolFunctionQuery groupByCreatedAt() Group by the created_at column
 * @method     SchoolFunctionQuery groupByUpdatedAt() Group by the updated_at column
 * @method     SchoolFunctionQuery groupByCreatedBy() Group by the created_by column
 * @method     SchoolFunctionQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     SchoolFunctionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SchoolFunctionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SchoolFunctionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SchoolFunctionQuery leftJoinFunctionGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the FunctionGroup relation
 * @method     SchoolFunctionQuery rightJoinFunctionGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FunctionGroup relation
 * @method     SchoolFunctionQuery innerJoinFunctionGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the FunctionGroup relation
 *
 * @method     SchoolFunctionQuery leftJoinSchool($relationAlias = null) Adds a LEFT JOIN clause to the query using the School relation
 * @method     SchoolFunctionQuery rightJoinSchool($relationAlias = null) Adds a RIGHT JOIN clause to the query using the School relation
 * @method     SchoolFunctionQuery innerJoinSchool($relationAlias = null) Adds a INNER JOIN clause to the query using the School relation
 *
 * @method     SchoolFunctionQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     SchoolFunctionQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     SchoolFunctionQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method     SchoolFunctionQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     SchoolFunctionQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     SchoolFunctionQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method     SchoolFunctionQuery leftJoinTeamMemberFunction($relationAlias = null) Adds a LEFT JOIN clause to the query using the TeamMemberFunction relation
 * @method     SchoolFunctionQuery rightJoinTeamMemberFunction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TeamMemberFunction relation
 * @method     SchoolFunctionQuery innerJoinTeamMemberFunction($relationAlias = null) Adds a INNER JOIN clause to the query using the TeamMemberFunction relation
 *
 * @method     SchoolFunction findOne(PropelPDO $con = null) Return the first SchoolFunction matching the query
 * @method     SchoolFunction findOneOrCreate(PropelPDO $con = null) Return the first SchoolFunction matching the query, or a new SchoolFunction object populated from the query conditions when no match is found
 *
 * @method     SchoolFunction findOneById(int $id) Return the first SchoolFunction filtered by the id column
 * @method     SchoolFunction findOneByOriginalId(int $original_id) Return the first SchoolFunction filtered by the original_id column
 * @method     SchoolFunction findOneByTitle(string $title) Return the first SchoolFunction filtered by the title column
 * @method     SchoolFunction findOneByFunctionGroupId(int $function_group_id) Return the first SchoolFunction filtered by the function_group_id column
 * @method     SchoolFunction findOneBySchoolId(int $school_id) Return the first SchoolFunction filtered by the school_id column
 * @method     SchoolFunction findOneByCreatedAt(string $created_at) Return the first SchoolFunction filtered by the created_at column
 * @method     SchoolFunction findOneByUpdatedAt(string $updated_at) Return the first SchoolFunction filtered by the updated_at column
 * @method     SchoolFunction findOneByCreatedBy(int $created_by) Return the first SchoolFunction filtered by the created_by column
 * @method     SchoolFunction findOneByUpdatedBy(int $updated_by) Return the first SchoolFunction filtered by the updated_by column
 *
 * @method     array findById(int $id) Return SchoolFunction objects filtered by the id column
 * @method     array findByOriginalId(int $original_id) Return SchoolFunction objects filtered by the original_id column
 * @method     array findByTitle(string $title) Return SchoolFunction objects filtered by the title column
 * @method     array findByFunctionGroupId(int $function_group_id) Return SchoolFunction objects filtered by the function_group_id column
 * @method     array findBySchoolId(int $school_id) Return SchoolFunction objects filtered by the school_id column
 * @method     array findByCreatedAt(string $created_at) Return SchoolFunction objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return SchoolFunction objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return SchoolFunction objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return SchoolFunction objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseSchoolFunctionQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSchoolFunctionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'rapila', $modelName = 'SchoolFunction', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SchoolFunctionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SchoolFunctionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SchoolFunctionQuery) {
			return $criteria;
		}
		$query = new SchoolFunctionQuery();
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
	 * @return    SchoolFunction|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SchoolFunctionPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SchoolFunctionPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SchoolFunctionPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SchoolFunctionPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the original_id column
	 * 
	 * @param     int|array $originalId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function filterByOriginalId($originalId = null, $comparison = null)
	{
		if (is_array($originalId)) {
			$useMinMax = false;
			if (isset($originalId['min'])) {
				$this->addUsingAlias(SchoolFunctionPeer::ORIGINAL_ID, $originalId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($originalId['max'])) {
				$this->addUsingAlias(SchoolFunctionPeer::ORIGINAL_ID, $originalId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SchoolFunctionPeer::ORIGINAL_ID, $originalId, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function filterByTitle($title = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($title)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $title)) {
				$title = str_replace('*', '%', $title);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SchoolFunctionPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the function_group_id column
	 * 
	 * @param     int|array $functionGroupId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function filterByFunctionGroupId($functionGroupId = null, $comparison = null)
	{
		if (is_array($functionGroupId)) {
			$useMinMax = false;
			if (isset($functionGroupId['min'])) {
				$this->addUsingAlias(SchoolFunctionPeer::FUNCTION_GROUP_ID, $functionGroupId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($functionGroupId['max'])) {
				$this->addUsingAlias(SchoolFunctionPeer::FUNCTION_GROUP_ID, $functionGroupId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SchoolFunctionPeer::FUNCTION_GROUP_ID, $functionGroupId, $comparison);
	}

	/**
	 * Filter the query on the school_id column
	 * 
	 * @param     int|array $schoolId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function filterBySchoolId($schoolId = null, $comparison = null)
	{
		if (is_array($schoolId)) {
			$useMinMax = false;
			if (isset($schoolId['min'])) {
				$this->addUsingAlias(SchoolFunctionPeer::SCHOOL_ID, $schoolId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($schoolId['max'])) {
				$this->addUsingAlias(SchoolFunctionPeer::SCHOOL_ID, $schoolId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SchoolFunctionPeer::SCHOOL_ID, $schoolId, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(SchoolFunctionPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(SchoolFunctionPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SchoolFunctionPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(SchoolFunctionPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(SchoolFunctionPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SchoolFunctionPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the created_by column
	 * 
	 * @param     int|array $createdBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function filterByCreatedBy($createdBy = null, $comparison = null)
	{
		if (is_array($createdBy)) {
			$useMinMax = false;
			if (isset($createdBy['min'])) {
				$this->addUsingAlias(SchoolFunctionPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdBy['max'])) {
				$this->addUsingAlias(SchoolFunctionPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SchoolFunctionPeer::CREATED_BY, $createdBy, $comparison);
	}

	/**
	 * Filter the query on the updated_by column
	 * 
	 * @param     int|array $updatedBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function filterByUpdatedBy($updatedBy = null, $comparison = null)
	{
		if (is_array($updatedBy)) {
			$useMinMax = false;
			if (isset($updatedBy['min'])) {
				$this->addUsingAlias(SchoolFunctionPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedBy['max'])) {
				$this->addUsingAlias(SchoolFunctionPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SchoolFunctionPeer::UPDATED_BY, $updatedBy, $comparison);
	}

	/**
	 * Filter the query by a related FunctionGroup object
	 *
	 * @param     FunctionGroup $functionGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function filterByFunctionGroup($functionGroup, $comparison = null)
	{
		return $this
			->addUsingAlias(SchoolFunctionPeer::FUNCTION_GROUP_ID, $functionGroup->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the FunctionGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function joinFunctionGroup($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('FunctionGroup');
		
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
			$this->addJoinObject($join, 'FunctionGroup');
		}
		
		return $this;
	}

	/**
	 * Use the FunctionGroup relation FunctionGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FunctionGroupQuery A secondary query class using the current class as primary query
	 */
	public function useFunctionGroupQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinFunctionGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'FunctionGroup', 'FunctionGroupQuery');
	}

	/**
	 * Filter the query by a related School object
	 *
	 * @param     School $school  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function filterBySchool($school, $comparison = null)
	{
		return $this
			->addUsingAlias(SchoolFunctionPeer::SCHOOL_ID, $school->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the School relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
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
		if($relationAlias) {
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
	 * @return    SchoolQuery A secondary query class using the current class as primary query
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
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByCreatedBy($user, $comparison = null)
	{
		return $this
			->addUsingAlias(SchoolFunctionPeer::CREATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByCreatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
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
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
	{
		return $this
			->addUsingAlias(SchoolFunctionPeer::UPDATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByUpdatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
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
	 * Filter the query by a related TeamMemberFunction object
	 *
	 * @param     TeamMemberFunction $teamMemberFunction  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function filterByTeamMemberFunction($teamMemberFunction, $comparison = null)
	{
		return $this
			->addUsingAlias(SchoolFunctionPeer::ID, $teamMemberFunction->getSchoolFunctionId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the TeamMemberFunction relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function joinTeamMemberFunction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TeamMemberFunction');
		
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
			$this->addJoinObject($join, 'TeamMemberFunction');
		}
		
		return $this;
	}

	/**
	 * Use the TeamMemberFunction relation TeamMemberFunction object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TeamMemberFunctionQuery A secondary query class using the current class as primary query
	 */
	public function useTeamMemberFunctionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinTeamMemberFunction($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TeamMemberFunction', 'TeamMemberFunctionQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SchoolFunction $schoolFunction Object to remove from the list of results
	 *
	 * @return    SchoolFunctionQuery The current query, for fluid interface
	 */
	public function prune($schoolFunction = null)
	{
		if ($schoolFunction) {
			$this->addUsingAlias(SchoolFunctionPeer::ID, $schoolFunction->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// extended_timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     SchoolFunctionQuery The current query, for fluid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(SchoolFunctionPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     SchoolFunctionQuery The current query, for fluid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(SchoolFunctionPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     SchoolFunctionQuery The current query, for fluid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(SchoolFunctionPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     SchoolFunctionQuery The current query, for fluid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(SchoolFunctionPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     SchoolFunctionQuery The current query, for fluid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(SchoolFunctionPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     SchoolFunctionQuery The current query, for fluid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(SchoolFunctionPeer::CREATED_AT);
	}

} // BaseSchoolFunctionQuery
