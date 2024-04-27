-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table laravel-sarpras-app.barangs
CREATE TABLE IF NOT EXISTS `barangs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_id` bigint(20) unsigned NOT NULL,
  `pengguna_id` bigint(20) unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `barangs_jenis_id_foreign` (`jenis_id`),
  KEY `barangs_pengguna_id_foreign` (`pengguna_id`),
  CONSTRAINT `barangs_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_barangs` (`id`),
  CONSTRAINT `barangs_pengguna_id_foreign` FOREIGN KEY (`pengguna_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.barangs: ~0 rows (approximately)
/*!40000 ALTER TABLE `barangs` DISABLE KEYS */;
INSERT INTO `barangs` (`id`, `jenis_id`, `pengguna_id`, `nama`, `jumlah`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'animi', '1', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
/*!40000 ALTER TABLE `barangs` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.jabatans
CREATE TABLE IF NOT EXISTS `jabatans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.jabatans: ~4 rows (approximately)
/*!40000 ALTER TABLE `jabatans` DISABLE KEYS */;
INSERT INTO `jabatans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', '2023-12-18 14:31:04', '2023-12-18 14:31:04');
INSERT INTO `jabatans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(2, 'Verifikator', '2023-12-18 14:31:04', '2023-12-18 14:31:04');
INSERT INTO `jabatans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(3, 'Validator', '2023-12-18 14:31:04', '2023-12-18 14:31:04');
INSERT INTO `jabatans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(4, 'User', '2023-12-18 14:31:04', '2023-12-18 14:31:04');
/*!40000 ALTER TABLE `jabatans` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.jenis_barangs
CREATE TABLE IF NOT EXISTS `jenis_barangs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.jenis_barangs: ~5 rows (approximately)
/*!40000 ALTER TABLE `jenis_barangs` DISABLE KEYS */;
INSERT INTO `jenis_barangs` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'et', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `jenis_barangs` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(2, 'voluptatem', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `jenis_barangs` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(3, 'est', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `jenis_barangs` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(4, 'mollitia', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `jenis_barangs` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(5, 'voluptas', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
/*!40000 ALTER TABLE `jenis_barangs` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.jenis_kebutuhans
CREATE TABLE IF NOT EXISTS `jenis_kebutuhans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.jenis_kebutuhans: ~5 rows (approximately)
/*!40000 ALTER TABLE `jenis_kebutuhans` DISABLE KEYS */;
INSERT INTO `jenis_kebutuhans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'qui', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `jenis_kebutuhans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(2, 'voluptas', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `jenis_kebutuhans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(3, 'velit', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `jenis_kebutuhans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(4, 'corporis', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `jenis_kebutuhans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(5, 'molestiae', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
/*!40000 ALTER TABLE `jenis_kebutuhans` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.kelola_kebersihans
CREATE TABLE IF NOT EXISTS `kelola_kebersihans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_keluhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_saran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.kelola_kebersihans: ~5 rows (approximately)
/*!40000 ALTER TABLE `kelola_kebersihans` DISABLE KEYS */;
INSERT INTO `kelola_kebersihans` (`id`, `nama`, `lokasi`, `isi_keluhan`, `isi_saran`, `created_at`, `updated_at`) VALUES
	(1, 'voluptatem', 'a', 'sit', 'consectetur', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `kelola_kebersihans` (`id`, `nama`, `lokasi`, `isi_keluhan`, `isi_saran`, `created_at`, `updated_at`) VALUES
	(2, 'et', 'consequatur', 'debitis', 'et', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `kelola_kebersihans` (`id`, `nama`, `lokasi`, `isi_keluhan`, `isi_saran`, `created_at`, `updated_at`) VALUES
	(3, 'quae', 'cumque', 'eveniet', 'debitis', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `kelola_kebersihans` (`id`, `nama`, `lokasi`, `isi_keluhan`, `isi_saran`, `created_at`, `updated_at`) VALUES
	(4, 'est', 'et', 'fugit', 'officia', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `kelola_kebersihans` (`id`, `nama`, `lokasi`, `isi_keluhan`, `isi_saran`, `created_at`, `updated_at`) VALUES
	(5, 'ut', 'dignissimos', 'praesentium', 'sunt', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `kelola_kebersihans` (`id`, `nama`, `lokasi`, `isi_keluhan`, `isi_saran`, `created_at`, `updated_at`) VALUES
	(6, 'taman depan', 'kantor H1', 'agak kotor', 'di bersihkan lah', '2023-12-18 17:05:58', '2023-12-18 17:05:58');
/*!40000 ALTER TABLE `kelola_kebersihans` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.kelompoks
CREATE TABLE IF NOT EXISTS `kelompoks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.kelompoks: ~10 rows (approximately)
/*!40000 ALTER TABLE `kelompoks` DISABLE KEYS */;
INSERT INTO `kelompoks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'kelompok 9', '2023-12-18 14:31:04', '2023-12-18 14:31:04');
INSERT INTO `kelompoks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(2, 'kelompok 8', '2023-12-18 14:31:04', '2023-12-18 14:31:04');
INSERT INTO `kelompoks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(3, 'kelompok 7', '2023-12-18 14:31:04', '2023-12-18 14:31:04');
INSERT INTO `kelompoks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(4, 'kelompok 5', '2023-12-18 14:31:04', '2023-12-18 14:31:04');
INSERT INTO `kelompoks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(5, 'kelompok 4', '2023-12-18 14:31:04', '2023-12-18 14:31:04');
INSERT INTO `kelompoks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(6, 'kelompok 10', '2023-12-18 14:31:04', '2023-12-18 14:31:04');
INSERT INTO `kelompoks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(7, 'kelompok 4', '2023-12-18 14:31:04', '2023-12-18 14:31:04');
INSERT INTO `kelompoks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(8, 'kelompok 9', '2023-12-18 14:31:04', '2023-12-18 14:31:04');
INSERT INTO `kelompoks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(9, 'kelompok 9', '2023-12-18 14:31:04', '2023-12-18 14:31:04');
INSERT INTO `kelompoks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(10, 'UBAH KELOMPOK', '2023-12-18 14:31:04', '2023-12-18 17:13:22');
/*!40000 ALTER TABLE `kelompoks` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.logistiks
CREATE TABLE IF NOT EXISTS `logistiks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.logistiks: ~5 rows (approximately)
/*!40000 ALTER TABLE `logistiks` DISABLE KEYS */;
INSERT INTO `logistiks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'quisquam', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `logistiks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(2, 'sit', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `logistiks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(3, 'pariatur', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `logistiks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(4, 'nostrum', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `logistiks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(5, 'aut', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
/*!40000 ALTER TABLE `logistiks` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.migrations: ~19 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(5, '2023_12_09_041556_create_jabatans_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(6, '2023_12_09_041631_add_field_to_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(7, '2023_12_09_061012_create_mobils_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(8, '2023_12_09_063002_create_jenis_barangs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(9, '2023_12_09_063611_create_logistiks_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(10, '2023_12_09_064626_create_kelola_kebersihans_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(11, '2023_12_09_065545_create_jenis_kebutuhans_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(12, '2023_12_09_070936_create_peminjaman_mobils_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(13, '2023_12_09_074010_create_persediaan_logistiks_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(14, '2023_12_09_081647_create_penggantian_lampus_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(15, '2023_12_09_083807_create_barangs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(16, '2023_12_09_085755_create_pemeliharaan_sarpras_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(17, '2023_12_09_091128_create_pembelian_sarpras_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(18, '2023_12_14_054317_create_kelompoks_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(19, '2023_12_17_074708_add_field_to_users_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.mobils
CREATE TABLE IF NOT EXISTS `mobils` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.mobils: ~5 rows (approximately)
/*!40000 ALTER TABLE `mobils` DISABLE KEYS */;
INSERT INTO `mobils` (`id`, `nama`, `stok`, `created_at`, `updated_at`) VALUES
	(1, 'nam', 37, '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `mobils` (`id`, `nama`, `stok`, `created_at`, `updated_at`) VALUES
	(2, 'accusantium', 36, '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `mobils` (`id`, `nama`, `stok`, `created_at`, `updated_at`) VALUES
	(3, 'quia', 12, '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `mobils` (`id`, `nama`, `stok`, `created_at`, `updated_at`) VALUES
	(4, 'sed', 5, '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `mobils` (`id`, `nama`, `stok`, `created_at`, `updated_at`) VALUES
	(5, 'facilis', 35, '2023-12-18 14:31:05', '2023-12-18 14:31:05');
/*!40000 ALTER TABLE `mobils` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.password_reset_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.pembelian_sarpras
CREATE TABLE IF NOT EXISTS `pembelian_sarpras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kebutuhan` bigint(20) unsigned NOT NULL,
  `spesifikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` bigint(20) unsigned NOT NULL,
  `harga_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_katalog` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paraf_kapokja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_pembelian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pembelian_sarpras_user_id_foreign` (`user_id`),
  KEY `pembelian_sarpras_jenis_kebutuhan_foreign` (`jenis_kebutuhan`),
  CONSTRAINT `pembelian_sarpras_jenis_kebutuhan_foreign` FOREIGN KEY (`jenis_kebutuhan`) REFERENCES `jenis_kebutuhans` (`id`),
  CONSTRAINT `pembelian_sarpras_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.pembelian_sarpras: ~3 rows (approximately)
/*!40000 ALTER TABLE `pembelian_sarpras` DISABLE KEYS */;
INSERT INTO `pembelian_sarpras` (`id`, `user_id`, `nama`, `jenis_kebutuhan`, `spesifikasi`, `jumlah`, `harga_satuan`, `gambar_katalog`, `paraf_kapokja`, `gambar_pembelian`, `status`, `tanggal`, `created_at`, `updated_at`) VALUES
	(1, 1, 'molestiae', 1, 'fuga', 3, '100000', 'foto.jpg', 'foto.jpg', 'foto.jpg', 'approved', '1993-01-14', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `pembelian_sarpras` (`id`, `user_id`, `nama`, `jenis_kebutuhan`, `spesifikasi`, `jumlah`, `harga_satuan`, `gambar_katalog`, `paraf_kapokja`, `gambar_pembelian`, `status`, `tanggal`, `created_at`, `updated_at`) VALUES
	(3, 4, 'asdsad', 1, '123', 123, '123213', '1702910538_Icon_L_(set_orange).png', '1702910538_Icon_L_(set_orange).png', '1702910538_Icon_L_(set_orange).png', 'pending', '2023-12-18', '2023-12-18 14:42:18', '2023-12-18 14:42:18');
INSERT INTO `pembelian_sarpras` (`id`, `user_id`, `nama`, `jenis_kebutuhan`, `spesifikasi`, `jumlah`, `harga_satuan`, `gambar_katalog`, `paraf_kapokja`, `gambar_pembelian`, `status`, `tanggal`, `created_at`, `updated_at`) VALUES
	(4, 2, 'Server', 1, '5TB', 1, '15000000', '1702919223_Icon_L_(set_orange).png', '1702919223_jika sudah oke..ini no rekeningnya .. lama pengerjaan yang telah di sepakati  ,dan terhitung dari tanggal pembayaran ...png', '1702919223_banner youtube.png', 'approved', '2023-12-18', '2023-12-18 17:07:03', '2023-12-18 17:12:31');
/*!40000 ALTER TABLE `pembelian_sarpras` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.pemeliharaan_sarpras
CREATE TABLE IF NOT EXISTS `pemeliharaan_sarpras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `barang_id` bigint(20) unsigned NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pemeliharaan_sarpras_user_id_foreign` (`user_id`),
  KEY `pemeliharaan_sarpras_barang_id_foreign` (`barang_id`),
  CONSTRAINT `pemeliharaan_sarpras_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`),
  CONSTRAINT `pemeliharaan_sarpras_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.pemeliharaan_sarpras: ~2 rows (approximately)
/*!40000 ALTER TABLE `pemeliharaan_sarpras` DISABLE KEYS */;
INSERT INTO `pemeliharaan_sarpras` (`id`, `user_id`, `barang_id`, `jumlah`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 2, 'quasi', 'pending', '2023-12-18 14:31:05', '2023-12-18 14:51:18');
INSERT INTO `pemeliharaan_sarpras` (`id`, `user_id`, `barang_id`, `jumlah`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
	(2, 4, 1, 2, 'keterangan', 'approved', '2023-12-18 17:04:29', '2023-12-18 17:08:31');
/*!40000 ALTER TABLE `pemeliharaan_sarpras` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.peminjaman_mobils
CREATE TABLE IF NOT EXISTS `peminjaman_mobils` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `mobil_id` bigint(20) unsigned NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_pinjam` time NOT NULL,
  `jam_kembali` time NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peminjaman_mobils_user_id_foreign` (`user_id`),
  KEY `peminjaman_mobils_mobil_id_foreign` (`mobil_id`),
  CONSTRAINT `peminjaman_mobils_mobil_id_foreign` FOREIGN KEY (`mobil_id`) REFERENCES `mobils` (`id`),
  CONSTRAINT `peminjaman_mobils_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.peminjaman_mobils: ~2 rows (approximately)
/*!40000 ALTER TABLE `peminjaman_mobils` DISABLE KEYS */;
INSERT INTO `peminjaman_mobils` (`id`, `user_id`, `mobil_id`, `kegiatan`, `jam_pinjam`, `jam_kembali`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 'Et omnis magni quaerat veniam.', '07:45:00', '01:19:00', '2004-04-07', '2002-07-03', 'approved', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `peminjaman_mobils` (`id`, `user_id`, `mobil_id`, `kegiatan`, `jam_pinjam`, `jam_kembali`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `created_at`, `updated_at`) VALUES
	(2, 1, 1, 'kegiatan apa', '12:00:00', '12:00:00', '2023-12-19', '2023-12-20', 'approved', '2023-12-18 17:05:19', '2023-12-18 17:08:50');
/*!40000 ALTER TABLE `peminjaman_mobils` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.penggantian_lampus
CREATE TABLE IF NOT EXISTS `penggantian_lampus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `waktu` date NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_lampu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `watt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penggantian_lampus_user_id_foreign` (`user_id`),
  CONSTRAINT `penggantian_lampus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.penggantian_lampus: ~4 rows (approximately)
/*!40000 ALTER TABLE `penggantian_lampus` DISABLE KEYS */;
INSERT INTO `penggantian_lampus` (`id`, `user_id`, `waktu`, `lokasi`, `jumlah_lampu`, `watt`, `created_at`, `updated_at`) VALUES
	(1, 1, '2010-11-19', 'Beatae sit magnam illo iste voluptates et.', '2', '200', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `penggantian_lampus` (`id`, `user_id`, `waktu`, `lokasi`, `jumlah_lampu`, `watt`, `created_at`, `updated_at`) VALUES
	(2, 4, '1212-12-12', '121', '2121212', '12', '2023-12-18 14:35:38', '2023-12-18 14:35:38');
INSERT INTO `penggantian_lampus` (`id`, `user_id`, `waktu`, `lokasi`, `jumlah_lampu`, `watt`, `created_at`, `updated_at`) VALUES
	(3, 4, '1212-12-12', '121', '2121212', '12', '2023-12-18 14:35:50', '2023-12-18 14:35:50');
INSERT INTO `penggantian_lampus` (`id`, `user_id`, `waktu`, `lokasi`, `jumlah_lampu`, `watt`, `created_at`, `updated_at`) VALUES
	(4, 4, '2023-12-20', 'dasdsadasd', '123', '12312312', '2023-12-18 14:37:25', '2023-12-18 14:37:25');
INSERT INTO `penggantian_lampus` (`id`, `user_id`, `waktu`, `lokasi`, `jumlah_lampu`, `watt`, `created_at`, `updated_at`) VALUES
	(5, 4, '2023-12-21', 'kantor H1', '2', '50', '2023-12-18 17:06:17', '2023-12-18 17:06:17');
/*!40000 ALTER TABLE `penggantian_lampus` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.persediaan_logistiks
CREATE TABLE IF NOT EXISTS `persediaan_logistiks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `logistik_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `jumlah_logistik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengambilan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `persediaan_logistiks_logistik_id_foreign` (`logistik_id`),
  KEY `persediaan_logistiks_user_id_foreign` (`user_id`),
  CONSTRAINT `persediaan_logistiks_logistik_id_foreign` FOREIGN KEY (`logistik_id`) REFERENCES `logistiks` (`id`),
  CONSTRAINT `persediaan_logistiks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.persediaan_logistiks: ~2 rows (approximately)
/*!40000 ALTER TABLE `persediaan_logistiks` DISABLE KEYS */;
INSERT INTO `persediaan_logistiks` (`id`, `logistik_id`, `user_id`, `jumlah_logistik`, `tanggal_pengambilan`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '2', '2010-04-12', 'rejected', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `persediaan_logistiks` (`id`, `logistik_id`, `user_id`, `jumlah_logistik`, `tanggal_pengambilan`, `status`, `created_at`, `updated_at`) VALUES
	(2, 3, 4, '123', '2023-12-19', 'pending', '2023-12-18 17:04:48', '2023-12-18 17:04:48');
/*!40000 ALTER TABLE `persediaan_logistiks` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
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

-- Dumping data for table laravel-sarpras-app.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table laravel-sarpras-app.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jab_id` bigint(20) unsigned DEFAULT NULL,
  `kelompok_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_kode_pegawai_unique` (`kode_pegawai`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_jab_id_foreign` (`jab_id`),
  KEY `users_kelompok_id_foreign` (`kelompok_id`),
  CONSTRAINT `users_jab_id_foreign` FOREIGN KEY (`jab_id`) REFERENCES `jabatans` (`id`),
  CONSTRAINT `users_kelompok_id_foreign` FOREIGN KEY (`kelompok_id`) REFERENCES `kelompoks` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-sarpras-app.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `jab_id`, `kelompok_id`, `name`, `kode_pegawai`, `no_hp`, `email`, `password`, `picture`, `gender`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, 'admin', '111', '089531941653', 'admin@gmail.com', '$2y$12$rJIsoWfixiKoip2.hBWuhOt3GMusbNklR/jqoP0cVDMMj2lteOCny', 'https://cdn-icons-png.flaticon.com/512/2304/2304226.png', 'Laki-Laki', '2023-12-18 14:31:04', '2023-12-18 14:31:04');
INSERT INTO `users` (`id`, `jab_id`, `kelompok_id`, `name`, `kode_pegawai`, `no_hp`, `email`, `password`, `picture`, `gender`, `created_at`, `updated_at`) VALUES
	(2, 2, 1, 'Verifikator', '222', '089531941653', 'verifikator@gmail.com', '$2y$12$8puPtyFj8z7EUVIjfy.8ru9Mq9xeXU89oKVvDTm3Gny68BizGCdq2', 'https://cdn-icons-png.flaticon.com/512/2304/2304226.png', 'Laki-Laki', '2023-12-18 14:31:04', '2023-12-18 14:31:04');
INSERT INTO `users` (`id`, `jab_id`, `kelompok_id`, `name`, `kode_pegawai`, `no_hp`, `email`, `password`, `picture`, `gender`, `created_at`, `updated_at`) VALUES
	(3, 3, 1, 'Validator', '333', '089531941653', 'validator@gmail.com', '$2y$12$YOHopGVhOYAWUiyRPNicMuzmCk6o3C6a39ar2/By0ydCuEnBdL/Kq', 'https://cdn-icons-png.flaticon.com/512/2304/2304226.png', 'Laki-Laki', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
INSERT INTO `users` (`id`, `jab_id`, `kelompok_id`, `name`, `kode_pegawai`, `no_hp`, `email`, `password`, `picture`, `gender`, `created_at`, `updated_at`) VALUES
	(4, 4, 1, 'user', '444', '089531941653', 'user@gmail.com', '$2y$12$b4tsgjHgfZmetVXiDB/GTefjCmwZvmxYSPJVsBSYwQ.2/HIi3bRP6', 'https://cdn-icons-png.flaticon.com/512/2304/2304226.png', 'Laki-Laki', '2023-12-18 14:31:05', '2023-12-18 14:31:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
