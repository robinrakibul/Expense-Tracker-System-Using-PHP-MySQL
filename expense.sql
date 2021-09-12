-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 06:44 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `maintable`
--

CREATE TABLE `maintable` (
  `ID` int(100) NOT NULL,
  `UserId` int(10) NOT NULL,
  `ExpenseDate` date DEFAULT NULL,
  `ExpenseItem` varchar(200) DEFAULT NULL,
  `ExpenseCost` varchar(200) DEFAULT NULL,
  `NoteDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintable`
--

INSERT INTO `maintable` (`ID`, `UserId`, `ExpenseDate`, `ExpenseItem`, `ExpenseCost`, `NoteDate`) VALUES
(56, 24, '2021-09-07', 'egg', '120', '2021-09-08 10:57:23'),
(57, 24, '2021-09-08', 'toothpaste', '60', '2021-09-08 10:57:47'),
(58, 24, '2021-09-09', 'bag', '1040', '2021-09-08 10:58:05'),
(59, 24, '2021-09-08', 'shoe', '2500', '2021-09-08 11:35:30'),
(60, 24, '2021-09-09', 'Fish', '1800', '2021-09-08 12:40:48'),
(61, 24, '2021-09-08', 'Burger', '250', '2021-09-08 12:41:22'),
(62, 24, '2021-09-09', 'Toaster', '1500', '2021-09-09 06:44:48'),
(63, 25, '2021-09-09', 'Egg', '250', '2021-09-10 12:01:15'),
(64, 25, '2021-09-09', 'Chicken', '300', '2021-09-10 12:01:27'),
(65, 25, '2021-09-09', 'Buiscuit', '400', '2021-09-10 12:01:43'),
(66, 25, '2021-09-08', 'Chair', '3000', '2021-09-10 12:02:00'),
(67, 25, '2021-09-10', 'Medicine', '2000', '2021-09-10 12:02:34'),
(68, 25, '2021-09-10', 'Toothpaste', '200', '2021-09-10 12:02:50'),
(69, 25, '2021-09-10', 'Coffee', '300', '2021-09-10 12:03:06'),
(70, 25, '2021-09-10', 'example', '300', '2021-09-10 13:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(150) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` int(11) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `monthlyincome` int(10) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`ID`, `FullName`, `Email`, `MobileNumber`, `Password`, `monthlyincome`, `RegDate`) VALUES
(25, 'Test User', 'test@test.com', 1403214161, '202cb962ac59075b964b07152d234b70', 100000, '2021-09-10 12:00:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintable`
--
ALTER TABLE `maintable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `maintable`
--
ALTER TABLE `maintable`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
