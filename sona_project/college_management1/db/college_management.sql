-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 11:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculties_table`
--

CREATE TABLE `faculties_table` (
  `faculties_id` int(10) NOT NULL,
  `faculties_name` varchar(30) NOT NULL,
  `note` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculties_table`
--

INSERT INTO `faculties_table` (`faculties_id`, `faculties_name`, `note`) VALUES
(1, 'xyz', 'nnnn'),
(2, 'xny', 'hhhh');

-- --------------------------------------------------------

--
-- Table structure for table `location_table`
--

CREATE TABLE `location_table` (
  `local_id` int(10) NOT NULL,
  `l_name` text NOT NULL,
  `description` text NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_score_table`
--

CREATE TABLE `student_score_table` (
  `ss_id` int(10) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `faculties_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `miderm` float NOT NULL,
  `final` float NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `stu_id` int(10) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `gender` text NOT NULL,
  `dob` date NOT NULL,
  `pob` text NOT NULL,
  `address` text NOT NULL,
  `phone` int(10) NOT NULL,
  `email` text NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`stu_id`, `f_name`, `l_name`, `gender`, `dob`, `pob`, `address`, `phone`, `email`, `note`) VALUES
(3, 'lili', 'gayki', 'female', '2022-02-04', 'dskjjjt', 'teegaon', 367894512, 'vinigayki@gmail.com', 'imp'),
(4, 'mmm', 'kl', 'female', '2022-02-02', 'l', 'nmdc1', 123, 'v@gmail.com', 'jskk'),
(6, 'jamrani', 'mane', 'male', '2022-02-09', 'sd', 'jam', 1233654789, 'mn@gmail.com', 'jcldsk'),
(7, 'tina', 'rane', '', '0000-00-00', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_table`
--

CREATE TABLE `sub_table` (
  `sub_id` int(10) NOT NULL,
  `faculties_id` int(10) DEFAULT NULL,
  `teacher_id` int(10) NOT NULL,
  `semester` text NOT NULL,
  `sub_name` text NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_table`
--

INSERT INTO `sub_table` (`sub_id`, `faculties_id`, `teacher_id`, `semester`, `sub_name`, `note`) VALUES
(6, 2, 21, 'secound', 'hindi', 'imp');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_table`
--

CREATE TABLE `teacher_table` (
  `teacher_id` int(10) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `gender` text NOT NULL,
  `dob` text NOT NULL,
  `address` varchar(30) NOT NULL,
  `degree` text NOT NULL,
  `salary` int(20) NOT NULL,
  `married` text NOT NULL,
  `phone` int(10) NOT NULL,
  `email` text NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_table`
--

INSERT INTO `teacher_table` (`teacher_id`, `f_name`, `l_name`, `gender`, `dob`, `address`, `degree`, `salary`, `married`, `phone`, `email`, `note`) VALUES
(20, 'mm', 'mm', 'female', '2022-02-10', 'ede', 'kjv', 0, 'no', 231456987, 'kll@gmail.com', 'kfcll'),
(21, 'nn', 'nn', 'female', '2022-02-10', 'ede', 'kjv', 0, 'no', 231456987, 'kll@gmail.com', 'kfcll');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `u_id` int(10) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `type` text NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`u_id`, `username`, `password`, `type`, `note`) VALUES
(1, 'sona', '4af5cab77c62eaec5f87b570f2d2b127', 'techer', 'techer'),
(2, 'mina', '4af5cab77c62eaec5f87b570f2d2b127', 'admin', 'admin'),
(3, 'vini', '4af5cab77c62eaec5f87b570f2d2b127', 'student', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculties_table`
--
ALTER TABLE `faculties_table`
  ADD PRIMARY KEY (`faculties_id`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `sub_table`
--
ALTER TABLE `sub_table`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teacher_table`
--
ALTER TABLE `teacher_table`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculties_table`
--
ALTER TABLE `faculties_table`
  MODIFY `faculties_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `stu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_table`
--
ALTER TABLE `sub_table`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher_table`
--
ALTER TABLE `teacher_table`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
