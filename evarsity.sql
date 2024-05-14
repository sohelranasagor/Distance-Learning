-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2019 at 03:59 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evarsity`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignmentId` int(11) NOT NULL,
  `courseId` int(10) NOT NULL,
  `facultyName` varchar(30) NOT NULL,
  `assignmentPdf` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseId` int(11) NOT NULL,
  `courseTitle` varchar(100) NOT NULL,
  `courseDes` varchar(2000) NOT NULL,
  `coursePic` varchar(200) NOT NULL,
  `courseFeature` varchar(100) NOT NULL,
  `facultyName` varchar(30) NOT NULL,
  `courseNo` int(10) NOT NULL,
  `courseType` int(10) NOT NULL,
  `courselevel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `examsId` int(11) NOT NULL,
  `courseId` int(10) NOT NULL,
  `facultyName` varchar(30) NOT NULL,
  `questionPdf` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facultys`
--

CREATE TABLE `facultys` (
  `facultyId` int(11) NOT NULL,
  `facultytype` int(10) NOT NULL,
  `facultyname` varchar(30) NOT NULL,
  `facultyemail` varchar(30) NOT NULL,
  `facultypass` varchar(30) NOT NULL,
  `facultyphn` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lecturenotes`
--

CREATE TABLE `lecturenotes` (
  `lectureNotesId` int(11) NOT NULL,
  `courseId` int(10) NOT NULL,
  `facultyName` varchar(30) NOT NULL,
  `lectureNote` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `logid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `typeid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`logid`, `email`, `password`, `typeid`) VALUES
(22, 'admin@gmail.com', '123', 1),
(34, 'sohelranasagor007@gmail.com', '1@', 2);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageId` int(11) NOT NULL,
  `messageFrom` varchar(30) NOT NULL,
  `messageTo` varchar(30) NOT NULL,
  `messageDetail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `syllabusId` int(11) NOT NULL,
  `courseMeetingTimeLecture` varchar(200) NOT NULL,
  `courseMeetingTimeReaction` varchar(200) NOT NULL,
  `prerequisites` varchar(200) NOT NULL,
  `descrip` varchar(2000) NOT NULL,
  `assOrExams` varchar(100) NOT NULL,
  `facultyName` varchar(30) NOT NULL,
  `courseId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `phnNo` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `firstName`, `lastName`, `dob`, `gender`, `phnNo`, `email`, `password`) VALUES
(36, 'Sohel Rana', 'Sagor', '2019-04-02', 'Male', '+8801771834097', 'sohelranasagor007@gmail.com', '1@');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignmentId`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`examsId`);

--
-- Indexes for table `facultys`
--
ALTER TABLE `facultys`
  ADD PRIMARY KEY (`facultyId`);

--
-- Indexes for table `lecturenotes`
--
ALTER TABLE `lecturenotes`
  ADD PRIMARY KEY (`lectureNotesId`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageId`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`syllabusId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `examsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `facultys`
--
ALTER TABLE `facultys`
  MODIFY `facultyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lecturenotes`
--
ALTER TABLE `lecturenotes`
  MODIFY `lectureNotesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `syllabusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
