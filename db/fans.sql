-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2018 at 03:15 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fans`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(60) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_mobile` varchar(20) NOT NULL,
  `admin_securecode` varchar(80) NOT NULL,
  `admin_flag_status` tinyint(4) NOT NULL DEFAULT '1',
  `admin_last_login` datetime NOT NULL,
  `admin_role` int(11) NOT NULL,
  `admin_lastlogin_ip` varchar(50) NOT NULL,
  `admin_browser` varchar(100) NOT NULL,
  `admin_hashing_key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='master_admin';

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `admin_name`, `admin_email`, `admin_mobile`, `admin_securecode`, `admin_flag_status`, `admin_last_login`, `admin_role`, `admin_lastlogin_ip`, `admin_browser`, `admin_hashing_key`) VALUES
(1, 'admin', 'admin@fans.com', '9652316446', '4297f44b13955235245b2497399d7a93', 1, '0000-00-00 00:00:00', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `cart_id` int(11) NOT NULL,
  `cart_session_id` varchar(100) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` double NOT NULL,
  `item_color` varchar(200) NOT NULL,
  `item_qty` double NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT '0',
  `sub_total` double NOT NULL,
  `suborder_id` varchar(100) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_number` varchar(100) NOT NULL,
  `delivery_date` date NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `order_extra_note` varchar(200) NOT NULL,
  `cancellation_reason` varchar(100) NOT NULL,
  `admin_approve` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='cart_caterin_items';

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`cart_id`, `cart_session_id`, `item_id`, `item_name`, `item_price`, `item_color`, `item_qty`, `cart_status`, `sub_total`, `suborder_id`, `order_id`, `order_number`, `delivery_date`, `user_id`, `order_extra_note`, `cancellation_reason`, `admin_approve`, `created_date`) VALUES
(1, 'dbb407a0c4689d69bfde7d67dc9b7040', 2, 'ceiling1', 1100, 'deafult color', 2, 1, 2200, 'SOC99811525087988', 1, 'SFO6535', '0000-00-00', '', '', '', 0, '2018-04-30 17:03:08'),
(2, 'dbb407a0c4689d69bfde7d67dc9b7040', 4, 'asxa', 0, 'deafult color', 1, 1, 0, 'SOC8871525087995', 1, 'SFO6535', '0000-00-00', '', '', '', 0, '2018-04-30 17:03:15'),
(3, 'dbb407a0c4689d69bfde7d67dc9b7040', 5, 'my first', 1252, 'deafult color', 1, 1, 1252, 'SOC16881525087999', 1, 'SFO6535', '0000-00-00', '', '', '', 0, '2018-04-30 17:03:19'),
(4, 'f94047b715a45b60cdcb3dff5931cadf', 2, 'ceiling1', 1100, 'deafult color', 3, 1, 3300, 'SOC4101525153768', 2, 'SFO5562', '0000-00-00', '', '', '', 0, '2018-05-01 11:19:28'),
(5, 'ea60ecd0d7c585f8a3ef601697e202bc', 1, 'Synergy', 2300, 'deafult color', 2, 1, 4600, 'SOC9441525170816', 3, 'SFO3830', '0000-00-00', '', '', '', 0, '2018-05-01 16:03:36'),
(6, '69f7751f0f8a13de806c73a3b226a714', 1, 'Synergy', 2300, 'deafult color', 3, 1, 6900, 'SOC50471525174201', 4, 'SFO6702', '0000-00-00', '', '', '', 0, '2018-05-01 17:00:01'),
(8, '7c9fdd534d0370c5e0ebf96f09b5eec2', 2, 'Cygnus 28 ( Remote Controlled )', 2880, 'deafult color', 4, 1, 11520, 'SOC51361525175981', 5, 'SFO5097', '0000-00-00', '', '', '', 0, '2018-05-01 17:29:40'),
(9, 'e433588e66a79d520326dbcfce354206', 1, 'Synergy', 2300, 'deafult color', 2, 1, 4600, 'SOC82111525241665', 6, 'SFO2853', '0000-00-00', '', '', '', 0, '2018-05-02 11:44:24'),
(10, 'e433588e66a79d520326dbcfce354206', 2, 'Cygnus 28 ( Remote Controlled )', 2880, 'deafult color', 1, 1, 2880, 'SOC26241525250733', 6, 'SFO2853', '0000-00-00', '', '', '', 0, '2018-05-02 14:15:33'),
(11, '7c00a110c78fbf2f56755b6fc4c3e250', 1, 'Synergy', 2300, 'deafult color', 1, 0, 2300, 'SOC14041525264631', 0, '', '0000-00-00', '', '', '', 0, '2018-05-02 18:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `master_fantype`
--

CREATE TABLE `master_fantype` (
  `fantype_id` int(11) NOT NULL,
  `fantype_unique_id` varchar(50) NOT NULL,
  `fantype_title` varchar(60) NOT NULL,
  `fantype_code` varchar(10) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `flag_status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Community List';

--
-- Dumping data for table `master_fantype`
--

INSERT INTO `master_fantype` (`fantype_id`, `fantype_unique_id`, `fantype_title`, `fantype_code`, `created_on`, `created_by`, `modified_on`, `modified_by`, `flag_status`) VALUES
(1, 'FTf6f48b601ee20d9171fd34007b566998', 'ceiling fans', 'cf', '2018-04-24 12:45:46', 1, '0000-00-00 00:00:00', 0, 1),
(2, 'FT9cfe0c1e653c768c396ad6e29db84985', 'table fans', 'tf', '2018-04-24 12:46:17', 1, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_tbl`
--

CREATE TABLE `orders_tbl` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(80) NOT NULL,
  `shipping_name` varchar(80) NOT NULL,
  `shipping_mobile` varchar(80) NOT NULL,
  `shipping_address` varchar(200) NOT NULL,
  `shipping_landmark` varchar(100) NOT NULL,
  `shipping_area` varchar(100) NOT NULL,
  `shipping_city` varchar(100) NOT NULL,
  `shipping_pincode` varchar(6) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `cartsesstion` varchar(100) NOT NULL,
  `shipping_email` varchar(100) NOT NULL,
  `shipping_state` varchar(100) NOT NULL,
  `payment_mode` varchar(10) NOT NULL,
  `created_on` datetime NOT NULL,
  `order_status` int(11) NOT NULL,
  `deliver_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='cateriing order table';

--
-- Dumping data for table `orders_tbl`
--

INSERT INTO `orders_tbl` (`order_id`, `order_number`, `shipping_name`, `shipping_mobile`, `shipping_address`, `shipping_landmark`, `shipping_area`, `shipping_city`, `shipping_pincode`, `user_id`, `cartsesstion`, `shipping_email`, `shipping_state`, `payment_mode`, `created_on`, `order_status`, `deliver_date`) VALUES
(1, 'SFO6535', 'jyothi', '9652316446', '654', '524', '4', '54', '500033', '', 'dbb407a0c4689d69bfde7d67dc9b7040', 'jyothi@gmail.com', 'ap', 'cod', '2018-04-30 17:05:28', 0, '2018-04-30'),
(2, 'SFO5562', 'jyothi', '9652316446', 'hg', 'kj', 'hbjkh', 'jkh', '578356', '', 'f94047b715a45b60cdcb3dff5931cadf', 'jyohti@gmail.com', 'ap', 'cod', '2018-05-01 11:21:10', 0, '2018-05-01'),
(3, 'SFO3830', 'jyothi', '9652316446', '5465', '54', '655', '4', '500012', '', 'ea60ecd0d7c585f8a3ef601697e202bc', 'jyothi@gmail.com', 'up', 'cod', '2018-05-01 16:04:15', 0, '2018-05-01'),
(4, 'SFO6702', 'defef', '9652316646', 'jyh', 'kjhn', 'jhnl', 'jhn', '500000', '', '69f7751f0f8a13de806c73a3b226a714', 'efefd', 'ap', 'cod', '2018-05-01 17:00:38', 0, '2018-05-01'),
(5, 'SFO5097', 'jyothi', '9652316446', 'jhfljf ki', 'shiva temple', 'begumpet', 'hyderabd', '520023', '', '7c9fdd534d0370c5e0ebf96f09b5eec2', 'joyhti@gmail.com', 'ap', 'cod', '2018-05-01 17:33:16', 0, '2018-05-01'),
(6, 'SFO2853', 'jyothi', '9652316646', 'D.NI:3-148,p.t.parru', 'near to ram mandhiram', 'ponnur', 'guntur', '500316', '', 'e433588e66a79d520326dbcfce354206', 'joyhi@gmail.com', 'ap', 'cod', '2018-05-02 14:16:56', 0, '2018-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `product_side_images`
--

CREATE TABLE `product_side_images` (
  `product_sideimage_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `flag_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_side_images`
--

INSERT INTO `product_side_images` (`product_sideimage_id`, `product_id`, `title`, `created_on`, `created_by`, `flag_status`) VALUES
(7, 1, 'http://localhost/fans/uploads/products/product_1215_1525169630_eece56d89be384b776f1498a8ede8773d308bd75.jpg', '2018-05-01 15:43:50', 1, 1),
(8, 1, 'http://localhost/fans/uploads/products/product_3025_1525170788_beebc9e5a34b78464423f6af3eda2953c099b75e.jpg', '2018-05-01 16:03:08', 1, 1),
(9, 2, 'http://localhost/fans/uploads/products/product_2624_1525170809_46ea513804788659412b6104ab60661fc4b75aef.jpg', '2018-05-01 16:03:29', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `product_id` int(11) NOT NULL,
  `product_unique_id` varchar(70) NOT NULL,
  `product_code` varchar(70) NOT NULL,
  `product_title` text NOT NULL,
  `fan_type` int(11) NOT NULL,
  `mrp_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `discount` double NOT NULL,
  `remote_control` text NOT NULL,
  `color` varchar(70) NOT NULL,
  `wattage` varchar(70) NOT NULL,
  `air_delivery` varchar(70) NOT NULL,
  `rpm` varchar(70) NOT NULL,
  `sweep` varchar(70) NOT NULL,
  `service_value` varchar(70) NOT NULL,
  `phase` varchar(70) NOT NULL,
  `frequency` varchar(70) NOT NULL,
  `no_of_blades` varchar(70) NOT NULL,
  `body_type` varchar(70) NOT NULL,
  `seller_rating` double NOT NULL,
  `bearings` varchar(70) NOT NULL,
  `warrenty` varchar(70) NOT NULL,
  `winding` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `display_pic` varchar(200) NOT NULL,
  `pic_updated_on` datetime NOT NULL,
  `created_device` varchar(70) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `flag_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`product_id`, `product_unique_id`, `product_code`, `product_title`, `fan_type`, `mrp_price`, `selling_price`, `discount`, `remote_control`, `color`, `wattage`, `air_delivery`, `rpm`, `sweep`, `service_value`, `phase`, `frequency`, `no_of_blades`, `body_type`, `seller_rating`, `bearings`, `warrenty`, `winding`, `description`, `display_pic`, `pic_updated_on`, `created_device`, `created_by`, `created_on`, `flag_status`) VALUES
(1, '86b3dc82acd00ee6422c1d8701f84b5f5d0c7fa8', 'SFSyne', 'Synergy', 1, 2300, 2300, 0, '2', '1,2,3', '25 watts', '220 m3/min', '360', '1200 mm', '7.2', 'Single Phase', '50 Hz', '3', 'Aluminum', 5, 'Imported Covered Double Ball Bearings', '3 years', '100% Copper Winding ,Class 1', '3 Year On-site warranty  \r\n80% Power Saving\r\nRuns with MER Technology.\r\nNo humming noise\r\nConsistent performance even at low voltage and power\r\nRuns smoothly at wide voltage range of 90-300V', 'http://localhost/fans/uploads/products/product_2482_1525169636_4d44ce9a6e82ec1e3daf9e75cefa039c9ac7f837.jpg', '0000-00-00 00:00:00', '', 1, '2018-05-01 15:42:18', 1),
(2, 'f197c9727e3799e19c36689d3c3de98c86e3e027', 'SFCygn', 'Cygnus 28 ( Remote Controlled )', 1, 2880, 2880, 0, '1', '1,2,6', '28 watts', '220 m3/min', '370', '1200 mm', '7.2', 'Single Phase', '50 Hz', '3', 'Aluminum', 5, 'Imported Covered Double Ball Bearings', '3 years', '100% Copper Winding, Class 1', 'Remote Control – Speed control,Boost , Timer , reverse mode, LED ,\r\n3 Year On-site warranty,80% Power Saving ,Uses 28watts even at full speed ,Runs with MER Technology ,Smart remote-Control Operation ,No humming noise,Consistent performance even at low voltage and power,Runs smoothly at wide voltage range of 90-300V', 'http://localhost/fans/uploads/products/product_9082_1525169882_5c62655b7d09dcd53624855195eeffc14a0e5524.jpg', '0000-00-00 00:00:00', '', 1, '2018-05-01 15:47:06', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `master_fantype`
--
ALTER TABLE `master_fantype`
  ADD PRIMARY KEY (`fantype_id`);

--
-- Indexes for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product_side_images`
--
ALTER TABLE `product_side_images`
  ADD PRIMARY KEY (`product_sideimage_id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `master_fantype`
--
ALTER TABLE `master_fantype`
  MODIFY `fantype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_side_images`
--
ALTER TABLE `product_side_images`
  MODIFY `product_sideimage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
