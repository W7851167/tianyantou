/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50712
Source Host           : localhost:3306
Source Database       : phpad

Target Server Type    : MYSQL
Target Server Version : 50712
File Encoding         : 65001

Date: 2016-09-16 22:11:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ad_messages`
-- ----------------------------
DROP TABLE IF EXISTS `ad_messages`;
CREATE TABLE `ad_messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) DEFAULT '0' COMMENT '发送人ID',
  `owner_id` int(11) DEFAULT '0' COMMENT '接收人Id',
  `type` tinyint(1) DEFAULT '0' COMMENT '0、Global全局消息 1、Private 私有消息(一对一消息)\r\n\r\n全局消息类似于公告\r\n一般我们使用的是私有消息，如果是系统发送的私有消息，sender_id为0',
  `priority` tinyint(1) DEFAULT '0' COMMENT '消息等级，等级越高越靠前',
  `title` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '消息标题',
  `body` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '消息体',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '0',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_messages
-- ----------------------------
