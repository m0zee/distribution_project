/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : distribution_project

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-06-11 03:53:59
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
  `product` int(11) DEFAULT NULL,
  `fresh_qty` int(11) DEFAULT NULL,
  `damage_qty` int(11) DEFAULT NULL,
  `discount_amount` int(10) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of salesreturn
-- ----------------------------
