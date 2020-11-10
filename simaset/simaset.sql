-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2020 pada 16.10
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simaset`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `asset`
--

CREATE TABLE `asset` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaasset` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `legal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_legal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `an_legal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hadap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panjang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namapenyewa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_jual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_sewa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan_sewa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan_jual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masa_sewa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_sewa` date DEFAULT NULL,
  `masa_akhir` date DEFAULT NULL,
  `lebar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kamar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `km` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listrik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `air` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_delete` int(11) NOT NULL,
  `embed_google` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `asset`
--

INSERT INTO `asset` (`id`, `code`, `namaasset`, `alamat`, `legal`, `no_legal`, `an_legal`, `lt`, `lb`, `hadap`, `panjang`, `namapenyewa`, `harga`, `harga_jual`, `harga_sewa`, `satuan_sewa`, `satuan_jual`, `masa_sewa`, `tgl_sewa`, `masa_akhir`, `lebar`, `kamar`, `km`, `listrik`, `air`, `status`, `is_delete`, `embed_google`, `created_at`, `updated_at`) VALUES
(1, NULL, 'qqeqwq', 'aaasas', 'SHM', '454545', 'wewewe', '4', '4', 'Timur Laut', '4', 'asasa', NULL, '40000', '50000', '/ Tahun', '/ Meter', '4', NULL, '2024-10-25', '4', '2', '1', '6.600', 'Artetis', 'DISEWAKAN', 1, NULL, '2020-10-24 04:31:40', '2020-10-25 04:18:11'),
(2, NULL, 'ad', 'gfgfdg', 'SHM', '454545', 'asas', '4', '4', 'Tenggara', '4', 'wewe', NULL, '40', '50', '/ Tahun', '/ Meter', '4', '2020-10-01', '2024-10-01', '4', '2', '2', '2.200', 'Sumur', 'DISEWAKAN', 0, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3222.3512481520124!2d110.39346341413201!3d-7.757980294408607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59c81a43e90b%3A0x3490ff58b5f0a6de!2sPT.%20BPR%20RESTU%20ARTHA%20YOGYAKARTA%20CABANG%20CONDONG%20CATUR!5e1!3m2!1sen!2sid!4v1600763797158!5m2!1sen!2sid', '2020-10-24 04:36:53', '2020-10-24 04:36:53'),
(3, NULL, 'ad', 'kjklkjl', 'SHBG', '454545', 'gkk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-24', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2020-10-24 04:38:44', '2020-10-24 04:38:44'),
(8, NULL, 'assas', 'asasa', 'SHM', '454545', 'asas', '4', '4', 'Timur', '4', 'asasas', NULL, '40', '50', '/ Tahun', '/ Meter', '4', NULL, '2024-10-24', '4', '1', '3', '2.200', 'Sumur', 'DIJUAL / DISEWAKAN', 0, NULL, '2020-10-24 04:53:09', '2020-10-24 04:53:09'),
(9, NULL, NULL, NULL, 'SHM', '454545', 'asas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-24', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2020-10-24 04:56:15', '2020-10-24 04:56:15'),
(11, NULL, 'asas', 'asas', 'SHM', '454545', 'asas', '4', '4', 'Utara', '4', 'wewe', NULL, '40', '50', '/ Tahun', '/ Meter', '4', NULL, '2024-10-27', '4', '2', '3', '1.300', 'Artetis', 'DIJUAL / DISEWAKAN', 0, NULL, '2020-10-27 00:59:44', '2020-10-27 00:59:44'),
(12, NULL, 'qw', 'qwqw', NULL, '23434', 'wesdsds', '4', '4', 'Timur Laut', '4', 'qw', NULL, '40', '50', '/ Tahun', '/ Meter', '4', NULL, '2024-10-27', '4', '2', '2', '5.500', 'Artetis + Pam', 'MAINTENANCE', 0, NULL, '2020-10-27 01:00:39', '2020-10-27 01:00:39'),
(13, NULL, 'Laptop ROG', 'ASasads', 'SHM', '2323232332', 'adsdssdfdf', '5', '5', 'Timur Laut', '4', 'Manggar Prawira', NULL, '40', '50', '/ Tahun', '/ Meter', '4', NULL, '2024-11-11', '4', '1', '3', '5.500', 'Artetis + Pam', 'DISEWAKAN', 0, NULL, '2020-11-10 07:34:53', '2020-11-10 07:34:53'),
(14, NULL, 'Laptop Macbook Pro 2020', 'fxdfdgfgfgfg', 'SHM', '232', 'sdfdsf', '4', '4', 'Timur', '4', 'adsdsds', NULL, '40', '50', '/ Tahun', '/ Meter', NULL, NULL, '2021-11-13', '4', '2', '2', '3.500', 'Artetis', 'DISEWAKAN', 0, NULL, '2020-11-10 07:40:57', '2020-11-10 07:40:57'),
(15, NULL, 'Cek upload gambar', 'aassa', 'SHM', '34343', 'asesds', '4', '5', 'Timur Laut', '4', 'zdzddsd', NULL, '40', '50', '/ Tahun', '/ Meter', '4', NULL, '2024-11-12', '4', '3', '3', '2.200', 'Pam', 'DISEWAKAN', 0, NULL, '2020-11-10 07:46:20', '2020-11-10 07:46:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `title`, `link`, `parent`, `status`, `icon`, `class`, `sort_by`, `created_at`, `updated_at`) VALUES
(1, 'MD Asset', '#', '0', 1, 'fas fa-book', 'md-asset', '1', NULL, NULL),
(2, 'List Asset', '/md/asset/index', '1', 1, 'fas fa-list', '', '1', NULL, NULL),
(3, 'Setting', '#', '0', 1, 'fa fa-cog', 'setting', '0', NULL, NULL),
(4, 'Role & Menu', '/setting/role/index', '3', 1, '', 'role', '1', NULL, NULL),
(5, 'User', '/setting/user/index', '3', 1, '', 'user', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_detail`
--

CREATE TABLE `menu_detail` (
  `id_menu` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menu_detail`
--

INSERT INTO `menu_detail` (`id_menu`, `id_role`, `created_at`, `updated_at`) VALUES
(1, 3, '2020-11-08 06:38:27', '2020-11-08 06:38:27'),
(2, 3, '2020-11-08 06:38:27', '2020-11-08 06:38:27'),
(3, 3, '2020-11-08 06:38:27', '2020-11-08 06:38:27'),
(4, 3, '2020-11-08 06:38:27', '2020-11-08 06:38:27'),
(5, 3, '2020-11-08 06:38:27', '2020-11-08 06:38:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_16_081811_create_category_table', 1),
(5, '2020_10_18_021329_asset', 1),
(6, '2020_10_18_022540_tbl_foto', 1),
(7, '2020_10_23_063530_tbl_perizinan', 1),
(8, '2020_10_24_134249_tbl__log_history', 2),
(9, '2016_06_01_000001_create_oauth_auth_codes_table', 3),
(10, '2016_06_01_000002_create_oauth_access_tokens_table', 3),
(11, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
(12, '2016_06_01_000004_create_oauth_clients_table', 3),
(13, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3),
(14, '2020_11_08_012620_role', 4),
(15, '2020_11_08_012943_menu', 5),
(16, '2020_11_08_014126_menu_detail', 6),
(17, '2020_11_08_034934_user_role', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'hiUGVPGCrS2qYTuTcf1Zwci7uX6NthSzsvFfsrlS', NULL, 'http://localhost', 1, 0, 0, '2020-11-03 01:10:36', '2020-11-03 01:10:36'),
(2, NULL, 'Laravel Password Grant Client', 'hljNrcchmTV8t3e2nqsCpIb8RXrQvHnEoDCH8bRu', 'users', 'http://localhost', 0, 1, 0, '2020-11-03 01:10:36', '2020-11-03 01:10:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-11-03 01:10:36', '2020-11-03 01:10:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(2, 'admin', '2020-11-08 00:55:34', '2020-11-08 00:55:34'),
(3, 'super admin', '2020-11-08 06:38:27', '2020-11-08 06:38:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_foto`
--

CREATE TABLE `tbl_foto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `line_no` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_asset` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pathfoto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_foto`
--

INSERT INTO `tbl_foto` (`id`, `line_no`, `file_name`, `id_asset`, `keterangan`, `pathfoto`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-10-21-11-00-24d.PNG', 2, 'asas', 'C:\\xampp\\htdocs\\simaset-project\\simaset\\storage\\app\\public/file/foto\\2020-10-24-11-31-40frm.PNG', '2020-10-24 04:31:40', '2020-10-24 04:31:40'),
(2, 1, '2020-10-21-11-00-24d.PNG', 2, 'fgf', 'C:\\xampp\\htdocs\\simaset-project\\simaset\\storage\\app\\public/file/foto\\2020-10-24-11-36-53frm.PNG', '2020-10-24 04:36:53', '2020-10-24 04:36:53'),
(4, 1, 'public/file/foto\\2020-10-27-07-59-44form pengajuan.PNG', 11, 'aas', 'C:\\xampp\\htdocs\\simaset-project\\simaset\\storage\\app\\public/file/foto\\2020-10-27-07-59-44form pengajuan.PNG', '2020-10-27 00:59:44', '2020-10-27 00:59:44'),
(5, 1, '2020-11-10-14-34-54form pengajuan.PNG', 13, 'adssads', 'C:\\xampp\\htdocs\\simaset-project\\simaset\\storage\\app\\public/file/foto/2020/11/10\\form pengajuan.PNG', '2020-11-10 07:34:54', '2020-11-10 07:34:54'),
(6, 1, '2020-11-10-14-40-57asass.PNG', 14, 'sdssdsd', 'C:\\xampp\\htdocs\\simaset-project\\simaset\\storage\\app\\public/file/foto/2020/11/10\\asass.PNG', '2020-11-10 07:40:57', '2020-11-10 07:40:57'),
(7, 2, '2020-11-10-14-40-57datepicker.PNG', 14, 'adsdsd', 'C:\\xampp\\htdocs\\simaset-project\\simaset\\storage\\app\\public/file/foto/2020/11/10\\datepicker.PNG', '2020-11-10 07:40:57', '2020-11-10 07:40:57'),
(8, 1, '2020-11-10-14-46-20datepicker.PNG', 15, 'asasas', 'C:\\xampp\\htdocs\\simaset-project\\simaset\\storage\\app\\public/file/foto/2020/November/10\\datepicker.PNG', '2020-11-10 07:46:20', '2020-11-10 07:46:20'),
(9, 2, '2020-11-10-14-46-20adf.PNG', 15, 'assaasa', 'C:\\xampp\\htdocs\\simaset-project\\simaset\\storage\\app\\public/file/foto/2020/November/10\\adf.PNG', '2020-11-10 07:46:20', '2020-11-10 07:46:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log_history`
--

CREATE TABLE `tbl_log_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_asset` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_log_history`
--

INSERT INTO `tbl_log_history` (`id`, `id_asset`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'CREATED ASSET', '2020-10-23 14:05:01', '2020-10-23 14:05:01'),
(2, 2, 1, 'asas', '2020-10-26 06:40:12', '2020-10-26 06:40:12'),
(3, 11, 1, 'CREATED ASSET', '2020-10-27 00:59:44', '2020-10-27 00:59:44'),
(4, 12, 1, 'CREATED ASSET', '2020-10-27 01:00:39', '2020-10-27 01:00:39'),
(5, 13, 3, 'CREATED ASSET', '2020-11-10 07:34:54', '2020-11-10 07:34:54'),
(6, 14, 3, 'CREATED ASSET', '2020-11-10 07:40:57', '2020-11-10 07:40:57'),
(7, 15, 3, 'CREATED ASSET', '2020-11-10 07:46:20', '2020-11-10 07:46:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perizinan`
--

CREATE TABLE `tbl_perizinan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `line_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perizinan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_izin` date DEFAULT NULL,
  `id_asset` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_perizinan`
--

INSERT INTO `tbl_perizinan` (`id`, `line_no`, `nomor`, `perizinan`, `tgl_izin`, `id_asset`, `created_at`, `updated_at`) VALUES
(1, '1', '2323', 'SHBG', '1970-01-01', 2, '2020-10-24 04:53:09', '2020-10-24 04:53:09'),
(2, '1', '5,565,656', 'SHM', '2020-10-21', 2, '2020-10-24 04:56:15', '2020-10-24 04:56:15'),
(4, '1', 'asas', 'SHM', '1970-01-26', 11, '2020-10-27 00:59:44', '2020-10-27 00:59:44'),
(5, '1', 'esferer34', 'SHBG', '1970-01-03', 13, '2020-11-10 07:34:53', '2020-11-10 07:34:53'),
(6, '1', 'asdsd', 'SHM', '1970-01-10', 14, '2020-11-10 07:40:57', '2020-11-10 07:40:57'),
(7, '1', 'assasa', 'SHM', '2020-11-19', 15, '2020-11-10 07:46:20', '2020-11-10 07:46:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Manggar Prawira ', '', 'admin', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, NULL),
(2, 'Aasas', '', 'asca', NULL, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-02 22:56:33', '2020-11-02 22:56:33'),
(3, 'Aasas', '', 'asca', NULL, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-02 22:59:24', '2020-11-02 22:59:24'),
(4, 'Aasas', '', 'asca', NULL, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-02 23:00:58', '2020-11-02 23:00:58'),
(5, 'Aasas', '', 'asca', NULL, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-02 23:01:20', '2020-11-02 23:01:20'),
(6, 'Aasas', '', 'asca', NULL, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-02 23:05:59', '2020-11-02 23:05:59'),
(7, 'Aasas', '', 'asca', NULL, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-02 23:06:36', '2020-11-02 23:06:36'),
(8, 'Aasas', '', 'asca', NULL, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-02 23:11:48', '2020-11-02 23:11:48'),
(9, 'Aasas', '', 'asca', NULL, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-02 23:14:09', '2020-11-02 23:14:09'),
(10, 'Aasas', '', 'asca', NULL, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-02 23:14:24', '2020-11-02 23:14:24'),
(11, 'Aasas', '', 'asca', NULL, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-02 23:16:35', '2020-11-02 23:16:35'),
(12, 'Aasas', '', 'asca', NULL, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-02 23:19:18', '2020-11-02 23:19:18'),
(13, 'Aasas', '', 'asca', NULL, 'd41d8cd98f00b204e9800998ecf8427e', '2020-11-02 23:20:35', '2020-11-02 23:20:35'),
(14, 'Aasas', '', 'asca', NULL, 'asas', '2020-11-02 23:40:11', '2020-11-02 23:40:11'),
(15, 'Aasas', '', 'admiassas', NULL, 'c93ccd78b2076528346216b3b2f701e6', '2020-11-02 23:53:40', '2020-11-02 23:53:40'),
(16, 'Aasas', 'asca@gmail.com', 'asca1', '2020-11-03 07:48:01', 'asca1234', '2020-11-03 00:09:23', '2020-11-03 00:09:23'),
(17, 'Aasas', 'asca1@gmail.com', 'asca123', NULL, '$2y$10$igWVWD9yVmrl6YZF5wrwRO1wEyuX0PFIo0k5ZlGQfNypa76zEc9x6', '2020-11-03 02:09:27', '2020-11-03 02:09:27'),
(18, 'Aasas', 'asca12@gmail.com', 'asca123', NULL, '$2y$10$i8nG2/dR01xKnDTL04Bx2OT4xvnew5KD8.nQZ2spjpxQNA48fUehS', '2020-11-03 02:10:19', '2020-11-03 02:10:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `id_user`, `id_role`, `is_delete`, `created_at`, `updated_at`) VALUES
(4, 1, 3, 0, '2020-11-08 06:39:15', '2020-11-08 06:39:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_log_history`
--
ALTER TABLE `tbl_log_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_perizinan`
--
ALTER TABLE `tbl_perizinan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `asset`
--
ALTER TABLE `asset`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_foto`
--
ALTER TABLE `tbl_foto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_log_history`
--
ALTER TABLE `tbl_log_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_perizinan`
--
ALTER TABLE `tbl_perizinan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
