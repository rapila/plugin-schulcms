-- phpMyAdmin SQL Dump
-- version 3.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 17, 2011 at 01:51 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hps_***REMOVED***`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_links`
--

DROP TABLE IF EXISTS `class_links`;
CREATE TABLE IF NOT EXISTS `class_links` (
  `school_class_id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`school_class_id`,`link_id`),
  KEY `class_links_FI_2` (`link_id`),
  KEY `class_links_FI_3` (`created_by`),
  KEY `class_links_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `class_students`
--

DROP TABLE IF EXISTS `class_students`;
CREATE TABLE IF NOT EXISTS `class_students` (
  `school_class_id` int(11) NOT NULL,
  `function_name` varchar(80) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`school_class_id`,`student_id`),
  KEY `class_students_FI_2` (`student_id`),
  KEY `class_students_FI_3` (`created_by`),
  KEY `class_students_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `class_teachers`
--

DROP TABLE IF EXISTS `class_teachers`;
CREATE TABLE IF NOT EXISTS `class_teachers` (
  `school_class_id` int(11) NOT NULL,
  `function_name` varchar(80) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `is_class_teacher` tinyint(1) DEFAULT '0',
  `team_member_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`school_class_id`,`team_member_id`),
  KEY `class_teachers_FI_2` (`team_member_id`),
  KEY `class_teachers_FI_3` (`created_by`),
  KEY `class_teachers_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `class_types`
--

DROP TABLE IF EXISTS `class_types`;
CREATE TABLE IF NOT EXISTS `class_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `original_name` varchar(100) NOT NULL,
  `name_normalized` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_types_FI_1` (`created_by`),
  KEY `class_types_FI_2` (`updated_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `class_types`
--

INSERT INTO `class_types` (`id`, `original_name`, `name_normalized`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'HPS Basisstufe', 'hps-basisstufe', 'HPS Basisstufe', '2011-07-17 11:37:19', '2011-07-17 11:37:19', NULL, NULL),
(2, 'Austritt', 'austritt', 'Austritt', '2011-07-17 11:37:23', '2011-07-17 11:37:23', NULL, NULL),
(3, 'HPS Schulstufe', 'hps-schulstufe', 'HPS Schulstufe', '2011-07-17 11:37:31', '2011-07-17 11:37:31', NULL, NULL),
(4, 'HPS Werkstufe', 'hps-werkstufe', 'HPS Werkstufe', '2011-07-17 11:38:03', '2011-07-17 11:38:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `original_name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `language_id` varchar(3) DEFAULT NULL,
  `owner_id` int(11) NOT NULL,
  `document_type_id` int(11) NOT NULL,
  `document_category_id` int(11) DEFAULT NULL,
  `is_private` tinyint(1) DEFAULT '0',
  `is_inactive` tinyint(1) DEFAULT '0',
  `is_protected` tinyint(1) DEFAULT '0',
  `sort` int(11) DEFAULT NULL,
  `data` longblob,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documents_FI_1` (`language_id`),
  KEY `documents_FI_2` (`owner_id`),
  KEY `documents_FI_3` (`document_type_id`),
  KEY `documents_FI_4` (`document_category_id`),
  KEY `documents_FI_5` (`created_by`),
  KEY `documents_FI_6` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `document_categories`
--

DROP TABLE IF EXISTS `document_categories`;
CREATE TABLE IF NOT EXISTS `document_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `max_width` int(11) DEFAULT NULL,
  `is_externally_managed` tinyint(1) DEFAULT '0',
  `is_inactive` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `document_categories_FI_1` (`created_by`),
  KEY `document_categories_FI_2` (`updated_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `document_categories`
--

INSERT INTO `document_categories` (`id`, `name`, `sort`, `max_width`, `is_externally_managed`, `is_inactive`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(11, 'Klassenfotos', NULL, NULL, 1, 0, '2011-03-18 07:59:03', '2011-03-18 07:59:03', 1, 1),
(10, 'Portraits', NULL, NULL, 1, 0, '2011-03-18 07:59:03', '2011-03-18 07:59:03', 1, 1),
(12, 'Stundenpläne', NULL, NULL, 1, 0, '2011-03-25 07:45:17', '2011-03-25 07:45:17', 1, 1),
(13, 'Wochenpläne', NULL, NULL, 1, 0, '2011-04-03 20:47:42', '2011-04-03 20:47:42', 1, 1),
(14, 'Bilder und Dokumente Anlässe', NULL, NULL, 1, 0, '2011-04-13 15:37:55', '2011-04-13 15:37:55', 1, 1),
(17, 'Beispiel Dokumentenliste', NULL, NULL, 0, 0, '2011-06-24 09:10:12', '2011-07-16 11:41:32', 1, 1),
(18, 'Angebotsdocuments', NULL, NULL, 1, 0, '2011-07-06 21:39:56', '2011-07-06 21:39:56', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

DROP TABLE IF EXISTS `document_types`;
CREATE TABLE IF NOT EXISTS `document_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extension` varchar(6) NOT NULL,
  `mimetype` varchar(80) NOT NULL,
  `is_office_doc` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `document_types_U_1` (`extension`,`mimetype`),
  KEY `document_types_FI_1` (`created_by`),
  KEY `document_types_FI_2` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `teaser` varchar(514) DEFAULT NULL,
  `body_preview` longblob,
  `body_review` longblob,
  `location_info` varchar(255) DEFAULT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `time_details` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `show_on_frontpage` tinyint(1) DEFAULT '0',
  `event_type_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `school_class_id` int(11) DEFAULT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_FI_1` (`event_type_id`),
  KEY `events_FI_2` (`service_id`),
  KEY `events_FI_3` (`school_class_id`),
  KEY `events_FI_4` (`gallery_id`),
  KEY `events_FI_5` (`created_by`),
  KEY `events_FI_6` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event_documents`
--

DROP TABLE IF EXISTS `event_documents`;
CREATE TABLE IF NOT EXISTS `event_documents` (
  `event_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`event_id`,`document_id`),
  KEY `event_documents_FI_2` (`document_id`),
  KEY `event_documents_FI_3` (`created_by`),
  KEY `event_documents_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

DROP TABLE IF EXISTS `event_types`;
CREATE TABLE IF NOT EXISTS `event_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_types_FI_1` (`created_by`),
  KEY `event_types_FI_2` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `function_groups`
--

DROP TABLE IF EXISTS `function_groups`;
CREATE TABLE IF NOT EXISTS `function_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `original_name` varchar(100) NOT NULL,
  `name_normalized` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `function_groups_FI_1` (`created_by`),
  KEY `function_groups_FI_2` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_U_1` (`name`),
  KEY `groups_FI_1` (`created_by`),
  KEY `groups_FI_2` (`updated_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'teachers', '2011-07-16 20:39:32', '2011-07-16 20:39:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_roles`
--

DROP TABLE IF EXISTS `group_roles`;
CREATE TABLE IF NOT EXISTS `group_roles` (
  `group_id` int(11) NOT NULL,
  `role_key` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`group_id`,`role_key`),
  KEY `group_roles_FI_2` (`role_key`),
  KEY `group_roles_FI_3` (`created_by`),
  KEY `group_roles_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `***REMOVED***_syncronisations`
--

DROP TABLE IF EXISTS `***REMOVED***_syncronisations`;
CREATE TABLE IF NOT EXISTS `***REMOVED***_syncronisations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `duration` int(11) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `log` longblob,
  `is_executed_by_cron_job` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `***REMOVED***_syncronisations_FI_1` (`created_by`),
  KEY `***REMOVED***_syncronisations_FI_2` (`updated_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `***REMOVED***_syncronisations`
--

INSERT INTO `***REMOVED***_syncronisations` (`id`, `duration`, `code`, `log`, `is_executed_by_cron_job`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 9, 8, NULL, 0, '2011-07-17 13:41:51', '2011-07-17 13:41:51', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `indirect_references`
--

DROP TABLE IF EXISTS `indirect_references`;
CREATE TABLE IF NOT EXISTS `indirect_references` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` varchar(20) NOT NULL,
  `from_model_name` varchar(80) NOT NULL,
  `to_id` varchar(20) NOT NULL,
  `to_model_name` varchar(80) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `indirect_references_U_1` (`from_id`,`from_model_name`,`to_id`,`to_model_name`),
  KEY `indirect_references_FI_1` (`created_by`),
  KEY `indirect_references_FI_2` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` varchar(3) NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort` tinyint(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `languages_FI_1` (`created_by`),
  KEY `languages_FI_2` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `is_active`, `sort`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
('de', 1, NULL, '2011-07-16 09:10:22', '2011-07-16 09:10:22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `language_objects`
--

DROP TABLE IF EXISTS `language_objects`;
CREATE TABLE IF NOT EXISTS `language_objects` (
  `object_id` int(11) NOT NULL,
  `language_id` varchar(3) NOT NULL,
  `data` longblob,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`object_id`,`language_id`),
  KEY `language_objects_FI_2` (`language_id`),
  KEY `language_objects_FI_3` (`created_by`),
  KEY `language_objects_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language_objects`
--

INSERT INTO `language_objects` (`object_id`, `language_id`, `data`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'de', 0x613a313a7b733a31323a22646973706c61795f6d6f6465223b733a31393a226b6c617373656e5f776974685f64657461696c223b7d, '2011-07-16 09:57:16', '2011-07-16 09:57:16', 1, 1),
(2, 'de', 0x613a313a7b733a31323a22646973706c61795f6d6f6465223b733a32323a226b6c617373656e5f6b6f6e746578745f64657461696c223b7d, '2011-07-16 09:57:33', '2011-07-16 09:57:33', 1, 1),
(4, 'de', 0x613a313a7b733a31323a22646973706c61795f6d6f6465223b733a32303a227465616d5f6d6974676c6965645f64657461696c223b7d, '2011-07-16 20:44:14', '2011-07-16 20:44:14', 1, 1),
(3, 'de', 0x613a313a7b733a31323a22646973706c61795f6d6f6465223b733a31303a227465616d5f6c69737465223b7d, '2011-07-16 20:44:21', '2011-07-16 20:44:21', 1, 1),
(5, 'de', 0x613a313a7b733a31323a22646973706c61795f6d6f6465223b733a31353a22736368756c5f73746174697374696b223b7d, '2011-07-16 21:05:10', '2011-07-16 21:05:10', 1, 1),
(6, 'de', '', '2011-07-17 13:50:26', '2011-07-17 13:50:26', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `language_object_history`
--

DROP TABLE IF EXISTS `language_object_history`;
CREATE TABLE IF NOT EXISTS `language_object_history` (
  `object_id` int(11) NOT NULL,
  `language_id` varchar(3) NOT NULL,
  `data` longblob,
  `revision` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`object_id`,`language_id`,`revision`),
  KEY `language_object_history_FI_2` (`language_id`),
  KEY `language_object_history_FI_3` (`created_by`),
  KEY `language_object_history_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `language_id` varchar(3) DEFAULT NULL,
  `owner_id` int(11) NOT NULL,
  `link_category_id` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `is_private` tinyint(1) DEFAULT '0',
  `is_inactive` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `links_FI_1` (`language_id`),
  KEY `links_FI_2` (`owner_id`),
  KEY `links_FI_3` (`link_category_id`),
  KEY `links_FI_4` (`created_by`),
  KEY `links_FI_5` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `link_categories`
--

DROP TABLE IF EXISTS `link_categories`;
CREATE TABLE IF NOT EXISTS `link_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `is_externally_managed` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `link_categories_FI_1` (`created_by`),
  KEY `link_categories_FI_2` (`updated_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `link_categories`
--

INSERT INTO `link_categories` (`id`, `name`, `is_externally_managed`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Beispiel Linkliste', 0, '2010-12-02 14:47:25', '2011-07-16 11:41:49', 1, 1),
(2, 'Klassenlinks', 1, '2011-04-13 15:37:55', '2011-04-13 15:37:55', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `objects`
--

DROP TABLE IF EXISTS `objects`;
CREATE TABLE IF NOT EXISTS `objects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `container_name` varchar(50) DEFAULT NULL,
  `object_type` varchar(50) DEFAULT NULL,
  `condition_serialized` longblob,
  `sort` tinyint(3) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `objects_FI_1` (`page_id`),
  KEY `objects_FI_2` (`created_by`),
  KEY `objects_FI_3` (`updated_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `objects`
--

INSERT INTO `objects` (`id`, `page_id`, `container_name`, `object_type`, `condition_serialized`, `sort`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 4, 'content', 'classes', NULL, 0, '2011-07-16 09:57:02', '2011-07-16 09:57:02', 1, 1),
(2, 4, 'context', 'classes', NULL, 0, '2011-07-16 09:57:27', '2011-07-16 09:57:27', 1, 1),
(3, 3, 'content', 'team_members', NULL, 0, '2011-07-16 20:43:16', '2011-07-16 20:43:16', 1, 1),
(4, 3, 'context', 'team_members', NULL, 0, '2011-07-16 20:44:07', '2011-07-16 20:44:07', 1, 1),
(5, 2, 'context', 'classes', NULL, 0, '2011-07-16 21:03:32', '2011-07-16 21:05:42', 1, 1),
(6, 9, 'content', 'not_found', NULL, 0, '2011-07-17 13:50:20', '2011-07-17 13:50:20', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `identifier` varchar(30) DEFAULT NULL,
  `page_type` varchar(15) DEFAULT NULL,
  `template_name` varchar(50) DEFAULT NULL,
  `is_inactive` tinyint(1) DEFAULT '1',
  `is_folder` tinyint(1) DEFAULT '0',
  `is_hidden` tinyint(1) DEFAULT '0',
  `is_protected` tinyint(1) DEFAULT '0',
  `tree_left` int(11) DEFAULT NULL,
  `tree_right` int(11) DEFAULT NULL,
  `tree_level` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_U_1` (`identifier`),
  KEY `pages_FI_1` (`created_by`),
  KEY `pages_FI_2` (`updated_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `identifier`, `page_type`, `template_name`, `is_inactive`, `is_folder`, `is_hidden`, `is_protected`, `tree_left`, `tree_right`, `tree_level`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'root', NULL, NULL, NULL, 0, 0, 0, 0, 1, 18, 0, '2011-07-16 09:16:45', '2011-07-16 09:16:45', 1, 1),
(2, 'schule', 'schule', 'default', NULL, 0, 0, 0, 0, 2, 5, 1, '2011-07-16 09:22:51', '2011-07-16 09:24:17', 1, 1),
(3, 'team', 'team', 'default', NULL, 0, 0, 0, 0, 6, 7, 1, '2011-07-16 09:23:02', '2011-07-16 09:24:22', 1, 1),
(4, 'klassen', 'classes', 'default', NULL, 0, 0, 0, 0, 8, 9, 1, '2011-07-16 09:23:30', '2011-07-17 12:48:01', 1, 1),
(5, 'eltern', NULL, 'default', NULL, 0, 0, 0, 0, 10, 11, 1, '2011-07-16 09:23:35', '2011-07-16 09:23:35', 1, 1),
(6, 'angebote', 'services', 'default', NULL, 0, 0, 0, 0, 12, 13, 1, '2011-07-16 09:23:40', '2011-07-17 12:47:46', 1, 1),
(7, 'anlaesse', 'events', 'default', NULL, 0, 0, 0, 0, 14, 15, 1, '2011-07-16 09:23:50', '2011-07-17 12:47:53', 1, 1),
(8, 'kontakt', 'contact', 'default', NULL, 0, 0, 0, 0, 3, 4, 2, '2011-07-17 13:47:49', '2011-07-17 13:48:49', 1, 1),
(9, 'error_404', 'error_404', 'default', NULL, 1, 0, 0, 0, 16, 17, 1, '2011-07-17 13:49:04', '2011-07-17 13:49:37', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_properties`
--

DROP TABLE IF EXISTS `page_properties`;
CREATE TABLE IF NOT EXISTS `page_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_properties_U_1` (`name`,`page_id`),
  KEY `page_properties_FI_1` (`page_id`),
  KEY `page_properties_FI_2` (`created_by`),
  KEY `page_properties_FI_3` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page_strings`
--

DROP TABLE IF EXISTS `page_strings`;
CREATE TABLE IF NOT EXISTS `page_strings` (
  `page_id` int(11) NOT NULL,
  `language_id` varchar(3) NOT NULL,
  `is_inactive` tinyint(1) DEFAULT '1',
  `link_text` varchar(50) DEFAULT '',
  `page_title` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`page_id`,`language_id`),
  KEY `page_strings_FI_2` (`language_id`),
  KEY `page_strings_FI_3` (`created_by`),
  KEY `page_strings_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_strings`
--

INSERT INTO `page_strings` (`page_id`, `language_id`, `is_inactive`, `link_text`, `page_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'de', 1, '', 'Home', NULL, NULL, '2011-07-16 09:16:45', '2011-07-16 09:16:45', 1, 1),
(2, 'de', 0, NULL, 'Schule', NULL, NULL, '2011-07-16 09:22:51', '2011-07-16 09:56:05', 1, 1),
(3, 'de', 0, NULL, 'Team', NULL, NULL, '2011-07-16 09:23:02', '2011-07-16 09:56:13', 1, 1),
(4, 'de', 0, NULL, 'Klassen', NULL, NULL, '2011-07-16 09:23:30', '2011-07-16 09:56:20', 1, 1),
(5, 'de', 0, NULL, 'Eltern', NULL, NULL, '2011-07-16 09:23:35', '2011-07-16 09:56:28', 1, 1),
(6, 'de', 0, NULL, 'Angebote', NULL, NULL, '2011-07-16 09:23:40', '2011-07-16 09:56:36', 1, 1),
(7, 'de', 0, NULL, 'Anlässe', NULL, NULL, '2011-07-16 09:23:50', '2011-07-16 09:56:44', 1, 1),
(8, 'de', 0, NULL, 'Kontakt', NULL, NULL, '2011-07-17 13:47:49', '2011-07-17 13:48:49', 1, 1),
(9, 'de', 1, NULL, 'Nicht gefunden', NULL, NULL, '2011-07-17 13:49:04', '2011-07-17 13:49:43', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

DROP TABLE IF EXISTS `rights`;
CREATE TABLE IF NOT EXISTS `rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_key` varchar(50) NOT NULL,
  `page_id` int(11) NOT NULL,
  `is_inherited` tinyint(1) DEFAULT '1',
  `may_edit_page_details` tinyint(1) DEFAULT '0',
  `may_edit_page_contents` tinyint(1) DEFAULT '0',
  `may_delete` tinyint(1) DEFAULT '0',
  `may_create_children` tinyint(1) DEFAULT '0',
  `may_view_page` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rights_U_1` (`role_key`,`page_id`,`is_inherited`),
  KEY `rights_FI_2` (`page_id`),
  KEY `rights_FI_3` (`created_by`),
  KEY `rights_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_key` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`role_key`),
  KEY `roles_FI_1` (`created_by`),
  KEY `roles_FI_2` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `original_id` varchar(50) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `school_unit` varchar(80) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zip_code` varchar(5) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone_schulleitung` varchar(14) DEFAULT NULL,
  `phone_lehrerzimmer` varchar(14) DEFAULT NULL,
  `current_year` smallint(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schools_FI_1` (`created_by`),
  KEY `schools_FI_2` (`updated_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `original_id`, `name`, `school_unit`, `address`, `zip_code`, `city`, `phone_schulleitung`, `phone_lehrerzimmer`, `current_year`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '40', 'Heilpädagogische Schule', 'Heilpädagogische Schule', 'Staffelstrasse 91', '5430', '***REMOVED***', NULL, NULL, 2010, '2011-07-17 12:21:39', '2011-07-17 12:21:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_buildings`
--

DROP TABLE IF EXISTS `school_buildings`;
CREATE TABLE IF NOT EXISTS `school_buildings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `original_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `school_buildings_FI_1` (`created_by`),
  KEY `school_buildings_FI_2` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `school_classes`
--

DROP TABLE IF EXISTS `school_classes`;
CREATE TABLE IF NOT EXISTS `school_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `original_id` int(11) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `unit_name` varchar(80) DEFAULT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `year` smallint(6) NOT NULL,
  `level` tinyint(4) DEFAULT NULL COMMENT 'Jahrgang',
  `room_number` varchar(5) DEFAULT NULL,
  `teaching_unit` varchar(80) DEFAULT NULL,
  `class_portrait_id` int(11) DEFAULT NULL,
  `class_type_id` tinyint(4) DEFAULT NULL,
  `class_schedule_id` int(11) DEFAULT NULL,
  `week_schedule_id` int(11) DEFAULT NULL,
  `school_building_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `school_classes_U_1` (`original_id`,`year`),
  KEY `school_classes_FI_1` (`class_portrait_id`),
  KEY `school_classes_FI_2` (`class_type_id`),
  KEY `school_classes_FI_3` (`class_schedule_id`),
  KEY `school_classes_FI_4` (`week_schedule_id`),
  KEY `school_classes_FI_5` (`school_building_id`),
  KEY `school_classes_FI_6` (`school_id`),
  KEY `school_classes_FI_7` (`created_by`),
  KEY `school_classes_FI_8` (`updated_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `school_classes`
--

INSERT INTO `school_classes` (`id`, `original_id`, `name`, `unit_name`, `slug`, `year`, `level`, `room_number`, `teaching_unit`, `class_portrait_id`, `class_type_id`, `class_schedule_id`, `week_schedule_id`, `school_building_id`, `school_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 202, 'HPS Bs b', 'HPS Bs b', 'hps-bs-b', 2010, 0, '', NULL, NULL, 1, NULL, NULL, NULL, 1, '2011-07-17 12:21:40', '2011-07-17 12:21:40', NULL, NULL),
(2, 205, 'HPS Austritt', 'HPS Austritt', 'hps-austritt', 2010, 0, '', NULL, NULL, 2, NULL, NULL, NULL, 1, '2011-07-17 12:21:44', '2011-07-17 12:21:44', NULL, NULL),
(3, 221, 'HPS Bs c', 'HPS Bs c', 'hps-bs-c', 2010, 0, '', NULL, NULL, 1, NULL, NULL, NULL, 1, '2011-07-17 12:21:45', '2011-07-17 12:21:45', NULL, NULL),
(4, 222, 'HPS Bs d', 'HPS Bs d', 'hps-bs-d', 2010, 0, '', NULL, NULL, 1, NULL, NULL, NULL, 1, '2011-07-17 12:21:49', '2011-07-17 12:21:49', NULL, NULL),
(5, 223, 'HPS Ss a', 'HPS Ss a', 'hps-ss-a', 2010, 0, '', NULL, NULL, 3, NULL, NULL, NULL, 1, '2011-07-17 12:21:53', '2011-07-17 12:21:53', NULL, NULL),
(6, 224, 'HPS Ss b', 'HPS Ss b', 'hps-ss-b', 2010, 0, '', NULL, NULL, 3, NULL, NULL, NULL, 1, '2011-07-17 12:28:06', '2011-07-17 12:28:06', NULL, NULL),
(7, 215, 'HPS Ss j', 'HPS Ss j', 'hps-ss-j', 2010, 0, '', NULL, NULL, 3, NULL, NULL, NULL, 1, '2011-07-17 12:28:10', '2011-07-17 12:28:10', NULL, NULL),
(8, 225, 'HPS Ss c', 'HPS Ss c', 'hps-ss-c', 2010, 0, '', NULL, NULL, 3, NULL, NULL, NULL, 1, '2011-07-17 12:33:54', '2011-07-17 12:33:54', NULL, NULL),
(9, 226, 'HPS Ss d', 'HPS Ss d', 'hps-ss-d', 2010, 0, '', NULL, NULL, 3, NULL, NULL, NULL, 1, '2011-07-17 12:33:56', '2011-07-17 12:33:56', NULL, NULL),
(10, 227, 'HPS Ss e', 'HPS Ss e', 'hps-ss-e', 2010, 0, '', NULL, NULL, 3, NULL, NULL, NULL, 1, '2011-07-17 12:34:00', '2011-07-17 12:34:00', NULL, NULL),
(11, 228, 'HPS Ss f', 'HPS Ss f', 'hps-ss-f', 2010, 0, '', NULL, NULL, 3, NULL, NULL, NULL, 1, '2011-07-17 12:34:04', '2011-07-17 12:34:04', NULL, NULL),
(12, 229, 'HPS Ss g', 'HPS Ss g', 'hps-ss-g', 2010, 0, '', NULL, NULL, 3, NULL, NULL, NULL, 1, '2011-07-17 12:34:08', '2011-07-17 12:34:08', NULL, NULL),
(13, 230, 'HPS Ss h', 'HPS Ss h', 'hps-ss-h', 2010, 0, '', NULL, NULL, 3, NULL, NULL, NULL, 1, '2011-07-17 12:34:13', '2011-07-17 12:34:13', NULL, NULL),
(14, 231, 'HPS Ss i', 'HPS Ss i', 'hps-ss-i', 2010, 0, '', NULL, NULL, 3, NULL, NULL, NULL, 1, '2011-07-17 12:34:17', '2011-07-17 12:34:17', NULL, NULL),
(15, 232, 'HPS Ws a', 'HPS Ws a', 'hps-ws-a', 2010, 0, '', NULL, NULL, 4, NULL, NULL, NULL, 1, '2011-07-17 12:34:19', '2011-07-17 12:34:19', NULL, NULL),
(16, 233, 'HPS Ws b', 'HPS Ws b', 'hps-ws-b', 2010, 0, '', NULL, NULL, 4, NULL, NULL, NULL, 1, '2011-07-17 12:34:22', '2011-07-17 12:34:22', NULL, NULL),
(17, 234, 'HPS Is 0', 'HPS Is 0', 'hps-is-0', 2010, 0, '', NULL, NULL, 3, NULL, NULL, NULL, 1, '2011-07-17 12:34:24', '2011-07-17 12:34:24', NULL, NULL),
(18, 556, 'HPS Bs a', 'HPS Bs a', 'hps-bs-a', 2010, 0, '', NULL, NULL, 1, NULL, NULL, NULL, 1, '2011-07-17 12:34:26', '2011-07-17 12:34:26', NULL, NULL),
(19, 557, 'HPS Ss k', 'HPS Ss k', 'hps-ss-k', 2010, 0, '', NULL, NULL, 3, NULL, NULL, NULL, 1, '2011-07-17 12:34:30', '2011-07-17 12:34:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_functions`
--

DROP TABLE IF EXISTS `school_functions`;
CREATE TABLE IF NOT EXISTS `school_functions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `original_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `function_group_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `school_functions_FI_1` (`function_group_id`),
  KEY `school_functions_FI_2` (`school_id`),
  KEY `school_functions_FI_3` (`created_by`),
  KEY `school_functions_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT NULL,
  `teaser` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `opening_hours` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `body` longblob,
  `is_active` tinyint(1) DEFAULT '0',
  `logo_id` int(11) DEFAULT NULL,
  `service_category_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_FI_1` (`logo_id`),
  KEY `services_FI_2` (`service_category_id`),
  KEY `services_FI_3` (`created_by`),
  KEY `services_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

DROP TABLE IF EXISTS `service_categories`;
CREATE TABLE IF NOT EXISTS `service_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `name_normalized` varchar(80) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_categories_FI_1` (`created_by`),
  KEY `service_categories_FI_2` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `service_documents`
--

DROP TABLE IF EXISTS `service_documents`;
CREATE TABLE IF NOT EXISTS `service_documents` (
  `service_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`service_id`,`document_id`),
  KEY `service_documents_FI_2` (`document_id`),
  KEY `service_documents_FI_3` (`created_by`),
  KEY `service_documents_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service_members`
--

DROP TABLE IF EXISTS `service_members`;
CREATE TABLE IF NOT EXISTS `service_members` (
  `service_id` int(11) NOT NULL,
  `function_name` varchar(80) DEFAULT NULL,
  `team_member_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`service_id`,`team_member_id`),
  KEY `service_members_FI_2` (`team_member_id`),
  KEY `service_members_FI_3` (`created_by`),
  KEY `service_members_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `strings`
--

DROP TABLE IF EXISTS `strings`;
CREATE TABLE IF NOT EXISTS `strings` (
  `language_id` varchar(3) NOT NULL,
  `string_key` varchar(80) NOT NULL,
  `text` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`language_id`,`string_key`),
  KEY `strings_FI_2` (`created_by`),
  KEY `strings_FI_3` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `original_id` int(11) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `portrait_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `students_FI_1` (`portrait_id`),
  KEY `students_FI_2` (`created_by`),
  KEY `students_FI_3` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_U_1` (`name`),
  KEY `tags_FI_1` (`created_by`),
  KEY `tags_FI_2` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tag_instances`
--

DROP TABLE IF EXISTS `tag_instances`;
CREATE TABLE IF NOT EXISTS `tag_instances` (
  `tag_id` int(11) NOT NULL,
  `tagged_item_id` int(11) NOT NULL,
  `model_name` varchar(80) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`tag_id`,`tagged_item_id`,`model_name`),
  KEY `tag_instances_FI_2` (`created_by`),
  KEY `tag_instances_FI_3` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

DROP TABLE IF EXISTS `team_members`;
CREATE TABLE IF NOT EXISTS `team_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `original_id` int(11) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `gender_id` char(1) DEFAULT NULL,
  `employed_since` date DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `email_g` varchar(255) DEFAULT NULL,
  `portrait_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `team_members_FI_1` (`portrait_id`),
  KEY `team_members_FI_2` (`user_id`),
  KEY `team_members_FI_3` (`created_by`),
  KEY `team_members_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `team_member_functions`
--

DROP TABLE IF EXISTS `team_member_functions`;
CREATE TABLE IF NOT EXISTS `team_member_functions` (
  `team_member_id` int(11) NOT NULL,
  `school_function_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`team_member_id`,`school_function_id`),
  KEY `team_member_functions_FI_2` (`school_function_id`),
  KEY `team_member_functions_FI_3` (`created_by`),
  KEY `team_member_functions_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(144) DEFAULT NULL,
  `digest_ha1` varchar(32) DEFAULT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `language_id` varchar(3) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `is_backend_login_enabled` tinyint(1) DEFAULT '1',
  `is_inactive` tinyint(1) DEFAULT '0',
  `password_recover_hint` varchar(10) DEFAULT NULL,
  `backend_settings` longblob,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_U_1` (`username`),
  KEY `users_FI_1` (`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=269 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `digest_ha1`, `first_name`, `last_name`, `email`, `language_id`, `is_admin`, `is_backend_login_enabled`, `is_inactive`, `password_recover_hint`, `backend_settings`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'jmg', '3f06c478557f1fd166335609bc6256192cf6111c75c7a4b3858b41ccf686db5935fb55aa130a66cbf4293decab831e81830211ac02ae9edf6e427ab8329f462ab9ee469ef7171f11', NULL, 'Jürg', 'Messmer', 'jm@mosaics.ch', 'de', 1, 1, 0, NULL, 0x613a313a7b733a393a2264617368626f617264223b613a323a7b733a363a226c61796f7574223b733a31323a2232636f6c7332746869726473223b733a373a2277696467657473223b613a333a7b693a303b613a373a7b733a363a22636f6e666967223b613a303a7b7d733a353a22636f6c6f72223b733a31373a227267622832302c203134322c2031363429223b733a393a22636f6c6c6170736564223b623a303b733a343a2274797065223b733a31303a226d795f636c6173736573223b733a353a227469746c65223b733a31333a224d65696e65204b6c617373656e223b733a393a22636f6e7461696e6572223b733a383a22636f6c756d6e2d31223b733a333a22756964223b733a33363a2232653661633465652d653631312d656131342d303135642d336133633630363161613336223b7d693a313b613a383a7b733a363a22636f6e666967223b613a303a7b7d733a353a22636f6c6f72223b733a31343a22726762283232312c20302c203029223b733a393a22636f6c6c6170736564223b623a313b733a343a2274797065223b733a363a226261636b7570223b733a31333a22636f6e7472617374436f6c6f72223b733a31383a22726762283235352c203235352c2032353529223b733a353a227469746c65223b733a363a224261636b7570223b733a393a22636f6e7461696e6572223b733a383a22636f6c756d6e2d32223b733a333a22756964223b733a33363a2241333245334539322d443744332d343330372d393643372d414346323136323541334135223b7d693a323b613a383a7b733a363a22636f6e666967223b613a303a7b7d733a353a22636f6c6f72223b733a31363a22726762283234322c203138382c203029223b733a393a22636f6c6c6170736564223b623a303b733a343a2274797065223b733a31323a226963616d7075735f73796e63223b733a31333a22636f6e7472617374436f6c6f72223b733a31323a2272676228302c20302c203029223b733a353a227469746c65223b733a31323a224963616d7075732053796e63223b733a393a22636f6e7461696e6572223b733a383a22636f6c756d6e2d32223b733a333a22756964223b733a33363a2241453446313533332d314436362d343834412d414342442d384539344335303631423842223b7d7d7d7d, '2011-07-16 09:10:22', '2011-07-17 13:41:38', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `users_groups_FI_2` (`group_id`),
  KEY `users_groups_FI_3` (`created_by`),
  KEY `users_groups_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `user_id` int(11) NOT NULL,
  `role_key` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_key`),
  KEY `user_roles_FI_2` (`role_key`),
  KEY `user_roles_FI_3` (`created_by`),
  KEY `user_roles_FI_4` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
