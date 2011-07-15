<?php


/**
 * @package    propel.generator.model
 */
class EventPeer extends BaseEventPeer {
	
	const EVENT_TYPE_DEFAULT = 1;
	const EVENT_TYPE_PROJECT = 2;

  public static function resetShowOnFrontpage() {
		$oCriteria = new Criteria();
		$oCriteria->add(self::SHOW_ON_FRONTPAGE, true);
		foreach(self::doSelect($oCriteria) as $oResetEvent) {
			$oResetEvent->setShowOnFrontpage(false);
			$oResetEvent->save();
		}
	}
	
	public static function addSearchToCriteria($sSearch, $oCriteria) {
		$oSearchCriterion = $oCriteria->getNewCriterion(self::TITLE, "%$sSearch%", Criteria::LIKE);
		$oSearchCriterion->addOr($oCriteria->getNewCriterion(self::TEASER, "%$sSearch%", Criteria::LIKE));
		$oCriteria->add($oSearchCriterion);
	}
}
