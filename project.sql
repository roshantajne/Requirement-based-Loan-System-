-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 04:30 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyback`
--

CREATE TABLE `buyback` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `aadhar` varchar(50) NOT NULL,
  `mobileno` varchar(12) NOT NULL,
  `loan_amount` int(25) NOT NULL,
  `amount` int(25) NOT NULL,
  `receipt` varchar(255) NOT NULL,
  `reloanamount` int(25) NOT NULL,
  `disbursed_amount` int(25) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `name` varchar(255) NOT NULL,
  `aadhar` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `taluka` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `faddress` varchar(255) NOT NULL,
  `fvillage` varchar(255) NOT NULL,
  `ftaluka` varchar(255) NOT NULL,
  `fdistrict` varchar(255) NOT NULL,
  `fpincode` varchar(255) NOT NULL,
  `surveyno` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `holdername` varchar(255) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `accountno` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `paadhar` varchar(255) NOT NULL,
  `plandrecord` varchar(255) NOT NULL,
  `pphoto` varchar(255) NOT NULL,
  `balance` int(15) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `aadhar` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `total_price` float(10,2) NOT NULL DEFAULT 0.00,
  `order_status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float(10,2) NOT NULL DEFAULT 0.00,
  `qty` int(11) NOT NULL,
  `total_price` double(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `type`, `price`, `description`, `image`) VALUES
(2, 'RCH 659 BG II COTTON', 'SEEDS', 810, '', 'RCH-659.jpg'),
(3, 'RCH-602 BG II cotton', 'SEEDS', 810, '', 'RCH-602.jpg'),
(5, 'RCH-776 BG II cotton', 'SEEDS', 810, '', 'RCH-776.jpg'),
(6, 'RCH-779 BG II cotton', 'SEEDS', 810, '', 'RCH-779.jpg'),
(7, 'RCH-926 BG II cotton', 'SEEDS', 810, '', 'RCH-926.jpg'),
(8, 'RCH-super-773', 'SEEDS', 810, '', 'RCH-super-773.jpg'),
(9, 'KAITAKU ACETAMIPRID 20%SP (1 lit)', 'Insecticides', 660, '', 'KAITAKU.png\r\n'),
(10, 'KAGUYA CARBENDAZIM 12% + MANCOZEB 63% WP (1kg)', 'Fungicides', 600, '', 'KAGUYA.png'),
(11, 'EGAO EMAMECTIN BENZOATE 5% SL (1 lit.)', 'Insecticides', 680, '', 'EGAO.png'),
(12, 'FIPRONIL 5% SC (1 lit.)', 'Insecticides', 900, '', 'FIPRONIL.png'),
(13, 'Isogashi imidacloprid1 7.8% (1 lit.)', 'insecticides', 1700, '', 'Isogashi_imidacloprid1_7.8_1700litr.png'),
(14, 'YURI LAMBDA CYHALOTHRIN 4.9% CS (1 lit.)', 'Insecticides', 550, '', 'YURI.png'),
(15, 'KABUTO PARAQUAT DICHLORIDE 24% SL (1 lit.)', 'Herbicides ', 445, '', 'KABUTO.png'),
(16, 'ZAKIYAMA PENDIMETHALIN 30% EC (1 lit.)', 'Herbicides', 600, '', 'ZAKIYAMA.png'),
(17, 'HIMAWARI PROFENOPHOS 40% + CYPERMETHRIN 4% EC (1 lit.)', 'Insecticides', 760, '', 'HIMAWARI.png'),
(18, 'TEBURA TEBUCONAZOLE 25.9% EC (1 lit.)', 'Fungicides', 1500, '', 'TEBURA.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyback`
--
ALTER TABLE `buyback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`aadhar`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyback`
--
ALTER TABLE `buyback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
