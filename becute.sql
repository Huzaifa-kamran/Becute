-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 11:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `becute`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(255) NOT NULL,
  `adminImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminName`, `adminEmail`, `adminPassword`, `adminImg`) VALUES
(1, 'Huzaifa', 'admin@gmail.com', 'huzaifa', 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `catDescription` text NOT NULL,
  `catDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `catStatus` int(11) NOT NULL,
  `catImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catID`, `catName`, `catDescription`, `catDate`, `catStatus`, `catImg`) VALUES
(7, 'Skin Care', 'All Skin Care items are available in this category. ', '2023-07-16 19:02:28', 1, 'skin-care.jpg'),
(8, 'Hair Care', 'All Hair Care Products are in this category.', '2023-07-16 19:07:20', 1, 'hair-care.jpg'),
(9, 'Perfumes', 'All fragrances are in this category.', '2023-07-16 19:10:31', 1, 'perfumes.jpg'),
(10, 'foundation category', 'oundations come in various types, each designed to cater to different skin types, coverage needs, and finishes. ', '2023-08-02 06:28:19', 1, 'foundation category.webp'),
(11, 'Earings', 'Earrings are a popular and diverse category of jewelry worn by people all over the world. They come in various styles, materials, and designs, catering to different tastes and occasions. ', '2023-08-02 06:52:15', 1, '41_270x270.webp');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `firstName`, `lastName`, `contact`, `email`, `message`, `time`) VALUES
(12, 'Hassan', 'Nadeem', '03128756478', 'hassan@gmail.com', 'Very good service.', '2023-08-04 06:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderNumber` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantityOrdered` int(11) NOT NULL,
  `priceEach` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderNumber`, `productID`, `quantityOrdered`, `priceEach`) VALUES
(4, 27, 3, 135),
(4, 28, 10, 1000),
(5, 27, 3, 135),
(5, 28, 6, 600),
(6, 33, 3, 1107),
(6, 36, 0, 0),
(7, 28, 1, 100),
(7, 37, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `customerEmail` varchar(255) NOT NULL,
  `workContact` int(14) NOT NULL,
  `contactNo` int(14) NOT NULL,
  `paymentMethod` varchar(20) NOT NULL,
  `pinCode` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `orderAmount` varchar(255) NOT NULL,
  `orderStatus` int(11) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `customerName`, `dateOfBirth`, `address`, `customerEmail`, `workContact`, `contactNo`, `paymentMethod`, `pinCode`, `remarks`, `orderAmount`, `orderStatus`, `orderDate`) VALUES
(3, 5, 'Huzaifa', '2023-07-18', 'karachi', 'huzaifa123@gmail.com', 312, 315, 'paypal', 23123, 'ok', '1135', 0, '2023-07-25 19:05:22'),
(4, 5, 'Huzaifa', '2023-06-28', 'karachi', 'huzaifa123@gmail.com', 312, 315, 'paypal', 2133, 'nothing', '1135', 1, '2023-08-04 06:52:14'),
(5, 7, 'Uzair', '2023-06-14', 'karachi', 'muzair@gmail.com', 312, 315, 'paypal', 23123, 'drfrtdxy', '735', 0, '2023-07-26 07:55:31'),
(6, 8, 'Uzair', '2023-07-11', 'America', 'uzair@gmail.com', 312, 92, 'bank transfer', 923, 'Delevery on time', '4602', 0, '2023-08-04 06:40:37'),
(7, 8, 'Babar Virat', '2021-06-16', 'Islamabad', 'babar@gmail.com', 312, 92, 'credit card', 2122, 'ok', '2497', 0, '2023-08-04 07:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `productreview`
--

CREATE TABLE `productreview` (
  `revID` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productreview`
--

INSERT INTO `productreview` (`revID`, `productID`, `userName`, `userEmail`, `comment`) VALUES
(0, 28, 'Huzaifa', 'huzaifakamranirfani@gmail.com', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `proID` int(11) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `proDesc` text NOT NULL,
  `catID` int(11) NOT NULL,
  `proStatus` int(11) NOT NULL,
  `buyPrice` int(11) NOT NULL,
  `sellPrice` int(11) NOT NULL,
  `proType` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `inStock` int(11) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`proID`, `proName`, `proDesc`, `catID`, `proStatus`, `buyPrice`, `sellPrice`, `proType`, `createdAt`, `inStock`, `img1`, `img2`) VALUES
(27, ' Bain Densité Shampoo', ' Sulfate-free shampoo for smoothing frizzy hair leaving soft healthy hair. ', 8, 1, 40, 45, 'Trending', '2023-07-18 17:52:25', 1, 'shampoo-img.jpg', 'shampoo-img2.jpg'),
(28, 'Gucci Guilti Pour Homme', 'An Aromatic Fougère, the original Gucci Guilty Pour Homme eau de toilette enters a new chapter, embodying the free spirit of a new generation of scent lovers. Individual, yet fusing together naturally', 9, 1, 90, 100, 'Trending', '2023-07-18 17:52:07', 1, 'gucci-guilty-perfume.jpg', 'gucci-guilty.jpg'),
(29, 'clean & clear daily pore cleanser', 'clean & clear daily pore cleanser', 7, 1, 125, 299, 'Featured', '2023-08-02 06:53:15', 1, '71sXAK310aL._SL1500_.jpg', '71xWiOkYpDL._AC_UF1000,1000_QL80_.jpg'),
(30, 'clean & clear morning energy ', 'clean & clear morning energy face wash', 7, 1, 160, 299, 'Featured', '2023-08-02 06:53:22', 1, '891095094niofdu099Yehchezpk.jpg', '61tgl0UK4LL.jpg'),
(31, 'Lavender lip balm', 'Lavender lip balm', 7, 1, 111, 222, 'Featured', '2023-08-02 06:53:25', 1, 'Lavenderlipbalm.webp', 'Lavenderlipbalmface_1.webp'),
(32, 'hydrating aloe vera face wash', 'hydrating aloe vera face wash', 7, 1, 350, 599, 'Featured', '2023-08-02 06:53:31', 1, 'aloe.webp', 'Aloe-front.webp'),
(33, 'vaseline baby healing gel', 'vaseline baby healing gel', 7, 1, 255, 369, 'Trending', '2023-08-02 06:53:40', 1, '1474814-305212335002-01.png.rendition.767.767.webp', '1474815-305212335002-07.png.rendition.767.767.webp'),
(34, 'best-cream-foundation', 'best-cream-foundation', 10, 1, 555, 600, 'Trending', '2023-08-02 06:53:43', 1, 'crem.jpg', 'best-cream-foundation.jpg'),
(35, 'Huda-Beauty-FauxFilter-Luminous-Matte-Foundation-Macaroon', 'Huda-Beauty-FauxFilter-Luminous-Matte-Foundation-Macaroon', 10, 1, 1200, 2333, 'Trending', '2023-08-02 06:53:47', 1, 'images (1).jfif', 'Huda-Beauty-FauxFilter-Luminous-Matte-Foundation-Macaroon.png'),
(36, 'vaseline ', 'vaseline extremely dry skin rescue', 7, 1, 399, 699, 'Trending', '2023-08-02 06:53:52', 1, '32827398-305210042223-01.png.rendition.767.767.webp', '32827445-305210042223-07.png.rendition.767.767.webp'),
(37, 'vitamin c face wash', 'vitamin c face wash', 7, 1, 500, 799, 'Trending', '2023-08-02 06:53:57', 1, '78127631-everyday-moisturization.jpg.rendition.991.741.webp', '78127631-everyday-moisturization.jpg.rendition.991.991.webp'),
(38, 'lip scrub', 'lip scrub', 7, 1, 200, 399, 'Featured', '2023-08-02 06:54:14', 1, 'Lipscrub3.webp', 'Lipscrubhand.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userContact` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `regiterAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userContact`, `userEmail`, `userPassword`, `regiterAt`) VALUES
(5, 'Huzaifa', '+92 310 9872378', 'huzaifa123@gmail.com', '11111', '2023-07-25 17:30:42'),
(6, 'Student1385900', '+92 310 2345255', 'huzaifa231@gmail.com', '1111', '2023-07-25 17:33:30'),
(7, 'Muhammad Uzair', '+92 310 9872378', 'muzair@gmail.com', 'uzair123', '2023-07-26 07:51:52'),
(8, 'Uzair', '0315 7628903', 'uzair@gmail.com', '111111', '2023-08-04 06:39:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `orderNumber` (`orderNumber`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `productreview`
--
ALTER TABLE `productreview`
  ADD PRIMARY KEY (`revID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`proID`),
  ADD KEY `fk_products_category` (`catID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `proID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`orderNumber`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`proID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `productreview`
--
ALTER TABLE `productreview`
  ADD CONSTRAINT `productreview_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`proID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`catID`) REFERENCES `categories` (`catID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
