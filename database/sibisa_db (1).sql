-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Bulan Mei 2023 pada 03.25
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibisa_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `beasiswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`id`, `siswa_id`, `beasiswa`, `created_at`, `updated_at`) VALUES
(12, 19, NULL, '2023-05-04 17:49:00', '2023-05-08 00:39:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `class`
--

CREATE TABLE `class` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `kelas` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggal_kelas` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `tahun_ajaran` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `class`
--

INSERT INTO `class` (`id`, `id_siswa`, `kelas`, `tinggal_kelas`, `tahun_ajaran`, `created_at`, `updated_at`) VALUES
(89, 19, '1', 'false', '2022/2023', '2023-05-04 17:49:00', '2023-05-08 20:47:54'),
(90, 19, '2', 'false', '2022/2023', '2023-05-04 17:49:00', '2023-05-08 20:49:17'),
(91, 19, '3', 'false', NULL, '2023-05-04 17:49:00', '2023-05-04 17:49:00'),
(92, 19, '4', 'false', NULL, '2023-05-04 17:49:00', '2023-05-04 17:49:00'),
(93, 19, '5', 'false', NULL, '2023-05-04 17:49:00', '2023-05-04 17:49:00'),
(94, 19, '6', 'false', NULL, '2023-05-04 17:49:00', '2023-05-04 17:49:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstrakulikuler`
--

CREATE TABLE `ekstrakulikuler` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b1c1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b1c2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2c1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2c2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ekstrakulikuler`
--

INSERT INTO `ekstrakulikuler` (`id`, `tahun_ajaran`, `kelas`, `siswa`, `b1c1`, `b1c2`, `b2c1`, `b2c2`, `created_at`, `updated_at`) VALUES
(16, '2022/2023', '1', 'Ahmad Sodikin', NULL, NULL, NULL, NULL, '2023-05-04 17:50:43', '2023-05-08 20:47:54'),
(17, '2022/2023', '2', 'Ahmad Sodikin', '9', '9', '9', '9', '2023-05-08 20:49:17', '2023-05-08 20:49:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `ijazah`
--

CREATE TABLE `ijazah` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_siswa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ijazah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skhun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ijazah`
--

INSERT INTO `ijazah` (`id`, `id_siswa`, `ijazah`, `skl`, `skhun`, `created_at`, `updated_at`) VALUES
(3, '19', '645b1b28e6c6c.pdf', '645b1b28ed8d9.pdf', '645b1b28e7f50.pdf', '2023-05-04 17:52:32', '2023-05-09 21:18:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kenaikan`
--

CREATE TABLE `kenaikan` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kelas` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kenaikan`
--

INSERT INTO `kenaikan` (`id`, `tahun_ajaran`, `kelas`, `siswa`, `status`, `status_kelas`, `created_at`, `updated_at`) VALUES
(6, '2022/2023', '1', 'Ahmad Sodikin', 'Lulus', 'Lulus', '2023-05-04 17:50:43', '2023-05-08 20:47:54'),
(7, '2022/2023', '2', 'Ahmad Sodikin', 'Naik', '3', '2023-05-08 20:49:17', '2023-05-08 20:49:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kesehatan_jasmani`
--

CREATE TABLE `kesehatan_jasmani` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `jas_th_1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_th_2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_th_3` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_th_4` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_th_5` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_th_6` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_bb_1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_bb_2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_bb_3` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_bb_4` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_bb_5` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_bb_6` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_tb_1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_tb_2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_tb_3` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_tb_4` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_tb_5` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_tb_6` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_pt_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_pt_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_pt_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_pt_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_pt_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_pt_6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_kj_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_kj_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_kj_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_kj_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_kj_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_kj_6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kesehatan_jasmani`
--

INSERT INTO `kesehatan_jasmani` (`id`, `siswa_id`, `jas_th_1`, `jas_th_2`, `jas_th_3`, `jas_th_4`, `jas_th_5`, `jas_th_6`, `jas_bb_1`, `jas_bb_2`, `jas_bb_3`, `jas_bb_4`, `jas_bb_5`, `jas_bb_6`, `jas_tb_1`, `jas_tb_2`, `jas_tb_3`, `jas_tb_4`, `jas_tb_5`, `jas_tb_6`, `jas_pt_1`, `jas_pt_2`, `jas_pt_3`, `jas_pt_4`, `jas_pt_5`, `jas_pt_6`, `jas_kj_1`, `jas_kj_2`, `jas_kj_3`, `jas_kj_4`, `jas_kj_5`, `jas_kj_6`, `created_at`, `updated_at`) VALUES
(12, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-04 17:49:00', '2023-05-08 00:39:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketidakhadiran`
--

CREATE TABLE `ketidakhadiran` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sakit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `izin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanpa_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ketidakhadiran`
--

INSERT INTO `ketidakhadiran` (`id`, `tahun_ajaran`, `kelas`, `siswa`, `sakit`, `izin`, `tanpa_keterangan`, `created_at`, `updated_at`) VALUES
(15, '2022/2023', '1', 'Ahmad Sodikin', NULL, NULL, NULL, '2023-05-04 17:50:43', '2023-05-08 20:47:54'),
(16, '2022/2023', '2', 'Ahmad Sodikin', '9', '9', '9', '2023-05-08 20:49:17', '2023-05-08 20:49:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kompetensi`
--

CREATE TABLE `kompetensi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_siswa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_1_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_1_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapel_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_2_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_2_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapel_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_3_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_3_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapel_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_4_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_4_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapel_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_5_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_5_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapel_6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_6_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_6_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapel_7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kls` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_7_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_7_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapel_8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kls_2` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_8_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_8_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kompetensi`
--

INSERT INTO `kompetensi` (`id`, `id_siswa`, `mapel_1`, `ck_1_1`, `ck_1_2`, `mapel_2`, `ck_2_1`, `ck_2_2`, `mapel_3`, `ck_3_1`, `ck_3_2`, `mapel_4`, `ck_4_1`, `ck_4_2`, `mapel_5`, `ck_5_1`, `ck_5_2`, `mapel_6`, `ck_6_1`, `ck_6_2`, `mapel_7`, `kls`, `ck_7_1`, `ck_7_2`, `mapel_8`, `kls_2`, `ck_8_1`, `ck_8_2`, `created_at`, `updated_at`) VALUES
(3, '19', '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, '4', NULL, NULL, '2023-05-04 17:51:34', '2023-05-07 23:35:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lain_lain`
--

CREATE TABLE `lain_lain` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `lain_lain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lain_lain`
--

INSERT INTO `lain_lain` (`id`, `siswa_id`, `lain_lain`, `created_at`, `updated_at`) VALUES
(12, 19, NULL, '2023-05-04 17:49:00', '2023-05-08 00:39:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meninggalkan_sekolah`
--

CREATE TABLE `meninggalkan_sekolah` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `thn_tamat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ijazah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lanjut_sekolah_tamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dari_tingkat` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ke_tingkat` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lanjut_sekolah_pindah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_keluar_sekolah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_keluar_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `meninggalkan_sekolah`
--

INSERT INTO `meninggalkan_sekolah` (`id`, `siswa_id`, `thn_tamat`, `no_ijazah`, `lanjut_sekolah_tamat`, `dari_tingkat`, `ke_tingkat`, `lanjut_sekolah_pindah`, `tgl_keluar_sekolah`, `alasan_keluar_sekolah`, `created_at`, `updated_at`) VALUES
(12, 19, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '2023-05-04 17:49:00', '2023-05-08 00:39:47');

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
(37, '2014_10_12_000000_create_users_table', 1),
(38, '2014_10_12_100000_create_password_resets_table', 1),
(39, '2019_08_19_000000_create_failed_jobs_table', 1),
(40, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(41, '2023_03_22_034351_create_students_table', 1),
(42, '2023_03_26_073009_create_class_table', 1),
(43, '2023_04_01_080033_create_parents_table', 1),
(44, '2023_04_01_080213_create_progress_students_table', 1),
(50, '2023_04_19_084502_create_pelajar_pancasilas_table', 2),
(51, '2023_04_19_084800_create_pengetahuans_table', 2),
(52, '2023_04_19_084937_create_ekstrakulikulers_table', 2),
(53, '2023_04_19_084953_create_prestasis_table', 2),
(54, '2023_04_19_085027_create_ketidakhadirans_table', 2),
(55, '2023_04_22_235446_create_gurus_table', 3),
(56, '2023_04_28_120535_create_model_kesehatans_table', 4),
(57, '2023_04_28_122145_create_model_beasiswas_table', 4),
(58, '2023_04_28_122607_create_model_meninggalkan_sekolahs_table', 4),
(59, '2023_04_28_123442_create_model_lain_lains_table', 4),
(60, '2023_04_30_043107_create_model_kenaikans_table', 5),
(61, '2023_04_30_043446_create_model_tanda_tangans_table', 5),
(65, '2023_05_02_111333_create_model_kompetensis_table', 6),
(66, '2023_05_03_012548_create_model_ijazahs_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `parents`
--

CREATE TABLE `parents` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `pendidikan_ayah` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_ibu` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `pekerjaan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `nama_wali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `hubungan_wali` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `pendidikan_wali` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_wali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `parents`
--

INSERT INTO `parents` (`id`, `siswa_id`, `nama_ayah`, `nama_ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `nama_wali`, `hubungan_wali`, `pendidikan_wali`, `pekerjaan_wali`, `created_at`, `updated_at`) VALUES
(16, 19, NULL, NULL, 'Tidak Sekolah', 'Tidak Sekolah', NULL, NULL, NULL, NULL, 'Tidak Sekolah', NULL, '2023-05-04 17:49:00', '2023-05-08 00:39:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('egowinasis22@gmail.com', '$2y$10$Jp1Xej5qoe89vzhr8UnT0e65ab4fff/mxYp.kS.08UWUtzh.Fjofi', '2023-04-26 04:59:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelajar_pancasila`
--

CREATE TABLE `pelajar_pancasila` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b1c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b1c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b3c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b3c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b4c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b4c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b5c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b5c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b6c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b6c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelajar_pancasila`
--

INSERT INTO `pelajar_pancasila` (`id`, `tahun_ajaran`, `kelas`, `siswa`, `b1c1`, `b1c2`, `b2c1`, `b2c2`, `b3c1`, `b3c2`, `b4c1`, `b4c2`, `b5c1`, `b5c2`, `b6c1`, `b6c2`, `created_at`, `updated_at`) VALUES
(17, '2022/2023', '1', 'Ahmad Sodikin', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2023-05-04 17:50:43', '2023-05-08 20:47:54'),
(18, '2022/2023', '2', 'Ahmad Sodikin', '1', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '2023-05-08 20:49:17', '2023-05-08 20:49:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengetahuan`
--

CREATE TABLE `pengetahuan` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b1c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b1c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b1c3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b1c4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2c3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2c4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b3c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b3c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b3c3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b3c4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b4c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b4c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b4c3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b4c4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b5c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b5c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b5c3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b5c4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b6c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b6c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b6c3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b6c4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b7c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b7c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b7c3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b7c4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b8c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b8c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b8c3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b8c4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b9c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b9c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b9c3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b9c4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b10c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b10c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b10c3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b10c4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b11c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b11c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b11c3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b11c4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b12c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b12c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b12c3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b12c4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b13c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b13c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b13c3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b13c4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengetahuan`
--

INSERT INTO `pengetahuan` (`id`, `tahun_ajaran`, `kelas`, `siswa`, `b1c1`, `b1c2`, `b1c3`, `b1c4`, `b2c1`, `b2c2`, `b2c3`, `b2c4`, `b3c1`, `b3c2`, `b3c3`, `b3c4`, `b4c1`, `b4c2`, `b4c3`, `b4c4`, `b5c1`, `b5c2`, `b5c3`, `b5c4`, `b6c1`, `b6c2`, `b6c3`, `b6c4`, `b7c1`, `b7c2`, `b7c3`, `b7c4`, `b8c1`, `b8c2`, `b8c3`, `b8c4`, `b9c1`, `b9c2`, `b9c3`, `b9c4`, `b10c1`, `b10c2`, `b10c3`, `b10c4`, `b11c1`, `b11c2`, `b11c3`, `b11c4`, `b12c1`, `b12c2`, `b12c3`, `b12c4`, `b13c1`, `b13c2`, `b13c3`, `b13c4`, `created_at`, `updated_at`) VALUES
(17, '2022/2023', '1', 'Ahmad Sodikin', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2023-05-04 17:50:43', '2023-05-08 20:47:54'),
(18, '2022/2023', '2', 'Ahmad Sodikin', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '2023-05-08 20:49:17', '2023-05-08 20:49:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b1c1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b1c2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2c1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2c2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b3c1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b3c2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id`, `tahun_ajaran`, `kelas`, `siswa`, `b1c1`, `b1c2`, `b2c1`, `b2c2`, `b3c1`, `b3c2`, `created_at`, `updated_at`) VALUES
(16, '2022/2023', '1', 'Ahmad Sodikin', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-04 17:50:43', '2023-05-08 20:47:54'),
(17, '2022/2023', '2', 'Ahmad Sodikin', '9', '9', '9', '9', '9', '9', '2023-05-08 20:49:17', '2023-05-08 20:49:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress_students`
--

CREATE TABLE `progress_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `asal_sekolah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `nama_tk` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `tgl_sttb` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '0000-00-00',
  `no_sttb` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `asal_sekolah_pindah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `tingkat_sekolah_pindah` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_diterima` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '0000-00-00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `progress_students`
--

INSERT INTO `progress_students` (`id`, `siswa_id`, `asal_sekolah`, `nama_tk`, `tgl_sttb`, `no_sttb`, `asal_sekolah_pindah`, `tingkat_sekolah_pindah`, `tgl_diterima`, `created_at`, `updated_at`) VALUES
(16, 19, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-05-04 17:49:00', '2023-05-08 00:39:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `nis` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `no_kk` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `jen_kel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Laki-laki',
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `tgl_lahir` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `jml_saudara` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahasa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `gol_darah` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `tempat_tinggal` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `jarak` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `foto_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user_default_profil.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`id`, `nis`, `nisn`, `nik`, `no_kk`, `nama_lengkap`, `nama_panggilan`, `jen_kel`, `tempat_lahir`, `tgl_lahir`, `agama`, `kewarganegaraan`, `jml_saudara`, `bahasa`, `gol_darah`, `alamat`, `telepon`, `tempat_tinggal`, `jarak`, `foto_siswa`, `created_at`, `updated_at`) VALUES
(19, '2104', '0123456789', '3328120812000001', '3328120812000001', 'Ahmad Sodikin', NULL, 'Laki-laki', 'Tegal', '15-05-2023', 'Islam', NULL, '0', NULL, 'A', NULL, NULL, NULL, NULL, '6454527c956aa.jpg', '2023-05-04 17:49:00', '2023-05-08 00:39:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanda_tangan`
--

CREATE TABLE `tanda_tangan` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepsek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_kepsek` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode_kepsek` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wali_kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_wali_kelas` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode_wali_kelas` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tanda_tangan`
--

INSERT INTO `tanda_tangan` (`id`, `tahun_ajaran`, `kelas`, `siswa`, `kepsek`, `nip_kepsek`, `barcode_kepsek`, `wali_kelas`, `nip_wali_kelas`, `barcode_wali_kelas`, `created_at`, `updated_at`) VALUES
(6, '2022/2023', '1', 'Ahmad Sodikin', 'Hartono, S.Pd.', '0122334343', '645452e3df38f.png', 'Sumiyati, S.Ag.', '55454545', '645452e3e4d0e.png', '2023-05-04 17:50:43', '2023-05-08 20:47:54'),
(7, '2022/2023', '2', 'Ahmad Sodikin', 'Ely Hastuti, S.Pd.SD', '012345689', NULL, 'Ego Winasis, S.Kom.', '0123456789', NULL, '2023-05-08 20:49:17', '2023-05-08 20:49:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'SDN GETASKEREP 01', 'sdngetaskerep1@gmail.com', NULL, '$2y$10$G6hXDEpTOTGQMmIXeIe1SuYiunbtae.cYLaJjvPv6VM5f/nG7Y8au', NULL, '2023-05-03 19:57:12', '2023-05-03 19:57:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `ijazah`
--
ALTER TABLE `ijazah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kenaikan`
--
ALTER TABLE `kenaikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kesehatan_jasmani`
--
ALTER TABLE `kesehatan_jasmani`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ketidakhadiran`
--
ALTER TABLE `ketidakhadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kompetensi`
--
ALTER TABLE `kompetensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lain_lain`
--
ALTER TABLE `lain_lain`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `meninggalkan_sekolah`
--
ALTER TABLE `meninggalkan_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelajar_pancasila`
--
ALTER TABLE `pelajar_pancasila`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `progress_students`
--
ALTER TABLE `progress_students`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_nis_unique` (`nis`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `nisn_2` (`nisn`);

--
-- Indeks untuk tabel `tanda_tangan`
--
ALTER TABLE `tanda_tangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `class`
--
ALTER TABLE `class`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ijazah`
--
ALTER TABLE `ijazah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kenaikan`
--
ALTER TABLE `kenaikan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kesehatan_jasmani`
--
ALTER TABLE `kesehatan_jasmani`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `ketidakhadiran`
--
ALTER TABLE `ketidakhadiran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kompetensi`
--
ALTER TABLE `kompetensi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lain_lain`
--
ALTER TABLE `lain_lain`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `meninggalkan_sekolah`
--
ALTER TABLE `meninggalkan_sekolah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pelajar_pancasila`
--
ALTER TABLE `pelajar_pancasila`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `progress_students`
--
ALTER TABLE `progress_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tanda_tangan`
--
ALTER TABLE `tanda_tangan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;