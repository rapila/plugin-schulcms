<?php


/**
 * Base class that represents a query for the 'class_teachers' table.
 *
 * 
 *
 * @method     ClassTeacherQuery orderBySchoolClassId($order = Criteria::ASC) Order by the school_class_id column
 * @method     ClassTeacherQuery orderByTeamMemberId($order = Criteria::ASC) Order by the team_member_id column
 * @method     ClassTeacherQuery orderByFunctionName($order = Criteria::ASC) Order by the function_name column
 * @method     ClassTeacherQuery orderBySortOrder($order = Criteria::ASC) Order by the sort_order column
 * @method     ClassTeacherQuery orderByIsClassTeacher($order = Criteria::ASC) Order by the is_class_teacher column
 * @method     ClassTeacherQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ClassTeacherQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ClassTeacherQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     ClassTeacherQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     ClassTeacherQuery groupBySchoolClassId() Group by the school_class_id column
 * @method     ClassTeacherQuery groupByTeamMemberId() Group by the team_member_id column
 * @method     ClassTeacherQuery groupByFunctionName() Group by the function_name column
 * @method     ClassTeacherQuery groupBySortOrder() Group by the sort_order column
 * @method     ClassTeacherQuery groupByIsClassTeacher() Group by the is_class_teacher column
 * @method     ClassTeacherQuery groupByCreatedAt() Group by the created_at column
 * @method     ClassTeacherQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ClassTeacherQuery groupByCreatedBy() Group by the created_by column
 * @method     ClassTeacherQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     ClassTeacherQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClassTeacherQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClassTeacherQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClassTeacherQuery leftJoinSchoolClass($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchoolClass relation
 * @method     ClassTeacherQuery rightJoinSchoolClass($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchoolClass relation
 * @method     ClassTeacherQuery innerJoinSchoolClass($relationAlias = null) Adds a INNER JOIN clause to the query using the SchoolClass relation
 *
 * @method     ClassTeacherQuery leftJoinTeamMember($relationAlias = null) Adds a LEFT JOIN clause to the query using the TeamMember relation
 * @method     ClassTeacherQuery rightJoinTeamMember($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TeamMember relation
 * @method     ClassTeacherQuery innerJoinTeamMember($relationAlias = null) Adds a INNER JOIN clause to the query using the TeamMember relation
 *
 * @method     ClassTeacherQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     ClassTeacherQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     ClassTeacherQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method     ClassTeacherQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     ClassTeacherQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     ClassTeacherQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method     ClassTeacher findOne(PropelPDO $con = null) Return the first ClassTeacher matching the query
 * @method     ClassTeacher findOneOrCreate(PropelPDO $con = null) Return the first ClassTeacher matching the query, or a new ClassTeacher object populated from the query conditions when no match is found
 *
 * @method     ClassTeacher findOneBySchoolClassId(int $school_class_id) Return the first ClassTeacher filtered by the school_class_id column
 * @method     ClassTeacher findOneByTeamMemberId(int $team_member_id) Return the first ClassTeacher filtered by the team_member_id column
 * @method     ClassTeacher findOneByFunctionName(string $function_name) Return the first ClassTeacher filtered by the function_name column
 * @method     ClassTeacher findOneBySortOrder(int $sort_order) Return the first ClassTeacher filtered by the sort_order column
 * @method     ClassTeacher findOneByIsClassTeacher(boolean $is_class_teacher) Return the first ClassTeacher filtered by the is_class_teacher column
 * @method     ClassTeacher findOneByCreatedAt(string $created_at) Return the first ClassTeacher filtered by the created_at column
 * @method     ClassTeacher findOneByUpdatedAt(string $updated_at) Return the first ClassTeacher filtered by the updated_at column
 * @method     ClassTeacher findOneByCreatedBy(int $created_by) Return the first ClassTeacher filtered by the created_by column
 * @method     ClassTeacher findOneByUpdatedBy(int $updated_by) Return the first ClassTeacher filtered by the updated_by column
 *
 * @method     array findBySchoolClassId(int $school_class_id) Return ClassTeacher objects filtered by the school_class_id column
 * @method     array findByTeamMemberId(int $team_member_id) Return ClassTeacher objects filtered by the team_member_id column
 * @method     array findByFunctionName(string $function_name) Return ClassTeacher objects filtered by the function_name column
 * @method     array findBySortOrder(int $sort_order) Return ClassTeacher objects filtered by the sort_order column
 * @method     array findByIsClassTeacher(boolean $is_class_teacher) Return ClassTeacher objects filtered by the is_class_teacher column
 * @method     array findByCreatedAt(string $created_at) Return ClassTeacher objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return ClassTeacher objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return ClassTeacher objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return ClassTeacher objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseClassTeacherQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseClassTeacherQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'rapila', $modelName = 'ClassTeacher', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClassTeacherQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClassTeacherQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClassTeacherQuery) {
			return $criteria;
		}
		$query = new ClassTeacherQuery();
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
	 * $obj = $c->findPk(array(12, 34, 56), $con);
	 * </code>
	 * @param     array[$school_class_id, $team_member_id, $function_name] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    ClassTeacher|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ClassTeacherPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ClassTeacherQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(ClassTeacherPeer::SCHOOL_CLASS_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(ClassTeacherPeer::TEAM_MEMBER_ID, $key[1], Criteria::EQUAL);
		$this->addUsingAlias(ClassTeacherPeer::FUNCTION_NAME, $key[2], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(ClassTeacherPeer::SCHOOL_CLASS_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(ClassTeacherPeer::TEAM_MEMBER_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$cton2 = $this->getNewCriterion(ClassTeacherPeer::FUNCTION_NAME, $key[2], Criteria::EQUAL);
			$cton0->addAnd($cton2);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the school_class_id column
	 * 
	 * @param     int|array $schoolClassId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
	 */
	public function filterBySchoolClassId($schoolClassId = null, $comparison = null)
	{
		if (is_array($schoolClassId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClassTeacherPeer::SCHOOL_CLASS_ID, $schoolClassId, $comparison);
	}

	/**
	 * Filter the query on the team_member_id column
	 * 
	 * @param     int|array $teamMemberId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
	 */
	public function filterByTeamMemberId($teamMemberId = null, $comparison = null)
	{
		if (is_array($teamMemberId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClassTeacherPeer::TEAM_MEMBER_ID, $teamMemberId, $comparison);
	}

	/**
	 * Filter the query on the function_name column
	 * 
	 * @param     string $functionName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClassTeacherPeer::FUNCTION_NAME, $functionName, $comparison);
	}

	/**
	 * Filter the query on the sort_order column
	 * 
	 * @param     int|array $sortOrder The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
	 */
	public function filterBySortOrder($sortOrder = null, $comparison = null)
	{
		if (is_array($sortOrder)) {
			$useMinMax = false;
			if (isset($sortOrder['min'])) {
				$this->addUsingAlias(ClassTeacherPeer::SORT_ORDER, $sortOrder['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($sortOrder['max'])) {
				$this->addUsingAlias(ClassTeacherPeer::SORT_ORDER, $sortOrder['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClassTeacherPeer::SORT_ORDER, $sortOrder, $comparison);
	}

	/**
	 * Filter the query on the is_class_teacher column
	 * 
	 * @param     boolean|string $isClassTeacher The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
	 */
	public function filterByIsClassTeacher($isClassTeacher = null, $comparison = null)
	{
		if (is_string($isClassTeacher)) {
			$is_class_teacher = in_array(strtolower($isClassTeacher), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ClassTeacherPeer::IS_CLASS_TEACHER, $isClassTeacher, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(ClassTeacherPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(ClassTeacherPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClassTeacherPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(ClassTeacherPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(ClassTeacherPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClassTeacherPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the created_by column
	 * 
	 * @param     int|array $createdBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
	 */
	public function filterByCreatedBy($createdBy = null, $comparison = null)
	{
		if (is_array($createdBy)) {
			$useMinMax = false;
			if (isset($createdBy['min'])) {
				$this->addUsingAlias(ClassTeacherPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdBy['max'])) {
				$this->addUsingAlias(ClassTeacherPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClassTeacherPeer::CREATED_BY, $createdBy, $comparison);
	}

	/**
	 * Filter the query on the updated_by column
	 * 
	 * @param     int|array $updatedBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
	 */
	public function filterByUpdatedBy($updatedBy = null, $comparison = null)
	{
		if (is_array($updatedBy)) {
			$useMinMax = false;
			if (isset($updatedBy['min'])) {
				$this->addUsingAlias(ClassTeacherPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedBy['max'])) {
				$this->addUsingAlias(ClassTeacherPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClassTeacherPeer::UPDATED_BY, $updatedBy, $comparison);
	}

	/**
	 * Filter the query by a related SchoolClass object
	 *
	 * @param     SchoolClass $schoolClass  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
	 */
	public function filterBySchoolClass($schoolClass, $comparison = null)
	{
		return $this
			->addUsingAlias(ClassTeacherPeer::SCHOOL_CLASS_ID, $schoolClass->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SchoolClass relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
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
	 * Filter the query by a related TeamMember object
	 *
	 * @param     TeamMember $teamMember  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
	 */
	public function filterByTeamMember($teamMember, $comparison = null)
	{
		return $this
			->addUsingAlias(ClassTeacherPeer::TEAM_MEMBER_ID, $teamMember->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the TeamMember relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
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
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByCreatedBy($user, $comparison = null)
	{
		return $this
			->addUsingAlias(ClassTeacherPeer::CREATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByCreatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
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
	 * @return    ClassTeacherQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
	{
		return $this
			->addUsingAlias(ClassTeacherPeer::UPDATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByUpdatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
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
	 * @param     ClassTeacher $classTeacher Object to remove from the list of results
	 *
	 * @return    ClassTeacherQuery The current query, for fluid interface
	 */
	public function prune($classTeacher = null)
	{
		if ($classTeacher) {
			$this->addCond('pruneCond0', $this->getAliasedColName(ClassTeacherPeer::SCHOOL_CLASS_ID), $classTeacher->getSchoolClassId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(ClassTeacherPeer::TEAM_MEMBER_ID), $classTeacher->getTeamMemberId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond2', $this->getAliasedColName(ClassTeacherPeer::FUNCTION_NAME), $classTeacher->getFunctionName(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

	// extended_timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     ClassTeacherQuery The current query, for fluid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(ClassTeacherPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     ClassTeacherQuery The current query, for fluid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(ClassTeacherPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     ClassTeacherQuery The current query, for fluid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(ClassTeacherPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     ClassTeacherQuery The current query, for fluid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(ClassTeacherPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     ClassTeacherQuery The current query, for fluid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(ClassTeacherPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     ClassTeacherQuery The current query, for fluid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(ClassTeacherPeer::CREATED_AT);
	}

} // BaseClassTeacherQuery
