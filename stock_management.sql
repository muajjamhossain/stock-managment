-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 05:45 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_publish` int(11) NOT NULL DEFAULT 1,
  `customer_creator` int(11) DEFAULT NULL,
  `customer_editor` int(11) DEFAULT NULL,
  `customer_slug` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '2022_01_04_193306_create_product_categories_table', 1),
(6, '2022_01_25_191232_create_roles_table', 1),
(8, '2022_02_15_193735_create_customers_table', 3),
(9, '2022_03_21_010241_create_suppliers_table', 4),
(10, '2022_03_21_010905_create_product_purchases_table', 4),
(11, '2022_03_22_035108_create_products_table', 5);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `prodcate_id` int(11) DEFAULT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_publish` int(11) NOT NULL DEFAULT 1,
  `product_creator` int(11) DEFAULT NULL,
  `product_editor` int(11) DEFAULT NULL,
  `product_slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `prodcate_id` bigint(20) UNSIGNED NOT NULL,
  `prodcate_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodcate_remarks` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodcate_slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodcate_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`prodcate_id`, `prodcate_name`, `prodcate_remarks`, `prodcate_slug`, `prodcate_status`, `created_at`, `updated_at`) VALUES
(1, 'Men', '...', 'men', 1, '2022-02-01 13:21:41', '2022-02-08 13:29:33'),
(4, 'Mobile & Gadgets', '...', 'mobile-gadgets', 1, '2022-02-01 13:53:17', '2022-02-08 13:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_purchases`
--

CREATE TABLE `product_purchases` (
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `purchase_price` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_quantity` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_total_price` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_invoice` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_remarks` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_creator` int(11) DEFAULT NULL,
  `purchase_editor` int(11) DEFAULT NULL,
  `purchase_slug` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_slug` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_slug`, `role_status`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'superadmin', 1, '2022-01-25 13:32:21', NULL),
(2, 'Admin', 'admin', 1, '2022-01-25 13:25:24', NULL),
(3, 'Author', 'author', 1, '2022-01-25 13:26:37', NULL),
(4, 'Editor', 'editor', 1, '2022-01-25 13:27:37', NULL),
(5, 'Subscriber', 'subscriber', 1, '2022-01-25 13:31:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_email` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_publish` int(11) NOT NULL DEFAULT 1,
  `supplier_creator` int(11) DEFAULT NULL,
  `supplier_editor` int(11) DEFAULT NULL,
  `supplier_slug` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 5,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `role`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Saidul Islam Uzzal', NULL, 'uzzalbd.creative@gmail.com', NULL, '$2y$10$51rOBfIk64.bAKYR4tBwG.XwbR9Y0BeflW/PIKMphJM70lIrTGBky', 1, NULL, NULL, '2022-01-25 13:26:51', '2022-01-25 13:26:51'),
(2, 'Sajia Afrin', NULL, 'sajia@gmail.com', NULL, '$2y$10$5/wJEy3SaGOycbSoEU0LjeZw6d8E63Ctl.IrXY07OBLDauN1n7mG.', 4, NULL, NULL, '2022-01-25 13:29:47', NULL),
(3, 'Samad Khan', NULL, 'samad@gmail.com', NULL, '$2y$10$oPsZN4BTKwR0PcSwNTH8lus4wENIAsx.aJebtGm36oQumosF18Y2W', 2, '3_1643119090_6932148.png', NULL, '2022-01-25 13:58:09', '2022-01-25 13:58:10'),
(4, 'Nazmul Khan', NULL, 'nazmul@gmail.com', NULL, '$2y$10$8eh3gzyldPVlVDHqG062iezMZvtNMfgBh9G0T.ILrXpcFwPK5x7t6', 3, NULL, NULL, '2022-01-25 14:00:58', NULL),
(5, 'demo', NULL, 'abc@abc.com', NULL, '$2y$10$vrnRrN9nZpPQkA6FIoyO/eqDfXrpQDZfLBQ42.V0MJWteAKuPFlyK', 2, '5_1648654327_4993748.jpg', NULL, '2022-03-30 15:32:07', '2022-03-30 15:32:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customers_customer_phone_unique` (`customer_phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`prodcate_id`),
  ADD UNIQUE KEY `product_categories_prodcate_name_unique` (`prodcate_name`);

--
-- Indexes for table `product_purchases`
--
ALTER TABLE `product_purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`),
  ADD UNIQUE KEY `suppliers_supplier_phone_unique` (`supplier_phone`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `prodcate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_purchases`
--
ALTER TABLE `product_purchases`
  MODIFY `purchase_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
