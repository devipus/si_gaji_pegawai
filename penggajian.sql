-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2019 pada 09.26
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensis`
--

CREATE TABLE `absensis` (
  `id_absensi` int(10) UNSIGNED NOT NULL,
  `id_mengajar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosens`
--

CREATE TABLE `dosens` (
  `id_dosen` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_gol` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `ket_dos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rutinitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosens`
--

INSERT INTO `dosens` (`id_dosen`, `nama`, `alamat`, `hp`, `id_gol`, `status`, `id_pangkat`, `ket_dos`, `rutinitas`, `created_at`, `updated_at`) VALUES
(4, 'Rahmi liza', 'cambai', '0385030', 4, 'gd', 4, 'eree', 'adds', '2019-01-09 15:12:54', '2019-01-09 15:12:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongans`
--

CREATE TABLE `golongans` (
  `id_golongan` int(10) UNSIGNED NOT NULL,
  `golongan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `golongans`
--

INSERT INTO `golongans` (`id_golongan`, `golongan`, `created_at`, `updated_at`) VALUES
(1, '2b', '2019-01-05 09:59:31', '2019-01-05 09:59:31'),
(2, '3b', '2019-01-05 10:18:21', '2019-01-05 10:18:21'),
(3, '4b', '2019-01-05 11:18:29', '2019-01-05 11:18:29'),
(4, '7b', '2019-01-05 14:30:40', '2019-01-05 14:30:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `honors`
--

CREATE TABLE `honors` (
  `id_honor` int(10) UNSIGNED NOT NULL,
  `id_pangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `honor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `honors`
--

INSERT INTO `honors` (`id_honor`, `id_pangkat`, `honor`, `created_at`, `updated_at`) VALUES
(2, '2', '50000', '2019-01-05 12:54:49', '2019-01-05 12:54:49'),
(3, '2', '120000', '2019-01-05 16:47:08', '2019-01-05 16:47:29'),
(4, '4', '40000', '2019-01-08 13:18:24', '2019-01-09 15:11:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusans`
--

CREATE TABLE `jurusans` (
  `id_jurusan` int(10) UNSIGNED NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusans`
--

INSERT INTO `jurusans` (`id_jurusan`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 'Sipil', '2019-01-06 07:33:25', '2019-01-06 07:33:46'),
(2, 'elektro', '2019-01-06 07:33:53', '2019-01-06 07:33:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `created_at`, `updated_at`) VALUES
(1, '8 mia', '2019-01-05 10:18:41', '2019-01-05 10:18:49'),
(3, '12mia', '2019-01-05 10:38:08', '2019-01-05 10:38:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kjms`
--

CREATE TABLE `kjms` (
  `id-kjm` int(10) UNSIGNED NOT NULL,
  `thn_akademik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smt_akademik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_sks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks_wajib` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelebihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kjm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pajak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mengajars`
--

CREATE TABLE `mengajars` (
  `id_mengajar` int(10) UNSIGNED NOT NULL,
  `id_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thn_akademik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smt_akademik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mengajars`
--

INSERT INTO `mengajars` (`id_mengajar`, `id_dosen`, `kode_mk`, `thn_akademik`, `smt_akademik`, `ket`, `id_jurusan`, `id_kelas`, `created_at`, `updated_at`) VALUES
(1, '4', '2', '2018', '7', '1 paket', '1', '1', '2019-01-06 07:49:23', '2019-01-06 07:51:47'),
(2, '7', '2', '2018', '7', '1 paket', '2', '3', '2019-01-08 20:27:44', '2019-01-08 20:27:44');

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_01_02_060137_create_dosens_table', 1),
(8, '2019_01_02_063019_dosen', 1),
(9, '2019_01_02_083855_create_kjms_table', 2),
(10, '2019_01_02_085111_create_honoraria_table', 3),
(11, '2019_01_02_085750_create_pajaks_table', 3),
(12, '2019_01_02_090100_create_mengajars_table', 4),
(13, '2019_01_02_091551_create_mks_table', 5),
(14, '2019_01_02_091801_create_penggajians_table', 5),
(15, '2019_01_02_092421_create_golongans_table', 5),
(16, '2019_01_02_092627_create_jurusans_table', 5),
(17, '2019_01_02_092832_create_kelas_table', 5),
(18, '2019_01_02_093227_create_absensis_table', 5),
(19, '2019_01_05_145953_pangkat', 6),
(20, '2019_01_05_190142_pajak', 7),
(21, '2019_01_05_192108_honor', 8),
(22, '2019_01_05_193851_honor', 9),
(23, '2019_01_05_194152_honor', 10),
(24, '2019_01_06_144836_mengajar', 11),
(25, '2019_01_09_034441_penggajian', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mks`
--

CREATE TABLE `mks` (
  `kode_mk` int(10) UNSIGNED NOT NULL,
  `matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mks`
--

INSERT INTO `mks` (`kode_mk`, `matkul`, `sks`, `smt`, `created_at`, `updated_at`) VALUES
(2, 'mtk', 2, 5, '2019-01-05 10:39:59', '2019-01-05 10:39:59'),
(3, 'bahasa indonesia', 2, 7, '2019-01-05 15:21:34', '2019-01-05 15:21:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pajaks`
--

CREATE TABLE `pajaks` (
  `id_pajak` int(10) UNSIGNED NOT NULL,
  `id_gol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pajak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pajaks`
--

INSERT INTO `pajaks` (`id_pajak`, `id_gol`, `pajak`, `created_at`, `updated_at`) VALUES
(1, '1', '0.5', '2019-01-05 12:03:53', '2019-01-05 12:11:13'),
(2, '4', '0.5', '2019-01-15 08:24:34', '2019-01-15 08:24:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pangkats`
--

CREATE TABLE `pangkats` (
  `id_pangkat` int(10) UNSIGNED NOT NULL,
  `pangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pangkats`
--

INSERT INTO `pangkats` (`id_pangkat`, `pangkat`, `created_at`, `updated_at`) VALUES
(2, 'sekjur', '2019-01-05 09:49:20', '2019-01-09 15:12:20'),
(3, 'PD 2', '2019-01-05 09:50:16', '2019-01-09 15:12:11'),
(4, 'direktur', '2019-01-05 11:18:41', '2019-01-05 11:18:41');

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
-- Struktur dari tabel `penggajians`
--

CREATE TABLE `penggajians` (
  `id_penggajian` int(10) UNSIGNED NOT NULL,
  `id_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  `jml_hadir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `honor_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji_honor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pajak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_gaji_bersih` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penggajians`
--

INSERT INTO `penggajians` (`id_penggajian`, `id_dosen`, `tanggal`, `jml_hadir`, `honor_satuan`, `gaji_honor`, `total_pajak`, `total_gaji_bersih`, `created_at`, `updated_at`) VALUES
(2, '4', '2019-01-01', '10', '40000', '400000', '0.5', '398000', '2019-01-08 21:44:18', '2019-01-15 08:25:06'),
(3, '4', '2019-01-01', '4', '40000', '160000', '', '160000', '2019-01-15 07:14:25', '2019-01-15 08:23:25'),
(4, '4', '2020-03-01', '10', '40000', '400000', '', '400000', '2019-01-15 07:15:01', '2019-01-15 08:23:20'),
(5, '4', '2019-11-01', '5', '40000', '200000', '', '200000', '2019-01-15 08:16:31', '2019-01-15 08:17:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$10$VwZW4pLRAbcVICcxY2Clc.J6iCkyhiJzp7KNNBpRxpdh2BvBJeo4G', 1, 'JMQHhZmpc755NWLAWfEhwvSogF5UL1WMFzYdp1sDRsxGIgnaV3saIFagtlkW', '2019-01-02 00:40:42', '2019-01-02 00:40:42'),
(2, 'rahmi', 'rahmi', '$2y$10$nhSmXnEYgVZsG7oWqcViNeMahhJzl/Z7rwMM8wqAEvgpMVoLBYdQm', 0, 'CMlJxSQogh0GDn5xx9qEq4buWfsf6RK7ZJ7CvH7KjQDDggCWX6nVT2BnDQXJ', '2019-01-02 00:45:46', '2019-01-02 00:45:46'),
(3, 'rahmiliza', 'rahmi liza', '$2y$10$lwecmdNtmd6KI3c4lWZ8H.BL4RjE8qkJVqxPsGlJC/by50WsaCCoa', 0, NULL, '2019-01-02 02:50:40', '2019-01-02 02:50:40'),
(4, 'rendy', 'rendy', '$2y$10$6yjXNgfZm7/vv8A.rU7q2.88JFB1BS1J0zrk3bZGTUttX2Hfez9Ta', 1, NULL, '2019-01-02 03:54:40', '2019-01-02 03:54:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `golongans`
--
ALTER TABLE `golongans`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `honors`
--
ALTER TABLE `honors`
  ADD PRIMARY KEY (`id_honor`);

--
-- Indeks untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `kjms`
--
ALTER TABLE `kjms`
  ADD PRIMARY KEY (`id-kjm`);

--
-- Indeks untuk tabel `mengajars`
--
ALTER TABLE `mengajars`
  ADD PRIMARY KEY (`id_mengajar`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mks`
--
ALTER TABLE `mks`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indeks untuk tabel `pajaks`
--
ALTER TABLE `pajaks`
  ADD PRIMARY KEY (`id_pajak`);

--
-- Indeks untuk tabel `pangkats`
--
ALTER TABLE `pangkats`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indeks untuk tabel `penggajians`
--
ALTER TABLE `penggajians`
  ADD PRIMARY KEY (`id_penggajian`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id_absensi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id_dosen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `golongans`
--
ALTER TABLE `golongans`
  MODIFY `id_golongan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `honors`
--
ALTER TABLE `honors`
  MODIFY `id_honor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id_jurusan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kjms`
--
ALTER TABLE `kjms`
  MODIFY `id-kjm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mengajars`
--
ALTER TABLE `mengajars`
  MODIFY `id_mengajar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `mks`
--
ALTER TABLE `mks`
  MODIFY `kode_mk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pajaks`
--
ALTER TABLE `pajaks`
  MODIFY `id_pajak` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pangkats`
--
ALTER TABLE `pangkats`
  MODIFY `id_pangkat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penggajians`
--
ALTER TABLE `penggajians`
  MODIFY `id_penggajian` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
