<?php


/**
 * Base class that represents a query for the 'services' table.
 *
 *
 *
 * @method ServiceQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ServiceQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ServiceQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 * @method ServiceQuery orderByTeaser($order = Criteria::ASC) Order by the teaser column
 * @method ServiceQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method ServiceQuery orderByOpeningHours($order = Criteria::ASC) Order by the opening_hours column
 * @method ServiceQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method ServiceQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method ServiceQuery orderByWebsite($order = Criteria::ASC) Order by the website column
 * @method ServiceQuery orderByBody($order = Criteria::ASC) Order by the body column
 * @method ServiceQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method ServiceQuery orderByLogoId($order = Criteria::ASC) Order by the logo_id column
 * @method ServiceQuery orderByServiceCategoryId($order = Criteria::ASC) Order by the service_category_id column
 * @method ServiceQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ServiceQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method ServiceQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method ServiceQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method ServiceQuery groupById() Group by the id column
 * @method ServiceQuery groupByName() Group by the name column
 * @method ServiceQuery groupBySlug() Group by the slug column
 * @method ServiceQuery groupByTeaser() Group by the teaser column
 * @method ServiceQuery groupByAddress() Group by the address column
 * @method ServiceQuery groupByOpeningHours() Group by the opening_hours column
 * @method ServiceQuery groupByPhone() Group by the phone column
 * @method ServiceQuery groupByEmail() Group by the email column
 * @method ServiceQuery groupByWebsite() Group by the website column
 * @method ServiceQuery groupByBody() Group by the body column
 * @method ServiceQuery groupByIsActive() Group by the is_active column
 * @method ServiceQuery groupByLogoId() Group by the logo_id column
 * @method ServiceQuery groupByServiceCategoryId() Group by the service_category_id column
 * @method ServiceQuery groupByCreatedAt() Group by the created_at column
 * @method ServiceQuery groupByUpdatedAt() Group by the updated_at column
 * @method ServiceQuery groupByCreatedBy() Group by the created_by column
 * @method ServiceQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method ServiceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ServiceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ServiceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ServiceQuery leftJoinDocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the Document relation
 * @method ServiceQuery rightJoinDocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Document relation
 * @method ServiceQuery innerJoinDocument($relationAlias = null) Adds a INNER JOIN clause to the query using the Document relation
 *
 * @method ServiceQuery leftJoinServiceCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the ServiceCategory relation
 * @method ServiceQuery rightJoinServiceCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ServiceCategory relation
 * @method ServiceQuery innerJoinServiceCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the ServiceCategory relation
 *
 * @method ServiceQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method ServiceQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method ServiceQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method ServiceQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method ServiceQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method ServiceQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method ServiceQuery leftJoinEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Event relation
 * @method ServiceQuery rightJoinEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Event relation
 * @method ServiceQuery innerJoinEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the Event relation
 *
 * @method ServiceQuery leftJoinServiceMember($relationAlias = null) Adds a LEFT JOIN clause to the query using the ServiceMember relation
 * @method ServiceQuery rightJoinServiceMember($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ServiceMember relation
 * @method ServiceQuery innerJoinServiceMember($relationAlias = null) Adds a INNER JOIN clause to the query using the ServiceMember relation
 *
 * @method ServiceQuery leftJoinServiceDocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the ServiceDocument relation
 * @method ServiceQuery rightJoinServiceDocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ServiceDocument relation
 * @method ServiceQuery innerJoinServiceDocument($relationAlias = null) Adds a INNER JOIN clause to the query using the ServiceDocument relation
 *
 * @method Service findOne(PropelPDO $con = null) Return the first Service matching the query
 * @method Service findOneOrCreate(PropelPDO $con = null) Return the first Service matching the query, or a new Service object populated from the query conditions when no match is found
 *
 * @method Service findOneByName(string $name) Return the first Service filtered by the name column
 * @method Service findOneBySlug(string $slug) Return the first Service filtered by the slug column
 * @method Service findOneByTeaser(string $teaser) Return the first Service filtered by the teaser column
 * @method Service findOneByAddress(string $address) Return the first Service filtered by the address column
 * @method Service findOneByOpeningHours(string $opening_hours) Return the first Service filtered by the opening_hours column
 * @method Service findOneByPhone(string $phone) Return the first Service filtered by the phone column
 * @method Service findOneByEmail(string $email) Return the first Service filtered by the email column
 * @method Service findOneByWebsite(string $website) Return the first Service filtered by the website column
 * @method Service findOneByBody(resource $body) Return the first Service filtered by the body column
 * @method Service findOneByIsActive(boolean $is_active) Return the first Service filtered by the is_active column
 * @method Service findOneByLogoId(int $logo_id) Return the first Service filtered by the logo_id column
 * @method Service findOneByServiceCategoryId(int $service_category_id) Return the first Service filtered by the service_category_id column
 * @method Service findOneByCreatedAt(string $created_at) Return the first Service filtered by the created_at column
 * @method Service findOneByUpdatedAt(string $updated_at) Return the first Service filtered by the updated_at column
 * @method Service findOneByCreatedBy(int $created_by) Return the first Service filtered by the created_by column
 * @method Service findOneByUpdatedBy(int $updated_by) Return the first Service filtered by the updated_by column
 *
 * @method array findById(int $id) Return Service objects filtered by the id column
 * @method array findByName(string $name) Return Service objects filtered by the name column
 * @method array findBySlug(string $slug) Return Service objects filtered by the slug column
 * @method array findByTeaser(string $teaser) Return Service objects filtered by the teaser column
 * @method array findByAddress(string $address) Return Service objects filtered by the address column
 * @method array findByOpeningHours(string $opening_hours) Return Service objects filtered by the opening_hours column
 * @method array findByPhone(string $phone) Return Service objects filtered by the phone column
 * @method array findByEmail(string $email) Return Service objects filtered by the email column
 * @method array findByWebsite(string $website) Return Service objects filtered by the website column
 * @method array findByBody(resource $body) Return Service objects filtered by the body column
 * @method array findByIsActive(boolean $is_active) Return Service objects filtered by the is_active column
 * @method array findByLogoId(int $logo_id) Return Service objects filtered by the logo_id column
 * @method array findByServiceCategoryId(int $service_category_id) Return Service objects filtered by the service_category_id column
 * @method array findByCreatedAt(string $created_at) Return Service objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Service objects filtered by the updated_at column
 * @method array findByCreatedBy(int $created_by) Return Service objects filtered by the created_by column
 * @method array findByUpdatedBy(int $updated_by) Return Service objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseServiceQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseServiceQuery object.
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
            $modelName = 'Service';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ServiceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ServiceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ServiceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ServiceQuery) {
            return $criteria;
        }
        $query = new ServiceQuery(null, null, $modelAlias);

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
     * @return   Service|Service[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ServicePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ServicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Service A model object, or null if the key is not found
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
     * @return                 Service A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `name`, `slug`, `teaser`, `address`, `opening_hours`, `phone`, `email`, `website`, `body`, `is_active`, `logo_id`, `service_category_id`, `created_at`, `updated_at`, `created_by`, `updated_by` FROM `services` WHERE `id` = :p0';
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
            $obj = new Service();
            $obj->hydrate($row);
            ServicePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Service|Service[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Service[]|mixed the list of results, formatted by the current formatter
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
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ServicePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ServicePeer::ID, $keys, Criteria::IN);
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
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ServicePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ServicePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicePeer::ID, $id, $comparison);
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
     * @return ServiceQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ServicePeer::NAME, $name, $comparison);
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
     * @return ServiceQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ServicePeer::SLUG, $slug, $comparison);
    }

    /**
     * Filter the query on the teaser column
     *
     * Example usage:
     * <code>
     * $query->filterByTeaser('fooValue');   // WHERE teaser = 'fooValue'
     * $query->filterByTeaser('%fooValue%'); // WHERE teaser LIKE '%fooValue%'
     * </code>
     *
     * @param     string $teaser The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByTeaser($teaser = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($teaser)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $teaser)) {
                $teaser = str_replace('*', '%', $teaser);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ServicePeer::TEASER, $teaser, $comparison);
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
     * @return ServiceQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ServicePeer::ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the opening_hours column
     *
     * Example usage:
     * <code>
     * $query->filterByOpeningHours('fooValue');   // WHERE opening_hours = 'fooValue'
     * $query->filterByOpeningHours('%fooValue%'); // WHERE opening_hours LIKE '%fooValue%'
     * </code>
     *
     * @param     string $openingHours The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByOpeningHours($openingHours = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($openingHours)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $openingHours)) {
                $openingHours = str_replace('*', '%', $openingHours);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ServicePeer::OPENING_HOURS, $openingHours, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ServicePeer::PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ServicePeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the website column
     *
     * Example usage:
     * <code>
     * $query->filterByWebsite('fooValue');   // WHERE website = 'fooValue'
     * $query->filterByWebsite('%fooValue%'); // WHERE website LIKE '%fooValue%'
     * </code>
     *
     * @param     string $website The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByWebsite($website = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($website)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $website)) {
                $website = str_replace('*', '%', $website);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ServicePeer::WEBSITE, $website, $comparison);
    }

    /**
     * Filter the query on the body column
     *
     * @param     mixed $body The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByBody($body = null, $comparison = null)
    {

        return $this->addUsingAlias(ServicePeer::BODY, $body, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive(true); // WHERE is_active = true
     * $query->filterByIsActive('yes'); // WHERE is_active = true
     * </code>
     *
     * @param     boolean|string $isActive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ServicePeer::IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query on the logo_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLogoId(1234); // WHERE logo_id = 1234
     * $query->filterByLogoId(array(12, 34)); // WHERE logo_id IN (12, 34)
     * $query->filterByLogoId(array('min' => 12)); // WHERE logo_id >= 12
     * $query->filterByLogoId(array('max' => 12)); // WHERE logo_id <= 12
     * </code>
     *
     * @see       filterByDocument()
     *
     * @param     mixed $logoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByLogoId($logoId = null, $comparison = null)
    {
        if (is_array($logoId)) {
            $useMinMax = false;
            if (isset($logoId['min'])) {
                $this->addUsingAlias(ServicePeer::LOGO_ID, $logoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($logoId['max'])) {
                $this->addUsingAlias(ServicePeer::LOGO_ID, $logoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicePeer::LOGO_ID, $logoId, $comparison);
    }

    /**
     * Filter the query on the service_category_id column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceCategoryId(1234); // WHERE service_category_id = 1234
     * $query->filterByServiceCategoryId(array(12, 34)); // WHERE service_category_id IN (12, 34)
     * $query->filterByServiceCategoryId(array('min' => 12)); // WHERE service_category_id >= 12
     * $query->filterByServiceCategoryId(array('max' => 12)); // WHERE service_category_id <= 12
     * </code>
     *
     * @see       filterByServiceCategory()
     *
     * @param     mixed $serviceCategoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByServiceCategoryId($serviceCategoryId = null, $comparison = null)
    {
        if (is_array($serviceCategoryId)) {
            $useMinMax = false;
            if (isset($serviceCategoryId['min'])) {
                $this->addUsingAlias(ServicePeer::SERVICE_CATEGORY_ID, $serviceCategoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($serviceCategoryId['max'])) {
                $this->addUsingAlias(ServicePeer::SERVICE_CATEGORY_ID, $serviceCategoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicePeer::SERVICE_CATEGORY_ID, $serviceCategoryId, $comparison);
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
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ServicePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ServicePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ServicePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ServicePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicePeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(ServicePeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(ServicePeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicePeer::CREATED_BY, $createdBy, $comparison);
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
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(ServicePeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(ServicePeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicePeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related Document object
     *
     * @param   Document|PropelObjectCollection $document The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ServiceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDocument($document, $comparison = null)
    {
        if ($document instanceof Document) {
            return $this
                ->addUsingAlias(ServicePeer::LOGO_ID, $document->getId(), $comparison);
        } elseif ($document instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ServicePeer::LOGO_ID, $document->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ServiceQuery The current query, for fluid interface
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
     * Filter the query by a related ServiceCategory object
     *
     * @param   ServiceCategory|PropelObjectCollection $serviceCategory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ServiceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByServiceCategory($serviceCategory, $comparison = null)
    {
        if ($serviceCategory instanceof ServiceCategory) {
            return $this
                ->addUsingAlias(ServicePeer::SERVICE_CATEGORY_ID, $serviceCategory->getId(), $comparison);
        } elseif ($serviceCategory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ServicePeer::SERVICE_CATEGORY_ID, $serviceCategory->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByServiceCategory() only accepts arguments of type ServiceCategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ServiceCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function joinServiceCategory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ServiceCategory');

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
            $this->addJoinObject($join, 'ServiceCategory');
        }

        return $this;
    }

    /**
     * Use the ServiceCategory relation ServiceCategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ServiceCategoryQuery A secondary query class using the current class as primary query
     */
    public function useServiceCategoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinServiceCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ServiceCategory', 'ServiceCategoryQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ServiceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByCreatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ServicePeer::CREATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ServicePeer::CREATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ServiceQuery The current query, for fluid interface
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
     * @return                 ServiceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ServicePeer::UPDATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ServicePeer::UPDATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ServiceQuery The current query, for fluid interface
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
     * Filter the query by a related Event object
     *
     * @param   Event|PropelObjectCollection $event  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ServiceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEvent($event, $comparison = null)
    {
        if ($event instanceof Event) {
            return $this
                ->addUsingAlias(ServicePeer::ID, $event->getServiceId(), $comparison);
        } elseif ($event instanceof PropelObjectCollection) {
            return $this
                ->useEventQuery()
                ->filterByPrimaryKeys($event->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEvent() only accepts arguments of type Event or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Event relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function joinEvent($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Event');

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
            $this->addJoinObject($join, 'Event');
        }

        return $this;
    }

    /**
     * Use the Event relation Event object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EventQuery A secondary query class using the current class as primary query
     */
    public function useEventQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEvent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Event', 'EventQuery');
    }

    /**
     * Filter the query by a related ServiceMember object
     *
     * @param   ServiceMember|PropelObjectCollection $serviceMember  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ServiceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByServiceMember($serviceMember, $comparison = null)
    {
        if ($serviceMember instanceof ServiceMember) {
            return $this
                ->addUsingAlias(ServicePeer::ID, $serviceMember->getServiceId(), $comparison);
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
     * @return ServiceQuery The current query, for fluid interface
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
     * Filter the query by a related ServiceDocument object
     *
     * @param   ServiceDocument|PropelObjectCollection $serviceDocument  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ServiceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByServiceDocument($serviceDocument, $comparison = null)
    {
        if ($serviceDocument instanceof ServiceDocument) {
            return $this
                ->addUsingAlias(ServicePeer::ID, $serviceDocument->getServiceId(), $comparison);
        } elseif ($serviceDocument instanceof PropelObjectCollection) {
            return $this
                ->useServiceDocumentQuery()
                ->filterByPrimaryKeys($serviceDocument->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByServiceDocument() only accepts arguments of type ServiceDocument or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ServiceDocument relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function joinServiceDocument($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ServiceDocument');

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
            $this->addJoinObject($join, 'ServiceDocument');
        }

        return $this;
    }

    /**
     * Use the ServiceDocument relation ServiceDocument object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ServiceDocumentQuery A secondary query class using the current class as primary query
     */
    public function useServiceDocumentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinServiceDocument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ServiceDocument', 'ServiceDocumentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Service $service Object to remove from the list of results
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function prune($service = null)
    {
        if ($service) {
            $this->addUsingAlias(ServicePeer::ID, $service->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // extended_timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ServiceQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ServicePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ServiceQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ServicePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ServiceQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ServicePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ServiceQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ServicePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ServiceQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ServicePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ServiceQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ServicePeer::CREATED_AT);
    }
    // extended_keyable behavior

    public function filterByPKArray($pkArray) {
            return $this->filterByPrimaryKey($pkArray[0]);
    }

    public function filterByPKString($pkString) {
        return $this->filterByPrimaryKey($pkString);
    }

}
