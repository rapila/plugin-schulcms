<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1409750445.
 * Generated on 2014-09-03 15:20:45 by jmg
 */
class PropelMigration_1409750445
{

		public function preUp($manager)
		{
			// add the pre-migration code here
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
				// ATTENTION: please do BACKUP your data before running the Up migration
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

ALTER TABLE `events`
    CHANGE `body_preview` `body` MEDIUMBLOB AFTER `teaser`;

ALTER TABLE `events`
    ADD `body_short` BLOB AFTER `body`;

UPDATE `events`
	SET `body_short` = IF(`teaser` IS NULL OR `teaser` = "", IF(SUBSTRING_INDEX(`body`, "</p>", 1) != "", CONCAT(SUBSTRING_INDEX(`body`, "</p>", 1), "\n</p>"), NULL), CONCAT("<p>\n", "\t", REPLACE(`teaser`, "\n", "<br />\n\t"), "\n</p>"))

ALTER TABLE `events` DROP `teaser`;

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