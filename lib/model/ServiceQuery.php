<?php



/**
 * @package    propel.generator.model
 */
class ServiceQuery extends BaseServiceQuery {
	public function filterBySericeCategoryNameNormalized($sNameNormalized) {
		$this->addJoin(ServicePeer::SERVICE_CATEGORY_ID, ServiceCategoryPeer::ID, Criteria::INNER_JOIN);
		$this->add(ServiceCategoryPeer::NAME_NORMALIZED, $sNameNormalized);
		return $this;
	}
	
	public function orderByRand() {
		return $this->addAscendingOrderByColumn('RAND()');
	}

}

