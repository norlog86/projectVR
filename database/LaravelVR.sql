-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 06, 2020 at 07:45 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `laravelVR`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 6, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(23, 6, 'name', 'text', 'Название', 1, 1, 1, 1, 1, 1, '{}', 2),
(24, 6, 'time', 'time', 'Время игры', 1, 1, 1, 1, 1, 1, '{}', 3),
(25, 6, 'price', 'number', 'Цена', 1, 1, 1, 1, 1, 1, '{}', 4),
(26, 6, 'players', 'number', 'Количество пользователей', 1, 1, 1, 1, 1, 1, '{}', 5),
(27, 6, 'type_game_id', 'select_dropdown', 'Тип игры', 1, 1, 1, 1, 1, 1, '{}', 6),
(28, 6, 'text', 'text_area', 'Описание', 0, 1, 1, 1, 1, 1, '{}', 8),
(29, 6, 'room_id', 'select_dropdown', 'Комната', 1, 1, 1, 1, 1, 1, '{}', 9),
(30, 6, 'img', 'image', 'Картинка', 0, 1, 1, 1, 1, 1, '{}', 11),
(31, 6, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 12),
(32, 6, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 13),
(33, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(34, 7, 'name', 'text', 'Название', 1, 1, 1, 1, 1, 1, '{}', 2),
(35, 7, 'path', 'text', 'Путь', 1, 1, 1, 1, 1, 1, '{}', 3),
(36, 7, 'type_room_id', 'text', 'Тип комнаты', 1, 1, 1, 1, 1, 1, '{}', 4),
(37, 7, 'text', 'text_area', 'Описание', 0, 1, 1, 1, 1, 1, '{}', 5),
(38, 7, 'img', 'image', 'Фото', 0, 1, 1, 1, 1, 1, '{}', 6),
(39, 7, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 7),
(40, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(41, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(42, 8, 'name', 'text', 'Имя', 0, 1, 1, 1, 1, 1, '{}', 2),
(43, 8, 'phone', 'text', 'Телефон', 0, 1, 1, 1, 1, 1, '{}', 3),
(44, 8, 'date', 'date', 'Дата', 0, 1, 1, 1, 1, 1, '{}', 4),
(45, 8, 'game_id', 'text', 'Игра', 0, 1, 1, 1, 1, 1, '{}', 5),
(46, 8, 'players', 'number', 'Игроки', 1, 1, 1, 1, 1, 1, '{}', 7),
(47, 8, 'room_id', 'text', 'Комната', 0, 1, 1, 1, 1, 1, '{}', 8),
(48, 8, 'price', 'number', 'Цена', 1, 1, 1, 1, 1, 1, '{}', 10),
(49, 8, 'time', 'time', 'Время', 0, 1, 1, 1, 1, 1, '{}', 11),
(50, 8, 'text', 'text_area', 'Пожелание', 0, 1, 1, 1, 1, 1, '{}', 13),
(51, 8, 'sost_id', 'text', 'Состояние', 1, 1, 1, 1, 1, 1, '{}', 14),
(52, 8, 'user_id', 'text', 'Пользователь', 0, 1, 1, 1, 1, 1, '{}', 16),
(53, 8, 'user', 'hidden', 'User', 0, 0, 0, 0, 0, 0, '{}', 18),
(54, 8, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 19),
(55, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 20),
(56, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 9, 'name', 'text', 'Укажите время', 1, 1, 1, 1, 1, 1, '{}', 2),
(58, 9, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(59, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(63, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(64, 11, 'name', 'text', 'Название', 1, 1, 1, 1, 1, 1, '{}', 2),
(65, 11, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 3),
(66, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(69, 6, 'game_belongsto_type_game_relationship', 'relationship', 'Тип игры', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Type_game\",\"table\":\"type_games\",\"type\":\"belongsTo\",\"column\":\"type_game_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(70, 6, 'game_belongsto_room_relationship', 'relationship', 'Комната', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Room\",\"table\":\"rooms\",\"type\":\"belongsTo\",\"column\":\"room_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(71, 8, 'reservation_belongsto_user_relationship', 'relationship', 'Пользователь', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"email\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 17),
(72, 8, 'reservation_belongsto_sost_reserv_relationship', 'relationship', 'Состояние', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Sost_reserv\",\"table\":\"sost_reservs\",\"type\":\"belongsTo\",\"column\":\"sost_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 15),
(73, 8, 'reservation_belongsto_game_relationship', 'relationship', 'Игра', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Game\",\"table\":\"games\",\"type\":\"belongsTo\",\"column\":\"game_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(74, 8, 'reservation_belongsto_room_relationship', 'relationship', 'Комната', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Room\",\"table\":\"rooms\",\"type\":\"belongsTo\",\"column\":\"room_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 9),
(75, 8, 'reservation_belongsto_time_relationship', 'relationship', 'Время', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Time\",\"table\":\"times\",\"type\":\"belongsTo\",\"column\":\"time\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 12);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(6, 'games', 'games', 'Игра', 'Игры', 'voyager-controller', 'App\\Models\\Game', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-11-03 03:30:00', '2020-11-03 04:20:37'),
(7, 'rooms', 'rooms', 'Комната', 'Комнаты', 'voyager-shop', 'App\\Models\\Room', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-11-03 03:32:05', '2020-11-03 04:23:14'),
(8, 'reservations', 'reservations', 'Бронирование', 'Бронирования', 'voyager-bookmark', 'App\\Models\\Reservation', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-11-03 03:38:23', '2020-11-03 04:53:04'),
(9, 'times', 'times', 'Время', 'Время', 'voyager-watch', 'App\\Models\\Time', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-11-03 03:39:23', '2020-11-03 03:39:23'),
(11, 'type_games', 'type-games', 'Тип игры', 'Типы игры', 'voyager-params', 'App\\Models\\Type_game', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-11-03 04:01:12', '2020-11-03 04:03:34');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `players` double NOT NULL DEFAULT '0',
  `type_game_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `room_id` int(11) NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name`, `time`, `price`, `players`, `type_game_id`, `text`, `room_id`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Mario Vr', '00:30:00', 500, 2, 2, 'Marion on VR', 1, 'games/November2020/Go42PFWBfAye0YqCqmaX.png', NULL, '2020-11-03 03:41:29'),
(2, 'God of war VR', '00:30:00', 1000, 1, 1, NULL, 2, NULL, NULL, NULL),
(3, 'Uncharted of VR', '01:00:00', 700, 1, 1, NULL, 3, NULL, NULL, NULL),
(4, 'Batman VR', '00:30:00', 1000, 2, 1, NULL, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `game_reservation`
--

CREATE TABLE `game_reservation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_reservation`
--

INSERT INTO `game_reservation` (`id`, `reservation_id`, `game_id`, `time_id`, `created_at`, `updated_at`) VALUES
(58, 46, 4, 0, '2020-10-29 15:33:05', '2020-10-29 15:33:05'),
(59, 46, 3, 0, '2020-10-29 15:35:32', '2020-10-29 15:35:32'),
(60, 47, 2, 0, '2020-10-29 15:40:48', '2020-10-29 15:40:48'),
(61, 47, 3, 0, '2020-10-29 15:41:00', '2020-10-29 15:41:00'),
(62, 2, 2, 0, '2020-10-31 10:29:31', '2020-10-31 10:29:31'),
(63, 3, 4, 0, '2020-10-31 10:30:17', '2020-10-31 10:30:17'),
(64, 3, 3, 0, '2020-10-31 11:18:23', '2020-10-31 11:18:23'),
(68, 5, 3, 0, '2020-11-01 05:26:02', '2020-11-01 05:26:02'),
(69, 6, 1, 0, '2020-11-01 08:13:14', '2020-11-01 08:13:14'),
(70, 7, 3, 0, '2020-11-01 08:58:59', '2020-11-01 08:58:59'),
(71, 8, 3, 0, '2020-11-01 09:03:46', '2020-11-01 09:03:46'),
(72, 10, 2, 0, '2020-11-02 14:44:17', '2020-11-02 14:44:17'),
(73, 11, 4, 0, '2020-11-02 14:53:45', '2020-11-02 14:53:45'),
(74, 11, 3, 0, '2020-11-02 14:56:33', '2020-11-02 14:56:33'),
(75, 12, 2, 0, '2020-11-02 14:58:21', '2020-11-02 14:58:21'),
(76, 12, 3, 0, '2020-11-02 14:58:27', '2020-11-02 14:58:27'),
(77, 12, 1, 0, '2020-11-02 15:00:43', '2020-11-02 15:00:43'),
(78, 14, 2, 0, '2020-11-03 02:40:14', '2020-11-03 02:40:14'),
(79, 15, 2, 0, '2020-11-03 02:50:02', '2020-11-03 02:50:02'),
(80, 16, 2, 0, '2020-11-03 02:51:15', '2020-11-03 02:51:15'),
(81, 17, 2, 0, '2020-11-03 02:53:54', '2020-11-03 02:53:54'),
(82, 18, 3, 0, '2020-11-03 02:55:22', '2020-11-03 02:55:22'),
(83, 19, 4, 0, '2020-11-03 03:04:05', '2020-11-03 03:04:05'),
(84, 20, 1, 0, '2020-11-03 04:47:34', '2020-11-03 04:47:34'),
(85, 21, 2, 0, '2020-11-03 05:07:33', '2020-11-03 05:07:33'),
(86, 22, 1, 0, '2020-11-05 03:30:35', '2020-11-05 03:30:35'),
(87, 23, 1, 0, '2020-11-05 03:32:06', '2020-11-05 03:32:06'),
(88, 24, 1, 0, '2020-11-05 03:32:41', '2020-11-05 03:32:41'),
(89, 25, 1, 0, '2020-11-05 03:34:10', '2020-11-05 03:34:10'),
(92, 28, 1, 0, '2020-11-05 04:24:06', '2020-11-05 04:24:06'),
(94, 29, 3, 0, '2020-11-05 04:28:26', '2020-11-05 04:28:26'),
(95, 30, 1, 0, '2020-11-05 04:41:17', '2020-11-05 04:41:17'),
(97, 32, 1, 0, '2020-11-05 05:44:48', '2020-11-05 05:44:48'),
(99, 34, 4, 0, '2020-11-05 06:00:42', '2020-11-05 06:00:42'),
(100, 35, 4, 0, '2020-11-05 06:28:18', '2020-11-05 06:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-10-17 08:33:27', '2020-10-17 08:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2020-10-17 08:33:27', '2020-10-17 08:33:27', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2020-10-17 08:33:27', '2020-10-17 08:33:27', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2020-10-17 08:33:27', '2020-10-17 08:33:27', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2020-10-17 08:33:27', '2020-10-17 08:33:27', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2020-10-17 08:33:27', '2020-10-17 08:33:27', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2020-10-17 08:33:27', '2020-10-17 08:33:27', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2020-10-17 08:33:27', '2020-10-17 08:33:27', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2020-10-17 08:33:27', '2020-10-17 08:33:27', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2020-10-17 08:33:27', '2020-10-17 08:33:27', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2020-10-17 08:33:27', '2020-10-17 08:33:27', 'voyager.settings.index', NULL),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 13, '2020-10-17 08:33:27', '2020-10-17 08:33:27', 'voyager.hooks', NULL),
(12, 1, 'Игры', '', '_self', 'voyager-controller', NULL, NULL, 15, '2020-11-03 03:30:00', '2020-11-03 03:30:00', 'voyager.games.index', NULL),
(13, 1, 'Комнаты', '', '_self', 'voyager-shop', NULL, NULL, 16, '2020-11-03 03:32:06', '2020-11-03 03:32:06', 'voyager.rooms.index', NULL),
(14, 1, 'Бронирования', '', '_self', 'voyager-watch', NULL, NULL, 17, '2020-11-03 03:38:23', '2020-11-03 03:38:23', 'voyager.reservations.index', NULL),
(15, 1, 'Время', '', '_self', 'voyager-watch', NULL, NULL, 18, '2020-11-03 03:39:24', '2020-11-03 03:39:24', 'voyager.times.index', NULL),
(16, 1, 'Типы игры', '', '_self', 'voyager-params', NULL, NULL, 19, '2020-11-03 04:01:12', '2020-11-03 04:01:12', 'voyager.type-games.index', NULL);

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
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(26, '2020_10_17_133137_create_games_table', 2),
(27, '2020_10_17_133159_create_rooms_table', 2),
(41, '2020_10_19_161159_create_times_table', 3),
(43, '2020_10_19_162846_create_type_games_table', 3),
(44, '2020_10_19_162918_create_sost_reservs_table', 3),
(45, '2020_10_19_163343_create_game_type_game_table', 3),
(48, '2020_10_20_180229_create_game_reservation_table', 4),
(49, '2020_10_21_063829_create_orde_game_table', 5),
(50, '2020_10_21_065405_create_order_game_table', 6),
(51, '2020_10_21_065811_create_orders_table', 7),
(52, '2020_10_29_180046_update_game_reservation_table', 8),
(53, '2020_10_19_161543_create_reservations_table', 9),
(54, '2020_10_31_142635_create_reservation_time_table', 10);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(2, 'browse_bread', NULL, '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(3, 'browse_database', NULL, '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(4, 'browse_media', NULL, '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(5, 'browse_compass', NULL, '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(6, 'browse_menus', 'menus', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(7, 'read_menus', 'menus', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(8, 'edit_menus', 'menus', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(9, 'add_menus', 'menus', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(10, 'delete_menus', 'menus', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(11, 'browse_roles', 'roles', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(12, 'read_roles', 'roles', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(13, 'edit_roles', 'roles', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(14, 'add_roles', 'roles', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(15, 'delete_roles', 'roles', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(16, 'browse_users', 'users', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(17, 'read_users', 'users', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(18, 'edit_users', 'users', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(19, 'add_users', 'users', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(20, 'delete_users', 'users', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(21, 'browse_settings', 'settings', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(22, 'read_settings', 'settings', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(23, 'edit_settings', 'settings', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(24, 'add_settings', 'settings', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(25, 'delete_settings', 'settings', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(26, 'browse_hooks', NULL, '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(27, 'browse_games', 'games', '2020-11-03 03:30:00', '2020-11-03 03:30:00'),
(28, 'read_games', 'games', '2020-11-03 03:30:00', '2020-11-03 03:30:00'),
(29, 'edit_games', 'games', '2020-11-03 03:30:00', '2020-11-03 03:30:00'),
(30, 'add_games', 'games', '2020-11-03 03:30:00', '2020-11-03 03:30:00'),
(31, 'delete_games', 'games', '2020-11-03 03:30:00', '2020-11-03 03:30:00'),
(32, 'browse_rooms', 'rooms', '2020-11-03 03:32:06', '2020-11-03 03:32:06'),
(33, 'read_rooms', 'rooms', '2020-11-03 03:32:06', '2020-11-03 03:32:06'),
(34, 'edit_rooms', 'rooms', '2020-11-03 03:32:06', '2020-11-03 03:32:06'),
(35, 'add_rooms', 'rooms', '2020-11-03 03:32:06', '2020-11-03 03:32:06'),
(36, 'delete_rooms', 'rooms', '2020-11-03 03:32:06', '2020-11-03 03:32:06'),
(37, 'browse_reservations', 'reservations', '2020-11-03 03:38:23', '2020-11-03 03:38:23'),
(38, 'read_reservations', 'reservations', '2020-11-03 03:38:23', '2020-11-03 03:38:23'),
(39, 'edit_reservations', 'reservations', '2020-11-03 03:38:23', '2020-11-03 03:38:23'),
(40, 'add_reservations', 'reservations', '2020-11-03 03:38:23', '2020-11-03 03:38:23'),
(41, 'delete_reservations', 'reservations', '2020-11-03 03:38:23', '2020-11-03 03:38:23'),
(42, 'browse_times', 'times', '2020-11-03 03:39:24', '2020-11-03 03:39:24'),
(43, 'read_times', 'times', '2020-11-03 03:39:24', '2020-11-03 03:39:24'),
(44, 'edit_times', 'times', '2020-11-03 03:39:24', '2020-11-03 03:39:24'),
(45, 'add_times', 'times', '2020-11-03 03:39:24', '2020-11-03 03:39:24'),
(46, 'delete_times', 'times', '2020-11-03 03:39:24', '2020-11-03 03:39:24'),
(47, 'browse_type_games', 'type_games', '2020-11-03 04:01:12', '2020-11-03 04:01:12'),
(48, 'read_type_games', 'type_games', '2020-11-03 04:01:12', '2020-11-03 04:01:12'),
(49, 'edit_type_games', 'type_games', '2020-11-03 04:01:12', '2020-11-03 04:01:12'),
(50, 'add_type_games', 'type_games', '2020-11-03 04:01:12', '2020-11-03 04:01:12'),
(51, 'delete_type_games', 'type_games', '2020-11-03 04:01:12', '2020-11-03 04:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
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
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `players` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `room_id` int(11) DEFAULT NULL,
  `price` double NOT NULL DEFAULT '0',
  `time` int(11) DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `sost_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `phone`, `date`, `game_id`, `players`, `room_id`, `price`, `time`, `text`, `sost_id`, `user_id`, `user`, `created_at`, `updated_at`) VALUES
(24, '1', '1', '2020-12-12', 1, '2', 1, 500, 2, '1', 1, 2, NULL, '2020-11-05 03:32:41', '2020-11-05 03:32:51'),
(25, '1', '1', '2000-12-12', 1, '2', 1, 500, 2, '1', 2, 2, NULL, '2020-11-05 03:34:10', '2020-11-05 03:34:23'),
(30, 'Владислав', '8918', '2020-12-01', 1, '2', 1, 500, 1, NULL, 1, NULL, NULL, '2020-11-05 04:41:16', '2020-11-05 04:42:50'),
(31, NULL, NULL, NULL, NULL, '0', NULL, 0, NULL, NULL, 0, 1, NULL, '2020-11-05 05:43:39', '2020-11-05 05:43:40'),
(32, 'Артем', '8918', '2020-12-12', 1, '2', 1, 500, 3, NULL, 1, 2, NULL, '2020-11-05 05:44:48', '2020-11-05 05:45:44'),
(33, NULL, NULL, NULL, NULL, '0', NULL, 0, NULL, NULL, 0, 2, NULL, '2020-11-05 05:46:16', '2020-11-05 05:46:16'),
(34, 'Тестовый', '8918', '2000-12-12', 4, '2', 2, 1000, 2, '123', 1, 2, NULL, '2020-11-05 06:00:42', '2020-11-05 06:01:05'),
(35, NULL, NULL, NULL, NULL, '0', NULL, 0, NULL, NULL, 0, 2, NULL, '2020-11-05 06:28:18', '2020-11-05 06:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_time`
--

CREATE TABLE `reservation_time` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2020-10-17 08:33:27', '2020-10-17 08:33:27'),
(2, 'user', 'Normal User', '2020-10-17 08:33:27', '2020-10-17 08:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_room_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `img` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `path`, `type_room_id`, `text`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Первая комната', 'room_one', 1, 'Комната для игры в VR', NULL, NULL, NULL),
(2, 'Вторая комната', 'room_two', 1, 'Комната для игры в VR', NULL, NULL, NULL),
(3, 'Третья комната', 'room_three', 1, 'Комната для игры в VR', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `sost_reservs`
--

CREATE TABLE `sost_reservs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sost_reservs`
--

INSERT INTO `sost_reservs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(0, 'Не отправлена', NULL, NULL),
(1, 'Принята', NULL, NULL),
(2, 'Отменена', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `name`, `created_at`, `updated_at`) VALUES
(0, 'Не выбрано', NULL, NULL),
(1, '9:00', NULL, NULL),
(2, '9:30', NULL, NULL),
(3, '10:00', NULL, NULL),
(4, '10:30', NULL, NULL),
(5, '11:00', NULL, NULL),
(6, '11:30', NULL, NULL),
(7, '12:00', NULL, NULL),
(8, '12:30', NULL, NULL),
(9, '13:00', NULL, NULL),
(10, '13:30', NULL, NULL),
(11, '14:00', NULL, NULL),
(12, '14:30', NULL, NULL),
(13, '15:00', NULL, NULL),
(14, '15:30', NULL, NULL),
(15, '16:00', NULL, NULL),
(16, '16:30', NULL, NULL),
(17, '17:00', NULL, NULL),
(18, '17:30', NULL, NULL),
(19, '18:00', NULL, NULL),
(20, '18:30', NULL, NULL),
(21, '19:00', NULL, NULL),
(22, '19:30', NULL, NULL),
(23, '20:00', NULL, NULL),
(24, '20:30', NULL, NULL),
(25, '21:00', NULL, NULL),
(26, '21:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_games`
--

CREATE TABLE `type_games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_games`
--

INSERT INTO `type_games` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Игра для одного', NULL, NULL),
(2, 'Игра для компании', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'VladS', 'admin@email.com', 'users/default.png', NULL, '$2y$10$.vyYvXqNxm0sJcqe821KPexRKbeKHTFs5TBOrDUSrbojYoYV7QByO', NULL, '{\"locale\":\"ru\"}', '2020-10-17 08:37:58', '2020-10-29 13:08:37'),
(2, 2, 'Vlad', 'vlad@mail.ru', 'users/default.png', NULL, '$2y$10$G.7wGM7yN7ZLu4bKjJX5n.h1/hk7WlWflBCRxVMfk..ZnCL4LDd9S', NULL, '{\"locale\":\"ru\"}', '2020-10-25 09:46:41', '2020-10-29 13:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_reservation`
--
ALTER TABLE `game_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_time`
--
ALTER TABLE `reservation_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `sost_reservs`
--
ALTER TABLE `sost_reservs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `type_games`
--
ALTER TABLE `type_games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `game_reservation`
--
ALTER TABLE `game_reservation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `reservation_time`
--
ALTER TABLE `reservation_time`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sost_reservs`
--
ALTER TABLE `sost_reservs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_games`
--
ALTER TABLE `type_games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
