-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 01:13 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ammdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` char(50) DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` varchar(11) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'MARK TINTE', 'ADMIN', '09123011325', 'joshuatinte321@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-04-06 12:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `tblappointment`
--

CREATE TABLE `tblappointment` (
  `ID` int(10) NOT NULL,
  `AptNumber` varchar(80) DEFAULT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `MobileNumber` varchar(11) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `doctors` varchar(120) DEFAULT NULL,
  `AptDate` varchar(120) DEFAULT NULL,
  `AptTime` varchar(120) DEFAULT NULL,
  `Services` varchar(120) DEFAULT NULL,
  `Remark` varchar(225) NOT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp(),
  `Mark` varchar(250) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `View` varchar(50) NOT NULL,
  `ViewNotification` varchar(50) NOT NULL,
  `RemarkDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblappointment`
--

INSERT INTO `tblappointment` (`ID`, `AptNumber`, `Name`, `MobileNumber`, `Email`, `doctors`, `AptDate`, `AptTime`, `Services`, `Remark`, `ApplyDate`, `Mark`, `Status`, `View`, `ViewNotification`, `RemarkDate`) VALUES
(1, '727095573', 'JOSHUA TINTE', '09123123123', 'joshuatinte032@gmail.com', 'JOY ABRIGO', '04/09/2022', '09:00:00', 'Teeth Cleanings', '', '2022-04-05 07:43:51', '', '2', '1', '', '2022-04-06 13:49:28'),
(5, '393942764', 'GRACE AQUINO', '09123454654', '', 'Joy Abrigo', '2022-04-06', '11:00:00', 'Dental Checkup', '', '2022-04-06 10:03:57', '', '1', '', '', '2022-04-06 12:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `ID` int(11) NOT NULL,
  `Name` varchar(120) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Comments` varchar(255) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`ID`, `Name`, `Email`, `Comments`, `CreationDate`) VALUES
(1, 'MARK GABON', 'joshuatinte033@gmail.com', 'Thank you for taking care of my precious smile.', '2022-04-06 15:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomers`
--

CREATE TABLE `tblcustomers` (
  `ID` int(10) NOT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `MobileNumber` varchar(11) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `code2` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `Gender` enum('Female','Male','Transgender') NOT NULL,
  `Details` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomers`
--

INSERT INTO `tblcustomers` (`ID`, `Name`, `Email`, `password`, `MobileNumber`, `code`, `code2`, `status`, `Gender`, `Details`, `CreationDate`, `UpdationDate`) VALUES
(1, 'JOSHUA TINTE', 'joshuatinte032@gmail.com', '$2y$10$q/AEJ35vlK.3TRKZCwBRduv5DCjWN2X0SHmI2Zpp9Amcv1hbSSiEq', '09123123123', 0, 584452, 'verified', 'Female', NULL, '2022-04-02 02:16:51', '2022-04-18 10:40:47'),
(3, 'GRACE AQUINO', '', '', '09123454654', 0, 0, '', 'Female', NULL, '2022-04-06 10:03:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbldoctors`
--

CREATE TABLE `tbldoctors` (
  `ID` int(11) NOT NULL,
  `doctors` varchar(120) NOT NULL,
  `MobileNumber` varchar(11) NOT NULL,
  `Specialization` varchar(120) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldoctors`
--

INSERT INTO `tbldoctors` (`ID`, `doctors`, `MobileNumber`, `Specialization`, `Address`, `CreationDate`) VALUES
(1, 'Alex Browne', '09684635135', 'Endodontist', 'Bued, Calasiao, Pangasinan', '2022-04-02 02:41:40'),
(2, 'Joy Abrigo', '09126846565', 'Orthodontist', 'Poblacion East, Calasiao, Pangasinan', '2022-04-02 02:41:40'),
(3, 'Cristel Aquino', '09616846816', 'Pediatric', 'Cabilocaan, Calasiao, Pangasinan', '2022-04-02 02:41:40'),
(4, 'Jona Salazar', '09225464616', 'Periodontist ', 'Nalsian, Calasiao, Pangasinan', '2022-04-02 02:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `id` int(11) NOT NULL,
  `Userid` int(11) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT NULL,
  `BillingId` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsecretary`
--

CREATE TABLE `tblsecretary` (
  `ID` int(10) NOT NULL,
  `SecretaryName` char(50) DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` varchar(11) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsecretary`
--

INSERT INTO `tblsecretary` (`ID`, `SecretaryName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'PRINCESS CAMPENA', 'SECRETARY', '09123011325', 'princesscampena@gmail.com', 'b12ae6e2c451301e8c4ef943a2ced477', '2022-04-06 08:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int(10) NOT NULL,
  `ServiceName` varchar(200) DEFAULT NULL,
  `Cost` int(10) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ID`, `ServiceName`, `Cost`, `CreationDate`) VALUES
(1, 'Teeth Whitening', 600, '2022-04-02 02:47:39'),
(2, 'Teeth Cleanings', 500, '2022-04-02 02:47:39'),
(3, 'Dental Checkup', 50, '2022-04-02 02:47:39'),
(4, 'Dental Brace', 25000, '2022-04-02 02:47:39'),
(5, 'Dentures', 1500, '2022-04-02 02:47:39'),
(6, 'Tooth Extraction', 500, '2022-04-02 02:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbltime`
--

CREATE TABLE `tbltime` (
  `ID` int(11) NOT NULL,
  `time` time NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltime`
--

INSERT INTO `tbltime` (`ID`, `time`, `CreationDate`) VALUES
(1, '08:00:00', '2022-04-02 02:23:49'),
(2, '09:00:00', '2022-04-02 02:23:49'),
(3, '10:00:00', '2022-04-02 02:23:49'),
(4, '11:00:00', '2022-04-02 02:23:49'),
(5, '13:00:00', '2022-04-02 02:23:49'),
(6, '14:00:00', '2022-04-02 02:23:49'),
(7, '15:00:00', '2022-04-02 02:23:49'),
(8, '16:00:00', '2022-04-02 02:23:49'),
(9, '17:00:00', '2022-04-02 02:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserlogs`
--

CREATE TABLE `tbluserlogs` (
  `ID` int(11) NOT NULL,
  `Name` varchar(120) NOT NULL,
  `Status` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluserlogs`
--

INSERT INTO `tbluserlogs` (`ID`, `Name`, `Status`, `CreationDate`) VALUES
(1, '', 'joshuatinte032@gmail.com - Sucessfully Registered', '2022-04-02 02:16:52'),
(2, '', 'joshuatinte032@gmail.com - Change Password Sucessfully', '2022-04-02 02:19:36'),
(3, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-02 02:23:49'),
(4, '', 'joshuatinte032@gmail.com - Password Changed', '2022-04-02 03:10:38'),
(5, '', 'joshuatinte032@gmail.com - is already logout.', '2022-04-02 03:10:54'),
(6, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-02 03:36:09'),
(7, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-02 03:36:16'),
(8, '', 'ADMIN - Log in Sucessfully', '2022-04-02 03:44:15'),
(9, '', 'ADMIN - Updated Profile.', '2022-04-02 03:46:06'),
(10, '', ' - is already logout.', '2022-04-02 03:49:09'),
(11, '', 'SECRETARY - Log in Sucessfully', '2022-04-02 03:57:59'),
(12, '', 'SECRETARY - Log in Sucessfully', '2022-04-02 04:18:52'),
(13, '', 'ADMIN - Log in Sucessfully', '2022-04-02 05:45:23'),
(14, '', ' - is already logout.', '2022-04-02 05:48:24'),
(15, '', 'ADMIN - Log in Sucessfully', '2022-04-02 05:49:54'),
(16, '', ' - is already logout.', '2022-04-02 05:54:06'),
(17, '', 'ADMIN - Log in Sucessfully', '2022-04-02 06:09:28'),
(18, '', ' - is already logout.', '2022-04-02 06:10:08'),
(19, '', ' - is already logout.', '2022-04-02 06:10:10'),
(20, '', 'ADMIN - Log in Sucessfully', '2022-04-02 06:10:24'),
(21, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-02 13:23:36'),
(22, '', 'joshuatinte032@gmail.com - is already logout.', '2022-04-02 14:35:05'),
(23, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-02 14:35:21'),
(24, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-03 09:08:16'),
(25, '', 'SECRETARY - Log in Sucessfully', '2022-04-03 12:10:51'),
(26, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-04 03:38:39'),
(27, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 04:59:54'),
(28, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 05:02:23'),
(29, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 05:02:54'),
(30, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 05:03:27'),
(31, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 05:04:08'),
(32, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 05:07:26'),
(33, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 05:17:56'),
(34, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 05:34:28'),
(35, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 05:35:20'),
(36, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 05:35:44'),
(37, '', 'SECRETARY - Log in Sucessfully', '2022-04-04 05:37:14'),
(38, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 05:50:52'),
(39, '', 'joshuatinte032@gmail.com - is already logout.', '2022-04-04 07:28:07'),
(40, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-04 10:46:26'),
(41, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 11:06:14'),
(42, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 12:31:42'),
(43, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 12:39:41'),
(44, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 12:58:15'),
(45, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 13:01:16'),
(46, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 13:05:44'),
(47, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 14:10:26'),
(48, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 14:15:49'),
(49, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 14:18:16'),
(50, '', 'SECRETARY - Log in Sucessfully', '2022-04-04 14:21:15'),
(51, '', 'SECRETARY - Updated an appointment for JOSHUA TINTE ', '2022-04-04 14:49:14'),
(52, '', 'SECRETARY - Updated an appointment for JOSHUA TINTE ', '2022-04-04 14:50:23'),
(53, '', 'SECRETARY - Updated an appointment for JOSHUA TINTE ', '2022-04-04 14:59:19'),
(54, '', 'ADMIN - Log in Sucessfully', '2022-04-04 15:12:51'),
(55, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 15:13:04'),
(56, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 15:18:35'),
(57, '', 'SECRETARY - is already logout.', '2022-04-04 15:23:07'),
(58, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-04 16:26:34'),
(59, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-04 17:09:44'),
(60, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-04 17:21:44'),
(61, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-04 17:24:04'),
(62, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-04 17:28:39'),
(63, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-04 17:48:03'),
(64, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-04 18:14:27'),
(65, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-05 03:15:37'),
(66, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-05 03:17:17'),
(67, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-05 04:27:00'),
(68, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-05 05:30:20'),
(69, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-05 07:12:20'),
(70, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-05 07:43:51'),
(71, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-05 08:04:40'),
(72, '', 'SECRETARY - Log in Sucessfully', '2022-04-05 08:08:52'),
(73, '', 'SECRETARY - Updated an appointment for JOSHUA TINTE ', '2022-04-05 08:08:56'),
(74, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-05 08:23:52'),
(75, '', 'joshuatinte032@gmail.com - is already logout.', '2022-04-05 11:21:33'),
(76, '', 'joshuatinte030@gmail.com - Sucessfully Registered', '2022-04-05 12:27:27'),
(77, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-05 12:50:24'),
(78, '', 'joshuatinte032@gmail.com - is already logout.', '2022-04-05 12:54:08'),
(79, '', 'joshuatinte030@gmail.com - Change Password Sucessfully', '2022-04-05 13:02:51'),
(80, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-05 13:08:31'),
(81, '', 'joshuatinte032@gmail.com - requested for an appointment.', '2022-04-05 13:23:10'),
(82, '', 'joshuatinte032@gmail.com - Password Changed', '2022-04-05 15:07:51'),
(83, '', 'SECRETARY - Log in Sucessfully', '2022-04-06 08:24:32'),
(84, '', 'SECRETARY - made an appointment for GRACE AQUINO ', '2022-04-06 10:03:57'),
(85, '', 'SECRETARY - is already logout.', '2022-04-06 11:27:16'),
(86, '', 'ADMIN - Log in Sucessfully', '2022-04-06 12:51:26'),
(87, '', 'ADMIN - Updated Profile.', '2022-04-06 12:56:02'),
(90, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-06 13:49:17'),
(91, '', 'joshuatinte032@gmail.com - updated a profile.', '2022-04-06 13:49:28'),
(92, '', 'ADMIN - is already logout.', '2022-04-06 16:47:26'),
(93, '', 'SECRETARY - Log in Sucessfully', '2022-04-07 06:45:29'),
(94, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-18 10:36:55'),
(95, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-18 10:42:16'),
(96, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-18 10:56:09'),
(97, '', 'joshuatinte032@gmail.com - Log in Sucessfully', '2022-04-18 10:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblappointment`
--
ALTER TABLE `tblappointment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbldoctors`
--
ALTER TABLE `tbldoctors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tblsecretary`
--
ALTER TABLE `tblsecretary`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltime`
--
ALTER TABLE `tbltime`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluserlogs`
--
ALTER TABLE `tbluserlogs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbldoctors`
--
ALTER TABLE `tbldoctors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsecretary`
--
ALTER TABLE `tblsecretary`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbltime`
--
ALTER TABLE `tbltime`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbluserlogs`
--
ALTER TABLE `tbluserlogs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
