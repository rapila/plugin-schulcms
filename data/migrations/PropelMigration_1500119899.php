<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1500119899.
 * Generated on 2017-07-15 13:58:19 by rafi
 */
class PropelMigration_1500119899
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

ALTER TABLE `school_classes` CHANGE `name` `name` VARCHAR(180);

ALTER TABLE `school_classes` CHANGE `unit_name` `unit_name` VARCHAR(180);

ALTER TABLE `school_classes` CHANGE `slug` `slug` VARCHAR(180);

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

ALTER TABLE `school_classes` CHANGE `name` `name` VARCHAR(80);

ALTER TABLE `school_classes` CHANGE `unit_name` `unit_name` VARCHAR(80);

ALTER TABLE `school_classes` CHANGE `slug` `slug` VARCHAR(80);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}