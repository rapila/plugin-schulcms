<?php


/**
 * Base class that represents a query for the 'team_members' table.
 *
 *
 *
 * @method TeamMemberQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TeamMemberQuery orderByOriginalId($order = Criteria::ASC) Order by the original_id column
 * @method TeamMemberQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method TeamMemberQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method TeamMemberQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 * @method TeamMemberQuery orderByGenderId($order = Criteria::ASC) Order by the gender_id column
 * @method TeamMemberQuery orderByEmployedSince($order = Criteria::ASC) Order by the employed_since column
 * @method TeamMemberQuery orderByDateOfBirth($order = Criteria::ASC) Order by the date_of_birth column
 * @method TeamMemberQuery orderByProfession($order = Criteria::ASC) Order by the profession column
 * @method TeamMemberQuery orderByEmailG($order = Criteria::ASC) Order by the email_g column
 * @method TeamMemberQuery orderByPortraitId($order = Criteria::ASC) Order by the portrait_id column
 * @method TeamMemberQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method TeamMemberQuery orderByIsDeleted($order = Criteria::ASC) Order by the is_deleted column
 * @method TeamMemberQuery orderByIsNewlyUpdated($order = Criteria::ASC) Order by the is_newly_updated column
 * @method TeamMemberQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method TeamMemberQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method TeamMemberQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method TeamMemberQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method TeamMemberQuery groupById() Group by the id column
 * @method TeamMemberQuery groupByOriginalId() Group by the original_id column
 * @method TeamMemberQuery groupByLastName() Group by the last_name column
 * @method TeamMemberQuery groupByFirstName() Group by the first_name column
 * @method TeamMemberQuery groupBySlug() Group by the slug column
 * @method TeamMemberQuery groupByGenderId() Group by the gender_id column
 * @method TeamMemberQuery groupByEmployedSince() Group by the employed_since column
 * @method TeamMemberQuery groupByDateOfBirth() Group by the date_of_birth column
 * @method TeamMemberQuery groupByProfession() Group by the profession column
 * @method TeamMemberQuery groupByEmailG() Group by the email_g column
 * @method TeamMemberQuery groupByPortraitId() Group by the portrait_id column
 * @method TeamMemberQuery groupByUserId() Group by the user_id column
 * @method TeamMemberQuery groupByIsDeleted() Group by the is_deleted column
 * @method TeamMemberQuery groupByIsNewlyUpdated() Group by the is_newly_updated column
 * @method TeamMemberQuery groupByCreatedAt() Group by the created_at column
 * @method TeamMemberQuery groupByUpdatedAt() Group by the updated_at column
 * @method TeamMemberQuery groupByCreatedBy() Group by the created_by column
 * @method TeamMemberQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method TeamMemberQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TeamMemberQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TeamMemberQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TeamMemberQuery leftJoinDocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the Document relation
 * @method TeamMemberQuery rightJoinDocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Document relation
 * @method TeamMemberQuery innerJoinDocument($relationAlias = null) Adds a INNER JOIN clause to the query using the Document relation
 *
 * @method TeamMemberQuery leftJoinUserRelatedByUserId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUserId relation
 * @method TeamMemberQuery rightJoinUserRelatedByUserId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUserId relation
 * @method TeamMemberQuery innerJoinUserRelatedByUserId($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUserId relation
 *
 * @method TeamMemberQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method TeamMemberQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method TeamMemberQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method TeamMemberQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method TeamMemberQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method TeamMemberQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method TeamMemberQuery leftJoinClassTeacher($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClassTeacher relation
 * @method TeamMemberQuery rightJoinClassTeacher($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClassTeacher relation
 * @method TeamMemberQuery innerJoinClassTeacher($relationAlias = null) Adds a INNER JOIN clause to the query using the ClassTeacher relation
 *
 * @method TeamMemberQuery leftJoinTeamMemberFunction($relationAlias = null) Adds a LEFT JOIN clause to the query using the TeamMemberFunction relation
 * @method TeamMemberQuery rightJoinTeamMemberFunction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TeamMemberFunction relation
 * @method TeamMemberQuery innerJoinTeamMemberFunction($relationAlias = null) Adds a INNER JOIN clause to the query using the TeamMemberFunction relation
 *
 * @method TeamMemberQuery leftJoinServiceMember($relationAlias = null) Adds a LEFT JOIN clause to the query using the ServiceMember relation
 * @method TeamMemberQuery rightJoinServiceMember($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ServiceMember relation
 * @method TeamMemberQuery innerJoinServiceMember($relationAlias = null) Adds a INNER JOIN clause to the query using the ServiceMember relation
 *
 * @method TeamMember findOne(PropelPDO $con = null) Return the first TeamMember matching the query
 * @method TeamMember findOneOrCreate(PropelPDO $con = null) Return the first TeamMember matching the query, or a new TeamMember object populated from the query conditions when no match is found
 *
 * @method TeamMember findOneByOriginalId(int $original_id) Return the first TeamMember filtered by the original_id column
 * @method TeamMember findOneByLastName(string $last_name) Return the first TeamMember filtered by the last_name column
 * @method TeamMember findOneByFirstName(string $first_name) Return the first TeamMember filtered by the first_name column
 * @method TeamMember findOneBySlug(string $slug) Return the first TeamMember filtered by the slug column
 * @method TeamMember findOneByGenderId(string $gender_id) Return the first TeamMember filtered by the gender_id column
 * @method TeamMember findOneByEmployedSince(string $employed_since) Return the first TeamMember filtered by the employed_since column
 * @method TeamMember findOneByDateOfBirth(string $date_of_birth) Return the first TeamMember filtered by the date_of_birth column
 * @method TeamMember findOneByProfession(string $profession) Return the first TeamMember filtered by the profession column
 * @method TeamMember findOneByEmailG(string $email_g) Return the first TeamMember filtered by the email_g column
 * @method TeamMember findOneByPortraitId(int $portrait_id) Return the first TeamMember filtered by the portrait_id column
 * @method TeamMember findOneByUserId(int $user_id) Return the first TeamMember filtered by the user_id column
 * @method TeamMember findOneByIsDeleted(boolean $is_deleted) Return the first TeamMember filtered by the is_deleted column
 * @method TeamMember findOneByIsNewlyUpdated(boolean $is_newly_updated) Return the first TeamMember filtered by the is_newly_updated column
 * @method TeamMember findOneByCreatedAt(string $created_at) Return the first TeamMember filtered by the created_at column
 * @method TeamMember findOneByUpdatedAt(string $updated_at) Return the first TeamMember filtered by the updated_at column
 * @method TeamMember findOneByCreatedBy(int $created_by) Return the first TeamMember filtered by the created_by column
 * @method TeamMember findOneByUpdatedBy(int $updated_by) Return the first TeamMember filtered by the updated_by column
 *
 * @method array findById(int $id) Return TeamMember objects filtered by the id column
 * @method array findByOriginalId(int $original_id) Return TeamMember objects filtered by the original_id column
 * @method array findByLastName(string $last_name) Return TeamMember objects filtered by the last_name column
 * @method array findByFirstName(string $first_name) Return TeamMember objects filtered by the first_name column
 * @method array findBySlug(string $slug) Return TeamMember objects filtered by the slug column
 * @method array findByGenderId(string $gender_id) Return TeamMember objects filtered by the gender_id column
 * @method array findByEmployedSince(string $employed_since) Return TeamMember objects filtered by the employed_since column
 * @method array findByDateOfBirth(string $date_of_birth) Return TeamMember objects filtered by the date_of_birth column
 * @method array findByProfession(string $profession) Return TeamMember objects filtered by the profession column
 * @method array findByEmailG(string $email_g) Return TeamMember objects filtered by the email_g column
 * @method array findByPortraitId(int $portrait_id) Return TeamMember objects filtered by the portrait_id column
 * @method array findByUserId(int $user_id) Return TeamMember objects filtered by the user_id column
 * @method array findByIsDeleted(boolean $is_deleted) Return TeamMember objects filtered by the is_deleted column
 * @method array findByIsNewlyUpdated(boolean $is_newly_updated) Return TeamMember objects filtered by the is_newly_updated column
 * @method array findByCreatedAt(string $created_at) Return TeamMember objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return TeamMember objects filtered by the updated_at column
 * @method array findByCreatedBy(int $created_by) Return TeamMember objects filtered by the created_by column
 * @method array findByUpdatedBy(int $updated_by) Return TeamMember objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseTeamMemberQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTeamMemberQuery object.
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
            $modelName = 'TeamMember';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TeamMemberQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TeamMemberQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TeamMemberQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TeamMemberQuery) {
            return $criteria;
        }
        $query = new TeamMemberQuery(null, null, $modelAlias);

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
     * @return   TeamMember|TeamMember[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TeamMemberPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TeamMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TeamMember A model object, or null if the key is not found
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
     * @return                 TeamMember A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `original_id`, `last_name`, `first_name`, `slug`, `gender_id`, `employed_since`, `date_of_birth`, `profession`, `email_g`, `portrait_id`, `user_id`, `is_deleted`, `is_newly_updated`, `created_at`, `updated_at`, `created_by`, `updated_by` FROM `team_members` WHERE `id` = :p0';
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
            $obj = new TeamMember();
            $obj->hydrate($row);
            TeamMemberPeer::addInstanceToPool($obj, (string) $key);
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
     * @return TeamMember|TeamMember[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TeamMember[]|mixed the list of results, formatted by the current formatter
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
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TeamMemberPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TeamMemberPeer::ID, $keys, Criteria::IN);
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
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TeamMemberPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TeamMemberPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamMemberPeer::ID, $id, $comparison);
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
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByOriginalId($originalId = null, $comparison = null)
    {
        if (is_array($originalId)) {
            $useMinMax = false;
            if (isset($originalId['min'])) {
                $this->addUsingAlias(TeamMemberPeer::ORIGINAL_ID, $originalId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($originalId['max'])) {
                $this->addUsingAlias(TeamMemberPeer::ORIGINAL_ID, $originalId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamMemberPeer::ORIGINAL_ID, $originalId, $comparison);
    }

    /**
     * Filter the query on the last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
     * $query->filterByLastName('%fooValue%'); // WHERE last_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastName)) {
                $lastName = str_replace('*', '%', $lastName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamMemberPeer::LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
     * $query->filterByFirstName('%fooValue%'); // WHERE first_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstName)) {
                $firstName = str_replace('*', '%', $firstName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamMemberPeer::FIRST_NAME, $firstName, $comparison);
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
     * @return TeamMemberQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamMemberPeer::SLUG, $slug, $comparison);
    }

    /**
     * Filter the query on the gender_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGenderId('fooValue');   // WHERE gender_id = 'fooValue'
     * $query->filterByGenderId('%fooValue%'); // WHERE gender_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $genderId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByGenderId($genderId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($genderId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $genderId)) {
                $genderId = str_replace('*', '%', $genderId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamMemberPeer::GENDER_ID, $genderId, $comparison);
    }

    /**
     * Filter the query on the employed_since column
     *
     * Example usage:
     * <code>
     * $query->filterByEmployedSince('2011-03-14'); // WHERE employed_since = '2011-03-14'
     * $query->filterByEmployedSince('now'); // WHERE employed_since = '2011-03-14'
     * $query->filterByEmployedSince(array('max' => 'yesterday')); // WHERE employed_since < '2011-03-13'
     * </code>
     *
     * @param     mixed $employedSince The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByEmployedSince($employedSince = null, $comparison = null)
    {
        if (is_array($employedSince)) {
            $useMinMax = false;
            if (isset($employedSince['min'])) {
                $this->addUsingAlias(TeamMemberPeer::EMPLOYED_SINCE, $employedSince['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($employedSince['max'])) {
                $this->addUsingAlias(TeamMemberPeer::EMPLOYED_SINCE, $employedSince['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamMemberPeer::EMPLOYED_SINCE, $employedSince, $comparison);
    }

    /**
     * Filter the query on the date_of_birth column
     *
     * Example usage:
     * <code>
     * $query->filterByDateOfBirth('2011-03-14'); // WHERE date_of_birth = '2011-03-14'
     * $query->filterByDateOfBirth('now'); // WHERE date_of_birth = '2011-03-14'
     * $query->filterByDateOfBirth(array('max' => 'yesterday')); // WHERE date_of_birth < '2011-03-13'
     * </code>
     *
     * @param     mixed $dateOfBirth The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByDateOfBirth($dateOfBirth = null, $comparison = null)
    {
        if (is_array($dateOfBirth)) {
            $useMinMax = false;
            if (isset($dateOfBirth['min'])) {
                $this->addUsingAlias(TeamMemberPeer::DATE_OF_BIRTH, $dateOfBirth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateOfBirth['max'])) {
                $this->addUsingAlias(TeamMemberPeer::DATE_OF_BIRTH, $dateOfBirth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamMemberPeer::DATE_OF_BIRTH, $dateOfBirth, $comparison);
    }

    /**
     * Filter the query on the profession column
     *
     * Example usage:
     * <code>
     * $query->filterByProfession('fooValue');   // WHERE profession = 'fooValue'
     * $query->filterByProfession('%fooValue%'); // WHERE profession LIKE '%fooValue%'
     * </code>
     *
     * @param     string $profession The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByProfession($profession = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($profession)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $profession)) {
                $profession = str_replace('*', '%', $profession);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamMemberPeer::PROFESSION, $profession, $comparison);
    }

    /**
     * Filter the query on the email_g column
     *
     * Example usage:
     * <code>
     * $query->filterByEmailG('fooValue');   // WHERE email_g = 'fooValue'
     * $query->filterByEmailG('%fooValue%'); // WHERE email_g LIKE '%fooValue%'
     * </code>
     *
     * @param     string $emailG The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByEmailG($emailG = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emailG)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $emailG)) {
                $emailG = str_replace('*', '%', $emailG);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamMemberPeer::EMAIL_G, $emailG, $comparison);
    }

    /**
     * Filter the query on the portrait_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPortraitId(1234); // WHERE portrait_id = 1234
     * $query->filterByPortraitId(array(12, 34)); // WHERE portrait_id IN (12, 34)
     * $query->filterByPortraitId(array('min' => 12)); // WHERE portrait_id >= 12
     * $query->filterByPortraitId(array('max' => 12)); // WHERE portrait_id <= 12
     * </code>
     *
     * @see       filterByDocument()
     *
     * @param     mixed $portraitId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByPortraitId($portraitId = null, $comparison = null)
    {
        if (is_array($portraitId)) {
            $useMinMax = false;
            if (isset($portraitId['min'])) {
                $this->addUsingAlias(TeamMemberPeer::PORTRAIT_ID, $portraitId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($portraitId['max'])) {
                $this->addUsingAlias(TeamMemberPeer::PORTRAIT_ID, $portraitId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamMemberPeer::PORTRAIT_ID, $portraitId, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id >= 12
     * $query->filterByUserId(array('max' => 12)); // WHERE user_id <= 12
     * </code>
     *
     * @see       filterByUserRelatedByUserId()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(TeamMemberPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(TeamMemberPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamMemberPeer::USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the is_deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByIsDeleted(true); // WHERE is_deleted = true
     * $query->filterByIsDeleted('yes'); // WHERE is_deleted = true
     * </code>
     *
     * @param     boolean|string $isDeleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByIsDeleted($isDeleted = null, $comparison = null)
    {
        if (is_string($isDeleted)) {
            $isDeleted = in_array(strtolower($isDeleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TeamMemberPeer::IS_DELETED, $isDeleted, $comparison);
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
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByIsNewlyUpdated($isNewlyUpdated = null, $comparison = null)
    {
        if (is_string($isNewlyUpdated)) {
            $isNewlyUpdated = in_array(strtolower($isNewlyUpdated), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TeamMemberPeer::IS_NEWLY_UPDATED, $isNewlyUpdated, $comparison);
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
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TeamMemberPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TeamMemberPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamMemberPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TeamMemberPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TeamMemberPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamMemberPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(TeamMemberPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(TeamMemberPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamMemberPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(TeamMemberPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(TeamMemberPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamMemberPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related Document object
     *
     * @param   Document|PropelObjectCollection $document The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TeamMemberQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDocument($document, $comparison = null)
    {
        if ($document instanceof Document) {
            return $this
                ->addUsingAlias(TeamMemberPeer::PORTRAIT_ID, $document->getId(), $comparison);
        } elseif ($document instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TeamMemberPeer::PORTRAIT_ID, $document->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByDocument() only accepts arguments of type Document or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Document relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function joinDocument($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Document');

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
            $this->addJoinObject($join, 'Document');
        }

        return $this;
    }

    /**
     * Use the Document relation Document object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DocumentQuery A secondary query class using the current class as primary query
     */
    public function useDocumentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDocument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Document', 'DocumentQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TeamMemberQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByUserId($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(TeamMemberPeer::USER_ID, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TeamMemberPeer::USER_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUserRelatedByUserId() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UserRelatedByUserId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function joinUserRelatedByUserId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UserRelatedByUserId');

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
            $this->addJoinObject($join, 'UserRelatedByUserId');
        }

        return $this;
    }

    /**
     * Use the UserRelatedByUserId relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserQuery A secondary query class using the current class as primary query
     */
    public function useUserRelatedByUserIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUserRelatedByUserId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UserRelatedByUserId', 'UserQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TeamMemberQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByCreatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(TeamMemberPeer::CREATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TeamMemberPeer::CREATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return TeamMemberQuery The current query, for fluid interface
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
     * @return                 TeamMemberQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(TeamMemberPeer::UPDATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TeamMemberPeer::UPDATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return TeamMemberQuery The current query, for fluid interface
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
     * Filter the query by a related ClassTeacher object
     *
     * @param   ClassTeacher|PropelObjectCollection $classTeacher  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TeamMemberQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClassTeacher($classTeacher, $comparison = null)
    {
        if ($classTeacher instanceof ClassTeacher) {
            return $this
                ->addUsingAlias(TeamMemberPeer::ID, $classTeacher->getTeamMemberId(), $comparison);
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
     * @return TeamMemberQuery The current query, for fluid interface
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
     * Filter the query by a related TeamMemberFunction object
     *
     * @param   TeamMemberFunction|PropelObjectCollection $teamMemberFunction  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TeamMemberQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTeamMemberFunction($teamMemberFunction, $comparison = null)
    {
        if ($teamMemberFunction instanceof TeamMemberFunction) {
            return $this
                ->addUsingAlias(TeamMemberPeer::ID, $teamMemberFunction->getTeamMemberId(), $comparison);
        } elseif ($teamMemberFunction instanceof PropelObjectCollection) {
            return $this
                ->useTeamMemberFunctionQuery()
                ->filterByPrimaryKeys($teamMemberFunction->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTeamMemberFunction() only accepts arguments of type TeamMemberFunction or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TeamMemberFunction relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TeamMemberQuery The current query, for fluid interface
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
        if ($relationAlias) {
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
     * @return   TeamMemberFunctionQuery A secondary query class using the current class as primary query
     */
    public function useTeamMemberFunctionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTeamMemberFunction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TeamMemberFunction', 'TeamMemberFunctionQuery');
    }

    /**
     * Filter the query by a related ServiceMember object
     *
     * @param   ServiceMember|PropelObjectCollection $serviceMember  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TeamMemberQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByServiceMember($serviceMember, $comparison = null)
    {
        if ($serviceMember instanceof ServiceMember) {
            return $this
                ->addUsingAlias(TeamMemberPeer::ID, $serviceMember->getTeamMemberId(), $comparison);
        } elseif ($serviceMember instanceof PropelObjectCollection) {
            return $this
                ->useServiceMemberQuery()
                ->filterByPrimaryKeys($serviceMember->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByServiceMember() only accepts arguments of type ServiceMember or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ServiceMember relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function joinServiceMember($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ServiceMember');

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
            $this->addJoinObject($join, 'ServiceMember');
        }

        return $this;
    }

    /**
     * Use the ServiceMember relation ServiceMember object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ServiceMemberQuery A secondary query class using the current class as primary query
     */
    public function useServiceMemberQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinServiceMember($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ServiceMember', 'ServiceMemberQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TeamMember $teamMember Object to remove from the list of results
     *
     * @return TeamMemberQuery The current query, for fluid interface
     */
    public function prune($teamMember = null)
    {
        if ($teamMember) {
            $this->addUsingAlias(TeamMemberPeer::ID, $teamMember->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // extended_timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     TeamMemberQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(TeamMemberPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     TeamMemberQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(TeamMemberPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     TeamMemberQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(TeamMemberPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     TeamMemberQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(TeamMemberPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     TeamMemberQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(TeamMemberPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     TeamMemberQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(TeamMemberPeer::CREATED_AT);
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
