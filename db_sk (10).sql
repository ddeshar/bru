-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2017 at 07:30 AM
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
  `id_committee` varchar(4) NOT NULL COMMENT 'รหัสกรรมการ',
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
(5, '2017-10-18 10:56:03', 13, '', 0, 1000, 0, 3000),
(6, '2017-10-18 10:58:03', 13, '', 0, 0, 500, 2500),
(7, '2017-10-18 11:02:34', 13, '', 1, 0, 500, 2000),
(8, '2017-10-18 12:36:09', 11, '', 1, 5000, NULL, 5100);

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
  `mem_password` varchar(8) NOT NULL COMMENT 'รหัสผ่าน',
  `status_mem` enum('publish','unpublish') NOT NULL DEFAULT 'publish'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_idcard`, `id_gender`, `id_title`, `mem_name`, `mem_birthday`, `id_status`, `mem_occupation`, `mem_address`, `mem_tel`, `mem_email`, `mem_username`, `mem_password`, `status_mem`) VALUES
(11, '1319900395871', '2', '4', 'นรีเมธ  ชัยพรรณ', '1994-09-10', '1', 'นักศึกษา', '73', 922262993, 'ampare444@hotmail.com', '1319900395871', '10092537', 'publish'),
(12, '1319900395678', '2', '4', 'มนัสชนก มารศรี', '1994-10-24', '1', 'นักศึกษา', '4', 870489040, 'manus@hotmail.com', '1319900395678', '24102537', 'publish'),
(13, '1318899356742', '1', '3', 'อิสรา นัยเนตร', '1993-10-10', '1', 'โปรแกรมเมอร์', '55', 985818782, 'isara@hotmai.com', '1318899356742', '10102536', 'publish');

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
(3, '11', 'นรีเมธ ชัยพรรณ', 2147483647, '', 15000, '2017-10-18', '2017-10-18', 20000, 2147483647, 2147483647, 'รินดา มาสวยสวย', 'พลอธิป สลุบพล', '2017-12-18', ' ', '1', 0),
(5, '13', 'อิสรา นัยเนตร', 2147483647, '', 20000, '2017-10-18', '2017-10-18', 20000, 2147483647, 2147483647, 'นรีเมธ ชัยพรรณ', 'ชลิยา ราชประโคน', '2019-10-18', '', '--เล', 0);

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
  `pro_pice` int(11) NOT NULL COMMENT 'จำนวนเงินกู้',
  `date_sent` date NOT NULL COMMENT 'วันที่ครบกำหนดส่ง',
  `pay_date` date NOT NULL COMMENT 'วันที่จ่ายเงินกู้',
  `pay_pice` int(11) NOT NULL COMMENT 'จำนวนเงินที่จ่าย',
  `id_commit` int(2) NOT NULL COMMENT 'รหัสกรรมการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(0, 'รอนุมัติ'),
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
(0, 'รอนุมัติ'),
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
(1, '12', 'มนัสชนก มารศรี', 10000, 'เพื่อการศึกษา', '2017-10-18', '1319900395871', 'มนัสชนก มารศรี', '1234567876543', 'ไสว ชัยพรรณ', '1', 1),
(2, '13', 'อิสรา นัยเนตร', 20000, 'เพื่อพัฒนาอาชีพ', '2017-10-18', '1319900395871', 'นรีเมธ ชัยพรรณ', '1232123454345', 'ชลิยา ราชประโคน', '1', 1),
(3, '11', 'นรีเมธ  ชัยพรรณ', 20000, 'เพื่อการศึกษา', '2017-10-18', '1234567890987', 'รินดา มาสวยสวย', '1319900765432', 'พลอธิป สลุบพล', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(13) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(60) NOT NULL,
  `status` enum('0','100','500') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `email`, `status`) VALUES
(1, 'admin', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'ampare4444@hotmail.com', '500'),
(12, 'nan', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'aa@hotmail.com', '500');

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
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `action` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `fak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `promise`
--
ALTER TABLE `promise`
  MODIFY `pro_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการทำสัญญา', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `repayment`
--
ALTER TABLE `repayment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `submitted`
--
ALTER TABLE `submitted`
  MODIFY `sub_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสยื่นกู้', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT;
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
