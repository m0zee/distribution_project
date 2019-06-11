/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : distribution_project

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-06-12 04:14:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `billing`
-- ----------------------------
DROP TABLE IF EXISTS `billing`;
CREATE TABLE `billing` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Company` int(100) NOT NULL,
  `Booker` int(100) NOT NULL,
  `Date` date NOT NULL,
  `Shop` int(100) NOT NULL,
  `company_discount` int(11) DEFAULT NULL,
  `Discount` int(100) NOT NULL,
  `Total_Amount` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of billing
-- ----------------------------
INSERT INTO `billing` VALUES ('4', '2', '1', '2019-05-29', '1', null, '2', '80', '2', '2019-05-29 22:02:18');
INSERT INTO `billing` VALUES ('5', '2', '1', '2019-05-29', '1', null, '2', '42', '2', '2019-05-29 22:02:18');

-- ----------------------------
-- Table structure for `billing_detail`
-- ----------------------------
DROP TABLE IF EXISTS `billing_detail`;
CREATE TABLE `billing_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of billing_detail
-- ----------------------------
INSERT INTO `billing_detail` VALUES ('2', '4', '1', '10');
INSERT INTO `billing_detail` VALUES ('3', '4', '1', '15');
INSERT INTO `billing_detail` VALUES ('4', '4', '1', '7');
INSERT INTO `billing_detail` VALUES ('5', '5', '1', '6');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of booker
-- ----------------------------
INSERT INTO `booker` VALUES ('1', 'Testing Booket', '123', '32381208932', '2', '2019-05-29 01:24:11');
INSERT INTO `booker` VALUES ('2', 'booker new 1', 'bn1', '1234', '2', '2019-06-12 03:08:01');

-- ----------------------------
-- Table structure for `cheques`
-- ----------------------------
DROP TABLE IF EXISTS `cheques`;
CREATE TABLE `cheques` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Party_Name` int(100) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Bill_NO` int(100) NOT NULL,
  `Cheq_Amount` int(100) NOT NULL,
  `Cheque_Date` date NOT NULL,
  `Party_Bank` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cheques
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
  `slap` text NOT NULL,
  `Min_Slap` varchar(50) DEFAULT NULL,
  `Max_Slap` varchar(50) DEFAULT NULL,
  `Discount_Percentage` int(10) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO `company` VALUES ('1', 'Abc company', '123', 'karachi', 'asdf', '', '10', '50', '90', '2', '2019-05-13 00:47:47');
INSERT INTO `company` VALUES ('2', 'test', '123', 'testing', 'test', '{\"min\":[\"0\",\"2001\"],\"max\":[\"2000\",\"4000\"],\"dis\":[\"2\",\"4\"]}', null, null, null, '2', '2019-05-27 02:11:49');
INSERT INTO `company` VALUES ('3', 'New Test Company', 'ntc', 'karachi', 'wedfghjk', '{\"min\":[\"100\",\"201\",\"501\"],\"max\":[\"200\",\"500\",\"50000\"],\"dis\":[\"5\",\"10\",\"\"]}', null, null, null, '2', '2019-06-12 02:53:44');

-- ----------------------------
-- Table structure for `dsr_bills`
-- ----------------------------
DROP TABLE IF EXISTS `dsr_bills`;
CREATE TABLE `dsr_bills` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Booker` int(100) NOT NULL,
  `Date` date NOT NULL,
  `Total_Amount` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dsr_bills
-- ----------------------------
INSERT INTO `dsr_bills` VALUES ('2', '1', '2019-05-29', '122', '2', '2019-05-29 22:14:26');

-- ----------------------------
-- Table structure for `ledger_entries`
-- ----------------------------
DROP TABLE IF EXISTS `ledger_entries`;
CREATE TABLE `ledger_entries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `Company` int(100) NOT NULL,
  `Date` date NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `purchase_id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ledger_entries
-- ----------------------------
INSERT INTO `ledger_entries` VALUES ('3', 'Opening Balance ', '1', '2019-05-01', '5000', 'Debit', '0', '2', '2019-05-31 02:29:22');
INSERT INTO `ledger_entries` VALUES ('5', 'Purchase', '1', '2019-05-30', '49.5', 'Debit', '23', '2', '2019-05-31 02:31:15');
INSERT INTO `ledger_entries` VALUES ('6', 'Salary', '1', '2019-05-31', '2000', 'Credit', '0', '2', '2019-05-31 02:31:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

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
INSERT INTO `modules` VALUES ('24', 'Shops', 'shops', '7', 'home', 'shops', '2');
INSERT INTO `modules` VALUES ('26', 'Billing', 'billing', '7', 'home', 'billing', '2');
INSERT INTO `modules` VALUES ('27', 'Dsr/Bills', 'dsr_bills', '7', 'home', 'dsr_bills', '2');
INSERT INTO `modules` VALUES ('28', 'Ledger Entries', 'ledger_entries', '7', 'home', 'ledger_entries', '2');
INSERT INTO `modules` VALUES ('29', 'Cheques', 'cheques', '7', 'home', 'cheques', '2');
INSERT INTO `modules` VALUES ('30', 'Ledger', 'ledger', '7', 'home', 'ledger', '2');
INSERT INTO `modules` VALUES ('31', 'Sales Men Entries', 'sales_men_entries', '7', 'home', 'sales_men_entries', '2');
INSERT INTO `modules` VALUES ('32', 'Salesmen Balance', 'salesmen_balance', '7', 'home', 'salesmen_balance', '2');
INSERT INTO `modules` VALUES ('33', 'Sales Return', 'salesreturn', '10', 'home', 'salesreturn', '2');
INSERT INTO `modules` VALUES ('34', 'Sign Bills', 'sign_bills', '7', 'home', 'sign_bills', '2');
INSERT INTO `modules` VALUES ('35', 'Recovery', 'recovery', '7', 'home', 'recovery', '2');

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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

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
INSERT INTO `modules_fileds` VALUES ('33', 'Code', 'VARCHAR', 'input', '', '100', '0', '24', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('34', 'Name', 'VARCHAR', 'input', '', '100', '0', '24', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('35', 'Area', 'VARCHAR', 'input', '', '255', '0', '24', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('36', 'Address', 'VARCHAR', 'input', '', '255', '0', '24', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('37', 'Booker', 'INT', 'input', '', '11', '0', '24', '1', 'id', 'booker', 'Name,Code');
INSERT INTO `modules_fileds` VALUES ('38', 'Company', 'INT', 'input', '', '100', '1', '25', '1', 'id', 'company', 'Name');
INSERT INTO `modules_fileds` VALUES ('39', 'Booker', 'INT', 'input', '', '100', '1', '25', '1', 'id', 'booker', 'Name');
INSERT INTO `modules_fileds` VALUES ('40', 'Date', 'DATE', 'input', '', '100', '1', '25', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('41', 'Company', 'INT', 'input', '', '100', '1', '26', '1', 'id', 'company', 'Name');
INSERT INTO `modules_fileds` VALUES ('42', 'Booker', 'INT', 'input', '', '100', '1', '26', '1', 'id', 'booker', 'Name');
INSERT INTO `modules_fileds` VALUES ('43', 'Date', 'DATE', 'input', '', '100', '1', '26', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('44', 'Shop', 'INT', 'input', '', '100', '1', '26', '1', 'id', 'shops', 'Name');
INSERT INTO `modules_fileds` VALUES ('45', 'Discount', 'INT', 'input', '', '100', '1', '26', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('46', 'Booker', 'INT', 'input', '', '100', '1', '27', '1', 'id', 'booker', 'Name');
INSERT INTO `modules_fileds` VALUES ('47', 'Date', 'DATE', 'input', '', '100', '1', '27', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('48', 'Total_Amount', 'INT', 'input', '', '100', '1', '27', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('49', 'Company', 'INT', 'input', '', '100', '1', '28', '1', 'id', 'company', 'Name');
INSERT INTO `modules_fileds` VALUES ('50', 'Date', 'INT', 'input', '', '100', '1', '28', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('51', 'Amount', 'INT', 'input', '', '100', '1', '28', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('52', 'Type', 'INT', 'select', 'Debit,Credit', '100', '1', '28', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('53', 'Party_Name', 'INT', 'input', '', '100', '1', '29', '1', 'id', 'shops', 'Name');
INSERT INTO `modules_fileds` VALUES ('54', 'Address', 'VARCHAR', 'input', '', '255', '0', '29', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('55', 'Bill_NO', 'INT', 'input', '', '100', '1', '29', '1', 'id', 'billing', 'id');
INSERT INTO `modules_fileds` VALUES ('56', 'Cheq_Amount', 'INT', 'input', '', '100', '1', '29', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('57', 'Cheque_Date', 'DATE', 'input', '', '100', '1', '29', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('58', 'Party_Bank', 'VARCHAR', 'input', '', '100', '1', '29', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('59', 'Party_Name', 'INT', 'input', '', '100', '1', '29', '1', 'id', 'shops', 'Name');
INSERT INTO `modules_fileds` VALUES ('60', 'Address', 'VARCHAR', 'input', '', '255', '0', '29', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('61', 'Bill_NO', 'INT', 'input', '', '100', '1', '29', '1', 'id', 'billing', 'id');
INSERT INTO `modules_fileds` VALUES ('62', 'Cheq_Amount', 'INT', 'input', '', '100', '1', '29', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('63', 'Cheque_Date', 'DATE', 'input', '', '100', '1', '29', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('64', 'Party_Bank', 'VARCHAR', 'input', '', '100', '1', '29', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('65', 'Name', 'VARCHAR', 'input', '', '255', '1', '31', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('66', 'Salesmen', 'INT', 'input', '', '11', '1', '31', '1', 'id', 'salesmen', 'Name');
INSERT INTO `modules_fileds` VALUES ('67', 'Date', 'DATE', 'input', '', '100', '1', '31', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('68', 'Amount', 'VARCHAR', 'input', '', '100', '1', '31', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('69', 'Type', 'VARCHAR', 'select', 'Add,Subtract ', '100', '1', '31', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('70', 'Party_Name', 'INT', 'input', '', '11', '1', '34', '1', 'id', 'shops', 'Name');
INSERT INTO `modules_fileds` VALUES ('71', 'Address', 'VARCHAR', 'input', '', '255', '1', '34', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('72', 'Bill_NO', 'INT', 'input', '', '11', '1', '34', '1', 'id', 'billing', 'id');
INSERT INTO `modules_fileds` VALUES ('73', 'Net_Amount', 'VARCHAR', 'input', '', '100', '1', '34', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('74', 'Signed_Amount', 'VARCHAR', 'input', '', '100', '1', '34', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('75', 'Due_Date', 'DATE', 'input', '', '100', '1', '34', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('76', 'Party_Name', 'INT', 'input', '', '11', '1', '35', '1', 'id', 'shops', 'Name');
INSERT INTO `modules_fileds` VALUES ('77', 'Address', 'VARCHAR', 'input', '', '255', '1', '35', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('78', 'Bill_NO', 'INT', 'input', '', '11', '1', '35', '1', 'id', 'billing', 'id');
INSERT INTO `modules_fileds` VALUES ('79', 'Rcvd_Amount', 'VARCHAR', 'input', '', '100', '1', '35', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('80', 'Cheque_NO', 'VARCHAR', 'input', '', '100', '0', '35', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('81', 'Chaque_Date_', 'DATE', 'input', '', '100', '0', '35', '0', null, null, null);
INSERT INTO `modules_fileds` VALUES ('82', 'Party_Bank', 'VARCHAR', 'input', '', '255', '0', '35', '0', null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=432 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of permission
-- ----------------------------
INSERT INTO `permission` VALUES ('223', '2', '2', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('224', '3', '2', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('225', '5', '2', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('226', '7', '2', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('227', '19', '2', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('228', '20', '2', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('229', '21', '2', '0', '1', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('230', '22', '2', '0', '1', '0', '0', '0', '0', '0');
INSERT INTO `permission` VALUES ('412', '2', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('413', '3', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('414', '5', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('415', '7', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('416', '19', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('417', '20', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('418', '21', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('419', '22', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('420', '23', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('421', '24', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('422', '26', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('423', '27', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('424', '28', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('425', '29', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('426', '30', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('427', '31', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('428', '32', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('429', '33', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('430', '34', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permission` VALUES ('431', '35', '2', '1', '1', '1', '1', '1', '1', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', 'first product', '1', 'fp', '43', '10', '4', 'asdf', 'asdf', '15', '2', '2019-05-31 02:31:16');
INSERT INTO `product` VALUES ('2', 'New product', '3', 'np', '100', '10', '20', '', 'carton', '200', '2', '2019-06-12 02:57:27');
INSERT INTO `product` VALUES ('3', 'New Product 2', '3', 'np2', '200', '15', '25', '', 'carton', '100', '2', '2019-06-12 02:58:22');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of purchase
-- ----------------------------
INSERT INTO `purchase` VALUES ('12', '1', '2', '2019-05-24 03:56:14');
INSERT INTO `purchase` VALUES ('23', '1', '2', '2019-05-31 02:31:15');

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
  `total` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_id` (`purchase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of purchase_details
-- ----------------------------
INSERT INTO `purchase_details` VALUES ('2', '12', '1', '4', '10', '40', '1', '40');
INSERT INTO `purchase_details` VALUES ('3', '12', '1', '3', '10', '30', '4', '29');
INSERT INTO `purchase_details` VALUES ('8', '19', '1', '5', '10', '50', '1', '49.5');
INSERT INTO `purchase_details` VALUES ('9', '20', '1', '5', '10', '50', '1', '49.5');
INSERT INTO `purchase_details` VALUES ('10', '21', '1', '5', '10', '50', '1', '49.5');
INSERT INTO `purchase_details` VALUES ('11', '22', '1', '5', '10', '50', '1', '49.5');
INSERT INTO `purchase_details` VALUES ('12', '23', '1', '5', '10', '50', '1', '49.5');

-- ----------------------------
-- Table structure for `recovery`
-- ----------------------------
DROP TABLE IF EXISTS `recovery`;
CREATE TABLE `recovery` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Party_Name` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Bill_NO` int(11) NOT NULL,
  `Rcvd_Amount` varchar(100) NOT NULL,
  `Cheque_NO` varchar(100) DEFAULT NULL,
  `Chaque_Date_` date DEFAULT NULL,
  `Party_Bank` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of recovery
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of salesmen
-- ----------------------------
INSERT INTO `salesmen` VALUES ('1', 'Sales men test 1', 'smt1', '098765432', '2', '2019-06-12 02:10:31');
INSERT INTO `salesmen` VALUES ('2', 'sales men new', 'smn', '12345', '2', '2019-06-12 03:07:40');

-- ----------------------------
-- Table structure for `salesreturn`
-- ----------------------------
DROP TABLE IF EXISTS `salesreturn`;
CREATE TABLE `salesreturn` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of salesreturn
-- ----------------------------
INSERT INTO `salesreturn` VALUES ('1', '1', '1', '1', '1', '12', '1', '8', '1', '4', '7.92', '2', '2019-06-12 01:47:44');
INSERT INTO `salesreturn` VALUES ('2', '1', '1', '1', '1', '2', '3', '20', '2', '4', '19.60', '2', '2019-06-12 01:32:22');

-- ----------------------------
-- Table structure for `sales_men_entries`
-- ----------------------------
DROP TABLE IF EXISTS `sales_men_entries`;
CREATE TABLE `sales_men_entries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Salesmen` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sales_men_entries
-- ----------------------------

-- ----------------------------
-- Table structure for `shops`
-- ----------------------------
DROP TABLE IF EXISTS `shops`;
CREATE TABLE `shops` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Code` varchar(100) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Booker` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shops
-- ----------------------------
INSERT INTO `shops` VALUES ('1', '123', 'Test Shop', 'Garden', 'testing', '1', '2', '2019-05-29 01:41:12');

-- ----------------------------
-- Table structure for `sign_bills`
-- ----------------------------
DROP TABLE IF EXISTS `sign_bills`;
CREATE TABLE `sign_bills` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Party_Name` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Bill_NO` int(11) NOT NULL,
  `Net_Amount` varchar(100) NOT NULL,
  `Signed_Amount` varchar(100) NOT NULL,
  `Due_Date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sign_bills
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_type
-- ----------------------------
INSERT INTO `user_type` VALUES ('1', 'admin', '2');
