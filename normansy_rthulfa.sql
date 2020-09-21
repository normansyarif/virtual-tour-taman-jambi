-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2020 at 01:15 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `normansy_rthulfa`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taman_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `nama`, `deskripsi`, `waktu_mulai`, `waktu_selesai`, `foto`, `taman_id`, `created_at`, `updated_at`) VALUES
(1, 'Ngobrolin Kampung Kito', '<p>Humas Kota Jambi menggelar program diskusi publik dengan konsep outdoor dan kekinian bertajuk &quot;Ngobrolin Kampung Kito, Kota Jambi Becakap&quot;. Acara ini akan&nbsp;mengupas tema &quot;Visi Kepemimpinan di Era Kota Jambi Terkini&quot;.</p>\r\n\r\n<p>Kegiatan ini akan diikuti oleh peserta generasi millenial, yang berasal dari berbagai komunitas yang ada di Provinsi Jambi.</p>\r\n\r\n<p><br />\r\n<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<p><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<p><br />\r\n<br />\r\n&nbsp;</p>', '2020-08-10 08:00:00', '2020-08-10 10:00:00', 'fasha-diskusi-taman-remaja4_1597039642.jpg', 8, '2020-08-09 23:21:13', '2020-08-10 06:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
(4, '2020_07_28_235444_create_taman_table', 1),
(5, '2020_08_09_230304_create_events_table', 2),
(6, '2020_08_10_003809_create_review_table', 3),
(7, '2020_09_08_064502_create_partisipasi_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `partisipasi`
--

CREATE TABLE `partisipasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggapan` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `taman_id` int(11) NOT NULL,
  `komentar` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taman`
--

CREATE TABLE `taman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latlng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_pendek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_panjang` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vt_media` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taman`
--

INSERT INTO `taman` (`id`, `nama`, `latlng`, `alamat`, `deskripsi_pendek`, `deskripsi_panjang`, `foto`, `vt_media`, `created_at`, `updated_at`) VALUES
(7, 'Taman Jomblo', '-1.6304828,103.6073885', 'Jl. Jend. Basuki Rahmat, Paal Lima, Kec. Kota Baru, Kota Jambi, Jambi 36129', 'Taman Jomblo  merupakan sebuah pedestrian yang dilengkapi sarana permainan dan olahraga', '<p>Taman Jomblo &nbsp;merupakan sebuah pedestrian yang dilengkapi dengan sarana permainan dan olahraga,diresmikan oleh wali kota Syarif Fasha pada 27 Maret 2016, berlokasi di dekat kantor walikota Jambi. Menurut Kepala Bagian Humas Setda Kota Jambi, Abu Bakar, Jomblo dalam nama taman tersebut artinya Jambi Orang Melayu Bangkit.</p>\r\n\r\n<p>Kawasan Wisata Taman (Pendestrian) Jomblo ini selalu dipadati puluhan dan ratusan wisatawan dari berbagai daerah, apa lagi dihari libur para pengunjung berdatangan baik dalam kota hingga dari luar kota jambi di Setiap sore harinya.&nbsp;Selain diisi dengan&nbsp;&nbsp;tanaman, taman kota ini juga dilengkapi dengan sarana rekreasi dan olahraga, wifi corner, kadang ada mobil perpustakaan keliling sehingga masyarakat dapat membaca sekaligus bersantai menghirup udara segar.</p>\r\n\r\n<p>Taman ini pun dilengkapi dengan berbagai macam kuliner, mulai dari rujak, mie ayam, bakso bakar, pempek, hingga es tebu lengkap ada di sini.&nbsp;Meskipun Taman Jomblo dipenuhi orang-orang dan pedagang kaki lima, taman ini tetap terjaga kebersihan lingkungannya. Banyaknya tempat sampah disepanjang jalan taman adalah salah satu faktor yang membuat taman ini kelihatan bersih.</p>', 'WhatsApp Image 2020-07-06 at 09.53.48_1596104116.jpeg', 'jomblo1', '2020-07-30 10:15:17', '2020-09-21 03:43:37'),
(8, 'Taman Arena Remaja', '-1.633622,103.6126767', 'Jalan Haji Agus Salim, Kecamatan Kota Baru, Kota Jambi.', 'Taman Arena Remaja, Tongkrongan Hits Kawula Muda Jambi', '<p>Taman Remaja merupakan sebuah tempat wisata yang berada di kota baru jambi. Taman yang berada di Jl. H. Agus Salim ini mempunyai suasana yang sangat rindang dan sejuk karena terdapat pohon-pohon besar serta berbagai jenis bunga yang ditanam di sana.Akses ke lokasi mudah dijangkau, karena berada dikawasan kota baru yang merupakan pusat pemerintahan Pemkot Jambi. Taman ini hanya berjarak sekitar 300 meter dari Tugu Keris Siginjai dan Taman Jomblo.</p>\r\n\r\n<p><br />\r\nPengunjung taman ini dapat menikmati bersantai dengan duduk dibangku-bangku kecil, ayunan dan arena permainan yang telah disediakan.taman remaja juga menyediakan beberapa fasilitas bermain, pendopo, dan juga panggung yang biasanya dijadikan sebagai tempat pertunjukan seni. Area depan taman remaja juga terbilang luas dan rindang, karena terdapat pepohonan besar. Area depan itulah yang dimanfaatkan sebagai tempat parkir kendaraan pengunjung serta tempat para pedagang menjajakan dagangannya. Berjalan-jalan sambil menghirup udara segar yang jauh dari polusi udara membuat para pengunjung betah berlama-lama ditaman ini.</p>\r\n\r\n<p><small>Foto-foto sumber Google</small></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'WhatsApp Image 2020-07-06 at 09.58.58_1596977993.jpeg', 'remaja1', '2020-08-09 12:59:54', '2020-09-21 03:42:39'),
(9, 'Taman Kongko', '0,0', '', NULL, '', '', 'kongko1', NULL, NULL),
(10, 'Danau Sipin', '0,0', '', NULL, '', '', 'sipin25', NULL, NULL),
(11, 'Gubernuran', '0,0', '', NULL, '', '', 'gubernuran1', NULL, NULL),
(12, 'Taman Makalam', '0,0', '', NULL, '', '', 'makalam9', NULL, NULL),
(13, 'Taman PKK', '0,0', '', NULL, '', '', 'pkk5', NULL, NULL),
(14, 'Taman Anggrek', '0,0', '', NULL, '', '', 'anggrek1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 1, 'rth@unja.ac.id', NULL, '$2y$10$G/MEYWZm.tnRl/Ka1ZASk.wnWDMBZS.0xyqRYvKeinoTFLSfEqW/K', NULL, '2020-08-09 17:34:43', '2020-08-09 19:32:33'),
(2, 'User Biasa', 0, 'biasa@gmail.com', NULL, '$2y$10$.6b05Fo61lFkPIdksQEpluYExCwT0QV693iz4uSHHPaQNRUf45sK6', NULL, '2020-08-09 19:40:47', '2020-08-09 19:40:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partisipasi`
--
ALTER TABLE `partisipasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taman`
--
ALTER TABLE `taman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `partisipasi`
--
ALTER TABLE `partisipasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `taman`
--
ALTER TABLE `taman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
