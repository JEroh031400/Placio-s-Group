-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql201.epizy.com
-- Generation Time: May 24, 2021 at 10:55 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_28471577_yacht`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `AccountID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Updationdate` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`AccountID`, `Name`, `Address`, `Email`, `Contact`, `Gender`, `password`, `Updationdate`) VALUES
(199065, 'cj jones', '', 'abcde@gmail.com', '09192518988', 'male', '21232f297a57a5a743894a0e4a801fc3', ''),
(226993, 'David John Tesoro', 'Batangas', 'davidjohn.tesoro@g.batstate-u.edu.ph', '09192518988', 'male', '21232f297a57a5a743894a0e4a801fc3', ''),
(269214, 'Calvs placio', 'Batangas', 'Calvinjohn.placio@g.batstate-u.edu.ph', '2355222323', 'male', '21232f297a57a5a743894a0e4a801fc3', ''),
(390657, 'Cj Peter', '', 'placiocalvin@gmail.com', '3252352352353', 'male', '21232f297a57a5a743894a0e4a801fc3', ''),
(816022, 'Rizzalyn Ramirez', '', 'rizzalynramirez123099@gmail.com', '09192518988', 'female', '21232f297a57a5a743894a0e4a801fc3', ''),
(863264, 'calvin villaluna Placio', 'Dasmarinas,Cavite', 'calvplacio@gmail.com', '09192518988', 'male', '21232f297a57a5a743894a0e4a801fc3', ''),
(995816, 'Calvin James', '', 'calvin@gmail.com', '09192518988', 'others', '21232f297a57a5a743894a0e4a801fc3', ''),
(147354, 'Shewn Carl Mercado', '', 'shewncarl.mercado@g.batstate-u.edu.ph', '6737605050', 'male', '21232f297a57a5a743894a0e4a801fc3', ''),
(534394, 'Rodelyn Pondare', '', 'rfpondare@gmail.com', '9958167902', 'female', '21232f297a57a5a743894a0e4a801fc3', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-01-24 16:21:18', '18-11-2020 09:25:18 AM');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `courseCode` varchar(255) DEFAULT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `courseUnit` varchar(255) DEFAULT NULL,
  `InstructorID` varchar(50) NOT NULL,
  `noofSeats` int(11) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `courseCode`, `courseName`, `courseUnit`, `InstructorID`, `noofSeats`, `creationDate`, `updationDate`) VALUES
(1, 'PHP01', 'Core PHP', '1-5', '5', 10, '2017-02-11 17:39:10', '21-11-2020 10:30:02 AM'),
(2, 'WP01', 'Wordpress', '1-6', '5', 1, '2017-02-11 17:52:25', '21-11-2020 10:29:55 AM'),
(4, 'MYSQL23', 'MYSQL', '1-8', '5', 20, '2017-02-11 18:47:25', '21-11-2020 10:29:46 AM'),
(5, 'IT-111', 'Introduction to computing', '3', '5', 11, '2020-11-18 04:06:39', '20-12-2020 09:17:32 AM'),
(6, 'CISCO1', 'Computer networking 1', '3', '6', 50, '2020-11-19 12:38:43', '01-12-2020 09:57:49 AM');

-- --------------------------------------------------------

--
-- Table structure for table `courseenrolls`
--

CREATE TABLE `courseenrolls` (
  `id` int(11) NOT NULL,
  `studentRegno` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `Grade` double NOT NULL,
  `session` int(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `enrollDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseenrolls`
--

INSERT INTO `courseenrolls` (`id`, `studentRegno`, `pincode`, `Grade`, `session`, `department`, `level`, `semester`, `course`, `enrollDate`) VALUES
(4, '10806121', '715948', 0, 4, 7, 6, 5, 2, '2018-05-21 10:19:41'),
(5, '12345', '131863', 0, 4, 7, 6, 6, 1, '2018-08-25 05:52:34'),
(6, '11', '725834', 0, 1, 7, 5, 4, 1, '2020-11-18 04:00:03'),
(7, '11', '725834', 0, 2, 8, 5, 4, 5, '2020-11-18 04:08:58'),
(8, '11', '725834', 0, 4, 8, 6, 7, 4, '2020-11-20 03:34:00'),
(9, '18', '690561', 0, 4, 8, 5, 7, 5, '2020-11-21 05:42:56'),
(10, '19', '508378', 0, 4, 8, 5, 7, 5, '2020-11-21 05:43:47'),
(11, '20', '331777', 0, 4, 8, 5, 7, 5, '2020-11-21 05:44:23'),
(12, '21', '891532', 0, 3, 8, 5, 7, 5, '2020-11-21 05:45:09'),
(13, '11', '725834', 0, 4, 8, 6, 7, 6, '2020-12-01 04:29:05'),
(14, '349125', '166631', 0, 4, 8, 5, 7, 6, '2020-12-20 03:10:06'),
(15, '948944', '841253', 0, 4, 8, 5, 7, 5, '2020-12-20 03:15:01'),
(16, '895511', '508867', 0, 4, 8, 5, 7, 5, '2020-12-20 03:15:47'),
(17, '858967', '465295', 0, 4, 8, 5, 7, 5, '2020-12-20 03:16:58'),
(18, '836860', '429663', 0, 4, 8, 5, 7, 5, '2020-12-20 03:18:36'),
(19, '432512', '835688', 0, 4, 8, 5, 7, 5, '2020-12-20 03:44:14'),
(20, '349125', '166631', 0, 4, 8, 5, 7, 5, '2020-12-20 03:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `creationDate`) VALUES
(8, 'CECS', '2020-11-18 04:03:05'),
(9, 'CTE', '2020-11-18 04:05:38'),
(10, 'CIT', '2020-11-18 04:05:44'),
(12, 'CAS', '2020-11-18 04:05:57'),
(13, 'CABEIGHM', '2020-11-18 04:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `FacultyID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Photo` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FacultyID`, `Name`, `Username`, `Password`, `Photo`) VALUES
(1, 'Albert Paytaren', 'Abet', '25d55ad283aa400af464c76d713c07ad', 0),
(3, 'Romeo Concepcion', 'meoshi', '21232f297a57a5a743894a0e4a801fc3', 0),
(4, 'Djoana Marie V Salac', 'Dj', '21232f297a57a5a743894a0e4a801fc3', 0),
(5, 'Calvin John Placio', 'cjohn4', '21232f297a57a5a743894a0e4a801fc3', 0),
(6, 'Shewn Carl V Mercado', 'Shewn', '21232f297a57a5a743894a0e4a801fc3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prodid` int(11) NOT NULL,
  `Productname` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `price` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prodid`, `Productname`, `Photo`, `price`) VALUES
(121083, 'engine Overhaul', 'FB_IMG_16124083123450866.jpg', 27000),
(246206, 'Parking fee', 'FB_IMG_16124081732575158.jpg', 25000),
(550286, 'Yacht ropes', 'bk.jpg', 150),
(892894, 'Engine overhaul', 'Overhaul_3_DEUTZ_8SBVM540_01.jpg', 25000.23),
(476232, 'repaint', 'download (2).jpg', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `prtransaction`
--

CREATE TABLE `prtransaction` (
  `TransactionID` int(11) NOT NULL,
  `prodid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double NOT NULL,
  `purchasedate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ServiceID` int(11) NOT NULL,
  `Servicename` varchar(255) NOT NULL,
  `Servicedesc` varchar(255) NOT NULL,
  `Serviceprice` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `servtransaction`
--

CREATE TABLE `servtransaction` (
  `TransactionID` int(11) NOT NULL,
  `servID` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servtransaction`
--

INSERT INTO `servtransaction` (`TransactionID`, `servID`, `price`) VALUES
(936827, 246206, 175000),
(936827, 121083, 27000),
(548797, 246206, 300000),
(733179, 246206, 0),
(733179, 121083, 27000),
(733179, 550286, 150),
(733179, 892894, 25000.23),
(548797, 121083, 27000),
(326330, 246206, 0),
(326330, 121083, 27000),
(718525, 246206, 350000),
(718525, 121083, 27000),
(718525, 550286, 150),
(149299, 246206, -125000),
(559363, 246206, 225000),
(559363, 121083, 27000),
(559363, 476232, 150),
(109841, 246206, 0),
(109841, 121083, 27000),
(109841, 550286, 150),
(109841, 476232, 25000.23),
(150986, 246206, 0),
(150986, 121083, 27000),
(150986, 550286, 150),
(150986, 892894, 25000.23);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`ID`, `Name`, `Email`, `password`, `Contact`, `Position`) VALUES
(11111, 'Chito Cruz', 'calvsplacio@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '09676800335', 'Admin\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentRegno` varchar(255) NOT NULL,
  `studentPhoto` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `studentName` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `creationdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentRegno`, `studentPhoto`, `password`, `studentName`, `pincode`, `creationdate`, `updationDate`) VALUES
('11', 'image.jpg', 'f925916e2754e5e03f75dd58a5733251', 'calvin john placio', '725834', '2020-11-18 03:55:56', NULL),
('18', NULL, '21232f297a57a5a743894a0e4a801fc3', 'Peter Simon', '690561', '2020-11-21 05:40:08', NULL),
('19', NULL, '21232f297a57a5a743894a0e4a801fc3', 'Simon edwards', '508378', '2020-11-21 05:40:20', NULL),
('194346', NULL, '21232f297a57a5a743894a0e4a801fc3', 'Chris Bosh', '754682', '2020-12-05 04:26:20', NULL),
('20', NULL, '21232f297a57a5a743894a0e4a801fc3', 'Jude third', '331777', '2020-11-21 05:40:35', NULL),
('21', NULL, '21232f297a57a5a743894a0e4a801fc3', 'Obi toppin', '891532', '2020-11-21 05:40:49', NULL),
('22', NULL, '21232f297a57a5a743894a0e4a801fc3', 'carlsen edward', '197937', '2020-11-21 05:41:39', NULL),
('349125', 'Staff.png', 'f925916e2754e5e03f75dd58a5733251', 'James Johnson', '166631', '2020-12-20 03:02:42', NULL),
('386663', NULL, 'password', 'Isaac Okpala', '746463', '2020-12-20 03:03:27', NULL),
('425948', NULL, 'password', 'John eroh bauyon', '814594', '2020-12-20 03:01:48', NULL),
('432512', NULL, 'f925916e2754e5e03f75dd58a5733251', 'Isaac Okpala', '835688', '2020-12-20 03:03:31', NULL),
('490471', NULL, 'password', 'Kemba Walker', '399017', '2020-12-20 03:04:35', NULL),
('579323', NULL, 'password', 'Jaymark garcia', '363239', '2020-12-20 03:02:08', NULL),
('727276', NULL, 'password', 'Carl bryan Cruz', '148366', '2020-12-20 03:03:43', NULL),
('760511', NULL, 'password', 'Shewn carl mercado', '643403', '2020-12-20 03:01:40', NULL),
('836860', NULL, 'f925916e2754e5e03f75dd58a5733251', 'David John Tesoro', '429663', '2020-12-20 03:02:00', NULL),
('858967', 'Tinay.mp4', 'f925916e2754e5e03f75dd58a5733251', 'Kevin Garnett', '465295', '2020-12-20 03:02:48', NULL),
('895511', NULL, 'f925916e2754e5e03f75dd58a5733251', 'Kobe Bryant', '508867', '2020-12-20 03:02:29', NULL),
('948944', NULL, 'f925916e2754e5e03f75dd58a5733251', 'Xavier Ashly Javier', '841253', '2020-12-20 03:02:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tr`
--

CREATE TABLE `tr` (
  `TransactionID` int(11) NOT NULL,
  `AccountID` int(11) DEFAULT NULL,
  `Photo` longtext,
  `BoatModel` longtext,
  `Description` longtext,
  `StatusOfRepair` longtext,
  `ServiceFee` double DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Finished` date NOT NULL,
  `Feedback` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr`
--

INSERT INTO `tr` (`TransactionID`, `AccountID`, `Photo`, `BoatModel`, `Description`, `StatusOfRepair`, `ServiceFee`, `Date`, `Finished`, `Feedback`) VALUES
(109841, 390657, 'FB_IMG_16124081655960591.jpg', 'Tesyd', 'description of repair need ex fiber glass work or repaint', 'Finished already picked up', 52150.229999999996, '2021-06-05', '2021-05-23', 'the repair was good thanks'),
(137570, 390657, 'FB_IMG_16124083032972524.jpg', 'tt', 'repaint', 'Pending', 0, '2021-03-01', '0000-00-00', ''),
(149299, 390657, 'Calculate.png', 'no[s', 'description of repair need ex fiber glass work or repaint', 'Finished already picked up', 0, '2021-11-03', '2021-05-18', 'Good repair nice job chito'),
(161156, 390657, 'bk3.jpg', 'dsdgdsg', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '0000-00-00', '0000-00-00', ''),
(168560, 390657, 'bk4.jpg', 'christsmas yacht', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-12-09', '0000-00-00', ''),
(176339, 390657, 'FB_IMG_16124083032972524.jpg', 'Lalutaya', 'woods', 'Pending', 0, '2021-09-25', '0000-00-00', ''),
(233870, 390657, 'attach.png', 'asf', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-07-01', '0000-00-00', ''),
(237720, 390657, 'bk2.jpg', 'Tryings', 'repaint', 'Pending', 0, '2021-05-15', '0000-00-00', ''),
(254388, 390657, 'attach.png', 'asf', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-07-01', '0000-00-00', ''),
(280916, 390657, 'FB_IMG_16124083032972524.jpg', 'testing', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-02-11', '0000-00-00', ''),
(282587, 390657, 'attach.png', 'asf', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-07-01', '0000-00-00', ''),
(415315, 390657, 'FB_IMG_16124083032972524.jpg', 'Lalutaya', 'woods', 'Pending', 0, '2021-09-25', '0000-00-00', ''),
(429924, 390657, 'FB_IMG_16124083123450866.jpg', 'Tesh', ' fiber glass work or repaint', 'Pending', 0, '2021-03-08', '0000-00-00', ''),
(434128, 390657, 'Deduction.png', 'woodste', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-10-01', '0000-00-00', ''),
(461201, 390657, 'Add_Employee.png', 'Jans', ' repaint', 'Pending', 0, '2022-01-22', '0000-00-00', ''),
(548797, 226993, 'Add_Employee.png', 'Boat-132', 'paint', 'Finished already picked up', 327000, '2020-04-26', '2021-05-06', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(553080, 226993, 'Add_Employee.png', 'Boat-132', 'paint', 'Pending', 0, '2020-04-26', '0000-00-00', ''),
(611908, 390657, 'FB_IMG_16124083032972524.jpg', 'testing', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-02-11', '0000-00-00', ''),
(718525, 226993, 'A475769E-03E2-480A-BA0D-BF0A743BD61F.jpeg', 'Boat-132', 'Brain', 'Finished ready for pick up', 377150, '2020-03-08', '2021-05-23', ''),
(739840, 390657, 'Deduction.png', 'woodste', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-10-01', '0000-00-00', ''),
(815278, 390657, 'bk.jpg', 'ds', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-08-09', '0000-00-00', ''),
(830318, 390657, 'attach.png', 'asf', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-07-01', '0000-00-00', ''),
(848803, 390657, 'bk4.jpg', 'dgd', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-07-30', '0000-00-00', ''),
(880097, 390657, 'bk4.jpg', 'dgd', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-07-30', '0000-00-00', ''),
(936223, 390657, 'Allowance.png', 'sdsdsd', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-09-02', '0000-00-00', ''),
(936827, 226993, 'PicsArt_04-24-07.42.09.jpg', 'Speed boat', 'reps', 'Finished already picked up', 202000, '2020-09-25', '2021-04-25', 'the repair was good thanks, my boat is now in good condition'),
(964343, 390657, 'bk4.jpg', 'dgd', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-07-30', '0000-00-00', ''),
(980469, 390657, 'attach.png', 'asf', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-07-01', '0000-00-00', ''),
(679264, 226993, 'IMG_20200411_120809.jpg', 'bangka ni ashly', 'Sira ang katig', 'Canceled', 0, '2021-05-31', '0000-00-00', ''),
(969773, 226993, 'images.jpg', 'ashly yacht 2021', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '0000-00-00', '0000-00-00', ''),
(336772, 226993, 'photo-1567899378494-47b22a2ae96a.jpg', 'benj yacht', 'description of repair need ex fiber glass work or repaint', 'Canceled', 0, '0000-00-00', '0000-00-00', ''),
(733179, 147354, 'FB_IMG_16201297499113180.jpg', 'Yacht1', ' fiber glass work or repaint', 'Parked in the docks', 52150.229999999996, '2021-05-07', '2021-05-06', ''),
(559363, 863264, 'images (2).jpg', 'Boats', 'Repaint', 'Finished already picked up', 252150, '2020-08-01', '2021-05-21', ''),
(114714, 269214, 'yacht3.jfif', 'Boat calvs', 'repaint', 'Pending', 0, '2021-06-01', '0000-00-00', ''),
(474293, 226993, 'images (2).jpg', 'testings', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-22', '0000-00-00', ''),
(857510, 269214, 'images (2).jpg', 'Lalu-357', 'Glass work', 'Pending', 0, '2020-12-03', '0000-00-00', ''),
(150986, 226993, 'CB309370-7CA4-4264-B7F5-8AFA7C726107.jpeg', 'Ak47', 'description of repair need ex fiber glass work or repaint', 'Finished already picked up', 52150.229999999996, '2021-05-25', '2021-05-23', ''),
(635593, 226993, 'download.jpg', 'karo', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '0000-00-00', '0000-00-00', ''),
(427604, 226993, 'download.jpg', 'van', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '0000-00-00', '0000-00-00', ''),
(870129, 226993, 'download.jpg', 'karo', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', ''),
(809358, 226993, 'download.jpg', 'van', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', ''),
(377396, 226993, 'download.jpg', 'bike', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', ''),
(385990, 226993, 'download.jpg', 'a1', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', ''),
(125586, 226993, 'download.jpg', 'Z3', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', ''),
(658398, 226993, 'download.jpg', 'k9', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', ''),
(943488, 226993, 'download.jpg', 'ASD', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', ''),
(594982, 226993, 'download.jpg', 'b2', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', ''),
(989212, 226993, 'download.jpg', 'mustang3', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', ''),
(227731, 226993, 'download.jpg', 'l3', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', ''),
(553518, 226993, 'download.jpg', 'c2', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', ''),
(747748, 226993, 'download.jpg', 'Spander', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', ''),
(161364, 226993, 'download.jpg', 'Enova', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', ''),
(700074, 226993, 'download.jpg', 'Covie', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', ''),
(687555, 226993, 'download.jpg', 'Scam', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', ''),
(821512, 226993, 'download.jpg', 'Rider1000', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', ''),
(860921, 226993, '49515525-F516-49DA-B416-5B5C5D70007E.jpeg', 'Dj', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-05-24', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `ServiceFee` double NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionID`, `AccountID`, `Photo`, `Model`, `Description`, `Status`, `ServiceFee`, `date`) VALUES
(0, 0, '$photo', '$yachtmodel', '$description', 'Pending', 0, '2021-03-03'),
(211914, 863264, 'headerlogo.jpg', '', 'Fiber glass work', 'Pending', 0, '2021-02-28'),
(328211, 863264, 'FB_IMG_16124081655960591.jpg', '', 'Repaint', 'Pending', 0, '2021-03-01'),
(699038, 863264, 'img.jpg', '', 'Repaint', 'Pending', 0, '2021-02-28'),
(776051, 863264, 'FB_IMG_16124081732575158.jpg', '', 'description of repair need ex fiber glass work or repaint', 'Pending', 0, '2021-02-28'),
(876412, 863264, 'slip.png', 'Boating', 'Gauge', 'Pending', 0, '2021-03-03'),
(900428, 863264, 'FB_IMG_16124082384756030.jpg', 'Boat-132', 'Overhaul engine', 'Pending', 0, '2021-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `studentRegno` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `studentRegno`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:05:58', '', 1),
(2, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:07:18', '', 1),
(3, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:08:46', '', 1),
(4, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:26:15', '', 1),
(5, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:27:11', '', 1),
(6, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:28:19', '', 1),
(7, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:29:30', '', 1),
(8, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:30:39', '12-02-2017 02:00:40 AM', 1),
(9, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:32:12', '12-02-2017 02:21:40 AM', 1),
(10, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:51:50', '12-02-2017 05:14:45 AM', 1),
(11, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-12 05:41:24', '12-02-2017 11:49:58 AM', 1),
(12, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-12 06:20:05', '', 1),
(13, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-12 06:20:23', '12-02-2017 12:09:59 PM', 1),
(14, '10806121', 0x3a3a3100000000000000000000000000, '2018-05-21 09:49:06', '21-05-2018 03:30:53 PM', 1),
(15, '10806121', 0x3a3a3100000000000000000000000000, '2018-05-21 10:19:15', '', 1),
(16, '12345', 0x3a3a3100000000000000000000000000, '2018-08-25 05:51:42', '25-08-2018 11:23:02 AM', 1),
(17, '11', 0x3a3a3100000000000000000000000000, '2020-11-18 03:58:12', '18-11-2020 09:30:09 AM', 1),
(18, '11', 0x3a3a3100000000000000000000000000, '2020-11-18 04:07:10', '18-11-2020 09:39:36 AM', 1),
(19, '11', 0x3a3a3100000000000000000000000000, '2020-11-18 14:58:44', '18-11-2020 08:31:32 PM', 1),
(20, '11', 0x3a3a3100000000000000000000000000, '2020-11-20 03:06:23', '20-11-2020 09:04:11 AM', 1),
(21, '11', 0x3a3a3100000000000000000000000000, '2020-11-21 04:24:14', '21-11-2020 09:54:31 AM', 1),
(22, '11', 0x3a3a3100000000000000000000000000, '2020-11-21 04:39:43', '21-11-2020 10:11:02 AM', 1),
(23, '18', 0x3a3a3100000000000000000000000000, '2020-11-21 05:42:19', '21-11-2020 11:13:08 AM', 1),
(24, '19', 0x3a3a3100000000000000000000000000, '2020-11-21 05:43:13', '21-11-2020 11:13:49 AM', 1),
(25, '20', 0x3a3a3100000000000000000000000000, '2020-11-21 05:43:56', '21-11-2020 11:14:26 AM', 1),
(26, '21', 0x3a3a3100000000000000000000000000, '2020-11-21 05:44:30', '21-11-2020 11:15:22 AM', 1),
(27, '11', 0x3a3a3100000000000000000000000000, '2020-11-24 03:44:13', NULL, 1),
(28, '11', 0x3a3a3100000000000000000000000000, '2020-11-29 17:39:34', '29-11-2020 11:10:16 PM', 1),
(29, '11', 0x3a3a3100000000000000000000000000, '2020-11-29 17:52:54', NULL, 1),
(30, '11', 0x3a3a3100000000000000000000000000, '2020-12-01 04:28:21', '01-12-2020 09:59:09 AM', 1),
(31, '11', 0x3a3a3100000000000000000000000000, '2020-12-02 13:06:08', '02-12-2020 06:36:52 PM', 1),
(32, '11', 0x3a3a3100000000000000000000000000, '2020-12-06 14:56:47', '06-12-2020 08:27:12 PM', 1),
(33, '11', 0x3a3a3100000000000000000000000000, '2020-12-14 06:59:45', '14-12-2020 12:30:09 PM', 1),
(34, '349125', 0x3a3a3100000000000000000000000000, '2020-12-20 03:09:15', '20-12-2020 08:40:16 AM', 1),
(35, '948944', 0x3a3a3100000000000000000000000000, '2020-12-20 03:14:18', '20-12-2020 08:45:04 AM', 1),
(36, '895511 ', 0x3a3a3100000000000000000000000000, '2020-12-20 03:15:17', '20-12-2020 08:46:02 AM', 1),
(37, '858967', 0x3a3a3100000000000000000000000000, '2020-12-20 03:16:22', '20-12-2020 08:47:59 AM', 1),
(38, '836860', 0x3a3a3100000000000000000000000000, '2020-12-20 03:18:11', '20-12-2020 08:48:38 AM', 1),
(39, '11', 0x3a3a3100000000000000000000000000, '2020-12-20 03:30:40', '20-12-2020 09:01:41 AM', 1),
(40, '432512', 0x3a3a3100000000000000000000000000, '2020-12-20 03:43:38', '20-12-2020 09:14:22 AM', 1),
(41, '11', 0x3a3a3100000000000000000000000000, '2020-12-20 03:44:42', '20-12-2020 09:15:23 AM', 1),
(42, '349125', 0x3a3a3100000000000000000000000000, '2020-12-20 03:45:40', '20-12-2020 09:19:29 AM', 1),
(43, '11', 0x3a3a3100000000000000000000000000, '2021-01-17 00:09:39', '17-01-2021 05:39:54 AM', 1),
(44, '11', 0x3a3a3100000000000000000000000000, '2021-01-31 03:38:40', '31-01-2021 09:16:11 AM', 1),
(45, '11', 0x3a3a3100000000000000000000000000, '2021-01-31 15:14:01', NULL, 1),
(46, '11', 0x3a3a3100000000000000000000000000, '2021-02-05 11:59:07', '05-02-2021 05:37:44 PM', 1),
(47, '11', 0x3a3a3100000000000000000000000000, '2021-02-07 05:54:57', '07-02-2021 11:34:42 AM', 1),
(48, '11', 0x3a3a3100000000000000000000000000, '2021-02-09 13:08:55', '09-02-2021 06:39:02 PM', 1),
(49, '11', 0x3a3a3100000000000000000000000000, '2021-02-09 13:45:15', '09-02-2021 07:15:46 PM', 1),
(50, '11', 0x3a3a3100000000000000000000000000, '2021-02-19 05:36:20', '19-02-2021 11:07:14 AM', 1),
(51, '11', 0x3a3a3100000000000000000000000000, '2021-02-19 05:38:00', '28-02-2021 01:10:34 PM', 1),
(52, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-23 12:59:32', '23-02-2021 06:36:02 PM', 1),
(53, 'Cruz@yahoo.com', 0x3a3a3100000000000000000000000000, '2021-02-23 13:09:33', '23-02-2021 06:50:21 PM', 1),
(54, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-24 02:42:39', '24-02-2021 08:13:44 AM', 1),
(55, 'ashjavier@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-24 02:43:56', '24-02-2021 08:16:53 AM', 1),
(56, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-24 02:47:02', NULL, 1),
(57, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-24 03:05:18', '24-02-2021 08:41:46 AM', 1),
(58, '', 0x3a3a3100000000000000000000000000, '2021-02-24 03:11:52', NULL, 1),
(59, '', 0x3a3a3100000000000000000000000000, '2021-02-24 03:12:14', NULL, 1),
(60, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-24 03:12:50', NULL, 1),
(61, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-24 13:40:11', '24-02-2021 07:29:20 PM', 1),
(62, 'ashjavier@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-24 14:00:12', '24-02-2021 08:08:01 PM', 1),
(63, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-25 01:19:22', '25-02-2021 06:50:11 AM', 1),
(64, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-25 01:20:26', '25-02-2021 07:05:04 AM', 1),
(65, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-25 01:36:11', '25-02-2021 07:37:35 AM', 1),
(66, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-25 02:09:57', '25-02-2021 07:57:18 AM', 1),
(67, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-25 02:30:55', '25-02-2021 08:01:10 AM', 1),
(68, 'ashjavier@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-25 02:31:21', '25-02-2021 08:02:11 AM', 1),
(69, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-28 06:47:20', '28-02-2021 12:17:42 PM', 1),
(70, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-28 07:13:27', '28-02-2021 12:43:57 PM', 1),
(71, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-28 07:15:17', NULL, 1),
(72, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-28 07:40:40', NULL, 1),
(73, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-28 12:20:57', NULL, 1),
(74, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-01 10:02:10', NULL, 1),
(75, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-02 16:22:18', NULL, 1),
(76, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-03 07:53:16', NULL, 1),
(77, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-04 09:09:58', NULL, 1),
(78, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-04 11:10:21', '04-03-2021 04:46:58 PM', 1),
(79, 'placiocalvin@gmail.com', 0x3132372e302e302e3100000000000000, '2021-03-05 00:16:19', '05-03-2021 05:47:55 AM', 1),
(80, 'placiocalvin@gmail.com', 0x3132372e302e302e3100000000000000, '2021-03-05 00:25:21', NULL, 1),
(81, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-05 08:56:57', '05-03-2021 02:28:09 PM', 1),
(82, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-05 08:58:53', NULL, 1),
(83, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-05 13:11:27', '05-03-2021 06:48:56 PM', 1),
(84, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-05 13:19:02', '05-03-2021 07:25:11 PM', 1),
(85, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-05 13:55:17', NULL, 1),
(86, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-05 14:02:26', NULL, 1),
(87, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-06 07:36:12', '06-03-2021 01:15:44 PM', 1),
(88, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-06 08:07:35', NULL, 1),
(89, 'calvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-07 11:29:50', '07-03-2021 06:19:41 PM', 1),
(90, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-19 12:35:03', '19-03-2021 06:09:53 PM', 1),
(91, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-19 12:45:02', NULL, 1),
(92, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-19 12:45:18', NULL, 1),
(93, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-20 01:42:08', '20-03-2021 07:15:41 AM', 1),
(94, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-20 01:57:03', NULL, 1),
(95, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-20 01:57:51', NULL, 1),
(96, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-20 02:18:20', NULL, 1),
(97, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-20 11:27:59', '20-03-2021 05:09:38 PM', 1),
(98, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-20 11:39:44', '20-03-2021 05:16:16 PM', 1),
(99, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-20 11:46:23', '20-03-2021 05:20:16 PM', 1),
(100, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-20 11:50:25', '20-03-2021 05:20:30 PM', 1),
(101, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-20 11:50:35', '20-03-2021 05:31:30 PM', 1),
(102, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-20 12:01:40', '20-03-2021 05:38:25 PM', 1),
(103, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-20 12:11:24', NULL, 1),
(104, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-21 11:29:05', '21-03-2021 04:59:10 PM', 1),
(105, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-21 11:29:18', '21-03-2021 04:59:29 PM', 1),
(106, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-21 11:29:35', '21-03-2021 05:00:25 PM', 1),
(107, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-21 11:30:31', '21-03-2021 05:15:57 PM', 1),
(108, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-21 11:46:05', NULL, 1),
(109, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-27 16:17:09', '27-03-2021 09:49:41 PM', 1),
(110, '', 0x3a3a3100000000000000000000000000, '2021-04-01 02:31:20', NULL, 1),
(111, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-01 02:32:44', '01-04-2021 08:03:15 AM', 1),
(112, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-01 02:33:39', NULL, 1),
(113, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-01 02:33:45', NULL, 1),
(114, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-01 02:33:54', NULL, 1),
(115, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-01 02:34:24', '01-04-2021 08:04:57 AM', 1),
(116, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-01 02:35:09', NULL, 1),
(117, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-01 02:35:45', '01-04-2021 08:07:11 AM', 1),
(118, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-01 02:38:22', '01-04-2021 08:09:55 AM', 1),
(119, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-01 02:42:15', NULL, 1),
(120, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-01 02:42:32', '01-04-2021 08:25:11 AM', 1),
(121, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-01 02:55:32', '01-04-2021 08:27:52 AM', 1),
(122, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-01 03:05:32', '01-04-2021 08:46:51 AM', 1),
(123, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-01 03:17:05', '01-04-2021 08:55:58 AM', 1),
(124, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-01 03:26:17', '01-04-2021 08:56:29 AM', 1),
(125, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-01 03:26:33', '01-04-2021 08:56:49 AM', 1),
(126, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-01 03:27:03', '01-04-2021 08:57:18 AM', 1),
(127, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-06 12:45:44', '06-04-2021 06:20:08 PM', 1),
(128, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-06 12:50:16', '06-04-2021 06:23:51 PM', 1),
(129, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-06 12:53:58', '06-04-2021 06:25:17 PM', 1),
(130, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-06 12:55:23', '06-04-2021 06:30:19 PM', 1),
(131, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-06 13:00:25', '06-04-2021 06:32:04 PM', 1),
(132, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-06 13:02:12', '06-04-2021 07:45:33 PM', 1),
(133, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-06 14:18:32', '06-04-2021 07:54:59 PM', 1),
(134, 'rizzalynramirez123099@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-06 14:25:49', '06-04-2021 07:57:24 PM', 1),
(135, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-06 14:27:30', '06-04-2021 07:59:07 PM', 1),
(136, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-09 14:07:26', '09-04-2021 07:37:52 PM', 1),
(137, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-09 14:08:03', '09-04-2021 07:39:25 PM', 1),
(138, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-09 14:09:31', NULL, 1),
(139, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-10 11:53:59', '10-04-2021 06:07:06 PM', 1),
(140, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-11 01:43:55', NULL, 1),
(141, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-11 01:43:55', '11-04-2021 07:15:56 AM', 1),
(142, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-11 01:47:38', '11-04-2021 07:23:56 AM', 1),
(143, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-11 02:59:00', '11-04-2021 08:37:45 AM', 1),
(144, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-11 03:07:51', '11-04-2021 08:40:50 AM', 1),
(145, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-11 03:10:56', NULL, 1),
(146, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-12 04:28:34', NULL, 1),
(147, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-12 13:22:37', NULL, 1),
(148, 'chito@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-13 12:36:14', '13-04-2021 06:17:57 PM', 1),
(149, '', 0x3a3a3100000000000000000000000000, '2021-04-13 12:48:02', NULL, 1),
(150, '', 0x3a3a3100000000000000000000000000, '2021-04-13 12:48:44', '13-04-2021 06:19:52 PM', 1),
(151, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-13 12:51:18', NULL, 1),
(152, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-13 12:52:54', '13-04-2021 06:24:27 PM', 1),
(153, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-13 12:54:34', '13-04-2021 06:25:48 PM', 1),
(154, '', 0x3a3a3100000000000000000000000000, '2021-04-13 12:55:53', '13-04-2021 06:26:10 PM', 1),
(155, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-13 12:57:53', '13-04-2021 06:33:03 PM', 1),
(156, '', 0x3a3a3100000000000000000000000000, '2021-04-13 13:03:08', '13-04-2021 06:55:48 PM', 1),
(157, '', 0x3a3a3100000000000000000000000000, '2021-04-13 13:25:57', '13-04-2021 06:56:43 PM', 1),
(158, 'calvplacio@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-13 13:26:54', '13-04-2021 07:00:57 PM', 1),
(159, '', 0x3a3a3100000000000000000000000000, '2021-04-13 13:31:03', '13-04-2021 07:01:21 PM', 1),
(160, '', 0x3a3a3100000000000000000000000000, '2021-04-13 13:31:46', '13-04-2021 07:02:25 PM', 1),
(161, '', 0x3a3a3100000000000000000000000000, '2021-04-13 13:33:28', '13-04-2021 07:13:45 PM', 1),
(162, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-13 13:47:06', '13-04-2021 07:18:26 PM', 1),
(163, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-13 13:48:50', '13-04-2021 07:18:56 PM', 1),
(164, '', 0x3a3a3100000000000000000000000000, '2021-04-13 13:49:03', '13-04-2021 07:20:42 PM', 1),
(165, '', 0x3a3a3100000000000000000000000000, '2021-04-13 13:59:21', NULL, 1),
(166, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-15 13:49:02', NULL, 1),
(167, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-15 15:00:39', NULL, 1),
(168, '', 0x3a3a3100000000000000000000000000, '2021-04-15 15:03:47', '15-04-2021 08:35:42 PM', 1),
(169, 'calvinjohn.placio@g.batstate-u.edu.ph', 0x3a3a3100000000000000000000000000, '2021-04-15 15:05:49', '15-04-2021 08:36:24 PM', 1),
(170, '', 0x3a3a3100000000000000000000000000, '2021-04-15 15:06:28', '15-04-2021 08:44:01 PM', 1),
(171, '', 0x3a3a3100000000000000000000000000, '2021-04-16 04:32:30', NULL, 1),
(172, '', 0x3a3a3100000000000000000000000000, '2021-04-17 04:04:57', '17-04-2021 09:38:10 AM', 1),
(173, 'calvinjohn.placio@g.batstate-u.edu.ph', 0x3a3a3100000000000000000000000000, '2021-04-17 04:08:27', '17-04-2021 09:38:35 AM', 1),
(174, '', 0x3a3a3100000000000000000000000000, '2021-04-17 04:08:40', NULL, 1),
(175, '', 0x3a3a3100000000000000000000000000, '2021-04-17 08:22:39', '17-04-2021 01:54:55 PM', 1),
(176, 'calvinjohn.placio@g.batstate-u.edu.ph', 0x3a3a3100000000000000000000000000, '2021-04-17 08:25:04', '17-04-2021 01:55:43 PM', 1),
(177, '', 0x3a3a3100000000000000000000000000, '2021-04-17 08:25:48', NULL, 1),
(178, '', 0x3a3a3100000000000000000000000000, '2021-04-17 16:06:42', '17-04-2021 10:20:07 PM', 1),
(179, '', 0x3a3a3100000000000000000000000000, '2021-04-17 16:50:12', '17-04-2021 10:23:53 PM', 1),
(180, 'rizzalynramirez123099@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-17 16:54:28', '17-04-2021 10:25:10 PM', 1),
(181, '', 0x3a3a3100000000000000000000000000, '2021-04-17 16:55:16', '17-04-2021 10:34:57 PM', 1),
(182, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3a3a3100000000000000000000000000, '2021-04-17 17:05:45', '17-04-2021 10:36:22 PM', 1),
(183, '', 0x3a3a3100000000000000000000000000, '2021-04-17 17:06:27', NULL, 1),
(184, '', 0x3a3a3100000000000000000000000000, '2021-04-18 23:12:28', '19-04-2021 04:43:28 AM', 1),
(185, '', 0x3a3a3100000000000000000000000000, '2021-04-19 09:49:18', '19-04-2021 04:02:32 PM', 1),
(186, '', 0x3a3a3100000000000000000000000000, '2021-04-19 10:32:40', '19-04-2021 04:07:37 PM', 1),
(187, '', 0x3a3a3100000000000000000000000000, '2021-04-22 13:16:30', '22-04-2021 06:47:46 PM', 1),
(188, 'Calvinjohn.placio@g.batstate-u.edu.ph', 0x3a3a3100000000000000000000000000, '2021-04-22 13:17:55', '22-04-2021 06:48:24 PM', 1),
(189, '', 0x3a3a3100000000000000000000000000, '2021-04-22 13:18:31', NULL, 1),
(190, '', 0x3a3a3100000000000000000000000000, '2021-04-23 12:47:22', NULL, 1),
(191, '', 0x3a3a3100000000000000000000000000, '2021-04-23 14:11:34', NULL, 1),
(192, '', 0x3a3a3100000000000000000000000000, '2021-04-23 14:12:02', '23-04-2021 07:42:41 PM', 1),
(193, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3a3a3100000000000000000000000000, '2021-04-23 14:12:50', '23-04-2021 07:43:27 PM', 1),
(194, '', 0x3a3a3100000000000000000000000000, '2021-04-23 14:13:35', NULL, 1),
(195, '', 0x3a3a3100000000000000000000000000, '2021-04-23 16:33:10', '23-04-2021 10:03:16 PM', 1),
(196, 'Calvinjohn.placio@g.batstate-u.edu.ph', 0x3a3a3100000000000000000000000000, '2021-04-23 16:33:23', '23-04-2021 10:04:14 PM', 1),
(197, '', 0x3a3a3100000000000000000000000000, '2021-04-23 16:34:19', NULL, 1),
(198, '', 0x3132372e302e302e3100000000000000, '2021-04-25 06:59:55', NULL, 1),
(199, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3a3a3100000000000000000000000000, '2021-04-25 07:02:34', NULL, 1),
(200, '', 0x3a3a3100000000000000000000000000, '2021-04-26 08:35:05', '26-04-2021 02:11:52 PM', 1),
(201, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3a3a3100000000000000000000000000, '2021-04-26 08:42:05', '26-04-2021 02:13:13 PM', 1),
(202, '', 0x3a3a3100000000000000000000000000, '2021-04-26 08:43:21', NULL, 1),
(203, '', 0x3a3a3100000000000000000000000000, '2021-04-27 14:10:56', '27-04-2021 08:13:34 PM', 1),
(204, '', 0x3a3a3100000000000000000000000000, '2021-04-27 14:43:43', '27-04-2021 08:48:57 PM', 1),
(205, 'placiocalvin@gmail.com', 0x3132372e302e302e3100000000000000, '2021-04-27 14:44:17', '27-04-2021 08:37:43 PM', 1),
(206, 'placiocalvin@gmail.com', 0x3132372e302e302e3100000000000000, '2021-04-27 15:15:09', '27-04-2021 08:50:26 PM', 1),
(207, 'placiocalvin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-28 12:34:08', '28-04-2021 06:28:30 PM', 1),
(208, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3a3a3100000000000000000000000000, '2021-04-28 12:58:36', '28-04-2021 06:48:41 PM', 1),
(209, '', 0x3a3a3100000000000000000000000000, '2021-04-28 13:18:48', '28-04-2021 07:08:35 PM', 1),
(210, '', 0x3a3a3100000000000000000000000000, '2021-05-01 12:33:05', '01-05-2021 06:08:35 PM', 1),
(211, '', 0x3a3a3100000000000000000000000000, '2021-05-01 12:39:45', '01-05-2021 06:49:48 PM', 1),
(212, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3a3a3100000000000000000000000000, '2021-05-01 13:19:58', '01-05-2021 06:53:14 PM', 1),
(213, '', 0x3a3a3100000000000000000000000000, '2021-05-01 13:23:19', '01-05-2021 06:54:13 PM', 1),
(214, '', 0x3a3a3100000000000000000000000000, '2021-05-01 13:24:45', '01-05-2021 06:54:48 PM', 1),
(215, '', 0x3a3a3100000000000000000000000000, '2021-05-01 13:24:57', '01-05-2021 06:55:00 PM', 1),
(216, '', 0x3a3a3100000000000000000000000000, '2021-05-02 14:45:54', '02-05-2021 08:16:39 PM', 1),
(217, '', 0x3137352e3137362e34332e3130330000, '2021-05-02 16:39:42', '02-05-2021 10:14:51 PM', 1),
(218, '', 0x3137352e3137362e34332e3130330000, '2021-05-02 16:53:41', '02-05-2021 10:35:52 PM', 1),
(219, '', 0x3137352e3137362e34332e3130330000, '2021-05-02 17:15:14', '02-05-2021 10:48:43 PM', 1),
(220, 'Davidjohn.tesoro@g.batstate-u.edu.ph', 0x3137352e3137362e34332e3130330000, '2021-05-02 17:19:28', '02-05-2021 10:50:07 PM', 1),
(221, '', 0x3137352e3137362e34332e3130330000, '2021-05-02 17:20:29', '02-05-2021 10:53:48 PM', 1),
(222, 'Davidjohn.tesoro@g.batstate-u.edu.ph', 0x3137352e3137362e34332e3130330000, '2021-05-02 17:24:28', '02-05-2021 10:54:24 PM', 1),
(223, '', 0x3137352e3137362e34332e3130330000, '2021-05-02 17:24:48', '02-05-2021 11:00:13 PM', 1),
(224, '', 0x3137352e3137362e34332e3130330000, '2021-05-02 17:31:00', '02-05-2021 11:01:24 PM', 1),
(225, '', 0x3133362e3135382e33302e3736000000, '2021-05-03 00:31:15', '03-05-2021 06:03:09 AM', 1),
(226, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3133362e3135382e33302e3736000000, '2021-05-03 00:33:46', '03-05-2021 06:04:50 AM', 1),
(227, '', 0x3133362e3135382e33302e3736000000, '2021-05-03 00:35:10', '03-05-2021 06:06:55 AM', 1),
(228, 'Davidjohn.tesoro@g.batstate-u.edu.ph', 0x3137352e3137362e34342e3235330000, '2021-05-03 00:36:28', NULL, 1),
(229, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3133362e3135382e33302e3736000000, '2021-05-03 00:37:15', '03-05-2021 07:47:09 AM', 1),
(230, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3133362e3135382e33302e3736000000, '2021-05-03 02:17:59', '03-05-2021 07:50:25 AM', 1),
(231, '', 0x3133362e3135382e33302e3736000000, '2021-05-03 02:20:51', NULL, 1),
(232, 'Davidjohn.tesoro@g.batstate-u.edu.ph', 0x3131322e3139382e3231312e32303900, '2021-05-03 04:57:34', NULL, 1),
(233, '', 0x3131322e3139382e3231312e32303900, '2021-05-03 11:35:37', NULL, 1),
(234, '', 0x3137352e3137362e34342e3138360000, '2021-05-04 06:49:30', '04-05-2021 12:42:43 PM', 1),
(235, '', 0x3137352e3137362e34342e3138360000, '2021-05-04 07:13:49', '04-05-2021 12:45:33 PM', 1),
(236, 'Calvinjohn.placio@g.batstate-u.edu.ph', 0x3137352e3137362e34342e3234350000, '2021-05-07 02:04:31', '07-05-2021 07:34:24 AM', 1),
(237, 'shewncarl.mercado@g.batstate-u.edu.ph', 0x3137352e3137362e34342e3234350000, '2021-05-07 02:11:55', '07-05-2021 07:43:04 AM', 1),
(238, 'placiocalvin@gmail.com', 0x3137352e3137362e34342e3234350000, '2021-05-07 02:13:41', '07-05-2021 07:43:38 AM', 1),
(239, '', 0x3137352e3137362e34342e3234350000, '2021-05-07 02:14:47', '07-05-2021 07:47:43 AM', 1),
(240, 'rfpondare@gmail.com', 0x3131302e35342e3139312e3234340000, '2021-05-07 02:34:01', '07-05-2021 08:05:27 AM', 1),
(241, 'rfpondare@gmail.com', 0x3131302e35342e3139312e3234340000, '2021-05-07 02:35:43', NULL, 1),
(242, '', 0x3137352e3137362e34342e3230390000, '2021-05-07 03:38:43', '07-05-2021 09:14:29 AM', 1),
(243, '', 0x3137352e3137362e34342e3230390000, '2021-05-07 03:44:54', NULL, 1),
(244, 'placiocalvin@gmail.com', 0x3131322e3139382e3232362e31343200, '2021-05-08 03:23:07', '08-05-2021 08:53:10 AM', 1),
(245, 'placiocalvin@gmail.com', 0x3131322e3139382e3232362e31343200, '2021-05-08 03:24:28', '08-05-2021 08:54:24 AM', 1),
(246, '', 0x3137352e3137362e34332e3637000000, '2021-05-08 09:03:10', '08-05-2021 02:35:29 PM', 1),
(247, '', 0x3131322e3139382e3232362e31343200, '2021-05-08 14:21:15', '08-05-2021 07:58:44 PM', 1),
(248, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3131322e3139382e3232362e31343200, '2021-05-08 14:32:46', '08-05-2021 08:07:53 PM', 1),
(249, '', 0x3131322e3139382e3232362e31343200, '2021-05-08 14:37:10', '08-05-2021 08:13:21 PM', 1),
(250, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3131322e3139382e3232362e31343200, '2021-05-08 14:40:47', NULL, 1),
(251, 'shewncarl.mercado@g.batstate-u.edu.ph', 0x3131322e3139382e3232362e31343200, '2021-05-08 14:42:46', '08-05-2021 08:14:10 PM', 1),
(252, '', 0x3131322e3139382e3232362e31343200, '2021-05-08 14:43:40', '08-05-2021 08:14:15 PM', 1),
(253, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3131322e3139382e3232362e31343200, '2021-05-08 14:45:57', '08-05-2021 08:19:20 PM', 1),
(254, '', 0x3131322e3139382e3232362e31343200, '2021-05-08 14:49:46', NULL, 1),
(255, '', 0x3131322e3139382e3231312e34360000, '2021-05-09 07:56:05', '09-05-2021 01:30:16 PM', 1),
(256, 'rfpondare@gmail.com', 0x3131322e3139382e3231312e34360000, '2021-05-09 08:00:43', '09-05-2021 01:31:16 PM', 1),
(257, '', 0x3131322e3139382e3231312e34360000, '2021-05-09 08:01:38', NULL, 1),
(258, '', 0x3131322e3139382e3230372e38320000, '2021-05-10 13:51:24', '10-05-2021 07:22:48 PM', 1),
(259, 'placiocalvin@gmail.com', 0x3131322e3139382e3230372e38320000, '2021-05-10 13:54:39', '10-05-2021 07:25:28 PM', 1),
(260, '', 0x3131322e3139382e3230372e38320000, '2021-05-10 13:56:01', NULL, 1),
(261, 'placiocalvin@gmail.com', 0x3137352e3137362e34342e3234370000, '2021-05-17 03:02:57', '17-05-2021 08:33:00 AM', 1),
(262, 'calvplacio@gmail.com', 0x3137352e3137362e34342e3234370000, '2021-05-17 03:03:41', '17-05-2021 08:33:34 AM', 1),
(263, '', 0x3137352e3137362e34342e3234370000, '2021-05-17 03:04:01', '17-05-2021 08:41:31 AM', 1),
(264, 'Calvinjohn.placio@g.batstate-u.edu.ph', 0x3137352e3137362e34342e3234370000, '2021-05-17 03:11:51', '17-05-2021 08:43:55 AM', 1),
(265, 'placiocalvin@gmail.com', 0x3131302e35342e3234332e3136000000, '2021-05-17 10:39:16', '17-05-2021 04:09:18 PM', 1),
(266, '', 0x3131302e35342e3234332e3136000000, '2021-05-17 10:39:49', NULL, 1),
(267, '', 0x3137352e3137362e34332e3131340000, '2021-05-17 14:02:00', NULL, 1),
(268, '', 0x3137352e3137362e34332e3131340000, '2021-05-17 14:17:49', NULL, 1),
(269, '', 0x3137352e3137362e34332e3330000000, '2021-05-18 06:21:15', NULL, 1),
(270, '', 0x3137352e3137362e34332e3900000000, '2021-05-18 08:33:25', '18-05-2021 02:16:21 PM', 1),
(271, '', 0x3137352e3137362e34332e3238000000, '2021-05-18 10:36:23', NULL, 1),
(272, '', 0x3131322e3139382e3230372e37390000, '2021-05-18 12:19:25', NULL, 1),
(273, '', 0x3137352e3137362e34332e3438000000, '2021-05-18 12:20:51', '18-05-2021 05:51:33 PM', 1),
(274, '', 0x3131322e3139382e3230372e37390000, '2021-05-18 12:24:12', NULL, 1),
(275, '', 0x3130332e3133372e3230372e36310000, '2021-05-18 12:30:40', NULL, 1),
(276, '', 0x3133362e3135382e33302e3837000000, '2021-05-19 02:46:46', '19-05-2021 08:37:21 AM', 1),
(277, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3133362e3135382e33302e3837000000, '2021-05-19 03:07:46', '19-05-2021 08:38:06 AM', 1),
(278, 'calvplacio@gmail.com', 0x3137352e3137362e34332e3430000000, '2021-05-21 15:05:06', '21-05-2021 08:37:08 PM', 1),
(279, 'placiocalvin@gmail.com', 0x3137352e3137362e34332e3430000000, '2021-05-21 15:07:35', '21-05-2021 08:38:06 PM', 1),
(280, '', 0x3137352e3137362e34332e3430000000, '2021-05-21 15:08:32', '21-05-2021 10:35:04 PM', 1),
(281, '', 0x3137352e3137362e34332e3430000000, '2021-05-21 17:05:35', '21-05-2021 10:35:34 PM', 1),
(282, 'Davidjohn.tesoro@g.batstate-u.edu.ph', 0x3137352e3137362e34332e3430000000, '2021-05-21 17:05:57', '21-05-2021 10:37:22 PM', 1),
(283, 'Calvinjohn.placio@g.batstate-u.edu.ph', 0x3137352e3137362e34332e3430000000, '2021-05-21 17:08:14', '21-05-2021 10:43:16 PM', 1),
(284, '', 0x3133362e3135382e33302e3830000000, '2021-05-23 23:41:44', '24-05-2021 05:20:44 AM', 1),
(285, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3131322e3139382e3231352e31383000, '2021-05-23 23:53:06', '24-05-2021 05:23:37 AM', 1),
(286, '', 0x3131322e3139382e3231352e31383000, '2021-05-23 23:54:15', '24-05-2021 05:24:35 AM', 1),
(287, '', 0x3131322e3139382e3231352e31383000, '2021-05-23 23:55:04', '24-05-2021 05:28:35 AM', 1),
(288, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3131322e3139382e3231352e31383000, '2021-05-23 23:59:17', '24-05-2021 05:30:44 AM', 1),
(289, 'calvinjohn.placio@g.batstate-u.edu.ph', 0x3131322e3139382e3231352e31383000, '2021-05-24 00:01:32', '24-05-2021 05:31:43 AM', 1),
(290, '', 0x3131322e3139382e3231352e31383000, '2021-05-24 00:02:08', NULL, 1),
(291, '', 0x3137352e3137362e34342e3133330000, '2021-05-24 00:06:38', NULL, 1),
(292, '', 0x3131322e3139382e3231352e31383000, '2021-05-24 00:07:53', '24-05-2021 05:40:03 AM', 1),
(293, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3131322e3139382e3231352e31383000, '2021-05-24 00:11:42', '24-05-2021 05:42:26 AM', 1),
(294, '', 0x3131322e3139382e3231352e31383000, '2021-05-24 00:12:44', '24-05-2021 05:45:02 AM', 1),
(295, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3131322e3139382e3231352e31383000, '2021-05-24 00:15:20', '24-05-2021 05:51:55 AM', 1),
(296, '', 0x3131322e3139382e3231352e31383000, '2021-05-24 00:22:13', '24-05-2021 05:53:01 AM', 1),
(297, '', 0x3138382e3136362e3235332e31333700, '2021-05-24 02:48:51', NULL, 1),
(298, '', 0x3131322e3139382e3231352e31383000, '2021-05-24 02:52:18', NULL, 1),
(299, 'davidjohn.tesoro@g.batstate-u.edu.ph', 0x3131322e3139382e3231352e31383000, '2021-05-24 02:53:27', '24-05-2021 08:24:52 AM', 1),
(300, '', 0x3131322e3139382e3231352e31383000, '2021-05-24 02:55:12', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`AccountID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`FacultyID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prodid`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentRegno`);

--
-- Indexes for table `tr`
--
ALTER TABLE `tr`
  ADD PRIMARY KEY (`TransactionID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=995817;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `FacultyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=976092;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11112;

--
-- AUTO_INCREMENT for table `tr`
--
ALTER TABLE `tr`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=989213;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
