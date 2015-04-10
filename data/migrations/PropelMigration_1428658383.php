<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1428658383.
 * Generated on 2015-04-10 11:33:03 by jmg
 */
class PropelMigration_1428658383
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

DROP INDEX `events_FI_2` ON `events`;

DROP INDEX `events_FI_3` ON `events`;

DROP INDEX `events_FI_4` ON `events`;

ALTER TABLE `events` CHANGE `is_active` `is_active` tinyint(1) unsigned NOT NULL;

ALTER TABLE `events` CHANGE `event_type_id` `event_type_id` tinyint(3) unsigned NOT NULL;

ALTER TABLE `events` CHANGE `school_class_id` `school_class_id` int(10) unsigned;

CREATE INDEX `events_FI_2` ON `events` (`gallery_id`);

CREATE INDEX `events_FI_3` ON `events` (`created_by`);

CREATE INDEX `events_FI_4` ON `events` (`updated_by`);

CREATE INDEX `title_normalized` ON `events` (`slug`);

ALTER TABLE `function_groups` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `function_groups` CHANGE `name` `name` VARCHAR(50);

ALTER TABLE `function_groups` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `function_groups` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `language_objects` CHANGE `has_draft` `has_draft` tinyint(3) unsigned DEFAULT 0 NOT NULL;

ALTER TABLE `languages` CHANGE `id` `id` VARCHAR(3) NOT NULL;

ALTER TABLE `link_categories` CHANGE `is_externally_managed` `is_externally_managed` tinyint(3) unsigned NOT NULL;

ALTER TABLE `news_types` CHANGE `name` `name` VARCHAR(100);

DROP INDEX `newsletter_mailings_FI_4` ON `newsletter_mailings`;

DROP INDEX `newsletter_mailings_FI_3` ON `newsletter_mailings`;

ALTER TABLE `newsletter_mailings` CHANGE `created_by` `created_by` INTEGER NOT NULL;

ALTER TABLE `newsletter_mailings` DROP `recipient_count`;

CREATE INDEX `newsletter_mailings_FI_3` ON `newsletter_mailings` (`updated_by`);

ALTER TABLE `newsletters` CHANGE `is_approved` `is_approved` TINYINT DEFAULT 0 NOT NULL;

ALTER TABLE `newsletters` CHANGE `is_html` `is_html` TINYINT DEFAULT 1 NOT NULL;

DROP INDEX `pages_FI_3` ON `pages`;

DROP INDEX `pages_FI_1` ON `pages`;

DROP INDEX `pages_FI_2` ON `pages`;

ALTER TABLE `pages` CHANGE `name` `name` VARCHAR(50);

ALTER TABLE `pages` CHANGE `page_type` `page_type` VARCHAR(50);

ALTER TABLE `pages` CHANGE `canonical_id` `canonical_id` int(10) unsigned;

ALTER TABLE `pages` CHANGE `identifier` `identifier` VARCHAR(30);

CREATE INDEX `pages_FI_1` ON `pages` (`created_by`);

CREATE INDEX `pages_FI_2` ON `pages` (`updated_by`);

ALTER TABLE `school_buildings` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `school_buildings` CHANGE `original_id` `original_id` int(10) unsigned NOT NULL;

ALTER TABLE `school_buildings` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `school_buildings` CHANGE `updated_by` `updated_by` int(10) unsigned;

DROP INDEX `school_classes_FI_1` ON `school_classes`;

DROP INDEX `school_classes_FI_3` ON `school_classes`;

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

CREATE INDEX `school_classes_FI_3` ON `school_classes` (`class_schedule_id`);

DROP INDEX `school_functions_FI_4` ON `school_functions`;

DROP INDEX `school_functions_FI_1` ON `school_functions`;

DROP INDEX `school_functions_FI_2` ON `school_functions`;

DROP INDEX `school_functions_FI_3` ON `school_functions`;

ALTER TABLE `school_functions` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `school_functions` CHANGE `original_id` `original_id` int(10) unsigned NOT NULL;

ALTER TABLE `school_functions` CHANGE `function_group_id` `function_group_id` int(10) unsigned NOT NULL;

ALTER TABLE `school_functions` CHANGE `school_id` `school_id` int(10) unsigned;

ALTER TABLE `school_functions` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `school_functions` CHANGE `updated_by` `updated_by` int(10) unsigned;

CREATE INDEX `school_functions_FI_1` ON `school_functions` (`school_id`);

CREATE INDEX `school_functions_FI_2` ON `school_functions` (`created_by`);

CREATE INDEX `school_functions_FI_3` ON `school_functions` (`updated_by`);

ALTER TABLE `schools` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `schools` CHANGE `original_id` `original_id` VARCHAR(50);

ALTER TABLE `schools` CHANGE `name` `name` VARCHAR(255);

ALTER TABLE `schools` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `schools` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `students` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `students` CHANGE `original_id` `original_id` int(10) unsigned;

ALTER TABLE `students` CHANGE `portrait_id` `portrait_id` int(10) unsigned;

ALTER TABLE `students` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `students` CHANGE `updated_by` `updated_by` int(10) unsigned;

ALTER TABLE `subscriber_group_memberships` DROP `opt_in_hash`;

ALTER TABLE `subscriber_groups` CHANGE `is_default` `is_default` TINYINT DEFAULT 0 NOT NULL;

ALTER TABLE `subscriber_groups` DROP `display_name`;

DROP INDEX `subscribers_U_1` ON `subscribers`;

ALTER TABLE `subscribers` CHANGE `preferred_language_id` `preferred_language_id` VARCHAR(3) NOT NULL;

ALTER TABLE `team_member_functions` CHANGE `team_member_id` `team_member_id` int(10) unsigned NOT NULL;

ALTER TABLE `team_member_functions` CHANGE `school_function_id` `school_function_id` int(10) unsigned NOT NULL;

ALTER TABLE `team_member_functions` CHANGE `is_main_function` `is_main_function` tinyint(1) unsigned NOT NULL;

ALTER TABLE `team_member_functions` CHANGE `is_newly_updated` `is_newly_updated` tinyint(1) unsigned NOT NULL;

ALTER TABLE `team_member_functions` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `team_member_functions` CHANGE `updated_by` `updated_by` int(10) unsigned;

CREATE INDEX `is_newly_updated` ON `team_member_functions` (`is_newly_updated`);

DROP INDEX `team_members_FI_4` ON `team_members`;

DROP INDEX `team_members_FI_2` ON `team_members`;

DROP INDEX `team_members_FI_3` ON `team_members`;

ALTER TABLE `team_members` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `team_members` CHANGE `original_id` `original_id` int(10) unsigned;

ALTER TABLE `team_members` CHANGE `portrait_id` `portrait_id` int(10) unsigned;

ALTER TABLE `team_members` CHANGE `gender_id` `gender_id` CHAR;

ALTER TABLE `team_members` CHANGE `user_id` `user_id` int(10) unsigned;

ALTER TABLE `team_members` CHANGE `is_newly_updated` `is_newly_updated` tinyint(1) unsigned NOT NULL;

ALTER TABLE `team_members` CHANGE `created_by` `created_by` int(10) unsigned;

ALTER TABLE `team_members` CHANGE `updated_by` `updated_by` int(10) unsigned;

CREATE INDEX `team_members_FI_2` ON `team_members` (`created_by`);

CREATE INDEX `team_members_FI_3` ON `team_members` (`updated_by`);

CREATE INDEX `is_newly_updated` ON `team_members` (`is_newly_updated`);

CREATE TABLE `_migration_base`
(
    `version` INTEGER DEFAULT 0
) ENGINE=MyISAM;

CREATE TABLE `icampus_syncronisations`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `log` LONGBLOB,
    `duration` int(10) unsigned,
    `code` smallint(5) unsigned,
    `is_executed_by_cron_job` tinyint(3) unsigned DEFAULT 1 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `created_by` int(10) unsigned,
    `updated_by` int(10) unsigned,
    PRIMARY KEY (`id`),
    INDEX `icampus_syncronisations_FI_1` (`created_by`(10)),
    INDEX `icampus_syncronisations_FI_2` (`updated_by`(10))
) ENGINE=MyISAM;

CREATE TABLE `note_types`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(80) NOT NULL,
    `created_at` DATETIME NOT NULL,
    `created_by` int(10) unsigned,
    `updated_at` DATETIME NOT NULL,
    `updated_by` int(10) unsigned,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

CREATE TABLE `notes`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `note_type_id` tinyint(3) unsigned,
    `body` LONGBLOB,
    `date_start` DATE NOT NULL,
    `date_end` DATE,
    `image_id` int(10) unsigned,
    `is_inactive` tinyint(3) unsigned DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `created_by` int(10) unsigned,
    `updated_by` int(10) unsigned,
    PRIMARY KEY (`id`),
    INDEX `notes_FI_1` (`created_by`(10)),
    INDEX `notes_FI_2` (`updated_by`(10)),
    INDEX `note_type_id` (`note_type_id`(3)),
    INDEX `image_id` (`image_id`(10))
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}