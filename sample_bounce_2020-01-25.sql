/*
**********************************
MySQL - 5.1.41 : Database - bounce
**********************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bounce` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `bounce`;

/*Table structure for table `client_numbers` */

DROP TABLE IF EXISTS `client_numbers`;

CREATE TABLE `client_numbers` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `client_numbers` */

/*Table structure for table `client_users` */

DROP TABLE IF EXISTS `client_users`;

CREATE TABLE `client_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(66) NOT NULL DEFAULT '',
  `username` varchar(66) NOT NULL DEFAULT '',
  `password` varchar(66) NOT NULL DEFAULT '',
  `email` varchar(66) NOT NULL DEFAULT '',
  `name` varchar(66) NOT NULL DEFAULT '',
  `hist` varchar(100) NOT NULL DEFAULT '',
  `account` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `client_users` */

insert  into `client_users`(`id`,`type`,`username`,`password`,`email`,`name`,`hist`,`account`) values
 (1,'','alpha','2c1743a391305fbf367df8e4f069f9f9','alpha@example.com','Alpha','',1);

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `type` varchar(100) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(100) NOT NULL DEFAULT '',
  `owner` varchar(66) NOT NULL DEFAULT '',
  `techid` bigint(20) NOT NULL DEFAULT '0',
  `city` varchar(66) NOT NULL DEFAULT '',
  `state` varchar(66) NOT NULL DEFAULT '',
  `zip` varchar(66) NOT NULL DEFAULT '',
  `email` varchar(66) NOT NULL DEFAULT '',
  `ext` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `clients` */

insert  into `clients`(`id`,`name`,`type`,`address`,`phone`,`owner`,`techid`,`city`,`state`,`zip`,`email`,`ext`) values
 (1,'Home001','Residential','123, Somerset Ave','1-125-458-4587','Joe Dunn',0,'Brigham','Shropshire','56987','joedunn@example.com','4578');

/*Table structure for table `company` */

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(66) NOT NULL,
  `phone` varchar(66) NOT NULL,
  `address` varchar(66) NOT NULL,
  `city` varchar(66) NOT NULL,
  `state` varchar(66) NOT NULL,
  `gmerchantid` varchar(66) NOT NULL,
  `gmerchantkey` varchar(66) NOT NULL,
  `country` varchar(66) NOT NULL,
  `zip` varchar(66) NOT NULL,
  `tax` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `company` */

insert  into `company`(`id`,`name`,`phone`,`address`,`city`,`state`,`gmerchantid`,`gmerchantkey`,`country`,`zip`,`tax`) values
 (1,'Bounce Co Ltd','98887774','','Timbuktoo','TN','','','Globalia','254568',18);

/*Table structure for table `invoice` */

DROP TABLE IF EXISTS `invoice`;

CREATE TABLE `invoice` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `client` bigint(11) NOT NULL DEFAULT '0',
  `token` bigint(11) NOT NULL,
  `invdate` date NOT NULL,
  `paid` int(2) NOT NULL DEFAULT '0',
  `paiddate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `invoice` */

/*Table structure for table `invoice_items` */

DROP TABLE IF EXISTS `invoice_items`;

CREATE TABLE `invoice_items` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `invoice` bigint(11) NOT NULL DEFAULT '0',
  `item` varchar(66) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `qty` float NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `invoice_items` */

/*Table structure for table `parts` */

DROP TABLE IF EXISTS `parts`;

CREATE TABLE `parts` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `iid` bigint(11) NOT NULL,
  `name` varchar(66) NOT NULL,
  `cost` varchar(66) NOT NULL,
  `sale` varchar(66) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `parts` */

/*Table structure for table `task` */

DROP TABLE IF EXISTS `task`;

CREATE TABLE `task` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `owner` int(10) NOT NULL DEFAULT '0',
  `name` varchar(66) NOT NULL DEFAULT '',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `date2` date NOT NULL DEFAULT '0000-00-00',
  `comments` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `task` */

/*Table structure for table `ticket_notes` */

DROP TABLE IF EXISTS `ticket_notes`;

CREATE TABLE `ticket_notes` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` bigint(11) NOT NULL,
  `notes` text NOT NULL,
  `tech_name` varchar(66) NOT NULL DEFAULT '',
  `dtime` date NOT NULL DEFAULT '0000-00-00',
  `time` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ticket_notes` */

/*Table structure for table `tickets` */

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(100) NOT NULL DEFAULT '',
  `client_id` bigint(11) NOT NULL DEFAULT '0',
  `date_start` date NOT NULL DEFAULT '0000-00-00',
  `date_stop` date NOT NULL DEFAULT '0000-00-00',
  `name` varchar(66) NOT NULL DEFAULT '',
  `ownerid` bigint(11) NOT NULL DEFAULT '0',
  `notes` text NOT NULL,
  `status` varchar(66) NOT NULL DEFAULT '',
  `priority` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tickets` */

/*Table structure for table `timesheets` */

DROP TABLE IF EXISTS `timesheets`;

CREATE TABLE `timesheets` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `aprid` bigint(11) NOT NULL DEFAULT '0',
  `techid` bigint(11) NOT NULL,
  `client` varchar(66) NOT NULL DEFAULT '',
  `hours` varchar(66) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `invoice` varchar(66) NOT NULL DEFAULT '',
  `parts` varchar(66) NOT NULL DEFAULT '',
  `daterec` date NOT NULL DEFAULT '0000-00-00',
  `time` varchar(66) NOT NULL DEFAULT '',
  `warranty` varchar(66) NOT NULL DEFAULT '',
  `paid` varchar(66) NOT NULL DEFAULT '',
  `remote` varchar(66) NOT NULL DEFAULT '',
  `approval` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `timesheets` */

/*Table structure for table `timesheets_app` */

DROP TABLE IF EXISTS `timesheets_app`;

CREATE TABLE `timesheets_app` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `dateend` date NOT NULL DEFAULT '0000-00-00',
  `ownerid` int(11) NOT NULL DEFAULT '0',
  `mgrid` int(11) NOT NULL DEFAULT '0',
  `status` varchar(66) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `timesheets_app` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(66) NOT NULL,
  `username` varchar(66) NOT NULL DEFAULT '',
  `password` varchar(66) NOT NULL DEFAULT '',
  `email` varchar(66) NOT NULL DEFAULT '',
  `sms` varchar(100) NOT NULL DEFAULT '',
  `name` varchar(66) NOT NULL DEFAULT '',
  `hist` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `users` = password: admin */

insert  into `users`(`id`,`type`,`username`,`password`,`email`,`sms`,`name`,`hist`) values
 (1,'admin','admin','21232f297a57a5a743894a0e4a801fc3','','','Administrator','http://localhost/projects/bounce/timesheet.php?func=add');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
