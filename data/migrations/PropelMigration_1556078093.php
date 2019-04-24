<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1556078093.
 * Generated on 2019-04-24 05:54:53 by rafi
 */
class PropelMigration_1556078093
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

DROP TABLE IF EXISTS `newsletter_mailings`;

DROP TABLE IF EXISTS `newsletters`;

DROP TABLE IF EXISTS `note_types`;

DROP TABLE IF EXISTS `notes`;

DROP TABLE IF EXISTS `subscriber_group_memberships`;

DROP TABLE IF EXISTS `subscriber_groups`;

DROP TABLE IF EXISTS `subscribers`;

ALTER TABLE `class_links` CHANGE `school_class_id` `school_class_id` INTEGER NOT NULL;

ALTER TABLE `class_links` CHANGE `link_id` `link_id` INTEGER NOT NULL;

ALTER TABLE `class_links` CHANGE `created_by` `created_by` INTEGER;

ALTER TABLE `class_links` CHANGE `updated_by` `updated_by` INTEGER;

ALTER TABLE `class_students` CHANGE `school_class_id` `school_class_id` INTEGER NOT NULL;

ALTER TABLE `class_students` CHANGE `student_id` `student_id` INTEGER NOT NULL;

ALTER TABLE `class_students` CHANGE `is_newly_updated` `is_newly_updated` TINYINT(1) DEFAULT 0;

ALTER TABLE `class_students` CHANGE `function_name` `function_name` VARCHAR(80);

ALTER TABLE `class_students` CHANGE `created_by` `created_by` INTEGER;

ALTER TABLE `class_students` CHANGE `updated_by` `updated_by` INTEGER;

ALTER TABLE `class_teachers` CHANGE `school_class_id` `school_class_id` INTEGER NOT NULL;

ALTER TABLE `class_teachers` CHANGE `team_member_id` `team_member_id` INTEGER NOT NULL;

ALTER TABLE `class_teachers` CHANGE `function_name` `function_name` VARCHAR(80) NOT NULL;

ALTER TABLE `class_teachers` CHANGE `sort_order` `sort_order` INTEGER;

ALTER TABLE `class_teachers` CHANGE `is_class_teacher` `is_class_teacher` TINYINT(1) DEFAULT 0;

ALTER TABLE `class_teachers` CHANGE `is_newly_updated` `is_newly_updated` TINYINT(1) DEFAULT 0;

ALTER TABLE `class_teachers` CHANGE `created_by` `created_by` INTEGER;

ALTER TABLE `class_teachers` CHANGE `updated_by` `updated_by` INTEGER;

ALTER TABLE `document_types` CHANGE `id` `id` INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE `document_types` CHANGE `is_office_doc` `is_office_doc` TINYINT(1) DEFAULT 0;

ALTER TABLE `document_types` CHANGE `created_by` `created_by` INTEGER;

ALTER TABLE `document_types` CHANGE `updated_by` `updated_by` INTEGER;

CREATE INDEX `document_types_FI_1` ON `document_types` (`created_by`);

CREATE INDEX `document_types_FI_2` ON `document_types` (`updated_by`);

CREATE UNIQUE INDEX `document_types_U_1` ON `document_types` (`extension`,`mimetype`);

ALTER TABLE `documents` CHANGE `id` `id` INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE `documents` CHANGE `document_type_id` `document_type_id` INTEGER NOT NULL;

ALTER TABLE `documents` CHANGE `document_category_id` `document_category_id` INTEGER;

ALTER TABLE `documents` CHANGE `sort` `sort` INTEGER;

ALTER TABLE `documents` CHANGE `created_by` `created_by` INTEGER;

ALTER TABLE `documents` CHANGE `updated_by` `updated_by` INTEGER;

ALTER TABLE `documents` CHANGE `author` `author` VARCHAR(150);

ALTER TABLE `event_documents` CHANGE `event_id` `event_id` INTEGER NOT NULL;

ALTER TABLE `event_documents` CHANGE `document_id` `document_id` INTEGER NOT NULL;

ALTER TABLE `event_documents` CHANGE `sort` `sort` INTEGER;

ALTER TABLE `event_documents` CHANGE `created_by` `created_by` INTEGER;

ALTER TABLE `event_documents` CHANGE `updated_by` `updated_by` INTEGER;

ALTER TABLE `event_types` CHANGE `id` `id` INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE `event_types` CHANGE `name` `name` VARCHAR(100);

ALTER TABLE `event_types` CHANGE `created_by` `created_by` INTEGER;

ALTER TABLE `event_types` CHANGE `updated_by` `updated_by` INTEGER;

ALTER TABLE `events` CHANGE `is_active` `is_active` TINYINT(1) DEFAULT 0;

ALTER TABLE `events` CHANGE `event_type_id` `event_type_id` INTEGER;

ALTER TABLE `events` CHANGE `school_class_id` `school_class_id` INTEGER;

ALTER TABLE `function_groups` CHANGE `id` `id` INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE `function_groups` CHANGE `name` `name` VARCHAR(100);

ALTER TABLE `function_groups` CHANGE `created_by` `created_by` INTEGER;

ALTER TABLE `function_groups` CHANGE `updated_by` `updated_by` INTEGER;

ALTER TABLE `icampus_syncronisations` CHANGE `id` `id` INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE `icampus_syncronisations` CHANGE `duration` `duration` INTEGER;

ALTER TABLE `icampus_syncronisations` CHANGE `code` `code` INTEGER;

ALTER TABLE `icampus_syncronisations` CHANGE `is_executed_by_cron_job` `is_executed_by_cron_job` TINYINT(1) DEFAULT 1 NOT NULL;

ALTER TABLE `icampus_syncronisations` CHANGE `created_by` `created_by` INTEGER;

ALTER TABLE `icampus_syncronisations` CHANGE `updated_by` `updated_by` INTEGER;

ALTER TABLE `language_objects` CHANGE `has_draft` `has_draft` TINYINT(1) DEFAULT 0;

ALTER TABLE `languages` CHANGE `id` `id` VARCHAR(5) NOT NULL;

ALTER TABLE `link_categories` CHANGE `is_externally_managed` `is_externally_managed` TINYINT(1) DEFAULT 0;

ALTER TABLE `news_types` CHANGE `name` `name` VARCHAR(100) NOT NULL;

DROP INDEX `pages_FI_1` ON `pages`;

DROP INDEX `pages_FI_2` ON `pages`;

ALTER TABLE `pages` CHANGE `name` `name` VARCHAR(50) NOT NULL;

ALTER TABLE `pages` CHANGE `canonical_id` `canonical_id` INTEGER;

ALTER TABLE `pages` CHANGE `identifier` `identifier` VARCHAR(50);

CREATE INDEX `pages_FI_1` ON `pages` (`canonical_id`);

CREATE INDEX `pages_FI_2` ON `pages` (`created_by`);

CREATE INDEX `pages_FI_3` ON `pages` (`updated_by`);

ALTER TABLE `school_buildings` CHANGE `id` `id` INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE `school_buildings` CHANGE `original_id` `original_id` INTEGER NOT NULL;

ALTER TABLE `school_buildings` CHANGE `created_by` `created_by` INTEGER;

ALTER TABLE `school_buildings` CHANGE `updated_by` `updated_by` INTEGER;

ALTER TABLE `school_classes` CHANGE `id` `id` INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE `school_classes` CHANGE `original_id` `original_id` INTEGER;

ALTER TABLE `school_classes` CHANGE `year` `year` SMALLINT NOT NULL;

ALTER TABLE `school_classes` CHANGE `level` `level` TINYINT COMMENT \'Jahrgang\';

ALTER TABLE `school_classes` CHANGE `class_portrait_id` `class_portrait_id` INTEGER;

ALTER TABLE `school_classes` CHANGE `class_schedule_id` `class_schedule_id` INTEGER;

ALTER TABLE `school_classes` CHANGE `week_schedule_id` `week_schedule_id` INTEGER;

ALTER TABLE `school_classes` CHANGE `school_building_id` `school_building_id` INTEGER;

ALTER TABLE `school_classes` CHANGE `school_id` `school_id` INTEGER;

ALTER TABLE `school_classes` CHANGE `created_by` `created_by` INTEGER;

ALTER TABLE `school_classes` CHANGE `updated_by` `updated_by` INTEGER;

ALTER TABLE `school_functions` CHANGE `id` `id` INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE `school_functions` CHANGE `original_id` `original_id` INTEGER NOT NULL;

ALTER TABLE `school_functions` CHANGE `function_group_id` `function_group_id` INTEGER;

ALTER TABLE `school_functions` CHANGE `school_id` `school_id` INTEGER;

ALTER TABLE `school_functions` CHANGE `created_by` `created_by` INTEGER;

ALTER TABLE `school_functions` CHANGE `updated_by` `updated_by` INTEGER;

ALTER TABLE `schools` CHANGE `id` `id` INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE `schools` CHANGE `original_id` `original_id` VARCHAR(50) NOT NULL;

ALTER TABLE `schools` CHANGE `name` `name` VARCHAR(80);

ALTER TABLE `schools` CHANGE `created_by` `created_by` INTEGER;

ALTER TABLE `schools` CHANGE `updated_by` `updated_by` INTEGER;

ALTER TABLE `search_index` CHANGE `link_text` `link_text` VARCHAR(255) NOT NULL;

ALTER TABLE `students` CHANGE `id` `id` INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE `students` CHANGE `original_id` `original_id` INTEGER;

ALTER TABLE `students` CHANGE `portrait_id` `portrait_id` INTEGER;

ALTER TABLE `students` CHANGE `created_by` `created_by` INTEGER;

ALTER TABLE `students` CHANGE `updated_by` `updated_by` INTEGER;

ALTER TABLE `team_member_functions` CHANGE `team_member_id` `team_member_id` INTEGER NOT NULL;

ALTER TABLE `team_member_functions` CHANGE `school_function_id` `school_function_id` INTEGER NOT NULL;

ALTER TABLE `team_member_functions` CHANGE `is_main_function` `is_main_function` TINYINT(1) DEFAULT 0;

ALTER TABLE `team_member_functions` CHANGE `is_newly_updated` `is_newly_updated` TINYINT(1) DEFAULT 0;

ALTER TABLE `team_member_functions` CHANGE `created_by` `created_by` INTEGER;

ALTER TABLE `team_member_functions` CHANGE `updated_by` `updated_by` INTEGER;

ALTER TABLE `team_members` CHANGE `id` `id` INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE `team_members` CHANGE `original_id` `original_id` INTEGER;

ALTER TABLE `team_members` CHANGE `portrait_id` `portrait_id` INTEGER;

ALTER TABLE `team_members` CHANGE `gender_id` `gender_id` CHAR(1);

ALTER TABLE `team_members` CHANGE `user_id` `user_id` INTEGER;

ALTER TABLE `team_members` CHANGE `is_newly_updated` `is_newly_updated` TINYINT(1) DEFAULT 0;

ALTER TABLE `team_members` CHANGE `created_by` `created_by` INTEGER;

ALTER TABLE `team_members` CHANGE `updated_by` `updated_by` INTEGER;

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

ALTER TABLE `class_links` CHANGE `school_class_id` `school_class_id` int(10) unsigned NOT NULL;

ALTER TABLE `class_links` CHANGE `link_id` `link_id` int(11) unsigned NOT NULL;

ALTER TABLE `class_links` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `class_links` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `class_students` CHANGE `school_class_id` `school_class_id` int(10) unsigned NOT NULL;

ALTER TABLE `class_students` CHANGE `student_id` `student_id` int(10) unsigned NOT NULL;

ALTER TABLE `class_students` CHANGE `is_newly_updated` `is_newly_updated` tinyint(3) unsigned DEFAULT 0 NOT NULL;

ALTER TABLE `class_students` CHANGE `function_name` `function_name` VARCHAR(255);

ALTER TABLE `class_students` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `class_students` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `class_teachers` CHANGE `school_class_id` `school_class_id` int(10) unsigned NOT NULL;

ALTER TABLE `class_teachers` CHANGE `team_member_id` `team_member_id` int(10) unsigned NOT NULL;

ALTER TABLE `class_teachers` CHANGE `function_name` `function_name` VARCHAR(80) DEFAULT \'\' NOT NULL;

ALTER TABLE `class_teachers` CHANGE `sort_order` `sort_order` int(10) unsigned;

ALTER TABLE `class_teachers` CHANGE `is_class_teacher` `is_class_teacher` tinyint(3) unsigned NOT NULL;

ALTER TABLE `class_teachers` CHANGE `is_newly_updated` `is_newly_updated` tinyint(3) unsigned DEFAULT 0 NOT NULL;

ALTER TABLE `class_teachers` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `class_teachers` CHANGE `updated_by` `updated_by` int(10) unsigned;

DROP INDEX `document_types_FI_1` ON `document_types`;

DROP INDEX `document_types_FI_2` ON `document_types`;

DROP INDEX `document_types_U_1` ON `document_types`;

ALTER TABLE `document_types` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `document_types` CHANGE `is_office_doc` `is_office_doc` INTEGER(1) DEFAULT 0;

ALTER TABLE `document_types` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `document_types` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `documents` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `documents` CHANGE `document_type_id` `document_type_id` int(10) unsigned NOT NULL;

ALTER TABLE `documents` CHANGE `document_category_id` `document_category_id` int(10) unsigned;

ALTER TABLE `documents` CHANGE `sort` `sort` int(10) unsigned;

ALTER TABLE `documents` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `documents` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `documents` CHANGE `author` `author` VARCHAR(50);

ALTER TABLE `event_documents` CHANGE `event_id` `event_id` int(10) unsigned NOT NULL;

ALTER TABLE `event_documents` CHANGE `document_id` `document_id` int(10) unsigned NOT NULL;

ALTER TABLE `event_documents` CHANGE `sort` `sort` int(10) unsigned;

ALTER TABLE `event_documents` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `event_documents` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `event_types` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `event_types` CHANGE `name` `name` VARCHAR(50);

ALTER TABLE `event_types` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `event_types` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `events` CHANGE `is_active` `is_active` tinyint(1) unsigned NOT NULL;

ALTER TABLE `events` CHANGE `event_type_id` `event_type_id` tinyint(3) unsigned NOT NULL;

ALTER TABLE `events` CHANGE `school_class_id` `school_class_id` int(10) unsigned;

ALTER TABLE `function_groups` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `function_groups` CHANGE `name` `name` VARCHAR(50);

ALTER TABLE `function_groups` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `function_groups` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `icampus_syncronisations` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `icampus_syncronisations` CHANGE `duration` `duration` int(10) unsigned;

ALTER TABLE `icampus_syncronisations` CHANGE `code` `code` smallint(5) unsigned;

ALTER TABLE `icampus_syncronisations` CHANGE `is_executed_by_cron_job` `is_executed_by_cron_job` tinyint(3) unsigned DEFAULT 1 NOT NULL;

ALTER TABLE `icampus_syncronisations` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `icampus_syncronisations` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `language_objects` CHANGE `has_draft` `has_draft` tinyint(3) unsigned DEFAULT 0 NOT NULL;

ALTER TABLE `languages` CHANGE `id` `id` VARCHAR(3) NOT NULL;

ALTER TABLE `link_categories` CHANGE `is_externally_managed` `is_externally_managed` tinyint(3) unsigned NOT NULL;

ALTER TABLE `news_types` CHANGE `name` `name` VARCHAR(100);

DROP INDEX `pages_FI_3` ON `pages`;

DROP INDEX `pages_FI_1` ON `pages`;

DROP INDEX `pages_FI_2` ON `pages`;

ALTER TABLE `pages` CHANGE `name` `name` VARCHAR(50);

ALTER TABLE `pages` CHANGE `canonical_id` `canonical_id` int(10) unsigned;

ALTER TABLE `pages` CHANGE `identifier` `identifier` VARCHAR(30);

CREATE INDEX `pages_FI_1` ON `pages` (`created_by`);

CREATE INDEX `pages_FI_2` ON `pages` (`updated_by`);

ALTER TABLE `school_buildings` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `school_buildings` CHANGE `original_id` `original_id` int(10) unsigned NOT NULL;

ALTER TABLE `school_buildings` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `school_buildings` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `school_classes` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `school_classes` CHANGE `original_id` `original_id` int(10) unsigned;

ALTER TABLE `school_classes` CHANGE `year` `year` SMALLINT;

ALTER TABLE `school_classes` CHANGE `level` `level` tinyint(3) unsigned;

ALTER TABLE `school_classes` CHANGE `class_portrait_id` `class_portrait_id` int(10) unsigned;

ALTER TABLE `school_classes` CHANGE `class_schedule_id` `class_schedule_id` int(10) unsigned;

ALTER TABLE `school_classes` CHANGE `week_schedule_id` `week_schedule_id` int(10) unsigned;

ALTER TABLE `school_classes` CHANGE `school_building_id` `school_building_id` int(10) unsigned;

ALTER TABLE `school_classes` CHANGE `school_id` `school_id` int(10) unsigned;

ALTER TABLE `school_classes` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `school_classes` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `school_functions` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `school_functions` CHANGE `original_id` `original_id` int(10) unsigned NOT NULL;

ALTER TABLE `school_functions` CHANGE `function_group_id` `function_group_id` int(10) unsigned NOT NULL;

ALTER TABLE `school_functions` CHANGE `school_id` `school_id` int(10) unsigned;

ALTER TABLE `school_functions` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `school_functions` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `schools` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `schools` CHANGE `original_id` `original_id` VARCHAR(50);

ALTER TABLE `schools` CHANGE `name` `name` VARCHAR(255);

ALTER TABLE `schools` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `schools` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `search_index` CHANGE `link_text` `link_text` VARCHAR(50) NOT NULL;

ALTER TABLE `students` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `students` CHANGE `original_id` `original_id` int(10) unsigned;

ALTER TABLE `students` CHANGE `portrait_id` `portrait_id` int(10) unsigned;

ALTER TABLE `students` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `students` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `team_member_functions` CHANGE `team_member_id` `team_member_id` int(10) unsigned NOT NULL;

ALTER TABLE `team_member_functions` CHANGE `school_function_id` `school_function_id` int(10) unsigned NOT NULL;

ALTER TABLE `team_member_functions` CHANGE `is_main_function` `is_main_function` tinyint(1) unsigned NOT NULL;

ALTER TABLE `team_member_functions` CHANGE `is_newly_updated` `is_newly_updated` tinyint(1) unsigned NOT NULL;

ALTER TABLE `team_member_functions` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `team_member_functions` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `team_members` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `team_members` CHANGE `original_id` `original_id` int(10) unsigned;

ALTER TABLE `team_members` CHANGE `portrait_id` `portrait_id` int(10) unsigned;

ALTER TABLE `team_members` CHANGE `gender_id` `gender_id` CHAR;

ALTER TABLE `team_members` CHANGE `user_id` `user_id` int(10) unsigned;

ALTER TABLE `team_members` CHANGE `is_newly_updated` `is_newly_updated` tinyint(1) unsigned NOT NULL;

ALTER TABLE `team_members` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `team_members` CHANGE `updated_by` `updated_by` int(10) unsigned;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}