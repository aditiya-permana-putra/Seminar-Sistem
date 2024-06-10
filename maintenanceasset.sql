-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2024 pada 14.03
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fix`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `uraian_masalah` text NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `biaya` varchar(255) DEFAULT 'Pending',
  `status` varchar(255) DEFAULT 'Pending',
  `status_manager` varchar(255) DEFAULT 'Pending',
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_02_28_002822_create_sessions_table', 1),
(7, '2024_03_04_012314_create_permission_tables', 1),
(8, '2024_05_31_141915_create_surat_tabel', 1),
(9, '2024_05_31_142107_create_barang_tabel', 1),
(10, '2024_05_31_142258_add_foreign_user_to_surat_tabel', 1),
(11, '2024_05_31_143437_add_foreign_barang_to_surat_tabel', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(4, 'App\\Models\\User', 13),
(5, 'App\\Models\\User', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'management-access', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(2, 'master-data', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(3, 'table-user', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(4, 'ubah-user', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(5, 'tambah-user', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(6, 'hapus-user', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(7, 'table-role', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(8, 'ubah-role', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(9, 'tambah-role', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(10, 'tambah-permission-role', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(11, 'hapus-role', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(12, 'table-permission', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(13, 'ubah-permission', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(14, 'tambah-permission', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(15, 'hapus-permission', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(16, 'table-permintaan', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(17, 'tambah-permintaan', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(18, 'ubah-permintaan', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(19, 'detail-permintaan', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(20, 'hapus-permintaan', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(21, 'permintaan', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(22, 'approve-manager-klinik', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(23, 'approve-manager-umum', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(24, 'approve-kepala-bidang', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(25, 'cetak-surat', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(2, 'Unit', 'web', '2024-06-01 12:02:58', '2024-06-01 12:02:58'),
(3, 'Manager Klinik', 'web', '2024-06-01 12:02:59', '2024-06-01 12:02:59'),
(4, 'Manager Operasional & Umum', 'web', '2024-06-01 12:02:59', '2024-06-01 12:02:59'),
(5, 'Kepala Bidang Operasional & Umum', 'web', '2024-06-01 12:02:59', '2024-06-01 12:02:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(17, 2),
(17, 3),
(17, 4),
(17, 5),
(18, 2),
(18, 3),
(18, 4),
(18, 5),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(20, 2),
(20, 3),
(20, 4),
(20, 5),
(21, 2),
(22, 3),
(23, 4),
(24, 5),
(25, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT 'Pending',
  `lampiran` varchar(255) DEFAULT NULL,
  `disposisi` varchar(255) DEFAULT NULL,
  `tgl_disposisi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `jabatan` varchar(255) NOT NULL,
  `ttd` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `jabatan`, `ttd`, `foto`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Arinda Hani', 'admin', NULL, '$2y$12$Yw3KNjKxYOjWBzZs2ZbXQev/nXDP.lbYbRJVb5f7k6DxDIoDqw0aO', NULL, NULL, NULL, 'Koordinator', NULL, NULL, NULL, NULL, NULL, '2024-06-01 12:02:59', '2024-06-01 12:02:59'),
(2, 'dr. A.A Eko Basuki', 'nlmku', NULL, '$2y$12$GO/pLb9ZDbmqvUHLvuo2W.Rfdkaqtq2aLJkeP/Q3rjvUZVkcHmyvm', NULL, NULL, NULL, 'Kepala Klinik Utama Nusa Lima', NULL, NULL, NULL, NULL, NULL, '2024-06-01 12:02:59', '2024-06-01 12:02:59'),
(3, 'dr. Hafizur Rahman', 'nlmkpn', NULL, '$2y$12$8vT5kHrLPZgYEQf738fHIeVsboB7XpjPV28XOtDRBbKVqdBF/95lO', NULL, NULL, NULL, 'Kepala Klinik Pratama Nusalima Pekanbaru', NULL, NULL, NULL, NULL, NULL, '2024-06-01 12:03:00', '2024-06-01 12:03:00'),
(4, 'dr. Vita Aulia', 'nlmsgh', NULL, '$2y$12$A9QY.ddNquA7KIOE3pVbAu2p.JX4IjZH4/aVxg.A.X/yRXa/Zyhdy', NULL, NULL, NULL, 'Kepala Klinik Pratama Emplasment Sei Galuh', NULL, NULL, NULL, NULL, NULL, '2024-06-01 12:03:00', '2024-06-01 12:03:00'),
(5, 'dr. Dwi Kusuma Ferridawati', 'nlmsli', NULL, '$2y$12$6Y03kGpgbv9WWPujKN4acOXCN/yRdoBAFEvNYD.odeFvS6sQNTgtK', NULL, NULL, NULL, 'Kepala Klinik Pratama Emplasment Sei Lindai', NULL, NULL, NULL, NULL, NULL, '2024-06-01 12:03:00', '2024-06-01 12:03:00'),
(6, 'dr. M.Iqbal Nusa', 'nlmlda', NULL, '$2y$12$v7vxVTlwoifmzAFWFy1xkueDuatfQ8m06LeUCUx3ZencJAElFKaf.', NULL, NULL, NULL, 'Kepala Klinik Pratama Emplasment Lubuk Dalam', NULL, NULL, NULL, NULL, NULL, '2024-06-01 12:03:01', '2024-06-01 12:03:01'),
(7, 'dr. M. Reski Hakim', 'nlmtrt', NULL, '$2y$12$8P64cez53FzyJpYRnLi0FuMhsDc04mgWDwgqa/.GSMTWNqFJCVKVG', NULL, NULL, NULL, 'Kepala Klinik Pratama Emplasment Terantam', NULL, NULL, NULL, NULL, NULL, '2024-06-01 12:03:01', '2024-06-01 12:03:01'),
(8, 'dr. Rizki Mulia Abidin', 'nlmksk', NULL, '$2y$12$vhRJbqjl2nxpSTc0ZCAJE.QDZNNE93CboUV6lbclGZehH4KIYQYD6', NULL, NULL, NULL, 'Kepala Klinik Pratama Emplasment Terantam', NULL, NULL, NULL, NULL, NULL, '2024-06-01 12:03:01', '2024-06-01 12:03:01'),
(9, 'dr. Putri Arianti', 'nlmsro', NULL, '$2y$12$gKdl4orkhuOxN0hUy7TcSuBWYwdXq2MY2y0kGdiz0/ntqRIk26t8K', NULL, NULL, NULL, 'Kepala Klinik Pratama Emplasment Sri Rokan', NULL, NULL, NULL, NULL, NULL, '2024-06-01 12:03:02', '2024-06-01 12:03:02'),
(10, 'dr. Garo', 'nlmgaro', NULL, '$2y$12$KDIqe9Hjf4M/1dTWY3aJN.QiXNny/QV7wWu6VIA3EAS8QEjfCQcXu', NULL, NULL, NULL, 'Kepala Klinik Pratama Emplasment Garo', NULL, NULL, NULL, NULL, NULL, '2024-06-01 12:03:02', '2024-06-01 12:03:02'),
(11, 'dr. Ahmad Syubki Asy\'ari', 'managerklinik', NULL, '$2y$12$fM/51BUwPCyMIp/CJ/0UFORIVG1ZlpVCLAVEWYOd4t9z9ziEUZUqC', NULL, NULL, NULL, 'Manager Klinik', NULL, NULL, NULL, NULL, NULL, '2024-06-01 12:03:02', '2024-06-01 12:03:02'),
(12, 'Debie Herani Monica, SE', 'kabid', NULL, '$2y$12$SzjSMth7nqw0UtC/yYxTkO6YnVnaNNt8vP9k2OGBaimI.sD65B6de', NULL, NULL, NULL, 'Kepala Bidang Operasional & Umum', NULL, NULL, NULL, NULL, NULL, '2024-06-01 12:03:02', '2024-06-01 12:03:02'),
(13, 'Rini Yulianti, Ssi,Apt', 'managerumum', NULL, '$2y$12$cJZ9Xy7VMC7sg4KDKYyo8.lEXUg0o3HMFAbADAKEiqMEnTONxGO7a', NULL, NULL, NULL, 'Manager Operasional & Umum', NULL, NULL, NULL, NULL, NULL, '2024-06-01 12:03:03', '2024-06-01 12:03:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_barang_to_surat` (`surat_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang_to_surat` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
