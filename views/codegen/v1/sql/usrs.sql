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

 Date: 15/12/2020 00:20:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for usrs
-- ----------------------------
DROP TABLE IF EXISTS `usrs`;
CREATE TABLE `usrs`  (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birthdate` datetime(0) NULL DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `salary` decimal(10, 2) NULL DEFAULT NULL,
  `group_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `age` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usrs
-- ----------------------------
INSERT INTO `usrs` VALUES (1, 'Noelia O\'Kon', 'asperiores', 'otho.smitham@example.com', '2028-06-01 00:00:00', 'F', 13098.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 42);
INSERT INTO `usrs` VALUES (2, 'Mr. Enid Von PhD', 'alias', 'pollich.cecilia@example.com', '2018-09-01 00:00:00', 'M', 35978.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 30);
INSERT INTO `usrs` VALUES (3, 'Colton Koch', 'id', 'little.myrna@example.net', '2029-10-01 00:00:00', 'F', 26278.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 52);
INSERT INTO `usrs` VALUES (4, 'Gregory Vandervort', 'vel', 'dock47@example.org', '2012-12-01 00:00:00', 'M', 25537.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 31);
INSERT INTO `usrs` VALUES (5, 'Miss Rahsaan Heaney IV', 'qui', 'ugrady@example.org', '2027-11-01 00:00:00', 'F', 49003.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 25);
INSERT INTO `usrs` VALUES (6, 'Ms. Crystel Zemlak IV', 'reiciendis', 'amari.rau@example.com', '2012-09-01 00:00:00', 'F', 12383.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 52);
INSERT INTO `usrs` VALUES (7, 'Nona McDermott', 'quaerat', 'adrien.baumbach@example.org', '2001-10-01 00:00:00', 'F', 18512.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 35);
INSERT INTO `usrs` VALUES (8, 'Miss Genoveva Murazik V', 'rerum', 'ohettinger@example.net', '2019-10-01 00:00:00', 'F', 31209.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 32);
INSERT INTO `usrs` VALUES (9, 'Beulah Huels', 'non', 'stefan99@example.com', '2004-09-01 00:00:00', 'F', 36920.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 57);
INSERT INTO `usrs` VALUES (10, 'Zoe Klein', 'ex', 'ejacobson@example.org', '2019-04-01 00:00:00', 'F', 35616.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 30);
INSERT INTO `usrs` VALUES (11, 'Vickie Kiehn', 'assumenda', 'ayost@example.com', '2020-04-01 00:00:00', 'F', 30790.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 32);
INSERT INTO `usrs` VALUES (12, 'Elwyn Herzog', 'praesentium', 'ckassulke@example.net', '2022-01-01 00:00:00', 'M', 35785.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 30);
INSERT INTO `usrs` VALUES (13, 'Selena Hettinger', 'et', 'bashirian.hyman@example.net', '2001-10-01 00:00:00', 'F', 31836.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 39);
INSERT INTO `usrs` VALUES (14, 'Edwin Beier', 'eos', 'janis71@example.org', '2013-10-01 00:00:00', 'M', 11902.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 42);
INSERT INTO `usrs` VALUES (15, 'Lexi Braun MD', 'autem', 'dusty74@example.net', '2007-12-01 00:00:00', 'F', 11927.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 49);
INSERT INTO `usrs` VALUES (16, 'Jovany Spencer', 'fugit', 'gbogisich@example.org', '2023-04-01 00:00:00', 'F', 44686.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 46);
INSERT INTO `usrs` VALUES (17, 'Prof. Maci Anderson DVM', 'dolorem', 'btorp@example.com', '2030-03-01 00:00:00', 'M', 25055.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 32);
INSERT INTO `usrs` VALUES (18, 'Joel Kulas MD', 'sed', 'phoebe.sauer@example.org', '2026-10-01 00:00:00', 'F', 11650.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 28);
INSERT INTO `usrs` VALUES (19, 'Mr. Dawson Greenholt', 'nostrum', 'asawayn@example.org', '2023-08-01 00:00:00', 'F', 46962.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 57);
INSERT INTO `usrs` VALUES (20, 'Prof. Lloyd Green', 'velit', 'laila.hintz@example.org', '2031-10-01 00:00:00', 'M', 12928.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 50);
INSERT INTO `usrs` VALUES (21, 'Shayna Morar', 'rerum', 'wfay@example.org', '2024-01-01 00:00:00', 'F', 22638.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 29);
INSERT INTO `usrs` VALUES (22, 'Krista Schulist', 'qui', 'gregoria.jakubowski@example.com', '2016-08-01 00:00:00', 'F', 49345.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 46);
INSERT INTO `usrs` VALUES (23, 'Leone Lemke', 'repellat', 'ltorphy@example.com', '2027-06-01 00:00:00', 'M', 17560.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 45);
INSERT INTO `usrs` VALUES (24, 'Dr. Willie Kemmer II', 'quasi', 'ivy51@example.net', '2006-04-01 00:00:00', 'F', 35370.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 33);
INSERT INTO `usrs` VALUES (25, 'Deonte Lebsack', 'nesciunt', 'alisa83@example.net', '2026-01-01 00:00:00', 'M', 32725.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 27);
INSERT INTO `usrs` VALUES (26, 'Prof. Shayne Nader', 'voluptas', 'bosco.shaina@example.net', '2026-10-01 00:00:00', 'F', 9844.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 27);
INSERT INTO `usrs` VALUES (27, 'Prof. Kennith Kertzmann', 'alias', 'satterfield.jonathan@example.com', '2031-01-01 00:00:00', 'F', 41950.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 28);
INSERT INTO `usrs` VALUES (28, 'Miss Meagan O\'Keefe', 'corporis', 'tracy.barrows@example.com', '2004-05-01 00:00:00', 'M', 41803.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 53);
INSERT INTO `usrs` VALUES (29, 'Prof. Edward Pagac MD', 'quia', 'gerhard65@example.org', '2022-09-01 00:00:00', 'F', 22896.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 47);
INSERT INTO `usrs` VALUES (30, 'Samantha Weissnat', 'est', 'crystel66@example.net', '2011-07-01 00:00:00', 'M', 18805.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 46);
INSERT INTO `usrs` VALUES (31, 'Dr. Gilbert Ward', 'dolorum', 'sandrine06@example.net', '2022-08-01 00:00:00', 'F', 16644.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 36);
INSERT INTO `usrs` VALUES (32, 'Mike West', 'laudantium', 'jborer@example.net', '2007-11-01 00:00:00', 'M', 35728.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 46);
INSERT INTO `usrs` VALUES (33, 'Prof. Isabell Cruickshank I', 'recusandae', 'ondricka.lurline@example.org', '2015-06-01 00:00:00', 'F', 44574.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 38);
INSERT INTO `usrs` VALUES (34, 'Prof. Lonny Rath', 'nihil', 'rfeest@example.net', '2023-04-01 00:00:00', 'F', 19949.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 51);
INSERT INTO `usrs` VALUES (35, 'Santina Medhurst MD', 'suscipit', 'ila24@example.net', '2004-11-01 00:00:00', 'F', 36323.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 55);
INSERT INTO `usrs` VALUES (36, 'Jeff Lehner', 'quo', 'jarred77@example.com', '2018-05-01 00:00:00', 'F', 48462.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 45);
INSERT INTO `usrs` VALUES (37, 'Samanta Pfeffer', 'officia', 'fgoyette@example.net', '2027-08-01 00:00:00', 'F', 19601.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 46);
INSERT INTO `usrs` VALUES (38, 'Ofelia Torp', 'a', 'ericka44@example.net', '2001-09-01 00:00:00', 'M', 33149.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 39);
INSERT INTO `usrs` VALUES (39, 'Mrs. Margarete Raynor', 'quia', 'jlegros@example.net', '2012-03-01 00:00:00', 'M', 21951.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 43);
INSERT INTO `usrs` VALUES (40, 'Mr. Brant Howell V', 'perspiciatis', 'franecki.gerald@example.org', '2001-03-01 00:00:00', 'M', 41552.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 56);
INSERT INTO `usrs` VALUES (41, 'Reilly Ruecker DVM', 'ad', 'ldeckow@example.net', '2017-07-01 00:00:00', 'M', 22709.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 45);
INSERT INTO `usrs` VALUES (42, 'Zachery McDermott', 'molestiae', 'gladyce84@example.com', '2017-04-01 00:00:00', 'F', 32354.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 28);
INSERT INTO `usrs` VALUES (43, 'Heloise Kulas', 'aut', 'kessler.helen@example.net', '2011-12-01 00:00:00', 'M', 45086.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 58);
INSERT INTO `usrs` VALUES (44, 'Norma Dibbert', 'amet', 'eudora36@example.net', '2021-01-01 00:00:00', 'F', 15661.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 49);
INSERT INTO `usrs` VALUES (45, 'Immanuel Auer', 'quia', 'halvorson.theodora@example.org', '2006-06-01 00:00:00', 'M', 15862.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 42);
INSERT INTO `usrs` VALUES (46, 'Lamont Borer', 'expedita', 'trantow.neoma@example.com', '2026-06-01 00:00:00', 'M', 12544.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 28);
INSERT INTO `usrs` VALUES (47, 'Brooke Purdy', 'cupiditate', 'bhermiston@example.net', '2019-11-01 00:00:00', 'M', 14457.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 54);
INSERT INTO `usrs` VALUES (48, 'Dr. Leo Dach', 'et', 'camila.ward@example.com', '2011-01-01 00:00:00', 'F', 40278.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 52);
INSERT INTO `usrs` VALUES (49, 'Krystal Langosh', 'voluptatum', 'pacocha.yesenia@example.org', '2018-02-01 00:00:00', 'M', 9305.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 37);
INSERT INTO `usrs` VALUES (50, 'Florence Greenfelder', 'odit', 'kenyatta.oconnell@example.com', '2020-08-01 00:00:00', 'F', 36980.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 42);
INSERT INTO `usrs` VALUES (51, 'Maxime Turcotte', 'aut', 'davis.kylee@example.org', '2007-05-01 00:00:00', 'F', 46557.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 38);
INSERT INTO `usrs` VALUES (52, 'Alfonzo Dach', 'velit', 'bahringer.constantin@example.org', '2024-04-01 00:00:00', 'M', 40084.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 53);
INSERT INTO `usrs` VALUES (53, 'Queenie Murray II', 'itaque', 'syble12@example.org', '2007-01-01 00:00:00', 'F', 32378.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 57);
INSERT INTO `usrs` VALUES (54, 'Mr. Jerel Rodriguez', 'quo', 'mohr.lacy@example.com', '2018-03-01 00:00:00', 'F', 37916.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 45);
INSERT INTO `usrs` VALUES (55, 'Prof. Davonte Armstrong DDS', 'deleniti', 'linnie08@example.org', '2025-12-01 00:00:00', 'M', 29205.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 34);
INSERT INTO `usrs` VALUES (56, 'Ahmad Ortiz Jr.', 'in', 'lkulas@example.com', '2012-09-01 00:00:00', 'F', 44326.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 28);
INSERT INTO `usrs` VALUES (57, 'Linda Goodwin', 'qui', 'feeney.daisha@example.org', '2028-03-01 00:00:00', 'F', 13199.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 39);
INSERT INTO `usrs` VALUES (58, 'Eugenia Kub', 'aut', 'iklein@example.org', '2011-12-01 00:00:00', 'M', 11049.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 36);
INSERT INTO `usrs` VALUES (59, 'Cade Parker V', 'necessitatibus', 'katheryn74@example.com', '2009-12-01 00:00:00', 'F', 23659.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 43);
INSERT INTO `usrs` VALUES (60, 'Prof. Freddie Fahey', 'aperiam', 'powlowski.delilah@example.org', '2027-03-01 00:00:00', 'F', 30045.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 57);
INSERT INTO `usrs` VALUES (61, 'Elian Kreiger', 'aut', 'hills.karine@example.net', '2028-06-01 00:00:00', 'M', 17526.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 29);
INSERT INTO `usrs` VALUES (62, 'Ewell Hagenes', 'nihil', 'harmony60@example.org', '2008-03-01 00:00:00', 'M', 32244.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 57);
INSERT INTO `usrs` VALUES (63, 'Don Haag', 'nemo', 'tschmidt@example.net', '2002-08-01 00:00:00', 'F', 9164.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 57);
INSERT INTO `usrs` VALUES (64, 'Sigurd Boehm', 'unde', 'devante31@example.com', '2001-06-01 00:00:00', 'M', 33670.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 39);
INSERT INTO `usrs` VALUES (65, 'Mr. Westley McDermott DDS', 'possimus', 'klockman@example.org', '2022-11-01 00:00:00', 'F', 13181.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 27);
INSERT INTO `usrs` VALUES (66, 'Miss Lisette Wuckert II', 'dolores', 'chauncey.shields@example.com', '2025-03-01 00:00:00', 'M', 11111.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 37);
INSERT INTO `usrs` VALUES (67, 'Paris Johnson Jr.', 'voluptas', 'vandervort.adrain@example.net', '2014-06-01 00:00:00', 'F', 30143.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 38);
INSERT INTO `usrs` VALUES (68, 'Ms. Dawn Bauch III', 'voluptatem', 'crath@example.net', '2012-12-01 00:00:00', 'F', 12163.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 43);
INSERT INTO `usrs` VALUES (69, 'Kaelyn Padberg', 'vel', 'huel.harold@example.org', '2015-01-01 00:00:00', 'F', 45323.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 56);
INSERT INTO `usrs` VALUES (70, 'Elna Lowe', 'aut', 'briana57@example.net', '2018-07-01 00:00:00', 'M', 33642.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 51);
INSERT INTO `usrs` VALUES (71, 'Miss Marianna Johnson', 'doloribus', 'marilou.schiller@example.com', '2014-07-01 00:00:00', 'F', 34200.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 44);
INSERT INTO `usrs` VALUES (72, 'Dr. Dandre Bergnaum II', 'dignissimos', 'kjast@example.com', '2018-06-01 00:00:00', 'M', 37690.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 48);
INSERT INTO `usrs` VALUES (73, 'Mrs. Carolina Beier', 'quaerat', 'harvey.nicole@example.com', '2024-06-01 00:00:00', 'M', 20684.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 50);
INSERT INTO `usrs` VALUES (74, 'Ulices Abbott Jr.', 'magni', 'lavada.hauck@example.net', '2019-02-01 00:00:00', 'M', 36913.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 55);
INSERT INTO `usrs` VALUES (75, 'Edwin Hirthe', 'sit', 'ugaylord@example.com', '2027-03-01 00:00:00', 'M', 44386.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 37);
INSERT INTO `usrs` VALUES (76, 'Laurie Kassulke Jr.', 'quia', 'ztoy@example.org', '2026-07-01 00:00:00', 'M', 10666.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 41);
INSERT INTO `usrs` VALUES (77, 'Adella Bednar', 'eligendi', 'bailey25@example.com', '2018-05-01 00:00:00', 'F', 30047.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 30);
INSERT INTO `usrs` VALUES (78, 'Emmett Altenwerth', 'nihil', 'estella.morissette@example.net', '2015-03-01 00:00:00', 'M', 24525.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 37);
INSERT INTO `usrs` VALUES (79, 'Dr. Maximillia Marks DDS', 'veritatis', 'izieme@example.net', '2019-02-01 00:00:00', 'M', 47038.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 35);
INSERT INTO `usrs` VALUES (80, 'Lon Marks', 'sequi', 'hallie02@example.net', '2003-10-01 00:00:00', 'F', 31066.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 27);
INSERT INTO `usrs` VALUES (81, 'Orpha Bayer', 'aperiam', 'murphy.javier@example.com', '2026-08-01 00:00:00', 'F', 24596.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 27);
INSERT INTO `usrs` VALUES (82, 'Aylin Wolf', 'quo', 'hoeger.montana@example.net', '2005-12-01 00:00:00', 'F', 30847.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 51);
INSERT INTO `usrs` VALUES (83, 'Sammie McLaughlin', 'possimus', 'brain31@example.org', '2018-11-01 00:00:00', 'F', 19090.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 47);
INSERT INTO `usrs` VALUES (84, 'Cade Spinka', 'expedita', 'xmacejkovic@example.com', '2016-01-01 00:00:00', 'F', 16952.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 38);
INSERT INTO `usrs` VALUES (85, 'Miss America Kshlerin', 'reiciendis', 'melody.dickinson@example.com', '2007-08-01 00:00:00', 'F', 29055.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 33);
INSERT INTO `usrs` VALUES (86, 'Lance Donnelly', 'culpa', 'bparker@example.org', '2007-06-01 00:00:00', 'M', 36136.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 44);
INSERT INTO `usrs` VALUES (87, 'Jessyca Streich', 'ut', 'bonita.lowe@example.org', '2012-04-01 00:00:00', 'M', 13824.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 31);
INSERT INTO `usrs` VALUES (88, 'Charles Ritchie', 'qui', 'shemar.hahn@example.net', '2008-08-01 00:00:00', 'F', 29740.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 54);
INSERT INTO `usrs` VALUES (89, 'Madelynn Thiel', 'vel', 'ron.daniel@example.com', '2024-05-01 00:00:00', 'M', 20429.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 57);
INSERT INTO `usrs` VALUES (90, 'Mr. Nash Streich', 'soluta', 'xboyer@example.net', '2012-04-01 00:00:00', 'F', 39738.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 46);
INSERT INTO `usrs` VALUES (91, 'Casimir DuBuque', 'sint', 'albin90@example.org', '2023-11-01 00:00:00', 'F', 29629.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 24);
INSERT INTO `usrs` VALUES (92, 'Lloyd Wuckert', 'est', 'boyle.laura@example.net', '2008-10-01 00:00:00', 'F', 40511.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 58);
INSERT INTO `usrs` VALUES (93, 'Dee Ortiz', 'dolor', 'hermann.maximillian@example.org', '2002-11-01 00:00:00', 'F', 47822.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 52);
INSERT INTO `usrs` VALUES (94, 'Valentin McGlynn', 'voluptate', 'vivianne.huel@example.net', '2010-09-01 00:00:00', 'M', 48257.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 46);
INSERT INTO `usrs` VALUES (95, 'Kenneth Durgan', 'hic', 'wisoky.lavon@example.org', '2007-07-01 00:00:00', 'F', 36362.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 45);
INSERT INTO `usrs` VALUES (96, 'Thea Barrows', 'molestiae', 'stracke.tess@example.com', '2011-11-01 00:00:00', 'M', 22624.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 49);
INSERT INTO `usrs` VALUES (97, 'Aubree Wolff', 'labore', 'reina96@example.net', '2012-05-01 00:00:00', 'F', 14561.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 53);
INSERT INTO `usrs` VALUES (98, 'Julianne Satterfield II', 'consequatur', 'godfrey76@example.net', '2031-07-01 00:00:00', 'F', 19212.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 28);
INSERT INTO `usrs` VALUES (99, 'Dorthy Torp', 'laudantium', 'fae.nicolas@example.com', '2026-10-01 00:00:00', 'F', 30154.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 53);
INSERT INTO `usrs` VALUES (100, 'Eveline Watsica Jr.', 'aliquam', 'pbernhard@example.org', '2022-10-01 00:00:00', 'F', 35822.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 25);
INSERT INTO `usrs` VALUES (101, 'Mrs. Eula Trantow DDS', 'maxime', 'wschulist@example.com', '2003-03-01 00:00:00', 'F', 19612.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 51);
INSERT INTO `usrs` VALUES (102, 'Haylee Strosin IV', 'saepe', 'fdickinson@example.org', '2013-12-01 00:00:00', 'M', 39938.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 47);
INSERT INTO `usrs` VALUES (103, 'Prof. Lourdes Weber', 'eaque', 'hschinner@example.org', '2007-08-01 00:00:00', 'F', 36241.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 25);
INSERT INTO `usrs` VALUES (104, 'Lavon Heidenreich DDS', 'deserunt', 'bruen.maiya@example.net', '2021-01-01 00:00:00', 'F', 32536.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 53);
INSERT INTO `usrs` VALUES (105, 'Osvaldo Emard', 'placeat', 'ella85@example.net', '2030-09-01 00:00:00', 'M', 19242.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 54);
INSERT INTO `usrs` VALUES (106, 'Katelin Wuckert', 'aut', 'kole77@example.com', '2010-07-01 00:00:00', 'M', 15905.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 31);
INSERT INTO `usrs` VALUES (107, 'Virgil Pollich PhD', 'quia', 'murray.diana@example.com', '2004-05-01 00:00:00', 'M', 17705.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 46);
INSERT INTO `usrs` VALUES (108, 'Irving Roberts Jr.', 'tempore', 'grady.ottilie@example.com', '2007-11-01 00:00:00', 'M', 46871.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 58);
INSERT INTO `usrs` VALUES (109, 'Glenda McGlynn', 'ipsa', 'miller86@example.com', '2023-10-01 00:00:00', 'M', 12782.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 43);
INSERT INTO `usrs` VALUES (110, 'Kasey Jerde', 'et', 'domenico.hirthe@example.org', '2028-05-01 00:00:00', 'F', 12574.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 30);
INSERT INTO `usrs` VALUES (111, 'Marlene Sawayn', 'repellat', 'fahey.audreanne@example.org', '2021-10-01 00:00:00', 'M', 44223.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 43);
INSERT INTO `usrs` VALUES (112, 'Ole Senger', 'quos', 'cemard@example.org', '2020-11-01 00:00:00', 'M', 18507.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 52);
INSERT INTO `usrs` VALUES (113, 'Mr. Bennie Kris Sr.', 'est', 'gutkowski.otis@example.com', '2021-06-01 00:00:00', 'F', 38012.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 41);
INSERT INTO `usrs` VALUES (114, 'Geoffrey Marks', 'expedita', 'mhartmann@example.org', '2028-05-01 00:00:00', 'F', 22247.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 36);
INSERT INTO `usrs` VALUES (115, 'Miss Annabel Gerlach', 'iure', 'chyna57@example.com', '2012-08-01 00:00:00', 'M', 44820.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 37);
INSERT INTO `usrs` VALUES (116, 'Lue Boehm IV', 'accusamus', 'eliane47@example.org', '2020-02-01 00:00:00', 'M', 29752.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 47);
INSERT INTO `usrs` VALUES (117, 'Mr. Richard Gorczany', 'molestiae', 'leonard23@example.net', '2004-10-01 00:00:00', 'F', 39787.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 40);
INSERT INTO `usrs` VALUES (118, 'Mrs. Lucinda Grant I', 'labore', 'conor40@example.org', '2007-07-01 00:00:00', 'F', 45944.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 55);
INSERT INTO `usrs` VALUES (119, 'Natasha Beer', 'doloremque', 'qhilpert@example.net', '2021-03-01 00:00:00', 'F', 33659.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 52);
INSERT INTO `usrs` VALUES (120, 'Marquise Borer', 'facilis', 'fadel.laurence@example.org', '2011-07-01 00:00:00', 'M', 33310.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 43);
INSERT INTO `usrs` VALUES (121, 'Yoshiko Bode', 'quia', 'lynch.dax@example.net', '2012-04-01 00:00:00', 'F', 33542.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 41);
INSERT INTO `usrs` VALUES (122, 'Ashlee Wiegand', 'dolore', 'brett95@example.org', '2008-10-01 00:00:00', 'F', 17291.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 25);
INSERT INTO `usrs` VALUES (123, 'Prof. Cleora Jones DDS', 'est', 'qgerlach@example.net', '2009-02-01 00:00:00', 'M', 26823.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 36);
INSERT INTO `usrs` VALUES (124, 'Armand Kertzmann', 'vel', 'cummings.chelsey@example.net', '2011-08-01 00:00:00', 'F', 10903.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 24);
INSERT INTO `usrs` VALUES (125, 'Nat Nienow', 'quam', 'dtoy@example.org', '2010-07-01 00:00:00', 'M', 34887.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 33);
INSERT INTO `usrs` VALUES (126, 'Myah Dibbert III', 'provident', 'tad.stracke@example.com', '2018-05-01 00:00:00', 'F', 42874.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 42);
INSERT INTO `usrs` VALUES (127, 'Giovani Veum', 'saepe', 'jlarson@example.net', '2029-09-01 00:00:00', 'F', 27643.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 45);
INSERT INTO `usrs` VALUES (128, 'Audrey Effertz', 'debitis', 'wisoky.eldon@example.net', '2005-06-01 00:00:00', 'F', 29057.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 47);
INSERT INTO `usrs` VALUES (129, 'Elda McKenzie Sr.', 'facilis', 'shemar.hahn@example.org', '2017-06-01 00:00:00', 'M', 22985.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 45);
INSERT INTO `usrs` VALUES (130, 'Eladio Hudson', 'provident', 'mcclure.ambrose@example.com', '2016-01-01 00:00:00', 'F', 38838.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 54);
INSERT INTO `usrs` VALUES (131, 'Juliana Johnson', 'ipsam', 'runolfsdottir.matteo@example.com', '2026-12-01 00:00:00', 'F', 41213.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 53);
INSERT INTO `usrs` VALUES (132, 'Kennedi Kunde', 'molestiae', 'enoch.walter@example.com', '2030-10-01 00:00:00', 'M', 31745.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 49);
INSERT INTO `usrs` VALUES (133, 'Maxime Sporer', 'sit', 'sbalistreri@example.org', '2010-06-01 00:00:00', 'M', 12968.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 41);
INSERT INTO `usrs` VALUES (134, 'Yoshiko Weissnat', 'soluta', 'morris.parisian@example.net', '2013-12-01 00:00:00', 'M', 26228.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 36);
INSERT INTO `usrs` VALUES (135, 'Patricia Ziemann', 'ea', 'gregoria.howe@example.net', '2006-08-01 00:00:00', 'M', 32512.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 41);
INSERT INTO `usrs` VALUES (136, 'Prof. Gunnar Batz', 'quo', 'lstroman@example.net', '2014-01-01 00:00:00', 'F', 34884.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 33);
INSERT INTO `usrs` VALUES (137, 'Janessa Nolan', 'ea', 'megane01@example.org', '2026-03-01 00:00:00', 'M', 33207.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 55);
INSERT INTO `usrs` VALUES (138, 'Dr. Hailie Kovacek DDS', 'rem', 'nathanael.jerde@example.net', '2005-03-01 00:00:00', 'M', 36817.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 26);
INSERT INTO `usrs` VALUES (139, 'Pamela Fahey', 'omnis', 'dare.adolph@example.net', '2002-07-01 00:00:00', 'M', 34521.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 24);
INSERT INTO `usrs` VALUES (140, 'Vivienne Wiza MD', 'culpa', 'oondricka@example.net', '2021-12-01 00:00:00', 'M', 48526.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 39);
INSERT INTO `usrs` VALUES (141, 'Dr. Kristina Ryan IV', 'natus', 'gutmann.adaline@example.org', '2011-09-01 00:00:00', 'M', 19507.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 39);
INSERT INTO `usrs` VALUES (142, 'Soledad Mayert', 'quae', 'rodger71@example.com', '2009-02-01 00:00:00', 'F', 31956.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 36);
INSERT INTO `usrs` VALUES (143, 'Norbert White MD', 'doloremque', 'ddaniel@example.org', '2024-09-01 00:00:00', 'F', 18459.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 39);
INSERT INTO `usrs` VALUES (144, 'Prof. Lamar Brown', 'cum', 'olittel@example.org', '2015-02-01 00:00:00', 'M', 45574.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 35);
INSERT INTO `usrs` VALUES (145, 'Jamil Gislason', 'placeat', 'price.hallie@example.org', '2017-08-01 00:00:00', 'M', 42311.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 40);
INSERT INTO `usrs` VALUES (146, 'Trudie Dooley', 'repellat', 'elsie08@example.com', '2017-03-01 00:00:00', 'F', 42126.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 45);
INSERT INTO `usrs` VALUES (147, 'Myah Trantow', 'quaerat', 'keon38@example.com', '2027-07-01 00:00:00', 'M', 23300.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 26);
INSERT INTO `usrs` VALUES (148, 'Owen Douglas', 'possimus', 'erika90@example.net', '2018-06-01 00:00:00', 'M', 42408.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 27);
INSERT INTO `usrs` VALUES (149, 'Prof. Lew Abernathy', 'optio', 'dino.wuckert@example.net', '2021-12-01 00:00:00', 'M', 36359.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 51);
INSERT INTO `usrs` VALUES (150, 'Miss Suzanne Bins V', 'est', 'margie21@example.org', '2011-04-01 00:00:00', 'F', 36510.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 26);
INSERT INTO `usrs` VALUES (151, 'Russell Muller Sr.', 'quos', 'willms.zoila@example.org', '2029-04-01 00:00:00', 'F', 45016.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 34);
INSERT INTO `usrs` VALUES (152, 'Bernhard Johnson', 'est', 'name62@example.org', '2002-06-01 00:00:00', 'M', 29587.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 58);
INSERT INTO `usrs` VALUES (153, 'Dallas Prosacco', 'aperiam', 'florine.rice@example.org', '2012-07-01 00:00:00', 'M', 10961.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 50);
INSERT INTO `usrs` VALUES (154, 'Russel McDermott', 'omnis', 'boyle.brisa@example.org', '2018-03-01 00:00:00', 'F', 38312.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 29);
INSERT INTO `usrs` VALUES (155, 'Prof. Heaven Lueilwitz', 'voluptates', 'aurelie.cummerata@example.org', '2027-03-01 00:00:00', 'M', 29574.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 45);
INSERT INTO `usrs` VALUES (156, 'Halle Hackett', 'officiis', 'gleichner.assunta@example.org', '2010-06-01 00:00:00', 'F', 16571.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 39);
INSERT INTO `usrs` VALUES (157, 'Bailee Hoeger DVM', 'facere', 'dave49@example.org', '2026-11-01 00:00:00', 'F', 11004.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 52);
INSERT INTO `usrs` VALUES (158, 'Ceasar Smitham DVM', 'maiores', 'zieme.jaycee@example.net', '2015-01-01 00:00:00', 'M', 44752.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 48);
INSERT INTO `usrs` VALUES (159, 'Lindsay Johnston', 'rerum', 'klein.kendall@example.org', '2010-12-01 00:00:00', 'F', 31017.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 29);
INSERT INTO `usrs` VALUES (160, 'Susana Schowalter I', 'dolor', 'lacey.larson@example.org', '2026-06-01 00:00:00', 'M', 16003.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 34);
INSERT INTO `usrs` VALUES (161, 'Forest Mohr MD', 'sed', 'mariana98@example.org', '2021-05-01 00:00:00', 'M', 28073.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 47);
INSERT INTO `usrs` VALUES (162, 'Andres Kris', 'ipsam', 'manuel13@example.org', '2024-12-01 00:00:00', 'F', 40090.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 35);
INSERT INTO `usrs` VALUES (163, 'Orpha Nolan DDS', 'quae', 'nienow.annabel@example.net', '2014-07-01 00:00:00', 'F', 40051.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 44);
INSERT INTO `usrs` VALUES (164, 'Eliseo Monahan IV', 'vel', 'mccullough.shannon@example.org', '2011-12-01 00:00:00', 'F', 39936.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 28);
INSERT INTO `usrs` VALUES (165, 'Leland Toy', 'sunt', 'rod35@example.net', '2023-07-01 00:00:00', 'M', 22275.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 57);
INSERT INTO `usrs` VALUES (166, 'Christelle Hane', 'et', 'mkoelpin@example.org', '2003-08-01 00:00:00', 'F', 13967.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 45);
INSERT INTO `usrs` VALUES (167, 'Westley Wisoky', 'repellat', 'abdullah.murphy@example.net', '2008-08-01 00:00:00', 'M', 42389.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 29);
INSERT INTO `usrs` VALUES (168, 'Kim Mohr', 'et', 'susanna09@example.org', '2009-06-01 00:00:00', 'F', 40330.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 52);
INSERT INTO `usrs` VALUES (169, 'Pete Stiedemann IV', 'similique', 'emard.nadia@example.net', '2018-06-01 00:00:00', 'F', 40833.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 48);
INSERT INTO `usrs` VALUES (170, 'Ms. Rita Gutkowski Jr.', 'deserunt', 'jmetz@example.com', '2015-08-01 00:00:00', 'M', 33566.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 37);
INSERT INTO `usrs` VALUES (171, 'Pearlie Beer', 'enim', 'grau@example.net', '2006-08-01 00:00:00', 'M', 47761.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 26);
INSERT INTO `usrs` VALUES (172, 'Elton Skiles Jr.', 'temporibus', 'blanda.christine@example.org', '2009-03-01 00:00:00', 'M', 20642.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 45);
INSERT INTO `usrs` VALUES (173, 'Lavern Schaefer PhD', 'et', 'rdonnelly@example.com', '2020-08-01 00:00:00', 'F', 38640.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 47);
INSERT INTO `usrs` VALUES (174, 'Charles Gerhold', 'est', 'rau.stephan@example.com', '2009-10-01 00:00:00', 'F', 32073.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 45);
INSERT INTO `usrs` VALUES (175, 'Grover Toy Jr.', 'qui', 'alex.keebler@example.net', '2004-09-01 00:00:00', 'F', 40676.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 51);
INSERT INTO `usrs` VALUES (176, 'Jaleel Hagenes', 'dolor', 'aurelio45@example.org', '2004-08-01 00:00:00', 'M', 46930.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 38);
INSERT INTO `usrs` VALUES (177, 'Dr. Jazmin Jacobs', 'debitis', 'kyler56@example.net', '2020-04-01 00:00:00', 'F', 39225.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 29);
INSERT INTO `usrs` VALUES (178, 'Marilou Hodkiewicz', 'et', 'callie.prosacco@example.com', '2020-07-01 00:00:00', 'F', 28500.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 32);
INSERT INTO `usrs` VALUES (179, 'Alexane Bruen', 'dolorem', 'green03@example.com', '2010-10-01 00:00:00', 'F', 49771.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 29);
INSERT INTO `usrs` VALUES (180, 'Heather Swift', 'voluptate', 'ward.neal@example.net', '2006-02-01 00:00:00', 'F', 27502.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 49);
INSERT INTO `usrs` VALUES (181, 'Angelo Considine', 'molestiae', 'rutherford.theron@example.com', '2029-12-01 00:00:00', 'F', 31699.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 41);
INSERT INTO `usrs` VALUES (182, 'Erika Hodkiewicz', 'laudantium', 'jaquan73@example.org', '2022-12-01 00:00:00', 'M', 34909.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 49);
INSERT INTO `usrs` VALUES (183, 'Oscar Wiza DDS', 'animi', 'bradley.gislason@example.net', '2020-07-01 00:00:00', 'M', 27023.00, 1, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 24);
INSERT INTO `usrs` VALUES (184, 'Kaylie Schuppe', 'asperiores', 'jstanton@example.net', '2016-05-01 00:00:00', 'M', 11370.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 32);
INSERT INTO `usrs` VALUES (185, 'Margarete Zieme', 'doloremque', 'oosinski@example.org', '2015-09-01 00:00:00', 'F', 35476.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 51);
INSERT INTO `usrs` VALUES (186, 'Edison Bailey', 'occaecati', 'turner.rolfson@example.com', '2017-05-01 00:00:00', 'M', 36009.00, 5, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 27);
INSERT INTO `usrs` VALUES (187, 'Rico Yundt', 'voluptas', 'quinn39@example.com', '2004-06-01 00:00:00', 'F', 17047.00, 4, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 26);
INSERT INTO `usrs` VALUES (188, 'Sean Rice', 'aspernatur', 'fcole@example.org', '2022-07-01 00:00:00', 'F', 48481.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 24);
INSERT INTO `usrs` VALUES (189, 'Dr. Walker Huel IV', 'voluptatem', 'lakin.christian@example.net', '2004-01-01 00:00:00', 'M', 48402.00, 2, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 43);
INSERT INTO `usrs` VALUES (190, 'Prof. Turner Daniel', 'at', 'hammes.wilford@example.net', '2018-08-01 00:00:00', 'M', 13797.00, 3, '2001-01-01 07:21:10', '2001-01-01 07:21:10', 40);
INSERT INTO `usrs` VALUES (191, 'Mrs. Catharine Homenick', 'odio', 'carolyn91@example.net', '2017-08-01 00:00:00', 'M', 14012.00, 1, '2001-01-01 07:21:11', '2001-01-01 07:21:11', 40);
INSERT INTO `usrs` VALUES (192, 'Carmine Wisoky', 'doloremque', 'kziemann@example.com', '2024-08-01 00:00:00', 'M', 30678.00, 4, '2001-01-01 07:21:11', '2001-01-01 07:21:11', 50);
INSERT INTO `usrs` VALUES (193, 'Sincere Gaylord', 'eius', 'hope62@example.org', '2012-11-01 00:00:00', 'M', 22472.00, 5, '2001-01-01 07:21:11', '2001-01-01 07:21:11', 25);
INSERT INTO `usrs` VALUES (194, 'Cyrus Sauer', 'dignissimos', 'giles.aufderhar@example.org', '2010-02-01 00:00:00', 'M', 26008.00, 5, '2001-01-01 07:21:11', '2001-01-01 07:21:11', 55);
INSERT INTO `usrs` VALUES (195, 'Geoffrey Schimmel', 'totam', 'jammie70@example.org', '2015-02-01 00:00:00', 'M', 34245.00, 4, '2001-01-01 07:21:11', '2001-01-01 07:21:11', 39);
INSERT INTO `usrs` VALUES (196, 'Lina Goyette', 'consequatur', 'armstrong.ron@example.net', '2001-08-01 00:00:00', 'M', 27145.00, 2, '2001-01-01 07:21:11', '2001-01-01 07:21:11', 45);
INSERT INTO `usrs` VALUES (197, 'Mr. Davon Bernhard', 'placeat', 'mnader@example.net', '2003-03-01 00:00:00', 'F', 40099.00, 5, '2001-01-01 07:21:11', '2001-01-01 07:21:11', 54);
INSERT INTO `usrs` VALUES (198, 'Fay Feeney', 'dolorem', 'ines43@example.com', '2016-06-01 00:00:00', 'M', 40528.00, 4, '2001-01-01 07:21:11', '2001-01-01 07:21:11', 44);
INSERT INTO `usrs` VALUES (199, 'Kameron Heaney', 'rerum', 'kovacek.joaquin@example.com', '2028-09-01 00:00:00', 'M', 17209.00, 3, '2001-01-01 07:21:11', '2001-01-01 07:21:11', 40);
INSERT INTO `usrs` VALUES (200, 'Catharine Stracke', 'quis', 'moriah58@example.com', '2029-01-01 00:00:00', 'F', 20857.00, 5, '2001-01-01 07:21:11', '2001-01-01 07:21:11', 42);

SET FOREIGN_KEY_CHECKS = 1;
