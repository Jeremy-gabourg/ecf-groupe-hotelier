-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: symfony_groupe_hotelier
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contact_message`
--

DROP TABLE IF EXISTS `contact_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_is_already_client` tinyint(1) NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_opened` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_id` binary(16) DEFAULT NULL COMMENT '(DC2Type:uuid)',
  PRIMARY KEY (`id`),
  KEY `IDX_2C9211FE9D86650F` (`user_id_id`),
  CONSTRAINT `FK_2C9211FE9D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_message`
--

LOCK TABLES `contact_message` WRITE;
/*!40000 ALTER TABLE `contact_message` DISABLE KEYS */;
INSERT INTO `contact_message` VALUES (1,'GABOURG','JÃ©rÃ©my',0,'Je souhaite poser une rÃ©clamation','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum mauris sed ultrices dictum. In sed interdum quam. Aliquam sollicitudin nisl vel metus lacinia posuere. Duis volutpat lorem molestie mi pretium tincidunt. Nullam vel mi arcu. Phasellus lobortis ante aliquam mi pellentesque, sed congue massa egestas. Nam vel tempus mauris. Fusce varius id mi vel pellentesque. In varius malesuada turpis id feugiat. Morbi sed eleifend felis, quis fermentum ante. Curabitur egestas tempor libero, at ultrices arcu semper et. Nunc sed venenatis tellus. Mauris pulvinar magna ut molestie sagittis.',0,'jeremygaelle.g@gmail.com',NULL),(2,'GABOURG','JÃ©rÃ©my',1,'Je souhaite commander un service supplÃ©mentaire','Curabitur consectetur dolor ac odio imperdiet dignissim. Integer ultrices nisi lorem. Curabitur faucibus lobortis dapibus. Praesent ultricies felis vitae mauris faucibus pellentesque. Nulla vel mi justo. Fusce viverra libero id arcu elementum tempus. Curabitur venenatis sit amet dui eu hendrerit. Praesent porta ac quam id ultricies. Proin eget urna nisl. Donec vel rhoncus ipsum. Donec porta aliquet enim, sollicitudin interdum mi rhoncus et. Donec id neque pharetra metus venenatis tempor ac vitae sapien. Pellentesque vel turpis nunc. Mauris elementum tortor non ligula dapibus rutrum.',0,'administrator@hypnos-group.fr','ËÛYgnŒíYIO\\;');
/*!40000 ALTER TABLE `contact_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `establishment`
--

DROP TABLE IF EXISTS `establishment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `establishment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manager_id_id` binary(16) DEFAULT NULL COMMENT '(DC2Type:uuid)',
  `establishment_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `establishment_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DBEFB1EE569B5E6D` (`manager_id_id`),
  CONSTRAINT `FK_DBEFB1EE569B5E6D` FOREIGN KEY (`manager_id_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `establishment`
--

LOCK TABLES `establishment` WRITE;
/*!40000 ALTER TABLE `establishment` DISABLE KEYS */;
INSERT INTO `establishment` VALUES (1,'ËÛn$üfÌ¾ë9~ýv*','Chez Eros','Bordeaux','Place Pey Berland','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam nisl eros, ac venenatis mi rutrum quis. Suspendisse potenti. Proin non hendrerit ipsum, consectetur auctor mauris. Praesent eu diam magna. Duis consequat mauris at felis lacinia congue id non massa. In ac nulla ac ante mollis gravida. Aliquam pellentesque suscipit elit, vel bibendum felis rutrum in. In congue enim sit amet libero placerat, vel suscipit massa lacinia. Sed et mauris mi. Suspendisse malesuada vulputate ex a vehicula. Praesent facilisis lectus eget urna bibendum ultricies. Sed semper neque ac consequat tempor. Suspendisse potenti. Vivamus lobortis vestibulum pretium. Curabitur sagittis pretium dui sit amet ornare. Aenean viverra ultricies pulvinar.'),(2,'ËÛm ­`®ŠP÷;<ZîO','L\'Hotel des Passions','Lyon','1 Place de la ComÃ©die','Suspendisse dictum a nunc vel lobortis. Suspendisse tristique lacus lacus, ut posuere sem scelerisque ut. Morbi euismod ornare lorem, et dapibus neque eleifend in. Duis maximus orci efficitur tristique vehicula. Morbi vestibulum fringilla arcu, iaculis ultricies mauris molestie hendrerit. Ut tristique dolor sit amet gravida semper. Vestibulum eget velit volutpat, ultrices odio sit amet, volutpat ante. Nullam dapibus nunc vitae dolor sagittis cursus. Duis eu egestas arcu. Sed placerat tellus porta mattis molestie. Etiam vitae ipsum semper, tempor nisl sed, varius ipsum. Proin ac urna eleifend libero mattis imperdiet. Proin eget ex nulla.'),(3,'ËÛ]d·m®¦KûãH¼!Ñ','L\'Hotel de la Ville Rose','Toulouse','Place du Capitole','Vivamus molestie viverra imperdiet. Sed non rhoncus lorem. Proin eleifend leo sed nisl dignissim, a pulvinar velit hendrerit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc consectetur ante finibus sagittis placerat. Nam pharetra tristique cursus. Quisque consequat, quam sit amet commodo laoreet, urna turpis tincidunt nunc, quis dictum purus lacus eget magna. Nullam consectetur quam ut risus varius, in venenatis erat condimentum. Aenean ac ligula fermentum, aliquet augue ac, luctus mauris. Etiam vitae pellentesque leo. Vivamus scelerisque et eros id sagittis. Integer pulvinar nulla dui, in tincidunt lectus porta eu. Vivamus dapibus a urna sit amet tempus. Duis tortor magna, tristique efficitur vestibulum quis, tincidunt sed ante. Nunc tempor augue vel faucibus fringilla. Ut non orci eget odio efficitur tincidunt eget eget elit.'),(4,'ËÛrr@ip€¦‹¬Ø\'','Sea, Sun and SPA','Marseille','Quai du Port','Nunc porttitor diam ut finibus posuere. Integer in porta massa. Quisque eleifend ultrices felis, quis tristique augue ornare nec. Phasellus nibh ex, pretium in finibus et, ultrices porttitor quam. Pellentesque quis semper erat, at commodo odio. Praesent leo erat, vestibulum id mauris id, molestie convallis turpis. Curabitur varius bibendum nisi sit amet finibus. Morbi pulvinar ullamcorper sem, vitae fringilla augue varius ut. Suspendisse elementum a risus vitae venenatis. Vestibulum nec neque dolor. Nam porttitor nunc id congue hendrerit. Suspendisse pulvinar rutrum tellus, vel mattis velit elementum non.'),(5,'ËÛsUe|£«!ýè€Í¨','L\'Auberge des amoureux','Paris','Place de l\'Hotel de Ville','Nam nisl ipsum, pharetra a turpis vitae, luctus egestas nulla. Donec nec libero vitae dui mattis aliquam. Pellentesque nec malesuada neque, id mattis sapien. Duis sit amet dapibus tellus, at rhoncus diam. Pellentesque dui augue, cursus pellentesque nisi ac, maximus egestas dui. Donec nibh metus, fermentum a suscipit quis, suscipit sit amet mi. Aliquam vehicula facilisis ex nec mattis. Quisque gravida purus vitae leo aliquet dapibus. Aliquam lobortis sodales sagittis. Donec non interdum nibh. Ut rhoncus felis ac porta euismod. Morbi vitae laoreet magna. Nullam nibh libero, efficitur vel felis ut, commodo porta odio. In porttitor dignissim dapibus.'),(6,'ËÛq]ìeºœ†“®—îÀ','Le Cupidon','Strasbourg','9 rue BrÃ»lÃ©e','Cras iaculis eu erat sed sodales. Phasellus sit amet ex id mauris iaculis sollicitudin nec in felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus molestie est orci. Fusce pretium finibus ultricies. Ut efficitur dictum erat, a luctus nisl iaculis et. Pellentesque vel bibendum magna. Quisque consequat velit turpis, at tincidunt augue auctor a. Nullam placerat est vitae nisl semper, posuere tempus justo finibus.'),(7,'ËÛp2g¾ £WL¥¡N','Nuits blanches','Nantes','2 rue de l\'Hotel de Ville','Donec aliquam orci massa, ut cursus erat rutrum vitae. Fusce maximus libero eu sem elementum ultricies. Nam gravida est nisl. Suspendisse tempus turpis a velit malesuada, sed elementum ipsum hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas et est porta leo pretium tristique ut quis neque. Cras maximus risus ut dolor congue lacinia. Proin vitae odio eu justo sollicitudin faucibus ut ac metus. Donec sit amet nulla sed nibh accumsan pellentesque. Proin tellus nulla, cursus sed ultrices quis, feugiat sit amet dui. Nunc hendrerit mollis ex, nec vestibulum est.');
/*!40000 ALTER TABLE `establishment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suite_id_id` int(11) DEFAULT NULL,
  `gallery_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `establishment_id_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `highlighted_photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_472B783A59CDD37D` (`suite_id_id`),
  KEY `IDX_472B783AFB55A222` (`establishment_id_id`),
  CONSTRAINT `FK_472B783A59CDD37D` FOREIGN KEY (`suite_id_id`) REFERENCES `suite` (`id`),
  CONSTRAINT `FK_472B783AFB55A222` FOREIGN KEY (`establishment_id_id`) REFERENCES `establishment` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (1,NULL,'Gallerie de Chez Eros',1,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/Chez Eros','HM_francesca-saraco-dS27XGgRyQ-unsplash-625fd4f334cbd.jpg'),(2,1,'Gallerie de la Suite Deluxe de Chez Eros',1,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/Chez Eros/Suite Deluxe','HM_point3d-commercial-imaging-ltd-2kE9j3aEeiA-unsplash-625febf149ca7.jpg'),(3,2,'Gallerie de la Suite VIP de Chez Eros',1,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/Chez Eros/Suite VIP','HM_point3d-commercial-imaging-ltd-2kE9j3aEeiA-unsplash-625fec0a89826.jpg'),(11,3,'Gallerie de la Suite standard de Chez Eros',1,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/Chez Eros/Suite standard','HM_point3d-commercial-imaging-ltd-2kE9j3aEeiA-unsplash-625fec5204ee1.jpg'),(12,NULL,'Gallerie de L\'Hotel des Passions',2,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/L\'Hotel des Passions','HM_fernando-alvarez-rodriguez-M7GddPqJowg-unsplash-625fec949d542.jpg'),(13,4,'Gallerie de la Suite VIP de L\'Hotel des Passions',2,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/L\'Hotel des Passions/Suite VIP','HM_jared-rice-PibraWHb4h8-unsplash-625fecb204eb6.jpg'),(14,5,'Gallerie de la Suite Deluxe de L\'Hotel des Passions',2,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/L\'Hotel des Passions/Suite Deluxe','HM_jared-rice-PibraWHb4h8-unsplash-625fecd08e79a.jpg'),(15,6,'Gallerie de la Suite standard de L\'Hotel des Passions',2,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/L\'Hotel des Passions/Suite standard','HM_jared-rice-PibraWHb4h8-unsplash-625fece1a0a94.jpg'),(16,NULL,'Gallerie de L\'Hotel de la Ville Rose',3,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/L\'Hotel de la Ville Rose','HM_jeffrey-francisco-Ei9f33bQ1A-unsplash-625fed0676cd5.jpg'),(17,7,'Gallerie de la Suite VIP de L\'Hotel de la Ville Rose',3,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/L\'Hotel de la Ville Rose/Suite VIP','HM_pexels-jean-van-der-meulen-1454804-625fed1cdd74c.jpg'),(18,8,'Gallerie de la Suite Deluxe de L\'Hotel de la Ville Rose',3,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/L\'Hotel de la Ville Rose/Suite Deluxe','HM_pexels-jean-van-der-meulen-1454804-625fed2eb5f1d.jpg'),(19,9,'Gallerie de la Suite standard de L\'Hotel de la Ville Rose',3,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/L\'Hotel de la Ville Rose/Suite standard','HM_pexels-jean-van-der-meulen-1454804-625fed3f2918a.jpg'),(20,NULL,'Gallerie de Sea, Sun and SPA',4,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/Sea, Sun and SPA','HM_ridhwan-nordin-s6cH7n3eoqY-unsplash-625fed76211a1.jpg'),(21,10,'Gallerie de la Suite VIP de Sea, Sun and SPA',4,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/Sea, Sun and SPA/Suite VIP','HM_point3d-commercial-imaging-ltd-yrLUGKnDrDo-unsplash-625fed8b45354.jpg'),(22,11,'Gallerie de la Suite Deluxe de Sea, Sun and SPA',4,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/Sea, Sun and SPA/Suite Deluxe','HM_point3d-commercial-imaging-ltd-yrLUGKnDrDo-unsplash-625fed9d13617.jpg'),(23,12,'Gallerie de la Suite standard de Sea, Sun and SPA',4,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/Sea, Sun and SPA/Suite standard','HM_point3d-commercial-imaging-ltd-yrLUGKnDrDo-unsplash-625fedabb137c.jpg'),(24,NULL,'Gallerie de L\'Auberge des amoureux',5,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/L\'Auberge des amoureux','HM_rod-long-2P-ifaetDm0-unsplash-625fedc7a5b8d.jpg'),(25,13,'Gallerie de la Suite VIP de L\'Auberge des amoureux',5,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/L\'Auberge des amoureux/Suite VIP','HM_point3d-commercial-imaging-ltd-Swg04CP0bU-unsplash-625feddb95194.jpg'),(26,14,'Gallerie de la Suite Deluxe de L\'Auberge des amoureux',5,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/L\'Auberge des amoureux/Suite Deluxe','HM_point3d-commercial-imaging-ltd-Swg04CP0bU-unsplash-625fede9bda58.jpg'),(27,15,'Gallerie de la Suite standard de L\'Auberge des amoureux',5,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/L\'Auberge des amoureux/Suite standard','HM_point3d-commercial-imaging-ltd-Swg04CP0bU-unsplash-625fedf74bfff.jpg'),(28,NULL,'Gallerie de Le Cupidon',6,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/Le Cupidon','HM_roberto-nickson-emqnSQwQQDo-unsplash-625fee8c2d1c8.jpg'),(29,16,'Gallerie de la Suite VIP de Le Cupidon',6,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/Le Cupidon/Suite VIP','HM_reisetopia-Y7WfCuz5tn0-unsplash-625feea4bf82f.jpg'),(30,17,'Gallerie de la Suite Deluxe de Le Cupidon',6,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/Le Cupidon/Suite Deluxe','HM_reisetopia-Y7WfCuz5tn0-unsplash-625feeb32bdf8.jpg'),(31,18,'Gallerie de la Suite standard de Le Cupidon',6,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/Le Cupidon/Suite standard','HM_reisetopia-Y7WfCuz5tn0-unsplash-625feec37732d.jpg'),(32,NULL,'Gallerie de Nuits blanches',7,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/Nuits blanches','HM_greece-gb9dd94e68-1920-625fef891aeb0.jpg'),(33,19,'Gallerie de la Suite VIP de Nuits blanches',7,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/Nuits blanches/Suite VIP','HM_morgan-lane-iMnSqmT2RGE-unsplash-625fef98971c0.jpg'),(34,20,'Gallerie de la Suite Deluxe de Nuits blanches',7,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/Nuits blanches/Suite Deluxe','HM_morgan-lane-iMnSqmT2RGE-unsplash-625fefa6dfa4f.jpg'),(35,21,'Gallerie de la Suite standard de Nuits blanches',7,'C:\\xampp\\apps\\symfony_groupe_hotelier/public/ressources/uploads/establishments_pages/Nuits blanches/Suite standard','HM_morgan-lane-iMnSqmT2RGE-unsplash-625fefd772ac3.jpg');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_id` binary(16) NOT NULL COMMENT '(DC2Type:uuid)',
  `suite_id_id` int(11) NOT NULL,
  `done_on` datetime NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_42C849559D86650F` (`user_id_id`),
  KEY `IDX_42C8495559CDD37D` (`suite_id_id`),
  CONSTRAINT `FK_42C8495559CDD37D` FOREIGN KEY (`suite_id_id`) REFERENCES `suite` (`id`),
  CONSTRAINT `FK_42C849559D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'ROLE_MANAGER'),(2,'ROLE_ADMINISTRATOR'),(3,'ROLE_USER');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suite`
--

DROP TABLE IF EXISTS `suite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `establishment_id_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `suite_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_153CE426FB55A222` (`establishment_id_id`),
  CONSTRAINT `FK_153CE426FB55A222` FOREIGN KEY (`establishment_id_id`) REFERENCES `establishment` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suite`
--

LOCK TABLES `suite` WRITE;
/*!40000 ALTER TABLE `suite` DISABLE KEYS */;
INSERT INTO `suite` VALUES (1,1,'Suite Deluxe',133,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia placerat metus sed dignissim. Suspendisse et auctor neque. Phasellus id lectus non lorem blandit pulvinar. Morbi porta pharetra ex id semper. Fusce sapien leo, rutrum et ornare sed, hendrerit vitae elit. Quisque congue dolor tellus, eget efficitur enim maximus aliquam. Praesent tristique nisl quis rhoncus rhoncus. Nulla maximus dui urna, id mattis ante sagittis sit amet.','https://www.booking.com/hotel/fr/le-palais-gallien.fr.html?aid=376366;label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BFAsTyVd6vva'),(2,1,'Suite VIP',150,'Sed vehicula felis velit, non tristique justo dignissim at. Integer posuere scelerisque luctus. Quisque consectetur pellentesque ligula, laoreet maximus turpis. Suspendisse potenti. Aliquam auctor vel diam ultricies dapibus. Donec porttitor tincidunt metus, consectetur egestas felis interdum sit amet. Mauris eu nisi massa. Phasellus ac convallis arcu. Sed non est eget libero volutpat pulvinar quis vel sem. Mauris eleifend sagittis lectus quis congue. Aenean molestie vel nibh ut fermentum. In pulvinar ultrices tortor, eget commodo tellus accumsan sed. Donec pharetra nec metus in feugiat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;','https://www.booking.com/hotel/fr/best-western-bordeaux-quot-bayonne-quot.fr.html?aid=376366;label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc'),(3,1,'Suite standard',110,'Sed eget ex tincidunt, tempus felis at, tristique justo. Duis quis posuere enim. Maecenas a enim quis tellus volutpat lobortis sed tempus ante. Aenean lobortis ante a ipsum tempor vestibulum. In viverra interdum massa hendrerit consequat. Suspendisse efficitur finibus hendrerit. Etiam dapibus, mi vel posuere ultricies, arcu lectus dapibus leo, id condimentum turpis tortor a nisi. Nunc sollicitudin libero sed felis maximus, eget ultrices massa tristique.','https://www.booking.com/hotel/fr/le-bateau-ivre.fr.html?aid=376366;label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BFAsTyVd6vvamF_'),(4,2,'Suite VIP',170,'Aliquam quis nunc ligula. Sed consectetur felis sed ullamcorper maximus. Aliquam leo nibh, convallis nec consectetur a, malesuada et augue. Curabitur suscipit risus odio, quis suscipit magna ornare sit amet. Morbi mollis a lorem vel efficitur. Sed vel elit neque. In hac habitasse platea dictumst. Vivamus posuere justo vitae augue sagittis, vitae dictum tellus feugiat.','https://www.booking.com/hotel/fr/intercontinental-hotels-lyon-dieu.fr.html?aid=376366;label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh'),(5,2,'Suite Deluxe',142,'Donec vel sem efficitur, interdum mi a, rhoncus enim. Pellentesque eget felis odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla facilisi. Quisque commodo sit amet turpis semper luctus. Quisque sagittis ante quis magna egestas, ut vehicula tortor hendrerit. Donec finibus eros id aliquam vehicula. Morbi ultricies diam in libero pellentesque laoreet. Nam in enim efficitur, scelerisque nunc quis, pellentesque risus. Curabitur vestibulum arcu a lectus iaculis, eget dapibus ligula interdum. Fusce maximus porttitor nisi, sit amet dignissim ante mollis et. Curabitur eleifend lectus vel molestie mattis. Ut fermentum sem interdum nibh luctus, tincidunt eleifend lacus euismod.','https://www.booking.com/hotel/fr/boscolo-exedra-lyon.fr.html?aid=376366;label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BFAsTyVd6v'),(6,2,'Suite standard',124,'Nam euismod nunc vel tellus mollis lacinia. Vestibulum iaculis nulla quis purus iaculis rhoncus eu at magna. Integer fermentum lorem vel dolor pellentesque, ut blandit enim tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer condimentum a nisi sed dapibus. Mauris gravida ante diam, a auctor velit laoreet vel. In blandit nec nisl ut maximus. Cras varius lorem eget tincidunt congue. Duis sit amet maximus diam, quis gravida orci. Ut gravida ex sit amet leo volutpat, quis viverra odio tincidunt. Suspendisse potenti. Nunc blandit ex neque, sed aliquam ante lobortis nec. Aliquam aliquam posuere metus hendrerit blandit.','https://www.booking.com/hotel/fr/sofitel-lyon.fr.html?aid=376366;label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BFAsTyVd6vvamF_no'),(7,3,'Suite VIP',133,'Phasellus interdum lacus purus, quis aliquet sem aliquam porttitor. Sed id dolor ante. Suspendisse sagittis, libero ut tristique lobortis, eros sem scelerisque eros, vitae feugiat mi dui bibendum risus. Vestibulum non ligula varius, efficitur elit efficitur, egestas nunc. Nullam sodales, massa in dictum posuere, eros mi porttitor ante, at bibendum sapien turpis ac libero. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed porta turpis quis augue venenatis, vestibulum luctus nisi commodo. Suspendisse tincidunt augue vitae enim tempor, vel efficitur justo cursus. Nullam eu lobortis dui, scelerisque luctus nulla. Morbi egestas sollicitudin urna id vestibulum. In quis neque in massa auctor ullamcorper vitae at elit. Phasellus quis rhoncus elit.','https://www.booking.com/hotel/fr/la-cour-des-consuls-and-spa-toulouse.fr.html?label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BFAs'),(8,3,'Suite Deluxe',115,'Duis aliquet eleifend urna. In lobortis bibendum metus, quis tempor dui pellentesque ut. Vestibulum ut pulvinar sem, in euismod tellus. Proin imperdiet a ipsum non posuere. Praesent mollis maximus dapibus. Integer tempor tincidunt sollicitudin. Vestibulum a felis quis mi volutpat iaculis. Nunc id vehicula mauris. Mauris tellus dui, pharetra eu suscipit vitae, viverra non dolor.','https://www.booking.com/hotel/fr/toulouse-centre.fr.html?aid=376366;label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BFAsTyVd6vvamF'),(9,3,'Suite standard',98,'Donec faucibus elementum placerat. Maecenas fringilla ligula quis mi mattis ullamcorper. Fusce mattis non dui sit amet imperdiet. Nam convallis vitae nunc non finibus. In fermentum nibh nisl, id laoreet sapien egestas sit amet. In blandit, metus sit amet fermentum malesuada, ipsum lectus condimentum est, nec tincidunt ligula mi eget dui. Fusce laoreet tempus nibh, quis volutpat mauris tempor ut.','https://www.booking.com/hotel/fr/odalys-appart-39-colombelie.fr.html?aid=376366;label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BF'),(10,4,'Suite VIP',220,'Nullam non arcu ac sem consequat hendrerit quis eu diam. Etiam a sodales dui. Integer augue mi, molestie et turpis non, tempus semper ex. Nunc in dignissim sapien, eu consequat dolor. Curabitur euismod, metus ac egestas rhoncus, sapien nulla laoreet neque, eget placerat odio dolor at sapien. Fusce suscipit tincidunt eros eu sagittis. Curabitur urna nisl, vehicula eget sem non, dapibus tincidunt ligula. Vestibulum luctus leo ut dictum elementum.','https://www.booking.com/hotel/fr/le-petit-nice-marseille.fr.html?aid=376366;label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BFAsTy'),(11,4,'Suite Deluxe',180,'Cras ipsum diam, viverra eu libero in, volutpat ultrices nibh. Suspendisse tincidunt a tellus nec vehicula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla enim ante, tempus ac lectus et, tempor viverra nibh. Nulla arcu lacus, imperdiet vitae neque ultrices, tempor suscipit elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed facilisis dictum erat vel dictum. Sed porta odio ut ligula bibendum scelerisque. Phasellus commodo purus justo, ac interdum mauris facilisis ac.','https://www.booking.com/hotel/fr/sofitel-marseille-vieux-port.fr.html?label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BFAsTyVd6vva'),(12,4,'Suite standard',164,'Sed sodales nibh enim, et tempus orci pretium non. Pellentesque libero sapien, tempus quis varius feugiat, mollis in lacus. Aliquam sit amet justo blandit, scelerisque libero ac, aliquam massa. Aenean eget ex ut velit fermentum posuere sed in erat. Aliquam luctus purus in mauris aliquet, et consequat ipsum faucibus. Donec lobortis orci id enim vehicula, sit amet vehicula urna vulputate. Praesent nec enim augue. Quisque tincidunt tellus a arcu semper iaculis. Suspendisse odio nisl, pharetra nec magna sed, dapibus euismod mi. Mauris ac lacinia ex. Praesent vitae nunc eget turpis molestie feugiat. Phasellus euismod egestas mollis. Quisque in tempor ipsum. Sed sed pulvinar magna, id pulvinar enim. Interdum et malesuada fames ac ante ipsum primis in faucibus.','https://www.booking.com/hotel/fr/marseille-dieu.fr.html?label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BFAsTyVd6vvamF_no64o&sid=c'),(13,5,'Suite VIP',460,'Integer ornare justo ex, eget luctus urna rhoncus sit amet. Nulla facilisi. Suspendisse condimentum pretium mi a blandit. Quisque sagittis condimentum volutpat. Maecenas aliquam mollis elit, vel mollis elit sagittis tincidunt. Morbi scelerisque urna congue eros ultrices, id convallis nunc semper. Nullam eget tortor tempus, aliquam nisi vitae, viverra odio. Suspendisse ac elementum enim, ut bibendum lectus.','https://www.booking.com/hotel/fr/maison-albar-paris-celine.fr.html?aid=376366;label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BFAs'),(14,5,'Suite Deluxe',420,'Donec imperdiet consectetur dui, a pretium lectus pellentesque ut. Nunc eu fringilla leo. Vivamus convallis lacus sit amet nunc commodo viverra. Vestibulum id mi nec nunc varius egestas id nec nulla. Donec quis nisi a velit volutpat sagittis. Praesent sed iaculis mauris. Morbi dictum egestas consequat. Morbi mollis velit eget lacus tempus, a elementum quam ullamcorper.','https://www.booking.com/hotel/fr/renaissance-paris-republique.fr.html?label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BFAsTyVd6vva'),(15,5,'Suite standard',395,'Cras mollis eleifend lorem mattis vehicula. Quisque gravida, quam eget imperdiet faucibus, libero massa varius sapien, sit amet imperdiet nulla lacus nec odio. Aenean faucibus maximus libero. Curabitur feugiat erat quis tellus posuere vulputate. Donec pharetra nibh ac elit aliquet tempor. Etiam vitae mauris et ipsum tincidunt consequat non at sem. Phasellus sodales ligula vel dui pellentesque gravida. Sed vitae lectus semper, lacinia arcu in, finibus justo. Quisque tempor felis eget pulvinar tincidunt. Praesent eu massa nisl.','https://www.booking.com/hotel/fr/opera-diamond.fr.html?label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BFAsTyVd6vvamF_no64o&sid=c4'),(16,6,'Suite VIP',160,'Pellentesque convallis magna et metus porta, sit amet eleifend ipsum tristique. Nulla vehicula turpis eu vehicula faucibus. Sed cursus nibh a ex consectetur dapibus. Nullam porttitor accumsan orci eu feugiat. In id maximus mauris. Morbi molestie ligula sed turpis hendrerit, et convallis eros convallis. Aliquam sodales aliquam est tempor pharetra. Nulla pretium sem massa, eu rutrum urna efficitur sed. Sed vitae orci vitae velit luctus pretium sit amet faucibus velit. Maecenas eget iaculis urna. Ut suscipit nibh sit amet risus semper semper. Vivamus mattis sapien vitae dui ullamcorper ultricies. Nunc gravida ullamcorper eros ac fringilla.','https://www.booking.com/hotel/fr/regentpetitefrance.fr.html?aid=376366;label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BFAsTyVd6vv'),(17,6,'Suite Deluxe',149,'Maecenas pretium lacus sit amet libero rutrum congue. Etiam scelerisque lobortis bibendum. Vestibulum dapibus laoreet nulla, nec rutrum est mattis eget. Donec vehicula mauris tempor pharetra finibus. Cras mollis laoreet purus, et vulputate turpis tincidunt eu. Nulla at elit in nibh posuere malesuada. Morbi at dui metus. Pellentesque tristique lacus lectus, non congue erat fermentum nec. Phasellus rhoncus metus ante, id varius nunc lacinia ut. Phasellus ut auctor libero, non consectetur velit. Mauris malesuada neque non condimentum egestas. Nullam vel ante sed odio hendrerit aliquet sed sed lorem.','https://www.booking.com/hotel/fr/pavillon-regent-petite-france.fr.html?aid=376366;label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7'),(18,6,'Suite standard',130,'Morbi lobortis, dui vitae posuere tincidunt, velit quam tincidunt est, sit amet bibendum velit urna eu augue. Praesent vestibulum et velit et pulvinar. Maecenas dapibus euismod purus. Curabitur in ultricies arcu. In pulvinar dolor nec risus placerat eleifend blandit quis sapien. Nulla vitae turpis auctor, cursus justo a, imperdiet felis. Phasellus feugiat sollicitudin lacus, a fermentum felis faucibus nec. Etiam et ex mattis, facilisis risus quis, sollicitudin metus. Nunc luctus lacus ligula, vel tincidunt ante porta in. Cras elementum lorem odio, vel venenatis leo facilisis et. Ut tempor commodo enim. Cras leo ex, viverra vitae lacinia euismod, placerat eget magna.','https://www.booking.com/hotel/fr/sofitel-strasbourg.fr.html?label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BFAsTyVd6vvamF_no64o&s'),(19,7,'Suite VIP',103,'Aliquam erat volutpat. Quisque ac ligula orci. Morbi pharetra lectus sed egestas tincidunt. Cras pulvinar lectus at molestie rutrum. Duis eleifend urna eu neque fringilla, vitae consequat ipsum aliquet. Ut tincidunt, tortor vehicula maximus posuere, lorem justo tempus urna, at dapibus ante ex ac ligula. Vestibulum aliquam felis ac viverra placerat. Integer maximus pharetra lorem eget fringilla. Nulla facilisi. Mauris placerat tellus ipsum, in iaculis arcu ultricies a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec finibus, nisl non euismod accumsan, neque libero iaculis erat, nec placerat diam ex id eros. In hac habitasse platea dictumst. Maecenas maximus nisi nec nibh pellentesque, et congue enim mattis. Vestibulum a lorem lacus. Ut ut ipsum sit amet ipsum lacinia blandit eu sed ligula.','https://www.booking.com/hotel/fr/urban-suites-cite-des-congres.fr.html?aid=376366;label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7'),(20,7,'Suite Deluxe',95,'Nulla non tortor non ligula dapibus iaculis. Donec odio mauris, pharetra nec rutrum non, molestie id libero. Nulla consequat accumsan arcu. Vivamus nec leo id lectus vehicula rutrum eu nec ex. Sed nisl odio, tempus quis risus vel, tempus scelerisque urna. Nunc lacinia tempus nunc. Vestibulum et est at massa molestie porttitor. Sed quam magna, semper sit amet nisi sed, elementum auctor mi. Vestibulum feugiat semper turpis, nec feugiat massa porta at. Morbi porttitor risus a felis lacinia tincidunt. Maecenas at pulvinar odio, nec commodo ante. Etiam sodales lectus eros, sit amet semper nibh euismod blandit.','https://www.booking.com/hotel/fr/adagio-city-aparthotel-nantes-centre.fr.html?label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BFAs'),(21,7,'Suite standard',86,'Integer nunc elit, iaculis non dui ac, efficitur ultrices orci. In massa tellus, vulputate a pretium vel, semper eu sapien. Duis ut luctus leo, vel volutpat sem. Nunc facilisis, lacus a euismod luctus, arcu sapien laoreet turpis, ut vehicula ante lorem non diam. Nullam urna erat, interdum sed ullamcorper eu, convallis et urna. Suspendisse dictum velit et ex condimentum, quis condimentum mi convallis. Curabitur tincidunt leo purus, ac aliquam mauris dignissim nec. Vivamus bibendum, risus in sodales imperdiet, risus massa gravida odio, vitae rutrum lorem dui sed metus. Sed vehicula malesuada ex. Pellentesque blandit ac augue eu molestie. Sed lobortis mi sed quam rutrum, et tincidunt tortor semper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;','https://www.booking.com/hotel/fr/residhome-nantes-berges-de-la-loire.fr.html?label=fr-85Sbyi2evytni3mHZEi6UgS267492169156%3Apl%3Ata%3Ap1%3Ap22.563.000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-65526620%3Alp9056373%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9Ye7BFAsT');
/*!40000 ALTER TABLE `suite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temporary_search`
--

DROP TABLE IF EXISTS `temporary_search`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temporary_search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `establishment_id_id` int(11) NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `suite_id_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_68CE39E2FB55A222` (`establishment_id_id`),
  KEY `IDX_68CE39E259CDD37D` (`suite_id_id`),
  CONSTRAINT `FK_68CE39E259CDD37D` FOREIGN KEY (`suite_id_id`) REFERENCES `suite` (`id`),
  CONSTRAINT `FK_68CE39E2FB55A222` FOREIGN KEY (`establishment_id_id`) REFERENCES `establishment` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temporary_search`
--

LOCK TABLES `temporary_search` WRITE;
/*!40000 ALTER TABLE `temporary_search` DISABLE KEYS */;
INSERT INTO `temporary_search` VALUES (5,1,'2022-04-21','2022-04-12',NULL),(6,1,'2022-04-20','2022-04-28',NULL),(7,3,'2022-04-20','2022-04-21',NULL),(8,1,'2022-04-29','2022-05-19',NULL);
/*!40000 ALTER TABLE `temporary_search` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` binary(16) NOT NULL COMMENT '(DC2Type:uuid)',
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  KEY `IDX_8D93D64988987678` (`role_id_id`),
  CONSTRAINT `FK_8D93D64988987678` FOREIGN KEY (`role_id_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('ËÛYgnŒíYIO\\;','administrator@hypnos-group.fr','$2y$13$B95SgVjFzApgp8unRx8ad.x9brESBEEzTqDnpHWrCl/PedNjz1KDm','JÃ©rÃ©my','GABOURG','JÃ©rÃ©my GABOURG',2),('ËÛ]d·m®¦KûãH¼!Ñ','john.doe@hypnos-group.fr','$2y$13$CLAQ2q.7mnQ0sotYfEOM.OGyHcmWLaPigouDgNIucGJ48B9PT1IEK','John','DOE','John DOE',1),('ËÛm ­`®ŠP÷;<ZîO','jean.robert@hypnos-group.fr','$2y$13$XUE5zDcNW/Yg9n/vfE6yIOKd5.gPtJqFbc57mAtYNgQnUSsI3xf4O','Jean','ROBERT','Jean ROBERT',1),('ËÛn$üfÌ¾ë9~ýv*','axel.bruan@hypnos-group.fr','$2y$13$4D.161IN7dyZ4k8///9.Hu7cg3yKX5gMUEumC7D7TbR4uuDFooleq','Axel','BRUAN','Axel BRUAN',1),('ËÛp2g¾ £WL¥¡N','pauline.jasmin@hypnos-group.fr','$2y$13$UyuiSLAy9m4ahx5QBxoC.ObEIaJrWOWblIbSfvUQx0gdgznRkQ0Ki','Pauline','JASMIN','Pauline JASMIN',1),('ËÛq]ìeºœ†“®—îÀ','paul.billot@hypnos-group.fr','$2y$13$WJnCLAPRBLKwsHzujItXE.1pWn0p/FDYwrKs5XdDKhxjogO3mHP72','Paul','BILLOT','Paul BILLOT',1),('ËÛrr@ip€¦‹¬Ø\'','marc.fredo@hypnos-group.fr','$2y$13$P5dCGyWOZEDHnLzbuX.xX.9iycNiTwz9J.hH3QJovXPgE2kIJWZRK','Marc','FREDO','Marc FREDO',1),('ËÛsUe|£«!ýè€Í¨','maxime.torat@hypnos-group.fr','$2y$13$UbJdKB4oCKTDGAXvjDnA1uLsuhtZYQmR9JyLOs4J1qCuKe3eyyiQK','Maxime','TORAT','Maxime TORAT',1),('Ì	o–¢kN©É#\Z÷Ë','jane.doe@exemple.fr','$2y$13$i7bBma410zIQskRkp2Zvwu5IICOr3SeZTcHPw7hR1AUsGRbOaA5Fy','Jane','DOE','Jane DOE',3);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-21 20:14:16
