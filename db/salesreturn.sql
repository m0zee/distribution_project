/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : distribution_project

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-06-12 01:48:37
*/

SET FOREIGN_KEY_CHECKS=0;

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
