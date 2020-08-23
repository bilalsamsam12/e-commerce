-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 28 juil. 2020 à 21:31
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecom`
--

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_02_25_114213_create_tbl_admin_table', 1),
(2, '2020_02_26_010543_create_tbl_category_table', 2),
(4, '2020_02_26_172158_create_tblmanufacture_table', 3),
(6, '2020_02_26_221826_create_tbl_products_table', 4),
(7, '2020_02_27_150226_create_tbl_slider_table', 5),
(14, '2017_06_26_000000_create_shopping_cart_table', 6),
(15, '2020_03_05_155944_create_tbl_customer_table', 6),
(16, '2020_03_05_182200_create_tbl_shipping_table', 7),
(17, '2020_03_06_195242_create_tbl_order_table', 8),
(18, '2020_03_06_195310_create_tbl_order_details_table', 8),
(19, '2020_03_06_200900_create_tbl_payment_table', 9);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'bilalsamsam12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'SAMSAM bilal', '0658861078', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_statut` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_statut`, `created_at`, `updated_at`) VALUES
(14, 'WAMENS', 'WAMENS', 1, '2020-03-12 22:19:52', '2020-03-12 22:19:52'),
(15, 'MANS', 'MANS', 1, '2020-03-12 22:20:41', '2020-03-12 22:20:41'),
(16, 'GUYS', 'guys', 1, '2020-03-12 22:23:30', '2020-03-12 22:23:30'),
(17, 'GIRL', 'GIRL', 1, '2020-03-12 22:24:02', '2020-03-12 22:24:02'),
(18, 'KIDS', 'KIDS', 1, '2020-03-12 22:26:34', '2020-03-12 22:26:34');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_number`, `created_at`, `updated_at`) VALUES
(4, 'samsam bilal', 'bilal@gmail.com', 'bilal12369', '0000202', '2020-03-06 00:22:58', '2020-03-06 00:22:58');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_manufacture`
--

CREATE TABLE `tbl_manufacture` (
  `manufacture_id` bigint(20) UNSIGNED NOT NULL,
  `manufacture_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_statut` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tbl_manufacture`
--

INSERT INTO `tbl_manufacture` (`manufacture_id`, `manufacture_name`, `manufacture_description`, `publication_statut`, `created_at`, `updated_at`) VALUES
(5, 'classiques', 'classiques', 1, '2020-03-12 22:29:38', '2020-03-12 22:29:38'),
(6, 'Jeunes', 'jeunes', 1, '2020-03-12 22:30:06', '2020-03-12 22:30:06'),
(7, 'plus trendy', 'plus trendy', 1, '2020-03-12 22:30:27', '2020-03-12 22:30:27'),
(8, 'Weekday', 'Weekday', 1, '2020-03-12 22:30:54', '2020-03-12 22:30:54'),
(9, 'Met', 'Met', 1, '2020-03-12 22:31:18', '2020-03-12 22:31:18'),
(10, 'Brand', 'Brand', 1, '2020-03-12 22:31:38', '2020-03-12 22:31:38'),
(11, 'zara', 'zara', 1, '2020-03-12 22:58:20', '2020-03-12 22:58:20');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_detail_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_sales_quantite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_methode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `manufacture_id` bigint(20) NOT NULL,
  `product_short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite` int(11) NOT NULL,
  `publication_statut` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `category_id`, `manufacture_id`, `product_short_description`, `product_long_description`, `product_price`, `product_image`, `product_size`, `product_color`, `quantite`, `publication_statut`, `created_at`, `updated_at`) VALUES
(12, 'Combinaison', 14, 5, 'robe. On vous a donc sélectionné une liste des meilleures marques de jeans pour femmes.', 'avoir au moins un jean bleu, bleu foncé, noir et blanc dans sa garde -robe. On vous a donc sélectionné une liste des meilleures marques de jeans pour femmes.on', 36.00, 'image/MV2iFAahTU48CVLBLKbn.png', 'sm,xl,xxl', 'Noire', 30, 1, '2020-03-12 22:37:56', '2020-03-12 22:37:56'),
(13, 'Robe de mariée', 14, 8, 'Quand on parle de jean, on pense forcément aux marques les plus connues dans le domaine comme Levi’s par exemple qui est certainement la griffe américaine de référence en jean. Connue depuis des années, ses modèles comme', 'Quand on parle de jean, on pense forcément aux marques les plus connues dans le domaine comme Levi’s par exemple qui est certainement la griffe américaine de référence en jean. Connue depuis des années, ses modèles comme', 40.00, 'image/JWUXvnEuC9Jtka2yAtsY.jpg', 'sm,xl,xxl', 'blanche', 25, 1, '2020-03-12 22:43:03', '2020-03-12 22:43:03'),
(14, 'robe de feeh', 14, 10, 'blanche', 'blanche', 45.00, 'image/aL3NoPcLyZd1h9mQiNGp.jpg', 'sm,xl,xxl', 'bleu', 30, 1, '2020-03-12 22:44:14', '2020-03-12 22:44:14'),
(15, 'chauder', 14, 5, 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 31.00, 'image/acGSatQlw53xZTlcT9Ll.jpg', 'sm,xl,xxl', 'taiger', 8, 1, '2020-03-12 22:46:32', '2020-03-12 22:46:32'),
(16, 'moaklos', 14, 5, 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 40.00, 'image/5ODwkKZQJXK58V3dscyu.jpg', 'sm,xl,xxl', 'gree', 30, 1, '2020-03-12 22:47:37', '2020-03-12 22:47:37'),
(17, 'kokalos', 14, 5, 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 36.00, 'image/wQVkv3pClaK5P72zv77N.jpg', 'sm,xl,xxl', 'rouge', 30, 1, '2020-03-12 22:48:17', '2020-03-12 22:48:17'),
(18, 'kamposou', 17, 7, 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 80.00, 'image/VPvdm72KnHX03X6S5eJM.jpg', 'sm,xl,xxl', 'yallo', 30, 1, '2020-03-12 22:49:12', '2020-03-12 22:49:12'),
(19, 'Robe militére', 17, 9, 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 32.00, 'image/ravEi7nCgxFe68o1TKCU.jpg', 'sm,xl,xxl', 'yallo', 30, 1, '2020-03-12 22:51:06', '2020-03-12 22:51:06'),
(20, 'moaklos bord', 17, 7, 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 36.00, 'image/YKTYNbCATkIML7n6z4aM.jpg', 'sm,xl,xxl', 'green', 25, 1, '2020-03-12 22:52:02', '2020-03-12 22:52:02'),
(21, 'open fleur', 17, 10, 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 65.00, 'image/jZu1KNHrF9rkYMrfF0OB.jpg', 'sm,xl,xxl', 'taiger', 25, 1, '2020-03-12 22:53:02', '2020-03-12 22:53:02'),
(22, 'todo', 17, 11, 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 36.00, 'image/zI3Db98wZQvF7D2KiBYb.jpg', 'sm,xl,xxl', 'bleu', 30, 1, '2020-03-12 22:59:11', '2020-03-12 22:59:11'),
(23, 'Lee', 16, 6, 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 'le monde entier. Mais Levi’s n’est pas la seule marque, Lee Wrangler ou encore Diesel, sont aussi réputées pour leurs jeans de qualité destinés aussi bien aux femmes qu’aux hommes. Noir, blanc', 40.00, 'image/FwjVftTiGZo2Id1euwE0.jpg', 'sm,xl,xxl', 'bleu', 25, 1, '2020-03-12 23:01:14', '2020-03-12 23:01:14'),
(24, 'Cheap Monday', 17, 11, 'Cheap Monday', 'Cheap Monday', 120.00, 'image/Ftc4hneiIaYmdBZTYqNI.jpg', 'sm,xl,xxl', 'gree', 30, 1, '2020-03-12 23:02:56', '2020-03-12 23:02:56'),
(25, 'la toiles', 15, 6, 'Cheap Monday', 'Cheap Monday', 360.00, 'image/FNZx92p8tXu7tkvZT7KO.jpg', 'sm,xl,xxl', 'blanche', 30, 1, '2020-03-12 23:10:40', '2020-03-12 23:10:40'),
(26, 'brodkan', 15, 8, 'Cheap Monday', 'Cheap Monday', 310.00, 'image/QdsbhhR04ifjpADYs75M.jpg', 'sm,xl,xxl', 'bleu marin', 30, 1, '2020-03-12 23:12:10', '2020-03-12 23:12:10'),
(27, 'Combinaison', 16, 9, 'Cheap Monday', 'Cheap Monday', 40.00, 'image/5Wcgv5pVFXQfLCbLY98E.webp', 'sm,xl,xxl', 'bleu', 30, 1, '2020-03-12 23:15:00', '2020-03-12 23:15:00'),
(28, 'jinse', 16, 11, 'Cheap Monday', 'Cheap Monday', 400.00, 'image/OfPN5dGXfZuIGILATfkn.jpg', 'sm,xl,xxl', 'back,reed,wight', 80, 1, '2020-03-12 23:17:48', '2020-03-12 23:17:48'),
(29, 'moaklos', 18, 10, 'Cheap Monday', 'Cheap Monday', 40.00, 'image/Ka8lpasR4a53Hjnpn3Iy.jpg', 'sm,xl,xxl', 'blanche,black', 30, 1, '2020-03-12 23:20:28', '2020-03-12 23:20:28'),
(30, 'moaklos', 18, 8, 'Cheap Monday', 'Cheap Monday', 100.00, 'image/dMn37yMBVwuLfYXqinXa.jpg', 'sm,xl,xxl', 'black', 30, 1, '2020-03-12 23:21:24', '2020-03-12 23:21:24'),
(31, 'Combinaison', 18, 10, 'Cheap Monday', 'Cheap Monday', 36.00, 'image/VWJbcX5oUvRl2s8HtHmx.jpg', 'sm,xl,xxl', 'gree', 30, 1, '2020-03-12 23:22:10', '2020-03-12 23:22:10'),
(32, 'chauder', 18, 9, 'jjj', 'jjj', 45.00, 'image/cxuvixcgUpyWvg7P0hwJ.jpg', 'sm,xl,xxl', 'black,wight', 25, 1, '2020-03-12 23:23:46', '2020-03-12 23:23:46');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_email` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` bigint(20) UNSIGNED NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_statut` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `publication_statut`, `created_at`, `updated_at`) VALUES
(5, 'image/m1G1NyEyiJAbffLmBXND.jpg', 1, '2020-02-27 19:56:46', '2020-02-27 19:56:46'),
(6, 'image/7Bw2pEKm8ZEEPAraA6JS.jpg', 1, '2020-02-27 19:57:05', '2020-02-27 19:57:05'),
(7, 'image/2RaPoi6A2dwVRAyRIsde.jpg', 1, '2020-02-27 19:57:32', '2020-02-27 19:57:32');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Index pour la table `tbl_manufacture`
--
ALTER TABLE `tbl_manufacture`
  ADD PRIMARY KEY (`manufacture_id`);

--
-- Index pour la table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Index pour la table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Index pour la table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Index pour la table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Index pour la table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tbl_manufacture`
--
ALTER TABLE `tbl_manufacture`
  MODIFY `manufacture_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
