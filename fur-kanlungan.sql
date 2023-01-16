-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 12:27 PM
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
(2, 'clinic ni paulo', 'cpauloe@gmail.com', 8, 'eric de pertierra', '', '123456780', '10 - 20', 'walaasdasd', 'hehehedfg gsd', '2023-01-15 14:31:39'),
(3, 'rtyrt', 'sgserhdrtngd', 16, 'artertet', 'wergthh', '09301582145', 'ewrwrwrew', 'ertertetr', 'wrwrwrwerwer', '2023-01-15 18:19:08'),
(4, 'mn', 'mn', 20, 'mn', '', 'mn', 'mn', 'mn', 'mn', '2023-01-15 23:06:21'),
(5, 'ccdfdg', 'ccadas', 1, 'ccsdfsdf', '', 'cc', 'cc', 'cc', 'cc', '2023-01-16 00:26:55'),
(6, 'gh', 'gh', 21, 'gh', '', 'gh', 'gh', 'gh', 'gh', '2023-01-16 00:34:25');

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
(1, 4, 'hamster2.jpg', '2023-01-15 23:06:21'),
(2, 6, 'stix2.jpg', '2023-01-16 00:34:25'),
(3, 2, 'stix3.jpg', '2023-01-16 19:14:39'),
(4, 2, 'istockphoto-1217828258-170667a.jpg', '2023-01-16 19:15:17');

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
(10, 'manypic', 2021, 'male', 'yes', 'Why do stars fall down from the sky?', 3, 6, 3, '2023-01-15 18:09:09');

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
(103, 10, 'stix3.jpg', '2023-01-15 18:09:09');

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
(1, 2, 1, 'eric awaw', 'eric god', 7000, '2023-01-15 13:46:39'),
(6, 35, 3, 'daego', 'afduiahf aosid asd', 1234, '2023-01-16 01:50:55'),
(7, 2, 2, 'marimar', 'panggamot sa ubo ng pusa', 38, '2023-01-16 01:55:47'),
(8, 35, 3, 'earnie', 'parang robust ng daga at ibon', 565, '2023-01-16 01:56:22'),
(9, 40, 2, 'd', 'sdf', 56, '2023-01-16 01:58:18'),
(10, 40, 3, 'zz', 'zz', 0, '2023-01-16 02:02:06'),
(11, 40, 2, 'm', 'm', 0, '2023-01-16 02:10:45'),
(12, 40, 2, 'jb', 'bbbb', 90, '2023-01-16 02:11:11'),
(15, 29, 1, 'op', 'op', 90, '2023-01-16 02:15:11'),
(16, 2, 2, 'ty', 'ty', 67, '2023-01-16 02:15:35'),
(17, 35, 2, 'daryll', 'daryll troy', 456, '2023-01-16 13:27:05'),
(18, 23, 3, 'mmnb', 'yhghfghfgh', 789, '2023-01-16 14:52:29');

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
(3, 6, 'pexels-pixabay-45201.jpg', '2023-01-16 01:50:55'),
(4, 7, 'Campbells_dwarf.jpg', '2023-01-16 01:55:47'),
(5, 8, 'hamster1.jpg', '2023-01-16 01:56:22'),
(6, 9, 'stix3.jpg', '2023-01-16 01:58:18'),
(7, 10, 'stix3.jpg', '2023-01-16 02:02:06'),
(8, 11, 'jorji1.jpg', '2023-01-16 02:10:45'),
(9, 12, 'stix3.jpg', '2023-01-16 02:11:11'),
(12, 15, 'stix3.jpg', '2023-01-16 02:15:11'),
(13, 16, 'stix3.jpg', '2023-01-16 02:15:35'),
(14, 17, 'pic-na-retoke.jpg', '2023-01-16 13:27:05'),
(15, 18, 'Brown_Aspin.jpg', '2023-01-16 14:52:29'),
(16, 7, 'germanshepherd.jpg', '2023-01-16 14:59:46'),
(17, 6, 'hamster1.jpg', '2023-01-16 15:00:34'),
(18, 6, 'hamster1.jpg', '2023-01-16 15:01:07'),
(20, 1, 'hehe.jpeg', '2023-01-16 15:20:12'),
(21, 1, 'jorji1.jpg', '2023-01-16 15:23:18'),
(22, 1, 'puspin2.jpg', '2023-01-16 15:24:02'),
(23, 1, 'samantha.jpg', '2023-01-16 15:24:02'),
(24, 1, 'stix2.jpg', '2023-01-16 15:24:02'),
(25, 1, 'stix2.jpg', '2023-01-16 15:40:39'),
(26, 1, 'stix3.jpg', '2023-01-16 15:40:39'),
(27, 1, 'stix2.jpg', '2023-01-16 15:42:46'),
(28, 1, 'stix3.jpg', '2023-01-16 15:42:46'),
(29, 6, 'hamster2.jpg', '2023-01-16 15:44:41'),
(30, 1, 'stix2.jpg', '2023-01-16 15:48:29');

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
(1, 'pet shop 100', 'petshop@gmail.com', 'kenneth del rosario', 1, '', '93021542', '10am - 11pmmon - fri', 'pet care', 'this is a very nice pet shop', '2023-01-11 15:15:53'),
(2, 'Alagaan', 'alagaan@yahoo.com', 'Maria Sta.Maria', 18, 'Perez Boulevard, Dagupan City', '2589632', '9-10', 'wala pa', 'maganda dito', '2023-01-21 16:05:07'),
(23, 'ty', 'rt', 'dfhsdf', 3, '', 'dfgdfg', 'asdasdasd', 'rtyrtyr', 'erwerwerwr', '2023-01-15 22:25:27'),
(24, 't', 'p', '', 48, '', '', '', '', '', '2023-01-15 22:25:54'),
(26, 'n', 'n', '', 6, '', '', '', '', '', '2023-01-15 22:27:14'),
(29, 'p', 'q', 'p', 19, '', '', '', '', '', '2023-01-15 22:28:51'),
(30, 'i', 'i', 'i', 4, '', 'i', '', '', '', '2023-01-15 22:30:36'),
(31, 'b', 'b', 'b', 14, '', 'b', 'b', '', '', '2023-01-15 22:31:36'),
(33, 'h', 'h', 'h', 17, '', 'h', 'h', 'h', 'h', '2023-01-15 22:33:26'),
(35, 'tae', 'tae', 'tae', 18, '', 'tae', 'tae', 'tae', 'tae', '2023-01-15 22:34:42'),
(36, 'hjk', 'hjk', 'hjk', 20, '', 'hjk', 'hjk', 'hjk', 'hjk', '2023-01-15 22:35:49'),
(38, 'g', 'g', 'g', 17, '', 'g', 'g', 'g', 'g', '2023-01-15 22:40:55'),
(40, 'vb', 'vb', 'vb', 18, '', 'vb', 'vb', 'vbv', 'vb', '2023-01-15 22:52:12'),
(41, 'cc', 'cc', 'cc', 20, '', 'cc', 'cc', 'cc', 'cc', '2023-01-16 00:27:11');

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
(1, 36, 'samantha.jpg', '2023-01-15 22:35:49'),
(2, 38, 'hamster1.jpg', '2023-01-15 22:43:14'),
(3, 23, 'samantha.jpg', '2023-01-16 19:24:38'),
(4, 23, 'stix.jpg', '2023-01-16 19:24:38'),
(5, 23, 'stix2.jpg', '2023-01-16 19:24:38'),
(6, 23, 'stix3.jpg', '2023-01-16 19:24:38');

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
  MODIFY `clinicID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clinic_photo`
--
ALTER TABLE `clinic_photo`
  MODIFY `clinicphoID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `petID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pet_category`
--
ALTER TABLE `pet_category`
  MODIFY `pcID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pet_photo`
--
ALTER TABLE `pet_photo`
  MODIFY `petphoID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_photo`
--
ALTER TABLE `product_photo`
  MODIFY `prodphoID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shopID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `shop_photo`
--
ALTER TABLE `shop_photo`
  MODIFY `shopphoID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
