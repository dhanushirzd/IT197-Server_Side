-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 08:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ums`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_tbl`
--

CREATE TABLE `emp_tbl` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(200) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_nic` varchar(12) NOT NULL,
  `emp_tel` int(10) NOT NULL,
  `emp_dob` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_tbl`
--

CREATE TABLE `login_tbl` (
  `id` int(11) NOT NULL,
  `login_email` varchar(100) NOT NULL,
  `login_pwd` varchar(60) NOT NULL,
  `login_role` varchar(10) NOT NULL,
  `login_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`id`, `login_email`, `login_pwd`, `login_role`, `login_status`) VALUES
(4, 'lakshani123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1),
(5, 'admin@gmail.com', 'e35cf7b66449df565f93c607d5a81d09', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` int(10) NOT NULL,
  `user_nic` varchar(12) NOT NULL,
  `user_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `user_name`, `user_email`, `user_phone`, `user_nic`, `user_status`) VALUES
(4, 'Lakshani', 'lakshani123@gmail.com', 712345789, '456123789429', 1),
(5, 'admin', 'admin@gmail.com', 712345789, '123789456349', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_tbl`
--
ALTER TABLE `emp_tbl`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `login_tbl`
--
ALTER TABLE `login_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_tbl`
--
ALTER TABLE `emp_tbl`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_tbl`
--
ALTER TABLE `login_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
