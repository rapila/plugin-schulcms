<?php

/**
 * @package    propel.generator.model
 */
class ServicePeer extends BaseServicePeer {

	public static function addSearchToCriteria($sSearch, $oCriteria) {
		$oSearchCriterion = $oCriteria->getNewCriterion(self::NAME, "%$sSearch%", Criteria::LIKE);
		$oSearchCriterion->addOr($oCriteria->getNewCriterion(self::TEASER, "%$sSearch%", Criteria::LIKE));
		$oSearchCriterion->addOr($oCriteria->getNewCriterion(self::ADDRESS, "%$sSearch%", Criteria::LIKE));
		$oCriteria->add($oSearchCriterion);
	}

}
