-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 03:42 PM
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
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `access_id` int(3) NOT NULL,
  `access_name` varchar(13) NOT NULL,
  `access_password` varchar(8) NOT NULL,
  `access_login` datetime NOT NULL,
  `access_out` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `approve`
--

CREATE TABLE `approve` (
  `app_id` varchar(4) NOT NULL COMMENT 'รหัสการอนุมัติ',
  `mem_id` varchar(4) NOT NULL COMMENT 'รหัสสมาชิก',
  `mem_name` varchar(100) NOT NULL COMMENT 'ชื่อ – สกุลสมาชิก',
  `sub_id` varchar(4) NOT NULL COMMENT 'รหัสการยื่นกู้',
  `sub_date` date NOT NULL COMMENT 'วันที่ยื่นกู้',
  `sub_moneyloan` varchar(11) NOT NULL COMMENT 'จำนวนเงินที่ยื่นกู้',
  `app_status` varchar(100) NOT NULL COMMENT 'สถานะการอนุมัติ',
  `app_number` int(11) NOT NULL COMMENT 'จำนวนเงินที่อนุมัติ',
  `app_date` date NOT NULL COMMENT 'วันที่อนุมัติ',
  `id_commit` varchar(4) NOT NULL COMMENT 'รหัสกรรมการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `com_status`
--

CREATE TABLE `com_status` (
  `com_status_id` int(11) NOT NULL,
  `com_status_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `com_status`
--

INSERT INTO `com_status` (`com_status_id`, `com_status_name`) VALUES
(1, 'ผู้ดูแลระบบ'),
(2, 'ผู้บริหาร');

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
(1, '2017-10-18 10:41:34', 11, '', 1, 100, 0, 100),
(2, '2017-10-18 10:42:28', 13, '', 1, 2000, 0, 2000),
(3, '2017-10-18 10:42:44', 12, '', 1, 15000, 0, 15000),
(5, '2017-10-18 10:56:03', 13, '', 1, 1000, 0, 3000),
(6, '2017-09-18 10:58:03', 13, '', 1, 0, 500, 2500),
(7, '2017-09-18 11:02:34', 13, '', 1, 0, 500, 2000),
(8, '2017-10-18 12:36:09', 11, '', 1, 5000, NULL, 5100),
(9, '2017-10-24 08:02:36', 12, '', 1, 0, 10000, 5000),
(10, '2017-10-24 12:34:54', 14, '', 1, 2000, NULL, 2000),
(11, '2017-10-25 07:42:54', 15, '', 1, 200, NULL, 200),
(12, '2017-11-14 06:30:06', 15, '', 1, 100, NULL, 300),
(13, '2017-11-15 03:14:47', 24, '', 1, 200, NULL, 200),
(14, '2017-11-15 05:06:44', 33, '', 0, 1000, NULL, 1000),
(15, '2017-11-15 06:21:04', 19, '', 1, 200, NULL, 200),
(16, '2017-11-16 08:28:48', 33, '', 1, 2000, NULL, 3000),
(17, '2017-11-16 09:15:46', 37, '', 1, 100, NULL, 100),
(18, '2017-11-16 09:16:11', 37, '', 1, 200, NULL, 300),
(19, '2017-11-16 09:17:00', 37, '', 0, 0, 500, -200),
(20, '2017-11-16 09:19:27', 37, '', 0, 3000, NULL, 2800),
(21, '2017-11-16 14:14:46', 37, '', 1, 100, NULL, 2900);

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
  `mem_tel` int(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `mem_email` varchar(50) NOT NULL COMMENT 'อีเมล์',
  `mem_username` varchar(13) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `mem_password` varchar(255) NOT NULL COMMENT 'รหัสผ่าน',
  `status_mem` enum('publish','unpublish') NOT NULL DEFAULT 'publish'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_idcard`, `id_gender`, `id_title`, `mem_name`, `mem_birthday`, `id_status`, `mem_occupation`, `mem_address`, `mem_tel`, `mem_email`, `mem_username`, `mem_password`, `status_mem`) VALUES
(11, '1319900395871', '2', '4', 'นรีเมธ  ชัยพรรณ', '1994-09-10', '1', 'นักศึกษา', '73', 922262993, 'ampare444@hotmail.com', '1319900395871', '10092537', 'publish'),
(12, '1319900395678', '2', '4', 'มนัสชนก มารศรี', '1994-10-24', '1', 'นักศึกษา', '4', 870489040, 'manus@hotmail.com', '1319900395678', '24102537', 'publish'),
(13, '1318899356742', '1', '3', 'อิสรา นัยเนตร', '1993-10-10', '1', 'โปรแกรมเมอร์', '55', 985818782, 'isara@hotmai.com', '1318899356742', '10102536', 'publish'),
(14, '1313131313131', '1', '3', 'ประสงค์  มีดี', '1994-01-01', '3', 'ชาวนา', '23', 870489040, 'bb@hotmail.com', '1313131313131', '01011994', 'publish'),
(15, '1318899367256', '2', '4', 'รินดา สวยสวย', '1995-09-05', '1', 'นักศึกษา', '12', 44123456, 'em@hotmail.com', '1318899367256', 'c9fec5185ac2b5960c30eeda11e2ecccd76e7ace764f92facdef49aa3872b9a4', 'publish'),
(16, '1319900394765', '1', '3', 'นวพล ชัยพรรณ', '1990-11-22', '1', 'รับจ้าง', '73', 87456553, 'nawapon@hotmail.com', '1319900394765', 'ec9cb71706af0241769c90bb44b0973172afe43c3418e339237bb45cc0b5b418', 'publish'),
(17, '1310038654111', '2', '4', 'อภิสรา เทียนทอง', '1994-04-14', '1', 'นักศึกษา', '22', 899873933, 'fon@hotmail.com', '1310038654111', 'f6ac1d63ee68f3ff4cc58581417757f0aa7d3fcbcfe7f5661bf6f7df2b67136d', 'publish'),
(18, '1111111111111', '1', '1', 'กกกกก', '2017-10-24', '1', 'กกกก', '2', 222222222, '22@hotmail.com', '1111111111111', '9cfc8e4f1cc0a92378ef7b548a9e6d59b9a41792554e559f2175684c8ace8c32', 'unpublish'),
(19, '1319900395871', '2', '4', 'นารา ชัยพรรณ', '2537-09-10', '1', 'นักศึกษา', '73', 922262993, 'ampare444@hotmail.com', '1319900395871', '5590f65429e74bc436e387a5e429407bbe797edad80bc255f9143da28bb166b9', 'publish'),
(20, '3310100429781', '1', '3', 'พายัพ ชัยพรรณ', '2494-01-01', '3', 'ทั่วไป', '1', 879865436, 'payap@hotmail.com', '3310100429781', '0bc1f9cd72e30bca04f3889dd08affb98596bfeec79925035186b4f2a486cf7f', 'publish'),
(21, '3310100246038', '1', '5', 'ตุ้มทอง  เมืองรัมย์', '2478-01-01', '2', 'ทำนา', '3', 899873933, 'tum@hotmail.com', '3310100246038', '3b3c5dd0280474d6acc5b638bb9ec214b0ff557e64f5209342ba98c491cac08f', 'publish'),
(22, '3310100429884', '2', '4', 'ศรันยา เมืองรัมย์', '2524-03-02', '1', 'รับจ้าง', '3', 622247678, 'saranya@hotmai.com', '3310100429884', '7a1d11eff911028bc0309bf0a9285b01ff311be1b0c9a026fe003c224618e0fe', 'publish'),
(23, '3310100429710', '2', '5', 'นิล ชัยพรรณ', '2481-01-01', '1', 'ว่างงาน', '4', 922262993, 'nin@hotmail.com', '3310100429710', '51b65cef6c6ab7b823bdba8190162aaea913a7bbae604d60634c09c51989c7a0', 'publish'),
(24, '1319900499889', '2', '4', 'ปัทมาวรรณ หงษ์ษารัมย์', '2539-08-26', '1', 'นักศึกษา', '4', 622247678, 'pattamawan@hotmail.com', '1319900499889', 'ab24fef9d66b6f23314c7ccbfd9f21c01146cb73864d9519a07e3fb99b0b40c5', 'publish'),
(25, '4310100003486', '2', '4', 'ศิริกาญ มกชาติ', '2526-10-01', '1', 'รับจ้าง', '275', 981231123, 'sirikan@hotmail.com', '4310100003486', 'da8c7149013f87d86ceae89c225a3aa71cc006089d867d5a534003aed28d83e2', 'publish'),
(26, '3310100429787', '2', '4', 'ศิวตาติ์ มกชาติ', '2524-02-13', '1', 'รับจ้าง', '5', 978756843, 'siwata@hotmail.com', '3310100429787', 'd5ebd81d643774607bc71bd6b14d15761f6ae23815267808db35c2a6776fa3b0', 'publish'),
(27, '3310100429736', '2', '5', 'สายัญ มกชาติ', '2504-05-27', '1', 'รับจ้างทั่วไป', '5', 998765456, 'sayun@hotmail.com', '3310100429736', '699223b5cd7970a6bad204bbcaf58a104f88b34b743a20fa1e1ebe34abf99175', 'publish'),
(28, '1104200676386', '1', '1', 'สิรวิชญ์ มกชาติ', '2552-02-08', '1', 'นักเรียน', '5', 0, 'sirikan@hotmail.com', '1104200676386', '67c4a838f748ef5b0a07545d60c5385d11239c961e01f249a4d12094059eda55', 'publish'),
(29, '1129701551963', '2', '2', 'สิริวิมล มกชาติ', '2554-11-03', '1', 'นักเรียน', '5', 0, 'sirikan@hotmail.com', '1129701551963', '802202f94cb5bb99ea654d88c657f04565c9ce2631f3d5aa128033e800dc4f46', 'publish'),
(30, '1319900174114', '2', '4', 'สุภานัน มกชาติ', '2532-04-28', '1', 'รับจ้างทั่วไป', '5', 981124532, 'supanun@hotmail.com', '1319900174114', 'e64e221963b3b6820547911b628e5541199172bd9ceb43c5dec709085d37077e', 'publish'),
(31, '5309890008457', '2', '4', 'เปมิกา ด่านกิตติโสภณ', '2514-11-05', '2', 'รับจ้างทั่วไป', '5', 900087641, 'peamika@gmail.com', '5309890008457', '71c36b40b05f1f7ac0b8b671514fd40087f6db12386bcaa0d6c0f3dacf297db1', 'publish'),
(32, '3310101220890', '1', '3', 'ชำนาญ จิตรรัมย์', '2504-02-13', '2', 'รับจ้างทั่วไป', '6', 654324356, 'chamnan@hotmail.com', '3310101220890', 'aeb79aa8962e59c8fba1e28b9343390b6d1dbb8d41f5c927ee7a75a6b627d37c', 'publish'),
(33, '1319900420328', '2', '4', 'ยุพิน ไชยนวล', '2538-03-15', '1', 'นักศึกษา', '13', 837363354, 'yupin@hotmail.com', '1319900420328', '51297d3b8fea7cb715a627ef2731d16bbbfe180fe5bbf5aafa1aaff292374a52', 'publish'),
(34, '6666666666666', '1', '3', 'บดัสวิน ชูชีพ', '2536-11-23', '1', 'นักธุรกิจ', '14', 942242994, 'dabassawin@hotmail.com', '6666666666666', 'fac4782635e8cedb674beead51050e25af39f59e18d9ebfa833d27f2ce387ef8', 'publish'),
(36, '33333', '2', '1', 'dddd', '2017-11-16', '1', 'นักศึกษา', '12', 22222222, 'aa@hotmail.com', '33333', '0a05dcf2429a41dd83c5fa7fb9c52a7ee7fed2a0e4f35d781888a181a724f49e', 'publish'),
(37, '4444444444444', '2', '4', 'แนนคนดี ขัยพรรณ', '2537-09-10', '1', 'นักศึกษา', '73', 922262993, 'nan@hotmail.com', '4444444444444', '5590f65429e74bc436e387a5e429407bbe797edad80bc255f9143da28bb166b9', ''),
(38, '111', '--เลื', '--เลือก--', '', '0000-00-00', '--เลื', '', '', 0, '', '111', '430a7a9f52df222bfd4ee6a068c585aa6ef95362816553be1bc9aee3027f61a3', 'publish');

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
  `sub_idcardBM1` int(13) NOT NULL COMMENT 'เลขประจำตัวประชาชนผู้ค้ำ 1',
  `sub_idcardBM2` int(13) NOT NULL COMMENT 'เลขประจำตัวประชาชนผู้ค้ำ 2',
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

INSERT INTO `promise` (`pro_id`, `mem_id`, `mem_name`, `mem_idcard`, `sub_id`, `app_pice`, `sub_date`, `pro_date`, `sub_moneyloan`, `sub_idcardBM1`, `sub_idcardBM2`, `name1`, `name2`, `pro_redate`, `pro_Document`, `id_commit`, `id_sapp`) VALUES
(2, '12', 'มนัสชนก มารศรี', 2147483647, '', 10000, '2017-10-18', '2017-10-18', 10000, 2147483647, 2147483647, 'มนัสชนก มารศรี', 'ไสว ชัยพรรณ', '2017-10-18', '1508329403.', '1', 1),
(3, '11', 'นรีเมธ ชัยพรรณ', 2147483647, '', 20000, '2017-10-18', '2017-10-18', 20000, 2147483647, 2147483647, 'รินดา มาสวยสวย', 'พลอธิป สลุบพล', '2017-12-18', ' ', '1', 0),
(5, '13', 'อิสรา นัยเนตร', 2147483647, '', 20000, '2017-10-18', '2017-10-18', 20000, 2147483647, 2147483647, 'นรีเมธ ชัยพรรณ', 'ชลิยา ราชประโคน', '2019-10-18', '', '--เล', 0),
(6, '14', 'ประสงค์  มีดี', 2147483647, '', 12000, '2017-10-24', '2017-10-24', 12000, 2147483647, 2147483647, 'มนัสชนก มารศรี', 'นรีเมธ ชัยพรรณ', '2019-10-24', '', '1', 0),
(7, '33', 'ยุพิน ไชยนวล', 2147483647, '', 5000, '2017-11-16', '2017-11-16', 5000, 2147483647, 2147483647, 'นรีเมธ ชัยพรรณ', 'ไสว ชัยพรรณ', '2019-11-16', '', '1', 0),
(8, '37', 'แนนคนดี ขัยพรรณ', 2147483647, '', 30000, '2017-11-16', '2017-11-16', 35000, 2147483647, 2147483647, 'กอย', 'มนัส', '2017-11-16', '', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `ref_id` int(11) NOT NULL,
  `mem_id` varchar(4) NOT NULL COMMENT 'รหัสสมาชิก',
  `mem_name` varchar(100) NOT NULL,
  `sub_moneyloan` int(11) NOT NULL COMMENT 'จำนวนเงินกู้',
  `ref_date` date NOT NULL COMMENT 'วันที่รับชำระ',
  `ref_moneytree` int(11) NOT NULL COMMENT 'เงินต้น',
  `ref_rate` int(11) NOT NULL COMMENT 'อัตราดอกเบี้ยที่ชำระ',
  `ref_picetotal` int(11) NOT NULL,
  `pay` int(11) NOT NULL COMMENT 'ชำระต่องวด',
  `owe` int(10) NOT NULL COMMENT 'ค้างชำระ',
  `ref_income` int(11) NOT NULL COMMENT 'จำนวนเงินที่รับมา',
  `ref_out` int(11) NOT NULL COMMENT 'จำนวนเงินทอน',
  `id_commit` int(4) NOT NULL COMMENT 'รหัสกรรมการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`ref_id`, `mem_id`, `mem_name`, `sub_moneyloan`, `ref_date`, `ref_moneytree`, `ref_rate`, `ref_picetotal`, `pay`, `owe`, `ref_income`, `ref_out`, `id_commit`) VALUES
(1, '12', 'มนัสชนก มารศรี', 0, '2017-10-24', 10000, 1200, 11200, 467, 10733, 500, 33, 1),
(2, '14', 'ประสงค์  มีดี', 0, '2017-10-24', 12000, 1440, 13440, 560, 12880, 600, 40, 0),
(3, '13', 'อิสรา นัยเนตร', 20000, '2017-10-24', 20000, 1200, 21200, 883, 20317, 1000, 117, 1),
(4, '13', 'อิสรา นัยเ', 20317, '2017-10-24', 0, 1219, 21536, 897, 20639, 203, -694, 1),
(5, '13', 'อิสรา นัยเนตร', 20639, '2017-10-24', 20639, 1238, 21877, 912, 19727, 1000, 88, 1),
(6, '13', 'อิสรา นัยเนตร', 19727, '2017-10-24', 19727, 1184, 20911, 871, 18856, 871, 0, 1),
(7, '13', 'อิสรา นัยเนตร', 18856, '2017-10-24', 18856, 1131, 19987, 833, 18023, 833, 0, 0),
(8, '12', 'มนัสชนก มารศรี', 10733, '2017-10-24', 10733, 644, 11377, 474, 10259, 474, 0, 1),
(9, '12', 'มนัสชนก มารศรี', 10259, '2017-10-24', 10259, 616, 10875, 453, 9806, 453, 0, 1),
(10, '12', 'มนัสชนก มารศรี', 9806, '2017-10-30', 9806, 588, 10394, 433, 9373, 500, 67, 1),
(11, '33', 'ยุพิน ไชยนวล', 5000, '2017-11-16', 5000, 300, 5300, 221, 4779, 221, 0, 1),
(12, '37', 'แนนคนดี ขัยพรรณ', 35000, '2017-11-16', 35000, 2100, 37100, 1546, 33454, 1546, 0, 1),
(13, '37', 'แนนคนดี ขัยพรรณ', 33454, '2017-11-16', 33454, 2007, 35461, 1478, 31976, 1478, 0, 1);

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
  `pro_number` varchar(15) NOT NULL COMMENT 'เลขที่สัญญา',
  `sub_moneyloan` int(11) NOT NULL COMMENT 'จำนวนเงินกู้',
  `pro_redate` date NOT NULL COMMENT 'วันที่ครบกำหนดส่ง',
  `pay_date` date NOT NULL COMMENT 'วันที่จ่ายเงินกู้',
  `pay_pice` int(11) NOT NULL COMMENT 'จำนวนเงินที่จ่าย',
  `id_commit` int(2) NOT NULL COMMENT 'รหัสกรรมการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repayment`
--

INSERT INTO `repayment` (`pay_id`, `mem_id`, `mem_name`, `mem_idcard`, `pro_id`, `pro_number`, `sub_moneyloan`, `pro_redate`, `pay_date`, `pay_pice`, `id_commit`) VALUES
(1, '12', 'มนัสชนก มารศรี', 2147483647, '2', '', 10000, '2017-10-24', '2017-10-18', 10000, 1),
(2, '13', 'อิสรา นัยเนตร', 2147483647, '5', '', 20000, '2017-10-24', '2019-10-18', 20000, 1),
(3, '11', 'นรีเมธ  ชัยพรรณ', 2147483647, '3', '', 20000, '2017-12-18', '2017-10-24', 20000, 1),
(4, '14', 'ประสงค์  มีดี', 2147483647, '6', '', 12000, '2019-10-24', '2017-10-24', 12000, 1),
(5, '33', 'ยุพิน ไชยนวล', 2147483647, '7', '', 5000, '2019-11-16', '2017-11-16', 5000, 1),
(6, '37', 'แนนคนดี ขัยพรรณ', 2147483647, '8', '', 35000, '2017-11-16', '2017-11-16', 30000, 1);

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
-- Table structure for table `statusmember`
--

CREATE TABLE `statusmember` (
  `id_s` int(1) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statusmember`
--

INSERT INTO `statusmember` (`id_s`, `status`) VALUES
(1, 'พร้อมใช้งาน'),
(2, 'ปิดบัญชี');

-- --------------------------------------------------------

--
-- Table structure for table `status_app`
--

CREATE TABLE `status_app` (
  `id_sapp` int(1) NOT NULL,
  `status_app` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_app`
--

INSERT INTO `status_app` (`id_sapp`, `status_app`) VALUES
(0, 'รออนุมัติ'),
(1, 'อนุมัติ'),
(2, 'ไม่อนุมัติ');

-- --------------------------------------------------------

--
-- Table structure for table `stop_member`
--

CREATE TABLE `stop_member` (
  `stopmem_id` int(11) NOT NULL,
  `mem_id` int(15) DEFAULT NULL,
  `mem_name` varchar(100) DEFAULT NULL,
  `fak_total` int(15) DEFAULT NULL,
  `id_s` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `sub_idcardBM1` varchar(13) NOT NULL COMMENT 'เลขที่บัตรผู้ค้ำประกันคนที่ 1',
  `name1` varchar(50) NOT NULL COMMENT 'ชื่อผู้คำประกันคนที่ 1',
  `sub_idcardBM2` varchar(13) NOT NULL COMMENT 'เลขที่บัตรผู้ค้ำประกันคนที่ 2',
  `name2` varchar(50) NOT NULL COMMENT 'ชื่อผู้คำประกันคนที่ 2',
  `id_commit` varchar(4) NOT NULL COMMENT 'รหัสกรรมการ',
  `id_sapp` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submitted`
--

INSERT INTO `submitted` (`sub_id`, `mem_id`, `mem_name`, `sub_moneyloan`, `sub_objective`, `sub_date`, `sub_idcardBM1`, `name1`, `sub_idcardBM2`, `name2`, `id_commit`, `id_sapp`) VALUES
(1, '12', 'มนัสชนก มารศรี', 10000, 'เพื่อการศึกษา', '2017-10-18', '1319900395871', 'มนัสชนก มารศรี', '1234567876543', 'ไสว ชัยพรรณ', '1', 2),
(2, '13', 'อิสรา นัยเนตร', 20000, 'เพื่อพัฒนาอาชีพ', '2017-10-18', '1319900395871', 'นรีเมธ ชัยพรรณ', '1232123454345', 'ชลิยา ราชประโคน', '1', 0),
(3, '11', 'นรีเมธ  ชัยพรรณ', 20000, 'เพื่อการศึกษา', '2017-10-18', '1234567890987', 'รินดา มาสวยสวย', '1319900765432', 'พลอธิป สลุบพล', '1', 1),
(4, '14', 'ประสงค์  มีดี', 12000, 'ค่าเหล้าเรียน', '2017-10-24', '1234567890987', 'มนัสชนก มารศรี', '1319900395871', 'นรีเมธ ชัยพรรณ', '1', 1),
(8, '11', 'นรีเมธ  ชัยพรรณ', 10000, 'เพื่อการศึกษา', '2017-11-14', '2222222222222', 'มนัสชนก มารศรี', '3333333333333', 'นุชจรี ปะโรยรัมย์', '1', 0),
(9, '12', 'มนัสชนก มารศรี', 5000, 'ทำนา', '2017-11-14', '', '', '', '', '1', 0),
(11, '11', 'นรีเมธ  ชัยพรรณ', 10000, 'เพื่อการศึกษา', '2017-11-15', '1212121212121', 'นายถนอม ชัยพรรณ', '3434343434343', 'นางไสว ชัยพรรณ', '1', 0),
(12, '33', 'ยุพิน ไชยนวล', 5000, 'เพื่อการศึกษา', '2017-11-15', '1319900395871', 'นรีเมธ ชัยพรรณ', '1212121212121', 'ไสว ชัยพรรณ', '1', 0),
(13, '37', 'แนนคนดี ขัยพรรณ', 35000, 'เพื่อสร้างอาชีพ', '2017-11-16', '1111111111111', 'กอย', '5555555555555', 'มนัส', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(13) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(60) NOT NULL,
  `status` enum('0','100','500') NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `mem_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `email`, `status`, `name`, `mem_id`) VALUES
(1, 'admin', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'ampare4444@hotmail.com', '500', '', 0),
(12, 'nan', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'aa@hotmail.com', '500', '', 0),
(13, 'manager', 'd91095be6628ba178b921d259650c3a7461020ca275baa200604f27382d6ff67', 'manager@hotmail.com', '100', '', 0),
(18, '1234567890987', '86188cc5d23a44746d529ce233de37e8c406c239f216fd26a9ebc8bfa5cca233', 'am@hotmail.com', '0', '', 0),
(19, '1318899367256', 'c9fec5185ac2b5960c30eeda11e2ecccd76e7ace764f92facdef49aa3872b9a4', 'bb@hotmail.com', '0', 'รินดา สวยสวย', 0),
(21, '2222222222222', '9cfc8e4f1cc0a92378ef7b548a9e6d59b9a41792554e559f2175684c8ace8c32', 'manus@hotmail.com', '0', 'มนัสชนก มารศรี', 12),
(22, '1319900395871', '5590f65429e74bc436e387a5e429407bbe797edad80bc255f9143da28bb166b9', 'payap@hotmail.com', '0', 'นารา ชัยพรรณ', 19),
(23, '3310100429781', '0bc1f9cd72e30bca04f3889dd08affb98596bfeec79925035186b4f2a486cf7f', 'tum@hotmail.com', '0', 'พายัพ ชัยพรรณ', 20),
(24, '3310100246038', '3b3c5dd0280474d6acc5b638bb9ec214b0ff557e64f5209342ba98c491cac08f', 'saranya@hotmail.com', '0', 'ตุ้มทอง  เมืองรัมย์', 21),
(25, '3310100429884', '7a1d11eff911028bc0309bf0a9285b01ff311be1b0c9a026fe003c224618e0fe', 'sirikan@hotmail.com', '0', '', 22),
(26, '3310100429710', '51b65cef6c6ab7b823bdba8190162aaea913a7bbae604d60634c09c51989c7a0', 'nin@hotmail.com', '0', '', 23),
(27, '1319900499889', 'ab24fef9d66b6f23314c7ccbfd9f21c01146cb73864d9519a07e3fb99b0b40c5', 'pattamawan@hotmail.com', '0', '', 24),
(28, '4310100003486', 'da8c7149013f87d86ceae89c225a3aa71cc006089d867d5a534003aed28d83e2', 'sirikan@hotmail.com', '0', 'ศิริกาญ มกชาติ', 25),
(29, '3310100429787', 'd5ebd81d643774607bc71bd6b14d15761f6ae23815267808db35c2a6776fa3b0', 'siwata@hotmail.com', '0', 'ศิวตาติ์ มกชาติพัน', 26),
(30, '3310100429736', '699223b5cd7970a6bad204bbcaf58a104f88b34b743a20fa1e1ebe34abf99175', 'sayun@hotmail.com', '0', 'สายัญ มกชาติพัน', 27),
(31, '1104200676386', '67c4a838f748ef5b0a07545d60c5385d11239c961e01f249a4d12094059eda55', 'sirikan@hotmail.com', '0', 'สิรวิชญ์ มกชาติ', 28),
(32, '1129701551963', '802202f94cb5bb99ea654d88c657f04565c9ce2631f3d5aa128033e800dc4f46', 'sirikan@hotmail.com', '0', 'สิริวิมล มกชาติ', 29),
(33, '1319900174114', 'e64e221963b3b6820547911b628e5541199172bd9ceb43c5dec709085d37077e', 'supanun@hotmail.com', '0', 'สุภานัน มกชาติ', 30),
(34, '5309890008457', '71c36b40b05f1f7ac0b8b671514fd40087f6db12386bcaa0d6c0f3dacf297db1', 'peamika@gmail.com', '0', 'เปมิกา ด่านกิตติโสภณ', 31),
(35, '3310101220890', 'aeb79aa8962e59c8fba1e28b9343390b6d1dbb8d41f5c927ee7a75a6b627d37c', 'chamnan@hotmail.com', '0', 'ชำนาญ จิตรรัมย์', 32),
(37, '6666666666666', 'fac4782635e8cedb674beead51050e25af39f59e18d9ebfa833d27f2ce387ef8', 'dabassawin@hotmail.com', '0', 'บดัสวิน ชูชีพ', 34),
(40, '4444444444444', '5590f65429e74bc436e387a5e429407bbe797edad80bc255f9143da28bb166b9', '', '0', 'แนน ขัยพรรณ', 37);

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
(1, '8jssrls1soop3ob9u9blr5vbg6', '2017-11-13 10:01:01', '0000-00-00 00:00:00', 1, '1', '10.30.164.206'),
(2, '8jssrls1soop3ob9u9blr5vbg6', '2017-11-13 10:01:14', '0000-00-00 00:00:00', 22, '1', '10.30.164.206'),
(3, '8jssrls1soop3ob9u9blr5vbg6', '2017-11-13 10:01:23', '0000-00-00 00:00:00', 13, '1', '10.30.164.206'),
(4, '8jssrls1soop3ob9u9blr5vbg6', '2017-11-13 10:01:35', '0000-00-00 00:00:00', 21, '1', '10.30.164.206'),
(5, '8jssrls1soop3ob9u9blr5vbg6', '2017-11-13 10:12:02', '0000-00-00 00:00:00', 1, '1', '10.30.164.206'),
(6, '8jssrls1soop3ob9u9blr5vbg6', '2017-11-13 13:28:14', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(7, '8jssrls1soop3ob9u9blr5vbg6', '2017-11-13 16:05:18', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(8, '626fphtfgdvh5q8tlalqrkluv2', '2017-11-14 04:20:47', '0000-00-00 00:00:00', 1, '1', '10.30.164.161'),
(9, '626fphtfgdvh5q8tlalqrkluv2', '2017-11-14 05:59:14', '0000-00-00 00:00:00', 22, '1', '10.30.164.161'),
(10, '626fphtfgdvh5q8tlalqrkluv2', '2017-11-14 06:02:51', '0000-00-00 00:00:00', 1, '1', '10.30.164.161'),
(11, '626fphtfgdvh5q8tlalqrkluv2', '2017-11-14 06:12:40', '0000-00-00 00:00:00', 22, '1', '10.30.164.161'),
(12, '626fphtfgdvh5q8tlalqrkluv2', '2017-11-14 06:13:03', '0000-00-00 00:00:00', 1, '1', '10.30.164.161'),
(13, '626fphtfgdvh5q8tlalqrkluv2', '2017-11-14 08:41:28', '0000-00-00 00:00:00', 13, '1', '10.30.164.161'),
(14, '273rpq6geehp11rlmmh9lsq0j6', '2017-11-14 09:10:23', '0000-00-00 00:00:00', 1, '1', '10.30.164.161'),
(15, '018ln6klaa268ki1bliqbuj2t0', '2017-11-14 14:29:40', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(16, '018ln6klaa268ki1bliqbuj2t0', '2017-11-14 15:00:34', '0000-00-00 00:00:00', 13, '1', '172.20.10.3'),
(17, '018ln6klaa268ki1bliqbuj2t0', '2017-11-14 15:02:13', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(18, '018ln6klaa268ki1bliqbuj2t0', '2017-11-14 16:03:27', '0000-00-00 00:00:00', 22, '1', '172.20.10.3'),
(19, '018ln6klaa268ki1bliqbuj2t0', '2017-11-14 16:36:35', '0000-00-00 00:00:00', 13, '1', '172.20.10.3'),
(20, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-15 02:53:21', '0000-00-00 00:00:00', 1, '1', '10.133.1.88'),
(21, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-15 03:49:48', '0000-00-00 00:00:00', 35, '1', '10.133.1.88'),
(22, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-15 03:50:50', '0000-00-00 00:00:00', 1, '1', '10.133.1.88'),
(23, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-15 04:54:59', '0000-00-00 00:00:00', 1, '1', '10.133.1.88'),
(24, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-15 04:58:38', '0000-00-00 00:00:00', 13, '1', '10.133.1.88'),
(25, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-15 05:01:06', '0000-00-00 00:00:00', 1, '1', '10.133.1.88'),
(26, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-15 05:35:30', '0000-00-00 00:00:00', 21, '1', '10.133.1.88'),
(27, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-15 05:43:06', '0000-00-00 00:00:00', 1, '1', '10.133.1.88'),
(28, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-15 05:45:00', '0000-00-00 00:00:00', 21, '1', '10.133.1.88'),
(29, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-15 05:51:46', '0000-00-00 00:00:00', 21, '1', '10.133.1.88'),
(30, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-15 05:52:09', '0000-00-00 00:00:00', 1, '1', '10.133.1.88'),
(31, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-15 05:52:59', '0000-00-00 00:00:00', 21, '1', '10.133.1.88'),
(32, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-15 05:59:51', '0000-00-00 00:00:00', 1, '1', '127.0.0.1'),
(33, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-15 06:02:40', '0000-00-00 00:00:00', 22, '1', '127.0.0.1'),
(34, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-15 06:04:54', '0000-00-00 00:00:00', 21, '1', '127.0.0.1'),
(35, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-15 06:20:17', '0000-00-00 00:00:00', 1, '1', '127.0.0.1'),
(36, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-16 01:17:50', '0000-00-00 00:00:00', 21, '1', '172.20.10.3'),
(37, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-16 01:29:59', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(38, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-16 01:32:59', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(39, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-16 01:35:14', '0000-00-00 00:00:00', 21, '1', '172.20.10.3'),
(40, 'sc70nm2h6j0367ilhd6l3rtp71', '2017-11-16 02:08:00', '0000-00-00 00:00:00', 1, '1', '172.20.10.3'),
(41, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 04:02:17', '0000-00-00 00:00:00', 21, '1', '10.133.1.88'),
(42, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 04:10:24', '0000-00-00 00:00:00', 1, '1', '10.133.1.88'),
(43, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 04:12:17', '0000-00-00 00:00:00', 21, '1', '10.133.1.88'),
(44, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 04:32:00', '0000-00-00 00:00:00', 13, '1', '10.133.1.88'),
(45, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 04:35:26', '0000-00-00 00:00:00', 1, '1', '10.133.1.88'),
(46, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 04:41:57', '0000-00-00 00:00:00', 13, '1', '10.133.1.88'),
(47, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 04:43:17', '0000-00-00 00:00:00', 13, '1', '10.133.1.88'),
(48, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 04:50:06', '0000-00-00 00:00:00', 21, '1', '10.133.1.88'),
(49, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 05:48:13', '0000-00-00 00:00:00', 1, '1', '10.133.1.88'),
(50, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 07:52:39', '0000-00-00 00:00:00', 1, '1', '10.133.1.88'),
(51, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 07:54:31', '0000-00-00 00:00:00', 37, '1', '10.133.1.88'),
(52, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 08:23:35', '0000-00-00 00:00:00', 1, '1', '10.133.1.88'),
(53, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 08:25:44', '0000-00-00 00:00:00', 36, '1', '10.133.1.88'),
(54, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 08:26:47', '0000-00-00 00:00:00', 22, '1', '10.133.1.88'),
(55, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 08:27:53', '0000-00-00 00:00:00', 21, '1', '10.133.1.88'),
(56, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 08:28:13', '0000-00-00 00:00:00', 36, '1', '10.133.1.88'),
(57, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 08:28:22', '0000-00-00 00:00:00', 1, '1', '10.133.1.88'),
(58, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 08:34:18', '0000-00-00 00:00:00', 36, '1', '10.133.1.88'),
(59, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 09:04:31', '0000-00-00 00:00:00', 1, '1', '10.133.1.88'),
(60, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 09:10:01', '0000-00-00 00:00:00', 1, '1', '10.133.1.88'),
(61, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 09:13:35', '0000-00-00 00:00:00', 40, '1', '10.133.1.88'),
(62, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 09:15:09', '0000-00-00 00:00:00', 1, '1', '10.133.1.88'),
(63, 'j5oe41uanc8609lr65tmvcq720', '2017-11-16 13:58:49', '0000-00-00 00:00:00', 1, '1', '172.20.10.3');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `wa_id` int(11) NOT NULL COMMENT 'รหัสการถอน',
  `wa_date` date NOT NULL COMMENT 'วันที่ถอน',
  `mem_id` char(4) NOT NULL COMMENT 'รหัสสมาชิก',
  `mem_name` char(50) DEFAULT NULL COMMENT 'ชื่อสมาชิก',
  `com_name` varchar(11) NOT NULL COMMENT 'ชื่อกรรมการ',
  `id_position` varchar(11) NOT NULL COMMENT 'ตำแหน่ง',
  `wa_sum` int(11) NOT NULL COMMENT 'จำนวนถอน',
  `fak_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `approve`
--
ALTER TABLE `approve`
  ADD PRIMARY KEY (`app_id`);

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
-- Indexes for table `statusmember`
--
ALTER TABLE `statusmember`
  ADD PRIMARY KEY (`id_s`);

--
-- Indexes for table `status_app`
--
ALTER TABLE `status_app`
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
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`wa_id`);

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
  MODIFY `fak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `promise`
--
ALTER TABLE `promise`
  MODIFY `pro_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการทำสัญญา', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `repayment`
--
ALTER TABLE `repayment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `submitted`
--
ALTER TABLE `submitted`
  MODIFY `sub_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสยื่นกู้', AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `wa_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการถอน';
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
