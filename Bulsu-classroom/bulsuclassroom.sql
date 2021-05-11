-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 10:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bulsuclassroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `address` text NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `contact` text NOT NULL,
  `college` text NOT NULL,
  `course` text NOT NULL,
  `handle_course` text NOT NULL,
  `year` text NOT NULL,
  `section` text NOT NULL,
  `status` text NOT NULL,
  `user_type` text NOT NULL,
  `notify` int(11) NOT NULL,
  `notify_trackid` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `userid`, `password`, `fname`, `mname`, `lname`, `address`, `gmail`, `contact`, `college`, `course`, `handle_course`, `year`, `section`, `status`, `user_type`, `notify`, `notify_trackid`, `date_created`) VALUES
(1, '1234', 'test', 'Juan', 'Esteban', 'Dela Cruz', '', '', '', '', '', 'BS Enviromental Science', '', '', '', 'Teacher', 0, '', '2021-05-06 18:29:05'),
(2, '2222', 'test', 'Rafael', 'Carlos', 'Mendoza', '2032 San Nicolas Bulakan Bulacan', 'Rafael@gmail.com', '09192454638', 'College of Science', 'BS Enviromental Science', '', '1st year', 'Section A', 'active', 'Student', 4, 'trackid,WDV-LJR-LATY', '2021-05-10 18:30:01'),
(3, '3333', 'test12345', 'Abdul Jackol', 'Blowjobano', 'Salsalani', 'Magindanao', 'Abduljackol@gmail.com', '09123645546', 'CS', 'BS Enviromental Science', '', '1st year', 'Section Z', 'active', 'Student', 0, 'trackid', '2021-05-10 15:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `school_information`
--

CREATE TABLE `school_information` (
  `id` int(11) NOT NULL,
  `value` text NOT NULL,
  `type` text NOT NULL,
  `status` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_information`
--

INSERT INTO `school_information` (`id`, `value`, `type`, `status`, `date_created`) VALUES
(1, 'BS Enviromental Science', 'Course', '1', '2021-05-04 18:52:36'),
(2, 'BS Biology', 'Course', '1', '2021-05-04 18:52:36'),
(3, 'BS Math Computer Science', 'Course', '1', '2021-05-04 18:52:36'),
(4, 'BS Math Applied Statistics', 'Course', '1', '2021-05-04 18:52:36'),
(5, 'BS Math Business Application', 'Course', '1', '2021-05-04 18:52:36'),
(6, 'BS Food Tech', 'Course', '1', '2021-05-04 18:52:36'),
(7, '1st year', 'Year', '1', '2021-05-04 18:52:36'),
(8, '2nd year', 'Year', '1', '2021-05-04 18:52:36'),
(9, '3rd year', 'Year', '1', '2021-05-04 18:52:36'),
(10, '4th year', 'Year', '1', '2021-05-04 18:52:36'),
(13, 'Section A', 'Section', '1', '2021-05-04 18:52:36'),
(14, 'Section B', 'Section', '1', '2021-05-04 18:52:36'),
(15, 'Section C', 'Section', '1', '2021-05-04 18:52:36'),
(16, 'Section D', 'Section', '1', '2021-05-04 18:52:36'),
(17, 'Section E', 'Section', '1', '2021-05-04 18:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `student_track`
--

CREATE TABLE `student_track` (
  `id` int(11) NOT NULL,
  `trackid` varchar(100) NOT NULL,
  `course` text NOT NULL,
  `year` text NOT NULL,
  `section` text NOT NULL,
  `subject` varchar(100) NOT NULL,
  `date_request` datetime NOT NULL,
  `date_ended` datetime NOT NULL,
  `description` text NOT NULL,
  `attachments` text NOT NULL,
  `event` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_track`
--

INSERT INTO `student_track` (`id`, `trackid`, `course`, `year`, `section`, `subject`, `date_request`, `date_ended`, `description`, `attachments`, `event`, `status`, `userid_created`, `date_created`) VALUES
(2, 'WDV-LJR-LATY', 'BS Enviromental Science', '1st year', 'Section A', 'Payaman', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'May quize tayo sa feb 12 3000 year', 'NONE', 'Anouncements', 'active', 1234, '2021-05-08 17:06:26'),
(3, 'N7J-WPH-N2MA', 'BS Enviromental Science', '2nd year', 'Section B', 'Calculus1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'test1', 'NONE', 'Anouncements', 'active', 1234, '2021-05-08 18:56:49'),
(6, 'LMR-J6R-4UJ9', 'BS Enviromental Science', '2nd year', 'Section C', 'test', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'test', 'NONE', 'Anouncements', 'active', 1234, '2021-05-08 20:19:21'),
(7, '7BX-PNS-5VDR', 'BS Enviromental Science', '2nd year', 'Section D', 'test', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'test', 'NONE', 'Anouncements', 'active', 1234, '2021-05-08 20:19:29'),
(8, 'E5T-3SM-3HMZ', 'BS Enviromental Science', '3rd year', 'Section D', 'test', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '53', 'NONE', 'Anouncements', 'active', 1234, '2021-05-10 15:51:46'),
(9, '636-86Q-919G', 'BS Enviromental Science', '1st year', 'Section D', 'test', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'test', 'NONE', 'Anouncements', 'active', 1234, '2021-05-10 15:52:39'),
(10, 'NA8-RM8-LXL5', 'BS Enviromental Science', '3rd year', 'Section C', 'test', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'test', 'NONE', 'Anouncements', 'active', 1234, '2021-05-10 15:52:47'),
(11, 'M3A-GB4-5MBP', 'BS Enviromental Science', '3rd year', 'Section E', 'test', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2323', 'NONE', 'Anouncements', 'active', 1234, '2021-05-10 15:52:55'),
(12, '5LP-4LN-9UH7', 'BS Enviromental Science', '3rd year', 'Section E', 'test', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'test', 'NONE', 'Anouncements', 'active', 1234, '2021-05-10 15:53:03'),
(13, '9L5-7A7-SAE4', 'BS Enviromental Science', '2nd year', 'Section D', 'test', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'test', 'NONE', 'Anouncements', 'active', 1234, '2021-05-10 15:53:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_information`
--
ALTER TABLE `school_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_track`
--
ALTER TABLE `student_track`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_information`
--
ALTER TABLE `school_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_track`
--
ALTER TABLE `student_track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
