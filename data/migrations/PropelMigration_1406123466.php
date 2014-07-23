<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1406123466.
 * Generated on 2014-07-23 15:51:06 by jmg
 */
class PropelMigration_1406123466
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
    ADD `student_count` TINYINT AFTER `teaching_unit`,
    ADD `subject_id` INTEGER AFTER `class_portrait_id`;

CREATE TABLE `school_class_subject_classes`
(
    `school_class_id` INTEGER NOT NULL,
    `subject_class_id` INTEGER NOT NULL,
    `student_count` TINYINT COMMENT \'only students that belong to both school_class and subject class\',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `created_by` INTEGER,
    `updated_by` INTEGER,
    PRIMARY KEY (`school_class_id`,`subject_class_id`),
    INDEX `school_class_subject_classes_FI_2` (`subject_class_id`),
    INDEX `school_class_subject_classes_FI_3` (`created_by`),
    INDEX `school_class_subject_classes_FI_4` (`updated_by`)
) ENGINE=MyISAM;

CREATE TABLE `subjects`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `original_id` INTEGER,
    `name` VARCHAR(80) NOT NULL,
    `short_name` VARCHAR(40),
    `slug` VARCHAR(80),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `created_by` INTEGER,
    `updated_by` INTEGER,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `subjects_U_1` (`slug`),
    INDEX `subjects_FI_1` (`created_by`),
    INDEX `subjects_FI_2` (`updated_by`)
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
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'rapila' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `subjects`;

ALTER TABLE `school_classes` DROP `student_count`;

ALTER TABLE `school_classes` DROP `subject_id`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}