-- MySQL dump 10.13  Distrib 8.0.34, for Linux (x86_64)
--
-- Host: localhost    Database: php2
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE DATABASE php2;
USE php2;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fio` varchar(125) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Индекс 2` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Попов Виктор'),(2,'Абрамов Михаил');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Маркетинг'),(2,'Бухгалтерия');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_id` bigint NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Брянский машиностроительный завод (БМЗ) планирует начать серийный выпуск нового магистрального грузового тепловоза 3ТЭ28.','БРЯНСК, 22 октября. /ТАСС/. Брянский машиностроительный завод (БМЗ) планирует начать серийный выпуск нового магистрального грузового тепловоза 3ТЭ28. К началу ноября завод получит сертификат на его производство, сообщили ТАСС в пресс-службе БМЗ.\n\n\"Ожидаем сертификацию нового грузового магистрального тепловоза 3ТЭ28, который будет работать на Восточном полигоне. Получение сертификата на серийное производство этого тепловоза планируем к началу ноября\", - рассказали в пресс-службе завода.\n\nНовый локомотив способен перемещать на железнодорожных путях составы с весом более 7 тыс. тонн в условиях Восточного полигона (Байкало-Амурская магистраль и Транссиб), на участках с простым профилем пути - более 10 тыс. тонн. Уточняется, что в конструкции тепловоза используется максимально возможное количество комплектующих российского производства.\n\nВ 2022 году первый собранный на БМЗ локомотив прошел удачный опытный пробег в 10 тыс. км, в начале 2023 - тепловоз направили на полигон в Коломну для проведения сертификационных испытаний. После получения сертификата на серийное производство БМЗ планирует собрать и передать РЖД 30 локомотивов.\n\nБрянский машиностроительный завод - единственный в России производитель магистральных грузовых локомотивов. Он поставляет продукцию в Казахстан, Белоруссию, Узбекистан и Монголию. В этом году завод отметил юбилей - 150 лет.',1),(2,'Компания Panasonic разрабатывает солнечные панели для окон — организация будет выпускать стекло, которое генерирует энергию к 2028 году.','Компания Panasonic разрабатывает солнечные панели для окон — организация будет выпускать стекло, которое генерирует энергию к 2028 году.\r\n\r\nВ стекле будут совмещаться тончайшие слои солнечных элементов, а сами же рамы останутся прозрачными, для того чтобы в дальнейшем их можно было использовать в качестве окон. В рамках своего анонса Panasonic объявила о планах выпускать четыре разных типа панелей:\r\n                                                                                                                                                                             \r\n                                                                                                                                                                                 Панель с полным покрытием, которая обеспечивает самую высокую в мире эффективность выработки электроэнергии;\r\n                                                                                                                                                                                 Панель с уровнем прозрачности 20%;\r\n                                                                                                                                                                                 Панель с уровнем прозрачности 50%, что позволяет использовать её в качестве оконного стекла^\r\n                                                                                                                                                                                 Панель с градиентным уровнем прозрачности.\r\n                                                                                                                                                                             \r\n                                                                                                                                                                             КПД выработки электроэнергии панелей Panasonic при размере свыше 800 квадратных сантиметров составляет 17,9%, что уже было подтверждено независимой организацией.\r\n                                                                                                                                                                             \r\n                                                                                                                                                                             Согласно источникам, технология будет сначала внедрена в коммерческий сектор (офисные здания), но в перспективе ее можно будет встретить и в обычных жилых домах.',2),(3,'Судя по всему, в принадлежащем Sony Interactive Entertainment подразделении PlayStation Studios прошла новая волна увольнений.','Судя по всему, в принадлежащем Sony Interactive Entertainment подразделении PlayStation Studios прошла новая волна увольнений. Согласно информации в Linkedin, под сокращение, в частности, попали сотрудники PlayStation’s Visual Arts Group, известной по работе над The Last of Us Part I.\n\nСреди потерявших работу — Даниэль Беллемар, который шесть месяцев трудился старшим дизайнером уровней некоего неанонсированного проекта, и Мэтт Барни, занимавший пост старшего технического рекрутера. Последний не стал раскрывать точное число сотрудников, оставшихся без работы, но сообщил, что знал о грядущем сокращении заранее. Рекрутер отметил, что очень любит PlayStation, поэтому, когда ему впервые предложили уйти, решил остаться до последнего.\n\nВ то же время Беллемар очень огорчился, хотя отметил, что благодарен за возможность поработать среди чрезвычайно талантливых людей над невероятными играми. Разработчик не унывает и покидает компанию с воспоминаниями о хорошо проведённом времени.\n\nСтоит учесть, что это уже не первая волна увольнений в PlayStation Studios в 2023 году. В октябре под сокращение попали координатор производства Маколи Хоппер и тестировщик качества Маркос Орфанос. Оба работали в Naughty Dog над многопользовательским проектом, предположительно во вселенной The Last of Us.\n\nПо данным Kotaku, последняя волна увольнений в Naughty Dog затронула самые разные отделы — от основного производственного до группы дизайнеров. Журналисты писали, что руководство студии оказывало давление на попавших под сокращения и пыталось избежать утечек информации о происходящем.',1),(4,'Apple анонсирует новые Mac в течение нескольких дней.','Apple анонсирует новые Mac в течение нескольких дней. Марк Гурман из Bloomberg утверждает, что анонс состоится до конца октября.\n\nОн сообщил, что Apple «планирует запуск нового продукта Mac примерно в конце этого месяца», отмечая, что речь может идти о выпуске обновленной 24-дюймовой модели iMac. Текущая модель выпущена в апреле 2021 года и является единственным Mac текущего поколения, оснащенным чипом M1. Гурман неоднократно заявлял, что следующий iMac от Apple не будет иметь M2 и вместо этого будет оснащен чипом M3.\n\nГурман отметил, что в магазинах Apple сейчас не хватает iMac, 13-дюймового MacBook Pro и 14- и 16-дюймового MacBook Pro, и многие конфигурации поступят не раньше середины ноября, что, по его мнению, является явным признаком того, что что-то с этими тремя устройствами вот-вот произойдет. Он добавил, что Apple добилась прогресса в выпуске новых 14-дюймовых и 16-дюймовых MacBook Pro. Хотя нынешние 14-дюймовые и 16-дюймовые модели MacBook Pro с M2 Pro и M2 Max были выпущены в январе, он считает, что «дополнительное обновление в том же году было бы необычным, но не невероятным».\nApple представит новые Mac через несколько дней\nФото: Gabby Jones/Bloomberg\n\nГурман полагает, что предстоящий анонс Mac состоится в понедельник, 30 октября, или во вторник, 31 октября, после чего в четверг, 2 ноября, будет опубликован отчет о прибылях и убытках Apple. Он не ожидает, что какой-либо из новых компьютеров Mac будет содержать серьезные изменения, кроме новых процессоров. Впрочем, Гурман добавил, что их дисплеи могут быть незначительно улучшены.\n\nПо его данным, модели MacBook Air следующего поколения с чипами M3 не будут выпущены до начала 2024 года и что более крупная профессиональная версия iMac с 32-дюймовым дисплеем и новым дизайном запланирована на конец 2024 или 2025 года.\n',2);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `age` int DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persons`
--

LOCK TABLES `persons` WRITE;
/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
INSERT INTO `persons` VALUES (1,42,'Иванов'),(2,28,'Петров'),(3,19,'Сидорова');
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-06 16:56:53
