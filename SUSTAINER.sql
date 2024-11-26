SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+08:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SUSTAINER`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE IF NOT EXISTS `contact_form` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`contact_id`, `name`, `email`, `phone`, `comment`) VALUES
(1, 'Sean Matthew Wong Su Han', 'sean.matt2002@gmail.com', 123911638, 'Hello! I love the Products');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--
-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_range` varchar(100) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_range`, `product_desc`, `product_image`, `product_price`) VALUES
(1, 'Coconut Paradise', 'Shampoo', 'Tropical', 'Coconut Paradise Shampoo: A luxurious, nourishing hair cleanser infused with coconut oil for strength, shine, and a tropical scent that transports you to a sun-kissed beach paradise.', 'CoconutParadise(Shampoo).png', 79.50),
(2, 'Deep Clean Charcoal', 'Shampoo', 'Cleansing', 'Deep Clean Charcoal Shampoo: A purifying formula with activated charcoal to detoxify, remove impurities, and restore natural vibrancy. Ideal for a refreshing, deep-cleansing experience.', 'DeepClean(Shampoo).png', 89.00),
(3, 'Midnight Velvet', 'Shampoo', 'Relaxing', 'Midnight Velvet Shampoo: A luxurious, sultry cleanser with velvet flower extract. Provides deep hydration, sleek softness, and a mysterious, enchanting fragrance for a magical nighttime hair routine.', 'MidnightVelvet(Shampoo).png', 79.00),
(4, 'Juniper Sage', 'Shampoo', 'Relaxing', 'Juniper Sage Shampoo: A revitalising blend that combines juniper berries and sage for a clarifying wash. Leaves hair feeling clean, refreshed, and subtly scented with herbal notes.', 'JuniperSage(Shampoo).png', 79.00),
(5, 'Shea Honey', 'Handwash', 'Sweet', 'Shea Honey Hand Wash: Enriched with shea butter and honey, this hand wash offers deep moisturisation and gentle cleansing. Perfect for sensitive skin with a sweet, comforting fragrance.', 'SheaHoney(Handwash).png', 49.00),
(6, 'Citrus Blast', 'Handwash', 'Tropical', 'Citrus Blast Hand Wash: A zesty, energizing cleanser with natural citrus extracts. Kills germs, refreshes skin, and leaves hands with a vibrant, tangy aroma. Perfect for daily use.', 'CitrusBlast(Handwash).png', 39.00),
(7, 'Leafy Clean', 'Handwash', 'Relaxing', 'Leafy Clean Hand Wash: A refreshing, botanical hand soap with green leaf extracts. Cleanses thoroughly, nourishes skin, and imparts a crisp, clean scent reminiscent of a lush forest.', 'LeafyClean(Handwash).png', 39.00),
(8, 'Ocean Duet', 'Handwash', 'Tropical', 'Ocean Duet Hand Wash: Dive into a wave of cleanliness with this marine-inspired hand wash. Seaweed and sea minerals blend for purifying hydration and a fresh oceanic scent.', 'OceanDuet(Handwash).png', 29.00),
(9, 'All-In Fresh', 'Detergent', 'Cleaning', 'All-In Fresh Detergent: Eco-friendly, powerful stain removal, gentle on skin. Free from dyes, perfumes, phosphates. 99% bio-based, hypoallergenic. Ideal for sensitive skin, brightens and freshens laundry effectively', 'All-InFresh(Detergent).png', 59.00),
(10, 'All-In Blossom', 'Detergent', 'Fragrant', 'All-In Blossom Detergent: Luxurious scent, efficient cleaning. Notes of ginger lily and tropical berries. Eco-friendly, cold wash capable. Softens clothes.', 'All-InBlossom(Detergent).png', 59.00),
(11, 'Total Clean', 'Detergent', 'Cleaning', 'Total Clean Detergent: Effortless, worry-free clean. Smart Ion Technology™, no soaking/scrubbing. Fast-acting, 99.9% anti-bacteria, easy dissolve formulaFresh scent, gentle on hands, suitable for indoor drying', 'TotalClean(Detergent).png', 69.00),
(12, 'Total Colour', 'Detergent', 'Sensitive', 'Total Colour Detergent: Keeps colors vibrant, wash after wash. High-performing formula, removes tough stains and bacteria. Offers color protection, fabric careSmart Washing for long-lasting newness', 'TotalColour(Detergent).png', 69.00);

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE IF NOT EXISTS `user_form` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`user_id`, `user_name`, `email`, `user_password`, `user_type`, `status`, `created_at`, `image`) VALUES
(1, 'Jay', 'jay@gmail.com', '96e79218965eb72c92a549dd5a330112', 'admin', 0, '2023-12-14 16:52:02', NULL),
(2, 'Sean Wong', 'sean@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 0, '2023-12-14 17:12:51', NULL),
(3, 'Wei Chen', 'chen@gmail.com', '96e79218965eb72c92a549dd5a330112', 'user', 0, '2023-12-14 17:58:43', NULL);







--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `users`
--

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
