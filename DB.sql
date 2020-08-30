/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 5.7.26 : Database - dbscs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbscs` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbscs`;

/*Table structure for table `assigns` */

DROP TABLE IF EXISTS `assigns`;

CREATE TABLE `assigns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tec_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sem` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `assigns` */

insert  into `assigns`(`id`,`tec_id`,`sub_id`,`sem`,`sy`,`created_at`,`updated_at`) values (2,'5','3','1','2019-2020','2020-08-29 03:39:36','2020-08-29 03:39:36');

/*Table structure for table `clearances` */

DROP TABLE IF EXISTS `clearances`;

CREATE TABLE `clearances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sub_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sec_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stud_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `clearances` */

insert  into `clearances`(`id`,`sub_id`,`sec_id`,`stud_id`,`stat`,`remark`,`created_at`,`updated_at`) values (3,'3','1','3','not ok','none','2020-08-28 11:35:20','2020-08-29 00:50:41'),(5,'3','2','3','ok','none','2020-08-28 23:57:03','2020-08-28 23:57:03');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2020_08_28_031837_create_subjects_table',1),(2,'2020_08_28_065825_create_sections_table',2),(3,'2020_08_28_075955_create_clearances_table',3),(4,'2020_08_29_022248_create_assigns_table',4);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `sections` */

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sub_id` int(10) DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sections` */

insert  into `sections`(`id`,`sub_id`,`section`,`sem`,`sy`,`created_at`,`updated_at`) values (1,3,'MT-2A','1','2019-2020','2020-08-28 07:23:57','2020-08-28 07:23:57'),(2,3,'MT-2B','1','2019-2020','2020-08-28 07:24:16','2020-08-28 07:24:16');

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `subjects` */

insert  into `subjects`(`id`,`subject`,`code`,`created_at`,`updated_at`) values (3,'History','FD45','2020-08-28 06:47:41','2020-08-28 06:47:41');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'request',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`role`,`remember_token`,`created_at`,`updated_at`) values (3,'Jane Bros','asdf@yahoo.com','$2y$10$MhqY4IAlcwo0a/ggM8FYceiZ84hocFU47fWBDfPT.rjaZN3.JJZ3O','Student',NULL,'2020-08-28 05:17:47','2020-08-28 11:21:32'),(5,'Monaliza Malingan','m.m@gmail.com','$2y$10$aLP5MruE6EqFGEYzNqXWhuG3U0q4j4xfECFSMn/p4mEI/E90nNT..','Teacher',NULL,'2020-08-29 02:38:01','2020-08-29 02:38:01'),(6,'Alma Jane Ong','alma@gmail.com','$2y$10$11SMJH.EZn2dryPDva2xs.Z1cF6TMGQZrip6FbUDBSPYEYdbDLT9G','Student',NULL,'2020-08-29 04:00:14','2020-08-29 04:00:14'),(7,'Halupe','samiyoon@yahoo.com','$2y$10$NeLAuUKnfLyIQQJI3hhs/uXhUZrNLDunIIUX0639Pb3OirwNsyp3G','Admin','QlcHFD8ZTIbo9TwluRnLZKBKFgvj5M99kDkJrwBh3f5prHsWHkdGMaMJJOgP','2020-08-29 04:47:25','2020-08-29 04:47:25');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
