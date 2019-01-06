/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : dev_easyto

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-12-20 10:41:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for faq
-- ----------------------------
DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `content` text NOT NULL,
  `creat_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of faq
-- ----------------------------

-- ----------------------------
-- Table structure for history
-- ----------------------------
DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `h_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `year` varchar(255) NOT NULL DEFAULT '' COMMENT '年',
  `month` varchar(255) NOT NULL DEFAULT '' COMMENT '月',
  `content` text NOT NULL COMMENT '文本',
  `creat_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  PRIMARY KEY (`h_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of history
-- ----------------------------

-- ----------------------------
-- Table structure for job
-- ----------------------------
DROP TABLE IF EXISTS `job`;
CREATE TABLE `job` (
  `j_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `job` varchar(255) NOT NULL DEFAULT '' COMMENT '岗位',
  `department` varchar(255) NOT NULL DEFAULT '' COMMENT '部门',
  `country` varchar(255) NOT NULL DEFAULT '' COMMENT '国家',
  `city` varchar(255) NOT NULL DEFAULT '' COMMENT '城市',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `content` text NOT NULL COMMENT '文本',
  `creat_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  PRIMARY KEY (`j_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cover` varchar(255) NOT NULL DEFAULT '' COMMENT '封面',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `creat_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  PRIMARY KEY (`n_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'superUser@163.com', 'superUser@163.com', null, '$2y$10$PDmJiow09vp.0WwP.GEI6upUUnOEYBYL0wO.y.eD7vxXXK1ajuRHO', null, '2018-12-21 07:39:46', '2018-12-21 07:39:46');

-- ----------------------------
-- Table structure for website_theme
-- ----------------------------
DROP TABLE IF EXISTS `website_theme`;
CREATE TABLE `website_theme` (
  `wt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `link` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转链接',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '文件路径',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `type` enum('banner') NOT NULL DEFAULT 'banner' COMMENT '文件类型',
  `creat_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  PRIMARY KEY (`wt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of website_theme
-- ----------------------------
