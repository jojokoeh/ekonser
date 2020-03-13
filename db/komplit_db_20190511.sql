/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.5.5-10.3.13-MariaDB : Database - komplit
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `barang` */

CREATE TABLE `barang` (
  `kode` char(4) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

LOCK TABLES `barang` WRITE;

insert  into `barang`(kode,nama,harga,stok) values ('B001','Pensil Warna','3000',20),('B002','Spidol','9000',20),('B003','Tinta','19000',12),('B004','Penggaris Plastik','5000',20),('B005','Kertas HVS A4','45000',23);

UNLOCK TABLES;

/*Table structure for table `tbl_user` */

CREATE TABLE `tbl_user` (
  `id_usr` int(10) NOT NULL AUTO_INCREMENT,
  `nama_usr` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `pswd` varchar(32) DEFAULT NULL,
  `status_usr` enum('1','0') DEFAULT '0',
  `wkt_update_usr` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usr`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

LOCK TABLES `tbl_user` WRITE;

insert  into `tbl_user`(id_usr,nama_usr,username,pswd,status_usr,wkt_update_usr) values (1,'Admin','admin','7b8b965ad4bca0e41ab51de7b31363a1','0',NULL);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
