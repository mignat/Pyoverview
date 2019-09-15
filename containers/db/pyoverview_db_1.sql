-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: pyoverview_db_1
-- Generation Time: Sep 15, 2019 at 11:16 PM
-- Server version: 8.0.17
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pycom_dashboard`
--
CREATE DATABASE IF NOT EXISTS `pycom_dashboard` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `pycom_dashboard`;

-- --------------------------------------------------------

--
-- Table structure for table `pyover_audit`
--

CREATE TABLE IF NOT EXISTS `pyover_audit`
(
    `user_uid` int(11) NOT NULL,
    `severity` int(11) NOT NULL,
    `Message`  varchar(50) DEFAULT NULL,
    PRIMARY KEY (`user_uid`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pyover_devices`
--

CREATE TABLE IF NOT EXISTS `pyover_devices`
(
    `UID`          varchar(36) NOT NULL,
    `name`         varchar(30) NOT NULL,
    `location`     varchar(20) NOT NULL,
    `Description`  varchar(150)     DEFAULT NULL,
    `status`       varchar(30)      DEFAULT 'N/A',
    `last_contact` timestamp   NULL DEFAULT NULL,
    PRIMARY KEY (`UID`),
    UNIQUE KEY `name` (`name`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pyover_devices`
--

INSERT INTO `pyover_devices` (`UID`, `name`, `location`, `Description`, `status`, `last_contact`)
VALUES ('8f5e4757-b132-11e9-abd4-b827eb5d7d84', 'Pycom_43', 'Sala1', 'test device', 'N/A', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pyover_users`
--

CREATE TABLE IF NOT EXISTS `pyover_users`
(
    `username`      varchar(30)  NOT NULL,
    `full_name`     varchar(30)  NOT NULL,
    `password_hash` varchar(150) NOT NULL,
    `privileges`    varchar(1)   NOT NULL,
    `api_token`     varchar(150) NOT NULL,
    `timestamp`     timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`username`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pyover_users`
--

INSERT INTO `pyover_users` (`username`, `full_name`, `password_hash`, `privileges`, `api_token`)
VALUES ('mignat', 'Marius Ignat', '$2y$10$h7pp1RyYfcT0LiWnx4rKTOA2GkdikJZfNmgRELvU081oPB2YYRJxG', '1',
        '$2y$10$wVeODq0YVAhcREuPZnC6h.OEVswsocv04QlhcXYFgUYnxNEKz09se'),
       ('tnanu', 'Tiberiu Nanu', '$2y$10$VkUe.fUb3MlOkCWQ5XxGseCRtUlztO0IWQKyDDhrdq3sDPZkLINLC', '0',
        '$2y$10$VkUe.fUb3MlOkCWQ5XxGseCRtUlztO0IWQKyDDhrdq3sDPZkLINLC');

-- --------------------------------------------------------

--
-- Table structure for table `pyover_usetime`
--

CREATE TABLE IF NOT EXISTS `pyover_usetime`
(
    `device_uid` varchar(36) NOT NULL,
    `start_time` varchar(10) NOT NULL,
    `end_time`   varchar(10) NOT NULL,
    KEY `device_uid` (`device_uid`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pyover_usetime`
--

INSERT INTO `pyover_usetime` (`device_uid`, `start_time`, `end_time`)
VALUES ('8f5e4757-b132-11e9-abd4-b827eb5d7d84', '1564327451', '1564327455'),
       ('8f5e4757-b132-11e9-abd4-b827eb5d7d84', '1564327476', '1564327479'),
       ('8f5e4757-b132-11e9-abd4-b827eb5d7d84', '1564336487', '1564336489'),
       ('8f5e4757-b132-11e9-abd4-b827eb5d7d84', '1564336513', '1564336515'),
       ('8f5e4757-b132-11e9-abd4-b827eb5d7d84', '1564327451', '1564327451'),
       ('8f5e4757-b132-11e9-abd4-b827eb5d7d84', '1564327451', '1564327451'),
       ('8f5e4757-b132-11e9-abd4-b827eb5d7d84', '1564327451', '1564327451'),
       ('8f5e4757-b132-11e9-abd4-b827eb5d7d84', '1564327451', '1564327451');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pyover_usetime`
--
ALTER TABLE `pyover_usetime`
    ADD CONSTRAINT `pyover_usetime_ibfk_1` FOREIGN KEY (`device_uid`) REFERENCES `pyover_devices` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
