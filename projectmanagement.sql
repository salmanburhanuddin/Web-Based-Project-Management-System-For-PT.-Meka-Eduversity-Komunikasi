/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : projectmanagement

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 07/12/2022 16:20:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_anggota_project
-- ----------------------------
DROP TABLE IF EXISTS `tb_anggota_project`;
CREATE TABLE `tb_anggota_project`  (
  `id_anggota_project` int NOT NULL AUTO_INCREMENT,
  `id_project` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_anggota_project`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_anggota_project
-- ----------------------------
INSERT INTO `tb_anggota_project` VALUES (14, 1, 3);
INSERT INTO `tb_anggota_project` VALUES (15, 1, 4);
INSERT INTO `tb_anggota_project` VALUES (16, 1, 6);
INSERT INTO `tb_anggota_project` VALUES (17, 4, 2);
INSERT INTO `tb_anggota_project` VALUES (18, 4, 4);
INSERT INTO `tb_anggota_project` VALUES (19, 4, 5);
INSERT INTO `tb_anggota_project` VALUES (29, 3, 2);
INSERT INTO `tb_anggota_project` VALUES (30, 3, 5);
INSERT INTO `tb_anggota_project` VALUES (31, 6, 2);
INSERT INTO `tb_anggota_project` VALUES (32, 6, 5);
INSERT INTO `tb_anggota_project` VALUES (33, 7, 4);
INSERT INTO `tb_anggota_project` VALUES (35, 9, 5);

-- ----------------------------
-- Table structure for tb_data_project
-- ----------------------------
DROP TABLE IF EXISTS `tb_data_project`;
CREATE TABLE `tb_data_project`  (
  `id_project` int NOT NULL AUTO_INCREMENT,
  `nama_project` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `progress` varchar(110) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `project_pic` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_project`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_data_project
-- ----------------------------
INSERT INTO `tb_data_project` VALUES (1, 'p1', 'Batal', NULL, 'Yuli', 'Salman', '2022-12-06 21:59:32');
INSERT INTO `tb_data_project` VALUES (3, 'p2', 'Ditunda', NULL, 'Robithulhaq', 'Salman', '2022-12-06 22:31:32');
INSERT INTO `tb_data_project` VALUES (4, 'p3', 'Berlangsung', NULL, 'Yuli', 'Yuli', '2022-12-07 22:38:45');
INSERT INTO `tb_data_project` VALUES (6, 'p4', 'Berlangsung', NULL, 'Robithulhaq', 'Salman', '2022-12-07 15:41:41');
INSERT INTO `tb_data_project` VALUES (7, 'p5', 'Berlangsung', '40', 'Yuli', 'Salman', '2022-12-07 16:02:45');
INSERT INTO `tb_data_project` VALUES (9, 'cek berlangsung', 'Berlangsung', '20', 'Yuli', 'Salman', '2022-12-07 16:19:01');

-- ----------------------------
-- Table structure for tb_history_status
-- ----------------------------
DROP TABLE IF EXISTS `tb_history_status`;
CREATE TABLE `tb_history_status`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_project` int NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_history_status
-- ----------------------------
INSERT INTO `tb_history_status` VALUES (1, 1, 'Selesai', 'Salman', '2022-12-06 21:59:32.000000');
INSERT INTO `tb_history_status` VALUES (6, 3, 'Berlangsung', 'Salman', '2022-12-06 22:31:32.000000');
INSERT INTO `tb_history_status` VALUES (7, 1, 'Batal', 'Yuli', '2022-12-06 22:36:01.000000');
INSERT INTO `tb_history_status` VALUES (8, 4, 'Berlangsung', 'Yuli', '2022-12-06 22:38:45.000000');
INSERT INTO `tb_history_status` VALUES (11, 3, 'Berlangsung', 'Salman', '2022-12-07 15:03:00.720123');
INSERT INTO `tb_history_status` VALUES (12, 3, 'Ditunda', 'Salman', '2022-12-07 15:03:14.000000');
INSERT INTO `tb_history_status` VALUES (13, 6, 'Berlangsung', 'Salman', '2022-12-07 15:41:41.000000');
INSERT INTO `tb_history_status` VALUES (14, 7, 'Berlangsung', 'Salman', '2022-12-07 16:02:45.000000');
INSERT INTO `tb_history_status` VALUES (16, 9, 'Berlangsung', 'Salman', '2022-12-07 16:19:01.000000');

-- ----------------------------
-- Table structure for tb_level
-- ----------------------------
DROP TABLE IF EXISTS `tb_level`;
CREATE TABLE `tb_level`  (
  `id_level` int NOT NULL,
  `nama_level` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_level
-- ----------------------------
INSERT INTO `tb_level` VALUES (1, 'Administrator');
INSERT INTO `tb_level` VALUES (2, 'Tax & Accounting');
INSERT INTO `tb_level` VALUES (3, 'Sales & Marketing');
INSERT INTO `tb_level` VALUES (4, 'Social Media');
INSERT INTO `tb_level` VALUES (5, 'Creative');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `id_user` int NOT NULL,
  `username` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_user` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_level` int NOT NULL,
  `status` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (1, 'admin', '123', 'Salman', 1, 'aktif');
INSERT INTO `tb_user` VALUES (2, 'Zihan', '123', 'Zihan Admin', 1, 'aktif');
INSERT INTO `tb_user` VALUES (3, 'Yuli', '123', 'Yuli', 2, 'aktif');
INSERT INTO `tb_user` VALUES (4, 'Migunani', '123', 'Migunani', 3, 'aktif');
INSERT INTO `tb_user` VALUES (5, 'Ute', '123', 'Sugiastutik', 4, 'aktif');
INSERT INTO `tb_user` VALUES (6, 'Robithulhaq', '123', 'Robi', 5, 'aktif');
INSERT INTO `tb_user` VALUES (0, 'Jojo', '123', 'Jojo Valentino', 4, 'nonaktif');

SET FOREIGN_KEY_CHECKS = 1;
