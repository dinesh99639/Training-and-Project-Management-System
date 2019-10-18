-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2019 at 06:27 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpmsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `mid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`mid`, `name`, `email`, `message`) VALUES
(1, 'Dinesh Somaraju', 'dinesh99639@gmail.com', 'qwerty'),
(2, '1', '1@1.c', 'Hello, you have a problem...'),
(3, 'Dinesh Somaraju', 'dinesh99639@gmail.com', 'asxsxa'),
(4, 'Dinesh Somaraju', 'dinesh99639@gmail.com', 'sqwxsaxaxasx'),
(5, 'Dinesh Somaraju', 'dinesh96399@gmail.com', 'gd group\r\n'),
(6, 'm', 'sheemapatro@gmail.com', 'hello'),
(7, 'm', 'sheemapatro@gmail.com', 'm'),
(8, 'saikiran', 'sheemapatro@gmail.com', 'hello'),
(9, 'saikiran', 'sheemapatro@gmail.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cid` int(255) NOT NULL,
  `cname` text NOT NULL,
  `cdesc` text NOT NULL,
  `lid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cid`, `cname`, `cdesc`, `lid`) VALUES
(1, 'DBMS', 'DBMS stands for Database Management System. We can break it like this DBMS = Database + Management System. Database is a collection of data and Management System is a set of programs to store and retrieve those data. Based on this we can\r\n                define DBMS like this: DBMS is a collection of inter-related data and set of programs to store & access those data in an easy and effective manner.', 1),
(4, 'cloud computing', 'students can opt this course without any restictions all the courses were taught by our company emplyoees itself and students were requested only to opt their courses,as the teaching is also done by company itself after completing their respective courses students will get a certificate which will be useful for them to opt their project and certificate should be mandatory for students to opt any project.', 1),
(5, 'Datascience', 'students can opt this course without any restictions all the courses were taught by our company emplyoees itself and students were requested only to opt their courses,as the teaching is also done by company itself after completing their respective courses\r\n            students will get a certificate which will be useful for them to opt their project and certificate should be mandatory for students to opt any project.', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `enrolledcources_view`
-- (See below for the actual view)
--
CREATE TABLE `enrolledcources_view` (
`ecid` int(255)
,`userid` int(255)
,`cid` int(255)
,`cname` text
,`cdesc` text
,`percomp` int(255)
,`lid` int(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `enrolledcourses`
--

CREATE TABLE `enrolledcourses` (
  `ecid` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `cid` int(255) NOT NULL,
  `percomp` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolledcourses`
--

INSERT INTO `enrolledcourses` (`ecid`, `userid`, `cid`, `percomp`) VALUES
(1, 31, 1, 32),
(2, 31, 4, 53),
(16, 31, 5, 100),
(17, 34, 1, 6),
(18, 31, 1, 32),
(19, 36, 1, 100),
(20, 36, 5, 9),
(21, 38, 4, 100),
(22, 43, 1, 80),
(23, 43, 5, 2),
(24, 34, 5, 0),
(25, 44, 1, 0),
(26, 45, 4, 100),
(27, 47, 1, 100),
(28, 46, 1, 100),
(29, 48, 1, 3),
(30, 48, 5, 0),
(31, 49, 4, 100),
(32, 50, 1, 99),
(33, 50, 1, 99),
(34, 50, 1, 99),
(35, 50, 1, 99),
(36, 50, 1, 99),
(37, 50, 5, 100),
(38, 52, 1, 100),
(39, 53, 1, 0),
(40, 53, 5, 16),
(41, 53, 5, 16),
(42, 53, 5, 16),
(43, 53, 5, 16);

-- --------------------------------------------------------

--
-- Stand-in structure for view `enrolledcprojects_view`
-- (See below for the actual view)
--
CREATE TABLE `enrolledcprojects_view` (
`epid` int(255)
,`userid` int(255)
,`pid` int(255)
,`phead` text
,`pdesc` text
,`members` int(255)
,`percomp` int(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `enrolledprojects`
--

CREATE TABLE `enrolledprojects` (
  `epid` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `pid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolledprojects`
--

INSERT INTO `enrolledprojects` (`epid`, `userid`, `pid`) VALUES
(1, 31, 1),
(2, 31, 4),
(6, 34, 1),
(7, 31, 7),
(9, 37, 7),
(10, 31, 9),
(11, 43, 5),
(12, 31, 5),
(13, 43, 1),
(14, 31, 2),
(15, 31, 3),
(16, 34, 3),
(17, 44, 1),
(18, 45, 2),
(19, 31, 6),
(20, 31, 8),
(21, 46, 2),
(22, 47, 2),
(23, 52, 9);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `lid` int(255) NOT NULL,
  `lname` text NOT NULL,
  `lprofession` text NOT NULL,
  `at` text NOT NULL,
  `lqual` text NOT NULL,
  `lsub` text NOT NULL,
  `lemail` text NOT NULL,
  `lphone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lid`, `lname`, `lprofession`, `at`, `lqual`, `lsub`, `lemail`, `lphone`) VALUES
(1, 'S.Joshua Johnson', 'ASSISTANT PROFESSOR', 'ANITS', 'M.Tech(CSE)', 'DATABASE MANAGEMENT SYSTEMS, COMPUTER NETWORKS, WEB TECHNOLOGIES, SOFTWARE PROJECT MANAGEMENT, OPERATING SYSTEMS', 'joshua.cse@anits.edu.in', '9573382650');

-- --------------------------------------------------------

--
-- Table structure for table `projectbid`
--

CREATE TABLE `projectbid` (
  `pid` int(255) NOT NULL,
  `phead` text NOT NULL,
  `pdesc` text NOT NULL,
  `bid` bigint(255) NOT NULL,
  `start` datetime(6) NOT NULL,
  `end` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectbid`
--

INSERT INTO `projectbid` (`pid`, `phead`, `pdesc`, `bid`, `start`, `end`) VALUES
(1, 'TRAINING AND PROJECT MANAGEMENT SYSTEM', 'In training session, we have students and Professors. The professors will train the students and the students will be trained in their interested course. The course has a period in which the student has to complete. The students who have successfully\r\n            completed the course will be provided a certificate after the course period. The students who had given the certificate will be provided with projects. In Project management, there are managers, on-field and off-field workers. The managers\r\n            will tender for projects. The on-field workers will collect the statistics of project (Amount of work done, etc.). The on-field workers will update the information to off-field workers. The off-field workers will update the technical details.\r\n', 1000, '2019-09-06 21:00:00.000000', '2019-09-27 13:40:00.000000'),
(2, 'EMERGENCY HEALTH CARE', 'Aim is to provide complete information about the hospitals in fast and quick manner about the hospitals by the clients on time by just login from their valid account. By using this technology we can give the quick and best information regarding hospitals\r\n            as fast as compare to the existing hospitals. The client can give rating in online system provided by hospitals. The existing system carries more time to do a piece of work for this reason the online Emergency care hospitals is implemented.\r\n            In this project security is also maintain that is the result of rating is only visible to authentic user. This rating report was checked by the Admin. He can view ratings and view the ratings obtained to the hospitals.', 550010, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, 'Library management System', 'A Library management is a project that manages and stores books information electronically according to student needs. The system helps both students and library manager to keep a constant track of all the books available in the library. It allows both\r\n            the admin and the student to search for the desired book. It becomes necessary for colleges to keep a continuous check on the books issued and returned and even calculate fine. This task if carried out manually will be tedious and includes\r\n            chances of mistakes. These errors are avoided by allowing the system to keep track of information such as issue date, last date to return the book and even fine information and thus there is no need to keep manual track of this information\r\n            which thereby avoids chances of mistakes.', 250000, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, 'TAXI MANAGEMENT', 'The main aim of Taxi Management DBMS project is to add taxies and drivers and make bookings. We aim to demonstrate the use of create, read, update and delete MySQL operations through this project. The project starts by adding a taxi and by adding details\r\n            of driver using the taxi added. The owner provides taxi to the drivers and ads their expenses on daily basis. Booking scene is where a customers can book a taxi to get o the desired location.', 999999, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(5, 'Online Booking', 'students can opt this project without any restictions all the projects were taught by our company emplyoees itself and students were requested only to opt their projects as the teaching is also done by company itself after completing their respective\r\n            courses students will get a certificate which will be useful for them to opt their project and certificate should be mandatory for students to opt any project.', 987654, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(6, 'Doctor\'s Login', 'students can opt this project without any restictions all the project were taught by our company emplyoees itself and students were requested only to opt their projects,as the teaching is also done by company itself after completing their respective courses\r\n            students will get a certificate which will be useful for them to opt their project and certificate should be mandatory for students to opt any project.', 456132, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(7, 'AP Farmers Welfare', 'students can opt this project without any restictions all the projects were taught by our company emplyoees itself and students were requested only to opt their projects,as the teaching is also done by company itself after completing their respective\r\n            courses students will get a certificate which will be useful for them to opt their project and certificate should be mandatory for students to opt any project.', 132795, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(8, 'newkscasc', 'sdcsd', 9000, '2019-09-19 00:00:00.000000', '2019-09-19 14:50:00.000000'),
(9, 'test', 'qwerty', 900000, '2019-09-20 00:00:00.000000', '2019-09-20 10:59:00.000000'),
(10, 'testh', ' hjjh', 0, '2019-09-27 00:00:00.000000', '2019-09-27 14:22:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `projectchat`
--
-- Error reading structure for table tpmsys.projectchat: #1932 - Table 'tpmsys.projectchat' doesn't exist in engine
-- Error reading data for table tpmsys.projectchat: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `tpmsys`.`projectchat`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `projectchat2`
--

CREATE TABLE `projectchat2` (
  `chatid` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectchat2`
--

INSERT INTO `projectchat2` (`chatid`, `pid`, `userid`, `time`, `message`) VALUES
(16, 1, 31, '2019-09-09 23:44:02.000000', 'hi'),
(17, 1, 31, '2019-09-10 04:51:02.000000', 'hello'),
(18, 1, 31, '2019-09-10 05:51:12.000000', 'hello2'),
(19, 1, 34, '2019-09-10 05:59:33.000000', 'hello'),
(20, 1, 34, '2019-09-10 06:06:18.000000', 'ok'),
(21, 1, 31, '2019-09-10 06:14:57.000000', 'kk'),
(22, 1, 31, '2019-09-11 07:24:22.000000', 'Good evening'),
(23, 1, 31, '2019-09-11 07:47:59.000000', 'Good night'),
(24, 7, 31, '2019-09-11 08:20:52.000000', 'hi'),
(25, 7, 42, '2019-09-11 08:20:54.000000', 'hiii'),
(26, 7, 31, '2019-09-11 08:21:10.000000', 'hello'),
(27, 7, 42, '2019-09-11 08:21:17.000000', 'how are u'),
(28, 7, 31, '2019-09-11 08:21:27.000000', 'fine'),
(29, 7, 42, '2019-09-11 08:21:38.000000', 'itali martin'),
(30, 7, 42, '2019-09-11 08:22:14.000000', 'hi'),
(31, 1, 31, '2019-09-12 01:32:14.000000', 'hello'),
(32, 1, 34, '2019-09-12 01:33:01.000000', 'hello'),
(33, 1, 34, '2019-09-12 01:33:27.000000', 'what about the project?'),
(38, 1, 31, '2019-09-12 02:48:33.000000', 'its almost completed'),
(39, 5, 43, '2019-09-27 04:22:51.000000', 'hello'),
(40, 2, 46, '2019-09-27 04:25:18.000000', 'hello'),
(41, 2, 47, '2019-09-27 04:25:27.000000', 'hi'),
(42, 9, 52, '2019-09-27 05:10:02.000000', 'hiii'),
(43, 9, 31, '2019-09-27 05:11:17.000000', 'hello sir'),
(44, 9, 52, '2019-09-27 05:12:02.000000', 'very good project');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `pid` int(255) NOT NULL,
  `phead` text NOT NULL,
  `pdesc` text NOT NULL,
  `members` int(255) NOT NULL,
  `percomp` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pid`, `phead`, `pdesc`, `members`, `percomp`) VALUES
(1, 'TRAINING AND PROJECT MANAGEMENT SYSTEM', 'In training session, we have students and Professors. The professors will train the students and the students will be trained in their interested course. The course has a period in which the student has to complete. The students who have successfully\r\n            completed the course will be provided a certificate after the course period. The students who had given the certificate will be provided with projects. In Project management, there are managers, on-field and off-field workers. The managers\r\n            will tender for projects. The on-field workers will collect the statistics of project (Amount of work done, etc.). The on-field workers will update the information to off-field workers. The off-field workers will update the technical details.\r\n', 5, 100),
(2, 'EMERGENCY HEALTH CARE', 'Aim is to provide complete information about the hospitals in fast and quick manner about the hospitals by the clients on time by just login from their valid account. By using this technology we can give the quick and best information regarding hospitals\r\n            as fast as compare to the existing hospitals. The client can give rating in online system provided by hospitals. The existing system carries more time to do a piece of work for this reason the online Emergency care hospitals is implemented.\r\n            In this project security is also maintain that is the result of rating is only visible to authentic user. This rating report was checked by the Admin. He can view ratings and view the ratings obtained to the hospitals.', 5, 61),
(3, 'Library management System', 'A Library management is a project that manages and stores books information electronically according to student needs. The system helps both students and library manager to keep a constant track of all the books available in the library. It allows both\r\n            the admin and the student to search for the desired book. It becomes necessary for colleges to keep a continuous check on the books issued and returned and even calculate fine. This task if carried out manually will be tedious and includes\r\n            chances of mistakes. These errors are avoided by allowing the system to keep track of information such as issue date, last date to return the book and even fine information and thus there is no need to keep manual track of this information\r\n            which thereby avoids chances of mistakes.', 5, 1),
(4, 'TAXI MANAGEMENT', 'The main aim of Taxi Management DBMS project is to add taxies and drivers and make bookings. We aim to demonstrate the use of create, read, update and delete MySQL operations through this project. The project starts by adding a taxi and by adding details\r\n            of driver using the taxi added. The owner provides taxi to the drivers and ads their expenses on daily basis. Booking scene is where a customers can book a taxi to get o the desired location.', 5, 0),
(5, 'Online Booking', 'students can opt this project without any restictions all the projects were taught by our company emplyoees itself and students were requested only to opt their projects as the teaching is also done by company itself after completing their respective\r\n            courses students will get a certificate which will be useful for them to opt their project and certificate should be mandatory for students to opt any project.', 6, 1),
(6, 'Doctor\'s Login', 'students can opt this project without any restictions all the project were taught by our company emplyoees itself and students were requested only to opt their projects,as the teaching is also done by company itself after completing their respective courses\r\n            students will get a certificate which will be useful for them to opt their project and certificate should be mandatory for students to opt any project.', 5, 100),
(7, 'AP Farmers Welfare', 'students can opt this project without any restictions all the projects were taught by our company emplyoees itself and students were requested only to opt their projects,as the teaching is also done by company itself after completing their respective\r\n            courses students will get a certificate which will be useful for them to opt their project and certificate should be mandatory for students to opt any project.', 8, 5),
(8, 'Online railways', 'students can opt this project without any restictions all the project were taught by our company emplyoees itself and students were requested only to opt their projects,as the teaching is also done by company itself after completing their respective courses\r\n            students will get a certificate which will be useful for them to opt their project and certificate should be mandatory for students to opt any project.', 5, 1),
(9, 'Teachers register form', 'students can opt this project without any restictions all the projects were taught by our company emplyoees itself and students were requested only to opt their projects,as the teaching is also done by company itself after completing their respective\r\n            courses students will get a certificate which will be useful for them to opt their project and certificate should be mandatory for students to opt any project.', 5, 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `name`, `email`, `phone_no`, `password`, `usertype`) VALUES
(31, 'z', 'Dinesh', 'z@z.com', '8106313275', 'cd7f3b04645eb595e29b1d753cfbd30b', 'student'),
(34, 'r', 'rushitha', 'r@r.com', '1', 'cd7f3b04645eb595e29b1d753cfbd30b', 'manager'),
(36, 'vin', 'vinay', 'vinay123vin@gmail.com', '9121541512', '2ee9b68d86937cb0409274e929c6e678', 'manager'),
(37, 'saikiran', 'Sai Kiran', 'avasaralasaikiran@gmail.com', '8978119471', '59bff3e90baa1b7a4aca341d6f427708', 'admin'),
(38, 'rr', 'Ramaraju', 'rr@r.com', '1111111111', '34021ebf6cc547010dcf41f70d5c32a5', 'student'),
(39, 'manager', 'Manager', 'manager@tpmsys.com', '9090909090', 'cd7f3b04645eb595e29b1d753cfbd30b', 'manager'),
(40, 'admin', 'Admin', 'admin@tpmsys.com', '9090909090', 'cd7f3b04645eb595e29b1d753cfbd30b', 'admin'),
(43, 'student', 'student', 'student@tpm.com', '9999999999', 'cd7f3b04645eb595e29b1d753cfbd30b', 'student'),
(44, 'NPG', 'np', 'np@gmail.com', '6305777065', '018a10a4ce8e8efe76599ce394e367a7', 'manager'),
(45, 'sheema', 'sheema', 'sh@sh.com', '1234567890', 'cd7f3b04645eb595e29b1d753cfbd30b', 'student'),
(46, 'manager2', 'Dinesh', 'dinesh99639@gmail.com', '1234567890', 'cd7f3b04645eb595e29b1d753cfbd30b', 'manager'),
(47, 'rus', 'rushithap', 'eeee@gmail.com', '1234956788', 'f17518332390d8a7c28727a94a1d3c41', 'student'),
(48, 'g', 'g', 'sheemapatro@gmail.com', '1234567890', 'eefec7ba911f348cc8951a5c3c90a0b7', 'manager'),
(49, 'k', 'k', 'sheemapatro@gmail.com', '1234567890', '333fe848c93396c8e8daaf19c5e3fac9', 'manager'),
(50, 'm', 'm', 'sheemapatro@gmail.com', '1234567890', '52c1fff7d22b3c012c06188ba89409f5', 'student'),
(51, 'mouli', 'mouli', 'avasaralasaikiran@gmail.com', '1234567890', '7c41bb953dbda8f6b6078831d2177d9e', 'student'),
(52, 'joshua.cse', 'joshua johnson', 'joshua.cse@anits.edu.in', '9573382650', '0c0799a6f3372ed37c3aec42705a09df', 'student'),
(53, 'naga', 'naga', 'sheemapatro@gmail.com', '1234567890', '826cf6414944161bed3178303b521c39', 'student');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `projectchat_after_delete` AFTER DELETE ON `users` FOR EACH ROW DELETE FROM projectchat WHERE userid=old.userid
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `enrolledcources_view`
--
DROP TABLE IF EXISTS `enrolledcources_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `enrolledcources_view`  AS  select `e`.`ecid` AS `ecid`,`e`.`userid` AS `userid`,`e`.`cid` AS `cid`,`c`.`cname` AS `cname`,`c`.`cdesc` AS `cdesc`,`e`.`percomp` AS `percomp`,`c`.`lid` AS `lid` from (`enrolledcourses` `e` join `courses` `c`) where (`e`.`cid` = `c`.`cid`) ;

-- --------------------------------------------------------

--
-- Structure for view `enrolledcprojects_view`
--
DROP TABLE IF EXISTS `enrolledcprojects_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `enrolledcprojects_view`  AS  select `e`.`epid` AS `epid`,`e`.`userid` AS `userid`,`e`.`pid` AS `pid`,`c`.`phead` AS `phead`,`c`.`pdesc` AS `pdesc`,`c`.`members` AS `members`,`c`.`percomp` AS `percomp` from (`enrolledprojects` `e` join `projects` `c`) where (`e`.`pid` = `c`.`pid`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `enrolledcourses`
--
ALTER TABLE `enrolledcourses`
  ADD PRIMARY KEY (`ecid`),
  ADD KEY `fk_enrolledcourses_userid` (`userid`);

--
-- Indexes for table `enrolledprojects`
--
ALTER TABLE `enrolledprojects`
  ADD PRIMARY KEY (`epid`),
  ADD KEY `fk_enrolledprojects_userid` (`userid`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `projectbid`
--
ALTER TABLE `projectbid`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `projectchat2`
--
ALTER TABLE `projectchat2`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `mid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enrolledcourses`
--
ALTER TABLE `enrolledcourses`
  MODIFY `ecid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `enrolledprojects`
--
ALTER TABLE `enrolledprojects`
  MODIFY `epid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `lid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projectbid`
--
ALTER TABLE `projectbid`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projectchat2`
--
ALTER TABLE `projectchat2`
  MODIFY `chatid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrolledcourses`
--
ALTER TABLE `enrolledcourses`
  ADD CONSTRAINT `fk_enrolledcourses_userid` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE;

--
-- Constraints for table `enrolledprojects`
--
ALTER TABLE `enrolledprojects`
  ADD CONSTRAINT `fk_enrolledprojects_userid` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
