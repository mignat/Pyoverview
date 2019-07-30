-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2019 at 06:59 PM
-- Server version: 10.3.15-MariaDB-1
-- PHP Version: 7.3.4-2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pycom_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `pyover_audit`
--

CREATE TABLE `pyover_audit` (
  `user_uid` int(11) NOT NULL,
  `severity` int(11) NOT NULL,
  `Message` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pyover_devices`
--

CREATE TABLE `pyover_devices` (
  `UID` varchar(36) NOT NULL,
  `name` varchar(30) NOT NULL,
  `location` varchar(20) NOT NULL,
  `Description` varchar(150) DEFAULT NULL,
  `status` varchar(30) DEFAULT 'N/A',
  `last_contact` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pyover_devices`
--

INSERT INTO `pyover_devices` (`UID`, `name`, `location`, `Description`, `status`, `last_contact`) VALUES
('8f5e4757-b132-11e9-abd4-b827eb5d7d84', 'Pycom_43', 'Sala1', 'test device', 'N/A', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pyover_users`
--

CREATE TABLE `pyover_users` (
  `username` varchar(30) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `password_hash` varchar(150) NOT NULL,
  `privileges` varchar(1) NOT NULL,
  `api_token` varchar(150) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pyover_users`
--

INSERT INTO `pyover_users` (`username`, `full_name`, `password_hash`, `privileges`, `api_token`, `timestamp`) VALUES
('mignat', 'Marius Ignat', '$2y$10$h7pp1RyYfcT0LiWnx4rKTOA2GkdikJZfNmgRELvU081oPB2YYRJxG', '1', '$2y$10$wVeODq0YVAhcREuPZnC6h.OEVswsocv04QlhcXYFgUYnxNEKz09se', '2019-07-24 13:46:00'),
('tnanu', 'Tiberiu Nanu', '$2y$10$VkUe.fUb3MlOkCWQ5XxGseCRtUlztO0IWQKyDDhrdq3sDPZkLINLC', '0', '$2y$10$VkUe.fUb3MlOkCWQ5XxGseCRtUlztO0IWQKyDDhrdq3sDPZkLINLC', '2019-07-25 14:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `pyover_usetime`
--

CREATE TABLE `pyover_usetime` (
  `device_uid` varchar(36) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pyover_usetime`
--

INSERT INTO `pyover_usetime` (`device_uid`, `start_time`, `end_time`) VALUES
('8f5e4757-b132-11e9-abd4-b827eb5d7d84', '1564327451', '1564327455'),
('8f5e4757-b132-11e9-abd4-b827eb5d7d84', '1564327476', '1564327479'),
('8f5e4757-b132-11e9-abd4-b827eb5d7d84', '1564336487', '1564336489'),
('8f5e4757-b132-11e9-abd4-b827eb5d7d84', '1564336513', '1564336515');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pyover_audit`
--
ALTER TABLE `pyover_audit`
  ADD PRIMARY KEY (`user_uid`);

--
-- Indexes for table `pyover_devices`
--
ALTER TABLE `pyover_devices`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `pyover_users`
--
ALTER TABLE `pyover_users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pyover_usetime`
--
ALTER TABLE `pyover_usetime`
  ADD KEY `device_uid` (`device_uid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pyover_usetime`
--
ALTER TABLE `pyover_usetime`
  ADD CONSTRAINT `pyover_usetime_ibfk_1` FOREIGN KEY (`device_uid`) REFERENCES `pyover_devices` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
