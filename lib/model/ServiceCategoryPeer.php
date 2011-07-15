<?php

/**
 * @package    propel.generator.model
 */
class ServiceCategoryPeer extends BaseServiceCategoryPeer {

	public static function getAllSorted($bWithServicesOnly=false) {
		$oCriteria = new Criteria();
		if($bWithServicesOnly) {
		  $oCriteria->setDistinct();
		  $oCriteria->addJoin(self::ID, ServicePeer::SERVICE_CATEGORY_ID, Criteria::INNER_JOIN);
		}
		$oCriteria->addAscendingOrderByColumn(self::NAME);
		return self::doSelect($oCriteria);
	}
	
	public static function getActiveServiceCategories() {
		$oCriteria = new Criteria();
		$oCriteria->addJoin(self::ID, ServicePeer::SERVICE_CATEGORY_ID, Criteria::INNER_JOIN);
		$oCriteria->add(ServicePeer::IS_ACTIVE, true);
		$oCriteria->addAscendingOrderByColumn(self::NAME);
		return self::doSelect($oCriteria);
	}

}

