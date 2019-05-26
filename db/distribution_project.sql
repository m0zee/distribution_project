/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : distribution_project

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-05-26 05:15:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `booker`
-- ----------------------------
DROP TABLE IF EXISTS `booker`;
CREATE TABLE `booker` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of booker
-- ----------------------------

-- ----------------------------
-- Table structure for `company`
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Address` text,
  `Description` text,
  `Min_Slap` varchar(50) DEFAULT NULL,
  `Max_Slap` varchar(50) DEFAULT NULL,
  `Discount_Percentage` int(10) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO `company` VALUES ('1', 'Abc company', '123', 'karachi', 'asdf', '10', '50', '90', '2', '2019-05-13 00:47:47');

-- ----------------------------
-- Table structure for `modules`
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `main_name` varchar(100) NOT NULL,
  `sort` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO `modules` VALUES ('2', 'Dashboard', 'dashboard', '1', 'home', 'home', '4');
INSERT INTO `modules` VALUES ('3', 'Modules', 'modules', '4', 'home', 'modules', '4');
INSERT INTO `modules` VALUES ('5', 'Role/Permission', 'role', '2', 'home', 'role', '4');
INSERT INTO `modules` VALUES ('7', 'Users', 'user', '3', 'home', 'users', '2');
INSERT INTO `modules` VALUES ('19', 'Sales Men', 'salesmen', '4', 'home', 'salesmen', '2');
INSERT INTO `modules` VALUES ('20', 'Booker', 'booker', '5', 'home', 'booker', '2');
INSERT INTO `modules` VALUES ('21', 'Company', 'company', '6', 'home', 'company', '2');
INSERT INTO `modules` VALUES ('22', 'Product', 'product', '7', 'home', 'product', '2');
INSERT INTO `modules` VALUES ('23', 'Purchase', 'purchase', '5', 'home', 'purchase', '2');

-- ----------------------------
-- Table structure for `modules_fileds`
-- ----------------------------
DROP TABLE IF EXISTS `modules_fileds`;
CREATE TABLE `modules_fileds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `value_column` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modules_fileds
-- ----------------------------
INSERT INTO `modules_fileds` VALUES ('1', 'name', 'VARCHAR', 'input', '', '100', '1', '15', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('2', 'gender', 'VARCHAR', 'radio', 'male,female', '100', '1', '15', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('3', 'relationship_status', 'VARCHAR', 'select', 'single,married,divorced,widowed', '100', '1', '15', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('4', 'image', 'VARCHAR', 'file', 'jpg,png,jpeg,gif', '100', '1', '15', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('5', 'education', 'VARCHAR', 'checkbox', 'matric,inter,bachlor', '255', '1', '15', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('6', 'message', 'TEXT', 'textarea', '', '255', '1', '15', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('7', 'Name', 'VARCHAR', 'input', '', '100', '1', '16', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('8', 'Icon', 'VARCHAR', 'file', 'png,jpg,jpeg,gif', '255', '1', '16', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('9', 'Name', 'VARCHAR', 'input', '', '100', '1', '17', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('10', 'Icon', 'VARCHAR', 'file', 'png,jpg,jpeg,gif', '255', '1', '17', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('11', 'Title', 'VARCHAR', 'input', '', '255', '1', '18', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('12', 'Description', 'TEXT', 'textarea', '', '500', '1', '18', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('13', 'category', 'INT', 'input', '', '11', '1', '18', '1', 'id', 'blog_category', 'Name');
INSERT INTO `modules_fileds` VALUES ('14', 'image', 'VARCHAR', 'file', 'png,jpg,jpeg,gif', '255', '1', '18', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('15', 'Name', 'VARCHAR', 'input', '', '50', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('16', 'Code', 'VARCHAR', 'input', '', '20', '1', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('17', 'Phone', 'VARCHAR', 'input', '', '50', '0', '19', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('18', 'Name', 'VARCHAR', 'input', '', '50', '1', '20', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('19', 'Code', 'VARCHAR', 'input', '', '50', '1', '20', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('20', 'Phone', 'VARCHAR', 'input', '', '50', '0', '20', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('21', 'Name', 'VARCHAR', 'input', '', '100', '1', '21', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('22', 'Code', 'VARCHAR', 'input', '', '50', '1', '21', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('23', 'Address', 'TEXT', 'input', '', '0', '0', '21', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('24', 'Description', 'TEXT', 'textarea', '', '0', '0', '21', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('25', 'Min_Slap', 'VARCHAR', 'input', '', '50', '0', '21', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('26', 'Max_Slap', 'VARCHAR', 'input', '', '50', '0', '21', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('27', 'Discount_Percentage', 'INT', 'input', '', '10', '0', '21', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('28', 'Name', 'VARCHAR', 'input', '', '100', '1', '22', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('29', 'Company', 'INT', 'select', 'Select Company', '10', '1', '22', '1', 'id', 'company', 'id');
INSERT INTO `modules_fileds` VALUES ('30', 'Code', 'VARCHAR', 'input', '', '50', '1', '22', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('31', 'Description', 'TEXT', 'textarea', '', '0', '0', '22', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('32', 'Company', 'INT', 'select', '', '10', '1', '23', '1', 'id', 'company', 'Name');

-- ----------------------------
-- Table structure for `permission`
-- ----------------------------
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `view_all` int(11) NOT NULL DEFAULT '0',
  `created` int(11) DEFAULT '0',
  `edit` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `disable` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of permission
-- ----------------------------
INSERT INTO `permission` VALUES ('28', '2', '2', '13', '1', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('29', '3', '2', '13', '0', '1', '0', '1', '0', '0');
INSERT INTO `permission` VALUES ('30', '5', '2', '13', '0', '0', '1', '0', '0', '0');
INSERT INTO `permission` VALUES ('35', '2', '2', '14', '1', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('36', '3', '2', '14', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('37', '5', '2', '14', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('223', '2', '2', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('224', '3', '2', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('225', '5', '2', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('226', '7', '2', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('227', '19', '2', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('228', '20', '2', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('229', '21', '2', '0', '1', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('230', '22', '2', '0', '1', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('247', '2', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('248', '3', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('249', '5', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('250', '7', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('251', '19', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('252', '20', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('253', '21', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('254', '22', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('255', '23', '2', '1', '1', '1', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', 'first product', '1', 'fp', '3', '10', '4', 'asdf', 'asdf', '15', '2', '2019-05-24 03:56:14');

-- ----------------------------
-- Table structure for `purchase`
-- ----------------------------
DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Company` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of purchase
-- ----------------------------
INSERT INTO `purchase` VALUES ('12', '1', '2', '2019-05-24 03:56:14');

-- ----------------------------
-- Table structure for `purchase_details`
-- ----------------------------
DROP TABLE IF EXISTS `purchase_details`;
CREATE TABLE `purchase_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `gross_value` decimal(10,0) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_id` (`purchase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of purchase_details
-- ----------------------------
INSERT INTO `purchase_details` VALUES ('2', '12', '1', '4', '10', '40', '1', '40');
INSERT INTO `purchase_details` VALUES ('3', '12', '1', '3', '10', '30', '4', '29');

-- ----------------------------
-- Table structure for `salesmen`
-- ----------------------------
DROP TABLE IF EXISTS `salesmen`;
CREATE TABLE `salesmen` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Code` varchar(20) NOT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of salesmen
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', 'admin', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', '1');
INSERT INTO `users` VALUES ('4', 'admin1', 'admin1@gmail.com', 'e6e061838856bf47e1de730719fb2609', '1');
INSERT INTO `users` VALUES ('5', 'Udata', 'Udata@gmail.com', '5327b0d1bfa868acb9baac5a9d901815', '14');
INSERT INTO `users` VALUES ('6', 'mob', 'admindd@gmail.com', '6cf0a3d27fdc438e4ee601448e452e48', '14');
INSERT INTO `users` VALUES ('9', 'rtrt', 'adminsdee@milya.com', '532b7cbe070a3579f424988a040752f2', '14');
INSERT INTO `users` VALUES ('10', 'musa', 'musa@gmail.com', 'c45d99e5638d1f9f801b545096003a8d', '14');
INSERT INTO `users` VALUES ('12', 'rtrteree', 'adminsdeee11@milya.com', '0acf3d81f151df5994a88f039e636228', '14');
INSERT INTO `users` VALUES ('13', 'musaeeee', 'mus22a@gmail.com', 'dbc4d84bfcfe2284ba11beffb853a8c4', '14');
INSERT INTO `users` VALUES ('14', 'hero11', 'hero11@milya.com', '0acf3d81f151df5994a88f039e636228', '14');
INSERT INTO `users` VALUES ('15', 'hero22', 'hero22@gmail.com', 'dbc4d84bfcfe2284ba11beffb853a8c4', '14');
INSERT INTO `users` VALUES ('16', 'rest11', 'rest11@milya.com', '0acf3d81f151df5994a88f039e636228', '14');
INSERT INTO `users` VALUES ('17', 'west22', 'hwest22@gmail.com', 'dbc4d84bfcfe2284ba11beffb853a8c4', '14');
INSERT INTO `users` VALUES ('18', 'opp', 'opp@milya.com', 'e201220da86c13f4d9badaab658fa973', '14');
INSERT INTO `users` VALUES ('19', 'urrr', 'urrr@gmail.com', '549ce24fb62238d013a6e222cb4d41d8', '14');
INSERT INTO `users` VALUES ('20', 'DADU', 'DADU@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '14');
INSERT INTO `users` VALUES ('21', 'AHSAN', 'AHSAN@gmail.com', 'd6a9a933c8aafc51e55ac0662b6e4d4a', '14');
INSERT INTO `users` VALUES ('22', '21321', 'dasdas', 'd41d8cd98f00b204e9800998ecf8427e', '14');
INSERT INTO `users` VALUES ('26', 'xyzmg', 'xyzmg@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '14');
INSERT INTO `users` VALUES ('27', 'mojjojo1', 'mojjojo1@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '14');

-- ----------------------------
-- Table structure for `user_type`
-- ----------------------------
DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_type
-- ----------------------------
INSERT INTO `user_type` VALUES ('1', 'admin', '2');
INSERT INTO `user_type` VALUES ('13', 'Company', '2');
INSERT INTO `user_type` VALUES ('14', 'Distribution', '2');
