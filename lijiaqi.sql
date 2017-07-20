/*
Navicat MySQL Data Transfer

Source Server         : bnedi
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : lamp66

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-20 17:51:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for albums
-- ----------------------------
DROP TABLE IF EXISTS `albums`;
CREATE TABLE `albums` (
`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`intro`  text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ,
`cover`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`created_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`updated_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of albums
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
`id`  int(255) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`uid`  varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`fname`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=28

;

-- ----------------------------
-- Records of class
-- ----------------------------
BEGIN;
INSERT INTO `class` VALUES ('23', '开始', '0', ''), ('24', '一级', '0,23', '??'), ('25', '阿萨德', '0', ''), ('26', '二级', '0,23', '??'), ('27', '三级', '0,23,26', '??');
COMMIT;

-- ----------------------------
-- Table structure for forms
-- ----------------------------
DROP TABLE IF EXISTS `forms`;
CREATE TABLE `forms` (
`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
`img`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`created_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`updated_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=10

;

-- ----------------------------
-- Records of forms
-- ----------------------------
BEGIN;
INSERT INTO `forms` VALUES ('1', './upload/1500470846739266967.jpg', '2017-07-19 21:27:26', '2017-07-19 21:27:26'), ('2', './upload/1500470872893168945.jpg', '2017-07-19 21:27:52', '2017-07-19 21:27:52'), ('3', './upload/1500470883865887145.jpg', '2017-07-19 21:28:03', '2017-07-19 21:28:03'), ('4', './upload/1500470895765884094.jpg', '2017-07-19 21:28:15', '2017-07-19 21:28:15'), ('5', './upload/1500470906493217163.jpg', '2017-07-19 21:28:26', '2017-07-19 21:28:26'), ('6', './upload/1500470920778392028.jpg', '2017-07-19 21:28:40', '2017-07-19 21:28:40'), ('7', './upload/1500470945736547851.jpg', '2017-07-19 21:29:05', '2017-07-19 21:29:05'), ('8', './upload/1500470967582645874.jpg', '2017-07-19 21:29:27', '2017-07-19 21:29:27'), ('9', './upload/1500470985557932128.jpg', '2017-07-19 21:29:45', '2017-07-19 21:29:45');
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
`migration`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`batch`  int(11) NOT NULL 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('2017_07_05_134226_create_form_table', '1'), ('2017_07_11_074750_create_albums_table', '1'), ('2017_07_11_074819_create_photos_table', '1'), ('2017_07_18_215737_create_users_table', '1');
COMMIT;

-- ----------------------------
-- Table structure for photos
-- ----------------------------
DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
`album_id`  int(11) NOT NULL ,
`name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`intro`  text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ,
`src`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`created_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`updated_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of photos
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`description`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`price`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`imageurl`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`file_id`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`created_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`updated_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`zong`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=9

;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES ('4', '电', 'laravel手册', '10.00', '/admin/1499059469868.jpeg', '4', '2017-07-07 06:01:27', '2017-07-07 06:01:27', '22'), ('5', '动', 'laravel手册', '10.00', '/admin/1499059469868.jpeg', '5', '2017-07-07 06:01:56', '2017-07-07 06:01:56', '12'), ('6', '蓝', '商品3', '10', '/admin/1499059469868.jpeg', '6', '2017-07-07 09:37:20', '2017-07-07 09:37:20', '4'), ('7', '牙', '啊啊', '5', '/admin/1499059469868.jpeg', '7', '2017-07-07 10:47:03', '2017-07-07 10:47:03', '3'), ('8', '杯', '测试', '4', '/admin/1499059469868.jpeg', '8', '2017-07-07 10:58:51', '2017-07-07 10:58:51', '2');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`email`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`password`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`created_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`updated_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
PRIMARY KEY (`id`),
UNIQUE INDEX `users_email_unique` (`email`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'qwe@qwe.com', 'qwe@qwe.com', '$2y$10$tqHJq4F8RU5lUCCqPlYMs.5SMLoXjhtPnYogICGVG5MD.LTj5WbPa', '2017-07-19 20:34:14', '2017-07-19 20:58:18'), ('2', '请问', '123@qq.com', '$2y$10$lf1R0Z0NIKNfcaz3jHzOQOzZ.dyBxhvShFbbBz8ytyJDuUbt5OBti', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', 'qwe', 'qwe@qwe.com.com', '$2y$10$lf1R0Z0NIKNfcaz3jHzOQOzZ.dyBxhvShFbbBz8ytyJDuUbt5OBti', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
-- Table structure for wenzhang
-- ----------------------------
DROP TABLE IF EXISTS `wenzhang`;
CREATE TABLE `wenzhang` (
`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
`tite`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`neirong`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of wenzhang
-- ----------------------------
BEGIN;
INSERT INTO `wenzhang` VALUES ('1', '123123123', '# dasdasdasd');
COMMIT;

-- ----------------------------
-- Auto increment value for albums
-- ----------------------------
ALTER TABLE `albums` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for class
-- ----------------------------
ALTER TABLE `class` AUTO_INCREMENT=28;

-- ----------------------------
-- Auto increment value for forms
-- ----------------------------
ALTER TABLE `forms` AUTO_INCREMENT=10;

-- ----------------------------
-- Auto increment value for photos
-- ----------------------------
ALTER TABLE `photos` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for products
-- ----------------------------
ALTER TABLE `products` AUTO_INCREMENT=9;

-- ----------------------------
-- Auto increment value for users
-- ----------------------------
ALTER TABLE `users` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for wenzhang
-- ----------------------------
ALTER TABLE `wenzhang` AUTO_INCREMENT=2;
