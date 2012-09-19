-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2010 at 03:23 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `temp`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE IF NOT EXISTS `advertisements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `displayorder` int(3) DEFAULT NULL,
  `expired_date` date NOT NULL,
  `count` int(5) NOT NULL,
  `pos_type` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `advertisements`
--


-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'normal',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `code`) VALUES
(1, 'Super Admin', 'Full role', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resource_category_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=64 ;

--
-- Dumping data for table `resources`
--


-- --------------------------------------------------------

--
-- Table structure for table `resource_categories`
--

CREATE TABLE IF NOT EXISTS `resource_categories` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `parent_id` int(5) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `resource_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

CREATE TABLE IF NOT EXISTS `static_pages` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `action` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `static_pages`
--

INSERT INTO `static_pages` (`id`, `action`, `name`, `content`, `modified`) VALUES
(1, 'help', 'Help', '<p>Help page ...</p>', '2010-04-02 16:01:47'),
(2, 'contact', 'Contact', '<p>Contact page</p>', '2010-04-02 16:01:59'),
(3, 'about_us', 'About Us', '<p>About us page</p>', '2010-04-02 16:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `sys_actions`
--

CREATE TABLE IF NOT EXISTS `sys_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sys_controller_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sys_actions`
--


-- --------------------------------------------------------

--
-- Table structure for table `sys_controllers`
--

CREATE TABLE IF NOT EXISTS `sys_controllers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sys_function_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sys_controllers`
--


-- --------------------------------------------------------

--
-- Table structure for table `sys_functions`
--

CREATE TABLE IF NOT EXISTS `sys_functions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `controller` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display` tinyint(1) DEFAULT NULL,
  `displayorder` int(3) DEFAULT NULL,
  `is_system` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sys_functions`
--

INSERT INTO `sys_functions` (`id`, `name`, `description`, `icon`, `parent_id`, `controller`, `action`, `display`, `displayorder`, `is_system`) VALUES
(1, 'Users', '', '', NULL, '', '', 1, 10, 0),
(2, 'Administrators & Groups', '', '', 1, 'users', 'index', 1, 1, 0),
(3, 'Normal User', '', '', 1, 'users', 'user_index', 1, 2, 0),
(4, 'Resource Management', 'Manage all image resources', '', NULL, 'resources', 'index', 1, NULL, 0),
(5, 'Advertisement', 'Manage advertisement on website', '', NULL, 'advertisements', 'index', 1, NULL, 0),
(6, 'StaticPage', 'Manage all static pages', '', NULL, 'static_pages', 'index', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sys_functions_groups`
--

CREATE TABLE IF NOT EXISTS `sys_functions_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sys_function_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sys_functions_groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `login_count` int(11) NOT NULL DEFAULT '0',
  `login_key` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `error_count` int(11) DEFAULT '0',
  `active` tinyint(1) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `info_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info_email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info_address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info_dob` date DEFAULT NULL,
  `info_gender` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `last_login`, `login_count`, `login_key`, `error_count`, `active`, `status`, `group_id`, `created`, `modified`, `info_name`, `info_email`, `info_address`, `info_dob`, `info_gender`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', '2010-06-30 14:56:58', 4, 'aa2c1022a7ca773ab99b81a99617d30c', 0, 1, NULL, 1, '2010-03-15 11:24:33', '2010-06-30 14:56:58', 'Administrator', NULL, '', '2010-03-15', NULL);
