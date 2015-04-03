<?php
/**
* @package modules.widget
*/
class YearInputWidgetModule extends PersistentWidgetModule {
	public $sYear;

	public function __construct($sSessionKey, $sYear = null) {
		$this->setSelectedYear($sYear);
		parent::__construct($sSessionKey);
	}

  public function allSchoolYears() {
		$aResult = array();
		$oCriteria = SchoolClassQuery::create()->groupByYear(SchoolClassPeer::YEAR)->orderByYear(Criteria::DESC);
		$oCriteria->clearSelectColumns()->addSelectColumn(SchoolClassPeer::YEAR);
		$aResult[CriteriaListWidgetDelegate::SELECT_ALL] = StringPeer::getString('wns.year_input.show_all');
		foreach(SchoolClassPeer::doSelectStmt($oCriteria)->fetchAll(PDO::FETCH_COLUMN) as $sYear) {
      $aResult[$sYear] = SchoolPeer::getPeriodFromYear($sYear);
		}
		return $aResult;
	}

	public function setSelectedYear($sYear) {
		$this->sYear = $sYear;
	}

	public function getSelectedYear() {
		return $this->sYear;
	}

	public function getElementType() {
		return 'select';
	}
}