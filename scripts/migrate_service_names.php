<?php
require_once(dirname(__FILE__).'/../../../base/lib/inc.php');

// update services with empty slugs
foreach(ServiceQuery::create()->find() as $oService) {
	$oService->setName($oService->getName());
	$oService->save();
}