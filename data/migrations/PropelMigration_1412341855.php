<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1412341855.
 * Generated on 2014-10-03 15:10:55 by jmg
 */
class PropelMigration_1412341855
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

ALTER TABLE `school_classes`
    ADD `class_type` VARCHAR(80) AFTER `subject_id`;

UPDATE `school_classes` SET `class_type` = (SELECT `name` FROM `class_types` WHERE `class_types`.`id` = `school_classes`.`class_type_id`);

ALTER TABLE `school_classes` DROP `class_type_id`;
CREATE INDEX `school_classes_FI_3` ON `school_classes` (`class_schedule_id`);

DROP TABLE `class_types`;

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

DROP INDEX `school_classes_FI_3` ON `school_classes`;

ALTER TABLE `school_classes`
    ADD `class_type_id` TINYINT AFTER `subject_id`;

ALTER TABLE `school_classes` DROP `class_type`;

CREATE INDEX `school_classes_FI_3` ON `school_classes` (`class_type_id`);

CREATE TABLE `class_types`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `original_name` VARCHAR(100) NOT NULL,
    `slug` VARCHAR(100) NOT NULL,
    `name` VARCHAR(100),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `created_by` INTEGER,
    `updated_by` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `class_types_FI_1` (`created_by`),
    INDEX `class_types_FI_2` (`updated_by`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}