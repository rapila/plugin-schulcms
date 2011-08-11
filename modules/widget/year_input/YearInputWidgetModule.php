<?php
/**
* @package modules.widget
*/
class YearInputWidgetModule extends WidgetModule {
	public $sYear;
	
	public function __construct($sSessionKey, $sYear = null) {
		$this->sYear = $sYear;
		ErrorHandler::log('year_input construct', $sYear);
		$this->setSetting('initial_selection', $this->sYear);
		parent::__construct($sSessionKey);
	}
			
  public function getSchoolYears() {
		$aResult = array();
		$oCriteria = SchoolClassQuery::create()->groupByYear(SchoolClassPeer::YEAR)->orderByYear(Criteria::DESC);
		$oCriteria->clearSelectColumns()->addSelectColumn(SchoolClassPeer::YEAR);
		foreach(SchoolClassPeer::doSelectStmt($oCriteria)->fetchAll(PDO::FETCH_COLUMN) as $sYear) {
      $aResult[$sYear] = SchoolPeer::getPeriodFromYear($sYear);
		}
		return $aResult;
	}
	
	public function getElementType() {
		return 'select';
	}
}