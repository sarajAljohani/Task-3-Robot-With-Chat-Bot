-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 08:16 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task1_robot`
--

-- --------------------------------------------------------

--
-- Table structure for table `arm`
--

CREATE TABLE `arm` (
  `base` int(3) NOT NULL DEFAULT 90,
  `shoulder` int(3) NOT NULL DEFAULT 90,
  `elbow` int(3) NOT NULL DEFAULT 90,
  `wrist` int(3) NOT NULL DEFAULT 90,
  `gripper` int(3) NOT NULL DEFAULT 0,
  `engin6` int(3) NOT NULL DEFAULT 90,
  `power` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arm`
--

INSERT INTO `arm` (`base`, `shoulder`, `elbow`, `wrist`, `gripper`, `engin6`, `power`) VALUES
(90, 90, 90, 90, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `base`
--

CREATE TABLE `base` (
  `direction` text NOT NULL DEFAULT 'stop'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `base`
--

INSERT INTO `base` (`direction`) VALUES
('Stop');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
