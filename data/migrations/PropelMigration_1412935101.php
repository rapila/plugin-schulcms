<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1412935101.
 * Generated on 2014-10-10 11:58:21 by jmg
 */
class PropelMigration_1412935101
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

DROP TABLE IF EXISTS `service_categories`;

DROP TABLE IF EXISTS `service_documents`;

DROP TABLE IF EXISTS `service_members`;

DROP TABLE IF EXISTS `services`;

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

CREATE TABLE `service_categories`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100),
    `slug` VARCHAR(80),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `created_by` INTEGER,
    `updated_by` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `service_categories_FI_1` (`created_by`),
    INDEX `service_categories_FI_2` (`updated_by`)
) ENGINE=MyISAM;

CREATE TABLE `service_documents`
(
    `service_id` INTEGER NOT NULL,
    `document_id` INTEGER NOT NULL,
    `sort` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `created_by` INTEGER,
    `updated_by` INTEGER,
    PRIMARY KEY (`service_id`,`document_id`),
    INDEX `service_documents_FI_2` (`document_id`),
    INDEX `service_documents_FI_3` (`created_by`),
    INDEX `service_documents_FI_4` (`updated_by`)
) ENGINE=MyISAM;

CREATE TABLE `service_members`
(
    `service_id` INTEGER NOT NULL,
    `function_name` VARCHAR(80),
    `team_member_id` INTEGER NOT NULL,
    `sort` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `created_by` INTEGER,
    `updated_by` INTEGER,
    PRIMARY KEY (`service_id`,`team_member_id`),
    INDEX `service_members_FI_2` (`team_member_id`),
    INDEX `service_members_FI_3` (`created_by`),
    INDEX `service_members_FI_4` (`updated_by`)
) ENGINE=MyISAM;

CREATE TABLE `services`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(80),
    `slug` VARCHAR(80),
    `address` VARCHAR(255),
    `opening_hours` VARCHAR(255),
    `phone` VARCHAR(20),
    `email` VARCHAR(255),
    `website` VARCHAR(255),
    `body` LONGBLOB,
    `body_short` LONGBLOB,
    `is_active` TINYINT(1) DEFAULT 0,
    `logo_id` INTEGER,
    `service_category_id` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `created_by` INTEGER,
    `updated_by` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `services_FI_1` (`logo_id`),
    INDEX `services_FI_2` (`service_category_id`),
    INDEX `services_FI_3` (`created_by`),
    INDEX `services_FI_4` (`updated_by`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
'
);
    }

}