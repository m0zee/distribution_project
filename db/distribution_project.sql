-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2019 at 12:16 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `extra_discount` varchar(10) NOT NULL,
  `t_o` varchar(10) NOT NULL,
  `Total_Amount` int(255) NOT NULL,
  `final_amount` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `Company`, `Booker`, `Date`, `Shop`, `company_discount`, `Discount`, `extra_discount`, `t_o`, `Total_Amount`, `final_amount`, `user_id`, `created_at`) VALUES
(1, 1, 1, '2019-06-25', 1, 2, 0, '3', '50', 318, '246', 2, '2019-06-26 19:30:14'),
(2, 1, 1, '2019-06-25', 2, 4, 0, '2', '100', 476, '476', 2, '2019-06-26 19:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `billing_detail`
--

CREATE TABLE `billing_detail` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` varchar(11) NOT NULL,
  `gross` varchar(11) NOT NULL,
  `product_discount` varchar(11) NOT NULL,
  `product_total` varchar(11) NOT NULL,
  `return_qty` varchar(100) NOT NULL,
  `final_total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_detail`
--

INSERT INTO `billing_detail` (`id`, `bill_id`, `product_id`, `qty`, `rate`, `gross`, `product_discount`, `product_total`, `return_qty`, `final_total`) VALUES
(1, 1, 1, 10, '25', '250', '0', '250', '3', '175'),
(2, 1, 2, 5, '28', '140', '2', '137.2', '0', ' 137.2'),
(3, 2, 2, 10, '28', '280', '2', '274.4', '0', '274.4'),
(4, 2, 3, 10, '35', '350', '3', '339.5', '0', ' 339.5');

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
(1, 'First Booker', '123', '1255664372', 2, '2019-06-24 22:22:26'),
(2, 'second booker', '124', '', 2, '2019-06-25 20:33:23');

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
  `Status` varchar(10) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'First Company', '123', 'company', 'company', '{"min":["1000","2001","3001"],"max":["2000","3000","10000"],"dis":["2","3","5"]}', NULL, NULL, NULL, 2, '2019-06-24 19:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `dsr_bills`
--

CREATE TABLE `dsr_bills` (
  `id` int(11) UNSIGNED NOT NULL,
  `Company` int(11) NOT NULL,
  `Booker` int(100) NOT NULL,
  `Date` date NOT NULL,
  `Total_Amount` int(100) NOT NULL,
  `return_amount` varchar(100) NOT NULL,
  `salesmen` int(11) NOT NULL,
  `dsr_sales_return` varchar(100) NOT NULL,
  `dsr_cheque` varchar(100) NOT NULL,
  `dsr_sign_bills` varchar(100) NOT NULL,
  `dsr_recovery` varchar(100) NOT NULL,
  `dsr_total` varchar(100) NOT NULL,
  `dsr_cash` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dsr_bills`
--

INSERT INTO `dsr_bills` (`id`, `Company`, `Booker`, `Date`, `Total_Amount`, `return_amount`, `salesmen`, `dsr_sales_return`, `dsr_cheque`, `dsr_sign_bills`, `dsr_recovery`, `dsr_total`, `dsr_cash`, `user_id`, `created_at`) VALUES
(1, 1, 1, '2019-06-25', 794, '72', 0, '', '', '', '', '', '', 2, '2019-06-26 19:40:52');

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
(1, 'Purchase', 1, '2019-06-24', '1537.9', 'Debit', 1, 2, '2019-06-24 19:48:00');

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
(35, 'Recovery', 'recovery', 7, 'home', 'recovery', 2),
(36, 'Product Types', 'product_type', 7, 'home', 'product_type', 2),
(37, 'Cash Report', 'cash_report', 7, 'home', 'cash_report', 2),
(38, 'Stock Report', 'stock_report', 7, 'home', 'stock_report', 2),
(39, 'Sign Bills Report', 'sign_bills_report', 7, 'home', 'sign_bills_report', 2);

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
(82, 'Party_Bank', 'VARCHAR', 'input', '', 255, 0, 35, 0, NULL, NULL, NULL),
(83, 'Name', 'VARCHAR', 'input', '', 100, 1, 36, 0, NULL, NULL, NULL),
(84, 'Company', 'INT', 'input', '', 11, 1, 36, 1, 'id', 'company', 'Name'),
(85, 'Slap', 'VARCHAR', 'radio', 'Yes,No', 100, 1, 36, 0, NULL, NULL, NULL);

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
(714, 2, 2, 1, 1, 1, 1, 1, 1, 1),
(715, 3, 2, 1, 1, 1, 1, 1, 1, 1),
(716, 5, 2, 1, 1, 1, 1, 1, 1, 1),
(717, 7, 2, 1, 1, 1, 1, 1, 1, 1),
(718, 19, 2, 1, 1, 1, 1, 1, 1, 1),
(719, 20, 2, 1, 1, 1, 1, 1, 1, 1),
(720, 21, 2, 1, 1, 1, 1, 1, 1, 1),
(721, 22, 2, 1, 1, 1, 1, 1, 1, 1),
(722, 23, 2, 1, 1, 1, 1, 1, 1, 1),
(723, 24, 2, 1, 1, 1, 1, 1, 1, 1),
(724, 26, 2, 1, 1, 1, 1, 1, 1, 1),
(725, 27, 2, 1, 1, 1, 1, 1, 1, 1),
(726, 28, 2, 1, 1, 1, 1, 1, 1, 1),
(727, 29, 2, 1, 1, 1, 1, 1, 1, 1),
(728, 30, 2, 1, 1, 1, 1, 1, 1, 1),
(729, 31, 2, 1, 1, 1, 1, 1, 1, 1),
(730, 32, 2, 1, 1, 1, 1, 1, 1, 1),
(731, 33, 2, 1, 1, 1, 1, 1, 1, 1),
(732, 34, 2, 1, 1, 1, 1, 1, 1, 1),
(733, 35, 2, 1, 1, 1, 1, 1, 1, 1),
(734, 36, 2, 1, 1, 1, 1, 1, 1, 1),
(735, 37, 2, 1, 1, 1, 1, 1, 1, 1),
(736, 38, 2, 1, 1, 1, 1, 1, 1, 1),
(737, 39, 2, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Company` int(10) NOT NULL,
  `Type` int(11) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `stock_in_hand` int(11) DEFAULT '0',
  `discount` varchar(10) NOT NULL,
  `purchase_price` varchar(10) DEFAULT NULL,
  `sale_price` varchar(10) DEFAULT NULL,
  `Description` text,
  `packing_type` varchar(100) DEFAULT NULL,
  `qty` int(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Name`, `Company`, `Type`, `Code`, `stock_in_hand`, `discount`, `purchase_price`, `sale_price`, `Description`, `packing_type`, `qty`, `user_id`, `created_at`) VALUES
(1, 'First Product', 1, 1, '123', 255, '0', '20', '25', '', '', 0, 2, '2019-06-26 19:40:51'),
(2, 'Second Product ', 1, 2, '124', 496, '2', '23', '28', '', '', 0, 2, '2019-06-26 19:40:52'),
(3, 'Third Product', 1, 3, '125', 460, '3', '30', '35', '', '', 0, 2, '2019-06-26 19:40:52'),
(4, 'Fourth Product', 1, 0, '126', 170, '0', '27', '32', '', '', 0, 2, '2019-06-24 19:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Company` int(11) NOT NULL,
  `Slap` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `Name`, `Company`, `Slap`, `user_id`, `created_at`) VALUES
(1, 'Consumer', 1, 'Yes', 2, '2019-06-24 19:38:22'),
(2, 'Soap', 1, 'No', 2, '2019-06-24 19:38:39'),
(3, 'Pad', 1, 'No', 2, '2019-06-24 19:38:55');

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
(1, 1, 2, '2019-06-24 19:48:00');

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
(1, 1, 1, 10, 20, '200', 5, '190'),
(2, 1, 2, 10, 23, '230', 7, '213.9'),
(3, 1, 3, 20, 30, '600', 10, '540'),
(4, 1, 4, 25, 27, '675', 12, '594');

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
  `gross_value` varchar(11) DEFAULT NULL,
  `discount` int(10) DEFAULT NULL,
  `rate` varchar(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '123', 'First Shop', 'test', 'test', 1, 2, '2019-06-24 22:23:48'),
(2, '124', 'Second Shop', 'Garden', 'test', 1, 2, '2019-06-24 22:24:24');

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
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `billing_detail`
--
ALTER TABLE `billing_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `booker`
--
ALTER TABLE `booker`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cheques`
--
ALTER TABLE `cheques`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dsr_bills`
--
ALTER TABLE `dsr_bills`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ledger_entries`
--
ALTER TABLE `ledger_entries`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `modules_fileds`
--
ALTER TABLE `modules_fileds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=738;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `recovery`
--
ALTER TABLE `recovery`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salesmen`
--
ALTER TABLE `salesmen`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salesreturn`
--
ALTER TABLE `salesreturn`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_men_entries`
--
ALTER TABLE `sales_men_entries`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sign_bills`
--
ALTER TABLE `sign_bills`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
