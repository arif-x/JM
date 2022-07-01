-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 09:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mandiri`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `nama_lengkap`, `username`, `level`) VALUES
(1, 'admin@admin.com', '$2y$10$Ti.qQNYyLJaAatl/eAeWLeHwf3gmjUeTNEPvszuQOFOVI5GXw.md2', 'Ngadimin', 'username', '1');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_user`
--

CREATE TABLE `jawaban_user` (
  `id_jawaban_user` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_label_soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mengerjakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jawaban_user`
--

INSERT INTO `jawaban_user` (`id_jawaban_user`, `id_user`, `id_label_soal`, `tgl_mengerjakan`, `jawaban_user`, `id_soal`, `skor`, `slug`) VALUES
(1, '2', '1', '2022-07-01 10:03:10', 'b,c,c,a,b,b', '7,6,5,3,2,1', '1', 'eyJpdiI6IjhMRE9VSmlWWEZVdEI3d2RFaVQvNXc9PSIsInZhbHVlIjoiNDdwK1NqRkwxNkRkaHRtUm5HekpFeERCdXRjaWxwMk9LdjgwWitQVFVjOD0iLCJtYWMiOiJiZTQwZDkzOGQxMjZjY2M4MTg5ZDUwNDM2NDZkMzY0ZDk4ODNmYjQ1Y2EyOTJlZjMyMWEwNmViYmQxZjg4MzY3IiwidGFnIjoiIn0='),
(2, '2', '1', '2022-07-01 14:18:16', '-,-,-,-,-,-', '6,7,3,2,5,1', '0', 'eyJpdiI6InlUcFZtZENQbmFyRm9jNkJRMzBucmc9PSIsInZhbHVlIjoic3FGdW1FSmJoR20yMjB1aDZ5STJNbUdSVnpGTW8yVVNLNW1EK04rcXlOdz0iLCJtYWMiOiI4MDY3MDU4MDIxZDBlOGI4MzM5OTc5MzIyNjJhNTg1ZTc4ODNiMjk0MGRkYmE1NzRlMjFhYjMyZWEwNWFmMjFkIiwidGFnIjoiIn0=');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_user_tryout`
--

CREATE TABLE `jawaban_user_tryout` (
  `id_jawaban_user_tryout` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_label_soal_tryout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mengerjakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_soal_tryout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban_user_tryout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jawaban_user_tryout`
--

INSERT INTO `jawaban_user_tryout` (`id_jawaban_user_tryout`, `id_user`, `id_label_soal_tryout`, `tgl_mengerjakan`, `id_soal_tryout`, `jawaban_user_tryout`, `skor`, `slug`) VALUES
(1, '2', '1', '2022-07-01 13:38:08', '1', 'd', '0', 'eyJpdiI6Ik43ZUpRM2wyNnpUZXZHZkphTGtYYVE9PSIsInZhbHVlIjoiczZUNWpqOHdIWjk0bmJRTVZOSGdILzUrNE5SZEVKWU9xczRJcmpjVnh3MD0iLCJtYWMiOiJmNGQwMGI4Y2UyZDg5YTc1ZmFiMWU5MzFlOGMzNjg2MzIzODc5YTg0YTQzNDc0YmM5NmI1YmE4OWQ2ZmFmN2EyIiwidGFnIjoiIn0='),
(2, '2', '1', '2022-07-01 14:08:13', '4,1,5', 'd,c,a', '1', 'eyJpdiI6ImdYRFZ6ZCs3cXVlVkVqcmtBNllmMGc9PSIsInZhbHVlIjoiUHVKSXJUcTdKSHFQakZCcEFzajFRTDNTenl6MUJlTTJNRVVyVEdjZkxVRT0iLCJtYWMiOiJmZTE0YjFlMDQ1MmNkMDk0YTliOTU2MGNkY2FmZTMzOGI0MjJhMmVjZmFhYWM4YzI0ZWFkM2E0ZWFjNzY4ZTViIiwidGFnIjoiIn0=');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kampus`
--

CREATE TABLE `jenis_kampus` (
  `id_jenis_kampus` int(10) UNSIGNED NOT NULL,
  `nama_jenis_kampus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kampus`
--

INSERT INTO `jenis_kampus` (`id_jenis_kampus`, `nama_jenis_kampus`) VALUES
(1, 'UMUM'),
(2, 'PTKIN');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_soal`
--

CREATE TABLE `jenis_soal` (
  `id_jenis_soal` int(10) UNSIGNED NOT NULL,
  `jenis_soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_soal`
--

INSERT INTO `jenis_soal` (`id_jenis_soal`, `jenis_soal`) VALUES
(1, 'TPS'),
(2, 'TKA'),
(3, 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_view_soal`
--

CREATE TABLE `jenis_view_soal` (
  `id_jenis_view_soal` int(10) UNSIGNED NOT NULL,
  `jenis_view_soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_view_soal`
--

INSERT INTO `jenis_view_soal` (`id_jenis_view_soal`, `jenis_view_soal`) VALUES
(1, 'Text Saja'),
(2, 'Soal Bergambar'),
(3, 'Jawaban Bergambar'),
(4, 'Soal & Jawaban Bergambar'),
(5, 'Soal Bergambar & Pembahasan Bergambar'),
(6, 'Jawaban Bergambar & Pembahasan Bergambar'),
(7, 'Soal, Jawaban & Jawaban Bergambar');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'SAINTEK'),
(2, 'SOSHUM');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_kampus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_limit_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `id_paket`, `id_kategori`, `id_jenis_kampus`, `tgl_pesan`, `tgl_limit_bayar`, `bukti_pembayaran`, `status_pembayaran`) VALUES
(1, '1', '2', '1', '1', '20/06/2022', '20/07/2022', 'https://laravel.com/img/logotype.min.svg', '4'),
(2, '2', '2', '1', '1', '2022-06-21', '2022-06-28', 'http://localhost:8000/storage/bukti-pembayaran/2-21-06-2022-05-52-05.png', '4');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `email`, `no_hp`) VALUES
(1, 'email@email.com', '080808080808');

-- --------------------------------------------------------

--
-- Table structure for table `kontaks`
--

CREATE TABLE `kontaks` (
  `id_kontak` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `label_soal`
--

CREATE TABLE `label_soal` (
  `id_label_soal` int(10) UNSIGNED NOT NULL,
  `id_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_kampus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_soal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `label_soal`
--

INSERT INTO `label_soal` (`id_label_soal`, `id_paket`, `id_kategori`, `id_jenis_kampus`, `id_jenis_soal`, `nama_label`, `slug`) VALUES
(1, '2', '1', '1', '1', 'Iki La1bel', 'iki-label'),
(2, '3', '1', '1', '1', 'Ini Label 2', 'ini-label'),
(3, '1', '1', '1', '1', 'Iki Label 3', 'iki-label-1');

-- --------------------------------------------------------

--
-- Table structure for table `label_soal_tryout`
--

CREATE TABLE `label_soal_tryout` (
  `id_label_soal_tryout` int(10) UNSIGNED NOT NULL,
  `id_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_kampus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `label_soal_tryout`
--

INSERT INTO `label_soal_tryout` (`id_label_soal_tryout`, `id_paket`, `id_kategori`, `id_jenis_kampus`, `id_jenis_soal`, `nama_label`, `slug`) VALUES
(1, '3', '1', '1', '1', 'Tryout 1', 'tryout-1');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_soal`
--

CREATE TABLE `laporan_soal` (
  `id_laporan_soal` int(10) UNSIGNED NOT NULL,
  `id_soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_soal`
--

INSERT INTO `laporan_soal` (`id_laporan_soal`, `id_soal`, `kategori`, `pesan`) VALUES
(1, '', 'Soal Tidak Tepat', 's'),
(2, '', 'Soal Tidak Tepat', 'Pesan Singkat'),
(3, '', 'Salah Ketik Pada Soal', 'Pesan Singkat'),
(4, '', 'Soal Tidak Tepat', 'asd'),
(5, '9', 'Soal Tidak Tepat', 'asd'),
(6, '8', 'Salah Ketik Pada Soal', ',mnmnmn'),
(7, '9', 'Soal Tidak Tepat', 'soal salah'),
(8, '9', 'Soal Tidak Tepat', 'Cok');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_14_023924_create_admins_table', 1),
(6, '2022_06_14_023940_create_pakets_table', 1),
(7, '2022_06_14_023952_create_kategoris_table', 1),
(8, '2022_06_14_024028_create_jenis_kampuses_table', 1),
(9, '2022_06_14_024042_create_label_soals_table', 1),
(10, '2022_06_14_024055_create_jenis_view_soals_table', 1),
(11, '2022_06_14_024109_create_soals_table', 1),
(12, '2022_06_14_024120_create_keranjangs_table', 1),
(13, '2022_06_14_024134_create_paket_aktifs_table', 1),
(14, '2022_06_14_024149_create_jawaban_users_table', 1),
(15, '2022_06_16_065726_create_jenis_soals_table', 2),
(16, '2022_06_16_071934_create_universitas_table', 3),
(20, '2022_06_21_065401_create_rekenings_table', 4),
(21, '2022_06_21_065509_create_kontaks_table', 4),
(22, '2022_06_23_025026_create_status_mengerjakans_table', 5),
(23, '2022_06_27_142531_create_laporan_soals_table', 6),
(24, '2022_07_01_110324_create_soal_tryouts_table', 7),
(25, '2022_07_01_110340_create_label_soal_tryouts_table', 7),
(26, '2022_07_01_131337_create_status_mengerjakan_tryouts_table', 8),
(27, '2022_07_01_133517_create_jawaban_user_tryouts_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(10) UNSIGNED NOT NULL,
  `nama_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_akses` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_no_akses` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`, `diskon`, `akses`, `keterangan_akses`, `keterangan_no_akses`) VALUES
(1, 'Gratis', '0', '1', 'Akses', NULL, 'qwe, qwer, bhy, njjj, fgg'),
(2, 'Premium', '170000', '0', 'Akses', 'Hello World, Oke Lah', 'Oleng, Ura, Owalah'),
(3, 'Platinum', '300000', '0', 'Akses', 'Keterangan 1, Keterangan 2, Keterangan 3, Keterangan 4', 'Keterangan 11, Keterangan 12, Keterangan 13, Keterangan 14');

-- --------------------------------------------------------

--
-- Table structure for table `paket_aktif`
--

CREATE TABLE `paket_aktif` (
  `id_paket_aktif` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_kampus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_aktif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_paket_aktif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket_aktif`
--

INSERT INTO `paket_aktif` (`id_paket_aktif`, `id_user`, `id_paket`, `id_kategori`, `id_jenis_kampus`, `tgl_aktif`, `tgl_limit`, `status_paket_aktif`) VALUES
(1, '2', '2', '1', '1', '21/06/2022', '18/12/2022', '1'),
(2, '1', '3', '1', '1', '21/06/2022', '18/12/2022', '1');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(10) UNSIGNED NOT NULL,
  `nama_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atas_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `no_rekening`, `atas_nama`) VALUES
(1, 'BRI', '28273498682', 'Arip');

-- --------------------------------------------------------

--
-- Table structure for table `rekenings`
--

CREATE TABLE `rekenings` (
  `id_rekening` int(10) UNSIGNED NOT NULL,
  `nama_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atas_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(10) UNSIGNED NOT NULL,
  `id_label_soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `b` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `c` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `d` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `e` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kunci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembahasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_label_soal`, `soal`, `a`, `b`, `c`, `d`, `e`, `kunci`, `pembahasan`, `slug`) VALUES
(1, '1', '<p>Okeh <img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>A. Okeh</p>\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'e', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'eyJpdiI6IlUrYUgyaktTTHZTcjZRR2hnanVaSkE9PSIsInZhbHVlIjoibjBsZGhyUmtrcFpoRENncDNXRXpacGVMb0dTYnZqK09tU096OWpGbFBPbVR4eTBRTjd5V2tkYWxXTkVUb1FQYjNqWkQ5R1J6N2wvZmFLWkNiUlFYOStYM3E5V1RFbHhPOFR4MkdkTG1YNnBFcTExYitKOHA5b29OR2p6RVczeGpRWXRaR2VVcER6M1lrZ3lnWW5PekhldU9oOGVsTXoxbmRVYTkyYVdabWdVPSIsIm1hYyI6ImNmMzNkZDYxMzMxMzVhMDg0ODQxYWExZmY2ZGJjZTlhMThiMDgzMTAyZmZjNTc1ZmM5NWVjOWIwMjVjZjBiZjkiLCJ0YWciOiIifQ=='),
(2, '1', '<p>HOkeh <img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'd', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'slug-2'),
(3, '1', '<p>Okeh <img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'b', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'slug-3'),
(4, '2', '1', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'a', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'slug-4'),
(5, '1', '<p>Okeh <img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'c', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'slug-5'),
(6, '1', '<p>Okeh <img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\r\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'a', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'slug-6'),
(7, '1', '<p>Okeh <img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'c', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'pokeh-img-srcstoragephotoslogopng-alt-width100-height32-p'),
(8, '2', '<p>2</p>', '<p>A. Okeh</p>\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh</p>\n<p><img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'a', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'eyJpdiI6IjB3TmRKRnlEYVZCaFNodVAzTlJKU1E9PSIsInZhbHVlIjoiQ3dvMVhLOHBIN0t2SlZMaE9BVVdUblhnbmFoaVM4NTQrNncvaENuNEk1cUF0dFd1VGNwdzEzRElwMTkybzQyR2pDQXg3V0VuTDVKbWRhRURuRDBUa2hlQ0Q1TGJKL2llTDgzWUVzanM4QVk9IiwibWFjIjoiNzRiY2M2ODM2ODUxZDc5MTZhYjNlOTZkNjI5NWJmZjk0ODFkNTJiMzI3YjdkNjgwOTFmN2E5N2E1ZTQ1ZDA0NiIsInRhZyI6IiJ9'),
(9, '2', '<p>3xxs</p>', '<p>A. Okeh <img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh <img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh <img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p>Okeh <img src=\"/storage/photos/logo.png\" alt=\"\" width=\"100\" height=\"32\" /></p>', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'a', '<p><img src=\"/storage/photos/white-bitcoin-cryptocurrency-coin-against-grey-background-d-rendering-229824575.jpg\" alt=\"\" width=\"100\" height=\"50\" /></p>', 'eyJpdiI6ImZ2VVJIeWZJSkhJOTdCNEs5dkMybFE9PSIsInZhbHVlIjoid2l2d3NvS292TVBEU05QZ2gxNnMzQUl6MmRYY20yMmQybHhxdjV4TFY5V1hFWG9RWTlMOWVrVERTOUVDenVWcVhQdEI2eXhxcDVXY285TDR1TFR1VjdnSEo3Y3FFWnVwdGdCRHF3VHBJYTQ9IiwibWFjIjoiMTE0NGQzZjYyMmJkMWNhYzI0MjMxZjY5MTIxMWJiZTE0MWY4MjkzMzdmMGM4NDVjNWU3MjQ0OWRiOTJmNTk2YiIsInRhZyI6IiJ9');

-- --------------------------------------------------------

--
-- Table structure for table `soal_tryout`
--

CREATE TABLE `soal_tryout` (
  `id_soal_tryout` int(10) UNSIGNED NOT NULL,
  `id_label_soal_tryout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_tryout` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `b` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `c` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `d` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `e` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kunci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembahasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soal_tryout`
--

INSERT INTO `soal_tryout` (`id_soal_tryout`, `id_label_soal_tryout`, `soal_tryout`, `a`, `b`, `c`, `d`, `e`, `kunci`, `pembahasan`, `slug`) VALUES
(1, '1', '<p>Soal 1</p>', '<p>A. Aku</p>', '<p>B. Bal</p>', '<p>C. Coli</p>', '<p>D. Dancok</p>', '<p>E. Encok</p>', 'a', '<p>Iki Pembahasan</p>', 'eyJpdiI6Ik5CUkhjS2tNZ1hrZGpQNUNGR0JlbFE9PSIsInZhbHVlIjoiUXp3MjZBM2YvU3NTUHVLSVEzOXl4UkZwdmxFeXJobHVGWEpmdTlrSU5GdC93OEtQTDg0WjNWTWFOOGxiZGVpdzB0aE9wYUFjU0hRellJdkF3RkF2WmExU0s4Yy8yVWhPaWd2dDJkN2dtU289IiwibWFjIjoiZmQ0YTg0YmI4Y2UxY2M5Yjk5YmJiZWNlNmJjZDFiYzFmZWIzYTEyZDc2NDhjZDY5NjliMWVmYWY5YzQ0YTc2MiIsInRhZyI6IiJ9'),
(4, '1', '<p>Soal 2</p>', '<p>A. Asu</p>', '<p>B. Dobol</p>', '<p>C. Cok</p>', '<p>D. Dancok</p>', '<p>E. Encok</p>', 'c', '<p>Iki Coli</p>', 'eyJpdiI6IjFFWlMzc2ZsZGZEZ1RocXVNY29RNnc9PSIsInZhbHVlIjoiajgvMS9qM2NDT3hUZXE5V1NTLzdXWFJZZUQ3MmFYRk1vWDUrVmRKaUplMW4zcGFGelFROGorZ2ZIck5jNkxFcFY0U3ZsZ2hOdmVKQzBXZkJmNG94M3U5KzBFNFRxY3dUdDIzQ3dLdS9MY3M9IiwibWFjIjoiY2EwOWM1NzBiNzM2ZDFiNTZiNTUwOTY0ZTkyYjQyYmEyMGE4MjI1MGYxODIxNjgwNjZjNDAyMTEzYjg4ZGEwMSIsInRhZyI6IiJ9'),
(5, '1', '<p>asklhd</p>', '<p>asjkd</p>', '<p>asjkdf</p>', '<p>asjdh</p>', '<p>askfjh</p>', '<p>adsjfkh</p>', 'a', '<p>skfjh</p>', 'eyJpdiI6IlpQWE1FWEdwUHhrVmp0ZTZ3TmNjQnc9PSIsInZhbHVlIjoiekFqSjZGT05jcndPdUlObFJWcm1NVTJJK2w5dUpUVncxazh5b3R1SC82WUxScWhjRld6Vk85eCs1NzVJMG1sdzBHNDA4S3JZWXorK2dzVVYrSStWcU5GQy9ILzVpSjdUTE1PZG96amMzd0U9IiwibWFjIjoiMmJkNWE1NmJiZWIyZmE5NTkzZTc4MjI3NzFiZmIwNjEwNTNjZWQ2NTA5YTIyODIzNzY0MWVlNDk5N2I1MjdhNCIsInRhZyI6IiJ9');

-- --------------------------------------------------------

--
-- Table structure for table `status_mengerjakan`
--

CREATE TABLE `status_mengerjakan` (
  `id_status_mengerjakan` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_label_soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_mengerjakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_berakhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_mengerjakan`
--

INSERT INTO `status_mengerjakan` (`id_status_mengerjakan`, `id_user`, `id_label_soal`, `waktu_mengerjakan`, `waktu_berakhir`, `status`) VALUES
(1, '2', '1', '2022-07-01 10:03:10', '2022-07-01 10:18:10', '2'),
(2, '2', '1', '2022-07-01 14:07:29', '2022-07-01 14:22:29', '2'),
(3, '2', '1', '2022-07-01 14:18:16', '2022-07-01 14:33:16', '2');

-- --------------------------------------------------------

--
-- Table structure for table `status_mengerjakan_tryout`
--

CREATE TABLE `status_mengerjakan_tryout` (
  `id_status_mengerjakan_tryout` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_label_soal_tryout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_mengerjakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_berakhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_mengerjakan_tryout`
--

INSERT INTO `status_mengerjakan_tryout` (`id_status_mengerjakan_tryout`, `id_user`, `id_label_soal_tryout`, `waktu_mengerjakan`, `waktu_berakhir`, `status`) VALUES
(1, '2', '1', '2022-07-01 13:22:48', '2022-07-01 15:37:48', '2'),
(2, '2', '1', '2022-07-01 13:32:58', '2022-07-01 14:22:58', '2'),
(3, '2', '1', '2022-07-01 13:40:35', '2022-07-01 14:30:35', '2'),
(4, '2', '1', '2022-07-01 14:08:13', '2022-07-01 14:58:13', '2');

-- --------------------------------------------------------

--
-- Table structure for table `universitas`
--

CREATE TABLE `universitas` (
  `id_universitas` int(10) UNSIGNED NOT NULL,
  `id_jenis_kampus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_universitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universitas`
--

INSERT INTO `universitas` (`id_universitas`, `id_jenis_kampus`, `nama_universitas`) VALUES
(2, '1', 'UIN Malang');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_universitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `email`, `password`, `no_hp`, `id_universitas`, `avatar`, `email_verified_at`, `remember_token`) VALUES
(1, 'MOH ARIFFUDIN', 'ariffudinnotresponding@gmail.com', '$2y$10$Ti.qQNYyLJaAatl/eAeWLeHwf3gmjUeTNEPvszuQOFOVI5GXw.md2', '088888888', '1', '<img src=\"https://ui-avatars.com/api/?name=MOH ARIFFUDIN&amp;background=00ADEF&amp;color=fff\" alt=\"profile\">', NULL, NULL),
(2, 'Nama', 'akuganteng@gmail.com', '$2y$10$pJa08sCgaw.bc02Js9JlyufIGH1l9lfm5wZTXs4ubVKtYIK9T8pm.', '080808080808', '2', '<img src=\"https://ui-avatars.com/api/?name=Nama&amp;background=00ADEF&amp;color=fff\" alt=\"profile\">', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jawaban_user`
--
ALTER TABLE `jawaban_user`
  ADD PRIMARY KEY (`id_jawaban_user`);

--
-- Indexes for table `jawaban_user_tryout`
--
ALTER TABLE `jawaban_user_tryout`
  ADD PRIMARY KEY (`id_jawaban_user_tryout`);

--
-- Indexes for table `jenis_kampus`
--
ALTER TABLE `jenis_kampus`
  ADD PRIMARY KEY (`id_jenis_kampus`);

--
-- Indexes for table `jenis_soal`
--
ALTER TABLE `jenis_soal`
  ADD PRIMARY KEY (`id_jenis_soal`);

--
-- Indexes for table `jenis_view_soal`
--
ALTER TABLE `jenis_view_soal`
  ADD PRIMARY KEY (`id_jenis_view_soal`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `kontaks`
--
ALTER TABLE `kontaks`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `label_soal`
--
ALTER TABLE `label_soal`
  ADD PRIMARY KEY (`id_label_soal`);

--
-- Indexes for table `label_soal_tryout`
--
ALTER TABLE `label_soal_tryout`
  ADD PRIMARY KEY (`id_label_soal_tryout`);

--
-- Indexes for table `laporan_soal`
--
ALTER TABLE `laporan_soal`
  ADD PRIMARY KEY (`id_laporan_soal`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `paket_aktif`
--
ALTER TABLE `paket_aktif`
  ADD PRIMARY KEY (`id_paket_aktif`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `rekenings`
--
ALTER TABLE `rekenings`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `soal_tryout`
--
ALTER TABLE `soal_tryout`
  ADD PRIMARY KEY (`id_soal_tryout`);

--
-- Indexes for table `status_mengerjakan`
--
ALTER TABLE `status_mengerjakan`
  ADD PRIMARY KEY (`id_status_mengerjakan`);

--
-- Indexes for table `status_mengerjakan_tryout`
--
ALTER TABLE `status_mengerjakan_tryout`
  ADD PRIMARY KEY (`id_status_mengerjakan_tryout`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
  ADD PRIMARY KEY (`id_universitas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jawaban_user`
--
ALTER TABLE `jawaban_user`
  MODIFY `id_jawaban_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jawaban_user_tryout`
--
ALTER TABLE `jawaban_user_tryout`
  MODIFY `id_jawaban_user_tryout` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_kampus`
--
ALTER TABLE `jenis_kampus`
  MODIFY `id_jenis_kampus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_soal`
--
ALTER TABLE `jenis_soal`
  MODIFY `id_jenis_soal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_view_soal`
--
ALTER TABLE `jenis_view_soal`
  MODIFY `id_jenis_view_soal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontaks`
--
ALTER TABLE `kontaks`
  MODIFY `id_kontak` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `label_soal`
--
ALTER TABLE `label_soal`
  MODIFY `id_label_soal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `label_soal_tryout`
--
ALTER TABLE `label_soal_tryout`
  MODIFY `id_label_soal_tryout` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laporan_soal`
--
ALTER TABLE `laporan_soal`
  MODIFY `id_laporan_soal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paket_aktif`
--
ALTER TABLE `paket_aktif`
  MODIFY `id_paket_aktif` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rekenings`
--
ALTER TABLE `rekenings`
  MODIFY `id_rekening` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `soal_tryout`
--
ALTER TABLE `soal_tryout`
  MODIFY `id_soal_tryout` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status_mengerjakan`
--
ALTER TABLE `status_mengerjakan`
  MODIFY `id_status_mengerjakan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_mengerjakan_tryout`
--
ALTER TABLE `status_mengerjakan_tryout`
  MODIFY `id_status_mengerjakan_tryout` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id_universitas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
