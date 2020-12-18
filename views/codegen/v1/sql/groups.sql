/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MariaDB
 Source Server Version : 100311
 Source Host           : localhost:3306
 Source Schema         : abc

 Target Server Type    : MariaDB
 Target Server Version : 100311
 File Encoding         : 65001

 Date: 15/12/2020 00:21:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'Admin', 'Administrators');
INSERT INTO `groups` VALUES (2, 'Exec', 'Executives');
INSERT INTO `groups` VALUES (3, 'Mgr', 'Managers');
INSERT INTO `groups` VALUES (4, 'Sup', 'Supervisors');
INSERT INTO `groups` VALUES (5, 'Emp', 'Employees');

SET FOREIGN_KEY_CHECKS = 1;
