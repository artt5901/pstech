-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2021 at 03:24 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pstech`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `b_id` tinyint(4) NOT NULL,
  `b_name` varchar(50) NOT NULL,
  `d_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`b_id`, `b_name`, `d_id`) VALUES
(1, 'คอมพิวเตอร์ธุรกิจ ปวช.', 2),
(2, 'การบัญชี ปวช.', 2),
(3, 'ยานยนต์ ปวช.', 1),
(4, 'อิเล็คทรอนิกส์ ปวช.', 1),
(5, 'ธุรกิจค้าปลีกสมัยใหม่ ปวช.', 2),
(6, 'ธุรกิจค้าปลีก ร้านอาหารและบริการ ปวช.', 1),
(7, 'เทคโนโลยีดิจิทัล ปวส.', 2),
(8, 'การบัญชี ปวส.', 2),
(9, 'อิเล็คทรอนิกส์ ปวส.', 1),
(10, 'เทคนิคยานยนต์ ปวส.', 1),
(11, 'ธุรกิจค้าปลีก ร้านอาหารและบริการ ปวส.', 2),
(12, 'ธุรกิจค้าปลีกสมัยใหม่ ปวส.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `b_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `b_id`) VALUES
(1, '25630201 - คอมพิวเตอร์ธุรกิจ', 1),
(2, '25630202 - การบัญชี', 2),
(3, '25630103 - ยานยนต์', 3),
(4, '25630104 - อิเล็คทรอนิกส์', 4),
(5, '25630205 - ธุรกิจค้าปลีกสมัยใหม่', 5),
(6, '25630206 - ธุรกิจค้าปลีก ร้านอาหารและบริการ', 6),
(7, '25630207 - เทคโนโลยีดิจิทัล', 7),
(8, '25630208 - การบัญชี(ปวส)', 8),
(9, '25630109 - อิเล็คทรอนิกส์(ปวส)', 9),
(10, '25630110 - เทคนิคยานยนต์', 10),
(11, '25630211 - ร้านอาหารและบริการ(ปวส)', 11),
(12, '25630212 -  ธุรกิจค้าปลีกสมัยใหม่(ปวส)', 12);

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `classroom_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `c_id` smallint(6) NOT NULL,
  `y_id` tinyint(4) NOT NULL,
  `t_id` tinyint(4) NOT NULL,
  `day_id` char(1) NOT NULL,
  `time_id` tinyint(4) NOT NULL,
  `classroom_st` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`classroom_id`, `class_id`, `c_id`, `y_id`, `t_id`, `day_id`, `time_id`, `classroom_st`) VALUES
(1, 1, 1, 1, 5, '1', 1, '2'),
(2, 1, 14, 1, 4, '1', 2, '2'),
(3, 1, 28, 1, 6, '2', 1, '2'),
(4, 1, 21, 1, 5, '2', 2, '2'),
(5, 1, 13, 1, 4, '3', 1, '2'),
(6, 1, 11, 1, 5, '3', 3, '2'),
(7, 1, 34, 1, 5, '3', 4, '1'),
(8, 1, 19, 1, 6, '4', 1, '2'),
(9, 1, 27, 1, 5, '4', 2, '2'),
(10, 1, 2, 1, 4, '5', 1, '2'),
(11, 1, 4, 1, 4, '5', 2, '2'),
(12, 12, 10, 1, 4, '1', 1, '1'),
(13, 1, 34, 3, 5, '3', 4, '2'),
(14, 3, 11, 3, 7, '3', 3, '1'),
(15, 3, 10, 3, 4, '1', 2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` tinyint(4) NOT NULL,
  `c_num` varchar(20) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_credit` int(11) NOT NULL,
  `c_ot` varchar(500) NOT NULL,
  `c_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_num`, `c_name`, `c_credit`, `c_ot`, `c_status`) VALUES
(1, '20204-2208', 'การสร้างเว็บไซต์', 3, 'ศึกษาและปฏิบัติเกี่ยวกับกระบวนการและโครงสร้างการทำงานของเว็บไซต์ การออกแบบเว็บไซต์ การสร้างเว็บไซต์ด้วยโปรแกรมภาษาหรือโปรแกรมสำเร็จรูปหรือโปรแกรมระบบ CMS (Content Management System) การทดสอบการทำงานของเว็บไซต์ และการอัพโหลด(Upload)เว็บไซต์', '3'),
(2, '20000-1101', 'ภาษาไทยพื้นฐาน', 2, '-', '0'),
(3, '20000-1102', 'ภาษาไทยเพื่ออาชีพ', 2, '-', '0'),
(4, '20000-1201', 'ภาษาอังกฤษในชีวิตจริง', 2, '-', '0'),
(5, '20000-1208', 'ภาษาอังกฤษเตรียมความพร้อมเพื่อการทำงาน', 2, '-', '0'),
(6, '20000-1301', 'วิทยาศาสตร์เพื่อพัฒนาทักษะชีวิต', 2, '-', '0'),
(7, '20000-1401', 'คณิตศาสตร์พื้นฐานอาชีพ', 2, '-', '0'),
(8, '20000-1404', 'คณิตศาสตร์ธุรกิจบริการ', 2, '-', '0'),
(9, '20000-1501', 'หน้าที่ผลเมืองและศีลธรรม', 2, '-', '0'),
(10, '20000-1506', 'เหตุการณ์ปัจจุบัน', 2, '-', '0'),
(11, '20000-1602', 'เพศวิถีศึกษา', 2, '-', '0'),
(12, '20001-2001', 'คอมพิวเตอร์และสารสนเทศเพื่องานอาชีพ', 3, '-', '1'),
(13, '20200-1001', 'เศรษฐศาสตร์เบื้องต้น', 3, '-', '1'),
(14, '20200-1002', 'การบัญชีเบื้องต้น', 3, '-', '1'),
(15, '20200-1003', 'การขายเบื้องต้น', 3, '-', '1'),
(16, '20200-1004', 'พิมพ์ดีดไทยเบื้องต้น', 3, '-', '1'),
(17, '20200-1005', 'พิมพ์อังกฤษเบื้องต้น', 3, '-', '1'),
(18, '20001-1002', 'พลังงาน ทรัพยากรและสิ่งแวดล้อม', 3, '-', '1'),
(19, '20204-2001', 'ระบบปฏิบัติการเบื้องต้น', 3, '-', '3'),
(20, '20204-2002', 'คอมพิวเตอร์และการบำรุงรักษา', 3, '-', '3'),
(21, '20204-2003', 'คณิตศาสตร์คอมพิวเตอร์', 3, '-', '3'),
(22, '20204-2004', 'หลักการเขียนโปรแกรม', 3, '-', '3'),
(23, '20204-2007', 'โปรแกรมกราฟิก', 3, '-', '3'),
(24, '20204-2009', 'จริยธรรมและกฏหมายคอมพิวเตอร์', 3, '-', '3'),
(25, '20204-2005', 'เครือข่ายคอมพิวเตอร์เบื้องต้น', 3, '-', '3'),
(26, '20204-2102', 'โปรแกรมประมวลผลคำ', 3, '-', '3'),
(27, '20204-2103', 'โปรแกรมตารางาน', 3, '-', '3'),
(28, '20204-2104', 'โปรแกรมนำเสนอ', 3, '-', '3'),
(29, '20204-2105', 'โปรแกรมฐานข้อมูล', 3, '+', '3'),
(30, '20204-2109', 'การผลิตสื่อสิ่งพิมพ์', 3, '-', '3'),
(31, '20204-2110', 'โปรแกรมมัลติมีเดีย', 3, '-', '3'),
(32, '20204-8001', 'ฝึกงาน', 4, '-', '0'),
(33, '20204-8501', 'โครงงาน', 4, '-', '0'),
(34, '-', 'ชมรมวิชาชีพ', 3, '-', '0');

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `day_id` tinyint(4) NOT NULL,
  `day_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`day_id`, `day_name`) VALUES
(1, 'จันทร์'),
(2, 'อังคาร'),
(3, 'พุธ'),
(4, 'พฤหัสบดี'),
(5, 'ศุกร์');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` tinyint(4) NOT NULL,
  `d_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`) VALUES
(1, 'อุตสหกรรม'),
(2, 'พาณิชยกรรม');

-- --------------------------------------------------------

--
-- Table structure for table `father`
--

CREATE TABLE `father` (
  `f_id` varchar(13) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `f_tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `father`
--

INSERT INTO `father` (`f_id`, `f_name`, `f_tel`) VALUES
('1011121012124', 'ดีใจ คงทน', '0836544048'),
('1216680568524', 'หมาย ชุมแสง', '0852145021'),
('123456', 'bigfather', '5555'),
('1234567891012', 'ณรงค์ คงเคน', '0622915581'),
('1500162014009', 'มงคล สิทธิใส', '0836544040'),
('2282971975031', 'อาเธอร์', '0646846135');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `classroom_id` int(11) NOT NULL,
  `s_username` varchar(13) NOT NULL,
  `c_id` tinyint(4) NOT NULL,
  `class_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `y_id` tinyint(4) NOT NULL,
  `score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`classroom_id`, `s_username`, `c_id`, `class_id`, `t_id`, `y_id`, `score`) VALUES
(1, '4024', 1, 1, 5, 1, 3),
(1, '4025', 1, 1, 5, 1, 3),
(2, '4024', 14, 1, 4, 1, 4),
(2, '4025', 14, 1, 4, 1, 3),
(3, '4024', 28, 1, 6, 1, 4),
(3, '4025', 28, 1, 6, 1, 4),
(4, '4024', 21, 1, 5, 1, 4),
(4, '4025', 21, 1, 5, 1, 3),
(5, '4024', 13, 1, 4, 1, 4),
(5, '4025', 13, 1, 4, 1, 3),
(6, '4024', 11, 1, 5, 1, 4),
(6, '4025', 11, 1, 5, 1, 4),
(8, '4024', 19, 1, 6, 1, 4),
(8, '4025', 19, 1, 6, 1, 3),
(9, '4024', 27, 1, 5, 1, 3.5),
(9, '4025', 27, 1, 5, 1, 4),
(10, '4024', 2, 1, 4, 1, 4),
(10, '4025', 2, 1, 4, 1, 4),
(11, '4024', 4, 1, 4, 1, 2.5),
(11, '4025', 4, 1, 4, 1, 3),
(13, '4024', 34, 1, 5, 3, 4),
(13, '4025', 34, 1, 5, 3, 4),
(15, '4002', 10, 3, 4, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` tinyint(4) NOT NULL,
  `level_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`) VALUES
(1, 'ปวช.1'),
(2, 'ปวช.2'),
(3, 'ปวช.3'),
(4, 'สำเร็จหลักสูตร ปวช.'),
(5, 'ปวส.1'),
(6, 'ปวส.2'),
(7, 'สำเร็จหลักสูตร ปวส.');

-- --------------------------------------------------------

--
-- Table structure for table `mathar`
--

CREATE TABLE `mathar` (
  `m_id` varchar(13) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mathar`
--

INSERT INTO `mathar` (`m_id`, `m_name`, `m_tel`) VALUES
('1011121012125', 'สมาน คงทน', '0836544044'),
('1234567891013', 'จันฑิมา สุทธิผล', '0622915585'),
('1850162014009', 'ดวงใจ สิทธิใส', '0622915584'),
('456789', 'bigmother', '6666'),
('5633520011455', 'ดาว ชุมแสง', '0124587520'),
('9292673124324', 'แจ่ม จรัส', '0984616394');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `n_id` tinyint(4) NOT NULL,
  `n_name` varchar(150) NOT NULL,
  `n_ot` text NOT NULL,
  `n_pic` varchar(100) NOT NULL,
  `t_id` tinyint(4) NOT NULL,
  `n_link` text NOT NULL,
  `n_date` date NOT NULL,
  `n_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`n_id`, `n_name`, `n_ot`, `n_pic`, `t_id`, `n_link`, `n_date`, `n_status`) VALUES
(2, 'เปิดใช้งานเว็บไซต์ระบบทะเบียน  วิทยาลัยเทคโนโลยีป่าสักธารา 2564/1', 'เปิดใช้งานเว็บไซต์ระบบทะเบียน  วิทยาลัยเทคโนโลยีป่าสักธารา 2564/1', 'ป้ายคุณธรรม_63.jpg', 5, 'https://web.facebook.com/', '2021-05-02', '1'),
(3, 'ทดสอบข่าวสารประชาสัมพันธ์ 1', 'ทดสอบข่าวสารประชาสัมพันธ์ 1', 'news1.jpg', 6, 'https://www.facebook.com/artt.thana/', '2021-06-10', '1'),
(4, 'ทดสอบข่าวสารประชาสัมพันธ์ 2', 'ทดสอบข่าวสารประชาสัมพันธ์ 2', 'news2.jpg', 6, 'https://www.facebook.com/artt.thana/', '2021-06-10', '1'),
(5, 'ทดสอบข่าวสารประชาสัมพันธ์ 3', 'ทดสอบข่าวสารประชาสัมพันธ์ 3', 'news3.jpg', 6, 'https://www.facebook.com/artt.thana/', '2021-06-11', '1'),
(6, 'ทดสอบข่าวสารประชาสัมพันธ์ 4', 'ทดสอบข่าวสารประชาสัมพันธ์ 4', 'news4.jpg', 6, 'https://www.facebook.com/artt.thana/', '2021-06-12', '1'),
(7, 'ทดสอบข่าวสารประชาสัมพันธ์ 5', 'ทดสอบข่าวสารประชาสัมพันธ์ 5', 'news5.jpg', 6, 'https://www.facebook.com/artt.thana/', '2021-06-13', '1'),
(8, 'ทดสอบข่าวสารทั่วไป 6', 'ทดสอบข่าวสารทั่วไป 6', 'news6.jpg', 6, 'https://www.facebook.com/artt.thana/', '2021-06-14', '2'),
(9, 'ทดสอบข่าวสารทั่วไป 7', 'ทดสอบข่าวสารทั่วไป 7', 'news7.jpg', 6, 'https://www.facebook.com/artt.thana/', '2021-06-15', '2'),
(10, 'ทดสอบข่าวสารทั่วไป 8', 'ทดสอบข่าวสารทั่วไป 8', 'news8.jpg', 6, 'https://www.facebook.com/artt.thana/', '2021-06-16', '2'),
(11, 'ทดสอบข่าวสารทั่วไป 9', 'ทดสอบข่าวสารทั่วไป 9', 'news9.jpg', 6, 'https://www.facebook.com/artt.thana/', '2021-06-17', '2'),
(12, 'ทดสอบข่าวสารทั่วไป 10', 'ทดสอบข่าวสารทั่วไป 10', 'news10.jpg', 6, 'https://www.facebook.com/artt.thana/', '2021-06-18', '2'),
(13, 'ทดสอบข่าวสารกิจกรรม 11', 'ทดสอบข่าวสารกิจกรรม 11', 'news11.jpg', 6, 'https://www.facebook.com/artt.thana/', '2021-06-19', '3'),
(14, 'ทดสอบข่าวสารกิจกรรม 12', 'ทดสอบข่าวสารกิจกรรม 12', 'news12.jpg', 6, 'https://www.facebook.com/artt.thana/', '2021-06-20', '3'),
(15, 'ทดสอบข่าวสารกิจกรรม 13', 'ทดสอบข่าวสารกิจกรรม 13', 'news13.jpg', 6, 'https://www.facebook.com/artt.thana/', '2021-06-21', '3'),
(16, 'ทดสอบข่าวสารกิจกรรม 14', 'ทดสอบข่าวสารกิจกรรม 14', 'news14.jpg', 6, 'https://www.facebook.com/artt.thana/', '2021-06-22', '3'),
(17, 'ทดสอบข่าวสารกิจกรรม 15', 'ทดสอบข่าวสารกิจกรรม 15', 'news15.jpg', 6, 'https://www.facebook.com/artt.thana/', '2021-06-23', '3');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `pa_id` varchar(13) NOT NULL,
  `pa_name` varchar(100) NOT NULL,
  `pa_address` text NOT NULL,
  `pa_tel` varchar(10) NOT NULL,
  `pa_relation` varchar(20) NOT NULL,
  `pa_metier` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`pa_id`, `pa_name`, `pa_address`, `pa_tel`, `pa_relation`, `pa_metier`) VALUES
('1011121012127', 'จันทร์ คงทน', '         -         ', '0836544047', 'ป้า', 'ชาวสวน'),
('1216680568524', 'หมาย ชุมแสง', '-', '0852145021', 'พ่อ', 'ค้าขาย'),
('1850162014009', 'ดวงใจ สิทธิใส', '-', '0622915584', 'แม่', 'ค้าขาย'),
('6666', '', '', '', '', ''),
('9393886874134', 'ทองใบ คงเคน', '   10/1 หมู่ 3   ', '0622915587', 'ย่า', 'ทำนา'),
('9999', 'bigparent', '564', '55555', 'test', 'นายจ้าง');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_pic` varchar(200) NOT NULL,
  `p_detail` text NOT NULL,
  `s_username` varchar(13) NOT NULL,
  `t_id` tinyint(4) NOT NULL,
  `p_year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`p_id`, `p_name`, `p_pic`, `p_detail`, `s_username`, `t_id`, `p_year`) VALUES
(1, 'การแข่งขันทักษะ การสร้างเว็บไซต์', 'เกียรติบัตร_1.jpg', 'การแข่งขันทักษะ การสร้างเว็บไซต์ ได้รางวัลเหรียณทอง ณ จังหวัด เชียงใหม่', '4024', 6, '2564'),
(7, 'asdasd', '', 'qweqweqwe', '4001', 6, '2564');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `po_id` tinyint(4) NOT NULL,
  `po_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`po_id`, `po_name`) VALUES
(1, 'หัวหน้าแผนกคอมพิวเตอร์ธุรกิจ'),
(2, 'หัวหน้าแผนกอิเล็กทรอนิค'),
(7, 'หัวหน้าแผนกยานยนต์');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_username` varchar(13) NOT NULL,
  `s_password` varchar(20) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_idcard` varchar(13) NOT NULL,
  `s_address` text NOT NULL,
  `s_tel` varchar(10) NOT NULL,
  `s_email` varchar(50) NOT NULL,
  `s_year` varchar(4) NOT NULL,
  `s_hbd` date NOT NULL,
  `s_brethren` int(11) NOT NULL,
  `st_id` char(1) NOT NULL,
  `s_child` varchar(2) NOT NULL,
  `class_id` int(11) NOT NULL,
  `f_id` varchar(13) NOT NULL,
  `m_id` varchar(13) NOT NULL,
  `pa_id` varchar(13) NOT NULL,
  `s_pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_username`, `s_password`, `s_name`, `s_idcard`, `s_address`, `s_tel`, `s_email`, `s_year`, `s_hbd`, `s_brethren`, `st_id`, `s_child`, `class_id`, `f_id`, `m_id`, `pa_id`, `s_pic`) VALUES
('4001', '1234', 'กานดา สิทธิใส', '1200102320110', '-', '0836155201', 'kanda.@gmail.com', '2563', '2011-08-13', 1, '1', '1', 12, '1500162014009', '1850162014009', '1850162014009', 'IMG_3714.JPG'),
('4002', '1234', 'นายสุทธิกร ชุมแสง', '4704407418041', '-', '0839638520', 'ss.@gmail.com', '2563', '2011-08-19', 1, '1', '1', 3, '1216680568524', '5633520011455', '1216680568524', ''),
('4024', '1234', 'นฤมล ตาดี', '1600100626222', '10/1 หมู่ 3', '0622915580', 'jalove.@gmail.com', '2563', '2011-08-06', 1, '1', '1', 1, '2282971975031', '9292673124324', '9393886874134', 'IMG_3874.jpg'),
('4025', '1234', 'มน คงทน', '1585621410236', '-', '0633325809', 'kong.@gmail.com', '2563', '2011-07-20', 1, '1', '1', 1, '1011121012124', '1011121012125', '1011121012127', 'IMG_3675.JPG'),
('artt', '5555', 'artt handsome', '5466843131', '564', '0697651387', 'tanawatdoungtau2013@gmail.com', '2563', '2011-08-19', 2, '1', '1', 12, '123456', '456789', '9999', 'cat1.jpg'),
('jj', '1234', 'jj bar', '768453487', '564', '0968786556', 'asdasd@gmail.com', '2563', '2011-08-19', 2, '1', '1', 12, '123456', '456789', '9999', 'dog1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` tinyint(4) NOT NULL,
  `t_username` varchar(20) NOT NULL,
  `t_password` varchar(20) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `t_address` varchar(300) NOT NULL,
  `t_tel` varchar(10) NOT NULL,
  `t_email` varchar(30) NOT NULL,
  `t_year` varchar(4) NOT NULL,
  `t_end` varchar(50) NOT NULL,
  `t_educa` varchar(50) NOT NULL,
  `t_pic` varchar(200) NOT NULL,
  `po_id` tinyint(4) NOT NULL,
  `b_id` tinyint(4) NOT NULL,
  `t_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_username`, `t_password`, `t_name`, `t_address`, `t_tel`, `t_email`, `t_year`, `t_end`, `t_educa`, `t_pic`, `po_id`, `b_id`, `t_status`) VALUES
(2, 'admin2', '0613349860', 'สมหมาย จิตผ่อง', '10/1', '0613349860', 'jalove.gujana@gmail.com', '2562', 'มหาวิทยาลัยราชภัฏเพชรบูรณ์', 'ปริญญาตรี เอก เทคโนโลยีสารสนเทศและการสื่อสาร', 'IMG_3485.JPG', 7, 1, 'ผ'),
(4, 'wasna', '04062538', 'วาสนา จันทร์ดี', '04', '0613349860', 'jalove.gujana@gmail.com', '2562', 'มหาวิทยาลัยราชภัฏเพชรบูรณ์', 'ปริญญาตรี เอก เทคโนโลยีสารสนเทศและการสื่อสาร', '122081490_383973369302560_2873780214855242832_n.jpg', 1, 1, '2'),
(5, 'admin', '1234', 'นายจิรกฤต คงเคน', '10/1', '0622915580', 'jirakit.kong@pcru.ac.th', '2563', 'มหาวิทยาลัยราชภัฏเพชรบูรณ์', 'ปริญญาตรี เอก เทคโนโลยีสารสนเทศและการสื่อสาร', '32147719_2082956118654351_1643928380703244288_o.jpg', 1, 1, '1'),
(6, 'long', '1234', 'ฉลอง พงษ์โอสถ', '-', '0811145787', 'long.@gmail.com', '2557', 'มหาวิทยาลัยราชภัฏเพชรบูรณ์', 'ปริญญาตรี เอก เทคโนโลยีสารสนเทศและการสื่อสาร', 'IMG_3673.JPG', 1, 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `time_id` tinyint(4) NOT NULL,
  `time_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `time_name`) VALUES
(1, '8.50 น. - 11.50 น.'),
(2, '12.50 น. - 15.50 น.'),
(3, '12.50 น. - 13.50 น.'),
(4, '13.50 น. - 15.50 น.');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `y_id` tinyint(4) NOT NULL,
  `y_number` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`y_id`, `y_number`) VALUES
(1, '2564/1'),
(3, '2564/2'),
(4, '2563/2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`classroom_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `father`
--
ALTER TABLE `father`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`classroom_id`,`s_username`,`c_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `mathar`
--
ALTER TABLE `mathar`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`pa_id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `s_username` (`s_username`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_username`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `m_id` (`m_id`),
  ADD KEY `pa_id` (`pa_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`y_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `b_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `classroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `day_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `n_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `po_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `time_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `y_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `branch` (`b_id`);

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`s_username`) REFERENCES `student` (`s_username`),
  ADD CONSTRAINT `portfolio_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
