-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2019 at 12:27 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms_gateway`
--

-- --------------------------------------------------------

--
-- Table structure for table `pbk`
--

CREATE TABLE `pbk` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `nomer` int(20) DEFAULT NULL,
  `is_public` enum('yes','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pbk`
--

INSERT INTO `pbk` (`id`, `group_id`, `name`, `nomer`, `is_public`) VALUES
(2, 5436, 'dadan romadhoni', 5475, ''),
(3, 6756, 'deden awaludin', 8664, ''),
(4, 5643, 'didin rudini ', 6579, ''),
(5, 7654, 'dinda sri astuti ', 5676, ''),
(6, 7646, 'muhamad iqbal assegaf', 6567, ''),
(7, 7577, 'iqbal rizmaya', 7578, ''),
(8, 3242, 'reyza reantino hanggara', 6557, '');

-- --------------------------------------------------------

--
-- Table structure for table `pbk_group`
--

CREATE TABLE `pbk_group` (
  `nama` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `is_public` enum('yes','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pbk_group`
--

INSERT INTO `pbk_group` (`nama`, `id`, `id_user`, `is_public`) VALUES
('crisda purnama', 1, 63562, 'yes'),
('dadan romadhoni', 2, 32421, 'no'),
('deden awaludin', 3, 65686, 'yes'),
('didin rudini', 4, 56456, 'yes'),
('dinda sri astuti', 5, 12137, 'yes'),
('muhammad iqbal', 6, 97876, 'yes'),
('iqbal rizmaya', 7, 46723, 'yes'),
('reyza reantino hanggara', 8, 54644, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `sms_used`
--

CREATE TABLE `sms_used` (
  `id_sms_used` int(11) NOT NULL,
  `sms_date` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `out_sms_count` int(11) DEFAULT NULL,
  `in_sms_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_used`
--

INSERT INTO `sms_used` (`id_sms_used`, `sms_date`, `id_user`, `out_sms_count`, `in_sms_count`) VALUES
(1, '2018-05-25', 63562, 2324, 2343),
(2, '2018-06-14', 32421, 2342, 4321),
(3, '2019-01-14', 65686, 4342, 3424),
(4, '2018-12-23', 56456, 3432, 2434),
(7, '2018-11-17', 46723, 7831, 3221),
(8, '2019-03-14', 54644, 2133, 2331),
(9, '2019-02-11', 45645, 1311, 2123),
(11, '2018-10-30', 12137, 2343, 9743),
(12, '2018-11-08', 97876, 2311, 3212);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(12) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(435688, 'sadsd', '$2y$10$efrWwHDkLquLAVWVqKEt3O3YPncGiXgvuoTaHZTblzS36OatLi5ta'),
(435698, 'sintia', '$2y$10$eVhfa4l04WnZ7zOi.UpWtORqFFOjwrhsKcJrbRbboPuKyrJC/xwfy'),
(435699, 'rifki', '$2y$10$.q8qQUT4eUEPRv4qvqjfSeA582PXBDLF/qmjrSpxMPFGg1raWMJtu');

-- --------------------------------------------------------

--
-- Table structure for table `user_inbox`
--

CREATE TABLE `user_inbox` (
  `id_inbox` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `trash` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_inbox`
--

INSERT INTO `user_inbox` (`id_inbox`, `id_user`, `trash`) VALUES
(1, 63562, 46),
(2, 32421, 34),
(3, 65686, 65),
(4, 56456, 53),
(5, 12137, 85),
(6, 97876, 52),
(7, 46723, 82),
(8, 54644, 32),
(9, 45645, 26),
(10, 78657, 45);

-- --------------------------------------------------------

--
-- Table structure for table `user_outbox`
--

CREATE TABLE `user_outbox` (
  `id_outbox` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_outbox`
--

INSERT INTO `user_outbox` (`id_outbox`, `id_user`) VALUES
(5, 12137),
(2, 32421),
(15, 36254),
(9, 45645),
(7, 46723),
(8, 54644),
(4, 56456),
(1, 63562);

-- --------------------------------------------------------

--
-- Table structure for table `user_setting`
--

CREATE TABLE `user_setting` (
  `id_user` int(11) NOT NULL,
  `tema` varchar(10) DEFAULT NULL,
  `laporan_pengiriman` enum('yes','no') DEFAULT NULL,
  `language` varchar(20) DEFAULT NULL,
  `conversation_sort` enum('asc','desc') DEFAULT NULL,
  `country_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_setting`
--

INSERT INTO `user_setting` (`id_user`, `tema`, `laporan_pengiriman`, `language`, `conversation_sort`, `country_code`) VALUES
(12137, 'kewanitaan', 'yes', 'indonesia ', 'asc', '12'),
(32421, 'kekerasan', 'no', 'indonesia', 'desc', '12'),
(45645, 'otomotif', 'yes', 'indonesia', 'asc', '7'),
(46723, 'kokoreaan', 'no', 'indonesia', 'asc', '2'),
(56456, 'demo', 'yes', 'indonesia', 'asc', '18'),
(63562, 'kelulusan', 'yes', 'indonesia', 'asc', '1'),
(65686, 'ormas', 'yes', 'indonesia', 'asc', '23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pbk`
--
ALTER TABLE `pbk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pbk_group`
--
ALTER TABLE `pbk_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `sms_used`
--
ALTER TABLE `sms_used`
  ADD PRIMARY KEY (`id_sms_used`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user_inbox`
--
ALTER TABLE `user_inbox`
  ADD PRIMARY KEY (`id_inbox`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user_outbox`
--
ALTER TABLE `user_outbox`
  ADD PRIMARY KEY (`id_outbox`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user_setting`
--
ALTER TABLE `user_setting`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435700;

--
-- AUTO_INCREMENT for table `user_inbox`
--
ALTER TABLE `user_inbox`
  MODIFY `id_inbox` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_setting`
--
ALTER TABLE `user_setting`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65687;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
