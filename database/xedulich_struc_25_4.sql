-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2014 at 02:20 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xedulich_struc`
--
CREATE DATABASE IF NOT EXISTS `xedulich_struc` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `xedulich_struc`;

-- --------------------------------------------------------

--
-- Table structure for table `chitietxe`
--

CREATE TABLE IF NOT EXISTS `chitietxe` (
  `IDchitietxe` int(5) NOT NULL AUTO_INCREMENT,
  `TenXe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NamSx` int(5) NOT NULL,
  `Bienso` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MauXe` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Màu của xe',
  `UrlHinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` float NOT NULL DEFAULT '0',
  `IDLoaixe` int(5) NOT NULL,
  `IDHangxe` int(5) NOT NULL,
  PRIMARY KEY (`IDchitietxe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE IF NOT EXISTS `donhang` (
  `id_giohang` int(11) NOT NULL AUTO_INCREMENT,
  `TenKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TenXe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NgayDat` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `NgayThue` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `SoNgay` int(2) NOT NULL,
  `Tu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Den` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TongTien` float NOT NULL,
  `MaDH` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TinhTrang` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0_dangXL 1_thanhcong',
  PRIMARY KEY (`id_giohang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hangxe`
--

CREATE TABLE IF NOT EXISTS `hangxe` (
  `IDHangxe` int(5) NOT NULL AUTO_INCREMENT,
  `TenHangxe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ThuTu` int(4) NOT NULL DEFAULT '1',
  `AnHien` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`IDHangxe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `IDUser` int(5) NOT NULL AUTO_INCREMENT,
  `TenKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PWord` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CMND` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SoDT` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `NgayDK` datetime NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`IDUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loaichothue`
--

CREATE TABLE IF NOT EXISTS `loaichothue` (
  `IDThue` int(5) NOT NULL AUTO_INCREMENT,
  `TenThue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ThuTu` int(5) NOT NULL DEFAULT '1',
  `AnHien` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`IDThue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loaithue_ctxe`
--

CREATE TABLE IF NOT EXISTS `loaithue_ctxe` (
  `IDThue` int(5) NOT NULL,
  `IDXe` int(5) NOT NULL,
  PRIMARY KEY (`IDThue`,`IDXe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaixe`
--

CREATE TABLE IF NOT EXISTS `loaixe` (
  `IDLoaixe` int(5) NOT NULL AUTO_INCREMENT,
  `TenLoaixe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ThuTu` int(11) NOT NULL,
  `AnHien` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`IDLoaixe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE IF NOT EXISTS `tintuc` (
  `id_tin` int(11) NOT NULL AUTO_INCREMENT,
  `TieuDe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TomTat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `UrlHinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NgayThang` date DEFAULT NULL,
  `User` int(4) NOT NULL,
  `AnHien` tinyint(1) NOT NULL DEFAULT '1',
  `Hot` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Tin noi bat',
  PRIMARY KEY (`id_tin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IDGroup` int(1) NOT NULL DEFAULT '0' COMMENT '0_user 1_admin',
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
