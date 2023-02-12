-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 06:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fur-kanlungan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`) VALUES
(1, 'admin', '123'),
(2, 'nimda', '321');

-- --------------------------------------------------------

--
-- Stand-in structure for view `birthyear_report`
-- (See below for the actual view)
--
CREATE TABLE `birthyear_report` (
`petID` int(100)
,`name` varchar(255)
,`age` int(100)
,`muni_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `breed_category`
--

CREATE TABLE `breed_category` (
  `bcID` int(100) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `pcID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breed_category`
--

INSERT INTO `breed_category` (`bcID`, `breed`, `pcID`) VALUES
(1, 'aspin', 1),
(2, 'persian cat', 2),
(3, 'german shepherd', 1),
(4, 'puspin', 2),
(5, 'campbells russian hamster', 3),
(6, 'golden hamster', 3);

-- --------------------------------------------------------

--
-- Table structure for table `chat_log`
--

CREATE TABLE `chat_log` (
  `cLID` int(100) NOT NULL,
  `sender` int(100) NOT NULL,
  `reciever` int(100) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_log`
--

INSERT INTO `chat_log` (`cLID`, `sender`, `reciever`, `message`, `photo`, `date_time`) VALUES
(1, 2, 3, 'Hi', NULL, '2023-02-01 01:09:18'),
(2, 3, 2, 'Hello', NULL, '2023-02-01 01:09:28'),
(3, 2, 3, 'Pwede Po ba iadopt ung pet nio na si Ben?', NULL, '2023-02-01 01:09:53'),
(4, 3, 2, 'Sige po', NULL, '2023-02-01 01:10:04'),
(5, 3, 2, 'assad', NULL, '2023-02-01 01:19:04'),
(6, 3, 2, 'dsf', NULL, '2023-02-01 01:19:05'),
(7, 3, 2, 'fg', NULL, '2023-02-01 01:19:05'),
(8, 3, 2, 'df', NULL, '2023-02-01 01:19:05'),
(9, 3, 2, 'sdf', NULL, '2023-02-01 01:19:06'),
(10, 3, 2, 'sdf', NULL, '2023-02-01 01:19:07'),
(11, 3, 2, 'sdf', NULL, '2023-02-01 01:19:15'),
(12, 3, 2, 'sdfjsdfijgs', NULL, '2023-02-01 01:19:18'),
(13, 3, 2, 'sdf', NULL, '2023-02-01 01:19:19'),
(14, 3, 2, 'sdf', NULL, '2023-02-01 01:19:24'),
(15, 3, 2, 'daryll troy', NULL, '2023-02-01 01:19:39'),
(16, 3, 2, 'pfg', NULL, '2023-02-01 01:19:48'),
(17, 3, 2, 'hi', NULL, '2023-02-01 01:46:50'),
(18, 3, 2, 'ehelaldlad', NULL, '2023-02-01 01:47:02'),
(19, 3, 2, 'yo', NULL, '2023-02-01 02:09:30'),
(20, 3, 2, 'bulog', NULL, '2023-02-01 02:11:45'),
(21, 3, 2, 'bea', NULL, '2023-02-01 02:17:07'),
(22, 3, 2, 'haha', NULL, '2023-02-01 02:17:16'),
(23, 3, 2, 'bakit', NULL, '2023-02-01 02:17:52'),
(24, 2, 3, 'ewan ko', NULL, '2023-02-01 02:18:04'),
(25, 3, 2, 'why\'', NULL, '2023-02-01 02:21:31'),
(26, 3, 2, 'hey', NULL, '2023-02-01 02:22:28'),
(27, 3, 2, 'Hey', NULL, '2023-02-01 02:23:12'),
(28, 3, 2, 'When', NULL, '2023-02-01 02:23:21'),
(29, 3, 2, 'what\'s up', NULL, '2023-02-01 02:23:44'),
(30, 3, 2, 'hallo', NULL, '2023-02-01 02:23:58'),
(31, 3, 2, '5 seconds', NULL, '2023-02-01 02:24:10'),
(32, 3, 2, 'why mabilis', NULL, '2023-02-01 02:25:21'),
(33, 3, 2, 'hahaha', NULL, '2023-02-01 02:25:33'),
(34, 3, 2, 'hey', NULL, '2023-02-01 02:25:46'),
(35, 2, 3, 'why are you talking to me', NULL, '2023-02-01 02:26:53'),
(36, 2, 3, 'huh?', NULL, '2023-02-01 02:27:05'),
(37, 3, 2, 'hy', NULL, '2023-02-01 02:46:48'),
(38, 3, 2, 'WHen', NULL, '2023-02-01 02:46:53'),
(39, 2, 3, 'hey', NULL, '2023-02-01 02:49:06'),
(40, 2, 3, 'why are you still awake?', NULL, '2023-02-01 02:49:16'),
(41, 3, 2, 'o because i am awake ano pake mo?', NULL, '2023-02-01 02:49:30'),
(42, 3, 2, 'okay', NULL, '2023-02-01 02:57:52'),
(43, 3, 2, 'why', NULL, '2023-02-01 02:58:29'),
(44, 3, 2, 'hey', NULL, '2023-02-01 03:01:20'),
(45, 3, 3, 'yo', NULL, '2023-02-01 03:01:40'),
(46, 3, 3, 'hey', NULL, '2023-02-01 03:01:52'),
(47, 3, 3, 'why', NULL, '2023-02-01 03:01:56'),
(48, 3, 2, 'uyo', NULL, '2023-02-01 03:02:07'),
(49, 3, 2, 'hi', NULL, '2023-02-01 03:10:59'),
(50, 3, 2, 'why', NULL, '2023-02-01 03:11:02'),
(51, 3, 2, 'why', NULL, '2023-02-01 03:11:30'),
(52, 3, 2, 'hehe', NULL, '2023-02-01 03:11:32'),
(53, 3, 2, 'when', NULL, '2023-02-01 03:11:58'),
(54, 3, 2, 'hi', NULL, '2023-02-01 03:20:07'),
(55, 3, 2, 'Why???', NULL, '2023-02-01 03:20:17'),
(56, 3, 2, 'wow', NULL, '2023-02-01 03:20:53'),
(57, 3, 2, 'why', NULL, '2023-02-01 03:28:19'),
(58, 3, 2, 'stop', NULL, '2023-02-01 03:29:21'),
(59, 3, 2, 'hi', NULL, '2023-02-01 03:30:58'),
(60, 3, 2, 'why', NULL, '2023-02-01 03:31:10'),
(61, 3, 2, 'do not', NULL, '2023-02-01 03:31:17'),
(62, 3, 2, 'Hey man', NULL, '2023-02-01 03:33:01'),
(63, 2, 3, 'What?', NULL, '2023-02-01 03:33:08'),
(64, 2, 3, 'Why are you not talking to me?', NULL, '2023-02-01 03:33:15'),
(65, 3, 2, 'Because i just don\'t want to\nMind your own business', NULL, '2023-02-01 03:33:41'),
(66, 3, 2, 'hahahaha', NULL, '2023-02-01 03:33:47'),
(67, 3, 2, 'haha', NULL, '2023-02-01 03:35:26'),
(68, 2, 3, 'what?', NULL, '2023-02-01 03:35:34'),
(69, 3, 2, 'haha', NULL, '2023-02-01 03:36:10'),
(70, 3, 2, 'am i right?', NULL, '2023-02-01 03:37:15'),
(71, 3, 2, 'huh?', NULL, '2023-02-01 03:37:25'),
(72, 3, 2, 'why?', NULL, '2023-02-01 03:37:31'),
(73, 3, 2, 'so?', NULL, '2023-02-01 03:37:51'),
(74, 3, 2, 'huh?', NULL, '2023-02-01 03:38:51'),
(75, 3, 2, 'why?', NULL, '2023-02-01 03:38:55'),
(76, 3, 2, 'hey', NULL, '2023-02-01 03:39:08'),
(77, 3, 2, 'hello', NULL, '2023-02-01 03:39:26'),
(78, 3, 2, 'ha', NULL, '2023-02-01 03:39:37'),
(79, 2, 3, 'I don\'t know what you are talking about bruh', NULL, '2023-02-01 03:39:50'),
(80, 3, 2, 'hi', NULL, '2023-02-01 03:45:49'),
(81, 3, 2, 'when are you going to stop it', NULL, '2023-02-01 03:46:03'),
(82, 3, 2, 'hehe', NULL, '2023-02-01 03:46:30'),
(83, 3, 2, 'so fast', NULL, '2023-02-01 03:46:38'),
(84, 3, 2, 'not so fast', NULL, '2023-02-01 03:46:49'),
(85, 3, 2, 'old as fu', NULL, '2023-02-01 03:47:00'),
(86, 3, 2, 'hala', NULL, '2023-02-01 03:49:54'),
(87, 3, 2, 'hay', NULL, '2023-02-01 03:50:32'),
(88, 2, 3, 'huh?', NULL, '2023-02-01 03:53:04'),
(89, 3, 2, 'why?', NULL, '2023-02-01 03:53:11'),
(90, 2, 3, 'why', NULL, '2023-02-01 03:53:47'),
(91, 3, 2, 'i dont know', NULL, '2023-02-01 03:57:48'),
(92, 2, 3, 'I don\'t know too', NULL, '2023-02-01 03:58:24'),
(93, 2, 3, 'Hello There', NULL, '2023-02-01 04:01:30'),
(94, 3, 2, 'What is the problem?', NULL, '2023-02-01 04:01:37'),
(95, 2, 3, 'I dont know you tell me', NULL, '2023-02-01 04:01:45'),
(96, 3, 2, 'Huh? what are tou saying', NULL, '2023-02-01 04:01:58'),
(97, 2, 3, 'Hey man i know what you did!', NULL, '2023-02-01 04:02:13'),
(98, 3, 2, 'I don\'t quite follow my young padawab\nis it because you are not the chose \nONE!!!!', NULL, '2023-02-01 04:02:37'),
(99, 2, 3, 'I dont know tooo', NULL, '2023-02-01 04:02:44'),
(100, 2, 3, 'Hyhe', NULL, '2023-02-01 04:03:41'),
(101, 3, 2, 'Goodnight', NULL, '2023-02-01 04:03:45'),
(102, 3, 2, 'Lol', NULL, '2023-02-01 04:03:55'),
(103, 2, 3, 'Huh???', NULL, '2023-02-01 04:03:59'),
(104, 2, 3, 'k', NULL, '2023-02-01 04:04:09'),
(105, 2, 3, 'k', NULL, '2023-02-01 04:04:09'),
(106, 2, 3, 'k', NULL, '2023-02-01 04:04:09'),
(107, 2, 3, 'k', NULL, '2023-02-01 04:04:09'),
(108, 2, 3, 'k', NULL, '2023-02-01 04:04:09'),
(109, 2, 3, 'k', NULL, '2023-02-01 04:04:10'),
(110, 2, 3, 'k', NULL, '2023-02-01 04:04:10'),
(111, 2, 3, 'k', NULL, '2023-02-01 04:04:10'),
(112, 2, 3, 'k', NULL, '2023-02-01 04:04:10'),
(113, 2, 3, 'k', NULL, '2023-02-01 04:04:11'),
(114, 2, 3, 'k', NULL, '2023-02-01 04:04:11'),
(115, 2, 3, 'Hello Lods', NULL, '2023-02-01 04:04:46'),
(116, 3, 2, 'Hello', NULL, '2023-02-01 04:04:50'),
(117, 2, 3, 'Ampunin ko na tuta mo', NULL, '2023-02-01 04:04:57'),
(118, 3, 2, 'Ngekngek mo\nAyaw ibigay ni kenneth eh', NULL, '2023-02-01 04:05:08'),
(119, 2, 3, 'Sino ba si kenneth ? HMmmmmm!!', NULL, '2023-02-01 04:05:16'),
(120, 3, 2, 'Yung kapit bahay hehehehe', NULL, '2023-02-01 04:05:25'),
(121, 2, 3, 'Bakit ikaw nagpapa ampon?', NULL, '2023-02-01 04:05:34'),
(122, 3, 2, 'Huh? Akin naman yon', NULL, '2023-02-01 04:05:44'),
(123, 2, 3, 'Weh', NULL, '2023-02-01 04:05:48'),
(124, 2, 3, 'Hala', NULL, '2023-02-01 04:06:50'),
(125, 3, 2, 'Bobo', NULL, '2023-02-01 04:06:53'),
(126, 3, 2, 'Hey nigga', NULL, '2023-02-01 04:10:13'),
(127, 2, 3, 'What up homie?', NULL, '2023-02-01 04:10:26'),
(128, 3, 2, 'are u G?', NULL, '2023-02-01 04:10:36'),
(129, 2, 3, 'saan?', NULL, '2023-02-01 04:10:41'),
(130, 3, 2, 'Sleep', NULL, '2023-02-01 04:10:44'),
(131, 3, 2, 'hehe tama', NULL, '2023-02-01 04:11:21'),
(132, 3, 5, 'Yo', NULL, '2023-02-01 04:11:29'),
(133, 7, 3, 'hi', NULL, '2023-02-01 05:26:47'),
(134, 7, 1, 'YO wanawan', NULL, '2023-02-01 05:27:13'),
(135, 3, 7, 'Helo', NULL, '2023-02-01 05:32:40'),
(136, 7, 3, 'Bakit\'', NULL, '2023-02-01 05:32:47'),
(137, 3, 7, 'Wala lng', NULL, '2023-02-01 05:32:59'),
(138, 3, 7, 'Hello', NULL, '2023-02-01 05:33:10'),
(139, 7, 3, 'Yo', NULL, '2023-02-01 05:33:15'),
(140, 3, 7, 'Bakit', NULL, '2023-02-01 05:33:21'),
(141, 7, 3, 'Heyy', NULL, '2023-02-01 05:33:24'),
(142, 7, 3, 'hahaha', NULL, '2023-02-01 05:33:29'),
(143, 7, 1, 'Hi', NULL, '2023-02-01 05:35:34'),
(144, 7, 1, 'Hi', NULL, '2023-02-01 05:35:50'),
(145, 7, 1, 'Why', NULL, '2023-02-01 05:35:58'),
(146, 7, 1, 'What\'s Up', NULL, '2023-02-01 05:36:12'),
(147, 3, 7, 'Hey man', NULL, '2023-02-01 05:37:48'),
(148, 3, 7, 'Oh what up', NULL, '2023-02-01 05:38:07'),
(149, 7, 3, 'Uhm Nothing', NULL, '2023-02-01 05:38:14'),
(150, 7, 3, 'Hahahaha', NULL, '2023-02-01 05:38:19'),
(151, 3, 7, 'Hey', NULL, '2023-02-01 05:38:22'),
(152, 7, 3, 'Hahahaha', NULL, '2023-02-01 05:38:31'),
(153, 3, 7, 'hahahaha', NULL, '2023-02-01 05:38:35'),
(154, 7, 3, 'sup', NULL, '2023-02-01 05:38:40'),
(155, 7, 3, 'Hey man', NULL, '2023-02-01 05:40:10'),
(156, 7, 3, 'hahahaha', NULL, '2023-02-01 05:42:11'),
(157, 3, 7, 'why', NULL, '2023-02-01 05:42:38'),
(158, 3, 7, 'hehehe', NULL, '2023-02-01 05:43:16'),
(159, 3, 7, 'Musta', NULL, '2023-02-01 06:02:23'),
(160, 7, 3, 'Fine', NULL, '2023-02-01 06:02:29'),
(161, 3, 7, 'hi', NULL, '2023-02-01 06:18:31'),
(162, 7, 3, 'tae k', NULL, '2023-02-01 06:18:44'),
(163, 3, 7, 'Hey', NULL, '2023-02-01 07:13:43'),
(164, 3, 5, 'What up man', NULL, '2023-02-01 07:37:38'),
(165, 3, 5, 'Hey', NULL, '2023-02-01 09:46:33'),
(166, 3, 5, 'What is up dud', NULL, '2023-02-01 09:46:39'),
(167, 3, 5, 'Hey Wassup', NULL, '2023-02-01 10:53:35'),
(168, 3, 2, 'Hey Man', NULL, '2023-02-01 10:53:52'),
(169, 2, 3, 'Ops!', NULL, '2023-02-01 10:54:07'),
(170, 2, 3, 'NO man', NULL, '2023-02-01 11:57:06'),
(171, 2, 3, 'Hell No', NULL, '2023-02-01 11:57:15'),
(172, 3, 1, 'Hello', NULL, '2023-02-01 13:12:34'),
(173, 3, 1, 'How Are you', NULL, '2023-02-01 13:12:39'),
(174, 1, 3, 'Hi man', NULL, '2023-02-01 13:13:10'),
(175, 3, 1, 'Hello', NULL, '2023-02-01 16:35:14'),
(176, 3, 1, 'How r u', NULL, '2023-02-01 16:35:18'),
(177, 3, 1, 'It is a fine sunny day', NULL, '2023-02-01 16:35:46'),
(178, 3, 1, 'Hehehehe', NULL, '2023-02-01 16:40:25'),
(179, 3, 2, 'Hi there', NULL, '2023-02-01 18:47:41'),
(180, 3, 2, 'What are you up to?', NULL, '2023-02-01 18:47:57'),
(181, 3, 5, 'Good Evening', NULL, '2023-02-01 18:55:22'),
(182, 3, 2, 'Low man', NULL, '2023-02-01 20:11:53'),
(183, 3, 5, 'Hallo', NULL, '2023-02-01 20:18:03'),
(184, 3, 1, 'Hello', NULL, '2023-02-01 21:41:33'),
(185, 3, 1, 'hewllo', NULL, '2023-02-01 22:26:14'),
(186, 3, 5, 'Hi', NULL, '2023-02-01 22:28:37'),
(187, 3, 5, 'Hello', NULL, '2023-02-02 09:16:32'),
(188, 3, 2, 'hello', NULL, '2023-02-02 11:50:01'),
(189, 3, 7, 'Hello', NULL, '2023-02-02 11:52:08'),
(190, 3, 1, 'Hello', NULL, '2023-02-02 15:52:02'),
(191, 10, 3, 'hello', NULL, '2023-02-02 15:55:07'),
(192, 10, 1, 'Hello', NULL, '2023-02-02 15:57:08'),
(193, 10, 1, 'hey', NULL, '2023-02-02 15:57:41'),
(194, 3, 10, 'hello\'', NULL, '2023-02-02 15:58:00'),
(195, 10, 1, 'hello', NULL, '2023-02-02 15:58:37'),
(196, 10, 1, 'hi', NULL, '2023-02-02 15:58:57'),
(197, 3, 10, 'hello', NULL, '2023-02-02 15:59:17'),
(198, 10, 1, 'hi aiosdhiasofhioadsfnas', NULL, '2023-02-02 15:59:39'),
(199, 10, 1, 'hello', NULL, '2023-02-02 16:00:13'),
(200, 3, 10, 'hello', NULL, '2023-02-02 16:00:18'),
(201, 3, 10, 'bakit', NULL, '2023-02-02 16:00:22'),
(202, 10, 3, 'baoninam', NULL, '2023-02-02 16:00:48'),
(203, 10, 3, 'tanga ka', NULL, '2023-02-02 16:01:02'),
(204, 3, 2, 'iasjidjsid', NULL, '2023-02-02 16:06:03'),
(205, 3, 10, 'ahdhasd', NULL, '2023-02-02 16:06:28'),
(206, 10, 3, 'uhesoifjsodf', NULL, '2023-02-02 16:06:46'),
(207, 3, 7, 'huy', NULL, '2023-02-03 21:29:03'),
(208, 3, 5, 'uhm', NULL, '2023-02-03 21:57:51'),
(209, 3, 1, 'ui taba', NULL, '2023-02-03 23:57:42'),
(210, 3, 1, 'bakit\nka pa nandiyan ah?\nAtot ka hahahaha', NULL, '2023-02-03 23:57:53'),
(211, 3, 1, 'hahahaha', NULL, '2023-02-03 23:57:56'),
(212, 3, 1, 'Anong sinabi\nsiduahsd\naksdhaisd\naksdhsd', NULL, '2023-02-03 23:58:05'),
(213, 10, 2, 'Hello', NULL, '2023-02-04 00:27:09'),
(214, 3, 5, 'gey', NULL, '2023-02-04 20:27:04'),
(215, 3, 10, 'wassup', NULL, '2023-02-04 20:28:23'),
(216, 3, 10, 'hahaha why', NULL, '2023-02-04 20:28:31'),
(217, 10, 1, 'my friend', NULL, '2023-02-05 17:22:18'),
(218, 10, 3, 'nothing much', NULL, '2023-02-05 17:25:30'),
(219, 10, 3, 'HI', NULL, '2023-02-09 22:33:38'),
(220, 10, 3, 'Hello', NULL, '2023-02-09 22:33:46'),
(221, 3, 10, 'Bakit', NULL, '2023-02-09 22:33:50'),
(222, 3, 7, 'HAHAHAH\nWHAT are you up to?', NULL, '2023-02-12 13:03:52'),
(223, 3, 5, 'Hello', NULL, '2023-02-12 13:25:42'),
(224, 3, 1, 'hey', NULL, '2023-02-12 13:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `clinicID` int(100) NOT NULL,
  `clinic_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `muniID` int(100) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `open_hours` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`clinicID`, `clinic_name`, `email`, `muniID`, `owner`, `contact_no`, `open_hours`, `services`, `description`, `date_time`) VALUES
(8, 'jhj', 'ghfghf', 1, 'fghd', 'dfgd', 'fghf', 'fghf', 'fghf', '2023-01-16 22:54:12'),
(9, 'k', 'k', 1, 'k', 'k', 'k', 'beauty queen of only eighteen, she had some trouble with herself\r\nhe was always there to help her, she always belonged to someone else\r\ni drove for miles and miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don', 'beauty queen of only eighteen, she had some trouble with herself\r\nhe was always there to help her, she always belonged to someone else\r\ni drove for miles and miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want, yeah\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\ni know where you hide, alone in your car\r\nknow all of the things that make you who you are\r\ni know that goodbye means nothing at all\r\ncomes back and begs me to catch her every time she falls, yeah\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain, oh\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nyeah, yeah\r\ni don&#039;t mind spending every day (ooh, ooh)\r\nout on your corner in the pouring rain\r\n(please don&#039;t try so hard to say goodbye)', '2023-01-17 00:26:32'),
(12, 'mima', 'dfgd', 1, 'dfgdfgdfg', 'dfgdfg', 'ghfgh', 'dfgdf', 'sdfs', '2023-01-17 01:33:28'),
(13, 'po', 'ui', 20, 'po', 'po', 'po', 'po', 'po', '2023-01-17 08:13:37'),
(14, 'yoyo', 'sdf', 18, 'gfgh', 'dfghj', 'hjh', 'hgjjbeauty queen of only eighteen, she had some trouble with herself\r\nhe was always there to help her, she always belonged to someone else\r\ni drove for miles and miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni', 'fdgsdfd', '2023-01-17 08:21:24'),
(16, 'haha', 'haha', 1, 'haha', 'haha', 'haha', 'dfgdfg\r\nbeauty queen of only eighteen, she had some trouble with herself\r\nhe was always there to help her, she always belonged to someone else\r\ni drove for miles and miles, and wound up at your door\r\nsafaoisfasfa', 'dfgdfg\r\nbeauty queen of only eighteen, she had some trouble with herself\r\nhe was always there to help her, she always belonged to someone else\r\ni drove for miles and miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want, yeah\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\ni know where you hide, alone in your car\r\nknow all of the things that make you who you are\r\ni know that goodbye means nothing at all\r\ncomes back and begs me to catch her every time she falls, yeah\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain, oh\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nyeah, yeah\r\ni don&#039;t mind spending every day (ooh, ooh)\r\nout on your corner in the pouring rain\r\n(please don&#039;t try so hard to say goodbye)', '2023-01-17 08:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_photo`
--

CREATE TABLE `clinic_photo` (
  `clinicphoID` int(100) NOT NULL,
  `clinicID` int(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic_photo`
--

INSERT INTO `clinic_photo` (`clinicphoID`, `clinicID`, `photo`, `date_time`) VALUES
(13, 8, 'Khaomanee_cat.jpg', '2023-01-16 22:54:12'),
(14, 8, 'pexels-pixabay-45201.jpg', '2023-01-16 22:54:12'),
(15, 9, 'hamster2.jpg', '2023-01-17 00:26:32'),
(16, 9, 'hehe.jpeg', '2023-01-17 00:26:32'),
(17, 9, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 00:26:32'),
(18, 9, 'jorji1.jpg', '2023-01-17 00:26:32'),
(19, 9, 'Khaomanee_cat.jpg', '2023-01-17 00:26:32'),
(20, 9, 'samantha.jpg', '2023-01-17 00:26:32'),
(21, 9, 'stix.jpg', '2023-01-17 00:26:32'),
(22, 9, 'stix2.jpg', '2023-01-17 00:26:32'),
(23, 9, 'stix3.jpg', '2023-01-17 00:26:32'),
(24, 9, 'Brown_Aspin.jpg', '2023-01-17 00:36:58'),
(25, 9, 'Campbells_dwarf.jpg', '2023-01-17 00:36:58'),
(26, 9, 'germanshepherd.jpg', '2023-01-17 00:36:58'),
(27, 9, 'hamster1.jpg', '2023-01-17 00:36:58'),
(28, 9, 'hamster2.jpg', '2023-01-17 00:36:58'),
(29, 9, 'hehe.jpeg', '2023-01-17 00:36:58'),
(30, 9, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 00:36:58'),
(31, 9, 'jorji1.jpg', '2023-01-17 00:36:58'),
(32, 9, 'Khaomanee_cat.jpg', '2023-01-17 00:36:58'),
(33, 9, 'pexels-pixabay-45201.jpg', '2023-01-17 00:36:58'),
(34, 9, 'puspin2.jpg', '2023-01-17 00:36:58'),
(35, 9, 'Brown_Aspin.jpg', '2023-01-17 00:37:12'),
(36, 9, 'Campbells_dwarf.jpg', '2023-01-17 00:37:12'),
(37, 9, 'germanshepherd.jpg', '2023-01-17 00:37:12'),
(38, 9, 'hamster1.jpg', '2023-01-17 00:37:12'),
(39, 9, 'hamster2.jpg', '2023-01-17 00:37:12'),
(40, 9, 'hehe.jpeg', '2023-01-17 00:37:12'),
(41, 9, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 00:37:12'),
(42, 9, 'jorji1.jpg', '2023-01-17 00:37:12'),
(43, 9, 'Khaomanee_cat.jpg', '2023-01-17 00:37:12'),
(44, 9, 'pexels-pixabay-45201.jpg', '2023-01-17 00:37:12'),
(45, 9, 'puspin2.jpg', '2023-01-17 00:37:12'),
(46, 9, 'samantha.jpg', '2023-01-17 00:37:12'),
(47, 9, 'stix.jpg', '2023-01-17 00:37:13'),
(48, 9, 'stix2.jpg', '2023-01-17 00:37:13'),
(49, 9, 'stix3.jpg', '2023-01-17 00:37:13'),
(50, 8, 'Campbells_dwarf.jpg', '2023-01-17 01:24:11'),
(51, 8, 'germanshepherd.jpg', '2023-01-17 01:24:11'),
(52, 8, 'hamster1.jpg', '2023-01-17 01:24:11'),
(53, 8, 'hamster2.jpg', '2023-01-17 01:24:11'),
(54, 8, 'hehe.jpeg', '2023-01-17 01:24:11'),
(55, 8, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 01:24:11'),
(56, 8, 'jorji1.jpg', '2023-01-17 01:24:11'),
(57, 8, 'Khaomanee_cat.jpg', '2023-01-17 01:24:11'),
(58, 8, 'pexels-pixabay-45201.jpg', '2023-01-17 01:24:11'),
(59, 8, 'puspin2.jpg', '2023-01-17 01:24:11'),
(60, 8, 'samantha.jpg', '2023-01-17 01:24:11'),
(61, 8, 'stix.jpg', '2023-01-17 01:24:11'),
(62, 8, 'stix2.jpg', '2023-01-17 01:24:11'),
(63, 8, 'stix3.jpg', '2023-01-17 01:24:11'),
(79, 12, 'stix2.jpg', '2023-01-17 01:33:28'),
(80, 12, 'stix3.jpg', '2023-01-17 01:33:28'),
(81, 12, 'pexels-pixabay-45201.jpg', '2023-01-17 01:43:32'),
(82, 12, 'puspin2.jpg', '2023-01-17 01:43:32'),
(83, 12, 'samantha.jpg', '2023-01-17 01:43:32'),
(84, 12, 'stix.jpg', '2023-01-17 01:43:32'),
(85, 12, 'stix2.jpg', '2023-01-17 01:43:32'),
(86, 12, 'stix3.jpg', '2023-01-17 01:43:32'),
(87, 12, 'Brown_Aspin.jpg', '2023-01-17 01:44:08'),
(88, 12, 'Campbells_dwarf.jpg', '2023-01-17 01:44:08'),
(89, 12, 'germanshepherd.jpg', '2023-01-17 01:44:08'),
(90, 12, 'hamster1.jpg', '2023-01-17 01:44:08'),
(91, 12, 'hamster2.jpg', '2023-01-17 01:44:08'),
(92, 12, 'hehe.jpeg', '2023-01-17 01:44:08'),
(93, 12, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 01:44:08'),
(94, 12, 'jorji1.jpg', '2023-01-17 01:44:08'),
(95, 12, 'Khaomanee_cat.jpg', '2023-01-17 01:44:08'),
(96, 12, 'pexels-pixabay-45201.jpg', '2023-01-17 01:44:08'),
(97, 12, 'puspin2.jpg', '2023-01-17 01:44:08'),
(98, 12, 'samantha.jpg', '2023-01-17 01:44:08'),
(99, 12, 'stix.jpg', '2023-01-17 01:44:08'),
(100, 12, 'stix2.jpg', '2023-01-17 01:44:08'),
(101, 12, 'stix3.jpg', '2023-01-17 01:44:08'),
(102, 12, 'Brown_Aspin.jpg', '2023-01-17 01:44:50'),
(103, 12, 'Campbells_dwarf.jpg', '2023-01-17 01:44:50'),
(104, 12, 'germanshepherd.jpg', '2023-01-17 01:44:50'),
(105, 12, 'hamster1.jpg', '2023-01-17 01:44:50'),
(106, 12, 'hamster2.jpg', '2023-01-17 01:44:50'),
(107, 12, 'hehe.jpeg', '2023-01-17 01:44:50'),
(108, 12, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 01:44:50'),
(109, 12, 'jorji1.jpg', '2023-01-17 01:44:50'),
(110, 12, 'Khaomanee_cat.jpg', '2023-01-17 01:44:50'),
(111, 12, 'pexels-pixabay-45201.jpg', '2023-01-17 01:44:50'),
(112, 12, 'puspin2.jpg', '2023-01-17 01:44:50'),
(113, 12, 'samantha.jpg', '2023-01-17 01:44:50'),
(114, 12, 'stix.jpg', '2023-01-17 01:44:50'),
(115, 12, 'stix2.jpg', '2023-01-17 01:44:50'),
(116, 12, 'stix3.jpg', '2023-01-17 01:44:50'),
(117, 13, 'stix.jpg', '2023-01-17 08:13:37'),
(118, 13, 'stix2.jpg', '2023-01-17 08:13:37'),
(119, 13, 'stix3.jpg', '2023-01-17 08:13:37'),
(125, 16, 'samantha.jpg', '2023-01-17 08:48:00'),
(126, 16, 'stix.jpg', '2023-01-17 08:48:00'),
(127, 16, 'stix2.jpg', '2023-01-17 08:48:00'),
(128, 16, 'stix3.jpg', '2023-01-17 08:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `deledopted`
--

CREATE TABLE `deledopted` (
  `petID` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(100) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `vaccinated` varchar(255) DEFAULT NULL,
  `description` varchar(2555) NOT NULL,
  `pcID` int(100) NOT NULL,
  `bcID` int(100) NOT NULL,
  `userID` int(100) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deledopted`
--

INSERT INTO `deledopted` (`petID`, `name`, `age`, `sex`, `vaccinated`, `description`, `pcID`, `bcID`, `userID`, `date_time`) VALUES
(3, 'pusa na puti', 2020, 'female', 'no', 'pusa na puti', 2, 2, 3, '0000-00-00 00:00:00'),
(4, 'ben', 2020, 'male', 'no', 'Ako si BEn 10 na mag pagka pusa', 1, 3, 3, '2023-01-15 16:08:28'),
(5, 'tom', 2006, 'male', 'no', 'Ako si tommy   heinsen', 2, 4, 3, '2023-01-15 16:23:06'),
(6, 'j', 2009, 'male', 'yes', 'ertertertert', 2, 2, 3, '2023-01-15 17:05:52'),
(7, 'jkljk', 2009, 'male', 'yes', 'dfgdhgh', 2, 4, 3, '2023-01-15 17:19:25'),
(8, 'jejas', 2009, 'male', 'no', 'ergdfgdfgdf', 1, 1, 3, '2023-01-15 17:20:56'),
(9, 'tang', 2008, 'female', 'yes', 'fhdfh', 2, 4, 3, '2023-01-15 17:34:45'),
(10, 'manypic', 2021, 'male', 'yes', 'Why do stars fall down from the sky?', 3, 6, 3, '2023-01-15 18:09:09'),
(11, 'sdfdsf', 2009, 'male', 'yes', 'dfgdsdsfasdfsada', 1, 1, 3, '2023-01-15 21:33:01'),
(12, 'ghdfgd', 2009, 'female', 'yes', 'dgfhgjdgfdgf', 3, 6, 3, '2023-01-15 22:02:32'),
(13, 'xcvdfbfgn', 2020, 'male', 'no', 'ukhjjgfhfgh', 1, 3, 3, '2023-01-15 22:03:51'),
(15, 'mino', 2016, 'male', 'yes', 'Ako si Mino', 1, 3, 3, '2023-01-26 22:04:19'),
(18, 'husky', 2019, 'male', 'no', 'Ako si awaw aking', 1, 1, 6, '2023-01-28 22:53:38'),
(20, 'anna', 2020, 'female', 'yes', 'Here I am, Playing with those memories again', 3, 6, 3, '2023-02-01 16:39:06'),
(21, 'lop', 2021, 'female', 'no', 'hehehe', 2, 2, 3, '2023-02-01 17:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `deledopted_photo`
--

CREATE TABLE `deledopted_photo` (
  `petphoID` int(100) NOT NULL,
  `petID` int(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deledopted_photo`
--

INSERT INTO `deledopted_photo` (`petphoID`, `petID`, `photo`, `date_time`) VALUES
(58, 3, 'Khaomanee_cat.jpg', '0000-00-00 00:00:00'),
(59, 4, 'Brown_Aspin.jpg', '2023-01-15 16:08:28'),
(60, 4, 'Campbells_dwarf.jpg', '2023-01-15 16:08:28'),
(61, 4, 'germanshepherd.jpg', '2023-01-15 16:08:28'),
(62, 4, 'hamster1.jpg', '2023-01-15 16:08:28'),
(63, 4, 'hamster2.jpg', '2023-01-15 16:08:28'),
(64, 4, 'hehe.jpeg', '2023-01-15 16:08:28'),
(65, 4, 'istockphoto-1217828258-170667a.jpg', '2023-01-15 16:08:28'),
(66, 4, 'jorji1.jpg', '2023-01-15 16:08:28'),
(67, 4, 'Khaomanee_cat.jpg', '2023-01-15 16:08:28'),
(68, 4, 'pexels-pixabay-45201.jpg', '2023-01-15 16:08:28'),
(69, 4, 'puspin2.jpg', '2023-01-15 16:08:28'),
(70, 4, 'samantha.jpg', '2023-01-15 16:08:28'),
(71, 4, 'stix.jpg', '2023-01-15 16:08:28'),
(72, 4, 'stix2.jpg', '2023-01-15 16:08:28'),
(73, 4, 'stix3.jpg', '2023-01-15 16:08:28'),
(74, 5, 'stix3.jpg', '2023-01-15 16:23:06'),
(75, 6, 'istockphoto-1217828258-170667a.jpg', '2023-01-15 17:05:52'),
(76, 7, 'jorji1.jpg', '2023-01-15 17:19:25'),
(77, 8, 'Brown_Aspin.jpg', '2023-01-15 17:20:56'),
(78, 8, 'hamster2.jpg', '2023-01-15 17:21:27'),
(79, 8, 'hehe.jpeg', '2023-01-15 17:21:27'),
(80, 8, 'istockphoto-1217828258-170667a.jpg', '2023-01-15 17:21:27'),
(81, 8, 'jorji1.jpg', '2023-01-15 17:21:27'),
(82, 8, 'Khaomanee_cat.jpg', '2023-01-15 17:21:27'),
(83, 8, 'pexels-pixabay-45201.jpg', '2023-01-15 17:21:27'),
(84, 8, 'samantha.jpg', '2023-01-15 17:21:27'),
(85, 8, 'stix.jpg', '2023-01-15 17:21:27'),
(86, 8, 'stix2.jpg', '2023-01-15 17:21:27'),
(87, 8, 'stix3.jpg', '2023-01-15 17:21:27'),
(88, 9, 'puspin2.jpg', '2023-01-15 17:34:45'),
(89, 10, 'Brown_Aspin.jpg', '2023-01-15 18:09:09'),
(90, 10, 'Campbells_dwarf.jpg', '2023-01-15 18:09:09'),
(91, 10, 'germanshepherd.jpg', '2023-01-15 18:09:09'),
(92, 10, 'hamster1.jpg', '2023-01-15 18:09:09'),
(93, 10, 'hamster2.jpg', '2023-01-15 18:09:09'),
(94, 10, 'hehe.jpeg', '2023-01-15 18:09:09'),
(95, 10, 'istockphoto-1217828258-170667a.jpg', '2023-01-15 18:09:09'),
(96, 10, 'jorji1.jpg', '2023-01-15 18:09:09'),
(97, 10, 'Khaomanee_cat.jpg', '2023-01-15 18:09:09'),
(98, 10, 'pexels-pixabay-45201.jpg', '2023-01-15 18:09:09'),
(99, 10, 'puspin2.jpg', '2023-01-15 18:09:09'),
(100, 10, 'samantha.jpg', '2023-01-15 18:09:09'),
(101, 10, 'stix.jpg', '2023-01-15 18:09:09'),
(102, 10, 'stix2.jpg', '2023-01-15 18:09:09'),
(103, 10, 'stix3.jpg', '2023-01-15 18:09:09'),
(104, 11, 'germanshepherd.jpg', '2023-01-15 21:33:01'),
(105, 12, 'hamster1.jpg', '2023-01-15 22:02:32'),
(106, 13, 'stix.jpg', '2023-01-15 22:03:51'),
(123, 15, 'germanshepherd.jpg', '2023-01-26 22:04:19'),
(124, 15, 'stix.jpg', '2023-01-26 22:04:19'),
(125, 15, 'stix3.jpg', '2023-01-26 22:04:19'),
(129, 18, 'stix3.jpg', '2023-01-28 22:53:38'),
(131, 20, 'istockphoto-1217828258-170667a.jpg', '2023-02-01 16:39:06'),
(132, 20, 'samantha.jpg', '2023-02-01 16:39:06'),
(133, 20, 'stix.jpg', '2023-02-01 16:39:06'),
(134, 20, 'stix2.jpg', '2023-02-01 16:39:06'),
(135, 20, 'stix3.jpg', '2023-02-01 16:39:06'),
(136, 20, 'stix - Copy.jpg', '2023-02-01 16:39:06'),
(137, 20, 'hamster2 - Copy.jpg', '2023-02-01 16:39:06'),
(138, 21, 'hamster2.jpg', '2023-02-01 17:17:05'),
(139, 21, 'puspin2.jpg', '2023-02-01 17:17:05'),
(140, 21, 'samantha.jpg', '2023-02-01 17:17:05'),
(141, 21, 'stix - Copy.jpg', '2023-02-01 17:17:05'),
(142, 21, 'stix2.jpg', '2023-02-01 17:17:05');

-- --------------------------------------------------------

--
-- Stand-in structure for view `deledopted_report`
-- (See below for the actual view)
--
CREATE TABLE `deledopted_report` (
`petID` int(100)
,`name` varchar(255)
,`age` int(100)
,`sex` varchar(255)
,`vaccinated` varchar(255)
,`animal_type` varchar(255)
,`breed` varchar(255)
,`username` varchar(255)
,`fname` varchar(255)
,`lname` varchar(255)
,`muni_name` varchar(255)
,`date_time` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `municipality`
--

CREATE TABLE `municipality` (
  `muniID` int(100) NOT NULL,
  `muni_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `municipality`
--

INSERT INTO `municipality` (`muniID`, `muni_name`) VALUES
(1, 'agno'),
(2, 'aguilar'),
(3, 'alaminos'),
(4, 'alcala'),
(5, 'anda'),
(6, 'asingan'),
(7, 'balungao'),
(8, 'bani'),
(9, 'basista'),
(10, 'bautista'),
(11, 'bayambang'),
(12, 'binalonan'),
(13, 'binmaley'),
(14, 'bolinao'),
(15, 'bugallon'),
(16, 'burgos'),
(17, 'calasiao'),
(18, 'dagupan'),
(19, 'dasol'),
(20, 'infanta'),
(21, 'labrador'),
(22, 'laoac'),
(23, 'lingayen'),
(24, 'mabini'),
(25, 'malasiqui'),
(26, 'manaoag'),
(27, 'mangaldan'),
(28, 'mangatarem'),
(29, 'mapandan'),
(30, 'natividad'),
(31, 'pozorrubio'),
(32, 'rosales'),
(33, 'san carlos'),
(34, 'san fabian'),
(35, 'san jacinto'),
(36, 'san manuel'),
(37, 'san nicolas'),
(38, 'san quintin'),
(39, 'sison'),
(40, 'sta. barbara'),
(41, 'sta. maria'),
(42, 'sto. tomas'),
(43, 'sual'),
(44, 'tayug'),
(45, 'umingan'),
(46, 'urbiztondo'),
(47, 'urdaneta'),
(48, 'villasis');

-- --------------------------------------------------------

--
-- Stand-in structure for view `not_owned`
-- (See below for the actual view)
--
CREATE TABLE `not_owned` (
`userID` int(100)
,`username` varchar(255)
,`fname` varchar(255)
,`lname` varchar(255)
,`muni_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `owner_report`
-- (See below for the actual view)
--
CREATE TABLE `owner_report` (
`petID` int(100)
,`name` varchar(255)
,`username` varchar(255)
,`fname` varchar(255)
,`lname` varchar(255)
,`muni_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `petID` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(100) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `vaccinated` varchar(255) DEFAULT NULL,
  `description` varchar(2555) NOT NULL,
  `pcID` int(100) NOT NULL,
  `bcID` int(100) NOT NULL,
  `userID` int(100) NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`petID`, `name`, `age`, `sex`, `vaccinated`, `description`, `pcID`, `bcID`, `userID`, `date_time`) VALUES
(1, 'browny', 2020, 'male', 'no', 'browny\r\n', 2, 2, 1, '2023-01-16 20:52:27'),
(2, 'akosidogie', 2019, 'male', 'no', 'Ako si dogie', 1, 1, 2, '2023-01-16 20:52:27'),
(14, 'ben', 2020, 'male', 'no', 'Wassabi HAHAHA', 1, 1, 3, '2023-01-16 20:52:27'),
(16, 'timothy', 2019, 'female', 'yes', 'Ako si TImothy', 3, 5, 1, '2023-01-28 16:56:33'),
(17, 'christina', 2020, 'female', 'yes', 'Hello', 2, 4, 5, '2023-01-28 22:39:13'),
(19, 'simon', 2020, 'male', 'yes', 'sdgdfhdh', 2, 4, 7, '2023-02-01 05:26:04'),
(22, 'bing chilling', 2013, 'female', 'no', 'Am Xan SIna Ayoko sana\r\n\r\nna ikaw ay mawawa la', 3, 6, 10, '2023-02-04 00:06:32');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pets_owned`
-- (See below for the actual view)
--
CREATE TABLE `pets_owned` (
`userID` int(100)
,`username` varchar(255)
,`fname` varchar(255)
,`lname` varchar(255)
,`muni_name` varchar(255)
,`pets_owned` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `pet_category`
--

CREATE TABLE `pet_category` (
  `pcID` int(100) NOT NULL,
  `animal_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_category`
--

INSERT INTO `pet_category` (`pcID`, `animal_type`) VALUES
(1, 'dog'),
(2, 'cat'),
(3, 'hamster'),
(4, 'universal');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pet_category_report`
-- (See below for the actual view)
--
CREATE TABLE `pet_category_report` (
`petID` int(100)
,`name` varchar(255)
,`animal_type` varchar(255)
,`breed` varchar(255)
,`muni_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `pet_photo`
--

CREATE TABLE `pet_photo` (
  `petphoID` int(100) NOT NULL,
  `petID` int(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_photo`
--

INSERT INTO `pet_photo` (`petphoID`, `petID`, `photo`, `date_time`) VALUES
(21, 37, 'stix.jpg', NULL),
(22, 37, 'stix2.jpg', NULL),
(23, 37, 'stix3.jpg', NULL),
(25, 39, 'samantha.jpg', NULL),
(26, 40, 'stix2.jpg', NULL),
(27, 41, 'jorji1.jpg', NULL),
(28, 42, 'dog1.jpg', NULL),
(29, 42, 'lookdog.jpg', NULL),
(30, 42, 'pet-registrations.jpg', NULL),
(35, 44, 'hamster1.jpg', NULL),
(36, 44, 'hamster2.jpg', NULL),
(37, 45, 'germanshepherd.jpg', NULL),
(38, 46, 'puspin2.jpg', NULL),
(39, 49, 'germanshepherd.jpg', NULL),
(40, 51, 'Campbells_dwarf.jpg', NULL),
(41, 52, 'Campbells_dwarf.jpg', NULL),
(42, 54, 'hamster1.jpg', NULL),
(43, 39, 'istockphoto-1217828258-170667a.jpg', NULL),
(44, 39, 'jorji1.jpg', NULL),
(45, 39, 'Khaomanee_cat.jpg', NULL),
(46, 39, 'pexels-pixabay-45201.jpg', NULL),
(47, 39, 'puspin2.jpg', NULL),
(48, 55, 'istockphoto-1217828258-170667a.jpg', NULL),
(49, 55, 'istockphoto-1217828258-170667a.jpg', NULL),
(50, 55, 'jorji1.jpg', NULL),
(51, 55, 'Khaomanee_cat.jpg', NULL),
(52, 55, 'pexels-pixabay-45201.jpg', NULL),
(53, 55, 'puspin2.jpg', NULL),
(54, 55, 'stix2.jpg', NULL),
(55, 55, 'stix3.jpg', NULL),
(56, 1, 'Khaomanee_cat.jpg', NULL),
(57, 2, 'germanshepherd.jpg', NULL),
(107, 14, 'stix.jpg', '2023-01-16 20:52:27'),
(108, 14, 'Brown_Aspin.jpg', '2023-01-17 21:18:19'),
(109, 14, 'Campbells_dwarf.jpg', '2023-01-17 21:18:19'),
(110, 14, 'germanshepherd.jpg', '2023-01-17 21:18:19'),
(111, 14, 'hamster1.jpg', '2023-01-17 21:18:19'),
(112, 14, 'hamster2.jpg', '2023-01-17 21:18:19'),
(113, 14, 'hehe.jpeg', '2023-01-17 21:18:19'),
(114, 14, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 21:18:19'),
(115, 14, 'jorji1.jpg', '2023-01-17 21:18:19'),
(116, 14, 'Khaomanee_cat.jpg', '2023-01-17 21:18:19'),
(117, 14, 'pexels-pixabay-45201.jpg', '2023-01-17 21:18:19'),
(118, 14, 'puspin2.jpg', '2023-01-17 21:18:19'),
(119, 14, 'samantha.jpg', '2023-01-17 21:18:19'),
(120, 14, 'stix.jpg', '2023-01-17 21:18:19'),
(121, 14, 'stix2.jpg', '2023-01-17 21:18:19'),
(122, 14, 'stix3.jpg', '2023-01-17 21:18:19'),
(126, 16, 'hamster1.jpg', '2023-01-28 16:56:33'),
(127, 16, 'hamster2.jpg', '2023-01-28 16:56:33'),
(128, 17, 'istockphoto-1217828258-170667a.jpg', '2023-01-28 22:39:13'),
(130, 19, 'Khaomanee_cat.jpg', '2023-02-01 05:26:04'),
(143, 22, 'hamster2.jpg', '2023-02-04 00:06:32'),
(144, 22, 'hamster1.jpg', '2023-02-05 17:21:40'),
(145, 22, 'puspin2.jpg', '2023-02-05 17:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodID` int(100) NOT NULL,
  `shopID` int(100) NOT NULL,
  `pcID` int(100) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` int(100) NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodID`, `shopID`, `pcID`, `prod_name`, `description`, `price`, `date_time`) VALUES
(56, 70, 1, 'jezzy', 'ako si jezy', 36, '2023-02-05 16:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_photo`
--

CREATE TABLE `product_photo` (
  `prodphoID` int(100) NOT NULL,
  `prodID` int(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_photo`
--

INSERT INTO `product_photo` (`prodphoID`, `prodID`, `photo`, `date_time`) VALUES
(1, 4, 'stix3.jpg', '2023-01-16 01:49:31'),
(2, 5, 'istockphoto-1217828258-170667a.jpg', '2023-01-16 01:49:51'),
(217, 51, 'Untitled-design-4.jpg', '2023-02-02 11:26:06'),
(219, 53, 'istockphoto-1248454290-612x612.jpg', '2023-02-02 11:44:20'),
(220, 53, 'pet-one-pet-food-8995-9433461-1.jpg', '2023-02-02 11:44:20'),
(221, 53, 'Untitled-design-4.jpg', '2023-02-02 11:44:20'),
(224, 56, 'hamster2.jpg', '2023-02-05 16:55:00'),
(225, 56, 'Brown_Aspin.jpg', '2023-02-05 22:37:14'),
(226, 56, 'Campbells_dwarf.jpg', '2023-02-05 22:37:14'),
(227, 56, 'germanshepherd.jpg', '2023-02-05 22:37:14'),
(228, 56, 'hamster1.jpg', '2023-02-05 22:37:14'),
(229, 56, 'hamster2 - Copy.jpg', '2023-02-05 22:37:14'),
(230, 56, 'hamster2.jpg', '2023-02-05 22:37:14'),
(231, 56, 'hehe.jpeg', '2023-02-05 22:37:14'),
(232, 56, 'istockphoto-1217828258-170667a.jpg', '2023-02-05 22:37:14'),
(233, 56, 'jorji1.jpg', '2023-02-05 22:37:14'),
(234, 56, 'Khaomanee_cat.jpg', '2023-02-05 22:37:14'),
(235, 56, 'pexels-pixabay-45201.jpg', '2023-02-05 22:37:14'),
(236, 56, 'puspin2.jpg', '2023-02-05 22:37:14'),
(237, 56, 'samantha.jpg', '2023-02-05 22:37:14'),
(238, 56, 'stix - Copy.jpg', '2023-02-05 22:37:14'),
(239, 56, 'stix.jpg', '2023-02-05 22:37:14'),
(240, 56, 'stix2.jpg', '2023-02-05 22:37:14'),
(241, 56, 'stix3.jpg', '2023-02-05 22:37:14');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sex_report`
-- (See below for the actual view)
--
CREATE TABLE `sex_report` (
`petID` int(100)
,`name` varchar(255)
,`sex` varchar(255)
,`muni_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shopID` int(100) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `muniID` int(100) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `open_hours` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL,
  `description` varchar(2555) NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shopID`, `shop_name`, `email`, `owner`, `muniID`, `contact_no`, `open_hours`, `services`, `description`, `date_time`) VALUES
(68, 'fkjhk', 'jhlkghj', 'fgjfghf', 1, 'hgjghjdf', 'dfgdfg', 'hjghkg', 'hgkjtyjdfgdfg', '2023-01-17 21:13:08'),
(70, 'fdgdfg', 'fghgj', 'dfgdfg', 19, 'fdfhfgj', 'ryrtyrjtyj', 'sdfs miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\na', 'miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want', '2023-01-17 21:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `shop_photo`
--

CREATE TABLE `shop_photo` (
  `shopphoID` int(100) NOT NULL,
  `shopID` int(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_photo`
--

INSERT INTO `shop_photo` (`shopphoID`, `shopID`, `photo`, `date_time`) VALUES
(166, 68, 'Brown_Aspin.jpg', '2023-01-17 21:13:08'),
(167, 68, 'Campbells_dwarf.jpg', '2023-01-17 21:13:08'),
(168, 68, 'germanshepherd.jpg', '2023-01-17 21:13:08'),
(169, 68, 'hamster1.jpg', '2023-01-17 21:13:08'),
(170, 68, 'hamster2.jpg', '2023-01-17 21:13:08'),
(171, 68, 'hehe.jpeg', '2023-01-17 21:13:08'),
(172, 68, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 21:13:08'),
(173, 68, 'jorji1.jpg', '2023-01-17 21:13:08'),
(174, 68, 'Khaomanee_cat.jpg', '2023-01-17 21:13:08'),
(175, 68, 'pexels-pixabay-45201.jpg', '2023-01-17 21:13:08'),
(176, 68, 'puspin2.jpg', '2023-01-17 21:13:08'),
(177, 68, 'samantha.jpg', '2023-01-17 21:13:08'),
(178, 68, 'stix.jpg', '2023-01-17 21:13:08'),
(179, 68, 'stix2.jpg', '2023-01-17 21:13:08'),
(180, 68, 'stix3.jpg', '2023-01-17 21:13:09'),
(199, 70, 'Brown_Aspin.jpg', '2023-01-17 21:19:49'),
(200, 70, 'Campbells_dwarf.jpg', '2023-01-17 21:19:49'),
(201, 70, 'germanshepherd.jpg', '2023-01-17 21:19:49'),
(202, 70, 'hamster1.jpg', '2023-01-17 21:19:49'),
(203, 70, 'hamster2.jpg', '2023-01-17 21:19:49'),
(204, 70, 'hehe.jpeg', '2023-01-17 21:19:49'),
(205, 70, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 21:19:49'),
(206, 70, 'jorji1.jpg', '2023-01-17 21:19:49'),
(207, 70, 'Khaomanee_cat.jpg', '2023-01-17 21:19:49'),
(208, 70, 'pexels-pixabay-45201.jpg', '2023-01-17 21:19:49'),
(209, 70, 'puspin2.jpg', '2023-01-17 21:19:49'),
(210, 70, 'samantha.jpg', '2023-01-17 21:19:49'),
(211, 70, 'stix.jpg', '2023-01-17 21:19:49'),
(212, 70, 'stix2.jpg', '2023-01-17 21:19:49'),
(213, 70, 'stix3.jpg', '2023-01-17 21:19:49'),
(237, 68, 'Brown_Aspin.jpg', '2023-02-05 22:36:43'),
(238, 68, 'Campbells_dwarf.jpg', '2023-02-05 22:36:43'),
(239, 68, 'germanshepherd.jpg', '2023-02-05 22:36:43'),
(240, 68, 'hamster1.jpg', '2023-02-05 22:36:43'),
(241, 68, 'hamster2 - Copy.jpg', '2023-02-05 22:36:43'),
(242, 68, 'hamster2.jpg', '2023-02-05 22:36:43'),
(243, 68, 'hehe.jpeg', '2023-02-05 22:36:43'),
(244, 68, 'istockphoto-1217828258-170667a.jpg', '2023-02-05 22:36:43'),
(245, 68, 'jorji1.jpg', '2023-02-05 22:36:43'),
(246, 68, 'Khaomanee_cat.jpg', '2023-02-05 22:36:43'),
(247, 68, 'pexels-pixabay-45201.jpg', '2023-02-05 22:36:43'),
(248, 68, 'puspin2.jpg', '2023-02-05 22:36:43'),
(249, 68, 'samantha.jpg', '2023-02-05 22:36:43'),
(250, 68, 'stix - Copy.jpg', '2023-02-05 22:36:43'),
(251, 68, 'stix.jpg', '2023-02-05 22:36:43'),
(252, 68, 'stix2.jpg', '2023-02-05 22:36:43'),
(253, 68, 'stix3.jpg', '2023-02-05 22:36:43');

-- --------------------------------------------------------

--
-- Stand-in structure for view `shop_prod_report`
-- (See below for the actual view)
--
CREATE TABLE `shop_prod_report` (
`prodID` int(100)
,`prod_name` varchar(255)
,`price` int(100)
,`shopID` int(100)
,`shop_name` varchar(255)
,`muni_name` varchar(255)
,`animal_type` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `unver_ver`
-- (See below for the actual view)
--
CREATE TABLE `unver_ver` (
`userID` int(100)
,`username` varchar(255)
,`fname` varchar(255)
,`lname` varchar(255)
,`muni_name` varchar(255)
,`verified_id` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `photo_id` varchar(255) NOT NULL,
  `prof_pic` varchar(255) DEFAULT 'admin.png',
  `muniID` int(100) NOT NULL,
  `verified_id` varchar(255) DEFAULT 'no',
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`, `fname`, `lname`, `photo_id`, `prof_pic`, `muniID`, `verified_id`, `date_time`) VALUES
(1, 'wan', 'wan@yahoo.com', '$2y$10$0To9.RRBGJ6RzTM0Ni7QgO0YPsC44WpFGtTVG7cOzZYuqqoc5dSWm', 'wan', 'wan', 'hehe.jpeg', 'admin.png', 10, 'yes', NULL),
(2, 'two', 'two@yahoo.com', '$2y$10$DiJbEIRecndAT.IK4TKF.eCREo81jMbS.0vyShyFlv.w.2xekFDcq', 'two', 'two', 'pic-na-retoke.jpg', 'admin.png', 6, 'yes', NULL),
(3, 'jw', 'jw@yahoo.com', '$2y$10$pyDEsSs9TYYtHAASvBaoRO1oQBVpm5Y4iwbzF/mhX0tufgRI6a2Ku', 'john', 'wall', 'hehe.jpeg', 'admin.png', 17, 'yes', NULL),
(4, 'ako', 'ako@gmail.com', '$2y$10$VtAFNTm.LXnVNjveW6hlxenvk.V.v/2EJ8UzPieD7rQyvBB5aPqZC', 'ako ay', 'bakit ', 'pic-na-retoke.jpg', 'admin.png', 44, 'yes', '2023-01-14 22:14:47'),
(5, 'mickey', 'mickeymouse@gmail.com', '$2y$10$5tQvztPCc5lsdBfAwPrVYu/up3n7hgk8rHwGkjsKrAGabyzaK6pFq', 'mickey', 'mouse', 'pic-na-retoke.jpg', 'admin.png', 14, 'yes', '2023-01-28 22:25:31'),
(6, 'imee', 'imee@yahoo.com', '$2y$10$gfh/evqx0EBKIAcP6uRhU.wjgF2gb2ePYhsZVmzB.UdkD9VmuEngC', 'imee', 'denise', 'kobe.jpg', 'admin.png', 18, 'yes', '2023-01-28 22:37:55'),
(7, 'jk', 'jk@yahoo.com', '$2y$10$ncchJh9/OJqPIWUC8/wQ9uvSMrdiKWjzhAoGhm.3Pbr7R5S0PDrwy', 'jk', 'jk', 'hehe.jpeg', 'admin.png', 20, 'yes', '2023-02-01 05:25:30'),
(9, 'lop', 'lopdo@gmail.com', '$2y$10$3ikEZ7dFMgr4ALus18DNKuWkHyYiOrfCgIYCFU1gG3rikln4/ri5S', 'lo', 'lo', 'hehe.jpeg', 'admin.png', 13, 'yes', '2023-02-01 21:21:05'),
(10, 'troy123', 'troy@gmail.com', '$2y$10$MRz15WIWXOfCVW32hSwUNOOlMnsxsacPWQ2fuelKRTayrr0ji9g8G', 'troy', 'de vera', 'hehe.jpeg', 'admin.png', 13, 'yes', '2023-02-02 15:53:06'),
(11, 'ken', 'ken@yahoo.com', '$2y$10$.5pWusqBAIsR0L/.jduIhefyJzFix63a08StmSlUIRcLwbK9SRJ9a', 'ken', 'ken', 'Campbells_dwarf.jpg', 'admin.png', 46, 'yes', '2023-02-06 12:41:53');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vaccinated_report`
-- (See below for the actual view)
--
CREATE TABLE `vaccinated_report` (
`petID` int(100)
,`name` varchar(255)
,`vaccinated` varchar(255)
,`muni_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `birthyear_report`
--
DROP TABLE IF EXISTS `birthyear_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `birthyear_report`  AS SELECT `p`.`petID` AS `petID`, `p`.`name` AS `name`, `p`.`age` AS `age`, `m`.`muni_name` AS `muni_name` FROM ((`pet` `p` join `users` `u` on(`u`.`userID` = `p`.`userID`)) join `municipality` `m` on(`m`.`muniID` = `u`.`muniID`))  ;

-- --------------------------------------------------------

--
-- Structure for view `deledopted_report`
--
DROP TABLE IF EXISTS `deledopted_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `deledopted_report`  AS SELECT `d`.`petID` AS `petID`, `d`.`name` AS `name`, `d`.`age` AS `age`, `d`.`sex` AS `sex`, `d`.`vaccinated` AS `vaccinated`, `pc`.`animal_type` AS `animal_type`, `bc`.`breed` AS `breed`, `u`.`username` AS `username`, `u`.`fname` AS `fname`, `u`.`lname` AS `lname`, `m`.`muni_name` AS `muni_name`, `d`.`date_time` AS `date_time` FROM ((((`deledopted` `d` join `pet_category` `pc` on(`pc`.`pcID` = `d`.`pcID`)) join `breed_category` `bc` on(`bc`.`bcID` = `d`.`bcID`)) join `users` `u` on(`u`.`userID` = `d`.`userID`)) join `municipality` `m` on(`m`.`muniID` = `u`.`muniID`)) ORDER BY `d`.`petID` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `not_owned`
--
DROP TABLE IF EXISTS `not_owned`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `not_owned`  AS SELECT `u`.`userID` AS `userID`, `u`.`username` AS `username`, `u`.`fname` AS `fname`, `u`.`lname` AS `lname`, `m`.`muni_name` AS `muni_name` FROM (`users` `u` join `municipality` `m` on(`m`.`muniID` = `u`.`muniID`)) WHERE !(`u`.`userID` in (select `pets_owned`.`userID` from `pets_owned`))  ;

-- --------------------------------------------------------

--
-- Structure for view `owner_report`
--
DROP TABLE IF EXISTS `owner_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `owner_report`  AS SELECT `p`.`petID` AS `petID`, `p`.`name` AS `name`, `u`.`username` AS `username`, `u`.`fname` AS `fname`, `u`.`lname` AS `lname`, `m`.`muni_name` AS `muni_name` FROM ((`pet` `p` join `users` `u` on(`u`.`userID` = `p`.`userID`)) join `municipality` `m` on(`m`.`muniID` = `u`.`muniID`)) ORDER BY `p`.`petID` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `pets_owned`
--
DROP TABLE IF EXISTS `pets_owned`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pets_owned`  AS SELECT `u`.`userID` AS `userID`, `u`.`username` AS `username`, `u`.`fname` AS `fname`, `u`.`lname` AS `lname`, `m`.`muni_name` AS `muni_name`, count(`p`.`petID`) AS `pets_owned` FROM ((`users` `u` join `pet` `p` on(`u`.`userID` = `p`.`userID`)) join `municipality` `m` on(`m`.`muniID` = `u`.`muniID`)) GROUP BY `u`.`userID` ORDER BY `u`.`userID` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `pet_category_report`
--
DROP TABLE IF EXISTS `pet_category_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pet_category_report`  AS SELECT `p`.`petID` AS `petID`, `p`.`name` AS `name`, `pc`.`animal_type` AS `animal_type`, `bc`.`breed` AS `breed`, `m`.`muni_name` AS `muni_name` FROM ((((`pet` `p` join `pet_category` `pc` on(`pc`.`pcID` = `p`.`pcID`)) join `breed_category` `bc` on(`bc`.`bcID` = `p`.`bcID`)) join `users` `u` on(`u`.`userID` = `p`.`userID`)) join `municipality` `m` on(`m`.`muniID` = `u`.`muniID`))  ;

-- --------------------------------------------------------

--
-- Structure for view `sex_report`
--
DROP TABLE IF EXISTS `sex_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sex_report`  AS SELECT `p`.`petID` AS `petID`, `p`.`name` AS `name`, `p`.`sex` AS `sex`, `m`.`muni_name` AS `muni_name` FROM ((`pet` `p` join `users` `u` on(`u`.`userID` = `p`.`userID`)) join `municipality` `m` on(`m`.`muniID` = `u`.`muniID`)) ORDER BY `p`.`petID` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `shop_prod_report`
--
DROP TABLE IF EXISTS `shop_prod_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shop_prod_report`  AS SELECT `p`.`prodID` AS `prodID`, `p`.`prod_name` AS `prod_name`, `p`.`price` AS `price`, `s`.`shopID` AS `shopID`, `s`.`shop_name` AS `shop_name`, `m`.`muni_name` AS `muni_name`, `pc`.`animal_type` AS `animal_type` FROM (((`product` `p` join `shop` `s` on(`s`.`shopID` = `p`.`shopID`)) join `municipality` `m` on(`m`.`muniID` = `s`.`muniID`)) join `pet_category` `pc` on(`pc`.`pcID` = `p`.`pcID`))  ;

-- --------------------------------------------------------

--
-- Structure for view `unver_ver`
--
DROP TABLE IF EXISTS `unver_ver`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `unver_ver`  AS SELECT `u`.`userID` AS `userID`, `u`.`username` AS `username`, `u`.`fname` AS `fname`, `u`.`lname` AS `lname`, `m`.`muni_name` AS `muni_name`, `u`.`verified_id` AS `verified_id` FROM (`users` `u` join `municipality` `m` on(`m`.`muniID` = `u`.`muniID`)) ORDER BY `u`.`userID` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `vaccinated_report`
--
DROP TABLE IF EXISTS `vaccinated_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vaccinated_report`  AS SELECT `p`.`petID` AS `petID`, `p`.`name` AS `name`, `p`.`vaccinated` AS `vaccinated`, `m`.`muni_name` AS `muni_name` FROM ((`pet` `p` join `users` `u` on(`u`.`userID` = `p`.`userID`)) join `municipality` `m` on(`m`.`muniID` = `u`.`muniID`)) ORDER BY `p`.`petID` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `breed_category`
--
ALTER TABLE `breed_category`
  ADD PRIMARY KEY (`bcID`),
  ADD KEY `pcID` (`pcID`);

--
-- Indexes for table `chat_log`
--
ALTER TABLE `chat_log`
  ADD PRIMARY KEY (`cLID`),
  ADD KEY `user1` (`sender`),
  ADD KEY `user2` (`reciever`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`clinicID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `clinic_name` (`clinic_name`),
  ADD KEY `muniID` (`muniID`);

--
-- Indexes for table `clinic_photo`
--
ALTER TABLE `clinic_photo`
  ADD PRIMARY KEY (`clinicphoID`),
  ADD KEY `clinicID` (`clinicID`);

--
-- Indexes for table `deledopted`
--
ALTER TABLE `deledopted`
  ADD PRIMARY KEY (`petID`),
  ADD KEY `pcID` (`pcID`),
  ADD KEY `bcID` (`bcID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `deledopted_photo`
--
ALTER TABLE `deledopted_photo`
  ADD PRIMARY KEY (`petphoID`);

--
-- Indexes for table `municipality`
--
ALTER TABLE `municipality`
  ADD PRIMARY KEY (`muniID`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`petID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `pcID` (`pcID`),
  ADD KEY `bcID` (`bcID`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `pet_category`
--
ALTER TABLE `pet_category`
  ADD PRIMARY KEY (`pcID`);

--
-- Indexes for table `pet_photo`
--
ALTER TABLE `pet_photo`
  ADD PRIMARY KEY (`petphoID`),
  ADD KEY `petID` (`petID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodID`),
  ADD UNIQUE KEY `prod_name` (`prod_name`),
  ADD KEY `shopID` (`shopID`),
  ADD KEY `pcID` (`pcID`);

--
-- Indexes for table `product_photo`
--
ALTER TABLE `product_photo`
  ADD PRIMARY KEY (`prodphoID`),
  ADD KEY `prodID` (`prodID`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shopID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `shop_name` (`shop_name`),
  ADD KEY `muniID` (`muniID`);

--
-- Indexes for table `shop_photo`
--
ALTER TABLE `shop_photo`
  ADD PRIMARY KEY (`shopphoID`),
  ADD KEY `shopID` (`shopID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_ibfk_1` (`muniID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `breed_category`
--
ALTER TABLE `breed_category`
  MODIFY `bcID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat_log`
--
ALTER TABLE `chat_log`
  MODIFY `cLID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `clinicID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `clinic_photo`
--
ALTER TABLE `clinic_photo`
  MODIFY `clinicphoID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `petID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pet_category`
--
ALTER TABLE `pet_category`
  MODIFY `pcID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pet_photo`
--
ALTER TABLE `pet_photo`
  MODIFY `petphoID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `product_photo`
--
ALTER TABLE `product_photo`
  MODIFY `prodphoID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shopID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `shop_photo`
--
ALTER TABLE `shop_photo`
  MODIFY `shopphoID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `breed_category`
--
ALTER TABLE `breed_category`
  ADD CONSTRAINT `breed_category_ibfk_1` FOREIGN KEY (`pcID`) REFERENCES `pet_category` (`pcID`);

--
-- Constraints for table `chat_log`
--
ALTER TABLE `chat_log`
  ADD CONSTRAINT `chat_log_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `chat_log_ibfk_2` FOREIGN KEY (`reciever`) REFERENCES `users` (`userID`);

--
-- Constraints for table `clinic`
--
ALTER TABLE `clinic`
  ADD CONSTRAINT `clinic_ibfk_1` FOREIGN KEY (`muniID`) REFERENCES `municipality` (`muniID`);

--
-- Constraints for table `clinic_photo`
--
ALTER TABLE `clinic_photo`
  ADD CONSTRAINT `clinic_photo_ibfk_1` FOREIGN KEY (`clinicID`) REFERENCES `clinic` (`clinicID`);

--
-- Constraints for table `deledopted`
--
ALTER TABLE `deledopted`
  ADD CONSTRAINT `deledopted_ibfk_1` FOREIGN KEY (`pcID`) REFERENCES `pet_category` (`pcID`),
  ADD CONSTRAINT `deledopted_ibfk_2` FOREIGN KEY (`bcID`) REFERENCES `breed_category` (`bcID`),
  ADD CONSTRAINT `deledopted_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `pet_ibfk_4` FOREIGN KEY (`pcID`) REFERENCES `pet_category` (`pcID`),
  ADD CONSTRAINT `pet_ibfk_5` FOREIGN KEY (`bcID`) REFERENCES `breed_category` (`bcID`);

--
-- Constraints for table `pet_photo`
--
ALTER TABLE `pet_photo`
  ADD CONSTRAINT `pet_photo_ibfk_1` FOREIGN KEY (`petID`) REFERENCES `pet` (`petID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`shopID`) REFERENCES `shop` (`shopID`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`pcID`) REFERENCES `pet_category` (`pcID`);

--
-- Constraints for table `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`muniID`) REFERENCES `municipality` (`muniID`);

--
-- Constraints for table `shop_photo`
--
ALTER TABLE `shop_photo`
  ADD CONSTRAINT `shop_photo_ibfk_1` FOREIGN KEY (`shopID`) REFERENCES `shop` (`shopID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`muniID`) REFERENCES `municipality` (`muniID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
