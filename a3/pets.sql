/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 5.7.44 : Database - s4059119
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`s4059119` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `s4059119`;

/*Table structure for table `pets` */

DROP TABLE IF EXISTS `pets`;

CREATE TABLE `pets` (
  `petid` int(11) NOT NULL AUTO_INCREMENT,
  `petname` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `age` double NOT NULL,
  `location` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`petid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pets` */

insert  into `pets`(`petid`,`petname`,`description`,`image`,`caption`,`age`,`location`,`type`) values 
(1,'Milo','A calm and affectionate cat who loves to relax by your side. Milo\'s inquisitive nature and gentle purring make him an ideal companion for quiet, cozy nights in.','cat1.jpeg','Milo the adorable cat',3,'Melbourne CBD','Cat'),
(2,'Baxter','A cheerful and energetic pup who loves playing fetch and swimming. Baxter\'s friendly demeanor makes him the perfect companion for families with children.','dog1.jpeg','Baxter the happy dog',5,'Cape Woolamai','Dog'),
(3,'Luna','A playful and curious kitten, Luna enjoys climbing and exploring new spaces. Her lively energy and adorable antics bring joy to any home.','cat2.jpeg','Luna the curious cat',1,'Ferntree Gully','Cat'),
(4,'Willow','A gentle and loyal dog, Willow loves cuddles and belly rubs. With a laid-back attitude, she’s perfect for families looking for a calm and affectionate pet.','dog2.jpeg','Willow the loyal dog',48,'Marysville','Dog'),
(5,'Oliver','A serene and observant cat, Oliver enjoys lounging in the sun. His independent yet loving nature makes him a great companion for those who appreciate a more relaxed pet.','cat4.jpeg','Oliver the relaxed cat',12,'Grampians','Cat'),
(6,'Bella','An energetic and friendly dog, Bella is full of life and loves to play outdoors. Her lively spirit and affection for children make her a perfect playmate for active families.','dog3.jpeg','Bella the playful dog',10,'Carlton','Dog'),
(7,'Heather','It is a witty cat with innocence filled in those striking green eyes','Heather.jpeg','Cat',4,'Melbourne CBD','cat');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
