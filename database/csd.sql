-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2020 at 07:29 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csd`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bill` (`bill`),
  KEY `product` (`product`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `bill`, `product`, `price`, `quantity`) VALUES
(5, 3, 1, 2000, 1),
(6, 3, 2, 20000, 6),
(7, 4, 2, 20000, 4),
(8, 4, 3, 500, 6),
(9, 4, 7, 1000, 2),
(10, 5, 2, 20000, 2),
(11, 5, 9, 100000, 1),
(12, 6, 2, 20000, 5),
(13, 6, 11, 326, 1),
(14, 6, 19, 370, 1),
(15, 6, 111, 6799, 3),
(16, 6, 119, 899, 1),
(17, 7, 2, 20000, 1),
(18, 7, 6, 550, 1),
(19, 7, 8, 55000, 1),
(20, 8, 2, 20000, 5),
(21, 8, 3, 500, 5),
(22, 9, 2, 20000, 1),
(23, 9, 1, 1000, 1),
(24, 9, 5, 500, 1),
(25, 9, 3, 500, 1),
(26, 10, 14, 4500, 1),
(27, 11, 3, 500, 1),
(28, 11, 22, 500, 1),
(29, 11, 5, 500, 1),
(30, 11, 50, 1000, 1),
(31, 11, 67, 4999, 1),
(32, 11, 131, 30000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phno` varchar(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` text NOT NULL,
  `yob` year(4) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phno`, `date`, `address`, `yob`, `employee_id`, `status`) VALUES
(13, 'kasim', '8561081683', '2019-12-07 15:39:42', 'NIT SIKKIM', 2000, 6, 1),
(14, 'MUHAMMAD KASIM', '08001770041', '2019-12-07 22:27:12', 'MAIN ROAD, MINYA BAZAR, SIRSAGANJ, FIROZABAD, UTTAR PRADESH', 1999, 6, 1),
(15, 'MUHAMMAD QASIM', '08001770041', '2019-12-09 00:28:02', 'MAIN ROAD, MINYA BAZAR, SIRSAGANJ, FIROZABAD, UTTAR PRADESH', 2000, 6, 1),
(16, 'Ayush', '1234567', '2019-12-09 00:30:43', 'NitS', 1999, 12, 1),
(17, 'M KASIM', '770041', '2019-12-10 02:25:21', 'MAIN ROAD, MINYA BAZAR, SIRSAGANJ, FIROZABAD, UTTAR PRADESH', 2000, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `f_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `l_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `phone_number` text CHARACTER SET latin1 NOT NULL,
  `Address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`),
  UNIQUE KEY `username_3` (`username`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `f_name`, `l_name`, `email`, `password`, `phone_number`, `Address`, `status`, `admin`) VALUES
(6, 'kasim', 'Muhammad', 'Kasim', 'b170126@nitsikkim.ac.in', '202cb962ac59075b964b07152d234b70', '8001770041', 'MAIN ROAD, MINYA BAZAR, SIRSAGANJ, FIROZABAD, UTTAR PRADESH', 1, 1),
(10, 'qasim', 'MUHAMMAD', 'QASIM', 'b170126@nitsikkim.ac.in', '202cb962ac59075b964b07152d234b70', '80017700412', 'MAIN ROAD, MINYA BAZAR, SIRSAGANJ, FIROZABAD, UTTAR PRADESH', 1, 0),
(11, 'mdkasim', 'MUHAMMAD', 'KASIM', 'b170126@nitsikkim.ac.in', '202cb962ac59075b964b07152d234b70', '08001770041', 'MAIN ROAD, MINYA BAZAR, SIRSAGANJ, FIROZABAD, UTTAR PRADESH', 1, 0),
(12, 'mdqasim', 'MUHAMMAD', 'KASIM', 'b170126@nitsikkim.ac.in', '202cb962ac59075b964b07152d234b70', '08001770041', 'MAIN ROAD, MINYA BAZAR, SIRSAGANJ, FIROZABAD, UTTAR PRADESH', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `amount` double NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer` (`customer`),
  KEY `employee` (`employee`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `employee`, `customer`, `amount`, `date`) VALUES
(3, 6, 13, 121000, '2019-12-07 20:08:11'),
(4, 6, 14, 85000, '2019-12-07 22:27:12'),
(5, 6, 14, 140000, '2019-12-07 22:29:44'),
(6, 12, 14, 121992, '2019-12-08 03:48:15'),
(7, 6, 15, 75550, '2019-12-09 00:28:02'),
(8, 12, 16, 102500, '2019-12-09 00:30:43'),
(9, 6, 14, 22000, '2019-12-09 04:29:43'),
(10, 6, 13, 4500, '2019-12-09 18:28:29'),
(11, 6, 17, 37499, '2019-12-10 02:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` double NOT NULL,
  `des` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `costprice` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `des`, `quantity`, `costprice`, `status`) VALUES
(1, 'Hard disk 1TB', '1.jpg', 1000, 'Segate 1TB', 19, 99, 0),
(2, 'Desktop Computer', '2.jpg', 20000, 'i5(6th gen),4 GB , 1TB HDD,2GB Integrated graphics', 23, 19500, 1),
(3, 'Memory card 32', '3.jpg', 500, 'Sand disk 32 GB', 33, 450, 1),
(4, 'Memory card 128', '4.jpg', 1000, 'Samsung 128GB', 50, 450, 1),
(5, 'keyboard', '5.jpg', 500, 'Dell wired keyboard', 48, 450, 1),
(6, 'keyboard mouse combo', '6.jpg', 550, 'Intex keyboard mouse combo', 49, 500, 1),
(7, 'Wireless keyboard mouse', '7.jpg', 1000, 'Longitech wireless keyboard and mouse', 48, 900, 1),
(8, 'Laptop lenovo think pad', '8.jpg', 55000, '14 inch i7 4th gen, 6gb 1 tb', 14, 53000, 1),
(9, 'Dell laptop ', '9.jpg', 100000, 'i7 5th gen , 8 gb ,256 gb ssd, integrated graphics', 8, 95000, 1),
(10, 'hp laptop', '10.jpg', 60000, 'i5 6th gen, 4gb ,1 tb hdd , touch', 10, 56000, 1),
(11, 'Pen drive', '11.jpg', 326, 'Sandisk 16 gb', 99, 300, 1),
(12, 'pen drive', '12.jpg', 459, 'HP 16 gb', 100, 430, 1),
(13, 'printer', '13.jpg', 4000, 'HP Deskjet ink printer', 5, 3500, 1),
(14, 'printer', '14.jpg', 4500, 'Samsung laser printer', 4, 3800, 1),
(15, 'Mac book laptop', '15.jpg', 62000, 'Core i5/8GB/128GB/Mac OS X/Integrated Graphics', 5, 55000, 1),
(16, 'Hard disk ssd', '16.jpg', 10000, 'Sony 256GB External Solid State Hard Drive', 50, 9000, 1),
(17, 'hard disk ssd', '17.jpg', 5000, 'Lite-On Mu 2 240GB SSD PH3-CE240', 50, 4500, 1),
(18, 'Speakers', '18.jpg', 1000, 'Intex 2.1 speakers', 10, 900, 1),
(19, 'Bluetooth speaker', '19.jpg', 370, 'blue tooth multimedia speakers', 49, 350, 1),
(20, 'wifi router', '20.jpg', 1000, 'TP link wifi router', 6, 950, 1),
(21, 'monitor', '21.jpg', 6000, 'Monitor Samsung 18.5', 10, 5500, 1),
(22, 'cooling pad', '22.jpg', 500, 'laptop cooling pad', 9, 450, 1),
(23, 'Hp laptop bag', '23.jpg', 500, 'Hp laptop bag', 10, 450, 1),
(24, 'Laptop skin', '24.jpg', 200, 'Hacker laptop skin', 0, 100, 1),
(25, 'laptop', '25.jpg', 52000, 'i7 5th gen, 4gb ,1tb, ', 1, 50000, 1),
(26, 'IPhone', '26.jpg', 56000, 'A', 10, 55000, 1),
(27, 'USB 3.0', '27.JPG', 6500, 'Dual-Head Graphics and Gigabit Ethernet Adapter Super Speed 5 Gbps Dual ', 100, 6000, 1),
(28, 'sand disk PD 32gb', '28.JPG', 600, 'SanDisk Ultra Dual USB Drive 3.0 Black', 100, 500, 1),
(29, 'Strontium 32GB', '29.JPG', 1300, 'Strontium Nitro Plus OTG Pen Drive, USB3.0, 32GB', 50, 900, 1),
(30, 'Wireless datacard 4GB ROM', '30.JPG', 2500, 'Reliance Jio Wi-Fi M2 Wireless Data Card', 60, 2200, 1),
(31, 'Sony HeadPhone(white)', '31.JPG', 1300, 'Sony MDR-ZX110A Stereo On-Ear Headphone(White)', 90, 999, 1),
(32, 'Samsung M2071W Laser Printer', '32.JPG', 11000, 'Samsung M2071W WiFi Multi Function Laser Printer', 10, 9999, 1),
(33, 'HP Ink Tank GT 5810 Printer (Print, Scan, Copy)', '33.JPG', 6000, 'HP Ink Tank GT 5810 Printer (Print, Scan, Copy)', 80, 5000, 1),
(34, 'Epson L565 InkJet Photo Printer', '34.JPG', 15000, 'Ultra-low-cost printing, copying and scanning\r\nHigh-quality, reliable results\r\nHassle-free with simple set-up and maintenance and 30-page ADF', 20, 12000, 1),
(35, 'Samsung SCX-4021S  Multi Function Laser Printer', '35.JPG', 9000, 'Samsung SCX-4021S Monochrome Multi Function Laser Printer', 0, 8000, 1),
(36, 'Brother DCP-L2541DW Monochrome Wifi Laser Printer', '36.JPG', 10000, 'Copy, Scan, Automatic 2-sided Print, Networking (Wired/Wireless)\r\nFast print speeds up to 30ppm (A4) for monochrome laser printing', 20, 9000, 1),
(37, 'ANT VR Headset (Black)  with Android M update', '37.JPG', 5000, 'Compatible with Lenovo K4 Note TheaterMax technology providing widescreen virtual cinematic experience. Also compatible with Lenovo Vibe X3, K5 Plus and K3 Note (with Android M update)', 50, 4500, 1),
(38, 'Inventis 5V 1.2W Portable Flexible USB LED', '38.JPG', 300, 'Rated voltage: 5V, Rated Power: 1.2W\r\nPowered by any Devices with USB', 200, 250, 1),
(39, 'TP-Link AD7200 Gigabit Router Talon AD7200 AC5400', '39.JPG', 5000, 'TP-Link AD7200 Wireless Wi-Fi Tri-Band Gigabit Router Talon AD7200 AC5400', 100, 4500, 1),
(40, 'Sandisk 16GB Micro SD Card', '40.JPG', 600, 'Capture more photos\r\nShare more of your favorite photos and videos with your friends and family', 200, 499, 1),
(41, 'D-Link DSL-2750U  N 300 ADSL2+ 4-Port with Modem', '41.JPG', 7500, 'D-Link DSL-2750U Wireless N 300 ADSL2+ 4-Port Wi-Fi Router with Modem (Black)', 60, 7000, 1),
(42, 'Sony Microvault 16GB Pen Drive (White) by Sony', '42.JPG', 700, 'Sony Microvault 16GB Pen Drive (White)\r\nby Sony', 200, 689, 1),
(43, 'Ntron NT-IPAKY-NOT3 Original iPaky Brand Luxury ', '43.JPG', 500, 'Ntron NT-IPAKY-NOT3 Original iPaky Brand Luxury High Quality Ultra-Thin Dotted Silicon Back + PC Gold Frame Bumper Back Case Cover for Xiaomi Redmi Note 3 - Gold', 150, 450, 1),
(44, 'Seagate Expansion 1.5TB Portable External Drive', '44.JPG', 6000, 'Seagate Expansion 1.5TB Portable External Drive', 20, 5500, 1),
(45, 'Intex IT-2616SUF-OS 4.1 Multimedia Speakers', '45.JPG', 4000, 'Intex IT-2616SUF-OS 4.1 Computer Multimedia Speakers', 20, 3600, 1),
(46, 'Intex IT-PB11K 11000 mAh Power Bank (White)', '46.JPG', 1000, 'Intex IT-PB11K 11000 mAh Power Bank (White)', 60, 800, 1),
(47, 'Western Digital 1TB Portable Hard Drive (Black)', '47.JPG', 7000, 'Western Digital My Passport 1TB Portable External Hard Drive (Black)', 50, 6500, 1),
(48, 'Silicone Keyboard Protector Skin for Laptop 15.6 ', '48.JPG', 500, 'Universal Silicone Keyboard Protector Skin for Laptop 15.6\r\nby Generic', 150, 350, 1),
(49, 'TP-Link TL-WN725N 150Mbps Wireless USB Adapter ', '49.JPG', 1000, 'TP-Link TL-WN725N 150Mbps Wireless N Nano USB Adapter (Black)', 220, 500, 1),
(50, 'Philips SHE1360/97   In - Ear   Headphone  (Black)', '50.JPG', 1000, 'Philips SHE1360/97 In-Ear Headphone (Black)', 199, 700, 1),
(51, 'Logitech B170 Wireless Mouse (Black)', '51.JPG', 600, 'Logitech B170 Wireless Mouse (Black)', 200, 500, 1),
(52, 'Intex IT-881U 2.1 Computer Multimedia Speakers', '52.JPG', 5000, 'Intex IT-881U 2.1 Computer Multimedia Speakers', 30, 3500, 1),
(53, 'Logitech M235 Wireless Mouse (Grey)', '53.JPG', 1200, 'Logitech M235 Wireless Mouse (Grey)', 59, 900, 1),
(54, 'Micromax Tab P290 (7 inch, 8GB, Wi-Fi Only), Black', '54.JPG', 5000, 'Micromax Canvas Tab P290 Tablet (7 inch, 8GB, Wi-Fi Only), Black', 10, 4500, 1),
(55, 'HP 678 2-pack Black & Tri-color Ink Cartridges', '55.JPG', 1000, 'HP 678 2-pack Black & Tri-color Ink Advantage Cartridges (L0S24AA)', 100, 800, 1),
(56, 'Edge TPU FlexibleBack Cover for Xiaomi Redmi  Gold', '56.JPG', 400, '\r\nClick to open expanded view\r\nKaira Electroplated Edge TPU Flexible Back Case Cover for Xiaomi Redmi Note 3 - Gold', 0, 360, 1),
(57, 'MacBook Air 13\" 13-inch Case Baby Pink Skin', '57.JPG', 600, '\r\nClick to open expanded view\r\nMacBook Air 13\" 13-inch Case Baby Pink Skin Case cover for MacBook Air 13.3\" Shell Cover Case + Get Silicone Keyboard Cover + Touchpad Protector Free', 100, 360, 1),
(58, 'Keyboard Protector Silicone Skin Cover for Lenovo', '58.JPG', 1000, 'Saco Keyboard Protector Silicone Skin Cover for Lenovo G G50-80 80E502Q3IH 15.6 inch Laptop (Black/Clear)', 20, 900, 1),
(59, 'HP  X 1000        Wired Mouse   (Black/Grey color)', '59.JPG', 500, 'HP X1000 Wired Mouse (Black/Grey)', 100, 300, 1),
(60, 'Cash / Bill/ Currency/  Note Counting Machine ', '60.JPG', 6000, 'SToK ST-MC01 Cash / Bill / Currency/ Money / Note Counting Machine with Fake Note Detector & LED Display ', 80, 5000, 1),
(61, 'iBall Nirantar UPS-621V(600VA) Power Protection', '61.JPG', 3000, 'iBall Nirantar UPS-621V(600VA) Power Protection', 40, 2300, 1),
(62, 'Quantum QHM7403 USB/PS2 Keyboard (Black)', '62.JPG', 5000, 'Quantum QHM7403 USB/PS2 Keyboard (Black)', 20, 3999, 1),
(63, 'Mobitron Rugby Bluetooth Multimedia Speaker', '63.JPG', 4999, 'Mobitron Rugby Bluetooth Multimedia Speaker (Multicolor)', 20, 2999, 1),
(64, 'Portronics POR 343 UFO Home Charger 6 Ports', '64.JPG', 1000, 'Portronics POR 343 UFO Home Charger 6 Ports 8A Charging Station - White', 100, 800, 1),
(65, 'V-Guard Mini Crystal Voltage Stabilizer for TV', '65.JPG', 3000, 'V-Guard Mini Crystal Voltage Stabilizer for Television (Black', 100, 2500, 1),
(66, 'Canon EOS 1200D 18MP Digital SLR Camera ', '66.JPG', 5000, '\r\nClick to open expanded view\r\nCanon EOS 1200D 18MP Digital SLR Camera (Black) with 18-55mm and 55-250mm IS II Lens,8GB card and Carry Bag', 30, 4500, 1),
(67, ' Huawei Airtel 4G wifi hotspotwith any 4G network ', '67.JPG', 4999, 'Shadow Securitronics Huawei Airtel 4G wifi hotspot unlocked works with any 4G network - WITH 1 METER CABLE & WALL CHARGER', 99, 4500, 1),
(68, 'Dragonwar Leviathan ELE-G1 Gaming Laser Mouse ', '68.JPG', 1000, 'Dragonwar Leviathan ELE-G1 Gaming Laser Mouse (Black)', 70, 700, 1),
(69, 'Generic Ok Stand For Smartphones And Tablets', '69.JPG', 500, 'Generic Ok Stand For Smartphones And Tablets', 100, 399, 1),
(70, 'Quantum Slim USB 2.0 High Speed Hub 4 Port Color', '70.JPG', 200, 'Quantum Slim USB 2.0 High Speed Hub 4 Port Color', 10, 150, 1),
(71, 'Dell 19.5V-3.34AMP 65W Adapter CAT5 RJ45', '71.JPG', 999, 'Dell 19.5V-3.34AMP 65W Adapter', 29, 800, 1),
(72, 'V-Guard CRYSTAL PLUS Voltage Stabilizer for TV', '72.JPG', 3000, 'V-Guard CRYSTAL PLUS Voltage Stabilizer for Television (Black)', 10, 2399, 1),
(73, 'Neoprene Best Water-Resistant Protective Case', '73.JPG', 1000, 'Neoprene Macbook Sleeve - Best Water-Resistant Protective Case For 13\" MacBook Pro & Air (including Retina) Laptop Computer and Ultrabook - Cover Bag Includes Compartment For Charger - Mint', 10, 899, 1),
(74, 'F&D F-203G 2.1 Speaker System (Black)', '74.JPG', 3999, 'F&D F-203G 2.1 Speaker System (Black)', 67, 2500, 1),
(75, 'Redgear Smartline Wired Gamepad Plug for pc games', '75.JPG', 2000, 'Redgear Smartline Wired Gamepad Plug and Play support for all PC games supports Windows 7 / 8 / 8.1 / 10', 20, 1599, 1),
(76, 'iBall Soundwave2 2.0 Multimedia Speakers', '76.JPG', 4000, 'iBall Soundwave2 2.0 Multimedia Speakers, Black', 29, 3499, 1),
(77, 'Leather Case Cover Stand USB Keyboard ', '77.JPG', 500, 'PTron Universal Leather Case Cover Stand USB Keyboard for All 7-inch Tablets', 100, 459, 1),
(78, 'Sony MDRZX110 On-Ear Stereo Headphone (Black)', '78.JPG', 1300, 'Sony MDRZX110 On-Ear Stereo Headphone (Black)', 0, 1200, 1),
(79, 'Sennheiser HD 180 Over-Ear Headphone ', '79.JPG', 1000, 'Sennheiser HD 180 Over-Ear Headphone (Black)', 10, 8999, 1),
(80, 'Lenovo Yoga Tab 3 8 Tablet (8 inch, 16GB, )', '80.JPG', 16000, 'Lenovo Yoga Tab 3 8 Tablet (8 inch, 16GB, Wi-Fi + 4G LTE + Voice Calling), Slate Black', 56, 14999, 1),
(81, 'Canon EOS 700D 18MP Digital SLR Camera', '81.JPG', 45000, 'Canon EOS 700D 18MP Digital SLR Camera (Black) with 18-55mm IS II and 55-250mm IS II Lens, 8GB card and Carry Bag', 10, 42999, 1),
(82, 'Sony MDR-AS200 Clip Headphones (Blue)', '82.JPG', 2399, 'Sony MDR-AS200 Clip On Active Sport Lightweight Angled Earbud Headphones (Blue)', 34, 2000, 1),
(83, 'iBall Excelance CompBook 11.6-inch Laptop', '83.JPG', 10000, 'iBall Excelance CompBook 11.6-inch Laptop (Atom Z3735F/2GB/32GB/Windows 10/Integrated Graphics)', 12, 8999, 1),
(84, 'Zebronics BT4440RUCF 4.1  Bluetooth Speakers', '84.JPG', 3000, 'Zebronics BT4440RUCF 4.1 Channel Bluetooth Speakers', 12, 2599, 1),
(85, 'Reliance JIO Jio-fi wireless Router', '85.JPG', 2500, 'Reliance JIO Jio-fi wireless Router', 34, 2299, 1),
(86, 'Dell Inspiron 3558 Notebook laptop', '86.JPG', 35000, 'Dell Inspiron 3558 Notebook (5th Gen Intel Core i3- 4GB RAM- 1TB HDD- 39.62 cm(15.6)- Ubuntu) (Black)', 54, 33999, 1),
(87, 'TP-Link TL-WA850RE 300Mbps Universal WiFi Range', '87.JPG', 3000, 'TP-Link TL-WA850RE 300Mbps Universal WiFi Range Extender (White)', 76, 2399, 1),
(88, 'Clublaptop Reversible 15.6-inch Laptop Sleeve', '88.JPG', 500, 'Clublaptop Reversible 15.6-inch Laptop Sleeve', 76, 239, 1),
(89, 'YU YUNIQUE YU4711 Smartphone (Black)', '89.JPG', 5500, 'YU YUNIQUE YU4711 Smartphone (Black)', 78, 4599, 1),
(90, 'Strontium Ammo 16GB USB Pen Drive', '90.JPG', 1000, 'Strontium Ammo 16GB USB Pen Drive', 23, 799, 1),
(91, 'Intex JOIN-IT 2.0 Multimedia Speaker', '91.JPG', 650, 'Intex JOIN-IT 2.0 Multimedia Speaker', 43, 539, 1),
(92, 'MacBook Pro 13.3', '92.JPG', 1200, 'MacBook Pro 13.3\" Case. Laptop Frosted Matte Rubberized Hard Cover Case Skin+Silicon Keyboard Cover', 23, 1000, 1),
(93, 'Intex IT-HP904FM Over-Ear Headphones (Black)', '93.JPG', 900, 'Intex IT-HP904FM Over-Ear Headphones (Black)', 7, 789, 1),
(94, 'WireSwipe HDMI Male to HDMI Male Cable ', '94.JPG', 500, 'WireSwipe HDMI Male to HDMI Male Cable TV Lead 1.4V High Speed Ethernet 3D Full HD 1080p (1.5 meter)', 34, 349, 1),
(95, 'Wayona Wifi Adapter', '95.JPG', 1000, 'Roll over image to zoom in\r\nWayona WYN 12 150Mbps 1T1R 2.4Ghz 802.11n/g/b Soft AP Wireless Mini USB Wifi Adapter', 23, 567, 1),
(96, 'Quantam QHMPL QHM7468 USB Vibration Game', '96.JPG', 500, 'Quantam QHMPL QHM7468 USB Vibration Game Pad Remote Joystick', 23, 349, 1),
(97, 'HDD WD Seagate hard disk cover', '97.JPG', 500, 'Technotech WD Hard Disk Drive Pouch case for 2.5\" HDD WD Seagate Slim Sony Dell Toshiba (Black)\r\n', 12, 349, 1),
(98, 'Netgear WNR614 N300 Wi-Fi Router (White)', '98.JPG', 1500, 'Netgear WNR614 N300 Wi-Fi Router (White)', 87, 1299, 1),
(99, 'Air 13', '99.JPG', 1000, 'Air 13\" 13-Inch Mint Green Rubberized Hard Case Cover For Macbook Air 13\" 13.3\" 13-Inch Shell Cover Case', 32, 567, 1),
(100, 'Fitbit Charge 2 Wireless Activity Tracker ', '100.JPG', 15000, 'Fitbit Charge 2 Wireless Activity Tracker and Sleep Wristband (Large, Black/Silver)', 45, 13999, 1),
(101, 'CNCT Heavy Duty(Weight Capacity-15 KG)  Single Arm', '101.JPG', 600, 'CNCT Heavy Duty (Weight Capacity - 15 KG) Wall Mount / Bracket / Stand Single Arm for upto 27\" LCD - LED - OLED TV with Maximum VESA 100 MM - Supports Displays - Monitors ', 23, 457, 1),
(102, '15 PIN MALE TO MALE VGA CABLE 1.5 Meter', '102.JPG', 500, '15 PIN MALE TO MALE VGA CABLE 1.5 Meter', 57, 455, 1),
(103, 'JunkYard Laptop Skins 15.6 inch-Batman VS Superman', '103.JPG', 500, 'JunkYard Laptop Skins 15.6 inch - Batman VS Superman - Movie Skins - HD Quality - Dell', 23, 450, 1),
(104, 'Kaspersky Anti-Virus 2016 new for 1 pc,1 year (CD)', '104.JPG', 1000, 'Kaspersky Anti-Virus 2016 - 1 PC, 1 Year (CD)', 87, 879, 1),
(105, 'ESET NOD32 Antivirus 2016 Edition ', '105.JPG', 599, 'ESET NOD32 Antivirus 2016 Edition ', 98, 450, 1),
(106, 'Bluetooth Receiver Adapter ', '106.JPG', 599, 'Bluetooth Receiver Adapter ', 76, 459, 1),
(107, 'Samsung 18.5 Super Slim LED Monitor ', '107.JPG', 6000, 'Samsung 18.5 Super Slim LED Monitor ', 9, 5699, 1),
(108, 'Micromax 46.99 cm (18.5) MM185H65 Monitor', '108.JPG', 5500, 'Micromax 46.99 cm (18.5) MM185H65 Monitor', 45, 5199, 1),
(109, 'BRAND NEW DESKTOP CPU', '109.JPG', 4000, 'BRAND NEW DESKTOP COMPUTER', 8, 3499, 1),
(110, 'HP Slimline 260-A062IL CPU', '110.JPG', 6000, 'HP Slimline 260-A062IL', 56, 5499, 1),
(111, 'high configuration CORE 2 CPU', '111.JPG', 6799, 'HIGH CONFIGURATION CORE 2', 31, 6199, 1),
(112, 'Circle LIL Desktop Computer', '112.JPG', 3000, 'Circle LIL Desktop Computer', 0, 2699, 1),
(113, 'CPU COMPUTER Intel Core i5-650', '113.JPG', 2500, 'CPU COMPUTER Intel Core i5-650', 65, 2199, 1),
(114, 'Wi-Fi Range Extender ', '114.JPG', 2900, 'Wi-Fi Range Extender ', 34, 2599, 1),
(115, 'Bluetooth Smart Wrist Watch', '115.JPG', 1900, 'Bluetooth Smart Wrist Watch', 9, 1599, 1),
(116, 'SanDisk Connect Wireless Stick', '116.JPG', 999, 'SanDisk Connect Wireless Stick', 45, 789, 1),
(117, 'Technotech 3 Pin Computer Power Cord Cable', '117.JPG', 999, 'Technotech 3 Pin Computer Power Cord Cable', 76, 789, 1),
(118, 'Logitech C310 HD Webcam', '118.JPG', 2100, 'Logitech C310 HD Webcam', 87, 1799, 1),
(119, 'Netgear EX2700 N300 Wi-Fi Range Extender', '119.JPG', 899, 'Netgear EX2700 N300 Wi-Fi Range Extender', 43, 678, 1),
(120, 'V-Guard VG 50 Voltage Stabilizer', '120.JPG', 1199, 'V-Guard VG 50 Voltage Stabilizer', 87, 999, 1),
(121, 'Tenda A301 Wireless N300 ', '121.JPG', 2999, 'Tenda A301 Wireless N300 ', 98, 2599, 1),
(122, 'Usb Type-C Cable 100cm', '122.JPG', 888, 'Usb Type-C Cable 100cm', 67, 599, 1),
(123, 'TP-Link TL-WA850RE 300Mbps', '123.JPG', 899, 'TP-Link TL-WA850RE 300Mbps', 87, 699, 1),
(124, 'CE-101L 3 PIN CONVERSION PLUG 5', '124.JPG', 200, 'CE-101L 3 PIN CONVERSION PLUG 5', 32, 149, 1),
(125, 'Intex Fitrist Health Band', '125.JPG', 999, 'Intex Fitrist Health Band', 0, 799, 1),
(126, 'Unique Gadget Card Reader ', '126.JPG', 499, 'Unique Gadget Card Reader ', 76, 399, 1),
(127, 'Zebronics  Bluetooth Headset', '127.JPG', 499, 'Zebronics ZEB-BH498 Wireless Bluetooth Headset', 45, 399, 1),
(128, 'Corsair VS Series VS450', '128.JPG', 2999, 'Corsair VS Series VS450', 46, 2019, 1),
(129, 'Ultrascan Decoding Technology', '129.JPG', 2500, 'Ultrascan Decoding Technology', 0, 1999, 1),
(130, 'Logitech Wireless presenter', '130.JPG', 4499, 'Logitech Wireless presenter', 21, 3999, 1),
(131, 'Laptop HP ', '131.JPG', 30000, 'i3 7th Gen', 9, 25000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products` ADD FULLTEXT KEY `name` (`name`);
ALTER TABLE `products` ADD FULLTEXT KEY `name_2` (`name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_id` FOREIGN KEY (`bill`) REFERENCES `history` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `added_by` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `employee_id` FOREIGN KEY (`employee`) REFERENCES `employee` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
