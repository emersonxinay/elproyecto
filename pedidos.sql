-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-04-2021 a las 14:05:24
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comedor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cooked_products`
--

CREATE TABLE `cooked_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cooked_products`
--

INSERT INTO `cooked_products` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 10, '2019-07-16 17:29:59', '2019-07-16 17:29:59'),
(2, 1, 1, 5, '2019-07-16 17:29:59', '2019-07-16 17:29:59'),
(3, 2, 2, 12, '2019-07-16 17:36:26', '2019-07-16 17:36:26'),
(4, 2, 1, 6, '2019-07-16 17:36:26', '2019-07-16 17:36:26'),
(9, 10, 2, 1, '2021-04-30 06:39:04', '2021-04-30 06:39:04'),
(10, 11, 2, 2, '2021-04-30 06:56:49', '2021-04-30 06:56:49'),
(11, 11, 1, 1, '2021-04-30 06:56:49', '2021-04-30 06:56:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dishes`
--

CREATE TABLE `dishes` (
  `id` int(10) UNSIGNED NOT NULL,
  `dish` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dishes`
--

INSERT INTO `dishes` (`id`, `dish`, `thumbnail`, `available`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Juane', 'uploads/dish/thumbnail\\49241912.png', 1, 1, 4, '2019-06-07 15:06:51', '2019-10-26 01:27:25'),
(2, 'pollo', 'uploads/dish/thumbnail/82168424.png', 1, 1, 1, '2019-07-09 23:07:43', '2019-07-09 23:07:43'),
(3, 'El paisaje', 'uploads/dish/thumbnail/29648170.jpeg', 1, 1, 5, '2021-04-30 06:34:56', '2021-04-30 06:34:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dish_infos`
--

CREATE TABLE `dish_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `dish_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dish_infos`
--

INSERT INTO `dish_infos` (`id`, `dish_id`, `title`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Juane', 'uploads/dish/images/41579161.png', 1, '2019-06-07 15:07:39', '2019-06-07 15:07:39'),
(2, 3, 'el paisaje', 'uploads/dish/images/8988890.jpeg', 5, '2021-04-30 06:35:44', '2021-04-30 06:35:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dish_prices`
--

CREATE TABLE `dish_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `dish_id` int(11) NOT NULL,
  `dish_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dish_prices`
--

INSERT INTO `dish_prices` (`id`, `dish_id`, `dish_type`, `price`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 10, 1, '2019-06-07 15:07:09', '2019-06-07 15:07:09'),
(2, 2, '1/2', 2, 1, '2019-07-09 23:07:55', '2019-07-09 23:07:55'),
(3, 2, '1/4', 1, 1, '2019-07-09 23:08:08', '2019-07-09 23:08:08'),
(4, 3, 'entrada', 10, 5, '2021-04-30 06:35:13', '2021-04-30 06:35:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dish_types`
--

CREATE TABLE `dish_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `dish` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `name`, `thumbnail`, `phone`, `email`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Daniel Gonzales', NULL, '987456321', 'daniel_cocinero@hotmail.com', 'Huanuco - Jr:\"Los Frutales\" S/n', 2, '2019-07-16 17:16:39', '2019-07-16 17:16:39'),
(2, 'Jose Sandoval Perez', NULL, '987456321', 'jose_camarero@hotmail.com', 'Huanuco - Cayhuayna Km 4', 3, '2019-07-16 17:19:47', '2019-07-16 17:19:47'),
(3, 'Reinaldo Condor Zapata', NULL, '987456322', 'reinaldo_gerente@hotmail.com', 'Huanuco - Jr: La Bandera', 4, '2019-07-16 17:21:34', '2019-07-16 17:21:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_16_150701_create_employees_table', 1),
(4, '2017_08_16_151020_create_products_table', 1),
(5, '2017_08_16_151257_create_stocks_table', 1),
(6, '2017_08_17_125846_create_dishes_table', 1),
(7, '2017_08_17_125931_create_product_dishes_table', 1),
(8, '2017_08_17_130127_create_units_table', 1),
(9, '2017_08_19_065117_create_dish_types_table', 1),
(10, '2017_08_19_080505_create_dish_infos_table', 1),
(11, '2017_08_19_080511_create_dish_prices_table', 1),
(12, '2017_08_25_165258_create_tables_table', 1),
(13, '2017_08_25_185544_create_purses_table', 1),
(14, '2017_08_25_193023_create_suppliers_table', 1),
(15, '2017_08_27_200002_create_purses_products_table', 1),
(16, '2017_08_27_203100_create_purses_payments_table', 1),
(17, '2017_08_29_184411_create_office_expanses_table', 1),
(18, '2017_08_31_092814_create_recipes_table', 1),
(19, '2017_09_04_215955_create_orders_table', 1),
(20, '2017_09_04_220242_create_order_details_table', 1),
(21, '2017_09_05_111607_create_cooked_products_table', 1),
(22, '2017_09_22_052002_create_product_types_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `office_expanses`
--

CREATE TABLE `office_expanses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `expanse` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_no` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `served_by` int(11) NOT NULL,
  `kitchen_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `payment` double DEFAULT NULL,
  `vat` double NOT NULL DEFAULT 0,
  `change_amount` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `table_id`, `served_by`, `kitchen_id`, `user_id`, `status`, `payment`, `vat`, `change_amount`, `created_at`, `updated_at`) VALUES
(1, 25142, 0, 1, 2, 4, 2, 1, 0, 0, '2019-07-16 17:29:59', '2019-07-18 23:52:51'),
(2, 25142, 0, 3, 2, 4, 3, NULL, 0, 0, '2019-07-16 17:36:26', '2021-03-26 13:17:00'),
(4, 25142, 0, 3, 2, 0, 3, 0, 0, 0, '2019-07-18 23:54:07', '2021-03-26 13:16:57'),
(5, 25142, 0, 3, 2, 0, 2, 0, 0, 0, '2019-07-19 23:59:44', '2019-10-26 01:47:15'),
(8, 25142, 0, 3, 2, 0, 3, 0, 0, 0, '2019-10-29 04:31:51', '2021-03-26 13:16:54'),
(9, 25142, 0, 3, 2, 0, 3, NULL, 0, 0, '2021-03-26 13:14:36', '2021-03-26 13:16:51'),
(10, 25142, 0, 5, 0, 0, 0, 20, 0, -10, '2021-04-30 06:39:04', '2021-04-30 06:39:04'),
(11, 25142, 0, 5, 2, 0, 3, 50, 0, -40, '2021-04-30 06:56:49', '2021-04-30 06:58:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `dish_type_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `net_price` double NOT NULL,
  `gross_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `dish_id`, `dish_type_id`, `quantity`, `net_price`, `gross_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 5, 10, 50, '2019-07-16 17:29:59', '2019-07-16 17:29:59'),
(2, 2, 1, 1, 6, 10, 60, '2019-07-16 17:36:26', '2019-07-16 17:36:26'),
(4, 4, 2, 2, 1, 2, 2, '2019-07-18 23:54:07', '2019-07-18 23:54:07'),
(5, 5, 2, 2, 2, 2, 4, '2019-07-19 23:59:44', '2019-07-19 23:59:44'),
(8, 8, 2, 2, 3, 2, 6, '2019-10-29 04:31:51', '2019-10-29 04:31:51'),
(9, 8, 2, 3, 2, 1, 2, '2019-10-29 04:31:51', '2019-10-29 04:31:51'),
(10, 9, 2, 3, 4, 1, 4, '2021-03-26 13:14:36', '2021-03-26 13:14:36'),
(11, 10, 3, 4, 1, 10, 10, '2021-04-30 06:39:04', '2021-04-30 06:39:04'),
(12, 11, 1, 1, 1, 10, 10, '2021-04-30 06:56:49', '2021-04-30 06:56:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_type_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `product_name`, `thumbnail`, `product_type_id`, `unit_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'manzana', 'uploads/products/thumbnail\\92219568.jpeg', 1, 1, 1, '2019-07-12 01:14:58', '2019-10-26 01:06:16'),
(2, 'PLatano', 'uploads/products/thumbnail\\65798393.jpeg', 1, 1, 1, '2019-07-16 17:23:26', '2019-10-26 01:08:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_dishes`
--

CREATE TABLE `product_dishes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_types`
--

CREATE TABLE `product_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `product_types`
--

INSERT INTO `product_types` (`id`, `product_type`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fruta', 1, 1, '2019-07-12 01:14:35', '2019-07-12 01:14:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purses`
--

CREATE TABLE `purses` (
  `id` int(10) UNSIGNED NOT NULL,
  `purses_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purses_value` double NOT NULL,
  `is_payed` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `purses`
--

INSERT INTO `purses` (`id`, `purses_id`, `supplier_id`, `purses_value`, `is_payed`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '35301', 1, 10, 0, 1, '2019-07-12 01:15:17', '2019-07-12 01:15:17'),
(2, '46411', 2, 10, 0, 1, '2019-07-16 17:26:29', '2019-07-16 17:26:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purses_payments`
--

CREATE TABLE `purses_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purse_id` int(11) DEFAULT NULL,
  `payment_amount` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purses_products`
--

CREATE TABLE `purses_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `purse_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `child_unit_price` double NOT NULL,
  `gross_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `purses_products`
--

INSERT INTO `purses_products` (`id`, `purse_id`, `product_id`, `quantity`, `unit_price`, `child_unit_price`, `gross_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 12, 1, 0.001, 12, '2019-07-12 01:15:17', '2019-07-12 01:15:17'),
(2, 2, 2, 30, 1, 0.001, 30, '2019-07-16 17:26:29', '2019-07-16 17:26:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recipes`
--

CREATE TABLE `recipes` (
  `id` int(10) UNSIGNED NOT NULL,
  `dish_id` int(11) NOT NULL,
  `dish_type_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_needed` double NOT NULL,
  `child_unit_needed` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `recipes`
--

INSERT INTO `recipes` (`id`, `dish_id`, `dish_type_id`, `product_id`, `unit_needed`, `child_unit_needed`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 2, 2000, 1, '2019-07-16 17:28:04', '2019-07-16 17:28:04'),
(2, 1, 1, 1, 1, 1000, 1, '2019-07-16 17:28:34', '2019-07-16 17:28:34'),
(3, 3, 4, 2, 1, 1000, 5, '2021-04-30 06:36:14', '2021-04-30 06:36:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `stock_code` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `stock_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `unit_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Ivan Gonzales', 'ivan@kdosh.com', '958471635', 'Huanuco: Jr: Gardenias', 1, 1, '2019-07-12 01:13:42', '2019-10-26 01:00:56'),
(2, 'Thalia Damian', 'thalia_proveedora@hotmail.com', '987456311', 'Huanuco: Jr\"Los pinos\"', 1, 1, '2019-07-16 17:25:04', '2019-07-16 17:25:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tables`
--

CREATE TABLE `tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_no` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `table_capacity` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tables`
--

INSERT INTO `tables` (`id`, `table_no`, `table_capacity`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '10', 5, 1, 1, '2019-07-16 17:29:10', '2019-07-16 17:29:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `child_unit` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `convert_rate` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `units`
--

INSERT INTO `units` (`id`, `unit`, `child_unit`, `convert_rate`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'kg', 'gramos', 1000, 1, 1, '2019-07-12 01:13:23', '2019-07-12 01:13:23'),
(2, 'Litro', 'ml', 1000, 1, 1, '2019-07-16 17:14:32', '2019-07-16 17:14:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `role` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `active`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'comedor', 'comedor@imaginaticsperu.com', 'uploads/employee/649164.jpeg', '$2y$10$wqjoqb7W3PieVZ4lhWeJt.Hm/8eQULYPxOnrLb.UhdBd9kbffZNX6', 1, 1, 'r9tvtfpetrzqPJXEIAyofnr2d5KwGkpzlMhKuCkyqJP3QC6k6BFiZp3POaVe', '2019-06-07 15:05:48', '2021-04-30 04:08:17'),
(2, 'Daniel Gonzales', 'daniel_cocinero@hotmail.com', 'uploads/employee\\764643.jpeg', '$2y$10$UAlmxGDJnkhAJ.DDflEgfuzzlmYS9eqsFlBbwk4esBFKG/VzvHe4S', 1, 3, 'qBnbCebDQzh3W6Z7RikZ0v9sg3k9BD1OpL4nIvAU103hyUF2bq8GhuaA11lW', '2019-07-16 17:16:39', '2019-10-26 00:52:42'),
(3, 'Jose Sandoval Perez', 'jose_camarero@hotmail.com', 'uploads/employee\\333036.jpeg', '$2y$10$9BUpU.tL992gtBDcF0UTx.fBJLRaDSVhj5276A37qCAcf.nMUPTlG', 1, 4, '6FKbdSutwDS1L1CDQ3vMmARgzvlxVcEFrOaoO5ELX4KYKMELT5sTl3vHou5l', '2019-07-16 17:19:47', '2019-10-26 00:54:44'),
(4, 'Reinaldo Condor Zapata', 'reinaldo_gerente@hotmail.com', 'uploads/employee\\177578.jpeg', '$2y$10$VwHkinR1ClnakBN3rOeS7.avvwIkUaumTFqLQD2hJOLFDpNP4Pmfe', 1, 2, 'Awp9rRKqH8kH1Bt37k0sxNrVTmFi1xywUCD56TPGDsKxVKI57oCbag05LVAU', '2019-07-16 17:21:34', '2019-10-26 00:58:06'),
(5, 'emerson', 'xinay_ch@hotmail.com', 'uploads/employee/355539.jpeg', '$2y$10$9VXqxiTUbOt/k9Odvnq2w.pnmNuYe14mhz3bWPTmBtIZ/O7G93h8W', 1, 1, '2hdv2LGJoh7wEnMtlnKhjzzCcF6xcz1L2eWzekR2nZZvsD7A6HGYp9ktYIMl', '2021-04-29 21:31:47', '2021-04-30 06:37:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cooked_products`
--
ALTER TABLE `cooked_products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dish_infos`
--
ALTER TABLE `dish_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dish_prices`
--
ALTER TABLE `dish_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dish_types`
--
ALTER TABLE `dish_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `office_expanses`
--
ALTER TABLE `office_expanses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_dishes`
--
ALTER TABLE `product_dishes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `purses`
--
ALTER TABLE `purses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `purses_payments`
--
ALTER TABLE `purses_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `purses_products`
--
ALTER TABLE `purses_products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `cooked_products`
--
ALTER TABLE `cooked_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `dish_infos`
--
ALTER TABLE `dish_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `dish_prices`
--
ALTER TABLE `dish_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `dish_types`
--
ALTER TABLE `dish_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `office_expanses`
--
ALTER TABLE `office_expanses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `product_dishes`
--
ALTER TABLE `product_dishes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `purses`
--
ALTER TABLE `purses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `purses_payments`
--
ALTER TABLE `purses_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `purses_products`
--
ALTER TABLE `purses_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
