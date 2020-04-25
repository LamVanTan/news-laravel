-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 03:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baomoi`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `idTinTuc` int(10) UNSIGNED NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `idUser`, `idTinTuc`, `NoiDung`, `created_at`, `updated_at`) VALUES
(4, 3, 1, 'khá phức tạp', '2020-04-22 11:26:28', '2020-04-22 11:26:28'),
(5, 3, 1, 'hay', '2020-04-22 11:57:10', '2020-04-22 11:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `loaitin`
--

CREATE TABLE `loaitin` (
  `id` int(10) UNSIGNED NOT NULL,
  `idTheLoai` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaitin`
--

INSERT INTO `loaitin` (`id`, `idTheLoai`, `Ten`, `created_at`, `updated_at`) VALUES
(1, 1, 'Thời Sự', '2020-04-15 15:41:04', '2020-04-15 15:41:04'),
(2, 1, 'Giao Thông', '2020-04-15 15:41:16', '2020-04-15 15:41:16'),
(3, 2, 'Tài Chính', '2020-04-15 15:41:30', '2020-04-15 15:41:30'),
(4, 2, 'Chứng Khoán', '2020-04-15 15:41:37', '2020-04-15 15:43:23'),
(5, 3, 'An Ninh', '2020-04-15 15:42:01', '2020-04-15 15:42:01'),
(6, 3, 'Hình Sự', '2020-04-15 15:42:09', '2020-04-15 15:42:09'),
(7, 5, 'Bóng Đá', '2020-04-15 15:42:24', '2020-04-15 15:42:24'),
(8, 5, 'Bơi Lội', '2020-04-15 15:42:36', '2020-04-15 15:42:36'),
(9, 4, 'Nghệ Thuật', '2020-04-15 15:47:20', '2020-04-15 15:47:20'),
(10, 4, 'Du Lịch', '2020-04-15 15:47:44', '2020-04-15 15:47:44'),
(11, 6, 'Âm Nhạc', '2020-04-15 15:48:12', '2020-04-15 15:48:12'),
(12, 6, 'Thời Trang', '2020-04-15 15:48:26', '2020-04-15 15:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_03_08_161129_table__the_loai', 1),
(2, '2020_03_08_161343_table_slide', 1),
(3, '2020_03_08_161518_table__loai_tin', 1),
(4, '2020_03_08_161632_table__tin_tuc', 1),
(5, '2020_03_10_141602_user', 1),
(6, '2020_03_10_142418_table__comment', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`id`, `Ten`, `created_at`, `updated_at`) VALUES
(1, 'Xã Hội', '2020-04-15 15:36:27', '2020-04-15 15:39:09'),
(2, 'Kinh Tế', '2020-04-15 15:36:34', '2020-04-15 15:39:35'),
(3, 'Pháp Luật', '2020-04-15 15:36:41', '2020-04-15 15:40:45'),
(4, 'Văn Hóa', '2020-04-15 15:36:47', '2020-04-15 15:36:47'),
(5, 'Thể Thao', '2020-04-15 15:36:54', '2020-04-15 15:36:54'),
(6, 'Giải Trí', '2020-04-15 15:47:57', '2020-04-15 15:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TomTat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiDung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiBat` int(11) NOT NULL DEFAULT 0,
  `SoLuotXem` int(11) NOT NULL DEFAULT 0,
  `idLoaiTin` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`id`, `TieuDe`, `TomTat`, `NoiDung`, `Hinh`, `NoiBat`, `SoLuotXem`, `idLoaiTin`, `created_at`, `updated_at`) VALUES
(1, 'Tình Hình Chính Trị Mỹ -Trung Ngày Càng Nóng Lên', 'Xung đột của hai nước ngày càng kéo dài từ khi dịch covid-19 bùng phát  tại mỹ', 'ssss', 'tin1.jpg', 1, 0, 1, '2020-04-22 05:03:52', '2020-04-22 05:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quyen` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`id`, `name`, `email`, `password`, `quyen`, `created_at`, `updated_at`) VALUES
(1, 'dNYb4htP69', 'wXxH1Kz6Vk@gmail.com', '$2y$10$hZWIWAqzEME4y88zS5oSKOaq9lzwI1W8GPjIUeiDzrcV8c44nb9/C', 1, NULL, NULL),
(2, 'lâm văn tân', 'lvtan.18i@cit.udn.vn', '$2y$10$4P841CGw7DiV4EvdhKyxieV4pNjuYZiWNjV57o8qdSFRMivt7QDXO', NULL, '2020-04-22 03:38:38', '2020-04-22 03:38:38'),
(3, 'Bình Lâm', 'lamvantan03@gmail.com', '$2y$10$E4FirUhXy.du6ijgw6izpOrjXrElWlsm2py1dRSMjXCi2srr3YSVi', NULL, '2020-04-22 06:32:54', '2020-04-22 06:32:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `binhluan_iduser_foreign` (`idUser`),
  ADD KEY `binhluan_idtintuc_foreign` (`idTinTuc`);

--
-- Indexes for table `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaitin_idtheloai_foreign` (`idTheLoai`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tintuc_idloaitin_foreign` (`idLoaiTin`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `useradmin_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loaitin`
--
ALTER TABLE `loaitin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_idtintuc_foreign` FOREIGN KEY (`idTinTuc`) REFERENCES `tintuc` (`id`),
  ADD CONSTRAINT `binhluan_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `useradmin` (`id`);

--
-- Constraints for table `loaitin`
--
ALTER TABLE `loaitin`
  ADD CONSTRAINT `loaitin_idtheloai_foreign` FOREIGN KEY (`idTheLoai`) REFERENCES `theloai` (`id`);

--
-- Constraints for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_idloaitin_foreign` FOREIGN KEY (`idLoaiTin`) REFERENCES `loaitin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
