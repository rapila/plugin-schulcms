<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1408623714.
 * Generated on 2014-08-21 14:21:54 by jmg
 */
class PropelMigration_1408623714
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

CREATE TABLE `class_news`
(
    `school_class_id` INTEGER NOT NULL,
    `news_id` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `created_by` INTEGER,
    `updated_by` INTEGER,
    PRIMARY KEY (`school_class_id`,`news_id`),
    INDEX `class_news_FI_2` (`news_id`),
    INDEX `class_news_FI_3` (`created_by`),
    INDEX `class_news_FI_4` (`updated_by`)
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

DROP TABLE IF EXISTS `class_news`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}