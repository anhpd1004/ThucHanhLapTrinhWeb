-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 07:42 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hd` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `ngaylaphd` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `id_kh` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `id_nv` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `ngaygiaohang` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `tongtien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id_hd`, `ngaylaphd`, `id_kh`, `id_nv`, `ngaygiaohang`, `tongtien`) VALUES
('HD0001', '2016-03-01', 'KH0001', 'NV0002', '2016-03-01', 0),
('HD0002', '2016-03-01', 'KH0002', 'NV0002', '2016-03-04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id_kh` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `tenkh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id_kh`, `tenkh`, `dienthoai`, `diachi`) VALUES
('KH0001', 'Hoàng Kim Oanh', '0912123456', 'Minh Khai - Hà Nội'),
('KH0002', 'Hoàng Hải Yến', '0912121234', 'Hoàng Mai - Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id_nv` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `tennv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id_nv`, `tennv`, `dienthoai`, `diachi`) VALUES
('NV0001', 'Nguyễn Thu Trang', '0195220206', 'Cầu Giấy - Hà Nội'),
('NV0002', 'Phạm Thanh Loan', '0904343456', 'Đống Đa - Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `tensanpham` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dongia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `tensanpham`, `dongia`) VALUES
('SP0001', 'Bánh gạo one one', 26000),
('SP0002', 'Bánh Tràng An vị sầu riêng', 34000),
('SP0003', 'Cà phê hòa tan loại 1', 97000),
('SP0004', 'Cà phê hòa tan loại 2', 76000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_kh`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
