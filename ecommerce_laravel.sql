-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: apr. 06, 2021 la 06:05 PM
-- Versiune server: 10.4.17-MariaDB
-- Versiune PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `ecommerce_laravel`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `quantity`, `created_at`, `updated_at`) VALUES
(145, 1, 15, 1, '2021-04-04 05:32:36', '2021-04-04 05:32:36');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'electronics', NULL, NULL),
(2, 'Men clothing', 'men clothing', NULL, NULL),
(3, 'Women clothing', 'women clothing', NULL, NULL),
(4, 'Jewelery', 'jewelery', NULL, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categories_products`
--

CREATE TABLE `categories_products` (
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `categories_products`
--

INSERT INTO `categories_products` (`categories_id`, `products_id`) VALUES
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `products_id`, `created_at`, `updated_at`) VALUES
(1, 'Giotoiu Veronica Daniela', 'giotoiudaniela@yahoo.com', 'rgtre', 2, '2021-03-22 16:32:30', '2021-03-22 16:32:30'),
(2, 'Cristea Marius', 'zamsadoru@yahoo.ro', 'sgsgsdsdgsdgs', 4, '2021-03-23 10:32:45', '2021-03-23 10:32:45');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_03_11_081927_create_users_table', 1),
(2, '2021_03_13_181355_create_products_table', 2),
(3, '2021_03_15_171210_create_cart_table', 3),
(4, '2021_03_15_183550_create_carts_table', 4),
(5, '2021_03_16_133335_create_carts_table', 5),
(6, '2021_03_16_133450_create_carts_table', 6),
(7, '2021_03_17_070442_create_categories_table', 7),
(8, '2021_03_17_122118_create_categories_products_table', 8),
(9, '2021_03_17_130428_create_categories_table', 9),
(10, '2021_03_17_152255_create_profiles_table', 10),
(11, '2021_03_20_201940_create_comments_table', 11),
(12, '2021_03_20_220258_create_comments_table', 12),
(13, '2021_03_20_224949_create_comments_table', 13),
(27, '2021_03_21_083823_create_comments_table', 14),
(28, '2021_03_22_132059_create_orders_table', 14),
(32, '2021_03_22_174547_create_order_products_table', 15);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` int(11) NOT NULL,
  `shipping_charges` double(8,2) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `orders`
--

INSERT INTO `orders` (`id`, `users_id`, `name`, `email`, `address`, `city`, `country`, `zip_code`, `shipping_charges`, `payment_method`, `total`, `created_at`, `updated_at`) VALUES
(9, 15, 'Cristea Marius', 'hurricane.1987@yahoo.com', 'Strada Alba Iulia', 'Cluj-Napoca', 'Romania', 65645, 15.00, 'Online payment', 151.53, '2021-03-23 09:26:54', '2021-03-23 09:26:54'),
(10, 15, 'Cristea Marius', 'hurricane.1987@yahoo.com', 'Strada Alba Iulia', 'Cluj-Napoca', 'Romania', 543534, 15.00, 'Online payment', 37.30, '2021-03-23 10:30:21', '2021-03-23 10:30:21'),
(11, 10, 'Zamsa Doru', 'zamsadoru@yahoo.ro', 'Bulevardul Oltenia, Nr 57, Bloc 61 A, Apartament 9 sdfsdf', 'Craiovasdds', 'Romaniafsdfsd', 3435465, 15.00, 'Online payment', 53.29, '2021-04-06 10:02:07', '2021-04-06 10:02:07');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `order__products`
--

CREATE TABLE `order__products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orders_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `order__products`
--

INSERT INTO `order__products` (`id`, `orders_id`, `users_id`, `products_id`, `product_title`, `product_price`, `product_quantity`, `created_at`, `updated_at`) VALUES
(10, 9, 15, 2, 'Mens Casual Premium Slim Fit T-Shirts ', 22.3, 2, '2021-03-23 09:26:55', '2021-03-23 09:26:55'),
(11, 9, 15, 4, 'Mens Casual Slim Fit', 15.99, 3, '2021-03-23 09:26:55', '2021-03-23 09:26:55'),
(12, 9, 15, 8, 'Pierced Owl Rose Gold Plated Stainless Steel Double', 10.99, 4, '2021-03-23 09:26:55', '2021-03-23 09:26:55'),
(13, 10, 15, 2, 'Mens Casual Premium Slim Fit T-Shirts ', 22.3, 1, '2021-03-23 10:30:21', '2021-03-23 10:30:21'),
(14, 11, 10, 4, 'Mens Casual Slim Fit', 15.99, 1, '2021-04-06 10:02:07', '2021-04-06 10:02:07'),
(15, 11, 10, 2, 'Mens Casual Premium Slim Fit T-Shirts ', 22.3, 1, '2021-04-06 10:02:07', '2021-04-06 10:02:07');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `description`, `category`, `image`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Fjallraven - Foldsack No. 1 Backpack, Fits 15 Laptops', '109.95', 'Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday', 'men clothing', '/images/Fjallraven - Foldsack No. 1 Backpack, Fits 15 Laptops.jpg', '100', NULL, NULL),
(2, 'Mens Casual Premium Slim Fit T-Shirts ', '22.3', 'Slim-fitting style, contrast raglan long sleeve, three-button henley placket, light weight & soft fabric for breathable and comfortable wearing. And Solid stitched shirts with round neck made for durability and a great fit for casual fashion wear and diehard baseball fans. The Henley style round neckline includes a three-button placket.', 'men clothing', '/images/Mens Casual Premium Slim Fit T-Shirts.jpg', '100', NULL, NULL),
(3, 'Mens Cotton Jacket', '55.99', 'great outerwear jackets for Spring/Autumn/Winter, suitable for many occasions, such as working, hiking, camping, mountain/rock climbing, cycling, traveling or other outdoors. Good gift choice for you or your family member. A warm hearted love to Father, husband or son in this thanksgiving or Christmas Day.', 'men clothing', '/images/Mens Cotton Jacket.jpg', '100', NULL, NULL),
(4, 'Mens Casual Slim Fit', '15.99', 'The color could be slightly different between on the screen and in practice. / Please note that body builds vary by person, therefore, detailed size information should be reviewed below on the product description.', 'men clothing', '/images/Mens Casual Slim Fit.jpg', '100', NULL, NULL),
(5, 'John Hardy Women\'s Legends Naga Gold & Silver Dragon Station Chain Bracelet', '695', 'From our Legends Collection, the Naga was inspired by the mythical water dragon that protects the ocean\'s pearl. Wear facing inward to be bestowed with love and abundance, or outward for protection.', 'jewelery', '/images/John Hardy Women\'s Legends Naga Gold & Silver Dragon Station Chain Bracelet.jpg', '100', NULL, NULL),
(6, 'Solid Gold Petite Micropave', '168', 'Satisfaction Guaranteed. Return or exchange any order within 30 days.Designed and sold by Hafeez Center in the United States. Satisfaction Guaranteed. Return or exchange any order within 30 days.', 'jewelery', '/images/Solid Gold Petite Micropave.jpg', '100', NULL, NULL),
(7, 'White Gold Plated Princess', '9.99', 'Classic Created Wedding Engagement Solitaire Diamond Promise Ring for Her. Gifts to spoil your love more for Engagement, Wedding, Anniversary, Valentine\'s Day...', 'jewelery', '/images/White Gold Plated Princess.jpg', '100', NULL, NULL),
(8, 'Pierced Owl Rose Gold Plated Stainless Steel Double', '10.99', 'Rose Gold Plated Double Flared Tunnel Plug Earrings. Made of 316L Stainless Steel', 'jewelery', '/images/Pierced Owl Rose Gold Plated Stainless Steel Double.jpg', '100', NULL, NULL),
(9, 'WD 2TB Elements Portable External Hard Drive - USB 3.0', '64', 'USB 3.0 and USB 2.0 Compatibility Fast data transfers Improve PC Performance High Capacity; Compatibility Formatted NTFS for Windows 10, Windows 8.1, Windows 7; Reformatting may be required for other operating systems; Compatibility may vary depending on user’s hardware configuration and operating system', 'electronics', '/images/WD 2TB Elements Portable External Hard Drive - USB 3.0.jpg', '100', NULL, NULL),
(10, 'SanDisk SSD PLUS 1TB Internal SSD - SATA III 6 Gb/s', '109', 'Easy upgrade for faster boot up, shutdown, application load and response (As compared to 5400 RPM SATA 2.5” hard drive; Based on published specifications and internal benchmarking tests using PCMark vantage scores) Boosts burst write performance, making it ideal for typical PC workloads The perfect balance of performance and reliability Read/write speeds of up to 535MB/s/450MB/s (Based on internal testing; Performance may vary depending upon drive capacity, host device, OS and application.)', 'electronics', '/images/SanDisk SSD PLUS 1TB Internal SSD.jpg', '100', NULL, NULL),
(11, 'Silicon Power 256GB SSD 3D NAND A55 SLC Cache Performance Boost SATA III 2.5', '109', '3D NAND flash are applied to deliver high transfer speeds Remarkable transfer speeds that enable faster bootup and improved overall system performance. The advanced SLC Cache Technology allows performance boost and longer lifespan 7mm slim design suitable for Ultrabooks and Ultra-slim notebooks. Supports TRIM command, Garbage Collection technology, RAID, and ECC (Error Checking & Correction) to provide the optimized performance and enhanced reliability.', 'electronics', '/images/Silicon Power 256GB SSD 3D NAND A55 SLC Cache Performance Boost SATA III 2.5.jpeg', '100', NULL, NULL),
(12, 'WD 4TB Gaming Drive Works with Playstation 4 Portable External Hard Drive', '114', 'Expand your PS4 gaming experience, Play anywhere Fast and easy, setup Sleek design with high capacity, 3-year manufacturer\'s limited warranty', 'electronics', '/images/WD 4TB Gaming Drive Works with Playstation 4 Portable External Hard Drive.jpeg', '100', NULL, NULL),
(13, 'Acer SB220Q bi 21.5 inches Full HD (1920 x 1080) IPS Ultra-Thin', '599', '21. 5 inches Full HD (1920 x 1080) widescreen IPS display And Radeon free Sync technology. No compatibility for VESA Mount Refresh Rate=> 75Hz - Using HDMI port Zero-frame design | ultra-thin | 4ms response time | IPS panel Aspect ratio - 16=> 9. Color Supported - 16. 7 million colors. Brightness - 250 nit Tilt angle -5 degree to 15 degree. Horizontal viewing angle-178 degree. Vertical viewing angle-178 degree 75 hertz', 'electronics', '/images/Acer SB220Q bi 21.5 inches Full HD (1920 x 1080) IPS Ultra-Thin.jpeg', '100', NULL, NULL),
(14, 'Samsung 49-Inch CHG90 144Hz Curved Gaming Monitor (LC49HG90DMNXZA) – Super Ultrawide Screen QLED', '999.99', '49 INCH SUPER ULTRAWIDE 32=>9 CURVED GAMING MONITOR with dual 27 inch screen side by side QUANTUM DOT (QLED) TECHNOLOGY, HDR support and factory calibration provides stunningly realistic and accurate color and contrast 144HZ HIGH REFRESH RATE and 1ms ultra fast response time work to eliminate motion blur, ghosting, and reduce input lag', 'electronics', '/images/Samsung 49-Inch CHG90 144Hz Curved Gaming Monitor (LC49HG90DMNXZA) – Super Ultrawide Screen QLED.jpg', '100', NULL, NULL),
(15, 'BIYLACLESEN Women\'s 3-in-1 Snowboard Jacket Winter Coats', '56.99', 'Note=>The Jackets is US standard size, Please choose size as your usual wear Material=> 100% Polyester; Detachable Liner Fabric=> Warm Fleece. Detachable Functional Liner=> Skin Friendly, Lightweigt and Warm.Stand Collar Liner jacket, keep you warm in cold weather. Zippered Pockets=> 2 Zippered Hand Pockets, 2 Zippered Pockets on Chest (enough to keep cards or keys)and 1 Hidden Pocket Inside.Zippered Hand Pockets and Hidden Pocket keep your things secure. Humanized Design=> Adjustable and Detachable Hood and Adjustable cuff to prevent the wind and water,for a comfortable fit. 3 in 1 Detachable Design provide more convenience, you can separate the coat and inner as needed, or wear it together. It is suitable for different season and help you adapt to different climates', 'women clothing', '/images/BIYLACLESEN Women\'s 3-in-1 Snowboard Jacket Winter Coats.jpg', '100', NULL, NULL),
(16, 'Lock and Love Women\'s Removable Hooded Faux Leather Moto Biker Jacket', '29.95', '100% POLYURETHANE(shell) 100% POLYESTER(lining) 75% POLYESTER 25% COTTON (SWEATER), Faux leather material for style and comfort / 2 pockets of front, 2-For-One Hooded denim style faux leather jacket, Button detail on waist / Detail stitching at sides, HAND WASH ONLY / DO NOT BLEACH / LINE DRY / DO NOT IRON', 'women clothing', '/images/Lock and Love Women\'s Removable Hooded Faux Leather Moto Biker Jacket.jpg', '100', NULL, NULL),
(17, 'Rain Jacket Women Windbreaker Striped Climbing Raincoats', '39.99', 'Lightweight perfet for trip or casual wear---Long sleeve with hooded, adjustable drawstring waist design. Button and zipper front closure raincoat, fully stripes Lined and The Raincoat has 2 side pockets are a good size to hold all kinds of things, it covers the hips, and the hood is generous but doesn\'t overdo it.Attached Cotton Lined Hood with Adjustable Drawstrings give it a real styled look.', 'women clothing', '/images/Rain Jacket Women Windbreaker Striped Climbing Raincoats.jpg', '100', NULL, NULL),
(18, 'MBJ Women\'s Solid Short Sleeve Boat Neck V', '9.85', '95% RAYON 5% SPANDEX, Made in USA or Imported, Do Not Bleach, Lightweight fabric with great stretch for comfort, Ribbed on sleeves and neckline / Double stitching on bottom hem', 'women clothing', '/images/MBJ Women\'s Solid Short Sleeve Boat Neck V.jpg', '100', NULL, NULL),
(19, 'Opna Women\'s Short Sleeve Moisture', '7.95', '100% Polyester, Machine wash, 100% cationic polyester interlock, Machine Wash & Pre Shrunk for a Great Fit, Lightweight, roomy and highly breathable with moisture wicking fabric which helps to keep moisture away, Soft Lightweight Fabric with comfortable V-neck collar and a slimmer fit, delivers a sleek, more feminine silhouette and Added Comfort', 'women clothing', '/images/Opna Women\'s Short Sleeve Moisture.jpg', '100', NULL, NULL),
(20, 'DANVOUY Womens T Shirt Casual Cotton Short', '12.99', '95%Cotton,5%Spandex, Features=> Casual, Short Sleeve, Letter Print,V-Neck,Fashion Tees, The fabric is soft and has some stretch., Occasion=> Casual/Office/Beach/School/Home/Street. Season=> Spring,Summer,Autumn,Winter.', 'women clothing', '/images/DANVOUY Womens T Shirt Casual Cotton Short.jpg', '100', NULL, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `email`, `password`, `address`, `city`, `country`, `picture`, `created_at`, `updated_at`) VALUES
(21, 'Doru Zamsa', 'zamsadoru@yahoo.ro', '$2y$10$j5SPHYUUQMWZnn8sKv92QuWDYlaOqTaw7aFZEIq3cDgD0Et.pXbyG', 'Bulevardul Oltenia, Nr 57, Bloc 61 A, Apartament 9', 'Craiova', 'România', '2021-03-28_204335.jpg', '2021-04-06 11:58:16', '2021-04-06 12:38:03');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(27, 'Zamsa Doru', 'doru87', 'zamsadoru@yahoo.ro', '$2y$10$bT/OvYJcjhc6E4WP/ULGiOWOnwP7wQngq9x5gAYjEKP.iBeRwfEZ.', NULL, '2021-04-06 11:58:16', '2021-04-06 11:58:16');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `categories_products`
--
ALTER TABLE `categories_products`
  ADD KEY `categories_products_categories_id_foreign` (`categories_id`),
  ADD KEY `categories_products_products_id_foreign` (`products_id`);

--
-- Indexuri pentru tabele `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_products_id_foreign` (`products_id`);

--
-- Indexuri pentru tabele `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_users_id_foreign` (`users_id`);

--
-- Indexuri pentru tabele `order__products`
--
ALTER TABLE `order__products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order__products_orders_id_foreign` (`orders_id`),
  ADD KEY `order__products_users_id_foreign` (`users_id`),
  ADD KEY `order__products_products_id_foreign` (`products_id`);

--
-- Indexuri pentru tabele `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT pentru tabele `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pentru tabele `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pentru tabele `order__products`
--
ALTER TABLE `order__products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pentru tabele `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pentru tabele `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `categories_products`
--
ALTER TABLE `categories_products`
  ADD CONSTRAINT `categories_products_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `categories_products_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Constrângeri pentru tabele `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Constrângeri pentru tabele `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constrângeri pentru tabele `order__products`
--
ALTER TABLE `order__products`
  ADD CONSTRAINT `order__products_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order__products_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order__products_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
