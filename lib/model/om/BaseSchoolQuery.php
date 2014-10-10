<?php


/**
 * Base class that represents a query for the 'schools' table.
 *
 *
 *
 * @method SchoolQuery orderById($order = Criteria::ASC) Order by the id column
 * @method SchoolQuery orderByOriginalId($order = Criteria::ASC) Order by the original_id column
 * @method SchoolQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method SchoolQuery orderBySchoolUnit($order = Criteria::ASC) Order by the school_unit column
 * @method SchoolQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method SchoolQuery orderByZipCode($order = Criteria::ASC) Order by the zip_code column
 * @method SchoolQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method SchoolQuery orderByPhoneSchulleitung($order = Criteria::ASC) Order by the phone_schulleitung column
 * @method SchoolQuery orderByPhoneLehrerzimmer($order = Criteria::ASC) Order by the phone_lehrerzimmer column
 * @method SchoolQuery orderByCurrentYear($order = Criteria::ASC) Order by the current_year column
 * @method SchoolQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method SchoolQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method SchoolQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method SchoolQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method SchoolQuery groupById() Group by the id column
 * @method SchoolQuery groupByOriginalId() Group by the original_id column
 * @method SchoolQuery groupByName() Group by the name column
 * @method SchoolQuery groupBySchoolUnit() Group by the school_unit column
 * @method SchoolQuery groupByAddress() Group by the address column
 * @method SchoolQuery groupByZipCode() Group by the zip_code column
 * @method SchoolQuery groupByCity() Group by the city column
 * @method SchoolQuery groupByPhoneSchulleitung() Group by the phone_schulleitung column
 * @method SchoolQuery groupByPhoneLehrerzimmer() Group by the phone_lehrerzimmer column
 * @method SchoolQuery groupByCurrentYear() Group by the current_year column
 * @method SchoolQuery groupByCreatedAt() Group by the created_at column
 * @method SchoolQuery groupByUpdatedAt() Group by the updated_at column
 * @method SchoolQuery groupByCreatedBy() Group by the created_by column
 * @method SchoolQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method SchoolQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SchoolQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SchoolQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SchoolQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method SchoolQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method SchoolQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method SchoolQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method SchoolQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method SchoolQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method SchoolQuery leftJoinSchoolFunction($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchoolFunction relation
 * @method SchoolQuery rightJoinSchoolFunction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchoolFunction relation
 * @method SchoolQuery innerJoinSchoolFunction($relationAlias = null) Adds a INNER JOIN clause to the query using the SchoolFunction relation
 *
 * @method SchoolQuery leftJoinSchoolClass($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchoolClass relation
 * @method SchoolQuery rightJoinSchoolClass($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchoolClass relation
 * @method SchoolQuery innerJoinSchoolClass($relationAlias = null) Adds a INNER JOIN clause to the query using the SchoolClass relation
 *
 * @method School findOne(PropelPDO $con = null) Return the first School matching the query
 * @method School findOneOrCreate(PropelPDO $con = null) Return the first School matching the query, or a new School object populated from the query conditions when no match is found
 *
 * @method School findOneByOriginalId(string $original_id) Return the first School filtered by the original_id column
 * @method School findOneByName(string $name) Return the first School filtered by the name column
 * @method School findOneBySchoolUnit(string $school_unit) Return the first School filtered by the school_unit column
 * @method School findOneByAddress(string $address) Return the first School filtered by the address column
 * @method School findOneByZipCode(string $zip_code) Return the first School filtered by the zip_code column
 * @method School findOneByCity(string $city) Return the first School filtered by the city column
 * @method School findOneByPhoneSchulleitung(string $phone_schulleitung) Return the first School filtered by the phone_schulleitung column
 * @method School findOneByPhoneLehrerzimmer(string $phone_lehrerzimmer) Return the first School filtered by the phone_lehrerzimmer column
 * @method School findOneByCurrentYear(int $current_year) Return the first School filtered by the current_year column
 * @method School findOneByCreatedAt(string $created_at) Return the first School filtered by the created_at column
 * @method School findOneByUpdatedAt(string $updated_at) Return the first School filtered by the updated_at column
 * @method School findOneByCreatedBy(int $created_by) Return the first School filtered by the created_by column
 * @method School findOneByUpdatedBy(int $updated_by) Return the first School filtered by the updated_by column
 *
 * @method array findById(int $id) Return School objects filtered by the id column
 * @method array findByOriginalId(string $original_id) Return School objects filtered by the original_id column
 * @method array findByName(string $name) Return School objects filtered by the name column
 * @method array findBySchoolUnit(string $school_unit) Return School objects filtered by the school_unit column
 * @method array findByAddress(string $address) Return School objects filtered by the address column
 * @method array findByZipCode(string $zip_code) Return School objects filtered by the zip_code column
 * @method array findByCity(string $city) Return School objects filtered by the city column
 * @method array findByPhoneSchulleitung(string $phone_schulleitung) Return School objects filtered by the phone_schulleitung column
 * @method array findByPhoneLehrerzimmer(string $phone_lehrerzimmer) Return School objects filtered by the phone_lehrerzimmer column
 * @method array findByCurrentYear(int $current_year) Return School objects filtered by the current_year column
 * @method array findByCreatedAt(string $created_at) Return School objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return School objects filtered by the updated_at column
 * @method array findByCreatedBy(int $created_by) Return School objects filtered by the created_by column
 * @method array findByUpdatedBy(int $updated_by) Return School objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseSchoolQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSchoolQuery object.
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
            $modelName = 'School';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SchoolQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SchoolQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SchoolQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SchoolQuery) {
            return $criteria;
        }
        $query = new SchoolQuery(null, null, $modelAlias);

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
     * @return   School|School[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SchoolPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SchoolPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 School A model object, or null if the key is not found
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
     * @return                 School A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `original_id`, `name`, `school_unit`, `address`, `zip_code`, `city`, `phone_schulleitung`, `phone_lehrerzimmer`, `current_year`, `created_at`, `updated_at`, `created_by`, `updated_by` FROM `schools` WHERE `id` = :p0';
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
            $obj = new School();
            $obj->hydrate($row);
            SchoolPeer::addInstanceToPool($obj, (string) $key);
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
     * @return School|School[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|School[]|mixed the list of results, formatted by the current formatter
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
     * @return SchoolQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SchoolPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SchoolQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SchoolPeer::ID, $keys, Criteria::IN);
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
     * @return SchoolQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SchoolPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SchoolPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the original_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOriginalId('fooValue');   // WHERE original_id = 'fooValue'
     * $query->filterByOriginalId('%fooValue%'); // WHERE original_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $originalId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolQuery The current query, for fluid interface
     */
    public function filterByOriginalId($originalId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($originalId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $originalId)) {
                $originalId = str_replace('*', '%', $originalId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SchoolPeer::ORIGINAL_ID, $originalId, $comparison);
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
     * @return SchoolQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SchoolPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the school_unit column
     *
     * Example usage:
     * <code>
     * $query->filterBySchoolUnit('fooValue');   // WHERE school_unit = 'fooValue'
     * $query->filterBySchoolUnit('%fooValue%'); // WHERE school_unit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $schoolUnit The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolQuery The current query, for fluid interface
     */
    public function filterBySchoolUnit($schoolUnit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($schoolUnit)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $schoolUnit)) {
                $schoolUnit = str_replace('*', '%', $schoolUnit);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SchoolPeer::SCHOOL_UNIT, $schoolUnit, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%'); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address)) {
                $address = str_replace('*', '%', $address);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SchoolPeer::ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the zip_code column
     *
     * Example usage:
     * <code>
     * $query->filterByZipCode('fooValue');   // WHERE zip_code = 'fooValue'
     * $query->filterByZipCode('%fooValue%'); // WHERE zip_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zipCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolQuery The current query, for fluid interface
     */
    public function filterByZipCode($zipCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zipCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $zipCode)) {
                $zipCode = str_replace('*', '%', $zipCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SchoolPeer::ZIP_CODE, $zipCode, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%'); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $city)) {
                $city = str_replace('*', '%', $city);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SchoolPeer::CITY, $city, $comparison);
    }

    /**
     * Filter the query on the phone_schulleitung column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoneSchulleitung('fooValue');   // WHERE phone_schulleitung = 'fooValue'
     * $query->filterByPhoneSchulleitung('%fooValue%'); // WHERE phone_schulleitung LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phoneSchulleitung The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolQuery The current query, for fluid interface
     */
    public function filterByPhoneSchulleitung($phoneSchulleitung = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phoneSchulleitung)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phoneSchulleitung)) {
                $phoneSchulleitung = str_replace('*', '%', $phoneSchulleitung);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SchoolPeer::PHONE_SCHULLEITUNG, $phoneSchulleitung, $comparison);
    }

    /**
     * Filter the query on the phone_lehrerzimmer column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoneLehrerzimmer('fooValue');   // WHERE phone_lehrerzimmer = 'fooValue'
     * $query->filterByPhoneLehrerzimmer('%fooValue%'); // WHERE phone_lehrerzimmer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phoneLehrerzimmer The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolQuery The current query, for fluid interface
     */
    public function filterByPhoneLehrerzimmer($phoneLehrerzimmer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phoneLehrerzimmer)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phoneLehrerzimmer)) {
                $phoneLehrerzimmer = str_replace('*', '%', $phoneLehrerzimmer);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SchoolPeer::PHONE_LEHRERZIMMER, $phoneLehrerzimmer, $comparison);
    }

    /**
     * Filter the query on the current_year column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrentYear(1234); // WHERE current_year = 1234
     * $query->filterByCurrentYear(array(12, 34)); // WHERE current_year IN (12, 34)
     * $query->filterByCurrentYear(array('min' => 12)); // WHERE current_year >= 12
     * $query->filterByCurrentYear(array('max' => 12)); // WHERE current_year <= 12
     * </code>
     *
     * @param     mixed $currentYear The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchoolQuery The current query, for fluid interface
     */
    public function filterByCurrentYear($currentYear = null, $comparison = null)
    {
        if (is_array($currentYear)) {
            $useMinMax = false;
            if (isset($currentYear['min'])) {
                $this->addUsingAlias(SchoolPeer::CURRENT_YEAR, $currentYear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($currentYear['max'])) {
                $this->addUsingAlias(SchoolPeer::CURRENT_YEAR, $currentYear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolPeer::CURRENT_YEAR, $currentYear, $comparison);
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
     * @return SchoolQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SchoolPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SchoolPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return SchoolQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SchoolPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SchoolPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return SchoolQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(SchoolPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(SchoolPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return SchoolQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(SchoolPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(SchoolPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchoolPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByCreatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(SchoolPeer::CREATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchoolPeer::CREATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return SchoolQuery The current query, for fluid interface
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
     * @return                 SchoolQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(SchoolPeer::UPDATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchoolPeer::UPDATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return SchoolQuery The current query, for fluid interface
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
     * Filter the query by a related SchoolFunction object
     *
     * @param   SchoolFunction|PropelObjectCollection $schoolFunction  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySchoolFunction($schoolFunction, $comparison = null)
    {
        if ($schoolFunction instanceof SchoolFunction) {
            return $this
                ->addUsingAlias(SchoolPeer::ID, $schoolFunction->getSchoolId(), $comparison);
        } elseif ($schoolFunction instanceof PropelObjectCollection) {
            return $this
                ->useSchoolFunctionQuery()
                ->filterByPrimaryKeys($schoolFunction->getPrimaryKeys())
                ->endUse();
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
     * @return SchoolQuery The current query, for fluid interface
     */
    public function joinSchoolFunction($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useSchoolFunctionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSchoolFunction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SchoolFunction', 'SchoolFunctionQuery');
    }

    /**
     * Filter the query by a related SchoolClass object
     *
     * @param   SchoolClass|PropelObjectCollection $schoolClass  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SchoolQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySchoolClass($schoolClass, $comparison = null)
    {
        if ($schoolClass instanceof SchoolClass) {
            return $this
                ->addUsingAlias(SchoolPeer::ID, $schoolClass->getSchoolId(), $comparison);
        } elseif ($schoolClass instanceof PropelObjectCollection) {
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
     * @return SchoolQuery The current query, for fluid interface
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
        if ($relationAlias) {
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
     * @return   SchoolClassQuery A secondary query class using the current class as primary query
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
     * @param   School $school Object to remove from the list of results
     *
     * @return SchoolQuery The current query, for fluid interface
     */
    public function prune($school = null)
    {
        if ($school) {
            $this->addUsingAlias(SchoolPeer::ID, $school->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // extended_timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     SchoolQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SchoolPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     SchoolQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SchoolPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     SchoolQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SchoolPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     SchoolQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SchoolPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     SchoolQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SchoolPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     SchoolQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SchoolPeer::CREATED_AT);
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
