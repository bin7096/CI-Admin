/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : 127.0.0.1:3306
 Source Schema         : ci

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 08/12/2018 16:51:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ci_admin_access
-- ----------------------------
DROP TABLE IF EXISTS `ci_admin_access`;
CREATE TABLE `ci_admin_access`  (
  `role_id` int(10) NOT NULL COMMENT '角色ID',
  `node_id` int(10) NOT NULL COMMENT '节点ID'
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of ci_admin_access
-- ----------------------------
INSERT INTO `ci_admin_access` VALUES (1, 53);
INSERT INTO `ci_admin_access` VALUES (1, 52);
INSERT INTO `ci_admin_access` VALUES (1, 51);
INSERT INTO `ci_admin_access` VALUES (1, 50);
INSERT INTO `ci_admin_access` VALUES (1, 49);
INSERT INTO `ci_admin_access` VALUES (1, 48);
INSERT INTO `ci_admin_access` VALUES (1, 47);
INSERT INTO `ci_admin_access` VALUES (1, 46);
INSERT INTO `ci_admin_access` VALUES (1, 45);
INSERT INTO `ci_admin_access` VALUES (1, 44);
INSERT INTO `ci_admin_access` VALUES (1, 43);
INSERT INTO `ci_admin_access` VALUES (1, 41);
INSERT INTO `ci_admin_access` VALUES (1, 40);
INSERT INTO `ci_admin_access` VALUES (1, 39);
INSERT INTO `ci_admin_access` VALUES (1, 38);
INSERT INTO `ci_admin_access` VALUES (1, 37);
INSERT INTO `ci_admin_access` VALUES (1, 36);
INSERT INTO `ci_admin_access` VALUES (1, 35);
INSERT INTO `ci_admin_access` VALUES (1, 34);
INSERT INTO `ci_admin_access` VALUES (1, 33);
INSERT INTO `ci_admin_access` VALUES (1, 32);
INSERT INTO `ci_admin_access` VALUES (1, 31);
INSERT INTO `ci_admin_access` VALUES (1, 30);
INSERT INTO `ci_admin_access` VALUES (1, 29);
INSERT INTO `ci_admin_access` VALUES (1, 27);
INSERT INTO `ci_admin_access` VALUES (1, 26);
INSERT INTO `ci_admin_access` VALUES (1, 25);
INSERT INTO `ci_admin_access` VALUES (1, 24);
INSERT INTO `ci_admin_access` VALUES (1, 23);
INSERT INTO `ci_admin_access` VALUES (1, 22);
INSERT INTO `ci_admin_access` VALUES (1, 21);
INSERT INTO `ci_admin_access` VALUES (1, 20);
INSERT INTO `ci_admin_access` VALUES (1, 19);
INSERT INTO `ci_admin_access` VALUES (1, 18);
INSERT INTO `ci_admin_access` VALUES (1, 17);
INSERT INTO `ci_admin_access` VALUES (1, 16);
INSERT INTO `ci_admin_access` VALUES (1, 15);
INSERT INTO `ci_admin_access` VALUES (1, 14);
INSERT INTO `ci_admin_access` VALUES (1, 12);
INSERT INTO `ci_admin_access` VALUES (1, 11);
INSERT INTO `ci_admin_access` VALUES (1, 10);
INSERT INTO `ci_admin_access` VALUES (1, 9);
INSERT INTO `ci_admin_access` VALUES (1, 8);
INSERT INTO `ci_admin_access` VALUES (1, 7);
INSERT INTO `ci_admin_access` VALUES (1, 6);
INSERT INTO `ci_admin_access` VALUES (1, 5);
INSERT INTO `ci_admin_access` VALUES (1, 4);
INSERT INTO `ci_admin_access` VALUES (1, 3);
INSERT INTO `ci_admin_access` VALUES (1, 2);

-- ----------------------------
-- Table structure for ci_admin_generate_func
-- ----------------------------
DROP TABLE IF EXISTS `ci_admin_generate_func`;
CREATE TABLE `ci_admin_generate_func`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '方法名称',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '方法标题',
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '状态（0-禁用，1启用）',
  `sort` int(2) NOT NULL COMMENT '排序序号',
  `isdelete` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0' COMMENT '是否删除（0-否，1-是）',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ci_admin_generate_func
-- ----------------------------
INSERT INTO `ci_admin_generate_func` VALUES (1, 'index', '首页', '1', 1, '0', 1543459729, 1543459729, '');
INSERT INTO `ci_admin_generate_func` VALUES (2, 'add', '添加', '1', 2, '0', 1543459885, 1543459885, '');
INSERT INTO `ci_admin_generate_func` VALUES (3, 'edit', '编辑', '1', 3, '0', 1543461011, 1543461011, '');
INSERT INTO `ci_admin_generate_func` VALUES (4, 'del', '删除', '1', 4, '0', 1543461023, 1543461023, '');
INSERT INTO `ci_admin_generate_func` VALUES (5, 'forbidden', '禁用', '1', 5, '0', 1543461040, 1543461040, '');
INSERT INTO `ci_admin_generate_func` VALUES (6, 'recover', '启用', '1', 6, '0', 1543461060, 1543461060, '');
INSERT INTO `ci_admin_generate_func` VALUES (7, 'show', '查看', '1', 7, '0', 1543461088, 1543461088, '');
INSERT INTO `ci_admin_generate_func` VALUES (8, 'sort', '保存排序', '1', 8, '0', 1543461112, 1543461112, '');
INSERT INTO `ci_admin_generate_func` VALUES (9, 'recycleBin', '回收站', '1', 9, '0', 1543461130, 1543461130, '');
INSERT INTO `ci_admin_generate_func` VALUES (10, 'recycle', '回收', '1', 10, '0', 1543461161, 1543461161, '');
INSERT INTO `ci_admin_generate_func` VALUES (11, 'delForever', '彻底删除', '1', 11, '0', 1543461185, 1543461185, '');

-- ----------------------------
-- Table structure for ci_admin_group
-- ----------------------------
DROP TABLE IF EXISTS `ci_admin_group`;
CREATE TABLE `ci_admin_group`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '组名',
  `icon` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '图标（实体）',
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '状态（0-禁用，1启用）',
  `sort` int(10) NOT NULL DEFAULT 1,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '备注',
  `isdelete` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0' COMMENT '是否删除（0-否，1-是）',
  `create_time` int(10) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(10) NOT NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ci_admin_group
-- ----------------------------
INSERT INTO `ci_admin_group` VALUES (1, '系统管理', '&#xe614;', '1', 1, '系统管理', '0', 1541658969, 1541658969);
INSERT INTO `ci_admin_group` VALUES (2, '自动生成', '&#xe639;', '1', 2, '自动生成', '0', 1542199523, 1542199523);

-- ----------------------------
-- Table structure for ci_admin_node
-- ----------------------------
DROP TABLE IF EXISTS `ci_admin_node`;
CREATE TABLE `ci_admin_node`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL COMMENT '父节点ID',
  `group_id` int(10) NOT NULL COMMENT '所属分组ID',
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '节点名',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '节点名称',
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '备注',
  `level` int(10) NOT NULL DEFAULT 2 COMMENT '层级',
  `type` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0' COMMENT '节点类型（0-控制器，1-方法）',
  `sort` int(10) NOT NULL DEFAULT 0 COMMENT '序号',
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '启用状态（0-禁用，1-启用）',
  `isdelete` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0' COMMENT '软删除状态（0-未删除，1-已删除）',
  `create_time` int(10) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(10) NOT NULL DEFAULT 0 COMMENT '更新时间',
  `is_system` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0' COMMENT '是否是系统节点（0-否，1-是）',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 54 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ci_admin_node
-- ----------------------------
INSERT INTO `ci_admin_node` VALUES (1, 0, 1, 'AdminGroup', '分组管理', '分组管理', 1, '0', 1, '1', '0', 1544251228, 1544251228, '0');
INSERT INTO `ci_admin_node` VALUES (2, 1, 1, 'index', '首页', '首页', 2, '1', 1, '1', '0', 1544251253, 1544251253, '0');
INSERT INTO `ci_admin_node` VALUES (3, 1, 1, 'add', '添加', '添加', 2, '1', 2, '1', '0', 1544251289, 1544251289, '0');
INSERT INTO `ci_admin_node` VALUES (4, 1, 1, 'edit', '编辑', '编辑', 2, '1', 3, '1', '0', 1544251306, 1544251306, '0');
INSERT INTO `ci_admin_node` VALUES (5, 1, 1, 'del', '删除', '删除', 2, '1', 4, '1', '0', 1544251325, 1544251325, '0');
INSERT INTO `ci_admin_node` VALUES (6, 1, 1, 'show', '查看', '查看', 2, '1', 5, '1', '0', 1544251360, 1544251360, '0');
INSERT INTO `ci_admin_node` VALUES (7, 1, 1, 'forbidden', '禁用', '禁用', 2, '1', 6, '1', '0', 1544251396, 1544251396, '0');
INSERT INTO `ci_admin_node` VALUES (8, 1, 1, 'recover', '启用', '启用', 2, '1', 7, '1', '0', 1544251418, 1544251418, '0');
INSERT INTO `ci_admin_node` VALUES (9, 1, 1, 'recycleBin', '回收站', '回收站', 2, '1', 8, '1', '0', 1544251504, 1544251504, '0');
INSERT INTO `ci_admin_node` VALUES (10, 1, 1, 'recycle', '回收', '回收', 2, '1', 9, '1', '0', 1544251525, 1544251525, '0');
INSERT INTO `ci_admin_node` VALUES (11, 1, 1, 'delForever', '彻底删除', '彻底删除', 2, '1', 10, '1', '0', 1544251551, 1544251551, '0');
INSERT INTO `ci_admin_node` VALUES (13, 0, 1, 'AdminNode', '节点管理', '节点管理', 1, '0', 2, '1', '0', 1544251591, 1544251591, '0');
INSERT INTO `ci_admin_node` VALUES (14, 13, 1, 'index', '首页', '首页', 2, '1', 1, '1', '0', 1544251622, 1544251622, '0');
INSERT INTO `ci_admin_node` VALUES (15, 13, 1, 'add', '添加', '添加', 2, '1', 2, '1', '0', 1544251640, 1544251640, '0');
INSERT INTO `ci_admin_node` VALUES (16, 13, 1, 'edit', '编辑', '编辑', 2, '1', 3, '1', '0', 1544251654, 1544251654, '0');
INSERT INTO `ci_admin_node` VALUES (17, 13, 1, 'del', '删除', '删除', 2, '1', 4, '1', '0', 1544251673, 1544251673, '0');
INSERT INTO `ci_admin_node` VALUES (18, 13, 1, 'show', '查看', '查看', 2, '1', 5, '1', '0', 1544251710, 1544251710, '0');
INSERT INTO `ci_admin_node` VALUES (19, 13, 1, 'forbidden', '禁用', '禁用', 2, '1', 6, '1', '0', 1544251739, 1544251739, '0');
INSERT INTO `ci_admin_node` VALUES (20, 13, 1, 'recover', '启用', '启用', 2, '1', 7, '1', '0', 1544251761, 1544251761, '0');
INSERT INTO `ci_admin_node` VALUES (21, 13, 1, 'methodList', '方法列表', '方法列表', 2, '1', 8, '1', '0', 1544251809, 1544251809, '0');
INSERT INTO `ci_admin_node` VALUES (22, 13, 1, 'addMethod', '添加方法', '添加方法', 2, '1', 9, '1', '0', 1544251867, 1544251867, '0');
INSERT INTO `ci_admin_node` VALUES (23, 13, 1, 'editMethod', '编辑方法', '编辑方法', 2, '1', 10, '1', '0', 1544251903, 1544251903, '0');
INSERT INTO `ci_admin_node` VALUES (24, 13, 1, 'delMethod', '删除方法', '删除方法', 2, '1', 11, '1', '0', 1544251930, 1544251930, '0');
INSERT INTO `ci_admin_node` VALUES (25, 13, 1, 'showMethod', '查看方法', '查看方法', 2, '1', 12, '1', '0', 1544252008, 1544252008, '0');
INSERT INTO `ci_admin_node` VALUES (26, 13, 1, 'methodRecycle', '方法回收站', '方法回收站', 2, '1', 13, '1', '0', 1544252059, 1544252059, '0');
INSERT INTO `ci_admin_node` VALUES (28, 0, 1, 'AdminRole', '角色管理', '角色管理', 1, '0', 3, '1', '0', 1544252601, 1544252601, '0');
INSERT INTO `ci_admin_node` VALUES (29, 28, 1, 'index', '首页', '首页', 2, '1', 1, '1', '0', 1544252633, 1544252633, '0');
INSERT INTO `ci_admin_node` VALUES (30, 28, 1, 'add', '添加', '添加', 2, '1', 2, '1', '0', 1544252654, 1544252654, '0');
INSERT INTO `ci_admin_node` VALUES (31, 28, 1, 'edit', '编辑', '编辑', 2, '1', 3, '1', '0', 1544252672, 1544252672, '0');
INSERT INTO `ci_admin_node` VALUES (32, 28, 1, 'del', '删除', '删除', 2, '1', 4, '1', '0', 1544252711, 1544252711, '0');
INSERT INTO `ci_admin_node` VALUES (33, 28, 1, 'show', '查看', '查看', 2, '1', 5, '1', '0', 1544252728, 1544252728, '0');
INSERT INTO `ci_admin_node` VALUES (34, 28, 1, 'users', '查看用户', '查看用户', 2, '1', 6, '1', '0', 1544252780, 1544252780, '0');
INSERT INTO `ci_admin_node` VALUES (35, 28, 1, 'nodes', '授权列表', '授权列表', 2, '1', 7, '1', '0', 1544252815, 1544252815, '0');
INSERT INTO `ci_admin_node` VALUES (36, 28, 1, 'forbidden', '禁用', '禁用', 2, '1', 8, '1', '0', 1544252844, 1544252844, '0');
INSERT INTO `ci_admin_node` VALUES (37, 28, 1, 'recover', '启用', '启用', 2, '1', 9, '1', '0', 1544252863, 1544252863, '0');
INSERT INTO `ci_admin_node` VALUES (38, 28, 1, 'recycleBin', '回收站', '回收站', 2, '1', 10, '1', '0', 1544252886, 1544252886, '0');
INSERT INTO `ci_admin_node` VALUES (39, 28, 1, 'recycle', '回收', '回收', 2, '1', 11, '1', '0', 1544252911, 1544252911, '0');
INSERT INTO `ci_admin_node` VALUES (40, 28, 1, 'delForever', '彻底删除', '彻底删除', 2, '1', 12, '1', '0', 1544252952, 1544252952, '0');
INSERT INTO `ci_admin_node` VALUES (42, 0, 1, 'AdminUser', '用户管理', '用户管理', 1, '0', 4, '1', '0', 1544252995, 1544252995, '0');
INSERT INTO `ci_admin_node` VALUES (12, 1, 1, 'sort', '保存排序', '保存排序', 2, '1', 11, '1', '0', 1544253286, 1544253286, '0');
INSERT INTO `ci_admin_node` VALUES (27, 13, 1, 'sort', '保存排序', '保存排序', 2, '1', 14, '1', '0', 1544253328, 1544253328, '0');
INSERT INTO `ci_admin_node` VALUES (41, 28, 1, 'sort', '保存排序', '保存排序', 2, '1', 13, '1', '0', 1544253369, 1544253369, '0');
INSERT INTO `ci_admin_node` VALUES (43, 42, 1, 'index', '首页', '首页', 2, '1', 1, '1', '0', 1544254343, 1544254343, '0');
INSERT INTO `ci_admin_node` VALUES (44, 42, 1, 'add', '添加', '添加', 2, '1', 2, '1', '0', 1544254380, 1544254380, '0');
INSERT INTO `ci_admin_node` VALUES (45, 42, 1, 'edit', '编辑', '编辑', 2, '1', 3, '1', '0', 1544254393, 1544254393, '0');
INSERT INTO `ci_admin_node` VALUES (46, 42, 1, 'del', '删除', '删除', 2, '1', 4, '1', '0', 1544254408, 1544254408, '0');
INSERT INTO `ci_admin_node` VALUES (47, 42, 1, 'show', '查看', '查看', 2, '1', 5, '1', '0', 1544254425, 1544254425, '0');
INSERT INTO `ci_admin_node` VALUES (48, 42, 1, 'forbidden', '禁用', '禁用', 2, '1', 6, '1', '0', 1544254448, 1544254448, '0');
INSERT INTO `ci_admin_node` VALUES (49, 42, 1, 'recover', '启用', '启用', 2, '1', 7, '1', '0', 1544254468, 1544254468, '0');
INSERT INTO `ci_admin_node` VALUES (50, 42, 1, 'recycleBin', '回收站', '回收站', 2, '1', 8, '1', '0', 1544254493, 1544254493, '0');
INSERT INTO `ci_admin_node` VALUES (51, 42, 1, 'recycle', '回收', '回收', 2, '1', 9, '1', '0', 1544254515, 1544254515, '0');
INSERT INTO `ci_admin_node` VALUES (52, 42, 1, 'delForever', '彻底删除', '彻底删除', 2, '1', 10, '1', '0', 1544254544, 1544254544, '0');
INSERT INTO `ci_admin_node` VALUES (53, 42, 1, 'sort', '保存排序', '保存排序', 2, '1', 11, '1', '0', 1544254574, 1544254574, '0');

-- ----------------------------
-- Table structure for ci_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `ci_admin_role`;
CREATE TABLE `ci_admin_role`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '角色名称',
  `sort` int(10) NOT NULL COMMENT '排序序号',
  `remark` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '备注',
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '启用状态（0-禁用，1-启用）',
  `isdelete` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0' COMMENT '软删除状态（0-未删除，1-已删除）',
  `create_time` int(10) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(10) NOT NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ci_admin_role
-- ----------------------------
INSERT INTO `ci_admin_role` VALUES (1, '超级管理员', 1, '', '1', '0', 1542112352, 1542112352);

-- ----------------------------
-- Table structure for ci_admin_role_user
-- ----------------------------
DROP TABLE IF EXISTS `ci_admin_role_user`;
CREATE TABLE `ci_admin_role_user`  (
  `role_id` int(10) NOT NULL COMMENT '角色ID',
  `user_id` int(10) NOT NULL COMMENT '用户ID'
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of ci_admin_role_user
-- ----------------------------
INSERT INTO `ci_admin_role_user` VALUES (1, 1);

-- ----------------------------
-- Table structure for ci_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `ci_admin_user`;
CREATE TABLE `ci_admin_user`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '登录账户',
  `realname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '用户名称',
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '登录密码',
  `sort` int(10) NOT NULL COMMENT '排序序号',
  `last_login_time` int(10) NULL DEFAULT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '最后登录IP',
  `login_count` int(10) NOT NULL DEFAULT 0 COMMENT '登录次数',
  `email` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '绑定邮箱',
  `mobile` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '绑定手机',
  `remark` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '备注',
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '启用状态（0-禁用，1-启用）',
  `isdelete` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0' COMMENT '软删除状态（0-未删除，1-已删除）',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ci_admin_user
-- ----------------------------
INSERT INTO `ci_admin_user` VALUES (1, 'admin', '超级管理员', 'e10adc3949ba59abbe56e057f20f883e', 1, 1544257989, '127.0.0.1', 0, 'bin_id@163.com', '18600000000', '', '1', '0', 1542112401, 1542112401);

SET FOREIGN_KEY_CHECKS = 1;
