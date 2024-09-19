-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2024 at 11:56 AM
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
(2121, 'hieu', 'Nguyễn Trung', 'Hiếu', 'giomua@gmail.com', '0987654321', '2024-08-13', 'Nam');

-- --------------------------------------------------------

--
-- Table structure for table `bang_diem_nhom`
--

CREATE TABLE `bang_diem_nhom` (
  `ma_nhom` int(11) NOT NULL,
  `msv` int(10) NOT NULL,
  `mgv` int(10) NOT NULL,
  `diem_a` int(10) NOT NULL,
  `diem_b` int(10) NOT NULL,
  `diem_c` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chuyen_nganh`
--

CREATE TABLE `chuyen_nganh` (
  `ma_chuyen_nganh` varchar(10) NOT NULL,
  `ma_nganh` varchar(10) DEFAULT NULL,
  `ten_chuyen_nganh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chuyen_nganh`
--

INSERT INTO `chuyen_nganh` (`ma_chuyen_nganh`, `ma_nganh`, `ten_chuyen_nganh`) VALUES
('CNPM', 'CNTT', 'Công nghệ phần mềm'),
('CNTTDH', 'CNTT', 'Công nghệ Thông tin Địa học'),
('HTTT', 'CNTT', 'Hệ thống thông tin'),
('KHMT', 'CNTT', 'Khoa học máy tính'),
('MMT', 'CNTT', 'Mạng máy tính'),
('THKT', 'CNTT', 'Tin học kinh tế');

-- --------------------------------------------------------

--
-- Table structure for table `danh_sach_lop`
--

CREATE TABLE `danh_sach_lop` (
  `ma_lop` varchar(15) NOT NULL,
  `msv` int(11) NOT NULL,
  `ho_dem` varchar(50) NOT NULL,
  `ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_sach_lop`
--

INSERT INTO `danh_sach_lop` (`ma_lop`, `msv`, `ho_dem`, `ten`) VALUES
('DCCTCT66_06A', 3030, 'Đoàn Minh', 'Quân'),
('DCCTCT66_07A', 2020, 'Đoàn Minh', 'Dũng');

-- --------------------------------------------------------

--
-- Table structure for table `danh_sach_sinh_vien`
--

CREATE TABLE `danh_sach_sinh_vien` (
  `ma_nhom` int(11) NOT NULL,
  `msv` int(11) NOT NULL,
  `ho_dem` varchar(50) NOT NULL,
  `ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_sach_sinh_vien_chuyen_nganh`
--

CREATE TABLE `danh_sach_sinh_vien_chuyen_nganh` (
  `ma_chuyen_nganh` varchar(10) NOT NULL,
  `msv` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_sach_sinh_vien_chuyen_nganh`
--

INSERT INTO `danh_sach_sinh_vien_chuyen_nganh` (`ma_chuyen_nganh`, `msv`) VALUES
('CNPM', 3030),
('KHMT', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `danh_sach_sinh_vien_khoa`
--

CREATE TABLE `danh_sach_sinh_vien_khoa` (
  `ma_khoa` varchar(11) NOT NULL,
  `msv` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_sach_sinh_vien_khoa`
--

INSERT INTO `danh_sach_sinh_vien_khoa` (`ma_khoa`, `msv`) VALUES
('CNTT', 2020),
('CNTT', 3030);

-- --------------------------------------------------------

--
-- Table structure for table `danh_sach_sinh_vien_nganh`
--

CREATE TABLE `danh_sach_sinh_vien_nganh` (
  `ma_nganh` varchar(10) NOT NULL,
  `msv` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_sach_sinh_vien_nganh`
--

INSERT INTO `danh_sach_sinh_vien_nganh` (`ma_nganh`, `msv`) VALUES
('CNTT', 2020),
('CNTT', 3030);

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
  `drl` int(10) DEFAULT NULL
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
(2121, 'CNTT', 'Đoàn Minh', 'Quân', 2147483647, 'quanminhdoan@gmail.com', 'quan', '2024-08-13', 'Nam'),
(4141, 'CNTT', 'Trần Thị ', 'Hằng', 987654321, 'tranhang@gmail.com', 'thuthuy', '2024-09-06', 'Nữ'),
(5151, 'CNTT', 'Nguyễn Thùy', 'Trang', 2147483647, 'thuytrang@gmail.com', 'thuytrang', '2024-08-07', 'Nữ'),
(8181, 'CNTT', 'Cao Hoàng', 'Long', 987654321, 'hoanglong@gmail.com', 'anhtuan', '2024-09-05', 'Nam');

-- --------------------------------------------------------

--
-- Table structure for table `hoc_phan`
--

CREATE TABLE `hoc_phan` (
  `ma_hoc_phan` int(7) NOT NULL,
  `ten_hoc_phan` varchar(50) NOT NULL,
  `so_tin_chi` int(10) DEFAULT NULL,
  `ma_nganh` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoc_phan`
--

INSERT INTO `hoc_phan` (`ma_hoc_phan`, `ten_hoc_phan`, `so_tin_chi`, `ma_nganh`) VALUES
(7080104, 'Pháp luật đại cương', 3, 'CNTT'),
(7080107, 'Kiểm thử và đảm bảo chất lượng', 3, 'CNTT'),
(7080111, 'Mã nguồn mở', 2, 'CNTT'),
(7080113, 'Phân tích & thiết kế hệ thống và BTL', 3, 'CNTT'),
(7080116, 'Phát triển ứng dụng Web + BTL', 4, 'CNTT'),
(7080122, 'Trí tuệ nhân tạo + BTL', 3, 'CNTT'),
(7080208, 'Cơ sở lập trình', 3, 'CNTT'),
(7080216, 'Kĩ thuật lập trình hướng đối tượng C++', 2, 'CNTT'),
(7080504, 'Điện toán đám mây và ứng dụng', 2, 'CNTT'),
(7080505, 'Điện toán di động', 3, 'CNTT'),
(7080507, 'Dữ liệu lớn và ứng dụng', 3, 'CNTT'),
(7080508, 'Khai phá dữ liệu', 3, 'CNTT'),
(7080509, 'Khoa học dữ liệu', 2, 'CNTT'),
(7080515, 'Phân tích và thiết kế hướng đối tượng', 3, 'CNTT'),
(7080516, 'Phân tích và thiết kế thuật toán', 3, 'CNTT'),
(7080520, 'Web ngữ nghĩa', 3, 'CNTT'),
(7080626, 'Thương mại điện tử', 3, 'CNTT'),
(7080635, 'Quản trị dự án CNTT', 3, 'CNTT'),
(7080703, 'Cơ sở an ninh mạng', 3, 'CNTT'),
(7080713, 'Kiến trúc và hạ tầng mạng IoT', 2, 'CNTT'),
(7080717, 'Mạng máy tính', 3, 'CNTT');

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
  `ma_lop` varchar(15) NOT NULL,
  `mgv` int(11) DEFAULT NULL,
  `ma_chuyen_nganh` varchar(10) DEFAULT NULL,
  `so_luong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`ma_lop`, `mgv`, `ma_chuyen_nganh`, `so_luong`) VALUES
('DCCTCT66_04A', 2121, 'THKT', 60),
('DCCTCT66_06A', 8181, 'CNPM', 60),
('DCCTCT66_06B', 2121, 'CNPM', 60),
('DCCTCT66_07A', 5151, 'KHMT', 60),
('DCCTCT66_07B', 2121, 'KHMT', 60),
('DCCTCT66_08C', 5151, 'CNTTDH', 60);

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
('CNTT', 'CNTT', 'Công nghệ thông tin'),
('CTL', 'KHCB', 'Cơ lý thuyết'),
('KT', 'KT_QTKD', 'Kế toán'),
('KTM', 'MO', 'Kĩ thuật mỏ'),
('KTMT', 'MT', 'Kỹ thuật môi trường'),
('KTTK', 'MO', 'Kĩ thuật tuyển khoáng');

-- --------------------------------------------------------

--
-- Table structure for table `nhom_hoc_phan`
--

CREATE TABLE `nhom_hoc_phan` (
  `ma_nhom` int(11) NOT NULL,
  `mgv` int(11) DEFAULT NULL,
  `ma_lop` varchar(15) DEFAULT NULL,
  `ma_hoc_phan` int(11) DEFAULT NULL,
  `so_luong` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sinh_vien`
--

CREATE TABLE `sinh_vien` (
  `msv` int(10) NOT NULL,
  `ma_lop` varchar(15) DEFAULT NULL,
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
(2020, 'DCCTCT66_07A', 'Đoàn Minh', 'Dũng', 98123456, 'minhdung@gmail.com', 'minhdung', '2024-09-06', 'Nam'),
(3030, 'DCCTCT66_06A', 'Đoàn Minh', 'Quân', 2147483647, 'minhquan@gmail.com', 'minhquan', '2024-09-06', 'Nam');

-- --------------------------------------------------------

--
-- Table structure for table `sinh_vien_truot_mon`
--

CREATE TABLE `sinh_vien_truot_mon` (
  `ma_hoc_phan` int(7) NOT NULL,
  `msv` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bang_diem_nhom`
--
ALTER TABLE `bang_diem_nhom`
  ADD PRIMARY KEY (`ma_nhom`,`msv`,`mgv`),
  ADD KEY `msv` (`msv`),
  ADD KEY `mgv` (`mgv`);

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
-- Indexes for table `danh_sach_sinh_vien_chuyen_nganh`
--
ALTER TABLE `danh_sach_sinh_vien_chuyen_nganh`
  ADD PRIMARY KEY (`ma_chuyen_nganh`,`msv`),
  ADD KEY `msv` (`msv`);

--
-- Indexes for table `danh_sach_sinh_vien_khoa`
--
ALTER TABLE `danh_sach_sinh_vien_khoa`
  ADD PRIMARY KEY (`ma_khoa`,`msv`),
  ADD KEY `msv` (`msv`);

--
-- Indexes for table `danh_sach_sinh_vien_nganh`
--
ALTER TABLE `danh_sach_sinh_vien_nganh`
  ADD PRIMARY KEY (`ma_nganh`,`msv`),
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
  ADD KEY `fk_hoc_phan_nganh` (`ma_nganh`);

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
  ADD KEY `ma_lop` (`ma_lop`),
  ADD KEY `ma_hoc_phan` (`ma_hoc_phan`);

--
-- Indexes for table `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD PRIMARY KEY (`msv`),
  ADD KEY `ma_lop` (`ma_lop`);

--
-- Indexes for table `sinh_vien_truot_mon`
--
ALTER TABLE `sinh_vien_truot_mon`
  ADD PRIMARY KEY (`ma_hoc_phan`,`msv`),
  ADD KEY `msv` (`msv`);

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
-- Constraints for table `bang_diem_nhom`
--
ALTER TABLE `bang_diem_nhom`
  ADD CONSTRAINT `bang_diem_nhom_ibfk_1` FOREIGN KEY (`ma_nhom`) REFERENCES `nhom_hoc_phan` (`ma_nhom`) ON DELETE CASCADE,
  ADD CONSTRAINT `bang_diem_nhom_ibfk_2` FOREIGN KEY (`msv`) REFERENCES `sinh_vien` (`msv`) ON DELETE CASCADE,
  ADD CONSTRAINT `bang_diem_nhom_ibfk_3` FOREIGN KEY (`mgv`) REFERENCES `giang_vien` (`mgv`) ON DELETE CASCADE;

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
-- Constraints for table `danh_sach_sinh_vien_chuyen_nganh`
--
ALTER TABLE `danh_sach_sinh_vien_chuyen_nganh`
  ADD CONSTRAINT `danh_sach_sinh_vien_chuyen_nganh_ibfk_1` FOREIGN KEY (`ma_chuyen_nganh`) REFERENCES `chuyen_nganh` (`ma_chuyen_nganh`) ON DELETE CASCADE,
  ADD CONSTRAINT `danh_sach_sinh_vien_chuyen_nganh_ibfk_2` FOREIGN KEY (`msv`) REFERENCES `sinh_vien` (`msv`) ON DELETE CASCADE;

--
-- Constraints for table `danh_sach_sinh_vien_khoa`
--
ALTER TABLE `danh_sach_sinh_vien_khoa`
  ADD CONSTRAINT `danh_sach_sinh_vien_khoa_ibfk_1` FOREIGN KEY (`ma_khoa`) REFERENCES `khoa` (`ma_khoa`) ON DELETE CASCADE,
  ADD CONSTRAINT `danh_sach_sinh_vien_khoa_ibfk_2` FOREIGN KEY (`msv`) REFERENCES `sinh_vien` (`msv`) ON DELETE CASCADE;

--
-- Constraints for table `danh_sach_sinh_vien_nganh`
--
ALTER TABLE `danh_sach_sinh_vien_nganh`
  ADD CONSTRAINT `danh_sach_sinh_vien_nganh_ibfk_1` FOREIGN KEY (`ma_nganh`) REFERENCES `nganh` (`ma_nganh`) ON DELETE CASCADE,
  ADD CONSTRAINT `danh_sach_sinh_vien_nganh_ibfk_2` FOREIGN KEY (`msv`) REFERENCES `sinh_vien` (`msv`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `fk_hoc_phan_nganh` FOREIGN KEY (`ma_nganh`) REFERENCES `nganh` (`ma_nganh`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `nhom_hoc_phan_ibfk_3` FOREIGN KEY (`ma_lop`) REFERENCES `lop` (`ma_lop`) ON DELETE CASCADE,
  ADD CONSTRAINT `nhom_hoc_phan_ibfk_4` FOREIGN KEY (`ma_hoc_phan`) REFERENCES `hoc_phan` (`ma_hoc_phan`) ON DELETE CASCADE;

--
-- Constraints for table `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD CONSTRAINT `sinh_vien_ibfk_1` FOREIGN KEY (`ma_lop`) REFERENCES `lop` (`ma_lop`) ON DELETE CASCADE;

--
-- Constraints for table `sinh_vien_truot_mon`
--
ALTER TABLE `sinh_vien_truot_mon`
  ADD CONSTRAINT `sinh_vien_truot_mon_ibfk_1` FOREIGN KEY (`ma_hoc_phan`) REFERENCES `hoc_phan` (`ma_hoc_phan`) ON DELETE CASCADE,
  ADD CONSTRAINT `sinh_vien_truot_mon_ibfk_2` FOREIGN KEY (`msv`) REFERENCES `sinh_vien` (`msv`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
