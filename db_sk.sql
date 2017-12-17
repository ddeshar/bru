-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2017 at 08:35 AM
-- Server version: 5.6.31
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_bru`
--

-- --------------------------------------------------------

--
-- Table structure for table `commits`
--

CREATE TABLE IF NOT EXISTS `commits` (
  `id_commit` int(11) NOT NULL,
  `name_commit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commits`
--

INSERT INTO `commits` (`id_commit`, `name_commit`) VALUES
(1, 'ถนอม ชัยพรรณ');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE IF NOT EXISTS `committee` (
  `id_committee` int(11) NOT NULL,
  `com_idcard` varchar(13) NOT NULL COMMENT 'เลขประจำตัวประชาชน',
  `id_title` varchar(10) DEFAULT NULL,
  `com_name` varchar(100) NOT NULL COMMENT 'ชื่อ - สกุล',
  `id_position` varchar(50) NOT NULL COMMENT 'ตำแหน่ง',
  `com_birthday` date DEFAULT NULL,
  `com_address` varchar(100) NOT NULL COMMENT 'ที่อยู่',
  `com_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`id_committee`, `com_idcard`, `id_title`, `com_name`, `id_position`, `com_birthday`, `com_address`, `com_tel`) VALUES
(1, '3310100429744', '3', 'ถนอม  ชัยพรรณ', '1', '2508-02-22', '733', '0895818782'),
(2, '1319900499678', '3', 'พงษ์สวัสดิ์ กรุมรัมย์', '2', '1990-02-07', '26', '0894457687'),
(3, '1319900374652', '5', 'ลีลาวดี  ควินรัมย์', '3', '1971-06-09', '36', '0624425353'),
(4, '1319900234765', '5', 'สมจิตร แรงทอง', '7', '2512-11-11', '225', '0877744657'),
(5, '4310100003486', '4', 'ศิริกาญ มกชาติ', '7', '2526-10-01', '275', '0986543278'),
(6, '3310100429817', '3', 'นายประเสริฐ เมืองรัมย์', '4', '2503-05-13', '3', '0623546217'),
(7, '1234567890765', '5', 'สมใจ ชัยพรรณ', '4', '2512-05-19', '55', '0874569870'),
(8, '1219900378594', '4', 'นัฐนันท์ มาสายสาย', '6', '2538-09-10', '23', '0986543278'),
(9, '3131165664446', '3', 'ธนชาติ สมบัติเจริญ', '6', '2536-10-10', '22', '0623546217'),
(10, '5656443333333', '3', 'ธงชัย อินบุรีรัมย์', '7', '2534-01-20', '11', '0624425353'),
(17, '1424444345643', '4', 'ฟ้างาม เหมือนสวย', '7', '2017-12-07', '111', '0623546217');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE IF NOT EXISTS `deposit` (
  `fak_id` int(11) NOT NULL,
  `fak_date` timestamp NULL DEFAULT NULL,
  `mem_id` int(3) DEFAULT NULL,
  `name_commit` varchar(20) NOT NULL COMMENT 'ชื่อผู้รับฝาก',
  `id_commit` int(5) NOT NULL,
  `fak_sum` int(15) NOT NULL COMMENT 'จำนวนเงินฝาก',
  `withdraw` int(15) DEFAULT NULL,
  `fak_total` int(15) NOT NULL COMMENT 'รวมเงินฝาก'
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`fak_id`, `fak_date`, `mem_id`, `name_commit`, `id_commit`, `fak_sum`, `withdraw`, `fak_total`) VALUES
(1, '2017-12-07 03:48:26', 12, '', 1, 2500, NULL, 2500),
(3, '2017-12-07 03:48:54', 17, '', 1, 5000, NULL, 5000),
(4, '2017-12-07 03:49:04', 10, '', 1, 2900, NULL, 2900),
(5, '2017-12-07 03:49:20', 8, '', 1, 1200, NULL, 1200),
(6, '2017-12-07 03:54:17', 23, '', 1, 3200, NULL, 3200),
(7, '2017-12-07 03:55:33', 14, '', 1, 4500, NULL, 4500),
(8, '2017-12-07 03:57:59', 4, '', 1, 2100, NULL, 2100),
(9, '2017-12-07 04:09:07', 9, '', 1, 2000, NULL, 2000),
(10, '2017-12-07 04:09:21', 16, '', 1, 10000, NULL, 10000),
(11, '2017-12-07 04:09:41', 21, '', 1, 5000, NULL, 5000),
(12, '2017-12-07 04:10:35', 15, '', 1, 2200, NULL, 2200),
(13, '2017-12-07 04:10:57', 22, '', 1, 2000, NULL, 2000),
(14, '2017-12-07 04:11:11', 25, '', 1, 1000, NULL, 1000),
(15, '2017-12-07 04:11:26', 6, '', 1, 500, NULL, 500),
(16, '2017-12-07 07:05:17', 25, '', 1, 1000, NULL, 2000),
(17, '2017-12-07 07:05:35', 7, '', 1, 2350, NULL, 2350),
(18, '2017-12-07 07:17:43', 6, '', 1, 500, NULL, 1000),
(19, '2017-12-07 08:22:45', 8, '', 1, 800, NULL, 2000),
(20, '2017-12-07 14:36:44', 3, '', 1, 5000, NULL, 5000),
(21, '2017-12-07 14:37:15', 5, '', 1, 1500, NULL, 1500),
(22, '2017-12-07 14:37:46', 24, '', 1, 1200, NULL, 1200),
(23, '2017-12-08 04:42:20', 11, '', 1, 2350, NULL, 2350),
(24, '2017-12-08 04:43:33', 11, '', 1, 350, NULL, 2700),
(25, '2017-12-08 06:42:30', 13, '', 1, 5600, NULL, 5600),
(26, '2017-12-08 06:42:52', 7, '', 1, 100, NULL, 2450),
(28, '2017-12-08 07:59:58', 23, '', 1, 0, 2000, 1200),
(31, '2017-12-08 08:28:07', 2, '', 1, 1000, NULL, 1000),
(32, '2017-12-08 08:28:26', 2, '', 0, 0, 500, 500),
(33, '2017-12-08 08:29:43', 2, '', 0, 0, 100, 400),
(34, '2017-12-08 08:30:02', 2, '', 1, 1000, NULL, 1400),
(35, '2017-12-08 08:33:22', 2, '', 1, 0, 400, 1000),
(36, '2017-12-08 08:34:27', 2, '', 0, 400, NULL, 1400),
(37, '2017-12-08 08:36:25', 2, '', 1, 0, 400, 1000),
(38, '2017-12-08 08:46:23', 2, '', 1, 0, 100, 900),
(39, '2017-12-08 08:48:19', 2, '', 1, 0, 100, 800),
(40, '2017-12-08 08:57:09', 28, '', 1, 2000, NULL, 2000),
(41, '2017-12-08 08:57:36', 28, '', 1, 0, 500, 1500),
(42, '2017-12-08 09:12:02', 2, '', 1, 0, 200, 600),
(43, '2017-12-08 09:12:23', 2, '', 1, 1800, NULL, 2400),
(44, '2017-12-08 09:13:01', 3, '', 1, 0, 4000, 1000),
(45, '2017-12-08 09:13:22', 3, '', 1, 1000, NULL, 2000),
(46, '2017-12-08 09:14:51', 28, '', 1, 0, 500, 1000),
(47, '2017-12-08 09:15:15', 28, '', 1, 1000, NULL, 2000),
(48, '2017-12-08 09:18:58', 2, '', 1, 0, 2000, 400),
(49, '2017-12-08 09:19:40', 3, '', 1, 0, 1000, 1000),
(50, '2017-12-08 09:20:14', 2, '', 1, 2000, NULL, 2400),
(51, '2017-12-11 05:16:16', 30, '', 1, 1000000, NULL, 1000000),
(52, '2017-12-11 05:17:02', 30, '', 1, 100, NULL, 1000100),
(53, '2017-12-11 05:17:39', 30, '', 1, 0, 100, 1000000),
(54, '2017-12-13 09:29:34', 31, '', 1, 500, NULL, 500),
(55, '2017-12-13 09:32:06', 31, '', 1, 0, 100, 400),
(56, '2017-12-13 09:34:39', 31, '', 1, 2000, NULL, 2400);

-- --------------------------------------------------------

--
-- Table structure for table `fund`
--

CREATE TABLE IF NOT EXISTS `fund` (
  `id_fund` varchar(10) NOT NULL COMMENT 'รหัสกองทุนหมู่บ้าน',
  `fund_name` varchar(100) NOT NULL COMMENT 'ชื่อกองทุน',
  `fund_detail` text NOT NULL COMMENT 'รายละเอียดกองทุน',
  `fund_money` bigint(11) NOT NULL COMMENT 'จำนวนเงินเริ่มต้น'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fund`
--

INSERT INTO `fund` (`id_fund`, `fund_name`, `fund_detail`, `fund_money`) VALUES
('2', 'เงินล้าน', 'เพื่อให้ประชาชนในหมู่บ้านมีอาชีพ', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
  `id_gender` varchar(5) NOT NULL,
  `gender_name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id_gender`, `gender_name`) VALUES
('1', 'ชาย'),
('2', 'หญิง');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `mem_id` int(3) NOT NULL,
  `mem_idcard` varchar(13) NOT NULL COMMENT 'เลขที่บัตรประชาชน',
  `id_gender` varchar(5) NOT NULL COMMENT 'เพศ',
  `id_title` varchar(10) DEFAULT NULL,
  `mem_name` varchar(100) NOT NULL COMMENT 'ชื่อ',
  `mem_birthday` date NOT NULL COMMENT 'วันเดือนปีเกิด',
  `id_status` varchar(5) NOT NULL COMMENT 'สถานภาพ',
  `mem_occupation` varchar(20) NOT NULL COMMENT 'อาชีพ',
  `mem_address` varchar(100) NOT NULL COMMENT 'ที่อยู่',
  `mem_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `mem_email` varchar(50) NOT NULL COMMENT 'อีเมล์',
  `status_mem` enum('publish','unpublish') NOT NULL DEFAULT 'unpublish',
  `mem_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fund_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_idcard`, `id_gender`, `id_title`, `mem_name`, `mem_birthday`, `id_status`, `mem_occupation`, `mem_address`, `mem_tel`, `mem_email`, `status_mem`, `mem_created_date`, `fund_status`) VALUES
(1, 'admin', '2', '4', 'แนน แอดมิน', '2537-09-10', '1', 'แอดมินระบบ', '73', '0922262993', 'ampare444@hotmail.com', 'publish', '2017-12-06 14:57:19', '0'),
(2, '1319900395871', '2', '4', 'นรีเมธ ชัยพรรณ', '2537-09-10', '1', 'นักศึกษา', '73', '0922262993', 'nareemet@hotmail.com', 'publish', '2017-12-17 05:16:53', '1'),
(3, '1319900229431', '1', '3', 'นวพล ชัยพรรณ', '2533-11-24', '1', 'ช่างกลเรือ', '73', '0870489040', 'nawapon@hotmail.com', 'publish', '2017-11-24 08:47:50', '0'),
(4, '3310101707268', '2', '5', 'ไสว ชัยพรรณ', '2512-10-06', '1', 'รับจ้าง', '73', '0870489040', 'sawai@hotmail.com', 'publish', '2017-12-17 04:06:29', '0'),
(5, '3310100429744', '1', '3', 'ถนอม ชัยพรรณ', '2508-02-22', '1', 'ผู้ใหญ่บ้าน', '73', '0895818782', 'tanom@hotmail.com', 'publish', '2017-12-17 08:32:16', '0'),
(6, '1319901104121', '1', '1', 'ณัฐวัฒน์ คะรุรัมย์', '2551-01-02', '1', 'นักเรียน', '32', '044601529', 'nat@hotmail.com', 'publish', '2017-12-07 06:25:14', '0'),
(7, '1319900301451', '2', '4', 'ปรารถนา คะรุรัมย์', '2535-08-20', '1', 'รับจ้างทั่วไป', '32', '0622247678', 'tan@hotmail.com', 'publish', '2017-12-17 04:16:49', '0'),
(8, '1209700570483', '2', '4', 'ภัทรวดี ทองช่วย', '2537-11-01', '1', 'นักศึกษา', '67', '0821365617', 'pattarawadee@hotmail.com', 'publish', '2017-12-17 04:51:57', '1'),
(9, '1212121212121', '1', '3', 'มนัสชนก มารศรี', '2537-10-23', '1', 'นักศึกษา', '33', '0638377478', 'manus@hotmail.com', 'publish', '2017-12-17 04:06:22', '0'),
(10, '1313131313131', '1', '3', 'อิสรา นัยเนตร', '2536-10-10', '1', 'โปรแกรมเมอร์', '44', '0879474857', 'isara@hotmai.com', 'publish', '2017-12-13 10:02:59', '0'),
(11, '3310100429990', '2', '5', 'วรรณี คะรุรัมย์', '2511-11-21', '2', 'รับราชการ', '32', '0837363354', 'wannee@hotmail.com', 'publish', '2017-12-17 04:52:25', '1'),
(12, '3310100429116', '2', '4', 'ลีลาวดี ควินรัมย์', '2493-01-01', '3', 'รับจ้างทั่วไป', '36', '0879474857', 'rerawadee@hotmail.com', 'publish', '2017-12-07 14:47:53', '1'),
(13, '3310100429337', '2', '5', 'ทองม้วน กรุมรัมย์', '2507-10-25', '2', 'รับจ้าง', '21', '0881234561', 'thongmuon@hotmail.com', 'publish', '2017-11-24 08:48:21', '0'),
(14, '3310101380340', '1', '3', 'พงษ์สวัสดิ์ กรุมรัมย์', '2508-05-10', '2', 'ผู้ช่วยผู้ใหญ่บ้าน', '21', '0991324567', 'wat@hotmail.com', 'publish', '2017-12-07 07:34:05', '0'),
(15, '1319900876654', '2', '4', 'ปัทมาวรรณ หงษ์ษารัมย์', '2539-08-26', '1', 'นักศึกษา', '4', '0921234876', 'pattamawan@hotmail.com', 'publish', '2017-12-11 05:40:52', '0'),
(16, '1414141414141', '2', '4', 'อภิสรา เทียนทอง', '2538-04-24', '1', 'นักศึกษา', '43', '0644414424', 'apisara@hotmail.com', 'publish', '2017-11-24 08:48:09', '0'),
(17, '1319900174114', '2', '4', 'สุภานัน มกชาติ', '2532-04-28', '2', 'รับจ้าง', '5', '0622247678', 'supanun@hotmail.com', 'publish', '2017-12-17 04:06:17', '0'),
(18, '3310101220890', '1', '3', 'ชำนาญ จิตรรัมย์', '2504-02-13', '2', 'รับจ้าง', '6', '0981231123', 'chamnan@hotmail.com', 'publish', '2017-11-24 08:48:47', '0'),
(19, '1319900016161', '1', '3', 'บัญชา จิตรรัมย์', '2527-07-01', '1', 'รับจ้าง', '6', '0999999999', 'pancha@hotmail.com', 'publish', '2017-11-24 08:47:37', '0'),
(20, '1319900092100', '1', '3', 'สิงหา จิตรรัมย์', '2529-12-21', '1', 'ช่างซ่อมรถ', '6', '0888888888', 'singha@hotmail.com', 'publish', '2017-11-24 08:47:40', '0'),
(21, '4310100003486', '2', '4', 'ศิริกาญ มกชาติ', '2526-10-01', '2', 'รับจ้าง', '5', '087777777', 'sirikan@hotmail.com', 'publish', '2017-11-24 08:48:58', '0'),
(22, '3310100246038', '2', '5', 'ตุ้มทอง  เมืองรัมย์', '2478-01-01', '2', 'ว่างงาน', '3', '0811111111', 'thong@hotmail.com', 'publish', '2017-12-17 04:06:12', '0'),
(23, '3310100429817', '1', '3', 'ประเสริฐ เมืองรัมย์', '2503-01-13', '2', 'เกษตรกร', '3', '0833232456', 'prasert@hotmail.com', 'publish', '2017-11-24 08:48:30', '0'),
(24, '3310100429884', '2', '4', 'ศรันยา เมืองรัมย์', '2524-03-02', '2', 'รับจ้าง', '3', '0877767654', 'saranya@hotmai.com', 'publish', '2017-11-24 08:48:44', '0'),
(25, '3210100429761', '1', '3', 'พายัพ ชัยพรรณ', '2494-01-01', '3', 'ว่างงาน', '1', '0877678765', 'payap@hotmail.com', 'publish', '2017-11-24 08:48:12', '0'),
(26, 'manager', '1', '3', 'ผมเป็นผู้บริหารคับ', '1010-10-10', '1', 'ผู้บริหาร', '114', '0922262993', 'manager@hotmail.com', 'publish', '2017-11-27 07:27:50', '0'),
(27, '1111111111111', '2', '2', 'dddd', '1111-11-11', '1', 'นักศึกษา', '11', '0922262993', 'ampare444@hotmail.com', 'publish', '2017-12-08 06:44:40', '0'),
(28, '1212121212121', '2', '4', 'aaaaaa', '2537-09-20', '1', 'นักศึกษา', '12', '0922262993', 'ampare444@hotmail.com', 'publish', '2017-12-08 07:56:06', '0'),
(29, '1234567890987', '1', '3', 'กกกก', '0000-00-00', '--เลื', '', '', '', '', 'unpublish', '2017-12-11 04:46:38', '0'),
(30, '1234567890123', '1', '3', 'สายฟ้า', '2537-02-20', '1', 'ทำนา', '23', '0922262993', 'aa@hotmail.com', 'publish', '2017-12-17 04:06:03', '0'),
(31, '1319900395872', '1', '3', 'สมชาย มีดี', '2537-11-11', '1', 'เกษตร', '33', '0879474857', 'aa@hotmail.com', 'publish', '2017-12-17 04:10:24', '0'),
(32, '9999999999999', '1', '3', 'fuck', '1111-11-11', '1', 'รับจ้าง', '44', '0622247678', 'ss@hotmail.com', 'publish', '2017-12-17 05:06:31', '0'),
(33, '7777777777777', '1', '4', 'ดี', '1994-12-12', '1', 'นักศึกษา', '13', '0981231123', 'ss@hotmail.com', 'publish', '2017-12-17 05:08:39', '0');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id_position` varchar(2) NOT NULL,
  `name_position` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id_position`, `name_position`) VALUES
('1', 'ประธาน'),
('2', 'รองประธาน'),
('3', 'เลขานุการ'),
('4', 'เหรัญญิก'),
('5', 'ผู้ทรงคุณวุฒิ'),
('6', 'ปฏิคม'),
('7', 'กรรมการ');

-- --------------------------------------------------------

--
-- Table structure for table `promise`
--

CREATE TABLE IF NOT EXISTS `promise` (
  `pro_id` int(4) NOT NULL COMMENT 'รหัสการทำสัญญา',
  `mem_id` varchar(4) NOT NULL COMMENT 'รหัสสมาชิก',
  `mem_name` varchar(100) NOT NULL COMMENT 'ชื่อ – สกุลสมาชิก',
  `mem_idcard` int(13) NOT NULL COMMENT 'เลขบัตรประจำตัวประชาชน',
  `sub_id` varchar(4) NOT NULL COMMENT 'รหัสการอนุมัติ',
  `app_pice` int(11) NOT NULL COMMENT 'จำนวนเงินที่อนุมัติ',
  `sub_date` date NOT NULL COMMENT 'วันที่อนุมัติ',
  `pro_date` date NOT NULL COMMENT 'วันที่ทำสัญญา',
  `sub_moneyloan` int(11) NOT NULL COMMENT 'จำนวนเงินกู้',
  `name1` varchar(100) NOT NULL COMMENT 'ชื่อ – สกุลผู้ค้ำ 1',
  `name2` varchar(100) NOT NULL COMMENT 'ชื่อ – สกุลผู้ค้ำ 2',
  `pro_redate` date NOT NULL COMMENT 'วันที่กำหนดส่ง',
  `pro_Document` varchar(500) NOT NULL COMMENT 'หลักฐานประกอบการกู้',
  `id_commit` varchar(4) NOT NULL COMMENT 'รหัสกรรมการ',
  `id_sapp` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promise`
--

INSERT INTO `promise` (`pro_id`, `mem_id`, `mem_name`, `mem_idcard`, `sub_id`, `app_pice`, `sub_date`, `pro_date`, `sub_moneyloan`, `name1`, `name2`, `pro_redate`, `pro_Document`, `id_commit`, `id_sapp`) VALUES
(1, '31', 'สมชาย มีดี', 2147483647, '', 20000, '2017-12-17', '2017-12-17', 20000, '3', '17', '2019-12-02', '1513483791.pdf', '1', 0),
(2, '7', 'ปรารถนา คะรุรัมย์', 2147483647, '', 5000, '2017-12-17', '2017-12-17', 10000, '6', '11', '2019-12-01', '1513484147.pdf', '1', 0),
(3, '2', 'นรีเมธ ชัยพรรณ', 2147483647, '', 5000, '2017-12-17', '2017-12-17', 5000, '3', '4', '2019-12-01', '1513484974.', '1', 0),
(4, '8', 'ภัทรวดี ทองช่วย', 2147483647, '', 5000, '2017-12-17', '2017-12-17', 5000, '10', '16', '2019-12-02', '1513486362.pdf', '1', 0),
(5, '11', 'วรรณี คะรุรัมย์', 2147483647, '', 10000, '2017-12-17', '2017-12-17', 10000, '3', '6', '2019-12-15', '1513486384.pdf', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE IF NOT EXISTS `refund` (
  `ref_id` int(11) NOT NULL,
  `mem_id` varchar(4) NOT NULL COMMENT 'รหัสสมาชิก',
  `mem_name` varchar(100) NOT NULL,
  `pay_pice` int(11) NOT NULL COMMENT 'เงินที่จ่ายให้กู้',
  `ref_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันที่รับชำระ',
  `rate` int(1) NOT NULL,
  `ref_rate` int(11) NOT NULL COMMENT 'อัตราดอกเบี้ยที่ชำระ',
  `ref_picetotal` int(11) NOT NULL,
  `ref_income` int(11) NOT NULL COMMENT 'จำนวนเงินที่รับมา',
  `id_commit` int(4) NOT NULL COMMENT 'รหัสกรรมการ'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`ref_id`, `mem_id`, `mem_name`, `pay_pice`, `ref_date`, `rate`, `ref_rate`, `ref_picetotal`, `ref_income`, `id_commit`) VALUES
(1, '31', 'สมชาย มีดี', 20000, '2017-12-17 04:10:24', 6, 22400, 2400, 22400, 1),
(2, '7', 'ปรารถนา คะรุรัมย์', 5000, '2017-12-17 04:16:49', 6, 5600, 600, 5600, 1);

-- --------------------------------------------------------

--
-- Table structure for table `repayment`
--

CREATE TABLE IF NOT EXISTS `repayment` (
  `pay_id` int(11) NOT NULL,
  `mem_id` varchar(4) NOT NULL COMMENT 'รหัสสมาชิก',
  `mem_name` varchar(50) NOT NULL COMMENT 'ชื่อ – สกุลสมาชิก',
  `mem_idcard` int(13) NOT NULL COMMENT 'เลขบัตรประจำตัวประชาชน',
  `pro_id` varchar(4) NOT NULL COMMENT 'รหัสการทำสัญญา',
  `sub_moneyloan` int(11) NOT NULL COMMENT 'จำนวนเงินกู้',
  `pro_redate` date NOT NULL COMMENT 'วันที่ครบกำหนดส่ง',
  `pay_date` date NOT NULL COMMENT 'วันที่จ่ายเงินกู้',
  `pay_pice` int(11) NOT NULL COMMENT 'จำนวนเงินที่จ่าย',
  `id_commit` int(2) NOT NULL COMMENT 'รหัสกรรมการ',
  `status_pay` enum('1','2') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repayment`
--

INSERT INTO `repayment` (`pay_id`, `mem_id`, `mem_name`, `mem_idcard`, `pro_id`, `sub_moneyloan`, `pro_redate`, `pay_date`, `pay_pice`, `id_commit`, `status_pay`) VALUES
(1, '31', 'สมชาย มีดี', 2147483647, '1', 0, '2019-12-02', '2017-12-17', 20000, 1, '2'),
(2, '7', 'ปรารถนา คะรุรัมย์', 2147483647, '2', 0, '2019-12-01', '2017-12-17', 5000, 1, '2'),
(3, '2', 'นรีเมธ ชัยพรรณ', 2147483647, '3', 0, '2019-12-01', '2017-12-17', 5000, 1, '1'),
(4, '2', 'นรีเมธ ชัยพรรณ', 2147483647, '3', 0, '2019-12-01', '2017-12-17', 5000, 1, '1'),
(5, '2', 'นรีเมธ ชัยพรรณ', 2147483647, '3', 0, '2019-12-01', '2017-12-17', 5000, 1, '1'),
(6, '2', 'นรีเมธ ชัยพรรณ', 2147483647, '3', 0, '2019-12-01', '2017-12-17', 5000, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` varchar(5) NOT NULL,
  `status_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status_name`) VALUES
('1', 'โสด'),
('2', 'สมรส'),
('3', 'หม้าย'),
('4', 'อย่าร้าง');

-- --------------------------------------------------------

--
-- Table structure for table `statusb_app`
--

CREATE TABLE IF NOT EXISTS `statusb_app` (
  `id_sapp` int(1) NOT NULL,
  `status_app` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statusb_app`
--

INSERT INTO `statusb_app` (`id_sapp`, `status_app`) VALUES
(0, 'รออนุมัติ'),
(1, 'อนุมัติ'),
(2, 'ไม่อนุมัติ');

-- --------------------------------------------------------

--
-- Table structure for table `stop_member`
--

CREATE TABLE IF NOT EXISTS `stop_member` (
  `stopmem_id` int(4) NOT NULL,
  `mem_id` int(15) DEFAULT NULL,
  `mem_name` varchar(100) DEFAULT NULL,
  `fak_total` int(15) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT '1',
  `stop_date` date NOT NULL,
  `id_commit` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stop_member`
--

INSERT INTO `stop_member` (`stopmem_id`, `mem_id`, `mem_name`, `fak_total`, `status`, `stop_date`, `id_commit`) VALUES
(1, 27, 'dddd', 0, '999', '2017-12-07', 1),
(2, 27, 'dddd', 0, '999', '2017-12-07', 1),
(3, 27, 'dddd', 0, '999', '2017-12-07', 1),
(4, 27, 'dddd', 0, '999', '2017-12-08', 1),
(5, 30, 'สายฟ้า', 1000000, '999', '2017-12-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `submitted`
--

CREATE TABLE IF NOT EXISTS `submitted` (
  `sub_id` int(4) NOT NULL COMMENT 'รหัสยื่นกู้',
  `mem_id` varchar(4) NOT NULL COMMENT 'รหัสสมาชิก',
  `mem_name` varchar(50) NOT NULL COMMENT 'ชื่อ - สกุลสมาชิก',
  `sub_moneyloan` int(11) NOT NULL COMMENT 'จำนวนเงินที่ขอกู้',
  `sub_objective` varchar(200) NOT NULL COMMENT 'วัตถุประสงค์ในการขอกู้',
  `sub_date` date NOT NULL COMMENT 'วันที่ยื่นกู้',
  `name1` varchar(50) NOT NULL COMMENT 'ชื่อผู้คำประกันคนที่ 1',
  `name2` varchar(50) NOT NULL COMMENT 'ชื่อผู้คำประกันคนที่ 2',
  `id_commit` varchar(4) NOT NULL COMMENT 'รหัสกรรมการ',
  `id_sapp` int(1) NOT NULL,
  `sanya` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submitted`
--

INSERT INTO `submitted` (`sub_id`, `mem_id`, `mem_name`, `sub_moneyloan`, `sub_objective`, `sub_date`, `name1`, `name2`, `id_commit`, `id_sapp`, `sanya`) VALUES
(1, '2', 'นรีเมธ ชัยพรรณ', 10000, 'เพื่อการศึกษา', '2017-12-01', '4', '16', '1', 1, 4),
(2, '7', 'ปรารถนา คะรุรัมย์', 10000, 'พัฒนาอาชีพ', '2017-12-01', '6', '11', '1', 1, 4),
(3, '8', 'ภัทรวดี ทองช่วย', 5000, 'พัฒนาอาชีพ', '2017-12-02', '10', '16', '1', 1, 3),
(4, '31', 'สมชาย มีดี', 20000, 'เพื่อพัฒนาอาชีพ', '2017-12-02', '3', '17', '1', 1, 4),
(5, '2', 'นรีเมธ ชัยพรรณ', 5000, 'fffff', '2017-12-01', '3', '4', '1', 1, 4),
(6, '11', 'วรรณี คะรุรัมย์', 10000, 'ffff', '2017-12-15', '3', '6', '1', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(13) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(60) NOT NULL,
  `status` enum('0','100','500','999') NOT NULL DEFAULT '999',
  `name` varchar(255) NOT NULL,
  `mem_id` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `email`, `status`, `name`, `mem_id`) VALUES
(1, 'admin', 'e8730e71bbe10d2c40a15ab4b86b2413b033ee1fa04588069f6e4444fab0c23f', 'ampare444@hotmail.com', '500', 'แนน แอดมิน', 1),
(2, '1319900395871', '462d7dbe228ab0d07f689e9c96303623138fef91b013ce4c95807dd6a2fd7171', 'nareemet@hotmail.com', '100', 'นรีเมธ ชัยพรรณ', 2),
(3, '1319900229431', '1d5d987a95101db0c5c53da527d9359123d912a72db01679d36a5469b01dfd24', 'nawapon@hotmail.com', '0', 'นวพล ชัยพรรณ', 3),
(4, '3310101707268', 'e8730e71bbe10d2c40a15ab4b86b2413b033ee1fa04588069f6e4444fab0c23f', 'sawai@hotmail.com', '0', 'ไสว ชัยพรรณ', 4),
(5, '3310100429744', 'deb83fe8bc80b14c7a3045981fba2d57851aa1a2fb8dee5c7255ad88aec1d7be', 'tanom@hotmail.com', '0', 'ถนอม ชัยพรรณ', 5),
(6, '1319901104121', '124b6813d30524e1fd3269ac059c21b1c75fcc285e10db99dfbb5b0defff19ad', 'nat@hotmail.com', '0', 'ณัฐวัฒน์ คะรุรัมย์', 6),
(7, '1319900301451', '0093331b8e1afb3db0529abd5e75e1564e20bbaec5943ce8337b5fd100017279', 'tan@hotmail.com', '0', 'ปรารถนา คะรุรัมย์', 7),
(8, '1209700570483', '07129ac6d80f1f8556d2992035d8430ebedc4df803fc67bde8969edc28cd0e80', 'pattarawadee@hotmail.com', '0', 'ภัทรวดี ทองช่วย', 8),
(9, '1212121212121', '9917ac9ac6ca2da11983f9ddf94683238103e531e69b4706c32bcf004e9211fd', 'manus@hotmail.com', '0', 'มนัสชนก มารศรี', 9),
(10, '1313131313131', 'e8730e71bbe10d2c40a15ab4b86b2413b033ee1fa04588069f6e4444fab0c23f', 'isara@hotmai.com', '0', 'อิสรา นัยเนตร', 10),
(11, '3310100429990', '1b6d1d4feb4bb5f7a0dda90d737d944c62995ad641fc177a10d34d7b54fc0a16', 'wannee@hotmail.com', '0', 'วรรณี คะรุรัมย์', 11),
(12, '3310100429116', '069aedfdf0156a388cc66b7922588c3085a2dc70adb3fcfe9ae483d08d6d258b', 'rerawadee@hotmail.com', '0', 'ลีลาวดี ควินรัมย์', 12),
(13, '3310100429337', '2acf40f30d35eb42ceb0ffc5d0a0e11d446d3c4d0705a10d2aa615764127b5e1', 'thongmuon@hotmail.com', '0', 'ทองม้วน กรุมรัมย์', 13),
(14, '3310101380340', 'b652623aaefed7545d0eda696ee5df389fc0a91a40fdcb043250925d41ae849f', 'wat@hotmail.com', '0', 'พงษ์สวัสดิ์ กรุมรัมย์', 14),
(15, '1319900876654', 'd69f7c8a49fb404ab4dd26f7d3c8b4794c881b156ce050e1e1fec04bb0d47630', 'pattamawan@hotmail.com', '0', 'ปัทมาวรรณ หงษ์ษารัมย์', 15),
(16, '1414141414141', '7678e09f7dba6c63a62264afc6a19c11c1055150835b17b99d5a91da4e062966', 'apisara@hotmail.com', '0', 'อภิสรา เทียนทอง', 16),
(17, '1319900174114', 'ef92bb6d6a0dc8295c4fe6fdd5e39dd267bf92fea200b6bb5a036a6ef64508f6', 'supanun@hotmail.com', '0', 'สุภานัน มกชาติ', 17),
(18, '3310101220890', 'f3bc4ec3fc72417738a6b15a931eb54206df32d00ac80599f3f217b0fcb11ad9', 'chamnan@hotmail.com', '0', 'ชำนาญ จิตรรัมย์', 18),
(19, '1319900016161', 'b14e1bad2a0b5a01de6c943fe5a2b0da7add018c3bd5b76408ad9d08ce8bf606', 'pancha@hotmail.com', '0', 'บัญชา จิตรรัมย์', 19),
(20, '1319900092100', '6e7219e1c4fe6206ca8c521c7f01a87abcc1cd36bee63be40f9ede7bb02b88a3', 'singha@hotmail.com', '0', 'สิงหา จิตรรัมย์', 20),
(21, '4310100003486', '02f6a801629222425e8e28becf4973612e8b03ba17cf51934686699631f72b54', 'sirikan@hotmail.com', '0', 'ศิริกาญ มกชาติ', 21),
(22, '3310100246038', '6f00a71b380a49af101684a7a6b1e5de77cd395fa51789e89fd1b5813bc53db0', 'thong@hotmail.com', '0', 'ตุ้มทอง  เมืองรัมย์', 22),
(23, '3310100429817', '6b725d68a22e678ae316041ec2b99ec3bab637e5c4437139222cd77ec097e3c3', 'prasert@hotmail.com', '0', 'ประเสริฐ เมืองรัมย์', 23),
(24, '3310100429884', '8a8ef663857d730b73506a3b30b56936d2f74437f507f17f715c1bf1e7d92d70', 'saranya@hotmai.com', '0', 'ศรันยา เมืองรัมย์', 24),
(25, '3210100429761', '10195cc83ed27e0961e40fe4712d80ba53b265816afeebdd7c3bffc77f780540', 'payap@hotmail.com', '0', 'พายัพ ชัยพรรณ', 25),
(27, 'manager', 'd08f29da2bfaf4e625fd9692e6ee7c7d2c6635bb8ae424b8f54906cc6160d88e', 'manager@hotmail.com', '100', 'ผมเป็นผู้บริหารคับ', 26),
(28, '1111111111111', 'b7bc77125fc032938215aeeff652139d6b5a3b4b72ae06298e1c2035bae873e6', 'ampare444@hotmail.com', '0', 'dddd', 27),
(29, '1212121212121', '9ed5e907db64cdafcf546d3c0564b7999fa6b03f171623083ea0efa1a6b5f79d', 'ampare444@hotmail.com', '0', 'aaaaaa', 28),
(30, '1234567890987', '430a7a9f52df222bfd4ee6a068c585aa6ef95362816553be1bc9aee3027f61a3', '', '999', 'กกกก', 29),
(31, '1234567890123', 'a73c535134906ff3b220d0d50ff8c70ea56cc9644c9975244f853cd56d7cf791', 'aa@hotmail.com', '0', 'สายฟ้า', 30),
(32, '3333333333333', '53802b4fe8cf7884c9b5656e70a8ac66119d0b852a72e6af3cae05ca67b2a8d1', 'ampare444@hotmail.com', '0', 'กกกกกก', 31),
(33, '1319900395872', '5e7771190687ecfe4eaaabeed2c6e50cfcca895218045347af77b58fb10c2e0e', 'aa@hotmail.com', '0', 'สมชาย มีดี', 31),
(34, '9999999999999', '6c0c5d80125b01a4a15a09a848cd722723a11d9ddaebc0b4fef9e94a515c8a08', 'ss@hotmail.com', '0', 'fuck', 32),
(35, '7777777777777', '5a975e9b0e78e5600e19ef8b0a91fbd2687d25740a18d789b64f67b9e0caf730', 'ss@hotmail.com', '0', 'ดี', 33);

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE IF NOT EXISTS `title` (
  `id_title` varchar(2) NOT NULL,
  `title` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id_title`, `title`) VALUES
('1', 'เด็กชาย'),
('2', 'เด็กหญิง'),
('3', 'นาย'),
('4', 'นางสาว'),
('5', 'นาง');

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE IF NOT EXISTS `user_history` (
  `id_history` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `timein` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `timeout` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `action` enum('0','1') NOT NULL DEFAULT '0',
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_history`
--

INSERT INTO `user_history` (`id_history`, `session`, `timein`, `timeout`, `user_id`, `action`, `ip`) VALUES
(1, '7haio85mubr166mv8b92u9k6p2', '2017-12-07 04:05:48', '0000-00-00 00:00:00', 1, '1', '10.133.0.140'),
(2, '7haio85mubr166mv8b92u9k6p2', '2017-12-07 06:14:58', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(3, '47a9ou2jnd2emaa9fs4tih8os4', '2017-12-07 06:15:33', '0000-00-00 00:00:00', 6, '1', '172.20.10.3'),
(4, '47a9ou2jnd2emaa9fs4tih8os4', '2017-12-07 07:10:31', '0000-00-00 00:00:00', 27, '1', '172.20.10.3'),
(5, '47a9ou2jnd2emaa9fs4tih8os4', '2017-12-07 07:19:27', '0000-00-00 00:00:00', 2, '1', '192.168.173.1'),
(6, '47a9ou2jnd2emaa9fs4tih8os4', '2017-12-07 08:22:21', '0000-00-00 00:00:00', 8, '1', '192.168.173.1'),
(7, '993fa04t38r431dqq9ghol2766', '2017-12-07 13:13:35', '0000-00-00 00:00:00', 1, '1', '127.0.0.1'),
(8, '993fa04t38r431dqq9ghol2766', '2017-12-07 15:16:00', '0000-00-00 00:00:00', 1, '1', '127.0.0.1'),
(9, '993fa04t38r431dqq9ghol2766', '2017-12-08 03:05:58', '0000-00-00 00:00:00', 2, '1', '10.133.0.140'),
(10, '776gh3beu3e4hg80iro7k28so4', '2017-12-08 03:06:38', '0000-00-00 00:00:00', 1, '1', '10.133.0.140'),
(11, '993fa04t38r431dqq9ghol2766', '2017-12-08 04:38:18', '0000-00-00 00:00:00', 1, '1', '10.133.0.140'),
(12, '776gh3beu3e4hg80iro7k28so4', '2017-12-08 07:55:59', '0000-00-00 00:00:00', 1, '1', '10.133.0.140'),
(13, 'm9ibi729vafsapcspeptsudbf0', '2017-12-08 07:56:23', '0000-00-00 00:00:00', 29, '1', '10.133.0.140'),
(14, 'm9ibi729vafsapcspeptsudbf0', '2017-12-08 07:57:01', '0000-00-00 00:00:00', 1, '1', '10.133.0.140'),
(15, '776gh3beu3e4hg80iro7k28so4', '2017-12-08 07:59:24', '0000-00-00 00:00:00', 2, '1', '10.133.0.140'),
(16, 'm9ibi729vafsapcspeptsudbf0', '2017-12-08 08:05:34', '0000-00-00 00:00:00', 1, '1', '10.133.0.140'),
(17, 'nvmf2cmf89sgop11oahjs9bg53', '2017-12-10 09:53:55', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(18, 'nvmf2cmf89sgop11oahjs9bg53', '2017-12-10 11:41:15', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(19, 'nvmf2cmf89sgop11oahjs9bg53', '2017-12-10 12:35:30', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(20, 'nvmf2cmf89sgop11oahjs9bg53', '2017-12-10 12:35:55', '0000-00-00 00:00:00', 2, '1', '172.20.10.3'),
(21, 'nvmf2cmf89sgop11oahjs9bg53', '2017-12-10 12:36:34', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(22, 'nvmf2cmf89sgop11oahjs9bg53', '2017-12-10 12:37:55', '0000-00-00 00:00:00', 15, '1', '172.20.10.3'),
(23, 'b7q75v3g7fio7vsrslaeb2dgm4', '2017-12-11 04:45:19', '0000-00-00 00:00:00', 1, '1', '127.0.0.1'),
(24, 'etssp7mroaiss2ln7qir2kehf1', '2017-12-11 05:07:29', '0000-00-00 00:00:00', 31, '1', '10.133.0.115'),
(25, 'b7q75v3g7fio7vsrslaeb2dgm4', '2017-12-11 05:10:11', '0000-00-00 00:00:00', 1, '1', '10.133.0.115'),
(26, 'b7q75v3g7fio7vsrslaeb2dgm4', '2017-12-11 05:46:09', '0000-00-00 00:00:00', 27, '1', '10.133.0.115'),
(27, 'etssp7mroaiss2ln7qir2kehf1', '2017-12-11 05:52:34', '0000-00-00 00:00:00', 2, '1', '10.133.0.115'),
(28, 'b7q75v3g7fio7vsrslaeb2dgm4', '2017-12-11 05:53:01', '0000-00-00 00:00:00', 1, '1', '10.133.0.115'),
(29, '55pst66f0o4559f5l6n0u42ss5', '2017-12-11 06:36:50', '0000-00-00 00:00:00', 1, '1', '10.133.0.115'),
(30, 'etssp7mroaiss2ln7qir2kehf1', '2017-12-11 07:18:57', '0000-00-00 00:00:00', 27, '1', '10.133.0.115'),
(31, 'etssp7mroaiss2ln7qir2kehf1', '2017-12-11 07:42:09', '0000-00-00 00:00:00', 16, '1', '10.133.0.115'),
(32, 'qniptfup40pkmhd83ek40vg942', '2017-12-12 04:17:46', '0000-00-00 00:00:00', 1, '1', '10.30.164.151'),
(33, 'qniptfup40pkmhd83ek40vg942', '2017-12-12 04:23:38', '0000-00-00 00:00:00', 27, '1', '10.30.164.151'),
(34, 'qniptfup40pkmhd83ek40vg942', '2017-12-12 04:26:00', '0000-00-00 00:00:00', 27, '1', '10.30.164.151'),
(35, 'qniptfup40pkmhd83ek40vg942', '2017-12-12 04:27:59', '0000-00-00 00:00:00', 1, '1', '10.30.164.151'),
(36, 'qniptfup40pkmhd83ek40vg942', '2017-12-12 04:53:08', '0000-00-00 00:00:00', 1, '1', '10.30.164.151'),
(37, 'b2qcgosu1060fm8pvihdj8sgm0', '2017-12-13 09:21:45', '0000-00-00 00:00:00', 1, '1', '10.133.0.129'),
(38, 'v7lf9i1em5p46tatvndumsr3p0', '2017-12-13 09:22:26', '0000-00-00 00:00:00', 33, '1', '10.133.0.129'),
(39, 'v7lf9i1em5p46tatvndumsr3p0', '2017-12-13 09:28:38', '0000-00-00 00:00:00', 1, '1', '10.133.0.129'),
(40, 'b2qcgosu1060fm8pvihdj8sgm0', '2017-12-13 09:32:46', '0000-00-00 00:00:00', 33, '1', '10.133.0.129'),
(41, 'b2qcgosu1060fm8pvihdj8sgm0', '2017-12-13 09:33:43', '0000-00-00 00:00:00', 33, '1', '10.133.0.129'),
(42, 'b2qcgosu1060fm8pvihdj8sgm0', '2017-12-13 09:59:39', '0000-00-00 00:00:00', 10, '1', '10.133.0.129'),
(43, 'b2qcgosu1060fm8pvihdj8sgm0', '2017-12-13 10:08:21', '0000-00-00 00:00:00', 33, '1', '10.133.0.129'),
(44, 'asapbdf18n4fg1c2aqn33mp687', '2017-12-14 04:00:55', '0000-00-00 00:00:00', 1, '1', '10.133.0.129'),
(45, 'asapbdf18n4fg1c2aqn33mp687', '2017-12-14 07:14:16', '0000-00-00 00:00:00', 1, '1', '10.133.0.129'),
(46, 'i3h76d5pj7kiesl39vkq9677v0', '2017-12-15 13:08:09', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(47, 'i3h76d5pj7kiesl39vkq9677v0', '2017-12-15 13:17:56', '0000-00-00 00:00:00', 33, '1', '172.20.10.3'),
(48, 'i3h76d5pj7kiesl39vkq9677v0', '2017-12-15 13:25:24', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(49, 'i3h76d5pj7kiesl39vkq9677v0', '2017-12-15 13:54:17', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(50, 'i3h76d5pj7kiesl39vkq9677v0', '2017-12-15 13:55:56', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(51, 'i3h76d5pj7kiesl39vkq9677v0', '2017-12-15 13:56:31', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(52, 'i3h76d5pj7kiesl39vkq9677v0', '2017-12-15 13:58:27', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(53, 'i3h76d5pj7kiesl39vkq9677v0', '2017-12-15 14:02:26', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(54, 'i3h76d5pj7kiesl39vkq9677v0', '2017-12-15 14:14:43', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(55, 'i3h76d5pj7kiesl39vkq9677v0', '2017-12-15 16:32:23', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(56, 's9m2r4ps66aha315b8anj9l2u5', '2017-12-17 03:59:59', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(57, 's9m2r4ps66aha315b8anj9l2u5', '2017-12-17 05:04:49', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(58, 's9m2r4ps66aha315b8anj9l2u5', '2017-12-17 05:08:33', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(59, 's9m2r4ps66aha315b8anj9l2u5', '2017-12-17 05:10:23', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(60, '6ar7frol75j8vkc1kh1t1u2ca6', '2017-12-17 05:11:11', '0000-00-00 00:00:00', 2, '1', '172.20.10.3'),
(61, '6ar7frol75j8vkc1kh1t1u2ca6', '2017-12-17 05:11:47', '0000-00-00 00:00:00', 2, '1', '172.20.10.3'),
(62, '6ar7frol75j8vkc1kh1t1u2ca6', '2017-12-17 05:19:13', '0000-00-00 00:00:00', 2, '1', '172.20.10.3'),
(63, '836099f2273893987d6c290d736539e0', '2017-12-17 07:37:06', '0000-00-00 00:00:00', 1, '1', '192.168.137.1'),
(64, '31f4f66fe634d1773ca87c476b79a517', '2017-12-17 08:15:54', '0000-00-00 00:00:00', 8, '1', '192.168.137.1'),
(65, '31f4f66fe634d1773ca87c476b79a517', '2017-12-17 08:20:51', '0000-00-00 00:00:00', 10, '1', '192.168.104.107'),
(66, '31f4f66fe634d1773ca87c476b79a517', '2017-12-17 08:21:37', '0000-00-00 00:00:00', 2, '1', '192.168.104.107'),
(67, '31f4f66fe634d1773ca87c476b79a517', '2017-12-17 08:24:43', '0000-00-00 00:00:00', 8, '1', '192.168.104.107'),
(68, '31f4f66fe634d1773ca87c476b79a517', '2017-12-17 08:29:44', '0000-00-00 00:00:00', 8, '1', '192.168.104.107'),
(69, '31f4f66fe634d1773ca87c476b79a517', '2017-12-17 08:31:37', '0000-00-00 00:00:00', 2, '1', '192.168.104.107'),
(70, '31f4f66fe634d1773ca87c476b79a517', '2017-12-17 08:32:28', '0000-00-00 00:00:00', 5, '1', '192.168.104.107');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`id_committee`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`fak_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- Indexes for table `fund`
--
ALTER TABLE `fund`
  ADD PRIMARY KEY (`id_fund`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id_gender`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id_position`);

--
-- Indexes for table `promise`
--
ALTER TABLE `promise`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `repayment`
--
ALTER TABLE `repayment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `statusb_app`
--
ALTER TABLE `statusb_app`
  ADD PRIMARY KEY (`id_sapp`);

--
-- Indexes for table `stop_member`
--
ALTER TABLE `stop_member`
  ADD PRIMARY KEY (`stopmem_id`);

--
-- Indexes for table `submitted`
--
ALTER TABLE `submitted`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id_title`);

--
-- Indexes for table `user_history`
--
ALTER TABLE `user_history`
  ADD PRIMARY KEY (`id_history`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `id_committee` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `fak_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `promise`
--
ALTER TABLE `promise`
  MODIFY `pro_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการทำสัญญา',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `repayment`
--
ALTER TABLE `repayment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stop_member`
--
ALTER TABLE `stop_member`
  MODIFY `stopmem_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `submitted`
--
ALTER TABLE `submitted`
  MODIFY `sub_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสยื่นกู้',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`mem_id`) REFERENCES `member` (`mem_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
