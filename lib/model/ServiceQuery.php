<?php



/**
 * @package    propel.generator.model
 */
class ServiceQuery extends BaseServiceQuery {

	public function filterByServiceCategoryIds($mServiceCategoryId) {
		$this->setDistinct();
		if(is_array($mServiceCategoryId)) {
			$this->addAnd(ServicePeer::SERVICE_CATEGORY_ID, $mServiceCategoryId, Criteria::IN);
		} elseif($mServiceCategoryId !== null) {
			$this->addAnd(ServicePeer::SERVICE_CATEGORY_ID, $mServiceCategoryId);
		} 
		return $this;
	}

	public function orderByRand() {
		return $this->addAscendingOrderByColumn('RAND()');
	}

}

