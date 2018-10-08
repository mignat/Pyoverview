-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: pyoverview_db_1
-- Generation Time: Oct 07, 2018 at 10:47 PM
-- Server version: 8.0.11
-- PHP Version: 7.2.6

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
CREATE DATABASE IF NOT EXISTS `pycom_dashboard` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `pycom_dashboard`;

-- --------------------------------------------------------

--
-- Table structure for table `pyover_devices`
--

CREATE TABLE `pyover_devices` (
  `name` varchar(30) NOT NULL,
  `Description` varchar(150) DEFAULT NULL,
  `status` varchar(30) DEFAULT 'N/A',
  `last_contact` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pyover_devices`
--

INSERT INTO `pyover_devices` (`name`, `Description`, `status`, `last_contact`) VALUES
('Pycom_1', 'Testing this shit', 'OK', '2018-08-22 00:00:00'),
('Pycom_2', 'This is for testing', 'N/A', '2018-08-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pyover_users`
--

CREATE TABLE `pyover_users` (
  `username` varchar(30) NOT NULL,
  `password_hash` varchar(150) NOT NULL,
  `api_token` varchar(150) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pyover_users`
--

INSERT INTO `pyover_users` (`username`, `password_hash`, `api_token`, `timestamp`) VALUES
('mignat', '$2y$10$h7pp1RyYfcT0LiWnx4rKTOA2GkdikJZfNmgRELvU081oPB2YYRJxG', '$2y$10$wVeODq0YVAhcREuPZnC6h.OEVswsocv04QlhcXYFgUYnxNEKz09se', '2018-08-14 08:37:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
