/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50712
Source Host           : localhost:3306
Source Database       : phpad

Target Server Type    : MYSQL
Target Server Version : 50712
File Encoding         : 65001

Date: 2016-09-15 21:17:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ad_books`
-- ----------------------------
DROP TABLE IF EXISTS `ad_books`;
CREATE TABLE `ad_books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `corp_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '平台名称',
  `task_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '项目名称',
  `template_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `corp_id` int(11) DEFAULT '0' COMMENT '有公司值为网站提供平台，空值为其它平台',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '投资金额',
  `start_time` int(11) DEFAULT '0' COMMENT '起息日期',
  `rate` decimal(10,2) DEFAULT '0.00' COMMENT '利率',
  `rate_unit` enum('月','年') COLLATE utf8_unicode_ci DEFAULT '年' COMMENT '利率单位',
  `term` smallint(8) DEFAULT '0' COMMENT '期限',
  `term_unit` enum('日','月') COLLATE utf8_unicode_ci DEFAULT '月' COMMENT '期限单位',
  `repay` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '还款方式',
  `back_reward` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '返现奖励',
  `discount_reward` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '折扣奖励',
  `manage_fee` decimal(10,2) DEFAULT '0.00' COMMENT '管理费用比率',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_books
-- ----------------------------
