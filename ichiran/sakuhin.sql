-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql201.epizy.com
-- Generation Time: Jun 13, 2020 at 12:13 PM
-- Server version: 5.6.47-87.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_25935673_sakuhin`
--

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `code` int(11) NOT NULL,
  `username` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `sakuhinmei` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `concept` text COLLATE utf8_bin,
  `hiduke` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `genre` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`code`, `username`, `sakuhinmei`, `concept`, `hiduke`, `file_name`, `genre`) VALUES
(1, 'shinichirou', 'アップロードロゴマーク', 'ブラッシュを活用してロゴマークを作りました', '2020-06-07 10:59:50', '5ed9324198940.png', 'CG'),
(2, 'TOYAMASHIN', 'ん?', 'ん?', '2020-06-07 10:59:50', '5ee1d9900e137.jpeg', '写真'),
(3, 'shinichirou', 'Creativity', 'かく点はクリエイティビティの意味し、数多く集合していることは無限な可能性がある', '2020-06-10 13:41:57', '5ee0e301abec3.png', 'CG'),
(4, 'shinichirou', 'Be Creative', 'クリエイティブになれと言う意味をこてつくりました', '2020-06-10 13:42:47', '5ee0e3340eaab.png', 'CG'),
(5, 'shinichirou', 'ログアウト', 'ログアウト用のロゴ', '2020-06-10 13:43:33', '5ee0e3617ebc3.png', 'CG'),
(6, 'shinichirou', 'ユーザ', 'ユーザのけしん', '2020-06-10 13:44:02', '5ee0e37ece9c6.png', 'CG'),
(7, 'yuno1212', 'ミニキャラ　女の子', '思いつきで描きました。', '2020-06-11 07:10:30', '5ee1d8c2c3e12.jpg', 'CG'),
(8, 'yuno1212', 'アズレン　綾波　下書き', '下書きです。', '2020-06-11 07:17:46', '5ee1da7678cf4.jpg', 'CG'),
(9, 'yuno1212', 'アズレン　綾波', '完成版です。', '2020-06-11 07:18:29', '5ee1daa1aa8f1.jpg', 'CG'),
(10, 'TOYAMASHIN', 'balls', '', '2020-06-11 08:01:31', '5ee1e4ab4d628.gif', 'アニメーション'),
(11, 'TOYAMASHIN', 'Lemon man', '', '2020-06-11 08:08:48', '5ee1e6ff0e56d.jpg', 'CG');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(15) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `level` varchar(15) COLLATE utf8_bin NOT NULL,
  `password` varchar(15) COLLATE utf8_bin NOT NULL,
  `dates` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `level`, `password`, `dates`) VALUES
('SuperADMIN', 'admin@gmail.com', 'super_user', '12345', '2020-06-04 11:03:48'),
('shinichirou', 'shinichirouikebe98@gmail.com', 'normal_user', 'Ronal21q', '2020-06-04 13:20:37'),
('TOYAMASHIN', '781812650@qq.com', 'normal_user', 'Lc18403444013', '2020-06-05 17:09:38'),
('yuno1212', 'yunosuke.shiroshita@gmail.com', 'normal_user', 'nanoS1212', '2020-06-11 03:07:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`code`),
  ADD KEY `fk_username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
