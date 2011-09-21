#3024
ALTER TABLE `team_members` ADD `gender_id` CHAR( 1 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `portrait_id`;

#20110224.1423
ALTER TABLE `schools` CHANGE `phone` `phone_schulleitung` VARCHAR( 14 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `schools` ADD `phone_lehrerzimmer` VARCHAR( 14 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `phone_schulleitung`;
ALTER TABLE `schools` ADD `school_unit` VARCHAR( 80 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `name`;

#20110225.1331, temp input till atomisation of class_type_id is defined
ALTER TABLE `school_classes` ADD `klassentyp` VARCHAR( 80 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `room_number` 

#20110303.1621, name change and new table
RENAME TABLE `cms_***REMOVED***`.`classes_students` TO `cms_***REMOVED***`.`class_students` ;
DROP TABLE IF EXISTS `class_students`;
CREATE TABLE IF NOT EXISTS `class_students` (
  `school_class_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`school_class_id`,`student_id`),
  KEY `classes_students_FI_2` (`student_id`),
  KEY `classes_students_FI_3` (`created_by`),
  KEY `classes_students_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#20110310.0845
ALTER TABLE `class_teachers` ADD `function_name` VARCHAR( 80 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `team_member_id`;

#20110313.1057
ALTER TABLE `students` CHANGE `birth_day` `date_of_birth` DATE NULL DEFAULT NULL;
ALTER TABLE `school_functions` ADD `original_id` INT UNSIGNED NOT NULL AFTER `id`;

#20110317.1036
INSERT INTO `cms_***REMOVED***`.`document_categories` (
`id` ,
`name` ,
`sort` ,
`max_width` ,
`is_externally_managed` ,
`is_inactive` ,
`created_at` ,
`updated_at` ,
`created_by` ,
`updated_by`
)
VALUES (
'10', 'Portraits', NULL , NULL , '1', '0', NOW( ) , NOW( ) , '1', '1'),
('11', 'Klassenfotos', NULL , NULL , '1', '0', NOW( ) , NOW( ) , '1', '1'
);

ALTER TABLE `school_classes` ADD `class_portrait_id` INT UNSIGNED NULL DEFAULT NULL AFTER `klassentyp` ,
ADD INDEX ( `class_portrait_id` );

ALTER TABLE `school_classes` ADD `klassentyp_normalized` VARCHAR( 80 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER `klassentyp`;

#20110320.1009
ALTER TABLE `class_students` ADD `function_name` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `student_id`;

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teaser` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opening_hours` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_index` (`created_by`),
  KEY `updated_by_index` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `service_members`;
CREATE TABLE IF NOT EXISTS `service_members` (
  `service_id` int(10) unsigned NOT NULL,
  `function_name` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_member_id` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`service_id`,`team_member_id`),
  KEY `service_members_FI_2` (`team_member_id`),
  KEY `service_members_FI_3` (`created_by`),
  KEY `service_members_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `events` ADD `time_details` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `date_end`;
ALTER TABLE `events` ADD `is_active` TINYINT( 1 ) UNSIGNED NOT NULL AFTER `time_details`;

#20110321.0710
ALTER TABLE `events` ADD `teaser` VARCHAR( 514 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `title`;
ALTER TABLE `events` ADD `location_info` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `date_end`;
ALTER TABLE `events` ADD `service_id` INT UNSIGNED NULL DEFAULT NULL AFTER `is_active` ,
ADD INDEX ( `service_id` );

ALTER TABLE `school_classes` DROP `class_teacher_id`;
ALTER TABLE `class_teachers` ADD `is_class_teacher` TINYINT UNSIGNED NOT NULL AFTER `function_name`;

#20110324.1106
ALTER TABLE `school_classes` DROP `klassentyp` ,
DROP `klassentyp_normalized` ;
ALTER TABLE `class_types` CHANGE `original_id` `original_name` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;
ALTER TABLE `class_types` ADD `name_normalized` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER `original_name`;

DROP TABLE IF EXISTS `class_types`;
CREATE TABLE IF NOT EXISTS `class_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `original_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_normalized` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_types_FI_1` (`created_by`),
  KEY `class_types_FI_2` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

ALTER TABLE `school_functions` ADD `function_group_id` INT UNSIGNED NOT NULL AFTER `title`;
ALTER TABLE `school_classes` CHANGE `year` `level` TINYINT UNSIGNED NOT NULL DEFAULT '0';
ALTER TABLE `school_classes` CHANGE `level` `level` TINYINT( 3 ) UNSIGNED NULL DEFAULT NULL;
ALTER TABLE `school_classes` CHANGE `year_start` `year` SMALLINT NULL DEFAULT NULL;

#20110324.1458
INSERT INTO `cms_primarschule`.`document_categories` (
`id` ,
`name` ,
`sort` ,
`max_width` ,
`is_externally_managed` ,
`is_inactive` ,
`created_at` ,
`updated_at` ,
`created_by` ,
`updated_by`
)
VALUES (
'12', 'Stundenpläne', NULL , NULL , '1', '0', NOW( ) , NOW( ) , '1', '1'
);

DROP TABLE IF EXISTS `function_groups`;
CREATE TABLE IF NOT EXISTS `function_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `original_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_normalized` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `function_group_cby` (`created_by`),
  KEY `function_group_uby` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

#20110329.0904
ALTER TABLE `events` ADD `show_on_frontpage` TINYINT UNSIGNED NOT NULL DEFAULT '0' AFTER `is_active`;
ALTER TABLE `events` ADD `event_type_id` TINYINT UNSIGNED NOT NULL AFTER `show_on_frontpage`;

DROP TABLE IF EXISTS `event_types`;
CREATE TABLE IF NOT EXISTS `event_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_types_FI_1` (`created_by`),
  KEY `class_types_FI_2` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

#20110402.0826
ALTER TABLE `school_classes` ADD `week_schedule_id` INT UNSIGNED NULL DEFAULT NULL AFTER `class_schedule_id` ,
ADD INDEX ( `week_schedule_id` );

INSERT INTO `document_categories` (
`id` ,
`name` ,
`sort` ,
`max_width` ,
`is_externally_managed` ,
`is_inactive` ,
`created_at` ,
`updated_at` ,
`created_by` ,
`updated_by`
)
VALUES (
'13', 'Wochenpläne', NULL , NULL , '1', '0', NOW( ) , NOW( ) , '1', '1'
);

ALTER TABLE `services` CHANGE `body` `body` BLOB NULL DEFAULT NULL;

#20110407.0658
ALTER TABLE `class_teachers` ADD `sort_order` INT UNSIGNED NULL DEFAULT NULL AFTER `function_name`;
INSERT INTO `link_categories` (
`id` ,
`name` ,
`is_externally_managed` ,
`created_at` ,
`updated_at` ,
`created_by` ,
`updated_by`
)
VALUES (
'2', 'Klassenlinks Extern verwaltet', '1', NOW( ) , NOW( ) , '1', '1'
);

#20110407.1743
DROP TABLE IF EXISTS `class_links`;
CREATE TABLE IF NOT EXISTS `class_links` (
  `school_class_id` int(10) unsigned NOT NULL,
  `link_id` int(11) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`school_class_id`,`link_id`),
  KEY `class_links_FI_2` (`link_id`),
  KEY `class_links_FI_3` (`created_by`),
  KEY `class_links_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#20110413.1237 no cross table, direct link

INSERT INTO `document_categories` (
`id` ,
`name` ,
`sort` ,
`max_width` ,
`is_externally_managed` ,
`is_inactive` ,
`created_at` ,
`updated_at` ,
`created_by` ,
`updated_by`
)
VALUES (
'14', 'Bilder und Dokumente Anlässe', NULL , NULL , '1', '0', NOW( ) , NOW( ) , '1', '1'
);

CREATE TABLE IF NOT EXISTS `event_documents` (
  `event_id` int(10) unsigned NOT NULL,
  `document_id` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`event_id`,`document_id`),
  KEY `event_documents_FI_2` (`document_id`),
  KEY `event_documents_FI_3` (`created_by`),
  KEY `event_documents_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#20110421.1042
ALTER TABLE `team_members` ADD `user_id` INT UNSIGNED NULL DEFAULT NULL AFTER `gender_id` ,
ADD INDEX ( `user_id` );
ALTER TABLE `event_documents` ADD `sort_order` INT UNSIGNED NULL DEFAULT NULL AFTER `document_id`;

#20110503.1634
ALTER TABLE `team_members` ADD `email_g` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `gender_id`;

#20110504.1454
DROP TABLE IF EXISTS `service_categories`;
CREATE TABLE IF NOT EXISTS `service_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_types_FI_1` (`created_by`),
  KEY `class_types_FI_2` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

ALTER TABLE `services` ADD `service_category_id` INT UNSIGNED NULL DEFAULT NULL AFTER `is_active` 

#20110521.2024
CREATE TABLE IF NOT EXISTS `***REMOVED***_syncronisations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log` longblob,
  `duration` int(10) unsigned DEFAULT NULL,
  `code` SMALLINT unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `***REMOVED***_syncronisations_FI_1` (`created_by`),
  KEY `***REMOVED***_syncronisations_FI_2` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

#20110603.0921
ALTER TABLE `event_documents` CHANGE `sort_order` `sort` INT( 10 ) UNSIGNED NULL DEFAULT NULL;

#20110701.0957
ALTER TABLE `schools` ADD `current_year` SMALLINT NULL DEFAULT NULL AFTER `phone_lehrerzimmer`;

#20110704.1228
ALTER TABLE `school_classes` ADD `teaching_unit` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `klassentyp_normalized`;

#20110704.1659
ALTER TABLE `***REMOVED***_syncronisations` ADD `is_executed_by_cron_job` TINYINT UNSIGNED NOT NULL DEFAULT '1' AFTER `code`;

#20110705.1501
ALTER TABLE `school_classes` ADD `unit_name` VARCHAR( 80 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `name`;
ALTER TABLE `school_classes` CHANGE `name` `name` VARCHAR( 80 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `school_classes` CHANGE `teaching_unit` `teaching_unit` VARCHAR( 80 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;

#20110706.0949
ALTER TABLE `service_categories` ADD `name_normalized` VARCHAR( 80 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `name`;

#20110706.2130
CREATE TABLE `service_documents`
(
	`service_id` INTEGER  NOT NULL,
	`document_id` INTEGER  NOT NULL,
	`sort` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`created_by` INTEGER,
	`updated_by` INTEGER,
	PRIMARY KEY (`service_id`,`document_id`),
	CONSTRAINT `service_documents_FK_1`
		FOREIGN KEY (`service_id`)
		REFERENCES `services` (`id`)
		ON DELETE CASCADE,
	INDEX `service_documents_FI_2` (`document_id`),
	CONSTRAINT `service_documents_FK_2`
		FOREIGN KEY (`document_id`)
		REFERENCES `documents` (`id`)
		ON DELETE CASCADE,
	INDEX `service_documents_FI_3` (`created_by`),
	CONSTRAINT `service_documents_FK_3`
		FOREIGN KEY (`created_by`)
		REFERENCES `users` (`id`)
		ON DELETE SET NULL,
	INDEX `service_documents_FI_4` (`updated_by`),
	CONSTRAINT `service_documents_FK_4`
		FOREIGN KEY (`updated_by`)
		REFERENCES `users` (`id`)
		ON DELETE SET NULL
) ENGINE=MyISAM;

ALTER TABLE `services` ADD `logo_id` INT UNSIGNED NULL DEFAULT NULL AFTER `is_active` ,
ADD INDEX ( `logo_id` );

#20110715.0949
ALTER TABLE `school_classes` ADD `slug` VARCHAR( 80 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL AFTER `unit_name`;
ALTER TABLE `school_classes` DROP `klassentyp` ,
DROP `klassentyp_normalized`;

#20110715.1247
ALTER TABLE `team_members` ADD `slug` VARCHAR( 80 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL AFTER `first_name`;

#20110817.1740
ALTER TABLE `events` ADD `title_normalized` VARCHAR( 255 ) NOT NULL AFTER `title` ,
ADD INDEX ( `title_normalized` );

#20110824.1820
ALTER TABLE `team_members` ADD `is_newly_updated` TINYINT( 1 ) UNSIGNED NOT NULL AFTER `is_deleted` ,
ADD INDEX ( `is_newly_updated` );

#20110825.0804
ALTER TABLE `team_member_functions` ADD `is_main_function` TINYINT( 1 ) UNSIGNED NOT NULL AFTER `school_function_id`;
ALTER TABLE `team_member_functions` ADD `is_newly_updated` TINYINT( 1 ) UNSIGNED NOT NULL AFTER `is_main_function` ,
ADD INDEX ( `is_newly_updated` );

#20110827.0701
ALTER TABLE `services` ADD `slug` VARCHAR( 80 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER `name`;

#20110831.1204
ALTER TABLE `service_members` ADD `sort` INT UNSIGNED NULL DEFAULT NULL AFTER `team_member_id`;

#20110921.1038
ALTER TABLE `class_teachers` ADD PRIMARY KEY ( `school_class_id` , `team_member_id` , `function_name` ) ;