-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 10, 2021 at 02:48 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_confirmation` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bank` text NOT NULL,
  `image_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hosting`
--

CREATE TABLE `hosting` (
  `id` int(10) NOT NULL,
  `clientid` int(10) NOT NULL,
  `orderid` int(10) NOT NULL,
  `productid` int(10) NOT NULL,
  `regdate` date NOT NULL,
  `domain` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `billingcycle` text COLLATE utf8_unicode_ci NOT NULL,
  `nextduedate` date DEFAULT NULL,
  `nextinvoicedate` date NOT NULL,
  `domainstatus` enum('Pending','Active','Suspended','Terminated','Cancelled','Fraud','Completed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `ns1` text COLLATE utf8_unicode_ci NOT NULL,
  `ns2` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoiceitems`
--

CREATE TABLE `invoiceitems` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `invoiceid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) NOT NULL,
  `invoice_no` bigint(20) NOT NULL DEFAULT 0,
  `email` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `due` date DEFAULT NULL,
  `date_paid` date DEFAULT '0000-00-00',
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` datetime(6) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `ordernum` bigint(10) NOT NULL DEFAULT 1,
  `clientid` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `paymentmethod` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `invoiceid` int(10) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `ctype` text NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblservers`
--

CREATE TABLE `tblservers` (
  `id` int(10) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `ipaddress` text COLLATE utf8_unicode_ci NOT NULL,
  `hostname` text COLLATE utf8_unicode_ci NOT NULL,
  `nameserver1` text COLLATE utf8_unicode_ci NOT NULL,
  `nameserver1ip` text COLLATE utf8_unicode_ci NOT NULL,
  `nameserver2` text COLLATE utf8_unicode_ci NOT NULL,
  `nameserver2ip` text COLLATE utf8_unicode_ci NOT NULL,
  `nameserver3` text COLLATE utf8_unicode_ci NOT NULL,
  `nameserver3ip` text COLLATE utf8_unicode_ci NOT NULL,
  `nameserver4` text COLLATE utf8_unicode_ci NOT NULL,
  `nameserver4ip` text COLLATE utf8_unicode_ci NOT NULL,
  `maxaccounts` int(10) NOT NULL DEFAULT 0,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `accesshash` text COLLATE utf8_unicode_ci NOT NULL,
  `port` int(8) DEFAULT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hosting`
--
ALTER TABLE `hosting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serviceid` (`id`),
  ADD KEY `clientid` (`clientid`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `productid` (`productid`),
  ADD KEY `domain` (`domain`(64)),
  ADD KEY `domainstatus` (`domainstatus`);

--
-- Indexes for table `invoiceitems`
--
ALTER TABLE `invoiceitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoiceid` (`invoiceid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordernum` (`ordernum`),
  ADD KEY `clientid` (`clientid`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblservers`
--
ALTER TABLE `tblservers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hosting`
--
ALTER TABLE `hosting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoiceitems`
--
ALTER TABLE `invoiceitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblservers`
--
ALTER TABLE `tblservers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoiceitems`
--
ALTER TABLE `invoiceitems`
  ADD CONSTRAINT `invoiceitems_ibfk_1` FOREIGN KEY (`invoiceid`) REFERENCES `invoices` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
