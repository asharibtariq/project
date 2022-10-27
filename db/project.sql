/*
Navicat MySQL Data Transfer

Source Server         : Asharib
Source Server Version : 50733
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50733
File Encoding         : 65001

Date: 2022-10-26 21:46:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for email_template
-- ----------------------------
DROP TABLE IF EXISTS `email_template`;
CREATE TABLE `email_template` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `templatename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of email_template
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of logs
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('4', '2019_12_14_000001_create_personal_access_tokens_table', '1');
INSERT INTO `migrations` VALUES ('5', '2022_08_04_045659_alter_username_field_users', '1');
INSERT INTO `migrations` VALUES ('6', '2022_08_04_050225_add_username_users', '1');
INSERT INTO `migrations` VALUES ('7', '2022_08_04_071321_create_projects_table', '1');
INSERT INTO `migrations` VALUES ('8', '2022_08_04_074708_create_reports_table', '1');
INSERT INTO `migrations` VALUES ('9', '2022_08_10_071416_add_multiple_fields_tbl_project', '1');
INSERT INTO `migrations` VALUES ('10', '2022_08_11_055626_alter_fields_tbl_report', '1');
INSERT INTO `migrations` VALUES ('11', '2022_08_11_092213_drop_tbl_report', '1');
INSERT INTO `migrations` VALUES ('12', '2022_08_11_092515_create_new_tbl_report', '1');
INSERT INTO `migrations` VALUES ('13', '2022_08_11_093125_drop_tbl_report1', '1');
INSERT INTO `migrations` VALUES ('14', '2022_08_11_093213_create_new_tbl_report1', '1');
INSERT INTO `migrations` VALUES ('15', '2022_08_17_073502_create_tbl_email_template', '1');
INSERT INTO `migrations` VALUES ('16', '2022_08_17_084745_drop_tbl_project', '1');
INSERT INTO `migrations` VALUES ('17', '2022_08_17_085251_new_tbl_project', '1');
INSERT INTO `migrations` VALUES ('18', '2022_08_18_044649_tbl_log', '1');
INSERT INTO `migrations` VALUES ('19', '2022_08_18_051649_create_logs_table', '1');
INSERT INTO `migrations` VALUES ('20', '2022_08_25_075912_add_fields_tbl_project', '1');
INSERT INTO `migrations` VALUES ('21', '2022_08_25_082458_delete_start_end_date_fields_tbl_project', '1');
INSERT INTO `migrations` VALUES ('22', '2022_08_25_082646_add_start_end_date_fields_tbl_project', '1');
INSERT INTO `migrations` VALUES ('23', '2022_08_25_085955_add_fields_tbl_report', '1');
INSERT INTO `migrations` VALUES ('24', '2022_08_25_091201_delete_fields_tbl_report', '1');
INSERT INTO `migrations` VALUES ('25', '2022_08_25_091251_add_fields_total_alloc_desc_tbl_report', '1');
INSERT INTO `migrations` VALUES ('26', '2022_09_21_055639_create_tbl_role', '1');
INSERT INTO `migrations` VALUES ('27', '2022_09_21_060145_add_role_users', '1');
INSERT INTO `migrations` VALUES ('28', '2022_09_21_083830_add_fields_users', '1');
INSERT INTO `migrations` VALUES ('29', '2022_09_22_044302_create_table_tbl_users_project', '1');
INSERT INTO `migrations` VALUES ('30', '2022_10_18_043724_add_date_tbl_log', '2');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_project
-- ----------------------------
DROP TABLE IF EXISTS `tbl_project`;
CREATE TABLE `tbl_project` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `psdp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `psid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_fund` double(8,2) DEFAULT NULL,
  `foreign_fund` double(8,2) DEFAULT NULL,
  `cost` double(8,2) DEFAULT '0.00',
  `start_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complete_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_project
-- ----------------------------
INSERT INTO `tbl_project` VALUES ('1', 'PSDP', '12345', 'Projectx', '2134.00', '4214.00', '6348.00', '10/17/2022', '10/31/2022', '10/30/2022', 'Y', '1', '1', '2022-10-18 05:02:33', '2022-10-18 05:02:33');
INSERT INTO `tbl_project` VALUES ('2', 'PSD', '1122', 'Second', '222222.00', '2223.00', '224445.00', '10/19/2022', '11/03/2022', '10/27/2022', 'Y', '1', '1', '2022-10-25 07:20:11', '2022-10-25 07:20:11');
INSERT INTO `tbl_project` VALUES ('3', 'PSDP', '111', 'Third', '4444.00', '4444.00', '8888.00', '10/26/2022', '10/28/2022', '10/27/2022', 'Y', '1', '1', '2022-10-26 06:57:18', '2022-10-26 06:57:18');
INSERT INTO `tbl_project` VALUES ('4', 'PSDPP', '999', 'Forth', '213123.00', '3232.00', '216355.00', '10/27/2022', '10/29/2022', '10/28/2022', 'Y', '1', '1', '2022-10-26 07:47:09', '2022-10-26 07:47:09');

-- ----------------------------
-- Table structure for tbl_report
-- ----------------------------
DROP TABLE IF EXISTS `tbl_report`;
CREATE TABLE `tbl_report` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fiscal_year` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` int(11) DEFAULT '0',
  `project` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_expend` double(8,2) DEFAULT '0.00',
  `alloc_rupee` double(8,2) DEFAULT '0.00',
  `alloc_foreign` double(8,2) DEFAULT '0.00',
  `alloc_revised` double(8,2) DEFAULT '0.00',
  `alloc_total` double(8,2) DEFAULT NULL,
  `release_fund_auth` double(8,2) DEFAULT '0.00',
  `release_fund_actual` double(8,2) DEFAULT '0.00',
  `release_foreign` double(8,2) DEFAULT '0.00',
  `release_total_actual` double(8,2) DEFAULT '0.00',
  `util_actual` double(8,2) DEFAULT '0.00',
  `util_foreign` double(8,2) DEFAULT '0.00',
  `util_total` double(8,2) DEFAULT '0.00',
  `amt_surrender` double(8,2) DEFAULT '0.00',
  `amt_lapsed` double(8,2) DEFAULT '0.00',
  `financial_prog` double(8,2) DEFAULT '0.00',
  `physical_prog` double(8,2) DEFAULT '0.00',
  `physical_prog_desc` text COLLATE utf8mb4_unicode_ci,
  `comp_date_likely` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_by` int(11) DEFAULT '0',
  `updated_by` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_report
-- ----------------------------
INSERT INTO `tbl_report` VALUES ('1', '2023', '1', 'Projectx', '10/17/2022', '0.00', '1233.00', '3333.00', null, '4566.00', '3123.00', '12342.00', '34343.00', '46685.00', '2332.00', '2323.00', '4655.00', '3232.00', '2323.00', '101.95', '2323.00', 'abcdd', '10/30/2022', 'None', 'None', 'Y', '1', '1', '2022-10-18 05:18:22', '2022-10-18 05:18:22');
INSERT INTO `tbl_report` VALUES ('2', '2021', '1', 'Projectx', '06/10/2021', '0.00', '333.00', '3333.00', '333.00', '3666.00', '24124.00', '21412.00', '2142.00', '23554.00', '222.00', '2424.00', '2646.00', '242.00', '232.00', '72.18', '444.00', 'asdasd', '03/10/2021', 'sadasd', 'sadasdas', 'Y', '1', '1', '2022-10-19 04:38:11', '2022-10-19 04:38:11');
INSERT INTO `tbl_report` VALUES ('4', '2020', '1', 'Projectx', '01/10/2020', '0.00', '222.00', '3333.00', '222.00', '3555.00', '343.00', '2322.00', '23232.00', '25554.00', '2323.00', '233.00', '2556.00', '3232.00', '2323.00', '71.90', '23424.00', 'wwww', '05/05/2020', 'ewrew', 'efewr', 'Y', '1', '1', '2022-10-19 05:03:20', '2022-10-19 05:03:20');
INSERT INTO `tbl_report` VALUES ('5', '2022', '1', 'Projectx', '11/10/2021', '0.00', '33424.00', '3333.00', '33424.00', '36757.00', '42242.00', '422.00', '4242.00', '4664.00', '222.00', '222.00', '444.00', '244.00', '444.00', '1.21', '42424.00', 'dfsdf', '01/12/2022', 'dwww', 'dsdsd', 'Y', '1', '1', '2022-10-19 05:11:16', '2022-10-19 05:11:16');
INSERT INTO `tbl_report` VALUES ('6', '2023', '2', 'Second', '10/13/2022', '0.00', '1232.00', '3444.00', null, '4676.00', '33232.00', '23232.00', '3232.00', '26464.00', '2323.00', '232.00', '2555.00', '2.00', '3.00', '54.64', '444.00', 'NPPP', '10/28/2022', 'SDFDSF', 'DFESDF', 'Y', '1', '1', '2022-10-25 07:21:00', '2022-10-25 07:21:00');
INSERT INTO `tbl_report` VALUES ('7', '2023', '2', 'Second', '10/13/2022', '0.00', '1232.00', '3444.00', null, '4676.00', '33232.00', '23232.00', '3232.00', '26464.00', '2323.00', '232.00', '2555.00', '2.00', '3.00', '54.64', '444.00', 'NPPP', '10/28/2022', 'SDFDSF', 'DFESDF', 'Y', '1', '1', '2022-10-25 07:21:00', '2022-10-25 07:21:00');
INSERT INTO `tbl_report` VALUES ('8', '2023', '3', 'Third', '10/05/2022', '0.00', '2323.00', '3.00', null, '2326.00', '4.00', '3.00', '2.00', '5.00', '2.00', '3.00', '5.00', '4.00', '4.00', '0.21', '33.00', 'dsfds', '10/26/2022', 'asdas', 'sadasd', 'Y', '1', '1', '2022-10-26 06:57:51', '2022-10-26 06:57:51');
INSERT INTO `tbl_report` VALUES ('9', '2023', '4', 'Forth', '10/27/2022', '0.00', '78978.00', '687676.00', null, '766654.00', '6767.00', '767.00', '676.00', '1443.00', '666.00', '66.00', '732.00', '66.00', '666.00', '0.10', '6666.00', 'sadjsa', '10/28/2022', 'sadasd', 'dasdas', 'Y', '1', '1', '2022-10-26 07:47:39', '2022-10-26 07:47:39');

-- ----------------------------
-- Table structure for tbl_report_log
-- ----------------------------
DROP TABLE IF EXISTS `tbl_report_log`;
CREATE TABLE `tbl_report_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `report_id` int(11) DEFAULT '0',
  `project_id` int(11) DEFAULT '0',
  `project` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci,
  `date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_report_log
-- ----------------------------
INSERT INTO `tbl_report_log` VALUES ('1', '3', '1', 'Projectx', '{\"_token\":\"nDigvIPl0tOabmeLNB7RqoKrwSlE31l2BbAfiqNk\",\"project_id\":\"1\",\"project\":\"Projectx\",\"fiscal_year\":\"2022\",\"date\":\"12\\/30\\/2021\",\"alloc_rupee\":\"21332\",\"alloc_foreign\":\"3333\",\"alloc_total\":\"24665\",\"alloc_revised\":\"21332\",\"release_fund_auth\":\"3232\",\"release_fund_actual\":\"444\",\"release_foreign\":\"2132\",\"release_total_actual\":\"2576\",\"util_actual\":\"131\",\"util_foreign\":\"313\",\"util_total\":\"444\",\"amt_surrender\":\"1311\",\"amt_lapsed\":\"3131\",\"financial_prog\":\"1.80\",\"physical_prog\":\"1313\",\"physical_prog_desc\":\"asdasd\",\"comp_date_likely\":\"02\\/01\\/2022\",\"remarks\":\"asdasd\",\"note\":\"weewe\",\"created_by\":1,\"updated_by\":1,\"status\":\"Y\"}', '2022-10-19 04:41:54', '1', 'add', '2022-10-19 04:41:54', '2022-10-19 04:41:54');
INSERT INTO `tbl_report_log` VALUES ('2', '4', '1', 'Projectx', '{\"_token\":\"nDigvIPl0tOabmeLNB7RqoKrwSlE31l2BbAfiqNk\",\"project_id\":\"1\",\"project\":\"Projectx\",\"fiscal_year\":\"2020\",\"date\":\"01\\/10\\/2020\",\"alloc_rupee\":\"222\",\"alloc_foreign\":\"3333\",\"alloc_total\":\"3555\",\"alloc_revised\":\"222\",\"release_fund_auth\":\"343\",\"release_fund_actual\":\"2322\",\"release_foreign\":\"23232\",\"release_total_actual\":\"25554\",\"util_actual\":\"2323\",\"util_foreign\":\"233\",\"util_total\":\"2556\",\"amt_surrender\":\"3232\",\"amt_lapsed\":\"2323\",\"financial_prog\":\"71.90\",\"physical_prog\":\"23424\",\"physical_prog_desc\":\"wwww\",\"comp_date_likely\":\"05\\/05\\/2020\",\"remarks\":\"ewrew\",\"note\":\"efewr\",\"created_by\":1,\"updated_by\":1,\"status\":\"Y\"}', '10-19-2022', '1', 'add', '2022-10-19 05:03:20', '2022-10-19 05:03:20');
INSERT INTO `tbl_report_log` VALUES ('3', '5', '1', 'Projectx', '{\"_token\":\"nDigvIPl0tOabmeLNB7RqoKrwSlE31l2BbAfiqNk\",\"project_id\":\"1\",\"project\":\"Projectx\",\"fiscal_year\":\"2022\",\"date\":\"11\\/10\\/2021\",\"alloc_rupee\":\"33424\",\"alloc_foreign\":\"3333\",\"alloc_total\":\"36757\",\"alloc_revised\":\"33424\",\"release_fund_auth\":\"42242\",\"release_fund_actual\":\"422\",\"release_foreign\":\"4242\",\"release_total_actual\":\"4664\",\"util_actual\":\"222\",\"util_foreign\":\"222\",\"util_total\":\"444\",\"amt_surrender\":\"244\",\"amt_lapsed\":\"444\",\"financial_prog\":\"1.21\",\"physical_prog\":\"42424\",\"physical_prog_desc\":\"dfsdf\",\"comp_date_likely\":\"01\\/12\\/2022\",\"remarks\":\"dwww\",\"note\":\"dsdsd\",\"created_by\":1,\"updated_by\":1,\"status\":\"Y\"}', '10/19/2022', '1', 'add', '2022-10-19 05:11:16', '2022-10-19 05:11:16');
INSERT INTO `tbl_report_log` VALUES ('4', '3', '1', 'Projectx', '{\"id\":3,\"fiscal_year\":\"2022\",\"project_id\":1,\"project\":\"Projectx\",\"date\":\"12\\/30\\/2021\",\"actual_expend\":0,\"alloc_rupee\":21332,\"alloc_foreign\":3333,\"alloc_revised\":21332,\"alloc_total\":24665,\"release_fund_auth\":3232,\"release_fund_actual\":444,\"release_foreign\":2132,\"release_total_actual\":2576,\"util_actual\":131,\"util_foreign\":313,\"util_total\":444,\"amt_surrender\":1311,\"amt_lapsed\":3131,\"financial_prog\":1.8,\"physical_prog\":1313,\"physical_prog_desc\":\"asdasd\",\"comp_date_likely\":\"02\\/01\\/2022\",\"remarks\":\"asdasd\",\"note\":\"weewe\",\"status\":\"Y\",\"created_by\":1,\"updated_by\":1,\"created_at\":\"2022-10-19T04:41:54.000000Z\",\"updated_at\":\"2022-10-19T04:41:54.000000Z\"}', '10/19/2022', '1', 'delete', '2022-10-19 05:15:52', '2022-10-19 05:15:52');
INSERT INTO `tbl_report_log` VALUES ('5', '6', '2', 'Second', '{\"_token\":\"Uusg52afGPrYo4McMJE3NmppRW9UMJPE1SNnfg2a\",\"project_id\":\"2\",\"project\":\"Second\",\"fiscal_year\":\"2023\",\"date\":\"10\\/13\\/2022\",\"alloc_rupee\":\"1232\",\"alloc_foreign\":\"3444\",\"alloc_total\":\"4676\",\"alloc_revised\":null,\"release_fund_auth\":\"33232\",\"release_fund_actual\":\"23232\",\"release_foreign\":\"3232\",\"release_total_actual\":\"26464\",\"util_actual\":\"2323\",\"util_foreign\":\"232\",\"util_total\":\"2555\",\"amt_surrender\":\"2\",\"amt_lapsed\":\"3\",\"financial_prog\":\"54.64\",\"physical_prog\":\"444\",\"physical_prog_desc\":\"NPPP\",\"comp_date_likely\":\"10\\/28\\/2022\",\"remarks\":\"SDFDSF\",\"note\":\"DFESDF\",\"created_by\":1,\"updated_by\":1,\"status\":\"Y\"}', '10/25/2022', '1', 'add', '2022-10-25 07:21:00', '2022-10-25 07:21:00');
INSERT INTO `tbl_report_log` VALUES ('6', '7', '2', 'Second', '{\"_token\":\"Uusg52afGPrYo4McMJE3NmppRW9UMJPE1SNnfg2a\",\"project_id\":\"2\",\"project\":\"Second\",\"fiscal_year\":\"2023\",\"date\":\"10\\/13\\/2022\",\"alloc_rupee\":\"1232\",\"alloc_foreign\":\"3444\",\"alloc_total\":\"4676\",\"alloc_revised\":null,\"release_fund_auth\":\"33232\",\"release_fund_actual\":\"23232\",\"release_foreign\":\"3232\",\"release_total_actual\":\"26464\",\"util_actual\":\"2323\",\"util_foreign\":\"232\",\"util_total\":\"2555\",\"amt_surrender\":\"2\",\"amt_lapsed\":\"3\",\"financial_prog\":\"54.64\",\"physical_prog\":\"444\",\"physical_prog_desc\":\"NPPP\",\"comp_date_likely\":\"10\\/28\\/2022\",\"remarks\":\"SDFDSF\",\"note\":\"DFESDF\",\"created_by\":1,\"updated_by\":1,\"status\":\"Y\"}', '10/25/2022', '1', 'add', '2022-10-25 07:21:00', '2022-10-25 07:21:00');
INSERT INTO `tbl_report_log` VALUES ('7', '8', '3', 'Third', '{\"_token\":\"rNgD0T2dk5VhnhHhv6lwjJzgILp2sLU1lqyZkr9i\",\"project_id\":\"3\",\"project\":\"Third\",\"fiscal_year\":\"2023\",\"date\":\"10\\/05\\/2022\",\"alloc_rupee\":\"2323\",\"alloc_foreign\":\"3\",\"alloc_total\":\"2326\",\"alloc_revised\":null,\"release_fund_auth\":\"4\",\"release_fund_actual\":\"3\",\"release_foreign\":\"2\",\"release_total_actual\":\"5\",\"util_actual\":\"2\",\"util_foreign\":\"3\",\"util_total\":\"5\",\"amt_surrender\":\"4\",\"amt_lapsed\":\"4\",\"financial_prog\":\"0.21\",\"physical_prog\":\"33\",\"physical_prog_desc\":\"dsfds\",\"comp_date_likely\":\"10\\/26\\/2022\",\"remarks\":\"asdas\",\"note\":\"sadasd\",\"created_by\":1,\"updated_by\":1,\"status\":\"Y\"}', '10/26/2022', '1', 'add', '2022-10-26 06:57:51', '2022-10-26 06:57:51');
INSERT INTO `tbl_report_log` VALUES ('8', '9', '4', 'Forth', '{\"_token\":\"rNgD0T2dk5VhnhHhv6lwjJzgILp2sLU1lqyZkr9i\",\"project_id\":\"4\",\"project\":\"Forth\",\"fiscal_year\":\"2023\",\"date\":\"10\\/27\\/2022\",\"alloc_rupee\":\"78978\",\"alloc_foreign\":\"687676\",\"alloc_total\":\"766654\",\"alloc_revised\":null,\"release_fund_auth\":\"6767\",\"release_fund_actual\":\"767\",\"release_foreign\":\"676\",\"release_total_actual\":\"1443\",\"util_actual\":\"666\",\"util_foreign\":\"66\",\"util_total\":\"732\",\"amt_surrender\":\"66\",\"amt_lapsed\":\"666\",\"financial_prog\":\"0.10\",\"physical_prog\":\"6666\",\"physical_prog_desc\":\"sadjsa\",\"comp_date_likely\":\"10\\/28\\/2022\",\"remarks\":\"sadasd\",\"note\":\"dasdas\",\"created_by\":1,\"updated_by\":1,\"status\":\"Y\"}', '10/26/2022', '1', 'add', '2022-10-26 07:47:39', '2022-10-26 07:47:39');

-- ----------------------------
-- Table structure for tbl_role
-- ----------------------------
DROP TABLE IF EXISTS `tbl_role`;
CREATE TABLE `tbl_role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_role
-- ----------------------------
INSERT INTO `tbl_role` VALUES ('1', 'Admin', 'N', '2000-01-01 00:00:01', '2000-01-01 00:00:01');
INSERT INTO `tbl_role` VALUES ('2', 'PD', 'Y', '2000-01-01 00:00:01', '2000-01-01 00:00:01');

-- ----------------------------
-- Table structure for tbl_users_project
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users_project`;
CREATE TABLE `tbl_users_project` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `project_id` int(11) NOT NULL DEFAULT '0',
  `project` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_users_project
-- ----------------------------
INSERT INTO `tbl_users_project` VALUES ('1', '7', '1', null);
INSERT INTO `tbl_users_project` VALUES ('2', '8', '1', null);
INSERT INTO `tbl_users_project` VALUES ('3', '8', '2', null);
INSERT INTO `tbl_users_project` VALUES ('4', '9', '1', null);
INSERT INTO `tbl_users_project` VALUES ('5', '9', '3', null);
INSERT INTO `tbl_users_project` VALUES ('6', '9', '4', null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Admin', 'admin', '1', 'Admin', 'idola@mailinator.com', null, '$2y$10$A6tpVXwbDfXDPGq62wG3BOof7xkPhOeiXlI11cjckCqSGFJznLfnq', 'ZbSm2A8iY5YusrDyKluet3rTjcWmK5jHLFZIBq8pwVidn1AWRxGU9iW8ScXD', 'Y', '0', '0', '2000-01-01 00:00:01', '2000-01-01 00:00:01');
INSERT INTO `users` VALUES ('7', 'Mubashir', 'mubay', '2', 'PD', 'mubay@gmail.com', null, '$2y$10$yB.cy8TIzgK1HkohqJOPrOLW1uPQjLb7ewPsbsHawI/kxpWTeeHQq', null, 'Y', '1', '1', '2022-10-25 07:30:58', '2022-10-25 07:30:58');
INSERT INTO `users` VALUES ('8', 'Talha', 'talha', '2', 'PD', 'talha@gmail.com', null, '$2y$10$J.bRsUwtOZQL2n.9zsMTDOMy9A6GZrB0ID1KddUP0VEnmJBM3x.Fm', null, 'Y', '1', '1', '2022-10-26 06:55:59', '2022-10-26 06:55:59');
INSERT INTO `users` VALUES ('9', 'Test', 'test', '2', 'PD', 'test@gmail.com', null, '$2y$10$eQXXVOvsw2oQPIMMWvDdtutZNoCF3PryfGGgA.ArteMG0QkLRJxSi', null, 'Y', '1', '1', '2022-10-26 07:48:10', '2022-10-26 08:02:30');
