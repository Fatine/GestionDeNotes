-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 22 Juillet 2013 à 14:45
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
('5144068f218ef70b785e829db75f7bb8', '::1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0', 1374497079, 'a:3:{s:7:"user_id";s:1:"3";s:8:"username";s:4:"root";s:6:"status";s:1:"1";}');

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
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `inscription_year` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`course_id`, `student_id`, `inscription_year`) VALUES
(1, 9, 2013),
(5, 22, 2013),
(1, 17, 2013),
(2, 18, 2013),
(3, 19, 2013),
(4, 20, 2013),
(5, 21, 2013),
(6, 22, 2013),
(7, 21, 2013),
(8, 20, 2013),
(9, 17, 2013),
(10, 18, 2013),
(11, 19, 2013);

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
-- Structure de la table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `course_id` int(100) NOT NULL,
  `student_id` int(100) NOT NULL,
  `td1` int(100) DEFAULT NULL,
  `td1_r` int(100) DEFAULT NULL,
  `td2` int(100) DEFAULT NULL,
  `td2_r` int(100) DEFAULT NULL,
  `exam` int(100) DEFAULT NULL,
  `exam_r` int(100) DEFAULT NULL,
  `moyenne` int(100) DEFAULT NULL,
  `grades_year` year(4) NOT NULL,
  UNIQUE KEY `course_id` (`course_id`,`student_id`,`grades_year`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `notes`
--

INSERT INTO `notes` (`course_id`, `student_id`, `td1`, `td1_r`, `td2`, `td2_r`, `exam`, `exam_r`, `moyenne`, `grades_year`) VALUES
(1, 12, 12, 15, 3, 7, 16, 10, NULL, 2013),
(2, 13, 12, 12, 3, 7, 16, 10, NULL, 2013),
(3, 14, 12, 15, 3, 7, 16, 10, NULL, 2013),
(4, 15, 12, 11, 3, 7, 16, 10, NULL, 2013),
(5, 16, 12, 15, 3, 7, 16, 10, NULL, 2013),
(6, 17, 12, 15, 3, 7, 16, 10, NULL, 2013),
(7, 18, 12, 15, 3, 7, 16, 10, NULL, 2013),
(8, 19, 12, 14, 3, 7, 16, 10, NULL, 2013),
(9, 20, 12, 15, 3, 7, 16, 10, NULL, 2013),
(10, 21, 12, 7, 3, 7, 16, 10, NULL, 2013),
(11, 22, 12, 15, 3, 7, 16, 10, NULL, 2013),
(12, 23, 12, 15, 3, 7, 16, 10, NULL, 2013),
(1, 16, 12, 2, 3, 4, 5, 8, 4, 2013),
(2, 15, 14, 14, 20, 15, 15, 8, 4, 2013),
(4, 13, 1, 9, 10, 14, 15, 8, 4, 2013),
(5, 12, 2, 8, 7, 14, 5, 8, 4, 2013),
(6, 11, 6, 7, 4, 4, 5, 18, 4, 2013),
(7, 10, 9, 5, 3, 5, 20, 18, 4, 2013);

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
  `student_groupe_id` int(100) DEFAULT NULL,
  `modification_id` int(100) DEFAULT NULL,
  `comments_group_id` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=27 ;

--
-- Contenu de la table `students`
--

INSERT INTO `students` (`id`, `title`, `lastname`, `firstname`, `email`, `diploma`, `diploma_year`, `student_groupe_id`, `modification_id`, `comments_group_id`) VALUES
(8, 'Monsieur', 'Abdel Moneim Mahmoud', 'Ahmed', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(7, 'Monsieur', 'Samir Agamy Abo Emera', 'Ahmed', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(9, 'Monsieur', 'Yehia El Tantawy', 'Ahmed', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(10, 'Monsieur', 'Alaa El Din Abdel Halim Ahmed', 'Adham', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(11, 'Monsieur', 'Moukhtar Moussa', 'Amir', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(12, 'Madame', 'Karim Mohamed Farouk', 'Amira', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(13, 'Madame', 'Hani Menes Abdel Malek', 'Amira', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(14, 'Madame', 'Adly El Sayed Ahmed', 'Engy', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(15, 'Madame', 'Labib Mohamed Abdou', 'Aya', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(16, 'Monsieur', 'Said Malak Zikry', 'Georges', '', 'M2DPSSA', '', NULL, NULL, NULL),
(17, 'Monsieur', 'Achraf Khalil Ahmed', 'Khaled', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(18, 'Madame', 'Essam Eldin Ahmed Khalifa', 'Kholoud', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(19, 'Madame', 'Mahmoud Hussein Mahmoud', 'Dina', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(20, 'Monsieur', 'Joseph Abdel Malak Gerges', 'Ramy', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(21, 'Madame', 'Mohamed Salah El Din', 'Rania', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(22, 'Madame', 'Essam MOhamed', 'Rodaina', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(23, 'Madame', 'Tarek Abdel Baki', 'Salma', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(24, 'Madame', 'Said Ahmed Khairat', 'Samar', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(25, 'Monsieur', 'Tarek Mostafa Nader', 'Cherif', NULL, 'M2DPSSA', '', NULL, NULL, NULL),
(26, 'Madame', 'Abdel Hamid Yasser Abdel Fattah', 'Aliaa', NULL, 'M2DPSSA', '', NULL, NULL, NULL);

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
(3, 'root', '$2a$08$u57A68Y0CSyiOzPw/VsmfeqLLwr6o7aTFpitAScl1GrfANqapd7Ri', 'fatine.nakkoubi@etu.univ-lyon1.fr', 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '2013-07-22 10:43:09', '2013-07-15 13:57:56', '2013-07-22 10:43:09'),
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
