-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2017 at 03:18 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(4) NOT NULL COMMENT 'รหัสผู้ดูแลระบบ',
  `name_admin` varchar(100) NOT NULL COMMENT 'ชื่อ',
  `username` varchar(10) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `password` varchar(10) NOT NULL COMMENT 'รหัสผ่าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name_admin`, `username`, `password`) VALUES
('A001', 'นายถนอม ชัยพรรณ', 'admin', '1234'),
('A002', 'rinda chaiyapan', 'nan', '1234');

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

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`id_committee`, `com_idcard`, `id_title`, `com_name`, `id_position`, `com_birthday`, `com_address`, `com_tel`, `com_username`, `com_password`) VALUES
('1', '1234567890987', '3', 'dkkkww', '2', '2017-08-03', '22', '2222222222', '1234567890987', '03082017'),
('A002', '1319900395871', '4', 'นรีเมธ ชัยพรรณ', '1', '1994-09-10', '14', '0922262993', '1319900395871', '10092537'),
('C001', '1234567890987', '3', 'อิสรา นัยเนตร', '1', '2017-05-15', '888', '0987654321', '1234567890987', '15052017'),
('C002', '1234567890987', '4', 'ขวัญตา แซ่ลี้', '7', '0000-00-00', '99', '0987654321', '1234567890987', '16081995'),
('C003', '1319900398774', '1', 'แสวง เงิน', '1', '2017-08-18', '33', '098747777', '1319900398774', '17082560');

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
  `fak_date` date DEFAULT NULL,
  `mem_id` int(3) DEFAULT NULL,
  `name_commit` varchar(20) NOT NULL COMMENT 'ชื่อผู้รับฝาก',
  `id_commit` int(5) NOT NULL,
  `fak_sum` int(15) NOT NULL COMMENT 'จำนวนเงินฝาก',
  `withdraw` int(15) NOT NULL,
  `fak_total` int(15) NOT NULL COMMENT 'รวมเงินฝาก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`fak_id`, `fak_date`, `mem_id`, `name_commit`, `id_commit`, `fak_sum`, `withdraw`, `fak_total`) VALUES
(33, '0000-00-00', 1, '', 0, 100, 0, 0),
(34, '2017-09-05', 1, '', 1, 100, 0, 0),
(35, '0000-00-00', 6, '', 1, 100, 0, 100),
(36, '2017-09-06', 6, '', 1, 200, 0, 300),
(37, '2017-09-12', 6, '', 0, 100, 0, 400),
(38, '2017-09-13', 6, '', 1, 100, 0, 500),
(39, '0000-00-00', 6, '', 0, 100, 0, 400),
(40, '0000-00-00', 6, '', 0, 100, 0, 300),
(41, '2017-09-14', 6, '', 1, 0, 100, 200),
(42, '2017-09-20', 6, '', 0, 0, 100, 100),
(43, '2017-09-06', 1, '', 0, 100, 0, 100),
(44, '2017-09-07', 1, '', 1, 100, 0, 200),
(45, '2017-09-07', 1, '', 1, 150, 0, 350),
(47, '0000-00-00', 7, '', 1, 100, 0, 100),
(48, '2017-09-06', 7, '', 1, 0, 100, 0),
(49, '2017-09-20', 6, '', 1, 2000, 0, 2350),
(50, '2017-08-31', 6, '', 1, 500, 0, 2850),
(51, '2017-09-25', 1, '', 0, 2000, 0, 2350),
(52, '0000-00-00', 1, '', 0, 0, 0, 0);

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
('55533', '555', '555เรื่องของฉัน', '555'),
('F02', 'กองทุนประชารัฐ', 'เอาไปทำอะไรก็ได้', '1,000,000'),
('F03', 'กองทุน กยศ', 'กองทุนกู้ยืมเพื่อการศึกษาค่ะ', '200,000');

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
(1, '12345567890', '1', '1', 'มนัสชนก มารศรี', '2537-09-10', '1', 'ค้าขาย', '33 บ้านสวนครัว', 987654321, 'manaz@gmail.com', '123456789', '10092537', 'publish'),
(2, '1234567890987', '1', '1', 'อิสรา นัยเนตร', '2017-05-18', '1', 'รับจ้าง', '88', 987654321, 'noom@gmail.com', '1234567890987', '18052536', 'publish'),
(6, '1319900395871', '1', '1', 'hello', '2017-08-17', '1', 'พนักงาน', '22 ม.14', 922262993, 'ampare4444@hotmail.com', '1319900395871', '17082560', 'publish'),
(7, '1234321234123', '1', '1', 'รินดา มาสาย', '1992-12-31', '1', 'นักศึกษา', '44', 922262993, 'rinda44@hotmail.com', '1234321234123', '31121992', 'publish'),
(8, '1232121212121', '1', '1', 'พลอธิป สลุบพล', '1994-12-01', '1', 'นักศึกษา', '33', 981231123, 'pon@hotmail.com', '1232121212121', '01121994', 'publish'),
(9, '1319900395678', '1', '1', 'นรีเมธ  ชัยพรรณ', '2016-12-29', '1', 'นักศึกษา', '333', 922262993, 'ampare444@hotmail.com', '', '', 'publish'),
(10, '2', '2', '4', 'มด', '1112-11-11', '1', 'hh', '33', 3, 'hhh@dd.com', '12', '11111112', 'publish');

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
  `pro_number` int(4) NOT NULL,
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

INSERT INTO `promise` (`pro_id`, `mem_id`, `mem_name`, `mem_idcard`, `sub_id`, `app_pice`, `sub_date`, `pro_date`, `pro_number`, `sub_moneyloan`, `sub_idcardBM1`, `sub_idcardBM2`, `name1`, `name2`, `pro_redate`, `pro_Document`, `id_commit`, `id_sapp`) VALUES
(1, '1', 'มนัสชนก มารศรี', 2147483647, '1', 20000, '2017-09-28', '2017-09-21', 1, 22000, 2147483647, 2147483647, 'sfdfaf', 'fdsfadf', '2017-09-21', '', '1', 0),
(2, '2', 'อิสรา นัยเนตร', 2147483647, '1', 12000, '2017-09-25', '2017-09-26', 1, 10000, 2147483647, 2147483647, 'dddddddddddd', 'sssssssssssssssss', '2017-09-26', '', '1', 0),
(3, '6', 'hello', 0, '', 0, '0000-00-00', '0000-00-00', 0, 0, 0, 0, '', '', '0000-00-00', '', '1', 0),
(4, '5', 'ddddddd', 0, '', 0, '0000-00-00', '0000-00-00', 0, 0, 0, 0, '', '', '0000-00-00', '47373-', '--เล', 0);

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `ref_id` int(11) NOT NULL,
  `mem_id` varchar(4) NOT NULL COMMENT 'รหัสสมาชิก',
  `mem_name` varchar(100) NOT NULL,
  `pro_pice` int(11) NOT NULL COMMENT 'จำนวนเงินกู้',
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

INSERT INTO `refund` (`ref_id`, `mem_id`, `mem_name`, `pro_pice`, `ref_date`, `ref_moneytree`, `ref_rate`, `ref_picetotal`, `pay`, `owe`, `ref_income`, `ref_out`, `id_commit`) VALUES
(1, '1', 'มนัสชนก', 10000, '2017-10-01', 0, 0, 0, 0, 10000, 0, 0, 0),
(2, '2', 'อิสรา นัยเนตร', 0, '2017-10-03', 20000, 2400, 22400, 0, 0, 1000, 157, 1),
(3, '', '', 0, '0000-00-00', 10, 0, 0, 0, 0, 0, 0, 0);

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

--
-- Dumping data for table `repayment`
--

INSERT INTO `repayment` (`pay_id`, `mem_id`, `mem_name`, `mem_idcard`, `pro_id`, `pro_number`, `pro_pice`, `date_sent`, `pay_date`, `pay_pice`, `id_commit`) VALUES
(1, '1', 'มนัสชนก มารศรี', 2147483647, '1', '1', 3000, '2017-09-20', '2017-09-27', 200, 1),
(2, '2', 'อิสรา นัยเนตร', 2147483647, '2', '2', 10000, '2017-09-21', '2017-09-27', 1200, 1),
(3, '2', 'อิสรา นัยเนตร', 2147483647, '3', '3', 5000, '2017-09-12', '2017-09-26', 50000, 1),
(4, '9', 'นรีเมธ  ชัยพรรณ', 2147483647, '9', '9', 9999, '2017-09-28', '2017-09-08', 200, 1);

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
-- Table structure for table `status_stop_member`
--

CREATE TABLE `status_stop_member` (
  `stopmem_id` int(11) NOT NULL,
  `stopmem_name` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_stop_member`
--

INSERT INTO `status_stop_member` (`stopmem_id`, `stopmem_name`) VALUES
(1, 'สมาชิก'),
(2, 'ยกเลิกบัญชีแล้ว');

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

--
-- Dumping data for table `stop_member`
--

INSERT INTO `stop_member` (`stopmem_id`, `mem_id`, `mem_name`, `fak_total`, `id_s`, `status`) VALUES
(0, 0, '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `submitted`
--

CREATE TABLE `submitted` (
  `sub_id` int(4) NOT NULL COMMENT 'รหัสยื่นกู้',
  `mem_id` varchar(4) NOT NULL COMMENT 'รหัสสมาชิก',
  `mem_name` varchar(50) NOT NULL COMMENT 'ชื่อ - สกุลสมาชิก',
  `sub_moneyloan` varchar(11) NOT NULL COMMENT 'จำนวนเงินที่ขอกู้',
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
(1, '1', 'มนัสชนก มารศรี', '10000', 'เพื่อการศึกษา', '2017-09-04', '234565432345', 'ddddd', '7687655643', 'gggggg', '1', 1),
(2, '2', 'fafsdfd', '12000', 'fdsggdf', '2017-09-04', '22222222222', 'sdfad', '2222222222', 'fafdfa', '1', 0),
(3, '1', 'มนัสชนก มารศรี', '80', 'fd', '2017-09-25', '77', 'hh', '66', 'll', '1', 1),
(7, '1', 'มนัสชนก มารศรี', '10000', 'เพื่อการศึกษา', '2017-09-12', '1111111111', 'fffff', '111111111111', 'dddddd', '1', 1);

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
(1, 'admin', 'e8730e71bbe10d2c40a15ab4b86b2413b033ee1fa04588069f6e4444fab0c23f', 'ampare4444@hotmail.com', '500'),
(3, 'user', '4444', 'ampare@hotmail.com', '100'),
(12, 'nan', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'aa@hotmail.com', '500'),
(13, '1319900395871', '5590f65429e74bc436e387a5e429407bbe797edad80bc255f9143da28bb166b9', 'nan@hotmail.com', '100'),
(14, 'gloyjai', '4444', 'gloyjai@hotmail.com', '100');

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
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`wa_id`, `wa_date`, `mem_id`, `mem_name`, `com_name`, `id_position`, `wa_sum`, `fak_total`) VALUES
(4, '2017-06-05', '1', 'มนัส', '', '', 70, 70);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

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
-- Indexes for table `status_stop_member`
--
ALTER TABLE `status_stop_member`
  ADD PRIMARY KEY (`stopmem_id`);

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
  MODIFY `fak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `promise`
--
ALTER TABLE `promise`
  MODIFY `pro_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการทำสัญญา', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `repayment`
--
ALTER TABLE `repayment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `status_stop_member`
--
ALTER TABLE `status_stop_member`
  MODIFY `stopmem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `submitted`
--
ALTER TABLE `submitted`
  MODIFY `sub_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสยื่นกู้', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `wa_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการถอน', AUTO_INCREMENT=5;
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
