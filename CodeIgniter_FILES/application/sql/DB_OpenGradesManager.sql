-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 19 Juillet 2013 à 12:24
-- Version du serveur: 5.1.69
-- Version de PHP: 5.3.2-1ubuntu4.19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `GestionDeNotes`
--

-- --------------------------------------------------------

--
-- Structure de la table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('ac5143bbbe4acfa49e126cc8519ff7d7', '::1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Ubuntu Chromium/25.0.1364.160 Chrome/25.0.1364.160 ', 1374228741, 'a:4:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"3";s:8:"username";s:4:"root";s:6:"status";s:1:"1";}');

-- --------------------------------------------------------

--
-- Structure de la table `courses_columns`
--

CREATE TABLE IF NOT EXISTS `courses_columns` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shortname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=18 ;

--
-- Contenu de la table `courses_columns`
--

INSERT INTO `courses_columns` (`id`, `name`, `shortname`, `description`) VALUES
(1, 'Droit Constitutionnel', 'DCt', NULL),
(2, 'Introduction au Droit', 'ID', NULL),
(3, 'Histoire du Droit', 'HD', NULL),
(4, 'Droit Civil', 'DCi', NULL),
(5, 'Droit Pénal', 'DP', NULL),
(6, 'Droit Administratif', 'DA', NULL),
(7, 'Procédure Civile', 'PC', NULL),
(8, 'Droit Commercial', 'DCom', NULL),
(9, 'Finances Publiques', 'FP', 'test'),
(10, 'Libertés Fondamentales', 'LF', NULL),
(11, 'DIP', 'DIP', NULL),
(12, 'Procédures Collectives / Droit du Crédit ', 'PCDC', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `user_id` int(100) NOT NULL,
  `student_id` int(100) NOT NULL,
  `student_group_id` int(100) NOT NULL,
  `courses_columns_id` int(100) NOT NULL,
  `value` int(100) NOT NULL,
  `out_of` int(100) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `grades`
--


-- --------------------------------------------------------

--
-- Structure de la table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Contenu de la table `login_attempts`
--


-- --------------------------------------------------------

--
-- Structure de la table `people_infos`
--

CREATE TABLE IF NOT EXISTS `people_infos` (
  `people_id` int(100) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `photo_file_path` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `website` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `comments_group_id` int(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `people_infos`
--


-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `lastname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `firstname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `diploma` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diploma_year` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diploma_semester` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `student_groupe_id` int(100) DEFAULT NULL,
  `modification_id` int(100) DEFAULT NULL,
  `comments_group_id` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Contenu de la table `students`
--

INSERT INTO `students` (`id`, `title`, `lastname`, `firstname`, `email`, `diploma`, `diploma_year`, `diploma_semester`, `student_groupe_id`, `modification_id`, `comments_group_id`) VALUES
(3, 'Monsieur', 'da', 'fa', 'dazgt@ok.fr', '', '', NULL, NULL, NULL, NULL),
(4, 'Madame', 'daze', 'fze', 'faz@ojiazd.fr', '', '', NULL, NULL, NULL, NULL),
(5, 'Madame', 'fze', 'fze', 'aze@koi.com', '', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'fatine', '$2a$08$N0pF.r9KG4urzJNrRIpeje5gSm8JKrLxt4k.DuFYWWcCJXQwZl0aW', 'fatine.nakkoubi@outlook.fr', 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '2013-07-16 09:37:07', '2013-07-15 11:14:27', '2013-07-16 09:37:07'),
(3, 'root', '$2a$08$u57A68Y0CSyiOzPw/VsmfeqLLwr6o7aTFpitAScl1GrfANqapd7Ri', 'fatine.nakkoubi@etu.univ-lyon1.fr', 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '2013-07-19 09:58:37', '2013-07-15 13:57:56', '2013-07-19 09:58:37'),
(4, 'gtfr', '$2a$08$m56agHSI11Ju19cDIf1OZehmsUwlEmv0CvBxZ.VSA4Bqviz5bQ4sq', 'gt@ok.fr', 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '2013-07-15 14:00:14', '2013-07-15 14:00:01', '2013-07-15 14:00:14'),
(5, 'fdsdza', '$2a$08$od7GhTOlB19mmy2M7PdT2eZIMRQDzKG3nu7Yn3mLEvEipDIyyGSqG', 'root@fd.fr', 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '0000-00-00 00:00:00', '2013-07-16 09:36:21', '2013-07-16 09:36:22'),
(6, 'mldsq', '$2a$08$0BS/qeJIXvXbEvjDEipBX.ET4H7pbCAjveoRqUWuj5.YZetL0LLYi', 'root@de.fr', 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '0000-00-00 00:00:00', '2013-07-16 09:36:42', '2013-07-16 09:36:42'),
(7, 'reza', '$2a$08$FadlMttkZaho9RwQidsON.NYlw7kvTiNgu.hjAKudUC67XhvdSrbW', 'root@sz.fr', 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '0000-00-00 00:00:00', '2013-07-16 09:36:56', '2013-07-16 09:36:56');

-- --------------------------------------------------------

--
-- Structure de la table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `user_autologin`
--


-- --------------------------------------------------------

--
-- Structure de la table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Contenu de la table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `country`, `website`) VALUES
(1, 2, NULL, NULL),
(2, 3, NULL, NULL),
(3, 4, NULL, NULL),
(4, 5, NULL, NULL),
(5, 6, NULL, NULL),
(6, 7, NULL, NULL);
