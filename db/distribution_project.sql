-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2019 at 10:24 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

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
  `Min_Slap` varchar(50) DEFAULT NULL,
  `Max_Slap` varchar(50) DEFAULT NULL,
  `Discount_Percentage` int(10) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `Name`, `Code`, `Address`, `Description`, `Min_Slap`, `Max_Slap`, `Discount_Percentage`, `user_id`, `created_at`) VALUES
(1, 'Abc company', '123', 'karachi', 'asdf', '10', '50', 90, 2, '2019-05-12 19:47:47');

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
(23, 'Purchase', 'purchase', 5, 'home', 'purchase', 2);

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
(32, 'Company', 'INT', 'select', '', 10, 1, 23, 1, 'id', 'company', 'Name');

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
(28, 2, 2, 13, 1, 0, 0, 0, 0, 0),
(29, 3, 2, 13, 0, 1, 0, 1, 0, 0),
(30, 5, 2, 13, 0, 0, 1, 0, 0, 0),
(35, 2, 2, 14, 1, 0, 0, 0, 0, 0),
(36, 3, 2, 14, 0, 0, 0, 0, 0, 0),
(37, 5, 2, 14, 0, 0, 0, 0, 0, 0),
(223, 2, 2, 0, 0, 0, 0, 0, 0, 0),
(224, 3, 2, 0, 0, 0, 0, 0, 0, 0),
(225, 5, 2, 0, 0, 0, 0, 0, 0, 0),
(226, 7, 2, 0, 0, 0, 0, 0, 0, 0),
(227, 19, 2, 0, 0, 0, 0, 0, 0, 0),
(228, 20, 2, 0, 0, 0, 0, 0, 0, 0),
(229, 21, 2, 0, 1, 0, 0, 0, 0, 0),
(230, 22, 2, 0, 1, 0, 0, 0, 0, 0),
(247, 2, 2, 1, 1, 1, 1, 1, 1, 1),
(248, 3, 2, 1, 1, 1, 1, 1, 1, 1),
(249, 5, 2, 1, 1, 1, 1, 1, 1, 1),
(250, 7, 2, 1, 1, 1, 1, 1, 1, 1),
(251, 19, 2, 1, 1, 1, 1, 1, 1, 1),
(252, 20, 2, 1, 1, 1, 1, 1, 1, 1),
(253, 21, 2, 1, 1, 1, 1, 1, 1, 1),
(254, 22, 2, 1, 1, 1, 1, 1, 1, 1),
(255, 23, 2, 1, 1, 1, 1, 1, 1, 1);

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
(1, 'first product', 1, 'fp', 3, NULL, NULL, 'asdf', NULL, NULL, 2, '2019-05-12 19:59:09');

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
(1, 'admin', 2),
(13, 'Company', 2),
(14, 'Distribution', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booker`
--
ALTER TABLE `booker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
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
-- Indexes for table `salesmen`
--
ALTER TABLE `salesmen`
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
-- AUTO_INCREMENT for table `booker`
--
ALTER TABLE `booker`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `modules_fileds`
--
ALTER TABLE `modules_fileds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesmen`
--
ALTER TABLE `salesmen`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
