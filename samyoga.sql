-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 07:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samyoga`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `event_description` varchar(250) NOT NULL,
  `event_price` int(11) DEFAULT NULL,
  `participents` int(100) DEFAULT 0,
  `img_link` text DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_description`, `event_price`, `participents`, `img_link`, `type_id`) VALUES
(1, 'Cryptohunt', '', 100, 5, 'images/crypto.png', 1),
(2, 'Search-it', '', 50, 4, 'images/cs03.jpg', 1),
(3, 'Technical-Quiz', '', 50, 2, 'images/quiz.png', 1),
(4, 'Competitive-Coding', '', 50, 2, 'images/coding.jpg', 1),
(5, 'Pubg', '', 50, 1, 'images/pubg.jpg', 2),
(6, 'Counter-Strike', '', 100, 1, 'images/counter.jpg\r\n', 2),
(7, 'Fashion-Show', '', 200, 1, 'images/onstage.jpg', 3),
(8, 'Dance', '', 100, 0, 'images/dance.jpg', 3),
(9, 'Singing', '', 50, 1, 'images/sing.jpg', 3),
(10, 'Svit-Idol', '', 100, 0, 'images/idol.jpg', 3),
(11, 'Cooking-Without-Fire', '', 50, 2, 'images/cook.jpg', 4),
(12, 'Short-Movie', '', 200, 0, 'images/offstage.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `event_info`
--

CREATE TABLE `event_info` (
  `event_id` int(10) NOT NULL,
  `Date` date DEFAULT NULL,
  `time` varchar(20) NOT NULL,
  `location` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `event_info`
--

INSERT INTO `event_info` (`event_id`, `Date`, `time`, `location`) VALUES
(1, '2024-11-16', '3.00pm', '135 Room'),
(2, '2024-11-16', '1.00pm', '020 Lab'),
(3, '2024-11-16', '11.00am', '136 Room'),
(4, '2024-11-16', '9.30am', '020 Lab'),
(5, '2024-10-17', '10.00am', '121 Lab'),
(6, '2024-10-17', '11.00am', '122 Lab'),
(7, '2024-10-17', '9.30pm', 'ON Stage'),
(8, '2024-10-17', '7.00pm', 'ON Stage'),
(9, '2024-10-17', '5.00pm', 'ON Stage'),
(10, '2024-10-17', '6.00pm', 'ON Stage'),
(11, '2024-10-16', '10.30am', '123 Room'),
(12, '2024-10-16', '10.00am', '021 Lab');

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `type_id` int(10) NOT NULL,
  `type_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`type_id`, `type_title`) VALUES
(1, 'Technical Events'),
(2, 'Gaming Events'),
(3, 'On Stage Events'),
(4, 'Off Stage Events');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `registerno` varchar(10) NOT NULL,
  `feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`registerno`, `feedback`) VALUES
('yce21cs037', 'Good Event');

-- --------------------------------------------------------

--
-- Table structure for table `participent`
--

CREATE TABLE `participent` (
  `usn` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `reg_password` varchar(100) NOT NULL,
  `branch` varchar(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `college` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `participent`
--

INSERT INTO `participent` (`usn`, `name`, `reg_password`, `branch`, `sem`, `email`, `phone`, `college`) VALUES
('Naz', 'naz', '', 'CSE', 6, 'test123@gmail.com', '2112112', 'tkm'),
('tkmce21', 'test', '', 'Civil', 7, 'tkm@gmail.com', '2222', 'tkm'),
('YCE20CS012', 'BHAVANA', '', 'cse', 5, 'BHAVANA@GMAIL.COM', '57834567834', 'YCET'),
('YCE20S045', 'Prathiksha', '', 'CSE', 5, 'prathi@gmail.com', '4365839475', 'YCET'),
('yce21ce038', 'John', '1234', 'cse', 3, '678@gmail.com', '5555555555', 'MES'),
('yce21cs011', 'naz', '123456', 'Civil', 6, 'afridi123@gmail.com', '0000000000', 'ycet'),
('yce21cs013', 'naz', '123456', 'Civil', 6, 'afridi123', '1234567891', 'ycet'),
('yce21cs021', 'Anzil', '', 'CSE', 6, 'anzil@gmail.com', '2222222222', 'ycet'),
('Yce22CS005', 'Anu', '', 'CSE', 5, 'annapoornaba@gmail.com', '3467295739', 'Ycet'),
('YCE22CS022', 'Kavya', '', 'cse', 5, 'Kavya@gmail.com', '5326874382', 'YCET'),
('YCE22CS025', 'Mythri', '', 'CSE', 5, 'mythri@saividya.ac.in', '47438592738', 'YCET'),
('YCE22CS034', 'Prajwal', '', 'cse', 5, 'prajwal@gmail.com', '4763483432', 'YCET');

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `rid` int(11) NOT NULL,
  `usn` varchar(20) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`rid`, `usn`, `event_id`) VALUES
(1, 'YCE22CS005', 2),
(2, 'Yce20CS012', 4),
(3, 'yce23CS034', 2),
(4, 'yce21CS005', 3),
(5, 'yce23CS012', 3),
(6, 'YCE20CS012', 5),
(7, 'yce23CS005', 6),
(8, 'yce22CS034', 7),
(9, 'yce21cs037', 1),
(11, 'yce21cs037', 1),
(12, 'yce21cs037', 1),
(13, 'yce21cs037', 1),
(14, 'yce21cs037', 2),
(15, 'yce21cs037', 4),
(16, 'yce21cs038', 2),
(19, 'yce21cs001', 1),
(20, 'YCE20CS039', 9),
(21, 'Yce20cs038', 11),
(22, 'yce21cs038', 11),
(23, 'yce21cs021', 1);

--
-- Triggers `registered`
--
DELIMITER $$
CREATE TRIGGER `count` AFTER INSERT ON `registered` FOR EACH ROW update events
set events.participents=events.participents+1
WHERE events.event_id=new.event_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `staff_coordinator`
--

CREATE TABLE `staff_coordinator` (
  `stid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff_coordinator`
--

INSERT INTO `staff_coordinator` (`stid`, `name`, `phone`, `event_id`) VALUES
(1, 'John', '4327432472', 1),
(2, 'Akshara', '2462742343', 2),
(3, 'Roy', '5374857834', 3),
(4, 'Stephan', '3874798934', 4),
(5, 'Amy smith', '2347283473', 5),
(6, 'Abigail Marlow', '2382243435', 6),
(7, 'Irene', '8763436463', 7),
(8, 'Marry Bell', '2326374374', 8),
(9, 'Belwin', '3746347384', 9),
(10, 'Joseph', '7437432842', 10),
(11, 'Christopher v', '4376374673', 11),
(12, 'Louis philip', '5745384584', 12);

-- --------------------------------------------------------

--
-- Table structure for table `student_coordinator`
--

CREATE TABLE `student_coordinator` (
  `sid` int(11) NOT NULL,
  `st_name` varchar(100) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_coordinator`
--

INSERT INTO `student_coordinator` (`sid`, `st_name`, `phone`, `event_id`) VALUES
(1, 'Adish', '1234565432', 1),
(2, 'Abhirami', '7362849273', 2),
(3, 'Adila', '66666666', 3),
(4, 'Afridi', '8274820489', 4),
(5, 'Akash', '9834783323', 5),
(6, 'Akarsh', '2374384378', 6),
(7, 'Amal', '2362372382', 7),
(8, 'Ameer', '4327342384', 8),
(9, 'Afzal', '3473483847', 9),
(10, 'Anas', '3463438347', 10),
(11, 'Anoodh', '4783248322', 11),
(12, 'Anzil', '3437534858', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_info`
--
ALTER TABLE `event_info`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `participent`
--
ALTER TABLE `participent`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `staff_coordinator`
--
ALTER TABLE `staff_coordinator`
  ADD PRIMARY KEY (`stid`);

--
-- Indexes for table `student_coordinator`
--
ALTER TABLE `student_coordinator`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_info`
--
ALTER TABLE `event_info`
  MODIFY `event_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `registered`
--
ALTER TABLE `registered`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `staff_coordinator`
--
ALTER TABLE `staff_coordinator`
  MODIFY `stid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `student_coordinator`
--
ALTER TABLE `student_coordinator`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
