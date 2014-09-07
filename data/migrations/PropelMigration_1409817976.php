<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1409817976.
 * Generated on 2014-09-04 10:06:16 by jmg
 */
class PropelMigration_1409817976
{
	public function preUp($manager)
	{
		require_once realpath(__DIR__.'/../../base/lib/inc.php');
		Propel::disableInstancePooling();

		// migrate note_types to news_types
		foreach(ServiceQuery::create()->find() as $oService) {
			$sTeaserContent = self::teaserToHTML($oService->getTeaser());
			$sReviewContent = '';
			if(is_resource($oService->getBody())) {
				$sBodyContent = stream_get_contents($oService->getBody());
			}
			$oRichtextUtil = new RichtextUtil();
			$oService->setBody($oRichtextUtil->getTagParser($sTeaserContent.$sBodyContent));
			$oService->save();
		}
	}

	private static function teaserToHTML($sTeaser) {
		$sMultipleNlPattern = '/[\n\r]{2,}/';
		$aString = preg_split($sMultipleNlPattern, trim($sTeaser));
		return trim(implode(array_map(function($sParagraph) {
			$sParagraph = trim($sParagraph);
			$sParagraph = preg_replace('/ *[\n\r] */', '<br />' . PHP_EOL, $sParagraph);
			return '<p>' . $sParagraph . '</p>' . PHP_EOL;
		}, $aString)));
	}


	public function postUp($manager)
	{
			// add the post-migration code here
	}

	public function preDown($manager)
	{
			// add the pre-migration code here
	}

	public function postDown($manager)
	{
			// add the post-migration code here
	}

	/**
	 * Get the SQL statements for the Up migration
	 *
	 * @return array list of the SQL strings to execute for the Up migration
	 *							 the keys being the datasources
	 */
	public function getUpSQL()
	{
			return array (
'rapila' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;


# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

	/**
	 * Get the SQL statements for the Down migration
	 *
	 * @return array list of the SQL strings to execute for the Down migration
	 *							 the keys being the datasources
	 */
	public function getDownSQL()
	{
			return array (
'rapila' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

}