<?php
require_once(dirname(__FILE__).'/../../../base/lib/inc.php');

// update events with empty title_normalized
foreach(EventQuery::create()->find() as $oEvent) {
	$oEvent->setTitle($oEvent->getTitle());
	$oEvent->save();
}