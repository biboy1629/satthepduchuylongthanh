/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.7.31 : Database - db_satthepduchuylongthanh
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tbl_danhmuc` */

DROP TABLE IF EXISTS `tbl_danhmuc`;

CREATE TABLE `tbl_danhmuc` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(225) DEFAULT '',
  `Hidden` tinyint(2) unsigned DEFAULT '0' COMMENT '0: hidden | 1: show',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_danhmuc` */

insert  into `tbl_danhmuc`(`ID`,`Name`,`Hidden`) values 
(1,'Sửa Chữa',1),
(2,'Sản Phẩm',1),
(3,'Camera',1),
(4,'Tin Tức',0),
(5,'Liên Hệ',1);

/*Table structure for table `tbl_grouptintuc` */

DROP TABLE IF EXISTS `tbl_grouptintuc`;

CREATE TABLE `tbl_grouptintuc` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(225) DEFAULT '',
  `Hidden` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_grouptintuc` */

/*Table structure for table `tbl_groupuser` */

DROP TABLE IF EXISTS `tbl_groupuser`;

CREATE TABLE `tbl_groupuser` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(225) DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_groupuser` */

insert  into `tbl_groupuser`(`ID`,`Name`) values 
(1,'Admin'),
(2,'Writer'),
(3,'Manager'),
(4,'User');

/*Table structure for table `tbl_loaisanpham` */

DROP TABLE IF EXISTS `tbl_loaisanpham`;

CREATE TABLE `tbl_loaisanpham` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(225) DEFAULT '',
  `Type` int(11) DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_loaisanpham` */

insert  into `tbl_loaisanpham`(`ID`,`Name`,`Type`) values 
(1,'none',1),
(2,'Nội Thất',1),
(3,'Ngoại Thất',1),
(4,'Vật Liệu Xây Dựng',1),
(5,'Sắt Thép',1),
(6,'CATELOGUE',2);

/*Table structure for table `tbl_sanpham` */

DROP TABLE IF EXISTS `tbl_sanpham`;

CREATE TABLE `tbl_sanpham` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `SKU` varchar(225) DEFAULT '',
  `Parent` int(11) DEFAULT NULL,
  `Name` varchar(225) DEFAULT NULL,
  `Description` text,
  `Images` varchar(255) DEFAULT '',
  `Price` double DEFAULT '0',
  `Price_sale` double DEFAULT '0',
  `ID_Loai_danh_muc` int(11) DEFAULT NULL,
  `Loai_san_pham` tinyint(3) DEFAULT '1' COMMENT '1:new | 2: sales | 3:ban chay',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_sanpham` */

insert  into `tbl_sanpham`(`ID`,`SKU`,`Parent`,`Name`,`Description`,`Images`,`Price`,`Price_sale`,`ID_Loai_danh_muc`,`Loai_san_pham`) values 
(1,'MMS1',NULL,'Sắt dày 20mm','Dòng sản phẩm bồn cầu LKBC-08 1 khối cao cấp kết hợp nắp rửa điện tử đến từ thương hiệu thiết bị vệ sinh LASKA\r\n\r\nCông nghệLK- ECO xã xoáy cuốn trôi mọi vết bẩn\r\n\r\nCông nghệ Nano giúp bề mạt men sứ trắng sáng trong suốt thời gian sữ dụng\r\n\r\nCông nghệ kháng khuẩn. \r\n\r\nPhun rửa tự động trước sau \r\n\r\nVệ sinh phụ nữ\r\n\r\nSưởi ấm bệ ngồi\r\n\r\nKhử mùi nhanh\r\n\r\nTIết kiệm điện\r\n\r\nVòi phun rửa và vòi phun dùng riêng cho phụ nữ đều là loại trượt tự động.\r\n\r\nBảng điều khiển bên cạnh nắp rửa\r\n\r\nThiết bị an toàn: Rơ-le nhiệt, cảm ứng từ kiểm soát nhiệt độ cao, phao ngắt để thiết bị ngừng hoạt động khi không đủ nước, cảm ứng tự ngắt khi gặp sự cố.\r\n\r\nChế độ tiết kiệm điện: Siêu tiết kiệm điện 24h.Tiết kiệm điện “1 lần chạm” (8 tiếng sau tự khôi phục).\r\n\r\nNước cấp: Nối trực tiếp từ đường ống nước','lkbc04-1142.jpg',45000,42000,1,1),
(2,'MMS2',NULL,'Sắt mỏng 5mm','Dòng sản phẩm bồn cầu LKBC-08 1 khối cao cấp kết hợp nắp rửa điện tử đến từ thương hiệu thiết bị vệ sinh LASKA\r\n\r\nCông nghệLK- ECO xã xoáy cuốn trôi mọi vết bẩn\r\n\r\nCông nghệ Nano giúp bề mạt men sứ trắng sáng trong suốt thời gian sữ dụng\r\n\r\nCông nghệ kháng khuẩn. \r\n\r\nPhun rửa tự động trước sau \r\n\r\nVệ sinh phụ nữ\r\n\r\nSưởi ấm bệ ngồi\r\n\r\nKhử mùi nhanh\r\n\r\nTIết kiệm điện\r\n\r\nVòi phun rửa và vòi phun dùng riêng cho phụ nữ đều là loại trượt tự động.\r\n\r\nBảng điều khiển bên cạnh nắp rửa\r\n\r\nThiết bị an toàn: Rơ-le nhiệt, cảm ứng từ kiểm soát nhiệt độ cao, phao ngắt để thiết bị ngừng hoạt động khi không đủ nước, cảm ứng tự ngắt khi gặp sự cố.\r\n\r\nChế độ tiết kiệm điện: Siêu tiết kiệm điện 24h.Tiết kiệm điện “1 lần chạm” (8 tiếng sau tự khôi phục).\r\n\r\nNước cấp: Nối trực tiếp từ đường ống nước','lkbc05-8914.jpg',12000,11000,1,1),
(3,'DDT01',NULL,'Đinh Tán 3mm','Dòng sản phẩm bồn cầu LKBC-08 1 khối cao cấp kết hợp nắp rửa điện tử đến từ thương hiệu thiết bị vệ sinh LASKA\r\n\r\nCông nghệLK- ECO xã xoáy cuốn trôi mọi vết bẩn\r\n\r\nCông nghệ Nano giúp bề mạt men sứ trắng sáng trong suốt thời gian sữ dụng\r\n\r\nCông nghệ kháng khuẩn. \r\n\r\nPhun rửa tự động trước sau \r\n\r\nVệ sinh phụ nữ\r\n\r\nSưởi ấm bệ ngồi\r\n\r\nKhử mùi nhanh\r\n\r\nTIết kiệm điện\r\n\r\nVòi phun rửa và vòi phun dùng riêng cho phụ nữ đều là loại trượt tự động.\r\n\r\nBảng điều khiển bên cạnh nắp rửa\r\n\r\nThiết bị an toàn: Rơ-le nhiệt, cảm ứng từ kiểm soát nhiệt độ cao, phao ngắt để thiết bị ngừng hoạt động khi không đủ nước, cảm ứng tự ngắt khi gặp sự cố.\r\n\r\nChế độ tiết kiệm điện: Siêu tiết kiệm điện 24h.Tiết kiệm điện “1 lần chạm” (8 tiếng sau tự khôi phục).\r\n\r\nNước cấp: Nối trực tiếp từ đường ống nước','lkbc06-741.jpg',3500,3200,4,1),
(4,'VB01',NULL,'Vôi Bột','Dòng sản phẩm bồn cầu LKBC-08 1 khối cao cấp kết hợp nắp rửa điện tử đến từ thương hiệu thiết bị vệ sinh LASKA\r\n\r\nCông nghệLK- ECO xã xoáy cuốn trôi mọi vết bẩn\r\n\r\nCông nghệ Nano giúp bề mạt men sứ trắng sáng trong suốt thời gian sữ dụng\r\n\r\nCông nghệ kháng khuẩn. \r\n\r\nPhun rửa tự động trước sau \r\n\r\nVệ sinh phụ nữ\r\n\r\nSưởi ấm bệ ngồi\r\n\r\nKhử mùi nhanh\r\n\r\nTIết kiệm điện\r\n\r\nVòi phun rửa và vòi phun dùng riêng cho phụ nữ đều là loại trượt tự động.\r\n\r\nBảng điều khiển bên cạnh nắp rửa\r\n\r\nThiết bị an toàn: Rơ-le nhiệt, cảm ứng từ kiểm soát nhiệt độ cao, phao ngắt để thiết bị ngừng hoạt động khi không đủ nước, cảm ứng tự ngắt khi gặp sự cố.\r\n\r\nChế độ tiết kiệm điện: Siêu tiết kiệm điện 24h.Tiết kiệm điện “1 lần chạm” (8 tiếng sau tự khôi phục).\r\n\r\nNước cấp: Nối trực tiếp từ đường ống nước','lkbc07-1639.jpg',12000,12000,4,1),
(5,'BC01',NULL,'Bồn Cầu Ý size 3','Dòng sản phẩm bồn cầu LKBC-08 1 khối cao cấp kết hợp nắp rửa điện tử đến từ thương hiệu thiết bị vệ sinh LASKA\r\n\r\nCông nghệLK- ECO xã xoáy cuốn trôi mọi vết bẩn\r\n\r\nCông nghệ Nano giúp bề mạt men sứ trắng sáng trong suốt thời gian sữ dụng\r\n\r\nCông nghệ kháng khuẩn. \r\n\r\nPhun rửa tự động trước sau \r\n\r\nVệ sinh phụ nữ\r\n\r\nSưởi ấm bệ ngồi\r\n\r\nKhử mùi nhanh\r\n\r\nTIết kiệm điện\r\n\r\nVòi phun rửa và vòi phun dùng riêng cho phụ nữ đều là loại trượt tự động.\r\n\r\nBảng điều khiển bên cạnh nắp rửa\r\n\r\nThiết bị an toàn: Rơ-le nhiệt, cảm ứng từ kiểm soát nhiệt độ cao, phao ngắt để thiết bị ngừng hoạt động khi không đủ nước, cảm ứng tự ngắt khi gặp sự cố.\r\n\r\nChế độ tiết kiệm điện: Siêu tiết kiệm điện 24h.Tiết kiệm điện “1 lần chạm” (8 tiếng sau tự khôi phục).\r\n\r\nNước cấp: Nối trực tiếp từ đường ống nước','lkbctm01-8306.jpg',5600000,5400000,3,1),
(6,'GDT01',NULL,'Giấy dán tường','Dòng sản phẩm bồn cầu LKBC-08 1 khối cao cấp kết hợp nắp rửa điện tử đến từ thương hiệu thiết bị vệ sinh LASKA\r\n\r\nCông nghệLK- ECO xã xoáy cuốn trôi mọi vết bẩn\r\n\r\nCông nghệ Nano giúp bề mạt men sứ trắng sáng trong suốt thời gian sữ dụng\r\n\r\nCông nghệ kháng khuẩn. \r\n\r\nPhun rửa tự động trước sau \r\n\r\nVệ sinh phụ nữ\r\n\r\nSưởi ấm bệ ngồi\r\n\r\nKhử mùi nhanh\r\n\r\nTIết kiệm điện\r\n\r\nVòi phun rửa và vòi phun dùng riêng cho phụ nữ đều là loại trượt tự động.\r\n\r\nBảng điều khiển bên cạnh nắp rửa\r\n\r\nThiết bị an toàn: Rơ-le nhiệt, cảm ứng từ kiểm soát nhiệt độ cao, phao ngắt để thiết bị ngừng hoạt động khi không đủ nước, cảm ứng tự ngắt khi gặp sự cố.\r\n\r\nChế độ tiết kiệm điện: Siêu tiết kiệm điện 24h.Tiết kiệm điện “1 lần chạm” (8 tiếng sau tự khôi phục).\r\n\r\nNước cấp: Nối trực tiếp từ đường ống nước','lkbctm02-5088.jpg',23000,22000,2,1),
(7,'KDD01',NULL,'Kệ để Dày (40 X 30 X 10)','Dòng sản phẩm bồn cầu LKBC-08 1 khối cao cấp kết hợp nắp rửa điện tử đến từ thương hiệu thiết bị vệ sinh LASKA\r\n\r\nCông nghệLK- ECO xã xoáy cuốn trôi mọi vết bẩn\r\n\r\nCông nghệ Nano giúp bề mạt men sứ trắng sáng trong suốt thời gian sữ dụng\r\n\r\nCông nghệ kháng khuẩn. \r\n\r\nPhun rửa tự động trước sau \r\n\r\nVệ sinh phụ nữ\r\n\r\nSưởi ấm bệ ngồi\r\n\r\nKhử mùi nhanh\r\n\r\nTIết kiệm điện\r\n\r\nVòi phun rửa và vòi phun dùng riêng cho phụ nữ đều là loại trượt tự động.\r\n\r\nBảng điều khiển bên cạnh nắp rửa\r\n\r\nThiết bị an toàn: Rơ-le nhiệt, cảm ứng từ kiểm soát nhiệt độ cao, phao ngắt để thiết bị ngừng hoạt động khi không đủ nước, cảm ứng tự ngắt khi gặp sự cố.\r\n\r\nChế độ tiết kiệm điện: Siêu tiết kiệm điện 24h.Tiết kiệm điện “1 lần chạm” (8 tiếng sau tự khôi phục).\r\n\r\nNước cấp: Nối trực tiếp từ đường ống nước','lklb01-6656.jpg',1500000,1500000,2,1),
(8,'',NULL,'fdfsdf','<p>fdgfgs</p>\r\n','82491220_2743409285746928_7504782087866548224_o.jpg',0,0,NULL,1),
(9,'ytyrtyrt',NULL,'trtretrt','<p><img alt=\"\" src=\"http://localhost/abc/public/ckfinder/userfiles/images/sanpham/120763811_398437074511111_2813350036017552926_n_LI.jpg\" style=\"height:1200px; width:632px\" /></p>\r\n','82491220_2743409285746928_7504782087866548224_o2.jpg',0,0,NULL,3),
(10,'ytr',NULL,'gfdgd','','120763811_398437074511111_2813350036017552926_n_LI.jpg',0,0,NULL,1),
(11,'tretretr',NULL,'rewrew','','120763811_398437074511111_2813350036017552926_n_LI1.jpg',0,0,NULL,1),
(12,'tret45435',NULL,'dfsdfsfsf','<p>jhjhjythgf</p>\r\n','120763811_398437074511111_2813350036017552926_n_LI2.jpg',0,0,NULL,3),
(15,'fdsfd33re',NULL,'dffwere','<p>ewrwer</p>\r\n','120763811_398437074511111_2813350036017552926_n_LI13.jpg',0,0,NULL,2),
(16,'fdsfd33re',NULL,'dffwere','<p>ewrwer</p>\r\n','120763811_398437074511111_2813350036017552926_n_LI14.jpg',0,0,NULL,2),
(17,'f4rf34',NULL,'fdfdsf','','120763811_398437074511111_2813350036017552926_n_LI15.jpg',0,0,NULL,2),
(18,'f4rf34',NULL,'fdfdsf','','120579637_336066497473034_6238579026151159986_n_LI.jpg',0,0,NULL,1);

/*Table structure for table `tbl_sanpham_thumbnail` */

DROP TABLE IF EXISTS `tbl_sanpham_thumbnail`;

CREATE TABLE `tbl_sanpham_thumbnail` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT '',
  `Sku_sanpham` varchar(255) DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_sanpham_thumbnail` */

insert  into `tbl_sanpham_thumbnail`(`ID`,`Name`,`Sku_sanpham`) values 
(1,'MMS1_thumbnail1.jpg','MMS1'),
(2,'MMS1_thumbnail2.jpg','MMS1'),
(3,'MMS1_thumbnail3.jpg','MMS1'),
(4,'MMS1_thumbnail4.jpg','MMS1'),
(5,'l1.jpg','MMS2'),
(6,'l2.jpg','MMS2'),
(7,'l3.jpg','MMS2'),
(8,'ll4.jpg','MMS2');

/*Table structure for table `tbl_tintuc` */

DROP TABLE IF EXISTS `tbl_tintuc`;

CREATE TABLE `tbl_tintuc` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(225) COLLATE utf8_unicode_ci DEFAULT '',
  `Content` text COLLATE utf8_unicode_ci,
  `ID_grouptintuc` int(6) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_tintuc` */

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Username` varchar(225) DEFAULT '',
  `Password` varchar(225) DEFAULT '',
  `Name` varchar(225) DEFAULT '',
  `Age` varchar(225) DEFAULT '00-00-0000',
  `ID_Groupuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`ID`,`Username`,`Password`,`Name`,`Age`,`ID_Groupuser`) values 
(1,'admin','123456','duc linh','00-00-0000',1),
(2,'writter','123456','viet bai 1','00-00-0000',2),
(3,'manager','123456','quản lý','00-00-0000',3),
(4,'user','123456','người dùng','00-00-0000',4),
(10,'666','123456','rt','00-00-0000',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
