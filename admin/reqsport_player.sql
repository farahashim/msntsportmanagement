-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 09:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport`
--

-- --------------------------------------------------------

--
-- Table structure for table `reqsport_player`
--

CREATE TABLE `reqsport_player` (
  `reqsport_id` int(4) NOT NULL,
  `reqsport_ic` varchar(14) NOT NULL,
  `reqsport_FN` varchar(255) NOT NULL,
  `reqsport_LN` varchar(255) NOT NULL,
  `reqsport_age` int(3) NOT NULL,
  `reqsport_email` varchar(150) NOT NULL,
  `reqsport_address` text NOT NULL,
  `reqsport_postcode` int(6) NOT NULL,
  `reqsport_phonenum` varchar(13) NOT NULL,
  `reqsport_phonenumpp` varchar(13) NOT NULL,
  `reqsport_pass` varchar(255) NOT NULL,
  `reqsport_status` varchar(20) NOT NULL,
  `reqsport_gender` varchar(15) NOT NULL,
  `reqsport_nation` varchar(15) NOT NULL,
  `reqsport_religion` varchar(15) NOT NULL,
  `reqsport_stateofbirth` varchar(20) NOT NULL,
  `reqsport_dob` date NOT NULL,
  `reqsport_sport` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reqsport_player`
--
ALTER TABLE `reqsport_player`
  ADD PRIMARY KEY (`reqsport_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reqsport_player`
--
ALTER TABLE `reqsport_player`
  MODIFY `reqsport_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
