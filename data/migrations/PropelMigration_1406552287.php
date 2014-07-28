<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1406552287.
 * Generated on 2014-07-28 14:58:07 by jmg
 */
class PropelMigration_1406552287
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

ALTER TABLE `class_types` CHANGE `name_normalized` `slug` VARCHAR(100) NOT NULL;

ALTER TABLE `events` CHANGE `title_normalized` `slug` VARCHAR(255);

ALTER TABLE `function_groups` CHANGE `name_normalized` `slug` VARCHAR(100) NOT NULL;

ALTER TABLE `service_categories` CHANGE `name_normalized` `slug` VARCHAR(80);

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

ALTER TABLE `class_types` CHANGE `slug` `name_normalized` VARCHAR(100) NOT NULL;

ALTER TABLE `events` CHANGE `slug` `title_normalized` VARCHAR(255);

ALTER TABLE `function_groups` CHANGE `slug` `name_normalized` VARCHAR(100) NOT NULL;

ALTER TABLE `service_categories` CHANGE `slug` `name_normalized` VARCHAR(80);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}