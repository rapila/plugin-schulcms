<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1410188317.
 * Generated on 2014-09-08 16:58:37 by jmg
 */
class PropelMigration_1410188317
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

ALTER TABLE `news`
    ADD `school_class_id` INTEGER AFTER `is_active`;


UPDATE news
	INNER JOIN class_news
		ON news.id = class_news.news_id
	SET news.school_class_id = class_news.school_class_id
	WHERE class_news.news_id IS NOT NULL;

DROP TABLE IF EXISTS `class_news`;

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

ALTER TABLE `news` DROP `school_class_id`;

CREATE INDEX `news_FI_2` ON `news` (`created_by`);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}