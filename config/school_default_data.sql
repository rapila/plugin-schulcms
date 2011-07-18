# document_categories defined in default config section school_settings_externally_managed_document_categories
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

INSERT INTO `document_categories` (`id`, `name`, `sort`, `max_width`, `is_externally_managed`, `is_inactive`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(11, 'Klassenfotos', NULL, NULL, 1, 0, '2011-03-18 07:59:03', '2011-03-18 07:59:03', 1, 1),
(10, 'Portraits', NULL, NULL, 1, 0, '2011-03-18 07:59:03', '2011-03-18 07:59:03', 1, 1),
(12, 'Stundenpläne', NULL, NULL, 1, 0, '2011-03-25 07:45:17', '2011-03-25 07:45:17', 1, 1),
(13, 'Wochenpläne', NULL, NULL, 1, 0, '2011-04-03 20:47:42', '2011-04-03 20:47:42', 1, 1),
(14, 'Bilder und Dokumente Anlässe', NULL, NULL, 1, 0, '2011-04-13 15:37:55', '2011-04-13 15:37:55', 1, 1),
(17, 'Beispiel Dokumentenliste', NULL, NULL, 0, 0, '2011-06-24 09:10:12', '2011-06-24 09:10:12', 1, 1),
(18, 'Angebotsdocuments', NULL, NULL, 1, 0, '2011-07-06 21:39:56', '2011-07-06 21:39:56', 1, 1);

# link_categories defined in default config section school_settings_externally_managed_link_categories
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

# default link categories
INSERT INTO `link_categories` (`id`, `name`, `is_externally_managed`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Beispiel Linkliste', 0, '2010-12-02 14:47:25', '2011-06-20 10:11:54', 1, 1),
(2, 'Klassenlinks', 1, '2011-04-13 15:37:55', '2011-04-13 15:37:55', 1, 1);

# event categories
INSERT INTO `event_types` (`id` ,`name` ,`created_at` ,`updated_at` ,`created_by` ,`updated_by`)
VALUES
( NULL , 'Veranstaltungen', NOW( ) , NOW( ) , '1', '1'), 
( NULL , 'Projekte', NOW( ) , NOW( ) , '1', '1');

