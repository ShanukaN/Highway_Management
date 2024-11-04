-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2024 at 06:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `highway`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_history`
--

CREATE TABLE `account_history` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`) VALUES
(1, 'Shanuka Nadeeshan', 'shanuka.nadeeshan2014@gmail.com', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(50) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `tel` int(12) NOT NULL,
  `age` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_id`, `name`, `gender`, `address`, `tel`, `age`) VALUES
(1, 'EMP - 1 ', 'Shanuka', 'Male', '32,mirigama', 717536922, 20),
(5, 'EMP - 3', 'Kasun', 'Male', '22/A,Kosowita,kuriduwaththa,Gampaha', 332245822, 25);

-- --------------------------------------------------------

--
-- Table structure for table `entrance`
--

CREATE TABLE `entrance` (
  `id` int(20) NOT NULL,
  `key` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `entrance` varchar(50) NOT NULL,
  `exit` varchar(50) NOT NULL,
  `lati` varchar(50) NOT NULL,
  `long` varchar(50) NOT NULL,
  `exit_lati` varchar(50) NOT NULL,
  `exit_longi` varchar(50) NOT NULL,
  `dis` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ent_date` varchar(20) NOT NULL,
  `ent_time` varchar(20) NOT NULL,
  `exit_date` varchar(20) NOT NULL,
  `exit_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entrance`
--

INSERT INTO `entrance` (`id`, `key`, `status`, `entrance`, `exit`, `lati`, `long`, `exit_lati`, `exit_longi`, `dis`, `price`, `speed`, `ent_date`, `ent_time`, `exit_date`, `exit_time`) VALUES
(80, '982602584V', 'ok', 'Kadawatha', 'Gelanigama', '7.001094', '79.961422', '6.71873', '79.998803', '35.601', 250, '1068.03', '2022-09-25', '11:15:12', '2022-09-25', '11:17:34'),
(87, '982602584V', 'ok', 'Kadawatha', 'Gelanigama', '7.001094', '79.961422', '6.71873', '79.998803', '35.601', 250, '1068.03', '2022-09-25', '12:59:05', '2022-09-25', '13:01:43'),
(88, '982602584V', 'ok', 'Gelanigama', 'Kadawatha', '6.71873', '79.998803', '7.001094', '79.961422', '35.601', 250, '1068', '2022-09-25', '13:01:33', '2022-09-25', '13:04:18'),
(89, '982602584V', 'ok', 'Kadawatha', 'Gelanigama', '7.001094', '79.961422', '6.71873', '79.998803', '35.601', 250, '534', '2022-09-25', '13:05:53', '2022-09-25', '13:10:48'),
(90, '982602584V', 'ok', 'Gelanigama', 'Kadawatha', '6.71873', '79.998803', '7.001094', '79.961422', '35.601', 250, '214', '2022-09-25', '13:29:17', '2022-09-25', '13:40:08'),
(92, '982602584V', 'ok', 'Kadawatha', 'Gelanigama', '7.001094', '79.961422', '6.71873', '79.998803', '35.601', 250, '427', '2022-09-25', '14:5:08', '2022-09-25', '14:10:40'),
(93, '982602584V', 'ok', 'Gelanigama', 'Kadawatha', '6.71873', '79.998803', '7.001094', '79.961422', '35.601', 250, '356', '2022-09-25', '21:05:19', '2022-09-25', '21:11:27'),
(94, '982602584V', 'ok', 'Kadawatha', 'Gelanigama', '7.001094', '79.961422', '6.71873', '79.998803', '35.601', 250, '534', '2022-09-25', '21:08:10', '2022-09-25', '21:12:48'),
(95, '982602584V', 'ok', 'Gelanigama', 'Kadawatha', '6.71873', '79.998803', '7.001094', '79.961422', '35.601', 250, '1068', '2022-09-25', '21:12:14', '2022-09-25', '21:14:53'),
(96, '982602584V', 'ok', 'Kadawatha', 'Gelanigama', '7.001094', '79.961422', '6.71873', '79.998803', '35.601', 250, '267', '2022-09-25', '21:10:26', '2022-09-25', '21:19:05'),
(100, '932689574V', 'ok', 'Kadawatha', 'Gelanigama', '7.001094', '79.961422', '6.71873', '79.998803', '35.601', 250, '35.02', '2022-10-01', '10:11:19', '2022-10-01', '11:12:31'),
(101, '932689574V', 'ok', 'Gelanigama', 'Kadawatha', '6.71873', '79.998803', '7.001094', '79.961422', '35.601', 250, '35.6', '2022-10-01', '10:14:37', '2022-10-01', '11:15:23'),
(102, '932689574V', 'ok', 'Kadawatha', 'Gelanigama', '7.001094', '79.961422', '6.71873', '79.998803', '35.601', 250, '79.11', '2022-10-01', '10:50:02', '2022-10-01', '11:17:43'),
(103, '', 'ok', '', '', '', '', '', '', '', 350, '', '', '', '2022-07-2', ''),
(104, '', 'ok', '', '', '', '', '', '', '', 600, '', '', '', '2022-07-2', ''),
(105, '', 'ok', '', '', '', '', '', '', '', 500, '', '', '', '2022-07-15', ''),
(106, '', 'ok', '', '', '', '', '', '', '', 5000, '', '', '', '2022-08-15', ''),
(107, '', 'ok', '', '', '', '', '', '', '', 10000, '', '', '', '2022-06-26', ''),
(108, '', 'ok', '', '', '', '', '', '', '', 8000, '', '', '', '2022-05-20', ''),
(109, '', 'ok', '', '', '', '', '', '', '', 7000, '', '', '', '2022-07-2', ''),
(110, '', 'ok', '', '', '', '', '', '', '', 4300, '', '', '', '2022-08-5', ''),
(111, '', 'ok', '', '', '', '', '', '', '', 5700, '', '', '', '2022-09-5', ''),
(112, 'BDV-7766', 'ok', 'Gelanigama', 'Kadawatha', '6.71873', '79.998803', '7.001094', '79.961422', '35.601', 250, '712.02', '2022-10-09', '20:29:44', '2022-10-09', '20:33:38'),
(115, 'BDV-7766', 'ok', 'Kadawatha', 'Gelanigama', '7.001094', '79.961422', '6.71873', '79.998803', '35.601', 250, '427.21', '2022-10-09', '20:56:40', '2022-10-09', '21:01:41'),
(116, 'BDV-7766', 'ok', 'Gelanigama', 'Kadawatha', '6.71873', '79.998803', '7.001094', '79.961422', '35.601', 250, '1068.03', '2022-10-09', '21:05:47', '2022-10-09', '21:08:15'),
(126, 'BDV-7766', 'ok', 'Gelanigama', 'Gelanigama', '6.71873', '79.998803', '6.71873', '79.998803', '0', 0, '0', '2022-10-10', '2:31:17', '2022-10-11', '03:57:45'),
(127, 'BDV-7766', 'ok', 'Gelanigama', 'Gelanigama', '6.71873', '79.998803', '6.71873', '79.998803', '0', 0, '0', '2022-10-11', '3:59:16', '2022-10-11', '04:09:57'),
(128, 'BDV-7766', 'ok', 'Gelanigama', 'Gelanigama', '6.71873', '79.998803', '6.71873', '79.998803', '0', 0, '0', '2022-10-11', '4:10:38', '2022-10-11', '04:31:11'),
(129, 'BAE-2222', 'ok', 'Gelanigama', 'Gelanigama', '6.71873', '79.998803', '6.71873', '79.998803', '0', 0, '0', '2022-10-11', '4:31:36', '2022-10-11', '04:40:14'),
(130, 'BAE-2222', 'ok', 'Gelanigama', 'Gelanigama', '6.71873', '79.998803', '6.71873', '79.998803', '0', 0, '0', '2022-10-11', '4:42:07', '2022-10-11', '04:48:41'),
(131, 'BAE-2222', 'ok', 'Gelanigama', 'Gelanigama', '6.71873', '79.998803', '6.71873', '79.998803', '0', 0, '0', '2022-10-11', '4:45:49', '2022-10-11', '04:50:02'),
(132, 'BAE-2222', 'ok', 'Gelanigama', 'Gelanigama', '6.71873', '79.998803', '6.71873', '79.998803', '0', 0, '0', '2022-10-11', '4:45:58', '2022-10-11', '05:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `interchanges`
--

CREATE TABLE `interchanges` (
  `id` int(20) NOT NULL,
  `inter_name` varchar(50) NOT NULL,
  `router_name` varchar(50) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interchanges`
--

INSERT INTO `interchanges` (`id`, `inter_name`, `router_name`, `latitude`, `longitude`) VALUES
(1, 'Kadawatha', 'E3', 7.001094, 79.961422),
(2, 'Kerawalapitiya', 'E3', 7.014893, 79.889818),
(4, 'Gelanigama', 'E1', 6.71873, 79.998803),
(5, 'Kahathuduwa', 'E1', 6.783141, 79.979943),
(7, 'Imaduwa', 'E1', 6.034743, 80.365211),
(8, 'Kaduwela', 'E1', 6.934343, 79.97143),
(9, 'Peliyagoda', 'E3', 6.96865, 79.893411),
(10, 'Athurugiriya', 'E1', 6.883119, 79.977902),
(11, 'Kottawa', 'E1', 6.840368, 79.980607),
(12, 'Dodangoda', 'E1', 6.542228, 80.043292),
(13, 'Walipenna', 'E1', 6.542228, 80.043292),
(14, 'Kurudugahahetekma', 'E1', 6.271531, 80.13929),
(15, 'Baddegama', 'E1', 6.180274, 80.194184),
(16, 'Pinnaduwa', 'E1', 6.069751, 80.263809);

-- --------------------------------------------------------

--
-- Table structure for table `manager_details`
--

CREATE TABLE `manager_details` (
  `id` int(10) NOT NULL,
  `manager_id` varchar(20) NOT NULL,
  `manager_name` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `entrance` varchar(20) NOT NULL,
  `contact` int(11) NOT NULL,
  `address` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager_details`
--

INSERT INTO `manager_details` (`id`, `manager_id`, `manager_name`, `username`, `password`, `entrance`, `contact`, `address`, `email`, `latitude`, `longitude`) VALUES
(2, 'MANAGER - 1', 'Kasun', 'Kasun12', '25f9e794323b453885f5181f1b624d0b', 'Kadawatha', 715986552, 'pallewela.', 'kasun@gmail.com', '1', '2'),
(26, 'MANAGER - 2', 'Shanuka', 'Shanuka@', '25f9e794323b453885f5181f1b624d0b', 'Gelanigama', 714535855, 'No 22/A, Kuruduwatht', 'shanuka.nadee2021gmail.com', '1', '1'),
(27, 'MANAGER - 3', 'saduni', 'saduni@123', '25f9e794323b453885f5181f1b624d0b', 'Kahathuduwa', 715632544, '32/A, Bemmulla, gamp', 'sanduni123@gmail.com', '', ''),
(28, 'MANAGER - 4', 'shanu', 'Shanuka12', '25f9e794323b453885f5181f1b624d0b', 'Kadawatha', 715621241, '4/60,somahimimawatha', 'shanuka.nadee2020@gmail.com', '', ''),
(30, 'MANAGER - 7', 'shanu', 'Shanuka12', '25f9e794323b453885f5181f1b624d0b', 'Kadawatha', 715621241, '4/60,somahimimawatha', 'shanuka.nadeeshan2014@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `price_list`
--

CREATE TABLE `price_list` (
  `id` int(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `entrance` varchar(20) NOT NULL,
  `ex` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price_list`
--

INSERT INTO `price_list` (`id`, `price`, `entrance`, `ex`) VALUES
(1, '300', 'Kadawatha', 'Kerawalapitiya'),
(9, '250', 'Kadawatha', 'Gelanigama'),
(16, '250', 'Kadawatha', 'Kahathuduwa'),
(17, '350', 'Kadawatha', 'Imaduwa'),
(18, '450', 'Kadawatha', 'Kaduwela');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `f_name` varchar(100) DEFAULT 'none',
  `l_name` varchar(50) NOT NULL,
  `account` int(50) NOT NULL,
  `nic` varchar(100) NOT NULL,
  `tel_no` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `v_number` varchar(50) NOT NULL,
  `v_type` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `licen_number` varchar(50) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `account`, `nic`, `tel_no`, `gender`, `address`, `email`, `v_number`, `v_type`, `province`, `licen_number`, `u_name`, `password`, `token`) VALUES
(1, 'perepa', 'kalum', 2150, '905682485V', 758958622, 'male', '38/A,kubaloluwa,gampaha', 'test1@gmail.com', 'ABC-2020', 'car', 'western', 'B357808', 'shanuka', '202cb962ac59075b964b07152d234b70', 'db36d2e73652f8cd871c183ddef5e12a'),
(2, 'dasun', 'darshana', 1500, '982602584V', 758425322, 'male', '20/A, koslanda,colombo', 'test2@gmail.com', 'CD-2052', 'car', 'western', '154851', 'shanuka', '202cb962ac59075b964b07152d234b70', 'eb29be6f5345473ac4d24ab5151a4a11'),
(53, 'Sanju', 'Balasuriya', 700, '932689574V', 718596325, 'male', '1/B, gampola', 'test3@gmail.com', 'PH-2025', 'car', 'west', 'B1485725', 'sanju', '202cb962ac59075b964b07152d234b70', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(5) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `vehicle_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `nic`, `vehicle_no`) VALUES
(2, '905682485V', 'BAE-2222'),
(3, '982602584V', 'BDV-7766');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entrance`
--
ALTER TABLE `entrance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interchanges`
--
ALTER TABLE `interchanges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager_details`
--
ALTER TABLE `manager_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `entrance`
--
ALTER TABLE `entrance`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `interchanges`
--
ALTER TABLE `interchanges`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `manager_details`
--
ALTER TABLE `manager_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `price_list`
--
ALTER TABLE `price_list`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
