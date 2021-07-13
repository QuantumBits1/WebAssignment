-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 15, 2020 at 02:10 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webassigndb`
--
CREATE DATABASE IF NOT EXISTS `webassigndb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `webassigndb`;

-- --------------------------------------------------------

--
-- Table structure for table `bankaccount`
--

DROP TABLE IF EXISTS `bankaccount`;
CREATE TABLE IF NOT EXISTS `bankaccount` (
  `Account_No` int(20) UNSIGNED NOT NULL,
  `Account_Name` varchar(30) NOT NULL,
  `User_ID` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`Account_No`),
  KEY `userbankaccforeign` (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankaccount`
--

INSERT INTO `bankaccount` (`Account_No`, `Account_Name`, `User_ID`) VALUES
(987654321, 'MAYBANK', 2);

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

DROP TABLE IF EXISTS `creditcard`;
CREATE TABLE IF NOT EXISTS `creditcard` (
  `Card_No` bigint(16) NOT NULL,
  `Expiry_Date` date NOT NULL,
  `CSV` int(3) NOT NULL,
  `User_ID` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`Card_No`),
  KEY `usercreditcardforeign` (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creditcard`
--

INSERT INTO `creditcard` (`Card_No`, `Expiry_Date`, `CSV`, `User_ID`) VALUES
(4321432143214321, '2020-10-01', 321, 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `Payment_ID` varchar(5) NOT NULL,
  `Payment_Date` date NOT NULL,
  `Payment_Type` int(11) NOT NULL,
  `Purchase_ID` varchar(6) NOT NULL,
  PRIMARY KEY (`Payment_ID`),
  KEY `purchasepaymentforegin` (`Purchase_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `Product_ID` varchar(6) NOT NULL,
  `Product_Name` varchar(30) NOT NULL,
  `Product_Price` varchar(30) NOT NULL,
  `Product_Photo` text,
  `Product_Desc` text,
  `Category_ID` varchar(30) NOT NULL,
  PRIMARY KEY (`Product_ID`),
  KEY `fk_constraint` (`Category_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Product_Price`, `Product_Photo`, `Product_Desc`, `Category_ID`) VALUES
('P11', 'apples', '20.00', 'User/img/apple-icon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'C02'),
('P12', 'avocado', '20.00', 'img/avocado.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'C02'),
('P13', 'durian', '50.00', 'img/durian.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'C02'),
('P14', 'grape', '15.90', 'img/grape.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'C02'),
('P15', 'kiwi', '25.50', 'img/kiwi.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'C02'),
('P16', 'mango', '12.50', 'img/mango.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'C02'),
('P17', 'orange', '16.80', 'img/orange.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'C02'),
('P18', 'strawberry', '30.00', 'img/strawberry.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'C02'),
('P19', 'watermelon', '10.00', 'img/watermelon.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'C02'),
('P20', 'cauliflower', '12.00', 'User/img', NULL, 'C01'),
('P21', 'cabbage', '10.00', 'User/img', NULL, 'C01');

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

DROP TABLE IF EXISTS `productcategory`;
CREATE TABLE IF NOT EXISTS `productcategory` (
  `Category_ID` varchar(30) NOT NULL,
  `Category_Name` varchar(30) NOT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`Category_ID`, `Category_Name`) VALUES
('C01', 'Vegetables'),
('C02', 'Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `Purchase_ID` varchar(6) NOT NULL,
  `Purchase_Date` datetime NOT NULL,
  `Total_Price` double(8,2) NOT NULL,
  `User_ID` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`Purchase_ID`),
  KEY `FOREIGN` (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetail`
--

DROP TABLE IF EXISTS `purchasedetail`;
CREATE TABLE IF NOT EXISTS `purchasedetail` (
  `Product_ID` varchar(6) NOT NULL,
  `Purchase_ID` varchar(6) NOT NULL,
  `Quantity` int(5) NOT NULL,
  PRIMARY KEY (`Product_ID`,`Purchase_ID`),
  KEY `fkconstraint2` (`Purchase_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `User_Type` varchar(6) NOT NULL DEFAULT 'User',
  `First_Name` varchar(30) DEFAULT NULL,
  `Last_Name` varchar(30) DEFAULT NULL,
  `Username` varchar(30) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone_Number` varchar(30) DEFAULT NULL,
  `Account_Status` varchar(30) NOT NULL DEFAULT 'Unsuspend',
  PRIMARY KEY (`User_ID`),
  UNIQUE KEY `username_unique` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Type`, `First_Name`, `Last_Name`, `Username`, `Email`, `Password`, `Phone_Number`, `Account_Status`) VALUES
(2, 'Admin', 'afham', 'awal', 'afham1', 'afham1@gmail.com', 'afham1', '0174272800', 'Suspend'),
(5, 'User', 'nur', 'qushairi', 'qushairi8', 'qushairi8@gmail.com', 'abc123', '0173456789', 'Suspend');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bankaccount`
--
ALTER TABLE `bankaccount`
  ADD CONSTRAINT `userbankaccforeign` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD CONSTRAINT `usercreditcardforeign` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `purchasepaymentforegin` FOREIGN KEY (`Purchase_ID`) REFERENCES `purchase` (`Purchase_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_constraint` FOREIGN KEY (`Category_ID`) REFERENCES `productcategory` (`Category_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `FOREIGN` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchasedetail`
--
ALTER TABLE `purchasedetail`
  ADD CONSTRAINT `fkconstraint1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkconstraint2` FOREIGN KEY (`Purchase_ID`) REFERENCES `purchase` (`Purchase_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
