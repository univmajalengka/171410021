-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 08:56 AM
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
-- Stand-in structure for view `data`
-- (See below for the actual view)
--
CREATE TABLE `data` (
`id_user` int(11)
,`username` varchar(12)
,`password` varchar(255)
,`tema` varchar(10)
,`id` int(11)
,`id_inbox` int(11)
,`id_outbox` int(11)
,`sms_date` date
,`nomer` int(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `listdata`
-- (See below for the actual view)
--
CREATE TABLE `listdata` (
`id_user` int(11)
,`nama` varchar(50)
,`tema` varchar(10)
,`id` int(11)
,`id_inbox` int(11)
,`id_outbox` int(11)
,`sms_date` date
,`group_id` int(11)
);

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
(2541, 2541, 'rifki', 2147483647, 'no');

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
('rifki', 2541, 435699, 'yes');

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
(12, '2018-02-07', 435699, 123, 0),
(13, '2018-06-14', 435699, 4232, 0);

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
(15, 435699, 127);

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
(123, 435699);

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
(435699, 'kebersihan', 'yes', 'indonesia', 'desc', '76');

-- --------------------------------------------------------

--
-- Structure for view `data`
--
DROP TABLE IF EXISTS `data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data`  AS  select `a`.`id_user` AS `id_user`,`a`.`username` AS `username`,`a`.`password` AS `password`,`b`.`tema` AS `tema`,`c`.`id` AS `id`,`d`.`id_inbox` AS `id_inbox`,`e`.`id_outbox` AS `id_outbox`,`f`.`sms_date` AS `sms_date`,`g`.`nomer` AS `nomer` from ((((((`user` `a` join `user_setting` `b` on((`a`.`id_user` = `b`.`id_user`))) join `pbk_group` `c` on((`a`.`id_user` = `c`.`id_user`))) join `user_inbox` `d` on((`a`.`id_user` = `d`.`id_user`))) join `user_outbox` `e` on((`a`.`id_user` = `e`.`id_outbox`))) join `sms_used` `f` on((`a`.`id_user` = `f`.`id_user`))) join `pbk` `g` on((`c`.`id` = `g`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `listdata`
--
DROP TABLE IF EXISTS `listdata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listdata`  AS  select `a`.`id_user` AS `id_user`,`c`.`nama` AS `nama`,`b`.`tema` AS `tema`,`c`.`id` AS `id`,`d`.`id_inbox` AS `id_inbox`,`f`.`id_outbox` AS `id_outbox`,`g`.`sms_date` AS `sms_date`,`h`.`group_id` AS `group_id` from ((((((`user` `a` join `user_setting` `b` on((`a`.`id_user` = `b`.`id_user`))) join `pbk_group` `c` on((`a`.`id_user` = `c`.`id_user`))) join `user_inbox` `d` on((`a`.`id_user` = `b`.`id_user`))) join `user_outbox` `f` on((`a`.`id_user` = `b`.`id_user`))) join `sms_used` `g` on((`a`.`id_user` = `b`.`id_user`))) join `pbk` `h` on((`c`.`id` = `h`.`id`))) ;

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
  MODIFY `id_inbox` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_setting`
--
ALTER TABLE `user_setting`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435700;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pbk`
--
ALTER TABLE `pbk`
  ADD CONSTRAINT `pbk_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pbk_group` (`id`);

--
-- Constraints for table `pbk_group`
--
ALTER TABLE `pbk_group`
  ADD CONSTRAINT `pbk_group_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `sms_used`
--
ALTER TABLE `sms_used`
  ADD CONSTRAINT `sms_used_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user_inbox`
--
ALTER TABLE `user_inbox`
  ADD CONSTRAINT `user_inbox_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user_outbox`
--
ALTER TABLE `user_outbox`
  ADD CONSTRAINT `user_outbox_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user_setting`
--
ALTER TABLE `user_setting`
  ADD CONSTRAINT `user_setting_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
