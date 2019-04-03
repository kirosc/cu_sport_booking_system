-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019-04-03 11:48:00
-- 伺服器版本: 10.1.21-MariaDB
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `admin`
--

INSERT INTO `admin` (`email`) VALUES
('admin@testing.com');

-- --------------------------------------------------------

--
-- 資料表結構 `coach`
--

CREATE TABLE `coach` (
  `email` varchar(256) NOT NULL,
  `self_introduction` text NOT NULL,
  `experience` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `coach`
--

INSERT INTO `coach` (`email`, `self_introduction`, `experience`) VALUES
('coach_peter@testing.com', 'I am coach Peter, teaching table tennis', ''),
('coach_rex@tseting.com', 'I am Rex Tso, teaching Boxing class', ''),
('coach_yong@testing.com', 'I am Coach Yong, teaching basketball', '');

-- --------------------------------------------------------

--
-- 資料表結構 `college`
--

CREATE TABLE `college` (
  `college_id` int(2) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `college`
--

INSERT INTO `college` (`college_id`, `name`, `image`) VALUES
(1, 'Chung Chi College', NULL),
(2, 'New Asia College', 'C02.jpg'),
(3, 'United College', 'C03.jpg'),
(4, 'Shaw College', NULL),
(5, 'Morningside College', NULL),
(6, 'S.H. Ho College', NULL),
(7, 'C.W. Chu College', NULL),
(8, 'Wu Yee Sun College', NULL),
(9, 'Lee Woo Sing College', NULL),
(10, 'University', 'C10.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--

CREATE TABLE `course` (
  `course_id` int(10) NOT NULL,
  `name` varchar(256) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `venue_id` int(2) NOT NULL,
  `price` int(3) NOT NULL,
  `available_seats` int(3) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(256) NOT NULL,
  `level_id` int(1) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `course`
--

INSERT INTO `course` (`course_id`, `name`, `start_time`, `end_time`, `venue_id`, `price`, `available_seats`, `description`, `image`, `level_id`, `email`) VALUES
(1, 'Basic Basketball Class', '2019-04-28 13:00:00', '2019-04-28 15:00:00', 1, 20, 20, 'Basketball class for beginners', 'C001.jpg', 1, 'coach_yong@testing.com'),
(2, 'Basic Table Tennis Class', '2019-04-29 10:00:00', '2019-04-29 12:00:00', 33, 15, 10, 'Table Tennis class for Beginners', 'C002.jpg', 1, 'coach_peter@testing.com');
-- --------------------------------------------------------

--
-- 資料表結構 `level`
--

CREATE TABLE `level` (
  `level_id` int(1) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `level`
--

INSERT INTO `level` (`level_id`, `description`) VALUES
(1, 'Beginner'),
(2, 'Intermediate'),
(3, 'Advance');

-- --------------------------------------------------------

--
-- 資料表結構 `participate`
--

CREATE TABLE `participate` (
  `email` varchar(256) NOT NULL,
  `course_id` int(10) NOT NULL,
  `payment_method` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `participate`
--

INSERT INTO `participate` (`email`, `course_id`, `payment_method`) VALUES
('bobby@testing.com', 1, 'Cash'),
('kelvin@testing.com', 1, 'Cash'),
('kenny@testing.com', 1, 'Cash'),
('kenny@testing.com', 2, 'Cash');

-- --------------------------------------------------------

--
-- 資料表結構 `private_session`
--

CREATE TABLE `private_session` (
  `session_id` int(10) NOT NULL,
  `price` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `private_session`
--

INSERT INTO `private_session` (`session_id`, `price`) VALUES
(1, 50),
(2, 50),
(3, 50),
(4, 50),
(5, 50),
(6, 40),
(7, 40);

-- --------------------------------------------------------

--
-- 資料表結構 `reserve`
--

CREATE TABLE `reserve` (
  `email` varchar(256) NOT NULL,
  `session_id` int(10) NOT NULL,
  `payment_method` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `reserve`
--

INSERT INTO `reserve` (`email`, `session_id`, `payment_method`) VALUES
('mok@testing.com', 1, 'Cash'),
('mok@testing.com', 2, 'Cash');

-- --------------------------------------------------------

--
-- 資料表結構 `session`
--

CREATE TABLE `session` (
  `session_id` int(10) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `venue_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `session`
--

INSERT INTO `session` (`session_id`, `start_time`, `end_time`, `venue_id`) VALUES
(1, '2019-04-30 10:00:00', '2019-04-03 11:00:00', 16),
(2, '2019-04-30 11:00:00', '2019-04-30 12:00:00', 16),
(3, '2019-04-30 12:00:00', '2019-04-30 13:00:00', 16),
(4, '2019-04-30 13:00:00', '2019-04-30 14:00:00', 16),
(5, '2019-04-30 14:00:00', '2019-04-30 15:00:00', 16),
(6, '2019-04-30 13:00:00', '2019-04-30 14:00:00', 31),
(7, '2019-04-30 14:00:00', '2019-04-30 15:00:00', 31),
(8, '2019-04-30 15:00:00', '2019-04-30 16:00:00', 31),
(9, '2019-04-30 16:00:00', '2019-04-30 17:00:00', 31),
(10, '2019-04-30 17:00:00', '2019-04-30 18:00:00', 31);

-- --------------------------------------------------------

--
-- 資料表結構 `share`
--

CREATE TABLE `share` (
  `email` varchar(256) NOT NULL,
  `session_id` int(10) NOT NULL,
  `payment_method` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `share`
--

INSERT INTO `share` (`email`, `session_id`, `payment_method`) VALUES
('bobby@testing.com', 8, 'Cash'),
('kelvin@testing.com', 8, 'Cash'),
('kenny@testing.com', 9, 'Cash'),
('kiros@testing.com', 10, 'Cash');

-- --------------------------------------------------------

--
-- 資料表結構 `shared_session`
--

CREATE TABLE `shared_session` (
  `session_id` int(10) NOT NULL,
  `available_seats` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `shared_session`
--

INSERT INTO `shared_session` (`session_id`, `available_seats`) VALUES
(8, 2),
(9, 2),
(10, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `sports`
--

CREATE TABLE `sports` (
  `sports_id` int(2) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `sports`
--

INSERT INTO `sports` (`sports_id`, `name`) VALUES
(1, 'Basketball'),
(2, 'Tennis'),
(3, 'Table Tennis'),
(4, 'Badminton'),
(5, 'Volleyball'),
(6, 'Track and Field'),
(7, 'Handball'),
(8, 'Football'),
(9, 'Swimming'),
(10, 'Gymnastics'),
(11, 'Softball'),
(12, 'Squash'),
(13, 'Archery'),
(14, 'Yoga'),
(15, 'Tai Chi');

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--

CREATE TABLE `student` (
  `email` varchar(256) NOT NULL,
  `interest` text NOT NULL,
  `birthday` date NOT NULL,
  `phone_no` varchar(8) NOT NULL,
  `self_introduction` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `student`
--

INSERT INTO `student` (`email`, `interest`, `birthday`, `phone_no`, `self_introduction`) VALUES
('bobby@testing.com', '', '1998-01-01', '65723867', 'I am Bobby from CSE Department. Nice to meet you.'),
('kelvin@testing.com', '', '1998-01-01', '54010988', 'Hello. I am Kelvin.'),
('kenny@testing.com', '', '1998-01-01', '68713944', 'I am Kenny from CSE Department. Nice to meet you.'),
('kiros@testing.com', '', '1998-01-01', '68424847', 'I am Kiros from CSE Department. Nice to meet you.'),
('mok@testing.com', '', '1998-01-01', '64199983', 'I am Mok from CSE Department. Nice to meet you.');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `email` varchar(256) NOT NULL,
  `password` varchar(16) NOT NULL,
  `username` varchar(256) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `icon` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`email`, `password`, `username`, `first_name`, `last_name`, `icon`) VALUES
('admin@testing.com', '000000', 'admin', 'Tai Man', 'Chan', ''),
('bobby@testing.com', '000000', 'bobby', 'Bobby', 'Chan', ''),
('coach_peter@testing.com', '000000', 'Peter Chan', 'Peter', 'Chan', ''),
('coach_rex@tseting.com', '000000', 'Boxing Rex', 'Rex', 'Tso', ''),
('coach_yong@testing.com', '000000', 'Coach Yong', 'Kam Wa', 'Yong', ''),
('kelvin@testing.com', '000000', 'kelvin', 'Kelvin', 'Yung', ''),
('kenny@testing.com', '000000', 'kenny', 'Kenny', 'Tsang', ''),
('kiros@testing.com', '000000', 'kiros', 'Kiros', 'Choi', ''),
('mok@testing.com', '000000', 'ttmok', 'TT', 'Mok', '');

-- --------------------------------------------------------

--
-- 資料表結構 `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(2) NOT NULL,
  `name` varchar(256) NOT NULL,
  `sports_id` int(2) NOT NULL,
  `college_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `venue`
--

INSERT INTO `venue` (`venue_id`, `name`, `sports_id`, `college_id`) VALUES
(1, 'New Asia Gymnasium Basketball Court', 1, 2),
(2, 'New Asia Gymnasium Badminton Court No.1', 4, 2),
(3, 'New Asia Gymnasium Badminton Court No.2', 4, 2),
(4, 'New Asia Gymnasium Badminton Court No.3', 4, 2),
(5, 'New Asia Gymnasium Volleyball Court', 5, 2),
(8, 'University Gymnasium Basketball Court', 1, 10),
(9, 'University Gymnasium Badminton Court No.1', 4, 10),
(10, 'University Gymnasium Badminton Court No.2', 4, 10),
(11, 'University Gymnasium Badminton Court No.3', 4, 10),
(12, 'University Gymnasium Volleyball Court', 5, 10),
(13, 'Sir Philip Haddon-Cave Sports Field Track', 6, 10),
(14, 'Sir Philip Haddon-Cave Sports Field Soccer Pitch', 8, 10),
(15, 'Lingnan Stadium Soccer Pitch', 8, 1),
(16, 'Univesity Tennis Court No.3', 2, 10),
(17, 'Univesity Tennis Court No.4', 2, 10),
(18, 'Univesity Tennis Court No.5', 2, 10),
(19, 'Univesity Tennis Court No.6', 2, 10),
(20, 'Univesity Tennis Court No.7', 2, 10),
(21, 'Shaw College Tennis Court No.1', 2, 4),
(22, 'Shaw College Tennis Court No.2', 2, 4),
(23, 'Chung Chi College Tennis Court No.1', 2, 1),
(24, 'United College Tennis Court No.1', 2, 3),
(25, 'United College Tennis Court No.2', 2, 3),
(26, 'University Swimming Pool', 9, 10),
(27, 'University Gymnasium', 10, 10),
(28, 'Thomas H.C. Cheung Gymnasium Volleyball Court', 5, 3),
(29, 'Lingnan Stadium Softball Field', 11, 1),
(30, 'Lingnan Stadium Handball Court', 7, 1),
(31, 'Kwok Sports Building Squash Court', 12, 10),
(32, 'Shaw College Table Tennis Room', 3, 4),
(33, 'United College Table Tennis Room', 3, 3),
(34, 'University Sport Centre Table Tennis Room', 3, 10);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- 資料表索引 `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`email`);

--
-- 資料表索引 `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_id`);

--
-- 資料表索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_coach` (`email`),
  ADD KEY `course_level` (`level_id`),
  ADD KEY `course_location` (`venue_id`);

--
-- 資料表索引 `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- 資料表索引 `participate`
--
ALTER TABLE `participate`
  ADD PRIMARY KEY (`course_id`,`email`),
  ADD KEY `participate_student` (`email`);

--
-- 資料表索引 `private_session`
--
ALTER TABLE `private_session`
  ADD PRIMARY KEY (`session_id`);

--
-- 資料表索引 `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `reserve_user` (`email`);

--
-- 資料表索引 `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `session_location` (`venue_id`);

--
-- 資料表索引 `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`email`,`session_id`),
  ADD KEY `share_shared_session` (`session_id`);

--
-- 資料表索引 `shared_session`
--
ALTER TABLE `shared_session`
  ADD PRIMARY KEY (`session_id`);

--
-- 資料表索引 `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`sports_id`);

--
-- 資料表索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`email`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- 資料表索引 `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_id`),
  ADD KEY `venue_sports` (`sports_id`),
  ADD KEY `venue_college` (`college_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `college`
--
ALTER TABLE `college`
  MODIFY `college_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用資料表 AUTO_INCREMENT `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用資料表 AUTO_INCREMENT `sports`
--
ALTER TABLE `sports`
  MODIFY `sports_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用資料表 AUTO_INCREMENT `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_user` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- 資料表的 Constraints `coach`
--
ALTER TABLE `coach`
  ADD CONSTRAINT `coach_user` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- 資料表的 Constraints `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_coach` FOREIGN KEY (`email`) REFERENCES `coach` (`email`),
  ADD CONSTRAINT `course_level` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`),
  ADD CONSTRAINT `course_location` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`venue_id`);

--
-- 資料表的 Constraints `participate`
--
ALTER TABLE `participate`
  ADD CONSTRAINT `participate_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `participate_student` FOREIGN KEY (`email`) REFERENCES `student` (`email`);

--
-- 資料表的 Constraints `private_session`
--
ALTER TABLE `private_session`
  ADD CONSTRAINT `private_session_session` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`);

--
-- 資料表的 Constraints `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_private_session` FOREIGN KEY (`session_id`) REFERENCES `private_session` (`session_id`),
  ADD CONSTRAINT `reserve_user` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- 資料表的 Constraints `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_location` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`venue_id`);

--
-- 資料表的 Constraints `share`
--
ALTER TABLE `share`
  ADD CONSTRAINT `share_shared_session` FOREIGN KEY (`session_id`) REFERENCES `shared_session` (`session_id`),
  ADD CONSTRAINT `share_student` FOREIGN KEY (`email`) REFERENCES `student` (`email`);

--
-- 資料表的 Constraints `shared_session`
--
ALTER TABLE `shared_session`
  ADD CONSTRAINT `shared_session_session` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`);

--
-- 資料表的 Constraints `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_user` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- 資料表的 Constraints `venue`
--
ALTER TABLE `venue`
  ADD CONSTRAINT `venue_college` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`),
  ADD CONSTRAINT `venue_sports` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`sports_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
