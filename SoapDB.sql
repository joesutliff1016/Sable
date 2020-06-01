-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 10.10.11.22
-- Generation Time: Aug 27, 2019 at 01:45 AM
-- Server version: 10.2.9-MariaDB-log
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joe`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL,
  `cart_price` decimal(4,2) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_quantity`, `cart_price`, `orders_id`, `product_id`) VALUES
(47, 2, 9.99, 44, 1),
(48, 1, 9.99, 45, 1),
(49, 1, 8.99, 45, 2),
(50, 1, 11.99, 45, 3),
(51, 1, 9.99, 46, 1),
(52, 1, 9.99, 47, 1),
(53, 1, 9.00, 47, 293),
(54, 1, 10.00, 47, 296),
(55, 1, 8.00, 48, 591),
(56, 1, 11.99, 49, 3),
(57, 1, 11.99, 50, 3),
(58, 1, 10.99, 50, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_photo` varchar(255) DEFAULT NULL,
  `category_photo_alt_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `category_photo`, `category_photo_alt_text`) VALUES
(2, 'Bath Soaps', 'bath_soaps.jpg', 'Bath Soaps'),
(6, 'Hand Soaps', 'hand_soap.jpg', 'Hand Soaps'),
(7, 'Lotions', 'lotions.jpg', 'Lotions');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_first_name` varchar(100) NOT NULL,
  `customer_last_name` varchar(100) NOT NULL,
  `customer_phone` varchar(14) NOT NULL,
  `customer_fax` varchar(14) DEFAULT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_billing_street` varchar(100) NOT NULL,
  `customer_billing_street2` varchar(100) DEFAULT NULL,
  `customer_billing_city` varchar(100) NOT NULL,
  `customer_billing_state` char(2) NOT NULL,
  `customer_billing_zip` varchar(10) NOT NULL,
  `customer_shipping_street` varchar(100) NOT NULL,
  `customer_shipping_street2` varchar(100) DEFAULT NULL,
  `customer_shipping_city` varchar(100) NOT NULL,
  `customer_shipping_state` char(2) NOT NULL,
  `customer_shipping_zip` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_first_name`, `customer_last_name`, `customer_phone`, `customer_fax`, `customer_email`, `customer_billing_street`, `customer_billing_street2`, `customer_billing_city`, `customer_billing_state`, `customer_billing_zip`, `customer_shipping_street`, `customer_shipping_street2`, `customer_shipping_city`, `customer_shipping_state`, `customer_shipping_zip`) VALUES
(2, 'Betty', 'Smith', '2534397865', '0', 'betty@gmail.com', '1941 Pearl Harbor Cove', '', 'Honolulu', 'HI', '99999', '6854 oldy st', '', 'seattle', 'wa', '98765'),
(3, 'Barry', 'Jones', '', NULL, '', '1776 Independence Drive', NULL, 'Philadelphia', 'PA', '98234', '', NULL, '', '', ''),
(6, 'Ben', 'Rasmussen', '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', ''),
(17, 'Billy', 'Jones', '8883338888', '2147483647', 'asdf@asdf.coj', 'adf', 'asdf', 'adf', 'as', '88888', 'asdf', 'asdf', 'asdf', 'as', '22222'),
(18, 'Babs', 'Jones', '253.555.1212', '253-555-1212', 'asdf@asdf.com', 'asdf', 'lkj', 'lkj', 'lk', '22222', 'lkj', 'lkj', 'lkj', 'lk', '88888'),
(30, 'Bruce', 'Lee', '2063226545', NULL, 'lee@gmail.com', '7978 9th ave s', NULL, 'seattle', 'wa', '98765', '7978 9th ave s', NULL, 'seattle', 'wa', '98765'),
(32, 'james', 'redford', '2067899898', NULL, 'r@gmail.com', '5656 s st', NULL, 'seattle', 'wa', '98409', '5656 s st', NULL, 'seattle', 'wa', '98409'),
(74, 'james', 'redbeard', '2065443232', NULL, 'red@gmail.com', '78787 s st', NULL, 'kent', 'wa', '98198', '78787 s st', NULL, 'kent', 'wa', '98198'),
(75, 'qwer', 'rewq', '5554445555', NULL, 'qqwer@qqwer.com', 'rweq', 'rewq', 'qwer', 'qw', '33333', 'rweq', 'rewq', 'qwer', 'qw', '33333'),
(76, 'john', 'Brown', '7889876543', NULL, 'jbrwon@gmail.com', '1007 sw 116th st', NULL, 'seatac', 'wa', '98198', '1007 sw 116th st', NULL, 'seatac', 'wa', '98198'),
(77, 'bobo', 'asdf', '3334443333', NULL, 'asdf@asdf.com', 'asdf', 'fdsa', 'asdf', 'fd', '33333', 'asdf', 'fdsa', 'asdf', 'fd', '33333'),
(78, 'ads', 'asd', '3333333333', NULL, 'j@yahoo.com', 'jklasdjk', NULL, 'jkljkl', 'wa', '98765', 'jklasdjk', NULL, 'jkljkl', 'wa', '98765'),
(79, 'asdasd', 'asdasd', '2300000000', NULL, 'h@gmail.com', 'jdklsjsdjkl', NULL, 'kjljkjkl', 'wa', '98765', 'jdklsjsdjkl', NULL, 'kjljkjkl', 'wa', '98765'),
(80, 'John', 'Wayne', '3333333333', NULL, 'johnw@gmail.com', '67676', NULL, 'tacoma', 'wa', '98765', '67676', NULL, 'tacoma', 'wa', '98765');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `orders_total_cost` decimal(4,2) NOT NULL,
  `shipping_cost` decimal(4,2) NOT NULL,
  `tax` decimal(4,2) NOT NULL,
  `tracking_number` varchar(100) NOT NULL,
  `orders_paid` enum('y','n') NOT NULL DEFAULT 'n',
  `orders_timestamp` datetime NOT NULL,
  `shipping_method` varchar(100) NOT NULL,
  `orders_shipped` enum('y','n') NOT NULL DEFAULT 'n',
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `orders_total_cost`, `shipping_cost`, `tax`, `tracking_number`, `orders_paid`, `orders_timestamp`, `shipping_method`, `orders_shipped`, `customer_id`) VALUES
(44, 19.98, 0.00, 0.00, '', 'y', '2017-11-13 23:35:47', '', 'n', 74),
(45, 30.97, 0.00, 0.00, '', 'y', '2017-12-05 17:37:12', '', 'n', 75),
(46, 9.99, 0.00, 0.00, '', 'y', '2017-12-05 20:31:43', '', 'n', 76),
(47, 28.99, 0.00, 0.00, '', 'y', '2017-12-06 12:29:04', '', 'n', 77),
(48, 8.00, 0.00, 0.00, '', 'y', '2017-12-07 18:48:05', '', 'n', 78),
(49, 11.99, 0.00, 0.00, '', 'y', '2017-12-07 18:57:13', '', 'n', 79),
(50, 22.98, 0.00, 0.00, '', 'y', '2018-02-11 20:17:44', '', 'n', 80);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(255) DEFAULT NULL,
  `product_price` decimal(4,2) DEFAULT NULL,
  `product_photo` varchar(255) DEFAULT NULL,
  `larger_photo` varchar(255) DEFAULT NULL,
  `product_photo_alt_text` varchar(255) DEFAULT NULL,
  `product_ingredients` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_price`, `product_photo`, `larger_photo`, `product_photo_alt_text`, `product_ingredients`, `category_id`) VALUES
(1, 'Pineapple Soap', 'Refreshing, soothes dry skin.', 9.99, 'pineappleSoap-t.jpg', 'pineappleSoap.jpg', 'Pineapple Soap', 'These are the ingredients: pineapples', 2),
(2, 'Coconut Soap', 'Lovely, creamy coconut smell.', 8.99, 'coconutSoap-t.jpg', 'coconutSoap.jpg', 'Coconut Soap', 'These are the ingredients: coconuts', 2),
(3, 'Mango Soap', 'Beautiful smell, sure to please!', 11.99, 'mangoSoap-t.jpg', 'mangoSoap.jpg', 'Mango Soap', 'These are the ingredients: mangos', 2),
(4, 'Banana Soap', 'Great for your skin! Give as a gift.', 10.99, 'bananaSoap-t.jpg', 'bananaSoap.jpg', 'Banana Soap', 'These are the ingredients: bananas', 2),
(292, 'Strawberry Soap', 'Enjoy the scent of strawberry!', 8.00, 'strawberrySoap-t.jpg', 'strawberrySoap.jpg', 'Strawberry Soap', 'These are the ingredients: strawberrys', 2),
(293, 'Lime Soap', 'Enjoy the refreshing feel of lime soap!', 9.00, 'limeSoap-t.jpg', 'limeSoap.jpg', 'Lime Soap', 'These are the ingredients: limes', 2),
(295, 'Kiwi Soap', 'Enjoy the refreshing smell of tropical kiwis.', 8.00, 'kiwiSoap-t.jpg', 'kiwiSoap.jpg', 'Kiwi Soap', 'These are the ingredients: kiwis', 2),
(296, 'Passionfruit Soap', 'Indulge yourself with passionfruit!', 10.00, 'passionfruitSoap-t.jpg', 'passionfruitSoap.jpg', 'Passionfruit Soap', 'These are the ingredients: passionfruits', 2),
(297, 'Orange Soap', 'Enjoy the cleaning power of natural citrus!', 9.00, 'orangeSoap-t.jpg', 'orangeSoap.jpg', 'Orange Soap', 'These are the ingredients: oranges', 2),
(298, 'Lemon Soap', 'Wash your cares away with this organic super cleanser.', 10.00, 'lemonSoap-t.jpg', 'lemonSoap.jpg', 'Lemon Soap', 'These are the ingredients: lemons', 2),
(595, 'Peppermint Soap', 'Oh so minty!', 7.00, 'thumb_595.jpg', 'master_595.jpg', 'Peppermint Soap', 'Lots of mint!', 2);

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(144, 'joe1', 'greene1', '1joegreene@yahoo.com', 'c16ec1c696bd8822d792bb0da5298fcf6b1918b95485badf2317ab8f89f2a284667bf64653cda4cf957612ba6375f6a53edb68af80b7740afe59bfc4210596b7'),
(145, 'aaaa', 'aaaa', 'aa@yahoo.com', 'd497d091365215f2683e3078801cb78f6d9c13c6f1324ecdb933de636b91a7a5064c31d7fb7efdd64dd9acb469ec1d8b12c39313ff8c03fae7c8c05dc9f16cf7'),
(146, 'james1', 'brown1', '1j@gmail.com', '3ba2942ed1d05551d4360a2a7bb6298c2359061dc07b368949bd3fb7feca3344221257672d772ce456075b7cfa50fd7ce41eaefe529d056bf23dd665de668b78'),
(147, 'tiger ', 'woods', 'golfer@gmail.com', 'c16ec1c696bd8822d792bb0da5298fcf6b1918b95485badf2317ab8f89f2a284667bf64653cda4cf957612ba6375f6a53edb68af80b7740afe59bfc4210596b7'),
(148, 'John ', 'Brwon', 'j@yahoo.com', 'c16ec1c696bd8822d792bb0da5298fcf6b1918b95485badf2317ab8f89f2a284667bf64653cda4cf957612ba6375f6a53edb68af80b7740afe59bfc4210596b7'),
(149, 'Bruce2', 'Dague2', 'bruce2.dague@cptc.edu', '385b5fb3512f87533f59837c26d0337dd8f3c7056e9607eb66e78fbc00fcdd52c6a5a3302eaf834df860379d8654924b00e5b34a059709c998bdc54772b794b2'),
(160, 'colin', 'powel', 'p@gmail.com', '0d35be3377874560aca59c68eeb7f971f6915a0fa17086334a0010dd0058eaf5d9b0a0a4aa26e77c6a06fe0d76df1941e9f153d3607665901c8e4bafd4d4b371'),
(161, 'Joe', 'Pac', 'jpac@gmail.com', 'c16ec1c696bd8822d792bb0da5298fcf6b1918b95485badf2317ab8f89f2a284667bf64653cda4cf957612ba6375f6a53edb68af80b7740afe59bfc4210596b7'),
(162, 'Al', 'Bundy', 'bundy@gmail.com', 'c16ec1c696bd8822d792bb0da5298fcf6b1918b95485badf2317ab8f89f2a284667bf64653cda4cf957612ba6375f6a53edb68af80b7740afe59bfc4210596b7');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `review` mediumtext NOT NULL,
  `reviewer_name` varchar(60) NOT NULL,
  `reviewer_email` varchar(255) NOT NULL,
  `review_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `product_id`, `product_name`, `rating`, `review`, `reviewer_name`, `reviewer_email`, `review_date`) VALUES
(15, 295, 'Kiwi Soap.', 5, 'This soap is so amazing!', 'Tony Walsh', 'Walsh@gmail.com', '2017-12-07 19:21:02'),
(16, 2, 'Coconut Soap.', 1, 'Horrible', 'Jane', 'janes@yahoo.com', '2017-12-07 19:25:50'),
(18, 591, 'Peppermint Soap.', 5, 'Love this!!!', 'john', 'myemail@email.com', '2017-12-07 19:56:36'),
(19, 591, 'Peppermint Soap.', 3, 'It\'s o.k.', 'joe', 'joe@gmail.com', '2017-12-07 20:32:28'),
(20, 296, 'Passionfruit Soap.', 5, 'This is the greatest soap! My daughters absolutely love bath time now. Thanks!', 'Betty Walker', 'walker@gmail.com', '2017-12-07 21:26:38'),
(21, 296, 'Passionfruit Soap.', 1, 'Smells like wet dog!', 'Bite me!', 'yousuck@gmail.com', '2017-12-07 21:29:16'),
(22, 4, 'Banana Soap.', 1, 'I thought that this was candy:(', 'Not Candy', 'nasty@gmail.com', '2017-12-07 21:53:26'),
(23, 4, 'Banana Soap', 4, 'asdasd', 'j', 'j@gmail.com', '2017-12-08 11:40:15'),
(24, 3, 'Mango Soap', 5, 'tastes great!', 'Matt', 'm@gmail.com', '2017-12-08 11:41:32'),
(25, 4, 'Banana Soap', 5, 'I\'m going bananas!', 'Jon', 'Jon@gmail.com', '2018-02-07 03:56:45'),
(26, 298, 'Lemon Soap', 5, 'Tubular! Until next door to feed him dinner and I will send you an invoice for my mom.', 'Jb', 'Deezntz@gmail.com', '2018-02-14 01:37:30'),
(27, 1, 'Pineapple Soap', 5, 'I lub me sum piniapple soaps!', 'joedirt', 'joesirt@gmail.com', '2018-02-15 20:51:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `order_id` (`orders_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_price` (`product_price`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=596;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
