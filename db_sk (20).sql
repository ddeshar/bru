-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2017 at 04:03 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sk`
--

-- --------------------------------------------------------

--
-- Table structure for table `commits`
--

CREATE TABLE `commits` (
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

CREATE TABLE `committee` (
  `id_committee` int(11) NOT NULL,
  `com_idcard` varchar(13) NOT NULL COMMENT 'เลขประจำตัวประชาชน',
  `id_title` varchar(10) DEFAULT NULL,
  `com_name` varchar(100) NOT NULL COMMENT 'ชื่อ - สกุล',
  `id_position` varchar(50) NOT NULL COMMENT 'ตำแหน่ง',
  `com_birthday` date DEFAULT NULL,
  `com_address` varchar(100) NOT NULL COMMENT 'ที่อยู่',
  `com_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `com_username` varchar(13) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `com_password` varchar(8) NOT NULL COMMENT 'รหัสผ่าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`id_committee`, `com_idcard`, `id_title`, `com_name`, `id_position`, `com_birthday`, `com_address`, `com_tel`, `com_username`, `com_password`) VALUES
(1, '3310100429744', '3', 'ถนอม  ชัยพรรณ', '1', '2508-02-22', '73', '0895818782', '1319900339876', '23021978'),
(2, '1319900499678', '3', 'พงษ์สวัสดิ์ กรุมรัมย์', '2', '1990-02-07', '26', '0894457687', '1319900499678', '07021990'),
(3, '1319900374652', '5', 'ลีลาวดี  ควินรัมย์', '3', '1971-06-09', '36', '0624425353', '1319900374652', '09061971'),
(4, '1319900234765', '5', 'สมจิตร แรงทอง', '7', '2512-11-11', '225', '0877744657', '1319900234765', '11112512'),
(5, '4310100003486', '4', 'ศิริกาญ มกชาติ', '7', '2526-10-01', '275', '0986543278', '4310100003486', '01102526'),
(6, '3310100429817', '3', 'นายประเสริฐ เมืองรัมย์', '4', '2503-05-13', '3', '0623546217', '3310100429817', '13052503'),
(7, '1234567890765', '5', 'สมใจ ชัยพรรณ', '4', '2512-05-19', '55', '0874569870', '1234567890765', '19052512');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `fak_id` int(11) NOT NULL,
  `fak_date` timestamp NULL DEFAULT NULL,
  `mem_id` int(3) DEFAULT NULL,
  `name_commit` varchar(20) NOT NULL COMMENT 'ชื่อผู้รับฝาก',
  `id_commit` int(5) NOT NULL,
  `fak_sum` int(15) NOT NULL COMMENT 'จำนวนเงินฝาก',
  `withdraw` int(15) DEFAULT NULL,
  `fak_total` int(15) NOT NULL COMMENT 'รวมเงินฝาก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`fak_id`, `fak_date`, `mem_id`, `name_commit`, `id_commit`, `fak_sum`, `withdraw`, `fak_total`) VALUES
(1, '2017-11-24 07:14:43', 6, '', 1, 1000, NULL, 1000),
(2, '2017-11-24 07:15:06', 6, '', 1, 1000, NULL, 2000),
(3, '2017-11-24 07:18:35', 2, '', 1, 2000, NULL, 2000),
(4, '2017-11-24 07:24:59', 9, '', 1, 3500, NULL, 3500),
(5, '2017-11-24 07:31:25', 10, '', 1, 2500, NULL, 2500),
(6, '2017-11-24 08:05:57', 4, '', 1, 2800, NULL, 2800),
(7, '2017-11-27 04:26:13', 21, '', 1, 100, NULL, 100),
(12, '2017-11-27 08:35:23', 21, '', 1, 2000, NULL, 2100),
(13, '2017-11-28 07:08:42', 3, '', 1, 3000, NULL, 3000),
(14, '2017-11-30 12:18:46', 23, '', 0, 2000, NULL, 2000),
(15, '2017-11-30 12:38:34', 23, '', 1, 100, NULL, 2100);

-- --------------------------------------------------------

--
-- Table structure for table `fund`
--

CREATE TABLE `fund` (
  `id_fund` varchar(10) NOT NULL COMMENT 'รหัสกองทุนหมู่บ้าน',
  `fund_name` varchar(100) NOT NULL COMMENT 'ชื่อกองทุน',
  `fund_detail` text NOT NULL COMMENT 'รายละเอียดกองทุน',
  `fund_money` varchar(11) NOT NULL COMMENT 'จำนวนเงินเริ่มต้น'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fund`
--

INSERT INTO `fund` (`id_fund`, `fund_name`, `fund_detail`, `fund_money`) VALUES
('1', 'ประชารัฐ', 'ส่งเสริมให้ประชาชนพัฒนาหมู่บ้านให้เข้มแข็ง', '500000'),
('2', 'เงินล้าน', 'เพื่อให้ประชาชนในหมู่บ้านมีอาชีพ', '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
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

CREATE TABLE `member` (
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
  `mem_username` varchar(13) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `mem_password` varchar(255) NOT NULL COMMENT 'รหัสผ่าน',
  `status_mem` enum('publish','unpublish') NOT NULL DEFAULT 'unpublish',
  `mem_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_idcard`, `id_gender`, `id_title`, `mem_name`, `mem_birthday`, `id_status`, `mem_occupation`, `mem_address`, `mem_tel`, `mem_email`, `mem_username`, `mem_password`, `status_mem`, `mem_created_date`) VALUES
(1, 'admin', '2', '4', 'แนน แอดมิน', '2537-09-10', '1', 'แอดมินระบบ', '73', '0922262993', 'ampare444@hotmail.com', 'admin', 'e342d72a6abe84354e164344aa7109742e91aacc79739b8c7d1da412d5f9400e', 'publish', '2017-11-24 08:49:02'),
(2, '1319900395871', '2', '4', 'นรีเมธ ชัยพรรณ', '2537-09-10', '1', 'นักศึกษา', '73', '0922262993', 'nareemet@hotmail.com', '1319900395871', 'e342d72a6abe84354e164344aa7109742e91aacc79739b8c7d1da412d5f9400e', 'publish', '2017-11-24 08:48:00'),
(3, '1319900229431', '1', '3', 'นวพล ชัยพรรณ', '2533-11-24', '1', 'ช่างกลเรือ', '73', '0870489040', 'nawapon@hotmail.com', '1319900229431', '1d5d987a95101db0c5c53da527d9359123d912a72db01679d36a5469b01dfd24', 'publish', '2017-11-24 08:47:50'),
(4, '3310101707268', '2', '5', 'ไสว ชัยพรรณ', '2512-10-06', '2', 'รับจ้าง', '73', '0870489040', 'sawai@hotmail.com', '3310101707268', 'ff75d050b435ee9dce18aaf9b4b87b1c3bea6f2c4b3164950f751c5811be6384', 'publish', '2017-11-24 08:48:53'),
(5, '3310100429744', '1', '3', 'ถนอม ชัยพรรณ', '2508-02-22', '2', 'ผู้ใหญ่บ้าน', '73', '0895818782', 'tanom@hotmail.com', '3310100429744', '6ef3216ead35d42f9a06c83733991f0a45acdd4e290b5072e362953e90bdc8f1', 'publish', '2017-11-24 08:48:25'),
(6, '1319901104121', '1', '1', 'ณัฐวัฒน์ คะรุรัมย์', '2551-01-02', '1', 'นักเรียน', '32', '044601529', 'nat@hotmail.com', '1319901104121', '124b6813d30524e1fd3269ac059c21b1c75fcc285e10db99dfbb5b0defff19ad', 'publish', '2017-11-24 08:48:06'),
(7, '1319900301451', '2', '4', 'ปรารถนา คะรุรัมย์', '2535-08-20', '1', 'รับจ้างทั่วไป', '32', '0622247678', 'tan@hotmail.com', '1319900301451', '0093331b8e1afb3db0529abd5e75e1564e20bbaec5943ce8337b5fd100017279', 'publish', '2017-11-24 08:47:55'),
(8, '1209700570483', '2', '4', 'ภัทรวดี ทองช่วย', '2537-11-01', '1', 'นักศึกษา', '67', '0821365617', 'pattarawadee@hotmail.com', '1209700570483', '784ff465f02295001a0b38f1e87ed709791e7211c40208a246548fced8b79124', 'publish', '2017-11-24 08:47:24'),
(9, '1212121212121', '1', '3', 'มนัสชนก มารศรี', '2537-10-23', '1', 'นักศึกษา', '33', '0638377478', 'manus@hotmail.com', '1212121212121', '9917ac9ac6ca2da11983f9ddf94683238103e531e69b4706c32bcf004e9211fd', 'publish', '2017-11-24 08:47:30'),
(10, '1313131313131', '1', '3', 'อิสรา นัยเนตร', '2536-10-10', '1', 'โปรแกรมเมอร์', '44', '0879474857', 'isara@hotmai.com', '1313131313131', '7589281723249ea0236ca407fe178829be857448d41a17fb73bea7623fa13f86', 'publish', '2017-11-24 08:47:34'),
(11, '3310100429990', '2', '5', 'วรรณี คะรุรัมย์', '2511-11-21', '2', 'รับราชการ', '32', '0837363354', 'wannee@hotmail.com', '3310100429990', '1b6d1d4feb4bb5f7a0dda90d737d944c62995ad641fc177a10d34d7b54fc0a16', 'publish', '2017-11-24 08:48:38'),
(12, '3310100429116', '2', '4', 'ลีลาวดี ควินรัมย์', '2493-01-01', '3', 'รับจ้างทั่วไป', '36', '0879474857', 'rerawadee@hotmail.com', '3310100429116', '069aedfdf0156a388cc66b7922588c3085a2dc70adb3fcfe9ae483d08d6d258b', 'publish', '2017-11-24 08:48:18'),
(13, '3310100429337', '2', '5', 'ทองม้วน กรุมรัมย์', '2507-10-25', '2', 'รับจ้าง', '21', '0881234561', 'thongmuon@hotmail.com', '3310100429337', '2acf40f30d35eb42ceb0ffc5d0a0e11d446d3c4d0705a10d2aa615764127b5e1', 'publish', '2017-11-24 08:48:21'),
(14, '3310101380340', '1', '3', 'พงษ์สวัสดิ์ กรุมรัมย์', '2508-05-10', '2', 'ผู้ช่วยผู้ใหญ่บ้าน', '21', '0991324567', 'wat@hotmail.com', '3310101380340', 'b652623aaefed7545d0eda696ee5df389fc0a91a40fdcb043250925d41ae849f', 'publish', '2017-11-24 08:48:50'),
(15, '1319900876654', '2', '4', 'ปัทมาวรรณ หงษ์ษารัมย์', '2539-08-26', '1', 'นักศึกษา', '4', '0921234876', 'pattamawan@hotmail.com', '1319900876654', 'd69f7c8a49fb404ab4dd26f7d3c8b4794c881b156ce050e1e1fec04bb0d47630', 'publish', '2017-11-24 08:48:03'),
(16, '1414141414141', '2', '4', 'อภิสรา เทียนทอง', '2538-04-24', '1', 'นักศึกษา', '43', '0644414424', 'apisara@hotmail.com', '1414141414141', '7678e09f7dba6c63a62264afc6a19c11c1055150835b17b99d5a91da4e062966', 'publish', '2017-11-24 08:48:09'),
(17, '1319900174114', '2', '4', 'สุภานัน มกชาติ', '2532-04-28', '2', 'รับจ้าง', '5', '0622247678', 'supanun@hotmail.com', '1319900174114', 'ef92bb6d6a0dc8295c4fe6fdd5e39dd267bf92fea200b6bb5a036a6ef64508f6', 'publish', '2017-11-24 08:47:45'),
(18, '3310101220890', '1', '3', 'ชำนาญ จิตรรัมย์', '2504-02-13', '2', 'รับจ้าง', '6', '0981231123', 'chamnan@hotmail.com', '3310101220890', 'f3bc4ec3fc72417738a6b15a931eb54206df32d00ac80599f3f217b0fcb11ad9', 'publish', '2017-11-24 08:48:47'),
(19, '1319900016161', '1', '3', 'บัญชา จิตรรัมย์', '2527-07-01', '1', 'รับจ้าง', '6', '0999999999', 'pancha@hotmail.com', '1319900016161', 'b14e1bad2a0b5a01de6c943fe5a2b0da7add018c3bd5b76408ad9d08ce8bf606', 'publish', '2017-11-24 08:47:37'),
(20, '1319900092100', '1', '3', 'สิงหา จิตรรัมย์', '2529-12-21', '1', 'ช่างซ่อมรถ', '6', '0888888888', 'singha@hotmail.com', '1319900092100', '6e7219e1c4fe6206ca8c521c7f01a87abcc1cd36bee63be40f9ede7bb02b88a3', 'publish', '2017-11-24 08:47:40'),
(21, '4310100003486', '2', '4', 'ศิริกาญ มกชาติ', '2526-10-01', '2', 'รับจ้าง', '5', '087777777', 'sirikan@hotmail.com', '4310100003486', '02f6a801629222425e8e28becf4973612e8b03ba17cf51934686699631f72b54', 'publish', '2017-11-24 08:48:58'),
(22, '3310100246038', '2', '5', 'ตุ้มทอง  เมืองรัมย์', '2478-01-01', '2', 'ว่างงาน', '3', '0811111111', 'thong@hotmail.com', '3310100246038', '6f00a71b380a49af101684a7a6b1e5de77cd395fa51789e89fd1b5813bc53db0', 'publish', '2017-11-24 08:48:15'),
(23, '3310100429817', '1', '3', 'ประเสริฐ เมืองรัมย์', '2503-01-13', '2', 'เกษตรกร', '3', '0833232456', 'prasert@hotmail.com', '3310100429817', '6b725d68a22e678ae316041ec2b99ec3bab637e5c4437139222cd77ec097e3c3', 'publish', '2017-11-24 08:48:30'),
(24, '3310100429884', '2', '4', 'ศรันยา เมืองรัมย์', '2524-03-02', '2', 'รับจ้าง', '3', '0877767654', 'saranya@hotmai.com', '3310100429884', '8a8ef663857d730b73506a3b30b56936d2f74437f507f17f715c1bf1e7d92d70', 'publish', '2017-11-24 08:48:44'),
(25, '3210100429761', '1', '3', 'พายัพ ชัยพรรณ', '2494-01-01', '3', 'ว่างงาน', '1', '0877678765', 'payap@hotmail.com', '3210100429761', '10195cc83ed27e0961e40fe4712d80ba53b265816afeebdd7c3bffc77f780540', 'publish', '2017-11-24 08:48:12'),
(26, 'manager', '1', '3', 'ผมเป็นผู้บริหารคับ', '1010-10-10', '1', 'ผู้บริหาร', '114', '0922262993', 'manager@hotmail.com', 'manager', 'd08f29da2bfaf4e625fd9692e6ee7c7d2c6635bb8ae424b8f54906cc6160d88e', 'publish', '2017-11-27 07:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
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

CREATE TABLE `promise` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promise`
--

INSERT INTO `promise` (`pro_id`, `mem_id`, `mem_name`, `mem_idcard`, `sub_id`, `app_pice`, `sub_date`, `pro_date`, `sub_moneyloan`, `name1`, `name2`, `pro_redate`, `pro_Document`, `id_commit`, `id_sapp`) VALUES
(1, '2', 'นรีเมธ ชัยพรรณ', 2147483647, '', 10000, '2017-11-24', '2017-11-24', 10000, '4', '5', '2019-11-24', '', '1', 0),
(2, '4', 'ไสว ชัยพรรณ', 2147483647, '', 5000, '2017-11-24', '2017-11-24', 5000, '12', '5', '2019-11-24', '', '1', 0),
(3, '6', 'ณัฐวัฒน์ คะรุรัมย์', 2147483647, '', 5000, '2017-11-24', '2017-11-24', 5000, '11', '7', '2019-11-23', '', '1', 0),
(4, '9', 'มนัสชนก มารศรี', 2147483647, '', 500, '2017-11-24', '2017-11-24', 10000, '2', '8', '2019-11-24', '', '1', 0),
(5, '9', 'มนัสชนก มารศรี', 2147483647, '', 500, '2017-11-24', '2017-11-24', 10000, '2', '8', '2019-11-24', '', '1', 0),
(6, '10', 'อิสรา นัยเนตร', 2147483647, '', 10000, '2017-11-27', '2017-11-27', 10000, '2', '16', '2019-11-24', '', '1', 0),
(7, '21', 'ศิริกาญ มกชาติ', 2147483647, '', 10000, '2017-11-27', '2017-11-27', 10000, '4', '5', '2019-11-27', '', '1', 0),
(8, '9', 'มนัสชนก มารศรี', 2147483647, '', 5000, '2017-11-27', '2017-11-27', 5000, '2', '10', '2019-11-27', '', '1', 0),
(9, '3', 'นวพล ชัยพรรณ', 2147483647, '', 20000, '2017-11-30', '2017-11-30', 20000, '2', '4', '2019-11-28', '1512046416.pdf', '1', 0),
(10, '23', 'ประเสริฐ เมืองรัมย์', 2147483647, '', 10000, '2017-11-30', '2017-11-30', 10000, '5', '4', '2019-11-30', '1512046576.pdf', '1', 0),
(11, '4', 'ไสว ชัยพรรณ', 2147483647, '', 10000, '2017-11-30', '2017-11-30', 10000, '2', '3', '2019-11-30', '1512046683.jpg', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `repayment`
--

CREATE TABLE `repayment` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repayment`
--

INSERT INTO `repayment` (`pay_id`, `mem_id`, `mem_name`, `mem_idcard`, `pro_id`, `sub_moneyloan`, `pro_redate`, `pay_date`, `pay_pice`, `id_commit`, `status_pay`) VALUES
(1, '2', 'นรีเมธ ชัยพรรณ', 2147483647, '1', 10000, '2019-11-24', '2017-11-24', 10000, 1, '2'),
(2, '4', 'ไสว ชัยพรรณ', 2147483647, '2', 5000, '2019-11-24', '2017-11-24', 5000, 0, '2'),
(3, '6', 'ณัฐวัฒน์ คะรุรัมย์', 2147483647, '3', 5000, '2019-11-23', '2017-11-27', 5000, 1, '1'),
(4, '10', 'อิสรา นัยเนตร', 2147483647, '6', 10000, '2019-11-24', '2017-11-27', 10000, 1, '1'),
(5, '21', 'ศิริกาญ มกชาติ', 2147483647, '7', 10000, '2019-11-27', '2017-11-27', 10000, 1, '2'),
(6, '9', 'มนัสชนก มารศรี', 2147483647, '8', 5000, '2019-11-27', '2017-11-27', 5000, 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
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

CREATE TABLE `statusb_app` (
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

CREATE TABLE `stop_member` (
  `stopmem_id` int(4) NOT NULL,
  `mem_id` int(15) DEFAULT NULL,
  `mem_name` varchar(100) DEFAULT NULL,
  `fak_total` int(15) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT '1',
  `stop_date` date NOT NULL,
  `id_commit` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stop_member`
--

INSERT INTO `stop_member` (`stopmem_id`, `mem_id`, `mem_name`, `fak_total`, `status`, `stop_date`, `id_commit`) VALUES
(2, 23, 'ประเสริฐ เมืองรัมย์', 2100, '999', '2017-11-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `submitted`
--

CREATE TABLE `submitted` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submitted`
--

INSERT INTO `submitted` (`sub_id`, `mem_id`, `mem_name`, `sub_moneyloan`, `sub_objective`, `sub_date`, `name1`, `name2`, `id_commit`, `id_sapp`, `sanya`) VALUES
(1, '6', 'ณัฐวัฒน์ คะรุรัมย์', 5000, 'เพื่อการศึกษา', '2017-11-23', '11', '7', '1', 1, 4),
(2, '2', 'นรีเมธ ชัยพรรณ', 10000, 'เพื่อการศึกษา', '2017-11-24', '4', '5', '1', 1, 4),
(4, '10', 'อิสรา นัยเนตร', 10000, 'เพื่อพัฒนาอาชีพ', '2017-11-24', '2', '16', '1', 1, 4),
(5, '4', 'ไสว ชัยพรรณ', 5000, 'ทำนา', '2017-11-24', '12', '5', '1', 1, 4),
(6, '21', 'ศิริกาญ มกชาติ', 10000, 'พัฒนาอาชีพ', '2017-11-27', '4', '5', '1', 1, 4),
(7, '9', 'มนัสชนก มารศรี', 5000, 'เพื่อการศึกษา', '2017-11-27', '2', '10', '1', 1, 4),
(8, '9', 'มนัสชนก มารศรี', 5000, 'ซื้อหวย', '2017-11-26', '2', '8', '1', 2, 2),
(9, '3', 'นวพล ชัยพรรณ', 20000, 'พัฒนาอาชีพ', '2017-11-28', '2', '4', '1', 1, 3),
(10, '23', 'ประเสริฐ เมืองรัมย์', 10000, 'dddd', '2017-11-30', '5', '12', '1', 1, 3),
(11, '4', 'ไสว ชัยพรรณ', 10000, 'ffff', '2017-11-30', '2', '3', '1', 1, 3),
(12, '10', 'อิสรา นัยเนตร', 5000, 'ddd', '2017-11-30', '2', '6', '1', 1, 1),
(13, '10', 'อิสรา นัยเนตร', 20000, 'ddddd', '2017-11-30', '2', '4', '1', 0, 0),
(14, '3', 'นวพล ชัยพรรณ', 20000, 'dddd', '2017-11-30', '5', '4', '1', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(13) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(60) NOT NULL,
  `status` enum('0','100','500','999') NOT NULL DEFAULT '999',
  `name` varchar(255) NOT NULL,
  `mem_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `email`, `status`, `name`, `mem_id`) VALUES
(1, 'admin', 'e342d72a6abe84354e164344aa7109742e91aacc79739b8c7d1da412d5f9400e', 'ampare444@hotmail.com', '500', 'แนน แอดมิน', 1),
(2, '1319900395871', 'e342d72a6abe84354e164344aa7109742e91aacc79739b8c7d1da412d5f9400e', 'nareemet@hotmail.com', '999', 'นรีเมธ ชัยพรรณ', 2),
(3, '1319900229431', '1d5d987a95101db0c5c53da527d9359123d912a72db01679d36a5469b01dfd24', 'nawapon@hotmail.com', '0', 'นวพล ชัยพรรณ', 3),
(4, '3310101707268', 'ff75d050b435ee9dce18aaf9b4b87b1c3bea6f2c4b3164950f751c5811be6384', 'sawai@hotmail.com', '0', 'ไสว ชัยพรรณ', 4),
(5, '3310100429744', '6ef3216ead35d42f9a06c83733991f0a45acdd4e290b5072e362953e90bdc8f1', 'tanom@hotmail.com', '0', 'ถนอม ชัยพรรณ', 5),
(6, '1319901104121', '124b6813d30524e1fd3269ac059c21b1c75fcc285e10db99dfbb5b0defff19ad', 'nat@hotmail.com', '0', 'ณัฐวัฒน์ คะรุรัมย์', 6),
(7, '1319900301451', '0093331b8e1afb3db0529abd5e75e1564e20bbaec5943ce8337b5fd100017279', 'tan@hotmail.com', '0', 'ปรารถนา คะรุรัมย์', 7),
(8, '1209700570483', '784ff465f02295001a0b38f1e87ed709791e7211c40208a246548fced8b79124', 'pattarawadee@hotmail.com', '0', 'ภัทรวดี ทองช่วย', 8),
(9, '1212121212121', '9917ac9ac6ca2da11983f9ddf94683238103e531e69b4706c32bcf004e9211fd', 'manus@hotmail.com', '0', 'มนัสชนก มารศรี', 9),
(10, '1313131313131', '7589281723249ea0236ca407fe178829be857448d41a17fb73bea7623fa13f86', 'isara@hotmai.com', '0', 'อิสรา นัยเนตร', 10),
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
(23, '3310100429817', '6b725d68a22e678ae316041ec2b99ec3bab637e5c4437139222cd77ec097e3c3', 'prasert@hotmail.com', '999', 'ประเสริฐ เมืองรัมย์', 23),
(24, '3310100429884', '8a8ef663857d730b73506a3b30b56936d2f74437f507f17f715c1bf1e7d92d70', 'saranya@hotmai.com', '0', 'ศรันยา เมืองรัมย์', 24),
(25, '3210100429761', '10195cc83ed27e0961e40fe4712d80ba53b265816afeebdd7c3bffc77f780540', 'payap@hotmail.com', '0', 'พายัพ ชัยพรรณ', 25),
(27, 'manager', 'd08f29da2bfaf4e625fd9692e6ee7c7d2c6635bb8ae424b8f54906cc6160d88e', 'manager@hotmail.com', '100', 'ผมเป็นผู้บริหารคับ', 26);

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
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

CREATE TABLE `user_history` (
  `id_history` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `timein` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `timeout` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `action` enum('0','1') NOT NULL DEFAULT '0',
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_history`
--

INSERT INTO `user_history` (`id_history`, `session`, `timein`, `timeout`, `user_id`, `action`, `ip`) VALUES
(1, 'uehk91md17a9d7su738sdsv8u0', '2017-11-24 05:21:38', '0000-00-00 00:00:00', 1, '1', '10.133.0.113'),
(2, 'uehk91md17a9d7su738sdsv8u0', '2017-11-24 08:04:05', '0000-00-00 00:00:00', 1, '1', '10.133.0.113'),
(3, 'uehk91md17a9d7su738sdsv8u0', '2017-11-24 09:26:18', '0000-00-00 00:00:00', 2, '1', '10.133.0.113'),
(4, 'uehk91md17a9d7su738sdsv8u0', '2017-11-24 09:27:37', '0000-00-00 00:00:00', 1, '1', '10.133.0.113'),
(5, 'na37ncmggid1iine7lvanaeal1', '2017-11-24 12:18:47', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(6, 'na37ncmggid1iine7lvanaeal1', '2017-11-25 03:02:17', '0000-00-00 00:00:00', 1, '1', '192.168.1.111'),
(7, 'jiaha8p4q2vj98v92o3qaq7lv0', '2017-11-27 04:25:23', '0000-00-00 00:00:00', 1, '1', '10.30.164.166'),
(8, 'jiaha8p4q2vj98v92o3qaq7lv0', '2017-11-27 05:50:24', '0000-00-00 00:00:00', 1, '1', '10.30.164.166'),
(9, 'jiaha8p4q2vj98v92o3qaq7lv0', '2017-11-27 06:58:20', '0000-00-00 00:00:00', 1, '1', '10.30.164.166'),
(10, 'jiaha8p4q2vj98v92o3qaq7lv0', '2017-11-27 07:12:09', '0000-00-00 00:00:00', 2, '1', '10.30.164.166'),
(11, 'jiaha8p4q2vj98v92o3qaq7lv0', '2017-11-27 07:22:40', '0000-00-00 00:00:00', 1, '1', '10.30.164.166'),
(12, 'jiaha8p4q2vj98v92o3qaq7lv0', '2017-11-27 07:26:28', '0000-00-00 00:00:00', 1, '1', '10.30.164.166'),
(13, 'jiaha8p4q2vj98v92o3qaq7lv0', '2017-11-27 07:28:12', '0000-00-00 00:00:00', 27, '1', '10.30.164.166'),
(14, 'jiaha8p4q2vj98v92o3qaq7lv0', '2017-11-27 07:32:32', '0000-00-00 00:00:00', 1, '1', '10.30.164.166'),
(15, 'jiaha8p4q2vj98v92o3qaq7lv0', '2017-11-27 08:27:58', '0000-00-00 00:00:00', 1, '1', '10.30.164.166'),
(16, 'ktc44efs2cejvhvpq71jicv770', '2017-11-27 12:04:41', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(17, 'pskea29u1qc49vhmm2rchjvb27', '2017-11-28 03:09:21', '0000-00-00 00:00:00', 1, '1', '10.133.0.145'),
(18, 'pskea29u1qc49vhmm2rchjvb27', '2017-11-28 09:13:37', '0000-00-00 00:00:00', 1, '1', '10.133.0.145'),
(19, '7vsj9aobg0vmrq32k09hn7f7j5', '2017-11-28 11:16:00', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(20, '9apqlhkgnhr57bc1tk9vt93sq0', '2017-11-28 12:26:23', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(21, 'pvkhnjos1s0s0b659092h2qok7', '2017-11-30 11:40:50', '0000-00-00 00:00:00', 1, '1', '127.0.0.1'),
(22, 'pvkhnjos1s0s0b659092h2qok7', '2017-11-30 15:01:44', '0000-00-00 00:00:00', 1, '1', '172.20.10.3');

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
  MODIFY `id_committee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `fak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `promise`
--
ALTER TABLE `promise`
  MODIFY `pro_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการทำสัญญา', AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `repayment`
--
ALTER TABLE `repayment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stop_member`
--
ALTER TABLE `stop_member`
  MODIFY `stopmem_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `submitted`
--
ALTER TABLE `submitted`
  MODIFY `sub_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสยื่นกู้', AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`mem_id`) REFERENCES `member` (`mem_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
