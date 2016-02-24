/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : graduate_project

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-02-24 10:35:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bar
-- ----------------------------
DROP TABLE IF EXISTS `bar`;
CREATE TABLE `bar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bar_name` text NOT NULL,
  `location_detail_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `chair_xml` text,
  `good` int(11) NOT NULL,
  `bad` int(11) NOT NULL,
  `GPU` text,
  `CPU` text,
  `Memory` text,
  `Harddisk` text,
  `SSD` text,
  `Keyboard` text,
  `Mouse` text,
  `Sofa` text,
  `Display` text,
  `self_comment` text,
  `price` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bar
-- ----------------------------
INSERT INTO `bar` VALUES ('1', '满天星网吧', '1', '1', null, '3', '4', ' 影驰GTX 750Ti 骁将', 'Intel 酷睿i5 4590', '芝奇8G', '1T', '金泰克S310系列（128GB）', '雷柏V56', 'G60 牧马人游戏鼠标', 'http://172.17.108.1/Graduation-Project/Netbar/Public/image/bar1.png', '戴尔（DELL）UltraSharp U2515H 25英寸2K宽屏LED背光IPS液晶显示器', 'cos装前台  英雄联盟超神送饮料送网费', '2-3');
INSERT INTO `bar` VALUES ('2', '星辰网吧', '2', '2', null, '14', '1', ' 影驰GTX 750Ti 骁将', 'Intel 酷睿i5 4590', '芝奇8G', '1T', '金泰克S310系列（128GB）', '雷柏V56', 'G60 牧马人游戏鼠标', 'http://172.17.108.1/Graduation-Project/Netbar/Public/image/bar1.png', '戴尔（DELL）UltraSharp U2515H 25英寸2K宽屏LED背光IPS液晶显示器', 'cos装前台  英雄联盟超神送饮料送网费', '2-3');
INSERT INTO `bar` VALUES ('3', '满天星网吧', '3', '3', null, '3', '4', ' 影驰GTX 750Ti 骁将', 'Intel 酷睿i5 4590', '芝奇8G', '1T', '金泰克S310系列（128GB）', '雷柏V56', 'G60 牧马人游戏鼠标', 'http://172.17.108.1/Graduation-Project/Netbar/Public/image/bar1.png', '戴尔（DELL）UltraSharp U2515H 25英寸2K宽屏LED背光IPS液晶显示器', 'cos装前台  英雄联盟超神送饮料送网费', '2-3');
INSERT INTO `bar` VALUES ('4', '满天星网吧', '4', '4', null, '3', '4', ' 影驰GTX 750Ti 骁将', 'Intel 酷睿i5 4590', '芝奇8G', '1T', '金泰克S310系列（128GB）', '雷柏V56', 'G60 牧马人游戏鼠标', 'http://172.17.108.1/Graduation-Project/Netbar/Public/image/bar1.png', '戴尔（DELL）UltraSharp U2515H 25英寸2K宽屏LED背光IPS液晶显示器', 'cos装前台  英雄联盟超神送饮料送网费', '2-3');
INSERT INTO `bar` VALUES ('5', '满天星网吧', '5', '5', null, '3', '4', ' 影驰GTX 750Ti 骁将', 'Intel 酷睿i5 4590', '芝奇8G', '1T', '金泰克S310系列（128GB）', '雷柏V56', 'G60 牧马人游戏鼠标', 'http://172.17.108.1/Graduation-Project/Netbar/Public/image/bar1.png', '戴尔（DELL）UltraSharp U2515H 25英寸2K宽屏LED背光IPS液晶显示器', 'cos装前台  英雄联盟超神送饮料送网费', '2-3');
INSERT INTO `bar` VALUES ('6', '满天星网吧', '6', '6', null, '3', '4', ' 影驰GTX 750Ti 骁将', 'Intel 酷睿i5 4590', '芝奇8G', '1T', '金泰克S310系列（128GB）', '雷柏V56', 'G60 牧马人游戏鼠标', 'http://172.17.108.1/Graduation-Project/Netbar/Public/image/bar1.png', '戴尔（DELL）UltraSharp U2515H 25英寸2K宽屏LED背光IPS液晶显示器', 'cos装前台  英雄联盟超神送饮料送网费', '4-5');
INSERT INTO `bar` VALUES ('7', '满天星网吧', '7', '7', null, '3', '4', ' 影驰GTX 750Ti 骁将', 'Intel 酷睿i5 4590', '芝奇8G', '1T', '金泰克S310系列（128GB）', '雷柏V56', 'G60 牧马人游戏鼠标', 'http://172.17.108.1/Graduation-Project/Netbar/Public/image/bar1.png', '戴尔（DELL）UltraSharp U2515H 25英寸2K宽屏LED背光IPS液晶显示器', 'cos装前台  英雄联盟超神送饮料送网费', '4-5');
INSERT INTO `bar` VALUES ('8', '满天星网吧', '8', '8', null, '3', '4', ' 影驰GTX 750Ti 骁将', 'Intel 酷睿i5 4590', '芝奇8G', '1T', '金泰克S310系列（128GB）', '雷柏V56', 'G60 牧马人游戏鼠标', 'http://172.17.108.1/Graduation-Project/Netbar/Public/image/bar1.png', '戴尔（DELL）UltraSharp U2515H 25英寸2K宽屏LED背光IPS液晶显示器', 'cos装前台  英雄联盟超神送饮料送网费', '4-5');
INSERT INTO `bar` VALUES ('9', '满天星网吧', '9', '9', null, '3', '4', ' 影驰GTX 750Ti 骁将', 'Intel 酷睿i5 4590', '芝奇8G', '1T', '金泰克S310系列（128GB）', '雷柏V56', 'G60 牧马人游戏鼠标', 'http://172.17.108.1/Graduation-Project/Netbar/Public/image/bar1.png', '戴尔（DELL）UltraSharp U2515H 25英寸2K宽屏LED背光IPS液晶显示器', 'cos装前台  英雄联盟超神送饮料送网费', '4-5');
INSERT INTO `bar` VALUES ('10', '满天星网吧', '10', '20', null, '3', '4', ' 影驰GTX 750Ti 骁将', 'Intel 酷睿i5 4590', '芝奇8G', '1T', '金泰克S310系列（128GB）', '雷柏V56', 'G60 牧马人游戏鼠标', 'http://172.17.108.1/Graduation-Project/Netbar/Public/image/bar1.png', '戴尔（DELL）UltraSharp U2515H 25英寸2K宽屏LED背光IPS液晶显示器', 'cos装前台  英雄联盟超神送饮料送网费', '4-5');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `time` text NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '1', '2', '这网吧的机器还不错，机械键盘，还有cos装的妹子前台', '2015-11-26 10:25:44');
INSERT INTO `comment` VALUES ('2', '1', '2', '就是有人抽烟', '2015-12-20 10:25:56');
INSERT INTO `comment` VALUES ('3', '1', '2', '123', '2015-12-20 10:25:56');
INSERT INTO `comment` VALUES ('4', '1', '2', '213', '2015-12-20 10:25:56');
INSERT INTO `comment` VALUES ('5', '1', '2', '3213', '2015-12-20 10:25:56');
INSERT INTO `comment` VALUES ('6', '1', '2', '321321', '2015-12-20 10:25:56');
INSERT INTO `comment` VALUES ('7', '1', '2', '123123', '2015-12-20 10:25:56');
INSERT INTO `comment` VALUES ('8', '1', '3', '123123132', '2015-12-20 10:25:56');
INSERT INTO `comment` VALUES ('9', '1', '2', '13212321', '2015-12-20 10:25:56');
INSERT INTO `comment` VALUES ('10', '1', '2', '13212321', '2015-12-20 10:25:56');

-- ----------------------------
-- Table structure for location
-- ----------------------------
DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` text NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of location
-- ----------------------------
INSERT INTO `location` VALUES ('1', '江苏苏州');
INSERT INTO `location` VALUES ('2', '山东威海');
INSERT INTO `location` VALUES ('3', '湖北天门');

-- ----------------------------
-- Table structure for location_detail
-- ----------------------------
DROP TABLE IF EXISTS `location_detail`;
CREATE TABLE `location_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `location_detail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of location_detail
-- ----------------------------
INSERT INTO `location_detail` VALUES ('1', '3', '钟惺大道89号移动营业厅旁');
INSERT INTO `location_detail` VALUES ('2', '3', '船闸边');
INSERT INTO `location_detail` VALUES ('3', '3', '钟惺大道89号移动营业厅旁');
INSERT INTO `location_detail` VALUES ('4', '3', '钟惺大道89号移动营业厅旁');
INSERT INTO `location_detail` VALUES ('5', '3', '钟惺大道89号移动营业厅旁');
INSERT INTO `location_detail` VALUES ('6', '3', '钟惺大道89号移动营业厅旁');
INSERT INTO `location_detail` VALUES ('7', '3', '钟惺大道89号移动营业厅旁');
INSERT INTO `location_detail` VALUES ('8', '3', '钟惺大道89号移动营业厅旁');
INSERT INTO `location_detail` VALUES ('9', '3', '钟惺大道89号移动营业厅旁');
INSERT INTO `location_detail` VALUES ('10', '3', '钟惺大道89号移动营业厅旁');
INSERT INTO `location_detail` VALUES ('11', '3', '钟惺大道89号移动营业厅旁');

-- ----------------------------
-- Table structure for reply
-- ----------------------------
DROP TABLE IF EXISTS `reply`;
CREATE TABLE `reply` (
  `reply_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `time` text NOT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reply
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `type` int(2) NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `passwd` varchar(255) CHARACTER SET utf8 NOT NULL,
  `question` text CHARACTER SET utf8 NOT NULL,
  `answer` text CHARACTER SET utf8 NOT NULL,
  `photo` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('0000000001', '1', 'hzw', 'hzw', '你的父亲是谁？', '黄志文', null);
INSERT INTO `user` VALUES ('0000000002', '2', 'as', 'as', '你的父亲是谁？', '黄志文', '');
INSERT INTO `user` VALUES ('0000000003', '0', '', '', '你的初恋叫什么名字', '', null);
INSERT INTO `user` VALUES ('0000000004', '0', '', '', '你的初恋叫什么名字', '', null);

-- ----------------------------
-- View structure for bar_detail
-- ----------------------------
DROP VIEW IF EXISTS `bar_detail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `bar_detail` AS SELECT
bar.bar_name,
location_detail.location_detail,
location.location_name,
bar.good,
bar.bad,
bar.GPU,
bar.CPU,
bar.Memory,
bar.Harddisk,
bar.SSD,
bar.Keyboard,
bar.Mouse,
bar.Sofa,
bar.Display,
bar.self_comment,
bar.chair_xml,
bar.id,
bar.price
FROM
bar ,
location_detail ,
location
WHERE
bar.location_detail_id = location_detail.id AND
location_detail.location_id = location.location_id ;
