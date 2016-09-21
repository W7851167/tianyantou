/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50712
Source Host           : localhost:3306
Source Database       : phpad

Target Server Type    : MYSQL
Target Server Version : 50712
File Encoding         : 65001

Date: 2016-09-21 00:35:29
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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_advs
-- ----------------------------
INSERT INTO `ad_advs` VALUES ('2', '新手福利，注册即送188元现金红包！新手更享活期15.8%，定期10%', '', '300', '2016-09-17 14:51:09', null, null);

-- ----------------------------
-- Table structure for `ad_articles`
-- ----------------------------
DROP TABLE IF EXISTS `ad_articles`;
CREATE TABLE `ad_articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '当前时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_articles
-- ----------------------------
INSERT INTO `ad_articles` VALUES ('17', '12', 'App\\Models\\NewModel', '<p><span style=\"font-size: 14px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">亲爱的天眼哥：</span></p><p style=\"text-indent: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">根据《国务院办公厅关于2016年部分节假日安排的通知》，投之家2016年中秋节放假值班安排如下：</span></p><p style=\"text-indent: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">1. 2016年9月15日至9月17日期间3天连休，2016年9月18日（星期日）恢复正常上班；假期客服服务时间不变，为10:00-18:00；</span></p><p style=\"text-indent: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">2. 节日期间不处理提现，9月14日13:30之后的提现，将于9月18日（工作日）处理；</span></p><p style=\"text-indent: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">3. 假期中，用户的充值、回款等投资服务均可正常进行；每日专享债权的供应时间为：10:18和14:18。</span></p><p style=\"text-indent: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">请提前做好安排，预祝大家中秋快乐。如有疑问，请致电服务热线或咨询在线客服。</span></p><p style=\"text-indent: 2em;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">特此公告，请知悉！</span></p><p style=\"text-align: right;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">天眼投运营团队</span></p><p style=\"text-align: right;\"><span style=\"font-size: 14px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">2016/09/13</span></p><p><br/></p>', '2016-09-17 14:54:54', '2016-09-17 14:54:54', null);
INSERT INTO `ad_articles` VALUES ('18', '13', 'App\\Models\\NewModel', '<p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">有公积金卡，但却不知道该怎么使用公积金，或者并不了解公积金该怎么用?</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">6</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">月初，住建部联合财政部、央行发布了《全国住房公积金</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">2015</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">年年度报告》（以下简称报告）。《报告》指出</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">2015</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">年全国住房公积金缴存额</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">14549.46</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">亿元，比上年增长</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">12.29%</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">。在中国，几乎每个有工作的人都要缴纳住房公积金，绝大部分买房人都会用到住房公积金。</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">但是，</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">99%</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">的人可能都不清楚：住房公积金怎么转移？怎么用来买房和租房？大家对住房公积金普遍存在疑问。而这份报告里又藏着什么秘密呢？</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">什么是住房公积金？</span></strong></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">住房公积金是指国家机关、国有企业、城镇集体企业、外商投资企业、城镇私营企业及其他城镇企业、事业单位及其在职职工缴存的长期住房储金。职工个人缴存的住房公积金和职工所在单位为职工缴存的住房公积金，属于职工个人所有。</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">公积金制度是劫富济贫吗？谁受益最大？</span></strong></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">贷款职工中，低收入占</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">36.61%</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">，中等占</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">57.43%</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">，高收入占</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">5.96%</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">。</span>&nbsp;<span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">这说明，中等收入人群受益于公积金制度最大。低收入者缴存了公积金，但买房首付和还贷能力不足，贷款率低；高收入人群缴存多，但因为资金富裕，对公积金贷款的需求小。</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">大部分使用公积金的人购买的房型面积适中，购房人群属于中等收入群体。虽然低收入者使用公积金买房的比例不高，但现在越来越多的城市允许提取公积金支付房租，这给了低收入者更多利用公积金的机会。</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">全国公积金缴存单位分布如何？</span></strong></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">由数据得出，民企缴纳住房公积金的人数远低于国企和机关事业单位。这说明，可能存在一部分民企不给员工缴纳住房公积金的情况，侵犯了职工权益。民企职工应督促公司缴纳住房公积金，对自己有好处：买房可以享受低息公积金贷款，如果不买房，也可以提取公积金用于租房。</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">购房、还贷提取比较多，租房少</span></strong></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">2015</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">年住房公积金提取额</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">10987.47</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">亿元，比上年增长</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">44.92%</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">。</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">公积金提取实行的是“先花钱后报销”的原则，即个人先出钱买房，再以购房消费凭证提取公积金。</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">2015</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">年住房公积金提取金额同比有大幅增长，而住房消费类占绝大多数，表明大部分家庭购房后资金都不太富裕，购房后需要依赖公积金偿还贷款或补充家庭积蓄。</span>&nbsp;<span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">租房提取的总额非常少。原因可能是一些城市对租房提取的要求比较严格，也可能是很多人没有注意到可以租房提取，忽视了自己的权益。</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">贷款发放多，收回少</span></strong></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">2015</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">年，全国公积金共发放个人住房贷款</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">312.5</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">万笔、共</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">11082.63</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">亿元；全年收回个人住房贷款</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">3810.02</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">亿元。</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">2015</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">年，全国住房公积金贷款比例大幅提高，一方面，这说明购房者对公积金有了前所未有的认识和重视，更多的人选择使用公积金贷款买房；另一方面，也说明房地产市场火热，购房人口增多，房价攀升，逼迫购房人使用最便宜的贷款方式。</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">如果楼市像去年一般火爆，也就是说购房人提取公积金和申请公积金贷款的热情持续高涨，那么全国住房公积金余额始终保持</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">4</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">万亿左右的水平。</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">随着国家降低对各地公积金缴存比例的要求，如果今后每年的缴存额减少，而贷款人数和金额不减，那么公积金池子里的水就会越流越少了。不应要求职工再多缴纳公积金，而是要提高住房公积金的利润率。</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">公积金能赚钱吗，每年有多大利润？</span></strong></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">我们每个人缴纳的公积金汇聚在公积金管理中心，相当于组成了一大笔资金池，若能投资得当，每年也能产出巨额利润。</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">全年住房公积金业务收入</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">1598.36</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">亿元，截至</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">2015</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">年末全国公积金缴存余额</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">40674.72</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">亿元，投资收益率</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">=1598.36</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">÷</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">40674.72=3.93%</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">。全国住房公积金管理中心的投资收益率还不到</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">4%</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">！</span></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; word-wrap: break-word; font-size: 14px; overflow: hidden; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; line-height: 24.5px; white-space: normal; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">此外，公积金的发放贷款业务每年还要花钱。</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">2015</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">年全国住房公积金业务支出</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">523.34</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">亿元，其中支付缴存职工利息</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">434.29</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">亿元、归集手续费</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">21.24</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">亿元、委托贷款手续费</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">50.64</span><span style=\"margin: 0px; padding: 0px; font-size: 16px; font-family: 宋体;\">亿元</span><span style=\"margin: 0px; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体;\">，其他支出（包括贴息贷款的贴息支出、担保费支出等）</span>17.17<span style=\"margin: 0px; padding: 0px; font-family: 宋体;\">亿元。</span>&nbsp;<span style=\"margin: 0px; padding: 0px; font-family: 宋体;\">扣除这些支出，净利润率</span>=<span style=\"margin: 0px; padding: 0px; font-family: 宋体;\">（</span>1598.36<span style=\"margin: 0px; padding: 0px; font-family: 宋体;\">－</span>523.34<span style=\"margin: 0px; padding: 0px; font-family: 宋体;\">）÷</span>40674.72=2.64%<span style=\"margin: 0px; padding: 0px; font-family: 宋体;\">。能看出，除去放贷，公积金主要的投资渠道是存款和投资国债，而存款和国债的收益率都比较低。若能找到风险可控、收益率更高的投资机会，对公积金保值增值就更有利了。</span></span></p><p><br/></p>', '2016-09-17 15:03:44', null, null);
INSERT INTO `ad_articles` VALUES ('19', '14', 'App\\Models\\NewModel', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 25px 8px 0px; line-height: 25px; color: rgb(51, 51, 51); font-family: Arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">网络借贷信息中介机构业务活动管理暂行办法》(以下简称《办法》)出来后，全国各大平台大喊要“拥抱监管”、“合规发展”口号。一些平台更是参照“禁13条”，力证自己合规程度之高。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 25px 8px 0px; line-height: 25px; color: rgb(51, 51, 51); font-family: Arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　而《办法》当中，“网络借贷信息中介机构完成地方金融监管部门备案登记后，应当按照通信主管部门的相关规定申请相应的电信业务经营许可;未按规定申请电信业务经营许可的，不得开展网络借贷信息中介业务。”这条规定，让ICP许可证成为平台合规“标配”，更是成为平台新的营销宣传要点。平台们争相将其作为自有优势输出，企图为自己的品牌背书添砖加瓦。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 25px 8px 0px; line-height: 25px; color: rgb(51, 51, 51); font-family: Arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　当然这并不出奇，正所谓物以稀为贵。据不完全统计，截至2016年8月底，全国正常运营平台数量为2235家，其中约有242家平台拥有有效的ICP经营性许可证，约占网贷行业正常运营平台总数量的10.83%。而大部分平台目前处于“无证经营”状态。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 25px 8px 0px; line-height: 25px; color: rgb(51, 51, 51); font-family: Arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　有ICP证，意味着平台合规。一些平台借势加以渲染，于是有了这样的逻辑推理——为什么我这家平台能够成为这极少数中被认可的一家？因为我家各方面合规呀!为什么获得ICP证的平台这么少？因为通信部门对平台的资质审核要求高!为什么一些很大平台没有获得这个证？因为他们还没有达到要求呀!形成了“一证在手，畅通无阻”的观念，这导致一些第三方办证机构将ICP证出价到30万。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 25px 8px 0px; line-height: 25px; color: rgb(51, 51, 51); font-family: Arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　然而真相是，<strong style=\"margin: 0px; padding: 0px;\">大多数“持证平台”是在《办法》出台前办理ICP的。在监管办法出来之前，监管层也未设有对应的申请路径。目前地区通信管理局对<span id=\"Info.34844\" style=\"margin: 0px; padding: 0px;\">P2P网贷</span>平台办理ICP许可证的要求趋严，且部分地区还要求必须先出示地方金融管理部门出具的前置审批，在操作程序不明确的情况下使得办证申请更是难上加难。</strong>对于ICP许可证作为平台被硬性要求的“隐形牌照”，不知历经12个月整改期后，到时是否还有平台会拿出来炫耀？</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 25px 8px 0px; line-height: 25px; color: rgb(51, 51, 51); font-family: Arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　<strong style=\"margin: 0px; padding: 0px;\">前一段时间，议论的热点还有资金银行存管。</strong>据不完全统计，截至2016年7月10日，共有149家正常运营平台宣布与银行签订资金存管协议，约占网贷行业正常运营平台总数量的6.34%，而真正与银行完成资金存管系统对接的只有48家，仅占网贷行业正常运营平台数量的2.04%。银行存管对行业的整体作用在于——由银行管理资金，平台管理交易，做到资金与交易的分离，使得平台无法直接接触资金，避免客户资金被挪用。在反面教材e租宝事件中，手持百万年薪的平台高管，还任意挥霍投资者的资金。在这样的情形下，银行存管成为投资人衡量<span id=\"Info.31100\" style=\"margin: 0px; padding: 0px;\">P2P</span>网贷平台安全的一个重要调教，银行资金存管也成为平台合法合规的必要。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 25px 8px 0px; line-height: 25px; color: rgb(51, 51, 51); font-family: Arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　于是乎，不管是不是签订了银行存管协议，平台或向其靠拢或将自己与银行挂钩，这个逻辑跟ICP经营许可证很相似，这里不再赘述。包括此前兴起的互联网金融+保险，从最开始平台牵手阳光保险推出的资金交易安全险，到后来相继推出人身意外险、履约保证保险等各种险种，也可以看到网贷平台曾兴起过引入保险以增信营销热潮。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 25px 8px 0px; line-height: 25px; color: rgb(51, 51, 51); font-family: Arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　近半年以来，一向被认为以“安全”为标签的国资系的负面消息不断，投资人的“视觉疲劳”后，这个话题才渐冷下来。国资系的概念，是于整个行业在逾期、跑路、倒闭负面事件频出之时，国资平台因其股东雄厚的实力彰显安全性而兴起的，其在获客上极具优势。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 25px 8px 0px; line-height: 25px; color: rgb(51, 51, 51); font-family: Arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　而滥用国资系概念也使得问题突出，打着国资幌子的“伪国资平台”运营风险不断暴露。今年3月国资委召集部分国资系网贷平台负责人开座谈会，排查过度营销的国资平台。加上明星代言平台出事、第三方担保公司拒绝兑付甚至倒闭等事件，也让投资者开始理性看待这些信用背书价值。</p><p><br/></p>', '2016-09-17 15:08:00', '2016-09-17 15:08:00', null);
INSERT INTO `ad_articles` VALUES ('20', '5', 'App\\Models\\CorpModel', '<p style=\"margin-top: 0px; margin-bottom: 30px; padding: 0px; word-wrap: break-word; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; font-size: 14px; line-height: 24.5px; white-space: normal; background-color: rgb(255, 255, 255);\">e融所(深圳汇海易融互联网金融服务有限公司) 是一家具有上市公司和券商背景的互联网金融服务平台，总部位于深圳，注册资本金1亿元。由深圳市多家上市公司、知名企业以及银行高管共同出资成立，股东包括深圳方大集团、华林证券创投、国人通信、中海信等知名企业。e融所管理团队由具有15年以上从业经验银行高管和5年以上的互联网金融从业经验的专业人士组成，在金融和互联网领域均具有丰富的管理、风险识别以及市场开拓经验。</p><p style=\"margin-top: 0px; margin-bottom: 30px; padding: 0px; word-wrap: break-word; color: rgb(100, 101, 103); font-family: &#39;Microsoft Yahei&#39;; font-size: 14px; line-height: 24.5px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">联系地址：深圳市龙华新区创业路汇海广场B座2505</span><br/><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">公司电话：400-602-6622</span></p>', '2016-09-17 15:13:02', null, null);

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_banks
-- ----------------------------

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_books
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
  `iconfont` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_categorys
-- ----------------------------
INSERT INTO `ad_categorys` VALUES ('1', '公司简介', '1', '1', '0', 'company', '&#xe61f;', '2016-09-12 21:13:11', null, null);
INSERT INTO `ad_categorys` VALUES ('2', '月度报告', '4', '1', '0', 'monthly', '&#xe62c;', '2016-09-17 18:24:08', '2016-09-17 18:24:04', '2016-09-17 18:23:34');
INSERT INTO `ad_categorys` VALUES ('3', '专家顾问', '0', '1', '0', 'consultant', '&#xe623;', '2016-09-12 21:14:18', null, null);
INSERT INTO `ad_categorys` VALUES ('4', '媒体报道', '0', '1', '0', 'media', '&#xe612;', '2016-09-12 21:14:28', null, null);
INSERT INTO `ad_categorys` VALUES ('5', '团队介绍', '1', '1', '0', 'team', '&#xe609;', '2016-09-12 21:14:39', null, null);
INSERT INTO `ad_categorys` VALUES ('6', '天眼盾计划', '1', '1', '0', 'plan', '&#xe62a;', '2016-09-17 20:36:33', null, null);
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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_corp_terms
-- ----------------------------
INSERT INTO `ad_corp_terms` VALUES ('6', '5', '林建武', '董事长', '中央党校经济学研究生毕业，长江商学院EMBACK25。由银行基层到支行行长再到分行高管，曾就职于广东发展银行、深圳发展银行、渤海银行等多家银行，从事金融证券行业长达20年之久。', '2016-09-17 20:04:04', '2016-09-17 15:19:50', null);
INSERT INTO `ad_corp_terms` VALUES ('7', '5', '胡肖明', '总裁', '天津南开大学金融系毕业，获金融学学士学位，20年银行系统从业经验，担任广东发展银行、深圳发展银行、平安银行支行行长多年', '2016-09-17 15:17:54', null, null);
INSERT INTO `ad_corp_terms` VALUES ('8', '5', '施跃进', '副总裁', '南昌大学毕业，获工学学士学位，会计师、经济师。拥有23年中央银行和商业银行工作经验，曾任银行总分支行计财、运营、风控、产品部门', '2016-09-17 15:18:38', null, null);
INSERT INTO `ad_corp_terms` VALUES ('9', '5', '张 琪', '副总裁', '消费金融事业部负责人，毕业于北京大学法学院，获法律硕士(JM)学位。10年银行从业经验，先后任职于平安银行支行副行长，汽车金融..', '2016-09-17 15:19:06', null, null);

-- ----------------------------
-- Table structure for `ad_corps`
-- ----------------------------
DROP TABLE IF EXISTS `ad_corps`;
CREATE TABLE `ad_corps` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '公司名称',
  `ename` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '平台英文名',
  `chartered` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '营业执照',
  `logo` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '平台LOGO',
  `min_yield` decimal(10,2) DEFAULT '0.00' COMMENT '年收益最小值',
  `max_yield` decimal(10,2) DEFAULT '0.00' COMMENT '年收益最大值',
  `min_days` int(11) DEFAULT '0' COMMENT '最小结束天数',
  `max_days` int(11) DEFAULT '0' COMMENT '最大结束天数',
  `capital` char(15) COLLATE utf8_unicode_ci NOT NULL COMMENT '注册金额',
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '法人代表',
  `province` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '所在省',
  `city` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '所在区域',
  `county` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '区',
  `status` tinyint(1) DEFAULT '1' COMMENT '1、正常 0、暂停',
  `online` date NOT NULL COMMENT '上线时间',
  `address` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT '公司地址',
  `level` varchar(100) COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '等级',
  `limit` tinyint(1) DEFAULT '0' COMMENT '交任务的数量数',
  `sorts` int(11) DEFAULT '0' COMMENT '排序',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除操作',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_corps
-- ----------------------------
INSERT INTO `ad_corps` VALUES ('5', 'e融所', 'erongsuo', '/uploads/imgs/2016-09-17/280220/57dcec44648d5.jpg', '/uploads/imgs/2016-09-17/180180/57dcec22312e6.jpg', '15.00', '15.00', '11', '11', '2000万元', '林建武', '广东省', '深圳市', '区', '1', '2015-09-17', '龙华新区创业路汇海广场B座2505', 'AAA', '1', '200', '2016-09-17 19:44:07', '2016-09-19 15:40:15', null);
INSERT INTO `ad_corps` VALUES ('6', '爱钱进', 'aiqianjin', '/uploads/imgs/2016-09-18/280220/57de4ff68bbca.jpg', '/uploads/imgs/2016-09-18/180180/57de4fecdb532.jpg', '9.00', '15.00', '11', '30', '2000万元', '马琳', '北京市', '北京市', '西城区', '1', '2016-09-19', '', 'AAA', '25', '1', '2016-09-18 16:28:13', '2016-09-21 00:22:40', null);

-- ----------------------------
-- Table structure for `ad_images`
-- ----------------------------
DROP TABLE IF EXISTS `ad_images`;
CREATE TABLE `ad_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '图片ID',
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片地址名称',
  `item_id` int(11) NOT NULL,
  `item_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片类型',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '当前时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_images
-- ----------------------------
INSERT INTO `ad_images` VALUES ('31', '/uploads/imgs/2016-09-17/1349246/57dce7795f063.jpg', '2', 'App\\Models\\AdvModel', '2016-09-17 14:51:09', null, null);
INSERT INTO `ad_images` VALUES ('32', '/uploads/logo/2016-09-17/24282/57dceba722a83.jpg', '14', 'App\\Models\\NewModel', '2016-09-17 15:07:20', null, null);
INSERT INTO `ad_images` VALUES ('33', '/uploads/imgs/2016-09-17/188223/57dced6fd02c8.jpg', '6', 'App\\Models\\CorpTermModel', '2016-09-17 15:15:50', null, null);
INSERT INTO `ad_images` VALUES ('34', '/uploads/imgs/2016-09-17/188223/57dcee0e6bd83.jpg', '7', 'App\\Models\\CorpTermModel', '2016-09-17 15:17:54', null, null);
INSERT INTO `ad_images` VALUES ('35', '/uploads/imgs/2016-09-17/188223/57dcee40bb36b.jpg', '8', 'App\\Models\\CorpTermModel', '2016-09-17 15:18:38', null, null);
INSERT INTO `ad_images` VALUES ('36', '/uploads/imgs/2016-09-17/188223/57dcee614d714.jpg', '9', 'App\\Models\\CorpTermModel', '2016-09-17 15:19:06', null, null);
INSERT INTO `ad_images` VALUES ('37', '/uploads/logo/2016-09-17/24282/57dd5f6c3dca3.jpg', '16', 'App\\Models\\NewModel', '2016-09-17 23:21:32', '2016-09-17 23:21:32', '2016-09-17 23:21:32');

-- ----------------------------
-- Table structure for `ad_links`
-- ----------------------------
DROP TABLE IF EXISTS `ad_links`;
CREATE TABLE `ad_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '友情链接名称',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '跳转地址',
  `sorts` int(11) DEFAULT '0' COMMENT '排序',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_links
-- ----------------------------
INSERT INTO `ad_links` VALUES ('6', '网贷之家', 'http://www.wdzj.com/', '300', '2016-09-17 14:42:58', null, null);
INSERT INTO `ad_links` VALUES ('7', '中国网', 'http://finance.china.com.cn/money/efinance/index.shtml', '200', '2016-09-17 14:44:31', null, null);

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '0',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_messages
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_metas
-- ----------------------------
INSERT INTO `ad_metas` VALUES ('45', '5', 'App\\Models\\CorpModel', 'icp_domain', 's:11:\"myerong.com\";');
INSERT INTO `ad_metas` VALUES ('46', '5', 'App\\Models\\CorpModel', 'icp_corp_type', 's:6:\"企业\";');
INSERT INTO `ad_metas` VALUES ('47', '5', 'App\\Models\\CorpModel', 'icp_time', 's:9:\"2015-11-2\";');
INSERT INTO `ad_metas` VALUES ('48', '5', 'App\\Models\\CorpModel', 'icp_corp_name', 's:48:\"深圳汇海易融互联网融服务有限公司\";');
INSERT INTO `ad_metas` VALUES ('49', '5', 'App\\Models\\CorpModel', 'icp_no', 's:22:\"粤ICP备15096910号-1\";');
INSERT INTO `ad_metas` VALUES ('50', '5', 'App\\Models\\CorpModel', 'id', 's:1:\"5\";');
INSERT INTO `ad_metas` VALUES ('51', '5', 'App\\Models\\CorpModel', 'credentials', 'a:2:{i:0;s:77:\"http://static.tianyantou.com/uploads/imgs/2016-09-17/206154/57dcef4f3ef07.jpg\";i:1;s:77:\"http://static.tianyantou.com/uploads/imgs/2016-09-17/206154/57dcf1c97997f.jpg\";}');
INSERT INTO `ad_metas` VALUES ('52', '5', 'App\\Models\\CorpModel', 'office_address', 'a:5:{i:0;s:77:\"http://static.tianyantou.com/uploads/imgs/2016-09-17/206154/57dcef5c90462.jpg\";i:1;s:77:\"http://static.tianyantou.com/uploads/imgs/2016-09-17/206154/57dcf1d1b07c8.jpg\";i:2;s:77:\"http://static.tianyantou.com/uploads/imgs/2016-09-17/206154/57dcf1d1ce3e3.jpg\";i:3;s:77:\"http://static.tianyantou.com/uploads/imgs/2016-09-17/206154/57dcf1d1e22c4.jpg\";i:4;s:77:\"http://static.tianyantou.com/uploads/imgs/2016-09-17/206154/57dcf1d2031ac.jpg\";}');
INSERT INTO `ad_metas` VALUES ('53', '5', 'App\\Models\\CorpModel', 'capital_adequacy', 's:5:\"78.76\";');
INSERT INTO `ad_metas` VALUES ('54', '5', 'App\\Models\\CorpModel', 'operating_capacity', 's:5:\"58.32\";');
INSERT INTO `ad_metas` VALUES ('55', '5', 'App\\Models\\CorpModel', 'flowability', 's:5:\"56.23\";');
INSERT INTO `ad_metas` VALUES ('56', '5', 'App\\Models\\CorpModel', 'dissemination', 's:5:\"80.31\";');
INSERT INTO `ad_metas` VALUES ('57', '5', 'App\\Models\\CorpModel', 'transparency', 's:5:\"58.58\";');
INSERT INTO `ad_metas` VALUES ('58', '5', 'App\\Models\\CorpModel', 'contract_rate', 's:5:\"57.84\";');
INSERT INTO `ad_metas` VALUES ('59', '5', 'App\\Models\\CorpModel', 'pattern', 's:36:\"风险准备金，双乾支付托管\";');
INSERT INTO `ad_metas` VALUES ('60', '5', 'App\\Models\\CorpModel', 'assure', 's:12:\"网贷之家\";');
INSERT INTO `ad_metas` VALUES ('61', '5', 'App\\Models\\CorpModel', 'honour_1', 's:33:\"上市公司及券商联袂打造\";');
INSERT INTO `ad_metas` VALUES ('62', '5', 'App\\Models\\CorpModel', 'honour_2', 's:39:\"广州市汽车服务业协会副会长\";');
INSERT INTO `ad_metas` VALUES ('63', '5', 'App\\Models\\CorpModel', 'honour_3', 's:0:\"\";');
INSERT INTO `ad_metas` VALUES ('64', '5', 'App\\Models\\CorpModel', 'honour_corp_1', 's:33:\"上市公司及券商联袂打造\";');
INSERT INTO `ad_metas` VALUES ('65', '5', 'App\\Models\\CorpModel', 'honour_corp_2', 's:0:\"\";');
INSERT INTO `ad_metas` VALUES ('66', '5', 'App\\Models\\CorpModel', 'honour_corp_3', 's:0:\"\";');

-- ----------------------------
-- Table structure for `ad_moneys`
-- ----------------------------
DROP TABLE IF EXISTS `ad_moneys`;
CREATE TABLE `ad_moneys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户信息',
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '交易密码',
  `total` decimal(10,2) DEFAULT '0.00' COMMENT '总资产',
  `rebate` decimal(10,2) DEFAULT '0.00' COMMENT '冻结返利',
  `withdraw` decimal(10,2) DEFAULT '0.00' COMMENT '提现冻结',
  `money` decimal(10,2) DEFAULT '0.00' COMMENT '可用金额',
  `score` int(11) DEFAULT '0' COMMENT '积分',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_moneys
-- ----------------------------
INSERT INTO `ad_moneys` VALUES ('1', '2', null, '0.00', '0.00', '0.00', '100.00', '4450', '2016-09-11 21:23:44', '2016-09-11 21:23:44');
INSERT INTO `ad_moneys` VALUES ('2', '1', null, '36.99', '0.00', '0.00', '36.99', '0', '2016-09-21 00:00:46', '2016-09-21 00:02:01');

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_news
-- ----------------------------
INSERT INTO `ad_news` VALUES ('12', '0', '10', '佳节将至，请留意中秋值班安排', '0', null, '10', '2016-09-17 20:35:22', '2016-09-17 23:17:04', null);
INSERT INTO `ad_news` VALUES ('13', '1', '12', '《全国住房公积金2015年年度报告》发布，住房公积金隐藏多少玄机？', '0', '', '12', '2016-09-17 23:16:17', '2016-09-17 23:16:53', null);
INSERT INTO `ad_news` VALUES ('14', '1', '11', '网贷行业进入拼爹时代 增信背书或将大缩水', '0', '在后监管时代，当行业趋于理性，这种过分倚重外在的背书将还是会被平台的风控能力、投资者的风险判断所代替，这只是时间问题罢了。', '7', '2016-09-17 23:11:26', '2016-09-18 16:58:39', null);

-- ----------------------------
-- Table structure for `ad_records`
-- ----------------------------
DROP TABLE IF EXISTS `ad_records`;
CREATE TABLE `ad_records` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '不限制 1、invest投资回报 2、income回款 3、recharge充值 4、提现',
  `income` decimal(10,2) DEFAULT '0.00' COMMENT '收入',
  `cost` decimal(10,2) DEFAULT '0.00' COMMENT '支出',
  `account` decimal(10,2) DEFAULT '0.00' COMMENT '账号金额',
  `remark` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注 ',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_records
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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_scores
-- ----------------------------

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
  `term` smallint(8) DEFAULT '0' COMMENT '期限',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_task_achieves
-- ----------------------------
INSERT INTO `ad_task_achieves` VALUES ('11', '10', '13', '123213', '老朱', '18611570121', '30000.00', '50', '2016-09-20 23:36:45', null);
INSERT INTO `ad_task_achieves` VALUES ('12', '10', '13', '234234', '老朱', '18611570121', '15000.00', '100', '2016-09-20 23:48:43', null);
INSERT INTO `ad_task_achieves` VALUES ('13', '10', '14', '123213', '老朱', '18611570121', '1000.00', '50', '2016-09-21 00:32:22', null);

-- ----------------------------
-- Table structure for `ad_task_receives`
-- ----------------------------
DROP TABLE IF EXISTS `ad_task_receives`;
CREATE TABLE `ad_task_receives` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `corp_id` int(11) NOT NULL DEFAULT '0' COMMENT '平台ID',
  `task_id` int(11) NOT NULL DEFAULT '0' COMMENT '任务ID',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '领取人ID',
  `ratio` decimal(10,2) DEFAULT '0.00' COMMENT '年化率',
  `mratio` decimal(10,2) DEFAULT '0.00' COMMENT '天眼投年化率',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0、领取 2、已交任务 1、已审核 3、驳回提交 4、已完成',
  `total` decimal(10,2) DEFAULT '0.00' COMMENT '完成总额',
  `income` decimal(10,2) DEFAULT '0.00' COMMENT '收益金额',
  `intro` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '审核通过说明或驳回说明',
  `create_time` int(11) DEFAULT '0' COMMENT '领取任务时间',
  `commit_time` int(11) DEFAULT '0' COMMENT '提交任务时间',
  `complete_time` int(11) DEFAULT '0' COMMENT '审核时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_task_receives
-- ----------------------------
INSERT INTO `ad_task_receives` VALUES ('13', '5', '10', '1', '15.00', '3.00', '1', '45000.00', '36.99', '', '1474385788', '1474386523', '1474387255');
INSERT INTO `ad_task_receives` VALUES ('14', '6', '10', '1', '15.00', '3.00', '2', '1000.00', '0.82', null, '1474388560', '1474389142', '0');

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
  `term` smallint(8) DEFAULT '0' COMMENT '期限',
  `term_unit` tinyint(1) DEFAULT '0' COMMENT '期限单位 0 天 1月 2年',
  `sued` decimal(10,2) DEFAULT '0.00' COMMENT '起诉金额',
  `repay` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '还款方式',
  `sorts` int(11) DEFAULT '0' COMMENT '排序',
  `limit` decimal(10,2) DEFAULT '0.00' COMMENT '投标限额(元)',
  `nums` int(11) DEFAULT '0' COMMENT '库存数量',
  `position` tinyint(1) DEFAULT '0' COMMENT '展示位置 0、普通展示 1、首页展示',
  `proccess` int(10) DEFAULT '0' COMMENT '进度',
  `home_img` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '首页展示图片',
  `start_time` int(11) DEFAULT '0' COMMENT '开始时间',
  `end_time` int(11) DEFAULT NULL COMMENT '结束时间',
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '跳转地址 ',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '当前时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_tasks
-- ----------------------------
INSERT INTO `ad_tasks` VALUES ('10', '6', '新手福利标160917X', '2000000.00', '15.00', '1', '3.00', '10', '0', '0.00', '本息到期一次付清', '500', '1000.00', '91', '1', '2', '/uploads/imgs/2016-09-17/294129/57dcf0c37777a.jpg', '1474097096', '1475047496', 'https://www.myerong.com/financing/sbtz/bdxq/1277.html', '2016-09-17 19:44:07', '2016-09-21 00:22:40', null);
INSERT INTO `ad_tasks` VALUES ('11', '6', '爱钱进3月定期', '200000.00', '9.00', '1', '9.00', '3', '0', '1000.00', '付本还息', '2', '10000.00', '50', '1', '6', '/uploads/imgs/2016-09-18/294129/57de50767139d.jpg', '1474187297', '1476779297', 'http://www.iqianjin.com/', '2016-09-18 16:30:23', '2016-09-20 23:16:38', null);

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_users
-- ----------------------------
INSERT INTO `ad_users` VALUES ('1', 'zhuxishun', ' 老朱', null, null, null, null, '管理员', '$2y$10$XiJxXLNZlRqaN5fPmxKv9ejJ6NdRLIQY.PQ8cL0915VdfzuzMBnSm', null, null, null, null, null, null, null, null, null, null, null, '2016-09-08 10:29:30', null);
INSERT INTO `ad_users` VALUES ('2', 'laozhu', '厨卫', null, null, null, null, '用户', '', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00 00:00:00', null);
INSERT INTO `ad_users` VALUES ('3', 'laozhu2016', null, null, null, null, null, '用户', '$2y$10$xsS/DeWTK/rB2aXCGo05B.fkcyT.kbVitihY3c543pFZr0v8wBFe.', null, null, null, null, null, null, null, null, null, null, null, '2016-09-16 22:49:41', '2016-09-16 22:49:41');

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_withdraws
-- ----------------------------
