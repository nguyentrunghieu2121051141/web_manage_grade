-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2024 at 06:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btl_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ho_dem` varchar(50) NOT NULL,
  `ten` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sdt` varchar(15) DEFAULT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `mat_khau`, `ho_dem`, `ten`, `email`, `sdt`, `ngay_sinh`, `gioi_tinh`) VALUES
(2121, 'hieu', 'Nguyễn', 'Trung', 'giomua@gmail.com', '0987654321', '2024-08-13', 'Nam'),
(123456789, 'hieu', 'Tan', 'Hoang', 'adminhoang@gmail.com', '0987654358', '2024-08-07', 'Nam'),
(2147483647, 'hieu', 'Tan', 'Toi', 'admin@gmail.com', '0987654321', '2024-08-07', 'Nam');

-- --------------------------------------------------------

--
-- Table structure for table `chuyen_nganh`
--

CREATE TABLE `chuyen_nganh` (
  `ma_chuyen_nganh` varchar(10) NOT NULL,
  `ma_nganh` varchar(10) DEFAULT NULL,
  `ten_chuyen_khoa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_sach_lop`
--

CREATE TABLE `danh_sach_lop` (
  `ma_lop` varchar(10) NOT NULL,
  `msv` int(11) NOT NULL,
  `so_luong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_sach_sinh_vien`
--

CREATE TABLE `danh_sach_sinh_vien` (
  `ma_nhom` int(11) NOT NULL,
  `msv` int(11) NOT NULL,
  `so_luong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diem_hoc_phan`
--

CREATE TABLE `diem_hoc_phan` (
  `ma_hoc_phan` int(7) NOT NULL,
  `msv` int(10) NOT NULL,
  `diem_a` float DEFAULT NULL,
  `diem_b` float DEFAULT NULL,
  `diem_c` float DEFAULT NULL,
  `diem_tb_4` float DEFAULT NULL,
  `diem_tb_10` float DEFAULT NULL,
  `diem_tb_chu` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diem_ren_luyen`
--

CREATE TABLE `diem_ren_luyen` (
  `msv` int(10) NOT NULL,
  `diem_ren_luyen` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giang_vien`
--

CREATE TABLE `giang_vien` (
  `mgv` int(10) NOT NULL,
  `ma_khoa` varchar(10) DEFAULT NULL,
  `ho_dem` varchar(50) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `sdt` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mat_khau` varchar(50) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giang_vien`
--

INSERT INTO `giang_vien` (`mgv`, `ma_khoa`, `ho_dem`, `ten`, `sdt`, `email`, `mat_khau`, `ngay_sinh`, `gioi_tinh`) VALUES
(121212, NULL, 'Hoang', 'Xuan Vinh', 987654321, 'vinh@gmail.com', '2003', '2024-08-07', 'Nam');

-- --------------------------------------------------------

--
-- Table structure for table `hoc_phan`
--

CREATE TABLE `hoc_phan` (
  `ma_hoc_phan` int(7) NOT NULL,
  `ma_chuyen_nganh` varchar(10) DEFAULT NULL,
  `ten_hoc_phan` varchar(50) NOT NULL,
  `so_tin_chi` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `ma_khoa` varchar(10) NOT NULL,
  `ten_khoa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`ma_khoa`, `ten_khoa`) VALUES
('aaa', 'hehe'),
('CD', 'Cơ điện'),
('CNTT', 'Công nghệ thông tin'),
('CT', 'Lý luận chính trị'),
('DC', 'Địa chất'),
('DKNL', 'Dầu khí & Năng lượng'),
('GDQP', 'Giáo dục quốc phòng'),
('KHCB', 'Khoa học cơ bản'),
('KTDC', 'Kĩ thuật địa chất'),
('KT_QTKD', 'Kinh tế & Quản trị kinh doanh'),
('MO', 'Mỏ'),
('MT', 'Môi trường'),
('TDBD', 'Trắc địa - Bản đồ và quản lý đất đai'),
('XD', 'Xây dựng');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `ma_lop` varchar(10) NOT NULL,
  `mgv` int(11) DEFAULT NULL,
  `ma_chuyen_nganh` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nganh`
--

CREATE TABLE `nganh` (
  `ma_nganh` varchar(10) NOT NULL,
  `ma_khoa` varchar(10) DEFAULT NULL,
  `ten_nganh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nganh`
--

INSERT INTO `nganh` (`ma_nganh`, `ma_khoa`, `ten_nganh`) VALUES
('', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `nhom_hoc_phan`
--

CREATE TABLE `nhom_hoc_phan` (
  `ma_nhom` int(11) NOT NULL,
  `mgv` int(11) DEFAULT NULL,
  `ma_phong` varchar(10) NOT NULL,
  `ma_lop` varchar(10) DEFAULT NULL,
  `ma_hoc_phan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `ma_phong` varchar(10) NOT NULL,
  `suc_chua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sinh_vien`
--

CREATE TABLE `sinh_vien` (
  `msv` int(10) NOT NULL,
  `ma_lop` varchar(10) DEFAULT NULL,
  `ho_dem` varchar(50) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `sdt` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mat_khau` varchar(50) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sinh_vien`
--

INSERT INTO `sinh_vien` (`msv`, `ma_lop`, `ho_dem`, `ten`, `sdt`, `email`, `mat_khau`, `ngay_sinh`, `gioi_tinh`) VALUES
(2121051169, NULL, 'Doan', 'Bien', 2147483647, 'giomua@gmail.com', 'asdfg', '2024-08-14', 'Nam'),
(2121345673, NULL, 'Cao Hoàng', 'Long', 987654321, 'hoanglong@gmail.com', 'long', '2024-08-14', 'Nam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `chuyen_nganh`
--
ALTER TABLE `chuyen_nganh`
  ADD PRIMARY KEY (`ma_chuyen_nganh`),
  ADD KEY `ma_nganh` (`ma_nganh`);

--
-- Indexes for table `danh_sach_lop`
--
ALTER TABLE `danh_sach_lop`
  ADD PRIMARY KEY (`ma_lop`,`msv`),
  ADD KEY `msv` (`msv`);

--
-- Indexes for table `danh_sach_sinh_vien`
--
ALTER TABLE `danh_sach_sinh_vien`
  ADD PRIMARY KEY (`ma_nhom`,`msv`),
  ADD KEY `msv` (`msv`);

--
-- Indexes for table `diem_hoc_phan`
--
ALTER TABLE `diem_hoc_phan`
  ADD PRIMARY KEY (`ma_hoc_phan`,`msv`),
  ADD KEY `msv` (`msv`);

--
-- Indexes for table `diem_ren_luyen`
--
ALTER TABLE `diem_ren_luyen`
  ADD PRIMARY KEY (`msv`);

--
-- Indexes for table `giang_vien`
--
ALTER TABLE `giang_vien`
  ADD PRIMARY KEY (`mgv`),
  ADD KEY `ma_khoa` (`ma_khoa`);

--
-- Indexes for table `hoc_phan`
--
ALTER TABLE `hoc_phan`
  ADD PRIMARY KEY (`ma_hoc_phan`),
  ADD KEY `ma_chuyen_nganh` (`ma_chuyen_nganh`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`ma_khoa`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`ma_lop`),
  ADD KEY `ma_chuyen_nganh` (`ma_chuyen_nganh`),
  ADD KEY `mgv` (`mgv`);

--
-- Indexes for table `nganh`
--
ALTER TABLE `nganh`
  ADD PRIMARY KEY (`ma_nganh`),
  ADD KEY `ma_khoa` (`ma_khoa`);

--
-- Indexes for table `nhom_hoc_phan`
--
ALTER TABLE `nhom_hoc_phan`
  ADD PRIMARY KEY (`ma_nhom`),
  ADD KEY `mgv` (`mgv`),
  ADD KEY `ma_phong` (`ma_phong`),
  ADD KEY `ma_lop` (`ma_lop`),
  ADD KEY `ma_hoc_phan` (`ma_hoc_phan`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`ma_phong`);

--
-- Indexes for table `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD PRIMARY KEY (`msv`),
  ADD KEY `ma_lop` (`ma_lop`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chuyen_nganh`
--
ALTER TABLE `chuyen_nganh`
  ADD CONSTRAINT `chuyen_nganh_ibfk_1` FOREIGN KEY (`ma_nganh`) REFERENCES `nganh` (`ma_nganh`) ON DELETE CASCADE;

--
-- Constraints for table `danh_sach_lop`
--
ALTER TABLE `danh_sach_lop`
  ADD CONSTRAINT `danh_sach_lop_ibfk_1` FOREIGN KEY (`ma_lop`) REFERENCES `lop` (`ma_lop`) ON DELETE CASCADE,
  ADD CONSTRAINT `danh_sach_lop_ibfk_2` FOREIGN KEY (`msv`) REFERENCES `sinh_vien` (`msv`) ON DELETE CASCADE;

--
-- Constraints for table `danh_sach_sinh_vien`
--
ALTER TABLE `danh_sach_sinh_vien`
  ADD CONSTRAINT `danh_sach_sinh_vien_ibfk_1` FOREIGN KEY (`ma_nhom`) REFERENCES `nhom_hoc_phan` (`ma_nhom`) ON DELETE CASCADE,
  ADD CONSTRAINT `danh_sach_sinh_vien_ibfk_2` FOREIGN KEY (`msv`) REFERENCES `sinh_vien` (`msv`) ON DELETE CASCADE;

--
-- Constraints for table `diem_hoc_phan`
--
ALTER TABLE `diem_hoc_phan`
  ADD CONSTRAINT `diem_hoc_phan_ibfk_1` FOREIGN KEY (`ma_hoc_phan`) REFERENCES `hoc_phan` (`ma_hoc_phan`) ON DELETE CASCADE,
  ADD CONSTRAINT `diem_hoc_phan_ibfk_2` FOREIGN KEY (`msv`) REFERENCES `sinh_vien` (`msv`) ON DELETE CASCADE;

--
-- Constraints for table `diem_ren_luyen`
--
ALTER TABLE `diem_ren_luyen`
  ADD CONSTRAINT `diem_ren_luyen_ibfk_1` FOREIGN KEY (`msv`) REFERENCES `sinh_vien` (`msv`) ON DELETE CASCADE;

--
-- Constraints for table `giang_vien`
--
ALTER TABLE `giang_vien`
  ADD CONSTRAINT `giang_vien_ibfk_1` FOREIGN KEY (`ma_khoa`) REFERENCES `khoa` (`ma_khoa`) ON DELETE CASCADE;

--
-- Constraints for table `hoc_phan`
--
ALTER TABLE `hoc_phan`
  ADD CONSTRAINT `hoc_phan_ibfk_1` FOREIGN KEY (`ma_chuyen_nganh`) REFERENCES `chuyen_nganh` (`ma_chuyen_nganh`) ON DELETE CASCADE;

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`ma_chuyen_nganh`) REFERENCES `chuyen_nganh` (`ma_chuyen_nganh`) ON DELETE CASCADE,
  ADD CONSTRAINT `lop_ibfk_2` FOREIGN KEY (`mgv`) REFERENCES `giang_vien` (`mgv`) ON DELETE CASCADE;

--
-- Constraints for table `nganh`
--
ALTER TABLE `nganh`
  ADD CONSTRAINT `nganh_ibfk_1` FOREIGN KEY (`ma_khoa`) REFERENCES `khoa` (`ma_khoa`) ON DELETE CASCADE;

--
-- Constraints for table `nhom_hoc_phan`
--
ALTER TABLE `nhom_hoc_phan`
  ADD CONSTRAINT `nhom_hoc_phan_ibfk_1` FOREIGN KEY (`mgv`) REFERENCES `giang_vien` (`mgv`) ON DELETE CASCADE,
  ADD CONSTRAINT `nhom_hoc_phan_ibfk_2` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`ma_phong`) ON DELETE CASCADE,
  ADD CONSTRAINT `nhom_hoc_phan_ibfk_3` FOREIGN KEY (`ma_lop`) REFERENCES `lop` (`ma_lop`) ON DELETE CASCADE,
  ADD CONSTRAINT `nhom_hoc_phan_ibfk_4` FOREIGN KEY (`ma_hoc_phan`) REFERENCES `hoc_phan` (`ma_hoc_phan`) ON DELETE CASCADE;

--
-- Constraints for table `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD CONSTRAINT `sinh_vien_ibfk_1` FOREIGN KEY (`ma_lop`) REFERENCES `lop` (`ma_lop`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
