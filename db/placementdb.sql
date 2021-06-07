-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 12:13 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placementdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `app_no` int(10) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL,
  `stu_id` int(11) UNSIGNED NOT NULL,
  `uname` varchar(50) NOT NULL,
  `job_id` int(11) NOT NULL,
  `qualified` tinyint(4) NOT NULL DEFAULT 3,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`app_no`, `uid`, `stu_id`, `uname`, `job_id`, `qualified`, `status`) VALUES
(1, 1, 1, 'op_swayam', 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_openings`
--

CREATE TABLE `job_openings` (
  `job_id` int(11) UNSIGNED NOT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `job_desc` mediumtext DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `inter_date` date DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `req_stream` varchar(255) DEFAULT NULL,
  `add_req` text DEFAULT NULL,
  `sal_package` varchar(255) DEFAULT NULL,
  `location` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_openings`
--

INSERT INTO `job_openings` (`job_id`, `job_title`, `job_desc`, `company`, `post_date`, `inter_date`, `last_date`, `qualification`, `req_stream`, `add_req`, `sal_package`, `location`) VALUES
(1, 'US IT Recruiter', 'Job Types: Full-time, Fresher\r\n\r\nSchedule:\r\n• Night shift(6:30PM-3:30AM)\r\n\r\nExperience:\r\n• Fresher\r\n\r\nLanguage:\r\n• English (Required)', 'Proiasys Inc', '2021-06-09', '2021-06-22', '2021-06-15', 'Diploma', 'Computer Science and Engineering', 'Typing speed 40+ w.p.m', '₹18,613/mo', 'Bhubaneswar, Odisha');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `uid` int(11) NOT NULL,
  `stu_id` int(11) UNSIGNED NOT NULL,
  `stu_roll` varchar(20) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `stu_name` varchar(50) NOT NULL,
  `stu_fath_name` varchar(50) NOT NULL,
  `stu_dob` date NOT NULL,
  `stu_mob` char(18) NOT NULL,
  `stu_mail` text NOT NULL,
  `stu_qualification` text NOT NULL,
  `stu_stream` text NOT NULL,
  `stu_marks` float NOT NULL,
  `stu_interest` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`uid`, `stu_id`, `stu_roll`, `uname`, `stu_name`, `stu_fath_name`, `stu_dob`, `stu_mob`, `stu_mail`, `stu_qualification`, `stu_stream`, `stu_marks`, `stu_interest`) VALUES
(1, 1, 'op_swayam', '', 'SWAYAM PRAKASH SATAPATHY', 'Mr Babloo', '2003-02-05', '+91-2233445566', 'swayam@gmail.com', 'Diploma', 'Computer Science and Engineering', 90.78, 'Gaming');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `utype` char(12) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `upass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `utype`, `uname`, `upass`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'student', 'op_swayam', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`app_no`);

--
-- Indexes for table `job_openings`
--
ALTER TABLE `job_openings`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stu_id`),
  ADD UNIQUE KEY `stu_roll` (`stu_roll`),
  ADD UNIQUE KEY `stu_uname` (`uname`),
  ADD UNIQUE KEY `uid` (`uid`),
  ADD UNIQUE KEY `stu_id` (`stu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `app_no` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `job_openings`
--
ALTER TABLE `job_openings`
  MODIFY `job_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
