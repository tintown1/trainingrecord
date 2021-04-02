-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 04:02 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trainingrecord`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID_tbl` int(11) NOT NULL,
  `CategoryName_tbl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID_tbl`, `CategoryName_tbl`) VALUES
(1, 'อบรมภายนอก'),
(2, 'อบรมภายใน'),
(3, 'OJT');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `certificateID` int(11) NOT NULL,
  `certificateName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`certificateID`, `certificateName`) VALUES
(1, 'มี'),
(2, 'ไม่มี');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentID_tbl` int(11) NOT NULL,
  `departmentName_tbl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID_tbl`, `departmentName_tbl`) VALUES
(1, 'กองบริหารบุคคล'),
(2, 'กองพัฒนาบุคคล'),
(3, 'กองการเงินและบัญชี'),
(4, 'กองพัสดุและคลังพัสดุ'),
(5, 'กองพัฒนาระบบดิจิทัล'),
(6, 'กองพัฒนาและจัดการความรู้องค์กร'),
(7, 'กองกลาง'),
(8, 'กองซ่อมบำรุง'),
(9, 'กองกฏหมาย'),
(10, 'กองอะไร');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmpID_tbl` int(11) NOT NULL,
  `EmpFirstName_tbl` varchar(255) NOT NULL,
  `EmpLastName_tbl` varchar(255) NOT NULL,
  `EmpStartDate_tbl` date NOT NULL,
  `Empdepartment_tbl` varchar(255) NOT NULL,
  `EmpEmail_tbl` varchar(255) NOT NULL,
  `EmpStatus_tbl` int(1) NOT NULL,
  `EmpPassword_tbl` varchar(255) NOT NULL,
  `EmpLv` varchar(10) NOT NULL,
  `EmpPosition_tbl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmpID_tbl`, `EmpFirstName_tbl`, `EmpLastName_tbl`, `EmpStartDate_tbl`, `Empdepartment_tbl`, `EmpEmail_tbl`, `EmpStatus_tbl`, `EmpPassword_tbl`, `EmpLv`, `EmpPosition_tbl`) VALUES
(35, 'admin2', 'เทสจ้า', '2021-03-02', '1', 'admin@gmail.com', 1, '12345', 'Admin', '1'),
(36, 'Pobtham', 'Srihera', '2021-03-04', '1', 'bom@gmail.com', 1, '12345', 'Member', '2');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`p_id`, `p_name`) VALUES
(1, 'นักเทคโนโลยีสารสนเทศ'),
(2, 'พนักงานธุรการ'),
(3, 'เจ้าหน้าที่สารสนเทศ'),
(4, 'นักสารสนเทศ'),
(5, 'ผอ. กจค.'),
(6, 'เจ้าหน้าที่เทคโนโลยีสารสนเทศ'),
(7, 'ลูกจ้างทั่วไป'),
(8, 'ร.ผอ. สทส./ ผอ.กพท.'),
(9, 'นักเทคโนโลยีสารสนเทศอาวุโส');

-- --------------------------------------------------------

--
-- Table structure for table `trainingtbl`
--

CREATE TABLE `trainingtbl` (
  `trainingID_tbl` int(11) NOT NULL,
  `trainingEmpID_tbl` int(255) NOT NULL,
  `trainingStartDate_tbl` date NOT NULL,
  `trainingEndDate_tbl` date NOT NULL,
  `trainingCourse_tbl` text NOT NULL,
  `trainingCategory_tbl` varchar(255) NOT NULL,
  `trainingCertificate_tbl` varchar(255) NOT NULL,
  `trainingPDF_tbl` varchar(255) NOT NULL,
  `location_tbl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainingtbl`
--

INSERT INTO `trainingtbl` (`trainingID_tbl`, `trainingEmpID_tbl`, `trainingStartDate_tbl`, `trainingEndDate_tbl`, `trainingCourse_tbl`, `trainingCategory_tbl`, `trainingCertificate_tbl`, `trainingPDF_tbl`, `location_tbl`) VALUES
(34, 36, '2021-03-04', '2021-03-28', 'เคล็ดลับการเป็น DCC มือโปรตามระบบ ISO 9001:2015', '1', 'ไม่มี', '', 'บริษัท เคเอ็นซี เทรนนิ่ง เซ็นเตอร์ จำกัด'),
(35, 36, '2021-03-04', '2021-03-27', 'การปฏิบัติงานในคลังสินค้าและการควบคุมสินค้าเพื่อลดต้นทุนและป้องกัน', '3', 'ไม่มี', '', 'บริษัท เคเอ็นซี เทรนนิ่ง เซ็นเตอร์ จำกัด');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID_tbl`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`certificateID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentID_tbl`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmpID_tbl`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `trainingtbl`
--
ALTER TABLE `trainingtbl`
  ADD PRIMARY KEY (`trainingID_tbl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID_tbl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `certificateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentID_tbl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmpID_tbl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trainingtbl`
--
ALTER TABLE `trainingtbl`
  MODIFY `trainingID_tbl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
