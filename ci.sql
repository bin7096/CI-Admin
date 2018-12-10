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

 Date: 10/12/2018 22:57:29
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
INSERT INTO `ci_admin_access` VALUES (1, 61);
INSERT INTO `ci_admin_access` VALUES (1, 59);
INSERT INTO `ci_admin_access` VALUES (1, 58);
INSERT INTO `ci_admin_access` VALUES (1, 57);
INSERT INTO `ci_admin_access` VALUES (1, 56);
INSERT INTO `ci_admin_access` VALUES (1, 55);
INSERT INTO `ci_admin_access` VALUES (1, 54);
INSERT INTO `ci_admin_access` VALUES (1, 53);
INSERT INTO `ci_admin_access` VALUES (1, 52);
INSERT INTO `ci_admin_access` VALUES (1, 51);
INSERT INTO `ci_admin_access` VALUES (1, 50);
INSERT INTO `ci_admin_access` VALUES (1, 49);
INSERT INTO `ci_admin_access` VALUES (1, 48);
INSERT INTO `ci_admin_access` VALUES (1, 46);
INSERT INTO `ci_admin_access` VALUES (1, 45);
INSERT INTO `ci_admin_access` VALUES (1, 44);
INSERT INTO `ci_admin_access` VALUES (1, 43);
INSERT INTO `ci_admin_access` VALUES (1, 42);
INSERT INTO `ci_admin_access` VALUES (1, 41);
INSERT INTO `ci_admin_access` VALUES (1, 40);
INSERT INTO `ci_admin_access` VALUES (1, 39);
INSERT INTO `ci_admin_access` VALUES (1, 38);
INSERT INTO `ci_admin_access` VALUES (1, 37);
INSERT INTO `ci_admin_access` VALUES (1, 36);
INSERT INTO `ci_admin_access` VALUES (1, 35);
INSERT INTO `ci_admin_access` VALUES (1, 34);
INSERT INTO `ci_admin_access` VALUES (1, 33);
INSERT INTO `ci_admin_access` VALUES (1, 31);
INSERT INTO `ci_admin_access` VALUES (1, 30);
INSERT INTO `ci_admin_access` VALUES (1, 29);
INSERT INTO `ci_admin_access` VALUES (1, 28);
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
INSERT INTO `ci_admin_access` VALUES (1, 13);
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
INSERT INTO `ci_admin_access` VALUES (1, 63);

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
) ENGINE = MyISAM AUTO_INCREMENT = 64 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ci_admin_node
-- ----------------------------
INSERT INTO `ci_admin_node` VALUES (1, 0, 1, 'AdminGroup', '分组管理', '分组管理', 1, '0', 1, '1', '0', 1544451483, 1544451483, '0');
INSERT INTO `ci_admin_node` VALUES (2, 1, 1, 'index', '首页', '首页', 2, '1', 1, '1', '0', 1544451501, 1544451501, '0');
INSERT INTO `ci_admin_node` VALUES (3, 1, 1, 'add', '添加', '添加', 2, '1', 2, '1', '0', 1544451518, 1544451518, '0');
INSERT INTO `ci_admin_node` VALUES (4, 1, 1, 'edit', '编辑', '编辑', 2, '1', 3, '1', '0', 1544451549, 1544451549, '0');
INSERT INTO `ci_admin_node` VALUES (5, 1, 1, 'del', '删除', '删除', 2, '1', 4, '1', '0', 1544451569, 1544451569, '0');
INSERT INTO `ci_admin_node` VALUES (6, 1, 1, 'sort', '排序', '排序', 2, '1', 5, '1', '0', 1544451592, 1544451592, '0');
INSERT INTO `ci_admin_node` VALUES (7, 1, 1, 'status', '修改状态', '修改状态', 2, '1', 6, '1', '0', 1544451626, 1544451626, '0');
INSERT INTO `ci_admin_node` VALUES (8, 1, 1, 'recover', '批量启用', '批量启用', 2, '1', 7, '1', '0', 1544451665, 1544451665, '0');
INSERT INTO `ci_admin_node` VALUES (9, 1, 1, 'forbidden', '批量禁用', '批量禁用', 2, '1', 8, '1', '0', 1544451684, 1544451684, '0');
INSERT INTO `ci_admin_node` VALUES (10, 1, 1, 'show', '查看', '查看', 2, '1', 9, '1', '0', 1544451734, 1544451734, '0');
INSERT INTO `ci_admin_node` VALUES (11, 1, 1, 'recycleBin', '回收站', '回收站', 2, '1', 10, '1', '0', 1544451770, 1544451770, '0');
INSERT INTO `ci_admin_node` VALUES (12, 1, 1, 'recycle', '回收', '回收', 2, '1', 11, '1', '0', 1544451786, 1544451786, '0');
INSERT INTO `ci_admin_node` VALUES (13, 1, 1, 'delForever', '彻底删除', '彻底删除', 2, '1', 12, '1', '0', 1544451809, 1544451809, '0');
INSERT INTO `ci_admin_node` VALUES (14, 0, 1, 'AdminNode', '节点管理', '节点管理', 1, '0', 2, '1', '0', 1544451863, 1544451863, '0');
INSERT INTO `ci_admin_node` VALUES (15, 14, 1, 'index', '首页', '首页', 2, '1', 1, '1', '0', 1544451884, 1544451884, '0');
INSERT INTO `ci_admin_node` VALUES (16, 14, 1, 'add', '添加', '添加', 2, '1', 2, '1', '0', 1544451932, 1544451932, '0');
INSERT INTO `ci_admin_node` VALUES (17, 14, 1, 'edit', '编辑', '编辑', 2, '1', 3, '1', '0', 1544451958, 1544451958, '0');
INSERT INTO `ci_admin_node` VALUES (18, 14, 1, 'del', '删除', '删除', 2, '1', 4, '1', '0', 1544451977, 1544451977, '0');
INSERT INTO `ci_admin_node` VALUES (19, 14, 1, 'sort', '批量排序', '批量排序', 2, '1', 5, '1', '0', 1544452010, 1544452010, '0');
INSERT INTO `ci_admin_node` VALUES (20, 14, 1, 'status', '修改状态', '修改状态', 2, '1', 6, '1', '0', 1544452044, 1544452044, '0');
INSERT INTO `ci_admin_node` VALUES (21, 14, 1, 'recover', '批量启用', '批量启用', 2, '1', 7, '1', '0', 1544452066, 1544452066, '0');
INSERT INTO `ci_admin_node` VALUES (22, 14, 1, 'forbidden', '批量禁用', '批量禁用', 2, '1', 8, '1', '0', 1544452092, 1544452092, '0');
INSERT INTO `ci_admin_node` VALUES (23, 14, 1, 'methodList', '方法列表', '方法列表', 2, '1', 9, '1', '0', 1544452156, 1544452156, '0');
INSERT INTO `ci_admin_node` VALUES (24, 14, 1, 'addMethod', '添加方法', '添加方法', 2, '1', 10, '1', '0', 1544452193, 1544452193, '0');
INSERT INTO `ci_admin_node` VALUES (25, 14, 1, 'editMethod', '编辑方法', '编辑方法', 2, '1', 11, '1', '0', 1544452228, 1544452228, '0');
INSERT INTO `ci_admin_node` VALUES (26, 14, 1, 'showMethod', '查看方法', '查看方法', 2, '1', 12, '1', '0', 1544452257, 1544452257, '0');
INSERT INTO `ci_admin_node` VALUES (27, 14, 1, 'methodRecycle', '方法回收站', '方法回收站', 2, '1', 13, '1', '0', 1544452284, 1544452284, '0');
INSERT INTO `ci_admin_node` VALUES (28, 14, 1, 'show', '查看', '查看', 2, '1', 17, '1', '0', 1544452452, 1544452452, '0');
INSERT INTO `ci_admin_node` VALUES (29, 14, 1, 'recycleBin', '回收站', '回收站', 2, '1', 14, '1', '0', 1544452309, 1544452309, '0');
INSERT INTO `ci_admin_node` VALUES (30, 14, 1, 'recycle', '回收', '回收', 2, '1', 15, '1', '0', 1544452333, 1544452333, '0');
INSERT INTO `ci_admin_node` VALUES (31, 14, 1, 'delForever', '彻底删除', '彻底删除', 2, '1', 16, '1', '0', 1544452370, 1544452370, '0');
INSERT INTO `ci_admin_node` VALUES (32, 0, 1, 'AdminRole', '角色管理', '角色管理', 1, '0', 3, '1', '0', 1544452499, 1544452499, '0');
INSERT INTO `ci_admin_node` VALUES (33, 32, 1, 'index', '首页', '首页', 2, '1', 1, '1', '0', 1544452546, 1544452546, '0');
INSERT INTO `ci_admin_node` VALUES (34, 32, 1, 'add', '添加', 'add', 2, '1', 2, '1', '0', 1544452559, 1544452559, '0');
INSERT INTO `ci_admin_node` VALUES (35, 32, 1, 'edit', '编辑', '编辑', 2, '1', 3, '1', '0', 1544452580, 1544452580, '0');
INSERT INTO `ci_admin_node` VALUES (36, 32, 1, 'del', '删除', '删除', 2, '1', 4, '1', '0', 1544452595, 1544452595, '0');
INSERT INTO `ci_admin_node` VALUES (37, 32, 1, 'sort', '批量排序', '批量排序', 2, '1', 5, '1', '0', 1544452615, 1544452615, '0');
INSERT INTO `ci_admin_node` VALUES (38, 32, 1, 'status', '修改状态', '修改状态', 2, '1', 6, '1', '0', 1544452734, 1544452734, '0');
INSERT INTO `ci_admin_node` VALUES (39, 32, 1, 'recover', '批量启用', '批量启用', 2, '1', 7, '1', '0', 1544452762, 1544452762, '0');
INSERT INTO `ci_admin_node` VALUES (40, 32, 1, 'forbidden', '批量禁用', '批量禁用', 2, '1', 8, '1', '0', 1544452787, 1544452787, '0');
INSERT INTO `ci_admin_node` VALUES (41, 32, 1, 'show', '查看', '查看', 2, '1', 9, '1', '0', 1544452845, 1544452845, '0');
INSERT INTO `ci_admin_node` VALUES (42, 32, 1, 'users', '用户列表', '用户列表', 2, '1', 10, '1', '0', 1544452872, 1544452872, '0');
INSERT INTO `ci_admin_node` VALUES (43, 32, 1, 'nodes', '授权列表', '授权列表', 2, '1', 11, '1', '0', 1544452891, 1544452891, '0');
INSERT INTO `ci_admin_node` VALUES (44, 32, 1, 'recycleBin', '回收站', '回收站', 2, '1', 12, '1', '0', 1544452914, 1544452914, '0');
INSERT INTO `ci_admin_node` VALUES (45, 32, 1, 'recycle', '回收', '回收', 2, '1', 13, '1', '0', 1544452931, 1544452931, '0');
INSERT INTO `ci_admin_node` VALUES (46, 32, 1, 'delForever', '彻底删除', '彻底删除', 2, '1', 14, '1', '0', 1544452952, 1544452952, '0');
INSERT INTO `ci_admin_node` VALUES (47, 0, 1, 'AdminUser', '用户管理', '用户管理', 1, '0', 4, '1', '0', 1544452990, 1544452990, '0');
INSERT INTO `ci_admin_node` VALUES (48, 47, 1, 'index', '首页', '首页', 2, '1', 1, '1', '0', 1544453034, 1544453034, '0');
INSERT INTO `ci_admin_node` VALUES (49, 47, 1, 'add', '添加', '添加', 2, '1', 2, '1', '0', 1544453050, 1544453050, '0');
INSERT INTO `ci_admin_node` VALUES (50, 47, 1, 'edit', '编辑', '编辑', 2, '1', 3, '1', '0', 1544453068, 1544453068, '0');
INSERT INTO `ci_admin_node` VALUES (51, 47, 1, 'del', '删除', '删除', 2, '1', 4, '1', '0', 1544453068, 1544453068, '0');
INSERT INTO `ci_admin_node` VALUES (52, 47, 1, 'sort', '批量排序', '批量排序', 2, '1', 5, '1', '0', 1544453134, 1544453134, '0');
INSERT INTO `ci_admin_node` VALUES (53, 47, 1, 'status', '修改状态', '修改状态', 2, '1', 6, '1', '0', 1544453161, 1544453161, '0');
INSERT INTO `ci_admin_node` VALUES (54, 47, 1, 'recover', '批量启用', '批量启用', 2, '1', 7, '1', '0', 1544453194, 1544453194, '0');
INSERT INTO `ci_admin_node` VALUES (55, 47, 1, 'forbidden', '批量禁用', '批量禁用', 2, '1', 8, '1', '0', 1544453215, 1544453215, '0');
INSERT INTO `ci_admin_node` VALUES (56, 47, 1, 'show', '查看', '查看', 2, '1', 9, '1', '0', 1544453246, 1544453246, '0');
INSERT INTO `ci_admin_node` VALUES (57, 47, 1, 'recycleBin', '回收站', '回收站', 2, '1', 10, '1', '0', 1544453266, 1544453266, '0');
INSERT INTO `ci_admin_node` VALUES (58, 47, 1, 'recycle', '回收', '回收', 2, '1', 11, '1', '0', 1544453284, 1544453284, '0');
INSERT INTO `ci_admin_node` VALUES (59, 47, 1, 'delForever', '彻底删除', '彻底删除', 2, '1', 12, '1', '0', 1544453303, 1544453303, '0');
INSERT INTO `ci_admin_node` VALUES (60, 0, 2, 'GenerateNode', '节点自动生成', '节点自动生成', 1, '0', 1, '1', '0', 1544453357, 1544453357, '0');
INSERT INTO `ci_admin_node` VALUES (61, 60, 2, 'index', '首页', '首页', 2, '1', 1, '1', '0', 1544453376, 1544453376, '0');
INSERT INTO `ci_admin_node` VALUES (62, 0, 2, 'GenerateList', '列表自动生成', '列表自动生成', 1, '0', 2, '1', '0', 1544453405, 1544453405, '0');
INSERT INTO `ci_admin_node` VALUES (63, 62, 2, 'index', '首页', '首页', 2, '1', 1, '1', '0', 1544453529, 1544453529, '0');

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
INSERT INTO `ci_admin_user` VALUES (1, 'admin', '超级管理员', 'e10adc3949ba59abbe56e057f20f883e', 1, 1544447984, '127.0.0.1', 0, 'bin_id@163.com', '18600000000', '', '1', '0', 1542112401, 1542112401);

SET FOREIGN_KEY_CHECKS = 1;
