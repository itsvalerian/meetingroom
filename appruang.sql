-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 10:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appruang`
--
CREATE DATABASE IF NOT EXISTS `appruang` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `appruang`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `nama_pembuat` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ruangan` varchar(255) NOT NULL,
  `start_event` timestamp NULL DEFAULT NULL,
  `end_event` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `nama_pembuat`, `jabatan`, `title`, `ruangan`, `start_event`, `end_event`) VALUES
(18, 'Rafi', 'HRD', 'Meeting kerja', 'Arjuna', '2023-09-02 07:02:00', '2023-09-02 08:02:00'),
(20, 'Abraham ', 'HRD', 'Meeting kerja', 'Bimasena', '2023-09-04 09:03:00', '2023-09-04 11:03:00'),
(21, 'Adam ', 'Manajer Pemasaran', 'Meeting kerja', 'Satria', '2023-09-06 05:04:00', '2023-09-06 07:04:00'),
(22, 'Aditya ', 'Administrasi dan Gudang', 'Meeting kerja', 'Kirana', '2023-09-08 08:04:00', '2023-09-08 10:04:00'),
(23, 'Adrian ', 'Administrasi dan Gudang', 'Meeting kerja', 'Choose...', '2023-09-11 09:04:00', '2023-09-11 10:05:00'),
(24, 'Ansel ', 'Staff', 'Meeting kerja', 'Chandradimuka', '2023-09-12 09:05:00', '2023-09-12 10:05:00'),
(25, 'Aditya ', 'Magang', 'Meeting kerja', 'Arjuna', '2023-09-13 07:05:00', '2023-09-13 11:05:00'),
(26, 'Ansel ', 'Manajer Pemasaran', 'Meeting kerja', 'Kirana', '2023-09-15 07:06:00', '2023-09-15 09:06:00'),
(27, 'Rafi', 'HRD', 'Meeting kerja', 'Choose...', '2023-09-19 09:06:00', '2023-09-19 10:06:00'),
(28, 'Rafi', 'Magang', 'Meeting kerja', 'Kirana', '2023-09-22 07:06:00', '2023-09-22 10:07:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
