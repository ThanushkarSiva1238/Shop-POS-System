-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 06:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampath_food_city`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `Name`, `Description`) VALUES
(1, 'Bakery', 'Indulge in the tempting aroma of freshly baked goods. From bread and pastries to cakes and cookies, this category is a haven for bakery enthusiasts.'),
(2, 'Beverage', 'Quench your thirst with a diverse selection of beverages. From refreshing drinks to specialty beverages, explore options for every taste.'),
(3, 'Pharmacy', 'A pharmacy is where pharmacists dispense medications, offer health information, and contribute to public health by ensuring safe access to medications.'),
(4, 'Meat', 'Meat refers to the flesh of animals, typically consumed as food. It is a rich source of protein, essential nutrients, and can be prepared in various culinary styles. Common types include beef, chicken, and pork, each with distinct flavors and textures.'),
(5, 'Seafood', 'Seafood comprises various edible marine organisms, including fish, shellfish, and crustaceans. Known for its diverse flavors and nutritional benefits, seafood is a rich source of omega-3 fatty acids and protein. Common examples include fish like salmon, shrimp, and mussels, enjoyed in a variety of culinary dishes.'),
(6, 'Grocery', 'A grocery store is a retail shop offering a variety of food and household products for everyday needs, providing a convenient one-stop-shopping experience for consumers in communities.'),
(7, 'Vegetables', 'Vegetables are plant-based foods with various edible parts, offering essential nutrients and fiber for a healthy diet. Broccoli, carrots, and spinach are common examples, versatile in culinary preparations.');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(5) NOT NULL,
  `CusName` varchar(100) NOT NULL,
  `Address` text DEFAULT NULL,
  `GENDER` enum('Male','Female') NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(120) NOT NULL,
  `ContactNo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CusName`, `Address`, `GENDER`, `DOB`, `Email`, `ContactNo`) VALUES
(1, 'Bruce Wayne', 'Colombo - 12', 'Male', '1972-02-19', 'bruce@gmail.com', '0770099887'),
(2, 'Clark Kent', 'Colombo - 14', 'Male', '1977-04-18', 'clark@gmail.com', '0770987654'),
(3, 'Diana', 'Galle Road, Colombo', 'Female', '1971-07-01', 'diana@gmail.com', '0779876543'),
(4, 'Barry Allen', 'Colombo - 15', 'Male', '1995-03-19', 'allen@gmail.com', '0778765432'),
(5, 'Arthur Curry', 'Colombo - 12', 'Male', '1972-01-29', 'arthur@gmail.com', '0777654321'),
(6, 'Victor Stone', 'Colombo - 12', 'Male', '1994-06-29', 'victor@gmail.com', '0776543210'),
(7, 'Darkseid', 'Dark World', 'Male', '1970-10-03', 'omega@gmail.com', '0762345678'),
(8, 'John Jones', 'Colombo - 04', 'Male', '1970-05-14', 'John@gmail.com', '0778655443'),
(9, 'Oliver Queen', 'Maradana', 'Male', '1980-12-01', 'oliver@gmail.com', '0709966332'),
(10, 'Ray Palmer', 'Mattakuliya', 'Male', '1990-06-18', 'palmerray@gmail.com', '0786544323'),
(11, 'Katar Hol', 'Kollupitiya', 'Male', '1984-04-04', 'kator@gmail.com', '0755654432'),
(12, 'Dinah Laurel Lance', 'Maragama', 'Female', '1997-07-29', 'dinahlaurel@gmail.com', '0768766573'),
(13, 'Ralph Dibny', 'Colombo - 15', 'Male', '1972-08-31', 'ralphdibny@gmail.com', '0768798766'),
(14, 'John Smith', 'Modhara', 'Male', '2000-12-05', 'johnsmith@gmail.com', '0765343422'),
(15, 'Shayera Hol', 'Wellawatta', 'Female', '1992-02-23', 'shayera@gmail.com', '0723453364'),
(16, 'Zatanna Zatara', 'Colombo - 13', 'Female', '2003-10-04', 'zatara@gmail.com', '0763426282'),
(17, 'Martin Stein', 'Wellambitiya', 'Male', '1992-12-30', 'martin@gmail.com', '0786553422'),
(18, 'Ted Kord', 'Orugodawatta', 'Male', '2001-03-12', 'tedkord@gmail.com', '0766655442'),
(19, 'Billy Batson', 'Kotahena', 'Male', '2003-10-03', 'billy@gmail.com', '0756178354'),
(20, 'Kent Nelson', 'Nawagampura', 'Male', '1970-10-13', 'nelson@gmail.com', '0765433243');

-- --------------------------------------------------------

--
-- Table structure for table `customer_login`
--

CREATE TABLE `customer_login` (
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Register_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `STATUS` enum('0','1') NOT NULL,
  `CusID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_login`
--

INSERT INTO `customer_login` (`UserName`, `Password`, `Register_Date`, `STATUS`, `CusID`) VALUES
('Arthur', '127609a1cec489887eac79494bfb58e6', '2024-01-20 02:53:29', '1', 5),
('Barry', 'bf2c44e6fc09515648b91b1bb4ec3f5f', '2024-01-20 02:53:29', '1', 4),
('Billy', '9c536181b0bbc3d6647c197f8a4e0cd7', '2024-01-23 04:26:46', '1', 19),
('Bruce', '4a4566696cc81c6053ec708975767498', '2024-01-20 02:53:29', '1', 1),
('Clark', '527d60cd4715db174ad56cda34ab2dce', '2024-01-20 02:53:29', '1', 2),
('Darkseid', 'cf1021da64448549d42b440b986ec4f1', '2024-01-20 07:42:37', '1', 7),
('Diana', '93b63feb993716772ef3b15b08b8e8a8', '2024-01-20 02:53:29', '1', 3),
('Dinah Laurel', 'ecf715d6d79a2698b7fec0357f9d721f', '2024-01-23 03:50:34', '1', 12),
('John', 'e3a456fb4792defd318324000fda14c3', '2024-01-23 03:05:25', '1', 8),
('Katar', 'a330c2e13f5fc317714616c7e2c90624', '2024-01-23 03:31:50', '1', 11),
('Kord', 'af169b6d3488900fc5f6fc36ecf0d127', '2024-01-23 04:25:14', '1', 18),
('Martin', '365991ed5bcffa3d861f9535653b52cb', '2024-01-23 04:17:03', '1', 17),
('Nelson', '1c97da74cd492d8ba45d8a168e9e35f0', '2024-01-23 04:28:54', '1', 20),
('Oliver', 'dfbc2210936a4b9a84f1d9ec85fff258', '2024-01-23 03:27:44', '1', 9),
('Palmer', '0d218a68afe0e679a14afc704d6e0fba', '2024-01-23 03:29:48', '1', 10),
('Ralph', '1aaedf458e4a63162c7771e2bd8c1ff7', '2024-01-23 03:55:13', '1', 13),
('Shayera', 'd34bb4e6b83c65af187976329fee90d3', '2024-01-23 03:59:27', '1', 15),
('Smith', '36cbc41c1c121f2c68f5776a118ea027', '2024-01-23 03:57:26', '1', 14),
('Victor', 'a6bd532925bc80301e01986d101d0bb2', '2024-01-20 02:53:29', '0', 6),
('Zatara', '002b7023687834677963742701aef741', '2024-01-23 12:36:27', '1', 16);

-- --------------------------------------------------------

--
-- Table structure for table `ordertb`
--

CREATE TABLE `ordertb` (
  `OrderID` varchar(30) NOT NULL,
  `Order_Timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Deliver_Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `STATUS` enum('Deliver','Return','Pending') NOT NULL,
  `CusID` int(5) DEFAULT NULL,
  `StaffID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordertb`
--

INSERT INTO `ordertb` (`OrderID`, `Order_Timestamp`, `Deliver_Timestamp`, `STATUS`, `CusID`, `StaffID`) VALUES
('ORD/20231202/0908/20', '2023-12-02 03:38:24', '2023-12-02 06:33:24', 'Deliver', 20, 'ST/003'),
('ORD/20231204/1208/14', '2023-12-04 06:39:30', '2023-12-04 07:32:00', 'Deliver', 14, 'ST/002'),
('ORD/20231204/1208/17', '2023-12-04 06:38:30', '2023-12-04 07:30:24', 'Deliver', 17, 'ST/003'),
('ORD/20231205/1403/10', '2023-12-05 08:33:54', '2023-12-05 09:24:14', 'Deliver', 10, 'ST/003'),
('ORD/20231205/1718/12', '2023-12-05 11:48:30', '2023-12-05 12:10:50', 'Deliver', 12, 'ST/005'),
('ORD/20231210/0824/6', '2023-12-10 02:54:23', '2023-12-05 03:31:28', 'Deliver', 6, 'ST/003'),
('ORD/20231210/1403/13', '2023-12-10 08:33:54', '2023-12-05 09:14:14', 'Deliver', 13, 'ST/002'),
('ORD/20231210/1718/4', '2023-12-10 11:48:30', '2023-12-05 12:08:50', 'Return', 4, 'ST/004'),
('ORD/20231212/0744/12', '2023-12-12 02:54:23', '2023-12-12 03:31:28', 'Return', 12, 'ST/004'),
('ORD/20231212/1235/19', '2023-12-12 04:54:23', '2023-12-05 05:28:28', 'Deliver', 19, 'ST/006'),
('ORD/20231215/1042/3', '2023-12-15 05:12:14', '2023-12-15 06:15:32', 'Deliver', 3, 'ST/002'),
('ORD/20231217/1132/9', '2023-12-17 06:02:18', '2023-12-17 06:24:46', 'Deliver', 9, 'ST/002'),
('ORD/20231221/1739/16', '2023-12-21 12:09:32', '2023-12-21 12:29:06', 'Deliver', 16, 'ST/003'),
('ORD/20231225/0732/5', '2023-12-25 02:02:18', '2023-12-25 02:19:26', 'Deliver', 5, 'ST/002'),
('ORD/20231229/1832/2', '2023-12-29 13:02:18', '2023-12-29 13:30:46', 'Deliver', 2, 'ST/002'),
('ORD/20240120/7', '2024-01-20 09:15:51', '2024-01-21 07:01:29', 'Deliver', 7, 'ST/002'),
('ORD/20240121/1', '2024-01-20 19:12:26', '2024-01-21 07:18:31', 'Return', 1, 'ST/003'),
('ORD/20240121/1314/1', '2024-01-21 07:44:08', '2024-01-22 06:21:08', 'Return', 1, 'ST/002'),
('ORD/20240122/1806/1', '2024-01-22 12:36:08', '2024-01-22 12:36:08', 'Pending', 1, NULL),
('ORD/20240122/2311/4', '2024-01-22 17:41:01', '2024-01-22 17:41:01', 'Pending', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `OrderID` varchar(30) NOT NULL,
  `ProductID` varchar(20) NOT NULL,
  `Order_Quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`OrderID`, `ProductID`, `Order_Quantity`) VALUES
('ORD/20231202/0908/20', 'PRO/010', 5),
('ORD/20231202/0908/20', 'PRO/013', 3),
('ORD/20231202/0908/20', 'PRO/017', 5),
('ORD/20231202/0908/20', 'PRO/019', 2),
('ORD/20231204/1208/14', 'PRO/001', 10),
('ORD/20231204/1208/14', 'PRO/002', 2),
('ORD/20231204/1208/14', 'PRO/003', 3),
('ORD/20231204/1208/14', 'PRO/006', 3),
('ORD/20231204/1208/14', 'PRO/014', 5),
('ORD/20231204/1208/14', 'PRO/015', 4),
('ORD/20231204/1208/17', 'PRO/004', 3),
('ORD/20231204/1208/17', 'PRO/009', 2),
('ORD/20231204/1208/17', 'PRO/010', 4),
('ORD/20231205/1403/10', 'PRO/004', 2),
('ORD/20231205/1403/10', 'PRO/006', 2),
('ORD/20231205/1403/10', 'PRO/010', 1),
('ORD/20231205/1403/10', 'PRO/011', 4),
('ORD/20231205/1403/10', 'PRO/020', 2),
('ORD/20231205/1718/12', 'PRO/012', 3),
('ORD/20231205/1718/12', 'PRO/013', 1),
('ORD/20231205/1718/12', 'PRO/020', 2),
('ORD/20231210/0824/6', 'PRO/005', 3),
('ORD/20231210/0824/6', 'PRO/008', 2),
('ORD/20231210/0824/6', 'PRO/009', 5),
('ORD/20231210/0824/6', 'PRO/018', 1),
('ORD/20231210/1403/13', 'PRO/001', 3),
('ORD/20231210/1403/13', 'PRO/002', 1),
('ORD/20231210/1403/13', 'PRO/003', 3),
('ORD/20231210/1403/13', 'PRO/015', 5),
('ORD/20231210/1403/13', 'PRO/016', 5),
('ORD/20231210/1403/13', 'PRO/017', 3),
('ORD/20231210/1718/4', 'PRO/007', 3),
('ORD/20231210/1718/4', 'PRO/011', 4),
('ORD/20231210/1718/4', 'PRO/020', 2),
('ORD/20231212/0744/12', 'PRO/003', 4),
('ORD/20231212/0744/12', 'PRO/018', 3),
('ORD/20231212/1235/19', 'PRO/007', 2),
('ORD/20231212/1235/19', 'PRO/014', 3),
('ORD/20231212/1235/19', 'PRO/017', 2),
('ORD/20231212/1235/19', 'PRO/020', 1),
('ORD/20231215/1042/3', 'PRO/005', 2),
('ORD/20231215/1042/3', 'PRO/012', 3),
('ORD/20231215/1042/3', 'PRO/013', 3),
('ORD/20231215/1042/3', 'PRO/015', 3),
('ORD/20231215/1042/3', 'PRO/019', 2),
('ORD/20231217/1132/9', 'PRO/015', 2),
('ORD/20231217/1132/9', 'PRO/019', 2),
('ORD/20231221/1739/16', 'PRO/002', 1),
('ORD/20231221/1739/16', 'PRO/004', 2),
('ORD/20231221/1739/16', 'PRO/011', 2),
('ORD/20231221/1739/16', 'PRO/014', 2),
('ORD/20231225/0732/5', 'PRO/013', 2),
('ORD/20231225/0732/5', 'PRO/018', 4),
('ORD/20231229/1832/2', 'PRO/006', 2),
('ORD/20231229/1832/2', 'PRO/011', 3),
('ORD/20231229/1832/2', 'PRO/017', 2),
('ORD/20240120/7', 'PRO/001', 2),
('ORD/20240120/7', 'PRO/002', 1),
('ORD/20240120/7', 'PRO/003', 3),
('ORD/20240122/1806/1', 'PRO/002', 2),
('ORD/20240122/1806/1', 'PRO/015', 1),
('ORD/20240122/1806/1', 'PRO/016', 3),
('ORD/20240122/2311/4', 'PRO/002', 1),
('ORD/20240122/2311/4', 'PRO/004', 2),
('ORD/20240122/2311/4', 'PRO/014', 5),
('ORD/20240122/2311/4', 'PRO/016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` varchar(20) NOT NULL,
  `Payment_Timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Method` enum('Cash','Card') NOT NULL,
  `Total_Amount` float NOT NULL,
  `OrderID` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `Payment_Timestamp`, `Method`, `Total_Amount`, `OrderID`) VALUES
('PAY/20231202/20', '2023-12-02 03:38:24', 'Card', 13315, 'ORD/20231202/0908/20'),
('PAY/20231204/14', '2023-12-04 06:39:30', 'Cash', 10370, 'ORD/20231204/1208/14'),
('PAY/20231204/17', '2023-12-04 06:38:30', 'Card', 4378, 'ORD/20231204/1208/17'),
('PAY/20231205/10', '2023-12-05 08:33:54', 'Card', 4322, 'ORD/20231205/1403/10'),
('PAY/20231205/12', '2023-12-05 11:48:30', 'Cash', 6350, 'ORD/20231205/1718/12'),
('PAY/20231210/13', '2023-12-10 08:33:54', 'Card', 11627, 'ORD/20231210/1403/13'),
('PAY/20231210/4', '2023-12-10 11:48:30', 'Card', 4360, 'ORD/20231210/1718/4'),
('PAY/20231210/6', '2023-12-10 02:54:23', 'Card', 7020, 'ORD/20231210/0824/6'),
('PAY/20231212/12', '2023-12-12 02:54:23', 'Card', 5690, 'ORD/20231212/0744/12'),
('PAY/20231212/19', '2023-12-12 04:54:23', 'Cash', 3408, 'ORD/20231212/1235/19'),
('PAY/20231215/3', '2023-12-15 05:12:14', 'Card', 14700, 'ORD/20231215/1042/3'),
('PAY/20231217/9', '2023-12-17 06:02:18', 'Card', 5000, 'ORD/20231217/1132/9'),
('PAY/20231221/16', '2023-12-21 12:09:32', 'Card', 3400, 'ORD/20231221/1739/16'),
('PAY/20231225/5', '2023-12-25 02:02:18', 'Cash', 8160, 'ORD/20231225/0732/5'),
('PAY/20231229/2', '2023-12-29 13:02:18', 'Card', 3208, 'ORD/20231229/1832/2'),
('PAY/20240121/7', '2024-01-20 19:03:48', 'Card', 2550, 'ORD/20240120/7'),
('PAY/20240122/1', '2024-01-22 17:39:35', 'Card', 3870, 'ORD/20240122/1806/1'),
('PAY/20240122/4', '2024-01-22 18:04:08', 'Card', 3290, 'ORD/20240122/2311/4');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` varchar(20) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Total_Quantity` int(11) NOT NULL,
  `Unit_Price` float NOT NULL,
  `Image` varchar(250) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `SupplierID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `Total_Quantity`, `Unit_Price`, `Image`, `CategoryID`, `SupplierID`) VALUES
('PRO/001', 'Bun Packet', 95, 150, 'Bun.png', 1, 'SPR/001'),
('PRO/002', 'Cake (1kg)', 25, 1500, 'cake.png', 1, 'SPR/001'),
('PRO/003', 'Miranda 1.5l', 40, 380, 'miranda.png', 2, 'SPR/004'),
('PRO/004', 'Panadol Syrup 100ml', 98, 370, 'panadol_syrup.png', 3, 'SPR/008'),
('PRO/005', 'Brinjal 1kg ', 50, 380, 'Brinjals.png', 7, 'SPR/003'),
('PRO/006', 'Siddhalepa Asamodagam Spirit 350ml', 150, 200, 'Siddhalepa Asamodagam Spirit.png', 3, 'SPR/008'),
('PRO/007', 'Pre-Packed Red Onions', 50, 560, 'Pre-Packed Red Onions.png', 7, 'SPR/007'),
('PRO/008', 'Organic Green Beans', 30, 670, 'Organic Green Beans.png', 7, 'SPR/005'),
('PRO/009', 'Pre-Packed Big Onions', 50, 630, 'Pre-Packed Big Onions.png', 7, 'SPR/007'),
('PRO/010', 'Panadol Tab 500 Mg 144S', 200, 502, 'panadol.png', 3, 'SPR/008'),
('PRO/011', 'Axe Oil 5ml', 200, 450, 'Axe Oil 5ml.png', 3, 'SPR/008'),
('PRO/012', 'New Anthonys Pre Cut Whole Chicken', 35, 1390, 'New Anthonys Pre Cut Whole Chicken.png', 4, 'SPR/005'),
('PRO/013', 'Bairaha Whole Chicken Skinless', 20, 1300, 'Bairaha Whole Chicken Skinless.png', 4, 'SPR/005'),
('PRO/014', 'Nescafe Ice Cold Coffee 180ml', 75, 130, 'Nescafe Ice Cold.png', 2, 'SPR/004'),
('PRO/015', 'Red Bull Energy Drink 250ml', 99, 870, 'Red Bull Energy Drink 250ml.png', 2, 'SPR/004'),
('PRO/016', 'Ritzbury Revello Crispies Choc 100g', 496, 400, 'Ritzbury Revello Crispies Choc 100g.png', 6, 'SPR/009'),
('PRO/017', 'Keells Rice Basmathi 1Kg (5U)', 40, 729, 'Keells Rice Basmathi 1Kg (5U).png', 6, 'SPR/009'),
('PRO/018', 'Fortune Coconut Oil 1L', 50, 1390, 'Fortune Coconut Oil 1L.png', 6, 'SPR/003'),
('PRO/019', 'Octopus', 20, 1630, 'Octopus.png', 5, 'SPR/006'),
('PRO/020', 'Scan Mineral Water 5L', 399, 440, 'Scan Mineral Water 5L.png', 2, 'SPR/004');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` varchar(10) NOT NULL,
  `StaffName` varchar(100) NOT NULL,
  `Address` text NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(150) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `Appointed_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `StaffName`, `Address`, `Gender`, `DOB`, `Email`, `ContactNo`, `Appointed_Date`) VALUES
('AD001', 'Tony Stark', 'Stark Tour', 'Male', '1970-05-29', 'stark@gmail.com', '+94771234567', '2024-01-01'),
('ST/002', 'Steve Rogers', 'Nuwara Eliya', 'Male', '1965-07-04', 'rogers@gmail.com', '+94772345678', '2024-01-10'),
('ST/003', 'Thor Odinson', 'Colombo', 'Male', '1963-10-08', 'odin@gmail.com', '+94773456789', '2024-01-10'),
('ST/004', 'Natasha Romanoff', 'Jaffna', 'Female', '1984-12-03', 'natasha@gmail.com', '+94774567890', '2024-01-10'),
('ST/005', 'Hawkeye', 'Mattara', 'Male', '1970-04-03', 'hawkeye@gmail.com', '+94775678901', '2024-01-10'),
('ST/006', 'Bruce Banner', 'Colombo', 'Male', '1969-12-18', 'banner@gmail.com', '+94776789012', '2024-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `staff_login`
--

CREATE TABLE `staff_login` (
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Register_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `STATUS` enum('0','1') NOT NULL,
  `StaffID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_login`
--

INSERT INTO `staff_login` (`UserName`, `Password`, `Register_Date`, `STATUS`, `StaffID`) VALUES
('Banner', '739d4fe59396151327a8195f011a0d92', '2024-01-22 17:37:22', '1', 'ST/006'),
('Hawkeye', '0f4e1aaabd074689b7d3ead824d1ee8e', '2024-01-22 17:36:51', '1', 'ST/005'),
('Natasha', 'e90dfb84e30edf611e326eeb04d680de', '2024-01-22 17:35:50', '1', 'ST/004'),
('Steve', '88d53497f4a92958c67c73a9f2f52df3', '2024-01-19 14:00:57', '1', 'ST/002'),
('Thor', '7db228551936f49a61c6b965886ad840', '2024-01-20 03:08:34', '1', 'ST/003'),
('TonyStark', '7ed9453ae9a92c37ee7309f84a5dbd6b', '2024-01-19 13:48:48', '1', 'AD001');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SupplierID` varchar(20) NOT NULL,
  `Supp_Name` varchar(100) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `ADDRESS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierID`, `Supp_Name`, `Email`, `ContactNo`, `ADDRESS`) VALUES
('SPR/001', 'Perera & Sons', 'pns@gmail.com', '0112234567', 'Colombo-13'),
('SPR/002', 'Caraven', 'caraven@gmail.com', '0112233445', 'Grandpass'),
('SPR/003', 'A Z EXPORT PVT LTD', 'azexport@gmail.com', '0761720120', 'No 704 , Habarakada Road, Dedigamuwa, Kaduwela, Sri Lanka.'),
('SPR/004', 'CEYLON BEVERAGE INTERNATIONAL', 'ceylonbeverage@gmail.com', '(94) 342258601', '54, Sarasavi Lane, Castle Street, Colombo 08, Sri Lanka.'),
('SPR/005', 'DEVELOPMENT INTERPLAN CEYLON LTD', 'dicl@gmail.com', '011-5739500', 'No.55/16 Vauxhall Lane Colombo 02'),
('SPR/006', 'ALEX SEAFOOD PVT LTD', 'alex@gmail.com', '(94) 31-2274842', 'NO 31/2, Dehimalwaththa Road Negombo'),
('SPR/007', 'ALWIS AGRO EXPORTS PVT LTD', 'alwis@gmai.com', '077-7845511', '37/1 Negombo Road Kurana Katunayake'),
('SPR/008', 'Roche Products Colombo (Pvt) Limited', 'roche@gmail.com', '0114 353 500', 'A. Baur And Co, No 55 Grandpass Rd, Colombo - 14'),
('SPR/009', 'ESWARAN BROTHERS EXPORTS PVT LTD', 'eswaran@gmail.com', '0113433456', 'No.104/11 Grandpass Road Colombo, Colombo, 01400 Sri Lanka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD PRIMARY KEY (`UserName`),
  ADD KEY `CusID` (`CusID`);

--
-- Indexes for table `ordertb`
--
ALTER TABLE `ordertb`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CusID` (`CusID`),
  ADD KEY `StaffID` (`StaffID`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`OrderID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `SupplierID` (`SupplierID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `staff_login`
--
ALTER TABLE `staff_login`
  ADD PRIMARY KEY (`UserName`),
  ADD KEY `StaffID` (`StaffID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SupplierID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD CONSTRAINT `customer_login_ibfk_1` FOREIGN KEY (`CusID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE;

--
-- Constraints for table `ordertb`
--
ALTER TABLE `ordertb`
  ADD CONSTRAINT `ordertb_ibfk_1` FOREIGN KEY (`CusID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `ordertb_ibfk_2` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `ordertb` (`OrderID`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `ordertb` (`OrderID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`SupplierID`) REFERENCES `supplier` (`SupplierID`);

--
-- Constraints for table `staff_login`
--
ALTER TABLE `staff_login`
  ADD CONSTRAINT `staff_login_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
