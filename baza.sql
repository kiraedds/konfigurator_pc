-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

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
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `src` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (50,50,'intel-core-i3.jpg','2019-01-20 18:00:20'),(51,51,'intel-core-i5.jpg','2019-01-20 17:57:10'),(52,52,'intel-core-i7.jpg','2019-01-20 17:57:46'),(53,53,'intel-core-i9.jpg','2019-01-20 17:58:11'),(60,60,'plyta_glowna_b360m.png','2019-01-20 18:18:35'),(61,61,'plyta_glowna_z370.jpg','2019-01-20 18:19:04'),(62,62,'plyta_glowna_maximus.jpg','2019-01-20 18:19:39'),(63,63,'plyta_glowna_x299.jpg','2019-01-20 18:20:20'),(70,70,'karta_graficzna_1.jpg','2019-01-20 20:37:53'),(71,71,'karta_graficzna_2.jpeg','2019-01-20 19:22:17'),(72,72,'karta_graficzna_3.jpg','2019-01-20 19:22:17'),(73,73,'karta_graficzna_4.jpg','2019-01-20 19:22:17'),(80,80,'pamiec_ram_1.jpeg','2019-01-20 19:22:17'),(81,81,'pamiec_ram_2.jpeg','2019-01-20 19:22:17'),(82,82,'pamiec_ram_3.jpg','2019-01-20 19:22:17'),(83,83,'pamiec_ram_4.jpg','2019-01-20 19:22:17'),(90,90,'zasilacz_1.jpeg','2019-01-20 19:57:46'),(91,91,'zasilacz_2.png','2019-01-20 19:58:43'),(92,92,'zasilacz_3.jpg','2019-01-20 19:59:14'),(93,93,'zasilacz_4.jpeg','2019-01-20 19:59:44'),(100,100,'obudowa_1.jpg','2019-01-20 20:00:14'),(101,101,'obudowa_2.jpg','2019-01-20 20:00:44'),(102,102,'obudowa_3.jpeg','2019-01-20 20:01:11'),(103,103,'obudowa_4.jpeg','2019-01-20 20:01:51'),(110,110,'dysk_1.jpg','2019-01-20 20:02:53'),(111,111,'dysk_2.jpeg','2019-01-20 20:03:24'),(112,112,'dysk_3.jpg','2019-01-20 20:04:06'),(113,113,'dysk_4.jpeg','2019-01-20 20:04:37'),(120,120,'chlodzenie_1.jpg','2019-01-20 20:05:07'),(121,121,'chlodzenie_2.jpg','2019-01-20 20:05:30'),(122,122,'chlodzenie_3.jpg','2019-01-20 20:05:54'),(123,123,'chlodzenie_4.jpg','2019-01-20 20:06:18');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (29,63,72,1),(30,64,81,1),(31,65,93,1),(32,66,100,1);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (63,9,'wysłano','2018-01-10 20:32:38',2345),(64,9,'wysłano','2018-01-11 14:07:18',250),(65,9,'wysłano','2018-01-15 21:22:11',1361),(66,9,'w realizacji','2018-01-15 21:31:06',129);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (50,'Procesor Intel Core i3-8350K, 4GHz, 8MB, BOX (BX80684I38350K)','procesory','x','x','Taktowanie: 4GHz \nRdzenie/Wątki: 4/4 \nTyp gniazda: Socket 1151 (Coffee Lake)',846),(51,'Procesor Intel Core i5-9600K, Hexa Core, 3.7GHz, 9MB,14mn, BOX (BX80684I59600K)','procesory','x','x','Taktowanie: 3,7-4,6GHz \nRdzenie/Wątki: 6/6 \nTyp gniazda: Socket 1151 (Coffee Lake)',1199),(52,'Procesor Intel Core i7-8700K, Hexa Core, 3.70GHz, 12MB, LGA1151, 14nm, BOX (BX80684I78700K)','procesory','x','x','Taktowanie: 3,7-4,7GHz \nRdzenie/Wątki: 6/12 \nTyp gniazda: Socket 1151 (Coffee Lake)',1999),(53,'Procesor Intel Core i9-9960X, 3.1GHz, 22 MB, BOX (BX80673I99960X)','procesory','x','x','Taktowanie: 3,1-4,5GHz \nRdzenie/Wątki: 16/32 \nTyp gniazda: Socket 2066',8532),(60,'Płyta główna MSI B360M PRO-VDH','plyty_glowne','x','x','Chipset płyty: Intel B360 \nGniazdo procesora: Socket 1151 (Coffee Lake) \nStandard pamięci: DDR4 \nStandard płyty: Micro ATX',319),(61,'Płyta główna Gigabyte Z370 AORUS Gaming K3','plyty_glowne','x','x','Chipset płyty: Intel Z370 \nGniazdo procesora: Socket 1151 (Coffee Lake) \nStandard pamięci: DDR4 \nStandard płyty: ATX',489),(62,'Płyta główna Asus ROG MAXIMUS XI HERO','plyty_glowne','x','x','Chipset płyty: Intel Z390 \nGniazdo procesora: Socket 1151 (Coffee Lake) \nStandard pamięci: DDR4 \nStandard płyty: ATX',1447),(63,'Płyta główna MSI MEG X299 CREATION','plyty_glowne','x','x','Chipset płyty: Intel X299 \nGniazdo procesora: Socket 2066 \nStandard pamięci: DDR4 \nStandard płyty: Extended ATX',2439),(70,'Karta graficzna MSI GTX 1050 Ti Aero ITX OCV1 4GB GDDR5 (128 bit), HDMI, DP, DVI_D, BOX','karty_graficzne','x','x','VRAM: 4GB \nSzyna danych[bit]: 128 \nTyp złącza: PCI Express x16 \nŁączenie kart: Nie',769),(71,'Karta graficzna MSI GeForce GTX 1060 GAMING X 6GB GDDR5 192 Bit 3xDP, HDMI, DVI-D, BOX','karty_graficzne','x','x','VRAM: 6GB \nSzyna danych[bit]: 192 \nTyp złącza: PCI Express x16 \nŁączenie kart: Nie',1319),(72,'Karta graficzna Zotac GeForce GTX 1070 Ti AMP! Edition 8GB GDDR5 (256 bit) DVI-D, HDMI, 3xDP, BOX','karty_graficzne','x','x','VRAM: 8GB \nSzyna danych[bit]: 256 \nTyp złącza: PCI Express 3.0 \nŁączenie kart: SLI',2345),(73,'Karta graficzna Zotac GeForce RTX 2080 Ti AMP Edition, GDDR6, HDMI, 3xDP, USB-C, BOX','karty_graficzne','x','x','VRAM: 11GB \nSzyna danych[bit]: 352 \nTyp złącza: PCI Express x16 \nŁączenie kart: SLI',6099),(80,'Pamięć Kingston HyperX DDR4 (HX421X14FBK2/8)','pamiec_ram','x','x','Pojemność: 8GB \nCzęstotliwość pracy [MHz]: 2133 \nOpóźnienie: CL14',306),(81,'Pamięć Corsair Vengeance LPX, DDR4 (CMK16GX4M2B3000C15)','pamiec_ram','x','x','Pojemność: 16GB \nCzęstotliwość pracy [MHz]: 3000 \nOpóźnienie: CL15',552),(82,'Pamięć G.Skill Ripjaws V, DDR4 (F4-3200C16D-32GVKA)','pamiec_ram','x','x','Pojemność: 32GB \nCzęstotliwość pracy [MHz]: 3200 \nOpóźnienie: CL16',1925),(83,'Pamięć G.Skill Trident Z RGB, DDR4 (F4-3733C17Q2-64GTZR)','pamiec_ram','x','x','Pojemność: 64GB \nCzęstotliwość pracy [MHz]: 3733 \nOpóźnienie: CL17',5043),(90,'Zasilacz SilentiumPC Vero L2 600W','zasilacze','x','x','Moc[W]: 600 \nCertyfikat sprawności: 80 Plus Bronze \nModularne okablowanie: Nie',209),(91,'Zasilacz Corsair RMx Series RM650x 650W, 80 PLUS Gold, modularny, 140mm','zasilacze','x','x','Moc[W]: 650 \nCertyfikat sprawności: 80 PLUS Gold \nModularne okablowanie: W pełni modularny',455),(92,'Zasilacz be quiet! Dark Power Pro P11 850W','zasilacze','x','x','Moc[W]: 850 \nCertyfikat sprawności: 80 PLUS Platinum \nModularne okablowanie: Pół modularny',818),(93,'Zasilacz Thermaltake Toughpower iRGB PLUS 1250W (PS-TPI-1250DPCTEU-T)','zasilacze','x','x','Moc[W]: 1250 \nCertyfikat sprawności: 80 Plus Titanium \nModularne okablowanie: W pełni modularny',1361),(100,'Obudowa SilentiumPC Regnum RG2 Pure Black','obudowy','x','x','Kompatybilność: Mini ATX, Mini ITX, ATX, Micro ATX (uATX) \nTyp obudowy: Midi Tower \nZłącza USB: USB 3.0 x2',129),(101,'Obudowa Nzxt H500 okno, biały (CA-H500B-W1)','obudowy','x','x','Kompatybilność: Mini ITX, ATX, Micro-ATX/Mini-ITX \nTyp obudowy: Midi Tower \nZłącza USB: USB 3.0 x2',405),(102,'Obudowa IN WIN 301, zasilacz 450W, czarny (301PSU BLACK)','obudowy','x','x','Kompatybilność: Mini ITX, Micro ATX (uATX) \nTyp obudowy: Mini Tower \nZłącza USB: USB 3.0 x2',561),(103,'Obudowa IN WIN 909 (909 BLACK)','obudowy','x','x','Kompatybilność: Mini ITX,ATX, Micro ATX (uATX), Extended ATX (e-ATX) \nTyp obudowy: Full Tower \nZłącza USB: USB 3.0 x3',1831),(110,'Dysk Toshiba P300 (HDWD120UZSVA)','dyski_ssd','x','x','Pamięć podręczna: 64MB \nPojemność dysku: 2TB \nFormat dysku: 3.5\"',265),(111,'Dysk Seagate FireCuda 2.5\" 2TB (ST2000LX001)','dyski_ssd','x','x','Pamięć podręczna: 128MB \nPojemność dysku: 2TB \nFormat dysku: 2.5\"',414),(112,'Dysk SSD Samsung 860 PRO 512GB SATA3 (MZ-76P512B/EU)','dyski_ssd','x','x','Pamięć podręczna: b.d. \nPojemność dysku: 512GB \nFormat dysku: 2.5\"',789),(113,'Dysk SSD Plextor M8SeY Series 1TB, PCIe 3.0 x4 NVMe (PX-1TM8SeY)','dyski_ssd','x','x','Pamięć podręczna: b.d. \nPojemność dysku: 1024GB \nFormat dysku: PCIe',1921),(120,'Chłodzenie CPU be quiet! Pure Rock (BK009)','chlodzenie','x','x','Gniazdo procesora: Socket 1150, Socket 1151, Socket 1155, Socket 1156, Socket 1356, Socket 2011, Socket 2011-3',138),(121,'Chłodzenie CPU be quiet! Dark Rock 4 PRO BK022','chlodzenie','x','x','Gniazdo procesora: Socket 1150, Socket 1151, Socket 1155, Socket 1156, Socket 1356, Socket 2011, Socket 2011-3',317),(122,'Chłodzenie wodne Corsair H150i PRO 360mm (CW-9060031-WW)','chlodzenie','x','x','Gniazdo procesora: AM2, AM2+, AM3, AM3+, FM1, FM2, FM2+, LGA2011-3, LGA1151, LGA11...',755),(123,'Chłodzenie wodne Nzxt Kraken X62 v.2 (RL-KRX62-02)','chlodzenie','x','x','Gniazdo procesora: AM2, AM2+, AM3, AM3+, FM1, FM2, FM2+, LGA2011-3, LGA1151, LGA11...',618);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('seller','customer') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'fyczana48@gmail.com','adminf','admin123','Franciszek','Czana','123456789','Betoniarka 69, 43-300 Bielsko-Biała','seller'),(2,'pomaranski@gmail.com','adminm','admin123','Maciej','Pomarański','112233445','Przysiecka 2137, 38-207 Przysieczki','seller'),(3,'kowalski@mail.com','kowal','kowal','Jakub','Kowalski','546375948','Wrocławska 22 12-345 Wrocław','customer'),(9,'tokarska@mail.com','ilona','a','Najlepszy','Klient','987654321','Nowaków 4, 34-209 Nowaków','customer');
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

-- Dump completed on 2019-01-22 12:22:36
