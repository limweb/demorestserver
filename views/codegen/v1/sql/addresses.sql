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

 Date: 15/12/2020 00:21:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for addresses
-- ----------------------------
DROP TABLE IF EXISTS `addresses`;
CREATE TABLE `addresses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `line1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `line2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `zipcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fax` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 201 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of addresses
-- ----------------------------
INSERT INTO `addresses` VALUES (1, 1, '0888 Aniyah Locks\nLake Bridie, NJ 51086', 'Cayman Islands', '92991-2805', '1-742-816-9238x848', '(484)438-4697x8638');
INSERT INTO `addresses` VALUES (2, 2, '59732 Iva Spur Suite 468\nEast Hortenseton, VA 70087', 'Cayman Islands', '41967', '1-913-407-7558x503', '(388)906-8002');
INSERT INTO `addresses` VALUES (3, 3, '539 Conn Locks Suite 801\nTobinfort, IL 37047-5508', 'Antigua and Barbuda', '51722-4502', '557.845.1830x844', '1-831-304-7444x73027');
INSERT INTO `addresses` VALUES (4, 4, '916 Rosemary Forge\nKreigerton, MT 24207', 'Uganda', '67639-6707', '766.431.9121', '(154)336-3674x08451');
INSERT INTO `addresses` VALUES (5, 5, '91792 Kertzmann Prairie Apt. 376\nLake Nakiaville, DC 98189', 'Jamaica', '10101-1450', '07507519787', '+24(9)5120507985');
INSERT INTO `addresses` VALUES (6, 6, '97650 Scot Haven Apt. 160\nCrawfordmouth, ME 39767-7003', 'Finland', '88917', '1-851-069-9234x9566', '(048)445-4691x33356');
INSERT INTO `addresses` VALUES (7, 7, '4332 Alvina Radial\nPort Darbyville, IA 63357', 'Barbados', '79679', '(736)058-1324', '002.234.8466x49816');
INSERT INTO `addresses` VALUES (8, 8, '96418 Ritchie Mall Apt. 215\nLake Jessyca, VT 65970-8256', 'Netherlands Antilles', '94649-6628', '472.825.7183', '400-507-7463');
INSERT INTO `addresses` VALUES (9, 9, '18890 Carroll Lakes Suite 355\nUptonchester, UT 94878-0739', 'Hong Kong', '91204', '831.652.0832', '(688)788-8947');
INSERT INTO `addresses` VALUES (10, 10, '6721 Nader Summit\nLake Alana, MS 84476', 'Reunion', '77124-1459', '1-129-438-6148', '(913)441-3846');
INSERT INTO `addresses` VALUES (11, 11, '763 McCullough Ville\nNew Thomasstad, HI 64611', 'Oman', '00642', '1-296-172-2126x275', '(559)203-8694');
INSERT INTO `addresses` VALUES (12, 12, '65641 Baron Spurs Suite 988\nNorth Ivah, IA 92235', 'Nepal', '90316-7411', '064.482.9432x9456', '05936098280');
INSERT INTO `addresses` VALUES (13, 13, '42272 Stoltenberg Points Suite 006\nLake Dustin, NH 70213-2043', 'Uganda', '60996-2982', '(508)122-5892', '356-682-2023x07379');
INSERT INTO `addresses` VALUES (14, 14, '362 Trantow Loop Apt. 150\nLake Marafurt, DC 27926', 'Gabon', '36943-1099', '033-386-4972x26066', '1-363-037-1381');
INSERT INTO `addresses` VALUES (15, 15, '6737 Schimmel Crossing Suite 720\nShieldsberg, AK 44558', 'Tanzania', '75615', '338.920.3112', '(467)912-6668');
INSERT INTO `addresses` VALUES (16, 16, '97237 Emory Mission\nWelchview, DE 65827-8746', 'Turkmenistan', '17948', '(163)991-1609x963', '104.893.7648');
INSERT INTO `addresses` VALUES (17, 17, '7584 Lucinda Mill\nNew Kaitlyn, WV 63380-4289', 'Gibraltar', '51150-2800', '(977)115-7349', '652-788-4860x1180');
INSERT INTO `addresses` VALUES (18, 18, '992 Williamson Passage Apt. 910\nBradleyborough, MO 93100-9439', 'Cambodia', '20591-3066', '+64(7)3402369877', '08960801902');
INSERT INTO `addresses` VALUES (19, 19, '8444 Abraham Isle\nEast Chaunceychester, HI 78625-4417', 'Qatar', '47870-8012', '797-274-3187x45557', '(461)432-8205');
INSERT INTO `addresses` VALUES (20, 20, '89766 O\'Connell Falls\nSouth Kadenshire, NJ 78754-6650', 'Nigeria', '37859', '1-457-536-1138', '+98(5)0101745942');
INSERT INTO `addresses` VALUES (21, 21, '6066 Weissnat Run Apt. 578\nMurazikmouth, SD 62877-3174', 'Brunei Darussalam', '69261', '(487)423-0151x5127', '784-058-9197');
INSERT INTO `addresses` VALUES (22, 22, '331 Gerlach Course Suite 090\nKovacekchester, RI 18017', 'Sri Lanka', '37165', '653-487-3061x91119', '370-709-1750');
INSERT INTO `addresses` VALUES (23, 23, '4371 Ward Village Suite 848\nLake Madalynton, IN 44643', 'Ukraine', '71848', '174-502-0881x50649', '02683328099');
INSERT INTO `addresses` VALUES (24, 24, '235 Hassie Mountain\nAnikaborough, ID 20678-4354', 'Thailand', '94264-9132', '624.042.8382x12243', '274.716.7226x171');
INSERT INTO `addresses` VALUES (25, 25, '793 Lakin Haven\nLake Citlalliborough, DE 85031-4862', 'Chad', '52396-8822', '(950)170-8013', '119.675.5485x79062');
INSERT INTO `addresses` VALUES (26, 26, '0330 Smith Mountains\nLorinetown, NY 96547-9723', 'Syrian Arab Republic', '85415', '1-212-704-6685', '516-893-8515');
INSERT INTO `addresses` VALUES (27, 27, '901 Hauck Extensions\nKeaganborough, VA 47392', 'Comoros', '54147-7615', '1-274-179-2031x915', '867-583-0812x6728');
INSERT INTO `addresses` VALUES (28, 28, '29077 Avis Isle Apt. 208\nGrahamberg, MI 62485-6694', 'Cocos (Keeling) Islands', '56090-7671', '(718)856-9319x55184', '(777)055-4685x56167');
INSERT INTO `addresses` VALUES (29, 29, '697 Crona Mall\nPeteville, WA 54497', 'Saudi Arabia', '07560-8569', '788-579-8208', '041-521-9215');
INSERT INTO `addresses` VALUES (30, 30, '79984 Deckow Run\nEast Victoria, UT 33736', 'Lithuania', '95964-8864', '681.200.3099', '(567)652-4322x61475');
INSERT INTO `addresses` VALUES (31, 31, '996 Schuppe Glen\nTurcottetown, ID 40821-7190', 'Thailand', '09965-7576', '1-938-263-0257x47178', '1-997-727-3198x4363');
INSERT INTO `addresses` VALUES (32, 32, '69942 Leannon Glen\nEast Mathilde, IL 89584-5633', 'Afghanistan', '02041-8706', '(506)349-9443x7244', '1-357-689-8479x3729');
INSERT INTO `addresses` VALUES (33, 33, '875 Logan Summit Suite 033\nJerodport, NY 45166', 'Kiribati', '64763', '1-548-943-8405x460', '+88(4)9493664736');
INSERT INTO `addresses` VALUES (34, 34, '43006 Gaylord Drives\nCummerataville, MA 14032-6378', 'Georgia', '88459', '(877)526-6771', '(724)630-5418');
INSERT INTO `addresses` VALUES (35, 35, '47345 Imelda Mission Suite 257\nAllyshire, IA 85430-2783', 'Gambia', '26853', '(441)229-8922', '(789)908-0620x15912');
INSERT INTO `addresses` VALUES (36, 36, '49133 Tremaine Cape Suite 189\nQuitzonview, SC 07967-6920', 'Serbia', '96642', '313.254.8635x06428', '194.681.7297x74202');
INSERT INTO `addresses` VALUES (37, 37, '1313 Verdie Square\nNorth Giovanna, MI 27962', 'Guyana', '77776', '(321)705-8910', '(392)460-5663x665');
INSERT INTO `addresses` VALUES (38, 38, '45335 Albina View\nCharlottefort, AK 57789', 'Afghanistan', '54947-9310', '09097085723', '1-567-446-3094');
INSERT INTO `addresses` VALUES (39, 39, '288 Hamill Knolls\nMaximoburgh, NC 50971', 'Zimbabwe', '00474', '1-165-445-8956x699', '164-395-7526x1304');
INSERT INTO `addresses` VALUES (40, 40, '3411 Deckow Crossing\nVernonport, MI 32272-8542', 'Bolivia', '00960', '(998)729-9537', '(606)461-9736');
INSERT INTO `addresses` VALUES (41, 41, '39181 Runolfsson Pines Apt. 102\nCedrickchester, MD 73430-4755', 'Haiti', '08208-7956', '625-483-9111x773', '196-367-9338');
INSERT INTO `addresses` VALUES (42, 42, '18735 Quigley Springs\nCarterview, NE 29126-7625', 'Chad', '61676-5075', '172.676.4844x42744', '129.383.7365x233');
INSERT INTO `addresses` VALUES (43, 43, '38208 Dolores Turnpike Apt. 887\nWintheiserton, FL 72054-2578', 'Lithuania', '51634-6449', '1-161-626-3235x57765', '360-278-9045x9316');
INSERT INTO `addresses` VALUES (44, 44, '15405 Haag Haven Suite 047\nBrakusland, WV 81778', 'British Virgin Islands', '56087-0885', '08227730599', '1-079-566-2337x670');
INSERT INTO `addresses` VALUES (45, 45, '59888 Dare Ridge\nSouth Annamaeton, CA 94659', 'Mexico', '56689-3824', '523.579.8757x9825', '688.695.5156x073');
INSERT INTO `addresses` VALUES (46, 46, '974 Brannon Circle Suite 674\nSchroedermouth, NM 66911', 'Malawi', '74027', '887.196.2530x875', '220.398.6969');
INSERT INTO `addresses` VALUES (47, 47, '916 Durgan Harbor\nWest Tonyborough, MN 08368', 'Serbia', '25234', '(821)777-8137x4048', '(398)917-7496x84537');
INSERT INTO `addresses` VALUES (48, 48, '434 Dariana Terrace\nSouth Brettbury, NC 66080-2445', 'Latvia', '81749-2523', '1-988-628-9566x4627', '916.932.2071x569');
INSERT INTO `addresses` VALUES (49, 49, '012 Josiane Flats Suite 650\nKatelynntown, MD 70053', 'Rwanda', '75946-8166', '(556)620-0323x81232', '1-466-040-3197x6274');
INSERT INTO `addresses` VALUES (50, 50, '295 Donna Plaza Apt. 186\nHintzview, GA 44706', 'Greenland', '03127', '1-044-098-3635x9446', '1-753-472-6796');
INSERT INTO `addresses` VALUES (51, 51, '8084 Parisian Course\nRevatown, MS 64436', 'Romania', '38023-7317', '002-169-1699', '+72(1)0061485697');
INSERT INTO `addresses` VALUES (52, 52, '6026 Lemke Throughway\nPort Alecville, NC 95534', 'Turks and Caicos Islands', '80281-2063', '+29(4)7869810126', '408.388.5746x3722');
INSERT INTO `addresses` VALUES (53, 53, '1732 Kaci Manors\nMeaghanstad, TX 38193', 'British Indian Ocean Territory (Chagos Archipelago)', '76112-3993', '1-910-696-0984x91531', '077.490.0151x584');
INSERT INTO `addresses` VALUES (54, 54, '43269 Mayer Court Suite 303\nStammtown, MO 94549-3952', 'Morocco', '54003-4361', '370.517.4429', '789.262.4982');
INSERT INTO `addresses` VALUES (55, 55, '609 Shaylee Junctions Apt. 649\nSouth Ollieshire, NV 90812-9755', 'Faroe Islands', '70121', '1-445-641-0692x498', '1-023-516-4812x871');
INSERT INTO `addresses` VALUES (56, 56, '40119 Graham Crest\nHesselchester, DE 40502-2856', 'Belgium', '08883', '1-579-922-2797x269', '(242)362-0079x30563');
INSERT INTO `addresses` VALUES (57, 57, '11647 Milton Way\nWest Clovismouth, DC 03233', 'United States Minor Outlying Islands', '55610', '1-307-678-7085x7244', '032-785-7099x591');
INSERT INTO `addresses` VALUES (58, 58, '138 Cody Mills Suite 506\nZettaland, IL 46588', 'Macao', '68237-8293', '1-189-013-4963x5634', '602-464-8841x0359');
INSERT INTO `addresses` VALUES (59, 59, '6683 Eden Mountains\nLake Connie, IA 63826-5434', 'Saint Kitts and Nevis', '51263-3357', '(687)402-8450x14222', '+21(5)3806215762');
INSERT INTO `addresses` VALUES (60, 60, '86711 Hansen Rest\nEast Mossie, ND 51726', 'Guinea-Bissau', '45457', '993-333-5453', '234-794-9974x5287');
INSERT INTO `addresses` VALUES (61, 61, '13701 Jordy Via\nWest Havenview, KS 83271-0374', 'Western Sahara', '10299', '1-510-868-3279x670', '393.250.1113x276');
INSERT INTO `addresses` VALUES (62, 62, '9866 Morissette Rapids\nEstefaniaside, UT 46142-4379', 'Chile', '43735-6862', '888.651.3989x7219', '453-877-0138');
INSERT INTO `addresses` VALUES (63, 63, '54443 Sarina Course\nCyrilburgh, VT 98914-1221', 'Eritrea', '84870-7244', '(042)545-5691', '02974173881');
INSERT INTO `addresses` VALUES (64, 64, '03589 Keegan Harbor\nMetzton, LA 96547-8642', 'Sudan', '00416', '03820792792', '800.913.2114');
INSERT INTO `addresses` VALUES (65, 65, '242 Marguerite Burgs Suite 026\nAlbertoburgh, WI 53544', 'Czech Republic', '09711', '(754)323-8005x53939', '571-834-9971');
INSERT INTO `addresses` VALUES (66, 66, '2606 Bette Crest\nDickinsonland, NV 64677', 'Cameroon', '69174-0120', '925-352-9069x0017', '(968)467-1936');
INSERT INTO `addresses` VALUES (67, 67, '340 Bradtke Throughway Apt. 194\nDellafort, DC 96830', 'United States Virgin Islands', '22094-7899', '948-812-1811x7413', '545.417.1420x31628');
INSERT INTO `addresses` VALUES (68, 68, '2956 Cloyd Lane\nFaheymouth, AR 43069', 'Guatemala', '08544', '(705)171-9052x7471', '1-455-451-0950x63823');
INSERT INTO `addresses` VALUES (69, 69, '3383 Ebony Courts\nSammieshire, IA 35964-4549', 'Bosnia and Herzegovina', '62242-2473', '729-225-2189', '(903)872-1708x7217');
INSERT INTO `addresses` VALUES (70, 70, '1199 Wendy Flats Suite 994\nJohnsonfort, PA 18523', 'Mexico', '15046', '(361)669-1172x9255', '(958)519-2906x2186');
INSERT INTO `addresses` VALUES (71, 71, '81317 Leannon Centers Suite 346\nScarlettport, OR 61736', 'Armenia', '34185-9152', '1-177-450-8784', '155.263.0089x9648');
INSERT INTO `addresses` VALUES (72, 72, '73472 Dicki Canyon\nLake Eda, WY 40540', 'Cuba', '98925-4769', '097.839.0735x56909', '(687)623-1190x729');
INSERT INTO `addresses` VALUES (73, 73, '554 Astrid Plaza\nEast Jess, MN 25189-1701', 'Lesotho', '07191-2737', '796-363-8288x4591', '(002)169-6322x3402');
INSERT INTO `addresses` VALUES (74, 74, '6855 Gaetano Forks Apt. 236\nReichertstad, IN 54196-6493', 'Zambia', '29350', '(945)198-4366x168', '792-167-5696x31507');
INSERT INTO `addresses` VALUES (75, 75, '3376 Hackett Course Suite 440\nGarfieldmouth, MN 05961-8863', 'New Zealand', '98492', '04787529559', '619.377.9242');
INSERT INTO `addresses` VALUES (76, 76, '2068 Farrell Mill\nEichmannland, KS 57046', 'Lebanon', '04984', '1-810-703-8618', '(698)082-8832x1946');
INSERT INTO `addresses` VALUES (77, 77, '932 Nitzsche Station\nEast Jany, NH 43570', 'Reunion', '33860', '(114)536-4258x508', '819.825.4125');
INSERT INTO `addresses` VALUES (78, 78, '89319 Huel Lake\nEast Ramonaport, WA 81393', 'Guadeloupe', '55173', '04984044869', '885-312-6963x7278');
INSERT INTO `addresses` VALUES (79, 79, '88720 Asa Harbors\nNew Prince, MD 76381-4157', 'Turkey', '80345-6360', '330.716.3177', '848.876.8727x3447');
INSERT INTO `addresses` VALUES (80, 80, '632 Hayden Prairie Suite 042\nWest Heidihaven, WI 33458-9073', 'Monaco', '79375', '1-834-727-6999x08843', '08097642927');
INSERT INTO `addresses` VALUES (81, 81, '2803 Hackett Gateway Apt. 405\nCollierchester, MD 18914', 'Kuwait', '54267-6302', '1-549-308-2672x7711', '1-866-286-6112');
INSERT INTO `addresses` VALUES (82, 82, '7533 Leone Avenue Apt. 840\nNew Vernfort, NJ 65543-1112', 'Iceland', '00652', '183.947.1183x878', '(450)740-0239');
INSERT INTO `addresses` VALUES (83, 83, '3584 Austin Circle\nNorth Alysonland, ID 08246', 'Eritrea', '81319', '+52(3)2026015724', '427.839.1429x2104');
INSERT INTO `addresses` VALUES (84, 84, '444 Dell Shoals\nMedhurstland, HI 85983-8830', 'Kuwait', '65006-2008', '708-946-1335', '356.205.1953x608');
INSERT INTO `addresses` VALUES (85, 85, '97431 Kuvalis View Suite 371\nBertrandland, AL 89076-4159', 'Taiwan', '07077-3148', '+30(2)9394458494', '03702415205');
INSERT INTO `addresses` VALUES (86, 86, '618 Gail Shore\nKreigerland, NE 19375-9050', 'Libyan Arab Jamahiriya', '18195', '08007632033', '1-703-263-2753');
INSERT INTO `addresses` VALUES (87, 87, '5213 Goyette Glen\nMarcelohaven, WV 90391', 'Gibraltar', '11134-2718', '02958543720', '+70(1)2450912290');
INSERT INTO `addresses` VALUES (88, 88, '599 Jalen Corner\nEast Deshaunborough, NJ 93272-1624', 'Armenia', '67654', '07446574414', '+14(6)0558454664');
INSERT INTO `addresses` VALUES (89, 89, '9213 Kunze River Apt. 587\nBartolettiburgh, WV 21249-5810', 'Antigua and Barbuda', '87684', '505.739.5807', '073.475.7927x072');
INSERT INTO `addresses` VALUES (90, 90, '605 Torp Fields Apt. 655\nNorth Mikelshire, AL 02842', 'Myanmar', '33101', '309.403.8780', '264.928.9964x10950');
INSERT INTO `addresses` VALUES (91, 91, '51908 Ardella Viaduct\nNew Vinnie, WI 49668', 'Mexico', '88571-3655', '01678812743', '489.165.4551x4370');
INSERT INTO `addresses` VALUES (92, 92, '228 Borer Canyon\nMiltonside, IN 43124-9497', 'Sweden', '96476-6224', '347.192.2484x780', '+31(5)6587490235');
INSERT INTO `addresses` VALUES (93, 93, '581 Payton Squares Apt. 356\nHirthehaven, NC 99178-6264', 'Vietnam', '87467-8032', '1-576-096-0611x49674', '+65(1)5187493064');
INSERT INTO `addresses` VALUES (94, 94, '49137 Corwin Glens\nEast Isabella, NM 86480', 'Gibraltar', '33592', '1-588-966-5361', '(867)834-8346x443');
INSERT INTO `addresses` VALUES (95, 95, '4462 Michale Village\nEast Isadoreview, AK 01296', 'Holy See (Vatican City State)', '73669', '(793)300-7796x750', '118-423-2949x458');
INSERT INTO `addresses` VALUES (96, 96, '338 Rebecca Prairie Suite 145\nPort Irmaborough, WA 24598-6578', 'Ukraine', '91275-1371', '09264192363', '422.766.9979');
INSERT INTO `addresses` VALUES (97, 97, '97519 Jonathan Fall Suite 183\nKaiaville, OK 52873-3395', 'Mayotte', '66232-5764', '1-434-012-2438', '05696556697');
INSERT INTO `addresses` VALUES (98, 98, '145 Jaskolski Corner Apt. 771\nLake Aaron, MS 49362-6496', 'France', '61801-3566', '993-202-3509', '(704)278-7941x3354');
INSERT INTO `addresses` VALUES (99, 99, '431 Shaina Villages Suite 559\nEast Bartonport, NM 71122', 'Saint Lucia', '80451-1089', '672.286.8521x739', '112.943.9255');
INSERT INTO `addresses` VALUES (100, 100, '828 Watsica Causeway\nNorth Precious, NY 57952', 'Pitcairn Islands', '89508', '772.862.7374x725', '(148)695-4543x324');
INSERT INTO `addresses` VALUES (101, 101, '6402 Marks Rapids Apt. 979\nDarenbury, TX 14474-8738', 'Uruguay', '59203-3543', '185-292-9037x01132', '864-729-2267x50321');
INSERT INTO `addresses` VALUES (102, 102, '4431 Kertzmann Mill\nOrlotown, CO 88754', 'Equatorial Guinea', '76539-0587', '(906)781-0408', '874-801-3290x95550');
INSERT INTO `addresses` VALUES (103, 103, '68608 Justus Causeway\nPort Devanburgh, FL 56904-0645', 'Cayman Islands', '36780', '00840995384', '(389)320-3712');
INSERT INTO `addresses` VALUES (104, 104, '5104 Weimann Route\nEast Devante, WA 77861-3413', 'Egypt', '72342', '982-075-6354', '678-159-5844');
INSERT INTO `addresses` VALUES (105, 105, '75593 Luettgen Trail\nGorczanyborough, VT 15734-5697', 'Svalbard & Jan Mayen Islands', '11768', '882.991.9524x71313', '(741)672-2712');
INSERT INTO `addresses` VALUES (106, 106, '4411 Colton View\nSchusterfurt, MN 34457', 'Vietnam', '29170-2203', '148-494-6750', '041.120.1587');
INSERT INTO `addresses` VALUES (107, 107, '7543 Moshe Knolls Suite 950\nGoldaville, IL 13706', 'Cape Verde', '23752-8185', '(142)431-6267', '+44(8)1897900320');
INSERT INTO `addresses` VALUES (108, 108, '50285 Loyce Pass\nNew Mathilde, WY 23515', 'Canada', '06889', '998.108.1237x8004', '350-807-3086');
INSERT INTO `addresses` VALUES (109, 109, '319 Koch Club Suite 684\nPort Aydenhaven, PA 40510', 'Jersey', '03510-6142', '1-580-401-9579x5216', '624-777-6162x7826');
INSERT INTO `addresses` VALUES (110, 110, '2404 Alvena Passage\nLake Lester, SD 85628-0151', 'Burkina Faso', '60872', '794.512.1626x9013', '(227)504-5710x087');
INSERT INTO `addresses` VALUES (111, 111, '97167 Renner Village\nWest Jeanshire, SC 35113-2375', 'Serbia', '55415', '1-345-180-0081x911', '1-913-838-9319x97084');
INSERT INTO `addresses` VALUES (112, 112, '36649 Emmy Walk\nBrekkeport, ND 15405', 'Panama', '65709', '943.677.4464x7254', '189.861.2670x523');
INSERT INTO `addresses` VALUES (113, 113, '5222 Bartoletti Wall Suite 448\nEast Boyd, CT 85670-4948', 'Montserrat', '30635-2299', '063.329.8688', '382-461-8663x82655');
INSERT INTO `addresses` VALUES (114, 114, '4597 Keeling Parks Apt. 134\nPort Maxime, OH 99729-0784', 'Panama', '47703-4498', '(664)037-3310x69241', '1-215-399-0171');
INSERT INTO `addresses` VALUES (115, 115, '513 Erich Bypass\nEffertzville, MD 30562-0112', 'Nauru', '57221', '081-265-2657x6688', '+80(4)9680155465');
INSERT INTO `addresses` VALUES (116, 116, '869 Gleason Keys\nEstherberg, MT 22602', 'Liberia', '64689-1141', '(209)375-8440', '156-785-3591');
INSERT INTO `addresses` VALUES (117, 117, '9514 Vicky Cove Apt. 853\nLaynebury, SD 07859', 'Turkey', '07703', '00821739379', '140.818.2057');
INSERT INTO `addresses` VALUES (118, 118, '7675 Jenkins Station\nAdellehaven, CA 30509', 'Ukraine', '48688-9099', '625-770-0033', '571-735-8331x29734');
INSERT INTO `addresses` VALUES (119, 119, '48177 Osvaldo Hill Apt. 815\nHomenickmouth, RI 95928', 'Egypt', '90222-4140', '697-057-2130x408', '530-691-7348x976');
INSERT INTO `addresses` VALUES (120, 120, '303 Tyra Burgs\nNew Damian, CO 52825-7171', 'Kazakhstan', '11540', '(157)620-7945', '+54(2)0053246489');
INSERT INTO `addresses` VALUES (121, 121, '98303 Pietro Camp\nLake Robyn, FL 77180-4620', 'Burkina Faso', '69298', '(407)747-7555', '875.044.3778x254');
INSERT INTO `addresses` VALUES (122, 122, '94160 Ryan Springs Suite 000\nLake Pierreburgh, CT 89719-8535', 'Zimbabwe', '31417', '183-790-4227x5641', '1-615-070-3393x2545');
INSERT INTO `addresses` VALUES (123, 123, '191 Mauricio Greens\nLaurinechester, OR 83928', 'Papua New Guinea', '82641', '191.036.7958', '+90(0)7269292651');
INSERT INTO `addresses` VALUES (124, 124, '261 Terry Turnpike Suite 687\nStoltenbergmouth, CT 44679-2680', 'Nigeria', '87167', '(744)604-6171x082', '1-950-463-2381');
INSERT INTO `addresses` VALUES (125, 125, '92893 Stamm Trail\nGloverport, LA 58869', 'Andorra', '16196-9230', '(070)556-3982', '01209873964');
INSERT INTO `addresses` VALUES (126, 126, '471 Shyann Stream Suite 870\nNew Nestorton, IN 56290', 'South Africa', '89104', '782-474-4326', '00725017827');
INSERT INTO `addresses` VALUES (127, 127, '977 Gaylord Mountain Suite 821\nLake Zena, ID 61156-5748', 'France', '67072-8290', '(758)954-9447', '833-986-3192x1992');
INSERT INTO `addresses` VALUES (128, 128, '6932 Antoinette Junctions\nWest Idell, IA 72570', 'Netherlands', '64652-4270', '(610)722-9624', '(110)474-5484x6477');
INSERT INTO `addresses` VALUES (129, 129, '39017 Braun Locks Apt. 751\nWest Kasandrastad, ME 07178-6402', 'Bermuda', '81088', '(393)036-2733x171', '458.916.7572');
INSERT INTO `addresses` VALUES (130, 130, '1048 Kara Drives\nGustfort, NC 86691', 'Northern Mariana Islands', '73159', '02629448402', '03624740407');
INSERT INTO `addresses` VALUES (131, 131, '921 Kara Drive Suite 950\nCathrynshire, NE 41806-5210', 'Monaco', '53353', '610.185.7768x461', '06119980022');
INSERT INTO `addresses` VALUES (132, 132, '068 Reinger Mountain Apt. 211\nSouth Savannah, NY 26471-9585', 'Mali', '60873', '(076)217-0739x547', '(794)033-8812x370');
INSERT INTO `addresses` VALUES (133, 133, '430 Sean Island\nJenkinsmouth, NC 05277-0412', 'United States Minor Outlying Islands', '32654', '04607288450', '09112133041');
INSERT INTO `addresses` VALUES (134, 134, '2471 Cordelia Village\nFeilside, WY 94891', 'Netherlands', '62592-1968', '(921)299-2379x886', '1-613-132-7710');
INSERT INTO `addresses` VALUES (135, 135, '9667 Zechariah Extensions Suite 072\nLake Earline, MI 31969-0798', 'Saint Vincent and the Grenadines', '32958-2879', '688.519.9639', '521-837-2728');
INSERT INTO `addresses` VALUES (136, 136, '97127 Ebert Locks\nSophiaville, NV 44651-7646', 'Kuwait', '86824', '(992)998-6303x5177', '1-134-356-5360x8830');
INSERT INTO `addresses` VALUES (137, 137, '1796 Diana Pike\nNew Josiane, IA 24514', 'Guadeloupe', '59950', '673-437-1670x4428', '(027)900-1643');
INSERT INTO `addresses` VALUES (138, 138, '4270 Dina Highway Apt. 480\nNorth Freddieview, OR 09052', 'Colombia', '56999-3144', '1-461-654-7273x681', '1-614-057-3374x618');
INSERT INTO `addresses` VALUES (139, 139, '09531 Goyette Falls\nHannahtown, VT 51895', 'Brazil', '17874', '+08(5)4229201058', '719-480-9350');
INSERT INTO `addresses` VALUES (140, 140, '642 Lee Highway Suite 988\nLake Kole, SD 78073', 'Germany', '06725-9739', '966.997.1677x97876', '542.774.0382x03459');
INSERT INTO `addresses` VALUES (141, 141, '621 Raheem Valleys\nJessycaland, HI 70129', 'Bhutan', '18050-5956', '(361)573-7346x9930', '984-719-9914x90172');
INSERT INTO `addresses` VALUES (142, 142, '077 Nora Lakes\nHayliehaven, RI 62072', 'Cook Islands', '15705-1312', '1-784-737-5083x76160', '(337)633-3095x56641');
INSERT INTO `addresses` VALUES (143, 143, '1780 Keebler Landing Apt. 555\nLake Skye, AZ 05869', 'Palau', '83213-2099', '1-275-809-9258x8334', '1-642-214-5585');
INSERT INTO `addresses` VALUES (144, 144, '074 Jessica Islands Apt. 548\nAbbottside, AZ 78889', 'Sierra Leone', '39923', '00343913348', '434.949.1405x83043');
INSERT INTO `addresses` VALUES (145, 145, '5144 Anais Station\nEast Oral, IN 56999', 'Venezuela', '22066', '04902132243', '(002)082-4810x55391');
INSERT INTO `addresses` VALUES (146, 146, '6912 Oberbrunner Ridge\nSawaynfurt, MN 60039', 'Timor-Leste', '39467', '04237910620', '1-903-442-9069x75226');
INSERT INTO `addresses` VALUES (147, 147, '47945 Moen Forks\nWest Bernhardland, NM 14009', 'Philippines', '84922', '(340)037-1862x02192', '265.456.7273');
INSERT INTO `addresses` VALUES (148, 148, '34954 Halvorson Pine\nNew Ardenport, WA 37393-5712', 'Australia', '90384-0039', '1-678-493-5523x50707', '1-761-694-0789');
INSERT INTO `addresses` VALUES (149, 149, '2577 Weimann Highway\nVeumborough, CA 49453-7486', 'Poland', '58076', '989-962-2034x35789', '753-856-4708x45899');
INSERT INTO `addresses` VALUES (150, 150, '075 Barton Shore Apt. 242\nSipestown, WV 80606-1292', 'Bolivia', '92295-0183', '(735)927-1034x2283', '627-610-6263x5358');
INSERT INTO `addresses` VALUES (151, 151, '034 Franecki Parkway\nPort Earnestine, MA 07526-3394', 'Faroe Islands', '58977-4420', '(674)061-8893x5956', '(326)537-0788');
INSERT INTO `addresses` VALUES (152, 152, '3451 Dickens Port Suite 398\nLake Julianberg, MD 50872', 'Ethiopia', '93539', '252-323-2123x19244', '712.723.3056');
INSERT INTO `addresses` VALUES (153, 153, '082 Skye Plains\nAlliemouth, SD 69071-0591', 'Italy', '24718-9999', '(393)793-6033x079', '482.400.0007');
INSERT INTO `addresses` VALUES (154, 154, '594 Okuneva Parks Suite 095\nSouth Mylene, KY 01818', 'Cote d\'Ivoire', '58216', '827-282-5135x69848', '394-565-1518x823');
INSERT INTO `addresses` VALUES (155, 155, '068 Hilbert Viaduct Suite 944\nEast Erna, MA 16378', 'Algeria', '60257-7284', '(612)671-4149', '1-549-189-3217x044');
INSERT INTO `addresses` VALUES (156, 156, '82220 D\'Amore Summit\nTowneborough, NJ 92438-7737', 'New Zealand', '11356', '371-818-6452x5990', '09140029976');
INSERT INTO `addresses` VALUES (157, 157, '18509 DuBuque Stream\nEast Laylamouth, IL 60772', 'Moldova', '30800-0810', '034-475-9002', '1-238-780-4207x757');
INSERT INTO `addresses` VALUES (158, 158, '990 Etha Village Suite 602\nLake Corneliushaven, VT 55519', 'Belgium', '22795-7451', '(359)040-4696x9394', '02410302383');
INSERT INTO `addresses` VALUES (159, 159, '47604 Nitzsche Shores Apt. 138\nJohnsonfort, DE 99741', 'Philippines', '66062-1041', '1-305-478-3572', '424-054-8082');
INSERT INTO `addresses` VALUES (160, 160, '41743 Alysa Motorway\nNew Genesisside, NM 62639', 'Latvia', '43284', '07547406407', '(039)464-6895x151');
INSERT INTO `addresses` VALUES (161, 161, '413 Waters Fork\nNew Ericafurt, SD 71797', 'Kyrgyz Republic', '49228', '(449)197-6255x17742', '379-972-8548');
INSERT INTO `addresses` VALUES (162, 162, '671 Manuel Meadow Suite 440\nKiraton, AL 19283-0087', 'Nepal', '76259', '575-426-8250', '(086)774-1287x53808');
INSERT INTO `addresses` VALUES (163, 163, '562 Lurline Green Apt. 811\nLaurianefurt, WI 01395-0722', 'Isle of Man', '32702', '095.070.7863', '380.004.5218x511');
INSERT INTO `addresses` VALUES (164, 164, '22323 Everett Valleys Suite 989\nKuhicbury, AL 61431', 'Botswana', '66389', '+09(0)5719186691', '+98(2)2001773863');
INSERT INTO `addresses` VALUES (165, 165, '578 Reilly Oval Apt. 881\nEast Vesta, TX 78664', 'Brunei Darussalam', '09059', '(173)227-0911x08515', '1-994-308-9572x776');
INSERT INTO `addresses` VALUES (166, 166, '39958 Hobart Flats\nWest Muhammad, MN 64884', 'Northern Mariana Islands', '53873', '+32(9)4897690398', '04488410596');
INSERT INTO `addresses` VALUES (167, 167, '2192 Lesch Pass Apt. 591\nLockmantown, AL 55500', 'Svalbard & Jan Mayen Islands', '15808-7200', '1-250-991-0632x3430', '+31(1)9148597898');
INSERT INTO `addresses` VALUES (168, 168, '2065 Helga Fords Suite 306\nEvalynland, IA 58070', 'Paraguay', '35001', '1-210-194-3546', '(635)504-1729x9032');
INSERT INTO `addresses` VALUES (169, 169, '7346 Lonzo Stream Suite 222\nPort Rosellaberg, VT 79334-4202', 'Isle of Man', '84022', '02001497273', '(125)270-8428');
INSERT INTO `addresses` VALUES (170, 170, '11646 Deondre Shore\nPollichhaven, TN 17414', 'Jersey', '43244', '546.901.8588x087', '1-567-872-8166x09451');
INSERT INTO `addresses` VALUES (171, 171, '195 McDermott Ways\nWest Marcellus, NM 67490-3656', 'Canada', '54079', '1-269-124-0114', '(210)835-7943x4851');
INSERT INTO `addresses` VALUES (172, 172, '19933 Schroeder Springs Suite 007\nLynchview, RI 18539', 'Algeria', '76378', '1-580-929-3596x1812', '400.458.5478x28034');
INSERT INTO `addresses` VALUES (173, 173, '0212 Neva Via\nSouth Christamouth, CA 72424-7045', 'Slovakia (Slovak Republic)', '06091-4397', '(977)447-4430', '(118)018-7990x8622');
INSERT INTO `addresses` VALUES (174, 174, '2187 Ozella Garden Suite 833\nSouth Rebekashire, MS 83260', 'Congo', '18561', '1-208-901-4654x5731', '03150452108');
INSERT INTO `addresses` VALUES (175, 175, '72033 Cole Streets\nSouth Bettyeside, MN 72292-8428', 'Ukraine', '44161', '842-610-4259x99911', '1-523-357-5297x3813');
INSERT INTO `addresses` VALUES (176, 176, '76260 Haag Lodge\nEast Henry, ME 94607', 'Belgium', '54807', '815-844-6664x7460', '(249)135-3964x33683');
INSERT INTO `addresses` VALUES (177, 177, '4158 Blick Highway Suite 512\nKonopelskistad, OR 15647', 'Saint Barthelemy', '04755-2065', '1-463-070-4473x9839', '1-866-536-0411x599');
INSERT INTO `addresses` VALUES (178, 178, '467 Aurelio Ford Apt. 274\nPort Kaylinberg, NM 86155', 'Heard Island and McDonald Islands', '88826-0288', '1-944-859-9631x313', '1-342-835-2941x7944');
INSERT INTO `addresses` VALUES (179, 179, '539 Armstrong Passage Suite 206\nWest Jerrod, AK 22076-9898', 'Honduras', '83931', '(664)039-3778x42612', '1-489-482-8553x492');
INSERT INTO `addresses` VALUES (180, 180, '11651 Deangelo Summit Suite 712\nSouth Georgette, DE 73590-1633', 'Libyan Arab Jamahiriya', '70742-2723', '01556079091', '308-839-7621x1745');
INSERT INTO `addresses` VALUES (181, 181, '518 Helmer Heights\nSouth Amelieborough, MD 15339', 'Bangladesh', '12005', '(103)188-3019', '(686)980-4238x187');
INSERT INTO `addresses` VALUES (182, 182, '8045 Glennie Plaza Apt. 431\nLake Ephraim, ME 68801', 'Romania', '55678-1009', '075.992.9341x30295', '451-113-6290x1127');
INSERT INTO `addresses` VALUES (183, 183, '5974 Vada Manor Apt. 426\nStromanborough, PA 00898', 'Papua New Guinea', '38526', '02632162032', '+77(5)7103546703');
INSERT INTO `addresses` VALUES (184, 184, '53586 Feil Isle Apt. 789\nWest Golden, TX 37430-4291', 'Moldova', '38590-1613', '299.352.1345', '556-144-0316x58304');
INSERT INTO `addresses` VALUES (185, 185, '55426 Gaston Union Suite 023\nPort Randi, WV 51464-0017', 'Taiwan', '86457-3127', '422.344.9500', '849.309.4290');
INSERT INTO `addresses` VALUES (186, 186, '693 Zoila Throughway Suite 270\nWest Dagmarborough, NJ 74239', 'Tonga', '47841', '956-478-7720', '813.526.0520x373');
INSERT INTO `addresses` VALUES (187, 187, '603 Adam Hollow\nPort Oscar, MD 98401', 'Mali', '49253-7831', '846.604.9611x23894', '471-051-5554');
INSERT INTO `addresses` VALUES (188, 188, '081 Dannie Cape Apt. 814\nEast Karli, HI 79571-5026', 'Zambia', '55244-2058', '285.079.9210x74182', '1-821-922-3997');
INSERT INTO `addresses` VALUES (189, 189, '8874 Johnson Ville\nNew Madge, WI 70132-4864', 'Seychelles', '02073-9948', '1-609-576-9471x2365', '(049)135-9815x34123');
INSERT INTO `addresses` VALUES (190, 190, '191 Dawn View Suite 467\nMarioburgh, WV 01233-7770', 'Sierra Leone', '52847-7914', '107-704-3481x84331', '(168)226-6066x222');
INSERT INTO `addresses` VALUES (191, 191, '87201 Murray Ridges Suite 745\nGleichnerhaven, MA 87104', 'Bulgaria', '21137', '+20(1)8022253035', '(917)307-4392x53201');
INSERT INTO `addresses` VALUES (192, 192, '586 Kuhlman Mountains Suite 033\nBrakustown, TX 93002', 'Korea', '70738-2983', '(120)576-7937', '1-831-927-6131x0814');
INSERT INTO `addresses` VALUES (193, 193, '7067 Bosco Alley\nWest Rosinahaven, NC 32180', 'Chile', '61584-7461', '(330)205-3853x5526', '973.261.8747x8547');
INSERT INTO `addresses` VALUES (194, 194, '8566 Elissa Rapid\nEast Frank, NE 78530-0280', 'Zimbabwe', '82930-2372', '09744993809', '1-229-206-6719');
INSERT INTO `addresses` VALUES (195, 195, '50425 Padberg Groves\nFelicityhaven, AL 92994-7379', 'United States Minor Outlying Islands', '72032', '736-265-8945', '1-289-399-5016x4218');
INSERT INTO `addresses` VALUES (196, 196, '098 Donnelly Village Suite 491\nReingerstad, NC 88138', 'Wallis and Futuna', '44486', '(994)675-5726x13410', '1-693-246-4248x58311');
INSERT INTO `addresses` VALUES (197, 197, '121 Armstrong Inlet Apt. 862\nJoneston, IL 16559-6073', 'Zimbabwe', '18964-3132', '595.835.4210x657', '675-471-5645x842');
INSERT INTO `addresses` VALUES (198, 198, '98933 McDermott Manors\nCatherineburgh, MN 21306-6693', 'Montserrat', '80692', '(428)220-1286x0796', '064-933-9591x7081');
INSERT INTO `addresses` VALUES (199, 199, '7707 Hahn Green\nPort Maximus, VA 88616', 'Colombia', '84523', '729-018-2719', '777.074.8495x7884');
INSERT INTO `addresses` VALUES (200, 200, '93120 Opal Via Suite 427\nHeathcoteshire, LA 46127-7315', 'Cyprus', '38277-2023', '1-818-313-1662', '1-460-325-4983');

SET FOREIGN_KEY_CHECKS = 1;
