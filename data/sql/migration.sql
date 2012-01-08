#20111223.1450

ALTER TABLE `notes` ADD `note_type_id` TINYINT UNSIGNED NULL DEFAULT NULL AFTER `id`;
ALTER TABLE `notes` ADD INDEX ( `note_type_id` ) ;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `note_types`;
CREATE TABLE IF NOT EXISTS `note_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

#20120108.1030
ALTER TABLE `notes` ADD `image_id` INT UNSIGNED NULL DEFAULT NULL AFTER `date_end` ,
ADD INDEX ( `image_id` );