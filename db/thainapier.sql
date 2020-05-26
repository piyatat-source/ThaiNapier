-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2020 at 03:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thainapier`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `loginId` int(4) NOT NULL,
  `loginUsername` varchar(60) NOT NULL,
  `loginPassword` varchar(160) NOT NULL,
  `userStatus` set('member','admin') NOT NULL DEFAULT 'member',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`loginId`, `loginUsername`, `loginPassword`, `userStatus`, `date`) VALUES
(37, 'withan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'member', '2020-05-24'),
(39, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '2020-05-24'),
(50, 'prompat', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'member', '2020-05-25'),
(51, 'piyatat', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'member', '2020-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_members`
--

CREATE TABLE `tb_members` (
  `memberId` int(4) NOT NULL,
  `loginId` int(4) NOT NULL,
  `memberFirstname` varchar(125) NOT NULL,
  `memberLastname` varchar(125) NOT NULL,
  `memberTel` varchar(15) NOT NULL,
  `memberAddress` varchar(455) NOT NULL,
  `memberProvince` varchar(125) NOT NULL,
  `memberPostCode` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_members`
--

INSERT INTO `tb_members` (`memberId`, `loginId`, `memberFirstname`, `memberLastname`, `memberTel`, `memberAddress`, `memberProvince`, `memberPostCode`) VALUES
(23, 37, 'วิธาน', 'วงษาบุตร', '0898182239', 'หอปิยากร', 'หนองคาย', '43000'),
(29, 50, 'พรหมพัฒน์', 'ชาญโชคประเสริฐ', '0945171465', '8/4 ถนนชวนชื่น  ต.ในเมือง อ.เมือง', 'ขอนแก่น', '40000'),
(30, 51, 'ปิยทัศน์', 'นวกิจวัฒนา', '0622812737', '300/11 ม.4 ซ.ต้นคูณ ต.หนองขอนกว้าง อ.เมือง ', 'อุดรธานี', '41000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_registers`
--

CREATE TABLE `tb_registers` (
  `registerId` int(4) NOT NULL,
  `loginId` int(4) NOT NULL,
  `farmName` varchar(125) NOT NULL,
  `farmType` set('small','large') NOT NULL,
  `farmArea` varchar(100) NOT NULL,
  `farmHouseNo` varchar(100) NOT NULL,
  `farmVillageNo` varchar(100) NOT NULL,
  `farmVillage` varchar(100) NOT NULL,
  `farmAlley` varchar(100) NOT NULL,
  `farmRoad` varchar(100) NOT NULL,
  `farmPostNo` varchar(10) NOT NULL,
  `farmSubDistric` varchar(50) NOT NULL,
  `farmDistrict` varchar(125) NOT NULL,
  `farmProvince` varchar(125) NOT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lng` varchar(50) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_registers`
--

INSERT INTO `tb_registers` (`registerId`, `loginId`, `farmName`, `farmType`, `farmArea`, `farmHouseNo`, `farmVillageNo`, `farmVillage`, `farmAlley`, `farmRoad`, `farmPostNo`, `farmSubDistric`, `farmDistrict`, `farmProvince`, `lat`, `lng`, `date`) VALUES
(73, 50, 'ไร่ประหยัด', 'small', '2-0-0', '8/4', '', '', '', 'ชวนชื่น', '40000', 'ในเมือง', 'เมือง', 'ขอนแก่น', '16.43929481701079', ' 102.82860995417363', '2020-05-24'),
(74, 51, 'ไร่วิเชียร', 'small', '5-2-20', '300/11', '4', 'ณัฐการ', 'ต้นคูณ', 'อุดร-สกล', '41000', 'หนองขอนกว้าง', 'เมือง', 'อุดรธานี', '17.346926395656904', ' 102.8904089469134', '2020-05-24'),
(75, 51, 'ไร่ปิยทัศน์', 'small', '2-1-10', '144/9', '1', 'ณัฐการ', '10', 'อุดร-สกล', '41000', 'หนองขอนกว้าง', 'เมือง', 'อุดรธานี', '17.170295443232888', ' 103.13897651998109', '2020-05-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`loginId`);

--
-- Indexes for table `tb_members`
--
ALTER TABLE `tb_members`
  ADD PRIMARY KEY (`memberId`);

--
-- Indexes for table `tb_registers`
--
ALTER TABLE `tb_registers`
  ADD PRIMARY KEY (`registerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `loginId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tb_members`
--
ALTER TABLE `tb_members`
  MODIFY `memberId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_registers`
--
ALTER TABLE `tb_registers`
  MODIFY `registerId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
