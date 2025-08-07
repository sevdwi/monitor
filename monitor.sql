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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan_pic`
--

LOCK TABLES `laporan_pic` WRITE;
/*!40000 ALTER TABLE `laporan_pic` DISABLE KEYS */;
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
  `kategori` enum('aplikasi','infrastruktur','jaringan','administrasi') COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporans`
--

LOCK TABLES `laporans` WRITE;
/*!40000 ALTER TABLE `laporans` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lokasis`
--

LOCK TABLES `lokasis` WRITE;
/*!40000 ALTER TABLE `lokasis` DISABLE KEYS */;
INSERT INTO `lokasis` VALUES (8,'Bidang Informasi dan Komunikasi Publik','Jl. Sindoro No. 36',NULL,1,'2025-08-05 02:45:26','2025-08-05 02:45:26'),(9,'Bidang Informatika','Jalan Sindoro No. 36',NULL,1,'2025-08-05 02:45:41','2025-08-05 02:45:41'),(10,'Bidang Statistik dan Persandian','Jl. Sindoro No. 36',NULL,1,'2025-08-05 02:46:05','2025-08-05 02:46:05'),(11,'Sekretariat','Jalan Sindoro No. 36',NULL,1,'2025-08-05 02:46:44','2025-08-05 02:46:44');
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
INSERT INTO `opds` VALUES (1,'Dinas Komunikasi dan Informatika Kabupaten Cilacap','36','2025-07-28 03:44:28','2025-07-28 03:44:28');
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
INSERT INTO `sessions` VALUES ('5nKilwfqSp4hZ0JVePPCgeHEYVLOGZhQIxjw2nNI',NULL,'172.19.224.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWEx5YWdyNEZ5dWFUQWVOVE1oTEl3YjE4MDdrRWU1MVBERFZOZkZKbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xNzIuMTkuMjI1LjI1NDo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1754563051),('VktSsd17C6D3RIUoWzLF5KoWo0rEcr3QmYu3yDpM',NULL,'172.19.224.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQjZtdWlBUzNEejY1OTBkaThDR3dhcDhqMHRMUXNaZHVidEhGREtrYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xNzIuMTkuMjI1LjI1NDo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1754563154);
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'Aan','aan@exmail.com',NULL,'$2y$12$PanDvKujSLCGIVW4SgSJ.eleoivODtmtOeW/8IAd3rkwGRE.o6JwS',NULL,'2025-08-05 02:58:55','2025-08-05 02:58:55'),(6,'Adi','adi@exmail.com',NULL,'$2y$12$LaLqwmSi.LinP5L9sXKZ6.zZbMZi.x89anry8.DEDx2xA0IOXTP/O',NULL,'2025-08-05 02:58:55','2025-08-05 02:58:55'),(7,'Anas','anas@exmail.com',NULL,'$2y$12$rHK.fCyz9G0jtW1C3MQjb.9X9L3dzHlfVaCqgqHgTYXXts0AQU2M2',NULL,'2025-08-05 02:58:55','2025-08-05 02:58:55'),(8,'Deni','deni@exmail.com',NULL,'$2y$12$Ud3Dq4PERDjvIM9MdNQFIuMiJyzEJbPxuizmFg6XK/8qdX4abdG3u',NULL,'2025-08-05 02:58:56','2025-08-05 02:58:56'),(9,'Doni','doni@exmail.com',NULL,'$2y$12$88luFdglcrLb0fgpbOr.Q.p9ZfPQG8RbYCnMoezBXCtXgULueNaqa',NULL,'2025-08-05 02:58:56','2025-08-05 02:58:56'),(10,'Edo','edo@exmail.com',NULL,'$2y$12$6syQJYNYBBIdz0yZbsNtneIQOCTiy7.48VoszdVHV843p9U/CU.ge',NULL,'2025-08-05 02:58:56','2025-08-05 02:58:56'),(11,'Rahman','rahman@exmail.com',NULL,'$2y$12$EIlH8Oww3G3z3hVAZplmgeMjbsOoktFP8X0eXZtsC4tQKqfmztekK',NULL,'2025-08-05 02:58:57','2025-08-05 02:58:57'),(12,'Ridwan','ridwan@exmail.com',NULL,'$2y$12$6DjbfudNLf9.c5Qa61TUPef7Df8V3Xldy5c5i6q4RZCRuUYNG4cZq',NULL,'2025-08-05 02:58:57','2025-08-05 02:58:57'),(13,'Rio','rio@exmail.com',NULL,'$2y$12$ZxAmpwahXsFawwKzdD6O6.uk1xNJ3tTV5qXYmikULRX.8.k9aaWLC',NULL,'2025-08-05 02:58:57','2025-08-05 02:58:57'),(14,'Sevan','sevan@exmail.com',NULL,'$2y$12$WelIsIg2Y8PhhJhH1lOWOeW8FFkjcc.XKNLWk5RCy59G/t1DHKrAS',NULL,'2025-08-05 02:58:57','2025-08-05 02:58:57'),(15,'Slamet','slamet@exmail.com',NULL,'$2y$12$XG08i2g77HMxah1k1TJfTuiW55b7bew88MycxRzaQvsIHiGVn25ZK',NULL,'2025-08-05 02:58:58','2025-08-05 02:58:58'),(16,'Taufan','taufan@exmail.com',NULL,'$2y$12$AbzaxVDXMcePca2Urx76leM.ahzuhlWqtNHFfoTWVXxqLPLEmsvwi',NULL,'2025-08-05 02:58:58','2025-08-05 02:58:58'),(17,'Wahyu','wahyu@exmail.com',NULL,'$2y$12$dazZ2iPLf8WWeO63EZQQ5.ogOvxpNMmGjaasno0j3pxqXFtb74yjq',NULL,'2025-08-05 02:58:58','2025-08-05 02:58:58'),(18,'Widya','widya@exmail.com',NULL,'$2y$12$6BlvaKrPhRIiMAIz0nQkTO5P3uSmyMyhCTpJCbJHX8kZOIRx6r1W.',NULL,'2025-08-05 02:58:59','2025-08-05 02:58:59'),(19,'Yunita','yunita@exmail.com',NULL,'$2y$12$QnCpDm8mqmxllGMIHqjbWeJhMGIEbJYJtHENuK8nxq1SfIwlE74MC',NULL,'2025-08-05 02:58:59','2025-08-05 02:58:59');
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

-- Dump completed on 2025-08-07 17:40:19
