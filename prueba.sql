-- --------------------------------------------------------
-- Host:                         prueba-proyecto.cksmnpssprby.us-east-1.rds.amazonaws.com
-- Versión del servidor:         10.6.10-MariaDB-log - managed by https://aws.amazon.com/rds/
-- SO del servidor:              Linux
-- HeidiSQL Versión:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para proyecto
CREATE DATABASE IF NOT EXISTS `proyecto` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `proyecto`;

-- Volcando estructura para tabla proyecto.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.categories: ~9 rows (aproximadamente)
INSERT IGNORE INTO `categories` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
	(1, 'SVOD', '2023-05-02 11:12:19', '2023-05-02 11:12:19'),
	(2, 'Música', '2023-05-02 11:12:19', '2023-05-02 11:12:19'),
	(3, 'Seguridad', '2023-05-02 11:12:19', '2023-05-02 11:12:19'),
	(4, 'Videojuegos', '2023-05-02 11:12:19', '2023-05-02 11:12:19'),
	(5, 'Software', '2023-05-02 12:15:47', '2023-05-02 12:15:47'),
	(6, 'Lectura', '2023-05-02 12:15:54', '2023-05-02 12:15:54'),
	(7, 'Nube', '2023-05-02 12:15:59', '2023-05-02 12:15:59'),
	(8, 'Bienestar', '2023-05-02 12:16:06', '2023-05-02 12:16:06'),
	(9, 'Educacion', '2023-05-02 12:16:13', '2023-05-02 12:16:13'),
	(11, 'KUKUKUKU', '2023-05-27 09:27:26', '2023-05-27 09:29:16'),
	(12, 'CINE NEGRO', '2023-06-06 09:25:14', '2023-06-06 09:25:14');

-- Volcando estructura para tabla proyecto.credentials
CREATE TABLE IF NOT EXISTS `credentials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.credentials: ~9 rows (aproximadamente)
INSERT IGNORE INTO `credentials` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'asdasdasdasd@gmail.com', 'saasddasdas', '2023-05-02 11:12:19', '2023-05-02 11:12:19'),
	(2, 'pepito@gmail.com', 'joselito', '2023-05-03 07:30:42', '2023-05-03 07:33:02'),
	(3, 'bluberyasp161@gmail.com', 'adsadasdadasda', '2023-05-11 08:39:34', '2023-05-11 08:39:34'),
	(4, 'hola', 'dsfhfdhngfjh', '2023-05-11 08:57:06', '2023-05-11 08:57:06'),
	(5, 'asdadsadasdasdas@gmail.com', 'gmail', '2023-05-11 20:29:00', '2023-05-11 20:29:00'),
	(6, 'manuel.u.s@hotmail.com', 'Manitocolegines', '2023-05-13 14:25:50', '2023-05-13 14:25:50'),
	(7, 'paco@gmail.com', 'Eltiopixa2222', '2023-06-03 09:23:38', '2023-06-06 09:32:11'),
	(8, 'dasdadas@gmail.com', 'Eltiopixa2', '2023-06-05 15:09:34', '2023-06-05 15:09:34'),
	(9, 'dsadasdas@gmail.com', 'Eltiopixa2', '2023-06-05 15:23:43', '2023-06-05 15:23:43'),
	(10, 'bluberyasp161@gmail.com', 'dsasdasd', '2023-06-06 08:58:01', '2023-06-06 08:58:01'),
	(11, 'bluberyasp161@gmail.com', 'Prueba22', '2023-06-07 09:54:25', '2023-06-16 06:44:37'),
	(12, 'manolo@email.es', '1234567890', '2023-06-16 06:37:08', '2023-06-16 06:37:08');

-- Volcando estructura para tabla proyecto.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla proyecto.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `capacidad` int(11) NOT NULL,
  `plataform_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `credential_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `groups_plataform_id_foreign` (`plataform_id`),
  KEY `groups_user_id_foreign` (`user_id`),
  KEY `groups_credential_id_foreign` (`credential_id`),
  CONSTRAINT `groups_credential_id_foreign` FOREIGN KEY (`credential_id`) REFERENCES `credentials` (`id`) ON DELETE CASCADE,
  CONSTRAINT `groups_plataform_id_foreign` FOREIGN KEY (`plataform_id`) REFERENCES `plataforms` (`id`) ON DELETE CASCADE,
  CONSTRAINT `groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.groups: ~18 rows (aproximadamente)
INSERT IGNORE INTO `groups` (`id`, `capacidad`, `plataform_id`, `user_id`, `credential_id`, `created_at`, `updated_at`) VALUES
	(9, 4, 2, 6, NULL, '2023-05-11 09:00:53', '2023-05-11 09:00:53'),
	(14, 5, 2, 8, NULL, '2023-05-11 20:23:55', '2023-05-11 20:23:55'),
	(15, 4, 10, 8, NULL, '2023-05-11 20:24:12', '2023-05-11 20:24:12'),
	(16, 5, 9, 9, NULL, '2023-05-12 09:31:49', '2023-05-12 09:31:49'),
	(17, 6, 3, 9, NULL, '2023-05-12 09:32:40', '2023-05-12 09:32:40'),
	(22, 8, 6, 9, NULL, '2023-05-12 09:52:39', '2023-05-12 09:52:39'),
	(23, 2, 1, 15, 6, '2023-05-13 14:24:12', '2023-05-13 14:25:50'),
	(27, 7, 6, 18, 8, '2023-06-05 15:07:25', '2023-06-05 15:09:34'),
	(28, 5, 9, 18, 9, '2023-06-05 15:22:10', '2023-06-05 15:23:43'),
	(29, 2, 2, 18, NULL, '2023-06-06 08:51:57', '2023-06-06 08:51:57'),
	(33, 3, 1, 1, 11, '2023-06-06 10:18:57', '2023-06-07 09:54:25'),
	(36, 8, 6, 1, NULL, '2023-06-06 10:19:22', '2023-06-06 10:19:22'),
	(38, 5, 9, 1, NULL, '2023-06-06 10:19:34', '2023-06-06 10:19:34'),
	(39, 4, 10, 1, NULL, '2023-06-06 10:19:46', '2023-06-06 10:19:46'),
	(42, 2, 8, 14, NULL, '2023-06-07 09:42:09', '2023-06-07 09:42:09'),
	(43, 3, 8, 1, NULL, '2023-06-07 09:45:16', '2023-06-07 09:45:16'),
	(44, 4, 23, 3, NULL, '2023-06-15 09:13:59', '2023-06-15 09:13:59'),
	(45, 2, 1, 22, 12, '2023-06-16 06:21:18', '2023-06-16 06:37:08'),
	(46, 4, 34, 22, NULL, '2023-06-16 06:38:07', '2023-06-16 06:38:07');

-- Volcando estructura para tabla proyecto.group_user
CREATE TABLE IF NOT EXISTS `group_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_user_group_id_foreign` (`group_id`),
  KEY `group_user_user_id_foreign` (`user_id`),
  CONSTRAINT `group_user_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `group_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.group_user: ~26 rows (aproximadamente)
INSERT IGNORE INTO `group_user` (`id`, `group_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(10, 9, 6, '2023-05-11 09:00:53', '2023-05-11 09:00:53'),
	(17, 14, 8, '2023-05-11 20:23:55', '2023-05-11 20:23:55'),
	(18, 15, 8, '2023-05-11 20:24:12', '2023-05-11 20:24:12'),
	(20, 16, 9, '2023-05-12 09:31:49', '2023-05-12 09:31:49'),
	(21, 17, 9, '2023-05-12 09:32:40', '2023-05-12 09:32:40'),
	(26, 22, 9, '2023-05-12 09:52:39', '2023-05-12 09:52:39'),
	(27, 23, 15, '2023-05-13 14:24:12', '2023-05-13 14:24:12'),
	(28, 23, 12, '2023-05-13 14:25:00', '2023-05-13 14:25:00'),
	(33, 14, 9, '2023-05-16 18:49:57', '2023-05-16 18:49:57'),
	(36, 27, 18, '2023-06-05 15:07:25', '2023-06-05 15:07:25'),
	(37, 28, 18, '2023-06-05 15:22:10', '2023-06-05 15:22:10'),
	(38, 29, 18, '2023-06-06 08:51:57', '2023-06-06 08:51:57'),
	(43, 33, 1, '2023-06-06 10:18:57', '2023-06-06 10:18:57'),
	(46, 36, 1, '2023-06-06 10:19:22', '2023-06-06 10:19:22'),
	(48, 38, 1, '2023-06-06 10:19:34', '2023-06-06 10:19:34'),
	(49, 39, 1, '2023-06-06 10:19:47', '2023-06-06 10:19:47'),
	(53, 33, 19, '2023-06-06 11:13:26', '2023-06-06 11:13:26'),
	(54, 42, 14, '2023-06-07 09:42:09', '2023-06-07 09:42:09'),
	(55, 42, 3, '2023-06-07 09:43:56', '2023-06-07 09:43:56'),
	(56, 43, 1, '2023-06-07 09:45:16', '2023-06-07 09:45:16'),
	(57, 29, 3, '2023-06-07 10:04:06', '2023-06-07 10:04:06'),
	(58, 44, 3, '2023-06-15 09:13:59', '2023-06-15 09:13:59'),
	(59, 17, 1, '2023-06-15 17:12:39', '2023-06-15 17:12:39'),
	(60, 45, 22, '2023-06-16 06:21:18', '2023-06-16 06:21:18'),
	(61, 9, 1, '2023-06-16 06:37:12', '2023-06-16 06:37:12'),
	(62, 46, 22, '2023-06-16 06:38:07', '2023-06-16 06:38:07');

-- Volcando estructura para tabla proyecto.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `group_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `messages_user_id_foreign` (`user_id`),
  KEY `messages_group_id_foreign` (`group_id`),
  CONSTRAINT `messages_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.messages: ~4 rows (aproximadamente)
INSERT IGNORE INTO `messages` (`id`, `message`, `user_id`, `group_id`, `created_at`) VALUES
	(11, 'Hola', 15, 23, '2023-05-13 14:26:15'),
	(12, 'asbhsabd', 12, 23, '2023-05-13 14:26:28'),
	(13, 'Me voy', 15, 23, '2023-05-13 14:26:29'),
	(15, 'asdasdasdasd', 18, 28, '2023-06-05 15:24:28'),
	(19, 'asdasdsadsad', 1, 33, '2023-06-07 09:55:27'),
	(20, 'sadasdas', 1, 33, '2023-06-16 06:45:37');

-- Volcando estructura para tabla proyecto.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.migrations: ~18 rows (aproximadamente)
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_05_03_000001_create_customer_columns', 1),
	(5, '2019_05_03_000002_create_subscriptions_table', 1),
	(6, '2019_05_03_000003_create_subscription_items_table', 1),
	(7, '2019_08_19_000000_create_failed_jobs_table', 1),
	(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(9, '2023_03_29_174700_create_categories_table', 1),
	(10, '2023_03_29_174707_create_plataforms_table', 1),
	(11, '2023_03_29_182632_create_credentials_table', 1),
	(12, '2023_03_29_182633_create_groups_table', 1),
	(13, '2023_04_01_102140_create_permission_tables', 1),
	(14, '2023_04_03_092314_create_sessions_table', 1),
	(15, '2023_04_05_142107_update_user_table', 1),
	(16, '2023_04_06_113534_create_group_user_table', 1),
	(17, '2023_04_23_095521_create_messages_table', 1),
	(18, '2023_04_24_084305_create_services_table', 1);

-- Volcando estructura para tabla proyecto.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.model_has_permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla proyecto.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.model_has_roles: ~1 rows (aproximadamente)
INSERT IGNORE INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(1, 'App\\Models\\User', 2),
	(1, 'App\\Models\\User', 22);

-- Volcando estructura para tabla proyecto.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.password_resets: ~0 rows (aproximadamente)

-- Volcando estructura para tabla proyecto.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.permissions: ~4 rows (aproximadamente)
INSERT IGNORE INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin.home', 'web', '2023-05-02 11:12:18', '2023-05-02 11:12:18'),
	(2, 'admin.groups.create', 'web', '2023-05-02 11:12:18', '2023-05-02 11:12:18'),
	(3, 'admin.groups.edit', 'web', '2023-05-02 11:12:18', '2023-05-02 11:12:18'),
	(4, 'admin.groups.destroy', 'web', '2023-05-02 11:12:18', '2023-05-02 11:12:18');

-- Volcando estructura para tabla proyecto.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla proyecto.plataforms
CREATE TABLE IF NOT EXISTS `plataforms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacidad` int(11) NOT NULL,
  `suscripcion` decimal(5,2) NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `plataforms_nombre_unique` (`nombre`),
  KEY `plataforms_category_id_foreign` (`category_id`),
  CONSTRAINT `plataforms_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.plataforms: ~23 rows (aproximadamente)
INSERT IGNORE INTO `plataforms` (`id`, `nombre`, `logo`, `capacidad`, `suscripcion`, `descripcion`, `category_id`, `created_at`, `updated_at`) VALUES
	(1, 'Netflix', 'plataformas/JHi318awPx17hkI6bivEpvjKuoSzqx0SSnQ3oM6V.png', 3, 29.97, 'Disfruta de Netflix', 1, '2023-05-02 11:50:06', '2023-05-02 11:50:06'),
	(2, 'Spotify', 'plataformas/LUucIOpqaxWTXDkD1bwigHHUS02KEMeCwwjK7KY1.png', 6, 15.99, 'Música ilimitada', 2, '2023-05-02 11:54:45', '2023-05-02 11:54:45'),
	(3, 'NordVPN', 'plataformas/12DZtmGSDtFly7c6FdYIPjd4amJWH78R0kvrWAwV.png', 6, 206.10, 'Navega de forma segura', 3, '2023-05-02 11:56:38', '2023-05-02 11:56:38'),
	(6, 'Switch', 'plataformas/IudqPQdCuMCEaGqwKK3Ayt4EDeMMBzDapJkGvA95.png', 8, 5.83, 'Disfruta del modo', 4, '2023-05-02 12:04:19', '2023-05-02 12:04:19'),
	(8, 'HBOMAX', 'plataformas/rjEzdev7SJI6xL3HuIrwR7t3IXYQXPKETCZiTN1L.png', 3, 9.00, 'Emocion sin limites', 1, '2023-05-02 12:14:10', '2023-05-02 12:14:10'),
	(9, 'Luminosity', 'plataformas/hrP477y5DvjvQHJWFf29ORqj5InmHTDCBfIrrYEl.png', 5, 6.66, 'Estimula tu mente', 9, '2023-05-02 12:31:56', '2023-05-02 12:31:56'),
	(10, 'Lingopie', 'plataformas/Eci62ojCPpJi7cQ4p4pi3p73zvh3r3VyMuOcqmvx.png', 4, 8.04, 'Aprendizaje de idiomas', 9, '2023-05-02 12:33:55', '2023-05-02 12:33:55'),
	(18, 'AVG', 'public/plataformas/t3jOrnZXmqzAUIC9FtM48DcNgBIwDNGtt29iWmin.png', 10, 7.83, 'Protección', 3, '2023-06-06 11:42:19', '2023-06-06 11:42:19'),
	(19, 'ExpressVPN', 'public/plataformas/iDwFM8SIlYBOAAFcjgZt4opui8FMZ5Z77iEIN8ng.png', 5, 12.95, 'VPN secure', 3, '2023-06-06 11:44:13', '2023-06-06 11:44:13'),
	(20, 'McAfee', 'public/plataformas/WHZso5HasPy4ZSN4db1fg5SthOFNuzWiB71Z6VDT.png', 10, 8.20, 'Protection', 3, '2023-06-06 11:45:29', '2023-06-06 11:45:29'),
	(21, 'Youtube', 'public/plataformas/Ek7UIafaAm9OH0KQq0GP6iW1jUwI7IukZhswz9zI.png', 6, 17.99, 'Youtube', 2, '2023-06-06 11:48:06', '2023-06-06 11:48:06'),
	(22, 'Deezer', 'public/plataformas/gvTTBvQh0urBOgRPqnjmnhClAEcObInbxAi2IJOW.png', 6, 17.99, 'Music fam', 2, '2023-06-06 11:49:00', '2023-06-06 11:49:00'),
	(23, 'Tidal', 'public/plataformas/sWvYJ3PLlA1peApNcp2zVenbiSTfW59mdfiijM7Z.png', 6, 14.99, 'Premium', 2, '2023-06-06 11:50:17', '2023-06-06 11:50:17'),
	(30, 'Apple', 'public/plataformas/32zVDWr9x1qupB3c3PBaWWMMo4FLE6tM0iPYiVqW.png', 6, 16.99, 'Musica', 2, '2023-06-14 08:54:15', '2023-06-14 08:54:15'),
	(31, 'Napster', 'public/plataformas/BTBR2jR5g21f3Pl2juQGXjWuSw3hKRTlPB1HzYNx.png', 6, 14.99, 'music', 2, '2023-06-14 08:57:56', '2023-06-14 08:57:56'),
	(34, 'DisneyPlus', 'public/plataformas/3k8uNLfHO1CutAJzVvYfQ2fHaieL2NW6aKrERe3P.png', 4, 9.00, 'Disney', 1, '2023-06-14 09:02:53', '2023-06-14 09:02:53'),
	(35, 'PrimeVideo', 'public/plataformas/yBgWpaMHY1Hq19wUsEY19hCBVP5IywPZKo2qr3US.png', 3, 4.98, 'Amazon', 1, '2023-06-14 09:06:12', '2023-06-14 09:06:12'),
	(36, 'NBA', 'public/plataformas/9MBVQEGjWFDHJlqHifKUA99MQDv01ETWCrhXLh84.png', 2, 23.99, 'basket', 1, '2023-06-14 09:11:56', '2023-06-14 09:11:56'),
	(37, 'Filmin', 'public/plataformas/3fIwLcucYw85BGazaUqUxq6R5OpNe4B9TYu4uYlM.png', 2, 7.99, 'pelis', 1, '2023-06-14 17:45:06', '2023-06-14 17:45:06'),
	(38, 'NordPass', 'public/plataformas/joPzwkwQJoBtgqAzvn6bSSSCHbir89B9553Uh8UX.png', 6, 8.39, 'password', 3, '2023-06-14 17:47:54', '2023-06-14 17:47:54'),
	(39, 'Ivacy', 'public/plataformas/HhTb3iRDVfRLFX9bMKt5V8GdKH1CPEUXReEOcAHI.png', 10, 9.50, 'security', 3, '2023-06-14 17:51:18', '2023-06-14 17:51:18'),
	(40, 'Platzi', 'public/plataformas/bvIFPMiK36AI6NNNUEntdc7X5mqBub24cbDZxISU.png', 2, 18.25, 'Education', 9, '2023-06-14 17:56:23', '2023-06-14 17:56:23'),
	(41, 'Duolingo', 'public/plataformas/3Ux3LpBvKSdRcHLFv1eYOumxVZpHpixMdkHM3kkr.png', 6, 10.25, 'Education', 9, '2023-06-14 17:58:19', '2023-06-14 17:58:19'),
	(42, 'Kumobox', 'public/plataformas/gLlGnDtuQiFEVwQ6rsCr1nQZAoRL36L5fRdHY83K.png', 6, 51.00, 'Education', 9, '2023-06-14 18:01:22', '2023-06-14 18:01:22');

-- Volcando estructura para tabla proyecto.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.roles: ~3 rows (aproximadamente)
INSERT IGNORE INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'web', '2023-05-02 11:12:18', '2023-05-02 11:12:18'),
	(2, 'Usuario', 'web', '2023-05-02 11:12:18', '2023-05-02 11:12:18'),
	(3, 'PropietarioGrupo', 'web', '2023-05-02 11:12:18', '2023-05-02 11:12:18');

-- Volcando estructura para tabla proyecto.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.role_has_permissions: ~4 rows (aproximadamente)
INSERT IGNORE INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 3);

-- Volcando estructura para tabla proyecto.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_offer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `services_category_id_foreign` (`category_id`),
  CONSTRAINT `services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.services: ~6 rows (aproximadamente)
INSERT IGNORE INTO `services` (`id`, `nombre`, `url_service`, `url_offer`, `category_id`, `created_at`) VALUES
	(4, 'hola', 'http://david.com', 'http://david.com', 6, '2023-05-11 08:54:00'),
	(5, 'Pepito', 'https://as.com', 'https://as.com', 5, '2023-05-11 20:25:46'),
	(6, 'PRUEBA', 'https://as.com', 'https://as.com', 1, '2023-06-03 09:22:33'),
	(7, 'GamePass', 'https://as.com', 'https://as.com', 4, '2023-06-06 09:02:20');

-- Volcando estructura para tabla proyecto.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.sessions: ~10 rows (aproximadamente)
INSERT IGNORE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('16RfE2lVb4BCI2g17tl1YxDGeW1voJtMm6RhLM1V', NULL, '79.144.10.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSTBNUURrbWpoeW9HUW5CMHFrbmxZNzVxMmhhdWh6WnJ3Vk5oeUZnVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vcGF5dG9nZXRoZXIuZXMiO319', 1686899135),
	('31KWcwuojNNEIDHKrlyzMn2azMzmwTfkMxkOz9RC', NULL, '208.87.237.140', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/534.50 (KHTML, like Gecko) Version/5.1 Safari/534.50', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiajhrcDRrZ1lXckhqQXd4RmdjU1JKTmxyRzA5RjBkNUhzSnNadHU5SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vcGF5dG9nZXRoZXIuZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1686896416),
	('Ajx163rBKkbkA2yrczgjQWUGOXqt6xgDUwtQWMbW', NULL, '158.99.7.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWRpT1NGM2NmeGczVDlSN0JQbVR2VlBpUmpQSWRGNDJlZVE5ektxdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vcGF5dG9nZXRoZXIuZXMvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1686898096),
	('An7cCm9RSL84gofF0cj03916GdpASy8UvIKi2ZMI', NULL, '85.115.53.140', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWtvMWllT25zaXk0dHV1VUNPTk0zMkhQMW9wdUdjUDdvTmk1a1JBQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vcGF5dG9nZXRoZXIuZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1686896417),
	('dkVlzGIk5OxGKISQIgSVnqKfSq02k6TzxHBThBdN', NULL, '158.99.7.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.43', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicnJSNG9DcVNtT1BweVF1TkdzOVZPVUZxNWFoZW5kbnNNRnAySXd4aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vcGF5dG9nZXRoZXIuZXMvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1686896580),
	('eV6UXeWFflLPee8KS15vgSlU9urW4h7L3nLMx3YU', 22, '79.144.10.233', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/114.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZzNkamkyTEoxdHZORzZKTzFObzJpZ0JFdGFHdVdMaVNnQTNGc2lRNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vcGF5dG9nZXRoZXIuZXMvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyMjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRVcTlsakdGa0tESFZQZW1EWTlYbXhPcnJVRFlRaVNtQ2NvZ0RIcWROdUJrWEsxM0tXUlRyUyI7fQ==', 1686898123),
	('He3NSLITPsEWxmYJ5vCK9f2EQsX07OIxwmKbUtcZ', NULL, '85.115.52.140', 'Mozilla/5.0 (Windows NT 5.1) Gecko/20100101 Firefox/4.0.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVU5zMWduem9OWFVoUlBUNHpvNnhmTGZIRUhNb1FnWUpTRVJLZDhIRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vcGF5dG9nZXRoZXIuZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1686897316),
	('iCEYqvVvZZ2xKNUAM44nmcxy0BKMj66c2MScy3WT', NULL, '85.115.52.140', 'Mozilla/4.0(compatible;MSIE 7.0;Windows NT 6.1;SV1;.NET CLR 1.0.3705;.NET CLR 3.0.30618)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSGJNeDhVQXYwR2xGUnBqbjJ5bnpVUjBOemE0NGtCbnhPWFAyeEF2NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vcGF5dG9nZXRoZXIuZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1686896569),
	('Kq900DMjsHWEcxctaTyVc5Vfz8VRukxMwGijldmL', 23, '158.99.7.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNUZXdkZaVDBMN0xDZExYTWpsY2JVQ0RhWlJtUXlUZUY3STBGZzhNOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vcGF5dG9nZXRoZXIuZXMvbWFya2V0cGxhY2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyMztzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR5dWJHTjFoSVJPRXhPL2ZJVHJESlF1WmJGSXZMcFl5M1JwL3FaS1FKOFpId1ZYS0ZpRUMxYSI7fQ==', 1686897582),
	('KYENQ1LdWghSaf4rlTkoVTK7PdGqbE6yAAD8V7Hk', NULL, '46.6.138.66', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid01RWDNxUVVrZzh6SnRmeVpMdHJyNmNQdEV2Z2NZV3F4U1ZGMVMyQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vcGF5dG9nZXRoZXIuZXMvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1686896455);

-- Volcando estructura para tabla proyecto.subscriptions
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.subscriptions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla proyecto.subscription_items
CREATE TABLE IF NOT EXISTS `subscription_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subscription_id` bigint(20) unsigned NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.subscription_items: ~0 rows (aproximadamente)

-- Volcando estructura para tabla proyecto.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `last_seen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_auth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_stripe_id_index` (`stripe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.users: ~17 rows (aproximadamente)
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `last_seen`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`, `avatar`, `external_id`, `external_auth`) VALUES
	(1, 'David Ureña', 'bluberyasp161@gmail.com', '2023-05-02 11:12:18', '$2y$10$3ZtHNN5Kmy6dyePzb1rQNeDCv/Y4dev2/T.n.9DMIGRpYoJQCOLc6', NULL, NULL, NULL, '2023-06-16 07:05:34', '3mAvScB4v4iGTM7FJo2oPt3BUli9sUK4IuoTnGLh8C0iVaqyG2EHkWZZAZBu', NULL, NULL, '2023-05-02 11:12:18', '2023-06-16 07:05:34', 'cus_NouxAUZcSmAZiQ', 'visa', '4242', NULL, NULL, NULL, NULL),
	(2, 'Jaime Aguayo', 'carvajal.joel@example.com', '2023-05-02 11:12:19', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '2023-05-23 09:33:02', '620HTiJ126', NULL, NULL, '2023-05-02 11:12:19', '2023-05-23 09:33:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 'pablo avalos', 'ppavalos55@gmail.com', NULL, NULL, NULL, NULL, NULL, '2023-06-16 06:21:22', NULL, NULL, NULL, '2023-05-03 07:36:17', '2023-06-16 06:21:22', 'cus_NpEh8TDPbA7CI2', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/AGNmyxaVH04J879nlKqZ37bQSu_9t_NJKTsn8AmQY21I=s96-c', '107306050083178622187', 'google'),
	(4, 'adsdasdasd', 'flurpax52@gmail.com', NULL, '$2y$10$cwtiPmGnWxaJRZp0MayEPuXl9dJ6eFOJSRmrxvdcHHEYOMhR5wGge', NULL, NULL, NULL, '2023-05-10 10:13:49', NULL, NULL, NULL, '2023-05-09 16:33:34', '2023-05-10 10:13:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, 'Pepe', 'pepe@gmail.com', NULL, '$2y$10$L.G/bYINWlb3CBcu6rc3GOSJRhqFIbhse6jMpaSzFefuTt7VMaAQ2', NULL, NULL, NULL, '2023-05-11 09:22:38', NULL, NULL, NULL, '2023-05-11 08:50:17', '2023-05-11 09:22:38', 'cus_NsFhffiBz2TGaW', NULL, NULL, NULL, NULL, NULL, NULL),
	(7, 'Álvaro', 'alphadlc2016@gmail.com', NULL, '$2y$10$JawueBCwt6HhEFatJXvTd.CuaYX01IR40AgFydD9UyMQ8fluQvPjG', NULL, NULL, NULL, '2023-05-11 11:27:17', NULL, NULL, NULL, '2023-05-11 10:23:33', '2023-05-11 11:27:17', 'cus_NsHDBjfjaDzoVw', NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 'manolito', 'manolito55@gmail.com', NULL, '$2y$10$46djNOPl.2xSef0gVGeRnexplueRvVXClx2FtjrhVviJdEB8q2AfS', NULL, NULL, NULL, '2023-05-11 20:59:41', NULL, NULL, 'profile-photos/Y9REHmxnmpvpt7TJVdZ3QREU5dR5w19RD7M28Xpv.png', '2023-05-11 20:23:19', '2023-05-11 20:59:41', 'cus_NsQsjTXyl7mHYc', 'mastercard', '4444', NULL, NULL, NULL, NULL),
	(9, 'asdasd', 'pepito@gmail.com', NULL, '$2y$10$gdC6gAQ7fSUBDQkJBFwNfej0RaL8T7B9W4yxpaz8Fj2Tw0b7Ka1F6', NULL, NULL, NULL, '2023-05-16 18:50:46', NULL, NULL, NULL, '2023-05-12 08:02:48', '2023-05-16 18:50:46', 'cus_NscA0nIxGNY4FG', NULL, NULL, NULL, NULL, NULL, NULL),
	(12, 'David Ureña', 'streamshare31@gmail.com', NULL, NULL, NULL, NULL, NULL, '2023-05-15 10:48:23', NULL, NULL, NULL, '2023-05-13 09:33:46', '2023-05-15 10:48:23', 'cus_Nt0rNGqZxwOmV0', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/AGNmyxbSwYMp6YBkLyDpaKWNUmdZ3XwTrxVC20OjHzIB=s96-c', '112159660562760892308', 'google'),
	(14, 'david ureña', 'practicasdavidd@gmail.com', NULL, NULL, NULL, NULL, NULL, '2023-06-15 17:28:53', NULL, NULL, NULL, '2023-05-13 14:18:30', '2023-06-15 17:28:53', 'cus_Nt5Sv8yE9yKShF', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/AGNmyxZLernSQqYk2hoKkLU8NM8TWphzghI3cqRHHYwD=s96-c', '112973434696132372946', 'google'),
	(15, 'Manuel Ureña Salamanca', 'manuel.u.s1966@gmail.com', NULL, NULL, NULL, NULL, NULL, '2023-05-13 14:32:42', NULL, NULL, NULL, '2023-05-13 14:23:51', '2023-05-13 14:32:42', 'cus_Nt5Xe10nt40uqF', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/AGNmyxZIaviI6RS1AcCHVKwbNzu2ONYqeOSkPlbXYVCn=s96-c', '104054179014289867389', 'google'),
	(18, 'david ureña', 'investmunsert@gmail.com', NULL, NULL, NULL, NULL, NULL, '2023-06-11 10:47:52', NULL, NULL, NULL, '2023-06-05 14:50:55', '2023-06-11 10:47:52', 'cus_O1iAH0qJ4hR6hH', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/AAcHTtcBQjIHn1fIGd65KOQPcM90xFD_KX9TqknZ7vwG=s96-c', '101287397849396329971', 'google'),
	(19, 'roberto fernandez', 'ytpremium.munsert@gmail.com', NULL, NULL, NULL, NULL, NULL, '2023-06-06 11:13:35', NULL, NULL, NULL, '2023-06-06 11:12:36', '2023-06-06 11:13:35', 'cus_O21sw1b7wWPqnq', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/AAcHTtfjyYqWPZhF5o71bj9G0pMB4APjUOHvI3bH2eL1=s96-c', '106802278031539735260', 'google'),
	(20, 'Ruben Alvarez Fernandez', 'ralvarezfernandez342@gmail.com', NULL, NULL, NULL, NULL, NULL, '2023-06-14 08:59:43', NULL, NULL, NULL, '2023-06-14 08:15:28', '2023-06-14 08:59:43', 'cus_O4yp6Ybp2c6PNE', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/AAcHTtdZhKSpYitAWzdBUSrd7ii_UcmmDrinPq9oA_-G=s96-c', '114406757039451207764', 'google'),
	(21, 'david', 'david_ua_02@hotmail.es', NULL, '$2y$10$EknWXx/s346td.zxdWCg/uIxhfGRneZFyTbqEoeD3hQu.2LMTrLqu', 'eyJpdiI6IjZNNlRiM3NNdUcrTXA3cGw5SGY4YXc9PSIsInZhbHVlIjoiR3ZlYXBFcVhVOWxkME1ESkxmcjNXK1FDdTlzcUtwREFxMGVxT3lQNEk5TT0iLCJtYWMiOiI3ZmE4Y2ExOWM0ZjZjODNiN2Y2MDdmNzFkMjA5YTkzMDcyNWE2Mzc0ZTU3MmNlNzkyMzY2ZTU5MjEzMDEzYTBlIiwidGFnIjoiIn0=', 'eyJpdiI6IjJWd21ZSTAxcWE5S050dWdtS1k2blE9PSIsInZhbHVlIjoiL1JqdG04NHVHRUxVVGpxbEUvMk92R0hYcUJKblAyNWd5T0JTWVVpRndLb2JIZmwvNW1HVlNlWGZPdFA4WXF0WFp6TXFFWjBVNWZXZ2o0cjYwYk83RFFDLzFjY1FEWmQwTWZWejVoRFR2VkpiWVhkS0R6QklValdOM3VJdHdKTjdWd0ZwelJTL0tZUjRxUU1IYldLME8xRUZ0YksyR2J4K1ZhVzQ1azVXWmJVUjFzMUxPWkdtVVRvMWZjKzJXc0dwVzkzZFVnbjdyaG5ZZ0VTWGljWEgvVGN2eXAxOUhzeFdQYXpIaW9Ca0FJVVhpMVAwemc0bFViR09VSWw0aDZ2UStLczNSWTVyRGlaZ0Y3dmYrMWFXb1E9PSIsIm1hYyI6IjU5YzMxNjA1MmYzZGRjMTQ1MzQ1ZjViNTMxN2Y0NDU3ZjEwYzg3NDJiODYzNjZlNmE5NmJkMmZkZjM0MTlhOWQiLCJ0YWciOiIifQ==', '2023-06-15 15:26:49', '2023-06-15 15:41:19', NULL, NULL, NULL, '2023-06-15 15:25:10', '2023-06-15 15:41:19', 'cus_O5Sy9ZkQ9yCVnE', NULL, NULL, NULL, NULL, NULL, NULL),
	(22, 'pacofer71', 'pacofer71@gmail.com', NULL, '$2y$10$Uq9ljGFkKDHVPemDY9XmxOrrUDYQiSmCcogDHqdNuBkXK13KWRTrS', NULL, NULL, NULL, '2023-06-16 06:48:43', NULL, NULL, 'profile-photos/hh40tKVFbJX3ldlP5wpT5S9kvOBi2Em4dH9Ajoio.jpg', '2023-06-16 06:20:48', '2023-06-16 06:48:43', 'cus_O5hQ95l3O13mm8', NULL, NULL, NULL, NULL, NULL, NULL),
	(23, 'José Manuel Fernández Díaz', 'josemanuel.fernandez@iesalandalus.org', NULL, '$2y$10$yubGN1hIROExO/fITrDJQuZbFIvLpYy3Rp/qZKQJ8ZHwVXKFiEC1a', NULL, NULL, NULL, '2023-06-16 06:39:42', NULL, NULL, NULL, '2023-06-16 06:35:58', '2023-06-16 06:39:42', 'cus_O5hfOfsxjD9aHR', NULL, NULL, NULL, NULL, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
