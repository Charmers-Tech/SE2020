-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2020 at 05:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productitem`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock_balance` int(11) NOT NULL,
  `price` double NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `warehouse_id`, `name`, `photo`, `stock_balance`, `price`, `description`) VALUES
('id5fa6c4daadfa79.38403262', 1, 'XPS 13 Laptop', 'XPS 13 Laptop.jpg', 50, 799.99, 'The remastered 13-inch now features 10th Gen Intel® Core™ processors, an innovative HD webcam located in the top of the InfinityEdge display and next generation Dell Cinema.'),
('id5fa6c51f6b5c09.30793173', 1, 'XPS 13 Touch Laptop', 'XPS 13 Touch Laptop.jpg', 20, 999.99, 'Take work or play on the go with the 13.4&amp;quot; XPS 13 9300 Multi-Touch Laptop in platinum silver from Dell. Featuring a 1.3 GHz Intel Core i7-1065G7 quad-core CPU and 16GB of soldered LPDDR4x RAM, this laptop is designed for portable performance. A 512GB M.2 SSD provides storage space, and external drives or other accessories can be connected via'),
('id5fa6c55d85a6c1.16292355', 2, 'Dell Pro Backpack 17', 'Dell Pro Backpack 17.jpg', 100, 49.99, 'Choose Dell Pro Backpack 17 (PO1720P), made with a more earth-friendly solution-dyeing process than traditional dyeing processes and shock-absorbing EVA foam that protects your laptop from impact.'),
('id5fa6c5c4c5b7c9.81392733', 1, 'Dell Universal Dock', 'Dell Universal Dock.jpg', 75, 210.99, 'Conveniently attach any laptop equipped with USB-C or USB 3.0. Enjoy universal compatibility with a wide range of PC brands and operating systems supported by Display Link technology.'),
('id5fa6c6283c00b0.29717776', 2, 'CA Essential Webcam 1080HD-AF', 'CA Essential Webcam 1080HD AF.jpg', 123, 49.99, 'The CA Essential Webcam 1080HD-AF delivers remarkably crisp, clear, and detailed images in vibrant colors. The HD Auto Focus and Light Correction adjust to the conditions to provide a consistently high definition image. The integrated OmniDirection microphone captures the natural sound of your voice and the field of view is wide enough to include a second person. The CA Essential Webcam 1080 HD-AF ensures you make a strong impression when you are making a key Skype call, Teams call, Zoom call or creating your next YouTube video.'),
('id5fa6c6983c0786.68118232', 1, 'Lexmark C3224dw Color Duplex Laser Printer', 'Lexmark C3224dw Color Duplex Laser Printer.jpg', 20, 199, 'With color output up to 24 pages per minute, the Lexmark C3224dw offers the combination of price and performance small workgroups need in a compact package that fits anywhere. Powered by a 1-GHz multi-core processor and 256 MB of memory, it’s lightweight, easy to set up, easy to move and easy to keep going with one-piece toner cartridge replacement. Built-in Ethernet supports network connectivity and Wi-Fi enables secure mobile-device support. Standard two-sided printing saves paper, while Lexmark full-spectrum security helps protect your network and proprietary information.'),
('id5fa6c737386981.92544807', 1, 'Bose Noise Cancelling Headphones 700 - Triple Black', 'Bose Noise Cancelling Headphones Triple Black.jpg', 300, 379, 'Bose Noise Cancelling Headphones 700 deliver everything you expect — and things you never imagined possible. Think of them as smart headphones that let you keep your head up to the world with easy access to voice assistants. Or confidently take a call with the most powerful microphone system for voice pickup. And then there’s Bose AR, a first-of-its-kind audio augmented reality platform that makes astonishing new audio experiences possible.'),
('id5fa6c7a22bd223.62373110', 2, 'Inspiron 15 3000 Laptop (10th Gen)', 'Inspiron 15 3000.jpg', 250, 399.99, '15.6-inch laptop that meets all your everyday needs and looks good doing it. Featuring 10th Generation Intel® processors and an array of ports.'),
('id5fa6c8308d70b9.99294148', 2, 'Dell Pro Briefcase 15 (PO1520C)', 'Dell Pro Briefcase 15.jpg', 99999, 47.99, 'Choose Dell Pro Briefcase 15 (PO1520C), made with a more earth-friendly solution-dyeing process than traditional dyeing processes and shock-absorbing EVA foam that protects your laptop from impact.'),
('id5fa6c87118b048.29135276', 1, 'Dell USB-C Mobile Adapter - DA300', 'Dell USB-C Mobile Adapter.jpg', 9, 59.99, 'Featuring the widest variety of port options available, the Dell USB-C Mobile Adapter - DA300 offers seamless video, network, and data connectivity, in a compact design.'),
('id5fa6c8f35eb4a5.32062609', 1, 'MakerBot Replicator 3D printer', 'MakerBot Replicator 3D printer.jpg', 200, 1999, 'The MakerBot Replicator+ prints 30% faster than its predecessor and offers a 25% larger build volume. For greater reliability and precision, it features improved hardware, like a redesigned gantry and z-stage.'),
('id5fa6c97a754a23.20755849', 2, 'Alienware 34 Curved Gaming Monitor - AW3420DW', 'Alienware 34 Curved Gaming Monitor.jpg', 10000, 1144.99, '34 inch gaming monitor with the full colors brought by IPS Nano Color (98% DCI-P3) technology and a 2ms response time. Featuring a 1900R WQHD resolution and 21:9 display ratio.');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`) VALUES
(1, 'Store1'),
(2, 'Store2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
