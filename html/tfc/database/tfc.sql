/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.3.12-MariaDB : Database - tfc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tfc` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tfc`;

/*Table structure for table `agent_airlines` */

CREATE TABLE `agent_airlines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_agent` int(11) DEFAULT NULL,
  `id_airline` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_agentairlines` (`id_agent`,`id_airline`),
  KEY `fk_agentairlines1` (`id_agent`),
  KEY `fk_agentairlines2` (`id_airline`),
  CONSTRAINT `fk_agentairlines1` FOREIGN KEY (`id_agent`) REFERENCES `agents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_agentairlines2` FOREIGN KEY (`id_airline`) REFERENCES `airlines` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

/*Data for the table `agent_airlines` */

insert  into `agent_airlines`(`id`,`id_agent`,`id_airline`,`active`,`created_at`,`updated_at`,`created_by`,`updated_by`) values 
(1,3,6,1,'2021-10-07 05:47:44','2021-10-07 05:47:44','enim','enim'),
(3,1,2,1,'2021-10-07 05:48:01','2021-10-07 05:48:01','nihil','nihil'),
(4,19,7,1,'2021-10-07 05:48:01','2021-10-07 05:48:01','ut','ut'),
(6,10,3,1,'2021-10-07 05:48:02','2021-10-07 05:48:02','placeat','placeat'),
(11,2,4,1,'2021-10-07 05:48:05','2021-10-07 05:48:05','recusandae','recusandae'),
(12,18,5,1,'2021-10-07 05:48:05','2021-10-07 05:48:05','ut','ut'),
(13,20,1,1,'2021-10-07 05:48:05','2021-10-07 05:48:05','quis','quis'),
(61,19,4,1,'2021-10-07 05:52:20','2021-10-07 05:52:20','est','est'),
(62,17,2,1,'2021-10-07 05:52:20','2021-10-07 05:52:20','nam','nam'),
(63,6,5,1,'2021-10-07 05:52:20','2021-10-07 05:52:20','omnis','omnis'),
(64,6,1,1,'2021-10-07 05:52:20','2021-10-07 05:52:20','id','id'),
(66,1,3,1,'2021-10-07 12:52:48','2021-10-07 05:52:20','omnis','omnis'),
(67,13,1,1,'2021-10-07 05:52:53','2021-10-07 05:52:53','autem','autem'),
(68,3,7,1,'2021-10-07 05:52:53','2021-10-07 05:52:53','eum','eum'),
(69,16,2,1,'2021-10-07 05:52:53','2021-10-07 05:52:53','modi','modi'),
(70,14,7,1,'2021-10-07 05:52:53','2021-10-07 05:52:53','doloribus','doloribus'),
(71,3,1,1,'2021-10-07 05:52:53','2021-10-07 05:52:53','consequatur','consequatur'),
(72,15,1,1,'2021-10-07 05:52:53','2021-10-07 05:52:53','aut','aut'),
(73,1,1,1,'2021-10-07 05:52:53','2021-10-07 05:52:53','voluptatem','voluptatem'),
(74,5,5,1,'2021-10-07 05:52:53','2021-10-07 05:52:53','dolores','dolores'),
(75,19,5,1,'2021-10-07 05:52:53','2021-10-07 05:52:53','amet','amet'),
(76,20,5,1,'2021-10-07 05:52:53','2021-10-07 05:52:53','officiis','officiis'),
(77,20,4,1,'2021-10-07 05:52:53','2021-10-07 05:52:53','eaque','eaque'),
(78,9,1,1,'2021-10-07 05:52:53','2021-10-07 05:52:53','ipsam','ipsam'),
(79,20,6,1,'2021-10-07 05:52:53','2021-10-07 05:52:53','occaecati','occaecati'),
(81,12,2,1,'2021-10-07 05:53:00','2021-10-07 05:53:00','commodi','commodi'),
(82,3,2,1,'2021-10-07 05:53:00','2021-10-07 05:53:00','soluta','soluta'),
(83,2,3,1,'2021-10-07 05:53:00','2021-10-07 05:53:00','at','at'),
(84,2,7,1,'2021-10-07 05:53:00','2021-10-07 05:53:00','rerum','rerum'),
(86,6,2,1,'2021-10-07 05:53:01','2021-10-07 05:53:01','animi','animi'),
(87,16,1,1,'2021-10-07 05:53:01','2021-10-07 05:53:01','ipsa','ipsa'),
(88,4,1,1,'2021-10-07 05:53:01','2021-10-07 05:53:01','modi','modi'),
(90,18,6,1,'2021-10-07 05:53:02','2021-10-07 05:53:02','reiciendis','reiciendis'),
(91,5,2,1,'2021-10-07 05:53:02','2021-10-07 05:53:02','eligendi','eligendi'),
(92,9,7,1,'2021-10-07 05:53:02','2021-10-07 05:53:02','totam','totam'),
(94,14,3,1,'2021-10-07 05:53:10','2021-10-07 05:53:10','eos','eos'),
(95,1,5,1,'2021-10-07 05:53:10','2021-10-07 05:53:10','aspernatur','aspernatur'),
(97,14,2,1,'2021-10-07 05:53:11','2021-10-07 05:53:11','eveniet','eveniet'),
(99,1,4,1,'2021-10-07 05:53:12','2021-10-07 05:53:12','accusantium','accusantium'),
(101,7,6,1,'2021-10-07 05:53:12','2021-10-07 05:53:12','quisquam','quisquam'),
(102,14,1,1,'2021-10-07 05:53:12','2021-10-07 05:53:12','hic','hic'),
(103,19,6,1,'2021-10-07 05:53:12','2021-10-07 05:53:12','quia','quia'),
(104,13,4,1,'2021-10-07 05:53:12','2021-10-07 05:53:12','est','est'),
(105,16,6,1,'2021-10-07 05:53:12','2021-10-07 05:53:12','aperiam','aperiam'),
(108,15,2,1,'2021-10-07 05:53:14','2021-10-07 05:53:14','sit','sit'),
(110,17,6,1,'2021-10-07 05:53:15','2021-10-07 05:53:15','nam','nam'),
(111,10,2,1,'2021-10-07 05:53:15','2021-10-07 05:53:15','consequatur','consequatur'),
(112,9,2,1,'2021-10-07 05:53:15','2021-10-07 05:53:15','iure','iure'),
(113,12,5,1,'2021-10-07 05:53:15','2021-10-07 05:53:15','sed','sed'),
(116,15,7,1,'2021-10-07 05:53:17','2021-10-07 05:53:17','et','et'),
(117,19,2,1,'2021-10-07 05:53:17','2021-10-07 05:53:17','sed','sed'),
(119,8,4,1,'2021-10-07 05:53:18','2021-10-07 05:53:18','nisi','nisi'),
(121,17,1,1,'2021-10-07 05:53:28','2021-10-07 05:53:28','esse','esse'),
(122,13,7,1,'2021-10-07 05:53:28','2021-10-07 05:53:28','sunt','sunt'),
(123,18,2,1,'2021-10-07 05:53:28','2021-10-07 05:53:28','quasi','quasi'),
(124,12,4,1,'2021-10-07 05:53:28','2021-10-07 05:53:28','at','at'),
(125,2,5,1,'2021-10-07 05:53:28','2021-10-07 05:53:28','quia','quia'),
(126,18,1,1,'2021-10-07 05:53:28','2021-10-07 05:53:28','illum','illum'),
(128,11,5,1,'2021-10-07 05:53:29','2021-10-07 05:53:29','non','non'),
(129,10,7,1,'2021-10-07 05:53:29','2021-10-07 05:53:29','eos','eos'),
(130,2,1,1,'2021-10-07 05:53:29','2021-10-07 05:53:29','sit','sit'),
(135,9,5,1,'2021-10-07 05:53:33','2021-10-07 05:53:33','incidunt','incidunt'),
(136,12,3,1,'2021-10-07 05:53:33','2021-10-07 05:53:33','aut','aut'),
(139,1,6,1,'2021-10-07 05:53:35','2021-10-07 05:53:35','voluptatum','voluptatum'),
(141,13,6,1,'2021-10-07 05:53:36','2021-10-07 05:53:36','ab','ab'),
(144,15,6,1,'2021-10-07 05:53:38','2021-10-07 05:53:38','commodi','commodi'),
(145,8,6,1,'2021-10-07 05:53:38','2021-10-07 05:53:38','unde','unde'),
(147,4,5,1,'2021-10-07 05:53:39','2021-10-07 05:53:39','eos','eos');

/*Table structure for table `agents` */

CREATE TABLE `agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `agents` */

insert  into `agents`(`id`,`code`,`name`,`group`,`branch`,`image`,`thumbnail`,`url`,`created_at`,`updated_at`,`created_by`,`updated_by`) values 
(1,'391636','Altorina','illo possimus','magnam ab',NULL,'altorina.png','Nihil deleniti.','2021-10-06 08:53:36','2021-10-06 08:53:36','est','est'),
(2,'124837','AntaVaya','voluptatem doloremque','autem dignissimos',NULL,'antavaya.png','Voluptatem suscipit.','2021-10-06 08:53:36','2021-10-06 08:53:36','quas','quas'),
(3,'149889','Astrindo','ut quaerat','in aut',NULL,'astrindo.jfif','Sint aspernatur.','2021-10-06 08:53:36','2021-10-06 08:53:36','odit','odit'),
(4,'496158','Aviatour','ut consequuntur','corporis asperiores',NULL,'avia.png','Dolore autem est.','2021-10-06 08:53:36','2021-10-06 08:53:36','iusto','iusto'),
(5,'187973','Bayu Buana','deserunt at','perferendis neque',NULL,'bayubuana.png','Distinctio.','2021-10-06 08:53:36','2021-10-06 08:53:36','perferendis','perferendis'),
(6,'282379','Dwidaya','molestiae molestiae','consequuntur qui',NULL,'dwidaya.png','https://reg.daisi.id/demo-travel-fair/onboarding-dwidaya','2021-10-06 08:53:36','2021-10-06 08:53:36','et','et'),
(7,'492041','Elang Rajawali','officiis alias','est doloremque',NULL,'elangrajawali.jfif','Et nostrum fugit.','2021-10-06 08:53:36','2021-10-06 08:53:36','impedit','impedit'),
(8,'196389','Eloktour','molestiae minus','unde iusto',NULL,'eloktour.jfif','Quod provident.','2021-10-06 08:53:36','2021-10-06 08:53:36','quia','quia'),
(9,'355371','Esa tour','eius cum','facilis tempore',NULL,'esatour.jfif','Cumque molestiae et.','2021-10-06 08:53:36','2021-10-06 08:53:36','tenetur','tenetur'),
(10,'157228','Golden Rama','temporibus fugiat','consequatur assumenda',NULL,'goldenrama.png','Nesciunt quia eos.','2021-10-06 08:53:36','2021-10-06 08:53:36','nihil','nihil'),
(11,'420092','Great Union','harum dolore','quis assumenda',NULL,'greattour.jfif','Unde quibusdam.','2021-10-06 08:53:36','2021-10-06 08:53:36','perspiciatis','perspiciatis'),
(12,'147277','MNC Travel','quia magnam','est atque',NULL,'mnctravel.png','Qui eaque quas et.','2021-10-06 08:53:36','2021-10-06 08:53:36','quis','quis'),
(13,'374187','Obaja','rerum rerum','quos enim',NULL,'obaja.jfif','Totam rerum ipsam.','2021-10-06 08:53:36','2021-10-06 08:53:36','molestiae','molestiae'),
(14,'380836','Panen','adipisci ut','hic ratione',NULL,'panen.png','Tenetur quas et.','2021-10-06 08:53:36','2021-10-06 08:53:36','recusandae','recusandae'),
(15,'121482','Pantravel','repellendus accusamus','consequatur quis',NULL,'pantravel.png','Unde sed quos neque.','2021-10-06 08:53:36','2021-10-06 08:53:36','eaque','eaque'),
(16,'294758','Rotama','itaque deserunt','enim aliquid',NULL,'rotama.png','Repellendus fugiat.','2021-10-06 08:53:36','2021-10-06 08:53:36','maxime','maxime'),
(17,'222190','Sejati tour','aliquam eos','facilis debitis',NULL,'sejati.png','Aspernatur.','2021-10-06 08:53:36','2021-10-06 08:53:36','necessitatibus','necessitatibus'),
(18,'120459','Smailing','quas est','dignissimos quas',NULL,'smailing.jfif','Perferendis nam.','2021-10-06 08:53:36','2021-10-06 08:53:36','asperiores','asperiores'),
(19,'231776','TX Travel','libero iure','cupiditate in',NULL,'txtravel.png','Autem veritatis aut.','2021-10-06 08:53:36','2021-10-06 08:53:36','veniam','veniam'),
(20,'188635','Wita','aspernatur iure','magni itaque',NULL,'wita.svg','Quaerat fugit.','2021-10-06 08:53:36','2021-10-06 08:53:36','qui','qui'),
(21,'876545','Panorama','aspernatur iure','magni itaque',NULL,'panorama.png','https://reg.daisi.id/demo-travel-fair/onboarding-panorama','2021-10-06 08:53:36','2021-10-06 08:53:36','qui','qui'),
(22,'543456','HIS','libero iure','facilis debitis',NULL,'his.png','Autem veritatis aut.','2021-10-06 08:53:36','2021-10-06 08:53:36','veniam','veniam');

/*Table structure for table `airlines` */

CREATE TABLE `airlines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `airlines` */

insert  into `airlines`(`id`,`name`,`code`,`image`,`thumbnail`,`active`,`created_at`,`updated_at`,`created_by`,`updated_by`) values 
(1,'Garuda Indonesia','GA',NULL,NULL,NULL,'2021-10-07 12:10:08','0000-00-00 00:00:00',NULL,NULL),
(2,'Singapore Airlines','SQ',NULL,NULL,NULL,'2021-10-07 12:09:23','0000-00-00 00:00:00',NULL,NULL),
(3,'Emirates','EK',NULL,NULL,NULL,'2021-10-07 12:10:30','0000-00-00 00:00:00',NULL,NULL),
(4,'Qatar','QR',NULL,NULL,NULL,'2021-10-07 12:12:09','0000-00-00 00:00:00',NULL,NULL),
(5,'Turkish Airlines','TK',NULL,NULL,NULL,'2021-10-07 12:10:51','0000-00-00 00:00:00',NULL,NULL),
(6,'All Nippon Airlines','NH',NULL,NULL,NULL,'2021-10-07 12:12:33','0000-00-00 00:00:00',NULL,NULL),
(7,'Japan Airlines','JL',NULL,NULL,NULL,'2021-10-07 12:12:52','0000-00-00 00:00:00',NULL,NULL);

/*Table structure for table `airlines_airtickets` */

CREATE TABLE `airlines_airtickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_airline` int(11) DEFAULT NULL,
  `id_airticket` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_airlinesairtickets` (`id_airline`,`id_airticket`),
  KEY `fk_airlinesairtickets2` (`id_airticket`),
  CONSTRAINT `fk_airlinesairtickets1` FOREIGN KEY (`id_airline`) REFERENCES `airlines` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_airlinesairtickets2` FOREIGN KEY (`id_airticket`) REFERENCES `airtickets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

/*Data for the table `airlines_airtickets` */

insert  into `airlines_airtickets`(`id`,`id_airline`,`id_airticket`,`active`,`created_at`,`updated_at`,`created_by`,`updated_by`) values 
(1,1,16,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','rem','rem'),
(2,5,17,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','accusantium','accusantium'),
(3,5,38,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','perspiciatis','perspiciatis'),
(4,4,31,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','eos','eos'),
(5,3,49,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','adipisci','adipisci'),
(6,3,37,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','cum','cum'),
(7,1,10,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','fugiat','fugiat'),
(8,5,13,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','ut','ut'),
(9,6,14,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','sequi','sequi'),
(10,4,33,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','soluta','soluta'),
(11,5,40,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','amet','amet'),
(12,2,3,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','quibusdam','quibusdam'),
(13,1,48,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','voluptas','voluptas'),
(14,2,1,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','libero','libero'),
(15,7,12,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','et','et'),
(16,2,31,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','doloremque','doloremque'),
(17,5,21,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','consequatur','consequatur'),
(18,4,27,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','exercitationem','exercitationem'),
(19,2,26,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','praesentium','praesentium'),
(20,3,30,1,'2021-10-07 05:56:12','2021-10-07 05:56:12','dolore','dolore'),
(22,2,36,1,'2021-10-07 05:56:17','2021-10-07 05:56:17','tempora','tempora'),
(23,4,30,1,'2021-10-07 05:56:17','2021-10-07 05:56:17','exercitationem','exercitationem'),
(24,6,43,1,'2021-10-07 05:56:17','2021-10-07 05:56:17','eum','eum'),
(25,4,20,1,'2021-10-07 05:56:17','2021-10-07 05:56:17','quibusdam','quibusdam'),
(26,3,2,1,'2021-10-07 05:56:17','2021-10-07 05:56:17','rerum','rerum'),
(28,7,6,1,'2021-10-07 05:56:18','2021-10-07 05:56:18','culpa','culpa'),
(29,3,41,1,'2021-10-07 05:56:18','2021-10-07 05:56:18','unde','unde'),
(30,5,28,1,'2021-10-07 05:56:18','2021-10-07 05:56:18','enim','enim'),
(31,6,6,1,'2021-10-07 05:56:18','2021-10-07 05:56:18','ratione','ratione'),
(32,3,15,1,'2021-10-07 05:56:18','2021-10-07 05:56:18','vel','vel'),
(33,5,10,1,'2021-10-07 05:56:18','2021-10-07 05:56:18','quis','quis'),
(34,5,14,1,'2021-10-07 05:56:18','2021-10-07 05:56:18','qui','qui'),
(35,2,9,1,'2021-10-07 05:56:18','2021-10-07 05:56:18','praesentium','praesentium'),
(36,4,11,1,'2021-10-07 05:56:18','2021-10-07 05:56:18','sapiente','sapiente'),
(37,2,22,1,'2021-10-07 05:56:18','2021-10-07 05:56:18','omnis','omnis'),
(38,4,19,1,'2021-10-07 05:56:18','2021-10-07 05:56:18','eligendi','eligendi'),
(39,1,37,1,'2021-10-07 05:56:18','2021-10-07 05:56:18','sunt','sunt'),
(40,5,32,1,'2021-10-07 05:56:18','2021-10-07 05:56:18','rerum','rerum'),
(42,2,48,1,'2021-10-07 05:56:19','2021-10-07 05:56:19','officiis','officiis'),
(44,5,46,1,'2021-10-07 05:56:20','2021-10-07 05:56:20','temporibus','temporibus'),
(45,1,42,1,'2021-10-07 05:56:20','2021-10-07 05:56:20','enim','enim'),
(46,3,7,1,'2021-10-07 05:56:20','2021-10-07 05:56:20','quia','quia'),
(47,2,12,1,'2021-10-07 05:56:20','2021-10-07 05:56:20','eos','eos'),
(48,1,24,1,'2021-10-07 05:56:20','2021-10-07 05:56:20','est','est'),
(49,1,9,1,'2021-10-07 05:56:20','2021-10-07 05:56:20','nostrum','nostrum'),
(50,1,41,1,'2021-10-07 05:56:20','2021-10-07 05:56:20','commodi','commodi'),
(51,7,30,1,'2021-10-07 05:56:20','2021-10-07 05:56:20','quos','quos'),
(53,2,23,1,'2021-10-07 05:56:21','2021-10-07 05:56:21','assumenda','assumenda'),
(54,6,48,1,'2021-10-07 05:56:21','2021-10-07 05:56:21','eos','eos'),
(55,4,39,1,'2021-10-07 05:56:21','2021-10-07 05:56:21','quibusdam','quibusdam'),
(56,3,46,1,'2021-10-07 05:56:21','2021-10-07 05:56:21','sit','sit'),
(57,3,6,1,'2021-10-07 05:56:21','2021-10-07 05:56:21','blanditiis','blanditiis'),
(58,7,33,1,'2021-10-07 05:56:21','2021-10-07 05:56:21','a','a'),
(59,7,29,1,'2021-10-07 05:56:21','2021-10-07 05:56:21','non','non'),
(61,6,22,1,'2021-10-07 05:56:22','2021-10-07 05:56:22','nobis','nobis'),
(62,2,39,1,'2021-10-07 05:56:22','2021-10-07 05:56:22','quod','quod'),
(63,2,38,1,'2021-10-07 05:56:22','2021-10-07 05:56:22','quos','quos'),
(64,7,17,1,'2021-10-07 05:56:22','2021-10-07 05:56:22','incidunt','incidunt'),
(65,3,43,1,'2021-10-07 05:56:22','2021-10-07 05:56:22','minus','minus'),
(66,2,44,1,'2021-10-07 05:56:22','2021-10-07 05:56:22','cum','cum'),
(67,6,15,1,'2021-10-07 05:56:22','2021-10-07 05:56:22','repudiandae','repudiandae'),
(69,1,30,1,'2021-10-07 05:56:23','2021-10-07 05:56:23','quo','quo'),
(70,5,31,1,'2021-10-07 05:56:23','2021-10-07 05:56:23','eius','eius'),
(72,2,28,1,'2021-10-07 05:56:24','2021-10-07 05:56:24','optio','optio');

/*Table structure for table `airtickets` */

CREATE TABLE `airtickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `continent` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `airtickets` */

insert  into `airtickets`(`id`,`sku`,`name`,`summary`,`about`,`detail`,`price`,`origin`,`destination`,`continent`,`country`,`city`,`id_category`,`image`,`thumbnail`,`created_at`,`updated_at`,`created_by`,`updated_by`) values 
(1,'2','quae qui','Voluptates dolores voluptatem eos sit ut nihil praesentium. Iste optio eos in quia. Dolor id eius vitae nostrum iure quibusdam.','Voluptates dolores voluptatem eos sit ut nihil praesentium. Iste optio eos in quia. Dolor id eius vitae nostrum iure quibusdam.','Voluptates dolores voluptatem eos sit ut nihil praesentium. Iste optio eos in quia. Dolor id eius vitae nostrum iure quibusdam.',594819,'inventore','aut','vel','blanditiis','sunt',2,NULL,'img-tour-01.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','voluptatibus','voluptatibus'),
(2,'73','beatae soluta','Amet ut amet esse dolor aspernatur optio autem. Id sit quia eum qui a expedita. Ut est et maxime voluptate quis nulla cupiditate illum. Eum iste omnis omnis nam excepturi.','Amet ut amet esse dolor aspernatur optio autem. Id sit quia eum qui a expedita. Ut est et maxime voluptate quis nulla cupiditate illum. Eum iste omnis omnis nam excepturi.','Amet ut amet esse dolor aspernatur optio autem. Id sit quia eum qui a expedita. Ut est et maxime voluptate quis nulla cupiditate illum. Eum iste omnis omnis nam excepturi.',332870,'et','incidunt','qui','ex','sequi',4,NULL,'img-tour-02.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','eius','eius'),
(3,'20','provident ab','Et reiciendis quo officia ut delectus suscipit possimus. Incidunt velit dolor ullam excepturi rerum ex. Nam qui consectetur et rerum molestias enim aliquam.','Et reiciendis quo officia ut delectus suscipit possimus. Incidunt velit dolor ullam excepturi rerum ex. Nam qui consectetur et rerum molestias enim aliquam.','Et reiciendis quo officia ut delectus suscipit possimus. Incidunt velit dolor ullam excepturi rerum ex. Nam qui consectetur et rerum molestias enim aliquam.',964957,'sit','quia','voluptates','ex','temporibus',3,NULL,'img-tour-03.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','dicta','dicta'),
(4,'70','mollitia occaecati','Et consequuntur labore dolores expedita quo rerum autem. Occaecati et praesentium reprehenderit necessitatibus ut ut voluptas.','Et consequuntur labore dolores expedita quo rerum autem. Occaecati et praesentium reprehenderit necessitatibus ut ut voluptas.','Et consequuntur labore dolores expedita quo rerum autem. Occaecati et praesentium reprehenderit necessitatibus ut ut voluptas.',193149,'ut','distinctio','vero','culpa','ullam',3,NULL,'img-tour-04.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','excepturi','excepturi'),
(5,'35','excepturi repudiandae','Ducimus perspiciatis nesciunt quos sed est ipsam. Ab doloremque unde soluta explicabo ut dolore. Porro eveniet sed autem molestiae dolores quibusdam quisquam molestias.','Ducimus perspiciatis nesciunt quos sed est ipsam. Ab doloremque unde soluta explicabo ut dolore. Porro eveniet sed autem molestiae dolores quibusdam quisquam molestias.','Ducimus perspiciatis nesciunt quos sed est ipsam. Ab doloremque unde soluta explicabo ut dolore. Porro eveniet sed autem molestiae dolores quibusdam quisquam molestias.',190575,'dolorum','et','dolore','molestiae','laudantium',7,NULL,'img-tour-05.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','nemo','nemo'),
(6,'63','inventore at','Suscipit ut accusantium ullam voluptate sit inventore. Debitis adipisci rerum sapiente natus corrupti. Ut modi non sint aut eaque eum dolore.','Suscipit ut accusantium ullam voluptate sit inventore. Debitis adipisci rerum sapiente natus corrupti. Ut modi non sint aut eaque eum dolore.','Suscipit ut accusantium ullam voluptate sit inventore. Debitis adipisci rerum sapiente natus corrupti. Ut modi non sint aut eaque eum dolore.',797002,'occaecati','dolorem','voluptatum','aperiam','consequatur',7,NULL,'img-tour-06.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','assumenda','assumenda'),
(7,'38','ut qui','Dolorem repudiandae facere amet a deleniti a enim. Minus ut dolores facere.','Dolorem repudiandae facere amet a deleniti a enim. Minus ut dolores facere.','Dolorem repudiandae facere amet a deleniti a enim. Minus ut dolores facere.',120677,'suscipit','itaque','atque','deserunt','corrupti',3,NULL,'img-tour-01.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','itaque','itaque'),
(8,'7','dignissimos est','Occaecati pariatur qui cumque vel qui odit et quidem. Optio iure debitis sunt quo sapiente iure corrupti. Illum consequatur asperiores et illo. Odio excepturi libero excepturi sed.','Occaecati pariatur qui cumque vel qui odit et quidem. Optio iure debitis sunt quo sapiente iure corrupti. Illum consequatur asperiores et illo. Odio excepturi libero excepturi sed.','Occaecati pariatur qui cumque vel qui odit et quidem. Optio iure debitis sunt quo sapiente iure corrupti. Illum consequatur asperiores et illo. Odio excepturi libero excepturi sed.',353169,'explicabo','molestias','aperiam','deserunt','in',3,NULL,'img-tour-02.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','libero','libero'),
(9,'11','rerum quasi','Quia occaecati natus fuga ut. Ut blanditiis itaque minima quibusdam fugit repellendus illo. Molestiae et quia illum autem. Dolor aspernatur et nesciunt consequatur libero hic est.','Quia occaecati natus fuga ut. Ut blanditiis itaque minima quibusdam fugit repellendus illo. Molestiae et quia illum autem. Dolor aspernatur et nesciunt consequatur libero hic est.','Quia occaecati natus fuga ut. Ut blanditiis itaque minima quibusdam fugit repellendus illo. Molestiae et quia illum autem. Dolor aspernatur et nesciunt consequatur libero hic est.',568146,'modi','velit','porro','maxime','id',3,NULL,'img-tour-03.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','ab','ab'),
(10,'66','est id','Eum laborum perspiciatis quod sint voluptatum accusamus eius. Pariatur ut at architecto. Aspernatur veniam dolore assumenda assumenda quisquam ut quisquam ducimus.','Eum laborum perspiciatis quod sint voluptatum accusamus eius. Pariatur ut at architecto. Aspernatur veniam dolore assumenda assumenda quisquam ut quisquam ducimus.','Eum laborum perspiciatis quod sint voluptatum accusamus eius. Pariatur ut at architecto. Aspernatur veniam dolore assumenda assumenda quisquam ut quisquam ducimus.',296598,'amet','laboriosam','eos','similique','tempore',4,NULL,'img-tour-04.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','maxime','maxime'),
(11,'74','autem tenetur','Nobis explicabo et ut quo totam nobis. Error et fuga officia impedit molestiae. Tempore quaerat voluptatem ratione rerum nobis voluptas.','Nobis explicabo et ut quo totam nobis. Error et fuga officia impedit molestiae. Tempore quaerat voluptatem ratione rerum nobis voluptas.','Nobis explicabo et ut quo totam nobis. Error et fuga officia impedit molestiae. Tempore quaerat voluptatem ratione rerum nobis voluptas.',698860,'fugit','autem','et','dolorum','voluptatem',6,NULL,'img-tour-05.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','minima','minima'),
(12,'93','recusandae voluptatem','Consequuntur ad unde reiciendis veritatis ullam. Aliquid ad error natus facilis aut dolorem occaecati.','Consequuntur ad unde reiciendis veritatis ullam. Aliquid ad error natus facilis aut dolorem occaecati.','Consequuntur ad unde reiciendis veritatis ullam. Aliquid ad error natus facilis aut dolorem occaecati.',129905,'eum','sed','et','aperiam','omnis',4,NULL,'img-tour-06.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','autem','autem'),
(13,'68','provident accusamus','Doloremque quod vel hic harum omnis vel. Quia sed ab at animi sit repellendus. Excepturi ea blanditiis ipsam.','Doloremque quod vel hic harum omnis vel. Quia sed ab at animi sit repellendus. Excepturi ea blanditiis ipsam.','Doloremque quod vel hic harum omnis vel. Quia sed ab at animi sit repellendus. Excepturi ea blanditiis ipsam.',709847,'perferendis','odit','aut','fuga','dolorem',6,NULL,'img-tour-01.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','error','error'),
(14,'57','perspiciatis quo','Ad eius tempore distinctio aut. Velit ut eum non. Ipsa rem velit numquam et dolorem quisquam.','Ad eius tempore distinctio aut. Velit ut eum non. Ipsa rem velit numquam et dolorem quisquam.','Ad eius tempore distinctio aut. Velit ut eum non. Ipsa rem velit numquam et dolorem quisquam.',806032,'nesciunt','eligendi','quisquam','repellat','voluptates',7,NULL,'img-tour-02.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','soluta','soluta'),
(15,'91','aut id','Perferendis soluta explicabo et vel. Molestias est natus et quaerat nihil dolores. Doloremque animi nostrum est et nesciunt consequatur minus. Et voluptas labore fugit autem accusamus.','Perferendis soluta explicabo et vel. Molestias est natus et quaerat nihil dolores. Doloremque animi nostrum est et nesciunt consequatur minus. Et voluptas labore fugit autem accusamus.','Perferendis soluta explicabo et vel. Molestias est natus et quaerat nihil dolores. Doloremque animi nostrum est et nesciunt consequatur minus. Et voluptas labore fugit autem accusamus.',114625,'rem','temporibus','qui','quia','quas',6,NULL,'img-tour-03.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','repudiandae','repudiandae'),
(16,'43','aut nesciunt','Et dolorum tempore porro architecto accusamus eos qui. Eum vel minus odit itaque facere ducimus odio. Dolorem dolor eaque molestiae.','Et dolorum tempore porro architecto accusamus eos qui. Eum vel minus odit itaque facere ducimus odio. Dolorem dolor eaque molestiae.','Et dolorum tempore porro architecto accusamus eos qui. Eum vel minus odit itaque facere ducimus odio. Dolorem dolor eaque molestiae.',766049,'blanditiis','quibusdam','maiores','illo','repellat',7,NULL,'img-tour-04.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','officia','officia'),
(17,'23','tenetur pariatur','Dolores consequatur nulla dolores odit. Quas iste consequatur commodi blanditiis ratione consequuntur.','Dolores consequatur nulla dolores odit. Quas iste consequatur commodi blanditiis ratione consequuntur.','Dolores consequatur nulla dolores odit. Quas iste consequatur commodi blanditiis ratione consequuntur.',610613,'quia','et','sunt','aut','velit',6,NULL,'img-tour-05.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','natus','natus'),
(18,'39','qui voluptatem','Repellat ipsam repudiandae molestiae autem. Iure adipisci perspiciatis debitis ullam. Velit id provident sint ut suscipit omnis nobis ea.','Repellat ipsam repudiandae molestiae autem. Iure adipisci perspiciatis debitis ullam. Velit id provident sint ut suscipit omnis nobis ea.','Repellat ipsam repudiandae molestiae autem. Iure adipisci perspiciatis debitis ullam. Velit id provident sint ut suscipit omnis nobis ea.',494264,'ipsum','pariatur','et','magni','ad',5,NULL,'img-tour-06.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','est','est'),
(19,'40','libero qui','Quia mollitia dignissimos eius et optio neque et. Et in tempora sint. Nemo vel dolor ducimus cupiditate. Dolorem voluptates temporibus architecto possimus quam possimus enim.','Quia mollitia dignissimos eius et optio neque et. Et in tempora sint. Nemo vel dolor ducimus cupiditate. Dolorem voluptates temporibus architecto possimus quam possimus enim.','Quia mollitia dignissimos eius et optio neque et. Et in tempora sint. Nemo vel dolor ducimus cupiditate. Dolorem voluptates temporibus architecto possimus quam possimus enim.',198195,'aut','voluptatem','ipsam','molestias','ipsa',3,NULL,'img-tour-06.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','at','at'),
(20,'49','qui dolores','Laudantium numquam facere non sed aliquid sequi occaecati. Nesciunt similique necessitatibus expedita ut.','Laudantium numquam facere non sed aliquid sequi occaecati. Nesciunt similique necessitatibus expedita ut.','Laudantium numquam facere non sed aliquid sequi occaecati. Nesciunt similique necessitatibus expedita ut.',523368,'repellendus','ea','molestias','facere','expedita',6,NULL,'img-tour-01.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','optio','optio'),
(21,'48','ratione et','Corporis quo fugiat quam minus quaerat ipsam. Molestiae dicta minima quis eum. Sed placeat optio et accusamus esse perferendis. Asperiores aliquam ut explicabo error et fuga mollitia.','Corporis quo fugiat quam minus quaerat ipsam. Molestiae dicta minima quis eum. Sed placeat optio et accusamus esse perferendis. Asperiores aliquam ut explicabo error et fuga mollitia.','Corporis quo fugiat quam minus quaerat ipsam. Molestiae dicta minima quis eum. Sed placeat optio et accusamus esse perferendis. Asperiores aliquam ut explicabo error et fuga mollitia.',193017,'magnam','ipsa','ullam','saepe','similique',7,NULL,'img-tour-02.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','quod','quod'),
(22,'17','vel a','Necessitatibus debitis assumenda nesciunt fuga qui dolor. Est repudiandae dolorem nihil maxime aut est. Rerum voluptatem temporibus exercitationem enim explicabo. Vitae asperiores eos et et commodi.','Necessitatibus debitis assumenda nesciunt fuga qui dolor. Est repudiandae dolorem nihil maxime aut est. Rerum voluptatem temporibus exercitationem enim explicabo. Vitae asperiores eos et et commodi.','Necessitatibus debitis assumenda nesciunt fuga qui dolor. Est repudiandae dolorem nihil maxime aut est. Rerum voluptatem temporibus exercitationem enim explicabo. Vitae asperiores eos et et commodi.',914249,'quisquam','reprehenderit','assumenda','rerum','voluptas',1,NULL,'img-tour-03.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','laboriosam','laboriosam'),
(23,'76','sequi distinctio','Aut porro ipsam numquam magni est aut sapiente. Quasi ducimus deleniti nihil molestiae dicta. Placeat sed reiciendis omnis sit et quis et. Inventore fugiat error consequatur ipsam repellat.','Aut porro ipsam numquam magni est aut sapiente. Quasi ducimus deleniti nihil molestiae dicta. Placeat sed reiciendis omnis sit et quis et. Inventore fugiat error consequatur ipsam repellat.','Aut porro ipsam numquam magni est aut sapiente. Quasi ducimus deleniti nihil molestiae dicta. Placeat sed reiciendis omnis sit et quis et. Inventore fugiat error consequatur ipsam repellat.',167719,'reiciendis','nostrum','temporibus','reiciendis','alias',4,NULL,'img-tour-04.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','facere','facere'),
(24,'22','minus dolorem','Delectus consequatur molestiae omnis voluptatibus. Et tempora voluptates voluptas pariatur similique. Facere laboriosam et et nobis quaerat eum.','Delectus consequatur molestiae omnis voluptatibus. Et tempora voluptates voluptas pariatur similique. Facere laboriosam et et nobis quaerat eum.','Delectus consequatur molestiae omnis voluptatibus. Et tempora voluptates voluptas pariatur similique. Facere laboriosam et et nobis quaerat eum.',741087,'odit','quo','non','soluta','quibusdam',7,NULL,'img-tour-05.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','nobis','nobis'),
(25,'60','quia hic','Quisquam sit provident expedita amet sit. Minima optio aut corrupti eveniet quis vitae. Nobis quam id error ratione aliquam minima. Est tenetur earum impedit rerum ex assumenda.','Quisquam sit provident expedita amet sit. Minima optio aut corrupti eveniet quis vitae. Nobis quam id error ratione aliquam minima. Est tenetur earum impedit rerum ex assumenda.','Quisquam sit provident expedita amet sit. Minima optio aut corrupti eveniet quis vitae. Nobis quam id error ratione aliquam minima. Est tenetur earum impedit rerum ex assumenda.',792163,'laborum','minima','quo','rerum','debitis',4,NULL,'img-tour-06.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','illum','illum'),
(26,'77','non aut','Rem voluptate cum ut aut. Aperiam non error et molestiae voluptatem at molestiae magni. Adipisci soluta tenetur eius labore nulla magni soluta. Deleniti soluta officia explicabo voluptate.','Rem voluptate cum ut aut. Aperiam non error et molestiae voluptatem at molestiae magni. Adipisci soluta tenetur eius labore nulla magni soluta. Deleniti soluta officia explicabo voluptate.','Rem voluptate cum ut aut. Aperiam non error et molestiae voluptatem at molestiae magni. Adipisci soluta tenetur eius labore nulla magni soluta. Deleniti soluta officia explicabo voluptate.',131977,'deleniti','quas','quam','libero','unde',3,NULL,'img-tour-01.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','porro','porro'),
(27,'25','maiores atque','Quos itaque sapiente et architecto fugiat tempora. Ipsum non quia deserunt incidunt optio id possimus. Omnis veniam qui nobis. In occaecati ipsam occaecati adipisci.','Quos itaque sapiente et architecto fugiat tempora. Ipsum non quia deserunt incidunt optio id possimus. Omnis veniam qui nobis. In occaecati ipsam occaecati adipisci.','Quos itaque sapiente et architecto fugiat tempora. Ipsum non quia deserunt incidunt optio id possimus. Omnis veniam qui nobis. In occaecati ipsam occaecati adipisci.',743897,'pariatur','provident','beatae','ex','molestiae',2,NULL,'img-tour-02.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','veritatis','veritatis'),
(28,'86','asperiores explicabo','Culpa eveniet esse ullam provident labore. Numquam et modi facilis est modi repellat. Ducimus magnam voluptatem ab ut quibusdam.','Culpa eveniet esse ullam provident labore. Numquam et modi facilis est modi repellat. Ducimus magnam voluptatem ab ut quibusdam.','Culpa eveniet esse ullam provident labore. Numquam et modi facilis est modi repellat. Ducimus magnam voluptatem ab ut quibusdam.',436508,'rerum','commodi','autem','perferendis','reprehenderit',6,NULL,'img-tour-03.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','quo','quo'),
(29,'27','ut non','Dolor et nihil esse dignissimos rerum. Fugit dolorum provident itaque qui. Sint nemo molestiae quasi. Laboriosam in repudiandae et qui sunt sed dolor.','Dolor et nihil esse dignissimos rerum. Fugit dolorum provident itaque qui. Sint nemo molestiae quasi. Laboriosam in repudiandae et qui sunt sed dolor.','Dolor et nihil esse dignissimos rerum. Fugit dolorum provident itaque qui. Sint nemo molestiae quasi. Laboriosam in repudiandae et qui sunt sed dolor.',143330,'provident','et','sunt','blanditiis','possimus',4,NULL,'img-tour-04.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','accusamus','accusamus'),
(30,'26','tenetur vel','Rerum vero ut et nisi exercitationem doloribus. Impedit et eos quis. Sed dicta consequuntur repudiandae quam quo. Qui corporis nihil sint blanditiis quis et omnis.','Rerum vero ut et nisi exercitationem doloribus. Impedit et eos quis. Sed dicta consequuntur repudiandae quam quo. Qui corporis nihil sint blanditiis quis et omnis.','Rerum vero ut et nisi exercitationem doloribus. Impedit et eos quis. Sed dicta consequuntur repudiandae quam quo. Qui corporis nihil sint blanditiis quis et omnis.',161952,'atque','ipsa','odit','hic','recusandae',1,NULL,'img-tour-05.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','quos','quos'),
(31,'59','sed et','Suscipit excepturi similique placeat aut eum voluptas nemo. Distinctio voluptas cumque tempora at itaque. Et doloremque qui quos et itaque.','Suscipit excepturi similique placeat aut eum voluptas nemo. Distinctio voluptas cumque tempora at itaque. Et doloremque qui quos et itaque.','Suscipit excepturi similique placeat aut eum voluptas nemo. Distinctio voluptas cumque tempora at itaque. Et doloremque qui quos et itaque.',827999,'consectetur','fuga','quasi','et','tenetur',2,NULL,'img-tour-06.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','ea','ea'),
(32,'8','voluptates consequatur','Non pariatur tempore ipsum corrupti enim et nulla recusandae. Nemo dolor dolores sit et accusamus quo omnis. Minus facilis culpa placeat temporibus.','Non pariatur tempore ipsum corrupti enim et nulla recusandae. Nemo dolor dolores sit et accusamus quo omnis. Minus facilis culpa placeat temporibus.','Non pariatur tempore ipsum corrupti enim et nulla recusandae. Nemo dolor dolores sit et accusamus quo omnis. Minus facilis culpa placeat temporibus.',153274,'aliquid','et','eius','nostrum','maiores',1,NULL,'img-tour-01.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','neque','neque'),
(33,'5','odio odit','Modi quasi odit facere et rerum et sunt. Quam impedit enim rerum quae ab. Maxime reprehenderit aut recusandae sapiente id.','Modi quasi odit facere et rerum et sunt. Quam impedit enim rerum quae ab. Maxime reprehenderit aut recusandae sapiente id.','Modi quasi odit facere et rerum et sunt. Quam impedit enim rerum quae ab. Maxime reprehenderit aut recusandae sapiente id.',328508,'iste','sint','necessitatibus','qui','vero',5,NULL,'img-tour-02.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','odio','odio'),
(34,'24','eligendi placeat','Id omnis dolorem qui optio ut. Est sunt quasi et dolorem temporibus ipsam. Porro praesentium non sed quia. Facilis quo et quis voluptatibus eum.','Id omnis dolorem qui optio ut. Est sunt quasi et dolorem temporibus ipsam. Porro praesentium non sed quia. Facilis quo et quis voluptatibus eum.','Id omnis dolorem qui optio ut. Est sunt quasi et dolorem temporibus ipsam. Porro praesentium non sed quia. Facilis quo et quis voluptatibus eum.',685652,'quaerat','et','alias','non','iure',5,NULL,'img-tour-03.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','beatae','beatae'),
(35,'9','suscipit facere','Saepe repellendus asperiores exercitationem assumenda ducimus. Omnis voluptate dicta enim hic enim. Suscipit qui aut in praesentium temporibus. Tempore atque consectetur sequi qui quam illo quae.','Saepe repellendus asperiores exercitationem assumenda ducimus. Omnis voluptate dicta enim hic enim. Suscipit qui aut in praesentium temporibus. Tempore atque consectetur sequi qui quam illo quae.','Saepe repellendus asperiores exercitationem assumenda ducimus. Omnis voluptate dicta enim hic enim. Suscipit qui aut in praesentium temporibus. Tempore atque consectetur sequi qui quam illo quae.',409715,'qui','corrupti','ipsam','voluptas','numquam',7,NULL,'img-tour-04.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','dolores','dolores'),
(36,'88','neque ut','Aliquid nobis sit velit sed aut temporibus. Fuga et earum dolores mollitia provident molestiae libero dolorum. Aut maiores dolor earum et. Nemo et eligendi eaque natus quidem.','Aliquid nobis sit velit sed aut temporibus. Fuga et earum dolores mollitia provident molestiae libero dolorum. Aut maiores dolor earum et. Nemo et eligendi eaque natus quidem.','Aliquid nobis sit velit sed aut temporibus. Fuga et earum dolores mollitia provident molestiae libero dolorum. Aut maiores dolor earum et. Nemo et eligendi eaque natus quidem.',763081,'fugiat','pariatur','distinctio','expedita','non',6,NULL,'img-tour-05.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','harum','harum'),
(37,'89','asperiores dolor','Hic quis et error est sequi. Veniam qui veniam non rerum. Eum velit officia neque tenetur facilis accusantium est. Molestiae reiciendis et nihil distinctio.','Hic quis et error est sequi. Veniam qui veniam non rerum. Eum velit officia neque tenetur facilis accusantium est. Molestiae reiciendis et nihil distinctio.','Hic quis et error est sequi. Veniam qui veniam non rerum. Eum velit officia neque tenetur facilis accusantium est. Molestiae reiciendis et nihil distinctio.',163101,'voluptatum','sint','nulla','maiores','veniam',1,NULL,'img-tour-06.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','dolore','dolore'),
(38,'37','vel id','Aut aliquid quis in. Consequuntur totam quo rerum ipsum et qui. Sapiente ducimus dolore exercitationem commodi molestiae. Et temporibus inventore harum voluptatem enim asperiores.','Aut aliquid quis in. Consequuntur totam quo rerum ipsum et qui. Sapiente ducimus dolore exercitationem commodi molestiae. Et temporibus inventore harum voluptatem enim asperiores.','Aut aliquid quis in. Consequuntur totam quo rerum ipsum et qui. Sapiente ducimus dolore exercitationem commodi molestiae. Et temporibus inventore harum voluptatem enim asperiores.',670613,'eligendi','quibusdam','repellendus','neque','dignissimos',4,NULL,'img-tour-01.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','sint','sint'),
(39,'13','ab velit','Voluptas est et qui voluptatem doloribus sint modi quis. Nihil officiis vero id ex qui. Id beatae explicabo ea praesentium quia asperiores. Est ut soluta velit neque quis animi beatae.','Voluptas est et qui voluptatem doloribus sint modi quis. Nihil officiis vero id ex qui. Id beatae explicabo ea praesentium quia asperiores. Est ut soluta velit neque quis animi beatae.','Voluptas est et qui voluptatem doloribus sint modi quis. Nihil officiis vero id ex qui. Id beatae explicabo ea praesentium quia asperiores. Est ut soluta velit neque quis animi beatae.',933249,'esse','vitae','maxime','sit','quam',4,NULL,'img-tour-02.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','animi','animi'),
(40,'62','distinctio velit','Ipsum provident corrupti fugiat inventore et est vel. Rem maxime nemo temporibus aut. Quia ea molestiae est. Culpa voluptatem repudiandae quos est.','Ipsum provident corrupti fugiat inventore et est vel. Rem maxime nemo temporibus aut. Quia ea molestiae est. Culpa voluptatem repudiandae quos est.','Ipsum provident corrupti fugiat inventore et est vel. Rem maxime nemo temporibus aut. Quia ea molestiae est. Culpa voluptatem repudiandae quos est.',820812,'nulla','reiciendis','magni','dolores','molestias',4,NULL,'img-tour-03.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','iusto','iusto'),
(41,'67','perspiciatis ut','Similique quia aspernatur est et. Hic quas vero minima quia et ad. Aspernatur est maxime sit facilis. Dolorem culpa nemo quia aut ad reprehenderit magni.','Similique quia aspernatur est et. Hic quas vero minima quia et ad. Aspernatur est maxime sit facilis. Dolorem culpa nemo quia aut ad reprehenderit magni.','Similique quia aspernatur est et. Hic quas vero minima quia et ad. Aspernatur est maxime sit facilis. Dolorem culpa nemo quia aut ad reprehenderit magni.',512836,'quae','ut','quo','iste','vel',2,NULL,'img-tour-04.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','quasi','quasi'),
(42,'90','nulla in','Id enim deserunt voluptas eos quo. Doloremque rerum dolore dolorem sed reprehenderit. Vitae libero qui animi similique et laboriosam. Quia nihil rerum sit debitis.','Id enim deserunt voluptas eos quo. Doloremque rerum dolore dolorem sed reprehenderit. Vitae libero qui animi similique et laboriosam. Quia nihil rerum sit debitis.','Id enim deserunt voluptas eos quo. Doloremque rerum dolore dolorem sed reprehenderit. Vitae libero qui animi similique et laboriosam. Quia nihil rerum sit debitis.',541658,'vitae','quia','quibusdam','quia','ipsam',2,NULL,'img-tour-05.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','eaque','eaque'),
(43,'78','assumenda et','Et minima incidunt praesentium quos. Non quas beatae quia pariatur. Nobis voluptatum qui nemo omnis ut beatae.','Et minima incidunt praesentium quos. Non quas beatae quia pariatur. Nobis voluptatum qui nemo omnis ut beatae.','Et minima incidunt praesentium quos. Non quas beatae quia pariatur. Nobis voluptatum qui nemo omnis ut beatae.',639882,'doloremque','cumque','iusto','itaque','cum',3,NULL,'img-tour-06.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','corporis','corporis'),
(44,'45','placeat id','Quod et omnis delectus et occaecati. Libero consequatur autem ipsam est consectetur repudiandae rerum. At aliquid est debitis aut.','Quod et omnis delectus et occaecati. Libero consequatur autem ipsam est consectetur repudiandae rerum. At aliquid est debitis aut.','Quod et omnis delectus et occaecati. Libero consequatur autem ipsam est consectetur repudiandae rerum. At aliquid est debitis aut.',509334,'necessitatibus','molestiae','numquam','eos','labore',5,NULL,'img-tour-01.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','sed','sed'),
(45,'99','tempore beatae','Et officia aliquam autem ex. Illo ipsam odit dolores et dolor distinctio amet. Autem id rerum enim quos sapiente nisi animi. Porro fugiat maiores at illum.','Et officia aliquam autem ex. Illo ipsam odit dolores et dolor distinctio amet. Autem id rerum enim quos sapiente nisi animi. Porro fugiat maiores at illum.','Et officia aliquam autem ex. Illo ipsam odit dolores et dolor distinctio amet. Autem id rerum enim quos sapiente nisi animi. Porro fugiat maiores at illum.',709683,'culpa','repudiandae','cumque','id','dolor',2,NULL,'img-tour-02.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','nisi','nisi'),
(46,'33','enim quod','Consequatur neque omnis qui quibusdam totam aut quia. Quo sit sequi et. Quas quisquam doloribus nam culpa sequi eaque doloribus. Culpa dolores id assumenda.','Consequatur neque omnis qui quibusdam totam aut quia. Quo sit sequi et. Quas quisquam doloribus nam culpa sequi eaque doloribus. Culpa dolores id assumenda.','Consequatur neque omnis qui quibusdam totam aut quia. Quo sit sequi et. Quas quisquam doloribus nam culpa sequi eaque doloribus. Culpa dolores id assumenda.',114243,'hic','aut','dolorem','quis','quidem',5,NULL,'img-tour-03.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','delectus','delectus'),
(47,'97','doloribus nihil','Nesciunt est possimus fugit. Quaerat dignissimos iusto tempora. Et aliquam laudantium tenetur facere culpa.','Nesciunt est possimus fugit. Quaerat dignissimos iusto tempora. Et aliquam laudantium tenetur facere culpa.','Nesciunt est possimus fugit. Quaerat dignissimos iusto tempora. Et aliquam laudantium tenetur facere culpa.',421645,'nihil','aut','necessitatibus','modi','deserunt',5,NULL,'img-tour-04.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','eos','eos'),
(48,'31','dolorem delectus','Pariatur vero eum unde aut ad ut accusamus quos. Voluptas quos repellat rerum non est similique doloremque. Ut cumque porro sed aut rerum pariatur cupiditate. In vero voluptatum saepe qui ipsam.','Pariatur vero eum unde aut ad ut accusamus quos. Voluptas quos repellat rerum non est similique doloremque. Ut cumque porro sed aut rerum pariatur cupiditate. In vero voluptatum saepe qui ipsam.','Pariatur vero eum unde aut ad ut accusamus quos. Voluptas quos repellat rerum non est similique doloremque. Ut cumque porro sed aut rerum pariatur cupiditate. In vero voluptatum saepe qui ipsam.',234576,'quis','sit','dolores','quisquam','nam',2,NULL,'img-tour-05.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','totam','totam'),
(49,'83','et vel','Optio maiores rem inventore omnis illo. In iusto laudantium ad aperiam consequatur. Veniam necessitatibus asperiores quo beatae. Eos officia ratione voluptates unde facere aut facere.','Optio maiores rem inventore omnis illo. In iusto laudantium ad aperiam consequatur. Veniam necessitatibus asperiores quo beatae. Eos officia ratione voluptates unde facere aut facere.','Optio maiores rem inventore omnis illo. In iusto laudantium ad aperiam consequatur. Veniam necessitatibus asperiores quo beatae. Eos officia ratione voluptates unde facere aut facere.',500490,'fuga','placeat','ut','aut','tempora',4,NULL,'img-tour-06.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','consequuntur','consequuntur'),
(50,'72','repellat dignissimos','Magni qui odit est illum nobis cumque. Non est aut assumenda harum. Est soluta provident dolores. Recusandae similique odio doloribus ullam. Autem animi ea ratione quod. Odit eum autem natus.','Magni qui odit est illum nobis cumque. Non est aut assumenda harum. Est soluta provident dolores. Recusandae similique odio doloribus ullam. Autem animi ea ratione quod. Odit eum autem natus.','Magni qui odit est illum nobis cumque. Non est aut assumenda harum. Est soluta provident dolores. Recusandae similique odio doloribus ullam. Autem animi ea ratione quod. Odit eum autem natus.',926126,'perspiciatis','ut','numquam','assumenda','incidunt',2,NULL,'img-tour-01.jpg','2021-10-07 04:37:55','2021-10-07 04:37:55','praesentium','praesentium');

/*Table structure for table `categories` */

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`slug`,`created_at`,`updated_at`) values 
(1,'voluptas praesentium','voluptas-praesentium','2021-10-01 09:26:13','2021-10-01 09:26:13'),
(2,'necessitatibus iste','necessitatibus-iste','2021-10-01 09:26:13','2021-10-01 09:26:13'),
(3,'laborum ut','laborum-ut','2021-10-01 09:26:13','2021-10-01 09:26:13'),
(4,'sit libero','sit-libero','2021-10-01 09:26:13','2021-10-01 09:26:13'),
(5,'dolor corrupti','dolor-corrupti','2021-10-01 09:26:13','2021-10-01 09:26:13'),
(6,'quo reprehenderit','quo-reprehenderit','2021-10-01 09:26:13','2021-10-01 09:26:13'),
(7,'molestias cupiditate','molestias-cupiditate','2021-10-01 09:28:12','2021-10-01 09:28:12'),
(8,'non et','non-et','2021-10-01 09:28:12','2021-10-01 09:28:12'),
(9,'sed impedit','sed-impedit','2021-10-01 09:28:12','2021-10-01 09:28:12'),
(10,'consequuntur saepe','consequuntur-saepe','2021-10-01 09:28:12','2021-10-01 09:28:12'),
(11,'fugiat ut','fugiat-ut','2021-10-01 09:28:12','2021-10-01 09:28:12'),
(12,'temporibus sit','temporibus-sit','2021-10-01 09:28:12','2021-10-01 09:28:12'),
(13,'quo necessitatibus','quo-necessitatibus','2021-10-06 04:41:13','2021-10-06 04:41:13'),
(14,'amet esse','amet-esse','2021-10-06 04:41:13','2021-10-06 04:41:13'),
(15,'sequi aperiam','sequi-aperiam','2021-10-06 04:41:13','2021-10-06 04:41:13'),
(16,'praesentium magni','praesentium-magni','2021-10-06 04:41:13','2021-10-06 04:41:13'),
(17,'necessitatibus qui','necessitatibus-qui','2021-10-06 04:41:13','2021-10-06 04:41:13'),
(18,'et non','et-non','2021-10-06 04:41:13','2021-10-06 04:41:13');

/*Table structure for table `failed_jobs` */

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(6,'2021_10_01_082636_create_categories_table',2),
(7,'2021_10_01_082656_create_products_table',2),
(8,'2021_10_06_040932_create_tourpackets_table',3),
(9,'2021_10_06_042724_create_qwertyus_table',3),
(10,'2021_10_06_080709_create_agents_table',1);

/*Table structure for table `password_resets` */

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `products` */

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_status` enum('instock','outofstock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(10) unsigned NOT NULL DEFAULT 10,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`slug`,`short_description`,`description`,`regular_price`,`sale_price`,`SKU`,`stock_status`,`featured`,`quantity`,`image`,`images`,`category_id`,`created_at`,`updated_at`) values 
(1,'saepe qui eos eos','saepe-qui-eos-eos','Eligendi ad officia dicta rerum aliquam modi tempora. Ullam quis voluptates tenetur quidem. Nobis possimus porro debitis deleniti cumque unde.','Optio numquam ipsa qui sunt. Dignissimos doloribus qui ut. Non cumque ducimus commodi accusantium dicta error. Dolores autem sit velit omnis ea. Quis sit quis eos voluptatem minima id quisquam. Labore fugit officiis magnam fugiat nostrum eligendi odit voluptas.',168.00,NULL,'DIGI382','instock',0,129,'digital_12.jpg',NULL,3,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(2,'dolorum maxime sed adipisci','dolorum-maxime-sed-adipisci','Commodi in occaecati impedit. In odit dolor omnis et voluptatem. Eum sequi possimus at rerum corporis. Nesciunt voluptas accusamus est modi suscipit ut numquam.','Sit porro reprehenderit autem tempora placeat ratione illo molestiae. Placeat beatae quae eius non et similique. Eius dolores aliquam et beatae perspiciatis dolor et. Perferendis commodi possimus deleniti rerum et ea ipsa. Eius illum et debitis ipsa quis ut animi. Quis aperiam molestiae quia ea nam eius sed. Non aut accusamus magni aspernatur et velit nostrum. Laboriosam quaerat ex impedit sit ut soluta cum.',137.00,NULL,'DIGI429','instock',0,100,'digital_15.jpg',NULL,2,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(3,'sit consequuntur impedit explicabo','sit-consequuntur-impedit-explicabo','Tenetur eos aut dolor. Unde cupiditate nesciunt corrupti eveniet ea. Facilis sed temporibus tenetur. Ut delectus eos at sed aut eaque doloribus.','Sint quia occaecati repellat vero cumque. Officiis omnis harum ea animi consequatur. Officiis cupiditate ratione impedit quod aut iste. Dolorem aliquam et delectus a reprehenderit qui. Eaque ad voluptate dolorem sit quia blanditiis. Eos iste consequatur deserunt voluptas quidem. Et inventore perspiciatis quia eos. Nisi aperiam doloribus in excepturi corrupti et.',416.00,NULL,'DIGI186','instock',0,156,'digital_4.jpg',NULL,5,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(4,'porro eveniet quo quaerat','porro-eveniet-quo-quaerat','Sed aut excepturi nihil. Omnis quaerat quo nihil omnis. Voluptates dolorem et a tempora magnam et est. Tempore officia sed expedita quia sint.','Et nam delectus non doloremque architecto velit aspernatur est. Sint est in placeat nihil sequi consequuntur. Earum eaque accusamus velit animi. Culpa voluptatibus qui possimus et rerum sed. Debitis amet sapiente laboriosam qui fugit magnam. Voluptas dolorum qui sed vel quibusdam libero. Rerum dolore molestiae nobis iure. Modi dolor et qui incidunt minima deleniti. Iure amet animi porro quod consequatur.',488.00,NULL,'DIGI347','instock',0,124,'digital_18.jpg',NULL,5,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(5,'quam hic ducimus maiores','quam-hic-ducimus-maiores','Non sunt et et est. Recusandae corporis esse recusandae. Eum hic est placeat ea nulla eligendi quas.','Molestiae sed quia nihil libero praesentium. Placeat laudantium sit aut voluptas laboriosam consequuntur. Ipsum consequatur officia recusandae fuga molestias repellat. Voluptatem repudiandae aut voluptatum molestiae et voluptas. Corporis in et asperiores quod neque repellat vel. Quaerat sed sit hic fuga. Aut impedit qui dolorem quisquam. Maxime quia debitis sit qui voluptas distinctio repudiandae. Excepturi corporis explicabo velit dolore.',174.00,NULL,'DIGI452','instock',0,192,'digital_21.jpg',NULL,4,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(6,'neque sit ducimus quia','neque-sit-ducimus-quia','Libero eveniet expedita culpa ipsum ipsam delectus illo. Qui dolorem aut cupiditate ut est. Ipsam pariatur quis sapiente dolorem ut.','Consectetur tempore reiciendis praesentium rerum ut accusantium veritatis. Aut explicabo consequatur ullam fuga odit quis. Ut neque voluptate quae et et. Quae aperiam eveniet molestiae exercitationem fugiat itaque. Blanditiis a asperiores cum delectus fuga. At deleniti beatae consectetur cupiditate quos est itaque. Porro sunt voluptas eum dolores rerum perferendis. Ea reprehenderit nobis odit et voluptate corporis ut.',379.00,NULL,'DIGI375','instock',0,194,'digital_20.jpg',NULL,1,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(7,'commodi omnis nihil ducimus','commodi-omnis-nihil-ducimus','Quia cum aut non molestiae et nulla. Voluptas quos magnam sint nobis. Voluptatem sit cumque quidem.','Labore quidem nulla assumenda cupiditate dolor illo molestias. Unde porro cum id velit. Ex commodi aliquid quae iusto et in. Aliquam vitae consectetur voluptatum eius rem omnis aut. Rerum voluptas dignissimos ut quia maxime ea. Qui in eaque voluptas non. Unde consequatur possimus fugit odit. Et saepe corrupti est necessitatibus nihil molestiae. Possimus tenetur voluptate est qui at. Quo non quae aut quia autem incidunt.',229.00,NULL,'DIGI264','instock',0,156,'digital_11.jpg',NULL,2,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(8,'quam veritatis mollitia velit','quam-veritatis-mollitia-velit','Non facere fuga ab qui. Necessitatibus rerum error facere provident non. Et quis eum voluptas eveniet est voluptate. Magni minus sequi dolor ducimus.','Magni dolorem velit et quos dolores. Molestiae atque tempore rerum ipsum voluptas. Nobis vel quo aliquam molestias deserunt. Et eos molestiae magni tenetur. Earum a qui molestias non. Explicabo ut ipsam amet. Illum iure eum blanditiis alias quisquam necessitatibus amet. Quia ut rerum quas dolor non. Accusantium placeat adipisci quaerat recusandae omnis.',470.00,NULL,'DIGI142','instock',0,133,'digital_8.jpg',NULL,5,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(9,'repellat omnis laudantium dolores','repellat-omnis-laudantium-dolores','Iusto nihil molestiae laboriosam sed dolor ipsum. Voluptas omnis aut inventore sequi. Quidem molestiae in dignissimos voluptatem accusamus. Ad aut et et id a fugit sequi.','Voluptatem sunt quis blanditiis possimus dolor fuga autem. Et quia facere ullam consequatur omnis. Nostrum ullam eum quidem dolorem. Veritatis dolor assumenda facere. Iste commodi praesentium ut omnis sed et. Occaecati ab vero qui architecto. Est omnis fugiat cum aut vel. Molestias iste doloremque dolor omnis. Quaerat nostrum consequatur et. Et unde aut nostrum.',99.00,NULL,'DIGI244','instock',0,150,'digital_14.jpg',NULL,1,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(10,'voluptates sint dolorem velit','voluptates-sint-dolorem-velit','Aspernatur natus voluptatem neque ut quo quia voluptatem voluptatem. Eius labore totam voluptatum est. Ab aut impedit quam. Nihil harum autem qui dolore repellendus.','Est dolore a debitis at sed omnis autem. Beatae dolores sit eos ab. Dolorem blanditiis id sed dolorum qui eveniet. Temporibus ea autem accusamus quis non illum amet nesciunt. Aut libero eos cumque est sed est. Voluptas perspiciatis aperiam earum tempora sed maxime dolores harum. Quos veritatis officia atque eum consequatur. Rerum reprehenderit deleniti et incidunt possimus accusantium.',67.00,NULL,'DIGI209','instock',0,192,'digital_10.jpg',NULL,5,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(11,'iure aliquid porro vitae','iure-aliquid-porro-vitae','Ducimus consequatur vero sed voluptas. Voluptatem sed nemo nostrum illum. Provident accusantium et dolor nihil laudantium. Magni dolorem laudantium soluta ut qui eos voluptas.','Omnis voluptate quisquam ut et quia. Illum aperiam recusandae nostrum ratione consectetur. Iure natus amet eum dolorum voluptatem autem. Enim nisi eligendi doloribus unde voluptatum. Nostrum ullam a sit doloremque nesciunt numquam dolor omnis. Eos nostrum fugit dolorum fuga qui. Rerum dolor nam praesentium. Commodi autem odio temporibus qui doloribus. Et ut qui rerum voluptas nemo ut laudantium. Non quam velit aut necessitatibus praesentium non quaerat.',44.00,NULL,'DIGI486','instock',0,196,'digital_22.jpg',NULL,5,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(12,'et doloremque hic nulla','et-doloremque-hic-nulla','Unde harum voluptatibus quo possimus rem inventore ipsa. Quia mollitia sapiente quod vel reprehenderit quis cum et. Dolore et voluptas in voluptatum. Consequatur qui odio vitae omnis laborum.','Dignissimos sed sit unde perferendis. Qui placeat neque voluptas et modi beatae aut sed. In possimus nihil consequatur dolor iste. Eius incidunt modi labore ab et sunt minima. Nisi molestiae qui rerum aut. Provident occaecati voluptatem non eius ducimus ex cumque. Non voluptatem asperiores velit illum doloribus. Nulla porro ut illo ut. Dolore veritatis architecto natus illo asperiores qui corporis. Nesciunt voluptatem aut iure eveniet nemo.',200.00,NULL,'DIGI333','instock',0,171,'digital_2.jpg',NULL,4,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(13,'ipsa eum tempore blanditiis','ipsa-eum-tempore-blanditiis','Architecto dolor sapiente cumque. Mollitia ea at porro est ratione quaerat non. Commodi itaque et dolore est non.','Omnis voluptatem nulla soluta. Quia nihil repellat veniam mollitia qui doloremque corporis. Officiis sunt ut omnis rem. Voluptatem asperiores tempore voluptatem ut delectus illo quasi doloribus. Ut amet possimus et fuga. Voluptatem occaecati reprehenderit totam est quia quo quis doloremque. Hic omnis sit et libero ea. Iusto fugit eligendi nesciunt aut voluptas accusamus et.',195.00,NULL,'DIGI445','instock',0,163,'digital_17.jpg',NULL,5,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(14,'tempora accusantium voluptatem atque','tempora-accusantium-voluptatem-atque','Incidunt non accusamus doloremque eos et. Aut corrupti maxime autem. Explicabo ipsa voluptatum quos quisquam.','Fugit labore qui dolor consectetur illum est doloribus illo. Asperiores quia ut omnis error. Reiciendis hic iste natus minima. Qui non voluptatum quos explicabo rem et. Quia deserunt accusamus repellendus molestias quam inventore. Similique architecto sed molestiae voluptas porro est quidem. In molestiae illum maiores vel impedit ex voluptas. Tenetur rerum optio et sed officiis amet quaerat.',150.00,NULL,'DIGI255','instock',0,156,'digital_5.jpg',NULL,1,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(15,'dolore odio dolore voluptatem','dolore-odio-dolore-voluptatem','Qui perspiciatis autem enim aspernatur deleniti quasi sint. Praesentium et vel aperiam sapiente velit. Aut cum impedit quo labore suscipit quia.','Provident laborum sed eum numquam aut expedita et. Similique eligendi reprehenderit officiis pariatur ex occaecati. Non ut officiis incidunt tenetur. Dolor accusamus quaerat quae tempora omnis eum enim. Illo ipsum omnis necessitatibus. Harum nisi consectetur magnam doloremque. Quisquam voluptas eos commodi fugiat sed quia. Assumenda aperiam voluptatem optio sit atque soluta. Exercitationem dolores voluptate eum quam.',409.00,NULL,'DIGI493','instock',0,186,'digital_19.jpg',NULL,5,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(16,'labore laboriosam illo totam','labore-laboriosam-illo-totam','Molestiae aut a eaque in. Modi qui cupiditate voluptatem esse soluta eligendi aperiam. Exercitationem dolor sit ad est.','Nemo sint eius et architecto adipisci est. Sit dicta illum laboriosam est. Impedit sit quo magni odit explicabo vel. Harum id illum id cum quis eos cumque. Qui consequatur quis quia tempora dicta. Ea ipsum et est quos mollitia pariatur suscipit. Repellat dolorem error aut et soluta soluta quia.',30.00,NULL,'DIGI308','instock',0,122,'digital_13.jpg',NULL,5,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(17,'nulla atque voluptas molestiae','nulla-atque-voluptas-molestiae','Minima veniam maiores culpa ad perspiciatis laudantium ut. Sint non facere voluptates perspiciatis. Consequatur excepturi natus eum non quas sit corporis.','Est est sunt culpa ea molestias. Laborum iure quo ullam necessitatibus optio necessitatibus ut mollitia. Impedit non ut natus perspiciatis et repudiandae laboriosam vero. Dolor repudiandae provident nisi ut quia. Iusto sit beatae et rerum dicta repudiandae rerum vel. Ab corrupti qui et officia at quia et. Sapiente et veritatis tenetur doloremque dolor quibusdam incidunt officiis. Et molestiae explicabo dolor sed.',233.00,NULL,'DIGI284','instock',0,185,'digital_6.jpg',NULL,1,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(18,'dolor voluptatum assumenda rerum','dolor-voluptatum-assumenda-rerum','Doloremque eum quaerat et qui iste occaecati. Sint omnis sunt aut veniam sed commodi. Provident optio sit sint officia quos. Ut itaque libero doloribus inventore voluptatem et praesentium.','Sit laudantium debitis est iusto. Id quia ut voluptas rerum doloremque maiores ratione. Quibusdam est qui assumenda corrupti. Saepe optio modi repudiandae aut. Fuga animi nihil quidem vel. Voluptates ullam itaque magni enim esse. Deserunt nemo possimus est eos nihil et. Ut quidem reiciendis harum unde voluptatem atque cum quia. Perferendis et maxime quaerat nemo et ab. Quasi earum et nisi qui eveniet saepe et.',481.00,NULL,'DIGI193','instock',0,192,'digital_9.jpg',NULL,3,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(19,'ipsum vel facilis ut','ipsum-vel-facilis-ut','Est voluptatibus ex sint cupiditate quae. Odio et sit et mollitia in. Exercitationem consequatur consequuntur omnis veritatis dicta quia ad. Tempora aut corrupti quo aspernatur.','Adipisci pariatur eum tenetur asperiores laborum. Libero sed impedit consequuntur excepturi repellat inventore deleniti. Temporibus et voluptatem vel rerum. Est veritatis quo fugit aut possimus. At dolore laudantium iste ad. Provident a aperiam distinctio rerum ut corporis consequatur inventore.',387.00,NULL,'DIGI191','instock',0,111,'digital_7.jpg',NULL,4,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(20,'explicabo corporis magni voluptatibus','explicabo-corporis-magni-voluptatibus','Dolor est tempore eos est. Consequatur sint nulla enim et consequuntur. Id assumenda id voluptas aut ullam nulla quos.','Veritatis dolor harum corrupti aliquid qui voluptatem quia. Nihil similique quisquam facere ut. Fugit voluptatem possimus itaque qui. Sunt fugit voluptates dolorem hic accusantium quisquam. In quisquam voluptate sunt ut sed in. Libero facere vel quo quo. Temporibus culpa facere saepe est et qui. Vitae quis temporibus voluptatem. Vel odio accusamus expedita aut ipsam necessitatibus. Culpa et qui perferendis sunt dolorem voluptas est.',311.00,NULL,'DIGI247','instock',0,125,'digital_16.jpg',NULL,3,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(21,'aut ad ullam harum','aut-ad-ullam-harum','Hic qui adipisci molestiae tempore repellat nemo. Vel qui est odit voluptas quia. Ex facere perspiciatis alias voluptatem deserunt nam id eveniet.','Enim quasi voluptatem asperiores saepe impedit est. Nesciunt consequatur unde ipsa delectus quidem et unde. Nostrum voluptas qui voluptatem. Libero iure nihil accusantium. Dolorum modi est voluptate mollitia. Qui fuga voluptate rerum iste. Ducimus adipisci dolores aut consectetur. Reprehenderit laborum asperiores praesentium enim. Saepe sint reprehenderit dicta omnis sint. Voluptatum rem alias quia. Tempora aliquam sed dolores explicabo ut quia.',165.00,NULL,'DIGI306','instock',0,183,'digital_3.jpg',NULL,4,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(22,'optio in tenetur pariatur','optio-in-tenetur-pariatur','Laborum dolor ut autem autem recusandae numquam. Est enim quo sit suscipit recusandae quod. Exercitationem dolore eos unde ea non. Aut autem tempora perferendis magnam.','Omnis perspiciatis quas temporibus praesentium quia porro rerum. Sunt eaque ducimus quo omnis consectetur debitis et iusto. Et veniam nam beatae id culpa. Ducimus vero quae distinctio omnis. Ducimus neque odio quod voluptas minima. Quaerat atque et voluptatem consequatur. Est enim animi maxime qui maiores consequuntur aut. Quis dolorum voluptatibus eveniet suscipit at cumque. Suscipit neque et tempore. Nemo possimus quia aperiam quam est expedita numquam numquam.',254.00,NULL,'DIGI311','instock',0,169,'digital_1.jpg',NULL,5,'2021-10-01 09:28:12','2021-10-01 09:28:12'),
(23,'occaecati ex quis inventore','occaecati-ex-quis-inventore','Veritatis est enim dicta qui qui aperiam. Nostrum sequi suscipit quisquam aut. Maiores quia explicabo occaecati autem.','Labore totam qui dolor suscipit. Id quas aliquid necessitatibus enim. Velit rerum doloremque inventore et excepturi. Atque aspernatur vero et voluptas. Omnis nisi esse quas sit. Et odit ut odio et alias voluptas qui. Facilis voluptatem ratione ut aut. In omnis aut inventore eius aut laboriosam nihil sint. Aut iste in sed asperiores quas dicta. Facilis nam non possimus minus odit voluptatem quo.',101.00,NULL,'DIGI273','instock',0,139,'digital_20.jpg',NULL,1,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(24,'voluptas a possimus rerum','voluptas-a-possimus-rerum','Unde quo perferendis aut doloribus officiis eum. Saepe fugit esse nobis est. Soluta autem impedit fugit accusamus consequuntur non. Ut autem veniam sit.','Qui est ut enim consequatur. Molestias inventore libero odit consequatur ipsum eius. Inventore nostrum at inventore eligendi velit atque. Ratione magnam quae officiis distinctio explicabo eos. Libero consequatur non vero porro. Et doloribus nihil sit iusto. Dolor error ut occaecati nisi. Cumque praesentium eos dolorem recusandae dignissimos. Voluptas aut ea iusto natus. Ut error repudiandae odio sapiente officia rerum fugiat.',431.00,NULL,'DIGI203','instock',0,167,'digital_21.jpg',NULL,3,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(25,'quo doloribus nemo molestias','quo-doloribus-nemo-molestias','Iure ea quo voluptatibus sapiente distinctio quae in. Quidem voluptas sunt tempora voluptates id nulla quas nostrum. Ut qui vel nulla omnis qui accusamus.','Rerum et temporibus dicta dolores ut officiis quia. Expedita ut officiis voluptatum enim aperiam sunt. Sed ipsa ut perferendis sit sit. Asperiores corrupti impedit et veniam. Magnam animi quo aut. Itaque adipisci voluptatem voluptatibus. Nulla porro consequatur quia. Suscipit id eius quia aspernatur consequuntur. Consequatur molestiae voluptate aliquam rerum. Accusamus quisquam et laudantium earum rerum.',468.00,NULL,'DIGI209','instock',0,153,'digital_13.jpg',NULL,3,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(26,'error vel ducimus et','error-vel-ducimus-et','Ea vel impedit aut. Aperiam et eum est rerum. Placeat aut est vero quis. Ipsam dolor enim voluptatem quaerat.','Id quia natus et est cupiditate autem. Et soluta labore eaque voluptate cupiditate. Libero ipsum est qui sit. Quis voluptatem nihil porro tenetur. Autem nihil ea blanditiis debitis enim exercitationem aut doloremque. Delectus recusandae in et velit voluptates. Omnis nisi debitis assumenda placeat tenetur dolorum. Culpa non enim vel dolores.',78.00,NULL,'DIGI184','instock',0,126,'digital_19.jpg',NULL,4,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(27,'perferendis sunt quo similique','perferendis-sunt-quo-similique','Sit ratione consectetur odit autem commodi ea non nihil. Pariatur est aut quibusdam ea. Incidunt et veniam ut minima totam alias et.','Beatae quia dignissimos iusto pariatur cupiditate consequatur. Reprehenderit illum rerum molestias corrupti magnam optio explicabo. Occaecati officiis soluta dolorem quaerat. Eum tenetur veritatis laboriosam amet qui officiis. Rerum est molestias blanditiis rerum dignissimos sit minus. Reprehenderit accusamus qui eaque enim quam. Officiis nemo vitae minus cumque est reiciendis autem consequatur. Sequi et repellendus sapiente eligendi et. Sequi similique ipsam odit adipisci.',347.00,NULL,'DIGI127','instock',0,147,'digital_15.jpg',NULL,5,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(28,'iste doloremque ea velit','iste-doloremque-ea-velit','Aut perferendis est reprehenderit. Animi ipsa nemo reiciendis dolorem at doloribus eos voluptas. Eos harum illo consequatur dignissimos eum saepe enim.','Neque laudantium eligendi fuga sint qui omnis molestias. Veritatis ut quo pariatur aut praesentium. Expedita odit expedita minima earum maiores. Quo sit facere qui. Atque optio rerum recusandae eos et. Corporis qui molestias necessitatibus ducimus amet. Sit ut et dolorum impedit consequatur magni id. Sunt quia excepturi consectetur sit quas. Quia rerum illum omnis iste soluta. Eius et ratione quos unde et perspiciatis voluptates. Earum id repudiandae fugit doloribus quasi.',380.00,NULL,'DIGI437','instock',0,113,'digital_2.jpg',NULL,4,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(29,'repudiandae perferendis molestiae consectetur','repudiandae-perferendis-molestiae-consectetur','Quidem non vel earum perferendis aut culpa. Sapiente sapiente mollitia sed alias et repellendus. Cum eos blanditiis praesentium veniam iste et. Est ipsum culpa aliquam ut in.','Sed aperiam ipsam omnis vel nemo. Est explicabo reprehenderit vel expedita et amet. Reiciendis cum commodi aut vitae deleniti aliquid. Modi doloremque cupiditate labore doloremque unde. Accusantium adipisci nihil dolores quia similique tempore aperiam. Sapiente rerum autem odit odit placeat omnis fugit.',295.00,NULL,'DIGI397','instock',0,115,'digital_11.jpg',NULL,2,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(30,'quod numquam repellendus tempora','quod-numquam-repellendus-tempora','Aspernatur et voluptatem amet perspiciatis. Vitae et quasi incidunt est nam qui. Aspernatur dicta laboriosam exercitationem dolore. Voluptate rerum voluptate autem qui impedit ratione vel.','Aliquam accusantium enim dolores. In ab omnis minus eius architecto non facilis et. Perferendis rerum aliquid possimus voluptatem maiores quidem quod. Tempora vel omnis enim rem. Quidem fugiat voluptatem maxime voluptatibus. Dolore molestiae et dolores perferendis. Minima nesciunt fugit voluptatem nihil tempore et adipisci. Qui quis enim vitae adipisci aliquam non. Minima doloremque qui ea blanditiis sint. Deserunt et aut sint et est nam qui.',104.00,NULL,'DIGI113','instock',0,196,'digital_4.jpg',NULL,4,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(31,'quia est et id','quia-est-et-id','Tenetur aut enim sed pariatur. Ad quisquam ipsam libero non doloribus aspernatur deleniti. Et facilis aperiam fugiat magnam ut accusamus. Qui ad voluptatem accusantium harum sed officia soluta.','Ipsa veritatis distinctio et quod officia modi. Aspernatur magni molestiae esse vel et occaecati nemo. Aut repellat optio ullam maiores ex dolorem. Est nam maiores qui id. Repellendus nobis aut iure aliquam corrupti. Dolore soluta quo vero itaque voluptatem quia sunt. Sint illo exercitationem et quia accusamus quo quam.',116.00,NULL,'DIGI367','instock',0,161,'digital_22.jpg',NULL,4,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(32,'fugit ut fugit beatae','fugit-ut-fugit-beatae','Asperiores repellat non odio nihil quidem nisi non dolorem. Qui nemo qui nesciunt id. Vel qui minus ipsam maxime temporibus. Rerum autem odio unde fugit consequatur vel.','Magnam corrupti alias ut. Quo voluptatum necessitatibus ea atque aliquam quo quo sequi. Provident suscipit magnam aut praesentium possimus doloribus quia. Corporis aut qui autem tempore eaque quos magnam. Perspiciatis beatae adipisci voluptatem voluptatem ipsum et molestias. Vitae consequuntur illo unde facilis excepturi qui assumenda. Fuga nobis et omnis amet repellendus voluptas ad. Laborum ut ipsa officiis quia voluptas deserunt. Magnam corrupti atque earum incidunt beatae.',85.00,NULL,'DIGI222','instock',0,171,'digital_12.jpg',NULL,5,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(33,'sit maxime deserunt sit','sit-maxime-deserunt-sit','Ab odit nulla ullam molestias voluptas aperiam praesentium aspernatur. Temporibus ut velit consectetur consequatur et ad eum. Totam autem aut ea tenetur qui aperiam sed.','Quia fugit et et quasi quia aspernatur aut mollitia. Aut dolor qui dolorum veniam aut et saepe. Perferendis doloremque debitis sequi. Aut vel dolorem quo et minus. Quia rem aut ipsum in suscipit. A laudantium occaecati quisquam aut. Consequatur molestiae distinctio aut. Cum natus nulla qui. Quis culpa delectus temporibus reiciendis ut et. Iste numquam soluta impedit tenetur rem numquam cum explicabo. Sunt similique rerum temporibus neque id.',207.00,NULL,'DIGI275','instock',0,102,'digital_1.jpg',NULL,4,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(34,'quas doloribus illo enim','quas-doloribus-illo-enim','Sit et consectetur ut natus itaque cum provident. Velit incidunt fugiat deleniti alias deserunt. Esse rem velit autem qui.','Atque iste veritatis quis ipsa officia. Ut nostrum libero voluptatem labore. Quia minus necessitatibus iusto. Commodi sunt repellat ea beatae deleniti nesciunt nobis mollitia. Omnis id incidunt non amet cum. Necessitatibus hic quam consequatur vel recusandae aliquid. Harum dolorum vero ipsam aspernatur dolores id cumque. Temporibus est maxime placeat quo voluptatem id qui. Possimus dolorum ut commodi necessitatibus quo est laudantium porro. Quod saepe autem officia voluptate odio.',420.00,NULL,'DIGI143','instock',0,120,'digital_10.jpg',NULL,5,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(35,'odio harum dolor velit','odio-harum-dolor-velit','Eligendi ut molestiae maiores cumque facere qui. Provident quas et maiores beatae sed ea labore. Omnis quas ad necessitatibus consequatur rerum velit ratione. Nemo ut dicta culpa culpa error.','Quis necessitatibus quo velit et. Et similique sequi et possimus aliquam deserunt et accusamus. Vero molestiae voluptatum consequatur rerum suscipit perferendis. Ea rem voluptatem maiores excepturi. Voluptates vero cupiditate eaque non. Dolores asperiores ipsam numquam dolorem ullam sint optio. Et nemo beatae sed cumque ex. Quasi et illo occaecati consequatur debitis quia voluptatem. Reiciendis repellat culpa impedit quis quam. Et doloribus est ea accusantium.',437.00,NULL,'DIGI251','instock',0,134,'digital_9.jpg',NULL,1,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(36,'ea cumque quos id','ea-cumque-quos-id','Provident illo molestiae qui itaque. Et perspiciatis impedit est quo sed maxime nihil. Nulla quae illo a quod consectetur.','Aut nemo illo et in numquam. Culpa minima tempore nulla et. Ea nesciunt odio facere ullam aspernatur. Voluptas deleniti earum molestiae provident commodi asperiores. Necessitatibus ratione at odio aut repellendus dicta. Odio ut perspiciatis voluptatibus ducimus odit mollitia. Laboriosam eius animi nobis qui nesciunt at ut.',317.00,NULL,'DIGI130','instock',0,113,'digital_14.jpg',NULL,3,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(37,'necessitatibus voluptatibus vel aperiam','necessitatibus-voluptatibus-vel-aperiam','Quas sed occaecati nesciunt non quasi numquam. Minima eaque ex in modi distinctio voluptate. Voluptatem quod optio a cupiditate laudantium. Sunt laborum rem dolorem quidem fugit culpa.','Tenetur quam sit doloremque nulla sint consequatur. Eaque mollitia laudantium provident tempore architecto. Quod vel quis dolor voluptatum ut. Neque consequatur et rem omnis numquam sed tenetur. Ullam dolore est culpa hic non sit enim. Atque cumque autem ut sunt perferendis. Ex voluptas dolore id. A voluptas architecto molestiae cum quod error. Aliquid rerum consequuntur consequuntur ea est incidunt necessitatibus. Cupiditate iusto iste fugiat aliquam.',457.00,NULL,'DIGI237','instock',0,165,'digital_17.jpg',NULL,1,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(38,'qui voluptatem qui occaecati','qui-voluptatem-qui-occaecati','Ab ipsam sint quia a harum consequuntur. Maiores neque consequatur facere nemo. Eligendi est vitae maxime dicta accusantium. Voluptas quia ratione tempora reiciendis tempore mollitia consequatur.','Adipisci ullam id rem nobis aliquid est sequi ea. Et molestiae eaque iure fugit asperiores quo. Architecto laborum aut molestias ut ut cum. Esse debitis dolor minus assumenda ex. Ab velit soluta nam suscipit facilis. Et maxime aliquam sit ea ut est. Et ut aspernatur modi doloribus voluptas maiores. Non rerum sed officiis laboriosam. Qui velit ut aspernatur repudiandae iure. Ullam voluptatibus dicta ad harum et reprehenderit est.',268.00,NULL,'DIGI177','instock',0,120,'digital_5.jpg',NULL,3,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(39,'atque et consequatur sunt','atque-et-consequatur-sunt','Delectus dolores non facere unde distinctio est. Explicabo voluptatem autem unde voluptatem. Veritatis et laboriosam enim id molestias voluptatibus. Assumenda at vel commodi non qui repellendus.','Minima expedita quasi totam est. Aperiam nemo sunt error quia dolore. Et voluptatum et possimus nulla autem corporis. Vel quisquam perspiciatis maiores sequi quisquam sint. Earum quis expedita explicabo corrupti in tenetur. Error eum fugiat et est repudiandae minus ea. Exercitationem aut aut pariatur culpa. Voluptas consequatur fuga rerum consectetur voluptatem quo debitis. Culpa consequuntur eos labore illum. Sit quod sit est. Repudiandae voluptas qui non adipisci.',266.00,NULL,'DIGI255','instock',0,141,'digital_7.jpg',NULL,1,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(40,'similique in consequatur magnam','similique-in-consequatur-magnam','Exercitationem exercitationem ducimus nulla rerum perferendis non. Dolorum est sit mollitia hic beatae ad. Ea et dolore quas dicta exercitationem similique.','Ipsam sit et sint vel nisi quo quod. Qui sed rerum commodi incidunt. Explicabo assumenda iusto facilis. Molestias nisi nam est labore quos facilis velit. Dolorum et ipsum soluta placeat. Aspernatur fugit aut cum illum. Placeat totam et in cumque nesciunt a voluptas. Porro ut dolor et deleniti eveniet tenetur. Sunt quia repudiandae quis explicabo facilis.',474.00,NULL,'DIGI306','instock',0,157,'digital_8.jpg',NULL,5,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(41,'dolor molestiae ab et','dolor-molestiae-ab-et','Voluptatem et nesciunt eveniet sint repellendus aspernatur. Sit qui dolor in ducimus commodi distinctio. Necessitatibus illo eveniet sunt quia.','Laudantium dolorem molestiae qui labore eius. Tenetur officiis vitae et. Ut eum voluptas recusandae quia sequi quos. Quae eum provident quia sunt velit amet omnis. Mollitia vel placeat nulla dolore ipsum aut. Eum excepturi omnis alias provident. Dolore consequatur nesciunt vel reprehenderit dignissimos similique sint distinctio. Suscipit architecto incidunt incidunt veniam at. Qui provident cupiditate neque corporis explicabo dicta officiis. Qui sunt laboriosam et dolore recusandae.',302.00,NULL,'DIGI285','instock',0,172,'digital_18.jpg',NULL,3,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(42,'aut quia consequatur sequi','aut-quia-consequatur-sequi','Nihil vel ullam unde aliquam est voluptatem. Cupiditate quia consectetur voluptas quia eius veniam aut. Hic ea accusamus itaque.','Amet eos magnam facilis doloribus facilis. Ab saepe quis autem eius sunt a cum. Autem sapiente possimus sunt fugiat vitae autem. Sapiente ea et aut molestiae ea optio similique. Recusandae at et soluta nostrum consequatur. Facere quo dolores quasi ipsa minus. Magnam qui enim saepe aut debitis animi.',113.00,NULL,'DIGI335','instock',0,144,'digital_16.jpg',NULL,1,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(43,'expedita sit minima illum','expedita-sit-minima-illum','Aliquam cum eos sed in quo. Nemo enim nihil cumque exercitationem. Dolor sed suscipit eveniet.','Enim temporibus quasi magnam adipisci nihil. Quam fuga blanditiis enim aut minima neque assumenda optio. Molestias omnis est nam quasi voluptatem molestias. Necessitatibus est corporis consequuntur dolores placeat est praesentium. Culpa quia perspiciatis voluptatem dolorum sint. Dolore veniam ratione a nemo. Ea vitae qui est ut ut quaerat iusto. Et consequatur aut assumenda repudiandae omnis sit sunt. Magnam et suscipit recusandae similique quis laboriosam architecto eaque.',143.00,NULL,'DIGI103','instock',0,200,'digital_3.jpg',NULL,2,'2021-10-06 04:41:13','2021-10-06 04:41:13'),
(44,'placeat inventore voluptates ex','placeat-inventore-voluptates-ex','Dolorem voluptatum voluptatem eum accusamus. Et magni possimus ut enim qui vel quia. Ut est occaecati neque eum voluptas. Error nobis laudantium aut et sapiente molestiae unde.','Enim doloremque molestias voluptates ea sunt at. Corrupti explicabo commodi unde qui quia. Sed sed fugit sunt. Voluptatum omnis et inventore autem laboriosam eligendi laborum. Ut totam dolorem aut quibusdam rem in. A saepe et eius quas soluta nisi est aut. Et aut enim eos occaecati. Neque officiis dolores sint quasi. Assumenda labore id quis ut nobis.',246.00,NULL,'DIGI120','instock',0,194,'digital_6.jpg',NULL,1,'2021-10-06 04:41:13','2021-10-06 04:41:13');

/*Table structure for table `qwertyus` */

CREATE TABLE `qwertyus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `qwertyus` */

/*Table structure for table `tourpackages` */

CREATE TABLE `tourpackages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `continent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_category` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tourpackages` */

insert  into `tourpackages`(`id`,`name`,`summary`,`price`,`destination`,`continent`,`country`,`city`,`image`,`thumbnail`,`id_category`,`created_at`,`updated_at`,`created_by`,`updated_by`) values 
(1,'est minima at rerum','Est quidem inventore ut animi suscipit et. Sit qui aspernatur aut suscipit suscipit.','457',NULL,'15','9','12',NULL,'digital_8.jpg',1,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(2,'nemo autem possimus sit','Doloremque fugiat velit nihil enim possimus vel aut. Possimus voluptas eos eveniet.','333',NULL,'17','13','11',NULL,'digital_5.jpg',1,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(3,'laborum ut repellendus voluptas','Commodi eos suscipit vel doloribus. Molestiae consequatur porro pariatur modi autem sed.','299',NULL,'3','14','5',NULL,'digital_4.jpg',4,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(4,'vel voluptas blanditiis adipisci','Perspiciatis ea error rerum perferendis. Veniam tenetur architecto cupiditate est ut tenetur.','407',NULL,'5','2','20',NULL,'digital_16.jpg',2,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(5,'autem voluptatem excepturi totam','Eum necessitatibus omnis itaque explicabo atque culpa rerum. Praesentium qui adipisci odio est.','462',NULL,'6','5','2',NULL,'digital_19.jpg',3,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(6,'necessitatibus accusamus laudantium ex','Autem consequatur aut quasi eum ut dolores. Dolor aut non animi nemo ex voluptatem suscipit animi.','244',NULL,'1','13','14',NULL,'digital_20.jpg',1,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(7,'occaecati saepe corrupti earum','Consequatur dignissimos non sunt et. Commodi non similique eius ullam cupiditate ipsum.','471',NULL,'3','5','2',NULL,'digital_15.jpg',5,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(8,'et officiis atque itaque','Aut ut id tempora vel quasi tenetur. Quos mollitia distinctio dolores id eos.','100',NULL,'15','1','20',NULL,'digital_9.jpg',2,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(9,'molestias voluptas et dolorum','Vel iste harum labore. Ipsa neque ducimus provident sunt. Ut et nobis eum molestias molestiae.','74',NULL,'6','15','18',NULL,'digital_3.jpg',4,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(10,'vero labore debitis modi','Quas ut aut sunt est. Omnis vitae quibusdam debitis. A reprehenderit qui distinctio ipsam ut.','294',NULL,'1','12','3',NULL,'digital_1.jpg',1,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(11,'rerum maiores et illum','Voluptas laborum error autem. Itaque consequatur a fugiat. Velit eum molestiae culpa nostrum.','368',NULL,'5','2','4',NULL,'digital_6.jpg',5,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(12,'perspiciatis autem nihil sint','Aut ipsam enim consequuntur voluptatem aut tenetur aut autem. Aliquid voluptatem eum et dolores.','37',NULL,'8','3','9',NULL,'digital_14.jpg',2,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(13,'voluptas beatae est ullam','Sint assumenda vel recusandae ut vel. Ad cumque qui velit praesentium maiores.','270',NULL,'1','6','3',NULL,'digital_17.jpg',2,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(14,'in non quo omnis','Rerum quo nemo magnam. Quisquam illum sit esse nulla officiis est.','190',NULL,'20','8','3',NULL,'digital_7.jpg',4,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(15,'sit at qui tempora','Quasi explicabo id sunt. Vero dolores labore cupiditate ut voluptatum nobis modi.','317',NULL,'8','20','6',NULL,'digital_11.jpg',2,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(16,'ex sunt cum rerum','Ipsa doloribus possimus voluptatem sunt autem. Ipsa omnis ut veniam magnam occaecati ut dolores.','246',NULL,'19','14','17',NULL,'digital_18.jpg',4,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(17,'magnam vitae sed perferendis','Dolorem est dignissimos vel velit tempora beatae error quia. Repellat ipsa sed omnis.','57',NULL,'1','13','6',NULL,'digital_22.jpg',1,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(18,'autem sit minus possimus','Eius ut occaecati quaerat labore asperiores dolor. Asperiores quisquam commodi ut consectetur enim.','246',NULL,'11','4','14',NULL,'digital_21.jpg',5,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(19,'iste unde mollitia voluptatum','Omnis ut dolorem vitae est ex architecto dolorum. Optio et ut ut earum aut et.','50',NULL,'17','18','11',NULL,'digital_2.jpg',1,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(20,'totam nostrum et dolorem','Et ut et nam laboriosam accusamus. Vero quam quia in saepe rerum debitis voluptas.','145',NULL,'8','6','13',NULL,'digital_10.jpg',2,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(21,'veniam et et quidem','Corporis facilis cum qui autem. Mollitia doloremque velit et animi fugit voluptatem fugit in.','326',NULL,'7','19','20',NULL,'digital_13.jpg',2,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(22,'unde eaque reprehenderit veniam','Ad tempore rem commodi quasi voluptatum ducimus. Qui et eos est odio. Magni est itaque quae.','318',NULL,'20','12','3',NULL,'digital_12.jpg',2,'2021-10-06 04:44:43','2021-10-06 04:44:43',NULL,NULL),
(23,'nostrum et voluptas ab','Iste atque ut ut delectus quis optio officia. Ut aspernatur ab qui omnis recusandae illum.','32',NULL,'15','16','18',NULL,'digital_21.jpg',4,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(24,'dignissimos asperiores nostrum consequuntur','Ex et temporibus porro at. Ut modi iusto et quasi.','226',NULL,'18','16','8',NULL,'digital_22.jpg',1,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(25,'et harum molestias doloremque','Iste adipisci dicta voluptas ut dolores. Nobis doloribus qui quia ipsum sunt quasi tempora.','405',NULL,'7','19','18',NULL,'digital_2.jpg',5,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(26,'quidem laudantium aliquid voluptatem','Consequuntur dolore quibusdam enim. Enim et sunt et sunt iste. Temporibus iusto sit tempore.','154',NULL,'11','1','12',NULL,'digital_13.jpg',4,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(27,'cum laboriosam nulla facilis','Quo porro sequi unde temporibus modi mollitia at. Beatae est cupiditate soluta molestiae.','117',NULL,'13','6','14',NULL,'digital_3.jpg',5,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(28,'voluptas est dolorem modi','Error ullam ut reiciendis sed. Veniam eius voluptate ipsum.','299',NULL,'14','7','8',NULL,'digital_11.jpg',4,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(29,'velit quos accusamus fugiat','Vel unde odio amet aut et quibusdam ipsam. Voluptates sapiente animi quae aut sequi rerum vel.','93',NULL,'9','2','8',NULL,'digital_6.jpg',4,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(30,'placeat mollitia at ratione','Recusandae error cum et voluptas ut reprehenderit dolor. Necessitatibus consequuntur fugiat animi.','84',NULL,'3','11','6',NULL,'digital_19.jpg',2,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(31,'velit non omnis sit','Rerum exercitationem dolores doloremque deserunt et ut dolorem. Facere deserunt quis omnis et qui.','80',NULL,'4','1','15',NULL,'digital_9.jpg',2,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(32,'sunt magnam sed qui','Rem voluptas ratione dolorem reprehenderit et quia ut. Eum quae quae culpa iusto ipsa fugit at eos.','488',NULL,'8','13','19',NULL,'digital_15.jpg',3,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(33,'blanditiis quis qui fuga','Quam temporibus alias vitae velit esse autem. Non similique quaerat animi repudiandae.','438',NULL,'8','3','10',NULL,'digital_16.jpg',4,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(34,'sint incidunt aut qui','Ipsum vel ut quis voluptatibus. Quidem sequi non qui dolores praesentium temporibus architecto.','382',NULL,'3','14','7',NULL,'digital_17.jpg',4,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(35,'distinctio consequuntur asperiores minima','Nostrum repudiandae atque fugiat deleniti. Velit non assumenda ea ratione quam ut fugit sit.','111',NULL,'15','20','3',NULL,'digital_8.jpg',5,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(36,'et nisi ea tempora','Est dolorem placeat dolorum aspernatur et esse. Sapiente omnis consequatur modi.','268',NULL,'10','12','16',NULL,'digital_20.jpg',5,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(37,'fugit officiis adipisci mollitia','In molestiae et laborum cumque facilis a natus. Voluptatem pariatur esse dolores.','38',NULL,'9','8','4',NULL,'digital_7.jpg',3,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(38,'aut quibusdam tenetur voluptas','Ut quia ex mollitia tempore. Tempore ratione in et. Qui optio modi aut.','129',NULL,'9','6','14',NULL,'digital_5.jpg',2,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(39,'occaecati commodi ea dicta','Accusamus eius omnis quisquam qui. Illum fuga cupiditate id.','226',NULL,'5','10','10',NULL,'digital_4.jpg',2,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(40,'reiciendis voluptatem voluptatem quo','Cupiditate doloremque eaque et magni officia. Officia eum illum perferendis ut.','323',NULL,'19','9','13',NULL,'digital_10.jpg',5,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(41,'voluptatibus quam sed quis','Aliquid nesciunt sit qui. Sed molestiae et quo odit quasi. Pariatur perspiciatis laborum quis.','152',NULL,'2','8','4',NULL,'digital_14.jpg',3,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL),
(42,'commodi sit accusamus quo','Amet et perferendis nisi natus rerum. Et nisi et voluptate ut veniam quia. Hic voluptatem ea et.','499',NULL,'5','20','1',NULL,'digital_1.jpg',1,'2021-10-06 08:52:30','2021-10-06 08:52:30',NULL,NULL);

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
