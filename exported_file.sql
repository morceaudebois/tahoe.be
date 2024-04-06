-- MySQL dump 10.13  Distrib 8.1.0, for macos12.6 (arm64)
--
-- Host: localhost    Database: tahoe.be
-- ------------------------------------------------------
-- Server version	8.1.0

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

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Browser extension','browser_extension',NULL,NULL),(2,'Web app','web_app',NULL,NULL),(3,'Minecraft mod','minecraft_mod',NULL,NULL),(4,'Blog post','blog_post',NULL,NULL),(5,'WordPress extension','wordpress_extension',NULL,NULL),(6,'Client work','client_work',NULL,NULL),(7,'Graphic design','graphic_design',NULL,NULL),(8,'Real life','real_life',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2024_02_17_132739_create_sessions_table',1),(7,'2024_03_03_103000_create_categories_table',1),(8,'2024_03_03_104829_create_posts_table',1),(9,'2024_03_05_164309_create_photos_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `photos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `likes` int DEFAULT NULL,
  `date` date NOT NULL DEFAULT '2024-03-17',
  `draft` tinyint(1) NOT NULL DEFAULT '1',
  `cope` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (2,'rezrezrez','4UetdmIR','thumbnails/RMaN0Ndwzgd4wiJGzsckQABldsDU7CO7Jqpyq2MT.png','2000','1000','rr',2,'2024-03-17',0,1,'2024-03-17 17:14:48','2024-03-18 12:19:14'),(3,'eee','Wt3iRNip','thumbnails/6fhddWmX5HJlcpCjxXflgFQXuydS01whPxFhV9Jc.png','1680','1050',NULL,NULL,'2024-03-18',0,0,'2024-03-18 12:10:09','2024-03-18 12:10:09');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL DEFAULT '2024-03-17',
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_url` text COLLATE utf8mb4_unicode_ci,
  `likes` int DEFAULT NULL,
  `draft` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (5,'Bonjourr Startpage','bonjourr',1,'2019|collab|design','<div>Bonjourr is a browser extension that replaces your new start page by one more modern, more customisable and more minimalist than the default one. We started the project back in 2019 with <a href=\"https://victr.me\">Victor Azevedo</a> and we’ve been working on it ever since, adding new features and improving it update after update.</div><div><br>These days I’m mostly handling the communication aspect of it, while Victor deals with most of the coding.<br><br>It was recently selected as one of <a href=\"https://blog.google/products/chrome/favorite-google-chrome-extensions-2023/\">Chrome’s favorite extensions</a> of 2023. Bonjourr is our most successful project and we’re really proud of it!&nbsp;</div>','2019-03-17','thumbnails/rtifw1HwOCFd2fuVimMhdhB1z1HEzYdmUlf5FqJq.png','https://github.com/victrme/Bonjourr/issues','iOS inspired browser Startpage','https://bonjourr.fr',1,0,'2024-03-17 17:18:57','2024-03-20 15:32:19'),(6,'Is this a new website?','site-v6',4,'2024|design|laravel','<div><strong>Welcome to my new website!</strong> I hope you like it here. I’ve had a lot of fun making it, both in terms of visual experimentation and coding.<br><br>I love working with textures and skeuomorphic-ish ideas in my web designs, and this might be the most textury site I’ve made yet. From the film grain to the vignette effect and glass animations, you can almost feel it when looking at it 👀<br><br>It was made using Laravel and you can find all the source code <a href=\"https://github.com/morceaudebois/tahoe.be\">here</a>. Please drop a few likes on the posts so that I can see which of my projects interests you the most!</div>','2024-03-17','thumbnails/P6iy3rHf3XnHA0VR0meodSQLbG5cmXJOztqVpepH.jpg',NULL,'It sure is! Take a look around and drop a few likes 🔥',NULL,2,0,'2024-03-17 17:23:09','2024-03-20 15:28:35'),(7,'L\'Arbrerie','arbrerie',8,'2015|hardware|woocommerce','<div><em>L’Arbrerie</em> was a project I did with my dad back in 2015. We used to create charging docks for mobile devices that you\'d put on your desk or beside your bed.<br><br>This project is not active anymore but I like to keep it online for archival purposes. I think most of the website and photography have aged pretty well and it’s cool to look back to it!&nbsp;</div>','2015-03-17','thumbnails/4kd1OGSCeopeQZRasYnEgCyvz07qH5t1tZ7v0MVx.webp',NULL,'Wooden charging docks for mobile devices','https://arbrerie.fr/',NULL,0,'2024-03-17 17:25:55','2024-03-20 15:34:03'),(8,'A bunch of Telegram icons','telegram-icons',7,'2019|design|telegram','<div>I was inspired to make these for fun a few years ago as I thought the choice of default Telegram icons was a bit limited.<br><br>I <a href=\"https://www.reddit.com/r/Telegram/comments/cfo5cp/i_thought_the_given_choice_of_icons_in_telegram/\">posted them on Reddit</a> for people to use and the post is still relatively popular, so I\'m keeping <a href=\"https://download.tahoe.be/telegram-icons.zip\">the download link</a> up.</div>','2019-03-17','thumbnails/m2uWpHmIb2PgBHH2i1Gnq6GFdPKZEry7WIEAA324.jpg',NULL,'Pack of custom Telegram icons','https://download.tahoe.be/telegram-icons.zip',NULL,0,'2024-03-17 17:35:04','2024-03-20 15:40:27'),(9,'Instanon','instanon',1,'2020|instagram|privacy','<div>Instanon was a Chrome extension that allowed you to browse the web version of Instagram without logging in. It worked for a few months before Instagram made some server side changes making it impossible for Instanon or any other similar tool to function.</div>','2020-03-17','thumbnails/FhDn2SHw4Gn5rOI9wIgeq8igzbcaCznaacLNPQgi.jpg',NULL,'Use Instagram without logging in','https://github.com/morceaudebois/instanon',NULL,0,'2024-03-17 17:36:36','2024-03-20 15:43:32'),(11,'Minus for Unsplash','minus-for-unsplash',1,'2022|unsplash|minimalism','<div>In 2022, Unsplash introduced <a href=\"https://unsplash.com/plus\">Unsplash+</a>, a paid plan that added a bunch of paid photos to their site. As a heavy user of Unsplash (mostly for the selection of <a href=\"https://tahoe.be/post/bonjourr\">Bonjourr</a>\'s background collections), I quickly got annoyed by all that bloat and had to do something about it.</div><div><br>I figured I wouldn’t be the only one and I made Minus for Unsplash to get rid of it all and browse Unsplash the way it used to be.</div>','2022-12-17','thumbnails/2nD59xKdADWyO4rREqtwExLcmHXil4eaz6SPc2QV.png',NULL,'Get rid of Unsplash+, Unsplashs\' paid plan','https://github.com/morceaudebois/minus-for-unsplash',1,0,'2024-03-17 17:45:27','2024-03-20 15:50:30'),(12,'My Favorite Dogs','myfavoritedogs',2,'2022|dogs|php','<div><a href=\"https://myfavoritedogs.tahoe.be/\">My Favorite Dogs</a> is a web app that allows you to make a selection of your favorite dog breeds and share it with your friends. The project has an emphasis on quality photography and UI to represent the dogs as best as possible.<br><br>It uses some of my own photos as well as some royalty-free ones I’ve found here and there. I would love it if it had user submitted photos, so if you think you haves some that would <a href=\"https://github.com/morceaudebois/myfavoritedogs?tab=readme-ov-file#-photos\">fit the bill</a>, please go ahead and get in touch!&nbsp;</div>','2022-08-17','thumbnails/lE8yfi16bH9Jx6oNhB0LJEz8tfvppioLCkXswPmw.png','https://github.com/morceaudebois/myfavoritedogs','Select your favorite dog breeds and share them with your friends','https://myfavoritedogs.tahoe.be',NULL,0,'2024-03-17 17:53:13','2024-03-20 15:53:12'),(13,'Debrandify','debrandify',5,'2023|wordpress|minimalism','<div><a href=\"https://wordpress.org/plugins/debrandify/\">Debrandify</a> (formerly DeWordPressify) is a toolkit plugin that adds plenty of settings to customise and improve WordPress. You\'ll be able to remove WordPress\' branding and replace it with your own as well as get rid of some of the bloat that comes built-in.<br><br>Having been a heavy WordPress user for 15 years, I’ve always complained about how bad most of the plugins are (as one does). I wanted to prove that it is indeed possible to make a WordPress plugin that is well documented, not terribly bloated, easy to use and feels relatively modern.<br><br>I think I’ve achieved my goal and am pretty proud of the result, but I can’t say this was a nice experience. I don’t intend to develop for WordPress again apart from keeping Debrandify updated and add a few features here and there if requested.</div>','2023-01-17','thumbnails/0mxm98jmvYy1zsh6zOBypb2CELifqqw9vnY1suaP.png','https://github.com/morceaudebois/debrandify','Customise and improve WordPress by removing its branding','https://wordpress.org/plugins/debrandify/',2,0,'2024-03-17 17:56:19','2024-03-20 15:54:36'),(14,'pourcentag.es','pourcentages',2,'2020|design|math','<div>I’ve always been rubbish at math. And considering how bad the <a href=\"https://calculerpourcentage.fr/\">first Google results</a> are when you search for percentage calculators in French, I figured there was a cool project hiding in plain sight!</div><div><br>By using natural language, I’ve made <a href=\"https://pourcentag.es/\">pourcentag.es</a> to be as easy to use as possible. Just type in your numbers and you\'ll instantly get a result.<br><br>I think this is one of my favourite things I\'ve made in terms of UI/UX. I did this project back when <a href=\"https://dribbble.com/tags/neomorphism\">neumorphism</a> was pretty new but it still looks good.</div>','2020-04-17','thumbnails/DveHVGIcwlOOYm2HKFpcV3owUkWZWNpPSzm7oEgD.png','https://github.com/morceaudebois/pourcentag.es','Natural language percentage calculator','https://pourcentag.es',1,0,'2024-03-17 17:58:05','2024-03-20 15:57:31'),(15,'Apollo the Parrot','apollo',3,'2023|meme|minecraft','<div>This is a silly little mod that brings TikTok and YouTube star Apollo the Parrot to Minecraft. With it installed, you\'ll start hearing parrots banter just like Apollo does. This includes his iconic \"glassk\", \"SUCK\", \"it\'s a bowl\" and more!<br><br>I also created a new African grey parrot texture variant that looks just like Apollo 🦜<br><br>This is my first Minecraft mod and it took me way more time than I’d dare to admit, but I’m glad I did it and will do my best to keep it updated and maybe add new features if people are interested. 🤗</div>','2023-09-17','thumbnails/rPD8c4PFzlKDIt9vLEqgXgTSlQpnEAmYUbhoiozk.jpg','https://github.com/morceaudebois/apollo_parrot','Adding YouTube star Apollo the Parrot to Minecraft 🦜','https://modrinth.com/mod/apollo-the-parrot',1,0,'2024-03-17 18:03:41','2024-03-20 15:59:04'),(16,'Calvishop','calvishop',6,'2021|website|woocommerce','<div><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/png&quot;,&quot;filename&quot;:&quot;Screenshot 2024-02-04 at 18.13.57 (2).png&quot;,&quot;filesize&quot;:2427483,&quot;height&quot;:1050,&quot;href&quot;:&quot;http://127.0.0.1:8000/storage/post-body/1710766989-Screenshot 2024-02-04 at 18.13.57 (2).png&quot;,&quot;url&quot;:&quot;http://127.0.0.1:8000/storage/post-body/1710766989-Screenshot 2024-02-04 at 18.13.57 (2).png&quot;,&quot;width&quot;:1680}\" data-trix-content-type=\"image/png\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--png\"><a href=\"http://127.0.0.1:8000/storage/post-body/1710766989-Screenshot 2024-02-04 at 18.13.57 (2).png\"><img src=\"http://127.0.0.1:8000/storage/post-body/1710766989-Screenshot 2024-02-04 at 18.13.57 (2).png\" width=\"1680\" height=\"1050\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">Screenshot 2024-02-04 at 18.13.57 (2).png</span> <span class=\"attachment__size\">2.32 MB</span></figcaption></a></figure>Made this e-commerce website for a small local boutique back in 2021. It’s the first WordPress theme I made from scratch and I went for a retro gaming aesthetic. Was pretty pleased with how it t<br>urned out 🕹<figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/jpeg&quot;,&quot;filename&quot;:&quot;dog.jpg&quot;,&quot;filesize&quot;:649432,&quot;height&quot;:1920,&quot;href&quot;:&quot;http://127.0.0.1:8000/storage/post-body/1710766743-dog.jpg&quot;,&quot;url&quot;:&quot;http://127.0.0.1:8000/storage/post-body/1710766743-dog.jpg&quot;,&quot;width&quot;:1358}\" data-trix-content-type=\"image/jpeg\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--jpg\"><a href=\"http://127.0.0.1:8000/storage/post-body/1710766743-dog.jpg\"><img src=\"http://127.0.0.1:8000/storage/post-body/1710766743-dog.jpg\" width=\"1358\" height=\"1920\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">dog.jpg</span> <span class=\"attachment__size\">634.21 KB</span></figcaption></a></figure><br><br>(Website isn’t online anymore so I had to pull it back from my archives for the screenshots, pardon the demo content and bugs!)<br><br><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/jpeg&quot;,&quot;filename&quot;:&quot;dog.jpg&quot;,&quot;filesize&quot;:649432,&quot;height&quot;:1920,&quot;href&quot;:&quot;http://127.0.0.1:8000/storage/images/1710765617-dog.jpg&quot;,&quot;url&quot;:&quot;http://127.0.0.1:8000/storage/images/1710765617-dog.jpg&quot;,&quot;width&quot;:1358}\" data-trix-content-type=\"image/jpeg\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--jpg\"><a href=\"http://127.0.0.1:8000/storage/images/1710765617-dog.jpg\"><img src=\"http://127.0.0.1:8000/storage/images/1710765617-dog.jpg\" width=\"1358\" height=\"1920\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">dog.jpg</span> <span class=\"attachment__size\">634.21 KB</span></figcaption></a></figure><br><br></div>','2021-03-17','thumbnails/INYCUGsd9rg7EFwdeQ7hd7nmGtfWthDpIIYAY9Q3.png',NULL,'E-commerce website for a retrogaming shop',NULL,1,0,'2024-03-17 18:05:17','2024-03-18 14:02:37'),(17,'The Tarkan sticker pack','tarkan-stickers',7,'2021|dogs|telegram','<div>Thought it’d be fun to make a Telegram stickerpack from photos of my dog. This was made before AI took over so I had to remove the background manually, the old school way 💀<br><br>I update it from time to time, me and my friends still use it to this day. <a href=\"https://t.me/addstickers/tarkanstickers\">You can</a> too, of course!&nbsp;</div>','2021-03-17','thumbnails/Qcv4htz7uuJcyufDRqVAFvBIy9lTaVKH4MgZmX8B.png',NULL,'A Telegram sticker pack made from photos of my dog, because I had to.','https://t.me/addstickers/tarkanstickers',2,0,'2024-03-17 18:08:54','2024-03-20 16:06:17');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'tahoe','mail@tahoe.be','2024-03-17 17:14:35','$2y$12$H.gGSaU6jU3LA4lVuuJo8.DNTVtWOpsRD1eru0CsHliaQ8/IRLFre',NULL,NULL,NULL,'bTYU1oEIJm',NULL,NULL,NULL,NULL);
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

-- Dump completed on 2024-03-20 18:23:55
