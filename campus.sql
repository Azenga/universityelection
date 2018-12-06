-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 09:47 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` tinyint(2) NOT NULL,
  `user_id` int(4) NOT NULL,
  `position_id` tinyint(1) NOT NULL,
  `manifesto` text,
  `nominated` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `user_id`, `position_id`, `manifesto`, `nominated`) VALUES
(1, 2, 2, '<ul><li><strong>Introduction of Kasneb courses</strong></li><li><strong>Expansion of the Computer labs and Improvement on the internet connection</strong></li><li><strong>Update the online curriculumn to enable effective unit regestration</strong></li><li><strong>Upload results online for easy checking of missing marks</strong></li><li><strong>Effective unit coverage by lecturers</strong></li></ul>', 1),
(2, 4, 1, '<ul><li><strong>Workers in the library have lately become so lazy they are doing their jobs well</strong></li><li><strong>Students portal should be updated and results updated everytime so that if you have missing marks you deal with them earlier enough</strong></li><li><strong>Fee payment peroids and deadlines should be a extended and the administration should be a little bit lenient and empathetic</strong></li><li><strong>There should be some improvement on the food that we eat at the students mess and we need the introduction of Githeri and Strong tea as part of lunch time meals also the loafs in the morning are always on enough and we want change on that.</strong></li><li><strong>The administration should support curriculumn and co-curriculumn clubs fully and grant them the requirements (ex. Buses) when required</strong></li><li><strong>Lecturers should take Government sponsored stdents seriously and attend classes regardless of whther they attend or not and they should cover the unit extensively, because of late I&#39;ve realized that hardly none of my lecturers has ever covered even 50% of the units.</strong></li></ul>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(3) NOT NULL,
  `acronym` varchar(10) NOT NULL,
  `name` varchar(256) NOT NULL,
  `descr` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `acronym`, `name`, `descr`) VALUES
(2, 'FIST', 'Faculty Information Science and Technology', 'The best faculty in Kisii University according to me'),
(4, 'SPAS', 'School of Pure and Applied Sciences', 'It includes sciences and I think it\'s also cool'),
(5, 'FASS', 'Faculty of Arts and Social Sciences', 'The most basic faculty and includes the education people but still cool'),
(6, 'SOHS', 'School of Health Science', 'It\'s a school that deals with anything to do with human health and science. It\'s also a cool one if you were to ask me.');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` tinyint(1) NOT NULL,
  `name` varchar(10) NOT NULL,
  `descr` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `descr`) VALUES
(1, 'voter', 'Level One'),
(2, 'candidate', 'Level Two'),
(3, 'admin', 'Level Three');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` tinyint(1) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`) VALUES
(1, 'President'),
(2, 'Faculty Representative'),
(3, 'Entertainment Representative'),
(4, 'Secretary General');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(4) NOT NULL,
  `title` varchar(256) NOT NULL,
  `body` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `group_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `create_date`, `group_id`) VALUES
(2, 1, 'When are the Elections?', '<p>When are we going to have senate elections.&nbsp; I feel we are a little bit late fro the election and it should be held as soon as possible before we begin our CATS. Aftre the CATS every body will be busy preparing for the exans and we won&#39;t have the time for such rubish. Moresore, it&#39;s been a year and a half since we voted and I feel like the current senate have had enough salary. Its time for others(the next senate) to get thier token even though it won&#39;t be for a long time. Please admin inform us about this coz we can&#39;t stand being lied to and we have to choose our leaders ASAP!!!</p>', '2018-11-20 07:47:23', 1),
(3, 4, 'Vying for Presidecy', '<p>I&#39;m officially announcing my candidature for the presideny of Kisii university, I feel like the past presidents of this great 21st century university haven&#39;t been putting much effort for the sake of well bieng of the students and I think I can do that even beyond your expectations. I strongly believe that we are still facing some little problems here and there because of them being les competive and I were them this problems won&#39;t be their. Therefore, I would like to take this opportunity ans sincerely ask for you support and votes come the next general election of the school. Vote for me and Eliminate the last remaining problems and Difficulties. If you want to know much check on my manifesto on my page. Thank you.</p>', '2018-11-22 08:06:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `user_id` int(4) NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `user_id`, `post_id`, `body`, `create_date`) VALUES
(1, 2, 2, '<p>Yap, thats true I think if they do it now we will be late for the many stuff that we are supposed to have acheived at the end of the semester. And I will be vying so please make sure taht you vote for me and mobilize poeple to start an online campain for me</p>', '2018-11-20 20:30:40'),
(2, 4, 2, '<p>The current president should address that if he wants to leave a legacy. When I become the president that will also be into my issues, we want a full school schedule for important dates and durations so that we don&#39;t have to be suprised with events that we haven&#39;t prepared. What do you say about that?</p>', '2018-11-22 07:51:41'),
(3, 5, 3, '<p>That&#39;s cool Diana, considering your manifesto and you are a lady and the country is fighting so much to empower women with the two-third gender rule, you are&nbsp; a great lady and deserve a chance to give comrades their glory back. I personally assure you that I completely trust you am convinced that you are the lady-president and I assure my vote and that&#39;s with no doubt. I also would like other comrades to take the same path.</p>', '2018-11-22 18:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `faculty_id` int(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(30) DEFAULT NULL,
  `pwd` varchar(256) NOT NULL,
  `token` varchar(256) NOT NULL,
  `activated` tinyint(1) DEFAULT '0',
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `group_id` tinyint(1) NOT NULL DEFAULT '1',
  `canvote` tinyint(1) DEFAULT '0',
  `hasvoted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `regno`, `faculty_id`, `email`, `avatar`, `pwd`, `token`, `activated`, `join_date`, `group_id`, `canvote`, `hasvoted`) VALUES
(1, 'Azenga', 'Kevin', 'IN13/20415/15', 2, 'azenga.kevin@yahoo.com', 'azenga.png', '045a8f50ec7eb7cf79720edb333c4fe7', 'zcXF_I8N0e9Qsdnj5lTH', 0, '2018-11-18 20:55:13', 1, 1, 0),
(2, 'Kemboi', 'Mercy', 'IN13/20397/15', 2, 'kemboi.mercy27@gmail.com', 'cowell.jpg', 'a8f46557424a1a006cb7add2602bac6b', '5jA_rBCzxdqNbPucTt8p', 0, '2018-11-18 20:59:26', 2, 1, 0),
(4, 'Diana', 'Sanya', 'IN13/20400/15', 2, 'diana.sanya@gmail.com', 'flag.png', 'de190da4e5ef45d3712a8a981f3d6ba3', 'T60OiHSWIN_rou!JjQ35', 0, '2018-11-22 07:15:31', 2, 1, 0),
(5, 'Jepkemboi', 'Caren', 'IN13/20404/15', 2, 'jepkemboicarren@gmail.com', 'boeing.png', '827ccb0eea8a706c4c34a16891f84e7b', '2yMxO7qX_RaJS63hNQTV', 0, '2018-11-22 18:26:55', 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `acronym` (`acronym`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regno` (`regno`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `candidates_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
