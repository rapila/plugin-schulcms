<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1414757076.
 * Generated on 2014-10-31 13:04:36 by jmg
 */
class PropelMigration_1414757076
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
    ADD `ancestor_class_id` INTEGER AFTER `original_id`;

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

DROP INDEX `school_classes_FI_9` ON `school_classes`;

DROP INDEX `school_classes_FI_1` ON `school_classes`;

DROP INDEX `school_classes_FI_2` ON `school_classes`;

DROP INDEX `school_classes_FI_3` ON `school_classes`;

DROP INDEX `school_classes_FI_4` ON `school_classes`;

DROP INDEX `school_classes_FI_5` ON `school_classes`;

DROP INDEX `school_classes_FI_6` ON `school_classes`;

DROP INDEX `school_classes_FI_7` ON `school_classes`;

DROP INDEX `school_classes_FI_8` ON `school_classes`;

ALTER TABLE `school_classes` DROP `ancestor_class_id`;

CREATE INDEX `school_classes_FI_1` ON `school_classes` (`class_portrait_id`);

CREATE INDEX `school_classes_FI_2` ON `school_classes` (`subject_id`);

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