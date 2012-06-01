<?php

/**
 * @package    propel.generator.model
 */
class NotePeer extends BaseNotePeer {

	public static function addSearchToCriteria($sSearch, $oCriteria) {
		$oCriteria->add($oCriteria->getNewCriterion(self::BODY, "%$sSearch%", Criteria::LIKE));
	}

}

