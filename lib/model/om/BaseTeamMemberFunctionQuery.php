<?php


/**
 * Base class that represents a query for the 'team_member_functions' table.
 *
 * 
 *
 * @method     TeamMemberFunctionQuery orderByTeamMemberId($order = Criteria::ASC) Order by the team_member_id column
 * @method     TeamMemberFunctionQuery orderBySchoolFunctionId($order = Criteria::ASC) Order by the school_function_id column
 * @method     TeamMemberFunctionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     TeamMemberFunctionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     TeamMemberFunctionQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     TeamMemberFunctionQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     TeamMemberFunctionQuery groupByTeamMemberId() Group by the team_member_id column
 * @method     TeamMemberFunctionQuery groupBySchoolFunctionId() Group by the school_function_id column
 * @method     TeamMemberFunctionQuery groupByCreatedAt() Group by the created_at column
 * @method     TeamMemberFunctionQuery groupByUpdatedAt() Group by the updated_at column
 * @method     TeamMemberFunctionQuery groupByCreatedBy() Group by the created_by column
 * @method     TeamMemberFunctionQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     TeamMemberFunctionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TeamMemberFunctionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TeamMemberFunctionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TeamMemberFunctionQuery leftJoinTeamMember($relationAlias = null) Adds a LEFT JOIN clause to the query using the TeamMember relation
 * @method     TeamMemberFunctionQuery rightJoinTeamMember($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TeamMember relation
 * @method     TeamMemberFunctionQuery innerJoinTeamMember($relationAlias = null) Adds a INNER JOIN clause to the query using the TeamMember relation
 *
 * @method     TeamMemberFunctionQuery leftJoinSchoolFunction($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchoolFunction relation
 * @method     TeamMemberFunctionQuery rightJoinSchoolFunction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchoolFunction relation
 * @method     TeamMemberFunctionQuery innerJoinSchoolFunction($relationAlias = null) Adds a INNER JOIN clause to the query using the SchoolFunction relation
 *
 * @method     TeamMemberFunctionQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     TeamMemberFunctionQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     TeamMemberFunctionQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method     TeamMemberFunctionQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     TeamMemberFunctionQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     TeamMemberFunctionQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method     TeamMemberFunction findOne(PropelPDO $con = null) Return the first TeamMemberFunction matching the query
 * @method     TeamMemberFunction findOneOrCreate(PropelPDO $con = null) Return the first TeamMemberFunction matching the query, or a new TeamMemberFunction object populated from the query conditions when no match is found
 *
 * @method     TeamMemberFunction findOneByTeamMemberId(int $team_member_id) Return the first TeamMemberFunction filtered by the team_member_id column
 * @method     TeamMemberFunction findOneBySchoolFunctionId(int $school_function_id) Return the first TeamMemberFunction filtered by the school_function_id column
 * @method     TeamMemberFunction findOneByCreatedAt(string $created_at) Return the first TeamMemberFunction filtered by the created_at column
 * @method     TeamMemberFunction findOneByUpdatedAt(string $updated_at) Return the first TeamMemberFunction filtered by the updated_at column
 * @method     TeamMemberFunction findOneByCreatedBy(int $created_by) Return the first TeamMemberFunction filtered by the created_by column
 * @method     TeamMemberFunction findOneByUpdatedBy(int $updated_by) Return the first TeamMemberFunction filtered by the updated_by column
 *
 * @method     array findByTeamMemberId(int $team_member_id) Return TeamMemberFunction objects filtered by the team_member_id column
 * @method     array findBySchoolFunctionId(int $school_function_id) Return TeamMemberFunction objects filtered by the school_function_id column
 * @method     array findByCreatedAt(string $created_at) Return TeamMemberFunction objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return TeamMemberFunction objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return TeamMemberFunction objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return TeamMemberFunction objects filtered by the updated_by column
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
	public function __construct($dbName = 'rapila', $modelName = 'TeamMemberFunction', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TeamMemberFunctionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TeamMemberFunctionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TeamMemberFunctionQuery) {
			return $criteria;
		}
		$query = new TeamMemberFunctionQuery();
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
	 * @param     array[$team_member_id, $school_function_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    TeamMemberFunction|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = TeamMemberFunctionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
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
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
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
	 * @param     int|array $teamMemberId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
	 */
	public function filterByTeamMemberId($teamMemberId = null, $comparison = null)
	{
		if (is_array($teamMemberId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TeamMemberFunctionPeer::TEAM_MEMBER_ID, $teamMemberId, $comparison);
	}

	/**
	 * Filter the query on the school_function_id column
	 * 
	 * @param     int|array $schoolFunctionId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
	 */
	public function filterBySchoolFunctionId($schoolFunctionId = null, $comparison = null)
	{
		if (is_array($schoolFunctionId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, $schoolFunctionId, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
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
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
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
	 * @param     int|array $createdBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
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
	 * @param     int|array $updatedBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
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
	 * @param     TeamMember $teamMember  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
	 */
	public function filterByTeamMember($teamMember, $comparison = null)
	{
		return $this
			->addUsingAlias(TeamMemberFunctionPeer::TEAM_MEMBER_ID, $teamMember->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the TeamMember relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
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
		if($relationAlias) {
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
	 * @return    TeamMemberQuery A secondary query class using the current class as primary query
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
	 * @param     SchoolFunction $schoolFunction  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
	 */
	public function filterBySchoolFunction($schoolFunction, $comparison = null)
	{
		return $this
			->addUsingAlias(TeamMemberFunctionPeer::SCHOOL_FUNCTION_ID, $schoolFunction->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SchoolFunction relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
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
		if($relationAlias) {
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
	 * @return    SchoolFunctionQuery A secondary query class using the current class as primary query
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
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByCreatedBy($user, $comparison = null)
	{
		return $this
			->addUsingAlias(TeamMemberFunctionPeer::CREATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByCreatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
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
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
	{
		return $this
			->addUsingAlias(TeamMemberFunctionPeer::UPDATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByUpdatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
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
	 * @param     TeamMemberFunction $teamMemberFunction Object to remove from the list of results
	 *
	 * @return    TeamMemberFunctionQuery The current query, for fluid interface
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

} // BaseTeamMemberFunctionQuery
