-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2014 at 10:22 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xedulich`
--
CREATE DATABASE IF NOT EXISTS `xedulich` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `xedulich`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `chitietxe`
--

INSERT INTO `chitietxe` (`IDchitietxe`, `TenXe`, `NamSx`, `Bienso`, `MauXe`, `UrlHinh`, `Mota`, `Gia`, `IDLoaixe`, `IDHangxe`) VALUES
(1, 'Honda Civic 1.8 MT', 2009, '123456', 'Bạc', 'car-c1.jpg', 'xe honda 1aaaaaaaaaaaaaaa', 120000, 1, 1),
(2, 'Honda Civic 1.8 AT', 2009, '949584', 'Đen', 'car-c2.jpg', 'Lưới tản nhiệt với thiết kế 3 nan mới. Nội thất thoải mái và tiện nghi và hiện đại của một căn phòng di động. Màn hình 5 inch hiển thị các thông số chính ở phía trên', 130000, 1, 1),
(3, 'Honda Civic 2.0 AT', 2010, '546652', 'Đỏ', 'car-c3.jpg', 'Màn hình 5 inch hiển thị các thông số chính ở phía trên. Nút bấm chế độ ECON. Lưới tản nhiệt với thiết kế 3 nan mới', 140000, 1, 1),
(4, 'Honda City 1.5 MT', 2013, '9449kjl', 'Đen', 'car-c4.jpg', 'Hệ thống điều hòa nhiệt độ. Hệ thống chiếu sáng toàn xe. Hệ thống âm thanh Audio với 4 loa', 150000, 1, 1),
(5, 'Camry 2.5G', 2014, '345345', 'Đen', 'car-c5.jpg', 'Chế độ điều khiển tự động. Công suất tối đa (SAE-Net) 178/6.000 Hp/rpm', 200000, 1, 2),
(6, 'Vios 1.5 e', 2014, '123459', 'Bạc', 'car-c6.jpg', 'Đèn sương mù phía trước. Gương chiếu hậu ngoài. Tiêu chuẩn khí xả Euro 4', 250000, 1, 2),
(7, 'Corolla 1.8 CVT', 2000, '949581', 'Đen', 'car-c7.jpg', 'Hệ thống túi khí. Dây đai an toàn. Tiêu chuẩn khí xả Euro4', 300000, 2, 2),
(8, 'Audi Q5 2.0 TFSI', 2014, '52AB-1234', 'Bạc', '', 'Khoảng sáng gầm xe 200mm. Vô lăng điều chỉnh 04 hướng - trợ lực lái. Hỗ trợ đổ đèo HDC. Tự động cân bằng điện tử EPS ', 350000, 1, 6),
(9, 'Audi R8 V10', 2013, '12AB-4321', 'Lam', '', 'PPI Speed Design GmbH đầu tiên tập trung vào động cơ 10 xi-lanh, lập trình lại bộ ECU và lắp đặt hệ thống ống xả mới. Công suất vọt lên mức 621 mã lực tại vòng tua máy 7.400 vòng/phút và mô-men xoắn cực đại 565 Nm tại 6.400 vòng/phút. Kết quả của sự thay ', 360000, 1, 6),
(10, 'Audi A4', 2013, '34BC-0987', 'Đen', '', 'PPI Speed Design GmbH đầu tiên tập trung vào động cơ 10 xi-lanh, lập trình lại bộ ECU và lắp đặt hệ thống ống xả mới. Công suất vọt lên mức 621 mã lực tại vòng tua máy 7.400 vòng/phút và mô-men xoắn cực đại 565 Nm tại 6.400 vòng/phút', 400000, 2, 6),
(11, 'Kia Optima', 2012, '43NB-1234', 'Đỏ', '', 'Tay lái trợ lực. Đèn chiếu sương mù', 420000, 1, 8),
(12, 'Kia Rio 5-door', 2013, 'OL42-4344', 'Bạc', '', 'Hộp số: số tự động 4 cấp. Dẫn động 1 cầu. Dung tích xi lanh: 1.396', 520000, 1, 8),
(13, 'Mitsubishi Triton GL', 2012, '85AB-9999', 'Trắng', '', 'Khoảng sáng gầm xe 200mm. Truyền động 2 cầu. Dung tích xi lanh: 2.351', 550000, 2, 7),
(14, 'Pajero GL', 2013, 'GH67-7777', 'Trắng', '', 'Nắp capô được thay thế bằng vật liệu nhôm hợp kim đã giảm được trọng lượng khoảng 9kg cũng như cải thiện phân bố trọng lượng trước/sau, ngoài ra còn giúp cho việc đóng/mở nắp capô nhẹ nhàng hơn', 600000, 3, 7),
(15, 'Canter HD', 2012, 'JK90-0009', 'Vàng', '', 'Hộp số: 5 số tiến và 1 số lùi', 630000, 2, 7),
(16, 'Hyundai grand starex', 2013, 'UT23-2323', 'Bạc', '', 'Mâm đúc 16, bánh xe sơ cua mâm sắt. Dung tích nhiên liệu : 75 (lít).', 720000, 7, 4),
(17, 'Hyundai starex 2.4', 2011, '98GV-1234', 'Trắng', '', 'Lưới tản nhiệt mạ Crôm; Cửa hậu mở lên đèn; Kính màu', 800000, 6, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id_giohang`, `TenKH`, `SDT`, `Email`, `TenXe`, `NgayDat`, `NgayThue`, `SoNgay`, `Tu`, `Den`, `TongTien`, `MaDH`, `TinhTrang`) VALUES
(1, 'test', '1234567890', 'test@123', 'Corolla 1.8 CVT', '25-04-2014', '26-04-2014', 2, 'Lai Châu', 'Lạng Sơn', 600000, '1398413660', 0),
(2, 'test', '1234567890', 'test@123', 'Corolla 1.8 CVT', '25-04-2014', '26-04-2014', 2, 'Lai Châu', 'Lạng Sơn', 600000, '1398413946', 0),
(3, 'test', '1234567890', 'test@123', 'Corolla 1.8 CVT', '25-04-2014', '26-04-2014', 2, 'Lai Châu', 'Lạng Sơn', 600000, '1398413962', 0),
(4, 'test', '111111111111', 'test@123.vn', 'Corolla 1.8 CVT', '25-04-2014', '30-04-2014', 3, 'Hòa Bình', 'Thái Nguyên', 900000, '1398414138', 0),
(5, 'test', '111111111111', 'test@123.vn', 'Corolla 1.8 CVT', '25-04-2014', '30-04-2014', 3, 'Hòa Bình', 'Thái Nguyên', 900000, '1398414163', 0),
(6, 'test', '111111111111', 'test@123', 'Kia Rio 5-door', '25-04-2014', '27-04-2014', 1, 'Sơn La', 'Lai Châu', 520000, '1398416105', 0),
(7, 'test', '1234567890', 'test@123.vn', 'Kia Rio 5-door', '25-04-2014', '25-04-2014', 3, 'Hòa Bình', 'Phú Thọ', 1560000, '1398419945', 0),
(8, 'ttttttttttt', '1234567890', 'test@123.vn', 'Honda Civic 2.0 AT', '25-04-2014', '27-04-2014', 2, 'Lạng Sơn', 'Hòa Bình', 280000, '1398420914', 0),
(9, 'ttttttttttt', '1234567890', 'test@123.vn', 'Honda Civic 2.0 AT', '25-04-2014', '27-04-2014', 2, 'Lạng Sơn', 'Hòa Bình', 280000, '1398420953', 0),
(10, 'ttttttttttt', '1234567890', 'test@123.vn', 'Honda Civic 2.0 AT', '25-04-2014', '27-04-2014', 2, 'Lạng Sơn', 'Hòa Bình', 280000, '1398420967', 0),
(11, 'test', '1234567890', 'test@123.vn', 'Corolla 1.8 CVT', '25-04-2014', '26-04-2014', 2, 'Thái Nguyên', 'Lai Châu', 600000, '1398421056', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `hangxe`
--

INSERT INTO `hangxe` (`IDHangxe`, `TenHangxe`, `ThuTu`, `AnHien`) VALUES
(1, 'Honda', 1, 1),
(2, 'Toyota', 2, 1),
(3, 'Mercedes', 3, 1),
(4, 'Hyundai', 4, 1),
(5, 'Chevrolet', 5, 1),
(6, 'Audi', 1, 1),
(7, 'Mitsubishi', 1, 1),
(8, 'Kia', 1, 1),
(9, 'Ferrari', 1, 1),
(10, 'Lamborghini', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `loaichothue`
--

INSERT INTO `loaichothue` (`IDThue`, `TenThue`, `ThuTu`, `AnHien`) VALUES
(1, 'Thuê xe tháng', 1, 1),
(2, 'Thuê xe du lịch', 2, 1),
(3, 'Thuê xe đám cưới', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `loaithue_ctxe`
--

CREATE TABLE IF NOT EXISTS `loaithue_ctxe` (
  `IDThue` int(5) NOT NULL,
  `IDXe` int(5) NOT NULL,
  PRIMARY KEY (`IDThue`,`IDXe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaithue_ctxe`
--

INSERT INTO `loaithue_ctxe` (`IDThue`, `IDXe`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 6),
(1, 7),
(2, 1),
(2, 4),
(2, 5),
(3, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `loaixe`
--

INSERT INTO `loaixe` (`IDLoaixe`, `TenLoaixe`, `ThuTu`, `AnHien`) VALUES
(1, '4 Chỗ', 1, 1),
(2, '7 Chỗ', 2, 1),
(3, '16 chỗ', 3, 1),
(4, '24 - 29 chỗ', 4, 1),
(5, '35 - 45 chỗ', 5, 1),
(6, '6 chỗ', 0, 1),
(7, '9 chỗ', 6, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`id_tin`, `TieuDe`, `TomTat`, `NoiDung`, `UrlHinh`, `NgayThang`, `User`, `AnHien`, `Hot`) VALUES
(1, 'Audi sẽ ra mắt R8 V10 plus vào cuối năm 2012', 'Dịch vụ cho thuê xe xin sẽ luôn luôn cập nhật tin tức của những loại xe mới nhất có mặt trên thị trường. Hôm nay Dịch vụ cho thuê xe xin trân trọng giới thiệu tới bạn đọc về sự xuất hiện của R8 V10 plus.', 'Dịch vụ cho thuê xe xin sẽ luôn luôn cập nhật tin tức của những loại xe mới nhất có mặt trên thị trường. Hôm nay Dịch vụ cho thuê xe xin trân trọng giới thiệu tới bạn đọc về sự xuất hiện của R8 V10 plus.\r\nVào cuối năm 2012, Audi sẽ ra mắt R8 V10 plus 2 chỗ ngồi. Audi R8 bản nâng cấp có một số thay đổi ở cả nội và ngoại thất. Hộp số ly hợp kép 7 cấp S-tronic thay thế hộc số bán tự động 6 cấp R-tronic. Và động cơ V10 Plus loại mới mạnh hơn và nhẹ hơn với công suất 542 mã lực chỉ có trên bản coupe. Chi tiết hơn, R8 đời 2013 giúp người hâm mộ phân biệt với mẫu xe hiện hành bằng đèn pha LED mới, lưới tản nhiệt cũng được vuốt lại với những thanh ngang mạ crôm trên phiên bản V10, và ba-đờ-sốc mới với khe hút gió nằm trải dài.\r\nAudi R8 đời 2013 dễ nhận biết so với mẫu xe hiện hành ở kiểu đèn pha mới.\r\nPhía đuôi xe, R8 toát lên vẻ thể thao mạnh mẽ với đèn hậu LED, hốc hút gió mới và ống xả tròn trên tất cả các phiên bản động cơ.\r\nNhững thay đổi ở nội thất hạn chế ở cụm đồng hồ và sang số trên vô-lăng. Những tùy chọn gồm ghế bọc da với đường chỉ khâu họa tiết kim cương, da bọc Fine Nappa.Trong khi cả 2 phiên bản động cơ 4,2 lít V8 (công suất 424 mã lực và mô men xoắn 430 Nm) và động cơ 5,2 lít V10 (công suất 518 mã lực và mô-men xoắn 530 Nm) là không đổi, thì Audi đã thay mới hộp số.\r\nHãng xe Đức cho biết, hộp số 7 cấp S-tronic giảm mức khí thải carbonic và giảm thời gian tăng tốc từ 0 lên 100 km/h. Tuy nhiên, khách hàng vẫn có thể lựa chọn hộp số sàn 6 cấp.\r\nAudi R8 V8 coupe với hộp số S-tronic tăng tốc từ 0 lên 100 km/h sau 4,3 giây và tốc độ tối đa 300 km/h. Trong khi R8 V10 với hộp số S-tronic chỉ mất 3,6 giây và tốc độ tối đa 314 km/h.\r\nR8 nâng cấp sử dụng bộ vành lớn hơn, kích thước 18 inch với lốp trước 235/40 và lốp sau 285/35 cho bản V8, và vành 19 inch cùng lốp trước 235/35 và lốp sau 295/30 cho bản V10.\r\nAudi R8 bản nâng cấp có sự tham gia của động cơ V10 Plus.\r\nĐiểm đáng chú ý của R8 đời 2013 là động cơ V10 Plus và chỉ có trên phiên bản coupe. Mẫu xe mạnh nhất của R8 sử dụng phiên bản động cơ 5,2 lít V10 nay đã được chỉnh lại với công suất 542 mã lực và mô-men xoắn cực đại 540 Nm ở vòng tua máy 6.500 vòng/phút.\r\nVới hộp số S-tronic, bản R8 V10 Plus dẫn động 4 bánh tăng tốc từ 0 lên 100 km/h sau 3,5 giây và tốc độ tối đa 317 km/h. Mức tiêu hao nhiên liệu trung bình 12,9 lít/100 km. Dữ liệu với hộp số sàn 6 cấp là 3,8 giây, 319 km/h và 14,9 lít.\r\nAudi R8 đời 2013 đến với khách hàng Đức ở mức giá khởi điểm 136.000 USD cho bản V8 coupe, 150.000 cho bản V8 Spyder, 186.000 USD cho bản V10 coupe và 200.000 cho bản V10 Spyder. Riêng R8 V10 Plus giá từ 209.000 USD.\r\nDự kiến R8 nâng cấp sẽ được bán ra ở Mỹ vào đầu năm 2013. Ngoài ra, Audi cũng lên kế hoạch ra mắt phiên bản chạy điện của R8 tại triển lãm Paris (Pháp).', '0', NULL, 0, 1, 1),
(2, 'Những vật dụng cần thiết khi đi du lịch', 'Xuân về cũng là dịp thích hợp cho những chuyến chơi xa bằng ô tô cá nhân. Những chuyến đi tràn đầy tiếng cười sẽ tạo nên không khí vui vẻ trong những ngày đầu năm.', 'Xuân về cũng là dịp thích hợp cho những chuyến chơi xa bằng ô tô cá nhân. Những chuyến đi tràn đầy tiếng cười sẽ tạo nên không khí vui vẻ trong những ngày đầu năm.\r\nVà để chuẩn bị thật tốt cho những chuyến đi như thế, ngoài việc giữ gìn sức khỏe, bạn cần quan tâm đến các vật dụng cần mang theo. Nếu chuẩn bị chu đáo, những sự cố dọc đường sẽ không làm bạn bế tắc và niềm vui sẽ xuyên suốt chuyến đi.\r\nKhi đi du lịch, những vật dụng như giấy tờ tùy thân, kem đánh răng, thuốc đau bụng, thuốc cảm cúm... là những thứ không thể thiếu trong hành trang của bạn. \r\nGiấy tờ tùy thân: Chứng minh thư, kiểm tra vé máy bay và các giấy tờ đặt chỗ khách sạn hoặc các dịch vụ khác. Nếu là du lịch nước ngoài thì phải chuẩn bị hộ chiếu. Trong trường hợp có trẻ em đi kèm thì phải mang theo giấy khai sinh cho trẻ.\r\nTiền, thẻ ATM: Chuẩn bị tiền chi tiêu và dự phòng. Nếu đi du lịch nước ngoài thì việc không thể thiếu là phải đi đổi tiền của nước đó trước ngày lên đường.\r\nBạn cũng đừng quên mang theo thẻ ATM để đề phòng trường hợp hết tiền còn có thể gọi người thân nhờ hỗ trợ gửi tiền qua thẻ.\r\n\r\nTúi đồ trang điểm, sinh hoạt cá nhân: Các đồ dùng phục vụ cho sinh hoạt, vệ sinh cá nhân như kem dưỡng da, kem chống nắng, sữa tắm, sữa rửa mặt, gội đầu; Đặc biệt là bàn chải đánh răng và kem đánh răng là thứ không thể thiếu trong chuyến du lịch của bạn.\r\n\r\nKhăn giấy, khăn tay, khăn tắm: Bạn nên chuẩn bị khăn giấy ướt để tiện cho việc lau tay khi di chuyển trên xe hoặc khi ăn uống. Ngoài ra thì khăn mặt và khăn tắm cũng là thứ không thể thiếu trong chuyến hành trình của bạn, đồng thời đảm bảo vệ sinh cho mình.\r\n\r\nGel rửa tay khô: Bình thường, chúng ta không hay chú ý đến vật dụng này nhưng để đảm bảo sức khỏe cho mình và người thân trong những chuyến du lịch, bạn cần mang theo xà phòng diệt khuẩn để giữ cho đôi tay luôn sạch sẽ, giảm thiểu khả năng ngộ độc thực phẩm.\r\n\r\nTúi thuốc men, dụng cụ y tế: Bạn đừng quên chuẩn bị túi thuốc cá nhân khi đi du lịch như: thuốc cảm, băng cá nhân, oxy già, thuốc trị côn trùng cắn, dầu gió, thuốc đau bụng, thuốc kháng sinh thông dụng, thuốc say tàu xe, máy bay... để đề phòng những lúc bị cảm hay tai nạn bất ngờ, đêm hôm hay ở những chỗ xa lạ mà bạn không thể xoay xở được.\r\n\r\nGiày, dép đế mềm: Do phải di chuyển thường xuyên và đi bộ khá nhiều nên bạn cần chuẩn bị giày vải, thể thao mềm, đế bằng để dễ đi lại, leo trèo. Nếu đi biển thì bạn nên chuẩn bị thêm một đôi dép để đi dạo khi đi du lịch ở biển. Nếu mang giày cứng hay giày cao gót sẽ khiến chân bạn bị phồng rộp, đi lại khó khăn và không thể tận hưởng hết niềm vui của chuyến đi.\r\nMáy ảnh, đồ sạc và pin dự phòng: Máy ảnh thứ không thể thiếu để bạn ghi lại những khoảnh khắc và những cảnh đẹp những nơi bạn sẽ đến trong chuyến du lịch, để lưu giữ kỷ niệm cho gia đình. Bạn cần chuẩn bị thêm đồ sạc pin và một cặp pin dự phòng để không phải tiếc nuối vì không lưu giữ được những khoảnh khắc không có lần thứ hai.', '0', NULL, 0, 1, 0),
(3, 'Một số điều sửa đổi mới của ngành giao thông vận tải', 'Bộ Giao thông Vận tải đang tiến hành sửa đổi một số quy định về hoạt động vận tải và tiêu chuẩn nghề, điều kiện đối với lái xe khách chuyên nghiệp, lái xe taxi, lái xe tải đường dài.', 'Bộ Giao thông Vận tải đang tiến hành sửa đổi một số quy định về hoạt động vận tải và tiêu chuẩn nghề, điều kiện đối với lái xe khách chuyên nghiệp, lái xe taxi, lái xe tải đường dài.\r\n\r\nNhững quy định mới này sẽ siết chặt hơn nữa hoạt động kinh doanh vận tải.\r\n\r\nTheo đó, sẽ quy định chặt chẽ hơn nhưng quy định cũ về kinh doanh vận tải, điểm mới nhất trong quy định mới là có thể cá nhân không được kinh doanh vận tải hành khách. Chỉ doanh nghiệp mới được tham gia vận tải hành khách nhưng tiêu chuẩn để tham gia kinh doanh vận tải hành khách phải có bộ máy quản lý doanh nghiệp đầy đủ và có ít nhất 30 xe.\r\n\r\nQuản lý chặt chẽ doanh nghiệp và phương tiện\r\n\r\nNghiêm cấm cơ chế khoán doanh thu trong các đơn vị vận tải, điều này để tránh gây áp lực với các lái xe, một nguyên nhân chính trong việc chạy nhanh vượt ẩu để tranh giành khác giữa các xe. Hiện nay có rất nhiều hợp tác xã hoạt động vận tải theo kiểu các thành viên góp xe vào rồi mang danh hợp tác xã đi chở khách. Theo quy định mới, các hợp tác xã muốn kinh doanh hoạt động vận tải phải quản lý tập trung, tránh tình trạng tự phát của các chủ xe như hiện nay.\r\n\r\nCác doanh nghiệp kinh doanh vận tải khi tuyển dụng lao động vào lái xe phải ký hợp đồng lao động có thời hạn bằng văn bản, đóng bảo hiểm cho lái xe từ 3 tháng trở lên. Ngoài ra còn phải thực hiện đầy đủ các điều khoản về đảm bảo trật tự an toàn giao thông cũng như phải thực hiện khám sức khoẻ định kỳ cho lái xe. Những quy định này được đưa ra nhằm cột chặt trách nhiệm của chủ xe khi xảy ra tai nạn giao thông, tránh tình trạng chủ xe thường chối bỏ trách nhiệm khi xe bị tai nạn như hiện nay.\r\n\r\nTrong trường hợp các cơ quan chức năng chứng minh được việc chủ xe nào tạo sức ép làm cho lái xe phải bắt khách không đúng nơi quy định và gây hậu quả nghiêm trọng có thể bị khởi tố hình sự. Sẽ có quy định thời gian điều khiển xe ô tô của lái xe tối đa không quá 10 tiếng mỗi ngày và không liên tục quá 4 giờ. Theo đó sẽ có quy chế giám sát chặt chẽ việc thực hiện quy định này.\r\n\r\nLái xe cho doanh nghiệp vận tải phải được đảm bảo chế độ nghỉ theo luật lao động. Còn đối với lái xe, trong một năm có 3 lần vi phạm các quy định về an toàn giao thông mà có quyết định xử phạt của cảnh sát giao thông thì sẽ bị đình chỉ lái xe 6 tháng\r\n\r\nTheo Cục Quản lý đường bộ, Cục sẽ đề nghị Bộ Giao thông Vận tải quy định việc tổ chức học và kiểm tra chặt chẽ kiến thức về Luật giao thông đường bộ cho những lái xe vi phạm các quy định của pháp luật về trật tự an toàn giao thông. Hướng dẫn thu hồi không thời hạn giấy phép lái xe, bổ sung thêm một số quy định mức độ vi phạm luật của lái xe và phải sát hạch lại.\r\n\r\nTheo quy định mới, khi đổi giấy phép lái xe phải học lại Luật giao thông như thi lần đầu. Các cơ sở đào tạo lái xe phải bổ sung một số điều khoản chi tiết về trách nhiệm của cơ sở đào tạo và người học trong hợp đồng đào tạo. Tất cả những quy định mới này nhằm hạn chế tình trạng có giấy phép lái xe nhưng đi học chỉ mang tính hình thức, chất lượng không thật.\r\n\r\nCục cũng đã đề nghị Thủ tướng cho phép thành lập đoàn kiểm tra liên ngành, đặt trạm kiểm soát cố định tại các tỉnh Nghệ An, Quảng Ngãi và Bình Thuận để kiểm soát hoạt động của các lái xe. Thực tế hiện nay có nhiều doanh nghiệp kinh doanh vận tải nhỏ lẻ, thậm chí hộ gia đình kinh doanh vận tải hành khách chỉ có 1 đến 2 xe chở khách nhưng núp dưới danh nghĩa hợp tác xã để hoạt động. Do đó những quy định mới này không gây khó dễ cho doanh nghiệp kinh doanh vận tải lớn mạnh thực sự mà còn tạo điều kiện cho họ phát triển và cạnh tranh tốt hơn.\r\n\r\nTheo ông Nguyễn Văn Thanh, Phó cục trưởng Cục Đường bộ Việt Nam, Chính phủ cần có cơ chế chính sách riêng áp dụng cho việc phát triển các doanh nghiệp vận tải ôtô và bến xe vì đây là loại hình doanh nghiệp mang tính chất dịch vụ công cộng. Phải thừa nhận là việc xây dựng quy hoạch hệ thống bến xe ở các địa phương đang quá sơ sài. Hiện nay kinh doanh bến xe gần như vẫn mang tính độc quyền, hệ thống các trạm nghỉ dọc đường, nhà chờ... triển khai quá chậm.\r\n\r\nÔng Thanh nói: “Đây là vấn đề chúng tôi đang tìm cách giải quyết nếu không các lái xe lại cho rằng họ bắt khách, dừng đỗ dọc đường là do thiếu trạm nghỉ, bến đỗ. Nhà nước cũng cần có cơ chế chính sách đối với các dịch vụ làm bến xe, trạm nghỉ, nhà chờ vì đây thuộc danh mục công trình công cộng. Các doanh nghiệp kinh doanh vận tải đã phải nộp một khoản phí để duy trì sự hoạt động của những bến xe, trạm nghỉ, nhà chờ...”', '0', NULL, 0, 1, 1),
(4, 'Quy định hiện hành về lệ phí trước bạ đối với ôtô, xe máy', 'Theo quy định của Thông tư số 95/2005/TT-BTC ngày 25-10-2005 của Bộ trưởng Bộ Tài chính "Hướng dẫn thực hiện các quy định pháp luật về lệ phí trước bạ". Theo đó, lệ phí trước bạ đối với ôtô, xe máy quy định có một số nội dung đáng chú ý', 'Theo quy định của Thông tư số 95/2005/TT-BTC ngày 25-10-2005 của Bộ trưởng Bộ Tài chính "Hướng dẫn thực hiện các quy định pháp luật về lệ phí trước bạ". Theo đó, lệ phí trước bạ đối với ôtô, xe máy quy định có một số nội dung đáng chú ý như sau:\r\n\r\n1. Ô tô từ 7 chỗ ngồi trở xuống (trừ ô tô hoạt động kinh doanh vận tải hành khách có giấy phép kinh doanh) và xe máy (không phân biệt xe mới 100% hay xe đã qua sử dụng) quy định nộp lệ phí trước bạ lần đầu là 5% (năm phần trăm). Đối với ôtô chở người từ 7 chỗ ngồi trở xuống hoạt động kinh doanh vận tải hành khách, quy định lệ phí trước bạ là 2% (hai phần trăm).\r\n2. Đối với ô tô từ 7 chỗ ngồi trở xuống (trừ ô tô hoạt động kinh doanh vận tải hành khách có giấy phép) và xe máy kê khai nộp lệ phí trước bạ lần thứ hai trở đi (nếu đã nộp lệ phí trước bạ lần đầu theo quy định trên) quy định lệ phí trước bạ là 2% (hai phần trăm) đối với ôtô và 1% (một phần trăm) đối với xe máy.\r\n\r\n3. Đối với các loại ô tô khác (kể cả rơ moóc, sơ mi rơ moóc, xe bông sen, xe công nông quy định lệ phí trước bạ là 2% (hai phần trăm).\r\n\r\n4. Tổ chức, cá nhân nhận tài sản thuộc đối tượng chịu lệ phí trước bạ có trách nhiệm: mỗi lần nhận (mua, được cho, được thừa kế...) tải sản ô tô, xe máy phải kê khai lệ phí trước bạ với cơ quan thuế theo đúng mẫu tờ khai và chịu trách nhiệm về tính chính xác của việc kê khai.\r\n\r\n5. Thời hạn quy định phải kê khai lệ phí trước bạ chậm nhất là 30 (ba mươi) ngày, kể từ ngày làm giấy tờ chuyển giao tài sản hợp pháp giữa hai bên hoặc ngày được xác nhận của cơ quan Nhà nước có thẩm quyền về hồ sơ tài sản hợp pháp.\r\nA.T.G.T', '0', NULL, 0, 1, 1),
(5, 'Du lịch Đồng Tháp', 'Về với Đồng Tháp du khách như trở về với cội nguồn thiên nhiên bởi bầu không khí trong lành, mát mẻ của những cánh đồng lúa phì nhiêu, đi trên những chiếc xuồng ba lá...', 'Về với Đồng Tháp du khách như trở về với cội nguồn thiên nhiên bởi bầu không khí trong lành, mát mẻ của những cánh đồng lúa phì nhiêu, đi trên những chiếc xuồng ba lá trên sông rạch để đến với khu di tích cụ Phó Bảng Nguyễn Sinh Sắc, khu di tích Gò Tháp, vườn sếu quý hiếm ở Tam Nông,... Còn gì bằng khi ta được thưởng thức những đặc sản mang hương vị thân thương của vùng sông nước miền Tây.\r\nĐồng Tháp là một tỉnh nằm trong khu vực đồng bằng sông Cửu Long, một trong ba tỉnh của vùng đồng Tháp Mười. Đồng Tháp cách Sài Gòn 170km và cách Hà Nội 1.862km. Mời du khách cùng đồng hành với thuexegiare.net đến vùng đất bình yên này.\r\n\r\nLăng cụ phó bản\r\nLăng cụ Phó bảng ở thành phố Cao Lãnh, đây là công trình ghi ơn cụ Phó bảng Nguyễn Sinh Sắc, nhà nho yêu nước và là thân phụ Chủ tịch Hồ Chí Minh.\r\nToàn bộ khu di tích rộng 3,6ha, chia làm hai cụm kiến trúc: mộ và nhà lưu niệm cụ Phó bảng, nhà sàn và ao sen Bác Hồ. Đối diện với cổng vào là lăng mộ cụ Phó bảng, mái hình bàn tay úp, phía trên mái là chín con rồng - biểu tượng của các tỉnh miền tây.\r\n\r\nTại khu di tích có rất nhiều cây cảnh, hoa quý được nhân dân hiến tặng hoặc đưa về từ nhiều miền của đất nước, trong đó đặc biệt là cây khế gần 300 tuổi (nằm bên trái mộ) và cây sộp hơn 300 tuổi (nằm bên phải mộ). Trong nhà lưu niệm trưng bày nhiều hiện vật, tư liệu liên quan đến những năm tháng cụ Sắc sống và làm việc, nhất là thời gian ở Cao Lãnh và vùng đất Nam Bộ. Mọi thứ đều toát lên vẻ uy nghi mà giản gị, trang trọng mà gần gũi.\r\nHàng năm, cứ vào ngày 27/10 âm lịch, bà con nhiều nơi hội tụ về đây tổ chức lễ giỗ cụ Phó bảng Nguyễn Sinh Sắc trong không khí trang nghiêm và đông vui như một ngày hội lớn ở địa phương.\r\nHàng triệu du khách trong và ngoài nước đã đến Đồng Tháp tham quan và viếng mộ cụ Phó bảng Nguyễn Sinh Sắc, thể hiện lòng biết ơn đối với Người đã có công sinh thành Bác Hồ muôn vàn kính yêu.\r\n\r\nVườn quốc gia Tràm Chim\r\nVườn quốc gia Tràm Chim thuộc địa phận 7 xã: Tân Công Sinh, Phú Đức, Phú Thọ, Phú Thành A, Phú Thành B, Phú Hiệp và thị trấn Tràm Chim, huyện Tam Nông tỉnh Đồng Tháp, được ví là một Đồng Tháp Mười thu hẹp với hệ sinh vật phong phú, đa dạng của vùng ngập nước.\r\nVườn Quốc gia Tràm Chim có diện tích 7.588ha. Là nơi sinh sống của nhiều loài thực vật, gần 200 loài chim nước, chiếm khoảng 1/4 số loài chim có ở Việt Nam, trong đó có nhiều loài chim quý hiếm trên thế giới. Loài chim điển hình nhất và được nhiều người biết đến ở đây là sếu đầu đỏ. Ðến đây, du khách được tận mắt ngắm nhìn những con sếu đầu đỏ - một trong số 15 loài sếu còn tồn tại trên thế giới đang có nguy cơ diệt chủng. Sếu to cao trên 1,7m, bộ lông xám mượt, cổ cao, đầu đỏ, đôi cánh rộng.\r\nHằng năm từ cuối tháng 12 đến đầu tháng 5 là lúc đàn sếu bay về Tràm Chim cứ trú. Đến đây vào thời gian này, bán sẽ chứng kiến từng đàn sếu bay về hòa cùng các loài chim khác để kiếm ăn. Chính vì thế mà từ lâu cái tên Tràm Chim đã trở nên quen thuộc với báo chí và nhiều tổ chức quốc tế.\r\nVườn quốc gia Tràm Chim đã được Nhà nước đầu tư, nâng cấp, mở rộng thành một bảo tàng thiên nhiên, một trung tâm du lịch sinh thái hấp dẫn. Nhiều tổ chức bảo tồn thiên nhiên quốc tế cũng tài trợ để bảo vệ tràm chim quý hiếm này. Đây chính là điểm hẹn lý tưởng cho du khách bốn phương.', '0', NULL, 0, 1, 0),
(6, 'Cần lưu ý gì khi có trẻ nhỏ theo cùng?', 'Để giúp các khách hàng, đặc biệt là các gia đình có con nhỏ tận hưởng những chuyến hành trình an toàn và vui vẻ khi sử dụng xe hơi, chúng tôi xin chia sẻ một số kinh nghiệm hữu ích khi đi xe có trẻ nhỏ ', 'Nên để trẻ ngồi phía sau\r\nTrẻ em dưới 2 tuổi được khuyên nên sử dụng loại ghế ngồi chuyên dụng dành cho trẻ sơ sinh. Từ 4 đến 9 tuổi, trẻ sẽ dùng qua các loại ghế ngồi khác nhau để phù hợp với chiều cao và cân nặng của từng thời kì.\r\nGhế chuyên dụng cho trẻ em có nhiều kiểu dáng khác nhau, tuy nhiên về cơ bản nó được thiết kế đảm bảo độ êm ái và cũng có đầy đủ các chức năng như dây đai an toàn với 4 điểm đeo như balo, tựa đầu, nghỉ tay và vị trí để chai nước/ sữa. Qua 9 tuổi mới là thời điểm trẻ có thể sử dụng ghế ngồi của xe hơi với dây đeo an toàn như người lớn. Khi lựa chọn ghế ngồi cho trẻ, các gia đình cũng nên nắm vững cách thức lắp đặt và sử dụng của từng loại để có thể đạt hiệu quả sử dụng cao nhất.\r\nLuôn thắt dây an toàn khi đi xe\r\nĐặc điểm của trẻ nhỏ là rất nhớ và học theo hành động của người lớn, vì vậy cha mẹ hãy luôn thắt dây an toàn khi lái xe để các bé học theo. Với các em bé nhỏ dưới 9 tuổi, cha mẹ cần trợ giúp các bé ngồi vào ghế chuyên dụng và đeo dây an toàn. Với các cháu lớn hơn cũng cần hướng dẫn các bé cách đeo dây an toàn và sử dụng dây đai an toàn trong suốt hành trình.\r\nKhi xuống xe, hướng dẫn các bé chỉ xuống cửa bên trong phía lề đường để tránh tai nạn khi mở cửa. Tốt nhất là đợi xe dừng hẳn và bố mẹ xuống mở cửa cho các con.\r\nChuẩn bị những vật dụng cần thiết\r\nKhông chỉ trẻ sơ sinh mà trẻ mới lớn cũng luôn có rất nhiều nhu cầu bất chợt trong khi đang lái xe, vì vậy, để tập trung lái xe an toàn, việc chuẩn bị những vật dụng “cần kíp” là vô cùng cần thiết. Tuy nhiên, đù đã có đầy đủ đồ dùng, trẻ luôn cần có người lớn ngồi chung ở hàng ghết sau để đảm bảo tránh xao nhãng cho người cầm lái trong suốt quãng đường đi.\r\nMột số thói quen nên tránh\r\n- Không để các bé ngồi hay chơi một mình ở ghế phía trước\r\n- Không để các bé ngồi vào lòng khi đang lái xe\r\n- Không hạ kính của sổ để các bé thò tay hoặc đầu ra ngoài\r\n- Không để các bé tự mở cửa từ bên trong. Đặc biêt chú ý sử dụng khóa cửa trẻ em trên 2 cánh cửa phía sau\r\n- Không để các bé ở trên xe một mình khi xe đang nổ máy.', '0', NULL, 0, 0, 1),
(7, 'Ý nghĩa của đèn cảnh báo trên xe hơi', 'Trên các xe hơi đời mới có rất nhiều đèn, biểu tượng, để cảnh báo người lái về tình trạng kỹ thuật của xe. Thực tế, chỉ cần phân biệt được màu sắc đèn: xanh, chú ý; vàng, cảnh báo; đỏ, nguy hiểm, cũng đã rất hữu ích. Sau đây là một số kiểu đèn, tín hiệu, ', 'Trên các xe hơi đời mới có rất nhiều đèn, biểu tượng, để cảnh báo người lái về tình trạng kỹ thuật của xe. Thực tế, chỉ cần phân biệt được màu sắc đèn: xanh, chú ý; vàng, cảnh báo; đỏ, nguy hiểm, cũng đã rất hữu ích. Sau đây là một số kiểu đèn, tín hiệu, biểu tượng thường gặp và ý nghĩa của chúng.\r\n\r\nThông thường khi bật chìa khoá, toàn bộ đèn trên bảng điều khiển sẽ sáng lên nhưng sau vài giây sẽ tắt ngay.Nếu các đèn báo vẫn sáng thì có 3 màu thông thường để cảnh báo về cấp độ: xanh, chú ý, ví như đèn tín hiệu xin đường chưa tắt; vàng, cảnh báo có thể có nguy hiểm , như xe sắp hết xăng; đỏ, nguy hiểm, như đèn báo mất áp lực dầu. \r\n\r\nNếu bình thường không đèn cảnh báo nào sáng . \r\nCác loại đèn màu xanh (nếu sáng trong khi xe hoạt động) thường chỉ là đèn nhắc người lái về tình trạng hoạt động thiết bị, như đèn báo tín hiệu đang bật, đèn pha đang ở chế độ chiếu xa, điều hoà đang bật...Những loại đèn này không ảnh hưởng đến tính an toàn của xe. \r\n\r\nCác đèn màu vàng cảnh báo về các sự cố (hoặc nguy cơ) đã hoặc có thể xảy ra như nhiên liệu sắp hết với biểu tượng hình máy bơm xăng, hay có trục trặc với hệ thống phanh chống bó cứng ABS với biểu tượng hình tròn và chữ ABS ở trong (ở nhiều xe chỉ có chữ ABS màu vàng). \r\n\r\nVới các loại đèn báo này, cấp độ nguy hiểm chưa cao, có thể bơm thêm xăng; hệ thống ABS có thể hoạt động kém, hoặc mất hẳn chế độ phanh chống bó cứng, tuy nhiên phanh vẫn có hiệu lực và xe vẫn có thể duy trì tốc độ chậm để đến các gara kiểm tra. \r\n\r\nĐèn vàng với biểu tượng bánh răng với dấu ! ở giữa (trên các xe số tự động). Đã có trục trặc ở hộp số tự động. Trường hợp này nếu không có tiếng động lạ, tiếng kim loại cọ xát, hãy lái xe tới một gara gần nhất nhưng hạn chế tăng, giảm ga đột ngột, hoặc tốc độ cao. \r\n\r\nĐèn báo vàng biểu tượng hình cốc lọc trên các xe diesel sau khi động cơ đã khởi động. Đã có nước trong cốc lọc, hoặc mức nước trong lọc đã vượt ngưỡng cho phép. Thông thường, sẽ không có gì nguy hiểm nếu ngay sau đó cốc lọc được vệ sinh hay thay mới.\r\n\r\nĐặc biệt nguy hiểm là các đèn báo tín hiệu màu đỏ. Với các loại đèn này, khi phát hiện ra cần phải có cách xử lý ngay lập tức. Nếu bạn không có hiểu biết về chiếc xe đang lái, hãy dừng xe, tắt máy ngay lập tức và liên hệ với người có chuyên môn để nhờ tư vấn.\r\n\r\nNếu không ai giúp, cách tốt nhất là gọi một chiếc xe cứu hộ. Nên kéo xe về một gara gần nhất để kiểm tra.', '0', NULL, 0, 1, 1),
(8, 'Ăn gì để tránh say tàu xe', 'Kỳ nghỉ lễ  sắp đến, nếu bạn vẫn còn lo ngại chuyện say xe trong các chuyến đi xa. Hãy tham khảo một số món ăn sau', 'Kỳ nghỉ lễ  sắp đến, nếu bạn vẫn còn lo ngại chuyện say xe trong các chuyến đi xa. Hãy tham khảo một số món ăn sau:\r\n- Nước lõi cải trắng: Lõi cải trắng 1 chiếc, gừng tươi 3 lát, đường đỏ 60g. Lõi cải trắng thái mỏng, cho vào nồi nước nấu chín. Cho đường đỏ vào cùng nấu kỹ .\r\n- Trà gừng, đường đỏ: Gừng tươi 1 củ, đường đỏ vừa đủ. Gừng tươi cạo vỏ, thái chỉ. Cho gừng vào cốc, bỏ đường đỏ vào, rót nước sôi hãm trong 15 phút.\r\n- Nhân hạt bí đao: Nhân hạt bí đao 400g đem phơi, sấy cho khô, nghiền thành bột. Mỗi lần uống 10g, ngày uống 2 lần.\r\n- Rễ mướp hầm thịt nạc: Rễ mướp 300g, thịt heo nạc 200g, muối vừa đủ. Rễ mướp rửa sạch, cắt khúc. Thịt heo rửa sạch, thái miếng mỏng. Cho rễ mướp vào nồi nước sôi nấu chín, cho tiếp thịt vào, nêm muối hầm kỹ là được.\r\n- Dưa chuột nấu trai: Dưa chuột 70g, thịt trai 60g, muối vừa đủ. Cho thịt trai vào nồi, đổ nước nấu chín. Dưa chuột rửa sạch, thái nhỏ, cho vào nấu cùng. Nêm muối vừa miệng là được.\r\n- Nước sinh tố nho, rau cần: Nho 60g, rau cần 60g. Rau cần rửa sạch, thái đoạn nhỏ. Nho rửa sạch, cho cùng rau cần vào máy xay sinh tố xay nhuyễn để uống.\r\n- Trà cà rốt, vỏ trứng: Cà rốt 200g, vỏ trứng gà 20g, đường phèn 15g. Cà rốt, vỏ trứng rửa sạch, thái vụn.Cho cả vào nồi, chế đủ nước, ninh kỹ, cuối cùng cho đường phèn vào.\r\n- Rau cần xào trứng gà: Rau cần 80g, trứng gà 1 quả. Rau cần rửa sạch, thái đoạn. Cho rau cần vào chảo xào, đập trứng trộn lẫn, đảo tiếp đến khi chín.\r\nMột số lưu ý khác:\r\n\r\n- Trước khi đi tàu xe không nên ăn quá no hoặc để bụng quá đói, không uống nhiều nước, tránh uống rượu, hút thuốc và tránh những mùi dễ gây nôn như: mùi xăng dầu, khói xe, thức ăn nhiều dầu mỡ và những thức ăn mình không thích ăn.\r\n- Cũng có thể uống một số thuốc chống say trước khi đi tàu xe vài giờ để hòa hoãn và giải trừ triệu chứng buồn nôn chóng mặt.\r\n- Chọn vị trí ngồi ít chòng chành (tránh chỗ bánh sau của xe) để hạn chế chóng mặt, buồn nôn và không ngồi ở chỗ có gió mạnh thổi thẳng vào mặt; buộc một nhánh tỏi đã bóc vỏ vào cổ tay cũng có tác dụng chống say xe.', '0', NULL, 0, 1, 1),
(9, 'Rolls-Royce khoe Ghost Majestic Horse tại Bangkok', 'Hãng xe siêu sang Anh đưa phiên bản năm Giáp Ngọ 2014 đến triển lãm ôtô Thái Lan và kèm giá bán 875.000 USD.', 'Ghost Majestic Horse ra mắt hồi tháng 11/2013. "Phi Mã" là phiên bản đặc biệt chào đón năm Giáp Ngọ 2014. Qua nghệ thuật khảm thủ công, trên Rolls-Royce Ghost sẽ tái hiện hình ảnh chú ngựa (Ngọ) trên bảng điều khiển ốp gỗ (Mộc). Trên tựa đầu và gối đệm, hình ngựa cũng thêu thủ công. Nhân vật chủ đạo cũng xuất hiện ở bên ngoài, trên đường kẻ đôi dưới cột A.\r\nTrước đó, nhân dịp năm con Rồng 2012, Rolls-Royce cho ra đời Phantom phiên bản Year of Dragon, nhằm tôn vinh thị trường lớn nhất của hãng là Trung Quốc. Năm 2013, hãng xe Anh kỷ niệm một thập kỷ có mặt tại Singapore với chương trình Bespoke cho mẫu Ghost phiên bản kéo dài.\r\n\r\nGhost Majestic Horse có mặt tại Bangkok Motor Show 2014, xe trang bị động cơ V12 phun xăng trực tiếp, công suất 563 mã lực tại vòng tua máy 5.250 mã lực và mô-men xoắn 780 Nm tại 1.500 vòng/phút. Thời gian tăng tốc từ vị trí xuất phát lên 100 km/h trong 4,9 giây trước khi đạt tốc độ tối đa 250 km/h.\r\n\r\nTại Thái Lan, Rolls-Royce chào bán Ghost phiên bản "Phi Mã" với giá 875.000 USD.', '0', NULL, 0, 1, 1),
(10, 'Dartz Prombron - xe chống đạn phiên bản "Bạch Mã"', 'Hãng xe Dartz trình làng mẫu xe chống đạn dành riêng cho đại gia Trung Quốc và lấy cảm hứng theo năm Giáp Ngọ.', 'Tiếp nối Black Dragon, Prombron White Horse lấy cảm hứng theo năm ngựa của người châu Á. Cũng giống bản "rồng đen", "bạch mã" dựa trên phiên bản kéo dài của Prombron và độc đáo với thiết kế 3+1 cửa.\r\n\r\nĐộng cơ của "bạch mã" là loại V8 lấy từ General Motors công suất 450 mã lực. Dartz cho biết, Prombron White Horse giống như chiếc xe bán tải sang trọng và trang bị nhiều tiện ích hiện đại dành cho khách hàng. Xe sẽ ra mắt trong tháng 4 và giá bán chưa công bố.', '0', NULL, 0, 1, 1),
(11, 'Xế độ Mercedes-Benz S-Class Carlsson', 'Chiếc sedan hạng sang cao cấp S-class 2014 được người thợ độ xe thay đổi ngoại hình trở nên hấp dẫn hơn.', 'Mercedes S-Class trở nên ấn tượng hơn dưới đôi bàn tay của những ngườu thợ Đức, đáng chú ý nhất đây không phải là một phiên bản được thay đổi của S-Class mà Carlsson từng ra mắt vài năm trước, mà đây là một mẫu S-Class 2014.\r\n\r\nCarlsson thay đổi khá nhiều cả nội thất cũng như bề ngoài. Đồng thời có hai kiểu vành khác nhau. Cản trước mới, cản hai bên hông và bộ khuếch tán phía sau với bốn ống xả rất độc đáo.\r\n\r\nS-class 2014 ra mắt tháng 5 năm ngoái tại Đức, với thiết kế ngoại hình có nhiều thay đổi so với thế hệ xe trước đó với thân xe mới được làm từ nhôm. Trên phiên bản S550, động cơ V8 4,7 lít tăng áp kép có công suất cực đại 448 mã lực và mô-men xoắn 700 Nm.', '0', NULL, 0, 1, 1),
(12, 'Honda HR-V chính thức ra mắt', 'Mẫu SUV đô thị phiên bản sản xuất dành cho thị trường Mỹ ra mắt tại New York Auto Show 2014 và sẽ đến tay khách hàng vào cuối 2014.', 'HR-V là tên gọi khác của Honda Vezel tại thị trường Mỹ và sử dụng chung nền tảng với mẫu Fit 2015. HR-V ra mắt sẽ đứng dưới CR-V và Honda kỳ vọng cả hai mẫu xe này sẽ chinh phục phân khúc SUV tại Mỹ.\r\nPhiên bản sản xuất HR-V dành cho Mỹ không khác nhiều về ngoại hình so với Vezel tại Nhật, chỉ với những thay đổi nằm ở thanh ngang trên lưới tản nhiệt và hệ thống đèn pha. Gương chiếu hậu nhỏ hơn do loại bỏ đèn xi-nhan.\r\n\r\nHãng xe Nhật cho biết, HR-V sẽ có khoang nội thất linh hoạt và rộng rãi nhờ cách bố trí bình xăng duy nhất ở trung tâm và trang bị ghế ngồi Magic độc quyền của Honda. Loại ghế này có thể lưu nhiều vị trí ngồi và hàng ghế thứ 2 có thể gập lại bằng phẳng để tăng không gian vận chuyển hàng hóa.\r\n\r\nHonda không cung cấp thêm thông tin chi tiết về HR-V. Theo Carscoops, do sử dụng chung nền tảng của FIT, nên HR-V có thể cũng sẽ trang bị động cơ 1,5 lít 4 xi-lanh, phun xăng trực tiếp và kết nối với hộp số CVT và Honda đang xem xét cung cấp thêm bản tăng áp turbin trên động cơ tương tự.\r\n\r\nHonda HR-V sẽ đến tay khách hàng Mỹ vào cuối năm 2014.', '0', NULL, 0, 1, 1),
(13, 'Toyota Camry Mỹ mới - rũ bỏ quá khứ', 'Chiếc sedan mới thay đổi lớn về thiết kế, bỏ hoàn toàn sự trung tính vốn có. Xe sẽ bán ra tại Mỹ trong năm 2014 cùng 4 phiên bản.', 'Sau 3 năm kể từ khi thế hệ mới trình làng tại Mỹ, Toyota Camry được cải tiến với diện mạo hoàn toàn khác. Động thái này coi là lời đáp trả của Toyota trong cuộc đối đầu với Hyundai Sonata tại Mỹ.\r\n\r\nNgoại hình của Camry 2015 thay đổi nhẹ so với hiện hành như dài hơn 45 mm và rộng hơn 10 mm. Thay đổi đặc biệt đáng chú ý tập trung ở phần đầu xe với lưới tản nhiệt rộng, hốc gió mở lớn.\r\n\r\nNhững gì được gọi là "trung tính" đã không còn. Camry giờ đây gợi tới sự cá tính, thiên về thể thao. Những người yêu thích Toyota chắc chắn sẽ không dễ làm quen với kiểu cách có phần thiếu sự sang trọng này. Nhưng thay đổi luôn là đòi hỏi thường xuyên.\r\nCụm đèn pha trên Camry thế hệ mới cũng thiết kế lại từ kiểu dáng của JDM Toyota Sai và Corolla dành cho thị trường Mỹ, nhưng vẫn giữ được nét đặc trưng riêng. Đèn pha mới kiểu dáng đẹp với đèn xi-nhan tích hợp đèn LED mạnh mẽ hơn.\r\n\r\nBên trong, Camry 2015 với nội thất cải thiện tính tiện nghi. Tùy thuộc vào từng phiên bản, với các tùy chọn từ vải cao cấp đến bọc da cùng những đường chỉ khâu tương phản hình quả trám.\r\nBảng điều khiển trung tâm thiết kế lại với màn hình TFT 4.2 inch mới. Hộc chứa đồ mới cung cấp nguồn điện 12 V, USD và hệ thống sạc không dây cho điện thoại thông minh. Toyota cho biết Camry 2015 cải thiện khả năng cách âm thêm 30%.\r\n\r\nĐộng cơ giống trên bản hiện hành gồm 2,5 lít 4 xi-lanh hoặc 3,5 lít V6, cả hai đều trang bị hộp số tự động 6 cấp. Bản Hybrid với sự kết hợp của động cơ 2,5 lít Atkinson 4 xi-lanh kết hợp với động cơ điện và hộp số E-CVT.\r\n\r\nToyota Camry 2015 sẽ đến tay khách hàng Mỹ vào mùa thu năm nay với 4 phiên bản gồm XSE, Hybird SE, LE và XLE.', '0', NULL, 0, 1, 1),
(14, '''Siêu môtô'' Can-Am tự chế của người Việt', 'Tự làm thủ công tất cả các công đoạn, người thợ chế xe khuyết tật ở Việt Nam đã tạo ra một chiếc Can-Am với giá chi phí khoảng 50 triệu đồng.', 'Sau khi sơn vỏ, lên hình dáng hoàn thiện, nhiều người không thể ngờ được chiếc Can-Am của anh Nguyễn Văn Thắng (Hà Nội), thợ chuyên chế xe cho người khuyết tật chỉ là sản phẩm thủ công với chi phí khoảng 50 triệu. Với một chiếc Can-Am "thật", giá bán ở Mỹ đã vào khoảng gần 25.000 USD.\r\n\r\nYêu thích những chiếc xe ba bánh lại có kinh nghiệm chế xe nên anh Thắng quyết định tự tạo cho mình chiếc Can-Am "Made in Vietnam". Điều đặc biệt, mẫu môtô này không sử dụng các bộ phận của chuyên một thương hiệu nào mà là tổng hợp từ nhiều nguồn như xe máy, ôtô, bất cứ thứ gì có thể gắn lên xe.\r\n"Mình toàn tự mò chế mọi thứ nên không có bản vẽ, giấy tờ tính toán gì trước cả, cứ làm đến đâu sửa đến đó thôi", anh Thắng tâm sự. Từ khung, thân xe được gò hàn tỉ mẩn bằng tay rồi mang đi sơn. Xác định dựng xe để chơi chứ không vì mục đích thương mại, nên xe được làm vào những lúc rảnh rỗi, cẩn thận từng chi tiết.\r\n\r\nĐộng cơ chiếc môtô tự chế là loại 150 phân khối của Honda @, công suất 15 mã lực. Nếu so với Can-Am thật là cỗ máy 1.000 phân khối, công suất 106 mã lực thì chiếc "Made in Vietnam" thật nhỏ bé.\r\n\r\nVì đã quen chế ba bánh cho người khuyết tật nên xe nhanh chóng được hoàn thành phần bánh trước với hai giảm xóc, hệ thống càng chữ A. Ở hệ truyền động, anh Thắng lắp thêm cho xe hộp số lùi tự chế vốn đã được nhiều khách hàng ưa thích từ lâu. Để tiện sử dụng, số lùi được điều khiển qua một cần ngay dưới sản để chân.\r\n\r\nCác bộ phận khác trên xe được lắp ghép từ nhiều nguồn như bảng đồng hồ cỡ lớn của Daewoo Matiz, bộ đề, tay ga của Honda CM. Lốp trước cũng của Matiz với cỡ 13 inch, lốp sau 16 inch của xe ga. Xe dùng hai phanh đĩa bánh trước, phanh tang trống bánh sau.\r\n\r\nThiết kế vừ đủ để chạy lòng vòng quanh nhà chứ không có nhu cầu tham gia giao thông công cộng nhưng chiếc môtô ba bánh cũng khá đầm ở tốc độ khoảng 40 km/h. Đi nhanh hơn dễ trùng triềng và vào cua không vững. Nhiều người hỏi khi nào bán, anh Thắng nói đùa "để xe chụp ảnh chứ bán lấy gì chụp, mất vui".', '0', NULL, 0, 1, 1),
(15, 'Jeep Wrangler rồng về Việt Nam có giá hơn 2,7 tỷ đồng', 'Một chiếc Jeep Wrangler về nước với giá gần 3 tỷ, đây là một trong những model trong các sản phẩm rồng xuất hiện tại Việt Nam.', 'Một showroom tư nhân đã nhập khẩu về Việt Nam một chiếc Jeep Wrangler phiên bản rồng 2014. Đây chính là mẫu xe đã có mặt tại Triển lãm ôtô Trung Quốc 2012 và đến năm 2013 thì bán ra tại thị trường Bắc Mỹ và Trung Quốc.\r\nỞ những chiếc Rolls-Royce “rồng” hay Toyota Camry “độ rồng”, hình ảnh của loài vật này thường được thể hiện ở những đường tem nhỏ chạy dọc thân xe, tượng trưng bằng vảy rồng óng ánh. Ngược lại, ở chiếc Jeep Wrangler “rồng”, hãng xe Mỹ đã bê nguyên hình một con rồng Trung Quốc màu chì “bò” từ cửa xe bên lái lên nắp ca-pô. Hộp chứa lốp treo trên cửa sau cũng được vẽ nguyên bộ mặt rồng.\r\n\r\nVì được phát triển từ mẫu Jeep Wrangler Sahara (5 cửa) nên thân xe dài, khi phối màu chì của chú rồng cuốn trên nền sơn đen, kết hợp với những chi tiết mạ đồng vàng ở vành 5 chấu 18 inch, mặt tản nhiệt, hốc đèn pha, logo, đã tạo nên một bức tranh sống động, lôi cuốn. Ngay cả những con ốc ở nắp bình xăng cũng mạ màu đồng vàng.\r\n\r\nBước vào bên trong, màu sắc ánh đồng sẽ là điểm nhấn đập vào mắt khi xuất hiện trên mặt chấu vô-lăng, nẹp tay nắm trước mặt hàng ghế phụ, nẹp tay nắm cửa, viền đồng hồ bảng tap-lô. Đặc biệt, hàng ghế đầu bọc da Nappa giả vân rồng, in kiểu khắc hình rồng nổi ở tựa ghế. Những đường chỉ màu ở các mép ghế cũng góp phần gia tăng mức độ quan trọng mà Jeep muốn nhắc đến trong phiên bản này.\r\nNgoài những chi tiết “dấu ấn rồng” như trên, nội thất Jeep Wrangler rồng cũng không có gì cầu kỳ hơn so với phiên bản thường. Gam màu trung thành của mẫu xe này vẫn là đen, ngay cả ốp cửa điều hòa cũng chỉ khác biệt là màu đen bóng. Do tính chất của dòng xe này vẫn là chuyên off-road nên yếu tố giải trí chỉ dừng lại ở bộ loa Alpine với các loa hàng ghế trước, sau, treo trần, phiên bản về Việt Nam dùng màn hình trung tâm loại nhỏ, có kết nối Bluetooth, đàm thoại không dây. Thêm tiện ích ổ cắm 150V phục vụ các thiết bị chạy điện công suất lớn khi đi dã ngoại.\r\n\r\nĐộng cơ trang bị cho phiên bản này là loại V6 3.6L, dẫn động 4 bánh với cần số cài cầu riêng biệt, hộp số tự động, công suất cực đại là 285 mã lực và mô-men xoắn lớn nhất 352 Nm. Mức tiêu thụ nhiên liệu trong thành phố khoảng 14,7 lít/100km và đường cao tốc là 11,2 lít/100km.', '0', NULL, 0, 1, 1),
(16, 'Lộ ảnh garage siêu xe triệu đô của đại gia Sài thành', 'Bộ sưu tập của đại gia trẻ nổi bật với những siêu phẩm như Bugatti Veyron, Lamborghini Murcielago LP670-4 SV hay Murcielago màu xanh cốm.', 'Cuối tháng 8/2013, lần đầu tiên hình ảnh garage siêu xe triệu đô ở Sài Gòn được đăng tải lên mạng xã hội. Những siêu phẩm như Lamborghini Aventador LP700-4, Bugatti Veyron, Lamborghini Murcielago LP670-4 SV nổi bật nhất. Đây đều là siêu xe độc nhất và trị giá cả triệu USD mỗi chiếc. Ngoài bộ ba là những siêu xe và xe sang khác như Ferrari 458 Italia, Rolls-Royce Phantom, BMW.\r\nỞ lần rò rỉ thứ hai giữa tháng 4/2014, bộ sưu tập siêu xe của đại gia Sài thành còn có sự góp mặt của chiếc Lamborghini Murcielago LP640 màu xanh cốm duy nhất ở Việt Nam. Siêu xe này mới được sang tên, đổi chủ. Trước đó, chiếc xe thuộc sở hữu của một thiếu gia 9x đất Đà Nẵng.\r\n\r\nBên cạnh đó vẫn là những cái tên quen thuộc như Bugatti Veyron màu đỏ-trắng, Ferrari 458 Italia màu vàng, Lamborghini Murcielago LP670-4 SV đen nhám biển số trùng với số thứ tự sản xuất.', '0', NULL, 0, 1, 0),
(17, 'Xe Hilux của Toyota cũng bị lỗi túi khí', 'Ngoài xe Innova và Fortuner thì một mẫu xe khác của Toyota cũng đang gặp vấn đề về túi khí là chiếc Hilux.', 'Ngày 14/4, Công ty ô tô Toyota Việt Nam (TMV) báo cáo bổ sung tới Cục Đăng Kiểm Việt Nam về việc mở rộng chiến dịch triệu hồi để kiểm tra và xử lý vấn đề cáp xoắn của túi khí phía người lái trên xe Toyota Hilux do TMV nhập khẩu và phân phối.\r\nTheo đó, các mẫu xe do TMV sản xuất, nhập khẩu và phân phối thuộc chiến dịch triệu hồi này sẽ bao gồm: Innova, Fortuner và Hilux. Cụ thể, tổng số xe bị ảnh hưởng của chiến dịch triệu hồi này do TMV sản xuất, nhập khẩu và phân phối là 43.037 xe, trong đó: 40.241 xe Innova được sản xuất từ ngày 7/1/2006 đến ngày 15/1/2010; 2.531 xe Fortuner được sản xuất từ ngày 16/2/2009 đến ngày 19/1/2010 và 265 xe Hilux được sản xuất từ ngày 1/9/2009 đến 8/12/2009.\r\n\r\nTheo thông tin được cung cấp bởi Tập đoàn ô tô Toyota Nhật Bản, nguyên nhân thực hiện chiến dịch triệu hồi này là do: Trên các xe bị ảnh hưởng, dây cáp trong cụm cáp xoắn của túi khí phía người lái có khả năng cọ sát với chi tiết dẫn hướng của cụm cáp xoắn khi đánh lái, gây trầy xước bề mặt dây cáp.\r\n\r\nHư hỏng này có thể làm cho mạch điện kết nối với túi khí phía người lái bị hở mạch, dẫn tới việc mất kết nối với túi khí phía người lái. Nếu kết nối này bị mất, đèn cảnh báo túi khí sẽ sáng và túi khí người lái có thể sẽ không nổ khi gặp va chạm.\r\n\r\nHiện nay, TMV đã hoàn tất báo cáo với Cục Đăng Kiểm Việt Nam về nội dung chiến dịch, sau khi Cục này phê duyệt sẽ tiến hành triệu hồi xe để khắc phục sự cố.', '0', NULL, 0, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `username`, `email`, `password`, `HoTen`, `DiaChi`, `SDT`, `IDGroup`) VALUES
(1, 'test', '34534@gmail.com', '202cb962ac59075b964b07152d234b70', 'newname', 'ho chi minh', '1798', 1),
(2, 'thanh', 'thanhthanh@gmail.com', '202cb962ac59075b964b07152d234b70', 'Lê Thị Thanh Thanh', '123 ABC quận 1', '0123456789', 1),
(3, 'thinh', 'kimthinh@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ngô Thị Kim Thịnh', '234 ABC quận 1', '0123456777', 1),
(4, 'my123', 'my@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 'Vũ Hoàng My', '1234 Trần Hưng Đạo quận 5', '0909876543', 0),
(5, 'teo', 'teoem@gmail.com', 'e827aa1ed78e96a113182dce12143f9f', 'Lê Văn Tèo', '2/3/4 Nguyễn Thị Minh Khai Quận 1', '0987654321', 0),
(6, 'kimcuong', 'kimcuong@gmail.com', '5d41402abc4b2a76b9719d911017c592', 'Lấp Lánh Ánh Kim Cương', '87A Phan Đình Phùng quận Phú Nhuận', '0997665589', 0),
(7, 'hello', 'hellobaby@yahoo.com', '5705e1164a8394aace6018e27d20d237', 'Sơn Tùng M-TP', '9/2/1 đường số 10 quận 7', '090909098', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
