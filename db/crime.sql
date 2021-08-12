-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 12, 2021 at 10:28 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crime`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(15, 'admin', '12345'),
(16, 'john', '12345'),
(23, 'victor', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'Homicide', 'A homicide requires only a volitional act that causes the death of another, and thus a homicide may result from accidental, reckless or negligent acts even if there is no intent to cause harm.', '2021-08-01 04:55:13', NULL),
(2, 'Rape', 'Its an unlawful sexual activity, most often involving sexual intercourse against the will of the victim through force without the individual legal consent.', '2021-08-01 04:58:46', NULL),
(3, 'White Collar Crimes', 'Refers to a type of white collar crime in which a person entrusted with the finances of another person or business illegally takes that money for their own personal use.', '2021-08-01 04:59:17', NULL),
(4, 'Drugs', 'Drugs', '2021-08-01 05:03:32', NULL),
(5, 'Robbery', 'Robbery', '2021-08-01 05:03:51', NULL),
(7, 'Kidnapping', 'Kidnapping', '2021-08-01 05:10:47', NULL),
(9, 'Banditry ', '', '2021-08-01 16:46:56', NULL),
(11, 'Terrorism ', 'Terrorism ', '2021-08-07 13:39:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `crimeremark`
--

CREATE TABLE `crimeremark` (
  `id` int(11) NOT NULL,
  `crimeNumber` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crimeremark`
--

INSERT INTO `crimeremark` (`id`, `crimeNumber`, `status`, `remark`, `remarkDate`) VALUES
(25, 27, 'under investigation', 'The military will take action and move on a special operation.', '2021-08-06 22:14:00'),
(26, 30, 'under investigation', 'Sending troops over', '2021-08-06 22:30:45'),
(27, 27, 'closed', 'Its now over.', '2021-08-06 22:31:25'),
(28, 28, 'under investigation', ' of the society that is found culpable to have floated any specific component of the legal infrastructure.An ideal society is governed by laws and regulations that are collectively agreed upon and measurable consequences that will be meted out for any member of the society that is found culpable to have floated any specific component of the legal infrastructure.An ideal society is governed by laws and regulations that are collectively agreed upon and measurable consequences that will be meted out for any member of the society that is found culpable to have floated any specific component of the legal infrastructure.An ideal society is governed by laws and regulations that are collectively agreed upon and measurable consequences that', '2021-08-07 13:30:51'),
(29, 28, 'closed', 'sedrfghnjm,', '2021-08-07 13:31:45'),
(30, 29, 'under investigation', 'tweguhjkjhkgftrd', '2021-08-07 13:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `id` int(11) NOT NULL,
  `securityName` varchar(255) DEFAULT NULL,
  `securityDescription` tinytext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`id`, `securityName`, `securityDescription`, `postingDate`, `updationDate`) VALUES
(1, 'Army', 'Military Intelligence', '2021-08-01 05:11:41', NULL),
(2, 'Police', 'Police', '2021-08-01 05:14:27', NULL),
(3, 'DSS', 'Crime Department', '2021-08-01 05:14:52', NULL),
(4, 'Road Safety', 'Safety Department ', '2021-08-01 05:15:20', NULL),
(5, 'NPS', 'NPS', '2021-08-01 05:49:30', NULL),
(7, 'NSCDC', 'NSCDC', '2021-08-01 05:50:37', NULL),
(8, 'Nigeria Custom', 'Nigeria Custom', '2021-08-01 05:51:21', NULL),
(9, 'NDLEA', 'NDLEA', '2021-08-01 10:07:45', NULL),
(11, 'Nigeria Immigration ', 'Nigeria Immigration ', '2021-08-02 12:35:18', NULL),
(12, 'EFCC', 'Advance free fraud ', '2021-08-07 13:41:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, 1, 'First Degree Murder', '2021-08-01 05:05:36', NULL),
(2, 1, 'Second Degree Murder', '2021-08-01 05:05:48', NULL),
(3, 2, 'Sexual Assault ', '2021-08-01 05:06:04', NULL),
(4, 3, 'Forgery ', '2021-08-01 05:06:59', NULL),
(5, 3, 'Embezzlement ', '2021-08-01 05:07:32', NULL),
(6, 4, 'Drugs', '2021-08-01 05:08:02', NULL),
(7, 5, 'Robbery ', '2021-08-01 05:08:41', NULL),
(8, 7, 'Kidnapping', '2021-08-01 05:11:05', NULL),
(9, 9, 'banditry', '2021-08-01 16:48:00', NULL),
(10, 11, 'Terrorism ', '2021-08-07 13:41:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `super`
--

CREATE TABLE `super` (
  `id` int(11) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super`
--

INSERT INTO `super` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tblcrimes`
--

CREATE TABLE `tblcrimes` (
  `crimeNumber` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `security` varchar(255) DEFAULT NULL,
  `lga` varchar(255) DEFAULT NULL,
  `crimeLocation` varchar(255) DEFAULT NULL,
  `accusedName` varchar(255) DEFAULT NULL,
  `areaCommand` varchar(255) DEFAULT NULL,
  `crimeDetails` mediumtext DEFAULT NULL,
  `crimeFile` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT NULL,
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcrimes`
--

INSERT INTO `tblcrimes` (`crimeNumber`, `userId`, `category`, `subcategory`, `state`, `security`, `lga`, `crimeLocation`, `accusedName`, `areaCommand`, `crimeDetails`, `crimeFile`, `regDate`, `status`, `lastUpdationDate`) VALUES
(27, 13, 1, 'First Degree Murder', 'Kaduna', 'Army', 'Birnin Gwari', 'Birnin Gwari', 'herdsmen ', 'Kaduna', 'An ideal society is governed by laws and regulations that are collectively agreed upon and measurable consequences that will be meted out for any member of the society that is found culpable to have floated any specific component of the legal infrastructure.An ideal society is governed by laws and regulations that are collectively agreed upon and measurable consequences that will be meted out for any member of the society that is found culpable to have floated any specific component of the legal infrastructure.', '', '2021-08-06 22:11:39', 'closed', '2021-08-06 22:31:25'),
(28, 13, 2, 'Sexual Assault ', 'Cross River', 'Police', 'Ikom', 'Ikom', 'Femi', 'Ikom', 'An ideal society is governed by laws and regulations that are collectively agreed upon and measurable consequences that will be meted out for any member of the society that is found culpable to have floated any specific component of the legal infrastructure.An ideal society is governed by laws and regulations that are collectively agreed upon and measurable consequences that will be meted out for any member of the society that is found culpable to have floated any specific component of the legal infrastructure.An ideal society is governed by laws and regulations that are collectively agreed upon and measurable consequences that will be meted out for any member of the society that is found culpable to have floated any specific component of the legal infrastructure.An ideal society is governed by laws and regulations that are collectively agreed upon and measurable consequences that will be meted out for any member of the society that is found culpable to have floated any specific component of the legal infrastructure.', '', '2021-08-06 22:19:10', 'closed', '2021-08-07 13:31:46'),
(30, 13, 7, 'Kidnapping', 'Kaduna', 'Police', 'Zangon Kataf', 'Zangon', 'Hassan', 'Kaduna', 'An ideal society is governed by laws and regulations that are collectively agreed upon and measurable consequences that will be meted out for any member of the society that is found culpable to have floated any specific component of the legal infrastructure.An ideal society is governed by laws and regulations that are collectively agreed upon and measurable consequences that will be meted out for any member of the society that is found culpable to have floated any specific component of the legal infrastructure.An ideal society is governed by laws and regulations that are collectively agreed upon and measurable consequences that will be meted out for any member of the society that is found culpable to have floated any specific component of the legal infrastructure.', '', '2021-08-06 22:29:59', 'under investigation', '2021-08-06 22:30:45'),
(32, 24, 2, 'Sexual Assault ', 'Abia', 'Police', 'muahia South', 'abia', 'james', 'abia', 'class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"class=\"text-center\"', '', '2021-08-12 08:24:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `address` tinytext DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `userEmail`, `password`, `contactNo`, `address`, `country`, `userImage`, `regDate`, `updationDate`, `status`) VALUES
(13, 'Sanusi A.', 's@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '08012345678', 'Nigeria Defence Academy Afaka Kaduna State', 'Nigeria', NULL, '2021-08-02 09:52:08', '2021-08-06 22:08:45', 1),
(20, 'John J.', 'j@j.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '09012345678', NULL, NULL, NULL, '2021-08-06 22:44:45', '0000-00-00 00:00:00', 1),
(24, 'Victor Akuboh', 'victor@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '07035323371', NULL, NULL, NULL, '2021-08-12 08:19:01', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crimeremark`
--
ALTER TABLE `crimeremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super`
--
ALTER TABLE `super`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcrimes`
--
ALTER TABLE `tblcrimes`
  ADD PRIMARY KEY (`crimeNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `crimeremark`
--
ALTER TABLE `crimeremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `super`
--
ALTER TABLE `super`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcrimes`
--
ALTER TABLE `tblcrimes`
  MODIFY `crimeNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
