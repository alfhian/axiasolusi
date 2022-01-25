/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - axiasolusi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`axiasolusi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(50) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `id_supplier` varchar(4) DEFAULT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang` */

insert  into `barang`(`id`,`nama_barang`,`harga`,`id_supplier`,`user_input`,`created_at`,`updated_at`) values 
(1,'MEJA KERJA',1000000,'2','admin','2022-01-25 03:24:10','2022-01-25 03:34:54'),
(2,'LAPTOP LENOVO',4500000,'1','admin','2022-01-25 03:36:56','2022-01-25 03:36:56'),
(3,'PRINTER EPSON L1130',2600000,'1','admin','2022-01-25 07:12:59','2022-01-25 07:12:59');

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `pic` varchar(50) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `user_input` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `supplier` */

insert  into `supplier`(`id`,`nama_supplier`,`pic`,`telp`,`alamat`,`user_input`,`created_at`,`updated_at`) values 
(1,'PT MAJU SEJAHTERA INDONESIA','DONI FERNANDES NAPITUPULU','08122900928','SESKOAL, KEBAYORAN LAMA, JAKARTA SELATAN','admin','2022-01-25 01:21:50','2022-01-25 02:39:43'),
(2,'PT KARUNIA MAKMUR JAYA','BRIAN WAHYU','08169923012','KEMANG, JAKARTA SELATAN','admin','2022-01-25 02:42:54','2022-01-25 02:42:54');

/*Table structure for table `transaksi_detail` */

DROP TABLE IF EXISTS `transaksi_detail`;

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksi_detail` */

insert  into `transaksi_detail`(`id`,`id_barang`,`qty`,`harga`,`created_at`,`updated_at`) values 
(1,1,2,1000000,'2022-01-25 05:22:34','2022-01-25 05:22:34'),
(1,2,2,4500000,'2022-01-25 05:25:21','2022-01-25 05:25:21'),
(2,1,2,1300000,'2022-01-25 06:07:43','2022-01-25 06:15:10'),
(2,3,2,2600000,'2022-01-25 07:13:26','2022-01-25 07:13:26');

/*Table structure for table `transaksi_master` */

DROP TABLE IF EXISTS `transaksi_master`;

CREATE TABLE `transaksi_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime DEFAULT NULL,
  `status` varchar(1) DEFAULT '1',
  `user_input` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksi_master` */

insert  into `transaksi_master`(`id`,`tanggal`,`status`,`user_input`,`created_at`,`updated_at`) values 
(1,'2022-01-25 11:25:05','2','admin','2022-01-25 04:25:05','2022-01-25 06:06:30'),
(2,'2022-01-25 12:33:43','1','admin','2022-01-25 05:33:43','2022-01-25 05:33:43');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`username`,`password`) values 
('admin','$2y$10$uqmnJydeVbx74ftZ2I1DAOWZcD70G6k.io3LUf/VLyrdhjFEtpiOW');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
