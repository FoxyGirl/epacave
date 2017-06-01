-- MySQL dump 10.13  Distrib 5.5.53, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: epacave
-- ------------------------------------------------------
-- Server version	5.5.53

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
-- Table structure for table `bets`
--

DROP TABLE IF EXISTS `bets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt_add` datetime NOT NULL,
  `bet` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bets`
--

LOCK TABLES `bets` WRITE;
/*!40000 ALTER TABLE `bets` DISABLE KEYS */;
INSERT INTO `bets` VALUES (1,'2017-05-04 23:45:13',10000,1,1),(2,'2017-04-24 18:14:18',10500,2,1),(3,'2017-05-06 23:45:13',11000,3,1),(4,'2017-05-20 15:50:12',11500,1,1),(5,'2017-04-30 23:45:13',10000,3,3),(6,'2017-04-24 18:14:18',10500,2,3),(7,'2017-05-16 23:45:13',11000,1,3),(8,'2017-05-21 15:50:12',11500,2,3),(9,'2017-05-21 19:50:12',12500,2,3);
/*!40000 ALTER TABLE `bets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Доски и лыжи'),(2,'Крепления'),(3,'Ботинки'),(4,'Одежда'),(5,'Инструменты'),(6,'Разное');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lots`
--

DROP TABLE IF EXISTS `lots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lot_name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dt_add` datetime NOT NULL,
  `description` varchar(1500) NOT NULL,
  `img_path` varchar(500) NOT NULL,
  `start_price` int(11) NOT NULL,
  `dt_close` datetime NOT NULL,
  `step_bet` int(11) NOT NULL,
  `fav_count` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `winner_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lots`
--

LOCK TABLES `lots` WRITE;
/*!40000 ALTER TABLE `lots` DISABLE KEYS */;
INSERT INTO `lots` VALUES (1,'2014 Rossignol District Snowboard',1,'2017-05-25 20:41:22','Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.','img/lot-1.jpg',10999,'2017-06-11 16:40:28',1000,NULL,1,NULL),(2,'DC Ply Mens 2016/2017 Snowboard',2,'2017-05-25 20:41:22','Низкая цена, но не производительность, DC Ply долгое время был любимцем для гонщиков по бюджету. Женщинам-гонщикам следует искать слегка измененную женскую версию, но это для мужчин. Хотя его форма немного направлена, опорные точки положения DC Ply центрированы, как и вырез. Зарядка в предпочтительной позиции - лучший вариант, но вы также можете получить много из этого переключателя. Действительно, профиль (ярко выраженный изгиб с плоскими пятнами в точках контакта) поддается фристайлу, с большим количеством поп-музыки, когда вам это нужно, и свободным, похожим на коньки ощущением, когда вы просто путешествуете. Благодаря уменьшенному верхнему слою он также легче, чем в среднем, но все же достаточно силен благодаря нескольким полоскам букового дерева, усиливающим ядро тополя.','img/lot-2.jpg',159999,'2017-06-21 16:40:28',300,NULL,1,NULL),(3,'Крепления Union Contact Pro 2015 года размер L/XL',1,'2017-05-25 20:41:22','Отличные крепления – это больше, чем механизм. Это больше, чем просто сочетание базы, хайбека, стреп и винтов . Отличные крепления – это ключевой момент для создания лучшей связи между райдером и сноубордом, это то, что дает тебе свободу. В основном, компании, производящие сноубордические крепления, используют дешевый нейлон пластик. А компания Union, с момента своего основания, использует только Dupont™ Zytel® ST высшего качества при производстве креплений всего модельного ряда! Итог – легкие и надежные крепления, безопасность и пожизненная гарантия на базу и пяточную дугу!','img/lot-3.jpg',8000,'2017-06-04 16:40:28',500,NULL,2,NULL),(4,'Ботинки для сноуборда DC Mutiny Charocal',3,'2017-05-25 20:41:22','Лаконичный дизайн и простота традиционной шнуровки делают модель Mutiny прочным и универсальным фристайл-ботинком. Легкая контактная подошва и мягкая поддержка внутренника White дарят комфорт круг за кругом.','img/lot-4.jpg',10999,'2017-07-31 16:40:28',500,NULL,3,NULL),(5,'Куртка для сноуборда DC Mutiny Charocal',2,'2017-05-25 20:41:22','Классический дизайн куртки для вуайерити, сделанный для горы, с контрастными деталями и эмблемой аппликации в стиле ретро.','img/lot-5.jpg',7500,'2017-05-22 16:40:28',300,NULL,4,NULL),(6,'Маска Oakley Canopy',1,'2017-05-25 20:41:22','Сноубордическая маска O2 XL получила обновленные двойные линзы c ярко выраженной обтекаемой формой, благодаря чему обеспечивается хороший обзор в разных направлениях. В новой модели предусмотрена более гибкая оправа (по сравнению с предыдущим поколением), которая практически моментально адаптируется под формы лица, даже при крайне низких температурах воздуха. Небольшая прослойка, отделенная флисом, быстро отводит влагу наружу, а это значит, что райдер сможет носить такую маску без чувства дискомфорта в течение всего дня в горах. Для линейки 2017 года Oakley слегка обновили состав специального покрытия, которое наносится на линзы (F2 AntiFog), поэтому запотевание теперь практически невозможно. В области виска появились небольшие отверстия, которые позволят носить сноубордическую маску, не снимая корректирующих зрение очков. Поспособствует уменьшению бликов еще один слой покрытия. Двойные линзы, выполненные из лексана, защитят от ультрафиолетовых лучшей, ветра и даже сильного снегопада. Как и раньше, новая маска полностью совместима с любыми современными шлемами вне зависимости от марки.','img/lot-6.jpg',5400,'2017-06-02 16:40:28',100,NULL,6,NULL);
/*!40000 ALTER TABLE `lots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `dt_registry` datetime NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `avatar_path` varchar(100) DEFAULT NULL,
  `contacts` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Игнат','2017-05-23 22:40:20','ignat.v@gmail.com','$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka',NULL,'+375 028 555 55 55'),(2,'Леночка','2017-05-23 22:40:20','kitty_93@li.ru','$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa',NULL,'Пишите на почту'),(3,'Руслан','2017-05-23 22:40:20','warrior07@mail.ru','$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW',NULL,'1234@gmail.com');
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

-- Dump completed on 2017-06-01 23:31:09
