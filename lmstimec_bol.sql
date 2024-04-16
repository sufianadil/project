-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2024 at 01:19 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lmstimec_bol`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `address`) VALUES
(1, 'Umer', 'umershafiq117@gmail.com', '123', '0346-7703040', '117 J.B Dhanola');

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `bid_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_phone` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `bid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`bid_id`, `customer_id`, `product_id`, `customer_phone`, `customer_address`, `bid`) VALUES
(1, 1, 2, '0346-7703040', '117 J.B Dhanola', '5001'),
(2, 1, 2, '0346-7703040', '117 J.B Dhanola', '5600'),
(3, 1, 2, '0346-7703040', '117 J.B Dhanola', '5700'),
(4, 1, 1, '0346-7703040', '117 J.B Dhanola', '6000'),
(5, 1, 1, '0346-7703040', '117 J.B Dhanola', '6500'),
(6, 1, 1, '0346-7703040', '117 J.B Dhanola', '6600'),
(7, 1, 1, '0346-7703040', '117 J.B Dhanola', '6700'),
(8, 3, 1, '0321-66545363', '117 J.B Dhanola', '6800'),
(9, 1, 8, '0346-7703040', '117 J.B Dhanola', '51000'),
(10, 1, 1, '0346-7703040', '117 J.B Dhanola', '7000'),
(11, 2, 11, '0302-0644599', '117 J.B Dhanola', '26000'),
(12, 1, 1, '0346-7703040', '117 J.B Dhanola', '7500'),
(13, 1, 3, '0346-7703040', '117 J.B Dhanola', '6000'),
(14, 9, 11, '0321-66545363', '117 J.B Dhanola', '27000'),
(15, 10, 1, '03476600060', 'House ', '7600');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `status`, `time`) VALUES
(1, 'Electronics', 'Active', '2022-07-14 14:34:29'),
(2, 'Real Estate', 'Active', '2022-07-14 14:35:05'),
(3, 'Pets', 'Active', '2022-07-14 14:35:13'),
(4, 'Vehicles', 'Active', '2022-07-14 14:35:22'),
(5, 'Shoppings', 'Active', '2022-07-14 14:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_phone` varchar(100) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_pass`, `customer_phone`, `customer_email`, `customer_address`, `date_time`, `image`, `latitude`, `longitude`, `reset_token`, `reset_token_date`) VALUES
(1, 'Umer', '202cb962ac59075b964b07152d234b70', '0346-7703040', 'umershafiq117@gmail.com', '117 J.B Dhanola', '2022-07-31 14:01:40', 'IMG_2974.JPG', '31.4114048', '73.089024', '0f7ea12cf0a0a19103613a800d8febe6', '2022-08-01'),
(2, 'Sufian', '202cb962ac59075b964b07152d234b70', '0302-0644599', 'sufianadil117@gmail.com', '117 J.B Dhanola', '2022-07-31 14:02:10', '148e6ef2d4f5ded175856ecc2320b472.jpg', '31.4114048', '73.089024', NULL, NULL),
(3, 'Ahmad', '202cb962ac59075b964b07152d234b70', '0321-66545363', 'allaw@gmail.com', '117 J.B Dhanola', '2022-07-31 14:47:30', 'Amazing Deagon Fantasy wallpaper (14).jpg', '31.4114048', '73.089024', NULL, NULL),
(7, 'Hasham Haider', '3dcc773278076d68ef464057851275ef', '03476600060', 'hasham.ch6767@gmail.com', 'House No.P218, New khalidabad', '2022-07-31 20:45:28', 'WhatsApp Image 2022-06-26 at 1.57.31 PM.jpeg', '', '', NULL, NULL),
(6, 'Adan Mansoor', '96ecd22e015246358f357b82a9b84454', '03005816244', 'ranaadan185@gmail.com', 'chak # 185 rb chak jhumra faislabad', '2022-07-31 20:44:17', 'HP-Pavilion-15-eg0070wm-LM.jpeg', '31.4343424', '73.1250688', NULL, NULL),
(9, 'Furqan', '202cb962ac59075b964b07152d234b70', '0321-66545363', 'allaw@gmail.com', '117 J.B Dhanola', '2022-08-01 11:00:49', 'pp.jpg', '31.4212352', '73.1021312', NULL, NULL),
(10, 'Hasham', '3dcc773278076d68ef464057851275ef', '03476600060', 'hasham.ch6767@gmail.com', 'House ', '2022-08-05 16:22:57', 'Picsart_22-08-02_01-32-21-055.jpg', '31.44144144144144', '73.09221783815144', NULL, NULL),
(11, 'Muhammad Umer', 'ed1c3496d988009a57ac70b6ff52e01e', '03467703040', 'umershafiq117@gmail.com', '117 J.B Dhanola', '2023-01-03 05:44:26', 'IMG_20221230_105920.jpg', '31.5095914', '73.1044531', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `customer_id`, `description`, `date`) VALUES
(1, 1, 'Best Web Site', '2022-07-31'),
(2, 1, 'Best ho gya', '2022-07-31'),
(3, 1, 'Best', '2022-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `sub_cat_id` int(10) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` float NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `file1` varchar(255) NOT NULL,
  `file2` varchar(255) NOT NULL,
  `file3` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `cat_id`, `sub_cat_id`, `customer_id`, `product_name`, `product_description`, `product_price`, `date`, `location`, `status`, `file1`, `file2`, `file3`) VALUES
(1, 2, 5, 2, 'dell XPS laptop', ' ajndjandjans ', 5000, '2022-07-15', 'pakistan', 'Active', '25bedc12abf05b4f.jpg', '041cd5ee4bf464c4s.jpg', '148e6ef2d4f5ded175856ecc2320b472.jpg'),
(2, 3, 10, 1, 'Dog', ' hello how are you \r\nmy friend \r\nindeed ', 5000, '2022-07-10', 'pakistan', 'Active', 'GXajrrU.jpg', 'Tom_Clancys_Ghost_Recon_Wildlands_uhd.jpg', 'Venice-grand-canal-4k-wallpaper.jpg'),
(3, 2, 7, 1, 'Thermo Ball Etip Gloves', ' hello \r\nhow \r\nare\r\nyou \r\nmy \r\nfriend', 5000, '2022-07-21', 'pakistan', 'Active', 'Schokoladentorte_Buttercreme_Tulpen_dritter_Geburtstag_001.JPG', 'road-to-beautiful-house-wallpaper-5566.jpg', 'Yachts-Port-Hercule-Monaco-ultra-hd-wallpapers2.jpg'),
(4, 1, 1, 1, 'laptop', ' hew nnnsjn\r\nadsad  ', 20000, '2022-07-13', 'pakistan', 'In-Active', 'Venice-Vienna-City-Italy-Night-View-Lights-River-Boat-Gondola-Houses-Canal-Clouds-Stunning-WallpapersByte-com-3840x2400.jpg', 'Windows-7-Dream-Scene-Wide.jpg', 'Venice-grand-canal-4k-wallpaper.jpg'),
(5, 1, 1, 2, 'Rolex', ' best watch ever', 20000, '2022-07-31', 'pakistan', 'Active', '041cd5ee4bf464c4s.jpg', '148e6ef2d4f5ded175856ecc2320b472.jpg', '25bedc12abf05b4f.jpg'),
(6, 1, 2, 2, 'Oneplus', ' best', 20000, '2022-07-31', 'pakistan', 'Active', '1438c332a4fd9b02.jpg', '41830-seattle-2560x1440-world-wallpaper.jpg', '177506.jpg'),
(7, 3, 11, 3, 'Parrot', 'Cute parrot', 20000, '2022-07-31', 'Faisalabad, pakistan', 'Active', '177506.jpg', '568498.jpg', '3336927.jpg'),
(8, 3, 10, 1, 'Tommy(Jarman Shephard)', ' Very Good and loyal dog \r\noriginal breed', 50000, '2022-08-01', 'Faisalabad, pakistan', 'Active', 'Space-Sky-Stars-Shadow-In-Blue-Pin-Purple-Color-WallpapersByte-com-3840x2400.jpg', 'shanghai-cities-china-huangpu-pudong-night-beautiful-hd-wallpaper-142947897722.jpg', 'Sunset over Shanghai_Ultra HD.jpg'),
(9, 1, 1, 4, 'HP Laptop Core i9', ' HP NoteBook is a Windows 10 laptop with a 15.60-inch display that has a resolution of 1366x768 pixels. It is powered by a Core i5 processor and it comes with 8GB of RAM. The HP NoteBook packs 256GB of SSD storage. Graphics are powered by Intel HD Graphics 620', 20000, '2022-08-08', 'Faisalabad', 'Active', '1546456825_635_hp_notebook-15.webp', '', ''),
(10, 1, 1, 5, 'HP laptop ', ' cor-i3 7th gen, 128 GB SSD card, 4 GB RAM, Condition 8/10', 30, '2022-07-31', 'eden garden exective block', 'Active', 'HP-Pavilion-15-eg0070wm-LM.jpeg', '', ''),
(11, 1, 1, 7, 'HP Laptop Core i9e', ' HP Notebook is a Windows 10 laptop with a 15.60-inch display that has a resolution of 1366x768 pixels. It is powered by a Core i5 processor, and it comes with 8GB of RAM. The HP Notebook packs 256GB of SSD storage. Graphics are powered by Intel HD Graphics 620.', 25000, '2022-08-02', 'Faisalabad', 'Active', '1546456825_635_hp_notebook-15.webp', 'c06195027.png', 'download.jpg'),
(12, 2, 5, 11, 'Fan', ' Ghbbvcgjj', 10000, '2023-01-04', 'Faisalabad, pakistan', 'Active', 'IMG_20221230_105929.jpg', 'IMG_20221230_105924.jpg', 'IMG_20221230_105920.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `sub_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `sub_cat_name` varchar(100) NOT NULL,
  `sub_status` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`sub_cat_id`, `cat_id`, `sub_cat_name`, `sub_status`, `time`) VALUES
(1, 1, 'laptops', 'Active', '2022-07-14 15:03:35'),
(2, 1, 'Mobiles', 'Active', '2022-07-14 15:51:41'),
(3, 1, 'Displays', 'Active', '2022-07-14 15:51:52'),
(4, 1, 'Others', 'Active', '2022-07-14 15:52:01'),
(5, 2, 'Farms', 'Active', '2022-07-14 15:52:16'),
(6, 2, 'Houses', 'Active', '2022-07-14 15:52:25'),
(7, 2, 'Hospitals', 'Active', '2022-07-14 15:52:41'),
(8, 2, 'Others', 'Active', '2022-07-14 15:52:50'),
(9, 3, 'Cats', 'Active', '2022-07-14 15:53:03'),
(10, 3, 'Dogs', 'Active', '2022-07-14 15:53:16'),
(11, 3, 'Birds', 'Active', '2022-07-14 15:53:25'),
(12, 3, 'Others', 'Active', '2022-07-14 15:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `h` varchar(100) NOT NULL,
  `m` varchar(100) NOT NULL,
  `s` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`id`, `date`, `h`, `m`, `s`) VALUES
(1, '2022-07-31', '12', '5', '4'),
(2, '2022-07-31', '12', '5', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`bid_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `timer`
--
ALTER TABLE `timer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `sub_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `timer`
--
ALTER TABLE `timer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
