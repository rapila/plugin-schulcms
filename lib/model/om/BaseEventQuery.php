<?php


/**
 * Base class that represents a query for the 'events' table.
 *
 *
 *
 * @method EventQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EventQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method EventQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 * @method EventQuery orderByBody($order = Criteria::ASC) Order by the body column
 * @method EventQuery orderByBodyShort($order = Criteria::ASC) Order by the body_short column
 * @method EventQuery orderByBodyReview($order = Criteria::ASC) Order by the body_review column
 * @method EventQuery orderByLocationInfo($order = Criteria::ASC) Order by the location_info column
 * @method EventQuery orderByDateStart($order = Criteria::ASC) Order by the date_start column
 * @method EventQuery orderByDateEnd($order = Criteria::ASC) Order by the date_end column
 * @method EventQuery orderByTimeDetails($order = Criteria::ASC) Order by the time_details column
 * @method EventQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method EventQuery orderByIsCommon($order = Criteria::ASC) Order by the is_common column
 * @method EventQuery orderByEventTypeId($order = Criteria::ASC) Order by the event_type_id column
 * @method EventQuery orderBySchoolClassId($order = Criteria::ASC) Order by the school_class_id column
 * @method EventQuery orderByGalleryId($order = Criteria::ASC) Order by the gallery_id column
 * @method EventQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method EventQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method EventQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method EventQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method EventQuery groupById() Group by the id column
 * @method EventQuery groupByTitle() Group by the title column
 * @method EventQuery groupBySlug() Group by the slug column
 * @method EventQuery groupByBody() Group by the body column
 * @method EventQuery groupByBodyShort() Group by the body_short column
 * @method EventQuery groupByBodyReview() Group by the body_review column
 * @method EventQuery groupByLocationInfo() Group by the location_info column
 * @method EventQuery groupByDateStart() Group by the date_start column
 * @method EventQuery groupByDateEnd() Group by the date_end column
 * @method EventQuery groupByTimeDetails() Group by the time_details column
 * @method EventQuery groupByIsActive() Group by the is_active column
 * @method EventQuery groupByIsCommon() Group by the is_common column
 * @method EventQuery groupByEventTypeId() Group by the event_type_id column
 * @method EventQuery groupBySchoolClassId() Group by the school_class_id column
 * @method EventQuery groupByGalleryId() Group by the gallery_id column
 * @method EventQuery groupByCreatedAt() Group by the created_at column
 * @method EventQuery groupByUpdatedAt() Group by the updated_at column
 * @method EventQuery groupByCreatedBy() Group by the created_by column
 * @method EventQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method EventQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EventQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EventQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EventQuery leftJoinEventType($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventType relation
 * @method EventQuery rightJoinEventType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventType relation
 * @method EventQuery innerJoinEventType($relationAlias = null) Adds a INNER JOIN clause to the query using the EventType relation
 *
 * @method EventQuery leftJoinSchoolClass($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchoolClass relation
 * @method EventQuery rightJoinSchoolClass($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchoolClass relation
 * @method EventQuery innerJoinSchoolClass($relationAlias = null) Adds a INNER JOIN clause to the query using the SchoolClass relation
 *
 * @method EventQuery leftJoinDocumentCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the DocumentCategory relation
 * @method EventQuery rightJoinDocumentCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DocumentCategory relation
 * @method EventQuery innerJoinDocumentCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the DocumentCategory relation
 *
 * @method EventQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method EventQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method EventQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method EventQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method EventQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method EventQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method EventQuery leftJoinEventDocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventDocument relation
 * @method EventQuery rightJoinEventDocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventDocument relation
 * @method EventQuery innerJoinEventDocument($relationAlias = null) Adds a INNER JOIN clause to the query using the EventDocument relation
 *
 * @method Event findOne(PropelPDO $con = null) Return the first Event matching the query
 * @method Event findOneOrCreate(PropelPDO $con = null) Return the first Event matching the query, or a new Event object populated from the query conditions when no match is found
 *
 * @method Event findOneByTitle(string $title) Return the first Event filtered by the title column
 * @method Event findOneBySlug(string $slug) Return the first Event filtered by the slug column
 * @method Event findOneByBody(resource $body) Return the first Event filtered by the body column
 * @method Event findOneByBodyShort(resource $body_short) Return the first Event filtered by the body_short column
 * @method Event findOneByBodyReview(resource $body_review) Return the first Event filtered by the body_review column
 * @method Event findOneByLocationInfo(string $location_info) Return the first Event filtered by the location_info column
 * @method Event findOneByDateStart(string $date_start) Return the first Event filtered by the date_start column
 * @method Event findOneByDateEnd(string $date_end) Return the first Event filtered by the date_end column
 * @method Event findOneByTimeDetails(string $time_details) Return the first Event filtered by the time_details column
 * @method Event findOneByIsActive(boolean $is_active) Return the first Event filtered by the is_active column
 * @method Event findOneByIsCommon(boolean $is_common) Return the first Event filtered by the is_common column
 * @method Event findOneByEventTypeId(int $event_type_id) Return the first Event filtered by the event_type_id column
 * @method Event findOneBySchoolClassId(int $school_class_id) Return the first Event filtered by the school_class_id column
 * @method Event findOneByGalleryId(int $gallery_id) Return the first Event filtered by the gallery_id column
 * @method Event findOneByCreatedAt(string $created_at) Return the first Event filtered by the created_at column
 * @method Event findOneByUpdatedAt(string $updated_at) Return the first Event filtered by the updated_at column
 * @method Event findOneByCreatedBy(int $created_by) Return the first Event filtered by the created_by column
 * @method Event findOneByUpdatedBy(int $updated_by) Return the first Event filtered by the updated_by column
 *
 * @method array findById(int $id) Return Event objects filtered by the id column
 * @method array findByTitle(string $title) Return Event objects filtered by the title column
 * @method array findBySlug(string $slug) Return Event objects filtered by the slug column
 * @method array findByBody(resource $body) Return Event objects filtered by the body column
 * @method array findByBodyShort(resource $body_short) Return Event objects filtered by the body_short column
 * @method array findByBodyReview(resource $body_review) Return Event objects filtered by the body_review column
 * @method array findByLocationInfo(string $location_info) Return Event objects filtered by the location_info column
 * @method array findByDateStart(string $date_start) Return Event objects filtered by the date_start column
 * @method array findByDateEnd(string $date_end) Return Event objects filtered by the date_end column
 * @method array findByTimeDetails(string $time_details) Return Event objects filtered by the time_details column
 * @method array findByIsActive(boolean $is_active) Return Event objects filtered by the is_active column
 * @method array findByIsCommon(boolean $is_common) Return Event objects filtered by the is_common column
 * @method array findByEventTypeId(int $event_type_id) Return Event objects filtered by the event_type_id column
 * @method array findBySchoolClassId(int $school_class_id) Return Event objects filtered by the school_class_id column
 * @method array findByGalleryId(int $gallery_id) Return Event objects filtered by the gallery_id column
 * @method array findByCreatedAt(string $created_at) Return Event objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Event objects filtered by the updated_at column
 * @method array findByCreatedBy(int $created_by) Return Event objects filtered by the created_by column
 * @method array findByUpdatedBy(int $updated_by) Return Event objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseEventQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEventQuery object.
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
            $modelName = 'Event';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EventQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EventQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EventQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EventQuery) {
            return $criteria;
        }
        $query = new EventQuery(null, null, $modelAlias);

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
     * @return   Event|Event[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Event A model object, or null if the key is not found
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
     * @return                 Event A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `title`, `slug`, `body`, `body_short`, `body_review`, `location_info`, `date_start`, `date_end`, `time_details`, `is_active`, `is_common`, `event_type_id`, `school_class_id`, `gallery_id`, `created_at`, `updated_at`, `created_by`, `updated_by` FROM `events` WHERE `id` = :p0';
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
            $obj = new Event();
            $obj->hydrate($row);
            EventPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Event|Event[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Event[]|mixed the list of results, formatted by the current formatter
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EventPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EventPeer::ID, $keys, Criteria::IN);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EventPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EventPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EventPeer::TITLE, $title, $comparison);
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
     * @return EventQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EventPeer::SLUG, $slug, $comparison);
    }

    /**
     * Filter the query on the body column
     *
     * @param     mixed $body The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByBody($body = null, $comparison = null)
    {

        return $this->addUsingAlias(EventPeer::BODY, $body, $comparison);
    }

    /**
     * Filter the query on the body_short column
     *
     * @param     mixed $bodyShort The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByBodyShort($bodyShort = null, $comparison = null)
    {

        return $this->addUsingAlias(EventPeer::BODY_SHORT, $bodyShort, $comparison);
    }

    /**
     * Filter the query on the body_review column
     *
     * @param     mixed $bodyReview The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByBodyReview($bodyReview = null, $comparison = null)
    {

        return $this->addUsingAlias(EventPeer::BODY_REVIEW, $bodyReview, $comparison);
    }

    /**
     * Filter the query on the location_info column
     *
     * Example usage:
     * <code>
     * $query->filterByLocationInfo('fooValue');   // WHERE location_info = 'fooValue'
     * $query->filterByLocationInfo('%fooValue%'); // WHERE location_info LIKE '%fooValue%'
     * </code>
     *
     * @param     string $locationInfo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByLocationInfo($locationInfo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($locationInfo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $locationInfo)) {
                $locationInfo = str_replace('*', '%', $locationInfo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventPeer::LOCATION_INFO, $locationInfo, $comparison);
    }

    /**
     * Filter the query on the date_start column
     *
     * Example usage:
     * <code>
     * $query->filterByDateStart('2011-03-14'); // WHERE date_start = '2011-03-14'
     * $query->filterByDateStart('now'); // WHERE date_start = '2011-03-14'
     * $query->filterByDateStart(array('max' => 'yesterday')); // WHERE date_start < '2011-03-13'
     * </code>
     *
     * @param     mixed $dateStart The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByDateStart($dateStart = null, $comparison = null)
    {
        if (is_array($dateStart)) {
            $useMinMax = false;
            if (isset($dateStart['min'])) {
                $this->addUsingAlias(EventPeer::DATE_START, $dateStart['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateStart['max'])) {
                $this->addUsingAlias(EventPeer::DATE_START, $dateStart['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::DATE_START, $dateStart, $comparison);
    }

    /**
     * Filter the query on the date_end column
     *
     * Example usage:
     * <code>
     * $query->filterByDateEnd('2011-03-14'); // WHERE date_end = '2011-03-14'
     * $query->filterByDateEnd('now'); // WHERE date_end = '2011-03-14'
     * $query->filterByDateEnd(array('max' => 'yesterday')); // WHERE date_end < '2011-03-13'
     * </code>
     *
     * @param     mixed $dateEnd The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByDateEnd($dateEnd = null, $comparison = null)
    {
        if (is_array($dateEnd)) {
            $useMinMax = false;
            if (isset($dateEnd['min'])) {
                $this->addUsingAlias(EventPeer::DATE_END, $dateEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateEnd['max'])) {
                $this->addUsingAlias(EventPeer::DATE_END, $dateEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::DATE_END, $dateEnd, $comparison);
    }

    /**
     * Filter the query on the time_details column
     *
     * Example usage:
     * <code>
     * $query->filterByTimeDetails('fooValue');   // WHERE time_details = 'fooValue'
     * $query->filterByTimeDetails('%fooValue%'); // WHERE time_details LIKE '%fooValue%'
     * </code>
     *
     * @param     string $timeDetails The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByTimeDetails($timeDetails = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($timeDetails)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $timeDetails)) {
                $timeDetails = str_replace('*', '%', $timeDetails);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventPeer::TIME_DETAILS, $timeDetails, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventPeer::IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query on the is_common column
     *
     * Example usage:
     * <code>
     * $query->filterByIsCommon(true); // WHERE is_common = true
     * $query->filterByIsCommon('yes'); // WHERE is_common = true
     * </code>
     *
     * @param     boolean|string $isCommon The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByIsCommon($isCommon = null, $comparison = null)
    {
        if (is_string($isCommon)) {
            $isCommon = in_array(strtolower($isCommon), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventPeer::IS_COMMON, $isCommon, $comparison);
    }

    /**
     * Filter the query on the event_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEventTypeId(1234); // WHERE event_type_id = 1234
     * $query->filterByEventTypeId(array(12, 34)); // WHERE event_type_id IN (12, 34)
     * $query->filterByEventTypeId(array('min' => 12)); // WHERE event_type_id >= 12
     * $query->filterByEventTypeId(array('max' => 12)); // WHERE event_type_id <= 12
     * </code>
     *
     * @see       filterByEventType()
     *
     * @param     mixed $eventTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByEventTypeId($eventTypeId = null, $comparison = null)
    {
        if (is_array($eventTypeId)) {
            $useMinMax = false;
            if (isset($eventTypeId['min'])) {
                $this->addUsingAlias(EventPeer::EVENT_TYPE_ID, $eventTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventTypeId['max'])) {
                $this->addUsingAlias(EventPeer::EVENT_TYPE_ID, $eventTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::EVENT_TYPE_ID, $eventTypeId, $comparison);
    }

    /**
     * Filter the query on the school_class_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySchoolClassId(1234); // WHERE school_class_id = 1234
     * $query->filterBySchoolClassId(array(12, 34)); // WHERE school_class_id IN (12, 34)
     * $query->filterBySchoolClassId(array('min' => 12)); // WHERE school_class_id >= 12
     * $query->filterBySchoolClassId(array('max' => 12)); // WHERE school_class_id <= 12
     * </code>
     *
     * @see       filterBySchoolClass()
     *
     * @param     mixed $schoolClassId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterBySchoolClassId($schoolClassId = null, $comparison = null)
    {
        if (is_array($schoolClassId)) {
            $useMinMax = false;
            if (isset($schoolClassId['min'])) {
                $this->addUsingAlias(EventPeer::SCHOOL_CLASS_ID, $schoolClassId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($schoolClassId['max'])) {
                $this->addUsingAlias(EventPeer::SCHOOL_CLASS_ID, $schoolClassId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::SCHOOL_CLASS_ID, $schoolClassId, $comparison);
    }

    /**
     * Filter the query on the gallery_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGalleryId(1234); // WHERE gallery_id = 1234
     * $query->filterByGalleryId(array(12, 34)); // WHERE gallery_id IN (12, 34)
     * $query->filterByGalleryId(array('min' => 12)); // WHERE gallery_id >= 12
     * $query->filterByGalleryId(array('max' => 12)); // WHERE gallery_id <= 12
     * </code>
     *
     * @see       filterByDocumentCategory()
     *
     * @param     mixed $galleryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByGalleryId($galleryId = null, $comparison = null)
    {
        if (is_array($galleryId)) {
            $useMinMax = false;
            if (isset($galleryId['min'])) {
                $this->addUsingAlias(EventPeer::GALLERY_ID, $galleryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($galleryId['max'])) {
                $this->addUsingAlias(EventPeer::GALLERY_ID, $galleryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::GALLERY_ID, $galleryId, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(EventPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(EventPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(EventPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(EventPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(EventPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(EventPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(EventPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(EventPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related EventType object
     *
     * @param   EventType|PropelObjectCollection $eventType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEventType($eventType, $comparison = null)
    {
        if ($eventType instanceof EventType) {
            return $this
                ->addUsingAlias(EventPeer::EVENT_TYPE_ID, $eventType->getId(), $comparison);
        } elseif ($eventType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventPeer::EVENT_TYPE_ID, $eventType->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByEventType() only accepts arguments of type EventType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EventType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function joinEventType($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EventType');

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
            $this->addJoinObject($join, 'EventType');
        }

        return $this;
    }

    /**
     * Use the EventType relation EventType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EventTypeQuery A secondary query class using the current class as primary query
     */
    public function useEventTypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEventType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EventType', 'EventTypeQuery');
    }

    /**
     * Filter the query by a related SchoolClass object
     *
     * @param   SchoolClass|PropelObjectCollection $schoolClass The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySchoolClass($schoolClass, $comparison = null)
    {
        if ($schoolClass instanceof SchoolClass) {
            return $this
                ->addUsingAlias(EventPeer::SCHOOL_CLASS_ID, $schoolClass->getId(), $comparison);
        } elseif ($schoolClass instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventPeer::SCHOOL_CLASS_ID, $schoolClass->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return EventQuery The current query, for fluid interface
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
     * Filter the query by a related DocumentCategory object
     *
     * @param   DocumentCategory|PropelObjectCollection $documentCategory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDocumentCategory($documentCategory, $comparison = null)
    {
        if ($documentCategory instanceof DocumentCategory) {
            return $this
                ->addUsingAlias(EventPeer::GALLERY_ID, $documentCategory->getId(), $comparison);
        } elseif ($documentCategory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventPeer::GALLERY_ID, $documentCategory->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByDocumentCategory() only accepts arguments of type DocumentCategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DocumentCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function joinDocumentCategory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DocumentCategory');

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
            $this->addJoinObject($join, 'DocumentCategory');
        }

        return $this;
    }

    /**
     * Use the DocumentCategory relation DocumentCategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DocumentCategoryQuery A secondary query class using the current class as primary query
     */
    public function useDocumentCategoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDocumentCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DocumentCategory', 'DocumentCategoryQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByCreatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(EventPeer::CREATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventPeer::CREATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return EventQuery The current query, for fluid interface
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
     * @return                 EventQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(EventPeer::UPDATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventPeer::UPDATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return EventQuery The current query, for fluid interface
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
     * Filter the query by a related EventDocument object
     *
     * @param   EventDocument|PropelObjectCollection $eventDocument  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEventDocument($eventDocument, $comparison = null)
    {
        if ($eventDocument instanceof EventDocument) {
            return $this
                ->addUsingAlias(EventPeer::ID, $eventDocument->getEventId(), $comparison);
        } elseif ($eventDocument instanceof PropelObjectCollection) {
            return $this
                ->useEventDocumentQuery()
                ->filterByPrimaryKeys($eventDocument->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEventDocument() only accepts arguments of type EventDocument or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EventDocument relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function joinEventDocument($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EventDocument');

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
            $this->addJoinObject($join, 'EventDocument');
        }

        return $this;
    }

    /**
     * Use the EventDocument relation EventDocument object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EventDocumentQuery A secondary query class using the current class as primary query
     */
    public function useEventDocumentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEventDocument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EventDocument', 'EventDocumentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Event $event Object to remove from the list of results
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function prune($event = null)
    {
        if ($event) {
            $this->addUsingAlias(EventPeer::ID, $event->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // extended_timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     EventQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(EventPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     EventQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(EventPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     EventQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(EventPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     EventQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(EventPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     EventQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(EventPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     EventQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(EventPeer::CREATED_AT);
    }
    public function findMostRecentUpdate($bAsTimestamp = false) {
        $oQuery = clone $this;
        $sDate = $oQuery->clearOrderByColumns()->lastUpdatedFirst()->select(["UpdatedAt"])->findOne();
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
