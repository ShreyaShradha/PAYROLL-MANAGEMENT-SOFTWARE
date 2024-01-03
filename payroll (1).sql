-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 05:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eno` int(11) NOT NULL,
  `ename` varchar(50) DEFAULT NULL,
  `f_name` varchar(40) DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `basic` int(11) DEFAULT NULL,
  `da` int(11) DEFAULT NULL,
  `hra` int(11) DEFAULT NULL,
  `pf` int(11) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` char(14) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `aadhar` char(12) DEFAULT NULL,
  `eleft` char(1) DEFAULT NULL,
  `eleft_reason` varchar(100) DEFAULT NULL,
  `eleft_date` date DEFAULT NULL,
  `type` varchar(40) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `rest_pay_adv` int(11) DEFAULT NULL,
  `pay_adv_ded` int(11) DEFAULT NULL,
  `cl` int(11) DEFAULT NULL,
  `el` int(11) DEFAULT NULL,
  `md` int(11) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `dor` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `firm`
--

CREATE TABLE `firm` (
  `sno` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `firm`
--

INSERT INTO `firm` (`sno`, `name`) VALUES
(1, 'ABCD pvt ltd'),
(2, 'City Center'),
(3, 'Sec 4 , Bokaro'),
(4, 'Jharkhand');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `sno` int(11) NOT NULL,
  `ename` varchar(50) DEFAULT NULL,
  `actual_basic` int(11) DEFAULT NULL,
  `attendance` int(11) DEFAULT NULL,
  `basic` int(11) DEFAULT NULL,
  `da` int(11) DEFAULT NULL,
  `hra` int(11) DEFAULT NULL,
  `allowance` int(11) DEFAULT NULL,
  `gross` int(11) DEFAULT NULL,
  `pf` int(11) DEFAULT NULL,
  `deduction` int(11) DEFAULT NULL,
  `tot_deduction` int(11) DEFAULT NULL,
  `net_salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sno` int(11) NOT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sno`, `designation`, `department`, `gender`) VALUES
(1, 'Manager', 'Store', 'MALE'),
(2, 'Accountant', 'Purchase', 'FEMALE'),
(3, NULL, NULL, 'TRANSGENDER');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `RID` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `active` char(1) DEFAULT NULL,
  `phone` char(14) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`RID`, `name`, `email`, `pass`, `active`, `phone`, `type`) VALUES
(1, 'Shreya', '22je0922@iitism.ac.in', '12345', 'Y', '8434592979', 'Payroll'),
(2, 'Shashank', 'shashankbscity@gmail.com', '1234', 'Y', '8092839734', 'Payroll'),
(3, 'Shreya Shradha', 'shreyabscity@gmail.com', '12345', 'Y', '8434592979', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eno`);

--
-- Indexes for table `firm`
--
ALTER TABLE `firm`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`RID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `RID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
