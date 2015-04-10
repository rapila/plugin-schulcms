<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1410260189.
 * Generated on 2014-09-09 12:56:29 by jmg
 */
class PropelMigration_1410260189
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


DROP INDEX `news_FI_2` ON `news`;

CREATE INDEX `news_FI_2` ON `news` (`school_class_id`);

ALTER TABLE `news_types` CHANGE `is_externally_managed` `is_externally_managed` TINYINT(1) DEFAULT 0;

# handle indices in a last migration for each site schulcms individually
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

CREATE INDEX `news_FI_2` ON `news` (`created_by`);

ALTER TABLE `news_types` CHANGE `is_externally_managed` `is_externally_managed` TINYINT(1) DEFAULT 0 NOT NULL;

DROP INDEX `school_classes_FI_9` ON `school_classes`;

DROP INDEX `school_classes_FI_2` ON `school_classes`;

DROP INDEX `school_classes_FI_3` ON `school_classes`;

DROP INDEX `school_classes_FI_4` ON `school_classes`;

DROP INDEX `school_classes_FI_5` ON `school_classes`;

DROP INDEX `school_classes_FI_6` ON `school_classes`;

DROP INDEX `school_classes_FI_7` ON `school_classes`;

DROP INDEX `school_classes_FI_8` ON `school_classes`;

CREATE INDEX `school_classes_FI_2` ON `school_classes` (`class_type_id`);

CREATE INDEX `school_classes_FI_3` ON `school_classes` (`class_schedule_id`);

CREATE INDEX `school_classes_FI_4` ON `school_classes` (`week_schedule_id`);

CREATE INDEX `school_classes_FI_5` ON `school_classes` (`school_building_id`);

CREATE INDEX `school_classes_FI_6` ON `school_classes` (`school_id`);

CREATE INDEX `school_classes_FI_7` ON `school_classes` (`created_by`);

CREATE INDEX `school_classes_FI_8` ON `school_classes` (`updated_by`);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}