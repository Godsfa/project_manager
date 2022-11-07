-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 12:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `task_tbl`
--

CREATE TABLE `task_tbl` (
  `id` int(5) NOT NULL,
  `task_description` varchar(255) NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `end_time` datetime NOT NULL,
  `priority` varchar(225) NOT NULL,
  `start_time` datetime NOT NULL,
  `login_id` int(20) NOT NULL DEFAULT 2,
  `status` varchar(11) NOT NULL DEFAULT '0' COMMENT '0=Started, 1=Ongoing, 2=Finished, 3=Canceled',
  `employee_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_tbl`
--

INSERT INTO `task_tbl` (`id`, `task_description`, `task_name`, `end_time`, `priority`, `start_time`, `login_id`, `status`, `employee_id`) VALUES
(1, 'website ', 'Build software', '2022-11-23 15:43:00', 'High', '2022-11-29 15:43:00', 2, '1', 12),
(2, 'website ', 'Build software', '2022-11-23 15:43:00', 'High', '2022-11-29 15:43:00', 2, '2', 12),
(3, 'html,css,js', 'front end', '2022-11-23 12:03:00', 'High', '2022-11-17 12:03:00', 2, '3', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `employee_id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `login_id` int(5) NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`employee_id`, `username`, `fullname`, `email`, `password`, `gender`, `login_id`, `photo`) VALUES
(1, 'Administrator', 'Godsfavour B', 'admin@gmail.com', 'administration', 'Male', 1, ''),
(4, 'Bobby ', 'Bobby corn J', 'corn@gmail.com', 'bobbycorn', 'Male', 2, ''),
(7, 'Mary', 'Mary Mazda ', 'mary@gmail.com', 'bobbycorn', 'Female', 2, ''),
(10, 'favour', 'favour', 'abc@gmail.com', 'bobbycorn', 'Female', 2, ''),
(12, 'Ehimen', 'housing ', 'admin@admin.com', 'Ehimen', 'Female', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task_tbl`
--
ALTER TABLE `task_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task_tbl`
--
ALTER TABLE `task_tbl`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
