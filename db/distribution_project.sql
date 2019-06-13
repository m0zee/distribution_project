-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2019 at 03:18 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `distribution_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) UNSIGNED NOT NULL,
  `Company` int(100) NOT NULL,
  `Booker` int(100) NOT NULL,
  `Date` date NOT NULL,
  `Shop` int(100) NOT NULL,
  `company_discount` int(11) DEFAULT NULL,
  `Discount` int(100) NOT NULL,
  `Total_Amount` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `Company`, `Booker`, `Date`, `Shop`, `company_discount`, `Discount`, `Total_Amount`, `user_id`, `created_at`) VALUES
(4, 2, 1, '2019-05-29', 1, NULL, 2, 80, 2, '2019-05-29 17:02:18'),
(5, 2, 1, '2019-05-29', 1, NULL, 2, 42, 2, '2019-05-29 17:02:18'),
(6, 3, 1, '2019-06-12', 1, 0, 5, 166, 2, '2019-06-12 19:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `billing_detail`
--

CREATE TABLE `billing_detail` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_detail`
--

INSERT INTO `billing_detail` (`id`, `bill_id`, `product_id`, `qty`) VALUES
(2, 4, 1, 10),
(3, 4, 1, 15),
(4, 4, 1, 7),
(5, 5, 1, 6),
(6, 6, 2, 5),
(7, 6, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `booker`
--

CREATE TABLE `booker` (
  `id` int(11) UNSIGNED NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booker`
--

INSERT INTO `booker` (`id`, `Name`, `Code`, `Phone`, `user_id`, `created_at`) VALUES
(1, 'Testing Booket', '123', '32381208932', 2, '2019-05-28 20:24:11'),
(2, 'booker new 1', 'bn1', '1234', 2, '2019-06-11 22:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `cheques`
--

CREATE TABLE `cheques` (
  `id` int(11) UNSIGNED NOT NULL,
  `Party_Name` int(100) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Bill_NO` int(100) NOT NULL,
  `Cheq_Amount` int(100) NOT NULL,
  `Cheque_Date` date NOT NULL,
  `Party_Bank` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cheques`
--

INSERT INTO `cheques` (`id`, `Party_Name`, `Address`, `Bill_NO`, `Cheq_Amount`, `Cheque_Date`, `Party_Bank`, `user_id`, `created_at`) VALUES
(1, 1, 'test', 4, 30, '2019-06-11', 'test', 2, '2019-06-13 13:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Address` text,
  `Description` text,
  `slap` text NOT NULL,
  `Min_Slap` varchar(50) DEFAULT NULL,
  `Max_Slap` varchar(50) DEFAULT NULL,
  `Discount_Percentage` int(10) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `Name`, `Code`, `Address`, `Description`, `slap`, `Min_Slap`, `Max_Slap`, `Discount_Percentage`, `user_id`, `created_at`) VALUES
(1, 'Abc company', '123', 'karachi', 'asdf', '', '10', '50', 90, 2, '2019-05-12 19:47:47'),
(2, 'test', '123', 'testing', 'test', '{\"min\":[\"0\",\"2001\"],\"max\":[\"2000\",\"4000\"],\"dis\":[\"2\",\"4\"]}', NULL, NULL, NULL, 2, '2019-05-26 21:11:49'),
(3, 'New Test Company', 'ntc', 'karachi', 'wedfghjk', '{\"min\":[\"100\",\"201\",\"501\"],\"max\":[\"200\",\"500\",\"50000\"],\"dis\":[\"5\",\"10\",\"\"]}', NULL, NULL, NULL, 2, '2019-06-11 21:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `dsr_bills`
--

CREATE TABLE `dsr_bills` (
  `id` int(11) UNSIGNED NOT NULL,
  `Booker` int(100) NOT NULL,
  `Date` date NOT NULL,
  `Total_Amount` int(100) NOT NULL,
  `salesmen` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dsr_bills`
--

INSERT INTO `dsr_bills` (`id`, `Booker`, `Date`, `Total_Amount`, `salesmen`, `user_id`, `created_at`) VALUES
(2, 1, '2019-05-29', 122, 0, 2, '2019-05-29 17:14:26'),
(3, 1, '2019-06-12', 166, 1, 2, '2019-06-13 13:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `ledger_entries`
--

CREATE TABLE `ledger_entries` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `Company` int(100) NOT NULL,
  `Date` date NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `purchase_id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ledger_entries`
--

INSERT INTO `ledger_entries` (`id`, `name`, `Company`, `Date`, `Amount`, `Type`, `purchase_id`, `user_id`, `created_at`) VALUES
(3, 'Opening Balance ', 1, '2019-05-01', '5000', 'Debit', 0, 2, '2019-05-30 21:29:22'),
(5, 'Purchase', 1, '2019-05-30', '49.5', 'Debit', 23, 2, '2019-05-30 21:31:15'),
(6, 'Salary', 1, '2019-05-31', '2000', 'Credit', 0, 2, '2019-05-30 21:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `main_name` varchar(100) NOT NULL,
  `sort` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `main_name`, `sort`, `icon`, `url`, `user_id`) VALUES
(2, 'Dashboard', 'dashboard', 1, 'home', 'home', 4),
(3, 'Modules', 'modules', 4, 'home', 'modules', 4),
(5, 'Role/Permission', 'role', 2, 'home', 'role', 4),
(7, 'Users', 'user', 3, 'home', 'users', 2),
(19, 'Sales Men', 'salesmen', 4, 'home', 'salesmen', 2),
(20, 'Booker', 'booker', 5, 'home', 'booker', 2),
(21, 'Company', 'company', 6, 'home', 'company', 2),
(22, 'Product', 'product', 7, 'home', 'product', 2),
(23, 'Purchase', 'purchase', 5, 'home', 'purchase', 2),
(24, 'Shops', 'shops', 7, 'home', 'shops', 2),
(26, 'Billing', 'billing', 7, 'home', 'billing', 2),
(27, 'Dsr/Bills', 'dsr_bills', 7, 'home', 'dsr_bills', 2),
(28, 'Ledger Entries', 'ledger_entries', 7, 'home', 'ledger_entries', 2),
(29, 'Cheques', 'cheques', 7, 'home', 'cheques', 2),
(30, 'Ledger', 'ledger', 7, 'home', 'ledger', 2),
(31, 'Sales Men Entries', 'sales_men_entries', 7, 'home', 'sales_men_entries', 2),
(32, 'Salesmen Balance', 'salesmen_balance', 7, 'home', 'salesmen_balance', 2),
(33, 'Sales Return', 'salesreturn', 10, 'home', 'salesreturn', 2),
(34, 'Sign Bills', 'sign_bills', 7, 'home', 'sign_bills', 2),
(35, 'Recovery', 'recovery', 7, 'home', 'recovery', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules_fileds`
--

CREATE TABLE `modules_fileds` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `filed_type` varchar(100) NOT NULL,
  `options` varchar(255) NOT NULL,
  `length` int(11) NOT NULL,
  `required` int(11) NOT NULL DEFAULT '0',
  `module_id` int(11) NOT NULL,
  `is_relation` int(11) NOT NULL,
  `relation_column` varchar(100) DEFAULT NULL,
  `relation_table` varchar(100) DEFAULT NULL,
  `value_column` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules_fileds`
--

INSERT INTO `modules_fileds` (`id`, `name`, `type`, `filed_type`, `options`, `length`, `required`, `module_id`, `is_relation`, `relation_column`, `relation_table`, `value_column`) VALUES
(1, 'name', 'VARCHAR', 'input', '', 100, 1, 15, 0, NULL, NULL, NULL),
(2, 'gender', 'VARCHAR', 'radio', 'male,female', 100, 1, 15, 0, NULL, NULL, NULL),
(3, 'relationship_status', 'VARCHAR', 'select', 'single,married,divorced,widowed', 100, 1, 15, 0, NULL, NULL, NULL),
(4, 'image', 'VARCHAR', 'file', 'jpg,png,jpeg,gif', 100, 1, 15, 0, NULL, NULL, NULL),
(5, 'education', 'VARCHAR', 'checkbox', 'matric,inter,bachlor', 255, 1, 15, 0, NULL, NULL, NULL),
(6, 'message', 'TEXT', 'textarea', '', 255, 1, 15, 0, NULL, NULL, NULL),
(7, 'Name', 'VARCHAR', 'input', '', 100, 1, 16, 0, NULL, NULL, NULL),
(8, 'Icon', 'VARCHAR', 'file', 'png,jpg,jpeg,gif', 255, 1, 16, 0, NULL, NULL, NULL),
(9, 'Name', 'VARCHAR', 'input', '', 100, 1, 17, 0, NULL, NULL, NULL),
(10, 'Icon', 'VARCHAR', 'file', 'png,jpg,jpeg,gif', 255, 1, 17, 0, NULL, NULL, NULL),
(11, 'Title', 'VARCHAR', 'input', '', 255, 1, 18, 0, NULL, NULL, NULL),
(12, 'Description', 'TEXT', 'textarea', '', 500, 1, 18, 0, NULL, NULL, NULL),
(13, 'category', 'INT', 'input', '', 11, 1, 18, 1, 'id', 'blog_category', 'Name'),
(14, 'image', 'VARCHAR', 'file', 'png,jpg,jpeg,gif', 255, 1, 18, 0, NULL, NULL, NULL),
(15, 'Name', 'VARCHAR', 'input', '', 50, 1, 19, 0, NULL, NULL, NULL),
(16, 'Code', 'VARCHAR', 'input', '', 20, 1, 19, 0, NULL, NULL, NULL),
(17, 'Phone', 'VARCHAR', 'input', '', 50, 0, 19, 0, NULL, NULL, NULL),
(18, 'Name', 'VARCHAR', 'input', '', 50, 1, 20, 0, NULL, NULL, NULL),
(19, 'Code', 'VARCHAR', 'input', '', 50, 1, 20, 0, NULL, NULL, NULL),
(20, 'Phone', 'VARCHAR', 'input', '', 50, 0, 20, 0, NULL, NULL, NULL),
(21, 'Name', 'VARCHAR', 'input', '', 100, 1, 21, 0, NULL, NULL, NULL),
(22, 'Code', 'VARCHAR', 'input', '', 50, 1, 21, 0, NULL, NULL, NULL),
(23, 'Address', 'TEXT', 'input', '', 0, 0, 21, 0, NULL, NULL, NULL),
(24, 'Description', 'TEXT', 'textarea', '', 0, 0, 21, 0, NULL, NULL, NULL),
(25, 'Min_Slap', 'VARCHAR', 'input', '', 50, 0, 21, 0, NULL, NULL, NULL),
(26, 'Max_Slap', 'VARCHAR', 'input', '', 50, 0, 21, 0, NULL, NULL, NULL),
(27, 'Discount_Percentage', 'INT', 'input', '', 10, 0, 21, 0, NULL, NULL, NULL),
(28, 'Name', 'VARCHAR', 'input', '', 100, 1, 22, 0, NULL, NULL, NULL),
(29, 'Company', 'INT', 'select', 'Select Company', 10, 1, 22, 1, 'id', 'company', 'id'),
(30, 'Code', 'VARCHAR', 'input', '', 50, 1, 22, 0, NULL, NULL, NULL),
(31, 'Description', 'TEXT', 'textarea', '', 0, 0, 22, 0, NULL, NULL, NULL),
(32, 'Company', 'INT', 'select', '', 10, 1, 23, 1, 'id', 'company', 'Name'),
(33, 'Code', 'VARCHAR', 'input', '', 100, 0, 24, 0, NULL, NULL, NULL),
(34, 'Name', 'VARCHAR', 'input', '', 100, 0, 24, 0, NULL, NULL, NULL),
(35, 'Area', 'VARCHAR', 'input', '', 255, 0, 24, 0, NULL, NULL, NULL),
(36, 'Address', 'VARCHAR', 'input', '', 255, 0, 24, 0, NULL, NULL, NULL),
(37, 'Booker', 'INT', 'input', '', 11, 0, 24, 1, 'id', 'booker', 'Name,Code'),
(38, 'Company', 'INT', 'input', '', 100, 1, 25, 1, 'id', 'company', 'Name'),
(39, 'Booker', 'INT', 'input', '', 100, 1, 25, 1, 'id', 'booker', 'Name'),
(40, 'Date', 'DATE', 'input', '', 100, 1, 25, 0, NULL, NULL, NULL),
(41, 'Company', 'INT', 'input', '', 100, 1, 26, 1, 'id', 'company', 'Name'),
(42, 'Booker', 'INT', 'input', '', 100, 1, 26, 1, 'id', 'booker', 'Name'),
(43, 'Date', 'DATE', 'input', '', 100, 1, 26, 0, NULL, NULL, NULL),
(44, 'Shop', 'INT', 'input', '', 100, 1, 26, 1, 'id', 'shops', 'Name'),
(45, 'Discount', 'INT', 'input', '', 100, 1, 26, 0, NULL, NULL, NULL),
(46, 'Booker', 'INT', 'input', '', 100, 1, 27, 1, 'id', 'booker', 'Name'),
(47, 'Date', 'DATE', 'input', '', 100, 1, 27, 0, NULL, NULL, NULL),
(48, 'Total_Amount', 'INT', 'input', '', 100, 1, 27, 0, NULL, NULL, NULL),
(49, 'Company', 'INT', 'input', '', 100, 1, 28, 1, 'id', 'company', 'Name'),
(50, 'Date', 'INT', 'input', '', 100, 1, 28, 0, NULL, NULL, NULL),
(51, 'Amount', 'INT', 'input', '', 100, 1, 28, 0, NULL, NULL, NULL),
(52, 'Type', 'INT', 'select', 'Debit,Credit', 100, 1, 28, 0, NULL, NULL, NULL),
(53, 'Party_Name', 'INT', 'input', '', 100, 1, 29, 1, 'id', 'shops', 'Name'),
(54, 'Address', 'VARCHAR', 'input', '', 255, 0, 29, 0, NULL, NULL, NULL),
(55, 'Bill_NO', 'INT', 'input', '', 100, 1, 29, 1, 'id', 'billing', 'id'),
(56, 'Cheq_Amount', 'INT', 'input', '', 100, 1, 29, 0, NULL, NULL, NULL),
(57, 'Cheque_Date', 'DATE', 'input', '', 100, 1, 29, 0, NULL, NULL, NULL),
(58, 'Party_Bank', 'VARCHAR', 'input', '', 100, 1, 29, 0, NULL, NULL, NULL),
(59, 'Party_Name', 'INT', 'input', '', 100, 1, 29, 1, 'id', 'shops', 'Name'),
(60, 'Address', 'VARCHAR', 'input', '', 255, 0, 29, 0, NULL, NULL, NULL),
(61, 'Bill_NO', 'INT', 'input', '', 100, 1, 29, 1, 'id', 'billing', 'id'),
(62, 'Cheq_Amount', 'INT', 'input', '', 100, 1, 29, 0, NULL, NULL, NULL),
(63, 'Cheque_Date', 'DATE', 'input', '', 100, 1, 29, 0, NULL, NULL, NULL),
(64, 'Party_Bank', 'VARCHAR', 'input', '', 100, 1, 29, 0, NULL, NULL, NULL),
(65, 'Name', 'VARCHAR', 'input', '', 255, 1, 31, 0, NULL, NULL, NULL),
(66, 'Salesmen', 'INT', 'input', '', 11, 1, 31, 1, 'id', 'salesmen', 'Name'),
(67, 'Date', 'DATE', 'input', '', 100, 1, 31, 0, NULL, NULL, NULL),
(68, 'Amount', 'VARCHAR', 'input', '', 100, 1, 31, 0, NULL, NULL, NULL),
(69, 'Type', 'VARCHAR', 'select', 'Add,Subtract ', 100, 1, 31, 0, NULL, NULL, NULL),
(70, 'Party_Name', 'INT', 'input', '', 11, 1, 34, 1, 'id', 'shops', 'Name'),
(71, 'Address', 'VARCHAR', 'input', '', 255, 1, 34, 0, NULL, NULL, NULL),
(72, 'Bill_NO', 'INT', 'input', '', 11, 1, 34, 1, 'id', 'billing', 'id'),
(73, 'Net_Amount', 'VARCHAR', 'input', '', 100, 1, 34, 0, NULL, NULL, NULL),
(74, 'Signed_Amount', 'VARCHAR', 'input', '', 100, 1, 34, 0, NULL, NULL, NULL),
(75, 'Due_Date', 'DATE', 'input', '', 100, 1, 34, 0, NULL, NULL, NULL),
(76, 'Party_Name', 'INT', 'input', '', 11, 1, 35, 1, 'id', 'shops', 'Name'),
(77, 'Address', 'VARCHAR', 'input', '', 255, 1, 35, 0, NULL, NULL, NULL),
(78, 'Bill_NO', 'INT', 'input', '', 11, 1, 35, 1, 'id', 'billing', 'id'),
(79, 'Rcvd_Amount', 'VARCHAR', 'input', '', 100, 1, 35, 0, NULL, NULL, NULL),
(80, 'Cheque_NO', 'VARCHAR', 'input', '', 100, 0, 35, 0, NULL, NULL, NULL),
(81, 'Chaque_Date_', 'DATE', 'input', '', 100, 0, 35, 0, NULL, NULL, NULL),
(82, 'Party_Bank', 'VARCHAR', 'input', '', 255, 0, 35, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `view_all` int(11) NOT NULL DEFAULT '0',
  `created` int(11) DEFAULT '0',
  `edit` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `disable` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `module_id`, `user_id`, `user_type_id`, `view`, `view_all`, `created`, `edit`, `deleted`, `disable`) VALUES
(223, 2, 2, 0, 0, 0, 0, 0, 0, 0),
(224, 3, 2, 0, 0, 0, 0, 0, 0, 0),
(225, 5, 2, 0, 0, 0, 0, 0, 0, 0),
(226, 7, 2, 0, 0, 0, 0, 0, 0, 0),
(227, 19, 2, 0, 0, 0, 0, 0, 0, 0),
(228, 20, 2, 0, 0, 0, 0, 0, 0, 0),
(229, 21, 2, 0, 1, 0, 0, 0, 0, 0),
(230, 22, 2, 0, 1, 0, 0, 0, 0, 0),
(412, 2, 2, 1, 1, 1, 1, 1, 1, 1),
(413, 3, 2, 1, 1, 1, 1, 1, 1, 1),
(414, 5, 2, 1, 1, 1, 1, 1, 1, 1),
(415, 7, 2, 1, 1, 1, 1, 1, 1, 1),
(416, 19, 2, 1, 1, 1, 1, 1, 1, 1),
(417, 20, 2, 1, 1, 1, 1, 1, 1, 1),
(418, 21, 2, 1, 1, 1, 1, 1, 1, 1),
(419, 22, 2, 1, 1, 1, 1, 1, 1, 1),
(420, 23, 2, 1, 1, 1, 1, 1, 1, 1),
(421, 24, 2, 1, 1, 1, 1, 1, 1, 1),
(422, 26, 2, 1, 1, 1, 1, 1, 1, 1),
(423, 27, 2, 1, 1, 1, 1, 1, 1, 1),
(424, 28, 2, 1, 1, 1, 1, 1, 1, 1),
(425, 29, 2, 1, 1, 1, 1, 1, 1, 1),
(426, 30, 2, 1, 1, 1, 1, 1, 1, 1),
(427, 31, 2, 1, 1, 1, 1, 1, 1, 1),
(428, 32, 2, 1, 1, 1, 1, 1, 1, 1),
(429, 33, 2, 1, 1, 1, 1, 1, 1, 1),
(430, 34, 2, 1, 1, 1, 1, 1, 1, 1),
(431, 35, 2, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Company` int(10) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `stock_in_hand` int(11) DEFAULT '0',
  `purchase_price` int(10) DEFAULT NULL,
  `sale_price` int(10) DEFAULT NULL,
  `Description` text,
  `packing_type` varchar(100) DEFAULT NULL,
  `qty` int(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Name`, `Company`, `Code`, `stock_in_hand`, `purchase_price`, `sale_price`, `Description`, `packing_type`, `qty`, `user_id`, `created_at`) VALUES
(1, 'first product', 1, 'fp', 43, 10, 4, 'asdf', 'asdf', 15, 2, '2019-05-30 21:31:16'),
(2, 'New product', 3, 'np', 100, 10, 20, '', 'carton', 200, 2, '2019-06-11 21:57:27'),
(3, 'New Product 2', 3, 'np2', 200, 15, 25, '', 'carton', 100, 2, '2019-06-11 21:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) UNSIGNED NOT NULL,
  `Company` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `Company`, `user_id`, `created_at`) VALUES
(12, 1, 2, '2019-05-23 22:56:14'),
(23, 1, 2, '2019-05-30 21:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `gross_value` decimal(10,0) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `purchase_id`, `product_id`, `qty`, `rate`, `gross_value`, `discount`, `total`) VALUES
(2, 12, 1, 4, 10, '40', 1, '40'),
(3, 12, 1, 3, 10, '30', 4, '29'),
(8, 19, 1, 5, 10, '50', 1, '49.5'),
(9, 20, 1, 5, 10, '50', 1, '49.5'),
(10, 21, 1, 5, 10, '50', 1, '49.5'),
(11, 22, 1, 5, 10, '50', 1, '49.5'),
(12, 23, 1, 5, 10, '50', 1, '49.5');

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE `recovery` (
  `id` int(11) UNSIGNED NOT NULL,
  `Party_Name` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Bill_NO` int(11) NOT NULL,
  `Rcvd_Amount` varchar(100) NOT NULL,
  `Cheque_NO` varchar(100) DEFAULT NULL,
  `Chaque_Date_` date DEFAULT NULL,
  `Party_Bank` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recovery`
--

INSERT INTO `recovery` (`id`, `Party_Name`, `Address`, `Bill_NO`, `Rcvd_Amount`, `Cheque_NO`, `Chaque_Date_`, `Party_Bank`, `user_id`, `created_at`) VALUES
(1, 1, 'test', 6, '20', '123', '2019-06-25', 'test', 2, '2019-06-13 13:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `salesmen`
--

CREATE TABLE `salesmen` (
  `id` int(11) UNSIGNED NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Code` varchar(20) NOT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesmen`
--

INSERT INTO `salesmen` (`id`, `Name`, `Code`, `Phone`, `user_id`, `created_at`) VALUES
(1, 'Sales men test 1', 'smt1', '098765432', 2, '2019-06-11 21:10:31'),
(2, 'sales men new', 'smn', '12345', 2, '2019-06-11 22:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `salesreturn`
--

CREATE TABLE `salesreturn` (
  `id` int(11) UNSIGNED NOT NULL,
  `company` int(10) NOT NULL,
  `booker` int(10) NOT NULL,
  `shop` int(10) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `fresh_qty` int(11) DEFAULT NULL,
  `damage_qty` int(11) DEFAULT NULL,
  `gross_value` int(11) DEFAULT NULL,
  `discount` int(10) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesreturn`
--

INSERT INTO `salesreturn` (`id`, `company`, `booker`, `shop`, `product_id`, `fresh_qty`, `damage_qty`, `gross_value`, `discount`, `rate`, `total`, `user_id`, `created_at`) VALUES
(1, 1, 1, 1, 1, 12, 1, 8, 1, 4, '7.92', 2, '2019-06-11 20:47:44'),
(2, 1, 1, 1, 1, 2, 3, 20, 2, 4, '19.60', 2, '2019-06-11 20:32:22'),
(3, 3, 1, 0, 2, 2, 3, 80, 1, 20, '79.20', 2, '2019-06-13 13:16:30'),
(4, 3, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2019-06-13 13:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `sales_men_entries`
--

CREATE TABLE `sales_men_entries` (
  `id` int(11) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Salesmen` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) UNSIGNED NOT NULL,
  `Code` varchar(100) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Booker` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `Code`, `Name`, `Area`, `Address`, `Booker`, `user_id`, `created_at`) VALUES
(1, '123', 'Test Shop', 'Garden', 'testing', 1, 2, '2019-05-28 20:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `sign_bills`
--

CREATE TABLE `sign_bills` (
  `id` int(11) UNSIGNED NOT NULL,
  `Party_Name` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Bill_NO` int(11) NOT NULL,
  `Net_Amount` varchar(100) NOT NULL,
  `Signed_Amount` varchar(100) NOT NULL,
  `Rcvd_Amount` varchar(255) NOT NULL,
  `Due_Date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign_bills`
--

INSERT INTO `sign_bills` (`id`, `Party_Name`, `Address`, `Bill_NO`, `Net_Amount`, `Signed_Amount`, `Rcvd_Amount`, `Due_Date`, `user_id`, `created_at`) VALUES
(1, 1, 'test', 5, '50', '30', '', '2019-06-19', 2, '2019-06-13 13:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(2, 'admin', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', 1),
(4, 'admin1', 'admin1@gmail.com', 'e6e061838856bf47e1de730719fb2609', 1),
(5, 'Udata', 'Udata@gmail.com', '5327b0d1bfa868acb9baac5a9d901815', 14),
(6, 'mob', 'admindd@gmail.com', '6cf0a3d27fdc438e4ee601448e452e48', 14),
(9, 'rtrt', 'adminsdee@milya.com', '532b7cbe070a3579f424988a040752f2', 14),
(10, 'musa', 'musa@gmail.com', 'c45d99e5638d1f9f801b545096003a8d', 14),
(12, 'rtrteree', 'adminsdeee11@milya.com', '0acf3d81f151df5994a88f039e636228', 14),
(13, 'musaeeee', 'mus22a@gmail.com', 'dbc4d84bfcfe2284ba11beffb853a8c4', 14),
(14, 'hero11', 'hero11@milya.com', '0acf3d81f151df5994a88f039e636228', 14),
(15, 'hero22', 'hero22@gmail.com', 'dbc4d84bfcfe2284ba11beffb853a8c4', 14),
(16, 'rest11', 'rest11@milya.com', '0acf3d81f151df5994a88f039e636228', 14),
(17, 'west22', 'hwest22@gmail.com', 'dbc4d84bfcfe2284ba11beffb853a8c4', 14),
(18, 'opp', 'opp@milya.com', 'e201220da86c13f4d9badaab658fa973', 14),
(19, 'urrr', 'urrr@gmail.com', '549ce24fb62238d013a6e222cb4d41d8', 14),
(20, 'DADU', 'DADU@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 14),
(21, 'AHSAN', 'AHSAN@gmail.com', 'd6a9a933c8aafc51e55ac0662b6e4d4a', 14),
(22, '21321', 'dasdas', 'd41d8cd98f00b204e9800998ecf8427e', 14),
(26, 'xyzmg', 'xyzmg@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 14),
(27, 'mojjojo1', 'mojjojo1@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 14);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`, `user_id`) VALUES
(1, 'admin', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_detail`
--
ALTER TABLE `billing_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booker`
--
ALTER TABLE `booker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cheques`
--
ALTER TABLE `cheques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsr_bills`
--
ALTER TABLE `dsr_bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger_entries`
--
ALTER TABLE `ledger_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules_fileds`
--
ALTER TABLE `modules_fileds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`);

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesmen`
--
ALTER TABLE `salesmen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesreturn`
--
ALTER TABLE `salesreturn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_men_entries`
--
ALTER TABLE `sales_men_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_bills`
--
ALTER TABLE `sign_bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `billing_detail`
--
ALTER TABLE `billing_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booker`
--
ALTER TABLE `booker`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cheques`
--
ALTER TABLE `cheques`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dsr_bills`
--
ALTER TABLE `dsr_bills`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ledger_entries`
--
ALTER TABLE `ledger_entries`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `modules_fileds`
--
ALTER TABLE `modules_fileds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `recovery`
--
ALTER TABLE `recovery`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salesmen`
--
ALTER TABLE `salesmen`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salesreturn`
--
ALTER TABLE `salesreturn`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales_men_entries`
--
ALTER TABLE `sales_men_entries`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sign_bills`
--
ALTER TABLE `sign_bills`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
