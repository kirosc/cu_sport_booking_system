-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019-03-23 10:39:34
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
('admin001@gmail.com'),
('admin002@gmail.com');

-- --------------------------------------------------------

--
-- 資料表結構 `category`
--

CREATE TABLE `category` (
  `category_id` int(1) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `category`
--

INSERT INTO `category` (`category_id`, `description`) VALUES
(1, 'Training'),
(2, 'Freestyle');

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
('coach001@gmail.com', 'I am coach 001 used for testing', 'NA'),
('coach002@gmail.com', 'I am coach 001 used for testing', 'NA');

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--

CREATE TABLE `course` (
  `course_id` int(10) NOT NULL,
  `name` varchar(256) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `category_id` int(1) NOT NULL,
  `location_id` int(2) NOT NULL,
  `price` int(3) NOT NULL,
  `available_seats` int(3) NOT NULL,
  `description` text NOT NULL,
  `level_id` int(1) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `course`
--

INSERT INTO `course` (`course_id`, `name`, `start_time`, `end_time`, `category_id`, `location_id`, `price`, `available_seats`, `description`, `level_id`, `email`) VALUES
(1, 'Testing course 1', '2019-04-01 12:00:00', '2019-04-01 14:00:00', 1, 1, 50, 15, 'Testing course 1', 1, 'coach001@gmail.com'),
(2, 'Testing course 2', '2019-04-02 12:00:00', '2019-04-02 15:00:00', 1, 1, 20, 20, 'Testing course 2', 1, 'coach002@gmail.com');

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
(2, 'Intermediate');

-- --------------------------------------------------------

--
-- 資料表結構 `location`
--

CREATE TABLE `location` (
  `location_id` int(2) NOT NULL,
  `name` varchar(256) NOT NULL,
  `photo` varchar(256) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `location`
--

INSERT INTO `location` (`location_id`, `name`, `photo`) VALUES
(1, 'University Gym', 'F01.jpg'),
(2, 'New Asia Gym', 'F02.jpg'),
(3, 'United College', 'F03.jpg');

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
('student001@gmail.com', 1, 'Credit Card'),
('student002@gmail.com', 2, 'Credit Card');

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
(1, 150),
(2, 20);

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
('student001@gmail.com', 1, 'Credit Card'),
('student002@gmail.com', 2, 'Credit Card');

-- --------------------------------------------------------

--
-- 資料表結構 `session`
--

CREATE TABLE `session` (
  `session_id` int(10) NOT NULL,
  `name` varchar(256) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `location_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `session`
--

INSERT INTO `session` (`session_id`, `name`, `start_time`, `end_time`, `location_id`) VALUES
(1, 'Basketball', '2019-04-03 12:00:00', '2019-04-03 14:00:00', 3),
(2, 'Tennis', '2019-04-04 12:00:00', '2019-04-04 15:00:00', 2),
(3, 'Badminton', '2019-04-05 10:00:00', '2019-04-05 11:00:00', 1),
(4, 'Table Tennis', '2019-04-06 16:00:00', '2019-04-06 18:00:00', 1);

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
('student001@gmail.com', 4, 'Credit Card'),
('student002@gmail.com', 4, 'Credit Card');

-- --------------------------------------------------------

--
-- 資料表結構 `shared_session`
--

CREATE TABLE `shared_session` (
  `session_id` int(10) NOT NULL,
  `price` int(3) NOT NULL,
  `available_seats` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `shared_session`
--

INSERT INTO `shared_session` (`session_id`, `price`, `available_seats`) VALUES
(3, 10, 4),
(4, 15, 2);

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
('student001@gmail.com', 'NA', '1999-01-01', '12345678', 'I am student 001 used for testing'),
('student002@gmail.com', 'NA', '1999-01-01', '12345678', 'I am student 002 used for testing');

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
('admin001@gmail.com', '000000', 'Admin 001', 'Andy', 'Chan', 'NA'),
('admin002@gmail.com', '000000', 'Admin 002', 'Bobby', 'Lee', 'NA'),
('coach001@gmail.com', '000000', 'Coach 001', 'Chris', 'Cheung', 'NA'),
('coach002@gmail.com', '000000', 'Coach 002', 'David', 'Wong', 'NA'),
('student001@gmail.com', '000000', 'Student 001', 'Eric', 'Ho', 'NA'),
('student002@gmail.com', '000000', 'Student 002', 'Felix', 'Lau', 'NA');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- 資料表索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- 資料表索引 `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`email`);

--
-- 資料表索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_coach` (`email`),
  ADD KEY `course_level` (`level_id`),
  ADD KEY `course_category` (`category_id`),
  ADD KEY `course_location` (`location_id`);

--
-- 資料表索引 `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- 資料表索引 `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

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
  ADD KEY `reserve_student` (`email`);

--
-- 資料表索引 `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `session_location` (`location_id`);

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
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  ADD CONSTRAINT `course_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `course_coach` FOREIGN KEY (`email`) REFERENCES `coach` (`email`),
  ADD CONSTRAINT `course_level` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`),
  ADD CONSTRAINT `course_location` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

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
  ADD CONSTRAINT `reserve_student` FOREIGN KEY (`email`) REFERENCES `student` (`email`);

--
-- 資料表的 Constraints `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_location` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
