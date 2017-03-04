-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 04, 2016 at 12:18 PM
-- Server version: 5.0.26
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_k1429795`
--
CREATE DATABASE `db_k1429795` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_k1429795`;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `id` int(11) NOT NULL auto_increment,
  `moduleid` int(11) NOT NULL,
  `date` varchar(28) NOT NULL,
  `userid` int(11) NOT NULL,
  `text` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `moduleid`, `date`, `userid`, `text`) VALUES
(1, 1, '2016-03-09 14:51:14', 3, 'Hello This is First Annoucement. '),
(2, 1, '2016-03-09 14:51:27', 3, 'Second Annoucement Testing. ');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(28) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`) VALUES
(1, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `coursemodule`
--

CREATE TABLE IF NOT EXISTS `coursemodule` (
  `courseid` int(11) NOT NULL,
  `moduleid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursemodule`
--

INSERT INTO `coursemodule` (`courseid`, `moduleid`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(28) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `name`) VALUES
(1, 'Programming I'),
(2, 'Project');

-- --------------------------------------------------------

--
-- Table structure for table `usercourse`
--

CREATE TABLE IF NOT EXISTS `usercourse` (
  `userid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercourse`
--

INSERT INTO `usercourse` (`userid`, `courseid`) VALUES
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usermodule`
--

CREATE TABLE IF NOT EXISTS `usermodule` (
  `userid` int(11) NOT NULL,
  `moduleid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermodule`
--

INSERT INTO `usermodule` (`userid`, `moduleid`) VALUES
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(75) NOT NULL,
  `email` varchar(28) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(28) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `usertype`) VALUES
(1, 'admin', 'admin@kingston.ac.uk', '803c14aec7a828e3e1c08ef981da76c9', 'admin'),
(2, 'student Rabit', 'student@kingston.ac.uk', '803c14aec7a828e3e1c08ef981da76c9', 'student'),
(3, 'Lecturer', 'lecturer@kingston.ac.uk', '803c14aec7a828e3e1c08ef981da76c9', 'lecturer'),
(4, 'staff', 'staff@kingston.ac.uk', '803c14aec7a828e3e1c08ef981da76c9', 'lecturer');
