-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 06:47 AM
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
-- Database: `fur_kanlungan`
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
  `status` varchar(255) NOT NULL DEFAULT 'posted',
  `given_to` int(100) NOT NULL DEFAULT 999999,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `status` varchar(255) NOT NULL DEFAULT 'posted',
  `given_to` int(100) NOT NULL DEFAULT 999999,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(999999, 'noone', '', '', '', '', '', 'admin.png', 18, 'no', '2023-02-15 12:30:11');

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
  ADD KEY `user2` (`reciever`),
  ADD KEY `message` (`message`),
  ADD KEY `photo` (`photo`);

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
  ADD KEY `userID` (`userID`),
  ADD KEY `given_to` (`given_to`),
  ADD KEY `name` (`name`);

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
  ADD KEY `name` (`name`),
  ADD KEY `given_to` (`given_to`);

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
  MODIFY `clinicID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinic_photo`
--
ALTER TABLE `clinic_photo`
  MODIFY `clinicphoID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `petID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet_category`
--
ALTER TABLE `pet_category`
  MODIFY `pcID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pet_photo`
--
ALTER TABLE `pet_photo`
  MODIFY `petphoID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_photo`
--
ALTER TABLE `product_photo`
  MODIFY `prodphoID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shopID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_photo`
--
ALTER TABLE `shop_photo`
  MODIFY `shopphoID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000002;

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
  ADD CONSTRAINT `deledopted_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `deledopted_ibfk_4` FOREIGN KEY (`given_to`) REFERENCES `users` (`userID`);

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `pet_ibfk_4` FOREIGN KEY (`pcID`) REFERENCES `pet_category` (`pcID`),
  ADD CONSTRAINT `pet_ibfk_5` FOREIGN KEY (`bcID`) REFERENCES `breed_category` (`bcID`),
  ADD CONSTRAINT `pet_ibfk_6` FOREIGN KEY (`given_to`) REFERENCES `users` (`userID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`shopID`) REFERENCES `shop` (`shopID`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`pcID`) REFERENCES `pet_category` (`pcID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`muniID`) REFERENCES `municipality` (`muniID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
