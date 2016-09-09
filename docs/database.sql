/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50712
Source Host           : localhost:3306
Source Database       : phpad

Target Server Type    : MYSQL
Target Server Version : 50712
File Encoding         : 65001

Date: 2016-09-09 12:02:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ad_articles`
-- ----------------------------
DROP TABLE IF EXISTS `ad_articles`;
CREATE TABLE `ad_articles` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '当前时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_articles
-- ----------------------------

-- ----------------------------
-- Table structure for `ad_banks`
-- ----------------------------
DROP TABLE IF EXISTS `ad_banks`;
CREATE TABLE `ad_banks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `hold_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '开户名/或支付宝名称',
  `bank_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '开户行名称',
  `province` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '省',
  `city` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '市',
  `branch_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '支行名称',
  `cardno` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '卡号',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_banks
-- ----------------------------

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_categorys
-- ----------------------------
INSERT INTO `ad_categorys` VALUES ('1', '公司简介', '1', '1', '0', 'company', '2016-09-09 10:32:53', null, null);
INSERT INTO `ad_categorys` VALUES ('2', '月度报告', '4', '1', '0', 'monthly', '2016-09-09 11:54:28', null, null);
INSERT INTO `ad_categorys` VALUES ('3', '专家顾问', '0', '1', '0', 'consultant', '2016-09-09 10:33:10', null, null);
INSERT INTO `ad_categorys` VALUES ('4', '媒体报道', '0', '1', '0', 'media', '2016-09-09 10:33:18', null, null);
INSERT INTO `ad_categorys` VALUES ('5', '团队介绍', '1', '1', '0', 'team', '2016-09-09 10:33:27', null, null);
INSERT INTO `ad_categorys` VALUES ('6', 'T盾计划', '1', '1', '0', 'plan', '2016-09-09 10:33:34', null, null);
INSERT INTO `ad_categorys` VALUES ('7', '帮助中心', '2', '1', '0', 'help', '2016-09-09 11:52:43', null, null);
INSERT INTO `ad_categorys` VALUES ('8', '安全评级', '1', '1', '0', 'safety', '2016-09-09 10:33:58', null, null);
INSERT INTO `ad_categorys` VALUES ('9', '招贤纳士', '1', '1', '0', 'career', '2016-09-09 10:33:59', null, null);
INSERT INTO `ad_categorys` VALUES ('10', '网站公告', '3', '1', '0', 'notice', '2016-09-09 11:53:46', null, null);
INSERT INTO `ad_categorys` VALUES ('11', '最新动态', '0', '1', '0', 'latest', '2016-09-09 10:34:21', null, null);
INSERT INTO `ad_categorys` VALUES ('12', '投资攻略', '0', '1', '0', 'strategy', '2016-09-09 10:34:32', null, null);
INSERT INTO `ad_categorys` VALUES ('13', '行业动态', '0', '1', '0', 'dynamic', '2016-09-09 10:34:52', null, null);
INSERT INTO `ad_categorys` VALUES ('14', '大事记', '3', '1', '0', 'events', '2016-09-09 11:54:10', null, null);
INSERT INTO `ad_categorys` VALUES ('15', '活动展示', '0', '1', '0', 'activity', '2016-09-09 10:35:52', null, null);
INSERT INTO `ad_categorys` VALUES ('16', '联系我们', '1', '1', '0', 'contact', '2016-09-09 10:36:37', null, null);
INSERT INTO `ad_categorys` VALUES ('17', '流程类说明', '0', '1', '7', null, '2016-09-09 11:13:11', null, null);
INSERT INTO `ad_categorys` VALUES ('18', '平台说明', '0', '1', '7', null, '2016-09-09 11:13:28', null, null);
INSERT INTO `ad_categorys` VALUES ('19', '充值提现说明', '0', '1', '7', null, '2016-09-09 11:13:44', null, null);
INSERT INTO `ad_categorys` VALUES ('20', '账户类说明', '0', '1', '7', null, '2016-09-09 11:14:07', null, null);
INSERT INTO `ad_categorys` VALUES ('21', '其它说明', '0', '1', '7', null, '2016-09-09 11:14:25', null, null);

-- ----------------------------
-- Table structure for `ad_corps`
-- ----------------------------
DROP TABLE IF EXISTS `ad_corps`;
CREATE TABLE `ad_corps` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `platform` char(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '平台名称',
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '公司名称',
  `capital` char(15) COLLATE utf8_unicode_ci NOT NULL COMMENT '注册金额',
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '法人代表',
  `province` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '所在省',
  `status` tinyint(1) DEFAULT '1' COMMENT '1、正常 0、暂停',
  `city` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '所在区域',
  `online` date NOT NULL COMMENT '上线时间',
  `address` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT '公司地址',
  `type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '项目类型',
  `pattern` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '担保模式',
  `assure` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '担保机构',
  `score` int(11) DEFAULT '0' COMMENT '用户打分',
  `intro` text COLLATE utf8_unicode_ci COMMENT '平台介绍',
  `risk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '风险控制',
  `nominate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '推荐理由',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除操作',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_corps
-- ----------------------------
INSERT INTO `ad_corps` VALUES ('1', '陆金所', '陆金所', '', '', '北京市', '1', '通州区', '0000-00-00', '', null, null, null, '0', null, null, null, '2016-09-08 17:00:14', null, null);

-- ----------------------------
-- Table structure for `ad_images`
-- ----------------------------
DROP TABLE IF EXISTS `ad_images`;
CREATE TABLE `ad_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '图片ID',
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片地址名称',
  `item_id` int(11) NOT NULL,
  `item_type` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片类型',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '当前时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_images
-- ----------------------------
INSERT INTO `ad_images` VALUES ('1', '1111', '1', 'App\\Models\\UserModel', '2016-09-07 18:24:45', null);

-- ----------------------------
-- Table structure for `ad_moneys`
-- ----------------------------
DROP TABLE IF EXISTS `ad_moneys`;
CREATE TABLE `ad_moneys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `total` decimal(10,2) DEFAULT '0.00' COMMENT '总资产',
  `rebate` decimal(10,2) DEFAULT '0.00' COMMENT '冻结返利',
  `withdraw` decimal(10,2) DEFAULT '0.00' COMMENT '提现冻结',
  `money` decimal(10,2) DEFAULT '0.00' COMMENT '可用金额',
  `score` int(11) DEFAULT '0' COMMENT '积分',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_moneys
-- ----------------------------

-- ----------------------------
-- Table structure for `ad_news`
-- ----------------------------
DROP TABLE IF EXISTS `ad_news`;
CREATE TABLE `ad_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '发布人员',
  `category_id` int(11) NOT NULL DEFAULT '0' COMMENT '分类ID',
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '资讯主题',
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '描述信息',
  `type` enum('资讯','动态','公告') COLLATE utf8_unicode_ci NOT NULL COMMENT '资讯内容',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_news
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_scores
-- ----------------------------

-- ----------------------------
-- Table structure for `ad_tasks`
-- ----------------------------
DROP TABLE IF EXISTS `ad_tasks`;
CREATE TABLE `ad_tasks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `corp_id` int(11) NOT NULL DEFAULT '0' COMMENT '公司信息',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '发布人ID',
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '标总额',
  `ratio` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '年转化率',
  `status` tinyint(1) DEFAULT '0' COMMENT '1、正常 1、停止',
  `adratio` decimal(10,2) DEFAULT '0.00' COMMENT '本网站转化率',
  `term` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '期限',
  `sued` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '起诉金额',
  `ensure` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '保障方式',
  `repay` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '还款方式',
  `accrual` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '计息方式(T+0到账\\T+1到账)',
  `limit` decimal(10,2) DEFAULT '0.00' COMMENT '投标限额(元)',
  `content` text COLLATE utf8_unicode_ci COMMENT '任务信息',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '当前时间',
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_tasks
-- ----------------------------

-- ----------------------------
-- Table structure for `ad_users`
-- ----------------------------
DROP TABLE IF EXISTS `ad_users`;
CREATE TABLE `ad_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `nickname` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户昵称',
  `realname` char(12) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '真实姓名',
  `idno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '身份证号码',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '邮箱验证',
  `roles` enum('用户','管理员') COLLATE utf8_unicode_ci DEFAULT '用户' COMMENT '角色',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户密码',
  `mobile` char(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '手机号码',
  `gender` enum('女','男') COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL COMMENT '生日',
  `provice` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '省',
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_users
-- ----------------------------
INSERT INTO `ad_users` VALUES ('1', 'zhuxishun', ' 老朱', null, null, null, '管理员', '$2y$10$XiJxXLNZlRqaN5fPmxKv9ejJ6NdRLIQY.PQ8cL0915VdfzuzMBnSm', null, null, null, null, null, null, null, null, null, null, null, '2016-09-08 10:29:30', null);

-- ----------------------------
-- Table structure for `ad_withdraws`
-- ----------------------------
DROP TABLE IF EXISTS `ad_withdraws`;
CREATE TABLE `ad_withdraws` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL DEFAULT '0' COMMENT '银行ID',
  `price` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT '提现金额',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 0、申请提现 1、已派发 2、拒绝提现',
  `reason` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '拒绝原因',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_withdraws
-- ----------------------------
