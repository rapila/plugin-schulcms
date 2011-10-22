<?php


/**
 * @package		 propel.generator.model
 */
class EventPeer extends BaseEventPeer {
	
	const EVENT_TYPE_DEFAULT = 1;
	const EVENT_TYPE_PROJECT = 2;

	public static function resetIgnoreOnFrontpage() {
		$oCriteria = new Criteria();
		$oCriteria->add(self::SHOW_ON_FRONTPAGE, true);
		foreach(self::doSelect($oCriteria) as $oResetEvent) {
			$oResetEvent->setIgnoreOnFrontpage(false);
			$oResetEvent->save();
		}
	}
	
	public static function addSearchToCriteria($sSearch, $oCriteria) {
		$oSearchCriterion = $oCriteria->getNewCriterion(self::TITLE, "%$sSearch%", Criteria::LIKE);
		$oSearchCriterion->addOr($oCriteria->getNewCriterion(self::TEASER, "%$sSearch%", Criteria::LIKE));
		$oCriteria->add($oSearchCriterion);
	}
	
	public static function getYears($iEventType = null) {
		$oCriteria = new Criteria();
		$oCriteria->clearSelectColumns()->clearOrderByColumns()->clearGroupByColumns();
		$oCriteria->setDistinct();
		if(is_numeric($iEventType)) {
			$oCriteria->add(self::EVENT_TYPE_ID, $iEventType);
		}
		$oCriteria->addSelectColumn('YEAR(' . self::DATE_START . ') AS Year');
		$oCriteria->addAscendingOrderByColumn('year');
		$aYears = array();
		foreach(self::doSelectStmt($oCriteria)->fetchAll(PDO::FETCH_CLASS) as $aParams) {
			$aYears[] = $aParams->Year;
		}
		return $aYears;
	}
}
