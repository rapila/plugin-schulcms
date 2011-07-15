<?php


/**
 * Base class that represents a query for the 'events' table.
 *
 * 
 *
 * @method     EventQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     EventQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     EventQuery orderByTeaser($order = Criteria::ASC) Order by the teaser column
 * @method     EventQuery orderByBodyPreview($order = Criteria::ASC) Order by the body_preview column
 * @method     EventQuery orderByBodyReview($order = Criteria::ASC) Order by the body_review column
 * @method     EventQuery orderByLocationInfo($order = Criteria::ASC) Order by the location_info column
 * @method     EventQuery orderByDateStart($order = Criteria::ASC) Order by the date_start column
 * @method     EventQuery orderByDateEnd($order = Criteria::ASC) Order by the date_end column
 * @method     EventQuery orderByTimeDetails($order = Criteria::ASC) Order by the time_details column
 * @method     EventQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method     EventQuery orderByShowOnFrontpage($order = Criteria::ASC) Order by the show_on_frontpage column
 * @method     EventQuery orderByEventTypeId($order = Criteria::ASC) Order by the event_type_id column
 * @method     EventQuery orderByServiceId($order = Criteria::ASC) Order by the service_id column
 * @method     EventQuery orderBySchoolClassId($order = Criteria::ASC) Order by the school_class_id column
 * @method     EventQuery orderByGalleryId($order = Criteria::ASC) Order by the gallery_id column
 * @method     EventQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     EventQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     EventQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     EventQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     EventQuery groupById() Group by the id column
 * @method     EventQuery groupByTitle() Group by the title column
 * @method     EventQuery groupByTeaser() Group by the teaser column
 * @method     EventQuery groupByBodyPreview() Group by the body_preview column
 * @method     EventQuery groupByBodyReview() Group by the body_review column
 * @method     EventQuery groupByLocationInfo() Group by the location_info column
 * @method     EventQuery groupByDateStart() Group by the date_start column
 * @method     EventQuery groupByDateEnd() Group by the date_end column
 * @method     EventQuery groupByTimeDetails() Group by the time_details column
 * @method     EventQuery groupByIsActive() Group by the is_active column
 * @method     EventQuery groupByShowOnFrontpage() Group by the show_on_frontpage column
 * @method     EventQuery groupByEventTypeId() Group by the event_type_id column
 * @method     EventQuery groupByServiceId() Group by the service_id column
 * @method     EventQuery groupBySchoolClassId() Group by the school_class_id column
 * @method     EventQuery groupByGalleryId() Group by the gallery_id column
 * @method     EventQuery groupByCreatedAt() Group by the created_at column
 * @method     EventQuery groupByUpdatedAt() Group by the updated_at column
 * @method     EventQuery groupByCreatedBy() Group by the created_by column
 * @method     EventQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     EventQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EventQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EventQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     EventQuery leftJoinEventType($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventType relation
 * @method     EventQuery rightJoinEventType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventType relation
 * @method     EventQuery innerJoinEventType($relationAlias = null) Adds a INNER JOIN clause to the query using the EventType relation
 *
 * @method     EventQuery leftJoinService($relationAlias = null) Adds a LEFT JOIN clause to the query using the Service relation
 * @method     EventQuery rightJoinService($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Service relation
 * @method     EventQuery innerJoinService($relationAlias = null) Adds a INNER JOIN clause to the query using the Service relation
 *
 * @method     EventQuery leftJoinSchoolClass($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchoolClass relation
 * @method     EventQuery rightJoinSchoolClass($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchoolClass relation
 * @method     EventQuery innerJoinSchoolClass($relationAlias = null) Adds a INNER JOIN clause to the query using the SchoolClass relation
 *
 * @method     EventQuery leftJoinDocumentCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the DocumentCategory relation
 * @method     EventQuery rightJoinDocumentCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DocumentCategory relation
 * @method     EventQuery innerJoinDocumentCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the DocumentCategory relation
 *
 * @method     EventQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     EventQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     EventQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method     EventQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     EventQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     EventQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method     EventQuery leftJoinEventDocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventDocument relation
 * @method     EventQuery rightJoinEventDocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventDocument relation
 * @method     EventQuery innerJoinEventDocument($relationAlias = null) Adds a INNER JOIN clause to the query using the EventDocument relation
 *
 * @method     Event findOne(PropelPDO $con = null) Return the first Event matching the query
 * @method     Event findOneOrCreate(PropelPDO $con = null) Return the first Event matching the query, or a new Event object populated from the query conditions when no match is found
 *
 * @method     Event findOneById(int $id) Return the first Event filtered by the id column
 * @method     Event findOneByTitle(string $title) Return the first Event filtered by the title column
 * @method     Event findOneByTeaser(string $teaser) Return the first Event filtered by the teaser column
 * @method     Event findOneByBodyPreview(resource $body_preview) Return the first Event filtered by the body_preview column
 * @method     Event findOneByBodyReview(resource $body_review) Return the first Event filtered by the body_review column
 * @method     Event findOneByLocationInfo(string $location_info) Return the first Event filtered by the location_info column
 * @method     Event findOneByDateStart(string $date_start) Return the first Event filtered by the date_start column
 * @method     Event findOneByDateEnd(string $date_end) Return the first Event filtered by the date_end column
 * @method     Event findOneByTimeDetails(string $time_details) Return the first Event filtered by the time_details column
 * @method     Event findOneByIsActive(boolean $is_active) Return the first Event filtered by the is_active column
 * @method     Event findOneByShowOnFrontpage(boolean $show_on_frontpage) Return the first Event filtered by the show_on_frontpage column
 * @method     Event findOneByEventTypeId(int $event_type_id) Return the first Event filtered by the event_type_id column
 * @method     Event findOneByServiceId(int $service_id) Return the first Event filtered by the service_id column
 * @method     Event findOneBySchoolClassId(int $school_class_id) Return the first Event filtered by the school_class_id column
 * @method     Event findOneByGalleryId(int $gallery_id) Return the first Event filtered by the gallery_id column
 * @method     Event findOneByCreatedAt(string $created_at) Return the first Event filtered by the created_at column
 * @method     Event findOneByUpdatedAt(string $updated_at) Return the first Event filtered by the updated_at column
 * @method     Event findOneByCreatedBy(int $created_by) Return the first Event filtered by the created_by column
 * @method     Event findOneByUpdatedBy(int $updated_by) Return the first Event filtered by the updated_by column
 *
 * @method     array findById(int $id) Return Event objects filtered by the id column
 * @method     array findByTitle(string $title) Return Event objects filtered by the title column
 * @method     array findByTeaser(string $teaser) Return Event objects filtered by the teaser column
 * @method     array findByBodyPreview(resource $body_preview) Return Event objects filtered by the body_preview column
 * @method     array findByBodyReview(resource $body_review) Return Event objects filtered by the body_review column
 * @method     array findByLocationInfo(string $location_info) Return Event objects filtered by the location_info column
 * @method     array findByDateStart(string $date_start) Return Event objects filtered by the date_start column
 * @method     array findByDateEnd(string $date_end) Return Event objects filtered by the date_end column
 * @method     array findByTimeDetails(string $time_details) Return Event objects filtered by the time_details column
 * @method     array findByIsActive(boolean $is_active) Return Event objects filtered by the is_active column
 * @method     array findByShowOnFrontpage(boolean $show_on_frontpage) Return Event objects filtered by the show_on_frontpage column
 * @method     array findByEventTypeId(int $event_type_id) Return Event objects filtered by the event_type_id column
 * @method     array findByServiceId(int $service_id) Return Event objects filtered by the service_id column
 * @method     array findBySchoolClassId(int $school_class_id) Return Event objects filtered by the school_class_id column
 * @method     array findByGalleryId(int $gallery_id) Return Event objects filtered by the gallery_id column
 * @method     array findByCreatedAt(string $created_at) Return Event objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Event objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return Event objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return Event objects filtered by the updated_by column
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
	public function __construct($dbName = 'rapila', $modelName = 'Event', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new EventQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    EventQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof EventQuery) {
			return $criteria;
		}
		$query = new EventQuery();
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
	 * @return    Event|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = EventPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    EventQuery The current query, for fluid interface
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
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(EventPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EventPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * Filter the query on the teaser column
	 * 
	 * @param     string $teaser The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EventPeer::TEASER, $teaser, $comparison);
	}

	/**
	 * Filter the query on the body_preview column
	 * 
	 * @param     mixed $bodyPreview The value to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByBodyPreview($bodyPreview = null, $comparison = null)
	{
		return $this->addUsingAlias(EventPeer::BODY_PREVIEW, $bodyPreview, $comparison);
	}

	/**
	 * Filter the query on the body_review column
	 * 
	 * @param     mixed $bodyReview The value to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByBodyReview($bodyReview = null, $comparison = null)
	{
		return $this->addUsingAlias(EventPeer::BODY_REVIEW, $bodyReview, $comparison);
	}

	/**
	 * Filter the query on the location_info column
	 * 
	 * @param     string $locationInfo The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * @param     string|array $dateStart The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * @param     string|array $dateEnd The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * @param     string $timeDetails The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * @param     boolean|string $isActive The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByIsActive($isActive = null, $comparison = null)
	{
		if (is_string($isActive)) {
			$is_active = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(EventPeer::IS_ACTIVE, $isActive, $comparison);
	}

	/**
	 * Filter the query on the show_on_frontpage column
	 * 
	 * @param     boolean|string $showOnFrontpage The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByShowOnFrontpage($showOnFrontpage = null, $comparison = null)
	{
		if (is_string($showOnFrontpage)) {
			$show_on_frontpage = in_array(strtolower($showOnFrontpage), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(EventPeer::SHOW_ON_FRONTPAGE, $showOnFrontpage, $comparison);
	}

	/**
	 * Filter the query on the event_type_id column
	 * 
	 * @param     int|array $eventTypeId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * Filter the query on the service_id column
	 * 
	 * @param     int|array $serviceId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByServiceId($serviceId = null, $comparison = null)
	{
		if (is_array($serviceId)) {
			$useMinMax = false;
			if (isset($serviceId['min'])) {
				$this->addUsingAlias(EventPeer::SERVICE_ID, $serviceId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($serviceId['max'])) {
				$this->addUsingAlias(EventPeer::SERVICE_ID, $serviceId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EventPeer::SERVICE_ID, $serviceId, $comparison);
	}

	/**
	 * Filter the query on the school_class_id column
	 * 
	 * @param     int|array $schoolClassId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * @param     int|array $galleryId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * @param     int|array $createdBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * @param     int|array $updatedBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * @param     EventType $eventType  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByEventType($eventType, $comparison = null)
	{
		return $this
			->addUsingAlias(EventPeer::EVENT_TYPE_ID, $eventType->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the EventType relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventQuery The current query, for fluid interface
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
		if($relationAlias) {
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
	 * @return    EventTypeQuery A secondary query class using the current class as primary query
	 */
	public function useEventTypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinEventType($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'EventType', 'EventTypeQuery');
	}

	/**
	 * Filter the query by a related Service object
	 *
	 * @param     Service $service  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByService($service, $comparison = null)
	{
		return $this
			->addUsingAlias(EventPeer::SERVICE_ID, $service->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Service relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * Filter the query by a related SchoolClass object
	 *
	 * @param     SchoolClass $schoolClass  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterBySchoolClass($schoolClass, $comparison = null)
	{
		return $this
			->addUsingAlias(EventPeer::SCHOOL_CLASS_ID, $schoolClass->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SchoolClass relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * Filter the query by a related DocumentCategory object
	 *
	 * @param     DocumentCategory $documentCategory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByDocumentCategory($documentCategory, $comparison = null)
	{
		return $this
			->addUsingAlias(EventPeer::GALLERY_ID, $documentCategory->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the DocumentCategory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventQuery The current query, for fluid interface
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
		if($relationAlias) {
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
	 * @return    DocumentCategoryQuery A secondary query class using the current class as primary query
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
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByCreatedBy($user, $comparison = null)
	{
		return $this
			->addUsingAlias(EventPeer::CREATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByCreatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
	{
		return $this
			->addUsingAlias(EventPeer::UPDATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByUpdatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * Filter the query by a related EventDocument object
	 *
	 * @param     EventDocument $eventDocument  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByEventDocument($eventDocument, $comparison = null)
	{
		return $this
			->addUsingAlias(EventPeer::ID, $eventDocument->getEventId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the EventDocument relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventQuery The current query, for fluid interface
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
		if($relationAlias) {
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
	 * @return    EventDocumentQuery A secondary query class using the current class as primary query
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
	 * @param     Event $event Object to remove from the list of results
	 *
	 * @return    EventQuery The current query, for fluid interface
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

} // BaseEventQuery
