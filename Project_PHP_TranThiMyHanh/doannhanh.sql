-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 09, 2025 lúc 08:05 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doannhanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Bánh Buger'),
(2, 'Gà Rán'),
(3, 'Đồ uống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `IDProduct` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `Image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`IDProduct`, `ProductName`, `Price`, `Image`, `category_id`) VALUES
(1, 'Buger Bò', 38000, 'img_67f6ad1266030.jpg', 1),
(2, 'Buger Gà Phô Mai', 69000, 'bo_pho_mai.png', 1),
(4, 'Buger Big Mac', 70000, 'bigmac_bb.png', 1),
(5, 'Buger Bò Hoàng Gia', 75000, 'bo_hoang_gia.jpg', 1),
(7, 'Buger Bò Phô Mai', 55000, 'bo_pho_mai.png', 1),
(8, 'Buger Gà Nhỏ Mayo', 40000, 'chickbg.png', 1),
(9, 'Buger Gà Phô Mai', 60000, 'ga_pho_mai.png', 1),
(10, 'Buger Phi Lê Cá', 55000, 'phi_le_ca.png', 1),
(11, 'Buger Xúc Xích', 40000, 'xuc_xich.jpg', 1),
(12, '1 Miếng Gà', 37000, '1_mieng_ga.jpg', 2),
(13, '3 Miếng Gà Rán', 103000, '3_mieng_ga.jpg', 2),
(14, '5 Miếng Gà Rán', 176000, '5_mieng_ga.jpg', 2),
(15, 'Gà Viên Vui Vẻ', 69000, 'ga_vien_vui_ve.jpg', 2),
(16, '6 Miếng Cánh Gà', 125000, '6_mieng_canh.jpg', 2),
(19, 'MiLo', 15000, 'img_67f6b69150087.png', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `IDRole` int(11) NOT NULL,
  `RoleName` varchar(50) NOT NULL,
  `Note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`IDRole`, `RoleName`, `Note`) VALUES
(1, 'Admin', 'Toàn quyền trên CSDL'),
(2, 'Nhân viên', 'Quản lý tài khoản người dùng'),
(3, 'Thành viên', 'Người dùng xem, tìm kiếm SP');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `IDUser` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `IDRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`IDUser`, `UserName`, `Password`, `IDRole`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1),
(2, 'nhanvien', '202cb962ac59075b964b07152d234b70', 2),
(3, 'hanh', '202cb962ac59075b964b07152d234b70', 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `category_id_2` (`category_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`IDProduct`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`IDRole`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDUser`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD KEY `IDRole` (`IDRole`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `IDProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `IDRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `IDUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`IDRole`) REFERENCES `role` (`IDRole`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
