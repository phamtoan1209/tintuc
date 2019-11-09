-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 04:20 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tanphu`
--

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `provinceid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`provinceid`, `name`, `type`, `slug`) VALUES
(1, 'Hà Nội', 'Thành Phố', 'ha-noi'),
(2, 'Hà Giang', 'Tỉnh', 'ha-giang'),
(4, 'Cao Bằng', 'Tỉnh', 'cao-bang'),
(6, 'Bắc Kạn', 'Tỉnh', 'bac-kan'),
(8, 'Tuyên Quang', 'Tỉnh', 'tuyen-quang'),
(10, 'Lào Cai', 'Tỉnh', 'lao-cai'),
(11, 'Điện Biên', 'Tỉnh', 'dien-bien'),
(12, 'Lai Châu', 'Tỉnh', 'lai-chau'),
(14, 'Sơn La', 'Tỉnh', 'son-la'),
(15, 'Yên Bái', 'Tỉnh', 'yen-bai'),
(17, 'Hòa Bình', 'Tỉnh', 'hoa-binh'),
(19, 'Thái Nguyên', 'Tỉnh', 'thai-nguyen'),
(20, 'Lạng Sơn', 'Tỉnh', 'lang-son'),
(22, 'Quảng Ninh', 'Tỉnh', 'quang-ninh'),
(24, 'Bắc Giang', 'Tỉnh', 'bac-giang'),
(25, 'Phú Thọ', 'Tỉnh', 'phu-tho'),
(26, 'Vĩnh Phúc', 'Tỉnh', 'vinh-phuc'),
(27, 'Bắc Ninh', 'Tỉnh', 'bac-ninh'),
(30, 'Hải Dương', 'Tỉnh', 'hai-duong'),
(31, 'Hải Phòng', 'Thành Phố', 'hai-phong'),
(33, 'Hưng Yên', 'Tỉnh', 'hung-yen'),
(34, 'Thái Bình', 'Tỉnh', 'thai-binh'),
(35, 'Hà Nam', 'Tỉnh', 'ha-nam'),
(36, 'Nam Định', 'Tỉnh', 'nam-dinh'),
(37, 'Ninh Bình', 'Tỉnh', 'ninh-binh'),
(38, 'Thanh Hóa', 'Tỉnh', 'thanh-hoa'),
(40, 'Nghệ An', 'Tỉnh', 'nghe-an'),
(42, 'Hà Tĩnh', 'Tỉnh', 'ha-tinh'),
(44, 'Quảng Bình', 'Tỉnh', 'quang-binh'),
(45, 'Quảng Trị', 'Tỉnh', 'quang-tri'),
(46, 'Thừa Thiên Huế', 'Tỉnh', 'thua-thien-hue'),
(48, 'Đà Nẵng', 'Thành Phố', 'da-nang'),
(49, 'Quảng Nam', 'Tỉnh', 'quang-nam'),
(51, 'Quảng Ngãi', 'Tỉnh', 'quang-ngai'),
(52, 'Bình Định', 'Tỉnh', 'binh-dinh'),
(54, 'Phú Yên', 'Tỉnh', 'phu-yen'),
(56, 'Khánh Hòa', 'Tỉnh', 'khanh-hoa'),
(58, 'Ninh Thuận', 'Tỉnh', 'ninh-thuan'),
(60, 'Bình Thuận', 'Tỉnh', 'binh-thuan'),
(62, 'Kon Tum', 'Tỉnh', 'kon-tum'),
(64, 'Gia Lai', 'Tỉnh', 'gia-lai'),
(66, 'Đắk Lắk', 'Tỉnh', 'dak-lak'),
(67, 'Đắk Nông', 'Tỉnh', 'dak-nong'),
(68, 'Lâm Đồng', 'Tỉnh', 'lam-dong'),
(70, 'Bình Phước', 'Tỉnh', 'binh-phuoc'),
(72, 'Tây Ninh', 'Tỉnh', 'tay-ninh'),
(74, 'Bình Dương', 'Tỉnh', 'binh-duong'),
(75, 'Đồng Nai', 'Tỉnh', 'dong-nai'),
(77, 'Bà Rịa - Vũng Tàu', 'Tỉnh', 'ba-ria-vung-tau'),
(79, 'Hồ Chí Minh', 'Thành Phố', 'ho-chi-minh'),
(80, 'Long An', 'Tỉnh', 'long-an'),
(82, 'Tiền Giang', 'Tỉnh', 'tien-giang'),
(83, 'Bến Tre', 'Tỉnh', 'ben-tre'),
(84, 'Trà Vinh', 'Tỉnh', 'tra-vinh'),
(86, 'Vĩnh Long', 'Tỉnh', 'vinh-long'),
(87, 'Đồng Tháp', 'Tỉnh', 'dong-thap'),
(89, 'An Giang', 'Tỉnh', 'an-giang'),
(91, 'Kiên Giang', 'Tỉnh', 'kien-giang'),
(92, 'Cần Thơ', 'Thành Phố', 'can-tho'),
(93, 'Hậu Giang', 'Tỉnh', 'hau-giang'),
(94, 'Sóc Trăng', 'Tỉnh', 'soc-trang'),
(95, 'Bạc Liêu', 'Tỉnh', 'bac-lieu'),
(96, 'Cà Mau', 'Tỉnh', 'ca-mau');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`provinceid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `provinceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
