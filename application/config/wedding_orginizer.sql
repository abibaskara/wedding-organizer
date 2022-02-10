/*
 Navicat Premium Data Transfer

 Source Server         : laragon
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : wedding_orginizer

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 06/12/2021 09:18:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_category`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, 'Catering');
INSERT INTO `category` VALUES (2, 'Dekorasi');
INSERT INTO `category` VALUES (3, 'Gaun Pengantin');
INSERT INTO `category` VALUES (4, 'Souvenir');

-- ----------------------------
-- Table structure for detail_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `detail_pembelian`;
CREATE TABLE `detail_pembelian`  (
  `id_detail` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kuantiti` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_pembelian
-- ----------------------------

-- ----------------------------
-- Table structure for pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran`  (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_rekening_dp` int(11) NOT NULL,
  `id_rekening_lunas` int(11) NULL DEFAULT NULL,
  `tgl_pembayaran_dp` date NOT NULL,
  `tgl_pembayaran_lunas` date NULL DEFAULT NULL,
  `bayar` int(11) NOT NULL,
  `foto_dp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto_lunas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` enum('1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pembayaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian`  (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `order_number` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` enum('1','2','3','4','5') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pembelian`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembelian
-- ----------------------------

-- ----------------------------
-- Table structure for produk
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES (1, 2, '1a03669b881884e6f79c496bdf851016.jpg', 'Elegant Pink', 15000000, 'Dekorasi Elegant Pink dengan Nuansa Pink');

-- ----------------------------
-- Table structure for rekening
-- ----------------------------
DROP TABLE IF EXISTS `rekening`;
CREATE TABLE `rekening`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_rekening` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rekening
-- ----------------------------
INSERT INTO `rekening` VALUES (1, 'BNI', 1234567890);
INSERT INTO `rekening` VALUES (2, 'BCA', 2147483647);
INSERT INTO `rekening` VALUES (3, 'BRI', 2147483647);
INSERT INTO `rekening` VALUES (4, 'MANDIRI', 2147483647);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gender` enum('L','P') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `role` enum('Admin','Owner','Customer') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_active` enum('1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (2, 'admin1', 'admin@gmail.com', '$2y$10$t5TJo2TaRGc0qd1Dz5nzrefFK1d/7tNa98M3H0wYWIJy/S0BGxfpW', '', '', 'L', 'Admin', '1', NULL);
INSERT INTO `user` VALUES (5, 'customer', 'customer@gmail.com', '$2y$10$UtcQN9HpVs6OFah4MTg1q.hLySNK6xi.IMRqJAyk27UDOLfcJYFHm', '081234567890', 'Bandung', 'L', 'Customer', '1', NULL);
INSERT INTO `user` VALUES (6, 'Owner', 'owner@gmail.com', '$2y$10$N68t6hwVvK6ZZZcCD9fDiOSFNA3LqBc1t1/gtX9iVIkMMZKKjm6Aa', '', '', NULL, 'Owner', '1', NULL);

SET FOREIGN_KEY_CHECKS = 1;
