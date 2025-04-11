-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2025 at 04:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bangiay`
--

-- --------------------------------------------------------

--
-- Table structure for table `categogy`
--

CREATE TABLE `categogy` (
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categogy`
--

INSERT INTO `categogy` (`category_id`, `name`) VALUES
(1, 'Giày thể thao'),
(2, 'Giày sneaker'),
(3, 'Giày nữ'),
(4, 'Giày nam');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `IDProduct` int(10) NOT NULL,
  `categogy_id` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Price` float NOT NULL,
  `Image` varchar(100) NOT NULL,
  `typeOfProduct` int(11) NOT NULL,
  `SellingPrice` double NOT NULL,
  `CostPrite` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`IDProduct`, `categogy_id`, `ProductName`, `Price`, `Image`, `typeOfProduct`, `SellingPrice`, `CostPrite`) VALUES
(1, 4, 'Giày nam', 899, 'view/img/nam1.jpg', -1878455808, 0, 0),
(19, 3, 'Giày nữ', 799, 'view/img/nu1.jpg', -1861875456, 0, 0),
(20, 4, 'Giày nam', 899000, 'view/img/nam1.jpg', -416320408, 0, 0),
(21, 3, 'Giày nữ', 799000, 'view/img/nu1.jpg', -349098390, 0, 0),
(22, 1, 'Giày thể thao', 499000, 'view/img/thethao1.jpg', -361732336, 0, 0),
(23, 2, 'Giày sneaker', 999000, 'view/img/sk1.jpg', -1794764800, 0, 0),
(24, 1, 'Giày thể thao', 499000, 'view/img/thethao2.jpg', -1794764796, 0, 0),
(25, 1, 'Giày thể thao', 999000, 'view/img/thethao4.jpg', -1878652416, 0, 0),
(26, 3, 'Giày nữ', 599000, 'view/img/nu2.jpg', -1878652416, 0, 0),
(27, 3, 'Giày nữ', 799000, 'view/img/nu3.jpg', -1878651648, 0, 0),
(28, 2, 'Giày sneaker', 699000, 'view/img/sk3.jpg', -1878651644, 0, 0),
(29, 2, 'Giày sneaker', 499000, 'view/img/sk4.jpg', -1861875456, 0, 0),
(30, 4, 'Giày nam', 999000, 'view/img/nam5.jpg', -1861875456, 0, 0),
(31, 4, 'Giày nam', 999000, 'view/img/nam3.jpg', -1794764800, 0, 0),
(32, 1, 'Giày thể thao', 999000, 'view/img/thethao6.jpg', -1878652416, 0, 0),
(33, 3, 'Giày nữ', 999000, 'view/img/nu4.jpg', -1861875456, 0, 0),
(34, 4, 'Giày nam', 999000, 'view/img/nam6.jpg', -2147483647, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `IDRole` int(11) NOT NULL,
  `RoleName` varchar(255) NOT NULL,
  `Note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`IDRole`, `RoleName`, `Note`) VALUES
(1, 'Quản lý', 'người thêm, xóa, sửa tài khảon'),
(2, 'Nhân viên', 'người quản lý người dùng'),
(3, 'Thành viên', 'xem và tìm sản phẩm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IDUser` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `IDRole` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IDUser`, `UserName`, `IDRole`, `Password`) VALUES
(1, 'QuanLy', 1, '202cb962ac59075b964b07152d234b70'),
(2, 'NhanVien', 2, '123'),
(3, 'ThanhVien', 3, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categogy`
--
ALTER TABLE `categogy`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`IDProduct`),
  ADD KEY `Category_Product` (`categogy_id`) USING BTREE;

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`IDRole`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDUser`),
  ADD KEY `IDRole` (`IDRole`),
  ADD KEY `IDRole_2` (`IDRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categogy`
--
ALTER TABLE `categogy`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `IDProduct` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categogy_id`) REFERENCES `categogy` (`category_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`IDRole`) REFERENCES `role` (`IDRole`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
