-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2025 at 11:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_komentar`
--

-- --------------------------------------------------------

--
-- Table structure for table `request_logs`
--

CREATE TABLE `request_logs` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `request_time` datetime DEFAULT NULL,
  `request_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `komentar` text NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `tanggal_komen` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`id`, `nama`, `komentar`, `parent_id`, `tanggal_komen`) VALUES
(1, 'dika', 'can you see this comment sir?\r\n\r\n', 0, '2025-03-10 13:45:25'),
(2, 'anonimus', 'hallo ka nanti kita sholat terawih dimana?', 1, '2025-03-10 13:46:03'),
(3, 'ika', 'amman', 2, '2025-03-10 13:46:20'),
(4, 'gopal', 'dah nak buke nih laper nyee', 0, '2025-03-10 13:46:48'),
(34, 'hayo', 'oke', 0, '2025-03-10 17:25:20'),
(40, '1', '1', 0, '2025-03-11 17:10:47'),
(41, '2', '2', 0, '2025-03-11 17:10:50'),
(42, '3', '3', 0, '2025-03-11 17:10:54'),
(43, '4', '4', 0, '2025-03-11 17:10:58'),
(44, '5', '5', 0, '2025-03-11 17:11:01'),
(45, '6', '6', 44, '2025-03-11 19:21:22'),
(46, '7', '7', 43, '2025-03-11 19:21:32'),
(47, '8', '8', 46, '2025-03-11 19:21:41'),
(48, '9', '9', 47, '2025-03-11 19:21:55'),
(49, '10', '10', 0, '2025-03-11 19:22:07'),
(50, '10', '10', 48, '2025-03-11 19:25:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `request_logs`
--
ALTER TABLE `request_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request_logs`
--
ALTER TABLE `request_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
