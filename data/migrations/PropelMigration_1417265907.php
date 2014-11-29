<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1417265907.
 * Generated on 2014-11-29 13:58:27 by jmg
 */
class PropelMigration_1417265907
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

ALTER TABLE `events`
    ADD `is_common` TINYINT(1) DEFAULT 0 AFTER `is_active`;

UPDATE `events` SET `is_common` = `ignore_on_frontpage`;

ALTER TABLE `events` DROP `ignore_on_frontpage`;

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

ALTER TABLE `events`
    ADD `ignore_on_frontpage` TINYINT(1) DEFAULT 0 AFTER `is_active`;

UPDATE `events` SET `ignore_on_frontpage` = `is_common`;

ALTER TABLE `events` DROP `is_common`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}