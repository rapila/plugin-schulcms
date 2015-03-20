<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1426838996.
 * Generated on 2015-03-20 09:09:56 by jmg
 */
class PropelMigration_1426838996
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

ALTER TABLE `event_types`
    ADD `is_externally_managed` TINYINT(1) DEFAULT 0 AFTER `name`;
UPDATE `event_types`
    SET `is_externally_managed`= 1 WHERE `name` = "Class Events";

ALTER TABLE `pages` CHANGE `page_type` `page_type` VARCHAR(50);

ALTER TABLE `school_classes`
    ADD `is_regular_class` TINYINT(1) DEFAULT 0 AFTER `school_id`;

ALTER TABLE `team_members` CHANGE `gender_id` `gender_id` CHAR(1);

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

ALTER TABLE `event_types` DROP `is_externally_managed`;

ALTER TABLE `school_classes` DROP `is_regular_class`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}