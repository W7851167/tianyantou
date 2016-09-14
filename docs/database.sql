/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50712
Source Host           : localhost:3306
Source Database       : phpad

Target Server Type    : MYSQL
Target Server Version : 50712
File Encoding         : 65001

Date: 2016-09-14 21:40:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ad_advs`
-- ----------------------------
DROP TABLE IF EXISTS `ad_advs`;
CREATE TABLE `ad_advs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '广告介绍',
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'url地址',
  `sorts` int(11) DEFAULT '0' COMMENT '排序方式',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_advs
-- ----------------------------
INSERT INTO `ad_advs` VALUES ('1', '', 'http://www.baidu.com', '0', '2016-09-13 22:26:15', '2016-09-13 22:26:15', null);

-- ----------------------------
-- Table structure for `ad_articles`
-- ----------------------------
DROP TABLE IF EXISTS `ad_articles`;
CREATE TABLE `ad_articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '当前时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_articles
-- ----------------------------
INSERT INTO `ad_articles` VALUES ('1', '1', 'App\\Models\\CorpModel', '<p>中国人的东西就是好用啊sdsfdsfdsfdsf sfsdfdsfs</p>', '2016-09-10 16:34:04', '2016-09-10 16:34:04', null);
INSERT INTO `ad_articles` VALUES ('4', '2', 'App\\Models\\CorpModel', '<p>jhjkhjk jjhjjk</p>', '2016-09-10 16:36:04', null, null);
INSERT INTO `ad_articles` VALUES ('5', '2', 'App\\Models\\NewModel', '<p>31231232131</p>', '2016-09-10 22:16:52', null, null);
INSERT INTO `ad_articles` VALUES ('6', '3', 'App\\Models\\NewModel', '<p>13212312321</p>', '2016-09-10 22:18:53', null, null);
INSERT INTO `ad_articles` VALUES ('7', '4', 'App\\Models\\NewModel', '<p>13212312321</p>', '2016-09-10 22:45:17', '2016-09-10 22:45:17', '2016-09-10 22:45:17');
INSERT INTO `ad_articles` VALUES ('11', '1', 'App\\Models\\NewModel', '<p>31231232131</p>', '2016-09-10 22:51:34', '2016-09-10 22:51:34', null);
INSERT INTO `ad_articles` VALUES ('12', '9', 'App\\Models\\NewModel', '<p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">亲爱的天眼哥：</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 2em; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">根据《国务院办公厅关于2016年部分节假日安排的通知》，投之家2016年中秋节放假值班安排如下：</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 2em; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">1. 2016年9月15日至9月17日期间3天连休，2016年9月18日（星期日）恢复正常上班；假期客服服务时间不变，为10:00-18:00；</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 2em; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">2. 节日期间不处理提现，9月14日13:30之后的提现，将于9月18日（工作日）处理；</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 2em; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">3. 假期中，用户的充值、回款等投资服务均可正常进行；每日专享债权的供应时间为：10:18和14:18。</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 2em; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">请提前做好安排，预祝大家中秋快乐。如有疑问，请致电服务热线或咨询在线客服。</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 2em; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">特此公告，请知悉！</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-align: right; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">天眼投运营团队</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-align: right; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">2016/09/13</span></p><p><br/></p>', '2016-09-13 22:45:10', null, null);
INSERT INTO `ad_articles` VALUES ('13', '10', 'App\\Models\\NewModel', '<p>选择公司信息</p>', '2016-09-13 23:26:24', null, null);
INSERT INTO `ad_articles` VALUES ('14', '11', 'App\\Models\\NewModel', '<p>1231231</p>', '2016-09-13 23:31:40', null, null);

-- ----------------------------
-- Table structure for `ad_banks`
-- ----------------------------
DROP TABLE IF EXISTS `ad_banks`;
CREATE TABLE `ad_banks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `hold_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '开户名/或支付宝名称',
  `bank_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '开户行名称',
  `type` tinyint(1) DEFAULT '0' COMMENT '0、银行卡信息 1、支付宝',
  `province` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '省',
  `city` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '市',
  `branch_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '支行名称',
  `cardno` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '卡号',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_banks
-- ----------------------------
INSERT INTO `ad_banks` VALUES ('1', '2', '老朱', '招商银行', '0', '北京市', '北京市', '通州区分账', '1123123131231', '2016-09-11 00:26:04', null);

-- ----------------------------
-- Table structure for `ad_categorys`
-- ----------------------------
DROP TABLE IF EXISTS `ad_categorys`;
CREATE TABLE `ad_categorys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '类型主键',
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '分类名称',
  `theme` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0、列表 1、单页面',
  `is_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0、非系统 1、系统',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父级',
  `page` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '访问url页面',
  `iconfont` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_categorys
-- ----------------------------
INSERT INTO `ad_categorys` VALUES ('1', '公司简介', '1', '1', '0', 'company', '&#xe61f;', '2016-09-12 21:13:11', null, null);
INSERT INTO `ad_categorys` VALUES ('2', '月度报告', '4', '1', '0', 'monthly', '&#xe62c;', '2016-09-12 21:13:23', null, null);
INSERT INTO `ad_categorys` VALUES ('3', '专家顾问', '0', '1', '0', 'consultant', '&#xe623;', '2016-09-12 21:14:18', null, null);
INSERT INTO `ad_categorys` VALUES ('4', '媒体报道', '0', '1', '0', 'media', '&#xe612;', '2016-09-12 21:14:28', null, null);
INSERT INTO `ad_categorys` VALUES ('5', '团队介绍', '1', '1', '0', 'team', '&#xe609;', '2016-09-12 21:14:39', null, null);
INSERT INTO `ad_categorys` VALUES ('6', 'T盾计划', '1', '1', '0', 'plan', '&#xe62a;', '2016-09-12 21:14:49', null, null);
INSERT INTO `ad_categorys` VALUES ('7', '帮助中心', '2', '1', '0', 'help', '&#xe629;', '2016-09-12 21:14:57', null, null);
INSERT INTO `ad_categorys` VALUES ('8', '安全评级', '1', '1', '0', 'safety', '&#xe626;', '2016-09-12 21:15:06', null, null);
INSERT INTO `ad_categorys` VALUES ('9', '招贤纳士', '1', '1', '0', 'career', '&#xe620;', '2016-09-12 21:15:14', null, null);
INSERT INTO `ad_categorys` VALUES ('10', '网站公告', '3', '1', '0', 'notice', '&#xe624;', '2016-09-12 21:15:29', null, null);
INSERT INTO `ad_categorys` VALUES ('11', '最新动态', '0', '1', '0', 'latest', '&#xe622;', '2016-09-12 21:15:42', null, null);
INSERT INTO `ad_categorys` VALUES ('12', '投资攻略', '0', '1', '0', 'strategy', '&#xe63d;', '2016-09-12 21:15:43', null, null);
INSERT INTO `ad_categorys` VALUES ('13', '行业动态', '0', '1', '0', 'dynamic', '&#xe653;', '2016-09-12 21:15:50', null, null);
INSERT INTO `ad_categorys` VALUES ('14', '大事记', '3', '1', '0', 'events', '&#xe696;', '2016-09-12 21:15:56', null, null);
INSERT INTO `ad_categorys` VALUES ('15', '活动展示', '0', '1', '0', 'activity', '&#xe697;', '2016-09-12 21:16:03', null, null);
INSERT INTO `ad_categorys` VALUES ('16', '联系我们', '1', '1', '0', 'contact', '&#xe60a;', '2016-09-12 21:16:09', null, null);
INSERT INTO `ad_categorys` VALUES ('17', '流程类说明', '0', '1', '7', null, null, '2016-09-09 11:13:11', null, null);
INSERT INTO `ad_categorys` VALUES ('18', '平台说明', '0', '1', '7', null, null, '2016-09-09 11:13:28', null, null);
INSERT INTO `ad_categorys` VALUES ('19', '充值提现说明', '0', '1', '7', null, null, '2016-09-09 11:13:44', null, null);
INSERT INTO `ad_categorys` VALUES ('20', '账户类说明', '0', '1', '7', null, null, '2016-09-09 11:14:07', null, null);
INSERT INTO `ad_categorys` VALUES ('21', '其它说明', '0', '1', '7', null, null, '2016-09-09 11:14:25', null, null);

-- ----------------------------
-- Table structure for `ad_corp_terms`
-- ----------------------------
DROP TABLE IF EXISTS `ad_corp_terms`;
CREATE TABLE `ad_corp_terms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `corp_id` int(11) NOT NULL DEFAULT '0' COMMENT '公司信息',
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '姓名',
  `position` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '职称',
  `intro` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '描述信息',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_corp_terms
-- ----------------------------
INSERT INTO `ad_corp_terms` VALUES ('2', '1', '力量', 'CTO', '师傅师傅说分手的水电费师傅的说法', '2016-09-10 18:14:12', '2016-09-10 18:14:12', '2016-09-10 18:14:12');
INSERT INTO `ad_corp_terms` VALUES ('3', '1', '李亮', 'CEO', '非常牛逼的人啊', '2016-09-10 18:14:50', '2016-09-10 18:14:50', null);
INSERT INTO `ad_corp_terms` VALUES ('4', '2', 'qqq', 'qqq', 'qqq', '2016-09-10 22:56:46', null, null);

-- ----------------------------
-- Table structure for `ad_corps`
-- ----------------------------
DROP TABLE IF EXISTS `ad_corps`;
CREATE TABLE `ad_corps` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `platform` char(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '平台名称',
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '公司名称',
  `platform_logo` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '平台logo',
  `logo` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '图标地址',
  `ad_logo` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '广告图片',
  `min_yield` decimal(10,2) DEFAULT '0.00' COMMENT '年收益最小值',
  `max_yield` decimal(10,2) DEFAULT '0.00' COMMENT '年收益最大值',
  `capital` char(15) COLLATE utf8_unicode_ci NOT NULL COMMENT '注册金额',
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '法人代表',
  `province` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '所在省',
  `city` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '所在区域',
  `county` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '区',
  `status` tinyint(1) DEFAULT '1' COMMENT '1、正常 0、暂停',
  `online` date NOT NULL COMMENT '上线时间',
  `address` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT '公司地址',
  `pattern` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '担保方式',
  `assure` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '担保机构',
  `level` varchar(100) COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '等级',
  `limit` tinyint(1) DEFAULT '0' COMMENT '交任务的数量数',
  `sorts` int(11) DEFAULT '0' COMMENT '排序',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除操作',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_corps
-- ----------------------------
INSERT INTO `ad_corps` VALUES ('1', '陆金所', '陆金所', '/uploads/imgs/2016-09-11/19560/57d5618793b90.jpg', '/uploads/imgs/2016-09-11/180180/57d5618e78cb7.jpg', '/uploads/imgs/2016-09-13/294129/57d8182ff0cfc.jpg', null, '0.00', '5000', '老朱', '福建省', '三明市', '古镛镇', '1', '2015-06-20', '俩来吧', 'T+1', '平安保险', 'AAA', '1', '0', '2016-09-14 14:01:36', '2016-09-14 14:01:36', null);
INSERT INTO `ad_corps` VALUES ('2', '111', '2222', '/uploads/imgs/2016-09-11/19560/57d561770cb89.jpg', '/uploads/imgs/2016-09-11/180180/57d5617d212b5.jpg', '/uploads/imgs/2016-09-13/294129/57d81821277c4.jpg', '0.00', '0.00', '2000万元', '1111', '河北省', '唐山市', '丰润区', '1', '2016-09-09', '111111', 'T+1', '平安保险', 'A', '0', '0', '2016-09-13 23:15:47', '2016-09-13 23:15:47', null);
INSERT INTO `ad_corps` VALUES ('3', 'e融所', 'e融所p2p管理公司', '/uploads/imgs/2016-09-11/19560/57d52d6e7b39a.jpg', '/uploads/imgs/2016-09-11/180180/57d52d72377b4.jpg', '/uploads/imgs/2016-09-13/294129/57d817e2a0874.jpg', '0.00', '0.00', '5000', '老朱', '天津市', '天津市', '南开区', '1', '2016-09-09', '河西区八里台', 'T+1', '平安保险', 'AA', '0', '0', '2016-09-13 23:14:44', '2016-09-13 23:14:44', null);

-- ----------------------------
-- Table structure for `ad_images`
-- ----------------------------
DROP TABLE IF EXISTS `ad_images`;
CREATE TABLE `ad_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '图片ID',
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片地址名称',
  `item_id` int(11) NOT NULL,
  `item_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片类型',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '当前时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_images
-- ----------------------------
INSERT INTO `ad_images` VALUES ('1', '1111', '1', 'App\\Models\\UserModel', '2016-09-07 18:24:45', null, null);
INSERT INTO `ad_images` VALUES ('2', '/logo/2016-09-10/188223/57d3d9c74d148.jpg', '1', 'App\\Models\\CorpTermModel', '2016-09-10 18:13:32', '2016-09-10 18:13:32', '2016-09-10 18:13:32');
INSERT INTO `ad_images` VALUES ('3', '/logo/2016-09-10/188223/57d3d93516a9a.jpg', '2', 'App\\Models\\CorpTermModel', '2016-09-10 18:14:12', '2016-09-10 18:14:12', '2016-09-10 18:14:12');
INSERT INTO `ad_images` VALUES ('4', '/logo/2016-09-10/188223/57d3dd02ba0d6.jpg', '3', 'App\\Models\\CorpTermModel', '2016-09-10 18:14:33', '2016-09-10 18:14:33', null);
INSERT INTO `ad_images` VALUES ('5', '/imgs/2016-09-10/184125/57d415d05e79e.jpg', '2', 'App\\Models\\NewModel', '2016-09-10 22:17:38', null, null);
INSERT INTO `ad_images` VALUES ('6', '/imgs/2016-09-10/184125/57d41e3ca29bf.jpg', '3', 'App\\Models\\NewModel', '2016-09-10 22:52:45', '2016-09-10 22:52:45', null);
INSERT INTO `ad_images` VALUES ('7', '/imgs/2016-09-10/184125/57d416920ba3d.jpg', '4', 'App\\Models\\NewModel', '2016-09-10 22:45:17', '2016-09-10 22:45:17', '2016-09-10 22:45:17');
INSERT INTO `ad_images` VALUES ('8', '/imgs/2016-09-10/184125/57d4169d4ca1f.jpg', '5', 'App\\Models\\NewModel', '2016-09-10 22:44:30', '2016-09-10 22:44:30', '2016-09-10 22:44:30');
INSERT INTO `ad_images` VALUES ('11', '/imgs/2016-09-10/184125/57d419982577d.jpg', '8', 'App\\Models\\NewModel', '2016-09-10 22:42:43', '2016-09-10 22:42:43', '2016-09-10 22:42:43');
INSERT INTO `ad_images` VALUES ('12', '/imgs/2016-09-10/184125/57d41b11b1a44.jpg', '1', 'App\\Models\\NewModel', '2016-09-10 22:43:11', '2016-09-10 22:43:11', '2016-09-10 22:43:11');
INSERT INTO `ad_images` VALUES ('13', '/uploads/logo/2016-09-11/24282/57d561cb0dd49.jpg', '1', 'App\\Models\\NewModel', '2016-09-11 21:53:17', '2016-09-11 21:53:17', null);
INSERT INTO `ad_images` VALUES ('23', '/imgs/2016-09-10/188223/57d421af0f1e6.jpg', '0', '', '2016-09-10 23:08:23', '2016-09-10 23:08:23', null);
INSERT INTO `ad_images` VALUES ('24', '/imgs/2016-09-10/188223/57d42266d431b.jpg', '0', '', '2016-09-10 23:10:33', '2016-09-10 23:10:33', null);
INSERT INTO `ad_images` VALUES ('25', '/imgs/2016-09-10/188223/57d422853db40.jpg', '4', 'App\\Models\\CorpTermModel', '2016-09-10 23:14:24', null, null);
INSERT INTO `ad_images` VALUES ('26', '/uploads/imgs/2016-09-13/1349246/57d80a85bb150.jpg', '1', 'App\\Models\\AdvModel', '2016-09-13 22:17:43', null, null);
INSERT INTO `ad_images` VALUES ('27', '/uploads/logo/2016-09-13/24282/57d81b0ff0e38.jpg', '10', 'App\\Models\\NewModel', '2016-09-13 23:28:19', '2016-09-13 23:28:19', null);
INSERT INTO `ad_images` VALUES ('28', '/uploads/imgs/2016-09-13/184125/57d81b6dadf51.jpg', '11', 'App\\Models\\NewModel', '2016-09-13 23:31:40', null, null);
INSERT INTO `ad_images` VALUES ('29', '/uploads/imgs/2016-09-14/294129/57d8e4186467e.jpg', '8', 'App\\Models\\TaskModel', '2016-09-14 13:46:02', null, null);

-- ----------------------------
-- Table structure for `ad_links`
-- ----------------------------
DROP TABLE IF EXISTS `ad_links`;
CREATE TABLE `ad_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '友情链接名称',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '跳转地址',
  `sorts` int(11) DEFAULT '0' COMMENT '排序',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_links
-- ----------------------------
INSERT INTO `ad_links` VALUES ('1', '百度', 'http://www.baidu.com', '1', '2016-09-14 21:27:26', null, null);
INSERT INTO `ad_links` VALUES ('2', '新浪', 'http://www.baidu.com', '0', '2016-09-14 21:27:41', null, null);
INSERT INTO `ad_links` VALUES ('3', '234324', '234243', '0', '2016-09-14 21:27:45', null, null);
INSERT INTO `ad_links` VALUES ('4', '2342', '2342342', '0', '2016-09-14 21:27:49', null, null);
INSERT INTO `ad_links` VALUES ('5', '234324234', '23424324', '0', '2016-09-14 21:27:53', null, null);

-- ----------------------------
-- Table structure for `ad_metas`
-- ----------------------------
DROP TABLE IF EXISTS `ad_metas`;
CREATE TABLE `ad_metas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '类型名称',
  `meta_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '数据表字段名称',
  `meta_value` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_metas
-- ----------------------------
INSERT INTO `ad_metas` VALUES ('18', '1', 'App\\Models\\CorpModel', 'icp_domain', 's:9:\"baidu.com\";');
INSERT INTO `ad_metas` VALUES ('19', '1', 'App\\Models\\CorpModel', 'icp_corp_type', 's:6:\"企业\";');
INSERT INTO `ad_metas` VALUES ('20', '1', 'App\\Models\\CorpModel', 'icp_time', 's:9:\"2016-9-16\";');
INSERT INTO `ad_metas` VALUES ('21', '1', 'App\\Models\\CorpModel', 'icp_corp_name', 's:17:\"我要的公司11\";');
INSERT INTO `ad_metas` VALUES ('22', '1', 'App\\Models\\CorpModel', 'icp_no', 's:12:\"内容迭代\";');
INSERT INTO `ad_metas` VALUES ('25', '1', 'App\\Models\\CorpModel', 'id', 's:1:\"1\";');
INSERT INTO `ad_metas` VALUES ('30', '1', 'App\\Models\\CorpModel', 'credentials', 'a:6:{i:0;s:61:\"http://img.phpad.net/logo/2016-09-10/206154/57d3fc7e13812.jpg\";i:1;s:61:\"http://img.phpad.net/logo/2016-09-10/206154/57d3fc7e61e5d.jpg\";i:2;s:61:\"http://img.phpad.net/logo/2016-09-10/206154/57d3fc7e941c4.jpg\";i:3;s:61:\"http://img.phpad.net/logo/2016-09-10/206154/57d3fc7ec68b2.jpg\";i:4;s:61:\"http://img.phpad.net/logo/2016-09-10/206154/57d3fc7f043c1.jpg\";i:5;s:61:\"http://img.phpad.net/logo/2016-09-10/206154/57d3fc7f37e65.jpg\";}');
INSERT INTO `ad_metas` VALUES ('31', '1', 'App\\Models\\CorpModel', 'office_address', 'a:6:{i:0;s:61:\"http://img.phpad.net/logo/2016-09-10/206154/57d3fc8815223.jpg\";i:1;s:61:\"http://img.phpad.net/logo/2016-09-10/206154/57d3fc8848295.jpg\";i:2;s:61:\"http://img.phpad.net/logo/2016-09-10/206154/57d3fc8882110.jpg\";i:3;s:61:\"http://img.phpad.net/logo/2016-09-10/206154/57d3fc88e64d4.jpg\";i:4;s:61:\"http://img.phpad.net/logo/2016-09-10/206154/57d3fc892167e.jpg\";i:5;s:61:\"http://img.phpad.net/logo/2016-09-10/206154/57d3fc89605a6.jpg\";}');
INSERT INTO `ad_metas` VALUES ('32', '2', 'App\\Models\\CorpModel', 'id', 's:1:\"2\";');
INSERT INTO `ad_metas` VALUES ('33', '2', 'App\\Models\\CorpModel', 'credentials', 'a:1:{i:0;s:61:\"http://img.phpad.net/imgs/2016-09-10/206154/57d411161f6ab.jpg\";}');

-- ----------------------------
-- Table structure for `ad_moneys`
-- ----------------------------
DROP TABLE IF EXISTS `ad_moneys`;
CREATE TABLE `ad_moneys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户信息',
  `total` decimal(10,2) DEFAULT '0.00' COMMENT '总资产',
  `rebate` decimal(10,2) DEFAULT '0.00' COMMENT '冻结返利',
  `withdraw` decimal(10,2) DEFAULT '0.00' COMMENT '提现冻结',
  `money` decimal(10,2) DEFAULT '0.00' COMMENT '可用金额',
  `score` int(11) DEFAULT '0' COMMENT '积分',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_moneys
-- ----------------------------
INSERT INTO `ad_moneys` VALUES ('1', '2', '0.00', '0.00', '0.00', '100.00', '4450', '2016-09-11 21:23:44', '2016-09-11 21:23:44');

-- ----------------------------
-- Table structure for `ad_news`
-- ----------------------------
DROP TABLE IF EXISTS `ad_news`;
CREATE TABLE `ad_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '发布人员',
  `category_id` int(11) NOT NULL DEFAULT '0' COMMENT '分类ID',
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '资讯主题',
  `corp_id` int(11) DEFAULT '0' COMMENT '公司信息',
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '描述信息',
  `views` int(11) DEFAULT '0' COMMENT '浏览数',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_news
-- ----------------------------
INSERT INTO `ad_news` VALUES ('1', '1', '13', '321312', '2', '12313', '11', '2016-09-11 21:53:17', '2016-09-11 21:53:17', null);
INSERT INTO `ad_news` VALUES ('2', '0', '13', '客户案例0627', '2', ' 123123123 ', '0', '2016-09-10 22:51:34', '2016-09-10 22:51:34', null);
INSERT INTO `ad_news` VALUES ('3', '0', '12', '测试内容详情', '2', '7大支持内容啊   ', '0', '2016-09-13 23:34:48', '2016-09-10 22:52:45', null);
INSERT INTO `ad_news` VALUES ('4', '0', '13', '12312221321', '2', ' 13213123 23442342', '0', '2016-09-10 22:45:17', '2016-09-10 22:45:17', '2016-09-10 22:45:17');
INSERT INTO `ad_news` VALUES ('9', '0', '10', '佳节将至，请留意中秋值班安排', '0', null, '0', '2016-09-13 22:46:16', null, null);
INSERT INTO `ad_news` VALUES ('10', '1', '11', '最新动态内容', '3', '文章描述水电费等所发生的分手大师', '0', '2016-09-13 23:29:28', '2016-09-13 23:29:28', null);
INSERT INTO `ad_news` VALUES ('11', '0', '13', '111111123', '3', ' 132123123', '0', '2016-09-13 23:31:40', null, null);

-- ----------------------------
-- Table structure for `ad_scores`
-- ----------------------------
DROP TABLE IF EXISTS `ad_scores`;
CREATE TABLE `ad_scores` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '获取积分数目',
  `intro` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '获取积分说明',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_scores
-- ----------------------------
INSERT INTO `ad_scores` VALUES ('1', '2', '2', '赠送积分', '2016-09-11 00:03:04', '2016-09-11 00:03:04');
INSERT INTO `ad_scores` VALUES ('2', '2', '4', '增加积分', '2016-09-11 13:51:31', '2016-09-11 13:51:31');
INSERT INTO `ad_scores` VALUES ('3', '2', '4444', '1', '2016-09-11 14:12:09', '2016-09-11 14:12:09');

-- ----------------------------
-- Table structure for `ad_task_achieves`
-- ----------------------------
DROP TABLE IF EXISTS `ad_task_achieves`;
CREATE TABLE `ad_task_achieves` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL DEFAULT '0' COMMENT '任务ID',
  `receive_id` int(11) NOT NULL DEFAULT '0' COMMENT '领取ID',
  `order_sn` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '订单ID',
  `realname` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '真实用户名',
  `mobile` char(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '手机号码',
  `price` decimal(10,2) DEFAULT '0.00' COMMENT '投资金额',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_task_achieves
-- ----------------------------
INSERT INTO `ad_task_achieves` VALUES ('1', '3', '2', '123123', '朱希顺', '1352208010', '11000.00', '2016-09-11 20:23:54', null);
INSERT INTO `ad_task_achieves` VALUES ('2', '3', '2', '123123', '老朱', '18611570121', '2000.00', '2016-09-11 20:41:47', null);

-- ----------------------------
-- Table structure for `ad_task_receives`
-- ----------------------------
DROP TABLE IF EXISTS `ad_task_receives`;
CREATE TABLE `ad_task_receives` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `corp_id` int(11) NOT NULL DEFAULT '0' COMMENT '平台ID',
  `task_id` int(11) NOT NULL DEFAULT '0' COMMENT '任务ID',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '领取人ID',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0、领取 2、已交任务 1、已审核 3、驳回',
  `total` decimal(10,2) DEFAULT '0.00' COMMENT '完成总额',
  `intro` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '说明',
  `create_time` int(11) DEFAULT '0' COMMENT '领取任务时间',
  `commit_time` int(11) DEFAULT '0' COMMENT '提交任务时间',
  `complete_time` int(11) DEFAULT '0' COMMENT '审核时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_task_receives
-- ----------------------------
INSERT INTO `ad_task_receives` VALUES ('2', '3', '3', '2', '1', '100.00', null, '0', '0', '0');

-- ----------------------------
-- Table structure for `ad_tasks`
-- ----------------------------
DROP TABLE IF EXISTS `ad_tasks`;
CREATE TABLE `ad_tasks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `corp_id` int(11) NOT NULL DEFAULT '0' COMMENT '公司信息',
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '标总额',
  `ratio` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '年转化率',
  `status` tinyint(1) DEFAULT '0' COMMENT '0、待上线 1、正常 2、停止',
  `mratio` decimal(10,2) DEFAULT '0.00' COMMENT '本网站转化率',
  `term` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '期限',
  `sued` decimal(10,2) DEFAULT '0.00' COMMENT '起诉金额',
  `ensure` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '保障方式',
  `repay` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '还款方式',
  `sorts` int(11) DEFAULT '0' COMMENT '排序',
  `accrual` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '计息方式(T+0到账\\T+1到账)',
  `limit` decimal(10,2) DEFAULT '0.00' COMMENT '投标限额(元)',
  `nums` int(11) DEFAULT '0' COMMENT '库存数量',
  `position` tinyint(1) DEFAULT '0' COMMENT '展示位置 0、普通展示 1、首页展示',
  `home_img` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '首页展示图片',
  `start_time` int(11) DEFAULT '0' COMMENT '开始时间',
  `end_time` int(11) DEFAULT NULL COMMENT '结束时间',
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '跳转地址 ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '当前时间',
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_tasks
-- ----------------------------
INSERT INTO `ad_tasks` VALUES ('2', '3', '12313213', '0.00', '0.00', '0', '0.00', '0', '0.00', '0', '0', '0', '0', '0.00', '0', '0', null, '0', null, '', '2016-09-10 16:49:51', '2016-09-10 16:49:51', '2016-09-10 16:49:51');
INSERT INTO `ad_tasks` VALUES ('3', '3', 'aaasdf', '111111.00', '1111.00', '1', '111.00', '111', '11.00', '111', '111', '0', '111', '1000.00', '0', '0', null, '0', null, '', '2016-09-10 16:54:11', '2016-09-10 16:54:11', null);
INSERT INTO `ad_tasks` VALUES ('4', '3', '测试页面', '10000000.00', '12.22', '0', '3.40', '20', '200.00', '112313', '123123', '0', '1231232', '1000.00', '0', '0', null, '0', null, '', '2016-09-10 16:10:26', '2016-09-10 16:10:26', null);
INSERT INTO `ad_tasks` VALUES ('5', '1', '测试页面', '1111111.00', '22.00', '1', '111.00', '11', '1111.00', '112313', '11', '0', '111', '111.00', '0', '0', null, '0', null, '', '2016-09-09 23:21:20', null, null);
INSERT INTO `ad_tasks` VALUES ('6', '1', '12312313', '112313.00', '123123.00', '1', '1231.00', '123123', '1321321.00', '123213', '1321', '0', '123123', '123213.00', '0', '0', null, '0', null, '', '2016-09-10 16:53:20', null, null);
INSERT INTO `ad_tasks` VALUES ('7', '1', '12312313', '112313.00', '123123.00', '1', '1231.00', '123123', '1321321.00', '123213', '1321', '0', '123123', '123213.00', '0', '0', null, '0', null, '', '2016-09-10 16:53:51', null, null);
INSERT INTO `ad_tasks` VALUES ('8', '1', '客户案例0627', '10000.00', '12.00', '1', '3.00', '130', '0.00', '0', '0', '0', '0', '100.00', '20', '1', '/uploads/imgs/2016-09-14/294129/57d8e4f82016b.jpg', '1473831940', '1476423940', 'http://www.baidu.com', '2016-09-14 14:01:36', '2016-09-14 14:01:36', null);

-- ----------------------------
-- Table structure for `ad_users`
-- ----------------------------
DROP TABLE IF EXISTS `ad_users`;
CREATE TABLE `ad_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `nickname` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户昵称',
  `qq` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'qq账号',
  `realname` char(12) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '真实姓名',
  `idno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '身份证号码',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '邮箱验证',
  `roles` enum('用户','管理员') COLLATE utf8_unicode_ci DEFAULT '用户' COMMENT '角色',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户密码',
  `mobile` char(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '手机号码',
  `gender` enum('女','男') COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL COMMENT '生日',
  `province` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '省',
  `city` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '学历',
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '联系地址',
  `industry` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '职业',
  `marriage` enum('已婚','未婚') CHARACTER SET utf8 DEFAULT NULL COMMENT '婚姻',
  `income` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '月薪',
  `signature` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '签名',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_users
-- ----------------------------
INSERT INTO `ad_users` VALUES ('1', 'zhuxishun', ' 老朱', null, null, null, null, '管理员', '$2y$10$XiJxXLNZlRqaN5fPmxKv9ejJ6NdRLIQY.PQ8cL0915VdfzuzMBnSm', null, null, null, null, null, null, null, null, null, null, null, '2016-09-08 10:29:30', null);
INSERT INTO `ad_users` VALUES ('2', 'laozhu', '厨卫', null, null, null, null, '用户', '', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00 00:00:00', null);

-- ----------------------------
-- Table structure for `ad_withdraws`
-- ----------------------------
DROP TABLE IF EXISTS `ad_withdraws`;
CREATE TABLE `ad_withdraws` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL DEFAULT '0' COMMENT '银行ID',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '提现金额',
  `commission` decimal(10,2) DEFAULT '0.00' COMMENT '0.00',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 0、申请提现 1、已派发 2、拒绝提现',
  `reason` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '拒绝原因',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_withdraws
-- ----------------------------
INSERT INTO `ad_withdraws` VALUES ('1', '2', '1', '100.00', '0.00', '1', '审核通过', '2016-09-11 09:18:39', '2016-09-11 09:18:39');
