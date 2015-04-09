<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1403083874.
 * Generated on 2014-06-18 11:31:14 by jmg
 */
class PropelMigration_1403083874
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

ALTER TABLE `team_members` CHANGE `gender_id` `gender_id` CHAR(1);

CREATE TABLE `class_documents` IF NOT EXISTS
(
    `school_class_id` INTEGER NOT NULL,
    `document_id` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `created_by` INTEGER,
    `updated_by` INTEGER,
    PRIMARY KEY (`school_class_id`,`document_id`),
    INDEX `class_documents_FI_2` (`document_id`),
    INDEX `class_documents_FI_3` (`created_by`),
    INDEX `class_documents_FI_4` (`updated_by`)
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

DROP TABLE IF EXISTS `class_documents`;

ALTER TABLE `team_members` CHANGE `gender_id` `gender_id` CHAR;


# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}