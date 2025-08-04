-- MySQL dump 10.13  Distrib 8.0.42, for Linux (x86_64)
--
-- Host: localhost    Database: monitor
-- ------------------------------------------------------
-- Server version	8.0.42-0ubuntu0.24.10.1

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel-cache-kategoriCounts','O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:3:{s:8:\"jaringan\";i:10;s:8:\"aplikasi\";i:3;s:13:\"infrastruktur\";i:1;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}',1754021927),('laravel-cache-statusPerKategori','O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:3:{s:8:\"jaringan\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;O:18:\"App\\Models\\Laporan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"laporans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:8:\"kategori\";s:8:\"jaringan\";s:16:\"status_pekerjaan\";s:7:\"selesai\";s:5:\"total\";i:10;}s:11:\"\0*\0original\";a:3:{s:8:\"kategori\";s:8:\"jaringan\";s:16:\"status_pekerjaan\";s:7:\"selesai\";s:5:\"total\";i:10;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:3:{s:20:\"penggunaan_perangkat\";s:7:\"boolean\";s:15:\"mulai_pekerjaan\";s:8:\"datetime\";s:17:\"selesai_pekerjaan\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:15:{i:0;s:16:\"status_pekerjaan\";i:1;s:15:\"mulai_pekerjaan\";i:2;s:17:\"selesai_pekerjaan\";i:3;s:9:\"deskripsi\";i:4;s:12:\"bukti_dukung\";i:5;s:9:\"bukti_url\";i:6;s:6:\"opd_id\";i:7;s:9:\"lokasi_id\";i:8;s:8:\"kategori\";i:9;s:16:\"analisis_masalah\";i:10;s:6:\"solusi\";i:11;s:20:\"penggunaan_perangkat\";i:12;s:9:\"perangkat\";i:13;s:16:\"status_perangkat\";i:14;s:10:\"created_by\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:8:\"aplikasi\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;O:18:\"App\\Models\\Laporan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"laporans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:8:\"kategori\";s:8:\"aplikasi\";s:16:\"status_pekerjaan\";s:7:\"selesai\";s:5:\"total\";i:3;}s:11:\"\0*\0original\";a:3:{s:8:\"kategori\";s:8:\"aplikasi\";s:16:\"status_pekerjaan\";s:7:\"selesai\";s:5:\"total\";i:3;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:3:{s:20:\"penggunaan_perangkat\";s:7:\"boolean\";s:15:\"mulai_pekerjaan\";s:8:\"datetime\";s:17:\"selesai_pekerjaan\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:15:{i:0;s:16:\"status_pekerjaan\";i:1;s:15:\"mulai_pekerjaan\";i:2;s:17:\"selesai_pekerjaan\";i:3;s:9:\"deskripsi\";i:4;s:12:\"bukti_dukung\";i:5;s:9:\"bukti_url\";i:6;s:6:\"opd_id\";i:7;s:9:\"lokasi_id\";i:8;s:8:\"kategori\";i:9;s:16:\"analisis_masalah\";i:10;s:6:\"solusi\";i:11;s:20:\"penggunaan_perangkat\";i:12;s:9:\"perangkat\";i:13;s:16:\"status_perangkat\";i:14;s:10:\"created_by\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:13:\"infrastruktur\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;O:18:\"App\\Models\\Laporan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"laporans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:8:\"kategori\";s:13:\"infrastruktur\";s:16:\"status_pekerjaan\";s:7:\"selesai\";s:5:\"total\";i:1;}s:11:\"\0*\0original\";a:3:{s:8:\"kategori\";s:13:\"infrastruktur\";s:16:\"status_pekerjaan\";s:7:\"selesai\";s:5:\"total\";i:1;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:3:{s:20:\"penggunaan_perangkat\";s:7:\"boolean\";s:15:\"mulai_pekerjaan\";s:8:\"datetime\";s:17:\"selesai_pekerjaan\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:15:{i:0;s:16:\"status_pekerjaan\";i:1;s:15:\"mulai_pekerjaan\";i:2;s:17:\"selesai_pekerjaan\";i:3;s:9:\"deskripsi\";i:4;s:12:\"bukti_dukung\";i:5;s:9:\"bukti_url\";i:6;s:6:\"opd_id\";i:7;s:9:\"lokasi_id\";i:8;s:8:\"kategori\";i:9;s:16:\"analisis_masalah\";i:10;s:6:\"solusi\";i:11;s:20:\"penggunaan_perangkat\";i:12;s:9:\"perangkat\";i:13;s:16:\"status_perangkat\";i:14;s:10:\"created_by\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}',1754021927);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kolaborators`
--

DROP TABLE IF EXISTS `kolaborators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kolaborators` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kolaborators`
--

LOCK TABLES `kolaborators` WRITE;
/*!40000 ALTER TABLE `kolaborators` DISABLE KEYS */;
INSERT INTO `kolaborators` VALUES (1,'PT MEDIA CEPAT INDONESIA','Vendor Penyedia Internet','+62 88',NULL,NULL),(2,'PT SUPRANET MEDIA VISINDO','Vendor Maintenance Jaringan Fiber Optik','+62 89',NULL,NULL);
/*!40000 ALTER TABLE `kolaborators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laporan_kolaborator`
--

DROP TABLE IF EXISTS `laporan_kolaborator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laporan_kolaborator` (
  `laporan_id` bigint unsigned NOT NULL,
  `kolaborator_id` bigint unsigned NOT NULL,
  KEY `laporan_kolaborator_laporan_id_foreign` (`laporan_id`),
  KEY `laporan_kolaborator_kolaborator_id_foreign` (`kolaborator_id`),
  CONSTRAINT `laporan_kolaborator_kolaborator_id_foreign` FOREIGN KEY (`kolaborator_id`) REFERENCES `kolaborators` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laporan_kolaborator_laporan_id_foreign` FOREIGN KEY (`laporan_id`) REFERENCES `laporans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan_kolaborator`
--

LOCK TABLES `laporan_kolaborator` WRITE;
/*!40000 ALTER TABLE `laporan_kolaborator` DISABLE KEYS */;
INSERT INTO `laporan_kolaborator` VALUES (10,1),(11,1),(12,1),(13,1),(14,1),(14,2),(15,1),(16,1),(17,1),(17,2),(18,1),(19,1),(20,1),(21,1);
/*!40000 ALTER TABLE `laporan_kolaborator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laporan_pic`
--

DROP TABLE IF EXISTS `laporan_pic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laporan_pic` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `laporan_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `laporan_pic_laporan_id_foreign` (`laporan_id`),
  KEY `laporan_pic_user_id_foreign` (`user_id`),
  CONSTRAINT `laporan_pic_laporan_id_foreign` FOREIGN KEY (`laporan_id`) REFERENCES `laporans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laporan_pic_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan_pic`
--

LOCK TABLES `laporan_pic` WRITE;
/*!40000 ALTER TABLE `laporan_pic` DISABLE KEYS */;
INSERT INTO `laporan_pic` VALUES (3,4,1),(4,4,2),(5,5,1),(6,5,2),(10,7,2),(11,7,3),(12,8,2),(13,8,3),(14,3,1),(15,3,2),(16,9,1),(17,9,2),(18,6,1),(19,10,1),(20,10,2),(21,11,1),(22,11,2),(23,11,3),(24,12,1),(25,12,2),(26,12,3),(27,13,1),(28,13,2),(29,13,3),(30,14,1),(31,14,2),(32,14,3),(33,15,1),(34,15,2),(35,15,3),(36,16,1),(37,16,2),(38,16,3),(39,17,1),(40,17,2),(41,17,3),(42,18,1),(43,18,2),(44,18,3),(45,19,1),(46,19,2),(47,19,3),(48,20,1),(49,20,2),(50,20,3),(51,21,1),(52,21,2),(53,21,3);
/*!40000 ALTER TABLE `laporan_pic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laporans`
--

DROP TABLE IF EXISTS `laporans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laporans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status_pekerjaan` enum('belum','proses','selesai','tertunda') COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai_pekerjaan` datetime NOT NULL,
  `selesai_pekerjaan` datetime DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_dukung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opd_id` bigint unsigned NOT NULL,
  `lokasi_id` bigint unsigned NOT NULL,
  `kategori` enum('aplikasi','infrastruktur','jaringan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `analisis_masalah` text COLLATE utf8mb4_unicode_ci,
  `solusi` text COLLATE utf8mb4_unicode_ci,
  `penggunaan_perangkat` tinyint(1) NOT NULL DEFAULT '0',
  `perangkat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_perangkat` enum('baru','bekas') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laporans_opd_id_foreign` (`opd_id`),
  KEY `laporans_lokasi_id_foreign` (`lokasi_id`),
  KEY `laporans_created_by_foreign` (`created_by`),
  CONSTRAINT `laporans_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laporans_lokasi_id_foreign` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laporans_opd_id_foreign` FOREIGN KEY (`opd_id`) REFERENCES `opds` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporans`
--

LOCK TABLES `laporans` WRITE;
/*!40000 ALTER TABLE `laporans` DISABLE KEYS */;
INSERT INTO `laporans` VALUES (2,'selesai','2025-07-29 17:00:00',NULL,'Jaringan di SETDA mati',NULL,NULL,7,7,'jaringan','Mau ke lapangan dulu',NULL,0,NULL,NULL,1,'2025-07-28 21:41:11','2025-07-29 20:42:59'),(3,'selesai','2025-07-29 17:00:00',NULL,'Jaringan di SETDA mati',NULL,NULL,7,7,'jaringan','Mau ke lapangan dulu','Ganti Perangkat',1,'HTB','baru',1,'2025-07-28 21:45:27','2025-07-29 20:46:08'),(4,'selesai','2025-07-01 19:20:00','2025-07-10 10:35:00','Perbaikan Mikrotik di DISDUKCAPIL',NULL,NULL,2,3,'jaringan','Internet putus','ganti perangkat baru',1,'Mikrotik RB 2011','baru',1,'2025-07-29 00:15:13','2025-07-29 00:15:13'),(5,'selesai','2025-07-29 23:00:00','2025-07-30 05:00:00','Kabel Putus di depan dishub',NULL,NULL,1,3,'jaringan','kena trabasan','sambung lagi',1,'kabel dropcore','bekas',1,'2025-07-29 00:17:43','2025-07-30 02:55:55'),(6,'selesai','2025-07-27 10:30:00','2025-07-28 13:35:00','Buat Modul Login','bukti_dukung/lA9MyPxBT7gmNhKSwlVxSK4NSZsSW8dJA95jzjgC.png',NULL,2,3,'aplikasi','User Request','Dibikinkan',0,NULL,NULL,1,'2025-07-29 00:25:03','2025-07-29 20:40:59'),(7,'selesai','2025-07-30 09:00:00','2025-07-30 22:00:00','Fasilitasi Zoom di SETDA','bukti_dukung/KNV6VV56G1qtCR2sN0qYb0OxZZqkelVzBbuaXJHd.png','https://www.google.com',2,2,'infrastruktur','-','-',0,NULL,NULL,1,'2025-07-29 19:34:10','2025-07-29 19:34:10'),(8,'selesai','2025-07-30 21:00:00','2025-07-30 22:00:00','Fasilitasi Zoom di SETDA','bukti_dukung/b8CX9JLGoRfY9SQSwZEOKm4uUs61UtFEJJujc3u5.png',NULL,2,2,'aplikasi',NULL,NULL,0,NULL,NULL,1,'2025-07-29 19:35:45','2025-07-29 19:35:45'),(9,'selesai','2025-07-30 22:45:00','2025-07-30 23:05:00','Jaringan Fiber Optik Putus di Depan SPBU Damalang','images/kGhKipd68k8RFLY1Mt6CD7huFM5ymmQrgpa57f0R.png',NULL,3,6,'jaringan','Putus Tertabrak Kendaraan','Disambung',1,'Kabel Fiber Optik','baru',1,'2025-07-29 20:49:11','2025-07-30 03:01:42'),(10,'selesai','2025-07-30 12:00:00','2025-07-30 13:20:00','Test','bukti_dukung/TLILEK04ep77UlEltp9fsBLgQsfX1DVyR4gZyVHC.png',NULL,2,2,'jaringan','test','test',1,'HTB','baru',1,'2025-07-29 21:58:55','2025-07-31 00:59:54'),(11,'selesai','2025-07-30 12:00:00','2025-07-30 13:05:00','test','bukti_dukung/8DIsKkR61cH8JzAprNyeVsyA6D4W1Lo0JhQJqy4l.png',NULL,2,3,'jaringan','test','test',1,'test','baru',1,'2025-07-29 23:14:59','2025-07-31 00:59:16'),(12,'selesai','2025-07-30 13:35:00','2025-07-30 14:05:00','lorem','images/kvL0S3hQeBamBCMqzyHFonlhXVBK6sTwZPIREm3G.png',NULL,2,2,'jaringan','lorem','lorem',1,'lorem','baru',1,'2025-07-29 23:54:56','2025-07-30 03:00:07'),(13,'selesai','2025-07-30 13:35:00','2025-07-30 14:20:00','lorem','bukti_dukung/vJ0IoIjpbseFSu6vZmywGIz4iv1VuKBpzzxjS0KO.png',NULL,2,2,'jaringan','lorem','lorem',1,'lorem','baru',1,'2025-07-29 23:57:33','2025-07-30 02:55:28'),(14,'selesai','2025-07-30 02:45:00','2025-07-30 15:05:00','Lorem ipsum','bukti_dukung/2WlbOOg69MOm3FwrDNQJfud2nR96bOsbq8zDHReX.png',NULL,2,3,'jaringan','lorem ipsum','lorem ipsum',1,'lorem ipsum','bekas',1,'2025-07-30 00:40:41','2025-07-30 02:54:56'),(15,'selesai','2025-07-30 15:05:00','2025-07-30 15:10:00','a','bukti_dukung/uVRZZRtdRG63vN6MBr1tLwSdZeLhfxefDFkloAqC.png',NULL,1,1,'aplikasi','a','a',1,'a','bekas',1,'2025-07-30 01:13:42','2025-07-30 01:13:42'),(16,'selesai','2025-08-01 08:00:00','2025-08-01 16:00:00','Lorem','bukti_dukung/8fJsRYSbtGVrBCsXvn6HYMFFTNgtQhjxFwVIZFzz.png',NULL,1,1,'aplikasi','Lorem','Lorem',1,'Lorem','baru',1,'2025-08-01 02:03:50','2025-08-01 02:03:50'),(17,'selesai','2025-08-04 08:00:00','2025-08-04 09:05:00','Lorem Ipsum','bukti_dukung/P9rGgh6C7NwxXkKIiV8nnwEH5Lfv4TNpkK7NdO3f.pdf',NULL,2,2,'infrastruktur','Lorem Ipsum','Lorem Ipsum',1,'Lorem Ipsum','baru',1,'2025-08-03 21:03:11','2025-08-03 21:03:11'),(18,'selesai','2025-08-04 10:00:00','2025-08-04 11:00:00','Testing','bukti_dukung/BnetThNs0kMP2jhBb8XypT0vV0SJCdFNRNWitAiP.pdf',NULL,1,1,'aplikasi','Bug','Bug',1,'Bug','baru',1,'2025-08-03 21:07:48','2025-08-03 21:07:48'),(19,'selesai','2025-08-04 10:05:00','2025-08-04 11:05:00','Test bug fix','bukti_dukung/93LnjabMLAK9iFKxAI1FR3OzbkK07FSwGwZENr8K.pdf',NULL,1,1,'aplikasi','test bug fix','test bug fix',1,'fix','baru',1,'2025-08-03 21:24:50','2025-08-03 21:24:50'),(20,'selesai','2025-08-04 09:00:00','2025-08-04 10:00:00','Test Bug Fix 2 ganti .env','bukti_dukung/REVVleVaIiUkUe5sEXnWvSGxFgvakNrNGaJRE56D.jpg',NULL,1,1,'aplikasi','bf2','bf2',1,'fix','baru',1,'2025-08-03 21:27:53','2025-08-03 21:27:53'),(21,'selesai','2025-08-01 13:00:00','2025-08-01 15:00:00','test bugfix 3','bukti_dukung/hI7TYymxfCgJ1nOuvpWFT6UbwqaG6M6EBZkvkM6Z.jpg',NULL,1,7,'aplikasi','test bf3','test bf3',1,'fix','baru',1,'2025-08-03 21:33:43','2025-08-03 21:33:43');
/*!40000 ALTER TABLE `laporans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lokasis`
--

DROP TABLE IF EXISTS `lokasis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lokasis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `koordinat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opd_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lokasis_opd_id_foreign` (`opd_id`),
  CONSTRAINT `lokasis_opd_id_foreign` FOREIGN KEY (`opd_id`) REFERENCES `opds` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lokasis`
--

LOCK TABLES `lokasis` WRITE;
/*!40000 ALTER TABLE `lokasis` DISABLE KEYS */;
INSERT INTO `lokasis` VALUES (1,'Bidang Informatika','Jalan Sindoro No. 36',NULL,1,'2025-07-28 04:48:37','2025-07-28 04:48:37'),(2,'Ruang Sekretariat','Jl. Jend.  Sudirman',NULL,2,'2025-07-28 04:55:50','2025-07-28 04:55:50'),(3,'UPT Perbaikan Perahu','Jl. Sutera',NULL,5,'2025-07-28 04:57:35','2025-07-28 04:57:35'),(4,'UPT Penyebrangan Kereta Api','Jl. Sindoro',NULL,6,'2025-07-28 04:59:10','2025-07-28 04:59:10'),(5,'UPT PUSKESMAS Jeruk Legi','Jl. Wangon',NULL,4,'2025-07-28 05:01:53','2025-07-28 05:01:53'),(6,'UPT Pembenihan','Jeruk Legi',NULL,5,'2025-07-28 05:04:20','2025-07-28 05:04:20'),(7,'Sekretariat','Jl. Sindoro',NULL,1,'2025-07-28 05:07:03','2025-07-28 05:07:03');
/*!40000 ALTER TABLE `lokasis` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_07_28_061429_laporans_table',2),(6,'2025_07_30_031003_create_laporan_kolaborator_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opds`
--

DROP TABLE IF EXISTS `opds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `opds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opds`
--

LOCK TABLES `opds` WRITE;
/*!40000 ALTER TABLE `opds` DISABLE KEYS */;
INSERT INTO `opds` VALUES (1,'Dinas Komunikasi dan Informatika Kabupaten Cilacap','36','2025-07-28 03:44:28','2025-07-28 03:44:28'),(2,'Kecamatan Nusawungu','99','2025-07-28 04:20:12','2025-07-28 04:20:12'),(3,'Kecamatan Nusawungu','99','2025-07-28 04:20:12','2025-07-28 04:20:12'),(4,'Dinas Kesehatan','89','2025-07-28 04:24:18','2025-07-28 04:24:18'),(5,'Dinas Perikanan','78','2025-07-28 04:26:05','2025-07-28 04:26:05'),(6,'Dinas Perhubungan','88','2025-07-28 04:44:33','2025-07-28 04:44:33'),(7,'Dinas Pertanahan','33','2025-07-28 04:47:19','2025-07-28 04:47:19');
/*!40000 ALTER TABLE `opds` ENABLE KEYS */;
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
INSERT INTO `sessions` VALUES ('jZCV2ZqQgjnJY8ajbJLo6r7g2bLgjcpwakr9HEzr',NULL,'172.19.224.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoicHVjS3hMUFhqRkl1TWNsVlB6c1h1RHhTWEh3V1FqbnJhT3hnQUdYbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xNzIuMTkuMjI1LjI1NDo4MDAwL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1754282492);
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Doni','mailbox.doni@gmail.com',NULL,'12345',NULL,NULL,NULL),(2,'Langgeng','mailbox.langgeng@gmail.com',NULL,'12345',NULL,NULL,NULL),(3,'Fauzi','mailbox.fauzi@gmail.com',NULL,'12345',NULL,NULL,NULL);
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

-- Dump completed on 2025-08-04 13:58:28
