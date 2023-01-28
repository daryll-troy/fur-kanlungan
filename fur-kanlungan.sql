-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 08:07 AM
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
  `user1` int(100) NOT NULL,
  `user2` int(100) NOT NULL,
  `text_message` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `location` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `open_hours` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`clinicID`, `clinic_name`, `email`, `muniID`, `owner`, `location`, `contact_no`, `open_hours`, `services`, `description`, `date_time`) VALUES
(8, 'jhj', 'ghfghf', 1, 'fghd', '', 'dfgd', 'fghf', 'fghf', 'fghf', '2023-01-16 22:54:12'),
(9, 'k', 'k', 1, 'k', '', 'k', 'k', 'beauty queen of only eighteen, she had some trouble with herself\r\nhe was always there to help her, she always belonged to someone else\r\ni drove for miles and miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don', 'beauty queen of only eighteen, she had some trouble with herself\r\nhe was always there to help her, she always belonged to someone else\r\ni drove for miles and miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want, yeah\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\ni know where you hide, alone in your car\r\nknow all of the things that make you who you are\r\ni know that goodbye means nothing at all\r\ncomes back and begs me to catch her every time she falls, yeah\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain, oh\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nyeah, yeah\r\ni don&#039;t mind spending every day (ooh, ooh)\r\nout on your corner in the pouring rain\r\n(please don&#039;t try so hard to say goodbye)', '2023-01-17 00:26:32'),
(11, 'ako', 'dfgdf', 1, 'dfgd', '', '205622', '45657df', 'humpty dumpty sat on a wall,\r\nhumpty dumpty had a great fall;\r\nall the king&amp;#039;s horses and all the king&amp;#039;s men\r\ncouldn&amp;#039;t put humpty together again.\r\n\r\nit starts with one thing\r\ni don&amp;#039;t know why\r\nit doesn&amp;#039;t even ma', 'dfgdfg\r\nbeauty queen of only eighteen, she had some trouble with herself\r\nhe was always there to help her, she always belonged to someone else\r\ni drove for miles and miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want, yeah\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\ni know where you hide, alone in your car\r\nknow all of the things that make you who you are\r\ni know that goodbye means nothing at all\r\ncomes back and begs me to catch her every time she falls, yeah\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain, oh\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nyeah, yeah\r\ni don&#039;t mind spending every day (ooh, ooh)\r\nout on your corner in the pouring rain\r\n(please don&#039;t try so hard to say goodbye)', '2023-01-17 01:33:05'),
(12, 'mima', 'dfgd', 1, 'dfgdfgdfg', '', 'dfgdfg', 'ghfgh', 'dfgdf', 'sdfs', '2023-01-17 01:33:28'),
(13, 'po', 'ui', 20, 'po', '', 'po', 'po', 'po', 'po', '2023-01-17 08:13:37'),
(14, 'yoyo', 'sdf', 18, 'gfgh', '', 'dfghj', 'hjh', 'hgjjbeauty queen of only eighteen, she had some trouble with herself\r\nhe was always there to help her, she always belonged to someone else\r\ni drove for miles and miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni', 'fdgsdfd', '2023-01-17 08:21:24'),
(15, 'aarobbs', 'hhjg', 20, 'ghf', '', 'thtrh', 'dgsdg', 'gsdgsbeauty queen of only eighteen, she had some trouble with herself\r\nhe was always there to help her, she always belonged to someone else\r\ni drove for miles and miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more', 'sdfsdfbeauty queen of only eighteen, she had some trouble with herself\r\nhe was always there to help her, she always belonged to someone else\r\ni drove for miles and miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want, yeah\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\ni know where you hide, alone in your car\r\nknow all of the things that make you who you are\r\ni know that goodbye means nothing at all\r\ncomes back and begs me to catch her every time she falls, yeah\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain, oh\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nyeah, yeah\r\ni don&#039;t mind spending every day (ooh, ooh)\r\nout on your corner in the pouring rain\r\n(please don&#039;t try so hard to say goodbye)', '2023-01-17 08:27:19'),
(16, 'haha', 'haha', 17, 'haha', '', 'haha', 'haha', 'dfgdfg\r\nbeauty queen of only eighteen, she had some trouble with herself\r\nhe was always there to help her, she always belonged to someone else\r\ni drove for miles and miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want mor', 'dfgdfg\r\nbeauty queen of only eighteen, she had some trouble with herself\r\nhe was always there to help her, she always belonged to someone else\r\ni drove for miles and miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want, yeah\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\ni know where you hide, alone in your car\r\nknow all of the things that make you who you are\r\ni know that goodbye means nothing at all\r\ncomes back and begs me to catch her every time she falls, yeah\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain, oh\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nyeah, yeah\r\ni don&#039;t mind spending every day (ooh, ooh)\r\nout on your corner in the pouring rain\r\n(please don&#039;t try so hard to say goodbye)', '2023-01-17 08:48:00');

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
(64, 11, 'Brown_Aspin.jpg', '2023-01-17 01:33:05'),
(65, 11, 'Campbells_dwarf.jpg', '2023-01-17 01:33:05'),
(66, 11, 'germanshepherd.jpg', '2023-01-17 01:33:05'),
(67, 11, 'hamster1.jpg', '2023-01-17 01:33:05'),
(68, 11, 'hamster2.jpg', '2023-01-17 01:33:05'),
(69, 11, 'hehe.jpeg', '2023-01-17 01:33:05'),
(70, 11, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 01:33:05'),
(71, 11, 'jorji1.jpg', '2023-01-17 01:33:05'),
(72, 11, 'Khaomanee_cat.jpg', '2023-01-17 01:33:05'),
(73, 11, 'pexels-pixabay-45201.jpg', '2023-01-17 01:33:05'),
(74, 11, 'puspin2.jpg', '2023-01-17 01:33:05'),
(75, 11, 'samantha.jpg', '2023-01-17 01:33:05'),
(76, 11, 'stix.jpg', '2023-01-17 01:33:05'),
(77, 11, 'stix2.jpg', '2023-01-17 01:33:05'),
(78, 11, 'stix3.jpg', '2023-01-17 01:33:05'),
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
(121, 15, 'samantha.jpg', '2023-01-17 08:27:19'),
(122, 15, 'stix.jpg', '2023-01-17 08:27:19'),
(123, 15, 'stix2.jpg', '2023-01-17 08:27:19'),
(124, 15, 'stix3.jpg', '2023-01-17 08:27:19'),
(125, 16, 'samantha.jpg', '2023-01-17 08:48:00'),
(126, 16, 'stix.jpg', '2023-01-17 08:48:00'),
(127, 16, 'stix2.jpg', '2023-01-17 08:48:00'),
(128, 16, 'stix3.jpg', '2023-01-17 08:48:00'),
(129, 15, 'samantha.jpg', '2023-01-17 21:26:49'),
(130, 15, 'stix.jpg', '2023-01-17 21:26:49'),
(131, 15, 'stix2.jpg', '2023-01-17 21:26:49'),
(132, 15, 'stix3.jpg', '2023-01-17 21:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `deledopted`
--

CREATE TABLE `deledopted` (
  `petID` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(100) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `vacinnated` varchar(255) DEFAULT NULL,
  `description` varchar(2555) NOT NULL,
  `pcID` int(100) NOT NULL,
  `bcID` int(100) NOT NULL,
  `userID` int(100) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deledopted`
--

INSERT INTO `deledopted` (`petID`, `name`, `age`, `sex`, `vacinnated`, `description`, `pcID`, `bcID`, `userID`, `date_time`) VALUES
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
(13, 'xcvdfbfgn', 2020, 'male', 'no', 'ukhjjgfhfgh', 1, 3, 3, '2023-01-15 22:03:51');

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
(106, 13, 'stix.jpg', '2023-01-15 22:03:51');

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
(1, 'browny', 2020, 'male', NULL, 'browny\r\n', 2, 2, 1, NULL),
(2, 'akosidogie', 2019, 'male', NULL, 'Ako si dogie', 1, 1, 2, NULL),
(14, 'ben', 2020, 'male', 'yes', 'asdasdasd', 1, 1, 3, '2023-01-16 20:52:27'),
(15, 'mino', 2016, 'male', 'yes', 'Ako si Mino', 1, 3, 3, '2023-01-26 22:04:19');

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
,`muniID` int(100)
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
(3, 'hamster');

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
(123, 15, 'germanshepherd.jpg', '2023-01-26 22:04:19'),
(124, 15, 'stix.jpg', '2023-01-26 22:04:19'),
(125, 15, 'stix3.jpg', '2023-01-26 22:04:19');

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
(28, 46, 1, 'fgdfg', 'beauty queen of only eighteen, she had some trouble with herself\r\nhe was always there to help her, she always belonged to someone else\r\ni drove for miles and miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want, yeah\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\ni know where you hide, alone in your car\r\nknow all of the things that make you who you are\r\ni know that goodbye means nothing at all\r\ncomes back and begs me to catch her every time she falls, yeah\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain, oh\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nyeah, yeah\r\ni don&#039;t mind spending every day (ooh, ooh)\r\nout on your corner in the pouring rain\r\n(please don&#039;t try so hard to say goodbye)', 789, '2023-01-17 01:27:56'),
(33, 46, 1, 'afyut', 'dfgdfgsdfsdf miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want', 46, '2023-01-17 08:21:00'),
(37, 61, 2, 'man', 'manasd', 231, '2023-01-17 23:16:40');

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
(42, 28, 'Brown_Aspin.jpg', '2023-01-17 01:28:11'),
(45, 28, 'Brown_Aspin.jpg', '2023-01-17 01:30:35'),
(47, 28, 'Khaomanee_cat.jpg', '2023-01-17 01:34:53'),
(48, 28, 'germanshepherd.jpg', '2023-01-17 01:39:58'),
(50, 28, 'puspin2.jpg', '2023-01-17 01:43:09'),
(51, 28, 'Khaomanee_cat.jpg', '2023-01-17 01:45:22'),
(116, 28, 'Brown_Aspin.jpg', '2023-01-17 01:58:15'),
(117, 28, 'Campbells_dwarf.jpg', '2023-01-17 01:58:15'),
(118, 28, 'germanshepherd.jpg', '2023-01-17 01:58:15'),
(119, 28, 'hamster1.jpg', '2023-01-17 01:58:15'),
(120, 28, 'hamster2.jpg', '2023-01-17 01:58:15'),
(121, 28, 'hehe.jpeg', '2023-01-17 01:58:15'),
(122, 28, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 01:58:15'),
(123, 28, 'jorji1.jpg', '2023-01-17 01:58:15'),
(124, 28, 'Khaomanee_cat.jpg', '2023-01-17 01:58:15'),
(125, 28, 'pexels-pixabay-45201.jpg', '2023-01-17 01:58:15'),
(126, 28, 'puspin2.jpg', '2023-01-17 01:58:15'),
(127, 28, 'samantha.jpg', '2023-01-17 01:58:15'),
(128, 28, 'stix.jpg', '2023-01-17 01:58:15'),
(129, 28, 'stix2.jpg', '2023-01-17 01:58:15'),
(130, 28, 'stix3.jpg', '2023-01-17 01:58:15'),
(131, 28, 'Brown_Aspin.jpg', '2023-01-17 01:58:38'),
(132, 28, 'Campbells_dwarf.jpg', '2023-01-17 01:58:38'),
(133, 28, 'germanshepherd.jpg', '2023-01-17 01:58:38'),
(134, 28, 'hamster1.jpg', '2023-01-17 01:58:38'),
(135, 28, 'hamster2.jpg', '2023-01-17 01:58:38'),
(136, 28, 'hehe.jpeg', '2023-01-17 01:58:38'),
(137, 28, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 01:58:38'),
(138, 28, 'jorji1.jpg', '2023-01-17 01:58:38'),
(139, 28, 'Khaomanee_cat.jpg', '2023-01-17 01:58:38'),
(140, 28, 'pexels-pixabay-45201.jpg', '2023-01-17 01:58:38'),
(141, 28, 'puspin2.jpg', '2023-01-17 01:58:38'),
(142, 28, 'samantha.jpg', '2023-01-17 01:58:38'),
(143, 28, 'stix.jpg', '2023-01-17 01:58:38'),
(144, 28, 'stix2.jpg', '2023-01-17 01:58:38'),
(145, 28, 'stix3.jpg', '2023-01-17 01:58:38'),
(146, 28, 'Brown_Aspin.jpg', '2023-01-17 01:59:16'),
(147, 28, 'Campbells_dwarf.jpg', '2023-01-17 01:59:16'),
(148, 28, 'germanshepherd.jpg', '2023-01-17 01:59:16'),
(149, 28, 'hamster1.jpg', '2023-01-17 01:59:16'),
(150, 28, 'hamster2.jpg', '2023-01-17 01:59:16'),
(151, 28, 'hehe.jpeg', '2023-01-17 01:59:16'),
(152, 28, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 01:59:16'),
(153, 28, 'jorji1.jpg', '2023-01-17 01:59:16'),
(154, 28, 'Khaomanee_cat.jpg', '2023-01-17 01:59:16'),
(155, 28, 'pexels-pixabay-45201.jpg', '2023-01-17 01:59:16'),
(156, 28, 'puspin2.jpg', '2023-01-17 01:59:16'),
(157, 28, 'samantha.jpg', '2023-01-17 01:59:16'),
(158, 28, 'stix.jpg', '2023-01-17 01:59:16'),
(159, 28, 'stix2.jpg', '2023-01-17 01:59:16'),
(160, 28, 'stix3.jpg', '2023-01-17 01:59:16'),
(161, 33, 'samantha.jpg', '2023-01-17 08:21:00'),
(162, 33, 'stix.jpg', '2023-01-17 08:21:00'),
(163, 33, 'stix2.jpg', '2023-01-17 08:21:00'),
(164, 33, 'stix3.jpg', '2023-01-17 08:21:00'),
(165, 33, 'Brown_Aspin.jpg', '2023-01-17 21:18:57'),
(166, 33, 'Campbells_dwarf.jpg', '2023-01-17 21:18:57'),
(167, 33, 'germanshepherd.jpg', '2023-01-17 21:18:57'),
(168, 33, 'hamster1.jpg', '2023-01-17 21:18:57'),
(169, 33, 'hamster2.jpg', '2023-01-17 21:18:57'),
(170, 33, 'hehe.jpeg', '2023-01-17 21:18:57'),
(171, 33, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 21:18:57'),
(172, 33, 'jorji1.jpg', '2023-01-17 21:18:57'),
(173, 33, 'Khaomanee_cat.jpg', '2023-01-17 21:18:57'),
(174, 33, 'pexels-pixabay-45201.jpg', '2023-01-17 21:18:57'),
(175, 33, 'puspin2.jpg', '2023-01-17 21:18:57'),
(176, 33, 'samantha.jpg', '2023-01-17 21:18:57'),
(177, 33, 'stix.jpg', '2023-01-17 21:18:57'),
(178, 33, 'stix2.jpg', '2023-01-17 21:18:57'),
(179, 33, 'stix3.jpg', '2023-01-17 21:18:57'),
(199, 37, 'jorji1.jpg', '2023-01-17 23:16:40'),
(200, 37, 'Khaomanee_cat.jpg', '2023-01-17 23:16:40'),
(201, 37, 'pexels-pixabay-45201.jpg', '2023-01-17 23:16:40'),
(202, 37, 'puspin2.jpg', '2023-01-17 23:16:40'),
(203, 37, 'samantha.jpg', '2023-01-17 23:16:40'),
(204, 37, 'stix.jpg', '2023-01-17 23:16:41'),
(205, 37, 'stix2.jpg', '2023-01-17 23:16:41'),
(206, 37, 'stix3.jpg', '2023-01-17 23:16:41');

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
  `location` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `open_hours` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL,
  `description` varchar(2555) NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shopID`, `shop_name`, `email`, `owner`, `muniID`, `location`, `contact_no`, `open_hours`, `services`, `description`, `date_time`) VALUES
(46, 'dfg', 'dfgh', 'ghjghj', 1, '', 'sgsd', 'sdfs', 'beauty queen of only eighteen, she had some trouble with herself\r\nhe was always there to help her, she always belonged to someone else\r\ni drove for miles and miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don', 'beauty queen of only eighteen, she had some trouble with herself\r\nhe was always there to help her, she always belonged to someone else\r\ni drove for miles and miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want, yeah\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\ni know where you hide, alone in your car\r\nknow all of the things that make you who you are\r\ni know that goodbye means nothing at all\r\ncomes back and begs me to catch her every time she falls, yeah\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain, oh\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nand she will be loved\r\nyeah, yeah\r\ni don&#039;t mind spending every day (ooh, ooh)\r\nout on your corner in the pouring rain\r\n(please don&#039;t try so hard to say goodbye)', '2023-01-16 22:53:57'),
(48, 'ui', 'ui', 'ui', 12, '', 'io', 'io', 'io', 'io', '2023-01-17 01:51:02'),
(52, 'po', 'po', 'po', 21, '', 'po', 'po', 'po', 'po', '2023-01-17 08:13:52'),
(55, 'dfgdf', 'fdghfgj', 'sdfs', 17, '', 'gdfgd', 'nm', 'gfhjfg', 'dfghdfg', '2023-01-17 08:15:05'),
(61, 'fgfefsdf', 'grtht', 'sdfsdf', 20, '', 'dfgrttu', 'sdghgh', 'ghwrtwe', 'dgdsfdsd', '2023-01-17 08:23:09'),
(68, 'fkjhk', 'jhlkghj', 'fgjfghf', 19, '', 'hgjghjdf', 'dfgdfg', 'hjghkg', 'hgkjtyjdfgdfg', '2023-01-17 21:13:08'),
(70, 'fdgdfg', 'fghgj', 'dfgdfg', 19, '', 'fdfhfgj', 'ryrtyrjtyj', 'sdfs miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\na', 'miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want miles, and wound up at your door\r\ni&#039;ve had you so many times, but somehow i want more\r\ni don&#039;t mind spending every day\r\nout on your corner in the pouring rain\r\nlook for the girl with the broken smile\r\nask her if she wants to stay a while\r\nand she will be loved\r\nand she will be loved\r\ntap on my window, knock on my door, i want to make you feel beautiful\r\ni know i tend to get so insecure, it doesn&#039;t matter anymore\r\nit&#039;s not always rainbows and butterflies, it&#039;s compromise that moves us along, yeah\r\nmy heart is full and my door&#039;s always open, you come anytime you want', '2023-01-17 21:19:49'),
(74, 'fgdfg', 'sdfsdf', 'fhdfh', 20, '', 'dfgd', 'dfhfdhd', 'xcvx', 'dvd', '2023-01-17 21:20:45'),
(77, 'imee denise', 'imee@yahoo.com', 'imme', 1, '', '09457896512', '1uhaud', 'gfgsjhdada', 'sdfsfg', '2023-01-18 12:12:42');

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
(20, 46, 'istockphoto-1217828258-170667a.jpg', '2023-01-16 22:53:57'),
(21, 46, 'stix.jpg', '2023-01-16 22:53:57'),
(22, 46, 'stix2.jpg', '2023-01-16 22:53:57'),
(23, 46, 'stix3.jpg', '2023-01-16 22:53:57'),
(24, 46, 'Brown_Aspin.jpg', '2023-01-17 01:12:55'),
(25, 46, 'Campbells_dwarf.jpg', '2023-01-17 01:12:55'),
(26, 46, 'germanshepherd.jpg', '2023-01-17 01:12:55'),
(27, 46, 'hamster1.jpg', '2023-01-17 01:12:55'),
(28, 46, 'hamster2.jpg', '2023-01-17 01:12:55'),
(29, 46, 'hehe.jpeg', '2023-01-17 01:12:55'),
(30, 46, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 01:12:55'),
(31, 46, 'jorji1.jpg', '2023-01-17 01:12:55'),
(32, 46, 'Khaomanee_cat.jpg', '2023-01-17 01:12:55'),
(33, 46, 'pexels-pixabay-45201.jpg', '2023-01-17 01:12:55'),
(34, 46, 'puspin2.jpg', '2023-01-17 01:12:55'),
(35, 46, 'samantha.jpg', '2023-01-17 01:12:55'),
(36, 46, 'stix.jpg', '2023-01-17 01:12:55'),
(37, 46, 'stix2.jpg', '2023-01-17 01:12:55'),
(38, 46, 'stix3.jpg', '2023-01-17 01:12:55'),
(39, 46, 'Brown_Aspin.jpg', '2023-01-17 01:13:18'),
(40, 46, 'Campbells_dwarf.jpg', '2023-01-17 01:13:18'),
(41, 46, 'germanshepherd.jpg', '2023-01-17 01:13:18'),
(42, 46, 'hamster1.jpg', '2023-01-17 01:13:18'),
(43, 46, 'hamster2.jpg', '2023-01-17 01:13:18'),
(44, 46, 'hehe.jpeg', '2023-01-17 01:13:18'),
(45, 46, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 01:13:18'),
(46, 46, 'jorji1.jpg', '2023-01-17 01:13:18'),
(47, 46, 'Khaomanee_cat.jpg', '2023-01-17 01:13:18'),
(48, 46, 'pexels-pixabay-45201.jpg', '2023-01-17 01:13:18'),
(49, 46, 'puspin2.jpg', '2023-01-17 01:13:18'),
(50, 46, 'samantha.jpg', '2023-01-17 01:13:18'),
(51, 46, 'stix.jpg', '2023-01-17 01:13:18'),
(52, 46, 'stix2.jpg', '2023-01-17 01:13:18'),
(53, 46, 'stix3.jpg', '2023-01-17 01:13:18'),
(92, 46, 'Khaomanee_cat.jpg', '2023-01-17 01:31:09'),
(93, 46, 'pexels-pixabay-45201.jpg', '2023-01-17 01:31:09'),
(94, 46, 'puspin2.jpg', '2023-01-17 01:31:09'),
(95, 46, 'samantha.jpg', '2023-01-17 01:31:09'),
(96, 46, 'stix.jpg', '2023-01-17 01:31:09'),
(97, 46, 'stix2.jpg', '2023-01-17 01:31:09'),
(98, 46, 'stix3.jpg', '2023-01-17 01:31:09'),
(99, 48, 'samantha.jpg', '2023-01-17 01:51:02'),
(100, 48, 'stix.jpg', '2023-01-17 01:51:02'),
(101, 48, 'stix2.jpg', '2023-01-17 01:51:02'),
(102, 48, 'stix3.jpg', '2023-01-17 01:51:02'),
(106, 52, 'stix2.jpg', '2023-01-17 08:13:52'),
(111, 55, 'istockphoto-1217828258-170667a.jpg', '2023-01-17 08:15:05'),
(117, 61, 'samantha.jpg', '2023-01-17 08:23:09'),
(118, 61, 'stix.jpg', '2023-01-17 08:23:09'),
(119, 61, 'stix2.jpg', '2023-01-17 08:23:09'),
(120, 61, 'stix3.jpg', '2023-01-17 08:23:09'),
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
(214, 77, 'stix2.jpg', '2023-01-18 12:12:42'),
(215, 77, 'stix3.jpg', '2023-01-18 12:12:42'),
(216, 77, 'stix2.jpg', '2023-01-18 12:12:57'),
(217, 77, 'stix3.jpg', '2023-01-18 12:12:57'),
(218, 77, 'Brown_Aspin.jpg', '2023-01-18 12:13:11'),
(219, 77, 'Campbells_dwarf.jpg', '2023-01-18 12:13:11'),
(220, 77, 'germanshepherd.jpg', '2023-01-18 12:13:11'),
(221, 77, 'hamster1.jpg', '2023-01-18 12:13:11'),
(222, 77, 'hamster2.jpg', '2023-01-18 12:13:11'),
(223, 77, 'hehe.jpeg', '2023-01-18 12:13:11'),
(224, 77, 'istockphoto-1217828258-170667a.jpg', '2023-01-18 12:13:11'),
(225, 77, 'jorji1.jpg', '2023-01-18 12:13:11'),
(226, 77, 'Khaomanee_cat.jpg', '2023-01-18 12:13:11'),
(227, 77, 'pexels-pixabay-45201.jpg', '2023-01-18 12:13:11'),
(228, 77, 'puspin2.jpg', '2023-01-18 12:13:11'),
(229, 77, 'samantha.jpg', '2023-01-18 12:13:11'),
(230, 77, 'stix.jpg', '2023-01-18 12:13:11'),
(231, 77, 'stix2.jpg', '2023-01-18 12:13:11'),
(232, 77, 'stix3.jpg', '2023-01-18 12:13:11');

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
  `birthdate` date DEFAULT NULL,
  `photo_id` varchar(255) NOT NULL,
  `prof_pic` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `muniID` int(100) NOT NULL,
  `verified_id` varchar(255) DEFAULT 'no',
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`, `fname`, `lname`, `birthdate`, `photo_id`, `prof_pic`, `location`, `muniID`, `verified_id`, `date_time`) VALUES
(1, 'wan', 'wan@yahoo.com', '$2y$10$0To9.RRBGJ6RzTM0Ni7QgO0YPsC44WpFGtTVG7cOzZYuqqoc5dSWm', 'wan', 'wan', NULL, 'hehe.jpeg', NULL, NULL, 10, 'no', NULL),
(2, 'two', 'two@yahoo.com', '$2y$10$DiJbEIRecndAT.IK4TKF.eCREo81jMbS.0vyShyFlv.w.2xekFDcq', 'two', 'two', NULL, 'pic-na-retoke.jpg', NULL, NULL, 6, 'no', NULL),
(3, 'jw', 'jw@yahoo.com', '$2y$10$pyDEsSs9TYYtHAASvBaoRO1oQBVpm5Y4iwbzF/mhX0tufgRI6a2Ku', 'john', 'wall', NULL, 'hehe.jpeg', NULL, NULL, 17, 'no', NULL),
(4, 'ako', 'ako@gmail.com', '$2y$10$VtAFNTm.LXnVNjveW6hlxenvk.V.v/2EJ8UzPieD7rQyvBB5aPqZC', 'ako ay', 'bakit ', NULL, 'pic-na-retoke.jpg', NULL, NULL, 44, 'no', '2023-01-14 22:14:47');

-- --------------------------------------------------------

--
-- Structure for view `pets_owned`
--
DROP TABLE IF EXISTS `pets_owned`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pets_owned`  AS SELECT `u`.`userID` AS `userID`, `u`.`username` AS `username`, `u`.`fname` AS `fname`, `u`.`lname` AS `lname`, `m`.`muni_name` AS `muni_name`, `m`.`muniID` AS `muniID`, count(`p`.`petID`) AS `pets_owned` FROM ((`users` `u` join `pet` `p` on(`u`.`userID` = `p`.`userID`)) join `municipality` `m` on(`m`.`muniID` = `u`.`muniID`)) GROUP BY `u`.`fname``fname`  ;

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
  ADD KEY `user1` (`user1`),
  ADD KEY `user2` (`user2`);

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
  ADD PRIMARY KEY (`petID`);

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
  MODIFY `cLID` int(100) NOT NULL AUTO_INCREMENT;

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
  MODIFY `petID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pet_category`
--
ALTER TABLE `pet_category`
  MODIFY `pcID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pet_photo`
--
ALTER TABLE `pet_photo`
  MODIFY `petphoID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_photo`
--
ALTER TABLE `product_photo`
  MODIFY `prodphoID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shopID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `shop_photo`
--
ALTER TABLE `shop_photo`
  MODIFY `shopphoID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `chat_log_ibfk_1` FOREIGN KEY (`user1`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `chat_log_ibfk_2` FOREIGN KEY (`user2`) REFERENCES `users` (`userID`);

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
-- Constraints for table `product_photo`
--
ALTER TABLE `product_photo`
  ADD CONSTRAINT `product_photo_ibfk_1` FOREIGN KEY (`prodID`) REFERENCES `product` (`prodID`);

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
