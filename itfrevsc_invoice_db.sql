-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2019 at 07:16 AM
-- Server version: 5.5.61-38.13-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itfrevsc_invoice_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `common`
--

CREATE TABLE `common` (
  `id` bigint(20) NOT NULL,
  `series_id` bigint(20) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_identification` varchar(50) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `invoicing_address` longtext,
  `shipping_address` longtext,
  `contact_person` varchar(100) DEFAULT NULL,
  `terms` longtext,
  `notes` longtext,
  `base_amount` decimal(53,15) DEFAULT NULL,
  `discount_amount` decimal(53,15) DEFAULT NULL,
  `net_amount` decimal(53,15) DEFAULT NULL,
  `gross_amount` decimal(53,15) DEFAULT NULL,
  `paid_amount` decimal(53,15) DEFAULT NULL,
  `tax_amount` decimal(53,15) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `draft` tinyint(1) DEFAULT '1',
  `closed` tinyint(1) DEFAULT '0',
  `sent_by_email` tinyint(1) DEFAULT '0',
  `number` int(11) DEFAULT NULL,
  `recurring_invoice_id` bigint(20) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `days_to_due` mediumint(9) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '0',
  `max_occurrences` int(11) DEFAULT NULL,
  `must_occurrences` int(11) DEFAULT NULL,
  `period` int(11) DEFAULT NULL,
  `period_type` varchar(8) DEFAULT NULL,
  `starting_date` date DEFAULT NULL,
  `finishing_date` date DEFAULT NULL,
  `last_execution_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `common`
--

INSERT INTO `common` (`id`, `series_id`, `customer_id`, `customer_name`, `customer_identification`, `customer_email`, `invoicing_address`, `shipping_address`, `contact_person`, `terms`, `notes`, `base_amount`, `discount_amount`, `net_amount`, `gross_amount`, `paid_amount`, `tax_amount`, `status`, `type`, `draft`, `closed`, `sent_by_email`, `number`, `recurring_invoice_id`, `issue_date`, `due_date`, `days_to_due`, `enabled`, `max_occurrences`, `must_occurrences`, `period`, `period_type`, `starting_date`, `finishing_date`, `last_execution_date`, `created_at`, `updated_at`) VALUES
(1, 1, 61, 'Teqxcel', 'Client Legal Id', '', '108,Pragati Towar,Shivaji Nagar,PUne', 'Shipping Address', 'Surjit Thakur- 9657195195', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2865.000000000000000', '0.000000000000000', '2865.000000000000000', '3036.900000000000000', '3036.900000000000000', '171.900000000000000', 1, 'Invoice', 0, 0, 0, 1, NULL, '2017-04-11', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-11 11:46:39', '2017-07-12 06:37:00'),
(2, 1, 21, 'Metro Global Business Services Pvt.Ltd', 'Client Legal Id', 'shilpa.ramesh@metro-services.in', 'Cluster \"D\", Wing 2, 6th Floor, EON Free Zone\r\nPlot No.1, Survey No. 77 MIDC Kharadi Knowledge Park\r\nPune – 411014, Maharashtra, India.', '', 'Shilpa Ramesh-20 71001600', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '4000.000000000000000', '0.000000000000000', '4000.000000000000000', '4330.000000000000000', '4330.000000000000000', '330.000000000000000', 1, 'Invoice', 0, 0, 0, 2, NULL, '2017-04-13', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:17:37', '2017-09-07 04:42:14'),
(4, 1, 21, 'Metro Global Business Services Pvt.Ltd', 'Client Legal Id', 'shilpa.ramesh@metro-services.in', 'Cluster \"D\", Wing 2, 6th Floor, EON Free Zone\r\nPlot No.1, Survey No. 77 MIDC Kharadi Knowledge Park\r\nPune – 411014, Maharashtra, India.', '', 'Shilpa Ramesh-20 71001600', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '900.000000000000000', '0.000000000000000', '900.000000000000000', '954.000000000000000', '954.000000000000000', '54.000000000000000', 1, 'Invoice', 0, 0, 0, 4, NULL, '2017-04-18', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:22:07', '2017-09-07 04:42:24'),
(5, 1, 61, 'Teqxcel', 'Client Legal Id', 'surjeet1770@gmail.com', '108,Pragati Towar,Shivaji Nagar,Pune', 'Shipping Address', 'Surjit - 9657195195', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1900.000000000000000', '0.000000000000000', '1900.000000000000000', '2014.000000000000000', '2014.000000000000000', '114.000000000000000', 1, 'Invoice', 0, 0, 0, 5, NULL, '2017-05-09', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:24:19', '2017-07-12 06:39:41'),
(6, 1, 62, 'Seven Mentor Pvt Ltd', 'Client Legal Id', 'prachi@sevenmentor.com', 'Pune', 'Shipping Address', 'Contact Person', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '7445.000000000000000', '0.000000000000000', '7445.000000000000000', '7891.700000000000000', '7891.700000000000000', '446.700000000000000', 1, 'Invoice', 0, 0, 0, 6, NULL, '2017-05-20', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:26:34', '2017-07-12 06:40:11'),
(7, 1, 24, 'Mach2 International', '', 'sales_mach2@outlook.com', 'Unit No 4 Gananjay Housing Society , Lane No. 1 Bunglow No 3, Azad Wadi,\r\nKothrud, Pune-411038 ', 'Shipping Address', 'Hrishikesh Thakurdesai', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '5250.000000000000000', '0.000000000000000', '5250.000000000000000', '5565.000000000000000', '5565.000000000000000', '315.000000000000000', 1, 'Invoice', 0, 0, 0, 7, NULL, '2017-05-25', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:28:21', '2017-07-12 06:40:44'),
(8, 1, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '5015.000000000000000', '0.000000000000000', '5015.000000000000000', '5315.900000000000000', '5315.900000000000000', '300.900000000000000', 1, 'Invoice', 0, 0, 0, 8, NULL, '2017-06-02', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:34:46', '2017-07-12 06:38:40'),
(9, 1, 1, 'Bliss Utility Services Pvt. Ltd.', 'Client Legal Id', 'sachin@blissutility.com', '', 'Patrakar Nagar,Pune', 'Sachin Likhite-8888868434', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1932.000000000000000', '0.000000000000000', '1932.000000000000000', '2047.920000000000000', '0.000000000000000', '115.920000000000000', 3, 'Invoice', 0, 0, 0, 9, NULL, '2017-05-06', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:37:52', '2017-07-12 05:37:52'),
(10, 1, 41, 'Ushakal Tech Reinventions', 'Client Legal Id', 'jitendra@ushakal.com', 'Pune', 'Shipping Address', 'Jitendra -9820544550', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '720.000000000000000', '500.000000000000000', '220.000000000000000', '233.200000000000000', '233.200000000000000', '13.200000000000000', 1, 'Invoice', 0, 0, 0, 10, NULL, '2017-06-06', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:40:32', '2017-10-24 09:18:43'),
(11, 1, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', 'tech@tripolarcon.com', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '955.000000000000000', '0.000000000000000', '955.000000000000000', '1012.300000000000000', '1012.300000000000000', '57.300000000000000', 1, 'Invoice', 0, 0, 0, 11, NULL, '2017-06-19', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:44:42', '2017-07-12 06:38:20'),
(12, 1, 63, 'Ram Ratna', 'Client Legal Id', 'jitendra@ushakal.com', 'Infrastructure P Ltd S No. B/1A2.11 & 12 Honad-Vilage ', 'Shipping Address', 'Contact Person', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '11400.000000000000000', '0.000000000000000', '11400.000000000000000', '12084.000000000000000', '12084.000000000000000', '684.000000000000000', 1, 'Invoice', 0, 0, 0, 12, NULL, '2017-06-28', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:49:06', '2017-09-07 04:41:47'),
(13, 2, 61, 'Teqxcel', 'Client Legal Id', 'surjeet1770@gmail.com', '108,Pragati Towar,Shivaji Nagar,PUne', 'Shipping Address', 'Surjit Thakur- 9657195195', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3500.000000000000000', '0.000000000000000', '3500.000000000000000', '4025.000000000000000', '4025.000000000000000', '525.000000000000000', 1, 'Invoice', 0, 0, 0, 2, NULL, '2017-07-12', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:52:51', '2017-07-12 06:37:32'),
(14, 2, 61, 'Teqxcel', 'Client Legal Id', 'surjeet1770@gmail.com', '108,Pragati Towar,Shivaji Nagar,PUne', '', 'Surjit Thakur- 9657195195', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '7500.000000000000000', '0.000000000000000', '7500.000000000000000', '8625.000000000000000', '8625.000000000000000', '1125.000000000000000', 1, 'Invoice', 0, 0, 0, 3, NULL, '2017-04-11', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:54:46', '2017-07-12 06:38:56'),
(15, 2, 61, 'Teqxcel', 'Client Legal Id', 'surjeet1770@gmail.com', '108,Pragati Towar,Shivaji Nagar,PUne', 'Shipping Address', 'Surjit Thakur- 9657195195', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '573.000000000000000', '0.000000000000000', '573.000000000000000', '658.950000000000000', '658.950000000000000', '85.950000000000000', 1, 'Invoice', 0, 0, 0, 4, NULL, '2017-04-11', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:55:52', '2017-07-12 06:39:10'),
(16, 2, 61, 'Teqxcel', 'Client Legal Id', 'surjeet1770@gmail.com', '108,Pragati Towar,Shivaji Nagar,PUne', 'Shipping Address', 'Surjit Thakur- 9657195195', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2160.000000000000000', '0.000000000000000', '2160.000000000000000', '2484.000000000000000', '2484.000000000000000', '324.000000000000000', 1, 'Invoice', 0, 0, 0, 5, NULL, '2017-04-11', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:57:00', '2017-07-12 06:39:27'),
(17, 2, 24, 'Mach2 International', '', 'sales_mach2@outlook.com', 'Unit No 4 Gananjay Housing Society , Lane No. 1 Bunglow No 3, Azad Wadi,\r\nKothrud, Pune-411038 ', 'Shipping Address', 'Hrishikesh Thakurdesai', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '6000.000000000000000', '0.000000000000000', '6000.000000000000000', '6900.000000000000000', '6900.000000000000000', '900.000000000000000', 1, 'Invoice', 0, 0, 0, 6, NULL, '2017-07-12', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:58:33', '2017-07-12 06:37:16'),
(18, 2, 6, 'Shree Sai Hemant Arts', 'Client Legal Id', '', 'Shree Sai Hemant Arts,\r\nShirdi Maharashtra -423109', '', 'Phone no-9403182864', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '730.000000000000000', '0.000000000000000', '730.000000000000000', '839.500000000000000', '839.500000000000000', '109.500000000000000', 1, 'Invoice', 0, 0, 0, 7, NULL, '2017-05-20', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 05:59:43', '2017-07-12 06:40:26'),
(19, 2, 61, 'Teqxcel', 'Client Legal Id', 'surjeet1770@gmail.com', '108,Pragati Towar,Shivaji Nagar,PUne', '', 'Surjit Thakur- 9657195195', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3000.000000000000000', '0.000000000000000', '3000.000000000000000', '3450.000000000000000', '3450.000000000000000', '450.000000000000000', 1, 'Invoice', 0, 0, 0, 8, NULL, '2017-05-19', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 06:01:07', '2017-07-12 06:39:59'),
(20, 2, 64, 'MIT Arts, Commerce and Science College', 'Client Legal Id', '', 'MIT Arts, Commerce & Science College, Alandi (D), Pune - 412 105', '', 'Gaurav Magar', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '13300.000000000000000', '0.000000000000000', '13300.000000000000000', '13768.000000000000000', '13768.000000000000000', '468.000000000000000', 1, 'Invoice', 0, 0, 0, 9, NULL, '2017-05-22', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 06:03:34', '2017-07-24 05:32:01'),
(21, 2, 30, 'MIT Vishwashanti Gurukul', 'Client Legal Id', 'snehalsanghavi@mitid.edu.in', 'Loni-Kalbhor,pune', 'Shipping Address', '', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '50000.000000000000000', '0.000000000000000', '50000.000000000000000', '57500.000000000000000', '57500.000000000000000', '7500.000000000000000', 1, 'Invoice', 0, 0, 0, 10, NULL, '2017-05-29', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 06:27:36', '2017-11-24 05:26:28'),
(22, 2, 41, 'Ushakal Tech Reinventions ', 'Client Legal Id', 'jitendra@ushakal.com', 'Pune', '', 'Jitendra -9820544550', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '5450.000000000000000', '0.000000000000000', '5450.000000000000000', '6267.500000000000000', '6267.500000000000000', '817.500000000000000', 1, 'Invoice', 0, 0, 0, 11, NULL, '2017-06-06', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 06:29:14', '2017-10-24 09:26:33'),
(23, 2, 41, 'Ushakal Tech Reinventions', 'Client Legal Id', 'jitendra@ushakal.com', 'Pune', 'Shipping Address', 'Jitendra -9820544550', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '17000.000000000000000', '1750.000000000000000', '15250.000000000000000', '17537.500000000000000', '7820.800000000000000', '2287.500000000000000', 3, 'Invoice', 0, 0, 0, 12, NULL, '2017-07-12', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 06:31:00', '2017-10-24 09:29:10'),
(24, 2, 41, 'Ushakal Tech Reinventions', 'Client Legal Id', 'jitendra@ushakal.com', 'Pune', 'Shipping Address', 'Jitendra -9820544550', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1000.000000000000000', '0.000000000000000', '1000.000000000000000', '1150.000000000000000', '1150.000000000000000', '150.000000000000000', 1, 'Invoice', 0, 0, 0, 13, NULL, '2017-06-06', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 06:32:23', '2017-10-24 09:26:42'),
(25, 2, 59, 'Shraddha Construction Co.', 'Client Legal Id', 'shraddha.conco@yahoo.in', 'Bhosale Heights, Office No. 9, F.C. Road, Shivajinagar, Pune - 04', 'Shipping Address', 'Abhay Bahirat', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '28085.000000000000000', '3750.000000000000000', '24335.000000000000000', '27985.250000000000000', '27985.250000000000000', '3650.250000000000000', 1, 'Invoice', 0, 0, 0, 14, NULL, '2017-06-20', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 06:35:34', '2017-07-12 06:38:00'),
(26, 2, 21, 'Metro Global Business Services Pvt.Ltd', 'Client Legal Id', 'shilpa.ramesh@metro-services.in', 'Cluster \"D\", Wing 2, 6th Floor, EON Free Zone\r\nPlot No.1, Survey No. 77 MIDC Kharadi Knowledge Park\r\nPune – 411014, Maharashtra, India.', '', 'Shilpa Ramesh-20 71001600', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '20000.000000000000000', '0.000000000000000', '20000.000000000000000', '23000.000000000000000', NULL, '3000.000000000000000', NULL, 'Estimate', 0, 0, 0, 2, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-07-12 06:45:56', '2017-07-12 06:45:56'),
(27, 1, 62, 'Seven Mentor Pvt Ltd', 'Client Legal Id', 'prachi@sevenmentor.com', 'Pune', 'Shipping Address', 'Contact Person', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2054.000000000000000', '0.000000000000000', '2054.000000000000000', '2300.480000000000000', NULL, '246.480000000000000', NULL, 'Estimate', 0, 0, 0, 4, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-07-12 06:51:39', '2017-07-12 06:51:39'),
(28, 1, 65, 'Sagar Kasar', 'Client Legal Id', '', 'Rohan Tower Mumbai-pune highway at dapodi near hotel ashoka infront of megamart ', 'Shipping Address', 'Sagar Kasar - 9730176230', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n4.Delivery changes will be extra ', '', '3900.000000000000000', '0.000000000000000', '3900.000000000000000', '4602.000000000000000', NULL, '702.000000000000000', NULL, 'Estimate', 0, 0, 0, 5, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-07-12 08:00:34', '2017-07-12 08:00:34'),
(29, 2, 66, 'Aditi Industries ', 'Client Legal Id', 'santoshsadavare@gmail.com', 'B-701 Sun residency Opp .Kailas jeevan factory Dhayari Pune -411041', 'Shipping Address', 'Santosh Sadavare-7720039828', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3500.000000000000000', '175.000000000000000', '3325.000000000000000', '3923.500000000000000', '3923.500000000000000', '598.500000000000000', 1, 'Invoice', 0, 0, 0, 15, NULL, '2017-07-12', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-12 10:14:03', '2018-01-02 05:59:13'),
(30, 1, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '4000.000000000000000', '0.000000000000000', '4000.000000000000000', '4720.000000000000000', NULL, '720.000000000000000', NULL, 'Estimate', 0, 0, 0, 6, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-07-13 05:41:50', '2017-07-28 13:21:59'),
(31, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '40715.000000000000000', '0.000000000000000', '40715.000000000000000', '45894.800000000000000', NULL, '5179.800000000000000', NULL, 'Estimate', 0, 0, 0, 7, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-07-13 10:30:01', '2017-07-22 12:29:45'),
(32, 2, 68, 'N.M Industries', 'Client Legal Id', 'nmindustriespune@gmail.com', '722/7, Laxmi Park, Shastri Rd,\r\nOpp Lokmanya Nagar, Navi Peth, Pune. ', '', '9511898989 ', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2610.000000000000000', '0.000000000000000', '2610.000000000000000', '3079.800000000000000', NULL, '469.800000000000000', NULL, 'Estimate', 0, 0, 0, 3, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-07-14 04:50:50', '2018-05-30 05:26:55'),
(34, 1, 69, 'Anjali special haircut & bridal', 'Client Legal Id', 'Vivrksticky@gmail.com', 'Pune', 'Shipping Address', 'Anjali - 9730958302,8483892484', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '14500.000000000000000', '0.000000000000000', '14500.000000000000000', '16240.000000000000000', NULL, '1740.000000000000000', NULL, 'Estimate', 0, 0, 0, 8, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-07-14 05:09:24', '2017-07-14 05:09:24'),
(35, 2, 70, 'Dr. Manisha Bandishti', 'Client Legal Id', 'info@drmanishabandishti.com', '303, 3rd floor, Choice ‘C’ Apartment\r\nOpposite Millenium Star Building\r\nNear Ruby Hall Clinic\r\nDhole Patil Road\r\nPune-411001\r\nIndia', 'Shipping Address', '020 26161095', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2910.000000000000000', '0.000000000000000', '2910.000000000000000', '3433.800000000000000', NULL, '523.800000000000000', NULL, 'Estimate', 0, 0, 0, 4, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-07-14 13:05:51', '2017-07-15 08:48:52'),
(36, 2, 71, 'koustubh talpallikar', '', 'koustubh.talpallikar@gmail.com', '', 'Shipping Address', 'koustubh talpallikar - 9849642429', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '28650.000000000000000', '0.000000000000000', '28650.000000000000000', '33807.000000000000000', NULL, '5157.000000000000000', NULL, 'Estimate', 0, 0, 0, 9, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-07-15 11:16:54', '2017-07-15 12:23:20'),
(37, 2, 72, 'Kalyankar Group', 'Client Legal Id', 'kktc@rediffmail.com', 'Pune', 'Shipping Address', 'Ganesh Kalyankar ', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2910.000000000000000', '0.000000000000000', '2910.000000000000000', '3433.800000000000000', NULL, '523.800000000000000', NULL, 'Estimate', 0, 0, 0, 10, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-07-17 12:17:57', '2017-07-17 12:17:57'),
(38, 1, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '630.000000000000000', '0.000000000000000', '630.000000000000000', '743.400000000000000', '743.400000000000000', '113.400000000000000', 1, 'Invoice', 0, 0, 0, 13, NULL, '2017-07-18', '2017-08-18', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 09:25:10', '2017-08-30 04:17:03'),
(39, 1, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '955.000000000000000', '0.000000000000000', '955.000000000000000', '1069.600000000000000', '1069.600000000000000', '114.600000000000000', 1, 'Invoice', 0, 0, 0, 14, NULL, '2017-07-18', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-18 09:27:15', '2017-08-30 04:16:50'),
(40, 2, 73, 'Pranali Construction', 'Client Legal Id', 'pranaliconstructionco@gmail.com', 'office no.4,Vaishnavi Angan ,S.N.65, \r\nnear Chate Coaching Classes, Sinhagad Rd., Pune - 411041', 'Shipping Address', 'Mr. B.P. Humbare -Director - 0981100555 ', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '19430.000000000000000', '0.000000000000000', '19430.000000000000000', '22927.400000000000000', NULL, '3497.400000000000000', NULL, 'Estimate', 0, 0, 0, 11, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-07-18 09:50:18', '2017-07-18 09:50:18'),
(41, 1, 61, 'Teqxcel', 'Client Legal Id', 'jyotivaradk@gmail.com', '108,Pragati Towar,Shivaji Nagar,PUne', 'Shipping Address', 'Jyoti -9623454392', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2460.000000000000000', '0.000000000000000', '2460.000000000000000', '2755.200000000000000', NULL, '295.200000000000000', NULL, 'Estimate', 0, 0, 0, 9, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-07-21 12:06:38', '2017-07-21 12:35:02'),
(42, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '22040.000000000000000', '0.000000000000000', '22040.000000000000000', '25284.800000000000000', NULL, '3244.800000000000000', NULL, 'Estimate', 0, 0, 0, 10, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-07-26 06:16:34', '2017-08-03 09:19:49'),
(43, 1, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '4000.000000000000000', '0.000000000000000', '4000.000000000000000', '4720.000000000000000', '4720.000000000000000', '720.000000000000000', 1, 'Invoice', 0, 0, 0, 15, NULL, '2017-07-28', '2017-08-28', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-28 13:21:59', '2017-08-30 04:16:35'),
(44, 2, 74, 'Navnath Automobiles', 'Client Legal Id', '', 'Singhad Road- Pune', 'Shipping Address', 'Mr. Suraj', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '25000.000000000000000', '0.000000000000000', '25000.000000000000000', '29500.000000000000000', NULL, '4500.000000000000000', NULL, 'Estimate', 0, 0, 0, 12, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-07-29 07:32:32', '2017-07-29 07:32:32'),
(45, 2, 75, 'Tech Talks India Pvt. Ltd.', 'Client Legal Id', 'veers@tech-talks.in', 'Invoicing Address', 'Shipping Address', '9900594584', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '15000.000000000000000', '0.000000000000000', '15000.000000000000000', '17700.000000000000000', NULL, '2700.000000000000000', NULL, 'Estimate', 0, 0, 0, 13, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-07-31 10:12:58', '2017-07-31 10:12:58'),
(47, 3, 76, 'EDU Empire PVt. Ltd', 'Client Legal Id', '', 'Phoenix mall,Pune', 'Shipping Address', '8177862759', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1500.000000000000000', '0.000000000000000', '1500.000000000000000', '1770.000000000000000', '1770.000000000000000', '270.000000000000000', 1, 'Invoice', 0, 0, 0, 1, NULL, '2017-08-01', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 04:59:46', '2017-08-01 05:02:05'),
(48, 3, 77, '3ace academy', 'Client Legal Id', '', 'Singhgad Road,Pune', 'Shipping Address', '8055763763', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1500.000000000000000', '0.000000000000000', '1500.000000000000000', '1770.000000000000000', '1770.000000000000000', '270.000000000000000', 1, 'Invoice', 0, 0, 0, 2, NULL, '2017-08-01', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 05:01:35', '2017-08-01 05:01:55'),
(49, 2, 79, 'Aaradhya enterprises', 'Client Legal Id', 'aaradhya.enterprises88@gmail.com', ' A-402 radhika apartment, near aditya nakoda,\r\nsarita nagari phase 2, sinhgad road pune 411030. ', '', 'Anand Chitale-9552777928', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '13500.000000000000000', '0.000000000000000', '13500.000000000000000', '15930.000000000000000', NULL, '2430.000000000000000', NULL, 'Estimate', 0, 0, 0, 14, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-08-01 06:56:11', '2017-10-30 11:40:04'),
(50, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '15240.000000000000000', '0.000000000000000', '15240.000000000000000', '17137.200000000000000', '17137.200000000000000', '1897.200000000000000', 1, 'Invoice', 0, 0, 0, 16, NULL, '2017-08-03', '2017-09-03', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-03 09:19:49', '2017-09-07 04:34:31'),
(51, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1200.000000000000000', '0.000000000000000', '1200.000000000000000', '1356.000000000000000', NULL, '156.000000000000000', NULL, 'Estimate', 0, 0, 0, 11, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-08-03 11:48:29', '2017-08-05 05:17:58'),
(52, 2, 79, 'Aaradhya enterprises', 'Client Legal Id', 'aaradhya.enterprises88@gmail.com', ' A-402 radhika apartment, near aditya nakoda,\r\nsarita nagari phase 2, sinhgad road pune 411030. ', '', 'Anand Chitale-9552777928', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2733.000000000000000', '0.000000000000000', '2733.000000000000000', '3224.940000000000000', '3224.940000000000000', '491.940000000000000', 1, 'Invoice', 0, 0, 0, 16, NULL, '2017-08-04', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 10:01:39', '2018-01-01 07:05:28'),
(53, 2, 9, 'A B Gensets Pvt. Ltd', 'Client Legal Id', 'purchase@abgensets.co.in', 'Dhayari,Pune', 'Dhayari,Pune', 'Preeti Madam- 7620470606', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1500.000000000000000', '0.000000000000000', '1500.000000000000000', '1770.000000000000000', NULL, '270.000000000000000', NULL, 'Estimate', 0, 0, 0, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-08-10 09:42:00', '2017-08-10 11:05:32'),
(54, 2, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '18000.000000000000000', '0.000000000000000', '18000.000000000000000', '21240.000000000000000', NULL, '3240.000000000000000', NULL, 'Estimate', 0, 0, 0, 16, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-08-11 04:14:08', '2017-08-11 04:14:08'),
(55, 2, 80, 'Paranjpe eye clinic & surgery center', 'Client Legal Id', 'cintact@paranjpeeyecare.net', 'Pune', 'Shipping Address', 'Dr. mandar paranjpe-9579525110', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '21150.000000000000000', '0.000000000000000', '21150.000000000000000', '24957.000000000000000', NULL, '3807.000000000000000', NULL, 'Estimate', 0, 0, 0, 17, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-08-11 06:32:08', '2017-08-12 07:15:16'),
(56, 2, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '9287.000000000000000', '0.000000000000000', '9287.000000000000000', '10958.660000000000000', NULL, '1671.660000000000000', NULL, 'Estimate', 0, 0, 0, 18, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-08-11 08:42:47', '2017-09-27 06:00:41'),
(57, 2, 24, 'Mach2 International', '', 'sales_mach2@outlook.com', 'Unit No 4 Gananjay Housing Society , Lane No. 1 Bunglow No 3, Azad Wadi,\r\nKothrud, Pune-411038 ', 'Shipping Address', 'Hrishikesh Thakurdesai', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2910.000000000000000', '0.000000000000000', '2910.000000000000000', '3433.800000000000000', NULL, '523.800000000000000', NULL, 'Estimate', 0, 0, 0, 19, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-08-21 07:07:53', '2017-08-23 05:53:44'),
(58, 1, 47, 'Ameet Patel', 'Client Legal Id', 'patelameet1908@gmail.com', 'Dhayari-Pune', '', '9371594035', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '4200.000000000000000', '0.000000000000000', '4200.000000000000000', '4956.000000000000000', NULL, '756.000000000000000', NULL, 'Estimate', 0, 0, 0, 12, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-08-21 08:49:33', '2017-08-21 08:49:33'),
(59, 2, 24, 'Mach2 International', '', 'sales_mach2@outlook.com', 'Unit No 4 Gananjay Housing Society , Lane No. 1 Bunglow No 3, Azad Wadi,\r\nKothrud, Pune-411038 ', 'Shipping Address', 'Hrishikesh Thakurdesai', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2910.000000000000000', '0.000000000000000', '2910.000000000000000', '3433.800000000000000', '3433.800000000000000', '523.800000000000000', 1, 'Invoice', 0, 0, 0, 17, NULL, '2017-08-23', '2017-09-23', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-23 05:53:44', '2017-09-07 04:33:41'),
(60, 1, 63, 'Ram Ratna', 'Client Legal Id', 'jitendra@ushakal.com', 'Infrastructure P Ltd S No. B/1A2.11 & 12 Honad-Vilage ', 'Shipping Address', 'Contact Person', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '360.000000000000000', '0.000000000000000', '360.000000000000000', '360.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 13, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-08-23 07:43:07', '2017-09-08 02:38:15'),
(61, 2, 81, 'Prosonic Technologies Pvt. Ltd', 'Client Legal Id', 'amol.panse@prosonic.in', 'Pune', 'Shipping Address', 'Amol Panse', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '21000.000000000000000', '0.000000000000000', '21000.000000000000000', '24780.000000000000000', NULL, '3780.000000000000000', NULL, 'Estimate', 0, 0, 0, 20, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-08-23 11:29:11', '2017-08-23 11:29:11'),
(62, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '7000.000000000000000', '0.000000000000000', '7000.000000000000000', '8260.000000000000000', NULL, '1260.000000000000000', NULL, 'Estimate', 0, 0, 0, 14, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-08-24 05:57:42', '2017-08-24 06:02:32'),
(63, 1, 18, 'URS Technologies Solutions', 'Client Legal Id', 'gurudatta@e-bc.in', 'Flat No-604 Sun residency Near Kilas Jiven Dhayari Pune-41', 'Shipping Address', 'Amit Patel', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2470.000000000000000', '0.000000000000000', '2470.000000000000000', '2470.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-08-28 11:23:07', '2017-08-28 11:23:07'),
(64, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '8000.000000000000000', '0.000000000000000', '8000.000000000000000', '9440.000000000000000', NULL, '1440.000000000000000', NULL, 'Estimate', 0, 0, 0, 16, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-08-29 04:08:48', '2017-09-08 02:24:55'),
(65, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '12000.000000000000000', '0.000000000000000', '12000.000000000000000', '13440.000000000000000', '13440.000000000000000', '1440.000000000000000', 1, 'Invoice', 0, 0, 0, 17, NULL, '2017-08-29', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-29 10:01:52', '2017-09-20 07:47:56'),
(66, 1, 58, 'Paradigm Building Solutions Pvt. Ltd.', 'Client Legal Id', 'paradigmbuildsol@gmail.com', 'Pune', 'Shipping Address', 'Yatin Jog', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3.For Ribbon Printing 15 Days 4.ID card printing Minimum - 4 Days 4. Mug Printing Minimum - 5 Days 5.Subject to Pune Jurisdiction\r\n\r\nThank you for your business', '', '12500.000000000000000', '0.000000000000000', '12500.000000000000000', '14750.000000000000000', NULL, '2250.000000000000000', NULL, 'Estimate', 0, 0, 0, 17, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-08-31 12:53:20', '2017-10-05 03:58:17'),
(67, 1, 82, 'Kavyaa beauty parlor', 'Client Legal Id', '', 'Invoicing Address', 'Shipping Address', 'Varsha -9823164242', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '900.000000000000000', '0.000000000000000', '900.000000000000000', '1008.000000000000000', NULL, '108.000000000000000', NULL, 'Estimate', 0, 0, 0, 18, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-09-04 11:37:53', '2017-09-09 10:04:00'),
(68, 1, 7, 'A Trigya Company (Cloud Mantra)', 'Client Legal Id', 'hemant@cloudmantra.net', 'A 504, Bhakti Plaza, 5th floor, A wing, Near Bremen Circle, Aundh, Pune.', '', 'Mr. Nilesh More, Mr. Hemant Lavania 9028088987', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '720.000000000000000', '0.000000000000000', '720.000000000000000', '849.600000000000000', NULL, '129.600000000000000', NULL, 'Estimate', 0, 0, 0, 19, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-09-07 05:51:18', '2017-09-09 06:17:12'),
(69, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '8000.000000000000000', '0.000000000000000', '8000.000000000000000', '9440.000000000000000', '9440.000000000000000', '1440.000000000000000', 1, 'Invoice', 0, 0, 0, 18, NULL, '2017-09-08', '2017-10-08', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-08 02:24:55', '2017-09-20 07:48:26'),
(70, 1, 83, 'Junavane Travels Pvt Ltd', 'Client Legal Id', 'junavanetravels@gmail.com', 'Pune', '', '020-24459454', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '25500.000000000000000', '0.000000000000000', '25500.000000000000000', '30090.000000000000000', NULL, '4590.000000000000000', NULL, 'Estimate', 0, 0, 0, 20, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-09-08 10:33:44', '2017-09-08 12:46:26'),
(71, 1, 7, 'A Trigya Company (Cloud Mantra)', 'Client Legal Id', 'hemant@cloudmantra.net', 'A 504, Bhakti Plaza, 5th floor, A wing, Near Bremen Circle, Aundh, Pune.', '', 'Mr. Nilesh More, Mr. Hemant Lavania 9028088987', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '720.000000000000000', '0.000000000000000', '720.000000000000000', '849.600000000000000', '849.600000000000000', '129.600000000000000', 1, 'Invoice', 0, 0, 0, 19, NULL, '2017-09-09', '2017-10-09', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-09 06:17:12', '2018-02-03 09:23:51'),
(72, 1, 82, 'Kavyaa beauty parlor', 'Client Legal Id', '', 'Invoicing Address', 'Shipping Address', 'Varsha -9823164242', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '900.000000000000000', '0.000000000000000', '900.000000000000000', '1008.000000000000000', '1008.000000000000000', '108.000000000000000', 1, 'Invoice', 0, 0, 0, 20, NULL, '2017-09-09', '2017-10-09', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-09 10:04:00', '2018-01-02 05:58:58'),
(73, 1, 84, 'Rama Erande & Associates', 'Client Legal Id', '', 'Shop No 31 Indulal Complex, LAL Bahadur Shastri Road, Navi Peth-Sadashiv Peth, Pune - 411030, Near Kaka Halwai Sweet Centre', 'Shipping Address', '9370709093, 9370709091, 9881302860, 9326259060', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\nThank you for your business\r\n', '', '64460.000000000000000', '0.000000000000000', '64460.000000000000000', '75810.800000000000000', NULL, '11350.800000000000000', NULL, 'Estimate', 0, 0, 0, 21, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-09-09 12:25:58', '2017-09-25 10:46:32'),
(74, 1, 21, 'Metro Global Business Services Pvt.Ltd', 'Client Legal Id', 'shilpa.ramesh@metro-services.in', 'Cluster \"D\", Wing 2, 6th Floor, EON Free Zone\r\nPlot No.1, Survey No. 77 MIDC Kharadi Knowledge Park\r\nPune – 411014, Maharashtra, India.', '', 'Shilpa Ramesh-20 71001600', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '35000.000000000000000', '0.000000000000000', '35000.000000000000000', '41300.000000000000000', NULL, '6300.000000000000000', NULL, 'Estimate', 0, 0, 0, 22, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-09-12 12:58:31', '2017-09-12 12:58:31'),
(75, 1, 21, 'Metro Global Business Services Pvt.Ltd', 'Client Legal Id', 'shilpa.ramesh@metro-services.in', 'Cluster \"D\", Wing 2, 6th Floor, EON Free Zone\r\nPlot No.1, Survey No. 77 MIDC Kharadi Knowledge Park\r\nPune – 411014, Maharashtra, India.', '', 'Shilpa Ramesh-20 71001600', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '0.000000000000000', '0.000000000000000', '0.000000000000000', '0.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 23, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-09-14 04:04:47', '2017-09-14 04:04:47'),
(76, 1, 85, 'Stay Eighteen', 'Client Legal Id', '', 'Jay Complex, Shop No. 03, Dhayari Narhe Road, Dhayari, Pune - 411041, Near Kailas Jeevan Factor', 'Shipping Address', '9665527667', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '700.000000000000000', '0.000000000000000', '700.000000000000000', '784.000000000000000', NULL, '84.000000000000000', NULL, 'Estimate', 0, 0, 0, 24, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-09-14 06:17:46', '2017-09-19 12:29:13'),
(77, 2, 87, 'Kedar Chandurkar', 'Client Legal Id', 'kedarchandurkar@gmail.com', 'Pune', 'Shipping Address', 'Kedar Chandurkar', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3150.000000000000000', '0.000000000000000', '3150.000000000000000', '3717.000000000000000', NULL, '567.000000000000000', NULL, 'Estimate', 0, 0, 0, 21, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-09-15 11:48:01', '2017-09-18 10:25:32'),
(78, 2, 12, 'Travel Time Car Rental Pvt. Ltd', 'Client Legal Id', 'airport.pnq@traveltime.co.in', 'Aundh,pune', 'Aundh,pune', 'Aayaz-8554990195', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1200.000000000000000', '0.000000000000000', '1200.000000000000000', '1416.000000000000000', NULL, '216.000000000000000', NULL, 'Estimate', 0, 0, 0, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-09-15 11:49:08', '2017-09-18 10:21:35'),
(79, 2, 91, 'GGP Auto Solution (I) Pvt. Ltd', '', 'sunil.globalgroup@gmail.com', 'Ganga Collidium I,\r\n1st floor, Office No.117,\r\nOff. Bibwewadi - Kondhwa Road,\r\nMarket yard, Near Gangadham Chowk,\r\nBibwewadi, Pune- 411 037', '', 'Mr. Sunil Solanki', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1450.000000000000000', '0.000000000000000', '1450.000000000000000', '1711.000000000000000', NULL, '261.000000000000000', NULL, 'Estimate', 0, 0, 0, 22, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-09-15 11:51:14', '2017-10-11 04:28:52'),
(80, 2, 34, 'SAK', 'Client Legal Id', '', 'Pune', 'Shipping Address', 'Ganesh Anerao-9822758561', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '5650.000000000000000', '0.000000000000000', '5650.000000000000000', '6667.000000000000000', NULL, '1017.000000000000000', NULL, 'Estimate', 0, 0, 0, 23, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-09-16 04:56:15', '2017-09-16 04:56:15');
INSERT INTO `common` (`id`, `series_id`, `customer_id`, `customer_name`, `customer_identification`, `customer_email`, `invoicing_address`, `shipping_address`, `contact_person`, `terms`, `notes`, `base_amount`, `discount_amount`, `net_amount`, `gross_amount`, `paid_amount`, `tax_amount`, `status`, `type`, `draft`, `closed`, `sent_by_email`, `number`, `recurring_invoice_id`, `issue_date`, `due_date`, `days_to_due`, `enabled`, `max_occurrences`, `must_occurrences`, `period`, `period_type`, `starting_date`, `finishing_date`, `last_execution_date`, `created_at`, `updated_at`) VALUES
(81, 2, 86, 'Natu properties', 'Client Legal Id', 'milind@natuproperties.in', 'Paud Rd,Pune', 'Shipping Address', 'Milind Natu - 9822067341', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '14300.000000000000000', '0.000000000000000', '14300.000000000000000', '16874.000000000000000', NULL, '2574.000000000000000', NULL, 'Estimate', 0, 0, 0, 24, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-09-16 06:16:29', '2017-09-16 06:16:29'),
(82, 1, 81, 'Prosonic Technologies Pvt. Ltd', 'Client Legal Id', 'amol.panse@prosonic.in', 'Pune', 'Shipping Address', 'Amol Panse', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '17950.000000000000000', '0.000000000000000', '17950.000000000000000', '21028.000000000000000', NULL, '3078.000000000000000', NULL, 'Estimate', 0, 0, 0, 25, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-09-18 08:33:44', '2017-09-18 10:00:53'),
(83, 2, 88, 'APR CA', 'Client Legal Id', '', 'Mumbai', '', '', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2910.000000000000000', '0.000000000000000', '2910.000000000000000', '3433.800000000000000', '0.000000000000000', '523.800000000000000', 3, 'Invoice', 0, 0, 0, 18, NULL, '2017-09-18', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-18 13:45:30', '2017-09-20 07:43:24'),
(84, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2540.000000000000000', '0.000000000000000', '2540.000000000000000', '2997.200000000000000', '2997.200000000000000', '457.200000000000000', 1, 'Invoice', 0, 0, 0, 22, NULL, '2017-09-19', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-19 08:49:18', '2017-09-20 07:48:38'),
(85, 1, 85, 'Stay Eighteen', 'Client Legal Id', '', 'Jay Complex, Shop No. 03, Dhayari Narhe Road, Dhayari, Pune - 411041, Near Kailas Jeevan Factor', 'Shipping Address', '9665527667', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '700.000000000000000', '0.000000000000000', '700.000000000000000', '784.000000000000000', '784.000000000000000', '84.000000000000000', 1, 'Invoice', 0, 0, 0, 23, NULL, '2017-09-19', '2017-10-19', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-19 12:29:13', '2017-09-20 07:48:49'),
(86, 1, 30, 'MIT Vishwashanti Gurukul', 'Client Legal Id', 'snehalsanghavi@mitid.edu.in', 'Loni-Kalbhor,pune', 'Shipping Address', '', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '50000.000000000000000', '0.000000000000000', '50000.000000000000000', '59000.000000000000000', NULL, '9000.000000000000000', NULL, 'Estimate', 0, 0, 0, 26, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-09-20 07:20:50', '2017-12-06 06:13:58'),
(87, 2, 70, 'Dr Manisha Bandishti', 'Client Legal Id', 'info@drmanishabandishti.com', '303, 3rd floor, Choice ‘C’ Apartment, Opposite Millenium Star Building, Near Ruby Hall Clinic, Dhole Patil Road, Pune, Maharashtra 411001', 'Shipping Address', 'Dr Manisha Bandishti-020 26161095', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3020.910000000000000', '0.000000000000000', '3020.910000000000000', '3564.670000000000000', '3564.670000000000000', '543.763800000000000', 1, 'Invoice', 0, 0, 0, 19, NULL, '2017-09-20', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-20 08:21:19', '2017-11-24 05:24:41'),
(88, 1, 79, 'Aaradhya enterprises', 'Client Legal Id', 'aaradhya.enterprises88@gmail.com', ' A-402 radhika apartment, near aditya nakoda,\r\nsarita nagari phase 2, sinhgad road pune 411030. ', '', 'Anand Chitale-9552777928', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '9285.000000000000000', '0.000000000000000', '9285.000000000000000', '10956.300000000000000', NULL, '1671.300000000000000', NULL, 'Estimate', 0, 0, 0, 27, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-09-22 09:25:38', '2017-09-26 06:48:58'),
(89, 2, 33, 'Nutan Mahavidyalaya', 'Client Legal Id', 'devidasdhekle54@gmail.com', 'Pune', '', 'Mr.Santosh Dandwate', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '15000.000000000000000', '0.000000000000000', '15000.000000000000000', '17700.000000000000000', NULL, '2700.000000000000000', NULL, 'Estimate', 0, 0, 0, 25, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-09-23 11:34:19', '2017-09-23 11:34:19'),
(90, 1, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '955.000000000000000', '0.000000000000000', '955.000000000000000', '1069.600000000000000', '1069.600000000000000', '114.600000000000000', 1, 'Invoice', 0, 0, 0, 24, NULL, '2017-09-27', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-27 04:29:32', '2017-10-30 05:28:46'),
(91, 2, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '9287.000000000000000', '0.000000000000000', '9287.000000000000000', '10958.660000000000000', '10958.660000000000000', '1671.660000000000000', 1, 'Invoice', 0, 0, 0, 20, NULL, '2017-09-27', '2017-10-27', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-27 06:00:41', '2017-10-30 05:29:03'),
(92, 1, 84, 'Rama Erande & Associates', 'Client Legal Id', '', 'Shop No 31 Indulal Complex, LAL Bahadur Shastri Road, Navi Peth-Sadashiv Peth, Pune - 411030, Near Kaka Halwai Sweet Centre', 'Shipping Address', '9881302860, 9326259060', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '8455.000000000000000', '0.000000000000000', '8455.000000000000000', '9976.900000000000000', '9976.900000000000000', '1521.900000000000000', 1, 'Invoice', 0, 0, 0, 25, NULL, '2017-09-28', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-28 09:19:39', '2017-10-07 05:08:22'),
(93, 1, 44, 'Wisdom Nursery School', 'Client Legal Id', 'wisdomnurseryschool@gmail.com', 'Pune', 'Shipping Address', 'Siddhaye-9822046063', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1890.000000000000000', '0.000000000000000', '1890.000000000000000', '2230.200000000000000', NULL, '340.200000000000000', NULL, 'Estimate', 0, 0, 0, 28, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-10-02 06:28:55', '2017-10-05 03:58:30'),
(94, 2, 89, 'MMP Trade Sourcing ', 'Client Legal Id', 'mmptrades@gmail.com', 'Kothrud,Pune-411038', 'Shipping Address', 'Mehul Pande - 07588230588', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3000.000000000000000', '0.000000000000000', '3000.000000000000000', '3540.000000000000000', '3540.000000000000000', '540.000000000000000', 1, 'Invoice', 0, 0, 0, 21, NULL, '2017-10-03', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-03 12:40:59', '2017-10-07 05:08:09'),
(95, 1, 58, 'Paradigm Building Solutions Pvt. Ltd.', 'Client Legal Id', 'paradigmbuildsol@gmail.com', 'Pune', 'Shipping Address', 'Yatin Jog', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3.For Ribbon Printing 15 Days 4.ID card printing Minimum - 4 Days 4. Mug Printing Minimum - 5 Days 5.Subject to Pune Jurisdiction\r\n\r\nThank you for your business', '', '12500.000000000000000', '0.000000000000000', '12500.000000000000000', '14750.000000000000000', '14750.000000000000000', '2250.000000000000000', 1, 'Invoice', 0, 0, 0, 26, NULL, '2017-10-05', '2017-11-05', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-05 03:58:17', '2017-10-30 05:28:18'),
(96, 1, 44, 'Wisdom Nursery School', 'Client Legal Id', 'wisdomnurseryschool@gmail.com', 'Pune', 'Shipping Address', 'Siddhaye-9822046063', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1890.000000000000000', '0.000000000000000', '1890.000000000000000', '2230.200000000000000', '2230.200000000000000', '340.200000000000000', 1, 'Invoice', 0, 0, 0, 27, NULL, '2017-10-05', '2017-11-05', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-05 03:58:30', '2017-10-07 05:07:30'),
(97, 2, 58, 'Paradigm Building Solutions Pvt. Ltd.', 'Client Legal Id', 'paradigmbuildsol@gmail.com', 'Pune', 'Shipping Address', 'Yatin Jog', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '12750.000000000000000', '0.000000000000000', '12750.000000000000000', '15045.000000000000000', '15045.000000000000000', '2295.000000000000000', 1, 'Invoice', 0, 0, 0, 22, NULL, '2017-10-05', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-05 06:11:44', '2017-10-30 05:28:29'),
(98, 1, 90, 'Mahesh Mokashi', 'Client Legal Id', 'drmaheshmokashi123@gmail.com', 'Pune', 'Patrakar Nagar,Pune', 'Mahesh Mokashi', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '750.000000000000000', '0.000000000000000', '750.000000000000000', '885.000000000000000', NULL, '135.000000000000000', NULL, 'Estimate', 0, 0, 0, 29, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-10-09 06:05:52', '2017-10-09 06:25:02'),
(99, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '250.000000000000000', '0.000000000000000', '250.000000000000000', '280.000000000000000', '280.000000000000000', '30.000000000000000', 1, 'Invoice', 0, 0, 0, 28, NULL, '2017-10-09', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-09 10:03:48', '2017-10-30 05:27:59'),
(100, 2, 91, 'GGP Auto Solution (I) Pvt. Ltd', '', 'sunil.globalgroup@gmail.com', 'Ganga Collidium I,\r\n1st floor, Office No.117,\r\nOff. Bibwewadi - Kondhwa Road,\r\nMarket yard, Near Gangadham Chowk,\r\nBibwewadi, Pune- 411 037', '', 'Mr. Sunil Solanki', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1450.000000000000000', '0.000000000000000', '1450.000000000000000', '1711.000000000000000', '1711.000000000000000', '261.000000000000000', 1, 'Invoice', 0, 0, 0, 23, NULL, '2017-10-11', '2017-11-11', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-11 04:28:52', '2017-10-30 05:27:49'),
(101, 2, 33, 'Nutan Mahavidyalaya', 'Client Legal Id', 'devidasdhekle54@gmail.com', 'Pune', '', 'Mr.Santosh Dandwate', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3160.000000000000000', '0.000000000000000', '3160.000000000000000', '3728.800000000000000', NULL, '568.800000000000000', NULL, 'Estimate', 0, 0, 0, 26, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-10-11 06:57:31', '2017-10-11 06:57:31'),
(102, 2, 41, 'Ushakal Tech Reinventions ', 'Client Legal Id', 'gurudatta@e-bc.in', 'Pune', '', '', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '8075.000000000000000', '0.000000000000000', '8075.000000000000000', '9528.500000000000000', NULL, '1453.500000000000000', NULL, 'Estimate', 0, 0, 0, 27, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-10-11 07:10:53', '2017-10-23 05:30:14'),
(103, 1, 21, 'Metro Global Business Services Pvt.Ltd', 'Client Legal Id', 'shweta.kankariya@metro-services.in', 'Cluster \"D\", Wing 2, 6th Floor, EON Free Zone\r\nPlot No.1, Survey No. 77 MIDC Kharadi Knowledge Park\r\nPune – 411014, Maharashtra, India.', '', 'Shweta Kankariya', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '34400.000000000000000', '0.000000000000000', '34400.000000000000000', '40832.000000000000000', NULL, '6432.000000000000000', NULL, 'Estimate', 0, 0, 0, 30, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-10-12 12:37:37', '2017-10-12 12:49:49'),
(104, 2, 42, 'eyedentity ', 'Client Legal Id', '', '215 Creative Industrial Estate 2nd Floor N.M Joshi Marg Mumbai - 400011', 'Shipping Address', '9930868705', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '24342.000000000000000', '0.000000000000000', '24342.000000000000000', '28723.560000000000000', '28723.560000000000000', '4381.560000000000000', 1, 'Invoice', 0, 0, 0, 24, NULL, '2017-10-13', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-13 08:24:25', '2017-10-24 09:42:09'),
(105, 2, 41, 'Ushakal Tech Reinventions ', 'Client Legal Id', 'gurudatta@e-bc.in', 'Pune', '', '', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '8075.000000000000000', '0.000000000000000', '8075.000000000000000', '9528.500000000000000', '9528.500000000000000', '1453.500000000000000', 1, 'Invoice', 0, 0, 0, 25, NULL, '2017-10-23', '2017-11-23', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-23 05:30:14', '2017-10-24 09:19:41'),
(106, 1, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2500.000000000000000', '0.000000000000000', '2500.000000000000000', '2950.000000000000000', NULL, '450.000000000000000', NULL, 'Estimate', 0, 0, 0, 31, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-10-24 08:58:59', '2017-10-24 08:58:59'),
(107, 2, 11, 'Kats Enggineer', 'Client Legal Id', 'katsengg@gmail.com', 'Sinhagad road,pune', 'Sinhagad road,pune', 'Mr.patole', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2957.000000000000000', '0.000000000000000', '2957.000000000000000', '3489.260000000000000', NULL, '532.260000000000000', NULL, 'Estimate', 0, 0, 0, 28, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-10-24 10:48:57', '2017-10-24 12:39:16'),
(108, 2, 1, 'Bliss Utility Services Pvt. Ltd.', 'Client Legal Id', 'sachin@blissutility.com', '', 'Patrakar Nagar,Pune', 'Sachin Likhite-8888868434', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3197.000000000000000', '0.000000000000000', '3197.000000000000000', '3772.460000000000000', NULL, '575.460000000000000', NULL, 'Estimate', 0, 0, 0, 29, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-10-24 11:07:41', '2017-10-24 12:34:33'),
(109, 2, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '60000.000000000000000', '0.000000000000000', '60000.000000000000000', '70800.000000000000000', '70800.000000000000000', '10800.000000000000000', 1, 'Invoice', 0, 0, 0, 26, NULL, '2017-10-30', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-30 06:51:37', '2017-11-24 05:25:35'),
(110, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '15940.000000000000000', '0.000000000000000', '15940.000000000000000', '18557.200000000000000', NULL, '2617.200000000000000', NULL, 'Estimate', 0, 0, 0, 32, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-10-30 11:00:29', '2017-11-11 04:42:29'),
(111, 1, 62, 'Seven Mentor Pvt Ltd', 'Client Legal Id', 'prachi@sevenmentor.com', 'Pune', 'Shipping Address', 'Prachi ', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '800.000000000000000', '0.000000000000000', '800.000000000000000', '944.000000000000000', NULL, '144.000000000000000', NULL, 'Estimate', 0, 0, 0, 33, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-10-30 11:31:55', '2017-10-30 11:31:55'),
(112, 2, 79, 'Aaradhya enterprises', 'Client Legal Id', 'aaradhya.enterprises88@gmail.com', ' A-402 radhika apartment, near aditya nakoda,\r\nsarita nagari phase 2, sinhgad road pune 411030. ', '', 'Anand Chitale-9552777928', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '15000.000000000000000', '0.000000000000000', '15000.000000000000000', '17700.000000000000000', '17700.000000000000000', '2700.000000000000000', 1, 'Invoice', 0, 0, 0, 27, NULL, '2017-10-30', '2017-11-30', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-30 11:40:04', '2018-01-01 07:05:18'),
(113, 2, 63, 'Ram Ratna', 'Client Legal Id', 'jitendra@ushakal.com', 'Infrastructure P Ltd S No. B/1A2.11 & 12 Honad-Vilage ', 'Shipping Address', 'Contact Person', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '7500.000000000000000', '0.000000000000000', '7500.000000000000000', '8850.000000000000000', NULL, '1350.000000000000000', NULL, 'Estimate', 0, 0, 0, 30, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-10-30 13:05:43', '2017-10-30 13:12:43'),
(114, 2, 24, 'Mach2 International', '', 'sales_mach2@outlook.com', 'Unit No 4 Gananjay Housing Society , Lane No. 1 Bunglow No 3, Azad Wadi,\r\nKothrud, Pune-411038 ', 'Shipping Address', 'Hrishikesh Thakurdesai', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '6000.000000000000000', '0.000000000000000', '6000.000000000000000', '7080.000000000000000', NULL, '1080.000000000000000', NULL, 'Estimate', 0, 0, 0, 31, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-11-01 13:03:10', '2017-12-18 11:50:45'),
(115, 1, 24, 'Mach2 International', '', 'sales_mach2@outlook.com', 'Unit No 4 Gananjay Housing Society , Lane No. 1 Bunglow No 3, Azad Wadi,\r\nKothrud, Pune-411038 ', 'Shipping Address', 'Hrishikesh Thakurdesai', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '30000.000000000000000', '0.000000000000000', '30000.000000000000000', '30000.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 34, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-11-02 11:48:57', '2017-11-02 11:52:07'),
(116, 1, 92, 'R B Enterprises', 'Client Legal Id', '', 'Pune', 'Shipping Address', 'Mr. Sunjay', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '15550.000000000000000', '0.000000000000000', '15550.000000000000000', '18169.000000000000000', NULL, '2619.000000000000000', NULL, 'Estimate', 0, 0, 0, 35, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-11-04 14:09:33', '2017-11-06 09:34:21'),
(117, 1, 96, 'Balaji Enterprises ', 'Client Legal Id', '', 'Pune', 'Shipping Address', 'Mr. Sunjay', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '15550.000000000000000', '0.000000000000000', '15550.000000000000000', '17629.000000000000000', '17629.000000000000000', '2079.000000000000000', 1, 'Invoice', 0, 0, 0, 29, NULL, '2017-11-06', '2017-12-06', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 09:34:21', '2017-12-06 07:42:37'),
(118, 1, 92, 'R B Enterprises', 'Client Legal Id', '', 'Pune', 'Shipping Address', 'Mr. Sunjay', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '5335.000000000000000', '0.000000000000000', '5335.000000000000000', '6295.300000000000000', NULL, '960.300000000000000', NULL, 'Estimate', 0, 0, 0, 36, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-11-07 09:55:35', '2017-11-08 08:14:16'),
(120, 1, 94, 'AG Furnace Improvements Pvt. Ltd.', 'Client Legal Id', 'amarvirgc@heatfluxindia.com', 'Office-6, Vrundavan Commercial Complex\r\n\r\nKothrud, Pune-411038', 'Shipping Address', 'Amarvir G Chilka', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '8750.000000000000000', '0.000000000000000', '8750.000000000000000', '10325.000000000000000', NULL, '1575.000000000000000', NULL, 'Estimate', 0, 0, 0, 37, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-11-08 05:46:20', '2017-11-08 05:46:20'),
(121, 1, 92, 'R B Enterprises', 'Client Legal Id', '', 'Pune', 'Shipping Address', 'Mr. Sunjay', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '40000.000000000000000', '0.000000000000000', '40000.000000000000000', '40000.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 38, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-11-08 08:15:31', '2017-11-08 08:57:10'),
(122, 1, 21, 'Metro Global Business Services Pvt.Ltd', 'Client Legal Id', '', 'Cluster \"D\", Wing 2, 6th Floor, EON Free Zone\r\nPlot No.1, Survey No. 77 MIDC Kharadi Knowledge Park\r\nPune – 411014, Maharashtra, India.', '', 'Prashant', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '229341.000000000000000', '0.000000000000000', '229341.000000000000000', '270622.380000000000000', NULL, '41281.380000000000000', NULL, 'Estimate', 0, 0, 0, 39, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-11-10 05:42:45', '2017-11-10 05:55:38'),
(123, 2, 95, 'WS3D Interior', 'Client Legal Id', 'whitestyle3d@gmail.com', 'Shop No 1, Balkrushna Appt., Behind Police Chowky, Narayan Peth, Pune', '', 'Lalit Surve', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n4.Content, images and logo will be provided by customer, if the requirement will be provided by our end then that would be chargeable. \r\n\r\nThank you for your business\r\n', '', '20734.000000000000000', '0.000000000000000', '20734.000000000000000', '24466.120000000000000', NULL, '3732.120000000000000', NULL, 'Estimate', 0, 0, 0, 32, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-11-10 09:40:33', '2017-11-10 09:51:06'),
(124, 1, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '900.000000000000000', '0.000000000000000', '900.000000000000000', '1062.000000000000000', NULL, '162.000000000000000', NULL, 'Estimate', 0, 0, 0, 40, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-11-11 04:42:05', '2017-11-13 06:53:26'),
(125, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '15940.000000000000000', '0.000000000000000', '15940.000000000000000', '18557.200000000000000', '18557.200000000000000', '2617.200000000000000', 1, 'Invoice', 0, 0, 0, 30, NULL, '2017-11-11', '2017-12-11', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-11 04:42:29', '2017-11-11 10:17:14'),
(126, 1, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '900.000000000000000', '0.000000000000000', '900.000000000000000', '1062.000000000000000', '1062.000000000000000', '162.000000000000000', 1, 'Invoice', 0, 0, 0, 31, NULL, '2017-11-13', '2017-12-13', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-13 06:53:26', '2017-11-24 05:38:05'),
(127, 2, 40, 'JSPM College', 'Client Legal Id', 'rkpv2002@gmail.com', 'Pune', '', 'Rajesh Kulkarni', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '125000.000000000000000', '0.000000000000000', '125000.000000000000000', '125000.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 33, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-11-13 11:13:12', '2017-11-13 11:13:21'),
(128, 1, 97, 'Mother Foods', 'Client Legal Id', '', 'Majri,Pune', 'Shipping Address', 'Gaurav Sharma', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '25000.000000000000000', '0.000000000000000', '25000.000000000000000', '25000.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 41, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-11-13 13:09:55', '2017-11-13 13:09:55'),
(129, 2, 48, 'Intelivus Technologies', 'Client Legal Id', 'patelameet1908@gmail.com', 'Dhayari-Pune', 'Shipping Address', 'Ameet Patel (9371594035)', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2890.000000000000000', '0.000000000000000', '2890.000000000000000', '3410.200000000000000', NULL, '520.200000000000000', NULL, 'Estimate', 0, 0, 0, 34, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-11-14 05:34:05', '2017-12-06 05:11:53'),
(130, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3600.000000000000000', '0.000000000000000', '3600.000000000000000', '4248.000000000000000', NULL, '648.000000000000000', NULL, 'Estimate', 0, 0, 0, 42, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-11-21 12:34:43', '2017-11-28 07:15:38'),
(131, 2, 41, 'Ushakal Tech Reinventions ', 'Client Legal Id', 'jitendra@ushakal.com', 'Pune', '', 'Jitendra -9820544550', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2754.000000000000000', '0.000000000000000', '2754.000000000000000', '3249.720000000000000', NULL, '495.720000000000000', NULL, 'Estimate', 0, 0, 0, 43, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-11-23 12:44:17', '2017-11-27 04:49:54'),
(132, 2, 41, 'Ushakal Tech Reinventions ', 'Client Legal Id', 'jitendra@ushakal.com', 'Pune', '', 'Jitendra -9820544550', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2754.000000000000000', '0.000000000000000', '2754.000000000000000', '3249.720000000000000', '0.000000000000000', '495.720000000000000', 3, 'Invoice', 0, 0, 0, 28, NULL, '2017-11-27', '2017-12-27', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-27 04:49:54', '2017-12-29 09:52:52'),
(133, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3600.000000000000000', '0.000000000000000', '3600.000000000000000', '4248.000000000000000', '4248.000000000000000', '648.000000000000000', 1, 'Invoice', 0, 0, 0, 32, NULL, '2017-11-28', '2017-12-28', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-28 07:15:38', '2017-12-06 07:43:31'),
(134, 1, 44, 'Wisdom Nursery School', 'Client Legal Id', 'wisdomnurseryschool@gmail.com', 'Pune', 'Shipping Address', 'Siddhaye-9822046063', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '750.000000000000000', '0.000000000000000', '750.000000000000000', '840.000000000000000', NULL, '90.000000000000000', NULL, 'Estimate', 0, 0, 0, 43, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-11-29 08:09:15', '2017-12-08 09:48:49'),
(135, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '7005.000000000000000', '0.000000000000000', '7005.000000000000000', '7005.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 44, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-11-29 13:08:52', '2017-11-29 13:08:52'),
(136, 1, 41, 'Ushakal Tech Reinventions ', 'Client Legal Id', 'gurudatta@e-bc.in', 'Pune', '', '', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '955.000000000000000', '0.000000000000000', '955.000000000000000', '1069.600000000000000', '0.000000000000000', '114.600000000000000', 3, 'Invoice', 0, 0, 0, 33, NULL, '2017-12-01', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-01 05:10:25', '2017-12-01 05:10:25'),
(137, 2, 24, 'Mach2 International', '', 'sales_mach2@outlook.com', 'Unit No 4 Gananjay Housing Society , Lane No. 1 Bunglow No 3, Azad Wadi,\r\nKothrud, Pune-411038 ', 'Shipping Address', 'Hrishikesh Thakurdesai', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '21000.000000000000000', '0.000000000000000', '21000.000000000000000', '24780.000000000000000', NULL, '3780.000000000000000', NULL, 'Estimate', 0, 0, 0, 44, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-12-01 07:04:10', '2017-12-01 07:04:10'),
(138, 1, 63, 'Ram Ratna', 'Client Legal Id', '', 'Infrastructure P Ltd S No. B/1A2.11 & 12 Honad-Vilage ', 'Shipping Address', 'Contact Person', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3160.000000000000000', '0.000000000000000', '3160.000000000000000', '3728.800000000000000', '3728.800000000000000', '568.800000000000000', 1, 'Invoice', 0, 0, 0, 34, NULL, '2017-12-04', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-04 08:00:33', '2018-03-15 07:29:35'),
(139, 1, 44, 'Wisdom Nursery School', 'Client Legal Id', 'wisdomnurseryschool@gmail.com', 'Pune', 'Shipping Address', 'Siddhaye-9822046063', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '570.000000000000000', '0.000000000000000', '570.000000000000000', '672.600000000000000', NULL, '102.600000000000000', NULL, 'Estimate', 0, 0, 0, 45, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-12-04 11:46:58', '2017-12-04 11:48:59'),
(140, 1, 98, 'B K Steel ', 'Client Legal Id', '', 'Survey No 132/2, Dsk Road, Dhayari, Pune - 411041', 'Shipping Address', 'Contact Person', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '5000.000000000000000', '0.000000000000000', '5000.000000000000000', '5600.000000000000000', NULL, '600.000000000000000', NULL, 'Estimate', 0, 0, 0, 46, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-12-05 09:04:00', '2017-12-21 05:56:13'),
(141, 2, 48, 'Intelivus Technologies', 'Client Legal Id', 'patelameet1908@gmail.com', 'Dhayari-Pune', 'Shipping Address', 'Ameet Patel (9371594035)', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2890.000000000000000', '0.000000000000000', '2890.000000000000000', '3410.200000000000000', '3410.200000000000000', '520.200000000000000', 1, 'Invoice', 0, 0, 0, 29, NULL, '2017-12-06', '2018-01-06', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-06 05:11:53', '2017-12-30 04:54:15'),
(142, 1, 44, 'Wisdom Nursery School', 'Client Legal Id', 'wisdomnurseryschool@gmail.com', 'Pune', 'Shipping Address', 'Siddhaye-9822046063', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '750.000000000000000', '0.000000000000000', '750.000000000000000', '840.000000000000000', '840.000000000000000', '90.000000000000000', 1, 'Invoice', 0, 0, 0, 35, NULL, '2017-12-08', '2018-01-08', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-08 09:48:49', '2017-12-18 06:17:21'),
(143, 1, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '24000.000000000000000', '0.000000000000000', '24000.000000000000000', '26880.000000000000000', NULL, '2880.000000000000000', NULL, 'Estimate', 0, 0, 0, 47, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-12-11 12:23:41', '2017-12-12 07:50:18'),
(144, 2, 99, 'Trikaya Ayurved', 'Client Legal Id', '', 'Pune', '', 'Dr. Sachin Deshmukh', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3887.000000000000000', '0.000000000000000', '3887.000000000000000', '4586.660000000000000', NULL, '699.660000000000000', NULL, 'Estimate', 0, 0, 0, 45, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-12-13 06:45:27', '2018-01-08 13:05:41'),
(145, 2, 100, 'Namoh Builders & Developers', 'Client Legal Id', '', 'Pune', 'Shipping Address', '', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '8270.000000000000000', '0.000000000000000', '8270.000000000000000', '9758.600000000000000', NULL, '1488.600000000000000', NULL, 'Estimate', 0, 0, 0, 46, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-12-14 05:59:38', '2018-01-29 07:33:31'),
(146, 2, 33, 'Nutan Mahavidyalaya', 'Client Legal Id', 'devidasdhekle54@gmail.com', 'Selu, Nanded', '', 'Mr.Santosh Dandwate', '1. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n2. Subject to Pune Jurisdiction\r\n\r\nBank Details:\r\nBank Name: IDBI Bank\r\nA/C No. 0641102000016737\r\nIFSC code: IBKL0000641\r\nBranch : Anand nagar sinhagad road pune\r\n\r\nThank you for your business\r\n', '', '15000.000000000000000', '0.000000000000000', '15000.000000000000000', '17700.000000000000000', '17700.000000000000000', '2700.000000000000000', 1, 'Invoice', 0, 0, 0, 30, NULL, '2017-12-16', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-16 05:04:00', '2017-12-30 04:53:54'),
(147, 1, 79, 'Aaradhya enterprises', 'Client Legal Id', 'aaradhya.enterprises88@gmail.com', ' A-402 radhika apartment, near aditya nakoda,\r\nsarita nagari phase 2, sinhgad road pune 411030. ', '', 'Anand Chitale-9552777928', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2455.000000000000000', '0.000000000000000', '2455.000000000000000', '2650.900000000000000', NULL, '195.900000000000000', NULL, 'Estimate', 0, 0, 0, 48, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-12-18 06:17:05', '2017-12-18 13:39:14'),
(148, 1, 24, 'Mach2 International', '', 'sales_mach2@outlook.com', 'Unit No 4 Gananjay Housing Society , Lane No. 1 Bunglow No 3, Azad Wadi,\r\nKothrud, Pune-411038 ', 'Shipping Address', 'Hrishikesh Thakurdesai', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '13000.000000000000000', '0.000000000000000', '13000.000000000000000', '13650.000000000000000', NULL, '650.000000000000000', NULL, 'Estimate', 0, 0, 0, 49, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2017-12-18 06:26:25', '2017-12-18 11:49:27'),
(149, 1, 24, 'Mach2 International', '', 'sales_mach2@outlook.com', 'Unit No 4 Gananjay Housing Society , Lane No. 1 Bunglow No 3, Azad Wadi,\r\nKothrud, Pune-411038 ', 'Shipping Address', 'Hrishikesh Thakurdesai', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '13000.000000000000000', '0.000000000000000', '13000.000000000000000', '13650.000000000000000', '13650.000000000000000', '650.000000000000000', 1, 'Invoice', 0, 0, 0, 36, NULL, '2017-12-18', '2018-01-18', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-18 11:49:27', '2018-01-02 05:58:15'),
(150, 2, 24, 'Mach2 International', '', 'sales_mach2@outlook.com', 'Unit No 4 Gananjay Housing Society , Lane No. 1 Bunglow No 3, Azad Wadi,\r\nKothrud, Pune-411038 ', 'Shipping Address', 'Hrishikesh Thakurdesai', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '6000.000000000000000', '0.000000000000000', '6000.000000000000000', '7080.000000000000000', '7080.000000000000000', '1080.000000000000000', 1, 'Invoice', 0, 0, 0, 31, NULL, '2017-12-18', '2018-01-18', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-18 11:50:45', '2018-01-02 05:58:25'),
(151, 1, 79, 'Aaradhya enterprises', 'Client Legal Id', 'aaradhya.enterprises88@gmail.com', ' A-402 radhika apartment, near aditya nakoda,\r\nsarita nagari phase 2, sinhgad road pune 411030. ', '', 'Anand Chitale-9552777928', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2455.000000000000000', '0.000000000000000', '2455.000000000000000', '2650.900000000000000', '2650.900000000000000', '195.900000000000000', 1, 'Invoice', 0, 0, 0, 37, NULL, '2017-12-18', '2018-01-18', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-18 13:39:14', '2018-01-01 07:05:08'),
(152, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2540.000000000000000', '0.000000000000000', '2540.000000000000000', '2997.200000000000000', '2997.200000000000000', '457.200000000000000', 1, 'Invoice', 0, 0, 0, 38, NULL, '2017-12-20', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-20 04:16:03', '2018-01-02 05:58:05'),
(153, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1100.000000000000000', '0.000000000000000', '1100.000000000000000', '1100.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 50, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-01-02 06:21:53', '2018-01-02 06:21:53'),
(154, 1, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2780.000000000000000', '0.000000000000000', '2780.000000000000000', '3280.400000000000000', NULL, '500.400000000000000', NULL, 'Estimate', 0, 0, 0, 51, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-01-08 05:28:28', '2018-01-10 05:32:09'),
(155, 2, 51, 'GK Hip Hop', 'Client Legal Id', 'patelameet1908@gmail.com', 'Dhayri Pune', '', 'Ameet Patel', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3430.000000000000000', '0.000000000000000', '3430.000000000000000', '4047.400000000000000', NULL, '617.400000000000000', NULL, 'Estimate', 0, 0, 0, 47, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-01-08 10:37:07', '2018-01-08 10:37:07'),
(156, 2, 99, 'Trikaya Ayurved', 'Client Legal Id', '', 'Pune', '', 'Dr. Sachin Deshmukh', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3887.000000000000000', '0.000000000000000', '3887.000000000000000', '4586.660000000000000', '4586.660000000000000', '699.660000000000000', 1, 'Invoice', 0, 0, 0, 32, NULL, '2018-01-08', '2018-02-08', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-08 13:05:41', '2018-01-09 10:59:48'),
(157, 2, 4, 'Almar Foods', '', 'ramaa.enterprises1@gmail.com', '237 Shukrawar Peth nr. Bafna Petrol Pump,\r\nPune - 410506,\r\nMaharashtra, India.', '237 Shukrawar Peth nr. Bafna Petrol Pump,\r\nPune - 410506,\r\nMaharashtra, India.', 'Mandar Gokhale', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '12210.000000000000000', '0.000000000000000', '12210.000000000000000', '14137.800000000000000', NULL, '1927.800000000000000', NULL, 'Estimate', 0, 0, 0, 48, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-01-09 10:28:46', '2018-01-23 09:23:28'),
(158, 1, 24, 'Mach2 International', '', 'sales_mach2@outlook.com', 'Unit No 4 Gananjay Housing Society , Lane No. 1 Bunglow No 3, Azad Wadi,\r\nKothrud, Pune-411038 ', 'Shipping Address', 'Hrishikesh Thakurdesai', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '38500.000000000000000', '0.000000000000000', '38500.000000000000000', '38500.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 52, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-01-09 12:00:00', '2018-01-11 09:33:16');
INSERT INTO `common` (`id`, `series_id`, `customer_id`, `customer_name`, `customer_identification`, `customer_email`, `invoicing_address`, `shipping_address`, `contact_person`, `terms`, `notes`, `base_amount`, `discount_amount`, `net_amount`, `gross_amount`, `paid_amount`, `tax_amount`, `status`, `type`, `draft`, `closed`, `sent_by_email`, `number`, `recurring_invoice_id`, `issue_date`, `due_date`, `days_to_due`, `enabled`, `max_occurrences`, `must_occurrences`, `period`, `period_type`, `starting_date`, `finishing_date`, `last_execution_date`, `created_at`, `updated_at`) VALUES
(159, 1, 8, 'Tri Polaron Pvt.Ltd', '', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '18340.000000000000000', '0.000000000000000', '18340.000000000000000', '21641.200000000000000', NULL, '3301.200000000000000', NULL, 'Estimate', 0, 0, 0, 53, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-01-10 05:29:17', '2018-02-06 12:53:09'),
(160, 1, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2780.000000000000000', '0.000000000000000', '2780.000000000000000', '3280.400000000000000', '3280.400000000000000', '500.400000000000000', 1, 'Invoice', 0, 0, 0, 39, NULL, '2018-01-10', '2018-02-10', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-10 05:32:09', '2018-03-15 07:29:20'),
(161, 2, 101, 'Heuu Industrial Spaces', 'Client Legal Id', '', 'MIDC, Chinchwad, Pimpri-Chinchwad, Maharashtra 411019', '', 'Contact Person', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '30000.000000000000000', '0.000000000000000', '30000.000000000000000', '35400.000000000000000', NULL, '5400.000000000000000', NULL, 'Estimate', 0, 0, 0, 49, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-01-12 06:13:11', '2018-01-12 06:27:03'),
(162, 2, 33, 'Nutan Mahavidyalaya', 'Client Legal Id', 'devidasdhekle54@gmail.com', 'Pune', '', 'Mr.Santosh Dandwate', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '9000.000000000000000', '0.000000000000000', '9000.000000000000000', '10620.000000000000000', '10620.000000000000000', '1620.000000000000000', 1, 'Invoice', 0, 0, 0, 33, NULL, '2018-01-15', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-15 10:20:42', '2018-03-15 07:29:07'),
(163, 2, 50, 'Shiprich Shipping', 'Client Legal Id', 'devavrat@shiprichshipping.com', '', 'Shipping Address', 'Devavrat Sathaye -8087997816', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3220.000000000000000', '0.000000000000000', '3220.000000000000000', '3799.600000000000000', NULL, '579.600000000000000', NULL, 'Estimate', 0, 0, 0, 50, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-01-16 07:12:00', '2018-01-17 10:49:24'),
(164, 1, 24, 'Mach2 International', '', 'sales_mach2@outlook.com', 'Unit No 4 Gananjay Housing Society , Lane No. 1 Bunglow No 3, Azad Wadi,\r\nKothrud, Pune-411038 ', 'Shipping Address', 'Hrishikesh Thakurdesai', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '19500.000000000000000', '0.000000000000000', '19500.000000000000000', '20475.000000000000000', NULL, '975.000000000000000', NULL, 'Estimate', 0, 0, 0, 54, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-01-17 04:43:41', '2018-01-29 04:41:50'),
(165, 2, 50, 'Shiprich Shipping', 'Client Legal Id', 'devavrat@shiprichshipping.com', 'Pune', 'Shipping Address', 'Devavrat Sathaye -8087997816', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '6820.000000000000000', '0.000000000000000', '6820.000000000000000', '8047.600000000000000', NULL, '1227.600000000000000', NULL, 'Estimate', 0, 0, 0, 51, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-01-17 05:13:48', '2018-01-17 05:16:00'),
(166, 2, 50, 'Shiprich Shipping', 'Client Legal Id', 'devavrat@shiprichshipping.com', '', 'Shipping Address', 'Devavrat Sathaye -8087997816', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3220.000000000000000', '0.000000000000000', '3220.000000000000000', '3799.600000000000000', '3799.600000000000000', '579.600000000000000', 1, 'Invoice', 0, 0, 0, 34, NULL, '2018-01-17', '2018-02-17', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-17 10:49:24', '2018-01-17 11:06:38'),
(167, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '4740.000000000000000', '0.000000000000000', '4740.000000000000000', '5197.200000000000000', NULL, '457.200000000000000', NULL, 'Estimate', 0, 0, 0, 55, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-01-20 05:37:40', '2018-01-25 11:02:31'),
(168, 2, 102, 'Dr. J.J. Magdum College Of Engineering, Jaysingpur ', 'Client Legal Id', 'pranavmagdum123456@gmail.com', 'Gat No. 314/330 , Shirol - Wadi Road, Agar Bhag, Jaysingpur, Maharashtra 416101', 'Shipping Address', 'Pranav Magdum - 9922489992', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '252000.000000000000000', '0.000000000000000', '252000.000000000000000', '252000.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 52, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-01-20 07:25:51', '2018-01-20 07:28:43'),
(169, 2, 4, 'Almar Foods', '', 'ramaa.enterprises1@gmail.com', '237 Shukrawar Peth nr. Bafna Petrol Pump,\r\nPune - 410506,\r\nMaharashtra, India.', '237 Shukrawar Peth nr. Bafna Petrol Pump,\r\nPune - 410506,\r\nMaharashtra, India.', 'Mandar Gokhale', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '12210.000000000000000', '0.000000000000000', '12210.000000000000000', '14137.800000000000000', '0.000000000000000', '1927.800000000000000', 3, 'Invoice', 0, 0, 0, 35, NULL, '2018-01-23', '2018-02-23', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-23 09:23:28', '2019-04-29 11:31:54'),
(170, 1, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '950.000000000000000', '0.000000000000000', '950.000000000000000', '1064.000000000000000', '1064.000000000000000', '114.000000000000000', 1, 'Invoice', 0, 0, 0, 40, NULL, '2018-01-24', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-24 05:20:01', '2018-03-15 07:28:58'),
(171, 2, 103, 'Kamlakar ', 'Client Legal Id', '', 'Pune', 'Shipping Address', 'Kamlakar - 9765222019', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '25490.000000000000000', '0.000000000000000', '25490.000000000000000', '30078.200000000000000', NULL, '4588.200000000000000', NULL, 'Estimate', 0, 0, 0, 53, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-01-24 09:40:16', '2018-01-24 09:49:37'),
(172, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '4740.000000000000000', '0.000000000000000', '4740.000000000000000', '5197.200000000000000', '5197.200000000000000', '457.200000000000000', 1, 'Invoice', 0, 0, 0, 41, NULL, '2018-01-25', '2018-02-25', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-25 11:02:31', '2018-04-04 07:26:09'),
(173, 1, 24, 'Mach2 International', '', 'sales_mach2@outlook.com', 'Unit No 4 Gananjay Housing Society , Lane No. 1 Bunglow No 3, Azad Wadi,\r\nKothrud, Pune-411038 ', 'Shipping Address', 'Hrishikesh Thakurdesai', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '19500.000000000000000', '0.000000000000000', '19500.000000000000000', '20475.000000000000000', '20475.000000000000000', '975.000000000000000', 1, 'Invoice', 0, 0, 0, 42, NULL, '2018-01-29', '2018-03-01', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-29 04:41:50', '2018-02-02 07:59:38'),
(174, 2, 100, 'Namoh Builders & Developers', 'Client Legal Id', '', 'Pune', 'Shipping Address', '', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '8270.000000000000000', '0.000000000000000', '8270.000000000000000', '9758.600000000000000', '9758.600000000000000', '1488.600000000000000', 1, 'Invoice', 0, 0, 0, 36, NULL, '2018-01-29', '2018-03-01', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-29 07:33:31', '2018-02-02 07:59:53'),
(175, 2, 49, 'Citylines Pvt. Ltd', 'Client Legal Id', 'bookings@citylines.co.in', 'Katraj,Pune', '', 'Mr.Sandeep', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '7250.000000000000000', '0.000000000000000', '7250.000000000000000', '8555.000000000000000', NULL, '1305.000000000000000', NULL, 'Estimate', 0, 0, 0, 54, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-01-29 08:02:26', '2018-02-02 07:59:01'),
(176, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '25150.000000000000000', '0.000000000000000', '25150.000000000000000', '25150.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 56, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-01-30 07:07:23', '2018-04-09 09:55:03'),
(177, 2, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '97500.000000000000000', '0.000000000000000', '97500.000000000000000', '115050.000000000000000', '0.000000000000000', '17550.000000000000000', 3, 'Invoice', 0, 0, 0, 37, NULL, '2018-03-28', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-30 09:05:59', '2018-03-28 08:10:51'),
(178, 2, 105, 'Placewell consultancy', 'Client Legal Id', 'sanjay@placewell.net', 'Pune', 'Shipping Address', 'Sanjay Manohar - 9920916830', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1223.000000000000000', '0.000000000000000', '1223.000000000000000', '1443.140000000000000', NULL, '220.140000000000000', NULL, 'Estimate', 0, 0, 0, 57, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-02-01 09:20:05', '2018-02-07 06:25:17'),
(179, 2, 9, 'A B Gensets Pvt. Ltd', 'Client Legal Id', 'purchase@abgensets.co.in', 'Dhayari,Pune', 'Dhayari,Pune', 'Preeti Madam- 7620470606', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2899.000000000000000', '0.000000000000000', '2899.000000000000000', '3420.820000000000000', NULL, '521.820000000000000', NULL, 'Estimate', 0, 0, 0, 58, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-02-01 09:30:30', '2018-03-06 08:33:38'),
(180, 2, 42, 'eyedentity ', 'Client Legal Id', '', '215 Creative Industrial Estate 2nd Floor N.M Joshi Marg Mumbai - 400011', 'Shipping Address', '9930868705', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '15540.000000000000000', '0.000000000000000', '15540.000000000000000', '18337.200000000000000', NULL, '2797.200000000000000', NULL, 'Estimate', 0, 0, 0, 59, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-02-01 09:56:09', '2018-02-13 05:22:55'),
(181, 2, 49, 'Citylines Pvt. Ltd', 'Client Legal Id', 'bookings@citylines.co.in', 'Katraj,Pune', '', 'Mr.Sandeep', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '7250.000000000000000', '0.000000000000000', '7250.000000000000000', '8555.000000000000000', '8555.000000000000000', '1305.000000000000000', 1, 'Invoice', 0, 0, 0, 38, NULL, '2018-02-02', '2018-03-02', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-02 07:59:01', '2018-02-13 05:06:50'),
(182, 2, 58, 'Paradigm Building Solutions Pvt. Ltd.', 'Client Legal Id', 'paradigmbuildsol@gmail.com', 'Pune', 'Shipping Address', 'Yatin Jog', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '12750.000000000000000', '0.000000000000000', '12750.000000000000000', '15045.000000000000000', NULL, '2295.000000000000000', NULL, 'Estimate', 0, 0, 0, 60, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-02-06 06:13:07', '2018-02-06 06:13:07'),
(183, 1, 58, 'Paradigm Building Solutions Pvt. Ltd.', 'Client Legal Id', 'paradigmbuildsol@gmail.com', 'S.No. 20/21, Plot No. 39/1, Sampada Bungalow, Ground Floor, Patwardhan Baug, Erandwane, Kothrud, Pune, Maharashtra 411004', 'S.No. 20/21, Plot No. 39/1, Sampada Bungalow, Ground Floor, Patwardhan Baug, Erandwane, Kothrud, Pune, Maharashtra 411004', 'Yatin Jog', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '5850.000000000000000', '0.000000000000000', '5850.000000000000000', '6840.000000000000000', '6840.000000000000000', '990.000000000000000', 1, 'Invoice', 0, 0, 0, 43, NULL, '2018-02-06', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-06 12:13:21', '2018-03-15 07:28:37'),
(184, 1, 8, 'Tri Polaron Pvt.Ltd', '', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '18340.000000000000000', '0.000000000000000', '18340.000000000000000', '21641.200000000000000', '21641.200000000000000', '3301.200000000000000', 1, 'Invoice', 0, 0, 0, 44, NULL, '2018-02-06', '2018-03-06', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-06 12:53:09', '2018-03-15 07:28:25'),
(185, 2, 105, 'Placewell consultancy', 'Client Legal Id', 'sanjay@placewell.net', 'Pune', 'Shipping Address', 'Sanjay Manohar - 9920916830', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1223.000000000000000', '0.000000000000000', '1223.000000000000000', '1443.140000000000000', '1443.140000000000000', '220.140000000000000', 1, 'Invoice', 0, 0, 0, 39, NULL, '2018-02-07', '2018-03-07', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-07 06:25:17', '2018-02-13 05:06:38'),
(186, 2, 44, 'Wisdom Nursery School', 'Client Legal Id', 'wisdomnurseryschool@gmail.com', 'Pune', 'Shipping Address', 'Siddhaye-9822046063', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '6200.000000000000000', '0.000000000000000', '6200.000000000000000', '6200.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 61, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-02-08 10:04:27', '2018-04-11 07:42:02'),
(187, 2, 101, 'Heuu Industrial Spaces', 'Client Legal Id', 'sandeshgangwal@gmail.com', 'MIDC, Chinchwad, Pimpri-Chinchwad, Maharashtra 411019', '', 'Mr.Sandesh Gangwal', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '5000.000000000000000', '0.000000000000000', '5000.000000000000000', '5900.000000000000000', NULL, '900.000000000000000', NULL, 'Estimate', 0, 0, 0, 62, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-02-09 05:29:35', '2018-02-12 12:42:48'),
(188, 2, 42, 'eyedentity ', 'Client Legal Id', '', '215 Creative Industrial Estate 2nd Floor N.M Joshi Marg Mumbai - 400011', 'Shipping Address', '9930868705', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '15540.000000000000000', '0.000000000000000', '15540.000000000000000', '18337.200000000000000', '0.000000000000000', '2797.200000000000000', 3, 'Invoice', 0, 0, 0, 40, NULL, '2018-02-13', '2018-03-13', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-13 05:22:55', '2018-03-13 10:05:04'),
(189, 5, 12, 'Travel Time Car Rental Pvt. Ltd', 'Client Legal Id', 'airport.pnq@traveltime.co.in', 'Aundh,pune', 'Aundh,pune', 'Aayaz-8554990195', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1200.000000000000000', '0.000000000000000', '1200.000000000000000', '1380.000000000000000', '0.000000000000000', '180.000000000000000', 3, 'Invoice', 0, 0, 0, 76, NULL, '2016-10-01', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-13 05:51:37', '2018-02-13 05:55:56'),
(190, 5, 12, 'Travel Time Car Rental Pvt. Ltd', 'Client Legal Id', 'airport.pnq@traveltime.co.in', 'Aundh,pune', 'Aundh,pune', 'Aayaz-8554990195', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3123.000000000000000', '0.000000000000000', '3123.000000000000000', '3591.450000000000000', '0.000000000000000', '468.450000000000000', 3, 'Invoice', 0, 0, 0, 77, NULL, '2017-03-14', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-13 05:57:20', '2018-02-13 05:57:20'),
(191, 1, 4, 'Almar Foods', '', 'ramaa.enterprises1@gmail.com', '237 Shukrawar Peth nr. Bafna Petrol Pump,\r\nPune - 410506,\r\nMaharashtra, India.', '237 Shukrawar Peth nr. Bafna Petrol Pump,\r\nPune - 410506,\r\nMaharashtra, India.', 'Mandar Gokhale', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '10500.000000000000000', '0.000000000000000', '10500.000000000000000', '11760.000000000000000', NULL, '1260.000000000000000', NULL, 'Estimate', 0, 0, 0, 57, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-02-13 11:39:05', '2018-02-13 11:39:05'),
(192, 1, 106, 'saama technologies', 'Client Legal Id', '', 'Level-10, Building - IT8 &\r\nLevel- 6, Building - IT4\r\nQubix SEZ, Blue Ridge,\r\nSurvey No. 154/6,Phase -1,\r\nRajiv Gandhi Infotech Park,\r\nHinjewadi, Pune - 411057 INDIA', 'Shipping Address', '', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '6532.000000000000000', '0.000000000000000', '6532.000000000000000', '7255.840000000000000', NULL, '723.840000000000000', NULL, 'Estimate', 0, 0, 0, 58, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-02-19 10:25:35', '2018-02-19 10:25:35'),
(193, 1, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1270.000000000000000', '0.000000000000000', '1270.000000000000000', '1441.300000000000000', NULL, '171.300000000000000', NULL, 'Estimate', 0, 0, 0, 59, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-02-21 04:14:25', '2018-02-27 06:49:33'),
(194, 2, 29, 'Vishwkrma Enterprises', 'Client Legal Id', 'Info@vishwakarma-enterprises.com', 'Dhayari Pune', 'Shipping Address', 'K.P Sonawne', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2956.000000000000000', '0.000000000000000', '2956.000000000000000', '3488.080000000000000', NULL, '532.080000000000000', NULL, 'Estimate', 0, 0, 0, 63, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-02-22 04:58:45', '2018-02-22 04:58:45'),
(195, 2, 99, 'Trikaya Ayurved', 'Client Legal Id', '', 'Pune', '', 'Dr. Sachin Deshmukh', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '20000.000000000000000', '0.000000000000000', '20000.000000000000000', '20000.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 64, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-02-22 09:53:24', '2018-02-22 10:17:11'),
(196, 2, 107, 'Goodlife Foundation ', '', 'harshad.dantale@gmail.com', 'Pune', '', 'Harshad Dantale', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '37200.000000000000000', '0.000000000000000', '37200.000000000000000', '43896.000000000000000', NULL, '6696.000000000000000', NULL, 'Estimate', 0, 0, 0, 65, NULL, '2018-02-26', NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-02-26 05:20:27', '2018-02-26 05:20:27'),
(197, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3600.000000000000000', '0.000000000000000', '3600.000000000000000', '3600.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 60, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-02-27 06:01:58', '2018-02-27 06:01:58'),
(198, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '6740.000000000000000', '0.000000000000000', '6740.000000000000000', '6740.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 61, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-02-27 06:23:16', '2018-02-27 06:23:16'),
(199, 1, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1270.000000000000000', '0.000000000000000', '1270.000000000000000', '1441.300000000000000', '0.000000000000000', '171.300000000000000', 3, 'Invoice', 0, 0, 0, 45, NULL, '2018-02-27', '2018-03-27', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-27 06:49:33', '2018-03-27 05:30:26'),
(200, 1, 108, 'Anudin Services', 'Client Legal Id', 'anudinservices@gmail.com', 'Pune', '', '7276619996', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '38500.000000000000000', '0.000000000000000', '38500.000000000000000', '45430.000000000000000', NULL, '6930.000000000000000', NULL, 'Estimate', 0, 0, 0, 62, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-02-28 09:09:39', '2018-02-28 09:10:08'),
(201, 2, 109, 'Uniglobe Remarkable India', 'Client Legal Id', 'abakshi@unigloberemarkableindia.in', 'Bhandarkar Raod Pune', 'Shipping Address', 'Amol Bakshi', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nAccount Name-   E Business Canvas \r\nBank Name-    IDBI Bank \r\nIFSC Code-      IBKL0000641 \r\nAccount No.-   0641102000016737 \r\nBranch-           Anand Nagar,Sinhgad Road,Pune \r\n\r\nThank you for your business\r\n', '', '18887.000000000000000', '423.000000000000000', '18464.000000000000000', '21787.520000000000000', NULL, '3323.520000000000000', NULL, 'Estimate', 0, 0, 0, 66, NULL, '2018-03-05', NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-05 08:09:14', '2018-03-21 06:33:49'),
(202, 2, 110, 'Bharat Supplier ', 'Client Legal Id', 'ggautam582@gmail.com', 'Pune', 'Shipping Address', 'Gautam', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '38500.000000000000000', '0.000000000000000', '38500.000000000000000', '45430.000000000000000', NULL, '6930.000000000000000', NULL, 'Estimate', 0, 0, 0, 63, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-05 13:26:54', '2018-03-05 13:28:22'),
(203, 2, 111, 'Sai Kusum Construction', 'Client Legal Id', 'nikhilgaikwad003@gmail.com', '', 'Shipping Address', 'Nikhil Gaikwad - 9890679841', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2500.000000000000000', '0.000000000000000', '2500.000000000000000', '2950.000000000000000', NULL, '450.000000000000000', NULL, 'Estimate', 0, 0, 0, 63, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-06 07:16:18', '2018-03-06 07:18:29'),
(204, 2, 9, 'A B Gensets Pvt. Ltd', 'Client Legal Id', 'purchase@abgensets.co.in', 'Dhayari,Pune', 'Dhayari,Pune', 'Preeti Madam- 7620470606', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2899.000000000000000', '0.000000000000000', '2899.000000000000000', '3420.820000000000000', '3420.820000000000000', '521.820000000000000', 1, 'Invoice', 0, 0, 0, 41, NULL, '2018-03-06', '2018-04-06', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-06 08:33:38', '2018-03-08 06:50:08'),
(205, 1, 12, 'Travel Time Car Rental Pvt. Ltd', 'Client Legal Id', '', 'Aundh,pune', 'Aundh,pune', 'Nayna Kalkar ', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '10584.000000000000000', '0.000000000000000', '10584.000000000000000', '10584.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 63, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-08 07:00:50', '2018-03-08 07:01:39'),
(206, 2, 24, 'Mach2 International', '', 'sales_mach2@outlook.com', 'Unit No 4 Gananjay Housing Society , Lane No. 1 Bunglow No 3, Azad Wadi,\r\nKothrud, Pune-411038 ', 'Shipping Address', 'Hrishikesh Thakurdesai', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '19500.000000000000000', '0.000000000000000', '19500.000000000000000', '23010.000000000000000', NULL, '3510.000000000000000', NULL, 'Estimate', 0, 0, 0, 67, NULL, '2018-03-08', NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-08 11:02:12', '2018-05-22 08:47:46'),
(207, 5, 48, 'Intelivus Technologies', 'Client Legal Id', 'patelameet1908@gmail.com', 'Dhayari-Pune', '', ' Ameet Patel (9371594035)', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1620.000000000000000', '0.000000000000000', '1620.000000000000000', '1911.600000000000000', NULL, '291.600000000000000', NULL, 'Estimate', 0, 0, 0, 64, NULL, '2018-03-08', NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-08 13:25:59', '2018-03-09 07:07:16'),
(208, 2, 18, 'URS Technologies Solutions', 'Client Legal Id', '', 'Flat No-604 Sun residency Near Kilas Jiven Dhayari Pune-41', 'Shipping Address', 'Amit Patel', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1620.000000000000000', '0.000000000000000', '1620.000000000000000', '1911.600000000000000', '1911.600000000000000', '291.600000000000000', 1, 'Invoice', 0, 0, 0, 42, NULL, '2018-03-09', '2018-04-09', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-09 07:07:16', '2018-04-04 07:25:14'),
(209, 1, 112, 'Seva Sahayog Foundation', 'Client Legal Id', 'ravi.gokhale@sevasahayog.com', '18 Vrindavan Society, Pathik Bungalow, Near Mhatre Bridge, Navi peth, Pune 411030', 'Shipping Address', 'Ravi Gokhale', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '16195.000000000000000', '0.000000000000000', '16195.000000000000000', '18915.100000000000000', NULL, '2720.100000000000000', NULL, 'Estimate', 0, 0, 0, 64, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-12 05:32:25', '2018-03-12 06:25:04'),
(210, 2, 113, 'Dinkar Investments Pvt. Ltd', 'Client Legal Id', '', 'Pune', 'Shipping Address', '', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3600.000000000000000', '0.000000000000000', '3600.000000000000000', '4248.000000000000000', NULL, '648.000000000000000', NULL, 'Estimate', 0, 0, 0, 68, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-12 06:01:01', '2018-03-15 09:43:53'),
(211, 2, 12, 'Travel Time Car Rental Pvt. Ltd', 'Client Legal Id', 'airport.pnq@traveltime.co.in', 'Aundh,pune', 'Aundh,pune', 'Aayaz-8554990195', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3123.000000000000000', '0.000000000000000', '3123.000000000000000', '3685.140000000000000', NULL, '562.140000000000000', NULL, 'Estimate', 0, 0, 0, 69, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-13 10:07:59', '2018-03-16 05:43:01'),
(212, 2, 113, 'Dinkar Investments Pvt. Ltd', 'Client Legal Id', '', 'Pune', 'Shipping Address', '', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3600.000000000000000', '0.000000000000000', '3600.000000000000000', '4248.000000000000000', '0.000000000000000', '648.000000000000000', 3, 'Invoice', 0, 0, 0, 43, NULL, '2018-03-15', '2018-04-15', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-15 09:43:53', '2018-04-16 05:41:24'),
(213, 2, 12, 'Travel Time Car Rental Pvt. Ltd', 'Client Legal Id', 'airport.pnq@traveltime.co.in', 'Aundh,pune', 'Aundh,pune', 'Aayaz-8554990195', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3123.000000000000000', '0.000000000000000', '3123.000000000000000', '3685.140000000000000', '0.000000000000000', '562.140000000000000', 3, 'Invoice', 0, 0, 0, 44, NULL, '2018-03-16', '2018-04-16', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-16 05:43:01', '2018-04-16 05:41:24'),
(214, 2, 114, 'Sona College of Technology', 'Client Legal Id', 'nrp264@gmail.com', 'Junction Main Road, Suramangalam, Salem, Tamil Nadu 636005', 'Shipping Address', 'Nyan Patel', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '35000.000000000000000', '0.000000000000000', '35000.000000000000000', '41300.000000000000000', NULL, '6300.000000000000000', NULL, 'Estimate', 0, 0, 0, 70, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-16 06:29:49', '2018-03-16 11:47:22'),
(215, 2, 114, 'Sona College of Technology', 'Client Legal Id', 'nrp264@gmail.com', 'Junction Main Road, Suramangalam, Salem, Tamil Nadu 636005', 'Shipping Address', 'Nyan Patel', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3200.000000000000000', '0.000000000000000', '3200.000000000000000', '3776.000000000000000', NULL, '576.000000000000000', NULL, 'Estimate', 0, 0, 0, 71, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-16 11:48:54', '2018-03-16 11:48:54'),
(216, 2, 114, 'Sona College of Technology', 'Client Legal Id', 'nrp264@gmail.com', 'Junction Main Road, Suramangalam, Salem, Tamil Nadu 636005', 'Shipping Address', 'Nyan Patel', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '24000.000000000000000', '0.000000000000000', '24000.000000000000000', '28320.000000000000000', NULL, '4320.000000000000000', NULL, 'Estimate', 0, 0, 0, 72, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-16 11:50:17', '2018-03-16 11:50:17'),
(217, 2, 41, 'Ushakal Tech Reinventions ', 'Client Legal Id', 'gurudatta@e-bc.in', 'Pune', '', 'Jitendra -9820544550', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '125000.000000000000000', '0.000000000000000', '125000.000000000000000', '147500.000000000000000', '0.000000000000000', '22500.000000000000000', 3, 'Invoice', 0, 0, 0, 45, NULL, '2018-03-17', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-17 14:17:33', '2018-03-30 13:23:50'),
(218, 2, 115, 'Packnjoy', 'Client Legal Id', 'deshmukhswapnil287@gmail.com', 'Pune', 'Shipping Address', 'Swapnil Deshmukh', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '997.000000000000000', '0.000000000000000', '997.000000000000000', '1176.460000000000000', NULL, '179.460000000000000', NULL, 'Estimate', 0, 0, 0, 73, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-21 04:49:05', '2018-03-22 07:29:06'),
(219, 2, 109, 'Uniglobe Remarkable India', 'Client Legal Id', 'abakshi@unigloberemarkableindia.in', 'Bhandarkar Raod Pune', 'Shipping Address', 'Amol Bakshi', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nAccount Name-   E Business Canvas \r\nBank Name-    IDBI Bank \r\nIFSC Code-      IBKL0000641 \r\nAccount No.-   0641102000016737 \r\nBranch-           Anand Nagar,Sinhgad Road,Pune \r\n\r\nThank you for your business\r\n', '', '18887.000000000000000', '423.000000000000000', '18464.000000000000000', '21787.520000000000000', '20100.000000000000000', '3323.520000000000000', 3, 'Invoice', 0, 0, 0, 46, NULL, '2018-03-21', '2018-04-21', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-21 06:33:49', '2018-04-21 05:12:26'),
(220, 2, 112, 'Seva Sahayog Foundation', 'Client Legal Id', 'ravi.gokhale@sevasahayog.com', '18 Vrindavan Society, Pathik Bungalow, Near Mhatre Bridge, Navi peth, Pune 411030', 'Shipping Address', 'Ravi Gokhale', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '3000.000000000000000', '0.000000000000000', '3000.000000000000000', '3540.000000000000000', NULL, '540.000000000000000', NULL, 'Estimate', 0, 0, 0, 74, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-21 06:36:12', '2018-03-26 07:14:43'),
(221, 2, 10, 'Siddhakala Print', '', 'narendrarane4@gmail.com', 'Pune ', '', 'Narendra Rane ', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '8985.000000000000000', '0.000000000000000', '8985.000000000000000', '10602.300000000000000', '0.000000000000000', '1617.300000000000000', 3, 'Invoice', 0, 0, 0, 47, NULL, '2018-03-21', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-21 13:18:18', '2018-03-21 13:39:50'),
(222, 2, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '37200.000000000000000', '0.000000000000000', '37200.000000000000000', '43896.000000000000000', NULL, '6696.000000000000000', NULL, 'Estimate', 0, 0, 0, 75, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-28 07:56:05', '2018-03-28 08:13:44'),
(223, 1, 112, 'Seva Sahayog Foundation', 'Client Legal Id', 'ravi.gokhale@sevasahayog.com', '18 Vrindavan Society, Pathik Bungalow, Near Mhatre Bridge, Navi peth, Pune 411030', 'Shipping Address', 'Ravi Gokhale', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '180.000000000000000', '0.000000000000000', '180.000000000000000', '212.400000000000000', NULL, '32.400000000000000', NULL, 'Estimate', 0, 0, 0, 65, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-29 10:30:56', '2018-03-29 10:30:56'),
(224, 1, 79, 'Aaradhya enterprises', 'Client Legal Id', 'aaradhya.enterprises88@gmail.com', ' A-402 radhika apartment, near aditya nakoda,\r\nsarita nagari phase 2, sinhgad road pune 411030. ', '', 'Anand Chitale-9552777928', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1000.000000000000000', '0.000000000000000', '1000.000000000000000', '1050.000000000000000', NULL, '50.000000000000000', NULL, 'Estimate', 0, 0, 0, 66, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-29 13:02:15', '2018-03-29 13:02:15'),
(225, 2, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Deshmukh - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '4270.000000000000000', '0.000000000000000', '4270.000000000000000', '5038.600000000000000', NULL, '768.600000000000000', NULL, 'Estimate', 0, 0, 0, 76, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-03-29 13:48:10', '2018-03-30 08:01:54'),
(226, 2, 12, 'Travel Time Car Rental Pvt. Ltd', 'Client Legal Id', 'airport.pnq@traveltime.co.in', 'Aundh,pune', 'Aundh,pune', 'Aayaz-8554990195', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '56115.000000000000000', '0.000000000000000', '56115.000000000000000', '66215.700000000000000', '66215.700000000000000', '10100.700000000000000', 1, 'Invoice', 0, 0, 0, 48, NULL, '2018-03-21', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-02 11:10:09', '2018-04-04 07:22:03'),
(227, 2, 59, 'Shraddha Construction Co.', '', 'shraddha.conco@yahoo.in', 'Bhosale Heights, Office No. 9, F.C. Road, Shivajinagar, Pune - 04', 'Bhosale Heights, Office No. 9, F.C. Road, Shivajinagar, Pune - 04', 'Abhay Bahirat', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2585.000000000000000', '0.000000000000000', '2585.000000000000000', '3050.300000000000000', NULL, '465.300000000000000', NULL, 'Estimate', 0, 0, 0, 77, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-04-03 10:23:10', '2018-04-03 10:23:10'),
(228, 2, 61, 'Teqxcel', 'Client Legal Id', '', '108,Pragati Towar,Shivaji Nagar,PUne', 'Shipping Address', 'Surjit Thakur- 9657195195', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2733.000000000000000', '0.000000000000000', '2733.000000000000000', '3224.940000000000000', NULL, '491.940000000000000', NULL, 'Estimate', 0, 0, 0, 78, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-04-03 10:26:52', '2018-04-03 10:27:06'),
(229, 2, 8, 'Tri Polaron Pvt.Ltd', 'Client Legal Id', '', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', '', 'Priyuja Madam - 9049646481', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '1390.000000000000000', '0.000000000000000', '1390.000000000000000', '1640.200000000000000', NULL, '250.200000000000000', NULL, 'Estimate', 0, 0, 0, 79, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-04-04 07:13:32', '2018-04-04 07:18:40'),
(230, 1, 112, 'Seva Sahayog Foundation', 'Client Legal Id', 'ravi.gokhale@sevasahayog.com', '18 Vrindavan Society, Pathik Bungalow, Near Mhatre Bridge, Navi peth, Pune 411030', 'Shipping Address', 'Ravi Gokhale', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '14900.000000000000000', '0.000000000000000', '14900.000000000000000', '17387.000000000000000', NULL, '2487.000000000000000', NULL, 'Estimate', 0, 0, 0, 67, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-04-04 07:16:46', '2018-04-19 13:44:34'),
(231, 1, 67, 'Planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address', 'Manasi Salunke - 9730076223', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '10890.000000000000000', '0.000000000000000', '10890.000000000000000', '10890.000000000000000', NULL, '0.000000000000000', NULL, 'Estimate', 0, 0, 0, 68, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-04-06 06:15:28', '2018-04-09 09:56:04'),
(232, 1, 41, 'Ushakal Tech Reinventions ', '', 'jitendra@ushakal.com', 'Pune', '', '', '1. Please pay 75% in advance and 25% after the delivery.\r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '500.000000000000000', '0.000000000000000', '500.000000000000000', '590.000000000000000', '0.000000000000000', '90.000000000000000', 3, 'Invoice', 0, 0, 0, 46, NULL, '2018-04-11', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-11 11:22:25', '2018-05-22 08:54:26'),
(233, 2, 68, 'N.M Industries', 'Client Legal Id', 'nmindustriespune@gmail.com', '722/7, Laxmi Park, Shastri Rd,\r\nOpp Lokmanya Nagar, Navi Peth, Pune. ', '', '9511898989 ', '1. Please pay your invoice within seven days \r\n2. Cheque and DD’s to be drawn on ‘E Business Canvas’ \r\n3. Subject to Pune Jurisdiction\r\n\r\nThank you for your business\r\n', '', '2610.000000000000000', '0.000000000000000', '2610.000000000000000', '3079.800000000000000', '0.000000000000000', '469.800000000000000', 3, 'Invoice', 0, 0, 0, 49, NULL, '2017-07-20', '2017-07-31', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-30 05:26:55', '2018-07-06 12:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `name_slug` varchar(100) DEFAULT NULL,
  `identification` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `invoicing_address` longtext,
  `shipping_address` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `name_slug`, `identification`, `email`, `contact_person`, `invoicing_address`, `shipping_address`) VALUES
(1, 'Bliss Utility Services Pvt. Ltd.', 'blissutilityservicespvtltd', 'Client Legal Id', 'sachin@blissutility.com', 'Sachin Likhite-8888868434', '', 'Patrakar Nagar,Pune'),
(2, 'Biopharmax Group', 'biopharmaxgroup', '', 'varsha.thorat@Biopharmax.com', 'Varsha - 02066768840', '2nd Floor, Survey No.253/1, Plot NO.4\r\nTirumala Industrial Estate, Hinjewadi, Pune\r\n411057 Maharashtra, INDIA', '2nd Floor, Survey No.253/1, Plot NO.4\r\nTirumala Industrial Estate, Hinjewadi, Pune\r\n411057 Maharashtra, INDIA'),
(3, 'Global Insurance Consultants Pvt Ltd', 'globalinsuranceconsultantspvtltd', '', 'zainab.sayyed@globalinsurance.in', 'Zainab Sayyed - 9860249430', 'Sr.No.1205/2/1, Amarpark Apartment, 1 st floor , office No.08 , Near P jog classes , Shirole Road , Shivajinagar, Pune -411005', 'Sr.No.1205/2/1, Amarpark Apartment, 1 st floor , office No.08 , Near P jog classes , Shirole Road , Shivajinagar, Pune -411005'),
(4, 'Almar Foods', 'almarfoods', '', 'ramaa.enterprises1@gmail.com', 'Mandar Gokhale', '237 Shukrawar Peth nr. Bafna Petrol Pump,\r\nPune - 410506,\r\nMaharashtra, India.', '237 Shukrawar Peth nr. Bafna Petrol Pump,\r\nPune - 410506,\r\nMaharashtra, India.'),
(5, 'Shri Sai Hemant Arts', 'shrisaihemantarts', 'Client Legal Id', '', 'Phone no-9403182864', 'Shri Sai Hemant Arts,\r\nShirdi Maharashtra -423109', ''),
(6, 'Shree Sai Hemant Arts', 'shreesaihemantarts', 'Client Legal Id', '', 'Phone no-9403182864', 'Shree Sai Hemant Arts,\r\nShirdi Maharashtra -423109', ''),
(7, 'A Trigya Company (Cloud Mantra)', 'atrigyacompanycloudmantra', 'Client Legal Id', 'hemant@cloudmantra.net', 'Mr. Nilesh More, Mr. Hemant Lavania 9028088987', 'A 504, Bhakti Plaza, 5th floor, A wing, Near Bremen Circle, Aundh, Pune.', ''),
(8, 'Tri Polaron Pvt.Ltd', 'tripolaronpvtltd', 'Client Legal Id', '', 'Priyuja Madam - 9049646481', 'Rajlaxmi Industrial Estate,Sr No.38/1,Narhe Road,Pune-41', ''),
(9, 'A B Gensets Pvt. Ltd', 'abgensetspvtltd', 'Client Legal Id', 'purchase@abgensets.co.in', 'Preeti Madam- 7620470606', 'Dhayari,Pune', 'Dhayari,Pune'),
(10, 'Siddhakala Print', 'siddhakalaprint', '', 'narendrarane4@gmail.com', 'Narendra Rane ', 'Pune ', ''),
(11, 'Kats Enggineer', 'katsenggineer', 'Client Legal Id', 'katsengg@gmail.com', 'Mr.patole', 'Sinhagad road,pune', 'Sinhagad road,pune'),
(12, 'Travel Time Car Rental Pvt. Ltd', 'traveltimecarrentalpvtltd', 'Client Legal Id', 'airport.pnq@traveltime.co.in', 'Aayaz-8554990195', 'Aundh,pune', 'Aundh,pune'),
(13, 'Opti Life Hospital', 'optilifehospital', 'Client Legal Id', 'deepak@identitybs.com', '', 'Dombivali', 'Shipping Address'),
(14, 'Lotus events and productions', 'lotuseventsandproductions', 'Client Legal Id', 'info@lotuseo.in', 'Adee bhateware -8983333389', 'Office No.204 adinath shopping center,pune-satara road-pune-37', 'Shipping Address'),
(15, 'Bright Tech ', 'brighttech', 'Client Legal Id', 'mahesh.bhopale@brighttech.co.in', 'Mahesh Bhople - 9890942545', 'S.No-44/20,Shop No 4 & 5 ,Near Darshana Properties Off Pari Company Road Narhe Pune-411041', 'Shipping Address'),
(16, 'Bright Tech handling Equipments', 'brighttechhandlingequipments', 'Client Legal Id', 'mahesh.bhopale@brighttech.co.in', 'Mahesh Bhople - 9890942545', 'S.No-44/20,Shop No 4 & 5 ,Near Darshana Properties Off Pari Company Road Narhe Pune-411041', 'Shipping Address'),
(17, 'ebc', 'ebc', '', 'amit@e-bc.in', 'Amit', 'pune', 'Shipping Address'),
(18, 'URS Technologies Solutions', 'urstechnologiessolutions', 'Client Legal Id', 'gurudatta@e-bc.in', 'Amit Patel', 'Flat No-604 Sun residency Near Kilas Jiven Dhayari Pune-41', 'Shipping Address'),
(19, 'The Craft', 'thecraft', 'Client Legal Id', 'kedarchandulkar@gmail.com', 'Kedar Chandulkar', 'Pune', 'Shipping Address'),
(20, 'Fishofish', 'fishofish', '', 'amit@e-bc.in', 'Ajinky Bagde-9730929229', 'Shop No.7/8,Rohan Chamber,Near Karve Statue,Kothrud,Pune-411038', ''),
(21, 'Metro Global Business Services Pvt.Ltd', 'metroglobalbusinessservicespvtltd', 'Client Legal Id', 'shilpa.ramesh@metro-services.in', 'Shilpa Ramesh-20 71001600', 'Cluster \"D\", Wing 2, 6th Floor, EON Free Zone\r\nPlot No.1, Survey No. 77 MIDC Kharadi Knowledge Park\r\nPune – 411014, Maharashtra, India.', ''),
(22, 'Samarth Fleets', 'samarthfleets', 'Client Legal Id', 'alate.tushar@gmail.com', 'Tushar Alate-9011333441', '945-B-43 Yogiraj Krupa Bhoreshwar Nagar, Bhor. Dist-Pune, Tal- Bhor.\r\n                   Pin - 412206', 'Shipping Address'),
(23, 'Sears IT & Management Services India Pvt.Ltd', 'searsitmanagementservicesindiapvtltd', 'Client Legal Id', '', '', '7th Floor,Wing 2,Cluster C,EON Free Zone,MIDC  Kharadi Knowledge Park, Pune, Maharashtra -411014 ', 'Shipping Address'),
(24, 'Mach2 International', 'mach2international', '', 'sales_mach2@outlook.com', 'Hrishikesh Thakurdesai', 'Unit No 4 Gananjay Housing Society , Lane No. 1 Bunglow No 3, Azad Wadi,\r\nKothrud, Pune-411038 ', 'Shipping Address'),
(25, 'Profectum Operations', 'profectumoperations', 'Client Legal Id', 'ops@perfectum.in', 'Shridhar', 'Pune', 'Shipping Address'),
(26, 'Global Group Pune', 'globalgrouppune', 'Client Legal Id', 'sunil.globalgroup@gmail.com', 'Mr. Sunil Solanki', 'Ganga Collidium I,\r\n1st floor, Office No.117,\r\nOff. Bibwewadi - Kondhwa Road,\r\nMarket yard, Near Gangadham Chowk,\r\nBibwewadi, Pune- 411 037', ''),
(27, 'Kedar Chandulkar', 'kedarchandulkar', 'Client Legal Id', 'kedarchandulkar@gmail.com', 'Kedar Chandulkar', 'Pune', 'Shipping Address'),
(28, 'Sparsh Space Designer', 'sparshspacedesigner', 'Client Legal Id', 'sparsh003.sd@gmail.com', 'Mr.Shri Yashwantrao Chavan-9764709709', 'Sr.No.68,Inside Gurudatta Mobile Shoppee Siddharth Complex,Dhayari Phata , Sinhagad Road,Pune-411041', 'Shipping Address'),
(29, 'Vishwkrma Enterprises', 'vishwkrmaenterprises', 'Client Legal Id', 'Info@vishwakarma-enterprises.com', 'K.P Sonawne', 'Dhayari Pune', 'Shipping Address'),
(30, 'MIT Vishwashanti Gurukul', 'mitvishwashantigurukul', 'Client Legal Id', 'snehalsanghavi@mitid.edu.in', '', 'Loni-Kalbhor,pune', 'Shipping Address'),
(31, 'MIT University', 'mituniversity', 'Client Legal Id', 'snehalsanghavi@mitid.edu.in', '', 'Avantika ,Kothrud,pune', 'Shipping Address'),
(32, 'Vishwakarma Enterprises', 'vishwakarmaenterprises', 'Client Legal Id', 'Info@vishwakarma-enterprises.com', 'K.P Sonawne', 'Dhayari Pune', 'Shipping Address'),
(33, 'Nutan Mahavidyalaya', 'nutanmahavidyalaya', 'Client Legal Id', 'devidasdhekle54@gmail.com', 'Mr.Santosh Dandwate', 'Pune', ''),
(34, 'SAK', 'sak', 'Client Legal Id', '', 'Ganesh Anerao-9822758561', 'Pune', 'Shipping Address'),
(35, 'Chilly Garlic ', 'chillygarlic', 'Client Legal Id', '', 'Contact Person', 'Pune', 'Shipping Address'),
(36, 'Avantika University', 'avantikauniversity', '', '', '', 'Ujjain | Madhya Pradesh | India', ''),
(37, 'Ushakal', 'ushakal', 'Client Legal Id', 'gurudatta@e-bc.in', '', 'Pune', 'Shipping Address'),
(38, 'Global Sales and Marketing', 'globalsalesandmarketing', 'Client Legal Id', 'sunil.globalgroup@gmail.com', 'Mr. Sunil Solanki', 'Ganga Collidium I,\r\n1st floor, Office No.117,\r\nOff. Bibwewadi - Kondhwa Road,\r\nMarket yard, Near Gangadham Chowk,\r\nBibwewadi, Pune- 411 037', ''),
(39, 'MIT University, Ujjain', 'mituniversityujjain', '', '', 'Abraham P.O.', 'Ujjain | Madhya Pradesh | India', ''),
(40, 'JSPM College', 'jspmcollege', 'Client Legal Id', 'rkpv2002@gmail.com', 'Rajesh Kulkarni', 'Pune', ''),
(41, 'Ushakal Tech Reinventions ', 'ushakaltechreinventions', 'Client Legal Id', 'gurudatta@e-bc.in', '', 'Pune', ''),
(42, 'eyedentity ', 'eyedentity', 'Client Legal Id', '', '9930868705', '215 Creative Industrial Estate 2nd Floor N.M Joshi Marg Mumbai - 400011', 'Shipping Address'),
(43, 'Election Campaign ', 'electioncampaign', 'Client Legal Id', 'gurudatta@e-bc.in', '', 'Pune', 'Shipping Address'),
(44, 'Wisdom Nursery School', 'wisdomnurseryschool', 'Client Legal Id', 'wisdomnurseryschool@gmail.com', 'Siddhaye-9822046063', 'Pune', 'Shipping Address'),
(45, 'Ecosence Appliances Pvt. Ltd.', 'ecosenceappliancespvtltd', 'Client Legal Id', '', '0240-2553800,9765563342', 'M-31 MIDC,Waluj,Aurangabad-431136', ''),
(46, 'Ecosense Appliances Pvt. Ltd.', 'ecosenseappliancespvtltd', 'Client Legal Id', '', '0240-2553800,9765563342', 'M-31 MIDC,Waluj,Aurangabad-431136', ''),
(47, 'Ameet Patel', 'ameetpatel', 'Client Legal Id', 'patelameet1908@gmail.com', '9371594035', 'Dhayari-Pune', ''),
(48, 'Intelivus Technologies', 'intelivustechnologies', 'Client Legal Id', 'patelameet1908@gmail.com', ' Ameet Patel (9371594035)', 'Dhayari-Pune', ''),
(49, 'Citylines Pvt. Ltd', 'citylinespvtltd', 'Client Legal Id', 'bookings@citylines.co.in', 'Mr.Sandeep', 'Katraj,Pune', ''),
(50, 'Shiprich Shipping', 'shiprichshipping', 'Client Legal Id', 'devavrat@shiprichshipping.com', 'Devavrat Sathaye -8087997816', '', 'Shipping Address'),
(51, 'GK Hip Hop', 'gkhiphop', 'Client Legal Id', 'patelameet1908@gmail.com', 'Ameet Patel', 'Dhayri Pune', ''),
(52, 'Stay 18 Beauty ', 'stay18beauty', 'Client Legal Id', 'vaishalimate12@gmail.com', 'Vaishali Mate', 'Dhayri Pune', ''),
(53, 'Stay 18 Beauty Parlor  ', 'stay18beautyparlor', 'Client Legal Id', 'vaishalimate12@gmail.com', 'Vaishali Mate', 'Dhayri Pune', ''),
(54, 'MIT Arts, Commerce & Science College', 'mitartscommercesciencecollege', '', '', 'Gaurav Magar', 'Dehu Phata, Alandi, Pune - 412 105.', ''),
(55, 'Client Name', 'clientname', 'Client Legal Id', '', 'Contact Person', 'Invoicing Address', 'Shipping Address'),
(56, 'Shree Enterprices ', 'shreeenterprices', 'Client Legal Id', '', '', 'Pune', ''),
(57, 'Pradeep Joshi', 'pradeepjoshi', '', 'pradeepj21@yahoo.co.in', 'Pradeep Joshi', 'A P R & Associates\r\n107, Unique Industrial Estate\r\nOff Veer Savarkar Marg,\r\nPrabhadevi,\r\nMumbai - 400 025.', 'A P R & Associates\r\n107, Unique Industrial Estate\r\nOff Veer Savarkar Marg,\r\nPrabhadevi,\r\nMumbai - 400 025.'),
(58, 'Paradigm Building Solutions Pvt. Ltd.', 'paradigmbuildingsolutionspvtltd', 'Client Legal Id', 'paradigmbuildsol@gmail.com', 'Yatin Jog', '', 'Shipping Address'),
(59, 'Shraddha Construction Co.', 'shraddhaconstructionco', '', 'shraddha.conco@yahoo.in', 'Abhay Bahirat', 'Bhosale Heights, Office No. 9, F.C. Road, Shivajinagar, Pune - 04', 'Bhosale Heights, Office No. 9, F.C. Road, Shivajinagar, Pune - 04'),
(60, 'Kanchan Garden', 'kanchangarden', 'Client Legal Id', 'kanchanvijay@gmail.com', 'Vijay Kanchan -+91 94220 21890 +91 72185 40060', 'Near PMT Bus Stop, Uruli\r\nKanchan, Pune. 412202', 'Shipping Address'),
(61, 'Teqxcel', 'teqxcel', 'Client Legal Id', '', 'Surjit Thakur- 9657195195', '108,Pragati Towar,Shivaji Nagar,PUne', 'Shipping Address'),
(62, 'Seven Mentor Pvt Ltd', 'sevenmentorpvtltd', 'Client Legal Id', 'prachi@sevenmentor.com', 'Contact Person', 'Pune', 'Shipping Address'),
(63, 'Ram Ratna', 'ramratna', 'Client Legal Id', 'jitendra@ushakal.com', 'Contact Person', 'Infrastructure P Ltd S No. B/1A2.11 & 12 Honad-Vilage ', 'Shipping Address'),
(64, 'MIT Arts, Commerce and Science College', 'mitartscommerceandsciencecollege', 'Client Legal Id', '', 'Gaurav Magar', 'MIT Arts, Commerce & Science College, Alandi (D), Pune - 412 105', ''),
(65, 'Sagar Kasar', 'sagarkasar', 'Client Legal Id', '', 'Sagar Kasar - 9730176230', 'Rohan Tower Mumbai-pune highway at dapodi near hotel ashoka infront of megamart ', 'Shipping Address'),
(66, 'Aditi Industries ', 'aditiindustries', 'Client Legal Id', 'santoshsadavare@gmail.com', 'Santosh Sadavare-9850094587', 'B-701 Sun residency Opp .Kailas jeevan factory Dhayari Pune -411041', 'Shipping Address'),
(67, 'Planora', 'planora', 'Client Legal Id', 'planoriamagingpune@gmail.com', 'Manasi Salunke - 9730076223', 'Unit No.14 2nd floor Gera Junction Lullanagar Pune-4111014', 'Shipping Address'),
(68, 'N.M Industries', 'nmindustries', 'Client Legal Id', 'nmindustriespune@gmail.com', '9511898989 ', '722/7, Laxmi Park, Shastri Rd,\r\nOpp Lokmanya Nagar, Navi Peth, Pune. ', ''),
(69, 'Anjali special haircut & bridal', 'anjalispecialhaircutbridal', 'Client Legal Id', 'Vivrksticky@gmail.com', 'Anjali - 9730958302,8483892484', 'Pune', 'Shipping Address'),
(70, 'Dr. Manisha Bandishti', 'drmanishabandishti', 'Client Legal Id', 'info@drmanishabandishti.com', '020 26161095', '303, 3rd floor, Choice ‘C’ Apartment\r\nOpposite Millenium Star Building\r\nNear Ruby Hall Clinic\r\nDhole Patil Road\r\nPune-411001\r\nIndia', 'Shipping Address'),
(71, 'koustubh talpallikar', 'koustubhtalpallikar', '', 'koustubh.talpallikar@gmail.com', 'koustubh talpallikar - 9849642429', '', 'Shipping Address'),
(72, 'Kalyankar Group', 'kalyankargroup', 'Client Legal Id', 'kktc@rediffmail.com', 'Ganesh Kalyankar ', 'Pune', 'Shipping Address'),
(73, 'Pranali Construction', 'pranaliconstruction', 'Client Legal Id', 'pranaliconstructionco@gmail.com', 'Mr. B.P. Humbare -Director - 0981100555 ', 'office no.4,Vaishnavi Angan ,S.N.65, \r\nnear Chate Coaching Classes, Sinhagad Rd., Pune - 411041', 'Shipping Address'),
(74, 'Navnath Automobiles', 'navnathautomobiles', 'Client Legal Id', '', 'Mr. Suraj', 'Singhad Road- Pune', 'Shipping Address'),
(75, 'Tech Talks India Pvt. Ltd.', 'techtalksindiapvtltd', 'Client Legal Id', 'veers@tech-talks.in', '9900594584', 'Invoicing Address', 'Shipping Address'),
(76, 'EDU Empire PVt. Ltd', 'eduempirepvtltd', 'Client Legal Id', '', '8177862759', 'Phoenix mall,Pune', 'Shipping Address'),
(77, '3ace academy', '3aceacademy', 'Client Legal Id', '', '8055763763', 'Singhgad Road,Pune', 'Shipping Address'),
(78, 'Anand Chitale', 'anandchitale', 'Client Legal Id', 'aaradhya.enterprises88@gmail.com', '9552777928', ' A-402 radhika apartment, near aditya nakoda,\r\nsarita nagari phase 2, sinhgad road pune 411030. ', ''),
(79, 'Aaradhya enterprises', 'aaradhyaenterprises', 'Client Legal Id', 'aaradhya.enterprises88@gmail.com', 'Anand Chitale-9552777928', ' A-402 radhika apartment, near aditya nakoda,\r\nsarita nagari phase 2, sinhgad road pune 411030. ', ''),
(80, 'Paranjpe eye clinic & surgery center', 'paranjpeeyeclinicsurgerycenter', 'Client Legal Id', 'cintact@paranjpeeyecare.net', 'Dr. mandar paranjpe-9579525110', 'Pune', 'Shipping Address'),
(81, 'Prosonic Technologies Pvt. Ltd', 'prosonictechnologiespvtltd', 'Client Legal Id', 'amol.panse@prosonic.in', 'Amol Panse', 'Pune', 'Shipping Address'),
(82, 'Kavyaa beauty parlor', 'kavyaabeautyparlor', 'Client Legal Id', '', 'Varsha -9823164242', 'Invoicing Address', 'Shipping Address'),
(83, 'Junavane Travels Pvt Ltd', 'junavanetravelspvtltd', 'Client Legal Id', 'junavanetravels@gmail.com', '020-24459454', 'Pune', ''),
(84, 'Rama Erande & Associates', 'ramaerandeassociates', 'Client Legal Id', '', '9370709093, 9370709091, 9881302860, 9326259060', 'Shop No 31 Indulal Complex, LAL Bahadur Shastri Road, Navi Peth-Sadashiv Peth, Pune - 411030, Near Kaka Halwai Sweet Centre', 'Shipping Address'),
(85, 'Stay Eighteen', 'stayeighteen', 'Client Legal Id', '', '9665527667', 'Jay Complex, Shop No. 03, Dhayari Narhe Road, Dhayari, Pune - 411041, Near Kailas Jeevan Factor', 'Shipping Address'),
(86, 'Natu properties', 'natuproperties', 'Client Legal Id', 'milind@natuproperties.in', 'Milind Natu - 9822067341', 'Paud Rd,Pune', 'Shipping Address'),
(87, 'Kedar Chandurkar', 'kedarchandurkar', 'Client Legal Id', 'kedarchandurkar@gmail.com', 'Kedar Chandurkar', 'Pune', 'Shipping Address'),
(88, 'APR CA', 'aprca', 'Client Legal Id', '', '', 'Mumbai', ''),
(89, 'MMP Trade Sourcing ', 'mmptradesourcing', 'Client Legal Id', 'mmptrades@gmail.com', 'Mehul Pande - 07588230588', 'Kothrud,Pune-411038', 'Shipping Address'),
(90, 'Mahesh Mokashi', 'maheshmokashi', 'Client Legal Id', 'drmaheshmokashi123@gmail.com', 'Mahesh Mokashi', 'Pune', 'Patrakar Nagar,Pune'),
(91, 'GGP Auto Solution (I) Pvt. Ltd', 'ggpautosolutionipvtltd', '', 'sunil.globalgroup@gmail.com', 'Mr. Sunil Solanki', 'Ganga Collidium I,\r\n1st floor, Office No.117,\r\nOff. Bibwewadi - Kondhwa Road,\r\nMarket yard, Near Gangadham Chowk,\r\nBibwewadi, Pune- 411 037', ''),
(92, 'R B Enterprises', 'rbenterprises', 'Client Legal Id', '', 'Mr. Sunjay', 'Pune', 'Shipping Address'),
(93, 'Paper Publish', 'paperpublish', 'Client Legal Id', 'editorijbemr@gmail.com', 'Shantanu Sangavikar', '49B, ‘Bhushan’, Yeshwant Nagar,\r\n\r\nNanded – 431602 Maharashtra (India)', 'Shipping Address'),
(94, 'AG Furnace Improvements Pvt. Ltd.', 'agfurnaceimprovementspvtltd', 'Client Legal Id', 'amarvirgc@heatfluxindia.com', 'Amarvir G Chilka', 'Office-6, Vrundavan Commercial Complex\r\n\r\nKothrud, Pune-411038', 'Shipping Address'),
(95, 'WS3D Interior', 'ws3dinterior', 'Client Legal Id', 'whitestyle3d@gmail.com', 'Lalit Surve', 'Shop No 1, Balkrushna Appt., Behind Police Chowky, Narayan Peth, Pune', ''),
(96, 'Balaji Enterprises ', 'balajienterprises', 'Client Legal Id', '', 'Mr. Sunjay', 'Pune', 'Shipping Address'),
(97, 'Mother Foods', 'motherfoods', 'Client Legal Id', '', 'Gaurav Sharma', 'Majri,Pune', 'Shipping Address'),
(98, 'B K Steel ', 'bksteel', 'Client Legal Id', '', 'Contact Person', 'Survey No 132/2, Dsk Road, Dhayari, Pune - 411041', 'Shipping Address'),
(99, 'Trikaya Ayurved', 'trikayaayurved', 'Client Legal Id', '', 'Dr. Sachin Deshmukh', 'Pune', ''),
(100, 'Namoh Builders & Developers', 'namohbuildersdevelopers', 'Client Legal Id', '', '', 'Pune', 'Shipping Address'),
(101, 'Heuu Industrial Spaces', 'heuuindustrialspaces', 'Client Legal Id', '', 'Contact Person', 'MIDC, Chinchwad, Pimpri-Chinchwad, Maharashtra 411019', ''),
(102, 'Dr. J.J. Magdum College Of Engineering, Jaysingpur ', 'drjjmagdumcollegeofengineeringjaysingpur', 'Client Legal Id', 'pranavmagdum123456@gmail.com', 'Pranav Magdum - 9922489992', 'Gat No. 314/330 , Shirol - Wadi Road, Agar Bhag, Jaysingpur, Maharashtra 416101', 'Shipping Address'),
(103, 'Kamlakar ', 'kamlakar', 'Client Legal Id', '', 'Kamlakar - 9765222019', 'Pune', 'Shipping Address'),
(104, 'Placewell', 'placewell', 'Client Legal Id', 'sanjay@placewell.net', 'Sanjay Manohar - 9920916830', 'Pune', 'Shipping Address'),
(105, 'Placewell consultancy', 'placewellconsultancy', 'Client Legal Id', 'sanjay@placewell.net', 'Sanjay Manohar - 9920916830', 'Pune', 'Shipping Address'),
(106, 'saama technologies', 'saamatechnologies', 'Client Legal Id', '', '', 'Level-10, Building - IT8 &\r\nLevel- 6, Building - IT4\r\nQubix SEZ, Blue Ridge,\r\nSurvey No. 154/6,Phase -1,\r\nRajiv Gandhi Infotech Park,\r\nHinjewadi, Pune - 411057 INDIA', 'Shipping Address'),
(107, 'Goodlife Foundation ', 'goodlifefoundation', '', 'harshad.dantale@gmail.com', 'Harshad Dantale', 'Pune', ''),
(108, 'Anudin Services', 'anudinservices', 'Client Legal Id', 'anudinservices@gmail.com', '7276619996', 'Pune', ''),
(109, 'Uniglobe Remarkable India', 'unigloberemarkableindia', 'Client Legal Id', 'abakshi@unigloberemarkableindia.in', 'Amol Bakshi', 'Bhandarkar Raod Pune', 'Shipping Address'),
(110, 'Bharat Supplier ', 'bharatsupplier', 'Client Legal Id', 'ggautam582@gmail.com', 'Gautam', 'Pune', 'Shipping Address'),
(111, 'Sai Kusum Construction', 'saikusumconstruction', 'Client Legal Id', 'nikhilgaikwad003@gmail.com', 'Nikhil Gaikwad - 9890679841', '', 'Shipping Address'),
(112, 'Seva Sahayog Foundation', 'sevasahayogfoundation', 'Client Legal Id', 'ravi.gokhale@sevasahayog.com', 'Ravi Gokhale', '18 Vrindavan Society, Pathik Bungalow, Near Mhatre Bridge, Navi peth, Pune 411030', 'Shipping Address'),
(113, 'Dinkar Investments Pvt. Ltd', 'dinkarinvestmentspvtltd', 'Client Legal Id', '', '', 'Pune', 'Shipping Address'),
(114, 'Sona College of Technology', 'sonacollegeoftechnology', 'Client Legal Id', 'nrp264@gmail.com', 'Nyan Patel', 'Junction Main Road, Suramangalam, Salem, Tamil Nadu 636005', 'Shipping Address'),
(115, 'Packnjoy', 'packnjoy', 'Client Legal Id', 'deshmukhswapnil287@gmail.com', 'Swapnil Deshmukh', 'Pune', 'Shipping Address'),
(116, 'abc', 'abc', '47382947', 'abc@gmail.com', 'abc', 'abc', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` bigint(20) NOT NULL,
  `quantity` decimal(53,15) NOT NULL DEFAULT '1.000000000000000',
  `discount` decimal(53,2) NOT NULL DEFAULT '0.00',
  `common_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `description` varchar(20000) DEFAULT NULL,
  `unitary_cost` decimal(53,15) NOT NULL DEFAULT '0.000000000000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `quantity`, `discount`, `common_id`, `product_id`, `description`, `unitary_cost`) VALUES
(1, '1.000000000000000', '0.00', 1, NULL, 'Visiting Card (lvory 350 GSM,Spot Lamination Both Side)Surajit Thakur', '955.000000000000000'),
(2, '1.000000000000000', '0.00', 1, NULL, 'Visiting Card (lvory 350 GSM,Spot Lamination Both Side)Jyoti Gaikwad', '955.000000000000000'),
(3, '1.000000000000000', '0.00', 1, NULL, 'Visiting Card (lvory 350 GSM,Spot Lamination Both Side)', '955.000000000000000'),
(4, '20.000000000000000', '0.00', 2, NULL, 'Certificate Printing (Canvas\r\nPaper,A4 Size)', '150.000000000000000'),
(5, '1.000000000000000', '0.00', 2, NULL, 'Designing charges', '1000.000000000000000'),
(7, '6.000000000000000', '0.00', 4, NULL, 'Certificate Printing (Canvas\r\nPaper,A4 Size)', '150.000000000000000'),
(8, '1000.000000000000000', '0.00', 5, NULL, 'Leaflets ( A5 Size , 90\r\nGSM )', '1.900000000000000'),
(9, '27.000000000000000', '0.00', 6, NULL, 'Id card (PVC card,Front back card )', '35.000000000000000'),
(10, '100.000000000000000', '0.00', 6, NULL, 'Ribbon Satin', '65.000000000000000'),
(11, '30.000000000000000', '0.00', 7, NULL, 'Mug Printing', '175.000000000000000'),
(12, '500.000000000000000', '0.00', 8, NULL, 'Visiting Card ( Ivory,370gsm ,spot\r\nlamination,both side)( Name-\r\nPaurnmia Rahate)', '1.910000000000000'),
(13, '500.000000000000000', '0.00', 8, NULL, 'Visiting Card ( Ivory,370gsm ,spot\r\nlamination,both side)( Name- Balaji\r\nKanthale)', '1.910000000000000'),
(14, '500.000000000000000', '0.00', 8, NULL, 'Visiting Card ( Ivory,370gsm ,spot\r\nlamination,both side)( Name- Bilal\r\nAnwar)', '1.910000000000000'),
(15, '500.000000000000000', '0.00', 8, NULL, 'Visiting Card ( Ivory,370gsm ,spot\r\nlamination,both side)( Name- Bhakti\r\nKori)', '1.910000000000000'),
(16, '500.000000000000000', '0.00', 8, NULL, 'Visiting Card ( Ivory,370gsm ,spot\r\nlamination,both side)( Name-\r\nUmesh Mahore)', '1.910000000000000'),
(17, '100.000000000000000', '0.00', 8, NULL, 'Visiting Card (Umesh Mahore', '2.400000000000000'),
(18, '483.000000000000000', '0.00', 9, NULL, 'Id Cards of Honeywell ( 250\r\nGSM )', '4.000000000000000'),
(19, '100.000000000000000', '0.00', 10, NULL, 'Visiting card ( 250 GSM ,F/B', '2.200000000000000'),
(20, '1.000000000000000', '100.00', 10, NULL, 'Sample Printing', '500.000000000000000'),
(21, '500.000000000000000', '0.00', 11, NULL, 'Visiting Card ( Ivory,370gsm ,spot\r\nlamination,both side)( Name-\r\nShashikant pawar )', '1.910000000000000'),
(22, '3.000000000000000', '0.00', 12, NULL, 'Vinyl With 3mm foam sheet,3 X 2 without Lamination  ( Clock English )', '720.000000000000000'),
(23, '20.000000000000000', '0.00', 12, NULL, 'Flex Printing Clock Hindi - Flex size 2 X 3', '120.000000000000000'),
(24, '1.000000000000000', '0.00', 12, NULL, 'Clock Hindi - Flex 6 X 3', '360.000000000000000'),
(25, '9.000000000000000', '0.00', 12, NULL, 'Vinyl With 3mm foam sheet,3 X 2 without Lamination  ( Butterfly )', '720.000000000000000'),
(26, '1.000000000000000', '0.00', 13, NULL, 'Logo Designing', '2000.000000000000000'),
(27, '1.000000000000000', '0.00', 13, NULL, 'Brochure Designing', '1500.000000000000000'),
(28, '1.000000000000000', '0.00', 14, NULL, 'Web Design Designing (Home Page)', '7500.000000000000000'),
(29, '1.000000000000000', '0.00', 15, NULL, 'Domain Purchase (teqxcel.in)', '573.000000000000000'),
(30, '12.000000000000000', '0.00', 16, NULL, 'Hosting Charges ( teqxcel.in for 1 Year )', '180.000000000000000'),
(31, '3.000000000000000', '0.00', 17, NULL, 'Maintenance + Social Media\r\nPage Design - Sparrow Package (\r\n19th April 2017 to 19th July 2017)', '2000.000000000000000'),
(32, '1.000000000000000', '0.00', 18, NULL, 'shreesaihemantart.in (Domain renewal\r\nfor one year from 18/06/2017 to\r\n18/06/2018)', '730.000000000000000'),
(33, '2.000000000000000', '0.00', 19, NULL, 'Next pages Website', '1500.000000000000000'),
(34, '1.000000000000000', '0.00', 20, NULL, 'Brochure Design - 16\r\nPage', '10000.000000000000000'),
(35, '1.000000000000000', '0.00', 20, NULL, 'Hoarding Design', '2000.000000000000000'),
(36, '1.000000000000000', '0.00', 20, NULL, 'Design Adaptations', '1000.000000000000000'),
(37, '1.000000000000000', '0.00', 20, NULL, 'Brochure Sample\r\nPrinting', '300.000000000000000'),
(38, '1.000000000000000', '0.00', 21, NULL, 'Service and Maintenance\r\n(Yearly) [Paid Quarterly]', '50000.000000000000000'),
(39, '1.000000000000000', '0.00', 22, NULL, 'Branding ( logo,Visiting card\r\nand Invoice Design )', '2500.000000000000000'),
(40, '1.000000000000000', '0.00', 22, NULL, 'News Paper advertisement\r\nDesign', '700.000000000000000'),
(41, '9.000000000000000', '0.00', 22, NULL, 'Social Media Page Design', '250.000000000000000'),
(42, '1.000000000000000', '0.00', 23, NULL, 'Web Design &\r\nDevelopment (Home\r\nPage)', '10000.000000000000000'),
(43, '4.000000000000000', '25.00', 23, NULL, 'Next Pages(As Per Page)', '1750.000000000000000'),
(44, '5.000000000000000', '0.00', 24, NULL, 'Email ID Creation for 1 Year (\r\n17 Feb 2017 to 17 Feb 2018 )', '200.000000000000000'),
(45, '1.000000000000000', '25.00', 25, NULL, 'Web Design &\r\nDevelopment (Home Page)', '15000.000000000000000'),
(46, '7.000000000000000', '0.00', 25, NULL, 'Web Design &\r\nDevelopment (Internal\r\nPage)', '1500.000000000000000'),
(47, '1.000000000000000', '0.00', 25, NULL, 'Domain Registration(\r\nshraddha.co.in )', '425.000000000000000'),
(48, '12.000000000000000', '0.00', 25, NULL, 'Hosting Charges (\r\nshraddha.co.in , For 1 Year\r\n)', '180.000000000000000'),
(49, '5.000000000000000', '0.00', 26, NULL, 'Poster Designing ( 12 X 18\r\nSize )', '4000.000000000000000'),
(50, '500.000000000000000', '0.00', 27, NULL, 'Visiting card ( 400 GSM ,F/B,Spot +Matt\r\nLamination ) Delivery 4 Days', '2.054000000000000'),
(51, '500.000000000000000', '0.00', 27, NULL, 'Visiting card ( 400 GSM ,F/B,Spot +Matt\r\nLamination ) Delivery 4 Days', '2.054000000000000'),
(52, '10.000000000000000', '0.00', 28, NULL, 'Star Flex (3X4 ft)', '250.000000000000000'),
(53, '1.000000000000000', '0.00', 28, NULL, 'Star flex (6X6 ft)', '900.000000000000000'),
(54, '1.000000000000000', '0.00', 28, NULL, 'Designing charges (per design)', '500.000000000000000'),
(55, '1.000000000000000', '5.00', 29, NULL, 'Logo Designing ', '2000.000000000000000'),
(56, '1.000000000000000', '5.00', 29, NULL, 'Profile creation ', '1500.000000000000000'),
(57, '100.000000000000000', '0.00', 30, NULL, 'Ribbon (Satin,18mm,Single Color) ', '40.000000000000000'),
(60, '1.000000000000000', '0.00', 31, NULL, 'Visiting card & referral pads designing', '500.000000000000000'),
(61, '1000.000000000000000', '0.00', 31, NULL, 'Folders printing ( 300 GSM ,Gloss Lamination with Pocket ,18.50 in X 13 In) ', '23.000000000000000'),
(62, '100.000000000000000', '0.00', 31, NULL, 'DVD Sticker  printing', '5.400000000000000'),
(63, '10.000000000000000', '0.00', 31, NULL, 'bill book printing (1/8 Size ,70GSM paper ,1 +1)', '240.000000000000000'),
(64, '12.000000000000000', '0.00', 31, NULL, 'Billing Software ', '200.000000000000000'),
(66, '12.000000000000000', '0.00', 32, NULL, 'Hosting Charges ( 500MB,for 1 Year )', '180.000000000000000'),
(68, '1.000000000000000', '0.00', 34, NULL, 'Back light board (10 ft. X 4ft. , Star flex ,powder coated side ,9 tube light )', '14500.000000000000000'),
(69, '500.000000000000000', '0.00', 31, NULL, 'Visiting Card (lvory 400GSM,Spot Lamination Both Side)', '1.750000000000000'),
(70, '1000.000000000000000', '0.00', 31, NULL, 'Envelop Printing ( 130GSM,9 X 12 inch,4 Color )', '9.000000000000000'),
(71, '100.000000000000000', '0.00', 31, NULL, 'DVD ( Moserbaer,4.7GB DVD (100 DVDs) )', '20.000000000000000'),
(72, '1.000000000000000', '0.00', 35, NULL, 'Domain Purchase ', '750.000000000000000'),
(73, '12.000000000000000', '0.00', 35, NULL, 'Hosting Charges ( 500MB for 1 Year )', '180.000000000000000'),
(74, '2.000000000000000', '0.00', 36, NULL, 'Domain retention cost for 1 year + Domain Transfer cost for 1 year ( backnjoy.co.in) ', '520.000000000000000'),
(75, '2.000000000000000', '0.00', 36, NULL, 'Domain retention cost for 1 year + Domain Transfer cost for 1 year ( backnjoy.in) ', '600.000000000000000'),
(76, '12.000000000000000', '0.00', 36, NULL, 'Hosting charges For 1 year ', '180.000000000000000'),
(77, '1.000000000000000', '0.00', 36, NULL, 'Web development ( home page)', '7500.000000000000000'),
(78, '1.000000000000000', '0.00', 36, NULL, 'Web development (Next pages per page)', '1750.000000000000000'),
(79, '1.000000000000000', '0.00', 36, NULL, 'CMS 	\r\n\r\n', '15000.000000000000000'),
(80, '1.000000000000000', '0.00', 37, NULL, 'kalyankargroup.com (Domain renewal\r\nfor one year )', '750.000000000000000'),
(81, '12.000000000000000', '0.00', 37, NULL, 'Hosting charges For 1 year ', '180.000000000000000'),
(82, '21.000000000000000', '0.00', 38, NULL, 'ID Card( PVC Card)', '30.000000000000000'),
(83, '500.000000000000000', '0.00', 39, NULL, 'Visiting Card ( Ivory,370gsm ,spot lamination,both side)( Name- Ravi Kumar Singh ) ', '1.910000000000000'),
(84, '1.000000000000000', '0.00', 40, NULL, 'Logo Designing', '2500.000000000000000'),
(85, '1.000000000000000', '0.00', 40, NULL, 'Web Design Designing (Home Page)', '7500.000000000000000'),
(86, '1.000000000000000', '0.00', 40, NULL, 'Next Pages(As Per Page)', '1500.000000000000000'),
(87, '3.000000000000000', '0.00', 40, NULL, 'Social Media maintenance (For  3  Month ) ', '2000.000000000000000'),
(88, '1.000000000000000', '0.00', 40, NULL, 'Domain Purchase (.com)', '750.000000000000000'),
(89, '1.000000000000000', '0.00', 40, NULL, 'Hosting Charges (  1 Year )', '180.000000000000000'),
(90, '5.000000000000000', '0.00', 40, NULL, 'Email ID Creation for 1 Year ', '200.000000000000000'),
(91, '1.000000000000000', '0.00', 32, NULL, 'Domain  Transfer cost for 1 year ', '450.000000000000000'),
(92, '1.000000000000000', '0.00', 41, NULL, 'Visiting Card (lvory 400 GSM, Both Side)', '820.000000000000000'),
(93, '1.000000000000000', '0.00', 41, NULL, 'Visiting Card (lvory 400 GSM, Both Side)', '820.000000000000000'),
(94, '1.000000000000000', '0.00', 41, NULL, 'Visiting Card (lvory 400 GSM, Both Side)', '820.000000000000000'),
(96, '500.000000000000000', '0.00', 42, NULL, 'Envelop Printing ( Art Paper 210GSM,9 X 12 inch,4 Color ', '15.000000000000000'),
(98, '100.000000000000000', '0.00', 43, NULL, 'Ribbon (Satin,18mm,Single Color) ', '40.000000000000000'),
(99, '1.000000000000000', '0.00', 44, NULL, 'Billing and Management Decision Software ', '25000.000000000000000'),
(100, '1.000000000000000', '0.00', 45, NULL, 'Animated Video (30-40 Seconds)', '15000.000000000000000'),
(102, '500.000000000000000', '0.00', 42, NULL, 'Folders printing ( 300 GSM ,Gloss Lamination with Pocket ,18.50 in X 13 In) ', '23.000000000000000'),
(103, '1.000000000000000', '0.00', 47, NULL, 'Exam Software for 1 year ', '1500.000000000000000'),
(104, '1.000000000000000', '0.00', 48, NULL, 'Exam Software for 1 year ', '1500.000000000000000'),
(107, '1.000000000000000', '0.00', 49, NULL, 'Web Design Designing (Home Page)', '7500.000000000000000'),
(108, '4.000000000000000', '0.00', 49, NULL, 'Next Pages(As Per Page)', '1500.000000000000000'),
(109, '1.000000000000000', '0.00', 42, NULL, 'Designing charges ( Referral Pad,File ,CD Cover )', '500.000000000000000'),
(110, '100.000000000000000', '0.00', 42, NULL, 'DVD Sticker printing', '5.400000000000000'),
(111, '100.000000000000000', '0.00', 42, NULL, 'DVD ( Sony,4.7GB DVD\r\n(100 DVDs) ', '20.000000000000000'),
(113, '500.000000000000000', '0.00', 50, NULL, 'Envelop Printing ( Art Paper 210GSM,9 X 12 inch,4 Color ', '15.000000000000000'),
(115, '1.000000000000000', '0.00', 50, NULL, 'Designing charges ( Referral Pad,File ,CD Cover )', '500.000000000000000'),
(116, '100.000000000000000', '0.00', 50, NULL, 'DVD Sticker printing', '5.400000000000000'),
(117, '100.000000000000000', '0.00', 50, NULL, 'DVD ( Sony,4.7GB DVD\r\n(100 DVDs) ', '20.000000000000000'),
(118, '200.000000000000000', '0.00', 51, NULL, 'Visiting Card (Texture-14,246 GSM ,Both Side)', '2.500000000000000'),
(119, '200.000000000000000', '0.00', 51, NULL, 'Visiting Card (Mirror Coat,250 GSM ,Both Side)', '2.500000000000000'),
(121, '1.000000000000000', '0.00', 52, NULL, 'Domain Purchase (aaradhyaenterprises.in)', '573.000000000000000'),
(122, '12.000000000000000', '0.00', 52, NULL, 'Hosting Charges ( aaradhyaenterprises.in for 1 Year )', '180.000000000000000'),
(123, '1.000000000000000', '0.00', 51, NULL, 'Photo Paper ( 180 GSM,20 Paper Pack)', '200.000000000000000'),
(124, '5.000000000000000', '0.00', 53, NULL, 'workforce tracking (For 3 Month)', '300.000000000000000'),
(125, '60.000000000000000', '0.00', 54, NULL, 'workforce tracking (For 3 Month)', '300.000000000000000'),
(126, '1.000000000000000', '0.00', 55, NULL, 'E- brochure (per Page)', '500.000000000000000'),
(127, '3.000000000000000', '0.00', 55, NULL, 'Social media Design and Maintenance  ( For Facebook,twitter,Google+,LinkedIn ) For 3 month', '2000.000000000000000'),
(129, '500.000000000000000', '0.00', 55, NULL, 'Visiting Card (lvory 400 GSM,Spot Lamination Both Side)', '2.300000000000000'),
(130, '12.000000000000000', '0.00', 56, NULL, 'Cloud Hosting (Unlimited) For 1 Year', '630.000000000000000'),
(131, '1.000000000000000', '0.00', 56, NULL, 'Domain Transfer (tripolarcon.com)', '730.000000000000000'),
(132, '1.000000000000000', '0.00', 55, NULL, 'Web Design -Home Page', '7500.000000000000000'),
(133, '4.000000000000000', '0.00', 55, NULL, 'Web Design-Next Pages(As Per Page)', '1500.000000000000000'),
(134, '1.000000000000000', '0.00', 50, NULL, 'Espon Printer Ink ', '700.000000000000000'),
(135, '1.000000000000000', '0.00', 56, NULL, 'Purchase Domain (tripolarcon.in)', '574.000000000000000'),
(136, '1.000000000000000', '0.00', 56, NULL, 'Purchase Domain (tripolarcon.co.in)', '423.000000000000000'),
(137, '1.000000000000000', '0.00', 57, NULL, 'mach2international.com (Domain renewal\r\nfor one year from 09/09/2017 to\r\n09/09/2018)', '750.000000000000000'),
(138, '12.000000000000000', '0.00', 57, NULL, 'Hosting Charges ( mach2international.com\r\nfor one year from 09/09/2017 to\r\n09/09/2018 )', '180.000000000000000'),
(139, '500.000000000000000', '0.00', 58, NULL, 'Letter Head \r\n( A4 size )', '4.000000000000000'),
(140, '1000.000000000000000', '0.00', 58, NULL, 'Letter Head \r\n( A4 size )', '2.200000000000000'),
(141, '1.000000000000000', '0.00', 59, NULL, 'mach2international.com (Domain renewal\r\nfor one year from 09/09/2017 to\r\n09/09/2018)', '750.000000000000000'),
(142, '12.000000000000000', '0.00', 59, NULL, 'Hosting Charges ( mach2international.com\r\nfor one year from 09/09/2017 to\r\n09/09/2018 )', '180.000000000000000'),
(143, '1.000000000000000', '0.00', 60, NULL, 'Star  Flex 6 X 3', '360.000000000000000'),
(144, '1.000000000000000', '0.00', 60, NULL, ' Constructor A4 poster design', '0.000000000000000'),
(145, '1.000000000000000', '0.00', 60, NULL, 'Flex Designing ', '0.000000000000000'),
(146, '5.000000000000000', '0.00', 60, NULL, 'Dashboard Design', '0.000000000000000'),
(147, '1.000000000000000', '0.00', 61, NULL, 'Accounts Software \r\n\r\n\r\n\r\n(One Time changes )', '16500.000000000000000'),
(148, '1.000000000000000', '0.00', 61, NULL, 'Cloud Hosting for 1 Year', '4500.000000000000000'),
(149, '100.000000000000000', '0.00', 62, NULL, 'Referral Pad ( A5Size, 4 Color Printing,Preparation,Both Side Printing,25 Each Pad)', '70.000000000000000'),
(150, '1.000000000000000', '0.00', 50, NULL, 'Espon Printer Ink ( 6 Bottle )', '4000.000000000000000'),
(151, '500.000000000000000', '0.00', 63, NULL, 'Letter Head \r\n( A4 size )', '4.000000000000000'),
(152, '7.000000000000000', '0.00', 63, NULL, 'Id card (PVC card,Front )', '35.000000000000000'),
(153, '15.000000000000000', '0.00', 63, NULL, 'Ribbon with back Case', '15.000000000000000'),
(154, '100.000000000000000', '0.00', 64, NULL, 'Deferral Pad ( A5  size,Cover 4 color,single color print,25 Pages each pad)', '45.000000000000000'),
(155, '1000.000000000000000', '0.00', 64, NULL, 'Letter Head \r\n( A4 size )', '3.500000000000000'),
(156, '500.000000000000000', '0.00', 65, NULL, 'Folders printing ( 300 GSM ,Gloss Lamination with Pocket ,18.50 in X 13 In)', '23.000000000000000'),
(157, '200.000000000000000', '0.00', 65, NULL, 'Visiting Card (Mirror Coat,250 GSM ,Both Side)', '2.500000000000000'),
(158, '30.000000000000000', '0.00', 66, NULL, 'Mug Printing( 4 color )', '200.000000000000000'),
(160, '100.000000000000000', '0.00', 66, NULL, 'Ribbon (Satin 18mm,4 Color, both Side Print) ', '65.000000000000000'),
(162, '1000.000000000000000', '0.00', 67, NULL, 'Visiting Card (NT 180 GSM,Spot Lamination single Side)', '0.900000000000000'),
(163, '16.000000000000000', '0.00', 68, NULL, 'Id card (PVC card,Front with Lanyard   )', '45.000000000000000'),
(166, '100.000000000000000', '0.00', 69, NULL, 'referral Pad ( A5  size,Cover 4 color,single color print,25 Pages each pad)', '45.000000000000000'),
(167, '1000.000000000000000', '0.00', 69, NULL, 'Letter Head \r\n( A4 size )', '3.500000000000000'),
(168, '2000.000000000000000', '0.00', 70, NULL, 'Envelop Printing ( 100 GSM,5 X 10  inch,4 Color )', '4.000000000000000'),
(169, '5000.000000000000000', '0.00', 70, NULL, 'Envelop Printing ( 100 GSM,5 X 10  inch,4 Color )', '3.500000000000000'),
(170, '16.000000000000000', '0.00', 71, NULL, 'Id card (PVC card,Front with Lanyard   )', '45.000000000000000'),
(171, '1000.000000000000000', '0.00', 72, NULL, 'Visiting Card (NT 180 GSM,Spot Lamination single Side)', '0.900000000000000'),
(172, '3000.000000000000000', '0.00', 73, NULL, 'Visiting Card (lvory 350 GSM,Spot Lamination Single Side)', '1.400000000000000'),
(175, '3000.000000000000000', '0.00', 73, NULL, 'Letter Heads (A4)', '2.850000000000000'),
(176, '2000.000000000000000', '0.00', 73, NULL, 'Letter Heads(A4)', '2.850000000000000'),
(177, '6000.000000000000000', '0.00', 73, NULL, 'Envelop Printing ( 80 GSM,9.25 X 4.25  inch,4 Color )', '2.500000000000000'),
(178, '1000.000000000000000', '0.00', 73, NULL, 'Envelop Printing ( 80 GSM, A4,4 Color )', '10.900000000000000'),
(180, '2.000000000000000', '0.00', 73, NULL, 'Bio metric Attendance', '8455.000000000000000'),
(181, '500.000000000000000', '0.00', 74, NULL, 'Lanyard Printing (satin finish,18mm,both side printing,buckle attachment & Oval Dog Hook)', '70.000000000000000'),
(182, '700.000000000000000', '0.00', 75, NULL, 'T-Shirt ( With 2 logo embroidery & one logo )', '0.000000000000000'),
(183, '700.000000000000000', '0.00', 75, NULL, 'T-Shirt ( With 2 logo embroidery & one logo )', '0.000000000000000'),
(184, '1200.000000000000000', '0.00', 75, NULL, 'Dairy with Cover and Pages ( A5)', '0.000000000000000'),
(185, '1.000000000000000', '0.00', 75, NULL, 'Dairy pages printed', '0.000000000000000'),
(186, '1.000000000000000', '0.00', 75, NULL, 'Dairy pages plan ', '0.000000000000000'),
(188, '500.000000000000000', '0.00', 76, NULL, 'Visiting Card (lvory 400  GSM,Spot Lamination One Side)', '1.400000000000000'),
(190, '1.000000000000000', '0.00', 77, NULL, 'kedarchandurkar.com (Domain renewal\r\nfor one year from 30/09/2017 to\r\n30/09/2018)', '750.000000000000000'),
(191, '12.000000000000000', '0.00', 77, NULL, 'Hosting Charges (kedarchandurkar.com one year from 30/09/2017 to\r\n30/09/2018 )', '200.000000000000000'),
(192, '1.000000000000000', '0.00', 78, NULL, 'tcrpl.com (Domain renewal\r\nfor one year from 01/10/2017 to\r\n01/10/2018)', '750.000000000000000'),
(193, '1.000000000000000', '0.00', 79, NULL, 'ggp.co.in (Domain renewal\r\nfor one year from 05/10/2017 to\r\n05/10/2018)', '725.000000000000000'),
(194, '1.000000000000000', '0.00', 79, NULL, 'globalgrouppune.in (Domain renewal\r\nfor one year from 05/10/2017 to\r\n05/10/2018)', '725.000000000000000'),
(196, '1.000000000000000', '0.00', 80, NULL, 'sakhelpline.org (Domain renewal\r\nfor one year from 30/09/2017 to\r\n30/09/2018)', '850.000000000000000'),
(197, '12.000000000000000', '0.00', 80, NULL, 'sakhelpline.org (Hosting renewal\r\nfor one year from 30/09/2017 to\r\n30/09/2018)', '400.000000000000000'),
(198, '1.000000000000000', '0.00', 81, NULL, 'Monitor  17\"  ', '3500.000000000000000'),
(199, '1.000000000000000', '0.00', 81, NULL, 'i3, 4GB RAM,320 GB HDD,Keyboard,Mouse', '10800.000000000000000'),
(200, '500.000000000000000', '0.00', 82, NULL, 'Visiting Card (lvory 400GSM,Spot Lamination Both Side)', '2.100000000000000'),
(201, '1000.000000000000000', '0.00', 82, NULL, 'Visiting Card (lvory 400GSM,Spot Lamination Both Side)', '1.500000000000000'),
(202, '1000.000000000000000', '0.00', 82, NULL, 'Envelop Printing ( 130GSM,9 X 12 inch,4 Color )', '8.000000000000000'),
(203, '1000.000000000000000', '0.00', 82, NULL, 'Envelop Printing ( 100GSM,9.25 X 4.25 inch,2 Color )', '4.000000000000000'),
(204, '10.000000000000000', '0.00', 82, NULL, 'Delivery Book ( 1+1,1/8 size,preparation,Single color,100 each) ', '140.000000000000000'),
(205, '10.000000000000000', '0.00', 82, NULL, 'Service Report ( 1+1+1,A4 size,preparation,Single color,50 each)', '200.000000000000000'),
(206, '1.000000000000000', '0.00', 78, NULL, 'traveltime.co.in (Domain renewal\r\nfor one year from 16/10/2017 to\r\n16/10/2018)', '450.000000000000000'),
(207, '1.000000000000000', '0.00', 83, NULL, 'aprca.com ( 31st March 2017 to 31st March 2018)', '750.000000000000000'),
(208, '12.000000000000000', '0.00', 83, NULL, 'Hosting for 1 year ( 31st March 2017 to 31st March 2018)', '180.000000000000000'),
(209, '100.000000000000000', '0.00', 84, NULL, 'DVD sticker priting', '5.400000000000000'),
(210, '100.000000000000000', '0.00', 84, NULL, 'DVD (4.7 GB ,Sony )', '20.000000000000000'),
(211, '500.000000000000000', '0.00', 85, NULL, 'Visiting Card (lvory 400  GSM,Spot Lamination One Side)', '1.400000000000000'),
(212, '1.000000000000000', '0.00', 86, NULL, 'Service and Maintenance\r\n(1st Oct 2017 to 30 Sep 2018) ', '50000.000000000000000'),
(213, '1.000000000000000', '0.00', 87, NULL, 'Domain: lifestyleforcorporate.com', '860.910000000000000'),
(214, '12.000000000000000', '0.00', 87, NULL, 'Hosting: 5 Mails+500MB Space', '180.000000000000000'),
(215, '3.000000000000000', '0.00', 88, NULL, 'Id card (PVC card,Front )', '45.000000000000000'),
(216, '10.000000000000000', '0.00', 88, NULL, 'Letter Head \r\n( A4 size )', '15.000000000000000'),
(217, '5.000000000000000', '0.00', 88, NULL, 'Mug Printing', '220.000000000000000'),
(218, '6.000000000000000', '0.00', 88, NULL, 'T-Shirt ( one logo )', '650.000000000000000'),
(219, '1000.000000000000000', '0.00', 88, NULL, 'Envelop Printing ( 100GSM,9.25 X 4.25  inch,4 Color )', '4.000000000000000'),
(220, '1.000000000000000', '0.00', 89, NULL, 'Web Development - Customize CMS Panel ', '15000.000000000000000'),
(221, '1000.000000000000000', '0.00', 73, NULL, 'Envelop Printing ( 80 GSM,9.25 X 4.25  inch,4 Color )', '3.200000000000000'),
(222, '500.000000000000000', '0.00', 90, NULL, 'Visiting Card ( Ivory,400 gsm ,spot\r\nlamination,both side)( Name- Deepak Dhumal)', '1.910000000000000'),
(223, '12.000000000000000', '0.00', 91, NULL, 'Cloud Hosting (Unlimited) For 1 Year', '630.000000000000000'),
(224, '1.000000000000000', '0.00', 91, NULL, 'Domain Transfer (tripolarcon.com)', '730.000000000000000'),
(225, '1.000000000000000', '0.00', 91, NULL, 'Purchase Domain (tripolarcon.in)', '574.000000000000000'),
(226, '1.000000000000000', '0.00', 91, NULL, 'Purchase Domain (tripolarcon.co.in)', '423.000000000000000'),
(227, '1.000000000000000', '0.00', 92, NULL, 'Bio metric Attendance-(SY)VET-S200TCA', '8455.000000000000000'),
(228, '54.000000000000000', '0.00', 93, NULL, 'Report cards ( A4 Size,250 GSM)', '35.000000000000000'),
(232, '1.000000000000000', '0.00', 94, NULL, 'Brochure Designing', '3000.000000000000000'),
(233, '30.000000000000000', '0.00', 95, NULL, 'Mug Printing( 4 color )', '200.000000000000000'),
(234, '100.000000000000000', '0.00', 95, NULL, 'Ribbon (Satin 18mm,4 Color, both Side Print) ', '65.000000000000000'),
(235, '54.000000000000000', '0.00', 96, NULL, 'Report cards ( A4 Size,250 GSM)', '35.000000000000000'),
(236, '3.000000000000000', '0.00', 97, NULL, 'Digital Marketing (Social Media & Website Maintenance) ', '4250.000000000000000'),
(237, '5.000000000000000', '0.00', 98, NULL, 'Medical Prescription ( 1/8,100 Pages Each)', '150.000000000000000'),
(238, '100.000000000000000', '0.00', 99, NULL, 'Visiting card ( 250 GSM ,F/B )', '2.500000000000000'),
(239, '1.000000000000000', '0.00', 100, NULL, 'ggp.co.in (Domain renewal\r\nfor one year from 05/10/2017 to\r\n05/10/2018)', '725.000000000000000'),
(240, '1.000000000000000', '0.00', 100, NULL, 'globalgrouppune.in (Domain renewal\r\nfor one year from 05/10/2017 to\r\n05/10/2018)', '725.000000000000000'),
(241, '1.000000000000000', '0.00', 101, NULL, 'Nutanmahavisyalaya.com(Domain Renewal for 1 Yr. 21/10/2017 to 21/11/2018)', '1000.000000000000000'),
(242, '12.000000000000000', '0.00', 101, NULL, 'Nutanmahavisyalaya.com(Hosting Renewal for 1 Yr. 21/10/2017 to 21/11/2018)', '180.000000000000000'),
(243, '1.000000000000000', '0.00', 102, NULL, 'Ushakal.com ( Domain Renewal for 1 yr. 20/10/2017 to 20/10/2018 )', '750.000000000000000'),
(244, '1.000000000000000', '0.00', 102, NULL, 'Ushakal.net ( Domain Renewal for 1 yr. 20/10/2017 to 20/10/2018 )', '975.000000000000000'),
(245, '1.000000000000000', '0.00', 102, NULL, 'Ushakal.in ( Domain Renewal for 1 yr. 20/10/2017 to 20/10/2018 )', '550.000000000000000'),
(246, '12.000000000000000', '0.00', 102, NULL, 'Web Hosting for  1 yr.', '400.000000000000000'),
(247, '5.000000000000000', '0.00', 102, NULL, 'Email Id renewal for 1 yr.', '200.000000000000000'),
(248, '800.000000000000000', '0.00', 103, NULL, 'PVC card,Front back card  ( HSN Code - 8523)', '40.000000000000000'),
(249, '800.000000000000000', '0.00', 103, NULL, 'Plastic Id card holder ( HSN Code - 39261099)', '3.000000000000000'),
(250, '3.000000000000000', '0.00', 104, NULL, 'eyedentitybs.com (Domain renewal from\r\n15 February 2015 to 14 February 2018)', '730.000000000000000'),
(251, '3.000000000000000', '0.00', 104, NULL, 'eyedentitybs.com (Web Hosting from\r\n15 February 2015 to 14 February 2018))', '2700.000000000000000'),
(252, '8.000000000000000', '0.00', 104, NULL, 'Email Id for 3 yr.', '750.000000000000000'),
(253, '2.000000000000000', '0.00', 104, NULL, 'Domain Name Renewal (from 22nd June 2015 to 22nd\r\nJune 2017)', '726.000000000000000'),
(254, '2.000000000000000', '0.00', 104, NULL, 'Web Hosting (optilifemh.com,\r\nfrom 22nd June 2015 to 22nd\r\nJune 2017)', '2400.000000000000000'),
(255, '6.000000000000000', '0.00', 104, NULL, 'Email Id for 2 yr.', '300.000000000000000'),
(256, '1.000000000000000', '0.00', 105, NULL, 'Ushakal.com ( Domain Renewal for 1 yr. 20/10/2017 to 20/10/2018 )', '750.000000000000000'),
(257, '1.000000000000000', '0.00', 105, NULL, 'Ushakal.net ( Domain Renewal for 1 yr. 20/10/2017 to 20/10/2018 )', '975.000000000000000'),
(258, '1.000000000000000', '0.00', 105, NULL, 'Ushakal.in ( Domain Renewal for 1 yr. 20/10/2017 to 20/10/2018 )', '550.000000000000000'),
(259, '12.000000000000000', '0.00', 105, NULL, 'Web Hosting for  1 yr.', '400.000000000000000'),
(260, '5.000000000000000', '0.00', 105, NULL, 'Email Id renewal for 1 yr.', '200.000000000000000'),
(261, '1000.000000000000000', '0.00', 106, NULL, 'Premium Envelop 9.25 * 4.25\r\n( Single Color )', '2.500000000000000'),
(262, '1.000000000000000', '0.00', 107, NULL, 'katsengineers.com ( Domain renewal for 1 yr. 26/10/2017 to 26/10/2018)', '797.000000000000000'),
(263, '12.000000000000000', '0.00', 107, NULL, 'katsengineers.com ( Hosting renewal for 1 yr. 26/10/2017 to 26/10/2018)', '180.000000000000000'),
(264, '1.000000000000000', '0.00', 108, NULL, 'blissutility.com ( Domain renewal for 1 yr. 31/10/2017 to 31/10/2018)', '797.000000000000000'),
(265, '12.000000000000000', '0.00', 108, NULL, 'blissutility.com ( Hosting renewal for 1 yr. 31/10/2017 to 31/10/2018)', '200.000000000000000'),
(266, '3.000000000000000', '0.00', 109, NULL, 'EBC Retainer ship for 3 month', '20000.000000000000000'),
(267, '100.000000000000000', '0.00', 110, NULL, 'Referral Pad ( A5Size, 4 Color Printing,Preparation,Both Side Printing,25 Each Pad)', '45.000000000000000'),
(268, '500.000000000000000', '0.00', 110, NULL, 'Envelop Printing ( Art Paper 210GSM,9 X 12 inch,4 Color )', '15.000000000000000'),
(269, '2.000000000000000', '0.00', 110, NULL, 'Ink Bottel Pack of 6  ( HP inkjet L805)', '700.000000000000000'),
(270, '20.000000000000000', '0.00', 111, NULL, 'Id card (PVC card,Front back card )', '40.000000000000000'),
(271, '1.000000000000000', '0.00', 112, NULL, 'Web Design Designing (Home Page)', '7500.000000000000000'),
(272, '5.000000000000000', '0.00', 112, NULL, 'Next Pages(As Per Page)', '1500.000000000000000'),
(273, '25.000000000000000', '0.00', 113, NULL, 'workforce tracking (For 3 Month)', '300.000000000000000'),
(274, '3.000000000000000', '0.00', 114, NULL, 'Maintenance + Social Media\r\nPage Design - Sparrow Package (\r\n01st Nov 2017 to 31st Jan 2018 )', '2000.000000000000000'),
(275, '25.000000000000000', '0.00', 115, NULL, 'T-Shirt ( Polo,1 logo embroidery & 1 Name Printed )', '750.000000000000000'),
(276, '25.000000000000000', '0.00', 115, NULL, 'T-Shirt ( Normal,1 logo Print & 1 Name Printed )', '450.000000000000000'),
(277, '50.000000000000000', '0.00', 116, NULL, 'Flag ', '100.000000000000000'),
(278, '72.000000000000000', '0.00', 116, NULL, 'Dangler', '125.000000000000000'),
(279, '1.000000000000000', '0.00', 116, NULL, 'Ribbon', '550.000000000000000'),
(280, '1.000000000000000', '0.00', 116, NULL, 'Reki ', '500.000000000000000'),
(281, '1.000000000000000', '0.00', 116, NULL, 'Delivery ', '500.000000000000000'),
(282, '50.000000000000000', '0.00', 117, NULL, 'Flag ', '100.000000000000000'),
(283, '72.000000000000000', '0.00', 117, NULL, 'Dangler', '125.000000000000000'),
(284, '1.000000000000000', '0.00', 117, NULL, 'Ribbon', '550.000000000000000'),
(285, '1.000000000000000', '0.00', 117, NULL, 'Reki ', '500.000000000000000'),
(286, '1.000000000000000', '0.00', 117, NULL, 'Delivery ', '500.000000000000000'),
(287, '39.000000000000000', '0.00', 118, NULL, 'Certificate Printing (Art\r\nPaper,A4 Size)', '15.000000000000000'),
(288, '3.000000000000000', '0.00', 118, NULL, 'Medal', '250.000000000000000'),
(289, '1.000000000000000', '0.00', 118, NULL, 'Crystal Trophies', '4000.000000000000000'),
(291, '35.000000000000000', '0.00', 120, NULL, ' Redesign PPT', '250.000000000000000'),
(292, '1.000000000000000', '0.00', 121, NULL, 'Building Panting (Floor Name , Wing, Toilet, Plant Name, Parking Number) ', '30000.000000000000000'),
(293, '500.000000000000000', '0.00', 121, NULL, 'Parking Sticker ( Vinyl, size 3in X 3in) ', '20.000000000000000'),
(294, '1.000000000000000', '0.00', 122, NULL, 'Door Transparent Vinyl (8 Ft X 7ft)', '7840.000000000000000'),
(295, '1.000000000000000', '0.00', 122, NULL, 'Wall Vinyl ( Matt Lamination,9ft X 29 ft)', '28710.000000000000000'),
(296, '1.000000000000000', '0.00', 122, NULL, 'Vinyl with 3mm Foam Sheet with Matt Lamination ( 5.5 Ft X 7.25 Ft)', '6000.000000000000000'),
(297, '1.000000000000000', '0.00', 122, NULL, 'Wall Vinyl ( Matt Lamination,9ft X 33 ft)', '32671.000000000000000'),
(298, '30.000000000000000', '0.00', 122, NULL, 'Satin Dangler ( 4ft X 3 ft)', '1425.000000000000000'),
(299, '1.000000000000000', '0.00', 122, NULL, 'Wall Vinyl ( Matt Lamination,9ft X 11 ft)', '10890.000000000000000'),
(300, '1.000000000000000', '0.00', 122, NULL, 'Door Transparent Vinyl (8 Ft X 6 ft)', '6720.000000000000000'),
(301, '1.000000000000000', '0.00', 122, NULL, 'Wall Vinyl ( Matt Lamination,9ft X  22 ft)', '21780.000000000000000'),
(302, '1.000000000000000', '0.00', 122, NULL, 'Wall Vinyl ( Matt Lamination,10 ft X  17 ft)', '18700.000000000000000'),
(303, '1.000000000000000', '0.00', 122, NULL, 'Wall Vinyl ( Matt Lamination,10 ft X  6 ft )', '1760.000000000000000'),
(304, '1.000000000000000', '0.00', 122, NULL, 'Vinyl with 3mm Foam Sheet with Matt Lamination ( 7 Ft X 4 Ft)', '4200.000000000000000'),
(305, '5.000000000000000', '0.00', 122, NULL, 'Left  Vinyl ( Matt Lamination,10 ft X  6 ft )', '3080.000000000000000'),
(306, '1.000000000000000', '0.00', 122, NULL, 'Name Plate ( metal Plate )', '0.000000000000000'),
(307, '1.000000000000000', '0.00', 122, NULL, 'Door Transparent Vinyl (8 Ft X 6 ft)', '6720.000000000000000'),
(308, '2.000000000000000', '0.00', 122, NULL, 'Door Transparent Vinyl (8 Ft X 5 ft)', '5600.000000000000000'),
(309, '2.000000000000000', '0.00', 122, NULL, 'Door Transparent Vinyl (8 Ft X 4 ft)', '4480.000000000000000'),
(310, '2.000000000000000', '0.00', 122, NULL, 'Door Transparent Vinyl (8 Ft X 7 inch)', '1120.000000000000000'),
(311, '1.000000000000000', '0.00', 122, NULL, 'Door Transparent Vinyl (8 Ft X 2.5 ft)', '2800.000000000000000'),
(312, '100.000000000000000', '0.00', 110, NULL, 'DVD ( Sony,4.7GB DVD\r\n(100 DVDs) ', '5.400000000000000'),
(313, '100.000000000000000', '0.00', 110, NULL, 'DVD Sticker  printing', '20.000000000000000'),
(314, '1.000000000000000', '0.00', 123, NULL, 'Web Design Designing (Home Page) ', '7500.000000000000000'),
(315, '6.000000000000000', '0.00', 123, NULL, 'Next Pages(As Per Page)', '1750.000000000000000'),
(316, '1.000000000000000', '0.00', 123, NULL, 'Domain Purchase (whitestyle.in)', '574.000000000000000'),
(317, '12.000000000000000', '0.00', 123, NULL, 'Website Hosting + 5 Email Id', '180.000000000000000'),
(318, '6.000000000000000', '0.00', 124, NULL, 'Name Plate ( SS Plate,Vinyl )', '150.000000000000000'),
(319, '100.000000000000000', '0.00', 125, NULL, 'Referral Pad ( A5Size, 4 Color Printing,Preparation,Both Side Printing,25 Each Pad)', '45.000000000000000'),
(320, '500.000000000000000', '0.00', 125, NULL, 'Envelop Printing ( Art Paper 210GSM,9 X 12 inch,4 Color )', '15.000000000000000'),
(321, '2.000000000000000', '0.00', 125, NULL, 'Ink Bottel Pack of 6  ( HP inkjet L805)', '700.000000000000000'),
(322, '100.000000000000000', '0.00', 125, NULL, 'DVD ( Sony,4.7GB DVD\r\n(100 DVDs) ', '5.400000000000000'),
(323, '100.000000000000000', '0.00', 125, NULL, 'DVD Sticker  printing', '20.000000000000000'),
(324, '6.000000000000000', '0.00', 126, NULL, 'Name Plate ( SS Plate,Vinyl )', '150.000000000000000'),
(325, '1.000000000000000', '0.00', 127, NULL, 'Moodle ', '125000.000000000000000'),
(326, '1.000000000000000', '0.00', 128, NULL, 'Corporate Branding \r\n( for 6 Month )', '25000.000000000000000'),
(327, '1.000000000000000', '0.00', 129, NULL, 'Domain Renewal (intelivus.com)\r\n13/12/2017 to 12/12/2018', '730.000000000000000'),
(328, '12.000000000000000', '0.00', 129, NULL, 'Web Hosting (intelivus.com)\r\n13/12/2017 to 12/12/18', '180.000000000000000'),
(329, '10.000000000000000', '0.00', 130, NULL, 'Receipt Book ( A5 Size , 1+1 ,Preparation,4 Color) ', '360.000000000000000'),
(330, '1.000000000000000', '0.00', 131, NULL, 'Purchase of Domain for 1 Yr. (techreinventions.asia   )', '1027.000000000000000'),
(331, '1.000000000000000', '0.00', 131, NULL, 'Purchase of Domain for 1 Yr. (techreinventions.com  )', '730.000000000000000'),
(332, '1.000000000000000', '0.00', 131, NULL, 'Purchase of Domain for 1 Yr. (techreinventions.in)', '574.000000000000000'),
(333, '1.000000000000000', '0.00', 131, NULL, 'Purchase of Domain for 1 Yr. (techreinventions.co.in )', '423.000000000000000'),
(334, '1.000000000000000', '0.00', 132, NULL, 'Purchase of Domain for 1 Yr. (techreinventions.asia   )', '1027.000000000000000'),
(335, '1.000000000000000', '0.00', 132, NULL, 'Purchase of Domain for 1 Yr. (techreinventions.com  )', '730.000000000000000'),
(336, '1.000000000000000', '0.00', 132, NULL, 'Purchase of Domain for 1 Yr. (techreinventions.in)', '574.000000000000000'),
(337, '1.000000000000000', '0.00', 132, NULL, 'Purchase of Domain for 1 Yr. (techreinventions.co.in )', '423.000000000000000'),
(338, '10.000000000000000', '0.00', 133, NULL, 'Receipt Book ( A5 Size , 1+1 ,Preparation,4 Color) ', '360.000000000000000'),
(339, '500.000000000000000', '0.00', 134, NULL, 'Pass ( 3 in X  3 in,250 GSM Paper)', '1.500000000000000'),
(340, '5.000000000000000', '0.00', 135, NULL, 'Kent High Glossy Photo Paper ( 180 GSM)', '220.000000000000000'),
(341, '100.000000000000000', '0.00', 135, NULL, 'CD Cover', '2.000000000000000'),
(342, '1.000000000000000', '0.00', 135, NULL, ' A4 Paper', '200.000000000000000'),
(343, '1.000000000000000', '0.00', 135, NULL, 'Epson Ink Pack of 6', '4200.000000000000000'),
(344, '1.000000000000000', '0.00', 135, NULL, 'Epson black Ink ', '700.000000000000000'),
(345, '5.000000000000000', '0.00', 135, NULL, 'Note Pad ( 80 Pages)', '55.000000000000000'),
(346, '1.000000000000000', '0.00', 135, NULL, 'Cello Pin Point Pen', '100.000000000000000'),
(347, '1.000000000000000', '0.00', 135, NULL, 'Stamp With Ink Pad', '150.000000000000000'),
(348, '1.000000000000000', '0.00', 135, NULL, 'Blue Paper ( 3in X 2in,60 GSM)', '80.000000000000000'),
(349, '500.000000000000000', '0.00', 136, NULL, 'Visiting Card (lvory 400 GSM,Spot Lamination Both Side)', '1.910000000000000'),
(350, '3.000000000000000', '0.00', 137, NULL, 'Facebook Camping ( For 3 month ) ', '7000.000000000000000'),
(351, '1.000000000000000', '0.00', 138, NULL, 'Standee ( 6Ft X3 ft, Star Flex)', '1800.000000000000000'),
(352, '1.000000000000000', '0.00', 138, NULL, 'Star Flex ( 10ft X 5ft )', '1000.000000000000000'),
(353, '1.000000000000000', '0.00', 138, NULL, 'Star Flex ( 6ft X 3ft )', '360.000000000000000'),
(354, '1.000000000000000', '0.00', 139, NULL, 'wisdomnurseryschool.in ( Domain Renewal for 10th Dec 2017 to 10th Dec 2018 )', '570.000000000000000'),
(355, '10.000000000000000', '0.00', 140, NULL, 'Receipt Book ( A4 Size , 1+1+1,Preparation,Single Color,50 Pages Book)', '500.000000000000000'),
(356, '1.000000000000000', '0.00', 141, NULL, 'Domain Renewal (intelivus.com)\r\n13/12/2017 to 12/12/2018', '730.000000000000000'),
(357, '12.000000000000000', '0.00', 141, NULL, 'Web Hosting (intelivus.com)\r\n13/12/2017 to 12/12/18', '180.000000000000000'),
(358, '500.000000000000000', '0.00', 142, NULL, 'Pass ( 3 in X  3 in,250 GSM Paper)', '1.500000000000000'),
(359, '1000.000000000000000', '0.00', 143, NULL, 'Brochure Printing (A5,Fold,170 GSM Art Glossy Paper  )', '9.000000000000000'),
(360, '5000.000000000000000', '0.00', 143, NULL, 'Brochure Printing (A5,Fold,170 GSM Art Glossy Paper  )', '3.000000000000000'),
(361, '1.000000000000000', '0.00', 144, NULL, 'Domain Purchase (trikayaayurved.com)', '730.000000000000000'),
(362, '1.000000000000000', '0.00', 144, NULL, 'Domain Purchase (trikayaayurved.in)', '574.000000000000000'),
(363, '1.000000000000000', '0.00', 144, NULL, 'Domain Purchase (trikayaayurved.co.in)', '423.000000000000000'),
(365, '12.000000000000000', '0.00', 144, NULL, 'Hosting Charges ( for 1 Year )', '180.000000000000000'),
(367, '5.000000000000000', '0.00', 145, NULL, 'Domain Purchase ( namohbd.in for 5  Year)', '574.000000000000000'),
(368, '1.000000000000000', '0.00', 146, NULL, 'Website Redevelopment', '15000.000000000000000'),
(369, '3.000000000000000', '0.00', 147, NULL, 'T-Shirt ( With 1 logo embroidery )', '500.000000000000000'),
(370, '500.000000000000000', '0.00', 147, NULL, 'Visiting Card (lvory 400 GSM,Spot Lamination Both Side)', '1.700000000000000'),
(371, '3.000000000000000', '0.00', 147, NULL, 'Id Card ', '35.000000000000000'),
(373, '20.000000000000000', '0.00', 148, NULL, 'T-Shirt ( 50% Polyester + 50% Cotton Polo,1 logo embroidery & 1 Name Printed ,11 Gray + 9 White, Size - XL - 3 L -12 M - 5 )', '650.000000000000000'),
(374, '20.000000000000000', '0.00', 149, NULL, 'T-Shirt ( 50% Polyester + 50% Cotton Polo,1 logo embroidery & 1 Name Printed ,11 Gray + 9 White, Size - XL - 3 L -12 M - 5 )', '650.000000000000000'),
(375, '3.000000000000000', '0.00', 150, NULL, 'Maintenance + Social Media\r\nPage Design - Sparrow Package (\r\n01st Nov 2017 to 31st Jan 2018 )', '2000.000000000000000'),
(376, '3.000000000000000', '0.00', 151, NULL, 'T-Shirt ( With 1 logo embroidery )', '500.000000000000000'),
(377, '500.000000000000000', '0.00', 151, NULL, 'Visiting Card (lvory 400 GSM,Spot Lamination Both Side)', '1.700000000000000'),
(378, '3.000000000000000', '0.00', 151, NULL, 'Id Card ', '35.000000000000000'),
(379, '100.000000000000000', '0.00', 152, NULL, 'DVD ( Sony,4.7GB DVD\r\n(100 DVDs) ', '20.000000000000000'),
(380, '100.000000000000000', '0.00', 152, NULL, 'DVD Sticker  printing', '5.400000000000000'),
(381, '5.000000000000000', '0.00', 153, NULL, 'Kent High Glossy Photo Paper ( 180 GSM)', '220.000000000000000'),
(382, '1.000000000000000', '0.00', 154, NULL, 'Standee ( 6Ft X3 ft, Star Flex)', '1800.000000000000000'),
(383, '1.000000000000000', '0.00', 154, NULL, 'Star flex (7X7 ft)', '980.000000000000000'),
(384, '1.000000000000000', '0.00', 155, NULL, 'gkhiphop.com (Domain renewal\r\nfor one year from 11/01/2018 to\r\n11/01/2019)', '730.000000000000000'),
(385, '12.000000000000000', '0.00', 155, NULL, 'Hosting Charges ( gkhiphop.com for 1 Year )', '225.000000000000000'),
(386, '1.000000000000000', '0.00', 156, NULL, 'Domain Purchase (trikayaayurved.com)', '730.000000000000000'),
(387, '1.000000000000000', '0.00', 156, NULL, 'Domain Purchase (trikayaayurved.in)', '574.000000000000000'),
(388, '1.000000000000000', '0.00', 156, NULL, 'Domain Purchase (trikayaayurved.co.in)', '423.000000000000000'),
(389, '12.000000000000000', '0.00', 156, NULL, 'Hosting Charges ( for 1 Year )', '180.000000000000000'),
(390, '1.000000000000000', '0.00', 157, NULL, 'Domain Purchase (almarsfood.com for 9th Jan 2018 To 9th Jan 2019)', '730.000000000000000'),
(391, '12.000000000000000', '0.00', 157, NULL, 'Hosting Charges ( almarsfood.com  for  29th Nov 2017 To 09th Jan 2019 )', '540.000000000000000'),
(392, '1.000000000000000', '0.00', 157, NULL, 'Logo Design', '3000.000000000000000'),
(393, '1.000000000000000', '0.00', 157, NULL, 'Brochure Designing - 4 Pages', '500.000000000000000'),
(394, '3.000000000000000', '0.00', 157, NULL, 'Dedicated Resource for 3 Days Only ', '500.000000000000000'),
(395, '1000.000000000000000', '0.00', 158, NULL, 'Pen ', '13.000000000000000'),
(396, '100.000000000000000', '0.00', 158, NULL, 'Pen ', '20.000000000000000'),
(397, '3000.000000000000000', '0.00', 159, NULL, 'Premium Envelop 9.25 * 4.25\r\n( Single Color )', '2.500000000000000'),
(399, '1.000000000000000', '0.00', 160, NULL, 'Standee ( 6Ft X3 ft, Star Flex)', '1800.000000000000000'),
(400, '1.000000000000000', '0.00', 160, NULL, 'Star flex (7X7 ft)', '980.000000000000000'),
(401, '50.000000000000000', '0.00', 158, NULL, 'Calendar ( 8.3 inch X 3.70 Inch , Design Size = 4 inch X 3 inch) ', '170.000000000000000'),
(402, '100.000000000000000', '0.00', 158, NULL, 'Calendar ( 8.3 inch X 3.70 Inch , Design Size = 4 inch X 3 inch) ', '150.000000000000000'),
(403, '3.000000000000000', '0.00', 161, NULL, 'Social media Design and Maintenance  ( For Facebook,twitter,Google+,LinkedIn ) For 3 month', '10000.000000000000000'),
(404, '12.000000000000000', '0.00', 145, NULL, 'Linux Hosting - \r\n\r\n\r\n(\r\n\r\n\r\n\r\n5 Domains,\r\nUnlimited Disk Space,\r\nUnlimited Data Transfer,\r\nUnlimited Email Accounts) For 1 Year Only', '450.000000000000000'),
(405, '3.000000000000000', '0.00', 162, NULL, 'Website Maintenance ( For 1 Dec 2017 To 28 Feb 2018)', '3000.000000000000000'),
(406, '1.000000000000000', '0.00', 163, NULL, 'shiprichshipping.com (Domain renewal\r\nfor one year from 17/01/2018 to\r\n17/01/2019)', '820.000000000000000'),
(407, '12.000000000000000', '0.00', 163, NULL, 'Hosting Charges (\r\nshiprichshipping.com , For 1 Year\r\n)', '200.000000000000000'),
(408, '30.000000000000000', '0.00', 164, NULL, 'T-Shirt ( 50% Polyester + 50% Cotton Polo,1 logo embroidery & 1 Name Printed ,15 Gray + 15 White, Size - XL - 15 L -15 ) ', '650.000000000000000'),
(409, '1.000000000000000', '0.00', 165, NULL, 'shiprichshipping.com (Domain renewal\r\nfor one year from 17/01/2018 to\r\n17/01/2019)', '820.000000000000000'),
(410, '12.000000000000000', '0.00', 165, NULL, 'Windows Hosting - \r\n\r\n\r\n(Unlimited Disk Space,\r\nUnlimited Email Accounts) For 1 Year', '500.000000000000000'),
(411, '1.000000000000000', '0.00', 166, NULL, 'shiprichshipping.com (Domain renewal\r\nfor one year from 17/01/2018 to\r\n17/01/2019)', '820.000000000000000'),
(412, '12.000000000000000', '0.00', 166, NULL, 'Hosting Charges (\r\nshiprichshipping.com , For 1 Year\r\n)', '200.000000000000000'),
(413, '100.000000000000000', '0.00', 167, NULL, 'DVD Sticker  printing', '5.400000000000000'),
(414, '100.000000000000000', '0.00', 167, NULL, 'DVD ( Sony,4.7GB DVD\r\n(100 DVDs) ', '20.000000000000000'),
(415, '10.000000000000000', '0.00', 167, NULL, 'Kent High Glossy Photo Paper ( 180 GSM)', '220.000000000000000'),
(416, '1.000000000000000', '0.00', 168, NULL, 'Website Redevelopment 3 Month Free Maintenance ( 100 - 125 Pages)', '150000.000000000000000'),
(417, '12.000000000000000', '0.00', 168, NULL, 'Website Maintenance  for 1 Year', '8500.000000000000000'),
(418, '1.000000000000000', '0.00', 169, NULL, 'Domain Purchase (almarsfood.com for 9th Jan 2018 To 9th Jan 2019)', '730.000000000000000'),
(419, '12.000000000000000', '0.00', 169, NULL, 'Hosting Charges ( almarsfood.com  for  29th Nov 2017 To 09th Jan 2019 )', '540.000000000000000'),
(420, '1.000000000000000', '0.00', 169, NULL, 'Logo Design', '3000.000000000000000'),
(421, '1.000000000000000', '0.00', 169, NULL, 'Brochure Designing - 4 Pages', '500.000000000000000'),
(422, '3.000000000000000', '0.00', 169, NULL, 'Dedicated Resource for 3 Days Only ', '500.000000000000000'),
(423, '500.000000000000000', '0.00', 170, NULL, 'Visiting Card ( Ivory,400gsm ,spot\r\nlamination,both side)( Name-\r\nAkhilesh Sharma)', '1.900000000000000'),
(424, '1.000000000000000', '0.00', 171, NULL, 'Domain Purchase (bahujanmaharashtra.com) 1 Year', '750.000000000000000'),
(425, '1.000000000000000', '0.00', 171, NULL, 'Domain Purchase (bahujanmaharashtra.tv) For 1 Year', '2100.000000000000000'),
(426, '12.000000000000000', '0.00', 171, NULL, 'Hosting Purchase ( For 1 Year )', '220.000000000000000'),
(427, '1.000000000000000', '0.00', 171, NULL, 'Website Development ( Home Page)', '10000.000000000000000'),
(428, '4.000000000000000', '0.00', 171, NULL, 'Website Development ( Next Page)', '2500.000000000000000'),
(429, '100.000000000000000', '0.00', 172, NULL, 'DVD Sticker  printing', '5.400000000000000'),
(430, '100.000000000000000', '0.00', 172, NULL, 'DVD ( Sony,4.7GB DVD\r\n(100 DVDs) ', '20.000000000000000'),
(431, '10.000000000000000', '0.00', 172, NULL, 'Kent High Glossy Photo Paper ( 180 GSM)', '220.000000000000000'),
(432, '30.000000000000000', '0.00', 173, NULL, 'T-Shirt ( 50% Polyester + 50% Cotton Polo,1 logo embroidery & 1 Name Printed ,15 Gray + 15 White, Size - XL - 15 L -15 ) ', '650.000000000000000'),
(433, '5.000000000000000', '0.00', 174, NULL, 'Domain Purchase ( namohbd.in for 5  Year)', '574.000000000000000'),
(434, '12.000000000000000', '0.00', 174, NULL, 'Linux Hosting - \r\n\r\n\r\n(\r\n\r\n\r\n\r\n5 Domains,\r\nUnlimited Disk Space,\r\nUnlimited Data Transfer,\r\nUnlimited Email Accounts) For 1 Year Only', '450.000000000000000'),
(435, '1.000000000000000', '0.00', 175, NULL, 'Citylines.co.in ( Domain renewal for 1 yr. 30/01/2018 To 30/01/2019 )', '550.000000000000000'),
(436, '1.000000000000000', '0.00', 175, NULL, 'Citylines.in ( Domain renewal for 1 yr. 30/01/2018 To 30/01/2019 )', '700.000000000000000'),
(437, '12.000000000000000', '0.00', 175, NULL, 'Web Hosting for  1 yr.', '500.000000000000000'),
(438, '100.000000000000000', '0.00', 176, NULL, 'Referral Pad ( A5 Size, 4 Color Printing,Preparation,Both Side Printing,25 Each Pad)', '45.000000000000000'),
(439, '500.000000000000000', '0.00', 176, NULL, 'Envelop Printing ( 210 GSM,9 X 12 inch,4 Color )', '15.000000000000000'),
(440, '2.000000000000000', '0.00', 176, NULL, 'Epson black Ink ', '700.000000000000000'),
(441, '500.000000000000000', '0.00', 176, NULL, 'Folders printing ( 300 GSM ,Gloss Lamination with Pocket ,18.50 in X 13 In) ', '23.000000000000000'),
(442, '1.000000000000000', '0.00', 177, NULL, 'CRM Software Development ', '90000.000000000000000'),
(443, '1.000000000000000', '0.00', 178, NULL, 'placewell.net (Domain renewal\r\n08/02/2018 to 08/02/2019 )', '973.000000000000000'),
(445, '1.000000000000000', '0.00', 179, NULL, 'abgensets.co.in (Domain renewal\r\n13th Feb 2018 to 13th Feb 2019 )', '499.000000000000000'),
(446, '12.000000000000000', '0.00', 179, NULL, 'abgensets.co.in (Hosting renewal\r\n13th Feb 2018 to 13th Feb 2019 )', '200.000000000000000'),
(447, '3.000000000000000', '0.00', 180, NULL, 'eyedentitybs.com  (Domain renewal 15th Feb 2018 to\r\n15th Feb 2021 )', '730.000000000000000'),
(448, '3.000000000000000', '0.00', 180, NULL, 'eyedentitybs.com  (Hosting renewal 15th Feb 2018 to\r\n15th Feb 2021 ) 5 Email Id Free', '2700.000000000000000'),
(449, '3.000000000000000', '0.00', 180, NULL, 'Extra 7 Email Id  for 3 yr.', '1750.000000000000000'),
(450, '1.000000000000000', '0.00', 181, NULL, 'Citylines.co.in ( Domain renewal for 1 yr. 30/01/2018 To 30/01/2019 )', '550.000000000000000'),
(451, '1.000000000000000', '0.00', 181, NULL, 'Citylines.in ( Domain renewal for 1 yr. 30/01/2018 To 30/01/2019 )', '700.000000000000000'),
(452, '12.000000000000000', '0.00', 181, NULL, 'Web Hosting for  1 yr.', '500.000000000000000'),
(453, '3.000000000000000', '0.00', 182, NULL, 'Digital Marketing (Social Media & Website Maintenance)  ( For 05/01/2018 To 05/04/2018 )', '4250.000000000000000'),
(454, '1.000000000000000', '0.00', 178, NULL, 'Email Id ', '250.000000000000000'),
(455, '1.000000000000000', '0.00', 183, NULL, 'HDD DT SEAGATE 2TB SATA', '5500.000000000000000'),
(456, '1.000000000000000', '0.00', 183, NULL, 'Service Engineer Charge ', '350.000000000000000'),
(457, '5.000000000000000', '0.00', 159, NULL, 'Vinyl With 3mm foam sheet,6 X 3 with Lamination', '2168.000000000000000'),
(458, '3000.000000000000000', '0.00', 184, NULL, 'Premium Envelop 9.25 * 4.25\r\n( Single Color )', '2.500000000000000'),
(459, '5.000000000000000', '0.00', 184, NULL, 'Vinyl With 3mm foam sheet,6 X 3 with Lamination', '2168.000000000000000'),
(460, '1.000000000000000', '0.00', 185, NULL, 'placewell.net (Domain renewal\r\n08/02/2018 to 08/02/2019 )', '973.000000000000000'),
(461, '1.000000000000000', '0.00', 185, NULL, 'Email Id ', '250.000000000000000'),
(462, '1.000000000000000', '0.00', 186, NULL, 'Stage Banner, Killa Banner, Welcome Board  Designing (CDR File )', '1000.000000000000000'),
(463, '1.000000000000000', '0.00', 186, NULL, 'Invitation card design ( JPG )', '200.000000000000000');
INSERT INTO `item` (`id`, `quantity`, `discount`, `common_id`, `product_id`, `description`, `unitary_cost`) VALUES
(466, '1.000000000000000', '0.00', 187, NULL, 'Social Media Creative Designing ( 10 Design per Month ) ', '5000.000000000000000'),
(467, '3.000000000000000', '0.00', 188, NULL, 'eyedentitybs.com  (Domain renewal 15th Feb 2018 to\r\n15th Feb 2021 )', '730.000000000000000'),
(468, '3.000000000000000', '0.00', 188, NULL, 'eyedentitybs.com  (Hosting renewal 15th Feb 2018 to\r\n15th Feb 2021 ) 5 Email Id Free', '2700.000000000000000'),
(469, '3.000000000000000', '0.00', 188, NULL, 'Extra 7 Email Id  for 3 yr.', '1750.000000000000000'),
(470, '1.000000000000000', '0.00', 189, NULL, 'tcrpl.com (Domain renewal for one\r\nyear from 01/10/2017 to\r\n01/10/2018)', '750.000000000000000'),
(471, '1.000000000000000', '0.00', 189, NULL, 'traveltime.co.in (Domain renewal\r\nfor one year from 16/10/2017 to\r\n16/10/2018)', '450.000000000000000'),
(472, '1.000000000000000', '0.00', 190, NULL, 'transole.co.in (Domain renewal\r\nfor one year from 17th March\r\n2017 to 17th March 2018 )', '423.000000000000000'),
(473, '12.000000000000000', '0.00', 190, NULL, 'Web Hosting ( transole.co.in, from\r\n17th March 2017 to 17th March\r\n2018)', '225.000000000000000'),
(474, '3.000000000000000', '0.00', 191, NULL, 'Visiting Card ( lvory 400 GSM,Velvet & Spot Lamination Both Side)', '1500.000000000000000'),
(475, '500.000000000000000', '0.00', 191, NULL, 'Brochure Printing ( 1/8 Size, 300 GSM , Gloss Lamination )', '12.000000000000000'),
(476, '100.000000000000000', '0.00', 176, NULL, 'Visiting Card (250GSM Planora MG)', '2.500000000000000'),
(477, '4.000000000000000', '0.00', 192, NULL, 'Satin Dangler ( 2.5ft X 1.25 ft)', '1508.000000000000000'),
(478, '1.000000000000000', '0.00', 192, NULL, 'Delivery ', '500.000000000000000'),
(479, '7.000000000000000', '0.00', 193, NULL, 'Id card (PVC card,Front )', '45.000000000000000'),
(480, '500.000000000000000', '0.00', 193, NULL, 'Visiting Card (lvory 400 GSM,Spot Lamination Both Side) Indrajeet Chouhan', '1.910000000000000'),
(481, '1.000000000000000', '0.00', 194, NULL, 'vishwamodular.com (Domain renewal\r\nfor one year from 22/02/2018 to\r\n22/02/2019)', '796.000000000000000'),
(482, '12.000000000000000', '0.00', 194, NULL, 'vishwamodular.com (Hosting renewal\r\nfor one year from 22/02/2018 to\r\n22/02/2019)', '180.000000000000000'),
(483, '1.000000000000000', '0.00', 195, NULL, 'Social Media and Social Image Management\r\n( For 1 Month )', '15000.000000000000000'),
(484, '1.000000000000000', '0.00', 195, NULL, 'Logo Designing & Branding ', '5000.000000000000000'),
(485, '1.000000000000000', '0.00', 196, NULL, 'Website Home Page', '7500.000000000000000'),
(486, '6.000000000000000', '0.00', 196, NULL, 'Website Next Pages (If Static Pages)', '1750.000000000000000'),
(487, '6.000000000000000', '0.00', 196, NULL, 'Website Next Pages (If Dynamic Pages)', '2200.000000000000000'),
(488, '3.000000000000000', '0.00', 196, NULL, 'Social media Design and Maintenance  ( For Facebook,Twitter,Google+,LinkedIn ) For 3 month', '2000.000000000000000'),
(489, '2.000000000000000', '0.00', 197, NULL, 'Espon Printer Ink  Black only', '700.000000000000000'),
(490, '10.000000000000000', '0.00', 197, NULL, 'Kent High Glossy Photo Paper ( 180 GSM)', '220.000000000000000'),
(491, '1.000000000000000', '0.00', 198, NULL, 'Epson Ink Pack of 6', '4200.000000000000000'),
(492, '100.000000000000000', '0.00', 198, NULL, 'DVD ( Sony,4.7GB DVD\r\n(100 DVDs) ', '20.000000000000000'),
(493, '100.000000000000000', '0.00', 198, NULL, 'DVD Sticker  printing', '5.400000000000000'),
(494, '7.000000000000000', '0.00', 199, NULL, 'Id card (PVC card,Front )', '45.000000000000000'),
(495, '500.000000000000000', '0.00', 199, NULL, 'Visiting Card (lvory 400 GSM,Spot Lamination Both Side) Indrajeet Chouhan', '1.910000000000000'),
(496, '1.000000000000000', '0.00', 200, NULL, 'E-Commerce Website Development ( User Management, Product Tracking,  Email, Billing, Vendor Management)', '30000.000000000000000'),
(497, '1.000000000000000', '0.00', 200, NULL, 'Payment Gateway ', '5000.000000000000000'),
(498, '1.000000000000000', '0.00', 200, NULL, 'Domain & Hosting Charges for 1 yr.', '3500.000000000000000'),
(499, '12.000000000000000', '0.00', 201, NULL, 'Hosting for 1 Year (5 Email Id free)', '180.000000000000000'),
(500, '1.000000000000000', '0.00', 201, NULL, 'Domain Purchase (insdpune.com)', '730.000000000000000'),
(501, '1.000000000000000', '0.00', 201, NULL, 'Domain Purchase (insdpune.in)', '574.000000000000000'),
(502, '1.000000000000000', '100.00', 201, NULL, 'Domain Purchase (insdpune.co.in) Free for Woman\'s Day', '423.000000000000000'),
(503, '10.000000000000000', '0.00', 201, NULL, 'Website Development ( 10 Pages) ', '1500.000000000000000'),
(504, '1.000000000000000', '0.00', 202, NULL, 'E-Commerce Website Development ( User Management, Product Tracking,  Email, Billing, Vendor Management)', '30000.000000000000000'),
(505, '1.000000000000000', '0.00', 202, NULL, 'Payment Gateway', '5000.000000000000000'),
(506, '1.000000000000000', '0.00', 202, NULL, 'Domain & Hosting Charges for 1 yr.', '3500.000000000000000'),
(507, '1.000000000000000', '0.00', 203, NULL, 'Invoice Software ( For 1 Year )', '2500.000000000000000'),
(508, '1.000000000000000', '0.00', 204, NULL, 'abgensets.co.in (Domain renewal\r\n13th Feb 2018 to 13th Feb 2019 )', '499.000000000000000'),
(509, '12.000000000000000', '0.00', 204, NULL, 'abgensets.co.in (Hosting renewal\r\n13th Feb 2018 to 13th Feb 2019 )', '200.000000000000000'),
(510, '500.000000000000000', '0.00', 205, NULL, 'Poster Printing ( 23 X 18\r\nSize )', '13.000000000000000'),
(511, '200.000000000000000', '0.00', 205, NULL, 'Patrika ( A5 Size )', '4.500000000000000'),
(512, '8.000000000000000', '0.00', 205, NULL, 'Flex Printing ( 6 X 4 )', '360.000000000000000'),
(513, '1.000000000000000', '0.00', 205, NULL, 'Flex Printing ( 8 X 2 )', '304.000000000000000'),
(514, '1.000000000000000', '0.00', 206, NULL, 'Invoice Software ( For 1 Year )', '2500.000000000000000'),
(515, '1.000000000000000', '0.00', 206, NULL, 'Invoice Software ( Customization charges )', '5000.000000000000000'),
(516, '6000.000000000000000', '0.00', 206, NULL, 'Email Marketing(2000 email * 3 month)', '2.000000000000000'),
(517, '9.000000000000000', '0.00', 207, NULL, '2 gb Hosting Charges ( intelivus.com )', '180.000000000000000'),
(518, '9.000000000000000', '0.00', 208, NULL, '2 gb Hosting Charges ( intelivus.com )', '180.000000000000000'),
(519, '4.000000000000000', '0.00', 209, NULL, 'Standee ( 6Ft X3 ft, Star Flex)', '1600.000000000000000'),
(520, '3.000000000000000', '0.00', 209, NULL, 'Flex ( 6ft X 3ft )', '270.000000000000000'),
(521, '2.000000000000000', '0.00', 209, NULL, 'Flex ( 4ft X 3ft )', '180.000000000000000'),
(522, '500.000000000000000', '0.00', 209, NULL, 'Poster Printing ( 12 X 18\r\nSize,Single Side )', '6.500000000000000'),
(523, '1.000000000000000', '0.00', 209, NULL, 'Star flex (7X5 ft) ', '875.000000000000000'),
(524, '12.000000000000000', '0.00', 210, NULL, 'G suite  ( Two Account for  1 Year )', '300.000000000000000'),
(525, '1.000000000000000', '0.00', 209, NULL, 'Star flex with MS frame Stand (7X5 ft)  ', '4500.000000000000000'),
(526, '1.000000000000000', '0.00', 211, NULL, 'transole.co.in (Domain renewal\r\nfor one year from 17/03/2018 to\r\n17/03/2019)', '423.000000000000000'),
(527, '12.000000000000000', '0.00', 211, NULL, 'transole.co.in (Hosting renewal\r\nfor one year from 17/03/2018 to\r\n17/03/2019)', '225.000000000000000'),
(528, '12.000000000000000', '0.00', 212, NULL, 'G suite  ( Two Account for  1 Year )', '300.000000000000000'),
(529, '1.000000000000000', '0.00', 213, NULL, 'transole.co.in (Domain renewal\r\nfor one year from 17/03/2018 to\r\n17/03/2019)', '423.000000000000000'),
(530, '12.000000000000000', '0.00', 213, NULL, 'transole.co.in (Hosting renewal\r\nfor one year from 17/03/2018 to\r\n17/03/2019)', '225.000000000000000'),
(531, '1.000000000000000', '0.00', 214, NULL, 'Website Structure & Layout ', '9500.000000000000000'),
(532, '15.000000000000000', '0.00', 214, NULL, 'Dynamic Pages ', '1450.000000000000000'),
(533, '5.000000000000000', '0.00', 214, NULL, 'Static Pages', '750.000000000000000'),
(537, '1.000000000000000', '0.00', 215, NULL, 'Domain (.com for 1 year)', '800.000000000000000'),
(538, '12.000000000000000', '0.00', 215, NULL, 'Hosting ( 1GB for 1year 5 Email Free)', '200.000000000000000'),
(539, '12.000000000000000', '0.00', 216, NULL, 'Monthly Website Maintenance ( Paid Yearly)', '2000.000000000000000'),
(540, '1.000000000000000', '0.00', 217, NULL, 'RR Parkon Bom based Tracking Software', '125000.000000000000000'),
(541, '1.000000000000000', '0.00', 218, NULL, 'Domain Renewal ( packnjoy.co.in) 21st March 2018 to 21st March 2019.', '423.000000000000000'),
(542, '1.000000000000000', '0.00', 218, NULL, 'Domain Renewal ( packnjoy.in) for 20th March 2018 to 20th March 2019.', '574.000000000000000'),
(545, '12.000000000000000', '0.00', 219, NULL, 'Hosting for 1 Year (5 Email Id free)', '180.000000000000000'),
(546, '1.000000000000000', '0.00', 219, NULL, 'Domain Purchase (insdpune.com)', '730.000000000000000'),
(547, '1.000000000000000', '0.00', 219, NULL, 'Domain Purchase (insdpune.in)', '574.000000000000000'),
(548, '1.000000000000000', '100.00', 219, NULL, 'Domain Purchase (insdpune.co.in) Free for Woman\'s Day', '423.000000000000000'),
(549, '10.000000000000000', '0.00', 219, NULL, 'Website Development ( 10 Pages) ', '1500.000000000000000'),
(550, '6.000000000000000', '0.00', 220, NULL, 'Designing Charges ( Poster,Standee,Banner,Pad )', '500.000000000000000'),
(551, '1.000000000000000', '0.00', 186, NULL, 'Receipt Book (100) & Admission Form Design(200)', '300.000000000000000'),
(552, '3.000000000000000', '0.00', 186, NULL, 'Front board School branding Designing (CDR File )', '500.000000000000000'),
(554, '1.000000000000000', '0.00', 221, NULL, 'siddhakalaprint.com Hosting from 20 June 2014 to 20 June 2015', '2160.000000000000000'),
(555, '1.000000000000000', '0.00', 221, NULL, 'siddhakalaprint.com Domain from 20 June 2014 to 20 June 2015', '835.000000000000000'),
(556, '1.000000000000000', '0.00', 221, NULL, 'siddhakalaprint.com Hosting from 20 June 2015 to 20 June 2016', '2160.000000000000000'),
(557, '1.000000000000000', '0.00', 221, NULL, 'siddhakalaprint.com Domain from 20 June 2015 to 20 June 2016', '835.000000000000000'),
(558, '1.000000000000000', '0.00', 221, NULL, 'siddhakalaprint.com Hosting from 20 June 2016 to 20 June 2017', '2160.000000000000000'),
(559, '1.000000000000000', '0.00', 221, NULL, 'siddhakalaprint.com Domain from 20 June 2016 to 20 June 2017', '835.000000000000000'),
(560, '1.000000000000000', '0.00', 222, NULL, 'Website Redevelopment ( 57 Pages* 350)', '19950.000000000000000'),
(561, '3.000000000000000', '0.00', 222, NULL, 'Website Maintenance  ( 1 March 2018 to 31 May 2018)', '750.000000000000000'),
(562, '1.000000000000000', '0.00', 222, NULL, 'SEO & Social Media ( For Feb 2018 )', '15000.000000000000000'),
(563, '3.000000000000000', '0.00', 177, NULL, 'Software Maintenance ( 1 March 2018 to 31 May 2018 )', '2500.000000000000000'),
(564, '2.000000000000000', '0.00', 223, NULL, 'Flex ( 3 X 2 )', '90.000000000000000'),
(565, '2.000000000000000', '0.00', 224, NULL, 'T-Shirt ( one logo )', '500.000000000000000'),
(572, '1.000000000000000', '0.00', 225, NULL, 'Domain Purchase (tripolarcon.org)', '906.000000000000000'),
(573, '1.000000000000000', '0.00', 225, NULL, 'Domain Purchase (tripolarcon.co)', '2053.000000000000000'),
(583, '1.000000000000000', '0.00', 225, NULL, 'Domain Purchase (epoxytechnologies.co.in)', '423.000000000000000'),
(584, '1.000000000000000', '0.00', 225, NULL, 'Domain Purchase (epoxytechnologies.net)', '888.000000000000000'),
(585, '100.000000000000000', '0.00', 226, NULL, '500 MB EPRO Mailbox for 2 year Mail Monitoring Mailbox of 5 GB ( 5th March 2018 to 5th March 2019	)', '561.150000000000000'),
(586, '1.000000000000000', '0.00', 227, NULL, 'Domain Renewal (\r\nshraddha.co.in )', '425.000000000000000'),
(587, '12.000000000000000', '0.00', 227, NULL, 'Hosting Charges (\r\nshraddha.co.in)', '180.000000000000000'),
(588, '1.000000000000000', '0.00', 228, NULL, 'Domain Renewal (teqxcel.in for 1 Year )', '573.000000000000000'),
(589, '12.000000000000000', '0.00', 228, NULL, 'Hosting Charges ( teqxcel.in for 1 Year )', '180.000000000000000'),
(590, '1.000000000000000', '0.00', 229, NULL, 'Domain Purchase (epoxytechnologies.net)', '975.000000000000000'),
(591, '1.000000000000000', '0.00', 229, NULL, 'Domain Purchase (epoxytechnologies.co.in)', '415.000000000000000'),
(592, '4.000000000000000', '0.00', 230, NULL, 'Standee (6ft x 3ft star flex)', '1600.000000000000000'),
(593, '3.000000000000000', '0.00', 230, NULL, 'Flex (6ft x 3ft)', '270.000000000000000'),
(594, '6.000000000000000', '0.00', 230, NULL, 'Flex (4ft x 3ft) QTY-2+4', '180.000000000000000'),
(595, '500.000000000000000', '0.00', 230, NULL, 'Poster printing (12x18 single Side)', '6.500000000000000'),
(596, '4.000000000000000', '0.00', 230, NULL, 'Flex (3ft x 2ft)', '90.000000000000000'),
(597, '100.000000000000000', '0.00', 231, NULL, 'DVD ( Moserbaer,4.7GB DVD (100 DVDs) )', '20.000000000000000'),
(598, '100.000000000000000', '0.00', 231, NULL, 'DVD Sticker  printing', '5.400000000000000'),
(599, '10.000000000000000', '0.00', 231, NULL, 'Kent High Glossy Photo Paper ( 180 GSM)', '220.000000000000000'),
(600, '2.000000000000000', '0.00', 231, NULL, 'Epson black Ink ', '700.000000000000000'),
(601, '100.000000000000000', '0.00', 231, NULL, 'Referral Pad ( A5 Size, 4 Color Printing,Preparation,Both Side Printing,25 Each Pad)', '45.000000000000000'),
(602, '100.000000000000000', '0.00', 231, NULL, 'Visiting Card (250GSM Planora MG)', '2.500000000000000'),
(603, '2000.000000000000000', '0.00', 186, NULL, '1/8, 4color, Front back, 130 Gsm paper', '1.600000000000000'),
(604, '1.000000000000000', '0.00', 232, NULL, 'Backup data of website, create coming soon page', '500.000000000000000'),
(605, '6.000000000000000', '0.00', 230, NULL, 'Desiqninq charges (Poster, banner, Pad)', '500.000000000000000'),
(606, '12.000000000000000', '0.00', 233, NULL, 'Hosting Charges ( 500MB,for 1 Year )', '180.000000000000000'),
(607, '1.000000000000000', '0.00', 233, NULL, 'Domain  Transfer cost for 1 year ', '450.000000000000000');

-- --------------------------------------------------------

--
-- Table structure for table `item_tax`
--

CREATE TABLE `item_tax` (
  `item_id` bigint(20) NOT NULL DEFAULT '0',
  `tax_id` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_tax`
--

INSERT INTO `item_tax` (`item_id`, `tax_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 4),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 4),
(27, 4),
(28, 4),
(29, 4),
(30, 4),
(31, 4),
(32, 4),
(33, 4),
(35, 4),
(36, 4),
(37, 1),
(38, 4),
(39, 4),
(40, 4),
(41, 4),
(42, 4),
(43, 4),
(44, 4),
(45, 4),
(46, 4),
(47, 4),
(48, 4),
(49, 4),
(50, 6),
(51, 6),
(52, 7),
(53, 7),
(54, 7),
(55, 7),
(56, 7),
(57, 7),
(60, 7),
(61, 6),
(62, 6),
(63, 6),
(64, 7),
(66, 7),
(68, 6),
(69, 6),
(70, 6),
(71, 7),
(72, 7),
(73, 7),
(74, 7),
(75, 7),
(76, 7),
(77, 7),
(78, 7),
(79, 7),
(80, 7),
(81, 7),
(82, 7),
(83, 6),
(84, 7),
(85, 7),
(86, 7),
(87, 7),
(88, 7),
(89, 7),
(90, 7),
(91, 7),
(92, 6),
(93, 6),
(94, 6),
(96, 7),
(98, 7),
(99, 7),
(100, 7),
(102, 6),
(103, 7),
(104, 7),
(107, 7),
(108, 7),
(109, 7),
(110, 6),
(111, 7),
(113, 7),
(115, 7),
(116, 7),
(117, 7),
(118, 6),
(119, 6),
(121, 7),
(122, 7),
(123, 7),
(124, 7),
(125, 7),
(126, 7),
(127, 7),
(129, 7),
(130, 7),
(131, 7),
(132, 7),
(133, 7),
(135, 7),
(136, 7),
(137, 7),
(138, 7),
(139, 7),
(140, 7),
(141, 7),
(142, 7),
(147, 7),
(148, 7),
(149, 7),
(154, 7),
(155, 7),
(156, 6),
(157, 6),
(158, 7),
(160, 7),
(162, 6),
(163, 7),
(166, 7),
(167, 7),
(168, 7),
(169, 7),
(170, 7),
(171, 6),
(172, 6),
(175, 7),
(176, 7),
(177, 7),
(178, 7),
(180, 7),
(181, 7),
(182, 7),
(183, 7),
(184, 7),
(185, 7),
(186, 7),
(188, 6),
(190, 7),
(191, 7),
(192, 7),
(193, 7),
(194, 7),
(196, 7),
(197, 7),
(198, 7),
(199, 7),
(200, 6),
(201, 6),
(202, 7),
(203, 7),
(204, 7),
(205, 7),
(206, 7),
(207, 7),
(208, 7),
(209, 7),
(210, 7),
(211, 6),
(212, 7),
(213, 7),
(214, 7),
(215, 7),
(216, 7),
(217, 7),
(218, 7),
(219, 7),
(220, 7),
(221, 7),
(222, 6),
(223, 7),
(224, 7),
(225, 7),
(226, 7),
(227, 7),
(228, 7),
(232, 7),
(233, 7),
(234, 7),
(235, 7),
(236, 7),
(237, 7),
(238, 6),
(239, 7),
(240, 7),
(241, 7),
(242, 7),
(243, 7),
(244, 7),
(245, 7),
(246, 7),
(247, 7),
(248, 7),
(249, 8),
(250, 7),
(251, 7),
(252, 7),
(253, 7),
(254, 7),
(255, 7),
(256, 7),
(257, 7),
(258, 7),
(259, 7),
(260, 7),
(261, 7),
(262, 7),
(263, 7),
(264, 7),
(265, 7),
(266, 7),
(267, 7),
(268, 7),
(270, 7),
(271, 7),
(272, 7),
(273, 7),
(274, 7),
(277, 7),
(278, 7),
(279, 7),
(282, 7),
(283, 6),
(284, 7),
(287, 7),
(288, 7),
(289, 7),
(291, 7),
(294, 7),
(295, 7),
(296, 7),
(297, 7),
(298, 7),
(299, 7),
(300, 7),
(301, 7),
(302, 7),
(303, 7),
(304, 7),
(305, 7),
(306, 7),
(307, 7),
(308, 7),
(309, 7),
(310, 7),
(311, 7),
(312, 7),
(313, 7),
(314, 7),
(315, 7),
(316, 7),
(317, 7),
(318, 7),
(319, 7),
(320, 7),
(322, 7),
(323, 7),
(324, 7),
(327, 7),
(328, 7),
(329, 7),
(330, 7),
(331, 7),
(332, 7),
(333, 7),
(334, 7),
(335, 7),
(336, 7),
(337, 7),
(338, 7),
(339, 6),
(349, 6),
(350, 7),
(351, 7),
(352, 7),
(353, 7),
(354, 7),
(355, 6),
(356, 7),
(357, 7),
(358, 6),
(359, 6),
(360, 6),
(361, 7),
(362, 7),
(363, 7),
(365, 7),
(367, 7),
(368, 7),
(369, 5),
(370, 6),
(371, 7),
(373, 5),
(374, 5),
(375, 7),
(376, 5),
(377, 6),
(378, 7),
(379, 7),
(380, 7),
(382, 7),
(383, 7),
(384, 7),
(385, 7),
(386, 7),
(387, 7),
(388, 7),
(389, 7),
(390, 7),
(391, 7),
(392, 7),
(393, 7),
(397, 7),
(399, 7),
(400, 7),
(403, 7),
(404, 7),
(405, 7),
(406, 7),
(407, 7),
(408, 5),
(409, 7),
(410, 7),
(411, 7),
(412, 7),
(413, 7),
(414, 7),
(418, 7),
(419, 7),
(420, 7),
(421, 7),
(423, 6),
(424, 7),
(425, 7),
(426, 7),
(427, 7),
(428, 7),
(429, 7),
(430, 7),
(432, 5),
(433, 7),
(434, 7),
(435, 7),
(436, 7),
(437, 7),
(442, 7),
(443, 7),
(445, 7),
(446, 7),
(447, 7),
(448, 7),
(449, 7),
(450, 7),
(451, 7),
(452, 7),
(453, 7),
(454, 7),
(455, 7),
(457, 7),
(458, 7),
(459, 7),
(460, 7),
(461, 7),
(466, 7),
(467, 7),
(468, 7),
(469, 7),
(470, 4),
(471, 4),
(472, 4),
(473, 4),
(474, 6),
(475, 6),
(477, 6),
(479, 7),
(480, 6),
(481, 7),
(482, 7),
(485, 7),
(486, 7),
(487, 7),
(488, 7),
(494, 7),
(495, 6),
(496, 7),
(497, 7),
(498, 7),
(499, 7),
(500, 7),
(501, 7),
(502, 7),
(503, 7),
(504, 7),
(505, 7),
(506, 7),
(507, 7),
(508, 7),
(509, 7),
(514, 7),
(515, 7),
(516, 7),
(517, 7),
(518, 7),
(519, 7),
(520, 7),
(521, 7),
(522, 6),
(523, 7),
(524, 7),
(525, 7),
(526, 7),
(527, 7),
(528, 7),
(529, 7),
(530, 7),
(531, 7),
(532, 7),
(533, 7),
(537, 7),
(538, 7),
(539, 7),
(540, 7),
(541, 7),
(542, 7),
(545, 7),
(546, 7),
(547, 7),
(548, 7),
(549, 7),
(550, 7),
(554, 7),
(555, 7),
(556, 7),
(557, 7),
(558, 7),
(559, 7),
(560, 7),
(561, 7),
(562, 7),
(563, 7),
(564, 7),
(565, 5),
(572, 7),
(573, 7),
(583, 7),
(584, 7),
(585, 7),
(586, 7),
(587, 7),
(588, 7),
(589, 7),
(590, 7),
(591, 7),
(592, 7),
(593, 7),
(594, 7),
(595, 6),
(596, 7),
(604, 7),
(605, 7),
(606, 7),
(607, 7);

-- --------------------------------------------------------

--
-- Table structure for table `migration_version`
--

CREATE TABLE `migration_version` (
  `version` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration_version`
--

INSERT INTO `migration_version` (`version`) VALUES
(4);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) NOT NULL,
  `invoice_id` bigint(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(53,15) DEFAULT NULL,
  `notes` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `invoice_id`, `date`, `amount`, `notes`) VALUES
(1, 1, '2017-07-12', '3036.900000000000000', ''),
(2, 17, '2017-07-12', '6900.000000000000000', ''),
(3, 13, '2017-07-12', '4025.000000000000000', ''),
(4, 25, '2017-07-12', '27985.250000000000000', ''),
(5, 11, '2017-07-12', '1012.300000000000000', ''),
(6, 8, '2017-07-12', '5315.900000000000000', ''),
(7, 14, '2017-07-12', '8625.000000000000000', ''),
(8, 15, '2017-07-12', '658.950000000000000', ''),
(9, 16, '2017-07-12', '2484.000000000000000', ''),
(10, 5, '2017-07-12', '2014.000000000000000', ''),
(11, 19, '2017-07-12', '3450.000000000000000', ''),
(12, 6, '2017-07-12', '7891.700000000000000', ''),
(13, 18, '2017-07-12', '839.500000000000000', ''),
(14, 7, '2017-07-12', '5565.000000000000000', ''),
(15, 21, '2017-07-18', '57500.000000000000000', 'By Chaque no.005813 50000Rs 5000 TDS'),
(16, 20, '2017-07-24', '13768.000000000000000', ''),
(17, 48, '2017-08-01', '1770.000000000000000', ''),
(18, 47, '2017-08-01', '1770.000000000000000', ''),
(19, 52, '2017-08-28', '3224.940000000000000', ''),
(20, 43, '2017-08-30', '4720.000000000000000', ''),
(21, 39, '2017-08-30', '1069.600000000000000', ''),
(22, 38, '2017-08-30', '743.400000000000000', ''),
(23, 59, '2017-09-07', '3433.800000000000000', ''),
(24, 50, '2017-09-07', '17137.200000000000000', ''),
(25, 65, '2017-09-07', '13440.000000000000000', ''),
(26, 12, '2017-09-07', '12084.000000000000000', ''),
(27, 2, '2017-09-07', '4330.000000000000000', ''),
(28, 4, '2017-09-07', '954.000000000000000', ''),
(29, 69, '2017-09-20', '9440.000000000000000', ''),
(30, 84, '2017-09-20', '2997.200000000000000', ''),
(31, 85, '2017-09-20', '784.000000000000000', ''),
(32, 96, '2017-10-07', '2230.200000000000000', ''),
(33, 94, '2017-10-07', '3540.000000000000000', ''),
(34, 92, '2017-10-07', '9976.900000000000000', ''),
(35, 10, '2017-10-24', '233.200000000000000', ''),
(36, 105, '2017-10-24', '9528.500000000000000', ''),
(37, 22, '2017-10-24', '6267.500000000000000', ''),
(38, 24, '2017-10-24', '1150.000000000000000', ''),
(39, 23, '2017-10-24', '7820.800000000000000', ''),
(40, 104, '2017-10-24', '28723.560000000000000', ''),
(41, 100, '2017-10-30', '1711.000000000000000', ''),
(42, 99, '2017-10-30', '280.000000000000000', ''),
(43, 95, '2017-10-30', '14750.000000000000000', ''),
(44, 97, '2017-10-30', '15045.000000000000000', ''),
(45, 90, '2017-10-30', '1069.600000000000000', ''),
(46, 91, '2017-10-30', '10958.660000000000000', ''),
(47, 125, '2017-11-11', '18557.200000000000000', ''),
(48, 112, '2017-11-11', '17700.000000000000000', ''),
(49, 87, '2017-11-24', '3564.670000000000000', ''),
(50, 109, '2017-11-24', '70800.000000000000000', ''),
(51, 126, '2017-11-24', '1062.000000000000000', ''),
(52, 117, '2017-12-06', '17629.000000000000000', ''),
(53, 133, '2017-12-06', '4248.000000000000000', ''),
(54, 142, '2017-12-18', '840.000000000000000', ''),
(55, 146, '2017-12-30', '17700.000000000000000', ''),
(56, 141, '2017-12-30', '3410.200000000000000', ''),
(57, 151, '2018-01-01', '2650.900000000000000', ''),
(58, 152, '2018-01-02', '2997.200000000000000', ''),
(59, 149, '2018-01-02', '13650.000000000000000', ''),
(60, 150, '2018-01-02', '7080.000000000000000', ''),
(61, 72, '2018-01-02', '1008.000000000000000', ''),
(62, 29, '2018-01-02', '3923.500000000000000', ''),
(63, 156, '2018-01-09', '4586.660000000000000', ''),
(64, 166, '2018-01-17', '3799.600000000000000', ''),
(65, 173, '2018-02-02', '20475.000000000000000', ''),
(66, 174, '2018-02-02', '9758.600000000000000', ''),
(67, 71, '2018-02-03', '849.600000000000000', ''),
(68, 185, '2018-02-13', '1443.140000000000000', ''),
(69, 181, '2018-02-13', '8555.000000000000000', ''),
(70, 204, '2018-03-08', '3420.820000000000000', ''),
(71, 184, '2018-03-15', '21641.200000000000000', ''),
(72, 183, '2018-03-15', '6840.000000000000000', ''),
(73, 170, '2018-03-15', '1064.000000000000000', ''),
(74, 162, '2018-03-15', '10620.000000000000000', ''),
(75, 160, '2018-03-15', '3280.400000000000000', ''),
(76, 138, '2018-03-15', '3728.800000000000000', ''),
(77, 226, '2018-04-04', '66215.700000000000000', ''),
(78, 219, '2018-04-04', '20100.000000000000000', ''),
(79, 208, '2018-04-04', '1911.600000000000000', ''),
(80, 188, '2018-04-04', NULL, ''),
(81, 172, '2018-04-04', '5197.200000000000000', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `description` longtext,
  `price` decimal(53,15) NOT NULL DEFAULT '0.000000000000000',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `reference`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'ID Card', 'PVC', '45.000000000000000', '2017-07-13 06:44:42', '2017-07-13 06:44:42'),
(4, 'WS112', 'Visiting card', '1000.000000000000000', '2017-08-23 04:53:24', '2017-08-23 04:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `keey` varchar(50) NOT NULL DEFAULT '',
  `value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`keey`, `value`) VALUES
('company_address', '\"3,Vishnu Complex, Parvati. Pune - 30.\"'),
('company_email', '\"admin@e-bc.in\"'),
('company_fax', '\"\"'),
('company_logo', '\"d2bb7f8fad89f98a45efcf1b5b5f03719787243f.png\"'),
('company_name', '\"E Business Canvas (EBC)\"'),
('company_phone', '\"8308405200\\/2700\"'),
('company_url', '\"www.e-bc.in\"'),
('currency', '\"INR\"'),
('currency_decimals', '2'),
('last_calculation_date', '\"2019-04-29\"'),
('legal_terms', '\"1. Please pay 75% in advance and 25% after the delivery.\\r\\n2. Cheque and DD\\u2019s to be drawn on \\u2018E Business Canvas\\u2019\\u00a0\\r\\n3. Subject to Pune Jurisdiction\\r\\n\\r\\nThank you for your business\\r\\n\"'),
('pdf_orientation', '\"0\"'),
('pdf_size', '\"a4\"'),
('siwapp_modules', '[\"customers\",\"estimates\",\"products\"]');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `first_number` int(11) DEFAULT '1',
  `enabled` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `name`, `value`, `first_number`, `enabled`) VALUES
(1, 'Printing', 'AP/', 4, 1),
(2, 'Web & S/w Services', 'WS/', 2, 1),
(3, 'Exam', 'EX/', 1, 1),
(4, 'LED', 'LED', 1, 1),
(5, 'Web Services', 'WS', 76, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_group`
--

CREATE TABLE `sf_guard_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_group_permission`
--

CREATE TABLE `sf_guard_group_permission` (
  `group_id` int(11) NOT NULL DEFAULT '0',
  `permission_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_permission`
--

CREATE TABLE `sf_guard_permission` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_remember_key`
--

CREATE TABLE `sf_guard_remember_key` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user`
--

CREATE TABLE `sf_guard_user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'sha1', '99a60aecb962d07b4085ca03a4e1bba0', '30228d5048999c02d87511fe624ee8a9a901c962', 1, 1, '2019-04-10 05:39:52', '2017-07-11 10:42:48', '2019-04-10 05:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_group`
--

CREATE TABLE `sf_guard_user_group` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_permission`
--

CREATE TABLE `sf_guard_user_permission` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `permission_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_profile`
--

CREATE TABLE `sf_guard_user_profile` (
  `id` bigint(20) NOT NULL,
  `sf_guard_user_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nb_display_results` smallint(6) DEFAULT NULL,
  `language` varchar(3) DEFAULT NULL,
  `country` varchar(2) DEFAULT NULL,
  `search_filter` varchar(30) DEFAULT NULL,
  `series` varchar(50) DEFAULT NULL,
  `hash` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sf_guard_user_profile`
--

INSERT INTO `sf_guard_user_profile` (`id`, `sf_guard_user_id`, `first_name`, `last_name`, `email`, `nb_display_results`, `language`, `country`, `search_filter`, `series`, `hash`) VALUES
(1, 1, NULL, NULL, 'admin@e-bc.in', NULL, 'en', '', 'last_month', NULL, '75f3a4c77ccb33444ca6639071b965b3');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `is_triple` tinyint(1) DEFAULT NULL,
  `triple_namespace` varchar(100) DEFAULT NULL,
  `triple_key` varchar(100) DEFAULT NULL,
  `triple_value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tagging`
--

CREATE TABLE `tagging` (
  `id` bigint(20) NOT NULL,
  `tag_id` bigint(20) NOT NULL,
  `taggable_model` varchar(30) DEFAULT NULL,
  `taggable_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `value` decimal(53,2) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `is_default` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `name`, `value`, `active`, `is_default`) VALUES
(1, 'M Vat', '6.00', 1, 0),
(2, 'Vat', '13.50', 1, 0),
(4, 'Service tax', '15.00', 1, 0),
(5, 'GST 5%', '5.00', 1, 0),
(6, 'GST 12%', '12.00', 1, 0),
(7, 'GST 18%', '18.00', 1, 0),
(8, 'GST 28%', '28.00', 1, 0),
(9, 'SGST 6%', '6.00', 1, 0),
(10, 'CGST 6%', '6.00', 1, 0),
(11, 'SGST 9%', '9.00', 1, 0),
(12, 'CGST 9%', '9.00', 1, 0),
(13, 'SGST 14%', '14.00', 1, 0),
(14, 'CGST 14%', '14.00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `template` longtext,
  `models` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `name`, `template`, `models`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Invoice Template', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\r\n<html lang=\"{{lang}}\" xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n  <title>Invoice</title>\r\n\r\n  <style type=\"text/css\">\r\n    /* Custom CSS code */\r\n    table {border-spacing:0; border-collapse: collapse;}\r\n    ul {list-style-type: none; padding-left:0;}\r\n    body, input, textarea { font-family:helvetica,sans-serif; font-size:8pt; }\r\n    body { color:#464648; margin:2cm 1.5cm; }\r\n    h2   { color:#535255; font-size:16pt; font-weight:normal; line-height:1.2em; border-bottom:1px solid #DB4823; margin-right:220px }\r\n    h3   { color:#9A9A9A; font-size:13pt; font-weight:normal; margin-bottom: 0em}\r\n\r\n    table th.right,\r\n    table td.right              { text-align:right; }\r\n\r\n    .customer-data              { padding:1em 0; }\r\n    .customer-data table        { width:100%;       }\r\n    .customer-data table td     { width:50%;        }\r\n    .customer-data td span      { display:block; margin:0 0 5pt; padding-bottom:2pt; border-bottom:1px solid #DCDCDC; }\r\n    .customer-data td span.left { margin-right:1em; }\r\n    .customer-data label        { display:block; font-weight:bold; font-size:8pt; }\r\n    .payment-data               { padding:1em 0;    }\r\n    .payment-data table         { width:100%;       }\r\n    .payment-data th,\r\n    .payment-data td            { line-height:1em; padding:5pt 8pt 5pt; border:1px solid #DCDCDC; }\r\n    .payment-data thead th      { background:#FAFAFA; }\r\n    .payment-data th            { font-weight:bold; white-space:nowrap; }\r\n    .payment-data .bottomleft   { border-color:white; border-top:inherit; border-right:inherit; }\r\n    .payment-data span.tax      { display:block; white-space:nowrap; }\r\n    .terms, .notes              { padding:9pt 0 0; font-size:7pt; line-height:9pt; }\r\n\r\n    .section                    { margin-bottom: 1em; }\r\n    .logo                       { text-align: right; }\r\n  </style>\r\n\r\n  <style type=\"text/css\">\r\n    /* CSS code for printing */\r\n    @media print {\r\n      body           { margin:auto; }\r\n      .section       { page-break-inside:avoid; }\r\n      div#sfWebDebug { display:none; }\r\n    }\r\n  </style>\r\n</head>\r\n<body>\r\n\r\n  {% if settings.company_logo %}\r\n    <div class=\"logo\">\r\n      <img src=\"{{ settings.company_logo }}\" alt=\"{{ settings.company_name }}\" />\r\n    </div>\r\n  {% endif %}\r\n    \r\n  <div class=\"h2\">\r\n    <h2>Invoice #{{invoice}}</h2>\r\n  </div>\r\n\r\n  <div class=\"section\">\r\n    <div class=\"company-data\">\r\n      <ul>\r\n        <li>Company: {{settings.company_name}}</li>\r\n        <li>Address: {{settings.company_address|format}}</li>\r\n        <li>Phone: {{settings.company_phone}}</li>\r\n        <li>Fax: {{settings.company_fax}}</li>\r\n        <li>Email: {{settings.company_email}}</li>\r\n        <li>Web: {{settings.company_url}}</li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n\r\n  <div class=\"section\">\r\n    <h3>Client info</h3>\r\n\r\n    <div class=\"customer-data\">\r\n      <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">\r\n        <tr>\r\n          <td>\r\n            <span class=\"left\">\r\n              <label>Customer:</label>\r\n              {{invoice.customer_name}}\r\n            </span>\r\n          </td>\r\n          <td>\r\n            <span class=\"right\">\r\n              <label>Customer identification:</label>\r\n              {{invoice.customer_identification}}\r\n            </span>\r\n          </td>\r\n        </tr>\r\n        <tr>\r\n          <td>\r\n            <span class=\"left\">\r\n              <label>Contact person:</label>\r\n              {{invoice.contact_person}}\r\n            </span>\r\n          </td>\r\n          <td>\r\n            <span class=\"right\">\r\n              <label>Email:</label>\r\n              {{invoice.customer_email}}\r\n            </span>\r\n          </td>\r\n        </tr>\r\n        <tr>\r\n          <td>\r\n            <span class=\"left\">\r\n              <label>Invoicing address:</label>\r\n              {{invoice.invoicing_address|format}}\r\n            </span>\r\n          </td>\r\n          <td>\r\n            <span class=\"right\">\r\n              <label>Shipping address:</label>\r\n              {{invoice.shipping_address|format}}\r\n            </span>\r\n          </td>\r\n        </tr>\r\n      </table>\r\n    </div>\r\n  </div>\r\n\r\n  <div class=\"section\">\r\n    <h3>Payment details</h3>\r\n\r\n    <div class=\"payment-data\">\r\n      <table>\r\n        <thead>\r\n          <tr>\r\n            <th>Description</th>\r\n            <th class=\"right\">Unit Cost</th>\r\n            <th class=\"right\">Qty</th>\r\n            <th class=\"right\">Taxes</th>\r\n            {# show discounts only if there is some discount #}\r\n            {% if invoice.discount_amount %}\r\n            <th class=\"right\">Discount</th>\r\n            {% endif %}\r\n            <th class=\"right\">Price</th>\r\n          </tr>\r\n        </thead>\r\n        <tbody>\r\n          {% for item in invoice.Items %}\r\n            <tr>\r\n              <td>\r\n                {{item.description}}\r\n              </td>\r\n              <td class=\"right\">{{item.unitary_cost|currency}}</td>\r\n              <td class=\"right\">{{item.quantity}}</td>\r\n              <td class=\"right\">\r\n                {% for tax in item.Taxes %}\r\n                  <span class=\"tax\">{{tax.name}}</span>\r\n                {% endfor %}\r\n              </td>\r\n              {% if invoice.discount_amount %}\r\n              <td class=\"right\">{{item.discount_amount|currency}}</td>\r\n              {% endif %}\r\n              <td class=\"right\">{{item.gross_amount|currency}}</td>\r\n            </tr>\r\n          {% endfor %}\r\n        </tbody>\r\n        <tfoot>\r\n          <tr>\r\n            <td class=\"bottomleft\" colspan=\"{% if invoice.discount_amount %}4{% else %}3{% endif %}\"></td>\r\n            <th class=\"right\">Base</th>\r\n            <td class=\"right\">{{invoice.base_amount|currency}}</td>\r\n          </tr>\r\n          {% if invoice.discount_amount %}\r\n          <tr>\r\n            <td class=\"bottomleft\" colspan=\"{% if invoice.discount_amount %}4{% else %}3{% endif %}\"></td>\r\n            <th class=\"right\">Discount</th>\r\n            <td class=\"td_global_discount right\">{{invoice.discount_amount|currency}}</td>\r\n          </tr>\r\n          {% endif %}\r\n          <tr>\r\n            <td class=\"bottomleft\" colspan=\"{% if invoice.discount_amount %}4{% else %}3{% endif %}\"></td>\r\n            <th class=\"right\">Subtotal</th>\r\n            <td class=\"td_subtotal right\">{{invoice.net_amount|currency}}</td>\r\n          </tr>\r\n          <tr>\r\n            <td class=\"bottomleft\" colspan=\"{% if invoice.discount_amount %}4{% else %}3{% endif %}\"></td>\r\n            <th class=\"right\">Taxes</th>\r\n            <td class=\"td_total_taxes right\">{{invoice.tax_amount|currency}}</td>\r\n          </tr>\r\n          <tr class=\"strong\">\r\n            <td class=\"bottomleft\" colspan=\"{% if invoice.discount_amount %}4{% else %}3{% endif %}\"></td>\r\n            <th class=\"right\">Total</th>\r\n            <td class=\"td_total right\">{{invoice.gross_amount|currency}}</td>\r\n          </tr>\r\n        </tfoot>\r\n      </table>\r\n    </div>\r\n  </div>\r\n  \r\n  <div class=\"section\">\r\n    <h3>Terms & conditions</h3>\r\n    <div class=\"terms\">\r\n      {{invoice.terms|format}}\r\n    </div>\r\n  </div>\r\n</body>\r\n</html>\r\n', '', '2017-07-11 10:42:48', '2017-07-11 11:53:50', 'invoice-template'),
(2, 'Template with product', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\n<html lang=\"{{lang}}\" xmlns=\"http://www.w3.org/1999/xhtml\">\n<head>\n <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n <title>Invoice</title>\n\n <style type=\"text/css\">\n   /* Custom CSS code */\n   table {border-spacing:0; border-collapse: collapse;}\n   ul {list-style-type: none; padding-left:0;}\n   body, input, textarea { font-family:helvetica,sans-serif; font-size:8pt; }\n   body { color:#464648; margin:2cm 1.5cm; }\n   h2   { color:#535255; font-size:16pt; font-weight:normal; line-height:1.2em; border-bottom:1px solid #DB4823; margin-right:220px }\n   h3   { color:#9A9A9A; font-size:13pt; font-weight:normal; margin-bottom: 0em}\n\n   table th.right,\n   table td.right              { text-align:right; }\n\n   .customer-data              { padding:1em 0; }\n   .customer-data table        { width:100%;       }\n   .customer-data table td     { width:50%;        }\n   .customer-data td span      { display:block; margin:0 0 5pt; padding-bottom:2pt; border-bottom:1px solid #DCDCDC; }\n   .customer-data td span.left { margin-right:1em; }\n   .customer-data label        { display:block; font-weight:bold; font-size:8pt; }\n   .payment-data               { padding:1em 0;    }\n   .payment-data table         { width:100%;       }\n   .payment-data th,\n   .payment-data td            { line-height:1em; padding:5pt 8pt 5pt; border:1px solid #DCDCDC; }\n   .payment-data thead th      { background:#FAFAFA; }\n   .payment-data th            { font-weight:bold; white-space:nowrap; }\n   .payment-data .bottomleft   { border-color:white; border-top:inherit; border-right:inherit; }\n   .payment-data span.tax      { display:block; white-space:nowrap; }\n   .terms, .notes              { padding:9pt 0 0; font-size:7pt; line-height:9pt; }\n\n   .section                    { margin-bottom: 1em; }\n   .logo                       { text-align: right; }\n </style>\n\n <style type=\"text/css\">\n   /* CSS code for printing */\n   @media print {\n     body           { margin:auto; }\n     .section       { page-break-inside:avoid; }\n     div#sfWebDebug { display:none; }\n   }\n </style>\n</head>\n<body>\n\n {% if settings.company_logo %}\n   <div class=\"logo\">\n     <img src=\"{{ settings.company_logo }}\" alt=\"{{ settings.company_name }}\" />\n   </div>\n {% endif %}\n\n <div class=\"h2\">\n   <h2>Invoice #{{invoice.number}}</h2>\n </div>\n\n <div class=\"section\">\n   <div class=\"company-data\">\n     <ul>\n       <li>Company: {{settings.company_name}}</li>\n       <li>Address: {{settings.company_address|format}}</li>\n       <li>Phone: {{settings.company_phone}}</li>\n       <li>Fax: {{settings.company_fax}}</li>\n       <li>Email: {{settings.company_email}}</li>\n       <li>Web: {{settings.company_url}}</li>\n     </ul>\n   </div>\n </div>\n\n <div class=\"section\">\n   <h3>Client info</h3>\n\n   <div class=\"customer-data\">\n     <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">\n       <tr>\n         <td>\n           <span class=\"left\">\n             <label>Customer:</label>\n             {{invoice.customer_name}}\n           </span>\n         </td>\n         <td>\n           <span class=\"right\">\n             <label>Customer identification:</label>\n             {{invoice.customer_identification}}\n           </span>\n         </td>\n       </tr>\n       <tr>\n         <td>\n           <span class=\"left\">\n             <label>Contact person:</label>\n             {{invoice.contact_person}}\n           </span>\n         </td>\n         <td>\n           <span class=\"right\">\n             <label>Email:</label>\n             {{invoice.customer_email}}\n           </span>\n         </td>\n       </tr>\n       <tr>\n         <td>\n           <span class=\"left\">\n             <label>Invoicing address:</label>\n             {{invoice.invoicing_address|format}}\n           </span>\n         </td>\n         <td>\n           <span class=\"right\">\n             <label>Shipping address:</label>\n             {{invoice.shipping_address|format}}\n           </span>\n         </td>\n       </tr>\n     </table>\n   </div>\n </div>\n\n <div class=\"section\">\n   <h3>Payment details</h3>\n\n   <div class=\"payment-data\">\n     <table>\n       <thead>\n         <tr>\n           <th>Reference</th>\n           <th>Description</th>\n           <th class=\"right\">Unit Cost</th>\n           <th class=\"right\">Qty</th>\n           <th class=\"right\">TVA</th>\n           {# show discounts only if there is some discount #}\n           {% if invoice.discount_amount %}\n           <th class=\"right\">Discount</th>\n           {% endif %}\n           <th class=\"right\">Price</th>\n         </tr>\n       </thead>\n       <tbody>\n         {% for item in invoice.Items %}\n           <tr>\n             <td>\n               {{item.product_id|product_reference}}\n             </td>\n             <td>\n               {{item.description}}\n             </td>\n             <td class=\"right\">{{item.unitary_cost|currency}}</td>\n             <td class=\"right\">{{item.quantity}}</td>\n             <td class=\"right\">\n               {% for tax in item.Taxes %}\n                 <span class=\"tax\">{{tax.name}}</span>\n               {% endfor %}\n             </td>\n             {% if invoice.discount_amount %}\n             <td class=\"right\">{{item.discount|currency}}</td>\n             {% endif %}\n             <td class=\"right\">{{item.gross|currency}}</td>\n           </tr>\n         {% endfor %}\n       </tbody>\n       <tfoot>\n         <tr>\n           <td class=\"bottomleft\" colspan=\"{% if invoice.discount_amount %}5{% else %}4{% endif %}\"></td>\n           <th class=\"right\">Base</th>\n           <td class=\"right\">{{invoice.base_amount|currency}}</td>\n         </tr>\n         {% if invoice.discount_amount %}\n         <tr>\n           <td class=\"bottomleft\" colspan=\"{% if invoice.discount_amount %}5{% else %}4{% endif %}\"></td>\n           <th class=\"right\">Discount</th>\n           <td class=\"td_global_discount right\">{{invoice.discount_amount|currency}}</td>\n         </tr>\n         {% endif %}\n         <tr>\n           <td class=\"bottomleft\" colspan=\"{% if invoice.discount_amount %}5{% else %}4{% endif %}\"></td>\n           <th class=\"right\">Subtotal</th>\n           <td class=\"td_subtotal right\">{{invoice.net_amount|currency}}</td>\n         </tr>\n         <tr>\n           <td class=\"bottomleft\" colspan=\"{% if invoice.discount_amount %}5{% else %}4{% endif %}\"></td>\n           <th class=\"right\">Taxes</th>\n           <td class=\"td_total_taxes right\">{{invoice.tax_amount|currency}}</td>\n         </tr>\n         <tr class=\"strong\">\n           <td class=\"bottomleft\" colspan=\"{% if invoice.discount_amount %}5{% else %}4{% endif %}\"></td>\n           <th class=\"right\">Total</th>\n           <td class=\"td_total right\">{{invoice.gross_amount|currency}}</td>\n         </tr>\n       </tfoot>\n     </table>\n   </div>\n </div>\n\n <div class=\"section\">\n   <h3>Terms & conditions</h3>\n   <div class=\"terms\">\n     {{invoice.terms|format}}\n   </div>\n </div>\n</body>\n</html>\n', '', '2017-07-11 10:42:48', '2017-07-11 11:53:50', 'template-with-product'),
(3, 'Estimate Template', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\r\n<html lang=\"{{lang}}\" xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n  <title>Estimate</title>\r\n\r\n  <style type=\"text/css\">\r\n    /* Custom CSS code */\r\n    table {border-spacing:0; border-collapse: collapse;}\r\n    ul {list-style-type: none; padding-left:0;}\r\n    body, input, textarea { font-family:helvetica,sans-serif; font-size:8pt; }\r\n    body { color:#464648; margin:0.5cm 0.5cm; }\r\n    h2   { color:#535255; font-size:16pt; font-weight:normal; line-height:1.2em; border-bottom:1px solid #DB4823; margin-right:220px }\r\n    h3   { color:#9A9A9A; font-size:13pt; font-weight:normal; margin-bottom: 0em}\r\n\r\n    table th.right,\r\n    table td.right              { text-align:right; }\r\n\r\n    .customer-data              { padding:0.5em 0; }\r\n    .customer-data table        { width:100%;       }\r\n    .customer-data table td     { width:50%;        }\r\n    .customer-data td span      { display:block; margin:0 0 5pt; padding-bottom:2pt; border-bottom:1px solid #DCDCDC; }\r\n    .customer-data td span.left { margin-right:1em; }\r\n    .customer-data label        { display:block; font-weight:bold; font-size:8pt; }\r\n    .payment-data               { padding:1em 0;    }\r\n    .payment-data table         { width:100%;       }\r\n    .payment-data th,\r\n    .payment-data td            { line-height:1em; padding:5pt 8pt 5pt; border:1px solid #DCDCDC; }\r\n    .payment-data thead th      { background:#FAFAFA; }\r\n    .payment-data th            { font-weight:bold; white-space:nowrap; }\r\n    .payment-data .bottomleft   { border-color:white; border-top:inherit; border-right:inherit; }\r\n    .payment-data span.tax      { display:block; white-space:nowrap; }\r\n    .terms, .notes              { padding:9pt 0 0; font-size:7pt; line-height:9pt; }\r\n\r\n    .section                    { margin-bottom: 0.5em; }\r\n    .logo                       { text-align: right; }\r\n  </style>\r\n\r\n  <style type=\"text/css\">\r\n    /* CSS code for printing */\r\n    @media print {\r\n      body           { margin:auto; }\r\n      .section       { page-break-inside:avoid; }\r\n      div#sfWebDebug { display:none; }\r\n    }\r\n  </style>\r\n</head>\r\n<body>\r\n\r\n  {% if settings.company_logo %}\r\n    <div class=\"logo\">\r\n      <img src=\"{{ settings.company_logo }}\" alt=\"{{ settings.company_name }}\" />\r\n    </div>\r\n  {% endif %}\r\n\r\n  <div class=\"h2\">\r\n    <h2>Estimate #{{estimate}}</h2>\r\n  </div>\r\n\r\n  <div class=\"section\">\r\n    <h3>Client info</h3>\r\n\r\n    <div class=\"customer-data\">\r\n      <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">\r\n        <tr>\r\n          <td>\r\n            <span class=\"left\">\r\n              <label>Customer:</label>\r\n              {{estimate.customer_name}}\r\n            </span>\r\n          </td>\r\n          <td>\r\n            <span class=\"right\">\r\n              <label>Customer identification:</label>\r\n              {{estimate.customer_identification}}\r\n            </span>\r\n          </td>\r\n        </tr>\r\n        <tr>\r\n          <td>\r\n            <span class=\"left\">\r\n              <label>Contact person:</label>\r\n              {{estimate.contact_person}}\r\n            </span>\r\n          </td>\r\n          <td>\r\n            <span class=\"right\">\r\n              <label>Email:</label>\r\n              {{estimate.customer_email}}\r\n            </span>\r\n          </td>\r\n        </tr>\r\n        <tr>\r\n          <td>\r\n            <span class=\"left\">\r\n              <label>Invoicing address:</label>\r\n              {{estimate.invoicing_address|format}}\r\n            </span>\r\n          </td>\r\n          <td>\r\n            <span class=\"right\">\r\n              <label>Shipping address:</label>\r\n              {{estimate.shipping_address|format}}\r\n            </span>\r\n          </td>\r\n        </tr>\r\n      </table>\r\n    </div>\r\n  </div>\r\n\r\n  <div class=\"section\">\r\n    <h3>Payment details</h3>\r\n\r\n    <div class=\"payment-data\">\r\n      <table>\r\n        <thead>\r\n          <tr>\r\n            <th>Description</th>\r\n            <th class=\"right\">Unit Cost</th>\r\n            <th class=\"right\">Qty</th>\r\n            <th class=\"right\">Taxes</th>\r\n            \r\n            <th class=\"right\">Price</th>\r\n          </tr>\r\n        </thead>\r\n        <tbody>\r\n          {% for item in estimate.Items %}\r\n            <tr>\r\n              <td>\r\n                {{item.description}}\r\n              </td>\r\n              <td class=\"right\">{{item.unitary_cost|currency}}</td>\r\n              <td class=\"right\">{{item.quantity}}</td>\r\n              <td class=\"right\">\r\n                {% for tax in item.Taxes %}\r\n                  <span class=\"tax\">{{tax.name}}</span>\r\n                {% endfor %}\r\n              </td>\r\n              \r\n              <td class=\"right\">{{item.gross_amount|currency}}</td>\r\n            </tr>\r\n          {% endfor %}\r\n        </tbody>\r\n        <tfoot>\r\n          <tr>\r\n            <td class=\"bottomleft\" colspan=\"{% if estimate.discount_amount %}3{% else %}3{% endif %}\"></td>\r\n            <th class=\"right\">Base</th>\r\n            <td class=\"right\">{{estimate.base_amount|currency}}</td>\r\n          </tr>\r\n          \r\n          <tr>\r\n            <td class=\"bottomleft\" colspan=\"{% if estimate.discount_amount %}3{% else %}3{% endif %}\"></td>\r\n            <th class=\"right\">Subtotal</th>\r\n            <td class=\"td_subtotal right\">{{estimate.net_amount|currency}}</td>\r\n          </tr>\r\n          <tr>\r\n            <td class=\"bottomleft\" colspan=\"{% if estimate.discount_amount %}3{% else %}3{% endif %}\"></td>\r\n            <th class=\"right\">Taxes</th>\r\n            <td class=\"td_total_taxes right\">{{estimate.tax_amount|currency}}</td>\r\n          </tr>\r\n          <tr class=\"strong\">\r\n            <td class=\"bottomleft\" colspan=\"{% if estimate.discount_amount %}3{% else %}3{% endif %}\"></td>\r\n            <th class=\"right\">Total</th>\r\n            <td class=\"td_total right\">{{estimate.gross_amount|currency}}</td>\r\n          </tr>\r\n        </tfoot>\r\n      </table>\r\n    </div>\r\n  </div>\r\n\r\n  <div class=\"section\">\r\n    <h3>Terms & conditions</h3>\r\n    <div class=\"terms\">\r\n      {{estimate.terms|format}}\r\n    </div>\r\n  </div>\r\n</body>\r\n</html>\r\n', 'Estimate', '2017-07-11 10:42:48', '2017-09-28 07:58:51', 'estimate-template'),
(4, 'Proforma Invoice', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\r\n<html lang=\"{{lang}}\" xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n  <title>Invoice</title>\r\n\r\n  <style type=\"text/css\">\r\n    /* Custom CSS code */\r\n    table {border-spacing:0; border-collapse: collapse;}\r\n    ul {list-style-type: none; padding-left:0;}\r\n    body, input, textarea { font-family:helvetica,sans-serif; font-size:8pt; }\r\n    body { color:#464648; margin:0.5cm 0.5cm; }\r\n    h2   { color:#535255; font-size:16pt; font-weight:normal; line-height:0.5em; border-bottom:1px solid #DB4823; margin-right:220px }\r\n    h3   { color:#9A9A9A; font-size:13pt; font-weight:normal; margin-bottom: 0em}\r\n\r\n    table th.right,\r\n    table td.right              { text-align:right; }\r\n\r\n    .customer-data              { padding:0.5em 0; }\r\n    .customer-data table        { width:100%;       }\r\n    .customer-data table td     { width:50%;        }\r\n    .customer-data td span      { display:block; margin:0 0 5pt; padding-bottom:1.5pt; border-bottom:1px solid #DCDCDC; }\r\n    .customer-data td span.left { margin-right:1em; }\r\n    .customer-data label        { display:block; font-weight:bold; font-size:8pt; }\r\n    .payment-data               { padding:1em 0;    }\r\n    .payment-data table         { width:100%;       }\r\n    .payment-data th,\r\n    .payment-data td            { line-height:1em; padding:5pt 8pt 5pt; border:1px solid #DCDCDC; }\r\n    .payment-data thead th      { background:#FAFAFA; }\r\n    .payment-data th            { font-weight:bold; white-space:nowrap; }\r\n    .payment-data .bottomleft   { border-color:white; border-top:inherit; border-right:inherit; }\r\n    .payment-data span.tax      { display:block; white-space:nowrap; }\r\n    .terms, .notes              { padding:1pt 0 0; font-size:7pt; line-height:9pt; }\r\n\r\n    .section                    { margin-bottom: 0.5em; }\r\n    .logo                       { text-align: right; }\r\n  </style>\r\n\r\n  <style type=\"text/css\">\r\n    /* CSS code for printing */\r\n    @media print {\r\n      body           { margin:auto; }\r\n      .section       { page-break-inside:avoid; }\r\n      div#sfWebDebug { display:none; }\r\n    }\r\n  </style>\r\n</head>\r\n<body>\r\n\r\n<h3 align=\"right\">TAX INVOICE</h3>\r\n\r\n  {% if settings.company_logo %}\r\n    <div class=\"logo\" align=\"center\">\r\n      <img src=\"{{ settings.company_logo }}\" alt=\"{{ settings.company_name }}\" />\r\n    </div>\r\n  {% endif %}\r\n    \r\n  <div class=\"h2\">\r\n    <p align=\"center\">Phone: {{settings.company_phone}}|Email: {{settings.company_email}}|Web: {{settings.company_url}}</p><hr>\r\n  </div>\r\n\r\n  <div class=\"section\">\r\n  <h3>Client info</h3>\r\n    <div class=\"customer-data\">\r\n      <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">\r\n        <tr>\r\n          <td>\r\n            <span class=\"left\">\r\n              <label>Customer: {{invoice.customer_name}}</label>\r\n            </span>\r\n          </td>\r\n          <td>\r\n            <span class=\"right\">\r\n              <label>Invoice: #{{invoice}}</label>\r\n            </span>\r\n          </td>\r\n        </tr>\r\n        <tr>\r\n          <td>\r\n            <span class=\"left\">\r\n              <label>Contact person: {{invoice.contact_person}}</label>\r\n            </span>\r\n          </td>\r\n          <td>\r\n            <span class=\"right\">\r\n              <label>Date: {{invoice.issue_date}}</label>\r\n            </span>\r\n          </td>\r\n        </tr>\r\n        <tr>\r\n          <td>\r\n            <span class=\"left\">\r\n              <label>Invoicing address:</label>\r\n              {{invoice.invoicing_address|format}}\r\n            </span>\r\n          </td>\r\n          <td>\r\n            <span class=\"right\">\r\n              <label>Shipping address:</label>\r\n              {{invoice.shipping_address|format}}\r\n            </span>\r\n          </td>\r\n        </tr>\r\n      </table>\r\n    </div>\r\n  </div>\r\n\r\n  <div class=\"section\">\r\n    <h3>Payment details</h3>\r\n\r\n    <div class=\"payment-data\">\r\n      <table>\r\n        <thead>\r\n          <tr>\r\n            <th>Description</th>\r\n            <th class=\"right\">Unit Cost</th>\r\n            <th class=\"right\">Qty</th>\r\n\r\n            <th class=\"right\">Taxes</th>\r\n            {# show discounts only if there is some discount #}\r\n            {% if invoice.discount_amount %}\r\n            <th class=\"right\">Discount</th>\r\n            {% endif %}\r\n            <th class=\"right\">Price</th>\r\n          </tr>\r\n        </thead>\r\n        <tbody>\r\n          {% for item in invoice.Items %}\r\n            <tr>\r\n              <td>\r\n                {{item.description}}\r\n              </td>\r\n              <td class=\"right\">{{item.unitary_cost|currency}}</td>\r\n              <td class=\"right\">{{item.quantity}}</td>\r\n              <td class=\"right\">\r\n                {% for tax in item.Taxes %}\r\n                  <span class=\"tax\">{{tax.name}}</span>\r\n                {% endfor %}\r\n              </td>\r\n              {% if invoice.discount_amount %}\r\n              <td class=\"right\">{{item.discount_amount|currency}}</td>\r\n              {% endif %}\r\n              <td class=\"right\">{{item.gross_amount|currency}}</td>\r\n            </tr>\r\n          {% endfor %}\r\n        </tbody>\r\n        <tfoot>\r\n          <tr>\r\n            <td class=\"bottomleft\" colspan=\"{% if invoice.discount_amount %}4{% else %}3{% endif %}\"></td>\r\n            <th class=\"right\">Base</th>\r\n            <td class=\"right\">{{invoice.base_amount|currency}}</td>\r\n          </tr>\r\n          {% if invoice.discount_amount %}\r\n          <tr>\r\n            <td colspan=\"{% if invoice.discount_amount %}4{% else %}3{% endif %}\" rowspan=\"4\" class=\"bottomleft\">\r\n			<p style=\"font-size:18px\">GST NO::27CHJPS3320M1ZY\r\n</p>\r\n			<p style=\"font-size:6px\">\"I/We hereby certify that my/our registration certificate under the Maharashtra Value Added Tax Act. 2002 is in force on the date on which\r\nthe sale of the goods specified in this TAX INVOICE is made by me/us and that transaction of sale covered by this TAX INVOICE has been\r\neffected by me/us and it shall be accounted for in the turn over of sale while filling of return and the due tax if any, payable the sale has\r\nbeen paid or shall be paid.\"</p>\r\n</td>\r\n            <th class=\"right\">Discount</th>\r\n            <td class=\"td_global_discount right\">{{invoice.discount_amount|currency}}</td>\r\n          </tr>\r\n          {% endif %}\r\n          <tr>\r\n            <th class=\"right\">Subtotal</th>\r\n            <td class=\"td_subtotal right\">{{invoice.net_amount|currency}}</td>\r\n          </tr>\r\n          <tr>\r\n            <th class=\"right\">Taxes</th>\r\n            <td class=\"td_total_taxes right\">{{invoice.tax_amount|currency}}</td>\r\n          </tr>\r\n          <tr class=\"strong\">\r\n            <th class=\"right\">Total</th>\r\n            <td class=\"td_total right\">{{invoice.gross_amount|currency}}</td>\r\n          </tr>\r\n        </tfoot>\r\n      </table>\r\n    </div>\r\n  </div>\r\n  \r\n  <div class=\"section\">\r\n    <h3>Terms & conditions</h3>\r\n    <div class=\"terms\">\r\n      {{invoice.terms|format}}\r\n    </div>\r\n  </div>\r\n  \r\n  <div align=\"center\">\r\n     <hr><br>\r\n     {{settings.company_address}}\r\n  </div>\r\n</body>\r\n</html>\r\n', 'Invoice', '2017-07-11 11:53:22', '2018-07-06 12:44:18', 'proforma-invoice');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `common`
--
ALTER TABLE `common`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cstnm_idx` (`customer_name`),
  ADD KEY `cstid_idx` (`customer_identification`),
  ADD KEY `cstml_idx` (`customer_email`),
  ADD KEY `cntct_idx` (`contact_person`),
  ADD KEY `common_type_idx` (`type`),
  ADD KEY `customer_id_idx` (`customer_id`),
  ADD KEY `series_id_idx` (`series_id`),
  ADD KEY `recurring_invoice_id_idx` (`recurring_invoice_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cstm_idx` (`name`),
  ADD UNIQUE KEY `cstm_slug_idx` (`name_slug`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `desc_idx` (`description`(255)),
  ADD KEY `common_id_idx` (`common_id`),
  ADD KEY `product_id_idx` (`product_id`);

--
-- Indexes for table `item_tax`
--
ALTER TABLE `item_tax`
  ADD PRIMARY KEY (`item_id`,`tax_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id_idx` (`invoice_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`keey`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf_guard_group`
--
ALTER TABLE `sf_guard_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD PRIMARY KEY (`group_id`,`permission_id`),
  ADD KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`);

--
-- Indexes for table `sf_guard_permission`
--
ALTER TABLE `sf_guard_permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD PRIMARY KEY (`id`,`ip_address`),
  ADD KEY `user_id_idx` (`user_id`);

--
-- Indexes for table `sf_guard_user`
--
ALTER TABLE `sf_guard_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `is_active_idx_idx` (`is_active`);

--
-- Indexes for table `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD PRIMARY KEY (`user_id`,`group_id`),
  ADD KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`);

--
-- Indexes for table `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`);

--
-- Indexes for table `sf_guard_user_profile`
--
ALTER TABLE `sf_guard_user_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `sf_guard_user_id_idx` (`sf_guard_user_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_idx` (`name`),
  ADD KEY `triple1_idx` (`triple_namespace`),
  ADD KEY `triple2_idx` (`triple_key`),
  ADD KEY `triple3_idx` (`triple_value`);

--
-- Indexes for table `tagging`
--
ALTER TABLE `tagging`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_idx` (`tag_id`),
  ADD KEY `taggable_idx` (`taggable_model`,`taggable_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `template_sluggable_idx` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `common`
--
ALTER TABLE `common`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=608;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sf_guard_group`
--
ALTER TABLE `sf_guard_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sf_guard_permission`
--
ALTER TABLE `sf_guard_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sf_guard_user`
--
ALTER TABLE `sf_guard_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sf_guard_user_profile`
--
ALTER TABLE `sf_guard_user_profile`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tagging`
--
ALTER TABLE `tagging`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `common`
--
ALTER TABLE `common`
  ADD CONSTRAINT `common_customer_id_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `common_recurring_invoice_id_common_id` FOREIGN KEY (`recurring_invoice_id`) REFERENCES `common` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `common_series_id_series_id` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_common_id_common_id` FOREIGN KEY (`common_id`) REFERENCES `common` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_product_id_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `item_tax`
--
ALTER TABLE `item_tax`
  ADD CONSTRAINT `item_tax_item_id_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_invoice_id_common_id` FOREIGN KEY (`invoice_id`) REFERENCES `common` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_profile`
--
ALTER TABLE `sf_guard_user_profile`
  ADD CONSTRAINT `sf_guard_user_profile_sf_guard_user_id_sf_guard_user_id` FOREIGN KEY (`sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
