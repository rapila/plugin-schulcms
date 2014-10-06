<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1408611268.
 * Generated on 2014-08-21 10:54:28 by tg
 */
class PropelMigration_1408611268
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
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'rapila' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `note_types`;

DROP TABLE IF EXISTS `notes`;

DROP INDEX `news_FI_2` ON `news`;

ALTER TABLE `news` DROP `school_class_id`;

CREATE INDEX `news_FI_2` ON `news` (`created_by`);

ALTER TABLE `team_members` CHANGE `gender_id` `gender_id` CHAR(1);

UPDATE `objects` SET `object_type` = "news" WHERE `object_type` = "notes";

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'rapila' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP INDEX `news_FI_2` ON `news`;

ALTER TABLE `news`
    ADD `school_class_id` INTEGER AFTER `is_inactive`;

CREATE INDEX `news_FI_2` ON `news` (`school_class_id`);

ALTER TABLE `team_members` CHANGE `gender_id` `gender_id` CHAR;

CREATE TABLE `note_types`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100),
    `created_at` DATETIME,
    `created_by` INTEGER,
    `updated_at` DATETIME,
    `updated_by` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `note_types_FI_1` (`created_by`),
    INDEX `note_types_FI_2` (`updated_by`)
) ENGINE=MyISAM;

CREATE TABLE `notes`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `note_type_id` TINYINT,
    `body` LONGBLOB,
    `date_start` DATE NOT NULL,
    `date_end` DATE,
    `image_id` INTEGER,
    `is_inactive` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `created_by` INTEGER,
    `updated_by` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `note_type_id` (`note_type_id`),
    INDEX `image_id` (`image_id`),
    INDEX `notes_FI_1` (`note_type_id`),
    INDEX `notes_FI_2` (`image_id`),
    INDEX `notes_FI_3` (`created_by`),
    INDEX `notes_FI_4` (`updated_by`)
) ENGINE=MyISAM;

UPDATE `objects` SET `object_type` = "notes" WHERE `object_type` = "news";

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}