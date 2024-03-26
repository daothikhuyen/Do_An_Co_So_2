-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 06:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `do_an_cs2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `total` float NOT NULL,
  `status` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_product`, `total`, `status`, `quantity`, `user_id`) VALUES
(134, 40, 0, 0, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(1, 'Trung Thu Cakes', 'category_01.jpg'),
(2, 'Birthday Cake', 'category_02.jpg'),
(3, 'Tiramisu Cake', 'category_03.jpg'),
(4, 'Black Forest', 'category_04.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `content_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `content`, `content_time`) VALUES
(1, 1, 1, 'Bánh Rất Ngon , Đẹp, Thích Hợp Mang Tặng❤️😍', '2023-10-06'),
(30, 1, 45, 'Bánh Rất Ngon', '2010-11-23'),
(31, 1, 41, 'Bánh Rất Ngon', '2010-11-23'),
(32, 1, 4, 'Bánh Rất Ngon', '2010-11-23'),
(54, 1, 36, 'Bánh 10 điểm', '2010-11-23'),
(55, 1, 8, 'Bánh 10 điểm', '2010-11-23'),
(59, 1, 45, 'Bánh Rất Ngon , Sẽ Còn mua lại', '2024-11-23'),
(60, 1, 41, 'Bánh Rất Ngon , Sẽ Còn mua lại', '2024-11-23'),
(61, 1, 4, 'Bánh Rất Ngon , Sẽ Còn mua lại', '2024-11-23'),
(62, 1, 48, 'Bánh Rất Tuyệt', '2027-11-23'),
(63, 1, 48, 'Sản phẩm tốt', '2013-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `note` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 : Đang chờ xác nhận\r\n1: Đang giao\r\n2: Đã giao\r\n3: Đã Huỷ',
  `total_money` text NOT NULL,
  `create_time` varchar(255) NOT NULL,
  `last_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `fullname`, `email`, `adress`, `phone_number`, `note`, `status`, `total_money`, `create_time`, `last_time`) VALUES
(126, 1, 'Đào Minh Khả', 'daothikhuyen30@gmail.com', 'Đà Nẵng', '0834006551', '', 3, '$512.00', '27-11-2023 09:54:43am', '27-11-2023 09:54:43am'),
(127, 1, 'Đào Minh Khả', 'daothikhuyen30@gmail.com', 'Đà Nẵng', '0834006551', '', 2, '$735.00', '27-11-2023 09:55:10am', '27-11-2023 09:55:10am'),
(128, 1, 'Đào Minh Khả', 'daothikhuyen30@gmail.com', 'Đà Nẵng', '0834006551', '', 1, '$322.00', '03-12-2023 08:40:41am', '03-12-2023 08:40:41am'),
(129, 1, 'Đào Minh Khả', 'daothikhuyen30@gmail.com', 'Đà Nẵng', '0834006551', '', 3, '$39.00', '03-12-2023 08:56:37am', '03-12-2023 08:56:37am'),
(130, 1, 'Thanh Linh', 'daothikhuyen30@gmail.com', 'Tam Ky , Quang Nam', '12345678', '', 1, '$138.00', '07-12-2023 09:08:43pm', '07-12-2023 09:08:43pm'),
(131, 1, 'Thanh Linh', 'daothikhuyen30@gmail.com', 'Tam Ky , Quang Nam', '12345678', '', 3, '$768.00', '07-12-2023 09:12:04pm', '07-12-2023 09:12:04pm'),
(132, 1, 'Thanh Linh', 'daothikhuyen30@gmail.com', 'Tam Ky , Quang Nam', '12345678', '', 3, '$65.00', '13-12-2023 11:01:54am', '13-12-2023 11:01:54am');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `create_time` varchar(255) NOT NULL,
  `last_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `create_time`, `last_update`) VALUES
(78, 126, 49, 2, 256, '27-11-2023 09:54:43am', '27-11-2023 09:54:43am'),
(79, 127, 48, 3, 245, '27-11-2023 09:55:10am', '27-11-2023 09:55:10am'),
(80, 128, 45, 2, 40, '03-12-2023 08:40:41am', '03-12-2023 08:40:41am'),
(81, 128, 39, 11, 22, '03-12-2023 08:40:41am', '03-12-2023 08:40:41am'),
(82, 129, 33, 1, 2, '03-12-2023 08:56:37am', '03-12-2023 08:56:37am'),
(83, 129, 3, 1, 37, '03-12-2023 08:56:37am', '03-12-2023 08:56:37am'),
(84, 130, 4, 3, 46, '07-12-2023 09:08:43pm', '07-12-2023 09:08:43pm'),
(85, 131, 49, 3, 256, '07-12-2023 09:12:04pm', '07-12-2023 09:12:04pm'),
(86, 132, 10, 1, 65, '13-12-2023 11:01:54am', '13-12-2023 11:01:54am');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `description` text NOT NULL,
  `created_time` varchar(255) NOT NULL,
  `last_update` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `star` float NOT NULL,
  `Hot` varchar(255) NOT NULL COMMENT 'on: Hot\r\noff: no hot'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `price`, `discount`, `description`, `created_time`, `last_update`, `quantity`, `image`, `star`, `Hot`) VALUES
(1, 1, 'Buu Yen Moon Cake', 45, 40, '<p>Cakes are one of the dishes loved by many people.</p>\r\n\r\n<p><img alt=\"\" src=\"../../image/product/Buu Yen moon cake.jpg\" style=\"height:300px; width:300px\" /></p>\r\n', '05-12-2023 10:05:22am', '05-12-2023 10:05:22am', 150, 'Buu Yen moon cake.jpg', 4, 'No'),
(3, 1, 'Mixed Moon Cakes', 37, 30, '<p>These mooncakes filled with sticky-sweet pistachios come from the award-winning...</p>\r\n', '05-12-2023 10:06:56am', '05-12-2023 10:06:56am', 75, 'Mixed Moon Cakes.jpg', 4, 'No'),
(4, 1, 'Osmanthus Cake', 46, 40, '<p>Tiny yellow osmanthus flowers, dried and sweetly scented, are scattered across the top of this light-as-a-feather steamed cake sold in bustling Sipailou Lu near Yu Gardens. As street foods go, Gu&igrave; Huā Gāo 桂花糕, or sweet osmanthus cake is more delicate and</p>\r\n', '05-12-2023 10:03:29am', '05-12-2023 10:03:29am', 97, 'Osmanthus Cake.jpg', 5, 'No'),
(5, 1, 'Salted Egg Moon', 100, 200, 'These homemade lotus mooncakes are definitely a labor of love, but we think they\'re worth it. Check out our detailed step-by-step lotus mooncakes recipe for instructions!\r\n', '2023-09-22 17:45:31', '2023-09-22 17:45:31', 20, 'Salted Egg Moon Cake.jpg', 5, 'No'),
(6, 1, 'Songpyeon', 23, 20, '<p>Tteok has a reputation of being traditional food that often appears outdated with the same old taste. But Korean rice cakes can be transformed into delicate desserts that are pleasing to the eye if they are handled in a different way. Jang Yeo-jin is one</p>\r\n', '05-12-2023 02:29:19am', '05-12-2023 02:29:19am', 78, 'Songpyeon.jpg', 4.5, 'No'),
(7, 1, 'Taiwanese Egg ', 22, 600, '<p>One of my favorite sweet treats from Chinese bakeries is cute little egg tarts, which are individual-sized custards baked in a crunchy sweet pastry crust. This recipe is in the style of Hong Kong egg tarts and are very similar to the ones I find in bakeri</p>\r\n', '05-12-2023 12:23:04pm', '05-12-2023 12:23:04pm', 3, 'Taiwanese egg tarts.jpg', 5, 'No'),
(8, 1, 'Tsukimi Dango', 27, 40, 'The Japanese celebrate the mid-autumn festival by displaying Tuskimi Dango, white plain rice dumplings in the pyramid arrangement. It\'s very easy to put together so you can celebrate this festival with us!\r\n ', '2023-09-22 17:45:31', '2023-09-22 17:45:31', 98, 'Tsukimi Dango.jpg', 3, 'No'),
(9, 1, 'Cake Mochi', 17, 300, 'Sakura mochi is a Japanese sweet eaten on Girl\'s day (hinamatsuri). It consists of pink-colored rice cake filled with sweet red bean paste(anko), and it\'s wrapped in a cherry leaf.', '2023-09-22 17:45:31', '2023-09-22 17:45:31', 10, 'Cake Mochi.jpg', 4, 'No'),
(10, 1, 'Meat Moon Cake', 65, 60, '<p>INTRODUCTION Many people believed that moon cakes are sweet, even overly sweet based on traditional moon cake perceptions. However, this is not true, not all moon cakes are sweet and one of the classic example of savoury moon cake is Suzhou Meat moon cake</p>\r\n', '05-12-2023 02:12:27am', '05-12-2023 02:12:27am', 119, 'Meat Moon Cake.jpg', 5, 'Yes'),
(31, 2, 'Cranberry Birthday Cake', 10, 300, 'Cranberry almond layer cake is perfect for the holidays! You\'ll love this soft almond cake topped with whipped cranberry frosting and sugared cranberries.\r\n', '2023-09-23 11:29:40', '2023-09-23 11:29:40', 10, 'Cranberry Birthday Cake.jpg', 4, 'No'),
(32, 2, 'Cheecake Birthday Cake', 300, 200, 'Cheecake Birthday Cake is perfect for the holidays! You\'ll love this soft almond cake topped with whipped cranberry frosting and sugared cranberries.\r\n', '2023-09-23 11:29:40', '2023-09-23 11:29:40', 10, 'Cheecake Birthday Cake.jpg', 5, 'No'),
(33, 2, 'Dinosaur Birthday Cake', 2, 150, 'Dinosaur Birthday Cake is perfect for the holidays! You\'ll love this soft almond cake topped with whipped cranberry frosting and sugared cranberries.\r\n', '2023-09-23 11:29:40', '2023-09-23 11:29:40', 1, 'Dinosaur Birthday Cake.jpg', 6, 'No'),
(34, 2, 'Fruit Birthday Cake', 57, 250, 'Fruit birthday cake is perfect for the holidays! You\'ll love this soft almond cake topped with whipped cranberry frosting and sugared cranberries.\r\n', '2023-09-23 11:29:40', '2023-09-23 11:29:40', 20, 'Fruit birthday cake.jpg', 5, 'No'),
(35, 2, 'Green Tea Flavored Birthday Cake', 54, 265, 'Green Tea Flavored Birthday Cake is perfect for the holidays! You\'ll love this soft almond cake topped with whipped cranberry frosting and sugared cranberries.\r\n', '2023-09-23 11:29:40', '2023-09-23 11:29:40', 81, 'Green Tea Flavored Birthday Cake.jpg', 3.5, 'No'),
(36, 2, 'Level Birthday Cake', 78, 280, 'Level birthday cake is perfect for the holidays! You\'ll love this soft almond cake topped with whipped cranberry frosting and sugared cranberries.\r\n', '2023-09-23 11:29:40', '2023-09-23 11:29:40', 19, 'Level birthday cake.jpg', 0, 'No'),
(37, 2, 'Orio Birthday Cake', 95, 200, 'Orio birthday cake is perfect for the holidays! You\'ll love this soft almond cake topped with whipped cranberry frosting and sugared cranberries.\r\n', '2023-09-23 11:29:40', '2023-09-23 11:29:40', 10, 'Orio birthday cake.jpg', 0, 'No'),
(38, 2, 'Rabbit Birthday Cake', 36, 257, 'Rabbit birthday cake is perfect for the holidays! You\'ll love this soft almond cake topped with whipped cranberry frosting and sugared cranberries.\r\n', '2023-09-23 11:29:40', '2023-09-23 11:29:40', 23, 'Rabbit birthday cake.jpg', 0, 'No'),
(39, 2, 'Salted Egg Birthday Cake', 22, 255, 'Salted Egg Birthday Cake is perfect for the holidays! You\'ll love this soft almond cake topped with whipped cranberry frosting and sugared cranberries.\r\n', '2023-09-23 11:29:40', '2023-09-23 11:29:40', 1, 'Salted Egg Birthday Cake.jpg', 0, 'No'),
(40, 2, 'Flower Birthday Cake', 34, 356, 'Flower Birthday Cake is perfect for the holidays! You\'ll love this soft almond cake topped with whipped cranberry frosting and sugared cranberries.\r\n', '2023-09-23 11:29:40', '2023-09-23 11:29:40', 24, 'Flower Birthday Cake.jpg', 0, 'No'),
(41, 3, 'Caffe Tiramisu cake', 24, 467, 'Abbiamo preparato una Torta tiramisù perfetta per trasformare il nostro dolce al cucchiaio preferito nel re della festa. Ecco la ricetta (facilissima)\r\n ...', '2023-09-23 18:37:50', '2023-09-23 18:37:50', 10, 'Caffe Tiramisu cake.jpg', 0, 'No'),
(42, 3, 'Green Tea Tiramisu Cake', 15, 200, 'Abbiamo preparato una Torta tiramisù perfetta per trasformare il nostro dolce al cucchiaio preferito nel re della festa. Ecco la ricetta (facilissima)\r\n ...', '2023-09-23 18:37:50', '2023-09-23 18:37:50', 34, 'Green Tea Tiramisu Cake.jpg', 0, 'No'),
(43, 3, 'Oreo Tiramisu Cake', 74, 280, 'Abbiamo preparato una Torta tiramisù perfetta per trasformare il nostro dolce al cucchiaio preferito nel re della festa. Ecco la ricetta (facilissima)\r\n ...', '2023-09-23 18:37:50', '2023-09-23 18:37:50', 25, 'Oreo Tiramisu cake.jpg', 0, 'No'),
(44, 3, 'Traditional Tiramisu Cake', 39, 435, 'Abbiamo preparato una Torta tiramisù perfetta per trasformare il nostro dolce al cucchiaio preferito nel re della festa. Ecco la ricetta (facilissima)\r\n ...', '2023-09-23 18:37:50', '2023-09-23 18:37:50', 34, 'Traditional Tiramisu Cake.jpg', 0, 'No'),
(45, 3, 'Mango Tiramisu Cake', 40, 321, 'Abbiamo preparato una Torta tiramisù perfetta per trasformare il nostro dolce al cucchiaio preferito nel re della festa. Ecco la ricetta (facilissima)\r\n ...', '2023-09-23 18:37:50', '2023-09-23 18:37:50', 33, 'Mango Tiramisu Cake.jpg', 1, 'No'),
(46, 3, 'Socola Tiramisu Cake', 245, 250, 'Abbiamo preparato una Torta tiramisù perfetta per trasformare il nostro dolce al cucchiaio preferito nel re della festa. Ecco la ricetta (facilissima)\r\n ...', '2023-09-23 18:37:50', '2023-09-23 18:37:50', 24, 'Socola Tiramisu Cake.jpg', 0, 'No'),
(47, 4, 'Banana Black Forest Cake', 267, 290, 'Vegan Black Forest Cake with the best recipes for chocolate cake Kirschwasser marinated cherries and homemade vegan whipped cream\r\n', '2023-09-23 18:44:00', '2023-09-23 18:44:00', 12, 'Banana Black Forest Cake.jpg', 0, 'No'),
(48, 4, 'Black Forest Confeitaria Cake', 245, 267, 'Vegan Black Forest Cake with the best recipes for chocolate cake Kirschwasser marinated cherries and homemade vegan whipped cream\r\n', '2023-09-23 18:44:00', '2023-09-23 18:44:00', 20, 'Black Forest Confeitaria cake.jpg', 0, 'No'),
(49, 4, 'Fungi Black Forest Cake', 256, 279, 'Vegan Black Forest Cake with the best recipes for chocolate cake Kirschwasser marinated cherries and homemade vegan whipped cream\r\n', '2023-09-23 18:44:00', '2023-09-23 18:44:00', 12, 'Fungi Black Forest Cake.jpg', 0, 'No'),
(50, 4, 'Pearl Black Forest Cake', 432, 450, 'Vegan Black Forest Cake with the best recipes for chocolate cake Kirschwasser marinated cherries and homemade vegan whipped cream\r\n', '2023-09-23 18:44:00', '2023-09-23 18:44:00', 12, 'Pearl Black Forest Cake.jpg', 0, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`comment_id`, `user_id`, `rating_action`) VALUES
(1, 1, 'dislike'),
(32, 1, 'dislike'),
(61, 1, 'like'),
(63, 1, 'dislike');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_information`
--

CREATE TABLE `temporary_information` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temporary_information`
--

INSERT INTO `temporary_information` (`id`, `username`, `phone_number`, `adress`, `id_user`) VALUES
(6, 'Thanh Linh', '12345678', 'Tam Ky , Quang Nam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL COMMENT 'đối với admin là địa chỉ làm việc',
  `phone_number` varchar(10) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `Nationality` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL COMMENT '1 là user, 2 là admin',
  `bank` varchar(255) NOT NULL,
  `bank_account_numbers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `adress`, `phone_number`, `avatar`, `password`, `gender`, `Nationality`, `status`, `bank`, `bank_account_numbers`) VALUES
(1, 'Khuyên Khuyên', 'daothikhuyen30@gmail.com', 'Đà Nẵng', '0834006551', '308791633_1573844173059081_7335872486739440147_n.jpg', '$2y$10$RyqD/4ykKgOwFTyWTK7Q9O5gv2SYMsERg0AADTNmb7Xxc2wkMiP0q', 'male', 'Việt Nam', 'user', '0', 0),
(7, 'khue dao', 'khue1@gmail.com', '', '', 'user.png', '$2y$10$D0DZg9H8aTypaMwJFDRJHOjC2stbLEqUCLX7aoHniRjPyDPS3j4j6', '', '', 'user', '0', 0),
(11, 'Huỳnh Thị Minh', 'minh@gmail.com', '', '', '35974153931cc138a337256ce086e9f1.jpg', '$2y$10$a2YRk0T9KeaYWVwwrL.n3OrkC3.7sN1E4/VTL0dTOc3VkuedzHyIy', '', '', 'user', '0', 0),
(15, 'LaLa', 'la@gmail.com', 'Tam Ky , DN', '0834006551', 'user.png', '$2y$10$MupwnHbCLNx5MrigPLynlO.AoBMACahMB4RjydLrRj6Nu56IcpP9W', '', '', 'admin', 'BIDV', 2147483647),
(16, 'Thanh Lan', 'ThanhLan30@gmail.com', '', '', 'user.png', '$2y$10$ZUP.Xvg2UT60LeoMjus8CuKdIMNPd8msChVcqCizAs9FPccLbGKJq', '', '', 'user', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_ibfk_1` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_ibfk_2` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD UNIQUE KEY `comment_id` (`comment_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `temporary_information`
--
ALTER TABLE `temporary_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `temporary_information`
--
ALTER TABLE `temporary_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD CONSTRAINT `rating_info_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_info_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `temporary_information`
--
ALTER TABLE `temporary_information`
  ADD CONSTRAINT `temporary_information_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
