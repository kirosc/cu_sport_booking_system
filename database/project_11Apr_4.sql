-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019-04-11 18:01:34
-- 伺服器版本: 10.1.21-MariaDB
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `cu_sport_booking`
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
-- 資料表結構 `announcement`
--

CREATE TABLE `announcement` (
  `id` int(10) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `details` text NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `announcement`
--

INSERT INTO `announcement` (`id`, `name`, `description`, `details`, `image`) VALUES
(1, 'The Opening of Kwok Sports Building', 'This is Announcement 1', 'Kwok Sports Building has opened. Students can enjoy the facilities. Enjoy doing sports.', 'A001.jpg'),
(2, 'Fitness Promotion Day', 'This is Announcement 2', 'Keeping fit is very important, we would like to promote the importance of fitness in daily life.', 'A002.jpg'),
(3, 'Experience Day', 'This is Announcement 3', 'Students can try out different sport activities in one day to find their interest', 'A003.jpg');

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
  `image` varchar(256) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `college`
--

INSERT INTO `college` (`college_id`, `name`, `image`) VALUES
(1, 'Chung Chi College', 'C01.jpg'),
(2, 'New Asia College', 'C02.jpg'),
(3, 'United College', 'C03.jpg'),
(4, 'Shaw College', 'C04.jpg'),
(5, 'Morningside College', 'C05.jpg'),
(6, 'S.H. Ho College', 'C06.jpg'),
(7, 'C.W. Chu College', 'C07.jpg'),
(8, 'Wu Yee Sun College', 'C08.jpg'),
(9, 'Lee Woo Sing College', 'C09.jpg'),
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
  `price` int(3) NOT NULL,
  `available_seats` int(3) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(256) NOT NULL DEFAULT 'default.png',
  `level_id` int(1) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `course`
--

INSERT INTO `course` (`course_id`, `name`, `start_time`, `end_time`, `price`, `available_seats`, `description`, `image`, `level_id`, `email`) VALUES
(1, 'Basic Basketball Class', '2019-04-24 12:00:00', '2019-04-24 13:00:00', 20, 20, 'Basketball class for beginners', 'C001.jpg', 1, 'coach_yong@testing.com'),
(2, 'Basic Table Tennis Class', '2019-04-25 12:00:00', '2019-04-25 13:00:00', 15, 10, 'Table Tennis class for Beginners', 'C002.jpg', 1, 'coach_peter@testing.com');

-- --------------------------------------------------------

--
-- 資料表結構 `course_session`
--

CREATE TABLE `course_session` (
  `course_id` int(10) NOT NULL,
  `session_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `course_session`
--

INSERT INTO `course_session` (`course_id`, `session_id`) VALUES
(1, 11),
(2, 12);

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
-- 資料表結構 `reserve`
--

CREATE TABLE `reserve` (
  `email` varchar(256) NOT NULL,
  `session_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `reserve`
--

INSERT INTO `reserve` (`email`, `session_id`) VALUES
('mok@testing.com', 1),
('mok@testing.com', 2),
('mok@testing.com', 8),
('mok@testing.com', 9),
('mok@testing.com', 10);

-- --------------------------------------------------------

--
-- 資料表結構 `session`
--

CREATE TABLE `session` (
  `session_id` int(10) NOT NULL,
  `start_time` datetime NOT NULL,
  `venue_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `session`
--

INSERT INTO `session` (`session_id`, `start_time`, `venue_id`) VALUES
(1, '2019-04-30 10:00:00', 16),
(2, '2019-04-30 11:00:00', 16),
(3, '2019-04-30 12:00:00', 16),
(4, '2019-04-30 13:00:00', 16),
(5, '2019-04-30 14:00:00', 16),
(6, '2019-04-30 13:00:00', 31),
(7, '2019-04-30 14:00:00', 31),
(8, '2019-04-30 15:00:00', 31),
(9, '2019-04-30 16:00:00', 31),
(10, '2019-04-30 17:00:00', 31),
(11, '2019-04-24 12:00:00', 8),
(12, '2019-04-25 12:00:00', 33);

-- --------------------------------------------------------

--
-- 資料表結構 `share`
--

CREATE TABLE `share` (
  `email` varchar(256) NOT NULL,
  `session_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `share`
--

INSERT INTO `share` (`email`, `session_id`) VALUES
('bobby@testing.com', 8),
('kelvin@testing.com', 8),
('kenny@testing.com', 8);

-- --------------------------------------------------------

--
-- 資料表結構 `shared_session`
--

CREATE TABLE `shared_session` (
  `session_id` int(10) NOT NULL,
  `available_seats` int(3) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `shared_session`
--

INSERT INTO `shared_session` (`session_id`, `available_seats`, `description`) VALUES
(8, 10, 'Basketball session shared by TT Mok, looking for basketball lovers to play together'),
(9, 10, 'Basketball session shared by TT Mok, looking for basketball lovers to play together'),
(10, 10, 'Basketball session shared by TT Mok, looking for basketball lovers to play together');

-- --------------------------------------------------------

--
-- 資料表結構 `sports`
--

CREATE TABLE `sports` (
  `sports_id` int(2) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `sports`
--

INSERT INTO `sports` (`sports_id`, `name`, `image`) VALUES
(1, 'Basketball', 'S01.jpg'),
(2, 'Tennis', 'S02.jpg'),
(3, 'Table Tennis', 'S03.jpg'),
(4, 'Badminton', 'S04.jpg'),
(5, 'Volleyball', 'S05.jpg'),
(6, 'Track and Field', 'S06.jpg'),
(7, 'Handball', 'S07.jpg'),
(8, 'Football', 'S08.jpg'),
(9, 'Swimming', 'S09.jpg'),
(10, 'Gymnastics', 'S10.jpg'),
(11, 'Softball', 'S11.jpg'),
(12, 'Squash', 'S12.jpg'),
(13, 'Archery', 'S13.jpg'),
(14, 'Yoga', 'S14.jpg'),
(15, 'Tai Chi', 'S15.jpg');

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
  `icon` varchar(1024) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`email`, `password`, `username`, `first_name`, `last_name`, `icon`) VALUES
('admin@testing.com', '000000', 'admin', 'Tai Man', 'Chan', 'default.png'),
('bobby@testing.com', '000000', 'bobbyJai', 'Bobby', 'Chan', 'default.png'),
('coach_peter@testing.com', '000000', 'Peter_Chan', 'Peter', 'Chan', 'default.png'),
('coach_rex@tseting.com', '000000', 'Boxing_Rex', 'Rex', 'Tso', 'boxing_rex.jpg'),
('coach_yong@testing.com', '000000', 'Coach_Yong', 'Kam Wa', 'Yong', 'coach_yong.jpg'),
('kelvin@testing.com', '000000', 'kelvinJai', 'Kelvin', 'Yung', 'default.png'),
('kenny@testing.com', '000000', 'kennyJai', 'Kenny', 'Tsang', 'kennyjai.jpg'),
('kiros@testing.com', '000000', 'kirosJai', 'Kiros', 'Choi', 'kriosjai.jpg'),
('mok@testing.com', '000000', 'mokJai', 'TT', 'Mok', 'default.png');

-- --------------------------------------------------------

--
-- 資料表結構 `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(2) NOT NULL,
  `name` varchar(256) NOT NULL,
  `map` text NOT NULL,
  `price` int(3) NOT NULL,
  `sports_id` int(2) NOT NULL,
  `college_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `venue`
--

INSERT INTO `venue` (`venue_id`, `name`, `map`, `price`, `sports_id`, `college_id`) VALUES
(1, 'New Asia Gymnasium Basketball Court', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3688.2130979451617!2d114.2068938!3d22.4210038!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa3842bccc1b8346b!2sNew+Asia+College+Gymnasium!5e0!3m2!1szh-TW!2shk!4v1554790784763!5m2!1szh-TW!2shk', 100, 1, 2),
(2, 'New Asia Gymnasium Badminton Court No.1', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3688.2130979451617!2d114.2068938!3d22.4210038!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa3842bccc1b8346b!2sNew+Asia+College+Gymnasium!5e0!3m2!1szh-TW!2shk!4v1554790784763!5m2!1szh-TW!2shk', 20, 4, 2),
(3, 'New Asia Gymnasium Badminton Court No.2', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3688.2130979451617!2d114.2068938!3d22.4210038!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa3842bccc1b8346b!2sNew+Asia+College+Gymnasium!5e0!3m2!1szh-TW!2shk!4v1554790784763!5m2!1szh-TW!2shk', 20, 4, 2),
(4, 'New Asia Gymnasium Badminton Court No.3', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3688.2130979451617!2d114.2068938!3d22.4210038!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa3842bccc1b8346b!2sNew+Asia+College+Gymnasium!5e0!3m2!1szh-TW!2shk!4v1554790784763!5m2!1szh-TW!2shk', 20, 4, 2),
(5, 'New Asia Gymnasium Volleyball Court', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3688.2130979451617!2d114.2068938!3d22.4210038!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa3842bccc1b8346b!2sNew+Asia+College+Gymnasium!5e0!3m2!1szh-TW!2shk!4v1554790784763!5m2!1szh-TW!2shk', 100, 5, 2),
(8, 'University Sports Centre Basketball Court', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d922.0709409464174!2d114.2112309!3d22.418343!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089ec5bbce5d%3A0x9c95c1d8efae6a0c!2z6aas5paZ5rC05aSn5a246YGT5aSn5a246auU6IKy6aSo!5e0!3m2!1szh-TW!2shk!4v1554790844512!5m2!1szh-TW!2shk', 100, 1, 10),
(9, 'University Sports Centre Badminton Court No.1', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d922.0709409464174!2d114.2112309!3d22.418343!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089ec5bbce5d%3A0x9c95c1d8efae6a0c!2z6aas5paZ5rC05aSn5a246YGT5aSn5a246auU6IKy6aSo!5e0!3m2!1szh-TW!2shk!4v1554790844512!5m2!1szh-TW!2shk', 20, 4, 10),
(10, 'University Sports Centre Badminton Court No.2', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d922.0709409464174!2d114.2112309!3d22.418343!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089ec5bbce5d%3A0x9c95c1d8efae6a0c!2z6aas5paZ5rC05aSn5a246YGT5aSn5a246auU6IKy6aSo!5e0!3m2!1szh-TW!2shk!4v1554790844512!5m2!1szh-TW!2shk', 20, 4, 10),
(11, 'University Sports Centre Badminton Court No.3', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d922.0709409464174!2d114.2112309!3d22.418343!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089ec5bbce5d%3A0x9c95c1d8efae6a0c!2z6aas5paZ5rC05aSn5a246YGT5aSn5a246auU6IKy6aSo!5e0!3m2!1szh-TW!2shk!4v1554790844512!5m2!1szh-TW!2shk', 20, 4, 10),
(12, 'University Sports Centre Volleyball Court', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d922.0709409464174!2d114.2112309!3d22.418343!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089ec5bbce5d%3A0x9c95c1d8efae6a0c!2z6aas5paZ5rC05aSn5a246YGT5aSn5a246auU6IKy6aSo!5e0!3m2!1szh-TW!2shk!4v1554790844512!5m2!1szh-TW!2shk', 100, 5, 10),
(13, 'Sir Philip Haddon-Cave Sports Field Track', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3688.261949796247!2d114.2097767!3d22.4191644!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x896a85ce51108e2e!2z5aSP6byO5Z-66YGL5YuV5aC0!5e0!3m2!1szh-TW!2shk!4v1554790874698!5m2!1szh-TW!2shk', 0, 6, 10),
(14, 'Sir Philip Haddon-Cave Sports Field Soccer Pitch', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3688.261949796247!2d114.2097767!3d22.4191644!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x896a85ce51108e2e!2z5aSP6byO5Z-66YGL5YuV5aC0!5e0!3m2!1szh-TW!2shk!4v1554790874698!5m2!1szh-TW!2shk', 150, 8, 10),
(15, 'Lingnan Stadium Soccer Pitch', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d922.0953127224957!2d114.2088633!3d22.4146718!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089e07967bbb%3A0xdc604bfb3ab6941a!2z5ba65Y2X6YGL5YuV5aC0!5e0!3m2!1szh-TW!2shk!4v1554790894725!5m2!1szh-TW!2shk', 150, 8, 1),
(16, 'Univesity Tennis Court No.3', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d922.0750651419446!2d114.21053772918943!3d22.41772179907889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089eec48836f%3A0x77d080519b32b84a!2z6aas5paZ5rC05aSn5a246YGT!5e0!3m2!1szh-TW!2shk!4v1554791038620!5m2!1szh-TW!2shk', 40, 2, 10),
(17, 'Univesity Tennis Court No.4', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d922.0750651419446!2d114.21053772918943!3d22.41772179907889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089eec48836f%3A0x77d080519b32b84a!2z6aas5paZ5rC05aSn5a246YGT!5e0!3m2!1szh-TW!2shk!4v1554791038620!5m2!1szh-TW!2shk', 40, 2, 10),
(18, 'Univesity Tennis Court No.5', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d922.0750651419446!2d114.21053772918943!3d22.41772179907889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089eec48836f%3A0x77d080519b32b84a!2z6aas5paZ5rC05aSn5a246YGT!5e0!3m2!1szh-TW!2shk!4v1554791038620!5m2!1szh-TW!2shk', 40, 2, 10),
(19, 'Univesity Tennis Court No.6', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3688.277642662499!2d114.2128687958287!3d22.41857349215442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089f267618e3%3A0x860fc6532c38852a!2z6aas5paZ5rC055Kw6L-05p2x6Lev!5e0!3m2!1szh-TW!2shk!4v1554791169635!5m2!1szh-TW!2shk', 40, 2, 10),
(20, 'Univesity Tennis Court No.7', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3688.277642662499!2d114.2128687958287!3d22.41857349215442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089f267618e3%3A0x860fc6532c38852a!2z6aas5paZ5rC055Kw6L-05p2x6Lev!5e0!3m2!1szh-TW!2shk!4v1554791169635!5m2!1szh-TW!2shk', 40, 2, 10),
(21, 'Shaw College Tennis Court No.1', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d922.0293205422014!2d114.20592502918947!3d22.424611099078717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjLCsDI1JzI4LjYiTiAxMTTCsDEyJzIzLjMiRQ!5e0!3m2!1szh-TW!2shk!4v1554790948847!5m2!1szh-TW!2shk', 40, 2, 4),
(22, 'Shaw College Tennis Court No.2', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d922.0293205422014!2d114.20592502918947!3d22.424611099078717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjLCsDI1JzI4LjYiTiAxMTTCsDEyJzIzLjMiRQ!5e0!3m2!1szh-TW!2shk!4v1554790948847!5m2!1szh-TW!2shk', 40, 2, 4),
(23, 'Chung Chi College Tennis Court No.1', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3688.277642662499!2d114.2128687958287!3d22.41857349215442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089f267618e3%3A0x860fc6532c38852a!2z6aas5paZ5rC055Kw6L-05p2x6Lev!5e0!3m2!1szh-TW!2shk!4v1554791169635!5m2!1szh-TW!2shk', 40, 2, 1),
(24, 'United College Tennis Court No.1', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d922.0573573157781!2d114.20286952918946!3d22.420388899078848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjLCsDI1JzEzLjQiTiAxMTTCsDEyJzEyLjMiRQ!5e0!3m2!1szh-TW!2shk!4v1554791227142!5m2!1szh-TW!2shk', 40, 2, 3),
(25, 'United College Tennis Court No.2', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d922.0573573157781!2d114.20286952918946!3d22.420388899078848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjLCsDI1JzEzLjQiTiAxMTTCsDEyJzEyLjMiRQ!5e0!3m2!1szh-TW!2shk!4v1554791227142!5m2!1szh-TW!2shk', 40, 2, 3),
(26, 'University Swimming Pool', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1844.1525481793485!2d114.2053146!3d22.4175397!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089cee2ff00b%3A0x84d58ae332e16add!2z5ri45rOz5rGg!5e0!3m2!1szh-TW!2shk!4v1554791101493!5m2!1szh-TW!2shk', 10, 9, 10),
(27, 'University Gymnasium', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d922.0672136800702!2d114.2112451!3d22.4189044!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340408992b876e7d%3A0x7b98e12e41222273!2sUniversity+Gym!5e0!3m2!1szh-TW!2shk!4v1554791208298!5m2!1szh-TW!2shk', 0, 10, 10),
(28, 'Thomas H.C. Cheung Gymnasium Volleyball Court', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3688.2106973430423!2d114.20379351495687!3d22.421094185260962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404092d47f70c01%3A0xa772af41e8dfc481!2zVGhvbWFzIEhDIENoZXVuZyBHeW1uYXNpdW0g5by154WK5piM6auU6IKy6aSo!5e0!3m2!1szh-TW!2shk!4v1554791244182!5m2!1szh-TW!2shk', 100, 5, 3),
(29, 'Lingnan Stadium Softball Field', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d922.0953127224957!2d114.2088633!3d22.4146718!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089e07967bbb%3A0xdc604bfb3ab6941a!2z5ba65Y2X6YGL5YuV5aC0!5e0!3m2!1szh-TW!2shk!4v1554790894725!5m2!1szh-TW!2shk', 60, 11, 1),
(30, 'Lingnan Stadium Handball Court', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d922.0953127224957!2d114.2088633!3d22.4146718!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089e07967bbb%3A0xdc604bfb3ab6941a!2z5ba65Y2X6YGL5YuV5aC0!5e0!3m2!1szh-TW!2shk!4v1554790894725!5m2!1szh-TW!2shk', 60, 7, 1),
(31, 'Kwok Sports Building Squash Court', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3688.278123524917!2d114.20857531495683!3d22.418555385262316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089ebf5b195b%3A0x43f048aaf41e24d2!2z6aas5paZ5rC05aSn5a246YGT5rG-6Zm96auU6IKy6aSo!5e0!3m2!1szh-TW!2shk!4v1554790968443!5m2!1szh-TW!2shk', 30, 12, 10),
(32, 'Shaw College Table Tennis Room', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3688.1676346016534!2d114.19944691495691!3d22.422715485260184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34040884eba33487%3A0x6779b6c2e6cc779b!2z6YC45aSr5pu46Zmi!5e0!3m2!1szh-TW!2shk!4v1554790986297!5m2!1szh-TW!2shk', 15, 3, 4),
(33, 'United College Table Tennis Room', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d461.026581799934!2d114.2059638!3d22.4210205!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089b778285cb%3A0x624160dd0c781a24!2z6aaZ5riv5Lit5paH5aSn5a245by154WK5piM6auU6IKy6aSo!5e0!3m2!1szh-TW!2shk!4v1554791194888!5m2!1szh-TW!2shk', 15, 3, 3),
(34, 'University Sport Centre Table Tennis Room', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d922.0709409464174!2d114.2112309!3d22.418343!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404089ec5bbce5d%3A0x9c95c1d8efae6a0c!2z6aas5paZ5rC05aSn5a246YGT5aSn5a246auU6IKy6aSo!5e0!3m2!1szh-TW!2shk!4v1554791004034!5m2!1szh-TW!2shk', 15, 3, 10);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- 資料表索引 `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `course_level` (`level_id`);

--
-- 資料表索引 `course_session`
--
ALTER TABLE `course_session`
  ADD PRIMARY KEY (`course_id`,`session_id`),
  ADD KEY `course_session_course` (`course_id`),
  ADD KEY `course_session_session` (`session_id`);

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
-- 資料表索引 `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`email`,`session_id`),
  ADD KEY `reserve_session` (`session_id`);

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
  MODIFY `session_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
  ADD CONSTRAINT `course_level` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`);

--
-- 資料表的 Constraints `course_session`
--
ALTER TABLE `course_session`
  ADD CONSTRAINT `course_session_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `course_session_session` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`);

--
-- 資料表的 Constraints `participate`
--
ALTER TABLE `participate`
  ADD CONSTRAINT `participate_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `participate_student` FOREIGN KEY (`email`) REFERENCES `student` (`email`);

--
-- 資料表的 Constraints `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_session` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`),
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
