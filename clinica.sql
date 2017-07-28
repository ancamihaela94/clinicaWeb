-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 Iul 2017 la 17:34
-- Versiune server: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinica`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `medic_id` int(10) UNSIGNED NOT NULL,
  `clinic_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 - pending; 2- approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `medic_id`, `clinic_id`, `section_id`, `reason`, `date`, `created_at`, `updated_at`, `status`) VALUES
(3, 3, 6, 9, 1, 'sick', '2017-07-24 21:00:00', '2017-07-24 10:46:23', '2017-07-24 10:46:23', 1),
(4, 16, 4, 16, 1, 'ay', '2018-04-14 15:30:00', '2017-07-28 08:10:54', '2017-07-28 08:10:54', 1),
(5, 13, 4, 16, 1, NULL, '2017-08-12 14:40:00', '2017-07-28 09:02:45', '2017-07-28 09:02:45', 1),
(6, 13, 4, 16, 1, NULL, '2017-02-12 14:00:00', '2017-07-28 09:30:21', '2017-07-28 09:30:21', 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Slatina', '2017-07-18 11:48:30', '2017-07-19 12:41:02'),
(4, 'Braila', '2017-07-17 15:31:03', '2017-07-17 15:31:03'),
(6, 'Galati', '2017-07-18 11:48:39', '2017-07-18 11:48:45'),
(8, 'Pitesti', '2017-07-18 15:05:03', '2017-07-18 15:05:12'),
(13, 'Targoviste', '2017-07-18 10:07:32', '2017-07-28 05:45:07'),
(14, 'Cluj', '2017-07-18 10:09:14', '2017-07-18 10:09:14'),
(15, 'Timisoara', '2017-07-18 12:45:42', '2017-07-18 12:45:42'),
(16, 'Sibiu', '2017-07-18 12:47:07', '2017-07-18 14:38:04'),
(17, 'Mangalia', '2017-07-18 13:00:46', '2017-07-18 13:00:46'),
(18, 'Sighisoara', '2017-07-18 13:05:57', '2017-07-18 13:05:57'),
(19, 'Alba Iulia', '2017-07-18 13:08:28', '2017-07-18 13:08:28'),
(20, 'Craiova', '2017-07-18 13:09:46', '2017-07-18 13:09:46'),
(23, 'Constanta', '2017-07-18 14:37:16', '2017-07-19 16:00:20'),
(26, 'Chisinau', '2017-07-19 06:30:24', '2017-07-19 06:33:55'),
(27, 'Arad', '2017-07-18 16:53:40', '2017-07-19 06:35:12'),
(28, 'Dej', '2017-07-18 16:53:40', '2017-07-19 06:35:12'),
(32, 'Ialomita', '2017-07-24 11:52:37', '2017-07-24 11:52:37'),
(33, 'Bacau', '2017-07-25 06:58:13', '2017-07-25 06:58:13'),
(34, 'Bucuresti', '2017-07-25 06:59:40', '2017-07-25 06:59:40');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `clinics`
--

CREATE TABLE `clinics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `clinics`
--

INSERT INTO `clinics` (`id`, `name`, `city_id`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Clinica Pipera', 34, 1, '2017-07-19 13:14:31', '2017-07-19 13:14:31'),
(13, 'Clinica Cotroceni', 34, 1, '2017-07-20 04:57:06', '2017-07-24 11:52:56'),
(14, 'Campus Medical Bacau', 33, 1, '2017-07-24 11:53:20', '2017-07-25 06:58:25'),
(15, 'Clinica Slatina', 3, 1, '2017-07-25 07:00:35', '2017-07-25 07:00:35'),
(16, 'Policlinica Braila', 4, 1, '2017-07-25 07:01:02', '2017-07-25 07:01:02'),
(17, 'Policlinica Craiova', 20, 1, '2017-07-25 16:32:38', '2017-07-25 16:32:38'),
(19, 'Clinica Alba', 19, 1, '2017-07-28 10:19:04', '2017-07-28 10:19:04');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `clinics_sections`
--

CREATE TABLE `clinics_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `clinic_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `clinics_sections`
--

INSERT INTO `clinics_sections` (`id`, `section_id`, `clinic_id`, `created_at`, `updated_at`) VALUES
(16, 1, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(17, 2, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(18, 4, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(19, 5, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(20, 6, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(21, 7, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(22, 8, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(23, 9, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(24, 10, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(25, 11, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(26, 12, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(27, 13, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(28, 14, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(29, 15, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(30, 16, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(31, 17, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(32, 18, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(33, 19, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(34, 20, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(35, 21, 16, '2017-07-25 07:31:12', '2017-07-25 07:31:12'),
(109, 1, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(110, 2, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(111, 4, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(112, 5, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(113, 6, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(114, 7, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(115, 8, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(116, 9, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(117, 10, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(118, 11, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(119, 12, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(120, 13, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(121, 14, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(122, 15, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(123, 16, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(124, 17, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(125, 18, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(126, 19, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(127, 20, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(128, 21, 9, '2017-07-28 10:05:43', '2017-07-28 10:05:43'),
(129, 4, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(130, 5, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(131, 6, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(132, 7, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(133, 8, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(134, 9, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(135, 10, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(136, 11, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(137, 12, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(138, 13, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(139, 14, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(140, 15, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(141, 16, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(142, 17, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(143, 18, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(144, 19, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(145, 20, 13, '2017-07-28 10:05:52', '2017-07-28 10:05:52'),
(146, 1, 14, '2017-07-28 10:06:10', '2017-07-28 10:06:10'),
(147, 4, 14, '2017-07-28 10:06:10', '2017-07-28 10:06:10'),
(148, 7, 14, '2017-07-28 10:06:10', '2017-07-28 10:06:10'),
(149, 8, 14, '2017-07-28 10:06:10', '2017-07-28 10:06:10'),
(150, 9, 14, '2017-07-28 10:06:10', '2017-07-28 10:06:10'),
(151, 12, 14, '2017-07-28 10:06:10', '2017-07-28 10:06:10'),
(152, 13, 14, '2017-07-28 10:06:10', '2017-07-28 10:06:10'),
(153, 14, 14, '2017-07-28 10:06:10', '2017-07-28 10:06:10'),
(154, 17, 14, '2017-07-28 10:06:10', '2017-07-28 10:06:10'),
(155, 18, 14, '2017-07-28 10:06:10', '2017-07-28 10:06:10'),
(156, 19, 14, '2017-07-28 10:06:10', '2017-07-28 10:06:10'),
(157, 4, 15, '2017-07-28 10:08:12', '2017-07-28 10:08:12'),
(158, 9, 15, '2017-07-28 10:08:12', '2017-07-28 10:08:12'),
(159, 10, 15, '2017-07-28 10:08:12', '2017-07-28 10:08:12'),
(160, 11, 15, '2017-07-28 10:08:12', '2017-07-28 10:08:12'),
(161, 12, 15, '2017-07-28 10:08:12', '2017-07-28 10:08:12'),
(162, 15, 15, '2017-07-28 10:08:12', '2017-07-28 10:08:12'),
(163, 16, 15, '2017-07-28 10:08:12', '2017-07-28 10:08:12'),
(164, 17, 15, '2017-07-28 10:08:12', '2017-07-28 10:08:12'),
(165, 18, 15, '2017-07-28 10:08:12', '2017-07-28 10:08:12'),
(166, 20, 15, '2017-07-28 10:08:12', '2017-07-28 10:08:12'),
(167, 1, 17, '2017-07-28 10:09:18', '2017-07-28 10:09:18'),
(168, 2, 17, '2017-07-28 10:09:18', '2017-07-28 10:09:18'),
(169, 4, 17, '2017-07-28 10:09:18', '2017-07-28 10:09:18'),
(170, 5, 17, '2017-07-28 10:09:18', '2017-07-28 10:09:18'),
(171, 6, 17, '2017-07-28 10:09:19', '2017-07-28 10:09:19'),
(172, 7, 17, '2017-07-28 10:09:19', '2017-07-28 10:09:19'),
(173, 8, 17, '2017-07-28 10:09:19', '2017-07-28 10:09:19'),
(174, 9, 17, '2017-07-28 10:09:19', '2017-07-28 10:09:19'),
(175, 10, 17, '2017-07-28 10:09:19', '2017-07-28 10:09:19'),
(176, 11, 17, '2017-07-28 10:09:19', '2017-07-28 10:09:19'),
(177, 12, 17, '2017-07-28 10:09:19', '2017-07-28 10:09:19'),
(178, 13, 17, '2017-07-28 10:09:19', '2017-07-28 10:09:19'),
(179, 14, 17, '2017-07-28 10:09:19', '2017-07-28 10:09:19'),
(180, 15, 17, '2017-07-28 10:09:19', '2017-07-28 10:09:19'),
(181, 16, 17, '2017-07-28 10:09:19', '2017-07-28 10:09:19'),
(182, 17, 17, '2017-07-28 10:09:19', '2017-07-28 10:09:19'),
(183, 18, 17, '2017-07-28 10:09:19', '2017-07-28 10:09:19'),
(184, 19, 17, '2017-07-28 10:09:19', '2017-07-28 10:09:19'),
(185, 20, 17, '2017-07-28 10:09:19', '2017-07-28 10:09:19'),
(186, 21, 17, '2017-07-28 10:09:19', '2017-07-28 10:09:19'),
(187, 1, 19, '2017-07-28 10:21:36', '2017-07-28 10:21:36'),
(188, 2, 19, '2017-07-28 10:21:36', '2017-07-28 10:21:36'),
(189, 4, 19, '2017-07-28 10:21:36', '2017-07-28 10:21:36'),
(190, 5, 19, '2017-07-28 10:21:36', '2017-07-28 10:21:36'),
(191, 6, 19, '2017-07-28 10:21:36', '2017-07-28 10:21:36'),
(192, 8, 19, '2017-07-28 10:21:36', '2017-07-28 10:21:36'),
(193, 9, 19, '2017-07-28 10:21:36', '2017-07-28 10:21:36'),
(194, 10, 19, '2017-07-28 10:21:36', '2017-07-28 10:21:36'),
(195, 11, 19, '2017-07-28 10:21:36', '2017-07-28 10:21:36'),
(196, 12, 19, '2017-07-28 10:21:36', '2017-07-28 10:21:36'),
(197, 13, 19, '2017-07-28 10:21:36', '2017-07-28 10:21:36'),
(198, 14, 19, '2017-07-28 10:21:36', '2017-07-28 10:21:36'),
(199, 15, 19, '2017-07-28 10:21:36', '2017-07-28 10:21:36'),
(200, 16, 19, '2017-07-28 10:21:36', '2017-07-28 10:21:36'),
(201, 18, 19, '2017-07-28 10:21:36', '2017-07-28 10:21:36'),
(202, 20, 19, '2017-07-28 10:21:36', '2017-07-28 10:21:36');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2017_07_17_181049_create_cities_table', 2),
(19, '2017_07_18_181141_create_clinics_table', 3),
(20, '2017_07_19_113511_create_sections_table', 4),
(22, '2017_07_20_142727_clinics-sections', 5),
(23, '2017_07_20_144116_add_section_to_users_table', 6),
(24, '2017_07_24_101009_create_appointments_table', 7),
(25, '2017_07_24_101545_remove_status_from_clinics_sections_table', 8),
(26, '2017_07_24_141111_create_records_table', 9),
(27, '2017_07_25_105629_add_unique_constraint_clinics_sections', 10),
(28, '2017_07_26_153107_add_status_appointments_table', 11),
(29, '2017_07_27_125148_add_clinic_id_to_users_table', 12);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `records`
--

CREATE TABLE `records` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `medic_id` int(10) UNSIGNED NOT NULL,
  `clinic_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `records`
--

INSERT INTO `records` (`id`, `user_id`, `medic_id`, `clinic_id`, `section_id`, `description`, `created_at`, `updated_at`) VALUES
(3, 3, 1, 15, 5, 'Descrierea acestui caz e relativ complicata', '2017-07-25 07:04:00', '2017-07-25 07:04:00'),
(4, 3, 1, 15, 5, 'Descrierea acestui caz e relativ complicata', '2017-07-25 07:04:18', '2017-07-25 07:04:18'),
(5, 3, 1, 14, 1, 'crazey', '2017-07-25 07:06:17', '2017-07-25 07:06:17'),
(6, 24, 1, 9, 4, 'ceva', '2017-07-25 07:07:40', '2017-07-25 07:07:40'),
(7, 3, 1, 9, 1, 'e bolanv', '2017-07-25 16:34:10', '2017-07-25 16:34:10'),
(8, 3, 7, 13, 9, 'probleme auz', '2017-07-25 16:35:35', '2017-07-25 16:35:35');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `sections`
--

INSERT INTO `sections` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Psihologie', '2017-07-19 08:48:17', '2017-07-19 11:31:37'),
(2, 'Terapie Intensiva', '2017-07-19 16:02:15', '2017-07-19 16:02:29'),
(4, 'Medicina Interna', '2017-07-25 06:53:25', '2017-07-25 06:53:25'),
(5, 'Cardiologie', '2017-07-25 06:53:34', '2017-07-25 06:53:34'),
(6, 'Chirurgie Generala', '2017-07-25 06:53:41', '2017-07-25 06:53:41'),
(7, 'Neurologie', '2017-07-25 06:53:48', '2017-07-25 06:53:48'),
(8, 'Ortopedie', '2017-07-25 06:54:00', '2017-07-25 06:54:00'),
(9, 'ORL', '2017-07-25 06:54:06', '2017-07-25 06:54:06'),
(10, 'Radiologie', '2017-07-25 06:54:16', '2017-07-25 06:54:16'),
(11, 'Dermatologie', '2017-07-25 06:54:24', '2017-07-25 06:54:24'),
(12, 'Endocrinologie', '2017-07-25 06:54:31', '2017-07-25 06:54:31'),
(13, 'Chirurgie Plastica', '2017-07-25 06:54:54', '2017-07-25 06:54:54'),
(14, 'Oftalmologie', '2017-07-25 06:55:20', '2017-07-25 06:55:20'),
(15, 'Medicina Generala', '2017-07-25 06:55:47', '2017-07-25 06:55:47'),
(16, 'Medicina de familie', '2017-07-25 06:56:26', '2017-07-25 06:56:26'),
(17, 'Medicina Muncii', '2017-07-25 06:56:33', '2017-07-25 06:56:33'),
(18, 'Pediatrie', '2017-07-25 06:56:40', '2017-07-25 06:56:40'),
(19, 'Reumatologie', '2017-07-25 06:57:03', '2017-07-25 06:57:03'),
(20, 'Boli Infectioase', '2017-07-25 06:57:17', '2017-07-25 06:57:17'),
(21, 'Kinetoterapie', '2017-07-25 06:57:36', '2017-07-25 06:57:36');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'status 1 - activ; status 2 - inactiv',
  `type` tinyint(4) NOT NULL DEFAULT '3',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `clinic_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_number`, `status`, `type`, `remember_token`, `created_at`, `updated_at`, `section_id`, `clinic_id`) VALUES
(1, 'Anca', 'anca.popa@zitec.com', '$2y$10$f3q0vpy0dheOho1gT5hoFeOSAI12JjYrnTn7lGCj3zcrg/necKNp.', NULL, 1, 1, 'ufy7BsnSWZQSvx5izogWLapF0AxvrhbP9O0vxnzFN2HrNL8Qlnj2xsU1NYOg', '2017-07-17 14:15:27', '2017-07-17 14:15:27', NULL, NULL),
(3, 'Anca Mihaela', 'anca@user.com', '$2y$10$3Ac1lrjGt7CUfEC02GcNSuCGzEq.d8FZEIRgnM4eziJMmcr.By816', NULL, 1, 3, 'yzvKg8n0uPWpx4SdHxh3bSwbbiCK3rXc9EyA9dEzgfnmM1zxFcqG55fbroOV', '2017-07-20 05:37:06', '2017-07-25 07:13:19', NULL, NULL),
(4, 'Maria Ion', 'maria.ion@email.com', 'qwerty123', '0724512930', 2, 2, NULL, '2017-07-20 06:03:11', '2017-07-20 11:54:32', 1, 16),
(6, 'Ionescu Dan', 'ionescu.dan@email.com', 'qwerty123', '0707326513', 1, 2, NULL, '2017-07-20 06:19:52', '2017-07-28 10:22:44', 2, 14),
(7, 'Popescu Silvia', 'popescu.silvia@email.com', '$2y$10$/DzkghXBJfUrEQxm6zUGMOpFTv.tlejR2LFAaQKvqflY3CV2BUepC', '0734123952', 1, 2, '8BAVz9cuQh9PmrXT7q1C3FinyHHQT1ObDw2q1zCgR4U3eu3N7ElXmYvpwe0O', '2017-07-20 06:22:21', '2017-07-28 10:24:59', 1, 16),
(9, 'Gelu Balan', 'ancap@email.com', '$2y$10$eDLHSCEtuMRZmXTRlGwR1.1IMhTW58AL/cqOAuwvaemUPGAjDFvDu', NULL, 1, 3, NULL, '2017-07-20 10:02:17', '2017-07-20 10:02:17', NULL, NULL),
(12, 'Pavel Ion', 'ancap1@email.com', '$2y$10$6kE0DHjCrw4kRkF/2HYMxODmtJ2.iLW2o6rFJ3CznltU9omMdCNY.', NULL, 1, 3, NULL, '2017-07-20 10:03:49', '2017-07-20 10:03:49', NULL, NULL),
(13, 'Marian Piron', 'ancap11@email.com', '$2y$10$fIQSo5bB0edQxC4zh6zJROmcFId5ASV1qz3a7l0/Wz668c6QCxdoO', NULL, 1, 3, 'RRF6i70y7iDxSruLdleNDA07sC047nL4K5XaFx9SYz4Mz93WbOxers29fkPa', '2017-07-20 10:05:30', '2017-07-20 10:05:30', NULL, NULL),
(15, 'Larisa Mincu', 'ancap111@email.com', '$2y$10$7Xb9u..msGiTuUiuy5LiYuEl1wCca7DXrpEodYAaiwaCmu2ugusmO', NULL, 1, 3, '5B0gdaTCJpWukPgFWhweJrpcw8Vp43r3H0HyKx6kCCtsapcwDxuAAtQvMBGE', '2017-07-20 10:06:29', '2017-07-20 10:06:29', NULL, NULL),
(16, 'Gina Mirel', 'ancap1111@email.com', '$2y$10$s1PpdIN0rdJlII0p5ilwZuYOKhBo3rGpDQgtAlgl/kzdDXUBwBBJy', NULL, 1, 3, 'SfLi1umBUBY0acLZHf7J0hbJssFBUvqtC6FK7iOSBDJTXLioAE3htYzWO0Yb', '2017-07-20 10:07:31', '2017-07-20 10:07:31', NULL, NULL),
(17, 'Anca Lucretia', 'ancap11111@email.com', '$2y$10$AasbPcZAE.uKX5VN2MQzpuUcc9vSW2xwmHkDAT7bwsVIMCu0g/zYu', NULL, 1, 3, NULL, '2017-07-20 10:14:41', '2017-07-20 10:14:41', NULL, NULL),
(19, 'Andreea Dinu', 'ancap1111111@email.com', '$2y$10$qTtFQMS2LYc5MBQym5y70.RubmiPA/VpsHN3r.FirmyvvJ2H/9fj.', NULL, 1, 3, 'p6tvYDDL6hZz51LrWWdcJGuHiKDXk262E6FMKaFEAHkcGsr91Gq5H5bG7kKi', '2017-07-20 10:15:15', '2017-07-20 10:15:15', NULL, NULL),
(20, 'Dan Dumitru', 'ancap2@email.com', '$2y$10$es6KJ.Q7VW3Ued5OCeV/gukq9HrNq2G921kOLvtCYHqQGI6auOBuC', NULL, 1, 3, '79gf0A4FxCUMI29tyNIAfokmrXp1BK7PIXpau5fRfUjxxLoiUwG6dqPWfevf', '2017-07-20 10:15:35', '2017-07-20 10:15:35', NULL, NULL),
(21, 'Ion Patru', 'ancap3@email.com', '$2y$10$15ldGvPPiNVg.ixg7RJcmeWf/faszyuL8cAYStpfbUKIawdqmwSDm', NULL, 1, 3, 'UmqgKGMkyEgGWVNAGVVxFenX5JuUxf5teEizQtN3PEPKAE4YJuha4gosbEG3', '2017-07-20 10:16:07', '2017-07-20 10:16:07', NULL, NULL),
(22, 'Florin Catun', 'ancap4@email.com', '$2y$10$CWDotop8sR74XqUMNN3y.OqaDlIx4MWIkV2jub5poVkjb.HUO7DAa', NULL, 1, 3, 'GKfxWh0bjNqjtDSgoPszI4D9EZdcP6I0D8gV0SD0dAgcBXGAxRSwtVBU8YUQ', '2017-07-20 10:17:53', '2017-07-20 10:17:53', NULL, NULL),
(23, 'Mirela Pascu', 'ancap5@email.com', '$2y$10$KzsFzcQZTuh3IS.xlcchleA12PEfZCshJ5wx.ZTAKOt71dJRmdDku', NULL, 1, 3, 'Du7SJZq2Lwy00Goi5arvLgCj5V4YwFkt8DrYtRU6ob2jb4kLwU64CRpceUt4', '2017-07-20 10:19:23', '2017-07-20 10:19:23', NULL, NULL),
(24, 'Alina Bodea', 'ancapadsfa@email.com', '$2y$10$cCHE/.ulOCTfVH7nB0kdnuTwSBZLzazOX.qz4/tWMlHIoKV1zkLhy', NULL, 1, 3, 'FjHF1cZJUJAhe9XYg0tZhw9BfRKTFCo1CwVNKTXLGvkc4RTiV2wH9mXCslNS', '2017-07-20 11:56:02', '2017-07-20 11:56:02', NULL, NULL),
(27, 'Georgescu Daniela', 'georgescu.daniela@email.com', '$2y$10$N0QqmbCBzkfNVkrT4sX5s.lTb6a8LZ3NXTI/ZW.TLr6XHmBvZ/mMe', '0796342158', 1, 2, NULL, '2017-07-20 12:26:49', '2017-07-20 12:26:49', 1, 13),
(29, 'Alina Balan', 'alina.balan@medic.com', '$2y$10$fI3FZOlX6Zxc3YaWNID7jOERX.6NGlJY9J9NH9FeOSfRv6Z96l5qO', '0723912930', 1, 2, NULL, '2017-07-27 10:07:41', '2017-07-27 10:07:41', 5, 16),
(31, 'Mirela Horatiu', 'mirela.horatiu@medic.com', '$2y$10$af7ww38Wal6bOphcCzT/OOPByYLhgc0rT4goJ1Ce0mlD2SEHpj.mm', '0775693214', 1, 2, NULL, '2017-07-28 10:09:45', '2017-07-28 10:09:45', 4, 15),
(32, 'Iulia Miron', 'iulia.miron@medic.com', '$2y$10$4GgxB4BScLRSvDtG3Mfa0OEOEKet43EAJI1E0Pb2fWImJ0vz/Fmv2', '0781236947', 1, 2, NULL, '2017-07-28 10:10:50', '2017-07-28 10:23:05', 8, 13),
(33, 'Sanda Timotei', 'sanda.timotei@medic.com', '$2y$10$6BnjRWdfA0Dg/NVHR5JYVeihb8sXNWeoDdZ/JwgoukP29X6UcIQf.', '0722792304', 1, 2, NULL, '2017-07-28 10:17:21', '2017-07-28 10:17:21', 14, 13),
(34, 'Costin Viorel', 'costin.viorel@email.com', '$2y$10$/LqSoMbmYxaA1NdPVM6GM.3sYizFrJ5vIXd1y27qnSMP6LIO7YKFa', '0794037568', 1, 2, NULL, '2017-07-28 10:18:28', '2017-07-28 10:18:28', 17, 15),
(35, 'Sorin Dragomir', 'sorin.dragomir@medic.com', '$2y$10$MrafykZLN9otxspOhxHmw.XMOz6ANmA3tF9J96QBs8xyF0qfZr4zq', '0746219443', 1, 2, NULL, '2017-07-28 10:20:08', '2017-07-28 10:20:08', 6, 9),
(36, 'Andrada Simion', 'andrada.simion@medic.com', '$2y$10$ue6fhpkavV/Hq04WOofF2enTBvLedMBP8vcbUMQG11Rfm2N1hStCi', '0741378317', 1, 2, NULL, '2017-07-28 10:21:00', '2017-07-28 10:21:00', 9, 14),
(37, 'Daniela Ion', 'daniela.ion@medic.com', '$2y$10$m673QPg77fZZtjL0zsDPNeWa6Au/amOhBTiofOy7mIZI68jeEAgMu', '0711282253', 1, 2, NULL, '2017-07-28 10:22:08', '2017-07-28 10:22:08', 18, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_section_id_foreign` (`section_id`),
  ADD KEY `appointments_clinic_id_foreign` (`clinic_id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`),
  ADD KEY `appointments_medic_id_foreign` (`medic_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinics_city_id_foreign` (`city_id`);

--
-- Indexes for table `clinics_sections`
--
ALTER TABLE `clinics_sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clinics_sections_clinic_id_section_id_unique` (`clinic_id`,`section_id`),
  ADD KEY `clinics_sections_section_id_foreign` (`section_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `records_section_id_foreign` (`section_id`),
  ADD KEY `records_clinic_id_foreign` (`clinic_id`),
  ADD KEY `records_user_id_foreign` (`user_id`),
  ADD KEY `records_medic_id_foreign` (`medic_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_section_id_foreign` (`section_id`),
  ADD KEY `users_clinic_id_foreign` (`clinic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `clinics`
--
ALTER TABLE `clinics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `clinics_sections`
--
ALTER TABLE `clinics_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_clinic_id_foreign` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_medic_id_foreign` FOREIGN KEY (`medic_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `clinics`
--
ALTER TABLE `clinics`
  ADD CONSTRAINT `clinics_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `clinics_sections`
--
ALTER TABLE `clinics_sections`
  ADD CONSTRAINT `clinics_sections_clinic_id_foreign` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clinics_sections_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_clinic_id_foreign` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `records_medic_id_foreign` FOREIGN KEY (`medic_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `records_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_clinic_id_foreign` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
