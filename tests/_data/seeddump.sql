-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: questionnaires
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.17.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2018_03_11_192010_CreateRolesTable',1),('2018_03_11_192021_CreatePermissionsTable',1),('2018_03_11_193751_Create_Role_User_Table',1),('2018_03_17_143241_Create_Questionnaires_Tables',1),('2018_03_17_144048_Create_Questions_Table',1),('2018_03_17_145210_Create_Question_Options_Table',1),('2018_03_17_145520_Create_Question_Scales_Table',1),('2018_03_17_150620_Create_Respondants_Table',1),('2018_03_17_150854_Create_Responses_Table',1),('2018_04_06_133449_Create_Permission_Role_Table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` int(10) unsigned NOT NULL,
  `option` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `options_question_foreign` (`question`),
  CONSTRAINT `options_question_foreign` FOREIGN KEY (`question`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES (4,11,'this optiom','2018-04-17 06:57:32','2018-04-17 06:57:32'),(8,10,'Option 1','2018-04-17 07:39:09','2018-04-17 07:39:09'),(9,10,'Option 2','2018-04-17 07:39:13','2018-04-17 07:39:13'),(10,10,'Option 3','2018-04-17 07:39:17','2018-04-17 07:39:17'),(11,14,'Option 1','2018-04-17 07:40:39','2018-04-17 07:40:39'),(12,14,'Option 2','2018-04-17 07:40:45','2018-04-17 07:40:45'),(13,14,'Option 3','2018-04-17 07:40:50','2018-04-17 07:40:50'),(14,14,'Option 4','2018-04-17 07:40:56','2018-04-17 07:40:56');
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_options`
--

DROP TABLE IF EXISTS `question_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` int(10) unsigned NOT NULL,
  `option` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_options_question_foreign` (`question`),
  CONSTRAINT `question_options_question_foreign` FOREIGN KEY (`question`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_options`
--

LOCK TABLES `question_options` WRITE;
/*!40000 ALTER TABLE `question_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `question_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_scales`
--

DROP TABLE IF EXISTS `question_scales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_scales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` int(10) unsigned NOT NULL,
  `startDetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` int(11) NOT NULL,
  `endDetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_scales_question_foreign` (`question`),
  CONSTRAINT `question_scales_question_foreign` FOREIGN KEY (`question`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_scales`
--

LOCK TABLES `question_scales` WRITE;
/*!40000 ALTER TABLE `question_scales` DISABLE KEYS */;
/*!40000 ALTER TABLE `question_scales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questionnaires`
--

DROP TABLE IF EXISTS `questionnaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questionnaires` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `agreement` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `layout` int(11) NOT NULL,
  `creator` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `questionnaires_title_unique` (`title`),
  KEY `questionnaires_creator_foreign` (`creator`),
  CONSTRAINT `questionnaires_creator_foreign` FOREIGN KEY (`creator`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionnaires`
--

LOCK TABLES `questionnaires` WRITE;
/*!40000 ALTER TABLE `questionnaires` DISABLE KEYS */;
INSERT INTO `questionnaires` VALUES (1,'Dolores voluptatem odio ducimus nemo accusantium libero ipsa.','Quas eveniet tempora consequatur aut debitis quia quasi. Amet et expedita ut est ipsa qui. Rerum dolorem eligendi veniam rerum qui sapiente dolorum quo.','Molestias natus eum molestias id suscipit et pariatur. In iste quos et expedita a iure. Eaque molestiae aperiam consequatur autem ab dignissimos.',0,0,1,'nulla','2018-04-06 13:49:58','2018-04-06 13:49:58'),(2,'Odio explicabo veritatis earum voluptatem.','Dignissimos optio facere enim reprehenderit repudiandae voluptatem adipisci. Esse ut ullam aut rem quia. Eligendi culpa porro cumque magni dicta sint dignissimos repudiandae. Doloribus ut aliquid iste illum quis velit.','Itaque recusandae quaerat voluptas autem consequatur dolores voluptates. Sunt enim id perspiciatis iste voluptatem. Enim exercitationem sed quaerat eaque tempore quis ea sit.',0,0,1,'dolores','2018-04-06 13:49:58','2018-04-06 13:49:58'),(3,'Quae a facere exercitationem nihil voluptatibus tempora.','Enim iste maiores neque vel et. Harum excepturi quia occaecati magnam quasi consequatur tempora. Quia illum dolor consequatur. Totam repellendus earum sequi sint accusamus eos cum. Beatae ut incidunt ab sed.','Velit consequatur nemo deleniti et. Possimus cum doloremque sed iste ex. Atque sed et fugiat nihil amet eos porro.',0,0,1,'quia','2018-04-06 13:49:58','2018-04-06 13:49:58'),(4,'Doloremque neque et animi nihil nihil expedita dolorum et.','Qui est unde incidunt quia labore. Minus qui enim sequi dolorem aut cum. Et a aut et dolores. Consequatur esse voluptas exercitationem voluptas dolorum natus culpa.','Possimus error tempora alias nesciunt voluptatibus sapiente. Quia aspernatur labore placeat ex atque aut neque. Minima voluptatem similique repellendus cupiditate rerum libero. Nulla qui et perferendis enim. Accusamus itaque et neque.',0,0,1,'modi','2018-04-06 13:49:58','2018-04-06 13:49:58'),(5,'Placeat et ut voluptatem expedita et et.','Voluptas autem expedita laborum perferendis porro voluptatem ut praesentium. Enim adipisci sed aut eum autem.','Rerum totam corrupti repudiandae. Iure et sunt omnis inventore excepturi laborum. Assumenda est vero quis voluptate. Ipsa ducimus in rerum voluptas inventore.',0,0,1,'sit','2018-04-06 13:49:58','2018-04-06 13:49:58');
/*!40000 ALTER TABLE `questionnaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `layout` int(11) NOT NULL,
  `creator` int(10) unsigned NOT NULL,
  `questionnaire` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_creator_foreign` (`creator`),
  KEY `questions_questionnaire_foreign` (`questionnaire`),
  CONSTRAINT `questions_creator_foreign` FOREIGN KEY (`creator`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `questions_questionnaire_foreign` FOREIGN KEY (`questionnaire`) REFERENCES `questionnaires` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (10,'Question 1',3,1,1,1,'2018-04-17 07:39:00','2018-04-17 07:39:00'),(11,'Question 2',1,0,1,1,'2018-04-17 07:39:49','2018-04-17 07:39:49'),(12,'Question 3',4,2,1,1,'2018-04-17 07:40:00','2018-04-17 07:40:00'),(13,'Question 4',2,0,1,1,'2018-04-17 07:40:19','2018-04-17 07:40:19'),(14,'Question 5',3,2,1,1,'2018-04-17 07:40:35','2018-04-17 07:40:35');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respondants`
--

DROP TABLE IF EXISTS `respondants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respondants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `questionnaire` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `respondants_questionnaire_foreign` (`questionnaire`),
  CONSTRAINT `respondants_questionnaire_foreign` FOREIGN KEY (`questionnaire`) REFERENCES `questionnaires` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respondants`
--

LOCK TABLES `respondants` WRITE;
/*!40000 ALTER TABLE `respondants` DISABLE KEYS */;
/*!40000 ALTER TABLE `respondants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responses`
--

DROP TABLE IF EXISTS `responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responses` (
  `respondant` int(10) unsigned NOT NULL,
  `question` int(10) unsigned NOT NULL,
  `response` text COLLATE utf8_unicode_ci NOT NULL,
  KEY `responses_respondant_foreign` (`respondant`),
  KEY `responses_question_foreign` (`question`),
  CONSTRAINT `responses_question_foreign` FOREIGN KEY (`question`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `responses_respondant_foreign` FOREIGN KEY (`respondant`) REFERENCES `respondants` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responses`
--

LOCK TABLES `responses` WRITE;
/*!40000 ALTER TABLE `responses` DISABLE KEYS */;
/*!40000 ALTER TABLE `responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ryan','ryan@example.com','$2y$10$au556aFeNsMIkxShmtFGneEVrtq3lfMTHsFqPSbvwCl.AagOE9NyW','Wb3lBlGswPO0klYyg3s8rLRr8t1nqkxAsybnPvhU4y0VYtOcCscvFabg03DR',NULL,'2018-04-17 07:35:47'),(2,'Isaac Morar','bashirian.leilani@example.com','$2y$10$faRLlmiGGwZf2NfczO9.XuP3qf8JBLh4JOcJ4urc/B.yxZFqBZ.7e','zM9pInjw7C','2018-04-06 13:49:58','2018-04-06 13:49:58'),(3,'Jeffry Huel','fay.gunner@example.org','$2y$10$h1AlPVdOM3dKrRl97KU5NO5Ate/1cgZfRP.yWKiWd1n7F5LWrctmC','7s8mq6H3dy','2018-04-06 13:49:58','2018-04-06 13:49:58'),(4,'Eliza Johnston','jvonrueden@example.com','$2y$10$1YLSCQsBzYI/VC/h3Hn9HOMmJ1vaeaXyho9sW3bzF1sKsq09APamm','Um4hFu8ZOm','2018-04-06 13:49:58','2018-04-06 13:49:58'),(5,'Caroline Langosh','hyatt.betsy@example.net','$2y$10$V9u71w6iRt/C0YfNLKaP.OrjhTvC.m2mMVrq66tN0/fbhIis51Eo.','nq7pqIHnot','2018-04-06 13:49:58','2018-04-06 13:49:58'),(6,'Mr. Reilly Abernathy Sr.','lesch.rae@example.net','$2y$10$mfSWNPdgTmX0Vg/HA1qzzecdYnxg8YH.g9S7zX2CzrCFMsSg1b7mq','72Pmvhy4aY','2018-04-06 13:49:58','2018-04-06 13:49:58'),(7,'Natasha Langosh I','bryana.flatley@example.com','$2y$10$q5H8kkCAIfrWOsB8yaLwmevSQhqZoqIYjv5MzzZgurOtiljvnSFFm','ZXAMPMfvdS','2018-04-06 13:49:58','2018-04-06 13:49:58'),(8,'Shannon Boyer','mathew.nitzsche@example.net','$2y$10$mQk60rwEpWQpXjTcGZJo1.fvrQgUXhi8nzyjfUfCgR6lx06fLeO46','tAZ8xgb1bZ','2018-04-06 13:49:58','2018-04-06 13:49:58'),(9,'Prof. Sherwood Konopelski IV','ted25@example.org','$2y$10$IcHWIVEmr7s7xSakmZcumOoO2VgkDtbEl.GOvqEV7.K1I6PewN8OW','zZdOVdHY4H','2018-04-06 13:49:58','2018-04-06 13:49:58'),(10,'Will Rau Jr.','blair.oreilly@example.net','$2y$10$sASmI5njt8zMqfBmxRUxtOTBjj3FNKmWTJflnnIUhUdl489y62tVW','X5SyopvojV','2018-04-06 13:49:58','2018-04-06 13:49:58'),(11,'Prof. Justyn Strosin','anna14@example.org','$2y$10$iHp3yisG80LhLAsZPDoeh.k7v723wGsxhAsjNaukVgpVme7T7vmkG','KHJ0YaBLqe','2018-04-06 13:49:58','2018-04-06 13:49:58'),(12,'Julien Tromp','cdamore@example.net','$2y$10$YpisjrQiCjDULnj01YjA4ulGsOAoCZU3qURLIfLiCk4HbNoZvR46y','6B8SFMv5jt','2018-04-06 13:49:58','2018-04-06 13:49:58'),(13,'Prof. Thaddeus Jakubowski','hildegard.balistreri@example.com','$2y$10$hhic.4xe4ZCPwFJpGIXkl.Rz5IKFkIWpqYwcMjttoKRStTt1HZrVi','FvIlOo5X2b','2018-04-06 13:49:58','2018-04-06 13:49:58'),(14,'Andy Sipes','rosalee18@example.org','$2y$10$moq5bYnpDzB8o4kkMzO3uOIj.gyWaIXDt9WNFqvkcZyH3poEKhYRq','N1asUMf8FK','2018-04-06 13:49:58','2018-04-06 13:49:58'),(15,'Cletus Labadie','uriah.kassulke@example.org','$2y$10$km6H5QvQJaxhezGTB90NX.tpNlC5G64ZdEqqDEZuHpetKCZUqcTxi','HI0dvhe4bX','2018-04-06 13:49:58','2018-04-06 13:49:58'),(16,'Leo Kutch','blick.rafaela@example.org','$2y$10$uPqHLAFxYc1bD2zqGbAGNe0rUXdD7T3ONUkI7GatkrO0TG2Aj6tWK','J02GGkOV4O','2018-04-06 13:49:58','2018-04-06 13:49:58'),(17,'Prof. Velda Dickens','cbashirian@example.org','$2y$10$BYWSLlZONJd1KVW4ukOEJ.DaMynfLl.uhHeEWh2tU7xvMqQO.9Ksa','PlqjoMon8Z','2018-04-06 13:49:58','2018-04-06 13:49:58'),(18,'Hubert Mertz PhD','rippin.paige@example.com','$2y$10$EBJ1Kp/c9L0vyiqHM5Y.UuT7oXAhtwUNxQDn2XO5dHsn6Rz9tXMY2','LR9izreUZv','2018-04-06 13:49:58','2018-04-06 13:49:58'),(19,'Leonard Mitchell','julian.dach@example.com','$2y$10$fhwi9mQbZ4fZehehan8x/.HKNCKzUUbMAvQomRz4o.cccuOI1oO7S','hK980KUY1a','2018-04-06 13:49:58','2018-04-06 13:49:58'),(20,'Arvid Bruen','herzog.santos@example.com','$2y$10$DMffxsmqP1AG1C6/zW9Y8uJVOpQMwFE5YXbvOnqn8.oBXgyg1oJ22','mQVtuE4l4z','2018-04-06 13:49:58','2018-04-06 13:49:58'),(21,'Miss Yasmin Upton','ujacobs@example.net','$2y$10$5gQtrpPdgZFVken01GcAdeN75aWymvr2KlcYqNWIaT0lcQFWt7qMW','hpwYcJc6VT','2018-04-06 13:49:58','2018-04-06 13:49:58'),(22,'Vern Bode','sawayn.harmony@example.org','$2y$10$RBhbYC6ocdiRps5fIqPFF.HhicyiGmNhA7jvVieP2QCH9FwMe5Msa','eYcOigmIQu','2018-04-06 13:49:58','2018-04-06 13:49:58'),(23,'Else Hintz','kavon.tillman@example.net','$2y$10$UTtDqG5erkjhKRn18I6YmO0e/4JXNvaGkvC..s7jZxfql40crAWqi','wnfRPyqERR','2018-04-06 13:49:58','2018-04-06 13:49:58'),(24,'Shanny Armstrong II','ibrahim04@example.net','$2y$10$tG2hQkhiFMPaTV34mqbP4OHI7iBGQE6OrexzSBXr1tAfCG1NscLNa','GxroPoB3uO','2018-04-06 13:49:58','2018-04-06 13:49:58'),(25,'Elissa Eichmann','hilbert63@example.org','$2y$10$qymevNCgxomn5kS54jF/zuv1wOBAVR0LE0J6z3Ic0uZoLmN7SCMGS','DrxYIUvKJm','2018-04-06 13:49:58','2018-04-06 13:49:58'),(26,'Penelope Carter','bpowlowski@example.com','$2y$10$ofksAFhZE8cpfTWhxPQQdO24jhw.JgXX4i2BZdto85oREXrf1mP96','RLfWaD46kL','2018-04-06 13:49:58','2018-04-06 13:49:58'),(27,'Mrs. Melody Lynch DVM','jschmidt@example.org','$2y$10$rxWf90Ozr574m18a7ocIEOPnh6TgzjkuGaWZhGev4e9GUu0mV2KXq','toAFUIpbIY','2018-04-06 13:49:58','2018-04-06 13:49:58'),(28,'Meda Ritchie','izaiah.reichert@example.com','$2y$10$vg.PIY3mQ6FLfJ/5wRexrORTWPldRtZObcYkLFdXKuj7TQGwQEKwm','qkfIBcS5wb','2018-04-06 13:49:58','2018-04-06 13:49:58'),(29,'Hobart Fisher','elnora.raynor@example.org','$2y$10$LcLgkihFeBC.VobMj/rjJOa4gUt0jlavZ1V2T3Q5fjzsqDFTp90fO','K7MBcvFN8y','2018-04-06 13:49:58','2018-04-06 13:49:58'),(30,'Linwood Grimes Sr.','ygrady@example.net','$2y$10$0.TDNx1idNN6BhrTohXnzuQ9dbvHmRe8rgc59955YqOglHBzPM7Rm','SsORBmbBvU','2018-04-06 13:49:58','2018-04-06 13:49:58'),(31,'Ms. Joy O\'Conner','leland.pagac@example.net','$2y$10$r9IieWUtNMtI1vNl0HrlMeXTJLxy.4gfUniRsYUzPNNLxwNtBione','vPNuTMqCjV','2018-04-06 13:49:58','2018-04-06 13:49:58'),(32,'Lucile McGlynn','marley12@example.net','$2y$10$6tD512eE8qVEf9KLQSjy1eEpZEsWbTh.W8b0pRdL02DjPzjlIlZES','HJssv7qJhc','2018-04-06 13:49:58','2018-04-06 13:49:58'),(33,'Miss Wanda Treutel MD','wisozk.brandy@example.net','$2y$10$TP3U4CFvOshGER.2GtqhmugfpcmkNjnwHnLKLFBgsMMICyXE8EOn6','jvmsslRtby','2018-04-06 13:49:58','2018-04-06 13:49:58'),(34,'Mr. Wilmer Kuhlman DDS','mclaughlin.dejah@example.com','$2y$10$nvdWMgl3/kMqpjfqHzG21uOxuoP0RkNQC0D2lkOeu/K26jP33HPkS','3UmYFzUtPS','2018-04-06 13:49:58','2018-04-06 13:49:58'),(35,'Prof. Lauryn Dooley','antwan63@example.net','$2y$10$4.5XwuMeRBZZesUuH.5BlOhfvGWsMZo1ExD6bg4OAfGCCTPPH/GIe','42g9wJSlZX','2018-04-06 13:49:58','2018-04-06 13:49:58'),(36,'Dr. Sofia Mraz','effertz.verona@example.org','$2y$10$Q.qJs4OY/0wWHVOcIzybDelKVPoP1tabwb88xuT7HkUJzI/OdcrPG','We40ItgyTc','2018-04-06 13:49:58','2018-04-06 13:49:58'),(37,'Porter White MD','charity.mueller@example.net','$2y$10$v242RPQfoVbO0GENXKMrpOW2oecxtln2YWHRrHja9BBE4/0Fq/e9i','t33B4mIVZg','2018-04-06 13:49:58','2018-04-06 13:49:58'),(38,'Gustave Little','billie.lueilwitz@example.net','$2y$10$6PlkegUADH3lVnPh1cj/7u4TiSOus88519UllRjAmFi44HYFwqSvi','ZBQJ68gqTP','2018-04-06 13:49:58','2018-04-06 13:49:58'),(39,'Granville Daniel','santiago.jast@example.org','$2y$10$dJq7UVUrjZDIu9A2rEIt3uOTOrcYczDbIemqNg96iZO5zwpkcUSiK','4RmJV5ZXuH','2018-04-06 13:49:58','2018-04-06 13:49:58'),(40,'Fanny Zulauf PhD','pete.rowe@example.org','$2y$10$7/er2Wvx5apUwHdTZ83AZeAGMYzxyRYZ3d83aYDlKkJKxodvrlIY6','V67FvGeme1','2018-04-06 13:49:58','2018-04-06 13:49:58'),(41,'Prof. Kory Pfeffer Jr.','carmela.bogan@example.org','$2y$10$sXPlERKYuGMIjHRDrunrDOIVcjh8Y9llXQsSAuBjHh/wrsD7oLY/q','y87jPcO7x5','2018-04-06 13:49:58','2018-04-06 13:49:58'),(42,'Dusty O\'Keefe','angelina15@example.com','$2y$10$mC4NAJ3tdIvH1j3amWLaZu9ehb3dgkQDt1KRGr38KpjUILyS7AlRC','6fInhkg0yS','2018-04-06 13:49:58','2018-04-06 13:49:58'),(43,'Madonna Rodriguez','karson.krajcik@example.net','$2y$10$qyMBHnrwhKG3EHYdvE87SOx153B8J7n3QYaadHE0t.KERS0hg3kx6','WfXDCsZRlI','2018-04-06 13:49:58','2018-04-06 13:49:58'),(44,'Miss Cayla Hamill','weber.brittany@example.org','$2y$10$OC962wa4szz9aCF34HBKbOlGyy1eGAZuap2b2po6O/AJ.Kbz4BnTe','qKif51UHtx','2018-04-06 13:49:58','2018-04-06 13:49:58'),(45,'Nedra Yost','pankunding@example.org','$2y$10$obE9r954kzMsjmBzBmrJzuEqiZ9pYSgrd70VLUGl/YAMUfxo2I58W','dmfFkqjNuU','2018-04-06 13:49:58','2018-04-06 13:49:58'),(46,'Cassidy Walter MD','mya80@example.org','$2y$10$JXj.3FEQBVjd99YsV5heM.1zCNkReYlAHdz1Y8SeOcBX1PK5WuIyK','CS2l1lnYvl','2018-04-06 13:49:58','2018-04-06 13:49:58'),(47,'Zita Effertz','schimmel.wendell@example.org','$2y$10$tWbXxZnGDvz.qnnxcVOOMufYoKp6VkgI2wU.Nzf5SgV9jqKOKMpU2','SKMwChLSNR','2018-04-06 13:49:58','2018-04-06 13:49:58'),(48,'Lilly McClure','thamill@example.net','$2y$10$DD2VGxS7bu5UPzxiYQbKDuYuO/cqgDTMVaUkv81OfGJ.2tuuDtffO','mZWY0Et66m','2018-04-06 13:49:58','2018-04-06 13:49:58'),(49,'Mason Harvey IV','rgorczany@example.com','$2y$10$m8ZiMER.X5fExgd7XGe3o.VU2px3uuJ90wvIwZ5M9hmCnqTFPwAym','C1NlIu6MFb','2018-04-06 13:49:58','2018-04-06 13:49:58'),(50,'Prof. Bertrand Hilll DDS','fschaden@example.org','$2y$10$Jk1S/AmOkWbFM0IGG.44buijq/qy0ADGrMzDmILk/M21IukjuY8NW','K9JU56ajeE','2018-04-06 13:49:58','2018-04-06 13:49:58'),(51,'Moses Kris','juwan.marvin@example.org','$2y$10$YG9NaY0PEpdxBWlQRQjoruoQEudQPWYm/ssgEy8ISWO6QzbaEhWy6','tisKbP0WXq','2018-04-06 13:49:58','2018-04-06 13:49:58');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-17  9:42:48
