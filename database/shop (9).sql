-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 08:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `1admin`
--

CREATE TABLE `1admin` (
  `id` int(11) NOT NULL,
  `USERNAME` varchar(150) NOT NULL,
  `PASSWORD` varchar(150) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `VERIFY_STATUS` varchar(150) NOT NULL,
  `special_id` varchar(50) NOT NULL,
  `subscription_status` varchar(50) NOT NULL,
  `sub_enddate` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `1admin`
--

INSERT INTO `1admin` (`id`, `USERNAME`, `PASSWORD`, `user_email`, `VERIFY_STATUS`, `special_id`, `subscription_status`, `sub_enddate`) VALUES
(1, 'Aniket', 'gg', 'aniketpawar0351@gmail.com', '0', '1', '', '0'),
(4, 'ty', 'ty', 'sarvesh.patil191@vit.edu', '1', '4', '1', '2021-12-10'),
(5, 'aa', 'aa', 'aniket.pawar19@vit.edu', '1', '5', '1', '2021-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `1chatbot`
--

CREATE TABLE `1chatbot` (
  `id` int(10) NOT NULL,
  `queries` varchar(350) NOT NULL,
  `replies` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `1chatbot`
--

INSERT INTO `1chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'hi|hello|hi hello|ho', 'hi my name fancy how can i help you'),
(2, 'i have question', 'please tell me your queries '),
(3, 'how are you', 'i am good what about you'),
(4, 'where are you from|where are you from?', 'i am from india'),
(5, 'h', 'hi my name is bot how can i help u');

-- --------------------------------------------------------

--
-- Table structure for table `1client_details`
--

CREATE TABLE `1client_details` (
  `cd_id` int(11) NOT NULL,
  `FULL_NAME` varchar(150) NOT NULL,
  `SHOP_NAME` varchar(150) NOT NULL,
  `SHOP_TYPE` varchar(150) NOT NULL,
  `INVOICE_LOGO` varchar(50) NOT NULL,
  `SK_ADDRESS` varchar(150) NOT NULL,
  `SHOP_ADDRESS` varchar(150) NOT NULL,
  `SK_PINCODE` int(10) NOT NULL,
  `AREA_PIN` int(10) NOT NULL,
  `EMAIL` varchar(150) NOT NULL,
  `SK_PHONE_NO` varchar(12) NOT NULL,
  `PHONE_NO` varchar(150) NOT NULL,
  `RUSERNAME` varchar(150) NOT NULL,
  `RPASSWORD` varchar(150) NOT NULL,
  `REPEAT_PASSWORD` varchar(150) NOT NULL,
  `OTP` varchar(150) NOT NULL,
  `is_expired` int(150) NOT NULL,
  `REGISTOR_DATE` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `1client_details`
--

INSERT INTO `1client_details` (`cd_id`, `FULL_NAME`, `SHOP_NAME`, `SHOP_TYPE`, `INVOICE_LOGO`, `SK_ADDRESS`, `SHOP_ADDRESS`, `SK_PINCODE`, `AREA_PIN`, `EMAIL`, `SK_PHONE_NO`, `PHONE_NO`, `RUSERNAME`, `RPASSWORD`, `REPEAT_PASSWORD`, `OTP`, `is_expired`, `REGISTOR_DATE`) VALUES
(1, 'Aniket Pawar', 'gg', '0', 'demo.jpg', '0', '0', 0, 0, 'aniketpawar0351@gmail.com', '0', '+918625981006', 'Aniket', 'gg', 'gg', '423681', 0, '2021-01-11 12:54:18'),
(4, 'sarvesh patil', 'sa', '0', 'demo.jpg', '0', '0', 0, 0, 'sarvesh.patil191@vit.edu', '862545454', '8645454545', 'ty', 'ty', 'ty', '604525', 1, '2021-06-13 08:07:35'),
(5, 'aniket pawar', 'a', '0', 'demo.jpg', '0', '0', 0, 0, 'aniket.pawar19@vit.edu', '0', '8625981006', 'aa', 'aa', 'aa', '515840', 1, '2021-06-13 12:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `1subscription_details`
--

CREATE TABLE `1subscription_details` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(150) NOT NULL,
  `sub_email` varchar(150) NOT NULL,
  `sub_purpose` varchar(150) NOT NULL,
  `sub_amount` varchar(150) NOT NULL,
  `sub_special_id` varchar(150) NOT NULL,
  `sub_status` int(10) NOT NULL,
  `sub_mobile_no` varchar(150) NOT NULL,
  `sub_startdate` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `1subscription_details`
--

INSERT INTO `1subscription_details` (`sub_id`, `sub_name`, `sub_email`, `sub_purpose`, `sub_amount`, `sub_special_id`, `sub_status`, `sub_mobile_no`, `sub_startdate`) VALUES
(1, 'aniket pawar', 'aniket.pawar19@vit.edu', 'Shop easy subscription', '200', '2', 1, '+918625981006', '2021-03-19'),
(3, 'sarvesh patil', 'sarvesh.patil191@vit.edu', 'Shop easy subscription', '120', '4', 1, '757575757575', '2021-06-13'),
(4, 'aniket pawar', 'aniket.pawar19@vit.edu', 'Shop easy subscription', '120', '5', 1, '8625981006', '2021-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `2attendence`
--

CREATE TABLE `2attendence` (
  `a_id` int(11) NOT NULL,
  `a_date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `2attendence`
--

INSERT INTO `2attendence` (`a_id`, `a_date`) VALUES
(1, '2021-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `2borrow`
--

CREATE TABLE `2borrow` (
  `BID` int(11) NOT NULL,
  `BCUSTOMER_NAME` varchar(300) NOT NULL,
  `BDATE` varchar(300) NOT NULL,
  `BPRODUCTS` varchar(70) NOT NULL,
  `BTOTALBILL_AMOUNT` varchar(70) NOT NULL,
  `BGAIN_AMOUNT` varchar(70) NOT NULL,
  `BBORROWING_REASON` varchar(70) NOT NULL,
  `bmobile_no` varchar(70) NOT NULL,
  `BBORROWING_AMOUNT` varchar(70) NOT NULL,
  `last_update_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `2borrow`
--

INSERT INTO `2borrow` (`BID`, `BCUSTOMER_NAME`, `BDATE`, `BPRODUCTS`, `BTOTALBILL_AMOUNT`, `BGAIN_AMOUNT`, `BBORROWING_REASON`, `bmobile_no`, `BBORROWING_AMOUNT`, `last_update_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `2customer_bill_info`
--

CREATE TABLE `2customer_bill_info` (
  `c_id` int(11) NOT NULL,
  `customer_name` varchar(300) NOT NULL,
  `customer_mobile_no` varchar(300) NOT NULL,
  `customer_address` varchar(70) NOT NULL,
  `ctotal_discount` varchar(70) NOT NULL,
  `ctotal_tax` varchar(70) NOT NULL,
  `ctotal` varchar(70) NOT NULL,
  `grand_total` varchar(70) NOT NULL,
  `cdate` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `2customer_bill_info`
--

INSERT INTO `2customer_bill_info` (`c_id`, `customer_name`, `customer_mobile_no`, `customer_address`, `ctotal_discount`, `ctotal_tax`, `ctotal`, `grand_total`, `cdate`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `2employ_data`
--

CREATE TABLE `2employ_data` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(300) NOT NULL,
  `e_email` varchar(300) NOT NULL,
  `e_phone` varchar(70) NOT NULL,
  `e_type` varchar(70) NOT NULL,
  `e_salary` varchar(70) NOT NULL,
  `e_address` varchar(70) NOT NULL,
  `e_img` varchar(70) NOT NULL,
  `e_gender` varchar(70) NOT NULL,
  `e_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `2employ_data`
--

INSERT INTO `2employ_data` (`e_id`, `e_name`, `e_email`, `e_phone`, `e_type`, `e_salary`, `e_address`, `e_img`, `e_gender`, `e_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `2out_products_data`
--

CREATE TABLE `2out_products_data` (
  `out_id` int(11) NOT NULL,
  `out_product_name` varchar(30) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `out_product_quantity` varchar(70) NOT NULL,
  `out_product_price` varchar(70) NOT NULL,
  `out_product_discount` varchar(70) NOT NULL,
  `out_product_discount_value` varchar(70) NOT NULL,
  `out_product_tax` varchar(70) NOT NULL,
  `out_product_tax_value` varchar(70) NOT NULL,
  `out_total` varchar(70) NOT NULL,
  `out_product_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `2out_products_data`
--

INSERT INTO `2out_products_data` (`out_id`, `out_product_name`, `product_id`, `out_product_quantity`, `out_product_price`, `out_product_discount`, `out_product_discount_value`, `out_product_tax`, `out_product_tax_value`, `out_total`, `out_product_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `2product`
--

CREATE TABLE `2product` (
  `PID` int(11) NOT NULL,
  `PPRODUCT_NAME` varchar(300) NOT NULL,
  `PPRODUCT_IMG` varchar(300) NOT NULL,
  `PPRODUCT_PRICE` varchar(70) NOT NULL,
  `PPRODUCT_DESCRIPTION` varchar(300) NOT NULL,
  `PLAST_STOCK_UPDATE` varchar(70) NOT NULL,
  `PSTOCK` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `2product`
--

INSERT INTO `2product` (`PID`, `PPRODUCT_NAME`, `PPRODUCT_IMG`, `PPRODUCT_PRICE`, `PPRODUCT_DESCRIPTION`, `PLAST_STOCK_UPDATE`, `PSTOCK`) VALUES
(1, '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `2supplier`
--

CREATE TABLE `2supplier` (
  `su_id` int(11) NOT NULL,
  `su_name` varchar(300) NOT NULL,
  `su_party_name` varchar(300) NOT NULL,
  `bank_name` varchar(70) NOT NULL,
  `bank_account_no` varchar(70) NOT NULL,
  `bank_ifsc` varchar(70) NOT NULL,
  `su_email` varchar(70) NOT NULL,
  `su_phone` varchar(70) NOT NULL,
  `su_address` varchar(70) NOT NULL,
  `su_products` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `2supplier`
--

INSERT INTO `2supplier` (`su_id`, `su_name`, `su_party_name`, `bank_name`, `bank_account_no`, `bank_ifsc`, `su_email`, `su_phone`, `su_address`, `su_products`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `2supply_entry`
--

CREATE TABLE `2supply_entry` (
  `supply_id` int(11) NOT NULL,
  `supplier_name` varchar(300) NOT NULL,
  `supplier_phone` varchar(300) NOT NULL,
  `party_name` varchar(70) NOT NULL,
  `products_name` varchar(70) NOT NULL,
  `product_quantity` varchar(70) NOT NULL,
  `total_bill_amount` varchar(70) NOT NULL,
  `paid_amount` varchar(70) NOT NULL,
  `repaid_amount` varchar(70) NOT NULL,
  `entry_date` varchar(70) NOT NULL,
  `entry_update_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `2supply_entry`
--

INSERT INTO `2supply_entry` (`supply_id`, `supplier_name`, `supplier_phone`, `party_name`, `products_name`, `product_quantity`, `total_bill_amount`, `paid_amount`, `repaid_amount`, `entry_date`, `entry_update_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `2supply_history`
--

CREATE TABLE `2supply_history` (
  `h_id` int(11) NOT NULL,
  `hsupplier_name` varchar(300) NOT NULL,
  `hparty_name` varchar(300) NOT NULL,
  `hproducts_name` varchar(70) NOT NULL,
  `hproduct_quantity` varchar(70) NOT NULL,
  `htotal_bill_amount` varchar(70) NOT NULL,
  `hpaid_bill_amount` varchar(70) NOT NULL,
  `hrepaid_amount` varchar(70) NOT NULL,
  `hentry_date` varchar(70) NOT NULL,
  `hentry_update_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `2supply_history`
--

INSERT INTO `2supply_history` (`h_id`, `hsupplier_name`, `hparty_name`, `hproducts_name`, `hproduct_quantity`, `htotal_bill_amount`, `hpaid_bill_amount`, `hrepaid_amount`, `hentry_date`, `hentry_update_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `3attendence`
--

CREATE TABLE `3attendence` (
  `a_id` int(11) NOT NULL,
  `a_date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `3attendence`
--

INSERT INTO `3attendence` (`a_id`, `a_date`) VALUES
(1, '2021-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `3borrow`
--

CREATE TABLE `3borrow` (
  `BID` int(11) NOT NULL,
  `BCUSTOMER_NAME` varchar(300) NOT NULL,
  `BDATE` varchar(300) NOT NULL,
  `BPRODUCTS` varchar(70) NOT NULL,
  `BTOTALBILL_AMOUNT` varchar(70) NOT NULL,
  `BGAIN_AMOUNT` varchar(70) NOT NULL,
  `BBORROWING_REASON` varchar(70) NOT NULL,
  `bmobile_no` varchar(70) NOT NULL,
  `BBORROWING_AMOUNT` varchar(70) NOT NULL,
  `last_update_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `3borrow`
--

INSERT INTO `3borrow` (`BID`, `BCUSTOMER_NAME`, `BDATE`, `BPRODUCTS`, `BTOTALBILL_AMOUNT`, `BGAIN_AMOUNT`, `BBORROWING_REASON`, `bmobile_no`, `BBORROWING_AMOUNT`, `last_update_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `3customer_bill_info`
--

CREATE TABLE `3customer_bill_info` (
  `c_id` int(11) NOT NULL,
  `customer_name` varchar(300) NOT NULL,
  `customer_mobile_no` varchar(300) NOT NULL,
  `customer_address` varchar(70) NOT NULL,
  `ctotal_discount` varchar(70) NOT NULL,
  `ctotal_tax` varchar(70) NOT NULL,
  `ctotal` varchar(70) NOT NULL,
  `grand_total` varchar(70) NOT NULL,
  `cdate` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `3customer_bill_info`
--

INSERT INTO `3customer_bill_info` (`c_id`, `customer_name`, `customer_mobile_no`, `customer_address`, `ctotal_discount`, `ctotal_tax`, `ctotal`, `grand_total`, `cdate`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 'aniket pawar', '+918625981006', 'Manegaon vaijapur Aurangabad', '5000', '0', '50000', '45000', '2021-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `3employ_data`
--

CREATE TABLE `3employ_data` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(300) NOT NULL,
  `e_email` varchar(300) NOT NULL,
  `e_phone` varchar(70) NOT NULL,
  `e_type` varchar(70) NOT NULL,
  `e_salary` varchar(70) NOT NULL,
  `e_address` varchar(70) NOT NULL,
  `e_img` varchar(70) NOT NULL,
  `e_gender` varchar(70) NOT NULL,
  `e_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `3employ_data`
--

INSERT INTO `3employ_data` (`e_id`, `e_name`, `e_email`, `e_phone`, `e_type`, `e_salary`, `e_address`, `e_img`, `e_gender`, `e_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `3out_products`
--

CREATE TABLE `3out_products` (
  `out_id` int(11) NOT NULL,
  `out_product_name` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `out_product_quantity` varchar(30) NOT NULL,
  `out_product_price` varchar(50) NOT NULL,
  `out_product_discount` varchar(50) NOT NULL,
  `out_product_discount_value` varchar(50) NOT NULL,
  `out_product_tax` varchar(50) NOT NULL,
  `out_product_tax_value` varchar(50) NOT NULL,
  `out_total` varchar(50) NOT NULL,
  `out_product_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `3out_products`
--

INSERT INTO `3out_products` (`out_id`, `out_product_name`, `product_id`, `out_product_quantity`, `out_product_price`, `out_product_discount`, `out_product_discount_value`, `out_product_tax`, `out_product_tax_value`, `out_total`, `out_product_date`) VALUES
(1, 'd', '1', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd'),
(3, 'light', '2', '50', '500', '10', '2500', '0', '0', '25000', '2021-04-06'),
(4, 'fan', '3', '50', '500', '10', '2500', '0', '0', '25000', '2021-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `3out_products_data`
--

CREATE TABLE `3out_products_data` (
  `out_id` int(11) NOT NULL,
  `out_product_name` varchar(30) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `out_product_quantity` varchar(70) NOT NULL,
  `out_product_price` varchar(70) NOT NULL,
  `out_product_discount` varchar(70) NOT NULL,
  `out_product_discount_value` varchar(70) NOT NULL,
  `out_product_tax` varchar(70) NOT NULL,
  `out_product_tax_value` varchar(70) NOT NULL,
  `out_total` varchar(70) NOT NULL,
  `out_product_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `3out_products_data`
--

INSERT INTO `3out_products_data` (`out_id`, `out_product_name`, `product_id`, `out_product_quantity`, `out_product_price`, `out_product_discount`, `out_product_discount_value`, `out_product_tax`, `out_product_tax_value`, `out_total`, `out_product_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 'light', '2', '50', '500', '10', '2500', '0', '0', '25000', '2021-04-06'),
(3, 'fan', '3', '50', '500', '10', '2500', '0', '0', '25000', '2021-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `3product`
--

CREATE TABLE `3product` (
  `PID` int(11) NOT NULL,
  `PPRODUCT_NAME` varchar(300) NOT NULL,
  `PPRODUCT_IMG` varchar(300) NOT NULL,
  `PPRODUCT_PRICE` varchar(70) NOT NULL,
  `PPRODUCT_DESCRIPTION` varchar(300) NOT NULL,
  `PLAST_STOCK_UPDATE` varchar(70) NOT NULL,
  `PSTOCK` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `3product`
--

INSERT INTO `3product` (`PID`, `PPRODUCT_NAME`, `PPRODUCT_IMG`, `PPRODUCT_PRICE`, `PPRODUCT_DESCRIPTION`, `PLAST_STOCK_UPDATE`, `PSTOCK`) VALUES
(1, '1', '1', '1', '1', '1', '1'),
(2, 'light', 'IMG-20210304-WA0000.jpg', '500', 'best p', '2021-04-06', '100'),
(3, 'fan', 'gg.jpg', '500', 'best p', '2021-04-06', '50'),
(4, 'hh', 'ff.jpg', '500', 'best p', '2021-06-02', '5'),
(5, 'light', 'ff23.jpg', '500', 'best p', '2021-06-02', '500');

-- --------------------------------------------------------

--
-- Table structure for table `3supplier`
--

CREATE TABLE `3supplier` (
  `su_id` int(11) NOT NULL,
  `su_name` varchar(300) NOT NULL,
  `su_party_name` varchar(300) NOT NULL,
  `bank_name` varchar(70) NOT NULL,
  `bank_account_no` varchar(70) NOT NULL,
  `bank_ifsc` varchar(70) NOT NULL,
  `su_email` varchar(70) NOT NULL,
  `su_phone` varchar(70) NOT NULL,
  `su_address` varchar(70) NOT NULL,
  `su_products` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `3supplier`
--

INSERT INTO `3supplier` (`su_id`, `su_name`, `su_party_name`, `bank_name`, `bank_account_no`, `bank_ifsc`, `su_email`, `su_phone`, `su_address`, `su_products`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `3supply_entry`
--

CREATE TABLE `3supply_entry` (
  `supply_id` int(11) NOT NULL,
  `supplier_name` varchar(300) NOT NULL,
  `supplier_phone` varchar(300) NOT NULL,
  `party_name` varchar(70) NOT NULL,
  `products_name` varchar(70) NOT NULL,
  `product_quantity` varchar(70) NOT NULL,
  `total_bill_amount` varchar(70) NOT NULL,
  `paid_amount` varchar(70) NOT NULL,
  `repaid_amount` varchar(70) NOT NULL,
  `entry_date` varchar(70) NOT NULL,
  `entry_update_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `3supply_entry`
--

INSERT INTO `3supply_entry` (`supply_id`, `supplier_name`, `supplier_phone`, `party_name`, `products_name`, `product_quantity`, `total_bill_amount`, `paid_amount`, `repaid_amount`, `entry_date`, `entry_update_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `3supply_history`
--

CREATE TABLE `3supply_history` (
  `h_id` int(11) NOT NULL,
  `hsupplier_name` varchar(300) NOT NULL,
  `hparty_name` varchar(300) NOT NULL,
  `hproducts_name` varchar(70) NOT NULL,
  `hproduct_quantity` varchar(70) NOT NULL,
  `htotal_bill_amount` varchar(70) NOT NULL,
  `hpaid_bill_amount` varchar(70) NOT NULL,
  `hrepaid_amount` varchar(70) NOT NULL,
  `hentry_date` varchar(70) NOT NULL,
  `hentry_update_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `3supply_history`
--

INSERT INTO `3supply_history` (`h_id`, `hsupplier_name`, `hparty_name`, `hproducts_name`, `hproduct_quantity`, `htotal_bill_amount`, `hpaid_bill_amount`, `hrepaid_amount`, `hentry_date`, `hentry_update_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `4attendence`
--

CREATE TABLE `4attendence` (
  `a_id` int(11) NOT NULL,
  `a_date` varchar(300) NOT NULL,
  `dhawal` varchar(100) NOT NULL,
  `himansu` varchar(100) NOT NULL,
  `sarvesh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `4attendence`
--

INSERT INTO `4attendence` (`a_id`, `a_date`, `dhawal`, `himansu`, `sarvesh`) VALUES
(1, '2021-06-09', 'A', 'P', 'P'),
(2, '2021-06-11', 'P', 'P', 'P'),
(3, '2021-06-12', 'P', 'A', 'P'),
(4, '2021-06-13', 'P', 'P', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `4borrow`
--

CREATE TABLE `4borrow` (
  `BID` int(11) NOT NULL,
  `BCUSTOMER_NAME` varchar(300) NOT NULL,
  `BDATE` varchar(300) NOT NULL,
  `BPRODUCTS` varchar(70) NOT NULL,
  `BTOTALBILL_AMOUNT` varchar(70) NOT NULL,
  `BGAIN_AMOUNT` varchar(70) NOT NULL,
  `BBORROWING_REASON` varchar(70) NOT NULL,
  `bmobile_no` varchar(70) NOT NULL,
  `BBORROWING_AMOUNT` varchar(70) NOT NULL,
  `last_update_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `4borrow`
--

INSERT INTO `4borrow` (`BID`, `BCUSTOMER_NAME`, `BDATE`, `BPRODUCTS`, `BTOTALBILL_AMOUNT`, `BGAIN_AMOUNT`, `BBORROWING_REASON`, `bmobile_no`, `BBORROWING_AMOUNT`, `last_update_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 'sarvesh patil', '2021-06-13T13:46', 'motor', '10000', '5000', 'null', '4598786532', '5000', '2021-06-13'),
(3, 'himanshu pawar', '2021-06-13T13:49', 'tv', '50000', '20000', 'null', '7456123649', '30000', '2021-06-13'),
(4, 'dhawad pavanakar', '2021-06-13T13:50', 'mobile', '10000', '5000', 'null', '12326545988', '5000', '2021-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `4customer_bill_info`
--

CREATE TABLE `4customer_bill_info` (
  `c_id` int(11) NOT NULL,
  `customer_name` varchar(300) NOT NULL,
  `customer_mobile_no` varchar(300) NOT NULL,
  `customer_address` varchar(70) NOT NULL,
  `ctotal_discount` varchar(70) NOT NULL,
  `ctotal_tax` varchar(70) NOT NULL,
  `ctotal` varchar(70) NOT NULL,
  `grand_total` varchar(70) NOT NULL,
  `cdate` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `4customer_bill_info`
--

INSERT INTO `4customer_bill_info` (`c_id`, `customer_name`, `customer_mobile_no`, `customer_address`, `ctotal_discount`, `ctotal_tax`, `ctotal`, `grand_total`, `cdate`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 'sarvesh patil', '785445454', 'manegaon vaijapur aurangabad maharastra india', '40', '0', '400', '360', '2021-06-13'),
(3, 'aniket pawar', '8625981006', 'manegaon vaijapur aurangabad maharastra india', '27913.75', '138.75', '280525', '252750', '2021-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `4employ_data`
--

CREATE TABLE `4employ_data` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(300) NOT NULL,
  `e_email` varchar(300) NOT NULL,
  `e_phone` varchar(70) NOT NULL,
  `e_type` varchar(70) NOT NULL,
  `e_salary` varchar(70) NOT NULL,
  `e_address` varchar(70) NOT NULL,
  `e_img` varchar(70) NOT NULL,
  `e_gender` varchar(70) NOT NULL,
  `e_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `4employ_data`
--

INSERT INTO `4employ_data` (`e_id`, `e_name`, `e_email`, `e_phone`, `e_type`, `e_salary`, `e_address`, `e_img`, `e_gender`, `e_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 'sarvesh', 'sarvesh@gmail.com', '789456123', 'worker', '40000', 'manegaon vaijapur aurangabad maharastra india', 'light.jpg', 'Mr', '2021-06-13'),
(3, 'himansu', 'himanshu@gmail.com', '7898654521', 'worker', '40000', 'manegaon vaijapur aurangabad maharastra india', 'fan.jpg', 'Mr', '2021-06-13'),
(4, 'dhawal', 'dhawal@gmail.com', '7898654521', 'worker', '70000', 'manegaon vaijapur aurangabad maharastra india', 'motor5.jpg', 'Mr', '2021-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `4out_products`
--

CREATE TABLE `4out_products` (
  `out_id` int(11) NOT NULL,
  `out_product_name` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `out_product_quantity` varchar(30) NOT NULL,
  `out_product_price` varchar(50) NOT NULL,
  `out_product_discount` varchar(50) NOT NULL,
  `out_product_discount_value` varchar(50) NOT NULL,
  `out_product_tax` varchar(50) NOT NULL,
  `out_product_tax_value` varchar(50) NOT NULL,
  `out_total` varchar(50) NOT NULL,
  `out_product_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `4out_products`
--

INSERT INTO `4out_products` (`out_id`, `out_product_name`, `product_id`, `out_product_quantity`, `out_product_price`, `out_product_discount`, `out_product_discount_value`, `out_product_tax`, `out_product_tax_value`, `out_total`, `out_product_date`) VALUES
(1, 'd', '1', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd'),
(3, 'fan', '2', '50', '5555', '10', '27775', '0', '0', '277750', '2021-06-13'),
(4, 'motor', '3', '555', '5', '5', '138.75', '5', '138.75', '2775', '2021-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `4out_products_data`
--

CREATE TABLE `4out_products_data` (
  `out_id` int(11) NOT NULL,
  `out_product_name` varchar(30) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `out_product_quantity` varchar(70) NOT NULL,
  `out_product_price` varchar(70) NOT NULL,
  `out_product_discount` varchar(70) NOT NULL,
  `out_product_discount_value` varchar(70) NOT NULL,
  `out_product_tax` varchar(70) NOT NULL,
  `out_product_tax_value` varchar(70) NOT NULL,
  `out_total` varchar(70) NOT NULL,
  `out_product_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `4out_products_data`
--

INSERT INTO `4out_products_data` (`out_id`, `out_product_name`, `product_id`, `out_product_quantity`, `out_product_price`, `out_product_discount`, `out_product_discount_value`, `out_product_tax`, `out_product_tax_value`, `out_total`, `out_product_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 'fan', '2', '2', '200', '10', '40', '0', '0', '400', '2021-06-13'),
(3, 'fan', '2', '50', '5555', '10', '27775', '0', '0', '277750', '2021-06-13'),
(4, 'motor', '3', '555', '5', '5', '138.75', '5', '138.75', '2775', '2021-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `4product`
--

CREATE TABLE `4product` (
  `PID` int(11) NOT NULL,
  `PPRODUCT_NAME` varchar(300) NOT NULL,
  `PPRODUCT_IMG` varchar(300) NOT NULL,
  `PPRODUCT_PRICE` varchar(70) NOT NULL,
  `PPRODUCT_DESCRIPTION` varchar(300) NOT NULL,
  `PLAST_STOCK_UPDATE` varchar(70) NOT NULL,
  `PSTOCK` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `4product`
--

INSERT INTO `4product` (`PID`, `PPRODUCT_NAME`, `PPRODUCT_IMG`, `PPRODUCT_PRICE`, `PPRODUCT_DESCRIPTION`, `PLAST_STOCK_UPDATE`, `PSTOCK`) VALUES
(1, '1', '1', '1', '1', '1', '1'),
(2, 'fan', 'fan.jpg', '500', 'gg', '2021-06-13', '50'),
(3, 'tester', 'tester.jpg', '50', 'goood product', '2021-06-13', '-535'),
(4, 'motor', 'motor5.jpg', '5000', 'good', '2021-06-13', '45'),
(6, 'motor3', 'motor.jpg', '6000', 'nice one', '2021-06-13', '50');

-- --------------------------------------------------------

--
-- Table structure for table `4supplier`
--

CREATE TABLE `4supplier` (
  `su_id` int(11) NOT NULL,
  `su_name` varchar(300) NOT NULL,
  `su_party_name` varchar(300) NOT NULL,
  `bank_name` varchar(70) NOT NULL,
  `bank_account_no` varchar(70) NOT NULL,
  `bank_ifsc` varchar(70) NOT NULL,
  `su_email` varchar(70) NOT NULL,
  `su_phone` varchar(70) NOT NULL,
  `su_address` varchar(70) NOT NULL,
  `su_products` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `4supplier`
--

INSERT INTO `4supplier` (`su_id`, `su_name`, `su_party_name`, `bank_name`, `bank_account_no`, `bank_ifsc`, `su_email`, `su_phone`, `su_address`, `su_products`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `4supply_entry`
--

CREATE TABLE `4supply_entry` (
  `supply_id` int(11) NOT NULL,
  `supplier_name` varchar(300) NOT NULL,
  `supplier_phone` varchar(300) NOT NULL,
  `party_name` varchar(70) NOT NULL,
  `products_name` varchar(70) NOT NULL,
  `product_quantity` varchar(70) NOT NULL,
  `total_bill_amount` varchar(70) NOT NULL,
  `paid_amount` varchar(70) NOT NULL,
  `repaid_amount` varchar(70) NOT NULL,
  `entry_date` varchar(70) NOT NULL,
  `entry_update_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `4supply_entry`
--

INSERT INTO `4supply_entry` (`supply_id`, `supplier_name`, `supplier_phone`, `party_name`, `products_name`, `product_quantity`, `total_bill_amount`, `paid_amount`, `repaid_amount`, `entry_date`, `entry_update_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `4supply_history`
--

CREATE TABLE `4supply_history` (
  `h_id` int(11) NOT NULL,
  `hsupplier_name` varchar(300) NOT NULL,
  `hparty_name` varchar(300) NOT NULL,
  `hproducts_name` varchar(70) NOT NULL,
  `hproduct_quantity` varchar(70) NOT NULL,
  `htotal_bill_amount` varchar(70) NOT NULL,
  `hpaid_bill_amount` varchar(70) NOT NULL,
  `hrepaid_amount` varchar(70) NOT NULL,
  `hentry_date` varchar(70) NOT NULL,
  `hentry_update_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `4supply_history`
--

INSERT INTO `4supply_history` (`h_id`, `hsupplier_name`, `hparty_name`, `hproducts_name`, `hproduct_quantity`, `htotal_bill_amount`, `hpaid_bill_amount`, `hrepaid_amount`, `hentry_date`, `hentry_update_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 'sarvesh', 'amul', 'fg', '55', '50000', '40000', '10000', '2021-06-13T13:43', '2021-06-13'),
(3, 'sarvesh', 'amul', 'fg', '55', '50000', '50000', '0', '2021-06-13T13:43', '2021-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `5attendence`
--

CREATE TABLE `5attendence` (
  `a_id` int(11) NOT NULL,
  `a_date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `5attendence`
--

INSERT INTO `5attendence` (`a_id`, `a_date`) VALUES
(1, '2021-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `5borrow`
--

CREATE TABLE `5borrow` (
  `BID` int(11) NOT NULL,
  `BCUSTOMER_NAME` varchar(300) NOT NULL,
  `BDATE` varchar(300) NOT NULL,
  `BPRODUCTS` varchar(70) NOT NULL,
  `BTOTALBILL_AMOUNT` varchar(70) NOT NULL,
  `BGAIN_AMOUNT` varchar(70) NOT NULL,
  `BBORROWING_REASON` varchar(70) NOT NULL,
  `bmobile_no` varchar(70) NOT NULL,
  `BBORROWING_AMOUNT` varchar(70) NOT NULL,
  `last_update_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `5borrow`
--

INSERT INTO `5borrow` (`BID`, `BCUSTOMER_NAME`, `BDATE`, `BPRODUCTS`, `BTOTALBILL_AMOUNT`, `BGAIN_AMOUNT`, `BBORROWING_REASON`, `bmobile_no`, `BBORROWING_AMOUNT`, `last_update_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `5customer_bill_info`
--

CREATE TABLE `5customer_bill_info` (
  `c_id` int(11) NOT NULL,
  `customer_name` varchar(300) NOT NULL,
  `customer_mobile_no` varchar(300) NOT NULL,
  `customer_address` varchar(70) NOT NULL,
  `ctotal_discount` varchar(70) NOT NULL,
  `ctotal_tax` varchar(70) NOT NULL,
  `ctotal` varchar(70) NOT NULL,
  `grand_total` varchar(70) NOT NULL,
  `cdate` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `5customer_bill_info`
--

INSERT INTO `5customer_bill_info` (`c_id`, `customer_name`, `customer_mobile_no`, `customer_address`, `ctotal_discount`, `ctotal_tax`, `ctotal`, `grand_total`, `cdate`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `5employ_data`
--

CREATE TABLE `5employ_data` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(300) NOT NULL,
  `e_email` varchar(300) NOT NULL,
  `e_phone` varchar(70) NOT NULL,
  `e_type` varchar(70) NOT NULL,
  `e_salary` varchar(70) NOT NULL,
  `e_address` varchar(70) NOT NULL,
  `e_img` varchar(70) NOT NULL,
  `e_gender` varchar(70) NOT NULL,
  `e_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `5employ_data`
--

INSERT INTO `5employ_data` (`e_id`, `e_name`, `e_email`, `e_phone`, `e_type`, `e_salary`, `e_address`, `e_img`, `e_gender`, `e_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `5out_products_data`
--

CREATE TABLE `5out_products_data` (
  `out_id` int(11) NOT NULL,
  `out_product_name` varchar(30) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `out_product_quantity` varchar(70) NOT NULL,
  `out_product_price` varchar(70) NOT NULL,
  `out_product_discount` varchar(70) NOT NULL,
  `out_product_discount_value` varchar(70) NOT NULL,
  `out_product_tax` varchar(70) NOT NULL,
  `out_product_tax_value` varchar(70) NOT NULL,
  `out_total` varchar(70) NOT NULL,
  `out_product_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `5out_products_data`
--

INSERT INTO `5out_products_data` (`out_id`, `out_product_name`, `product_id`, `out_product_quantity`, `out_product_price`, `out_product_discount`, `out_product_discount_value`, `out_product_tax`, `out_product_tax_value`, `out_total`, `out_product_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `5product`
--

CREATE TABLE `5product` (
  `PID` int(11) NOT NULL,
  `PPRODUCT_NAME` varchar(300) NOT NULL,
  `PPRODUCT_IMG` varchar(300) NOT NULL,
  `PPRODUCT_PRICE` varchar(70) NOT NULL,
  `PPRODUCT_DESCRIPTION` varchar(300) NOT NULL,
  `PLAST_STOCK_UPDATE` varchar(70) NOT NULL,
  `PSTOCK` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `5product`
--

INSERT INTO `5product` (`PID`, `PPRODUCT_NAME`, `PPRODUCT_IMG`, `PPRODUCT_PRICE`, `PPRODUCT_DESCRIPTION`, `PLAST_STOCK_UPDATE`, `PSTOCK`) VALUES
(1, '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `5supplier`
--

CREATE TABLE `5supplier` (
  `su_id` int(11) NOT NULL,
  `su_name` varchar(300) NOT NULL,
  `su_party_name` varchar(300) NOT NULL,
  `bank_name` varchar(70) NOT NULL,
  `bank_account_no` varchar(70) NOT NULL,
  `bank_ifsc` varchar(70) NOT NULL,
  `su_email` varchar(70) NOT NULL,
  `su_phone` varchar(70) NOT NULL,
  `su_address` varchar(70) NOT NULL,
  `su_products` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `5supplier`
--

INSERT INTO `5supplier` (`su_id`, `su_name`, `su_party_name`, `bank_name`, `bank_account_no`, `bank_ifsc`, `su_email`, `su_phone`, `su_address`, `su_products`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `5supply_entry`
--

CREATE TABLE `5supply_entry` (
  `supply_id` int(11) NOT NULL,
  `supplier_name` varchar(300) NOT NULL,
  `supplier_phone` varchar(300) NOT NULL,
  `party_name` varchar(70) NOT NULL,
  `products_name` varchar(70) NOT NULL,
  `product_quantity` varchar(70) NOT NULL,
  `total_bill_amount` varchar(70) NOT NULL,
  `paid_amount` varchar(70) NOT NULL,
  `repaid_amount` varchar(70) NOT NULL,
  `entry_date` varchar(70) NOT NULL,
  `entry_update_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `5supply_entry`
--

INSERT INTO `5supply_entry` (`supply_id`, `supplier_name`, `supplier_phone`, `party_name`, `products_name`, `product_quantity`, `total_bill_amount`, `paid_amount`, `repaid_amount`, `entry_date`, `entry_update_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `5supply_history`
--

CREATE TABLE `5supply_history` (
  `h_id` int(11) NOT NULL,
  `hsupplier_name` varchar(300) NOT NULL,
  `hparty_name` varchar(300) NOT NULL,
  `hproducts_name` varchar(70) NOT NULL,
  `hproduct_quantity` varchar(70) NOT NULL,
  `htotal_bill_amount` varchar(70) NOT NULL,
  `hpaid_bill_amount` varchar(70) NOT NULL,
  `hrepaid_amount` varchar(70) NOT NULL,
  `hentry_date` varchar(70) NOT NULL,
  `hentry_update_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `5supply_history`
--

INSERT INTO `5supply_history` (`h_id`, `hsupplier_name`, `hparty_name`, `hproducts_name`, `hproduct_quantity`, `htotal_bill_amount`, `hpaid_bill_amount`, `hrepaid_amount`, `hentry_date`, `hentry_update_date`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `out_products`
--

CREATE TABLE `out_products` (
  `out_id` int(11) NOT NULL,
  `out_product_name` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `out_product_quantity` varchar(30) NOT NULL,
  `out_product_price` varchar(50) NOT NULL,
  `out_product_discount` varchar(50) NOT NULL,
  `out_product_discount_value` varchar(50) NOT NULL,
  `out_product_tax` varchar(50) NOT NULL,
  `out_product_tax_value` varchar(50) NOT NULL,
  `out_total` varchar(50) NOT NULL,
  `out_product_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `out_products`
--

INSERT INTO `out_products` (`out_id`, `out_product_name`, `product_id`, `out_product_quantity`, `out_product_price`, `out_product_discount`, `out_product_discount_value`, `out_product_tax`, `out_product_tax_value`, `out_total`, `out_product_date`) VALUES
(1, 'd', '1', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1admin`
--
ALTER TABLE `1admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `1chatbot`
--
ALTER TABLE `1chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `1client_details`
--
ALTER TABLE `1client_details`
  ADD PRIMARY KEY (`cd_id`);

--
-- Indexes for table `1subscription_details`
--
ALTER TABLE `1subscription_details`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `2attendence`
--
ALTER TABLE `2attendence`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `2borrow`
--
ALTER TABLE `2borrow`
  ADD PRIMARY KEY (`BID`);

--
-- Indexes for table `2customer_bill_info`
--
ALTER TABLE `2customer_bill_info`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `2employ_data`
--
ALTER TABLE `2employ_data`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `2out_products_data`
--
ALTER TABLE `2out_products_data`
  ADD PRIMARY KEY (`out_id`);

--
-- Indexes for table `2product`
--
ALTER TABLE `2product`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `2supplier`
--
ALTER TABLE `2supplier`
  ADD PRIMARY KEY (`su_id`);

--
-- Indexes for table `2supply_entry`
--
ALTER TABLE `2supply_entry`
  ADD PRIMARY KEY (`supply_id`);

--
-- Indexes for table `2supply_history`
--
ALTER TABLE `2supply_history`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `3attendence`
--
ALTER TABLE `3attendence`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `3borrow`
--
ALTER TABLE `3borrow`
  ADD PRIMARY KEY (`BID`);

--
-- Indexes for table `3customer_bill_info`
--
ALTER TABLE `3customer_bill_info`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `3employ_data`
--
ALTER TABLE `3employ_data`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `3out_products`
--
ALTER TABLE `3out_products`
  ADD PRIMARY KEY (`out_id`);

--
-- Indexes for table `3out_products_data`
--
ALTER TABLE `3out_products_data`
  ADD PRIMARY KEY (`out_id`);

--
-- Indexes for table `3product`
--
ALTER TABLE `3product`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `3supplier`
--
ALTER TABLE `3supplier`
  ADD PRIMARY KEY (`su_id`);

--
-- Indexes for table `3supply_entry`
--
ALTER TABLE `3supply_entry`
  ADD PRIMARY KEY (`supply_id`);

--
-- Indexes for table `3supply_history`
--
ALTER TABLE `3supply_history`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `4attendence`
--
ALTER TABLE `4attendence`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `4borrow`
--
ALTER TABLE `4borrow`
  ADD PRIMARY KEY (`BID`);

--
-- Indexes for table `4customer_bill_info`
--
ALTER TABLE `4customer_bill_info`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `4employ_data`
--
ALTER TABLE `4employ_data`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `4out_products`
--
ALTER TABLE `4out_products`
  ADD PRIMARY KEY (`out_id`);

--
-- Indexes for table `4out_products_data`
--
ALTER TABLE `4out_products_data`
  ADD PRIMARY KEY (`out_id`);

--
-- Indexes for table `4product`
--
ALTER TABLE `4product`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `4supplier`
--
ALTER TABLE `4supplier`
  ADD PRIMARY KEY (`su_id`);

--
-- Indexes for table `4supply_entry`
--
ALTER TABLE `4supply_entry`
  ADD PRIMARY KEY (`supply_id`);

--
-- Indexes for table `4supply_history`
--
ALTER TABLE `4supply_history`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `5attendence`
--
ALTER TABLE `5attendence`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `5borrow`
--
ALTER TABLE `5borrow`
  ADD PRIMARY KEY (`BID`);

--
-- Indexes for table `5customer_bill_info`
--
ALTER TABLE `5customer_bill_info`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `5employ_data`
--
ALTER TABLE `5employ_data`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `5out_products_data`
--
ALTER TABLE `5out_products_data`
  ADD PRIMARY KEY (`out_id`);

--
-- Indexes for table `5product`
--
ALTER TABLE `5product`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `5supplier`
--
ALTER TABLE `5supplier`
  ADD PRIMARY KEY (`su_id`);

--
-- Indexes for table `5supply_entry`
--
ALTER TABLE `5supply_entry`
  ADD PRIMARY KEY (`supply_id`);

--
-- Indexes for table `5supply_history`
--
ALTER TABLE `5supply_history`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `out_products`
--
ALTER TABLE `out_products`
  ADD PRIMARY KEY (`out_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1admin`
--
ALTER TABLE `1admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `1chatbot`
--
ALTER TABLE `1chatbot`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `1client_details`
--
ALTER TABLE `1client_details`
  MODIFY `cd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `1subscription_details`
--
ALTER TABLE `1subscription_details`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `2attendence`
--
ALTER TABLE `2attendence`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `2borrow`
--
ALTER TABLE `2borrow`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `2customer_bill_info`
--
ALTER TABLE `2customer_bill_info`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `2employ_data`
--
ALTER TABLE `2employ_data`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `2out_products_data`
--
ALTER TABLE `2out_products_data`
  MODIFY `out_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `2product`
--
ALTER TABLE `2product`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `2supplier`
--
ALTER TABLE `2supplier`
  MODIFY `su_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `2supply_entry`
--
ALTER TABLE `2supply_entry`
  MODIFY `supply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `2supply_history`
--
ALTER TABLE `2supply_history`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `3attendence`
--
ALTER TABLE `3attendence`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `3borrow`
--
ALTER TABLE `3borrow`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `3customer_bill_info`
--
ALTER TABLE `3customer_bill_info`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `3employ_data`
--
ALTER TABLE `3employ_data`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `3out_products`
--
ALTER TABLE `3out_products`
  MODIFY `out_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `3out_products_data`
--
ALTER TABLE `3out_products_data`
  MODIFY `out_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `3product`
--
ALTER TABLE `3product`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `3supplier`
--
ALTER TABLE `3supplier`
  MODIFY `su_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `3supply_entry`
--
ALTER TABLE `3supply_entry`
  MODIFY `supply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `3supply_history`
--
ALTER TABLE `3supply_history`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `4attendence`
--
ALTER TABLE `4attendence`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `4borrow`
--
ALTER TABLE `4borrow`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `4customer_bill_info`
--
ALTER TABLE `4customer_bill_info`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `4employ_data`
--
ALTER TABLE `4employ_data`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `4out_products`
--
ALTER TABLE `4out_products`
  MODIFY `out_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `4out_products_data`
--
ALTER TABLE `4out_products_data`
  MODIFY `out_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `4product`
--
ALTER TABLE `4product`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `4supplier`
--
ALTER TABLE `4supplier`
  MODIFY `su_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `4supply_entry`
--
ALTER TABLE `4supply_entry`
  MODIFY `supply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `4supply_history`
--
ALTER TABLE `4supply_history`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `5attendence`
--
ALTER TABLE `5attendence`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `5borrow`
--
ALTER TABLE `5borrow`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `5customer_bill_info`
--
ALTER TABLE `5customer_bill_info`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `5employ_data`
--
ALTER TABLE `5employ_data`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `5out_products_data`
--
ALTER TABLE `5out_products_data`
  MODIFY `out_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `5product`
--
ALTER TABLE `5product`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `5supplier`
--
ALTER TABLE `5supplier`
  MODIFY `su_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `5supply_entry`
--
ALTER TABLE `5supply_entry`
  MODIFY `supply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `5supply_history`
--
ALTER TABLE `5supply_history`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `out_products`
--
ALTER TABLE `out_products`
  MODIFY `out_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
