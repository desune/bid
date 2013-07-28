-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2012 at 06:48 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bid`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE IF NOT EXISTS `auction` (
  `auctionID` int(11) NOT NULL AUTO_INCREMENT,
  `itemID` int(11) NOT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `type` int(11) NOT NULL,
  `minprice` int(11) NOT NULL,
  `end` tinyint(1) NOT NULL DEFAULT '0',
  `allow` tinyint(1) NOT NULL DEFAULT '0',
  `started` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`auctionID`),
  KEY `itemID` (`itemID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`auctionID`, `itemID`, `startdate`, `enddate`, `type`, `minprice`, `end`, `allow`, `started`) VALUES
(1, 8, '2011-10-19 23:43:24', '2013-01-08 00:13:24', 1, 2000, 0, 1, 1),
(3, 10, '2012-12-06 00:00:00', '2012-12-11 00:00:00', 1, 3000, 0, 1, 1),
(4, 11, '2012-12-05 04:10:13', '2012-12-19 18:45:45', 1, 10000, 0, 1, 1),
(5, 13, '2012-12-02 03:12:11', '2012-12-22 00:00:00', 2, 20000, 0, 1, 1),
(6, 21, '2012-12-01 02:07:08', '2013-01-09 09:22:23', 3, 20000, 0, 0, 0),
(7, 20, '2012-12-06 00:03:03', '2013-01-07 03:06:10', 4, 30000, 0, 0, 0),
(8, 22, '2012-12-05 09:11:18', '2013-01-06 00:18:15', 4, 50000, 0, 0, 0),
(9, 23, '2012-12-01 11:24:32', '2013-01-01 04:14:16', 4, 30000, 0, 0, 0),
(10, 24, '2012-12-01 00:00:00', '2013-01-06 00:00:00', 4, 20000, 0, 0, 0),
(11, 25, '2012-12-06 00:00:00', '2013-01-23 00:00:00', 4, 30000, 0, 0, 0),
(12, 26, '2012-12-06 00:00:00', '2013-01-08 00:00:00', 4, 40000, 0, 0, 0),
(13, 27, '2012-12-04 09:21:33', '2013-01-18 00:00:00', 4, 50000, 0, 0, 0),
(14, 28, '2012-12-05 00:00:00', '2012-12-19 00:00:00', 4, 60000, 0, 0, 0),
(15, 29, '2012-12-03 00:00:00', '2012-12-17 00:00:00', 4, 100000, 0, 0, 0),
(16, 30, '2012-12-12 00:00:00', '2012-12-20 00:00:00', 4, 200000, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE IF NOT EXISTS `bid` (
  `bidID` int(11) NOT NULL AUTO_INCREMENT,
  `auctionID` int(11) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`bidID`),
  KEY `auctionID` (`auctionID`,`userID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`bidID`, `auctionID`, `userID`, `price`, `time`) VALUES
(1, 1, 'desune', 10000, '2012-12-10 00:00:00'),
(2, 3, 'desune', 10000, '2012-12-10 05:14:07'),
(3, 4, 'hacker', 15000, '2012-12-10 18:44:43'),
(4, 4, 'admin', 20000, '2012-12-10 18:14:55'),
(6, 4, 'desune', 30000, '2012-12-11 09:28:20'),
(7, 3, 'tung3a', 20000, '2012-12-12 00:00:00'),
(8, 3, 'hacker', 5000, '2012-12-09 00:00:00'),
(9, 5, 'desune', 50000, '2012-12-12 00:00:00'),
(10, 5, 'hacker', 55000, '2012-12-12 00:09:06'),
(11, 1, 'desune', 30000, '2012-12-12 14:43:30'),
(12, 4, 'desune', 40000, '2012-12-12 16:41:45'),
(13, 4, 'desune', 40000, '2012-12-12 16:41:57'),
(14, 1, 'admin', 50000, '2012-12-12 16:50:24'),
(15, 1, 'desune', 60000, '2012-12-12 17:19:58'),
(16, 9, 'vietto', 100000, '2012-12-13 01:08:08'),
(17, 10, 'vietto', 100000, '2012-12-13 02:06:08'),
(18, 6, 'vietto', 100000, '2012-12-13 00:00:00'),
(19, 7, 'vietto', 100000, '2012-12-13 00:00:00'),
(20, 8, 'vietto', 100000, '2012-12-13 02:02:07'),
(21, 11, 'vietto', 100000, '2012-12-13 01:02:04'),
(22, 12, 'vietto', 100000, '2012-12-13 00:03:03'),
(23, 13, 'vietto', 100000, '2012-12-13 01:02:03'),
(24, 14, 'vietto', 100000, '2012-12-13 00:03:01'),
(25, 15, 'vietto', 100000, '2012-12-13 00:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `skey` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`skey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`skey`, `amount`, `valid`) VALUES
('25f9e794323b453885f5181f1b624d0b', 200000, 0),
('d41d8cd98f00b204e9800998ecf8427e', 1000000, 1),
('f11eed37d737eb8929d13ab8ff1434e4', 1000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `photo` varchar(10000) NOT NULL,
  `detail` varchar(10000) DEFAULT NULL,
  `passwd` varchar(100) NOT NULL,
  `itemTypeID` int(11) NOT NULL,
  `admincheck` tinyint(1) DEFAULT '0',
  `sold` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemID`),
  KEY `userID` (`userID`),
  KEY `ItemTypeID` (`itemTypeID`),
  KEY `ItemTypeID_2` (`itemTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `userID`, `date`, `photo`, `detail`, `passwd`, `itemTypeID`, `admincheck`, `sold`) VALUES
(1, 'admin', '2012-12-01 00:00:00', 'Public/images/daugia/samsung.jpg', 'Mẫu smartphone cao cấp mới của Samsung <a href="Application/views/samsung.php">Chi tiết</a>', 'f11eed37d737eb8929d13ab8ff1434e4', 3, 0, 0),
(8, 'admin', '2011-10-18 00:02:06', 'Public/images/1.jpeg', 'Laptop hiện đại ,cấu hình cao giá cả phải chăng phù hợp với đối tượng hs,sv', 'f11eed37d737eb8929d13ab8ff1434e4', 1, 0, 0),
(10, 'admin', '2011-10-18 00:14:51', 'http://localhost/bid/Public/images/3.jpeg', 'Máy tính cổ đại từng được pitago sử dụng,sau này bán lại cho steve jobs\r\n', 'f11eed37d737eb8929d13ab8ff1434e4', 2, 0, 0),
(11, 'admin', '2011-10-18 00:18:07', 'http://localhost/bid/Public/images/4.jpeg', 'Desk top cấu hình ấn tượng chip core i9,ram 1tera....\r\n', 'f11eed37d737eb8929d13ab8ff1434e4', 2, 0, 0),
(12, 'admin', '2011-10-18 00:19:01', 'http://localhost/bid/Public/images/5.jpeg', 'Chiếc điện thoại di động đầu tiên trên thế giới\r\n', 'f11eed37d737eb8929d13ab8ff1434e4', 3, 0, 0),
(13, 'tung3a', '2011-10-18 02:11:38', 'Public/images/6.jpeg', 'Iphone4', 'f11eed37d737eb8929d13ab8ff1434e4', 3, 0, 0),
(15, 'desune', '2012-12-01 12:27:26', 'http://localhost/bid/Public/images/daugia/samsung-galaxy-siii-mau-do-17.jpg', 'Điện thoại SamSung Galaxy S3 16GB màu Đỏ', 'desune', 3, 0, 0),
(16, 'desune', '2012-12-01 00:00:00', 'http://localhost/bid/Public/images/daugia/apple-ipad-mini-16gb-black-7.jpg', 'Máy tính bảng Apple iPad Mini 16GB Wifi Mẫu iPad màn hình nhỏ gây ấn tượng mạnh về cân nặng nhẹ, cầm dễ bằng một tay lâu không gây mỏi cùng tốc độ hoạt động nhanh và mượt. ', 'desune', 3, 0, 0),
(17, 'desune', '2012-12-01 06:15:15', 'http://localhost/bid/Public/images/daugia/samsung-galaxy-s-duos-s7562-mau-trang.jpg', 'Điện thoại Samsung Galaxy S Duos S7562. Chiếc smartphone hai sim đầu tiên trong dòng Galaxy S có mặt chính thức tại Việt Nam trong tháng 10.', 'desune', 3, 0, 0),
(18, 'desune', '2012-12-01 13:34:34', 'http://localhost/bid/Public/images/daugia/big_30274_F4A803AF86B026FA8E1D12FF3705F683.jpg', 'Chuột quang Bluetooth Navi 905BT Genius', 'desune', 4, 0, 0),
(19, 'desune', '2012-12-01 19:49:49', 'http://localhost/bid/Public/images/daugia/1208002_MICROTEK-MT-850.jpg', 'Loa vi tính Microtek MT 850', 'desune', 4, 0, 0),
(20, 'desune', '2012-12-01 07:17:19', 'http://localhost/bid/Public/images/daugia/20121207223759anh to.jpg', 'Usb PNY Transformer new 8Gb', 'desune', 4, 0, 0),
(21, 'desune', '2012-12-01 05:11:12', 'http://localhost/bid/Public/images/daugia/20121207230344anh to.jpg', 'Nokia 100 là chiếc điện thoại hoàn hảo cho những ai tìm kiếm sự bền bỉ và tính đơn giản cũng như giá cả hợp lý khi gọi điện và gửi tin nhắn văn bản.', 'desune', 3, 0, 0),
(22, 'desune', '2012-12-11 03:05:07', 'http://localhost/bid/Public/images/daugia/20121210232543anh to.jpg', 'Tai nghe Philips SHE2643', '1', 4, 0, 0),
(23, 'desune', '2012-12-11 00:00:00', 'http://localhost/bid/Public/images/daugia/20121021225755anh to-0.jpg', 'USB 4GB JETFLASH 200', '1', 4, 0, 0),
(24, 'desune', '2012-12-11 00:00:00', 'http://localhost/bid/Public/images/daugia/20121018231751anh to-0-0-0.jpg', 'ĐẾ TẢN NHIỆT COOLER MASTER - C3', '1', 4, 0, 0),
(25, 'desune', '2012-12-11 00:01:00', 'http://localhost/bid/Public/images/daugia/20121208231023anh to.jpg', 'Chuột máy tính Logitech M185', '1', 4, 0, 0),
(26, 'desune', '2012-12-10 00:01:02', 'http://localhost/bid/Public/images/daugia/20120924222714anh to-0-0-0-0-0.jpg', 'USB PNY 8Gb Flower', '1', 4, 0, 0),
(27, 'desune', '2012-12-10 00:01:01', 'http://localhost/bid/Public/images/daugia/20121206234646anh to.jpg', 'Thiết bị kết nối 3G DLINK - DWM156', '1', 4, 0, 0),
(28, 'desune', '2012-12-10 05:06:10', 'http://localhost/bid/Public/images/daugia/20121206234327anh to.jpg', 'Tản nhiệt Cooler Master L1', '1', 4, 0, 0),
(29, 'desune', '2012-12-11 16:51:48', 'http://localhost/bid/Public/images/daugia/20121022234958anh to-0-0-0-0.jpg', 'USB Sony 8GB Click (USM8GP) White', '1', 4, 0, 0),
(30, 'desune', '2012-12-10 08:29:28', 'http://localhost/bid/Public/images/daugia/20121205221450anh to.jpg', 'Túi đựng máy tính xách tay 14 inch', '1', 4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `itemtype`
--

CREATE TABLE IF NOT EXISTS `itemtype` (
  `itemTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`itemTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `itemtype`
--

INSERT INTO `itemtype` (`itemTypeID`, `name`) VALUES
(1, 'Laptop'),
(2, 'Desktop'),
(3, 'Mobile phone'),
(4, 'Phu kien'),
(5, 'Dau An');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `amount` int(20) DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `passwd`, `admin`, `name`, `sex`, `email`, `birthday`, `phone`, `amount`, `deleted`) VALUES
('admin', 'a66abb5684c45962d887564f08346e8d', 1, 'Admin', 1, 'yeuemhangxom@gmail.com', '1990-01-01', 1689927800, 29800000, 0),
('desune', 'f846f875d99657bf4f201c1a4344abd2', 0, 'Nguyen Quy Dat', 1, 'dat@gmail.com', '2012-12-12', 2147483647, 960000, 0),
('fuckcuong', 'a66abb5684c45962d887564f08346e8d', 0, 'fuckcuong', 0, 'fuckcuong@gmail.com', '1991-10-23', 34454545, 0, 0),
('hacker', 'f11eed37d737eb8929d13ab8ff1434e4', 0, 'Hoang Van Cuong', 1, 'hoangCuong@gmail.com', '1990-01-01', 1689927800, 1500000, 0),
('tung3a', 'f11eed37d737eb8929d13ab8ff1434e4', 0, 'Nguyen Dang Luc', 1, 'yeuemhangxom@gmail.com', '2012-12-04', 1689927800, 1000, 0),
('vietto', '007956cfd41b3eae53e696d317250e60', 0, 'vietto', 1, 'viet@gmail.com', '2001-02-12', 2147483647, 100000000, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auction`
--
ALTER TABLE `auction`
  ADD CONSTRAINT `auction_ibfk_1` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`auctionID`) REFERENCES `auction` (`auctionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`itemTypeID`) REFERENCES `itemtype` (`itemTypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_3` FOREIGN KEY (`itemTypeID`) REFERENCES `itemtype` (`itemTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
