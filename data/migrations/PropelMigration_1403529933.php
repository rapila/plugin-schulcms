<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1403529933.
 * Generated on 2014-06-23 15:25:33 by jmg
 */
class PropelMigration_1403529933
{

		public function preUp($manager)
		{
				// add the pre-migration code here
		}

		public function postUp($manager)
		{
			// add the post-migration code here
			// var_dump(__DIR__); exit;

			require_once realpath(__DIR__.'/../../base/lib/inc.php');
			Propel::disableInstancePooling();

			// migrate note_types to news_types
			foreach(NoteTypeQuery::create()->orderByCreatedAt()->find() as $oNoteType) {
				$oNewsType = new NewsType();
				$oNewsType->setName($oNoteType->getName());
				$oNewsType->setCreatedAt($oNoteType->getCreatedAt());
				$oNewsType->setCreatedBy($oNoteType->getCreatedBy());
				$oNewsType->setUpdatedAt($oNoteType->getUpdatedAt());
				$oNewsType->setUpdatedBy($oNoteType->getUpdatedBy());
				$oNewsType->save();
			}
			// migrate notes > news
			foreach(NoteQuery::create()->orderByCreatedAt()->find() as $oNote) {
				$oNews = new News();
				$oNews->setBody($oNote->getBody());
				$oNews->setNewsTypeId($oNote->getNoteTypeId());
				if($oNoteType = $oNote->getNoteType()) {
					$oNews->setHeadline($oNoteType->getName());
				}
				$oNews->setDateStart($oNote->getDateStart());
				$oNews->setDateEnd($oNote->getDateEnd());
				$oNews->setIsInactive($oNote->getIsInactive());
				$oNews->setCreatedAt($oNote->getCreatedAt());
				$oNews->setCreatedBy($oNote->getCreatedBy());
				$oNews->setUpdatedAt($oNote->getUpdatedAt());
				$oNews->setUpdatedBy($oNote->getUpdatedBy());
				$oNews->save();
			}
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

ALTER TABLE `team_members` CHANGE `gender_id` `gender_id` CHAR(1);

CREATE TABLE `news`
(
		`id` INTEGER NOT NULL AUTO_INCREMENT,
		`news_type_id` TINYINT,
		`headline` VARCHAR(80) NOT NULL,
		`body` LONGBLOB,
		`body_short` LONGBLOB,
		`date_start` DATE NOT NULL,
		`date_end` DATE,
		`is_inactive` TINYINT(1) DEFAULT 0,
		`school_class_id` INTEGER,
		`created_at` DATETIME,
		`updated_at` DATETIME,
		`created_by` INTEGER,
		`updated_by` INTEGER,
		PRIMARY KEY (`id`),
		INDEX `news_FI_1` (`news_type_id`),
		INDEX `news_FI_2` (`school_class_id`),
		INDEX `news_FI_3` (`created_by`),
		INDEX `news_FI_4` (`updated_by`)
) ENGINE=MyISAM;

CREATE TABLE `news_types`
(
		`id` INTEGER NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(100),
		`is_externally_managed` TINYINT(1) NOT NULL DEFAULT 0,
		`created_at` DATETIME,
		`updated_at` DATETIME,
		`created_by` INTEGER,
		`updated_by` INTEGER,
		PRIMARY KEY (`id`),
		INDEX `news_types_FI_1` (`created_by`),
		INDEX `news_types_FI_2` (`updated_by`)
) ENGINE=MyISAM;

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

DROP TABLE IF EXISTS `news`;

DROP TABLE IF EXISTS `news_types`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
		}

}