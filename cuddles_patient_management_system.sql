-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2012 at 07:19 PM
-- Server version: 5.0.92
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cuddles_patient_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `patientquery`
--

CREATE TABLE IF NOT EXISTS `patientquery` (
  `qid` int(11) NOT NULL auto_increment,
  `query` text NOT NULL,
  `reply` text NOT NULL,
  `status` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `pid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  PRIMARY KEY  (`qid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `patientquery`
--

INSERT INTO `patientquery` (`qid`, `query`, `reply`, `status`, `creation_date`, `pid`, `did`) VALUES
(16, 'Testing....', '', 0, '2012-02-03 00:28:37', 10, 9),
(15, 'Testing....', '', 0, '2012-02-03 00:27:30', 10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `userType` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `birth_date` varchar(50) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `conformation` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alt_email` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `userType`, `email`, `phone_no`, `birth_date`, `marital_status`, `gender`, `conformation`, `password`, `alt_email`) VALUES
(1, 'poonam', 'doctor', 'poonamdaxini@gmail.com', 9769151458, '02/12/1997', 'Unmarried', 'Female', 0, 'a1ebc2d3f17355048c1e1f18d384a593', ''),
(2, 'yonus', 'patient', 'yonus.p@directi.com', 9898982312, '04/05/1999', 'Unmarried', 'Male', 1, 'a1ebc2d3f17355048c1e1f18d384a593', ''),
(3, 'sameer', 'patient', 'yhpoonawala@gmail.com', 9920996021, '11/07/2011', 'Unmarried', 'Male', 0, 'cb7348a2f297f9d5335c1099e195efe4', 'yhpoonawala@gmail.com'),
(4, 'burhan', 'patient', 'vidonly@gmail.com', 9920996021, '02/04/2012', 'Unmarried', 'Male', 0, 'cb7348a2f297f9d5335c1099e195efe4', 'vidonly@gmail.com'),
(5, '', 'patient', '', 0, '', 'Unmarried', 'Male', 0, '093ee39381debc7cea1245a0368a94da', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
