
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

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
('mignat', '$2y$10$wVeODq0YVAhcREuPZnC6h.OEVswsocv04QlhcXYFgUYnxNEKz09se', '$2y$10$wVeODq0YVAhcREuPZnC6h.OEVswsocv04QlhcXYFgUYnxNEKz09se', '2018-08-14 08:37:13');
COMMIT;