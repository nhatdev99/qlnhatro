-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 21, 2022 lúc 10:56 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlynhatro`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 0x313233);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `db_id` int(11) NOT NULL,
  `db_contract_id` int(11) NOT NULL,
  `db_elec` decimal(10,0) NOT NULL,
  `db_water` decimal(10,0) NOT NULL,
  `db_total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contract`
--

CREATE TABLE `contract` (
  `db_id` int(11) NOT NULL,
  `db_room_id` int(11) NOT NULL,
  `db_rent_time` date NOT NULL,
  `db_price` decimal(10,0) NOT NULL,
  `db_fullname` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `db_sdt` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `db_diachi` text COLLATE utf8_vietnamese_ci NOT NULL,
  `db_cccd` text COLLATE utf8_vietnamese_ci NOT NULL,
  `db_status` enum('1','2','3','') COLLATE utf8_vietnamese_ci NOT NULL COMMENT '1: Đang hiệu lực, 2: Đã hoàn thành, 3: Đã hủy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `contract`
--

INSERT INTO `contract` (`db_id`, `db_room_id`, `db_rent_time`, `db_price`, `db_fullname`, `db_sdt`, `db_diachi`, `db_cccd`, `db_status`) VALUES
(14, 36, '2022-02-24', '1000000', 'Ngô Duy Hưng', '0151351841', 'Huế', '125129858192', '2'),
(15, 40, '2021-12-11', '1600000', 'Ngô Văn Hải Trường', '0388549606', 'Bình An, THăng Bình, Quảng Nam', '125125712956', '3'),
(16, 39, '2022-04-13', '1000000', 'Thanh Nhật', '1258129501', 'Quảng Nam', '125192571295', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachi`
--

CREATE TABLE `diachi` (
  `db_id` int(11) NOT NULL,
  `db_kv` int(11) NOT NULL,
  `db_diachi` text COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `diachi`
--

INSERT INTO `diachi` (`db_id`, `db_kv`, `db_diachi`) VALUES
(11, 14, '80/37 Lê Hữu Trác'),
(12, 14, '37 Lương Thế Vinh'),
(13, 17, '21/49 Chế Lan Viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuvuc`
--

CREATE TABLE `khuvuc` (
  `db_id` int(11) NOT NULL,
  `db_khuvuc` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khuvuc`
--

INSERT INTO `khuvuc` (`db_id`, `db_khuvuc`) VALUES
(14, 'An Hải Đông'),
(17, 'Bắc Mỹ An'),
(18, 'An Hải Bắc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `db_id` int(11) NOT NULL,
  `db_sophong` int(11) NOT NULL,
  `db_dc_id` int(11) NOT NULL,
  `db_price` decimal(10,0) NOT NULL,
  `db_status` enum('1','2','3') COLLATE utf8_vietnamese_ci NOT NULL COMMENT '1: Còn trống, 2: Đang cho thuê, 3: Đang sửa chữa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`db_id`, `db_sophong`, `db_dc_id`, `db_price`, `db_status`) VALUES
(24, 1, 11, '1000000', '2'),
(25, 2, 11, '1000000', '1'),
(26, 3, 11, '1000000', '1'),
(27, 4, 11, '1000000', '1'),
(28, 5, 11, '1000000', '1'),
(29, 6, 11, '1000000', '1'),
(30, 7, 11, '1000000', '2'),
(31, 8, 11, '1000000', '1'),
(32, 1, 12, '1400000', '1'),
(33, 2, 12, '1400000', '1'),
(34, 3, 12, '1400000', '1'),
(35, 4, 12, '1400000', '1'),
(36, 5, 12, '1400000', '2'),
(37, 1, 13, '1000000', '1'),
(38, 2, 13, '1000000', '1'),
(39, 3, 13, '1000000', '2'),
(40, 4, 13, '1000000', '2'),
(41, 5, 13, '1000000', '1'),
(42, 6, 13, '1000000', '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`db_id`),
  ADD KEY `db_rent_details_id` (`db_contract_id`);

--
-- Chỉ mục cho bảng `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`db_id`),
  ADD KEY `db_rent_users_id` (`db_room_id`),
  ADD KEY `db_rent_users_id_2` (`db_room_id`);

--
-- Chỉ mục cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD PRIMARY KEY (`db_id`),
  ADD KEY `db_kv` (`db_kv`);

--
-- Chỉ mục cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  ADD PRIMARY KEY (`db_id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`db_id`),
  ADD KEY `db_kv_id` (`db_dc_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `db_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contract`
--
ALTER TABLE `contract`
  MODIFY `db_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `diachi`
--
ALTER TABLE `diachi`
  MODIFY `db_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  MODIFY `db_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `db_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`db_room_id`) REFERENCES `rooms` (`db_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD CONSTRAINT `diachi_ibfk_1` FOREIGN KEY (`db_kv`) REFERENCES `khuvuc` (`db_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`db_dc_id`) REFERENCES `diachi` (`db_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
