-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2018 a las 22:38:21
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apptaller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controller`
--

CREATE TABLE `controller` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of the Class Controller',
  `containerName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of the module container',
  `prefix` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of the route in the group',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Status from controller, 1 for visible, 0 not visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `controller`
--

INSERT INTO `controller` (`id`, `name`, `containerName`, `prefix`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SystemController', 'General', 'system', 1, NULL, NULL),
(2, 'MethodController', 'General', 'system', 1, '2018-12-06 03:56:30', '2018-12-06 03:56:30'),
(3, 'ModuleController', 'General', 'system', 1, '2018-12-06 03:57:07', '2018-12-06 03:57:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `method`
--

CREATE TABLE `method` (
  `id` int(10) UNSIGNED NOT NULL,
  `controller_id` int(10) UNSIGNED NOT NULL,
  `verbName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of the verb HTTP, can be post, get, put, patch, delete or resource',
  `name_function` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Name of the function, except if verbName is resource',
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of the url to show',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Name of the route, except if verbName is resource',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `method`
--

INSERT INTO `method` (`id`, `controller_id`, `verbName`, `name_function`, `url`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'get', 'index', 'controller', 'controller.index', NULL, NULL),
(2, 1, 'get', 'ApiController', 'api/controller', 'api.controller', NULL, NULL),
(3, 1, 'get', 'create', 'controller/create', 'controller.create', NULL, NULL),
(4, 1, 'put', 'update', 'controller/{controller}', 'controller.update', NULL, NULL),
(5, 1, 'delete', 'destroy', 'controller/{controller}', 'controller.destroy', NULL, NULL),
(6, 1, 'post', 'store', 'controller', 'controller.store', NULL, NULL),
(7, 1, 'get', 'edit', 'controller/{controller}/edit', 'controller.edit', NULL, NULL),
(8, 2, 'get', 'index', 'method', 'method.index', NULL, NULL),
(9, 2, 'get', 'ApiMethod', 'api/method', 'api.method', NULL, NULL),
(10, 2, 'get', 'create', 'method/create', 'method.create', NULL, NULL),
(11, 2, 'post', 'store', 'method', 'method.store', NULL, NULL),
(12, 2, 'get', 'edit', 'method/{method}/edit', 'method.edit', '2018-12-10 22:05:31', '2018-12-10 22:05:31'),
(13, 2, 'delete', 'destroy', 'method/{method}', 'method.destroy', '2018-12-10 22:07:20', '2018-12-10 22:07:20'),
(14, 2, 'put', 'update', 'method/{method}', 'method.update', '2018-12-10 22:39:31', '2018-12-10 22:39:31'),
(15, 3, 'get', 'index', 'module', 'module.index', NULL, NULL),
(16, 3, 'get', 'ApiModule', 'api/module', 'api.module', '2018-12-10 23:33:57', '2018-12-10 23:33:57'),
(17, 3, 'get', 'create', 'module/create', 'module.create', '2018-12-11 02:01:46', '2018-12-11 02:01:46'),
(18, 3, 'post', 'store', 'module', 'module.store', '2018-12-11 03:05:18', '2018-12-11 03:05:18'),
(19, 3, 'get', 'edit', 'module/{module}/edit', 'module.edit', '2018-12-11 03:25:29', '2018-12-11 03:25:29'),
(20, 3, 'delete', 'destroy', 'module/{module}', 'module.destroy', '2018-12-11 03:26:33', '2018-12-11 03:26:33'),
(21, 3, 'put', 'update', 'module/{module}', 'module.update', '2018-12-11 03:27:43', '2018-12-11 03:27:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_28_180211_create_controllers__table', 1),
(4, '2018_11_28_214855_create_module_table', 2),
(5, '2018_11_29_165208_create_method_table', 3),
(6, '2015_01_20_084450_create_roles_table', 4),
(7, '2015_01_20_084525_create_role_user_table', 4),
(8, '2015_01_24_080208_create_permissions_table', 4),
(9, '2015_01_24_080433_create_permission_role_table', 4),
(10, '2015_12_04_003040_add_special_role_column', 4),
(11, '2017_10_17_170735_create_permission_user_table', 4),
(12, '2018_11_29_182206_create_module_table', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `module`
--

CREATE TABLE `module` (
  `id` int(10) UNSIGNED NOT NULL,
  `method_id` int(10) UNSIGNED DEFAULT NULL,
  `module_id` int(10) UNSIGNED DEFAULT NULL,
  `main` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'indicates whether the module is main or a submenu, 1 for itself, 0 for not',
  `order` int(11) NOT NULL COMMENT 'Order that show the modules',
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of the module that show in the menu',
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'circle' COMMENT 'Name of the icon to show in the menu, watch names in fontawesome',
  `icon_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Text that show next to module''s name',
  `label_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Name of the color for the label, can be the color''s name in ui Elements, System in adminLTE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `module`
--

INSERT INTO `module` (`id`, `method_id`, `module_id`, `main`, `order`, `text`, `icon`, `icon_color`, `label`, `label_color`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 1, 1, 'System', 'rocket', NULL, NULL, NULL, NULL, '2018-12-11 03:30:31'),
(2, 1, 1, 0, 1, 'Controller', 'circle', NULL, NULL, NULL, NULL, NULL),
(3, 8, 1, 0, 2, 'Method', 'circle', NULL, NULL, NULL, NULL, NULL),
(4, 15, 1, 0, 3, 'Module', 'circle', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_user`
--

CREATE TABLE `permission_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special` enum('all-access','no-access') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@appTaller.com', NULL, '$2y$10$ic4gHK9Qbl/7FPY8.HK1f.jOKHj5eydEJbrYa.1qM8nVgUYUVZcwi', 'xG90yMvkHh3PC12AXigzGEx9gIESVzBJgu9bT0e9vZ44aUWdPeIWZwV8D0as', '2018-11-29 21:47:49', '2018-11-29 21:47:49');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `controller`
--
ALTER TABLE `controller`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `controller_name_unique` (`name`);

--
-- Indices de la tabla `method`
--
ALTER TABLE `method`
  ADD PRIMARY KEY (`id`),
  ADD KEY `method_controller_id_index` (`controller_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_method_id_index` (`method_id`),
  ADD KEY `module_module_id_index` (`module_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indices de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_index` (`permission_id`),
  ADD KEY `permission_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `controller`
--
ALTER TABLE `controller`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `method`
--
ALTER TABLE `method`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `module`
--
ALTER TABLE `module`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `method`
--
ALTER TABLE `method`
  ADD CONSTRAINT `method_controller_id_foreign` FOREIGN KEY (`controller_id`) REFERENCES `controller` (`id`);

--
-- Filtros para la tabla `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_method_id_foreign` FOREIGN KEY (`method_id`) REFERENCES `method` (`id`),
  ADD CONSTRAINT `module_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`);

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
