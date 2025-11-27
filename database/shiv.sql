-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2016 at 10:15 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shiv`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `mobile`, `email`, `city`, `state`, `address`, `username`, `password`, `status`, `role`) VALUES
(1, 'shahbaz patel', '7798459013', 'sbzpatel@gmail.com', 'Mumbai', 'Maharashtra', 'Tilak Nagar,Mumbai', 'sbz', 'sbz', 'Active', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_status`
--

CREATE TABLE `admin_status` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_status`
--

INSERT INTO `admin_status` (`id`, `name`) VALUES
(1, 'Active'),
(2, 'Disable');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `vat_number` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`id`, `name`, `vat_number`, `contact_person`, `email`, `mobile_number`, `city`, `state`, `address`) VALUES
(2, 'Buyer233', '54361321121', 'asdfasdf asdf ', 'subhash@katalystcorp.in', '5431321321', 'asdfdsaf', 'Buyer233', 'asdf'),
(3, 'buyer3', '543213213', 'asdfdasf asdf asd ', 'super_admin@appstore.com', '3413132120', 'asdf', 'asdfasdf', 'asdfasdfasdf'),
(4, 'Katalyst Corp.', 'FFDER-1287543DR12', 'Chirag Sheth', 'katalystcorp365@gmail.com', '9970601333', 'Mumbai', 'Maharashtra', '249, V-mall, Thakur Complex, Kandivali East, Mumbai - 400101'),
(5, 'Manoj Trading Company', 'HHGDB-5416510HHG', 'Manoj Patel', 'manojpatel@gmail.com', '9876543210', 'Kolhapur', 'Maharashtra', '249, V-mall, Thakur Complex, Shastri Nagar, Kolhapur - 452145');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_invoice`
--

CREATE TABLE `buyer_invoice` (
  `number` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `buyer_name` varchar(255) NOT NULL,
  `contract_number` int(255) NOT NULL,
  `contract_date` date NOT NULL,
  `gross_amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_invoice_products`
--

CREATE TABLE `buyer_invoice_products` (
  `id` int(255) NOT NULL,
  `contract_number` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `broker_rate` int(255) NOT NULL,
  `total_amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(255) NOT NULL,
  `date` date NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `buyer_name` varchar(255) NOT NULL,
  `deliver_place` varchar(255) NOT NULL,
  `start_deliver_date` date NOT NULL,
  `upto_deliver_date` date NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `total_amount` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id`, `date`, `seller_name`, `buyer_name`, `deliver_place`, `start_deliver_date`, `upto_deliver_date`, `payment_mode`, `total_amount`, `status`) VALUES
(21, '2016-09-26', '3', '3', 'asdf asfd asfd a', '2016-09-05', '2016-10-07', '1', 0, ''),
(22, '2016-09-26', '4', '4', 'assdf asdf', '2016-09-19', '2016-09-29', '2', 0, ''),
(23, '2016-09-26', '6', '5', '249, V-mall, Thakur Complex, Kandivali East, Mumbai - 400101', '2016-09-21', '2016-09-23', '1', 0, ''),
(24, '2016-09-28', '3', '3', 'asdf asdf', '2016-09-19', '2016-10-08', '1', 0, ''),
(25, '2016-09-28', '2', '5', 'aurwad', '2016-09-05', '2016-09-30', '2', 0, ''),
(26, '2016-09-28', '4', '5', 'kop', '2016-09-12', '2016-09-29', '1', 474000, '');

-- --------------------------------------------------------

--
-- Table structure for table `contract_product`
--

CREATE TABLE `contract_product` (
  `id` int(255) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_rate` int(255) NOT NULL,
  `product_percentage` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract_product`
--

INSERT INTO `contract_product` (`id`, `contract_id`, `seller_id`, `buyer_id`, `product_id`, `product_quantity`, `product_size`, `product_rate`, `product_percentage`) VALUES
(24, 24, 3, 3, 16, 30, 'kiloasd', 800, 0),
(23, 24, 3, 3, 19, 30, '1000 tonnes', 15000, 0),
(28, 26, 4, 5, 16, 30, 'kiloasd', 800, 0),
(27, 26, 4, 5, 19, 30, '1000 tonnes', 15000, 0),
(26, 25, 2, 5, 16, 30, 'kiloasd', 800, 0),
(25, 25, 2, 5, 19, 30, '1000 tonnes', 15000, 0),
(17, 21, 3, 3, 15, 20, 'gram', 500, 0),
(18, 21, 3, 3, 16, 20, 'kiloasd', 800, 0),
(19, 22, 4, 4, 15, 30, 'gram', 500, 0),
(20, 22, 4, 4, 16, 30, 'kiloasd', 800, 0),
(21, 23, 6, 5, 19, 10, '1000 tonnes', 15000, 0),
(22, 23, 6, 5, 16, 10, 'kiloasd', 800, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `id` int(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_mode`
--

INSERT INTO `payment_mode` (`id`, `type`) VALUES
(1, 'AGAINST DELIVERY'),
(2, 'NET BANKING');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `rate` int(255) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `feature` varchar(255) NOT NULL,
  `percentage` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `size`, `rate`, `img_name`, `feature`, `percentage`) VALUES
(16, 'Oleo Oil', 'kiloasd', 800, '', 'asdfasdfasdf', 3),
(19, 'Agro Commodities', '1000 tonnes', 15000, '1474887875', '231156', 10);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `acc_no` varchar(255) NOT NULL,
  `vat_number` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `name`, `bank_name`, `acc_no`, `vat_number`, `contact_person`, `email`, `mobile_number`, `city`, `state`, `address`) VALUES
(2, 'asdfasdf', 'asdf', '5321321321', '6461113130', 'asdf asdf asdf asdf', 'sbzpatel@gmail.com', '413213213213', 'asdfasdf', 'seller2', 'asdfasdfasdf, asdf asdf '),
(3, 'seller3', 'asdfdsaf', '5131321321', '6543132132', 'asdfsadf sad ', 'subhash@katalystcorp.in', '23130031321', 'asdfasdf', 'asdfasdf', 'asdfasdf'),
(4, 'Om sai Corporation', '', '231312321321', 'LETTER-12345', 'Pramod Desai', 'pramod@gmail.com', '7896542015', 'Kolhapur', 'Maharashtra', 'Sonya Maruti Chowk, Rajarampuri,Kolhapur-416105.'),
(5, 'asdf', '', '33133203', 'adsf-2020', 'adfasdfad', 'asdasd@gmail.com', '13213213210', 'asdds', 'asdadsf', 'asdfasdf'),
(6, 'Aarush Trading Co.', '014522541025852', 'Bank of India', 'LLK112PPOI', 'Aarush Kothari', 'aarushtrading@gmail.com', '9876543210', 'Mumbai', 'Maharashtra', '249, V-mall, Thakur Complex, Kandivali East, Mumbai - 400101');

-- --------------------------------------------------------

--
-- Table structure for table `seller_invoice`
--

CREATE TABLE `seller_invoice` (
  `id` int(255) NOT NULL,
  `number` int(255) NOT NULL,
  `date` date NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `contract_number` int(255) NOT NULL,
  `contract_date` date NOT NULL,
  `gross_amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller_invoice`
--

INSERT INTO `seller_invoice` (`id`, `number`, `date`, `seller_name`, `contract_number`, `contract_date`, `gross_amount`) VALUES
(0, 17, '2016-10-11', 'Om sai Corporation', 26, '2016-09-28', 0),
(0, 17, '2016-10-11', 'Om sai Corporation', 22, '2016-09-26', 0),
(0, 17, '0000-00-00', 'Om sai Corporation', 26, '2016-09-28', 0),
(0, 17, '2016-10-03', 'Om sai Corporation', 22, '2016-09-26', 0),
(0, 17, '0000-00-00', 'Om sai Corporation', 26, '2016-09-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `seller_invoice_products`
--

CREATE TABLE `seller_invoice_products` (
  `id` int(255) NOT NULL,
  `contract_number` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `broker_rate` int(255) NOT NULL,
  `total_amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `buyer_invoice`
--
ALTER TABLE `buyer_invoice`
  ADD UNIQUE KEY `number` (`number`);

--
-- Indexes for table `buyer_invoice_products`
--
ALTER TABLE `buyer_invoice_products`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_product`
--
ALTER TABLE `contract_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD UNIQUE KEY `id_3` (`id`),
  ADD UNIQUE KEY `id_4` (`id`),
  ADD UNIQUE KEY `id_5` (`id`);

--
-- Indexes for table `seller_invoice_products`
--
ALTER TABLE `seller_invoice_products`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `contract_product`
--
ALTER TABLE `contract_product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
