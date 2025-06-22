/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.42 : Database - crudsystem
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`crudsystem` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `crudsystem`;

/*Table structure for table `grades` */

DROP TABLE IF EXISTS `grades`;

CREATE TABLE `grades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grade_number` int DEFAULT NULL,
  `grade_type` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `grades` */

insert  into `grades`(`id`,`grade_number`,`grade_type`,`grade`) values 
(1,10,'A','10A'),
(2,10,'B','10B'),
(3,10,'C','10C'),
(4,11,'A','10D');

/*Table structure for table `hobbies` */

DROP TABLE IF EXISTS `hobbies`;

CREATE TABLE `hobbies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hobby` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hobbies` */

insert  into `hobbies`(`id`,`hobby`) values 
(1,'Swmming'),
(2,'Cricket'),
(3,'Music'),
(4,'TV');

/*Table structure for table `loginuser` */

DROP TABLE IF EXISTS `loginuser`;

CREATE TABLE `loginuser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `password` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `loginuser` */

insert  into `loginuser`(`id`,`user_name`,`password`,`user_type`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'mathi','mathi','admin','2025-06-05 08:46:43','2025-06-05 08:46:43',NULL),
(2,'varman','varman','user','2025-06-05 08:47:05','2025-06-05 08:47:05',NULL);

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admission_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(259) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nic` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `grade_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `grade_id` (`grade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `students` */

insert  into `students`(`id`,`admission_no`,`first_name`,`last_name`,`gender`,`address`,`email`,`telephone_no`,`nic`,`created_at`,`updated_at`,`deleted_at`,`grade_id`) values 
(1,'1','mathi','varman','female','puttalai','mathi@gmail.com','07777','2001','2025-06-13 09:26:01','2025-06-13 09:26:01',NULL,1),
(2,'2','abshan','abishan','male','puttalai','abi@gmail.com','02111','205','2025-06-13 09:27:24','2025-06-13 09:27:24',NULL,3),
(3,'3','janan','rassan','male','jaffna','janam@gmail.com','099','200','2025-06-13 09:28:27','2025-06-13 09:28:27',NULL,2),
(4,'4','gobi','gobi','female','thunnalai','gopi@gmail.com','0888','30033','2025-06-13 09:29:39','2025-06-13 09:29:39',NULL,2),
(5,'5','ajithkumar','ajith','male','chennai','abc@gmail.com','111','111','2025-06-13 09:31:06','2025-06-13 09:31:06',NULL,2),
(6,'6','surya','siva','male','chennai','abc@gmail.com','1111111','1111111','2025-06-13 09:31:41','2025-06-13 09:31:41',NULL,3),
(7,'7','murnal','thakur','female','india','abc@gmail.com','11','222','2025-06-13 09:32:24','2025-06-13 09:32:24',NULL,3),
(8,'8','samantha','akini','female','adfdas','abc@gmail.com','22','22','2025-06-13 09:32:57','2025-06-13 09:32:57',NULL,4),
(9,'9','vijay','kumar','male','asdsadd','abc@gmail.com','11','11','2025-06-13 09:33:42','2025-06-13 09:33:42',NULL,3),
(10,'10','Ranga nayakka','sakthi vel','female','colombo jaffna','abc@gmail.com','111','11','2025-06-13 09:35:10','2025-06-13 09:35:10',NULL,4),
(77,'fdg','df','dfg','male','dfg','dfg','df','22','2025-06-19 14:08:58','2025-06-19 14:08:58',NULL,2),
(78,'daf','adf','adf','male','adsf','daf','adf','df','2025-06-19 14:09:35','2025-06-19 14:09:35',NULL,1);

/*Table structure for table `students_hobbies` */

DROP TABLE IF EXISTS `students_hobbies`;

CREATE TABLE `students_hobbies` (
  `stu_id` int DEFAULT NULL,
  `hobby_id` int DEFAULT NULL,
  UNIQUE KEY `stu_id` (`stu_id`,`hobby_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `students_hobbies` */

insert  into `students_hobbies`(`stu_id`,`hobby_id`) values 
(1,1),
(1,2),
(1,3),
(2,1),
(2,4),
(3,2),
(3,3),
(4,1),
(4,2),
(4,4),
(5,1),
(5,3),
(5,4),
(6,1),
(6,2),
(6,3),
(6,4),
(7,1),
(7,2),
(7,3),
(7,4),
(8,2),
(8,3),
(9,1),
(9,3),
(9,4),
(10,1),
(10,3),
(12,1),
(77,2),
(77,3),
(78,2),
(78,3);

/*Table structure for table `students_subjects` */

DROP TABLE IF EXISTS `students_subjects`;

CREATE TABLE `students_subjects` (
  `stu_id` int DEFAULT NULL,
  `sub_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `students_subjects` */

insert  into `students_subjects`(`stu_id`,`sub_id`) values 
(2,1),
(2,2),
(2,3),
(3,1),
(3,3),
(3,5),
(4,2),
(4,4),
(5,2),
(5,3),
(5,4),
(6,1),
(6,3),
(6,5),
(7,3),
(8,2),
(8,4),
(9,3),
(9,4),
(10,1),
(10,5),
(1,1),
(1,2),
(1,3),
(12,2),
(12,3),
(7,5),
(78,1),
(78,3);

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subjects` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `subjects` */

insert  into `subjects`(`id`,`subjects`) values 
(1,'IT'),
(2,'SFT'),
(3,'ET'),
(4,'GIT'),
(5,'BIo');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
